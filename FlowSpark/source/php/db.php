<?php
    session_start();
    // Database connection
    $server = 'localhost';
    $user   = 'root';
    $pass   = '';
    $db     = 'FlowSpark';

    $conn = new mysqli($server, $user, $pass, $db);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
    $cookie = isset($_COOKIE["email"]);
    
?>