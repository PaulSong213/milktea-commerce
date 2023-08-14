-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2023 at 09:55 AM
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
  `EmployeeCode` int(11) DEFAULT NULL,
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

INSERT INTO `employee_tb` (`DatabaseID`, `EmployeeCode`, `lname`, `fname`, `mname`, `title`, `position`, `maritalStatus`, `sex`, `bDate`, `nickName`, `department`, `dateStart`, `createDate`, `modifiedDate`, `userName`, `password`, `Status`) VALUES
(1, 231212, 'Sargento', 'Ryan Joshua', 'B.', 'Intern', 'System dev', 'Single', 'Male', '2020-05-05', 'RJ', 'IT department', '2023-08-03', '2023-08-11 14:02:05', '2023-08-11 14:02:05', '1', '1', 1),
(2, 128, 'Eltagon', 'Lea', 'L.', 'MS', 'Med. Record', 'Single', 'Female', '1982-08-28', 'Yang2x', 'Info Department', '2023-08-01', '2023-08-07 15:07:40', '2023-08-11 15:14:13', 'eltagon@info.zarate', '12345', 1),
(3, 1, 'sadsa', 'sdasd', 'sdasdas', 'type1', 'type1', 'type1', 'type1', '2023-08-02', '', 'type1', '2023-07-31', '2023-08-12 13:27:16', '2023-08-12 13:27:16', 'admin@gmail.com', 'kjbkkb', 1),
(4, 2012012, 'Tabuyan', 'Kean Arthur', 'Sargento', 'type1', 'type2', 'type1', 'type1', '2014-11-15', 'Yan Yan', 'type1', '2023-08-11', '2023-08-12 13:31:08', '2023-08-12 13:31:08', 'kean@hr.com', 'kean', 1),
(5, 90112, 'Tabuyan', 'Kean Arthur', 'Sargento', 'type1', 'type1', 'type1', 'Male', '2023-08-02', '', 'IT Department', '2023-08-04', '2023-08-12 18:20:29', '2023-08-12 18:20:29', 'kean@hr.com', 'sdasdasd', 1),
(6, 12321323, 'SampleLastName', 'SampleFname', 'S.', 'Doctor', 'System', 'Single', 'Male', '1987-07-14', 'SampleNickname', 'IT Department', '2023-08-01', '2023-08-12 18:25:43', '2023-08-12 18:25:43', 'sample@hr.zarate', 'sample', 1),
(7, 1123, 'Tabuyan', 'Kean Arthur', 'Sargento', 'Doctor', 'Administrator', 'Single', 'Male', '2023-08-03', 'sas', 'IT Department', '2023-08-03', '2023-08-13 13:03:49', '2023-08-13 13:03:49', 'kean@hr.com', 'password', 1),
(8, 1234, 'fxfh', 'gxgx', 'gxhgx', 'Nurse', 'Nurse', 'Single', 'Female', '2023-08-15', 'ncnv', 'IP Department', '2023-08-15', '2023-08-14 05:36:52', '2023-08-14 05:36:52', 'sargentoryanjoshua@gmail.com', 'sarge', 1),
(9, 128, 'xzxsdd', 'dsfsdfsd', 'dfssdsdfT.', 'Doctor', 'Administrator', 'Single', 'Male', '2023-08-10', 'T.', 'IT Department', '2023-08-02', '2023-08-14 07:13:20', '2023-08-14 07:13:20', 'admin@admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_tb`
--

CREATE TABLE `inventory_tb` (
  `InventoryID` int(11) NOT NULL,
  `itemTypeID` int(11) NOT NULL,
  `itemCode` varchar(100) DEFAULT NULL,
  `Unit` int(11) DEFAULT NULL,
  `Description` varchar(300) DEFAULT NULL,
  `Generic` varchar(100) DEFAULT NULL,
  `SugPrice` double DEFAULT NULL,
  `MWprice` double NOT NULL,
  `IPDprice` double NOT NULL,
  `Ppriceuse` double NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Type` varchar(300) NOT NULL DEFAULT 'pcs',
  `createDate` datetime DEFAULT current_timestamp(),
  `modifiedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_tb`
--

INSERT INTO `inventory_tb` (`InventoryID`, `itemTypeID`, `itemCode`, `Unit`, `Description`, `Generic`, `SugPrice`, `MWprice`, `IPDprice`, `Ppriceuse`, `Status`, `Type`, `createDate`, `modifiedDate`) VALUES
(2, 1, 'Neozep', 100, 'This medicine is used for the relief of clogged nose, postnasal drip, headache, body aches, and fever associated with the common cold, sinusitis, flu, and other minor respiratory tract infections. ', 'Chlorphenamine Maleate', 50, 50, 10, 20, 1, 'pcs', '2023-03-02 00:00:00', '2023-08-14 11:57:52'),
(4, 3, 'Biogesics', 150, 'is a medication that is typically used to relieve mild to moderate pain such as headache, backache, menstrual cramps, muscular strain, minor arthritis pain, toothache, and reduce fevers caused by illnesses such as the common cold and flu.', 'Paracetamol', 40, 10, 10, 10, 1, 'pcs', '2023-08-07 00:00:00', '2023-08-13 00:41:46'),
(5, 5, 'Zyrtec', 100, 'Cetirizine is an antihistamine medicine that helps the symptoms of allergies. It\'s used to treat: hay fever. conjunctivitis (red, itchy eye)', 'Cetirizine', 40, 10, 10, 10, 0, 'pcs', '2023-12-17 00:00:00', '2023-08-11 12:29:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_tb`
--
ALTER TABLE `employee_tb`
  ADD PRIMARY KEY (`DatabaseID`);

--
-- Indexes for table `inventory_tb`
--
ALTER TABLE `inventory_tb`
  ADD PRIMARY KEY (`InventoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_tb`
--
ALTER TABLE `employee_tb`
  MODIFY `DatabaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `inventory_tb`
--
ALTER TABLE `inventory_tb`
  MODIFY `InventoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
