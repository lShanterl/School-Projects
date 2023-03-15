<?php
    include 'db.php';
    
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
            <a href="">Popular</a>
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
                <a href="./settings.php"><img class='avatar' src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRtEbTLfMii3TQW5ambR0PD6FlRMPcUFzDy_g&usqp=CAU" alt=""></a>
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
                    <p>FlowSpark is a cinema near Ohio in which you can watch movies any time</p>
                </div>
            </div>
        </div>
    </div>

    <div class="movies">

    </div>

</body>
</html>