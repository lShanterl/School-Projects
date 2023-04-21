<?php
    include 'db.php';
    include 'fetch_movie.php';

    $available_movies = $_SESSION['available_movies'];

    if (count($available_movies) > 0) {
        $rand = array_rand($available_movies, count($available_movies) > 5 ? 5 : count($available_movies));
        if (is_array($rand)) {
            foreach($rand as $value) {
                movie($value, $available_movies);
                unset($available_movies[$value]);
            }
        }
    } else {
        
    }
    $_SESSION['available_movies'] = $available_movies;
?>