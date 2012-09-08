-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2012 at 04:54 PM
-- Server version: 5.5.25
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `xata`
--

-- --------------------------------------------------------

--
-- Table structure for table `ha_logins`
--

CREATE TABLE IF NOT EXISTS `ha_logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `loginProvider` varchar(50) NOT NULL,
  `loginProviderIdentifier` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `loginProvider_2` (`loginProvider`,`loginProviderIdentifier`),
  KEY `loginProvider` (`loginProvider`),
  KEY `loginProviderIdentifier` (`loginProviderIdentifier`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ha_logins`
--

INSERT INTO `ha_logins` (`id`, `userId`, `loginProvider`, `loginProviderIdentifier`) VALUES
(1, 23, 'yahoo', 'https://me.yahoo.com/a/bXWKUIp5ntp8VCg19yM4mGXzoFbvRwzxO8YCmzRfLOMC0Yq0lNTnY74xCdgm#8bec5'),
(2, 23, 'google', '116726580640274025271'),
(3, 24, 'facebook', '1462836234'),
(4, 1, 'yahoo', 'https://me.yahoo.com/a/vPxxKz8LzIshOlbfSl4rApOiiqlR6FOZtg--#efd13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE IF NOT EXISTS `tbl_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `caption` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`id`, `country_id`, `caption`) VALUES
(1, 1, 'Beijing'),
(2, 2, 'Запорожье'),
(3, 2, 'Днепропетровск'),
(4, 1, 'Hong-Kong');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE IF NOT EXISTS `tbl_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(200) NOT NULL,
  `short` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`id`, `caption`, `short`) VALUES
(1, 'China', 'CH'),
(2, 'Ukraine', 'UA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`) VALUES
(1, 'test1', 'pass1', 'test1@example.com'),
(2, 'test2', 'pass2', 'test2@example.com'),
(3, 'test3', 'pass3', 'test3@example.com'),
(4, 'test4', 'pass4', 'test4@example.com'),
(5, 'test5', 'pass5', 'test5@example.com'),
(6, 'test6', 'pass6', 'test6@example.com'),
(7, 'test7', 'pass7', 'test7@example.com'),
(8, 'test8', 'pass8', 'test8@example.com'),
(9, 'test9', 'pass9', 'test9@example.com'),
(10, 'test10', 'pass10', 'test10@example.com'),
(11, 'test11', 'pass11', 'test11@example.com'),
(12, 'test12', 'pass12', 'test12@example.com'),
(13, 'test13', 'pass13', 'test13@example.com'),
(14, 'test14', 'pass14', 'test14@example.com'),
(15, 'test15', 'pass15', 'test15@example.com'),
(16, 'test16', 'pass16', 'test16@example.com'),
(17, 'test17', 'pass17', 'test17@example.com'),
(18, 'test18', 'pass18', 'test18@example.com'),
(19, 'test19', 'pass19', 'test19@example.com'),
(20, 'test20', 'pass20', 'test20@example.com'),
(21, 'test21', 'pass21', 'test21@example.com'),
(22, 'DenisGO', 'dddddd', 'warlou@ukr.net'),
(23, 't00pin', 't1t1t1', 't00pin@yahoo.com'),
(24, 'Denis Tatarenko', 'dddddd', 'warlou@ukr.net');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_trust`
--

CREATE TABLE IF NOT EXISTS `tbl_user_trust` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid1` int(11) NOT NULL,
  `uid2` int(11) NOT NULL,
  `turst` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid1` (`uid1`),
  KEY `uid2` (`uid2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_xata`
--

CREATE TABLE IF NOT EXISTS `tbl_user_xata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `xid` int(11) NOT NULL,
  `rights` int(11) NOT NULL,
  `public` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `xid` (`xid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_user_xata`
--

INSERT INTO `tbl_user_xata` (`id`, `uid`, `xid`, `rights`, `public`) VALUES
(1, 22, 4, 16777215, 16777215);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_xata`
--

CREATE TABLE IF NOT EXISTS `tbl_xata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `address` varchar(200) NOT NULL DEFAULT '',
  `owner` int(11) NOT NULL,
  `cost` int(11) DEFAULT NULL,
  `rental_m` int(11) DEFAULT NULL,
  `rental_d` int(11) DEFAULT NULL,
  `rental_h` int(11) DEFAULT NULL,
  `visit` int(11) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`),
  KEY `tbl_xata_ibfk_2` (`city_id`),
  KEY `tbl_xata_ibfk_1` (`owner`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_xata`
--

INSERT INTO `tbl_xata` (`id`, `type_id`, `city_id`, `address`, `owner`, `cost`, `rental_m`, `rental_d`, `rental_h`, `visit`, `longitude`, `latitude`) VALUES
(1, 1, 2, 'Магистральная 84б кв 9', 1, NULL, NULL, NULL, NULL, 5, 0, 0),
(3, 1, 2, 'Магистральная 84б кв 9', 1, NULL, NULL, NULL, NULL, 5, 0, 0),
(4, 1, 2, 'Магистральная 84б кв 9', 22, 60000, 200, 50, 20, 5, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_xata_type`
--

CREATE TABLE IF NOT EXISTS `tbl_xata_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_xata_type`
--

INSERT INTO `tbl_xata_type` (`id`, `caption`, `description`, `img`) VALUES
(1, 'жилое', 'Дом, квартира, в крайнем случае комната, но что-то что обладает необходимыми условиями для проживания (электричество, вода, спальня ...)', 'images/living_place.png'),
(2, 'специальное', 'специальное помещение, обладающее специфическими свойствами, и необходимым оборудованием (мастерские, звукозаписывающие, прочее)', 'images/special_place.png'),
(3, 'складское', 'либо просто крыша и ключ, либо специальное помещение с особыми температурными характеристиками и влажностью', 'images/stock_place.png');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ha_logins`
--
ALTER TABLE `ha_logins`
  ADD CONSTRAINT `ha_logins_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD CONSTRAINT `tbl_city_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `tbl_country` (`id`);

--
-- Constraints for table `tbl_user_trust`
--
ALTER TABLE `tbl_user_trust`
  ADD CONSTRAINT `tbl_user_trust_ibfk_1` FOREIGN KEY (`uid1`) REFERENCES `tbl_user` (`id`),
  ADD CONSTRAINT `tbl_user_trust_ibfk_2` FOREIGN KEY (`uid2`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_user_xata`
--
ALTER TABLE `tbl_user_xata`
  ADD CONSTRAINT `tbl_user_xata_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `tbl_user` (`id`),
  ADD CONSTRAINT `tbl_user_xata_ibfk_2` FOREIGN KEY (`xid`) REFERENCES `tbl_xata` (`id`);

--
-- Constraints for table `tbl_xata`
--
ALTER TABLE `tbl_xata`
  ADD CONSTRAINT `tbl_xata_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `tbl_xata_type` (`id`),
  ADD CONSTRAINT `tbl_xata_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `tbl_city` (`id`),
  ADD CONSTRAINT `tbl_xata_ibfk_3` FOREIGN KEY (`owner`) REFERENCES `tbl_user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
