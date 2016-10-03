-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vygenerováno: Pon 03. říj 2016, 17:31
-- Verze serveru: 5.5.50-0ubuntu0.14.04.1
-- Verze PHP: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `biathlete`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
  `uid` int(15) NOT NULL AUTO_INCREMENT,
  `id` int(15) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_danish_ci NOT NULL,
  `language` varchar(15) COLLATE utf8_danish_ci NOT NULL,
  `specialCode` varchar(50) COLLATE utf8_danish_ci NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `categoryInShop` int(15) NOT NULL,
  `image` text COLLATE utf8_danish_ci NOT NULL,
  `svgImage` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `svgImage2` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `producer` int(10) NOT NULL,
  `accuracy` int(10) NOT NULL,
  `legPower` int(10) NOT NULL,
  `handPower` int(10) NOT NULL,
  `endurance` int(10) NOT NULL,
  `stability` int(10) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=31 ;

--
-- Vypisuji data pro tabulku `equipment`
--

INSERT INTO `equipment` (`uid`, `id`, `title`, `description`, `language`, `specialCode`, `used`, `categoryInShop`, `image`, `svgImage`, `active`, `deleted`, `svgImage2`, `producer`, `accuracy`, `legPower`, `handPower`, `endurance`, `stability`) VALUES
(1, 1, 'Anschütz 1827 F', '', 'en', '', 0, 1, '/uploads/images/equipment/ansch-1827f.jpg', '/uploads/images/equipment/weapons/anschutz1827f.svg', 1, 0, '/uploads/images/equipment/weapons/anschutz1827f2.svg', 0, 5, -20, -5, -2, -2),
(2, 2, 'ELEY tenex biathlon', '', 'en', '', 0, 2, '/uploads/images/equipment/eley-tenex-box.jpg', '', 1, 0, '', 0, 10, 0, 0, 0, 0),
(3, 3, 'LAPUA Polar Biathlon', '', 'en', '', 0, 2, '/uploads/images/equipment/lapuaPolar.jpg', '', 1, 0, '', 0, 29, 0, 0, 0, 0),
(4, 4, 'Anschütz magazine', '', 'en', '', 0, 3, '/uploads/images/equipment/ans_magazine.jpg', '', 1, 0, '', 0, 0, 0, 0, 0, 0),
(5, 5, 'Larsen rifle bag', '', 'en', '', 0, 3, '/uploads/images/equipment/larsen-futral.jpg', '', 1, 0, '', 0, 0, 0, 0, 0, 0),
(6, 6, 'Larsen armsling', '', 'en', '', 0, 3, '/uploads/images/equipment/larsen-sling.jpg', '', 1, 0, '', 0, 0, 0, 0, 0, 0),
(7, 7, 'Default metal', '', 'en', '', 0, 1, '', '', 1, 0, '', 0, 0, 0, 0, 0, 0),
(8, 8, 'Default STOCK', '', 'en', '', 0, 4, '', '/uploads/images/equipment/stocks/default.svg', 1, 0, '', 0, 0, 0, 0, 0, 0),
(9, 9, 'Default diopter', '', 'en', '', 0, 5, '', '', 1, 0, '', 0, 0, 0, 0, 0, 0),
(10, 10, 'Default rifle sling', '', 'en', '', 0, 6, '', '', 1, 0, '', 0, 0, 0, 0, 0, 0),
(11, 11, 'Harness - white / red', '', 'en', '', 0, 7, '', '/uploads/images/equipment/harness/white-red.svg', 1, 0, '', 0, 0, 0, 0, 0, 0),
(12, 12, 'Biatar RS-4 (dark)', '', 'en', '', 0, 4, '/uploads/images/equipment/biatarLight.jpg', '/uploads/images/equipment/stocks/biatarRS4-dark.svg', 1, 0, '', 1, 10, 0, 0, 0, 0),
(13, 13, 'Biatar RS-4 (light)', '', 'en', '', 0, 4, '/uploads/images/equipment/biatarLight.jpg', '/uploads/images/equipment/stocks/biatarRS4-light.svg', 1, 0, '', 1, 10, 0, 0, 0, 0),
(14, 14, 'Anschutz diopter', '', 'en', '', 0, 5, '', '/uploads/images/equipment/diopter/anschutz.svg', 1, 0, '', 0, 1, 0, 0, 0, 0),
(15, 15, 'Bi7-2', '', 'en', '', 0, 4, '', '/uploads/images/equipment/stocks/bi7.svg', 1, 0, '', 0, 0, 0, 0, 0, 0),
(16, 16, 'Izhmash Bi7-3', '', 'en', '', 0, 1, '', '/uploads/images/equipment/weapons/bi7-3.svg', 1, 0, '/uploads/images/equipment/weapons/bi7-32.svg', 0, 0, 0, 0, 0, 0),
(17, 17, 'Bi7 diopter', '', 'en', '', 0, 5, '', '/uploads/images/equipment/diopter/bi7.svg', 1, 0, '', 0, 0, 0, 0, 0, 0),
(18, 18, '2Hooks', '', 'en', '', 0, 8, '', '/uploads/images/equipment/buttPlates/2hooks.svg', 1, 0, '', 0, 0, 0, 0, 0, 0),
(19, 19, 'Anschutz', '', 'en', '', 0, 8, '', '/uploads/images/equipment/buttPlates/anschutz.svg', 1, 0, '', 0, 0, 0, 0, 0, 0),
(20, 20, 'Bi7-4', '', 'en', '', 0, 4, '', '/uploads/images/equipment/stocks/bi7-4.svg', 1, 0, '', 0, 0, 0, 0, 0, 0),
(21, 21, 'Izhmash Bi7-4', '', 'en', '', 0, 1, '', '/uploads/images/equipment/weapons/bi7-4.svg', 1, 0, '/uploads/images/equipment/weapons/bi7-42.svg', 0, 0, 0, 0, 0, 0),
(22, 1, 'Anschütz 1827 F', '', 'cs', '', 0, 1, '/uploads/images/equipment/ansch-1827f.jpg', '/uploads/images/equipment/weapons/anschutz1827f.svg', 1, 0, '/uploads/images/equipment/weapons/anschutz1827f2.svg', 0, 5, -20, -5, -2, -2),
(23, 13, 'Biatar RS-4 (light)', '', 'cs', '', 0, 4, '/uploads/images/equipment/biatarLight.jpg', '/uploads/images/equipment/stocks/biatarRS4-light.svg', 1, 0, '', 1, 10, 0, 0, 0, 0),
(24, 14, 'Anschutz diopter', '', 'cs', '', 0, 5, '', '/uploads/images/equipment/diopter/anschutz.svg', 1, 0, '', 0, 1, 0, 0, 0, 0),
(25, 22, 'Anschutz', '', 'en', '', 0, 4, '', '/uploads/images/equipment/stocks/anschutz.svg', 1, 0, '', 0, 0, 0, 0, 0, 0),
(26, 23, 'Anschutz 1903', '', 'en', '', 0, 1, '', '/uploads/images/equipment/weapons/anschutz1903.svg', 1, 0, '/uploads/images/equipment/weapons/anschutz19032.svg', 0, 0, 0, 0, 0, 0),
(27, 24, 'Anschutz 1903', '', 'en', '', 0, 4, '', '/uploads/images/equipment/stocks/anschutz1903.svg', 1, 0, '', 0, 0, 0, 0, 0, 0),
(28, 25, 'Harness - blue / white', '', 'en', '', 0, 7, '', '/uploads/images/equipment/harness/blue-white.svg', 1, 0, '', 0, 0, 0, 0, 0, 0),
(29, 26, 'Harness - red / white', '', 'en', '', 0, 7, '', '/uploads/images/equipment/harness/red-white.svg', 1, 0, '', 0, 0, 0, 0, 0, 0),
(30, 27, 'Harness - orange / orange', '', 'en', '', 0, 7, '', '/uploads/images/equipment/harness/orange-orange.svg', 1, 0, '', 0, 0, 0, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
