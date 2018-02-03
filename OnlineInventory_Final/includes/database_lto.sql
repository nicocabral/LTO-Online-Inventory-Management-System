# MySQL database backup
#
# Generated: Saturday 13. February 2016 08:23 UTC
# Hostname: localhost
# Database: `lto`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `items`
# --------------------------------------------------------


#
# Delete any existing table `items`
#

DROP TABLE IF EXISTS `items`;


#
# Table structure of table `items`
#

CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `bal_qty` varchar(50) NOT NULL,
  `availability` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ;

#
# Data contents of table items (2 records)
#
 
INSERT INTO `items` VALUES (1, 'ballpen', 'red,blue,black', '12', '12', 'available', '2016-02-06 18:45:04') ; 
INSERT INTO `items` VALUES (2, 'sample', 'sample', '0', '0', 'Out of Stock', '2016-02-06 18:46:17') ;
#
# End of data contents of table items
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Saturday 13. February 2016 08:23 UTC
# Hostname: localhost
# Database: `lto`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `items`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_employees`
# --------------------------------------------------------


#
# Delete any existing table `tbl_employees`
#

DROP TABLE IF EXISTS `tbl_employees`;


#
# Table structure of table `tbl_employees`
#

CREATE TABLE `tbl_employees` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(25) NOT NULL,
  `emp_dept` varchar(50) NOT NULL,
  `emp_salary` varchar(7) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tbl_employees (2 records)
#
 
INSERT INTO `tbl_employees` VALUES (1, 'Nico Cabral', 'Tacloban City', '0936942', 'Active') ; 
INSERT INTO `tbl_employees` VALUES (6, 'Juan Delacruz', 'Tacloban City', '1234566', 'Active') ;
#
# End of data contents of table tbl_employees
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Saturday 13. February 2016 08:23 UTC
# Hostname: localhost
# Database: `lto`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `items`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_employees`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_inventory`
# --------------------------------------------------------


#
# Delete any existing table `tbl_inventory`
#

DROP TABLE IF EXISTS `tbl_inventory`;


#
# Table structure of table `tbl_inventory`
#

CREATE TABLE `tbl_inventory` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

#
# Data contents of table tbl_inventory (0 records)
#

#
# End of data contents of table tbl_inventory
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Saturday 13. February 2016 08:23 UTC
# Hostname: localhost
# Database: `lto`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `items`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_employees`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_inventory`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_requestitem`
# --------------------------------------------------------


#
# Delete any existing table `tbl_requestitem`
#

DROP TABLE IF EXISTS `tbl_requestitem`;


#
# Table structure of table `tbl_requestitem`
#

CREATE TABLE `tbl_requestitem` (
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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tbl_requestitem (6 records)
#
 
INSERT INTO `tbl_requestitem` VALUES (27, 1, 'Ballpen', 'HBW Black', 45, 'dex', '2016-02-19', '2016-02-10', 'reject') ; 
INSERT INTO `tbl_requestitem` VALUES (28, 13, 'Sliding folder', 'Plastic, Blue, Red, Green', 5, 'Nico Cabral', '2016-02-12', '2016-02-11', 'approved') ; 
INSERT INTO `tbl_requestitem` VALUES (30, 1, 'Ballpen', 'HBW Black, Red, Blue', 12, 'Dexter Tapacion', '2016-02-12', '2016-02-12', 'approved') ; 
INSERT INTO `tbl_requestitem` VALUES (31, 1, 'Ballpen', 'HBW Black, Red, Blue', 2, 'Juan', '2016-02-12', '2016-02-12', 'approved') ; 
INSERT INTO `tbl_requestitem` VALUES (33, 12, 'Bondpaper', 'Paper One', 6, 'jose', '2016-02-25', '2016-02-12', 'new') ; 
INSERT INTO `tbl_requestitem` VALUES (34, 1, 'Ballpen', 'HBW Black, Red, Blue', 1, 'Maria Clara', '2016-02-13', '2016-02-13', 'approved') ;
#
# End of data contents of table tbl_requestitem
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Saturday 13. February 2016 08:23 UTC
# Hostname: localhost
# Database: `lto`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `items`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_employees`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_inventory`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_requestitem`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_supplier`
# --------------------------------------------------------


#
# Delete any existing table `tbl_supplier`
#

DROP TABLE IF EXISTS `tbl_supplier`;


#
# Table structure of table `tbl_supplier`
#

CREATE TABLE `tbl_supplier` (
  `suppno` int(11) NOT NULL AUTO_INCREMENT,
  `suppname` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`suppno`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tbl_supplier (2 records)
#
 
INSERT INTO `tbl_supplier` VALUES (6, 'Juan Dela Cruz', 'Manila', '+639073465623', 'active') ; 
INSERT INTO `tbl_supplier` VALUES (7, 'Maria Clara', 'Tacloban City', '+639072344566', 'Active') ;
#
# End of data contents of table tbl_supplier
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Saturday 13. February 2016 08:23 UTC
# Hostname: localhost
# Database: `lto`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `items`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_employees`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_inventory`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_requestitem`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_supplier`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_supplies`
# --------------------------------------------------------


#
# Delete any existing table `tbl_supplies`
#

DROP TABLE IF EXISTS `tbl_supplies`;


#
# Table structure of table `tbl_supplies`
#

CREATE TABLE `tbl_supplies` (
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 ;

#
# Data contents of table tbl_supplies (3 records)
#
 
INSERT INTO `tbl_supplies` VALUES (1, '001', '1pc', 'Box', 'Ballpen', 'HBW Black, Red, Blue', 100, 100, 'Juan Dela Cruz', '19', '2016-02-11') ; 
INSERT INTO `tbl_supplies` VALUES (12, '002', '5pc', 'Rim', 'Bondpaper', 'Paper One', 100, 100, 'Nico cabral', '29', '2016-02-05') ; 
INSERT INTO `tbl_supplies` VALUES (13, '003', '5pc', 'Box', 'Sliding folder', 'Plastic, Blue, Red, Green', 10, 10, 'Nico cabral', '42', '2016-02-11') ;
#
# End of data contents of table tbl_supplies
# --------------------------------------------------------

# MySQL database backup
#
# Generated: Saturday 13. February 2016 08:23 UTC
# Hostname: localhost
# Database: `lto`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `items`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_employees`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_inventory`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_requestitem`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_supplier`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `tbl_supplies`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `user`
# --------------------------------------------------------


#
# Delete any existing table `user`
#

DROP TABLE IF EXISTS `user`;


#
# Table structure of table `user`
#

CREATE TABLE `user` (
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ;

#
# Data contents of table user (3 records)
#
 
INSERT INTO `user` VALUES (1, 'Nico Cabral', 'Tacloban City', '09369420867', 'Programmer', 'LTO', 'admin', 'admin', '557724.jpg', 'admin') ; 
INSERT INTO `user` VALUES (3, 'Juan Dela Cruz', 'Tacloban City', '09463285342', 'Manager', 'LTO', 'juan', 'juan', '73620.jpg', 'user') ; 
INSERT INTO `user` VALUES (4, 'Joe Fernandez', 'Tacloban City', '09463285342', 'System analyst', 'LTO', 'user', 'user', '311693.jpg', 'user') ;
#
# End of data contents of table user
# --------------------------------------------------------

