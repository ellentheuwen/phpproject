-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Gegenereerd op: 04 apr 2019 om 12:12
-- Serverversie: 5.7.23
-- PHP-versie: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `phpproject`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tl_comments`
--

CREATE TABLE `tl_comments` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tl_likes`
--

CREATE TABLE `tl_likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tl_posts`
--

CREATE TABLE `tl_posts` (
  `id` int(11) NOT NULL,
  `post` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tl_profile`
--

CREATE TABLE `tl_profile` (
  `id` int(11) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `followers` int(11) NOT NULL,
  `following` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tl_users`
--

CREATE TABLE `tl_users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `e_mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `tl_comments`
--
ALTER TABLE `tl_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tl_likes`
--
ALTER TABLE `tl_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tl_posts`
--
ALTER TABLE `tl_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tl_profile`
--
ALTER TABLE `tl_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tl_users`
--
ALTER TABLE `tl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `tl_comments`
--
ALTER TABLE `tl_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `tl_likes`
--
ALTER TABLE `tl_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `tl_posts`
--
ALTER TABLE `tl_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `tl_profile`
--
ALTER TABLE `tl_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `tl_users`
--
ALTER TABLE `tl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
