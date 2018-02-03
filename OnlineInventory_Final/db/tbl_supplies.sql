-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 08, 2016 at 12:08 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ois`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplies`
--

CREATE TABLE IF NOT EXISTS `tbl_supplies` (
  `itemno` int(10) NOT NULL AUTO_INCREMENT,
  `unit` varchar(20) NOT NULL,
  `itemname` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `unit_cost` int(20) NOT NULL,
  `total_cost` int(20) NOT NULL,
  `supplier` varchar(40) NOT NULL,
  `remaining_supply` varchar(20) NOT NULL,
  `arrival_date` date NOT NULL,
  PRIMARY KEY (`itemno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_supplies`
--

INSERT INTO `tbl_supplies` (`itemno`, `unit`, `itemname`, `description`, `unit_cost`, `total_cost`, `supplier`, `remaining_supply`, `arrival_date`) VALUES
(3, 'PIECE', 'Ballpen', 'blue', 231, 234, 'One Vale', '2', '2016-02-08'),
(4, 'asdas', 'asdas', 'dasdas', 231, 0, 'Three Vale', '123', '2016-02-08');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
