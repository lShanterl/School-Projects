<?php

include 'db.php';
verify_csrf();

if (!$cookie) {
    header('Location: ./login.php');
    exit();
}

$name    = trim($_POST['name']    ?? '');
$surname = trim($_POST['surname'] ?? '');
$email   = $_COOKIE['email'];

if (empty($name) || empty($surname)) {
    header('Location: ./settings.php?error=' . urlencode('Name and surname cannot be empty.'));
    exit();
}

$stmt = $conn->prepare(
    'UPDATE users SET name = ?, surname = ? WHERE email = ?'
);
$stmt->bind_param('sss', $name, $surname, $email);
$stmt->execute();
$stmt->close();

header('Location: ./settings.php?update=success');
exit();
