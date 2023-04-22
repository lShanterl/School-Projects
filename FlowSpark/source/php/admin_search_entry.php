<?php
include "db.php";

if (isset($_GET['q'])) {
  $searchQuery = $_GET['q'];

    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }
    $sql = "SELECT *, movie.id as id_main FROM movie inner join cinema_hall on movie.cinema_hall_id = cinema_hall.id inner join movies on movie.movie_id = movies.id WHERE movies.title LIKE '%$searchQuery%' OR cinema_hall.name LIKE '%$searchQuery%' OR cinema_hall.name LIKE '%$searchQuery%' OR movie.play_date LIKE '%$searchQuery%' ORDER BY movie.id";
    $result = mysqli_query($conn, $sql);
    $row;
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<tr>";
            echo "<td><span class='user'>".$row['id_main']."</span></td>";
            echo "<td><span class='user'>".$row['title']."</span></td>";
            echo "<td><span class='user'>".$row['play_date']."</span></td>";
            echo "<td><span class='user'>".$row['name']."</span></td>";
            echo "<td>";
            echo "<span class='buttons user'>";
            echo "<button class='edit'>Edit</button>";
            echo "<button class='delete'>Delete</button>";
            echo "</span>";
            echo "</td>";
            echo "</tr>";
        }
    }   
}

?>