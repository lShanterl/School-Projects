<?php
    include 'db.php';

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['re_password'];
    $admin = 0;

    if(isset($_POST['admin']))
    {
        $admin = 1;
    }

    if (empty($name) || empty($surname) || empty($email) || empty($password) || empty($password2)) {

        $admin == 1 ? header("Location: ./adminpanel.php?error=empty fields &name=".$name."&surname=".$surname."&email=".$email."&admin=1") : header("Location: ./signup.php?error=empty fields &name=".$name."&surname=".$surname."&email=".$email);
        exit();
    }
    if($password != $password2)
    {
        $admin == 1 ? header("Location: ./adminpanel.php?error=passwords do not match &name=".$name."&surname=".$surname."&email=".$email) : header("Location: ./signup.php?error=passwords do not match &name=".$name."&surname=".$surname."&email=".$email);
        exit();
    }

    $sql = "SELECT email FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        $admin == 1 ? header("Location: ./adminpanel.php?error=email already exists &name=".$name."&surname=".$surname."&email=".$email) : header("Location: ./signup.php?error=email already exists &name=".$name."&surname=".$surname."&email=".$email);
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, surname, email, password, isAdmin) VALUES ('$name', '$surname', '$email', '$hashedPassword','$admin');";
    mysqli_query($conn, $sql);

    $admin == 1 ? header("Location: ./adminpanel.php?success=account created") : header("Location: ./index.php?success=account created");

?>