-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2017 at 04:57 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gst`
--

-- --------------------------------------------------------

--
-- Table structure for table `gst_admin`
--

CREATE TABLE IF NOT EXISTS `gst_admin` (
  `gst_admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(10) NOT NULL,
  `password` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'D',
  PRIMARY KEY (`gst_admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gst_admin`
--

INSERT INTO `gst_admin` (`gst_admin_id`, `user_id`, `password`, `username`, `status`) VALUES
(1, 'admin', '123456', 'Niranjan', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `gst_bank`
--

CREATE TABLE IF NOT EXISTS `gst_bank` (
  `gst_bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `gst_company_id` int(11) NOT NULL,
  `bank_name` varchar(150) NOT NULL,
  `account_holder` varchar(255) NOT NULL,
  `ifsc_code` varchar(50) DEFAULT NULL,
  `branch` varchar(100) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`gst_bank_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `gst_bank`
--

INSERT INTO `gst_bank` (`gst_bank_id`, `gst_company_id`, `bank_name`, `account_holder`, `ifsc_code`, `branch`, `account_number`, `create_date`, `update_date`, `status`) VALUES
(4, 1, 'ANDHRA BANK', 'NIRANJAN BHAGHAVANDAS JARIWALA', 'ANDB0001118', 'RING ROAD BRANCH SURAT', '111811100006393', '2017-10-17 08:24:54', NULL, 'A'),
(5, 1, 'BANK OF BARODA', 'NIRANJAN BHAGHAVANDAS JARIWALA', 'BARB0UDHNAM', 'SOSYO CIRCLE, U.M ROAD, SURAT,395009', '45510200000487', '2017-10-17 08:44:03', NULL, 'A'),
(7, 2, 'STATE BANK OF INDIA', 'Bhagwandas M. Jariwala', 'SBIN0010993 SWIFT', 'SOSYO CIRCLE, U.M ROAD, SURAT', '30985175954', '2017-10-17 09:02:15', NULL, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `gst_bill`
--

CREATE TABLE IF NOT EXISTS `gst_bill` (
  `gst_bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `gst_company_id` int(11) NOT NULL,
  `gst_party_id` int(11) NOT NULL,
  `gst_bank_id` varchar(11) NOT NULL,
  `invoice_type` varchar(2) NOT NULL,
  `sub_total` double NOT NULL,
  `gst_tax` varchar(5) NOT NULL,
  `final_total` double NOT NULL,
  `bill_date` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`gst_bill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `gst_bill`
--

INSERT INTO `gst_bill` (`gst_bill_id`, `invoice_id`, `gst_company_id`, `gst_party_id`, `gst_bank_id`, `invoice_type`, `sub_total`, `gst_tax`, `final_total`, `bill_date`, `create_date`, `update_date`, `status`) VALUES
(3, 20, 1, 1, '4,5', 'OI', 36000, '4320', 40320, '2017-10-17 00:00:00', '2017-10-17 08:53:43', NULL, 'A'),
(4, 34, 2, 2, '7', 'OI', 38400, '4608', 43008, '2017-10-17 00:00:00', '2017-10-17 09:14:43', NULL, 'A'),
(7, 23, 1, 1, '4,5', 'OI', 24000, '2880', 26880, '2002-01-04 00:00:00', '2002-01-04 13:52:28', NULL, 'A'),
(8, 35, 2, 4, '7', 'OI', 50400, '6048', 56448, '2002-01-04 00:00:00', '2002-01-04 13:56:28', NULL, 'A'),
(9, 24, 1, 4, '4,5', 'OI', 54600, '6552', 61152, '2017-11-07 00:00:00', '2017-11-07 14:02:03', NULL, 'A'),
(10, 36, 2, 4, '7', 'OI', 54600, '6552', 61152, '2017-11-07 00:00:00', '2017-11-07 14:06:23', NULL, 'A'),
(11, 25, 1, 4, '4,5', 'OI', 54600, '6552', 61152, '2017-11-09 00:00:00', '2017-11-09 16:15:56', NULL, 'A'),
(12, 37, 2, 4, '7', 'OI', 49488, '5938.', 55426.56, '2017-11-09 00:00:00', '2017-11-09 16:27:20', NULL, 'A'),
(13, 26, 1, 2, '5,4', 'OI', 24000, '2880', 26880, '2017-11-11 00:00:00', '2017-11-11 13:57:29', NULL, 'A'),
(14, 38, 2, 2, '7', 'OI', 24000, '2880', 26880, '2017-11-11 00:00:00', '2017-11-11 14:03:12', NULL, 'A'),
(15, 27, 1, 5, '4,5', 'OI', 26400, '3168', 29568, '2017-11-15 00:00:00', '2017-11-15 13:20:37', NULL, 'A'),
(16, 39, 2, 6, '7', 'OI', 26400, '3168', 29568, '2017-11-15 00:00:00', '2017-11-15 13:32:14', NULL, 'A'),
(18, 40, 2, 2, '7', 'OI', 48000, '5760', 53760, '2017-11-17 00:00:00', '2017-11-17 14:36:42', NULL, 'A'),
(19, 28, 1, 7, '4,5', 'OI', 36000, '4320', 40320, '2017-11-18 00:00:00', '2017-11-18 08:53:56', NULL, 'A'),
(20, 29, 1, 8, '4,5', 'OI', 10000, '1200', 11200, '2017-11-20 00:00:00', '2017-11-20 12:56:03', NULL, 'A'),
(21, 41, 2, 4, '7', 'OI', 59200, '7104', 66304, '2017-11-21 00:00:00', '2017-11-21 13:59:45', NULL, 'A'),
(22, 30, 1, 2, '4,5', 'OI', 43200, '5184', 48384, '2017-11-22 00:00:00', '2017-11-22 15:27:44', NULL, 'A'),
(23, 42, 2, 2, '7', 'OI', 45600, '5472', 51072, '2017-11-24 00:00:00', '2017-11-24 14:16:16', NULL, 'A'),
(24, 31, 1, 4, '4,5', 'OI', 46440, '5572.', 52012.8, '2017-11-27 00:00:00', '2017-11-27 13:51:06', NULL, 'A'),
(32, 32, 1, 5, '4,5', 'OI', 31200, '3744', 34944, '2017-11-29 00:00:00', '2017-11-29 15:42:00', NULL, 'A'),
(43, 43, 2, 2, '7', 'OI', 48000, '5760', 53760, '2017-11-27 00:00:00', '2017-11-27 13:55:56', NULL, 'A'),
(44, 33, 1, 7, '4,5', 'OI', 24000, '2880', 26880, '2017-12-02 00:00:00', '2017-12-02 16:02:48', NULL, 'A'),
(45, 34, 1, 5, '4,5', 'OI', 31200, '3744', 34944, '2017-12-05 00:00:00', '2017-12-05 14:27:04', NULL, 'A'),
(46, 44, 2, 2, '7', 'OI', 30000, '3600', 33600, '2017-12-06 00:00:00', '2017-12-06 16:06:21', NULL, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `gst_bill_item`
--

CREATE TABLE IF NOT EXISTS `gst_bill_item` (
  `gst_bill_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `gst_bill_id` int(11) NOT NULL,
  `gst_item_id` int(11) NOT NULL,
  `qty` double NOT NULL,
  `qty_amount` double NOT NULL,
  `total` double NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`gst_bill_item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `gst_bill_item`
--

INSERT INTO `gst_bill_item` (`gst_bill_item_id`, `gst_bill_id`, `gst_item_id`, `qty`, `qty_amount`, `total`, `create_date`, `update_date`, `status`) VALUES
(3, 3, 4, 100, 120, 12000, '2017-10-17 08:53:43', NULL, 'A'),
(4, 3, 4, 100, 120, 12000, '2017-10-17 08:53:43', NULL, 'A'),
(5, 3, 4, 100, 120, 12000, '2017-10-17 08:53:43', NULL, 'A'),
(6, 4, 5, 100, 192, 19200, '2017-10-17 09:14:43', NULL, 'A'),
(7, 4, 5, 100, 192, 19200, '2017-10-17 09:14:43', NULL, 'A'),
(10, 7, 4, 200, 120, 24000, '2002-01-04 13:52:28', NULL, 'A'),
(11, 8, 6, 200, 252, 50400, '2002-01-04 13:56:28', NULL, 'A'),
(12, 9, 6, 100, 273, 27300, '2017-11-07 14:02:03', NULL, 'A'),
(13, 9, 6, 100, 273, 27300, '2017-11-07 14:02:03', NULL, 'A'),
(14, 10, 6, 100, 273, 27300, '2017-11-07 14:06:23', NULL, 'A'),
(15, 10, 6, 100, 273, 27300, '2017-11-07 14:06:23', NULL, 'A'),
(16, 11, 6, 100, 273, 27300, '2017-11-09 16:15:56', NULL, 'A'),
(17, 11, 6, 100, 273, 27300, '2017-11-09 16:15:56', NULL, 'A'),
(18, 12, 6, 100, 273, 27300, '2017-11-09 16:27:20', NULL, 'A'),
(19, 12, 6, 86, 258, 22188, '2017-11-09 16:27:20', NULL, 'A'),
(20, 13, 5, 100, 240, 24000, '2017-11-11 13:57:29', NULL, 'A'),
(21, 14, 5, 100, 240, 24000, '2017-11-11 14:03:12', NULL, 'A'),
(22, 15, 5, 110, 120, 13200, '2017-11-15 13:20:37', NULL, 'A'),
(23, 15, 5, 110, 120, 13200, '2017-11-15 13:20:37', NULL, 'A'),
(24, 16, 4, 110, 120, 13200, '2017-11-15 13:32:15', NULL, 'A'),
(25, 16, 4, 110, 120, 13200, '2017-11-15 13:32:15', NULL, 'A'),
(26, 17, 4, 110, 120, 13200, '2017-11-15 13:33:52', NULL, 'A'),
(27, 17, 4, 110, 120, 13200, '2017-11-15 13:33:52', NULL, 'A'),
(28, 18, 5, 100, 240, 24000, '2017-11-17 14:36:42', NULL, 'A'),
(29, 18, 5, 100, 240, 24000, '2017-11-17 14:36:42', NULL, 'A'),
(30, 19, 4, 100, 120, 12000, '2017-11-18 08:53:56', NULL, 'A'),
(31, 19, 4, 100, 120, 12000, '2017-11-18 08:53:56', NULL, 'A'),
(32, 19, 4, 100, 120, 12000, '2017-11-18 08:53:56', NULL, 'A'),
(33, 20, 6, 100, 100, 10000, '2017-11-20 12:56:03', NULL, 'A'),
(34, 21, 7, 100, 296, 29600, '2017-11-21 13:59:45', NULL, 'A'),
(35, 21, 7, 100, 296, 29600, '2017-11-21 13:59:45', NULL, 'A'),
(36, 22, 5, 90, 240, 21600, '2017-11-22 15:27:44', NULL, 'A'),
(37, 22, 5, 90, 240, 21600, '2017-11-22 15:27:44', NULL, 'A'),
(38, 23, 5, 100, 240, 24000, '2017-11-24 14:16:17', NULL, 'A'),
(39, 23, 5, 90, 240, 21600, '2017-11-24 14:16:17', NULL, 'A'),
(40, 24, 6, 90, 258, 23220, '2017-11-27 13:51:06', NULL, 'A'),
(41, 24, 6, 90, 258, 23220, '2017-11-27 13:51:06', NULL, 'A'),
(42, 25, 5, 100, 240, 24000, '2017-11-27 13:55:56', NULL, 'A'),
(43, 25, 5, 100, 240, 24000, '2017-11-27 13:55:56', NULL, 'A'),
(44, 26, 5, 130, 120, 15600, '2017-11-29 15:42:00', NULL, 'A'),
(45, 26, 5, 130, 120, 15600, '2017-11-29 15:42:00', NULL, 'A'),
(46, 27, 4, 100, 100, 10000, '2017-11-29 16:51:38', NULL, 'A'),
(47, 44, 4, 100, 120, 12000, '2017-12-02 16:02:48', NULL, 'A'),
(48, 44, 4, 100, 120, 12000, '2017-12-02 16:02:48', NULL, 'A'),
(49, 45, 5, 130, 120, 15600, '2017-12-05 14:27:04', NULL, 'A'),
(50, 45, 5, 130, 120, 15600, '2017-12-05 14:27:04', NULL, 'A'),
(51, 46, 5, 100, 150, 15000, '2017-12-06 16:06:21', NULL, 'A'),
(52, 46, 5, 100, 150, 15000, '2017-12-06 16:06:21', NULL, 'A'),
(53, 47, 4, 1, 1000, 1000, '2017-12-06 16:52:10', NULL, 'A'),
(54, 48, 4, 1, 1, 1, '2017-12-06 16:52:29', NULL, 'A'),
(55, 49, 4, 10, 1000, 10000, '2017-12-06 16:55:34', NULL, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `gst_chalan`
--

CREATE TABLE IF NOT EXISTS `gst_chalan` (
  `gst_chalan_id` int(11) NOT NULL AUTO_INCREMENT,
  `gst_bill_id` int(11) NOT NULL,
  `gst_item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `qty_amount` double NOT NULL,
  `total` double NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`gst_chalan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `gst_chalan`
--

INSERT INTO `gst_chalan` (`gst_chalan_id`, `gst_bill_id`, `gst_item_id`, `qty`, `qty_amount`, `total`, `create_date`) VALUES
(1, 1, 1, 100, 240, 24000, '2017-10-13 16:04:14'),
(2, 2, 4, 100, 240, 24000, '2017-10-13 16:06:24'),
(3, 3, 4, 100, 145, 14500, '2017-10-13 16:27:46'),
(4, 4, 4, 10, 100, 1000, '2017-10-13 16:28:37'),
(5, 5, 4, 100, 200, 20000, '2017-10-13 16:31:39'),
(6, 5, 3, 100, 300, 30000, '2017-10-13 16:31:39'),
(7, 5, 4, 100, 400, 40000, '2017-10-13 16:31:39'),
(8, 6, 1, 100, 100, 10000, '2017-10-16 20:31:58'),
(9, 1, 4, 300, 120, 36000, '2017-10-17 08:28:06'),
(10, 2, 4, 300, 120, 36000, '2017-10-17 08:50:00'),
(11, 3, 4, 100, 120, 12000, '2017-10-17 08:53:43'),
(12, 3, 4, 100, 120, 12000, '2017-10-17 08:53:43'),
(13, 3, 4, 100, 120, 12000, '2017-10-17 08:53:43'),
(14, 4, 5, 100, 192, 19200, '2017-10-17 09:14:43'),
(15, 4, 5, 100, 192, 19200, '2017-10-17 09:14:43'),
(16, 5, 6, 100, 0, 0, '2001-12-31 19:57:51'),
(17, 6, 6, 100, 252, 25200, '2001-12-31 19:59:14'),
(18, 7, 4, 200, 120, 24000, '2002-01-04 13:52:28'),
(19, 8, 6, 200, 252, 50400, '2002-01-04 13:56:28'),
(20, 9, 6, 100, 273, 27300, '2017-11-07 14:02:03'),
(21, 9, 6, 100, 273, 27300, '2017-11-07 14:02:03'),
(22, 10, 6, 100, 273, 27300, '2017-11-07 14:06:23'),
(23, 10, 6, 100, 273, 27300, '2017-11-07 14:06:23'),
(24, 11, 6, 100, 273, 27300, '2017-11-09 16:15:56'),
(25, 11, 6, 100, 273, 27300, '2017-11-09 16:15:56'),
(26, 12, 6, 100, 273, 27300, '2017-11-09 16:27:20'),
(27, 12, 6, 86, 258, 22188, '2017-11-09 16:27:20'),
(28, 13, 5, 100, 240, 24000, '2017-11-11 13:57:29'),
(29, 14, 5, 100, 240, 24000, '2017-11-11 14:03:12'),
(30, 15, 5, 110, 120, 13200, '2017-11-15 13:20:37'),
(31, 15, 5, 110, 120, 13200, '2017-11-15 13:20:37'),
(32, 16, 4, 110, 120, 13200, '2017-11-15 13:32:15'),
(33, 16, 4, 110, 120, 13200, '2017-11-15 13:32:15'),
(34, 17, 4, 110, 120, 13200, '2017-11-15 13:33:52'),
(35, 17, 4, 110, 120, 13200, '2017-11-15 13:33:52'),
(36, 18, 5, 100, 240, 24000, '2017-11-17 14:36:42'),
(37, 18, 5, 100, 240, 24000, '2017-11-17 14:36:42'),
(38, 19, 4, 100, 120, 12000, '2017-11-18 08:53:56'),
(39, 19, 4, 100, 120, 12000, '2017-11-18 08:53:56'),
(40, 19, 4, 100, 120, 12000, '2017-11-18 08:53:56'),
(41, 20, 6, 100, 100, 10000, '2017-11-20 12:56:03'),
(42, 21, 7, 100, 296, 29600, '2017-11-21 13:59:45'),
(43, 21, 7, 100, 296, 29600, '2017-11-21 13:59:45'),
(44, 22, 5, 90, 240, 21600, '2017-11-22 15:27:44'),
(45, 22, 5, 90, 240, 21600, '2017-11-22 15:27:44'),
(46, 23, 5, 100, 240, 24000, '2017-11-24 14:16:17'),
(47, 23, 5, 90, 240, 21600, '2017-11-24 14:16:17'),
(48, 24, 6, 90, 258, 23220, '2017-11-27 13:51:06'),
(49, 24, 6, 90, 258, 23220, '2017-11-27 13:51:06'),
(50, 25, 5, 100, 240, 24000, '2017-11-27 13:55:56'),
(51, 25, 5, 100, 240, 24000, '2017-11-27 13:55:56'),
(52, 26, 5, 130, 120, 15600, '2017-11-29 15:42:00'),
(53, 26, 5, 130, 120, 15600, '2017-11-29 15:42:00'),
(54, 27, 4, 100, 100, 10000, '2017-11-29 16:51:38'),
(55, 44, 4, 100, 120, 12000, '2017-12-02 16:02:48'),
(56, 44, 4, 100, 120, 12000, '2017-12-02 16:02:48'),
(57, 45, 5, 130, 120, 15600, '2017-12-05 14:27:04'),
(58, 45, 5, 130, 120, 15600, '2017-12-05 14:27:04'),
(59, 46, 5, 100, 150, 15000, '2017-12-06 16:06:21'),
(60, 46, 5, 100, 150, 15000, '2017-12-06 16:06:21'),
(61, 47, 4, 1, 1000, 1000, '2017-12-06 16:52:10'),
(62, 48, 4, 1, 1, 1, '2017-12-06 16:52:29'),
(63, 49, 4, 10, 1000, 10000, '2017-12-06 16:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `gst_company`
--

CREATE TABLE IF NOT EXISTS `gst_company` (
  `gst_company_id` int(11) NOT NULL AUTO_INCREMENT,
  `comapny_name` varchar(255) NOT NULL,
  `address` varchar(150) DEFAULT NULL,
  `phone_no_1` varchar(15) NOT NULL,
  `phone_no_2` varchar(15) DEFAULT NULL,
  `gst_no` varchar(50) NOT NULL,
  `pan_no` varchar(50) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`gst_company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gst_company`
--

INSERT INTO `gst_company` (`gst_company_id`, `comapny_name`, `address`, `phone_no_1`, `phone_no_2`, `gst_no`, `pan_no`, `create_date`, `updated_date`, `status`) VALUES
(1, 'M/s. Niranjan Bhagvandas Jariwala', 'Plot No. 25,Gajanand Sheri,Ambanagar-2, U.M. Road, Surat.', '9898018840', '0261-2631812', '24ABUPJ7910M1Z4', 'ABUPJ7910M', '2017-10-17 08:22:41', NULL, 'A'),
(2, 'Mehul Jari Traders', 'Plot No. 25, Gajanand Sheri, Ambanagar-2, U.M.Road, Surat', '9898018840', '0261-2631812', '24ABUPJ7907Q1ZR', 'ABUPJ7907Q', '2017-10-17 08:59:50', NULL, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `gst_item`
--

CREATE TABLE IF NOT EXISTS `gst_item` (
  `gst_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) NOT NULL,
  `description` text,
  `hsn_code` varchar(25) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`gst_item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `gst_item`
--

INSERT INTO `gst_item` (`gst_item_id`, `item_name`, `description`, `hsn_code`, `create_date`, `update_date`, `status`) VALUES
(4, 'IMITATION JARI G.L.BRAND', '', '0', '2017-10-13 16:05:48', NULL, 'A'),
(5, 'IMITATION JARI M.L.BRAND', '0', '0', '2017-10-17 09:06:53', NULL, 'A'),
(6, 'IMITATION JARI S.V.BRAND', '', '0', '2001-12-31 19:55:03', NULL, 'A'),
(7, 'IMITATION JARI GAJANAND BRAND', '0', '0', '2017-11-21 13:56:57', NULL, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `gst_party`
--

CREATE TABLE IF NOT EXISTS `gst_party` (
  `gst_party_id` int(11) NOT NULL AUTO_INCREMENT,
  `party_company_name` varchar(255) DEFAULT NULL,
  `party_name` varchar(255) NOT NULL,
  `address` text,
  `phone_no` varchar(15) NOT NULL,
  `party_gst_no` varchar(20) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`gst_party_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `gst_party`
--

INSERT INTO `gst_party` (`gst_party_id`, `party_company_name`, `party_name`, `address`, `phone_no`, `party_gst_no`, `create_date`, `update_date`, `status`) VALUES
(1, 'G.CHENCHAIAH', 'G.CHENCHAIAH', 'VENKATAGIRI', '09440506680', '37AJMPG9136E1Z2', '2017-10-17 08:04:37', NULL, 'A'),
(2, 'LAKSHMI KALA HANDLOOMS', 'G.NAGRAJU', 'JAMMALMADUGU', '09966465539', '37AUBPN3341G1ZT', '2017-10-17 09:04:07', NULL, 'A'),
(4, 'SRI DIVYA TRADERS', 'S.NAGRAJ', 'SATHYAMANGALAM', '09345008732', '33AGIPN5659E1ZA', '2001-12-31 19:49:58', NULL, 'A'),
(5, 'G.M.R HANDLOOMS', 'G.MALLESHWARA RAO', '           VETAPALEM', '9030132340', '37AONPG1842D1Z4', '2017-11-15 13:12:57', NULL, 'A'),
(6, 'DILLIBABU JONNADULLA', 'J.SANKARAIAH', 'VENKATAGIRI', '9441043283', '37AVCPJ5738R1ZU', '2017-11-15 13:31:15', NULL, 'A'),
(7, 'SUBHASHINI GOWRABATHINA', 'SUBHASHINI GOWRABATHINA', 'VENKATAGIRI', '9440506680', '37AYUPG7395L1ZC', '2017-11-18 08:49:36', NULL, 'A'),
(8, 'T.BALAVENKATA REDDY', 'T.BALAVENKATA REDDY', 'JAMMALMADUGU', '8309752111', '37ATXPT9273C1ZS', '2017-11-20 12:54:07', NULL, 'A');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
