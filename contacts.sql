/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50717
Source Host           : 127.0.0.1:3306
Source Database       : addressbook

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2017-07-05 17:25:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for contacts
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(15) NOT NULL,
  `Sex` int(11) NOT NULL,
  `Mobile` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contacts
-- ----------------------------
INSERT INTO `contacts` VALUES ('18', 'Whaaa', '1', '333333');
INSERT INTO `contacts` VALUES ('20', 'Zemin Jiang ', '0', '123456788');
INSERT INTO `contacts` VALUES ('21', 'Baohua Zhang', '1', '55555');
