/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : basicphp

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2016-01-31 14:36:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbstudent`
-- ----------------------------
DROP TABLE IF EXISTS `tbstudent`;
CREATE TABLE `tbstudent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_name` varchar(80) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pob` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbstudent
-- ----------------------------
INSERT INTO `tbstudent` VALUES ('1', 'chetra', '1', '2016-01-31', 'kampong cham province', 'Phnom penh', '02398238238', '1');
INSERT INTO `tbstudent` VALUES ('2', 'Srey Vat', '0', '1991-09-07', 'Kampong Thom province', 'Phnom penh', '093243773666', '1');
INSERT INTO `tbstudent` VALUES ('4', 'modona', '1', '1991-09-07', 'pp', 'pp', '02398238238', '1');
