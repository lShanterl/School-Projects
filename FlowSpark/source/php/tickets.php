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
    <title>FlowSpark</title>
    <link rel="icon" href="../../resources/images/favicon.ico" type="image/x-icon">
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
        .buttons button{
            border: none;
            background-color: var(--primary-color-dark);
            color: var(--secondary-text-color);
            font-weight: 500;
            border-radius: 5px;
            cursor: pointer;
            transition: ease-in-out 0.2s;
        }
        .buttons button:hover{
            color: var(--primary-color);
            background-color: var(--secondary-text-color);
            cursor:pointer;
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
                Deselect all
            </button>
            <button class="next">
                Next
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
    <footer>
        <div class="left">
            <p>&#169; Flowspark 2023</p>
        </div>
        <div class="center">
            <div class="socials">
                <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill='#fff'><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg></a>
                <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill='#fff'><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>
                <a href=""><svg width="30" height="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill-rule="evenodd" fill='#fff'><path d="M12 0c-6.627 0-12 4.975-12 11.111 0 3.497 1.745 6.616 4.472 8.652v4.237l4.086-2.242c1.09.301 2.246.464 3.442.464 6.627 0 12-4.974 12-11.111 0-6.136-5.373-11.111-12-11.111zm1.193 14.963l-3.056-3.259-5.963 3.259 6.559-6.963 3.13 3.259 5.889-3.259-6.559 6.963z"/></svg></a>
            </div>
        </div>
    </footer>
    <script src="../js/tickets.js"></script>
    <script src="../js/burger_handler.js"></script>
</body>
</html>