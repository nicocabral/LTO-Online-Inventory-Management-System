-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 11, 2016 at 04:53 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lto`
--
CREATE DATABASE IF NOT EXISTS `lto` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lto`;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `bal_qty` varchar(50) NOT NULL,
  `availability` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item`, `description`, `qty`, `bal_qty`, `availability`, `timestamp`) VALUES
(1, 'ballpen', 'red,blue,black', '12', '12', 'available', '2016-02-07 02:45:04'),
(2, 'sample', 'sample', '0', '0', 'Out of Stock', '2016-02-07 02:46:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employees`
--

CREATE TABLE IF NOT EXISTS `tbl_employees` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(25) NOT NULL,
  `emp_dept` varchar(50) NOT NULL,
  `emp_salary` varchar(7) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_employees`
--

INSERT INTO `tbl_employees` (`emp_id`, `emp_name`, `emp_dept`, `emp_salary`, `status`) VALUES
(1, 'Nico Cabral', 'Tacloban City', '0936942', 'Active'),
(6, 'Juan Delacruz', 'Tacloban City', '1234566', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventory`
--

CREATE TABLE IF NOT EXISTS `tbl_inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemno` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `stock_no` varchar(200) NOT NULL,
  `unit_measure` varchar(200) NOT NULL,
  `unit_value` varchar(200) NOT NULL,
  `bal_percard` varchar(200) NOT NULL,
  `ohpc_qty` varchar(200) NOT NULL,
  `ohpc_serialno` varchar(200) NOT NULL,
  `s_o_qty` varchar(200) NOT NULL,
  `s_o_value` varchar(200) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requestitem`
--

CREATE TABLE IF NOT EXISTS `tbl_requestitem` (
  `request_id` int(20) NOT NULL AUTO_INCREMENT,
  `itemno` int(20) NOT NULL,
  `itemname` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `qty` int(20) NOT NULL,
  `requestby` varchar(20) NOT NULL,
  `date_request` date NOT NULL,
  `date_claim` date NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `tbl_requestitem`
--

INSERT INTO `tbl_requestitem` (`request_id`, `itemno`, `itemname`, `description`, `qty`, `requestby`, `date_request`, `date_claim`, `status`) VALUES
(18, 12, 'Bondpaper', 'Paper One', 1, 'nico cabral', '2016-02-09', '2016-02-09', 'reject'),
(27, 1, 'Ballpen', 'HBW Black', 45, 'dex', '2016-02-19', '2016-02-10', 'reject'),
(28, 13, 'Sliding folder', 'Plastic, Blue, Red, Green', 5, 'Nico Cabral', '2016-02-12', '2016-02-11', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE IF NOT EXISTS `tbl_supplier` (
  `suppno` int(11) NOT NULL AUTO_INCREMENT,
  `suppname` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`suppno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`suppno`, `suppname`, `address`, `contact`, `status`) VALUES
(3, 'Juan Dela Cruz', 'Tacloban City', '+639062342342', 'Active'),
(5, 'sample', 'Tacloban City', '+639051234567', 'Single');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplies`
--

CREATE TABLE IF NOT EXISTS `tbl_supplies` (
  `itemno` int(10) NOT NULL AUTO_INCREMENT,
  `stock_no` varchar(100) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `itemname` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `unit_cost` int(20) NOT NULL,
  `total_cost` int(20) NOT NULL,
  `supplier` varchar(40) NOT NULL,
  `remaining_supply` varchar(20) NOT NULL,
  `arrival_date` date NOT NULL,
  PRIMARY KEY (`itemno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_supplies`
--

INSERT INTO `tbl_supplies` (`itemno`, `stock_no`, `qty`, `unit`, `itemname`, `description`, `unit_cost`, `total_cost`, `supplier`, `remaining_supply`, `arrival_date`) VALUES
(1, '001', '1pc', 'Box', 'Ballpen', 'HBW Black, Red, Blue', 100, 100, 'Nico Cabral', '10', '2016-02-08'),
(12, '002', '5pc', 'Rim', 'Bondpaper', 'Paper One', 100, 100, 'Nico cabral', '35', '2016-02-05'),
(13, '003', '5pc', 'Box', 'Sliding folder', 'Plastic, Blue, Red, Green', 10, 10, 'Nico cabral', '45', '2016-02-11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `position` varchar(20) NOT NULL,
  `office` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `userpic` varchar(200) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `address`, `contact`, `position`, `office`, `username`, `password`, `userpic`, `user_type`) VALUES
(1, 'Nico Cabral', 'Tacloban City', '09369420867', 'Programmer', 'LTO', 'admin', 'admin', '557724.jpg', 'admin'),
(3, 'Juan Dela Cruz', 'Tacloban City', '09463285342', 'Manager', 'LTO', 'juan', 'juan', '73620.jpg', 'user'),
(4, 'Joe Fernandez', 'Tacloban City', '09463285342', 'System analyst', 'LTO', 'user', 'user', '311693.jpg', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
