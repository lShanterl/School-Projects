<?php
    include 'db.php';

    $title = $_POST['title'];
    $play_date = $_POST['dat'];
    $hall = $_POST['hall'];
    $cinema_hall_id;
    $movie_id;
    $entry_id;

    $sql = "SELECT * from movies where title = '$title'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) < 0)
    {
        header("Location: ./adminpanel_movie_entries.php?error=movie");
    }
    else {
        $movie_id = mysqli_fetch_assoc($result)['id'];
        $sql = "SELECT * from cinema_hall where name = '$hall'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) < 0)
        {
            header("Location: ./adminpanel_movie_entries.php?error=hall");
        }
        else {
            $row = mysqli_fetch_assoc($result);
            $cinema_hall_id = $row['id'];
            $total_rows = $row['total_rows'];
            $seats_per_row = $row['seats_per_row'];

            $sql = "INSERT INTO movie(cinema_hall_id, movie_id, play_date) VALUES ('$cinema_hall_id', '$movie_id', '$play_date')";
            $result = mysqli_query($conn, $sql);

            $sql = "SELECT * from movie where cinema_hall_id = '$cinema_hall_id' and movie_id = '$movie_id' and play_date = '$play_date'";
            $result = mysqli_query($conn, $sql);
            $entry_id = mysqli_fetch_assoc($result)['id'];

            for($i = 0; $i < $total_rows; $i++)
            {
                for($j = 0; $j < $seats_per_row; $j++)
                {
                    $sql = "INSERT INTO seats(cinema_hall_id, row_number, seat_number, movie_id) VALUES ('$cinema_hall_id', '$i', '$j', '$entry_id')";
                    $result = mysqli_query($conn, $sql);
                }
            }


            header("Location: ./adminpanel_movie_entries.php?success=movie");
        }
    }
    
?>