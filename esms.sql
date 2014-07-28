-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2014 at 11:05 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `esms`
--
CREATE DATABASE IF NOT EXISTS `esms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `esms`;

-- --------------------------------------------------------

--
-- Table structure for table `esms_matches`
--

CREATE TABLE IF NOT EXISTS `esms_matches` (
  `matchID` bigint(12) NOT NULL AUTO_INCREMENT,
  `host` bigint(12) DEFAULT NULL,
  `guest` bigint(12) DEFAULT NULL,
  `winnerID` bigint(12) DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL,
  `tournamentID` bigint(12) NOT NULL,
  `tournament_phase` varchar(60) DEFAULT NULL,
  `child_match_a` bigint(12) DEFAULT NULL,
  `child_match_b` bigint(12) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`matchID`),
  KEY `host` (`host`),
  KEY `guest` (`guest`),
  KEY `tournamentID` (`tournamentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `esms_matches`
--

INSERT INTO `esms_matches` (`matchID`, `host`, `guest`, `winnerID`, `time`, `tournamentID`, `tournament_phase`, `child_match_a`, `child_match_b`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 1, '2014-06-17 00:00:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-16 22:47:14'),
(2, 2, 6, 6, '2014-06-17 00:19:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-16 22:48:38'),
(3, 3, 7, 3, '2014-06-17 00:19:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-16 22:51:12'),
(4, 4, 8, 8, '2014-06-17 00:19:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-16 22:52:27'),
(5, 1, 6, NULL, '2014-06-18 00:19:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-17 00:39:35'),
(6, 8, 7, 8, '2014-06-18 00:19:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-16 22:54:14'),
(7, 4, 2, NULL, '2014-06-18 00:19:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-17 00:39:35'),
(8, 5, 3, NULL, '2014-06-18 00:19:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-17 00:39:35'),
(9, 1, 7, NULL, '2014-06-19 00:19:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-17 00:39:35'),
(10, 3, 2, NULL, '2014-06-19 00:19:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-17 00:39:35'),
(11, 5, 8, NULL, '2014-06-19 00:19:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-17 00:39:35'),
(12, 6, 4, NULL, '2014-06-19 00:19:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-17 00:39:35'),
(13, 1, 2, NULL, '2014-06-20 00:19:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-17 00:39:35'),
(14, 4, 8, NULL, '2014-06-20 00:19:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-17 00:39:35'),
(15, 6, 3, NULL, '2014-06-20 00:19:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-17 00:39:35'),
(16, 7, 5, NULL, '2014-06-20 00:19:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-17 00:39:35'),
(17, 1, 8, NULL, '2014-06-21 00:19:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-17 00:39:35'),
(18, 5, 3, NULL, '2014-06-21 00:19:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-17 00:39:35'),
(19, 7, 4, NULL, '2014-06-21 00:19:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-17 00:39:35'),
(20, 2, 6, NULL, '2014-06-21 00:19:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-17 00:39:35'),
(21, 1, 3, NULL, '2014-06-22 00:19:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-17 00:39:35'),
(22, 6, 4, NULL, '2014-06-22 00:19:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-17 00:39:35'),
(23, 2, 5, NULL, '2014-06-22 00:19:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-17 00:39:35'),
(24, 8, 7, NULL, '2014-06-22 00:19:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-17 00:39:35'),
(25, 1, 4, NULL, '2014-06-23 00:19:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-17 00:39:35'),
(26, 7, 5, NULL, '2014-06-23 00:19:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-17 00:39:35'),
(27, 8, 6, NULL, '2014-06-23 00:19:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-17 00:39:35'),
(28, 3, 2, NULL, '2014-06-23 00:19:21', 1, 'League Match', NULL, NULL, '2014-06-17 00:39:35', '2014-06-17 00:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `esms_players`
--

CREATE TABLE IF NOT EXISTS `esms_players` (
  `playerID` bigint(12) NOT NULL AUTO_INCREMENT,
  `userID` bigint(12) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `last_name` varchar(60) DEFAULT NULL,
  `nick` varchar(100) DEFAULT NULL,
  `teamID` bigint(12) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `bio` text,
  `country` varchar(255) DEFAULT NULL,
  `facebook` varchar(80) DEFAULT NULL,
  `twitter` varchar(80) DEFAULT NULL,
  `website` varchar(80) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`playerID`),
  KEY `userID` (`userID`),
  KEY `teamID` (`teamID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `esms_players`
--

INSERT INTO `esms_players` (`playerID`, `userID`, `name`, `last_name`, `nick`, `teamID`, `avatar`, `position`, `bio`, `country`, `facebook`, `twitter`, `website`, `created_at`, `updated_at`) VALUES
(1, 1, 'Enrique', 'Mendez', 'xPeke', 1, NULL, 'Mid', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'Spain', 'fb.com/123123', 'tw.com/123213', 'www.fntic.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(2, 2, 'Soz', 'Perez', 'sOAZ', 1, NULL, 'Carry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'Spain', 'fb.com/123123', 'tw.com/123213', 'www.fntic.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(3, 3, 'YEz', 'Zerez', 'YellOwStaR', 1, NULL, 'Support', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'Spain', 'fb.com/123123', 'tw.com/123213', 'www.fntic.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(4, 4, 'Cy', 'Cijaez', 'Cyanide', 1, NULL, 'Jungler', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'Spain', 'fb.com/123123', 'tw.com/123213', 'www.fntic.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(5, 5, 'Rek', 'Perez', 'Rekkles', 1, NULL, 'Mid', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'Sweedish', 'fb.com/123123', 'tw.com/123213', 'www.fntic.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(6, 6, 'Corki', 'Nami', 'puzu', NULL, NULL, 'Carry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'Spain', 'fb.com/123123', 'tw.com/123213', 'www.fntic.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(7, 7, 'Weed', 'Master', 'Darien', 2, NULL, 'Support', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'Russia', 'fb.com/123123', 'tw.com/123213', 'www.gmb.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(8, 8, 'Lee Sin', 'Evelyn', 'Diamond', 2, NULL, 'Carry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'Russia', 'fb.com/123123', 'tw.com/123213', 'www.gmb.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(9, 9, 'Alex', 'Ichatovin', 'AlexIch', 2, NULL, 'Support', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'Russia', 'fb.com/123123', 'tw.com/123213', 'www.gmb.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(10, 10, 'Caitlyn', 'Lucian', 'Genja', 2, NULL, 'Mid', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'Russia', 'fb.com/123123', 'tw.com/123213', 'www.gmb.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(11, 11, 'Thresh', 'Annie', 'EdWard', 2, NULL, 'Jungler', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'Russia', 'fb.com/123123', 'tw.com/123213', 'www.gmb.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(12, 12, 'Daerek', 'Hart', 'LemonNation', 3, NULL, 'Jungler', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'USA', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(13, 13, 'Zachary', 'Scuderi', 'Sneaky', 3, NULL, 'Mid', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'USA', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(14, 14, 'William', 'Hartman', 'Meteos', 3, NULL, 'Carry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'USA', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(15, 15, 'An', 'Le', 'Balls', 3, NULL, 'Mid', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'USA', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(16, 16, 'Hai', 'Hai', 'Lam', 3, NULL, 'Support', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'USA', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(17, 17, 'Darshan', 'ZionSpartan', 'Upadhyaha', 4, NULL, 'Jungler', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'USA', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(18, 18, 'Alberto', 'Rengifo', 'Crumbzz', 4, NULL, 'Carry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'USA', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(19, 19, 'Danny', 'Le', 'Shiphtur', 4, NULL, 'Support', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'USA', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(20, 20, 'Michael', 'Santana', 'Imaqtpie', 4, NULL, 'Jungler', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'USA', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(21, 21, 'Alan', 'Nguyen', 'KiWiKid', 4, NULL, 'Support', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'USA', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(22, 22, 'Yiliang', 'Peng', 'Doublelift', 5, NULL, 'Carry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'USA', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(23, 23, 'Zaqyeru', 'Black', 'Aphromoo', 5, NULL, 'Support', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'USA', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(24, 24, 'Austin', 'Shin', 'Link', 5, NULL, 'Mid', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'USA', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(25, 25, 'Marcel', 'Fledkamp', 'dexter', 5, NULL, 'Offlaner', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'USA', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(26, 26, 'Shin', 'Woo-Yeong', 'Seraph', 5, NULL, 'Carry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'USA', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(27, 27, 'Oleksandar', 'Dashkevych', 'XBOCT', 6, NULL, 'Carry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'Ukraine', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(28, 28, 'Danylo', 'Ishutin', 'Dendi', 6, NULL, 'Mid', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'Ukraine', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(29, 29, 'Hlib', 'Lipatnikov', 'Funn1k', 6, NULL, 'Offlaner', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'Ukraine', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(30, 30, 'Clement', 'Ivanov', 'Puppey', 6, NULL, 'Support', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'Estonia', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(31, 31, 'Kuro Salehi', 'Takhasomi', 'KuroKy', 6, NULL, 'Support', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'Germany', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(32, 32, 'Airat', 'Gaziev', 'Silent', 7, NULL, 'Carry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'Russia', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(33, 33, 'Roman', 'Fominok ', 'Resolut1on', 7, NULL, 'Mid', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'Ukraine', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(34, 34, 'Andrew', 'Chipenko', 'Mag~', 7, NULL, 'Offlaner', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'Ukraine', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(35, 35, 'Ivan', 'Skorokhod', 'VANSKOR', 7, NULL, 'Support', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'Russia', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(36, 36, 'Andrey', 'Bondarenko', 'ALWAYSWANNAFLY', 7, NULL, 'Support', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'Ukraine', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(37, 37, 'Jonathan', 'Berg', 'Loda', 8, NULL, 'Offlaner', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'Sweden', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(38, 38, 'Bojan', 'Adamovic', 'boki', 8, NULL, 'Support', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'Serbia', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(39, 39, 'Mario', 'Zalac', 'zalac', 8, NULL, 'Support', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'Serbia', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(40, 40, 'Milutin', 'Stankovic', 'lordmilutin', 8, NULL, 'Mid', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'Serbia', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(41, 41, 'Dejan', 'Stosic', 'Dejan7', 8, NULL, 'Carry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'Serbia', 'fb.com/123123', 'tw.com/123213', 'www.c9.com', '2014-06-17 00:08:52', '2014-06-17 00:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `esms_player_invites`
--

CREATE TABLE IF NOT EXISTS `esms_player_invites` (
  `locID` bigint(12) NOT NULL AUTO_INCREMENT,
  `inviter` bigint(12) NOT NULL,
  `invited` bigint(12) NOT NULL,
  `team` bigint(12) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`locID`),
  KEY `inviter` (`inviter`),
  KEY `invited` (`invited`),
  KEY `team` (`team`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `esms_player_scores`
--

CREATE TABLE IF NOT EXISTS `esms_player_scores` (
  `locID` bigint(12) NOT NULL AUTO_INCREMENT,
  `tournamentID` bigint(12) NOT NULL,
  `matchID` bigint(12) NOT NULL,
  `playerID` bigint(12) NOT NULL,
  `k` int(5) DEFAULT '0',
  `d` int(5) DEFAULT '0',
  `a` int(5) DEFAULT '0',
  `cs` int(5) DEFAULT '0',
  `entity` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`locID`),
  KEY `tournamentID` (`tournamentID`),
  KEY `matchID` (`matchID`),
  KEY `playerID` (`playerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `esms_player_scores`
--

INSERT INTO `esms_player_scores` (`locID`, `tournamentID`, `matchID`, `playerID`, `k`, `d`, `a`, `cs`, `entity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 12, 5, 8, 112, 'Mirana', '2014-06-17 00:47:02', '2014-06-17 00:47:02'),
(2, 1, 1, 2, 2, 3, 2, 23, 'Batrider', '2014-06-17 00:47:02', '2014-06-17 00:47:02'),
(3, 1, 1, 3, 5, 4, 3, 420, 'Nyx Assassin', '2014-06-17 00:47:02', '2014-06-17 00:47:02'),
(4, 1, 1, 4, 11, 9, 9, 56, 'Enigma', '2014-06-17 00:47:02', '2014-06-17 00:47:02'),
(5, 1, 1, 5, 4, 4, 7, 77, 'Anti-Mage', '2014-06-17 00:47:02', '2014-06-17 00:47:02'),
(6, 1, 1, 22, 11, 22, 33, 56, 'Enigma', '2014-06-17 00:47:02', '2014-06-17 00:47:02'),
(7, 1, 1, 23, 4, 4, 2, 123, 'Broodmother', '2014-06-17 00:47:02', '2014-06-17 00:47:02'),
(8, 1, 1, 24, 2, 7, 23, 56, 'Nightstalker', '2014-06-17 00:47:02', '2014-06-17 00:47:02'),
(9, 1, 1, 25, 12, 6, 12, 23, 'Morphling', '2014-06-17 00:47:02', '2014-06-17 00:47:02'),
(10, 1, 1, 26, 10, 0, 10, 312, 'Crystal Maiden', '2014-06-17 00:47:02', '2014-06-17 00:47:02'),
(11, 1, 2, 7, 11, 5, 6, 322, 'Nightstalker', '2014-06-17 00:48:34', '2014-06-17 00:48:34'),
(12, 1, 2, 8, 6, 11, 5, 322, 'Nightstalker', '2014-06-17 00:48:34', '2014-06-17 00:48:34'),
(13, 1, 2, 9, 5, 6, 11, 322, 'Nightstalker', '2014-06-17 00:48:34', '2014-06-17 00:48:34'),
(14, 1, 2, 10, 11, 5, 6, 322, 'Nightstalker', '2014-06-17 00:48:34', '2014-06-17 00:48:34'),
(15, 1, 2, 11, 6, 11, 5, 322, 'Nightstalker', '2014-06-17 00:48:34', '2014-06-17 00:48:34'),
(16, 1, 2, 27, 6, 7, 11, 322, 'Nightstalker', '2014-06-17 00:48:34', '2014-06-17 00:48:34'),
(17, 1, 2, 28, 11, 6, 7, 322, 'Nightstalker', '2014-06-17 00:48:34', '2014-06-17 00:48:34'),
(18, 1, 2, 29, 7, 11, 6, 322, 'Nightstalker', '2014-06-17 00:48:34', '2014-06-17 00:48:34'),
(19, 1, 2, 30, 6, 7, 11, 322, 'Nightstalker', '2014-06-17 00:48:34', '2014-06-17 00:48:34'),
(20, 1, 2, 31, 11, 6, 7, 322, 'Nightstalker', '2014-06-17 00:48:34', '2014-06-17 00:48:34'),
(21, 1, 3, 12, 12, 12, 12, 12, 'Mirana', '2014-06-17 00:51:41', '2014-06-17 00:51:41'),
(22, 1, 3, 13, 12, 12, 12, 12, 'Mirana', '2014-06-17 00:51:41', '2014-06-17 00:51:41'),
(23, 1, 3, 14, 12, 12, 12, 12, 'Mirana', '2014-06-17 00:51:41', '2014-06-17 00:51:41'),
(24, 1, 3, 15, 12, 12, 12, 12, 'Mirana', '2014-06-17 00:51:41', '2014-06-17 00:51:41'),
(25, 1, 3, 16, 12, 12, 12, 12, 'Mirana', '2014-06-17 00:51:41', '2014-06-17 00:51:41'),
(26, 1, 3, 32, 12, 12, 12, 12, 'Mirana', '2014-06-17 00:51:41', '2014-06-17 00:51:41'),
(27, 1, 3, 33, 12, 12, 12, 12, 'Mirana', '2014-06-17 00:51:41', '2014-06-17 00:51:41'),
(28, 1, 3, 34, 12, 12, 12, 12, 'Mirana', '2014-06-17 00:51:41', '2014-06-17 00:51:41'),
(29, 1, 3, 35, 12, 12, 12, 12, 'Mirana', '2014-06-17 00:51:41', '2014-06-17 00:51:41'),
(30, 1, 3, 36, 12, 12, 12, 12, 'Mirana', '2014-06-17 00:51:41', '2014-06-17 00:51:41'),
(31, 1, 4, 17, 7, 7, 7, 111, 'Gyrocopter', '2014-06-17 00:52:20', '2014-06-17 00:52:20'),
(32, 1, 4, 18, 7, 7, 7, 111, 'Gyrocopter', '2014-06-17 00:52:20', '2014-06-17 00:52:20'),
(33, 1, 4, 19, 7, 7, 7, 111, 'Gyrocopter', '2014-06-17 00:52:20', '2014-06-17 00:52:20'),
(34, 1, 4, 20, 7, 7, 7, 111, 'Gyrocopter', '2014-06-17 00:52:20', '2014-06-17 00:52:20'),
(35, 1, 4, 21, 7, 7, 7, 111, 'Gyrocopter', '2014-06-17 00:52:20', '2014-06-17 00:52:20'),
(36, 1, 4, 37, 7, 7, 7, 111, 'Gyrocopter', '2014-06-17 00:52:20', '2014-06-17 00:52:20'),
(37, 1, 4, 38, 7, 7, 7, 111, 'Gyrocopter', '2014-06-17 00:52:20', '2014-06-17 00:52:20'),
(38, 1, 4, 39, 7, 7, 7, 111, 'Gyrocopter', '2014-06-17 00:52:20', '2014-06-17 00:52:20'),
(39, 1, 4, 40, 7, 7, 7, 111, 'Gyrocopter', '2014-06-17 00:52:20', '2014-06-17 00:52:20'),
(40, 1, 4, 41, 7, 7, 7, 111, 'Gyrocopter', '2014-06-17 00:52:20', '2014-06-17 00:52:20'),
(41, 1, 6, 37, 9, 9, 9, 123, 'Luna', '2014-06-17 00:54:10', '2014-06-17 00:54:10'),
(42, 1, 6, 38, 9, 9, 9, 123, 'Luna', '2014-06-17 00:54:10', '2014-06-17 00:54:10'),
(43, 1, 6, 39, 9, 9, 9, 123, 'Luna', '2014-06-17 00:54:10', '2014-06-17 00:54:10'),
(44, 1, 6, 40, 9, 9, 9, 123, 'Luna', '2014-06-17 00:54:10', '2014-06-17 00:54:10'),
(45, 1, 6, 41, 9, 9, 9, 123, 'Luna', '2014-06-17 00:54:10', '2014-06-17 00:54:10'),
(46, 1, 6, 32, 9, 9, 9, 123, 'Luna', '2014-06-17 00:54:10', '2014-06-17 00:54:10'),
(47, 1, 6, 33, 9, 9, 9, 123, 'Luna', '2014-06-17 00:54:10', '2014-06-17 00:54:10'),
(48, 1, 6, 34, 9, 9, 9, 123, 'Luna', '2014-06-17 00:54:10', '2014-06-17 00:54:10'),
(49, 1, 6, 35, 9, 9, 9, 123, 'Luna', '2014-06-17 00:54:10', '2014-06-17 00:54:10'),
(50, 1, 6, 36, 9, 9, 9, 123, 'Luna', '2014-06-17 00:54:10', '2014-06-17 00:54:10');

-- --------------------------------------------------------

--
-- Table structure for table `esms_teams`
--

CREATE TABLE IF NOT EXISTS `esms_teams` (
  `teamID` bigint(12) NOT NULL AUTO_INCREMENT,
  `tag` varchar(30) NOT NULL,
  `name` varchar(60) NOT NULL,
  `captain` bigint(12) DEFAULT NULL,
  `facebook` varchar(80) DEFAULT NULL,
  `twitter` varchar(80) DEFAULT NULL,
  `website` varchar(80) DEFAULT NULL,
  `about` text,
  `avatar` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`teamID`),
  UNIQUE KEY `name` (`name`,`tag`),
  KEY `captain` (`captain`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `esms_teams`
--

INSERT INTO `esms_teams` (`teamID`, `tag`, `name`, `captain`, `facebook`, `twitter`, `website`, `about`, `avatar`, `country`, `created_at`, `updated_at`) VALUES
(1, 'FNC', 'Fnatic', 1, 'www.fb.com/fnatik', 'www.twitter.com/fnatik', 'www.fnatic.com', 'In the 2014 Spring Split, Fnatic saw monumental successes and failures, but ended on a high-note, taking first place for the third split in a row. Following a humbling performance at All-Star, only defeating TPA, Fnatic will take plenty of lessons into the summer split.', 'fnatic.jpg', 'EU', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(2, 'GMB', 'Gambit Gamming', 8, 'www.fb.com/gmb', 'www.twitter.com/gmb', 'www.gambit.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'gambit.jpg', 'Russia', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(3, 'C9', 'Cloud 9', 14, 'www.fb.com/fnatik', 'www.twitter.com/fnatik', 'www.fnatic.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'c9.jpg', 'United States', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(4, 'Dig', 'Dignitas', 19, 'www.fb.com/fnatik', 'www.twitter.com/fnatik', 'www.fnatic.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'dig.jpg', 'Sweden', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(5, 'CLG', 'Counter Logic Gamming', 22, 'www.fb.com/fnatik', 'www.twitter.com/fnatik', 'www.fnatic.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500.', 'clg.jpg', 'EU', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(6, 'Na''Vi', 'Natus Vincere', 30, 'www.fb.com/navi', 'www.twitter.com/navi', 'www.navi.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'navi.jpg', 'Ukraine', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(7, 'empr', 'Empire', 34, 'www.fb.com/empire', 'www.twitter.com/empire', 'www.empire.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'empr.jpg', 'Russia', '2014-06-17 00:08:52', '2014-06-17 00:08:52'),
(8, 'ef', 'Elfak', 41, 'www.fb.com/ef', 'www.twitter.com/ef', 'www.ef.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500', 'elf.jpg', 'Serbia', '2014-06-17 00:08:52', '2014-06-17 00:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `esms_tournaments`
--

CREATE TABLE IF NOT EXISTS `esms_tournaments` (
  `tournamentID` bigint(12) NOT NULL AUTO_INCREMENT,
  `starting` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `max_teams` int(5) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `prizepool` varchar(255) DEFAULT NULL,
  `reg_open` int(1) DEFAULT NULL,
  `type` varchar(30) NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `winnerID` bigint(12) DEFAULT NULL,
  `second_place` bigint(12) DEFAULT NULL,
  `third_place` bigint(12) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tournamentID`),
  KEY `winnerID` (`winnerID`),
  KEY `second_place` (`second_place`),
  KEY `third_place` (`third_place`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `esms_tournaments`
--

INSERT INTO `esms_tournaments` (`tournamentID`, `starting`, `max_teams`, `name`, `prizepool`, `reg_open`, `type`, `cover`, `winnerID`, `second_place`, `third_place`, `created_at`, `updated_at`) VALUES
(1, '2014-06-17 00:39:35', 8, 'JoinDota Open IV', '12000', 0, 'League System', 'tourbg1.jpg', NULL, NULL, NULL, '2014-06-17 00:19:21', '2014-06-16 22:39:35'),
(2, '2014-06-17 00:20:01', 8, 'ESL ONE I', '35000', 1, 'Knockout System', 'tourbg2.jpg', NULL, NULL, NULL, '2014-06-17 00:20:01', '2014-06-17 00:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `esms_tour_applies`
--

CREATE TABLE IF NOT EXISTS `esms_tour_applies` (
  `locID` bigint(12) NOT NULL AUTO_INCREMENT,
  `tournament` bigint(12) NOT NULL,
  `team` bigint(12) NOT NULL,
  `played` int(5) DEFAULT '0',
  `won` int(5) DEFAULT '0',
  `lost` int(5) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`locID`),
  KEY `tournament` (`tournament`),
  KEY `team` (`team`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `esms_tour_applies`
--

INSERT INTO `esms_tour_applies` (`locID`, `tournament`, `team`, `played`, `won`, `lost`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 0, '2014-06-17 00:38:00', '2014-06-16 22:47:08'),
(2, 1, 2, 1, 0, 1, '2014-06-17 00:38:15', '2014-06-16 22:48:38'),
(3, 1, 3, 1, 1, 0, '2014-06-17 00:38:15', '2014-06-16 22:51:12'),
(4, 1, 4, 1, 0, 1, '2014-06-17 00:38:30', '2014-06-16 22:52:27'),
(5, 1, 5, 1, 0, 1, '2014-06-17 00:38:30', '2014-06-16 22:47:08'),
(6, 1, 6, 1, 1, 0, '2014-06-17 00:38:46', '2014-06-16 22:48:38'),
(7, 1, 7, 2, 0, 2, '2014-06-17 00:38:46', '2014-06-16 22:54:14'),
(10, 1, 8, 2, 2, 0, '2014-06-17 00:39:07', '2014-06-16 22:54:14'),
(11, 2, 1, 0, 0, 0, '2014-06-17 00:40:12', '2014-06-17 00:40:12'),
(12, 2, 2, 0, 0, 0, '2014-06-17 00:40:12', '2014-06-17 00:40:12'),
(13, 2, 3, 0, 0, 0, '2014-06-17 00:40:20', '2014-06-17 00:40:20'),
(14, 2, 4, 0, 0, 0, '2014-06-17 00:40:20', '2014-06-17 00:40:20'),
(15, 2, 5, 0, 0, 0, '2014-06-17 00:40:29', '2014-06-17 00:40:29'),
(16, 2, 6, 0, 0, 0, '2014-06-17 00:40:29', '2014-06-17 00:40:29'),
(17, 2, 7, 0, 0, 0, '2014-06-17 00:40:34', '2014-06-17 00:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `esms_users`
--

CREATE TABLE IF NOT EXISTS `esms_users` (
  `userID` bigint(12) NOT NULL AUTO_INCREMENT,
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `level` int(2) NOT NULL DEFAULT '1',
  `code` varchar(80) NOT NULL,
  `active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remember_token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `esms_users`
--

INSERT INTO `esms_users` (`userID`, `username`, `password`, `email`, `level`, `code`, `active`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'user1', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(2, 'user2', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(3, 'user3', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(4, 'user4', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(5, 'user5', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(6, 'user6', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(7, 'user7', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(8, 'user8', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(9, 'user9', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(10, 'user10', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(11, 'user11', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(12, 'user12', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(13, 'user13', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(14, 'user14', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(15, 'user15', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(16, 'user16', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(17, 'user17', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(18, 'user18', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(19, 'user19', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(20, 'user20', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(21, 'user21', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(22, 'user22', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(23, 'user23', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(24, 'user24', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(25, 'user25', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(26, 'user26', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(27, 'user27', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(28, 'user28', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(29, 'user29', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(30, 'user30', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 5, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(31, 'user31', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(32, 'user32', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(33, 'user33', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(34, 'user34', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(35, 'user35', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(36, 'user36', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(37, 'user37', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(38, 'user38', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(39, 'user39', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(40, 'user40', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 1, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL),
(41, 'admin', '$2y$10$KRbzptXNmuwQwWyFmNaHN.bwtvIFty9v6cK5PeRHq.HvKMRXNYvfC', 'mail@bla.com', 5, '', 1, '2014-06-17 00:08:52', '2014-06-17 00:08:52', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `esms_matches`
--
ALTER TABLE `esms_matches`
  ADD CONSTRAINT `esms_matches_ibfk_1` FOREIGN KEY (`host`) REFERENCES `esms_teams` (`teamID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `esms_matches_ibfk_2` FOREIGN KEY (`guest`) REFERENCES `esms_teams` (`teamID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `esms_matches_ibfk_3` FOREIGN KEY (`tournamentID`) REFERENCES `esms_tournaments` (`tournamentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `esms_players`
--
ALTER TABLE `esms_players`
  ADD CONSTRAINT `esms_players_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `esms_users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `esms_players_ibfk_2` FOREIGN KEY (`teamID`) REFERENCES `esms_teams` (`teamID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `esms_player_invites`
--
ALTER TABLE `esms_player_invites`
  ADD CONSTRAINT `esms_player_invites_ibfk_1` FOREIGN KEY (`inviter`) REFERENCES `esms_players` (`playerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `esms_player_invites_ibfk_2` FOREIGN KEY (`invited`) REFERENCES `esms_players` (`playerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `esms_player_invites_ibfk_3` FOREIGN KEY (`team`) REFERENCES `esms_teams` (`teamID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `esms_player_scores`
--
ALTER TABLE `esms_player_scores`
  ADD CONSTRAINT `esms_player_scores_ibfk_1` FOREIGN KEY (`tournamentID`) REFERENCES `esms_tournaments` (`tournamentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `esms_player_scores_ibfk_2` FOREIGN KEY (`matchID`) REFERENCES `esms_matches` (`matchID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `esms_player_scores_ibfk_3` FOREIGN KEY (`playerID`) REFERENCES `esms_players` (`playerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `esms_teams`
--
ALTER TABLE `esms_teams`
  ADD CONSTRAINT `esms_teams_ibfk_1` FOREIGN KEY (`captain`) REFERENCES `esms_players` (`playerID`);

--
-- Constraints for table `esms_tournaments`
--
ALTER TABLE `esms_tournaments`
  ADD CONSTRAINT `esms_tournaments_ibfk_1` FOREIGN KEY (`winnerID`) REFERENCES `esms_teams` (`teamID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `esms_tournaments_ibfk_2` FOREIGN KEY (`second_place`) REFERENCES `esms_teams` (`teamID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `esms_tournaments_ibfk_3` FOREIGN KEY (`third_place`) REFERENCES `esms_teams` (`teamID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `esms_tour_applies`
--
ALTER TABLE `esms_tour_applies`
  ADD CONSTRAINT `esms_tour_applies_ibfk_1` FOREIGN KEY (`tournament`) REFERENCES `esms_tournaments` (`tournamentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `esms_tour_applies_ibfk_2` FOREIGN KEY (`team`) REFERENCES `esms_teams` (`teamID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
