-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2022 at 07:09 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agromaster`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(5) NOT NULL,
  `name` varchar(150) NOT NULL,
  `type` varchar(12) NOT NULL,
  `description` varchar(120) NOT NULL,
  `maximum_buying_rate` decimal(5,2) NOT NULL,
  `selling_rate` decimal(5,2) NOT NULL,
  `images` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `type`, `description`, `maximum_buying_rate`, `selling_rate`, `images`) VALUES
(58, 'Mango', 'Fruit', '', '120.00', '125.00', 'image/mango.jpg'),
(59, 'Big-Onion', 'Vegetable', '', '50.00', '60.00', 'image/big-onion.jpg'),
(60, 'Tomato', 'Vegetable', '', '60.00', '75.00', 'image/Tomato.jpg'),
(63, 'Pumpkin', 'Vegetable', '', '45.00', '58.00', 'image/Premiumpumpkin@2x.png'),
(66, 'leeks', 'Vegetable', '', '234.00', '260.00', 'image/556--1584341288.jpg'),
(69, 'Leeks', 'Vegetable', '', '78.00', '95.00', 'image/556--1584341288.jpg'),
(70, 'Cabage', 'Vegetable', '', '65.00', '80.00', 'image/istockphoto-673162168-612x612.jpg'),
(78, 'Potato', 'Vegetable', '', '110.00', '123.00', 'image/potato.jpg'),
(80, 'Cauliflower', '', 'Sri Lankan', '0.00', '0.00', 'image/cauliflower.jpg'),
(81, 'Batana', '', 'Medium sized', '0.00', '0.00', ''),
(82, 'Pineapple', 'Fruit', 'Up country vegetable', '200.00', '230.00', 'image/Pineapple.jpg\r\n'),
(83, 'garlic', '', 'white vegetable', '0.00', '0.00', 'image/garlic.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
