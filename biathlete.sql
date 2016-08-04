-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vygenerováno: Čtv 04. srp 2016, 18:05
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
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=21 ;

--
-- Vypisuji data pro tabulku `equipment`
--

INSERT INTO `equipment` (`uid`, `id`, `title`, `description`, `language`, `specialCode`, `used`, `categoryInShop`, `image`, `svgImage`, `active`, `deleted`, `svgImage2`) VALUES
(1, 1, 'Anschütz 1827 F', '', 'en', '', 0, 1, '/uploads/images/equipment/ansch-1827f.jpg', '/uploads/images/equipment/weapons/anschutz1827f.svg', 1, 0, '/uploads/images/equipment/weapons/anschutz1827f2.svg'),
(2, 2, 'ELEY tenex biathlon', '', 'en', '', 0, 2, '/uploads/images/equipment/eley-tenex-box.jpg', '', 1, 0, ''),
(3, 3, 'LAPUA Polar Biathlon', '', 'en', '', 0, 2, '/uploads/images/equipment/lapuaPolar.jpg', '', 1, 0, ''),
(4, 4, 'Anschütz magazine', '', 'en', '', 0, 3, '/uploads/images/equipment/ans_magazine.jpg', '', 1, 0, ''),
(5, 5, 'Larsen rifle bag', '', 'en', '', 0, 3, '/uploads/images/equipment/larsen-futral.jpg', '', 1, 0, ''),
(6, 6, 'Larsen armsling', '', 'en', '', 0, 3, '/uploads/images/equipment/larsen-sling.jpg', '', 1, 0, ''),
(7, 7, 'Default metal', '', 'en', '', 0, 1, '', '', 1, 0, ''),
(8, 8, 'Default STOCK', '', 'en', '', 0, 4, '', '/uploads/images/equipment/stocks/default.svg', 1, 0, ''),
(9, 9, 'Default diopter', '', 'en', '', 0, 5, '', '', 1, 0, ''),
(10, 10, 'Default rifle sling', '', 'en', '', 0, 6, '', '', 1, 0, ''),
(11, 11, 'Default harness', '', 'en', '', 0, 7, '', '/uploads/images/equipment/harness/default.svg', 1, 0, ''),
(12, 12, 'Biatar RS-4 (dark)', '', 'en', '', 0, 4, '/uploads/images/equipment/biatarLight.jpg', '/uploads/images/equipment/stocks/biatarRS4-dark.svg', 1, 0, ''),
(13, 13, 'Biatar RS-4 (light)', '', 'en', '', 0, 4, '/uploads/images/equipment/biatarLight.jpg', '/uploads/images/equipment/stocks/biatarRS4-light.svg', 1, 0, ''),
(14, 14, 'Anschutz diopter', '', 'en', '', 0, 5, '', '/uploads/images/equipment/diopter/anschutz.svg', 1, 0, ''),
(15, 15, 'Bi7-2', '', 'en', '', 0, 4, '', '/uploads/images/equipment/stocks/bi7.svg', 1, 0, ''),
(16, 16, 'Izhmash Bi7-3', '', 'en', '', 0, 1, '', '/uploads/images/equipment/weapons/bi7-3.svg', 1, 0, '/uploads/images/equipment/weapons/bi7-32.svg'),
(17, 17, 'Bi7 diopter', '', 'en', '', 0, 5, '', '/uploads/images/equipment/diopter/bi7.svg', 1, 0, ''),
(18, 18, '2Hooks', '', 'en', '', 0, 8, '', '/uploads/images/equipment/buttPlates/2hooks.svg', 1, 0, ''),
(19, 19, 'Anschutz', '', 'en', '', 0, 8, '', '/uploads/images/equipment/buttPlates/anschutz.svg', 1, 0, ''),
(20, 20, 'Bi7-4', '', 'en', '', 0, 4, '', '/uploads/images/equipment/stocks/bi7-4.svg', 1, 0, '');

-- --------------------------------------------------------

--
-- Struktura tabulky `job-partTime`
--

CREATE TABLE IF NOT EXISTS `job-partTime` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `job-partTime`
--

INSERT INTO `job-partTime` (`id`, `title`, `description`, `minEnergy`, `price1`, `price2`, `price3`, `energy1`, `energy2`, `energy3`, `language`, `active`, `deleted`) VALUES
(1, 'WOOD GROUP (timber company)', '', 25, 2, 5, 10, 8, 13, 20, 'en', 1, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `mainMenu`
--

CREATE TABLE IF NOT EXISTS `mainMenu` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=13 ;

--
-- Vypisuji data pro tabulku `mainMenu`
--

INSERT INTO `mainMenu` (`id`, `language`, `active`, `deleted`, `sorting`, `title`, `log`, `pidLink`, `externalLink`) VALUES
(1, 'en', 1, 0, 1, 'Registration', 0, 1, ''),
(2, 'en', 1, 0, 2, 'Login', 0, 2, ''),
(3, 'en', 1, 0, 10, 'Logout', 1, 102, ''),
(5, 'en', 1, 0, 3, 'Rules', 0, 5, ''),
(6, 'en', 1, 0, 4, 'Authors', 0, 6, ''),
(7, 'en', 1, 0, 9, 'Settings', 1, 106, ''),
(8, 'en', 1, 0, 5, 'Game tour', 0, 7, ''),
(9, 'en', 1, 0, 3, 'Training diary', 1, 107, ''),
(10, 'en', 1, 0, 4, 'Jobs', 1, 112, ''),
(11, 'en', 1, 0, 3, 'Shop', 1, 113, ''),
(12, 'en', 1, 0, 5, 'Biathletes', 1, 115, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=25 ;

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
(14, 107, 1, 'en', 'Training diary', '/Controllers/Log/trainingDiary/en.php', '/Views/Log/trainingDiary/en.php', 1, 0, 'training-diary'),
(15, 108, 1, 'en', 'Add new training', '/Controllers/Log/newTraining/en.php', '/Views/Log/newTraining/en.php', 1, 0, 'training-diary-new'),
(16, 109, 1, 'en', 'Rules', '', '/Views/Rules/en.php', 1, 0, 'rules'),
(17, 110, 1, 'en', 'Authors', '', '/Views/Authors/en.php', 1, 0, 'authors'),
(18, 111, 1, 'en', 'Game tour', '', '/Views/GameTour/en.php', 1, 0, 'game-tour'),
(19, 112, 1, 'en', 'Jobs', '/Controllers/Log/jobs/en.php', '/Views/Log/jobs/en.php', 1, 0, 'jobs'),
(20, 113, 1, 'en', 'Shop', '/Controllers/Log/shop/en.php', '/Views/Log/shop/en.php', 1, 0, 'shop'),
(21, 114, 1, 'en', 'Workroom', '/Controllers/Log/workroom/en.php', '/Views/Log/workroom/en.php', 1, 0, 'workroom'),
(22, 115, 1, 'en', 'Biathletes', '/Controllers/Log/biathletes/en.php', '/Views/Log/biathletes/en.php', 1, 0, 'biathletes'),
(23, 116, 1, 'en', 'User', '/Controllers/User/en.php', '/Views/User/en.php', 1, 0, 'user'),
(24, 8, 0, 'en', 'User', '/Controllers/User/en.php', '/Views/User/en.php', 1, 0, 'user');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=9 ;

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
(8, 8, 'en', 2, 13, 1, 0, 100);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=5 ;

--
-- Vypisuji data pro tabulku `training-category`
--

INSERT INTO `training-category` (`id`, `language`, `title`, `subtitle`, `active`, `deleted`, `sort`) VALUES
(1, 'en', 'Running', '', 1, 0, 3),
(2, 'en', 'Gym', '', 1, 0, 10),
(3, 'en', 'Shooting', '', 1, 0, 2),
(4, 'en', 'CC skiing', '', 1, 0, 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `training-subcategory`
--

CREATE TABLE IF NOT EXISTS `training-subcategory` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `category` int(15) NOT NULL,
  `title` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `description` text COLLATE utf8_danish_ci NOT NULL,
  `language` varchar(10) COLLATE utf8_danish_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `training-subcategory`
--

INSERT INTO `training-subcategory` (`id`, `category`, `title`, `description`, `language`, `active`, `deleted`, `sort`) VALUES
(1, 1, 'Slow run', 'afsdfsdafsdfds', 'en', 1, 0, 0);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=5 ;

--
-- Vypisuji data pro tabulku `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `mail`, `login`, `password`, `active`, `deleted`, `registered`, `lastOnlineTime`, `maxEnergy`, `actualEnergy`, `money`, `lastActivityTimestamp`, `lastActivity`, `stayLogin`, `nextEnergyTimestamp`, `howLongToNextEnergy`, `gender`, `weapon`, `stock`, `diopter`, `rifle_sling`, `harness`, `buttPlate`) VALUES
(1, 'Martin', 'PÅ™ibyl', 'ununik@gmail.com', 'ununik', '42738c57c82d918bdca73343c16cc7da', 1, 0, 1468225389, 1470326709, 40, 40, 218.3, 1470235183, 'Part time job (WOOD GROUP (timber company))', 1, 1470240189, 120, 'm', 16, 12, 17, 10, 11, 18),
(2, '', '', 'lsdsa@fdfs.sdfa', 'test123', '2a818cb3c27b7915cc998ca3e63ef62f', 1, 0, 1469902789, 1470231601, 20, 20, 100, 0, '', 1, 0, 0, 'n', 7, 8, 9, 10, 11, 0),
(3, '', '', 'unusad@fsd.dsa', 'dsfafsad', '2a818cb3c27b7915cc998ca3e63ef62f', 1, 0, 1470063945, 1470136485, 20, 20, 100, 0, '', 1, 0, 0, 'n', 7, 8, 9, 10, 11, 0),
(4, '', '', 'unusad@fsd.dsaa', 'dsfafsada', '2a818cb3c27b7915cc998ca3e63ef62f', 1, 0, 1470063990, 1470130837, 20, 20, 100, 0, '', 1, 0, 0, 'n', 7, 8, 9, 10, 11, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=29 ;

--
-- Vypisuji data pro tabulku `user-item`
--

INSERT INTO `user-item` (`id`, `user`, `item`, `timestamp`, `count`) VALUES
(1, 1, 2, 1469792747, 5),
(2, 1, 3, 1470130065, 15),
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
(21, 1, 1, 1470146647, 1),
(22, 1, 14, 1470146647, 1),
(23, 1, 15, 1470146647, 1),
(24, 1, 16, 1470146647, 1),
(25, 1, 17, 1470146647, 1),
(26, 1, 19, 1470146647, 1),
(27, 1, 18, 1470146647, 1),
(28, 1, 20, 1470146647, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
