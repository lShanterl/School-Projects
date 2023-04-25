<?php
    include 'db.php';
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $isAdmin = $_POST['admin'];
    $avatar;
    $password;
    $re_password;

    if(isset($_POST['password']) && isset($_POST['re_password']) && $_POST['password'] != '' && $_POST['re_password'] != ''){
        $password = $_POST['password'];
        $re_password = $_POST['re_password'];
        if($password == $re_password){
            $password = password_hash($password, PASSWORD_DEFAULT);

        }
        else{
            header("Location: ./adminpanel.php?error=password");
            exit();
        }
    }
    else{
        $password = null;
    }

    $id = $_POST['id'];

    $sql2 = "SELECT email FROM users WHERE id = $id";
    $result = mysqli_query($conn, $sql2);
    $row = mysqli_fetch_assoc($result);

    if($row['email'] == $_COOKIE['email'])
    {
        setcookie( "email", $email, time()+36000, "/", "", 0 );
        $isAdmin = 1;
    }

    $sql = "UPDATE users SET name = '$name', surname = '$surname', email = '$email', isAdmin = '$isAdmin'".(isset($avatar) ? ", image_path = '$avatar'" : ''). ($password != null ? ", password = '$password'" : '')  ." WHERE id = $id";

    if(mysqli_query($conn, $sql)){
        header("Location: ./adminpanel.php?success=edit");
    }
    else{
        header("Location: ./adminpanel.php?error=edit");
    }
?>