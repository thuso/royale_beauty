-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 03, 2012 at 10:48 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `royale_beauty`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `CUSTOMER_ID` int(11) NOT NULL,
  `STREET_NAME` varchar(50) DEFAULT NULL,
  `PROVINCE` varchar(50) DEFAULT NULL,
  `POSTAL_CODE` varchar(4) DEFAULT NULL,
  `HOUSE_NUMBER` int(11) DEFAULT NULL,
  PRIMARY KEY (`CUSTOMER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`CUSTOMER_ID`, `STREET_NAME`, `PROVINCE`, `POSTAL_CODE`, `HOUSE_NUMBER`) VALUES
(1, '10th', 'Gauteng', '0152', 2479),
(2, 'jesus', 'hugh', '2452', 512311),
(3, 'fefe', 'Free state', '0569', 0),
(4, 'kelo', 'North west', '0189', 0),
(5, '', 'Gauteng', '', 0),
(6, 'bnbnb', 'Gauteng', '455', 3553),
(7, '20th', 'Gauteng', '1619', 123);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_Fname` varchar(50) DEFAULT NULL,
  `customer_Lname` varchar(50) DEFAULT NULL,
  `customer_gender` varchar(6) DEFAULT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_password` varchar(16) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_Fname`, `customer_Lname`, `customer_gender`, `customer_email`, `customer_password`) VALUES
(1, 'Johannes', 'machete', 'male', 'Sjmachete@gmail.com', '1234'),
(2, 'keke', 'makhubela', 'female', 'keke@mail.com', '1235'),
(3, 'CIA', 'BADUZA', 'female', 'sanga@webmal.co.za', 'cia'),
(4, 'lesego', 'Matlhatsi', 'female', 'lsg@mail.com', 'lsg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(50) DEFAULT NULL,
  `order_qauntity` int(11) DEFAULT NULL,
  `Product_Id` int(11) DEFAULT NULL,
  `Order_reference` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `Product_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Product_Type` varchar(20) DEFAULT NULL,
  `Product_Name` varchar(20) DEFAULT NULL,
  `Product_Price` float(18,2) DEFAULT NULL,
  `Product_Qty` int(11) DEFAULT NULL,
  `Product_Image` varchar(50) NOT NULL,
  PRIMARY KEY (`Product_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1013 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_Id`, `Product_Type`, `Product_Name`, `Product_Price`, `Product_Qty`, `Product_Image`) VALUES
(1000, 'cologne', 'Opulance', 120.00, 256, 'opulence-men.JPG'),
(1001, 'Cologne', 'private-label', 499.23, 312, 'private-label.jpg'),
(1002, 'Cologne', 'sofisto', 56.66, 456, 'sofisto.jpg'),
(1003, 'Face', 'vanda ', 152.23, 526, 'product_makeup.jpg'),
(1005, 'Hand', 'green-gardens', 123.23, 256, 'green-gardens.jpg'),
(1007, 'Ladies', 'Opulance women', 15.50, 256, 'opulence-women.jpg'),
(1008, 'Ladies', 'suspense', 9.50, 120, 'suspense.jpg'),
(1009, 'Ladies', 'vandalicious', 895.23, 100, 'vandalicious.jpg'),
(1010, 'Perfume', 'dkny golden deliciou', 48.23, 56, 'dkny golden delicious.jpg'),
(1011, 'Perfume', 'D&G rose the one', 125.56, 560, 'D&G rose the one.jpg'),
(1012, 'Perfum', 'red door', 123.23, 500, 'red door.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
