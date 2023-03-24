<?php
include "db.php";

if (isset($_GET['q'])) {
  $searchQuery = $_GET['q'];

    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }

    $sql = "SELECT id, title from movies where title like '%$searchQuery%' limit 4";
    $result = mysqli_query($conn, $sql);
    $row;
    echo '<ul class="search-result">';
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<li><a href=./movie.php?id=".$row['id']."><button class='info'>".$row['title']."</button></a></li>";
        }
    }
    else{
        echo "<li><a><button class='info'>No Result Found</button></a></li>";
    }
    echo '</ul>';
    
}

?>