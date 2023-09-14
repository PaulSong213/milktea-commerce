-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2023 at 10:13 AM
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
  `ChargeNo` int(11) NOT NULL,
  `reason` text NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services_tb`
--

INSERT INTO `services_tb` (`transID`, `Services`, `RequestedName`, `PatientName`, `remarks`, `departmentID`, `ChiefComplaint`, `WorkingDx`, `EnteredBy`, `ChargeNo`, `reason`, `Date`) VALUES
(1, '[[\"\"],[\"INORGANIC PHOSPHATE\"],[\"ARTERIAL BLOOD GAS\"]]', 'DR. BERNARDO,BERNARDO  | ID: 27', 'Test,Test Test | ID: 1', 'none', 5, '', '', 0, 0, '', '0000-00-00'),
(2, '[[\"\"],[\"TROPONIN-T\"],[\"INORGANIC PHOSPHATE\"]]', 'DR. BERNARDO,BERNARDO  | ID: 27', 'Tabuyan,Kean Arthur Sargento | ID: 4', 'none', 5, '', '', 0, 0, '', '0000-00-00'),
(3, '[[\"\"],[\"TROPONIN-T\"],[\"AMYLASE TEST\"],[\"INORGANIC PHOSPHATE\"]]', 'DR. GONZALES,MELISSA  | ID: 23', 'Test,Test Test | ID: 1', 'None', 5, '', '', 0, 0, 'None', '2023-09-14'),
(4, '[[\"\"],[\"INORGANIC PHOSPHATE\"],[\"ARTERIAL BLOOD GAS\"]]', 'DR. BERNARDO,BERNARDO  | ID: 27', 'Tabuyan,Kean Arthur Sargento | ID: 5', 'None', 5, '', '', 0, 0, 'Yes', '2023-09-14'),
(5, '[[\"\"],[\"UPPER ABDOMEN\"],[\"UPPER ABDOMEN ULTZ\"]]', 'DR. GONZALES,MELISSA  | ID: 23', 'sample,sample sample | ID: 2', 'none', 6, '', '', 0, 0, 'None', '2023-09-14'),
(6, '[[\"\"],[\"AFB (SPUTUM TEST)\"]]', 'QWE', 'QWE', 'QWE', 5, '', '', 0, 0, 'None', '2023-09-14');

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
