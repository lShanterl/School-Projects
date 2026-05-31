<?php

include 'db.php';
verify_csrf();

if (!$cookie) {
    header('Location: ./login.php');
    exit();
}

$old_password      = $_POST['old_pass']    ?? '';
$new_password      = $_POST['new_pass']    ?? '';
$rewrite_password  = $_POST['re_new_pass'] ?? '';
$email             = $_COOKIE['email'];

if (empty($old_password) || empty($new_password) || empty($rewrite_password)) {
    header('Location: ./settings.php?error=' . urlencode('All password fields are required.'));
    exit();
}

if (strlen($new_password) < 8) {
    header('Location: ./settings.php?error=' . urlencode('New password must be at least 8 characters.'));
    exit();
}

if ($new_password !== $rewrite_password) {
    header('Location: ./settings.php?error=' . urlencode('New passwords do not match.'));
    exit();
}

$stmt = $conn->prepare('SELECT password FROM users WHERE email = ? LIMIT 1');
$stmt->bind_param('s', $email);
$stmt->execute();
$stmt->bind_result($hashed_password);

if (!$stmt->fetch()) {
    $stmt->close();
    header('Location: ./settings.php?error=' . urlencode('User not found.'));
    exit();
}
$stmt->close();

if (!password_verify($old_password, $hashed_password)) {
    header('Location: ./settings.php?error=' . urlencode('Current password is incorrect.'));
    exit();
}

$new_hash = password_hash($new_password, PASSWORD_DEFAULT);

$stmt = $conn->prepare('UPDATE users SET password = ? WHERE email = ?');
$stmt->bind_param('ss', $new_hash, $email);
$stmt->execute();
$stmt->close();

header('Location: ./logout.php');
exit();
