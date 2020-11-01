-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 26 okt 2020 om 12:06
-- Serverversie: 5.7.24
-- PHP-versie: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `corona_referral_platform`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text,
  `type` int(2) NOT NULL DEFAULT '1',
  `thumbnail` text,
  `rijksregisternummer` int(11) DEFAULT NULL,
  `riziv` int(11) DEFAULT NULL,
  `created_At` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `login_At` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `accounts`
--

INSERT INTO `accounts` (`id`, `email`, `password`, `type`, `thumbnail`, `rijksregisternummer`, `riziv`, `created_At`, `login_At`) VALUES
(6, 'lol@mail.com', '$2y$12$Fecr3GfAZMRaa0e3Qqlm3O/wCGc7jzhCtcZfjnfmhsPI3ljiKCSX.', 2, '/assets/images/thumbnails/thibaut.jpg', NULL, NULL, '2020-10-21 22:36:55', '2020-10-26 10:21:48'),
(15, 'thidsegveszbdema@student.arteveldehs.be', '$2y$12$vYRc3qRhFWVSC72oZ5KkXeQFFw7I7wU8k6OVGMv0IIsef..mMEwy6', 2, '/assets/images/thumbnails/thibaut.jpg', NULL, NULL, '2020-10-24 14:03:20', '2020-10-24 14:03:20'),
(16, 'thibdema@student.arteveldehs.be', '$2y$12$EvCyTGt.8VtWxNZN0WvkhemoOK3zEdLoL2qIduJDMU0lyMD856sVq', 2, '/assets/images/thumbnails/thibdema@student.arteveldehs.be_Knipsel.JPG', NULL, NULL, '2020-10-24 14:26:39', '2020-10-24 14:26:39');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `account_types`
--

CREATE TABLE `account_types` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='The different types of accounts.';

--
-- Gegevens worden geëxporteerd voor tabel `account_types`
--

INSERT INTO `account_types` (`id`, `type`) VALUES
(1, 'Patient'),
(2, 'Huisarts'),
(3, 'Ziekenhuis'),
(4, 'Contacttracer');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `huisartsID` int(11) DEFAULT NULL,
  `accountID` int(11) DEFAULT NULL,
  `rijksregisternummer` int(11) NOT NULL,
  `test_result` varchar(255) NOT NULL DEFAULT 'In progress',
  `email` varchar(255) DEFAULT NULL,
  `voornaam` text,
  `achternaam` text NOT NULL,
  `telefoon` varchar(15) NOT NULL,
  `created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `patients`
--

INSERT INTO `patients` (`id`, `huisartsID`, `accountID`, `rijksregisternummer`, `test_result`, `email`, `voornaam`, `achternaam`, `telefoon`, `created_At`) VALUES
(1, 6, NULL, 44555555, 'Positive', 'lol@mail.com', 'Thibaut', 'ezfze', '54455544', '2020-10-22 19:31:49'),
(2, 6, NULL, 44555555, 'In progress', 'lol@mail.com', 'Thibaut', 'ezfze', '54455544', '2020-10-22 19:31:49'),
(3, 6, NULL, 45555, 'In progress', 'thibautdm9830@hotmail.com', 'Thibaut', 'ABCED', '5552525', '2020-10-22 19:33:09'),
(4, 6, NULL, 45555, 'In progress', 'thibautdm9830@hotmail.com', 'Thibaut', 'ABCED', '5552525', '2020-10-22 19:33:09'),
(5, 6, NULL, 45555, 'In progress', 'thibautdm9830@hotmail.com', 'Thibaut', 'ABCED', '5552525', '2020-10-22 19:34:04'),
(6, 6, NULL, 544, 'In progress', 'thibautdm9830@hotmail.com', 'Thibaut', 'zqafazq', '5552525', '2020-10-22 19:34:15'),
(7, 6, NULL, 525, 'In progress', 'thibautdm9830@hotmail.com', 'Thibaut', 'ezfze', '5552525', '2020-10-22 19:34:47'),
(8, 6, NULL, 525, 'In progress', 'thibautdm9830@hotmail.com', 'Thibaut', 'ezfze', '5552525', '2020-10-22 19:50:10'),
(9, 6, NULL, 525, 'In progress', 'thibautdm9830@hotmail.com', 'Thibaut', 'ezfze', '5552525', '2020-10-22 19:50:37'),
(10, 6, NULL, 4, 'In progress', 'thibautdm9830@hotmail.com', 'Thibaut', 'uihnuknh', '5552525', '2020-10-23 11:41:00'),
(11, 6, NULL, 444, 'In progress', 'knkkkdddkkkjn@g.com', 'Arne', 'Den Aap', '455', '2020-10-23 11:41:28'),
(12, 6, NULL, 11111, 'In progress', 'test@test.com', 'test', 'test', '11111', '2020-10-24 19:03:43');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`) VALUES
(1, 'lol@mail.com'),
(2, 'thibdema@student.arteveldehs.be'),
(3, 'test@hotmail.com'),
(4, 'thibautdm9830@hotmail.com');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `account_types`
--
ALTER TABLE `account_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT voor een tabel `account_types`
--
ALTER TABLE `account_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT voor een tabel `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
