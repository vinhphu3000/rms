/*
Navicat MySQL Data Transfer

Source Server         : rms
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : rms

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-12-16 18:06:27
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=311 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employee
-- ----------------------------
INSERT INTO `employee` VALUES ('1', 'SD0104', 'Ngo Gia Bao', 'Oai', 'Ngô Gia Bảo Oai', null, null, null, 'VB', null, null, null, null, null, null, null, '2', null, '19', '5', '2016-12-15 10:30:18', '2016-12-15 10:30:18');
INSERT INTO `employee` VALUES ('2', 'SD0108', 'Nguyen Thi Thanh ', 'Ha', 'Nguyễn Thị Thanh Hà', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:18', '2016-12-15 10:30:18');
INSERT INTO `employee` VALUES ('3', 'SD0110', 'Doan Thi Ngoc', 'Hoa', 'Đoàn Thị Ngọc Hoa', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '17', '5', '2016-12-15 10:30:18', '2016-12-15 10:30:18');
INSERT INTO `employee` VALUES ('4', 'SD0309', 'Cao Thanh', 'Tuan', 'Cao Thanh Tuấn', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '19', '5', '2016-12-15 10:30:18', '2016-12-15 10:30:18');
INSERT INTO `employee` VALUES ('5', 'SD0114', 'Mai Hoang', 'Thang', 'Mai Hoàng Thắng', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:18', '2016-12-15 10:30:18');
INSERT INTO `employee` VALUES ('6', 'SD0116', 'To Gia', 'Phuong', 'Tô Gia Phượng', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:18', '2016-12-15 10:30:18');
INSERT INTO `employee` VALUES ('7', 'SD0115', 'Luong Thi Kim', 'Hanh', 'Lương Thị Kim Hạnh', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('8', 'SD0118', 'Do Thi Thu', 'Huong', 'Đỗ Thị Thu Hương', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('9', 'SD0122', 'Dang Minh', 'Hai', 'Đặng Minh Hải', null, null, null, 'VB', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('10', 'SD0123', 'Phan Thi ', 'Dieu', 'Phan Thị Diệu', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('11', 'SD0124', 'Nguyen Thi Minh', 'Khan', 'Nguyễn Thị Minh Khẩn', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('12', 'SD0127', 'Pham Thi Ngoc ', 'Thuy', 'Phạm Thị Ngọc Thúy', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('13', 'SD0315', 'Phan Thi Yen', 'Nhu', 'Phan Thị Yến Như', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('14', 'SD0038', 'Ngo Thi Hoang', 'Lan', 'Ngô Thị Hoàng Lan', null, null, null, 'QC NT', null, null, null, null, null, null, null, '2', null, '17', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('15', 'SD0037', 'Dinh Le', 'Duc', 'Đinh Lê Đức', null, null, null, 'C++', null, null, null, null, null, null, null, '2', null, '16', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('16', 'SD0041', 'Nguyen Quoc', 'Huy', 'Nguyễn Quốc Huy', null, null, null, 'C++', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('17', 'SD0042', 'Nguyen Dinh', 'Thanh', 'Nguyễn Đình Thanh', null, null, null, 'QC NT', null, null, null, null, null, null, null, '2', null, '17', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('18', 'SD0043', 'Nguyen Phuoc', 'An', 'Nguyễn Phước Ân', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '17', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('19', 'SD0045', 'Doan Xuan', 'Cuong', 'Đoàn Xuân Cường', null, null, null, 'C++', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('20', 'SD0047', 'Huynh Tan', 'Hien', 'Huỳnh Tấn Hiển', null, null, null, 'C++', null, null, null, null, null, null, null, '2', null, '19', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('21', 'SD0049', 'Nguyen Thi Phi', 'Yen', 'Nguyễn Thị Phi Yến', null, null, null, 'C++', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('22', 'SD0050', 'Pham Thi', 'Lanh', 'Phạm Thị Lánh', null, null, null, 'C++', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('23', 'SD0051', 'Nguyen The', 'Vu', 'Nguyễn Thế Vũ', null, null, null, 'Mobile', null, null, null, null, null, null, null, '2', null, '19', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('24', 'SD0052', 'Le Hoang Vinh', 'Phuc', 'Lê Hoàng Vĩnh Phúc', null, null, null, 'QC NT', null, null, null, null, null, null, null, '2', null, '17', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('25', 'SD0053', 'Nguyen Dinh', 'Chinh', 'Nguyễn Đình Chinh', null, null, null, 'QC NT', null, null, null, null, null, null, null, '2', null, '17', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('26', 'SD0054', 'Le Kim', 'Ngoc', 'Lê Kim Ngọc', null, null, null, 'C++', null, null, null, null, null, null, null, '2', null, '16', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('27', 'SD0056', 'Nguyen Ba', 'Tinh', 'Nguyễn Bá Tình', null, null, null, 'QC NT', null, null, null, null, null, null, null, '2', null, '17', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('28', 'SD0060', 'Le Van', 'Khanh', 'Lê Văn Khánh', null, null, null, 'C++', null, null, null, null, null, null, null, '2', null, '19', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('29', 'SD0058', 'Le Thanh', 'Hai', 'Lê Thanh Hải', null, null, null, 'QC NT', null, null, null, null, null, null, null, '2', null, '17', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('30', 'SD0062', 'Pham Thanh', 'Lich', 'Phạm Thanh Lịch', null, null, null, 'QC NT', null, null, null, null, null, null, null, '2', null, '17', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('31', 'SD0063', 'Trinh Minh', 'Hien', 'Trịnh Minh Hiển', null, null, null, 'QC NT', null, null, null, null, null, null, null, '2', null, '17', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('32', 'SD0132', 'Do Tien', 'Dung', 'Đỗ Tiến Dũng', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('33', 'SD0136', 'Van Quoc ', 'Khanh', 'Văn Quốc Khánh', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('34', 'SD0065', 'Bui Thanh', 'Huy', 'Bùi Thanh Huy', null, null, null, 'C++', null, null, null, null, null, null, null, '2', null, '19', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('35', 'SD0138', 'Pham Minh', 'Tam', 'Phạm Minh Tâm', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('36', 'SD0066', 'Nguyen Thi Bao', 'Khanh', 'Nguyễn Thị Bảo Khánh', null, null, null, 'QC NT', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('37', 'SD0142', 'Cao Minh', 'Quan', 'Cao Minh Quân', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee` VALUES ('38', 'SD0067', 'Nguyen Thi Thu', 'Ngan', 'Nguyễn Thị Thu Ngân', null, null, null, 'QC NT', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('39', 'SD0144', 'Vu Dinh', 'Phong ', 'Vũ Đình Phong', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('40', 'SD0145', 'Nguyen Ngoc Lam', 'Anh', 'Nguyễn Ngọc Lam Anh', null, null, null, 'PHP', null, null, null, null, null, null, null, '2', null, '19', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('41', 'SD0068', 'Dang Nguyen Kim', 'Anh', 'Đặng Nguyễn Kim Anh', null, null, null, 'C++', null, null, null, null, null, null, null, '2', null, '16', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('42', 'SD0069', 'Nguyen Khanh', 'Trinh', 'Nguyễn Khánh Trình', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('43', 'SD0151', 'Nguyen Thi Thu', 'Hien', 'Nguyễn Thị Thu Hiền ', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('44', 'SD0153', 'Nguyen Hue', 'Nghi', 'Nguyễn Huệ Nghi', null, null, null, 'DBA', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('45', 'SD0071', 'Pham Tan', 'Khoa', 'Phạm Tấn Khoa', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('46', 'SD0323', 'Le Thi My ', 'Linh', 'Lê Thị Mỹ Linh', null, null, null, 'Front-End', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('47', 'SD0324', 'Nguyen Thi Nguyet ', 'Kieu', 'Nguyễn Thị Nguyệt Kiểu', null, null, null, 'Front-End', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('48', 'SD0328', 'Luong Quy ', 'Quang', 'Lương Quý Quang', null, null, null, 'PHP', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('49', 'SD0158', 'Huynh Chi ', 'Nhan', 'Huỳnh Chí Nhân', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('50', 'SD0162', 'Vo Minh', 'Trong', 'Võ Minh Trọng', null, null, null, 'PHP', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('51', 'SD0329', 'Le Thi Kim ', 'Thuy', 'Lê Thị Kim Thúy', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('52', 'SD0159', 'Huynh Minh', 'Man', 'Huỳnh Minh Mẫn', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('53', 'SD0330', 'Le Thi Lan', 'Anh', 'Lê Thị Lan Anh', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('54', 'SD0166', 'Truong Thanh ', 'Hai', 'Trương Thanh Hải', null, null, null, 'Front-End', null, null, null, null, null, null, null, '2', null, '19', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('55', 'SD0167', 'Nguyen Chi', 'Thanh', 'Nguyễn Chí Thành', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('56', 'SD0169', 'Huynh Phat', 'Loc', 'Huỳnh Phát Lộc', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('57', 'SD0332', 'Tran Quoc', 'Tuan', 'Trần Quốc Tuấn', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('58', 'SD0172', 'Nguyen Hoang', 'Quang', 'Nguyễn Hoàng Quang', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '19', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('59', 'SD0334', 'Nguyen Hoang', 'Oanh', 'Nguyễn Hoàng Oanh', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('60', 'SD0181', 'Nguyen Thi Phuong', 'Thi', 'Nguyễn Thị Phương Thi', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('61', 'SD0179', 'Tran Hoang', 'Son', 'Trần Hoàng Sơn', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('62', 'SD0176', 'Lam Thanh', 'Bong', 'Lâm Thành Bổng', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('63', 'SD0178', 'Nguyen Cong', 'Khanh', 'Nguyễn Công Khanh', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('64', 'SD0074', 'Le Binh Duy', 'Tho', 'Lê Bình Duy Thọ', null, null, null, 'Java', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('65', 'SD0187', 'Nguyen Quang ', 'Phuong', 'Nguyễn Quang Phương', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('66', 'SD0338', 'Nguyen Thi My ', 'Dung', 'Nguyễn Thị Mỹ Dung', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('67', 'SD0186', 'Tran Quoc ', 'Cuong', 'Trần Quốc Cường', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('68', 'SD0188', 'Hong Gia ', 'Cuong', 'Hồng Gia Cương', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('69', 'SD0339', 'Nguyen Minh ', 'Khoa', 'Nguyễn Minh Khoa', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('70', 'SD0191', 'Tran Thanh', 'Tu', 'Trần Thanh Tú', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('71', 'SD0193', 'Nguyen Thi Thu ', 'Hong', 'Nguyễn Thị Thu Hồng', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('72', 'SD0075', 'Nguyen Tran Quang', 'Hieu', 'Nguyễn Trần Quang Hiếu', null, null, null, 'C++', null, null, null, null, null, null, null, '2', null, '19', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('73', 'SD0343', 'Le Thanh', 'Hien', 'Lê Thanh Hiền', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('74', 'SD0344', 'Nguyen Thi Cam', 'Thi', 'Nguyễn Thị Cẩm Thi', null, null, null, 'Java', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('75', 'SD0197', 'Dang Ho Dang', 'Khoa', 'Đặng Hồ Đăng Khoa', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('76', 'SD0198', 'Lu The ', 'Hung', 'Lư Thế Hùng', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('77', 'SD0196', 'Cu Trinh Hoang', 'Chinh', 'Cù Trinh Hoàng Chinh', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee` VALUES ('78', 'SD0201', 'Le Ngoc Hoang', 'Minh', 'Lê Ngọc Hoàng Minh', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('79', 'SD0202', 'Phan Hoang', 'Anh', 'Phan Hoàng Anh', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('80', 'SD0208', 'Le Thi Que', 'Lam', 'Lê Thị Quế Lâm', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('81', 'SD0346', 'Vu Nguyen Van ', 'Khanh', 'Vũ Nguyễn Vân Khanh', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('82', 'SD0345', 'Lam Thi', 'Hao', 'Lâm Thi Hào', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('83', 'SD0205', 'Vu Thai ', 'Anh', 'Vũ Thái Anh', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('84', 'SD0204', 'Vo Thanh', 'Phong ', 'Võ Thanh Phong', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('85', 'SD0209', 'Tran Hoang', 'Trung', 'Trần Hoàng Trung', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('86', 'SD0349', 'Nguyen Hoang', 'Doanh', 'Nguyễn Hoàng Doanh', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('87', 'SD0076', 'Pham Thanh', 'Vinh', 'Phạm Thành Vinh', null, null, null, 'QC NT', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('88', 'SD0352', 'Nguyen Quynh ', 'Mai', 'Nguyễn Quỳnh Mai', null, null, null, 'Front-End', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('89', 'SD0214', 'Tran Nhu ', 'Phuong', 'Trần Như Phượng', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('90', 'SD0215', 'Le Thi Bich', 'Lieu', 'Lê Thị Bích Liễu', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('91', 'SD0216', 'Ngo Anh', 'Tuan', 'Ngô Anh Tuấn', null, null, null, 'Java', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('92', 'SD0217', 'Nguyen Xuan Bao', 'Khanh', 'Nguyễn Xuân Bảo Khánh', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '17', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('93', 'SD0354', 'Nguyen Phuong Hong ', 'Chau', 'Nguyễn Phương Hồng Châu', null, null, null, 'Java', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('94', 'SD0220', 'Bui Huu ', 'Tuu', 'Bùi Hữu Tựu', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('95', 'SD0385', 'Nguyen Hoang', 'Vinh', 'Nguyễn Hoàng Vĩnh', null, null, null, 'Java', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('96', 'SD0379', 'Tran Bao', 'Toan', 'Trần Bảo Toàn', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('97', 'SD0395', 'Tran Huu', 'Tai', 'Trần Hữu Tài', null, null, null, 'Java', null, null, null, null, null, null, null, '2', null, '19', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('98', 'SD0375', 'Hoang Mai', 'Phuong', 'Hoàng Mai Phương', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '17', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('99', 'SD0409', 'Phan Quang ', 'Nhan', 'Phan Quang Nhân', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('100', 'SD0374', 'Vu Hong', 'Nam', 'Vũ Hồng Nam', null, null, null, 'Java', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('101', 'SD0401', 'Nguyen Thi', 'Loan', 'Nguyễn Thị Loan', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('102', 'SD0389', 'Nguyen Thi Phuong', 'Lien', 'Nguyễn Thị Phương Liên', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('103', 'SD0380', 'Tran The', 'Hien', 'Trần Thế Hiển', null, null, null, 'DBA', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('104', 'SD0399', 'Duong Thi', 'Chinh', 'Dương Thị Chính', null, null, null, 'Java', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('105', 'SD0222', 'Nguyen Van', 'Bao', 'Nguyễn Văn Bảo', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('106', 'SD0227', 'Nguyen Ngoc', 'Thien', 'Nguyễn Ngọc Thiện', null, null, null, 'UI', null, null, null, null, null, null, null, '2', null, '24', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('107', 'SD0231', 'Pham Nguyen Hong ', 'Thanh', 'Phạm Nguyễn Hồng Thanh', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('108', 'SD0233', 'Tran Thi Ngoc', 'Ha', 'Trần Thị Ngọc Hà', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('109', 'SD0358', 'Do Minh ', 'Dung', 'Đỗ Minh Dũng', null, null, null, 'Front-End', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('110', 'SD0360', 'Nguyen Dinh', 'Van', 'Nguyễn Đình Văn', null, null, null, 'Front-End', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('111', 'SD0359', 'Nguyen Minh ', 'Tuan', 'Nguyễn Minh Tuấn', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('112', 'SD0234', 'Tran To', 'Tran ', 'Trần Tố Trân', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('113', 'SD0236', 'Nguyen Thi', 'Ngoc', 'Nguyễn Thị Ngọc', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('114', 'SD0237', 'Vu Minh Khanh', 'Loc', 'Vũ Minh Khánh Lộc', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('115', 'SD0242', 'Trinh Le Hoang Duy', 'Tan', 'Trịnh Lê Hoàng Duy Tân', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('116', 'SD0241', 'Doan Nam', 'Hai', 'Đoàn Nam Hải', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('117', 'SD0079', 'Pham Quang ', 'Vinh', 'Phạm Quang Vinh', null, null, null, 'C++', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('118', 'SD0362', 'Nguyen Anh', 'Khoa', 'Nguyễn Anh Khoa', null, null, null, 'DBA', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee` VALUES ('119', 'SD0244', 'Le Tan', 'Nghia', 'Lê Tấn Nghĩa', null, null, null, 'Front-End', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('120', 'SD0246', 'Nguyen Van', 'Hieu 1', 'Nguyễn Văn Hiếu 1', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('121', 'SD0080', 'Le Minh', 'Viet', 'Lê Minh Việt', null, null, null, 'C++', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('122', 'SD0247', 'Huynh Quang', 'Dieu', 'Huỳnh Quang Diệu', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('123', 'SD0249', 'Tran Tho', 'Cuong', 'Trần Thọ Cường', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('124', 'SD0250', 'Vo Quang ', 'Truong', 'Võ Quang Trường', null, null, null, 'PHP', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('125', 'SD0364', 'Dinh Duy', 'Linh', 'Đinh Duy Linh', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('126', 'SD0256', 'Pham Thi My', 'Kieu', 'Phạm Thị Mỹ Kiều', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('127', 'SD0251', 'Nguyen Anh', 'Dao', 'Nguyễn Anh Đào', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('128', 'SD0365', 'Huynh Thi Ngoc', 'Tuyet', 'Huỳnh Thị Ngọc Tuyết', null, null, null, 'DBA', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('129', 'SD0258', 'Tran Thi Thanh', 'Suong', 'Trần Thị Thanh Sương', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('130', 'SD0257', 'La Ngoc ', 'Hoa', 'Lã Ngọc Hòa', null, null, null, 'PHP', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('131', 'SD0366', 'Vo Ngoc', 'Phuong', 'Võ Ngọc Phượng', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('132', 'SD0263', 'Nguyen Hai', 'Son', 'Nguyễn Hải Sơn', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('133', 'SD0262', 'Hoang Van', 'Nam', 'Hoàng Văn Nam', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('134', 'SD0083', 'Pham Tuan ', 'Anh 2', 'Phạm Tuấn Anh', null, null, null, 'C++', null, null, null, null, null, null, null, '2', null, '19', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('135', 'SD0084', 'Nguyen Thi Ngoc ', 'Tram', 'Nguyễn Thị Ngọc Trâm', null, null, null, 'C++', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('136', 'SD0085', 'Nguyen Canh', 'Hat', 'Nguyễn Cảnh Hạt', null, null, null, 'C++', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('137', 'SD0086', 'Le Thanh', 'Tam 2', 'Lê Thanh Tâm-SD0086', null, null, null, 'C++', null, null, null, null, null, null, null, '2', null, '19', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('138', 'SD0273', 'Pham Thi Tra', 'My', 'Phạm Thị Trà My', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('139', 'SD0091', 'Le Nguyen Hoai', 'Thu', 'Lê Nguyễn Hoài Thu', null, null, null, 'C++', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('140', 'SD0093', 'Nguyen Xuan  ', 'Vinh', 'Nguyễn Xuân Vinh', null, null, null, 'C++', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('141', 'SD0281', 'Huynh Duy', 'Quang', 'Huỳnh Duy Quang', null, null, null, 'DBA', null, null, null, null, null, null, null, '2', null, '19', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('142', 'SD0097', 'Ton That Nam', 'Tran', 'Tôn Thất Nam Trân', null, null, null, 'Support Analyst', null, null, null, null, null, null, null, '2', null, '21', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('143', 'SD0417', 'Nguyen Thi Cam', 'Nhung', 'Nguyễn Thị Cẩm Nhung', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('144', 'SD0429', 'Nguyen Thi Thanh', 'Huyen', 'Nguyễn Thị Thanh Huyền', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('145', 'SD0430', 'Nguyen Quang ', 'Phuoc', 'Nguyễn Quang Phước', null, null, null, 'PHP', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('146', 'SD0424', 'Nguyen Xuan', 'Duy', 'Nguyễn Xuân Duy', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('147', 'SD0440', 'Dang The ', 'Phu', 'Đặng Thế Phú', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('148', 'SD0446', 'Nguyen Thanh ', 'Tung', 'Nguyễn Thanh Tùng', null, null, null, 'Java', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('149', 'SD0450', 'Ngo Anh ', 'Duong', 'Ngô Ánh Dương', null, null, null, 'Mobile', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('150', 'SD0457', 'Diep', 'Tu', 'Diệp Tú', null, null, null, 'PHP', null, null, null, null, null, null, null, '2', null, '19', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('151', 'SD0458', 'Dang Anh ', 'Toan', 'Đặng Anh Toàn', null, null, null, 'DBA', null, null, null, null, null, null, null, '2', null, '19', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('152', 'SD0472', 'Mohamed Aly ', 'Pasha', 'Mohamed Aly Pasha', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('153', 'SD0471', 'Nguyen Anh', 'Kiet', 'Nguyễn Anh Kiệt -QC', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('154', 'SD0477', 'Doan Van', 'An', 'Đoàn Vân An', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('155', 'SD0479', 'Dam Chi ', 'Thoai', 'Đàm Chí Thoại', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('156', 'SD0485', 'Nguyen Phuoc', 'Duy', 'Nguyễn Phước Duy', null, null, null, 'Front-End', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('157', 'SD0489', 'Tran Tuong', 'Van', 'Trần Tường Vân', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('158', 'SD0490', 'Doan Tien', 'Minh', 'Đoàn Tiến Minh', null, null, null, 'QC NT', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('159', 'SD0512', 'Luong Dai Quoc', 'Nam', 'Lương Đại Quốc Nam', null, null, null, 'Front-End', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('160', 'SD0513', 'Pham Do Duc', 'Anh', 'Phạm Đỗ Đức Anh', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('161', 'SD0516', 'Nguyen Thi Thuy', 'Loan', 'Nguyễn Thị Thúy Loan', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('162', 'SD0507', 'Ho Thi Thanh', 'Truc', 'Hồ Thị Thanh Trúc', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('163', 'SD0506', 'Nguyen Thi Minh ', 'Thu', 'Nguyễn Thị Minh Thư', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee` VALUES ('164', 'SD0528', 'Trang Thanh', 'Loc', 'Trang Thanh Lộc', null, null, null, 'DBA', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('165', 'SD0501', 'Nguyen Tuan', 'Hai', 'Nguyễn Tuấn Hải', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('166', 'SD0534', 'Le Quang', 'Thieu', 'Lê Quang Thiều', null, null, null, 'PHP', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('167', 'SD0547', 'Pham Thi Tuyet', 'Trinh', 'Phạm Thị Tuyết Trinh', null, null, null, 'Mobile', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('168', 'SD0549', 'Phan Huy', 'Thanh', 'Phan Huy Thành', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('169', 'SD0545', 'Nguyen Tuong', 'Duy', 'Nguyễn Tường Duy', null, null, null, 'Front-End', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('170', 'SD0562', 'Lam Dao', 'Vinh', 'Lâm Đạo Vinh', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('171', 'SD0564', 'Nguyen Ngoc Phuong', 'Thao', 'Nguyễn Ngọc Phương Thảo', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('172', 'SD0566', 'Nguyen Thanh', 'Son', 'Nguyễn Thành Sơn', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('173', 'SD0569', 'Nguyen Minh ', 'Khoa', 'Nguyễn Minh Khoa 2', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('174', 'SD0568', 'Vu Ngoc', 'Hai', 'Vũ Ngọc Hải', null, null, null, 'Mobile', null, null, null, null, null, null, null, '2', null, '19', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('175', 'SD0565', 'Nguyen Thanh', 'Danh', 'Nguyễn Thanh Danh', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('176', 'SD0578', 'Vo Manh ', 'Tuan', 'Võ Mạnh Tuân', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('177', 'SD0571', 'Nong Thi Anh', 'Thu', 'Nông Thị Anh Thư', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('178', 'SD0572', 'Tai Dai Che', 'Phuong', 'Tài Đại Chế Phương', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('179', 'SD0588', 'Ngo Quang', 'Vu', 'Ngô Quang Vũ', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('180', 'SD0584', 'Hoang Quoc', 'Viet', 'Hoàng Quốc Việt', null, null, null, 'PHP', null, null, null, null, null, null, null, '2', null, '19', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('181', 'SD0585', 'Tran Ngoc', 'Thuy', 'Trần Ngọc Thủy', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('182', 'SD0586', 'Nguyen Minh ', 'Hoang', 'Nguyễn Minh Hoàng', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('183', 'SD0576', 'Pham Thi Thuy', 'Huong', 'Phạm Thị Thùy Hương', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('184', 'SD0583', 'Phan Tan Quang', 'Nam', 'Phan Tấn Quang Nam', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('185', 'SD0581', 'Pham Tran Trong', 'Minh', 'Phạm Trần Trọng Minh', null, null, null, 'PHP', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('186', 'SD0590', 'Nguyen Van', 'Tung', 'Nguyễn Văn Tung', null, null, null, 'java', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('187', 'SD0596', 'Truong Trong', 'Quan', 'Trương Trọng Quân', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('188', 'SD0593', 'Luu Phuong', 'Anh', 'Lưu Phương Anh', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '17', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('189', 'SD0607', 'Nguyen Thi', 'Thuc', 'Nguyễn Thị Thức', null, null, null, 'PHP', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('190', 'SD0608', 'Bui Thien ', 'Tho', 'Bùi Thiên Thơ', null, null, null, 'Front-End', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('191', 'SD0610', 'Tran Nhung ', 'Thuy', 'Trần Nhung Thủy', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('192', 'SD0616', 'Le Hong ', 'Phong', 'Lê Hồng Phong', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('193', 'SD0613', 'Truong Minh An ', 'Hoa', 'Trương Minh An Hòa', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('194', 'SD0612', 'Vo Thi Truong', 'An', 'Võ Thị Trường An', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('195', 'SD0621', 'Tran Thi Kim ', 'Tuyen', 'Trần Thị Kim Tuyến', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:23', '2016-12-15 10:30:23');
INSERT INTO `employee` VALUES ('196', 'SD0620', 'Huynh Tran Quoc ', 'Buu', 'Huỳnh Trần Quốc Bửu', null, null, null, 'Java', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('197', 'SD0627', 'Lam Thi Thu ', 'Truc', 'Lâm Thị Thu Trúc', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('198', 'SD0626', 'Nguyen Hoai ', 'Nam', 'Nguyễn Hoài Nam', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('199', 'SD0632', 'Tran Minh', 'Truc', 'Trần Minh Trực', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('200', 'SD0629', 'Le Trong', 'Tin', 'Lê Trọng Tín', null, null, null, 'Front-End', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('201', 'SD0637', 'Duong Thanh', 'Tri', 'Dương Thạnh Trị', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('202', 'SD0643', 'Tran Thu', 'Thao', 'Trần Thu Thảo', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('203', 'SD0641', 'Nguyen Anh ', 'Quoc', 'Nguyễn Anh Quốc', null, null, null, 'C++', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('204', 'SD0642', 'Vu Thi Tram', 'Anh', 'Vũ Thị Trâm Anh', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('205', 'SD0670', 'Truong Thi Thuy ', 'Trang', 'Trương Thị Thùy Trang', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('206', 'SD0664', 'Nguyen Hong ', 'Linh', 'Nguyễn Hồng Linh', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('207', 'SD0660', 'Cao Thi Hoang', 'Le', 'Cao Thị Hoàng Lê', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('208', 'SD0668', 'Tran Hai', 'Lam', 'Trần Hải Lâm', null, null, null, 'Java', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('209', 'SD0667', 'Ta Thi Ngoc ', 'Hang', 'Tạ Thị Ngọc Hằng', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('210', 'SD0669', 'Trinh Khac ', 'Duy', 'Trịnh Khắc Duy', null, null, null, 'Mobile', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('211', 'SD0672', 'Nguyen Anh', 'Tuan 1', 'Nguyễn Anh Tuấn 1', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('212', 'SD0675', 'Vo Van ', 'Thien', 'Võ Văn Thiện', null, null, null, 'Front-End', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('213', 'SD0676', 'Vu Manh ', 'Hung', 'Vũ Mạnh Hùng', null, null, null, 'Java', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('214', 'SD0673', 'Nguyen Duc ', 'Hanh', 'Nguyễn Đức Hạnh', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '19', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('215', 'SD0677', 'Le Tran Yen ', 'Ngoc', 'Lê Trần Yến Ngọc', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('216', 'SD0686', 'Truong Cam ', 'Vinh', 'Trương Cẩm Vinh', null, null, null, 'Java', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('217', 'SD0684', 'Nguyen Van', 'Trong', 'Nguyễn Văn Trọng', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('218', 'SD0682', 'Nguyen Thi Hong ', 'Thuan', 'Nguyễn Thị Hồng Thuận', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('219', 'SD0679', 'Do Huu ', 'Quang', 'Đỗ Hữu Quang', null, null, null, 'PHP', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('220', 'SD0683', 'Nguyen Thuy Kim ', 'Ngan', 'Nguyễn Thụy Kim Ngân', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('221', 'SD0689', 'Do Nguyen Nguyet', 'Ngan', 'Đỗ Nguyễn Nguyệt Ngân', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '19', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('222', 'SD0680', 'Le Huynh Quang', 'Khanh', 'Lê Huỳnh Quang Khánh', null, null, null, 'QC NT', null, null, null, null, null, null, null, '2', null, '17', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('223', 'SD0685', 'Tran Nam ', 'Khang', 'Trần Nam Khang', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '19', '5', '2016-12-15 10:30:24', '2016-12-15 10:30:24');
INSERT INTO `employee` VALUES ('224', 'SD0687', 'Vo Van ', 'Dung', 'Võ Văn Dũng', null, null, null, 'PHP', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee` VALUES ('225', 'SD0681', 'Dao Duy ', 'Vu', 'Đào Duy Vũ', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee` VALUES ('226', 'SD0656', 'Tran Minh ', 'Tuan', 'Trần Minh Tuấn', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '19', '5', '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee` VALUES ('227', 'SD0690', 'Ly Thuy Phuong', 'Thao', 'Lý Thụy Phương Thảo', null, null, null, 'UI', null, null, null, null, null, null, null, '2', null, '25', '5', '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee` VALUES ('228', 'SD0655', 'Hua Thai ', 'Phong', 'Hứa Thái Phong', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee` VALUES ('229', 'SD0694', 'Nguyen Trung', 'Nguyen', 'Nguyễn Trung Nguyên', null, null, null, 'Mobile', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee` VALUES ('230', 'SD0634', 'Bui Duy', 'Hoa', 'Bùi Duy Hòa', null, null, null, 'Mobile', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee` VALUES ('231', 'SD0692', 'Nguyen Anh', 'Duy', 'Nguyễn Anh Duy', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee` VALUES ('232', 'SD0702', 'Nguyen Anh', 'Tuan 2', 'Nguyễn Anh Tuấn 2', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee` VALUES ('233', 'SD0718', 'Nguyen Hoang', 'Quan', 'Nguyễn Hoàng Quân', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee` VALUES ('234', 'SD0714', 'Huynh Tan ', 'Loc', 'Huỳnh Tấn Lộc', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee` VALUES ('235', 'SD0715', 'Luu Xuan', 'Huy', 'Lưu Xuân Huy', null, null, null, 'Mobile', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee` VALUES ('236', 'SD0719', 'Nguyen Le Hoang', 'An', 'Nguyễn Lê Hoàng Ân', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee` VALUES ('237', 'SD0727', 'Do Thanh ', 'Trung', 'Đỗ Thành Trung', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee` VALUES ('238', 'SD0732', 'Nguyen Le Quang', 'Hung', 'Nguyễn Lê Quang Hùng', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee` VALUES ('239', 'SD0730', 'Tran Quoc', 'Dung', 'Trần Quốc Dũng', null, null, null, 'Mobile', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee` VALUES ('240', 'SD0733', 'Dang Ngoc ', 'Binh', 'Đặng Ngọc Bình', null, null, null, 'Mobile', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee` VALUES ('241', 'SD0737', 'Vu Thanh', 'Lam', 'Vũ Thành Lâm', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee` VALUES ('242', 'SD0739', 'Dinh Nguyen Minh ', 'Duc', 'Đinh Nguyễn Minh Đức', null, null, null, 'Mobile', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee` VALUES ('243', 'SD0752', 'Nguyen Thi Thu', 'Bong', 'Nguyễn Thị Thu Bông', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee` VALUES ('244', 'SD0753', 'Pham Tran ', 'Tien', 'Phạm Trần Tiến', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee` VALUES ('245', 'SD0755', 'Truong Minh Anh', 'Tuan', 'Trương Minh Anh Tuấn', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee` VALUES ('246', 'SD0756', 'Tran Quoc', 'Viet', 'Trần Quốc Việt', null, null, null, 'PHP', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee` VALUES ('247', 'SD0757', 'Luu Truong', 'Thanh', 'Lưu Trường Thành', null, null, null, 'PHP', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee` VALUES ('248', 'SD0760', 'Le Xuan ', 'Tac', 'Lê Xuân Tạc', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee` VALUES ('249', 'SD0761', 'Nguyen Thien', 'Anh', 'Nguyễn Thiên Anh', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee` VALUES ('250', 'SD0762', 'Diep Lan', 'Quynh', 'Diệp Lan Quỳnh', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee` VALUES ('251', 'SD0763', 'Le Cong Minh', 'Thuan', 'Lê Công Minh Thuận', null, null, null, 'Mobile', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:26', '2016-12-15 10:30:26');
INSERT INTO `employee` VALUES ('252', 'SD0754', 'Nguyen Thanh', 'Tu', 'Nguyễn Thanh Tú', null, null, null, 'C++', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:26', '2016-12-15 10:30:26');
INSERT INTO `employee` VALUES ('253', 'SD0766', 'Ngo Thi', 'Hien', 'Ngô Thị Hiền', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:26', '2016-12-15 10:30:26');
INSERT INTO `employee` VALUES ('254', 'SD0768', 'Bao Quang', 'Vinh', 'Bảo Quang Vinh', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:26', '2016-12-15 10:30:26');
INSERT INTO `employee` VALUES ('255', 'SD0767', 'Vo Anh', 'Toan', 'Võ Anh Toàn', null, null, null, 'Java', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:26', '2016-12-15 10:30:26');
INSERT INTO `employee` VALUES ('256', 'SD0772', 'Nguyen Thai', 'Binh', 'Nguyễn Thái Bình', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:26', '2016-12-15 10:30:26');
INSERT INTO `employee` VALUES ('257', 'SD0773', 'Vu Anh ', 'Dzu', 'Vũ Anh Dzu', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:26', '2016-12-15 10:30:26');
INSERT INTO `employee` VALUES ('258', 'SD0774', 'Huynh Yen', 'Linh', 'Huỳnh Yến Linh', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:26', '2016-12-15 10:30:26');
INSERT INTO `employee` VALUES ('259', 'SD0775', 'Nguyen Khoa', 'Khanh', 'Nguyễn Khoa Khanh', null, null, null, 'Mobile', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:26', '2016-12-15 10:30:26');
INSERT INTO `employee` VALUES ('260', 'SD0783', 'Nguyen Thi Thanh', 'Tuyen', 'Nguyễn Thị Thanh Tuyền', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:26', '2016-12-15 10:30:26');
INSERT INTO `employee` VALUES ('261', 'SD0790', 'Vo Minh', 'Man', 'Võ Minh Mẫn', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:26', '2016-12-15 10:30:26');
INSERT INTO `employee` VALUES ('262', 'SD0791', 'Hoang Duc', 'Tuan', 'Hoàng Đức Tuấn', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:26', '2016-12-15 10:30:26');
INSERT INTO `employee` VALUES ('263', 'SD0801', 'Tran Thi Thu', 'Nhan', 'Trần Thị Thu Nhân', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:26', '2016-12-15 10:30:26');
INSERT INTO `employee` VALUES ('264', 'SD0794', 'Dang Thi Huyen', 'Trang', 'Đặng Thị Huyền Trang', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:26', '2016-12-15 10:30:26');
INSERT INTO `employee` VALUES ('265', 'SD0796', 'Tran Dinh', 'Nguyen', 'Trần Đình Nguyên', null, null, null, 'UI', null, null, null, null, null, null, null, '2', null, '25', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('266', 'SD0805', 'Bui Thien ', 'Khiem', 'Bùi Thiện Khiêm', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('267', 'SD0812', 'Nguyen Duc Chau', 'Tri', 'Nguyễn Đức Châu Trí', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('268', 'SD0813', 'Le Thanh ', 'Hoang', 'Lê Thanh Hoàng', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('269', 'SD0820', 'Ta Thi Ai', 'Nhi', 'Tạ Thị Ái Nhi', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('270', 'SD0821', 'Bui Thi ', 'Huong', 'Bùi Thị Hương', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('271', 'SD0823', 'Huynh Le Minh', 'Quan', 'Huỳnh Lê Minh Quân', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('272', 'SD0827', 'Thong', 'Dung', 'Thông Dựng', null, null, null, 'Java', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('273', 'SD0826', 'Nguyen Quynh ', 'Nhu', 'Nguyễn Quỳnh Như', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('274', 'SD0832', 'Nguyen Sy Nhu', 'Ngoc', 'Nguyễn Sỹ Như Ngọc', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('275', 'SD0833', 'Tran Tuan ', 'Kiet', 'Trần Tuấn Kiệt', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('276', 'SD0834', 'Nguyen Van ', 'Hieu 2', 'Nguyễn Văn Hiếu 2', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('277', 'SD0835', 'Nguyen Thi Kieu ', 'Trang', 'Nguyễn Thị Kiều Trang', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('278', 'SD0837', 'Tran Minh', 'Xuan', 'Trần Minh Xuân', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('279', 'SD0838', 'Le Thi Ngoc', 'Hue', 'Lê Thị Ngọc Huệ', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('280', 'SD0843', 'Nguyen Thi Phuong', 'Linh', 'Nguyễn Thị Phương Linh', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('281', 'SD0845', 'Ho Thanh', 'Phong', 'Hồ Thanh Phong', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('282', 'SD0842', 'Vo Minh ', 'Tam', 'Võ Minh Tâm', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('283', 'SD0849', 'Nguyen Vu Minh ', 'Nhat', 'Nguyễn Vũ Minh Nhật', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('284', 'SD0855', 'Thai Bao', 'Long', 'Thái Bảo Long', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('285', 'SD0857', 'Huynh Thanh', 'Y', 'Huỳnh Thành Ý', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('286', 'SD0858', 'Le Hong ', 'Manh', 'Lê Hồng Mạnh', null, null, null, 'DBA', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('287', 'SD0863', 'Le Dang ', 'Nam ', 'Lê Đăng Nam', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('288', 'SD0865', 'Vo Hoa ', 'Hiep', 'Võ Hòa Hiệp', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('289', 'SD0866', 'Truong Thi Anh', 'Dao', 'Trương Thị Anh Đào', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '26', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('290', 'SD0870', 'Van Thi Tuyet', 'Nga', 'Văn Thị Tuyết Nga', null, null, null, 'Support Analyst', null, null, null, null, null, null, null, '2', null, '19', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('291', 'SD0874', 'Luong Thi Ngoc', 'Trinh', 'Lương Thị Ngọc Trinh', null, null, null, 'QC NT', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('292', 'SD0875', 'Dinh Duy', 'Hai', 'Đinh Duy Hải', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('293', 'SD0877', 'Nguyen Thanh', 'Giao', 'Nguyễn Thành Giao', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('294', 'SD0882', 'Pham Hoang', 'Minh 2', 'Phạm Hoàng Minh 2', null, null, null, 'Java', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('295', 'SD0879', 'Nguyen Thanh', 'De', 'Nguyễn Thành Đệ', null, null, null, 'PHP', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('296', 'SD0881', 'Nguyen Que Hoang', 'Cung', 'Nguyễn Quế Hoàng Cung', null, null, null, 'Front-End', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('297', 'SD0889', 'Le Phuong', 'Uyen', 'Lê Phương Uyên', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('298', 'SD0891', 'Phan Minh', 'Nhut', 'Phan Minh Nhựt', null, null, null, 'Mobile', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('299', 'SD0896', 'Nguyen Anh', 'Minh', 'Nguyễn Anh Minh 1', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('300', 'SD0897', 'Pham Sieu', 'Nhien', 'Phạm Siêu Nhiên', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('301', 'SD0900', 'Tran Chi ', 'Nhan', 'Trần Chí Nhân', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('302', 'SD0901', 'Le Thanh', 'Tam', 'Lê Thanh Tâm', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('303', 'SD0903', 'Diep Trung', 'Tin', 'Diệp Trung Tín', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('304', 'SD0904', 'Huynh Ngoc', 'Khue', 'Huỳnh Ngọc Khuê', null, null, null, 'Front-End', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('305', 'SD0905', 'Nguyen Xuan ', 'Vinh 1', 'Nguyễn Xuân Vinh 1', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '23', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('306', 'SD0911', 'Nguyen Huu', 'Quynh', 'Nguyễn Hữu Quỳnh', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('307', 'SD0912', 'Dinh Hoang', 'Minh', 'Đinh Hoàng Minh', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '20', '5', '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee` VALUES ('308', 'SD0915', 'Tran Minh', 'Quan', 'Trần Minh Quân', null, null, null, 'QC', null, null, null, null, null, null, null, '2', null, '22', '5', '2016-12-15 10:30:28', '2016-12-15 10:30:28');
INSERT INTO `employee` VALUES ('309', 'SD0927', 'Hoang Quoc ', 'Hung', 'Hoàng Quốc Hưng', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:28', '2016-12-15 10:30:28');
INSERT INTO `employee` VALUES ('310', 'SD0930', 'Nguyen Chi', 'Cuong', 'Nguyễn Chí Cường', null, null, null, 'Microsoft', null, null, null, null, null, null, null, '2', null, '18', '5', '2016-12-15 10:30:28', '2016-12-15 10:30:28');

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employee_position
-- ----------------------------
INSERT INTO `employee_position` VALUES ('1', 'SE', 'Software Engineer', null, null, null);
INSERT INTO `employee_position` VALUES ('2', 'SSE', 'Senior Software Engineer', null, null, null);
INSERT INTO `employee_position` VALUES ('3', 'ACCOUNTAND', 'Accountant', null, null, null);
INSERT INTO `employee_position` VALUES ('4', 'CEO', 'Chief Executive Officer (CEO)', null, null, null);
INSERT INTO `employee_position` VALUES ('5', 'JTA', 'Junior Technical Author', null, null, null);
INSERT INTO `employee_position` VALUES ('6', 'SA', 'Sales Assistant', null, null, null);
INSERT INTO `employee_position` VALUES ('7', null, 'Principal Software Engineer', null, '2016-12-15 10:29:03', '2016-12-15 10:29:03');
INSERT INTO `employee_position` VALUES ('8', null, 'Senior QC Engineer', null, '2016-12-15 10:30:18', '2016-12-15 10:30:18');
INSERT INTO `employee_position` VALUES ('9', null, 'Principal QC Engineer', null, '2016-12-15 10:30:18', '2016-12-15 10:30:18');
INSERT INTO `employee_position` VALUES ('10', null, 'Solution Architect', null, '2016-12-15 10:30:19', '2016-12-15 10:30:19');
INSERT INTO `employee_position` VALUES ('11', null, 'QC Engineer', null, '2016-12-15 10:30:20', '2016-12-15 10:30:20');
INSERT INTO `employee_position` VALUES ('12', null, 'Principle UI designer', null, '2016-12-15 10:30:21', '2016-12-15 10:30:21');
INSERT INTO `employee_position` VALUES ('13', null, 'Support Analyst', null, '2016-12-15 10:30:22', '2016-12-15 10:30:22');
INSERT INTO `employee_position` VALUES ('14', null, 'Senior UI Designer', null, '2016-12-15 10:30:25', '2016-12-15 10:30:25');
INSERT INTO `employee_position` VALUES ('15', null, 'QC', null, '2016-12-15 10:30:27', '2016-12-15 10:30:27');
INSERT INTO `employee_position` VALUES ('16', null, '10', null, '2016-12-16 06:27:35', '2016-12-16 06:27:35');
INSERT INTO `employee_position` VALUES ('17', null, '9', null, '2016-12-16 06:27:35', '2016-12-16 06:27:35');
INSERT INTO `employee_position` VALUES ('18', null, '2', null, '2016-12-16 06:27:35', '2016-12-16 06:27:35');
INSERT INTO `employee_position` VALUES ('19', null, '7', null, '2016-12-16 06:27:35', '2016-12-16 06:27:35');
INSERT INTO `employee_position` VALUES ('20', null, '8', null, '2016-12-16 06:27:36', '2016-12-16 06:27:36');
INSERT INTO `employee_position` VALUES ('21', null, '13', null, '2016-12-16 06:27:36', '2016-12-16 06:27:36');
INSERT INTO `employee_position` VALUES ('22', null, '11', null, '2016-12-16 06:27:37', '2016-12-16 06:27:37');
INSERT INTO `employee_position` VALUES ('23', null, '1', null, '2016-12-16 06:27:38', '2016-12-16 06:27:38');
INSERT INTO `employee_position` VALUES ('24', null, '12', null, '2016-12-16 06:27:38', '2016-12-16 06:27:38');
INSERT INTO `employee_position` VALUES ('25', null, '14', null, '2016-12-16 06:27:42', '2016-12-16 06:27:42');
INSERT INTO `employee_position` VALUES ('26', null, '15', null, '2016-12-16 06:27:44', '2016-12-16 06:27:44');

-- ----------------------------
-- Table structure for employee_role
-- ----------------------------
DROP TABLE IF EXISTS `employee_role`;
CREATE TABLE `employee_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employee_role
-- ----------------------------
INSERT INTO `employee_role` VALUES ('1', 'JSE', 'Junior Software Engineer', null, null);
INSERT INTO `employee_role` VALUES ('2', 'SE', 'Software Engineer', null, null);
INSERT INTO `employee_role` VALUES ('3', 'SSE', 'Senior Software Engineer', null, null);
INSERT INTO `employee_role` VALUES ('4', 'PSE', 'Principle Software Engineer', null, null);
INSERT INTO `employee_role` VALUES ('5', null, null, '2016-12-16 06:27:35', '2016-12-16 06:27:35');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of office
-- ----------------------------
INSERT INTO `office` VALUES ('1', 'HCM', 'Ho Chi Minh', '9 Dinh Tien Hoang, Quan 1, Ho Chi Minh', null, null, '0', null, null);
INSERT INTO `office` VALUES ('2', null, null, null, null, null, '0', '2016-12-16 06:27:35', '2016-12-16 06:27:35');

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
