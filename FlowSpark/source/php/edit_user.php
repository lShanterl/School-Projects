<?php
    include 'db.php';
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $isAdmin = $_POST['admin'];
    $avatar;
    $password;
    $re_password;

    if(isset($_POST['password']) && isset($_POST['re_password'])){
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

    if(isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK){
        $target = "../../resources/movie_images/";
        $path = $_FILES['avatar']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $filename = basename($path);

        $target = $target . $filename;

        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $target)){
            $avatar = $filename;
        } 
        else {
            header("Location: ./adminpanel-movies.php?error=avatar");
        }
    }
    $sql = "UPDATE users SET name = '$name', surname = '$surname', email = '$email', isAdmin = '$isAdmin'".(isset($avatar) ? ", image_path = $avatar" : ''). (!$password == null ? ",password = $password" : '')  ." WHERE id = $id";

    if(mysqli_query($conn, $sql)){
        header("Location: ./adminpanel.php?success=edit");
    }
    else{
        header("Location: ./adminpanel.php?error=edit");
    }


?>