-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2018 at 12:17 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `decreaselog`
--

CREATE TABLE `decreaselog` (
  `dec_log_id` int(15) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_name` varchar(60) NOT NULL,
  `serial` varchar(60) NOT NULL,
  `date_acquired` date NOT NULL,
  `receivedby` varchar(60) NOT NULL,
  `received_from` varchar(60) NOT NULL,
  `item_status` varchar(60) NOT NULL,
  `account_code` int(45) NOT NULL,
  `department` int(120) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `editlog`
--

CREATE TABLE `editlog` (
  `edit_log_id` int(15) NOT NULL,
  `before_item_name` varchar(45) NOT NULL,
  `adter_item_name` varchar(45) NOT NULL,
  `before_description` varchar(80) NOT NULL,
  `after_description` varchar(80) NOT NULL,
  `before_unit` varchar(20) NOT NULL,
  `after_unit` varchar(20) NOT NULL,
  `before_item_type` varchar(15) NOT NULL,
  `after_item_type` varchar(15) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `increaselog`
--

CREATE TABLE `increaselog` (
  `inc_log_id` int(15) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_name` varchar(60) NOT NULL,
  `item_description` varchar(250) NOT NULL,
  `item_type` enum('Capital Outlay','MOOE') NOT NULL DEFAULT 'Capital Outlay',
  `quantity` int(9) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `delivery_date` date NOT NULL,
  `date_received` date NOT NULL,
  `expiration_date` date NOT NULL,
  `supplier_id` int(15) NOT NULL DEFAULT '1',
  `item_id` int(15) NOT NULL,
  `unit_cost` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `increaselog`
--

INSERT INTO `increaselog` (`inc_log_id`, `date`, `item_name`, `item_description`, `item_type`, `quantity`, `unit`, `delivery_date`, `date_received`, `expiration_date`, `supplier_id`, `item_id`, `unit_cost`) VALUES
(1, '2018-01-29 20:41:04', 'Test', 'Test', 'Capital Outlay', 5, 'piece', '2018-01-29', '2018-01-29', '2018-01-29', 1, 1, 50),
(2, '2018-01-29 20:41:37', 'Test', 'Test', 'Capital Outlay', 5, 'piece', '2018-01-29', '2018-01-29', '2018-01-29', 1, 1, 50),
(3, '2018-01-29 20:43:06', 'Test2', 'Test2', 'MOOE', 5, 'piece', '2018-01-29', '2018-01-29', '2018-01-29', 1, 2, 50),
(4, '2018-01-29 20:43:50', 'Test2', 'Test2', 'MOOE', 5, 'piece', '2018-01-29', '2018-01-29', '2018-01-29', 1, 2, 50);

-- --------------------------------------------------------

--
-- Table structure for table `returnlog`
--

CREATE TABLE `returnlog` (
  `ret_log_id` int(15) NOT NULL,
  `date_return` date NOT NULL,
  `reason` varchar(60) NOT NULL,
  `receive_from` varchar(15) NOT NULL,
  `received_by` varchar(15) NOT NULL,
  `status_return` varchar(15) NOT NULL
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
-- AUTO_INCREMENT for table `editlog`
--
ALTER TABLE `editlog`
  MODIFY `edit_log_id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `increaselog`
--
ALTER TABLE `increaselog`
  MODIFY `inc_log_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `returnlog`
--
ALTER TABLE `returnlog`
  MODIFY `ret_log_id` int(15) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
