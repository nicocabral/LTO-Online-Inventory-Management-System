-- MySQL dump 10.13  Distrib 5.6.12, for Win64 (x86_64)
--
-- Host: localhost    Database: lto
-- ------------------------------------------------------
-- Server version	5.6.12-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `bal_qty` varchar(50) NOT NULL,
  `availability` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,'ballpen','red,blue,black','12','12','available','2016-02-07 02:45:04'),(2,'sample','sample','0','0','Out of Stock','2016-02-07 02:46:17');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_about`
--

DROP TABLE IF EXISTS `tbl_about`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_about` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `heading` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_about`
--

LOCK TABLES `tbl_about` WRITE;
/*!40000 ALTER TABLE `tbl_about` DISABLE KEYS */;
INSERT INTO `tbl_about` VALUES (1,'Land Transportation Office (LTO) Mandate and Main Functions','Inspection and Registration of Motor Vehicles\r\n<li>Issuance of Licenses and Permits</li>\r\n<li>Enforcement of Land Transportation Rules and Regulations</li>\r\n<li>Adjudication of Traffic Cases</li>\r\n<li>Collection of Revenues for the Government</li>'),(2,'Land Transportation Office (LTO) Vision','A FRONT LINE GOVERNMENT AGENCY SHOWCASING FAST AND EFFICIENT PUBLIC SERVICE FOR A PROGRESSIVE LAND TRANSPORT SECTOR.'),(3,'Land Transportation Office (LTO) Mission','Rationalize the land transportation services and facilities and to effectively implement the various transportation laws, rules and regulations. It is the responsibility of those involved in the public service to be more vigilant in their part in the over-all development scheme of the national leadership. Hence, promotion of safety and comfort in land travel is a continuing commitment of the LTO.');
/*!40000 ALTER TABLE `tbl_about` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_employees`
--

DROP TABLE IF EXISTS `tbl_employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_employees` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(25) NOT NULL,
  `emp_dept` varchar(50) NOT NULL,
  `emp_salary` varchar(7) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_employees`
--

LOCK TABLES `tbl_employees` WRITE;
/*!40000 ALTER TABLE `tbl_employees` DISABLE KEYS */;
INSERT INTO `tbl_employees` VALUES (1,'Nico Cabral','Tacloban City','0936942','Active'),(6,'Juan Delacruz','Tacloban City','1234566','Active');
/*!40000 ALTER TABLE `tbl_employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_inventory`
--

DROP TABLE IF EXISTS `tbl_inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_inventory`
--

LOCK TABLES `tbl_inventory` WRITE;
/*!40000 ALTER TABLE `tbl_inventory` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_requestitem`
--

DROP TABLE IF EXISTS `tbl_requestitem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_requestitem` (
  `request_id` int(20) NOT NULL AUTO_INCREMENT,
  `itemno` int(20) NOT NULL,
  `itemname` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `remaining_qty` int(20) NOT NULL,
  `qty` int(20) NOT NULL,
  `requestby` varchar(20) NOT NULL,
  `date_request` varchar(50) NOT NULL,
  `date_claim` date NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_requestitem`
--

LOCK TABLES `tbl_requestitem` WRITE;
/*!40000 ALTER TABLE `tbl_requestitem` DISABLE KEYS */;
INSERT INTO `tbl_requestitem` VALUES (48,1,'Ballpen','HBW Black, Red, Blue',98,2,'Dexter Tapacion','02-15-2016','2016-02-17','completed'),(49,1,'Ballpen','HBW Black, Red, Blue',96,2,'Dexter Tapacion','02-15-2016','2016-02-16','completed'),(51,1,'Ballpen','HBW Black, Red, Blue',93,3,'Nico Cabral','02-15-2016','2016-02-17','completed'),(59,12,'Bondpaper','Paper One',25,1,'Dexter Tapacion','02-15-2016','2016-02-16','completed'),(60,12,'Bondpaper','Paper One',23,2,'Maria Clara','02-15-2016','2016-02-18','completed'),(61,12,'Bondpaper','Paper One',22,1,'Apple','02-15-2016','2016-03-17','completed'),(62,1,'Ballpen','HBW Black, Red, Blue',92,1,'Dexter Tapacion','02-15-2016','2016-03-05','completed'),(63,15,'Sliding Folder','Plastic, Blue, Red, Green',98,2,'Nico Cabral','2016-02-16','2016-02-18','completed');
/*!40000 ALTER TABLE `tbl_requestitem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_supplier`
--

DROP TABLE IF EXISTS `tbl_supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_supplier` (
  `suppno` int(11) NOT NULL AUTO_INCREMENT,
  `suppname` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`suppno`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_supplier`
--

LOCK TABLES `tbl_supplier` WRITE;
/*!40000 ALTER TABLE `tbl_supplier` DISABLE KEYS */;
INSERT INTO `tbl_supplier` VALUES (3,'XYZ Incorpoted','Cebu City','+639062342342','Active'),(5,'ABC Company','Quezon City, Manila','+639051234567','Active');
/*!40000 ALTER TABLE `tbl_supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_supplies`
--

DROP TABLE IF EXISTS `tbl_supplies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_supplies` (
  `itemno` int(10) NOT NULL AUTO_INCREMENT,
  `stock_no` varchar(100) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `itemname` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `unit_cost` int(20) NOT NULL,
  `supplier` varchar(40) NOT NULL,
  `remaining_supply` varchar(20) NOT NULL,
  `arrival_date` date NOT NULL,
  `serial_no` varchar(20) NOT NULL,
  PRIMARY KEY (`itemno`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_supplies`
--

LOCK TABLES `tbl_supplies` WRITE;
/*!40000 ALTER TABLE `tbl_supplies` DISABLE KEYS */;
INSERT INTO `tbl_supplies` VALUES (1,'001','1','Box','Ballpen','HBW Black, Red, Blue',100,'Nico Cabral','92','2016-02-08','SN-23423'),(12,'002','5','Rim','Bondpaper','Paper One',100,'Nico cabral','22','2016-02-05','SN-08451'),(15,'STN-9595-2016','10','Box','Sliding Folder','Plastic, Blue, Red, Green',450,'Juan Dela Cruz','98','2016-02-16','SN-51255-77');
/*!40000 ALTER TABLE `tbl_supplies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Nico Cabral','Tacloban City','09369420867','Programmer','LTO','admin','admin','557724.jpg','admin'),(3,'Juan Dela Cruz','Tacloban City','09463285342','Manager','LTO','juan','juan','73620.jpg','user'),(4,'Joe Fernandez','Tacloban City','09463285342','System analyst','LTO','user','user','311693.jpg','user');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-16  2:19:52
