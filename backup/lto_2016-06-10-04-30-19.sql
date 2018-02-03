-- MySQL dump 10.13  Distrib 5.6.12, for Win32 (x86)
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_employees`
--

LOCK TABLES `tbl_employees` WRITE;
/*!40000 ALTER TABLE `tbl_employees` DISABLE KEYS */;
INSERT INTO `tbl_employees` VALUES (1,'Nico Cabral','Tacloban City','0936942','Active'),(7,'Jeancen Sayoc','Tacloban City','0936942','Active');
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
  `stock_no` int(11) NOT NULL,
  `itemname` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `qty` int(20) NOT NULL,
  `req_id` varchar(50) NOT NULL,
  `requestby` varchar(20) NOT NULL,
  `remaining_qty` int(11) NOT NULL,
  `division_office` varchar(100) NOT NULL,
  `approved_by` varchar(100) NOT NULL,
  `date_request` date NOT NULL,
  `date_claim` date NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_requestitem`
--

LOCK TABLES `tbl_requestitem` WRITE;
/*!40000 ALTER TABLE `tbl_requestitem` DISABLE KEYS */;
INSERT INTO `tbl_requestitem` VALUES (54,13,0,'Sliding folder','Plastic, Blue, Red, Green',1,'3','Juan Dela Cruz',11,'LTO R08','Nico Cabral','2016-02-15','2016-02-15','completed'),(58,13,3,'Sliding folder','Plastic, Blue, Red, Green',1,'6','Arzel',10,'LTO R08','Nico Cabral','2016-02-16','2016-02-16','completed'),(59,14,123,'Rain coats','Plastic raincoats',10,'4','Joe Fernandez',90,'LTO R08','Nico Cabral','2016-02-16','2016-02-16','completed'),(60,14,123,'Rain coats','Plastic raincoats',10,'7','Sychell',90,'LTO R08','Nico Cabral','2016-02-16','2016-02-16','approved'),(61,1,1,'Ballpen, Signpen','HBW Black, Red, Blue',10,'3','Juan Dela Cruz',40,'LTO R08','Nico Cabral','2016-02-16','2016-02-16','completed'),(62,13,3,'Sliding folder','Plastic, Blue, Red, Green',1,'4','Juan Dela Cruz',10,'LTO R08','Nico Cabral','2016-02-16','2016-02-16','completed'),(63,1,1,'Ballpen, Signpen','HBW Black, Red, Blue',40,'3','Juan Dela Cruz',10,'LTO R08','Nico Cabral','2016-02-16','2016-02-16','completed'),(64,1,1,'Ballpen, Signpen','HBW Black, Red, Blue',10,'3','Juan Dela Cruz',40,'LTO R08','Nico Cabral','2016-02-16','2016-02-16','completed'),(65,12,2,'Bondpaper A4','Paper One',40,'3','Juan Dela Cruz',10,'LTO R08','Nico Cabral','2016-02-16','2016-02-16','completed'),(66,1,1,'Ballpen, Signpen','HBW Black, Red, Blue',25,'6','Arzel',25,'LTO R08','Sychell','2016-02-16','2016-02-16','completed'),(67,19,999,'Pencil','Mongol 2',10,'3','Juan Dela Cruz',90,'LTO R08','Sychell','2016-02-18','2016-02-18','completed'),(68,12,2,'Bondpaper A4','Paper One',3,'8','Cheska',92,'Lto','Sychell','2016-02-20','2016-02-18','completed'),(69,12,2,'Bondpaper A4','Paper One',6,'8','Cheska',86,'Lto','Sychell','2016-02-23','2016-02-18','completed'),(70,1,1,'Ballpen, Signpen','HBW Black, Red, Blue',1,'3','Juan Dela Cruz',24,'LTO R08','Sychell','2016-02-18','2016-02-18','approved'),(71,1,1,'Ballpen, Signpen','HBW Black, Red, Blue',14,'3','Nico Cabral',10,'Programmer','Sychell','2016-04-17','2016-04-17','approved'),(72,18,9,'Yello Paper','Yellow Paper',24,'8','Cheska Uy',76,'LTO R08','Sychell','2016-04-17','2016-04-17','approved'),(73,16,1234,'Transparent tape','Transparent tape',12,'8','Cheska Uy',0,'Tacloban City','Sychell','2016-04-17','2016-04-17','approved');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_supplier`
--

LOCK TABLES `tbl_supplier` WRITE;
/*!40000 ALTER TABLE `tbl_supplier` DISABLE KEYS */;
INSERT INTO `tbl_supplier` VALUES (3,'Sychell Marketing Co','Tacloban City','+639062342342','Active'),(8,'Reynas Toyland','Tacloban City','+639051234567','Active'),(9,'Arzel Marketing Corp','Tacloban City','+63905098765','Active'),(10,'Johnny Johnny Market','Yes Papa','+639061234567','Active');
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_supplies`
--

LOCK TABLES `tbl_supplies` WRITE;
/*!40000 ALTER TABLE `tbl_supplies` DISABLE KEYS */;
INSERT INTO `tbl_supplies` VALUES (1,'001','50','Box','Ballpen, Signpen','HBW Black, Red, Blue',50,'Arzel Marketing Corp','24','2016-04-17','00123-123'),(12,'002','100','Rim','Bondpaper A4','Paper One',90,'Juan Dela Cruz','86','2016-02-16','098678-1111'),(13,'003','20','Box','Sliding folder','Plastic, Blue, Red, Green',250,'Nico Cabral','19','2016-02-16','12345-09876'),(14,'123','50','Plastic bag(s)','Rain coats','Plastic raincoats',20,'Nico Cabral','50','2016-02-16','2222-1123'),(16,'1234','5','Roll','Transparent tape','Transparent tape',5,'Reynas Toyland','24','2016-04-17','4456-1029'),(18,'009','100','Box','Yello Paper','Yellow Paper',36,'Johnny Johnny','76','2016-02-16','0991-1234'),(19,'999','100','Box','Pencil','Mongol 2',6,'Dexter Tapacion','90','2016-02-16','9998-001');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Sychell','Tacloban City','09369420867','Programmer','LTO','admin','admin','557724.jpg','admin'),(3,'Juan Dela Cruz','Tacloban City','09463285342','Manager','LTO','juan','juan','91942.jpg','user'),(6,'Arzel','Tacloban City','09369420867','System analyst','LTO','arzel','arzel','809700.jpg','user'),(7,'Sychell','San Jose','09275729472','Database Designer','LTO Region VIII','sychell','sychell','968634.jpg','user'),(8,'Cheska','Tacloban city','09369420967','Database','Lto','Cheska','Cheska','1000000.jpg','user');
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

-- Dump completed on 2016-06-10 12:30:20
