<?php

include 'db.php';
verify_csrf();

if (!$cookie || $admin !== 1) {
    header('Location: ./index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ./adminpanel_movie_entries.php');
    exit();
}

$title     = trim($_POST['title'] ?? '');
$play_date = trim($_POST['dat']   ?? '');
$hall      = trim($_POST['hall']  ?? '');

if (empty($title) || empty($play_date) || empty($hall)) {
    header('Location: ./adminpanel_movie_entries.php?error=' . urlencode('All fields are required.'));
    exit();
}

if (!preg_match('/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}$/', $play_date)) {
    header('Location: ./adminpanel_movie_entries.php?error=' . urlencode('Invalid date format.'));
    exit();
}

$stmt = $conn->prepare('SELECT id FROM movies WHERE title = ? LIMIT 1');
$stmt->bind_param('s', $title);
$stmt->execute();
$stmt->bind_result($movie_id);
if (!$stmt->fetch()) {
    $stmt->close();
    header('Location: ./adminpanel_movie_entries.php?error=' . urlencode('Movie not found.'));
    exit();
}
$stmt->close();

$stmt = $conn->prepare(
    'SELECT id, total_rows, seats_per_row FROM cinema_hall WHERE name = ? LIMIT 1'
);
$stmt->bind_param('s', $hall);
$stmt->execute();
$stmt->bind_result($cinema_hall_id, $total_rows, $seats_per_row);
if (!$stmt->fetch()) {
    $stmt->close();
    header('Location: ./adminpanel_movie_entries.php?error=' . urlencode('Cinema hall not found.'));
    exit();
}
$stmt->close();

$stmt = $conn->prepare(
    'INSERT INTO movie (cinema_hall_id, movie_id, play_date) VALUES (?, ?, ?)'
);
$stmt->bind_param('iis', $cinema_hall_id, $movie_id, $play_date);
$stmt->execute();
$entry_id = (int)$conn->insert_id;
$stmt->close();

$stmt = $conn->prepare(
    'INSERT INTO seats (cinema_hall_id, row_number, seat_number, movie_id) VALUES (?, ?, ?, ?)'
);
for ($row = 0; $row < $total_rows; $row++) {
    for ($seat = 0; $seat < $seats_per_row; $seat++) {
        $stmt->bind_param('iiii', $cinema_hall_id, $row, $seat, $entry_id);
        $stmt->execute();
    }
}
$stmt->close();

header('Location: ./adminpanel_movie_entries.php?success=' . urlencode('Entry created.'));
exit();
