/*
 Navicat Premium Data Transfer

 Source Server         : Local 3306 - MySQL
 Source Server Type    : MySQL
 Source Server Version : 80017
 Source Host           : localhost:3306
 Source Schema         : fresh_recruit

 Target Server Type    : MySQL
 Target Server Version : 80017
 File Encoding         : 65001

 Date: 07/04/2023 09:03:38
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for accesses
-- ----------------------------
DROP TABLE IF EXISTS `accesses`;
CREATE TABLE `accesses`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sort` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of accesses
-- ----------------------------
INSERT INTO `accesses` VALUES (1, 'ADMIN', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `accesses` VALUES (2, 'SUB ADMIN', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for companies
-- ----------------------------
DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `guid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `register_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `address1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `postcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `district` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `district_id` int(11) NULL DEFAULT NULL,
  `state_id` int(11) NULL DEFAULT NULL,
  `country_id` int(11) NULL DEFAULT NULL,
  `contact_number1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `contact_number2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `person_incharge` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `mobile_number1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `mobile_number2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `person_email` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `remark` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of companies
-- ----------------------------
INSERT INTO `companies` VALUES (1, 'C19AAA0001', 'AADD89A1-0576-5AE4-13AF-5F49EFA30A86', 'E-BFBMS', '000000-A', NULL, 'UNIT 2-1-10', 'PUSAT PERDAGANGAN BERJAYA', 'JALAN TUN RAZAK', NULL, '50400', 'KUALA LUMPUR', NULL, 9, NULL, '0320002000', '0320002001', 'admin@e-bfbms.com', 'E-BFBMS', '01110001000', '01110001001', 'admin@e-bfbms.com', 'WEBMIN', NULL, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `companies` VALUES (2, 'C19AAA0002', 'EF0F2167-2779-1DFC-F432-0946E8DC1D19', 'AGENSI PEKERJAAN TERAS', '000000-B', NULL, 'UNIT 2-1-11', 'PUSAT PERDAGANGAN BERJAYA', 'JALAN TUN RAZAK', NULL, '50400', 'KUALA LUMPUR', NULL, 9, NULL, '0321002100', '0321002101', 'admin@teras.com.my', 'RAIS DANIEL', '01120002000', '01120002001', 'admin@teras.com.my', 'ADMIN', NULL, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `companies` VALUES (3, 'C19AAA0003', '188BB6DD-26BF-BD84-DDF8-0DB3B3DF347C', 'HARMONY TRAVEL & TOURS', '000000-C', 'GOLD BUSINESS CENTRE, TRIANGLE ROAD, DHAKA, BANGLADESH', NULL, NULL, NULL, NULL, '546000', NULL, NULL, NULL, 1, '+880 (2) 966 1900', '+880 (2) 966 1901', 'admin@harmony.com.bd', 'HUMAYUN AZAD', '+880 (2) 890 1492', '+880 (2) 890 1493', 'admin@harmony.com.bd', 'HARMONY', NULL, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `companies` VALUES (4, 'C19AAA0004', 'AE29594B-6EE7-D9C3-1F18-41B53C126025', 'GERBANG TINGGI SDN BHD', '000000-D', NULL, 'UNIT 2-1-12', 'PUSAT PERDAGANGAN BERJAYA', 'JALAN TUN RAZAK', NULL, '50400', 'KUALA LUMPUR', NULL, 9, NULL, '0321012201', '0321012202', 'admin@gerbangtinggi.com.my', 'AARON DANI', '01130003000', '01130003001', 'admin@gerbangtinggi.com.my', 'EMPLOYER', NULL, '2022-07-12 12:21:12', 1, '2022-01-10 10:00:00', 4, 'ACTIVE');
INSERT INTO `companies` VALUES (5, 'C19AAA0005', '2DD53836-89E3-C44A-0664-3C6F5B727D09', 'DIAMOND TRAVEL & TOURS', '000001-C', 'GOLD BUSINESS CENTRE, TRIANGLE ROAD, DHAKA, BANGLADESH', NULL, NULL, NULL, NULL, '546000', NULL, NULL, NULL, 1, '+880 (2) 966 2000', '+880 (2) 966 2001', 'admin@diamond.com.bd', 'AHMED NAJAD', '+880 (2) 890 1592', '+880 (2) 890 1593', 'admin@diamond.com.bd', 'DIAMOND', NULL, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `companies` VALUES (6, 'C22AAA0006', '2DD53836-89E3-C44A-0664-3C6F5B727D10', 'EXCELLENT TRAINING CENTRE', '000001-E', 'GOLD BUSINESS CENTRE, TRIANGLE ROAD, DHAKA, BANGLADESH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '+880 (2) 966 2001', '+880 (2) 966 2002', 'admin@excellent.com.bd', 'AHMAD AZAD', '+880 (2) 890 1594', '+880 (2) 890 1595', 'admin@excellent.com.bd', 'EXCELLENT', NULL, '2022-07-14 05:59:59', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `companies` VALUES (7, 'C22AAA0007', '497C07A7-CC08-2D22-B4D7-6070948C92A8', 'KMC MANUFACTURING SDN BHD', '123456-X', NULL, 'LOT 123, MENARA ANGSANA', 'JALAN DISINI', NULL, NULL, '88000', 'PENAMPANG', NULL, 15, NULL, '088-123456', '088-567890', 'boss@kmcm.com.my', 'KASSIM MAMAT', '012-3456789', NULL, 'kasmat@kmcm.com.my', 'KMC_MANU', NULL, '2022-07-14 05:58:34', 2, '2022-01-10 10:00:00', 2, 'ACTIVE');
INSERT INTO `companies` VALUES (8, 'C22AAA008', '2DD53836-89E3-C44A-0664-3C6F5B727D11', 'INFINITY TRAINING CENTRE', '000002-E', 'GOLD BUSINESS CENTRE, TRIANGLE ROAD, DHAKA, BANGLADESH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+880 (2) 966 2011', '+880 (2) 966 2012', 'admin@infinity.com.bd', 'RAIES DANI', '+880 (2) 890 1694', '+880 (2) 890 1695', 'admin@infinity.com.bd', 'INFINITY', NULL, '2022-07-14 06:04:13', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for couplings
-- ----------------------------
DROP TABLE IF EXISTS `couplings`;
CREATE TABLE `couplings`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sourceagency_id` int(11) NULL DEFAULT NULL,
  `localagency_id` int(11) NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for districts
-- ----------------------------
DROP TABLE IF EXISTS `districts`;
CREATE TABLE `districts`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `state_id` int(11) NULL DEFAULT NULL,
  `sort` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for educations
-- ----------------------------
DROP TABLE IF EXISTS `educations`;
CREATE TABLE `educations`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `worker_id` int(11) NULL DEFAULT NULL,
  `educationtype_id` int(11) NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of educations
-- ----------------------------
INSERT INTO `educations` VALUES (1, 1, 1, NULL, '2022-01-10 08:00:00', 3, '2022-01-10 10:00:00', 3, 'ACTIVE');
INSERT INTO `educations` VALUES (2, 1, 2, NULL, '2022-01-10 08:00:00', 3, '2022-01-10 10:00:00', 3, 'INACTIVE');
INSERT INTO `educations` VALUES (3, 1, 3, NULL, '2022-01-10 08:00:00', 3, '2022-01-10 10:00:00', 3, 'INACTIVE');
INSERT INTO `educations` VALUES (4, 1, 2, NULL, '2022-01-10 08:00:00', 3, '2022-01-10 10:00:00', 3, 'ACTIVE');
INSERT INTO `educations` VALUES (5, 2, 1, NULL, '2022-01-10 08:00:00', 3, '2022-01-10 10:00:00', 3, 'ACTIVE');
INSERT INTO `educations` VALUES (6, 2, 2, NULL, '2022-01-10 08:00:00', 3, '2022-01-10 10:00:00', 3, 'ACTIVE');
INSERT INTO `educations` VALUES (7, 3, 1, NULL, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', 5, 'ACTIVE');
INSERT INTO `educations` VALUES (8, 3, 2, NULL, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', 5, 'ACTIVE');
INSERT INTO `educations` VALUES (9, 5, 2, NULL, '2022-01-10 08:00:00', 3, '2022-01-10 10:00:00', 3, 'ACTIVE');
INSERT INTO `educations` VALUES (10, 6, 1, NULL, '2023-04-06 12:02:47', 3, '2023-04-06 12:02:47', 3, 'ACTIVE');

-- ----------------------------
-- Table structure for educationtypes
-- ----------------------------
DROP TABLE IF EXISTS `educationtypes`;
CREATE TABLE `educationtypes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sort` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of educationtypes
-- ----------------------------
INSERT INTO `educationtypes` VALUES (1, 'POSTGRADUATE', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `educationtypes` VALUES (2, 'COLLEGE', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `educationtypes` VALUES (3, 'OTHER', 'Z999', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for genders
-- ----------------------------
DROP TABLE IF EXISTS `genders`;
CREATE TABLE `genders`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sort` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of genders
-- ----------------------------
INSERT INTO `genders` VALUES (1, 'MALE', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `genders` VALUES (2, 'FEMALE', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for jobsectors
-- ----------------------------
DROP TABLE IF EXISTS `jobsectors`;
CREATE TABLE `jobsectors`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sort` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jobsectors
-- ----------------------------
INSERT INTO `jobsectors` VALUES (1, 'AGRICULTURE', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `jobsectors` VALUES (2, 'CONSTRUCTION', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `jobsectors` VALUES (3, 'DOMESTIC', 'A003', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `jobsectors` VALUES (4, 'ESTATE', 'A004', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `jobsectors` VALUES (5, 'MANUFACTURING', 'A005', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `jobsectors` VALUES (6, 'PLANTATION', 'A006', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `jobsectors` VALUES (7, 'SERVICES', 'A007', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `jobsectors` VALUES (8, 'OTHERS', 'A999', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE');

-- ----------------------------
-- Table structure for maritals
-- ----------------------------
DROP TABLE IF EXISTS `maritals`;
CREATE TABLE `maritals`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sort` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of maritals
-- ----------------------------
INSERT INTO `maritals` VALUES (1, 'MARRIED', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `maritals` VALUES (2, 'SINGLE', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `maritals` VALUES (3, 'OTHER', 'Z999', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for nationalities
-- ----------------------------
DROP TABLE IF EXISTS `nationalities`;
CREATE TABLE `nationalities`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sort` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nationalities
-- ----------------------------
INSERT INTO `nationalities` VALUES (1, 'BANGLADESH', 'BANGLADESH', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `nationalities` VALUES (2, 'CAMBODIA', 'CAMBODIA', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `nationalities` VALUES (3, 'CHINA', 'CHINA', 'A003', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `nationalities` VALUES (4, 'HONG KONG', 'HONG KONG', 'A004', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `nationalities` VALUES (5, 'INDONESIA', 'INDONESIA', 'A005', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `nationalities` VALUES (6, 'INDIA', 'INDIA', 'A006', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `nationalities` VALUES (7, 'JAPAN', 'JAPAN', 'A007', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `nationalities` VALUES (8, 'KOREA', 'KOREA', 'A008', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `nationalities` VALUES (9, 'KYRGYZ REPUBLIC', 'KYRGYZ REOUBLIC', 'A009', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `nationalities` VALUES (10, 'LAOS', 'LAOS', 'A010', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `nationalities` VALUES (11, 'MYANMAR', 'MYANMAR', 'A011', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `nationalities` VALUES (12, 'NEPAL', 'NEPAL', 'A012', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `nationalities` VALUES (13, 'NEW ZEALAND', 'NEW ZEALAND', 'A013', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `nationalities` VALUES (14, 'PAKISTAN', 'PAKISTAN', 'A014', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `nationalities` VALUES (15, 'PHILIPPINES', 'PHILIPPINES', 'A015', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `nationalities` VALUES (16, 'SINGAPORE', 'SINGAPORE', 'A016', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `nationalities` VALUES (17, 'SRI LANKA', 'SRI LANKA', 'A017', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `nationalities` VALUES (18, 'SYRIAN ARAB REPUBLIC', 'SYRIAN ARAB REPUBLIC', 'A018', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `nationalities` VALUES (19, 'THAILAND', 'THAILAND', 'A019', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `nationalities` VALUES (20, 'UZBEKISTAN', 'UZBEKISTAN', 'A020', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `nationalities` VALUES (21, 'VIETNAM', 'VIETNAM', 'A021', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for passports
-- ----------------------------
DROP TABLE IF EXISTS `passports`;
CREATE TABLE `passports`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(11) NULL DEFAULT NULL,
  `worker_id` int(11) NULL DEFAULT NULL,
  `number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `issue_place` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `issue_date` date NULL DEFAULT NULL,
  `expiry_date` date NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of passports
-- ----------------------------
INSERT INTO `passports` VALUES (1, 1, 1, 'BM21002101', 'BANGLADESH', '2022-12-01', '2022-11-30', NULL, '2022-01-10 23:14:57', 3, '2022-01-10 10:00:00', 3, 'ACTIVE');
INSERT INTO `passports` VALUES (2, 2, 2, 'BM32003204', 'BANGLADESH', '2022-12-01', '2022-11-30', NULL, '2022-01-10 23:15:00', 3, '2022-01-10 10:00:00', 3, 'ACTIVE');
INSERT INTO `passports` VALUES (3, 3, 3, 'BM412243516', 'BANGLADESH', '2022-12-01', '2022-11-30', NULL, '2022-01-10 23:15:04', 5, '2022-01-10 10:00:00', 5, 'ACTIVE');
INSERT INTO `passports` VALUES (4, 4, 4, 'A1233456', 'DHAKA', '2020-06-25', '2025-06-24', NULL, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', 5, 'ACTIVE');
INSERT INTO `passports` VALUES (5, 5, 5, 'V98750302', 'DHAKA', '2020-01-03', '2025-01-03', NULL, '2022-01-10 08:00:00', 3, '2022-01-10 10:00:00', 3, 'ACTIVE');
INSERT INTO `passports` VALUES (6, 6, 6, 'A55655', 'DHAKA', '2023-04-05', '2024-04-04', NULL, '2023-04-06 12:02:47', 3, '2023-04-06 12:02:47', 3, 'ACTIVE');

-- ----------------------------
-- Table structure for profiles
-- ----------------------------
DROP TABLE IF EXISTS `profiles`;
CREATE TABLE `profiles`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `guid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `company_id` int(11) NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `initial` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `contact_number1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `contact_number2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `mobile_number1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `mobile_number2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `remark` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of profiles
-- ----------------------------
INSERT INTO `profiles` VALUES (1, 'A22AAA0001', '4BCB23F6-2F08-FEB0-43C6-D17793838C8C', 1, 'WEBMIN', 'ADMIN e-BFBMS', 'ADMIN', '0320002000', '0320002001', '01110001000', '01110001001', 'admin@e-bfbms.com', 'WEBMIN', NULL, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `profiles` VALUES (2, 'L22AAA0001', 'A67A5040-F1E7-DD29-9533-7D9D7B0A1712', 2, 'ADMIN', 'RAIS DANIEL', 'DANIEL', '0321002100', '0321002101', '01120002000', '01120002001', 'admin@teras.com.my', 'ADMIN', NULL, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `profiles` VALUES (3, 'S22AAA0001', '8E480BA6-9145-F0CD-308F-3CE1B22AF689', 3, 'SOURCE AGENT', 'HUMAYUN AZAD', 'HUMAYUN', '+880 (2) 966 1900', '+880 (2) 966 1901', '+880 (2) 890 1492', '+880 (2) 890 1493', 'admin@harmony.com.bd', 'SOURCE AGENT', NULL, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `profiles` VALUES (4, 'E22AAA0001', '0F94E5F8-3B47-EBC3-C9A5-4714489F28E2', 4, 'EMPLOYER', 'AARON DANI', 'AARON', '0322002200', '0322002201', '01130003000', '01130003001', 'admin@gerbangtinggi.com.my', 'EMPLOYER', NULL, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', 4, 'ACTIVE');
INSERT INTO `profiles` VALUES (5, 'S22AAA0002', '71A75568-AE3F-82EF-4E27-FB7475024A8B', 5, 'SOURCE AGENT', 'AHMED NAJAD', 'AHMED', '+880 (2) 966 2000', '+880 (2) 966 2001', '+880 (2) 890 1592', '+880 (2) 890 1593', 'admin@diamond.com.bd', 'SOURCE AGENT', NULL, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `profiles` VALUES (6, 'L22AAA0002', '1B95BB5D-3B4A-48B2-BBBE-A8A32C77C29E', 2, 'ADMIN', 'SYAIFUL', 'SYAIFUL', '0321002100', '0321002101', '01120002000', '01120002001', 'admin2@teras.com.my', 'ADMIN', NULL, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `profiles` VALUES (7, 'M22AAA0001', '9B3802EE-FA7E-CF13-78A0-451B342A69E6', 2, 'MASTER', 'RYAN HAKIMI', 'RYAN', '0321002100', '0321002101', '01120002000', '01120002001', 'admin@teras.com.my', 'MASTER', NULL, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `profiles` VALUES (8, 'T22AAA0001', '9B3802EE-FA7E-CF13-78A0-451B342A69E7', 6, 'TRAINING CENTER', 'AHMED AZAD', 'AHMEDAZAD', '+880 (2) 966 2001', '+880 (2) 966 2002', '+880 (2) 890 1594', '+880 (2) 890 1595', 'admin@excellent.com.bd', 'TRAINING CENTER', NULL, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `profiles` VALUES (9, 'E22AAA0002', '1CD2C1D2-A86A-4D85-958D-651A7EDF5150', 7, 'EMPLOYER', 'KASSIM MAMAT', 'KMC_MANU', '088-123456', '088-567890', '012-3456789', NULL, 'kasmat@kmcm.com.my', 'KMC MANUFACTURING SDN BHD', NULL, '2022-01-10 08:00:00', 2, '2022-01-10 10:00:00', 2, 'ACTIVE');
INSERT INTO `profiles` VALUES (10, 'T22AAA0002', '9B3802EE-FA7E-CF13-78A0-451B342A69E8', 6, 'TRAINING CENTER', 'RAIES DANI', 'INFINITY', '+880 (2) 966 2011', '+880 (2) 966 2012', '+880 (2) 890 1694', '+880 (2) 890 1695', 'admin@infinity.com.bd', 'TRAINING CENTER', NULL, '2022-07-14 06:11:46', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for quotas
-- ----------------------------
DROP TABLE IF EXISTS `quotas`;
CREATE TABLE `quotas`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `guid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `employer_id` int(11) NULL DEFAULT NULL,
  `required` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of quotas
-- ----------------------------
INSERT INTO `quotas` VALUES (1, 'D20AAA0001', 'A45405B8-1CE0-7D24-B9A7-62EFA629B55B', 4, '50', NULL, 'ACTIVE', '2022-01-10 08:00:00', 2, '2022-01-10 10:00:00', 2, 'ACTIVE');
INSERT INTO `quotas` VALUES (2, 'D22AAA0002', '2DEE1A5F-BF8D-0EB6-73BC-1E26AB501B4A', 4, '30', 'PRODUCTION', 'ACTIVE', '2022-01-10 08:00:00', 2, '2022-01-10 10:00:00', 2, 'INACTIVE');
INSERT INTO `quotas` VALUES (3, 'D22AAA0003', '5B668FEC-01B4-7B8A-39C6-8C9B0DE99554', 9, '30', 'PRODUCTION', 'ACTIVE', '2022-01-10 08:00:00', 2, '2022-01-10 10:00:00', 2, 'ACTIVE');

-- ----------------------------
-- Table structure for relations
-- ----------------------------
DROP TABLE IF EXISTS `relations`;
CREATE TABLE `relations`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sort` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of relations
-- ----------------------------
INSERT INTO `relations` VALUES (1, 'HUSBAND', 'A001', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `relations` VALUES (2, 'WIFE', 'A002', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `relations` VALUES (3, 'FATHER', 'A003', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `relations` VALUES (4, 'MOTHER', 'A004', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `relations` VALUES (5, 'SISTER', 'A006', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `relations` VALUES (6, 'BROTHER', 'A005', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `relations` VALUES (7, 'SON', 'A007', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `relations` VALUES (8, 'DAUGHTER', 'A008', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `relations` VALUES (9, 'COUSIN', 'A009', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `relations` VALUES (10, 'UNCLE', 'A010', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `relations` VALUES (11, 'AUNT', 'A011', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `relations` VALUES (12, 'NEPHEW', 'A012', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `relations` VALUES (13, 'NIECE', 'A013', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sort` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'WEBMIN', 'A001', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `roles` VALUES (2, 'ADMIN', 'A002', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `roles` VALUES (3, 'SOURCE AGENT', 'A003', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `roles` VALUES (4, 'EMPLOYER', 'A004', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `roles` VALUES (5, 'MASTER', 'A005', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `roles` VALUES (6, 'TRAINING CENTER', 'A006', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for sequences
-- ----------------------------
DROP TABLE IF EXISTS `sequences`;
CREATE TABLE `sequences`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `increment` smallint(6) NULL DEFAULT NULL,
  `min_letter` smallint(6) NULL DEFAULT NULL,
  `max_letter` int(11) NULL DEFAULT NULL,
  `min_number` smallint(6) NULL DEFAULT NULL,
  `max_number` int(11) NULL DEFAULT NULL,
  `cur_letter1` smallint(6) NULL DEFAULT NULL,
  `cur_letter2` smallint(6) NULL DEFAULT NULL,
  `cur_letter3` smallint(6) NULL DEFAULT NULL,
  `cur_letter4` smallint(6) NULL DEFAULT NULL,
  `cur_letter5` smallint(6) NULL DEFAULT NULL,
  `cur_number` smallint(6) NULL DEFAULT NULL,
  `cycle` smallint(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sequences
-- ----------------------------
INSERT INTO `sequences` VALUES (1, 'SEQUENCE_ADMIN', 'A', 1, 65, 90, 1, 99999, 65, 65, 65, 65, 65, 1, 0);
INSERT INTO `sequences` VALUES (2, 'SEQUENCE_COMPANY', 'C', 1, 65, 90, 1, 99999, 65, 65, 65, 65, 65, 8, 0);
INSERT INTO `sequences` VALUES (3, 'SEQUENCE_LOCALAGENT', 'L', 1, 65, 90, 1, 99999, 65, 65, 65, 65, 65, 2, 0);
INSERT INTO `sequences` VALUES (4, 'SEQUENCE_SOURCEAGENT', 'S', 1, 65, 90, 1, 99999, 65, 65, 65, 65, 65, 2, 0);
INSERT INTO `sequences` VALUES (5, 'SEQUENCE_TRANSACTION', 'T', 1, 65, 90, 1, 99999, 65, 65, 65, 65, 65, 6, 0);
INSERT INTO `sequences` VALUES (6, 'SEQUENCE_WORKER', 'W', 1, 65, 90, 1, 99999, 65, 65, 65, 65, 65, 6, 0);
INSERT INTO `sequences` VALUES (7, 'SEQUENCE_EMPLOYER', 'E', 1, 65, 90, 1, 99999, 65, 65, 65, 65, 65, 2, 0);
INSERT INTO `sequences` VALUES (8, 'SEQUENCE_MASTER', 'M', 1, 65, 90, 1, 99999, 65, 65, 65, 65, 65, 1, 0);
INSERT INTO `sequences` VALUES (9, 'SEQUENCE_DEMANDLETTER', 'D', 1, 65, 90, 1, 99999, 65, 65, 65, 65, 65, 3, 0);
INSERT INTO `sequences` VALUES (10, 'SEQUENCE_TRAINING', 'T', 1, 65, 90, 1, 99999, 65, 65, 65, 65, 65, 2, 0);

-- ----------------------------
-- Table structure for states
-- ----------------------------
DROP TABLE IF EXISTS `states`;
CREATE TABLE `states`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sort` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of states
-- ----------------------------
INSERT INTO `states` VALUES (1, 'PERLIS', 'A001', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `states` VALUES (2, 'KEDAH', 'A002', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `states` VALUES (3, 'PULAU PINANG', 'A003', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `states` VALUES (4, 'KELANTAN', 'A004', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `states` VALUES (5, 'TERENGGANU', 'A005', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `states` VALUES (6, 'PAHANG', 'A006', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `states` VALUES (7, 'PERAK', 'A007', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `states` VALUES (8, 'SELANGOR', 'A008', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `states` VALUES (9, 'WP KUALA LUMPUR', 'A009', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `states` VALUES (10, 'WP PUTRAJAYA', 'A010', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `states` VALUES (11, 'NEGERI SEMBILAN', 'A011', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `states` VALUES (12, 'MELAKA', 'A012', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `states` VALUES (13, 'JOHOR', 'A013', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `states` VALUES (14, 'WP LABUAN', 'A014', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `states` VALUES (15, 'SABAH', 'A015', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `states` VALUES (16, 'SARAWAK', 'A016', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for statuses
-- ----------------------------
DROP TABLE IF EXISTS `statuses`;
CREATE TABLE `statuses`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sort` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of statuses
-- ----------------------------
INSERT INTO `statuses` VALUES (1, 'ACTIVE', 'A001', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `statuses` VALUES (2, 'INACTIVE', 'A002', '2022-01-10 08:00:00', 1, NULL, NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for transactions
-- ----------------------------
DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `guid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `worker_id` int(11) NULL DEFAULT NULL,
  `sourceagency_id` int(11) NULL DEFAULT NULL,
  `localagency_id` int(11) NULL DEFAULT NULL,
  `employer_id` int(11) NULL DEFAULT NULL,
  `medical_id` int(11) NULL DEFAULT NULL,
  `training_id` int(11) NULL DEFAULT NULL,
  `quota_id` int(11) NULL DEFAULT NULL,
  `passport_id` int(11) NULL DEFAULT NULL,
  `arrival_date` date NULL DEFAULT NULL,
  `plks_start_date` date NULL DEFAULT NULL,
  `plks_expiry_date` date NULL DEFAULT NULL,
  `flight_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `eta_malaysia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `flight_date` date NULL DEFAULT NULL,
  `medical` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `training` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `visa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `approval` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `departure` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `arrival` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transactions
-- ----------------------------
INSERT INTO `transactions` VALUES (1, 'T19-AAA-AA-0001', 'AC0D10E8-06D5-E5AD-92A0-15855A9C1FD6', 1, 3, 2, 4, 3, NULL, 1, 1, NULL, NULL, NULL, 'AK9001', '1000', '2021-12-30', 'YES', 'YES', 'YES', 'YES', NULL, NULL, NULL, '2023-04-06 12:38:48', 3, '2022-05-08 11:35:07', 2, 'ACTIVE');
INSERT INTO `transactions` VALUES (2, 'T19-AAA-AA-0002', 'B22E98E0-7AB7-4E47-B293-501E3A0ADC60', 2, 3, 2, 4, NULL, NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-06 20:56:55', 3, '2023-04-06 16:09:10', 3, 'ACTIVE');
INSERT INTO `transactions` VALUES (3, 'T20-AAA-AA-0003', '92CC1063-E32E-6049-0049-A218180BDC75', 3, 3, 2, 4, 3, NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'YES', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-06 21:40:04', 5, '2023-04-07 07:39:27', NULL, 'ACTIVE');
INSERT INTO `transactions` VALUES (4, 'T22-AAA-AA-0004', '9BA19AD7-9261-C784-6AA9-E05CB07223B7', 4, 5, 2, 9, NULL, NULL, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-10 08:00:00', 5, '2022-01-11 07:42:09', 2, 'ACTIVE');
INSERT INTO `transactions` VALUES (5, 'T22-AAA-AA-0005', 'C2036D94-5807-4EC1-BFF1-B091B4614479', 5, 3, 2, 9, NULL, NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-10 08:00:00', 3, '2022-01-11 07:41:41', 2, 'ACTIVE');
INSERT INTO `transactions` VALUES (6, 'T23-AAA-AA-0006', 'D5F26839-67B2-ACF6-B892-CE2DB9C60727', 6, 3, 2, 4, NULL, NULL, 1, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-06 12:02:47', 3, '2023-04-06 12:31:21', 2, 'ACTIVE');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `profile_id` int(11) NULL DEFAULT NULL,
  `role_id` int(11) NULL DEFAULT NULL,
  `access_id` int(11) NULL DEFAULT NULL,
  `status_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, '999E9564-C507-2512-C097-F66AFAE4E94F', 'ADMIN', '202cb962ac59075b964b07152d234b70', 1, 1, NULL, 1, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `users` VALUES (2, 'B7049A52-1798-4618-DC73-29E9A1CC2490', 'TERAS', '202cb962ac59075b964b07152d234b70', 2, 2, NULL, 1, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `users` VALUES (3, '20FB2C3E-F5E8-CA4C-59F9-AF438F22AB89', 'HARMONY', '202cb962ac59075b964b07152d234b70', 3, 3, NULL, 1, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `users` VALUES (4, 'B98EE73D-C8F8-E6BD-2CCE-42F03BAD4769', 'GERBANG', '202cb962ac59075b964b07152d234b70', 4, 4, NULL, 1, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `users` VALUES (5, '56D849BA-04FB-703D-C036-2F192C4CC7CB', 'DIAMOND', '202cb962ac59075b964b07152d234b70', 5, 3, NULL, 1, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `users` VALUES (6, 'C6213E37-FA82-C263-826E-236F0CEA9999', 'SYAIFUL', '202cb962ac59075b964b07152d234b70', 6, 2, NULL, 1, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `users` VALUES (7, 'FCC9ED93-8386-3D85-862A-BBC59CF4CC2E', 'MASTER', '202cb962ac59075b964b07152d234b70', 7, 5, NULL, 1, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `users` VALUES (8, 'FCC9ED93-8386-3D85-862A-BBC59CF4CC2F', 'EXCELLENT', '202cb962ac59075b964b07152d234b70', 8, 6, NULL, 1, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `users` VALUES (9, 'D6FCCD20-5491-18A6-3821-8F16631C50E0', 'KMC_MANU', 'e10adc3949ba59abbe56e057f20f883e', 9, 4, NULL, 1, '2022-01-10 08:00:00', 2, '2022-01-10 10:00:00', 2, 'ACTIVE');
INSERT INTO `users` VALUES (10, 'FCC9ED93-8386-3D85-862A-BBC59CF4CC2G', 'INFINITY', '202cb962ac59075b964b07152d234b70', 10, 6, NULL, 1, '2022-01-10 08:00:00', 1, '2022-01-10 08:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for workers
-- ----------------------------
DROP TABLE IF EXISTS `workers`;
CREATE TABLE `workers`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `guid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `middle_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gender_id` int(11) NULL DEFAULT NULL,
  `birth_date` date NULL DEFAULT NULL,
  `birth_place` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nationality_id` int(11) NULL DEFAULT NULL,
  `national_card` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jobsector_id` int(11) NULL DEFAULT NULL,
  `education_other` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `employer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `employer_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `employer_address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `employer_zipcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `home_address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `home_zipcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `home_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `home_mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `marital_id` int(11) NULL DEFAULT NULL,
  `marital_other` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `location_visa_apply` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `children_number` int(11) NULL DEFAULT NULL,
  `relation_id` int(11) NULL DEFAULT NULL,
  `kin_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kin_mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of workers
-- ----------------------------
INSERT INTO `workers` VALUES (1, 'W22AAA0001', '26D8714D-3186-5F4C-18BA-7896C14EC8EA', 'MATT DOUGLAS DAMON', 'MATT', 'DOUGLAS', 'DAMON', 1, '1990-07-01', 'BANGLADESH', 1, '20068624720111522', 1, NULL, 'GREENWICH', '011-2210091', 'BANGLADESH', '546000', 'HOME PARK', '546000', '011-3142290', '011-6651172', 'mattdamon@gmail.com', 1, NULL, 'BANGLADESH', NULL, NULL, NULL, NULL, NULL, '2023-04-06 13:06:21', 3, '2022-01-10 10:00:00', 3, 'ACTIVE');
INSERT INTO `workers` VALUES (2, 'W22AAA0002', '5E75CB79-4FC1-2102-3DF3-2F05BB9EFB09', 'MELISSA LILY JOHANSSON', 'MELISSA', 'LILY', 'JOHANSSON', 2, '1992-06-23', 'BANGLADESH', 1, '31179735831222633', 1, NULL, 'UNIVERSITY OF DHAKA', '+880 (2) 978 1721', 'DHAKA, BANGLADESH', '1000', 'HOME PARK 2, HARMONY ROAD', '1000', '+880 (2) 952 3873', '+880 (2) 941 2956', 'melissa@gmail.com', 2, NULL, 'BANGLADESH', NULL, NULL, NULL, NULL, NULL, '2023-04-06 13:06:23', 3, '2022-01-10 10:00:00', 3, 'ACTIVE');
INSERT INTO `workers` VALUES (3, 'W22AAA0003', '4BF570A1-973A-9097-83A8-D94FE20F794C', 'RACHEL MAY ROBINSSON', 'RACHEL', 'MAY', 'ROBINSSON', 2, '1992-03-12', 'BANGLADESH', 1, '42268546942333755', 7, NULL, NULL, NULL, NULL, NULL, 'HOME PARK 3, HARMONY ROAD', '1000', '+880 (2) 963 2764', '+880 (2) 952 1834', 'rachel@gmail.com', 2, NULL, NULL, 0, 6, 'ALBERT ELVIS ROBINSSON', '+880 (2) 981 2725', NULL, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', 5, 'ACTIVE');
INSERT INTO `workers` VALUES (4, 'W22AAA0004', '01E55820-2AE1-91AB-0748-CF00284071D1', 'MOHD BASHEER', 'MOHD', '-', 'BASHEER', 1, '1986-06-12', 'DHAKA', 1, '2399843878', 2, NULL, NULL, NULL, NULL, NULL, '3, CAWALA ROAD', '123445', '88695098', '883643672', NULL, 2, NULL, NULL, 0, 6, 'MOHD BASHOR', '8832387824', NULL, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', 5, 'ACTIVE');
INSERT INTO `workers` VALUES (5, 'W22AAA0005', 'A9B3F0AF-3BBD-5CE7-5428-247D63D71075', 'MOLLAH ABUL HOSSAIN', 'MOLLAH', 'ABUL', 'HOSSAIN', 1, '1985-11-03', 'DHAKA', 1, '9823765782', 5, NULL, NULL, NULL, NULL, NULL, '6789, NATKI ROAD', '27469', '9842980', '882309402', 'mollahabul@gmail.com', 1, NULL, NULL, 0, 2, 'SUHSUR NEENA', '88350202', NULL, '2022-01-10 08:00:00', 3, '2022-01-10 10:00:00', 3, 'ACTIVE');
INSERT INTO `workers` VALUES (6, 'W23AAA0006', '8C647563-7066-95CA-D4C8-BC95E859E0FA', 'ROBINSON', 'ROBINSON', 'TONY', 'EDMUND', 1, '1989-11-28', 'DHAKA', 1, 'A55655', 2, 'DEGREE', NULL, NULL, NULL, NULL, 'DHAKA', '0800', '00112233', '00112233', 'robinson@gmail.com', 2, NULL, NULL, 0, 6, 'MICHAEL TONY EDMUND', '00112233', NULL, '2023-04-06 12:02:47', 3, '2023-04-06 12:02:47', 3, 'ACTIVE');

SET FOREIGN_KEY_CHECKS = 1;
