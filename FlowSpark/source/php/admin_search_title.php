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
    'SELECT id, title FROM movies WHERE title LIKE ? LIMIT 4'
);
$stmt->bind_param('s', $search);
$stmt->execute();
$result = $stmt->get_result();

echo '<ul class="search-result">';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $title = htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');
        echo "<li><button class='perm' type='button' onclick='selectTitle(event)'>{$title}</button></li>";
    }
} else {
    echo "<li><button class='perm'>No Result Found</button></li>";
}

echo '</ul>';
$stmt->close();
