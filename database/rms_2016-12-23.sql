/*
Navicat MySQL Data Transfer

Source Server         : rms
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : rms

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-12-23 17:02:56
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
  `full_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
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
  `position_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `cv_file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=778 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employee
-- ----------------------------
INSERT INTO `employee` VALUES ('528', 'SD0104', 'Ngo Gia Bao', 'Oai', null, null, null, null, 'VB', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('529', 'SD0108', 'Nguyen Thi Thanh ', 'Ha', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('530', 'SD0110', 'Doan Thi Ngoc', 'Hoa', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('531', 'SD0309', 'Cao Thanh', 'Tuan', 'Cao Thanh Tu_n', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('532', 'SD0114', 'Mai Hoang', 'Thang', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('533', 'SD0116', 'To Gia', 'Phuong', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('534', 'SD0115', 'Luong Thi Kim', 'Hanh', 'L__ng Th_ Kim H_nh', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('535', 'SD0118', 'Do Thi Thu', 'Huong', '__ Th_ Thu H__ng', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('536', 'SD0122', 'Dang Minh', 'Hai', '__ng Minh H_i', null, null, null, 'VB', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('537', 'SD0123', 'Phan Thi ', 'Dieu', 'Phan Th_ Di_u', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('538', 'SD0124', 'Nguyen Thi Minh', 'Khan', 'Nguy_n Th_ Minh Kh_n', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('539', 'SD0127', 'Pham Thi Ngoc ', 'Thuy', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('540', 'SD0315', 'Phan Thi Yen', 'Nhu', 'Phan Th_ Y_n Nh_', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('541', 'SD0038', 'Ngo Thi Hoang', 'Lan', null, null, null, null, 'QC NT', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('542', 'SD0037', 'Dinh Le', 'Duc', null, null, null, null, 'C++', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('543', 'SD0041', 'Nguyen Quoc', 'Huy', 'Nguy_n Qu_c Huy', null, null, null, 'C++', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('544', 'SD0042', 'Nguyen Dinh', 'Thanh', null, null, null, null, 'QC NT', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('545', 'SD0043', 'Nguyen Phuoc', 'An', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('546', 'SD0045', 'Doan Xuan', 'Cuong', null, null, null, null, 'C++', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('547', 'SD0047', 'Huynh Tan', 'Hien', 'Hu_nh T_n Hi_n', null, null, null, 'C++', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('548', 'SD0049', 'Nguyen Thi Phi', 'Yen', 'Nguy_n Th_ Phi Y_n', null, null, null, 'C++', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('549', 'SD0050', 'Pham Thi', 'Lanh', null, null, null, null, 'C++', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('550', 'SD0051', 'Nguyen The', 'Vu', 'Nguy_n Th_ V_', null, null, null, 'Mobile', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('551', 'SD0052', 'Le Hoang Vinh', 'Phuc', null, null, null, null, 'QC NT', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('552', 'SD0053', 'Nguyen Dinh', 'Chinh', null, null, null, null, 'QC NT', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('553', 'SD0054', 'Le Kim', 'Ngoc', null, null, null, null, 'C++', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('554', 'SD0056', 'Nguyen Ba', 'Tinh', null, null, null, null, 'QC NT', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('555', 'SD0060', 'Le Van', 'Khanh', null, null, null, null, 'C++', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('556', 'SD0058', 'Le Thanh', 'Hai', null, null, null, null, 'QC NT', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('557', 'SD0062', 'Pham Thanh', 'Lich', 'Ph_m Thanh L_ch', null, null, null, 'QC NT', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('558', 'SD0063', 'Trinh Minh', 'Hien', 'Tr_nh Minh Hi_n', null, null, null, 'QC NT', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('559', 'SD0132', 'Do Tien', 'Dung', '__ Ti_n D_ng', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('560', 'SD0136', 'Van Quoc ', 'Khanh', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('561', 'SD0065', 'Bui Thanh', 'Huy', null, null, null, null, 'C++', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('562', 'SD0138', 'Pham Minh', 'Tam', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('563', 'SD0066', 'Nguyen Thi Bao', 'Khanh', null, null, null, null, 'QC NT', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('564', 'SD0142', 'Cao Minh', 'Quan', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('565', 'SD0067', 'Nguyen Thi Thu', 'Ngan', null, null, null, null, 'QC NT', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('566', 'SD0144', 'Vu Dinh', 'Phong ', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('567', 'SD0145', 'Nguyen Ngoc Lam', 'Anh', 'Nguy_n Ng_c Lam Anh', null, null, null, 'PHP', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('568', 'SD0068', 'Dang Nguyen Kim', 'Anh', '__ng Nguy_n Kim Anh', null, null, null, 'C++', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('569', 'SD0069', 'Nguyen Khanh', 'Trinh', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('570', 'SD0151', 'Nguyen Thi Thu', 'Hien', 'Nguy_n Th_ Thu Hi_n ', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:44', '2016-12-14 16:16:44', null);
INSERT INTO `employee` VALUES ('571', 'SD0153', 'Nguyen Hue', 'Nghi', 'Nguy_n Hu_ Nghi', null, null, null, 'DBA', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('572', 'SD0071', 'Pham Tan', 'Khoa', 'Ph_m T_n Khoa', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('573', 'SD0323', 'Le Thi My ', 'Linh', null, null, null, null, 'Front-End', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('574', 'SD0324', 'Nguyen Thi Nguyet ', 'Kieu', 'Nguy_n Th_ Nguy_t Ki_u', null, null, null, 'Front-End', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('575', 'SD0328', 'Luong Quy ', 'Quang', 'L__ng Qu_ Quang', null, null, null, 'PHP', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('576', 'SD0158', 'Huynh Chi ', 'Nhan', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('577', 'SD0162', 'Vo Minh', 'Trong', null, null, null, null, 'PHP', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('578', 'SD0329', 'Le Thi Kim ', 'Thuy', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('579', 'SD0159', 'Huynh Minh', 'Man', 'Hu_nh Minh M_n', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('580', 'SD0330', 'Le Thi Lan', 'Anh', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('581', 'SD0166', 'Truong Thanh ', 'Hai', 'Tr__ng Thanh H_i', null, null, null, 'Front-End', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('582', 'SD0167', 'Nguyen Chi', 'Thanh', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('583', 'SD0169', 'Huynh Phat', 'Loc', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('584', 'SD0332', 'Tran Quoc', 'Tuan', 'Tr_n Qu_c Tu_n', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('585', 'SD0172', 'Nguyen Hoang', 'Quang', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('586', 'SD0334', 'Nguyen Hoang', 'Oanh', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('587', 'SD0181', 'Nguyen Thi Phuong', 'Thi', 'Nguy_n Th_ Ph__ng Thi', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('588', 'SD0179', 'Tran Hoang', 'Son', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('589', 'SD0176', 'Lam Thanh', 'Bong', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('590', 'SD0178', 'Nguyen Cong', 'Khanh', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('591', 'SD0074', 'Le Binh Duy', 'Tho', null, null, null, null, 'Java', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('592', 'SD0187', 'Nguyen Quang ', 'Phuong', 'Nguy_n Quang Ph__ng', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('593', 'SD0338', 'Nguyen Thi My ', 'Dung', 'Nguy_n Th_ M_ Dung', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('594', 'SD0186', 'Tran Quoc ', 'Cuong', 'Tr_n Qu_c C__ng', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('595', 'SD0188', 'Hong Gia ', 'Cuong', 'H_ng Gia C__ng', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('596', 'SD0339', 'Nguyen Minh ', 'Khoa', 'Nguy_n Minh Khoa', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('597', 'SD0191', 'Tran Thanh', 'Tu', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('598', 'SD0193', 'Nguyen Thi Thu ', 'Hong', 'Nguy_n Th_ Thu H_ng', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('599', 'SD0075', 'Nguyen Tran Quang', 'Hieu', 'Nguy_n Tr_n Quang Hi_u', null, null, null, 'C++', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('600', 'SD0343', 'Le Thanh', 'Hien', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('601', 'SD0344', 'Nguyen Thi Cam', 'Thi', 'Nguy_n Th_ C_m Thi', null, null, null, 'Java', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('602', 'SD0197', 'Dang Ho Dang', 'Khoa', '__ng H_ __ng Khoa', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('603', 'SD0198', 'Lu The ', 'Hung', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('604', 'SD0196', 'Cu Trinh Hoang', 'Chinh', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('605', 'SD0201', 'Le Ngoc Hoang', 'Minh', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('606', 'SD0202', 'Phan Hoang', 'Anh', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('607', 'SD0208', 'Le Thi Que', 'Lam', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('608', 'SD0346', 'Vu Nguyen Van ', 'Khanh', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('609', 'SD0345', 'Lam Thi', 'Hao', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('610', 'SD0205', 'Vu Thai ', 'Anh', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('611', 'SD0204', 'Vo Thanh', 'Phong ', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('612', 'SD0209', 'Tran Hoang', 'Trung', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('613', 'SD0349', 'Nguyen Hoang', 'Doanh', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('614', 'SD0076', 'Pham Thanh', 'Vinh', null, null, null, null, 'QC NT', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('615', 'SD0352', 'Nguyen Quynh ', 'Mai', 'Nguy_n Qu_nh Mai', null, null, null, 'Front-End', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('616', 'SD0214', 'Tran Nhu ', 'Phuong', 'Tr_n Nh_ Ph__ng', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('617', 'SD0215', 'Le Thi Bich', 'Lieu', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('618', 'SD0216', 'Ngo Anh', 'Tuan', null, null, null, null, 'Java', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('619', 'SD0217', 'Nguyen Xuan Bao', 'Khanh', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('620', 'SD0354', 'Nguyen Phuong Hong ', 'Chau', null, null, null, null, 'Java', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('621', 'SD0220', 'Bui Huu ', 'Tuu', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('622', 'SD0385', 'Nguyen Hoang', 'Vinh', null, null, null, null, 'Java', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('623', 'SD0379', 'Tran Bao', 'Toan', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('624', 'SD0395', 'Tran Huu', 'Tai', null, null, null, null, 'Java', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('625', 'SD0375', 'Hoang Mai', 'Phuong', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('626', 'SD0409', 'Phan Quang ', 'Nhan', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('627', 'SD0374', 'Vu Hong', 'Nam', 'V_ H_ng Nam', null, null, null, 'Java', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('628', 'SD0401', 'Nguyen Thi', 'Loan', 'Nguy_n Th_ Loan', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('629', 'SD0389', 'Nguyen Thi Phuong', 'Lien', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('630', 'SD0380', 'Tran The', 'Hien', 'Tr_n Th_ Hi_n', null, null, null, 'DBA', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('631', 'SD0399', 'Duong Thi', 'Chinh', null, null, null, null, 'Java', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('632', 'SD0222', 'Nguyen Van', 'Bao', 'Nguy_n V_n B_o', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('633', 'SD0227', 'Nguyen Ngoc', 'Thien', 'Nguy_n Ng_c Thi_n', null, null, null, 'UI', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('634', 'SD0231', 'Pham Nguyen Hong ', 'Thanh', 'Ph_m Nguy_n H_ng Thanh', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('635', 'SD0233', 'Tran Thi Ngoc', 'Ha', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('636', 'SD0358', 'Do Minh ', 'Dung', '__ Minh D_ng', null, null, null, 'Front-End', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('637', 'SD0360', 'Nguyen Dinh', 'Van', null, null, null, null, 'Front-End', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('638', 'SD0359', 'Nguyen Minh ', 'Tuan', 'Nguy_n Minh Tu_n', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('639', 'SD0234', 'Tran To', 'Tran ', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('640', 'SD0236', 'Nguyen Thi', 'Ngoc', 'Nguy_n Th_ Ng_c', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('641', 'SD0237', 'Vu Minh Khanh', 'Loc', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('642', 'SD0242', 'Trinh Le Hoang Duy', 'Tan', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('643', 'SD0241', 'Doan Nam', 'Hai', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('644', 'SD0079', 'Pham Quang ', 'Vinh', 'Ph_m Quang Vinh', null, null, null, 'C++', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('645', 'SD0362', 'Nguyen Anh', 'Khoa', 'Nguy_n Anh Khoa', null, null, null, 'DBA', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('646', 'SD0244', 'Le Tan', 'Nghia', null, null, null, null, 'Front-End', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('647', 'SD0246', 'Nguyen Van', 'Hieu 1', 'Nguy_n V_n Hi_u 1', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('648', 'SD0080', 'Le Minh', 'Viet', null, null, null, null, 'C++', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('649', 'SD0247', 'Huynh Quang', 'Dieu', 'Hu_nh Quang Di_u', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('650', 'SD0249', 'Tran Tho', 'Cuong', 'Tr_n Th_ C__ng', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('651', 'SD0250', 'Vo Quang ', 'Truong', null, null, null, null, 'PHP', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('652', 'SD0364', 'Dinh Duy', 'Linh', '_inh Duy Linh', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('653', 'SD0256', 'Pham Thi My', 'Kieu', 'Ph_m Th_ M_ Ki_u', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('654', 'SD0251', 'Nguyen Anh', 'Dao', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('655', 'SD0365', 'Huynh Thi Ngoc', 'Tuyet', 'Hu_nh Th_ Ng_c Tuy_t', null, null, null, 'DBA', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('656', 'SD0258', 'Tran Thi Thanh', 'Suong', 'Tr_n Th_ Thanh S__ng', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('657', 'SD0257', 'La Ngoc ', 'Hoa', null, null, null, null, 'PHP', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('658', 'SD0366', 'Vo Ngoc', 'Phuong', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('659', 'SD0263', 'Nguyen Hai', 'Son', 'Nguy_n H_i S_n', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('660', 'SD0262', 'Hoang Van', 'Nam', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('661', 'SD0083', 'Pham Tuan ', 'Anh 2', 'Ph_m Tu_n Anh', null, null, null, 'C++', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('662', 'SD0084', 'Nguyen Thi Ngoc ', 'Tram', null, null, null, null, 'C++', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('663', 'SD0085', 'Nguyen Canh', 'Hat', 'Nguy_n C_nh H_t', null, null, null, 'C++', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('664', 'SD0086', 'Le Thanh', 'Tam 2', null, null, null, null, 'C++', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('665', 'SD0273', 'Pham Thi Tra', 'My', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('666', 'SD0091', 'Le Nguyen Hoai', 'Thu', null, null, null, null, 'C++', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('667', 'SD0093', 'Nguyen Xuan  ', 'Vinh', null, null, null, null, 'C++', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('668', 'SD0281', 'Huynh Duy', 'Quang', 'Hu_nh Duy Quang', null, null, null, 'DBA', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('669', 'SD0097', 'Ton That Nam', 'Tran', null, null, null, null, 'Support Analyst', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('670', 'SD0417', 'Nguyen Thi Cam', 'Nhung', 'Nguy_n Th_ C_m Nhung', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('671', 'SD0429', 'Nguyen Thi Thanh', 'Huyen', 'Nguy_n Th_ Thanh Huy_n', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('672', 'SD0430', 'Nguyen Quang ', 'Phuoc', 'Nguy_n Quang Ph__c', null, null, null, 'PHP', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('673', 'SD0424', 'Nguyen Xuan', 'Duy', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('674', 'SD0440', 'Dang The ', 'Phu', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('675', 'SD0446', 'Nguyen Thanh ', 'Tung', null, null, null, null, 'Java', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('676', 'SD0450', 'Ngo Anh ', 'Duong', null, null, null, null, 'Mobile', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('677', 'SD0457', 'Diep', 'Tu', null, null, null, null, 'PHP', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('678', 'SD0458', 'Dang Anh ', 'Toan', null, null, null, null, 'DBA', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('679', 'SD0472', 'Mohamed Aly ', 'Pasha', 'Mohamed Aly Pasha', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('680', 'SD0471', 'Nguyen Anh', 'Kiet', 'Nguy_n Anh Ki_t -QC', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('681', 'SD0477', 'Doan Van', 'An', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('682', 'SD0479', 'Dam Chi ', 'Thoai', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('683', 'SD0485', 'Nguyen Phuoc', 'Duy', 'Nguy_n Ph__c Duy', null, null, null, 'Front-End', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('684', 'SD0489', 'Tran Tuong', 'Van', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('685', 'SD0490', 'Doan Tien', 'Minh', null, null, null, null, 'QC NT', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('686', 'SD0512', 'Luong Dai Quoc', 'Nam', 'L__ng __i Qu_c Nam', null, null, null, 'Front-End', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('687', 'SD0513', 'Pham Do Duc', 'Anh', 'Ph_m __ __c Anh', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('688', 'SD0516', 'Nguyen Thi Thuy', 'Loan', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('689', 'SD0507', 'Ho Thi Thanh', 'Truc', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('690', 'SD0506', 'Nguyen Thi Minh ', 'Thu', 'Nguy_n Th_ Minh Th_', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('691', 'SD0528', 'Trang Thanh', 'Loc', 'Trang Thanh L_c', null, null, null, 'DBA', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('692', 'SD0501', 'Nguyen Tuan', 'Hai', 'Nguy_n Tu_n H_i', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('693', 'SD0534', 'Le Quang', 'Thieu Update', null, null, null, ',?PHP', null, null, null, null, null, null, null, '1', '3', '1', '1', '6', '2016-12-19 17:47:26', null, '693_cv_file_2016-12-19-05-47-26.docx');
INSERT INTO `employee` VALUES ('694', 'SD0547', 'Pham Thi Tuyet', 'Trinh', 'Ph_m Th_ Tuy_t Trinh', null, null, null, 'Mobile', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('695', 'SD0549', 'Phan Huy', 'Thanh', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('696', 'SD0545', 'Nguyen Tuong', 'Duy', 'Nguy_n T__ng Duy', null, null, null, 'Front-End', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('697', 'SD0562', 'Lam Dao', 'Vinh', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('698', 'SD0564', 'Nguyen Ngoc Phuong', 'Thao', 'Nguy_n Ng_c Ph__ng Th_o', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('699', 'SD0566', 'Nguyen Thanh', 'Son', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('700', 'SD0569', 'Nguyen Minh ', 'Khoa', 'Nguy_n Minh Khoa 2', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('701', 'SD0568', 'Vu Ngoc', 'Hai', 'V_ Ng_c H_i', null, null, null, 'Mobile', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('702', 'SD0565', 'Nguyen Thanh', 'Danh', 'Nguy_n Thanh Danh', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('703', 'SD0578', 'Vo Manh ', 'Tuan', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('704', 'SD0571', 'Nong Thi Anh', 'Thu', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('705', 'SD0572', 'Tai Dai Che', 'Phuong', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('706', 'SD0588', 'Ngo Quang', 'Vu', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('707', 'SD0584', 'Hoang Quoc', 'Viet', null, null, null, null, 'PHP', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('708', 'SD0585', 'Tran Ngoc', 'Thuy', 'Tr_n Ng_c Th_y', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('709', 'SD0586', 'Nguyen Minh ', 'Hoang', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('710', 'SD0576', 'Pham Thi Thuy', 'Huong', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('711', 'SD0583', 'Phan Tan Quang', 'Nam', 'Phan T_n Quang Nam', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('712', 'SD0581', 'Pham Tran Trong', 'Minh', 'Ph_m Tr_n Tr_ng Minh', null, null, null, 'PHP', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('713', 'SD0590', 'Nguyen Van', 'Tung', 'Nguy_n V_n Tung', null, null, null, 'java', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('714', 'SD0596', 'Truong Trong', 'Quan', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('715', 'SD0593', 'Luu Phuong', 'Anh', 'L_u Ph__ng Anh', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('716', 'SD0607', 'Nguyen Thi', 'Thuc', 'Nguy_n Th_ Th_c', null, null, null, 'PHP', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('717', 'SD0608', 'Bui Thien ', 'Tho', null, null, null, null, 'Front-End', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('718', 'SD0610', 'Tran Nhung ', 'Thuy', 'Tr_n Nhung Th_y', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('719', 'SD0616', 'Le Hong ', 'Phong', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('720', 'SD0613', 'Truong Minh An ', 'Hoa', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('721', 'SD0612', 'Vo Thi Truong', 'An', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('722', 'SD0621', 'Tran Thi Kim ', 'Tuyen', 'Tr_n Th_ Kim Tuy_n', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('723', 'SD0620', 'Huynh Tran Quoc ', 'Buu', 'Hu_nh Tr_n Qu_c B_u', null, null, null, 'Java', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('724', 'SD0627', 'Lam Thi Thu ', 'Truc', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('725', 'SD0626', 'Nguyen Hoai ', 'Nam', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('726', 'SD0632', 'Tran Minh', 'Truc', 'Tr_n Minh Tr_c', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('727', 'SD0629', 'Le Trong', 'Tin', null, null, null, null, 'Front-End', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('728', 'SD0637', 'Duong Thanh', 'Tri', 'D__ng Th_nh Tr_', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('729', 'SD0643', 'Tran Thu', 'Thao', 'Tr_n Thu Th_o', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('730', 'SD0641', 'Nguyen Anh ', 'Quoc', 'Nguy_n Anh Qu_c', null, null, null, 'C++', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('731', 'SD0642', 'Vu Thi Tram', 'Anh', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('732', 'SD0670', 'Truong Thi Thuy ', 'Trang', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('733', 'SD0664', 'Nguyen Hong ', 'Linh', 'Nguy_n H_ng Linh', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('734', 'SD0660', 'Cao Thi Hoang', 'Le', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('735', 'SD0668', 'Tran Hai', 'Lam', null, null, null, null, 'Java', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('736', 'SD0667', 'Ta Thi Ngoc ', 'Hang', 'T_ Th_ Ng_c H_ng', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('737', 'SD0669', 'Trinh Khac ', 'Duy', 'Tr_nh Kh_c Duy', null, null, null, 'Mobile', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('738', 'SD0672', 'Nguyen Anh', 'Tuan 1', 'Nguy_n Anh Tu_n 1', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('739', 'SD0675', 'Vo Van ', 'Thien', null, null, null, null, 'Front-End', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('740', 'SD0676', 'Vu Manh ', 'Hung', null, null, null, null, 'Java', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('741', 'SD0673', 'Nguyen Duc ', 'Hanh', 'Nguy_n __c H_nh', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('742', 'SD0677', 'Le Tran Yen ', 'Ngoc', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('743', 'SD0686', 'Truong Cam ', 'Vinh', 'Tr__ng C_m Vinh', null, null, null, 'Java', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('744', 'SD0684', 'Nguyen Van', 'Trong', 'Nguy_n V_n Tr_ng', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('745', 'SD0682', 'Nguyen Thi Hong ', 'Thuan', 'Nguy_n Th_ H_ng Thu_n', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('746', 'SD0679', 'Do Huu ', 'Quang', '__ H_u Quang', null, null, null, 'PHP', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('747', 'SD0683', 'Nguyen Thuy Kim ', 'Ngan', null, null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('748', 'SD0689', 'Do Nguyen Nguyet', 'Ngan', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('749', 'SD0680', 'Le Huynh Quang', 'Khanh', null, null, null, null, 'QC NT', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('750', 'SD0685', 'Tran Nam ', 'Khang', 'Tr_n Nam Khang', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('751', 'SD0687', 'Vo Van ', 'Dung', null, null, null, null, 'PHP', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('752', 'SD0681', 'Dao Duy ', 'Vu', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('753', 'SD0656', 'Tran Minh ', 'Tuan', 'Tr_n Minh Tu_n', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('754', 'SD0690', 'Ly Thuy Phuong', 'Thao', 'L_ Th_y Ph__ng Th_o', null, null, null, 'UI', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('755', 'SD0655', 'Hua Thai ', 'Phong', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('756', 'SD0694', 'Nguyen Trung', 'Nguyen', null, null, null, null, 'Mobile', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('757', 'SD0634', 'Bui Duy', 'Hoa', null, null, null, null, 'Mobile', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('758', 'SD0692', 'Nguyen Anh', 'Duy', 'Nguy_n Anh Duy', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('759', 'SD0702', 'Nguyen Anh', 'Tuan 2', 'Nguy_n Anh Tu_n 2', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('760', 'SD0718', 'Nguyen Hoang', 'Quan', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('761', 'SD0714', 'Huynh Tan ', 'Loc', 'Hu_nh T_n L_c', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('762', 'SD0715', 'Luu Xuan', 'Huy', null, null, null, null, 'Mobile', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('763', 'SD0719', 'Nguyen Le Hoang', 'An', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('764', 'SD0727', 'Do Thanh ', 'Trung', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('765', 'SD0732', 'Nguyen Le Quang', 'Hung', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('766', 'SD0730', 'Tran Quoc', 'Dung', 'Tr_n Qu_c D_ng', null, null, null, 'Mobile', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('767', 'SD0733', 'Dang Ngoc ', 'Binh', null, null, null, null, 'Mobile', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('768', 'SD0737', 'Vu Thanh', 'Lam', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('769', 'SD0739', 'Dinh Nguyen Minh ', 'Duc', '_inh Nguy_n Minh __c', null, null, null, 'Mobile', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('770', 'SD0752', 'Nguyen Thi Thu', 'Bong', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('771', 'SD0753', 'Pham Tran ', 'Tien', 'Ph_m Tr_n Ti_n', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('772', 'SD0755', 'Truong Minh Anh', 'Tuan', 'Tr__ng Minh Anh Tu_n', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('773', 'SD0756', 'Tran Quoc', 'Viet', 'Tr_n Qu_c Vi_t', null, null, null, 'PHP', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('774', 'SD0757', 'Luu Truong', 'Thanh', null, null, null, null, 'PHP', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('775', 'SD0760', 'Le Xuan ', 'Tac', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', null);
INSERT INTO `employee` VALUES ('776', 'SD0761', 'Nguyen Thien', 'Anh', null, null, null, null, 'Microsoft', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-14 16:16:45', '2016-12-14 16:16:45', 'cv_update_2_01_2014.doc');
INSERT INTO `employee` VALUES ('777', 'SD0762', 'Diep Lan', 'Quynh', 'Di_p Lan Qu_nh', null, null, null, 'QC', null, null, null, null, null, null, null, '1', null, '1', '1', '2016-12-20 04:05:18', '2016-12-14 16:16:45', '777_cv_file_2016-12-20-04-05-18.docx');

-- ----------------------------
-- Table structure for employee_exp
-- ----------------------------
DROP TABLE IF EXISTS `employee_exp`;
CREATE TABLE `employee_exp` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of employee_exp
-- ----------------------------
INSERT INTO `employee_exp` VALUES ('1', 'PHP', 'lang', null, null);
INSERT INTO `employee_exp` VALUES ('2', 'RUBY', 'lang', null, null);
INSERT INTO `employee_exp` VALUES ('3', 'ZEND framework', 'fw', null, null);
INSERT INTO `employee_exp` VALUES ('4', 'design parttern ', 'other', null, null);

-- ----------------------------
-- Table structure for employee_exp_matrix
-- ----------------------------
DROP TABLE IF EXISTS `employee_exp_matrix`;
CREATE TABLE `employee_exp_matrix` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `exp_id` int(11) NOT NULL,
  `level` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `note` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employee_exp_matrix
-- ----------------------------
INSERT INTO `employee_exp_matrix` VALUES ('8', '777', '3', '3', '2', null, '2016-12-20 06:01:34', '2016-12-20 06:01:34');

-- ----------------------------
-- Table structure for employee_position
-- ----------------------------
DROP TABLE IF EXISTS `employee_position`;
CREATE TABLE `employee_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employee_position
-- ----------------------------
INSERT INTO `employee_position` VALUES ('1', 'SE', 'Software Engineer', null, null, null);
INSERT INTO `employee_position` VALUES ('2', 'SSE', 'Senior Software Engineer', null, null, null);
INSERT INTO `employee_position` VALUES ('3', 'ACCOUNTAND', 'Accountant', null, null, null);
INSERT INTO `employee_position` VALUES ('4', 'CEO', 'Chief Executive Officer (CEO)', null, null, null);
INSERT INTO `employee_position` VALUES ('5', 'JTA', 'Junior Technical Author', null, null, null);
INSERT INTO `employee_position` VALUES ('6', 'SA', 'Sales Assistant', null, null, null);
INSERT INTO `employee_position` VALUES ('8', null, null, null, '2016-12-17 08:55:27', '2016-12-17 08:55:27');

-- ----------------------------
-- Table structure for employee_role
-- ----------------------------
DROP TABLE IF EXISTS `employee_role`;
CREATE TABLE `employee_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employee_role
-- ----------------------------
INSERT INTO `employee_role` VALUES ('1', 'JSE', 'Junior Software Engineer', null, null);
INSERT INTO `employee_role` VALUES ('2', 'SE', 'Software Engineer', null, null);
INSERT INTO `employee_role` VALUES ('3', 'SSE', 'Senior Software Engineer', null, null);
INSERT INTO `employee_role` VALUES ('4', 'PSE', 'Principle Software Engineer', null, null);
INSERT INTO `employee_role` VALUES ('5', null, null, '2016-12-17 08:55:27', '2016-12-17 08:55:27');
INSERT INTO `employee_role` VALUES ('6', null, '2016-12-14 16:16:45', '2016-12-17 14:19:24', '2016-12-17 14:19:24');

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
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of office
-- ----------------------------
INSERT INTO `office` VALUES ('1', 'HCM', 'Ho Chi Minh', '9 Dinh Tien Hoang, Quan 1, Ho Chi Minh', null, null, '0', null, null);
INSERT INTO `office` VALUES ('2', null, '2016-12-14 16:16:45', null, null, null, '0', '2016-12-17 08:55:27', '2016-12-17 08:55:27');
INSERT INTO `office` VALUES ('3', null, null, null, null, null, '0', '2016-12-17 14:19:24', '2016-12-17 14:19:24');

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
INSERT INTO `order` VALUES ('73', 'BO15091600001', null, '16/09/2015', 'HCM123', '12/12/2015', 'Etown, C?ng Hòa', '0986684184', '16990000', '16990000', '0', 'DEBT', '0', '', 'O', null, '2015-09-18 08:54:19', null, null, null);
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
INSERT INTO `order_item` VALUES ('86', '63', 'BO15091481892', 'EF71', 'BQEF71__PI', 'Sony Xperia M4 Aqua Dual (Tr?ng)', 'BQEF71__PI', '6000000', '6000000', 'N', '0', '10', null, null);
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` text,
  `created_at` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL COMMENT 'Nam of Icon',
  `status` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project
-- ----------------------------
INSERT INTO `project` VALUES ('1', 'Aussie toolbox', 'This is description', '2016-12-22 10:13:04', '24', null, null, null);
INSERT INTO `project` VALUES ('2', 'Plan-B', null, '2016-12-22 13:46:29', '24', null, null, null);

-- ----------------------------
-- Table structure for project_booking
-- ----------------------------
DROP TABLE IF EXISTS `project_booking`;
CREATE TABLE `project_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `take_part_per` int(11) DEFAULT NULL,
  `project_role_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `spent_hour` float DEFAULT NULL,
  `request_type` enum('Chargeable','Non-chargeable') DEFAULT NULL,
  `book_type` enum('Official','Reserve') DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `note` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_booking
-- ----------------------------
INSERT INTO `project_booking` VALUES ('1', '777', '1', '100', '1', '2016-12-23', '2017-02-03', '140', 'Chargeable', 'Official', '24', null, null, null);
INSERT INTO `project_booking` VALUES ('2', '776', '1', '100', '2', '2016-12-23', '2017-02-03', '140', 'Chargeable', 'Official', '24', null, null, null);

-- ----------------------------
-- Table structure for project_role
-- ----------------------------
DROP TABLE IF EXISTS `project_role`;
CREATE TABLE `project_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_role
-- ----------------------------
INSERT INTO `project_role` VALUES ('1', 'Product Owner', 'PO', '1', null, null, null);
INSERT INTO `project_role` VALUES ('2', 'Project Manager', 'PM', '2', null, null, null);
INSERT INTO `project_role` VALUES ('3', 'Technical Lead', 'TL', '3', null, null, null);
INSERT INTO `project_role` VALUES ('4', 'Developer', 'DEV', '4', null, null, null);
INSERT INTO `project_role` VALUES ('5', 'Quality Control (Engineer)', 'QC', '5', null, null, null);
INSERT INTO `project_role` VALUES ('6', 'Designer', 'DES', '6', null, null, null);
INSERT INTO `project_role` VALUES ('7', 'Quality Assurance (Engineer)', 'QA', '7', null, null, null);

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
INSERT INTO `users` VALUES ('24', 'Thieu Le Quang', 'quangthieuagu@gmail.com', '25d55ad283aa400af464c76d713c07ad', '266', '??i Lý bán s? IPAD', 'HCM1985', 'HCM123', 'admin', '1', '1', '10', '64eabde55be6fc85d8d930e959d2e9be', '2015-09-17 07:51:00', '2015-09-18 07:19:00');

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
INSERT INTO `user_groups` VALUES ('5', 'Qu?n lý ??i lý', 'HCM123');
INSERT INTO `user_groups` VALUES ('7', 'Qu?n lý ??n hàng', 'HCM123');
INSERT INTO `user_groups` VALUES ('8', 'Tài kho?n thành viên', 'HCM123');
INSERT INTO `user_groups` VALUES ('10', 'Qu?n lý kho', 'HCM1985');
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
