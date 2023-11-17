/*
 Navicat Premium Data Transfer

 Source Server         : Local 3306 - MySQL
 Source Server Type    : MySQL
 Source Server Version : 80017
 Source Host           : localhost:3306
 Source Schema         : fresh_visa

 Target Server Type    : MySQL
 Target Server Version : 80017
 File Encoding         : 65001

 Date: 07/04/2023 09:03:22
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `comment` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES (1, 1, 'ADMINISTRATOR', 'ACTIVE', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `admins` VALUES (2, 2, 'HIGHCOMM', 'ACTIVE', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `admins` VALUES (3, 3, 'OSC', 'ACTIVE', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `admins` VALUES (4, 4, 'ADMIN 1', 'ACTIVE', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `admins` VALUES (5, 7, 'ADMIN 2', 'ACTIVE', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for applicants
-- ----------------------------
DROP TABLE IF EXISTS `applicants`;
CREATE TABLE `applicants`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `payment_id` int(11) NULL DEFAULT NULL,
  `batch_id` int(11) NULL DEFAULT NULL,
  `branch_id` int(11) NULL DEFAULT NULL,
  `admin_id` int(11) NULL DEFAULT NULL,
  `full_name` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `middle_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `gender_id` int(11) NULL DEFAULT NULL,
  `birth_date` date NULL DEFAULT NULL,
  `birth_place` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `current_nationality_id` int(11) NULL DEFAULT NULL,
  `former_nationality_id` int(11) NULL DEFAULT NULL,
  `national_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `passport_id` int(11) NULL DEFAULT NULL,
  `passport_other` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `passport_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `passport_issue_place` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `passport_issue_date` date NULL DEFAULT NULL,
  `passport_expiry_date` date NULL DEFAULT NULL,
  `occupation_other` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `position_other` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `education_other` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `employer_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `employer_phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `employer_address` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `employer_zipcode` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `home_address` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `home_zipcode` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `home_phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `home_mobile` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `marital_id` int(11) NULL DEFAULT NULL,
  `marital_other` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `location_visa_apply` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `purposevisit_id` int(11) NULL DEFAULT NULL,
  `purposevisit_other` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `visa_id` int(11) NULL DEFAULT NULL,
  `entrynumber_id` int(11) NULL DEFAULT NULL,
  `entrynumber_other` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `express_service` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `expected_date` date NULL DEFAULT NULL,
  `longest_stay` int(11) NULL DEFAULT NULL,
  `travel_expense` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `inviter_name` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `inviter_address` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `inviter_phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `inviter_relationship` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `granted_date` date NULL DEFAULT NULL,
  `granted_place` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `visited_location` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `visa_overstayed` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `visa_overstayed_detail` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `visa_refused` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `visa_refused_detail` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `visa_criminal` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `visa_criminal_detail` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `visa_condition` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `visa_condition_detail` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `visa_disease` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `visa_disease_detail` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `visa_other_detail` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `declared_sign` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `declared_date` date NULL DEFAULT NULL,
  `result_id` int(11) NULL DEFAULT NULL,
  `result2_id` int(11) NULL DEFAULT NULL,
  `result2_date` date NULL DEFAULT NULL,
  `remark` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of applicants
-- ----------------------------
INSERT INTO `applicants` VALUES (1, '26D8714D-3186-5F4C-18BA-7896C14EC8EA', 1, 1, 5, 4, 'MATT DOUGLAS DAMON', 'MATT', 'DOUGLAS', 'DAMON', 1, '1990-07-01', 'BANGLADESH', 1, 1, '20068624720111522', 3, NULL, 'BM21002101', 'BANGLADESH', '2018-12-01', '2019-11-30', NULL, NULL, NULL, 'GREENWICH', '011-2210091', 'BANGLADESH', '546000', 'HOME PARK', '657000', '011-3142290', '011-6651172', 'mattdamon@gmail.com', 1, NULL, 'BANGLADESH', 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO INFORMATION', 'YES', '2022-01-10', 18, NULL, NULL, 'ALL DOCUMENTS REQUIRED HAVE BEEN REVIEWED.', '2022-01-10 08:00:00', 5, '2022-02-02 17:55:14', 5, 'ACTIVE');
INSERT INTO `applicants` VALUES (2, 'B22E98E0-7AB7-4E47-B293-501E3A0ADC60', 2, 1, 5, 4, 'MELISSA LILY JOHANSSON', 'MELISSA', 'LILY', 'JOHANSSON', 2, '1992-06-23', 'BANGLADESH', 1, NULL, '31179735831222633', 3, NULL, 'BM32003204', 'BANGLADESH', '2018-11-06', '2019-11-05', NULL, NULL, NULL, 'UNIVERSITY OF DHAKA', '+880 (2) 978 1721', 'DHAKA, BANGLADESH', '1000', 'HOME PARK 2, HARMONY ROAD', '1000', '+880 (2) 952 3873', '+880 (2) 941 2956', 'melissa@gmail.com', 2, NULL, 'BANGLADESH', 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'YES', '2022-01-10', 1, NULL, NULL, 'ALL DOCUMENTS REQUIRED HAVE BEEN REVIEWED.', '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', 5, 'ACTIVE');
INSERT INTO `applicants` VALUES (3, '92CC1063-E32E-6049-0049-A218180BDC75', 3, 1, 5, 4, 'RACHEL LINDSAY WELLINGTON', 'RACHEL', 'LINDSAY', 'WELLINGTON', 2, '1990-07-11', 'DHAKA, BANGLADESH', 1, 1, '42280846942333744', 3, NULL, 'BM32103292', 'DHAKA, BANGLADESH', '2019-08-09', '2024-08-08', NULL, NULL, NULL, 'UNIVERSITY OF DHAKA', '+880 (2) 966 1900', 'RAMNA', '1000', '5A-05-03, ROAD 06, SECTOR 01, DHAKA', '1230', '+880 (2) 890 1492', '+880 (2) 890 1189 ', 'rachel90@gmail.com', 2, NULL, 'DHAKA, BANGLADESH', 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', 'YES', '2022-01-10', 1, NULL, NULL, '123', '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', 2, 'ACTIVE');
INSERT INTO `applicants` VALUES (4, '9BA19AD7-9261-C784-6AA9-E05CB07223B7', 4, 2, 5, 4, 'MOHD BASHEER', 'MOHD', NULL, 'BASHEER', 1, '1986-06-12', 'DHAKA, BANGLADESH', 1, 1, '2399843878', 3, NULL, 'A1233456', 'DHAKA, BANGLADESH', '2020-06-25', '2025-06-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 'DHAKA, BANGLADESH', 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, NULL, 'YES', '2022-01-10', 1, NULL, NULL, '123', '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', 2, 'ACTIVE');
INSERT INTO `applicants` VALUES (5, 'A9B3F0AF-3BBD-5CE7-5428-247D63D71075', 5, 2, 5, 4, 'MOLLAH ABUL HASSAN', 'MOLLAH', 'ABUL', 'HOSSAIN', 1, '1985-11-03', 'DHAKA, BANGLADESH', 1, 1, '9823765782', 3, NULL, 'V98750302', 'DHAKA, BANGLADESH', '2020-01-03', '2025-01-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 'DHAKA, BANGLADESH', 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, NULL, 'YES', '2022-01-10', 1, NULL, NULL, '123', '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', 2, 'ACTIVE');

-- ----------------------------
-- Table structure for batches
-- ----------------------------
DROP TABLE IF EXISTS `batches`;
CREATE TABLE `batches`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `batch_guid` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `branch_id` int(11) NULL DEFAULT NULL,
  `admin_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of batches
-- ----------------------------
INSERT INTO `batches` VALUES (1, 'BBC6E144-16A7-8598-C289-A0D06E162F95', 5, 4, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `batches` VALUES (2, '78D7E0C9-AE19-5B24-F4F3-A8F4EFBAE5D3', 5, 4, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `batches` VALUES (3, 'C7982BEC-9302-4806-538A-3C5329B54304', 5, 4, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `batches` VALUES (5, 'FD7AA27F-8D99-A9F9-7052-887358732808', 5, 4, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for branches
-- ----------------------------
DROP TABLE IF EXISTS `branches`;
CREATE TABLE `branches`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `admin_id` int(11) NULL DEFAULT NULL,
  `comment` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of branches
-- ----------------------------
INSERT INTO `branches` VALUES (1, 1, 1, 'ADMINISTRATOR', 'ACTIVE', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `branches` VALUES (2, 2, 2, 'HIGHCOMM', 'ACTIVE', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `branches` VALUES (3, 3, 3, 'OSC', 'ACTIVE', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `branches` VALUES (4, 4, 4, 'ADMIN 1', 'ACTIVE', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `branches` VALUES (5, 5, 4, 'BRANCH 1', 'ACTIVE', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `branches` VALUES (6, 6, 4, 'BRANCH 2', 'ACTIVE', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `branches` VALUES (7, 7, 5, 'ADMIN 2', 'ACTIVE', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `branches` VALUES (8, 8, 5, 'BRANCH 3', 'ACTIVE', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `branches` VALUES (9, 9, 5, 'BRANCH 4', 'ACTIVE', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for companies
-- ----------------------------
DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `register_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `zipcode` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `contact_number1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `contact_number2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `person_incharge` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mobile_number1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mobile_number2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `comment` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of companies
-- ----------------------------
INSERT INTO `companies` VALUES (1, 'C19AAA0001', 'ADMINISTRATOR', '1001001-A', 'DHAKA, BANGLADESH', '1000', '+880 (2) 966 1101', '+880 (2) 966 1102', 'ADMINISTRATOR', '+880 (2) 966 1103', '+880 (2) 966 1104', 'systemadmin@visafasttrack.com', 'ADMINISTRATOR', NULL, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `companies` VALUES (2, 'C19AAA0002', 'HIGHCOMM', '2002001-B', 'DHAKA, BANGLADESH', '1000', '+880 (2) 966 1201', '+880 (2) 966 1202', 'HIGHCOMM', '+880 (2) 966 1203', '+880 (2) 966 1204', 'highcom@visafasttrack.com', 'HIGHCOMM', NULL, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `companies` VALUES (3, 'C19AAA0003', 'OSC', '3003001-C', 'DHAKA, BANGLADESH', '1000', '+880 (2) 966 1301', '+880 (2) 966 1302', 'OSC', '+880 (2) 966 1303', '+880 (2) 966 1304', 'osc@visafasttrack.com', 'OSC', NULL, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `companies` VALUES (4, 'C19AAA0004', 'ADMIN 1 TOURS & TRAVEL LTD', '4004001-D', 'DHAKA, BANGLADESH', '1001', '+880 (2) 966 1411', '+880 (2) 966 1412', 'ADMIN 1', '+880 (2) 966 1413', '+880 (2) 966 1414', 'admin1@visafasttrack.com', 'ADMIN 1', NULL, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `companies` VALUES (5, 'C19AAA0005', 'BRANCH 1 TOURS & TRAVEL LTD', '5005001-E', 'DHAKA, BANGLADESH', '1003', '+880 (2) 966 1511', '+880 (2) 966 1512', 'BRANCH 1', '+880 (2) 966 1513', '+880 (2) 966 1514', 'branch1@visafasttrack.com', 'BRANCH 1', NULL, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `companies` VALUES (6, 'C19AAA0006', 'BRANCH 2 TOURS & TRAVEL LTD', '5005002-E', 'DHAKA, BANGLADESH', '1004', '+880 (2) 966 1521', '+880 (2) 966 1522', 'BRANCH 2', '+880 (2) 966 1523', '+880 (2) 966 1524', 'branch2@visafasttrack.com', 'BRANCH 2', NULL, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `companies` VALUES (7, 'C19AAA0007', 'ADMIN 2 TOURS & TRAVEL LTD', '4004002-D', 'DHAKA, BANGLADESH', '1002', '+880 (2) 966 1421', '+880 (2) 966 1422', 'ADMIN 2', '+880 (2) 966 1423', '+880 (2) 966 1424', 'admin2@visafasttrack.com', 'ADMIN 2', NULL, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `companies` VALUES (8, 'C19AAA0008', 'BRANCH 3 TOURS & TRAVEL LTD', '5005003-E', 'DHAKA, BANGLADESH', '1005', '+880 (2) 966 1531', '+880 (2) 966 1532', 'BRANCH 3', '+880 (2) 966 1533', '+880 (2) 966 1534', 'branch3@visafasttrack.com', 'BRANCH 3', NULL, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `companies` VALUES (9, 'C19AAA0009', 'BRANCH 4 TOURS & TRAVEL LTD', '5005004-E', 'DHAKA, BANGLADESH', '1006', '+880 (2) 966 1541', '+880 (2) 966 1542', 'BRANCH 4', '+880 (2) 966 1543', '+880 (2) 966 1544', 'branch4@visafasttrack.com', 'BRANCH 4', NULL, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for educations
-- ----------------------------
DROP TABLE IF EXISTS `educations`;
CREATE TABLE `educations`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NULL DEFAULT NULL,
  `educationtype_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of educations
-- ----------------------------
INSERT INTO `educations` VALUES (1, 1, 1, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `educations` VALUES (2, 1, 2, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `educations` VALUES (3, 3, 1, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `educations` VALUES (4, 3, 2, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `educations` VALUES (5, 2, 1, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `educations` VALUES (6, 2, 2, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for educationtypes
-- ----------------------------
DROP TABLE IF EXISTS `educationtypes`;
CREATE TABLE `educationtypes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of educationtypes
-- ----------------------------
INSERT INTO `educationtypes` VALUES (1, 'POSTGRADUATE', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `educationtypes` VALUES (2, 'COLLEGE', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `educationtypes` VALUES (3, 'OTHER', 'A999', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for emergencies
-- ----------------------------
DROP TABLE IF EXISTS `emergencies`;
CREATE TABLE `emergencies`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NULL DEFAULT NULL,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `relationship_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of emergencies
-- ----------------------------
INSERT INTO `emergencies` VALUES (2, 1, 'BEN AFFLECK', '011-2342882', '011-7871127', 14, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `emergencies` VALUES (3, 1, 'TONY STARK', '011-3882881', '011-2777227', 14, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `emergencies` VALUES (4, 2, 'RONALD DEAN', '+880 (2) 972 3215', '+880 (2) 981 4326', 14, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `emergencies` VALUES (5, 3, 'MICHAEL ROBINSON', '+880 (2) 969 6548', '+880 (2) 970 5437', 14, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `emergencies` VALUES (6, 1, 'CHRIS HEMSWORTH', '011-2678812', '011-3778332', 14, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for entrynumbers
-- ----------------------------
DROP TABLE IF EXISTS `entrynumbers`;
CREATE TABLE `entrynumbers`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of entrynumbers
-- ----------------------------
INSERT INTO `entrynumbers` VALUES (1, 'ONE ENTRY VALID FOR 3 MONTHS FROM THE DATE OF ISSUE', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `entrynumbers` VALUES (2, 'TWO ENTRIES VALID FOR 3 TO 6 MONTHS FROM THE DATE OF ISSUE', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `entrynumbers` VALUES (3, 'MULTIPLE ENTRIES VALID FOR 6 MONTHS FROM THE DATE OF ISSUE', 'A003', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `entrynumbers` VALUES (4, 'MULTIPLE ENTRIES VALID FOR 1 YEAR FROM THE DATE OF ISSUE', 'A004', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `entrynumbers` VALUES (5, 'OTHER', 'A999', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for families
-- ----------------------------
DROP TABLE IF EXISTS `families`;
CREATE TABLE `families`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nationality_id` int(11) NULL DEFAULT NULL,
  `occupationtype_id` int(11) NULL DEFAULT NULL,
  `relationship_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of families
-- ----------------------------
INSERT INTO `families` VALUES (1, 1, 'MATT DOUGLAS ALEXIS', 1, 4, 5, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `families` VALUES (2, 2, 'LINDSAY LILY JOHANSSON', 1, 8, 6, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `families` VALUES (3, 3, 'MICHELLE LINDSAY WELLINGTON', 1, 4, 6, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `families` VALUES (4, 1, 'MATT ALEX MATTHEW', 1, 4, 5, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `families` VALUES (5, 1, 'MATT DAVID ZACHERY', 1, 4, 5, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for fees
-- ----------------------------
DROP TABLE IF EXISTS `fees`;
CREATE TABLE `fees`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `price` double NULL DEFAULT NULL,
  `order_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fees
-- ----------------------------
INSERT INTO `fees` VALUES (1, 'VLN FEE', 2500, 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `fees` VALUES (2, 'OSC FEE', 2300, 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for genders
-- ----------------------------
DROP TABLE IF EXISTS `genders`;
CREATE TABLE `genders`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of genders
-- ----------------------------
INSERT INTO `genders` VALUES (1, 'MALE', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `genders` VALUES (2, 'FEMALE', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for itenaries
-- ----------------------------
DROP TABLE IF EXISTS `itenaries`;
CREATE TABLE `itenaries`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `date` date NULL DEFAULT NULL,
  `address` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for maritals
-- ----------------------------
DROP TABLE IF EXISTS `maritals`;
CREATE TABLE `maritals`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of maritals
-- ----------------------------
INSERT INTO `maritals` VALUES (1, 'MARRIED', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `maritals` VALUES (2, 'SINGLE', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `maritals` VALUES (3, 'OTHER', 'A999', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for nationalities
-- ----------------------------
DROP TABLE IF EXISTS `nationalities`;
CREATE TABLE `nationalities`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

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
-- Table structure for occupations
-- ----------------------------
DROP TABLE IF EXISTS `occupations`;
CREATE TABLE `occupations`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NULL DEFAULT NULL,
  `occupationtype_id` int(11) NULL DEFAULT NULL,
  `position` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of occupations
-- ----------------------------
INSERT INTO `occupations` VALUES (1, 1, 3, 'DIRECTOR', '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `occupations` VALUES (2, 2, 4, 'MARKETING MANAGER', '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `occupations` VALUES (3, 3, 4, 'ACCOUNTANT', '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `occupations` VALUES (4, 1, 4, 'BUSINESS ANALYST', '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `occupations` VALUES (5, 1, 4, 'BUSINESS RESEARCHER', '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for occupationtypes
-- ----------------------------
DROP TABLE IF EXISTS `occupationtypes`;
CREATE TABLE `occupationtypes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of occupationtypes
-- ----------------------------
INSERT INTO `occupationtypes` VALUES (1, 'FORMER/INCUMBENT MEMBER OF PARLIAMENT', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `occupationtypes` VALUES (2, 'FORMER/INCUMBENT GOVERNMENT OFFICIAL', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `occupationtypes` VALUES (3, 'BUSINESS PERSON', 'A003', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `occupationtypes` VALUES (4, 'COMPANY EMPLOYEE', 'A004', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `occupationtypes` VALUES (5, 'ENTERTAINER', 'A005', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `occupationtypes` VALUES (6, 'INDUSTRIAL WORKER', 'A006', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `occupationtypes` VALUES (7, 'AGRICULTURAL WORKER', 'A007', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `occupationtypes` VALUES (8, 'STUDENT', 'A008', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `occupationtypes` VALUES (9, 'MILITARY PERSONNEL', 'A009', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `occupationtypes` VALUES (10, 'CREW MEMBER', 'A010', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `occupationtypes` VALUES (11, 'SELF-EMPLOYED', 'A011', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `occupationtypes` VALUES (12, 'NGO STAFF', 'A012', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `occupationtypes` VALUES (13, 'UNEMPLOYED', 'A013', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `occupationtypes` VALUES (14, 'RELIGIOUS PERSONNEL', 'A014', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `occupationtypes` VALUES (15, 'RETIRED', 'A015', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `occupationtypes` VALUES (16, 'STAFF OF MEDIA', 'A016', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `occupationtypes` VALUES (17, 'OTHER', 'A999', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for passports
-- ----------------------------
DROP TABLE IF EXISTS `passports`;
CREATE TABLE `passports`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of passports
-- ----------------------------
INSERT INTO `passports` VALUES (1, 'DIPLOMATIC', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `passports` VALUES (2, 'SERVICE OR OFFICIAL', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `passports` VALUES (3, 'ORDINARY', 'A003', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `passports` VALUES (4, 'OTHER', 'A999', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for passportscans
-- ----------------------------
DROP TABLE IF EXISTS `passportscans`;
CREATE TABLE `passportscans`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NULL DEFAULT NULL,
  `batch_id` int(11) NULL DEFAULT NULL,
  `passport_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `branch_id` int(11) NULL DEFAULT NULL,
  `admin_id` int(11) NULL DEFAULT NULL,
  `status_id` int(11) NULL DEFAULT NULL,
  `scanned_date` date NULL DEFAULT NULL,
  `result_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of passportscans
-- ----------------------------
INSERT INTO `passportscans` VALUES (1, 1, 1, 'BM21002101', 5, 5, 4, 1, '2022-01-11', NULL, '2022-01-11 08:12:36', 5, NULL, NULL, 'ACTIVE');
INSERT INTO `passportscans` VALUES (2, 1, 1, 'BM21002101', 4, 4, 4, 3, '2022-01-11', NULL, '2022-01-11 08:16:52', 4, NULL, NULL, 'ACTIVE');
INSERT INTO `passportscans` VALUES (3, 1, 1, 'BM21002101', 4, 4, 4, 5, '2022-01-11', NULL, '2022-01-11 08:16:58', 4, NULL, NULL, 'ACTIVE');
INSERT INTO `passportscans` VALUES (4, 1, 1, 'BM21002101', 3, 3, 3, 6, '2022-01-11', NULL, '2022-01-11 08:17:28', 3, NULL, NULL, 'ACTIVE');
INSERT INTO `passportscans` VALUES (5, 1, 1, 'BM21002101', 3, 3, 3, 8, '2022-01-11', NULL, '2022-01-11 08:17:33', 3, NULL, NULL, 'ACTIVE');
INSERT INTO `passportscans` VALUES (6, 1, 1, 'BM21002101', 2, 2, 2, 9, '2022-01-11', NULL, '2022-01-11 08:17:59', 2, NULL, NULL, 'ACTIVE');
INSERT INTO `passportscans` VALUES (7, 1, 1, 'BM21002101', 2, 2, 2, 13, '2022-01-11', NULL, '2022-01-11 08:18:02', 2, NULL, NULL, 'ACTIVE');
INSERT INTO `passportscans` VALUES (8, 1, 1, 'BM21002101', 3, 3, 3, 14, '2022-01-11', NULL, '2022-01-11 08:21:32', 3, NULL, NULL, 'ACTIVE');
INSERT INTO `passportscans` VALUES (9, 1, 1, 'BM21002101', 3, 3, 3, 15, '2022-01-11', NULL, '2022-01-11 08:21:37', 3, NULL, NULL, 'ACTIVE');
INSERT INTO `passportscans` VALUES (10, 1, 1, 'BM21002101', 4, 4, 4, 16, '2022-01-11', NULL, '2022-01-11 08:21:59', 4, NULL, NULL, 'ACTIVE');
INSERT INTO `passportscans` VALUES (11, 1, 1, 'BM21002101', 4, 4, 4, 17, '2022-01-11', NULL, '2022-01-11 08:22:03', 4, NULL, NULL, 'ACTIVE');
INSERT INTO `passportscans` VALUES (12, 1, 1, 'BM21002101', 5, 5, 4, 18, '2022-01-11', NULL, '2022-01-11 08:22:27', 5, NULL, NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for payments
-- ----------------------------
DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NULL DEFAULT NULL,
  `batch_id` int(11) NULL DEFAULT NULL,
  `branch_id` int(11) NULL DEFAULT NULL,
  `admin_id` int(11) NULL DEFAULT NULL,
  `visa_id` int(11) NULL DEFAULT NULL,
  `vln_fee` double NULL DEFAULT NULL,
  `osc_fee` double NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of payments
-- ----------------------------
INSERT INTO `payments` VALUES (1, 1, 1, 5, 4, 1, 2500, 2300, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', 5, 'ACTIVE');
INSERT INTO `payments` VALUES (2, 2, 1, 5, 4, 1, 2500, 2300, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', 5, 'ACTIVE');
INSERT INTO `payments` VALUES (3, 3, 1, 5, 4, 1, 2500, 2300, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', 5, 'ACTIVE');
INSERT INTO `payments` VALUES (4, 4, 2, 5, 4, 1, 2500, 2300, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', 5, 'ACTIVE');
INSERT INTO `payments` VALUES (5, 5, 2, 5, 4, 1, 2500, 2300, '2022-01-10 08:00:00', 5, '2022-01-10 10:00:00', 5, 'ACTIVE');

-- ----------------------------
-- Table structure for profiles
-- ----------------------------
DROP TABLE IF EXISTS `profiles`;
CREATE TABLE `profiles`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `initial` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `company_id` int(11) NULL DEFAULT NULL,
  `comment` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of profiles
-- ----------------------------
INSERT INTO `profiles` VALUES (1, 'S19AAA0001', 'ADMINISTRATOR', 'SUPER1@FRESH', 'ADMINISTRATOR', 1, 'ADMINISTRATOR', 'ACTIVE', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `profiles` VALUES (2, 'H19AAA0001', 'HIGH COMMISSION', 'HCOMM1@FRESH', 'HIGHCOMM', 2, 'HIGHCOMM', 'ACTIVE', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `profiles` VALUES (3, 'O19AAA0001', 'ONE STOP CENTRE', 'OSC1@FRESH', 'OSC', 3, 'OSC', 'ACTIVE', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `profiles` VALUES (4, 'A19AAA0001', 'ADMIN', 'ADM1@FRESH', 'ADMIN1', 4, 'ADMIN 1', 'ACTIVE', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `profiles` VALUES (5, 'B19AAA0001', 'BRANCH', 'BRN11@FRESH', 'BRANCH1', 5, 'BRANCH 1', 'ACTIVE', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `profiles` VALUES (6, 'B19AAA0002', 'BRANCH', 'BRN12@FRESH', 'BRANCH2', 6, 'BRANCH 2', 'ACTIVE', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `profiles` VALUES (7, 'A19AAA0002', 'ADMIN', 'ADM2@FRESH', 'ADMIN2', 7, 'ADMIN 2', 'ACTIVE', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `profiles` VALUES (8, 'B19AAA0003', 'BRANCH', 'BRN21@FRESH', 'BRANCH3', 8, 'BRANCH 3', 'ACTIVE', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `profiles` VALUES (9, 'B19AAA0004', 'BRANCH', 'BRN22@FRESH', 'BRANCH4', 9, 'BRANCH 4', 'ACTIVE', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for purposevisits
-- ----------------------------
DROP TABLE IF EXISTS `purposevisits`;
CREATE TABLE `purposevisits`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `visa_id` int(11) NULL DEFAULT NULL,
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of purposevisits
-- ----------------------------
INSERT INTO `purposevisits` VALUES (1, 'EMPLOYMENT PASS', 1, 'EMPLOYMENT', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `purposevisits` VALUES (2, 'DEPENDANT PASS', 1, 'DEPENDANT', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `purposevisits` VALUES (3, 'SOCIAL VISIT PASS (TEMPORARY EMPLOYMENT)', 1, 'SOCIAL VISIT', 'A003', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `purposevisits` VALUES (4, 'STUDENT PASS', 1, 'STUDENT', 'A004', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `purposevisits` VALUES (5, 'PROFESSIONAL VISIT PASS', 1, 'PROFESSIONAL', 'A005', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `purposevisits` VALUES (6, 'VISITING RELATIVES', 2, 'RELATIVES', 'A006', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `purposevisits` VALUES (7, 'TOURISM', 2, 'TOURISM', 'A007', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `purposevisits` VALUES (8, 'JOURNALIST/REPORTER', 2, 'REPORTER', 'A008', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `purposevisits` VALUES (9, 'ATTENDING MEETING', 2, 'MEETING', 'A009', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `purposevisits` VALUES (10, 'ATTENDING BUSINESS DISCUSSION', 2, 'BUSINESS', 'A010', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `purposevisits` VALUES (11, 'INSPECTING OF FACTOR', 2, 'INSPECTING', 'A011', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `purposevisits` VALUES (12, 'AUDITING COMPANY\'S ACCOUNT', 2, 'AUDITING', 'A012', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `purposevisits` VALUES (13, 'SIGNING AGREEMENT', 2, 'SIGNING', 'A013', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `purposevisits` VALUES (14, 'DOING SURVEY ON INVESTMENT OPPORTUNITIES', 2, 'SURVEY', 'A014', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `purposevisits` VALUES (15, 'SETTING UP FACTORY', 2, 'FACTORY', 'A015', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `purposevisits` VALUES (16, 'ATTENDING SEMINARS', 2, 'SEMINAR', 'A016', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `purposevisits` VALUES (17, 'ON GOODWILL MISSION FOR STUDENTS', 2, 'GOODWILL', 'A017', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `purposevisits` VALUES (18, 'SITTING FOR EXAMINATIONS IN UNIVERSITY', 2, 'EXAMINATION', 'A018', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `purposevisits` VALUES (19, 'TAKING PARTS IN SPORTS COMPETITIONS', 2, 'SPORTS', 'A019', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `purposevisits` VALUES (20, 'OTHER', 3, 'OTHER', 'A999', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for relationships
-- ----------------------------
DROP TABLE IF EXISTS `relationships`;
CREATE TABLE `relationships`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of relationships
-- ----------------------------
INSERT INTO `relationships` VALUES (1, 'HUSBAND', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `relationships` VALUES (2, 'WIFE', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `relationships` VALUES (3, 'FATHER', 'A003', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `relationships` VALUES (4, 'MOTHER', 'A004', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `relationships` VALUES (5, 'BROTHER', 'A005', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `relationships` VALUES (6, 'SISTER', 'A006', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `relationships` VALUES (7, 'SON', 'A007', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `relationships` VALUES (8, 'DAUGHTER', 'A008', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `relationships` VALUES (9, 'COUSIN', 'A009', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `relationships` VALUES (10, 'UNCLE', 'A010', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `relationships` VALUES (11, 'AUNT', 'A011', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `relationships` VALUES (12, 'NEPHEW', 'A012', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `relationships` VALUES (13, 'NIECE', 'A013', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `relationships` VALUES (14, 'FRIEND', 'A014', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `relationships` VALUES (15, 'OTHER', 'A999', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for results
-- ----------------------------
DROP TABLE IF EXISTS `results`;
CREATE TABLE `results`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `role_id` int(11) NULL DEFAULT NULL,
  `stage` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of results
-- ----------------------------
INSERT INTO `results` VALUES (1, 'PROCESS', 5, 'DELIVER', 'A001', '2019-08-13 21:18:26', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `results` VALUES (2, 'DELIVERED TO ADMIN', 5, 'DELIVER', 'A002', '2019-08-13 21:19:07', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `results` VALUES (3, 'VERIFIED BY ADMIN', 4, 'DELIVER', 'A003', '2019-08-13 21:19:25', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `results` VALUES (4, 'PENDING BY ADMIN', 4, 'DELIVER', 'A004', '2019-08-13 21:19:35', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `results` VALUES (5, 'DELIVERED TO OSC', 4, 'DELIVER', 'A005', '2019-08-14 13:50:06', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `results` VALUES (6, 'VERIFIED BY OSC', 3, 'DELIVER', 'A006', '2019-08-14 13:50:33', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `results` VALUES (7, 'PENDING BY OSC', 3, 'DELIVER', 'A007', '2019-08-14 13:51:40', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `results` VALUES (8, 'DELIVERED TO HIGH COMMISSION', 3, 'DELIVER', 'A008', '2019-08-14 13:51:55', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `results` VALUES (9, 'VERIFIED BY HIGH COMMISSION', 2, 'DELIVER', 'A009', '2019-08-14 13:54:30', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `results` VALUES (10, 'APPROVED BY HIGH COMMISSION', 2, 'APPROVE', 'A010', '2019-08-14 13:55:12', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `results` VALUES (11, 'REJECTED BY HIGH COMMISSION', 2, 'REJECT', 'A011', '2019-08-14 13:56:32', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `results` VALUES (12, 'PENDING BY HIGH COMMISSION', 2, 'PENDING', 'A012', '2019-08-14 13:56:54', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `results` VALUES (13, 'RETURNED TO OSC', 2, 'RETURN', 'A013', '2019-08-14 13:57:22', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `results` VALUES (14, 'VERIFIED BY OSC', 2, 'RETURN', 'A014', '2019-08-14 13:58:22', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `results` VALUES (15, 'RETURNED TO ADMIN', 3, 'RETURN', 'A015', '2019-08-14 21:29:55', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `results` VALUES (16, 'VERIFIED BY ADMIN', 3, 'RETURN', 'A016', '2019-09-11 16:18:53', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `results` VALUES (17, 'RETURNED TO BRANCH', 4, 'RETURN', 'A017', '2019-09-11 16:19:26', 1, NULL, NULL, 'ACTIVE');
INSERT INTO `results` VALUES (18, 'VERIFIED BY BRANCH', 4, 'RETURN', 'A018', '2019-09-11 16:19:51', 1, NULL, NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'ADMINISTRATOR', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `roles` VALUES (2, 'HIGH COMMISSION', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `roles` VALUES (3, 'ONE STOP CENTRE', 'A003', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `roles` VALUES (4, 'ADMIN', 'A004', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `roles` VALUES (5, 'BRANCH', 'A005', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for sequences
-- ----------------------------
DROP TABLE IF EXISTS `sequences`;
CREATE TABLE `sequences`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
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
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sequences
-- ----------------------------
INSERT INTO `sequences` VALUES (1, 'SEQUENCE_ADMINISTRATOR', 'S', 1, 65, 90, 1, 99999, 65, 65, 65, 65, 65, 1, 0);
INSERT INTO `sequences` VALUES (2, 'SEQUENCE_OSC', 'O', 1, 65, 90, 1, 99999, 65, 65, 65, 65, 65, 1, 0);
INSERT INTO `sequences` VALUES (3, 'SEQUENCE_ADMIN', 'A', 1, 65, 90, 1, 99999, 65, 65, 65, 65, 65, 2, 0);
INSERT INTO `sequences` VALUES (4, 'SEQUENCE_BRANCH', 'B', 1, 65, 90, 1, 99999, 65, 65, 65, 65, 65, 4, 0);
INSERT INTO `sequences` VALUES (5, 'SEQUENCE_HIGHCOMM', 'H', 1, 65, 90, 1, 99999, 65, 65, 65, 65, 65, 1, 0);
INSERT INTO `sequences` VALUES (6, 'SEQUENCE_TRANSACTION', 'T', 1, 65, 90, 1, 99999, 65, 65, 65, 65, 65, 0, 0);
INSERT INTO `sequences` VALUES (7, 'SEQUENCE_APPLICANT', 'P', 1, 65, 90, 1, 99999, 65, 65, 65, 65, 65, 0, 0);
INSERT INTO `sequences` VALUES (8, 'SEQUENCE_RECEIPT', 'R', 1, 65, 90, 1, 99999, 65, 65, 65, 65, 65, 0, 0);
INSERT INTO `sequences` VALUES (9, 'SEQUENCE_VISA', 'V', 1, 65, 90, 1, 99999, 65, 65, 65, 65, 65, 0, 0);
INSERT INTO `sequences` VALUES (10, 'SEQUENCE_COMPANY', 'C', 1, 65, 90, 1, 99999, 65, 65, 65, 65, 65, 9, 0);

-- ----------------------------
-- Table structure for statuses
-- ----------------------------
DROP TABLE IF EXISTS `statuses`;
CREATE TABLE `statuses`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of statuses
-- ----------------------------
INSERT INTO `statuses` VALUES (1, 'YES', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `statuses` VALUES (2, 'NO', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `profile_id` int(11) NULL DEFAULT NULL,
  `role_id` int(11) NULL DEFAULT NULL,
  `branch_id` int(11) NULL DEFAULT NULL,
  `admin_id` int(11) NULL DEFAULT NULL,
  `status_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'ADMINISTRATOR', '202cb962ac59075b964b07152d234b70', 1, 1, 1, 1, 1, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `users` VALUES (2, 'HIGHCOMM', '202cb962ac59075b964b07152d234b70', 2, 2, 2, 2, 1, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `users` VALUES (3, 'OSC', '202cb962ac59075b964b07152d234b70', 3, 3, 3, 3, 1, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `users` VALUES (4, 'ADMIN1', '202cb962ac59075b964b07152d234b70', 4, 4, 4, 4, 1, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `users` VALUES (5, 'BRANCH11', '202cb962ac59075b964b07152d234b70', 5, 5, 5, 4, 1, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `users` VALUES (6, 'BRANCH12', '202cb962ac59075b964b07152d234b70', 6, 5, 6, 4, 1, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `users` VALUES (7, 'ADMIN2', '202cb962ac59075b964b07152d234b70', 7, 4, 7, 5, 1, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `users` VALUES (8, 'BRANCH21', '202cb962ac59075b964b07152d234b70', 8, 5, 8, 5, 1, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `users` VALUES (9, 'BRANCH22', '202cb962ac59075b964b07152d234b70', 9, 5, 9, 5, 1, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for visas
-- ----------------------------
DROP TABLE IF EXISTS `visas`;
CREATE TABLE `visas`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of visas
-- ----------------------------
INSERT INTO `visas` VALUES (1, 'VDR', 'VISA WITH REFERENCE', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `visas` VALUES (2, 'VTR', 'VISA WITHOUT REFERENCE', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `visas` VALUES (3, 'OTH', 'OTHER', 'A999', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');

SET FOREIGN_KEY_CHECKS = 1;
