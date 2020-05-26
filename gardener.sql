-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 26 mei 2020 om 15:22
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gardener`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `idUser` int(255) NOT NULL,
  `fotos` longtext DEFAULT NULL,
  `naam` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `prijs` decimal(65,0) NOT NULL,
  `gratis` tinyint(1) DEFAULT NULL,
  `ruilen` tinyint(1) DEFAULT NULL,
  `bestelling` tinyint(1) DEFAULT NULL,
  `hoeveelheid` int(11) NOT NULL,
  `eenheid` varchar(255) NOT NULL,
  `beschrijving` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`id`, `idUser`, `fotos`, `naam`, `type`, `prijs`, `gratis`, `ruilen`, `bestelling`, `hoeveelheid`, `eenheid`, `beschrijving`) VALUES
(1, 24, 'tomato-placeholder.png', 'Tomaten', 'Groente', '1', 0, 0, 0, 1, 'KG', 'Smakelijke tomaten uit eigen tuin!'),
(3, 24, 'tomato-placeholder.png', 'Wortelen', 'Groente', '2', 0, 0, 0, 1, 'KG', 'Lekkere wortelen..'),
(5, 24, 'tomato-placeholder.png', 'Tomaten', 'Groente', '1', 0, 0, 0, 1, 'KG', 'Smakelijke tomaten uit eigen tuin!'),
(6, 39, 'tomato-placeholder.png', 'Tomaten', 'Groente', '1', 0, 0, 0, 1, 'KG', 'Smakelijke tomaten uit eigen tuin!'),
(25, 24, 'tomato-placeholder.png', 'Tomaten', 'groente', '0', 1, 0, 1, 3, 'kg', 'Smakelijke tomaten uit eigen tuin!'),
(26, 5, 'tomato-placeholder.png', 'Tomaten', 'Groente', '1', 0, 0, 0, 1, 'KG', 'Smakelijke tomaten uit eigen tuin!'),
(27, 5, 'tomato-placeholder.png', 'Wortelen', 'Groente', '2', 0, 0, 0, 1, 'KG', 'Lekkere wortelen..'),
(28, 38, 'tomato-placeholder.png', 'Tomaten', 'Groente', '1', 0, 0, 0, 1, 'KG', 'Smakelijke tomaten uit eigen tuin!'),
(29, 38, 'tomato-placeholder.png', 'Tomaten', 'Groente', '1', 0, 0, 0, 1, 'KG', 'Smakelijke tomaten uit eigen tuin!'),
(30, 39, 'tomato-placeholder.png', 'Tomaten', 'groente', '0', 1, 0, 1, 3, 'kg', 'Smakelijke tomaten uit eigen tuin!'),
(31, 24, 'pompoen.png', 'Pompoen', 'groente', '0', 1, 1, 0, 1, 'stuks', 'lekker!');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `gebruikersnaam` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `stad` varchar(255) NOT NULL,
  `straat` varchar(255) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `telefoonnummer` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `gebruikersnaam`, `email`, `wachtwoord`, `voornaam`, `achternaam`, `stad`, `straat`, `lat`, `lng`, `avatar`, `telefoonnummer`) VALUES
(5, 'bryanvm', 'bryan.vm@hotmail.com', '$2y$10$MnfUkdEcwlx7JhbOOMJRJuvp9Kgm0azkwcGaKi5zHTNsCP9lEICAS', 'Bryan', 'van Mechelen', 'Retie', 'Staarpad', 51.2670784, 5.079318, '5ea7114e432280.12426666.jpg', 0),
(24, 'boleynen', 'bo_leynen_@hotmail.com', '$2y$10$wnRllPhQPGo8pjG./8xdzu63MTG1S.7C1YPdnzpd7SWUPs6GOv1NK', 'Bo', 'Leynen', 'Mechelen', 'Van Kerckhovenstraat', 51.0175734, 4.4810527, '5ea7114e432280.12426666.jpg', 0),
(38, 'Tommie12', 'test@mail.com', '$2y$14$bClgovhrcDMM8zj22Soi6ukS1wdkVGC3cMaOCBgP3cjW175tMTnmu', 'Tom', 'Peeters', 'Antwerpen', 'Meir', 51.2182705, 4.4053058, '5ec3e67fded361.38889145.jpg', 0),
(39, 'knoebst', 'benleynen@hotmail.com', '$2y$14$HNKCjVnwSldYbI1WqCBL1e0jBpBPPtcJH1MlPfRsJX9W7m3A/pCPu', 'Ben', 'Leynen', 'Dessel', 'Turnhoutsebaan', 51.2533098, 5.105809, '5ec3ee823cb810.02277172.jpg', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `workshop`
--

CREATE TABLE `workshop` (
  `id` int(100) NOT NULL,
  `idUser` int(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `datum` date NOT NULL,
  `start` time(6) DEFAULT NULL,
  `locatie` varchar(255) NOT NULL,
  `prijs` int(255) NOT NULL,
  `gratis` tinyint(1) DEFAULT NULL,
  `beschrijving` longtext NOT NULL,
  `foto` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `workshop`
--

INSERT INTO `workshop` (`id`, `idUser`, `naam`, `datum`, `start`, `locatie`, `prijs`, `gratis`, `beschrijving`, `foto`) VALUES
(1, 24, 'Tuinieren voor beginners', '2020-08-25', '15:30:00.000000', 'Mechelen Nekkerspoel', 10, 0, 'Informatieve Workshop!', 'tomato-placeholder.png'),
(2, 24, 'Tuinieren voor beginners', '2020-08-25', '15:30:00.000000', 'Mechelen Nekkerspoel', 10, 0, 'Informatieve Workshop!', 'tomato-placeholder.png'),
(4, 24, 'Tuinieren met Bo!', '2020-08-15', '12:00:00.000000', 'Mechelen Nekkerspoel', 0, 1, 'Leuke interactieve workshop.', 'tomato-placeholder.png'),
(8, 5, 'Tuinieren voor beginners', '2020-08-25', '15:30:00.000000', 'Mechelen Nekkerspoel', 10, 0, 'Informatieve Workshop!', 'tomato-placeholder.png'),
(9, 38, 'Tuinieren voor beginners', '2020-08-25', '15:30:00.000000', 'Mechelen Nekkerspoel', 10, 0, 'Informatieve Workshop!', 'tomato-placeholder.png'),
(10, 39, 'Tuinieren met Bo!', '2020-08-15', '12:00:00.000000', 'Mechelen Nekkerspoel', 0, 1, 'Leuke interactieve workshop.', 'tomato-placeholder.png');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT voor een tabel `workshop`
--
ALTER TABLE `workshop`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
