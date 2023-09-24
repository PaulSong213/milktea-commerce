-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2023 at 05:43 AM
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
-- Table structure for table `backlog_tb`
--

CREATE TABLE `backlog_tb` (
  `backlogID` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `action` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `timeStamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `backlog_tb`
--

INSERT INTO `backlog_tb` (`backlogID`, `employeeID`, `action`, `description`, `timeStamp`) VALUES
(1, 379, 'Log In', 'User Log in', '2023-09-07 16:24:49'),
(9, 379, 'Room is  Occupied/Under Maintenance', 'Room is  Occupied/Under Maintenance', '2023-09-08 17:13:40'),
(10, 379, 'Room is  Available', 'Room is  Available', '2023-09-08 17:13:48'),
(11, 379, 'Unarchived Inventory Item', ' Unarchived Add Employee Data', '2023-09-08 17:14:20'),
(12, 379, 'Log out', 'User Log out', '2023-09-08 17:29:14'),
(13, 379, 'Log In', 'User Log in', '2023-09-08 17:31:20'),
(14, 379, 'Log out', 'User Log out', '2023-09-08 17:36:34'),
(15, 379, 'Log In', 'User Log in', '2023-09-08 21:26:39'),
(16, 379, 'Log In', 'User Log in', '2023-09-09 09:34:25'),
(17, 379, 'Log out', 'User Log out', '2023-09-09 09:47:13'),
(18, 379, 'Log In', 'User Log in', '2023-09-09 09:48:23'),
(19, 379, 'Log In', 'User Log in', '2023-09-09 09:54:34'),
(20, 379, 'Edit Employee Data', 'Edit Employee Data', '2023-09-09 11:18:21'),
(21, 379, 'Log out', 'User Log out', '2023-09-09 11:26:50'),
(22, 379, 'Log In', 'User Log in', '2023-09-09 11:26:56'),
(23, 379, 'Edit Personal Information', 'Edit Employee Data', '2023-09-09 13:13:40'),
(24, 379, 'Edit Personal Information', 'Edit Employee Data', '2023-09-09 13:16:36'),
(25, 379, 'Edit Personal Information', 'Edit Employee Data', '2023-09-09 13:18:42'),
(26, 379, 'Edit Personal Information', 'Edit Employee Data', '2023-09-09 13:20:33'),
(27, 379, 'Log out', 'User Log out', '2023-09-09 13:23:11'),
(28, 379, 'Log In', 'User Log in', '2023-09-09 13:23:16'),
(29, 379, 'Edit Personal Information', 'Edit Employee Data', '2023-09-09 13:38:10'),
(30, 379, 'Log out', 'User Log out', '2023-09-09 13:38:42'),
(31, 379, 'Log In', 'User Log in', '2023-09-09 13:38:58'),
(32, 379, 'Log out', 'User Log out', '2023-09-09 13:39:55'),
(33, 379, 'Log In', 'User Log in', '2023-09-09 13:40:00'),
(34, 379, 'Log out', 'User Log out', '2023-09-09 13:40:43'),
(35, 379, 'Log In', 'User Log in', '2023-09-09 13:40:48'),
(36, 379, 'Log In', 'User Log in', '2023-09-09 13:41:30'),
(37, 379, 'Edit Personal Information', 'Edit Employee Data', '2023-09-09 13:42:32'),
(38, 379, 'Log out', 'User Log out', '2023-09-09 13:42:38'),
(39, 379, 'Log In', 'User Log in', '2023-09-09 13:42:43'),
(40, 379, 'Edit Personal Information', 'Edit Employee Data', '2023-09-09 13:42:57'),
(41, 379, 'Log out', 'User Log out', '2023-09-09 13:43:02'),
(42, 379, 'Log In', 'User Log in', '2023-09-09 13:43:07'),
(43, 379, 'Log out', 'User Log out', '2023-09-09 13:43:31'),
(44, 379, 'Log In', 'User Log in', '2023-09-09 13:43:36'),
(45, 379, 'Log In', 'User Log in', '2023-09-09 14:06:17'),
(46, 379, 'Edit Personal Information', 'Edit Employee Data', '2023-09-09 14:06:29'),
(47, 379, 'Edit Personal Information', 'Edit Employee Data', '2023-09-09 14:08:52'),
(48, 379, 'Log out', 'User Log out', '2023-09-09 14:08:56'),
(49, 379, 'Log In', 'User Log in', '2023-09-09 14:09:02'),
(50, 379, 'Log out', 'User Log out', '2023-09-09 14:09:11'),
(51, 379, 'Log In', 'User Log in', '2023-09-09 14:09:16'),
(52, 379, 'Log out', 'User Log out', '2023-09-09 14:48:15'),
(53, 379, 'Log In', 'User Log in', '2023-09-09 14:48:27'),
(54, 379, 'Edit Personal Information', 'Edit Employee Data', '2023-09-09 15:02:28'),
(55, 379, 'Log out', 'User Log out', '2023-09-09 15:02:32'),
(56, 379, 'Log In', 'User Log in', '2023-09-09 15:39:00'),
(57, 379, 'Log In', 'User Log in', '2023-09-11 09:52:11'),
(58, 379, 'Log In', 'User Log in', '2023-09-11 10:49:12'),
(59, 379, 'Log In', 'User Log in', '2023-09-11 19:53:51'),
(60, 379, 'Add New Patient Data', 'Add New Patient Data  [Test1, TestFname]', '2023-09-11 20:17:56'),
(61, 379, 'Log In', 'User Log in', '2023-09-12 08:55:56'),
(62, 379, 'Log In', 'User Log in', '2023-09-12 10:42:59'),
(63, 379, 'Log In', 'User Log in', '2023-09-12 11:31:00'),
(64, 379, 'Log In', 'User Log in', '2023-09-12 11:35:32'),
(65, 379, 'Log In', 'User Log in', '2023-09-12 12:40:21'),
(66, 379, 'Edit Patient Data', 'Edit Patient Data ', '2023-09-12 13:20:28'),
(67, 379, 'Edit Patient Data', 'Edit Patient Data ', '2023-09-12 13:20:40'),
(68, 379, 'Add New Patient Data', 'Add New Patient Data  [Test1, itemTypeCode]', '2023-09-12 13:21:39'),
(69, 379, 'Edit Patient Data', 'Edit Patient Data ', '2023-09-12 13:23:13'),
(70, 379, 'Edit Patient Data', 'Edit Patient Data ', '2023-09-12 13:25:07'),
(71, 379, 'Edit Patient Data', 'Edit Patient Data ', '2023-09-12 13:44:34'),
(72, 379, 'Edit Patient Data', 'Edit Patient Data ', '2023-09-12 13:46:04'),
(73, 379, 'Edit Patient Data', 'Edit Patient Data ', '2023-09-12 13:46:40'),
(74, 379, 'Add New Patient Data', 'Add New Patient Data  [1234, 1234]', '2023-09-12 13:48:33'),
(75, 379, 'Log In', 'User Log in', '2023-09-13 20:52:03'),
(76, 379, 'Log In', 'User Log in', '2023-09-24 11:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `billing_tb`
--

CREATE TABLE `billing_tb` (
  `billingID` int(11) NOT NULL,
  `encoderID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `accountOfID` int(11) NOT NULL,
  `dateTimeAdmitted` datetime NOT NULL,
  `type` varchar(100) DEFAULT 'IPD',
  `attendingPhysicianID` int(11) NOT NULL,
  `admittingPhysicianID` int(11) NOT NULL,
  `dateTimeDischarged` datetime NOT NULL,
  `createDate` datetime NOT NULL DEFAULT current_timestamp(),
  `modifiedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing_tb`
--

INSERT INTO `billing_tb` (`billingID`, `encoderID`, `patientID`, `accountOfID`, `dateTimeAdmitted`, `type`, `attendingPhysicianID`, `admittingPhysicianID`, `dateTimeDischarged`, `createDate`, `modifiedDate`) VALUES
(1, 379, 1, 1, '2023-09-08 03:54:37', 'OPD', 23, 23, '2023-09-08 03:54:37', '2023-09-08 09:54:37', '2023-09-08 09:54:37'),
(2, 379, 4, 7, '0000-00-00 00:00:00', 'IPD', 23, 23, '0000-00-00 00:00:00', '2023-09-08 09:57:47', '2023-09-08 09:57:47'),
(3, 379, 1, 1, '2023-09-08 04:52:32', 'OPD', 23, 23, '2023-09-08 04:52:32', '2023-09-08 10:52:32', '2023-09-08 10:52:32'),
(4, 379, 2, 2, '2023-09-08 05:18:06', 'OPD', 23, 23, '2023-09-08 05:18:06', '2023-09-08 11:18:06', '2023-09-08 11:18:06'),
(5, 379, 1, 1, '2023-09-08 07:37:12', 'OPD', 23, 23, '2023-09-08 07:37:12', '2023-09-08 13:37:12', '2023-09-08 13:37:12'),
(6, 379, 1, 1, '2023-09-08 07:38:45', 'OPD', 23, 23, '2023-09-08 07:38:45', '2023-09-08 13:38:45', '2023-09-08 13:38:45'),
(7, 379, 1, 1, '2023-09-08 07:51:15', 'OPD', 23, 23, '2023-09-08 07:51:15', '2023-09-08 13:51:15', '2023-09-08 13:51:15'),
(8, 25, 2, 2, '2023-09-08 14:19:00', 'Out Patient Dept.', 23, 23, '0000-00-00 00:00:00', '2023-09-08 14:19:37', '2023-09-08 14:19:37'),
(9, 23, 2, 2, '2023-09-08 14:23:00', 'Out Patient Dept.', 25, 25, '0000-00-00 00:00:00', '2023-09-08 14:23:38', '2023-09-08 14:23:38'),
(10, 23, 4, 4, '2023-09-08 14:24:00', 'Out Patient Dept.', 24, 24, '0000-00-00 00:00:00', '2023-09-08 14:24:55', '2023-09-08 14:24:55'),
(11, 23, 3, 3, '2023-09-08 14:25:00', 'Out Patient Dept.', 31, 31, '0000-00-00 00:00:00', '2023-09-08 14:26:11', '2023-09-08 14:26:11'),
(12, 23, 2, 2, '2023-09-08 14:27:00', 'Out Patient Dept.', 27, 27, '0000-00-00 00:00:00', '2023-09-08 14:28:04', '2023-09-08 14:28:04'),
(13, 23, 2, 2, '2023-09-08 14:29:00', 'Out Patient Dept.', 24, 24, '0000-00-00 00:00:00', '2023-09-08 14:29:53', '2023-09-08 14:29:53'),
(14, 25, 1, 1, '2023-09-08 14:30:00', 'Out Patient Dept.', 29, 29, '0000-00-00 00:00:00', '2023-09-08 14:30:30', '2023-09-08 14:30:30'),
(15, 24, 2, 2, '2023-09-08 14:31:00', 'Out Patient Dept.', 24, 24, '0000-00-00 00:00:00', '2023-09-08 14:32:01', '2023-09-08 14:32:01'),
(16, 23, 2, 2, '2023-09-08 14:32:00', 'Out Patient Dept.', 24, 24, '0000-00-00 00:00:00', '2023-09-08 14:32:41', '2023-09-08 14:32:41'),
(17, 0, 1, 1, '2023-09-08 14:36:00', 'Out Patient Dept.', 23, 23, '0000-00-00 00:00:00', '2023-09-08 14:36:30', '2023-09-08 14:36:30'),
(18, 0, 1, 1, '2023-09-08 14:38:00', 'Out Patient Dept.', 27, 27, '0000-00-00 00:00:00', '2023-09-08 14:38:28', '2023-09-08 14:38:28'),
(19, 0, 2, 2, '2023-09-08 14:39:00', 'Out Patient Dept.', 25, 25, '0000-00-00 00:00:00', '2023-09-08 14:39:22', '2023-09-08 14:39:22'),
(20, 0, 2, 2, '2023-09-08 14:42:00', 'Out Patient Dept.', 25, 25, '0000-00-00 00:00:00', '2023-09-08 14:42:53', '2023-09-08 14:42:53'),
(21, 0, 1, 1, '2023-09-08 14:45:00', 'Out Patient Dept.', 29, 29, '0000-00-00 00:00:00', '2023-09-08 14:45:30', '2023-09-08 14:45:30'),
(22, 0, 2, 2, '2023-09-08 14:45:00', 'Out Patient Dept.', 28, 28, '0000-00-00 00:00:00', '2023-09-08 14:48:47', '2023-09-08 14:48:47'),
(23, 379, 2, 2, '2023-09-08 14:50:00', 'Out Patient Dept.', 25, 25, '0000-00-00 00:00:00', '2023-09-08 14:51:07', '2023-09-08 14:51:07'),
(24, 379, 2, 2, '2023-09-08 14:52:00', 'Out Patient Dept.', 27, 27, '0000-00-00 00:00:00', '2023-09-08 14:52:45', '2023-09-08 14:52:45'),
(25, 379, 2, 2, '2023-09-08 09:15:27', 'OPD', 24, 24, '2023-09-08 09:15:27', '2023-09-08 15:15:27', '2023-09-08 15:15:27'),
(26, 379, 2, 2, '2023-09-08 09:30:06', 'OPD', 23, 23, '2023-09-08 09:30:06', '2023-09-08 15:30:06', '2023-09-08 15:30:06'),
(27, 379, 2, 2, '2023-09-08 09:32:27', 'OPD', 23, 23, '2023-09-08 09:32:27', '2023-09-08 15:32:27', '2023-09-08 15:32:27'),
(28, 379, 3, 3, '2023-09-08 09:49:38', 'OPD', 23, 23, '2023-09-08 09:49:38', '2023-09-08 15:49:38', '2023-09-08 15:49:38'),
(29, 379, 3, 3, '2023-09-08 09:50:05', 'OPD', 23, 23, '2023-09-08 09:50:05', '2023-09-08 15:50:05', '2023-09-08 15:50:05'),
(30, 379, 3, 3, '2023-09-08 09:50:38', 'OPD', 23, 23, '2023-09-08 09:50:38', '2023-09-08 15:50:38', '2023-09-08 15:50:38'),
(31, 379, 1, 1, '2023-09-08 09:52:12', 'OPD', 23, 23, '2023-09-08 09:52:12', '2023-09-08 15:52:12', '2023-09-08 15:52:12'),
(32, 379, 1, 1, '2023-09-08 09:53:09', 'OPD', 23, 23, '2023-09-08 09:53:09', '2023-09-08 15:53:09', '2023-09-08 15:53:09'),
(33, 379, 1, 1, '2023-09-08 09:55:08', 'OPD', 23, 23, '2023-09-08 09:55:08', '2023-09-08 15:55:08', '2023-09-08 15:55:08'),
(34, 379, 1, 1, '2023-09-08 09:55:36', 'OPD', 23, 23, '2023-09-08 09:55:36', '2023-09-08 15:55:36', '2023-09-08 15:55:36'),
(35, 379, 1, 1, '2023-09-08 09:56:00', 'OPD', 23, 23, '2023-09-08 09:56:00', '2023-09-08 15:56:00', '2023-09-08 15:56:00'),
(36, 379, 1, 1, '2023-09-08 10:41:36', 'OPD', 23, 23, '2023-09-08 10:41:36', '2023-09-08 16:41:36', '2023-09-08 16:41:36'),
(37, 379, 6, 6, '2023-09-13 04:32:17', 'OPD', 25, 25, '2023-09-13 04:32:17', '2023-09-13 10:32:17', '2023-09-13 10:32:17');

-- --------------------------------------------------------

--
-- Table structure for table `clinicuse_tb`
--

CREATE TABLE `clinicuse_tb` (
  `SalesID` int(11) NOT NULL,
  `ProductInfo` text DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `NetAmt` int(11) DEFAULT NULL,
  `requestedBy` varchar(100) DEFAULT NULL,
  `enteredBy` varchar(100) DEFAULT NULL,
  `createDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `department_tb`
--

CREATE TABLE `department_tb` (
  `departmentID` int(11) NOT NULL,
  `departmentName` varchar(120) NOT NULL,
  `departmentDescription` varchar(250) NOT NULL,
  `AccessLevel` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department_tb`
--

INSERT INTO `department_tb` (`departmentID`, `departmentName`, `departmentDescription`, `AccessLevel`) VALUES
(1, 'ADMIN', 'Authority Access - Over-all Access', 4),
(2, 'ECG', 'Authority Access - Patient Data.', 1),
(3, 'FAMILY', 'Authority Access - Over-all Access', 4),
(4, 'GENERAL', 'General', 0),
(5, 'LAB', 'Laboratory', 1),
(6, 'ULTRASOUND', 'Ultrasound', 1),
(7, 'XRAY', 'X-Ray', 1),
(8, 'IT', 'Authority Access - Over-all Access', 4),
(10, 'CASHIER', 'Authority Access - Charge Slip, Payments, Inventory Data', 1),
(11, 'HUMAN RESOURCE', 'Authority Access - Employee Data.', 3),
(12, 'ACCOUNTING', 'Authority Access - Charge Slip, Payments, Inventory Data, Patient Data', 4);

-- --------------------------------------------------------

--
-- Table structure for table `employee_tb`
--

CREATE TABLE `employee_tb` (
  `DatabaseID` int(11) NOT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `mname` varchar(100) DEFAULT 'N/A',
  `title` varchar(100) DEFAULT NULL,
  `position` varchar(100) NOT NULL,
  `maritalStatus` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `bDate` date NOT NULL,
  `nickName` varchar(100) NOT NULL,
  `departmentID` int(11) NOT NULL,
  `dateStart` date NOT NULL,
  `createDate` datetime NOT NULL DEFAULT current_timestamp(),
  `modifiedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `userName` varchar(120) NOT NULL,
  `password` varchar(200) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  `isPassSet` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_tb`
--

INSERT INTO `employee_tb` (`DatabaseID`, `lname`, `fname`, `mname`, `title`, `position`, `maritalStatus`, `sex`, `bDate`, `nickName`, `departmentID`, `dateStart`, `createDate`, `modifiedDate`, `userName`, `password`, `Status`, `isPassSet`) VALUES
(23, 'GONZALES', 'MELISSA', '', 'DR.', 'Doctor', 'Married', 'Female', '0000-00-00', 'Isay', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(24, 'MADAJE', 'MARICHUE', '', 'DR', 'ROD', 'Married', 'Female', '0000-00-00', 'chue', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(25, 'CHUA', 'ALJER', '', 'DR.', 'Opha', 'Married', 'Male', '0002-02-02', 'ALJER', 4, '0009-04-04', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(26, 'PAVILLON', 'CECILA', '', 'DR.', 'OB-GYNE', 'Single', 'Female', '0000-00-00', 'CES', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(27, 'BERNARDO', 'BERNARDO', '', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'BERNIE', 4, '2011-01-05', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(28, 'CERVATES', 'MARIA CECILIA', '', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'CECILLE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(29, 'DAUIGOY', 'HELEN', '', 'DR.', 'OB-GYNE', 'Single', 'Female', '0000-00-00', 'HELEN', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(30, 'GERONA', 'JOVIE', '', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'JOVIE', 4, '0008-02-06', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(31, 'SONZA', 'SHIELA', '', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'SHIELA', 4, '0008-05-06', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(32, 'GARCIA', 'JANICE', '', 'DR.', 'GP', 'Single', 'Female', '0000-00-00', 'JAN', 4, '0002-10-07', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(33, 'DEL MUNDO', 'CHRISTIAN', '', 'DR.', 'GP', 'Single', 'Male', '0000-00-00', 'CHRIS', 4, '0002-12-03', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(34, 'VILORIA', 'ANNA MARIE', '', 'DR.', 'SURGEON', 'Single', 'Female', '0000-00-00', 'ANNE', 4, '2012-01-06', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(35, 'TANTOCO', 'CHRISTINE', '', 'DR.', 'OB-GYNE', 'Single', 'Female', '0000-00-00', 'CHRISTY', 4, '0002-01-07', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(36, 'VIZCARRA', 'VALARIE', '', 'DR.', 'Doctor', 'Single', 'Female', '0000-00-00', 'VAL', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(37, 'GALAURAN', 'MA. THERESA', '', 'MS.', 'nurse', 'Single', 'Female', '0000-00-00', 'IYA', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(38, 'OLAYA', 'LENNIE', '', 'DR.', 'MD', 'Married', 'Female', '0000-00-00', 'LYNN', 4, '2011-06-08', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(39, 'BAJELOT', 'MAY', '', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'MAY', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(40, 'HALILI', 'ERWIN ROMMEL', '', 'DR', 'MD', 'Single', 'Male', '0000-00-00', 'ERWIN', 4, '2010-02-09', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(41, 'BOLABOLA-CHING', 'MARI MARIVIN', '', 'DR.', 'MD', 'Married', 'Female', '0000-00-00', 'MARI', 4, '2011-07-09', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(42, 'DE GUZMAN', 'JENNIFER', '', 'Dra.', 'MD', 'Single', 'Female', '0000-00-00', 'Jenny', 4, '0003-11-09', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(43, 'GASCON', 'RALPH EDWARD', '', 'DR.', 'ROD', '', 'Male', '0000-00-00', 'ralph', 4, '0004-01-10', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(44, 'MALBUEZO', 'PRECIOUS', '', 'NURSE', 'nurse', 'Single', 'Female', '0000-00-00', 'FRESH', 4, '0005-03-10', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(45, 'LUTZ', 'SAMUEL', '', 'DR.', 'SURGEON', 'Married', 'Male', '0000-00-00', 'SAM', 4, '0008-12-19', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(46, 'REYES', 'ELAINE MARIE', '', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'ELAINE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(47, 'SALANGA', 'CYNTHIA KATHERINE', '', 'Dra.', 'ROD', 'Single', 'Female', '0000-00-00', 'CYNTHIA', 4, '0002-11-11', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(48, 'CARTAGO', 'REINALYN', '', 'Dra.', 'Pulmonologist', 'Single', 'Female', '0000-00-00', 'Reinalyn', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(49, 'DELATORRE', 'CLIFFORD', '', 'MR.', 'radtech', 'Single', 'Male', '0000-00-00', 'CLYDE', 4, '0007-01-20', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(50, 'ROSARIO', 'LILIAN', '', 'DR.', 'MD', 'Single', 'Female', '0000-00-00', 'LILIAN', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(51, 'MORTEL', 'EDGAR ORVEN', '', 'DR.', 'MD', 'Married', 'Male', '0000-00-00', 'ORVEN', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(52, 'LAGONILLA', 'SHERYLL', '', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'SHEL', 4, '2010-10-13', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(53, 'GALAGARAN', 'JAZEL', '', 'RN', 'rn', 'Single', 'Female', '0000-00-00', 'JAZ', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(54, 'MARIANO', 'JORGE', '', 'DR.', 'ROD', 'Single', 'Male', '0000-00-00', 'HORHE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(55, 'YAGUE', 'GLENN', '', 'DR.', 'ROD', 'Single', 'Male', '0000-00-00', 'GLENN', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(56, 'AGULLO', 'EDGAR', '', 'DR.', 'ENT', 'Married', 'Male', '0000-00-00', 'GAR', 4, '0009-01-14', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(57, 'ALMAGRO', 'BEVIS', '', 'DR.', 'ROD', 'Single', 'Male', '0000-00-00', 'BEVIS', 4, '0001-09-15', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(58, 'OCTAVIO', 'JOANN', '', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'JO-ANN', 4, '0004-10-15', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(59, 'UY', 'ROMEO', '', 'DR.', 'IM', 'Married', 'Male', '0000-00-00', 'ROMEO', 4, '0008-01-15', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(60, 'SALISE', 'GAYLE', '', 'Dra.', 'MD', 'Single', 'Female', '0000-00-00', 'GAYLE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(61, 'PALCONET', 'CEZAR', '', 'MR.', '', 'Married', 'Male', '0000-00-00', 'CEZAR', 4, '2010-01-15', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(62, 'SAMUDIO', 'JOHNMATHEW', '', 'MR.', 'ORDERLY', 'Single', 'Male', '0000-00-00', 'MATHEW', 4, '0002-02-16', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(63, 'GAMUS', 'CHRISTIAN', '', 'MR.', 'HR', 'Married', 'Male', '0000-00-00', 'CLG', 4, '0006-06-16', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(64, 'MOJICA', 'SANCHO JR.', '', 'MR', 'SECURITY GUARD', 'Married', 'Male', '0000-00-00', 'SONNY BOY', 4, '0009-05-16', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(65, 'SANTOS', 'LLEWELLYN', '', 'DR', 'ROD', 'Married', 'Male', '0000-00-00', 'LEWY', 4, '2011-01-16', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(66, 'BALMES', 'MARK JASON', '', 'MR', 'ORDERLY', 'Single', 'Male', '0004-06-19', 'JASON', 4, '0007-04-20', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(67, 'DELMUNDO', 'CLAIRE', '', 'RN', 'nurse', 'Single', 'Female', '0002-02-19', 'CLAIRE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(68, 'MUAJE', 'JONATHAN', '', 'MR.', 'GUARD', 'Married', 'Male', '0002-02-19', 'JONATAHN', 4, '0003-12-12', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(69, 'VARNAL', 'NEIL JHOWELL', '', 'DR.', 'ROD', 'Single', 'Male', '0000-00-00', 'JHOWELL', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(70, 'FLORESCA', 'JASON', '', 'DR.', 'ROD', 'Single', 'Male', '0000-00-00', 'JA-SON', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(71, 'ESTRADA', 'CIVER CHARM', '', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'CHARM', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(72, 'FERMIN', 'ANNA MAYLEEN', '', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'ANNAMAY', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(73, 'RANCAPERO', 'ROMAR', '', 'DR.', 'ROD', 'Single', 'Male', '0000-00-00', 'ROMAR', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(74, 'YOU', 'GRAZIELLA JEERAH', '', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'GRAZIELLA', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(75, 'DE CHAVEZ', 'CHRISTIAN VINCENT', '', 'DR.', 'ROD', 'Single', 'Male', '0000-00-00', 'VINCENT', 4, '0001-10-18', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(76, 'MONZON', 'JANDAVID', '', 'DR,', 'MD', 'Single', 'Male', '0000-00-00', 'JANDAVID', 4, '0003-10-18', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(77, 'CARAVEO', 'JULIEN NICOLE', '', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'JULIEN', 4, '0004-09-18', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(78, 'ILAHAN', 'RONALD', '', 'MR.', 'ORDERLY', 'Single', 'Male', '0000-00-00', 'REGAN', 4, '0008-08-18', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(79, 'AGUINALDO', 'LIZZI RAE GABRIELLE', '', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'LIZZI', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(80, 'GENERAL', 'CHRISTOPHER JOHN', '', 'DR.', 'ROD', 'Single', 'Male', '0000-00-00', 'CHRISTOPHER', 4, '0004-05-19', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(81, 'ANGELES', 'ROMULO', '', 'MR.', 'RAD TECH', 'Married', 'Male', '0000-00-00', 'ROMY', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(82, 'CAGUIAT', 'SOCORRO', '', 'DR.', 'OB-GYNE', 'Single', 'Female', '0000-00-00', 'SOCORRO', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(83, 'ARRONGANCIA', 'SALMIRO', '', 'MR.', 'MAINTENANCE', 'Married', 'Male', '0000-00-00', 'TOTO', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(84, 'DELEON', 'PAUL JOHN', '', 'MR.', 'ORDERLY', 'Single', 'Male', '0000-00-00', 'PJ', 4, '0004-12-21', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(85, 'CASH', '', '', '', 'CASH', 'Single', 'Female', '0000-00-00', 'CASH', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(86, 'BALAGTAS', 'KRIZEL VYRDEE', '', 'DR.', 'MD', 'Single', 'Female', '0000-00-00', 'KRIZEL', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(87, 'BUENAVISTA', 'RIA', '', 'MS.', 'HMO', 'Single', 'Female', '0000-00-00', 'YANG', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(88, 'LONDON', 'CANDACE', '', 'DR.', 'MD', 'Single', 'Female', '0000-00-00', 'CANDACE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(89, 'VILLACORTA', 'JEROME', '', 'DR.', 'MD', 'Single', 'Male', '0000-00-00', 'JEROME', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(90, 'MANZANO', 'VERNON JOSH', '', 'DR.', 'MD', 'Single', 'Male', '0000-00-00', 'JOSH', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(91, 'INOFERIO', 'FELITA', '', 'MS.', 'CG', 'Married', 'Female', '0000-00-00', 'FELY', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(92, 'SALVADOR', 'GILBERT', '', 'MR.', 'nurse', 'Single', 'Male', '0000-00-00', 'GILBERT', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(93, 'SANTOS', 'REGINALD', 'O.', 'DR.', 'ROD', 'Single', 'Male', '0000-00-00', 'REGGIE', 4, '0001-06-04', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(94, 'ALLAM', 'MYLENE AMANDA', 'B.', 'DR', 'ROD', 'Married', 'Female', '0000-00-00', 'MYLES', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(95, 'ALLAM', 'RENE', 'P', 'DR.', 'Pedia', 'Married', 'Male', '0000-00-00', 'RENE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(96, 'DE LEOZ', 'HELEN ASTRID', 'C.', 'DR.', 'Pedia', 'Single', 'Female', '0000-00-00', 'HELENE', 4, '0002-02-04', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(97, 'CLACION', 'JESSIE', 'T.', 'DR.', 'ROD', 'Single', 'Male', '0000-00-00', 'JES', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(98, 'RAURA', 'FRANCISCO', 'M', 'DR.', 'Ortho', 'Married', 'Male', '0000-00-00', 'KOKO', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(99, 'ALBAO', 'MARIA LOURDES', 'G.', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'MALOU', 4, '0007-09-04', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(100, 'SUBIDA', 'DARIUS CHRISTIAN', 'S', 'DR.', 'ROD', 'Single', 'Male', '0000-00-00', 'DARIUSH', 4, '2010-04-04', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(101, 'GRANTOS', 'EMERLITA', 'P.', 'DR.', 'ROD', 'Married', 'Female', '0000-00-00', 'EMS', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(102, 'LIM', 'BONIFACIO', 'O.', 'DR', 'ROD', 'Married', 'Male', '0000-00-00', 'BONI', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(103, 'ZARATE', 'ROCK', 'L.', 'MR.', '', 'Single', 'Male', '0002-02-02', 'ROCK', 4, '0002-02-02', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(104, 'DE LEON', 'KAREN GRACE', 'C', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'KAREN', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(105, 'HIMOC', 'RUBY', 'E.', 'DR.', 'OB-GYNE', 'Married', 'Female', '0000-00-00', 'RUBY', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(106, 'SELLORIQUEZ', 'NEIL', 'C.', 'DR.', 'ROD', 'Single', 'Male', '0000-00-00', 'NEIL', 4, '0004-07-06', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(107, 'MUTIA', 'JALILAH SALMA', 'B.', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'JYMAH', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(108, 'HISANAN', 'JENNIFER', 'S.', 'DR.', 'PEDIATRRICIAN', 'Single', 'Female', '0000-00-00', 'JENNIE', 4, '0009-05-20', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(109, 'EJERCITO', 'BARBARA ANN', 'H.', 'DR.', 'PEDIATRICIAN', 'Single', 'Female', '0000-00-00', 'BAMBI', 4, '2012-10-06', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(110, 'LIBUNAO', 'JASMINE', 'E.', 'DR.', 'Doctor', 'Married', 'Female', '0000-00-00', 'MIN', 4, '0003-03-07', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(111, 'MENDOZA', 'ELAISA', 'S.', 'DR.', 'PHYSICIAN', 'Single', 'Female', '0000-00-00', 'ELA', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(112, 'ELLEMA', 'JEMELLE', 'G.', 'DR.', 'Pedia', 'Married', 'Female', '0000-00-00', 'JEM', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(113, 'CASA', 'ROGELIO', 'A.', 'DR.', 'MD', 'Single', 'Male', '0000-00-00', 'ROGER', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(114, 'FERNANDEZ', 'SHARON', 'E.', 'DR.', 'PEDIATRICIAN', 'Married', 'Female', '0000-00-00', 'Lalon', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(115, 'LODANA', 'RAGVER', 'L', 'MR.', 'Driver', 'Married', 'Male', '0000-00-00', 'Ver', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(116, 'PULGAR-RUBY', 'KATHERINE', 'C.', 'DR.', 'MD', 'Married', 'Female', '0000-00-00', 'KATHY', 4, '0005-09-09', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(117, 'ONG', 'MA.FELINA', 'P.', 'RN', 'nurse', 'Single', 'Female', '0000-00-00', 'FAYE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(118, 'TROPEL', 'RAZZEL LOUISE', 'M', 'MS.', 'VOLUNTEER', 'Single', 'Female', '0000-00-00', 'RAZZEL', 4, '0009-01-09', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(119, 'VIDAL', 'CELESTE', 'B.', 'Dra.', 'ROD', 'Married', 'Female', '0000-00-00', 'lesley', 4, '0007-12-10', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(120, 'MENESES', 'JOANA MARIE', 'PUNLA', 'Dra.', 'PEDIATRICIAN', 'Single', 'Female', '0000-00-00', 'JOANA', 4, '0001-01-11', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(121, 'MARIANO', 'NEMELYN', 'C.', 'MS.', 'rn', 'Married', 'Female', '0000-00-00', 'NEM', 4, '0005-01-10', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(122, 'FAJARDO', 'RIA BLANCA', 'alfonso', 'MS', 'nurse', 'Single', 'Female', '0000-00-00', 'RIA', 4, '2010-01-11', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(123, 'DELOS SANTOS', 'ANATOLY', 'M.', 'DR.', 'MD', 'Married', 'Male', '0000-00-00', 'OLIE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(124, 'CELESTINO', 'JUAN CARLOS', 'CAMBAL', 'MR.', 'VOLUNTEER NURSE', 'Single', 'Male', '0000-00-00', 'JC', 4, '2011-01-11', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(125, 'AYONON-CHING', 'ELIZABETH ANNE', 'L.', 'Dra.', 'ROD', 'Single', 'Female', '0000-00-00', 'Lianne', 4, '0005-01-12', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(126, 'NAVIA', 'JHOANNA MARIE', 'C', 'MS.', 'nurse reliever', 'Single', 'Female', '0000-00-00', 'jhoan', 4, '0002-01-12', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(127, 'MANZON', 'LOU VER LEIGH', 'A.', 'DR.', 'Pedia', 'Single', 'Female', '0000-00-00', 'LEIGH', 4, '0003-01-12', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(128, 'GUTAY', 'LAWRENCE', 'B.', 'DR.', 'ROD', 'Single', 'Male', '0000-00-00', 'Law', 4, '0008-10-12', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(129, 'SAN JUAN', 'JOANA', 'B.', 'Dra.', 'MD.', 'Single', 'Female', '0000-00-00', 'A.', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(130, 'JARA', 'AARON JAMES', 'A.', 'MR.', 'nurse', 'Single', 'Male', '0000-00-00', 'aaron', 4, '2010-01-12', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(131, 'NAZARENO', 'REGINA', 'B.', 'MS.', '', 'Single', 'Female', '0000-00-00', 'REGINE', 4, '0008-10-12', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(132, 'GUTIERREZ', 'MARIA CARMELYN', 'P.', 'Dra.', 'ROD', 'Single', 'Female', '0000-00-00', 'DRA. LYN', 4, '2011-12-12', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(133, 'NERPIOL', 'CHRISTIAN CEASAR', 'D.', 'DR.', 'ROD', 'Single', 'Male', '0000-00-00', 'CHRISTIAN', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(134, 'REYES', 'ALDRINE JAY', 'M', 'MR.', 'radtech', 'Single', 'Male', '0000-00-00', 'ALDRINE', 4, '0008-06-12', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(135, 'CASTOR', 'JACQUELINE ROSE', 'C.', 'MS.', 'X-RAY TECH.', 'Married', 'Female', '0000-00-00', 'JACKY', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(136, 'DUNGCA', 'ANNA MURIELLE', 'B.', 'DR.', 'Pedia', 'Single', 'Female', '0000-00-00', 'ANNA', 4, '2010-11-12', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(137, 'ESPIRITU', 'ARLENE', 'B.', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'ARLENE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(138, 'NIRO', 'MA. LUISA', 'R.', 'MS.', 'Utility', 'Single', 'Female', '0000-00-00', 'LUISA', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(139, 'CABBO', 'ROGELINE', 'L.', 'MS.', 'accountant', 'Married', 'Female', '0000-00-00', 'ROGE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(140, 'FERNANDEZ', 'MICHAEL', 'V.', 'DR.', 'MD', 'Married', 'Male', '0000-00-00', 'DOC. MIKE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(141, 'SAYAT', 'SHEILLA', 'R.', 'Dra.', 'ROD', 'Single', 'Female', '0000-00-00', 'ELLA', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(142, 'GLORIOSO', 'MA. CARINA', 'S.', 'Dra.', 'ENT', 'Single', 'Female', '0000-00-00', 'CARINA', 4, '2010-10-13', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(143, 'GO', 'DIANA JEANNE', 'A.', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'DIANA', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(144, 'BALILA', 'ERICSON', 'G.', 'MR.', 'Utility', 'Married', 'Male', '0000-00-00', 'ERIC', 4, '0004-07-14', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(145, 'AGUILAR', 'ALENNA VENISSE', 'A.', 'MS.', 'rn', 'Single', 'Female', '0000-00-00', 'LEN', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(146, 'ALCAZAR', 'DISRAELI', 'R.', 'MR.', 'GUARD', 'Married', 'Male', '0000-00-00', 'DISRAELI', 4, '0004-04-14', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(147, 'MADELO', 'MA.THERESA', 'S.', 'MS.', 'radtech', 'Single', 'Female', '0000-00-00', 'TERE', 4, '0004-01-14', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(148, 'AGULLO', 'JERELOU', 'A.', 'DR.', 'Pedia', 'Married', 'Female', '0001-07-19', 'JERELOU', 4, '0009-08-14', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(149, 'ROCERO', 'ALPHA LOUIE', 'E.', 'DR.', 'ROD', 'Single', 'Male', '0000-00-00', 'LOUIE', 4, '2011-11-14', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(150, 'CLAVE', 'LOUISE CAMILLE', 'S.', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'CAMILLE', 4, '0002-06-15', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(151, 'MORILLO', 'JELYN', 'D.', 'MS.', 'MED. TECH. STAFF', 'Single', 'Female', '0000-00-00', 'JHEL', 4, '0003-10-14', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(152, 'ABARQUEZ', 'NILO', 'H.', 'MR.', 'CONSTRUCTION', 'Married', 'Male', '0000-00-00', 'NILO', 4, '0009-01-08', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(153, 'RAMOS', 'CLAUDINE JOY', 'M.', 'Dra.', 'MD', 'Single', 'Female', '0000-00-00', 'CLAUD', 4, '2010-12-15', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(154, 'PILATON', 'NILDA', 'BATOY', 'MS.', 'BOOKKEEPER', 'Single', 'Female', '0000-00-00', 'NHILDZ', 4, '2010-01-15', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(155, 'GALVEZ', 'DANILO', 'P.', 'DR', 'ROD', 'Married', 'Male', '0000-00-00', 'DANNY', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(156, 'MARIN', 'DIEGO', 'S.', 'MR', 'Driver', 'Single', 'Male', '0000-00-00', 'DIEGO', 4, '2010-08-16', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(157, 'SALINAS', 'CORAZON', 'T.', 'DR.', 'ROD', 'Married', 'Female', '0000-00-00', 'CORA', 4, '0001-02-17', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(158, 'PAGTAKHAN', 'MA. NICA RIELLE', 'D.', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'NICA', 4, '0005-01-16', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(159, 'EBISAWA', 'NAGATOSHI', 'M.', 'DR.', 'ROD', 'Single', 'Male', '0000-00-00', 'TOSHI', 4, '2010-10-17', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(160, 'GARCIA', 'MARY GRACE', 'J.', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'GRACE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(161, 'ELSEARIO', 'KATHLEEN MAY', 'V.', 'DR', 'ROD', 'Single', 'Female', '0000-00-00', 'KATH', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(162, 'GABORNES', 'NIMROD', 'EDER', 'DR.', 'ROD', 'Single', 'Male', '0000-00-00', 'NIMROD', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(163, 'DE JESUS', 'CZARINA JEAN', 'B.', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'CZARINA', 4, '2012-05-17', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(164, 'JAMILIG', 'MENCHITA', 'P.', 'DR.', 'ROD', 'Married', 'Female', '0000-00-00', 'MENCHI', 4, '2012-12-17', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(165, 'REYES', 'JORDAN GABRIEL ANGELO', 'DONESA', 'DR.', 'ROD', 'Single', 'Male', '0000-00-00', 'JORDAN', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(166, 'SALES', 'APRIL ROSE', 'M.', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'APRIL', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(167, 'SOLIVEN', 'BRIAN CHRISTIAN', 'A.', 'DR.', 'ROD', 'Single', 'Male', '0000-00-00', 'BRIAN', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(168, 'BIDUA', 'KATHLEEN NICOLE', 'B.', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'NICOLE', 4, '0001-09-18', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(169, 'LOPEZ', 'BERNARDINO', 'E.', 'MR', 'GUARD', 'Married', 'Male', '0000-00-00', 'BERN', 4, '0002-02-20', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(170, 'DAZO', 'IRWIN PAOLO', 'C.', 'DR.', 'GP', 'Single', 'Male', '0000-00-00', 'IRWIN', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(171, 'CEPIDA', 'GLADY JOY', 'B', 'MS', 'nurse', 'Single', 'Female', '0000-00-00', 'GJ', 4, '0007-01-17', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(172, 'FAJARDO', 'REVIE ANNE', 'C.', 'DR.', 'MD', 'Single', 'Female', '0000-00-00', 'REVIE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(173, 'SAMPOLEO', 'NIKAELA', 'R.', 'DR.', 'MD', 'Single', 'Female', '0000-00-00', 'NIKAELA', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(174, 'ROJAS', 'VENUS MARIE', 'R.', 'DR', 'ROD', 'Single', 'Female', '0000-00-00', 'VENUS', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(175, 'SANTOS', 'MARIA ANDREA', 'N.', 'Dra.', 'ROD', 'Single', 'Female', '0000-00-00', 'ANDREA', 4, '0004-06-18', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(176, 'ISMAN', 'AINA VERONICA', 'A.', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'AINS', 4, '0004-12-18', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(177, 'CALIMAG', 'LOWIE', 'B.', 'DR.', 'ROD', 'Single', 'Male', '0000-00-00', 'LOWIE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(178, 'MOLDEZ', 'SHARON WINNIE', 'M.', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'WINNIE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(179, 'DALISAY', 'CHUCHI', 'E', 'DR.', 'OB-GYNE', 'Married', 'Female', '0000-00-00', 'CHUCHI', 4, '0009-01-18', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(180, 'FERIL', 'NATASHIA SUZANNE', 'M.', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'SUZANNE', 4, '0003-06-19', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(181, 'CANAVERAL', 'KATRINA', 'GRANDEZA', 'DR', 'OB', 'Married', 'Female', '0000-00-00', 'KATRINA', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(182, 'LUA', 'JARDINE', 'S', 'DR.', 'URO', 'Single', 'Female', '0000-00-00', 'JARDINE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(183, 'VILLELA', 'JACQUELINE', 'SION', 'MS.', 'rn', 'Married', 'Female', '0000-00-00', 'JACK', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(184, 'DULAY', 'MARYGRACE', 'W', 'DR', 'ROD', 'Married', 'Female', '0002-02-19', 'GARCE', 4, '0007-01-20', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(185, 'MADRIAGA', 'EDLEN JOAN', 'A.', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'EDLEN', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(186, 'NEGRILLO', 'ERNESTO JR.', 'O', 'DR', 'ROD', 'Married', 'Male', '0000-00-00', 'ERNESTO', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(187, 'CHUA', 'ELIJAH NETHANIEL', 'R.', 'DR.', 'ROD', 'Single', 'Male', '0000-00-00', 'ELIJAH', 4, '2011-11-19', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(188, 'DELA TORRE', 'MARY ANTONIETTE', 'TINGSON', 'Dra.', 'MD', 'Single', 'Female', '0000-00-00', 'ANTONIETTE', 4, '0002-02-20', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(189, 'GIMOTEA', 'LIONORA', 'ETCHONA', 'MS.', 'rn', 'Married', 'Female', '0000-00-00', 'NORA', 4, '2011-01-17', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(190, 'CAISIP', 'JASMIN', 'S', 'RMT', 'Med Tech', 'Single', 'Female', '0000-00-00', 'JAS', 4, '2011-06-18', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(191, 'CRISTOBAL', 'ANGELICA', 'BELEN', 'MS.', 'ADM.', 'Married', 'Female', '0000-00-00', 'ANJI', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(192, 'OBINA', 'SHANE ALYSSA', 'D.', 'DR.', 'MD', 'Single', 'Female', '0000-00-00', 'SHANE', 4, '0008-01-20', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(193, 'DE LOS REYES', 'ROBYNE MAE', 'S.', 'DR.', 'MD', 'Single', 'Female', '0000-00-00', 'ROB', 4, '0006-06-22', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(194, 'BUENCONSEJO', 'FRANCIS ANNICOLE', 'ALFARO', 'MS.', 'MR', 'Married', 'Female', '0000-00-00', 'ANNICOLE', 4, '0001-03-22', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(195, 'MARASIGAN', 'DIANE AYRA', 'ILAGAN', 'Dra.', 'MD', 'Single', 'Female', '0000-00-00', 'DIANE', 4, '0006-01-22', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(196, 'INDANG', 'INDANG', 'I.', '', 'BY', 'Married', 'Male', '0000-00-00', 'INDANG', 4, '0003-02-05', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(197, 'BY PHONE', 'PHONE', 'P', '', 'BY', 'Single', 'Male', '0000-00-00', 'PHONE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(198, 'APRUEBA', 'MARISSA', 'M.', 'MS.', 'nurse', 'Married', 'Female', '0000-00-00', 'Mariz', 4, '0008-07-06', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(199, 'CLINIC', 'CASIMIRO', 'Z', 'MS', '', 'Single', 'Female', '0000-00-00', 'ZMDC', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(200, 'BALDIVINO', 'ANALYN', 'Nopal', 'MS.', 'Nursing Attendant', 'Single', 'Female', '0000-00-00', 'DINA', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(201, 'MENDOZA', 'ADRIAN', 'O.', 'DR.', 'ROD', 'Single', 'Male', '0000-00-00', 'ADRIAN', 4, '2011-10-05', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(202, 'BAYDAL', 'LEORIZA', 'O.', 'MS.', 'nurse', 'Single', 'Female', '0000-00-00', 'TATA', 4, '2010-03-05', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(203, 'PINOON', 'LIWAYWAY', 'V.', 'MS.', 'Med. Records', 'Single', 'Female', '0000-00-00', 'LIWAY', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(204, 'LOPEZ', 'RAQUEL', 'B.', 'MS.', 'nurse', 'Married', 'Female', '0000-00-00', 'RAX', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(205, 'ZARATE', 'EDGAR', 'Lising', 'DR.', 'Med. Director', 'Married', 'Male', '0000-00-00', 'Ed', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(206, 'ZARATE', 'JOAN', 'sy', 'DR.', 'Doctor', 'Married', 'Female', '0000-00-00', 'Johj', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(207, 'REYES', 'VILMA', 'J', 'MS.', 'Clinical Adm.', 'Married', 'Female', '0000-00-00', 'Vi', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(208, 'GAYAMO', 'MARI JOAN', 'P', 'MS', 'Midwife', 'Married', 'Female', '0000-00-00', 'Joan', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(209, 'CLEMENCIA', 'MA.REVELINA', 'P', 'MS.', 'Midwife', 'Single', 'Female', '0000-00-00', 'Lyn', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(210, 'LABATIAO', 'AURA', 'P', 'MS.', 'Head Nurse', 'Married', 'Female', '0000-00-00', 'Au', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(211, 'JOMPILLfA', 'CHERRYLYN', 'P', 'MS.', 'Cashier', 'Single', 'Female', '0000-00-00', 'Che', 4, '0008-05-03', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(212, 'BUNGABONG', 'JORGE', 'A', 'MR.', 'Med Tech', 'Single', 'Male', '0000-00-00', 'Jorge', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(213, 'SALVACION', 'CHRISTINE MARIE', 'S', 'MS.', 'nurse', 'Married', 'Female', '0000-00-00', 'Mutz', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(214, 'DELA TORRE', 'ARMANDO', 'T', 'MR.', 'Nursing Attendant', 'Single', 'Male', '0000-00-00', 'Arman', 4, '2010-03-02', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(215, 'SAN JUAN', 'MIRASOL', 'B', 'DR.', 'Doctor', 'Married', 'Female', '0000-00-00', 'Sol', 4, '0005-12-03', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(216, 'VILLELA', 'ARNOLD', 'K', 'MR.', 'Liason officer', 'Married', 'Male', '0000-00-00', 'Arnold', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(217, 'ABUNDIO', 'MAESTRAIDO', '', 'MR.', 'Driver', 'Married', 'Male', '0000-00-00', 'Joey', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(218, 'MONTALES', 'EMIL', 'F', 'MR.', 'Utility Man', 'Single', 'Male', '0000-00-00', 'Boyet', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(219, 'BUGUIA', 'ANA', '', 'MS.', 'Midwife', 'Married', 'Female', '0000-00-00', 'Ana', 4, '2010-01-03', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(220, 'PRADO', 'DAISY', 'B', 'MRS.', 'accountant', 'Married', 'Female', '0000-00-00', 'Dai', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(221, 'ALLERE', 'RONALD', 'L', 'MR.', 'Driver', 'Married', 'Male', '0000-00-00', 'RONALD', 4, '0001-03-04', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(222, 'SY', 'JEOSEN', 'L', 'MS.', '', '', 'Female', '0000-00-00', 'jeo', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(223, 'SALVACION', 'RODEL', 'G.', 'MR.', 'Driver', 'Married', 'Male', '0000-00-00', 'RODEL', 4, '0002-09-04', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(224, 'ALAPAR', 'ROSEMARIE', 'C.', 'MS.', 'Midwife', 'Single', 'Female', '0000-00-00', 'Rose', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(225, 'BANDONG', 'MYLENE', 'Posadas', 'MS.', 'Pharmacist', 'Single', 'Female', '0000-00-00', 'MYE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(226, 'NAVARRO', 'EVELYN', 'C.', 'MS.', 'nurse', 'Married', 'Female', '0000-00-00', 'Evie', 4, '0003-01-04', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(227, 'SESNO', 'ANA LISA', 'B.', 'MS.', 'Secretary', 'Single', 'Female', '0000-00-00', 'LIEZL', 4, '0006-01-04', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(228, 'SION', 'MA.JHONALINE', 'B.', 'MS.', 'Midwife', 'Single', 'Female', '0000-00-00', 'jona', 4, '0001-01-02', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(229, 'TUMBIGA', 'RENY', 'M.', 'MR.', 'Utility', 'Single', 'Male', '0000-00-00', 'UNDO', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(230, 'MOMO', 'RANIL', 'M.', 'MR.', 'Utility Man', 'Single', 'Male', '0000-00-00', 'DADO', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(231, 'GICARO', 'RODELEN', 'Z', 'MS.', 'nurse', 'Married', 'Female', '0000-00-00', 'DELEN', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(232, 'BAUTISTA', 'MARISSA', 'D.', 'MS.', 'nurse', 'Single', 'Female', '0000-00-00', 'IZA', 4, '0008-12-04', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(233, 'ALEJO', 'JANA JET', '', 'MS.', 'MT', 'Single', 'Female', '0000-00-00', 'JANA', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(234, 'GICARO', 'ENRICO', 'E.', 'MR.', 'Cashier', 'Married', 'Male', '0000-00-00', 'RICO', 4, '0002-09-05', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(235, 'CARACAS', 'CARACAS', 'C.', '', 'BY', 'Single', 'Male', '0000-00-00', 'CARACAS', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(236, 'SORIANO', 'FLORDELIZ', 'B.', 'MS.', 'Cashier', 'Single', 'Female', '0000-00-00', 'FLOR', 4, '2012-05-05', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(237, 'ZARATE', 'FAMILY', 'sy', '', '', 'Married', 'Male', '0000-00-00', 'ZARATE FAMILY', 4, '0001-01-06', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(238, 'LUGTO', 'MENANDRO', 'V.', 'MR.', '', 'Married', 'Male', '0000-00-00', 'NANDY', 4, '0001-11-06', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(239, 'LAFUENTE', 'RONELIA', 'C.', 'MS', 'nurse', 'Married', 'Female', '0000-00-00', 'NEL', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(240, 'ELTAGON', 'LEA', 'L.', 'MS', 'Med. Records', 'Single', 'Female', '0000-00-00', 'Yang2x', 4, '2010-04-05', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(241, 'PANO', 'REINHART', 'A.', 'MR.', 'MT', 'Widowed', 'Male', '0000-00-00', 'REIN', 4, '2012-01-03', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(242, 'ORLANDA', 'MARY ANN', 'B.', 'DR.', 'OB-GYNE', 'Married', 'Female', '0000-00-00', 'ME-ANN', 4, '0001-05-06', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(243, 'VILLELA', 'EDGARDO', 'K.', 'MR.', 'SG', 'Married', 'Male', '0000-00-00', 'Edgar', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(244, 'UNDAO', 'ALVIE', 'A.', 'MS.', 'Cook', 'Married', 'Female', '0000-00-00', 'BEBING', 4, '0002-02-06', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(245, 'LAMBAN', 'MARJORIE', 'L.', 'DR.', 'ROD', 'Married', 'Female', '0000-00-00', 'MARJ', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(246, 'PICARDAL', 'JONALYN', 'B', 'MS.', 'Midwife', 'Single', 'Female', '0000-00-00', 'NALYN', 4, '0005-07-06', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(247, 'PITOGO', 'NENA', '', 'MS.', '', 'Married', 'Female', '0000-00-00', 'NANAY', 4, '0004-10-06', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(248, 'FUECONCILLO', 'CONCEPCION', 'C.', 'MS.', 'nurse', 'Married', 'Female', '0000-00-00', 'Sally', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(249, 'LAURINARIA', 'ROSE', 'B.', 'MS.', 'nurse', 'Single', 'Female', '0000-00-00', 'ROSS', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(250, 'MARIN', 'ANGELYNE', 'G', 'MS.', 'nurse', 'Single', 'Female', '0000-00-00', 'ANGIE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(251, 'TROVELA', 'SHEILA', 'S.', 'DR.', 'ROD', 'Single', 'Female', '0000-00-00', 'SHAI', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(252, 'ALVIZA', 'SWEETLANA', 'G.', 'MS.', 'nurse', 'Single', 'Female', '0000-00-00', 'SWEET', 4, '0009-11-06', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(253, 'BASICAL', 'MARIA LUZ', 'R.', 'MS.', 'Utility', 'Married', 'Female', '0000-00-00', 'MARILOU', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(254, 'CAMACHO', 'RAMON', '', 'MR', '', 'Single', 'Male', '0000-00-00', 'RAMON', 4, '2011-01-06', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(255, 'FERNANDEZ', 'ROMA JOYCE', 'Ortiz', 'MS.', 'Cashier', 'Single', 'Female', '0000-00-00', 'mhay', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(256, 'Villania', 'Sheilah', 'B.', 'MS.', 'Midwife/ Bookeeper', 'Widowed', 'Female', '0000-00-00', 'Shei', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(257, 'RUYANDUYAN', 'MERYLIZA', '', 'MS.', 'NA', 'Single', 'Female', '0000-00-00', 'LIZA', 4, '0009-11-07', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(258, 'CATALAN', 'JANET', '', 'MS.', 'Utility', 'Single', 'Female', '0000-00-00', 'JANET', 4, '0004-11-08', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(259, 'NAVAREZ', 'CYRIL', 'R.', 'MS.', 'Cashier', 'Single', 'Female', '0000-00-00', 'CY', 4, '2011-02-08', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(260, 'PAELDON', 'GIDGET', 'B.', 'MS.', 'Cashier', 'Single', 'Female', '0000-00-00', 'gidget', 4, '2011-04-08', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(261, 'CORRAL', 'GYPSY', 'S.', 'MRS', 'XRAY-TECH', 'Married', 'Female', '0000-00-00', 'GYPS', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(262, 'ZARATE', 'TARAH', 'T.', 'MS.', 'HR', 'Single', 'Female', '0000-00-00', 'TARAH', 4, '0009-01-08', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(263, 'MORTALLA', 'DAHLIA', 'R.', 'MS.', 'nurse', 'Single', 'Female', '0000-00-00', 'DAHLIA', 4, '2010-01-08', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(264, 'PABAYOS', 'GUINEVERE', 'S', 'DR.', 'MD', 'Single', 'Female', '0000-00-00', 'Guive', 4, '0003-10-08', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(265, 'RAMOS', 'NEUMIR', 'MIRALLES', 'MR.', 'STAFF NURSE', 'Single', 'Male', '0000-00-00', 'NEUMIR', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(266, 'MORENO', 'LEAH MAY', 'C.', 'MS.', 'STAFF NURSE', 'Single', 'Female', '0000-00-00', 'LEAH', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(267, 'GENTILES', 'JAYSON', 'A.', 'MR.', 'STAFF NURSE', 'Single', 'Male', '0000-00-00', 'JAY', 4, '0001-01-09', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(268, 'BERCASIO', 'PABLO', 'B', 'MR.', 'NURSING AID', 'Single', 'Male', '0000-00-00', 'PABS', 4, '0005-01-09', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(269, 'DELA PAZ', 'BEVERLY ANN', 'M.', 'RN', 'STAFF NURSE', 'Single', 'Female', '0000-00-00', 'BHEBZ', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(270, 'ALER', 'JAN MICHAEL', 'B.', 'DR.', 'MD', 'Single', 'Male', '0008-08-20', 'MICHAEL', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(271, 'TALAMPAS', 'MARILOU', '', 'MS.', 'Janitress', 'Married', 'Female', '0000-00-00', 'LOU', 4, '0008-03-09', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(272, 'OLITA', 'MARK VINCENT', 'O', 'NURSE', 'STAFF NURSE', 'Single', 'Male', '0000-00-00', 'VINCE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(273, 'BACANI', 'RICARDO JR.', 'C', 'DR.', 'ROD', 'Single', 'Male', '0000-00-00', 'RICARDO', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(274, 'ANASTACIO', 'MERISSA', 'V.', 'MS', 'nurse', 'Single', 'Female', '0000-00-00', 'MERIS', 4, '0007-12-09', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(275, 'GALAURAN', 'JOHN VINCENT', 'sy', 'MR', 'STAFF NURSE', 'Single', 'Male', '0000-00-00', 'JOHN', 4, '0008-01-08', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(276, 'GARCIA', 'RONALD', 'maravillas', 'radtech', 'radtech', 'Single', 'Male', '0000-00-00', 'ron', 4, '2010-01-09', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(277, 'REYES', 'MEDROSS', 'P.', 'REGISTERED MIDWIFE', 'Cashier', 'Married', 'Female', '0000-00-00', 'MEDS', 4, '2011-06-09', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(278, 'ORTEGA', 'JESETT', 'S.', 'MS.', 'nurse', 'Single', 'Female', '0000-00-00', 'Jesett', 4, '0009-01-09', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(279, 'CABIDO', 'JENNILYN', 'baldoza', 'MS.', '', 'Single', 'Female', '0000-00-00', 'jen', 4, '2012-04-09', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(280, 'GOMEZ', 'AIZA', 'R.', 'MS.', 'nurse', 'Single', 'Female', '0000-00-00', 'aiza', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(281, 'MUNOZ', 'MICHAEL', '', 'DR.', 'OTHOPEDIC SURGEON', 'Single', 'Male', '0000-00-00', 'MICAHEL', 4, '2012-01-09', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(282, 'TIAMSON', 'CHRISTELLE KEITH', 'D.', 'Miss', 'nurse', 'Single', 'Female', '0000-00-00', 'keith', 4, '0009-03-20', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(283, 'ANASTACIO', 'GRACE INEE', 'VALENZUELA', 'MS.', 'nurse', 'Single', 'Female', '0000-00-00', 'INEE', 4, '0007-12-09', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(284, 'REYES', 'RAYMOND', 'B.', 'MR.', 'Driver', 'Single', 'Male', '0000-00-00', 'mhon', 4, '0006-09-09', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(285, 'DEL ROSARIO', 'EDLO', '', 'MR.', 'nurse', 'Single', 'Male', '0000-00-00', 'loi', 4, '0001-01-10', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(286, 'LOPEZ', 'KRIZELLE', 'N.', 'MS.', 'STAFF NURSE', 'Single', 'Female', '0000-00-00', 'KRIZ', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(287, 'ALZAGA', 'BLANDY', 'n', 'MR', 'radtech', 'Single', 'Male', '0000-00-00', 'blands', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(288, 'TAN', 'JEFFREY', 'v', '', 'nurse', 'Single', 'Male', '0000-00-00', 'jeff', 4, '0002-01-10', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(289, 'VILLEGAS', 'MICHAEL', 'B.', 'MR.', 'STAFF NURSE', 'Single', 'Male', '0000-00-00', 'Mike', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(290, 'PAGGAO', 'JOSEPH', '', 'MR.', 'Driver', 'Married', 'Male', '0000-00-00', 'JOSEPH', 4, '0003-01-10', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(291, 'TABAFUNDA', 'MARIVIC', 'Errua', 'MS.', 'Cashier', 'Single', 'Female', '0000-00-00', 'mvic', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(292, 'SAMONTE', 'AILEEN', '', 'MS', 'Janitress', 'Single', 'Female', '0000-00-00', 'AILEEN', 4, '2011-11-09', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(293, 'SOGOCIO', 'AIZA', 'L.', 'RT', 'RT', 'Single', 'Female', '0000-00-00', 'ICE', 4, '0006-01-10', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(294, 'LOCAYLOCAY', 'CHARLENE ROBELLE', 'L.', 'Dra', 'ROD', 'Single', 'Female', '0000-00-00', 'Charlene', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(295, 'HERNANDEZ', 'HONEY KEITH', 'R.', 'MS.', 'STAFF NURSE', 'Single', 'Female', '0000-00-00', 'HONEY', 4, '2012-06-09', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(296, 'ARROGANCIA', 'ROBERTO', '', 'MR', 'MAINTENANCE', 'Single', 'Male', '0000-00-00', 'JUN-JUN', 4, '0008-12-10', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(297, 'OCAMPO', 'NATHAN', 'M.', 'MR.', 'nurse', 'Single', 'Male', '0000-00-00', 'nath', 4, '0009-01-10', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(298, 'DELA CRUZ', 'SHEENA', 'Limpiada', 'RN', 'nurse', 'Single', 'Female', '0000-00-00', 'shyn', 4, '0005-01-10', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(299, 'ZARATE', 'MARIAM NATHALIE', 'T', 'MS.', 'CMO', 'Single', 'Female', '0000-00-00', 'YAM', 1, '2010-01-10', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(300, 'LUGTO', 'GINA', '', 'MS.', 'accountant', 'Married', 'Female', '0000-00-00', 'Gina', 4, '0006-12-20', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(301, 'RECTO', 'RODERICK', 'P.', 'MR.', 'nurse', 'Single', 'Male', '0000-00-00', 'ODICK', 4, '2011-01-11', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(302, 'PAGADOR', 'MARYLLAINE JOANNE', 'LOPEZ', 'MS', 'nurse', 'Single', 'Female', '0000-00-00', 'JOY', 4, '0008-01-11', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(303, 'BINSOL', 'MARIA THERESA', 'G', 'MS', 'RADIOLOGIC TECHNOLOGIST', 'Single', 'Female', '0000-00-00', 'THERRY', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(304, 'TRINIDAD', 'JOYCE', 'G', 'Miss', 'MEDTECH', 'Single', 'Female', '0000-00-00', 'JOYCE', 4, '2012-06-11', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(305, 'BONGON', 'RIGOR', '', 'MR.', '', 'Single', 'Male', '0000-00-00', 'RIGOR', 4, '0009-01-11', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(306, 'MURIEL', 'LYNDON', '', 'DR', 'SONOLOGIST', 'Married', 'Male', '0000-00-00', 'RODOLFO', 4, '0006-01-11', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(307, 'MEDILLO', 'JENNIFER', 'G', 'MS.', 'STAFF NURSE', 'Single', 'Female', '0000-00-00', 'JENJEN', 4, '2011-08-10', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(308, 'TORRES', 'MELCHOR', 'D.', 'MR.', 'Driver', '', 'Male', '0000-00-00', 'MEL', 4, '0001-01-12', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(309, 'DESALIN', 'RANDY', '', '', 'MAINTENANCE', 'Single', 'Male', '0000-00-00', 'RANDY', 4, '0004-02-12', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(310, 'GERIA', 'RACHELE', 'DORILAG', 'MS.', 'nurse', 'Single', 'Female', '0000-00-00', 'CHEL', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(311, 'GAYAS', 'MARVIN', 'QUINONES', 'MR.', 'Utility', 'Single', 'Male', '0000-00-00', 'BINO', 4, '0003-10-12', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(312, 'SANTOS', 'MICHELLE ANGELA', 'G.', 'MS.', 'nurse', 'Single', 'Female', '0000-00-00', 'MICH', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(313, 'QUIMAN', 'SOBEN', '', 'SECURITY', 'SECURITY', 'Married', 'Male', '0000-00-00', 'SOBEN', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(314, 'EBARSABAL', 'RODOLFO', '', 'MR.', 'GUARD', 'Married', 'Male', '0000-00-00', 'RODOLF', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(315, 'OROLA', 'MAYLEN', 'CAS', 'MS.', 'nurse', 'Single', 'Female', '0000-00-00', 'AYEN', 4, '2010-02-12', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(316, 'VELADO', 'RENELYN', 'L.', 'MS', 'STAFF NURSE', 'Single', 'Female', '0000-00-00', 'EN', 4, '2010-01-12', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0);
INSERT INTO `employee_tb` (`DatabaseID`, `lname`, `fname`, `mname`, `title`, `position`, `maritalStatus`, `sex`, `bDate`, `nickName`, `departmentID`, `dateStart`, `createDate`, `modifiedDate`, `userName`, `password`, `Status`, `isPassSet`) VALUES
(317, 'TOBIAS', 'DEXTER', 'R.', 'MR.', 'rn', 'Single', 'Male', '0000-00-00', 'DEX', 4, '2011-01-11', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(318, 'ESPLANA', 'SEAN', 'D.', 'MS.', 'V.NURSE', 'Single', 'Female', '0000-00-00', 'SEAN', 4, '0005-01-12', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(319, 'CESA', 'JEZREAL', '', 'MR', 'GUARD', 'Married', 'Male', '0000-00-00', 'JEZREAL', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(320, 'PASAOL', 'FLOR', '', 'MRS.', 'Janitress', 'Married', 'Female', '0000-00-00', 'PASAOL', 4, '0002-06-13', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(321, 'LABIOS', 'ESTRELLA', '', 'DIETARY', '', 'Married', 'Female', '0000-00-00', 'ESTER', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(322, 'MERCADO', 'JANINE', 'P.', 'MS.', 'Utility', 'Single', 'Female', '0000-00-00', 'JANINE', 4, '0001-09-13', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(323, 'ADRIATICO', 'MARIE GOLDWYN', 'C', 'MS', 'Accounting', 'Single', 'Female', '0000-00-00', 'Gold', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(324, 'DANDI', 'KRISTAL', 'A.', 'MS.', 'STAFF NURSE', 'Single', 'Female', '0000-00-00', 'TAL', 4, '2012-03-12', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(325, 'BORJA', 'LETICIA', 'B.', 'MS.', 'Utility', 'Single', 'Female', '0000-00-00', 'LET', 4, '0002-06-13', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(326, 'ESPIRITU', 'JAMES', '', 'MR', 'RAD.TECH.', 'Single', 'Male', '0000-00-00', 'JAMES', 4, '0007-01-13', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(327, 'CABRIGA', 'ERWIN', 'C.', 'MR.', 'nurse', 'Single', 'Male', '0000-00-00', 'WIN', 4, '2010-01-12', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(328, 'BORELA', 'NOMER', '', 'MR', 'ORDERLY', 'Single', 'Male', '0000-00-00', 'NOMER', 4, '0006-01-13', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(329, 'BALMES', 'JHAVIDSON', 'V.', 'MR.', 'Utility', 'Single', 'Male', '0000-00-00', 'jed', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(330, 'BARANGGAN', 'CLIFFORD', 'D.', 'MR.', 'radtech', 'Single', 'Male', '0000-00-00', 'CLYDEH VERA', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(331, 'BENALAYO', 'SHELLA MAE KATHLEN', 'T', 'MS', 'rn', 'Single', 'Female', '0000-00-00', 'SHE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(332, 'GALAURAN', 'JOHN JOSE', 'S.', 'MR.', 'rn', 'Single', 'Male', '0000-00-00', 'JOE', 4, '2010-06-13', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(333, 'GUEVARRA', 'MAYJORIE', 'B', 'MEDTECH', 'MEDTECH', 'Single', 'Female', '0000-00-00', 'MAE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(334, 'BALMES', 'IMELDA', '', 'MRS.', 'Utility', 'Married', 'Female', '0001-03-19', 'IMELDA', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(335, 'GALAURAN', 'MA. CHRISTINA', 'S', 'MS', 'reliever', 'Single', 'Female', '0000-00-00', 'TIN', 4, '2010-08-12', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(336, 'ALVAREZ', 'RENZ', '', 'RN', 'rn', 'Single', 'Male', '0000-00-00', 'RENZ', 4, '2010-10-13', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(337, 'DOMINGUEZ', 'JENNALYN', '', 'RN', 'rn', 'Single', 'Female', '0000-00-00', 'JENN', 4, '2010-10-13', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(338, 'GARRA', 'JOHN LUIS', 'BALLON', 'MR.', 'rn', 'Single', 'Male', '0000-00-00', 'JLO', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(339, 'QUIJANO', 'MA.AMYJOY', 'M', 'RN', 'rn', 'Single', 'Female', '0000-00-00', 'AJ', 4, '2011-01-13', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(340, 'MATILLA', 'REX', '', 'MR.', 'radtech', 'Single', 'Male', '0000-00-00', 'REX', 4, '0005-01-14', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(341, 'BONGON', 'REGIE', 'M.', 'MR', 'ORDERLY', 'Single', 'Male', '0000-00-00', 'REGIE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(342, 'CASAREO', 'AXEL JR', 'A.', 'RN', 'nurse', 'Single', 'Male', '0000-00-00', 'AXEL', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(343, 'TORRES', 'RHEA LEENE', '', 'MS.', 'rn', 'Single', 'Female', '0000-00-00', 'RHEA', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(344, 'RONQUILLO', 'MA GIENESSA', 'L', 'MS.', 'rn', 'Single', 'Female', '0000-00-00', 'NES', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(345, 'JIMENEZ', 'CATHERINE', '', 'MS', '', 'Married', 'Female', '0000-00-00', 'CATH', 4, '0001-08-15', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(346, 'ALANO', 'REGINE', '', 'MRS.', 'Secretary', 'Married', 'Female', '0000-00-00', 'REG', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(347, 'VERGEL', 'MARIE ZOBEL', '', 'DR.', 'MD', 'Single', 'Female', '0000-00-00', 'MARIE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(348, 'MENDOZA', 'JOENA', 'M', 'NR.', 'nurse', 'Single', 'Female', '0000-00-00', 'JOENA', 4, '0004-01-14', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(349, 'ALVAREZ', 'rudz anthony', 'permo', 'MR.', 'rn', 'Single', 'Male', '0000-00-00', 'rudz', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(350, 'BENEDITO', 'PAUL', 'C', 'RN', 'nurse', 'Single', 'Male', '0000-00-00', 'PAUL', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(351, 'SISA', 'AIRISH', '', 'MS', 'rn', 'Single', 'Female', '0000-00-00', 'AIRISH', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(352, 'DAYONDON', 'NICCAH JANE', 'LILDO', 'MS.', 'CLERK', 'Single', 'Female', '0000-00-00', 'NICCAH', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(353, 'MATINONG', 'ARLYN', '', 'MS.', 'BOOKKEEPER', 'Single', 'Female', '0000-00-00', 'ARLYN', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(354, 'ROLA', 'AVE THERESE', 'DURAN', 'MS', 'BOOKKEEPER', 'Married', 'Female', '0000-00-00', 'AVE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(355, 'TUAZON', 'ALELI', 'F.', 'MRS.', 'ACCOUNTING HEAD', 'Married', 'Female', '0000-00-00', 'ALELI', 4, '2010-03-16', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(356, 'MANGALINDAN', 'MADEL', 'D.', 'MS.', 'nurse', 'Single', 'Female', '0000-00-00', 'MADZ', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(357, 'JEBULAN', 'RAQUEL', 'M.', 'MS.', 'NA', 'Single', 'Female', '0000-00-00', 'KELLY', 4, '0001-11-16', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(358, 'ZARATE', 'ELIZABETH', 'T', 'MS.', 'MEDSEC', 'Married', 'Female', '0000-00-00', 'ELIZ', 4, '0007-10-17', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(359, 'ENCINAS', 'MANUEL', '', 'NURSE', 'nurse', 'Single', 'Male', '0000-00-00', 'MANUEL', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(360, 'CAZAR', 'JANINA JASTIN', 'M', 'MS', 'nurse', 'Single', 'Female', '0000-00-00', 'JAJA', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(361, 'ALVAREZ', 'SAINT LEE ANN', 'D', 'MS.', 'Cashier', 'Single', 'Female', '0000-00-00', 'SAINT', 4, '0006-01-18', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(362, 'ESPARAGOZA', 'ERIKA CELINE', 'S', 'MS', 'Cashier', 'Single', 'Female', '0000-00-00', 'CELINE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(363, 'DEL MUNDO', 'CLAIRE', 'MACLANG', 'MS', 'nurse', 'Single', 'Female', '0000-00-00', 'CLAY', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(364, 'LLAMERA', 'LIEZEL', 'JIMENEZ', 'MS.', 'NA', 'Single', 'Female', '0000-00-00', 'ZEL', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(365, 'ADONIS', 'JENIFFER', 'APOLONIO', 'MS', 'radtech', 'Single', 'Female', '0000-00-00', 'JE', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(366, 'DICHOSO', 'MARIEDANIELLE', 'R', 'MS', 'FACIALTHERAPIST', 'Single', 'Female', '0000-00-00', 'DANI', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(367, 'BANAAG', 'SHEILA', 'L', 'MS', 'CG', 'Married', 'Female', '0000-00-00', 'SHY', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(368, 'FELICIANO', 'NHIA ANN', 'G', 'MS', 'Cashier', 'Single', 'Female', '0000-00-00', 'ANN', 4, '0008-03-20', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(369, 'SANTIAGO', 'RENATO', 'UMALI', 'MR', 'ORDERLY', 'Single', 'Male', '0000-00-00', 'LAKAMBINI', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(370, 'ILAG', 'AILYN', 'C.', 'MS.', 'Assist Pharma.', 'Single', 'Female', '0000-00-00', 'AI', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(371, 'URMENETA', 'AMELIA', 'LEGASPI', 'MS', 'NA', 'Married', 'Female', '0000-00-00', 'AMY', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(372, 'LOPEZ', 'JULIE ANN', 'REYES', 'MS', '', 'Single', 'Female', '0007-01-02', 'JU', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(373, 'ZARATE', 'Zack', 'S', '', '', 'Single', 'Male', '2012-08-01', 'Zack', 4, '0003-07-22', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(374, 'ASAM', 'ANGELICA', '', 'MS.', 'CAREGIVER', 'Single', 'Female', '0000-00-00', 'ANGEL', 4, '0002-01-22', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(375, 'PARAGATOS', 'SHAIRA MAE', 'FUENTES', 'MS', 'NA', 'Single', 'Female', '0000-00-00', 'PRECIOUS', 4, '0000-00-00', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(376, 'MANON-OG', 'JESSA MARIE', 'B', 'MS.', 'RM', 'Single', 'Female', '0000-00-00', 'JESSA', 4, '0003-10-21', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(377, 'LORANIA', 'JENNY', 'DELA LUNA', 'Miss', 'Cashier', 'Single', 'Female', '0000-00-00', 'JHEN', 4, '2012-08-22', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(378, 'OAFERINA', 'MARY JOY', 'A.', 'MRS', 'CG', 'Married', 'Female', '0000-00-00', 'MJ', 4, '0001-01-23', '2023-08-30 09:59:56', '2023-08-30 09:59:56', '', '', 1, 0),
(379, 'Tester', 'Tester', 'Tester', 'Tester', 'Tester', 'Married', 'Female', '2023-09-23', 'Tester', 1, '2023-08-30', '2023-08-30 10:05:59', '2023-09-09 15:02:27', 'tester@gmail.com', '$2y$10$4N.VoZWcaoZXkFcIxGfV6eXNplY0Yf3wSgPGr4jfTiNrIU7EnN9em', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `expenses_tb`
--

CREATE TABLE `expenses_tb` (
  `expenseID` int(11) NOT NULL,
  `dateEntered` datetime NOT NULL DEFAULT current_timestamp(),
  `datePost` datetime NOT NULL DEFAULT current_timestamp(),
  `expenseType` varchar(50) DEFAULT NULL,
  `departmentID` int(11) DEFAULT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `payableTo` varchar(50) DEFAULT NULL,
  `docRef` varchar(50) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `enteredBy` varchar(50) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `requestedBy` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses_tb`
--

INSERT INTO `expenses_tb` (`expenseID`, `dateEntered`, `datePost`, `expenseType`, `departmentID`, `amount`, `payableTo`, `docRef`, `reason`, `enteredBy`, `note`, `requestedBy`) VALUES
(1, '2023-09-11 11:14:06', '2023-09-11 11:14:06', 'Electricity', 1, '100', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample'),
(2, '2023-09-11 11:51:08', '2023-09-11 11:51:08', 'Common', 0, '100', 'sample', 'samDoc.', 'samReason', '', 'samNote', 'MELISSA  GONZALES,Doctor'),
(3, '2023-09-11 12:07:33', '2023-09-11 12:07:33', 'Common', 1, '100', 'sample', 'samDoc.', 'samReason', '', 'sampleNote', 'MELISSA  GONZALES,Doctor'),
(4, '2023-09-11 13:21:49', '2023-09-11 13:21:49', 'Common', 1, '100', 'sample', 'samDoc.', 'samReason', '', 'zxZXZX', 'MELISSA  GONZALES,Doctor'),
(5, '2023-09-11 13:24:08', '2023-09-11 13:24:08', 'Common', 1, '1', 'dsfsd', 'dsfsdf', 'sdfsdf', 'Tester, Tester Tester', 'vsdvs', 'MELISSA  GONZALES,Doctor'),
(6, '2023-09-12 14:43:46', '2023-09-12 14:43:46', 'Uncommon', 1, '100', 'sample', 'samDoc.', 'samReason', 'Tester, Tester Tester', 'sa', 'MELISSA  GONZALES,Doctor');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_tb`
--

CREATE TABLE `feedback_tb` (
  `feedbackID` int(11) NOT NULL,
  `SalesID` int(11) NOT NULL,
  `ratingStars` tinyint(11) NOT NULL,
  `feedback` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback_tb`
--

INSERT INTO `feedback_tb` (`feedbackID`, `SalesID`, `ratingStars`, `feedback`) VALUES
(1, 33, 5, ''),
(2, 33, 3, 'Great'),
(3, 33, 5, 'test'),
(4, 33, 5, 'test'),
(5, 33, 3, 'Great'),
(6, 33, 3, 'Great FOOD');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_tb`
--

CREATE TABLE `inventory_tb` (
  `InventoryID` int(11) NOT NULL,
  `itemTypeID` int(11) NOT NULL,
  `itemCode` varchar(100) DEFAULT NULL,
  `Description` varchar(300) DEFAULT NULL,
  `SugPrice` double DEFAULT NULL,
  `Status` tinyint(1) NOT NULL,
  `UnitType` varchar(300) DEFAULT NULL,
  `createDate` datetime DEFAULT current_timestamp(),
  `modifiedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory_tb`
--

INSERT INTO `inventory_tb` (`InventoryID`, `itemTypeID`, `itemCode`, `Description`, `SugPrice`, `Status`, `UnitType`, `createDate`, `modifiedDate`, `image`) VALUES
(2307, 1, 'Strawberry Frappe', 'Strawberry Frappe Flavor', 120, 1, 'pcs', '2023-09-23 21:54:47', '2023-09-24 02:40:02', 'add/image/650f30d8ac198_Strawberry Frappe.png'),
(2308, 1, 'Chocomint Frappe', 'Choco Mint Flavor', 120, 1, NULL, '2023-09-24 01:01:06', '2023-09-24 02:21:07', 'add/image/650f2c93691ba_Chocomint Frappe.png'),
(2309, 1, 'Salted Caramel Frappe', 'Salted Caramel Flavor', 120, 1, NULL, '2023-09-24 01:05:26', '2023-09-24 03:37:00', 'add/image/650f1ad6d9407_Salted Caramel Frappe.png'),
(2310, 1, 'Cookies and Cream Frappe', 'Cookies and Cream Flavor', 120, 1, NULL, '2023-09-24 01:12:19', '2023-09-24 01:12:19', 'add/image/650f1c735ffe3_Cookies and Cream Frappe.png'),
(2311, 1, 'Dark Mocha Frappe', 'Dark Mocha Frappe Flavor', 120, 1, NULL, '2023-09-24 02:22:24', '2023-09-24 02:22:24', 'add/image/650f2ce064f67_Dark Mocha Frappe.png'),
(2312, 1, 'Caramel Macchiato Frappe', 'Caramel Macchiato', 120, 1, NULL, '2023-09-24 02:26:41', '2023-09-24 02:26:41', 'add/image/650f2de107e0a_Caramel Macchiato Frappe.png'),
(2313, 1, 'Java Chip Frappe', 'Java Chip Frappe Flavor', 120, 1, NULL, '2023-09-24 02:28:12', '2023-09-24 02:28:12', 'add/image/650f2e3c39c58_Java Chip Frappe.png'),
(2314, 2, 'Lychee Fruit Tea', 'Lychee Fruit Tea Flavor', 100, 1, NULL, '2023-09-24 02:29:29', '2023-09-24 02:29:29', 'add/image/650f2e896ac98_Lychee Fruit Tea.png'),
(2315, 2, 'Mango Fruit Tea', 'Mango Fruit Tea Flavor', 100, 1, NULL, '2023-09-24 02:30:23', '2023-09-24 02:30:23', 'add/image/650f2ebfc57e5_Mango Fruit Tea.png'),
(2316, 2, 'Passion Fruit Tea', 'Passion Fruit Tea Flavor', 100, 1, NULL, '2023-09-24 02:31:12', '2023-09-24 02:31:12', 'add/image/650f2ef0073bd_Passion Fruit Fruit Tea.png'),
(2317, 2, 'Strawberry Fruit Tea', 'Strawberry Fruit Tea Flavor', 100, 1, NULL, '2023-09-24 02:31:57', '2023-09-24 02:31:57', 'add/image/650f2f1da51e8_Strawberry Fruit Tea.png'),
(2318, 3, 'Americano', 'Americano', 100, 1, NULL, '2023-09-24 02:32:51', '2023-09-24 02:32:51', 'add/image/650f2f5395632_Americano.jpg'),
(2319, 3, 'Cappuccino', 'Cappuccino', 100, 1, NULL, '2023-09-24 02:40:44', '2023-09-24 02:40:44', 'add/image/650f312c342fa_Cappuccino.png'),
(2320, 3, 'Caramel Macchiato', 'Cappuccino', 100, 1, NULL, '2023-09-24 02:41:32', '2023-09-24 02:41:32', 'add/image/650f315cc5858_Caramel Macchiato.png'),
(2321, 6, 'Iced Arabica', 'Iced Arabica Flavor', 100, 1, NULL, '2023-09-24 02:42:28', '2023-09-24 02:42:28', 'add/image/650f319422897_Iced Arabica.png'),
(2322, 6, 'Iced Caramel', 'Iced Caramel', 100, 1, NULL, '2023-09-24 02:43:06', '2023-09-24 02:43:06', 'add/image/650f31ba93c9d_Iced Caramel.png'),
(2323, 6, 'Iced Hazelnut', 'Iced Hazelnut Flavor', 100, 1, NULL, '2023-09-24 02:43:46', '2023-09-24 02:43:46', 'add/image/650f31e230e34_Iced Hazelnut.png'),
(2324, 6, 'OurBlend Signature Coffee', 'OurBlend Signature Coffee', 100, 1, NULL, '2023-09-24 02:44:32', '2023-09-24 02:44:32', 'add/image/650f3210e6656_OurBlend Signature Coffee.png'),
(2325, 7, 'Chocolate Milk Tea', 'Chocolate Milk Tea Flavor', 100, 1, NULL, '2023-09-24 02:46:10', '2023-09-24 02:46:10', 'add/image/650f327236056_Chocolate Milk Tea.png'),
(2326, 7, 'Classic Brown Sugar Milk Tea', 'Classic Brown Sugar Milk Tea', 100, 1, NULL, '2023-09-24 02:46:50', '2023-09-24 02:46:50', 'add/image/650f329a334ac_Classic Brown Sugar Milk Tea.png'),
(2327, 7, 'Classic Milk Tea', 'Classic Milk Tea', 100, 1, NULL, '2023-09-24 02:49:03', '2023-09-24 02:49:03', 'add/image/650f331f24897_Classic Milk Tea.png'),
(2328, 7, 'Hokkaido Milk Tea', 'Hokkaido Milk Tea Flavor', 100, 1, NULL, '2023-09-24 02:53:29', '2023-09-24 02:53:29', 'add/image/650f342967f12_Hokkaido Milk Tea.png'),
(2329, 7, 'Okinawa Milk Tea', 'Okinawa Milk Tea Flavor', 100, 1, NULL, '2023-09-24 02:54:08', '2023-09-24 02:54:08', 'add/image/650f3450999f5_Okinawa Milk Tea.png'),
(2330, 7, 'Wintermelon Milk Tea', 'Wintermelon Milk Tea Flavor', 100, 1, NULL, '2023-09-24 02:54:52', '2023-09-24 02:54:52', 'add/image/650f347c17d4f_Wintermelon Milk Tea.png'),
(2331, 8, 'Egg Sandwich', 'Egg Sandwich', 100, 1, NULL, '2023-09-24 02:55:39', '2023-09-24 02:55:39', 'add/image/650f34abe2369_Egg Sandwich.png');

-- --------------------------------------------------------

--
-- Table structure for table `itemtype_tb`
--

CREATE TABLE `itemtype_tb` (
  `itemTypeID` int(11) NOT NULL,
  `itemTypeCode` varchar(120) NOT NULL,
  `description` varchar(250) NOT NULL,
  `departmentID` int(11) NOT NULL,
  `is_consumable` tinyint(4) NOT NULL DEFAULT 1,
  `createDate` datetime NOT NULL DEFAULT current_timestamp(),
  `modifiedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itemtype_tb`
--

INSERT INTO `itemtype_tb` (`itemTypeID`, `itemTypeCode`, `description`, `departmentID`, `is_consumable`, `createDate`, `modifiedDate`) VALUES
(1, 'Frappe', 'Frappe', 0, 1, '2023-09-22 14:01:10', '2023-09-22 14:01:10'),
(2, 'Fruit-Tea', 'Fruit-Tea', 0, 1, '2023-09-22 14:01:47', '2023-09-22 14:01:47'),
(3, 'Hot-Coffee', 'Hot-Coffee', 0, 1, '2023-09-22 14:02:37', '2023-09-22 14:02:37'),
(6, 'Iced-Coffee', 'Ice-Coffee', 0, 1, '2023-09-22 14:02:45', '2023-09-22 14:02:45'),
(7, 'Milk-Tea', 'Milk-Tea', 0, 0, '2023-09-22 14:03:59', '2023-09-24 03:30:00'),
(8, 'Sandwich', 'Sandwich', 0, 1, '2023-09-22 14:03:59', '2023-09-22 14:03:59');

-- --------------------------------------------------------

--
-- Table structure for table `patient_tb`
--

CREATE TABLE `patient_tb` (
  `hospistalrecordNo` int(11) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `bDate` date NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone_home` varchar(50) DEFAULT NULL,
  `phone_work` varchar(50) DEFAULT NULL,
  `cellNo` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `occupation` varchar(300) DEFAULT NULL,
  `employerName` varchar(300) DEFAULT NULL,
  `employerDetail` varchar(300) DEFAULT NULL,
  `workAddress` varchar(300) DEFAULT NULL,
  `nationality` varchar(300) DEFAULT 'Filipino',
  `religion` varchar(300) DEFAULT NULL,
  `maritalStatus` varchar(300) NOT NULL DEFAULT 'Single',
  `spouseName` varchar(300) DEFAULT NULL,
  `spouseContact` varchar(300) DEFAULT NULL,
  `motherName` varchar(200) DEFAULT NULL,
  `motherContact` varchar(200) NOT NULL,
  `fatherContact` varchar(200) NOT NULL,
  `phMember` varchar(100) DEFAULT NULL,
  `phNo` varchar(100) DEFAULT NULL,
  `HMO` varchar(100) DEFAULT NULL,
  `typeHMO` varchar(100) DEFAULT NULL,
  `CertNo` varchar(100) DEFAULT NULL,
  `emergencyName` varchar(100) NOT NULL,
  `patientRelationship` varchar(100) NOT NULL,
  `emergencyAddress` varchar(100) NOT NULL,
  `emergencyHome` varchar(100) NOT NULL,
  `emergencyWork` varchar(100) NOT NULL,
  `emergencyCell` varchar(100) NOT NULL,
  `patientAllergies` varchar(100) DEFAULT NULL,
  `patientsurgicalHistory` varchar(100) DEFAULT 'No History',
  `patientActiveDiag` varchar(100) DEFAULT NULL,
  `patientActiveMed` varchar(100) DEFAULT NULL,
  `createDate` datetime NOT NULL DEFAULT current_timestamp(),
  `modifiedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `fatherName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_tb`
--

INSERT INTO `patient_tb` (`hospistalrecordNo`, `lname`, `fname`, `mname`, `age`, `gender`, `bDate`, `address`, `phone_home`, `phone_work`, `cellNo`, `email`, `occupation`, `employerName`, `employerDetail`, `workAddress`, `nationality`, `religion`, `maritalStatus`, `spouseName`, `spouseContact`, `motherName`, `motherContact`, `fatherContact`, `phMember`, `phNo`, `HMO`, `typeHMO`, `CertNo`, `emergencyName`, `patientRelationship`, `emergencyAddress`, `emergencyHome`, `emergencyWork`, `emergencyCell`, `patientAllergies`, `patientsurgicalHistory`, `patientActiveDiag`, `patientActiveMed`, `createDate`, `modifiedDate`, `status`, `fatherName`) VALUES
(1, 'Test', 'Test', 'Test', '9', 'Male', '2013-08-08', 'SampleAddres', 'samplePhoneHome', 'samplePhonework', 'sampleCellNo.', 'sample@gmail.com', 'SampleOccupation', 'SampleEmployer', 'employerDetails', 'sampleWorkAdd', 'Filipino', 'Sample nationality', 'Married', 'sampleName', 'samplespouseContact', 'sampleMotherName', 'sampleMotherContact', 'samplefatherName', 'samplepgMember', 'samplepHno.', 'SampleHMO', 'sampleHmotype', 'sampleCertNo.', 'SampleEmergencyName', 'SampleRelationship', 'SampleEmergencyAddress', 'SampleEmergencyHome', 'SampleEmergencyWork', 'SampleEmergencycell', 'SamplepatientsAllergies', 'No History', 'SamplepatientsDiag', 'SamplepatientsActiveMeds', '2023-08-02 13:49:52', '2023-08-02 13:49:52', 1, NULL),
(2, 'sample', 'sample', 'sample', 'sample', 'sample', '2023-08-02', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'Filipino', 'sample', 'Single', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'No History', NULL, 'sample', '2023-08-18 13:12:09', '2023-08-18 13:12:09', 1, 'sample'),
(3, 'TestLname', 'TestFname', 'TestMname', 'TestAge ', 'Female', '2023-08-03', 'TestAddress', 'TestPhoneNo(Home)', ' TestPhoneNo(work)', 'TestPhoneNo(Cellphon', 'Testsargentoryanjoshua@gmail.com', 'TestOccupation', 'TestEmployerName', 'TestEmployerContactNo', 'sdasdas', 'TestNationality', 'TestReligion', 'Single', 'TestSpouseName', ' TestSpouseContactNo.', ' TestMotherName', 'TestMotherContactNo.', 'TestFatherName', ' NH', 'TestPHPIN', 'TestHMO', 'TestHMO Coverage', 'Test CertNo', 'Test Emergency Person', 'Test Relationship', 'wdsadasd', ' Test relation Contact Home', 'Test relation Contact work', 'Test relation Contact cp', 'Test Allergy', 'sdasdas', 'Test relation Contact cp', ' sdasdasd', '2023-08-18 14:11:50', '2023-08-18 14:11:50', 1, 'TestFatherContactNo.'),
(4, 'Tabuyan', 'Kean Arthur', 'Sargento', 'sdasd ', 'Female', '2023-08-10', 'sdasd', 'dsadas', ' sdas', 'sdasd', 'kean@hr.com', 'sdasd', 'sdasd', 'sdasdas', 'asdasd', 'sdasdasd', 'asdasd', 'Single', 'Kean Arthur Sargento Tabuyan', ' dasdasd', ' asdasd', 'asdasd', '', ' NH', 'dasdasdasd', 'dasdas', 'sdasd', 'dasdasd', 'sdasdas', 'sadasd', 'sdasda', ' sdasd', 'sdasd', 'dasdasd', 'sdasd', 'asdasd', 'dasdasd', ' sdsdasd', '2023-08-18 14:14:21', '2023-08-18 14:14:21', 1, 'dasasd'),
(5, 'Tabuyan', 'Kean Arthur', 'Sargento', 'sdasd ', 'Female', '2023-08-04', 'sdasd', 'dsadas', ' sdas', 'sdasd', 'kean@hr.com', 'sdasd', 'sdasd', 'sdasdas', 'jvhvhhv , m. m. m . m', 'sdasdasd', 'mgjcjcjchj', 'NN', 'Kean Arthur Sargento Tabuyan', ' ydydccjcjcj', ' fshghvjhc', 'jcjgducjyd', 'hhzstrh ycjh', ' ', 'cjgjhgxf', 'jbkjcbzkxjbzc', 'kxbc,mzxbc,mxz', 'cjbxzkczbxcjkzx', 'xbzckjzbkxzcj', '', 'lkzxlzkczlbxck', ' jzbcxkjzbcxzkj,', 'cxkzxc,mz,bcxm', 'kxcn,zkxczn,mx', 'cm,zmxzcm,x ', 'nzkxcn,zcmx', 'kxcn,zkxczn,mx', ' zxbc,mxbzxnczmx', '2023-08-18 14:17:22', '2023-08-18 14:17:22', 1, 'hcjhcjgrs'),
(6, 'Test2LastName', 'Test2FirstName', 'Test2MiddleName', '78 ', 'Female', '2023-08-11', 'Test2Address', 'Test2PhoneNo(Home)', ' Test2PhoneNo(Work)', 'Test2PhoneNo(Cp)', 'Test2sargentoryanjoshua@gmail.com', 'Test2Occupation', 'Test2EmployerName', 'Test2EmployerContactNo', 'Test2Address', 'Test2Nationality', 'Test2Religion', 'Separated', 'Test2Spouse', ' Test2PhoneNo', ' Test2MotherName', 'Test2PhoneNo(Mother)', 'TestFatherName', ' NN', 'Test2PhilHealth', 'TestHMO', 'TestHMO Coverage', 'Test CertNo', 'Test Emergency Person', 'Test Relationship', 'Test2Address', ' Test2Phone(Home)', 'Test2Phone(work)', 'Test2Phone(CP)', 'Test2Alllergies', 'Test2Surgical History', 'Test2Diag', ' Test2Meds', '2023-08-18 16:29:13', '2023-08-18 16:29:13', 1, 'Test2PhoneNo(father)'),
(7, 'ZZZZZZZZZZZZZZZZZZZZZZ', 'TestFname', 'TestMname', 'TestAge ', 'Female', '2023-08-03', 'TestAddress', 'TestPhoneNo(Home)', ' TestPhoneNo(work)', 'TestPhoneNo(Cellphon', 'Testsargentoryanjoshua@gmail.com', 'TestOccupation', 'TestEmployerName', 'TestEmployerContactNo', 'sdasdas', 'TestNationality', 'TestReligion', 'Single', 'TestSpouseName', ' TestSpouseContactNo.', ' TestMotherName', 'TestMotherContactNo.', 'TestFatherName', ' NH', 'TestPHPIN', 'TestHMO', 'TestHMO Coverage', 'Test CertNo', 'Test Emergency Person', 'Test Relationship', 'wdsadasd', ' Test relation Contact Home', 'Test relation Contact work', 'Test relation Contact cp', 'Test Allergy', 'sdasdas', 'Test relation Contact cp', ' sdasdasd', '2023-08-18 14:11:50', '2023-08-18 14:11:50', 1, 'TestFatherContactNo.'),
(8, 'ooooooooooooooooo', 'sample', 'sample', 'sample', 'sample', '2023-08-02', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'Filipino', 'sample', 'Single', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'No History', NULL, 'sample', '2023-08-18 13:12:09', '2023-08-18 13:12:09', 1, 'sample'),
(9, 'ZZZZZZZZZZZZZZZZZZZZZZ', 'TestFname', 'TestMname', 'TestAge ', 'Female', '2023-08-03', 'TestAddress', 'TestPhoneNo(Home)', ' TestPhoneNo(work)', 'TestPhoneNo(Cellphon', 'Testsargentoryanjoshua@gmail.com', 'TestOccupation', 'TestEmployerName', 'TestEmployerContactNo', 'sdasdas', 'TestNationality', 'TestReligion', 'Single', 'TestSpouseName', ' TestSpouseContactNo.', ' TestMotherName', 'TestMotherContactNo.', 'TestFatherName', ' NH', 'TestPHPIN', 'TestHMO', 'TestHMO Coverage', 'Test CertNo', 'Test Emergency Person', 'Test Relationship', 'wdsadasd', ' Test relation Contact Home', 'Test relation Contact work', 'Test relation Contact cp', 'Test Allergy', 'sdasdas', 'Test relation Contact cp', ' sdasdasd', '2023-08-18 14:11:50', '2023-08-18 14:11:50', 1, 'TestFatherContactNo.'),
(10, 'Tabuyan', 'Kean Arthur', 'Sargento', 'sdasd ', 'Female', '2023-08-04', 'sdasd', 'dsadas', ' sdas', 'sdasd', 'kean@hr.com', 'sdasd', 'sdasd', 'sdasdas', 'jvhvhhv , m. m. m . m', 'sdasdasd', 'mgjcjcjchj', 'NN', 'Kean Arthur Sargento Tabuyan', ' ydydccjcjcj', ' fshghvjhc', 'jcjgducjyd', 'hhzstrh ycjh', ' ', 'cjgjhgxf', 'jbkjcbzkxjbzc', 'kxbc,mzxbc,mxz', 'cjbxzkczbxcjkzx', 'xbzckjzbkxzcj', '', 'lkzxlzkczlbxck', ' jzbcxkjzbcxzkj,', 'cxkzxc,mz,bcxm', 'kxcn,zkxczn,mx', 'cm,zmxzcm,x ', 'nzkxcn,zcmx', 'kxcn,zkxczn,mx', ' zxbc,mxbzxnczmx', '2023-08-18 14:17:22', '2023-08-18 14:17:22', 1, 'hcjhcjgrs'),
(11, 'Test1', 'TestFname', 'Test', '9 ', 'Male', '2023-09-08', 'SampleAddres', '', ' ', '0982378213231', 'sample@gmail.com', '', '', '', '', 'Filipino', 'Sample', 'Married', '', ' ', ' ', '', '', ' NH', '', '', '', '', '', '', '', ' ', '', '', '', '', '', ' ', '2023-09-11 20:17:56', '2023-09-11 20:17:56', 1, ''),
(12, '123', '123', ' 123', '123', 'Female', '2023-09-07', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', 'Single', '123', '123', '123', '123', '123', 'NH', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', ' 123', '2023-09-12 13:21:39', '2023-09-12 13:46:40', 1, ' 123'),
(13, '1234', '1234', '123', '123 ', 'Male', '2023-09-06', '123', '123', ' 123', '123', '123', '1234', '123', '123', '123', '123', '123', 'Married', '123', ' 123', ' 123', '123', '123', ' NH', '123', '123', '123', '123', '123', '123', '123', ' 123', '123', '123', '123', '123', '123', ' 123', '2023-09-12 13:48:33', '2023-09-12 13:48:33', 1, '123');

-- --------------------------------------------------------

--
-- Table structure for table `payment_tb`
--

CREATE TABLE `payment_tb` (
  `paymentID` int(11) NOT NULL,
  `billID` int(11) DEFAULT NULL,
  `chargeID` int(11) DEFAULT NULL,
  `receivedID` int(11) NOT NULL,
  `dateTimePaid` datetime NOT NULL,
  `modifiedDate` datetime DEFAULT current_timestamp(),
  `paymentType` enum('cash','check') NOT NULL,
  `type` enum('bill','charge','cash') NOT NULL,
  `cashAmountTendered` decimal(10,0) DEFAULT NULL,
  `changeAmt` decimal(10,0) DEFAULT NULL,
  `bankName` varchar(120) DEFAULT NULL,
  `checkNo` varchar(120) DEFAULT NULL,
  `checkDate` datetime DEFAULT NULL,
  `checkAmount` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_tb`
--

INSERT INTO `payment_tb` (`paymentID`, `billID`, `chargeID`, `receivedID`, `dateTimePaid`, `modifiedDate`, `paymentType`, `type`, `cashAmountTendered`, `changeAmt`, `bankName`, `checkNo`, `checkDate`, `checkAmount`) VALUES
(1, 0, 169, 23, '2023-09-05 04:37:44', '2023-09-05 10:38:23', 'cash', 'charge', '1000', '100', '', '', '2023-09-05 04:37:44', '0'),
(2, 0, 169, 23, '2023-09-05 04:37:44', '2023-09-05 10:40:19', 'cash', 'charge', '1000', '100', '', '', '2023-09-05 04:37:44', '0'),
(3, 0, 168, 379, '2023-09-05 10:55:00', '2023-09-05 10:57:56', 'cash', 'charge', '1000', '-310', '', '', '2023-09-05 00:00:00', '0'),
(4, 0, 168, 379, '2023-09-05 11:14:00', '2023-09-05 11:14:53', 'cash', 'charge', '310', '-1000', '', '', '2023-09-05 00:00:00', '0'),
(5, 0, 168, 379, '2023-09-05 11:15:00', '2023-09-05 11:15:48', 'cash', 'charge', '310', '-1000', '', '', '2023-09-05 00:00:00', '0'),
(6, 0, 168, 379, '2023-09-05 11:16:00', '2023-09-05 11:16:25', 'cash', 'charge', '310', '-1000', '', '', '2023-09-05 00:00:00', '0'),
(7, 0, 168, 379, '2023-09-05 11:17:00', '2023-09-05 11:17:20', 'cash', 'charge', '310', '-1000', '', '', '2023-09-05 00:00:00', '0'),
(8, 0, 168, 379, '2023-09-05 11:41:00', '2023-09-05 11:41:47', 'cash', 'charge', '1200', '200', '', '', '2023-09-05 00:00:00', '0'),
(9, 0, 168, 379, '2023-09-05 11:42:00', '2023-09-05 11:43:05', 'cash', 'charge', '310', '-2000', '', '', '2023-09-05 00:00:00', '0'),
(10, 0, 168, 379, '2023-09-05 11:44:00', '2023-09-05 11:45:03', 'cash', 'charge', '250', '-1750', '', '', '2023-09-05 00:00:00', '0'),
(11, 0, 168, 379, '2023-09-05 11:46:00', '2023-09-05 11:46:35', 'cash', 'charge', '1800', '50', '', '', '2023-09-05 00:00:00', '0'),
(12, 0, 168, 379, '2023-09-05 11:55:00', '2023-09-05 11:55:35', 'cash', 'charge', '1000', '0', '', '', '2023-09-05 00:00:00', '0'),
(13, 0, 168, 379, '2023-09-05 12:03:00', '2023-09-05 12:04:11', 'cash', 'charge', '0', '-311', '', '', '2023-09-05 00:00:00', '0'),
(14, 0, 168, 379, '2023-09-05 12:04:00', '2023-09-05 12:04:37', 'cash', 'charge', '0', '0', '', '', '2023-09-05 00:00:00', '0'),
(15, 0, 168, 379, '2023-09-05 12:07:00', '2023-09-05 12:07:23', 'cash', 'charge', '0', '-1000', '', '', '2023-09-05 00:00:00', '0'),
(16, 0, 168, 379, '2023-09-05 12:42:00', '2023-09-05 12:43:37', 'cash', 'charge', '0', '-1000', '', '', '2023-09-05 00:00:00', '0'),
(17, 0, 168, 379, '2023-09-05 12:44:00', '2023-09-05 12:44:42', 'cash', 'charge', '0', '-1000', '', '', '2023-09-05 00:00:00', '0'),
(18, 0, 168, 379, '2023-09-05 12:46:00', '2023-09-05 12:47:47', 'cash', 'charge', '0', '-1210', '', '', '2023-09-05 00:00:00', '0'),
(19, 0, 168, 379, '2023-09-05 12:47:00', '2023-09-05 12:47:59', 'cash', 'charge', '0', '-310', '', '', '2023-09-05 00:00:00', '0'),
(20, 0, 168, 23, '0000-00-00 00:00:00', '2023-09-05 12:51:01', 'cash', 'charge', '1000', '310', 'landbank', '99999', '0000-00-00 00:00:00', '9999'),
(21, 0, 168, 23, '0000-00-00 00:00:00', '2023-09-05 12:51:25', 'cash', 'charge', '1000', '310', 'landbank', '99999', '0000-00-00 00:00:00', '9999'),
(22, 0, 168, 23, '2023-09-05 06:51:18', '2023-09-05 12:51:55', 'cash', 'charge', '1000', '310', 'landbank', '99999', '0000-00-00 00:00:00', '9999'),
(23, 0, 168, 23, '2023-09-05 06:51:18', '2023-09-05 12:52:16', 'cash', 'charge', '1000', '310', 'landbank', '99999', '0000-00-00 00:00:00', '9999'),
(24, 0, 168, 23, '2023-09-05 06:51:18', '2023-09-05 12:52:52', 'cash', 'charge', '1000', '310', 'landbank', '99999', '0000-00-00 00:00:00', '9999'),
(25, 0, 168, 23, '2023-09-05 06:51:18', '2023-09-05 12:53:18', 'cash', 'charge', '1000', '310', 'landbank', '99999', '0000-00-00 00:00:00', '9999'),
(26, 0, 168, 23, '2023-09-05 06:51:18', '2023-09-05 12:53:32', 'cash', 'charge', '1000', '310', 'landbank', '99999', '0000-00-00 00:00:00', '9999'),
(27, 0, 168, 23, '2023-09-05 06:51:18', '2023-09-05 12:54:25', 'cash', 'charge', '1000', '310', 'landbank', '99999', '0000-00-00 00:00:00', '9999'),
(28, 0, 168, 23, '2023-09-05 06:51:18', '2023-09-05 12:55:34', 'cash', 'charge', '1000', '310', 'landbank', '99999', '0000-00-00 00:00:00', '9999'),
(29, 0, 168, 23, '2023-09-05 06:51:18', '2023-09-05 12:55:55', 'cash', 'charge', '1000', '310', 'landbank', '99999', '0000-00-00 00:00:00', '9999'),
(30, 0, 168, 23, '2023-09-05 06:51:18', '2023-09-05 12:56:09', 'cash', 'charge', '1000', '310', 'landbank', '99999', '0000-00-00 00:00:00', '9999'),
(31, 0, 168, 23, '2023-09-05 06:51:18', '2023-09-05 12:56:23', 'cash', 'charge', '1000', '310', 'landbank', '99999', '0000-00-00 00:00:00', '9999'),
(32, 0, 168, 379, '2023-09-05 12:57:00', '2023-09-05 12:58:10', 'cash', 'charge', '0', '-1310', '', '', '2023-09-05 00:00:00', '0'),
(33, 0, 168, 379, '2023-09-05 12:58:00', '2023-09-05 12:58:37', 'cash', 'charge', '0', '-1310', '', '', '2023-09-05 00:00:00', '0'),
(34, 0, 168, 379, '2023-09-05 12:59:00', '2023-09-05 12:59:56', 'cash', 'charge', '0', '-1310', '', '', '2023-09-05 00:00:00', '0'),
(35, 0, 168, 379, '2023-09-05 13:04:00', '2023-09-05 13:05:06', 'cash', 'charge', '0', '-1310', '', '', '2023-09-05 00:00:00', '0'),
(36, 0, 168, 379, '2023-09-05 13:05:00', '2023-09-05 13:05:54', 'cash', 'charge', '0', '-1310', '', '', '2023-09-05 00:00:00', '0'),
(37, 0, 168, 379, '2023-09-05 13:06:00', '2023-09-05 13:07:48', 'cash', 'charge', '0', '-1310', '', '', '2023-09-05 00:00:00', '0'),
(38, 0, 168, 379, '2023-09-05 13:08:00', '2023-09-05 13:08:48', 'cash', 'charge', '0', '-1310', '', '', '2023-09-05 00:00:00', '0'),
(39, 0, 168, 379, '2023-09-05 13:09:00', '2023-09-05 13:09:40', 'cash', 'charge', '0', '-1310', '', '', '2023-09-05 00:00:00', '0'),
(40, 0, 168, 379, '2023-09-05 13:14:00', '2023-09-05 13:14:43', 'cash', 'charge', '1000', '-1310', '', '', '2023-09-05 00:00:00', '0'),
(41, 0, 168, 379, '2023-09-05 13:18:00', '2023-09-05 13:18:15', 'cash', 'charge', '1000', '-1310', '', '', '2023-09-05 00:00:00', '0'),
(42, 0, 168, 379, '2023-09-05 13:19:00', '2023-09-05 13:19:29', 'cash', 'charge', '1000', '-1310', '', '', '2023-09-05 00:00:00', '0'),
(43, 0, 168, 379, '2023-09-05 13:19:00', '2023-09-05 13:20:01', 'cash', 'charge', '2000', '690', '', '', '2023-09-05 00:00:00', '0'),
(44, 0, 168, 379, '2023-09-05 13:22:00', '2023-09-05 13:22:58', 'cash', 'charge', '2310', '0', '', '', '2023-09-05 00:00:00', '0'),
(45, 0, 168, 379, '2023-09-05 13:24:00', '2023-09-05 13:24:52', 'check', 'charge', '1000', '-1310', 'Landbank', '1000', '2023-09-05 00:00:00', '1000'),
(46, 0, 168, 379, '2023-09-05 13:32:00', '2023-09-05 13:32:50', 'check', 'charge', '0', '0', 'Test', '1200', '2023-09-05 00:00:00', '1200'),
(47, 0, 168, 379, '2023-09-05 13:32:00', '2023-09-05 13:33:21', 'check', 'charge', '0', '0', 'Test', 'test', '2023-09-05 00:00:00', '200'),
(48, 32, 0, 379, '2023-09-05 15:31:00', '2023-09-05 15:33:15', 'cash', 'bill', '375', '-500', '', '', '2023-09-05 00:00:00', '0'),
(49, 32, 0, 379, '2023-09-05 15:31:00', '2023-09-05 15:34:26', 'cash', 'bill', '375', '-500', '', '', '2023-09-05 00:00:00', '0'),
(50, 32, 0, 379, '2023-09-05 15:31:00', '2023-09-05 15:35:29', 'cash', 'bill', '375', '-500', '', '', '2023-09-05 00:00:00', '0'),
(51, 32, 0, 379, '2023-09-05 15:31:00', '2023-09-05 15:36:03', 'cash', 'bill', '375', '-500', '', '', '2023-09-05 00:00:00', '0'),
(52, 32, 0, 379, '2023-09-05 15:31:00', '2023-09-05 15:36:19', 'cash', 'bill', '375', '-500', '', '', '2023-09-05 00:00:00', '0'),
(53, 32, 0, 379, '2023-09-05 15:31:00', '2023-09-05 15:36:53', 'cash', 'bill', '375', '-500', '', '', '2023-09-05 00:00:00', '0'),
(54, 32, 0, 379, '2023-09-05 15:31:00', '2023-09-05 15:38:29', 'cash', 'bill', '375', '-500', '', '', '2023-09-05 00:00:00', '0'),
(55, 32, 0, 379, '2023-09-05 15:31:00', '2023-09-05 15:38:42', 'cash', 'bill', '375', '-500', '', '', '2023-09-05 00:00:00', '0'),
(56, 32, 0, 379, '2023-09-05 15:31:00', '2023-09-05 15:39:28', 'cash', 'bill', '375', '-500', '', '', '2023-09-05 00:00:00', '0'),
(57, 32, 0, 379, '2023-09-05 15:31:00', '2023-09-05 15:41:06', 'cash', 'bill', '375', '-500', '', '', '2023-09-05 00:00:00', '0'),
(58, 32, 0, 379, '2023-09-05 15:41:00', '2023-09-05 15:41:29', 'cash', 'bill', '150', '0', '', '', '2023-09-05 00:00:00', '0'),
(59, 32, 0, 379, '2023-09-05 15:41:00', '2023-09-05 15:41:51', 'cash', 'bill', '150', '0', '', '', '2023-09-05 00:00:00', '0'),
(60, 32, 0, 379, '2023-09-05 15:41:00', '2023-09-05 15:43:21', 'cash', 'bill', '150', '0', '', '', '2023-09-05 00:00:00', '0'),
(61, 32, 0, 379, '2023-09-05 15:44:00', '2023-09-05 15:44:55', 'cash', 'bill', '150', '0', '', '', '2023-09-05 00:00:00', '0'),
(62, 32, 0, 379, '2023-09-05 15:51:00', '2023-09-05 15:51:25', 'cash', 'bill', '150', '0', '', '', '2023-09-05 00:00:00', '0'),
(63, 32, 0, 379, '2023-09-05 15:54:00', '2023-09-05 15:54:56', 'cash', 'bill', '150', '0', '', '', '2023-09-05 00:00:00', '0'),
(64, 32, 0, 379, '2023-09-05 15:54:00', '2023-09-05 15:55:42', 'cash', 'bill', '150', '0', '', '', '2023-09-05 00:00:00', '0'),
(65, 32, 0, 379, '2023-09-05 15:56:00', '2023-09-05 15:56:37', 'cash', 'bill', '525', '0', '', '', '2023-09-05 00:00:00', '0'),
(66, 32, 0, 379, '2023-09-05 15:56:00', '2023-09-05 15:58:02', 'cash', 'bill', '525', '0', '', '', '2023-09-05 00:00:00', '0'),
(67, 32, 0, 379, '2023-09-05 15:58:00', '2023-09-05 15:58:41', 'cash', 'bill', '525', '0', '', '', '2023-09-05 00:00:00', '0'),
(68, 32, 0, 379, '2023-09-05 15:58:00', '2023-09-05 15:58:43', 'cash', 'bill', '525', '0', '', '', '2023-09-05 00:00:00', '0'),
(69, 34, 0, 379, '2023-09-05 16:00:00', '2023-09-05 16:00:49', 'cash', 'bill', '476', '0', '', '', '2023-09-05 00:00:00', '0'),
(70, 34, 0, 379, '2023-09-05 16:02:00', '2023-09-05 16:03:05', 'cash', 'bill', '1500', '0', '', '', '2023-09-05 00:00:00', '0'),
(71, 34, 0, 379, '2023-09-05 16:08:00', '2023-09-05 16:10:14', 'cash', 'bill', '2403', '-20000', '', '', '2023-09-05 00:00:00', '0'),
(72, 0, 167, 379, '2023-09-07 15:13:00', '2023-09-07 15:13:48', 'cash', 'charge', '899', '50', '', '', '2023-09-07 00:00:00', '0'),
(73, 34, 0, 379, '2023-09-07 15:14:00', '2023-09-07 15:15:02', 'cash', 'bill', '10', '-20490', '', '', '2023-09-07 00:00:00', '0'),
(74, 34, 0, 379, '2023-09-07 15:16:00', '2023-09-07 15:16:39', 'cash', 'bill', '490', '-20000', '', '', '2023-09-07 00:00:00', '0'),
(75, 0, 175, 379, '2023-09-07 16:43:00', '2023-09-07 16:43:59', 'cash', 'charge', '300', '-3400', '', '', '2023-09-07 00:00:00', '0'),
(76, 0, 175, 379, '2023-09-07 16:52:00', '2023-09-07 16:59:22', 'cash', 'charge', '100', '-3300', '', '', '2023-09-07 00:00:00', '0'),
(77, 0, 175, 379, '2023-09-07 17:03:00', '2023-09-07 17:03:45', 'cash', 'charge', '300', '0', '', '', '2023-09-07 00:00:00', '0'),
(78, 0, 175, 379, '2023-09-07 17:04:00', '2023-09-07 17:07:37', 'cash', 'charge', '300', '0', '', '', '2023-09-07 00:00:00', '0'),
(79, 0, 175, 379, '2023-09-07 17:09:00', '2023-09-07 17:09:53', 'cash', 'charge', '200', '0', '', '', '2023-09-07 00:00:00', '0'),
(80, 0, 175, 379, '2023-09-07 17:10:00', '2023-09-07 17:10:42', 'cash', 'charge', '150', '0', '', '', '2023-09-07 00:00:00', '0'),
(81, 0, 175, 379, '2023-09-07 17:11:00', '2023-09-07 17:11:27', 'cash', 'charge', '2500', '150', '', '', '2023-09-07 00:00:00', '0'),
(82, 0, 2, 379, '2023-09-08 09:59:00', '2023-09-08 09:59:14', 'cash', 'charge', '70', '0', '', '', '2023-09-08 00:00:00', '0'),
(83, 2, 0, 379, '2023-09-08 09:59:00', '2023-09-08 10:00:55', 'cash', 'bill', '300', '0', '', '', '2023-09-08 00:00:00', '0'),
(84, 0, 1, 379, '2023-09-08 10:00:00', '2023-09-08 10:01:51', 'check', 'charge', '0', '0', 'Ching Bank', '000-000-000', '2023-09-08 00:00:00', '101'),
(85, 1, 0, 379, '2023-09-08 10:01:00', '2023-09-08 10:02:31', 'check', 'bill', '0', '0', 'China Bank', '00-00-00', '2023-09-08 00:00:00', '25'),
(86, 1, 0, 379, '2023-09-08 10:02:00', '2023-09-08 10:03:21', 'cash', 'bill', '15', '0', '', '', '2023-09-08 00:00:00', '0'),
(87, 1, 0, 379, '2023-09-08 10:06:00', '2023-09-08 10:06:53', 'cash', 'bill', '12', '0', '', '', '2023-09-08 00:00:00', '0'),
(88, 1, 0, 379, '2023-09-08 10:06:00', '2023-09-08 10:07:38', 'check', 'bill', '0', '0', 'Landbank', '00-00-00', '2023-09-08 00:00:00', '18'),
(89, 1, 0, 379, '2023-09-08 10:07:00', '2023-09-08 10:09:09', 'check', 'bill', '0', '0', 'BDO', '00-00-00', '2023-09-08 00:00:00', '6'),
(90, 1, 0, 379, '2023-09-08 10:09:00', '2023-09-08 10:09:40', 'cash', 'bill', '4', '0', '', '', '2023-09-08 00:00:00', '0'),
(91, 1, 0, 379, '2023-09-08 10:09:00', '2023-09-08 10:09:56', 'cash', 'bill', '3', '0', '', '', '2023-09-08 00:00:00', '0'),
(92, 0, 1, 379, '2023-09-08 10:22:00', '2023-09-08 10:26:13', 'cash', 'charge', '2', '0', '', '', '2023-09-08 00:00:00', '0'),
(93, 0, 1, 379, '2023-09-08 10:29:00', '2023-09-08 10:29:13', 'cash', 'charge', '3', '0', '', '', '2023-09-08 00:00:00', '0'),
(94, 0, 1, 379, '2023-09-08 10:32:00', '2023-09-08 10:32:10', 'cash', 'charge', '2', '0', '', '', '2023-09-08 00:00:00', '0'),
(95, 0, 1, 379, '2023-09-08 10:32:00', '2023-09-08 10:32:32', 'cash', 'charge', '10', '6', '', '', '2023-09-08 00:00:00', '0'),
(96, 0, 2, 379, '2023-09-08 10:43:00', '2023-09-08 10:43:38', 'cash', 'charge', '120', '0', '', '', '2023-09-08 00:00:00', '0'),
(97, 0, 2, 379, '2023-09-08 10:49:00', '2023-09-08 10:49:42', 'cash', 'charge', '60', '0', '', '', '2023-09-08 00:00:00', '0'),
(98, 0, 2, 379, '2023-09-08 10:49:00', '2023-09-08 10:49:54', 'cash', 'charge', '5000', '2000', '', '', '2023-09-08 00:00:00', '0'),
(99, 3, 0, 379, '2023-09-08 10:53:00', '2023-09-08 10:54:00', 'cash', 'bill', '52', '0', '', '', '2023-09-08 00:00:00', '0'),
(100, 2, 0, 379, '2023-09-08 10:54:00', '2023-09-08 10:54:27', 'check', 'bill', '0', '199', 'BDO', '00-00-00', '2023-09-08 00:00:00', '500'),
(101, 3, 0, 379, '2023-09-08 10:55:00', '2023-09-08 10:55:54', 'cash', 'bill', '200', '0', '', '', '2023-09-08 00:00:00', '0'),
(102, 3, 0, 379, '2023-09-08 10:55:00', '2023-09-08 10:56:07', 'cash', 'bill', '1000', '600', '', '', '2023-09-08 00:00:00', '0'),
(103, 3, 0, 379, '2023-09-08 10:57:00', '2023-09-08 10:57:15', 'cash', 'bill', '700', '0', '', '', '2023-09-08 00:00:00', '0'),
(104, 3, 0, 379, '2023-09-08 10:57:00', '2023-09-08 10:57:35', 'check', 'bill', '0', '0', 'BDO', '000000', '2023-09-08 00:00:00', '21'),
(105, 3, 0, 379, '2023-09-08 10:57:00', '2023-09-08 10:58:27', 'check', 'bill', '0', '30', 'BDo', '1111111111', '2023-09-08 00:00:00', '50'),
(106, 3, 0, 379, '2023-09-08 11:00:00', '2023-09-08 11:00:30', 'cash', 'bill', '1500', '257', '', '', '2023-09-08 00:00:00', '0'),
(107, 3, 0, 379, '2023-09-08 11:00:00', '2023-09-08 11:01:22', 'check', 'bill', '0', '8362', 'BDO', '11111', '2023-09-08 00:00:00', '10000'),
(108, 3, 0, 379, '2023-09-08 11:02:00', '2023-09-08 11:02:30', 'check', 'bill', '2000', '20', 'BDO', '111111111', '2023-09-08 00:00:00', '2000'),
(109, 0, 10, 379, '2023-09-08 13:09:00', '2023-09-08 13:09:34', 'cash', 'charge', '440', '0', '', '', '2023-09-08 00:00:00', '0'),
(110, 0, 10, 379, '2023-09-08 13:11:00', '2023-09-08 13:11:15', 'cash', 'charge', '120', '0', '', '', '2023-09-08 00:00:00', '0'),
(111, 0, 10, 379, '2023-09-08 13:12:00', '2023-09-08 13:12:39', 'cash', 'charge', '200', '0', '', '', '2023-09-08 00:00:00', '0'),
(112, 0, 10, 379, '2023-09-08 13:13:00', '2023-09-08 13:13:09', 'cash', 'charge', '300', '0', '', '', '2023-09-08 00:00:00', '0'),
(113, 0, 26, 379, '2023-09-08 16:19:32', '2023-09-08 16:19:32', 'cash', '', '800', '20', NULL, NULL, NULL, NULL),
(114, 0, 27, 379, '2023-09-08 16:35:52', '2023-09-08 16:35:52', 'cash', 'cash', '300', '0', NULL, NULL, NULL, NULL),
(115, 0, 29, 379, '2023-09-08 16:42:05', '2023-09-08 16:42:05', 'cash', 'cash', '300', '0', NULL, NULL, NULL, NULL),
(116, 0, 30, 379, '2023-09-08 16:42:34', '2023-09-08 16:42:34', 'cash', 'cash', '1000', '150', NULL, NULL, NULL, NULL),
(117, 0, 31, 379, '2023-09-08 16:43:14', '2023-09-08 16:43:14', 'cash', 'cash', '600', '0', NULL, NULL, NULL, NULL),
(118, 0, 32, 379, '2023-09-08 16:46:01', '2023-09-08 16:46:01', 'cash', 'cash', '1000', '150', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room_tb`
--

CREATE TABLE `room_tb` (
  `Roomref` varchar(200) NOT NULL,
  `roomDescription` varchar(200) NOT NULL,
  `rateperDay` float NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Available',
  `room_ID` int(11) NOT NULL,
  `createDate` datetime NOT NULL DEFAULT current_timestamp(),
  `modifiedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_tb`
--

INSERT INTO `room_tb` (`Roomref`, `roomDescription`, `rateperDay`, `status`, `room_ID`, `createDate`, `modifiedDate`) VALUES
('sampleRoom', 'sampleDescription', 1000, '1', 1, '2023-09-01 09:58:05', '2023-09-01 09:58:05'),
('Private-A', 'Private Room A', 2500, 'Available', 2, '2023-09-01 09:58:05', '2023-09-01 09:58:05'),
('Private-A', 'Private Room B', 2000, 'Under Maintenance', 3, '2023-09-01 09:58:05', '2023-09-01 09:58:05'),
('ICU', 'ICU', 4, 'Available', 5, '2023-09-01 09:58:05', '2023-09-01 09:58:05'),
('ICU', 'ICU', 4, 'Available', 6, '2023-09-01 09:58:05', '2023-09-01 09:58:05'),
('ICU', 'ICU', 3000, 'Available', 7, '2023-09-01 09:58:05', '2023-09-01 09:58:05'),
('ICU', 'ICU', 3000, 'Available', 8, '2023-09-01 09:58:05', '2023-09-01 09:58:05'),
('ICU', 'ICU', 3000, 'Available', 9, '2023-09-01 09:58:05', '2023-09-01 09:58:05');

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

-- --------------------------------------------------------

--
-- Table structure for table `services_tb`
--

CREATE TABLE `services_tb` (
  `transID` int(11) NOT NULL,
  `Services` text NOT NULL,
  `RequestedName` varchar(60) NOT NULL,
  `PatientName` varchar(60) NOT NULL,
  `remarks` text NOT NULL,
  `departmentID` int(11) NOT NULL,
  `ChiefComplaint` text NOT NULL,
  `WorkingDx` text NOT NULL,
  `reason` varchar(240) NOT NULL,
  `EnteredBy` int(11) NOT NULL,
  `ChargeNo` int(11) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `dateTimeCollection` datetime DEFAULT NULL,
  `modifiedDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services_tb`
--

INSERT INTO `services_tb` (`transID`, `Services`, `RequestedName`, `PatientName`, `remarks`, `departmentID`, `ChiefComplaint`, `WorkingDx`, `reason`, `EnteredBy`, `ChargeNo`, `Date`, `dateTimeCollection`, `modifiedDate`) VALUES
(9, '[{\"subtotal\":\"350.00\",\"product_id\":\"LAB***AFB(SPUTUM)\",\"qty\":\"1\",\"price\":\"350\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"4\",\"unit\":\"TEST\",\"itemType\":\"LABORATORY\",\"itemTypeID\":\"39\",\"product_desciption\":\"AFB (SPUTUM TEST)\"},{\"subtotal\":\"11.00\",\"product_id\":\"PREV.BAL\",\"qty\":\"10\",\"price\":\"1\",\"disc_percent\":\"0\",\"disc_amt\":\"0.00\",\"id\":\"504\",\"unit\":\"PHP\",\"itemType\":\"OTHERS\",\"itemTypeID\":\"40\",\"product_desciption\":\"PREVIOUS BALANCE OPD\"}]', '25', '600', 'Sample  RemarksSample  RemarksSample  RemarksSample  Remarks', 5, 'Sample Cheif Complaint', 'Sample Workind DX', 'Test Reason Test Reason Test Reason Test Reason Test Reason Test Reason Test Reason Test Reason Test Reason Test Reason ', 29, 1, '2023-09-13 00:00:00', NULL, '2023-09-13 00:00:00'),
(10, '', '', '', '', 0, '', '', '', 0, 0, '2023-09-14 13:03:46', NULL, '2023-09-14 13:03:46'),
(11, '', '24', '', 'test', 0, '', '', '', 0, 0, '2023-09-14 15:32:40', NULL, '2023-09-14 15:32:40'),
(12, '', '25', '', '', 0, '', '', '', 0, 0, '2023-09-14 15:51:12', NULL, '2023-09-14 15:51:12'),
(13, '', '24', '', '', 0, '', '', '', 0, 0, '2023-09-14 15:51:50', NULL, '2023-09-14 15:51:50'),
(14, '', '24', '', '', 0, '', '', '', 0, 0, '2023-09-14 16:00:35', NULL, '2023-09-14 16:00:35'),
(15, '', '24', '', '', 0, '', '', '', 0, 0, '2023-09-14 16:01:23', NULL, '2023-09-14 16:01:23'),
(16, '', '26', '', '', 0, '', '', '', 0, 0, '2023-09-14 16:02:16', NULL, '2023-09-14 16:02:16'),
(17, '', '27', '', '', 0, '', '', '', 0, 0, '2023-09-14 16:02:59', NULL, '2023-09-14 16:02:59'),
(18, '[[\"\"],[\"INORGANIC PHOSPHATE\"]]', '', 'TestLname,TestFname TestMname | ID: 3', '', 5, '', '', 'test', 0, 32, '2023-09-14 16:18:05', NULL, '2023-09-14 16:18:05'),
(19, '[[\"\"],[\"UPPER ABDOMEN\"]]', 'DR MADAJE,MARICHUE  | ID: 24', '7', '', 6, '', '', 'test', 0, 32, '2023-09-14 16:20:12', NULL, '2023-09-14 16:20:12'),
(20, '[[\"\"]]', 'DR. DAUIGOY,HELEN  | ID: 29', '28', '', 0, '', '', 'test', 0, 29, '2023-09-14 16:26:50', NULL, '2023-09-14 16:26:50'),
(21, '[[\"\"]]', '', '46', '', 6, '', '', 'test', 0, 33, '2023-09-14 16:28:24', NULL, '2023-09-14 16:28:24'),
(22, '[[\"\"]]', 'DR MADAJE,MARICHUE  | ID: 24', '3', '', 6, '', '', 'test', 0, 31, '2023-09-14 16:31:54', NULL, '2023-09-14 16:31:54'),
(23, '[[\"\"],[\"PROSTATE UTZ\"],[\"UPPER ABDOMEN ULTZ\"],[\"UPPER ABDOMEN\"]]', 'DR. GONZALES,MELISSA  | ID: 23', '67', '', 6, '', '', 'test', 0, 31, '2023-09-14 16:34:02', NULL, '2023-09-14 16:34:02'),
(24, '[[\"\"],[\"AFB (SPUTUM TEST)\"]]', '', '9', '', 5, '', '', 'test', 0, 26, '2023-09-14 16:35:31', NULL, '2023-09-14 16:35:31'),
(25, '[[\"\"],[\"X-RAY ELBOW AP/LAT\"],[\"X-RAY NASAL BONE BOTH LATERAL\"]]', 'DR. BERNARDO,BERNARDO  | ID: 27', '7', '', 7, '', '', 'test', 0, 19, '2023-09-14 16:36:34', NULL, '2023-09-14 16:36:34'),
(26, '[[\"\"],[\"UPPER ABDOMEN\"]]', '', '4', '', 6, '', '', 'test', 0, 29, '2023-09-14 16:37:46', NULL, '2023-09-14 16:37:46'),
(27, '[[\"\"]]', 'DR MADAJE,MARICHUE  | ID: 24afwafw', '1', '', 0, '', '', '', 0, 0, '2023-09-14 16:45:50', NULL, '2023-09-14 16:45:50'),
(28, '[[\"\"],[\"TROPONIN-T\"]]', '25', '99', 'test', 5, '', '', 'test', 0, 32, '2023-09-14 16:48:26', NULL, '2023-09-14 16:48:26'),
(29, '[[\"\"],[\"X-RAY ELBOW AP/LAT\"],[\"XRAY CLAVICLE\"]]', '25', '3', '', 7, '', '', 'test', 0, 31, '2023-09-14 16:52:03', NULL, '2023-09-14 16:52:03');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_tb`
--

CREATE TABLE `supplier_tb` (
  `supplier_id` int(11) NOT NULL,
  `supplier_code` varchar(150) NOT NULL,
  `supplier_name` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `telNum` varchar(100) DEFAULT NULL,
  `faxNum` varchar(100) DEFAULT NULL,
  `CelNum` varchar(100) NOT NULL DEFAULT 'No Contact No.',
  `contactNo` varchar(100) DEFAULT NULL,
  `note` text NOT NULL,
  `createDate` datetime NOT NULL DEFAULT current_timestamp(),
  `modifiedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_tb`
--

INSERT INTO `supplier_tb` (`supplier_id`, `supplier_code`, `supplier_name`, `address`, `telNum`, `faxNum`, `CelNum`, `contactNo`, `note`, `createDate`, `modifiedDate`) VALUES
(1, 'TERRAMEDICS PHARMACEUTICALS, INC.', 'Terramedics Pharmaceuticals Inc.', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(2, 'AAA PHARMA,INC.', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(3, 'ABRETORTRADING', 'ABRETOR TRADING', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(4, 'ACTIMEDHEALTHCARETECHNOLOGIES', 'ACTIMEDHEALTHCARETECHNOLOGIES', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(5, 'ALABANGMEDICALCENTER', 'ALABANG MEDICAL CENTER', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(6, 'ALMAFEBENTERPRISES', 'ALMAFEB ENTERPRISES', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(7, 'AMBICA INTERNATIONAL TRADING CORP.', 'AMBICA', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(8, 'BARISO STORE', 'BARISO STORE', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(9, 'BIOSYN', 'BIOSYN', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(10, 'BPSENTERPRISE', 'BPS ENTERPRISE', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(11, 'BRAN MEDICAL ENTERPRISES', 'BRAN MEDICAL ENTERPRISES', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(12, 'BRANOPILLA', 'BRAN OPILLA', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(13, 'CALOOCANGASCRORP.', 'CALOOCAN GAS CORPORATION', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(14, 'CASH', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(15, 'CECILE\'S', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(16, 'CELLS DRUG STORE', 'CELLS DRUG STORE', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(17, 'COMARKINTERNATIONALCORP.', 'COMARKINTERNATIONALCORP.', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(18, 'CORMAYDIAGNOSTIC', 'CORMAY DIAGNOSTIC MARKETING CORP.', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(19, 'D&RMICROMEDSUPPLYINC.', 'D&RMICROMEDSUPPLYINC.', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(20, 'DANTEAGUSTIN', 'DANTE AGUSTIN', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(21, 'DONG-APHARMAPHILS.,INC', 'DONG-APHARMAPHILS.,INC', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(22, 'DPS RESULT TRADING PHILS.,INC.', 'DPS RESULT TRADING PHILS.,INC.', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(23, 'DR. CHRISTIAN DEL MUNDO', 'DR. CHRISTIAN DEL MUNDO', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(24, 'Dr. Edgar Zarate', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(25, 'DR. JOAN SY ZARATE', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(26, 'DR. SAN JUAN', 'DR. MIRASOL SAN JUAN', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(27, 'DR. SHARON FERNANDEZ', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(28, 'DR.BOLABOLA-CHING', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(29, 'DR.EJERCITO', 'DR. EJERCITO', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(30, 'DR.ELLEMA', 'DR. ELLEMA', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(31, 'DR.MENDOZA', 'DR. MENDOZA', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(32, 'DRA. MENESES', 'DRA. MENESES', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(33, 'DRA. TROVELA', 'DRA. TROVELA', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(34, 'DRA.DE LEOZ', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(35, 'DRUGPROPHARMAINC.', 'DRUGPro PHARMA INC.', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(36, 'DYNASTY', 'Dynasty Pharma', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(37, 'EQUILIFEMEDICALEQUIPMENT,SUPPLIESANDSERVICES', 'EQUILIFEMEDICALEQUIPMENT,SUPPLIESANDSERVICES', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(38, 'FERDINAND PANGILINAN', 'Ferdinand Pangilinan', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(39, 'FIRMUS', 'FIRMUS DISTRIBUTION CORPORATION', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(40, 'FORMSINTERNATIONALENT.CORP.', 'FORMSINTERNATIONALENT', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(41, 'FREDDIEDELROSARIO', 'FREDDIE DEL ROSARIO', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(42, 'GENERIC DISTRIBUTION CENTER', 'Generic Distribution Center', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(43, 'GETZBROS.PHIL INC.', 'GETZ  BROS. PHIL. INC.', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(44, 'GILDA PANGILINAN', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(45, 'ginalugto', 'GINALUGTO', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(46, 'GLENMARK PHILS.,INC.', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(47, 'GOCA MED INC.', 'GOCA MED INC', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(48, 'GOLDQUESTBIOTECHNOLOGIES,INC.', 'GOLDQUEST BIOTECHNOLOGIES, INC', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(49, 'GREAT WELL PHARMA INC.', 'GREAT WELL PHARMA INC.', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(50, 'GREENSLEEVES', 'GREENSLEEVES MARKETING', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(51, 'HAGENERASQUIN', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(52, 'HAGGAIMEDICALSUPPLIES', 'HAGGAI MEDICAL SUPPLIES', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(53, 'HOVID', 'HOVID', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(54, 'JAGMEDICALPRODUCT', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(55, 'JBL ORTHOPEDIC MEDICAL SUPPLY', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(56, 'JCSPHARMACEUTICALS,INC.', 'JCSPHARMACEUTICALS,INC.', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(57, 'JNGDRAGONENTERPRISE', 'JNGDRAGONENTERPRISE', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(58, 'JOSELUMAGUE', 'JOSELUMAGUE', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(59, 'JSMMEDICALSUPPLIES', 'JSM MEDICAL SUPPLIES', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(60, 'JUVENTISPHARMACEUTICALSPHILS.,INC.', 'JUVENTIS PHARMACEUTICALS PHILS., INC.', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(61, 'L&BCHEMEDSYSTEMINC.', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(62, 'LANGGING POSADAS', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(63, 'LPC ANIMAL BITE CENTER', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(64, 'MACAPAGAL', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(65, 'MADECSPHARMACORPORATION', 'MADECSPHARMACORPORATION', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(66, 'MAKRO', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(67, 'MALIK', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(68, 'MARCBURGPHILIPPINESINC', 'MARCBURGPHILIPPINESINC', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(69, 'MARK B. ELEJEDO', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(70, 'MEDECIAMED,INC.', 'MEDECIAMED,INC.', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(71, 'MEDEXHEALTHCORP.', 'MEDEX HEALTH CORP.', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(72, 'MEDGEAR', 'MEDGEAR', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(73, 'MEDICOTEK,INC.', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(74, 'MEDICPRO', 'MEDICPRO', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(75, 'MED-PLUSMEDICAL&LABORATORYSUPPLY', 'MED-PLUSMEDICAL&LABORATORYSUPPLY', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(76, 'MEDTRACKCORP.', 'MEDTRACKCORP.', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(77, 'MEGALIFESCIENCES', 'MEGALIFESCIENCES', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(78, 'MERCKCHEMPHARMAINC.', 'MERCKCHEMPHARMAINC.', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(79, 'METROPHILDRUG&CHEMICALTRADING', 'METROPHILDRUG&CHEMICALTRADING', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(80, 'MEYERS PHARMACEUTICAL INC.', 'Meyers Pharmaceuticals', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(81, 'MICROBIOLOGY & INFECTIOUS DESEASES CENTER', 'MICROBIOLOGY AND INFECTIOUS DESEASES CENTER', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(82, 'MOTHER SEATON', 'MOTHER SEATON', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(83, 'MVSANTIAGOMEDICAL&DIAGNOSTICCENTER', 'MV SANTIAGO MEDICAL & DIAGNOSTIC CENTER', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(84, 'NATWIDEDISTRIBUTIONINC.', 'NATWIDE DISTRIBUTION INC.', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(85, 'NEMRACMEDICAL&PHARMASUPPLIES', 'NEMRACMEDICAL&PHARMA', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(86, 'NOVO GENERICS', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(87, 'ORLANDO ANGAT', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(88, 'PANAMEDPHILIPPINES,INC', 'PANAMED PHILIPPINES, INC', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(89, 'PANGILINAN,GILDA', 'PANGILINAN, GILDA', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(90, 'PARFAIT', 'PARFAIT', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(91, 'PATRIOTPHARMACEUTICALSCORP.', 'PATRIOT PHARMACEUTICALS CORP.', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(92, 'PAULINO STORE', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(93, 'PERIDOT\'SMEDICALSUPPLIES', 'PERIDOT\'SMEDICALSUPPLIES', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(94, 'PHARMA NUTRIA,INC.', 'PHARMA NUTRIA,INC.', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(95, 'PHIL.KIDNEYDIALYSISFOUNDATION,INC.', 'PHIL. KIDNEY DIALYSIS FOUNDATION, INC.', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(96, 'PINNACLE MEDICAL', 'PINNACLE MEDICAL', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(97, 'PINNACLESUPPLIES', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(98, 'PKDFMARKETINGCORPORATION', 'PKDFMARKETINGCORPORATION', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(99, 'PREBIOTECH', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(100, 'PROBIO MEDCARE INCORPORATED', 'PROBIO MEDCARE INCORPORATED', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(101, 'PUREGOLD', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(102, 'PX.RETURNED (MEDS.)', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(103, 'RABVAX & SERUM ASIA', 'RABVAX & SERUM ASIA', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(104, 'RACHMEDPHARMACEUTICALPRODUCTSDISTRIBUTION', 'RACHMEDPHARMACEUTICALDISTRIBUTION', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(105, 'RCUBES MARKETING', 'RCUBES MARKETING', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(106, 're-imbursement', 're-imbursement', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(107, 'RIANZARES,JOSEPHINE', 'RIANZARES,JOSEPHINE', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(108, 'RICO REYES', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(109, 'RIFEMEDICACORPORATION', 'RIFEMEDICACORPORATION', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(110, 'RITEBEACONMARKETING', 'RITEBEACONMARKETING', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(111, 'ROCK ZARATE', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(112, 'ROMEL DOMINGO', 'ROMEL DOMINGO', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(113, 'ROYALMEDMEDICALSUPPLIES', 'ROYALMED MEDICAL SUPPLIES & EQUIPMENT DISTRIBUTOR', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(114, 'RX LABUYO', 'RX LABUYO', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(115, 'SAERAN PHARMA CO', 'SAERAN PHARMA CO', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(116, 'SAFETYCENTERCOMPANY,INC', 'SAFETYCENTERCOMPANY,INC', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(117, ' SALVADOR PRINT SERVICES,\n		INC.', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(118, ' SANDOVALDISTRIBUTORS,\n		INC ', ' SANDOVALDISTRIBUTORS,\n		INC ', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(119, ' SANDOVALDISTRIBUTORS.,\n		INC.', ' SANDOVAL DISTRIBUTORS,\n		INC.', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(120, ' SANZARPHARMAECEUTICALSINC.', ' SANZARPHARMAECEUTICALSINC.', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(121, ' SIGNATURE BRANDS CORPORATION ', ' SIGNATURE BRANDS CORPORATION ', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(122, ' SM ', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(123, ' SMOJEVTRADING ', ' SMOJEVTRADING ', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(124, ' SO - LAB ', ' SEND - OUT ', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(125, ' SOUTH CITY ', ' SOUTH CITY ', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(126, ' SOUTHMALL (\n			SUPERMARKET ', ' SM (SUPERMARKET) ', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(127, ' STANDARDMEDICALSOLUSTIONS TRADING INC ', ' STANDARDMEDICALSOLUSTIONS TRADING INC ', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(128, ' STOCK ', ' Previous Stock ', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(129, ' TARVAPHARMACEUTICALS & MEDICALSUPPLIES ', ' TARVAPHARMACEUTICALS ', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(130, ' THE GENERICS PHARMACY ', ' THE GENERICS PHARMACY ', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(131, ' THECATHAYYSSDISTRIBUTORSCO.,\n			INC.', ' THE CATHAY YSS DISTRIBUTORS CO.,\n			INC ', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(132, ' TINAYA,\n			MARILOU ', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(133, ' TMPI ', ' TMPI ', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(134, ' TRADEFIRSTMARKETINGCORPORATION ', ' TRADEFIRSTMARKETINGCORPORATION ', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(135, ' UNITED SHIELTER ', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(136, ' UVAX TRADING ', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(137, ' VGPOLARISDIAGNOSTICS & LABORATORYSUPPLIES ', ' VGPOLARISDIAGNOSTICS & LABORATORYSUPPLIES ', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(138, ' VILMA REYES ', ' VIE REYES ', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(139, ' VIRGO PHARMACEUTICALS ', ' Virgo Pharmaceuticals ', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(140, ' VJ FRANCA ENTERPRISE ', ' VJ FRANCA ENTERPRISE ', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(141, 'WELLNESSCAREINT  \'LCORP.', 'WELLNESSCARE INT\'L CORP.', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(142, 'WM RUTTI', 'WM RUTTI', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(143, 'WORLDWIDELINKTRADINGCORPORATION', 'WORLDWIDELINK TRADING CORPORATION', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(144, 'WRM', 'WRM', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(145, 'ZAFIREDISTRIBUTORS', 'ZAFIRE DISTRIBUTORS', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(146, 'RSGPHARMATRADING', 'RSGPHARMATRADING', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(147, 'PHILIPPINEMEDICALSUPPLIES', 'PHILIPPINE MEDICAL SUPPLIES', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(148, 'TLRMCHEMICALPRODUCTSTRADING', 'TLRMCHEMICALPRODUCTSTRADING', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(149, 'BIOPROCAREPRODUCTSINC', 'BIOPROCAREPRODUCTSINC.', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(150, '3MGSPHARMAINC.', '3MGSPHARMAINC', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(151, 'SYNERGY&COLLABORATIONDISTRIBUTIONINC.', 'SYNERGY&COLLABORATIONDISTRIBUTIONINC', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(152, 'ONEUPPHARMA&MEDICALSUPPLIESCORPORATION', 'ONEUPPHARMACEUTICAL&MEDICALSUPPLIESCORPORATION', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(153, 'SAVERMEDMARKETING', 'SAVERMEDMARKETING', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(154, 'SUHITASPHARMACEUTICAL', 'SUHITASPHARMACEUTICAL', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(155, 'A-STARLABORATORIES', 'A-STARLABORATORIES', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(156, 'FRANCAMEDICALCORPORATION', 'FRANCAMEDICALCORPORATION', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(157, 'R.M.T.MARKETING&DIAGNOSTICSOLUTIONINC.', 'R.M.T.MARKETING&DIAGNOSTICSOLUTIONSINC.', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(158, 'MEDSHIELDPHARMACORP', 'MEDSHIELPHARMACORP', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(159, 'JACKSONPHARMACEUTICALS,INC', 'JACKSONPHARMACEUTICALS,INC', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(160, 'BIO-PROCAREPRODUCTSINC.', 'BIO-PROCAREPRODUCTSINC', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(161, 'DR.BALAGTAS', 'DR. BALAGTAS', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(162, 'I.O.S.MARKETING CORPORATION', 'I.O.S.MARKETINF CORPORATION', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(163, 'SJVENDEARS', 'SJVENDEAVORS', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(164, 'FMCDISTRIBUTIONSCORPORATION', 'FMCDISTRIBUTIONSCORPORATION', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(165, 'KAUFMANNPHARMAINC.', 'KAUFMANNPHARMAINC', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(166, 'ESTIBANINDUSTRIES', 'ESTIBANINDUSTRIES', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(167, 'CURASAVEPHARMA', 'CURASAVEPHARMA', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(168, 'VALUEDISTRIBUTIONTRADINGCORP.', 'VALUEDISTRIBUTIONCORP.', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(169, 'CLEARVUEPHARMACEUTICAL', 'CLEARVUEPHARMACEUTICAL', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(170, 'R.M.BUENVIAJEDENTALSUPPLIESTRADING', 'R.M.BUENVIAJEDENTALSUPPLIESTRADING', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(171, 'ABRMEDIZONEMEDICALSUPPLIES', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(172, 'ASSOCIATEDDRUGS,INC', 'ASSOCIATEDDRUGS,INC', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(173, 'VIGOROUSHEALTHPHARMA', 'VIGOROUSHEALTHPHARMA', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(174, 'DR. RALPH GASCON', '', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(175, 'DISTRIPHIL', 'DISTRIPHIL', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(176, 'SJJPHARMA&MEDICALSUPPLIESDISTRIBUTION', 'SJJPHARMA&MEDICALSUPPLIESDISTRIBUTION', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(177, 'HEALTHQOMARKETING', 'HEALTHQOMARKETING', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(178, 'SJJPHARMAANDMEDICALSUPPLIESDISTRIBURION', 'SJJPHARMANADMEDICALSUPPLIESDISTRIBUTION', '', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(179, 'JOHNTANN,INTL.PHARMA.CORP.', 'JOHNTANN,INTL.PHRAMA.CORP.', '', '', '', '', '', 'RACQUEL', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(180, 'MGR LAB & DIAGNOSTIC SUPPLIES', 'MGR LABORATORY  & DIAGNOSTIC SUPPLIES', '', '', '', '', '', 'CO DONABEL GARCIA', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(181, 'LORRAINE CHAUDRY/CASH', 'LORRAINE CHAUDRY/CASH', '', '', '', '09276248199', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(182, 'MYLENE BANDONG', 'MYLENE BANDONG', 'LAS PINAS CITY', '', '', '09169691035', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(183, 'NAVEX', 'NAVEX PHARMACEUTICALS', 'ROXAS CITY', '', '', '09176258005', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(184, 'OPILLADYNAMICENTERPRISES', 'OPILLA DYNAMIC', 'AGONCILLO ST., ERMITA', '', '', '09183411326', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(185, 'INTERNATIONAL PHARMACEUTICAL,INC.', 'INTERNATIONAL PHARMACEUTICAL,INC.', 'LAS PINAS CITY', '', '', '', '', 'RACQUEL', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(186, '4EAS PHARMACY', '4EAS', 'CC BF LPC', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(187, 'ABC LABORATORIES', 'ABC LABORATORY', 'LAS PINAS CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(188, 'ABSANDOVALDRUGSTORES,INC', 'ABSANDOVALDRUGSTORES,INC', 'PASIG CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(189, 'AGAPE ENTERPRISES', '', 'B4 L40 SIENNA ST. SAPPHIRE HILLS TUNASAN MUNTI.', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(190, 'AIRBRIDGE 3000 DISTRIBUTION(PHARMACY),INC.', 'AIRBRIDGE 3000 DISTRIBUTION (PHARMACY),INC.', 'Don bosco,paranaque', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(191, 'ALKEM LAB.CORP.', 'ALKEM LAB.CORP.', 'MAKATI CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(192, 'A-ZMARKETENTERPRISEDEVELOPERSINC', 'A-ZMARKETENTERPRISEDEVELOPERSINC', 'LPC', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(193, 'BALEJOMEDICAL&DENTALSUPPLIES', 'BALEJOMEDICAL&DENTALSUPPLIES', 'LPC', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(194, 'BARR-XSEL TRADING', 'BARR-XSEL TRADING', 'PASAY CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(195, 'BASICSANDTRENDS', 'BASICSANDTRENDS', 'LPC', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(196, 'BELRISMARKETING', 'BELRISMARKETING', 'LPC', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(197, 'BERTHASY', 'BERTHASY', 'LPC', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(198, 'BIOCARELIFESCIENCESINC.', 'BIOCARELIFESCIENCESINC.', 'LPC', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(199, 'BIOPLUS-CRADOR,CORP.', 'BIOPLUS-CRADOR,CORP.', 'MANDALUYONG CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(200, 'BLUESKY TRADING CO.,', 'BLUE SKY TRADING CO., INC.', 'MANILA', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(201, 'BZBTRADING', '', 'PUROK I BAMBANG BULAKAN, BILACAN', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(202, 'CARELINEENTERPRISES', 'CARE LINE ENTERPRISES', 'LAGUNA', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(203, 'CASH&CARRY', 'CASH & CARRY', 'BUENDIA MAKATI CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(204, 'CASIMIRO COMMERCIAL DRUG STORE', 'CASIMIRO COMMERCIAL DRUG STORE', 'CASIMIRO LPC', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(205, 'CHRISTTHEKINGMEDICALCENTER', 'CHRISTTHEKINGMEDICALCENTER', 'LPC', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(206, 'DELEXPHARMAINTERNATIONAL,INC.', 'DELEXPHARMAINTERNATIONAL', 'QC', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(207, 'DUOPHARMA', 'DUOPHARMA', 'MAKATI CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(208, 'E.CUBE DRUG', 'E.CUBE DRUG', 'LAS PINAS CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(209, 'ENDUREMEDICAL', 'ENDURE MEDICAL INC.', 'PASIG CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(210, 'ENSUREMEDINC', 'ENSUREMEDINC.', 'QC', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(211, 'FORMSINTERNATIONALENT.CORP,.', 'FORMSINTERNATIONALENT', 'LPC', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(212, 'HPLAB', 'HP LABORATORY', 'LAS PINAS', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(213, 'I.O.SMARKETINGCORPORATION', 'I.O.SMARKETINGCORPORATION', 'QUIAPO MANILA', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(214, 'IAE PHARMA', 'Menandro V. Lugto', 'LAS PINAS CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(215, 'INNOGENPHARMACEUTICAL', 'INNOGEN PHARMACEUTICALS, INC.', 'QUEZON CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(216, 'I-SENZMEDICAL,INC.', 'I-SENZMEDICAL,INC.', 'MAKATI CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(217, 'JASRICH', 'JASRICH', 'STA CRUZ MLA.', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(218, 'JAY&EMYTRADING', 'JAY&EMYTRADING', 'LPC', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(219, 'JAYTEE GASES, INC.', 'JAYTEE GASES INCORPORATED', 'SAMPAGUITA ST. GOODWILL VILL.', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(220, 'JOSEPHINERIANZARES', 'JOSEPHINERIANZARES', 'LP', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(221, 'LIFELINE', 'LIFELINE DIAGNOSTICS SUPPLIES', 'QUEZON CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(222, 'lpcmc', 'LPCMC', 'LAS PINAS CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(223, 'MARIDANINDUSTRIES,INC.', 'MARIDANINDUSTRIES,INC.', 'ZONE 7 DIVERSION RD.. JARO ILOILO CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(224, 'MEDCONPHARMAINC.', 'MEDCONPHARMAINC', 'MAKATI CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(225, 'MEDEXCELDISTRIBUTIONSINC.', 'MEDEXCELDISTRIBUTIONSINC', 'PARANAQUE CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(226, 'MEDICOMHEALTHCLINIC&ANIMAL-BITECLINIC', 'MEDICOMHEALTHCLINIC&ANIMAL-BITECLINIC', 'LPC', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(227, 'MENANDRO V. LUGTO', 'Menandro V.Lugto', 'LAS PINAS CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(228, 'MERKCHEMPHARMAINC.', 'MERKCHEMPHARMAINC', 'LP', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(229, 'MTGILEAD', 'MT GILEAD LABORATORY', 'URCI TOWNHOMES', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(230, 'NATRAPHARM,INC.', 'NATRAPHARM,INC', 'PARANAQUE CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(231, 'NF-SALVATUSMEDICALTRADINGCORP.', 'NF-SALVATUSMEDICALTRADINGCORP.', 'LPC', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(232, 'OAKWENMARKETING', 'OAKWENMARKETING', 'MUNTINLUPA CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(233, 'ORO OXYGEN CORP.', 'ORO OXYGEN CORP.', 'B5 L32 PHASE 1 VILLA NENA SUBD. BALULANG, CAGAYAN', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(234, 'P', 'ASNC TRADING/MARKETWORLD', 'PACITA COMPLEX SAN PEDRO LAGUNA', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(235, 'PAPYRUSUNLIMITEDCORP.', 'PAPYRUS UNLIMITED CORP.', '#4MONINA YLLANA ST., BF RESORT LAS PINAS CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(236, 'PHARMAGALENXINNOVATIONS', 'PHARMAGALENXINNOVATIONS', 'ILOILO CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(237, 'PHILMEDSTRADING', 'PHILMEDSTRADING', 'LPC', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(238, 'PRIMEMEDICASUPPLYINC.', 'PRIME MEDICA SUPPLY INC.', 'DEL MONTE AVE. DAMAYAN SFDM', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(239, 'PRO BIO PHARMA, INC.', 'PRO BIO PHARMA, INC.', 'MAKATI CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(240, 'PRO BIO PHARMA,INC.', 'PRO BIO PHARMA,INC.', 'MAKATI CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(241, 'PROBIOHEALTH', 'PROBIOHEALTH', 'FILINVEST CORPORATE CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(242, 'PRODLINE ENTERPRISES COMPANY', 'PRODLINE ENTERPRISES COMPANY', 'PARANQUE CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(243, 'QUEBEC PHARMACEUTICALS,INC.', 'QUEBEC PHARMACEUTICALS,INC.', 'PASIG CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(244, 'RCLVACCINEDEALER', 'RCL VACCINE DEALER', '175 N.S AMORANTO AVE. BULUSAN ST., QUEZON CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(245, 'REBMANNINCORPORATED', 'REBMANNINCORPORATED', 'QC', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(246, 'REMED Ph.', 'REMED PHARMACEUTICALS, INC', 'AYALA AVE. MAKATI CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(247, 'R-MERKDRUG,INC.', 'R-MERKDRUG,INC.', 'QC', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(248, 'ROAVSANGENERALMERCHANDISE', 'ROAVSANGENERALMERCHANDISE', 'BULACAN', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(249, 'RODEL PONSICA', 'RODEL PONSICA', 'LPC', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(250, 'RRMTCOPYENTERPRISES', 'RRMTCOPYENTERPRISES', 'LPC', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(251, 'SAFETYCENTERCOMPANY', 'SAFETYCENTERCOMPANY', 'LPC', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(252, 'SAMBRIELENTERPRISE', 'SAMBRIELENTERPRISE', 'MAKATI CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(253, 'SPRINTSERVEPHARMA', 'SPRINTSERVEPHARMA', 'QUEZON CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(254, 'TOPONETRADING', 'TOPONETRADING', 'MALABON CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(255, 'TOTALCARE PHARMA INC.', 'TOTALCARE PHARMA', '2205-A WEST TOWER PHIL. STOCKS EXCHANGE ORTIGAS', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(256, 'TRAININGANDMARKETINGPROFESSIONALSINC.', 'TRAININGANDMARKETINGPROFESSIONALSINC.', 'LPC', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(257, 'TRIANON INTERNATIONAL,INC', 'TRIANONINTERNATIONAL', 'MANILA', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(258, 'TYRONNE TRANQUILINO', 'TYRONNE TRANQUILINO', 'EZEC CASIMIRO', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(259, 'UNIWIDE SALES WAREHOUSE', 'UNIWIDE SALES (WAREHOUSE)', 'PAMPLONA III LAS PINAS CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(260, 'ValuePointSupermarket', 'Value Point Supermarket', 'Pamplona 2 Las Pinas City', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(261, 'WERTPHILIPPINESINC.,', 'WERT PHILIPPINES INC.,', 'ORTIGAS AVE. SAN  JUAN CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(262, 'YSLMERCHANDISING', 'YSLMERCHANDISING', 'PASAY CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(263, 'ACOMMERCE INC.', 'ACOMMERCE INC.', 'BONIFACIO,TAGUIG CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(264, 'SANNOVEX PHARMACEUTICAL DISTRIBUTOR', 'SANNOVEX PHARMACEUTICAL DISTRIBUTOR', 'BONI AVENUE,MANDALUYONG CITY', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(265, 'DYNAMED', 'DYNAMED', 'QC', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(266, 'UNI-ASIA HEALTHCARE MEDICAL CORPORATION', 'UNI-ASIA HEALTHCARE MEDICAL CORPORATION', 'STA CRUZ,MANILA', '', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(267, 'ACCESSPOINTINTERNATIONALTRADINGINC.', 'ACCESSPOINTINTERNATIONALTRADINGINC.', '14B TOPAZ ST., BRGY SAN ISIDRO', '', '', '', '3922694', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(268, 'COLUMBIA ENTERPRISES', 'COLUMBIA ENTERPRISES', '', '', '', '', '4112395-98', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(269, 'GADH', 'GOLDEN ACRES DOCTORS HOSPITAL', 'LPC', '', '', '', '8062026', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(270, 'L&B CHEMICAL & MEDICAL SYSTEMS', 'L & B CHEMICAL AND MEDICAL SYSTEMS', '', '', '', '', '4557288', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(271, 'PAGODAPHILIPPINES, INC.', '', '', '', '', '', '7156946', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(272, 'RX GLOBAL', 'RX GLOBAL', 'UNIT 808 CITY & LAND MEGA PLAZA ORTIGAS PASIG CIT', '', '', '', '9149658', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(273, 'ANIMAL BITE CENTER', 'LAS PINAS CITY AMIMAL BITE CENTER', 'AGUILIA COMPD ALABANG ZAPOTE', '8019236', '', '09168350224', '8019236', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(274, 'AVELICONMARKETING', 'AVELICON MARKETING', 'CASIMIRO PHASE3 LPC', '8715793', '', '', '8255041', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(275, 'CBCLINKOFMANILA,INC.', 'LINK OF MANILA, INC.', '32896 FINLANDIA ST., MAKATI CITY', '8441466', '', '', '7574495/ 8443940', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(276, 'EURO-THERAPEUTICS,INC.', 'EURO-THERAPEUTICS,INC.', 'AYALA AVE,MAKATI CITY', '8177344', '', '', '8128502', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(277, 'HERMACUS', 'HERMACUS', '', 'MAKATI CITY', '', '', '8699676', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(278, 'LPDH', 'LAS PINAS DOCTORS\' HOSPITAL', '8009 J. AGUILAR AVE. PULANG LUPA LAS PINAS CITY', '825-52-36', '', '', '8297715', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(279, 'MARKETWORLD DISTRIBUTORS CORPORATION', 'MARKETWORLD DISTRIBUTORS  CORPORATION', 'PASIG CITY', '(632)6344845/46', '', '', '(632)6344839', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(280, 'MORISHITA-SEGGS PHARMA.,INC.', 'MORISHITA-SEGGS PHARMACEUTICALS,INC.', 'MANDALUYONG CITY', '5320740', '', '', '5320443', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(281, 'STARDUST DRUG & MEDICAL SUPPIES CORP.', 'STARDUST DRUG & MEDICAL SUPPLIES CORP.', 'STA CRUZ,MANILA', '3099690', '', '', '7408693', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(282, 'TERRAMEDIC, INC.', 'TERRAMEDIC, INC.', 'MAKATI CITY', '8132746', '', '', '8132807', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(283, 'THECATHAY DRUG CO.,INC.', 'THE CATHAY DRUG CO.,INC', '2ND FLR VERNIDA 1 CONDM AMORSOLO ST LEGASPI VILL M', '8925936', '', '', '8940553', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(284, 'ALDRIL PHARMA,INC.', 'ALDRIL PHARMACEUTICAL,INC.', '', '372663739', '', '3726639 LOC19', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(285, 'ANEBEDEXON MARKETING', 'Anebedexon marketing', '193 Don Fabian St. comm.,Quezon City', '4270962', '', '09195688588', '', 'c/o Mylene Bandong', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(286, 'DOCTOR\'SSTORE', 'DOCTOR\'SSTORE', '16 NARRA ST. CAA LAS PINAS CITY', '5468426', '', '09273847049', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(287, 'L&M', 'L&M PHARMACY & DISTRIBUTOR', 'NO.1 MANUYO1 LPC', '820-7087', '', '09285008843', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(288, 'PEPSI', 'PEPSI', '', '8023805', '', '09208030521', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(289, 'SOUTHMED ENTERPRISE', 'SOUTHMED', 'LPC', '3317360', '', '09184724994', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(290, 'UR WAY ENTERPRISES', 'UR WAY ENTERPRISES', '31 BAUTISTA ST. ZONE 4 DASMARINAS CAVITE', '046-4162860', '', '09234358509', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(291, 'walk in', 'walk in', '16 j sguilar ave. talon lpc', '874-69-05', '', '', '', 'walk in only', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(292, '5 JP\'S ENTERPRISES', '5 JP\'S ENTERPRISES', '# 2 Dama De noche Ext.Manuela subd.,pamplona III,L', '8744626/4719095', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(293, 'A.ZARATEGEN.HOSPITAL', 'A. ZARATE GENERAL HOSPITAL', 'ATLAS COMPOUND NAGA RD. PULANG LUPA LAS PINAS CITY', '8746903', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(294, 'A-67Pharma', 'A-67 Pharma Distribution Center', 'Las Pinas Commercial Complex', '5568813', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(295, 'ANTECH', 'ANTECH', 'MAKATI CITY', '(632)7575581-82', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(296, 'BASIC GOODS MARKETING, INC.', 'BASIC GOODS MARKETING INC.', '#3 ST. PETER ST. BO. ORANBO,PASIG CITY', '6355009/632-0340', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(297, 'BASICPHARMA', 'BASIC PHARMACEUTICAL CORP.', '#38 BARASOAIN ST. LITTLE BAGUIO, SAN JUAN', '7242931/7234151', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(298, 'BIO GENERRA MARKETING INC.', 'BIO GENERRA MARKETING INC.', '2ND FLOOR L1 B33 URANIUM ST., PILAR VILLAGE LPC', '800 3846', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(299, 'BIOPHARMA', 'BIOPHARMA INERNATIONAL MEDICAL DISTRIBUTOR,INC.', '', '7722785', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(300, 'BIO-STRATA PHARMACEUTICALS,INC.', 'BIO-STRATA PHARMACEUTICALS,INC.', '101 SHAW BLVD.PASIG CITY', '6320265', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(301, 'BOTIKANGPINOY', 'BOTIKANG PINOY', '1573 TRAMO ST. BRGY ZXAPOTE LPC', '8065413', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(302, 'C.G.N. LABCARE ENTERPRISE', 'C.G.N. LABCARE ENTERPRISE', 'QUEZON CITY', '9262486', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(303, 'callejo clinic', 'callejoclinic', 'alabang zapote rd. las pinas city', '8752950', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(304, 'C-CUBE GENERAL MERCHANDISE', 'C-CUBE', 'MAKATI CITY', '8334909', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(305, 'CHEMPORT MEDICAL CORPORATION', 'CHEMPORT', 'QC', '7265054', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(306, 'CJG MEDICAL PRODUCTS CENTER', 'CJG MEDICAL PRODUCSTS CENTER', 'LAS PINAS', '8053250', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(307, 'COCA-COLA COMP.', 'COCA- COLA COMPANY', '', '8721119', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(308, 'COLENT ENTERPRISE COMPANY', 'COLENT ENTERPRISE COMPANY', 'QUEZON CITY', '4112395/98', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(309, 'CSANTOS', 'Cecil Santos', 'Sta Cruz Manila', '7311479', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(310, 'DUMEX PHILIPPINES,INC.', 'DUME X PHILIPPINES,INC.', '3F,IDC BLDG.E.RODRIGUEZ JR.AVE.UGONG NORTE,LIBISQC', '6381818', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(311, 'EANDISTRIBUTORS', 'EAN DISTRIBUTORS', 'EL NGRANDE AVE. BF RESORT PQUE CITY', '8267034', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(312, 'EMPIRICAL', 'EMPIRICAL ENTERPRISES', '#146 KAPILIGAN ST. ARANETA AVE. QUEZON CITY', '414-4105', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(313, 'FEDERATED DISTRIBUTORS, INC.', 'FEDERATED DISTRIBUTORS, INC.', 'PARAÑAQUE CITY', '8517020', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(314, 'FEDERATED DISTRIBUTORS,INC.', 'FEDERATED DISTRIBUTORS, INC.', 'PARAÑAQUE CITY', '8517020/24', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(315, 'GLOBOASIATICOENTERPRISES,INC', 'GLOBO ASIATICO ENTERPRISES, INC', 'QUEZON CITY', '9827000', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(316, 'GLOBOASIATICOENTERPRISES,INC.', 'GLOBOASIATICOENTERPRISES,INC.', 'QUEZON CITY', '9827032', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(317, 'GREATRICH-EMENTERPRISES', 'GREAT RICH - EM ENETRPRISES', 'B2 L38 AVE. CASIMIRO LPC', '8711192', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(318, 'GREENALLEYDESIGNCONCEPT', 'GREEN VALLEY DESIGN CONCEPT', 'UNIT 1516 LPC COMPLEX', '8756635', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(319, 'HGT MEDICAL SUPPLY', 'HGT MEDICAL SUPPLY', '1459 RIZAL AVENUE, STA.CRUZ MANILA', '749-25-35/314-66-16', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(320, 'JNSMEDICALTRADING', 'JNS MEDICAL TRADING', 'ALVAREZ ST., COR. RIZAL AVE, STA. CRUZ MNILA', '8053576', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(321, 'KAUFFMANN PHARMA INC.', 'KAUFFMANN', 'Q.C', '9290806', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(322, 'L.D.K. GEN MERCHANDISE', 'L.D.K.', 'JUAN LUNA MANILA', '2429084', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(323, 'L.MEYERF PHARMA', 'L.MEYERF PHARMA', 'MAKATI CITY', '8177132', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(324, 'LABMATEPHARMA', 'LABMATEPHARMA', 'Q.C.', '9273211', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(325, 'LAKESIDE PHARMACEUTICALS PHILS., INC.', 'LAKESIDE PHARMACEUTICALS PHILS., INC.', 'QC', '7405246', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(326, 'LIFE GEN', 'LIFE GEN', 'MUNTINLUPA', '025568174', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(327, 'LIFEONETRADING', 'LIFE ONE TRADING', '', '5435669', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(328, 'LINK OF MANILA', 'LINK OF MANILA INC', 'SAN ISIDRO MAKATI CITY', '2396103', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(329, 'MAGNA GOLD PHARMA INC.', 'MAGNA GOLD PHARMA INC.', '', '5648885-87', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(330, 'MEDHAUS PHARMA', 'MEDHAUS PHARMA', 'KAMUNING QUEZON CITY', '4166288', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(331, 'MEDI7TRADING', 'MEDI7 TRADING', 'UNIT 223 COLUMBIA CRYSTAL COND. QUEZON CITY', '7091706', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(332, 'MEDPORT', 'MEDPORT DISTRIBUTORS INC.', 'G/FRICHSTONE SURGICARE CENTER 886 G. ARANETE AVE.,', '(632)7812109', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(333, 'METRO MED ENTERPRISES', 'METRO MED ENTERPRISES', 'TAGUIG, METRO MANILA', '8378204', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(334, 'MIRABELLMEDICALCORP.', 'MIRABELLMEDICALCORP.', 'MANDAUTONG', '6554102', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(335, 'MJR BEAUTY SECRET INT\'L.CO.', 'MJR BEAUTY SECRET INT\'L.CO.', '139 LEGASPI ST.CALUMPANG,MARIKINA CITY', '3697035 9455263', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(336, ' ONEPHARMA COMPANY ', ' ONE PHARMA ', ' LIWNAG ST.COR G.DIAZ BFRV CLASSIC 1 LPC ', ' 8712941 ', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(337, ' ORGANICA NUTRACEUTICALS ', ' ORGANICA NUTRACEUTICALS ', ' Q.C.', ' 4128717 ', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(338, ' OXFORD ', ' OXFORD DISTRIBUTOR ', ' ORTIGAS SAN ANTOONIO PASIG ', ' 5846619 ', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(339, ' PERPS ', ' UNIVERSITY OF PERPETUAL HELP RIZAL ', ' ALABANG ZAPOTA RD.,\n		PAMPLONA LAS PINAS CITY ', ' 8748515 ', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(340, ' PHARMA DYNAMIC,\n		INC.', ' Pharma Dynamic,\n		Inc.', ' PDI Bldg.,\n		71 Maysilo St.,\n		Mandaluyong,\n		Mmla ', ' 532 -20 -21 to 24 ', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(341, ' PHARMATRIX ', ' PHARMATRIX ', ' ORTIGAS CENTER PASIG CITY ', ' 6354885 ', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(342, ' PHOENIXPHARMACEUTICAL,\n		INC ', ' PHOENIX PHARMACEUTICAL,\n		INC ', '', ' 887 -7735 ', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(343, ' PRIMAMODAS,\n		INC.', ' PRIMA MODAS,\n		INC.', ' J.AGUILAR AVE.TALON ', ' 3843959 ', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(344, ' PROSEL PHARMACEUTICALS,\n		INC.', ' PROSEL PHARMACEUTICALS,\n		INC.', ' 9724 PILILIA ST.SANTIAGO VILLAGE,\n		MAKATI CITY ', ' 8954357 / 8954358 ', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(345, ' RANDRIL INTERNATIONAL CO.,\n		INC ', ' RANDRIL INTERNATIONAL CO.,\n		INC.', ' #2205-A WEST TOWER, PHIL', '6363699', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(346, 'RBC-MDC CORPORATION', 'RBC-MDC CORPORATION', 'CUPANG MUNTINLUPA CITY', '7721471', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(347, 'RHYZELDRUGSTORE', 'RHYZEL DRUGSTORE', '393+ REAL ST. PULANG LUPA LPC', '8227967', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(348, 'RICHLANE MERCHANDISING', 'RICHLAINE MERCHANDISING', '#28 AGUINALDO HIGHWAY SALITRAN DASMA. CAVITE', '(046) 4162344/4162307', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(349, 'RITM', '', '', '8072628-32', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(350, 'RITZENPHILIPPINES,INC.', 'RITZEN PHILIPPINES, INC.', 'ALABANG MUNTINLUPA', '8506844', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(351, 'RUSSKY COMMERCIAL', 'RUSSKY COMMERCIAL', 'SAMPALOC MANILA', '7357410', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(352, 'RUTTI PHARMACEUTICAL,INC.', 'RUTTI PHARMACEUTICALS,INC.', 'QUEZON CITY', '7431164/7411713', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(353, 'RVICKZ', 'RVICKZ PHARMACEUTICAL DISTRIBUTOR', '127 AGUILA ST. MANUYO 2 GATCHALIAN LPC', '0920217952', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(354, 'SCHEELING', 'SCHEELING PHARMA CARE LINK,INK.', 'SAN MIGUEL AVE. ORTIGAS CENTER PASIG CITY', '6335672', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(355, 'SEVILLEPHARMACEUTICALS,INC.', 'SEVILLE PHARMACEUTICAL, INC.', 'ORTIGAS CENTER', '(632) 6334814', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(356, 'SKELETALSUPPORT', 'SKELETAL  SUPPORT', '1257 INSTRUCCION ST., BRGY 514 SAMPALOC', '4168293', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(357, 'SOLVANG PHARMACEUTICALS', 'SOLVANG', '238 TOMAS MORATO AVE.EXT. SOUT TRIANGLE QC', '9277117', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(358, 'STEINBACH PRODUCTS INC.', 'STEINBACH', '151 SAN FRANCISC ST MANDALUYONG CITY', '7465712', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(359, 'SUNBURSTDRUG', 'SUNBURSTDRUG', '1616 RIZAL AVE. STA. CRUZ ,MANILA', '7119530', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(360, 'TIGGY\'S STORE', 'TIGGY\'S STORE', '16 CASH AND CARRY BLDG.FILMORE ST.PALANAN MAKATI', '843-36-25', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(361, 'VAMSLERPHILIPPINES', 'VAMSLER PHILIPPINES INC.', 'QC', '415-7619', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(362, 'ZEMA TRADING CO., LTD.', 'ZEMA TRADING CO., LTD.', '156 PAZ ST., BALAYAN, BATANGAS', '043 - 4070586', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(363, 'REMKERDRUG,INC.', 'REMKERDRUG,INC.', 'QC', '83732987', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(364, 'ESTIBAN INDUSTRIES', 'ESTIBAN INDUSTRIES', 'UNIT 1 2ND FLR. MORANDO BUILDING J LUNA ST.LAGUNA', '09338604966', '', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(365, '[', ' MERCURY DRUG', 'LAS PINAS', '', '8022473(MW)', '872-0368(CASIMIRO)', '8733715(MANUELA)', '(ALABANG), 8738608(ZAPOTE), 8733715(PHILAM),8750246(PRPS)', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(366, 'ABP ALL-BIO PHARMA', 'ABP ALL-BIO', '505 5TH FLR. GOLDEN PEAK ESCARIO CEBU CITY', '4120855', '4120855', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(367, 'AHENSER ENTERPRISES', 'AHENSER', 'MUNTINLUPA CITY', '3840516', '8426575', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(368, 'ASIACUVEST', 'ASIA CUVEST', 'MAKATI CITY', '8137555', '8180764', '1346468947', '1464646', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(369, 'AVENIDA MEDICAL SUPPLY', 'Avenida Medical Supply', 'AVENIDA STA CRUZ MANILA', '7434298', 'SAME', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(370, 'COMMERZ TRADING INT\'L.,INC.', 'COMMERZ TRADING INT\'L.,INC.', '23-A2ND FLR.,ZETA BUILDING,SALCEDO ST.LEGASPI VIL', '893-1006 TO 09', '(632) 813-0184', '', '8927874', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(371, 'CRISDY-NA DRUG CORPORATION', 'CRISDY-NA DRUG CORPORATION', 'BINONDO,MANILA', '2432392/93', '2434135', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49');
INSERT INTO `supplier_tb` (`supplier_id`, `supplier_code`, `supplier_name`, `address`, `telNum`, `faxNum`, `CelNum`, `contactNo`, `note`, `createDate`, `modifiedDate`) VALUES
(372, 'CROMAMEDIC', 'CROMA MEDIC', 'SUITE 301 ALEGRIA BLDG. CHINO ROCES AVE. MKT CITY', '8178541', '8160804', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(373, 'CYTEL PHILIPPINES ENTERPRISE', 'PHILIPPINES ENTERPRISES', 'RM.217 COMFOODS BLDG. GIL PUYAT AVE. PASONG TAMO', '844-56-61/844-57-49', '812-2602', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(374, 'DR. DE LEON', 'DR. DE LEON', 'LPC', '', 'NONE', 'NONE', 'NONE', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(375, 'DR. RENE ALLAM', 'DR. RENE ALLAM', 'CLINIC', '8711440', '5664426', 'NONE', 'NONE', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(376, 'DR.JOAN', 'JOAN ZARATE MD', 'LAS PINAS CITY', '8711440', '8735593', '09189018224', '8711440', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(377, 'DRA. DE LEOZ', 'DRA. HELENE DE LEOZ', 'CASIMIRO', 'NONE', 'NONE', '09172552170', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(378, 'E. ZARATE ENTERPRISE', 'E. Zarate Enterprises', 'B5L5 CRYSTAL ST. GOLDEN ACRES TALON V', '8060039', '8020125', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(379, 'ECE PHARMACEUTICALS,INC.', 'ECE PHARMACEUTICALS,INC.', '', '', '9272354', '', '9282198', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(380, 'E-MARK ALLIANCE', 'EMARK ALLIANCE DISTRIBUTION SYSTEM INC.', 'DR. A SANTOS AVE. SUCAT.', '8295714', '8295714', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(381, 'EURO-MED LABORATORIES PHIL.,INC.', 'EURO-MED LABORATORIES PHIL.,INC.', 'UN AVR MANILA', '5240031-98', '5260977', '0', '0', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(382, 'EXTECH TRADING', 'EXTECH TRADING', '1807 TRAMO ST.PASAY CITY', '', '5255143', '09194481212', '5219634', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(383, 'EZEC', 'EZEC', 'NAGA ROAD PULANG LUPA LPC', '5435669', 'NONE', 'NONE', 'SAME', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(384, 'FAME', 'FAME Pathologist Laboratory Supply', 'Life homes subd.Ortigas Avenue,Rosario Pasig City', '6550743', '9168798', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(385, 'FILADAMS PHARMA,INC.', 'FILADAMS PHARMA,INC.', '', '', '9210868', '', '9222284-87', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(386, 'GB DISTRIBUTORS,INC.', 'GB DISTRIBUTORS,INC.', 'MAKATI CITY', '8876057/58', '8882486', '', '8872304/05', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(387, 'GBDISTRIBUTORS,INC', 'GB DISTRIBUTORS, INC', 'GRND FLR ACI BLDG,OSMENA HIGHWAY MKT CITY', '8441681/8684', '8882486', 'NONE', 'SAME', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(388, 'GEMRY MEDICAL SUPPLY', 'gemry medical supply', '1459 Rizal avenue Sta Cruz Manila', '7436931', '3146616', 'NONE', 'same as above', 'gemma trono', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(389, 'GLOVAX', 'GLOBAL VACCINE XPRESS', 'TOMAS MORATO Q.C', '3746590', '3747274', '', '3748252', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(390, 'HANSEL\'SPHARMACY', 'HANSEL\'SPHARMACY', 'ALMANZA LAS PINAS', '82679888', '8203801', '8204992', '8204894', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(391, 'HEALTH-TECHMEDICALINC.,', 'HEALTH-TECH MEDICAL INC.', '17 BINMACA ST., MANRESA, QUEZON CITY', '3659999', '3646884', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(392, 'HELTKERA.G.CORP.', 'HELTKER A.G. CORPORATION', '9724 PILILIA  COR. BALER ST. BRGY VALENZUELA', '8994694', '8975442', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(393, 'ICON PHARMA CORP.', 'ICON PHARMA CORP', 'SAN MIGUEL AVE ORTIGAS', '6388401', '6377856', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(394, 'INSTITUTEOFHUMANGENETICS', 'INSTITUTE OF HUMAN GENETICS', 'NATIONAL INSTITUTE OF HEALTH UP MANILA', '0000', '0000', '0000', '00000', 'NEWBORN SCREENING', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(395, 'INTEGRATEDWASTEMANAGEMENT', 'INTEGRATED WASTE MANAGEMENT', 'PARANAQUE CITY', '879-4580', '8794315', 'NONE', '8794303', 'PAYMENT FOR WASTE DISPOSAL SYSTEM', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(396, 'JEOSENSY', 'JEOSEN SY', 'SUCAT, PARANAQUE', '8252112', '8252137', '', '8252112', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(397, 'JUNWED MARKETING', 'JUNWED MARKETING', 'Bicutan Taguig', '8376651', '8376651', '09198397818', '09198398490', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(398, 'KNIGHTTELECOM', 'KNIGHT TELECOM', 'DR. A SANTOS AVE. SUCAT PQUE', '8252112', '8252780', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(399, 'LM ZEMA TRADING CO., LTD.', 'LM ZEMA TRADING CO., LTD.', 'MAKATI CITY', '8709870', '8965308', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(400, 'MAXLIFE CORP.', 'MAXLIFE CORP.', 'UNIT 701 BAYVIEW TOWERB TAMBO PARANAQUE CITY', '8558221', '8558027', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(401, 'MEDICAMENTA,INC.', 'MEDICAMENTA,INC.', 'KALOOKAN CITY', '3644122', '3660946', '09162748642', '0', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(402, 'MEDIC-PRO CORP.', 'MEDIC-PRO CORPORATION', 'MARCOS HIGHWAY BRGY. INARAWAN, ANTIPOLO CITY', '6770685', '6770684', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(403, 'MEDISYS DISTRIBUTOR', 'medisys distributor', 'valenzuela st sta mesa manila', '', '7134984', '', '', 'less 35 %', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(404, 'mercury', '', '', '8422393-ALABANG', '872-0633-CASIMIRO', '800-0742/8022214-almanza', '8750246-PERPS', '403-6316-Talon5', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(405, 'METRO DIAGNOSTIC/HOSPITAL SUPPLY', 'METRO DIAGNOSTIC /HOSPITAL SUPPLY', 'QUEZON AVENUE QC', '3736880', '3736881', 'NONE', 'NONE', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(406, 'METRO DRUG INC.', 'METRO DRUG,INC.', 'MANALAC AVENUE,TAGUIG,METRO MANILA PHILIPPINES', '837-2121 TO 38', '837-2915', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(407, 'METROPOLITAN PHARMACEUTICALS PRODUCTS,INC.', 'METROPOLITAN PHARMACEUTICALS PRODUCTS INC', 'G. PUYAT COR. C. ARAGON STS.BF COMRCL CENTER SUCAT', '', '8072113', 'NONE', 'NONE', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(408, 'MGPRIMEPHARMACEUTICAL,INC.', 'MG PRIME PHARMACEUTICAL, INC.', 'MINDANAO AVE., PROJ. 6 Q.C', '(632) 9296958', '(632)4546853', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(409, 'MPSI', 'MEDICAL PHARMACEUTICALSPECIALTIES,CORPORATION', 'G/FAURORA CONDOMINIUM,127 AGLIPAY ST.MANDALUYONG C', '5342516', '5330120', '091892134545', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(410, 'MWCLINIC', 'E. ZARATE ( MOONWALK CLINIC)', 'GOLDEN ACRES SUBD. MOONWALK LPC', '8020125', '8060039', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(411, 'OHANA TRADING CORPORATION', 'OHANA TRADING CORPORATION', '16F Ocampo Ave., Manuela Subd., Pamplona, Las Piñas', '8750030/33', '8750036', '09178276668', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(412, 'PHARMANUTRIA', 'PHARMA-NUTRIA N.A', '2ND FLOOR, #16 SCOUT TUAZON COR. ROCES AVE. Q.C', '373-62-40', '371-14-28', '', '3736591', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(413, 'PHARMASIA CUVEST,INC.', 'PHARMASIA CUVEST, INC.', 'Legaspim village,Makati City', '8137555/8137565/8107610', '(632)8180764', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(414, 'PHIL. PHARMAWEALTH INC.', 'PHILPHARMAWEALTH,INC.', 'PASIG', '6343505', '6339513', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(415, 'PHIL. SHINPOONG PHARMA,INC.', 'PHIL SHINPOONG PHARMA INC', 'MANDALUYONG CITY', '6876871', '6876870', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(416, 'PHIL.BLUE CROSS BIOTECH CORPORATION', 'PHILIPPINE BLUE CROSS BIOTECH CORP.', '', '(632)6879999', '(632)6875020', '09175510759', '', 'C/O MAUREEN CANEDA', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(417, 'PHILIPPINE BLUE CROSS BIOTECH CORP.', 'PHILIPPINES BLUE CROSS BIOTECH ORPORATION', 'BINONDO MANILA', '6879999', '6875020', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(418, 'POLAR POINT MARKETING', 'POLAR POINT MARKETING', 'SUCAT, PARANAQUE', '8252112', '8252137', '', '8252112', 'C/O JEOSEN OR CHING', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(419, 'PRIMERA PHARMA', 'PRIMERA PHARMA', '3RD F,JGS BLDG.30 SCOUT TUAZON ST., DILIMAN, QC', '4149691/92', '4117727', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(420, 'QUEST DIAGNOSTIC SYSTEMS', 'QUEST DIAGNOSTIC SYSTEMS', 'MANILA', '2419515', '2419515', '2419515', '2419515', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(421, 'RBCJ PHARMACY', 'RBCJ PHARMACY', 'PARANQUE CITY', '7767385', '7767386', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(422, 'RESONS TRADING', 'RESONS TRADING', 'QUEZON CITY', '', '7434584/7123920', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(423, 'RILEM', 'RILEM', 'NA', 'NONE', 'NONE', 'NONE', 'NONE', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(424, 'SAN MARINO LABORATORIES', 'SAN MARINO LABORATORIES', 'QUEZON CITY', '7116116', '7417442', '', '4145869', 'LESS 20 % 30 DAYS', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(425, 'SOUTH EAST STAR ENTERPRISES', 'SOUTH EAST STAR ENTERPRISES', 'TANAUAN BATANGAS CITY', '043-7785599', '043-7780123', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(426, 'SUHAIL', 'SUHAIL', 'NONE', 'NONE', 'NONE', 'NONE', 'NONE', 'NONE', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(427, 'THERAPE PHARMACEUTICALS, INC.', 'Therape Pharmaceuticals, Inc.', '2206 Paragon Plaza Condo. Cor. Edsa & Reliance st.', '6888306', '6872720', '', '6418130', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(428, 'TOWERCAMPPHILS,INC.', 'TOWERCAMP', '246 NATIONAL RD. SAN VICENTE BINAN,LAGUNA', '', '7886685', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(429, 'TRANON INTERNATIONAL', 'TRIANON INTERNATIONAL, INC', '2276 PASONG TAMO EXT. MAKATI CITY', '892.0723', '8928514', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(430, 'VAXINES TRADING', 'VAXINES TRADING', 'URCI TOWNHOMES', '0232356', '1646798', '264979', '547797', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(431, 'VENDIZ PHARMACEUTICALS INC.', 'VENDIZ PHARMACEUTICALS INCORPORATED', '', '9288079', '9291358', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(432, 'VISCARRA PHARMACEUTICAL, INC.', 'viscarra pharmaceuticals', 'segundina bldg 464 un ave ermita manila', '5233037', '5223580', '0', '5245641', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(433, 'vizcarra pharmaceutical', '', '', '632-5245641', '6325223580', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(434, 'WESTWING', 'WEST WING PHARMA SALES INC.', 'QUEZON CITY', '02-9296569', '02-9299345', '', '', '', '2023-09-12 16:08:49', '2023-09-12 16:08:49'),
(435, 'ZUELLIG PHARMACEUTICAL,CORP.', 'ZUELLIG PHARMA', 'MAKATI CITY', '8191561', 'NONE', 'NONE', 'NONE', 'undefined', '2023-09-12 16:08:49', '2023-09-12 16:08:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backlog_tb`
--
ALTER TABLE `backlog_tb`
  ADD PRIMARY KEY (`backlogID`);

--
-- Indexes for table `billing_tb`
--
ALTER TABLE `billing_tb`
  ADD PRIMARY KEY (`billingID`);

--
-- Indexes for table `clinicuse_tb`
--
ALTER TABLE `clinicuse_tb`
  ADD PRIMARY KEY (`SalesID`);

--
-- Indexes for table `department_tb`
--
ALTER TABLE `department_tb`
  ADD PRIMARY KEY (`departmentID`);

--
-- Indexes for table `employee_tb`
--
ALTER TABLE `employee_tb`
  ADD PRIMARY KEY (`DatabaseID`);

--
-- Indexes for table `expenses_tb`
--
ALTER TABLE `expenses_tb`
  ADD PRIMARY KEY (`expenseID`);

--
-- Indexes for table `feedback_tb`
--
ALTER TABLE `feedback_tb`
  ADD PRIMARY KEY (`feedbackID`);

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
-- Indexes for table `patient_tb`
--
ALTER TABLE `patient_tb`
  ADD PRIMARY KEY (`hospistalrecordNo`);

--
-- Indexes for table `payment_tb`
--
ALTER TABLE `payment_tb`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `room_tb`
--
ALTER TABLE `room_tb`
  ADD PRIMARY KEY (`room_ID`);

--
-- Indexes for table `sales_tb`
--
ALTER TABLE `sales_tb`
  ADD PRIMARY KEY (`SalesID`);

--
-- Indexes for table `services_tb`
--
ALTER TABLE `services_tb`
  ADD PRIMARY KEY (`transID`);

--
-- Indexes for table `supplier_tb`
--
ALTER TABLE `supplier_tb`
  ADD PRIMARY KEY (`supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `backlog_tb`
--
ALTER TABLE `backlog_tb`
  MODIFY `backlogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `billing_tb`
--
ALTER TABLE `billing_tb`
  MODIFY `billingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `clinicuse_tb`
--
ALTER TABLE `clinicuse_tb`
  MODIFY `SalesID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department_tb`
--
ALTER TABLE `department_tb`
  MODIFY `departmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee_tb`
--
ALTER TABLE `employee_tb`
  MODIFY `DatabaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=380;

--
-- AUTO_INCREMENT for table `expenses_tb`
--
ALTER TABLE `expenses_tb`
  MODIFY `expenseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback_tb`
--
ALTER TABLE `feedback_tb`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inventory_tb`
--
ALTER TABLE `inventory_tb`
  MODIFY `InventoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2332;

--
-- AUTO_INCREMENT for table `itemtype_tb`
--
ALTER TABLE `itemtype_tb`
  MODIFY `itemTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patient_tb`
--
ALTER TABLE `patient_tb`
  MODIFY `hospistalrecordNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payment_tb`
--
ALTER TABLE `payment_tb`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `room_tb`
--
ALTER TABLE `room_tb`
  MODIFY `room_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sales_tb`
--
ALTER TABLE `sales_tb`
  MODIFY `SalesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `services_tb`
--
ALTER TABLE `services_tb`
  MODIFY `transID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `supplier_tb`
--
ALTER TABLE `supplier_tb`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=440;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
