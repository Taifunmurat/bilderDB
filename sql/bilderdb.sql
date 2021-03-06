-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 22. Apr 2016 um 15:02
-- Server-Version: 5.6.26
-- PHP-Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `bilderdb`
--
CREATE DATABASE IF NOT EXISTS `bilderdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_german2_ci;
USE `bilderdb`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE IF NOT EXISTS `benutzer` (
  `bid` int(11) NOT NULL,
  `vorname` varchar(50) COLLATE utf8_german2_ci DEFAULT NULL,
  `nachname` varchar(50) COLLATE utf8_german2_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_german2_ci NOT NULL,
  `passwort` char(60) COLLATE utf8_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;


--
-- Tabellenstruktur für Tabelle `fotoalben`
--
CREATE TABLE IF NOT EXISTS `fotoalben` (
  `aid` int(11) NOT NULL ,
  `name` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  `bid` int(11) COLLATE utf8_german2_ci NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;



--
-- Tabellenstruktur für Tabelle `bilder`
--

CREATE TABLE IF NOT EXISTS `bilder` (
  `pid` int(11) NOT NULL ,
  `pname` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  `ptags` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  `ppath` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  `dpath` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  `aid` int(11) COLLATE utf8_german2_ci NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;


--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`bid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT;


--
-- Indizes für die Tabelle `fotoalben`
--
ALTER TABLE `fotoalben`
  ADD PRIMARY KEY (`aid`),
  ADD FOREIGN KEY (`bid`) REFERENCES benutzer(`bid`),
  ADD UNIQUE KEY `aid` (`aid`);


--
-- AUTO_INCREMENT für Tabelle `fotoalben`
--
ALTER TABLE `fotoalben`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Indizes für die Tabelle `bilder`
--
ALTER TABLE `bilder`
  ADD PRIMARY KEY (`pid`),
  ADD FOREIGN KEY (`aid`) REFERENCES fotoalben(`aid`),
  ADD UNIQUE KEY `pid` (`pid`);



--
-- AUTO_INCREMENT für Tabelle `bilder`
--
ALTER TABLE `bilder`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT;


--
-- AUTO_INCREMENT für exportierte Tabellen
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
