<?php
    include 'db.php';

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
    <title>FlowSpark</title>
    <link rel="stylesheet" href="../css/app.css">
</head>
<body>
    <nav class="navbar" > 
        <div class="left">
            <a href="./index.php">FlowSpark</a>
            <?php if($cookie){ ?>
                    <a href="./tickets.php">Your Tickets</a>
                <?php } ?>
            <?php if($cookie){ ?>
                <a href="./watchlist.php">Your Watchlist</a>
            <?php } ?>
        </div>
        <div class="mid">
            <!-- Mobile navbar part -->
        </div>
        <div class="right">
            <div>
                <input type="text" id="search" placeholder="Search..." name='search'>
                <div id="search-results"></div>
            </div>
            <?php if($cookie){ ?>
                <a href="./logout.php"><button class='login'>Log out</button></a>
                <?php if($admin == 1){ ?>
                        <a href="./adminpanel.php"><button class='login'>Admin</button></a>
                <?php } ?>
                <a href="./settings.php"><img class='avatar' src=<?php echo GetIcon()?> alt=""></a>
            <?php }else{ ?>
                <a href="./login.php"><button class='login'>Log in</button></a>
                <a href="./signup.php"><button class='login'>Sign up</button></a>
            <?php } ?>
            
        </div>
    </nav>
    <div class="hero">
        <div class="filter">
            <div class="hero-text-wrapper">
                <div class="hero-text">
                    <h1>FlowSpark</h1>
                    <p> Hello<span class='marked'> <?php echo GetUserName();?></span>! What are you looking for today? <br> Let's check what's new down there.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="wrap">
        <h1>Popular movies</h1>
        <div class="movies-wrapper">
                <?php 

                    $rand = array_rand($available_movies, 10);

                    foreach($rand as $value)
                    {
                        $movie = $available_movies[$value];
                        echo "<div class='card'>
                                <img src=".$movie_path.$movie['image_path'].">
                                <div class='descriptions'>
                                    <h1>".$movie['title']."</h1>
                                    <p>
                                        ".$movie['short_summary']."
                                    </p>
                                    <a href=./movie.php?id=".$movie['id']."><button class='info'>more information</button></a>
                                </div>
                            </div>";
                    }           
                ?>
        </div>
    </div>

    <script src="../js/search_bar_handler.js"></script>
</body>
</html>