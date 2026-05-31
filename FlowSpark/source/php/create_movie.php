<?php

include 'db.php';
verify_csrf();

if (!$cookie || $admin !== 1) {
    header('Location: ./index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ./adminpanel-movies.php');
    exit();
}

$title       = trim($_POST['title']       ?? '');
$premiere    = trim($_POST['premiere']    ?? '');
$rating      = trim($_POST['rating']      ?? '');
$length_min  = (int)($_POST['length']     ?? 0);
$description = trim($_POST['description'] ?? '');

if (empty($title) || empty($premiere) || empty($description)
    || !is_numeric($_POST['rating'] ?? '')
    || $length_min <= 0
) {
    header('Location: ./adminpanel-movies.php?error=' . urlencode('Please fill in all fields correctly.'));
    exit();
}

if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $premiere)) {
    header('Location: ./adminpanel-movies.php?error=' . urlencode('Invalid date format.'));
    exit();
}

$rating = round((float)$rating, 1);
if ($rating < 0 || $rating > 10) {
    header('Location: ./adminpanel-movies.php?error=' . urlencode('Rating must be between 0 and 10.'));
    exit();
}

$hours        = floor($length_min / 60);
$minutes      = $length_min % 60;
$length_str   = "{$hours}h {$minutes}m";

$allowed_cats = ['action','adventure','comedy','crime','drama','fantasy','horror','mystery','sci-fi','thriller'];
$selected_cats = [];
foreach ($allowed_cats as $cat) {
    if (!empty($_POST[$cat])) {
        $selected_cats[] = $cat;
    }
}
$categories = implode(', ', $selected_cats);

$allowed_mime = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
$upload_dir   = realpath('../../resources/movie_images') . '/';

function handle_upload(string $field, string $upload_dir, array $allowed_mime): ?string {
    if (empty($_FILES[$field]['tmp_name']) || $_FILES[$field]['error'] !== UPLOAD_ERR_OK) {
        return null;
    }

    $tmp  = $_FILES[$field]['tmp_name'];
    $mime = mime_content_type($tmp); 

    if (!in_array($mime, $allowed_mime, true)) {
        return null;
    }

    $ext      = pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION);
    $ext      = strtolower(preg_replace('/[^a-z0-9]/i', '', $ext));
    $filename = bin2hex(random_bytes(16)) . '.' . $ext;
    $dest     = $upload_dir . $filename;

    if (!move_uploaded_file($tmp, $dest)) {
        return null;
    }
    return $filename;
}

$baner = handle_upload('baner', $upload_dir, $allowed_mime);
$hero  = handle_upload('hero',  $upload_dir, $allowed_mime);

$stmt = $conn->prepare(
    'INSERT INTO movies
        (title, release_date, rating, `length`, image_path, hero_path, short_summary, categories)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?)'
);
$stmt->bind_param(
    'ssdsssss',
    $title, $premiere, $rating, $length_str, $baner, $hero, $description, $categories
);

if ($stmt->execute()) {
    $stmt->close();
    header('Location: ./adminpanel-movies.php?success=' . urlencode('Movie created.'));
} else {
    $stmt->close();
    header('Location: ./adminpanel-movies.php?error=' . urlencode('Database error. Please try again.'));
}
exit();
