-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2023 at 10:55 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
-- Table structure for table `clinicuse_tb`
--

CREATE TABLE `clinicuse_tb` (
  `SalesID` int(11) NOT NULL,
  `ProductInfo` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `NetAmt` int(11) DEFAULT NULL,
  `requestedBy` varchar(100) DEFAULT NULL,
  `enteredBy` varchar(100) DEFAULT NULL,
  `createDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinicuse_tb`
--

INSERT INTO `clinicuse_tb` (`SalesID`, `ProductInfo`, `department`, `NetAmt`, `requestedBy`, `enteredBy`, `createDate`) VALUES
(2, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'ECG | ID: 2', 300, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 11:09:49'),
(3, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'FAMILY | ID: 3', 300, 'DR. CHUA,ALJER  | ID: 25', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 11:17:26'),
(4, '[{\"product_id\":\"LAB***AMY\",\"qty\":1,\"price\":\"850\"}]', 'ADMIN | ID: 1', 850, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 11:18:25'),
(5, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'LAB | ID: 5', 300, 'DR. CHUA,ALJER  | ID: 25', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 11:19:57'),
(6, '[{\"product_id\":\"LAB***AMY\",\"qty\":1,\"price\":\"850\"}]', 'FAMILY | ID: 3', 850, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 11:21:04'),
(7, '[{\"product_id\":\"LAB***ALCO\",\"qty\":1,\"price\":\"780\"}]', 'ADMIN | ID: 1', 780, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 11:22:34'),
(8, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'ECG | ID: 2', 300, 'DR. CHUA,ALJER  | ID: 25', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 11:25:20'),
(9, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'ECG | ID: 2', 300, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 11:31:52'),
(10, '[{\"product_id\":\"LAB***AMY\",\"qty\":1,\"price\":\"850\"}]', 'FAMILY | ID: 3', 850, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 11:35:10'),
(11, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'FAMILY | ID: 3', 300, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 11:36:57'),
(12, '[{\"product_id\":\"LAB***ALCO\",\"qty\":1,\"price\":\"780\"}]', 'ADMIN | ID: 1', 780, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 11:42:24'),
(13, '[{\"product_id\":\"LAB***ABG\",\"qty\":1,\"price\":\"1440\"}]', 'ECG | ID: 2', 1440, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 11:42:37'),
(14, '[{\"product_id\":\"LAB***ALCO\",\"qty\":1,\"price\":\"780\"}]', 'ECG | ID: 2', 780, 'DR. CHUA,ALJER  | ID: 25', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 11:44:10'),
(15, '[{\"product_id\":\"LAB***ANA\",\"qty\":1,\"price\":\"1200\"}]', 'ECG | ID: 2', 1200, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 11:45:11'),
(16, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"\"}]', 'ADMIN | ID: 1', 0, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 11:46:39'),
(17, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'ECG | ID: 2', 300, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 11:47:25'),
(18, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'GENERAL | ID: 4', 300, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 11:47:40'),
(19, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'ECG | ID: 2', 300, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 11:48:11'),
(20, '[{\"product_id\":\"LAB***ALCO\",\"qty\":1,\"price\":\"780\"}]', 'ECG | ID: 2', 780, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 11:59:31'),
(21, '[{\"product_id\":\"LAB***ALCO\",\"qty\":1,\"price\":\"780\"}]', 'FAMILY | ID: 3', 780, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 12:41:16'),
(22, '[{\"product_id\":\"LAB***ALCO\",\"qty\":1,\"price\":\"780\"}]', 'ADMIN | ID: 1', 780, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 12:42:45'),
(23, '[{\"product_id\":\"LAB***AMY\",\"qty\":1,\"price\":\"850\"}]', 'FAMILY | ID: 3', 850, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 12:47:28'),
(24, '[{\"product_id\":\"LAB***ANA\",\"qty\":1,\"price\":\"1200\"}]', 'ADMIN | ID: 1', 1200, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 12:49:29'),
(25, '[{\"product_id\":\"LAB***ALCO\",\"qty\":1,\"price\":\"780\"}]', 'ECG | ID: 2', 780, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 12:49:40'),
(26, '[{\"product_id\":\"LAB***ANA\",\"qty\":1,\"price\":\"1200\"}]', 'ADMIN | ID: 1', 1200, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 12:54:00'),
(27, '[{\"product_id\":\"LAB***ALCO\",\"qty\":1,\"price\":\"780\"}]', 'ADMIN | ID: 1', 780, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 12:57:35'),
(28, '[{\"product_id\":\"LAB***ALCO\",\"qty\":1,\"price\":\"780\"}]', 'ADMIN | ID: 1', 780, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 12:58:12'),
(29, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'LAB | ID: 5', 300, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 12:58:57'),
(30, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'ECG | ID: 2', 300, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 12:59:58'),
(31, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'ADMIN | ID: 1', 300, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 13:02:42'),
(32, '[{\"product_id\":\"LAB***ANTIHAV\",\"qty\":1,\"price\":\"0\"}]', 'ADMIN | ID: 1', 0, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 13:03:53'),
(33, '[{\"product_id\":\"LAB***AMY\",\"qty\":1,\"price\":\"850\"}]', 'ECG | ID: 2', 850, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 13:04:03'),
(34, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'ADMIN | ID: 1', 300, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 13:08:21'),
(35, '[{\"product_id\":\"LAB***ALCO\",\"qty\":1,\"price\":\"780\"}]', 'IT | ID: 8', 780, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 13:09:15'),
(36, '[{\"product_id\":\"LAB***ALBUMIN\",\"qty\":1,\"price\":\"350\"}]', 'ECG | ID: 2', 350, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 13:11:06'),
(37, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'ECG | ID: 2', 300, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 13:12:12'),
(38, '[{\"product_id\":\"LAB***AMY\",\"qty\":1,\"price\":\"850\"}]', 'LAB | ID: 5', 850, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 13:12:46'),
(39, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'ADMIN | ID: 1', 300, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 13:19:35'),
(40, '[{\"product_id\":\"LAB***ALCO\",\"qty\":1,\"price\":\"780\"}]', 'FAMILY | ID: 3', 780, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 13:24:37'),
(41, '[{\"product_id\":\"LAB***ALCO\",\"qty\":1,\"price\":\"780\"}]', 'FAMILY | ID: 3', 780, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 13:24:59'),
(42, '[{\"product_id\":\"LAB***AMY\",\"qty\":1,\"price\":\"850\"}]', 'ADMIN | ID: 1', 850, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 13:28:09'),
(43, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'ECG | ID: 2', 300, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 13:37:43'),
(44, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'ECG | ID: 2', 300, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 13:52:25'),
(45, '[{\"product_id\":\"LAB***ALCO\",\"qty\":1,\"price\":\"780\"}]', 'ADMIN | ID: 1', 780, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 13:53:42'),
(46, '[{\"product_id\":\"LAB***AMY\",\"qty\":1,\"price\":\"850\"}]', 'FAMILY | ID: 3', 850, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 13:54:36'),
(47, '[{\"product_id\":\"LAB***AMY\",\"qty\":1,\"price\":\"850\"}]', 'FAMILY | ID: 3', 850, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 14:21:17'),
(48, '[{\"product_id\":\"LAB***ALCO\",\"qty\":1,\"price\":\"780\"}]', 'ADMIN | ID: 1', 780, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 14:22:45'),
(49, '[{\"product_id\":\"LAB***AMY\",\"qty\":1,\"price\":\"850\"}]', 'ADMIN | ID: 1', 850, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 14:26:17'),
(50, '[{\"product_id\":\"LAB***AMY\",\"qty\":1,\"price\":\"850\"}]', 'ADMIN | ID: 1', 850, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 14:28:27'),
(51, '[{\"product_id\":\"LAB***AMY\",\"qty\":1,\"price\":\"850\"},{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'ADMIN | ID: 1', 1150, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 14:33:36'),
(52, '[{\"product_id\":\"LAB***ALBUMIN\",\"qty\":1,\"price\":\"350\"}]', 'ECG | ID: 2', 350, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 14:41:57'),
(53, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'GENERAL | ID: 4', 300, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 14:49:24'),
(54, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'FAMILY | ID: 3', 300, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 14:49:43'),
(55, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'FAMILY | ID: 3', 300, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 14:57:42'),
(56, '[{\"product_id\":\"LAB***ALCO\",\"qty\":1,\"price\":\"780\"}]', 'ECG | ID: 2', 780, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 15:00:56'),
(57, '[{\"product_id\":\"LAB***ANA\",\"qty\":1,\"price\":\"1200\"}]', 'ECG | ID: 2', 1200, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 15:01:22'),
(58, '[{\"product_id\":\"LAB***ALBUMIN\",\"qty\":1,\"price\":\"350\"}]', 'ADMIN | ID: 1', 350, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 15:04:31'),
(59, '[{\"product_id\":\"LAB***ALCO\",\"qty\":1,\"price\":\"780\"}]', 'ADMIN | ID: 1', 780, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 15:06:34'),
(60, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'ECG | ID: 2', 300, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 15:08:05'),
(61, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'ECG | ID: 2', 300, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 15:08:24'),
(62, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'ADMIN | ID: 1', 300, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 15:12:41'),
(63, '[{\"product_id\":\"LAB***AMY\",\"qty\":1,\"price\":\"850\"}]', 'ADMIN | ID: 1', 850, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 15:15:15'),
(64, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'FAMILY | ID: 3', 300, 'DR. CHUA,ALJER  | ID: 25', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 15:19:43'),
(65, '[{\"product_id\":\"LAB***ALBUMIN\",\"qty\":1,\"price\":\"350\"}]', 'ECG | ID: 2', 350, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 15:23:02'),
(66, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'FAMILY | ID: 3', 300, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 15:26:31'),
(67, '[{\"product_id\":\"LAB***ANTIHBC(QUALITATIVE)\",\"qty\":1,\"price\":\"780\"}]', 'ECG | ID: 2', 780, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 15:27:42'),
(68, '[{\"product_id\":\"LAB***ALCO\",\"qty\":1,\"price\":\"780\"}]', 'ADMIN | ID: 1', 780, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 15:29:40'),
(69, '[{\"product_id\":\"LAB***ANA\",\"qty\":1,\"price\":\"1200\"}]', 'ADMIN | ID: 1', 1200, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 15:40:46'),
(70, '[{\"product_id\":\"LAB***ALCO\",\"qty\":1,\"price\":\"780\"}]', 'ADMIN | ID: 1', 780, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 15:44:06'),
(71, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'ADMIN | ID: 1', 300, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 15:46:16'),
(72, '[{\"product_id\":\"LAB***ALBUMIN\",\"qty\":1,\"price\":\"350\"}]', 'ADMIN | ID: 1', 350, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 15:47:22'),
(73, '[{\"product_id\":\"LAB***ALCO\",\"qty\":1,\"price\":\"780\"}]', 'FAMILY | ID: 3', 780, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 15:50:50'),
(74, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'ADMIN | ID: 1', 300, 'DR. CHUA,ALJER  | ID: 25', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 15:56:54'),
(75, '[{\"product_id\":\"LAB***AFB(SPUTUM)\",\"qty\":1,\"price\":\"350\"}]', 'ECG | ID: 2', 350, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 15:59:57'),
(76, '[{\"product_id\":\"LAB***ALCO\",\"qty\":1,\"price\":\"780\"}]', 'ADMIN | ID: 1', 780, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 16:03:16'),
(77, '[{\"product_id\":\"LAB***ALCO\",\"qty\":1,\"price\":\"780\"}]', 'ULTRASOUND | ID: 6', 780, 'DR. CHUA,ALJER  | ID: 25', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 16:05:42'),
(78, '[{\"product_id\":\"LAB***ALBUMIN\",\"qty\":1,\"price\":\"350\"}]', 'ECG | ID: 2', 350, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 16:06:50'),
(79, '[{\"product_id\":\"LAB***ALBUMIN\",\"qty\":1,\"price\":\"350\"}]', 'ECG | ID: 2', 350, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 16:07:16'),
(80, '[{\"product_id\":\"LAB***ALBUMIN\",\"qty\":1,\"price\":\"350\"}]', 'ADMIN | ID: 1', 350, 'DR. CHUA,ALJER  | ID: 25', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 16:12:02'),
(81, '[{\"product_id\":\"LAB***ANA\",\"qty\":1,\"price\":\"1200\"}]', 'ADMIN | ID: 1', 1200, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 16:16:59'),
(82, '[{\"product_id\":\"LAB***ALCO\",\"qty\":1,\"price\":\"780\"}]', 'ECG | ID: 2', 780, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 16:17:16'),
(83, '[{\"product_id\":\"LAB***ALCO\",\"qty\":1,\"price\":\"780\"}]', 'FAMILY | ID: 3', 780, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 16:19:53'),
(84, '[{\"product_id\":\"LAB***ALCO\",\"qty\":1,\"price\":\"780\"}]', 'ECG | ID: 2', 780, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 16:24:36'),
(85, '[{\"product_id\":\"LAB***AMY\",\"qty\":1,\"price\":\"850\"}]', 'ADMIN | ID: 1', 850, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 16:25:54'),
(86, '[{\"product_id\":\"LAB***AFB(SPUTUM)\",\"qty\":1,\"price\":\"350\"}]', 'ECG | ID: 2', 350, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 16:26:57'),
(87, '[{\"product_id\":\"LAB***ALK\",\"qty\":1,\"price\":\"300\"}]', 'ECG | ID: 2', 300, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 16:29:54'),
(88, '[{\"product_id\":\"LAB***AFB(SPUTUM)\",\"qty\":1,\"price\":\"350\"}]', 'ECG | ID: 2', 350, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 16:30:50'),
(89, '[{\"product_id\":\"LAB***ALCO\",\"qty\":1,\"price\":\"780\"}]', 'LAB | ID: 5', 780, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 16:31:53'),
(90, '[{\"product_id\":\"LAB***ALCO\",\"qty\":1,\"price\":\"780\"}]', 'ECG | ID: 2', 780, 'DR. CHUA,ALJER  | ID: 25', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 16:32:14'),
(91, '[{\"product_id\":\"LAB***ALBUMIN\",\"qty\":1,\"price\":\"350\"}]', 'ADMIN | ID: 1', 350, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 16:32:37'),
(92, '[{\"product_id\":\"LAB***BETAHCG\",\"qty\":1,\"price\":\"1080\"}]', 'FAMILY | ID: 3', 1080, 'DR. GONZALES,MELISSA  | ID: 23', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 16:50:13'),
(93, '[{\"product_id\":\"LAB***ALBUMIN\",\"qty\":1,\"price\":\"350\"}]', 'ECG | ID: 2', 350, 'DR MADAJE,MARICHUE  | ID: 24', 'Tester Tester,Tester Tester | ID: 379', '2023-09-08 16:54:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clinicuse_tb`
--
ALTER TABLE `clinicuse_tb`
  ADD PRIMARY KEY (`SalesID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clinicuse_tb`
--
ALTER TABLE `clinicuse_tb`
  MODIFY `SalesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
