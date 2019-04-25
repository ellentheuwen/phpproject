-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Gegenereerd op: 25 apr 2019 om 13:29
-- Serverversie: 5.7.23
-- PHP-versie: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `talktype`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `posts`
--

INSERT INTO `posts` (`id`, `description`, `picture`) VALUES
(1, 'Dit is een voorbeeld. #voorbeeld', 'http://www.sickchirpse.com/wp-content/uploads/2017/10/Black-Mirror.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'test@test.com', '$2y$10$mg7bGn4MkWOOHaEr1oNBXuEe/HH4Nb/l14/b.mIhbiGWDEMTDWgSa'),
(2, 'test@test.com', '$2y$10$WDnzMOZyY5W4Te4Wdy9D6eWBRHu9lV39BY0rrn2B9DhaBEb.fENnS'),
(3, 'ellen.theuwen@gmail.com', '$2y$10$vi8dgDWC58WR4lbjvnNGOuJCn0XqfWHizVDf88i/tZILKND7sRBRq'),
(4, 'test@test.com', '$2y$10$Rlc4WxAhL777sqgi8DLSQ.X8wV8UBmIuDAKf0g3yi9gfox7XVbVMq'),
(5, 'ellen@php.com', '$2y$10$nabgTHpYt14Mk6Qi5KMHge8ewONMmS.Eg0R/IleYccka05d6EsKFu'),
(6, 'ellen@php.com', '$2y$10$TIfjtnZOuOQzhJy3tZDBAu9Mg0utUnPEwCPtGnsayS5U9ck4iHy6G'),
(7, 'ellen@test.com', '$2y$10$EKh0AesAwE.4W/vsHiNcwuUWE/G/zkTMYx1it5bzRZkPabYYrUe3i'),
(8, 'test@test.com', '$2y$10$xssbGJYZDdOK73U3YWThJuwonB4bujoOeyGgwA0EAb6gOe8yO0cEC'),
(9, 'test@test.com', '$2y$10$xkeqHleht65TkYj2jvkp5.3gdJxYw.SGxhlz7NGC9JVKrCAKU4./e');

--
-- Indexen voor geëxporteerde tabellen
--

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
-- AUTO_INCREMENT voor een tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
