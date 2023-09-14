-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2023 at 10:53 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `services_tb`
--
ALTER TABLE `services_tb`
  ADD PRIMARY KEY (`transID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `services_tb`
--
ALTER TABLE `services_tb`
  MODIFY `transID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
