/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : abconnect

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 03/04/2020 13:00:49
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
BEGIN;
INSERT INTO `auth_assignment` VALUES ('Admin', '54', 1530513074);
INSERT INTO `auth_assignment` VALUES ('Admin', '55', 1530518110);
INSERT INTO `auth_assignment` VALUES ('User', '39', 1529637276);
INSERT INTO `auth_assignment` VALUES ('User', '40', 1529638744);
INSERT INTO `auth_assignment` VALUES ('User', '41', 1529640043);
INSERT INTO `auth_assignment` VALUES ('User', '42', 1529646357);
INSERT INTO `auth_assignment` VALUES ('User', '43', 1529901561);
INSERT INTO `auth_assignment` VALUES ('User', '44', 1529901624);
INSERT INTO `auth_assignment` VALUES ('User', '45', 1529901647);
INSERT INTO `auth_assignment` VALUES ('User', '46', 1529901687);
INSERT INTO `auth_assignment` VALUES ('User', '47', 1529904077);
INSERT INTO `auth_assignment` VALUES ('User', '48', 1529904241);
INSERT INTO `auth_assignment` VALUES ('User', '49', 1529905140);
INSERT INTO `auth_assignment` VALUES ('User', '50', 1529909124);
INSERT INTO `auth_assignment` VALUES ('User', '51', 1529914256);
INSERT INTO `auth_assignment` VALUES ('User', '52', 1530511636);
INSERT INTO `auth_assignment` VALUES ('User', '53', 1530512712);
INSERT INTO `auth_assignment` VALUES ('User', '56', 1530520972);
COMMIT;

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
BEGIN;
INSERT INTO `auth_item` VALUES ('Admin', 1, 'ผู้ดูแลระบบ', NULL, NULL, 1516607709, 1516607709);
INSERT INTO `auth_item` VALUES ('Office', 1, 'ฝ่ายบริหารและหัวหน้างาน', NULL, NULL, 1516607709, 1516607709);
INSERT INTO `auth_item` VALUES ('Staff', 1, 'ช่างและผู้ดำเงินงานซ่อม', NULL, NULL, 1516607709, 1516607709);
INSERT INTO `auth_item` VALUES ('User', 1, 'เจ้าหน้าที่ทั่วไป', NULL, NULL, 1516607709, 1516607709);
COMMIT;

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
BEGIN;
INSERT INTO `auth_item_child` VALUES ('Admin', 'Office');
INSERT INTO `auth_item_child` VALUES ('Office', 'Staff');
INSERT INTO `auth_item_child` VALUES ('Staff', 'User');
COMMIT;

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) DEFAULT NULL,
  `add_line1` varchar(255) DEFAULT NULL,
  `add_line2` varchar(255) DEFAULT NULL,
  `add_line3` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `customer_detail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer
-- ----------------------------
BEGIN;
INSERT INTO `customer` VALUES (2, 'โรงพยาบาลผักให่', NULL, NULL, NULL, NULL, 'test detail');
INSERT INTO `customer` VALUES (4, 'โรงพยาบาลบ้านแพรก', NULL, NULL, NULL, NULL, '');
INSERT INTO `customer` VALUES (5, 'โรงพยาบาลมหาราช', NULL, NULL, NULL, NULL, '');
INSERT INTO `customer` VALUES (6, 'โรงพยาบาลอุทัย', NULL, NULL, NULL, NULL, '');
INSERT INTO `customer` VALUES (7, 'โรงพยาบาลบางปะอิน', '72 หมู่ที่ 11 ต.บ้านเลน', 'อ.บางปะอิน จ.พระนครศรีอยุธยา ', '13160', '035-261173,035-261174', '');
INSERT INTO `customer` VALUES (8, 'โรงพยาบาลวังน้อย', '100 หมู่ที่ 5 ตำบลลำไทร', 'อำเภอวังน้อย จังหวัดพระนครศรีอยุธยา', '13170', '035-271033', '');
INSERT INTO `customer` VALUES (9, 'โรงพยาบาลบางซ้าย', '', '', '', '', '');
COMMIT;

-- ----------------------------
-- Table structure for job
-- ----------------------------
DROP TABLE IF EXISTS `job`;
CREATE TABLE `job` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_name` varchar(255) DEFAULT NULL,
  `etc` varchar(255) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total_price` double(10,2) DEFAULT NULL,
  `total_cost` double(10,2) DEFAULT NULL,
  `total_profit` double(10,2) DEFAULT NULL,
  `job_date` date DEFAULT NULL,
  `job_update_date` date DEFAULT NULL,
  `user_create` int(2) DEFAULT NULL,
  `doc_num` varchar(10) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `user_update` int(2) DEFAULT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of job
-- ----------------------------
BEGIN;
INSERT INTO `job` VALUES (4, 'จอ touch screen และ printer', '', 7, 21800.00, 16750.00, 5050.00, '2020-02-28', '2020-02-28', 55, '2563004', 'n', 55);
INSERT INTO `job` VALUES (5, 'Battery NB Dell 5421 Hi-Power', '', 6, 1600.00, 1010.00, 590.00, '2020-03-11', '2020-03-11', 55, '2563005', 'y', 55);
INSERT INTO `job` VALUES (6, 'printer slip', '', 2, 12400.00, 11200.00, 1200.00, '2020-03-09', '2020-03-11', 55, '2563006', 'y', 55);
INSERT INTO `job` VALUES (7, 'web cam รพ.วังน้อย', '', 8, 8000.00, 6590.00, 1410.00, '2020-03-13', '2020-03-13', 55, '2563007', 'y', 55);
INSERT INTO `job` VALUES (8, 'webcam รพ อุทัย', '', 6, 8000.00, 6590.00, 1410.00, '2020-03-13', '2020-03-13', 55, '2563008', 'y', 55);
INSERT INTO `job` VALUES (9, 'web cam รพ.ผักให่', '', 2, 8000.00, 6590.00, 1410.00, '2020-03-13', '2020-03-13', 55, '2563009', 'n', 55);
INSERT INTO `job` VALUES (10, 'webcam โรงพยาบาลบางซ้าย', '', 9, 8000.00, 6590.00, 1410.00, '2020-03-13', '2020-03-13', 55, '25630010', 'n', NULL);
INSERT INTO `job` VALUES (11, 'switch และสายclinic covid วังน้อย', '', 8, 8440.00, 6440.00, 2000.00, '2020-03-15', '2020-03-16', 55, '25630011', 'n', NULL);
INSERT INTO `job` VALUES (12, 'อะไหล่computer', '', 7, NULL, NULL, 0.00, '2020-03-16', '2020-03-16', 55, '25630012', 'n', 55);
COMMIT;

-- ----------------------------
-- Table structure for job_detail
-- ----------------------------
DROP TABLE IF EXISTS `job_detail`;
CREATE TABLE `job_detail` (
  `job_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) DEFAULT NULL,
  `job_detail` varchar(255) DEFAULT '',
  `product_id` int(11) DEFAULT NULL,
  `product_detail` varchar(255) DEFAULT '',
  `cost` double(10,2) DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `num` int(2) DEFAULT NULL,
  `total_cost` double(10,2) DEFAULT NULL,
  `total_price` double(10,2) DEFAULT NULL,
  `user_create` int(2) DEFAULT NULL,
  `user_update` int(2) DEFAULT NULL,
  PRIMARY KEY (`job_detail_id`),
  KEY `job_id` (`job_id`),
  CONSTRAINT `delete_jod_detail` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of job_detail
-- ----------------------------
BEGIN;
INSERT INTO `job_detail` VALUES (1, 4, 'Monitor 23.8\'\' DELL P2418HT (IPS, HDMI)', NULL, 'https://www.advice.co.th/product/monitor-22-quot-24-5-quot-/monitor-23-8-24-5-/monitor-23-8-dell-p2418ht-ips-hdmi-', 11200.00, 14800.00, 1, 11200.00, 14800.00, 55, NULL);
INSERT INTO `job_detail` VALUES (2, 4, 'Printer Slip EPSON TM-T82 (Port USB)', NULL, 'https://www.advice.co.th/product/barcode-printer/printer/printer-slip-epson-tm-t82-port-usb-', 5550.00, 7000.00, 1, 5550.00, 7000.00, 55, NULL);
INSERT INTO `job_detail` VALUES (3, 6, 'Printer Slip EPSON TM-T82 (Port USB)', NULL, '', 5600.00, 6200.00, 1, 5600.00, 6200.00, 55, NULL);
INSERT INTO `job_detail` VALUES (4, 5, 'Battery NB Dell 5421 Hi-Power', NULL, '', 1010.00, 1600.00, 1, 1010.00, 1600.00, 55, NULL);
INSERT INTO `job_detail` VALUES (5, 7, 'CONFERENCE CAM LOGITECH (BCC950)', NULL, '', 6590.00, 8000.00, 1, 6590.00, 8000.00, 55, NULL);
INSERT INTO `job_detail` VALUES (6, 8, 'CONFERENCE CAM LOGITECH (BCC950)', NULL, '', 6590.00, 8000.00, 1, 6590.00, 8000.00, 55, NULL);
INSERT INTO `job_detail` VALUES (7, 6, 'Printer Slip EPSON TM-T82 (Port USB)', NULL, '', 5600.00, 6200.00, 1, 5600.00, 6200.00, 55, NULL);
INSERT INTO `job_detail` VALUES (8, 9, 'CONFERENCE CAM LOGITECH (BCC950)', NULL, '', 6590.00, 8000.00, 1, 6590.00, 8000.00, 55, NULL);
INSERT INTO `job_detail` VALUES (9, 10, 'CONFERENCE CAM LOGITECH (BCC950)', NULL, '', 6590.00, 8000.00, 1, 6590.00, 8000.00, 55, NULL);
INSERT INTO `job_detail` VALUES (10, 11, 'Gigabit Switching Hub TP-LINK (T1500G-10MPS) 8 Port PoE 2 port SFP (11\")', NULL, '', 4400.00, 5800.00, 1, 4400.00, 5800.00, 55, NULL);
INSERT INTO `job_detail` VALUES (11, 11, 'สาย utp 5e', NULL, '', 2040.00, 2640.00, 1, 2040.00, 2640.00, 55, NULL);
COMMIT;

-- ----------------------------
-- Table structure for job_detail_list
-- ----------------------------
DROP TABLE IF EXISTS `job_detail_list`;
CREATE TABLE `job_detail_list` (
  `job_detail_list_id` int(11) NOT NULL,
  `job_detail_id` int(11) DEFAULT NULL,
  `line1` varchar(255) DEFAULT NULL,
  `line2` varchar(255) DEFAULT NULL,
  `line3` varchar(255) DEFAULT NULL,
  `line4` varchar(255) DEFAULT NULL,
  `line5` varchar(255) DEFAULT NULL,
  `line6` varchar(255) DEFAULT NULL,
  `line7` varchar(255) DEFAULT NULL,
  `line8` varchar(255) DEFAULT NULL,
  `line9` varchar(255) DEFAULT NULL,
  `line10` varchar(255) DEFAULT NULL,
  `waranty` varchar(255) DEFAULT NULL,
  `user_create` int(2) DEFAULT NULL,
  `user_update` int(2) DEFAULT NULL,
  PRIMARY KEY (`job_detail_list_id`),
  KEY `job_detail_link` (`job_detail_id`),
  CONSTRAINT `job_detail_link` FOREIGN KEY (`job_detail_id`) REFERENCES `job_detail` (`job_detail_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) DEFAULT '',
  `product_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
BEGIN;
INSERT INTO `product` VALUES (2, 'Cisco SG220-50', 1);
INSERT INTO `product` VALUES (3, 'ทดสอบ', 2);
COMMIT;

-- ----------------------------
-- Table structure for product_type
-- ----------------------------
DROP TABLE IF EXISTS `product_type`;
CREATE TABLE `product_type` (
  `product_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_type_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`product_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_type
-- ----------------------------
BEGIN;
INSERT INTO `product_type` VALUES (1, 'L2 switch');
INSERT INTO `product_type` VALUES (2, 'Wifi Accesspoint');
COMMIT;

-- ----------------------------
-- Table structure for system_user
-- ----------------------------
DROP TABLE IF EXISTS `system_user`;
CREATE TABLE `system_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password_hash` varchar(128) NOT NULL,
  `password_reset_token` varchar(255) NOT NULL,
  `email` varchar(100) CHARACTER SET tis620 NOT NULL,
  `auth_key` varchar(128) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL DEFAULT '0',
  `role` varchar(30) CHARACTER SET tis620 NOT NULL DEFAULT '1',
  `fullname` varchar(255) CHARACTER SET tis620 DEFAULT NULL,
  `cid` varchar(13) CHARACTER SET tis620 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of system_user
-- ----------------------------
BEGIN;
INSERT INTO `system_user` VALUES (55, 'bomkeen', '$2y$13$ca3tu4jodyugMorPBhW4LO2EEeclw8Anodass4g2KrqXKYWIVhGxC', '', 'bomkeendata@gmail.com', '-JIYBzFBd-fZViBN7rYvKaM57_P1PkGi', '2018-07-02 14:55:10', '2018-07-02 14:55:10', 10, 'Admin', 'พีรกาจ พูลสวัสดิ์', '1111111111111');
COMMIT;

-- ----------------------------
-- Table structure for system_user_profile
-- ----------------------------
DROP TABLE IF EXISTS `system_user_profile`;
CREATE TABLE `system_user_profile` (
  `user_id` int(11) NOT NULL,
  `tel` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dep_id` int(11) DEFAULT NULL,
  `dep_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `system_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
