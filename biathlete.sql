-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vygenerováno: Úte 04. říj 2016, 17:12
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
-- Struktura tabulky `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `timestamp` int(20) NOT NULL,
  `revenue` float NOT NULL,
  `title` text NOT NULL,
  `user` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Vypisuji data pro tabulku `bank`
--

INSERT INTO `bank` (`id`, `timestamp`, `revenue`, `title`, `user`) VALUES
(1, 1472035538, 10, 'Part time job - WOOD GROUP (timber company)', 1),
(2, 1472037814, 2, 'Part time job - WOOD GROUP (timber company)', 1),
(3, 1472038138, -2.7, 'Shop - ', 1),
(4, 1472038314, -2.7, 'Shop - LAPUA Polar Biathlon', 1),
(5, 1472038337, -85, 'Shop - Larsen rifle bag', 1),
(6, 1472038873, 10, 'Part time job - WOOD GROUP (timber company)', 1),
(7, 1472045371, 10, 'Part time job - WOOD GROUP (timber company)', 1),
(8, 1472052446, 2, 'Part time job - WOOD GROUP (timber company)', 1),
(9, 1472113907, 10, 'Part time job - WOOD GROUP (timber company)', 1),
(10, 1472120631, -2.2, 'Shop - ELEY tenex biathlon', 1),
(11, 1472120633, -2.2, 'Shop - ELEY tenex biathlon', 1),
(12, 1472120636, -2.2, 'Shop - ELEY tenex biathlon', 1),
(13, 1472120638, -2.2, 'Shop - ELEY tenex biathlon', 1),
(14, 1472120641, -2.2, 'Shop - ELEY tenex biathlon', 1),
(15, 1472467051, 10, 'Part time job - WOOD GROUP (timber company)', 1),
(16, 1474446519, 10, 'Part time job - WOOD GROUP (timber company)', 1),
(17, 1474448413, -2.7, 'Shop - LAPUA Polar Biathlon', 1),
(18, 1474448525, 10, 'Part time job - WOOD GROUP (timber company)', 1),
(19, 1475236726, 10, 'Part time job - WOOD GROUP (timber company)', 1),
(20, 1475242571, -2.7, 'Shop - LAPUA Polar Biathlon', 1),
(21, 1475243357, 10, 'Part time job - WOOD GROUP (timber company)', 1),
(22, 1475261998, 10, 'Part time job - WOOD GROUP (timber company)', 1),
(23, 1475295112, -2.2, 'Shop - ELEY tenex biathlon', 1),
(24, 1475295278, 10, 'Part time job - WOOD GROUP (timber company)', 1),
(25, 1475347626, 10, 'Part time job - WOOD GROUP (timber company)', 1),
(26, 1475386481, 10, 'Part time job - WOOD GROUP (timber company)', 1),
(27, 1475487607, 10, 'Part time job - WOOD GROUP (timber company)', 1),
(28, 1475497105, -20, 'Shop - Anschutz', 1),
(29, 1475498724, -20, 'Shop - Anschutz', 1),
(30, 1475504235, 10, 'Part time job - WOOD GROUP (timber company)', 1),
(31, 1475567196, 10, 'Part time job - WOOD GROUP (timber company)', 1),
(32, 1475573200, 10, 'Part time job - WOOD GROUP (timber company)', 1),
(33, 1475584827, 10, 'Part time job - WOOD GROUP (timber company)', 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `uid` int(5) NOT NULL AUTO_INCREMENT,
  `id` int(5) NOT NULL,
  `language` varchar(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `countries`
--

INSERT INTO `countries` (`uid`, `id`, `language`, `name`, `active`, `deleted`) VALUES
(1, 1, 'en', 'Czechia', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=32 ;

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
(30, 27, 'Harness - orange / orange', '', 'en', '', 0, 7, '', '/uploads/images/equipment/harness/orange-orange.svg', 1, 0, '', 0, 0, 0, 0, 0, 0),
(31, 28, 'Harness - black / black', '', 'en', '', 0, 7, '', '/uploads/images/equipment/harness/black-black.svg', 1, 0, '', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `equipment-producer`
--

CREATE TABLE IF NOT EXISTS `equipment-producer` (
  `uid` int(15) NOT NULL AUTO_INCREMENT,
  `id` int(15) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `language` varchar(10) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `equipment-producer`
--

INSERT INTO `equipment-producer` (`uid`, `id`, `title`, `link`, `active`, `deleted`, `language`) VALUES
(1, 1, 'Biatar', 'http://www.biatar.com/', 1, 0, 'en');

-- --------------------------------------------------------

--
-- Struktura tabulky `job-partTime`
--

CREATE TABLE IF NOT EXISTS `job-partTime` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `message` text COLLATE utf8_danish_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `description` text COLLATE utf8_danish_ci NOT NULL,
  `minEnergy` int(15) NOT NULL,
  `price1` int(10) NOT NULL,
  `price2` int(10) NOT NULL,
  `price3` int(10) NOT NULL,
  `energy1` int(10) NOT NULL,
  `energy2` int(10) NOT NULL,
  `energy3` int(10) NOT NULL,
  `language` varchar(10) COLLATE utf8_danish_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `legPower` int(10) NOT NULL DEFAULT '0',
  `handPower` int(10) NOT NULL DEFAULT '0',
  `endurance` int(10) NOT NULL DEFAULT '0',
  `stability` int(10) NOT NULL DEFAULT '0',
  `accuracy` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `job-partTime`
--

INSERT INTO `job-partTime` (`id`, `message`, `title`, `description`, `minEnergy`, `price1`, `price2`, `price3`, `energy1`, `energy2`, `energy3`, `language`, `active`, `deleted`, `legPower`, `handPower`, `endurance`, `stability`, `accuracy`) VALUES
(1, 'Part time job - WOOD GROUP (timber company)', 'WOOD GROUP (timber company)', '', 25, 2, 5, 10, 8, 13, 20, 'en', 1, 0, 2, 3, -1, 1, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `short` varchar(20) NOT NULL,
  `long` varchar(255) NOT NULL,
  `originalTitle` varchar(255) NOT NULL,
  `enTitle` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Vypisuji data pro tabulku `languages`
--

INSERT INTO `languages` (`id`, `short`, `long`, `originalTitle`, `enTitle`, `active`, `deleted`) VALUES
(1, 'en', 'English', 'English', 'English', 1, 0),
(2, 'cs', 'Czech', '?eština', 'Czech', 1, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `main-menu`
--

CREATE TABLE IF NOT EXISTS `main-menu` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `language` varchar(10) COLLATE utf8_czech_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `sorting` int(10) NOT NULL,
  `title` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `log` tinyint(1) NOT NULL,
  `pidLink` int(10) NOT NULL,
  `externalLink` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=19 ;

--
-- Vypisuji data pro tabulku `main-menu`
--

INSERT INTO `main-menu` (`id`, `language`, `active`, `deleted`, `sorting`, `title`, `log`, `pidLink`, `externalLink`) VALUES
(1, 'en', 1, 0, 1, 'Registration', 0, 1, ''),
(2, 'en', 1, 0, 2, 'Login', 0, 2, ''),
(3, 'en', 1, 0, 10, 'Logout', 1, 102, ''),
(5, 'en', 1, 0, 3, 'Rules', 0, 5, ''),
(6, 'en', 1, 0, 4, 'Authors', 0, 6, ''),
(7, 'en', 1, 0, 9, 'Settings', 1, 106, ''),
(8, 'en', 1, 0, 5, 'Game tour', 0, 7, ''),
(9, 'en', 1, 0, 3, 'Trainings', 1, 108, ''),
(10, 'en', 1, 0, 4, 'Jobs', 1, 112, ''),
(11, 'en', 1, 0, 3, 'Shop', 1, 113, ''),
(12, 'en', 1, 0, 5, 'Biathletes', 1, 115, ''),
(13, 'cs', 1, 0, 2, 'Login', 0, 2, ''),
(14, 'cs', 1, 0, 1, 'Registrace', 0, 1, ''),
(15, 'cs', 1, 0, 10, 'Odhlásit se', 1, 102, ''),
(16, 'cs', 1, 0, 9, 'Nastavení', 1, 106, ''),
(17, 'cs', 1, 0, 5, 'Biatlonisté', 1, 115, ''),
(18, 'cs', 1, 0, 4, 'Práce', 1, 112, '');

-- --------------------------------------------------------

--
-- Struktura tabulky `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `from` int(15) NOT NULL,
  `to` int(15) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `text` text NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `deletedFrom` tinyint(1) NOT NULL DEFAULT '0',
  `deletedTo` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Vypisuji data pro tabulku `message`
--

INSERT INTO `message` (`id`, `from`, `to`, `timestamp`, `text`, `seen`, `deletedFrom`, `deletedTo`) VALUES
(1, 1, 2, 1470755147, 'Test 1!!!!!', 0, 1, 0),
(2, 1, 2, 1470827883, 'fdsafsdfsafsd', 0, 0, 0),
(3, 1, 2, 1470827896, 'p;l', 0, 0, 0),
(4, 1, 2, 1470827937, 'sadsdasds', 0, 0, 0),
(5, 1, 2, 1470830214, 'das', 0, 0, 0),
(6, 1, 2, 1470830219, 'dasdas', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `pid` int(15) NOT NULL,
  `log` tinyint(1) NOT NULL,
  `language` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `controller` text COLLATE utf8_czech_ci NOT NULL,
  `view` text COLLATE utf8_czech_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `url` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=37 ;

--
-- Vypisuji data pro tabulku `page`
--

INSERT INTO `page` (`id`, `pid`, `log`, `language`, `title`, `controller`, `view`, `active`, `deleted`, `url`) VALUES
(1, 1, 0, 'en', 'Registration', '/Controllers/Unlog/registration/en.php', '/Views/Unlog/registration/en.php', 1, 0, 'registration'),
(2, 2, 0, 'en', 'Login', '/Controllers/Unlog/login/en.php', '/Views/Unlog/login/en.php', 1, 0, 'login'),
(3, 3, 0, 'en', 'Successful registration', '/Controllers/Unlog/login/en.php', '/Views/Unlog/SuccessRegistration/en.php', 1, 0, 'success-registration'),
(4, 102, 1, 'en', 'Logout', '/Controllers/Log/logout/all.php', '', 1, 0, 'logout'),
(5, 101, 1, 'en', 'Profil', '/Controllers/Log/profil/en.php', '/Views/Log/profil/en.php', 1, 0, 'profil'),
(6, 4, 0, 'en', 'Forgotten password', '/Controllers/Unlog/forgottenPassword/en.php', '/Views/Unlog/forgottenPassword/en.php', 1, 0, 'forgotten-password'),
(7, 5, 0, 'en', 'Rules', '', '/Views/Rules/en.php', 1, 0, 'rules'),
(8, 6, 0, 'en', 'Authors', '', '/Views/Authors/en.php', 1, 0, 'authors'),
(9, 103, 1, 'en', 'Profil update', '/Controllers/Log/profilUpdate/en.php', '/Views/Log/profilUpdate/en.php', 1, 0, 'profil-update'),
(10, 104, 1, 'en', 'Profil update saved', '/Controllers/Log/profilUpdate/en.php', '/Views/Log/profilUpdateSaved/en.php', 1, 0, 'profil-update-saved'),
(11, 105, 1, 'en', 'Mailbox', '/Controllers/Log/mailbox/en.php', '/Views/Log/mailbox/en.php', 1, 0, 'mailbox'),
(12, 106, 1, 'en', 'Settings', '/Controllers/Log/settings/en.php', '/Views/Log/settings/en.php', 1, 0, 'settings'),
(13, 7, 0, 'en', 'Game tour', '', '/Views/GameTour/en.php', 1, 0, 'game-tour'),
(15, 108, 1, 'en', 'Trainings', '/Controllers/Log/newTraining/en.php', '/Views/Log/newTraining/en.php', 1, 0, 'trainings'),
(16, 109, 1, 'en', 'Rules', '', '/Views/Rules/en.php', 1, 0, 'rules'),
(17, 110, 1, 'en', 'Authors', '', '/Views/Authors/en.php', 1, 0, 'authors'),
(18, 111, 1, 'en', 'Game tour', '', '/Views/GameTour/en.php', 1, 0, 'game-tour'),
(19, 112, 1, 'en', 'Jobs', '/Controllers/Log/jobs/en.php', '/Views/Log/jobs/en.php', 1, 0, 'jobs'),
(20, 113, 1, 'en', 'Shop', '/Controllers/Log/shop/en.php', '/Views/Log/shop/en.php', 1, 0, 'shop'),
(21, 114, 1, 'en', 'Workroom', '/Controllers/Log/workroom/en.php', '/Views/Log/workroom/en.php', 1, 0, 'workroom'),
(22, 115, 1, 'en', 'Biathletes', '/Controllers/Log/biathletes/en.php', '/Views/Log/biathletes/en.php', 1, 0, 'biathletes'),
(23, 116, 1, 'en', 'User', '/Controllers/User/en.php', '/Views/User/en.php', 1, 0, 'user'),
(24, 8, 0, 'en', 'User', '/Controllers/User/en.php', '/Views/User/en.php', 1, 0, 'user'),
(25, 117, 1, 'en', 'Equipment', '/Controllers/Equipment/en.php', '/Views/Equipment/en.php', 1, 0, 'equipment-detail'),
(26, 9, 0, 'en', 'Equipment', '/Controllers/Equipment/en.php', '/Views/Equipment/en.php', 1, 0, 'equipment-detail'),
(27, 118, 1, 'en', 'Send message', '/Controllers/Log/sendMessage/en.php', '/Views/Log/sendMessage/en.php', 1, 0, 'send-message'),
(28, 2, 0, 'cs', 'Login', '/Controllers/Unlog/login/en.php', '/Views/Unlog/login/en.php', 1, 0, 'login'),
(29, 1, 0, 'cs', 'Registrace', '/Controllers/Unlog/registration/en.php', '/Views/Unlog/registration/en.php', 1, 0, 'registrace'),
(30, 101, 1, 'cs', 'Profil', '/Controllers/Log/profil/en.php', '/Views/Log/profil/en.php', 1, 0, 'profil'),
(31, 103, 1, 'cs', 'Úprava profilu', '/Controllers/Log/profilUpdate/en.php', '/Views/Log/profilUpdate/en.php', 1, 0, 'uprava-profilu'),
(32, 114, 1, 'cs', 'Dílna', '/Controllers/Log/workroom/en.php', '/Views/Log/workroom/en.php', 1, 0, 'dilna'),
(33, 102, 1, 'cs', 'Logout', '/Controllers/Log/logout/all.php', '', 1, 0, 'logout'),
(34, 106, 1, 'cs', 'Nastavení', '/Controllers/Log/settings/en.php', '/Views/Log/settings/en.php', 1, 0, 'nastaveni'),
(35, 115, 1, 'cs', 'Biatlonisté', '/Controllers/Log/biathletes/en.php', '/Views/Log/biathletes/en.php', 1, 0, 'biatloniste'),
(36, 119, 1, 'en', 'Bank', '/Controllers/Log/bank/en.php', '/Views/Log/bank/en.php', 1, 0, 'bank');

-- --------------------------------------------------------

--
-- Struktura tabulky `partners`
--

CREATE TABLE IF NOT EXISTS `partners` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `language` varchar(15) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Vypisuji data pro tabulku `partners`
--

INSERT INTO `partners` (`uid`, `id`, `title`, `language`, `active`, `deleted`) VALUES
(1, 1, 'Viessmann', 'en', 1, 0),
(2, 2, 'Atex', 'en', 1, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `partners-stickers`
--

CREATE TABLE IF NOT EXISTS `partners-stickers` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `partner` int(15) NOT NULL,
  `path` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Vypisuji data pro tabulku `partners-stickers`
--

INSERT INTO `partners-stickers` (`id`, `partner`, `path`, `active`, `deleted`) VALUES
(1, 1, '/uploads/images/sponsors/sticks/viessmann.svg', 1, 0),
(2, 2, '/uploads/images/sponsors/sticks/atex.svg', 1, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `rules`
--

CREATE TABLE IF NOT EXISTS `rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(10) COLLATE utf8_danish_ci NOT NULL,
  `text` text COLLATE utf8_danish_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `rules`
--

INSERT INTO `rules` (`id`, `language`, `text`, `active`, `deleted`) VALUES
(1, 'en', 'Users must be over 10 years old.', 1, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `shops`
--

CREATE TABLE IF NOT EXISTS `shops` (
  `uid` int(15) NOT NULL AUTO_INCREMENT,
  `id` int(15) NOT NULL,
  `title` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `description` text COLLATE utf8_danish_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `language` varchar(10) COLLATE utf8_danish_ci NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=3 ;

--
-- Vypisuji data pro tabulku `shops`
--

INSERT INTO `shops` (`uid`, `id`, `title`, `description`, `active`, `deleted`, `language`, `sort`) VALUES
(1, 1, 'Fischer sport', 'All sport items', 1, 0, 'en', 0),
(2, 2, 'The Gun Store', 'Guns ...', 1, 0, 'en', 10);

-- --------------------------------------------------------

--
-- Struktura tabulky `shops-category`
--

CREATE TABLE IF NOT EXISTS `shops-category` (
  `uid` int(15) NOT NULL AUTO_INCREMENT,
  `id` int(15) NOT NULL,
  `title` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `language` varchar(15) COLLATE utf8_danish_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=9 ;

--
-- Vypisuji data pro tabulku `shops-category`
--

INSERT INTO `shops-category` (`uid`, `id`, `title`, `language`, `active`, `deleted`) VALUES
(1, 1, 'Weapons', 'en', 1, 0),
(2, 2, 'Cartridges', 'en', 1, 0),
(3, 3, 'Accessories', 'en', 1, 0),
(4, 4, 'Stocks', 'en', 1, 0),
(5, 5, 'Diopter', 'en', 1, 0),
(6, 6, 'Rifle slings', 'en', 1, 0),
(7, 7, 'Harness', 'en', 1, 0),
(8, 8, 'Butt plates', 'en', 1, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `shops-item`
--

CREATE TABLE IF NOT EXISTS `shops-item` (
  `uid` int(15) NOT NULL AUTO_INCREMENT,
  `id` int(15) NOT NULL,
  `language` varchar(15) COLLATE utf8_danish_ci NOT NULL,
  `shop` int(15) NOT NULL,
  `equipment` int(15) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `price` float NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=11 ;

--
-- Vypisuji data pro tabulku `shops-item`
--

INSERT INTO `shops-item` (`uid`, `id`, `language`, `shop`, `equipment`, `active`, `deleted`, `price`) VALUES
(1, 1, 'en', 2, 1, 1, 0, 350),
(2, 2, 'en', 2, 2, 1, 0, 2.2),
(3, 3, 'en', 2, 3, 1, 0, 2.7),
(4, 4, 'en', 2, 4, 1, 0, 60),
(5, 5, 'en', 2, 5, 1, 0, 85),
(6, 6, 'en', 2, 6, 1, 0, 40),
(7, 7, 'en', 2, 12, 1, 0, 100),
(8, 8, 'en', 2, 13, 1, 0, 100),
(9, 9, 'en', 2, 22, 1, 0, 20),
(10, 9, 'en', 2, 23, 1, 0, 20);

-- --------------------------------------------------------

--
-- Struktura tabulky `training-category`
--

CREATE TABLE IF NOT EXISTS `training-category` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `language` varchar(15) COLLATE utf8_danish_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `sort` int(10) NOT NULL,
  `img` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=6 ;

--
-- Vypisuji data pro tabulku `training-category`
--

INSERT INTO `training-category` (`id`, `language`, `title`, `subtitle`, `active`, `deleted`, `sort`, `img`) VALUES
(1, 'en', 'Running', '', 1, 0, 3, ''),
(2, 'en', 'Gym', '', 1, 0, 10, '/images/icons/gym.svg'),
(3, 'en', 'Shooting', '', 1, 0, 2, '/images/icons/shooting.svg'),
(4, 'en', 'CC skiing', '', 1, 0, 1, ''),
(5, 'en', 'Biking', '', 1, 0, 12, '/images/icons/biking.svg');

-- --------------------------------------------------------

--
-- Struktura tabulky `training-subcategory`
--

CREATE TABLE IF NOT EXISTS `training-subcategory` (
  `uid` int(15) NOT NULL AUTO_INCREMENT,
  `id` int(15) NOT NULL,
  `category` int(15) NOT NULL,
  `title` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `description` text COLLATE utf8_danish_ci NOT NULL,
  `language` varchar(10) COLLATE utf8_danish_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL,
  `energy` int(15) NOT NULL,
  `time` int(20) NOT NULL,
  `price` float NOT NULL,
  `message` text COLLATE utf8_danish_ci NOT NULL,
  `accuracy` int(11) NOT NULL,
  `endurance` int(11) NOT NULL,
  `handPower` int(11) NOT NULL,
  `legPower` int(11) NOT NULL,
  `stability` int(11) NOT NULL,
  `cartridges` int(11) NOT NULL DEFAULT '0',
  `addToEnergy` int(10) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=4 ;

--
-- Vypisuji data pro tabulku `training-subcategory`
--

INSERT INTO `training-subcategory` (`uid`, `id`, `category`, `title`, `description`, `language`, `active`, `deleted`, `sort`, `energy`, `time`, `price`, `message`, `accuracy`, `endurance`, `handPower`, `legPower`, `stability`, `cartridges`, `addToEnergy`) VALUES
(1, 1, 1, 'Slow run', 'afsdfsdafsdfds', 'en', 1, 0, 0, 10, 1, 0, 'You have slow running training', 0, 0, 0, 0, 0, 0, 1),
(2, 2, 1, 'Fast run', 'afsdfsdafsdfds', 'en', 1, 0, 0, 11, 350, 10, 'You have fast running training', 100, 0, 0, 0, 0, 0, 2),
(3, 3, 3, 'Zeroing', 'gdsfgfdgfdgdfgsfdgdf', 'en', 1, 0, 0, 5, 20, 0, 'You have zeroing training', 0, 0, 0, 0, 0, 2, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `translation`
--

CREATE TABLE IF NOT EXISTS `translation` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `language` varchar(15) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `original` text CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `translated` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=39 ;

--
-- Vypisuji data pro tabulku `translation`
--

INSERT INTO `translation` (`id`, `language`, `original`, `translated`) VALUES
(1, 'cs', 'Password', 'Heslo'),
(2, 'cs', 'I forgot my password.', 'ZapomnÄ›l jsem svÃ© heslo.'),
(3, 'cs', 'I don''t have any account.', 'JeÅ¡tÄ› nemÃ¡m svÅ¯j ÃºÄet.'),
(5, 'cs', 'Login is mandatory field.', 'Login musÃ­ bÃ½t vyplnÄ›nÃ½.'),
(6, 'cs', 'Password is mandatory field.', 'Heslo musÃ­ bÃ½t vyplnÄ›nÃ©.'),
(7, 'cs', 'Wrong login or password', 'Å patnÃ© jmÃ©no nebo heslo.'),
(8, 'cs', 'Password again', 'Heslo znovu'),
(9, 'cs', 'I agree with rules.', 'SouhlasÃ­m s pravidly'),
(10, 'cs', 'I have an account.', 'MÃ¡m svÅ¯j ÃºÄet.'),
(11, 'cs', 'REGISTER', 'REGISTRUJ'),
(12, 'cs', 'Login is mandatory field.', 'Login je povinnÃ½.'),
(13, 'cs', 'Login is too long.', 'Login je pÅ™Ã­liÅ¡ dlouhÃ½.'),
(14, 'cs', 'This login is occupied.', 'Tento login je obsazenÃ½.'),
(15, 'cs', 'Accuracy', 'PÅ™esnost'),
(16, 'cs', 'Best cartridge', 'NejlepÅ¡Ã­ nÃ¡boje'),
(17, 'cs', '(for competitions)', '(na zÃ¡vody)'),
(18, 'cs', 'Leg power', 'SÃ­la nohou'),
(19, 'cs', 'Hand power', 'SÃ­la rukou'),
(20, 'cs', 'Endurance', 'Vytrvalost'),
(21, 'cs', 'Stability', 'Stabilita'),
(22, 'cs', 'Workroom', 'DÃ­lna'),
(23, 'cs', 'Update profil', 'Upravit profil'),
(24, 'cs', 'Link to profil:', 'Odkaz na profil:'),
(25, 'cs', 'My equipment', 'MÃ© vybavenÃ­'),
(26, 'cs', 'Firstname', 'JmÃ©no'),
(27, 'cs', 'Lastname', 'PÅ™Ã­jjmenÃ­'),
(28, 'cs', 'Gender', 'PohlavÃ­'),
(29, 'cs', 'FEMALE', 'Å½ENA'),
(30, 'cs', 'MALE', 'MUÅ½'),
(31, 'cs', 'Personal', 'OsobnÃ­'),
(32, 'cs', 'Password', 'Heslo'),
(33, 'cs', 'Energy', 'Energie'),
(34, 'cs', 'Actual activity', 'AktuÃ¡lnÃ­ aktivita'),
(35, 'cs', 'Completed weapon', 'KompletnÃ­ zbraÅˆ'),
(36, 'cs', 'Bank', 'Banka'),
(37, 'cs', 'Money operations', 'Penezni operace'),
(38, 'cs', 'REMOVE STICKER', 'ODSTRANIT SAMOLEPKU');

-- --------------------------------------------------------

--
-- Struktura tabulky `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `login` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `country` int(5) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `registered` int(20) NOT NULL,
  `lastOnlineTime` int(20) NOT NULL,
  `maxEnergy` int(10) NOT NULL DEFAULT '20',
  `actualEnergy` int(10) NOT NULL DEFAULT '20',
  `money` float NOT NULL DEFAULT '100',
  `lastActivityTimestamp` int(20) NOT NULL,
  `lastActivity` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `stayLogin` tinyint(1) NOT NULL DEFAULT '1',
  `nextEnergyTimestamp` int(20) NOT NULL,
  `howLongToNextEnergy` int(20) NOT NULL,
  `gender` enum('m','f','n') COLLATE utf8_czech_ci NOT NULL DEFAULT 'n',
  `weapon` int(10) NOT NULL,
  `stock` int(10) NOT NULL,
  `diopter` int(10) NOT NULL,
  `rifle_sling` int(10) NOT NULL,
  `harness` int(10) NOT NULL,
  `buttPlate` int(10) NOT NULL,
  `accuracy` int(10) NOT NULL,
  `legPower` int(10) NOT NULL,
  `handPower` int(10) NOT NULL,
  `endurance` int(10) NOT NULL,
  `stability` int(10) NOT NULL,
  `sticker` int(15) NOT NULL,
  `sticker-actived` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=5 ;

--
-- Vypisuji data pro tabulku `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `mail`, `login`, `password`, `country`, `active`, `deleted`, `registered`, `lastOnlineTime`, `maxEnergy`, `actualEnergy`, `money`, `lastActivityTimestamp`, `lastActivity`, `stayLogin`, `nextEnergyTimestamp`, `howLongToNextEnergy`, `gender`, `weapon`, `stock`, `diopter`, `rifle_sling`, `harness`, `buttPlate`, `accuracy`, `legPower`, `handPower`, `endurance`, `stability`, `sticker`, `sticker-actived`) VALUES
(1, 'Martin', 'PÅ™ibyl', 'ununik@gmail.com', 'ununik', '42738c57c82d918bdca73343c16cc7da', 1, 1, 0, 1468225389, 1475588723, 47, 47, 64.5, 1475586627, 'Part time job - WOOD GROUP (timber company)', 1, 1475588786, 120, 'm', 1, 12, 14, 10, 28, 18, 555, 171, 241, 82, 178, 1, 1),
(2, '', '', 'lsdsa@fdfs.sdfa', 'test123', '2a818cb3c27b7915cc998ca3e63ef62f', 0, 1, 0, 1469902789, 1472467065, 20, 20, 100, 0, '', 1, 0, 0, 'n', 7, 8, 9, 10, 11, 0, 0, 0, 0, 0, 0, 0, 0),
(3, '', '', 'unusad@fsd.dsa', 'dsfafsad', '2a818cb3c27b7915cc998ca3e63ef62f', 0, 1, 0, 1470063945, 1470389835, 20, 20, 100, 0, '', 1, 0, 0, 'n', 7, 8, 9, 10, 11, 0, 0, 0, 0, 0, 0, 0, 0),
(4, '', '', 'unusad@fsd.dsaa', 'dsfafsada', '2a818cb3c27b7915cc998ca3e63ef62f', 0, 1, 0, 1470063990, 1470130837, 20, 20, 100, 0, '', 1, 0, 0, 'n', 7, 8, 9, 10, 11, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `user-item`
--

CREATE TABLE IF NOT EXISTS `user-item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(15) NOT NULL,
  `item` int(15) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `count` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=39 ;

--
-- Vypisuji data pro tabulku `user-item`
--

INSERT INTO `user-item` (`id`, `user`, `item`, `timestamp`, `count`) VALUES
(1, 1, 2, 1470397326, 0),
(2, 1, 3, 1475242571, 11),
(3, 1, 4, 1469792731, 2),
(4, 0, 7, 1470063816, 3),
(5, 0, 8, 1470063816, 3),
(6, 0, 9, 1470063816, 3),
(7, 0, 10, 1470063816, 3),
(8, 0, 11, 1470063816, 3),
(9, 3, 7, 1470063946, 1),
(10, 3, 8, 1470063946, 1),
(11, 3, 9, 1470063946, 1),
(12, 3, 10, 1470063946, 1),
(13, 3, 11, 1470063946, 1),
(14, 1, 7, 1470063990, 1),
(15, 1, 8, 1470063990, 1),
(16, 1, 9, 1470063990, 1),
(17, 1, 10, 1470063990, 1),
(18, 1, 11, 1470063990, 1),
(19, 1, 13, 1470130089, 1),
(20, 1, 12, 1470130090, 1),
(21, 1, 1, 1471946071, 2),
(22, 1, 14, 1470146647, 1),
(23, 1, 15, 1470146647, 1),
(24, 1, 16, 1470146647, 1),
(25, 1, 17, 1470146647, 1),
(26, 1, 19, 1470146647, 1),
(27, 1, 18, 1470146647, 1),
(28, 1, 20, 1470146647, 1),
(29, 1, 21, 1470146647, 1),
(30, 1, 5, 1472038337, 1),
(31, 1, 2, 1475495295, 0),
(32, 1, 22, 1475498724, 2),
(33, 1, 23, 1475498724, 2),
(34, 1, 24, 1475498724, 2),
(35, 1, 25, 1475498724, 2),
(36, 1, 26, 1475498724, 2),
(37, 1, 27, 1475498724, 2),
(38, 1, 28, 1472038337, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
