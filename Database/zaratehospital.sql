-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2023 at 07:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `createDate` date DEFAULT current_timestamp(),
  `modifiedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_tb`
--

INSERT INTO `inventory_tb` (`InventoryID`, `itemTypeID`, `itemCode`, `Unit`, `Description`, `Generic`, `SugPrice`, `MWprice`, `IPDprice`, `Ppriceuse`, `Status`, `Type`, `createDate`, `modifiedDate`) VALUES
(2, 1, 'Neozep', 100, 'This medicine is used for the relief of clogged nose, postnasal drip, headache, body aches, and fever associated with the common cold, sinusitis, flu, and other minor respiratory tract infections. ', 'Chlorphenamine Maleate', 50, 50, 10, 20, 1, 'pcs', '2023-03-02', '2023-08-11 12:29:30'),
(4, 3, 'Biogesic', 100, 'is a medication that is typically used to relieve mild to moderate pain such as headache, backache, menstrual cramps, muscular strain, minor arthritis pain, toothache, and reduce fevers caused by illnesses such as the common cold and flu.', 'Paracetamol', 40, 10, 10, 10, 1, 'pcs', '2023-08-07', '2023-08-11 12:29:30'),
(5, 5, 'Zyrtec', 100, 'Cetirizine is an antihistamine medicine that helps the symptoms of allergies. It\'s used to treat: hay fever. conjunctivitis (red, itchy eye)', 'Cetirizine', 40, 10, 10, 10, 1, 'pcs', '2023-12-17', '2023-08-11 12:29:30');

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
  MODIFY `InventoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
