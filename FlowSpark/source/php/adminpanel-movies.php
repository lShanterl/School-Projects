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
            z-index: -1;
        }
        .modal .modal_form{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 65vw;
            height: 80vh;
            margin-top:4vh;
            padding: 50px !important;
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
        .modal .modal_form input, .modal .modal_form label.perm, .file{
            width: 100%;
            height: 50px;
            border: none;
            background-color: var(--primary-color-dark);
            color: var(--secondary-text-color);
            font-weight: 400;
            border-radius: 5px;
            transition: ease-in-out 0.2s;
            border: 2.5px solid var(--secondary-text-color);
            padding: 10px;

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
input[type='checkbox']:checked +label {
    background-color:  var(--secondary-text-color) !important;
    color: var(--primary-color-dark) !important;
    border: 2.5px solid var(--primary-color-dark) !important;
}
textarea{
    width: 100%;
    height: 100px;
    border: none;
    background-color: var(--primary-color-dark);
    color: var(--secondary-text-color);
    font-weight: 500;
    border-radius: 5px;
    transition: ease-in-out 0.2s;
    border: 2.5px solid var(--secondary-text-color);
    padding: 10px;
    resize: none;
    font-size: 1.2rem;

}
.perm{
    display:flex;
    align-items: center;
    justify-content: center;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

input[type=number] {
  -moz-appearance: textfield;
}
input[type='file']{
    height: 0% !important;
    width: 0% !important;
    opacity: 0 !important;
}
.hidden{
    visibility: hidden;
    opacity: 0;
}
.file{
    display:flex;
    align-items: center;
    justify-content: center;
}
.filter-form .left button.category{
    width: 100%;
    text-align: center;
    height: 55px;
    border-style: none;
    background-color: var(--primary-color-dark);
    color: var(--secondary-text-color);
    border: 2.5px solid var(--secondary-text-color);
    font-size: 15px;
    outline: none;
    box-shadow: 0px 2px 3px rgba(0,0,0,.4);
    transition: all .5s ease-in-out;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1.5rem;
    z-index:5;
}
.modal{
    font-size: 1.5rem;
}
.categories{
    position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,1.0);
            display: none;
}
.categories label{
    resize:none;
}
.categories.active{
    display: flex;
    justify-content: center;
    padding-top: 10%;
}
button.activ{
    background-color: var(--secondary-text-color) !important;
    color: var(--primary-color-dark) !important;
    border: 2.5px solid var(--primary-color-dark) !important;
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
                                <button class="add_user">Add movie</button>
                                <div class="modal">
                                    <form action="./create_movie.php" class="modal_form" method='POST' enctype="multipart/form-data">
                                        <div class="wrapp">
                                            <div class="row">
                                                
                                            </div>
                                            <div class="row">
                                                <div class="column">
                                                    <label for="name">Title</label>
                                                    <input type="text" name="title" id="title">
                                                </div>
                                                <div class="column">
                                                    <label for="premiere">Release date</label>
                                                    <input type="date" name="premiere" id="premiere">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="column">
                                                    <label for="rating">Rating</label>
                                                    <input type="number" name="rating" id="rating" min='0.0' max='10.0' step='0.1'>
                                                </div>
                                                <div class="column">
                                                    <label for="length">Movie Length</label>
                                                    <input type="number" name="length" id="length">
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="column">
                                                    <label for="baner">Baner Path</label>
                                                    <input type="file" name='baner' id='baner' class='hidden'/>
                                                    <label for="baner" class='file'>Choose file</label>

                                                </div>
                                                <div class="column">
                                                    <label for="hero">Hero Path</label>
                                                    <input type="file" name='hero' id='hero' class='hidden'/>
                                                    <label for="hero" class='file'>Choose file</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="column">
                                                    <label for="description">Description</label>
                                                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="column">
                                                    <label for="trailer">Trailer Link</label>
                                                    <input type="text" name="trailer" id="trailer">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="column">

                                                    <button class='category' type='button'>Show categories</button>
                                                    <div class="categories" >
                                                        <div class="wrapp">
                                                            <div class="row">
                                                                <div class="column">
                                                                    <input type="checkbox" name="drama" id="drama" class='hidden'>
                                                                    <label for="drama" class='perm'>Drama</label>
                                                                </div>
                                                                <div class="column">
                                                                    <input type="checkbox" name="thriller" id="thriller" class='hidden'>
                                                                    <label for="thriller" class='perm'>Thriller</label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="column">
                                                                    <input type="checkbox" name="crime" id="crime" class='hidden'>
                                                                    <label for="crime" class='perm'>Crime</label>
                                                                </div>
                                                                <div class="column">
                                                                    <input type="checkbox" name="horror" id="horror" class='hidden'>
                                                                    <label for="horror" class='perm'>Horror</label>
                                                                </div>
                                                            </div> 
                                                            <div class="row">
                                                                <div class="column">
                                                                    <input type="checkbox" name="action" id="action" class='hidden'>
                                                                    <label for="action" class='perm'>Action</label>
                                                                </div>
                                                                <div class="column">
                                                                    <input type="checkbox" name="adventure" id="adventure" class='hidden'>
                                                                    <label for="adventure" class='perm'>Adventure</label>
                                                                </div>
                                                            </div> 
                                                            <div class="row">
                                                                <div class="column">
                                                                    <input type="checkbox" name="comedy" id="comedy" class='hidden'>
                                                                    <label for="comedy" class='perm'>Comedy</label>
                                                                </div>
                                                                <div class="column">
                                                                    <input type="checkbox" name="fantasy" id="fantasy" class='hidden'>
                                                                    <label for="fantasy" class='perm'>Fantasy</label>
                                                                </div>
                                                            </div> 
                                                            <div class="row">
                                                                <div class="column">
                                                                    <input type="checkbox" name="mystery" id="mystery" class='hidden'>
                                                                    <label for="mystery" class='perm'>Mystery</label>
                                                                </div>
                                                                <div class="column">
                                                                    <input type="checkbox" name="sci-fi" id="sci-fi" class='hidden'>
                                                                    <label for="sci-fi" class='perm'>Sci-fi</label>
                                                                </div>
                                                            </div> 
                                                        </div>  
                                                    </div>
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
                                <th>Release date</th>
                                <th>Rating</th>
                                <th>Length</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <?php 
                            $sql = "SELECT * FROM movies";

                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo "<tr>";
                                echo "<td><span class='user'>".$row['id']."</span></td>";
                                echo "<td><span class='user'>".$row['title']."</span></td>";
                                echo "<td><span class='user'>".$row['release_date']."</span></td>";
                                echo "<td><span class='user'>".$row['rating']."</span></td>";
                                echo "<td><span class='user'>".$row['length']."</span></td>";
                                echo "<td>";
                                echo "<span class='buttons user'>";
                                echo "<button class='edit'>Edit</button>";
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
        const modal_form = document.querySelector('.modal_form');
        const close_button = document.querySelector('.close_button');
        const modal_submit = document.querySelector('.add');
        const title = document.querySelector('input[name="title"]');
        const release_date = document.querySelector('input[name="premiere"]');
        const rating = document.querySelector('input[name="rating"]');
        const length = document.querySelector('input[name="length"]');
        const description = document.querySelector('textarea[name="description"]');
        const baner = document.querySelector('input[name="baner"]');
        const hero = document.querySelector('input[name="hero"]');
        const cat = document.querySelectorAll('input[type="checkbox"]');

        const RefreshButtons = () =>{
            let delete_buttons = document.querySelectorAll('.delete');
            let edit_buttons = document.querySelectorAll('.edit');
            delete_buttons = Array.from(delete_buttons);

            delete_buttons.forEach(button => {
            button.addEventListener('click', () => {
                const xhr = new XMLHttpRequest();
                const id = button.parentNode.parentNode.parentNode.querySelector('.user').innerHTML;
                xhr.open('POST', './delete_movie.php');
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
                modal_form.action = './edit_movie.php';
                modal_submit.innerHTML = 'Edit';
                modal_form.reset();
                const xhr = new XMLHttpRequest();
                const id = button.parentNode.parentNode.parentNode.querySelector('.user').innerHTML;
                modal_submit.value = id;
                modal_submit.name = 'id';

                xhr.open('POST', './retrieve_movie.php');
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = () => {
                    if(xhr.status === 200){
                        const data = JSON.parse(xhr.responseText);
                        title.value = data.title;
                        release_date.value = data.release_date;
                        rating.value = data.rating;
                        description.value = data.short_summary;
                        length.value = data.length;
                        baner.nextElementSibling.innerHTML = data.baner;
                        hero.nextElementSibling.innerHTML = data.hero;
                        const cat = data.categories.split(',');
                        cat.forEach(category => {
                            category = category.trim();
                            category = category.toLowerCase();
                            const checkbox = document.querySelector(`${'#'+category}`);
                            if(checkbox !== null)
                                checkbox.checked = true;
                            else{
                                console.log(category);
                            }
                        });
                    }
                }
                xhr.send(`id=${id}`);
            })})
        };
        RefreshButtons();
        add_button.addEventListener('click', () => {
            modal.classList.add('active');
            modal_form.reset();
            modal_form.action = './create_movie.php';
            hero.nextElementSibling.innerHTML = 'Choose file';
            baner.nextElementSibling.innerHTML = 'Choose file';
            modal_submit.innerHTML = 'Add';
            modal_submit.value = '';
            modal_submit.name = '';

        });
        close_button.addEventListener('click', () => {
            modal.classList.remove('active');
        });

        const files = document.querySelectorAll('input[type="file"]');

        files.forEach(file => {
            file.addEventListener('input' , () =>{
                const label = file.nextElementSibling;
                const fileName = file.files[0].name;
                label.innerHTML = fileName;
            });
        });
    </script>
    <script>
        const category_button = document.querySelector('.category');
        const categories = document.querySelector('.categories');
        category_button.addEventListener('click', () => {
            categories.classList.toggle('active');
            category_button.classList.toggle('activ');
            
        });

    </script>
    <script>

        const search_bar = document.querySelector('#search');
        const searchResults = document.querySelector('tbody');
        search_bar.addEventListener('input', () => {
            const searchQuery = search_bar.value.trim();
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `admin_search.php?q=${searchQuery}`);
            xhr.onload = () => {
            if (xhr.status === 200) {
                searchResults.innerHTML = xhr.responseText;
            }
        };
xhr.send();

});
    </script>
        <?php if (isset($_GET['error'])) { 
        echo "<script>alert('".$_GET['error']."')</script>";
    }?>
    <script src="../js/observer.js"></script>
    <script src="../js/burger_handler.js"></script>
</body>
</html>