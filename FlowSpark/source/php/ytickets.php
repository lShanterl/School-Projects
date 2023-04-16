<?php
    include 'db.php';

    $sql = "SELECT * FROM users WHERE email='".$_COOKIE['email']."' AND auth_token='".$_COOKIE['auth_token']."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $sql = "SELECT * FROM seats INNER JOIN movie on seats.movie_id = movie.id INNER JOIN movies ON movie.movie_id = movies.id WHERE seats.user_id=".$row['id']." ORDER BY play_date ASC";
    $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Tickets</title>
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="../css/tickets.css">
</head>
    <style>
        body{
            display:block;
        }
        span{
            background: var(--primary-color);
        }
        .container{
            display: flex;
            flex-direction: column;
            align-items: center;
            height: auto;
            width: 100%;
        }
        .ticket{
            background-color: var(--primary-color-dark);
            color: var(--secondary-text-color);
       /* Pozdrawiam Admina! */
            height: 150px;
            display:flex;
            flex-direction:row;
            align-items: center;
            padding: 20px;
        }
        .tickets{
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            overflow-y: auto;
            height: 700px;
            width: 60%;
        }
        .ticket{
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    height: 5vh;
    background-color: rgba(0,0,0,.3);
    transition: ease-in-out 0.3s;
    margin: 10px 0px;
}
        .container {
        }
        span{
        }
        thead{

background-color: var(--primary-color);
z-index: 1;

}
thead tr, thead th{
border:none;
}
tr td:nth-child(1) span{
border-radius: 10px 0 0 10px;
}
tr td:nth-child(4) span{
border-radius: 0 10px 10px 0;
}

table, th, td {
border-collapse: collapse;
text-align: center;
color: var(--secondary-text-color);
font-size: 1.2rem;

}
table{
width: 90%;
height: 100%;
}

@media screen and (max-width: 1124px){
    .tickets{
        width: 100%;
    }
}
@media screen and (max-width: 768px){
    thead{
        display: none;
    }
    tbody tr{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    tbody tr td{
        width: 100%; 
    }
    tbody tr td .ticket{
        width: 100%;
        border-radius: 0px;
        margin: 0px 0px;
    }
    tbody tr td:nth-child(1) .ticket{
        border-radius: 10px 10px 0 0;
    }
    tbody tr td:nth-child(4) .ticket{
        border-radius: 0 0 10px 10px;
        margin-bottom: 10px;
    }

}
    </style>
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
    <div class="container" style='padding-top:15vh;'>
    <div class="tickets">
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Row</th>
                                <th>Number</th>
                            </tr>
                        </thead>
                        <?php 
                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo "<tr>";
                                echo "<td><span class='ticket'>".$row['title']."</span></td>";
                                echo "<td><span class='ticket'>".$row['play_date']."</span></td>";
                                echo "<td><span class='ticket'>".$row['row_number']."</span></td>";
                                echo "<td><span class='ticket'>".$row['seat_number']."</span></td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
                </div>
        </div>
    </div>
    <footer>
        <div class="left">
            <p>&#169; Flowspark 2023</p>
        </div>
        <div class="center">
            <div class="socials">
                <a href="">a</a>
                <a href="">b</a>
                <a href="">c</a>
            </div>
        </div>
    </footer>
    <script src="../js/burger_handler.js"></script>

</body>
</html>