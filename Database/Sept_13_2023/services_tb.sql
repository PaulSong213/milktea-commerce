-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2023 at 04:38 AM
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
  `departmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services_tb`
--

INSERT INTO `services_tb` (`transID`, `Services`, `RequestedName`, `PatientName`, `remarks`, `departmentID`) VALUES
(1, 'Array', '', '', '', 0),
(2, 'Array', 'DR. GONZALES,MELISSA  | ID: 23', 'Test,Test Test | ID: 1', 'None', 0),
(3, 'Array', '24', 'sample,sample sample | ID: 2', 'PLEASE PUMASOK KANA', 0),
(4, 'Array', '23', 'sample,sample sample | ID: 2', '', 0),
(5, '', '24', 'sample,sample sample | ID: 2', 'None', 0),
(6, '', '24', 'Tabuyan,Kean Arthur Sargento | ID: 5', 'aa', 0);

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
  MODIFY `transID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
