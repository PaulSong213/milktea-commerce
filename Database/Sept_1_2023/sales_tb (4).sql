-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2023 at 03:45 AM
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
  `createDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_tb`
--

INSERT INTO `sales_tb` (`SalesID`, `ProductInfo`, `NetSale`, `AddDisc`, `AddDiscAmt`, `NetAmt`, `AmtTendered`, `ChangeAmt`, `PatientAcct`, `RequestedName`, `EnteredName`, `billingID`, `PatientType`, `UnpaidPatientName`, `createDate`) VALUES
(110, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 780, 0, 0, 780, 999, 219, '2', '20', 20, 14, 'IPD', NULL, '2023-08-29 14:57:51'),
(111, '[{\"subtotal\":\"350.00\",\"product_id\":\"LAB***ALBUMIN\",\"qty\":\"1\",\"price\":\"350\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"5\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 350, 0, 0, 350, 9999, 9649, '1', '20', 20, 14, 'IPD', NULL, '2023-08-29 15:06:13'),
(112, '[{\"subtotal\":\"350.00\",\"product_id\":\"LAB***ALBUMIN\",\"qty\":\"1\",\"price\":\"350\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"5\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 350, 0, 0, 350, 9999, 9649, '1', '20', 20, 14, 'IPD', NULL, '2023-08-29 15:06:13'),
(113, '[{\"subtotal\":\"350.00\",\"product_id\":\"LAB***ALBUMIN\",\"qty\":\"1\",\"price\":\"350\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"5\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 350, 0, 0, 350, 9999, 9649, '1', '20', 20, 14, 'IPD', NULL, '2023-08-29 15:06:13'),
(114, '[{\"subtotal\":\"850.00\",\"product_id\":\"LAB***AMY\",\"qty\":\"1\",\"price\":\"850\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"8\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 850, 0, 0, 850, 9999, 9149, '2', '20', 0, 0, 'OPD', NULL, '2023-08-29 16:57:56'),
(115, '[{\"subtotal\":\"850.00\",\"product_id\":\"LAB***AMY\",\"qty\":\"1\",\"price\":\"850\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"8\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 850, 0, 0, 850, 99999, 99149, '1', '20', 0, 0, 'OPD', NULL, '2023-08-29 16:59:13'),
(116, '[{\"subtotal\":\"850.00\",\"product_id\":\"LAB***AMY\",\"qty\":\"1\",\"price\":\"850\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"8\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 850, 0, 0, 850, 9999, 9149, '2', '20', 0, 0, 'OPD', NULL, '2023-08-29 17:11:27'),
(117, '[{\"subtotal\":\"300.00\",\"product_id\":\"LAB***ALK\",\"qty\":\"1\",\"price\":\"300\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 300, 0, 0, 300, 999, 699, '2', '20', 0, 0, 'OPD', NULL, '2023-08-29 17:13:43'),
(118, '[{\"subtotal\":\"850.00\",\"product_id\":\"LAB***AMY\",\"qty\":\"1\",\"price\":\"850\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"8\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 850, 0, 0, 850, 9999, 9149, '3', '20', 0, 0, 'OPD', NULL, '2023-08-29 17:14:31'),
(119, '[{\"subtotal\":\"850.00\",\"product_id\":\"LAB***AMY\",\"qty\":\"1\",\"price\":\"850\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"8\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 850, 0, 0, 850, 9999, 9149, '2', '20', 0, 0, 'OPD', NULL, '2023-08-29 17:21:20'),
(120, '[{\"subtotal\":\"850.00\",\"product_id\":\"LAB***AMY\",\"qty\":\"1\",\"price\":\"850\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"8\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 850, 0, 0, 850, 999, 149, '1', '20', 0, 0, 'OPD', NULL, '2023-08-29 17:22:48'),
(121, '[{\"subtotal\":\"850.00\",\"product_id\":\"LAB***AMY\",\"qty\":\"1\",\"price\":\"850\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"8\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 850, 0, 0, 850, 9999, 9149, '1', '20', 0, 0, 'OPD', NULL, '2023-08-29 17:24:52'),
(122, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 780, 0, 0, 780, 999, 219, '2', '20', 0, 0, 'OPD', NULL, '2023-08-29 17:25:49'),
(123, '[{\"subtotal\":\"300.00\",\"product_id\":\"LAB***ALK\",\"qty\":\"1\",\"price\":\"300\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 300, 0, 0, 300, 9999, 9699, '2', '20', 0, 0, 'OPD', NULL, '2023-08-29 17:27:33'),
(124, '[{\"subtotal\":\"300.00\",\"product_id\":\"LAB***ALK\",\"qty\":\"1\",\"price\":\"300\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 300, 0, 0, 300, 999, 699, '1', '20', 0, 0, 'OPD', NULL, '2023-08-29 17:28:22'),
(125, '[{\"subtotal\":\"350.00\",\"product_id\":\"LAB***ALBUMIN\",\"qty\":\"1\",\"price\":\"350\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"5\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 350, 0, 0, 350, 999, 649, '2', '21', 0, 0, 'OPD', NULL, '2023-08-29 17:28:52'),
(126, '[{\"subtotal\":\"300.00\",\"product_id\":\"LAB***ALK\",\"qty\":\"1\",\"price\":\"300\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 300, 0, 0, 300, 999, 699, '1', '20', 0, 0, 'OPD', NULL, '2023-08-29 17:29:32'),
(127, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 780, 0, 0, 780, 999, 219, '2', '20', 0, 0, 'OPD', NULL, '2023-08-29 17:29:49'),
(128, '[{\"subtotal\":\"300.00\",\"product_id\":\"LAB***ALK\",\"qty\":\"1\",\"price\":\"300\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 300, 0, 0, 300, 9999, 9699, '2', '21', 0, 0, 'OPD', NULL, '2023-08-29 17:31:39'),
(129, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 780, 0, 0, 780, 999, 219, '2', '20', 0, 0, 'OPD', NULL, '2023-08-29 17:34:30'),
(130, '[{\"subtotal\":\"300.00\",\"product_id\":\"LAB***ALK\",\"qty\":\"1\",\"price\":\"300\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 300, 0, 0, 300, 9999, 9699, '1', '20', 0, 0, 'OPD', NULL, '2023-08-29 17:35:46'),
(131, '[{\"subtotal\":\"300.00\",\"product_id\":\"LAB***ALK\",\"qty\":\"1\",\"price\":\"300\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 300, 0, 0, 300, 9999, 9699, '1', '20', 0, 0, 'OPD', NULL, '2023-08-29 17:46:24'),
(132, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 780, 0, 0, 780, 999, 219, '2', '20', 0, 0, 'OPD', NULL, '2023-08-29 17:48:26'),
(133, '[{\"subtotal\":\"300.00\",\"product_id\":\"LAB***ALK\",\"qty\":\"1\",\"price\":\"300\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 300, 0, 0, 300, 999, 699, '2', '20', 20, 0, 'OPD', NULL, '2023-08-29 17:50:26'),
(134, '[{\"subtotal\":\"850.00\",\"product_id\":\"LAB***AMY\",\"qty\":\"1\",\"price\":\"850\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"8\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 850, 0, 0, 850, 9999, 9149, '2', '20', 20, 0, 'OPD', NULL, '2023-08-30 09:21:59'),
(135, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 780, 0, 0, 780, 0, -780, '2', '23', 379, 19, 'OPD', NULL, '2023-08-30 14:08:40'),
(136, '[{\"subtotal\":\"300.00\",\"product_id\":\"LAB***ALK\",\"qty\":\"1\",\"price\":\"300\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 300, 0, 0, 300, 0, -300, '1', '25', 379, 20, 'OPD', NULL, '2023-08-30 14:08:55'),
(137, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 780, 0, 0, 780, 0, -780, '5', '25', 379, 21, 'OPD', NULL, '2023-08-30 14:10:04'),
(138, '[{\"subtotal\":\"300.00\",\"product_id\":\"LAB***ALK\",\"qty\":\"1\",\"price\":\"300\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 300, 0, 0, 300, 0, -300, '2', '23', 379, 22, 'OPD', NULL, '2023-08-30 14:11:07'),
(139, '[{\"subtotal\":\"350.00\",\"product_id\":\"LAB***AFB(SPUTUM)\",\"qty\":\"1\",\"price\":\"350\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"4\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 350, 0, 0, 350, 0, -350, '2', '23', 379, 14, 'IPD', NULL, '2023-08-30 14:18:45'),
(140, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"},{\"subtotal\":\"0.00\",\"product_id\":\"LAB***ANTIHAV\",\"qty\":\"1\",\"price\":\"0\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"10\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"},{\"subtotal\":\"6.75\",\"product_id\":\"NEOZEPTABLET\",\"qty\":\"1\",\"price\":\"6.75\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"801\",\"unit\":\"TAB\",\"itemType\":\"P - Pharmacy\",\"itemTypeID\":\"41\"}]', 787, 0, 0, 787, 0, -787, '2', '24', 379, 23, 'OPD', NULL, '2023-08-30 14:21:37'),
(141, '[{\"subtotal\":\"6500.00\",\"product_id\":\"TISSUEPAPERTOWEL\",\"qty\":\"100\",\"price\":\"65\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"466\",\"unit\":\"PHP\",\"itemType\":\"S - Supplies\",\"itemTypeID\":\"45\"}]', 6500, 0, 0, 6500, 1000, -5500, '1', '23', 379, 24, 'OPD', NULL, '2023-08-30 14:28:11'),
(142, '[{\"subtotal\":\"350.00\",\"product_id\":\"LAB***ALBUMIN\",\"qty\":\"1\",\"price\":\"350\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"5\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 350, 0, 0, 350, 400, 50, '2', '24', 379, 25, 'OPD', NULL, '2023-08-30 14:33:54'),
(143, '[{\"subtotal\":\"350.00\",\"product_id\":\"LAB***ALBUMIN\",\"qty\":\"1\",\"price\":\"350\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"5\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"},{\"subtotal\":\"9.00\",\"product_id\":\"PARACETAMOL500MGTABLET\",\"qty\":\"3\",\"price\":\"3\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"1106\",\"unit\":\"TABLET\",\"itemType\":\"P - Pharmacy\",\"itemTypeID\":\"41\"}]', 359, 0, 0, 359, 0, -359, '2', '24', 379, 14, 'IPD', NULL, '2023-08-30 14:35:30'),
(144, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 780, 0, 0, 780, 800, 20, '2', '23', 379, 26, 'OPD', NULL, '2023-08-30 14:45:46'),
(145, '[{\"subtotal\":\"850.00\",\"product_id\":\"LAB***AMY\",\"qty\":\"1\",\"price\":\"850\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"8\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 850, 0, 0, 850, 999, 149, '2', '23', 379, 27, 'OPD', NULL, '2023-08-30 14:47:41'),
(146, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 780, 0, 0, 780, 780, 0, '2', '24', 379, 28, 'OPD', NULL, '2023-08-30 14:48:29'),
(147, '[{\"subtotal\":\"13.50\",\"product_id\":\"NEOZEPTABLET\",\"qty\":\"2\",\"price\":\"6.75\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"801\",\"unit\":\"TAB\",\"itemType\":\"P - Pharmacy\",\"itemTypeID\":\"41\"}]', 14, 0, 0, 14, 15, 2, '2', '23', 379, 16, 'IPD', NULL, '2023-08-30 14:49:05'),
(148, '[{\"subtotal\":\"850.00\",\"product_id\":\"LAB***AMY\",\"qty\":\"1\",\"price\":\"850\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"8\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 850, 0, 0, 850, 0, -850, '2', '24', 379, 15, 'IPD', NULL, '2023-08-30 14:53:34'),
(149, '[{\"subtotal\":\"350.00\",\"product_id\":\"LAB***AFB(SPUTUM)\",\"qty\":\"1\",\"price\":\"350\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"4\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 350, 0, 0, 350, 999, 649, '1', '23', 379, 29, 'OPD', NULL, '2023-08-30 14:56:35'),
(150, '[{\"subtotal\":\"300.00\",\"product_id\":\"LAB***ALK\",\"qty\":\"1\",\"price\":\"300\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 300, 0, 0, 300, 500, 200, '2', '24', 379, 30, 'OPD', NULL, '2023-08-30 15:00:05'),
(151, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 780, 0, 0, 780, 800, 20, '2', '24', 379, 0, 'OPD', NULL, '2023-08-30 15:02:37'),
(152, '[{\"subtotal\":\"300.00\",\"product_id\":\"LAB***ALK\",\"qty\":\"1\",\"price\":\"300\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 300, 0, 0, 300, 999, 699, '2', '23', 379, 0, 'OPD', NULL, '2023-08-30 15:05:41'),
(153, '[{\"subtotal\":\"350.00\",\"product_id\":\"LAB***ALBUMIN\",\"qty\":\"1\",\"price\":\"350\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"5\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 350, 0, 0, 350, 999, 649, '2', '24', 379, 0, 'OPD', NULL, '2023-08-30 15:06:34'),
(154, '[{\"subtotal\":\"350.00\",\"product_id\":\"LAB***ALBUMIN\",\"qty\":\"1\",\"price\":\"350\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"5\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 350, 0, 0, 350, 999, 649, '1', '23', 379, NULL, 'OPD', NULL, '2023-08-30 15:07:17'),
(155, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 780, 0, 0, 780, 0, -780, '2', '25', 379, 31, 'IPD', NULL, '2023-08-30 15:08:18'),
(156, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 780, 0, 0, 780, 780, 0, '3', '23', 379, NULL, 'IPD', NULL, '2023-08-30 15:09:02'),
(157, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 780, 0, 0, 780, 999, 219, '2', '23', 379, 14, 'IPD', NULL, '2023-08-30 15:11:17'),
(158, '[{\"subtotal\":\"300.00\",\"product_id\":\"LAB***ALK\",\"qty\":\"1\",\"price\":\"300\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 300, 0, 0, 300, 999, 699, '0', '24', 379, NULL, 'OPD', NULL, '2023-08-30 15:40:18'),
(159, '[{\"subtotal\":\"350.00\",\"product_id\":\"LAB***AFB(SPUTUM)\",\"qty\":\"1\",\"price\":\"350\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"4\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 350, 0, 0, 350, 999, 649, '2', '24', 379, NULL, 'OPD', NULL, '2023-08-30 15:45:37'),
(160, '[{\"subtotal\":\"300.00\",\"product_id\":\"LAB***ALK\",\"qty\":\"1\",\"price\":\"300\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 300, 0, 0, 300, 999, 699, '2', '24', 379, NULL, 'OPD', NULL, '2023-08-30 15:47:12'),
(161, '[{\"subtotal\":\"300.00\",\"product_id\":\"LAB***ALK\",\"qty\":\"1\",\"price\":\"300\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 300, 0, 0, 300, 999, 699, '0', '23', 379, NULL, 'OPD', NULL, '2023-08-30 15:51:54'),
(162, '[{\"subtotal\":\"300.00\",\"product_id\":\"LAB***ALK\",\"qty\":\"1\",\"price\":\"300\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"7\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 300, 0, 0, 300, 999, 699, '0', '24', 379, NULL, 'OPD', NULL, '2023-08-30 15:54:15'),
(163, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 780, 0, 0, 780, 999, 219, '3', '23', 379, NULL, 'OPD', '', '2023-08-30 15:57:53'),
(164, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 780, 0, 0, 780, 999, 219, '0', '24', 379, NULL, 'OPD', '', '2023-08-30 15:58:12'),
(165, '[{\"subtotal\":\"780.00\",\"product_id\":\"LAB***ALCO\",\"qty\":\"1\",\"price\":\"780\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"6\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 780, 0, 0, 780, 999, 219, '0', '24', 379, NULL, 'OPD', 'John Doe', '2023-08-30 15:59:36'),
(166, '[{\"subtotal\":\"350.00\",\"product_id\":\"LAB***ALBUMIN\",\"qty\":\"1\",\"price\":\"350\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"5\",\"unit\":\"TEST\",\"itemType\":\"LAB - Lab Work\",\"itemTypeID\":\"38\"}]', 350, 0, 0, 350, 0, -350, '3', '25', 379, 32, 'IPD', '', '2023-08-30 16:21:44');

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
  MODIFY `SalesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
