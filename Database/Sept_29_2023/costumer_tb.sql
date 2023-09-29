-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2023 at 02:36 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `costumer_tb`
--

CREATE TABLE `costumer_tb` (
  `costumerID` int(11) NOT NULL,
  `firstName` varchar(120) NOT NULL,
  `lastName` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `phoneNumber` varchar(60) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `shippingAddress` text NOT NULL,
  `password` text NOT NULL,
  `dateRegistered` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `costumer_tb`
--

INSERT INTO `costumer_tb` (`costumerID`, `firstName`, `lastName`, `email`, `phoneNumber`, `dateOfBirth`, `shippingAddress`, `password`, `dateRegistered`) VALUES
(1, 'Mark', 'Nery', 'tester@gmail.com', '+639398322288', '2023-09-07', '4A, CAVITE, BACOOR CITY, ALIMA, 3039-C Chromium St. , Brgy. San Nicolas 3 ,Platinumville Cmpnd., Greenvalley', 'tester', '2023-09-29 19:50:24'),
(2, 'Mark', 'Nery', 'tester@gmail.com', '+639398322288', '2023-09-07', '4A, CAVITE, BACOOR CITY, ALIMA, 3039-C Chromium St. , Brgy. San Nicolas 3 ,Platinumville Cmpnd., Greenvalley', '$2y$10$ijYnTeXAAa7T/2xGDb0aluf1lHZrH75Vcsp6knYQbCKVqD1vVEu7C', '2023-09-29 19:56:16'),
(3, 'Mark', 'Nery', 'tester@gmail.com', '+639398322288', '2023-09-07', '4A, CAVITE, BACOOR CITY, ALIMA, 3039-C Chromium St. , Brgy. San Nicolas 3 ,Platinumville Cmpnd., Greenvalley', '$2y$10$I4ELGh5LIVjvoauefUYdAOYuVnnrdmR1tfKCo4MExusoCkwlFqpY6', '2023-09-29 19:59:13'),
(4, 'Mark', 'Nery', 'costumer@gmail.com', '+639398322288', '0000-00-00', '4A, CAVITE, BACOOR CITY, ALIMA, 3039-C Chromium St. , Brgy. San Nicolas 3 ,Platinumville Cmpnd., Greenvalley', '$2y$10$Gl3VJohlgfBp0ue5yvQv7eFCv607sa444DDKN0yZHcADz3VdW4T62', '2023-09-29 20:08:29'),
(5, 'Mark', 'Nery', 'costumer1@gmail.com', '+639398322288', '0000-00-00', '4A, CAVITE, BACOOR CITY, ALIMA, 3039-C Chromium St. , Brgy. San Nicolas 3 ,Platinumville Cmpnd., Greenvalley', '$2y$10$ahiWVpzAoODZGz1qs3mLq.pXxgKK1Wg6yQ4KUyYVpRCB7YTyweXI.', '2023-09-29 20:25:02'),
(6, 'Mark', 'Nery', 'costumer2@gmail.com', '+639398322288', '2023-09-06', '4A, CAVITE, BACOOR CITY, ALIMA, 3039-C Chromium St. , Brgy. San Nicolas 3 ,Platinumville Cmpnd., Greenvalley', '$2y$10$OR2VaxiRpZdQIOyz/aRQfOjVGcNz3UnjTnxXI6.ZmJGC9astTb1TK', '2023-09-29 20:33:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `costumer_tb`
--
ALTER TABLE `costumer_tb`
  ADD PRIMARY KEY (`costumerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `costumer_tb`
--
ALTER TABLE `costumer_tb`
  MODIFY `costumerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
