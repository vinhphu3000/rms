# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.13-log)
# Database: rms
# Generation Time: 2016-12-13 18:03:29 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table acl_permission_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `acl_permission_groups`;

CREATE TABLE `acl_permission_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `acl_permission_groups` WRITE;
/*!40000 ALTER TABLE `acl_permission_groups` DISABLE KEYS */;

INSERT INTO `acl_permission_groups` (`id`, `name`)
VALUES
	(1,'Quản lý đại lý'),
	(2,' 	Quản lý mặt hàng'),
	(3,'Quản lý kho'),
	(4,'Quản lý báo cáo'),
	(6,'Quản lý đơn hàng'),
	(7,'Quản lý bán hàng'),
	(8,'Quản lý chính sách chiết khấu'),
	(9,'Hệ thống cửa hàng'),
	(10,'Bảo vệ giá & hàng tồn kho'),
	(11,'Báo cáo thống kê'),
	(12,'Thông báo');

/*!40000 ALTER TABLE `acl_permission_groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table acl_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `acl_permissions`;

CREATE TABLE `acl_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ident` varchar(255) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `acl_permissions` WRITE;
/*!40000 ALTER TABLE `acl_permissions` DISABLE KEYS */;

INSERT INTO `acl_permissions` (`id`, `ident`, `title`, `group_id`)
VALUES
	(6,'QLDH-XDSDH','Xem danh sách đơn hàng ',6),
	(7,'QLDH-TDH','Tạo đơn hàng ',6),
	(8,'QLDH-HDTH',' Huỷ/đổi trả hàng ',6),
	(9,'QLK-CNSTOCK','Cập nhật stock ',3),
	(10,'QLK-XTK','Xem tồn kho ',3),
	(11,'QLBH-XDSSPB','Xem danh sách sản phẩm bán ',7),
	(12,'QLBH-EXPORT',' Export',7),
	(13,'QLCK-XTTCK','Xem thông tin chiết khấu ',8),
	(14,'BVGHTK-XTTCX','Xem thông tin chính xác',10),
	(15,'HTCH-XDSCH','Xem danh sách cửa hàng',9),
	(16,'HTCH-CNHTCH',' Cập nhật hệ thống cửa hàng ',9),
	(17,'BCTK-XBCTK','Xem báo cáo thống kê ',11),
	(18,'BCTK-EXPORT','Export',11);

/*!40000 ALTER TABLE `acl_permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table acl_role_permission
# ------------------------------------------------------------

DROP TABLE IF EXISTS `acl_role_permission`;

CREATE TABLE `acl_role_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table acl_roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `acl_roles`;

CREATE TABLE `acl_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `agency_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table acl_user_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `acl_user_role`;

CREATE TABLE `acl_user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table employee
# ------------------------------------------------------------

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
  `position_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;

INSERT INTO `employee` (`id`, `code`, `last_name`, `first_name`, `full_name`, `email`, `phone`, `avatar`, `skills`, `introduction_short`, `address`, `join_date`, `sex`, `brithday`, `user_id`, `marital_status`, `office_id`, `manager_id`, `position_id`, `role_id`)
VALUES
	(1,'TH01','Thieu','Le Quang','Le Quang Thieu','quangthieuagu@gmail.com','0986684184',NULL,'PHP; Laravel; Desigin Parttern',NULL,NULL,'2016-12-13',1,'2016-12-04',1,0,1,1,2,3);

/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table employee_position
# ------------------------------------------------------------

DROP TABLE IF EXISTS `employee_position`;

CREATE TABLE `employee_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `employee_position` WRITE;
/*!40000 ALTER TABLE `employee_position` DISABLE KEYS */;

INSERT INTO `employee_position` (`id`, `code`, `name`, `level`)
VALUES
	(1,'SE','Software Engineer',NULL),
	(2,'SSE','Senior Software Engineer',NULL),
	(3,'ACCOUNTAND','Accountant',NULL),
	(4,'CEO','Chief Executive Officer (CEO)',NULL),
	(5,'JTA','Junior Technical Author',NULL),
	(6,'SA','Sales Assistant',NULL);

/*!40000 ALTER TABLE `employee_position` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table employee_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `employee_role`;

CREATE TABLE `employee_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `employee_role` WRITE;
/*!40000 ALTER TABLE `employee_role` DISABLE KEYS */;

INSERT INTO `employee_role` (`id`, `code`, `name`)
VALUES
	(1,'JSE','Junior Software Engineer'),
	(2,'SE','Software Engineer'),
	(3,'SSE','Senior Software Engineer'),
	(4,'PSE','Principle Software Engineer');

/*!40000 ALTER TABLE `employee_role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table inventory
# ------------------------------------------------------------

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



# Dump of table inventory_log
# ------------------------------------------------------------

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



# Dump of table office
# ------------------------------------------------------------

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

LOCK TABLES `office` WRITE;
/*!40000 ALTER TABLE `office` DISABLE KEYS */;

INSERT INTO `office` (`id`, `code`, `name`, `address`, `phone`, `email`, `is_primary`)
VALUES
	(1,'HCM','Ho Chi Minh','9 Dinh Tien Hoang, Quan 1, Ho Chi Minh',NULL,NULL,0);

/*!40000 ALTER TABLE `office` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table order
# ------------------------------------------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;

INSERT INTO `order` (`id`, `order_id`, `xman_order_id`, `order_date`, `cust_id`, `req_date`, `ship_addr`, `phone`, `total_amt`, `vat_amt`, `discount`, `payment_method`, `debt_days`, `remarks`, `status`, `cust_name`, `updated_at`, `created_at`, `delivered`, `payed`)
VALUES
	(62,'00181891',NULL,'14/09/2015','HCM03','12/09/2015','Phu Nhuan','0967217522',222080000,0,0,'PAY',0,'','O',NULL,NULL,NULL,NULL,NULL),
	(63,'00181892',NULL,'14/09/2015','HCM03','12/09/2015','Phu Nhuan','0967217522',76990000,0,0,'PAY',0,'test','S',NULL,NULL,NULL,NULL,NULL),
	(64,'00181893',NULL,'14/09/2015','HCM03','12/09/2015','Phu Nhuan  ','0967217522',36580000,0,0,'PAY',0,'test','O',NULL,NULL,NULL,NULL,NULL),
	(68,'00181899',NULL,'15/09/2015','HCM02','12/12/2015','Phu Nhuan','0967217522',321420000,0,0,'DEBT',0,'','O',NULL,NULL,NULL,NULL,NULL),
	(69,'00181900',NULL,'15/09/2015','HCM02','12/12/2015','Phu Nhuan','0967217522',321420000,0,0,'DEBT',0,'','O',NULL,NULL,NULL,NULL,NULL),
	(70,'00181901',NULL,'15/09/2015','HCM02','12/12/2015','Phu Nhuan','0967217522',0,0,0,'DEBT',0,'gjf','O',NULL,NULL,NULL,NULL,NULL),
	(73,'BO15091600001',NULL,'16/09/2015','HCM123','12/12/2015','Etown, Cộng Hòa','0986684184',16990000,16990000,0,'DEBT',0,'','O',NULL,'2015-09-18 08:54:19',NULL,NULL,NULL),
	(74,'BO15091600002',NULL,'16/09/2015','HCM02','12/12/2015','reyry','0967217522',100550000,0,0,'DEBT',0,'rtyrtyrt','O','B2B ',NULL,NULL,NULL,NULL),
	(75,'00181906',NULL,'16/09/2015','HCM02','12/12/2015','test','0967217522',36580000,36580000,0,'DEBT',1,'','O','B2B ','2015-09-18 08:28:08',NULL,NULL,NULL),
	(76,'BO15091800001',NULL,'18/09/2015','DLC0001.1','18/09/2015','11','0909213325',50970000,0,0,'DEBT',0,'','O','Agency01',NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table order_item
# ------------------------------------------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `order_item` WRITE;
/*!40000 ALTER TABLE `order_item` DISABLE KEYS */;

INSERT INTO `order_item` (`id`, `order_join_id`, `order_id`, `model`, `item_id`, `name`, `prod_id`, `unit_price`, `vat_price`, `promotion`, `discount`, `qty`, `updated_at`, `created_at`)
VALUES
	(83,62,'BO15091400001','A31','BQA31___BL','iPhone 6 16GB Gold','BQA31___BL',16990000,16990000,'N',0,5,NULL,NULL),
	(84,62,'BO15091400001','C31','BQC31___BL','iPhone 6 Plus 16GB Gray','BQC31___BL',19590000,19590000,'N',0,7,NULL,NULL),
	(85,63,'BO15091481892','A31','BQA31___BL','iPhone 6 16GB Gold','BQA31___BL',16990000,16990000,'N',0,1,NULL,NULL),
	(86,63,'BO15091481892','EF71','BQEF71__PI','Sony Xperia M4 Aqua Dual (Trắng)','BQEF71__PI',6000000,6000000,'N',0,10,NULL,NULL),
	(87,64,'BO15091481893','A31','BQA31___BL','iPhone 6 16GB Gold','BQA31___BL',16990000,16990000,'N',0,1,NULL,NULL),
	(88,64,'BO15091481893','C31','BQC31___BL','iPhone 6 Plus 16GB Gray','BQC31___BL',19590000,19590000,'N',0,1,NULL,NULL),
	(89,65,'BO15091500001','C31','BQC31___BL','iPhone 6 Plus 16GB Gray','BQC31___BL',19590000,19590000,'N',0,1,NULL,NULL),
	(90,65,'BO15091500001','A31','BQA31___BL','iPhone 6 16GB Gold','BQA31___BL',16990000,16990000,'N',0,9,NULL,NULL),
	(91,65,'BO15091500001','E61','BQE61___BY','iPhone 6 Plus 64GB Gold','BQE61___BY',22190000,22190000,'N',0,5,NULL,NULL),
	(92,69,'BO15091581900','A31','BQA31___BL','iPhone 6 16GB Gold','BQA31___BL',16990000,16990000,'N',0,12,NULL,NULL),
	(93,69,'BO15091581900','C31','BQC31___BL','iPhone 6 Plus 16GB Gray','BQC31___BL',19590000,19590000,'N',0,2,NULL,NULL),
	(94,69,'BO15091581900','E52','BQE52___BL','iPhone 6 64GB Gray','BQE52___BL',19590000,19590000,'N',0,4,NULL,NULL),
	(95,70,'BO15091581901','A31','BQA31___BL','iPhone 6 16GB Gold','BQA31___BL',16990000,16990000,'N',0,0,NULL,NULL),
	(115,75,'00181906','75','BQA31___BL','iPhone 6 16GB Gold','BQA31___BL',16990000,16990000,NULL,0,3,'2015-09-18 08:28:07','2015-09-18 08:28:07'),
	(116,75,'00181906','75','BQC31___BL','iPhone 6 Plus 16GB Gray','BQC31___BL',19590000,19590000,NULL,0,3,'2015-09-18 08:28:07','2015-09-18 08:28:07'),
	(117,73,'BO15091600001','73','BQA31___BL','iPhone 6 16GB Gold','BQA31___BL',16990000,16990000,NULL,0,4,'2015-09-18 08:54:19','2015-09-18 08:54:19');

/*!40000 ALTER TABLE `order_item` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table order_return
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order_return`;

CREATE TABLE `order_return` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dealer_id` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `order_return` WRITE;
/*!40000 ALTER TABLE `order_return` DISABLE KEYS */;

INSERT INTO `order_return` (`id`, `dealer_id`, `created_at`, `updated_at`)
VALUES
	(65,'HCM03','2015-09-18 08:35:17','2015-09-18 08:35:17'),
	(66,'HCM03','2015-09-18 08:37:38','2015-09-18 08:37:38'),
	(67,'HCM02','2015-09-18 08:42:24','2015-09-18 08:42:24'),
	(68,'DLC0001.1','2015-09-18 08:52:17','2015-09-18 08:52:17');

/*!40000 ALTER TABLE `order_return` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table order_return_items
# ------------------------------------------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `order_return_items` WRITE;
/*!40000 ALTER TABLE `order_return_items` DISABLE KEYS */;

INSERT INTO `order_return_items` (`id`, `order_return_id`, `sku`, `name`, `price`, `quantity`, `remarks`, `created_at`, `updated_at`)
VALUES
	(97,'65','BQA31___BL','iPhone 6 16GB Gold',16990000,7,'','2015-09-18 15:35:17','0000-00-00 00:00:00'),
	(98,'65','BQC31___BL','iPhone 6 Plus 16GB Gray',19590000,9,'','2015-09-18 15:35:17','0000-00-00 00:00:00'),
	(99,'66','BQA31___BL','iPhone 6 16GB Gold',16990000,7,'hu cam ung','2015-09-18 15:37:38','0000-00-00 00:00:00'),
	(100,'66','BQC31___BL','iPhone 6 Plus 16GB Gray',19590000,9,'hu loa','2015-09-18 15:37:38','0000-00-00 00:00:00'),
	(101,'67','BQA31___BL','iPhone 6 16GB Gold',16990000,1,'','2015-09-18 15:42:24','0000-00-00 00:00:00'),
	(102,'68','BQA31___BL','iPhone 6 16GB Gold',16990000,3,'','2015-09-18 15:52:17','0000-00-00 00:00:00');

/*!40000 ALTER TABLE `order_return_items` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table project
# ------------------------------------------------------------

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



# Dump of table resetpass_token
# ------------------------------------------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `resetpass_token` WRITE;
/*!40000 ALTER TABLE `resetpass_token` DISABLE KEYS */;

INSERT INTO `resetpass_token` (`id`, `email`, `token`, `expire_date`, `create_date`, `last_change`, `status`, `user_type`)
VALUES
	(29,'quangthieuagu@gmail.com','28af1b88b828d0ba1b0cc7ae41ef28d6','2015-09-20 10:38:47','2015-09-17 10:38:47','2015-09-17 10:38:47',0,'agency'),
	(30,'quangthieuagu@gmail.com','d7667ec1cb50fbfbf5e62c3886c063e1','2015-09-20 14:07:15','2015-09-17 14:07:15','2015-09-17 14:07:15',0,'agency'),
	(31,'quangthieuagu@gmail.com','cc4ff0e2274871c98793733d79e74abb','2015-09-20 17:29:54','2015-09-17 17:29:54','2015-09-17 17:29:54',0,'member'),
	(32,'quangthieuagu@gmail.com','b24d59caf2ff1b2e359de7622eb242d0','2015-09-20 17:31:27','2015-09-17 17:31:27','2015-09-17 17:31:27',0,'member'),
	(33,'quangthieuagu@gmail.com','f8738abe1cafe860e25c6c95f86b9f34','2015-09-21 05:20:58','2015-09-18 05:20:58','2015-09-18 05:20:58',0,'agency'),
	(34,'quangthieuagu@gmail.com','6c05380436940e4fb03e93f279c46e42','2015-09-21 05:27:08','2015-09-18 05:27:08','2015-09-18 05:27:08',0,'agency'),
	(35,'quangthieuagu@gmail.com','087871988d356490670c3d4d1c9d5473','2015-09-21 06:22:36','2015-09-18 06:22:36','2015-09-18 06:22:36',0,'member');

/*!40000 ALTER TABLE `resetpass_token` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_group_permission
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_group_permission`;

CREATE TABLE `user_group_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user_group_permission` WRITE;
/*!40000 ALTER TABLE `user_group_permission` DISABLE KEYS */;

INSERT INTO `user_group_permission` (`id`, `permission_id`, `group_id`)
VALUES
	(60,6,5),
	(61,7,5),
	(62,8,5),
	(63,9,5),
	(64,10,5),
	(65,11,5),
	(66,12,5),
	(67,13,5),
	(68,14,5),
	(69,15,5),
	(70,16,5),
	(71,17,5),
	(72,18,5),
	(75,6,7),
	(76,7,7),
	(77,8,7),
	(78,6,8),
	(79,7,8),
	(80,8,8),
	(81,9,8),
	(82,10,8),
	(83,11,8),
	(84,12,8),
	(85,13,8),
	(86,14,8),
	(87,15,8),
	(88,16,8),
	(89,17,8),
	(90,18,8),
	(103,9,10),
	(104,10,10);

/*!40000 ALTER TABLE `user_group_permission` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_groups`;

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `agency_id` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user_groups` WRITE;
/*!40000 ALTER TABLE `user_groups` DISABLE KEYS */;

INSERT INTO `user_groups` (`id`, `name`, `agency_id`)
VALUES
	(5,'Quản lý đại lý','HCM123'),
	(7,'Quản lý đơn hàng','HCM123'),
	(8,'Tài khoản thành viên','HCM123'),
	(10,'Quản lý kho','HCM1985'),
	(11,'r','HCM02');

/*!40000 ALTER TABLE `user_groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `agency_entity_id`, `agency_name`, `agency_id`, `agency_parent_id`, `type`, `active`, `email_confirm`, `group_id`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(24,'Thieu Le Quang','quangthieuagu@gmail.com','25d55ad283aa400af464c76d713c07ad',266,'Đại Lý bán sỉ IPAD','HCM1985','HCM123','admin',1,1,10,'64eabde55be6fc85d8d930e959d2e9be','2015-09-17 07:51:00','2015-09-18 07:19:00');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
