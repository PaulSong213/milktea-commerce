-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2023 at 09:54 AM
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
  `UnitType` varchar(300) NOT NULL DEFAULT 'pcs',
  `createDate` datetime DEFAULT current_timestamp(),
  `modifiedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_tb`
--

INSERT INTO `inventory_tb` (`InventoryID`, `itemTypeID`, `itemCode`, `Unit`, `Description`, `Generic`, `SugPrice`, `MWprice`, `IPDprice`, `Ppriceuse`, `Status`, `UnitType`, `createDate`, `modifiedDate`) VALUES
(3, 4, '3333', 5, '3333', '3333', 3333, 3332, 3333, 3333, 0, 'pcs', '2023-08-14 14:49:41', '2023-08-14 15:09:32'),
(4, 2, '4444451', 44444, '44444', '44444', 44444, 44444, 44444, 44444, 1, 'boxes', '2023-08-14 14:54:58', '2023-08-14 15:16:03'),
(5, 1, '555555555555555555555', 55555, '55555', '55555', 55555, 55555, 55555, 55555, 0, 'box', '2023-08-14 14:58:01', '2023-08-14 15:08:42');

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
(1, 'X-Ray', '', '2023-08-14 10:55:56', '2023-08-14 15:33:51'),
(2, 'ELoad', 'Publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availabl', '2023-08-14 10:56:33', '2023-08-14 15:50:44'),
(4, 'US - Ultra Sound', 'Ultra Sound', '2023-08-14 13:22:57', '2023-08-14 13:22:57'),
(12, 'SO SO-Lab', 'LABORATORY', '2023-08-14 15:23:40', '2023-08-14 15:23:40'),
(13, 'Mental Hospital', '', '2023-08-14 15:33:57', '2023-08-14 15:34:08'),
(14, 'Labor', 'Labor', '2023-08-14 15:51:04', '2023-08-14 15:51:04');

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
  MODIFY `InventoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `itemtype_tb`
--
ALTER TABLE `itemtype_tb`
  MODIFY `itemTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
