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

$movie_id    = (int)($_POST['id']          ?? 0);
$title       = trim($_POST['title']        ?? '');
$premiere    = trim($_POST['premiere']     ?? '');
$rating      = trim($_POST['rating']       ?? '');
$length_min  = (int)($_POST['length']      ?? 0);
$description = trim($_POST['description']  ?? '');

if ($movie_id <= 0 || empty($title) || empty($premiere) || empty($description)
    || !is_numeric($_POST['rating'] ?? '')
    || $length_min <= 0
) {
    header('Location: ./adminpanel-movies.php?error=' . urlencode('Invalid input.'));
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

$hours      = floor($length_min / 60);
$minutes    = $length_min % 60;
$length_str = "{$hours}h {$minutes}m";

$allowed_cats  = ['action','adventure','comedy','crime','drama','fantasy','horror','mystery','sci-fi','thriller'];
$selected_cats = [];
foreach ($allowed_cats as $cat) {
    if (!empty($_POST[$cat])) {
        $selected_cats[] = $cat;
    }
}
$categories = implode(', ', $selected_cats);

$allowed_mime = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
$upload_dir   = realpath('../../resources/movie_images') . '/';

function handle_upload_edit(string $field, string $upload_dir, array $allowed_mime): ?string {
    if (empty($_FILES[$field]['tmp_name']) || $_FILES[$field]['error'] !== UPLOAD_ERR_OK) {
        return null;
    }
    $tmp  = $_FILES[$field]['tmp_name'];
    $mime = mime_content_type($tmp);
    if (!in_array($mime, $allowed_mime, true)) {
        return null;
    }
    $ext      = strtolower(preg_replace('/[^a-z0-9]/i', '', pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION)));
    $filename = bin2hex(random_bytes(16)) . '.' . $ext;
    $dest     = $upload_dir . $filename;
    if (!move_uploaded_file($tmp, $dest)) {
        return null;
    }
    return $filename;
}

$new_baner = handle_upload_edit('baner', $upload_dir, $allowed_mime);
$new_hero  = handle_upload_edit('hero',  $upload_dir, $allowed_mime);

$set_parts  = ['title = ?', 'release_date = ?', 'rating = ?', '`length` = ?', 'short_summary = ?', 'categories = ?'];
$bind_types = 'sdssss'; // note: rating is double
$bind_vals  = [&$title, &$premiere, &$rating, &$length_str, &$description, &$categories];

if ($new_baner !== null) {
    $set_parts[]  = 'image_path = ?';
    $bind_types  .= 's';
    $bind_vals[]  = &$new_baner;
}
if ($new_hero !== null) {
    $set_parts[]  = 'hero_path = ?';
    $bind_types  .= 's';
    $bind_vals[]  = &$new_hero;
}

$set_parts[]  = 'id = ?';   
$bind_types  .= 'i';
$bind_vals[]  = &$movie_id;

$sql  = 'UPDATE movies SET ' . implode(', ', array_slice($set_parts, 0, -1)) . ' WHERE id = ?';

$stmt = $conn->prepare($sql);
call_user_func_array([$stmt, 'bind_param'], array_merge([$bind_types], $bind_vals));

if ($stmt->execute()) {
    $stmt->close();
    header('Location: ./adminpanel-movies.php?success=' . urlencode('Movie updated.'));
} else {
    $stmt->close();
    header('Location: ./adminpanel-movies.php?error=' . urlencode('Update failed.'));
}
exit();
