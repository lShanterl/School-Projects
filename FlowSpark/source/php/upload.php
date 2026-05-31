<?php

include 'db.php';
verify_csrf();

if (!$cookie) {
    header('Location: ./login.php');
    exit();
}

if (!isset($_FILES['avatar']) || $_FILES['avatar']['error'] !== UPLOAD_ERR_OK) {
    header('Location: ./settings.php?avatar=error');
    exit();
}

$allowed_mime = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
$tmp          = $_FILES['avatar']['tmp_name'];
$mime         = mime_content_type($tmp);

if (!in_array($mime, $allowed_mime, true)) {
    header('Location: ./settings.php?avatar=error_type');
    exit();
}

$ext      = match ($mime) {
    'image/jpeg' => 'jpg',
    'image/png'  => 'png',
    'image/webp' => 'webp',
    'image/gif'  => 'gif',
    default      => 'jpg',
};

$filename  = hash('sha256', $_COOKIE['email']) . '_' . bin2hex(random_bytes(8)) . '.' . $ext;
$upload_dir = realpath('../../resources/user_images');

if ($upload_dir === false) {
    header('Location: ./settings.php?avatar=error');
    exit();
}

$dest = $upload_dir . DIRECTORY_SEPARATOR . $filename;

if (strpos(realpath(dirname($dest)), $upload_dir) !== 0) {
    header('Location: ./settings.php?avatar=error');
    exit();
}

if (!move_uploaded_file($tmp, $dest)) {
    header('Location: ./settings.php?avatar=error');
    exit();
}

$relative_path = '../../resources/user_images/' . $filename;

$stmt = $conn->prepare('UPDATE users SET image_path = ? WHERE email = ?');
$stmt->bind_param('ss', $relative_path, $_COOKIE['email']);
$stmt->execute();
$stmt->close();

header('Location: ./settings.php?avatar=success');
exit();
