-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 12, 2015 at 03:29 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rods`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`customer_id` int(5) NOT NULL,
  `customer_password` varchar(30) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_ic` varchar(30) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_address` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_password`, `customer_name`, `customer_ic`, `customer_phone`, `customer_email`, `customer_address`) VALUES
(1, '123', 'emi', '321', '678', 'qwe@yahoo.com', 'Machang'),
(2, 'ert', 'ad', '56', 'fsdf@yahoo.com', 'fsdf@yahoo.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE IF NOT EXISTS `foods` (
`food_id` int(5) NOT NULL,
  `food_category_id` int(5) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `food_price` varchar(50) NOT NULL,
  `food_description` text NOT NULL,
  `food_picture` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`food_id`, `food_category_id`, `food_name`, `food_price`, `food_description`, `food_picture`) VALUES
(1, 1, 'Ice cream chocolaate', '50', 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit', 'ice cream.jpg\r\n'),
(2, 1, 'cake coklat', '34', 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit', 'cake.jpg'),
(3, 3, 'nasi ayam', '10', 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit', 'nasi_ayam.jpeg'),
(4, 3, 'nasi lemak', '90', 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit', 'nasi_lemak.jpg'),
(5, 2, 'Air epal', '12', 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit', 'apel juice.jpg'),
(6, 2, 'orange juice', '34', 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit', 'jus_orange.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `food_categories`
--

CREATE TABLE IF NOT EXISTS `food_categories` (
`food_category_id` int(5) NOT NULL,
  `food_category_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_categories`
--

INSERT INTO `food_categories` (`food_category_id`, `food_category_name`) VALUES
(1, 'Desert'),
(2, 'Drink'),
(3, 'Food');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
 ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `food_categories`
--
ALTER TABLE `food_categories`
 ADD PRIMARY KEY (`food_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `customer_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
MODIFY `food_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `food_categories`
--
ALTER TABLE `food_categories`
MODIFY `food_category_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
