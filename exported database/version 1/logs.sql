-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2018 at 12:46 PM
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
-- Truncate table before insert `increaselog`
--

TRUNCATE TABLE `increaselog`;
--
-- Dumping data for table `increaselog`
--

INSERT INTO `increaselog` (`inc_log_id`, `date`, `item_name`, `item_description`, `item_type`, `quantity`, `unit`, `delivery_date`, `date_received`, `expiration_date`, `supplier_id`, `item_id`, `unit_cost`) VALUES
(1, '2018-01-29 20:41:04', 'Test', 'Test', 'Capital Outlay', 5, 'piece', '2018-01-29', '2018-01-29', '2018-01-29', 1, 1, 50),
(2, '2018-01-29 20:41:37', 'Test', 'Test', 'Capital Outlay', 5, 'piece', '2018-01-29', '2018-01-29', '2018-01-29', 1, 1, 50),
(3, '2018-01-29 20:43:06', 'Test2', 'Test2', 'MOOE', 5, 'piece', '2018-01-29', '2018-01-29', '2018-01-29', 1, 2, 50),
(4, '2018-01-29 20:43:50', 'Test2', 'Test2', 'MOOE', 5, 'piece', '2018-01-29', '2018-01-29', '2018-01-29', 1, 2, 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `increaselog`
--
ALTER TABLE `increaselog`
  ADD PRIMARY KEY (`inc_log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `increaselog`
--
ALTER TABLE `increaselog`
  MODIFY `inc_log_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
