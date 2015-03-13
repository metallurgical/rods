-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2015 at 10:34 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ros`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_password`, `customer_name`, `customer_ic`, `customer_phone`, `customer_email`, `customer_address`) VALUES
(1, '123', 'emi', '321', '678', 'qwe', 'Machang'),
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
  `food_picture` varchar(300) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `food_categories`
--

INSERT INTO `food_categories` (`food_category_id`, `food_category_name`) VALUES
(1, 'Desert'),
(2, 'Drink'),
(3, 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `food_order`
--

CREATE TABLE IF NOT EXISTS `food_order` (
`food_order_id` int(5) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `food_id` int(5) NOT NULL,
  `food_order_delivery` int(5) NOT NULL COMMENT '0- not state, 1 - delivery, 2 - ambik sdri',
  `food_order_status` int(5) NOT NULL COMMENT '0-not yet confirm, 1 - confirm, 2 - delivering process, 3 - delivered'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `food_order`
--

INSERT INTO `food_order` (`food_order_id`, `customer_id`, `food_id`, `food_order_delivery`, `food_order_status`) VALUES
(43, 1, 6, 2, 1),
(44, 1, 1, 1, 1),
(45, 1, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE IF NOT EXISTS `promotions` (
`promotion_id` int(5) NOT NULL,
  `promotion_title` varchar(150) NOT NULL,
  `promotion_content` text NOT NULL,
  `promotion_price` varchar(5) NOT NULL,
  `promotion_picture` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`promotion_id`, `promotion_title`, `promotion_content`, `promotion_price`, `promotion_picture`) VALUES
(1, 'Mari mari1', '<p>\r\n	<strong style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;">Lorem Ipsum</strong><span style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum1</span></p>\r\n', '99', '068ab-9402551368.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(5) NOT NULL,
  `user_username` varchar(15) NOT NULL,
  `user_password` varchar(15) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_category` varchar(15) NOT NULL DEFAULT 'staff'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_password`, `user_name`, `user_category`) VALUES
(1, 'admin', 'admin', 'Ahmad', 'admin'),
(2, 'staffa', 'staffa', 'Staff A', 'staff'),
(3, 'abc', '123', 'ali', 'staff');

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
-- Indexes for table `food_order`
--
ALTER TABLE `food_order`
 ADD PRIMARY KEY (`food_order_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
 ADD PRIMARY KEY (`promotion_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

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
MODIFY `food_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `food_categories`
--
ALTER TABLE `food_categories`
MODIFY `food_category_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `food_order`
--
ALTER TABLE `food_order`
MODIFY `food_order_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
MODIFY `promotion_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
