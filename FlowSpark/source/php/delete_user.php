<?php

include 'db.php';
verify_csrf();

if (!$cookie || $admin !== 1) {
    http_response_code(403);
    exit();
}

$id = (int)($_POST['id'] ?? 0);
if ($id <= 0) {
    http_response_code(400);
    exit();
}

$stmt = $conn->prepare('SELECT email FROM users WHERE id = ? LIMIT 1');
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->bind_result($target_email);
$stmt->fetch();
$stmt->close();

if ($target_email === ($_COOKIE['email'] ?? '')) {
    http_response_code(403);
    exit('Cannot delete your own account.');
}

$stmt = $conn->prepare('DELETE FROM users WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->close();

http_response_code(200);
