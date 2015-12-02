-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2015 at 09:00 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `melissa_ratings`
--
CREATE DATABASE IF NOT EXISTS `melissa_ratings` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `melissa_ratings`;

-- --------------------------------------------------------

--
-- Table structure for table `likes_dislikes`
--

DROP TABLE IF EXISTS `likes_dislikes`;
CREATE TABLE IF NOT EXISTS `likes_dislikes` (
`l_d_id` mediumint(9) NOT NULL,
  `is_like` tinyint(1) NOT NULL,
  `thing_id` mediumint(9) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes_dislikes`
--

INSERT INTO `likes_dislikes` (`l_d_id`, `is_like`, `thing_id`) VALUES
(1, 1, 1),
(2, 0, 1),
(3, 1, 1),
(4, 1, 1),
(5, 0, 1),
(6, 0, 1),
(7, 0, 1),
(8, 1, 1),
(9, 1, 1),
(10, 0, 1),
(11, 0, 1),
(12, 1, 1),
(13, 1, 1),
(14, 1, 1),
(15, 1, 1),
(16, 1, 1),
(17, 1, 1),
(18, 1, 1),
(19, 0, 1),
(20, 0, 2),
(21, 0, 1),
(22, 0, 1),
(23, 1, 1),
(24, 1, 1),
(25, 1, 1),
(26, 1, 2),
(27, 0, 2),
(28, 0, 2),
(29, 1, 2),
(30, 0, 1),
(31, 1, 1),
(32, 1, 2),
(33, 1, 2),
(34, 1, 1),
(35, 1, 1),
(36, 0, 1),
(37, 0, 1),
(38, 1, 1),
(39, 0, 2),
(40, 1, 2),
(41, 0, 1),
(42, 1, 1),
(43, 0, 1),
(44, 1, 1),
(45, 1, 2),
(46, 0, 2),
(47, 0, 2),
(48, 1, 2),
(49, 1, 2),
(50, 1, 1),
(51, 0, 1),
(52, 0, 1),
(53, 0, 1),
(54, 0, 1),
(55, 1, 1),
(56, 0, 2),
(57, 0, 2),
(58, 0, 2),
(59, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
`rating_id` mediumint(9) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `thing_id` mediumint(9) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_id`, `rating`, `thing_id`) VALUES
(1, 3, 1),
(2, 1, 1),
(3, 1, 1),
(4, 5, 1),
(5, 2, 1),
(6, 5, 1),
(7, 4, 1),
(8, 2, 1),
(9, 5, 1),
(10, 4, 1),
(11, 5, 1),
(12, 4, 1),
(13, 5, 1),
(14, 4, 1),
(15, 3, 1),
(16, 3, 1),
(17, 1, 1),
(18, 4, 1),
(19, 5, 1),
(20, 4, 1),
(21, 5, 1),
(22, 4, 1),
(23, 5, 1),
(24, 2, 1),
(25, 5, 1),
(26, 1, 1),
(27, 2, 1),
(28, 1, 1),
(29, 2, 1),
(30, 1, 1),
(31, 2, 1),
(32, 1, 1),
(33, 2, 1),
(34, 1, 1),
(35, 1, 1),
(36, 1, 1),
(37, 3, 1),
(38, 3, 1),
(39, 4, 1),
(40, 4, 1),
(41, 4, 1),
(42, 3, 1),
(43, 3, 1),
(44, 4, 1),
(45, 4, 1),
(46, 4, 1),
(47, 4, 1),
(48, 5, 1),
(49, 5, 1),
(50, 5, 1),
(51, 5, 1),
(52, 5, 1),
(53, 5, 1),
(54, 5, 1),
(55, 5, 1),
(56, 5, 1),
(57, 5, 1),
(58, 5, 1),
(59, 5, 1),
(60, 5, 1),
(61, 5, 1),
(62, 5, 1),
(63, 5, 1),
(64, 5, 1),
(65, 5, 1),
(66, 4, 1),
(67, 5, 1),
(68, 2, 1),
(69, 4, 1),
(70, 3, 1),
(71, 1, 1),
(72, 2, 1),
(73, 5, 1),
(74, 4, 1),
(75, 5, 1),
(76, 5, 1),
(77, 5, 1),
(78, 5, 1),
(79, 5, 1),
(80, 5, 1),
(81, 5, 1),
(82, 5, 1),
(83, 5, 1),
(84, 5, 1),
(85, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `things`
--

DROP TABLE IF EXISTS `things`;
CREATE TABLE IF NOT EXISTS `things` (
`thing_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `things`
--

INSERT INTO `things` (`thing_id`, `name`) VALUES
(1, 'first thing'),
(2, 'second thing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `likes_dislikes`
--
ALTER TABLE `likes_dislikes`
 ADD PRIMARY KEY (`l_d_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
 ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `things`
--
ALTER TABLE `things`
 ADD PRIMARY KEY (`thing_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `likes_dislikes`
--
ALTER TABLE `likes_dislikes`
MODIFY `l_d_id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
MODIFY `rating_id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `things`
--
ALTER TABLE `things`
MODIFY `thing_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
