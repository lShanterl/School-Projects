<?php
    include 'db.php';
    $title = $_POST['title'];
    $premiere = $_POST['premiere'];
    $rating = $_POST['rating'];
    $length = $_POST['length'];
    $baner;
    $hero ;
    $description = $_POST['description'];

    $hours = floor($length / 60);
    $minutes = $length % 60;
    $categories = ['action', 'adventure','comedy', 'crime', 'drama', 'fantasy', 'horror','mystery', 'sci-fi', 'thriller'];
    $categories_array = function() use ($categories){
        $array = [];
        foreach($categories as $category){
            if(isset($_POST[$category])){
                array_push($array, $category);
            }
        }
        return $array;
    };

    $categories = implode(", ", $categories_array());

    $hours  = $hours . 'h';
    $minutes = $minutes . 'm';

    if(isset($_FILES['baner'])){
        $target = "../../resources/movie_images/";
        $path = $_FILES['baner']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $filename = basename($path);

        $target = $target . $filename;

        if (move_uploaded_file($_FILES['baner']['tmp_name'], $target)){
            $baner = $filename;
        } 
        else {
            header("Location: ./adminpanel-movies.php?error=baner");
        }
    }
    if(isset($_FILES['hero'])){
        $target = "../../resources/movie_images/";
        $path = $_FILES['hero']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $filename = basename($path);

        $target = $target . $filename;

        if (move_uploaded_file($_FILES['hero']['tmp_name'], $target)){
            $hero = $filename;
        } 
        else {
            header("Location: ./adminpanel-movies.php?error=hero");
        }        
    }

    $sql = "INSERT INTO movies (title, release_date, rating, length, image_path, hero_path, short_summary, categories) VALUES ('$title', '$premiere', '$rating', '$hours $minutes', '$baner', '$hero', '$description', '$categories')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ./adminpanel-movies.php?success=movie_created");
    }

?>