-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 04:50 AM
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
(3, 4, '3333', 5, '3333', '3333', 3333, 3332, 3333, 3333, 0, 'pcs', '2023-08-14 14:49:41', '2023-08-14 16:39:02'),
(4, 2, '4444451', 44444, '44444', '44444', 44444, 44444, 44444, 44444, 1, 'boxes', '2023-08-14 14:54:58', '2023-08-14 16:38:51'),
(5, 1, '5555555555', 55555, '55555', '55555', 55555, 55555, 55555, 55555, 1, 'box', '2023-08-14 14:58:01', '2023-08-14 16:38:43'),
(6, 12, '6666', 6666, '6666', '66666666', 6664, 6666, 6666, 6666, 1, 'pcs', '2023-08-14 16:38:30', '2023-08-14 16:38:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory_tb`
--
ALTER TABLE `inventory_tb`
  ADD PRIMARY KEY (`InventoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory_tb`
--
ALTER TABLE `inventory_tb`
  MODIFY `InventoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
