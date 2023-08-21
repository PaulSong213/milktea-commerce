-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 05:22 AM
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
-- Table structure for table `sales_tb`
--

CREATE TABLE `sales_tb` (
  `SalesID` int(11) NOT NULL,
  `ProductInfo` text NOT NULL,
  `NetSale` decimal(11,0) NOT NULL,
  `AddDisc` decimal(11,0) NOT NULL,
  `AddDiscAmt` decimal(11,0) NOT NULL,
  `NetAmt` decimal(11,0) NOT NULL,
  `AmtTendered` decimal(11,0) NOT NULL,
  `ChangeAmt` decimal(11,0) NOT NULL,
  `PatientAcct` varchar(300) NOT NULL,
  `RequestedName` varchar(300) NOT NULL,
  `EnteredName` varchar(300) NOT NULL,
  `createDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_tb`
--

INSERT INTO `sales_tb` (`SalesID`, `ProductInfo`, `NetSale`, `AddDisc`, `AddDiscAmt`, `NetAmt`, `AmtTendered`, `ChangeAmt`, `PatientAcct`, `RequestedName`, `EnteredName`, `createDate`) VALUES
(1, 'hakdog', 1, 1, 1, 1, 1, 1, 'Joshua', 'Sarge', 'Joshua', '2023-08-16 06:36:44'),
(2, 'haha', 1, 1, 1, 1, 1, 1, 'John Paul', 'Joshua', 'Sarge', '2023-08-16 06:37:42'),
(3, '[{\"product_id\":\"dawd\",\"qty\":\"1\",\"price\":\"100\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\"}]', 100, 0, 0, 100, 0, -100, 'dwada', 'adwwa', 'awdaw', '2023-08-16 15:19:47'),
(4, '[{\"product_id\":\"\",\"qty\":\"\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"},{\"product_id\":\"DAWD\",\"qty\":\"1\",\"price\":\"100\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"}]', 100, 0, 0, 100, 1000, 900, 'ADAW', 'ADAW', 'ADAW', '2023-08-16 16:07:42'),
(5, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"},{\"subtotal\":\"100.00\",\"product_id\":\"SARGE\",\"qty\":\"1\",\"price\":\"100\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"}]', 100, 0, 0, 100, 100, 0, 'MALU', 'MALU', 'MALU', '2023-08-16 16:12:26'),
(6, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"},{\"subtotal\":\"100.00\",\"product_id\":\"Joshua\",\"qty\":\"1\",\"price\":\"100\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"},{\"subtotal\":\"100.00\",\"product_id\":\"Sarge\",\"qty\":\"1\",\"price\":\"100\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"}]', 200, 0, 0, 200, 200, 0, 'MALU', 'MALU', 'MALU', '2023-08-16 16:16:08'),
(7, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"},{\"subtotal\":\"22.00\",\"product_id\":\"dada\",\"qty\":\"11\",\"price\":\"2\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"},{\"subtotal\":\"33.00\",\"product_id\":\"DAWD\",\"qty\":\"11\",\"price\":\"3\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"},{\"subtotal\":\"33.00\",\"product_id\":\"11\",\"qty\":\"11\",\"price\":\"3\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"}]', 88, 0, 0, 88, 900, 812, 'Jusmiyo', 'ADAW', 'MALU', '2023-08-16 16:17:20'),
(8, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"},{\"subtotal\":\"100.00\",\"product_id\":\"Joshua\",\"qty\":\"1\",\"price\":\"100\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"},{\"subtotal\":\"100.00\",\"product_id\":\"Sarge\",\"qty\":\"1\",\"price\":\"100\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"},{\"subtotal\":\"100.00\",\"product_id\":\"Paul\",\"qty\":\"1\",\"price\":\"100\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"}]', 300, 0, 0, 300, 400, 100, 'malu', 'MALU', 'MALU', '2023-08-16 16:18:38'),
(9, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"},{\"subtotal\":\"0.00\",\"product_id\":\"AMOXICILIN\",\"qty\":\"1\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"}]', 0, 0, 0, 0, 100, 100, 'Joshua', 'Joshua', 'Joshua', '2023-08-17 11:35:08'),
(10, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"},{\"subtotal\":\"20.00\",\"product_id\":\"AMOXICILIN\",\"qty\":\"2\",\"price\":\"10\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"}]', 20, 0, 0, 20, 100, 80, 'Jusmiyo', 'ADAW', 'ADAW', '2023-08-17 11:58:42'),
(11, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"},{\"subtotal\":\"20.00\",\"product_id\":\"AMOXICILIN\",\"qty\":\"2\",\"price\":\"10\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"}]', 20, 0, 0, 20, 100, 80, 'Jusmiyo', 'ADAW', 'ADAW', '2023-08-17 11:58:53'),
(12, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"},{\"subtotal\":\"20.00\",\"product_id\":\"AMOXICILIN\",\"qty\":\"2\",\"price\":\"10\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"}]', 20, 0, 0, 20, 100, 80, 'Jusmiyo', 'ADAW', 'ADAW', '2023-08-17 12:00:10'),
(13, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"},{\"subtotal\":\"1000.00\",\"product_id\":\"AMOXICILIN\",\"qty\":\"100\",\"price\":\"10\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"}]', 1000, 0, 0, 1000, 10000, 9000, 'MALU', 'ADAW', 'MALU', '2023-08-17 12:01:14'),
(14, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"},{\"subtotal\":\"10.00\",\"product_id\":\"AMOXICILIN\",\"qty\":\"1\",\"price\":\"10\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"},{\"subtotal\":\"10.00\",\"product_id\":\"AMOXICILIN\",\"qty\":\"1\",\"price\":\"10\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"}]', 20, 0, 0, 20, 100, 80, 'Jusmiyo', 'Joshua', 'Joshua', '2023-08-17 12:07:51'),
(15, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"},{\"subtotal\":\"10.00\",\"product_id\":\"AMOXICILIN\",\"qty\":\"1\",\"price\":\"10\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"}]', 10, 0, 0, 10, 100, 90, 'Jusmiyo', 'MALU', 'Joshua', '2023-08-17 12:43:18'),
(16, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"},{\"subtotal\":\"10.00\",\"product_id\":\"AMOXICILIN\",\"qty\":\"1\",\"price\":\"10\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"}]', 10, 0, 0, 10, 100, 90, 'MALU', 'MALU', 'MALU', '2023-08-17 12:47:00'),
(17, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"},{\"subtotal\":\"55555.00\",\"product_id\":\"5555555555\",\"qty\":\"1\",\"price\":\"55555\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"}]', 55555, 0, 0, 55555, 55555, 0, 'MALU', 'MALU', 'MALU', '2023-08-18 11:36:32'),
(18, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"},{\"subtotal\":\"20.00\",\"product_id\":\"AMOXICILIN\",\"qty\":\"2\",\"price\":\"10\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"}]', 20, 0, 0, 20, 111, 91, 'daw', 'awd', 'awd', '2023-08-18 12:02:26'),
(19, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"},{\"subtotal\":\"20.00\",\"product_id\":\"AMOXICILIN\",\"qty\":\"2\",\"price\":\"10\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\"}]', 20, 0, 0, 20, 111, 91, 'daw', 'awd', 'awd', '2023-08-18 13:20:00'),
(20, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"\"},{\"subtotal\":\"88888.00\",\"product_id\":\"4444451\",\"qty\":\"2\",\"price\":\"44444\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"4\"}]', 88888, 0, 0, 88888, 88888, 0, 'malu', 'malu', 'malu', '2023-08-18 13:44:29'),
(21, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"\"},{\"subtotal\":\"44444.00\",\"product_id\":\"4444451\",\"qty\":\"1\",\"price\":\"44444\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"4\"},{\"subtotal\":\"44444.00\",\"product_id\":\"4444451\",\"qty\":\"1\",\"price\":\"44444\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"4\"}]', 88888, 0, 0, 88888, 88888, 0, 'DAW', 'AWD', 'AWD', '2023-08-18 14:08:11'),
(22, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"\",\"itemType\":\"\"},{\"subtotal\":\"44444.00\",\"product_id\":\"4444451\",\"qty\":\"1\",\"price\":\"44444\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"4\",\"itemType\":\"ELoad\"}]', 44444, 10, 4444, 40000, 44444, 4444, 'awda', 'awdwa', 'awdaw', '2023-08-18 14:11:40'),
(23, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"\",\"itemType\":\"\"},{\"subtotal\":\"6664.00\",\"product_id\":\"6666\",\"qty\":\"1\",\"price\":\"6664\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"itemType\":\"SO SO-Lab\"}]', 6664, 0, 0, 6664, 10000, 3336, 'daw', 'awd', 'awd', '2023-08-18 14:15:22'),
(24, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"\",\"itemType\":\"\"},{\"subtotal\":\"55555.00\",\"product_id\":\"5555555555\",\"qty\":\"1\",\"price\":\"55555\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"5\",\"itemType\":\"X-Ray\"}]', 55555, 0, 0, 55555, 1000, -54555, 'daw', 'awdaw', 'dawd', '2023-08-18 14:30:23'),
(25, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"0\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"\",\"unit\":null,\"itemType\":\"\"},{\"subtotal\":\"55555.00\",\"product_id\":\"5555555555\",\"qty\":\"1\",\"price\":\"55555\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"5\",\"unit\":null,\"itemType\":\"X-Ray\"}]', 55555, 0, 0, 55555, 1000000, 944445, 'daw', 'awd', 'awd', '2023-08-18 15:06:23'),
(26, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"0\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"\",\"unit\":null,\"itemType\":\"\"},{\"subtotal\":\"54999.45\",\"product_id\":\"5555555555\",\"qty\":\"1\",\"price\":\"55555\",\"disc_percent\":\"1\",\"disc_amt\":\"555.55\",\"id\":\"5\",\"unit\":null,\"itemType\":\"X-Ray\"}]', 54999, 0, 0, 54999, 100000000, 99945001, 'adw', 'awd', 'awd', '2023-08-18 15:07:22'),
(27, '[{\"subtotal\":\"\",\"product_id\":\"\",\"qty\":\"0\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"\",\"id\":\"\",\"unit\":null,\"itemType\":\"\"},{\"subtotal\":\"0.00\",\"product_id\":\"AMOXICILIN\",\"qty\":\"\",\"price\":\"10\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":null,\"itemType\":\"\"},{\"subtotal\":\"0.00\",\"product_id\":\"4444451\",\"qty\":\"\",\"price\":\"44444\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"4\",\"unit\":null,\"itemType\":\"ELoad\"}]', 0, 0, 0, 0, 0, 0, 'daw', 'awd', 'awd', '2023-08-18 15:08:21'),
(28, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"0\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"\",\"unit\":null,\"itemType\":\"\"},{\"subtotal\":\"54999.45\",\"product_id\":\"5555555555\",\"qty\":\"1\",\"price\":\"55555\",\"disc_percent\":\"1\",\"disc_amt\":\"555.55\",\"id\":\"5\",\"unit\":null,\"itemType\":\"X-Ray\"}]', 54999, 0, 0, 54999, 100000, 45001, 'wda', 'awd', 'awd', '2023-08-18 15:08:54'),
(29, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"0\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"\",\"unit\":\"\",\"itemType\":\"\"},{\"subtotal\":\"55555.00\",\"product_id\":\"5555555555\",\"qty\":\"1\",\"price\":\"55555\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"5\",\"unit\":\"box\",\"itemType\":\"X-Ray\"}]', 55555, 0, 0, 55555, 100000, 44445, 'awd', 'awd', 'wad', '2023-08-18 15:33:43'),
(30, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"0\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"\",\"unit\":\"\",\"itemType\":\"\"},{\"subtotal\":\"55555.00\",\"product_id\":\"5555555555\",\"qty\":\"1\",\"price\":\"55555\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"5\",\"unit\":\"box\",\"itemType\":\"X-Ray\"}]', 55555, 0, 0, 55555, 1000000, 944445, 'Joshua', 'Paul', 'Paul', '2023-08-18 15:58:48'),
(31, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"0\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"\",\"unit\":\"\",\"itemType\":\"\",\"itemTypeID\":\"\"},{\"subtotal\":\"5997.60\",\"product_id\":\"6666\",\"qty\":\"1\",\"price\":\"6664\",\"disc_percent\":\"10\",\"disc_amt\":\"666.40\",\"id\":\"6\",\"unit\":\"pcs\",\"itemType\":\"SO SO-Lab\",\"itemTypeID\":\"12\"}]', 5998, 0, 0, 5998, 10000, 4002, 'Paul', 'Paul', 'Joshua', '2023-08-18 16:00:35'),
(32, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"1\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"\",\"unit\":\"\",\"itemType\":\"\",\"itemTypeID\":\"\"},{\"subtotal\":\"44444.00\",\"product_id\":\"4444451\",\"qty\":\"1\",\"price\":\"44444\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"4\",\"unit\":\"boxes\",\"itemType\":\"ELoad\",\"itemTypeID\":\"2\"},{\"subtotal\":\"88888.00\",\"product_id\":\"4444451\",\"qty\":\"2\",\"price\":\"44444\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"4\",\"unit\":\"boxes\",\"itemType\":\"ELoad\",\"itemTypeID\":\"2\"}]', 133332, 0, 0, 133332, 1000000, 866668, 'Joshua', 'Joshua', 'Malou', '2023-08-21 09:34:46'),
(33, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"1\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"\",\"unit\":\"\",\"itemType\":\"\",\"itemTypeID\":\"\"},{\"subtotal\":\"44444.00\",\"product_id\":\"4444451\",\"qty\":\"1\",\"price\":\"44444\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"4\",\"unit\":\"boxes\",\"itemType\":\"ELoad\",\"itemTypeID\":\"2\"},{\"subtotal\":\"88888.00\",\"product_id\":\"4444451\",\"qty\":\"2\",\"price\":\"44444\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"4\",\"unit\":\"boxes\",\"itemType\":\"ELoad\",\"itemTypeID\":\"2\"}]', 133332, 0, 0, 133332, 1000000, 866668, 'Joshua', 'Joshua', 'Malou', '2023-08-21 09:37:45'),
(34, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"1\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"\",\"unit\":\"\",\"itemType\":\"\",\"itemTypeID\":\"\"},{\"subtotal\":\"44444.00\",\"product_id\":\"4444451\",\"qty\":\"1\",\"price\":\"44444\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"4\",\"unit\":\"boxes\",\"itemType\":\"ELoad\",\"itemTypeID\":\"2\"},{\"subtotal\":\"88888.00\",\"product_id\":\"4444451\",\"qty\":\"2\",\"price\":\"44444\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"4\",\"unit\":\"boxes\",\"itemType\":\"ELoad\",\"itemTypeID\":\"2\"}]', 133332, 0, 0, 133332, 1000000, 866668, 'Joshua', 'Joshua', 'Malou', '2023-08-21 09:42:23'),
(35, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"1\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"\",\"unit\":\"\",\"itemType\":\"\",\"itemTypeID\":\"\"},{\"subtotal\":\"44444.00\",\"product_id\":\"4444451\",\"qty\":\"1\",\"price\":\"44444\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"4\",\"unit\":\"boxes\",\"itemType\":\"ELoad\",\"itemTypeID\":\"2\"},{\"subtotal\":\"88888.00\",\"product_id\":\"4444451\",\"qty\":\"2\",\"price\":\"44444\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"4\",\"unit\":\"boxes\",\"itemType\":\"ELoad\",\"itemTypeID\":\"2\"}]', 133332, 0, 0, 133332, 1000000, 866668, 'Joshua', 'Joshua', 'Malou', '2023-08-21 09:42:47'),
(36, '[{\"subtotal\":\"0.00\",\"product_id\":\"\",\"qty\":\"1\",\"price\":\"\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"\",\"unit\":\"\",\"itemType\":\"\",\"itemTypeID\":\"\"},{\"subtotal\":\"44444.00\",\"product_id\":\"4444451\",\"qty\":\"1\",\"price\":\"44444\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"4\",\"unit\":\"boxes\",\"itemType\":\"ELoad\",\"itemTypeID\":\"2\"},{\"subtotal\":\"88888.00\",\"product_id\":\"4444451\",\"qty\":\"2\",\"price\":\"44444\",\"disc_percent\":\"\",\"disc_amt\":\"0.00\",\"id\":\"4\",\"unit\":\"boxes\",\"itemType\":\"ELoad\",\"itemTypeID\":\"2\"}]', 133332, 0, 0, 133332, 1000000, 866668, 'Joshua', 'Joshua', 'Malou', '2023-08-21 10:16:23');

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
  MODIFY `SalesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
