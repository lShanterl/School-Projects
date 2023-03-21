-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 21 Mar 2023, 23:01
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `flowspark`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `short_summary` varchar(250) NOT NULL,
  `release_date` date NOT NULL,
  `categories` varchar(128) NOT NULL,
  `rating` char(4) NOT NULL DEFAULT 'TBA',
  `length` varchar(10) NOT NULL,
  `trailer_link` varchar(165) NOT NULL,
  `image_path` varchar(128) NOT NULL DEFAULT '../../movie_images/default.jpg',
  `hero_path` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `movies`
--

INSERT INTO `movies` (`id`, `title`, `short_summary`, `release_date`, `categories`, `rating`, `length`, `trailer_link`, `image_path`, `hero_path`) VALUES
(2, 'The Godfather', 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.', '1972-03-24', 'drama,mafia,crime fiction', '9.2', '2h 55m', 'https://www.youtube.com/watch?v=sY1S34973zA', 'godfather.jpg', 'godfatherhero.jpeg'),
(3, 'The Dark Knight', 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.', '2008-07-18', 'superhero,action,drama,mystery', '9.0', '2h 33m', 'https://www.youtube.com/watch?v=EXeTwQWrcwY&t=1s', 'dark_knight.jpg', 'dark_knighthero.jpg'),
(4, 'Schindler\'s List', 'In German-occupied Poland during World War II, industrialist Oskar Schindler gradually becomes concerned for his Jewish workforce after witnessing their persecution by the Nazis.', '1993-11-30', 'history,war,drama', '9.0', '3h 15m', 'https://www.youtube.com/watch?v=mxphAlJID9U', 'schindlers_list.jpg', 'schnindlerhero.jpg'),
(6, 'Inception', 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.', '2010-07-16', 'heist,science-fiction,action', '8.8', '2h 28m', 'https://www.youtube.com/watch?v=YoHD9XEInc0', 'inception.jpg', 'inceptionhero.jpg'),
(7, 'John Wick 4', 'John Wick is on the run after killing a member of the international assassin\'s guild, and with a $14 million price tag on his head, he is the target of hit men and women everywhere.', '2023-05-27', 'Action, Thriller,neo-noir', '8.5', '2h 49m', 'https://www.youtube.com/watch?v=_zMUvY4YiPc', 'john_wick_4.jpg', 'john_wick_4_hero.jpg'),
(8, 'The Last of Us', 'In a world ravaged by a deadly fungus, a teenage girl and a hardened survivor must journey across a post-pandemic United States in a brutal journey of survival.', '2023-06-02', 'Action, Adventure, Drama', '9.2', 'Series', 'https://www.youtube.com/watch?v=3qQWZbYMt-c', 'the_last_of_us.jpg', 'the_last_of_us_hero.jpg'),
(9, 'The Mandalorian', 'The Mandalorian and the Child continue their journey, facing enemies and rallying allies as they make their way through a dangerous galaxy in the tumultuous era after the collapse of the Galactic Empire.', '2023-07-15', 'Action, Adventure, Sci-Fi', '8.8', 'Series', 'https://www.youtube.com/watch?v=weU52X5D_lE', 'the_mandalorian.jpg', 'the_mandalorian_hero.jpg'),
(10, 'Game of Thrones', 'Nine noble families fight for control over the lands of Westeros, while an ancient enemy returns after being dormant for millennia.', '2011-04-17', 'Action, Adventure, Drama', '9.3', 'Series', 'https://www.youtube.com/watch?v=rlR4PJn8b8I', 'game_of_thrones.jpg', 'game_of_thrones_hero.jpg'),
(11, 'Ant-Man and The Wasp: Quantumania', 'Scott Lang (Ant-Man) and Hope van Dyne (The Wasp) are back with an urgent new mission. They must navigate the quantum realm to uncover secrets from their past.', '2023-07-07', 'Action, Adventure, Comedy', '8.0', '2h 5m', 'https://www.youtube.com/watch?v=ZsBO4b3tyZg', 'ant_man_and_the_wasp_quantumania.jpg', 'ant_man_and_the_wasp_quantumania_hero.jpg'),
(12, 'Avatar: The Way of Water', 'Sequel to the 2009 blockbuster Avatar, the movie follows the journey of a new generation of Na\'vi on Pandora, led by Jake Sully and Neytiri, as they embark on a dangerous quest to explore the mysteries of their world.', '2022-12-16', 'Action, Adventure, Fantasy', '8.7', '3h 12m', 'https://www.youtube.com/watch?v=98sTlTfKvzQ', 'avatar_the_way_of_water.jpg', 'avatar_the_way_of_water_hero.jpg'),
(13, 'Shazam! Fury of the Gods', 'The superhero Shazam battles the forces of evil to save the world once again.', '2023-06-02', 'action, adventure, fantasy', 'TBA', '2h 10m', 'https://www.youtube.com/watch?v=-BKzCxKBf9o', 'shazam_fotg.jpg', 'shazam_fotg_hero.jpg'),
(14, 'The Walking Dead', 'A group of survivors must fight their way through a post-apocalyptic world dominated by zombies.', '2010-10-31', 'horror, drama, thriller', '8.2', 'Series', 'https://www.youtube.com/watch?v=R1v0uFms68U', 'walking_dead.jpg', 'walking_dead_hero.jpg'),
(15, 'Breaking Bad', 'A high school chemistry teacher turns to a life of crime to secure his family\'s financial future after he is diagnosed with cancer.', '2008-01-20', 'crime, drama, thriller', '9.4', 'Series', 'https://www.youtube.com/watch?v=HhesaQXLuRY', 'breaking_bad.jpg', 'breaking_bad_hero.jpg'),
(16, 'Avengers: Endgame', 'The Avengers must assemble once again to undo the actions of Thanos and restore the universe to its former state.', '2019-04-26', 'action, adventure, sci-fi', '8.4', '3h 2m', 'https://www.youtube.com/watch?v=TcMBFSGVi1c', 'avengers_endgame.jpg', 'avengers_endgame_hero.jpg'),
(18, 'Spider-Man: No Way Home', 'Peter Parker teams up with other Spider-People from different dimensions to stop a threat that could destroy all of reality.', '2021-12-17', 'action, adventure, sci-fi', '9.3', '2h 28m', 'https://www.youtube.com/watch?v=-FrfKgFeVwM', 'spiderman_nowayhome.jpg', 'spiderman_nowayhome_hero.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(65) NOT NULL,
  `surname` varchar(65) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_token` varchar(14) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `image_path` varchar(150) NOT NULL DEFAULT '../../resources/user_images/default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `auth_token`, `isAdmin`, `image_path`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '$2y$10$9Kf0vEYbpRrVe4/s/2CWUeUrcQ2/PIQ12/a.yLffwr/46xhO6A9pK', '641a28e2819dc', 1, '../../resources/user_images/admin@gmail.com.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `watchlist`
--

CREATE TABLE `watchlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
