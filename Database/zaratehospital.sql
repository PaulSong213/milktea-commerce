-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2023 at 07:38 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zaratehospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_tb`
--

CREATE TABLE `employee_tb` (
  `DatabaseID` int(11) DEFAULT NULL,
  `EmployeeCode` int(11) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `mname` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `position` varchar(100) NOT NULL,
  `maritalStatus` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `bDate` date NOT NULL,
  `nickName` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `dateStart` date NOT NULL,
  `createDate` datetime NOT NULL DEFAULT current_timestamp(),
  `modifiedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_tb`
--

CREATE TABLE `inventory_tb` (
  `InventoryID` int(11) NOT NULL,
  `itemTypeID` int(11) NOT NULL,
  `itemCode` varchar(100) DEFAULT NULL,
  `Unit` int(11) DEFAULT NULL,
  `Description` varchar(300) DEFAULT NULL,
  `Generic` varchar(100) DEFAULT NULL,
  `SugPrice` double DEFAULT NULL,
  `MWprice` double NOT NULL,
  `IPDprice` double NOT NULL,
  `Ppriceuse` double NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Type` varchar(300) NOT NULL DEFAULT 'pcs',
  `createDate` datetime DEFAULT current_timestamp(),
  `modifiedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_tb`
--

INSERT INTO `inventory_tb` (`InventoryID`, `itemTypeID`, `itemCode`, `Unit`, `Description`, `Generic`, `SugPrice`, `MWprice`, `IPDprice`, `Ppriceuse`, `Status`, `Type`, `createDate`, `modifiedDate`) VALUES
(2, 1, 'yyyyyyyyyyyyyyyyy', 0, '111111111', '111111111', 111111111, 111111111, 111111111, 111111111, 1, '111111111', '2021-03-02 00:00:00', '2022-01-11 15:46:56'),
(4, 3, 'Biogesic', 100, 'is a medication that is typically used to relieve mild to moderate pain such as headache, backache, menstrual cramps, muscular strain, minor arthritis pain, toothache, and reduce fevers caused by illnesses such as the common cold and flu.', 'Paracetamol', 40, 10, 10, 10, 1, 'pcs', '2023-02-07 00:00:00', '2023-02-11 12:29:30'),
(5, 5, 'Zyrtec', 100, 'Cetirizine is an antihistamine medicine that helps the symptoms of allergies. It\'s used to treat: hay fever. conjunctivitis (red, itchy eye)', 'Cetirizine', 40, 10, 10, 10, 1, 'pcs', '2023-12-17 00:00:00', '2023-08-11 12:29:30'),
(6, 0, 'azzzzzzzzzzzzzz', 221, 'edited now', '111111', 11111, 11111, 1111, 11111, 1, 'azzzzzzzzzzzzzz', '2023-08-11 00:00:00', '2023-08-14 13:37:21'),
(7, 0, 'xxxxxxxx2141241241214', 111111111, '111111111', '111111111', 111111111, 111111111, 111111111, 111111111, 1, '111111111', '2023-08-11 00:00:00', '2023-08-14 11:49:23'),
(8, 0, 'zzzzzzzzzzzzzzzzzzzzzzz', 2147483647, '22222222222', '22222222222', 22222222222, 22222222222, 22222222222, 22222222222, 1, '22222222222', '2023-08-11 13:46:03', '2023-08-11 16:44:16'),
(9, 0, '878787878787', 111111111, '111111111', '111111111', 111111111, 111111111, 111111111, 111111111, 1, '111111111', '2023-08-11 15:20:19', '2023-08-14 13:28:51'),
(10, 0, 'zyyzyzyyzyz', 111111111, '111111111', '111111111', 111111111, 111111111, 111111111, 111111111, 1, '111111111', '2023-08-11 15:20:41', '2023-08-11 16:44:26'),
(11, 0, 'wwe', 111111111, '111111111', '111111111', 111111111, 111111111, 111111111, 111111111, 1, '111111111', '2023-08-11 15:20:55', '2023-08-14 10:08:30'),
(12, 0, 'rwarwa15555', 111111, '11a', '111111', 111111, 111111, 111111, 111111, 1, 'warawr', '2023-08-11 15:31:50', '2023-08-14 10:14:41'),
(13, 0, '555555555555555555555', 2147483647, '555555555555555555555', '555555555555555555555', 5.5555555555555554e20, 5.555555555555556e17, 5.5555555555555554e20, 5.5555555555555554e20, 1, '555555555555555555555', '2023-08-11 15:48:14', '2023-08-14 13:36:27'),
(14, 0, '3333333333', 2147483647, '3333333333', '3333333333', 3333333333, 3333333333, 3333333333, 3333333333, 1, '3333333333', '2023-08-11 09:51:47', '2023-08-11 09:51:47'),
(15, 0, '1212121212121', 2147483647, '1212121212121', '1212121212121', 1212121212121, 1212121212121, 1212121212121, 1212121212121, 1, '1212121212121', '2023-08-11 10:47:20', '2023-08-11 10:47:20'),
(16, 0, '1212121212121', 2147483647, '1212121212121', '1212121212121', 1212121212121, 1212121212121, 1212121212119, 1212121212121, 1, '1212121212121', '2023-08-11 11:08:19', '2023-08-11 11:08:19'),
(17, 0, '1212121212121', 2147483647, '1212121212121', '1212121212121', 1212121212120, 1212121212121, 1212121212121, 1212121212121, 1, '1212121212121', '2023-08-14 03:58:03', '2023-08-14 03:58:03'),
(18, 0, '1212121212121', 2147483647, '1212121212121', '1212121212121', 1212121212121, 1212121212121, 1212121212121, 1212121212121, 1, '12121212121211212121212121', '2023-08-14 04:01:10', '2023-08-14 04:01:10'),
(19, 0, '1212121212121', 2147483647, '1212121212121', '1212121212121', 1212121212121, 1212121212121, 1212121212121, 1212121212121, 1, '1212121212121', '2023-08-14 04:02:48', '2023-08-14 04:02:48'),
(20, 0, '1212121212121', 2147483647, '1212121212121', '1212121212121', 1212121212121, 1212121212119, 1212121212121, 1212121212121, 1, '1212121212121', '2023-08-14 04:04:26', '2023-08-14 04:04:26'),
(21, 0, '1212121212121', 2147483647, '1212121212121', '1212121212121', 1212121212121, -11212121212121, 1212121212121, 1212121212121, 1, '1212121212121', '2023-08-14 04:06:25', '2023-08-14 04:06:25'),
(22, 0, '1212121212121', 2147483647, '1212121212121', '1212121212121', 1212121212121, 1212121212121, 1212121212121, 1212121212121, 1, '1212121212121', '2023-08-14 04:07:43', '2023-08-14 04:07:43'),
(23, 0, 'yyyyyyyyyyyyyyyyywww123', 123, '123', '123', 122, 123, 123, 123, 1, '123', '2023-08-14 04:13:47', '2023-08-14 04:13:47'),
(24, 0, '1212121212121333', 2147483647, '1212121212121333', '1212121212121333', 1.212121212121333e15, 1.212121212121333e15, 1.212121212121333e15, 1.212121212121333e15, 1, '1212121212121333', '2023-08-14 04:25:41', '2023-08-14 04:25:41'),
(25, 0, '12121212121214444', 2147483647, '12121212121214444', '12121212121214444', 1.2121212121214444e16, 1.2121212121214444e16, 1.2121212121214444e16, 1.2121212121214444e16, 1, '12121212121214444', '2023-08-14 05:49:09', '2023-08-14 05:49:09'),
(26, 0, 'new item', 55, '55', '55', 55, 55, 55, 55, 1, '55', '2023-08-14 06:44:51', '2023-08-14 06:44:51'),
(27, 0, 'new item1', 55, '55', '55', 55, 54, 55, 55, 1, '55', '2023-08-14 12:46:09', '2023-08-14 12:46:09'),
(28, 0, 'check connect', 2147483647, '1212121212121', '1212121212121', 1212121212121, 1212121212121, 1212121212121, 1212121212121, 1, '1212121212121', '2023-08-14 12:49:37', '2023-08-14 12:49:37');

-- --------------------------------------------------------

--
-- Table structure for table `itemtype_tb`
--

CREATE TABLE `itemtype_tb` (
  `itemTypeID` int(11) NOT NULL,
  `itemTypeCode` varchar(120) NOT NULL,
  `description` varchar(250) NOT NULL,
  `createDate` datetime NOT NULL DEFAULT current_timestamp(),
  `modifiedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `itemtype_tb`
--

INSERT INTO `itemtype_tb` (`itemTypeID`, `itemTypeCode`, `description`, `createDate`, `modifiedDate`) VALUES
(1, 'X-Ray', '', '2023-08-14 10:55:56', '2023-08-14 10:55:56'),
(2, 'ELoad', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availabl', '2023-08-14 10:56:33', '2023-08-14 10:56:33'),
(3, 'US - Ultra Sound', 'UltraSound', '2023-08-14 11:11:58', '2023-08-14 11:11:58'),
(4, 'US - Ultra Sound', 'US - Ultra Sound', '2023-08-14 13:22:57', '2023-08-14 13:22:57'),
(5, 'US - Ultra Sound', 'US - Ultra Sound', '2023-08-14 13:23:02', '2023-08-14 13:23:02'),
(6, 'US - Ultra Sound', 'US - Ultra Sound', '2023-08-14 13:23:06', '2023-08-14 13:23:06'),
(7, 'US - Ultra Sound', 'US - Ultra Sound', '2023-08-14 13:23:09', '2023-08-14 13:23:09'),
(8, 'US - Ultra Sound', 'US - Ultra Sound', '2023-08-14 13:23:13', '2023-08-14 13:23:13'),
(9, 'US - Ultra Sound', 'US - Ultra Sound', '2023-08-14 13:23:18', '2023-08-14 13:23:18'),
(10, 'US - Ultra Sound', 'US - Ultra Sound', '2023-08-14 13:23:23', '2023-08-14 13:23:23'),
(11, 'US - Ultra Sound', 'US - Ultra Sound', '2023-08-14 13:23:26', '2023-08-14 13:23:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory_tb`
--
ALTER TABLE `inventory_tb`
  ADD PRIMARY KEY (`InventoryID`);

--
-- Indexes for table `itemtype_tb`
--
ALTER TABLE `itemtype_tb`
  ADD PRIMARY KEY (`itemTypeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory_tb`
--
ALTER TABLE `inventory_tb`
  MODIFY `InventoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `itemtype_tb`
--
ALTER TABLE `itemtype_tb`
  MODIFY `itemTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
