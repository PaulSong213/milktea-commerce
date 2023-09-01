-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2023 at 03:43 AM
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
-- Table structure for table `expense_tb`
--

CREATE TABLE `expense_tb` (
  `expenseID` int(11) NOT NULL,
  `expenseType` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `payable` varchar(100) DEFAULT NULL,
  `docRef` varchar(100) DEFAULT NULL,
  `reason` varchar(100) DEFAULT NULL,
  `Note` varchar(100) NOT NULL,
  `createDate` datetime DEFAULT current_timestamp(),
  `modifiedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `enteredBy` varchar(100) DEFAULT NULL,
  `requestedBy` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense_tb`
--

INSERT INTO `expense_tb` (`expenseID`, `expenseType`, `department`, `amount`, `payable`, `docRef`, `reason`, `Note`, `createDate`, `modifiedDate`, `enteredBy`, `requestedBy`) VALUES
(28, 'Common', 'ADMIN', '123123', 'BPI', 'Mr. Zarate', 'asdasdasdas', 'fudge', '2023-09-01 09:42:38', '2023-09-01 09:42:38', '', 'John Relente Songalia,Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expense_tb`
--
ALTER TABLE `expense_tb`
  ADD PRIMARY KEY (`expenseID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expense_tb`
--
ALTER TABLE `expense_tb`
  MODIFY `expenseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
