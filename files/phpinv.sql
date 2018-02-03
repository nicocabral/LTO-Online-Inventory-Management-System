/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : phpinv

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2016-01-31 15:36:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tborder`
-- ----------------------------
DROP TABLE IF EXISTS `tborder`;
CREATE TABLE `tborder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tborder
-- ----------------------------
INSERT INTO `tborder` VALUES ('2', 'srey vat', 'Phnom Penh', '2016-09-09');

-- ----------------------------
-- Table structure for `tborderdetail`
-- ----------------------------
DROP TABLE IF EXISTS `tborderdetail`;
CREATE TABLE `tborderdetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `amount` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tborderdetail
-- ----------------------------
INSERT INTO `tborderdetail` VALUES ('1', '2', 'apple', '2', '5', '10');
INSERT INTO `tborderdetail` VALUES ('2', '2', 'banana', '3', '6', '18');
