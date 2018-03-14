-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2018 at 08:15 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `item_det_id` int(11) NOT NULL,
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
  `serial` varchar(30) DEFAULT NULL,
  `employee` varchar(30) DEFAULT NULL,
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
  `date_returned` date NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_description` varchar(60) NOT NULL,
  `reason` varchar(60) NOT NULL,
  `returned_by` varchar(30) NOT NULL,
  `received_by` varchar(30) NOT NULL,
  `returned_status` enum('Pending','Replaced','Ignored') NOT NULL DEFAULT 'Pending',
  `userid` int(15) NOT NULL,
  PRIMARY KEY (`ret_log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
