/*
Navicat MySQL Data Transfer

Source Server         : adobi.hu
Source Server Version : 50051
Source Host           : adobi.hu:3306
Source Database       : chickenfarm

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2011-12-28 20:39:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `breeder`
-- ----------------------------
DROP TABLE IF EXISTS `breeder`;
CREATE TABLE `breeder` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(150) default NULL,
  `phone` varchar(45) default NULL,
  `cell` varchar(45) default NULL,
  `email` varchar(100) default NULL,
  `zip` varchar(10) default NULL,
  `city` varchar(45) default NULL,
  `address` varchar(255) default NULL,
  `priority` int(11) default NULL,
  `is_deleted` int(11) default NULL,
  PRIMARY KEY  (`id`)
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
  `id` int(11) NOT NULL auto_increment,
  `breeder_id` int(11) default NULL,
  `culture_code` varchar(255) default NULL,
  `registration_number` varchar(255) default NULL,
  `code` varchar(10) default NULL,
  `registered` datetime default NULL,
  `name` varchar(255) default NULL,
  `postal_code_id` int(11) default NULL,
  `address` varchar(150) default NULL,
  `postal_zip` int(11) default NULL,
  `postal_address` varchar(255) default NULL,
  `type` varchar(255) default NULL,
  `enar_name` varchar(255) default NULL,
  `enar_phone` varchar(255) default NULL,
  `enar_email` varchar(255) default NULL,
  `enar_fax` varchar(255) default NULL,
  `mgszh` varchar(10) default NULL,
  `is_deleted` int(11) default NULL,
  `designation` varchar(255) default NULL,
  `site_type` int(11) default NULL,
  `holding_place_id` varchar(45) default NULL,
  `holding_place_name` varchar(150) default NULL,
  `holding_place_zip` int(11) default NULL,
  `holding_place_address` varchar(255) default NULL,
  `holding_data_type` varchar(150) default NULL,
  `holding_data_start` datetime default NULL,
  `holding_data_end` datetime default NULL,
  `holding_data_count` int(11) default NULL,
  `holding_data_utilization` varchar(150) default NULL,
  `breeder_name` varchar(255) default NULL,
  PRIMARY KEY  (`id`),
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
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `code` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
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
  `id` int(11) NOT NULL auto_increment,
  `code` varchar(45) default NULL,
  `name` varchar(255) default NULL,
  `cast_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
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
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of certificate
-- ----------------------------

-- ----------------------------
-- Table structure for `chicken_stock`
-- ----------------------------
DROP TABLE IF EXISTS `chicken_stock`;
CREATE TABLE `chicken_stock` (
  `id` int(11) NOT NULL auto_increment,
  `stock_code` varchar(45) default NULL,
  `intra_code` varchar(45) default NULL,
  `hatching_breeder_site_id` int(11) default NULL,
  `hatching_date` datetime default NULL,
  `piece` int(11) default NULL,
  `mgszh_code` varchar(45) default NULL,
  `cast_type_id` int(11) default NULL,
  `klass` varchar(45) default NULL,
  `male_piece` int(11) default NULL,
  `male_cast_type` int(11) default NULL,
  `female_piece` int(11) default NULL,
  `female_cast_type` int(11) default NULL,
  `stock_reason` varchar(45) default NULL,
  `parent_male_code` varchar(45) default NULL,
  `parent_female_code` varchar(45) default NULL,
  `holder_breeder_site_id` int(11) default NULL,
  `egg_code` varchar(45) default NULL,
  `validity_until` datetime default NULL,
  `created` datetime default NULL,
  `delivery_id` int(11) default NULL,
  `certificate_code` varchar(45) default NULL,
  `state` int(11) default NULL COMMENT '1-nincs beolazva, 2-beolazva, 3-felszamolva',
  `is_deleted` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_chicken_stock_delivery` (`delivery_id`),
  KEY `fk_chicken_stock_hatching_breeder_site` (`hatching_breeder_site_id`),
  KEY `fk_chicken_stock_cast_type` (`cast_type_id`),
  KEY `fk_chicken_stock_male_cast_type` (`male_cast_type`),
  KEY `fk_chicken_stock_female_cast_type` (`female_cast_type`),
  KEY `fk_chicken_stock_holder_breeder_site` (`holder_breeder_site_id`),
  CONSTRAINT `fk_chicken_stock_delivery` FOREIGN KEY (`delivery_id`) REFERENCES `delivery` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chicken_stock
-- ----------------------------
INSERT INTO `chicken_stock` VALUES ('1', '202228', '', '15', '2009-07-09 00:00:00', '420', '176', '11', 'III', '420', '11', '2500', '11', 'kelés', '202228', '202112', '8', 'F 39', '2010-10-31 00:00:00', '2009-07-09 00:00:00', '1', '208279', null, null);
INSERT INTO `chicken_stock` VALUES ('2', '202112', '', '15', '2009-07-09 00:00:00', '2500', '', '0', '', '0', '0', '0', '0', '', '', '', '8', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', null, null, null);
INSERT INTO `chicken_stock` VALUES ('3', '202211', '', '15', '2009-07-09 00:00:00', '500', '176', '14', 'III', '0', '0', '500', '14', 'kelés', '', '202211', '8', 'AC 39', '2010-10-31 00:00:00', '2009-07-09 00:00:00', '1', null, null, null);
INSERT INTO `chicken_stock` VALUES ('4', '202198', '', '15', '2009-07-09 00:00:00', '1140', '176', '10', 'III', '0', '0', '1140', '10', 'kelés', '', '202198', '8', 'R 39', '2010-10-31 00:00:00', '2009-07-09 00:00:00', '1', null, null, null);
INSERT INTO `chicken_stock` VALUES ('5', '', 'INTRA FR 20090053975', '15', '2009-07-23 00:00:00', '140', '176', '10', 'III', '140', '10', '0', '0', 'kelés', 'INTRA FR 20090053975', '', '8', 'R 39', '2010-10-31 00:00:00', '2009-07-23 00:00:00', '2', null, null, null);
INSERT INTO `chicken_stock` VALUES ('6', '208934', '', '15', '2010-07-16 00:00:00', '352', '176', '11', 'III', '352', '11', '0', '0', 'kelés', '208934', '', '8', 'F 39', '2011-10-31 00:00:00', '2010-07-16 00:00:00', '3', '213574', null, null);
INSERT INTO `chicken_stock` VALUES ('7', '210427', '', '15', '2010-07-16 00:00:00', '2500', '176', '11', 'III', '0', '0', '2500', '11', 'kelés', '', '210427', '8', 'F 39', '2011-10-31 00:00:00', '2010-07-16 00:00:00', '3', '213574', null, null);
INSERT INTO `chicken_stock` VALUES ('8', '210434', '', '15', '2010-07-16 00:00:00', '500', '176', '14', 'III', '0', '0', '500', '14', 'kelés', '', '210434', '8', 'AC 39', '2011-10-31 00:00:00', '2010-07-16 00:00:00', '3', '213581', null, null);
INSERT INTO `chicken_stock` VALUES ('9', '', 'INTRA FR 2010 0047520', '15', '2010-07-16 00:00:00', '80', '176', '12', 'III', '80', '12', '0', '0', 'kelés', '80', '', '8', 'MG 39', '2011-10-31 00:00:00', '2010-07-16 00:00:00', '3', '213932', null, null);
INSERT INTO `chicken_stock` VALUES ('10', '', 'INTRA FR 2010 0058816', '15', '2010-08-13 00:00:00', '1140', '176', '10', 'III', '140', '10', '1000', '10', 'Kelés', 'INTRA FR 2010 0058816', 'INTRA FR 2010 0058816', '8', 'R 39', '2011-10-31 00:00:00', '2010-08-13 00:00:00', '4', '214254', null, null);

-- ----------------------------
-- Table structure for `chicken_type`
-- ----------------------------
DROP TABLE IF EXISTS `chicken_type`;
CREATE TABLE `chicken_type` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(150) default NULL,
  `code` int(11) default NULL,
  PRIMARY KEY  (`id`)
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
  `id` int(11) NOT NULL auto_increment,
  `serial_number` varchar(45) default NULL,
  `cast_id` int(11) default NULL,
  `type` int(11) default NULL,
  `intended_use` int(11) default NULL,
  `veterinary_code` varchar(150) default NULL,
  `seller_id` int(11) default NULL,
  `sell_date` datetime default NULL,
  `sell_piece` int(11) default NULL,
  `buyer_id` int(11) default NULL,
  `buyer_country_code` varchar(45) default NULL,
  `buyer_intra` varchar(150) default NULL,
  `transporter_plate` varchar(45) default NULL,
  `start_date` datetime default NULL,
  `receiver_id` int(11) default NULL,
  `received` datetime default NULL,
  `received_piece` int(11) default NULL,
  `arrival_date` datetime default NULL,
  `is_deleted` int(11) default NULL,
  `buyer_country_name` varchar(255) default NULL,
  `stmt_1` int(11) default NULL,
  `stmt_1_date` datetime default NULL,
  `stmt_2` int(11) default NULL,
  `stmt_3` int(11) default NULL,
  `vaccine_1` varchar(255) default NULL,
  `vaccine_1_date` datetime default NULL,
  `trunk_1` varchar(255) default NULL,
  `vaccine_2` varchar(255) default NULL,
  `vaccine_2_date` datetime default NULL,
  `trunk_2` varchar(255) default NULL,
  `stmt_4` int(11) default NULL,
  `stmt_5` int(11) default NULL,
  `vaccine_3` varchar(255) default NULL,
  `vaccine_3_date` datetime default NULL,
  `vaccine_4` varchar(255) default NULL,
  `vaccine_4_date` datetime default NULL,
  `stmt_6` int(11) default NULL,
  `comment` text,
  `medical_certificate_date` datetime default NULL,
  `medic_name` varchar(255) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_delivery_cast` (`cast_id`),
  KEY `fk_seller_breeder_site` (`seller_id`),
  KEY `fk_buyer_breeder_site` (`buyer_id`),
  KEY `fk_receiver_breeder_site` (`receiver_id`),
  CONSTRAINT `fk_buyer_breeder_site` FOREIGN KEY (`buyer_id`) REFERENCES `breeder_site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_delivery_cast` FOREIGN KEY (`cast_id`) REFERENCES `cast` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_receiver_breeder_site` FOREIGN KEY (`receiver_id`) REFERENCES `breeder_site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_seller_breeder_site` FOREIGN KEY (`seller_id`) REFERENCES `breeder_site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of delivery
-- ----------------------------
INSERT INTO `delivery` VALUES ('1', '11729718', '10', '1', '1', '139771', '15', '2009-07-09 00:00:00', '0', '8', '', '', 'KUM106', '0000-00-00 00:00:00', '8', '2009-07-09 00:00:00', '0', '2009-07-09 00:00:00', null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `delivery` VALUES ('2', '11728627', '10', '1', '1', '', '15', '2009-07-23 00:00:00', '140', '8', '', '', 'KUM106', '0000-00-00 00:00:00', '8', '2009-07-23 00:00:00', '140', '2009-07-23 00:00:00', null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `delivery` VALUES ('3', '11727901', '10', '1', '1', '202590', '15', '2010-07-16 00:00:00', '3432', '8', '', '', 'KUM-106', '0000-00-00 00:00:00', '8', '2011-07-16 00:00:00', '3432', '2010-07-16 00:00:00', null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `delivery` VALUES ('4', '11726061', '10', '1', '1', '196944', '15', '2010-08-13 00:00:00', '1140', '8', '', '', 'KUM-106', '0000-00-00 00:00:00', '8', '2010-08-13 00:00:00', '1140', '2010-08-13 00:00:00', null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `delivery` VALUES ('5', '12342174', '10', '2', '1', '', '7', '2011-01-20 00:00:00', '16400', '6', '', '', 'ILS-446', '0000-00-00 00:00:00', '6', '2011-01-30 00:00:00', '16400', '2011-01-30 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'a mellékelt vakcinázási program alapján vakcinázva', '2011-01-20 00:00:00', 'Dr. Angyal Sándor');
INSERT INTO `delivery` VALUES ('6', '12343014', '10', '1', '2', '0051679', '9', '2011-03-29 00:00:00', '1100', '12', '', '', '', '0000-00-00 00:00:00', '12', '2011-03-29 00:00:00', '1100', '2011-03-29 00:00:00', '1', '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `delivery` VALUES ('7', '12342183', '10', '2', '1', '', '7', '2011-01-27 00:00:00', null, '6', '', '', 'ILS-446', '0000-00-00 00:00:00', '6', '2011-01-27 00:00:00', '12150', '0000-00-00 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'a mellékelt vakcinázási program szerint', '2011-01-27 00:00:00', 'Dr Angyal Sándor');
INSERT INTO `delivery` VALUES ('8', '12342192', '10', '2', '1', '', '7', '2011-02-03 00:00:00', null, '6', '', '', 'ILS446', '0000-00-00 00:00:00', '6', '2011-02-03 00:00:00', '12000', '2011-02-03 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint.', '2011-02-03 00:00:00', 'Dr Angyal Sándor');
INSERT INTO `delivery` VALUES ('9', '12342204', '10', '2', '1', '', '7', '2011-02-10 00:00:00', null, '6', '', '', 'ILS446', '0000-00-00 00:00:00', '6', '2011-02-10 00:00:00', '12000', '2011-02-10 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '2011-02-10 00:00:00', 'Dr Angyal Sándor');
INSERT INTO `delivery` VALUES ('10', '12342213', '10', '2', '1', '', '7', '2011-02-17 00:00:00', null, '6', '', '', 'ILS446', '0000-00-00 00:00:00', '6', '2011-02-17 00:00:00', '9500', '2011-02-17 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '2011-02-17 00:00:00', 'Dr Angyal Sándor');
INSERT INTO `delivery` VALUES ('11', '13755764', '10', '2', '1', '', '11', '2011-02-15 00:00:00', null, '6', '', '', 'HDB420', '0000-00-00 00:00:00', '6', '0201-02-15 00:00:00', '2500', '2011-02-15 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '2011-02-15 00:00:00', 'Dr Hoczopán Dániel');
INSERT INTO `delivery` VALUES ('12', '13755821', '10', '2', '1', '', '11', '2011-02-22 00:00:00', null, '6', '', '', 'HDB420', '0000-00-00 00:00:00', '6', '2011-02-22 00:00:00', '2000', '2011-02-22 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '2011-02-22 00:00:00', 'Dr Hoczopán Dániel');
INSERT INTO `delivery` VALUES ('13', '12342222', '10', '2', '1', '', '7', '2011-02-24 00:00:00', null, '6', '', '', 'ILS446', '0000-00-00 00:00:00', '6', '2011-02-24 00:00:00', '10000', '2011-02-24 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '2011-02-24 00:00:00', 'Dr Angyal Sándor');
INSERT INTO `delivery` VALUES ('14', '12342231', '10', '2', '1', '', '7', '2011-03-03 00:00:00', null, '6', '', '', 'ILS446', '0000-00-00 00:00:00', '6', '2011-03-03 00:00:00', '13500', '2011-03-03 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '2011-03-03 00:00:00', 'Dr Angyal Sándor');
INSERT INTO `delivery` VALUES ('15', '13755867', '10', '2', '1', '', '11', '0000-00-00 00:00:00', null, '6', '', '', 'HDB420', '0000-00-00 00:00:00', '6', '2011-03-01 00:00:00', '2500', '2011-03-01 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '2011-03-01 00:00:00', 'Dr Hoczopán Dániel');
INSERT INTO `delivery` VALUES ('16', '12342240', '10', '2', '1', '', '7', '2011-03-10 00:00:00', null, '6', '', '', 'ILS446', '0000-00-00 00:00:00', '6', '0000-00-00 00:00:00', '10500', '2011-03-10 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '2011-03-10 00:00:00', 'Dr Angyal Sándor');
INSERT INTO `delivery` VALUES ('17', '13755924', '10', '2', '1', '', '11', '2011-03-08 00:00:00', null, '6', '', '', '', '0000-00-00 00:00:00', '6', '2011-03-08 00:00:00', '2500', '2011-03-08 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '2011-03-08 00:00:00', 'Dr Hoczopán Dániel');
INSERT INTO `delivery` VALUES ('18', '12342259', '10', '2', '1', '', '7', '2011-03-17 00:00:00', null, '6', '', '', 'ILS446', '0000-00-00 00:00:00', '6', '2011-03-17 00:00:00', '9500', '2011-03-17 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '2011-03-17 00:00:00', 'Dr Angyal Sándor');
INSERT INTO `delivery` VALUES ('19', '13756006', '10', '2', '1', '', '11', '2011-03-15 00:00:00', null, '6', '', '', 'HDB420', '0000-00-00 00:00:00', '6', '2011-03-15 00:00:00', '2500', '2011-03-15 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '2011-03-15 00:00:00', 'Dr Hoczopán Dániel');
INSERT INTO `delivery` VALUES ('20', '12343265', '10', '2', '1', '', '7', '2011-03-22 00:00:00', null, '6', '', '', 'ILS446', '0000-00-00 00:00:00', '6', '2011-03-22 00:00:00', '11000', '2011-03-22 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '2011-03-22 00:00:00', 'Dr Angyal Sándor');
INSERT INTO `delivery` VALUES ('21', '13755607', '10', '2', '1', '', '11', '2011-03-22 00:00:00', null, '6', '', '', 'LVP750', '0000-00-00 00:00:00', '6', '2011-03-22 00:00:00', '2500', '2011-03-22 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '2011-03-22 00:00:00', 'Dr Hoczopán Dániel');
INSERT INTO `delivery` VALUES ('22', '12343274', '10', '2', '1', '', '7', '2011-03-30 00:00:00', null, '6', '', '', 'ILS446', '0000-00-00 00:00:00', '6', '2011-03-30 00:00:00', '14300', '2011-03-30 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '2011-03-30 00:00:00', 'Dr Angyal Sándor');
INSERT INTO `delivery` VALUES ('23', '13755755', '10', '2', '1', '', '11', '2011-03-29 00:00:00', null, '6', '', '', 'LUP750', '0000-00-00 00:00:00', '6', '2011-03-29 00:00:00', '2500', '2011-03-29 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '2011-03-29 00:00:00', 'Dr Hoczopán Dániel');
INSERT INTO `delivery` VALUES ('24', '12343283', '10', '2', '1', '', '7', '2011-04-06 00:00:00', null, '6', '', '', 'ILS446', '0000-00-00 00:00:00', '6', '2011-04-06 00:00:00', '12300', '2011-04-06 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint.', '2011-04-06 00:00:00', 'Dr Angyal Sándor');
INSERT INTO `delivery` VALUES ('25', '13755700', '10', '2', '1', '', '17', '2011-04-05 00:00:00', null, '6', '', '', 'LUP750', '0000-00-00 00:00:00', '6', '2011-04-05 00:00:00', '1500', '2011-04-05 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '2011-04-05 00:00:00', 'Dr Hoczopán Dániel');
INSERT INTO `delivery` VALUES ('26', '13755698', '10', '2', '1', '', '11', '2011-04-05 00:00:00', null, '6', '', '', 'LUP750', '0000-00-00 00:00:00', '6', '2011-04-05 00:00:00', '1000', '2011-04-05 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint.', '2011-04-05 00:00:00', 'Dr Hoczopán Dániel.');
INSERT INTO `delivery` VALUES ('27', '12343292', '10', '2', '1', '', '7', '2011-04-13 00:00:00', null, '6', '', '', 'ILS446', '0000-00-00 00:00:00', '6', '2011-04-13 00:00:00', '14300', '2011-04-13 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '0000-00-00 00:00:00', 'Dr Angyal Sándor');
INSERT INTO `delivery` VALUES ('28', '13756024', '10', '2', '1', '', '11', '2011-04-12 00:00:00', null, '6', '', '', 'LUP750', '0000-00-00 00:00:00', '6', '2011-04-12 00:00:00', '2500', '2011-04-12 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '2011-04-12 00:00:00', 'Dr Hoczopán Dániel');
INSERT INTO `delivery` VALUES ('29', '12343304', '10', '2', '1', '', '7', '2011-04-19 00:00:00', null, '6', '', '', 'ILS446', '0000-00-00 00:00:00', '6', '2011-04-19 00:00:00', '14800', '2011-04-19 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint.', '2011-04-19 00:00:00', 'Dr Angyal Sándor');
INSERT INTO `delivery` VALUES ('30', '13756154', '10', '2', '1', '', '11', '2011-04-19 00:00:00', null, '6', '', '', 'LUP750', '0000-00-00 00:00:00', '6', '2011-04-19 00:00:00', '2000', '2011-04-19 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '2011-04-19 00:00:00', 'Dr Angyal Sándor');
INSERT INTO `delivery` VALUES ('31', '12343313', '10', '2', '1', '', '7', '2011-04-26 00:00:00', null, '6', '', '', 'ILS446', '0000-00-00 00:00:00', '6', '2011-04-26 00:00:00', '14000', '2011-04-26 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '2011-04-26 00:00:00', 'Dr Angyal Sándor');
INSERT INTO `delivery` VALUES ('32', '13756181', '10', '2', '1', '', '11', '2011-04-26 00:00:00', null, '6', '', '', 'LUP750', '0000-00-00 00:00:00', '6', '2011-04-26 00:00:00', '2000', '2011-04-26 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '2011-04-26 00:00:00', 'Dr Hoczopán Dániel');
INSERT INTO `delivery` VALUES ('33', '12343322', '10', '2', '1', '', '7', '2011-05-04 00:00:00', null, '6', '', '', 'ILS446', '0000-00-00 00:00:00', '6', '2011-05-04 00:00:00', '14800', '2011-05-04 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '2011-05-04 00:00:00', 'Dr Angyal Sándor');
INSERT INTO `delivery` VALUES ('34', '13756248', '10', '2', '1', '', '11', '2011-05-03 00:00:00', null, '6', '', '', 'LUP750', '0000-00-00 00:00:00', '6', '2011-05-03 00:00:00', '2000', '2011-05-03 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '2011-05-03 00:00:00', 'Dr Hoczopán Dániel');
INSERT INTO `delivery` VALUES ('35', '12343331', '10', '2', '1', '', '7', '2011-05-11 00:00:00', null, '6', '', '', 'ILS446', '0000-00-00 00:00:00', '6', '2011-05-11 00:00:00', '13700', '2011-05-11 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint.', '2011-05-11 00:00:00', 'Dr Angyal Sándor');
INSERT INTO `delivery` VALUES ('36', '13635035', '10', '2', '1', '', '11', '2011-05-08 00:00:00', null, '6', '', '', 'LUP750', '0000-00-00 00:00:00', '6', '2011-05-08 00:00:00', '2300', '2011-05-08 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint.', '2011-05-08 00:00:00', 'Dr Hoczopán Dániel');
INSERT INTO `delivery` VALUES ('37', '12343340', '10', '2', '1', '', '7', '2011-05-18 00:00:00', null, '6', '', '', 'ILS446', '0000-00-00 00:00:00', '6', '2011-05-18 00:00:00', '14300', '2011-05-18 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '2011-05-18 00:00:00', 'Dr Angyal Sándor');
INSERT INTO `delivery` VALUES ('38', '13635101', '10', '2', '1', '', '11', '2011-05-17 00:00:00', null, '6', '', '', 'LUP750', '0000-00-00 00:00:00', '6', '2011-05-17 00:00:00', '2500', '2011-05-17 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint.', '2011-05-17 00:00:00', 'Dr Hoczopán Dániel');
INSERT INTO `delivery` VALUES ('39', '12343359', '10', '2', '1', '', '7', '2011-05-24 00:00:00', null, '6', '', '', 'ILS446', '0000-00-00 00:00:00', '6', '2011-05-24 00:00:00', '14800', '2011-05-24 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '2011-05-24 00:00:00', 'Dr Angyal Sándor');
INSERT INTO `delivery` VALUES ('40', '13635110', '10', '2', '1', '', '11', '2011-05-24 00:00:00', null, '6', '', '', 'LUP750', '0000-00-00 00:00:00', '6', '2011-05-24 00:00:00', '2000', '2011-05-24 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint.', '2011-05-24 00:00:00', 'Dr Hoczopán Dániel');
INSERT INTO `delivery` VALUES ('41', '12343368', '10', '2', '1', '', '6', '2011-06-07 00:00:00', null, '6', '', '', 'ILS446', '0000-00-00 00:00:00', '6', '2011-06-07 00:00:00', '14800', '2011-06-07 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '2011-06-07 00:00:00', 'Dr Angyal Sándor');
INSERT INTO `delivery` VALUES ('42', '13635138', '10', '2', '1', '', '11', '2011-05-31 00:00:00', null, '6', '', '', 'LUP750', '0000-00-00 00:00:00', '6', '2011-05-31 00:00:00', '2000', '2011-05-31 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '2011-05-31 00:00:00', 'Dr Hoczopán Dániel');
INSERT INTO `delivery` VALUES ('43', '12343377', '10', '2', '1', '', '7', '2011-06-14 00:00:00', null, '6', '', '', 'ILS446', '0000-00-00 00:00:00', '6', '2011-06-14 00:00:00', '10900', '2011-06-14 00:00:00', null, '', null, '0000-00-00 00:00:00', null, null, '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', null, null, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', null, 'A mellékelt vakcinázási program szerint', '2011-06-14 00:00:00', 'Dr Angyal Sándor');

-- ----------------------------
-- Table structure for `egg_type`
-- ----------------------------
DROP TABLE IF EXISTS `egg_type`;
CREATE TABLE `egg_type` (
  `id` int(11) NOT NULL auto_increment,
  `code` int(11) default NULL,
  `name` varchar(150) default NULL,
  `price` int(11) default NULL,
  `type` int(11) default NULL,
  `is_for_stock` int(11) default NULL,
  PRIMARY KEY  (`id`)
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
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(150) default NULL,
  `stock_yard_id` int(11) default NULL,
  `created` datetime default NULL,
  `closed` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_fakk_stock_yard` (`stock_yard_id`),
  CONSTRAINT `fk_fakk_stock_yard` FOREIGN KEY (`stock_yard_id`) REFERENCES `stock_yard` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fakk
-- ----------------------------
INSERT INTO `fakk` VALUES ('1', 'kisvárda  keltető fakk 1', '6', '2011-12-28 19:16:54', null);
INSERT INTO `fakk` VALUES ('2', 'döge fakk 1', '7', '2011-12-28 19:34:39', null);

-- ----------------------------
-- Table structure for `holding_capacity`
-- ----------------------------
DROP TABLE IF EXISTS `holding_capacity`;
CREATE TABLE `holding_capacity` (
  `id` int(11) NOT NULL auto_increment,
  `type` varchar(150) default NULL,
  `size` int(11) default NULL,
  `created` datetime default NULL,
  `breeder_site_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
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
  `id` int(11) NOT NULL auto_increment,
  `stock_yard_id` int(11) default NULL,
  `breeder_site_id` int(11) default NULL,
  `created` datetime default NULL,
  `closed` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_hutchin_stockg_yard` USING BTREE (`stock_yard_id`),
  KEY `fk_hutching_breeder_site` USING BTREE (`breeder_site_id`),
  CONSTRAINT `hutching_ibfk_2` FOREIGN KEY (`stock_yard_id`) REFERENCES `stock_yard` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `hutching_ibfk_1` FOREIGN KEY (`breeder_site_id`) REFERENCES `breeder_site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hutching
-- ----------------------------

-- ----------------------------
-- Table structure for `stock_in_fakk`
-- ----------------------------
DROP TABLE IF EXISTS `stock_in_fakk`;
CREATE TABLE `stock_in_fakk` (
  `id` int(11) NOT NULL auto_increment,
  `hutching_id` int(11) default NULL,
  `fakk_id` int(11) default NULL,
  `stock_id` int(11) default NULL,
  `piece` int(11) default NULL,
  `created` datetime default NULL,
  `closed` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_stock_in_fakk_hutching` USING BTREE (`hutching_id`),
  KEY `fk_stock_in_fakk_fakk` USING BTREE (`fakk_id`),
  KEY `fk_stock_in_fakk_stock` USING BTREE (`stock_id`),
  CONSTRAINT `stock_in_fakk_ibfk_1` FOREIGN KEY (`fakk_id`) REFERENCES `fakk` (`id`),
  CONSTRAINT `stock_in_fakk_ibfk_2` FOREIGN KEY (`hutching_id`) REFERENCES `hutching` (`id`),
  CONSTRAINT `stock_in_fakk_ibfk_3` FOREIGN KEY (`stock_id`) REFERENCES `chicken_stock` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stock_in_fakk
-- ----------------------------

-- ----------------------------
-- Table structure for `stock_yard`
-- ----------------------------
DROP TABLE IF EXISTS `stock_yard`;
CREATE TABLE `stock_yard` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `breeder_site_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
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
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(45) default NULL,
  `password` varchar(32) default NULL,
  `role` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '0cc175b9c0f1b6a831c399e269772661', '1');
