-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2018 at 01:17 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logs`
--
CREATE DATABASE IF NOT EXISTS `logs` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `logs`;

-- --------------------------------------------------------

--
-- Table structure for table `decreaselog`
--

CREATE TABLE `decreaselog` (
  `dec_log_id` int(15) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `serial_id` int(15) DEFAULT NULL,
  `mooed_id` int(15) DEFAULT NULL,
  `userid` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `decreaseserial`
--

CREATE TABLE `decreaseserial` (
  `ds_id` int(15) NOT NULL,
  `serial` varchar(30) DEFAULT NULL,
  `employee` varchar(30) DEFAULT NULL,
  `dec_log_id` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `editlog`
--

CREATE TABLE `editlog` (
  `edit_log_id` int(15) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `field_edited` enum('quantity','unit','item_name','item_description','item_type') NOT NULL,
  `old_value` varchar(60) NOT NULL,
  `new_value` varchar(60) NOT NULL,
  `userid` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `increaselog`
--

CREATE TABLE `increaselog` (
  `inc_log_id` int(15) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_det_id` int(15) NOT NULL,
  `userid` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `returnlog`
--

CREATE TABLE `returnlog` (
  `ret_log_id` int(15) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_returned` date NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_description` varchar(60) NOT NULL,
  `reason` varchar(60) NOT NULL,
  `returned_by` varchar(30) NOT NULL,
  `received_by` varchar(30) NOT NULL,
  `returned_status` enum('Pending','Replaced','Ignored') NOT NULL DEFAULT 'Pending',
  `userid` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `decreaselog`
--
ALTER TABLE `decreaselog`
  ADD PRIMARY KEY (`dec_log_id`);

--
-- Indexes for table `decreaseserial`
--
ALTER TABLE `decreaseserial`
  ADD PRIMARY KEY (`ds_id`);

--
-- Indexes for table `editlog`
--
ALTER TABLE `editlog`
  ADD PRIMARY KEY (`edit_log_id`);

--
-- Indexes for table `increaselog`
--
ALTER TABLE `increaselog`
  ADD PRIMARY KEY (`inc_log_id`);

--
-- Indexes for table `returnlog`
--
ALTER TABLE `returnlog`
  ADD PRIMARY KEY (`ret_log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `decreaselog`
--
ALTER TABLE `decreaselog`
  MODIFY `dec_log_id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `decreaseserial`
--
ALTER TABLE `decreaseserial`
  MODIFY `ds_id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `editlog`
--
ALTER TABLE `editlog`
  MODIFY `edit_log_id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `increaselog`
--
ALTER TABLE `increaselog`
  MODIFY `inc_log_id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `returnlog`
--
ALTER TABLE `returnlog`
  MODIFY `ret_log_id` int(15) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
