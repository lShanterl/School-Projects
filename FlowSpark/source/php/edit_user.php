<?php
include 'db.php';
verify_csrf();

if (!$cookie || $admin !== 1) {
    header('Location: ./index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ./adminpanel.php');
    exit();
}

$target_id = (int)($_POST['id'] ?? 0);
$name      = trim($_POST['name']    ?? '');
$surname   = trim($_POST['surname'] ?? '');
$email     = trim($_POST['email']   ?? '');
$is_admin  = isset($_POST['admin']) ? (int)$_POST['admin'] : 0;
$is_admin  = ($is_admin === 1) ? 1 : 0;   // force binary

if ($target_id <= 0 || empty($name) || empty($surname) || empty($email)) {
    header('Location: ./adminpanel.php?error=' . urlencode('Invalid input.'));
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ./adminpanel.php?error=' . urlencode('Invalid email address.'));
    exit();
}

$new_password_hash = null;
$new_pass  = $_POST['password']    ?? '';
$re_pass   = $_POST['re_password'] ?? '';

if ($new_pass !== '' || $re_pass !== '') {
    if (strlen($new_pass) < 8) {
        header('Location: ./adminpanel.php?error=' . urlencode('Password must be at least 8 characters.'));
        exit();
    }
    if ($new_pass !== $re_pass) {
        header('Location: ./adminpanel.php?error=' . urlencode('Passwords do not match.'));
        exit();
    }
    $new_password_hash = password_hash($new_pass, PASSWORD_DEFAULT);
}

$stmt = $conn->prepare('SELECT email FROM users WHERE id = ? LIMIT 1');
$stmt->bind_param('i', $target_id);
$stmt->execute();
$stmt->bind_result($current_email);
$stmt->fetch();
$stmt->close();

$editing_self = ($current_email === ($_COOKIE['email'] ?? ''));
if ($editing_self) {
    $is_admin = 1;
    setcookie('email', $email, time() + 36000, '/', '', false, true);
}

if ($new_password_hash !== null) {
    $stmt = $conn->prepare(
        'UPDATE users SET name = ?, surname = ?, email = ?, isAdmin = ?, password = ? WHERE id = ?'
    );
    $stmt->bind_param('sssisi', $name, $surname, $email, $is_admin, $new_password_hash, $target_id);
} else {
    $stmt = $conn->prepare(
        'UPDATE users SET name = ?, surname = ?, email = ?, isAdmin = ? WHERE id = ?'
    );
    $stmt->bind_param('sssii', $name, $surname, $email, $is_admin, $target_id);
}

if ($stmt->execute()) {
    $stmt->close();
    header('Location: ./adminpanel.php?success=' . urlencode('User updated.'));
} else {
    $stmt->close();
    header('Location: ./adminpanel.php?error=' . urlencode('Update failed.'));
}
exit();
