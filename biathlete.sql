-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vygenerováno: Pon 18. čec 2016, 17:04
-- Verze serveru: 5.5.49-0ubuntu0.14.04.1
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=10 ;

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
(9, 'en', 1, 0, 3, 'Training diary', 1, 107, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=16 ;

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
(15, 108, 1, 'en', 'Add new training', '/Controllers/Log/newTraining/en.php', '/Views/Log/newTraining/en.php', 1, 0, 'training-diary-new');

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
  `money` int(15) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `mail`, `login`, `password`, `active`, `deleted`, `registered`, `lastOnlineTime`, `maxEnergy`, `actualEnergy`, `money`) VALUES
(1, 'Martin', 'Pribyl', 'ununik@gmail.com', 'ununik', '42738c57c82d918bdca73343c16cc7da', 1, 0, 1468225389, 1468854226, 20, 20, 100);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
