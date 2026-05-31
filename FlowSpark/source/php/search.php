<?php

include 'db.php';

if (!isset($_GET['q'])) {
    exit();
}

$search = '%' . $_GET['q'] . '%';

$stmt = $conn->prepare(
    'SELECT id, title FROM movies WHERE title LIKE ? LIMIT 4'
);
$stmt->bind_param('s', $search);
$stmt->execute();
$result = $stmt->get_result();

echo '<ul class="search-result">';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id    = (int)$row['id'];
        $title = htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');
        echo "<li><a href='./movie.php?id={$id}'><button class='info'>{$title}</button></a></li>";
    }
} else {
    echo "<li><button class='info'>No Result Found</button></li>";
}

echo '</ul>';
$stmt->close();
