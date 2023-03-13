<?php
    include 'db.php';

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['re_password'];

    if (empty($name) || empty($surname) || empty($email) || empty($password) || empty($password2)) {
        if($password !== $password2)
        {
            header("Location: ./signup.php?error=passwords do not match &name=".$name."&surname=".$surname."&email=".$email);
            exit();
        }
        header("Location: ./signup.php?error=fill all fields &name=".$name."&surname=".$surname."&email=".$email);
        exit();
        // We're checking if user provided us with all information
    }

    $sql = "SELECT email FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        header("Location: ./signup.php?error=email already exists &name=".$name."&surname=".$surname."&email=".$email);
        exit();
        // We're checking if user already exists
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, surname, email, password) VALUES ('$name', '$surname', '$email', '$hashedPassword');";
    mysqli_query($conn, $sql);

    header("Location: ./login.php?signup=success");

?>