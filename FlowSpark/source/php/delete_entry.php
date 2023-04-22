<?php
    include 'db.php';

    $id = $_POST['id'];

    $sql = "DELETE FROM movie WHERE id='$id'";
    mysqli_query($conn, $sql);

    header("Location: ./adminpanel.php?success=account deleted");
?>