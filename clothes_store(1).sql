-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2015 at 06:14 PM
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
(1, 'GAP'),
(2, 'ASOS');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `parentID` int(11) NOT NULL,
  `slug` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parentID`, `slug`) VALUES
(1, 'Pants', 0, 'pants'),
(2, 'Dresses', 0, 'dresses'),
(3, 'Jackets', 1, 'jackets');

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_items`
--

INSERT INTO `store_items` (`id`, `item_name`, `item_price`, `image_small`, `image_large`, `item_description`, `rating`, `categoryID`, `brandID`, `item_description_short`) VALUES
(1, 'Some Pants', '2.99', 'pants.jpg', 'pants.jpg', 'Sed sapien metus, feugiat in risus eu, feugiat vehicula erat. Ut vel sodales augue. Nulla facilisi. Fusce ultricies, erat in placerat euismod, nibh ante molestie nisi, id cursus orci ligula in neque. Nulla non aliquam ex. Etiam id tortor orci. Morbi suscipit rutrum viverra. Nam rhoncus nibh nec scelerisque sodales. Fusce pellentesque ornare tortor. ', 4, 1, 1, 'Sed sapien metus, feugiat in risus eu, feugiat vehicula erat. Ut vel sodales augue. Nulla facilisi. Fusce ultricies, erat in placerat euismod, nibh ante molestie nisi, id cursus orci ligula in neque. Nulla non aliquam ex. Etiam id tortor orci. Morbi suscipit rutrum viverra. Nam rhoncus nibh nec scelerisque sodales. Fusce pellentesque ornare tortor. '),
(2, 'Stinky Shorts', '3.99', 'shorts.jpg', 'shorts.jpg', 'Maecenas sit amet est eros. Cras ac dui mattis, suscipit leo ut, condimentum urna. Fusce rhoncus ultricies orci, vitae molestie magna mattis non. Mauris eu dui vitae velit egestas mattis. Nam hendrerit dolor eget augue commodo ornare. Duis ornare lobortis nisi, a varius orci bibendum id. Maecenas faucibus arcu non tortor dictum feugiat. Aliquam ullamcorper ipsum augue, et mollis velit laoreet sodales. ', 5, 1, 1, 'Sed sapien metus, feugiat in risus eu, feugiat vehicula erat. Ut vel sodales augue. Nulla facilisi. Fusce ultricies, erat in placerat euismod, nibh ante molestie nisi, id cursus orci ligula in neque. Nulla non aliquam ex. Etiam id tortor orci. Morbi suscipit rutrum viverra. Nam rhoncus nibh nec scelerisque sodales. Fusce pellentesque ornare tortor. '),
(5, 'Sexy Dress', '1.00', 'dress.jpg', 'dress.jpg', 'Sed sapien metus, feugiat in risus eu, feugiat vehicula erat. Ut vel sodales augue. Nulla facilisi. Fusce ultricies, erat in placerat euismod, nibh ante molestie nisi, id cursus orci ligula in neque. Nulla non aliquam ex. Etiam id tortor orci. Morbi suscipit rutrum viverra. Nam rhoncus nibh nec scelerisque sodales. Fusce pellentesque ornare tortor. ', 2, 2, 2, 'Sed sapien metus, feugiat in risus eu, feugiat vehicula erat. Ut vel sodales augue. Nulla facilisi. Fusce ultricies, erat in placerat euismod, nibh ante molestie nisi, id cursus orci ligula in neque. Nulla non aliquam ex. Etiam id tortor orci. Morbi suscipit rutrum viverra. Nam rhoncus nibh nec scelerisque sodales. Fusce pellentesque ornare tortor. '),
(28, 'A Jacket', '10.99', 'coat.jpg', 'coat.jpg', 'Sed sapien metus, feugiat in risus eu, feugiat vehicula erat. Ut vel sodales augue. Nulla facilisi. Fusce ultricies, erat in placerat euismod, nibh ante molestie nisi, id cursus orci ligula in neque. Nulla non aliquam ex. Etiam id tortor orci. Morbi suscipit rutrum viverra. Nam rhoncus nibh nec scelerisque sodales. Fusce pellentesque ornare tortor. ', 1, 3, 2, 'Sed sapien metus, feugiat in risus eu, feugiat vehicula erat. Ut vel sodales augue. Nulla facilisi. Fusce ultricies, erat in placerat euismod, nibh ante molestie nisi, id cursus orci ligula in neque. Nulla non aliquam ex. Etiam id tortor orci. Morbi suscipit rutrum viverra. Nam rhoncus nibh nec scelerisque sodales. Fusce pellentesque ornare tortor. '),
(29, 'Stinky Socks', '9.99', 'socks.jpg', 'socks.jpg', 'Sed sapien metus, feugiat in risus eu, feugiat vehicula erat. Ut vel sodales augue. Nulla facilisi. Fusce ultricies, erat in placerat euismod, nibh ante molestie nisi, id cursus orci ligula in neque. Nulla non aliquam ex. Etiam id tortor orci. Morbi suscipit rutrum viverra. Nam rhoncus nibh nec scelerisque sodales. Fusce pellentesque ornare tortor. ', 2, 1, 2, 'Sed sapien metus, feugiat in risus eu, feugiat vehicula erat. Ut vel sodales augue. Nulla facilisi. Fusce ultricies, erat in placerat euismod, nibh ante molestie nisi, id cursus orci ligula in neque. Nulla non aliquam ex. Etiam id tortor orci. Morbi suscipit rutrum viverra. Nam rhoncus nibh nec scelerisque sodales. Fusce pellentesque ornare tortor. '),
(31, 'More Pants', '2.99', 'pants.jpg', 'pants.jpg', 'Sed sapien metus, feugiat in risus eu, feugiat vehicula erat. Ut vel sodales augue. Nulla facilisi. Fusce ultricies, erat in placerat euismod, nibh ante molestie nisi, id cursus orci ligula in neque. Nulla non aliquam ex. Etiam id tortor orci. Morbi suscipit rutrum viverra. Nam rhoncus nibh nec scelerisque sodales. Fusce pellentesque ornare tortor. ', 4, 1, 1, 'Sed sapien metus, feugiat in risus eu, feugiat vehicula erat. Ut vel sodales augue. Nulla facilisi. Fusce ultricies, erat in placerat euismod, nibh ante molestie nisi, id cursus orci ligula in neque. Nulla non aliquam ex. Etiam id tortor orci. Morbi suscipit rutrum viverra. Nam rhoncus nibh nec scelerisque sodales. Fusce pellentesque ornare tortor. '),
(32, 'another Jacket', '10.99', 'coat.jpg', 'coat.jpg', 'Sed sapien metus, feugiat in risus eu, feugiat vehicula erat. Ut vel sodales augue. Nulla facilisi. Fusce ultricies, erat in placerat euismod, nibh ante molestie nisi, id cursus orci ligula in neque. Nulla non aliquam ex. Etiam id tortor orci. Morbi suscipit rutrum viverra. Nam rhoncus nibh nec scelerisque sodales. Fusce pellentesque ornare tortor. ', 1, 3, 2, 'Sed sapien metus, feugiat in risus eu, feugiat vehicula erat. Ut vel sodales augue. Nulla facilisi. Fusce ultricies, erat in placerat euismod, nibh ante molestie nisi, id cursus orci ligula in neque. Nulla non aliquam ex. Etiam id tortor orci. Morbi suscipit rutrum viverra. Nam rhoncus nibh nec scelerisque sodales. Fusce pellentesque ornare tortor. ');

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `store_items`
--
ALTER TABLE `store_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
