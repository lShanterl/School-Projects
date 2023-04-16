<?php

include 'db.php';
    if($_SESSION['seats'] == null){
        header("Location: ./tickets.php");
    }
    $seats = $_SESSION['seats'];
    $seats = explode(",", $seats);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="../css/tickets.css">
</head>
<style>
    div{
        font-size: clamp(1rem, 2vw, 1.5rem);   
    }
    h1{
        text-align: center;
    }
    .container{
        position:relative;
        gap: 35px;
        height: auto;
    }
    .buttons{
        width:100%;
        display: flex;
        justify-content: space-between;
        
    }
    .buttons .btn{
        width: 100%;
        height: 50px;
        border: none;
        background-color: var(--primary-color-dark);
        color: var(--secondary-text-color);
        font-weight: 500;
        border-radius: 5px;
        cursor: pointer;
        transition: ease-in-out 0.2s;
    }
    .buttons .btn:hover{
        background-color: var(--secondary-text-color);
        color: var(--primary-color-dark);
    }
    .buttons a{
        width: 50%;
        text-decoration: none;
    }
    .data{
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: stretch;
        color: var(--secondary-text-color);
        gap: 20px;
        position: relative;
    }
    .data .box{
        width: 50%;
        display:flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: var(--primary-color-dark);
        border-radius: 5px;
        padding: 25px 0px;
    }
    .mark{
        color: var(--button-color);
    }
    
    @media screen and (max-width: 600px){
        .data .box{
            width: 100%;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .data{
            flex-direction: column;
            justify-content: center;
        }
        .buttons{
            flex-direction: column;
            width: 100%;
        }
        .buttons a{
            width: 100%;
        }
        .container{
            width: 90%;
        }
        div{
            white-space: normal;
        }
        
    }
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
            .container{
                margin-top: 15vh;;
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
        <?php

        ?>
        <div class="body_wrap">

        <div class="container">
            <h1 class='mark'>Your Order</h1>
            <div class="data">
                <div class="box" style='width:100%;'>
                    <div><span class='mark'>Title: </span> &nbsp; <?php echo $_SESSION['title'] ?></div>
                    <div><span class='mark'>Date: &nbsp; </span><?= $_SESSION['date']?></div>
                </div>
            </div>
            <div class="data">
                <div class="box">
                    <div class='mark'>Seats [Row-Seat]</div>
                    <?php 
                        echo "<div style='white-space: normal'>";
                        foreach($seats as $seat){
                            echo '['. $seat.']' . "  ";
                        }
                        echo "</div>";
                    
                    ?>
                </div>
                <div class="box">
                    <div><span class='mark'>Price: &nbsp; </span>
                    <?php 
                        $price = 10.0 * count($seats);
                        echo $price . "€";
                    
                    ?></span></div>
                </div>
            </div>
            <div class="buttons">
                <a href="./tickets.php"><button class="btn">Cancel</button></a>
                <a href="./confirm_payment.php"><button class="btn">Confirm</button></a>
            </div>
        </div>
        
        <script src="../js/burger_handler.js"></script>
</body>
</html>