<?php
    include 'db.php';
    $id = $_POST['id'];
    $sql = "SELECT *, movie.id as id_main FROM movie inner join cinema_hall on movie.cinema_hall_id = cinema_hall.id inner join movies on movie.movie_id = movies.id where movie.id = $id";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);

        $arr = array(
            'id' => $row['id_main'],
            'name' => $row['name'],
            'title' => $row['title'],
            'play_date' => $row['play_date'],
        );
        echo json_encode($arr);
    }
    else {
        $arr = array(
            'id' => 0,
            'name' => 'No movie found',
            'title' => 'No movie found',
            'play_date' => 'No movie found',
            'cinema_hall_name' => 'No movie found',
        );
        echo json_encode($arr);
    }
?>