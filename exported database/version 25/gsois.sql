-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2018 at 06:47 PM
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

CREATE TABLE `account_code` (
  `ac_id` int(15) NOT NULL,
  `account_code` varchar(15) NOT NULL,
  `description` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_code`
--

INSERT INTO `account_code` (`ac_id`, `account_code`, `description`) VALUES
(1, '1-07-01-010', '	Land'),
(2, '1-07-02-010', 'Land Improvements, Aquaculture Structures'),
(3, '1-07-03-050', '	Power Supply Systems'),
(4, '1-07-04-010', '	Buildings'),
(5, '1-07-04-020', '	School Buildings'),
(6, '1-07-04-030', '	Hospitals and Health Centers'),
(7, '1-07-04-990', '	Other Structures'),
(8, '1-07-05-020', '	Office Equipment'),
(9, '1-07-07-010', '	Furniture and Fixtures'),
(10, '1-07-05-030', 'Information and Communication Technology Equi'),
(12, '1-07-07-020', '	Books'),
(13, '1-07-05-010', '	Machinery'),
(14, '1-07-05-040', '	Agriculture and Forestry Equipment'),
(15, '1-07-05-070', '	Communication Equipment'),
(16, '1-07-05-080', '	Construction and Heavy Equipment'),
(17, '1-07-05-090', '	Disaster Response and Rescue Equipment'),
(18, '1-07-05-110', '	Medical Equipment'),
(19, '1-07-05-100', 'Military, Police and Security Equipment'),
(20, '1-07-05-130', '	Sports Equipment'),
(21, '1-07-05-140', '	Technical and Scientific Equipment'),
(22, '1-07-05-990', '	Other Machinery and Equipment'),
(23, '1-07-06-010', '	Motor Vehicles'),
(24, '1-07-03-010', '	Road Networks'),
(25, '1-07-03-090', 'Parks, Plazas and Monuments'),
(26, '1-07-03-040', '	Water Supply Systems'),
(27, '1-07-03-020', '	Flood Control Systems'),
(28, '1-07-03-990', '	Other Infrastructure Assets'),
(29, '5-02-02-010', '	Training Expenses'),
(30, '5-02-03-010', '	Office Supplies Expenses'),
(31, '5-02-03-020', '	Accountable Forms Expenses'),
(32, '5-02-03-040', '	Animal/Zoological Expenses'),
(33, '5-02-03-050', '	Food Supplies Expenses'),
(34, '5-02-03-070', '	Drugs and Medicines Expenses'),
(35, '5-02-03-080', 'Medical, Dental and Laboratory Supplies Expen'),
(36, '5-02-03-090', 'Fuel, Oil and Lubricants Expenses'),
(37, '5-02-03-100', '	Agricultural and Marine Supplies Expenses'),
(38, '5-02-03-110', '	Textbooks and Instructional Materials Expens'),
(39, '5-02-03-120', 'Military, Police and Traffic Supplies Expense'),
(40, '5-02-03-990', '	Other Supplies and Materials Expenses'),
(41, '5-02-04-010', '	Water Expenses'),
(42, '5-02-04-020', 'Electricity Expenses'),
(43, '5-02-05-010', 'Postage and Courier Services'),
(44, '5-02-05-020', 'Telephone Expenses'),
(45, '5-02-05-030', 'Internet Subscription Expenses'),
(46, '5-02-05-040', 'Cable, Satellite, Telegraph and Radio Expense'),
(47, '5-02-99-060', 'Membership Dues and Contributions to Organiza'),
(48, '5-02-06-010', '	Awards/Rewards Expenses'),
(49, '5-02-99-010', '	Advertising Expenses'),
(50, '5-02-99-020', '	Printing and Publication Expenses'),
(51, '5-02-99-050', '	Rent Expenses'),
(52, '5-02-99-030', '	Representation Expenses'),
(53, '5-02-99-040', '	Transportation and Delivery Expenses'),
(54, '5-02-99-070', '	Subscription Expenses'),
(55, '5-02-07-010', '	Survey Expenses'),
(56, '5-02-11-030', '	Consultancy Services'),
(57, '5-02-12-010', '	Environment/Sanitary Services'),
(58, '5-02-12-990', '	Other General Services'),
(59, '5-02-12-020', '	Janitorial Services'),
(60, '5-02-12-030', '	Security Services'),
(61, '5-02-11-990', '	Other Professional Services'),
(62, '5-02-13-020', '	Repairs and Maintenance - Land Improvements'),
(63, '5-02-13-030', 'Repairs and Maintenance - Infrastructure Asse'),
(64, '5-02-13-040', 'Repairs and Maintenance - Buildings and Other'),
(65, '5-02-13-090', 'Repairs and Maintenance - Leased Assets Impro'),
(66, '5-02-13-050', 'Repairs and Maintenance - Machinery and Equip'),
(67, '5-02-13-070', 'Repairs and Maintenance - Furniture and Fixtu'),
(68, '5-02-13-060', 'Repairs and Maintenance - Transportation Equi'),
(69, '5-02-13-990', 'Repairs and Maintenance - Other Property, Pla'),
(70, '5-02-14-020', '	Subsidy to NGAs'),
(71, '5-02-14-030', '	Subsidy to Other Local Government Units'),
(72, '5-02-99-080', '	Donations'),
(73, '5-02-10-030', '	Extraordinary and Miscellaneous Expenses'),
(74, '5-02-16-010', '	Taxes'),
(75, '5-02-16-020', '	Fidelity Bond Premiums'),
(76, '5-02-16-030', '	Insurance Expenses'),
(77, '5-02-99-990', '	Other Maintenance and Operating Expenses'),
(78, '5-03-01-040', '	Bank Charges'),
(79, '1-07-04-040', '	Market'),
(80, '1-07-04-050', '	Slaughterhouses'),
(81, '5-02-03-060', '	Welfare Goods Expenses'),
(85, '5-02-03-130', '	Chemical and Filtering Supplies Expenses');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(15) NOT NULL,
  `res_center_code` varchar(15) NOT NULL,
  `department` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `res_center_code`, `department`) VALUES
(11, '8731', 'CITY ENVIRONMENT & PARKS MANAGEMENT OFFICE'),
(12, '1191', 'BUREAU OF FIRE PREVENTION AND SAFETY'),
(13, '1061', 'GENERAL SERVICES OFFICE'),
(14, '4411', 'HEALTH SERVICES OFFICE'),
(15, '1011B', 'OFFICE OF THE CITY HUMAN RESOURCE CENTER'),
(16, '1131', 'CITY LEGAL OFFICE'),
(17, '1122', 'CITY LIBRARY'),
(18, '1011', 'CITY MAYOR\'S OFFICE'),
(19, '1158', 'MUNICIPAL TRIAL COURT IN CITIES'),
(20, '1041', 'OFFICE OF THE CITY PLANNING AND DEVELOPMENT'),
(21, '1181', 'CITY POLICE OFFICE'),
(22, '9999F', 'PAROLE AND PROBATION OFFICE'),
(23, '1141', 'CITY PROSECUTOR\'S OFFICE'),
(24, '9999G', 'PUBLIC ATTORNEY\'S OFFICE'),
(25, '1151', 'REGIONAL TRIAL COURT'),
(26, '1161', 'REGISTRY OF DEEDS'),
(27, '1021', 'SANGGUNIANG PANGLUNGSOD'),
(28, '7611', 'OFFICE OF THE CITY SOCIAL WELFARE DEVELOPMENT'),
(29, '1091', 'CITY TREASURER\'S OFFICE'),
(30, '8721', 'CITY VETERINARY OFFICE'),
(110, '8751', 'CITY ENGINEER\'S OFFICE'),
(111, '1081', 'CITY ACCOUNTANT\'S OFFICE'),
(112, '1031', 'CITY ADMINISTRATOR\'S OFFICE'),
(113, '1101', 'CITY ASSESSOR\'S OFFICE'),
(114, '1111', 'OFFICE OF THE CITY AUDITOR'),
(115, '1071', 'CITY BUDGET OFFICE'),
(116, '1101A', 'CITY BUILDING AND ARCHITECTURE OFFICE'),
(117, '1171', 'CITY JAIL MANAGEMENT & PENOLOGY'),
(118, '1051', 'OFFICE OF THE LOCAL CIVIL REGISTRAR'),
(119, '3311', 'DEPARTMENT OF EDUCATION');

-- --------------------------------------------------------

--
-- Table structure for table `distribution`
--

CREATE TABLE `distribution` (
  `dist_id` int(15) NOT NULL,
  `date_received` date NOT NULL,
  `quantity_distributed` int(15) NOT NULL,
  `receiver` varchar(30) NOT NULL,
  `PR_no` varchar(15) NOT NULL,
  `OBR_no` varchar(15) NOT NULL,
  `item_id` int(15) NOT NULL,
  `ac_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `dept_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distribution`
--

INSERT INTO `distribution` (`dist_id`, `date_received`, `quantity_distributed`, `receiver`, `PR_no`, `OBR_no`, `item_id`, `ac_id`, `user_id`, `dept_id`) VALUES
(1, '0000-00-00', 3, '43', '121', '23', 2, 1, 2, 11),
(2, '0000-00-00', 1, '45', '34', '32', 2, 1, 2, 16),
(3, '0000-00-00', 1, 'fer', '23', '34', 2, 1, 2, 17);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(15) NOT NULL,
  `quantity` int(15) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_description` varchar(60) NOT NULL,
  `item_type` enum('CO','MOOE') NOT NULL,
  `serial` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `quantity`, `unit`, `item_name`, `item_description`, `item_type`, `serial`) VALUES
(1, 50, 'box', 'Ballpen', 'Pilot Red', 'MOOE', '0'),
(2, 0, 'piece', 'laptop', 'Dell, Black ', 'CO', '0'),
(3, 30, 'dozen', 'Bag', 'Blue, Bagpack', 'CO', '0');

-- --------------------------------------------------------

--
-- Table structure for table `itemdetail`
--

CREATE TABLE `itemdetail` (
  `item_det_id` int(15) NOT NULL,
  `date_delivered` date NOT NULL,
  `date_received` date NOT NULL,
  `quantity` int(15) NOT NULL,
  `unit_cost` int(15) NOT NULL,
  `expiration_date` date NOT NULL,
  `OR_no` varchar(15) NOT NULL,
  `PO_number` varchar(15) NOT NULL,
  `item_id` int(15) NOT NULL,
  `supplier_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemdetail`
--

INSERT INTO `itemdetail` (`item_det_id`, `date_delivered`, `date_received`, `quantity`, `unit_cost`, `expiration_date`, `OR_no`, `PO_number`, `item_id`, `supplier_id`) VALUES
(1, '2018-03-04', '2018-03-04', 50, 250, '2018-03-31', '6589521499', '0', 1, 6),
(2, '2018-03-06', '2018-03-06', 0, 456453, '2018-03-06', '5456jshfjkd', '0', 2, 1),
(3, '2018-03-06', '2018-03-06', 30, 350, '2020-03-06', '546138654', '0', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mooedistribution`
--

CREATE TABLE `mooedistribution` (
  `mooed_id` int(15) NOT NULL,
  `quantity_distributed` int(15) NOT NULL,
  `employee` varchar(30) NOT NULL,
  `dist_id` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `serial`
--

CREATE TABLE `serial` (
  `serial_id` int(15) NOT NULL,
  `serial` varchar(30) DEFAULT NULL,
  `employee` varchar(30) DEFAULT NULL,
  `item_status` enum('In-stock','Distributed','Returned') NOT NULL DEFAULT 'In-stock',
  `record_status` enum('0','1') NOT NULL DEFAULT '1',
  `dist_id` int(15) DEFAULT NULL,
  `item_det_id` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serial`
--

INSERT INTO `serial` (`serial_id`, `serial`, `employee`, `item_status`, `record_status`, `dist_id`, `item_det_id`) VALUES
(1, '1233232325', NULL, 'Distributed', '1', 1, 2),
(2, '23232343', NULL, 'Distributed', '1', 1, 2),
(3, '234344542343432', NULL, 'Distributed', '1', 1, 2),
(4, '34343', NULL, 'Distributed', '1', 2, 2),
(5, '3334355', NULL, 'Distributed', '1', 3, 2),
(6, '435345', NULL, 'In-stock', '1', NULL, 3),
(7, '3343', NULL, 'In-stock', '1', NULL, 3),
(8, '43242', NULL, 'In-stock', '1', NULL, 3),
(9, '453453', NULL, 'In-stock', '1', NULL, 3),
(10, '435534', NULL, 'In-stock', '1', NULL, 3),
(11, NULL, NULL, 'In-stock', '1', NULL, 3),
(12, NULL, NULL, 'In-stock', '1', NULL, 3),
(13, NULL, NULL, 'In-stock', '1', NULL, 3),
(14, NULL, NULL, 'In-stock', '1', NULL, 3),
(15, NULL, NULL, 'In-stock', '1', NULL, 3),
(16, NULL, NULL, 'In-stock', '1', NULL, 3),
(17, NULL, NULL, 'In-stock', '1', NULL, 3),
(18, NULL, NULL, 'In-stock', '1', NULL, 3),
(19, NULL, NULL, 'In-stock', '1', NULL, 3),
(20, NULL, NULL, 'In-stock', '1', NULL, 3),
(21, NULL, NULL, 'In-stock', '1', NULL, 3),
(22, NULL, NULL, 'In-stock', '1', NULL, 3),
(23, NULL, NULL, 'In-stock', '1', NULL, 3),
(24, NULL, NULL, 'In-stock', '1', NULL, 3),
(25, NULL, NULL, 'In-stock', '1', NULL, 3),
(26, NULL, NULL, 'In-stock', '1', NULL, 3),
(27, NULL, NULL, 'In-stock', '1', NULL, 3),
(28, NULL, NULL, 'In-stock', '1', NULL, 3),
(29, NULL, NULL, 'In-stock', '1', NULL, 3),
(30, NULL, NULL, 'In-stock', '1', NULL, 3),
(31, NULL, NULL, 'In-stock', '1', NULL, 3),
(32, NULL, NULL, 'In-stock', '1', NULL, 3),
(33, NULL, NULL, 'In-stock', '1', NULL, 3),
(34, NULL, NULL, 'In-stock', '1', NULL, 3),
(35, NULL, NULL, 'In-stock', '1', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(15) NOT NULL,
  `supplier_name` varchar(30) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `location` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `contact`, `location`) VALUES
(1, 'Sanvicare Medical Supplies', '09993214569', '2/F Porta Vaga Mall, Session Road, Baguio City'),
(2, 'Tiongsan Harrison', '09453214747', 'Harrison Road, Baguio City'),
(3, 'Laser Marketing', '09948752136', '26 A., Mabini Street, Baguio City'),
(4, 'The DiY Shop', '09451235856', 'Abanao Square, Abanao Street corner Zandueta Street, Baguio '),
(5, 'Sunshine Supermart', '09924578983', 'Abanao Street, Baguio City'),
(6, 'National Book Store', '09165523245', 'Abanao Square, Abanao Street corner Zandueta Street, Baguio '),
(7, 'CD-R King', '(074)424-4688', 'Unit 391 3rd Floor, SM City Baguio, Luneta Hill Dr, Baguio, '),
(8, 'CID Express', '(074)446-6570', 'Lopez Building, Session Road, Baguio City, Benguet 2600'),
(9, 'Ace Hardware', '09854712354', 'SM Baguio City'),
(10, 'Sports Central', '09875412365', 'SM Baguio City'),
(11, 'Mercury Drug', '09854712365', 'Bonifacio, Baguio');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(15) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `position` enum('Admin','Custodian','Supply Officer') NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `dept_id` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `contact_no`, `username`, `password`, `position`, `status`, `dept_id`) VALUES
(1, 'Rusell', 'Bayote', 'rusellbayote@gmail.com', '09453265727', 'tuking', 'rb14789653', 'Admin', 'Active', 11),
(2, 'Lovelace Zennia Luisa', 'Oliva', 'lovelace@gmail.com', '09784512563', 'lovelace', '123', 'Custodian', 'Active', 11);

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
  ADD PRIMARY KEY (`dist_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `item_id_UNIQUE` (`item_id`),
  ADD UNIQUE KEY `unique_itemdescription` (`item_name`,`item_description`);

--
-- Indexes for table `itemdetail`
--
ALTER TABLE `itemdetail`
  ADD PRIMARY KEY (`item_det_id`),
  ADD UNIQUE KEY `item_det_id_UNIQUE` (`item_det_id`);

--
-- Indexes for table `mooedistribution`
--
ALTER TABLE `mooedistribution`
  ADD PRIMARY KEY (`mooed_id`);

--
-- Indexes for table `serial`
--
ALTER TABLE `serial`
  ADD PRIMARY KEY (`serial_id`);

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
  ADD KEY `department_idx` (`dept_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_code`
--
ALTER TABLE `account_code`
  MODIFY `ac_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `distribution`
--
ALTER TABLE `distribution`
  MODIFY `dist_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `itemdetail`
--
ALTER TABLE `itemdetail`
  MODIFY `item_det_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mooedistribution`
--
ALTER TABLE `mooedistribution`
  MODIFY `mooed_id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `serial`
--
ALTER TABLE `serial`
  MODIFY `serial_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
