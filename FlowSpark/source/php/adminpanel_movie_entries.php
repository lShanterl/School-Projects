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
    <title>FlowSpark</title>
    <link rel="icon" href="../../resources/images/favicon.ico" type="image/x-icon">    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="../css/adminpanel.css">
    <style>
        .modal{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            display: none;
        }
        .active{
            display: flex;
        }
        .modal .modal_form input{
            font-size: 1.5rem;
        }
        .modal .modal_form label{
            font-size: 1.5rem;
        }
        .modal .modal_form input[type='submit']
        {
            width: 100%;
            height: 50px;
            border: none;
            background-color: var(--primary-color-dark);
            color: var(--secondary-text-color);
            font-weight: 500;
            border-radius: 5px;
            cursor: pointer;
            transition: ease-in-out 0.2s;
            border: 2.5px solid var(--secondary-text-color);
            padding: 10px;
        }
        .modal .modal_form input[type='submit']:hover{
            background-color: var(--secondary-text-color);
            color: var(--primary-color-dark);
        }
        .modal button{
            border: none;
        }
        .modal .close_button{
            position: absolute;
            top: 0;
            right: 0;
            background-color: var(--primary-color-dark);
            color: var(--secondary-text-color);
            font-weight: 500;
            cursor: pointer;
            transition: ease-in-out 0.2s;
            margin: 25px;  
            display:flex;
            align-items: center;
            justify-content: center; 
        }
        .modal .modal_form{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 65vw;
            height: 65vh;
            background-color: var(--primary-color-dark);
            color: var(--secondary-text-color);
            font-weight: 500;
            border-radius: 5px;
            transition: ease-in-out 0.2s;
            border: 2.5px solid var(--secondary-text-color);
            display:flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            padding: 20px;
            gap: 20px;
        }
        .row{
            display:flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            margin: 10px;
            gap: 30px;
            width: 100%;
        }
        .modal .modal_form input, .modal .modal_form label.perm{
            width: 100%;
            height: 50px;
            border: none;
            background-color: var(--primary-color-dark);
            color: var(--secondary-text-color);
            font-weight: 500;
            border-radius: 5px;
            transition: ease-in-out 0.2s;
            border: 2.5px solid var(--secondary-text-color);
            padding: 10px;
        }
        button.perm{
            width: 100% !important;
            height: 50px !important;
            border: none !important;
            background-color: var(--primary-color-dark) !important;
            color: var(--secondary-text-color) !important;
            font-weight: 500 !important;
            border-radius: 5px !important;
            transition: ease-in-out 0.2s !important;
            border: 2.5px solid var(--secondary-text-color) !important;
            padding: 10px !important;
            font-size: 1.5rem !important;
        }
        .close {
            display:flex;
            align-items: center;
            justify-content: center; 
        }
.close:hover {
  opacity: 1;
}
.close:before, .close:after {
  position: absolute;
  content: ' ';
  width: 2px;
  height: 30px;
  background-color: #333;
  transform: translate(-50%, -50%);
}
.close:before {
  transform: rotate(45deg);
}
.close:after {
  transform: rotate(-45deg);
}
.wrapp{
    width: 80%;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.column{
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 10px;
    width: 100%;
}
.column label{
    font-size: 1.5rem;
}
.hidden{
    display:none;
    width: 0px;
    height: 0px;
}
input[type='radio']:checked +label {
    background-color:  var(--secondary-text-color) !important;
    color: var(--primary-color-dark) !important;
    border: 2.5px solid var(--primary-color-dark) !important;
}
.perm{
    display:flex;
    align-items: center;
    justify-content: center;
}
tr td:nth-child(1) span{
    border-radius: 10px 0 0 10px;
}
tr td:nth-child(5) span{
    border-radius: 0 10px 10px 0;
}

tr td:nth-child(6) span{
    border-radius: 0px;
}
.search-result{
    width: 100%;
}
.hidden{
    width: 0px !important;
    height: 0px !important;
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
            <div class="sidebar">
                <a href="./adminpanel.php">Users</a>
                <a href="./adminpanel-movies.php">Movies</a>
                <a href="./adminpanel_movie_entries.php">Entries</a>
            </div>
            <div class="content">
                <div class="searchbar-wrap">
                    <div class="searchbar">
                         <div class='filter-form'>
                            <div class="left">
                                <button class="add_user">Add Entry</button>
                                <div class="modal">
                                    <form action="./create_entry.php" class="modal_form" method='POST'>
                                        <div class="wrapp">
                                            <div class="row" style='align-items:center;'>
                                                <div class="column" style='gap:0px;'>
                                                    <label for="title" style='margin-bottom:10px'>Title</label>
                                                    <input type="text" id="title" placeholder="Search..." name='title'>
                                                    <div id="results-title" style='position: relative'></div>
                                                </div>
                                                <div class="column" style='gap:0px;'>
                                                <label for="hall" style='margin-bottom:10px'>Cinema Hall</label>
                                                    <input type="text" id="hall" placeholder="Search..." name='hall'>
                                                    <div id="results-hall" style='position: relative'></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="column">
                                                    <label for="dat">Date</label>
                                                    <input type="datetime-local" name="dat" id="dat">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="column">
                                                    <button class='add'>Add</button>
                                                </div>
                                            </div>
                                            <button class="close_button close" type='button'>
                                            </button>  
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="right">
                                <input type="text" name="search" id="search" placeholder="Search..." style='text-align:left;'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="users-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Cinema Hall</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <?php 
                            $sql = "SELECT *, movie.id as id_main FROM movie inner join cinema_hall on movie.cinema_hall_id = cinema_hall.id inner join movies on movie.movie_id = movies.id ORDER BY movie.id";

                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result))
                            {
                                if(date_diff(date_create($row['play_date']), date_create(date("Y-m-d")))->format("%R%a") <= 0)
                                {
                                }
                                else{
                                    $sql2 = "DELETE FROM movie WHERE id = ".$row['id_main'];
                                    mysqli_query($conn, $sql2);
                                    continue;
                                }
                                echo "<tr>";
                                echo "<td><span class='user'>".$row['id_main']."</span></td>";
                                echo "<td><span class='user'>".$row['title']."</span></td>";
                                echo "<td><span class='user'>".$row['play_date']."</span></td>";
                                echo "<td><span class='user'>".$row['name']."</span></td>";
                                echo "<td>";
                                echo "<span class='buttons user'>";
                                //echo "<button class='edit'>Edit</button>";
                                echo "<button class='delete'>Delete</button>";
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
    <script>
        const add_button = document.querySelector('.add_user');
        const modal = document.querySelector('.modal');
        const close_button = document.querySelector('.close_button');
        const modal_form = document.querySelector('.modal_form');
        const modal_submit = document.querySelector('.add');
        const RefreshButtons = () =>{
            let delete_buttons = document.querySelectorAll('.delete');
            let edit_buttons = document.querySelectorAll('.edit');
            delete_buttons = Array.from(delete_buttons);

            delete_buttons.forEach(button => {
            button.addEventListener('click', () => {
                const xhr = new XMLHttpRequest();
                const id = button.parentNode.parentNode.parentNode.querySelector('.user').innerHTML;
                xhr.open('POST', './delete_entry.php');
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = () => {
                    if(xhr.status === 200){
                        button.parentNode.parentNode.parentNode.remove();
                    }
                }
                xhr.send(`id=${id}`);
            })});
            edit_buttons = Array.from(edit_buttons);

            edit_buttons.forEach(button => {
                button.addEventListener('click', () => {
                modal.classList.add('active');
                modal_form.action = './edit_entry.php';
                modal_submit.innerHTML = 'Edit';
                modal_form.reset();
                const xhr = new XMLHttpRequest();
                const id = button.parentNode.parentNode.parentNode.querySelector('.user').innerHTML;
                modal_submit.value = id;
                modal_submit.name = 'id';

                xhr.open('POST', './retrieve_entry.php');
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = () => {
                    if(xhr.status === 200){
                        const data = JSON.parse(xhr.responseText);
                        document.querySelector('#hall').value = data.name;
                        document.querySelector('#dat').value = data.play_date;
                        document.querySelector('#title').value = data.title;  
                    }
                }
                xhr.send(`id=${id}`);
            })})
        };
        add_button.addEventListener('click', () => {
            modal.classList.add('active');
            modal_form.action = './create_entry.php';
            modal_submit.innerHTML = 'Add';
            modal_form.reset();
        });
        close_button.addEventListener('click', () => {
            modal.classList.remove('active');
        });
        RefreshButtons();
    </script>
    <script>
        const search_bar = document.querySelector('#search');
        const searchResults = document.querySelector('tbody');
        search_bar.addEventListener('input', () => {
            const searchQuery = search_bar.value.trim();
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `admin_search_entry.php?q=${searchQuery}`);
            xhr.onload = () => {
            if (xhr.status === 200) {
                searchResults.innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    });

    </script>
    <script>
        const search_title = document.getElementById('title');
        const search_hall = document.getElementById('hall');

        const searchResults_title = document.getElementById('results-title');
        const searchResults_hall = document.getElementById('results-hall');

        search_title.addEventListener('input', () => {
            const searchQuery = search_title.value.trim();

            if(searchQuery.length == 0)
            {
                searchResults_title.innerHTML = "";
                return;
            }
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `admin_search_title.php?q=${searchQuery}`);
            xhr.onload = () => {
            if (xhr.status === 200) {
                searchResults_title.innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    });

    search_hall.addEventListener('input', () => {
            const searchQuery = search_hall.value.trim();
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `admin_search_hall.php?q=${searchQuery}`);
            xhr.onload = () => {
            if (xhr.status === 200) {
                searchResults_hall.innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    });



    </script>


    <?php if (isset($_GET['error'])) { 
        echo "<script>alert('".$_GET['error']."')</script>";
    }?>
    <script src="../js/observer.js"></script>
    <script>
    function selectTitle(title)
    {
        const clicked_button = event.target.innerHTML;
        document.getElementById('title').value = clicked_button;
        document.getElementById('results-title').innerHTML = "";
    }
    function selectHall(hall)
    {
        const clicked_button = event.target.innerHTML;
        document.getElementById('hall').value = clicked_button;
        document.getElementById('results-hall').innerHTML = "";
    }
    </script>
        <?php if (isset($_GET['error'])) { 
        echo "<script>alert('".$_GET['error']."')</script>";
    }?>
    <script src="../js/burger_handler.js"></script>
</body>
</html>