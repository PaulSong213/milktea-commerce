-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2023 at 10:01 PM
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
-- Table structure for table `inventory_tb`
--

CREATE TABLE `inventory_tb` (
  `InventoryID` int(11) NOT NULL,
  `itemTypeID` int(11) NOT NULL,
  `itemCode` varchar(100) DEFAULT NULL,
  `Description` varchar(300) DEFAULT NULL,
  `SugPrice` double DEFAULT NULL,
  `Status` tinyint(1) NOT NULL,
  `UnitType` varchar(300) DEFAULT NULL,
  `createDate` datetime DEFAULT current_timestamp(),
  `modifiedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_tb`
--

INSERT INTO `inventory_tb` (`InventoryID`, `itemTypeID`, `itemCode`, `Description`, `SugPrice`, `Status`, `UnitType`, `createDate`, `modifiedDate`, `image`) VALUES
(2307, 1, 'Strawberry Frappe', 'Strawberry Frappe Flavor', 120, 1, 'pcs', '2023-09-23 21:54:47', '2023-09-24 02:40:02', 'add/image/650f30d8ac198_Strawberry Frappe.png'),
(2308, 1, 'Chocomint Frappe', 'Choco Mint Flavor', 120, 1, NULL, '2023-09-24 01:01:06', '2023-09-24 02:21:07', 'add/image/650f2c93691ba_Chocomint Frappe.png'),
(2309, 1, 'Salted Caramel Frappe', 'Salted Caramel Flavor', 120, 1, NULL, '2023-09-24 01:05:26', '2023-09-24 03:37:00', 'add/image/650f1ad6d9407_Salted Caramel Frappe.png'),
(2310, 1, 'Cookies and Cream Frappe', 'Cookies and Cream Flavor', 120, 1, NULL, '2023-09-24 01:12:19', '2023-09-24 01:12:19', 'add/image/650f1c735ffe3_Cookies and Cream Frappe.png'),
(2311, 1, 'Dark Mocha Frappe', 'Dark Mocha Frappe Flavor', 120, 1, NULL, '2023-09-24 02:22:24', '2023-09-24 02:22:24', 'add/image/650f2ce064f67_Dark Mocha Frappe.png'),
(2312, 1, 'Caramel Macchiato Frappe', 'Caramel Macchiato', 120, 1, NULL, '2023-09-24 02:26:41', '2023-09-24 02:26:41', 'add/image/650f2de107e0a_Caramel Macchiato Frappe.png'),
(2313, 1, 'Java Chip Frappe', 'Java Chip Frappe Flavor', 120, 1, NULL, '2023-09-24 02:28:12', '2023-09-24 02:28:12', 'add/image/650f2e3c39c58_Java Chip Frappe.png'),
(2314, 2, 'Lychee Fruit Tea', 'Lychee Fruit Tea Flavor', 100, 1, NULL, '2023-09-24 02:29:29', '2023-09-24 02:29:29', 'add/image/650f2e896ac98_Lychee Fruit Tea.png'),
(2315, 2, 'Mango Fruit Tea', 'Mango Fruit Tea Flavor', 100, 1, NULL, '2023-09-24 02:30:23', '2023-09-24 02:30:23', 'add/image/650f2ebfc57e5_Mango Fruit Tea.png'),
(2316, 2, 'Passion Fruit Tea', 'Passion Fruit Tea Flavor', 100, 1, NULL, '2023-09-24 02:31:12', '2023-09-24 02:31:12', 'add/image/650f2ef0073bd_Passion Fruit Fruit Tea.png'),
(2317, 2, 'Strawberry Fruit Tea', 'Strawberry Fruit Tea Flavor', 100, 1, NULL, '2023-09-24 02:31:57', '2023-09-24 02:31:57', 'add/image/650f2f1da51e8_Strawberry Fruit Tea.png'),
(2318, 3, 'Americano', 'Americano', 100, 1, NULL, '2023-09-24 02:32:51', '2023-09-24 02:32:51', 'add/image/650f2f5395632_Americano.jpg'),
(2319, 3, 'Cappuccino', 'Cappuccino', 100, 1, NULL, '2023-09-24 02:40:44', '2023-09-24 02:40:44', 'add/image/650f312c342fa_Cappuccino.png'),
(2320, 3, 'Caramel Macchiato', 'Cappuccino', 100, 1, NULL, '2023-09-24 02:41:32', '2023-09-24 02:41:32', 'add/image/650f315cc5858_Caramel Macchiato.png'),
(2321, 6, 'Iced Arabica', 'Iced Arabica Flavor', 100, 1, NULL, '2023-09-24 02:42:28', '2023-09-24 02:42:28', 'add/image/650f319422897_Iced Arabica.png'),
(2322, 6, 'Iced Caramel', 'Iced Caramel', 100, 1, NULL, '2023-09-24 02:43:06', '2023-09-24 02:43:06', 'add/image/650f31ba93c9d_Iced Caramel.png'),
(2323, 6, 'Iced Hazelnut', 'Iced Hazelnut Flavor', 100, 1, NULL, '2023-09-24 02:43:46', '2023-09-24 02:43:46', 'add/image/650f31e230e34_Iced Hazelnut.png'),
(2324, 6, 'OurBlend Signature Coffee', 'OurBlend Signature Coffee', 100, 1, NULL, '2023-09-24 02:44:32', '2023-09-24 02:44:32', 'add/image/650f3210e6656_OurBlend Signature Coffee.png'),
(2325, 7, 'Chocolate Milk Tea', 'Chocolate Milk Tea Flavor', 100, 1, NULL, '2023-09-24 02:46:10', '2023-09-24 02:46:10', 'add/image/650f327236056_Chocolate Milk Tea.png'),
(2326, 7, 'Classic Brown Sugar Milk Tea', 'Classic Brown Sugar Milk Tea', 100, 1, NULL, '2023-09-24 02:46:50', '2023-09-24 02:46:50', 'add/image/650f329a334ac_Classic Brown Sugar Milk Tea.png'),
(2327, 7, 'Classic Milk Tea', 'Classic Milk Tea', 100, 1, NULL, '2023-09-24 02:49:03', '2023-09-24 02:49:03', 'add/image/650f331f24897_Classic Milk Tea.png'),
(2328, 7, 'Hokkaido Milk Tea', 'Hokkaido Milk Tea Flavor', 100, 1, NULL, '2023-09-24 02:53:29', '2023-09-24 02:53:29', 'add/image/650f342967f12_Hokkaido Milk Tea.png'),
(2329, 7, 'Okinawa Milk Tea', 'Okinawa Milk Tea Flavor', 100, 1, NULL, '2023-09-24 02:54:08', '2023-09-24 02:54:08', 'add/image/650f3450999f5_Okinawa Milk Tea.png'),
(2330, 7, 'Wintermelon Milk Tea', 'Wintermelon Milk Tea Flavor', 100, 1, NULL, '2023-09-24 02:54:52', '2023-09-24 02:54:52', 'add/image/650f347c17d4f_Wintermelon Milk Tea.png'),
(2331, 8, 'Egg Sandwich', 'Egg Sandwich', 100, 1, NULL, '2023-09-24 02:55:39', '2023-09-24 02:55:39', 'add/image/650f34abe2369_Egg Sandwich.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory_tb`
--
ALTER TABLE `inventory_tb`
  ADD PRIMARY KEY (`InventoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory_tb`
--
ALTER TABLE `inventory_tb`
  MODIFY `InventoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2332;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
