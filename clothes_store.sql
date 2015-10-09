-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2015 at 11:36 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clothes_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
`id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'Brand1'),
(2, 'Brand2');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `parentID` int(11) NOT NULL,
  `slug` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parentID`, `slug`) VALUES
(1, 'Category1', 0, 'category1'),
(2, 'Category2', 0, 'category2');

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
  `brandID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_items`
--

INSERT INTO `store_items` (`id`, `item_name`, `item_price`, `image_small`, `image_large`, `item_description`, `rating`, `categoryID`, `brandID`) VALUES
(1, 'pants221', '2.99', '', '', 'Here are my pants, such lovely lovely pants that i love. Please buy pants.', 5, 1, 1),
(2, 'Another item', '3.99', '', '', 'Maecenas sit amet est eros. Cras ac dui mattis, suscipit leo ut, condimentum urna. Fusce rhoncus ultricies orci, vitae molestie magna mattis non. Mauris eu dui vitae velit egestas mattis. Nam hendrerit dolor eget augue commodo ornare. Duis ornare lobortis nisi, a varius orci bibendum id. Maecenas faucibus arcu non tortor dictum feugiat. Aliquam ullamcorper ipsum augue, et mollis velit laoreet sodales. ', 7, 1, 1),
(5, '1231', '123.00', '', '', '123', 1, 1, 1),
(6, 'Test 1', '3.99', '', '', 'Testing', 0, 2, 1),
(7, 'Testing2', '9.99', '', '', 'testing', 2, 1, 2),
(8, 'ghjgjhgh', '123.00', '', '', 'hjkhkj', 1, 1, 1),
(21, 'Another item', '3.99', '', '', 'Maecenas sit amet est eros. Cras ac dui mattis, suscipit leo ut, condimentum urna. Fusce rhoncus ultricies orci, vitae molestie magna mattis non. Mauris eu dui vitae velit egestas mattis. Nam hendrerit dolor eget augue commodo ornare. Duis ornare lobortis nisi, a varius orci bibendum id. Maecenas faucibus arcu non tortor dictum feugiat. Aliquam ullamcorper ipsum augue, et mollis velit laoreet sodales. ', 0, 1, 1),
(22, 'Underpants 2', '456.00', '', '', '456', 0, 2, 2),
(24, '777', '777.00', '', '', '77', 0, 1, 1);

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
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `isAdmin`) VALUES
(1, 'adam', '63a9f0ea7bb98050796b649e85481845', 'Adam', 'Lloyd', 'foo@foo.com', 0),
(2, 'root', '63a9f0ea7bb98050796b649e85481845', 'root', 'root', 'root@root.com', 1),
(3, 'hello', '1234', 'First Name', 'Last Name', 'adam@foo.com', 0),
(4, 'hello', '81dc9bdb52d04dc20036dbd8313ed055', 'First Name', 'Last Name', 'adam@foo.com', 0),
(5, '1234', '81dc9bdb52d04dc20036dbd8313ed055', 'First Name', 'Last Name', 'foo@foo.com', 0),
(6, '1234', '81dc9bdb52d04dc20036dbd8313ed055', 'First Name', 'Last Name', 'foo@foo.com', 0),
(7, '4567', '6562c5c1f33db6e05a082a88cddab5ea', 'First Name', 'Last Name', '4567@com.com', 0),
(8, '789789', '21b95a0f90138767b0fd324e6be3457b', 'First Name', 'Last Name', '107u58@gmail.com', 0);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `store_items`
--
ALTER TABLE `store_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
