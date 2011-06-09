/*
Navicat MySQL Data Transfer

Source Server         : _localhost
Source Server Version : 50133
Source Host           : localhost:3306
Source Database       : chickenfarm

Target Server Type    : MYSQL
Target Server Version : 50133
File Encoding         : 65001

Date: 2011-06-09 21:55:32
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of breeder_site
-- ----------------------------
INSERT INTO `breeder_site` VALUES ('3', '14456', 'alma323', '421', 'alma utva 4', 'szep jo es minden ilyen', '3');
INSERT INTO `breeder_site` VALUES ('4', '21123', 'izemize', '1310', 'kassai ut 65', '', '3');

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
  CONSTRAINT `fk_chicken_type` FOREIGN KEY (`chicken_type_id`) REFERENCES `chicken_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_fakk` FOREIGN KEY (`fakk_id`) REFERENCES `fakk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chicken_stock
-- ----------------------------
INSERT INTO `chicken_stock` VALUES ('6', '21123', '2011-05-01 00:00:00', '1', 'V', '123', '(5c.2c.4n.7n) INTRA.FR.2009.0055972', '345', '(5c.2c.4n.7n) INTRA.FR.2009.0055972', '120', '100', 'c 4', '2011-09-01 00:00:00', null, null, '10');
INSERT INTO `chicken_stock` VALUES ('7', '166725', '2011-04-01 00:00:00', '2', 'V', '123', '(5c.2c.4n.7n) INTRA.FR.2009.0055972', '345', '(5c.2c.4n.7n) INTRA.FR.2009.0055972', '110', '100', 'a 1', '2011-06-30 00:00:00', null, null, '10');

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
  `conditionig_date` datetime DEFAULT NULL,
  `chicken_stock_id` int(11) DEFAULT NULL,
  `is_finished` int(11) DEFAULT NULL,
  `finish_date` datetime DEFAULT NULL,
  `rest_feed` int(11) DEFAULT NULL,
  `rest_feed_grain` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_egg_production_chicken_stock` (`chicken_stock_id`),
  CONSTRAINT `fk_egg_production_chicken_stock` FOREIGN KEY (`chicken_stock_id`) REFERENCES `chicken_stock` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of egg_production
-- ----------------------------
INSERT INTO `egg_production` VALUES ('1', '2011-06-07 20:02:15', '6', null, null, null, null);
INSERT INTO `egg_production` VALUES ('2', '2011-06-07 20:29:25', '7', null, null, null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of egg_production_data
-- ----------------------------
INSERT INTO `egg_production_data` VALUES ('5', '3', '5', '50');
INSERT INTO `egg_production_data` VALUES ('6', '3', '6', '60');
INSERT INTO `egg_production_data` VALUES ('7', '3', '8', '70');
INSERT INTO `egg_production_data` VALUES ('8', '3', '14', '80');
INSERT INTO `egg_production_data` VALUES ('9', '4', '5', '100');
INSERT INTO `egg_production_data` VALUES ('10', '4', '6', '100');
INSERT INTO `egg_production_data` VALUES ('11', '4', '8', '100');
INSERT INTO `egg_production_data` VALUES ('12', '4', '14', '100');
INSERT INTO `egg_production_data` VALUES ('17', '5', '14', '10');
INSERT INTO `egg_production_data` VALUES ('18', '5', '8', '100');
INSERT INTO `egg_production_data` VALUES ('19', '5', '6', '20');
INSERT INTO `egg_production_data` VALUES ('20', '5', '5', '102');

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
  `vitamine` varchar(150) DEFAULT NULL,
  `comment` text,
  PRIMARY KEY (`id`),
  KEY `fk_egg_production_egg_production_day` (`egg_production_id`),
  CONSTRAINT `fk_egg_production_egg_production_day` FOREIGN KEY (`egg_production_id`) REFERENCES `egg_production` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of egg_production_day
-- ----------------------------
INSERT INTO `egg_production_day` VALUES ('3', '2011-06-07 00:00:00', '2', null, null, null, null, null, null, null, null, null);
INSERT INTO `egg_production_day` VALUES ('4', '2011-06-07 00:00:00', '1', null, null, null, null, null, null, null, null, null);
INSERT INTO `egg_production_day` VALUES ('5', '2011-06-06 00:00:00', '1', null, null, null, null, '130', '120', '140', null, null);
INSERT INTO `egg_production_day` VALUES ('6', '2011-06-06 00:00:00', '2', null, null, null, null, '20', '10', '30', null, null);

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
  CONSTRAINT `fk_fakk_breeder_site` FOREIGN KEY (`breeder_site_id`) REFERENCES `breeder_site` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_fakk_group` FOREIGN KEY (`fakk_group_id`) REFERENCES `fakk_group` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fakk
-- ----------------------------
INSERT INTO `fakk` VALUES ('-1', null, null, null);
INSERT INTO `fakk` VALUES ('7', 'alma_fakk_1', null, '6');
INSERT INTO `fakk` VALUES ('8', 'korte_fakk_1', null, '6');
INSERT INTO `fakk` VALUES ('9', 'alma_fakk_2', null, '5');
INSERT INTO `fakk` VALUES ('10', 'szilva fakk', null, '4');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fakk_feed
-- ----------------------------
INSERT INTO `fakk_feed` VALUES ('1', '7', '2011-05-01 00:00:00', '122', '120', '10', null);
INSERT INTO `fakk_feed` VALUES ('4', '9', '2011-05-03 00:00:00', '122', '120', '10', null);

-- ----------------------------
-- Table structure for `fakk_group`
-- ----------------------------
DROP TABLE IF EXISTS `fakk_group`;
CREATE TABLE `fakk_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `breeder_site_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fakk_group_breeder_site` (`breeder_site_id`),
  CONSTRAINT `fk_fakk_group_breeder_site` FOREIGN KEY (`breeder_site_id`) REFERENCES `breeder_site` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fakk_group
-- ----------------------------
INSERT INTO `fakk_group` VALUES ('4', 'fakk_1', '3');
INSERT INTO `fakk_group` VALUES ('5', 'fakk_2', '3');
INSERT INTO `fakk_group` VALUES ('6', 'fakk_3', '3');

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
