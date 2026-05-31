<?php

include 'db.php';
verify_csrf();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ./login.php');
    exit();
}

$email    = trim($_POST['email']    ?? '');
$password = trim($_POST['password'] ?? '');

if (empty($email) || empty($password)) {
    header('Location: ./login.php?error=' . urlencode('Please fill in all fields.'));
    exit();
}

$stmt = $conn->prepare(
    'SELECT password FROM users WHERE email = ? LIMIT 1'
);
$stmt->bind_param('s', $email);
$stmt->execute();
$stmt->bind_result($hashed_password);

if (!$stmt->fetch() || !password_verify($password, $hashed_password)) {
    $stmt->close();
    header('Location: ./login.php?error=' . urlencode('Invalid email or password.'));
    exit();
}
$stmt->close();

session_regenerate_id(true);

$auth_token = bin2hex(random_bytes(32));

$stmt = $conn->prepare(
    'UPDATE users SET auth_token = ? WHERE email = ?'
);
$stmt->bind_param('ss', $auth_token, $email);
$stmt->execute();
$stmt->close();

$expires = time() + 36000;
setcookie('email',      $email,      $expires, '/', '', false, true);
setcookie('auth_token', $auth_token, $expires, '/', '', false, true);

header('Location: ./index.php');
exit();
