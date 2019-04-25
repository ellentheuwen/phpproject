-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Gegenereerd op: 25 apr 2019 om 10:17
-- Serverversie: 5.7.23
-- PHP-versie: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `netflix`
--

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
(4, 'test@test.com', '$2y$10$Rlc4WxAhL777sqgi8DLSQ.X8wV8UBmIuDAKf0g3yi9gfox7XVbVMq');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
