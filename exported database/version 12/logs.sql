-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2018 at 08:39 PM
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
  `serial` int(15) DEFAULT NULL,
  `mooed_id` int(15) DEFAULT NULL,
  `userid` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `decreaseserial`
--

CREATE TABLE `decreaseserial` (
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

--
-- Dumping data for table `increaselog`
--

INSERT INTO `increaselog` (`inc_log_id`, `timestamp`, `item_det_id`, `userid`) VALUES
(1, '2018-02-08 22:38:49', 0, 0),
(2, '2018-02-08 22:42:30', 0, 0),
(3, '2018-02-08 22:46:55', 0, 0),
(4, '2018-02-08 22:54:53', 0, 0),
(5, '2018-02-08 23:02:11', 0, 0),
(6, '2018-02-08 23:05:51', 0, 0),
(7, '2018-02-08 23:08:16', 0, 0),
(8, '2018-02-08 23:12:10', 0, 0),
(9, '2018-02-08 23:18:10', 0, 0),
(10, '2018-02-08 23:21:27', 0, 0),
(11, '2018-02-09 12:11:09', 0, 0),
(12, '2018-02-09 12:13:29', 0, 0),
(13, '2018-02-09 12:15:57', 0, 0),
(14, '2018-02-09 12:18:30', 0, 0),
(15, '2018-02-09 12:21:17', 0, 0),
(16, '2018-02-09 12:24:11', 0, 0),
(17, '2018-02-09 12:27:04', 0, 0),
(18, '2018-02-09 12:30:04', 0, 0),
(19, '2018-02-09 12:33:39', 0, 0),
(20, '2018-02-09 12:37:24', 0, 0),
(21, '2018-02-10 18:59:55', 0, 0),
(22, '2018-02-10 19:09:10', 0, 0),
(23, '2018-02-10 19:13:20', 0, 0),
(24, '2018-02-10 19:16:35', 0, 0),
(25, '2018-02-10 19:18:35', 0, 0),
(26, '2018-02-10 19:22:31', 0, 0),
(27, '2018-02-10 19:24:52', 0, 0),
(28, '2018-02-10 19:29:41', 0, 0),
(29, '2018-02-10 19:46:58', 0, 0),
(30, '2018-02-10 19:48:22', 0, 0),
(31, '2018-02-10 19:51:21', 0, 0),
(32, '2018-02-10 19:55:35', 0, 0),
(33, '2018-02-10 19:57:02', 0, 0),
(34, '2018-02-10 20:03:05', 0, 0),
(35, '2018-02-10 20:05:43', 0, 0),
(36, '2018-02-10 20:10:27', 0, 0),
(37, '2018-02-10 20:12:21', 0, 0),
(38, '2018-02-10 20:22:32', 0, 0),
(39, '2018-02-10 20:29:36', 0, 0),
(40, '2018-02-10 20:33:33', 0, 0),
(41, '2018-02-12 08:38:56', 0, 0),
(42, '2018-02-12 08:41:05', 0, 0),
(43, '2018-02-12 08:43:03', 0, 0),
(44, '2018-02-12 08:45:00', 0, 0),
(45, '2018-02-12 08:46:49', 0, 0),
(46, '2018-02-12 08:50:28', 0, 0),
(47, '2018-02-12 08:53:15', 0, 0),
(48, '2018-02-12 08:54:11', 0, 0),
(49, '2018-02-12 08:56:03', 0, 0),
(50, '2018-02-12 08:57:53', 0, 0),
(51, '2018-02-12 09:02:08', 0, 0),
(52, '2018-02-12 09:11:01', 0, 0),
(53, '2018-02-12 09:14:21', 0, 0),
(54, '2018-02-12 09:15:46', 0, 0),
(55, '2018-02-12 09:20:59', 0, 0),
(56, '2018-02-12 09:30:28', 0, 0),
(57, '2018-02-12 09:32:06', 0, 0),
(58, '2018-02-12 09:33:41', 0, 0),
(59, '2018-02-12 09:35:11', 0, 0),
(60, '2018-02-12 09:39:06', 0, 0),
(61, '2018-02-12 09:43:10', 0, 0),
(62, '2018-02-12 09:54:49', 0, 0),
(63, '2018-02-12 09:58:52', 0, 0),
(64, '2018-02-12 10:03:39', 0, 0),
(65, '2018-02-12 10:10:49', 0, 0),
(66, '2018-02-12 10:12:45', 0, 0),
(67, '2018-02-12 10:13:51', 0, 0),
(68, '2018-02-12 10:17:45', 0, 0),
(69, '2018-02-12 10:18:44', 0, 0),
(70, '2018-02-12 10:19:47', 0, 0),
(71, '2018-02-12 10:22:01', 0, 0),
(72, '2018-02-12 10:23:17', 0, 0),
(73, '2018-02-12 10:25:49', 0, 0),
(74, '2018-02-12 10:27:52', 0, 0),
(75, '2018-02-12 10:29:01', 0, 0),
(76, '2018-02-12 10:32:48', 0, 0),
(77, '2018-02-12 10:34:15', 0, 0),
(78, '2018-02-12 10:37:26', 0, 0),
(79, '2018-02-12 10:40:19', 0, 0),
(80, '2018-02-12 10:41:29', 0, 0),
(81, '2018-02-12 10:43:02', 0, 0),
(82, '2018-02-12 10:44:04', 0, 0);

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
  MODIFY `inc_log_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `returnlog`
--
ALTER TABLE `returnlog`
  MODIFY `ret_log_id` int(15) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
