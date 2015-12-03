-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 02, 2015 at 11:17 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ESPDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_plan`
--

CREATE TABLE IF NOT EXISTS `bill_plan` (
  `bill_plan` varchar(5) NOT NULL COMMENT 'Bill plan Number',
  `name` varchar(50) NOT NULL COMMENT 'description',
  `no_years` int(11) NOT NULL COMMENT 'Payment installment years',
  `roi` decimal(7,2) NOT NULL COMMENT 'rate of interest',
  `cr_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'created date',
  `ch_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Changed Date',
  PRIMARY KEY (`bill_plan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Bill Plan Table';

--
-- Dumping data for table `bill_plan`
--

INSERT INTO `bill_plan` (`bill_plan`, `name`, `no_years`, `roi`, `cr_dt`, `ch_dt`) VALUES
('Y000', 'Full Downpayment', 1, 0.00, '2015-11-29 19:54:34', '2015-11-29 19:54:34'),
('Y005', '5 Years', 5, 10.00, '2015-11-29 10:25:08', '2015-11-29 10:26:58'),
('Y010', '10 Years', 10, 12.00, '2015-11-29 19:56:23', '2015-11-29 19:56:23'),
('Y015', '15 Years', 15, 14.00, '2015-11-29 19:56:47', '2015-11-29 19:56:47'),
('Y020', '20 Years', 20, 16.00, '2015-11-29 19:57:20', '2015-11-29 19:57:20'),
('Y025', '25 Years', 25, 18.00, '2015-11-30 18:48:48', '2015-11-30 18:48:48'),
('Y030', '30 Years', 30, 20.00, '2015-12-01 10:27:19', '2015-12-01 10:27:19');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_nm` char(50) NOT NULL COMMENT 'First Name',
  `m_nm` char(50) NOT NULL COMMENT 'Middle Name',
  `l_nm` char(50) NOT NULL COMMENT 'Last Name',
  `email` varchar(100) NOT NULL COMMENT 'email address',
  `password` varchar(100) NOT NULL COMMENT 'password',
  `phone` varchar(12) DEFAULT NULL COMMENT 'phone number',
  `dob` int(3) NOT NULL COMMENT 'Date of Birth',
  `street` varchar(50) NOT NULL COMMENT 'address ln 1 street',
  `adr_l2` varchar(50) NOT NULL COMMENT 'address ln 2',
  `city` char(70) NOT NULL COMMENT 'city',
  `state` char(70) NOT NULL COMMENT 'state',
  `country` char(70) NOT NULL COMMENT 'Country',
  `zipcode` int(10) NOT NULL COMMENT 'ZipCode',
  `cr_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Created On',
  `cr_by` char(50) NOT NULL COMMENT 'created by',
  `ch_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'last changed date',
  `ch_by` char(50) NOT NULL COMMENT 'changed by',
  `co_id` int(10) NOT NULL COMMENT 'co-customer id',
  PRIMARY KEY (`cust_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `cust_id` (`cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `f_nm`, `m_nm`, `l_nm`, `email`, `password`, `phone`, `dob`, `street`, `adr_l2`, `city`, `state`, `country`, `zipcode`, `cr_dt`, `cr_by`, `ch_dt`, `ch_by`, `co_id`) VALUES
(1, 'pavani', 'satyu', 'vellal', 'pavani@gmail.com', '', NULL, 1990, 'address1', 'address2', 'city', 'state', 'US', 560085, '2015-11-21 20:33:34', '', '2015-11-21 20:33:34', '', 0),
(3, 'aaaa', 'bbbb', 'cccc', 'abc@gmail.com', '', NULL, 1990, 'address1', 'address2', 'city', 'state', 'US', 560085, '2015-11-21 20:46:53', '', '2015-11-21 20:46:53', '', 0),
(7, 'pavani', 'satyu', 'vellal', 'email@rediff.com', '', '55555555', 1990, 'adrl1', 'adrl2', 'city', 'state', 'US', 560085, '2015-11-22 02:16:43', '', '2015-11-22 02:16:43', '', 0),
(8, 'this', 'is', 'me', 'email@yahoo.com', '', '9900087817', 1990, 'adrl1', 'adrl2', 'city', 'state', 'US', 45658, '2015-11-22 03:35:22', '', '2015-11-22 03:35:22', '', 0),
(9, 'nikki', 'n', 'nag', 'nikki@gmail.com', '', '455555', 1994, 'adr1', 'adr2', 'adr3', 'state', 'US', 5555, '2015-11-22 04:56:33', '', '2015-11-22 04:56:33', '', 0),
(10, 'dddd', 'mmm', 'yyy', 'dmy@gmail.com', '', '555', 0, 'adl1', 'adr2', 'city', 'stat', 'US', 4444, '2015-11-22 05:10:46', '', '2015-11-22 05:10:46', '', 0),
(11, 'hhh', 'aaa', 'tttt', 'email@ooty.com', '', '55555', 2015, 'addr', 'addr', 'city', 'state', 'US', 45555, '2015-11-22 05:16:00', '', '2015-11-22 05:16:00', '', 0),
(12, 'uma', 'tandra', 'mahabi', 'uma@gmail.com', '', '455555', 1990, 'adr', 'adr2', 'city', 'state', 'US', 560085, '2015-11-22 07:56:38', '', '2015-11-22 07:56:38', '', 0),
(21, 'wf', 'wef', 'wef', 'wrg', '', 'wrg', 0, 'rg', 'wrg', 'g', 'weg', 'US', 0, '2015-11-22 08:45:23', '', '2015-11-22 08:45:23', '', 0),
(22, 'pavani', 'satyu', 'Vellal', 'google@gmail.com', '', '4088935367', 0, 'Casabella common', 'addrl2', 'Fremont', 'CA', 'US', 94539, '2015-11-23 00:50:53', '', '2015-11-27 06:52:47', '', 0),
(23, 'sayori', 'a', 'b', 'sayori@haha.com', '', '4555555', 1993, 'addr1', 'addr2', 'city', 'state', 'US', 45555, '2015-11-23 00:57:48', '', '2015-11-23 00:57:48', '', 0),
(24, 'aaaa', 'bbbb', 'bbbb', 'email@email.com', '', '88', 2015, 'nn', 'nn', 'nn', 'nn', 'US', 999, '2015-11-23 02:12:36', '', '2015-11-23 02:12:36', '', 0),
(26, 'haha', 'haha', 'haha', 'rr@dhhd.com', '', '888', 1990, '888', 'kjdbc', 'asid', 'aosdhv', 'US', 454, '2015-11-23 04:57:30', '', '2015-11-23 04:57:30', '', 0),
(29, 'priya', 'darshini', 'shivanna', 'email@helloemail.com', '', '444', 1990, 'kk', 'kk', 'kk', 'kk', 'US', 55, '2015-11-23 07:14:16', '', '2015-11-23 07:14:16', '', 0),
(30, 'Preeti', 'Mohan', 'Patne', 'preeti@gmail.com', '', '4556993658', 1992, 'Addr1', 'Addr2', 'City', 'State', 'US', 0, '2015-12-01 07:49:58', '', '2015-12-01 07:49:58', '', 0),
(31, 'Sayori', 'T', 'Patel', 'sayori@gmail.com', '', '4559663657', 1993, 'Addr1', 'Addr2', 'City', 'State', 'US', 0, '2015-12-02 07:54:51', '', '2015-12-02 07:54:51', '', 0),
(32, 'Anu', 'S', 'D', 'anu@gmail.com', '', '4555444444', 2012, 'addr1', 'addr2', 'city', 'state', 'US', 0, '2015-12-02 08:00:26', '', '2015-12-02 08:00:26', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `status`) VALUES
(1, 'Product1', 'product_image1.jpg', 10.00, 1),
(2, 'Product2', 'product_image2.jpg', 50.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE IF NOT EXISTS `sales_order` (
  `so_no` int(10) NOT NULL COMMENT 'Sales Order Number',
  `ut_id` varchar(18) NOT NULL COMMENT 'unit id',
  `cust_id` int(11) NOT NULL COMMENT 'customer id',
  `tw_id` varchar(5) NOT NULL COMMENT 'tower id',
  `type_id` varchar(10) NOT NULL COMMENT 'type id',
  `ut_price` decimal(10,2) NOT NULL COMMENT 'unit price',
  `bill_plan` varchar(5) NOT NULL COMMENT 'bill plan',
  `cr_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'created on',
  `ch_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'last changed on',
  KEY `ut_id` (`ut_id`),
  KEY `cust_id` (`cust_id`),
  KEY `tw_id` (`tw_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `so_bill`
--

CREATE TABLE IF NOT EXISTS `so_bill` (
  `so_no` int(10) NOT NULL COMMENT 'Sale Order No.',
  `inst_no` int(10) NOT NULL COMMENT 'Installment No.',
  `pay_dt` date NOT NULL COMMENT 'payment date',
  `amt` decimal(7,2) NOT NULL COMMENT 'Rate of Interest',
  `int_amt` datetime NOT NULL COMMENT 'interest amount',
  `pay_stat` char(20) NOT NULL DEFAULT 'not paid' COMMENT 'payment status',
  `cr_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'created date',
  `ch_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'changed date'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='SO Bill Number';

-- --------------------------------------------------------

--
-- Table structure for table `tower`
--

CREATE TABLE IF NOT EXISTS `tower` (
  `tw_id` varchar(5) NOT NULL COMMENT 'tower ID',
  `name` varchar(50) NOT NULL COMMENT 'Description',
  `cr_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Created On',
  `ch_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Last Changed Date',
  `ct_by` char(50) NOT NULL COMMENT 'Created By',
  `ch_by` char(50) NOT NULL COMMENT 'Changed By',
  PRIMARY KEY (`tw_id`),
  UNIQUE KEY `tw_id` (`tw_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tower Tables';

--
-- Dumping data for table `tower`
--

INSERT INTO `tower` (`tw_id`, `name`, `cr_dt`, `ch_dt`, `ct_by`, `ch_by`) VALUES
('', '', '2015-11-24 08:14:20', '2015-11-24 08:14:20', '', ''),
('T001', 'Tower 1', '2015-11-24 08:09:39', '2015-11-25 07:13:09', '', ''),
('T002', 'Tower 2', '2015-11-24 08:13:09', '2015-11-24 08:13:09', '', ''),
('T003', 'Tower 3', '2015-11-25 07:27:19', '2015-11-25 07:27:19', '', ''),
('T004', 'Tower 4', '2015-11-24 23:49:14', '2015-11-24 23:49:14', '', ''),
('T005', 'Tower 5', '2015-11-24 23:53:33', '2015-11-24 23:53:33', '', ''),
('T006', 'Tower 6', '2015-11-24 23:55:32', '2015-11-24 23:55:32', '', ''),
('T007', 'Tower 7', '2015-11-24 23:56:45', '2015-11-24 23:56:45', '', ''),
('T008', 'Tower 8', '2015-11-25 05:35:40', '2015-11-25 05:35:40', '', ''),
('T009', 'Tower 9', '2015-12-01 07:53:59', '2015-12-01 07:53:59', '', ''),
('T010', 'Tower 10', '2015-11-29 08:09:46', '2015-11-29 08:09:46', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `type_id` varchar(10) NOT NULL COMMENT 'apartment type ID',
  `name` varchar(50) NOT NULL COMMENT 'description',
  `tw_id` varchar(5) NOT NULL COMMENT 'tower id',
  `price` decimal(7,2) NOT NULL COMMENT 'price per sqft',
  `cmts` varchar(300) NOT NULL COMMENT 'Comments',
  `cr_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'created date',
  `cr_by` char(50) NOT NULL COMMENT 'Created by',
  `ch_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'changed date',
  `ch_by` char(50) NOT NULL COMMENT 'changed by',
  PRIMARY KEY (`type_id`),
  UNIQUE KEY `type_id` (`type_id`),
  KEY `tw_id` (`tw_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='unit type table with price';

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `name`, `tw_id`, `price`, `cmts`, `cr_dt`, `cr_by`, `ch_dt`, `ch_by`) VALUES
('T001B1', 'Tower 1 Single Bedroom', 'T001', 170.00, '', '2015-11-25 03:54:43', '', '2015-11-28 19:33:06', ''),
('T001B2', 'Tower 1 Double Bedroom', 'T001', 180.00, '', '2015-11-25 05:36:37', '', '2015-11-28 19:33:17', ''),
('T002B1', 'Tower 2 Single Bedroom', 'T002', 160.00, '', '2015-11-25 03:55:40', '', '2015-11-28 19:33:30', '');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `ut_id` varchar(18) NOT NULL COMMENT 'Apartment ID',
  `type` varchar(100) NOT NULL COMMENT 'apartment type',
  `tw_id` varchar(5) DEFAULT NULL,
  `floor` int(11) NOT NULL COMMENT 'floor',
  `area` decimal(7,2) NOT NULL COMMENT 'Area in Sqft',
  `status` char(10) NOT NULL DEFAULT 'available' COMMENT 'available or sold',
  `cr_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Created On',
  `cr_by` char(50) NOT NULL COMMENT 'Created By',
  `ch_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Last Changed Date',
  `ch_by` char(50) NOT NULL COMMENT 'Last Changed By',
  PRIMARY KEY (`ut_id`),
  UNIQUE KEY `ut_id` (`ut_id`),
  KEY `tw_id` (`tw_id`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Apartment Details';

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`ut_id`, `type`, `tw_id`, `floor`, `area`, `status`, `cr_dt`, `cr_by`, `ch_dt`, `ch_by`) VALUES
('T0002B1002', 'T002B1', 'T002', 7, 890.00, 'sold', '2015-11-28 19:41:40', '', '2015-11-29 02:06:16', ''),
('T001B1001', 'T001B1', 'T001', 4, 1430.00, 'available', '2015-11-25 05:37:41', '', '2015-11-27 08:45:11', ''),
('T001B1002', 'T001B1', 'T001', 5, 455.00, 'available', '2015-11-28 19:20:01', '', '2015-11-28 19:20:01', ''),
('T002B1001', 'T002B1', 'T002', 7, 788.00, 'available', '2015-11-28 19:23:11', '', '2015-11-28 19:23:11', '');

-- --------------------------------------------------------

--
-- Table structure for table `user001`
--

CREATE TABLE IF NOT EXISTS `user001` (
  `ur_id` varchar(100) NOT NULL COMMENT 'user id',
  `password` varchar(70) NOT NULL COMMENT 'password',
  `f_nm` char(50) NOT NULL COMMENT 'First Name',
  `m_nm` char(50) NOT NULL COMMENT 'Middle Name',
  `l_nm` char(50) NOT NULL COMMENT 'Last Name',
  `ur_type` varchar(50) NOT NULL DEFAULT 'customer' COMMENT 'user type',
  `cr_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'created date',
  `cr_by` varchar(100) NOT NULL COMMENT 'created by',
  `ch_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'last changed date',
  `ch_by` varchar(100) NOT NULL COMMENT 'last changed by',
  PRIMARY KEY (`ur_id`),
  UNIQUE KEY `ur_id` (`ur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='users table';

--
-- Dumping data for table `user001`
--

INSERT INTO `user001` (`ur_id`, `password`, `f_nm`, `m_nm`, `l_nm`, `ur_type`, `cr_dt`, `cr_by`, `ch_dt`, `ch_by`) VALUES
('anu@gmail.com', 'password', 'Anu', 'S', 'D', 'customer', '2015-12-02 08:00:25', 'root@localhost', '2015-12-02 08:00:25', ''),
('pavani@gmail.com', 'password', 'Pavani', 'Satyu', 'Vellal', 'sales', '2015-11-25 09:24:38', 'root@localhost', '2015-12-01 12:25:24', ''),
('pavanifall15@gmail.com', 'password', 'Pavani', 'Satyu', 'Vellal', 'customer', '2015-11-26 02:06:17', 'root@localhost', '2015-12-02 08:02:36', ''),
('preeti@gmail.com', 'password', 'preeti', 'mohan', 'patne', 'customer', '2015-12-01 07:49:58', '', '2015-12-01 11:51:44', ''),
('sayori@gmail.com', 'password', 'Sayori', 'T', 'Patel', 'customer', '2015-12-02 07:54:51', '', '2015-12-02 08:02:00', ''),
('tmadmin@tm.com', 'password', 'TM', 'Builder', 'Admin', 'admin', '2015-12-01 11:50:08', 'root@localhost', '2015-12-01 11:50:08', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD CONSTRAINT `sales_order_ibfk_1` FOREIGN KEY (`ut_id`) REFERENCES `unit` (`ut_id`),
  ADD CONSTRAINT `sales_order_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`),
  ADD CONSTRAINT `sales_order_ibfk_3` FOREIGN KEY (`tw_id`) REFERENCES `tower` (`tw_id`);

--
-- Constraints for table `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `type_ibfk_1` FOREIGN KEY (`tw_id`) REFERENCES `tower` (`tw_id`);

--
-- Constraints for table `unit`
--
ALTER TABLE `unit`
  ADD CONSTRAINT `unit_ibfk_1` FOREIGN KEY (`tw_id`) REFERENCES `tower` (`tw_id`),
  ADD CONSTRAINT `unit_ibfk_2` FOREIGN KEY (`type`) REFERENCES `type` (`type_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
