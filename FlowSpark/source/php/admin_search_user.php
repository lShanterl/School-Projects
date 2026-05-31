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
    'SELECT id, name, surname, email, isAdmin
     FROM users
     WHERE name LIKE ? OR surname LIKE ? OR email LIKE ?
     ORDER BY id'
);
$stmt->bind_param('sss', $search, $search, $search);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $id      = htmlspecialchars($row['id'],      ENT_QUOTES, 'UTF-8');
    $name    = htmlspecialchars($row['name'],    ENT_QUOTES, 'UTF-8');
    $surname = htmlspecialchars($row['surname'], ENT_QUOTES, 'UTF-8');
    $email   = htmlspecialchars($row['email'],   ENT_QUOTES, 'UTF-8');
    $isAdmin = htmlspecialchars($row['isAdmin'], ENT_QUOTES, 'UTF-8');

    $delete_btn = ($row['email'] !== ($_COOKIE['email'] ?? ''))
        ? "<button class='delete'>Delete</button>"
        : '';

    echo "<tr>
        <td><span class='user'>{$id}</span></td>
        <td><span class='user'>{$name}</span></td>
        <td><span class='user'>{$surname}</span></td>
        <td><span class='user'>{$email}</span></td>
        <td><span class='user'>{$isAdmin}</span></td>
        <td>
            <span class='buttons user'>
                <button class='edit'>Edit</button>
                {$delete_btn}
            </span>
        </td>
    </tr>";
}

$stmt->close();
