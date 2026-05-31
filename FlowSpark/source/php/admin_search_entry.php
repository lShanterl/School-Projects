<?php

include 'db.php';

if (!$cookie || $admin !== 1) {
    http_response_code(403);
    exit();
}

if (!isset($_GET['q'])) {
    exit();
}

$search = '%' . $_GET['q'] . '%';

$stmt = $conn->prepare(
    'SELECT movie.id AS id_main, movies.title, movie.play_date, cinema_hall.name
     FROM movie
     INNER JOIN cinema_hall ON movie.cinema_hall_id = cinema_hall.id
     INNER JOIN movies       ON movie.movie_id       = movies.id
     WHERE movies.title      LIKE ?
        OR cinema_hall.name  LIKE ?
        OR movie.play_date   LIKE ?
     ORDER BY movie.id'
);
$stmt->bind_param('sss', $search, $search, $search);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $id        = htmlspecialchars($row['id_main'],   ENT_QUOTES, 'UTF-8');
    $title     = htmlspecialchars($row['title'],     ENT_QUOTES, 'UTF-8');
    $play_date = htmlspecialchars($row['play_date'], ENT_QUOTES, 'UTF-8');
    $hall      = htmlspecialchars($row['name'],      ENT_QUOTES, 'UTF-8');

    echo "<tr>
        <td><span class='user'>{$id}</span></td>
        <td><span class='user'>{$title}</span></td>
        <td><span class='user'>{$play_date}</span></td>
        <td><span class='user'>{$hall}</span></td>
        <td>
            <span class='buttons user'>
                <button class='edit'>Edit</button>
                <button class='delete'>Delete</button>
            </span>
        </td>
    </tr>";
}

$stmt->close();
