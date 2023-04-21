<?php
    include 'db.php';

    $id = $_POST['id'];

    $sql = "DELETE FROM movies WHERE id='$id'";
    mysqli_query($conn, $sql);

    header("Location: ./adminpanel-movies.php?success=movie deleted");
?>