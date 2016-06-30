-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vygenerováno: Čtv 30. čen 2016, 06:24
-- Verze serveru: 5.5.47-0ubuntu0.14.04.1
-- Verze PHP: 5.5.9-1ubuntu4.14

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=3 ;

--
-- Vypisuji data pro tabulku `mainMenu`
--

INSERT INTO `mainMenu` (`id`, `language`, `active`, `deleted`, `sorting`, `title`, `log`, `pidLink`, `externalLink`) VALUES
(1, 'en', 1, 0, 1, 'Registration', 0, 1, ''),
(2, 'en', 1, 0, 2, 'Login', 0, 2, '');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=4 ;

--
-- Vypisuji data pro tabulku `page`
--

INSERT INTO `page` (`id`, `pid`, `log`, `language`, `title`, `controller`, `view`, `active`, `deleted`) VALUES
(1, 1, 0, 'en', 'Registration', '/Controllers/Unlog/registration/en.php', '/Views/Unlog/registration/en.php', 1, 0),
(2, 2, 0, 'en', 'Login', '/Controllers/Unlog/login/en.php', '/Views/Unlog/login/en.php', 1, 0),
(3, 3, 0, 'en', 'Successful registration', '/Controllers/Unlog/login/en.php', '/Views/Unlog/SuccessRegistration/en.php', 1, 0);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
