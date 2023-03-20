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
                    <a href="./settings.php"><img class='avatar' src=<?php echo GetIcon()?> alt=""></a>
                <?php }else{ ?>
                    <a href="./login.php"><button class='login'>Log in</button></a>
                    <a href="./signup.php"><button class='login'>Sign up</button></a>
                <?php } ?>
            </div>
    </nav>

</body>
</html>