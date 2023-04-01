<?php
    include 'db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['seats'] = $_POST['seats'];
        $_SESSION['title'] = $_POST['title'];
        $_SESSION['date'] = $_POST['date'];
        $_SESSION['seats_id'] = $_POST['seats_id'];
    }
?>