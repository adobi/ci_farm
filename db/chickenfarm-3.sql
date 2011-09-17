/*
Navicat MySQL Data Transfer

Source Server         : _localhost
Source Server Version : 50133
Source Host           : localhost:3306
Source Database       : chickenfarm

Target Server Type    : MYSQL
Target Server Version : 50133
File Encoding         : 65001

Date: 2011-09-17 17:05:24
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
  `zip` varchar(10) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of breeder
-- ----------------------------
INSERT INTO `breeder` VALUES ('3', 'Tisza Attila', '+36-45-410360', '+36-70-3357817', 'tiszakelteto@freemail.hu', '4600', 'Kisvárda', 'Piac u. 1.', '1');
INSERT INTO `breeder` VALUES ('4', 'Kövér Gergely', '+36-20-49225', '+36-30-89769', 'kovergergely@citromail.hu', '4466', 'Tímár', ', Toldi u. 5.', '5');
INSERT INTO `breeder` VALUES ('5', 'Szánkár Bertalanné', '+36-45-482182', '+36-70-2893769', '', '', 'Aranyosapáti,', 'Ady E. ut 11.', '4');
INSERT INTO `breeder` VALUES ('6', 'Zele József', '+36-42-233238', '+36-30-9536038', '', '4516', 'Demecser,', 'Széchenyi u. 27.', '8');
INSERT INTO `breeder` VALUES ('7', 'Nagy Gyula', '+36-44-385321', '+36-20-3132499', '', '4562', 'Vaja,', 'Török u. 15.', '3');
INSERT INTO `breeder` VALUES ('8', 'Czirle László', '', '+36-70-4118199', '', '5726', 'Méhkerék,', 'Napfény u. 11.', '7');
INSERT INTO `breeder` VALUES ('9', 'Linkecs József', '+36-46-399114', '', '', '3794', 'Boldva,', 'Gyöngyvirág u. 2/b', '2');
INSERT INTO `breeder` VALUES ('10', 'Jalkóczi György', '', '', '', '4080 ', 'Hajdunánás, ', 'Tégláskert 4673 Hrsz. ', '6');
INSERT INTO `breeder` VALUES ('11', 'Kardos Sándor', '+36-42-231604', '+36-20-9518023', '', '4533 ', 'Sényő, ', 'Kossuth L. u. 82.', '6');
INSERT INTO `breeder` VALUES ('12', 'Siket Tibor', '+36-44-418584', '+36-30-3685444', '', '4700 ', 'Mátészalka, ', 'Munkácsi u. 10. ', '6');
INSERT INTO `breeder` VALUES ('13', 'Bíró Imréné', '+36-52-228595', '+36-70-7085644', '', '4220 ', 'Hajdúböszörmény, ', 'Dorogi u. 78.', '6');
INSERT INTO `breeder` VALUES ('14', 'Bordás Sándor', '+36-52-412961', '+36-70-7085665', '', '4000 ', 'Debrecen, ', 'Kopja u. 24. ', '6');
INSERT INTO `breeder` VALUES ('15', 'Hudák László', '+36-42-490355', '', '', '4400 ', 'Nyíregyháza, ', 'Tábor u. 3. ', '6');
INSERT INTO `breeder` VALUES ('16', 'Kálmán István', '', '+36-30-2289652', '', '5630 ', 'Békés, ', 'Kőrösi Csoma Sándor u. 25/1', '6');
INSERT INTO `breeder` VALUES ('17', 'Popomájer Tibor', '+36-44-355657', '+36-20-5836229', '', '4351 ', 'Vállaj, ', ' Temető u. 1. ', '6');
INSERT INTO `breeder` VALUES ('18', 'Posta Józsefné Kecskés Ilona', '+36-52-370581', '+36-30-9115832', '', '4060 ', 'Balmazújváros, ', 'Bethlen u. 22. ', '6');
INSERT INTO `breeder` VALUES ('19', 'Tóth Miklósné', '+36-52-384474', '', '', '4243 ', 'Téglás, ', 'Gyár u. 2. ', '6');
INSERT INTO `breeder` VALUES ('20', 'Füredi József', '+36-41-0813', '+36-30-2870864', '', '4600 ', 'Kisvárda, ', 'Wesselényi u. 12. ', '6');

-- ----------------------------
-- Table structure for `breeder_site`
-- ----------------------------
DROP TABLE IF EXISTS `breeder_site`;
CREATE TABLE `breeder_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `breeder_id` int(11) DEFAULT NULL,
  `registration_number` varchar(255) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `registered` datetime DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `postal_code_id` int(11) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `postal_zip` int(11) DEFAULT NULL,
  `postal_address` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `enar_name` varchar(255) DEFAULT NULL,
  `enar_phone` varchar(255) DEFAULT NULL,
  `enar_email` varchar(255) DEFAULT NULL,
  `enar_fax` varchar(255) DEFAULT NULL,
  `mgszh` varchar(10) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `site_type` int(11) DEFAULT NULL,
  `holding_place_id` varchar(45) DEFAULT NULL,
  `holding_place_name` varchar(150) DEFAULT NULL,
  `holding_place_zip` int(11) DEFAULT NULL,
  `holding_place_address` varchar(255) DEFAULT NULL,
  `holding_data_type` varchar(150) DEFAULT NULL,
  `holding_data_start` datetime DEFAULT NULL,
  `holding_data_end` datetime DEFAULT NULL,
  `holding_data_count` int(11) DEFAULT NULL,
  `holding_data_utilization` varchar(150) DEFAULT NULL,
  `breeder_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_breeder_site_breeder` (`breeder_id`),
  CONSTRAINT `fk_breeder_site_breeder` FOREIGN KEY (`breeder_id`) REFERENCES `breeder` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of breeder_site
-- ----------------------------
INSERT INTO `breeder_site` VALUES ('6', '3', '97973', '1001934', '1995-11-24 00:00:00', 'Tisza Attila (Kisvárda, Keltető)', '4600', 'Piac u. 3. ', '4600', '4600', 'keltetőüzem', 'Tisza Attila', '70/335-7817', 'tiszakelteto@freemail.hu', '45/500-364', null, null, 'Tisza Attila', '2', '4967011', 'Tisza Attila', null, '4600 Kisvárda, Piac u. 1. ', 'Házityúk', '1995-11-24 00:00:00', '0000-00-00 00:00:00', '0', '', 'Tisza Attila');
INSERT INTO `breeder_site` VALUES ('7', '3', '289768', '4587424', '2008-11-29 00:00:00', 'Tisza Attila (Tornyospálca Tyúktelep)', '4642', '4642 Tornyospálca, 0144/36', '4600', '4600', 'állatttartó (árutermelő/kereskedő)', 'Tisza Attila', '45/410-360', 'tiszakelteto@freemail.hu', '45/500-364', null, null, 'Tisza Attila', '1', '5059793', 'Baromfitelep', null, '4642 Tornyospálca, 0144/36', 'Házityúk', '2008-11-29 00:00:00', '0000-00-00 00:00:00', '0', 'Tojás', 'Tisza Attila');
INSERT INTO `breeder_site` VALUES ('8', '3', '338191', '1006032', '1996-11-08 00:00:00', 'Tisza Attila (Döge, Baromfi-szülőpárnevelő telep)', '421', '4495 Döge, Akácfa u. 9.', '1577', '4600', 'állattartó (árutermelő/kereskedő)', 'Tisza Attila', '45/410-360', 'tiszakelteto@freemail.hu', '45/500-364', null, null, 'Tisza Attila', '3', '2162254', 'Tisza Attila', null, '4495 Döge, Akácfa u. 9.', 'Házityúk', '1996-11-08 00:00:00', '0000-00-00 00:00:00', '0', 'Hús', 'Tisza Attila');
INSERT INTO `breeder_site` VALUES ('9', '3', '338192', '4523336', '1998-01-01 00:00:00', 'Tisza Attila (Döge, Baromfi nevelő telep)', '421', '4495 Döge Akácfa u. 15/b', '1577', '4600', 'állattartó (árutermelő/kereskedő)', 'Tisza Attila', '45/410-360', 'tiszakelteto@freemail.hu', '45/500-364', null, null, 'Tisza Attila', '3', '5007695', 'Baromfi Telep', null, '4495 Döge, Akácfa u. 15/b', 'Házityúk', '1998-01-01 00:00:00', '0000-00-00 00:00:00', '0', 'Hús', 'Tisza Attila');
INSERT INTO `breeder_site` VALUES ('10', '4', '1128243', '4579128', '2011-03-01 00:00:00', 'Kövér Gergely (Tímár, Baromfi nevelőtelep)', '0', '4466 Tímár, Toldi Miklós u. 5. ', '0', '4466', 'Állattartó (árutermelő/kereskedő)', 'Kövér Gergely', '204922523', 'kovergergely@citromail.hu', '', null, null, 'Broyler Baromfi Telep', '3', '5052637', 'Broyler Bfi Telep', null, '4466 Tímár, Toldi M. út 5. ', 'Házityúk', '1990-10-20 00:00:00', '0000-00-00 00:00:00', '0', 'Hús', 'Rakóczki József');
INSERT INTO `breeder_site` VALUES ('11', '16', '', '', '0000-00-00 00:00:00', 'Kálmán István (Békés)', null, '5630 Békés, Kőrösi Csoma Sándor u. 25/1', null, '5630', '', 'Kálmán István', '', '', '', null, null, '', '1', '', '', null, '5630 Békés, Kőrösi Csoma Sándor u. 25/1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', 'Kálmán István');
INSERT INTO `breeder_site` VALUES ('12', '5', '', '', '0000-00-00 00:00:00', 'Szánkárné (Aranyosapáti)', null, 'Aranyosapáti, Ady E. ut 11.', null, '0', '', 'Szánkár Bertalanné', '45482182', '', '', null, null, '', '3', '', '', null, 'Aranyosapáti, Ady E. ut 11.', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', 'Szánkár Bertalanné');
INSERT INTO `breeder_site` VALUES ('13', '6', '', '', '0000-00-00 00:00:00', 'Zele József (Demecser)', null, '4516 Demecser, Széchenyi u. 27.', null, '4516', '', 'Zele József', '42233238', '', '', null, null, '', '3', '', '', null, '4516 Demecser, Széchenyi u. 27.', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', 'Zele József');

-- ----------------------------
-- Table structure for `cast`
-- ----------------------------
DROP TABLE IF EXISTS `cast`;
CREATE TABLE `cast` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cast
-- ----------------------------
INSERT INTO `cast` VALUES ('2', 'Pulyka', '2');
INSERT INTO `cast` VALUES ('3', 'Kacsa', '3');
INSERT INTO `cast` VALUES ('4', 'Kacsa', '4');
INSERT INTO `cast` VALUES ('5', 'Gyöngytyúk', '5');
INSERT INTO `cast` VALUES ('6', 'Strucc', '6');
INSERT INTO `cast` VALUES ('7', 'Emu', '7');
INSERT INTO `cast` VALUES ('10', 'Házityúk', '1');

-- ----------------------------
-- Table structure for `cast_type`
-- ----------------------------
DROP TABLE IF EXISTS `cast_type`;
CREATE TABLE `cast_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `cast_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cast_type_cast` (`cast_id`),
  CONSTRAINT `fk_cast_type_cast` FOREIGN KEY (`cast_id`) REFERENCES `cast` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cast_type
-- ----------------------------
INSERT INTO `cast_type` VALUES ('4', '13', 'Sárga magyar', null);
INSERT INTO `cast_type` VALUES ('5', '22', 'Kendermagos magyar', null);
INSERT INTO `cast_type` VALUES ('6', '25', 'Fehér magyar', null);
INSERT INTO `cast_type` VALUES ('7', '26', 'Erdélyi kopasznyakú', null);
INSERT INTO `cast_type` VALUES ('9', '40', 'Redbro', null);
INSERT INTO `cast_type` VALUES ('10', '40', 'Redbro', '10');
INSERT INTO `cast_type` VALUES ('11', '47', 'Farm', '10');
INSERT INTO `cast_type` VALUES ('12', '56', 'Master Gris', '10');
INSERT INTO `cast_type` VALUES ('13', '65', 'Farm Master', '10');
INSERT INTO `cast_type` VALUES ('14', '78', 'Avicolor', '10');
INSERT INTO `cast_type` VALUES ('15', '82', 'Hubbard Flex', '10');

-- ----------------------------
-- Table structure for `certificate`
-- ----------------------------
DROP TABLE IF EXISTS `certificate`;
CREATE TABLE `certificate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of certificate
-- ----------------------------

-- ----------------------------
-- Table structure for `chicken_stock`
-- ----------------------------
DROP TABLE IF EXISTS `chicken_stock`;
CREATE TABLE `chicken_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_code` varchar(45) DEFAULT NULL,
  `intra_code` varchar(45) DEFAULT NULL,
  `hatching_breeder_site_id` int(11) DEFAULT NULL,
  `hatching_date` datetime DEFAULT NULL,
  `piece` int(11) DEFAULT NULL,
  `mgszh_code` varchar(45) DEFAULT NULL,
  `cast_type_id` int(11) DEFAULT NULL,
  `klass` varchar(45) DEFAULT NULL,
  `male_piece` int(11) DEFAULT NULL,
  `male_cast_type` int(11) DEFAULT NULL,
  `female_piece` int(11) DEFAULT NULL,
  `female_cast_type` int(11) DEFAULT NULL,
  `stock_reason` varchar(45) DEFAULT NULL,
  `parent_male_code` varchar(45) DEFAULT NULL,
  `parent_female_code` varchar(45) DEFAULT NULL,
  `holder_breeder_site_id` int(11) DEFAULT NULL,
  `egg_code` varchar(45) DEFAULT NULL,
  `validity_until` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `delivery_id` int(11) DEFAULT NULL,
  `certificate_code` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_chicken_stock_delivery` (`delivery_id`),
  KEY `fk_chicken_stock_hatching_breeder_site` (`hatching_breeder_site_id`),
  KEY `fk_chicken_stock_cast_type` (`cast_type_id`),
  KEY `fk_chicken_stock_male_cast_type` (`male_cast_type`),
  KEY `fk_chicken_stock_female_cast_type` (`female_cast_type`),
  KEY `fk_chicken_stock_holder_breeder_site` (`holder_breeder_site_id`),
  CONSTRAINT `fk_chicken_stock_cast_type` FOREIGN KEY (`cast_type_id`) REFERENCES `cast_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_chicken_stock_delivery` FOREIGN KEY (`delivery_id`) REFERENCES `delivery` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_chicken_stock_female_cast_type` FOREIGN KEY (`female_cast_type`) REFERENCES `cast_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_chicken_stock_hatching_breeder_site` FOREIGN KEY (`hatching_breeder_site_id`) REFERENCES `breeder_site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_chicken_stock_holder_breeder_site` FOREIGN KEY (`holder_breeder_site_id`) REFERENCES `breeder_site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_chicken_stock_male_cast_type` FOREIGN KEY (`male_cast_type`) REFERENCES `cast_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chicken_stock
-- ----------------------------

-- ----------------------------
-- Table structure for `chicken_stock_`
-- ----------------------------
DROP TABLE IF EXISTS `chicken_stock_`;
CREATE TABLE `chicken_stock_` (
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
  `is_deleted` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chicken_stock_
-- ----------------------------

-- ----------------------------
-- Table structure for `chicken_stock_in_fakk`
-- ----------------------------
DROP TABLE IF EXISTS `chicken_stock_in_fakk`;
CREATE TABLE `chicken_stock_in_fakk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fakk_id` int(11) DEFAULT NULL,
  `chicken_stock_id` int(11) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_csif_fakk` (`fakk_id`),
  KEY `fk_csif_chicken_stock` (`chicken_stock_id`),
  CONSTRAINT `fk_csif_chicken_stock` FOREIGN KEY (`chicken_stock_id`) REFERENCES `chicken_stock` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_csif_fakk` FOREIGN KEY (`fakk_id`) REFERENCES `fakk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chicken_stock_in_fakk
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chicken_type
-- ----------------------------
INSERT INTO `chicken_type` VALUES ('1', 'Farm Master', '65');
INSERT INTO `chicken_type` VALUES ('2', 'Master Gris', '56');
INSERT INTO `chicken_type` VALUES ('3', 'Farm', '47');
INSERT INTO `chicken_type` VALUES ('4', 'Redbro', '40');
INSERT INTO `chicken_type` VALUES ('5', 'Avicolor', '78');
INSERT INTO `chicken_type` VALUES ('6', 'Hubbard Flex', '82');

-- ----------------------------
-- Table structure for `delivery`
-- ----------------------------
DROP TABLE IF EXISTS `delivery`;
CREATE TABLE `delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_number` varchar(45) DEFAULT NULL,
  `cast_id` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `intended_use` int(11) DEFAULT NULL,
  `veterinary_code` varchar(150) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `sell_date` datetime DEFAULT NULL,
  `sell_piece` int(11) DEFAULT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `buyer_country_code` varchar(45) DEFAULT NULL,
  `buyer_intra` varchar(150) DEFAULT NULL,
  `transporter_plate` varchar(45) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `received` datetime DEFAULT NULL,
  `received_piece` int(11) DEFAULT NULL,
  `arrival_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_delivery_cast` (`cast_id`),
  KEY `fk_seller_breeder_site` (`seller_id`),
  KEY `fk_buyer_breeder_site` (`buyer_id`),
  KEY `fk_receiver_breeder_site` (`receiver_id`),
  CONSTRAINT `fk_buyer_breeder_site` FOREIGN KEY (`buyer_id`) REFERENCES `breeder_site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_delivery_cast` FOREIGN KEY (`cast_id`) REFERENCES `cast` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_receiver_breeder_site` FOREIGN KEY (`receiver_id`) REFERENCES `breeder_site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_seller_breeder_site` FOREIGN KEY (`seller_id`) REFERENCES `breeder_site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of delivery
-- ----------------------------

-- ----------------------------
-- Table structure for `egg_type`
-- ----------------------------
DROP TABLE IF EXISTS `egg_type`;
CREATE TABLE `egg_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `is_for_stock` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of egg_type
-- ----------------------------
INSERT INTO `egg_type` VALUES ('1', '60', 'mosott', null, '1', null);
INSERT INTO `egg_type` VALUES ('5', '50', 'törött', null, '1', null);
INSERT INTO `egg_type` VALUES ('6', '40', 'nagy', null, '1', null);
INSERT INTO `egg_type` VALUES ('8', '20', 'kicsi', null, '1', null);
INSERT INTO `egg_type` VALUES ('14', '10', 'TENYÉSZ', null, '2', null);

-- ----------------------------
-- Table structure for `fakk`
-- ----------------------------
DROP TABLE IF EXISTS `fakk`;
CREATE TABLE `fakk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `stock_yard_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fakk_stock_yard` (`stock_yard_id`),
  CONSTRAINT `fk_fakk_stock_yard` FOREIGN KEY (`stock_yard_id`) REFERENCES `stock_yard` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fakk
-- ----------------------------

-- ----------------------------
-- Table structure for `holding_capacity`
-- ----------------------------
DROP TABLE IF EXISTS `holding_capacity`;
CREATE TABLE `holding_capacity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(150) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `breeder_site_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_holding_capacity_breeder_site` (`breeder_site_id`),
  CONSTRAINT `fk_holding_capacity_breeder_site` FOREIGN KEY (`breeder_site_id`) REFERENCES `breeder_site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of holding_capacity
-- ----------------------------
INSERT INTO `holding_capacity` VALUES ('1', 'Tyúktojás férőhely db', '66000', '1995-11-24 00:00:00', '6');
INSERT INTO `holding_capacity` VALUES ('2', 'Istálló hasznos nm', '500', '2009-03-12 00:00:00', '9');
INSERT INTO `holding_capacity` VALUES ('3', 'Istálló hasznos nm', '250', '2008-02-15 00:00:00', '9');
INSERT INTO `holding_capacity` VALUES ('4', 'Istálló hasznos nm', '750', '2008-12-02 00:00:00', '7');
INSERT INTO `holding_capacity` VALUES ('5', 'Istálló hasznos nm', '400', '2008-02-15 00:00:00', '8');
INSERT INTO `holding_capacity` VALUES ('6', 'Istálló hasznos nm', '448', '1990-10-20 00:00:00', '10');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stock_yard
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
