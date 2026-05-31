<?php

include 'db.php';
include 'fetch_movie.php';

$allowed_genres = ['all','action','adventure','comedy','crime','drama','fantasy','horror','mystery','sci-fi','thriller'];

$genre  = $_GET['genre']  ?? 'all';
$rating = $_GET['rating'] ?? 'all';

if (!in_array($genre, $allowed_genres, true)) {
    $genre = 'all';
}

$rating_num = null;
if ($rating !== 'all') {
    $rating_num = (int)$rating;
    if ($rating_num < 1 || $rating_num > 10) {
        $rating_num = null;
        $rating = 'all';
    }
}

if ($genre !== 'all' && $rating !== 'all') {
    $search = '%' . $genre . '%';
    $stmt = $conn->prepare('SELECT * FROM movies WHERE categories LIKE ? AND rating >= ?');
    $stmt->bind_param('sd', $search, $rating_num);
} elseif ($genre !== 'all') {
    $search = '%' . $genre . '%';
    $stmt = $conn->prepare('SELECT * FROM movies WHERE categories LIKE ?');
    $stmt->bind_param('s', $search);
} elseif ($rating !== 'all') {
    $stmt = $conn->prepare('SELECT * FROM movies WHERE rating >= ?');
    $stmt->bind_param('d', $rating_num);
} else {
    $stmt = $conn->prepare('SELECT * FROM movies');
}

$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $available_movies[] = $row;
}
$stmt->close();

echo_movies($available_movies);
