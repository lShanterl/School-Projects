<?php
    include "db.php";
    $sql = "SELECT * FROM movies WHERE id=".$_GET['id'].";";
    $result = mysqli_query($conn, $sql);
    $movie;

    if (mysqli_num_rows($result) > 0) {
        $movie = mysqli_fetch_assoc($result);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $movie['title'] ?></title>
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="../css/movie.css">
</head>
<body>
<nav class="navbar" > 
        <div class="left">
            <a href="./index.php">FlowSpark</a>
            <?php if($cookie){ ?>
                <a href="./ytickets.php">Your Tickets</a>
            <?php } ?>
            <?php if($admin == 1){ ?>
                <a href="./adminpanel.php">Admin</a>
            <?php } ?>
        </div>
        <div class="mid">
            <button class="burger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
        </div>
        <div class="right">
            <?php if($cookie){ ?>
                <a href="./logout.php"><button class='login'>Log out</button></a>

                <a href="./settings.php"><img class='avatar' src=<?php echo GetIcon()?> alt=""></a>
            <?php }else{ ?>
                <a href="./login.php"><button class='login'>Log in</button></a>
                <a href="./signup.php"><button class='login'>Sign up</button></a>
            <?php } ?>
            
        </div>
    </nav>
    <div class="wrap1">
        <div class="burger_menu">
            <ul>
                <li><a href="./index.php">Flowspark</a></li>
                <li><a href="./ytickets.php">Your Tickets</a></li>
                <?php if($cookie){ ?>
                    <?php if($admin == 1){ ?>
                        <li><a href="./adminpanel.php">Admin</a></li>
                        <?php } ?>
                        <li><a href="./settings.php">Settings</a></li>
                    <li><a href="./logout.php"><button class='login'>Log out</button></a></li>
                <?php }else{ ?>
                <li><a href="./login.php"><button class='login'>Log in</button></a></li>
                <li><a href="./signup.php"><button class='login'>Sign up</button></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="hero-movie" style="background-image:url(<?php echo $movie_path . $movie['hero_path']?>)">
        <div class="filter-movie">
            <div class="hero-text-wrapper-movie">
                <div class="hero-text-movie">
                    <div>
                    <h1><?php echo $movie['title']?></h1>
                    <p class='summary'><?php echo $movie['short_summary']?></p>
                    <div class="attributes-wrap">
                        <p class="categories">
                            <?php
                                $categories = explode(",", $movie['categories']);
                                foreach($categories as $category){
                                    echo "<span class='category'>".$category."</span>";
                                }
                            ?>
                        </p>
                        <div class="data_wrap">
                            <div class="duration"><?php echo $movie['length']?></div>
                            <div class='release_date'><?php echo $movie['release_date']?></div> 
                            <div class="rating"> <?php echo $movie['rating']?>/10.0</div>
                        </div>
                        <div class="buttons">
                            <a href="<?php echo $movie['trailer_link']?>" target='_blank'><button>Watch Trailer</button></a>
                            <a href="select_date.php?id=<?=$movie['id']?>"><button>Buy Tickets</button></a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <script src="../js/burger_handler.js"></script>

</body>
</html>