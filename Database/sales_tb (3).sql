-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2023 at 08:24 AM
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
--X

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
  `PatientAcct` varchar(300) NOT NULL,
  `RequestedName` varchar(300) NOT NULL,
  `EnteredName` varchar(300) NOT NULL,
  `PatientType` varchar(11) NOT NULL,
  `createDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_tb`
--

INSERT INTO `sales_tb` (`SalesID`, `ProductInfo`, `NetSale`, `AddDisc`, `AddDiscAmt`, `NetAmt`, `AmtTendered`, `ChangeAmt`, `PatientAcct`, `RequestedName`, `EnteredName`, `PatientType`, `createDate`) VALUES
(60, '[{\"subtotal\":\"4.99\",\"product_id\":\"MedicalGloves\",\"qty\":\"1\",\"price\":\"4.99\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"16\",\"unit\":\"box\",\"itemType\":\"SO SO-Lab\",\"itemTypeID\":\"12\"}]', 5, 0, 0, 5, 99, 94, 'test', 'test', 'test', '0', '2023-08-21 11:05:37'),
(61, '[{\"subtotal\":\"500000.00\",\"product_id\":\"XRayMachine\",\"qty\":\"2\",\"price\":\"250000\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"17\",\"unit\":\"set\",\"itemType\":\"SO SO-Lab\",\"itemTypeID\":\"12\"}]', 500000, 0, 0, 500000, 999999, 499999, 'test', 'test', 'test', '0', '2023-08-21 11:10:16'),
(62, '[{\"subtotal\":\"4.99\",\"product_id\":\"MedicalGloves\",\"qty\":\"1\",\"price\":\"4.99\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"16\",\"unit\":\"box\",\"itemType\":\"SO SO-Lab\",\"itemTypeID\":\"12\"}]', 5, 0, 0, 5, 9999, 9994, 'test', 'test', 'test', '0', '2023-08-21 11:11:12'),
(63, '[{\"subtotal\":\"4.99\",\"product_id\":\"MedicalGloves\",\"qty\":\"1\",\"price\":\"4.99\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"16\",\"unit\":\"box\",\"itemType\":\"SO SO-Lab\",\"itemTypeID\":\"12\"}]', 5, 0, 0, 5, 9999, 9994, 'test', 'test', 'test', '0', '2023-08-21 11:12:29'),
(64, '[{\"subtotal\":\"4.99\",\"product_id\":\"MedicalGloves\",\"qty\":\"1\",\"price\":\"4.99\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"16\",\"unit\":\"box\",\"itemType\":\"SO SO-Lab\",\"itemTypeID\":\"12\"}]', 5, 0, 0, 5, 9999, 9994, 'test', 'test', 'test', '0', '2023-08-21 11:12:47'),
(65, '[{\"subtotal\":\"4.99\",\"product_id\":\"MedicalGloves\",\"qty\":\"1\",\"price\":\"4.99\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"16\",\"unit\":\"box\",\"itemType\":\"SO SO-Lab\",\"itemTypeID\":\"12\"}]', 5, 0, 0, 5, 9999, 9994, 'test', 'test', 'test', '0', '2023-08-21 11:14:11'),
(66, '[{\"subtotal\":\"4.99\",\"product_id\":\"MedicalGloves\",\"qty\":\"1\",\"price\":\"4.99\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"16\",\"unit\":\"box\",\"itemType\":\"SO SO-Lab\",\"itemTypeID\":\"12\"}]', 5, 0, 0, 5, 999, 994, 'test', 'test', 'test', '0', '2023-08-21 11:14:42'),
(67, '[{\"subtotal\":\"4.99\",\"product_id\":\"MedicalGloves\",\"qty\":\"1\",\"price\":\"4.99\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"16\",\"unit\":\"box\",\"itemType\":\"SO SO-Lab\",\"itemTypeID\":\"12\"}]', 5, 0, 0, 5, 0, -5, 'test', 'test', 'test', '0', '2023-08-21 11:15:40'),
(68, '[{\"subtotal\":\"4.99\",\"product_id\":\"MedicalGloves\",\"qty\":\"1\",\"price\":\"4.99\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"16\",\"unit\":\"box\",\"itemType\":\"SO SO-Lab\",\"itemTypeID\":\"12\"}]', 5, 0, 0, 5, 0, -5, 'test', 'test', 'test', '0', '2023-08-21 11:15:51'),
(69, '[{\"subtotal\":\"4.99\",\"product_id\":\"MedicalGloves\",\"qty\":\"1\",\"price\":\"4.99\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"16\",\"unit\":\"box\",\"itemType\":\"SO SO-Lab\",\"itemTypeID\":\"12\"}]', 5, 0, 0, 5, 0, -5, 'test', 'test', 'test', '0', '2023-08-21 11:16:03'),
(70, '[{\"subtotal\":\"4.99\",\"product_id\":\"MedicalGloves\",\"qty\":\"1\",\"price\":\"4.99\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"16\",\"unit\":\"box\",\"itemType\":\"SO SO-Lab\",\"itemTypeID\":\"12\"}]', 5, 0, 0, 5, 0, -5, 'test', 'test', 'test', '0', '2023-08-21 11:16:52'),
(71, '[{\"subtotal\":\"4.99\",\"product_id\":\"MedicalGloves\",\"qty\":\"1\",\"price\":\"4.99\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"16\",\"unit\":\"box\",\"itemType\":\"SO SO-Lab\",\"itemTypeID\":\"12\"}]', 5, 0, 0, 5, 0, -5, 'test', 'test', 'test', '0', '2023-08-21 11:18:16'),
(72, '[{\"subtotal\":\"4.99\",\"product_id\":\"MedicalGloves\",\"qty\":\"1\",\"price\":\"4.99\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"16\",\"unit\":\"box\",\"itemType\":\"SO SO-Lab\",\"itemTypeID\":\"12\"}]', 5, 0, 0, 5, 0, -5, 'test', 'test', 'test', '0', '2023-08-21 11:18:47'),
(73, '[{\"subtotal\":\"4.99\",\"product_id\":\"MedicalGloves\",\"qty\":\"1\",\"price\":\"4.99\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"16\",\"unit\":\"box\",\"itemType\":\"SO SO-Lab\",\"itemTypeID\":\"12\"}]', 5, 0, 0, 5, 999, 994, 'test', 'test', 'test', '0', '2023-08-21 11:19:09'),
(74, '[{\"subtotal\":\"16.50\",\"product_id\":\"Syringe25ml\",\"qty\":\"11\",\"price\":\"1.5\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"18\",\"unit\":\"piece\",\"itemType\":\"X-Ray1\",\"itemTypeID\":\"1\"},{\"subtotal\":\"1250000.00\",\"product_id\":\"XRayMachine\",\"qty\":\"5\",\"price\":\"250000\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"17\",\"unit\":\"set\",\"itemType\":\"SO SO-Lab\",\"itemTypeID\":\"12\"}]', 1250017, 0, 0, 1250017, 100, -1249917, 'test', 'test', 'test', '0', '2023-08-21 11:23:32'),
(75, '[{\"subtotal\":\"4.94\",\"product_id\":\"MedicalGloves\",\"qty\":\"1\",\"price\":\"4.99\",\"disc_percent\":\"1\",\"disc_amt\":\"0.05\",\"id\":\"16\",\"unit\":\"box\",\"itemType\":\"SO SO-Lab\",\"itemTypeID\":\"12\"}]', 5, 0, 0, 5, 1, -4, 'test', 'test', 'test', '0', '2023-08-21 11:29:15'),
(76, '[{\"subtotal\":\"4.94\",\"product_id\":\"MedicalGloves\",\"qty\":\"1\",\"price\":\"4.99\",\"disc_percent\":\"1\",\"disc_amt\":\"0.05\",\"id\":\"16\",\"unit\":\"box\",\"itemType\":\"SO SO-Lab\",\"itemTypeID\":\"12\"}]', 5, 0, 0, 5, 0, -5, 'test', 'test', 'v', '0', '2023-08-21 11:29:42'),
(77, '[{\"subtotal\":\"4.94\",\"product_id\":\"MedicalGloves\",\"qty\":\"1\",\"price\":\"4.99\",\"disc_percent\":\"1\",\"disc_amt\":\"0.05\",\"id\":\"16\",\"unit\":\"box\",\"itemType\":\"SO SO-Lab\",\"itemTypeID\":\"12\"}]', 5, 0, 0, 5, 0, -5, 'test', 'test', 'test', '0', '2023-08-21 11:29:58'),
(78, '[{\"subtotal\":\"14.97\",\"product_id\":\"MedicalGloves\",\"qty\":\"3\",\"price\":\"4.99\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"16\",\"unit\":\"box\",\"itemType\":\"SO SO-Lab\",\"itemTypeID\":\"12\"},{\"subtotal\":\"750000.00\",\"product_id\":\"XRayMachine\",\"qty\":\"3\",\"price\":\"250000\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"17\",\"unit\":\"set\",\"itemType\":\"SO SO-Lab\",\"itemTypeID\":\"12\"}]', 750015, 0, 0, 750015, 99999999, 99249984, 'test', 'test', 'test', '0', '2023-08-21 11:33:35'),
(79, '[{\"subtotal\":\"14.97\",\"product_id\":\"MedicalGloves\",\"qty\":\"3\",\"price\":\"4.99\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"16\",\"unit\":\"box\",\"itemType\":\"SO SO-Lab\",\"itemTypeID\":\"12\"},{\"subtotal\":\"1750000.00\",\"product_id\":\"XRayMachine\",\"qty\":\"7\",\"price\":\"250000\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"17\",\"unit\":\"set\",\"itemType\":\"SO SO-Lab\",\"itemTypeID\":\"12\"},{\"subtotal\":\"15.00\",\"product_id\":\"Syringe25ml\",\"qty\":\"10\",\"price\":\"1.5\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"18\",\"unit\":\"piece\",\"itemType\":\"X-Ray1\",\"itemTypeID\":\"1\"}]', 1750030, 0, 0, 1750030, 99999999, 98249969, 'test', 'test', 'test', '0', '2023-08-21 11:35:13'),
(80, '[{\"subtotal\":\"0.00\",\"product_id\":\"Syringe25ml\",\"qty\":\"\",\"price\":\"1.5\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"18\",\"unit\":\"piece\",\"itemType\":\"X-Ray1\",\"itemTypeID\":\"1\"}]', 0, 0, 0, 0, 9999, 9999, 'test', 'test', '111', '0', '2023-08-21 17:15:16'),
(81, '[]', 0, 0, 0, 0, 9999, 9999, 'test', 'test', 'test', '0', '2023-08-21 17:15:40'),
(82, '[{\"subtotal\":\"0.00\",\"product_id\":\"Syringe25ml\",\"qty\":\"\",\"price\":\"1.5\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"18\",\"unit\":\"piece\",\"itemType\":\"X-Ray1\",\"itemTypeID\":\"1\"}]', 0, 0, 0, 0, 9999, 9999, 'test', 'test', 'test', '0', '2023-08-21 17:16:03'),
(83, '[{\"subtotal\":\"2089.57\",\"product_id\":\"LAB*ETROPONIN-T\",\"qty\":\"1\",\"price\":\"2110.68\",\"disc_percent\":\"1\",\"disc_amt\":\"21.11\",\"id\":\"1\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 2090, 0, 0, 2090, 9999, 7909, 'TestLname,TestFname TestMname', 'Mr.. Songalia,John Relente | Administrator | 16', 'test', '0', '2023-08-22 15:19:37'),
(84, '[{\"subtotal\":\"850.00\",\"product_id\":\"LAB***AMY\",\"qty\":\"1\",\"price\":\"850\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"8\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 850, 0, 0, 850, 999, 149, 'Test,Test Test | ID: 1', 'Mr.. Songalia,John Relente | Administrator | 16', 'test', '0', '2023-08-22 16:25:07'),
(85, '[{\"subtotal\":\"850.00\",\"product_id\":\"LAB***AMY\",\"qty\":\"1\",\"price\":\"850\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"8\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"},{\"subtotal\":\"300.00\",\"product_id\":\"LAB***ALK\",\"qty\":\"1\",\"price\":\"300\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 1150, 0, 0, 1150, 9999, 8849, 'sample,sample sample | ID: 2', 'Mr.. Songalia,John Relente | Administrator | 16', 'test', '0', '2023-08-22 16:48:50'),
(86, '[{\"subtotal\":\"350.00\",\"product_id\":\"LAB***AFB(SPUTUM)\",\"qty\":\"1\",\"price\":\"350\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"4\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"},{\"subtotal\":\"76.00\",\"product_id\":\"ADULTDIAPERLARGE\",\"qty\":\"2\",\"price\":\"38\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"1523\",\"unit\":\"PCS\",\"itemType\":\"S - Supplies\",\"itemTypeID\":\"45\"}]', 426, 0, 0, 426, 9999, 9573, 'TestLname,TestFname TestMname | ID: 3', 'Mr.. Songalia,John Relente | Administrator | 16', 'test', '0', '2023-08-23 09:07:56'),
(87, '[{\"subtotal\":\"300.00\",\"product_id\":\"LAB***ALK\",\"qty\":\"1\",\"price\":\"300\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 300, 0, 0, 300, 999, 699, 'Test,Test Test | ID: 1', 'Mr.. Songalia,John Relente | Administrator | 16', 'Test', '0', '2023-08-23 10:02:39'),
(88, '[{\"subtotal\":\"300.00\",\"product_id\":\"LAB***ALK\",\"qty\":\"1\",\"price\":\"300\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 300, 0, 0, 300, 999, 699, 'sample,sample sample | ID: 2', 'Mr.. Songalia,John Relente | Administrator | 16', 'John Doe', '0', '2023-08-23 13:13:08'),
(89, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 780, 999, 7792, -7012, 9998, 17010, 'sample,sample sample | ID: 2', 'teteaafasf', 'tetete', '0', '2023-08-24 11:33:01'),
(90, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 780, 0, 0, 780, 11111, 10331, 'sample,sample sample | ID: 2', 'Test. Johnny1,Bravo Great | System | 17', 'System', '0', '2023-08-25 11:48:23'),
(91, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 780, 0, 0, 780, 1111, 331, 'Test,Test Test | ID: 1', 'Mr.. Songalia,John Relente | Administrator | 16', 'System', '0', '2023-08-25 11:49:59'),
(92, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 780, 0, 0, 780, 1111, 331, 'sample,sample sample | ID: 2', 'Test,Test Test | ID: 1', 'System', 'CASH', '2023-08-25 13:49:15');

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
  MODIFY `SalesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
