<?php 

$data = "k";

if(isset($_GET['q'])){
    $data = $_GET['q'];
}

$db = new mysqli("localhost", "root", "", "flowspark");

if($db->connect_error){
    die("Connection failed: " . $db->connect_error);
}

$sql = "SELECT * FROM movies WHERE title LIKE '%$data%' limit 1";


    $result = mysqli_query($db, $sql);

    while($row = mysqli_fetch_assoc($result)){
        echo $row['title'];
    }
?>