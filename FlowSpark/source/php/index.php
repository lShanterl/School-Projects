<?php
    include 'db.php';
    include 'fetch_movie.php';
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
                    <a href="./ytickets.php">Your Tickets</a>
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
                    <p> Hello<span class='marked'> <?php echo GetUserName();?></span>! What are you looking for today?
                </div>
            </div>
        </div>
    </div>
    <div class="filter-wrap">
        <div class="filters">
                <div class='filter-form'>
                    <div class="left">
                        <span>
                            <select name="genre" id="genre">
                                <option value="all">All genres</option>
                                <option value="action">Action</option>
                                <option value="adventure">Adventure</option>
                                <option value="comedy">Comedy</option>
                                <option value="crime">Crime</option>
                                <option value="drama">Drama</option>
                                <option value="fantasy">Fantasy</option>
                                <option value="horror">Horror</option>
                                <option value="mystery">Mystery</option>
                                <option value="sci-fi">Sci-fi</option>
                                <option value="thriller">Thriller</option>
                            </select>
                        </span>
                        <span>
                            <select name="rating" id="rating">
                                <option value="all">All</option>
                                <option value="1">1+</option>
                                <option value="2">2+</option>
                                <option value="3">3+</option>
                                <option value="4">4+</option>
                                <option value="5">5+</option>
                                <option value="6">6+</option>
                                <option value="7">7+</option>
                                <option value="8">8+</option>
                                <option value="9">9+</option>
                                <option value="10">10</option>
                            </select>
                        </span>
                    </div>
                    <div class="right">
                        <input type="submit" value="Apply filters" id='filter-submit'>
                    </div>
                </div>
            </div>
    </div>
    <div class="wrap">
        
        <div class="movies-wrapper">
                <?php
                    //perform default query so that the page is not empty
                    fetch_movies();
                    echo_movies($available_movies);
                ?>
        </div>
        <span class="load-more-wrap">
            <input type="submit" value="Load more" id='load-more'>
        </span>
    </div>

    <footer class='wrapper'>
        <div class="footer">
            <div class="left">
                <h2>TODO</h2>
            </div>
        </div>

    </footer>

    <script src="../js/search_bar_handler.js"></script>
    <script src="../js/movies_handler.js"></script>
    <script src="../js/load_more.js"></script>
</body>
</html>