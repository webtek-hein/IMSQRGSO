-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2018 at 12:05 PM
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
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dist_id` int(15) DEFAULT NULL,
  `userid` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `decreaselog`
--

INSERT INTO `decreaselog` (`dec_log_id`, `timestamp`, `dist_id`, `userid`) VALUES
(1, '2018-03-28 17:11:57', 1, 8),
(2, '2018-03-28 17:21:46', 2, 8),
(3, '2018-03-28 17:22:26', 3, 8),
(4, '2018-03-28 17:22:44', 4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `decreaseserial`
--

CREATE TABLE `decreaseserial` (
  `ds_id` int(15) NOT NULL,
  `serial_id` varchar(30) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dec_log_id` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `decreaseserial`
--

INSERT INTO `decreaseserial` (`ds_id`, `serial_id`, `timestamp`, `dec_log_id`) VALUES
(1, '1', '2018-03-28 09:11:57', 1),
(2, '2', '2018-03-28 09:11:57', 1),
(3, '3', '2018-03-28 09:11:57', 1),
(4, '4', '2018-03-28 09:11:57', 1),
(5, '5', '2018-03-28 09:11:57', 1);

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
  `item_id` int(11) NOT NULL,
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
  `userid` int(15) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `increaselog`
--

INSERT INTO `increaselog` (`inc_log_id`, `timestamp`, `item_det_id`, `userid`, `quantity`) VALUES
(1, '2018-03-28 17:04:25', 1, 8, 10),
(2, '2018-03-28 17:21:19', 2, 8, 200),
(3, '2018-03-28 17:50:33', 3, 8, 10);

-- --------------------------------------------------------

--
-- Table structure for table `returnlog`
--

CREATE TABLE `returnlog` (
  `ret_log_id` int(15) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `return_id` int(15) NOT NULL,
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
  MODIFY `dec_log_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `decreaseserial`
--
ALTER TABLE `decreaseserial`
  MODIFY `ds_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `editlog`
--
ALTER TABLE `editlog`
  MODIFY `edit_log_id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `increaselog`
--
ALTER TABLE `increaselog`
  MODIFY `inc_log_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `returnlog`
--
ALTER TABLE `returnlog`
  MODIFY `ret_log_id` int(15) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
