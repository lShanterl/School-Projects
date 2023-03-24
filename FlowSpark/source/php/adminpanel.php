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
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="../css/adminpanel.css">
</head>
<body>
    <nav class="navbar sticky"> 
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
    <div class="admin-center">
        <div class="admin-wrapper">
            <div class='box'>
                <div class="row"><h1>Movies</h1><h1>Search</h1></div>
                <div class="users">
                    <?php 
                        $sql = "SELECT * FROM movies";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo "<div class='mov'>";
                            echo "<h2>".$row['title']."</h2>";
                            echo "<div class='buttons'>";
                            echo "<button class='edit'>Edit</button>";
                            echo "<button class='delete'>Delete</button>";
                            echo "</div></div>";
                        }
                        
                    ?>
                </div>
            </div>
            <div class='box'>
                <h1>Add movie</h1>
                <div class="users">
                    <form action="" method=''>
                        <div class='row'>
                            <input type="text" name="title" placeholder="Title">
                            <input type="text" name="" placeholder="release date" title="yyyy-mm-dd">
                        </div>
                        <div class="row">
                            <input type="text" name="" placeholder="rating" >
                            <input type="text" name="" placeholder="duration" title="ex: 1h 52m">
                        </div>
                        <div class="row">
                            <div>
                                <input type="file" name="baner" >
                            </div>
                            <div>
                                <input type="file" name="hero"  >
                            </div>
                        </div>
                        <textarea name="short_summary" id="" placeholder="short summary" ></textarea>
                        <input type="submit" value="Add">     
                    </form>
                </div>
            </div>
            <div class='box'>
            <div class="row"><h1>Users</h1><h1>Search</h1></div>
                <div class="users">
                    <?php 
                        $sql = "SELECT * FROM users";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo "<div class='user'>";
                            echo "<p>".$row['name']." ".$row['surname']."</p>";
                            echo "<p>".$row['email']."</p>";
                            echo "<div class='buttons'>";
                            echo "<button class='edit'>Edit</button>";
                            echo "<button class='delete'>Delete</button>";
                            echo "</div>";
                            echo "</div>";
                        }
                    ?>
                </div>
            </div>         
        </div>
    </div>

</body>
</html>