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
    'SELECT id, title, release_date, rating, `length`, image_path, hero_path, short_summary, categories
     FROM movies WHERE id = ? LIMIT 1'
);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $length_str = $row['length'] ?? '0h 0m';
    $parts      = explode(' ', $length_str);
    $hours      = isset($parts[0]) ? (int)str_replace('h', '', $parts[0]) : 0;
    $mins       = isset($parts[1]) ? (int)str_replace('m', '', $parts[1]) : 0;
    $total_mins = $hours * 60 + $mins;

    header('Content-Type: application/json');
    echo json_encode([
        'id'           => (int)$row['id'],
        'title'        => $row['title'],
        'release_date' => $row['release_date'],
        'rating'       => $row['rating'],
        'length'       => $total_mins,
        'baner'        => $row['image_path'],
        'hero'         => $row['hero_path'],
        'short_summary'=> $row['short_summary'],
        'categories'   => $row['categories'],
    ]);
} else {
    http_response_code(404);
}

$stmt->close();
