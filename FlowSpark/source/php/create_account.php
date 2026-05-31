<?php

include 'db.php';
verify_csrf();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ./signup.php');
    exit();
}

$name      = trim($_POST['name']       ?? '');
$surname   = trim($_POST['surname']    ?? '');
$email     = trim($_POST['email']      ?? '');
$password  = $_POST['password']        ?? '';
$password2 = $_POST['re_password']     ?? '';

$from_admin = ($admin === 1);
$is_admin_flag = ($from_admin && isset($_POST['admin'])) ? 1 : 0;

$redirect_base = $from_admin ? './adminpanel.php' : './signup.php';

if (empty($name) || empty($surname) || empty($email) || empty($password) || empty($password2)) {
    header('Location: ' . $redirect_base . '?error=' . urlencode('All fields are required.'));
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ' . $redirect_base . '?error=' . urlencode('Invalid email address.'));
    exit();
}

if (strlen($password) < 8) {
    header('Location: ' . $redirect_base . '?error=' . urlencode('Password must be at least 8 characters.'));
    exit();
}

if ($password !== $password2) {
    header('Location: ' . $redirect_base . '?error=' . urlencode('Passwords do not match.'));
    exit();
}

$stmt = $conn->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
$stmt->bind_param('s', $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->close();
    header('Location: ' . $redirect_base . '?error=' . urlencode('Email address is already registered.'));
    exit();
}
$stmt->close();

$hashed = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare(
    'INSERT INTO users (name, surname, email, password, isAdmin) VALUES (?, ?, ?, ?, ?)'
);
$stmt->bind_param('ssssi', $name, $surname, $email, $hashed, $is_admin_flag);

if ($stmt->execute()) {
    $stmt->close();
    header('Location: ' . ($from_admin ? './adminpanel.php' : './index.php'));
} else {
    $stmt->close();
    header('Location: ' . $redirect_base . '?error=' . urlencode('Registration failed. Please try again.'));
}
exit();
