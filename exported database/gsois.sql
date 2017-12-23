-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2017 at 07:45 AM
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
  `itemdetailcol` varchar(45) NOT NULL,
  `item_id` int(15) DEFAULT NULL,
  `acc_code_id` int(3) DEFAULT NULL,
  `dist_id` int(15) DEFAULT NULL,
  `supplier_id` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD UNIQUE KEY `serial_UNIQUE` (`serial`),
  ADD KEY `items_idx` (`item_id`),
  ADD KEY `accountcode_idx` (`acc_code_id`),
  ADD KEY `distribution_idx` (`dist_id`),
  ADD KEY `supplier_idx` (`supplier_id`);

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
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `distribution`
--
ALTER TABLE `distribution`
  ADD CONSTRAINT `dept` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `item_det_id` FOREIGN KEY (`item_det_id`) REFERENCES `itemdetail` (`item_det_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `itemdetail`
--
ALTER TABLE `itemdetail`
  ADD CONSTRAINT `accountcode` FOREIGN KEY (`acc_code_id`) REFERENCES `account_code` (`ac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `distribution` FOREIGN KEY (`dist_id`) REFERENCES `distribution` (`dist_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `items` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `supplier` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `department` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
