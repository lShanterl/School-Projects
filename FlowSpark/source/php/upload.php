<?php
    include 'db.php';

    if (isset($_FILES['avatar'])){

        $target = "../../resources/user_images/";
        $path = $_FILES['avatar']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $filename = $_COOKIE['email'] . "." . $ext;

        $target = $target . $filename;

        var_dump($target);

        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $target)){
            $sql = "UPDATE users SET image_path = '" . $target . "' WHERE email ='" . $_COOKIE['email']."';";

            $result = mysqli_query($conn, $sql);

            if($result)
            {
                header("Location: ../php/settings.php?avatar=error");
            }

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