-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2023 at 09:36 AM
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
-- Table structure for table `supplier_tb`
--

CREATE TABLE `supplier_tb` (
  `supplier_code` int(11) NOT NULL,
  `supplier_name` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `telNum` varchar(100) DEFAULT NULL,
  `faxNum` varchar(100) DEFAULT NULL,
  `CelNum` varchar(100) NOT NULL DEFAULT 'No Contact No.',
  `contactNo` varchar(100) DEFAULT NULL,
  `Snote` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `createDate` datetime NOT NULL DEFAULT current_timestamp(),
  `modifiedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier_tb`
--

INSERT INTO `supplier_tb` (`supplier_code`, `supplier_name`, `address`, `telNum`, `faxNum`, `CelNum`, `contactNo`, `Snote`, `status`, `createDate`, `modifiedDate`) VALUES
(446, 'jhie', '024 j ocampo', '123456', '222', '99779', '74846545', 'lah', 1, '2023-08-21 11:29:34', '2023-08-21 11:30:08'),
(454, 'test1', 'test1', 'test1', 'test1', 'test1', 'test1', 'test1', 1, '2023-08-21 12:08:50', '2023-08-21 12:08:50'),
(455, 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 'test2', 1, '2023-08-21 12:10:06', '2023-08-21 12:10:06'),
(456, 'jhie1', '024 j ocampo', '123456', '222', 'sa090909', '74846545', 'lah', 1, '2023-08-21 13:18:20', '2023-08-21 13:18:20'),
(457, 'jhie2', '024 j ocampo', '123456', '222', 'dasdas', '74846545', 'lah', 1, '2023-08-21 13:22:05', '2023-08-21 13:22:05'),
(458, 'jhie1', '024 j ocampo', '123456', '222', 'ssdasd', '74846545', 'lah', 1, '2023-08-21 13:26:47', '2023-08-21 13:26:47'),
(459, 'jhie', 'q1', '123456', '222', 'asasd', '74846545', 'lah', 1, '2023-08-21 13:29:39', '2023-08-21 13:29:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `supplier_tb`
--
ALTER TABLE `supplier_tb`
  ADD PRIMARY KEY (`supplier_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `supplier_tb`
--
ALTER TABLE `supplier_tb`
  MODIFY `supplier_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=460;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
