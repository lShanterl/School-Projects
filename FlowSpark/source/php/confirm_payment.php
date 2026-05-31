<?php

include 'db.php';

if (!$cookie) {
    header('Location: ./login.php');
    exit();
}

if (empty($_SESSION['seats_id'])) {
    header('Location: ./tickets.php');
    exit();
}

$stmt = $conn->prepare(
    'SELECT id FROM users WHERE email = ? AND auth_token = ? LIMIT 1'
);
$stmt->bind_param('ss', $_COOKIE['email'], $_COOKIE['auth_token']);
$stmt->execute();
$stmt->bind_result($user_id);
if (!$stmt->fetch()) {
    $stmt->close();
    header('Location: ./login.php');
    exit();
}
$stmt->close();

$seats_id = explode(',', $_SESSION['seats_id']);

$stmt_reserve = $conn->prepare('UPDATE seats SET is_reserved = 1 WHERE id = ?');
$stmt_assign  = $conn->prepare('UPDATE seats SET user_id = ? WHERE id = ?');

foreach ($seats_id as $raw_id) {
    $seat_id = (int)preg_replace('/\D/', '', $raw_id);
    if ($seat_id <= 0) {
        continue;
    }

    $stmt_reserve->bind_param('i', $seat_id);
    $stmt_reserve->execute();

    $stmt_assign->bind_param('ii', $user_id, $seat_id);
    $stmt_assign->execute();
}

$stmt_reserve->close();
$stmt_assign->close();

unset($_SESSION['seats'], $_SESSION['seats_id'], $_SESSION['title'], $_SESSION['date']);

header('Location: ./ytickets.php');
exit();
