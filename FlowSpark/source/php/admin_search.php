<?php
include "db.php";

if (isset($_GET['q'])) {
  $searchQuery = $_GET['q'];

    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }

    $sql = "SELECT * from movies where title like '%$searchQuery%'";
    $result = mysqli_query($conn, $sql);
    $row;
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<tr>";
            echo "<td><span class='user'>".$row['id']."</span></td>";
            echo "<td><span class='user'>".$row['title']."</span></td>";
            echo "<td><span class='user'>".$row['release_date']."</span></td>";
            echo "<td><span class='user'>".$row['rating']."</span></td>";
            echo "<td><span class='user'>".$row['length']."</span></td>";
            echo "<td>";
            echo "<span class='buttons user'>";
            echo "<button class='edit'>Edit</button>";
            echo "<button class='delete'>Delete</button>";
            echo "</span>";
            echo "</td>";
            echo '</tr>';
        }
    }   
}

?>