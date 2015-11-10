-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2015 at 03:49 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothes_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL,
  `address1` varchar(150) NOT NULL,
  `address2` varchar(150) DEFAULT NULL,
  `city` varchar(150) NOT NULL,
  `county` varchar(150) NOT NULL,
  `country` varchar(150) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `address1`, `address2`, `city`, `county`, `country`, `userID`) VALUES
(1, 'Patricks St', 'foo', 'Cork', 'Cork', 'Ireland', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'GAPl'),
(2, 'ASOS'),
(4, 'FUBU'),
(7, 'BUFU');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `parentID` int(11) NOT NULL,
  `slug` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parentID`, `slug`) VALUES
(1, 'Pants1', 0, 'pants'),
(2, 'Dresses', 0, 'dresses'),
(3, 'Jackets', 0, 'jackets'),
(8, 'hg', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `id` int(11) NOT NULL,
  `cost` decimal(10,0) NOT NULL,
  `type` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userID` int(11) NOT NULL,
  `isPaid` tinyint(1) NOT NULL DEFAULT '0',
  `deliveryAddress` int(11) NOT NULL,
  `deliveryType` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date`, `userID`, `isPaid`, `deliveryAddress`, `deliveryType`) VALUES
(1, '2015-11-05 10:54:27', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE IF NOT EXISTS `order_item` (
  `id` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `stockID` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL,
  `method` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(11) NOT NULL,
  `size` varchar(100) NOT NULL,
  `colour` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `itemID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `size`, `colour`, `stock`, `itemID`) VALUES
(1, 'Large', 'Blue', 5, 1),
(2, 'Large', 'Yellow', 5, 1),
(3, 'Small', 'Yellow', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `store_items`
--

CREATE TABLE IF NOT EXISTS `store_items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(240) NOT NULL,
  `item_price` decimal(7,2) NOT NULL,
  `image_small` varchar(240) NOT NULL,
  `image_large` varchar(240) NOT NULL,
  `item_description` text NOT NULL,
  `rating` int(11) NOT NULL DEFAULT '0',
  `categoryID` int(11) NOT NULL,
  `brandID` int(11) NOT NULL,
  `item_description_short` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_items`
--

INSERT INTO `store_items` (`id`, `item_name`, `item_price`, `image_small`, `image_large`, `item_description`, `rating`, `categoryID`, `brandID`, `item_description_short`) VALUES
(1, 'Some Pants', '2.99', 'pants.jpg', 'pants.jpg', 'Sed sapien metus, feugiat in risus eu, feugiat vehicula erat. Ut vel sodales augue. Nulla facilisi. Fusce ultricies, erat in placerat euismod, nibh ante molestie nisi, id cursus orci ligula in neque. Nulla non aliquam ex. Etiam id tortor orci. Morbi suscipit rutrum viverra. Nam rhoncus nibh nec scelerisque sodales. Fusce pellentesque ornare tortor. ', 5, 1, 1, 'Sed sapien metus, feugiat in risus eu, feugiat vehicula erat. Ut vel sodales augue. Nulla facilisi. Fusce ultricies, erat in placerat euismod, nibh ante molestie nisi, id cursus orci ligula in neque. Nulla non aliquam ex. Etiam id tortor orci. Morbi suscipit rutrum viverra. Nam rhoncus nibh nec scelerisque sodales. Fusce pellentesque ornare tortor. '),
(2, 'Sample Shorts', '3.99', 'shorts.jpg', 'shorts.jpg', 'Maecenas sit amet est eros. Cras ac dui mattis, suscipit leo ut, condimentum urna. Fusce rhoncus ultricies orci, vitae molestie magna mattis non. Mauris eu dui vitae velit egestas mattis. Nam hendrerit dolor eget augue commodo ornare. Duis ornare lobortis nisi, a varius orci bibendum id. Maecenas faucibus arcu non tortor dictum feugiat. Aliquam ullamcorper ipsum augue, et mollis velit laoreet sodales. ', 5, 1, 1, 'Sed sapien metus, feugiat in risus eu, feugiat vehicula erat. Ut vel sodales augue. Nulla facilisi. Fusce ultricies, erat in placerat euismod, nibh ante molestie nisi, id cursus orci ligula in neque. Nulla non aliquam ex. Etiam id tortor orci. Morbi suscipit rutrum viverra. Nam rhoncus nibh nec scelerisque sodales. Fusce pellentesque ornare tortor. '),
(5, 'Sample Dress', '1.00', 'dress.jpg', 'dress.jpg', 'Sed sapien metus, feugiat in risus eu, feugiat vehicula erat. Ut vel sodales augue. Nulla facilisi. Fusce ultricies, erat in placerat euismod, nibh ante molestie nisi, id cursus orci ligula in neque. Nulla non aliquam ex. Etiam id tortor orci. Morbi suscipit rutrum viverra. Nam rhoncus nibh nec scelerisque sodales. Fusce pellentesque ornare tortor. ', 2, 2, 2, 'Sed sapien metus, feugiat in risus eu, feugiat vehicula erat. Ut vel sodales augue. Nulla facilisi. Fusce ultricies, erat in placerat euismod, nibh ante molestie nisi, id cursus orci ligula in neque. Nulla non aliquam ex. Etiam id tortor orci. Morbi suscipit rutrum viverra. Nam rhoncus nibh nec scelerisque sodales. Fusce pellentesque ornare tortor. '),
(28, 'A Jacket', '10.99', 'coat.jpg', 'coat.jpg', 'Sed sapien metus, feugiat in risus eu, feugiat vehicula erat. Ut vel sodales augue. Nulla facilisi. Fusce ultricies, erat in placerat euismod, nibh ante molestie nisi, id cursus orci ligula in neque. Nulla non aliquam ex. Etiam id tortor orci. Morbi suscipit rutrum viverra. Nam rhoncus nibh nec scelerisque sodales. Fusce pellentesque ornare tortor. ', 1, 3, 2, 'Sed sapien metus, feugiat in risus eu, feugiat vehicula erat. Ut vel sodales augue. Nulla facilisi. Fusce ultricies, erat in placerat euismod, nibh ante molestie nisi, id cursus orci ligula in neque. Nulla non aliquam ex. Etiam id tortor orci. Morbi suscipit rutrum viverra. Nam rhoncus nibh nec scelerisque sodales. Fusce pellentesque ornare tortor. '),
(29, 'Sample Socks', '9.99', 'socks.jpg', 'socks.jpg', 'Sed sapien metus, feugiat in risus eu, feugiat vehicula erat. Ut vel sodales augue. Nulla facilisi. Fusce ultricies, erat in placerat euismod, nibh ante molestie nisi, id cursus orci ligula in neque. Nulla non aliquam ex. Etiam id tortor orci. Morbi suscipit rutrum viverra. Nam rhoncus nibh nec scelerisque sodales. Fusce pellentesque ornare tortor. ', 2, 1, 2, 'Sed sapien metus, feugiat in risus eu, feugiat vehicula erat. Ut vel sodales augue. Nulla facilisi. Fusce ultricies, erat in placerat euismod, nibh ante molestie nisi, id cursus orci ligula in neque. Nulla non aliquam ex. Etiam id tortor orci. Morbi suscipit rutrum viverra. Nam rhoncus nibh nec scelerisque sodales. Fusce pellentesque ornare tortor. '),
(37, 'bf', '99.00', '', 'pants.jpg', 'hgg', 0, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(240) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(240) NOT NULL,
  `last_name` varchar(240) NOT NULL,
  `email` varchar(240) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `defaultAddressID` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `isAdmin`, `defaultAddressID`) VALUES
(1, 'adam', '63a9f0ea7bb98050796b649e85481845', 'Adam', 'Lloyd', 'foo@foo.com', 0, NULL),
(2, 'root', '63a9f0ea7bb98050796b649e85481845', 'root', 'root', 'root@root.com', 1, NULL),
(3, 'hello', '1234', 'First Name', 'Last Name', 'adam@foo.com', 0, NULL),
(4, 'hello', '81dc9bdb52d04dc20036dbd8313ed055', 'First Name', 'Last Name', 'adam@foo.com', 0, NULL),
(5, '1234', '81dc9bdb52d04dc20036dbd8313ed055', 'First Name', 'Last Name', 'foo@foo.com', 0, NULL),
(6, '1234', '81dc9bdb52d04dc20036dbd8313ed055', 'First Name', 'Last Name', 'foo@foo.com', 0, NULL),
(7, '4567', '6562c5c1f33db6e05a082a88cddab5ea', 'First Name', 'Last Name', '4567@com.com', 0, NULL),
(8, '789789', '21b95a0f90138767b0fd324e6be3457b', 'First Name', 'Last Name', '107u58@gmail.com', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_items`
--
ALTER TABLE `store_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `store_items`
--
ALTER TABLE `store_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
