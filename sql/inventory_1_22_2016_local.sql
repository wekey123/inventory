-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2016 at 09:59 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE IF NOT EXISTS `inventories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `variant` tinyint(1) NOT NULL,
  `type` varchar(50) NOT NULL COMMENT 'order,fulfillment,sale',
  `created` timestamp NOT NULL,
  `modified` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `user_id`, `product_id`, `quantity`, `purchase_price`, `sale_price`, `variant`, `type`, `created`, `modified`) VALUES
(1, 1, 1, 15, '6.00', '24.00', 1, 'order', '2016-01-21 09:50:32', '2016-01-21 09:50:32'),
(2, 1, 1, 5, '6.00', '24.00', 1, 'fulfillment', '2016-01-21 09:52:56', '2016-01-21 09:52:56'),
(3, 1, 1, 3, '6.00', '24.00', 1, 'fulfillment', '2016-01-21 09:52:56', '2016-01-21 09:52:56'),
(4, 1, 1, 9, '6.00', '25.00', 1, 'sale', '2016-01-21 09:54:42', '2016-01-21 09:54:42'),
(5, 1, 1, 3, '6.00', '28.00', 1, 'sale', '2016-01-21 09:54:42', '2016-01-21 09:54:42');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `vendor` varchar(150) NOT NULL,
  `type` varchar(150) NOT NULL,
  `tags` text NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '1',
  `price` decimal(10,2) NOT NULL,
  `list_price` decimal(10,2) NOT NULL,
  `sku` varchar(150) NOT NULL,
  `barcode` varchar(150) NOT NULL,
  `quantity` int(11) NOT NULL,
  `weight` float NOT NULL,
  `variants` tinyint(1) NOT NULL DEFAULT '0',
  `attributes` varchar(250) NOT NULL,
  `values` varchar(250) NOT NULL,
  `tax` tinyint(1) NOT NULL DEFAULT '0',
  `shipping` tinyint(1) NOT NULL DEFAULT '0',
  `published_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `title`, `description`, `vendor`, `type`, `tags`, `publish`, `price`, `list_price`, `sku`, `barcode`, `quantity`, `weight`, `variants`, `attributes`, `values`, `tax`, `shipping`, `published_at`, `updated_at`) VALUES
(1, 1, 'McDavid 6440 Hexpad Knee/Elbow/Shin Pad', 'The Impact pad with hexpad technology is integrated into a new low profile, form-fitting knee or elbow pad. Perfect for all levels of impact absorption.', 'McDavid', '', '', 1, '24.98', '24.99', 'bk101', '', 5, 0.11, 1, 'blank,white,red', 'small,medium,large', 2, 2, '2016-01-18 11:20:17', '2016-01-18 11:20:17'),
(2, 1, 'Product2', '', '', '', '', 1, '0.00', '0.00', '', '', 0, 0, 0, '', '', 0, 0, '2016-01-20 07:10:13', '2016-01-20 07:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `photo` text NOT NULL,
  `privilages` varchar(30) NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '1',
  `published_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone`, `email`, `password`, `photo`, `privilages`, `publish`, `published_at`, `updated_at`) VALUES
(1, 'vignesh', 'kumar', '9229103990', 'test@yopmail.com', 'test11', '', 'admin', 1, '2016-01-19 06:44:53', '2016-01-19 06:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE IF NOT EXISTS `variants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `attribute` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL COMMENT 'order,fulfillment,sale',
  `created_at` timestamp NOT NULL,
  `modified_At` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `variants`
--

INSERT INTO `variants` (`id`, `user_id`, `inventory_id`, `product_id`, `quantity`, `purchase_price`, `sale_price`, `attribute`, `value`, `type`, `created_at`, `modified_At`) VALUES
(1, 1, 1, 1, 3, '6.00', '24.00', 'black', 'small', '', '2016-01-19 12:13:41', '2016-01-19 12:13:41'),
(2, 1, 1, 1, 7, '7.00', '24.00', 'black', 'medium', '', '2016-01-19 12:13:41', '2016-01-19 12:13:41');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
