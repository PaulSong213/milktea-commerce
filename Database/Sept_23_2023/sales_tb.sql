-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2023 at 08:24 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `milkteacommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `sales_tb`
--

CREATE TABLE `sales_tb` (
  `SalesID` int(11) NOT NULL,
  `ProductInfo` text NOT NULL,
  `NetSale` decimal(60,0) NOT NULL,
  `AddDisc` decimal(60,0) NOT NULL,
  `AddDiscAmt` decimal(60,0) NOT NULL,
  `NetAmt` decimal(60,0) NOT NULL,
  `AmtTendered` decimal(60,0) NOT NULL,
  `ChangeAmt` decimal(60,0) NOT NULL,
  `PatientAcct` varchar(11) NOT NULL,
  `RequestedName` varchar(11) NOT NULL,
  `EnteredName` int(11) NOT NULL,
  `billingID` int(11) DEFAULT NULL,
  `PatientType` varchar(11) NOT NULL,
  `UnpaidPatientName` varchar(120) DEFAULT NULL,
  `status` enum('pending-payment','preparing-food','on-delivery-rider','waiting-for-feedback','delivered') NOT NULL DEFAULT 'pending-payment',
  `paymentID` varchar(120) DEFAULT NULL,
  `createDate` datetime NOT NULL,
  `modifiedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_tb`
--

INSERT INTO `sales_tb` (`SalesID`, `ProductInfo`, `NetSale`, `AddDisc`, `AddDiscAmt`, `NetAmt`, `AmtTendered`, `ChangeAmt`, `PatientAcct`, `RequestedName`, `EnteredName`, `billingID`, `PatientType`, `UnpaidPatientName`, `status`, `paymentID`, `createDate`, `modifiedDate`) VALUES
(1, '[{\"subtotal\":\"300.00\",\"product_id\":\"LAB***ALK\",\"qty\":\"1\",\"price\":\"300\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"},{\"subtotal\":\"1.00\",\"product_id\":\"BLOODTRANSPO\",\"qty\":\"1\",\"price\":\"1\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"509\",\"unit\":\"PHP\",\"itemType\":\"V - Services\",\"itemTypeID\":\"49\"}]', '301', '0', '0', '301', '307', '6', '1', '23', 379, 1, 'OPD', '1', 'pending-payment', '', '2023-09-08 09:54:37', '2023-09-08 10:32:32'),
(2, '[{\"subtotal\":\"300.00\",\"product_id\":\"LAB***ALK\",\"qty\":\"1\",\"price\":\"300\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"},{\"subtotal\":\"3100.00\",\"product_id\":\"LAB***POLYMERSECHAINREACTIONTEST\",\"qty\":\"1\",\"price\":\"3100\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"336\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"},{\"subtotal\":\"250.00\",\"product_id\":\"IVINSERTION\",\"qty\":\"1\",\"price\":\"250\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"498\",\"unit\":\"PHP\",\"itemType\":\"V - Services\",\"itemTypeID\":\"49\"},{\"subtotal\":\"20.00\",\"product_id\":\"DRINKINGWATER500ML\",\"qty\":\"1\",\"price\":\"20\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"489\",\"unit\":\"PHP\",\"itemType\":\"S - Supplies\",\"itemTypeID\":\"45\"}]', '3670', '0', '0', '3670', '5670', '2000', '4', '23', 379, 2, 'IPD', '', 'pending-payment', '', '2023-09-08 09:57:47', '2023-09-08 10:49:54'),
(3, '[{\"subtotal\":\"300.00\",\"product_id\":\"LAB***ALK\",\"qty\":\"1\",\"price\":\"300\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"},{\"subtotal\":\"1.00\",\"product_id\":\"DELIVERYCHARGED\",\"qty\":\"1\",\"price\":\"1\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"513\",\"unit\":\"PHP\",\"itemType\":\"O - Others\",\"itemTypeID\":\"40\"}]', '301', '0', '0', '301', '301', '0', '1', '23', 379, 3, 'OPD', '1', 'pending-payment', '', '2023-09-08 10:52:32', '2023-09-08 10:56:07'),
(4, '[{\"subtotal\":\"300.00\",\"product_id\":\"LAB***ALK\",\"qty\":\"1\",\"price\":\"300\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"},{\"subtotal\":\"1.00\",\"product_id\":\"DELIVERYCHARGED\",\"qty\":\"1\",\"price\":\"1\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"513\",\"unit\":\"PHP\",\"itemType\":\"O - Others\",\"itemTypeID\":\"40\"}]', '301', '0', '0', '301', '500', '199', '3', '28', 379, 2, 'IPD', '', 'pending-payment', '', '2023-09-08 10:52:59', '2023-09-08 10:54:27'),
(5, '[{\"subtotal\":\"350.00\",\"product_id\":\"LAB***ALBUMIN\",\"qty\":\"1\",\"price\":\"350\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"5\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"},{\"subtotal\":\"1.00\",\"product_id\":\"DELIVERYCHARGED\",\"qty\":\"1\",\"price\":\"1\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"513\",\"unit\":\"PHP\",\"itemType\":\"O - Others\",\"itemTypeID\":\"40\"}]', '351', '0', '0', '351', '951', '600', '8', '28', 379, 3, 'IPD', '', 'pending-payment', '', '2023-09-08 10:53:40', '2023-09-08 10:56:07'),
(6, '[{\"subtotal\":\"300.00\",\"product_id\":\"LAB***ALK\",\"qty\":\"1\",\"price\":\"300\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"},{\"subtotal\":\"1.00\",\"product_id\":\"DELIVERYCHARGED\",\"qty\":\"1\",\"price\":\"1\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"513\",\"unit\":\"PHP\",\"itemType\":\"O - Others\",\"itemTypeID\":\"40\"},{\"subtotal\":\"440.00\",\"product_id\":\"X*ENASAL\",\"qty\":\"1\",\"price\":\"440\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"378\",\"unit\":\"TEST\",\"itemType\":\"X - X-Ray\",\"itemTypeID\":\"50\"}]', '741', '0', '0', '741', '771', '30', '1', '28', 379, 3, 'IPD', '', 'pending-payment', '', '2023-09-08 10:56:47', '2023-09-08 10:58:27'),
(7, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"},{\"subtotal\":\"462.00\",\"product_id\":\"LAB*ESERUMBICARBONATE\",\"qty\":\"1\",\"price\":\"462\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"265\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"},{\"subtotal\":\"1.00\",\"product_id\":\"ERFEE\",\"qty\":\"1\",\"price\":\"1\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"514\",\"unit\":\"PHP\",\"itemType\":\"V - Services\",\"itemTypeID\":\"49\"}]', '1243', '0', '0', '1243', '1500', '257', '1', '28', 379, 3, 'IPD', '', 'pending-payment', '', '2023-09-08 11:00:16', '2023-09-08 11:00:30'),
(8, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"},{\"subtotal\":\"858.00\",\"product_id\":\"LAB*SALMONELLATYPHI(IgG/IgM)\",\"qty\":\"1\",\"price\":\"858\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"308\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', '1638', '0', '0', '1638', '10000', '8362', '1', '23', 379, 3, 'IPD', '', 'pending-payment', '', '2023-09-08 11:00:59', '2023-09-08 11:01:22'),
(9, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"},{\"subtotal\":\"1200.00\",\"product_id\":\"US*CONGENITALSCAN\",\"qty\":\"1\",\"price\":\"1200\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"387\",\"unit\":\"PHP\",\"itemType\":\"US - Ultra Sound\",\"itemTypeID\":\"48\"}]', '1980', '0', '0', '1980', '2000', '20', '1', '28', 379, 3, 'IPD', '', 'pending-payment', '', '2023-09-08 11:02:00', '2023-09-08 11:02:30'),
(10, '[{\"subtotal\":\"1440.00\",\"product_id\":\"LAB***ABG\",\"qty\":\"1\",\"price\":\"1440\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"3\",\"unit\":\"TEST\",\"itemType\":\"LABORATORY\",\"itemTypeID\":\"38\"},{\"subtotal\":\"7000.00\",\"product_id\":\"MICROMOTOR\",\"qty\":\"1\",\"price\":\"7000\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"479\",\"unit\":\"PHP\",\"itemType\":\"OTHERS\",\"itemTypeID\":\"40\"}]', '8440', '0', '0', '8440', '1060', '-7380', '2', '23', 379, 4, 'OPD', '2', 'pending-payment', '', '2023-09-08 11:18:06', '2023-09-08 13:13:09'),
(11, '[{\"subtotal\":\"350.00\",\"product_id\":\"LAB***ALBUMIN\",\"qty\":\"1\",\"price\":\"350\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"5\",\"unit\":\"TEST\",\"itemType\":\"LABORATORY\",\"itemTypeID\":\"38\"}]', '350', '0', '0', '350', '0', '-350', '2', '27', 379, 4, 'IPD', '', 'pending-payment', '', '2023-09-08 13:35:27', '2023-09-08 13:35:27'),
(12, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LABORATORY\",\"itemTypeID\":\"38\"}]', '780', '0', '0', '780', '0', '-780', '1', '23', 379, 5, 'OPD', '1', 'pending-payment', '', '2023-09-08 13:37:12', '2023-09-08 13:37:12'),
(13, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LABORATORY\",\"itemTypeID\":\"38\"}]', '780', '0', '0', '780', '0', '-780', '1', '23', 379, 6, 'OPD', '1', 'pending-payment', '', '2023-09-08 13:38:45', '2023-09-08 13:38:45'),
(14, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LABORATORY\",\"itemTypeID\":\"38\"},{\"subtotal\":\"250.00\",\"product_id\":\"LAB***HIV(250)\",\"qty\":\"1\",\"price\":\"250\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"333\",\"unit\":\"TEST\",\"itemType\":\"LABORATORY\",\"itemTypeID\":\"38\"}]', '1030', '0', '0', '1030', '0', '-1030', '1', '23', 379, 7, 'OPD', '1', 'pending-payment', '', '2023-09-08 13:51:15', '2023-09-08 13:51:15'),
(15, '[{\"subtotal\":\"850.00\",\"product_id\":\"LAB***AMY\",\"qty\":\"1\",\"price\":\"850\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"8\",\"unit\":\"TEST\",\"itemType\":\"LABORATORY\",\"itemTypeID\":\"38\"}]', '850', '0', '0', '850', '0', '-850', '2', '24', 379, 25, 'OPD', '2', 'pending-payment', '', '2023-09-08 15:15:27', '2023-09-08 15:15:27'),
(16, '[{\"subtotal\":\"850.00\",\"product_id\":\"LAB***AMY\",\"qty\":\"1\",\"price\":\"850\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"8\",\"unit\":\"TEST\",\"itemType\":\"LABORATORY\",\"itemTypeID\":\"38\"},{\"subtotal\":\"1800.00\",\"product_id\":\"LAB****INORGANICPHOSPHATE\",\"qty\":\"1\",\"price\":\"1800\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"2\",\"unit\":\"TEST\",\"itemType\":\"LABORATORY\",\"itemTypeID\":\"38\"}]', '2650', '0', '0', '2650', '0', '-2650', '2', '23', 379, 26, 'OPD', '2', 'pending-payment', '', '2023-09-08 15:30:06', '2023-09-08 15:30:06'),
(17, '[{\"subtotal\":\"850.00\",\"product_id\":\"LAB***AMY\",\"qty\":\"1\",\"price\":\"850\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"8\",\"unit\":\"TEST\",\"itemType\":\"LABORATORY\",\"itemTypeID\":\"38\"}]', '850', '0', '0', '850', '0', '-850', '2', '23', 379, 27, 'OPD', '2', 'pending-payment', '', '2023-09-08 15:32:27', '2023-09-08 15:32:27'),
(18, '[{\"subtotal\":\"11184.00\",\"product_id\":\"LAB***LIPID\",\"qty\":\"12\",\"price\":\"932\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"1195\",\"unit\":\"TEST\",\"itemType\":\"LABORATORY\",\"itemTypeID\":\"38\"}]', '11184', '0', '0', '11184', '0', '-11184', '3', '23', 379, 28, 'OPD', '3', 'pending-payment', '', '2023-09-08 15:49:38', '2023-09-08 15:49:38'),
(19, '[{\"subtotal\":\"11184.00\",\"product_id\":\"LAB***LIPID\",\"qty\":\"12\",\"price\":\"932\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"1195\",\"unit\":\"TEST\",\"itemType\":\"LABORATORY\",\"itemTypeID\":\"38\"}]', '11184', '0', '0', '11184', '0', '-11184', '3', '23', 379, 29, 'OPD', '3', 'pending-payment', '', '2023-09-08 15:50:05', '2023-09-08 15:50:05'),
(20, '[{\"subtotal\":\"11184.00\",\"product_id\":\"LAB***LIPID\",\"qty\":\"12\",\"price\":\"932\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"1195\",\"unit\":\"TEST\",\"itemType\":\"LABORATORY\",\"itemTypeID\":\"38\"}]', '11184', '0', '0', '11184', '0', '-11184', '3', '23', 379, 30, 'OPD', '3', 'pending-payment', '', '2023-09-08 15:50:38', '2023-09-08 15:50:38'),
(21, '[{\"subtotal\":\"932.00\",\"product_id\":\"LAB***LIPID\",\"qty\":\"1\",\"price\":\"932\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"1195\",\"unit\":\"TEST\",\"itemType\":\"LABORATORY\",\"itemTypeID\":\"38\"}]', '932', '0', '0', '932', '0', '-932', '1', '23', 379, 31, 'OPD', '1', 'pending-payment', '', '2023-09-08 15:52:12', '2023-09-08 15:52:12'),
(22, '[{\"subtotal\":\"300.00\",\"product_id\":\"RE-TYPING\",\"qty\":\"12\",\"price\":\"25\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"497\",\"unit\":\"PHP\",\"itemType\":\"SERVICES\",\"itemTypeID\":\"49\"}]', '300', '0', '0', '300', '0', '-300', '1', '23', 379, 32, 'OPD', '1', 'pending-payment', '', '2023-09-08 15:53:09', '2023-09-08 15:53:09'),
(23, '[{\"subtotal\":\"2412.00\",\"product_id\":\"LAB***URINEG/S(PERPS)\",\"qty\":\"3\",\"price\":\"804\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"356\",\"unit\":\"TEST\",\"itemType\":\"LABORATORY\",\"itemTypeID\":\"38\"}]', '2412', '0', '0', '2412', '0', '-2412', '1', '23', 379, 33, 'OPD', '1', 'pending-payment', '', '2023-09-08 15:55:08', '2023-09-08 15:55:08'),
(24, '[{\"subtotal\":\"5628.00\",\"product_id\":\"LAB***URINEG/S(PERPS)\",\"qty\":\"7\",\"price\":\"804\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"356\",\"unit\":\"TEST\",\"itemType\":\"LABORATORY\",\"itemTypeID\":\"38\"}]', '5628', '0', '0', '5628', '0', '-5628', '1', '23', 379, 34, 'OPD', '1', 'pending-payment', '', '2023-09-08 15:55:36', '2023-09-08 15:55:36'),
(25, '[{\"subtotal\":\"27720.00\",\"product_id\":\"LAB***PROGESTERON\",\"qty\":\"12\",\"price\":\"2310\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"368\",\"unit\":\"TEST\",\"itemType\":\"LABORATORY\",\"itemTypeID\":\"38\"}]', '27720', '0', '0', '27720', '0', '-27720', '1', '23', 379, 35, 'OPD', '1', 'pending-payment', '', '2023-09-08 15:56:00', '2023-09-08 15:56:00'),
(26, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LABORATORY\",\"itemTypeID\":\"38\"}]', '780', '0', '0', '780', '800', '20', '1', '23', 379, NULL, 'OPD', '1', 'pending-payment', '', '2023-09-08 16:19:32', '2023-09-08 16:19:32'),
(27, '[{\"subtotal\":\"300.00\",\"product_id\":\"LAB***ALK\",\"qty\":\"1\",\"price\":\"300\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":\"TEST\",\"itemType\":\"LABORATORY\",\"itemTypeID\":\"38\"}]', '300', '0', '0', '300', '300', '0', '2', '23', 379, NULL, 'OPD', '2', 'pending-payment', '', '2023-09-08 16:35:52', '2023-09-08 16:35:52'),
(28, '[{\"subtotal\":\"300.00\",\"product_id\":\"LAB***ALK\",\"qty\":\"1\",\"price\":\"300\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":\"TEST\",\"itemType\":\"LABORATORY\",\"itemTypeID\":\"38\"}]', '300', '0', '0', '300', '0', '-300', '1', '23', 379, 36, 'OPD', '1', 'pending-payment', '', '2023-09-08 16:41:36', '2023-09-08 16:41:36'),
(29, '[{\"subtotal\":\"300.00\",\"product_id\":\"LAB***ALK\",\"qty\":\"1\",\"price\":\"300\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":\"TEST\",\"itemType\":\"LABORATORY\",\"itemTypeID\":\"38\"}]', '300', '0', '0', '300', '300', '0', '2', '24', 379, NULL, 'OPD', '2', 'pending-payment', '', '2023-09-08 16:42:05', '2023-09-08 16:42:05'),
(30, '[{\"subtotal\":\"850.00\",\"product_id\":\"LAB***AMY\",\"qty\":\"1\",\"price\":\"850\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"8\",\"unit\":\"TEST\",\"itemType\":\"LABORATORY\",\"itemTypeID\":\"38\"}]', '850', '0', '0', '850', '1000', '150', '1', '23', 379, NULL, 'OPD', '1', 'pending-payment', '', '2023-09-08 16:42:34', '2023-09-08 16:42:34'),
(31, '[{\"subtotal\":\"600.00\",\"product_id\":\"X*EPELVIC\",\"qty\":\"1\",\"price\":\"600\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"398\",\"unit\":\"PHP\",\"itemType\":\"X-RAY\",\"itemTypeID\":\"50\"}]', '600', '0', '0', '600', '600', '0', 'John Doe', '23', 379, NULL, 'OPD', 'John Doe', 'pending-payment', '', '2023-09-08 16:43:14', '2023-09-08 16:43:14'),
(32, '[{\"subtotal\":\"850.00\",\"product_id\":\"LAB***AMY\",\"qty\":\"1\",\"price\":\"850\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"8\",\"unit\":\"TEST\",\"itemType\":\"LABORATORY\",\"itemTypeID\":\"38\"}]', '850', '0', '0', '850', '1000', '150', 'John Doe', '23', 379, NULL, 'OPD', 'John Doe', 'pending-payment', '', '2023-09-08 16:46:01', '2023-09-08 16:46:01'),
(33, '[{\"subtotal\":\"350.00\",\"product_id\":\"LAB***AFB(SPUTUM)\",\"qty\":\"1\",\"price\":\"350\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"4\",\"unit\":\"TEST\",\"itemType\":\"LABORATORY\",\"itemTypeID\":\"39\",\"product_desciption\":\"AFB (SPUTUM TEST)\"},{\"subtotal\":\"11.00\",\"product_id\":\"PREV.BAL\",\"qty\":\"10\",\"price\":\"1\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"504\",\"unit\":\"PHP\",\"itemType\":\"OTHERS\",\"itemTypeID\":\"40\",\"product_desciption\":\"PREVIOUS BALANCE OPD\"}]', '361', '0', '0', '361', '0', '-361', '6', '25', 379, 37, 'OPD', '6', 'delivered', 'link_zpvY1A2ABJXnkZsDtF4xBvtT', '2023-09-13 10:32:17', '2023-09-13 10:32:17');

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
  MODIFY `SalesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
