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
        display:flex;
        font-size: 20px;
        align-items: center;
        justify-content: center;
        white-space: nowrap;   
    }
    h1{
        text-align: center;
    }
    .container{
        position:relative;
        gap: 35px;
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
        font-size: 1.2rem;
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
        color: var(--secondary-text-color);
        font-size: 1.2rem;
        gap: 20px;
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
        height: 100%;
    }
    .mark{
        color: var(--button-color);
    }
</style>
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
        <div class="right">
            <?php if($cookie){ ?>
                <a href="./logout.php"><button class='login'>Log out</button></a>
                <?php if($admin == 1){ ?>
                        <a href="./adminpanel.php"><button class='login'>Admin</button></a>
                <?php } ?>
                <a href="./settings.php"><img class='avatar' draggable="false" src=<?php echo GetIcon()?> alt=""></a>
            <?php }else{ ?>
                <a href="./login.php"><button class='login'>Log in</button></a>
                <a href="./signup.php"><button class='login'>Sign up</button></a>
            <?php } ?>
        </div>
</nav>
        <?php

        ?>
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
</body>
</html>