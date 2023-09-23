-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2023 at 10:02 PM
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
-- Database: `milkteacommerce`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `itemtype_tb`
--
ALTER TABLE `itemtype_tb`
  ADD PRIMARY KEY (`itemTypeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `itemtype_tb`
--
ALTER TABLE `itemtype_tb`
  MODIFY `itemTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
