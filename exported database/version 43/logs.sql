-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 30, 2018 at 04:34 AM
-- Server version: 5.7.21
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logs`
--

-- --------------------------------------------------------

--
-- Table structure for table `decreaselog`
--

DROP TABLE IF EXISTS `decreaselog`;
CREATE TABLE IF NOT EXISTS `decreaselog` (
  `dec_log_id` int(15) NOT NULL AUTO_INCREMENT,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dist_id` int(15) DEFAULT NULL,
  `userid` int(15) NOT NULL,
  PRIMARY KEY (`dec_log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `decreaseserial`
--

DROP TABLE IF EXISTS `decreaseserial`;
CREATE TABLE IF NOT EXISTS `decreaseserial` (
  `ds_id` int(15) NOT NULL AUTO_INCREMENT,
  `serial_id` varchar(30) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dec_log_id` int(15) NOT NULL,
  PRIMARY KEY (`ds_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `editlog`
--

DROP TABLE IF EXISTS `editlog`;
CREATE TABLE IF NOT EXISTS `editlog` (
  `edit_log_id` int(15) NOT NULL AUTO_INCREMENT,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `field_edited` enum('quantity','unit','item_name','item_description','item_type') NOT NULL,
  `old_value` varchar(60) NOT NULL,
  `new_value` varchar(60) NOT NULL,
  `item_id` int(11) NOT NULL,
  `userid` int(15) NOT NULL,
  PRIMARY KEY (`edit_log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `increaselog`
--

DROP TABLE IF EXISTS `increaselog`;
CREATE TABLE IF NOT EXISTS `increaselog` (
  `inc_log_id` int(15) NOT NULL AUTO_INCREMENT,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_det_id` int(15) NOT NULL,
  `userid` int(15) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`inc_log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `returnlog`
--

DROP TABLE IF EXISTS `returnlog`;
CREATE TABLE IF NOT EXISTS `returnlog` (
  `ret_log_id` int(15) NOT NULL AUTO_INCREMENT,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `return_id` int(15) NOT NULL,
  `userid` int(15) NOT NULL,
  PRIMARY KEY (`ret_log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transferlog`
--

DROP TABLE IF EXISTS `transferlog`;
CREATE TABLE IF NOT EXISTS `transferlog` (
  `transfer_id` int(11) NOT NULL AUTO_INCREMENT,
  `last_owner` text NOT NULL,
  `current_owner` text NOT NULL,
  `transfer_date` date NOT NULL,
  `serial_id` int(11) NOT NULL,
  PRIMARY KEY (`transfer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
