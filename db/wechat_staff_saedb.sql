/*
 Navicat Premium Data Transfer

 Source Server         : sae db
 Source Server Type    : MySQL
 Source Server Version : 50623
 Source Host           : pwpqcmewfhlq.rds.sae.sina.com.cn
 Source Database       : wechat_staff

 Target Server Type    : MySQL
 Target Server Version : 50623
 File Encoding         : utf-8

 Date: 09/17/2016 09:57:01 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `tb_building`
-- ----------------------------
DROP TABLE IF EXISTS `tb_building`;
CREATE TABLE `tb_building` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` text,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Building';

-- ----------------------------
--  Records of `tb_building`
-- ----------------------------
BEGIN;
INSERT INTO `tb_building` VALUES ('1', 'MSD', 'MSD B1 at 2nd avenue, TEDA ', '0'), ('2', 'B2', 'B2 at Tianjin University Tech Park', '0'), ('3', 'ABP', 'E1 Buiding at Airport Business Park', '0');
COMMIT;

-- ----------------------------
--  Table structure for `tb_floor`
-- ----------------------------
DROP TABLE IF EXISTS `tb_floor`;
CREATE TABLE `tb_floor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` text,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tb_floor`
-- ----------------------------
BEGIN;
INSERT INTO `tb_floor` VALUES ('1', 'MSD-F27', '27/F, MSD', '0'), ('2', 'MSD-F28', '28/F, MSD', '0'), ('3', 'MSD-F29', '29/F, MSD', '0');
COMMIT;

-- ----------------------------
--  Table structure for `tb_function`
-- ----------------------------
DROP TABLE IF EXISTS `tb_function`;
CREATE TABLE `tb_function` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `function_cd` char(30) NOT NULL,
  `description` text,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `function_cd` (`function_cd`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tb_function`
-- ----------------------------
BEGIN;
INSERT INTO `tb_function` VALUES ('1', 'FUNC_TEST_UNAUTH', 'This function is only for the un-authorization testing purpose. In fact, the function will do not assign to any roles', '0'), ('2', 'FUNC_WECHAT_SCAN_SEAT', 'This function will assing to allow user to scan QR Code on seat for daily seat utilize statistics', '0');
COMMIT;

-- ----------------------------
--  Table structure for `tb_qrcode`
-- ----------------------------
DROP TABLE IF EXISTS `tb_qrcode`;
CREATE TABLE `tb_qrcode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scene_id` int(11) NOT NULL,
  `action_name` varchar(20) NOT NULL,
  `expire_seconds` int(11) DEFAULT NULL,
  `ticket` varchar(200) NOT NULL,
  `scan_result` varchar(200) NOT NULL,
  `scan_limit` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `scene_id` (`scene_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tb_qrcode`
-- ----------------------------
BEGIN;
INSERT INTO `tb_qrcode` VALUES ('1', '1', 'QR_LIMIT_SCENE', null, 'gQHv8DoAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xL3IwVFMyVXJsN1EyVTJJd0FFMmhhAAIEatvSVwMEAAAAAA==', 'http://weixin.qq.com/q/r0TS2Url7Q2U2IwAE2ha', 'ONE_TIME_ONE_DAY'), ('2', '2', 'QR_LIMIT_SCENE', null, 'gQFr8ToAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xL0IwUzFjQjdsbWczampTUzVkR2hhAAIEtdzSVwMEAAAAAA==', 'http://weixin.qq.com/q/B0S1cB7lmg3jjSS5dGha', 'ONE_TIME_ONE_DAY'), ('3', '3', 'QR_LIMIT_SCENE', null, 'gQHm8DoAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xL3NVU0NEQVBsdEEzTldwTGNRMmhhAAIECt3SVwMEAAAAAA==', 'http://weixin.qq.com/q/sUSCDAPltA3NWpLcQ2ha', 'ONE_TIME_ONE_DAY'), ('4', '4', 'QR_LIMIT_SCENE', null, 'gQEe8DoAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xL05FU3laSjNsbnczbUtSZXZjMmhhAAIEbN3SVwMEAAAAAA==', 'http://weixin.qq.com/q/NESyZJ3lnw3mKRevc2ha', 'ONE_TIME_ONE_DAY'), ('5', '5', 'QR_LIMIT_SCENE', null, 'gQE_8DoAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xL29rU3RWTmpsaXczeXlvR1ViR2hhAAIErN3SVwMEAAAAAA==', 'http://weixin.qq.com/q/okStVNjliw3yyoGUbGha', 'ONE_TIME_ONE_DAY');
COMMIT;

-- ----------------------------
--  Table structure for `tb_rel_building_floor`
-- ----------------------------
DROP TABLE IF EXISTS `tb_rel_building_floor`;
CREATE TABLE `tb_rel_building_floor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `building_id` int(11) NOT NULL,
  `floor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tb_rel_building_floor`
-- ----------------------------
BEGIN;
INSERT INTO `tb_rel_building_floor` VALUES ('1', '1', '1'), ('2', '1', '2'), ('3', '1', '3');
COMMIT;

-- ----------------------------
--  Table structure for `tb_rel_floor_seat`
-- ----------------------------
DROP TABLE IF EXISTS `tb_rel_floor_seat`;
CREATE TABLE `tb_rel_floor_seat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `floor_id` int(11) NOT NULL,
  `seat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tb_rel_floor_seat`
-- ----------------------------
BEGIN;
INSERT INTO `tb_rel_floor_seat` VALUES ('1', '2', '1'), ('2', '2', '2'), ('3', '2', '3'), ('4', '2', '4'), ('5', '2', '5'), ('6', '2', '6'), ('7', '2', '7'), ('8', '2', '8'), ('9', '2', '9'), ('10', '2', '10');
COMMIT;

-- ----------------------------
--  Table structure for `tb_rel_qrcode_function`
-- ----------------------------
DROP TABLE IF EXISTS `tb_rel_qrcode_function`;
CREATE TABLE `tb_rel_qrcode_function` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qrcode_id` int(11) NOT NULL,
  `function_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tb_rel_qrcode_function`
-- ----------------------------
BEGIN;
INSERT INTO `tb_rel_qrcode_function` VALUES ('1', '1', '1'), ('2', '2', '2'), ('3', '3', '2'), ('4', '4', '2'), ('5', '5', '2');
COMMIT;

-- ----------------------------
--  Table structure for `tb_rel_qrcode_target`
-- ----------------------------
DROP TABLE IF EXISTS `tb_rel_qrcode_target`;
CREATE TABLE `tb_rel_qrcode_target` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qrcode_id` int(11) NOT NULL,
  `target_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tb_rel_qrcode_target`
-- ----------------------------
BEGIN;
INSERT INTO `tb_rel_qrcode_target` VALUES ('1', '2', '1'), ('2', '3', '2'), ('3', '4', '3'), ('4', '5', '4');
COMMIT;

-- ----------------------------
--  Table structure for `tb_rel_role_function`
-- ----------------------------
DROP TABLE IF EXISTS `tb_rel_role_function`;
CREATE TABLE `tb_rel_role_function` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `function_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tb_rel_role_function`
-- ----------------------------
BEGIN;
INSERT INTO `tb_rel_role_function` VALUES ('1', '1', '2'), ('2', '2', '2');
COMMIT;

-- ----------------------------
--  Table structure for `tb_rel_staff_role`
-- ----------------------------
DROP TABLE IF EXISTS `tb_rel_staff_role`;
CREATE TABLE `tb_rel_staff_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tb_rel_staff_role`
-- ----------------------------
BEGIN;
INSERT INTO `tb_rel_staff_role` VALUES ('1', '1', '1'), ('2', '2', '1'), ('3', '3', '1'), ('4', '4', '1'), ('5', '5', '1'), ('6', '6', '1'), ('7', '7', '1'), ('8', '8', '1'), ('9', '9', '1'), ('10', '10', '1');
COMMIT;

-- ----------------------------
--  Table structure for `tb_rel_user_staff`
-- ----------------------------
DROP TABLE IF EXISTS `tb_rel_user_staff`;
CREATE TABLE `tb_rel_user_staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `open_id` char(50) NOT NULL,
  `pwid` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tb_rel_user_staff`
-- ----------------------------
BEGIN;
INSERT INTO `tb_rel_user_staff` VALUES ('1', 'onuqKvy_VI1nKGG2XFlQJrN2Xf1A', '1436821'), ('2', 'onuqKv0uwt0UfH9EeFGnqLcwWEg8', '1443782'), ('3', 'onuqKvxaoeDZP6byY2bM0Z406pgg\'', '1410382');
COMMIT;

-- ----------------------------
--  Table structure for `tb_role`
-- ----------------------------
DROP TABLE IF EXISTS `tb_role`;
CREATE TABLE `tb_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_cd` char(30) NOT NULL,
  `description` text,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_cd` (`role_cd`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tb_role`
-- ----------------------------
BEGIN;
INSERT INTO `tb_role` VALUES ('1', 'ROLE_WECHAT_USER', 'Normal Wechat User', '0'), ('2', 'ROLE_BOA_SYS_ADMIN', 'Back Office System Admin', '0');
COMMIT;

-- ----------------------------
--  Table structure for `tb_scan_record`
-- ----------------------------
DROP TABLE IF EXISTS `tb_scan_record`;
CREATE TABLE `tb_scan_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pwid` varchar(10) NOT NULL,
  `qrcode_id` int(11) NOT NULL,
  `scan_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tb_scan_record`
-- ----------------------------
BEGIN;
INSERT INTO `tb_scan_record` VALUES ('1', '1436821', '2', '2016-09-12 17:46:04'), ('2', '1436821', '3', '2016-09-12 20:20:57'), ('3', '1436821', '2', '2016-09-13 10:17:48'), ('4', '1443782', '3', '2016-09-13 10:18:27'), ('5', '1436821', '4', '2016-09-13 10:18:39'), ('6', '1443782', '2', '2016-09-13 10:20:40'), ('7', '1436821', '2', '2016-09-14 23:14:00'), ('8', '1436821', '4', '2016-09-14 23:14:10'), ('9', '1436821', '5', '2016-09-14 23:14:17'), ('10', '1436821', '2', '2016-09-16 16:14:55'), ('11', '1436821', '4', '2016-09-16 18:03:51'), ('12', '1436821', '5', '2016-09-16 18:04:00');
COMMIT;

-- ----------------------------
--  Table structure for `tb_seat`
-- ----------------------------
DROP TABLE IF EXISTS `tb_seat`;
CREATE TABLE `tb_seat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` text,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tb_seat`
-- ----------------------------
BEGIN;
INSERT INTO `tb_seat` VALUES ('1', 'MSD-F28-001', 'Seat 001 at 28/F, MSD', '0'), ('2', 'MSD-F28-002', 'Seat 002 at 28/F, MSD', '0'), ('3', 'MSD-F28-003', 'Seat 003 at 28/F, MSD', '0'), ('4', 'MSD-F28-004', 'Seat 004 at 28/F, MSD', '0'), ('5', 'MSD-F28-005', 'Seat 005 at 28/F, MSD', '0'), ('6', 'MSD-F28-006', 'Seat 006 at 28/F, MSD', '0'), ('7', 'MSD-F28-007', 'Seat 007 at 28/F, MSD', '0'), ('8', 'MSD-F28-008', 'Seat 008 at 28/F, MSD', '0'), ('9', 'MSD-F28-009', 'Seat 009 at 28/F, MSD', '0'), ('10', 'MSD-F28-010', 'Seat 010 at 28/F, MSD', '0');
COMMIT;

-- ----------------------------
--  Table structure for `tb_staff`
-- ----------------------------
DROP TABLE IF EXISTS `tb_staff`;
CREATE TABLE `tb_staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pwid` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `cost_centre` varchar(30) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pwid` (`pwid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tb_staff`
-- ----------------------------
BEGIN;
INSERT INTO `tb_staff` VALUES ('1', '1436821', 'Cui, Yuanlong', 'CBSD', '8903', '0'), ('2', '1410382', 'Luo, Tiancheng', 'CBSD', '8903', '0'), ('3', '1403641', 'Yan, Dora', 'CBSD', '8903', '0'), ('4', '1403130', 'Li, Berry Ran', 'CBSD', '8903', '0'), ('5', '1385278', 'Liang, Wenjun', 'CBSD', '8903', '0'), ('6', '1511269', 'Kang, Fiona', 'CBSD', '8903', '0'), ('7', '1519132', 'Jiang, Na', 'CBSD', '8903', '0'), ('8', '1443782', 'Zhang,Edward Tiger Chen', 'Property', '9816', '0'), ('9', '1457577', 'Ma, Kevin Yuxuan', 'Property', '9816', '0'), ('10', '1477748', 'Wang, Tony Tong', 'CA', '9807', '0');
COMMIT;

-- ----------------------------
--  Table structure for `tb_wechat_user`
-- ----------------------------
DROP TABLE IF EXISTS `tb_wechat_user`;
CREATE TABLE `tb_wechat_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `open_id` char(50) NOT NULL,
  `nickname` char(30) DEFAULT NULL,
  `head_img_url` char(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `open_id` (`open_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tb_wechat_user`
-- ----------------------------
BEGIN;
INSERT INTO `tb_wechat_user` VALUES ('2', 'onuqKvy_VI1nKGG2XFlQJrN2Xf1A', '解味道人', 'http://wx.qlogo.cn/mmopen/0nn3FBrD9a08yve8JlQAqRlAQ0Mb6oSoD6dkrk6FoGCGKzpzhaPzTyEaSfESD5tkrbXPDpiaib6jedHZSmYlLOcw/0', '0'), ('3', 'onuqKvxaoeDZP6byY2bM0Z406pgg', 'ltiancheng', 'http://wx.qlogo.cn/mmopen/Q3auHgzwzM4VKAcF1aY7Fbcr5C6yhUgkWrAuHJ6zJYEA0z2slPgcBo8Bp9qJOjglDNl71CLBPIdNpWXpEWBOpQ/0', '0'), ('4', 'onuqKv0uwt0UfH9EeFGnqLcwWEg8', 'E-T', 'http://wx.qlogo.cn/mmopen/10ib3IDY78kKnibBbWnRYaRtaZiaxVEoZku1fGACqlvMUCQUSibvzmAl6ibttHpSEgrTxqQjGLWjLWh5diaRqTFWlF5IPkU8kCIeOo/0', '0'), ('5', 'onuqKvxyOVgkUkIrexChjcm3whMs', '朱爱华', '', '0');
COMMIT;

-- ----------------------------
--  View structure for `vw_auth_user_qrcode`
-- ----------------------------
DROP VIEW IF EXISTS `vw_auth_user_qrcode`;
CREATE ALGORITHM=UNDEFINED DEFINER=`staff_admin`@`10.%` SQL SECURITY DEFINER VIEW `vw_auth_user_qrcode` AS select `a`.`open_id` AS `auth_open_id`,`a`.`pwid` AS `auth_pwid`,`g`.`qrcode_id` AS `auth_qrcode_id` from ((((((`tb_rel_user_staff` `a` join `tb_staff` `b`) join `tb_rel_staff_role` `c`) join `tb_role` `d`) join `tb_rel_role_function` `e`) join `tb_function` `f`) join `tb_rel_qrcode_function` `g`) where ((`a`.`pwid` = `b`.`pwid`) and (`b`.`id` = `c`.`staff_id`) and (`c`.`role_id` = `d`.`id`) and (`d`.`id` = `e`.`role_id`) and (`e`.`function_id` = `f`.`id`) and (`f`.`id` = `g`.`function_id`));

-- ----------------------------
--  View structure for `vw_building_floor_seat`
-- ----------------------------
DROP VIEW IF EXISTS `vw_building_floor_seat`;
CREATE ALGORITHM=UNDEFINED DEFINER=`staff_admin`@`10.%` SQL SECURITY DEFINER VIEW `vw_building_floor_seat` AS select `a`.`id` AS `seat_id`,`a`.`name` AS `seat_name`,`a`.`description` AS `seat_desc`,`a`.`status` AS `seat_status`,`c`.`id` AS `floor_id`,`c`.`name` AS `floor_name`,`e`.`id` AS `building_id`,`e`.`name` AS `building_name` from ((((`tb_seat` `a` join `tb_rel_floor_seat` `b`) join `tb_floor` `c`) join `tb_rel_building_floor` `d`) join `tb_building` `e`) where ((`a`.`id` = `b`.`seat_id`) and (`c`.`id` = `b`.`floor_id`) and (`c`.`id` = `d`.`floor_id`) and (`e`.`id` = `d`.`building_id`) and (`c`.`status` = 0) and (`e`.`status` = 0));

-- ----------------------------
--  View structure for `vw_seat_qrcode`
-- ----------------------------
DROP VIEW IF EXISTS `vw_seat_qrcode`;
CREATE ALGORITHM=UNDEFINED DEFINER=`staff_admin`@`10.%` SQL SECURITY DEFINER VIEW `vw_seat_qrcode` AS select `a`.`seat_id` AS `seat_id`,`a`.`seat_name` AS `seat_name`,`a`.`seat_desc` AS `seat_desc`,`a`.`seat_status` AS `seat_status`,`a`.`floor_id` AS `floor_id`,`a`.`floor_name` AS `floor_name`,`a`.`building_id` AS `building_id`,`a`.`building_name` AS `building_name`,`b`.`qrcode_id` AS `qrcode_id` from (`vw_building_floor_seat` `a` left join `tb_rel_qrcode_target` `b` on((`a`.`seat_id` = `b`.`target_id`)));

-- ----------------------------
--  View structure for `vw_user_staff`
-- ----------------------------
DROP VIEW IF EXISTS `vw_user_staff`;
CREATE ALGORITHM=UNDEFINED DEFINER=`staff_admin`@`10.%` SQL SECURITY DEFINER VIEW `vw_user_staff` AS select `a`.`open_id` AS `open_id`,`a`.`nickname` AS `nickname`,`a`.`head_img_url` AS `head_img_url`,`c`.`pwid` AS `pwid`,`c`.`name` AS `name` from ((`tb_wechat_user` `a` join `tb_rel_user_staff` `b`) join `tb_staff` `c`) where ((`a`.`open_id` = `b`.`open_id`) and (`c`.`pwid` = `b`.`pwid`));

SET FOREIGN_KEY_CHECKS = 1;
