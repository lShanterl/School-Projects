<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
    <nav>
        <div id="left">
            <span id="logo">Movie App</span>
            <a href="index.php">Movies</a>
            <a href="movies.php">Upcoming</a>
            <a href="about.php">Watchlist</a>
        </div>
        <div id="right">
            <span style="color:#fff;">search</span>
            <a href="sign_up.php" id="signup">Create Account</a>
            <a href="sign_in.php" id="login">Sign in</a>
        </div>
    </nav>
    <main>
        <section id="section-1" style="background-image: url(https://htmlcolorcodes.com/assets/images/colors/gray-color-solid-background-1920x1080.png) ;">
            <div id="hero-wrapper">
                <div id="hero">
                    <div id="hero-text">
                        <h1>Movie name</h1>
                        <p id="cast">Cast: Lorem Jones, Michael B. Jordan, Lupita Nyo</p>
                        <p id="genre">Genre: Action, Adventure, Sci-Fi</p>
                        <p id="story">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab quo suscipit sit eum ex quisquam, aperiam tenetur dignissimos consectetur at adipisci ipsam, porro, magnam pariatur dicta!</p>
                    </div>
                    <button>Watch Trailer</button>
                    <button>Buy Tickets</button>
                </div>
            </div>
        </section>
        <section id="popular-movies">
            <button id="scroll-left">
                <img src="https://img.icons8.com/ios/50/000000/chevron-left.png"/>
            </button>
            <div class="card">
                <img src="https://htmlcolorcodes.com/assets/images/colors/gray-color-solid-background-1920x1080.png" alt="">
                <h3>Sit</h3>
            </div>
            <div class="card">
                <img src="https://htmlcolorcodes.com/assets/images/colors/gray-color-solid-background-1920x1080.png" alt="">
                <h3>Dolor</h3>
            </div>
            <div class="card">
                <img src="https://htmlcolorcodes.com/assets/images/colors/gray-color-solid-background-1920x1080.png" alt="">
                <h3>Ipsum</h3>
            </div>
            <div class="card">
                <img src="https://htmlcolorcodes.com/assets/images/colors/gray-color-solid-background-1920x1080.png" alt="">
                <h3>Lorem</h3>
            </div>
            <div class="card">
                <img src="https://htmlcolorcodes.com/assets/images/colors/gray-color-solid-background-1920x1080.png" alt="">
                <h3>Lorem</h3>
            </div>
            <button id="scroll-right">
                <img src="https://img.icons8.com/ios/50/000000/chevron-right.png"/>
            </button>
            
        </section>
    </main>
    

    <footer>
        <div id="links">
            <span id="facebook"></span>
            <span id="twitter"></span>
            <span id="instagram"></span>
        </div>
        <div id="contact">
            <span>Newsletter</span>
            <span>Email</span>
            <span>Phone</span>

        </div>
        <div id="footer-text">
            <p>© 2023 Movie App. All Rights Reserved.</p>
        </div>
    </footer>
    
</body>
</html>