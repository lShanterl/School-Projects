<?php
include "db.php";
include "fetch_movie.php";

if(isset($_GET['genre']) && isset($_GET['rating']))
    {
        $genre = $_GET['genre'];
        $rating = $_GET['rating'];
        $command = "";
        if($genre != "all" && $rating != "all")
        {
            $command = "WHERE categories like '%$genre%' AND rating >= $rating";
        }
        else if($genre != "all" && $rating == "all")
        {
            $command = "WHERE categories like '%$genre%'";
        }
        else if($genre == "all" && $rating != "all")
        {
            $command = "WHERE rating >= $rating";
        }
        else{
            fetch_movies();
            echo_movies($available_movies);
            exit();
        }
        fetch_movies($command);
        echo_movies($available_movies);
    }
    else
    {
        fetch_movies();
        echo_movies($available_movies);
    } 

?>