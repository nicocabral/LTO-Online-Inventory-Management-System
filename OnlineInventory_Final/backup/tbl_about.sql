-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 15, 2016 at 09:00 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lto`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE IF NOT EXISTS `tbl_about` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `heading` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`id`, `heading`, `description`) VALUES
(1, 'Land Transportation Office (LTO) Mandate and Main Functions', 'Inspection and Registration of Motor Vehicles\r\n<li>Issuance of Licenses and Permits</li>\r\n<li>Enforcement of Land Transportation Rules and Regulations</li>\r\n<li>Adjudication of Traffic Cases</li>\r\n<li>Collection of Revenues for the Government</li>'),
(2, 'Land Transportation Office (LTO) Vision', 'A FRONT LINE GOVERNMENT AGENCY SHOWCASING FAST AND EFFICIENT PUBLIC SERVICE FOR A PROGRESSIVE LAND TRANSPORT SECTOR.'),
(3, 'Land Transportation Office (LTO) Mission', 'Rationalize the land transportation services and facilities and to effectively implement the various transportation laws, rules and regulations. It is the responsibility of those involved in the public service to be more vigilant in their part in the over-all development scheme of the national leadership. Hence, promotion of safety and comfort in land travel is a continuing commitment of the LTO.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
