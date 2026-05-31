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
    'SELECT movie.id AS id_main, cinema_hall.name, movies.title, movie.play_date
     FROM movie
     INNER JOIN cinema_hall ON movie.cinema_hall_id = cinema_hall.id
     INNER JOIN movies       ON movie.movie_id       = movies.id
     WHERE movie.id = ?
     LIMIT 1'
);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    header('Content-Type: application/json');
    echo json_encode([
        'id'        => (int)$row['id_main'],
        'name'      => $row['name'],
        'title'     => $row['title'],
        'play_date' => $row['play_date'],
    ]);
} else {
    http_response_code(404);
}

$stmt->close();
