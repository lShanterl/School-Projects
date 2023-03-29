<?php
    include 'db.php';
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Ticket</title>
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="../css/tickets.css">
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
    <div class="container">
            <div class="movie">

            </div>
            <div class="seats">
                <?php

                    $sql = "SELECT * FROM seats where cinema_hall_id = 1";

                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        if($row['row_number'] == 4){
                            var_dump($row['row_number']);
                        }
                        ?>
                        <button class="seat" style='<?php echo $row['row_number']?> / <?php echo $row['seat_number'] ?> / <?php echo $row['row_number'] ?> / <?php echo $row['seat_number'] ?>'><?php echo $row['seat_number'] ?></button>
                    <?php } ?>

            </div>
    </div>  
</body>
</html>