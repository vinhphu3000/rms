/*
Navicat MySQL Data Transfer

Source Server         : rms
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : rms

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-12-13 17:27:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for acl_permissions
-- ----------------------------
DROP TABLE IF EXISTS `acl_permissions`;
CREATE TABLE `acl_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ident` varchar(255) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of acl_permissions
-- ----------------------------
INSERT INTO `acl_permissions` VALUES ('6', 'QLDH-XDSDH', 'Xem danh sách đơn hàng ', '6');
INSERT INTO `acl_permissions` VALUES ('7', 'QLDH-TDH', 'Tạo đơn hàng ', '6');
INSERT INTO `acl_permissions` VALUES ('8', 'QLDH-HDTH', ' Huỷ/đổi trả hàng ', '6');
INSERT INTO `acl_permissions` VALUES ('9', 'QLK-CNSTOCK', 'Cập nhật stock ', '3');
INSERT INTO `acl_permissions` VALUES ('10', 'QLK-XTK', 'Xem tồn kho ', '3');
INSERT INTO `acl_permissions` VALUES ('11', 'QLBH-XDSSPB', 'Xem danh sách sản phẩm bán ', '7');
INSERT INTO `acl_permissions` VALUES ('12', 'QLBH-EXPORT', ' Export', '7');
INSERT INTO `acl_permissions` VALUES ('13', 'QLCK-XTTCK', 'Xem thông tin chiết khấu ', '8');
INSERT INTO `acl_permissions` VALUES ('14', 'BVGHTK-XTTCX', 'Xem thông tin chính xác', '10');
INSERT INTO `acl_permissions` VALUES ('15', 'HTCH-XDSCH', 'Xem danh sách cửa hàng', '9');
INSERT INTO `acl_permissions` VALUES ('16', 'HTCH-CNHTCH', ' Cập nhật hệ thống cửa hàng ', '9');
INSERT INTO `acl_permissions` VALUES ('17', 'BCTK-XBCTK', 'Xem báo cáo thống kê ', '11');
INSERT INTO `acl_permissions` VALUES ('18', 'BCTK-EXPORT', 'Export', '11');

-- ----------------------------
-- Table structure for acl_permission_groups
-- ----------------------------
DROP TABLE IF EXISTS `acl_permission_groups`;
CREATE TABLE `acl_permission_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of acl_permission_groups
-- ----------------------------
INSERT INTO `acl_permission_groups` VALUES ('1', 'Quản lý đại lý');
INSERT INTO `acl_permission_groups` VALUES ('2', ' 	Quản lý mặt hàng');
INSERT INTO `acl_permission_groups` VALUES ('3', 'Quản lý kho');
INSERT INTO `acl_permission_groups` VALUES ('4', 'Quản lý báo cáo');
INSERT INTO `acl_permission_groups` VALUES ('6', 'Quản lý đơn hàng');
INSERT INTO `acl_permission_groups` VALUES ('7', 'Quản lý bán hàng');
INSERT INTO `acl_permission_groups` VALUES ('8', 'Quản lý chính sách chiết khấu');
INSERT INTO `acl_permission_groups` VALUES ('9', 'Hệ thống cửa hàng');
INSERT INTO `acl_permission_groups` VALUES ('10', 'Bảo vệ giá & hàng tồn kho');
INSERT INTO `acl_permission_groups` VALUES ('11', 'Báo cáo thống kê');
INSERT INTO `acl_permission_groups` VALUES ('12', 'Thông báo');

-- ----------------------------
-- Table structure for acl_roles
-- ----------------------------
DROP TABLE IF EXISTS `acl_roles`;
CREATE TABLE `acl_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `agency_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of acl_roles
-- ----------------------------

-- ----------------------------
-- Table structure for acl_role_permission
-- ----------------------------
DROP TABLE IF EXISTS `acl_role_permission`;
CREATE TABLE `acl_role_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of acl_role_permission
-- ----------------------------

-- ----------------------------
-- Table structure for acl_user_role
-- ----------------------------
DROP TABLE IF EXISTS `acl_user_role`;
CREATE TABLE `acl_user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of acl_user_role
-- ----------------------------

-- ----------------------------
-- Table structure for employee
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `skills` text,
  `introduction_short` text,
  `address` text,
  `join_date` date DEFAULT NULL,
  `sex` tinyint(4) DEFAULT NULL,
  `brithday` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `marital_status` tinyint(4) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employee
-- ----------------------------
INSERT INTO `employee` VALUES ('1', 'TH01', 'Thieu', 'Le Quang', 'Le Quang Thieu', 'quangthieuagu@gmail.com', '0986684184', null, 'PHP; Laravel; Desigin Parttern', null, null, '2016-12-13', '1', '2016-12-04', '1', '0', '1', '1', '2', '3');

-- ----------------------------
-- Table structure for employee_position
-- ----------------------------
DROP TABLE IF EXISTS `employee_position`;
CREATE TABLE `employee_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employee_position
-- ----------------------------
INSERT INTO `employee_position` VALUES ('1', 'SE', 'Software Engineer', null);
INSERT INTO `employee_position` VALUES ('2', 'SSE', 'Senior Software Engineer', null);
INSERT INTO `employee_position` VALUES ('3', 'ACCOUNTAND', 'Accountant', null);
INSERT INTO `employee_position` VALUES ('4', 'CEO', '	Chief Executive Officer (CEO)', null);
INSERT INTO `employee_position` VALUES ('5', 'JTA', '	Junior Technical Author', null);
INSERT INTO `employee_position` VALUES ('6', 'SA', '	Sales Assistant', null);

-- ----------------------------
-- Table structure for employee_role
-- ----------------------------
DROP TABLE IF EXISTS `employee_role`;
CREATE TABLE `employee_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employee_role
-- ----------------------------
INSERT INTO `employee_role` VALUES ('1', 'JSE', 'Junior Software Engineer');
INSERT INTO `employee_role` VALUES ('2', 'SE', 'Software Engineer');
INSERT INTO `employee_role` VALUES ('3', 'SSE', 'Senior Software Engineer');
INSERT INTO `employee_role` VALUES ('4', 'PSE', 'Principle Software Engineer');

-- ----------------------------
-- Table structure for inventory
-- ----------------------------
DROP TABLE IF EXISTS `inventory`;
CREATE TABLE `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(50) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `in_stock` int(11) NOT NULL,
  `sales` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sold` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of inventory
-- ----------------------------

-- ----------------------------
-- Table structure for inventory_log
-- ----------------------------
DROP TABLE IF EXISTS `inventory_log`;
CREATE TABLE `inventory_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dealer_id` varchar(50) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of inventory_log
-- ----------------------------

-- ----------------------------
-- Table structure for office
-- ----------------------------
DROP TABLE IF EXISTS `office`;
CREATE TABLE `office` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `is_primary` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of office
-- ----------------------------

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(50) DEFAULT NULL,
  `xman_order_id` varchar(50) DEFAULT NULL,
  `order_date` varchar(20) NOT NULL,
  `cust_id` varchar(50) NOT NULL,
  `req_date` varchar(20) NOT NULL,
  `ship_addr` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `total_amt` int(50) NOT NULL,
  `vat_amt` int(50) NOT NULL,
  `discount` int(50) NOT NULL,
  `payment_method` char(5) NOT NULL,
  `debt_days` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `status` char(20) DEFAULT '1',
  `cust_name` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `delivered` tinyint(2) DEFAULT NULL,
  `payed` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('62', '00181891', null, '14/09/2015', 'HCM03', '12/09/2015', 'Phu Nhuan', '0967217522', '222080000', '0', '0', 'PAY', '0', '', 'O', null, null, null, null, null);
INSERT INTO `order` VALUES ('63', '00181892', null, '14/09/2015', 'HCM03', '12/09/2015', 'Phu Nhuan', '0967217522', '76990000', '0', '0', 'PAY', '0', 'test', 'S', null, null, null, null, null);
INSERT INTO `order` VALUES ('64', '00181893', null, '14/09/2015', 'HCM03', '12/09/2015', 'Phu Nhuan  ', '0967217522', '36580000', '0', '0', 'PAY', '0', 'test', 'O', null, null, null, null, null);
INSERT INTO `order` VALUES ('68', '00181899', null, '15/09/2015', 'HCM02', '12/12/2015', 'Phu Nhuan', '0967217522', '321420000', '0', '0', 'DEBT', '0', '', 'O', null, null, null, null, null);
INSERT INTO `order` VALUES ('69', '00181900', null, '15/09/2015', 'HCM02', '12/12/2015', 'Phu Nhuan', '0967217522', '321420000', '0', '0', 'DEBT', '0', '', 'O', null, null, null, null, null);
INSERT INTO `order` VALUES ('70', '00181901', null, '15/09/2015', 'HCM02', '12/12/2015', 'Phu Nhuan', '0967217522', '0', '0', '0', 'DEBT', '0', 'gjf', 'O', null, null, null, null, null);
INSERT INTO `order` VALUES ('73', 'BO15091600001', null, '16/09/2015', 'HCM123', '12/12/2015', 'Etown, Cộng Hòa', '0986684184', '16990000', '16990000', '0', 'DEBT', '0', '', 'O', null, '2015-09-18 08:54:19', null, null, null);
INSERT INTO `order` VALUES ('74', 'BO15091600002', null, '16/09/2015', 'HCM02', '12/12/2015', 'reyry', '0967217522', '100550000', '0', '0', 'DEBT', '0', 'rtyrtyrt', 'O', 'B2B ', null, null, null, null);
INSERT INTO `order` VALUES ('75', '00181906', null, '16/09/2015', 'HCM02', '12/12/2015', 'test', '0967217522', '36580000', '36580000', '0', 'DEBT', '1', '', 'O', 'B2B ', '2015-09-18 08:28:08', null, null, null);
INSERT INTO `order` VALUES ('76', 'BO15091800001', null, '18/09/2015', 'DLC0001.1', '18/09/2015', '11', '0909213325', '50970000', '0', '0', 'DEBT', '0', '', 'O', 'Agency01', null, null, null, null);

-- ----------------------------
-- Table structure for order_item
-- ----------------------------
DROP TABLE IF EXISTS `order_item`;
CREATE TABLE `order_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_join_id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `item_id` varchar(50) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `prod_id` varchar(50) NOT NULL,
  `unit_price` int(11) DEFAULT NULL,
  `vat_price` int(11) DEFAULT NULL,
  `promotion` varchar(50) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_item
-- ----------------------------
INSERT INTO `order_item` VALUES ('83', '62', 'BO15091400001', 'A31', 'BQA31___BL', 'iPhone 6 16GB Gold', 'BQA31___BL', '16990000', '16990000', 'N', '0', '5', null, null);
INSERT INTO `order_item` VALUES ('84', '62', 'BO15091400001', 'C31', 'BQC31___BL', 'iPhone 6 Plus 16GB Gray', 'BQC31___BL', '19590000', '19590000', 'N', '0', '7', null, null);
INSERT INTO `order_item` VALUES ('85', '63', 'BO15091481892', 'A31', 'BQA31___BL', 'iPhone 6 16GB Gold', 'BQA31___BL', '16990000', '16990000', 'N', '0', '1', null, null);
INSERT INTO `order_item` VALUES ('86', '63', 'BO15091481892', 'EF71', 'BQEF71__PI', 'Sony Xperia M4 Aqua Dual (Trắng)', 'BQEF71__PI', '6000000', '6000000', 'N', '0', '10', null, null);
INSERT INTO `order_item` VALUES ('87', '64', 'BO15091481893', 'A31', 'BQA31___BL', 'iPhone 6 16GB Gold', 'BQA31___BL', '16990000', '16990000', 'N', '0', '1', null, null);
INSERT INTO `order_item` VALUES ('88', '64', 'BO15091481893', 'C31', 'BQC31___BL', 'iPhone 6 Plus 16GB Gray', 'BQC31___BL', '19590000', '19590000', 'N', '0', '1', null, null);
INSERT INTO `order_item` VALUES ('89', '65', 'BO15091500001', 'C31', 'BQC31___BL', 'iPhone 6 Plus 16GB Gray', 'BQC31___BL', '19590000', '19590000', 'N', '0', '1', null, null);
INSERT INTO `order_item` VALUES ('90', '65', 'BO15091500001', 'A31', 'BQA31___BL', 'iPhone 6 16GB Gold', 'BQA31___BL', '16990000', '16990000', 'N', '0', '9', null, null);
INSERT INTO `order_item` VALUES ('91', '65', 'BO15091500001', 'E61', 'BQE61___BY', 'iPhone 6 Plus 64GB Gold', 'BQE61___BY', '22190000', '22190000', 'N', '0', '5', null, null);
INSERT INTO `order_item` VALUES ('92', '69', 'BO15091581900', 'A31', 'BQA31___BL', 'iPhone 6 16GB Gold', 'BQA31___BL', '16990000', '16990000', 'N', '0', '12', null, null);
INSERT INTO `order_item` VALUES ('93', '69', 'BO15091581900', 'C31', 'BQC31___BL', 'iPhone 6 Plus 16GB Gray', 'BQC31___BL', '19590000', '19590000', 'N', '0', '2', null, null);
INSERT INTO `order_item` VALUES ('94', '69', 'BO15091581900', 'E52', 'BQE52___BL', 'iPhone 6 64GB Gray', 'BQE52___BL', '19590000', '19590000', 'N', '0', '4', null, null);
INSERT INTO `order_item` VALUES ('95', '70', 'BO15091581901', 'A31', 'BQA31___BL', 'iPhone 6 16GB Gold', 'BQA31___BL', '16990000', '16990000', 'N', '0', '0', null, null);
INSERT INTO `order_item` VALUES ('115', '75', '00181906', '75', 'BQA31___BL', 'iPhone 6 16GB Gold', 'BQA31___BL', '16990000', '16990000', null, '0', '3', '2015-09-18 08:28:07', '2015-09-18 08:28:07');
INSERT INTO `order_item` VALUES ('116', '75', '00181906', '75', 'BQC31___BL', 'iPhone 6 Plus 16GB Gray', 'BQC31___BL', '19590000', '19590000', null, '0', '3', '2015-09-18 08:28:07', '2015-09-18 08:28:07');
INSERT INTO `order_item` VALUES ('117', '73', 'BO15091600001', '73', 'BQA31___BL', 'iPhone 6 16GB Gold', 'BQA31___BL', '16990000', '16990000', null, '0', '4', '2015-09-18 08:54:19', '2015-09-18 08:54:19');

-- ----------------------------
-- Table structure for order_return
-- ----------------------------
DROP TABLE IF EXISTS `order_return`;
CREATE TABLE `order_return` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dealer_id` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_return
-- ----------------------------
INSERT INTO `order_return` VALUES ('65', 'HCM03', '2015-09-18 08:35:17', '2015-09-18 08:35:17');
INSERT INTO `order_return` VALUES ('66', 'HCM03', '2015-09-18 08:37:38', '2015-09-18 08:37:38');
INSERT INTO `order_return` VALUES ('67', 'HCM02', '2015-09-18 08:42:24', '2015-09-18 08:42:24');
INSERT INTO `order_return` VALUES ('68', 'DLC0001.1', '2015-09-18 08:52:17', '2015-09-18 08:52:17');

-- ----------------------------
-- Table structure for order_return_items
-- ----------------------------
DROP TABLE IF EXISTS `order_return_items`;
CREATE TABLE `order_return_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_return_id` varchar(20) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_return_items
-- ----------------------------
INSERT INTO `order_return_items` VALUES ('97', '65', 'BQA31___BL', 'iPhone 6 16GB Gold', '16990000', '7', '', '2015-09-18 15:35:17', '0000-00-00 00:00:00');
INSERT INTO `order_return_items` VALUES ('98', '65', 'BQC31___BL', 'iPhone 6 Plus 16GB Gray', '19590000', '9', '', '2015-09-18 15:35:17', '0000-00-00 00:00:00');
INSERT INTO `order_return_items` VALUES ('99', '66', 'BQA31___BL', 'iPhone 6 16GB Gold', '16990000', '7', 'hu cam ung', '2015-09-18 15:37:38', '0000-00-00 00:00:00');
INSERT INTO `order_return_items` VALUES ('100', '66', 'BQC31___BL', 'iPhone 6 Plus 16GB Gray', '19590000', '9', 'hu loa', '2015-09-18 15:37:38', '0000-00-00 00:00:00');
INSERT INTO `order_return_items` VALUES ('101', '67', 'BQA31___BL', 'iPhone 6 16GB Gold', '16990000', '1', '', '2015-09-18 15:42:24', '0000-00-00 00:00:00');
INSERT INTO `order_return_items` VALUES ('102', '68', 'BQA31___BL', 'iPhone 6 16GB Gold', '16990000', '3', '', '2015-09-18 15:52:17', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for project
-- ----------------------------
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `desc` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL COMMENT 'Nam of Icon',
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project
-- ----------------------------

-- ----------------------------
-- Table structure for resetpass_token
-- ----------------------------
DROP TABLE IF EXISTS `resetpass_token`;
CREATE TABLE `resetpass_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expire_date` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  `last_change` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  `user_type` enum('member','agency') NOT NULL DEFAULT 'member',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of resetpass_token
-- ----------------------------
INSERT INTO `resetpass_token` VALUES ('29', 'quangthieuagu@gmail.com', '28af1b88b828d0ba1b0cc7ae41ef28d6', '2015-09-20 10:38:47', '2015-09-17 10:38:47', '2015-09-17 10:38:47', '0', 'agency');
INSERT INTO `resetpass_token` VALUES ('30', 'quangthieuagu@gmail.com', 'd7667ec1cb50fbfbf5e62c3886c063e1', '2015-09-20 14:07:15', '2015-09-17 14:07:15', '2015-09-17 14:07:15', '0', 'agency');
INSERT INTO `resetpass_token` VALUES ('31', 'quangthieuagu@gmail.com', 'cc4ff0e2274871c98793733d79e74abb', '2015-09-20 17:29:54', '2015-09-17 17:29:54', '2015-09-17 17:29:54', '0', 'member');
INSERT INTO `resetpass_token` VALUES ('32', 'quangthieuagu@gmail.com', 'b24d59caf2ff1b2e359de7622eb242d0', '2015-09-20 17:31:27', '2015-09-17 17:31:27', '2015-09-17 17:31:27', '0', 'member');
INSERT INTO `resetpass_token` VALUES ('33', 'quangthieuagu@gmail.com', 'f8738abe1cafe860e25c6c95f86b9f34', '2015-09-21 05:20:58', '2015-09-18 05:20:58', '2015-09-18 05:20:58', '0', 'agency');
INSERT INTO `resetpass_token` VALUES ('34', 'quangthieuagu@gmail.com', '6c05380436940e4fb03e93f279c46e42', '2015-09-21 05:27:08', '2015-09-18 05:27:08', '2015-09-18 05:27:08', '0', 'agency');
INSERT INTO `resetpass_token` VALUES ('35', 'quangthieuagu@gmail.com', '087871988d356490670c3d4d1c9d5473', '2015-09-21 06:22:36', '2015-09-18 06:22:36', '2015-09-18 06:22:36', '0', 'member');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `agency_entity_id` int(11) NOT NULL,
  `agency_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `agency_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `agency_parent_id` varchar(59) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('member','admin') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'member',
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `email_confirm` tinyint(4) NOT NULL DEFAULT '0',
  `group_id` int(11) NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('24', 'Thieu Le Quang', 'quangthieuagu@gmail.com', '25d55ad283aa400af464c76d713c07ad', '266', 'Đại Lý bán sỉ IPAD', 'HCM1985', 'HCM123', 'admin', '1', '1', '10', '64eabde55be6fc85d8d930e959d2e9be', '2015-09-17 07:51:00', '2015-09-18 07:19:00');

-- ----------------------------
-- Table structure for user_groups
-- ----------------------------
DROP TABLE IF EXISTS `user_groups`;
CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `agency_id` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_groups
-- ----------------------------
INSERT INTO `user_groups` VALUES ('5', 'Quản lý đại lý', 'HCM123');
INSERT INTO `user_groups` VALUES ('7', 'Quản lý đơn hàng', 'HCM123');
INSERT INTO `user_groups` VALUES ('8', 'Tài khoản thành viên', 'HCM123');
INSERT INTO `user_groups` VALUES ('10', 'Quản lý kho', 'HCM1985');
INSERT INTO `user_groups` VALUES ('11', 'r', 'HCM02');

-- ----------------------------
-- Table structure for user_group_permission
-- ----------------------------
DROP TABLE IF EXISTS `user_group_permission`;
CREATE TABLE `user_group_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_group_permission
-- ----------------------------
INSERT INTO `user_group_permission` VALUES ('60', '6', '5');
INSERT INTO `user_group_permission` VALUES ('61', '7', '5');
INSERT INTO `user_group_permission` VALUES ('62', '8', '5');
INSERT INTO `user_group_permission` VALUES ('63', '9', '5');
INSERT INTO `user_group_permission` VALUES ('64', '10', '5');
INSERT INTO `user_group_permission` VALUES ('65', '11', '5');
INSERT INTO `user_group_permission` VALUES ('66', '12', '5');
INSERT INTO `user_group_permission` VALUES ('67', '13', '5');
INSERT INTO `user_group_permission` VALUES ('68', '14', '5');
INSERT INTO `user_group_permission` VALUES ('69', '15', '5');
INSERT INTO `user_group_permission` VALUES ('70', '16', '5');
INSERT INTO `user_group_permission` VALUES ('71', '17', '5');
INSERT INTO `user_group_permission` VALUES ('72', '18', '5');
INSERT INTO `user_group_permission` VALUES ('75', '6', '7');
INSERT INTO `user_group_permission` VALUES ('76', '7', '7');
INSERT INTO `user_group_permission` VALUES ('77', '8', '7');
INSERT INTO `user_group_permission` VALUES ('78', '6', '8');
INSERT INTO `user_group_permission` VALUES ('79', '7', '8');
INSERT INTO `user_group_permission` VALUES ('80', '8', '8');
INSERT INTO `user_group_permission` VALUES ('81', '9', '8');
INSERT INTO `user_group_permission` VALUES ('82', '10', '8');
INSERT INTO `user_group_permission` VALUES ('83', '11', '8');
INSERT INTO `user_group_permission` VALUES ('84', '12', '8');
INSERT INTO `user_group_permission` VALUES ('85', '13', '8');
INSERT INTO `user_group_permission` VALUES ('86', '14', '8');
INSERT INTO `user_group_permission` VALUES ('87', '15', '8');
INSERT INTO `user_group_permission` VALUES ('88', '16', '8');
INSERT INTO `user_group_permission` VALUES ('89', '17', '8');
INSERT INTO `user_group_permission` VALUES ('90', '18', '8');
INSERT INTO `user_group_permission` VALUES ('103', '9', '10');
INSERT INTO `user_group_permission` VALUES ('104', '10', '10');
