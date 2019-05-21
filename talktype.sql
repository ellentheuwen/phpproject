-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Gegenereerd op: 15 mei 2019 om 17:32
-- Serverversie: 5.7.23
-- PHP-versie: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `talktype`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` varchar(300) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `comments`
--

INSERT INTO `comments` (`id`, `text`, `user_id`, `post_id`) VALUES
(1, 'Hallloooo', 1, 1),
(2, 'heykes', 1, 83),
(3, 'Leavin\' a really cool comment', 1, 104),
(4, 'Leavin\' a really cool comment', 1, 104);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `followers`
--

CREATE TABLE `followers` (
  `id` int(11) NOT NULL,
  `user_id1` int(11) NOT NULL,
  `user_id2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `followers`
--

INSERT INTO `followers` (`id`, `user_id1`, `user_id2`) VALUES
(1, 23, 28),
(3, 26, 28),
(4, 28, 23),
(5, 26, 23);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `posts`
--

INSERT INTO `posts` (`id`, `image`, `description`, `user_id`, `date`) VALUES
(89, 'images/post_images/09fdf0ceb0e75c1f132ac276c6c47f2d.jpg', 'get it done babyyyyy', 41, '2019-05-14 20:13:34'),
(90, 'images/post_images/aac96010bd5922c448b1b8fe2b3acbd3.jpg', 'on the edge of glory, lady gaga would say', 41, '2019-05-14 20:13:55'),
(91, 'images/post_images/85b60216b0862325e1d190f254ab5933.jpg', 'php alllll the way', 41, '2019-05-14 20:15:02'),
(92, 'images/post_images/ed190ff44b1b3b639bb3c4f1e68c9301.jpg', 'abcdefuckit', 41, '2019-05-14 20:18:11'),
(93, 'images/post_images/562c6ec5f8161be9ce92a3cb78fc6428.jpg', 'maar nie de voice van vlaanderen hé', 41, '2019-05-14 20:18:30'),
(95, 'images/post_images/0296d6985ec2238e643482767c847fc2.jpg', 'php makes me lonely', 41, '2019-05-14 20:36:16'),
(97, 'images/post_images/9a3e42f0f74161fd3ee8606e64bb5c84.jpg', 'pink poster with a lot of text', 41, '2019-05-14 20:43:22'),
(98, 'images/post_images/ab00d17046fa9b0f1ab1da86305db2a2.jpg', 'you have gotta seek is yourself', 41, '2019-05-14 20:44:21'),
(99, 'images/post_images/9eeba1bd89ddc62dfd40498787365743.jpg', 'school is a game', 41, '2019-05-14 20:44:39'),
(100, 'images/post_images/5275255ee622d0da8b3aed89abd63049.jpg', 'but more features would be nice', 41, '2019-05-14 20:45:50'),
(106, 'images/post_images/88d22259fd48d6fa744a9e236fcabe91.jpg', 'wish i was there', 41, '2019-05-15 17:32:14');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `firstname`, `lastname`, `username`, `password`, `bio`, `avatar`) VALUES
(26, 'test@test.be', 'test', 'test', 'test', '$2y$12$143VKfRWHLVAOnSSMcOdguWiIvlgnpYr56RqeZM8mupIK6u8aZuLe', '', 'images/profile_images/download.jpeg'),
(40, 'test@test.com', 'test', 'test', 'tester1', '$2y$12$Fc.IK18J71zWPjAkexnE7uLv9WvNxn6n5JBxA5k7L48i5c37CdbSa', '', 'images/profile_images/59649478_2320141851645531_1153026735600566272_n.jpg'),
(41, 'ellen.theuwen@gmail.com', 'ellen', 'theuwen', 'ellentriek', '$2y$12$JlFEBJMetOosIWgpnPVIyel/8E53VtoNJQslbUjxv0vOYwTMyGBsS', 'dit is een bio', 'images/profile_images/59649478_2320141851645531_1153026735600566272_n.jpg');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;