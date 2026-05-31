<?php
include 'db.php';

$movie_id = (int)($_GET['id'] ?? 0);

if ($movie_id <= 0) {
    header('Location: ./index.php');
    exit();
}

$stmt = $conn->prepare('SELECT * FROM movies WHERE id = ? LIMIT 1');
$stmt->bind_param('i', $movie_id);
$stmt->execute();
$result = $stmt->get_result();
$movie  = $result->fetch_assoc();
$stmt->close();

if (!$movie) {
    header('Location: ./index.php');
    exit();
}

$title        = htmlspecialchars($movie['title'],        ENT_QUOTES, 'UTF-8');
$summary      = htmlspecialchars($movie['short_summary'],ENT_QUOTES, 'UTF-8');
$length       = htmlspecialchars($movie['length'],       ENT_QUOTES, 'UTF-8');
$release_date = htmlspecialchars($movie['release_date'], ENT_QUOTES, 'UTF-8');
$rating       = htmlspecialchars($movie['rating'],       ENT_QUOTES, 'UTF-8');
$hero_path    = htmlspecialchars($movie_path . $movie['hero_path'], ENT_QUOTES, 'UTF-8');
$raw_trailer  = $movie['trailer_link'] ?? '';
$trailer_link = (preg_match('/^https?:\/\//i', $raw_trailer)) ? htmlspecialchars($raw_trailer, ENT_QUOTES, 'UTF-8') : '#';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="icon" href="../../resources/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="../css/movie.css">
</head>
<body>
<nav class="navbar">
    <div class="left">
        <a href="./index.php">FlowSpark</a>
        <?php if ($cookie): ?><a href="./ytickets.php">Your Tickets</a><?php endif; ?>
        <?php if ($admin == 1): ?><a href="./adminpanel.php">Admin</a><?php endif; ?>
    </div>
    <div class="mid">
        <button class="burger"><span class="bar"></span><span class="bar"></span><span class="bar"></span></button>
    </div>
    <div class="right">
        <?php if ($cookie): ?>
            <a href="./logout.php"><button class='login'>Log out</button></a>
            <a href="./settings.php"><img class='avatar' src="<?= GetIcon() ?>" alt="Avatar"></a>
        <?php else: ?>
            <a href="./login.php"><button class='login'>Log in</button></a>
            <a href="./signup.php"><button class='login'>Sign up</button></a>
        <?php endif; ?>
    </div>
</nav>

<div class="hero-movie" style="background-image:url(<?= $hero_path ?>)">
    <div class="filter-movie">
        <div class="hero-text-wrapper-movie">
            <div class="hero-text-movie">
                <h1><?= $title ?></h1>
                <p class='summary'><?= $summary ?></p>
                <div class="attributes-wrap">
                    <p class="categories">
                        <?php
                        $cats = explode(',', $movie['categories'] ?? '');
                        foreach ($cats as $cat) {
                            echo "<span class='category'>" . htmlspecialchars(trim($cat), ENT_QUOTES, 'UTF-8') . "</span>";
                        }
                        ?>
                    </p>
                    <div class="data_wrap">
                        <div class="duration"><?= $length ?></div>
                        <div class='release_date'><?= $release_date ?></div>
                        <div class="rating"><?= $rating ?>/10.0</div>
                    </div>
                    <div class="buttons">
                        <a href="<?= $trailer_link ?>" target='_blank' rel="noopener noreferrer">
                            <button>Watch Trailer</button>
                        </a>
                        <a href="select_date.php?id=<?= $movie_id ?>">
                            <button>Buy Tickets</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../js/burger_handler.js"></script>
</body>
</html>
