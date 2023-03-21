<?php
    include '../db.php';

    $available_movies = array();

    $sql = "SELECT * FROM movies";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $available_movies[] = $row;
        }
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        <input type="text" id="search" placeholder="Search...">
        <div id="search-results"></div>
    </form>


    <script>
        const searchInput = document.getElementById('search');
        const searchResults = document.getElementById('search-results');

        searchInput.addEventListener('input', () => {
        const searchQuery = searchInput.value.trim();

        if (searchQuery.length > 0) {
        // Send AJAX request to server
        const xhr = new XMLHttpRequest();
        xhr.open('GET', `search.php?q=${searchQuery}`);
        xhr.onload = () => {
            if (xhr.status === 200) {
                searchResults.innerHTML = xhr.responseText;
            }
        };
        xhr.send();
        } else {
            searchResults.innerHTML = '';
        }});
    </script>
</body>
</html>