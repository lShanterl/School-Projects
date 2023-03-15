<?php
    include 'db.php';

    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $surname = isset($_POST['surname']) ? $_POST['surname'] : '';
    
    $email = $_COOKIE['email'];

    $sql = "UPDATE users SET name='$name', surname='$surname' WHERE email='$email'";

    mysqli_query($conn, $sql);

    header("Location: ./settings.php?update=success");
?>