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
    'SELECT id, title, release_date, rating, `length`
     FROM movies
     WHERE title LIKE ?
     ORDER BY id'
);
$stmt->bind_param('s', $search);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $id           = htmlspecialchars($row['id'],           ENT_QUOTES, 'UTF-8');
    $title        = htmlspecialchars($row['title'],        ENT_QUOTES, 'UTF-8');
    $release_date = htmlspecialchars($row['release_date'], ENT_QUOTES, 'UTF-8');
    $rating       = htmlspecialchars($row['rating'],       ENT_QUOTES, 'UTF-8');
    $length       = htmlspecialchars($row['length'],       ENT_QUOTES, 'UTF-8');

    echo "<tr>
        <td><span class='user'>{$id}</span></td>
        <td><span class='user'>{$title}</span></td>
        <td><span class='user'>{$release_date}</span></td>
        <td><span class='user'>{$rating}</span></td>
        <td><span class='user'>{$length}</span></td>
        <td>
            <span class='buttons user'>
                <button class='edit'>Edit</button>
                <button class='delete'>Delete</button>
            </span>
        </td>
    </tr>";
}

$stmt->close();
