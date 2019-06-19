-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Jun 2019 um 07:17
-- Server-Version: 10.1.40-MariaDB
-- PHP-Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `phpvideoplayer`
--
CREATE DATABASE IF NOT EXISTS `phpvideoplayer` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `phpvideoplayer`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `playlist`
--
-- Erstellt am: 19. Jun 2019 um 03:39
--

DROP TABLE IF EXISTS `playlist`;
CREATE TABLE IF NOT EXISTS `playlist` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `plname` varchar(255) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- RELATIONEN DER TABELLE `playlist`:
--

--
-- Daten für Tabelle `playlist`
--

INSERT INTO `playlist` (`pid`, `plname`) VALUES
(3, 'Music'),
(4, 'Computer & Science'),
(5, 'Entertainment');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `playlist_has_video`
--
-- Erstellt am: 19. Jun 2019 um 03:39
--

DROP TABLE IF EXISTS `playlist_has_video`;
CREATE TABLE IF NOT EXISTS `playlist_has_video` (
  `pid` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  KEY `fk_playlist_has_video_playlist_idx` (`pid`),
  KEY `fk_playlist_has_video_video1_idx` (`vid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONEN DER TABELLE `playlist_has_video`:
--   `pid`
--       `playlist` -> `pid`
--   `vid`
--       `video` -> `vid`
--

--
-- Daten für Tabelle `playlist_has_video`
--

INSERT INTO `playlist_has_video` (`pid`, `vid`) VALUES
(4, 25),
(4, 26),
(4, 27),
(3, 34),
(3, 30),
(3, 29),
(4, 31),
(4, 32),
(5, 28),
(5, 31),
(5, 33),
(5, 25);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `video`
--
-- Erstellt am: 19. Jun 2019 um 03:39
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `vid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `video` longblob NOT NULL,
  `thumbnail` longblob NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `dislikes` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`vid`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- RELATIONEN DER TABELLE `video`:
--

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `playlist_has_video`
--
ALTER TABLE `playlist_has_video`
  ADD CONSTRAINT `fk_playlist_has_video_playlist` FOREIGN KEY (`pid`) REFERENCES `playlist` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_playlist_has_video_video1` FOREIGN KEY (`vid`) REFERENCES `video` (`vid`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
