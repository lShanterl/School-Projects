<?php
    include 'db.php';
    $id = $_POST['id'];
    $sql = "SELECT * from users where id = $id";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);

        $arr = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'surname' => $row['surname'],
            'email' => $row['email'],
            'isAdmin' => $row['isAdmin'],
            'image_path' => $row['image_path'],
        );
        echo json_encode($arr);
    }




?>