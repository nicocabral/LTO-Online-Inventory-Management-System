-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 12, 2016 at 04:48 AM
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
  `req_id` varchar(50) NOT NULL,
  `requestby` varchar(20) NOT NULL,
  `division_office` varchar(100) NOT NULL,
  `approved_by` varchar(100) NOT NULL,
  `date_request` date NOT NULL,
  `date_claim` date NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `tbl_requestitem`
--

INSERT INTO `tbl_requestitem` (`request_id`, `itemno`, `itemname`, `description`, `qty`, `req_id`, `requestby`, `division_office`, `approved_by`, `date_request`, `date_claim`, `status`) VALUES
(38, 15, 'ballpen', 'blue', 6, '3', 'Juan Dela Cruz', 'LTO R08', 'Nico Cabral', '2016-02-12', '2016-02-12', 'approved'),
(40, 13, 'Sliding folder', 'Plastic, Blue, Red, Green', 5, '3', 'Juan Dela Cruz', 'LTO R08', 'Nico Cabral', '2016-02-12', '2016-02-12', 'reject');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`suppno`, `suppname`, `address`, `contact`, `status`) VALUES
(3, 'Juan Dela Cruz', 'Tacloban City', '+639062342342', 'Active'),
(7, 'Jeancen Sayoc', 'Tacloban City', '+639051234567', 'Active'),
(8, 'Nico Cabral', 'Tacloban City', '+639051234567', 'Active'),
(9, 'Dexter Tapacion', 'Tacloban City', '+63905098765', 'Active');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_supplies`
--

INSERT INTO `tbl_supplies` (`itemno`, `stock_no`, `qty`, `unit`, `itemname`, `description`, `unit_cost`, `total_cost`, `supplier`, `remaining_supply`, `arrival_date`) VALUES
(1, '001', '1pc', 'Box', 'Ballpen', 'HBW Black, Red, Blue', 100, 100, 'Nico Cabral', '2', '2016-02-08'),
(12, '002', '5pc', 'Rim', 'Bondpaper', 'Paper One', 100, 100, 'Nico cabral', '30', '2016-02-05'),
(13, '003', '5pc', 'Box', 'Sliding folder', 'Plastic, Blue, Red, Green', 10, 10, 'Nico cabral', '40', '2016-02-11'),
(14, '123', '12pc', 'Plastic bag(s)', 'Rain coats', 'Plastic raincoats', 250, 250, 'Juan Dela Cruz', '20', '2016-02-12'),
(15, '234', '2', 'Box', 'ballpen', 'blue', 100, 200, 'Juan Dela Cruz', '20', '2016-02-11');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `address`, `contact`, `position`, `office`, `username`, `password`, `userpic`, `user_type`) VALUES
(1, 'Nico Cabral', 'Tacloban City', '09369420867', 'Programmer', 'LTO', 'admin', 'admin', '557724.jpg', 'admin'),
(3, 'Juan Dela Cruz', 'Tacloban City', '09463285342', 'Manager', 'LTO', 'juan', 'juan', '91942.jpg', 'user'),
(4, 'Joe Fernandez', 'Tacloban City', '09463285342', 'System analyst', 'LTO', 'user', 'user', '311693.jpg', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
