<?php
    include 'db.php';

    setcookie("email", "", time()-3600, '/');
    setcookie("auth_token", "", time()-3600, '/');
    unset($_COOKIE["email"]);
    unset($_COOKIE["auth_token"]);

    header("Location: ./index.php");

?>