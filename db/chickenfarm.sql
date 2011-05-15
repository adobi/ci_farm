/*
Navicat MySQL Data Transfer

Source Server         : _localhost
Source Server Version : 50133
Source Host           : localhost:3306
Source Database       : chickenfarm

Target Server Type    : MYSQL
Target Server Version : 50133
File Encoding         : 65001

Date: 2011-05-15 15:03:22
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `breeder`
-- ----------------------------
DROP TABLE IF EXISTS `breeder`;
CREATE TABLE `breeder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `cell` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of breeder
-- ----------------------------
INSERT INTO `breeder` VALUES ('1', 'dobi attila', '06531231122', '06705301132', 'hello.attila@gmail.com');
INSERT INTO `breeder` VALUES ('2', 'zivat arnold', '06531231122', '06705301132', 'dobiattila@gmail.com');
INSERT INTO `breeder` VALUES ('3', 'alma máter', '06531231122', '06705301132', 'zsuzsa.kassay@gmail.com');

-- ----------------------------
-- Table structure for `breeder_site`
-- ----------------------------
DROP TABLE IF EXISTS `breeder_site`;
CREATE TABLE `breeder_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) DEFAULT NULL,
  `mgszh` varchar(10) DEFAULT NULL,
  `postal_code_id` int(11) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `description` text,
  `breeder_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_breeder_site_breeder` (`breeder_id`),
  KEY `fk_breeder_site_postal_code` (`postal_code_id`),
  CONSTRAINT `fk_breeder_site_breeder` FOREIGN KEY (`breeder_id`) REFERENCES `breeder` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_breeder_site_postal_code` FOREIGN KEY (`postal_code_id`) REFERENCES `postal_code` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of breeder_site
-- ----------------------------

-- ----------------------------
-- Table structure for `chicken_type`
-- ----------------------------
DROP TABLE IF EXISTS `chicken_type`;
CREATE TABLE `chicken_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chicken_type
-- ----------------------------
INSERT INTO `chicken_type` VALUES ('1', 'pirosnyaku babos', '1001');
INSERT INTO `chicken_type` VALUES ('2', 'sarga hatu', '1002');
INSERT INTO `chicken_type` VALUES ('3', 'feher', '1003');
INSERT INTO `chicken_type` VALUES ('4', 'foltos', '1004');

-- ----------------------------
-- Table structure for `egg_type`
-- ----------------------------
DROP TABLE IF EXISTS `egg_type`;
CREATE TABLE `egg_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of egg_type
-- ----------------------------
INSERT INTO `egg_type` VALUES ('5', '301', 'nagy');
INSERT INTO `egg_type` VALUES ('6', '40', 'óriási');
INSERT INTO `egg_type` VALUES ('8', '20', 'közepes');
INSERT INTO `egg_type` VALUES ('14', '10', 'kicsi');

-- ----------------------------
-- Table structure for `postal_code`
-- ----------------------------
DROP TABLE IF EXISTS `postal_code`;
CREATE TABLE `postal_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of postal_code
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '0cc175b9c0f1b6a831c399e269772661', '1');
