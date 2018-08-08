/*
Navicat MySQL Data Transfer

Source Server         : sjk
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : jc

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-08-08 21:13:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for jc_cates
-- ----------------------------
DROP TABLE IF EXISTS `jc_cates`;
CREATE TABLE `jc_cates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `classname` char(50) COLLATE utf8_bin DEFAULT NULL,
  `path` char(20) COLLATE utf8_bin DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8_bin DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of jc_cates
-- ----------------------------
INSERT INTO `jc_cates` VALUES ('1', '0', '小米手机', '0', '1', '2018-07-03 00:05:10', '2018-07-24 09:21:33', null);
INSERT INTO `jc_cates` VALUES ('2', '1', '小米旗舰手机', '0,1', '1', '2018-07-03 00:05:29', '2018-07-03 12:02:21', null);
INSERT INTO `jc_cates` VALUES ('3', '1', '红米系列', '0,1', '1', '2018-07-03 00:05:49', '2018-07-03 12:02:28', null);
INSERT INTO `jc_cates` VALUES ('17', '0', '智能家居', '0', '1', '2018-07-12 19:35:26', '2018-07-12 19:35:26', null);
INSERT INTO `jc_cates` VALUES ('5', '0', '小米平板与电视', '0', '1', '2018-07-03 00:06:45', '2018-07-03 12:02:45', null);
INSERT INTO `jc_cates` VALUES ('10', '5', '小米电视', '0,5', '1', '2018-07-04 00:09:53', '2018-07-04 00:09:53', null);
INSERT INTO `jc_cates` VALUES ('15', '0', '小米生活', '0', '1', '2018-07-12 12:13:35', '2018-07-12 12:13:35', null);
INSERT INTO `jc_cates` VALUES ('16', '15', '小米生活方式', '0,15', '1', '2018-07-12 12:14:12', '2018-07-12 12:14:12', null);
INSERT INTO `jc_cates` VALUES ('14', '5', '小米平板 笔记本', '0,5', '1', '2018-07-12 00:25:40', '2018-07-15 16:25:03', null);
INSERT INTO `jc_cates` VALUES ('18', '17', '家居硬件', '0,17', '1', '2018-07-12 19:36:00', '2018-07-12 19:36:00', null);

-- ----------------------------
-- Table structure for jc_collects
-- ----------------------------
DROP TABLE IF EXISTS `jc_collects`;
CREATE TABLE `jc_collects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jc_collects
-- ----------------------------
INSERT INTO `jc_collects` VALUES ('52', '37', '13', '2018-07-23 16:03:36', '2018-07-23 16:03:36', null);
INSERT INTO `jc_collects` VALUES ('57', '50', '37', '2018-07-23 23:00:10', '2018-07-23 23:00:10', null);
INSERT INTO `jc_collects` VALUES ('58', '52', '38', '2018-07-23 23:00:22', '2018-07-23 23:00:22', null);
INSERT INTO `jc_collects` VALUES ('60', '55', '10', '2018-07-24 09:50:42', '2018-07-24 09:50:42', null);
INSERT INTO `jc_collects` VALUES ('61', '55', '38', '2018-07-24 09:50:51', '2018-07-24 09:50:51', null);

-- ----------------------------
-- Table structure for jc_configs
-- ----------------------------
DROP TABLE IF EXISTS `jc_configs`;
CREATE TABLE `jc_configs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `net_name` char(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '网站配置',
  `net_keyword` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `net_phone` varchar(15) DEFAULT NULL,
  `copyright` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `onoff` enum('1','0') CHARACTER SET utf8 COLLATE utf8_bin DEFAULT '1' COMMENT '1开启 0关闭',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jc_configs
-- ----------------------------
INSERT INTO `jc_configs` VALUES ('1', '京城商城', 'php204 兄弟连 it IT Mysql PHP LAMP\r\n商城 手机  电脑  小米', '183-5510-9818', '©京城仿小米商城 ', '/uploads/logo/20180718/WHjXewoeJoTgFMKkqrjm.gif', '1', null, '2018-07-24 16:44:51', null);

-- ----------------------------
-- Table structure for jc_discuss
-- ----------------------------
DROP TABLE IF EXISTS `jc_discuss`;
CREATE TABLE `jc_discuss` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `content` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `rank` enum('3','2','1') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jc_discuss
-- ----------------------------
INSERT INTO `jc_discuss` VALUES ('31', '0', '4', '匿名用户', '2018-07-22 05:37:44', null, '2018-07-22 05:37:44', '3');
INSERT INTO `jc_discuss` VALUES ('34', '0', '43', '小米8SE就是比8好', '2018-07-22 06:19:54', null, '2018-07-22 06:19:54', '3');
INSERT INTO `jc_discuss` VALUES ('35', '0', '32', '扫的干净', '2018-07-22 06:20:08', null, '2018-07-22 06:20:08', '3');
INSERT INTO `jc_discuss` VALUES ('36', '0', '21', '给小孩玩孩子不哭了', '2018-07-22 06:22:13', null, '2018-07-22 06:22:13', '3');
INSERT INTO `jc_discuss` VALUES ('37', '0', '29', '米家电磁炉就是好', '2018-07-22 06:41:35', null, '2018-07-22 06:41:35', '3');
INSERT INTO `jc_discuss` VALUES ('41', '0', '30', '高像素高品质', '2018-07-22 07:38:40', null, '2018-07-22 07:38:40', '3');
INSERT INTO `jc_discuss` VALUES ('42', '0', '20', '水很干净', '2018-07-22 09:50:58', null, '2018-07-22 09:50:58', '3');
INSERT INTO `jc_discuss` VALUES ('43', '0', '41', '1000万高清像素', '2018-07-22 09:53:17', null, '2018-07-22 09:53:17', '3');
INSERT INTO `jc_discuss` VALUES ('44', '0', '46', '光亮很足', '2018-07-22 09:53:49', null, '2018-07-22 09:53:49', '3');
INSERT INTO `jc_discuss` VALUES ('45', '0', '31', '米家驱蚊器 杠杠的', '2018-07-22 09:54:12', null, '2018-07-22 09:54:12', '3');
INSERT INTO `jc_discuss` VALUES ('46', '0', '28', '只能摄像头就是好', '2018-07-22 09:54:31', null, '2018-07-22 09:54:31', '3');
INSERT INTO `jc_discuss` VALUES ('47', '0', '22', '很方便', '2018-07-22 09:55:26', null, '2018-07-22 09:55:26', '3');
INSERT INTO `jc_discuss` VALUES ('48', '0', '23', '很柔软 很舒服', '2018-07-22 09:55:54', null, '2018-07-22 09:55:54', '3');
INSERT INTO `jc_discuss` VALUES ('49', '0', '17', '酷酷哒', '2018-07-22 09:56:12', null, '2018-07-22 09:56:12', '3');
INSERT INTO `jc_discuss` VALUES ('50', '0', '15', '高端大气上档次', '2018-07-22 09:56:43', null, '2018-07-22 09:56:43', '3');
INSERT INTO `jc_discuss` VALUES ('51', '0', '14', '远程遥控就是牛', '2018-07-22 09:57:03', null, '2018-07-22 09:57:03', '3');
INSERT INTO `jc_discuss` VALUES ('52', '0', '12', '空气清新 心情都好了', '2018-07-22 09:57:30', null, '2018-07-22 09:57:30', '3');
INSERT INTO `jc_discuss` VALUES ('53', '0', '4', '匿名用户好评', '2018-07-23 14:14:34', null, '2018-07-23 14:14:34', '2');
INSERT INTO `jc_discuss` VALUES ('58', '37', '38', '电视很大 啊', '2018-07-23 23:06:17', null, '2018-07-23 16:58:57', '3');
INSERT INTO `jc_discuss` VALUES ('69', '37', '4', '非凡气质，值得拥有 ', '2018-07-24 09:25:34', null, '2018-07-24 09:25:34', '3');
INSERT INTO `jc_discuss` VALUES ('70', '37', '33', '同是九年义务教育，你咋这么优秀 ', '2018-07-24 09:27:38', null, '2018-07-24 09:27:38', '3');
INSERT INTO `jc_discuss` VALUES ('71', '37', '53', '你月球，我地球，坚定不移陪你走', '2018-07-24 09:28:36', null, '2018-07-24 09:28:36', '3');
INSERT INTO `jc_discuss` VALUES ('72', '37', '4', '我要认真写好每一份评价', '2018-07-24 09:29:46', null, '2018-07-24 09:29:46', '3');
INSERT INTO `jc_discuss` VALUES ('73', '37', '10', '外形比想象中好看', '2018-07-24 09:33:56', null, '2018-07-24 09:33:56', '3');
INSERT INTO `jc_discuss` VALUES ('74', '37', '4', '一如既往的好好', '2018-07-24 09:52:57', null, '2018-07-24 09:39:42', '3');
INSERT INTO `jc_discuss` VALUES ('75', '56', '5', '真羡慕你能有大屏大电量的手机，不像我( T___T ) ', '2018-07-24 10:47:21', null, '2018-07-24 10:47:21', '3');
INSERT INTO `jc_discuss` VALUES ('78', '55', '34', '速度快', '2018-07-24 11:08:43', null, '2018-07-24 11:08:43', '3');
INSERT INTO `jc_discuss` VALUES ('79', '55', '6', '手机挺好', '2018-08-04 06:30:40', null, '2018-08-04 06:30:40', '3');

-- ----------------------------
-- Table structure for jc_entrepots
-- ----------------------------
DROP TABLE IF EXISTS `jc_entrepots`;
CREATE TABLE `jc_entrepots` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `flag` enum('0','1') DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jc_entrepots
-- ----------------------------
INSERT INTO `jc_entrepots` VALUES ('39', '4', '895', '0', '2018-08-07 10:29:42', '2018-07-11 22:20:48', null);
INSERT INTO `jc_entrepots` VALUES ('43', '5', '983', '1', '2018-08-04 07:02:23', '2018-07-17 21:52:11', null);
INSERT INTO `jc_entrepots` VALUES ('44', '8', '9980', '1', '2018-08-04 07:11:23', '2018-07-21 16:49:21', null);
INSERT INTO `jc_entrepots` VALUES ('45', '6', '1209', '1', '2018-07-23 17:05:01', '2018-07-21 16:49:43', null);
INSERT INTO `jc_entrepots` VALUES ('46', '10', '998', '1', '2018-07-23 17:08:53', '2018-07-21 16:49:54', null);
INSERT INTO `jc_entrepots` VALUES ('47', '11', '887', '1', '2018-07-23 16:48:43', '2018-07-21 16:50:02', null);
INSERT INTO `jc_entrepots` VALUES ('48', '12', '777', '1', '2018-07-21 16:50:14', '2018-07-21 16:50:14', null);
INSERT INTO `jc_entrepots` VALUES ('49', '14', '7777', '1', '2018-07-21 16:50:20', '2018-07-21 16:50:20', null);
INSERT INTO `jc_entrepots` VALUES ('50', '13', '664', '1', '2018-07-23 16:22:34', '2018-07-21 16:50:29', null);
INSERT INTO `jc_entrepots` VALUES ('51', '16', '6555', '1', '2018-07-21 16:50:42', '2018-07-21 16:50:33', null);
INSERT INTO `jc_entrepots` VALUES ('52', '15', '665', '1', '2018-07-21 16:50:38', '2018-07-21 16:50:38', null);
INSERT INTO `jc_entrepots` VALUES ('53', '17', '666', '1', '2018-07-21 22:03:52', '2018-07-21 22:03:52', null);
INSERT INTO `jc_entrepots` VALUES ('54', '18', '999', '1', '2018-07-23 16:09:33', '2018-07-23 16:09:33', null);
INSERT INTO `jc_entrepots` VALUES ('55', '19', '99', null, '2018-07-23 17:23:56', '2018-07-23 17:23:56', null);
INSERT INTO `jc_entrepots` VALUES ('56', '20', '999', null, '2018-07-23 17:24:05', '2018-07-23 17:24:05', null);
INSERT INTO `jc_entrepots` VALUES ('57', '21', '99', null, '2018-07-23 17:24:11', '2018-07-23 17:24:11', null);
INSERT INTO `jc_entrepots` VALUES ('58', '27', '97', null, '2018-08-04 07:13:29', '2018-07-23 17:24:23', null);
INSERT INTO `jc_entrepots` VALUES ('59', '33', '99', null, '2018-07-23 17:24:47', '2018-07-23 17:24:47', null);
INSERT INTO `jc_entrepots` VALUES ('60', '36', '99', null, '2018-07-23 17:24:55', '2018-07-23 17:24:55', null);
INSERT INTO `jc_entrepots` VALUES ('61', '35', '99', null, '2018-07-23 17:25:03', '2018-07-23 17:25:03', null);
INSERT INTO `jc_entrepots` VALUES ('62', '34', '99', null, '2018-07-23 17:25:10', '2018-07-23 17:25:10', null);
INSERT INTO `jc_entrepots` VALUES ('63', '39', '99', null, '2018-07-23 17:25:17', '2018-07-23 17:25:17', null);
INSERT INTO `jc_entrepots` VALUES ('64', '38', '99', null, '2018-07-23 17:25:24', '2018-07-23 17:25:24', null);
INSERT INTO `jc_entrepots` VALUES ('65', '40', '99', null, '2018-07-23 17:25:30', '2018-07-23 17:25:30', null);
INSERT INTO `jc_entrepots` VALUES ('66', '50', '99', null, '2018-07-23 17:25:37', '2018-07-23 17:25:37', null);
INSERT INTO `jc_entrepots` VALUES ('67', '44', '99', null, '2018-07-23 17:25:45', '2018-07-23 17:25:45', null);
INSERT INTO `jc_entrepots` VALUES ('68', '53', '998', null, '2018-07-24 09:41:13', '2018-07-23 17:25:53', null);
INSERT INTO `jc_entrepots` VALUES ('69', '43', '999', null, '2018-07-23 17:26:09', '2018-07-23 17:26:09', null);
INSERT INTO `jc_entrepots` VALUES ('70', '49', '999', null, '2018-07-23 17:26:38', '2018-07-23 17:26:38', null);
INSERT INTO `jc_entrepots` VALUES ('71', '37', '998', null, '2018-07-24 22:05:32', '2018-07-23 17:26:59', null);
INSERT INTO `jc_entrepots` VALUES ('72', '22', '999', null, '2018-07-23 19:37:36', '2018-07-23 19:37:36', null);
INSERT INTO `jc_entrepots` VALUES ('73', '23', '888', null, '2018-07-23 19:37:55', '2018-07-23 19:37:45', null);
INSERT INTO `jc_entrepots` VALUES ('74', '24', '999', null, '2018-07-23 23:01:13', '2018-07-23 23:01:13', null);
INSERT INTO `jc_entrepots` VALUES ('75', '25', '99', null, '2018-07-23 23:04:57', '2018-07-23 23:04:46', null);
INSERT INTO `jc_entrepots` VALUES ('76', '28', '998', null, '2018-07-24 09:51:54', '2018-07-24 09:51:44', null);
INSERT INTO `jc_entrepots` VALUES ('77', '26', '888', null, '2018-07-24 10:09:06', '2018-07-24 10:08:54', null);
INSERT INTO `jc_entrepots` VALUES ('78', '29', '86', null, '2018-08-04 06:26:09', '2018-08-04 06:25:51', null);

-- ----------------------------
-- Table structure for jc_goods
-- ----------------------------
DROP TABLE IF EXISTS `jc_goods`;
CREATE TABLE `jc_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gcid` int(11) DEFAULT NULL,
  `name` char(20) DEFAULT NULL,
  `pic` varchar(50) DEFAULT NULL,
  `intro` char(20) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jc_goods
-- ----------------------------
INSERT INTO `jc_goods` VALUES ('4', '2', '小米6', '/uploads/goods/gphoto/20180711/DMIWdnRiK7.jpg', '小米一代神机', '2499', '2499', '2018-07-23 00:00:00', '2018-07-24 19:54:22', null);
INSERT INTO `jc_goods` VALUES ('5', '2', '小米4', '/uploads/goods/gphoto/20180711/qVjdKgiJxx.jpg', '小米一代经典', '1999', '1899', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('6', '3', '红米1', '/uploads/goods/gphoto/20180712/mAlAHohHgo.jpg', '红米第一代产品', '799', '599', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('8', '3', '红米Note1', '/uploads/goods/gphoto/20180712/kRYSaMiRN4.jpg', '经典红米系列', '888', '777', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('10', '10', '小米电视 2', '/uploads/goods/gphoto/20180712/lb02Kvxgmt.jpg', '第二代小米电视', '1999', '1888', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('11', '14', '小米平板1', '/uploads/goods/gphoto/20180712/fXgtXDzOE5.jpg', '小米第一代平板', '1899', '1799', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('12', '16', '小米空气净化器', '/uploads/goods/gphoto/20180712/o1gBObQTbm.jpg', '小米居家 净化空气', '99', '88', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('13', '3', '红米5移动4G版', '/uploads/goods/gphoto/20180712/Q3rhW1U0so.jpg', '移动4G版本', '999', '799', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('14', '16', ' 蓝牙语音遥控器', '/uploads/goods/gphoto/20180712/klIt0FYIkr.jpg', '语音智能搜片 / 能控制机顶盒 / BL', '109', '99', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('15', '16', '小米牛皮钱包', '/uploads/goods/gphoto/20180712/UE0bU5hfSX.jpg', '小米简约头层小牛皮钱包', '159', '139', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('16', '14', '小米平板4', '/uploads/goods/gphoto/20180712/c91F2EL3xr.jpg', '单手可握  高端处理器', '1599', '1399', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('17', '16', '8周年纪念款T恤', '/uploads/goods/gphoto/20180712/OPX4h8nAjm.jpg', '【小米IPO庆典同款，享一件包邮】', '89', '69', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('18', '3', '红米6 Pro', '/uploads/goods/gphoto/20180712/B4GWMxEjdr.jpg', '5.84\" 异形全面屏  千元新旗舰', '1199', '999', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('19', '3', '红米Note 5', '/uploads/goods/gphoto/20180712/3DAFWH5hfy.jpg', '上市感恩回馈！6GB+64GB立减100', '1299', '1099', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('20', '16', '小米净水器1A', '/uploads/goods/gphoto/20180712/elp19bAwJZ.png', '小米净水器1A（厨下式）', '1599', '1499', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('21', '16', '儿童积木', '/uploads/goods/gphoto/20180712/FJO1IGTduL.jpg', '小米高品质二童积木', '159', '139', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('22', '16', '小米随身电风扇', '/uploads/goods/gphoto/20180712/T1PNWBKswc.jpg', '能放在口袋的小风扇', '20', '1', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('23', '16', '生活毛巾', '/uploads/goods/gphoto/20180712/hEA6bdkbvN.jpg', '3秒吸水，杀菌无刺激', '20', '1', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('24', '16', '偏光太阳镜', '/uploads/goods/gphoto/20180712/88dk1xRjXH.jpg', '夏季优选，时尚随行', '99', '79', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('25', '16', '足金招财猫', '/uploads/goods/gphoto/20180712/qDuCDxi4wh.jpg', '千足金 招财猫', '1099', '999', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('26', '16', '小米运动手表', '/uploads/goods/gphoto/20180712/XHMYdUMjjs.jpg', 'Amazfit Cor手环', '329', '299', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('27', '2', '黑鲨手机', '/uploads/goods/gphoto/20180712/USvrso1nE2.jpg', '黑鲨游戏手机 液冷更快', '3299', '2999', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('28', '18', '智能摄像头', '/uploads/goods/gphoto/20180715/EKneE9tamh.jpg', '为陪伴而来，坚守家的每个瞬间', '499', '399', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('29', '18', '米家电磁炉', '/uploads/goods/gphoto/20180715/bOP7fvlHno.jpg', '双频火力，精准控温', '399', '299', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('30', '18', '米家电饭煲', '/uploads/goods/gphoto/20180715/DorjsFuxZk.jpg', '真智能的压力 IH 电饭煲', '1299', '999', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('31', '18', '米家驱蚊器', '/uploads/goods/gphoto/20180715/MfSxPP8aIA.jpg', '风扇驱动挥发，静享无忧一夏', '89', '59', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('32', '18', '米家扫地机器人', '/uploads/goods/gphoto/20180715/uZtftb0Z86.jpg', '智商高，扫的干净扫的快', '1799', '1699', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('33', '2', '小米8', '/uploads/goods/gphoto/20180715/qR2YrS4tdO.jpg', '8周年旗舰手机', '2799', '2699', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('34', '2', '小米8 SE', '/uploads/goods/gphoto/20180715/a0NCv7fjQj.jpg', ' 骁龙710 全球首发，小屏旗舰', '1999', '1899', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('35', '2', '小米MIX2S', '/uploads/goods/gphoto/20180715/H7Wwck80Li.jpg', '一面科技 一面艺术', '3499', '3199', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('36', '3', '红米6A', '/uploads/goods/gphoto/20180715/5udcmn3G07.jpg', 'AI人脸解锁，小屏高性能', '699', '599', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('37', '10', '小米电视4 75\'\'', '/uploads/goods/gphoto/20180715/QQnCorqlEH.jpg', '超薄人工智能语音电视', '9999', '8999', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('38', '10', '小米电视4A 32\'\'', '/uploads/goods/gphoto/20180715/epbswoXRJR.jpg', '千元新旗舰', '999', '899', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('39', '14', '小米游戏本', '/uploads/goods/gphoto/20180715/GeXr7NJQBZ.jpg', '电竞怪兽', '6899', '5999', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('40', '14', '小米笔记本Air', '/uploads/goods/gphoto/20180723/XX25z8lYzK.jpg', '全新升级：第八代四核处理器', '5499', '5399', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('41', '18', '米家云台摄像机', '/uploads/goods/gphoto/20180715/fNcrV485dX.jpg', '智能侦测，清晰不卡顿', '209', '199', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('42', '16', '小米蓝牙耳机', '/uploads/goods/gphoto/20180718/hCbKeepINS.jpg', '更青春、更人性化的按键设计', '69', '59', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('43', '16', '小米手环3', '/uploads/goods/gphoto/20180718/uupW3q0hCV.jpg', '触摸大屏，50米防水', '189', '169', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('44', '16', '九号平衡车', '/uploads/goods/gphoto/20180718/nlXNBkt0TL.jpg', '年轻人的酷玩具，骑行遥控两种玩法', '2199', '1999', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('45', '16', '蓝牙项圈耳机', '/uploads/goods/gphoto/20180718/BXWcBPzpfH.jpg', '时尚外观，挂在脖子上的好耳机', '319', '299', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('46', '18', '米家LED吸顶灯', '/uploads/goods/gphoto/20180718/miKH5IouoS.png', '智能调节色温亮度、给生活理想的光', '319', '299', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('47', '16', '米家滤水壶', '/uploads/goods/gphoto/20180718/5yYeyWYLAt.jpg', '高效过滤、享安心好水', '129', '99', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('49', '14', '小米笔记本Pro', '/uploads/goods/gphoto/20180723/WEidElGSJZ.jpg', '更强悍的专业笔记本', '5599', '5599', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods` VALUES ('50', '14', '小米笔记本Air', '/uploads/goods/gphoto/20180722/pzAPOIgq85.jpg', '全新升级：第八代四核处理器', '5399', '5399', '2018-07-23 00:00:00', '2018-07-23 16:29:15', null);
INSERT INTO `jc_goods` VALUES ('53', '2', '小米8探索版', '/uploads/goods/gphoto/20180723/jX6xNHGHMY.png', '全球首款双频 GPS 手机 超精准定位', '3299', '3199', '2018-07-23 00:00:00', null, null);

-- ----------------------------
-- Table structure for jc_goods_details
-- ----------------------------
DROP TABLE IF EXISTS `jc_goods_details`;
CREATE TABLE `jc_goods_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(11) DEFAULT NULL,
  `type` char(50) DEFAULT NULL,
  `color` char(20) DEFAULT NULL,
  `describe` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jc_goods_details
-- ----------------------------
INSERT INTO `jc_goods_details` VALUES ('12', '4', '6G+64G', '土豪金', '高通芯片：骁龙835\r\n内存：6G\r\n存储：64G\r\n摄像头：后置双1200W', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('13', '5', '4G+16G', '尊贵黑', '高通芯片：骁龙820\r\n内存：4G\r\n存储：16G\r\n摄像头：后置1500W', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('14', '6', '2G+8G', '皇家绿', '高通芯片：骁龙 110\r\n内存：2G\r\n存储：8G\r\n摄像头：后置500W', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('16', '8', '2G+8G', '土豪金', '高通芯片 ： 骁龙120\r\n内存：2G\r\n存储：8G\r\n摄像头：1200W', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('31', '23', '', '珍珠白', '3秒吸水，杀菌无刺激', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('18', '10', '2G+8G', '土豪金', '分辨率：1080P\r\n尺寸：30寸\r\n存储：8G\r\n', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('19', '11', '4G+16G', '尊贵黑', '高通芯片：骁龙660\r\n内存：4G\r\n存储：16G\r\n摄像头：800W', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('29', '21', '', '梦幻粉', '孩子手中的百变世界', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('30', '22', '', '梦幻粉', '能放在口袋的小风扇', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('20', '12', '', '土豪金', '尺寸：20*20*50cm\r\n', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('21', '13', '2G+8G', '土豪金', '搭载了玩游戏超给力的高通骁龙处理器\r\n后置12MP旗舰相机\r\n前置柔光自拍\r\n配备5.7英寸全面屏', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('22', '14', '2G+8G', '尊贵黑', '适配小米电视、小米盒子、小米电视主机（1代小米电视、小米电视4A 32英寸、1代/2代小米盒子、小米小盒子、小米盒子4c除外），系统需升级到最新版本', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('23', '15', '', '尊贵黑', '采用上等牛皮制作而成', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('24', '16', '4G+16G', '土豪金', '单手可握的8.0\'\'屏幕 \r\n 骁龙660高端处理器\r\n 超长续航\r\n AI人脸识别 / 后置1300万 / 前置500万 / 金属机身 / 超窄边框', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('25', '17', '', '尊贵黑', '棉氨面料 \r\n礼盒包装\r\n意义非凡', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('26', '18', '4G+16G', '土豪金', '5.84\" 异形全面屏\r\n19:9 FHD\r\n后置1200万 AI双摄 \r\n 骁龙625 八核处理器 ', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('27', '19', '2G+8G', '尊贵黑', '骁龙636 八核处理器 \r\n1.4μm大像素 AI 双摄 \r\n1300万柔光自拍  最高可选6GB大内存 \r\n4000mAh 大电量 / 5.99\" 18:9 全面屏 / 人脸解锁', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('28', '20', '', '珍珠白', 'RO反渗透技术\r\n深层净水\r\n400加仑大流量 \r\n满足家庭日常使用 / 3合1复合强化滤芯', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('32', '24', '', '尊贵黑', '夏季优选，时尚随行', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('33', '25', '', '土豪金', '千足金 招财猫', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('34', '26', '', '尊贵黑', '彩色IPS触摸屏\r\n50米游泳防水 \r\n支付宝离线支付 \r\n大屏一目了然', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('35', '27', '6G+64G', '尊贵黑', '液冷散热\r\n独立图像处理芯片\r\n一键游戏模式\r\n骁龙845处理器 / 18:9全面屏 / 前后2000万摄像头', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('36', '28', '', '珍珠白', '水平360度，全景拍摄 \r\n1080P全高清，专业芯片\r\n移动侦测，时刻守护 \r\n听声辨位，语音互动 / 呆萌外形，一见倾心', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('37', '29', '', '尊贵黑', '99挡微调控火\r\n支持低温烹饪 \r\n100+烹饪模式', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('38', '30', '', '珍珠白', '智能烹饪\r\n压力 IH 加热\r\n灰铸铁粉体涂层内胆\r\n3L 容量', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('39', '31', '', '珍珠白', '室内自由摆放 \r\n无加热设计 \r\n一键定时 \r\n 90天长效', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('40', '32', '', '珍珠白', '智能路径规划\r\n大风压澎湃吸力\r\n远程智能控制\r\n大电池持久清扫\r\n', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('41', '33', '6G+64G', '尊贵黑', '全球首款双频 GPS \r\n骁龙845 \r\nAI 变焦双摄\r\n红外人脸识别', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('42', '34', '4G+16G', '魔力蓝', '骁龙710全球首发\r\nAI 超感光双摄\r\n5.88\" 全面屏\r\n前置2000万柔光自拍 / 三星 AMOLED 屏幕 / 3120mAh 长续航', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('43', '35', '6G+64G', '珍珠白', '搭载高通骁龙845 年度旗舰处理器 \r\nAI超感光双摄\r\nDxO百分相机 \r\n艺术品般陶瓷机身', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('44', '36', '', '梦幻粉', '12nm高性能处理器\r\n5.45\"小巧全面屏\r\n1300万高清相机\r\n“小杨柳腰”机身', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('45', '37', '2G+8G', '土豪金', '11.4mm超薄机身\r\n4K HDR 超高清画质\r\n2GB + 32GB 超大内存\r\n内置「小爱同学」／64位四核 高性能处理器', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('46', '38', '2G+8G', '尊贵黑', '64位四核处理器\r\n1GB+4GB大内存\r\n人工智能系统', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('47', '39', '', '尊贵黑', '「冷酷」散热系统 / \"龙卷风\"一键高速散热\r\n窄边框全高清屏\r\n杜比全景声（游戏加强款）\r\n四分区键盘背光 / 「光剑」氛围灯 / office激活不支持7天无理由退货', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('48', '40', '', '尊贵黑', '13.3\"小米笔记本Air 四核i5 8G 256G MX150\r\n17日支付尾款开始发货四核增强版 \r\n带独立显卡的轻薄笔记本\r\n MX150 2G独显 / 指纹解锁 / office激活不支持7天无理由退货', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('49', '41', '', '珍珠白', '1080P高清画质\r\n360度云台全景视角 \r\n红外夜视 \r\n双向语音 / AI 增强移动侦测 / H.265 编码 / 倒置安装', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('50', '42', '', '尊贵黑', '支持切歌 \r\n音量调节 \r\n6.5克轻巧 \r\n蓝牙4.1高清通话音质', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('51', '43', '', '尊贵黑', '微信、QQ、来电等消息内容直接显示|50 米游泳防水\r\n运动数据抬腕可见\r\n心率、睡眠、计步\r\n健康管理|长达 20 天续航能力', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('52', '44', '', '珍珠白', '迷你便携设计，3分钟上手\r\n22公里超长续航，15项安全技术', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('53', '45', '', '尊贵黑', '项圈式设计 \r\n轻量化亲肤材质 \r\napt-X编解码技术\r\nAAC高级音频编码 / 双单元声学架构', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('54', '46', '', '珍珠白', 'Φ450mm 适合20m²以内\r\n色温亮度可调 | 墙壁开关切换光线\r\n蓝牙网关 | 防尘防虫 | 快速安装', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('55', '47', '', '珍珠白', '有效过滤余氯、减少水垢、重金属等有害物质\r\n壶身选用食品接触级AS材料\r\n360°进水道设计\r\n滤芯寿命LED显示', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('57', '49', '', '珍珠白', 'i7处理器／16GB／256GB\r\n第八代英特尔® 酷睿™ i7 处理器\r\nNVIDIA GeForce® MX150 独立显卡\r\n2GB GDDR5 显存\r\n16GB 2400MHz 双通道内存\r\n256G PCIe SSD\r\n支持M.2 SATA 硬盘扩展\r\n深空灰\r\n支持指纹解锁', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('58', '50', '', '珍珠白', 'i7处理器／8GB／独显\r\n第八代英特尔®酷睿™ i7处理器\r\nNVIDIA GeForce MX150独立显卡\r\n2GB GDDR5显存\r\n支持指纹识别\r\n8GB DDR4\r\n256GB PCIe SSD\r\n支持硬盘扩容\r\n深空灰 / 银色', '2018-07-23 00:00:00', null, null);
INSERT INTO `jc_goods_details` VALUES ('61', '53', '6G+64G', '尊贵黑', '8GB+128GB\r\n小米8 透明探索版\r\n8GB LPDDR4x 双通道大内存\r\n128GB 机身存储 UFS', '2018-07-23 00:00:00', null, null);

-- ----------------------------
-- Table structure for jc_goods_images
-- ----------------------------
DROP TABLE IF EXISTS `jc_goods_images`;
CREATE TABLE `jc_goods_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(11) DEFAULT NULL,
  `images` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of jc_goods_images
-- ----------------------------
INSERT INTO `jc_goods_images` VALUES ('46', '33', '/uploads/goods/gdphoto/20180721/Jjp9UFkxGi.jpg', '2018-07-21 22:01:18', '2018-07-21 22:01:18', null);
INSERT INTO `jc_goods_images` VALUES ('47', '33', '/uploads/goods/gdphoto/20180721/kXgtGdAMYt.jpg', '2018-07-21 22:01:26', '2018-07-21 22:01:26', null);
INSERT INTO `jc_goods_images` VALUES ('48', '33', '/uploads/goods/gdphoto/20180721/i7KW8Jgt2W.jpg', '2018-07-21 22:01:32', '2018-07-21 22:01:32', null);
INSERT INTO `jc_goods_images` VALUES ('45', '33', '/uploads/goods/gdphoto/20180721/ZWHuRK7PL1.jpg', '2018-07-21 22:01:11', '2018-07-21 22:01:11', null);
INSERT INTO `jc_goods_images` VALUES ('73', '14', '/uploads/goods/gdphoto/20180723/NkEURUbDAJ.png', '2018-07-23 16:39:45', '2018-07-23 16:39:45', null);
INSERT INTO `jc_goods_images` VALUES ('72', '18', '/uploads/goods/gdphoto/20180723/SkXuL6YwHX.png', '2018-07-23 16:39:07', '2018-07-23 16:39:07', null);
INSERT INTO `jc_goods_images` VALUES ('71', '18', '/uploads/goods/gdphoto/20180723/tNG33Eio9f.png', '2018-07-23 16:39:07', '2018-07-23 16:39:07', null);
INSERT INTO `jc_goods_images` VALUES ('28', '5', '/uploads/goods/gdphoto/20180711/MfzyhoZDCG.jpg', '2018-07-11 22:45:57', '2018-07-11 22:45:57', null);
INSERT INTO `jc_goods_images` VALUES ('27', '5', '/uploads/goods/gdphoto/20180711/9fngo4yUI0.jpg', '2018-07-11 22:45:57', '2018-07-11 22:45:57', null);
INSERT INTO `jc_goods_images` VALUES ('26', '5', '/uploads/goods/gdphoto/20180711/vGHuE4iLSx.jpg', '2018-07-11 22:45:57', '2018-07-11 22:45:57', null);
INSERT INTO `jc_goods_images` VALUES ('25', '5', '/uploads/goods/gdphoto/20180711/ZL8gsfgKrk.jpg', '2018-07-11 22:45:57', '2018-07-11 22:45:57', null);
INSERT INTO `jc_goods_images` VALUES ('24', '4', '/uploads/goods/gdphoto/20180711/4RHUYCzKod.jpg', '2018-07-11 22:45:43', '2018-07-11 22:45:43', null);
INSERT INTO `jc_goods_images` VALUES ('23', '4', '/uploads/goods/gdphoto/20180711/mVhFDdeed7.jpg', '2018-07-11 22:45:43', '2018-07-11 22:45:43', null);
INSERT INTO `jc_goods_images` VALUES ('22', '4', '/uploads/goods/gdphoto/20180711/GSFIp8zTlU.jpg', '2018-07-11 22:45:43', '2018-07-11 22:45:43', null);
INSERT INTO `jc_goods_images` VALUES ('21', '4', '/uploads/goods/gdphoto/20180711/LnBQSI51zp.jpg', '2018-07-11 22:45:43', '2018-07-11 22:45:43', null);
INSERT INTO `jc_goods_images` VALUES ('49', '6', '/uploads/goods/gdphoto/20180721/YjO4EpMemR.jpg', '2018-07-21 22:28:06', '2018-07-21 22:28:06', null);
INSERT INTO `jc_goods_images` VALUES ('50', '13', '/uploads/goods/gdphoto/20180721/4s5iAo5i3U.jpg', '2018-07-21 22:30:50', '2018-07-21 22:30:50', null);
INSERT INTO `jc_goods_images` VALUES ('51', '13', '/uploads/goods/gdphoto/20180721/UEHnPzyByi.jpg', '2018-07-21 22:30:57', '2018-07-21 22:30:57', null);
INSERT INTO `jc_goods_images` VALUES ('52', '13', '/uploads/goods/gdphoto/20180721/jLWzo777KL.jpg', '2018-07-21 22:31:05', '2018-07-21 22:31:05', null);
INSERT INTO `jc_goods_images` VALUES ('53', '13', '/uploads/goods/gdphoto/20180721/BoHybbpMaz.jpg', '2018-07-21 22:31:12', '2018-07-21 22:31:12', null);
INSERT INTO `jc_goods_images` VALUES ('54', '19', '/uploads/goods/gdphoto/20180721/sv02pPyQt5.jpg', '2018-07-21 22:33:05', '2018-07-21 22:33:05', null);
INSERT INTO `jc_goods_images` VALUES ('55', '19', '/uploads/goods/gdphoto/20180721/g6JgqJ7Lrz.jpg', '2018-07-21 22:33:12', '2018-07-21 22:33:12', null);
INSERT INTO `jc_goods_images` VALUES ('56', '19', '/uploads/goods/gdphoto/20180721/7eUeWelKGl.jpg', '2018-07-21 22:33:21', '2018-07-21 22:33:21', null);
INSERT INTO `jc_goods_images` VALUES ('57', '19', '/uploads/goods/gdphoto/20180721/H1UGkGnVsc.jpg', '2018-07-21 22:33:29', '2018-07-21 22:33:29', null);
INSERT INTO `jc_goods_images` VALUES ('58', '10', '/uploads/goods/gdphoto/20180721/YfbtbWBnzN.jpg', '2018-07-21 22:46:39', '2018-07-21 22:46:39', null);
INSERT INTO `jc_goods_images` VALUES ('59', '10', '/uploads/goods/gdphoto/20180721/aqPPocrmSA.jpg', '2018-07-21 22:46:45', '2018-07-21 22:46:45', null);
INSERT INTO `jc_goods_images` VALUES ('60', '10', '/uploads/goods/gdphoto/20180721/hsvkho4MGH.jpg', '2018-07-21 22:46:56', '2018-07-21 22:46:56', null);
INSERT INTO `jc_goods_images` VALUES ('62', '33', '/uploads/goods/gdphoto/20180723/67J2CXB6XR.jpg', '2018-07-23 16:37:42', '2018-07-23 16:37:42', null);
INSERT INTO `jc_goods_images` VALUES ('63', '33', '/uploads/goods/gdphoto/20180723/7S2WX3YnGA.jpg', '2018-07-23 16:37:42', '2018-07-23 16:37:42', null);
INSERT INTO `jc_goods_images` VALUES ('64', '33', '/uploads/goods/gdphoto/20180723/PfEpYaHZ0G.jpg', '2018-07-23 16:37:42', '2018-07-23 16:37:42', null);
INSERT INTO `jc_goods_images` VALUES ('65', '33', '/uploads/goods/gdphoto/20180723/Gwnz9SrMfB.jpg', '2018-07-23 16:37:42', '2018-07-23 16:37:42', null);
INSERT INTO `jc_goods_images` VALUES ('66', '53', '/uploads/goods/gdphoto/20180723/Y62fx44win.jpg', '2018-07-23 16:38:13', '2018-07-23 16:38:13', null);
INSERT INTO `jc_goods_images` VALUES ('67', '53', '/uploads/goods/gdphoto/20180723/BTBnHtzLxV.jpg', '2018-07-23 16:38:13', '2018-07-23 16:38:13', null);
INSERT INTO `jc_goods_images` VALUES ('68', '53', '/uploads/goods/gdphoto/20180723/pTcSZwspPZ.jpg', '2018-07-23 16:38:13', '2018-07-23 16:38:13', null);
INSERT INTO `jc_goods_images` VALUES ('69', '53', '/uploads/goods/gdphoto/20180723/uUMkKmyOOT.jpg', '2018-07-23 16:38:13', '2018-07-23 16:38:13', null);
INSERT INTO `jc_goods_images` VALUES ('70', '53', '/uploads/goods/gdphoto/20180723/mvOcFNQP85.jpg', '2018-07-23 16:38:13', '2018-07-23 16:38:13', null);

-- ----------------------------
-- Table structure for jc_links
-- ----------------------------
DROP TABLE IF EXISTS `jc_links`;
CREATE TABLE `jc_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lname` varchar(255) NOT NULL COMMENT '链接名称',
  `lurl` varchar(255) DEFAULT NULL COMMENT '链接地址',
  `lsay` varchar(255) DEFAULT NULL COMMENT '描述',
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `lstate` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jc_links
-- ----------------------------
INSERT INTO `jc_links` VALUES ('33', '百度', 'http://www.baidu.com', '百度一下，你就知道', '2018-07-11 13:45:45', null, '2018-07-23 19:53:30', '1');
INSERT INTO `jc_links` VALUES ('34', '搜狐', 'http://www.souhu.com', '搜狐，一下', '2018-07-11 14:45:03', null, '2018-07-23 19:53:32', '1');
INSERT INTO `jc_links` VALUES ('31', '腾讯', 'http://www.qq.com', '腾讯充钱创造快乐', '2018-07-11 13:45:29', null, '2018-07-23 19:53:34', '1');
INSERT INTO `jc_links` VALUES ('32', '网易', 'http://www.163.com', '逆水寒，顺风暖', '2018-07-11 13:45:35', null, '2018-07-23 19:57:26', '0');
INSERT INTO `jc_links` VALUES ('35', '澳门赌场上线', 'www.6677abc.com', '澳门赌场成功上线', '2018-07-11 21:31:21', null, '2018-07-17 06:23:00', '1');

-- ----------------------------
-- Table structure for jc_notice
-- ----------------------------
DROP TABLE IF EXISTS `jc_notice`;
CREATE TABLE `jc_notice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '后台管理员发表人员',
  `title` varchar(255) NOT NULL COMMENT '发表内容的标题',
  `details` text COMMENT '公告发表的内容',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jc_notice
-- ----------------------------
INSERT INTO `jc_notice` VALUES ('34', '50', '后来，我瞒着所有人爱了你很久很久', '<p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">你知道吗？我昨晚又梦到你了，梦中的你一如既往地帅气，你背对着我，坐在那家我们常去的咖啡馆常坐的位置，我进门径直朝着那个位置走去，却看到了你，我就愣在那儿停顿了好久，然后你转过头来看到了我，你朝我笑，我鼓起<a href=\"http://www.duwenzhang.com/huati/yongqi/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">勇气</a>试着向你走近，却始终走不到那个位置，眼睁睁地看着你近在咫尺，却偏偏难以靠近，最后直到你消失不见。</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　我猛然醒来，睁眼，漆黑，宁静，我放空了几秒，然后才终于认清你已经<a href=\"http://www.duwenzhang.com/huati/likai/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">离开</a>我的事实。是啊，已经离开了。</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　都说，梦中梦到的人，是因为心底觉得离得好远，所以我才会想要在梦中再见见你，可是，在梦中你也离得我好远，我怎么也靠不近你。</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　也许是在用这种方式告诉我，分开了就不要怀抱<a href=\"http://www.duwenzhang.com/huati/xiwang/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">希望</a>，<a href=\"http://www.duwenzhang.com/huati/xianshi/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">现实</a>，梦中都不能。</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　我们在一起时，身边的<a href=\"http://www.duwenzhang.com/huati/pengyou/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">朋友</a>都知道，爱你，是他们都知道的事情，后来分开，只有少部分人知道，可是没有人知道我还爱你，这是属于我一个人的<a href=\"http://www.duwenzhang.com/huati/mimi/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">秘密</a>。</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　后来的我一直<a href=\"http://www.duwenzhang.com/huati/danshen/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">单身</a>，有时候朋友开玩笑说“你是不是还没有忘掉他”我说“怎么可能，我这么拿的起放的下的人，早忘了。”回答的干脆利落，以至于他们都信了，说的多了，连我都几乎信了。</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　可是，那为何会在听到你的名字时心头一震，为何会在不经意间想起你的时候心底隐隐难受，为何会在街上看到一个和你相似的背影心脏漏停一秒，为何总是会入我的梦，又为何对后来身边出现的男生都无感，直至今日，你依然是我拒绝别人的理由。我没有在等你，却还是<a href=\"http://www.duwenzhang.com/huati/xihuan/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">喜欢</a>不上别人。</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　会偷偷地跑到你的空间，因为当时在一起的时候微信还没有如此盛行，那时候会要求你弄成情侣头像，关联qq号，设置成情侣空间，有空了就一直在你空间留言，后来我们的qq不再关联，你也换了头像，换了空间装扮，清空了所有留言。我偷偷地溜进去转了一圈，然后默默地删除访问记录。想知道你的消息，又怕你知道我还在惦记。</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　会偷偷地跑到你的城市，在我们经常走过的那条小路转转，呼吸着这座城市的空气，吹着和你一样的风，算不算相拥？</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　也会一个人背着包到处旅行，记得和你说过很多想要去的地方，你总说等咱有钱了，想去哪去哪，你总说等有机会了，去很多地方。可是直到分开还是没有去过任何一个地方，我一个人走走停停，看一起说过的风景，而你在哪里？</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　在一起两年的光景，用了三年的<a href=\"http://www.duwenzhang.com/huati/shijian/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">时间</a>念念不忘，<a href=\"http://www.duwenzhang.com/huati/huiyi/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">回忆</a>比经历还要长，该说自己太<a href=\"http://www.duwenzhang.com/huati/chiqing/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">痴情</a>还是太想不开呢？</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　其实有时候我们的<a href=\"http://www.duwenzhang.com/huati/neixin/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">内心</a>远远没有表面那么潇洒，背影一转身就可以，而心里的空缺要怎样去填平？离开后的日子我瞒着所有人爱了你好久好久，我想这应该是我说<a href=\"http://www.duwenzhang.com/huati/fenshou/index1.html\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">分手</a>的代价吧。但是该偿还的三年时光已经够了吧，剩下的我只想活给自己看。</p><p style=\"font-family: &quot;Microsoft YaHei&quot;; font-size: 14px; white-space: normal;\">　　以前总希望你能来，会突然站在我的面前，会给我打电话让我到楼下给我惊喜，会轻轻地说一句“别来无恙”可是现在我不想要了，那些无处安放的<a href=\"http://www.duwenzhang.com/\" style=\"color: rgb(51, 51, 51); text-decoration-line: none;\">情感</a>就让它各自归位，你别来，我一个人也无恙。</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/></p>', '2018-07-21 17:34:04', '2018-07-24 19:46:14', '2018-07-24 19:46:14');
INSERT INTO `jc_notice` VALUES ('35', '50', '金币商城上新通知！', '<blockquote style=\"margin: 30px 0px; padding: 23px 20px 23px 55px; background: url(&quot;../../images/blockquoteup.png&quot;) 18px 20px no-repeat rgb(250, 250, 250); border: 1px solid rgb(243, 243, 243); line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal;\"><p style=\"margin-bottom: 0px; padding: 0px 22px 0px 0px; line-height: 28px; text-align: center;\"><span style=\"color: rgb(239, 83, 80);\"><strong>这位客官，您想来点啥？</strong></span></p><p style=\"margin-bottom: 0px; padding: 0px 22px 10px 0px; background-image: url(&quot;../../images/blockquotedown.png&quot;); background-position: 100% 100%; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; line-height: 28px; text-align: center;\"><span style=\"color: rgb(239, 83, 80);\"><strong>小二这就给您准备~</strong></span></p></blockquote><p style=\"margin-bottom: 0px; padding: 1px 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">七月份的尾巴，你是狮子座，八月份的前奏，你是狮子座。没错，马上就是狮子座的月份了。你身边有狮子座的吗？小二听说狮子座的小姐姐不要太霸气，但仍被体贴暖到。这不，为了狮子座，瞧瞧小二准备了什么？<br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;\">&nbsp;<img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/4a4e29ba7ddcb7dd4ba8a8d6667f16f5.gif\"/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(239, 83, 80);\">▍</span>每周一晚6点，准时上新</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">小米社区金币商城已经固定上新时间，每周一晚6点钟准时更新新一周的商品，请各位客官定好闹钟，准备兑换商品！</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">金币商城将在7月23日（星期一）18：00上架新的商品。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(239, 83, 80);\">▍</span>本周好物推荐</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><strong>☆&nbsp;8H记忆绵护椎腰靠</strong></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">处处体贴/为你撑腰</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">0.5金币，你买不了吃亏，买不到上当，但是说不定能抽到一个体贴入微的腰靠哦~送给心爱的TA暖心礼物。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><strong><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/489a389f9444880ecb2ef7fd9bfea605.jpg\"/></strong></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><strong><br/></strong></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><strong>☆ 米家床头灯</strong><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">如梦如幻，多彩光世界！</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">绚丽多彩的灯光颜色丨 米家智能场景丨 触控操作丨 Wi-Fi + 蓝牙双模</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">小二说：浪漫氛围，让热情的红营造专属二人的美好时光！！</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/cc1bff6f8b06edac1505678c526b0899.jpg\"/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(239, 83, 80);\">▍</span>其他上架商品，请看~</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><table width=\"NaN\"><tbody><tr class=\"firstRow\"><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p1\" style=\"margin-top: 5px; line-height: 28px;\">商品名</p></td><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p1\" style=\"margin-top: 5px; line-height: 28px;\">单价（金币）<span class=\"s1\"><strong>/</strong></span>数量（个）</p></td><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p1\" style=\"margin-top: 5px; line-height: 28px;\">参与方式</p></td><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p1\" style=\"margin-top: 5px; line-height: 28px;\">上架时间</p></td></tr><tr><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\">红米6</td><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p2\" style=\"margin-top: 5px; line-height: 28px;\">1 / 1</p></td><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p1\" style=\"margin-top: 5px; line-height: 28px;\">抽奖</p></td><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p1\" style=\"margin-top: 5px; line-height: 28px;\">7月23日</p></td></tr><tr><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p1\" style=\"margin-top: 5px; line-height: 28px;\">米家床头灯</p></td><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p2\" style=\"margin-top: 5px; line-height: 28px;\">0.5/ 2</p></td><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p1\" style=\"margin-top: 5px; line-height: 28px;\">抽奖</p></td><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p1\" style=\"margin-top: 5px; line-height: 28px;\">7月23日</p></td></tr><tr><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p1\" style=\"margin-top: 5px; line-height: 28px;\">米家签字笔</p></td><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p2\" style=\"margin-top: 5px; line-height: 28px;\">24.9/ 5</p></td><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p1\" style=\"margin-top: 5px; line-height: 28px;\">兑换</p></td><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p1\" style=\"margin-top: 5px; line-height: 28px;\">7月23日</p></td></tr><tr><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p1\" style=\"margin-top: 5px; line-height: 28px;\">最生活方巾青春系列</p></td><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p2\" style=\"margin-top: 5px; line-height: 28px;\">29.9/ 6</p></td><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p1\" style=\"margin-top: 5px; line-height: 28px;\">兑换</p></td><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p1\" style=\"margin-top: 5px; line-height: 28px;\">7月23日</p></td></tr><tr><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p1\" style=\"margin-top: 5px; line-height: 28px;\">医用电子体温计</p></td><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p2\" style=\"margin-top: 5px; line-height: 28px;\">34.9/ 5</p></td><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p1\" style=\"margin-top: 5px; line-height: 28px;\">兑换</p></td><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p1\" style=\"margin-top: 5px; line-height: 28px;\">7月23日</p></td></tr><tr><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p3\" style=\"margin-top: 5px; line-height: 28px;\"><span class=\"s2\"></span>米家插线板3位基础版<span class=\"s2\"></span></p></td><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p2\" style=\"margin-top: 5px; line-height: 28px;\">39.9/ 5</p></td><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p1\" style=\"margin-top: 5px; line-height: 28px;\">兑换</p></td><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p1\" style=\"margin-top: 5px; line-height: 28px;\">7月23日</p></td></tr><tr><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p1\" style=\"margin-top: 5px; line-height: 28px;\">小米棒球帽</p></td><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p2\" style=\"margin-top: 5px; line-height: 28px;\">64/ 5</p></td><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p1\" style=\"margin-top: 5px; line-height: 28px;\">兑换</p></td><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p1\" style=\"margin-top: 5px; line-height: 28px;\">7月23日</p></td></tr><tr><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p1\" style=\"margin-top: 5px; line-height: 28px;\">8H记忆绵护椎腰靠</p></td><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p2\" style=\"margin-top: 5px; line-height: 28px;\">99/ 2</p></td><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p1\" style=\"margin-top: 5px; line-height: 28px;\">兑换</p></td><td valign=\"top\" style=\"margin: 0px; word-break: break-all;\"><p class=\"p1\" style=\"margin-top: 5px; line-height: 28px;\">7月23日</p></td></tr></tbody></table><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"font-family: sans-serif;\">下一轮金币商城，你有哪些期待呢？跟帖说出来，让我看到你的身影，说不定小二能帮你实现哦~</span><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;\">--------------【没金币？看这里！】--------------<br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">「任务」评论主题5次，即可领取0.3金币：</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://bbs.xiaomi.cn/task/detail/taskid/149\" target=\"_blank\" title=\"PC点击领取任务\" style=\"outline: 0px; text-decoration-line: none;\">PC点击领取任务</a>&nbsp; &nbsp; &nbsp;<a href=\"http://bbs.xiaomi.cn/app/taskdetail/taskid/149\" target=\"_blank\" title=\"APP点击领取任务\" style=\"outline: 0px; text-decoration-line: none;\">APP点击领取任务</a></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">「任务」每日签到，可领取0.1金币：</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://bbs.xiaomi.cn/task/detail/taskid/111\" target=\"_blank\" title=\"PC点击领取任务\" style=\"outline: 0px; text-decoration-line: none;\">PC点击领取任务&nbsp;</a>&nbsp; &nbsp;&nbsp;<a href=\"http://bbs.xiaomi.cn/app/taskdetail/taskid/111\" target=\"_blank\" title=\"APP点击领取任务\" style=\"outline: 0px; text-decoration-line: none;\">APP点击领取任务</a></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/></p>', '2018-07-21 17:35:19', '2018-07-21 17:35:19', null);
INSERT INTO `jc_notice` VALUES ('43', '50', '达人揭秘小米MAX3', '<p><span style=\"color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; background-color: rgb(250, 250, 250);\">在小米max3的发布会现场刚开始我们并没有看到雷总的身影，而是一段小米MAX3的用户访谈视频，6位米粉代表了大屏用户群体去讲述使用小米MAX的体验和期待！而我很荣幸受邀参加小米MAX3用户访谈的的录制！整场录制下来，记忆深刻，第一次在镜头面前，大家都很美，很帅~</span></p><p><span style=\"color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; background-color: rgb(250, 250, 250);\"><span style=\"color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; background-color: rgb(255, 255, 255);\">▼很多人都有着这样的疑问，这些米粉从哪里找的，他如何代表米粉去说一些心里头真正想要的，什么关系有时候反而没有那么有用！在发布会之前，永恒老大曾经在社区发帖调查寻找小米MAX系列老用户，倾听来自米粉的声音！原帖可以直接点击查看-</span><a href=\"http://bbs.xiaomi.cn/t-31153655\" target=\"_blank\" title=\"传送门\" style=\"outline: 0px; text-decoration-line: none; font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">传送门</a><span style=\"color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; background-color: rgb(255, 255, 255);\">！通过1.3万多条的筛选，后来私信联系到我们！</span></span></p><p><span style=\"color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; background-color: rgb(250, 250, 250);\"><span style=\"color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; background-color: rgb(255, 255, 255);\">▼当然对于我这样的骨灰级米粉，没有几台MAX怎么说的过去，专门叫附近的我的朋友汇聚起来拍了两张照片！都是我推荐或者帮买的！！！统一都是大白式的顶部，底下的三大金刚按键！后来仔细看了看，竟然都是金色，这种凑巧真的是让人觉得有些小意外和小惊喜！</span></span></p>', '2018-08-04 06:39:59', '2018-08-04 06:39:59', null);
INSERT INTO `jc_notice` VALUES ('44', '50', '八代酷睿久等了！小米', '<p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><strong>一、前言：拥抱Coffee Lake 小米游戏本八代增强版发布</strong><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">3月27日，小米发布了旗下首款游戏笔记本电脑，然而尴尬的是，仅仅在一周之后，Intel就发布了酷睿8代Coffee Lake移动处理器的标压高性能版本，原来作为顶配的i7-7700HQ处理器突然间成为了明日黄花，这显然不是小米公司期望看到的结果。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><strong>历经4个月时间的厉兵秣马，在8月3日ChinaJoy展会上，小米游戏本带着Coffee Lake移动处理器来到了消费者面前。</strong></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/a34318c696051187045c148dd5225d9b.jpg\"/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">小米游戏本八代增强版沿用了前代产品的模具，在外形上没有做任何改变，但小米在很多看不见的地方做了升级。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><strong>除了全线升级为8代标压版Coffee Lake移动处理器之外，无线网卡从升级到了双频双天线的Intel AC9560，最高速度可达1733Mbps，提升了1倍有余；内置的SSD从PM961升级到了三星最新推出的PM981；内存升级为2666MHz双通道，同时全系均为双内存插槽，支持用户自行升级更换；三合一读卡器的控制芯片也升级到UHS-I，可以支持104M/s的读写速度。</strong></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">小米游戏本八代增强版参数如下：</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/0a2f38376b7df664dd97f0c37db93a0e.jpg\"/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">这次小米同样也发布了四款不同配置的机型。我们收到的型号是G58725D6D/CN，属于小米游戏本八代增强版的顶配版本，配置为i7-8750H处理器、双通道16GB DDR4 2666MHz内存、显卡为GTX1060 6GB。升级后的顶配版依然保持了8999元的价格。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">目前NVIDIA GTX 11系显卡的消息满天飞，可能有部分同学会有疑问--小米在临近11系显卡发布前夕依然推出10系显卡游戏本是否不妥？</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">以目前的所得到的资料，11系最大的改进就是采用了GDDR6显存以及更先进的12nm工艺（其实就是台积电16nm工艺改个名字），而在构架上不会有太大的变化，预期性能会有20%左右的提升。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">但鉴于GDDR6初次量产的良率以及产能问题，价格不会很好看,不论是GTX1160或是GTX1170，其价格都远高于目前的产品。 而近期矿潮退去，NVIDIA目前正在对现有产品进行大幅度降价促销处理，这阶段搭配GTX1060/70/80显卡的游戏本产品都处于发布以来的价格低谷，非常值得入手。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 18px;\"><strong>二、外观：正面无LOGO设计 可扩展三硬盘</strong></span></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/9c6fca83764e359f9b2a6a51de6f0c6d.jpg\"/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">包装盒正面有小米的LOGO，背景画面是小米游戏本内部结构图，看上去非常霸道。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/67487c39a2fa2f778d196125e9339d49.jpg\"/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">A面采用了磨砂金属材质、无LOGO设计，造型低调。三围尺寸364x265.2x20.9mm，机身净重约2.7kg。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/d3c0af50f174721f79d8e65e1eb0b0df.jpg\"/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">15.6英寸的IPS防眩光屏幕、分辨率为1920x1080、亮度为300流明、72%NTSC色域。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/087f55ba27859c5a07b0577a9c5c0026.jpg\"/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">屏幕顶部是100万像素摄像头和阵列麦克风，可以满足日常视频以及通话的需求。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/c1f4d3b78600f4ee0cff1b710b5305cd.jpg\"/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">专门为游戏设计的键盘，30键防冲突设计。键盘按键面积大，键程1.8mm，按键手感很舒适。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">由于屏幕使用了窄边框设计，笔记本整体尺寸缩小，无法加入全尺寸的数字键盘。15.6寸的笔记本没有小键盘可能会让某些喜欢数字键的人感到不适，但是好处就是可以双手居中打字。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">下面是一个大尺寸的触控板，全玻璃设计触摸时手感舒适。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/ef999d9a64463da071cde85332dba21d.jpg\"/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">左边一排设计了6个按键，最上面的一个是龙卷风按钮，按下后笔记本风扇一键起飞，转速达到6000RPM。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">下面是5个可编程按键，可以使用小米游戏盒子软件，根据自身需求进行快捷键、应用程序等快捷设置。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">由于这一排按键的存在，导致了键盘区域整体偏右，初次使用时会有一点不习惯。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/ce2fdec2551a1cd39f8a7ff0f9b5b20b.jpg\"/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">开机键在右上角，按下时阻力明显，可以起到防误触的作用。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/f0ab1eab34b357d268a69b67f3cc35d1.jpg\"/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">右侧有一个USB 3.0接口和三合一UHS-I 104MB/s读卡器。靠近顶部的三个孔是散热出风口。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/041b7c5dde72dc5fe26cab77502144ea.jpg\"/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">左侧靠近顶部位置是出风口，旁边有2个USB 3.0接口，以及3.5mm的耳机麦克风接口各一个。</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/></p>', '2018-08-04 06:57:25', '2018-08-04 06:57:25', null);
INSERT INTO `jc_notice` VALUES ('42', '50', '小米周报 | 小米8透明探索版首', '<p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><strong><span style=\"font-family: 微软雅黑;font-size: 16px\"><strong><strong><span style=\"font-size: 16px\">①</span></strong></strong></span></strong><strong>小米8透明探索版本周一首卖</strong></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\">本周一，小米8透明探索版首卖：全球首款压感屏幕指纹识别，安卓首款 “Face ID” ，全球首款双频GPS，透明玻璃机身，8GB+128GB 3699元……今晚8点，小米8透明探索版再次开售！</p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255);text-align: center\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/41962d360ae0aad3315de4c005badc20.jpg\"/></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><br/></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255);text-align: center\"><a href=\"http://bbs.xiaomi.cn/t-15149419\" target=\"_blank\" style=\"outline: 0px\"></a></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><strong><span style=\"font-family: 微软雅黑;font-size: 16px\"><strong><strong><span style=\"font-size: 16px\"><strong><strong><span style=\"font-size: 16px\">②</span></strong></strong>小米8/小米8SE 开启现货购买！</span></strong></strong></span></strong><br/></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\">小米 8 ，全球首款双频GPS手机，骁龙845处理器，DxO超百分相机，2699元起 ；小米8 SE 骁龙710全球首发，小屏旗舰，1799元起… 小米8/小米8SE，小米商城现货热卖中。&nbsp;</p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255);text-align: center\"><a href=\"http://bbs.xiaomi.cn/t-15153600\" target=\"_blank\" style=\"outline: 0px\"></a><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/4d19c997adf74db3bc1e75e9e9adcf09.jpg\"/></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><br/></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><strong><strong><span style=\"font-family: 微软雅黑\">③</span></strong>小米主题上线洛天依活动：锁屏玩游戏，抽奖小米手环3</strong></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\">8月2日，小米手机洛天依主题活动上线啦！人气歌姬洛天依踏歌而来，开启你的指尖夜舞，锁屏玩游戏、换壁纸。现在打开“个性主题”参与活动，免费下载还能抽送小米手环3、Vsinger花语系列手办。<a href=\"http://bbs.xiaomi.cn/t-31112637\" target=\"_blank\" style=\"outline: 0px\"></a></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><br/></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255);text-align: center\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/941bcceb80caa287c2d1a50db04af250.jpg\"/></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/></p>', '2018-08-04 06:26:07', '2018-08-04 06:26:07', null);
INSERT INTO `jc_notice` VALUES ('36', '50', '医疗兵、直升机即将登陆', '<p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;自6月28日上线以来，《小米枪战》“战场模式”受到了一众好评，当然，之中也有不少声音期待游戏产品能够尽快迭代，尽早还原开发团队常常挂在嘴边的“海陆空”3维空间真实战场。前些时候，官方放出了《小米枪战：战场前线》的全新更新计划，官方表示：经过《小米枪战》“战场模式”首个版本的体验，玩家对于游戏迭代的期待与愿望变得越发强烈，在开发方的努力下，“战场模式”的首个迭代版本即将上线。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/953c8a6935865a2070085e3635564cbe.jpg\"/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp; 据悉，新版本将于8月份正式上线，此前，官方先是正式公布了《小米枪战》内的直升机元素，首次加入空中作战载具也为还原真实、立体的战场氛围迈出了一大步。今日，官方公布了另一个“重磅消息”，新的兵种也即将登陆“战场模式”。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp; 根据制作方西山居透露，《小米枪战》将在8月份的兵种体系下加入2名全新兵种，分别是医疗兵和支援兵。今天，制作方先公布了医疗兵的具体细节。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 18px; color: rgb(239, 83, 80);\">医疗兵：从血量上增强己方士兵的持续作战能力</span></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/e06ea469e13322e50dd61a010ba65d43.jpg\"/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp; 医疗兵是战场的主力回复单位，为己方步兵单位恢复血量，从而提高己方部队的持续作战、推进、防守能力。在游戏中，操控医疗兵的玩家可以拥有一把突击步枪、手枪与手雷烟雾弹作为战斗武器，这方面与突击兵、狙击兵配置类似。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/0a8b5fe4dd31312fcebc825fec17f883.jpg\"/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp; 在特殊武器\\技能方面，医疗兵可以通过技能放置治疗设备。据悉，该设备可在一定时间内、为一定范围内的己方单位进行持续加血，虽然一个医疗兵同时只能释放一个医疗设备，但该技能使用次数不限。放置操作与投掷手雷类似，点击技能后，玩家可将封装设备扔至指定地点，随后设备会自动开封，最终成为医疗装置。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp; 需要注意的是，回血设备可以被对方玩家敌人击毁，根据地形将设备放置到合适的位置将是医疗兵们需要考虑的事情。另外，回复装置不会进行效果叠加，为了增大效率，切忌将2个装置重复摆放，否则团队效率将会被大大降低。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/8127272e8eb3577573f84d002db4d5a7.jpg\"/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 18px; color: rgb(239, 83, 80);\">策略深度进一步提升</span></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp; 如果说，直升机的加入真正开启了《小米枪战》“战场模式”的“海陆空”时代的开启，那么医疗兵和支援兵的加入，则完成了开发者该模式的“兵种拓展”计划。地空双战场+4兵种使得下个版本的《小米枪战》必将拥有更深的策略性。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp; 目前来看，整个战场可按兵种大致分为3个层次，即正面战场、敌后战场和后方狙击战场。玩家可以根据自己对于兵种的理解和对局势的判断，想不同的战场派遣不同的兵种据载具。虽然根据固定认识，固定的兵种有着它最适合的位置，例如狙击兵适合后方狙击战场，坦克适用于前线战场，但其实，很多玩家并没有墨守成规，打出了很多有意思的配合和战术，包括狙击兵绕后偷家。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/765d27a345bbf240376126b5d2bc7b73.jpg\"/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp; 战场模式的核心趣味点可以归纳为2个，即个人的技术发挥和策略之间的博弈。事实上，策略博弈是《小米枪战》研发最为重视的一点，此前热更当中，研发团队将占点夺旗加入到胜负判断条件当中就很好地反映了该设计思路（成功占点会扣除敌方势力5点血量）。未来，载具、兵种、武器的多样性，会大大扩展玩家在策略方面的发挥空间，为玩家提供了一个可以发挥自己聪明才智的平台。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 18px; color: rgb(239, 83, 80);\">《小米枪战》“战场模式”的未来在哪？</span></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/13df7548ebe705ec91611b86e927c167.jpg\"/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp; 不论在玩家眼中还是《小米枪战》团队眼中，战场模式都拥有着其他枪战模式难以匹敌的迭代空间。不可否认，目前的《小米枪战》距离“还原真实战场”还有着不小的差距，兵种的类型、地空海协同作战、指挥官玩法等诸多内容都有着较大的极大的拓展空间。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp; 虽然距离“还原真实战场”还有很长的路，但足够多的现实参照也为《小米枪战》展现了足够明确的发展方向。相信在未来，伴随着优化、硬件水平的提升，《小米枪战：战场模式》之中会出现越来越多令人兴奋的内容，或许不用说太多，玩家脑海中便会浮现出很多激动人心的画面。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp; 当然，为了实现这些，《小米枪战》研发团队势必会遇到更多的挑战与难关，但团队相信玩家的信任与支持会成为这款产品最大的前进动力。正如此前官方所表示的，相信《小米枪战》会因为玩家和团队的共同努力，变成一款足够精彩、伟大的作品。</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/></p>', '2018-07-21 17:36:17', '2018-07-21 17:36:17', null);
INSERT INTO `jc_notice` VALUES ('37', '50', '小米Max 3游戏实测', '<p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-size: 16px;white-space: normal;background-color: rgb(255, 255, 255);font-family: 微软雅黑\"><span style=\"font-size: 16px;text-indent: 28px\">作为大屏大电量的经典传承，小米Max 3在大屏的观赏体验、续航表现和拍照效果等方面都进行了升级。相较小米Max 2，屏幕增大至6.9英寸18：9全面屏，5500mAh充电宝级大电量，拍照也升级为旗舰级AI双摄。那么面对随时随地开黑的《王者荣耀》，小米Max 3体验如何？我们通过实测表现来看下。</span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-size: 16px;white-space: normal;background-color: rgb(255, 255, 255);font-family: 微软雅黑\"><span style=\"font-size: 16px;text-indent: 28px\"><br/></span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-size: 16px;white-space: normal;background-color: rgb(255, 255, 255);font-family: 微软雅黑\"><span style=\"text-indent: 28px;font-size: 16px\">采用相同的游戏设置，画面质量高、粒子质量高，均开启高帧率模式，开启多线程优化，开启高清显示。小米</span><span style=\"text-indent: 28px;font-size: 16px\">Max 3、小米Max 2以及骁龙660手机三者组队进行游戏。</span><br/></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255);text-indent: 28px\"><br/></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/ee7ada14171523faebbee78e7a762112.jpg\"/></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑;font-size: 16px\">游戏过程中，前代小米Max 2出现了较明显的卡顿，团战和特效较多的法术释放场景都会显著掉帧。而采用骁龙636的小米Max 3全程帧数稳定，能够稳定在60帧上下，即便是多人团战也能保持57帧的流畅画面，整体游戏表现同友商660旗舰手机几乎没有区别，全程满帧跑。</span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑;font-size: 16px\"><br/></span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑;font-size: 16px\">从详细的帧数曲线来看，采用骁龙625的小米Max 2帧数波动较大，平均帧数只有37.6，空旷场景可以到55帧，而一旦出现画面变化就会明显感觉到帧数降低，团战时甚至会降低到20帧以下，游戏体验并不理想。</span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/3c365e21fddeafb880a3030e24d09d5f.jpg\"/></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑;font-size: 16px\">而小米Max 3的帧数表现十分稳定，几乎可以全程跑满60帧，平均帧数59.2。骁龙660手机的平均帧数59.4，帧数波动较小。可以看出，小米Max 3在《王者荣耀》这款游戏的表现已经大幅度超越前代Max 2，可以全特效满帧运行，游戏体验和660手机旗鼓相当。</span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑;font-size: 16px\">&nbsp;</span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑;font-size: 16px\">小米Max 3在游戏体验上的巨大提升，不仅得益于硬件性能的全面进步，更是软硬件协调优化的综合的结果。首先，小米Max 3所搭载的14nm骁龙636八核心处理器，加入了四颗Kryo 260核心，相较Max 2所使用的骁龙625处理器，CPU性能和GPU性能都得到了大幅度提升。在游戏类重负载场景中，性能更加强劲。</span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑;font-size: 16px\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/d1a9b2d6dd79718c3310502c49f8d308.jpg\"/></span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><br/></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑;font-size: 16px\">其次，小米工程师对Max 3的游戏性能，在系统底层和MIUI层面进行了联合调优。在系统底层，游戏类重负载进程会被优先锁定在大核心渲染，大大提升了游戏的计算速度。针对《王者荣耀》，小米Max 3不仅进行了多线程优化，让多颗大核心可以协调运作，大大提升了游戏的运算效率，游戏启动更加迅速，加载更快。小米Max 3还会自动识别团战场景，智能调度系统资源，在需要高计算能力的时候，最大化发挥硬件性能。</span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑;font-size: 16px\"><br/></span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑;font-size: 16px;text-indent: 28px\">不仅如此，</span><span style=\"font-family: 微软雅黑;font-size: 16px;text-indent: 28px\">MIUI系统还为小米Max 3增加了智能游戏加速，当系统检测到游戏运行是就会自动开启，清理非重要后台进程，增加游戏可用内存。此外，Max 3新增了游戏工具箱，在游戏过程中开启按键防误触功能，避免误操作的尴尬；游戏过程中来电自动免提，一键屏蔽推送通知；微信QQ等重要信息开启画中画功能，一边王者荣耀一边回复消息，游戏工作两不误。</span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑;font-size: 16px\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/9f47a0d5eba3d30cbe86116fe96ec87c.jpg\"/></span><br/></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑;font-size: 16px\">得益于硬件性能的全面进步和系统级的深度优化，小米Max 3能满足随时随地开黑的娱乐需求。配合6.9英寸18：9全面屏，游戏视野大、操控触感好，还能获得接近旗舰机的游戏体验。</span><span style=\"font-family: 微软雅黑;font-size: 16px\">&nbsp;</span></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/></p>', '2018-07-21 17:41:23', '2018-07-21 17:41:23', null);
INSERT INTO `jc_notice` VALUES ('38', '50', '回复 流言终结者！这些手机冷知识你', '<blockquote style=\"margin: 30px 0px;padding: 23px 20px 23px 55px;background: url(&#39;../../images/blockquoteup.png&#39;) 18px 20px no-repeat rgb(250, 250, 250);border: 1px solid rgb(243, 243, 243);line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal\"><p style=\"margin-bottom: 0px;padding: 0px 22px 10px 0px;background-image: url(&#39;../../images/blockquotedown.png&#39;);background-position: 100% 100%;background-repeat: no-repeat;line-height: 28px\"><span style=\"font-family: 微软雅黑, sans-serif\">表面看到的并不一定是真相，大家都认同的并不一定是真理。生活中如此，手机上也是如此，很多人都是人云亦云，被别人三两句话就搞的找不着北了，去买手机花了冤枉钱不说，还没买到适合自己的手机。手机参数繁多，总有人认为多多益善，现实真的如此吗？今天就跟大家说道说道手机里面的冷知识，希望能帮助到大家。</span></p></blockquote><p style=\"margin-bottom: 0px;padding: 1px 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"color: rgb(110, 169, 48);font-family: 微软雅黑, sans-serif\">&nbsp;</span><strong><span style=\"font-family: 微软雅黑, sans-serif\">1.手机电池的容量并不是越大越好</span></strong><br/></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑, sans-serif\">听到这个冷知识肯定很多人不干了，确实电池容量的大小是决定续航的一大关键因素，理论上肯定是越大越好。但是不要忘了手机的续航是有多方面决定的，比如说硬件的功耗和系统的优化等因素，包括屏幕的功耗、处理器的功耗、系统对CPU的优化、系统后台的控制等。所以说续航是一个系统工程，并不是由电池容量大小单方面决定的。看下面这张市售手机续航测试就知道了，并不是电量大的续航表现就好。</span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑, sans-serif\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/76bfd3903971ddbbd7772a4a65e80213.jpg\"/></span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑, sans-serif\"><br/></span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><strong><span style=\"font-family: 微软雅黑, sans-serif\">2.相机像素并不是越高越好</span></strong></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑, sans-serif\">拍照如今已成为手机上最主要的一个功能了，买手机很多人都非常关注这个因素，当然也有很多人唯像素大小论事。不过这里小编要说，这个说法已经过时了，因为大像素相机的出现改变这个观点。</span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑, sans-serif\">大像素概念我记得最早出现在小米Note的前置相机上，采用的是400万2μm大像素感光元件，相机单个像素变大，意味着可以接收更多的光线，画质更好。提高单个像素大小比单纯提高像素数有更明显的画质改善，拍出的照片噪点更少，暗光下整体更明亮，细节也更丰富。可以这样说，400万大像素相机拍出的效果比其他800万的更加好。现在随着拍照技术的进步，越来越多的手机也开始使用大像素相机，这个冷知识最近两年也慢慢开始普及了。</span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑, sans-serif\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/abdf8bce363163ca09bfef0a499d9fa4.jpg\"/></span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑, sans-serif\"><br/></span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><strong><span style=\"font-family: 微软雅黑, sans-serif\">3.处理器核心并不是越多越好</span></strong></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑, sans-serif\">关于手机性能的竞争在手机圈内就从来没有停止过，而决定性能的一个主要因素就是CPU（处理器）的性能高低。自从多核处理面世后，很多人都肯定相信核心数越多肯定越强，其实并不然。</span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑, sans-serif\">多核只是处理器的一种设计方案，他的优势是在多任务处理上，但影响性能的并不仅仅如此。处理器的工艺制程、CPU频率、CPU架构以及GPU架构才是决定CPU性能的关键。举个最简单的例子，全球首款10核处理器联发科的Helio X20难道比苹果A9双核处理器性能好吗？采用20nm工艺制程的Helio X25难道比14nm工艺制程的骁龙660更强劲吗？事实告诉我们，这是不可能的。所以处理器的核心并不是越多越好。</span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑, sans-serif\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/725ed107c7fa304e02ce7f0e414539c7.jpg\"/></span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑, sans-serif\"><br/></span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><strong><span style=\"font-family: 微软雅黑, sans-serif\">4.信号格并不是越多越好</span></strong></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑, sans-serif\">手机的两大功能是什么？我说是打电话和上网。这两个功能是手机的基础，一般人认为，手机右上角的两个信号格图标就是显示好用与否的标志，小编只能说，这样想就too young too simple！</span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑, sans-serif\">决定电话网络和无线网络的好坏的条件并不只是信号强弱，还有连通率、连接速度等因素。打个比方，手机信号满格但是周围人山人海，打电话上网肯定不通畅，因为同时使用的人多，容易造成信道堵塞。再比如一台本身网络就不太好的无线路由器，你连上他信号是满格，你的网络也不会好。所以信号格并不是越多越好，具体还得看使用的情况。</span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑, sans-serif\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/39f428655674dd93fd83a05810de361a.jpg\"/></span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑, sans-serif\"><br/></span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><strong><span style=\"font-family: 微软雅黑, sans-serif\">5.手机的跑分并不是越高越好</span></strong></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑, sans-serif\">如果买手机很注重性能的朋友，相信一定会去关注手机的跑分。说起跑分，不得不提到为发烧而生的小米，前几代机型出来的时候跑分是必定宣传的，当然结果也是肯定吊打其他厂家的。那是不是跑分越高越好呢？</span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑, sans-serif\">当然不是，跑分虽然是最直接体现手机性性能的一种方式，但是现在的用户更关注的是综合性能。比如跑分高的同时，发热怎么样？续航怎么样？系统优化的怎么样？而不是光光看跑分了。即便是现在的小米新机发布，也基本上不会拿跑分来说事了。</span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑, sans-serif\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/571cd1eb203f068695a770af4d0bb0cc.jpg\"/></span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑, sans-serif\"><br/></span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><br/></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><span style=\"font-family: 微软雅黑, sans-serif\">以上就是关于手机的一些冷知识，希望对大家有所帮助。都说手机行业深似海，别说外行消费者了，就连业内人员也不一定搞得懂全部的东西。怎么办？说来也简单，还记得雷军说过：小米硬件综合净利润率，永远不会超过5%。所以小米产品，不了解那么多冷知识也行，闭着眼睛都能买。</span></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><br/></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><strong>本帖首发于小米社区，由小米达人先锋队倾情出品，未经允许请勿引用转载或商业用途!</strong></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255)\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/6ba61839072a2d6bb2bb8a99109f362c.jpg\"/></p><p style=\"margin-bottom: 0px;padding: 0px;line-height: 28px;color: rgb(51, 51, 51);font-family: arial, &#39;Microsoft Yahei&#39;, &#39;Hiragino Sans GB&#39;, sans-serif;white-space: normal;background-color: rgb(255, 255, 255);text-align: center\"><a href=\"http://bbs.xiaomi.cn/t-13573515\" target=\"_blank\" style=\"outline: 0px;line-height: 28px;font-size: 14px\">加入小米达人组 &nbsp; &nbsp;一起探索黑科技</a></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/></p>', '2018-07-21 17:42:36', '2018-07-21 17:42:36', null);
INSERT INTO `jc_notice` VALUES ('39', '50', '小调查 || 谁是手机界的颜值担当？', '<p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">对于手机的颜值，对于大多数人来说，在选购时的比例要占据70%，这是一个看“脸”的社会，同样在快速发展的手机界，也同样拼颜值的，对于笔者来说，小米MIX 2S采用了四曲面陶瓷，中框为7000系铝合金，提供陶瓷黑和陶瓷白两种配色，颜值不俗。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/e2b98f6b08edfc454138f7b4e32bcfa4.jpg\"/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">小米8采用超轻四曲面，轻薄圆润，舒适握感，四曲面玻璃机身， 超轻 7 系铝金属中框，水滴弧收腰设计。正面采用了COF 封装带下巴的OLED 刘海异形全面屏，&nbsp;6.2 英寸FHD+ 级AMOLED 屏幕，显示效果还是非常细腻饱满的。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/780c9393e59a3ffb740ec395a95d774d.jpg\"/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">小米6X采用了比较纯熟的全金属一体成型机身，辅以简洁的“一刀切”式纳米注塑天线带。作为一款大屏手机，小米6X仅7.3mm薄，用了一种官方命名为“杨柳腰”的背部曲线设计，微弧的过渡更显精致的同时，也更加贴合手掌。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/f43df2bc3a305192589d2a561d2d7c6c.jpg\"/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">小米6就颜值很好，小米6采用了四曲面玻璃设计，边框为不锈钢材质，有亮黑、亮蓝和亮白三种颜色可选，并提供了陶瓷黑尊享版，占据的心里马上就出手购买了，反正不到一年，我认为她的颜值还在，独立存在！听说长的好小伙伴，刷个脸都能横行天下。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/f42235f5e93989a119910846cbbe2913.jpg\"/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">小米8SE惊艳的 5.88&#39;&#39; 全面屏，却有着大小合手的 5.2&#39;&#39; 传统机身握感。外观设计硬朗利落，精湛的多层镀膜工艺带来莹润光泽，握在手中熠熠闪亮。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;\"><img src=\"http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/57301188b99ffbdc6a1fb152a8de36a5.jpg\"/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">红米6pro，这是一块能让你更加沉浸其中的屏幕。红米6 Pro配备了新一代 5.84&quot; 全高清全面屏，19:9的显示比例，为你带来更震撼的视野，更舒适的握持感。还有一键“隐藏屏幕刘海”，随意切换你喜欢的造型。</p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(239, 83, 80);\">手机要是有高颜值的外观，也是能收获一票的迷弟迷妹！</span></p><p style=\"margin-bottom: 0px; padding: 0px; line-height: 28px; color: rgb(51, 51, 51); font-family: arial, &quot;Microsoft Yahei&quot;, &quot;Hiragino Sans GB&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(239, 83, 80);\">投票选择你认为外观最好看的手机是哪部？是什么设计迷倒了你！&nbsp; &nbsp;&nbsp;</span></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/></p>', '2018-07-21 17:43:34', '2018-07-21 17:43:34', null);

-- ----------------------------
-- Table structure for jc_orders
-- ----------------------------
DROP TABLE IF EXISTS `jc_orders`;
CREATE TABLE `jc_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ordersnum` char(20) DEFAULT NULL COMMENT '发货单号',
  `uid` int(11) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL COMMENT '关联商品ID',
  `recipients` char(20) DEFAULT NULL COMMENT '收件人',
  `phone` char(11) DEFAULT NULL COMMENT '手机号',
  `address` varchar(100) DEFAULT NULL COMMENT '收货地址',
  `num` int(11) DEFAULT NULL COMMENT '商品数量',
  `total` char(6) DEFAULT NULL COMMENT '订单总金额',
  `status` set('0','1','2') DEFAULT '' COMMENT '0未发货,1已发货,2交易完成,默认为0',
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=120 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jc_orders
-- ----------------------------
INSERT INTO `jc_orders` VALUES ('96', '20180723545707', '37', '5', '李', '18888888888', '北京市北京市昌平区育荣教育园1号楼', '1', '1899', '1', '2018-07-23 17:25:12', null, '2018-07-23 17:25:43');
INSERT INTO `jc_orders` VALUES ('97', '20180723545707', '37', '4', '李', '18888888888', '北京市北京市昌平区育荣教育园1号楼', '1', '2499', '0', '2018-07-23 17:25:12', null, '2018-07-23 17:25:12');
INSERT INTO `jc_orders` VALUES ('98', '20180723273912', '37', '4', '李', '18888888888', '北京市北京市昌平区育荣教育园1号楼', '1', '2499', '1', '2018-07-23 18:27:42', null, '2018-07-24 19:36:36');
INSERT INTO `jc_orders` VALUES ('100', '20180723181437', '37', '4', '李', '18888888888', '北京市北京市昌平区育荣教育园1号楼', '1', '2499', '0', '2018-07-23 19:34:19', null, '2018-07-23 19:34:19');
INSERT INTO `jc_orders` VALUES ('101', '20180723309452', '37', '4', '叶尚君', '13513112211', '河北省唐山市迁安市建昌营小庄村', '1', '2499', '0', '2018-07-23 23:03:32', null, '2018-07-23 23:03:32');
INSERT INTO `jc_orders` VALUES ('102', '20180724717537', '37', '53', '叶尚君', '13513112211', '河北省唐山市迁安市建昌营小庄村', '1', '3199', '0', '2018-07-24 09:41:13', null, '2018-07-24 09:41:13');
INSERT INTO `jc_orders` VALUES ('103', '20180724442197', '54', '4', 'bhj', '12312312', '上海市上海市徐汇区bhj', '1', '2499', '1', '2018-07-24 11:22:40', null, '2018-07-24 11:23:52');
INSERT INTO `jc_orders` VALUES ('104', '20180724349363', '56', '4', '李', '18838388383', '北京市北京市昌平区育荣教育园区1号楼', '1', '2499', '0', '2018-07-24 12:01:52', null, '2018-07-24 12:01:52');
INSERT INTO `jc_orders` VALUES ('107', '20180724676916', '56', '5', '李', '18838388383', '北京市北京市昌平区育荣教育园区1号楼', '2', '3798', '0', '2018-07-24 17:00:46', null, '2018-07-24 17:00:46');
INSERT INTO `jc_orders` VALUES ('108', '20180724676916', '56', '4', '李', '18838388383', '北京市北京市昌平区育荣教育园区1号楼', '1', '2499', '0', '2018-07-24 17:00:46', '2018-07-24 19:37:53', '2018-07-24 19:37:53');
INSERT INTO `jc_orders` VALUES ('109', '20180724531419', '55', '37', '叶尚君', '13513112211', '河北省唐山市迁安市建昌营镇', '1', '8999', '0', '2018-07-24 22:05:32', null, '2018-07-24 22:05:32');
INSERT INTO `jc_orders` VALUES ('110', '20180724531419', '55', '8', '叶尚君', '13513112211', '河北省唐山市迁安市建昌营镇', '3', '2331', '0', '2018-07-24 22:05:32', null, '2018-07-24 22:05:32');
INSERT INTO `jc_orders` VALUES ('111', '20180724748540', '55', '4', '叶尚君', '13513112211', '河北省唐山市迁安市建昌营镇', '1', '2499', '0', '2018-07-24 22:14:52', null, '2018-07-24 22:14:52');
INSERT INTO `jc_orders` VALUES ('112', '20180802428726', '54', '4', 'bhj', '12312312', '上海市上海市徐汇区bhj', '1', '2499', '0', '2018-08-02 17:19:47', null, '2018-08-02 17:19:47');
INSERT INTO `jc_orders` VALUES ('113', '20180802428726', '54', '27', 'bhj', '12312312', '上海市上海市徐汇区bhj', '1', '2999', '0', '2018-08-02 17:19:47', null, '2018-08-02 17:19:47');
INSERT INTO `jc_orders` VALUES ('114', '20180803636365', '37', '4', '叶尚君', '13513112211', '河北省唐山市迁安市建昌营小庄村', '2', '4998', '0', '2018-08-03 15:00:40', null, '2018-08-03 15:00:40');
INSERT INTO `jc_orders` VALUES ('115', '20180804583436', '52', '5', '李', '13913913913', '北京市北京市昌平区育荣教育园1号楼', '1', '1899', '0', '2018-08-04 07:02:23', null, '2018-08-04 07:02:23');
INSERT INTO `jc_orders` VALUES ('116', '20180804186293', '52', '8', '李', '13913913913', '北京市北京市昌平区育荣教育园1号楼', '1', '777', '0', '2018-08-04 07:11:23', null, '2018-08-04 07:11:23');
INSERT INTO `jc_orders` VALUES ('117', '20180804466498', '52', '27', '李', '13913913913', '北京市北京市昌平区育荣教育园1号楼', '1', '2999', '0', '2018-08-04 07:13:29', null, '2018-08-04 07:13:29');
INSERT INTO `jc_orders` VALUES ('118', '20180807296450', '52', '4', '李', '13913913913', '北京市北京市昌平区育荣教育园1号楼', '1', '2499', '0', '2018-08-07 10:29:42', null, '2018-08-07 10:29:42');
INSERT INTO `jc_orders` VALUES ('119', '20180807296450', '52', '4', '李', '13913913913', '北京市北京市昌平区育荣教育园1号楼', '1', '2499', '0', '2018-08-07 10:29:42', null, '2018-08-07 10:29:42');

-- ----------------------------
-- Table structure for jc_recommends
-- ----------------------------
DROP TABLE IF EXISTS `jc_recommends`;
CREATE TABLE `jc_recommends` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(10) DEFAULT NULL,
  `rimg` varchar(255) DEFAULT NULL,
  `rstate` enum('1','0') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jc_recommends
-- ----------------------------
INSERT INTO `jc_recommends` VALUES ('36', '18', '/uploads/rphoto/20180723/LJCo4kubQ4.jpg', '1', '2018-07-12 19:59:34', '2018-07-23 16:26:09', null);
INSERT INTO `jc_recommends` VALUES ('37', '19', '/uploads/rphoto/20180712/YshKTuyaEG.jpg', '1', '2018-07-12 19:59:56', '2018-07-12 19:59:56', null);
INSERT INTO `jc_recommends` VALUES ('38', '20', '/uploads/rphoto/20180712/c1ECXCpjfL.png', '1', '2018-07-12 20:00:12', '2018-07-12 20:00:12', null);
INSERT INTO `jc_recommends` VALUES ('39', '14', '/uploads/rphoto/20180712/XerPc1G5Mn.jpg', '1', '2018-07-12 21:06:19', '2018-07-12 21:06:19', null);
INSERT INTO `jc_recommends` VALUES ('40', '15', '/uploads/rphoto/20180712/wLY1k4IdhA.jpg', '1', '2018-07-12 21:06:33', '2018-07-12 21:06:33', null);
INSERT INTO `jc_recommends` VALUES ('41', '17', '/uploads/rphoto/20180712/e8s8noX0Lm.jpg', '1', '2018-07-12 21:06:55', '2018-07-23 16:19:16', null);
INSERT INTO `jc_recommends` VALUES ('42', '16', '/uploads/rphoto/20180712/SHjvRqivxn.jpg', '1', '2018-07-12 21:16:28', '2018-07-23 16:19:17', null);
INSERT INTO `jc_recommends` VALUES ('44', '21', '/uploads/rphoto/20180712/59m5ybNCia.jpg', '1', '2018-07-12 21:17:57', '2018-07-12 21:17:57', null);
INSERT INTO `jc_recommends` VALUES ('45', '23', '/uploads/rphoto/20180712/Ad4LIt68tI.jpg', '1', '2018-07-12 21:18:11', '2018-07-12 21:18:11', null);
INSERT INTO `jc_recommends` VALUES ('46', '25', '/uploads/rphoto/20180712/mqPvRWp7gt.jpg', '1', '2018-07-12 21:18:25', '2018-07-12 21:18:25', null);
INSERT INTO `jc_recommends` VALUES ('47', '22', '/uploads/rphoto/20180712/SESVmQbeUq.jpg', '1', '2018-07-12 21:18:37', '2018-07-12 21:18:37', null);
INSERT INTO `jc_recommends` VALUES ('48', '27', '/uploads/rphoto/20180712/9nWxIaZmwS.jpg', '1', '2018-07-12 21:51:31', '2018-07-12 21:51:31', null);
INSERT INTO `jc_recommends` VALUES ('49', '26', '/uploads/rphoto/20180712/lRreqlfUA2.jpg', '1', '2018-07-12 21:51:47', '2018-07-12 21:51:47', null);
INSERT INTO `jc_recommends` VALUES ('50', '33', '/uploads/rphoto/20180715/M0t1oFNit8.jpg', '1', '2018-07-15 16:30:48', '2018-07-15 16:30:48', null);
INSERT INTO `jc_recommends` VALUES ('51', '34', '/uploads/rphoto/20180715/v5tIsOdUF8.jpg', '1', '2018-07-15 16:31:12', '2018-07-15 16:31:12', null);
INSERT INTO `jc_recommends` VALUES ('52', '36', '/uploads/rphoto/20180715/q5h5Td6OqK.jpg', '1', '2018-07-15 16:32:44', '2018-07-15 16:32:44', null);
INSERT INTO `jc_recommends` VALUES ('53', '37', '/uploads/rphoto/20180715/adOnWxJPOY.jpg', '1', '2018-07-15 16:33:32', '2018-07-15 16:33:32', null);
INSERT INTO `jc_recommends` VALUES ('54', '38', '/uploads/rphoto/20180715/NWW4ZEXSjT.jpg', '1', '2018-07-15 16:33:43', '2018-07-15 16:33:43', null);
INSERT INTO `jc_recommends` VALUES ('55', '39', '/uploads/rphoto/20180715/dswbQTHbHT.jpg', '1', '2018-07-15 16:34:24', '2018-07-15 16:34:24', null);
INSERT INTO `jc_recommends` VALUES ('56', '40', '/uploads/rphoto/20180715/4k0GnsbaNY.jpg', '1', '2018-07-15 16:34:46', '2018-07-15 16:34:46', null);
INSERT INTO `jc_recommends` VALUES ('57', '28', '/uploads/rphoto/20180715/01tQrmm9vI.jpg', '1', '2018-07-15 16:35:03', '2018-07-15 16:35:03', null);
INSERT INTO `jc_recommends` VALUES ('58', '29', '/uploads/rphoto/20180715/w1QBkwPIK8.jpg', '1', '2018-07-15 16:35:15', '2018-07-15 16:35:15', null);
INSERT INTO `jc_recommends` VALUES ('59', '30', '/uploads/rphoto/20180715/EjSKomAx8n.jpg', '1', '2018-07-15 16:35:28', '2018-07-15 16:35:28', null);
INSERT INTO `jc_recommends` VALUES ('60', '31', '/uploads/rphoto/20180715/ZYEXF0UxBf.jpg', '1', '2018-07-15 16:35:43', '2018-07-15 16:35:43', null);
INSERT INTO `jc_recommends` VALUES ('61', '32', '/uploads/rphoto/20180715/KqGqtv2bd9.jpg', '1', '2018-07-15 16:36:05', '2018-07-15 16:36:05', null);
INSERT INTO `jc_recommends` VALUES ('62', '43', '/uploads/rphoto/20180721/36ed8iUPNG.jpg', '1', '2018-07-21 15:26:30', '2018-07-23 19:42:54', null);

-- ----------------------------
-- Table structure for jc_shields
-- ----------------------------
DROP TABLE IF EXISTS `jc_shields`;
CREATE TABLE `jc_shields` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `onoff` enum('0','1') DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jc_shields
-- ----------------------------
INSERT INTO `jc_shields` VALUES ('1', '大傻子,二愣子,特朗普,点击领奖,恭喜获奖,领取奖品,http://www,https://,链接', '1', '2018-07-23 00:00:00', '2018-07-23 22:40:49', null);

-- ----------------------------
-- Table structure for jc_shop_cars
-- ----------------------------
DROP TABLE IF EXISTS `jc_shop_cars`;
CREATE TABLE `jc_shop_cars` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `gname` varchar(30) DEFAULT NULL,
  `gnum` int(11) DEFAULT NULL,
  `gprice` int(11) DEFAULT NULL,
  `gcolor` char(20) DEFAULT NULL,
  `gtype` char(20) DEFAULT NULL,
  `gpic` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=171 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jc_shop_cars
-- ----------------------------
INSERT INTO `jc_shop_cars` VALUES ('46', '39', '4', '小米6', '4', '2499', '土豪金', '6G+64G', '/uploads/goods/gphoto/20180711/DMIWdnRiK7.jpg', '2018-07-23 14:31:49', '2018-07-23 14:34:38', null);
INSERT INTO `jc_shop_cars` VALUES ('29', '47', '5', '小米4', '2', '1899', '尊贵黑', '4G+16G', '/uploads/goods/gphoto/20180711/qVjdKgiJxx.jpg', '2018-07-22 12:12:06', '2018-07-22 12:12:06', null);
INSERT INTO `jc_shop_cars` VALUES ('28', '47', '4', '小米6', '1', '2499', '土豪金', '6G+64G', '/uploads/goods/gphoto/20180711/DMIWdnRiK7.jpg', '2018-07-22 12:12:01', '2018-07-22 12:12:01', null);
INSERT INTO `jc_shop_cars` VALUES ('45', '39', '13', '红米5移动4G版', '1', '799', '土豪金', '2G+8G', '/uploads/goods/gphoto/20180712/Q3rhW1U0so.jpg', '2018-07-23 14:22:21', '2018-07-23 14:22:21', null);
INSERT INTO `jc_shop_cars` VALUES ('47', '39', '8', '红米Note1', '1', '777', '土豪金', '2G+8G', '/uploads/goods/gphoto/20180712/kRYSaMiRN4.jpg', '2018-07-23 14:32:32', '2018-07-23 14:32:32', null);
INSERT INTO `jc_shop_cars` VALUES ('105', '51', '4', '小米6', '1', '2499', '土豪金', '6G+64G', '/uploads/goods/gphoto/20180711/DMIWdnRiK7.jpg', '2018-07-23 17:28:39', '2018-07-23 17:28:39', null);
INSERT INTO `jc_shop_cars` VALUES ('50', '39', '4', '小米6', '2', '2499', '土豪金', '6G+64G', '/uploads/goods/gphoto/20180711/DMIWdnRiK7.jpg', '2018-07-23 14:42:33', '2018-07-23 14:42:33', null);
INSERT INTO `jc_shop_cars` VALUES ('51', '39', '10', '小米电视 2', '1', '1888', '土豪金', '2G+8G', '/uploads/goods/gphoto/20180712/lb02Kvxgmt.jpg', '2018-07-23 14:45:24', '2018-07-23 14:45:24', null);
INSERT INTO `jc_shop_cars` VALUES ('52', '49', '4', '小米6', '3', '2499', '土豪金', '6G+64G', '/uploads/goods/gphoto/20180711/DMIWdnRiK7.jpg', '2018-07-23 14:46:27', '2018-07-23 14:48:09', null);
INSERT INTO `jc_shop_cars` VALUES ('53', '49', '5', '小米4', '2', '1899', '尊贵黑', '4G+16G', '/uploads/goods/gphoto/20180711/qVjdKgiJxx.jpg', '2018-07-23 14:46:56', '2018-07-23 14:47:17', null);
INSERT INTO `jc_shop_cars` VALUES ('119', '50', '4', '小米6', '4', '2499', '土豪金', '6G+64G', '/uploads/goods/gphoto/20180711/DMIWdnRiK7.jpg', '2018-07-23 19:10:33', '2018-07-23 19:10:53', null);

-- ----------------------------
-- Table structure for jc_slids
-- ----------------------------
DROP TABLE IF EXISTS `jc_slids`;
CREATE TABLE `jc_slids` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `simg` varchar(255) DEFAULT NULL,
  `surl` varchar(255) DEFAULT NULL,
  `state` enum('0','1') DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jc_slids
-- ----------------------------
INSERT INTO `jc_slids` VALUES ('21', '/uploads/slideshow/20180710/iRTcK9WTTp9L3TMkEoWP.jpg', 'mi-1', '0', '2018-07-24 19:41:39', '2018-07-10 19:21:10', '2018-07-24 19:41:39');
INSERT INTO `jc_slids` VALUES ('22', '/uploads/slideshow/20180710/uW0o63jucg7yiILlOorj.jpg', 'mi-2', '1', '2018-07-11 21:53:44', '2018-07-10 19:21:19', null);
INSERT INTO `jc_slids` VALUES ('23', '/uploads/slideshow/20180710/sVd3sLqcz2GApXzxylJp.jpg', 'mi-3', '1', '2018-07-11 21:53:36', '2018-07-10 19:21:27', null);
INSERT INTO `jc_slids` VALUES ('24', '/uploads/slideshow/20180710/HkbvoryeFwGjEO3pP8Rp.jpg', 'mi-4', '1', '2018-07-11 21:53:33', '2018-07-10 19:21:38', null);
INSERT INTO `jc_slids` VALUES ('25', '/uploads/slideshow/20180710/H3cUxGfftq8rAXIYVGyg.jpg', 'mi-5', '1', '2018-07-11 21:53:46', '2018-07-10 20:17:40', null);
INSERT INTO `jc_slids` VALUES ('27', '/uploads/slideshow/20180710/B63bXSjmfT8mgxOoOLmx.jpg', '活动链接', '0', '2018-07-12 13:08:50', '2018-07-10 20:51:37', null);

-- ----------------------------
-- Table structure for jc_users
-- ----------------------------
DROP TABLE IF EXISTS `jc_users`;
CREATE TABLE `jc_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(30) DEFAULT NULL,
  `password` char(80) NOT NULL,
  `email` varchar(50) NOT NULL,
  `grade` set('3','2','1') DEFAULT '3' COMMENT '1为超级管理员2为管理员3为普通用户',
  `login` enum('1','0') DEFAULT '0' COMMENT '默认为0  为 未登录 1为登录',
  `yanzheng` int(11) DEFAULT NULL,
  `token` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jc_users
-- ----------------------------
INSERT INTO `jc_users` VALUES ('58', '匿名用户', '$2y$10$oxsWsF5eklhL0tLlnhNOfu.ylQeGyr89uIGb8PVJUfrLcQUu3Fjy.', '000@qq.com', '3', '0', null, '292S2K7S66rxrEqp3Hs1qVSJkrUNFOV1cfMtzYNvNRgnU51Qfk', '2018-07-22 04:41:49', null, null);
INSERT INTO `jc_users` VALUES ('37', 'user', '$2y$10$6aKOoYEGObDYSxkDSiSM/eI/j8QEni8LiQCvbS9MTbr0QlmN3zajS', '123033@qq.com', '3', '0', null, '8bSO9ZKLS3HMWlJHbHoDrDoFO9BJTU3x4LLPBa4R2QWTORJZ8A', '2018-07-22 04:41:49', null, '2018-08-07 11:50:13');
INSERT INTO `jc_users` VALUES ('50', 'admin', '$2y$10$0njrSiBdYTOZDRThhBNcFeG1SRSLQc07czl.dtHZ9pWCFyQ1eo1VS', '123@qq.com', '1', '1', null, null, '2018-07-23 00:00:00', null, '2018-07-24 23:21:07');
INSERT INTO `jc_users` VALUES ('52', 'guest', '$2y$10$W9dBYwPTW88Qcr.15dCte.weDB1Kx7vWTW9rwteHJK4Eq7ZPZdBnm', '123@qq.com', '3', '1', null, null, '2018-07-23 00:00:00', null, '2018-08-04 07:08:34');
INSERT INTO `jc_users` VALUES ('54', 'usesrqiu', '$2y$10$WVX5M.wR1yoZlvUmRXJfR.80sqw9sy0KoN6kAdIEW8vw1Vs61Hn0W', '756284978@qq.com', '3', '1', null, 'OvgmR25E7jrbITdA9joei0o4EzZsMvXe81X7g7Zibf21mT05nI', null, null, '2018-08-02 17:19:23');
INSERT INTO `jc_users` VALUES ('55', 'xiaoye', '$2y$10$XDQ6DYUOT9jF8SisFh1FbuRPVaM7F17pzVTh6Jkn8caR4WRWHK71K', 'xiaoye@qq.com', '3', '1', null, 'ducd9klG9loX5UTza5GdSPUIJ3HZoJnzJifs5XuYRmOH57BC8J', null, null, '2018-08-02 18:28:38');
INSERT INTO `jc_users` VALUES ('56', 'user8', '$2y$10$gbsXqzUiaPbfjxNU4GFOyuv1Qnba7j.acZsAFOsc68K/gUt5s9UJK', 'xiaolitongzhi1996@126.com', '3', '0', null, 'O7WKimtsNCO3LzoVFAPHdaB3onvyp0JQYfK5lQmAhK4rW84OYz', null, null, '2018-07-24 17:02:18');
INSERT INTO `jc_users` VALUES ('57', '12421wqe', '$2y$10$/mkZ3pQpEWCxBIztPO69juCcwBNoea7f3O9I2K2i3rwvQW9gaVY3K', '1231@qq.com', '3', '0', null, null, null, '2018-07-24 19:36:03', '2018-07-24 19:36:03');

-- ----------------------------
-- Table structure for jc_user_address
-- ----------------------------
DROP TABLE IF EXISTS `jc_user_address`;
CREATE TABLE `jc_user_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jc_user_address
-- ----------------------------
INSERT INTO `jc_user_address` VALUES ('36', '21', 'admin', '山西省大同市南郊区阿萨德', '13513112211', '0664403', '假', '2018-07-18 22:22:25', '2018-07-18 22:22:25', null);
INSERT INTO `jc_user_address` VALUES ('44', '21', '123', '重庆市重庆市沙坪坝区阿萨德', '13513112211', '066440', '家', '2018-07-21 21:30:13', '2018-07-21 21:30:13', null);
INSERT INTO `jc_user_address` VALUES ('45', '24', 'admin', '重庆市重庆市江北区阿萨德', '135131122132', '0664401231', '家', '2018-07-22 03:47:20', '2018-07-22 03:50:13', null);
INSERT INTO `jc_user_address` VALUES ('46', '37', '叶尚君', '河北省唐山市迁安市建昌营小庄村', '13513112211', '064400', '家', '2018-07-22 04:43:49', '2018-07-22 11:12:25', null);
INSERT INTO `jc_user_address` VALUES ('49', '39', '李', '北京市北京市昌平区育荣教育园1号楼', '18888888888', '383838', '学校', '2018-07-22 13:02:59', '2018-07-22 13:02:59', null);
INSERT INTO `jc_user_address` VALUES ('60', '55', '叶尚君', '河北省唐山市迁安市建昌营镇', '13513112211', '066440', '家', '2018-07-24 09:55:20', '2018-07-24 09:55:20', null);
INSERT INTO `jc_user_address` VALUES ('62', '54', 'bhj', '上海市上海市徐汇区bhj', '12312312', '1231', '', '2018-07-24 11:22:29', '2018-07-24 11:22:29', null);
INSERT INTO `jc_user_address` VALUES ('63', '56', '李', '北京市北京市昌平区育荣教育园区1号楼', '18838388383', '100101', '学校', '2018-07-24 12:01:44', '2018-07-24 12:01:44', null);
INSERT INTO `jc_user_address` VALUES ('66', '52', '李', '北京市北京市昌平区育荣教育园1号楼', '13913913913', '101010', '学校', '2018-08-04 07:02:19', '2018-08-04 07:02:19', null);

-- ----------------------------
-- Table structure for jc_user_details
-- ----------------------------
DROP TABLE IF EXISTS `jc_user_details`;
CREATE TABLE `jc_user_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `phone` char(11) DEFAULT NULL,
  `id_card` char(18) DEFAULT NULL,
  `face` varchar(50) DEFAULT NULL,
  `sex` enum('0','1') DEFAULT '0' COMMENT '0为女1为男',
  `addr` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jc_user_details
-- ----------------------------
INSERT INTO `jc_user_details` VALUES ('39', '50', '超级管理员', '18888888', '123321', '/uploads/hpic/20180723/DCw4uS5shRNyPxxNmrzW.jpg', '1', '1123', null, null, null);
INSERT INTO `jc_user_details` VALUES ('47', '0', '匿名用户', '000', '000000000000000000', '/uploads/hpic/mr/CHZEvbLFV707vZ1ONYuT.jpg', '0', '123456', '2018-07-18 08:01:42', null, null);
INSERT INTO `jc_user_details` VALUES ('43', '54', null, null, null, '/uploads/hpic/20180724/EB4zNGmeVf51N7D9tICY.jpg', '0', null, '2018-07-24 09:23:19', '2018-07-24 11:24:21', null);
INSERT INTO `jc_user_details` VALUES ('44', '55', null, null, null, '/uploads/hpic/20180724/yNWmDFBP9epKEOW2Wv0u.jpg', '0', null, '2018-07-24 09:25:17', '2018-07-24 11:06:10', null);
INSERT INTO `jc_user_details` VALUES ('45', '56', '小李同志', '15611597775', '123456789012345678', '/uploads/hpic/20180724/rZ41xdIi6nsKRpYIGhie.jpg', '1', '', '2018-07-24 10:41:28', '2018-07-24 10:44:32', null);
INSERT INTO `jc_user_details` VALUES ('41', '52', '来宾用户', '13333333333', '1333333333', '/uploads/hpic/20180723/6oy9Qqa1ppsv93IZsCZq.jpg', '1', '', null, null, null);
INSERT INTO `jc_user_details` VALUES ('29', '37', '前台测试用户', '13513112211', '123456', '/uploads/hpic/20180723/MzsRfEEvODS8iBs9pTE7.jpg', '1', '河北', null, '2018-07-24 23:46:28', null);
INSERT INTO `jc_user_details` VALUES ('46', '57', 'qweqw', '123123', '12412312', '/uploads/hpic/mr/CHZEvbLFV707vZ1ONYuT.jpg', '1', '', null, null, null);

-- ----------------------------
-- Table structure for js_discounts
-- ----------------------------
DROP TABLE IF EXISTS `js_discounts`;
CREATE TABLE `js_discounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(11) DEFAULT NULL COMMENT '商品的id号',
  `gname` char(255) DEFAULT NULL,
  `price` char(10) DEFAULT NULL COMMENT '商品的现价',
  `discount` char(10) DEFAULT NULL COMMENT '商品的打完折的价格',
  `describe` varchar(255) DEFAULT NULL COMMENT '对打折的描述,或者打几折,或者减N元',
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of js_discounts
-- ----------------------------
INSERT INTO `js_discounts` VALUES ('4', '4', '小米6', '2499', '2399', '6', '2018-07-22 22:05:39', null, '2018-07-22 22:05:39');
INSERT INTO `js_discounts` VALUES ('5', '11', '小米平板1', '1899', '1599', '4', '2018-07-22 22:34:17', null, '2018-07-22 22:34:17');
INSERT INTO `js_discounts` VALUES ('7', '6', '红米1', '799', '499', '4', '2018-07-22 22:35:59', null, '2018-07-22 22:35:59');
INSERT INTO `js_discounts` VALUES ('9', '18', '红米6 Pro', '1199', '699', '3', '2018-07-22 10:55:19', null, '2018-07-22 10:55:19');
INSERT INTO `js_discounts` VALUES ('10', '12', '小米空气净化器', '99', '50', '6', '2018-07-22 10:55:28', null, '2018-07-22 10:55:28');
INSERT INTO `js_discounts` VALUES ('11', '27', '黑鲨手机', '3299', '2999', '4', '2018-07-22 10:55:38', null, '2018-07-22 10:55:38');
INSERT INTO `js_discounts` VALUES ('12', '43', '小米手环3', '189', '94.5', '1', '2018-07-22 10:55:50', null, '2018-07-22 10:55:50');
INSERT INTO `js_discounts` VALUES ('13', '38', '小米电视4A 32\'\'', '999', '499.5', '1', '2018-07-22 10:56:00', null, '2018-07-22 10:56:00');
INSERT INTO `js_discounts` VALUES ('14', '50', '小米笔记本Air', '5399', '4899', '3', '2018-07-23 17:09:27', null, '2018-07-23 17:09:27');
INSERT INTO `js_discounts` VALUES ('15', '37', '小米电视4 75\'\'', '9999', '9799', '5', '2018-07-23 19:20:52', null, '2018-07-23 19:21:14');
