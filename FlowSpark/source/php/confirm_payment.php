<?php
    include 'db.php';

    if($_SESSION['seats'] == null){
        header("Location: ./tickets.php");
    }
    $seats_id = $_SESSION['seats_id'];
    $seats_id = explode(",", $seats_id);

    foreach($seats_id as $id)
    {
        $id = substr($id, 5);
        $sql = "UPDATE seats SET is_reserved=1 WHERE id=$id";
        mysqli_query($conn, $sql);
    }

?>