<?php
    $available_movies = array();
    define("movie_path", "../../resources/movie_images/");

    function fetch_movies($condition = "")
    {
        global $conn;
        global $available_movies;

        $sql = "SELECT * FROM movies ".$condition;
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $available_movies[] = $row;
            }
        } 
    }

    function movie($value, $available_movies)
    {
        $movie = $available_movies[$value];
                echo "<div class='card'>
                        <img src=".movie_path.$movie['image_path'].">
                        <div class='descriptions'>
                            <h1>".$movie['title']."</h1>
                            <p>
                                ".$movie['short_summary']."
                            </p>
                            <a href=./movie.php?id=".$movie['id']."><button class='info'>more information</button></a>
                        </div>
                    </div>";
    }

    function echo_movies($available_movies)
    {
        if(count($available_movies) > 1)
        {
            $rand = array_rand($available_movies, count($available_movies) > 10 ? 10 : count($available_movies));
            shuffle($rand);

            foreach($rand as $value)
            {
                movie($value, $available_movies);
                unset($available_movies[$value]);
            }
        }
        else if(count($available_movies) == 1){
            movie(0, $available_movies);
            unset($available_movies[0]);
        }
        $_SESSION['available_movies'] = $available_movies;
    }
?>