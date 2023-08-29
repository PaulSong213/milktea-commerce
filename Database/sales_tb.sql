-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2023 at 09:35 AM
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
-- Table structure for table `sales_tb`
--

CREATE TABLE `sales_tb` (
  `SalesID` int(11) NOT NULL,
  `ProductInfo` text NOT NULL,
  `NetSale` int(11) NOT NULL,
  `AddDisc` int(11) NOT NULL,
  `AddDiscAmt` int(11) NOT NULL,
  `NetAmt` int(11) NOT NULL,
  `AmtTendered` int(11) NOT NULL,
  `ChangeAmt` int(11) NOT NULL,
  `PatientAcct` int(11) NOT NULL,
  `RequestedName` int(11) NOT NULL,
  `EnteredName` int(11) NOT NULL,
  `billingID` int(11) DEFAULT NULL,
  `PatientType` varchar(11) NOT NULL,
  `createDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_tb`
--

INSERT INTO `sales_tb` (`SalesID`, `ProductInfo`, `NetSale`, `AddDisc`, `AddDiscAmt`, `NetAmt`, `AmtTendered`, `ChangeAmt`, `PatientAcct`, `RequestedName`, `EnteredName`, `billingID`, `PatientType`, `createDate`) VALUES
(110, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 780, 0, 0, 780, 999, 219, 2, 20, 20, 14, 'IPD', '2023-08-29 14:57:51'),
(111, '[{\"subtotal\":\"350.00\",\"product_id\":\"LAB***ALBUMIN\",\"qty\":\"1\",\"price\":\"350\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"5\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 350, 0, 0, 350, 9999, 9649, 1, 20, 20, 14, 'IPD', '2023-08-29 15:06:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sales_tb`
--
ALTER TABLE `sales_tb`
  ADD PRIMARY KEY (`SalesID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sales_tb`
--
ALTER TABLE `sales_tb`
  MODIFY `SalesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
