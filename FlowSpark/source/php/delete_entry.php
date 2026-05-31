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

$stmt = $conn->prepare('DELETE FROM movie WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->close();

http_response_code(200);
