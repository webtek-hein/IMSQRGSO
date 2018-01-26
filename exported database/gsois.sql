-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2018 at 02:02 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gsois`
--
CREATE DATABASE IF NOT EXISTS `gsois` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gsois`;

-- --------------------------------------------------------

--
-- Table structure for table `account_code`
--

DROP TABLE IF EXISTS `account_code`;
CREATE TABLE `account_code` (
  `ac_id` int(3) NOT NULL,
  `account_code` varchar(15) NOT NULL,
  `description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `account_code`
--

TRUNCATE TABLE `account_code`;
-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `dept_id` int(4) NOT NULL,
  `res_center_code` varchar(12) NOT NULL,
  `department` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `department`
--

TRUNCATE TABLE `department`;
-- --------------------------------------------------------

--
-- Table structure for table `distribution`
--

DROP TABLE IF EXISTS `distribution`;
CREATE TABLE `distribution` (
  `dist_id` int(15) NOT NULL,
  `date_acquired` date DEFAULT NULL,
  `quantity_distributed` int(15) DEFAULT NULL,
  `received_from` varchar(45) DEFAULT NULL,
  `receivedby` varchar(45) DEFAULT NULL,
  `dept_id` int(5) DEFAULT NULL,
  `item_det_id` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `distribution`
--

TRUNCATE TABLE `distribution`;
-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `item_id` int(15) NOT NULL,
  `quantity` int(9) DEFAULT NULL,
  `item_name` varchar(60) NOT NULL,
  `item_description` varchar(250) DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `item_type` enum('Capital Outlay','MOOE') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `item`
--

TRUNCATE TABLE `item`;
--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `quantity`, `item_name`, `item_description`, `unit`, `item_type`) VALUES
(1, 6, 'Laptop', 'new', 'piece', '');

-- --------------------------------------------------------

--
-- Table structure for table `itemdetail`
--

DROP TABLE IF EXISTS `itemdetail`;
CREATE TABLE `itemdetail` (
  `item_det_id` int(15) NOT NULL,
  `delivery_date` date DEFAULT NULL,
  `date_received` date DEFAULT NULL,
  `unit_cost` int(20) DEFAULT NULL,
  `PO_no` int(15) DEFAULT NULL,
  `PR_no` int(15) DEFAULT NULL,
  `OBR_no` int(15) DEFAULT NULL,
  `serial` varchar(60) DEFAULT NULL,
  `item_status` varchar(25) DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `item_id` int(15) DEFAULT NULL,
  `acc_code_id` int(3) DEFAULT NULL,
  `dist_id` int(15) DEFAULT NULL,
  `supplier_id` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `itemdetail`
--

TRUNCATE TABLE `itemdetail`;
--
-- Dumping data for table `itemdetail`
--

INSERT INTO `itemdetail` (`item_det_id`, `delivery_date`, `date_received`, `unit_cost`, `PO_no`, `PR_no`, `OBR_no`, `serial`, `item_status`, `expiration_date`, `item_id`, `acc_code_id`, `dist_id`, `supplier_id`) VALUES
(1, '2018-01-02', '2018-01-02', 1, 1, 1, 1, NULL, NULL, '2018-01-03', 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `supplier_id` int(15) NOT NULL,
  `supplier_name` varchar(60) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `location` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `supplier`
--

TRUNCATE TABLE `supplier`;
--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `contact`, `location`) VALUES
(1, 'test', '06065897', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(60) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `dept_id` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `user`
--

TRUNCATE TABLE `user`;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_code`
--
ALTER TABLE `account_code`
  ADD PRIMARY KEY (`ac_id`),
  ADD UNIQUE KEY `ac_id_UNIQUE` (`ac_id`),
  ADD UNIQUE KEY `account_code_UNIQUE` (`account_code`),
  ADD UNIQUE KEY `description_UNIQUE` (`description`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`),
  ADD UNIQUE KEY `dept_id_UNIQUE` (`dept_id`),
  ADD UNIQUE KEY `res_center_code_UNIQUE` (`res_center_code`),
  ADD UNIQUE KEY `department_UNIQUE` (`department`);

--
-- Indexes for table `distribution`
--
ALTER TABLE `distribution`
  ADD PRIMARY KEY (`dist_id`),
  ADD KEY `department_idx` (`dept_id`),
  ADD KEY `itemdetail_idx` (`item_det_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `item_id_UNIQUE` (`item_id`),
  ADD UNIQUE KEY `item_description_UNIQUE` (`item_description`);

--
-- Indexes for table `itemdetail`
--
ALTER TABLE `itemdetail`
  ADD PRIMARY KEY (`item_det_id`),
  ADD UNIQUE KEY `item_det_id_UNIQUE` (`item_det_id`),
  ADD UNIQUE KEY `serial_UNIQUE` (`serial`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`),
  ADD UNIQUE KEY `supplier_name_UNIQUE` (`supplier_name`),
  ADD UNIQUE KEY `contact_UNIQUE` (`contact`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `contact_no_UNIQUE` (`contact_no`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `department_idx` (`dept_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_code`
--
ALTER TABLE `account_code`
  MODIFY `ac_id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `distribution`
--
ALTER TABLE `distribution`
  MODIFY `dist_id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `itemdetail`
--
ALTER TABLE `itemdetail`
  MODIFY `item_det_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `department` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
