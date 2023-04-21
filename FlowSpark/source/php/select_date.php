<?php
    include 'db.php';
    if(!isset($_COOKIE['email']) || !isset($_COOKIE['auth_token'])){
        header("Location: ./login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="../css/tickets.css">
    <style>
        .movie a.date{
            width:100%;
            text-align:center;
            font-size: 1.5rem;
            font-weight: 500;
            border: 2.5px solid var(--secondary-text-color);
            height: 4.5rem;
            display:flex;
            align-items:center;
            justify-content:center;
            text-decoration:none;
            color: var(--secondary-text-color);
        }
        .movie a.date:hover{
            background-color: var(--secondary-text-color);
            color: var(--primary-color-dark);
            cursor:pointer;
        }
        .con{
            height:100%;
            background-color: var(--primary-color-dark);
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
<div class="container">
    <div class="con">
    <div class="movie">
        <?php 
            if(isset($_GET['id']))
            {
                $sql = "SELECT movies.title as title FROM movie inner join movies on movie.movie_id = movies.id WHERE movies.id = ".$_GET['id'];
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) == 0)
                {
                    echo "<div class='movie'>";
                    echo "<span class='title'>No movies found</span>";
                    echo "</div>";
                    exit();
                }

                $row = mysqli_fetch_assoc($result);
                echo "<span class='title'>".$row['title']."</span>";
            }   
        ?>
    </div>
                <?php 
                if(isset($_GET['id']))
                {          
                    $sql = "SELECT movie.* FROM movie inner join movies on movie.movie_id = movies.id WHERE movies.id = ".$_GET['id'];      
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        if(date_diff(date_create($row['play_date']), date_create(date("Y-m-d")))->format("%R%a") <= 0)
                        {
                            echo "<div class='movie'>";
                            echo "<a href='tickets.php?id=$row[id]' class='date'>".$row['play_date']."</a>";
                            echo "</div>";
                        }
                        else{
                            $sql = "DELETE FROM movie WHERE id = $row[id]";
                            mysqli_query($conn, $sql);

                        }

                    }
                }

                ?>
    </div>
            
 
    </div>  
    <script src="../js/burger_handler.js"></script>

</body>
</html>