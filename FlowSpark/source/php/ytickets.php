<?php
    include 'db.php';

    $sql = "SELECT * FROM users WHERE email='".$_COOKIE['email']."' AND auth_token='".$_COOKIE['auth_token']."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $sql = "SELECT * FROM seats WHERE user_id=".$row['id'];
    $result = mysqli_query($conn, $sql);

    while( $row = mysqli_fetch_assoc($result) )
    {
        echo $row['seat_number'].' ';
    }

?>