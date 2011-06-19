/*
Navicat MySQL Data Transfer

Source Server         : _localhost
Source Server Version : 50133
Source Host           : localhost:3306
Source Database       : chickenfarm

Target Server Type    : MYSQL
Target Server Version : 50133
File Encoding         : 65001

Date: 2011-06-19 16:56:16
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
INSERT INTO `breeder` VALUES ('3', 'alma máter', '06531231122', '06705301132', 'alma.mater@gmail.com');

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
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_breeder_site_breeder` (`breeder_id`),
  KEY `fk_breeder_site_postal_code` (`postal_code_id`),
  CONSTRAINT `fk_breeder_site_breeder` FOREIGN KEY (`breeder_id`) REFERENCES `breeder` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_breeder_site_postal_code` FOREIGN KEY (`postal_code_id`) REFERENCES `postal_code` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of breeder_site
-- ----------------------------
INSERT INTO `breeder_site` VALUES ('3', '14456', 'alma323', '421', 'alma utva 4', 'szep jo es minden ilyen', '3', 'Ebes 1');
INSERT INTO `breeder_site` VALUES ('4', '21123', 'izemize', '1310', 'kassai ut 65', '', '3', 'Ebes 2');

-- ----------------------------
-- Table structure for `chicken_stock`
-- ----------------------------
DROP TABLE IF EXISTS `chicken_stock`;
CREATE TABLE `chicken_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) DEFAULT NULL,
  `birth_date` datetime DEFAULT NULL,
  `chicken_type_id` int(11) DEFAULT NULL,
  `klass` varchar(5) DEFAULT NULL,
  `parent_male_code` varchar(45) DEFAULT NULL,
  `parent_male_code_2` varchar(45) DEFAULT NULL,
  `parent_female_code` varchar(45) DEFAULT NULL,
  `parent_female_code_2` varchar(45) DEFAULT NULL,
  `number_of_male` int(11) DEFAULT NULL,
  `number_of_female` int(11) DEFAULT NULL,
  `egg_code` varchar(45) DEFAULT NULL,
  `validity_date` datetime DEFAULT NULL,
  `buy_date` datetime DEFAULT NULL,
  `buyer_breeder_site_id` int(11) DEFAULT NULL,
  `fakk_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_chicken_type` (`chicken_type_id`),
  KEY `fk_buyer_breeder_site` (`buyer_breeder_site_id`),
  KEY `fk_fakk` (`fakk_id`),
  CONSTRAINT `fk_buyer_breeder_site_id` FOREIGN KEY (`buyer_breeder_site_id`) REFERENCES `breeder_site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_chicken_stock_fakk` FOREIGN KEY (`fakk_id`) REFERENCES `fakk` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `fk_chicken_type` FOREIGN KEY (`chicken_type_id`) REFERENCES `chicken_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chicken_stock
-- ----------------------------
INSERT INTO `chicken_stock` VALUES ('6', '21123', '2011-05-01 00:00:00', '1', 'V', '123', '(5c.2c.4n.7n) INTRA.FR.2009.0055972', '345', '(5c.2c.4n.7n) INTRA.FR.2009.0055972', '120', '100', 'c 4', '2011-09-01 00:00:00', null, null, null);
INSERT INTO `chicken_stock` VALUES ('7', '166725', '2011-04-01 00:00:00', '2', 'V', '123', '(5c.2c.4n.7n) INTRA.FR.2009.0055972', '345', '(5c.2c.4n.7n) INTRA.FR.2009.0055972', '110', '100', 'a 1', '2011-06-30 00:00:00', null, null, null);
INSERT INTO `chicken_stock` VALUES ('8', '1001', '2011-06-01 00:00:00', '4', 'V', '123', '(5c.2c.4n.7n) INTRA.FR.2009.0055972', '124', '(5c.2c.4n.7n) INTRA.FR.2009.0055972', '100', '120', 'c 1', '2011-08-31 00:00:00', null, null, '11');
INSERT INTO `chicken_stock` VALUES ('9', '1003', '2011-06-01 00:00:00', '2', 'V', '123', '(5c.2c.4n.7n) INTRA.FR.2009.0055972', '126', '(5c.2c.4n.7n) INTRA.FR.2009.0055972', '100', '120', 'a 3', '2011-06-30 00:00:00', null, null, '12');
INSERT INTO `chicken_stock` VALUES ('10', '1004', '2011-06-21 00:00:00', '2', 'III', '127', '(5c.2c.4n.7n) INTRA.FR.2009.0055972', '129', '(5c.2c.4n.7n) INTRA.FR.2009.0055972', '120', '250', 'd 3', '2011-10-25 00:00:00', null, null, '11');

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
-- Table structure for `egg_production`
-- ----------------------------
DROP TABLE IF EXISTS `egg_production`;
CREATE TABLE `egg_production` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conditioning_date` datetime DEFAULT NULL,
  `chicken_stock_id` int(11) DEFAULT NULL,
  `is_finished` int(11) DEFAULT NULL,
  `finish_date` datetime DEFAULT NULL,
  `rest_feed` int(11) DEFAULT NULL,
  `rest_feed_grain` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_egg_production_chicken_stock` (`chicken_stock_id`),
  CONSTRAINT `fk_egg_production_chicken_stock` FOREIGN KEY (`chicken_stock_id`) REFERENCES `chicken_stock` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of egg_production
-- ----------------------------
INSERT INTO `egg_production` VALUES ('1', '2011-06-07 20:02:15', '6', null, null, null, null);
INSERT INTO `egg_production` VALUES ('2', '2011-06-07 20:29:25', '7', null, null, null, null);
INSERT INTO `egg_production` VALUES ('3', '2011-06-18 21:09:16', '8', null, null, null, null);
INSERT INTO `egg_production` VALUES ('4', '2011-06-19 15:00:06', '9', null, null, null, null);
INSERT INTO `egg_production` VALUES ('5', '2011-06-19 16:48:34', '10', null, null, null, null);

-- ----------------------------
-- Table structure for `egg_production_data`
-- ----------------------------
DROP TABLE IF EXISTS `egg_production_data`;
CREATE TABLE `egg_production_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `egg_production_day_id` int(11) DEFAULT NULL,
  `egg_type_id` int(11) DEFAULT NULL,
  `piece` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_egg_production_data_egg_production_day` (`egg_production_day_id`),
  KEY `fk_egg_production_data_egg_type` (`egg_type_id`),
  CONSTRAINT `fk_egg_production_data_egg_production_day` FOREIGN KEY (`egg_production_day_id`) REFERENCES `egg_production_day` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_egg_production_data_egg_type` FOREIGN KEY (`egg_type_id`) REFERENCES `egg_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of egg_production_data
-- ----------------------------
INSERT INTO `egg_production_data` VALUES ('33', '11', '14', '10');
INSERT INTO `egg_production_data` VALUES ('34', '11', '8', '20');
INSERT INTO `egg_production_data` VALUES ('35', '11', '6', '30');
INSERT INTO `egg_production_data` VALUES ('36', '11', '5', '40');
INSERT INTO `egg_production_data` VALUES ('37', '11', '1', '50');
INSERT INTO `egg_production_data` VALUES ('38', '12', '14', '1');
INSERT INTO `egg_production_data` VALUES ('39', '12', '8', '2');
INSERT INTO `egg_production_data` VALUES ('40', '12', '6', '3');
INSERT INTO `egg_production_data` VALUES ('41', '12', '5', '4');
INSERT INTO `egg_production_data` VALUES ('42', '12', '1', '5');
INSERT INTO `egg_production_data` VALUES ('43', '13', '14', '11');
INSERT INTO `egg_production_data` VALUES ('44', '13', '8', '22');
INSERT INTO `egg_production_data` VALUES ('45', '13', '6', '33');
INSERT INTO `egg_production_data` VALUES ('46', '13', '5', '44');
INSERT INTO `egg_production_data` VALUES ('47', '13', '1', '55');
INSERT INTO `egg_production_data` VALUES ('48', '14', '14', '100');
INSERT INTO `egg_production_data` VALUES ('49', '14', '8', '200');
INSERT INTO `egg_production_data` VALUES ('50', '14', '6', '300');
INSERT INTO `egg_production_data` VALUES ('51', '14', '5', '400');
INSERT INTO `egg_production_data` VALUES ('52', '14', '1', '500');

-- ----------------------------
-- Table structure for `egg_production_day`
-- ----------------------------
DROP TABLE IF EXISTS `egg_production_day`;
CREATE TABLE `egg_production_day` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_date` datetime DEFAULT NULL,
  `egg_production_id` int(11) DEFAULT NULL,
  `dead_male` int(11) DEFAULT NULL,
  `reject_male` int(11) DEFAULT NULL,
  `dead_female` int(11) DEFAULT NULL,
  `reject_female` int(11) DEFAULT NULL,
  `feed_male` int(11) DEFAULT NULL,
  `feed_female` int(11) DEFAULT NULL,
  `feed_grain` int(11) DEFAULT NULL,
  `vitamin` varchar(150) DEFAULT NULL,
  `comment` text,
  PRIMARY KEY (`id`),
  KEY `fk_egg_production_egg_production_day` (`egg_production_id`),
  CONSTRAINT `fk_egg_production_egg_production_day` FOREIGN KEY (`egg_production_id`) REFERENCES `egg_production` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of egg_production_day
-- ----------------------------
INSERT INTO `egg_production_day` VALUES ('3', '2011-06-07 00:00:00', '2', null, null, null, null, null, null, null, null, null);
INSERT INTO `egg_production_day` VALUES ('4', '2011-06-07 00:00:00', '1', null, null, null, null, null, null, null, null, null);
INSERT INTO `egg_production_day` VALUES ('5', '2011-06-06 00:00:00', '1', null, null, null, null, '130', '120', '140', null, null);
INSERT INTO `egg_production_day` VALUES ('6', '2011-06-06 00:00:00', '2', null, null, null, null, null, null, null, null, 'piros\nkek\nsarga');
INSERT INTO `egg_production_day` VALUES ('9', '2011-06-08 00:00:00', '1', '20', '200', '10', '100', '100', '50', '150', 'asd asd', 'asd');
INSERT INTO `egg_production_day` VALUES ('10', '2011-06-08 00:00:00', '2', '10', '10', '10', '10', '2', '2', '2', null, null);
INSERT INTO `egg_production_day` VALUES ('11', '2011-06-13 00:00:00', '3', '21', '41', '11', '31', '2', '1', '3', null, null);
INSERT INTO `egg_production_day` VALUES ('12', '2011-06-13 00:00:00', '4', null, null, null, null, null, null, null, null, null);
INSERT INTO `egg_production_day` VALUES ('13', '2011-06-14 00:00:00', '3', null, null, null, null, null, null, null, null, null);
INSERT INTO `egg_production_day` VALUES ('14', '2011-06-13 00:00:00', '5', null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `egg_type`
-- ----------------------------
DROP TABLE IF EXISTS `egg_type`;
CREATE TABLE `egg_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of egg_type
-- ----------------------------
INSERT INTO `egg_type` VALUES ('1', '1000', 'termelői');
INSERT INTO `egg_type` VALUES ('5', '301', 'nagy');
INSERT INTO `egg_type` VALUES ('6', '40', 'óriási');
INSERT INTO `egg_type` VALUES ('8', '20', 'közepes');
INSERT INTO `egg_type` VALUES ('14', '10', 'kicsi');

-- ----------------------------
-- Table structure for `fakk`
-- ----------------------------
DROP TABLE IF EXISTS `fakk`;
CREATE TABLE `fakk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `breeder_site_id` int(11) DEFAULT NULL,
  `fakk_group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fakk_breeder_site` (`breeder_site_id`),
  KEY `fk_fakk_group` (`fakk_group_id`),
  CONSTRAINT `fk_fakk_fakk_group` FOREIGN KEY (`fakk_group_id`) REFERENCES `fakk_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fakk
-- ----------------------------
INSERT INTO `fakk` VALUES ('-1', null, null, null);
INSERT INTO `fakk` VALUES ('11', 'fakk1', null, '5');
INSERT INTO `fakk` VALUES ('12', 'fakk2', null, '5');

-- ----------------------------
-- Table structure for `fakk_feed`
-- ----------------------------
DROP TABLE IF EXISTS `fakk_feed`;
CREATE TABLE `fakk_feed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fakk_id` int(11) DEFAULT NULL,
  `to_date` datetime DEFAULT NULL,
  `feed_male` int(11) DEFAULT NULL,
  `feed_female` int(11) DEFAULT NULL,
  `feed_grain` int(11) DEFAULT NULL,
  `is_for_group` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `_feed_fakk` (`fakk_id`),
  CONSTRAINT `_feed_fakk` FOREIGN KEY (`fakk_id`) REFERENCES `fakk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fakk_feed
-- ----------------------------

-- ----------------------------
-- Table structure for `fakk_group`
-- ----------------------------
DROP TABLE IF EXISTS `fakk_group`;
CREATE TABLE `fakk_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `stock_yard_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fakk_group_breeder_site` (`stock_yard_id`),
  CONSTRAINT `fk_fakk_group_stock_yard` FOREIGN KEY (`stock_yard_id`) REFERENCES `stock_yard` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fakk_group
-- ----------------------------
INSERT INTO `fakk_group` VALUES ('5', 'fakkcsoport 1', '3');

-- ----------------------------
-- Table structure for `stock_yard`
-- ----------------------------
DROP TABLE IF EXISTS `stock_yard`;
CREATE TABLE `stock_yard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `breeder_site_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_stock_yard_breeder_site` (`breeder_site_id`),
  CONSTRAINT `fk_stock_yard_breeder_site` FOREIGN KEY (`breeder_site_id`) REFERENCES `breeder_site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stock_yard
-- ----------------------------
INSERT INTO `stock_yard` VALUES ('3', 'korte', '3');
INSERT INTO `stock_yard` VALUES ('4', 'alma', null);
INSERT INTO `stock_yard` VALUES ('5', 'alma', '3');

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
