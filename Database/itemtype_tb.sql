-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 07:12 AM
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
-- Table structure for table `itemtype_tb`
--

CREATE TABLE `itemtype_tb` (
  `itemTypeID` int(11) NOT NULL,
  `itemTypeCode` varchar(120) NOT NULL,
  `description` varchar(250) NOT NULL,
  `createDate` datetime NOT NULL DEFAULT current_timestamp(),
  `modifiedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `itemtype_tb`
--

INSERT INTO `itemtype_tb` (`itemTypeID`, `itemTypeCode`, `description`, `createDate`, `modifiedDate`) VALUES
(1, 'X-Ray', '', '2023-08-14 10:55:56', '2023-08-14 15:33:51'),
(2, 'ELoad', 'Publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availabl', '2023-08-14 10:56:33', '2023-08-14 15:50:44'),
(4, 'US - Ultra Sound', 'Ultra Sound', '2023-08-14 13:22:57', '2023-08-14 13:22:57'),
(12, 'SO SO-Lab', 'LABORATORY', '2023-08-14 15:23:40', '2023-08-14 15:23:40'),
(13, 'Mental Hospital', '', '2023-08-14 15:33:57', '2023-08-14 15:34:08'),
(14, 'Labor', 'Labor', '2023-08-14 15:51:04', '2023-08-14 15:51:04');

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
  MODIFY `itemTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
