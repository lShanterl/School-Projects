<?php
    session_start();
    include 'validate.php';

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Cinema";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['re_password'];

    $name = validate($name);
    $surname = validate($surname);
    $email = validate($email);
    $password = validate($password);
    $password2 = validate($password2);

    $user_data = 'name=' . $name . '&surname=' . $surname . '&email=' . $email;

    if (empty($name)) {
        header("Location: sign_up.php?error=Name is required&$user_data");
        exit();
    }
    else if (empty($surname)) {
        header("Location: sign_up.php?error=Surname is required&$user_data");
        exit();
    }
    else if (empty($email)) {
        header("Location: sign_up.php?error=Email is required&$user_data");
        exit();
    }
    else if (empty($password)) {
        header("Location: sign_up.php?error=Password is required&$user_data");
        exit();
    }
    else if (empty($password2)) {
        header("Location: sign_up.php?error=Re Password is required&$user_data");
        exit();
    }
    else if ($password !== $password2) {
        header("Location: sign_up.php?error=The confirmation password does not match&$user_data");
        exit();
    }
    else {
        $sql = "SELECT * FROM user WHERE email='$email'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: sign_up.php?error=The email is taken try another&$user_data");
            exit();
        }
        else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            
            $sql2 = "INSERT INTO user(name, surname, email, password) VALUES('$name', '$surname', '$email', '$password')";

            $result2 = mysqli_query($conn, $sql2);

            if ($result2) {
                header("Location: sign_up.php?success=Your account has been created successfully");
                exit();
            }
            else {
                header("Location: sign_up.php?error=unknown error occurred&$user_data");
                exit();
            }
        }
        setcookie("email", $email, time() + (86400 * 30), "/");
        setcookie("password", $password, time() + (86400 * 30), "/");
        
    }

    $conn->close();
?>
