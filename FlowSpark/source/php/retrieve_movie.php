<?php
    include 'db.php';
    $id = $_POST['id'];
    $sql = "SELECT * from movies where id = $id";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);

        $arr = array(
            'id' => $row['id'],
            'title' => $row['title'],
            'release_date' => $row['release_date'],
            'rating' => $row['rating'],
            'length' => (function() use($row){
                $length = $row['length'];
                if($length == 'Series')
                    return 0;
                $parts = explode(" ", $length);
                $hours = intval(str_replace('h', '', $parts[0]));
                $minutes = intval(str_replace('m', '', $parts[1]));
                $length = $hours * 60 + $minutes;
                return $length;
            })(),
            'image_path' => $row['image_path'],
            'hero_path' => $row['hero_path'],
            'short_summary' => $row['short_summary'],
            'categories' => $row['categories'],
            'baner' => $row['image_path'],
            'hero' => $row['hero_path']
        );
        echo json_encode($arr);
    }




?>