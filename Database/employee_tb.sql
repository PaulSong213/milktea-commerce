-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2023 at 03:25 AM
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
  `department` varchar(100) NOT NULL,
  `dateStart` date NOT NULL,
  `createDate` datetime NOT NULL DEFAULT current_timestamp(),
  `modifiedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `userName` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_tb`
--

INSERT INTO `employee_tb` (`DatabaseID`, `lname`, `fname`, `mname`, `title`, `position`, `maritalStatus`, `sex`, `bDate`, `nickName`, `department`, `dateStart`, `createDate`, `modifiedDate`, `userName`, `password`, `Status`) VALUES
(1, 'dsad', 'sdasda', 'sdasda', 'Doctor', 'asdasda', 'Married', 'Male', '2023-08-09', 'RJ', 'IT Department', '2023-08-17', '2023-08-11 14:02:05', '2023-08-16 14:36:03', 'ryanjoshua.sargento@cvsu.edu.p', 'dasdasdasd', 0),
(2, 'sdasd', 'asdas', 'sdasd', 'Doctor', 'dasdasd', 'Single', 'Male', '2023-08-02', 'Yang2x', 'IT Department', '2023-08-11', '2023-08-07 15:07:40', '2023-08-16 14:36:36', 'ryanjoshua.sargento@cvsu.edu.p', 'sdasdas', 0),
(3, 'Sample', 'sample', 'Sample', 'Doctor', 'asdasda', 'type1', 'Female', '2023-08-03', 'Sample', 'Admin Department', '2023-08-12', '2023-08-12 13:27:16', '2023-08-16 14:40:45', 'ryanjoshua.sargento@cvsu.edu.p', 'sdasdasd', 1),
(4, 'Tabuyan', 'Kean Arthur', 'Sargento', 'type1', 'type2', 'type1', 'type1', '2014-11-15', 'Yan Yan', 'type1', '2023-08-11', '2023-08-12 13:31:08', '2023-08-12 13:31:08', 'kean@hr.com', 'kean', 1),
(5, 'sample', 'sample', 'sample', 'Doctor', 'asdas', 'type1', 'Male', '2023-08-25', 'sample', 'IT Department', '2023-08-04', '2023-08-12 18:20:29', '2023-08-16 14:39:42', 'admin@admin', 'sdasdas', 1),
(6, 'SampleLastName', 'SampleFname', 'S.', 'Doctor', 'System', 'Single', 'Male', '1987-07-14', 'SampleNickname', 'IT Department', '2023-08-01', '2023-08-12 18:25:43', '2023-08-12 18:25:43', 'sample@hr.zarate', 'sample', 1),
(7, 'Tabuyan', 'Kean Arthur', 'Sargento', 'Doctor', 'Administrator', 'Single', 'Female', '2023-08-03', 'sas', 'IT Department', '2023-08-03', '2023-08-13 13:03:49', '2023-08-13 13:03:49', 'kean@hr.com', 'password', 1),
(8, 'fxfh', 'gxgx', 'gxhgx', 'Nurse', 'Nurse', 'Single', 'Female', '2023-08-15', 'ncnv', 'IP Department', '2023-08-15', '2023-08-14 05:36:52', '2023-08-14 05:36:52', 'sargentoryanjoshua@gmail.com', 'sarge', 1),
(9, 'xzxsdd', 'dsfsdfsd', 'dfssdsdfT.', 'Doctor', 'Administrator', 'Single', 'Male', '2023-08-10', 'T.', 'IT Department', '2023-08-02', '2023-08-14 07:13:20', '2023-08-14 07:13:20', 'admin@admin', 'admin', 1),
(10, 'fxfh', 'dsfsdfsd', 'dfssdsdfT.', 'Doctor', 'Administrator', 'Single', 'Male', '2023-08-11', 'ncnv', 'Admin Department', '2023-08-12', '2023-08-14 10:46:15', '2023-08-14 10:46:15', 'sargentoryanjoshua@gmail.com', '12345', 1),
(11, 'Tabuyan', 'Kean Arthur', 'Sargento', 'Doctor', 'asdasd', 'Single', 'Male', '2023-08-29', 'sadasd', 'IT Department', '2023-08-17', '2023-08-16 05:27:47', '2023-08-16 05:27:47', 'kean@hr.com', 'saadsadas', 1),
(12, 'Tabuyan', 'Kean Arthur', 'Sargento', 'Doctor', 'ascasc', 'Single', 'Male', '2023-08-04', 'scascd', 'IT Department', '2023-08-03', '2023-08-16 05:28:14', '2023-08-16 05:28:14', 'kean@hr.com', 'sacsacas', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_tb`
--
ALTER TABLE `employee_tb`
  ADD PRIMARY KEY (`DatabaseID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_tb`
--
ALTER TABLE `employee_tb`
  MODIFY `DatabaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
