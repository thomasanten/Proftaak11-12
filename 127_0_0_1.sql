-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 17 mei 2014 om 15:00
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `monitor_ikea`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `chats`
--

CREATE TABLE IF NOT EXISTS `chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `klantnummer` text NOT NULL,
  `content` text NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tijd` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Gegevens worden geëxporteerd voor tabel `chats`
--

INSERT INTO `chats` (`id`, `klantnummer`, `content`, `datum`, `tijd`) VALUES
(1, '0', '0', '0000-00-00 00:00:00', 14),
(2, '0', '0', '0000-00-00 00:00:00', 14),
(3, '0', '0', '0000-00-00 00:00:00', 15),
(4, 'Thomas', 'Wat ik graag nog meer wilden weten is dat...', '0000-00-00 00:00:00', 0),
(5, 'Thomas', 'Wat ik graag nog meer wilden weten is dat...', '2014-05-14 14:00:12', 0),
(6, '', 'WTF!', '2014-05-14 14:03:22', 0),
(7, '', 'lul', '2014-05-14 14:03:53', 0),
(8, 'tonkerman', 'lul!!', '2014-05-14 14:04:47', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
