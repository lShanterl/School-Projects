<?php
    if (!empty($_FILES) && isset($_FILES['avatar'])) {

        $target = "../../resources/user_images/";
        $path = $_FILES['avatar']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $filename = $_COOKIE['email'] . "." . $ext;

        $target = $target . $filename;

        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $target)){
            header("Location: ../php/settings.php?avatar=success");
        } 
        else {
            header("Location: ../php/settings.php?avatar=error");
        }
    }
    else {
        header("Location: ../php/settings.php");
    }
?>