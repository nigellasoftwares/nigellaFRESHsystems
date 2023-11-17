/*
 Navicat Premium Data Transfer

 Source Server         : Local 3306 - MySQL
 Source Server Type    : MySQL
 Source Server Version : 80017
 Source Host           : localhost:3306
 Source Schema         : fresh_medical

 Target Server Type    : MySQL
 Target Server Version : 80017
 File Encoding         : 65001

 Date: 07/04/2023 09:04:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for applicants
-- ----------------------------
DROP TABLE IF EXISTS `applicants`;
CREATE TABLE `applicants`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `given_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `middle_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `birth_date` date NULL DEFAULT NULL,
  `gender_id` int(11) NULL DEFAULT NULL,
  `nationality_id` int(11) NULL DEFAULT NULL,
  `job_id` int(11) NULL DEFAULT NULL,
  `address1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address3` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `district` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `contact_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `employer_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `employer_address1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `employer_address2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `employer_address3` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `employer_district` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `employer_contact_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `passport_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `passport_status_id` int(11) NULL DEFAULT NULL,
  `passport_issue_date` date NULL DEFAULT NULL,
  `passport_expiry_date` date NULL DEFAULT NULL,
  `passport_issue_place` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `passport_entry_point` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `passport_upload` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `birth_upload` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `marriage_upload` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `national_upload` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `other_upload` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `is_synchronize` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  `nextofkin_given_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nextofkin_middle_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nextofkin_last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nextofkin_address1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nextofkin_address2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nextofkin_address3` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nextofkin_district` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nextofkin_relation_id` int(11) NULL DEFAULT NULL,
  `nextofkin_gender_id` int(11) NULL DEFAULT NULL,
  `nextofkin_nationality_id` int(11) NULL DEFAULT NULL,
  `nextofkin_birth_date` date NULL DEFAULT NULL,
  `nextofkin_contact_number` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of applicants
-- ----------------------------
INSERT INTO `applicants` VALUES (2, '26D8714D-3186-5F4C-18BA-7896C14EC8EA', 'MATT', 'DOUGLAS', 'DAMON', '1990-07-01', 75, 45, 67, 'HOME PARK', 'ROAD 1', '', 'DHAKA', '123', 'GERBANG MAJU SDN BHD', '123', 'JALAN 1', '', 'KUALA LUMPUR', '123', 'BM21002101', 91, '2021-12-01', '2022-11-30', 'BANGLADESH', 'KUALA LUMPUR', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'OFFLINE', 1, '2022-01-10 08:00:00', 2, '2022-01-10 10:00:00', NULL, 'ACTIVE', 'RICHARD', 'STEWARD', 'DAMON', 'HOME PARK', 'ROAD 1', '', 'BANGLADESH', 81, 75, 45, '1992-03-25', '123');
INSERT INTO `applicants` VALUES (7, '4BF570A1-973A-9097-83A8-D94FE20F794C', 'RACHEL', 'MAY', 'ROBINSSON', '1992-03-12', 76, 45, 73, 'HOME PARK 3, HARMONY ROAD', NULL, NULL, 'DHAKA', '+880 (2) 963 2764', 'GERBANG TINGGI SDN BHD', 'UNIT 2-1-12', 'PUSAT PERDAGANGAN BERJAYA', 'JALAN TUN RAZAK', 'KUALA LUMPUR', '0321012201', 'BM412243516', 91, '2022-12-01', '2022-11-30', 'BANGLADESH', 'KUALA LUMPUR', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'OFFLINE', 1, '2023-04-06 16:17:28', 2, '2023-04-06 16:17:28', 2, 'ACTIVE', 'ALBERT ELVIS ROBINSSON', NULL, NULL, NULL, NULL, NULL, 'BANGLADESH', 81, NULL, 45, NULL, '+880 (2) 981 2725');
INSERT INTO `applicants` VALUES (8, '0AAA1C0F-9576-1EEA-3CC2-9A2B44A69F0A', 'MICHAEL', 'EDWARD', 'DARRICK', '1989-07-06', 75, 45, 68, '0112', 'HOME PARK', '', 'DHAKA', '0112223333', 'TEGUH MAJU', '12', 'PUSAT PERNIAGAAN SELASIH', 'SETAPAK', 'KUALA LUMPUR', '0112342233', 'AA334544', 91, '2023-04-05', '2024-04-04', 'DHAKA', 'KUALA LUMPUR', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'OFFLINE', 1, '2023-04-06 16:32:55', 2, NULL, NULL, 'ACTIVE', 'TIMOLTHY', 'SIMON', 'ALEXI', '0112', 'HOME PARK', '', 'DHAKA', 90, 75, 45, '1989-10-24', '0112223334');

-- ----------------------------
-- Table structure for balances
-- ----------------------------
DROP TABLE IF EXISTS `balances`;
CREATE TABLE `balances`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `agent_id` int(11) NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `amount` double NULL DEFAULT NULL,
  `updated_date` date NULL DEFAULT NULL,
  `remark` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `status_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of balances
-- ----------------------------
INSERT INTO `balances` VALUES (2, 'BB01A6DB-103B-9C3E-264B-88C16EF1B4DA', 2, 'TRANSACTION', 'TOP-UP APPROVED BY R18AAA0001 ON 2019-05-05 13:05:01', 2000, '2022-01-10', NULL, 137, '2022-01-10 08:00:00', 2, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `balances` VALUES (3, '26D8714D-3186-5F4C-18BA-7896C14EC8EA', 2, 'REGISTRATION', 'RECEIPT R19AAA0001 ON 2019-05-05 14:23:59', 100, '2022-01-10', NULL, 137, '2022-01-10 08:00:00', 2, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `balances` VALUES (4, 'DD99304C-39A5-E14D-C69E-8450C001AD85', 2, 'REGISTRATION', 'RECEIPT R19AAA0002 ON 2019-05-05 15:26:31', 100, '2022-01-10', NULL, 137, '2022-01-10 08:00:00', 2, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `balances` VALUES (5, '065FCB54-9643-A26A-F1E5-2237B5B98ECB', 2, 'TRANSACTION', 'TOPPED UP BY A18AAA0001 AGENT1', 1000, '2022-01-10', NULL, 138, '2022-01-10 08:00:00', 2, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `balances` VALUES (6, '8FC960DC-D511-3126-5505-FB700F1CB571', 2, 'REGISTRATION', 'RECEIPT R19AAA0003 ON 2019-05-08 06:35:22', 100, '2022-01-10', NULL, 137, '2022-01-10 08:00:00', 2, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `balances` VALUES (7, '0AAA1C0F-9576-1EEA-3CC2-9A2B44A69F0A', 2, 'REGISTRATION', 'RECEIPT R23AAA0004 ON 2023-04-06 16:32:55', 100, '2023-04-06', NULL, 137, '2023-04-06 16:32:55', 2, NULL, NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for dependants
-- ----------------------------
DROP TABLE IF EXISTS `dependants`;
CREATE TABLE `dependants`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `applicant_id` int(11) NULL DEFAULT NULL,
  `given_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `middle_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `birth_date` date NULL DEFAULT NULL,
  `gender_id` int(11) NULL DEFAULT NULL,
  `nationality_id` int(11) NULL DEFAULT NULL,
  `address1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address3` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `district_id` int(11) NULL DEFAULT NULL,
  `contact_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `relation_id` int(11) NULL DEFAULT NULL,
  `passport_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `passport_status_id` int(11) NULL DEFAULT NULL,
  `passport_issue_date` date NULL DEFAULT NULL,
  `passport_expiry_date` date NULL DEFAULT NULL,
  `passport_issue_place` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `passport_entry_point` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `passport_upload` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `birth_upload` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `marriage_upload` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `imm13_upload` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `other_upload` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `is_synchronize` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for doctorcertifies
-- ----------------------------
DROP TABLE IF EXISTS `doctorcertifies`;
CREATE TABLE `doctorcertifies`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(11) NULL DEFAULT NULL,
  `doctor_id` int(11) NULL DEFAULT NULL,
  `certify_date` date NULL DEFAULT NULL,
  `hiv` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tuberculosis` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `malaria` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `leprosy` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `std` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hepatitis` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cancer` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `epilepsy` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `psychiatric` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `others` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pregnant` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `opiates` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cannabis` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `others_comment` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `result` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `reason_comment` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `office` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `office_date` date NULL DEFAULT NULL,
  `government` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `government_date` date NULL DEFAULT NULL,
  `private` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `private_date` date NULL DEFAULT NULL,
  `treating` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `treating_date` date NULL DEFAULT NULL,
  `another` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `another_date` date NULL DEFAULT NULL,
  `status_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of doctorcertifies
-- ----------------------------
INSERT INTO `doctorcertifies` VALUES (2, 1, 3, '2022-01-11', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', NULL, 'NO', 'NO', '', 'YES', '', 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 1, '2022-01-10 08:00:00', 3, '2022-01-11 07:47:17', 3, 'ACTIVE');
INSERT INTO `doctorcertifies` VALUES (7, 6, 3, '2023-04-07', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', NULL, 'NO', 'NO', '', 'YES', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-04-07 07:39:25', 3, NULL, NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for doctorexams
-- ----------------------------
DROP TABLE IF EXISTS `doctorexams`;
CREATE TABLE `doctorexams`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(11) NULL DEFAULT NULL,
  `doctor_id` int(11) NULL DEFAULT NULL,
  `exam_date` date NULL DEFAULT NULL,
  `height` int(11) NULL DEFAULT NULL,
  `weight` int(11) NULL DEFAULT NULL,
  `pulse` int(11) NULL DEFAULT NULL,
  `bp_systolic` int(11) NULL DEFAULT NULL,
  `bp_diastolic` int(11) NULL DEFAULT NULL,
  `menstrual_date` date NULL DEFAULT NULL,
  `skinrash` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `anaesthetic` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `deformites` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pallor` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jaundice` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `lymph` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `vis_unaided_right` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `vis_unaided_left` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `vis_aided_right` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `vis_aided_left` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hear_right` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hear_left` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `others_general` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `comment_general` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `hiv` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hiv_date` date NULL DEFAULT NULL,
  `tuber` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tuber_date` date NULL DEFAULT NULL,
  `leprosy` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `leprosy_date` date NULL DEFAULT NULL,
  `viral` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `viral_date` date NULL DEFAULT NULL,
  `psychiatric` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `psychiatric_date` date NULL DEFAULT NULL,
  `epilepsy` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `epilepsy_date` date NULL DEFAULT NULL,
  `cancer` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cancer_date` date NULL DEFAULT NULL,
  `std` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `std_date` date NULL DEFAULT NULL,
  `malaria` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `malaria_date` date NULL DEFAULT NULL,
  `hypertension` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hypertension_date` date NULL DEFAULT NULL,
  `heart_disease` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `heart_disease_date` date NULL DEFAULT NULL,
  `asthma` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `asthma_date` date NULL DEFAULT NULL,
  `diabetes` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `diabetes_date` date NULL DEFAULT NULL,
  `ulcer` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ulcer_date` date NULL DEFAULT NULL,
  `kidney` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kidney_date` date NULL DEFAULT NULL,
  `others_history` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `others_history_date` date NULL DEFAULT NULL,
  `drugs` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `comment_history` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `cardio_heartsize` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `cardio_heartsound` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cardio_other` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `res_breath` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `res_other` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `abdomen_liver` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `abdomen_spleen` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `abdomen_swelling` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `abdomen_lymph` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `abdomen_rectal` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nerv_mental` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nerv_speech` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nerv_cognitive` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nerv_size` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `nerv_motor` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nerv_sensor` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nerv_reflex` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `gen_kidney` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `gen_discharge` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `gen_sores` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `comment_gen` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `status_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of doctorexams
-- ----------------------------
INSERT INTO `doctorexams` VALUES (2, 1, 3, '2023-03-30', 165, 65, 68, 110, 88, NULL, 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', '', 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', '', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', '', 1, '2022-01-10 08:00:00', 3, '2022-01-11 07:47:00', 3, 'ACTIVE');
INSERT INTO `doctorexams` VALUES (8, 6, 3, '2023-04-02', 170, 50, 65, 118, 82, NULL, 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', '', 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', NULL, 'NO', '', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', '', 1, '2023-04-07 07:07:14', 3, '2023-04-07 07:12:43', 3, 'ACTIVE');

-- ----------------------------
-- Table structure for labexams
-- ----------------------------
DROP TABLE IF EXISTS `labexams`;
CREATE TABLE `labexams`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(11) NULL DEFAULT NULL,
  `doctor_id` int(11) NULL DEFAULT NULL,
  `overdue` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `specimen_date` date NULL DEFAULT NULL,
  `blood_group` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `blood_group_rh` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `blood_hiv` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `blood_hbsag` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `blood_vdrl` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `blood_tpha` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `blood_malaria` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `urine_opiates` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `urine_cannabis` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `urine_pregnancy` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `urine_color` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `urine_gravity` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `urine_sugar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `urine_sugar_level` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `urine_sugar_moles` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `urine_albumin` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `urine_albumin_level` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `urine_albumin_moles` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `urine_microscopic` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `reason_if_abnormal` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `report_date` date NULL DEFAULT NULL,
  `certify` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `read` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of labexams
-- ----------------------------
INSERT INTO `labexams` VALUES (2, 1, 3, NULL, '2022-01-10', 'A', '+ve', 'NO', 'NO', 'NO', NULL, 'NO', 'NO', 'NO', NULL, 'NO', 'NO', 'NO', NULL, NULL, 'NO', NULL, NULL, 'NO', '', '2022-01-11', 'YES', 'YES', 1, '2022-01-10 08:00:00', 3, '2022-01-11 07:47:08', 3, 'ACTIVE');
INSERT INTO `labexams` VALUES (3, 6, 3, NULL, '2023-04-03', 'A', '+ve', 'NO', 'NO', 'NO', NULL, 'NO', 'NO', 'NO', NULL, 'NO', 'NO', 'NO', NULL, NULL, 'NO', NULL, NULL, 'NO', '', '2023-04-07', 'YES', 'YES', 1, '2023-04-07 07:10:21', 3, '2023-04-07 07:10:21', 3, 'ACTIVE');

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
  `company` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of profiles
-- ----------------------------
INSERT INTO `profiles` VALUES (1, 'S18AAA0001', 'ADMIN', 'ADMINISTRATOR', 'ADMIN', 'EBFBMS ADMIN', NULL, 1, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `profiles` VALUES (2, 'A18AAA0001', 'AGENT', 'AGENT1', 'AGENT', 'AGENT1', NULL, 1, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `profiles` VALUES (3, 'D19AAA0001', 'DOCTOR', 'DR. AHMAD JAFRI BIN HAKIM', 'DOCTOR', 'AHMAD MEDICAL CENTRE', NULL, 1, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `profiles` VALUES (4, 'A18AAA0002', 'AGENT', 'AGENT2', 'AGENT', 'AGENT2', NULL, 1, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `profiles` VALUES (5, 'D19AAA0002', 'DOCTOR', 'DR. MICHAEL', 'DOCTOR', 'DIAMOND MEDICAL CENTRE', NULL, 1, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `profiles` VALUES (6, 'D19AAA0003', 'DOCTOR', 'DR. TONY', 'DOCTOR', 'TONY MEDICAL CENTRE', NULL, 1, '2022-01-10 08:00:00', 1, '2022-01-10 08:00:00', NULL, 'ACTIVE');

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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sequences
-- ----------------------------
INSERT INTO `sequences` VALUES (1, 'SEQUENCE_ADMIN', 'S', 1, 65, 90, 1, 99999, 65, 65, 65, 65, 65, 1, 0);
INSERT INTO `sequences` VALUES (2, 'SEQUENCE_AGENT', 'A', 1, 65, 90, 1, 99999, 65, 65, 65, 65, 65, 1, 0);
INSERT INTO `sequences` VALUES (3, 'SEQUENCE_TOPUP', 'T', 1, 65, 90, 1, 99999, 65, 65, 65, 65, 65, 0, 0);
INSERT INTO `sequences` VALUES (4, 'SEQUENCE_DOCTOR', 'D', 1, 65, 90, 1, 99999, 65, 65, 65, 65, 65, 3, 0);
INSERT INTO `sequences` VALUES (5, 'SEQUENCE_RECEIPT', 'R', 1, 65, 90, 1, 99999, 65, 65, 65, 65, 65, 4, 0);

-- ----------------------------
-- Table structure for statuses
-- ----------------------------
DROP TABLE IF EXISTS `statuses`;
CREATE TABLE `statuses`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `initial` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  `amount` double NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 144 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of statuses
-- ----------------------------
INSERT INTO `statuses` VALUES (1, '7A0FAFDA-FE6F-B816-A319-BA43B5F1EE94', 'YES', 'YES', 'ALL', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (2, 'BFE87D5C-7C80-F719-F6E8-D42797B60564', 'NO', 'NO', 'ALL', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (3, 'AF65AE7D-FE11-5BCE-C960-11522144682B', 'ADMIN', 'ADM', 'ROLE', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (4, 'ACFCC486-AEAD-B3F3-F98B-25CB9B5D8EA9', 'AGENT', 'AGN', 'ROLE', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (5, '8ABDAB80-9E59-B191-B9DE-0E53B3B549DD', 'SABAH', 'SBH', 'STATE', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (6, 'B755BC54-3108-1984-EAC4-0090E10FFF50', 'BANDAR CENDERAWASIH', 'BCD', 'DISTRICT', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (7, '8436A6EA-B856-AB88-877F-326E79A5C308', 'BEAUFORT', 'BFT', 'DISTRICT', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (8, 'A1106FEA-4193-08D5-C04D-6907986471E3', 'BEAUFORT (MEMBAKUT)', 'BFM', 'DISTRICT', 'A003', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (9, '7D93022E-FBB6-4CF0-700C-5CB04106949E', 'BELURAN', 'BLR', 'DISTRICT', 'A004', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (10, 'B1D894BD-BC1B-E543-FD36-CDEA27A28183', 'CHECK POINT MILE 32', 'CPM', 'DISTRICT', 'A005', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (11, '280D9ACE-901C-31B6-E59A-1FFE4F96E819', 'FELDA SAHABAT', 'SHB', 'DISTRICT', 'A006', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (12, '6B057A13-89BF-F3F9-8039-B401149F5597', 'KALABAKAN', 'KBK', 'DISTRICT', 'A007', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (13, '1CAE3A37-EE40-D369-59B6-52B91D0400A1', 'KENINGAU', 'KNG', 'DISTRICT', 'A008', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (14, '5BFB410D-A25B-802A-E75B-6C4808D3627F', 'KINABATANGAN', 'KBN', 'DISTRICT', 'A009', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (15, '78BF5E95-BBB0-7D17-DFCD-D75F4156EA0A', 'KOTA BELUD', 'KBD', 'DISTRICT', 'A010', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (16, '85C4B9AA-51E6-6D7B-C643-8BC500F1D174', 'KOTA KINABALU', 'KBU', 'DISTRICT', 'A011', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (17, 'D65A1E9D-E19B-0562-76FF-89D81798D6F0', 'KOTA MARUDU', 'KMU', 'DISTRICT', 'A012', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (18, '4446D438-9816-ADD6-F675-C31215371109', 'KUDAT', 'KDT', 'DISTRICT', 'A013', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (19, '2E088C8F-ACCB-F87C-0588-E2F21BDB982D', 'KUNAK', 'KNK', 'DISTRICT', 'A014', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (20, 'A1E77DFD-1434-A366-B1E3-B819B1BC2208', 'LABUK SUGUT', 'LSG', 'DISTRICT', 'A015', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (21, 'C1C44670-CE4A-7DB6-70B4-0A2DCC1B2092', 'LAHAD DATU', 'LHD', 'DISTRICT', 'A016', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (22, '4D7012E7-8A48-A134-DC55-051622D0FE1B', 'LAHAD DATU (IOI)', 'IOI', 'DISTRICT', 'A017', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (23, '72705E0A-D10C-DAB3-20E2-F13752AA9118', 'LAHAD DATU (LEEPANG ESTATE)', 'LHL', 'DISTRICT', 'A018', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (24, '5520F600-3DEA-A967-60ED-FED740482920', 'LOK KAWI', 'LKW', 'DISTRICT', 'A019', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (25, 'F376DD33-48C8-847E-AA6A-333617D70412', 'NANGOH', 'NGH', 'DISTRICT', 'A020', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (26, '8304592F-DE58-AC96-443E-775574316686', 'PAMOL', 'PML', 'DISTRICT', 'A021', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (27, '7285EA96-B2E3-E74E-18DD-BC9ED50339C3', 'PANTAI BARAT UTARA DAN SELATAN', 'PBS', 'DISTRICT', 'A022', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (28, 'F8A3ADF6-5E1F-39A9-153D-53B5F7F5A1D4', 'PAPAR', 'PPR', 'DISTRICT', 'A023', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (29, 'DB065448-2DFB-B003-C79F-BCD217E46179', 'PENAMPANG', 'PNP', 'DISTRICT', 'A024', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (30, '09F6B25F-DAC5-2890-5AB0-538ED97BCF17', 'PENDALAMAN', 'PDL', 'DISTRICT', 'A025', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (31, '290395C4-F05E-23E6-6EA2-87BE1DBD3736', 'PUTATAN', 'PTT', 'DISTRICT', 'A026', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (32, 'EA4AF356-6FE9-D5FF-03F2-A77217586B62', 'RANAU', 'RAN', 'DISTRICT', 'A027', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (33, '07274516-EAB1-811F-CA34-8B0266EAFA6C', 'SANDAKAN', 'SDK', 'DISTRICT', 'A028', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (34, 'BE90BC95-4C1A-D00A-1C41-EB4EAC8A536B', 'SEMPORNA', 'SPR', 'DISTRICT', 'A029', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (35, '459E9667-1E1C-BBDB-1257-6F6DE44005A1', 'SIPITANG', 'SPT', 'DISTRICT', 'A030', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (36, 'D4D3B4F3-F922-E38B-6E62-B75DBFA09F9B', 'SOOK', 'SOK', 'DISTRICT', 'A031', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (37, 'DBC3A6A7-3995-6CB7-D624-23046FDCB2C4', 'SUNGEI SEGAMA', 'SSG', 'DISTRICT', 'A032', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (38, 'D90DFC59-E38F-96EE-DBFF-8FCA5505BCB5', 'TAMBUNAN', 'TBN', 'DISTRICT', 'A033', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (39, '60927C9B-4D17-8615-07EB-7DC18C379AED', 'TAWAU', 'TWU', 'DISTRICT', 'A034', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (40, '05D7055C-CA6F-47DA-7B7E-32AF1D444634', 'TELUPID', 'TPD', 'DISTRICT', 'A035', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (41, '73438998-C7D4-4107-92DE-0CBA36EF4683', 'TENOM', 'TNM', 'DISTRICT', 'A036', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (42, '67CA032D-13C2-858C-87AE-BDEC4389B0C5', 'TUARAN', 'TRN', 'DISTRICT', 'A037', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (43, '495B55F7-45DF-F113-FEA4-C9C894D7CEB4', 'TUNG HUP', 'TGH', 'DISTRICT', 'A038', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (44, '268E1E79-AD84-5387-CBFF-0718A2EFFC8A', 'UMAS UMAS', 'UMS', 'DISTRICT', 'A039', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (45, 'ABDF32D5-C873-C131-0DE2-DB50DD902CDC', 'BANGLADESH', 'BGD', 'NATIONAL', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (46, '78F275E4-4B2C-9B20-C815-640BC13BC521', 'CAMBODIA', 'KHM', 'NATIONAL', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (47, '5FBFF5C5-EB0E-8314-10EB-5C8A57CDC03B', 'CHINA', 'CHN', 'NATIONAL', 'A003', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (48, '7CA99DDC-68DC-A5AF-7A5C-CFB674D6418D', 'HONG KONG', 'HKG', 'NATIONAL', 'A004', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (49, 'E1C590DC-3327-A32D-C02C-D264A3E90782', 'INDONESIA', 'IDN', 'NATIONAL', 'A005', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (50, '8BFFC5E5-E807-45F5-8675-CB940EE7E188', 'INDIA', 'IND', 'NATIONAL', 'A006', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (51, '146A92CA-7611-414E-0CB3-DB3EC4753DB6', 'JAPAN', 'JPN', 'NATIONAL', 'A007', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (52, '2ACFF0BB-E669-2FC4-8D37-4609BAB76AE4', 'KOREA', 'KOR', 'NATIONAL', 'A008', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (53, '388B54C2-30AF-D673-ADE6-78A0C49C5F33', 'KYRGYZ REPUBLIC', 'KGZ', 'NATIONAL', 'A009', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (54, '5C2B4F83-7621-7FFB-D9BE-7DC2433D60E5', 'LAOS', 'LAO', 'NATIONAL', 'A010', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (55, '2A25D092-6674-CD5E-13B9-131765769B6C', 'MYANMAR', 'MMR', 'NATIONAL', 'A011', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (56, '8ED97055-27F8-15BC-5E6C-F9F99C396303', 'NEPAL', 'NPL', 'NATIONAL', 'A012', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (57, '2161776B-22F4-7FDE-8A34-FBEFFC2FC9D3', 'NEW ZEALAND', 'NZL', 'NATIONAL', 'A013', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (58, '67AF6303-CA4C-560F-FC82-3FB9A423D217', 'PAKISTAN', 'PAK', 'NATIONAL', 'A014', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (59, 'DA52DD41-EC29-35CD-CB68-053F402AD84D', 'PHILIPPINES', 'PHL', 'NATIONAL', 'A015', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (60, 'ECC7831F-AA67-8EFD-BA38-F94E758F5C5E', 'SINGAPORE', 'SGP', 'NATIONAL', 'A016', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (61, 'D46BB1E9-EB7D-166E-883D-41741D89A8CD', 'SRI LANKA', 'LKA', 'NATIONAL', 'A017', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (62, '2153672D-EDA5-8D2F-69A7-F3D3281FC92D', 'SYRIAN ARAB REPUBLIC', 'SYR', 'NATIONAL', 'A018', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (63, '76AAC8CA-B957-415F-920B-E8EC2B0CC2A3', 'THAILAND', 'THA', 'NATIONAL', 'A019', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (64, 'F80E6266-219A-377D-3817-AD735D7C7771', 'UNITED STATES OF AMERICA', 'USA', 'NATIONAL', 'A020', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (65, '8564DBA2-81EE-C6AD-59A1-E06C1FDCBD97', 'UZBEKISTAN', 'UZK', 'NATIONAL', 'A021', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (66, 'DE06CCD1-750A-0762-E760-A53423E38FD9', 'VIETNAM', 'VNM', 'NATIONAL', 'A022', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (67, '5539154C-7A75-B119-9F8B-C3D176C73912', 'AGRICULTURE', 'AGR', 'JOB', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (68, '1F38C879-7DF7-8685-D6C1-9FE2E5A432EB', 'CONSTRUCTION', 'CON', 'JOB', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (69, 'D8B6536A-A762-0EB5-0A89-212021BBF64F', 'DOMESTIC', 'DOM', 'JOB', 'A003', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (70, '15D6F432-0243-723D-C671-6C4480774C2B', 'ESTATE', 'EST', 'JOB', 'A004', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (71, '2E9A066F-99EA-D94C-1A32-6C83EF5BE4D3', 'MANUFACTURING', 'MAN', 'JOB', 'A005', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (72, '52E7364A-8D35-18E8-9833-F907F03D9BCE', 'PLANTATION', 'PLA', 'JOB', 'A006', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (73, 'E327E127-71FA-6ABE-DD81-FB9D02AAC5E3', 'SERVICES', 'SER', 'JOB', 'A007', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (74, '5A1E621B-538D-31E4-3F5D-A607FC0FAD9A', 'OTHERS', 'OTH', 'JOB', 'A999', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (75, 'C6EAA9E2-9236-CFEF-6E98-FEB66652680A', 'MALE', 'MAL', 'GENDER', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (76, '65899AFD-A361-2CA1-7FFA-D02E3538D0CD', 'FEMALE', 'FEM', 'GENDER', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (77, 'C828B85A-2E94-D5F1-FCDB-6011506F0ED0', 'HUSBAND', 'HUS', 'RELATION', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (78, 'D1847A1E-3738-DFC7-E5FC-0A303296C5EB', 'WIFE', 'WIF', 'RELATION', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (79, 'C2CA3147-C4FB-64AE-79D3-CCD9DA030153', 'FATHER', 'FAT', 'RELATION', 'A003', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (80, 'BB6FBDEC-CA28-9A2C-D2FA-F8CBDEAC31A6', 'MOTHER', 'MOT', 'RELATION', 'A004', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (81, 'A3480932-91BF-E53C-EF7F-C24B079D4B75', 'BROTHER', 'BRO', 'RELATION', 'A005', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (82, '499FDC05-F2EB-D68A-530B-5A3FBBF9C3A6', 'SISTER', 'SIS', 'RELATION', 'A006', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (83, '073787C5-6F02-0158-1B70-2F76DDF3056E', 'SON', 'SON', 'RELATION', 'A007', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (84, '984D9E40-275C-DA73-3679-ED262FFF3461', 'DAUGHTER', 'DAU', 'RELATION', 'A008', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (85, '13AEC51B-5E9A-4FD5-933E-67766ABE7E01', 'COUSIN', 'COU', 'RELATION', 'A009', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (86, '1804901C-C73B-CC75-DF8B-C6EFF068DBDA', 'UNCLE', 'UNC', 'RELATION', 'A010', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (87, 'ACE3C697-387D-B8FE-42AF-A4E263FD90AE', 'AUNT', 'AUN', 'RELATION', 'A011', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (88, '58C91B60-02B2-C09E-6619-AF3E1AB48DF5', 'NEPHEW', 'NEP', 'RELATION', 'A012', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (89, '2D343357-504D-BD0C-84B2-75834B9D584B', 'NIECE', 'NIE', 'RELATION', 'A013', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (90, '5AB8C3F4-3EE7-BD96-ECF2-B2CB49FEA65B', 'OTHERS', 'OTH', 'RELATION', 'A999', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (91, 'C6D1AA7A-FD76-053E-49AF-EC429D26DBBE', 'VALID', 'VAL', 'PASSPORT', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (92, '9A429DE6-B408-7125-C179-57CBA06629FF', 'EXPIRED', 'EXP', 'PASSPORT', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (93, '3B3C0DC1-9DFB-68BA-BB9B-631B951E7325', '0', '0', 'DEPENDANT', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (94, '1A156C95-2F1C-0145-4CBB-88216085518E', '1', '1', 'DEPENDANT', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (95, 'FA896E45-C3FC-C4FB-13C5-3A7AB04633A5', '2', '2', 'DEPENDANT', 'A003', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (96, '55963002-9A94-A16A-5144-7309CCDF20D3', '3', '3', 'DEPENDANT', 'A004', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (97, 'F301A537-D47C-7433-6EF2-D3BA24385D16', '4', '4', 'DEPENDANT', 'A005', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (98, '538DD65A-137E-7759-324D-43783B73EDC9', '5', '5', 'DEPENDANT', 'A006', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (99, 'B308F5B0-ACCA-796F-DFFF-DB2EAF2C7B8D', 'AFFIN BANK', 'AFF', 'BANK', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (100, '2D6192D8-8E28-23ED-A446-170E4D201209', 'AFFIN ISLAMIC BANK', 'AFI', 'BANK', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (101, '57780257-42F6-AD43-338A-238E6FF17ADE', 'AL RAJHI BANK', 'ALR', 'BANK', 'A003', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (102, '3EFFA5E3-1EA4-3729-5B65-D228E45BE8FC', 'ALLIANCE BANK', 'ALB', 'BANK', 'A004', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (103, 'FDA5DD57-AD27-733A-6935-41565178CF95', 'ALLIANCE ISLAMIC BANK', 'ALI', 'BANK', 'A005', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (104, '645CC1B3-6797-B81E-F8B1-F7C84AACE411', 'AMBANK', 'AMB', 'BANK', 'A006', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (105, '7A4B3DCF-641A-9CF8-17FC-F72DB61A2290', 'AMBANK ISLAMIC BANK', 'AMI', 'BANK', 'A007', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (106, '58A63C04-2E40-B03E-2F71-D199B96DAE1C', 'BANK ISLAM', 'BIB', 'BANK', 'A008', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (107, '373386D2-9058-4E92-3FF0-E9FC448D5A1F', 'BANK MUAMALAT', 'BMM', 'BANK', 'A009', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (108, 'A25C6BC1-995E-C780-57E1-127F18830877', 'BANK RAKYAT', 'BRK', 'BANK', 'A010', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (109, 'F28F98D6-6BB2-AFDB-2A56-DD50D3E2EEE3', 'BANK SIMPANAN NASIONAL', 'BSN', 'BANK', 'A011', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (110, '335F5BE1-2D83-178D-7447-9AD6A2201EAD', 'CIMB BANK', 'CIM', 'BANK', 'A012', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (111, 'F70E0954-31A1-B31D-55CA-37F19B1CD4A4', 'CIMB ISLAMIC BANK', 'CII', 'BANK', 'A013', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (112, '26A02A18-F0B0-9909-2C7A-FB1D499FC8E9', 'CITIBANK', 'CTB', 'BANK', 'A014', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (113, 'ECDEF75E-3032-0D0D-A72A-CE66FF39E8F6', 'HONG LEONG BANK', 'HLB', 'BANK', 'A015', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (114, '498C0BBE-DFFA-6EDD-8D8E-583E4385343F', 'HONG LEONG ISLAMIC BANK', 'HLI', 'BANK', 'A016', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (115, 'B16B5271-F173-416D-2FC8-A1DF5773358D', 'HSBC BANK', 'HSB', 'BANK', 'A017', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (116, '2FDC89E4-7E56-C013-410F-78C101A58BF8', 'HSBC AMANAH', 'HSI', 'BANK', 'A018', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (117, 'D7390B9A-51B4-3784-9768-739EAF7D2803', 'KUWAIT FINANCE HOUSE BANK', 'KFH', 'BANK', 'A019', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (118, '5F53EFE6-0BE4-457F-4F71-B052DF2CBF77', 'MAYBANK', 'MBB', 'BANK', 'A020', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (119, 'F087BAF4-4894-6195-07B4-B128A796F108', 'MAYBANK ISLAMIC', 'MBI', 'BANK', 'A021', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (120, '2854B186-00E9-6510-4C5B-5EC65AF7D835', 'OCBC BANK', 'OCB', 'BANK', 'A022', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (121, '1F391917-8B9C-FE09-CE0B-66CADEEE0CD9', 'OCBC AL-AMIN BANK', 'OCI', 'BANK', 'A023', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (122, 'C12CA651-C096-0609-3F33-B107E922FD2A', 'PUBLIC BANK', 'PBB', 'BANK', 'A024', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (123, '79BB2215-B3D0-503A-3935-FC837F794ED6', 'PUBLIC ISLAMIC BANK', 'PBI', 'BANK', 'A025', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (124, '2A03430E-D243-04C4-2A03-535C93DE293E', 'RHB BANK', 'RHB', 'BANK', 'A026', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (125, 'DF110DB3-7821-D395-6534-BD4202A8687E', 'RHB ISLAMIC BANK', 'RHI', 'BANK', 'A027', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (126, 'AA20FB30-B9CC-1546-7432-43FC45A4BF85', 'STANDARD CHARTERED BANK', 'SCB', 'BANK', 'A028', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (127, 'B785598F-4000-F8EF-1A95-79757534FC29', 'STANDARD CHARTERED SAADIQ', 'SCI', 'BANK', 'A029', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (128, 'C93D4A52-EB17-4442-BFAD-5E28D5D1E9D7', 'UOA BANK', 'UOB', 'BANK', 'A030', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (129, '075D8DEB-7C3F-8E7F-C2FE-556A461BB957', 'OTHER BANK', 'OTH', 'BANK', 'A999', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'INACTIVE', NULL);
INSERT INTO `statuses` VALUES (130, '4E32C5D1-7969-523D-6530-6C0FB5BBC9F6', 'ACCOUNT #001', 'A001', 'ACCOUNT', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (131, '97597CB1-ACC8-2105-ACDB-FC5BD46A442C', 'ACCOUNT #002', 'A002', 'ACCOUNT', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (132, '778C547F-DCA2-8558-BFB4-E55EE53511B2', 'ACCOUNT #003', 'A003', 'ACCOUNT', 'A003', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (133, 'CD5741B6-B78A-AE2E-073D-8C21350D9306', 'NEW', 'NEW', 'TOPUP', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (134, '03A7E45B-3290-F0B8-20E4-521D5E77B552', 'PENDING', 'PEN', 'TOPUP', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (135, '69DE8CFD-0327-6D40-5F8C-EA6135B3BDC1', 'APPROVED', 'APP', 'TOPUP', 'A003', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (136, '7E52F40E-2A41-7419-A500-ED1FE8CA0889', 'REJECTED', 'REJ', 'TOPUP', 'A004', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (137, '94A81F99-23C3-3696-A1E0-2E66407C5478', 'SUCCESS', 'SUC', 'BALANCE', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (138, '62B78CB1-8AD8-EFBE-BBDC-3218D042840E', 'PENDING', 'PEN', 'BALANCE', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (139, '183B079A-D889-9724-0BF8-B6962355ED92', 'RESERVED', '100', 'RESERVED', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (140, 'F5685BCA-1740-DAD7-A16C-1AA4DCEA1425', 'CHECKED', '200', 'CHECKED', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (141, '3CB24C60-F747-5A1E-04C7-BFC5C0088B78', 'DOCTOR', 'DOC', 'ROLE', 'A003', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', NULL);
INSERT INTO `statuses` VALUES (142, '3CB24C60-F747-5A1E-04C7-BFC5C0088B79', 'REGISTRATION', 'REG', 'FEE', 'A001', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', 100);
INSERT INTO `statuses` VALUES (143, '3CB24C60-F747-5A1E-04C7-BFC5C0088B80', 'MEDICAL', 'MED', 'FEE', 'A002', '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE', 100);

-- ----------------------------
-- Table structure for topups
-- ----------------------------
DROP TABLE IF EXISTS `topups`;
CREATE TABLE `topups`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `agent_id` int(11) NULL DEFAULT NULL,
  `bank_id` int(11) NULL DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `account_id` int(11) NULL DEFAULT NULL,
  `topup_date` datetime(0) NULL DEFAULT NULL,
  `reference_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `amount` double NULL DEFAULT NULL,
  `status_id` int(11) NULL DEFAULT NULL,
  `remark` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of topups
-- ----------------------------
INSERT INTO `topups` VALUES (2, 'BB01A6DB-103B-9C3E-264B-88C16EF1B4DA', 2, 118, 'JAKARTA', 130, '2022-01-10 08:00:00', '100010001001', 2000, 135, 'TOPUP 1', '2022-01-10 08:00:00', 2, '2022-01-10 10:00:00', 1, 'ACTIVE');
INSERT INTO `topups` VALUES (3, '065FCB54-9643-A26A-F1E5-2237B5B98ECB', 2, 110, 'JAKARTA', 130, '2022-01-10 08:00:00', '6618888838', 1000, 133, '', '2022-01-10 08:00:00', 2, '2022-01-10 10:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for transactions
-- ----------------------------
DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `agent_id` int(11) NULL DEFAULT NULL,
  `applicant_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  `charge` double NULL DEFAULT NULL,
  `is_taken` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `doctor_id` int(11) NULL DEFAULT NULL,
  `doctorexam_id` int(11) NULL DEFAULT NULL,
  `labexam_id` int(11) NULL DEFAULT NULL,
  `xrayexam_id` int(11) NULL DEFAULT NULL,
  `doctorcertify_id` int(11) NULL DEFAULT NULL,
  `result` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `qrcode` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `transmit` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_id` int(11) NULL DEFAULT NULL,
  `receipt` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `is_verified` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transactions
-- ----------------------------
INSERT INTO `transactions` VALUES (1, '26D8714D-3186-5F4C-18BA-7896C14EC8EA', 2, 2, '2022-01-10 08:00:00', 2, '2022-01-11 07:47:17', 3, 'ACTIVE', NULL, NULL, 3, 2, 2, 2, 2, 'YES', NULL, NULL, 1, 'R19AAA0001', 'YES');
INSERT INTO `transactions` VALUES (5, '0AAA1C0F-9576-1EEA-3CC2-9A2B44A69F0A', 2, 8, '2023-04-06 16:32:55', 2, NULL, NULL, 'ACTIVE', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'R23AAA0004', NULL);
INSERT INTO `transactions` VALUES (6, '4BF570A1-973A-9097-83A8-D94FE20F794C', 2, 7, '2023-04-06 21:06:26', 2, '2023-04-07 07:39:25', 3, 'ACTIVE', NULL, NULL, 3, 8, 3, 3, 7, 'YES', NULL, NULL, NULL, NULL, 'YES');

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
  `status_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'ADMIN', '202cb962ac59075b964b07152d234b70', 1, 3, 1, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `users` VALUES (2, 'AGENT1', '202cb962ac59075b964b07152d234b70', 2, 4, 1, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `users` VALUES (3, 'DOCTOR1', '202cb962ac59075b964b07152d234b70', 3, 141, 1, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `users` VALUES (4, 'AGENT2', '202cb962ac59075b964b07152d234b70', 4, 4, 1, '2022-01-10 08:00:00', 1, '2022-01-10 10:00:00', NULL, 'ACTIVE');
INSERT INTO `users` VALUES (5, 'DOCTOR2', '202cb962ac59075b964b07152d234b70', 5, 141, 1, '2022-01-10 08:00:00', 1, '2022-01-10 08:00:00', NULL, 'ACTIVE');
INSERT INTO `users` VALUES (6, 'DOCTOR3', '202cb962ac59075b964b07152d234b70', 6, 141, 1, '2022-01-10 08:00:00', 1, '2022-01-10 08:00:00', NULL, 'ACTIVE');

-- ----------------------------
-- Table structure for xrayexams
-- ----------------------------
DROP TABLE IF EXISTS `xrayexams`;
CREATE TABLE `xrayexams`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(11) NULL DEFAULT NULL,
  `doctor_id` int(11) NULL DEFAULT NULL,
  `pregnant` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `overdue` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `exam_date` date NULL DEFAULT NULL,
  `thoracic_cage` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `thoracic_cage_reason` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `heart_shape` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `heart_shape_reason` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `lung_fields` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `lung_fields_reason` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `mediastinum` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `mediastinum_reason` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `pleura` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pleura_reason` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `focal_lesion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `focal_lesion_reason` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `other_abnormal` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `other_abnormal_reason` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `impression` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `report_date` date NULL DEFAULT NULL,
  `certify` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `read` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_by` int(11) NULL DEFAULT NULL,
  `disable` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of xrayexams
-- ----------------------------
INSERT INTO `xrayexams` VALUES (2, 1, 3, NULL, NULL, '2019-05-02', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', '2022-01-11', 'YES', 'YES', 1, '2022-01-10 08:00:00', 3, '2022-01-11 07:47:08', 3, 'ACTIVE');
INSERT INTO `xrayexams` VALUES (3, 6, 3, NULL, NULL, '2023-04-03', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', 'NO', '', '', '2023-04-07', 'YES', 'YES', 1, '2023-04-07 07:10:21', 3, '2023-04-07 07:10:21', 3, 'ACTIVE');

SET FOREIGN_KEY_CHECKS = 1;
