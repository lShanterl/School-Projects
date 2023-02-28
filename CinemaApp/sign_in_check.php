<?php

$servername = "localhost";
$user = "root";
$password = "";
$dbname = "Cinema";

$conn = new mysqli($servername, $user, $password, $dbname);

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE email='$email'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 0){
    header("Location: sign_in.php?error=The email is not registered");
    exit();
}
else{
    if (password_verify($password, $result->fetch_assoc()['password'])) {
        header("Location: index.php");
        exit();
    }
    else{
        header("Location: sign_in.php?error=Wrong password");
        exit();
    }
}

mysqli_close($conn);
?>