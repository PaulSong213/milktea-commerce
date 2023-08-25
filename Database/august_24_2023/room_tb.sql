-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2023 at 07:47 AM
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
-- Table structure for table `room_tb`
--

CREATE TABLE `room_tb` (
  `Roomref` varchar(200) NOT NULL,
  `roomDescription` varchar(200) NOT NULL,
  `rateperDay` float NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Available',
  `room_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_tb`
--

INSERT INTO `room_tb` (`Roomref`, `roomDescription`, `rateperDay`, `status`, `room_ID`) VALUES
('sampleRoom', 'sampleDescription', 1000, 'Available', 1),
('Private-A', 'Private Room A', 2500, 'Available', 2),
('Private-A', 'Private Room B', 2000, 'Under Maintenance', 3),
('', '', 0, '', 4),
('ICU', 'ICU', 4, 'Available', 5),
('ICU', 'ICU', 4, 'Available', 6),
('ICU', 'ICU', 3000, 'Available', 7),
('ICU', 'ICU', 3000, 'Available', 8),
('ICU', 'ICU', 3000, 'Available', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `room_tb`
--
ALTER TABLE `room_tb`
  ADD PRIMARY KEY (`room_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `room_tb`
--
ALTER TABLE `room_tb`
  MODIFY `room_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
