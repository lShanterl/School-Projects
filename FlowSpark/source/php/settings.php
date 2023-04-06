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
    $email = $row['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="../css/settings.css">
    <link rel="stylesheet" href="../css/app.css">
</head>
<body>
    <nav class="navbar"> 
            <div class="left">
                <a href="./index.php">FlowSpark</a>
                <?php if($cookie){ ?>
                    <a href="./tickets.php">Your Tickets</a>
                <?php } ?>
            </div>
            <div class="mid">
                <!-- Mobile navbar part -->
            </div>
            <div class="right">
                <?php if($cookie){ ?>
                    <a href="./logout.php"><button class='login'>Log out</button></a>
                    <?php if($admin == 1){ ?>
                        <a href="./adminpanel.php"><button class='login'>Admin</button></a>
                    <?php } ?>
                    <a href="./settings.php"><img class='avatar' src=<?php echo GetIcon() ?> alt=""></a>
                <?php }else{ ?>
                    <a href="./login.php"><button class='login'>Log in</button></a>
                    <a href="./signup.php"><button class='login'>Sign up</button></a>
                <?php } ?>
            </div>
    </nav>

    <div class="settings-wrapper">
        <div class="settings">
            <div class="user_details" id='ud'>
                <h1>Your Account</h1>
                <form action="update_settings.php" method="post" class=''>
                    <span class="form-wrapper">
                        <span class='value-wrap'>
                            <label for="name">Your name</label>
                            <input type="text" name="name" value='<?php echo $name ?>'>
                        </span>
                        <span class='value-wrap'>
                            <label for="name">Your Surname</label>
                            <input type="text" name="surname" value='<?php echo $surname ?>'>
                        </span>
                    </span>
                    <span class='value-wrap'>
                        <label for="name">Your Email</label>
                        <input type="text" name="email" value='<?php echo $email ?>'disabled>
                    </span>
                    <div class='change'>
                        <input type="submit" value="Save">
                </div>
                </form>
            </div>
            <div class="menu">
                <img class='avatar-setting' src=<?php echo GetIcon() ?> alt="">
                <form action="./upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" name='avatar' id='avatar' class='hidden'/>
                    <label for="avatar">Select file</label>
                    <input type="submit" value="Upload Image">
                </form>
                <button class="menu-button account-details active">Account details</button>
                <button class="menu-button password">Password</button>
            </div>
        </div>

    </div>
    <script src='../js/change_settings.js'></script>
</body>
</html>