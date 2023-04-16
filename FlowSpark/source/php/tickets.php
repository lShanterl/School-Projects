<?php
    include 'db.php';
    $id;
    if(isset($_GET['id']))
    {
        $sql = "SELECT movie.*, movies.* from movie inner join movies on movie.movie_id = movies.id where movie.id = ".$_GET['id'];
    }
    else{
        header("Location: ./index.php");
    }
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
            display:block;
            height:auto;
        }
        .body_wrap{
            display: flex;
            align-items: center;
            justify-content: center;
            height: auto;
            width: 100%;
            height: 100vh;
        }
        @media screen and (max-width: 1200px){
            .body_wrap{
                height: auto;
            }
        }
    </style>
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
    <div class="body_wrap">
        
    <div class="container">
            <div class="movie">
                <span id='title'><?=$row['title']?> </span><span id='date'>&nbsp; <?=$row['play_date']?></span>
            </div>
                <?php 
                    $sql = "SELECT * from movie where id = ".$_GET['id'];
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $sql = "SELECT * FROM cinema_hall where id = ".$row['cinema_hall_id'];
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                ?>
                <div class="seats-wrapper">
        <div class="seats" style='grid-template-columns: repeat(<?php echo $row['seats_per_row']; ?>, 25px); grid-template-rows: repeat(<?php echo $row['total_rows']; ?>, 25px);'>
            <?php
                $sql = "SELECT * FROM seats where movie_id = ".$_GET['id'];
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
            ?>
            <span style='<?php echo $row['row_number']?> / <?php echo $row['seat_number'] ?> / <?php echo $row['row_number'] ?> / <?php echo $row['seat_number'] ?>'>
                <input type="checkbox" <?php if($row['is_reserved']){echo 'disabled';}?> id="seat-<?php echo $row['id']?>" name="seats[]" value="<?php echo $row['row_number'];?>-<?php echo $row['seat_number'];?>">
                <label for="seat-<?php echo $row['id']; ?>" data-seat-number="<?php echo $row['seat_number'];?>"></label>
            </span>
            <?php } ?>
        </div>
        
    </div>
    <div class="buttons">
            <button class="deselect">
                <span>Deselect all</span>
            </button>
            <button class="next">
                <span>Next</span>
            </button>
        </div>
    <?php
        // $cinema_hall1 = [10,20];
        // $cinema_hall2 = [11,18];
        // $cinema_hall3 = [13,25];
        // //movies = 1-16
        // $sql = "SELECT * FROM movie";
        // $result = mysqli_query($conn, $sql);

        // while($row = mysqli_fetch_assoc($result))
        // {
        //     $movie_id = $row['id'];
        //     $cinema_hall_id = $row['cinema_hall_id'];
        //     $sql = "SELECT * FROM cinema_hall where id = ".$cinema_hall_id;
        //     $result1 = mysqli_query($conn, $sql);
        //     $row1 = mysqli_fetch_assoc($result1);
        //     $seats_per_row = $row1['seats_per_row'];
        //     $total_rows = $row1['total_rows'];

        //         for($i = 1; $i <= $total_rows; $i++)
        //         {
        //             for($j = 1; $j <= $seats_per_row; $j++)
        //             {
        //                 $sql = "INSERT INTO seats (movie_id, cinema_hall_id, row_number, seat_number) VALUES ($movie_id, $cinema_hall_id, $i, $j)";
        //                 mysqli_query($conn, $sql);
        //             }
        //         }
        // }

        // $sql = "SELECT * FROM seats";
        // $result = mysqli_query($conn, $sql);
        // while($row = mysqli_fetch_assoc($result))
        // {
        //     $rand = rand(0,10);

        //     if($rand >=8)
        //     {
        //         $sql = "UPDATE seats SET is_reserved = 1 where id = ".$row['id'];
        //         mysqli_query($conn, $sql);
        //     }

        // }
        
    ?>      
    </div>  
    </div>  

    <script src="../js/tickets.js"></script>
    <script src="../js/burger_handler.js"></script>
</body>
</html>