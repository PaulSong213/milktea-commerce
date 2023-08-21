-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 04:57 AM
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
-- Table structure for table `supplier_tb`
--

CREATE TABLE `supplier_tb` (
  `supplier_code` int(11) NOT NULL,
  `supplier_name` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `telNum` int(11) NOT NULL,
  `faxNum` int(11) NOT NULL,
  `CelNum` int(11) NOT NULL,
  `contactNum` int(11) NOT NULL,
  `Snote` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_tb`
--

INSERT INTO `supplier_tb` (`supplier_code`, `supplier_name`, `address`, `telNum`, `faxNum`, `CelNum`, `contactNum`, `Snote`, `status`) VALUES
(446, 'jhie', '024 j ocampo', 123456, 222, 99779, 74846545, 'lah', 1);

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
  MODIFY `supplier_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=454;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
