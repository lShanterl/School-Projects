<?php
    include 'db.php';

    setcookie("email", "", time()-3600, '/');
    unset($_COOKIE["email"]);

    header("Location: ./index.php");

?>