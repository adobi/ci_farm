/*
Navicat MySQL Data Transfer

Source Server         : _localhost
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : chickenfarm

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2012-02-17 11:16:48
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
  `is_deleted` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of breeder
-- ----------------------------
INSERT INTO `breeder` VALUES ('3', 'Tisza Attila', '+36-45-410360', '+36-70-3357817', 'tiszakelteto@freemail.hu', '4600', 'Kisvárda', 'Piac u. 1.', '1', null);
INSERT INTO `breeder` VALUES ('4', 'Kövér Gergely', '+36-20-49225', '+36-30-89769', 'kovergergely@citromail.hu', '4466', 'Tímár', ', Toldi u. 5.', '6', null);
INSERT INTO `breeder` VALUES ('5', 'Szánkár Bertalanné', '+36-45-482182', '+36-70-2893769', '', '', 'Aranyosapáti,', 'Ady E. ut 11.', '5', null);
INSERT INTO `breeder` VALUES ('6', 'Zele József', '+36-42-233238', '+36-30-9536038', '', '4516', 'Demecser,', 'Széchenyi u. 27.', '9', null);
INSERT INTO `breeder` VALUES ('7', 'Nagy Gyula', '+36-44-385321', '+36-20-3132499', '', '4562', 'Vaja,', 'Török u. 15.', '4', null);
INSERT INTO `breeder` VALUES ('8', 'Czirle László', '', '+36-70-4118199', '', '5726', 'Méhkerék,', 'Napfény u. 11.', '8', null);
INSERT INTO `breeder` VALUES ('10', 'Jalkóczi György', '', '', '', '4080 ', 'Hajdunánás, ', 'Tégláskert 4673 Hrsz. ', '7', null);
INSERT INTO `breeder` VALUES ('11', 'Kardos Sándor', '+36-42-231604', '+36-20-9518023', '', '4533 ', 'Sényő, ', 'Kossuth L. u. 82.', '7', null);
INSERT INTO `breeder` VALUES ('12', 'Siket Tibor', '+36-44-418584', '+36-30-3685444', '', '4700 ', 'Mátészalka, ', 'Munkácsi u. 10. ', '7', null);
INSERT INTO `breeder` VALUES ('13', 'Bíró Imréné', '+36-52-228595', '+36-70-7085644', '', '4220 ', 'Hajdúböszörmény, ', 'Dorogi u. 78.', '7', null);
INSERT INTO `breeder` VALUES ('14', 'Bordás Sándor', '+36-52-412961', '+36-70-7085665', '', '4000 ', 'Debrecen, ', 'Kopja u. 24. ', '7', null);
INSERT INTO `breeder` VALUES ('15', 'Hudák László', '+36-42-490355', '', '', '4400 ', 'Nyíregyháza, ', 'Tábor u. 3. ', '7', null);
INSERT INTO `breeder` VALUES ('16', 'Kálmán István', '', '+36-30-2289652', '', '5630 ', 'Békés, ', 'Kőrösi Csoma Sándor u. 25/1', '7', null);
INSERT INTO `breeder` VALUES ('17', 'Popomájer Tibor', '+36-44-355657', '+36-20-5836229', '', '4351 ', 'Vállaj, ', ' Temető u. 1. ', '7', null);
INSERT INTO `breeder` VALUES ('18', 'Posta Józsefné Kecskés Ilona', '+36-52-370581', '+36-30-9115832', '', '4060 ', 'Balmazújváros, ', 'Bethlen u. 22. ', '7', null);
INSERT INTO `breeder` VALUES ('19', 'Tóth Miklósné', '+36-52-384474', '', '', '4243 ', 'Téglás, ', 'Gyár u. 2. ', '7', null);
INSERT INTO `breeder` VALUES ('20', 'Füredi József', '+36-41-0813', '+36-30-2870864', '', '4600 ', 'Kisvárda, ', 'Wesselényi u. 12. ', '7', null);
INSERT INTO `breeder` VALUES ('21', 'Szűcs F. Gábor', '+36-76-560128', '+36-20-9448789', '', '6100', 'Kiskunfélegyháza', 'VII. kerület 88.', '1000', null);
INSERT INTO `breeder` VALUES ('22', 'Zseák Gábor', '', '', '', '5630', 'Békés', '', '10000', null);

-- ----------------------------
-- Table structure for `breeder_site`
-- ----------------------------
DROP TABLE IF EXISTS `breeder_site`;
CREATE TABLE `breeder_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `breeder_id` int(11) DEFAULT NULL,
  `culture_code` varchar(255) DEFAULT NULL,
  `registration_number` varchar(255) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `registered` datetime DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `postal_code_id` int(11) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `postal_zip` int(11) DEFAULT NULL,
  `postal_address` varchar(255) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of breeder_site
-- ----------------------------
INSERT INTO `breeder_site` VALUES ('6', '3', '1002897716', '97973', '1001934', '1995-11-24 00:00:00', 'Tisza Attila (Kisvárda, Keltető)', '4600', '4600 Kisvárda, Piac u. 3.', '4600', '4600 Kisvárda, Piac u. 1.', 'keltetőüzem', 'Tisza Attila', '70/335-7817', 'tiszakelteto@freemail.hu', '45/500-364', null, null, 'Tisza Attila', '2', '4967011', 'Tisza Attila', null, '4600 Kisvárda, Piac u. 3.', 'Házityúk', '1995-11-24 00:00:00', '0000-00-00 00:00:00', '0', '', 'Tisza Attila');
INSERT INTO `breeder_site` VALUES ('7', '3', '1002897716', '289768', '4587424', '2008-11-29 00:00:00', 'Tisza Attila (Tornyospálca Tyúktelep)', '4642', '4642 Tornyospálca, 0144/36 Hrsz.', '4600', '4600 Kisvárda, Piac u. 1.', 'állatttartó (árutermelő/kereskedő)', 'Tisza Attila', '45/410-360', 'tiszakelteto@freemail.hu', '45/500-364', null, null, 'Tisza Attila', '1', '5059793', 'Baromfitelep', null, '4642 Tornyospálca, 0144/36 Hrsz.', 'Házityúk', '2008-11-29 00:00:00', '0000-00-00 00:00:00', '0', 'Tojás', 'Tisza Attila');
INSERT INTO `breeder_site` VALUES ('8', '3', '1002897716', '338191', '1006032', '1996-11-08 00:00:00', 'Tisza Attila (Döge, Baromfi-szülőpárnevelő telep)', '421', '4495 Döge, Akácfa u. 9.', '1577', '4600 Kisvárda, Piac u. 1.', 'állattartó (árutermelő/kereskedő)', 'Tisza Attila', '45/410-360', 'tiszakelteto@freemail.hu', '45/500-364', null, null, 'Tisza Attila', '3', '2162254', 'Tisza Attila', null, '4495 Döge, Akácfa u. 9.', 'Házityúk', '1996-11-08 00:00:00', '0000-00-00 00:00:00', '0', 'Hús', 'Tisza Attila');
INSERT INTO `breeder_site` VALUES ('9', '3', '1002897716', '338192', '4523336', '1998-01-01 00:00:00', 'Tisza Attila (Döge, Baromfi nevelő telep)', '421', '4495 Döge Akácfa u. 15/b', '1577', '4600 Kisvárda, Piac u. 1.', 'állattartó (árutermelő/kereskedő)', 'Tisza Attila', '45/410-360', 'tiszakelteto@freemail.hu', '45/500-364', null, null, 'Tisza Attila', '3', '5007695', 'Baromfi Telep', null, '4495 Döge, Akácfa u. 15/b', 'Házityúk', '1998-01-01 00:00:00', '0000-00-00 00:00:00', '0', 'Hús', 'Tisza Attila');
INSERT INTO `breeder_site` VALUES ('10', '4', '1004763453', '1128243', '4579128', '2011-03-01 00:00:00', 'Kövér Gergely (Tímár, Baromfi nevelőtelep)', '0', '4466 Tímár, Toldi Miklós u. 5.', '0', '4466', 'Állattartó (árutermelő/kereskedő)', 'Kövér Gergely', '20/492-2523', 'kovergergely@citromail.hu', '', null, null, 'Broyler Baromfi Telep', '3', '5052637', 'Broyler Bfi Telep', null, '4466 Tímár, Toldi M. út 5.', 'Házityúk', '1990-10-20 00:00:00', '0000-00-00 00:00:00', '0', 'Hús', 'Rakóczki József');
INSERT INTO `breeder_site` VALUES ('11', '16', '', '', '1009181', '0000-00-00 00:00:00', 'Kálmán István (Békés)', null, '5630 Békés, X.ker. 72', null, '5630 Békés, Kőrösi Csoma Sándor u. 25/1', '', 'Kálmán István', '', '', '', null, null, '', '1', '', '', null, '5630 Békés, Kőrösi Csoma Sándor u. 25/1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', 'Kálmán István');
INSERT INTO `breeder_site` VALUES ('12', '5', null, '', '', '0000-00-00 00:00:00', 'Szánkárné (Aranyosapáti)', null, 'Aranyosapáti, Ady E. ut 11.', null, '0', '', 'Szánkár Bertalanné', '45482182', '', '', null, null, '', '3', '', '', null, 'Aranyosapáti, Ady E. ut 11.', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', 'Szánkár Bertalanné');
INSERT INTO `breeder_site` VALUES ('13', '6', '1002969790', '188118', '4545659', '2000-03-01 00:00:00', 'Zele József (Demecser)', null, '4516 Demecser, Széchenyi u. 7.', null, '4516 Demecser, Széchenyi u. 27.', 'állattartó (árutermelő/kereskedő)', 'Zele József', '42/233-238', '', '', null, null, 'Zele József', '3', '5021390', 'Zele József', null, '4516 Demecser, Széchenyi u. 27.', 'Házityúk', '2000-03-01 00:00:00', '0000-00-00 00:00:00', '0', 'Hús', 'Zele József');
INSERT INTO `breeder_site` VALUES ('14', '3', null, '', '', '0000-00-00 00:00:00', '', null, 'Piac u.1.', null, '0', '', 'Tisza Attila', '+36-45-410360', 'tiszakelteto@freemail.hu', '', null, '1', '', '0', '', '', null, 'Piac u. 1.', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', 'Tisza Attila');
INSERT INTO `breeder_site` VALUES ('15', '21', null, null, '1006845', null, null, null, '6100 Kiskunfélegyháza VII ker. 88', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `breeder_site` VALUES ('16', '16', '', '', '1009181', '0000-00-00 00:00:00', 'Kálmán István Békés', null, 'Békés, X. ker. 72', null, 'Kőrösi Csoma Sándor u. 25/1', '', 'Kálmán István', '', '', '', null, '1', '', '1', '', '', null, 'Kőrösi Csoma Sándor u. 25/1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', 'Kálmán István');
INSERT INTO `breeder_site` VALUES ('17', '22', '', '', '1004636', '0000-00-00 00:00:00', 'Zseák Gábor Békés', null, '5630 Békés, X. ker. 72.', null, '', '', '', '', '', '', null, null, '', '1', '', '', null, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', '');

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
  `delivery_id` int(11) DEFAULT NULL,
  `certificate_code` varchar(45) DEFAULT NULL,
  `state` int(11) DEFAULT NULL COMMENT '1-nincs beolazva, 2-beolazva, 3-felszamolva',
  `is_deleted` int(11) DEFAULT NULL,
  `hatching_date` datetime DEFAULT NULL,
  `piece` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_chicken_stock_delivery` (`delivery_id`),
  CONSTRAINT `fk_chicken_stock_delivery` FOREIGN KEY (`delivery_id`) REFERENCES `delivery` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chicken_stock
-- ----------------------------
INSERT INTO `chicken_stock` VALUES ('17', '202228', '', '44', '208279', '1', null, '2009-07-09 00:00:00', '420');
INSERT INTO `chicken_stock` VALUES ('18', '202112', '', '44', null, '1', null, '2009-07-07 00:00:00', '2500');
INSERT INTO `chicken_stock` VALUES ('19', '202211', '', '44', '208279', '1', null, '2009-07-09 00:00:00', '500');
INSERT INTO `chicken_stock` VALUES ('20', '202198', '', '44', null, '1', null, '2009-07-09 00:00:00', '1140');

-- ----------------------------
-- Table structure for `chicken_stok_proof_of_origin`
-- ----------------------------
DROP TABLE IF EXISTS `chicken_stok_proof_of_origin`;
CREATE TABLE `chicken_stok_proof_of_origin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_id` int(11) DEFAULT NULL,
  `proof_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chicken_stok_proof_of_origin
-- ----------------------------
INSERT INTO `chicken_stok_proof_of_origin` VALUES ('4', '18', '2');
INSERT INTO `chicken_stok_proof_of_origin` VALUES ('3', '17', '2');
INSERT INTO `chicken_stok_proof_of_origin` VALUES ('5', '19', '3');

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
  `launch_date` datetime DEFAULT NULL,
  `is_deleted` int(11) DEFAULT NULL,
  `buyer_country_name` varchar(255) DEFAULT NULL,
  `stmt_1` int(11) DEFAULT NULL,
  `stmt_1_date` datetime DEFAULT NULL,
  `stmt_2` int(11) DEFAULT NULL,
  `stmt_3` int(11) DEFAULT NULL,
  `vaccine_1` varchar(255) DEFAULT NULL,
  `vaccine_1_date` datetime DEFAULT NULL,
  `trunk_1` varchar(255) DEFAULT NULL,
  `vaccine_2` varchar(255) DEFAULT NULL,
  `vaccine_2_date` datetime DEFAULT NULL,
  `trunk_2` varchar(255) DEFAULT NULL,
  `stmt_4` int(11) DEFAULT NULL,
  `stmt_5` int(11) DEFAULT NULL,
  `vaccine_3` varchar(255) DEFAULT NULL,
  `vaccine_3_date` datetime DEFAULT NULL,
  `vaccine_4` varchar(255) DEFAULT NULL,
  `vaccine_4_date` datetime DEFAULT NULL,
  `stmt_6` int(11) DEFAULT NULL,
  `comment` text,
  `medical_certificate_date` datetime DEFAULT NULL,
  `medic_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_delivery_cast` (`cast_id`),
  KEY `fk_seller_breeder_site` (`seller_id`),
  KEY `fk_buyer_breeder_site` (`buyer_id`),
  KEY `fk_receiver_breeder_site` (`receiver_id`),
  CONSTRAINT `fk_buyer_breeder_site` FOREIGN KEY (`buyer_id`) REFERENCES `breeder_site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_delivery_cast` FOREIGN KEY (`cast_id`) REFERENCES `cast` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_receiver_breeder_site` FOREIGN KEY (`receiver_id`) REFERENCES `breeder_site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_seller_breeder_site` FOREIGN KEY (`seller_id`) REFERENCES `breeder_site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of delivery
-- ----------------------------
INSERT INTO `delivery` VALUES ('44', '11729718', '10', '1', '1', '139771', '15', '2009-07-09 00:00:00', '4560', '8', '', '', 'KUM106', '0000-00-00 00:00:00', '8', '2009-07-09 00:00:00', '4560', '2009-07-09 00:00:00', '2009-07-09 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, '', '0000-00-00 00:00:00', '');

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
  `created` datetime DEFAULT NULL,
  `closed` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fakk_stock_yard` (`stock_yard_id`),
  CONSTRAINT `fk_fakk_stock_yard` FOREIGN KEY (`stock_yard_id`) REFERENCES `stock_yard` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fakk
-- ----------------------------
INSERT INTO `fakk` VALUES ('1', 'kisvárda  keltető fakk 1', '6', '2011-12-28 19:16:54', null);
INSERT INTO `fakk` VALUES ('2', 'döge fakk 1', '7', '2011-12-28 19:34:39', null);
INSERT INTO `fakk` VALUES ('3', 'tyúktelep 1-es ól 1-es fakk', '5', '2011-12-29 13:22:53', null);
INSERT INTO `fakk` VALUES ('4', 'doge 1a fakk 1', '2', '2012-02-02 18:32:54', null);
INSERT INTO `fakk` VALUES ('5', 'doge 1a fakk 2', '2', '2012-02-02 18:32:54', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of holding_capacity
-- ----------------------------
INSERT INTO `holding_capacity` VALUES ('1', 'Tyúktojás férőhely db', '66000', '1995-11-24 00:00:00', '6');
INSERT INTO `holding_capacity` VALUES ('2', 'Istálló hasznos nm', '500', '2009-03-12 00:00:00', '9');
INSERT INTO `holding_capacity` VALUES ('3', 'Istálló hasznos nm', '250', '2008-02-15 00:00:00', '9');
INSERT INTO `holding_capacity` VALUES ('4', 'Istálló hasznos nm', '750', '2008-12-02 00:00:00', '7');
INSERT INTO `holding_capacity` VALUES ('5', 'Istálló hasznos nm', '400', '2008-02-15 00:00:00', '8');
INSERT INTO `holding_capacity` VALUES ('6', 'Istálló hasznos nm', '448', '1990-10-20 00:00:00', '10');
INSERT INTO `holding_capacity` VALUES ('7', 'Istálló hasznos nm', '260', '2008-03-27 00:00:00', '13');

-- ----------------------------
-- Table structure for `hutching`
-- ----------------------------
DROP TABLE IF EXISTS `hutching`;
CREATE TABLE `hutching` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_yard_id` int(11) DEFAULT NULL,
  `breeder_site_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `closed` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_hutchin_stockg_yard` (`stock_yard_id`) USING BTREE,
  KEY `fk_hutching_breeder_site` (`breeder_site_id`) USING BTREE,
  CONSTRAINT `hutching_ibfk_1` FOREIGN KEY (`breeder_site_id`) REFERENCES `breeder_site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `hutching_ibfk_2` FOREIGN KEY (`stock_yard_id`) REFERENCES `stock_yard` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hutching
-- ----------------------------
INSERT INTO `hutching` VALUES ('5', '7', '8', '2011-12-28 19:50:03', null);
INSERT INTO `hutching` VALUES ('6', '5', '7', '2011-12-28 19:51:25', null);
INSERT INTO `hutching` VALUES ('7', '6', '6', '2011-12-29 14:07:24', null);
INSERT INTO `hutching` VALUES ('8', '2', '9', '2012-02-02 18:32:24', null);

-- ----------------------------
-- Table structure for `proof_of_origin`
-- ----------------------------
DROP TABLE IF EXISTS `proof_of_origin`;
CREATE TABLE `proof_of_origin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `egg_code` varchar(45) DEFAULT NULL,
  `validity_until` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `male_stock_id` int(11) DEFAULT NULL,
  `female_stock_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of proof_of_origin
-- ----------------------------
INSERT INTO `proof_of_origin` VALUES ('2', '1761', '11', 'III', null, '11', null, '11', 'kelés', null, null, 'F 39', '2010-10-31 00:00:00', '2009-07-09 00:00:00', '17', '18');
INSERT INTO `proof_of_origin` VALUES ('3', '1761', '11', 'III', null, '11', null, '0', 'kelés', null, null, 'R 39', '2010-10-31 00:00:00', '2012-01-01 00:00:00', '19', '0');

-- ----------------------------
-- Table structure for `stock_in_fakk`
-- ----------------------------
DROP TABLE IF EXISTS `stock_in_fakk`;
CREATE TABLE `stock_in_fakk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hutching_id` int(11) DEFAULT NULL,
  `fakk_id` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `piece` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `closed` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_stock_in_fakk_hutching` (`hutching_id`) USING BTREE,
  KEY `fk_stock_in_fakk_fakk` (`fakk_id`) USING BTREE,
  KEY `fk_stock_in_fakk_stock` (`stock_id`) USING BTREE,
  CONSTRAINT `stock_in_fakk_ibfk_1` FOREIGN KEY (`fakk_id`) REFERENCES `fakk` (`id`),
  CONSTRAINT `stock_in_fakk_ibfk_2` FOREIGN KEY (`hutching_id`) REFERENCES `hutching` (`id`),
  CONSTRAINT `stock_in_fakk_ibfk_3` FOREIGN KEY (`stock_id`) REFERENCES `chicken_stock` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stock_in_fakk
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stock_yard
-- ----------------------------
INSERT INTO `stock_yard` VALUES ('2', 'Döge I/a-ól', '9');
INSERT INTO `stock_yard` VALUES ('3', 'Döge I/b-ól', '9');
INSERT INTO `stock_yard` VALUES ('4', 'Döge II-es ól', '9');
INSERT INTO `stock_yard` VALUES ('5', 'Tyúktelep 1-es ól', '7');
INSERT INTO `stock_yard` VALUES ('6', 'Keltetőüzem', '6');
INSERT INTO `stock_yard` VALUES ('7', 'Döge III-as ól', '8');

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
