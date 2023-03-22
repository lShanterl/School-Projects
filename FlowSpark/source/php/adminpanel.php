<?php
    include "db.php";
    $sql = "SELECT isAdmin FROM users WHERE email = '".$_COOKIE['email']."';";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $admin = $row['isAdmin'];
        if($admin == 0){
            header("Location: ../index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
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
    <div class="hero-movie" style="background-image:url(<?php echo $movie_path . $movie['hero_path']?>)">
        <div class="filter-movie">
            <div class="hero-text-wrapper-movie">
                <div class="hero-text-movie">
                    
                </div>
            </div>
        </div>
    </div>

</body>
</html>