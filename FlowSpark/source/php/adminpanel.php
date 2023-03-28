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
    <nav class="navbar non-transparent"> 
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
    <div class="container">
            <div class="sidebar">
                <a href="">Users</a>
                <a href="">Movies</a>
                <a href="">Add movie</a>
                <a href="">View tickets</a>
            </div>
            <div class="content">
                <div class="searchbar-wrap">
                    <div class="searchbar">
                         <div class='filter-form'>
                            <div class="left">

                            </div>
                            <div class="right">
                                <span>Search</span>
                                <input type="text" name="search" id="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="users-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Email</th>
                                <th>Admin</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <?php 
                            $sql = "SELECT * FROM users";

                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo "<tr>";
                                echo "<td><span class='user'>".$row['id']."</span></td>";
                                echo "<td><span class='user'>".$row['name']."</span></td>";
                                echo "<td><span class='user'>".$row['surname']."</span></td>";
                                echo "<td><span class='user'>".$row['email']."</span></td>";
                                echo "<td><span class='user'>".$row['isAdmin']."</span></td>";
                                echo "<td>";
                                echo "<span class='buttons user'>";
                                echo "<a href=''><button class='edit'>Edit</button></a>";
                                echo "<a href=''><button class='delete'>Delete</button></a>";
                                echo "</span>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
                </div>
                <div class="paginator">

                </div>

            </div>
        </div>               
    </div>
</body>
</html>