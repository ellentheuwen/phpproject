-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Gegenereerd op: 01 mei 2019 om 18:46
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
  `picture` varchar(255) NOT NULL,
  `hashtags` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `likes` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `posts`
--

INSERT INTO `posts` (`id`, `description`, `picture`, `hashtags`, `location`, `likes`, `time`) VALUES
(1, 'Dit is een voorbeeld', 'https://www.business-punk.com/wp-content/uploads/2018/04/logo2-400x400.jpg', '#voorbeeld #logo', 'Mechelen', 0, '2019-04-30 18:18:04');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`email`, `password`, `username`, `firstname`, `lastname`, `bio`, `id`) VALUES
('test2@test.com', '$2y$10$PaLBsSJl.lz8f5VdXFRe2uwLgjwpTIY.2cz2VIfMRMUidXgDPhcbe', 'tester3', 'test2', 'test2', '', 1),
('test@php.com', '$2y$10$Jq2n5Fg.vcxEVUH1aZWBf.J4ZPyVRn18UwH4M6xViTqKEe0bX5aqy', 'tester', 'test2', 'test2', '', 4),
('test@test.com', '$2y$10$VbfEqcVJxQQH3.TqyhzOieTKKoa.iNMJ0B3u/7glVsEdjaiiqqMJy', 'test', 'test', 'test', 'hallo dit is een test', 6);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;