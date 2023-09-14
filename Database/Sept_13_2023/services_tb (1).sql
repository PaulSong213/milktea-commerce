-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2023 at 09:26 AM
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
  `EnteredBy` int(11) NOT NULL,
  `ChargeNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services_tb`
--

INSERT INTO `services_tb` (`transID`, `Services`, `RequestedName`, `PatientName`, `remarks`, `departmentID`, `ChiefComplaint`, `WorkingDx`, `EnteredBy`, `ChargeNo`) VALUES
(1, '', '26', 'Test,Test Test | ID: 1', '', 5, '', '', 0, 0),
(2, '', '27', 'Test2LastName,Test2FirstName Test2MiddleName | ID: 6', 'None', 5, '', '', 0, 0),
(3, 'Service Name', '27', 'Test,Test Test | ID: 1', 'None', 5, '', '', 0, 0),
(4, 'Service Name', '26', 'sample,sample sample | ID: 2', 'none', 5, '', '', 0, 0),
(5, '', '26', 'Test,Test Test | ID: 1', 'none', 5, '', '', 0, 0),
(6, '', '26', 'Test,Test Test | ID: 1', 'aww', 5, '', '', 0, 0),
(7, '', '24', 'ZZZZZZZZZZZZZZZZZZZZZZ,TestFname TestMname | ID: 7', 'awdawd', 5, '', '', 0, 0),
(8, '', '', 'ZZZZZZZZZZZZZZZZZZZZZZ,TestFname TestMname | ID: 7', '', 5, '', '', 0, 0),
(9, '', '25', 'ZZZZZZZZZZZZZZZZZZZZZZ,TestFname TestMname | ID: 7', 'None', 5, '', '', 0, 0);

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
  MODIFY `transID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
