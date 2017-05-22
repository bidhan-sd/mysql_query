-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2017 at 06:31 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `velvee`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `salary` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `address`, `email`, `city`, `division`, `zipcode`, `age`, `salary`) VALUES
(1, 'Bidhan', 'sutradhar', 'gupti bazar', 'bidhanvk@gmail.com', 'Chandpur', 'chittagong', '3652', 10, 2500.1),
(2, 'Virat kohli', 'sutradhar', 'foridgonj baz', 'kholi@gmail.com', 'Chandpur', 'Dhaka', '3652', 35, 3000),
(3, 'Apoun', 'sutradhar', 'Golag', 'Apoun@gmail.com', 'Hazigonj', 'Dhaka', '2431', 25, 800.2),
(5, 'Razu', 'saha', 'ramgonj', 'Razu@gmail.com', 'Comilla', 'chittagong', '4532', 30, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `customer_bup`
--

CREATE TABLE `customer_bup` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_bup`
--

INSERT INTO `customer_bup` (`id`, `firstname`, `lastname`, `address`, `email`, `city`, `division`, `zipcode`, `age`) VALUES
(1, 'Bidhan', 'sutradhar', 'gupti', 'bidhanvk@gmail.com', 'Chandpur', 'chittagong', '3652', 10),
(2, 'Virat kohli', 'sutradhar', 'gupti', 'kholi@gmail.com', 'Chandpur', 'Dhaka', '3652', 35),
(3, 'Apoun', 'sutradhar', 'gupti', 'Apoun@gmail.com', 'Hazigonj', 'Dhaka', '2431', 25);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `Ordername` varchar(255) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `customerId` int(11) DEFAULT NULL,
  `orderDate` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `Ordername`, `productId`, `customerId`, `orderDate`) VALUES
(2, 'cash in', 2, 1, '2017-04-18 10:50:30'),
(3, 'cash out', 1, 2, '2017-04-18 12:18:33'),
(4, 'cash', 1, 1, '2017-04-22 12:18:33');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `size`) VALUES
(1, 'tshirt', 'm'),
(2, 'men-shirt', 'l'),
(3, 'Full shirt', 'm'),
(4, 'Short shirt', 'm'),
(5, 'sari yellow', 'large'),
(6, 'kamig', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `suppliars`
--

CREATE TABLE `suppliars` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_bup`
--
ALTER TABLE `customer_bup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productId` (`productId`),
  ADD KEY `customerId` (`customerId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliars`
--
ALTER TABLE `suppliars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customer_bup`
--
ALTER TABLE `customer_bup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `suppliars`
--
ALTER TABLE `suppliars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customerId`) REFERENCES `customers` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
