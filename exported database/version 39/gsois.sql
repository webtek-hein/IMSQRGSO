-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2018 at 09:32 AM
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
  `PR_no` varchar(15) NOT NULL,
  `OBR_no` varchar(15) NOT NULL,
  `item_det_id` int(15) NOT NULL,
  `ac_id` int(15) NOT NULL,
  `supply_officer_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `dept_id` int(15) NOT NULL,
  `status` text NOT NULL,
  `cost` double NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enduser`
--

CREATE TABLE `enduser` (
  `enduser_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `serial_id` int(11) NOT NULL,
  `accountability_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(15) NOT NULL,
  `quantity` int(15) NOT NULL,
  `cost` double NOT NULL,
  `unit` varchar(30) NOT NULL,
  `item_name` varchar(500) NOT NULL,
  `item_description` varchar(1000) NOT NULL,
  `item_type` enum('CO','MOOE') NOT NULL,
  `serialStatus` enum('0','1') NOT NULL DEFAULT '0',
  `initialStock` int(15) NOT NULL DEFAULT '0',
  `initialCost` int(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `itemdetail`
--

CREATE TABLE `itemdetail` (
  `item_det_id` int(15) NOT NULL,
  `date_delivered` date NOT NULL,
  `date_received` date NOT NULL,
  `quantity` int(15) NOT NULL,
  `unit_cost` double NOT NULL,
  `expiration_date` date NOT NULL,
  `OR_no` varchar(15) NOT NULL,
  `PO_number` varchar(15) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'active',
  `item_id` int(15) NOT NULL,
  `supplier_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `reconciliation`
--

CREATE TABLE `reconciliation` (
  `recon_id` int(15) NOT NULL,
  `inventory_date` date NOT NULL,
  `physical_count` int(15) NOT NULL,
  `last_quantity` int(15) NOT NULL,
  `ending_cost` double NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `item_id` int(15) NOT NULL,
  `dist_id` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `returnitem`
--

CREATE TABLE `returnitem` (
  `return_id` int(11) NOT NULL,
  `return_quantity` int(11) NOT NULL,
  `date_returned` date NOT NULL,
  `remarks` text NOT NULL,
  `dist_id` int(11) NOT NULL,
  `item_det_id` int(15) NOT NULL,
  `receiver` text NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `serial`
--

CREATE TABLE `serial` (
  `serial_id` int(15) NOT NULL,
  `serial` varchar(30) DEFAULT NULL,
  `employee` varchar(30) DEFAULT NULL,
  `item_status` enum('In-stock','Distributed','Returned','Accepted','UserDistributed','Pending') NOT NULL DEFAULT 'In-stock',
  `record_status` enum('0','1') NOT NULL DEFAULT '1',
  `dist_id` int(15) DEFAULT NULL,
  `item_det_id` int(15) NOT NULL,
  `return_id` int(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(1, 'Sanvicare Medical Supplier', '09993214569', '2/F Porta Vaga Mall, Session Road, Baguio City'),
(2, 'Tiongsan Harrison', '09453214747', 'Harrison Road, Baguio City'),
(3, 'Laser Marketing', '09948752136', '26 A., Mabini Street, Baguio City'),
(4, 'The DiY Shop', '09451235856', 'Abanao Square, Abanao Street corner Zandueta Street, Baguio '),
(5, 'Sunshine Supermart', '09924578983', 'Abanao Street, Baguio City'),
(6, 'National Book Store', '09165523245', 'Abanao Square, Abanao Street corner Zandueta Street, Baguio '),
(7, 'CD-R King', '(074)424-4688', 'Unit 391 3rd Floor, SM City Baguio, Luneta Hill Dr, Baguio, '),
(8, 'CID Express', '(074)446-6570', 'Lopez Building, Session Road, Baguio City, Benguet 2600'),
(9, 'Ace Hardware', '09854712354', 'SM Baguio City'),
(10, 'Sports Central', '09875412365', 'SM Baguio City'),
(11, 'Mercury Drug', '09854712365', 'Bonifacio, Baguio'),
(12, 'Test', '09163320433', 'test'),
(13, 'Walmart', '09994552525', 'Bahaya, Cebu'),
(14, 'Sunrise Corporation', '09994142255', 'Pico, La Trinindad, Benguet');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `trans_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `transaction_number` varchar(250) NOT NULL,
  `increased` int(15) DEFAULT NULL,
  `decreased` int(15) DEFAULT NULL,
  `unit_cost` double NOT NULL,
  `item_id` int(15) NOT NULL,
  `running_quantity` int(15) NOT NULL,
  `transaction` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `username` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `password` varchar(60) NOT NULL,
  `position` enum('Admin','Custodian','Supply Officer') NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `dept_id` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `contact_no`, `username`, `password`, `position`, `status`, `dept_id`) VALUES
(4, 'Mark', 'Gwapo', 'gwapo@gmail.com', '09995223636', 'mark', '$2y$12$2X/5y2.GwXEVM9J9K7pW3OKY6H1QORW3lbKDtCpwfV/5vcGsDZFd2', 'Custodian', 'Active', NULL),
(5, 'Mark', 'Strong', 'napigsa@gmail.com', '09412223636', 'mark1', '$2y$12$7ZNd71UVt12JSEd3t0fmMev7JmglLn1QDdMthsuyMk5pK.2b4UblK', 'Admin', 'Active', NULL),
(6, 'Mark', 'Awesome', 'awesome@gmail.com', '09696969696', 'mark2', '$2y$12$/t6I6PP1VLiRNyprINX7zezYIFe4xlxxwQ3PcZXa19r8iFc1Xytwa', 'Supply Officer', 'Active', 113),
(7, 'Rusell', 'Bayote', 'rusellbayote@gmail.com', '09998765335', 'supply', '$2y$12$EZkJPDTHyoEnmd./5mbIb.VrZP6ln44FFJ6Wb5GbsYGihV0zGYNOC', 'Supply Officer', 'Active', 11),
(8, 'Lovelace ', 'Olivia', 'lovelace@gmail.com', '09086545685', 'custodian', '$2y$12$yD9WUqNBYGnexy2QYVyvAurGk.3ZyjhDraeRhNVgszLzsEAVrbpmS', 'Custodian', 'Active', NULL),
(9, 'Heinrich', 'Bangui', 'heinrichbangui@gmail.com', '09082853679', 'admin', '$2y$12$Dq8UNsKVCf8c.BpLryO57OueNAfWh1trdlv/Lb77ZNyiHnwkTktjG', 'Admin', 'Active', NULL),
(10, 'James', 'Garcia', 'james@gmail.com', '09953731068', 'james', '', 'Supply Officer', 'Active', 11),
(11, 'John', 'Rodriguez', 'john@gmail.com', '09733861612', 'john', '', 'Supply Officer', 'Active', 11),
(12, 'Robert', 'Martinez', 'robert@gmail.com', '09577938962', 'robert', '', 'Supply Officer', 'Active', 11),
(13, 'Michael', 'Hernandez', 'michael@gmail.com', '09377554661', 'michael', '', 'Supply Officer', 'Active', 11),
(14, 'William', 'Lopez', 'william@gmail.com', '09907224862', 'william', '', 'Supply Officer', 'Active', 11),
(15, 'David', 'Gonzalez', 'david@gmail.com', '09955575856', 'david', '', 'Supply Officer', 'Active', 11),
(16, 'Richard', 'Perez', 'richard@gmail.com', '09773856388', 'richard', '', 'Supply Officer', 'Active', 11),
(17, 'Charles', 'Sanchez', 'charles@gmail.com', '09533358570', 'charles', '', 'Supply Officer', 'Active', 11),
(18, 'Joseph', 'Ramirez', 'joseph@gmail.com', '09809807896', 'joseph', '', 'Supply Officer', 'Active', 11),
(19, 'Thomas', 'Torres', 'thomas@gmail.com', '09480232687', 'thomas', '', 'Supply Officer', 'Active', 11),
(20, 'Christopher', 'Flores', 'christopher@gmail.com', '09686500898', 'christopher', '', 'Supply Officer', 'Active', 11),
(21, 'Daniel', 'Rivera', 'daniel@gmail.com', '09745391551', 'daniel', '', 'Supply Officer', 'Active', 11),
(22, 'Paul', 'Gomez', 'paul@gmail.com', '09354485671', 'paul', '', 'Supply Officer', 'Active', 11),
(23, 'Marlboro', 'Diaz', 'marlboro@gmail.com', '09977510581', 'marlboro', '', 'Supply Officer', 'Active', 11),
(24, 'Donald', 'Reyes', 'donald@gmail.com', '09108222490', 'donald', '', 'Supply Officer', 'Active', 11),
(25, 'George', 'Morales', 'george@gmail.com', '09130911531', 'george', '', 'Supply Officer', 'Active', 12),
(26, 'Kenneth', 'Cruz', 'kenneth@gmail.com', '09102179590', 'kenneth', '', 'Supply Officer', 'Active', 12),
(27, 'Steven', 'Ortiz', 'steven@gmail.com', '09630270393', 'steven', '', 'Supply Officer', 'Active', 12),
(28, 'Edward', 'Gutierrez', 'edward@gmail.com', '09729956072', 'edward', '', 'Supply Officer', 'Active', 12),
(29, 'Brian', 'Chavez', 'brian@gmail.com', '09792869839', 'brian', '', 'Supply Officer', 'Active', 12),
(30, 'Ronald', 'Ramos', 'ronald@gmail.com', '09188541466', 'ronald', '', 'Supply Officer', 'Active', 12),
(31, 'Anthony', 'Gonzales', 'anthony@gmail.com', '09873341852', 'anthony', '', 'Supply Officer', 'Active', 12),
(32, 'Kevin', 'Ruiz', 'kevin@gmail.com', '09873243807', 'kevin', '', 'Supply Officer', 'Active', 12),
(33, 'Jason', 'Alvarez', 'jason@gmail.com', '09522859885', 'jason', '', 'Supply Officer', 'Active', 12),
(34, 'Matthew', 'Mendoza', 'matthew@gmail.com', '09820123488', 'matthew', '', 'Supply Officer', 'Active', 12),
(35, 'Gary', 'Vasquez', 'gary@gmail.com', '09223179363', 'gary', '', 'Supply Officer', 'Active', 12),
(36, 'Timothy', 'Castillo', 'timothy@gmail.com', '09966670048', 'timothy', '', 'Supply Officer', 'Active', 12),
(37, 'Jose', 'Jimenez', 'jose@gmail.com', '09851808090', 'jose', '', 'Supply Officer', 'Active', 12),
(38, 'Larry', 'Moreno', 'larry@gmail.com', '09472291313', 'larry', '', 'Supply Officer', 'Active', 12),
(39, 'Jeffrey', 'Romero', 'jeffrey@gmail.com', '09669150887', 'jeffrey', '', 'Supply Officer', 'Active', 12),
(40, 'Frank', 'Herrera', 'frank@gmail.com', '09430480894', 'frank', '', 'Supply Officer', 'Active', 13),
(41, 'Scott', 'Medina', 'scott@gmail.com', '09386214967', 'scott', '', 'Supply Officer', 'Active', 13),
(42, 'Eric', 'Aguilar', 'eric@gmail.com', '09578337232', 'eric', '', 'Supply Officer', 'Active', 13),
(43, 'Stephen', 'Garza', 'stephen@gmail.com', '09566357499', 'stephen', '', 'Supply Officer', 'Active', 13),
(44, 'Andrew', 'Castro', 'andrew@gmail.com', '09783072786', 'andrew', '', 'Supply Officer', 'Active', 13),
(45, 'Raymond', 'Vargas', 'raymond@gmail.com', '09185522025', 'raymond', '', 'Supply Officer', 'Active', 13),
(46, 'Gregory', 'Fernandez', 'gregory@gmail.com', '09787418063', 'gregory', '', 'Supply Officer', 'Active', 13),
(47, 'Joshua', 'Guzman', 'joshua@gmail.com', '09476833046', 'joshua', '', 'Supply Officer', 'Active', 13),
(48, 'Jerry', 'Munoz', 'jerry@gmail.com', '09706796656', 'jerry', '', 'Supply Officer', 'Active', 13),
(49, 'Dennis', 'Mendez', 'dennis@gmail.com', '09458694115', 'dennis', '', 'Supply Officer', 'Active', 13),
(50, 'Walter', 'Salazar', 'walter@gmail.com', '09327248564', 'walter', '', 'Supply Officer', 'Active', 13),
(51, 'Patrick', 'Soto', 'patrick@gmail.com', '09417104458', 'patrick', '', 'Supply Officer', 'Active', 13),
(52, 'Peter', 'Delgado', 'peter@gmail.com', '09675495040', 'peter', '', 'Supply Officer', 'Active', 13),
(53, 'Harold', 'Pena', 'harold@gmail.com', '09266016887', 'harold', '', 'Supply Officer', 'Active', 13),
(54, 'Douglas', 'Rios', 'douglas@gmail.com', '09987368896', 'douglas', '', 'Supply Officer', 'Active', 13),
(55, 'Henry', 'Alvarado', 'henry@gmail.com', '09714972073', 'henry', '', 'Supply Officer', 'Active', 14),
(56, 'Carl', 'Sandoval', 'carl@gmail.com', '09869669485', 'carl', '', 'Supply Officer', 'Active', 14),
(57, 'Arthur', 'Contreras', 'arthur@gmail.com', '09389890224', 'arthur', '', 'Supply Officer', 'Active', 14),
(58, 'Ryan', 'Valdez', 'ryan@gmail.com', '09430629139', 'ryan', '', 'Supply Officer', 'Active', 14),
(59, 'Roger', 'Guerrero', 'roger@gmail.com', '09686504849', 'roger', '', 'Supply Officer', 'Active', 14),
(60, 'Joe', 'Ortega', 'joe@gmail.com', '09689792727', 'joe', '', 'Supply Officer', 'Active', 14),
(61, 'Juan', 'Estrada', 'juan@gmail.com', '09825781742', 'juan', '', 'Supply Officer', 'Active', 14),
(62, 'Jack', 'Nunez', 'jack@gmail.com', '09868067837', 'jack', '', 'Supply Officer', 'Active', 14),
(63, 'Albert', 'Maldonado', 'albert@gmail.com', '09890722502', 'albert', '', 'Supply Officer', 'Active', 14),
(64, 'Jonathan', 'Vega', 'jonathan@gmail.com', '09611351510', 'jonathan', '', 'Supply Officer', 'Active', 14),
(65, 'Justin', 'Vazquez', 'justin@gmail.com', '09273774706', 'justin', '', 'Supply Officer', 'Active', 14),
(66, 'Terry', 'Santiago', 'terry@gmail.com', '09631640441', 'terry', '', 'Supply Officer', 'Active', 14),
(67, 'Gerald', 'Dominguez', 'gerald@gmail.com', '09541622030', 'gerald', '', 'Supply Officer', 'Active', 14),
(68, 'Keith', 'Espinoza', 'keith@gmail.com', '09872249432', 'keith', '', 'Supply Officer', 'Active', 14),
(69, 'Samuel', 'Silva', 'samuel@gmail.com', '09613565233', 'samuel', '', 'Supply Officer', 'Active', 14),
(70, 'Willie', 'Padilla', 'willie@gmail.com', '09914773962', 'willie', '', 'Supply Officer', 'Active', 15),
(71, 'Ralph', 'Marquez', 'ralph@gmail.com', '09291102638', 'ralph', '', 'Supply Officer', 'Active', 15),
(72, 'Lawrence', 'Cortez', 'lawrence@gmail.com', '09809594910', 'lawrence', '', 'Supply Officer', 'Active', 15),
(73, 'Nicholas', 'Rojas', 'nicholas@gmail.com', '09751388305', 'nicholas', '', 'Supply Officer', 'Active', 15),
(74, 'Roy', 'Acosta', 'roy@gmail.com', '09850605410', 'roy', '', 'Supply Officer', 'Active', 15),
(75, 'Benjamin', 'Figueroa', 'benjamin@gmail.com', '09405602704', 'benjamin', '', 'Supply Officer', 'Active', 15),
(76, 'Bruce', 'Luna', 'bruce@gmail.com', '09670716168', 'bruce', '', 'Supply Officer', 'Active', 15),
(77, 'Brandon', 'Juarez', 'brandon@gmail.com', '09829574173', 'brandon', '', 'Supply Officer', 'Active', 15),
(78, 'Adam', 'Navarro', 'adam@gmail.com', '09871295928', 'adam', '', 'Supply Officer', 'Active', 15),
(79, 'Harry', 'Campos', 'harry@gmail.com', '09421730367', 'harry', '', 'Supply Officer', 'Active', 15),
(80, 'Fred', 'Molina', 'fred@gmail.com', '09695943308', 'fred', '', 'Supply Officer', 'Active', 15),
(81, 'Wayne', 'Avila', 'wayne@gmail.com', '09707768989', 'wayne', '', 'Supply Officer', 'Active', 15),
(82, 'Billy', 'Ayala', 'billy@gmail.com', '09519316907', 'billy', '', 'Supply Officer', 'Active', 15),
(83, 'Steve', 'Mejia', 'steve@gmail.com', '09550830429', 'steve', '', 'Supply Officer', 'Active', 15),
(84, 'Louis', 'Carrillo', 'louis@gmail.com', '09645467854', 'louis', '', 'Supply Officer', 'Active', 15),
(85, 'Jeremy', 'Duran', 'jeremy@gmail.com', '09543545285', 'jeremy', '', 'Supply Officer', 'Active', 16),
(86, 'Aaron', 'Santos', 'aaron@gmail.com', '09792934669', 'aaron', '', 'Supply Officer', 'Active', 16),
(87, 'Randy', 'Salinas', 'randy@gmail.com', '09810951173', 'randy', '', 'Supply Officer', 'Active', 16),
(88, 'Howard', 'Robles', 'howard@gmail.com', '09177015402', 'howard', '', 'Supply Officer', 'Active', 16),
(89, 'Eugene', 'Solis', 'eugene@gmail.com', '09351124686', 'eugene', '', 'Supply Officer', 'Active', 16),
(90, 'Carlos', 'Lara', 'carlos@gmail.com', '09789260380', 'carlos', '', 'Supply Officer', 'Active', 16),
(91, 'Russell', 'Cervantes', 'russell@gmail.com', '09832692338', 'russell', '', 'Supply Officer', 'Active', 16),
(92, 'Bobby', 'Aguirre', 'bobby@gmail.com', '09462094235', 'bobby', '', 'Supply Officer', 'Active', 16),
(93, 'Victor', 'Deleon', 'victor@gmail.com', '09417142230', 'victor', '', 'Supply Officer', 'Active', 16),
(94, 'Martin', 'Ochoa', 'martin@gmail.com', '09528530694', 'martin', '', 'Supply Officer', 'Active', 16),
(95, 'Ernest', 'Miranda', 'ernest@gmail.com', '09726103822', 'ernest', '', 'Supply Officer', 'Active', 16),
(96, 'Phillip', 'Cardenas', 'phillip@gmail.com', '09433307947', 'phillip', '', 'Supply Officer', 'Active', 16),
(97, 'Todd', 'Trujillo', 'todd@gmail.com', '09662409224', 'todd', '', 'Supply Officer', 'Active', 16),
(98, 'Jesse', 'Velasquez', 'jesse@gmail.com', '09315242552', 'jesse', '', 'Supply Officer', 'Active', 16),
(99, 'Craig', 'Fuentes', 'craig@gmail.com', '09811595025', 'craig', '', 'Supply Officer', 'Active', 16),
(100, 'Alan', 'Cabrera', 'alan@gmail.com', '09724710901', 'alan', '', 'Supply Officer', 'Active', 17),
(101, 'Shawn', 'Leon', 'shawn@gmail.com', '09225859144', 'shawn', '', 'Supply Officer', 'Active', 17),
(102, 'Clarence', 'Rivas', 'clarence@gmail.com', '09732148023', 'clarence', '', 'Supply Officer', 'Active', 17),
(103, 'Sean', 'Montoya', 'sean@gmail.com', '09306377628', 'sean', '', 'Supply Officer', 'Active', 17),
(104, 'Philip', 'Calderon', 'philip@gmail.com', '09952194015', 'philip', '', 'Supply Officer', 'Active', 17),
(105, 'Chris', 'Colon', 'chris@gmail.com', '09853025624', 'chris', '', 'Supply Officer', 'Active', 17),
(106, 'Johnny', 'Serrano', 'johnny@gmail.com', '09435174909', 'johnny', '', 'Supply Officer', 'Active', 17),
(107, 'Earl', 'Gallegos', 'earl@gmail.com', '09159169731', 'earl', '', 'Supply Officer', 'Active', 17),
(108, 'Jimmy', 'Rosales', 'jimmy@gmail.com', '09940648690', 'jimmy', '', 'Supply Officer', 'Active', 17),
(109, 'Antonio', 'Castaneda', 'antonio@gmail.com', '09747586589', 'antonio', '', 'Supply Officer', 'Active', 17),
(110, 'Danny', 'Villarreal', 'danny@gmail.com', '09844385531', 'danny', '', 'Supply Officer', 'Active', 17),
(111, 'Bryan', 'Guerra', 'bryan@gmail.com', '09950831896', 'bryan', '', 'Supply Officer', 'Active', 17),
(112, 'Tony', 'Trevino', 'tony@gmail.com', '09132465477', 'tony', '', 'Supply Officer', 'Active', 17),
(113, 'Luis', 'Pacheco', 'luis@gmail.com', '09435244965', 'luis', '', 'Supply Officer', 'Active', 17),
(114, 'Mike', 'Ibarra', 'mike@gmail.com', '09292599051', 'mike', '', 'Supply Officer', 'Active', 17),
(115, 'Stanley', 'Valencia', 'stanley@gmail.com', '09493908878', 'stanley', '', 'Supply Officer', 'Active', 18),
(116, 'Leonard', 'Macias', 'leonard@gmail.com', '09257459796', 'leonard', '', 'Supply Officer', 'Active', 18),
(117, 'Nathan', 'Camacho', 'nathan@gmail.com', '09153446455', 'nathan', '', 'Supply Officer', 'Active', 18),
(118, 'Dale', 'Salas', 'dale@gmail.com', '09908016530', 'dale', '', 'Supply Officer', 'Active', 18),
(119, 'Manuel', 'Orozco', 'manuel@gmail.com', '09845929423', 'manuel', '', 'Supply Officer', 'Active', 18),
(120, 'Rodney', 'Roman', 'rodney@gmail.com', '09315154979', 'rodney', '', 'Supply Officer', 'Active', 18),
(121, 'Curtis', 'Zamora', 'curtis@gmail.com', '09651004377', 'curtis', '', 'Supply Officer', 'Active', 18),
(122, 'Norman', 'Suarez', 'norman@gmail.com', '09245259335', 'norman', '', 'Supply Officer', 'Active', 18),
(123, 'Allen', 'Franco', 'allen@gmail.com', '09616236517', 'allen', '', 'Supply Officer', 'Active', 18),
(124, 'Marvin', 'Barrera', 'marvin@gmail.com', '09660966693', 'marvin', '', 'Supply Officer', 'Active', 18),
(125, 'Vincent', 'Mercado', 'vincent@gmail.com', '09758054291', 'vincent', '', 'Supply Officer', 'Active', 18),
(126, 'Glenn', 'Santana', 'glenn@gmail.com', '09710337245', 'glenn', '', 'Supply Officer', 'Active', 18),
(127, 'Jeffery', 'Valenzuela', 'jeffery@gmail.com', '09735055861', 'jeffery', '', 'Supply Officer', 'Active', 18),
(128, 'Travis', 'Escobar', 'travis@gmail.com', '09483043628', 'travis', '', 'Supply Officer', 'Active', 18),
(129, 'Jeff', 'Rangel', 'jeff@gmail.com', '09411715801', 'jeff', '', 'Supply Officer', 'Active', 18),
(130, 'Chad', 'Melendez', 'chad@gmail.com', '09634548382', 'chad', '', 'Supply Officer', 'Active', 19),
(131, 'Jacob', 'Velez', 'jacob@gmail.com', '09577696158', 'jacob', '', 'Supply Officer', 'Active', 19),
(132, 'Lee', 'Lozano', 'lee@gmail.com', '09755479307', 'lee', '', 'Supply Officer', 'Active', 19),
(133, 'Melvin', 'Velazquez', 'melvin@gmail.com', '09612195694', 'melvin', '', 'Supply Officer', 'Active', 19),
(134, 'Alfred', 'Smith', 'alfred@gmail.com', '09139654762', 'alfred', '', 'Supply Officer', 'Active', 19),
(135, 'Kyle', 'Arias', 'kyle@gmail.com', '09998188907', 'kyle', '', 'Supply Officer', 'Active', 19),
(136, 'Francis', 'Mora', 'francis@gmail.com', '09859714786', 'francis', '', 'Supply Officer', 'Active', 19),
(137, 'Bradley', 'Delacruz', 'bradley@gmail.com', '09264980393', 'bradley', '', 'Supply Officer', 'Active', 19),
(138, 'Jesus', 'Galvan', 'jesus@gmail.com', '09573155244', 'jesus', '', 'Supply Officer', 'Active', 19),
(139, 'Herbert', 'Zuniga', 'herbert@gmail.com', '09932088768', 'herbert', '', 'Supply Officer', 'Active', 19),
(140, 'Frederick', 'Cantu', 'frederick@gmail.com', '09707011520', 'frederick', '', 'Supply Officer', 'Active', 19),
(141, 'Ray', 'Villanueva', 'ray@gmail.com', '09406824086', 'ray', '', 'Supply Officer', 'Active', 19),
(142, 'Joel', 'Meza', 'joel@gmail.com', '09501916483', 'joel', '', 'Supply Officer', 'Active', 19),
(143, 'Edwin', 'Acevedo', 'edwin@gmail.com', '09625739844', 'edwin', '', 'Supply Officer', 'Active', 19),
(144, 'Don', 'Cisneros', 'don@gmail.com', '09146941956', 'don', '', 'Supply Officer', 'Active', 19),
(145, 'Eddie', 'Arroyo', 'eddie@gmail.com', '09235996600', 'eddie', '', 'Supply Officer', 'Active', 20),
(146, 'Ricky', 'Pineda', 'ricky@gmail.com', '09447827314', 'ricky', '', 'Supply Officer', 'Active', 20),
(147, 'Troy', 'Andrade', 'troy@gmail.com', '09793266479', 'troy', '', 'Supply Officer', 'Active', 20),
(148, 'Randall', 'Tapia', 'randall@gmail.com', '09204527841', 'randall', '', 'Supply Officer', 'Active', 20),
(149, 'Barry', 'Sosa', 'barry@gmail.com', '09109720424', 'barry', '', 'Supply Officer', 'Active', 20),
(150, 'Alexander', 'Villa', 'alexander@gmail.com', '09883857342', 'alexander', '', 'Supply Officer', 'Active', 20),
(151, 'Bernard', 'Rocha', 'bernard@gmail.com', '09718723994', 'bernard', '', 'Supply Officer', 'Active', 20),
(152, 'Mario', 'Rubio', 'mario@gmail.com', '09466431978', 'mario', '', 'Supply Officer', 'Active', 20),
(153, 'Leroy', 'Zavala', 'leroy@gmail.com', '09156916065', 'leroy', '', 'Supply Officer', 'Active', 20),
(154, 'Francisco', 'Montes', 'francisco@gmail.com', '09920039980', 'francisco', '', 'Supply Officer', 'Active', 20),
(155, 'Marcus', 'Ponce', 'marcus@gmail.com', '09808823252', 'marcus', '', 'Supply Officer', 'Active', 20),
(156, 'Micheal', 'Bonilla', 'micheal@gmail.com', '09563641149', 'micheal', '', 'Supply Officer', 'Active', 20),
(157, 'Theodore', 'Arellano', 'theodore@gmail.com', '09982965094', 'theodore', '', 'Supply Officer', 'Active', 20),
(158, 'Clifford', 'Rosario', 'clifford@gmail.com', '09793378081', 'clifford', '', 'Supply Officer', 'Active', 20),
(159, 'Miguel', 'Davila', 'miguel@gmail.com', '09298113422', 'miguel', '', 'Supply Officer', 'Active', 20),
(160, 'Oscar', 'Villegas', 'oscar@gmail.com', '09511802190', 'oscar', '', 'Supply Officer', 'Active', 21),
(161, 'Jay', 'Huerta', 'jay@gmail.com', '09635410839', 'jay', '', 'Supply Officer', 'Active', 21),
(162, 'Jim', 'Mata', 'jim@gmail.com', '09972248471', 'jim', '', 'Supply Officer', 'Active', 21),
(163, 'Tom', 'Beltran', 'tom@gmail.com', '09547193682', 'tom', '', 'Supply Officer', 'Active', 21),
(164, 'Calvin', 'Barajas', 'calvin@gmail.com', '09710510327', 'calvin', '', 'Supply Officer', 'Active', 21),
(165, 'Alex', 'Benitez', 'alex@gmail.com', '09436570115', 'alex', '', 'Supply Officer', 'Active', 21),
(166, 'Jon', 'Esparza', 'jon@gmail.com', '09293610334', 'jon', '', 'Supply Officer', 'Active', 21),
(167, 'Ronnie', 'Cordova', 'ronnie@gmail.com', '09658027073', 'ronnie', '', 'Supply Officer', 'Active', 21),
(168, 'Bill', 'Murillo', 'bill@gmail.com', '09174539629', 'bill', '', 'Supply Officer', 'Active', 21),
(169, 'Lloyd', 'Salgado', 'lloyd@gmail.com', '09806278755', 'lloyd', '', 'Supply Officer', 'Active', 21),
(170, 'Tommy', 'Rosas', 'tommy@gmail.com', '09966969001', 'tommy', '', 'Supply Officer', 'Active', 21),
(171, 'Leon', 'Cuevas', 'leon@gmail.com', '09991447020', 'leon', '', 'Supply Officer', 'Active', 21),
(172, 'Derek', 'Palacios', 'derek@gmail.com', '09774827404', 'derek', '', 'Supply Officer', 'Active', 21),
(173, 'Warre', 'Guevara', 'warre@gmail.com', '09979767414', 'warre', '', 'Supply Officer', 'Active', 21),
(174, 'Darrell', 'Quintero', 'darrell@gmail.com', '09823248489', 'darrell', '', 'Supply Officer', 'Active', 21),
(175, 'Jerome', 'Johnson', 'jerome@gmail.com', '09969083352', 'jerome', '', 'Supply Officer', 'Active', 22),
(176, 'Floyd', 'Lucero', 'floyd@gmail.com', '09440982686', 'floyd', '', 'Supply Officer', 'Active', 22),
(177, 'Leo', 'Medrano', 'leo@gmail.com', '09335999608', 'leo', '', 'Supply Officer', 'Active', 22),
(178, 'Alvin', 'Bautista', 'alvin@gmail.com', '09144337051', 'alvin', '', 'Supply Officer', 'Active', 22),
(179, 'Tim', 'Marti', 'tim@gmail.com', '09358950257', 'tim', '', 'Supply Officer', 'Active', 22),
(180, 'Wesley', 'Lugo', 'wesley@gmail.com', '09410176523', 'wesley', '', 'Supply Officer', 'Active', 22),
(181, 'Gordon', 'Dejesus', 'gordon@gmail.com', '09109794690', 'gordon', '', 'Supply Officer', 'Active', 22),
(182, 'Dean', 'Espinosa', 'dean@gmail.com', '09304586764', 'dean', '', 'Supply Officer', 'Active', 22),
(183, 'Greg', 'Marin', 'greg@gmail.com', '09649282403', 'greg', '', 'Supply Officer', 'Active', 22),
(184, 'Jorge', 'Cortes', 'jorge@gmail.com', '09556848026', 'jorge', '', 'Supply Officer', 'Active', 22),
(185, 'Dustin', 'Magana', 'dustin@gmail.com', '09569233573', 'dustin', '', 'Supply Officer', 'Active', 22),
(186, 'Pedro', 'Quintana', 'pedro@gmail.com', '09577271778', 'pedro', '', 'Supply Officer', 'Active', 22),
(187, 'Derrick', 'Corona', 'derrick@gmail.com', '09992530238', 'derrick', '', 'Supply Officer', 'Active', 22),
(188, 'Dan', 'Trejo', 'dan@gmail.com', '09690237224', 'dan', '', 'Supply Officer', 'Active', 22),
(189, 'Lewis', 'Bernal', 'lewis@gmail.com', '09764711943', 'lewis', '', 'Supply Officer', 'Active', 22),
(190, 'Zachary', 'Nieves', 'zachary@gmail.com', '09121430085', 'zachary', '', 'Supply Officer', 'Active', 23),
(191, 'Corey', 'Villalobos', 'corey@gmail.com', '09611728538', 'corey', '', 'Supply Officer', 'Active', 23),
(192, 'Herman', 'Enriquez', 'herman@gmail.com', '09936824867', 'herman', '', 'Supply Officer', 'Active', 23),
(193, 'Maurice', 'Reyna', 'maurice@gmail.com', '09594967579', 'maurice', '', 'Supply Officer', 'Active', 23),
(194, 'Vernon', 'Jaramillo', 'vernon@gmail.com', '09825087923', 'vernon', '', 'Supply Officer', 'Active', 23),
(195, 'Roberto', 'Saenz', 'roberto@gmail.com', '09735235206', 'roberto', '', 'Supply Officer', 'Active', 23),
(196, 'Clyde', 'Quinones', 'clyde@gmail.com', '09817065022', 'clyde', '', 'Supply Officer', 'Active', 23),
(197, 'Glen', 'Delarosa', 'glen@gmail.com', '09747063754', 'glen', '', 'Supply Officer', 'Active', 23),
(198, 'Hector', 'Avalos', 'hector@gmail.com', '09436099540', 'hector', '', 'Supply Officer', 'Active', 23),
(199, 'Shane', 'Esquivel', 'shane@gmail.com', '09694672500', 'shane', '', 'Supply Officer', 'Active', 23),
(200, 'Ricardo', 'Williams', 'ricardo@gmail.com', '09786671781', 'ricardo', '', 'Supply Officer', 'Active', 23),
(201, 'Sam', 'Nava', 'sam@gmail.com', '09556391591', 'sam', '', 'Supply Officer', 'Active', 23),
(202, 'Rick', 'Cano', 'rick@gmail.com', '09953904662', 'rick', '', 'Supply Officer', 'Active', 23),
(203, 'Lester', 'Bravo', 'lester@gmail.com', '09307467886', 'lester', '', 'Supply Officer', 'Active', 23),
(204, 'Brent', 'Duarte', 'brent@gmail.com', '09203357564', 'brent', '', 'Supply Officer', 'Active', 23),
(205, 'Ramon', 'Galindo', 'ramon@gmail.com', '09729776946', 'ramon', '', 'Supply Officer', 'Active', 24),
(206, 'Charlie', 'Correa', 'charlie@gmail.com', '09906475333', 'charlie', '', 'Supply Officer', 'Active', 24),
(207, 'Tyler', 'Parra', 'tyler@gmail.com', '09774130456', 'tyler', '', 'Supply Officer', 'Active', 24),
(208, 'Gilbert', 'Rodriquez', 'gilbert@gmail.com', '09925054043', 'gilbert', '', 'Supply Officer', 'Active', 24),
(209, 'Gene', 'Saldana', 'gene@gmail.com', '09656389811', 'gene', '', 'Supply Officer', 'Active', 24),
(210, 'Marc', 'Leal', 'marc@gmail.com', '09321435627', 'marc', '', 'Supply Officer', 'Active', 24),
(211, 'Reginald', 'Sierra', 'reginald@gmail.com', '09915477473', 'reginald', '', 'Supply Officer', 'Active', 24),
(212, 'Ruben', 'Blanco', 'ruben@gmail.com', '09372878007', 'ruben', '', 'Supply Officer', 'Active', 24),
(213, 'Brett', 'Becerra', 'brett@gmail.com', '09540040311', 'brett', '', 'Supply Officer', 'Active', 24),
(214, 'Angel', 'Brown', 'angel@gmail.com', '09135950523', 'angel', '', 'Supply Officer', 'Active', 24),
(215, 'Nathaniel', 'Carrasco', 'nathaniel@gmail.com', '09641772031', 'nathaniel', '', 'Supply Officer', 'Active', 24),
(216, 'Rafael', 'Portillo', 'rafael@gmail.com', '09746031525', 'rafael', '', 'Supply Officer', 'Active', 24),
(217, 'Leslie', 'Tovar', 'leslie@gmail.com', '09776603946', 'leslie', '', 'Supply Officer', 'Active', 24),
(218, 'Edgar', 'Alfaro', 'edgar@gmail.com', '09433629200', 'edgar', '', 'Supply Officer', 'Active', 24),
(219, 'Milton', 'Vera', 'milton@gmail.com', '09491295546', 'milton', '', 'Supply Officer', 'Active', 24),
(220, 'Raul', 'Zapata', 'raul@gmail.com', '09876686975', 'raul', '', 'Supply Officer', 'Active', 25),
(221, 'Ben', 'Muniz', 'ben@gmail.com', '09388548029', 'ben', '', 'Supply Officer', 'Active', 25),
(222, 'Chester', 'Cardona', 'chester@gmail.com', '09810196015', 'chester', '', 'Supply Officer', 'Active', 25),
(223, 'Cecil', 'Vigil', 'cecil@gmail.com', '09805228844', 'cecil', '', 'Supply Officer', 'Active', 25),
(224, 'Duane', 'Saucedo', 'duane@gmail.com', '09636788773', 'duane', '', 'Supply Officer', 'Active', 25),
(225, 'Franklin', 'Baez', 'franklin@gmail.com', '09643348284', 'franklin', '', 'Supply Officer', 'Active', 25),
(226, 'Andre', 'Hurtado', 'andre@gmail.com', '09258855398', 'andre', '', 'Supply Officer', 'Active', 25),
(227, 'Elmer', 'Amaya', 'elmer@gmail.com', '09992718717', 'elmer', '', 'Supply Officer', 'Active', 25),
(228, 'Brad', 'Escobedo', 'brad@gmail.com', '09106681355', 'brad', '', 'Supply Officer', 'Active', 25),
(229, 'Gabriel', 'Peralta', 'gabriel@gmail.com', '09573222336', 'gabriel', '', 'Supply Officer', 'Active', 25),
(230, 'Ron', 'Arredondo', 'ron@gmail.com', '09544175950', 'ron', '', 'Supply Officer', 'Active', 25),
(231, 'Mitchell', 'Aguilera', 'mitchell@gmail.com', '09561840269', 'mitchell', '', 'Supply Officer', 'Active', 25),
(232, 'Roland', 'Zepeda', 'roland@gmail.com', '09472748747', 'roland', '', 'Supply Officer', 'Active', 25),
(233, 'Arnold', 'Rosado', 'arnold@gmail.com', '09395066908', 'arnold', '', 'Supply Officer', 'Active', 25),
(234, 'Harvey', 'Hinojosa', 'harvey@gmail.com', '09987550748', 'harvey', '', 'Supply Officer', 'Active', 25),
(235, 'Jared', 'Renteria', 'jared@gmail.com', '09630330254', 'jared', '', 'Supply Officer', 'Active', 26),
(236, 'Adrian', 'Gallardo', 'adrian@gmail.com', '09377587735', 'adrian', '', 'Supply Officer', 'Active', 26),
(237, 'Karl', 'Barrios', 'karl@gmail.com', '09633576035', 'karl', '', 'Supply Officer', 'Active', 26),
(238, 'Cory', 'Felix', 'cory@gmail.com', '09381550696', 'cory', '', 'Supply Officer', 'Active', 26),
(239, 'Claude', 'Castellanos', 'claude@gmail.com', '09828438071', 'claude', '', 'Supply Officer', 'Active', 26),
(240, 'Erik', 'Baca', 'erik@gmail.com', '09296954815', 'erik', '', 'Supply Officer', 'Active', 26),
(241, 'Darryl', 'Segura', 'darryl@gmail.com', '09771880060', 'darryl', '', 'Supply Officer', 'Active', 26),
(242, 'Jamie', 'Jones', 'jamie@gmail.com', '09553490642', 'jamie', '', 'Supply Officer', 'Active', 26),
(243, 'Neil', 'Guillen', 'neil@gmail.com', '09896790443', 'neil', '', 'Supply Officer', 'Active', 26),
(244, 'Jessie', 'Cordero', 'jessie@gmail.com', '09810197306', 'jessie', '', 'Supply Officer', 'Active', 26),
(245, 'Christian', 'Chacon', 'christian@gmail.com', '09629027777', 'christian', '', 'Supply Officer', 'Active', 26),
(246, 'Javier', 'Valle', 'javier@gmail.com', '09997092567', 'javier', '', 'Supply Officer', 'Active', 26),
(247, 'Fernando', 'Coronado', 'fernando@gmail.com', '09969451700', 'fernando', '', 'Supply Officer', 'Active', 26),
(248, 'Clinton', 'Delatorre', 'clinton@gmail.com', '09314538913', 'clinton', '', 'Supply Officer', 'Active', 26),
(249, 'Ted', 'Vela', 'ted@gmail.com', '09487366683', 'ted', '', 'Supply Officer', 'Active', 26),
(250, 'Mathew', 'Moran', 'mathew@gmail.com', '09954724193', 'mathew', '', 'Supply Officer', 'Active', 27),
(251, 'Tyrone', 'Alonso', 'tyrone@gmail.com', '09245147920', 'tyrone', '', 'Supply Officer', 'Active', 27),
(252, 'Darren', 'Velasco', 'darren@gmail.com', '09949055724', 'darren', '', 'Supply Officer', 'Active', 27),
(253, 'Lonnie', 'Madrigal', 'lonnie@gmail.com', '09471485743', 'lonnie', '', 'Supply Officer', 'Active', 27),
(254, 'Lance', 'Carranza', 'lance@gmail.com', '09778861290', 'lance', '', 'Supply Officer', 'Active', 27),
(255, 'Cody', 'Quiroz', 'cody@gmail.com', '09402862899', 'cody', '', 'Supply Officer', 'Active', 27),
(256, 'Julio', 'Romo', 'julio@gmail.com', '09339922127', 'julio', '', 'Supply Officer', 'Active', 27),
(257, 'Kelly', 'Madrid', 'kelly@gmail.com', '09948514569', 'kelly', '', 'Supply Officer', 'Active', 27),
(258, 'Kurt', 'Montano', 'kurt@gmail.com', '09973384059', 'kurt', '', 'Supply Officer', 'Active', 27),
(259, 'Allan', 'Serna', 'allan@gmail.com', '09418292120', 'allan', '', 'Supply Officer', 'Active', 27),
(260, 'Mary', 'Ybarra', 'mary@gmail.com', '09725684589', 'mary', '', 'Supply Officer', 'Active', 27),
(261, 'Patricia', 'Caballero', 'patricia@gmail.com', '09528993997', 'patricia', '', 'Supply Officer', 'Active', 27),
(262, 'Linda', 'Burgos', 'linda@gmail.com', '09941189916', 'linda', '', 'Supply Officer', 'Active', 27),
(263, 'Barbar', 'Ventura', 'barbar@gmail.com', '09461399229', 'barbar', '', 'Supply Officer', 'Active', 27),
(264, 'Elizabeth', 'Olvera', 'elizabeth@gmail.com', '09347550451', 'elizabeth', '', 'Supply Officer', 'Active', 27),
(265, 'Jennifer', 'Rosa', 'jennifer@gmail.com', '09962381155', 'jennifer', '', 'Supply Officer', 'Active', 28),
(266, 'Maria', 'Varela', 'maria@gmail.com', '09959257054', 'maria', '', 'Supply Officer', 'Active', 28),
(267, 'Susan', 'Leyva', 'susan@gmail.com', '09718458382', 'susan', '', 'Supply Officer', 'Active', 28),
(268, 'Margaret', 'Quezada', 'margaret@gmail.com', '09712524315', 'margaret', '', 'Supply Officer', 'Active', 28),
(269, 'Dorothy', 'Bermudez', 'dorothy@gmail.com', '09875781367', 'dorothy', '', 'Supply Officer', 'Active', 28),
(270, 'Lisa', 'Benavides', 'lisa@gmail.com', '09266504754', 'lisa', '', 'Supply Officer', 'Active', 28),
(271, 'Nancy', 'Aragon', 'nancy@gmail.com', '09143243565', 'nancy', '', 'Supply Officer', 'Active', 28),
(272, 'Karen', 'Aviles', 'karen@gmail.com', '09254524761', 'karen', '', 'Supply Officer', 'Active', 28),
(273, 'Betty', 'Uribe', 'betty@gmail.com', '09225597556', 'betty', '', 'Supply Officer', 'Active', 28),
(274, 'Helen', 'Davis', 'helen@gmail.com', '09261403643', 'helen', '', 'Supply Officer', 'Active', 28),
(275, 'Sandra', 'Pagan', 'sandra@gmail.com', '09656391450', 'sandra', '', 'Supply Officer', 'Active', 28),
(276, 'Donna', 'Paredes', 'donna@gmail.com', '09262448089', 'donna', '', 'Supply Officer', 'Active', 28),
(277, 'Carol', 'Osorio', 'carol@gmail.com', '09104063739', 'carol', '', 'Supply Officer', 'Active', 28),
(278, 'Ruth', 'Yanez', 'ruth@gmail.com', '09281699300', 'ruth', '', 'Supply Officer', 'Active', 28),
(279, 'Sharon', 'Nieto', 'sharon@gmail.com', '09258839940', 'sharon', '', 'Supply Officer', 'Active', 28),
(280, 'Michelle', 'Carmona', 'michelle@gmail.com', '09958293269', 'michelle', '', 'Supply Officer', 'Active', 29),
(281, 'Laura', 'Granados', 'laura@gmail.com', '09957873562', 'laura', '', 'Supply Officer', 'Active', 29),
(282, 'Sarah', 'Gil', 'sarah@gmail.com', '09284070907', 'sarah', '', 'Supply Officer', 'Active', 29),
(283, 'Kimberly', 'Montalvo', 'kimberly@gmail.com', '09965587041', 'kimberly', '', 'Supply Officer', 'Active', 29),
(284, 'Deborah', 'Casillas', 'deborah@gmail.com', '09359282190', 'deborah', '', 'Supply Officer', 'Active', 29),
(285, 'Jessica', 'Lujan', 'jessica@gmail.com', '09593100467', 'jessica', '', 'Supply Officer', 'Active', 29),
(286, 'Shirley', 'Bustamante', 'shirley@gmail.com', '09467771198', 'shirley', '', 'Supply Officer', 'Active', 29),
(287, 'Cynthia', 'Miller', 'cynthia@gmail.com', '09482371422', 'cynthia', '', 'Supply Officer', 'Active', 29),
(288, 'Angela', 'Rico', 'angela@gmail.com', '09473798043', 'angela', '', 'Supply Officer', 'Active', 29),
(289, 'Melissa', 'Barron', 'melissa@gmail.com', '09139661168', 'melissa', '', 'Supply Officer', 'Active', 29),
(290, 'Brenda', 'Anaya', 'brenda@gmail.com', '09114270558', 'brenda', '', 'Supply Officer', 'Active', 29),
(291, 'Amy', 'Ornelas', 'amy@gmail.com', '09504661461', 'amy', '', 'Supply Officer', 'Active', 29),
(292, 'Anna', 'Olivares', 'anna@gmail.com', '09224846371', 'anna', '', 'Supply Officer', 'Active', 29),
(293, 'Rebecca', 'Canales', 'rebecca@gmail.com', '09373071774', 'rebecca', '', 'Supply Officer', 'Active', 29),
(294, 'Virginia', 'Gamez', 'virginia@gmail.com', '09898278731', 'virginia', '', 'Supply Officer', 'Active', 29),
(295, 'Kathleen', 'Cuellar', 'kathleen@gmail.com', '09344373960', 'kathleen', '', 'Supply Officer', 'Active', 30),
(296, 'Pamela', 'Lemus', 'pamela@gmail.com', '09994400381', 'pamela', '', 'Supply Officer', 'Active', 30),
(297, 'Martha', 'Prado', 'martha@gmail.com', '09576337387', 'martha', '', 'Supply Officer', 'Active', 30),
(298, 'Debra', 'Barragan', 'debra@gmail.com', '09274614777', 'debra', '', 'Supply Officer', 'Active', 30),
(299, 'Amanda', 'Paz', 'amanda@gmail.com', '09522980164', 'amanda', '', 'Supply Officer', 'Active', 30),
(300, 'Stephani', 'Pina', 'stephani@gmail.com', '09890543737', 'stephani', '', 'Supply Officer', 'Active', 30),
(301, 'Carolyn', 'Reynoso', 'carolyn@gmail.com', '09805286757', 'carolyn', '', 'Supply Officer', 'Active', 30),
(302, 'Christine', 'Valadez', 'christine@gmail.com', '09177448337', 'christine', '', 'Supply Officer', 'Active', 30),
(303, 'Marie', 'Navarrete', 'marie@gmail.com', '09259553254', 'marie', '', 'Supply Officer', 'Active', 30),
(304, 'Janet', 'Otero', 'janet@gmail.com', '09115002007', 'janet', '', 'Supply Officer', 'Active', 30),
(305, 'Catherine', 'Aleman', 'catherine@gmail.com', '09271461054', 'catherine', '', 'Supply Officer', 'Active', 30),
(306, 'Frances', 'Marrero', 'frances@gmail.com', '09950596394', 'frances', '', 'Supply Officer', 'Active', 30),
(307, 'Ann', 'Olivas', 'ann@gmail.com', '09793333260', 'ann', '', 'Supply Officer', 'Active', 30),
(308, 'Joyce', 'Arevalo', 'joyce@gmail.com', '09866664367', 'joyce', '', 'Supply Officer', 'Active', 30),
(309, 'Diane', 'Ojeda', 'diane@gmail.com', '09471783411', 'diane', '', 'Supply Officer', 'Active', 30),
(310, 'Alice', 'Fonseca', 'alice@gmail.com', '09488739560', 'alice', '', 'Supply Officer', 'Active', 110),
(311, 'Julie', 'Quintanilla', 'julie@gmail.com', '09856325909', 'julie', '', 'Supply Officer', 'Active', 110),
(312, 'Heather', 'Solano', 'heather@gmail.com', '09107477552', 'heather', '', 'Supply Officer', 'Active', 110),
(313, 'Teresa', 'Escamilla', 'teresa@gmail.com', '09511148903', 'teresa', '', 'Supply Officer', 'Active', 110),
(314, 'Doris', 'Feliciano', 'doris@gmail.com', '09685461743', 'doris', '', 'Supply Officer', 'Active', 110),
(315, 'Gloria', 'Tellez', 'gloria@gmail.com', '09363310004', 'gloria', '', 'Supply Officer', 'Active', 110),
(316, 'Evelyn', 'Sepulveda', 'evelyn@gmail.com', '09248126361', 'evelyn', '', 'Supply Officer', 'Active', 110),
(317, 'Jean', 'Orellana', 'jean@gmail.com', '09453254826', 'jean', '', 'Supply Officer', 'Active', 110),
(318, 'Cheryl', 'Arreola', 'cheryl@gmail.com', '09938669263', 'cheryl', '', 'Supply Officer', 'Active', 110),
(319, 'Mildred', 'Betancourt', 'mildred@gmail.com', '09667634603', 'mildred', '', 'Supply Officer', 'Active', 110),
(320, 'Katherine', 'Carbajal', 'katherine@gmail.com', '09819348866', 'katherine', '', 'Supply Officer', 'Active', 110),
(321, 'Joan', 'Amador', 'joan@gmail.com', '09880931189', 'joan', '', 'Supply Officer', 'Active', 110),
(322, 'Ashley', 'Sotelo', 'ashley@gmail.com', '09309262533', 'ashley', '', 'Supply Officer', 'Active', 110),
(323, 'Judith', 'Hidalgo', 'judith@gmail.com', '09564111356', 'judith', '', 'Supply Officer', 'Active', 110),
(324, 'Rose', 'Ocampo', 'rose@gmail.com', '09124874724', 'rose', '', 'Supply Officer', 'Active', 110),
(325, 'Janice', 'Rendon', 'janice@gmail.com', '09807440633', 'janice', '', 'Supply Officer', 'Active', 111),
(326, 'Katarina', 'Venegas', 'katarina@gmail.com', '09950586279', 'katarina', '', 'Supply Officer', 'Active', 111),
(327, 'Nicole', 'Negron', 'nicole@gmail.com', '09215835826', 'nicole', '', 'Supply Officer', 'Active', 111),
(328, 'Judy', 'Banuelos', 'judy@gmail.com', '09364083331', 'judy', '', 'Supply Officer', 'Active', 111),
(329, 'Christina', 'Wilso', 'christina@gmail.com', '09863506268', 'christina', '', 'Supply Officer', 'Active', 111),
(330, 'Kathy', 'Patino', 'kathy@gmail.com', '09255108492', 'kathy', '', 'Supply Officer', 'Active', 111),
(331, 'Theresa', 'Cavazos', 'theresa@gmail.com', '09912015245', 'theresa', '', 'Supply Officer', 'Active', 111),
(332, 'Beverly', 'Torrez', 'beverly@gmail.com', '09767507957', 'beverly', '', 'Supply Officer', 'Active', 111),
(333, 'Denise', 'Matos', 'denise@gmail.com', '09324477959', 'denise', '', 'Supply Officer', 'Active', 111),
(334, 'Tammy', 'Casas', 'tammy@gmail.com', '09912187411', 'tammy', '', 'Supply Officer', 'Active', 111),
(335, 'Irene', 'Godinez', 'irene@gmail.com', '09178703944', 'irene', '', 'Supply Officer', 'Active', 111),
(336, 'Jane', 'Valdes', 'jane@gmail.com', '09647333053', 'jane', '', 'Supply Officer', 'Active', 111),
(337, 'Lori', 'Longoria', 'lori@gmail.com', '09150587163', 'lori', '', 'Supply Officer', 'Active', 111),
(338, 'Rachel', 'Ledesma', 'rachel@gmail.com', '09134891856', 'rachel', '', 'Supply Officer', 'Active', 111),
(339, 'Marilyn', 'Alaniz', 'marilyn@gmail.com', '09608482180', 'marilyn', '', 'Supply Officer', 'Active', 111),
(340, 'Andrea', 'Aranda', 'andrea@gmail.com', '09382596075', 'andrea', '', 'Supply Officer', 'Active', 112),
(341, 'Kathryn', 'Prieto', 'kathryn@gmail.com', '09126776917', 'kathryn', '', 'Supply Officer', 'Active', 112),
(342, 'Louise', 'Vallejo', 'louise@gmail.com', '09547281482', 'louise', '', 'Supply Officer', 'Active', 112),
(343, 'Sara', 'Polanco', 'sara@gmail.com', '09906769303', 'sara', '', 'Supply Officer', 'Active', 112),
(344, 'Anne', 'Zarate', 'anne@gmail.com', '09183289260', 'anne', '', 'Supply Officer', 'Active', 112),
(345, 'Jacqueline', 'Pulido', 'jacqueline@gmail.com', '09854336512', 'jacqueline', '', 'Supply Officer', 'Active', 112),
(346, 'Wanda', 'Arce', 'wanda@gmail.com', '09689998838', 'wanda', '', 'Supply Officer', 'Active', 112),
(347, 'Bonnie', 'Barraza', 'bonnie@gmail.com', '09653344864', 'bonnie', '', 'Supply Officer', 'Active', 112),
(348, 'Julia', 'Mena', 'julia@gmail.com', '09439512584', 'julia', '', 'Supply Officer', 'Active', 112),
(349, 'Ruby', 'Alonzo', 'ruby@gmail.com', '09608432536', 'ruby', '', 'Supply Officer', 'Active', 112),
(350, 'Lois', 'Gamboa', 'lois@gmail.com', '09312714582', 'lois', '', 'Supply Officer', 'Active', 112),
(351, 'Tina', 'Arteaga', 'tina@gmail.com', '09607882130', 'tina', '', 'Supply Officer', 'Active', 112),
(352, 'Phyllis', 'Escalante', 'phyllis@gmail.com', '09206268401', 'phyllis', '', 'Supply Officer', 'Active', 112),
(353, 'Norma', 'Valentin', 'norma@gmail.com', '09503928813', 'norma', '', 'Supply Officer', 'Active', 112),
(354, 'Paula', 'Galvez', 'paula@gmail.com', '09876603894', 'paula', '', 'Supply Officer', 'Active', 112),
(355, 'Diana', 'Brito', 'diana@gmail.com', '09289412779', 'diana', '', 'Supply Officer', 'Active', 113),
(356, 'Annie', 'Cerda', 'annie@gmail.com', '09117114728', 'annie', '', 'Supply Officer', 'Active', 113),
(357, 'Lillian', 'Zaragoza', 'lillian@gmail.com', '09485165644', 'lillian', '', 'Supply Officer', 'Active', 113),
(358, 'Emily', 'Nevarez', 'emily@gmail.com', '09446252379', 'emily', '', 'Supply Officer', 'Active', 113),
(359, 'Robin', 'Chavarria', 'robin@gmail.com', '09775974395', 'robin', '', 'Supply Officer', 'Active', 113),
(360, 'Peggy', 'Saldivar', 'peggy@gmail.com', '09955119016', 'peggy', '', 'Supply Officer', 'Active', 113),
(361, 'Crystal', 'Corral', 'crystal@gmail.com', '09298764110', 'crystal', '', 'Supply Officer', 'Active', 113),
(362, 'Gladys', 'Saavedra', 'gladys@gmail.com', '09857485550', 'gladys', '', 'Supply Officer', 'Active', 113),
(363, 'Rita', 'Anderson', 'rita@gmail.com', '09785933886', 'rita', '', 'Supply Officer', 'Active', 113),
(364, 'Dawn', 'Marroquin', 'dawn@gmail.com', '09838998453', 'dawn', '', 'Supply Officer', 'Active', 113),
(365, 'Connie', 'Chapa', 'connie@gmail.com', '09135575213', 'connie', '', 'Supply Officer', 'Active', 113),
(366, 'Florenc', 'Mireles', 'florenc@gmail.com', '09781320666', 'florenc', '', 'Supply Officer', 'Active', 113),
(367, 'Tracy', 'Crespo', 'tracy@gmail.com', '09501077550', 'tracy', '', 'Supply Officer', 'Active', 113),
(368, 'Edna', 'Arriaga', 'edna@gmail.com', '09700062776', 'edna', '', 'Supply Officer', 'Active', 113),
(369, 'Tiffany', 'Covarrubias', 'tiffany@gmail.com', '09248734029', 'tiffany', '', 'Supply Officer', 'Active', 113),
(370, 'Carmen', 'Salcedo', 'carmen@gmail.com', '09935157818', 'carmen', '', 'Supply Officer', 'Active', 114),
(371, 'Rosa', 'Holguin', 'rosa@gmail.com', '09277887894', 'rosa', '', 'Supply Officer', 'Active', 114),
(372, 'Cindy', 'Moya', 'cindy@gmail.com', '09215332512', 'cindy', '', 'Supply Officer', 'Active', 114),
(373, 'Grace', 'Alcala', 'grace@gmail.com', '09118617702', 'grace', '', 'Supply Officer', 'Active', 114),
(374, 'Wendy', 'Linares', 'wendy@gmail.com', '09863514837', 'wendy', '', 'Supply Officer', 'Active', 114),
(375, 'Victoria', 'Heredia', 'victoria@gmail.com', '09712130116', 'victoria', '', 'Supply Officer', 'Active', 114),
(376, 'Edith', 'Thomas', 'edith@gmail.com', '09635761076', 'edith', '', 'Supply Officer', 'Active', 114),
(377, 'Kim', 'Ceja', 'kim@gmail.com', '09931573412', 'kim', '', 'Supply Officer', 'Active', 114),
(378, 'Sherry', 'Barrientos', 'sherry@gmail.com', '09853595351', 'sherry', '', 'Supply Officer', 'Active', 114),
(379, 'Sylvia', 'Aponte', 'sylvia@gmail.com', '09891786179', 'sylvia', '', 'Supply Officer', 'Active', 114),
(380, 'Josephine', 'Taylor', 'josephine@gmail.com', '09674312138', 'josephine', '', 'Supply Officer', 'Active', 114),
(381, 'Thelma', 'Montanez', 'thelma@gmail.com', '09458346037', 'thelma', '', 'Supply Officer', 'Active', 114),
(382, 'Shannon', 'Najera', 'shannon@gmail.com', '09410510304', 'shannon', '', 'Supply Officer', 'Active', 114),
(383, 'Sheila', 'Rodrigues', 'sheila@gmail.com', '09660415599', 'sheila', '', 'Supply Officer', 'Active', 114),
(384, 'Ethel', 'Cornejo', 'ethel@gmail.com', '09587377514', 'ethel', '', 'Supply Officer', 'Active', 114),
(385, 'Ellen', 'Alarcon', 'ellen@gmail.com', '09141827744', 'ellen', '', 'Supply Officer', 'Active', 115),
(386, 'Elaine', 'Ontiveros', 'elaine@gmail.com', '09939286448', 'elaine', '', 'Supply Officer', 'Active', 115),
(387, 'Marjorie', 'Anguiano', 'marjorie@gmail.com', '09568217400', 'marjorie', '', 'Supply Officer', 'Active', 115),
(388, 'Carrie', 'Soriano', 'carrie@gmail.com', '09740082223', 'carrie', '', 'Supply Officer', 'Active', 115),
(389, 'Charlotte', 'Pimentel', 'charlotte@gmail.com', '09740641161', 'charlotte', '', 'Supply Officer', 'Active', 115),
(390, 'Monica', 'Elizondo', 'monica@gmail.com', '09834232326', 'monica', '', 'Supply Officer', 'Active', 115),
(391, 'Esther', 'Zambrano', 'esther@gmail.com', '09907324831', 'esther', '', 'Supply Officer', 'Active', 115),
(392, 'Pauline', 'Rincon', 'pauline@gmail.com', '09894762980', 'pauline', '', 'Supply Officer', 'Active', 115),
(393, 'Emma', 'Mondragon', 'emma@gmail.com', '09217066201', 'emma', '', 'Supply Officer', 'Active', 115),
(394, 'Juanita', 'Cazares', 'juanita@gmail.com', '09724769967', 'juanita', '', 'Supply Officer', 'Active', 115),
(395, 'Anita', 'Robledo', 'anita@gmail.com', '09598601742', 'anita', '', 'Supply Officer', 'Active', 115),
(396, 'Rhonda', 'Acuna', 'rhonda@gmail.com', '09571458668', 'rhonda', '', 'Supply Officer', 'Active', 115),
(397, 'Hazel', 'Bueno', 'hazel@gmail.com', '09878520117', 'hazel', '', 'Supply Officer', 'Active', 115),
(398, 'Amber', 'Bustos', 'amber@gmail.com', '09446476190', 'amber', '', 'Supply Officer', 'Active', 115),
(399, 'Eva', 'Adame', 'eva@gmail.com', '09902220064', 'eva', '', 'Supply Officer', 'Active', 115),
(400, 'Debbie', 'Balderas', 'debbie@gmail.com', '09679072561', 'debbie', '', 'Supply Officer', 'Active', 116),
(401, 'April', 'Delossantos', 'april@gmail.com', '09224114667', 'april', '', 'Supply Officer', 'Active', 116),
(402, 'Levy', 'Toledo', 'levy@gmail.com', '09216408675', 'levy', '', 'Supply Officer', 'Active', 116),
(403, 'Clara', 'Valdivia', 'clara@gmail.com', '09740807777', 'clara', '', 'Supply Officer', 'Active', 116),
(404, 'Lucille', 'Naranjo', 'lucille@gmail.com', '09339636419', 'lucille', '', 'Supply Officer', 'Active', 116),
(405, 'Jamenson', 'Perales', 'jamenson@gmail.com', '09103636394', 'jamenson', '', 'Supply Officer', 'Active', 116),
(406, 'Joanne', 'Delgadillo', 'joanne@gmail.com', '09584443929', 'joanne', '', 'Supply Officer', 'Active', 116),
(407, 'Eleanor', 'Puente', 'eleanor@gmail.com', '09657866680', 'eleanor', '', 'Supply Officer', 'Active', 116),
(408, 'Valerie', 'Frias', 'valerie@gmail.com', '09861632388', 'valerie', '', 'Supply Officer', 'Active', 116),
(409, 'Danielle', 'Vidal', 'danielle@gmail.com', '09142956284', 'danielle', '', 'Supply Officer', 'Active', 116),
(410, 'Megan', 'Moore', 'megan@gmail.com', '09607896809', 'megan', '', 'Supply Officer', 'Active', 116),
(411, 'Alicia', 'Thompson', 'alicia@gmail.com', '09149764397', 'alicia', '', 'Supply Officer', 'Active', 116),
(412, 'Suzanne', 'Guajardo', 'suzanne@gmail.com', '09411367748', 'suzanne', '', 'Supply Officer', 'Active', 116),
(413, 'Michele', 'Negrete', 'michele@gmail.com', '09377843161', 'michele', '', 'Supply Officer', 'Active', 116),
(414, 'Gail', 'Collazo', 'gail@gmail.com', '09795034672', 'gail', '', 'Supply Officer', 'Active', 116),
(415, 'Bertha', 'Abreu', 'bertha@gmail.com', '09764653771', 'bertha', '', 'Supply Officer', 'Active', 117),
(416, 'Darlene', 'Ceballos', 'darlene@gmail.com', '09316474491', 'darlene', '', 'Supply Officer', 'Active', 117),
(417, 'Veronica', 'Jaimes', 'veronica@gmail.com', '09353904469', 'veronica', '', 'Supply Officer', 'Active', 117),
(418, 'Jill', 'Batista', 'jill@gmail.com', '09770482000', 'jill', '', 'Supply Officer', 'Active', 117),
(419, 'Erin', 'Irizarry', 'erin@gmail.com', '09340412833', 'erin', '', 'Supply Officer', 'Active', 117),
(420, 'Geraldine', 'Jackson', 'geraldine@gmail.com', '09998821922', 'geraldine', '', 'Supply Officer', 'Active', 117),
(421, 'Lauren', 'Espinal', 'lauren@gmail.com', '09131577208', 'lauren', '', 'Supply Officer', 'Active', 117),
(422, 'Cathy', 'Carrera', 'cathy@gmail.com', '09229139984', 'cathy', '', 'Supply Officer', 'Active', 117),
(423, 'Joann', 'Tamayo', 'joann@gmail.com', '09458193634', 'joann', '', 'Supply Officer', 'Active', 117),
(424, 'Lorraine', 'Pantoja', 'lorraine@gmail.com', '09950962734', 'lorraine', '', 'Supply Officer', 'Active', 117),
(425, 'Lynn', 'Oliva', 'lynn@gmail.com', '09720517678', 'lynn', '', 'Supply Officer', 'Active', 117),
(426, 'Sally', 'White', 'sally@gmail.com', '09766559153', 'sally', '', 'Supply Officer', 'Active', 117),
(427, 'Regina', 'Espino', 'regina@gmail.com', '09598426668', 'regina', '', 'Supply Officer', 'Active', 117),
(428, 'Erica', 'Benavidez', 'erica@gmail.com', '09290950741', 'erica', '', 'Supply Officer', 'Active', 117),
(429, 'Beatrice', 'Ordonez', 'beatrice@gmail.com', '09380966118', 'beatrice', '', 'Supply Officer', 'Active', 117),
(430, 'Dolores', 'Noriega', 'dolores@gmail.com', '09530571375', 'dolores', '', 'Supply Officer', 'Active', 118),
(431, 'Bernice', 'Almanza', 'bernice@gmail.com', '09935012340', 'bernice', '', 'Supply Officer', 'Active', 118),
(432, 'Audrey', 'Urbina', 'audrey@gmail.com', '09984548718', 'audrey', '', 'Supply Officer', 'Active', 118),
(433, 'Yvonne', 'Limon', 'yvonne@gmail.com', '09353634444', 'yvonne', '', 'Supply Officer', 'Active', 118),
(434, 'Annette', 'Gaytan', 'annette@gmail.com', '09285897314', 'annette', '', 'Supply Officer', 'Active', 118),
(435, 'June', 'Montero', 'june@gmail.com', '09629916684', 'june', '', 'Supply Officer', 'Active', 118),
(436, 'Samantha', 'Archuleta', 'samantha@gmail.com', '09457639046', 'samantha', '', 'Supply Officer', 'Active', 118),
(437, 'Marion', 'Armenta', 'marion@gmail.com', '09340329845', 'marion', '', 'Supply Officer', 'Active', 118),
(438, 'Dana', 'Banda', 'dana@gmail.com', '09910920470', 'dana', '', 'Supply Officer', 'Active', 118),
(439, 'Stacy', 'Farias', 'stacy@gmail.com', '09266354927', 'stacy', '', 'Supply Officer', 'Active', 118),
(440, 'Ana', 'Tejeda', 'ana@gmail.com', '09403396811', 'ana', '', 'Supply Officer', 'Active', 118),
(441, 'Renee', 'Fierro', 'renee@gmail.com', '09407323021', 'renee', '', 'Supply Officer', 'Active', 118),
(442, 'Ida', 'Mojica', 'ida@gmail.com', '09297512644', 'ida', '', 'Supply Officer', 'Active', 118),
(443, 'Vivian', 'Solorzano', 'vivian@gmail.com', '09195052042', 'vivian', '', 'Supply Officer', 'Active', 118),
(444, 'Roberta', 'Villasenor', 'roberta@gmail.com', '09860593011', 'roberta', '', 'Supply Officer', 'Active', 118),
(445, 'Holly', 'Mesa', 'holly@gmail.com', '09998892413', 'holly', '', 'Supply Officer', 'Active', 119),
(446, 'Brittany', 'Mares', 'brittany@gmail.com', '09848069601', 'brittany', '', 'Supply Officer', 'Active', 119),
(447, 'Melanie', 'Tirado', 'melanie@gmail.com', '09984658186', 'melanie', '', 'Supply Officer', 'Active', 119),
(448, 'Loretta', 'Lira', 'loretta@gmail.com', '09393844117', 'loretta', '', 'Supply Officer', 'Active', 119),
(449, 'Yolanda', 'Aguayo', 'yolanda@gmail.com', '09378405708', 'yolanda', '', 'Supply Officer', 'Active', 119),
(450, 'Jeanette', 'Lerma', 'jeanette@gmail.com', '09478082971', 'jeanette', '', 'Supply Officer', 'Active', 119),
(451, 'Laurie', 'Argueta', 'laurie@gmail.com', '09116739049', 'laurie', '', 'Supply Officer', 'Active', 119),
(452, 'Katie', 'Palma', 'katie@gmail.com', '09767822653', 'katie', '', 'Supply Officer', 'Active', 119),
(453, 'Kristen', 'Jaime', 'kristen@gmail.com', '09151594822', 'kristen', '', 'Supply Officer', 'Active', 119),
(454, 'Vanessa', 'Aquino', 'vanessa@gmail.com', '09705063961', 'vanessa', '', 'Supply Officer', 'Active', 119),
(455, 'Alma', 'Alicea', 'alma@gmail.com', '09860598535', 'alma', '', 'Supply Officer', 'Active', 119),
(456, 'Sue', 'Clark', 'sue@gmail.com', '09612498811', 'sue', '', 'Supply Officer', 'Active', 119),
(457, 'Elsie', 'Soria', 'elsie@gmail.com', '09789601444', 'elsie', '', 'Supply Officer', 'Active', 119),
(458, 'Beth', 'Solorio', 'beth@gmail.com', '09735338202', 'beth', '', 'Supply Officer', 'Active', 119),
(459, 'Jeanne', 'Jasso', 'jeanne@gmail.com', '09923297252', 'jeanne', '', 'Supply Officer', 'Active', 119),
(460, 'Eduardo', 'Barranco', 'eduardo@gmail.com', '09601812986', 'eduardo', '', 'Custodian', 'Active', NULL),
(461, 'Terrence', 'Sabala', 'terrence@gmail.com', '09317728400', 'terrence', '', 'Custodian', 'Active', NULL),
(462, 'Enrique', 'Diazdeleon', 'enrique@gmail.com', '09342909046', 'enrique', '', 'Custodian', 'Active', NULL),
(463, 'Freddie', 'Hodges', 'freddie@gmail.com', '09690590106', 'freddie', '', 'Custodian', 'Active', NULL),
(464, 'Wade', 'Maez', 'wade@gmail.com', '09847806174', 'wade', '', 'Custodian', 'Active', NULL),
(465, 'Dingdong', 'Arellanes', 'dingdong@gmail.com', '09185311360', 'dingdong', '', 'Custodian', 'Active', NULL),
(466, 'Isabella', 'Abundis', 'isabella@gmail.com', '09718644446', 'isabella', '', 'Custodian', 'Active', NULL),
(467, 'Herminia', 'Barber', 'herminia@gmail.com', '09851533332', 'herminia', '', 'Custodian', 'Active', NULL),
(468, 'Terra', 'Urzua', 'terra@gmail.com', '09271207530', 'terra', '', 'Custodian', 'Active', NULL),
(469, 'Celina', 'Escutia', 'celina@gmail.com', '09887817776', 'celina', '', 'Custodian', 'Active', NULL),
(470, 'Glovine', 'Pintor', 'glovine@gmail.com', '09940780229', 'glovine', '', 'Admin', 'Active', NULL),
(471, 'Seth', 'Cornelio', 'seth@gmail.com', '09666080247', 'seth', '', 'Admin', 'Active', NULL);
INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `contact_no`, `username`, `password`, `position`, `status`, `dept_id`) VALUES
(472, 'Kent', 'Pantaleon', 'kent@gmail.com', '09773872175', 'kent', '', 'Admin', 'Active', NULL),
(473, 'Terrance', 'Alvear', 'terrance@gmail.com', '09190566952', 'terrance', '', 'Admin', 'Active', NULL),
(474, 'Rene', 'Grajales', 'rene@gmail.com', '09761067131', 'rene', '', 'Admin', 'Active', NULL),
(475, 'Leta', 'Warner', 'leta@gmail.com', '09504611729', 'leta', '', 'Admin', 'Active', NULL),
(476, 'Felecia', 'Shelton', 'felecia@gmail.com', '09682139831', 'felecia', '', 'Admin', 'Active', NULL),
(477, 'Sharlene', 'Mera', 'sharlene@gmail.com', '09998744746', 'sharlene', '', 'Admin', 'Active', NULL),
(478, 'Lesa', 'Madero', 'lesa@gmail.com', '09281863611', 'lesa', '', 'Admin', 'Active', NULL),
(479, 'Beverley', 'Potter', 'beverley@gmail.com', '09339325918', 'beverley', '', 'Admin', 'Active', NULL);

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
-- Indexes for table `enduser`
--
ALTER TABLE `enduser`
  ADD PRIMARY KEY (`enduser_id`),
  ADD UNIQUE KEY `serial_id` (`serial_id`);

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
-- Indexes for table `reconciliation`
--
ALTER TABLE `reconciliation`
  ADD PRIMARY KEY (`recon_id`);

--
-- Indexes for table `returnitem`
--
ALTER TABLE `returnitem`
  ADD PRIMARY KEY (`return_id`);

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
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD KEY `department_idx` (`dept_id`);

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
  MODIFY `dist_id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `enduser`
--
ALTER TABLE `enduser`
  MODIFY `enduser_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `itemdetail`
--
ALTER TABLE `itemdetail`
  MODIFY `item_det_id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mooedistribution`
--
ALTER TABLE `mooedistribution`
  MODIFY `mooed_id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reconciliation`
--
ALTER TABLE `reconciliation`
  MODIFY `recon_id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `returnitem`
--
ALTER TABLE `returnitem`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `serial`
--
ALTER TABLE `serial`
  MODIFY `serial_id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=480;
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
