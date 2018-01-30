-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2018 at 02:53 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_code`
--

CREATE TABLE `account_code` (
  `ac_id` int(11) NOT NULL,
  `account_code` varchar(45) NOT NULL,
  `description` varchar(70) NOT NULL
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
(10, '1-07-05-030', 'Information and Communication Technology Equipment'),
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
(35, '5-02-03-080', 'Medical, Dental and Laboratory Supplies Expenses'),
(36, '5-02-03-090', 'Fuel, Oil and Lubricants Expenses'),
(37, '5-02-03-100', '	Agricultural and Marine Supplies Expenses'),
(38, '5-02-03-110', '	Textbooks and Instructional Materials Expens'),
(39, '5-02-03-120', 'Military, Police and Traffic Supplies Expenses'),
(40, '5-02-03-990', '	Other Supplies and Materials Expenses'),
(41, '5-02-04-010', '	Water Expenses'),
(42, '5-02-04-020', 'Electricity Expenses'),
(43, '5-02-05-010', 'Postage and Courier Services'),
(44, '5-02-05-020', 'Telephone Expenses'),
(45, '5-02-05-030', 'Internet Subscription Expenses'),
(46, '5-02-05-040', 'Cable, Satellite, Telegraph and Radio Expenses'),
(47, '5-02-99-060', 'Membership Dues and Contributions to Organization'),
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
(63, '5-02-13-030', 'Repairs and Maintenance - Infrastructure Assets'),
(64, '5-02-13-040', 'Repairs and Maintenance - Buildings and Other Structures'),
(65, '5-02-13-090', 'Repairs and Maintenance - Leased Assets Improvements'),
(66, '5-02-13-050', 'Repairs and Maintenance - Machinery and Equipment'),
(67, '5-02-13-070', 'Repairs and Maintenance - Furniture and Fixtures'),
(68, '5-02-13-060', 'Repairs and Maintenance - Transportation Equipment'),
(69, '5-02-13-990', 'Repairs and Maintenance - Other Property, Plant and Equipment'),
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
  `dept_id` int(11) NOT NULL,
  `res_center_code` varchar(11) NOT NULL,
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
  `dist_id` int(11) NOT NULL,
  `quantity` varchar(45) NOT NULL,
  `distrib_date` date DEFAULT NULL,
  `dept_id` int(11) NOT NULL,
  `receivedby` varchar(45) DEFAULT NULL,
  `user_distribute` varchar(45) NOT NULL,
  `item_usage` varchar(60) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(45) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `item_description` text NOT NULL,
  `unit` varchar(11) NOT NULL,
  `item_type` enum('CO','MOOE') DEFAULT 'CO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `item`
--
DELIMITER $$
CREATE TRIGGER `item_detail` AFTER INSERT ON `item` FOR EACH ROW BEGIN
		
        SET @counter = 0;
  		if (new.item_type = 'CO') then
         while @counter < new.quantity do
         	INSERT INTO item_detail (item_id) VALUES (NEW.item_id);
		set @counter=@counter+1;
    	end while ;
        ELSE
        INSERT INTO item_detail (item_id) VALUES (NEW.item_id);
        end if;
  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `item_detail`
--

CREATE TABLE `item_detail` (
  `item_det_id` int(11) NOT NULL,
  `serial` varchar(30) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `supplier` varchar(60) DEFAULT NULL,
  `official_receipt_no` varchar(60) DEFAULT NULL,
  `del_date` datetime DEFAULT NULL,
  `date_rec` datetime DEFAULT NULL,
  `receivedby` varchar(60) DEFAULT NULL,
  `unit_cost` double DEFAULT NULL,
  `item_id` int(11) NOT NULL DEFAULT '1',
  `dist_id` int(11) DEFAULT NULL,
  `item_status` enum('returned','in_stock','expired') NOT NULL DEFAULT 'in_stock'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `item_detail`
--
DELIMITER $$
CREATE TRIGGER `decrease_log` AFTER UPDATE ON `item_detail` FOR EACH ROW BEGIN
	if new.dist_id is not null THEN
   	INSERT INTO logs.decrease_log (item_det_id) VALUES (NEW.item_det_id);
	end if;
   
  END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `increase_log` AFTER INSERT ON `item_detail` FOR EACH ROW BEGIN	
   	INSERT INTO logs.increase_log (item_det_id) VALUES (NEW.item_det_id);
  END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `item_detail_delete` BEFORE DELETE ON `item_detail` FOR EACH ROW BEGIN
	UPDATE logs.increase_log set serial = old.serial, exp_date = old.exp_date, official_receipt_no = old.official_receipt_no, del_date = old.del_date, date_rec = old.date_rec, receivedby = old.receivedby, unit_cost = old.unit_cost, item_status = old.item_status, item_id = old.item_id, dist_id = old.dist_id where item_det_id = old.item_det_id;	
  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contact_no` varchar(12) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `position` varchar(45) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.png',
  `dept_id` int(11) DEFAULT NULL,
  `status` enum('pending','accepted','declined','deactivated') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `contact_no`, `username`, `password`, `position`, `image`, `dept_id`, `status`) VALUES
(2217, 'Heinrich', 'Bangui', 'heinrichbangui@gmail.com', '09082853679', 'admin', '$2y$12$oJfVN29fCo9ElEz2W1V5FOe2SqfcPRNmi/OaqVUN7.o3ueDeFcS3O', 'admin', 'logo.png', NULL, 'accepted'),
(2218, 'Heinrich', 'Bangui', 'heinrichbangui@gmail.com', '09082853679', 'heinrich', '$2y$12$uvIqn78uh/0/H6KzwW8s9Ot.Z6E8JBPYONBinkz2A9g0knHyVXMLe', 'receiver', 'logo.png', 18, 'accepted'),
(2220, 'Lyra', 'Ronquillo', 'lj@gmail.com', '09885468384', 'lyra', '$2y$12$JCT9E1LHGO2Q4JmTNqNnSe3bpFhK/HSCKY1n64PdWOUJxTZDVJdie', 'custodian', 'logo.png', NULL, 'accepted'),
(2221, 'Joy', 'Cabildo', 'jc@gmail.com', '09073456679', 'joyc', '$2y$12$G19I/IbI1ixK./jm7RGa2ORINHkt9sj1u0YCvrJRnR7r8lXUWYPoG', 'department head', 'aww134_.jpg', 18, 'accepted'),
(2222, 'rock', 'rock', 'rock@gmail.com', '09876556789', 'rock', '$2y$12$hVtiHK7k1V4lM5qi7aXlb.FIxfJt/7liTo70/j6gTKu8oY1FuUsxu', 'receiver', '', 26, 'accepted'),
(2223, 'Heinrich', 'Bangui', 'heinrichbangui@gmail.com', '09082853679', 'rayls', '$2y$12$iwTOcjI8QOurSX1Rqknw0.HdkMSQp8pLpeHUI27.NdsA5xfQUvZqK', 'custodian', 'aww134_.jpg', NULL, 'accepted'),
(2224, 'mark', 'test', 'sample@yahoo.com', '09215478763', 'mark', '$2y$12$UCaZiEqESztI6uVn5DzYxOrYbNFNusXOtVM89Pn1b6Qt4PLzGWwem', 'custodian', 'default.png', NULL, 'accepted'),
(2225, 'Christine', 'Cabildo', 'joy@yahoo.com', '09053983127', 'recsample', '$2y$12$bYn.ctUKZvHSTuCoSPAyzuetp9pMTGH/8CLRa436Zg3Y5c3bz.Bje', 'receiver', 'default.png', 11, 'accepted'),
(2226, 'sampl', 'sample', 'marck.carrera@yahoo.com.ph', '09053983127', 'joycabildo', '$2y$12$S3QJGkBDOxiGmppGMP1iOO.L0c9bNt7uhStHuH8YgO3NjE78X847.', 'receiver', 'default.png', 22, 'accepted'),
(2227, 'sample', 'sample', 'sample@yahoo.com', '09547863214', 'depthead', '$2y$12$cPxXj2j/I73kZXbpqHwAC.TsN/TjhQzOH9GO3AX706Tc0gt5HRxlW', 'department head', 'default.png', 20, 'accepted'),
(2228, 'sample', ' sampe', 'sample@yahoo.com', '09053983127', 'custodian', '$2y$12$BLKsjlpRb4q/l3i6R3buWOv3lGxfHocWI3c3d9Yb49kcrkKstU/9C', 'department head', 'default.png', 25, 'accepted'),
(2229, 'sam', 'sam', 'sample@yahoo.com', '09053983127', 'depthead1', '$2y$12$lXidbuwnz8lpAMezmqBPnetQ5KSSEPhiTKtiBffqgGbkibXVUvvKO', 'department head', 'default.png', 11, 'accepted'),
(2230, 'sample', 'sam', 'sample@yahoo.com', '09053983127', 'receiver1', '$2y$12$QC8hLOxP/a9vehWxNpn8wO6S8t4B0dR4dyHgHz/5WoOl68vN5bZES', 'receiver', 'default.png', 11, 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_code`
--
ALTER TABLE `account_code`
  ADD PRIMARY KEY (`ac_id`),
  ADD UNIQUE KEY `ac_id` (`ac_id`),
  ADD KEY `acid` (`account_code`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `distribution`
--
ALTER TABLE `distribution`
  ADD PRIMARY KEY (`dist_id`),
  ADD KEY `depid_idx` (`dept_id`),
  ADD KEY `account_idx_idx` (`account_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `item_detail`
--
ALTER TABLE `item_detail`
  ADD PRIMARY KEY (`item_det_id`),
  ADD UNIQUE KEY `serial` (`serial`),
  ADD KEY `itemid_idx` (`item_id`),
  ADD KEY `distid_idx` (`dist_id`),
  ADD KEY `dist_idx` (`dist_id`),
  ADD KEY `dist` (`dist_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_code`
--
ALTER TABLE `account_code`
  MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `distribution`
--
ALTER TABLE `distribution`
  MODIFY `dist_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_detail`
--
ALTER TABLE `item_detail`
  MODIFY `item_det_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2231;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `distribution`
--
ALTER TABLE `distribution`
  ADD CONSTRAINT `account_idx` FOREIGN KEY (`account_id`) REFERENCES `account_code` (`ac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `depid` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
