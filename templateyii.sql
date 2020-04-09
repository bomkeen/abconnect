/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50525
Source Host           : 127.0.0.1:3306
Source Database       : templateyii

Target Server Type    : MYSQL
Target Server Version : 50525
File Encoding         : 65001

Date: 2019-07-17 14:02:13
*/

SET FOREIGN_KEY_CHECKS=0;

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
INSERT INTO `auth_assignment` VALUES ('Admin', '54', '1530513074');
INSERT INTO `auth_assignment` VALUES ('Admin', '55', '1530518110');
INSERT INTO `auth_assignment` VALUES ('User', '39', '1529637276');
INSERT INTO `auth_assignment` VALUES ('User', '40', '1529638744');
INSERT INTO `auth_assignment` VALUES ('User', '41', '1529640043');
INSERT INTO `auth_assignment` VALUES ('User', '42', '1529646357');
INSERT INTO `auth_assignment` VALUES ('User', '43', '1529901561');
INSERT INTO `auth_assignment` VALUES ('User', '44', '1529901624');
INSERT INTO `auth_assignment` VALUES ('User', '45', '1529901647');
INSERT INTO `auth_assignment` VALUES ('User', '46', '1529901687');
INSERT INTO `auth_assignment` VALUES ('User', '47', '1529904077');
INSERT INTO `auth_assignment` VALUES ('User', '48', '1529904241');
INSERT INTO `auth_assignment` VALUES ('User', '49', '1529905140');
INSERT INTO `auth_assignment` VALUES ('User', '50', '1529909124');
INSERT INTO `auth_assignment` VALUES ('User', '51', '1529914256');
INSERT INTO `auth_assignment` VALUES ('User', '52', '1530511636');
INSERT INTO `auth_assignment` VALUES ('User', '53', '1530512712');
INSERT INTO `auth_assignment` VALUES ('User', '56', '1530520972');

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
INSERT INTO `auth_item` VALUES ('Admin', '1', 'ผู้ดูแลระบบ', null, null, '1516607709', '1516607709');
INSERT INTO `auth_item` VALUES ('Office', '1', 'ฝ่ายบริหารและหัวหน้างาน', null, null, '1516607709', '1516607709');
INSERT INTO `auth_item` VALUES ('Staff', '1', 'ช่างและผู้ดำเงินงานซ่อม', null, null, '1516607709', '1516607709');
INSERT INTO `auth_item` VALUES ('User', '1', 'เจ้าหน้าที่ทั่วไป', null, null, '1516607709', '1516607709');

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
INSERT INTO `auth_item_child` VALUES ('Admin', 'Office');
INSERT INTO `auth_item_child` VALUES ('Office', 'Staff');
INSERT INTO `auth_item_child` VALUES ('Staff', 'User');

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
-- Records of auth_rule
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of system_user
-- ----------------------------
INSERT INTO `system_user` VALUES ('55', 'bomkeen', '$2y$13$ca3tu4jodyugMorPBhW4LO2EEeclw8Anodass4g2KrqXKYWIVhGxC', '', 'bomkeendata@gmail.com', '-JIYBzFBd-fZViBN7rYvKaM57_P1PkGi', '2018-07-02 14:55:10', '2018-07-02 14:55:10', '10', 'Admin', 'พีรกาจ พูลสวัสดิ์', '1111111111111');
INSERT INTO `system_user` VALUES ('56', 'user', '$2y$13$7GlDgM2BeWy2RtP4quN4OePgr/27ucESwR1atxVN6Am59UHhGfQlG', '', 'bomkeendata@gmail.com', 'zhVJqVsaS9xGjUbQQxLjtw04tGPjH9-0', '2018-07-02 15:42:52', '2018-07-02 15:42:52', '10', 'User', 'Peeragad Poonsawat', '1111111111111');

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

-- ----------------------------
-- Records of system_user_profile
-- ----------------------------
