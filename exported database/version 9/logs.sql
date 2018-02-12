-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2018 at 01:31 PM
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
  `date_acquired` date NOT NULL,
  `account_code` varchar(15) NOT NULL,
  `quantity` int(15) NOT NULL,
  `unit` enum('piece','box','set','ream','dozen','bundle','sack','others') NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_description` varchar(60) NOT NULL,
  `item_type` enum('CO','MOOE') NOT NULL,
  `department` varchar(60) NOT NULL,
  `received_from` varchar(30) NOT NULL,
  `userid` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `decreaseserial`
--

CREATE TABLE `decreaseserial` (
  `serial` varchar(30) DEFAULT NULL,
  `end_user` varchar(30) DEFAULT NULL,
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
  `date_delivered` date NOT NULL,
  `date_received` date NOT NULL,
  `quantity` int(15) NOT NULL,
  `unit` enum('piece','box','set','ream','dozen','bundle','sack','others') NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_description` varchar(60) NOT NULL,
  `unit_cost` int(15) NOT NULL,
  `item_type` enum('CO','MOOE') NOT NULL,
  `expiration_date` date NOT NULL,
  `userid` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `increaselog`
--

INSERT INTO `increaselog` (`inc_log_id`, `timestamp`, `date_delivered`, `date_received`, `quantity`, `unit`, `item_name`, `item_description`, `unit_cost`, `item_type`, `expiration_date`, `userid`) VALUES
(1, '2018-02-08 22:38:49', '2018-01-02', '2018-01-02', 20, 'piece', 'Air Conditioner', 'LG HS-09IST Split Type AirCon', 31995, 'CO', '2023-01-02', 0),
(2, '2018-02-08 22:42:30', '2018-01-03', '2018-02-03', 38, 'piece', 'Amplifier', 'Konzert AV-502B Amplifier (Black)', 4299, 'CO', '2026-01-03', 0),
(3, '2018-02-08 22:46:55', '2018-01-04', '2018-01-04', 100, 'piece', 'Bed Sheet', 'MODERN SPACE High Quality Bedsheet Double Size', 495, 'CO', '2021-01-04', 0),
(4, '2018-02-08 22:54:53', '2018-01-05', '2018-01-05', 50, 'piece', 'Kerosene Lamp', 'Kerosene Powered Lamps, 250ML tank', 250, 'CO', '2020-01-05', 0),
(5, '2018-02-08 23:02:11', '2018-01-06', '2018-01-06', 50, 'piece', 'Knife', '12" Ultra Sharp Thin Blades', 75, 'CO', '2021-01-06', 0),
(6, '2018-02-08 23:05:51', '2018-01-07', '2018-01-07', 500, 'piece', 'Sword', 'Mizuchi Katana', 30000, 'CO', '2023-01-07', 0),
(7, '2018-02-08 23:08:16', '2018-01-08', '2018-01-08', 75, 'piece', 'Mosquito Net', '1.5m Foldable Mosquito Net (White)', 500, 'CO', '2021-01-08', 0),
(8, '2018-02-08 23:12:10', '2018-01-09', '2018-01-09', 50, 'piece', 'Padlock', 'Yale 70mm Brass Padlock (140 series)', 900, 'CO', '2021-01-09', 0),
(9, '2018-02-08 23:18:10', '2018-01-10', '2018-01-10', 30, 'piece', 'Baking Pan', '16" Non-stick Baking Pan', 500, 'CO', '2021-01-10', 0),
(10, '2018-02-08 23:21:27', '2018-02-11', '2018-02-11', 10, 'piece', 'Weighing Scale', 'Taylor Mechanical Analog Bathroom Weighing Scale', 600, 'CO', '2023-01-11', 0),
(11, '2018-02-09 12:11:09', '2018-01-11', '2018-01-11', 10, 'piece', 'Black Board / White Board', '60" x 40" White Board', 800, 'CO', '2023-01-11', 0),
(12, '2018-02-09 12:13:29', '2018-01-12', '2018-01-12', 50, 'piece', 'Cutter', '6" Cutter with Rubber Grip', 120, 'CO', '2023-01-12', 0),
(13, '2018-02-09 12:15:57', '2018-01-13', '2018-01-13', 50, 'ream', 'Bond Paper', 'Cactus A4 White Bond Paper', 250, 'MOOE', '2018-05-09', 0),
(14, '2018-02-09 12:18:30', '2018-01-14', '2018-01-14', 200, 'piece', 'Flashlight', 'Head Spot Light (Black)', 130, 'CO', '2021-01-14', 0),
(15, '2018-02-09 12:21:17', '2018-01-15', '2018-01-15', 100, 'piece', 'Water Jug', '30 Litters Water Jug', 150, 'CO', '2019-01-15', 0),
(16, '2018-02-09 12:24:11', '2018-01-16', '2018-01-16', 100, 'box', 'Staple Wire', 'HBW Stainless No. 26', 15, 'MOOE', '2018-08-16', 0),
(17, '2018-02-09 12:27:04', '2018-01-18', '2018-01-18', 75, 'dozen', 'Garbage Bag', 'Garbage Bag (Black)', 120, 'MOOE', '2018-08-18', 0),
(18, '2018-02-09 12:30:04', '2018-01-18', '2018-01-18', 300, 'piece', 'Handcuffs', 'Regular Mechanical Stainless Steel with Key', 800, 'CO', '2023-01-18', 0),
(19, '2018-02-09 12:33:39', '2018-01-20', '2018-01-20', 300, 'piece', 'Telescope', 'Binoculars (Camouflage) ', 2000, 'CO', '2023-01-20', 0),
(20, '2018-02-09 12:37:24', '2018-02-09', '2018-02-09', 200, 'piece', 'Raincoats', 'Waterproof Coats', 200, 'CO', '2018-06-22', 0),
(21, '2018-02-10 18:59:55', '2018-02-01', '2018-02-01', 100, 'box', 'Tong', '12" Silverware, Stainless Steel', 80, 'MOOE', '2018-08-10', 0),
(22, '2018-02-10 19:09:10', '2018-02-02', '2018-02-02', 50, 'piece', 'Pillow', 'Duck Feathers Pillow 20" x 25"', 250, 'MOOE', '2018-08-10', 0),
(23, '2018-02-10 19:13:20', '2018-02-10', '2018-02-10', 30, 'box', 'Nail', '5 inches', 500, 'MOOE', '2021-02-10', 0),
(24, '2018-02-10 19:16:35', '2018-02-10', '2018-02-10', 100, 'piece', 'Notebook', 'Spring Notebook', 59, 'MOOE', '2022-02-10', 0),
(25, '2018-02-10 19:18:35', '2018-02-10', '2018-02-10', 50, 'piece', 'Bag', 'Backpack with free black pencil case', 1500, 'CO', '2022-02-10', 0),
(26, '2018-02-10 19:22:31', '2018-02-10', '2018-02-10', 10, 'piece', 'Table Cloth', '100x50, White', 1500, 'CO', '2021-02-10', 0),
(27, '2018-02-10 19:24:52', '2018-02-10', '2018-02-10', 100, 'box', 'Folder', 'Economic recycled, long folder', 200, 'MOOE', '2018-08-10', 0),
(28, '2018-02-10 19:29:41', '2018-02-10', '2018-02-10', 25, 'dozen', 'Soft Broom ', 'For cleaning per department', 500, 'MOOE', '2021-02-10', 0),
(29, '2018-02-10 19:46:58', '2018-02-10', '2018-02-10', 25, 'piece', 'Flash Drive', '4GB, SanDisk', 350, 'CO', '2023-02-10', 0),
(30, '2018-02-10 19:48:22', '2018-02-10', '2018-02-10', 100, 'piece', 'Towel', 'Alitapa, Blue ', 200, 'CO', '2021-02-10', 0),
(31, '2018-02-10 19:51:21', '2018-02-10', '2018-02-10', 60, 'set', 'Toothbrush', 'Black pink, Hard bristles ', 1500, 'MOOE', '2021-02-10', 0),
(32, '2018-02-10 19:55:35', '2018-02-10', '2018-02-10', 150, 'box', 'Bulb', '2 way, 10 watts ', 6000, 'MOOE', '2021-02-10', 0),
(33, '2018-02-10 19:57:02', '2018-02-10', '2018-02-10', 15, 'piece', 'Wall Clock', 'Round, White, Digital', 450, 'CO', '2019-02-10', 0),
(34, '2018-02-10 20:03:05', '2018-02-10', '2018-02-10', 50, 'ream', 'Paper Plates', 'Dark paperplate with plastic', 150, 'MOOE', '2018-08-10', 0),
(35, '2018-02-10 20:05:43', '2018-02-10', '2018-02-10', 5, 'piece', 'Kettle', 'Stainless, whistling kettle ', 450, 'CO', '2021-02-10', 0),
(36, '2018-02-10 20:10:27', '2018-02-10', '2018-02-10', 50, 'piece', 'Blanket', 'Thick, Comforter', 2000, 'CO', '2020-02-10', 0),
(37, '2018-02-10 20:12:21', '2018-02-10', '2018-02-10', 75, 'dozen', 'Hanger', 'Plastic, pink', 120, 'MOOE', '2019-02-10', 0),
(38, '2018-02-10 20:22:32', '2018-02-11', '2018-02-11', 50, 'piece', 'Military Boots', 'Bullet proof, Water proof, Sturdy Steel Soles', 3000, 'CO', '2028-02-10', 0),
(39, '2018-02-10 20:29:36', '2018-02-14', '2018-02-14', 1000, 'piece', 'Empty Box', '50KG Brown Box\r\n', 30, 'MOOE', '2018-08-14', 0),
(40, '2018-02-10 20:33:33', '2018-02-10', '2018-02-10', 100, 'ream', 'Sticker Paper', 'Long, glossy 8.5 x 13"', 120, 'MOOE', '2018-08-10', 0),
(41, '2018-02-12 08:38:56', '2018-02-05', '2018-02-05', 30, 'piece', 'Stethoscope', 'Classic Stethoscope Cardiology Elite Series', 1900, 'CO', '2023-02-05', 0),
(42, '2018-02-12 08:41:05', '2018-02-05', '2018-02-05', 30, 'box', 'Cotton', 'White Wipe Absorbent Cotton 150 Cotton Balls by 10s', 1000, 'MOOE', '2018-08-05', 0),
(43, '2018-02-12 08:43:03', '2018-02-05', '2018-02-05', 30, 'box', 'Cotton Buds', 'Regular Cotton Buds 150 pcs, by 10s', 1200, 'MOOE', '2018-08-05', 0),
(44, '2018-02-12 08:45:00', '2018-02-05', '2018-02-05', 30, 'piece', 'Thermometer', 'Digital Thermometer', 300, 'CO', '2023-02-05', 0),
(45, '2018-02-12 08:46:49', '2018-02-05', '2018-02-05', 30, 'box', 'Band Aid', 'Band-Aid 100pcs', 150, 'MOOE', '2018-08-05', 0),
(46, '2018-02-12 08:50:28', '2018-02-05', '2018-02-05', 30, 'box', 'Bandage', 'Elastic Bandage 150M by 3s', 800, 'MOOE', '2018-08-05', 0),
(47, '2018-02-12 08:53:15', '2018-02-05', '2018-02-05', 30, 'box', 'Surgical Mask', 'Disposable Surgical Mask 50s', 250, 'MOOE', '2018-08-05', 0),
(48, '2018-02-12 08:54:11', '2018-02-05', '2018-02-05', 30, 'box', 'Surgical Gloves', 'Disposable Rubber Surgical Gloves by 50s', 350, 'MOOE', '2018-08-05', 0),
(49, '2018-02-12 08:56:03', '2018-02-05', '2018-02-05', 30, 'piece', 'Wheel Chair', 'Care & Cure Standard Chrome Adult Wheelchair', 6500, 'CO', '2023-02-05', 0),
(50, '2018-02-12 08:57:53', '2018-02-06', '2018-02-06', 30, 'box', 'Gauze Pads', '4 x 4 Gauze Pads, 100s per box', 200, 'MOOE', '2018-08-06', 0),
(51, '2018-02-12 09:02:08', '2018-02-06', '2018-02-06', 30, 'piece', 'Walker', 'Adult Walker Lightweight Foldable', 2500, 'CO', '2021-02-06', 0),
(52, '2018-02-12 09:11:01', '2018-02-06', '2018-02-06', 30, 'box', 'Syringe', 'Disposable Syringe 30 cc 30mL by 50s', 500, 'MOOE', '2018-08-06', 0),
(53, '2018-02-12 09:14:21', '2018-02-06', '2018-02-06', 10, 'box', 'Toothpick', 'Wooden Toothpick 200 pcs', 35, 'MOOE', '2018-05-06', 0),
(54, '2018-02-12 09:15:46', '2018-02-07', '2018-02-07', 10, 'set', 'Dental Floss', 'Minted Dental Floss 10M by 3s', 360, 'MOOE', '2018-05-07', 0),
(55, '2018-02-12 09:20:59', '2018-02-07', '2018-02-07', 10, 'piece', 'Nebulizer', 'Classic Piston Compressor Nebulizer Set', 1500, 'CO', '2023-02-07', 0),
(56, '2018-02-12 09:30:28', '2018-02-08', '2018-02-08', 3, 'piece', 'Refrigerator', 'Samsung RT-220 1 Door Inverter', 9500, 'CO', '2028-02-08', 0),
(57, '2018-02-12 09:32:06', '2018-02-08', '2018-02-08', 2, 'piece', 'Television', 'Sony 60" 4K Resolution', 95000, 'CO', '2023-02-08', 0),
(58, '2018-02-12 09:33:41', '2018-02-08', '2018-02-08', 3, 'piece', 'Speaker', 'Altec Lansing Speaker 2.1', 2500, 'CO', '2023-02-08', 0),
(59, '2018-02-12 09:35:11', '2018-02-09', '2018-02-09', 5, 'piece', 'Microphone', '5M Wired Microphone', 2500, 'CO', '2021-02-09', 0),
(60, '2018-02-12 09:39:06', '2018-02-10', '2018-02-10', 5, 'piece', 'Vacuum Cleaner', 'LOTUS 10L Dry/Wet Vacuum Cleaner', 3799, 'CO', '2028-02-10', 0),
(61, '2018-02-12 09:43:10', '2018-02-09', '2018-02-09', 2, 'piece', 'Floor Polisher', 'Heavy-duty Floor Buffer', 25000, 'CO', '2023-02-09', 0),
(62, '2018-02-12 09:54:49', '2018-02-10', '2018-02-10', 3, 'piece', 'Printer', 'Canon E345 Print-Scan-Copy', 3000, 'CO', '2021-02-10', 0),
(63, '2018-02-12 09:58:52', '2018-02-10', '2018-02-10', 10, 'dozen', 'Slipper', 'Rubber Slippers', 500, 'MOOE', '2018-08-10', 0),
(64, '2018-02-12 10:03:39', '2018-02-10', '2018-02-10', 5, 'box', 'Batteries', 'AA Everyday Batteries 4 pieces by 10s box', 1300, 'MOOE', '2018-08-10', 0),
(65, '2018-02-12 10:10:49', '2018-02-11', '2018-02-11', 10, 'set', 'Carbon Paper', 'A4 size Carbon Paper, 10s per pack', 90, 'MOOE', '2018-08-11', 0),
(66, '2018-02-12 10:12:45', '2018-02-11', '2018-02-11', 10, 'set', 'Cartolina', 'White Cartolina 10 per pack', 50, 'MOOE', '2018-08-11', 0),
(67, '2018-02-12 10:13:51', '2018-02-11', '2018-02-11', 20, 'set', 'Manila Paper', 'Manila Paper by 10s', 100, 'MOOE', '2018-08-11', 0),
(68, '2018-02-12 10:17:45', '2018-02-11', '2018-02-11', 5, 'piece', 'Bed', 'Wooden Single Bed', 2500, 'CO', '2023-02-11', 0),
(69, '2018-02-12 10:18:44', '2018-02-11', '2018-02-11', 30, 'piece', 'Chair', 'Monoblock Chairs', 500, 'CO', '2020-02-11', 0),
(70, '2018-02-12 10:19:47', '2018-02-11', '2018-02-11', 2, 'piece', 'Closet', 'Wooden 2 door Closet', 5000, 'MOOE', '2023-02-11', 0),
(71, '2018-02-12 10:22:01', '2018-02-11', '2018-02-11', 2, 'piece', 'Book Shelve', 'Wooden Book Shelve', 3000, 'CO', '2023-02-11', 0),
(72, '2018-02-12 10:23:17', '2018-02-11', '2018-02-11', 24, 'piece', 'Picture Frame', 'Wooden Picture Frame 24" x 35"', 1200, 'CO', '2028-02-11', 0),
(73, '2018-02-12 10:25:49', '2018-02-11', '2018-02-11', 10, 'piece', 'Projector', 'Epson E984 Multi-color', 6500, 'CO', '2028-02-11', 0),
(74, '2018-02-12 10:27:52', '2018-02-11', '2018-02-11', 10, 'piece', 'Electric Fan', 'Standard Electric Fan with 2 Feet long Stand', 3500, 'CO', '2023-02-11', 0),
(75, '2018-02-12 10:29:01', '2018-02-11', '2018-02-11', 10, 'piece', 'Exhaust Fan', 'Standard Exhaust Fan', 3500, 'CO', '2023-02-11', 0),
(76, '2018-02-12 10:32:48', '2018-02-11', '2018-02-11', 5, 'piece', 'Gas Stove', 'White-Westinghouse 2 Stove Top', 5000, 'CO', '2023-02-11', 0),
(77, '2018-02-12 10:34:15', '2018-02-11', '2018-02-11', 5, 'piece', 'Electric Oven', 'Panasonic Electric Oven', 7500, 'CO', '2023-02-11', 0),
(78, '2018-02-12 10:37:26', '2018-02-12', '2018-02-12', 2, 'piece', 'Freezer', 'LG IN-98JJ Inverter Freezer', 30000, 'CO', '2028-02-12', 0),
(79, '2018-02-12 10:40:19', '2018-02-12', '2018-02-12', 3, 'piece', 'Griller', 'White-Westinghouse Gas Griller ', 5000, 'CO', '2023-02-12', 0),
(80, '2018-02-12 10:41:29', '2018-02-12', '2018-02-12', 1, 'piece', 'Pantry Closet', 'Glass Door Pantry Closet', 12000, 'CO', '2023-02-12', 0),
(81, '2018-02-12 10:43:02', '2018-02-12', '2018-02-12', 5, 'piece', 'Wok', 'Titanium Heavy Duty Wok', 1200, 'CO', '2028-02-12', 0),
(82, '2018-02-12 10:44:04', '2018-02-12', '2018-02-12', 5, 'piece', 'Frying Pan', 'Titanium Non-stick Frying Pan', 800, 'CO', '2028-02-12', 0);

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
