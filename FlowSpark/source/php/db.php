<?php
    session_start();
    // Database connection
    $server = 'localhost';
    $user   = 'root';
    $pass   = '';
    $db     = 'flowspark';

    $admin;

    $movie_path = "../../resources/movie_images/";

    $conn = new mysqli($server, $user, $pass, $db);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
    $cookie = isset($_COOKIE["email"]);
    if($cookie)
    {
        $sql = "SELECT isAdmin FROM users WHERE email like '".$_COOKIE['email']."';";
        $result = mysqli_query($conn, $sql);
        $admin = $result->fetch_assoc()['isAdmin'];
        $sql = "SELECT auth_token FROM users WHERE email like '".$_COOKIE['email']."';";

        $result = mysqli_query($conn, $sql);

        $auth_token = $result->fetch_assoc()['auth_token'];

        if($auth_token != $_COOKIE['auth_token'])
        {
            setcookie("email", "", time()-3600, '/');
            setcookie("auth_token", "", time()-3600, '/');
            unset($_COOKIE["email"]);
            unset($_COOKIE["auth_token"]);
            header("Location: ./index.php");
        }
    }
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
    function GetUsername()
    {
        global $conn;
        if(isset($_COOKIE["email"]))
        {
            $em = $_COOKIE['email'];
            $sql = "SELECT name from users where email='".$em."';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck < 1)
            {
                return "User";
            }
            $row = mysqli_fetch_assoc($result);
            $name = $row['name'];
            return $name;
        }
        return "User";
    }
?>