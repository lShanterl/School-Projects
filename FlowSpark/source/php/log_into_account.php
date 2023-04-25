<?php
    include "db.php";

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        header("Location: ./login.php?error=fill all fields");
        exit();
    }

    $sql = "SELECT password FROM users WHERE email='".$email."'";

    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_fetch_assoc($result);
    if($resultCheck < 1)
    {
        header("Location: ./login.php?error=wrong email");
        exit();
    }
    else
    {
        $hashed_password = $resultCheck['password'];
        if(password_verify($password, $hashed_password))
        {
		    setcookie( "email", $email, time()+36000, "/", "", 0 );

            $auth_token = uniqid();

            setcookie( "auth_token", $auth_token, time()+36000, "/", "", 0 );

            $sql = "UPDATE users SET auth_token = '".$auth_token."' WHERE email='".$email."';";

            $result = mysqli_query($conn, $sql);

            header("Location: ./index.php");
            exit();
        }
        else
        {
            header("Location: ./login.php?error=Wrong password&email=".$email);
            exit();
        }
    }


?>