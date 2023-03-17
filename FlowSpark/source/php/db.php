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
    
    function GetIcon()
    {
        global $conn;
        if(isset($_COOKIE["email"]))
        {
            $em = $_COOKIE['email'];
            $sql = "SELECT image_path from users where email='".$em."';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck < 1)
            {
                return "../../resources/user_images/default.jpg";
            }
            $row = mysqli_fetch_assoc($result);
            $path = $row['image_path'];
            return $path;
        }
        return "../../resources/user_images/default.jpg";
    }
?>