<?php
    include 'db.php';
    $old_password = isset($_POST['old_pass']) ? $_POST['old_pass'] : '';
    $new_password = isset($_POST['new_pass']) ? $_POST['new_pass'] : '';
    $rewrite_password = isset($_POST['re_new_pass']) ? $_POST['re_new_pass'] : '';

    $email = $_COOKIE['email'];

    if($new_password == $rewrite_password ){
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($result);
        $hashed_password = $result['password'];
        if(password_verify($old_password, $hashed_password)){
            $new_password = password_hash($new_password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password='$new_password' WHERE email='$email'";
            mysqli_query($conn, $sql);
            header("Location: ./logout.php");
        }
        else{
            header("Location: ./settings.php?error=Wrong password");
        }
    }
?>