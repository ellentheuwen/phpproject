-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Gegenereerd op: 25 apr 2019 om 20:27
-- Serverversie: 5.7.23
-- PHP-versie: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `talktype`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `fullname`) VALUES
(1, 'test@test.com', '$2y$10$mg7bGn4MkWOOHaEr1oNBXuEe/HH4Nb/l14/b.mIhbiGWDEMTDWgSa', '', ''),
(2, 'test@test.com', '$2y$10$WDnzMOZyY5W4Te4Wdy9D6eWBRHu9lV39BY0rrn2B9DhaBEb.fENnS', '', ''),
(3, 'ellen.theuwen@gmail.com', '$2y$10$vi8dgDWC58WR4lbjvnNGOuJCn0XqfWHizVDf88i/tZILKND7sRBRq', '', ''),
(4, 'test@test.com', '$2y$10$Rlc4WxAhL777sqgi8DLSQ.X8wV8UBmIuDAKf0g3yi9gfox7XVbVMq', '', ''),
(5, 'ellen@php.com', '$2y$10$nabgTHpYt14Mk6Qi5KMHge8ewONMmS.Eg0R/IleYccka05d6EsKFu', '', ''),
(6, 'ellen@php.com', '$2y$10$TIfjtnZOuOQzhJy3tZDBAu9Mg0utUnPEwCPtGnsayS5U9ck4iHy6G', '', ''),
(7, 'ellen@test.com', '$2y$10$EKh0AesAwE.4W/vsHiNcwuUWE/G/zkTMYx1it5bzRZkPabYYrUe3i', '', ''),
(8, 'test@test.com', '$2y$10$xssbGJYZDdOK73U3YWThJuwonB4bujoOeyGgwA0EAb6gOe8yO0cEC', '', ''),
(9, 'test@test.com', '$2y$10$xkeqHleht65TkYj2jvkp5.3gdJxYw.SGxhlz7NGC9JVKrCAKU4./e', '', ''),
(10, 'test@test.com', '$2y$10$XhF9ALrgrN1wTFgOXOnHcux3Z5/Gr2bEn2/wQnzIkZyBgpr175WM6', '', ''),
(11, 'php@test.com', '$2y$10$aA88DOkIj6rc/YqlW/tDhufqtDaKpXKKpnYxT.XdRcM49NSwmNPh6', '', ''),
(12, 'spam@spam', '$2y$10$09U7dLoe28yeD0/NGhMNVu0QwzpMcP1Sl3gf.vELeM2MipiBk4u2u', '', ''),
(13, 'test@email.com', '$2y$10$Frd5FEARqW6n9VIAzFfNQOtfwWfw79tpZywF.1JV5XdgjlwdRZBFK', '', ''),
(14, 'test@test.com', '$2y$10$uikqrA/UMw1SrTGnSb7UleIbd352CkqwmqfaNzOKu11qhlVoHdUOC', 'test', ''),
(15, 'ellen.theuwen@gmail.com', '$2y$10$WXsTBs3WpXAXYtxnHN4B7eZNMVyC8W0n6b5G4sPMWBCO71WtM.o/e', 'ellentriek', ''),
(16, 'joris@hens.com', '$2y$10$ETLLVlXmpoQmBUbwTT2qqOdsN40Ab12HuWu6e.VHn5EFGzhMV5WNG', 'goodbytes', 'joris'),
(17, 'joris@hens.com', '$2y$10$GOU4Fa8qhD97EiEZmikr4e15osnQy3CeE2AtlVgYim9.cOi8zybEi', 'goodbytes', 'joris hens');

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
