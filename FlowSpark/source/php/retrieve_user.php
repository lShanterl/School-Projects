<?php

include 'db.php';

if (!$cookie || $admin !== 1) {
    http_response_code(403);
    exit();
}

$id = (int)($_POST['id'] ?? 0);
if ($id <= 0) {
    http_response_code(400);
    exit();
}

$stmt = $conn->prepare(
    'SELECT id, name, surname, email, isAdmin FROM users WHERE id = ? LIMIT 1'
);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    header('Content-Type: application/json');
    echo json_encode([
        'id'      => (int)$row['id'],
        'name'    => $row['name'],
        'surname' => $row['surname'],
        'email'   => $row['email'],
        'isAdmin' => (int)$row['isAdmin'],
    ]);
} else {
    http_response_code(404);
}

$stmt->close();
