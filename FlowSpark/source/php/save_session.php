<?php

include 'db.php';

if (!$cookie) {
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit();
}

$seats_raw = $_POST['seats'] ?? '';
$seats_clean = preg_replace('/[^0-9,\-]/', '', $seats_raw);

$seats_id_raw   = $_POST['seats_id'] ?? '';
$seats_id_clean = preg_replace('/[^0-9,seat\-]/', '', $seats_id_raw);

$title = strip_tags($_POST['title'] ?? '');
$date  = strip_tags($_POST['date']  ?? '');

$_SESSION['seats']    = $seats_clean;
$_SESSION['title']    = $title;
$_SESSION['date']     = $date;
$_SESSION['seats_id'] = $seats_id_clean;

http_response_code(200);
