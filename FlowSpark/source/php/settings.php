<?php
    include 'db.php';

    $email = $_COOKIE["email"];

    $sql = "SELECT * FROM users WHERE email like '$email'";

    $result = mysqli_query($conn, $sql);
    
    $row = mysqli_fetch_assoc($result);
 
    if($row == null)
    {
        header("Location: ./index.php");
        exit();
    }
    $name = $row['name'];
    $surname = $row['surname'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/settings.css">
    <link rel="stylesheet" href="../css/app.css">
</head>
<body>
    <nav class="navbar sticky"> 
            <div class="left">
                <a href="">Popular</a>
                <a href="">New</a>
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

    <div class="settings-wrapper">
        <div class="settings">
            <div class="user_details">
                <h1>Your Account</h1>
                <form action="" method="post">
                    <span>
                        <label for="name">Your name</label>
                        <input type="text" name="" value='<?php echo $name ?>'>
                    </span>
                </form>
            </div>
            <div class="menu">

            </div>
        </div>

    </div>
</body>
</html>