-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 20 Mar 2023, 18:44
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
  `short_summary` varchar(225) NOT NULL,
  `release_date` date NOT NULL,
  `categories` varchar(128) NOT NULL,
  `rating` decimal(3,1) NOT NULL,
  `trailer_link` varchar(165) NOT NULL,
  `image_path` varchar(128) NOT NULL DEFAULT '../../movie_images/default.jpg',
  `hero_path` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `movies`
--

INSERT INTO `movies` (`id`, `title`, `short_summary`, `release_date`, `categories`, `rating`, `trailer_link`, `image_path`, `hero_path`) VALUES
(2, 'The Godfather', 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.', '1972-03-24', 'drama,mafia,crime fiction', '4.7', 'https://www.youtube.com/watch?v=sY1S34973zA', '../../resources/movie_images/godfather.jpg', '../../resources/movie_images/godfatherhero.jpeg'),
(3, 'The Dark Knight', 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.', '2008-07-18', 'superhero,action,drama,mystery', '4.9', 'https://www.youtube.com/watch?v=EXeTwQWrcwY&t=1s', '../../resources/movie_images/dark_knight.jpg', '../../resources/movie_images/dark_knighthero.jpg'),
(4, 'Schindler\'s List', 'In German-occupied Poland during World War II, industrialist Oskar Schindler gradually becomes concerned for his Jewish workforce after witnessing their persecution by the Nazis.', '1993-11-30', 'history,war,drama', '4.9', 'https://www.youtube.com/watch?v=mxphAlJID9U', '../../resources/movie_images/schindlers_list.jpg', '../../resources/movie_images/schnindlerhero.jpg'),
(6, 'Inception', 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.', '2010-07-16', 'heist,science-fiction,action', '4.8', 'https://www.youtube.com/watch?v=YoHD9XEInc0', '../../resources/movie_images/inception.jpg', '../../resources/movie_images/inceptionhero.jpg');

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
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `image_path` varchar(150) NOT NULL DEFAULT '../../resources/user_images/default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `isAdmin`, `image_path`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '$2y$10$9Kf0vEYbpRrVe4/s/2CWUeUrcQ2/PIQ12/a.yLffwr/46xhO6A9pK', 1, '../../resources/user_images/admin@gmail.com.png'),
(2, 'Tomasz', 'Gwiazda', 'tomaszgmail.com', '$2y$10$1ycjnJQJkzsTfT3PvsK50eh8UfX0e9qSu9TROBL3fT75bCD6DoTE6', 0, '../../resources/user_images/tomaszgmail.com.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
