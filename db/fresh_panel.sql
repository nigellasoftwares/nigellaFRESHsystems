/*
 Navicat Premium Data Transfer

 Source Server         : Local 3306 - MySQL
 Source Server Type    : MySQL
 Source Server Version : 80017
 Source Host           : localhost:3306
 Source Schema         : fresh_panel

 Target Server Type    : MySQL
 Target Server Version : 80017
 File Encoding         : 65001

 Date: 07/04/2023 09:03:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for agencies
-- ----------------------------
DROP TABLE IF EXISTS `agencies`;
CREATE TABLE `agencies`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `rlno` int(4) UNSIGNED ZEROFILL NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `tel` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `owner` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `position` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 542 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of agencies
-- ----------------------------
INSERT INTO `agencies` VALUES (1, 'Orchard International', 0010, 'Orchard Faruque Tower, Level-17, 72, Naya Paltan, Paltan, Dhaka-1000', '48318901-10 (PABX) (Off.), 9857669, 9857670', 'Dr. Mohammed Faruque', 'Proprietor', '01819245113');
INSERT INTO `agencies` VALUES (2, 'Reaz Overseas', 0030, 'Zeba Tower, 3rd & 4th Floor, 57, Shahid Tajuddin Ahmed Sharani, Mohakhali C/A, Dhaka', '9830881, 9830884, 9830885, 9830880 ( Off.)', 'Mr. Reaz-ul-Islam', 'Proprietor', '01711527107, 01786333333');
INSERT INTO `agencies` VALUES (3, 'Micro Export House', 0448, 'Kazi Tower (7th Floor), 86, Inner Circular V.I.P. Road, Nayapaltan, Dhaka-1000', '8312200 (Res.)', 'Mr. Mostafa Mahmud', 'Proprietor', '01814949855, 01925781632');
INSERT INTO `agencies` VALUES (4, 'Eastland Network', 0540, 'House No.- H-89/2, 5th & 6th Floor, Shahid Bir Uttam Ziaur Rahman Road, Kakoli, Banani, Dhaka-1213', NULL, 'Mr. Ghulam Mustafa (Babul)', 'Proprietor', '01817586752, 01632261247');
INSERT INTO `agencies` VALUES (5, 'Shamia Overseas', 0960, 'V.I.P. Tower (7th Floor), 51/1, V.I.P. Road, Nayapaltan, Dhaka-1000', '8331620, 58314667 (Off.)', 'Al-haj Abdul Motin', 'Proprietor', '01819263266');
INSERT INTO `agencies` VALUES (6, 'Afia Overseas', 1010, '78/E, Purana Paltan Line, Bijoy Nagar, Dhaka-1000', '9356044 (Off.)', 'Mr. Altab Khan', 'Proprietor', '01911448086, 01731288888');
INSERT INTO `agencies` VALUES (7, 'Leza Overseas Ltd.', 0386, 'Karim Chamber (1st Floor), 99, Motijheel C/A, Dhaka-1000', '9565920, 9558157 ( Off.), 9331676 (Res. )', 'Mr. Mohammed Seraj Miah', 'Managing Director', '01552476978, 01748185123');
INSERT INTO `agencies` VALUES (8, 'Cupid Traders', 0011, 'House No.- 48, 1st Floor, Road No.11, Block-C, Banani, Dhaka -1213', '88013061, 47292886 (Off.)', 'Mr. Swapan Kumar Poddar', 'Proprietor', '01819227232, 0173080262');
INSERT INTO `agencies` VALUES (9, 'Al-Arab Enterprise International', 0026, 'House No.- 6, Road No.- 2/B, Block-J, 11th Floor, Baridhara, Dhaka', '9840115 (Off.)', 'Mr. B.H. Haroon, M.P.', 'Proprietor', '01711446290, 01715967314');
INSERT INTO `agencies` VALUES (10, 'Arabian Gulf Associates Co. Ltd.', 0051, 'Progoti Tower, Flat No.- 5-D, House No.- Kha-214/E, Progoti Sharani, Merul Badda, Badda, Dhaka-1212', NULL, 'Mr. Jamal Uddin Ahmed', 'Managing Director', '01711592633, 01819247063');
INSERT INTO `agencies` VALUES (11, 'Al-Amin International', 0102, 'House No.-55, Road No.-3, 5th Floor, Niketon, Gulshan-1, Dhaka-1212', '9897946(Off.) 9897841', 'Mr. Md. Serajus Salekin (Sabu)', 'Proprietor', '01711529684');
INSERT INTO `agencies` VALUES (12, 'Friends Marine Agency', 0133, 'Chittagong Office: Sultan Mansion (1st Floor), 151, Shiekh Mujib Road, Badamtoly, Agrabad, Chittagong', '2522289 (D), 2522286, 2522287 (Ctg. Off.)', 'Al-haj Emdad Ullah', 'Managing Partner', '01711353541, 01819317274');
INSERT INTO `agencies` VALUES (13, 'Marjia International', 1306, '292, Inner Circular Road, Shatabdi Centre, 5th Floor, Room-5/F, Fakirapool, Dhaka-1000', NULL, 'Mr. Hossain Ahmed Mazumder', 'Proprietor', '01628966952');
INSERT INTO `agencies` VALUES (14, 'Intimate Business Associate', 0154, '376, Dilu Road, Moghbazar, Dhaka-1000', NULL, 'Dr. A.K.M. Mohiuddin', 'Proprietor', '01628966952');
INSERT INTO `agencies` VALUES (15, 'M/S Eastern Overseas', 0555, 'H-79/F, New Airport Road, 1st Floor, Chairmanbari, Banani, Dhaka-1213', NULL, 'Alhaj Mohammad Salim', 'Proprietor', '01711520893');
INSERT INTO `agencies` VALUES (16, 'Enam International', 0317, 'Plot No.-15, First Colony, Gabtali, Mazar Road, Mirpur, Dhaka', ' 9881087, 8824847, 8822728 (Off. )', 'Alhaj Mohammed Enamul Hoque', 'Proprietor', '01711522515, 01713017306');
INSERT INTO `agencies` VALUES (17, 'Al-Faroque International', 0318, '66/A, Naya Paltan, 2nd Floor, V.I.P. Road, Dhaka-1000', '9334366, 9353676 (Off.), 8315489 (Res.)', 'Mr. Mohd. Golam Faroque', 'Proprietor', '01711536884, 01819487094');
INSERT INTO `agencies` VALUES (18, 'Job Finders', 0324, '71/A, College Road, Chawk Bazar, Chattogram', '613397, 613619 (Ctg. Off.)', 'Mr. Mohd. Nazrul Islam', 'Proprietor', '01711720167, 01711823664');
INSERT INTO `agencies` VALUES (19, 'P.N. Enterprise Company Dhaka Ltd.', 0376, 'Mahtab Centre (5th Floor), 177, Shahid Syed Nazrul Islam Sharani, Bijoy Nagar, Dhaka-1000', '9354953, 8332906 (Off.)', 'Mr. Noor Mohammad Talukder', 'Chairman', '01713005037');
INSERT INTO `agencies` VALUES (20, 'Rajdoot Overseas (Pvt.) Ltd.', 0379, 'Soleman Plaza, 6th Floor, Room No.3, 162, Shahid Nazrul Islam Sharani, Purana Paltan, Dhaka-1000', '9550214 (Off.)', 'Mr. Mostaque Ahmed', 'Managing Director', '01713012484, 01976688994');
INSERT INTO `agencies` VALUES (21, 'Times Enterprise', 0385, '67, Naya Paltan, City Heart (4th Floor), VIP Road, Dhaka-1000', '9353512-5 (Off.), 55045108 (Res.)', 'Mr. Md. Abul Khair', 'Proprietor', '01713032232');
INSERT INTO `agencies` VALUES (22, 'Trade Fair International', 0431, 'Dr. Halim Palace (1st Floor), 60/C, Naya Paltan, Dhaka-1000', '48810573 (Off.)', 'Mr. Chowdhury Nurul Huda', 'Managing Partner', '01819212359');
INSERT INTO `agencies` VALUES (23, 'Al-Amana Establishment', 0443, '60/E, Purana Paltan, 3rd Floor, Dhaka-1000.', '9560497, 9581743, 9587403 (Off.)', 'Mr. Morshed Sanaullah Kayani', 'Proprietor', '01712178648, 01842178648');
INSERT INTO `agencies` VALUES (24, 'H.A. International', 0469, 'Islam Tower, 2nd Floor, 65, Nayapaltan, Dhaka-1000', '8391017, 9357468 (Off.)', 'Mr. Md. Anwar Hossain', 'Managing Partner', '8801710883714, 8801811165405');
INSERT INTO `agencies` VALUES (25, 'T.M. Overseas', 0498, '40/2/B, Naya Paltan, 1st Floor, Motijheel, Dhaka-1000', '8314841, 9355197, 8312360 (Off.)', 'Mr. A.H.M. Moyeen Uddin (Titas)', 'Proprietor', '01713007556');
INSERT INTO `agencies` VALUES (26, 'Bon Voyage Travels & Overseas (Pvt.) Ltd.', 0509, 'H-79, Block-L, Bir Uttam Ziaur Rahman Sarak, New Airport Road, Sikder Plaza, 3rd Floor, Banani', '8836732 (Off.)', 'Mr. Kamrul Hassan', 'Managing Director', '01704038763, 01953000267');
INSERT INTO `agencies` VALUES (27, 'Nexus International', 0510, 'House No.- 27, Road No.- 02, Sector7 , Uttara, Dhaka -1230', NULL, 'Mr. Md. Whahiduzzaman', 'Proprietor', '01755615933');
INSERT INTO `agencies` VALUES (28, 'Heeraq Barnali Overseas', 0559, 'Shawon Tower, 3rd Floor, 2/C, Purana Paltan, Dhaka-1000', '9514397, 9514348 (Off.)', 'Mr. Abdul Aziz', 'Proprietor', '01799499846, 01994579711');
INSERT INTO `agencies` VALUES (29, 'Jahan Overseas Ltd.', 0562, '61/1, Naya Paltan, 2nd Floor, Dhaka-1000', '9356475, 9356403 (Off.)', 'Mr. Md. Abdul Haque Howlader', 'Chairman', '01715524345, 01910550031');
INSERT INTO `agencies` VALUES (30, 'Al-Safa International', 0613, '20/46, Zilla Parishad Super Market, 1st Floor, Kotwali, Chittagong', '623237, 622597 (Ctg. Off.) 853123 (Ctg. Ras.)', 'Sheikh Mohammad Mubinul', 'Managing Partner', '01711720807');
INSERT INTO `agencies` VALUES (31, 'Royal Enterprise', 0616, '21/47, Zilla Parishad Super Market, 1st Floor, Court Road, Kotowali, Chittagong', '634672, 618522 (Ctg. Off.)', 'Mr. Mohd. Abul Kashem', 'Proprietor', '01819318421, 01711025488');
INSERT INTO `agencies` VALUES (32, 'Falcon International', 0617, 'Aziz Co-operative Market, 2nd Floor, 204, Shahid Syed Nazrul Islam Sharani, 89, Bijoy Nagar (Old), 2nd', '9572011 (Off.)', 'Mr. Md. Nurul Alam', 'Proprietor', '01819318421, 01711025488');
INSERT INTO `agencies` VALUES (33, 'Rupayan Enterprise', 0627, '70, Naya Paltan, 1st Floor, Paltan, Dhaka-1000', '9351104, 9347033 (Off.), 9346884 (Res.)', 'Mr. Md. Shohid Ullah', 'Managing Partner', '01711231282, 01911343010');
INSERT INTO `agencies` VALUES (34, 'Lubna Overseas', 0649, '40/1/A, Nurjahan Tower, Naya Paltan, Dhaka-1000', NULL, 'Mr. Md. Badsha Miah', 'Proprietor', '01715179308, 01869255878');
INSERT INTO `agencies` VALUES (35, 'Al-Amanat International', 0996, '40/1, Naya Paltan, V.I.P. Road, Dhaka-1000', ' 58313824, 9334376 (Off.)', 'Mr. A.N.M. Lutfur Rahman', 'Proprietor', '01911486219, 01611486219');
INSERT INTO `agencies` VALUES (36, 'Sasco International', 0695, '53, D.I.T. Extension Road, 3rd Floor, Naya paltan, Motijheel, Dhaka-1000', '9350786 (Off.)', 'Mr. Md. Kamal Uddin', 'Managing Partner', '01911357213, 01819220342');
INSERT INTO `agencies` VALUES (37, 'Omex Company Ltd.', 0709, '166/4, Motijheel Circular Road, Motijheel, Dhaka-1000', '7191147 (Off.), 9857669, 9857670 (Res.)', 'Mr. Eazaz Mohammed', 'Managing Director', '01811443426');
INSERT INTO `agencies` VALUES (38, 'North South Overseas', 0730, '168/169, College Road, Chowk Bazar, Chittagong', '619548, 2856337 (Off.)', 'Mr. Anamul Islam', 'Managing Partner', '01711721809');
INSERT INTO `agencies` VALUES (39, 'Bengal Gulf International', 0137, '128, Motijheel Commercial Area, Ground Floor, Malek Mansion Dhaka-1000', '9566417 (Off.)', 'Mr. Seraj Uddin Ahmed', 'Proprietor', '01711525366, 01678338833');
INSERT INTO `agencies` VALUES (40, 'Kabir Overseas', 0763, '67/1, Paltan China town, Level-8 (8th Floor), W-09/09 (West), VIP Road, Naya Paltan, Dhaka- 1000', '9354696, 58317215, 9348733 (Off.)', 'Mr. Mohd. Humayun Kabir', 'Proprietor', '01819241892, 01711844427');
INSERT INTO `agencies` VALUES (41, 'Diamond Star Research Bureau', 0767, '25, Naya Paltan, 1st Floor, Motijheel, Dhaka-1000', '9331183, 9358952 (Off.), 9352311 (Res.)', 'Mr. Md. Mohiuddin', 'Proprietor', '01819211014');
INSERT INTO `agencies` VALUES (42, 'The Mascot Overseas', 0757, 'H-100, 3rd Floor, New Airport Road, Kakoli, Banani, Dhaka-1213', NULL, 'Mr. Md. Moazzam Hossain', 'Proprietor', '01911342599, 01960147540');
INSERT INTO `agencies` VALUES (43, 'Star Line Associate', 0776, 'Eastern View, 12th Floor, Room No.12 /4-9, 50, D.I.T. Extension Road, Nayapaltan, Dhaka-1000', '9353563, 9330941 (Off.)', 'Mr. Firoz Md. Mansurul Hoque', 'Managing Partner', '01819259058, 01707259058');
INSERT INTO `agencies` VALUES (44, 'Sun Shine Overseas', 0856, 'City Heart, Suite No.- 15/7, 67, \r\nNayapaltna, V.I.P. Road, Dhaka-1000\r\n', NULL, 'Mr. Md. Anowar Hossain', 'Managing Partner', '01715098663');
INSERT INTO `agencies` VALUES (45, 'Musa International', 0857, 'House No.-2, Road No.- 04, Sector-01, Uttara, Dhaka-1230', '55035014, 55033550, 5503516 (Off.)', 'Engr. Mohammad Musa Kalim', 'Proprietor', '01715528334');
INSERT INTO `agencies` VALUES (46, 'Royal Bangla International', 0775, '167, Eden Building, 1st Floor, Motijheel Circular Road, Dhaka-1000', NULL, 'Mr. H.M. Pavel', 'Proprietor', '01713016346, 01711560339');
INSERT INTO `agencies` VALUES (47, 'Ruma Associate Ltd.', 0905, 'V.I.P. Tower (10th Floor), 51/1, V.I.P. Road, Naya Paltan, Dhaka-1000', '9352225, 9352657 (Off.)', 'Mr. Jahangir Alam Bhuiyan', 'Managing Director', '01715940885, 01818729451');
INSERT INTO `agencies` VALUES (48, 'Shimon Overseas', 0922, '56, Purana Paltan, 10th Floor, Dhaka-1000', '9576831 (Off.)', 'Mr. Mohammad Ishaque', 'Managing Partner', '01713020812, 01713213367');
INSERT INTO `agencies` VALUES (49, 'Joint Overseas', 0941, '121/B, Gulshan Avenue, Gulshan-2, Dhaka-1212', '9841652, 9896607 (Off.), 9896050 (Res.)', 'Mr. Md. Belayet Hossain', 'Proprietor', '01711523769');
INSERT INTO `agencies` VALUES (50, 'M/S Sarker Recruiting Agency Ltd.', 0226, 'House # Ka-50/2, Jagonnatpur, Badda, Dhaka-1229', NULL, 'Mohammed Abul Bashar', 'Chairman', '01819-239169');
INSERT INTO `agencies` VALUES (51, 'B.N.S Overseas Limited', 1450, 'B.H. Plaza, Ka-50/2, Shahid Abdul Aziz Sarini, Jagonnatpur, Vattara, Dhaka-1229', NULL, 'Engr. Estahak Ahmed Shaikat', 'Managing Director', '01711-361786');
INSERT INTO `agencies` VALUES (52, 'Palash Trade International (Pvt.) Ltd.', 0979, 'H-97/2, Hazi Tower, 4th Floor, Kakoli, Banani, Dhaka-1213', '9841335 (Off.)', 'Mr. Md. Sajedul Karim Palash', 'Managing Director', '01714078717');
INSERT INTO `agencies` VALUES (53, 'Concorde Apex', 0984, 'City Heart (5th Floor), Suite No.- 6/2, 67, Naya Paltan, Dhaka -1000', '9336297, 9340929, 9336476, 9341152 (Off.)', 'Mr. Abul Hossain', 'Proprietor', '01755226688');
INSERT INTO `agencies` VALUES (54, 'F.A.H. Overseas Ltd.', 0987, 'Priyo Prangan, 8th Floor, Flat No.08-16, Road No.-17, House No.- 19, Kemal Ataturk Avenue, Banani', ' 9820290 (Off.)', 'Mr. Mohd. Shafiqul Islam', 'Managing Director', '01925529555, 01771766696');
INSERT INTO `agencies` VALUES (55, 'Khaled International', 0691, 'Hotel Bakshi, Ground Floor, 131, D.I.T. Extension Road, Fakirapool, Dhaka-1000', '9351776 (Off.), 7441423 (Res.)', 'Mr. Mohammad Aminul Hoque', 'Proprietor', '01819213392');
INSERT INTO `agencies` VALUES (56, 'Satkhira International', 0997, 'Baitul Abed, 7th Floor, Room No.- 704, 53, Purana Paltan, Dhaka -1000', '57160526 (Off.)', 'Mr. Sk. Nazrul Islam', 'Proprietor', '01712042311');
INSERT INTO `agencies` VALUES (57, 'Safa Marwa International', 1029, 'G-Nat Tower (2nd Floor), Suite No.2 G, 116-117, D.I.T. Extension Road, Fakirapool, Dhaka-1000', '7193650 (Off.)', 'Mr. Md. Redwan Khan (Borhan)', 'Proprietor', '01711107534, 01977107534');
INSERT INTO `agencies` VALUES (58, 'Travel Care (Pvt.) Ltd.', 1042, 'Shanjari Tower, 2nd Floor, Flat No.3 /A, 78, Nayapaltan, Dhaka -1000', '9331650, 58315574 (Off.)', 'Mr. Abu Sufian', 'Managing Director', '01714349414, 01777165382');
INSERT INTO `agencies` VALUES (59, 'Derash Bangladesh', 1049, 'Islam Tower (1st Floor), 65, Naya Paltan, Dhaka-1000', '8316497 (Off.)', 'Md. Abdul Hakim Mozumder', 'Managing Partner', '01611545279, 01731545279');
INSERT INTO `agencies` VALUES (60, 'Homeland Trading', 1052, 'House No.-97/2, 3rd Floor, New Airport Road, Kakoli, Banani, Dhaka-1213', '9842609, 9847287 (Off.)', 'Mr. Mohammad Zakir Hossain', 'Proprietor', '01711542215');
INSERT INTO `agencies` VALUES (61, 'Eastern Resource Management Services Ltd.', 1057, 'Sayed Grand Center, 7th Floor, Suite No.-802, Plot No.- 89, Road No.-28, Sector-7, Uttara Model Town', '8958975, 8957579 (Off.), 8363556 (Res.)', 'Mr. Abul Monsur Ahmed', 'Managing Director', '01726968938');
INSERT INTO `agencies` VALUES (62, 'Al-Jajira International', 0253, 'Rokeya Manshion, 36, Purana Paltan Line, 4th Floor, V.I.P. Road, Dhaka-1000', NULL, 'Mr. M.A. Quashem', 'Proprietor', '01819126113, 01843564090');
INSERT INTO `agencies` VALUES (63, 'Bashundhara Employment Services', 1064, 'Tropicana Tower, 218, Shahid Syed Nazrul Islam Sharani (Old), 45, Topkhana Road, 6th Floor', '9577530, 9577531, 9577532 (Off.), 8392018', 'Mr. Aminur Rahman Majumder', 'Proprietor', '01770111777');
INSERT INTO `agencies` VALUES (64, 'Suvro International Trade & Travels (MSITT)', 1106, '23/2, Topkhana Road, Ground Floor, Dhaka-1000', '9554657, 58315907 (Off.)', 'Mr. Md. Mukaddem Hossain', 'Proprietor', '01711377578');
INSERT INTO `agencies` VALUES (65, 'New Star Recruiting Agency', 1168, 'Islam Tower, 2nd Floor, 65, Naya Paltan, Dhaka-1000', NULL, 'Mr. Nasir Uddin', 'Proprietor', '01855522221, 01721755155');
INSERT INTO `agencies` VALUES (66, 'Asmacs', 1059, 'House No.-55, Road No.-3, 5th Floor, Niketon, Gulshan-1, Dhaka-1212', '9897946 (Off.), 9897841 (Res.)', 'Mr. Salman Salekin', 'Proprietor', '01711321470, 01611261308');
INSERT INTO `agencies` VALUES (67, 'P.R Overseas Ltd.', 1928, 'BH Plaza, KA-50-2, Jogonnathpur Abdul Aziz Road, Vattara, Dhaka-1229', NULL, 'Golam Rakib', 'Managing Director', '01914919897');
INSERT INTO `agencies` VALUES (68, 'Gulf International', 1221, 'Paladium Market, 2nd Floor, Flat No.-2/A, House No.-1, Road No.-95, Gulshan Circle-2, Dhaka-1212', '9862385, 9851950, 9851951 (Off.)', 'Mr. Mohammed Shariful Islam', 'Proprietor', '01971565979, 01711565979');
INSERT INTO `agencies` VALUES (69, 'BD Global Business', 1231, 'Aziz Co-operative Market, 5th Floor, 204, Shahid Syed Nazrul Islam Sharani, Dhaka-1000', NULL, 'Mr. Md. Solaiman', 'Proprietor', '01711112819');
INSERT INTO `agencies` VALUES (70, 'Bashundhara Overseas', 1252, 'H-79, (2nd Floor), Room No- 3 &4, Bir Uttom Ziaur Rahaman Sorok  Banani, Dhaka-1213', '48811447 (Off.)', 'Mr. Md. Dilder Hossain', 'Proprietor', '01711711973');
INSERT INTO `agencies` VALUES (71, 'Vely Trade International', 1268, '14, Rajuk Avenue, Rubel Mansion, 3rd Floor, Motijheel, Dhaka-1000', '9552821, 9513118 (Off.)', 'Mr. Md. Jahirul Islam', 'Proprietor', '01953865001, 01914208260');
INSERT INTO `agencies` VALUES (72, 'The Rangpur Overseas', 1325, '70/F, 5th Floor, Purana Paltan Line, Bijoynagar, Dhaka-1000', '9339880 (Off.)', 'Mr. Md. Jahangir Alam', 'Proprietor', '01972206666');
INSERT INTO `agencies` VALUES (73, 'Kaj Bangla Employment Service', 1345, 'H-95 (3rd Floor), Bir Uttam Ziaur Rahman Sarak, Banani, Dhaka-1213', '9861101, 9895975 (Off.)', 'Mr. Khandoker Mahmud Sadik', 'Proprietor', '01711150159');
INSERT INTO `agencies` VALUES (74, 'Nurjahan Recruiting Agency', 1394, 'Orchard Faruque Tower (6-D-South Side), 72, Nayapaltan, V.I.P. Road, Dhaka-1000', '9345635 (Off.)', 'Mr. Kazi Muhammed Abdur', 'Proprietor', '01973623396, 01973623397');
INSERT INTO `agencies` VALUES (75, 'Khanjahan Ali Overseas', 1398, 'H-86, Amina Bhaban (7th Floor), Bir Uttaam Ziaur Rahman Road, Banani, Dhaka-1213', '9870507, 9870156 (Off.)', 'Mr. Md. Zafar Khandaker', 'Managing Partner', '01713006167, 01919006167');
INSERT INTO `agencies` VALUES (76, 'A.F. Overseas', 1408, 'Shatabdi Center, 10th Floor, Suite No.10- D, 292, Inner Circular Road, Fakirapool, Dhaka-1000', NULL, 'Mr. Ahmed Ullah', 'Managing Partner', '01711048079, 01842048079');
INSERT INTO `agencies` VALUES (77, 'Sayem Overseas Ltd.', 1410, 'Eastern View, Suite No.- 11/4 - 11/9, 11 th Floor, 50, D.I.T. Extension Road, Naya Paltan, Dhaka-1000', '58315525 (Off.)', 'Mr. AKM Shamsuddin', 'Managing Director', '01861002811');
INSERT INTO `agencies` VALUES (78, 'Excellent Dream Overseas', 0866, '183, Shahid Syed Nazrul Islam Sharani, 3/3-C, Bijoy Nagar, 4th Floor, Dhaka-1000', NULL, 'Mr. Md. Badiul Alam Khan', 'Proprietor', '01711485556');
INSERT INTO `agencies` VALUES (79, 'Akash Bhraman', 0384, '116/1, DIT Extension Road, Fakirapool, Dhaka-1000', NULL, 'Monsur Ahmed Kalam', 'Proprietor', '01711591296');
INSERT INTO `agencies` VALUES (81, 'Trust Overseas Recruiting Agency (TORA)', 1182, 'BMTF, Gazipur Cantonment, Gazipur-1703', '9205988 (Off.), 58070887 (Res.)', 'Brig. Gen. Md. Habibul Karim', 'Managing Director', '01926808475');
INSERT INTO `agencies` VALUES (82, 'M/S IMEX Manpower', 1187, 'Tropicana Tower (2nd Floor) 45, Topkhana Road, Dhaka-1000', NULL, 'Munshi Omar Faruk Ahmed', 'Proprietor', '01708 420400');
INSERT INTO `agencies` VALUES (83, 'AZ One International', 1536, '67, Nayapaltan, City Heart, Suite-11/3 (10th Floor), Dhaka-1000', NULL, 'Md. Akter Hossain', 'Managing Partner', NULL);
INSERT INTO `agencies` VALUES (84, 'Fly City Overseas Ltd.', 1685, '28/1/C, Toyenbee Circular Road, Rahmania International Complex, 4th Floor, Room No.-7, Motijheel', '7192189 (Off.)', 'Mr. Habibur Rahaman (Didar)', 'Proprietor', '01793300299, 01675666032');
INSERT INTO `agencies` VALUES (85, 'AB Tours & Travels International Ltd.', 1686, '55/B, Purana Paltan, Noakhali Tower, Level-12/A, Dhaka-1000', '9562375 (Off.)', 'Mr. Md. Monirujjaman Sajal', 'Managing Director', '01716251026, 01317635373');
INSERT INTO `agencies` VALUES (86, 'Next Overseas Ltd.', 1696, '121, Shahid Tajuddin Ahmed Sarani, 2 nd Floor, Moghbazar Ramna, Dhaka-1217', NULL, 'Mr. Md. Toriqul Islam', 'Managing Director', '01405274549');
INSERT INTO `agencies` VALUES (87, 'Att-Taqwa Overseas Ltd.', 1703, '89/3, Kakrail, Ground Floor, Hotel Rajmoni Ishakha, Dhaka-1000', NULL, 'Mr. Md. Rayhan Kabir', 'Managing Director', '01715363575, 01678133177');
INSERT INTO `agencies` VALUES (88, 'Royal Asia Trade Line', 1430, '54/A, Road No.- 133, Gulshan-1, Dhaka-1212', '9850805, 9849694 (Off.)', 'Hazi Shaher Uddin', 'Proprietor', '01911446004');
INSERT INTO `agencies` VALUES (89, 'Alliance Overseas', 1433, 'H.M. Siddique Mansion, 5th Floor, 55 /A, Purana Paltan, Dhaka -1000', '9567466 (Off.)', 'Mr. Julfiker Ali', 'Proprietor', '01817722921, 01931036840');
INSERT INTO `agencies` VALUES (90, 'AKM Overseas', 1464, '130 DIT Extension Road, Fakirapool, Motijheel, Dhaka-1000', NULL, 'Mr. Md. Akter Hossain', 'Managing Partner', '+8801815433888');
INSERT INTO `agencies` VALUES (91, 'Shahara Overseas', 1466, '16, Poribagh (29, Bir Uttam C.R. Datta Road), Hatirpul, Dhaka.', '58611723, 58611724 (Off.)', 'Mr. Minaz Uddin Ahmed', 'Proprietor', '01711016246');
INSERT INTO `agencies` VALUES (92, 'Silvee And Sinthee Travel Agency Ltd.', 1491, '177, Shohid Sayed Nazrul Islam Sarani, Mahtab Centre (8th Floor), Bijoy Nagar, Dhaka-1000', '9339954, 9339143 (Off.), 58315161 (Res.)', 'Mr. Md. Khairul Alam', 'Managing Director', '01728321518, 01767458486');
INSERT INTO `agencies` VALUES (93, 'S.A. Overseas', 1519, '120, D.I.T. Estension Road, Habibullah Mansion, 1st Floor, Fakirapool, Dhaka-1000', '7194157, 7195798 (Off.), 7550542 (Res.)', 'Mr. Md. Shafiqul Islam Khan', 'Proprietor', '01819404507, 01752111991');
INSERT INTO `agencies` VALUES (94, 'Business Airlines Ltd.', 1420, '849, Shewrapara, Mirpur, Dhaka-1216', '58050714, 58050715', 'Mr. Serajul Islam Patwary', 'Managing Director', '01674990011, 01712527417');
INSERT INTO `agencies` VALUES (95, 'Sound Lines', 1651, 'House No.-02, Flat No.- A/3, Road No.- 04, Sector-01, Uttara, Dhaka', '55035016, 55035014, 55035550 (Off.)', 'Ms. Tasfia Kalim', 'Proprietor', '01715528334');
INSERT INTO `agencies` VALUES (96, 'Ayesha Overseas', 1665, 'Rahmania International Complex, Room No.-5, 7th Floor, 28/1/C, Toyenbi Circular Road, Motijheel', '7191153 (Off.)', 'Lion Alhaj Md. Saiful Islam', 'Proprietor', '01822853822');
INSERT INTO `agencies` VALUES (97, 'Al-Mamun International', 1680, '167, Motijheel Circular Road, Eden Building (1st Floor), Motijheel, Dhaka-1000', '7193090 (Off.), 9354447 (Res.)', 'Mr. Md. Shameem Al Mamun', 'Managing Partner', '01819213780, 01713122427');
INSERT INTO `agencies` VALUES (98, 'Panguchi Overseas Ltd.', 1704, '139/140, Green Road, Room No.-17-18, 3rd Floor, Green Super Market, Dhaka', NULL, 'Mr. H.M. Bodiujjaman', 'Managing Director', '01711347392, 01777787315');
INSERT INTO `agencies` VALUES (99, 'Al-Imam International', 1710, '8/A, Hossen Market, 1st Floor, Bahaddarhat More, Chandgaon, Chittagong', '2554340, 2555657 (Ctg. Off.), 652466 (Ctg. Res.)', 'Mr. Mohammad Monir Uddin', 'Proprietor', '01817225499, 01770332233');
INSERT INTO `agencies` VALUES (100, 'A Jharna Trade International', 1726, '46, Wahab Mansil,Public Health Mor,Sajjan Kanda,Rajbari', NULL, 'Mr.Shanta Deb Saha', 'Proprietor', '+8801716936559, 01616936559');
INSERT INTO `agencies` VALUES (101, 'Mostafiz International Ltd.', 1727, 'Al Razi Complex,166-167, Shaheed Sayed Nazrul Islam Sarani,Purana Paltan, Dhaka-1000', '+880255111652-53', 'Mr. Mohammad Mostafizur', 'Managing Director', '01950954196, 01842970383');
INSERT INTO `agencies` VALUES (102, 'Labour Asia Ltd.', 1730, '1119, Naya Paltan, Dhaka-1000', NULL, 'Mr. Md. Kamrul', 'Managing Director', '+8801716991888, 01824729292');
INSERT INTO `agencies` VALUES (103, 'M/S Good Link International', 0985, '130, D.I.T Ext Road (1st Floor) Fakirapool, Dhaka-1000', NULL, 'Mohd. Moniruzzaman', 'Managing Partner', '01732 966378');
INSERT INTO `agencies` VALUES (104, 'Thawabet International Ltd.', 1606, '67, Naya Paltan, City Heart, Suite-15/7, VIP Road, Dhaka-1000', '9343920 (Off.)', 'Mr. Md. Sohel', 'Chairman', '01821079970');
INSERT INTO `agencies` VALUES (105, 'Travel House Export International', 1789, '28/1/C Rahmania International Complex, Suit-5 (6th Floor), Toyenbee Circular Road, Motijheel', NULL, 'Mr. Md. Hafij ur Rahman', NULL, '01716148998, 01797539300');
INSERT INTO `agencies` VALUES (106, 'K.S.M International Ltd.', 1799, 'H-79/A (6th Floor), Road-07, Sector-04, Uttara, Dhaka-1230', NULL, 'Mr. Delower Hossain', 'Managing Director', NULL);
INSERT INTO `agencies` VALUES (107, 'Al-ABed Overseas Ltd.', 1845, 'Al Razi Complex, R#D-602,166-167, Purana Paltan, Dhaka-1000', NULL, 'Mr. Md. Jafor Ahammad', 'Managing Director', '01711277740');
INSERT INTO `agencies` VALUES (108, 'Always Manpower Services Ltd.', 1941, 'Al-Razi Complex, 166/167 Sayed Nazrul Islam Sarani, Bijoy Nagar, Paltan, Dhaka-1000', NULL, 'Mohammad Jakir Hossain', 'Managing Director', NULL);
INSERT INTO `agencies` VALUES (109, 'M/S A.J International', 1304, '199, Syed Nazrul Islam Sharwani, Akram Tower (5th Floor), Dhaka-1000', NULL, 'Abdullah Al- Mamun', 'Proprietor', '01709 990 702');
INSERT INTO `agencies` VALUES (110, 'Multilink Management Consultant', 1529, '35/C, Naya Paltan, Kashfia Plaza, Inner Circular Road, Dhaka', NULL, 'Md Jahangir Hossain Mollah', 'Managing Partner', '01711 520432');
INSERT INTO `agencies` VALUES (111, 'United Gulf Services', 1036, 'Plot # SW (H), 8/1 (Old), 1/A (New), 1st Floor (West Side), Bir Uttam Mir Shawkat Ali Sharak, Gulshan-1, Dhaka-1212', NULL, 'Mrs. Laila Arjuman Banu', 'Proprietor', '01709 990 751');
INSERT INTO `agencies` VALUES (113, 'M/S East West Human Resource Center Ltd.', 0980, '2/B, Rupsha Tower, Plot # 07, Road# 17, Kamal Ataturk Avenue, Banani, Commercial Area, Dhaka-1213', NULL, 'Shahjahn Bhuiyan', 'Managing Director', '01990 770 096');
INSERT INTO `agencies` VALUES (114, 'M/S Green Lind', 0040, 'Plot No.- SW(H), 8/A (Old), 1/A (New), 1st Floor (East Side), Bir Uttam Mir Shawkat Ali Sharak, Gulshan-1, Dhaka-1212', NULL, 'Mr. Mohammad Abdul Hye', 'Proprietor', '01709990700');
INSERT INTO `agencies` VALUES (115, 'M/S AL–Basher International Limited', 0392, 'City Heart (12th Floor), Suite No.- 02/A, 67, Naya Paltan, Dhaka-1000', NULL, 'Mohammad Golam Sorwar Sumon', 'Chairman', '01819421480, 01740953335');
INSERT INTO `agencies` VALUES (116, 'Comfort Overseas Consultant Ltd.', 1739, 'Skylark Point, Suite No.- 5/F, 5th Floor, 24/A, Bijoy Nagar, Dhaka-1000', '8391718 (Off.)', 'Mr. Mahedi Hasan', 'Managing Director', '01711479484');
INSERT INTO `agencies` VALUES (117, 'Jannat Overseas', 1419, '3, Shaheed Tajuddin Ahmed Sharani, Moghbazar, Ramna, Dhaka-1217', NULL, 'Ms. Lima Begum', 'Proprietor', '01712135176');
INSERT INTO `agencies` VALUES (118, 'Arob World Destination', 1823, 'Dag No.- 2545, House No.- 9, Block-A, Road No.-17, East Vatara, Gulshan, Dhaka', '48811807 (Off.)', 'Mr. Hafez Kamal Ahmed', 'Proprietor', '01741255555, 01733678888');
INSERT INTO `agencies` VALUES (119, 'Fastway Overseas', 1741, '383, Razzak Plaza, 6th Floor, Suite-7D, Nogorbazar Moor, Dhaka-1217', '029359726', 'Mr. Mohammed Tofazzal Hossain', NULL, '+8801713485934, 01611888222');
INSERT INTO `agencies` VALUES (121, 'Mehjabeen Air International Ltd.', 1724, 'G.M. Mansion, 480, D.I.T. Road, 3rd Floor, Malibag Rail Gate, Dhaka-1217', '9361422 (Off.)', 'Mr. Abu Jafor Md. Saleh', 'Managing Director', '01991659999');
INSERT INTO `agencies` VALUES (123, 'Al-Sourav Overseas', 1028, '476/C, D.I.T. Road, 1st Floor, Malibagh, Khilgaon, Dhaka-1217', NULL, 'Mr. Md. Jamal Hossain', 'Proprietor', '01715877018');
INSERT INTO `agencies` VALUES (124, 'Gulam Rabbi International', 1078, '61/B, (South), Khilgaon Chowdhurypara, 1st floor, Rampura, Dhaka-1219', NULL, 'Mr. Akter Hossain', 'Proprietor', '01715022129, 01726463971');
INSERT INTO `agencies` VALUES (125, 'M/S Mahbub International Agencies', 0286, '476-B, D.I.T. Road, Malibag, Dhaka-1217', NULL, 'Mr. Ahmedur Rahman', 'Proprietor', '01819212004, 01715009096');
INSERT INTO `agencies` VALUES (126, 'Al-Maqam Travels', 1524, 'Royal Tower, 3rd Floor, Room No.- 5, 64, Jublee Road, Amtala, Reazuddin Bazar, Chittagong-4000', NULL, 'Mr. Jamal Hossain', 'Proprietor', '01814831352');
INSERT INTO `agencies` VALUES (127, 'Dynamic Staffing Services Overseas Ltd.', 1386, '476/B, DIT Road, Malibag, Dhaka-1217', NULL, 'Md. Monarul Islam', 'Managing Director', NULL);
INSERT INTO `agencies` VALUES (129, 'Monzil Overseas', 0989, 'House No.-3, Lift-3, Road No.-7, Block-F, Banani, Dhaka-1213', NULL, 'Mr. Mozibur Rahman Mozib', 'Proprietor', '01711530875, 01971530875');
INSERT INTO `agencies` VALUES (130, 'Sikander Overseas International', 1435, '476/A, Faith Tower, 4th Floor, D.I.T. Road, Malibag, Dhaka-1217', NULL, 'Ms. Razia Sultana', 'Proprietor', '01921668349, 01682356110');
INSERT INTO `agencies` VALUES (131, 'Brilliant Manpower Service Ltd.', 1253, '476/C, DIT Road, Malibagh, Dhaka-1217', NULL, 'Md. Sohel Howlader', 'Managing Director', NULL);
INSERT INTO `agencies` VALUES (133, 'South Point Overseas Ltd.', 0622, 'House No.- SW 6/A, Road No.- 2, Gulshan-1, Dhaka-1212', NULL, 'Mr. Mohammed Manzur Kader', 'Managing Director', '01711567500');
INSERT INTO `agencies` VALUES (136, 'Barakat Dynamic Overseas Employment Agency', 1310, '107A/1105B, 5th Foor, Baitul Aman Co-Operative Housing Society, Ring Board, Adabar, Dhaka-1207', NULL, 'Mr. Md. Kamruzzaman', 'Proprietor', '01712111736');
INSERT INTO `agencies` VALUES (138, 'M/S Oshin Overseas Ltd.', 0414, 'Eden Building (2nd Floor), 167, Motijheel Circular Road, Motijheel, Dhaka-1000', NULL, 'Mr. Md. Jamal Hossain, Ex-M.P.', 'Managing Director', '01911519525');
INSERT INTO `agencies` VALUES (139, 'Hatiya international', 1661, '3/3B, Purana Paltan, Solaiman Plaza, Dhaka-1000', NULL, 'Md. Firoz Uddin', 'Proprietor', '01770-111777');
INSERT INTO `agencies` VALUES (141, 'Metro Trade International', 0374, 'House No.-51, 3rd Floor-4-C, Khan Tower, Sonargaon Janapath, Sector-7, Uttara, Dhaka-1230.', NULL, 'Mr. Md. Nazrul Islam', 'Proprietor', '01715460473');
INSERT INTO `agencies` VALUES (142, 'Concern International', 0029, 'House No.- 17, Road No.- 17, Block-D, Banani, Dhaka-1213', NULL, 'Dr. H.B.M. Iqbal, Ex. M.P', 'Proprietor', '01712159789');
INSERT INTO `agencies` VALUES (143, 'Bay Eastern Ltd', 0057, 'Overseas Center, 3rd Floor, House No.- 19/20, Road No.- 113/A, Gulshan-2, Dhaka-1212', NULL, 'Ms. Farah Anjum Bari', 'Managing Director', '01813678441');
INSERT INTO `agencies` VALUES (144, 'Irving Enterprise', 0215, 'House No.- 28, Road No.- 1, Block-I, Banani, Dhaka-1213', NULL, 'Mr. Hafzul Bari Mohammed Lutfur Rahman', 'Proprietor', '01711522216');
INSERT INTO `agencies` VALUES (145, 'Haidory Trade International', 0240, 'City Heart Building, Suite No.-6/4, 5th Floor, 67, Naya Paltan, Dhaka', NULL, 'Sayed Golam Sarwer', 'Managing Director', '01711591470');
INSERT INTO `agencies` VALUES (146, 'Al-Abbas International', 0248, 'Jomidar Palace, Level-4/B, Inner Circular Road, 291, Fakirapool  Dhaka-1000', NULL, 'Mr. Mozibur Rahman Murad', 'Proprietor', '01971561320');
INSERT INTO `agencies` VALUES (147, 'Al-Mahmud Trade International', 0291, 'Karim Chamber (6th Floor), 99, Motijheel C/A, Dhaka-1000', NULL, 'Mr. Abdur Rahman', 'Managing Partner', '01716615046');
INSERT INTO `agencies` VALUES (148, 'Abu Yasir Establishment', 0325, 'Aziz Co-operative Market (4th Floor), 204, Shahid Syed Nazrul Islam Sarani, Bijoy Nagar, Dhaka-1000', NULL, 'Mr. Joynal Abedin', 'Proprietor', '01711523509');
INSERT INTO `agencies` VALUES (149, 'Abdullah Trading Establishment', 0330, '36/B, Purana Paltan, Dhaka-1000', NULL, 'Mr. Mosharaf Hossain', 'Proprietor', '01713014292');
INSERT INTO `agencies` VALUES (150, 'Bluestar Services', 0372, 'House No.- 12, Road No.- 9, Block-J, Progati Sharani Road, Baridhara, Dhaka-1212', NULL, 'Major (Retd.) M. Taneem Hasan', 'Proprietor', '01819217093');
INSERT INTO `agencies` VALUES (151, 'Al-Marjuq Overseas Ltd', 0451, 'House No.- 15/A, Road No.- 5, Block-F, Banani, Dhaka-1213', NULL, 'Mr. Chowdhury Monirul Islam', 'Managing Partner', '01827543153');
INSERT INTO `agencies` VALUES (152, 'Al-Purbasha Enterprise', 0502, '244, New Circular Road, Malibag, Dhaka-1217', NULL, 'Mr. Md. Washiul Kabir', 'Proprietor', '01714378575');
INSERT INTO `agencies` VALUES (153, 'Al-Arafat International', 0642, 'H-86, Amina Bhaban, 2nd Floor, International Airport Road, Banani, Dhaka-1213', NULL, 'Mr. Md. Motaher Hossain Patwary', 'Managing Partner', '01719144674');
INSERT INTO `agencies` VALUES (154, 'Comet Overseas Ltd.', 0690, 'Hotel Eden Building (1st Floor), 167/1-A, Motijheel Circular Road, Dhaka-1000', NULL, 'Mr. Mohammad Noor Nabi Bhuiyan', 'Chairman', '01819272213');
INSERT INTO `agencies` VALUES (155, 'Chalachal Overseas', 0733, '16, Paribagh, Sonargaon Road, Hatirpool, Dhaka-1000', NULL, 'Mr. Mofiz Uddin', 'Proprietor', '01711533071');
INSERT INTO `agencies` VALUES (156, 'A.R. Trade Ltd', 0774, 'H-79, Sikder Plaza, 6th Floor, Block-M, Chairman Bari, Banani, Dhaka-1213', NULL, 'Mr. Abdur Rakib Mukul', 'Managing Partner', '01675838216');
INSERT INTO `agencies` VALUES (157, 'Khondaker Overseas', 0814, 'House No.- 19, Road No.- 22, Block-K, Banani, Dhaka-1213', NULL, 'Mr. Khondaker Abu Ashfaque', 'Proprietor', '01711522475');
INSERT INTO `agencies` VALUES (158, 'Kapasia Overseas Ltd.', 0977, 'Dr. Nawab Ali Tower, Suit No.-601 (6th Floor), 24/A, Purana Paltan, Dhaka-1000', NULL, 'Md. Nazrul Hoque', 'Managing Partner', '01911593534');
INSERT INTO `agencies` VALUES (159, 'A-Plus International', 1082, 'H-79, Block-M/1, Sikder Plaza, 3rd  Floor, Bir Uttam Ziaur Rahman Road, Banani, Dhaka-1213', NULL, 'Mr. Mohammed Abdul Mannan', 'Managing Partner', '01713067459');
INSERT INTO `agencies` VALUES (160, 'Godhuli Overseas', 1092, 'Habib Mansion, 62/6, Kamal Ataturk Avenue, Dhaka-1213.', NULL, 'Mr. Md. Mofizur Rahman', 'Proprietor', '01819218462');
INSERT INTO `agencies` VALUES (161, 'Sarail B-Baria Travels International', 1102, 'Mahtab Centre, 8th Floor, 177, Shahid Syed Nazrul Islam Sharani, Bijoy Nagar, Dhaka-1000', NULL, 'Mr. Mohammed Aktharuzzaman', 'Proprietor', '01819159852');
INSERT INTO `agencies` VALUES (162, 'H.R. International', 1134, '44, Dilkusha C/A, 4th Floor, Dhaka-1000', NULL, 'Alhaj Md. Harun-Ur-Rashid', 'Proprietor', '01720910767');
INSERT INTO `agencies` VALUES (163, 'Ababil Trade', 1604, '204, Shahid Sayed Nazrul Islam Sarani (89, Bijoy Nagar), Aziz Co-Operative Market, Dhaka-1000', NULL, 'Mr. Farid Uddin', 'Managing Partner', '01778936841');
INSERT INTO `agencies` VALUES (164, 'Grand Air International', 1752, '204, Shahid Sayed Nazrul Islam Soroni, Aziz Co-operative Market, 5th Floor, Bijoy Nagar, Dhaka-1000', NULL, 'Mr. Abdul Mannan', 'Managing Partner', '01711203730');
INSERT INTO `agencies` VALUES (165, 'Bright International', 0327, '115/23, Circular Road, Fakirapool, Motijheel, Dhaka-1000', NULL, 'Mr. Md. Tayeb Ali Sarker', 'Proprietor', '01972653252, 01672653252');
INSERT INTO `agencies` VALUES (166, 'East West Paradise', 0619, '291, Fakirapool, Jomidar Palace, Lift- 8, Inner Circular Road, Motijheel, Dhaka-1000', NULL, 'Mr. Yousuf Nobi', 'Managing Partner', '01975669195');
INSERT INTO `agencies` VALUES (167, 'Right Way Tours & Travels', 0699, 'House No.- CEN(C)-1, Road No.-95, Pladium Market, Gulshan-2, Dhaka-1212', NULL, 'Mr. Mohammed Nazir Miah', 'Managing Partner', '01711526667');
INSERT INTO `agencies` VALUES (168, 'Rahman Overseas', 0887, 'House No.-90, Road No.-17/A, Block-E, Banani, Dhaka-1213', NULL, 'Mr. S.M. Zillur Rahman', 'Proprietor', '01713017447, 01711833979');
INSERT INTO `agencies` VALUES (169, 'Zilani Travels', 0897, 'Plot No.- 2-3, Block-H, Road No.-N/S, Aftab Nagar, Eastern Housing, Badda, Gulshan, Dhaka', NULL, 'Mr. Mizanur Rahman Chowdhury', 'Proprietor', '01711560109');
INSERT INTO `agencies` VALUES (170, 'Pro Search Recruitment Consultants', 1027, 'City Heart (13th Floor), Suite No.-7, 67, Naya Paltan, Dhaka-1000', NULL, 'Mr. R.D. Roni', 'Proprietor', '01817094118');
INSERT INTO `agencies` VALUES (171, 'Al-Samit International Ltd.', 0474, 'House No.-21, Road No.-17/A (16th Floor), Block-C, Basati Horizon, Banani, Dhaka-1213', NULL, 'Mr. M.A. Salam', 'Managing Director', '01711538437');
INSERT INTO `agencies` VALUES (172, 'Max Management & Services', 1084, 'H-81, Bir Uttom Ziaur Rahman Road, 1st Floor, Banani, Dhaka-1213', NULL, 'Mr. Md. Mahfujur Rahman', 'Proprietor', '01713230066');
INSERT INTO `agencies` VALUES (173, 'The Magura Associate', 1145, 'Shatabdi Center, Suite No.- 11/B-1, Level-11, 292, Inner Circular Road, Fakirapool, Motijheel, Dhaka-1000', NULL, 'Mr. M. Rezaul Karim', 'Proprietor', '01712310709');
INSERT INTO `agencies` VALUES (175, 'Samiha International', 1232, '86/1, Inert Circular V.I.P  road, 1st Floor, Paltan, Dhaka-1000', NULL, 'Mr. Mohammad Nurul Hoque', 'Proprietor', '01715152236, 01989959636');
INSERT INTO `agencies` VALUES (176, 'M. Akter And Sons', 1284, 'Paradise Prosanti (3rd Floor), Malibagh, Chowshurypara, Dhaka-1219', NULL, 'Md. Al Amin', 'Proprietor', NULL);
INSERT INTO `agencies` VALUES (177, 'Matco Enterprise', 0250, '38, Kemal Ataturk Avenue, Banani C/A, Dhaka-1213', NULL, 'Mr. Md. Shafiqur Rahman', 'Proprietor', '01711891957');
INSERT INTO `agencies` VALUES (178, 'Maxim Trade & Co.', 0809, 'Suit No-2-C, Level-3, 292, Inner Circular Road, Fakirapool, Motijheel, Dhaka-1000', NULL, 'Mr. Md. Mahbubar Rahman', 'Managing Partner', '01711343939');
INSERT INTO `agencies` VALUES (179, 'Misfalah Overseas Ltd', 0607, 'House No.-8, Road No.17/A, Block-E, Banani, Dhaka-1213', NULL, 'Mr. Mir Marfat Ullah (Sumon)', 'Managing Director', '01819206995');
INSERT INTO `agencies` VALUES (180, 'Munshi Enterprise Ltd', 0986, 'Building No.-2, 413, Naya Nagar, Coca Cola Road, Gulshan, Vatara, Dhaka-1212', NULL, 'Mr. Raquib M. Fakhrul', 'Managing Director', '01611522500');
INSERT INTO `agencies` VALUES (181, 'Nabinagar Overseas Limited', 1719, '24/1, Chamelibag, 4th Floor, Shantinagar, Dhaka-1217', NULL, 'Mr. A.K.M. Jashim Uddin', 'Chairman', '01712288585, 01922180013');
INSERT INTO `agencies` VALUES (182, 'Okistar (Bangladesh) Co', 0393, '21, Rajuk Avenue, Paribahan Bhaban (6th Floor), Motijheel C/A, Dhaka-1000', NULL, 'Mr. Mohammad Siddiqur Rahman Bhuiyan', 'Proprietor', '01713118752');
INSERT INTO `agencies` VALUES (183, 'Pelikan International Ltd.', 0602, '122, D.I.T. Extension Road, 2nd Floor, Fakirapool, Motijheel, Dhaka-1000', NULL, 'Mr. Golam Mostafa', 'Proprietor', '01711952999');
INSERT INTO `agencies` VALUES (184, 'Pigeon Overseas', 0913, '55, Inner Circular Road, V.I.P. Road, 1st Floor, Shantinagar, Dhaka-1217', NULL, 'Mr. Saleh Ahmed', 'Managing Partner', '01711563072');
INSERT INTO `agencies` VALUES (185, 'Proceed Overseas', 1204, '53, Purana Paltan, Baitul Abed, 4th Floor, Dhaka-1000', NULL, 'Mr. Faij Ullah Shipon', 'Proprietor', '01819256916, 01726072178');
INSERT INTO `agencies` VALUES (186, 'Rahmania Corporation', 0176, 'House-23, Road No.-1/C, Nikunja-2, Khilkhet, Dhaka-1229', NULL, 'Mr. Md. Habibur Rahman', 'Proprietor', '01932777777');
INSERT INTO `agencies` VALUES (187, 'Rajdhani Overseas Agency', 0229, 'Pritom Bhaban (1st Floor), 215, Shahid Syed Nazrul Islam Sharani, Purana Paltan, Dhaka-1000', NULL, 'Mr. Md. Shahjahan Majumder', 'Proprietor', '01841804504');
INSERT INTO `agencies` VALUES (188, 'Surma International Ltd.', 0299, '44, Dilkusha C/A, 3rd Floor, Dhaka-1000', NULL, 'Mr. Md. Abdul Goffur Bhuiyan', 'Managing Director', '01711530369');
INSERT INTO `agencies` VALUES (189, 'The Turki Associate Ltd.', 0424, 'Nasir Trade Center, 89, Bir Uttam C.R. Datta Road, Old Sonargaon Road, Dhaka-1205', NULL, 'Mr. Mohd. Shahabuddin', 'Managing Director', '01770000002');
INSERT INTO `agencies` VALUES (190, 'Al-Brown Pearl', 0461, 'House No.-96, 3rd Floor-South, Road No.-13/A, Block-D, Banani, Dhaka-1213', NULL, 'Mr. Tofail Ahmed', 'Managing Partner', '01711549285');
INSERT INTO `agencies` VALUES (191, 'Al-Salim Overseas Agency', 0487, 'Aziz Co-operative Market, 3rd Floor, 204, Shahid Syed Nazrul Islam Sharani, 89, Bijoy Nagar, Dhaka-1000', NULL, 'Mr. Azizul Hoque Mazumder (Salim)', 'Proprietor', '01911353082');
INSERT INTO `agencies` VALUES (192, 'N.C.L. Overseas', 0717, 'Baliadi Mansion (3rd Floor), 16, Dilkusha C/A, Dhaka-1000', NULL, 'Mr. Md. Nazmul Ahsan Chowdhury', 'Managing Partner', '01711527979');
INSERT INTO `agencies` VALUES (193, 'Yambu Trade International', 0192, 'G-Nat Tower (6th Floor), 116-117, D.I.T. Extension Road, Fakirapool, Dhaka-1000', NULL, 'Mr. Md. Golam Mostafa', 'Managing Partner', '01713226600');
INSERT INTO `agencies` VALUES (194, 'Oasis Services', 0999, 'House No.- 9, 11th Floor, Road No.-2, Sector-3, Uttara, Dhaka-1230', NULL, 'Mr. Nazmul Huda Mehedi', 'Proprietor', '01711532065');
INSERT INTO `agencies` VALUES (195, 'I. Trade', 0485, 'Irving Rissta, 6th Floor, Gha-90/1, Link Road, Middle Badda, Dhaka-1212', NULL, 'Mr. A.K.M. Nazrul Islam', 'Proprietor', '01711533016');
INSERT INTO `agencies` VALUES (196, 'Orchid View Ltd.', 0477, 'H-79, Sikder Plaza, 5th Floor, Block-M, Chairman Bari, Banani, Dhaka-1213', NULL, 'Mr. Mohammad Obaidul Areef', 'Managing Director', '01933319991');
INSERT INTO `agencies` VALUES (197, 'Gram Bangla Overseas Ltd.', 1640, 'H-72, Bir Uttam Ziaur Raman Sarak, 5th Floor, Amtoli Mohakhali, Dhaka', NULL, 'Mr. S.M. Sohel Rana', 'Managing Director', '01819187582');
INSERT INTO `agencies` VALUES (199, 'Arab Bangla Associated', 1737, 'SR Garden, 52, Naya Paltan, Dhaka-1000', NULL, 'Mohammed Salim', NULL, NULL);
INSERT INTO `agencies` VALUES (200, 'MCO Trading International (Pvt.) Ltd', 0255, 'House No.-82, Road No.-11, Block-D, 9th Floor, Bir Uttam Khademul Bashar Sarak, Banani, Dhaka-1213', NULL, 'Mr. Quazi Sakhawat Hossain (Lintoo)', 'Chairman', '01710922947');
INSERT INTO `agencies` VALUES (201, 'Fams Trade International Company Ltd', 0655, 'House No. - 45, 3rd Floor, Road No.- 17, Block-E, Banani, Dhaka-1213', NULL, 'Alhaj Faruque Al-Mahmud', 'Chairman', '01711546956');
INSERT INTO `agencies` VALUES (202, 'Eastern Bay Bangladesh', 0479, '1 No. Fakirapool, Noorani Building 1st Floor, Dhaka-1000', NULL, 'Mr. Md. Gias Uddin', 'Proprietor', '01817003943');
INSERT INTO `agencies` VALUES (203, 'Panjery Global Service', 1572, '64/4, Saba Complex, 2nd Floor, Naya Paltan, Dhaka-1000', NULL, 'Mr. Md. Shamsul Alam', 'Managing Partner', '01912126620');
INSERT INTO `agencies` VALUES (204, 'Asia Continental Group (BD.)', 0523, 'House No.-7(3rd Floor), Road No.-7, Block-J, Baridhara Diplomatic Zone, Dhaka-1212', NULL, 'Mr. Lokman Shah', 'Proprietor', '01622648888');
INSERT INTO `agencies` VALUES (205, 'Al-Shupto Overseas', 0580, 'Shama Office Complex (9th Floor), 66/A, Naya Paltan (9th Floor), Shama Complex, Dhaka-1000', NULL, 'Mr. Farid Ahmed Mazumder', 'Proprietor ', '01911340275, 01713334614');
INSERT INTO `agencies` VALUES (206, 'Simplex International', 1022, 'City Heart (5th Floor), Suite No.- 6/1, VIP Road, 67, Naya Paltan, Dhaka-1000', NULL, 'Mr. Md. Abu Bakka', 'Managing Partner', '01715881036');
INSERT INTO `agencies` VALUES (208, 'Arobic Recruitment Consultant', 1461, 'House No.- 101, Fulu Tower, 7th Floor, Bir Uttam Ziaur Rahman Road, Banani, Dhaka-1213', NULL, 'Mr. Md. Mobarak Hosen', 'Proprietor', '01711376730, 01612338888');
INSERT INTO `agencies` VALUES (209, 'Rajdhani Trade International', 1201, '49, Shapla Bhaban, Motijheel C/A, Suite No.-807, 7th Floor, Dhaka-1000', NULL, 'Mr. Md. Tipu Sultan', 'Proprietor', '01973503090, 01534651318, 01713503090');
INSERT INTO `agencies` VALUES (211, 'Dreamer Overseas', 1747, '60/E/1, Purana Paltan, 5th Floor, Dhaka-1000', NULL, 'Mr. M.A. Hannan Howlader', 'Managing Partner', '01711980921');
INSERT INTO `agencies` VALUES (214, 'Al-Zuhoor International', 1311, 'A.R. Mollik Tower, 5th Floor, Room No.-03, 157, Sayed Nazrul Islam Sharani, old 12/1, Purana Paltan, Dhaka-1000', NULL, 'Mr. Mohammad Nazmul Ahsan', 'Proprietor', '01727530862');
INSERT INTO `agencies` VALUES (215, 'S.T.S. Overseas Ltd', 1158, '83/B, Mouchak Tower Shopping Complex, 4th Floor, Room No.-509, Malibaghmore, Dhaka-1217', NULL, 'Mr. Md. Tajuddin Shah', 'Managing Director', '01534525642');
INSERT INTO `agencies` VALUES (216, 'Mary Gold International', 0507, 'Soleman Plaza, 3/3-B, Purana Paltan, 162, Shahid Syed Nazrul Islam Sharani, Paltan, Dhaka-1000', NULL, 'Mr. Sharif Md. Shafiullah', 'Proprietor', '01681450299, 01858370844');
INSERT INTO `agencies` VALUES (217, 'Dacca Exports', 0265, '66/1, Sky View Trade Velly, 8th Floor, Lift-7, VIP Road, Naya Paltan, Dhaka-1000', NULL, 'Mr. A. Rahman (Lalon)', 'Managing Partner', '01711462642, 01911357177');
INSERT INTO `agencies` VALUES (218, 'Ahmed International', 1146, 'Islam Empire Estate, 55/1, Purana Paltan, 6th Floor, Dhaka-1000\r\n', NULL, 'Mr. Benjir Ahmed, M.P.', 'Proprietor', '01711625647');
INSERT INTO `agencies` VALUES (219, 'Miaz Tours & Travels', 1033, '171-176, Gulshan Shopping Centre, 3rd Floor, Gulshan-1, Dhaka-1212', NULL, 'Mr. Mohammad Miaz Bhuiyan', 'Proprietor', '01911311989');
INSERT INTO `agencies` VALUES (220, 'Al-Monir Enterprise Ltd.', 1742, 'Sikder Plaza, 5th Floor, House-79, Block-M, Bir Uttam Ziaur Rahman Sarak, Chairman Bari, Kakoli, Banani, Dhaka-1213', NULL, 'Mr. Sheikh Mohd. Monir Hossain', 'Managing Director', '01711522947');
INSERT INTO `agencies` VALUES (221, 'Alam Sons Ltd.', 0165, 'SW(I)-4, Gulshan Avenue, Gulshan-1, Dhaka-1212', NULL, 'Mr. Sk. Farid Ahmed', 'Managing Director', '01711527359');
INSERT INTO `agencies` VALUES (227, 'Mili Overseas Limited', 1920, '70/3, Naya Paltan, Paltan China Town (West), 18th Floor, Room No.- 19/4, Paltan, Dhaka-1000', NULL, 'Mr. Md. Ziaur Rahman', 'Managing Director', '01743948486');
INSERT INTO `agencies` VALUES (228, 'Sherpur International', 1445, '3/4-A, Purana Paltan, Sabbir Tower, 5th Floor, Dhaka-1000', NULL, 'Mr. Md. Solaiman Miah', 'Proprietor', '01720033448');
INSERT INTO `agencies` VALUES (231, 'Nazrul International Service', 1465, 'Kotiadi Westpara, Patpotti Road, Kotiadi, Kishoregonj', NULL, 'Mr. Jashim Uddin', 'Managing Partner', '01789801007');
INSERT INTO `agencies` VALUES (232, 'JBN Tours and Travel', 1864, '107 Motijheel,C/A,Khan Mansion,Dhaka-1000', NULL, NULL, NULL, '01726715192\r\n');
INSERT INTO `agencies` VALUES (233, 'Siddiqua Consultant', 1147, 'House No.-2, Flat No.-A/3, Road No.-4, Sector No.-1, Uttara, Dhaka-1230', NULL, 'Mrs. Bahreen Siddiqua', 'Proprietor', '01715528332');
INSERT INTO `agencies` VALUES (234, 'Gulf Overseas', 0825, 'H-87, New Airport Road, Kakuli, Banani, Dhaka-1213', NULL, 'Mr. Md. Mostak Hossain', 'Managing Partner', '01711529879, 01944600173');
INSERT INTO `agencies` VALUES (235, 'Nagar Overseas', 1286, '45, Topkhana Road, Tropicana Tower, 3rd Floor, Room No.-2/C, Dhaka-1000', NULL, 'Mr. Mostak Ahamed', 'Proprietor', '01819237948');
INSERT INTO `agencies` VALUES (236, 'Chowdhury Air International', 1642, '177, Shahid Syed Nazrul Islam Sharani, Mahtab Center (16th Floor), Bijoy Nagar, Dhaka-1000', NULL, 'Mr. Mohammed Mahtab Al Annom', 'Proprietor', '01679341777');
INSERT INTO `agencies` VALUES (238, 'Natasha Overseas', 1315, '1/A, Senpara Porbota, Shah Ali Plaza, Room No.- 1206, 11th Floor, Mirpur-10, Dhaka-1216', NULL, 'Mohammed Nazibur Rahman', 'Proprietor', '01911122269');
INSERT INTO `agencies` VALUES (239, 'An-Nafi Overseas', 1882, '28/1/c, Rahmania Inernational Complax (5th Floor), oom-9, Toyenbee Circular Rood, Motijheel, Dhaka-1000', NULL, 'Saidul  Islam', 'Managing Partner', '01783355389, 01977773742');
INSERT INTO `agencies` VALUES (240, 'Future Hope International', 1202, 'Bashati Horizon, Apartment-A/8, Plot No- 21, Road No- 17, Banani C/A, Dhaka-1213', NULL, 'Mr. Akhter Hossain', 'Proprietor', '01714498035, 01924440060');
INSERT INTO `agencies` VALUES (241, 'Royal Rose Overseas', 0472, 'Noorjahan Tower, Flat No.- A-1, 136, New Circular Road, 1st Floor, Bara Maghbazar, Ramna, Dhaka-1217', NULL, 'Mr. Mizanur Rahman Bhuiyan', 'Proprietor', '01756700006, 01979856774');
INSERT INTO `agencies` VALUES (242, 'Alpine Trade International', 1738, '62 habib Manson Kamal Ataturk Avenue, Bvanani, Dhaka-1213', NULL, 'Md. Barek Ali', 'Managing Partner', '01678140452, 01889142625');
INSERT INTO `agencies` VALUES (243, 'Gulf Associate', 0923, 'Jahan Bhaban, House No.- 87, New Airport Road, Banani, Dhaka-1213', NULL, 'Mr. A.R. Sawkut Ali', 'Proprietor', '01713049063');
INSERT INTO `agencies` VALUES (244, 'Gulf Associate', 0251, 'Eana Bhaban (1st Floor), Dag No.- 1132, Khilbarir Tak, Noorerchala Road, Vatara, Dhaka-1212', NULL, 'Mr. Md. Ashraf Ali Sardar', 'Proprietor', '01711535242, 01726852261');
INSERT INTO `agencies` VALUES (245, 'Sarder Trade & Employment Service Ltd.', 1694, 'Eana Bhaban, 2nd Floor, Dag No.- 1132, Khilbarir Tak, Noorerchala Road, Vatara, Dhaka-1212', NULL, 'Ms. Shamima Akter', 'Chairman', '01726852261, 01971535242');
INSERT INTO `agencies` VALUES (246, 'A.S. International', 0445, 'House No.- 15/1, Road No.- 5, Block-F, Banani Model Town, Dhaka-1213', NULL, 'Mr. Mohammed Anwar Hossain', 'Proprietor', '01713012018, 01613012018');
INSERT INTO `agencies` VALUES (247, 'Al Ajeer International Ltd.', 1438, 'AL Razi Complex 166-167 Sheaheed Syed ', NULL, NULL, NULL, NULL);
INSERT INTO `agencies` VALUES (248, 'KBS Global Trade & HR Solutions', NULL, '152, Senpara Parbota (4th Floor), North Side Of Al-Helal Hospital, Mirpur-10, Dhaka-1216', NULL, 'Mahfuzar Rahim Mahfuz', 'Proprietor', '01712005790,   01714137355    ');
INSERT INTO `agencies` VALUES (249, 'S. Munshi Overseas', 1246, 'H-99, 2nd Floor, Bir Uttam Ziaur Rahman Road, C/A, Banani, Dhaka-1213', NULL, 'Mrs. Josna Begum', 'Proprietor', '01713002160');
INSERT INTO `agencies` VALUES (250, 'Nova Associates', 1015, '126, Motijheel C/A, 3rd Floor, Dhaka-1000', NULL, 'Ion Md. Shafiq Ullah Nantu', 'Proprietor', '01711523228, 01977523228');
INSERT INTO `agencies` VALUES (251, 'Sea-Cell Bangladesh Ltd', 0698, 'Tropical Gulfesha Plaza, 13th Floor, 13-D, 8, Shahid Sanbadik Selina Parveen Sarak, Moghbazar, Dhaka-1217.', NULL, 'Mr. Md. Mezbah Uddin', 'Managing Director', '01973008012');
INSERT INTO `agencies` VALUES (252, 'Baladil Amin International', 0792, 'House No.-1, Road No.-95, Suite No.-3/A, Palladium Market, 4th Floor, Gulshan, Dhaka-1212', NULL, 'Mr. Jamal Uddin Ahmad', 'Proprietor', '01675018838, 01552342742');
INSERT INTO `agencies` VALUES (253, 'S. Anowar Overseas Ltd.', 1373, 'Eastern View (12th Floor), Room No.-12/4-9, 50, D.I.T. Extension Road, Nayapaltan, Dhaka-1000', NULL, 'Mr. Md. Anowar Hossain', 'Managing Director', '01820293787, 01864154539, 01627000300');
INSERT INTO `agencies` VALUES (254, 'Huda Overseas Ltd.', 1778, 'BH Plaza, 4th Floor, K-50-2, Abdul Aziz Road, Jagannathpur, Progati Sarani, Vatara, Dhaka-1229', NULL, 'Mr. Nazmul Huda', 'Managing Director', '01794744137');
INSERT INTO `agencies` VALUES (255, 'Mamota Associates Ltd.', 0826, 'Banani Super Market cum Housing Complex, Room No.- 19, 2nd Floor, Banani, Dhaka-1213', NULL, 'Mr. Mohammad Oli Ullah', 'Managing Director', '01711642023, 01711524594, 01723364581');
INSERT INTO `agencies` VALUES (256, 'Perfect International', 0592, '32, D.I.T. Extension Road, 2nd Floor, Naya Paltan, Dhaka-1000', NULL, 'Mr. Md. Shajahan (Shaju)', 'Proprietor', '01711642261, 01685817069');
INSERT INTO `agencies` VALUES (257, 'General Trading Company', 0320, 'Aziz Co-operative Market (4th Floor), 204, Shahid Sayed Nazrul Islam Sharani, 89 Old, Bijoy Nagar, Dhaka-1000', NULL, 'Mr. Mohd. Khalilur Rahman', 'Proprietor', '01711642259, 01977642259, 01711909720, 01924593923');
INSERT INTO `agencies` VALUES (258, 'Falah International', 0589, 'Aziz Co-operative Market, 1st Floor, 204, Shahid Syed Nazrul Islam Sharani, Bijoy Nagar, Dhaka-1000', NULL, 'Mr. Md. Ruhul Amin', 'Proprietor', '01711642251, 01971642251');
INSERT INTO `agencies` VALUES (259, 'Setu Air Aviation Ltd.', 1048, 'B.H. Plaza, Ka-50/2, Jagonnathpur, Shahid Abdul Aziz Sarak, Progati Sarani, Vatara, Dhaka-1229', NULL, 'Mr. Masud Alam', 'Managing Director', '01716773211');
INSERT INTO `agencies` VALUES (260, 'Modhumoti Overseas', 0610, '147/3, D.I.T. Extension Road, 2nd Floor, Dhaka-1000', NULL, 'Mr. Fazle Akber Chowdhury', 'Proprietor', '01731854670, 01711642012, 01713001681');
INSERT INTO `agencies` VALUES (261, 'Idea International Ltd.', 0953, 'House No.- 2, Road No.- 7, Block-J, Baridhara, Dhaka-1212', NULL, 'Mr. Golam Mostafa', 'Chairman', '01619256134, 01979256134');
INSERT INTO `agencies` VALUES (262, 'Al-Khamis International', 0680, 'Sama Office Complex (4th Floor), 66/A, Naya Paltan, VIP Road, Dhaka-1000', NULL, 'Mr. Md. Farid Ahamed', 'Proprietor', '01711521294');
INSERT INTO `agencies` VALUES (263, 'Shaikat Trade International', 0869, 'BH Plaza, Ka-50/2, Abdul Aziz Sharak, Jagannathpur, Progoti Sarani, Norda (Vatara), Dhaka-1229', NULL, 'Mr. Mohammed Gias Uddin', 'Proprietor', '01712176501');
INSERT INTO `agencies` VALUES (264, 'Al-Noor International', 0689, 'SR Garden, 52, Rajuk Road, Naya Paltan, Paltan, Dhaka-1000', NULL, 'Mr. Mohammad Abu Bakar Siddique', 'Proprietor', '01711549700, 01711828810');
INSERT INTO `agencies` VALUES (265, 'Patwary Trade Center', 1397, 'Patwary Trade Center', NULL, 'Ms. Rokshana Akther', 'Proprietor', '01917523657');
INSERT INTO `agencies` VALUES (266, 'Aman Enterprise', 0724, '40/1, 1st Floor, Inner Circular Road (V.I.P. Road), Naya Paltan, Dhaka-1000', NULL, 'Mr. Md. Rafiqul Islam Patwary', 'Proprietor', '01711523657');
INSERT INTO `agencies` VALUES (267, 'Al-Marwah Overseas', 0156, 'Shama Office Complex, 6th Floor, 66/A, Naya Paltan, V.I.P. Road, Dhaka-1000', NULL, 'Mr. Payer Ahmed', 'Proprietor', '01711520547');
INSERT INTO `agencies` VALUES (268, 'Manikgonj Overseas', 1497, 'Bashati Condominium, 3rd Floor, House No.-15, Road No.-17, Banani C/A, Dhaka-1213', NULL, 'Mr. Mohammad Awlad Hossain', 'Proprietor', '01976019840, 01726019840, 01775553120');
INSERT INTO `agencies` VALUES (269, 'Ahnaf Ayat Associates Ltd.', 1773, 'House No.-70, 3rd Floor, Road No.-11, Block-D, Banani, Dhaka-1217', NULL, 'Mr. Nazrul Islam', 'Managing Director', '01715528325, 01838333880, 01975528325');
INSERT INTO `agencies` VALUES (270, 'Kabir Enterprise', 0230, 'House No.- 47, Road No.-17, 4th Floor, Banani Bazar, Dhaka-1213', NULL, 'Mr. A.H.M. Golam Kabir', 'Proprietor', '01711526024, 01552639730');
INSERT INTO `agencies` VALUES (271, 'Mab Associates', 0650, 'Monihar Classic, 6th Floor, 56, Shantinagar, Naya Paltan, Dhaka-1217', NULL, 'Mr. Mohammed Abul Barakat Bhuiyan', 'Proprietor', '01678343400, 01612031987');
INSERT INTO `agencies` VALUES (272, 'Provati International', 0932, 'H-79, Block-A, 1st Floor, Zia International Airport Road, Chairman Bari, Banani, Dhaka-1213', NULL, 'Mr. Mohammad Ashraf Uddin', 'Proprietor', '01819202857, 01688075952');
INSERT INTO `agencies` VALUES (273, 'Port City International Ltd.', 1338, '134, D.I.T. Extension Road, 2nd Floor, Fakirapool, Dhaka-1000', NULL, 'Mr. Mohammed Badiul Alam', 'Director', '01716154664, 01819455299');
INSERT INTO `agencies` VALUES (274, 'Sattar Overseas and Business International Ltd.', 0873, '147/A-2, 2nd Floor, Monipuripara, Tejgaon, Dhaka-1215', NULL, 'Advocate Md. Abdus Sattar', 'Managing Director', '01711523628');
INSERT INTO `agencies` VALUES (275, 'legants Overseas Ltd.', 0544, 'H-87, New Airport Road, Zahan Bhaban (3rd Floor), Kakuli, Banani, Dhaka-1213', NULL, 'Mr. Mizanur Rahman', 'Managing Director', '01711462836, 0155807814');
INSERT INTO `agencies` VALUES (276, 'Toushi International Ltd.', 1608, '67, Naya Paltan, City Heart Shopping Complex, Suite-13/4, VIP Road, Dhaka-1000', NULL, 'Mr. Mosharraf Hossain', 'Managing Director', '01713010174, 01613010174, 01613010174');
INSERT INTO `agencies` VALUES (277, 'Pavilion Recruitment And Services Limited', 1630, 'Head Off.: House no.-30, Road No.-18, Block-A, Banani, Dhaka-1213. Branch Off.: House No.-84, Bir Uttom Ziaur Rahman Road, Banani C/A, Dhaka-1213', NULL, 'Mr. S.M. Mahbubur Rahman', 'Managing Director', '01789231159');
INSERT INTO `agencies` VALUES (279, 'Rezwan Overseas', 1360, '204, Shahid Syed Nazrul Islam Sharani, Aziz Co-operative Society, 6th Floor, Bijoynagar, Dhaka-1000', NULL, 'Mr. Md. Delwar Hossain (Jashim)', 'Proprietor', '01552426522, 01727615085, 01711432323');
INSERT INTO `agencies` VALUES (280, 'M/S. Al-Maria International', 1561, 'H-90(3rd Floor),Bir Uttam Ziaur Rahman Sarak,Banani,Dhaka-1213', NULL, 'Md. Belal Hossain', 'Proprietor', '01712446661');
INSERT INTO `agencies` VALUES (281, 'Tisha International', 1025, '319, Bara Moghbazar, 1st Floor, Dhaka-1217', NULL, 'Mr. Md. Faruk Ahmed', 'Proprietor', '01720369584, 01720557834');
INSERT INTO `agencies` VALUES (282, 'Nac International', 0326, 'House No.-79 (6th Floor), Block.-M, Bir Uttam Ziaur Rahman Shwrak, Shikder Plaza, Chairman Bari, Banani, Dhaka-1213', NULL, 'Mr. Abdur Rakib Mukul', 'Managing Partner', '01711531578, 01972518444');
INSERT INTO `agencies` VALUES (283, 'Haque International Company', 0046, 'H-86, Amina Bhaban, 2nd Floor, International Airport Road, Banani, Dhaka-1213', NULL, 'Mr. Mohammad Enamul Haque', 'Proprietor', '01552456521, 01911344012, 01552456520');
INSERT INTO `agencies` VALUES (284, 'Trade Care International', 0899, 'House No.- 104, Road No.-3, Block-F, Banani, Dhaka-1213', NULL, 'Mr. Khan A. Salam', 'Managing Partner', '01755670939, 01713004025');
INSERT INTO `agencies` VALUES (285, 'M/S. SS Tours International', 1570, 'Twin Brooks, House-8, Road-2B, Apt-B5, Block-J, Baridhara, Dhaka', NULL, 'Md. Lahuar Rahman', 'Proprietor', '01711162093,  01977162093');
INSERT INTO `agencies` VALUES (286, 'Khan International', 1552, 'Navana Rahim Ardent, (6th Floor), Suite# B6, 185, Shahid Sayed Nazrul Islam Sarani, Bijoynagar, Dhaka-1000', NULL, 'Md. Sohrab Hossain Khan', 'Managing Partner', '01819183168');
INSERT INTO `agencies` VALUES (287, 'DBS World Employment', 1725, 'Jahan Bhaban, 1st Floor, H-87, Bir Uttam Ziaur Rahman Road, Banani, Dhaka-1213', NULL, 'Mr. Md. Sharif Hossain', 'Proprietor', '01920446066, 01707999008, 01759714008');
INSERT INTO `agencies` VALUES (288, 'Nissan & Brothers', 1452, 'Chowdhury Tower, 3rd Floor, North West Corner, 5, Hossain Shahid Sohorwardy Road, Kotwali, Chittagong', NULL, 'Mr. Uttam Kumar Aich', 'Proprietor', '01819395840, 01819314633');
INSERT INTO `agencies` VALUES (289, 'Universal Overseas', 1077, 'House No.- 24, 1st Floor, Road No.-8, Block-F, Banani, Dhaka-1213', NULL, 'Mr. A.K.M. Bazlur Rahman', 'Proprietor', '01713006752');
INSERT INTO `agencies` VALUES (290, 'H A M International Ltd', 1487, '47, Naya Paltan (1st Floor), Dhaka-1000', NULL, 'Mr. Md. Anisur Rahman ', 'Managing Director', '01720-463303');
INSERT INTO `agencies` VALUES (291, 'Karnafully Recruiting Agency Ltd.', 1337, '8/A, Hossain Market, 2nd Floor, Bahaddar Hat Moor, Chattogram', NULL, 'Mr. Md. Ala Uddin', 'Chairman', '01818722862');
INSERT INTO `agencies` VALUES (292, 'Life Line International', 1011, 'Suite No.- 8/7, 8th Floor, Gulistan Shopping Complex, 2, Bangabandhu Avenue, Dhaka-1000', NULL, 'Mr. Monir Hossain', 'Proprietor', '01713038667');
INSERT INTO `agencies` VALUES (293, 'Emasek (Pvt.) Ltd.', 0874, 'Suite No.-8/7, 8th Floor, Gulistan Shopping Complex, 2, Bangabandhu Avenue, Gulistan, Dhaka-1000', NULL, 'Ms. Ferdousi Monir Lily', 'Managing Director', '01601303999');
INSERT INTO `agencies` VALUES (294, 'Al-Gifari International', 1176, 'Eastern View Complex, 6th Floor, 50, D.I.T. Extension Road, Naya Paltan,Dhaka-1000', NULL, 'Mr.', 'Proprietor', '01819470345, 01687453140');
INSERT INTO `agencies` VALUES (295, 'Shamim Travels', 0163, 'H-84, Hazi Shahabuddin Mansion, 2nd Floor, Bir Uttam Ziaur Rahman Sarak, Kakoli, Banani, Dhaka-1213', NULL, 'Mr. Mohammed Ali', 'Managing Partner', '01713322910, 01970106710');
INSERT INTO `agencies` VALUES (296, 'Barcelona Overseas (Pvt.) Ltd.', 1380, '3/1, 2-B, Box Culvert Road (1st Floor), Naya Paltan, Paltan, Dhaka', NULL, 'Mr. Mohammed Abdul Halim', 'Managing Director', '01711453470, 01856423440');
INSERT INTO `agencies` VALUES (297, 'Fatema Overseas', 1205, 'House No.-81, 3rd Floor, Bir Uttam Ziaur Rahman Road, Banani C/A, Dhaka-1213', NULL, 'Mr. Md. Kabir Hossain', 'Proprietor', '01713270599');
INSERT INTO `agencies` VALUES (298, 'Easel Overseas Ltd.', 1140, '1/8, Block-G, Lalmatia, Dhaka-1207', NULL, 'Mr. Khandker Wahed Murad', 'Chairman', '01713035964, 01973035964');
INSERT INTO `agencies` VALUES (299, 'Eastern Buisness Associate Ltd.', 0064, '70/F, Purana Paltan Line, 2nd Floor, Naya Paltan, Dhaka-1000', NULL, 'Mr. Md. Waliullah', 'Managing Director', '01724650976');
INSERT INTO `agencies` VALUES (300, 'MP Travels Ltd', 1128, 'Shapla Bhaban, 4th Floor, Suite No.-502/504, 49, Motijheel C/A, Dhaka-1000', NULL, 'Mr. Md. Rafiqul Islam', 'Managing Director', '01715428713');
INSERT INTO `agencies` VALUES (301, 'Sarker Manpower Export Ltd.', 1705, 'Shawon Tower, 5th Floor, 2/C, Purana Paltan, Dhaka-1000', NULL, 'Mr. Nasir Uddin Sarker', 'Managing Director', '01923616134');
INSERT INTO `agencies` VALUES (302, 'NRB Recruiting Agencies', 1632, '51, Central Road, Dhanmondi, Dhaka-1205', NULL, 'Mr. Mohammed Younus', 'Proprietor', '01620010431');
INSERT INTO `agencies` VALUES (303, 'Elahi Enterprise', 1070, 'Akram Tower, 3rd Floor, Suite No.-6, 15/5, Bijoy Nagar, Dhaka-1000', NULL, 'Mr. Mohammed Ebadat Hossain', 'Proprietor', '01711532047');
INSERT INTO `agencies` VALUES (304, 'Progress M.M. International Ltd.', 1008, '47, D.I.T. Extension Road, 3rd Floor, Fakirapool, Dhaka-1000', NULL, 'Mr. Jubair Haider Mojumder', 'Managing Director', '01720184248, 01719082834');
INSERT INTO `agencies` VALUES (305, 'Madina Overseas', 0639, '165 (Old), 47 (New), D.I.T. Extension Road, 4th Floor, Fakirapool, Dhaka-1000', NULL, 'Mr. Nasir Uddin Mojumder (Siraj)', 'Proprietor', '01713012071, 01985758599');
INSERT INTO `agencies` VALUES (307, 'Al Fattah Overseas Ltd.', 1501, '51/1, V.I.P. Tower, Naya Paltan, Dhaka-1000', NULL, 'Mr. Md. Younus Khan (Alal)', 'Managing Director', '01716420597, 01841266144');
INSERT INTO `agencies` VALUES (308, 'Aariz Enterprise', 1269, 'Eastern View Commercial Complex, 8th Floor, Suite No.-4, 5, 6, 50, D.I.T. Extension Road, Fakirapool, Dhaka-1000', '8356285', 'Mr. Syed Babar Uddin', 'Proprietor', '01711593303,01720340127');
INSERT INTO `agencies` VALUES (309, 'Air Connection Overseas Ltd.', 0716, 'Al-Razi Complex, 2nd Floor, Suite No.-203, 166/167, Shahid Syed Nazrul Islam Sharani, Purana Paltan, Dhaka-1000', '9551532, 9559767 (Off.), 8361122', 'Mr. Md. Alamgir', 'Managing Director', '01552637898, 01817612825');
INSERT INTO `agencies` VALUES (310, 'Al-Saad Labour Supply', 0939, '359, Ranjoni Para, Barua, Khilkhet, Dhaka-1229', NULL, 'Mrs. Farhana Kadir Rahman', 'Proprietor', '01711891957');
INSERT INTO `agencies` VALUES (311, 'Al-Zam Zam International Ltd.', 0948, 'H.M. Siddique Mansion, 5th Floor, 55/A, Purana Paltan, Dhaka-1000', NULL, 'Mr. S.M. Rahman', 'Managing Director', '01715933111');
INSERT INTO `agencies` VALUES (312, 'Anik Industrial Enterprise Ltd.', 0306, 'Anik Plaza, House No.-155, Road No.-1, Block-A, Mirpur-12, Pallabi, Mirpur, Dhaka-1216', NULL, NULL, 'Managing Director', '01714171913, 01819221552');
INSERT INTO `agencies` VALUES (313, 'Balaka Trade International Ltd.', 0640, 'Shanjari Tower, 6th Floor, Flat No.- 7-D, 78, Nayapaltan, Dhaka-1000', '9342675 (Off.)', 'Mr. Md. Emran Hossain', 'Managing Director', '01711538611, 01911308939');
INSERT INTO `agencies` VALUES (314, 'Silver Line Associate', 0008, 'Silver Tower, 3rd Floor, 52, Gulshan-1, Dhaka-1212', NULL, 'Mr. M.A.H. Salim, Ex. M.P.', 'Proprietor', '01711596960');
INSERT INTO `agencies` VALUES (315, 'Sky View International', 1375, 'Chowdhuri Drem (3rd Floor), 25/2, Purana Paltan Lane, Dhaka-1000', NULL, 'Mr. Shaheen Babu', 'Managing Partner', '01914328239, 01757107977, 01752726820');
INSERT INTO `agencies` VALUES (316, 'Sonali Enterprise', 0439, '3, Shahid Tajuddin Ahmed Sharani, Moghbazar, Dhaka-1217', '8322761 (Off.), 8833795 (Res.)', 'Mr. Md. Bellal Hossain Bhuiyan', 'Managing Partner', '01733554252');
INSERT INTO `agencies` VALUES (317, 'Ahlam Trade International', 0189, '36/E, Purana Paltan, Ground Floor, Dhaka-1000', '9552366, 9553096 (Off.)', 'Mr. Jahangir Alam', 'Managing Partner', '01819226423, 01715995899');
INSERT INTO `agencies` VALUES (318, 'Al-Shahadat Overseas', 1222, 'House No.-7 (1st Floor), Road No.- 08, Block-J, Baridhara, Dhaka-1212', '8831355, 8831529 (Off.)', 'Mr. Shahadat Hossain', 'Proprietor', '01713000588, 01913000588');
INSERT INTO `agencies` VALUES (319, 'Al-Sarwar Overseas', 0400, 'Baitul Abed, 1st Floor, 53, Purana Paltan, Dhaka-1000', '9561743, 9569555, 9571777 (Off.), 48318283 (Res.)', 'Mr. Md. Abdus Sobhan', 'Proprietor', '01768661199, 01715592939, 01793555999');
INSERT INTO `agencies` VALUES (320, 'Al-Razi Internatiional', 0875, 'Sabbir Tower, 2nd Floor, 3/4-A, Purana Paltan, Dhaka-1000', '9578310 (Off.)', 'Mr. Sarwar Jahan Bakul', 'Managing Partner', '01928519629');
INSERT INTO `agencies` VALUES (321, 'Chemtex Overseas Ltd.', 1157, 'Aeysha Shopping Complex, 2nd Floor, 85, New Circular Road, Shiddhesshori, Shantinagar, Dhaka-1217', '9344945, 9344958 (Off.)', 'Mr. S.M. Nazmul Haqe', 'Managing Director', '01843333358, 01843333359');
INSERT INTO `agencies` VALUES (322, 'Faith Air International Ltd.', 0842, '116/1, Fakirapool, D.I.T. Extension Road, Dhaka-1000', NULL, 'Mr. Abu Taher Mazumder', 'Managing Director', '01625117471, 01771452202, 01670794175');
INSERT INTO `agencies` VALUES (323, 'Federal Trading Corporation Ltd.', 0110, '177, Mahatab Center, 6th Floor, Shaheed Sayed Nazrul Islam Sharani, Dhaka-1000', NULL, 'Mr. A.N.M. Motasim Billah', 'Executive Director', '01711530484, 01713004061');
INSERT INTO `agencies` VALUES (324, 'Famous Overseas Ltd.', 0231, '168, Shaheed Syed Nazrul Islam Sharani, (3/1-J, Purana Paltan, Dhaka-1000', '9572162, 9582063, 9582052 (Off.)', 'Mr. Shahabuddin Ahmed', 'Managing Director', '01711565767, 01726946028');
INSERT INTO `agencies` VALUES (325, 'Golden Arrow Ltd.', 0534, 'House No.-83, Road No.-4, Block-B, Banani, Dhaka-1213', '55035054, 55035059 (Off.)', 'Mr. Mostafizur Rahman', 'Managing Director', '01711543308, 01971543308');
INSERT INTO `agencies` VALUES (326, 'Golden Hope Overseas', 0557, 'Gulistan Shopping Complex, 8/15, 8th Floor, 2, Bangabandhu Avenue, Dhaka-1000', NULL, 'Mr. Ali Akbar Khan', 'Proprietor', '01711540961, 01552421357');
INSERT INTO `agencies` VALUES (327, 'Highway International', 0027, '40/1-D, 1st Floor, Inner Circular Road, Nayapaltan, Dhaka-1000', '9349010 (Off.)', 'Mr. Mohd. Abul Kalam', 'Proprietor', '01816006236, 01672397527');
INSERT INTO `agencies` VALUES (328, 'Index Corporation Ltd.', 1195, 'House No.-11 (6th Floor), Road No.-17, Block-D, Banani, Dhaka-1213', '9821777 (Off.)', 'Dr. Md. Abdur Rahim Khan', 'Chairman', '01937761111, 01711822314');
INSERT INTO `agencies` VALUES (329, 'Instance International Ltd.', 0511, '65/2/1, Paramount Height, 4th Floor, Suite No.- 4B, Box Culvert Road, Purana Paltan, Dhaka-1000', NULL, 'Mr. Morshedul Ahsan', 'Managing Director', '01916576644, 01842576644');
INSERT INTO `agencies` VALUES (330, 'Islamia International', 0373, '1/A, D.I.T. Extension Road, Fakirapool, Dhaka-1000', '7191519, 7191775, 9341084 (Off.), 7253263 (Res.)', 'Mr. Alauddin Ahmed', 'Proprietor', '01711524019');
INSERT INTO `agencies` VALUES (331, 'Joti Trade International', 0762, 'AK Mansion, 3rd Floor, 59/3/3, Purana Paltan, Dhaka-1000', '9581450, 9561736 (Off.)', 'Mr. Mohammad Abdullah', 'Proprietor', '01933952755, 01924742939');
INSERT INTO `agencies` VALUES (332, 'Kia Trade International', 0753, 'AK Mansion, 3rd Floor, 59/3/3, Purana Paltan, Dhaka-1000', '9581450, 9561736 (Off.)', 'Mr. Hemayet Hossain Khokon', 'Proprietor', '01729423111, 01979423111');
INSERT INTO `agencies` VALUES (333, 'Link Persons International Ltd.', 0036, 'House No.- 88, Road No.-13/A, Block-D, Banani, Dhaka-1213', '8824415 (Off.), 9854833 (Res.)', 'Mr. Mohammed Furkan Uddin', 'Managing Director', '01714069309, 01971113222');
INSERT INTO `agencies` VALUES (334, 'Ma Moni Overseas Ltd.', 1635, '56, Purana Paltan, Shokh Center, Dhaka-1000', '47124358 (Off.)', 'Mr. Sheikh Iqbal', 'Managing Director', '01711248025, 01864068748');
INSERT INTO `agencies` VALUES (335, 'MAM Overseas International', 1107, 'House No.- 31, 3rd Floor, Road No.- 1/A, Block-I, Banani, Dhaka-1213', '9871079, 9871077 (Off.)', 'Mr. Shahid-E-Monzur Masum', 'Proprietor', '01919525666');
INSERT INTO `agencies` VALUES (336, 'Manpower Asia', 0061, '145, Saleh Sadan, Motijheel C/A, Dhaka-1000', '9559629 (Off.)', 'Mr. Kafil Uddin Khan', 'Proprietor', '01720666330');
INSERT INTO `agencies` VALUES (339, 'Landmark Network', 0662, 'Nasir Trade Center, 89, Bir Uttam C.R. Datta Road, Old Sonargaon Road, Dhaka-1205', '9669178 (Off.)', 'Mr. Abdullah-Al-Fuad', 'Managing Partner', '01713003521');
INSERT INTO `agencies` VALUES (343, 'Marvellous Trading International Ltd.', 0581, '51/51-A, Purana Paltan, Paltan City, 2nd Floor, Suite No.-306, Dhaka-1000', NULL, 'Mr. Md. Fazlul Hoque', 'Managing Director', '01843444123, 01819272648');
INSERT INTO `agencies` VALUES (344, 'Marvellous Overseas', 0843, '48/A-B, Purana Paltan, Baitul Khair Mansion, 3rd Floor, Dhaka-1000', '9562274 (Off.)', 'Mr. A.K. Md. Shahab Uddin', 'Partner', '01819227284');
INSERT INTO `agencies` VALUES (345, 'Masum Brothers Syndicate', 0952, '49, Motijheel C/A, Ground Floor, Dhaka-1000', '9550722, 9552352 (Off.), 8315994 (Res.)', 'Mr. Md. Ataur Rahman Khan, Ex. M.P.', 'Proprietor', '01711566727, 01971566727');
INSERT INTO `agencies` VALUES (346, 'Meezab World Wide Service', 0828, 'Jiban Bima Tower (7th Floor), 10, Dilkusha C/A, Dhaka-1000', '9580161, 9578764 (Off.), 9002844 (Res.)', 'Mr. Md. Osman Kabir', 'Proprietor', '01711591831');
INSERT INTO `agencies` VALUES (347, 'Meridian International (Pvt.) Ltd.', 0077, 'Registered Office: 1st Floor, 165 D.I.T. Extension Road, Fokirapool, Dhaka-1000 Corporate Office: 7th Floor, Plot.-48, Road.-11, Block.-F, Banani', '9870456, 9870447 (Off.)', 'Mr. Rajeeb Hussain', 'Managing Director', '01713041712, 01781859502');
INSERT INTO `agencies` VALUES (348, 'Metropolitan International', 0117, 'Shama Complex (2nd Floor), 66/A, Nayapaltan, Dhaka-1000', '+88-02-58313149, +88-02-58313150, +88-02-58313152', 'Birmuktijuddah Mohammad Tajul Islam', 'Proprietor', '+8801713009802, +8801534522118');
INSERT INTO `agencies` VALUES (349, 'Millennium Air Services Ltd.', 0766, 'Akram Tower, 3rd Floor, Suite No..- 2, 199, Shahid Syed Nazrul Islam Sharani, Bijoy Nagar, Dhaka-1000', '9330013 (Off.), 48312639 (Res.)', 'Mr. Mohammed Sayed', 'Managing Director', '01711683789, 01799900241');
INSERT INTO `agencies` VALUES (350, 'Minar International', 0054, 'House No.- 15, Road No.- 23, Block-B, Banani, Dhaka-1213', NULL, 'Dr. J.H. Gazi', 'Proprietor', '01790226633, 01670600088');
INSERT INTO `agencies` VALUES (351, 'Mithu Associates', 0438, '183, Shahid Sayed Nazrul Islam Sharani, 1st Floor, Bijoynagar, Dhaka-1000', NULL, 'Mr. Md. Bahauddin', 'Managing Director', '01821878699');
INSERT INTO `agencies` VALUES (352, 'Moktar International', 1115, 'Siraj Tower, 2nd Floor, Plot No.- H-89/2, Kakoli, Banani, Dhaka-1213', NULL, 'Mr. Md. Abu Saeed', 'Proprietor', '01711168345, 01615882288');
INSERT INTO `agencies` VALUES (353, 'Moon Overseas', 0937, '14/2, Kakrail, 1st Floor, (12/17, Shantinagar Bazar Road), Dhaka-1000', '9356145, 8331318, 9335186 (Off.), 9347895 (Res.)', 'Mr. Md. Mahbubul Alam Aziz', 'Proprietor', '01711524135');
INSERT INTO `agencies` VALUES (355, 'Muktijoddha Paribar Unnayan International Ltd.', 0800, '78/E, Purana Paltan Lane, 4th Floor, Bijoynagar, Dhaka-1000', NULL, 'Mr. M.M. Mizanur Rahman', 'Managing Director', '01711107907');
INSERT INTO `agencies` VALUES (356, 'Near & Far Travels & Employment', 0964, 'House No.-1, Flat No.- B-1, Road No.-28, Sector-7, Uttara, Dhaka-1230', NULL, 'Mr. Md. Ghulam Habib (Dulal), Ex. M.P.', 'Proprietor', '01711564800, 01819214519');
INSERT INTO `agencies` VALUES (357, 'Neighbour Overseas Ltd.', 1164, 'Paltan Chaina Town, 9th Floor, Suite No.- 9/8, West Bhaban, 68, Naya Paltan, Dhaka-1000', '7191720, 7193558 (Off.)', 'Kazi Zahirul Islam (Babul)', 'Managing Director', '8801819194022, 8801716366061, 8801842366061,');
INSERT INTO `agencies` VALUES (358, 'Nams Associate', 0950, '86, New Airport Road, Amina Bhaban (4th Floor), Kakoli, Banani, Dhaka-1213', '9890827, 9890872, 9870369 (Off.), 8900597, 8900598 (Res.)', 'Mr. Ashraf Aziz', 'Proprietor', '01711525763, 01919525763');
INSERT INTO `agencies` VALUES (359, 'Nirvana International', 0623, 'Plot No.-13, Flat No.- B/1, Road No.- 113/A, Gulshan-2, Dhaka', NULL, 'Mr. H.B.M. Zahidur Rahman', 'Proprietor', '');
INSERT INTO `agencies` VALUES (360, 'Oasis Trade Ltd.', 0908, '40/1, Naya Paltan, V.I.P. Road, 6th Floor, Dhaka-1000', NULL, 'Mr. Golam Nobi', 'Managing Director', '01711352154');
INSERT INTO `agencies` VALUES (361, 'Pacific Trading and Contracting Co. Ltd.', 0512, '42/1, Shegun Bagicha, 3rd Floor, Dhaka-1000', NULL, 'Mr. Md. Babul Sheikh', 'Managing Director', '01796525404, 01833849644');
INSERT INTO `agencies` VALUES (362, 'Pan Bright Trade International', 0658, '29, Toyenbee Circular Road, Motijheel C/A, Dhaka-1000', '9567026, 47114388 (Off.)', 'Mr. Md. Ruhul Amin (Mintu)', 'Managing Partner', '01711562047, 01933880000');
INSERT INTO `agencies` VALUES (363, 'Penguin International Ltd.', 0369, 'House No.-10, Road No.- 16/A, Gulshan-1, Dhaka-1212', '9886106 (Off.)', 'Mr. Mizanur Rahman', 'Chairman', '01819213730');
INSERT INTO `agencies` VALUES (364, 'PMP International Company', 0083, 'PMP Plaza, 14, Kamal Ataturk Avenue, Banani C/A, Dhaka-1213', '9861676, 9898342, 9894513 (Off.), 9896459 (Res.)', 'Mr. Jahangir Kabir Chowdhury', 'Proprietor', '');
INSERT INTO `agencies` VALUES (365, 'Polytrade International Ltd.', 0404, '19(New), Tejgaon I/A, Dhaka-1208', '8878111-5 (Off.), 9883683 (Res.)', 'Mr. Mohammed Zahirul Islam', 'Managing Director', '01711526479');
INSERT INTO `agencies` VALUES (366, 'Prestige International Ltd.', 0232, 'A.H. Tower, 7th Floor, Plot No.- 56, Road No.- 2, Sector No.- 3, Uttara Model Town, Dhaka-1230', '55093876, 55093877 (Off.)', 'Mr. Shah Zakir Hossain', 'Managing Director', '01711524943');
INSERT INTO `agencies` VALUES (367, 'Pritom International', 0654, '48, Naya Paltan, Dhaka-1000', '9331226, 9336760, 58311027 (Off.), 9341391 (Res.)', 'Mr. Promod Paul', 'Proprietor', '01819211957');
INSERT INTO `agencies` VALUES (368, 'Premier Consultants', 1006, 'A.H. Tower, 7th Floor, Plot No.- 56, Road No.- 2, Sector No.- 3, Uttara Model Town, Dhaka-1230', '55093876, 55093877 (Off.)', 'Dr. M. Asaduzzaman', 'Proprietor', '01711563553');
INSERT INTO `agencies` VALUES (369, 'Persian International Limited', 1267, 'House No.-75, 1st Floor, B-1, Road No.-4, Block-C, Banani, Dhaka-1213', '9894003 (Off.)', 'Mr. Mohammed Khalilur Rahman', 'Managing Director', '01713013646, 01713034180');
INSERT INTO `agencies` VALUES (370, 'R & R International Company', 1111, 'Dilkusha Centre, 13th Floor, Suite No.- 1301, 28, Dilkusha C/A, Dhaka-1000', '9571525 (Off.)', 'Dr. Md. Aolad Hossain', 'Proprietor', '01711679167');
INSERT INTO `agencies` VALUES (371, 'Radius International Associate Ltd.', 0241, 'House No.-111, 2nd Floor, Road No.-13, Block-E, Banani, Dhaka-1213', '09611699453 (Off.)', 'Mr. Mir Md. Shamim Uddin', 'Managing Director', '01712871810, 01612871810');
INSERT INTO `agencies` VALUES (372, 'Rakib Air International', 0865, '39, Naya Paltan, Paltan, Dhaka-1000', '9330710, 9338456 (Off.), 9121157 (Res.)', 'Mr. Md. Jalal Uddin Mamun', 'Proprietor', '01819220595');
INSERT INTO `agencies` VALUES (373, 'Ramna Air International', 1172, '66-67, Kamlapur, 401, Eastern Commercial Complex, Dhaka-1000', '9571799, 9564693 (Off.), 9361134 (Res.)', 'Mr. Shahidul Islam', 'Proprietor', '01712710500');
INSERT INTO `agencies` VALUES (374, 'Ranger International', 0682, '78, Naya Paltan, Shanjari Tower, 5th Floor, Flat No.- 6/C, Dhaka-1000', '48312231 (Off.)', 'Mr. Tapan Chandra Kuri', 'Managing Partner', '01712019305');
INSERT INTO `agencies` VALUES (375, 'Raseul Trade International Ltd.', 0380, '18/1, Nayapaltan, 4th Floor, Paltan, Dhaka-1000', NULL, 'Prof: Dr. M. A. Rahim Phd', 'Managing Director', '01711470612, 01747890222');
INSERT INTO `agencies` VALUES (376, 'Reza Trade International', 0848, 'Eden Building, 2nd Floor, 167, Motijheel Circular Road, Motijheel, Dhaka-1000', '7194803, 7194804 (Off.)', 'Mr. Rezaul Karim Reza', 'Proprietor', '01711174278, 01924098493');
INSERT INTO `agencies` VALUES (377, 'Rashid International Company', 0578, '16, Paribagh, 3rd Floor, Sonargaon Road, Hatirpool, Dhaka-1000', '9662254 (Off.)', 'Mr. Mohammad Humayan-Ur-Rashid', 'Proprietor', '01911490550');
INSERT INTO `agencies` VALUES (378, 'Ratul Trading Overseas', 0777, '67, Purana Paltan Lane, Bhaban-2, 1st Floor, Paltan, Dhaka-1000', '49349498 (Off.), 49346255 (Res.)', 'Mr. Aminul Islam Shamim', 'Managing Partner', '8801712143355, 8801631444111, 8801817096492');
INSERT INTO `agencies` VALUES (379, 'Russell & Brothers', 0867, '10/2/1, Toynbee Circular Road, Motijheel C/A, Dhaka-1000', '9553687, 47116402 (Off.)', 'Mr. Nur-E-Alam Siddique', 'Proprietor', '01817587523, 01760163325');
INSERT INTO `agencies` VALUES (380, 'S.S. Corporation', 1114, '51/1, Shantinagar, Room No.-9/C, V.I.P. Tower, V.I.P. Road, Nayapaltan, Dhaka-1000', '9359148, 9331315 (Off.)', 'Mr. Amirul Islam Solaiman', 'Proprietor', '01556630155');
INSERT INTO `agencies` VALUES (381, 'S.K. Overseas', 0886, 'Rabiya Mansion, 147, D.I.T. Extension Road, Fakirapool, Dhaka-1000', NULL, 'Mr. Mohammed Jahangir Hossain', 'Partner', '01552343865, 01312343865');
INSERT INTO `agencies` VALUES (382, 'Saima International Ltd.', 1490, '78, Naya Paltan, Mosjid Goli, Shanjari Tower, Dhaka-1000', '9335911 (Off.)', 'Mr. Md. Kamal Hossain', 'Managing Director', '01752674083, 01747672414, 01787226078');
INSERT INTO `agencies` VALUES (383, 'Sami Overseas', 1067, 'Eastern View, Ground Floor, Room No.-10 & 11, 50, D.I.T. Extension Road, Fakirapool, Dhaka-1000', '9357828 (Off.)', 'Mrs. Moshan Ara Begum', 'Proprietor', '');
INSERT INTO `agencies` VALUES (384, 'Saiful Enterprise', 0198, '34, Purana Paltan,Nurjahan Sharif Plaza, 2nd Floor, Dhaka-1000', '47120449 (Off.)', 'Mr. Saidul Islam', 'Proprietor', '01671084328, 01719323728');
INSERT INTO `agencies` VALUES (385, 'Sarac Overseas', 1055, 'Malik Chamber, 11/2, Toyenbee Circular Road, Motijheel C/A, Dhaka-1000', '9567150, 9562624 (Off.), 9343011 (Res.)', 'Mr. Shahrukh Alam', 'Managing Partner', '01711542636, 01919542636');
INSERT INTO `agencies` VALUES (386, 'Sandwip Trade International', 0794, '125/164-A, Kabi Nazrul Islam Road, Sadarghat, Chittagong', '615502, 619079 (Ctg. Off.), 622818 (Ctg. Res.)', 'Mr. Mohammed Fachiul Alam', 'Managing Partner', '01711202537');
INSERT INTO `agencies` VALUES (387, 'Shabab International', 0584, 'Aulad Hossain Market, 108, Airport Road, Tejgaon, Dhaka-1215', '58153702, 58155966 (Off.)', 'Mr. Mohammed Abu Bakkar', 'Proprietor', '01711542789');
INSERT INTO `agencies` VALUES (388, 'Shahjalal Overseas Service Ltd.', 0171, 'House No.- 5, Road No.- 6-A, Block-J, Baridhara, Dhaka-1212', '8831260, 9849811, 9849530 (Off.), 8834736 (Res.)', 'Mr. Md. Shahjalal Mazumder', 'Managing Director', '01711526999, 01915699253, 01711055190');
INSERT INTO `agencies` VALUES (389, 'Shariatpur Overseas Ltd.', 0394, 'Shawon Tower, 7th Floor, 2/C, Purana Paltan, Dhaka-1000', NULL, 'Mr. D.M. Shahajahan Sheraj', 'Managing Director', '01765151515, 01911386998');
INSERT INTO `agencies` VALUES (390, 'Shatota Associate', 1051, 'H-87, Jahan Bhaban, 6th Floor, New Airport Road, Kakoli, Banani, Dhaka-1213', '58816563, 9883630 (Off.)', 'Mr. Md. Abdul Mannan', 'Managing Partner', '01625335224, 01670100107, 01674552288,');
INSERT INTO `agencies` VALUES (391, 'Signature Overseas', 1801, '46/A, Purana Paltan, Dhaka-1000', '9570295 (Off.)', 'Mr. A.F.M. Zakaria Dipu', 'Managing Partner', '01711844952');
INSERT INTO `agencies` VALUES (392, 'Snigdha Overseas Ltd.', 1551, 'Pritom Zaman Tower (Level-7), 37/2, Purana Paltan (Culvert Road), Dhaka-1000', '9572012, 9572013 (Off.)', 'Mr. Nizam Uddin Hazari, M.P.', 'Chairman', '01713115170, 01715423583');
INSERT INTO `agencies` VALUES (393, 'Spark Engineering & Construction Ltd.', 0179, '3, Shahid Tazuddin Ahmed Sharani, 2nd Floor, Moghbazar, Dhaka-1217', '9348852, 9348872 (Off.)', 'Mr. Murad Shafiullah', 'Managing Director', '01917217821, 01715064199, 01711055643');
INSERT INTO `agencies` VALUES (394, 'Tafa Human Resource Development', 1100, 'Sattara Centre (11th Floor), 30/A, Naya Paltan, V.I.P. Road, Dhaka-1000', '9337832 (Off.), 9360366 (Res.)', 'Mr. A.K.M. Bari', 'Proprietor', '01713403585');
INSERT INTO `agencies` VALUES (395, 'Tanzir International', 0859, '55, Inner Circular Road (V.I.P. Road), 1st Floor, Shantinagar, Dhaka-1217', NULL, 'Mr. Md. Abu Taher', 'Proprietor', '01711107547, 01966498709');
INSERT INTO `agencies` VALUES (396, 'Taslim Air International', 0889, '89 (12/B old), Bijoy Nagar, Aziz Co-operative Market, Dhaka-1000', NULL, 'Mr. Md. Taslim Ullah', 'Managing Partner', '01819906196, 01732295646');
INSERT INTO `agencies` VALUES (397, 'Makka Tours & Travels', 0676, '126, Motijheel C/A, Ground Floor, Dhaka-1000', '9565251, 9570565, 9570528, 9569516, 9586923 (Off.)', 'Lion Alhaj M.A. Rashid Shah Samrat', 'Proprietor', '01980000666, 01819211094, 01678169909');
INSERT INTO `agencies` VALUES (398, 'Al-Mass International Ltd.', 0779, '46/A, Purana Paltan, 1st Floor, Motijheel, Dhaka-1000', '9571327 (Off.)', 'Mr. Fazlul Karim Chowdhury', 'Managing Director', '01741252525, 01641252525');
INSERT INTO `agencies` VALUES (399, 'Techno-Foki (Bangladesh) Overseas', 1283, 'House No.- 38, Road No.- 9, Block-B, Bashundhara R/A, Dhaka-1229', '55037309, 55037315 (Off.)', 'Mr. S.M. Abdul Mannan', 'Proprietor', '01711520539');
INSERT INTO `agencies` VALUES (400, 'The Best Service', 1137, 'Shanjari Tower, 5th Floor, 78, Nayapaltan, Masjid Goli, Nayapaltan, Dhaka-1000', '48319878 (Off.)', 'Mr. Md. Yousuf', 'Managing Partner', '01715802408');
INSERT INTO `agencies` VALUES (401, 'JSK Travels', 1368, NULL, '44819059 (Off.)', 'Mr. Md. Khurshid Alam', 'Proprietor', '01982666777, 01612031987');
INSERT INTO `agencies` VALUES (402, 'Janata Travels Ltd.', 0184, '64, Dilkusha C/A, Ground Floor, Dhaka-1000', '9552298, 9578860, 9576457, 9578852, 9578846 (Off.)', 'Mrs. Majeda Begum', 'Chairman', '1754459797');
INSERT INTO `agencies` VALUES (403, 'J & J Trade Internaitonal', 0665, '204, Shahid Syed Nazrul Islam Sharani, Aziz Co-operative Market (4th Floor), Dhaka-1000', '9570793 (Off.)', 'Mr. Mohammed Jahangir Alam', 'Proprietor', '1713006016');
INSERT INTO `agencies` VALUES (404, 'Protik Travels & Tourism', 0506, 'Tropical Alauddin Tower, Plot No.-32/C, Floor-8/D, Road No.-2, Sector-03, Uttara, Dhaka-1230', '48954854 (Off.) 48955858 (Res.)', 'Mr. A.K.M. Alamgir Hossain', 'Managing Partner', '1713035333');
INSERT INTO `agencies` VALUES (405, 'TMSS Northern Recruiting Agency Ltd.', 1083, 'Dhaka Off.: TMSS Liaison Complex (TLC), Mahtab Center (1st Floor), 177, Syed Nazrul Islam Sarani, Bijon Nagar, Dhaka-1000. Bogra Off.:', '9339551, 9339552 (Dhk. Off.), 78563, 78975 (Bogra Off.)', 'Mr. Md. Abdur Rouf', 'Managing Director', '01713377049, 01730041644');
INSERT INTO `agencies` VALUES (406, 'Zahrat Associate', 0285, '345, Segun Bagicha, Ground Floor, Dhaka-1000', '48315660, 48311650, 49340836 (Off.)', 'Mr. Md. Shafiqul Alam (Firoz)', 'Proprietor', '01752190659');
INSERT INTO `agencies` VALUES (407, 'Visa International', 0963, 'Darpan Complex, 3rd Floor, Plot No.-2, Gulshan-2, Dhaka-1212', '9885766, 8835785 (Off.)', 'Mr. Md. Mostafizur Rahman', 'Managing Partner', '01713303464');
INSERT INTO `agencies` VALUES (408, 'Al-Khalij International Ltd.', 0829, 'H-80/1-C (3rd Floor), Biruttam Ziaur Rahman Sarak (New Airport Road), Banani Chairmanbari (Soinik Club Mor), Dhaka-1213', NULL, 'Mr. Hoque Zahirul (Joe)', 'Managing Director', '01971549499, 01711549499, 01919549499');
INSERT INTO `agencies` VALUES (409, 'Dynamic Trade', 0497, 'Ansari Building (Ground Floor), 14/2, Topkhana Road, Ramna, Dhaka-1000', '9567568 (Off.)', 'Mr. Mohammad Habibullah', 'Proprietor', '01819226680, 01797399940');
INSERT INTO `agencies` VALUES (411, 'Uzan Trading Corporation', 0427, 'Flat No.- 8-16, Plot No.- 19, Road No.- 17, Kemal Ataturk Avenue, Banani, Dhaka-1213', '9820283, 9820287 (Off.)', 'Mr. Md. Harun-Or-Rashid', 'Proprietor', '01711547679');
INSERT INTO `agencies` VALUES (412, 'Paradise International', 0268, '60, Kamal Ataturk Avenue, Banani, Dhaka-1213', '9884321, 9894308 (Off.), 8856485', 'Mr. Md. Shahab Uddin', 'Proprietor', '01915055550');
INSERT INTO `agencies` VALUES (413, 'Pol Enterprise', 0529, '44, Naya Paltan, 2nd Floor, Dhaka-1000', '9337335 (Off.)', 'Mr. Golam Kibria, M.P.', 'Proprietor', '01711644029');
INSERT INTO `agencies` VALUES (414, 'Patwary & Brothers Ltd.', 0149, 'H-72, 2nd Floor, Airport Road, Amtoli, Mohakhali, Banani, Dhaka-1212', '58813062, 9881351', 'Mr. M.A. Latif Patwary', 'Managing Director', '01552385795, 01850977255, 01923115873');
INSERT INTO `agencies` VALUES (415, 'Adil Overseas', 1545, 'House No.- 67, 1st Floor, Road No.-17, Block-C, Banani, Dhaka-1213', '9820580, 9820581 (Off.)', 'Mr. Anisur Rahman Adil', 'Proprietor', '01677249953, 01917869612, 01763227885');
INSERT INTO `agencies` VALUES (416, 'Haifa Corporation', 1575, 'Noakhali Tower, 55/B, 8th Floor, Purana Paltan, Dhaka-1000', '9515817 (Off.)', 'Mr. Md. Shahin Uddin', 'Managing Partner', '01746686699, 01842889559, 01873494949');
INSERT INTO `agencies` VALUES (417, 'Coxs Bazar Overseas', 0085, '3/3-B, Purana Paltan (Old), 166, Shaheed Syed Nazrul Islam Shoroni (New), Dhaka-1000', '9555289, 9566577', 'Mr. Mohd. Wahidul Alam', 'Proprietor', '01711563249');
INSERT INTO `agencies` VALUES (418, 'Mahe Business Ltd.', 0802, '67, Naya Paltan, City Heart Market, Suite No.- 14/6-A, V.I.P. Road, Dhaka-1000', '48322656 (Off.)', 'Mr. Mohammed Sobuj Miah', 'Managing Director', '01834905798, 01917681770, 01614905798');
INSERT INTO `agencies` VALUES (419, 'Oparajita Overseas', 1318, 'Dr. Nawab Ali Tower, 4th Floor, Room No.- 402 & 403, 24, Purana Paltan, Dhaka-1000', '9574203 (Off.)', 'Mr. Arifur Rahman', 'Proprietor', '01721296503, 01912355807');
INSERT INTO `agencies` VALUES (420, 'Al Wahed Manpower Services', 1521, 'Sattara Center (Hotel Victory Building), 30/A, Naya Paltan,V.I.P. Road, 7th Floor, Dhaka-1000', '58315697 (Off.)', 'Mr. Md. Mosharraf Hossain', 'Proprietor', '01819408854, 01681389814, 01745771848,');
INSERT INTO `agencies` VALUES (421, 'Salim Enterprise', 0914, 'H-79, Block- F, Airport Road, Chairman Bari, Banani, Dhaka-1213', '9870573, 9870462 (Off.)', 'Mr. Md. Shahin Hossain', 'Partner', '01617127777, 01919012018');
INSERT INTO `agencies` VALUES (422, 'Sonargaon Overseas', 1494, 'H/84, Bir Uttam Ziaur Rahman Sarak, Hazi Shahabuddin Mansion, 1st Floor, Kakoli, Banani C/A, Dhaka-1213', '9883385 (Off.)', 'Mr. Md. Fakhrul Islam', 'Proprietor', '01919270978, 01819270978');
INSERT INTO `agencies` VALUES (423, 'Mahe Overseas', 1299, 'Sikder Plaza, Apt. No.- 1, 2nd Floor, House No.- 79, Block-M/1, New Airport Road, Chairman Bari, Banani, Dhaka-1213', NULL, 'Mr. M.R. Prince', 'Proprietor', '01711324247, 01715253841');
INSERT INTO `agencies` VALUES (424, '4 Site International Ltd.', 0345, 'Islam Empire Estate, 55/1, Purana Paltan, 6th Floor, Dhaka-1000', '9578891, 9578893 (Off.)', 'Mr. Shahadat Hossain', 'Managing Director', '01971314280');
INSERT INTO `agencies` VALUES (425, 'Jashim International Overseas Ltd.', 1510, 'Bashati Horizon, House No.- 21 (Level-10/B), Road No.- 17, Block-C, Kamal Ataturk Avenue, Banani C/A, Banani, Dhaka', NULL, 'Mr. Jashim Uddin', 'Managing Director', '01957222111, 01951133337');
INSERT INTO `agencies` VALUES (426, 'Lucky International', 0044, '67, Nayapaltan, City Heart Shopping Complex, Level-11, Room No.- 8, Dhaka-1000', '7191618 (Off.)', 'Mr. Md. Abul Kalam (Shahin)', 'Partner', '01715416912, 01715668559');
INSERT INTO `agencies` VALUES (427, 'Al Rohan Travels & Tourism', 1541, '197, Shahid Sayed Nazrul Islam Sharoni (61 Bijoy Nagar), 10/03, Eastern Arzoo, 10th Floor, Dhaka-1000', NULL, 'Mr. Mohd. Mahbubur Rahman', 'Proprietor', '01762379129, 01714329252');
INSERT INTO `agencies` VALUES (428, 'Al-Haram International (Pvt.) Ltd.', 0307, '204, Shahid Syed Nazrul Islam Sharani, 1st Floor, Bijoy Nagor, Aziz Co-operative Complex, Dhaka-1000', NULL, 'Mr. Mohammed Shaheenuzzaman', 'Managing Director', '01711531548, 01842531548');
INSERT INTO `agencies` VALUES (429, 'Al-Sarder International', 1722, 'H-50, Bir Uttam Ziaur Rahman Sarak, Mohakhali, Dhaka-1212', NULL, 'Mr. Mohammad Akter Ali Sarder', 'Proprietor', '01791033033, 01919606060');
INSERT INTO `agencies` VALUES (430, 'Mashallah Overseas', 1039, '6, D.I.T. Avenue, Sabbir Court (1st Floor), Daynik Bangla Circle, Motijheel, Dhaka-1000', NULL, 'Mr. Gazi Shafiuddin Ahmed', 'Proprietor', '01944466444, 01711541036, 01721308672, 01616727774');
INSERT INTO `agencies` VALUES (431, 'East Bengal Overseas', 0912, 'Amina Bhaban, 5th Floor, H-86, New Airport Road, Kakoli, Banani, Dhaka-1213', NULL, 'Mir Mohammad Mohshin Miah', 'Proprietor', '01977029758');
INSERT INTO `agencies` VALUES (432, 'G.M.G. Trading (Pvt.) Ltd.', 0490, 'House No.-79, Road No.-6, Block-C, Banani, Dhaka-1213', NULL, 'Mr. Golam Maula', 'Managing Director', '01711567593');
INSERT INTO `agencies` VALUES (433, 'A.B.M. Aviation', 1825, '147, Sultan Building (1st Floor), Motijheel C/A, Dhaka', NULL, 'Mr. Abdul Baten Miah', 'Managing Partner', '01819226141');
INSERT INTO `agencies` VALUES (434, 'B.S. Associates Ltd.', 1818, 'House No.-12, Road No.-09, Block-J, Baridhara, Dhaka-1212', NULL, 'Mr. Imran Khan', 'Managing Director', '01780499037, 01819237548, 01919237548');
INSERT INTO `agencies` VALUES (435, 'Kopotakkha Overseas', 1366, '147, DIT Ex. Road, Rabeya Mansion (4th Floor), Fakirapool, Motijheel, Dhaka-1000', NULL, 'Mr. Abu Bokkar Siddik', 'Proprietor', '01917-730503');
INSERT INTO `agencies` VALUES (436, 'Mridha Trade Overseas', 1637, '40/1-D, VIP Road (5th Floor), Nayapaltan, Dhaka-1000', NULL, 'Mr. Siraj Uddin Mridha', 'Proprietor', '01819126695');
INSERT INTO `agencies` VALUES (437, 'M/S. Monika Travel International Ltd.', 1708, 'G-Nat Tower, Room-7/B (7th Floor), 116/117, DIT Ext. Road, Fakirapool, Motijheel, Dhaka-1000', NULL, '', '', '01949400157');
INSERT INTO `agencies` VALUES (438, 'Saudia Recruiting Agency', 0645, '67/1, Nayapaltan, Paltan China Town, Floor No-17, Room No-18/E 3, VIP Road, Nayapaltan, Dhaka-1000', NULL, 'Mr. Mohammad Golam Nabi', 'Proprietor', '01711524113');
INSERT INTO `agencies` VALUES (439, 'Rivoli Manpower Services', 0449, '59/61, Gulshan South Avenue, Lotus-Kamal Tower-2, Gulshan-1, Dhaka-1212', NULL, 'Mr. Anwar Tito', 'Proprietor', '01720990833');
INSERT INTO `agencies` VALUES (440, 'United Export Ltd.', 0486, '155-156, Tejgaon I/A, Dhaka-1205', NULL, 'Mr. S.M. Rafique', 'Managing Director', '01910101022, 01910101088');
INSERT INTO `agencies` VALUES (441, 'Universal International', 0883, 'House No.-15, 1st Floor, Road No.-17, Block-D, Banani, Dhaka-1213', NULL, 'Mr. Md. Mojibur Rahman (Moju), Ex.-M.P.', 'Proprietor', '01711464748');
INSERT INTO `agencies` VALUES (442, 'Nusaiba Trade International', 1612, '59/3/4, Purana Paltan, Dhaka-1000', NULL, 'Mr. Muhammad Sofiullah', 'Managing Partner', '01558177049, 01720353611');
INSERT INTO `agencies` VALUES (444, 'Al-Dushary Enterprise', 0420, 'Sabbir Tower, 5th Floor, Room No.-703, 3/4-A, Purana Paltan, Dhaka-1000', NULL, 'Mr. Md. Sana Ullah', 'Proprietor', '01711520310');
INSERT INTO `agencies` VALUES (445, 'Shiekh Air International', 1633, 'Esten View 50, Nayapaltan (Lift-10), Room-9/5, DIT Extension Road, Dhaka-1000', NULL, 'Mr. Md. Afzal', 'Proprietor', '01817578321');
INSERT INTO `agencies` VALUES (446, 'Z. Lines Ltd.', 0329, '127, Motijheel C/A, 1st Floor, Dhaka-1000', NULL, 'Mr. Zakir Hossain Bhuiyan', 'Managing Director', '01711536783');
INSERT INTO `agencies` VALUES (447, 'Tafseer Overseas', 1242, 'H-89/2, 3rd Floor, Bir Uttam Ziaur Rahman Road, Kakoli, Banani, Dhaka-1213', NULL, 'Mr. Hafez Ahmad', 'Proprietor', '01726269260, 01911357146, 01750056262');
INSERT INTO `agencies` VALUES (448, 'Al Faisal Enterprise', 0254, '6, DIT Avenue (Ist Floor), Motijheel C/A, Dhaka-1000', NULL, 'Mr. S.M Kamal Hossain', 'Managing  Pertner', '02 9569504');
INSERT INTO `agencies` VALUES (449, 'Fama Air Service', 1775, 'Fama Super Market, 1st Floor, Nazim Khan Bazar, Rajarhat, Kurigram', NULL, 'Mr. Md. Abdul Malek (Manik)', 'Proprietor', '01751188990, 01712269841');
INSERT INTO `agencies` VALUES (450, 'Al-Tamim Overseas', 1130, '50, Eastern View, 2nd Floor, Naya Paltan, D.I.T. Extension Road, Dhaka-1000', NULL, 'Mr. Md. Habibur Rahman', 'Proprietor', '1713005754');
INSERT INTO `agencies` VALUES (451, 'K.B.S. International', 1119, 'Shatabdi Centre, 292, Inner Circular Road, Fakirapool, Dhaka-1000', NULL, 'Mr. Mohammod Abdul Khalek', 'Proprietor', '1713303039');
INSERT INTO `agencies` VALUES (452, 'Sonartory Trade International Ltd.', 1097, '32, Nayapaltan, 3rd Floor, D.I.T. Extension Road, Fakirapool, Dhaka-1000', NULL, 'Alhaj Md. Shafi Uddin', 'Managing Director', '01711625225, 01821698892');
INSERT INTO `agencies` VALUES (453, 'Bizbon International', 1804, '116/117, G-Nat Tower, Fakirapool, Dhaka-1000', NULL, 'Mr. Md. Belal Hossain', 'Managing Partner', '01711372496, 01795989899');
INSERT INTO `agencies` VALUES (454, 'Al-Mamun Overseas', 0629, 'S.R. Garden, 3-B2, 2nd Floor, 52, Naya Paltan, Dhaka-1000', NULL, 'Mr. Moshorrof Hussain Patwary (Swopan)', 'Proprietor', '01713013966');
INSERT INTO `agencies` VALUES (455, 'Kamal International', 0713, '45/A, Naya Paltan, Ground Floor, Dhaka-1000', NULL, 'Mr. Kamal Hossain', 'Proprietor', '01852257097, 01819140611');
INSERT INTO `agencies` VALUES (456, 'Esha International', 1597, 'Bashati Horizon, Apartment-A/8, Plot No.-21, Road No.-17, Banani C/A, Dhaka-1213', NULL, 'Mrs. Taslima Akhter', 'Proprietor', '01714498035, 01924440060');
INSERT INTO `agencies` VALUES (457, 'D.B.H. International', 0643, 'V.I.P. Tower, 7th Floor, 51/1, V.I.P. Road, Naya Paltan, Dhaka-1000', NULL, 'Kazi M.A. Karim Belal', 'Proprietor', '01819237392, 01919237392');
INSERT INTO `agencies` VALUES (458, 'Brahman Baria Overseas', 0666, '51/1, V.I.P. Road, Naya Paltan, Dhaka-1000', NULL, 'Mr. M.N. Huda Khadem Dulal', 'Managing Partner', '01711533968, 01919533968, 01919099632');
INSERT INTO `agencies` VALUES (459, 'Asiatic Talents', 1381, 'Suite No.- 1302, Sultan Ahmed Plaza, 32, Purana Paltan, Dhaka-1000', NULL, 'Mr. Md. Shahineuzzaman', 'Managing Partner', '01713410646');
INSERT INTO `agencies` VALUES (460, 'Uniglobe Human Resource Management', 1208, 'Suit No.- W-13/3, West Tower, Paltan China Town, 67/1, Naya Paltan, Dhaka-1000', NULL, 'Mr. Muktar Hossain Chowdhury', 'Proprietor', '01707733541, 01866000128');
INSERT INTO `agencies` VALUES (461, 'M/S Abid Overseas Ltd.', 1768, 'VIP tower (13 Floor) 51/1 VIP road, Naya Raltan, Dhaka-1000', NULL, 'Mohammed  Azad', 'Managing Director', '');
INSERT INTO `agencies` VALUES (462, 'Fast Air Service', 1383, 'Plot-4, Main Road-1, (5th Floor), Room No.27-28, Mukta Bangla Shoping Complex, Mirpur-1, Dhaka-1216', NULL, 'Mr. Md. Rezaul Karim', 'Managing Partner', '01937631964');
INSERT INTO `agencies` VALUES (463, 'Fine Overseas Ltd', 1653, '36, Purana Paltan Lane, Rokeya Mansion, Vip Road, Dhaka', NULL, 'Mr. Md. Abu Naser ', 'Chairman', '01711022326');
INSERT INTO `agencies` VALUES (464, 'Myco H R International Ltd:', 1377, 'House-02, Road-2, Sec-2, Aftabnaghar, Dhaka', NULL, 'Mr. yeakub Ali', 'Proprietor', '01781539166');
INSERT INTO `agencies` VALUES (465, 'Akter Recruiting Agency', 1848, '50, D.I.T. Extension Road, Eastern View, 11th Floor, Room No.-10-11, Commercial Complex, Dhaka-1000', NULL, 'Mr. Akter Hossain', 'Managing Partner', '01727207893, 01924065550');
INSERT INTO `agencies` VALUES (466, 'World Wide Human Resource And Placement Centre', 1110, 'Sattara Center (9th Floor), 30/A, Naya Paltan, V.I.P. Road, Dhaka-1000', NULL, 'Mr. Abul Kalam Azad', 'Proprietor', '01973005821, 01713005821');
INSERT INTO `agencies` VALUES (467, 'M/S. Pigeon International', 0377, '68, Kazi Nazrul Islam Avenue Farm Gate, Dhaka', NULL, 'Abdus Salam ', 'Proprietor', '+88 02 9122103');
INSERT INTO `agencies` VALUES (468, 'Emon Employment Services', 0773, 'Hossain Chamber (1st Floor), 58, Kamal Ataturk Avenue, Banani C/A, Dhaka-1213', NULL, 'Mr. Md. Wahidul Islam', 'Proprietor', '01770271224, 01887445572');
INSERT INTO `agencies` VALUES (469, 'Advent Overseas Ltd.', 1514, '180-181, Shohid Sayed Nazrul Islam Sharani, 6th Floor, Bijoy Nagar, Dhaka', NULL, 'Mr. Hasan Mahmud Majumder', 'Managing Director', '01971000120, 01911341770');
INSERT INTO `agencies` VALUES (470, 'Mollah International', 1043, 'House No.-55/1, Road No.-25, Ward-3, Block-A, Solamaid, Vatara, Dhaka-1213', NULL, 'Mollah International', 'Proprietor', '1711196656');
INSERT INTO `agencies` VALUES (471, 'N.Z. Overseas', 1554, '64/4, Naya Paltan, Dhaka-1000', NULL, 'Mr. Sayed Ahammed Polash', 'Managing Partner', '01712046652, 01621965104');
INSERT INTO `agencies` VALUES (472, 'Shipon Enterprise Ltd.', 0764, '31/1, Purana Paltan, Sharif Complex, 3rd Floor, Dhaka-1000', NULL, 'Mr. Mohammed Mosharraf Hossain', 'Managing Director', '1718025087');
INSERT INTO `agencies` VALUES (473, 'Proma Overseas', 1190, 'City Heart, 8th Floor, Suite No.-9/4, 67, Naya Paltan, Dhaka-1000', NULL, 'Mr. Nirmal Chandro Bairagi', 'Proprietor', '01712620961, 01912024201');
INSERT INTO `agencies` VALUES (474, 'Malay Trade International Ltd.', 0460, '199, Shahid Syed Nazrul Islam Sharani, Akram Tower, Level-6, 15/5, Bijoy Nagar, Dhaka-1000', NULL, 'Mr. Md. Shajedur Rahman Mollah', 'Managing Director', '01977807870, 01711807870');
INSERT INTO `agencies` VALUES (475, 'Concept Air Travel and Tours Ltd.', 1142, 'Office.- 31, 2nd Floor, Market-cum Housing Complex, Banani, Dhaka-1213', NULL, 'Mr. H. Al-Rashid Patwary', 'Managing Director', '01819215196, 01711185265');
INSERT INTO `agencies` VALUES (476, 'World Vision Overseas Ltd.', 1688, 'Sharif Complex 31/1,Purana Paltan Dhaka1000', NULL, 'Mr. Abu Bakar Siddique', 'Managing Director', '1924100910');
INSERT INTO `agencies` VALUES (477, 'Shafaf Aviation Limited', 1391, 'Shandhani Life Tower, 4th Floor, 34, Mymensingh Road, Banglamotor, Shahbagh, Dhaka-1000', NULL, 'Mr. Mojibul Islam', 'Managing Director', '01711560600, 01716685677');
INSERT INTO `agencies` VALUES (478, 'Amin Overseas', 1670, '398, Shadhinata Sarani, North Badda, Dhaka-1212', NULL, 'Mr. Amirul Islam', 'Proprietor', '01970000998, 0193666777');
INSERT INTO `agencies` VALUES (479, 'Taa-Haa Recruitment Services', 1153, '162, Barua Bagan Bari, Khilket, Dhaka-1229', NULL, 'Mr. Md. Mansur Ahamed', 'Proprietor', '1819191712');
INSERT INTO `agencies` VALUES (480, 'Fourzees', 0311, 'Suite No.- 6-1/2, Rahmania International Complex, 28/1/C, Toyenbee Circular Road, Motijheel, Dhaka-1000', NULL, 'Mr. Zarre Omar', 'Proprietor', '01815291166, 01713001807');
INSERT INTO `agencies` VALUES (481, 'Al-Qayum International', 0434, '40/A, Nurjahan Trade Center, 1st Floor, V.I.P. Road, Naya Paltan, Dhaka-1000', NULL, 'Mr. Ershad Ullah Majumder', 'Partner', '01824903034, 01750216201, 01836567292');
INSERT INTO `agencies` VALUES (482, 'Mid Line International', 1152, '45, Naya Paltan, 2nd Floor, Dhaka-1000', NULL, 'Mr. Fazlul Matin Touhid', 'Proprietor', '1746622662');
INSERT INTO `agencies` VALUES (483, 'Haramine Overseas', 0577, 'Eastern View, 5th Floor, 50, Nayapaltan, D.I.T. Extension Road, Dhaka-1000', NULL, 'Mr. M.A. Wahab', 'Managing Partner', '1713006836');
INSERT INTO `agencies` VALUES (484, 'Smart Employment Overseas Ltd.', 1096, 'Sikder Plaza, 3rd Floor, House No.-79, Block-M, Chairman Bari, Banani, Dhaka-1213', NULL, 'Mr. Farid Uddin Ahmed', 'Managing Director', '1711531440');
INSERT INTO `agencies` VALUES (485, 'Mujib Travels & Tourism Ltd. (MTTL)', 0992, 'House No.-79, Torik Mansion, 4th Floor, Bir Uttam Ziaur Rahman Road, Banani, Dhaka-1213', NULL, 'Engineer Md. Mujibur Rahman', 'Managing Director', '01912651122, 01716634810');
INSERT INTO `agencies` VALUES (486, 'Suraya Overseas ', 1949, 'Green City Regency Room-Type/D,(10th Floor), 27 Kakrail, Dhaka-1000', NULL, 'Amirul Islam', 'Proprietor', '01708420399');
INSERT INTO `agencies` VALUES (487, 'Al-Saimon Overseas', 1950, 'Pukurpar, Kamar Para, Turag, Dhaka-1230', NULL, 'Mohammad Saimon Sakir Rahim', 'Proprietor', NULL);
INSERT INTO `agencies` VALUES (488, 'Abid Corporation', 1416, '28/A, Kakrail, 2nd Floor, V.I.P. Road, Dhaka-1000.', NULL, 'Mr. Md. Abul Kalam Azad', 'Proprietor', '01912240917, 01972240921');
INSERT INTO `agencies` VALUES (489, 'Insight Global Overseas Ltd.', 1924, '1.1/1 NayaPaltan,Rupayan Taj (2nd Floor),Dhaka-1000', NULL, 'Mohammed Saidul Hoque', 'Managing Director', '02-58316408');
INSERT INTO `agencies` VALUES (490, 'M.E.F Global Bangladesh Ltd.', 1963, 'Eastern Mansion (1st Floor), 67/9, Pioneer Road, Kakrail, Dhaka-1000', NULL, ' Md. Mokbul Hossain (Mukul)', NULL, NULL);
INSERT INTO `agencies` VALUES (491, 'Finance Overseas Ltd.', 0768, '131, D.I.T. Extension Road, Ratul Mansion, 4th Floor, Dhaka-1000', NULL, 'Mr. Khondaker Nurul Kabir', 'Managing Director', '01768961533, 01811429507');
INSERT INTO `agencies` VALUES (492, 'Midland International', 0270, '28/A, Kakrail, V.I.P. Road, 4th Floor, Dhaka-1000', NULL, 'Mr. Md. Abdul Halim', 'Proprietor', '01711835414');
INSERT INTO `agencies` VALUES (493, 'SS Airlink International Ltd.', 1855, '30/A, Nayapalton,Sattara Center, VIP Road, Dhaka-1000', NULL, 'Mr. Mohammad Shamim', 'Chairman', '01711522669');
INSERT INTO `agencies` VALUES (494, 'A.B. Establishment Ltd', 0618, '3, Engineer\'s Court, Ground Floor, 40, Naya Paltan Lane, Dhaka-1000', NULL, 'Mr. Mohammad Azizul Hoque (Dulal)', 'Managing Director', ' 01819187244, 01911449360');
INSERT INTO `agencies` VALUES (495, 'Al-Kahaf International Ltd', 1934, 'Shaon Tower (1st Floor), 2/C, Purana Paltan, Dhaka-1000', NULL, 'Md. Mominul Hoque', 'Managing Director', NULL);
INSERT INTO `agencies` VALUES (496, 'Meum Overseas', 0528, 'Darpan Complex, 3rd Floor, Plot-2, Gulshan Circle-2, Dhaka-1212', NULL, 'Mr. Md. Mahbubur Rahman', 'Proprietor', '01712039938');
INSERT INTO `agencies` VALUES (497, 'Total Management & Services Ltd.', 1126, '137, Tejgaon I/A, Dhaka-1208', NULL, 'Mr. K.S. Arfin', 'Managing Director', '01711523362');
INSERT INTO `agencies` VALUES (498, 'Ezzy Services And Resource Management Ltd.', 1573, '48/1, Purana Paltan, Motijheel, Dhaka-1000. House No.-156/B, Road No.-22, New DOHS, Mohakhali, Dhaka', NULL, 'Mr. Shabbir Hussain', 'Managing Director', '01711810078');
INSERT INTO `agencies` VALUES (499, 'Al-Syed Overseas', 1507, '70/G, Purana Paltan Line, 4th Floor, VIP Road, Dhaka-1000', NULL, 'Mr. S.M. Billal Hossain Sumon', 'Managing Partner', '01711970759, 01819432736');
INSERT INTO `agencies` VALUES (500, 'Barakat International', 0587, 'Shatabdi Centre (4th Floor), 292, Inner Circular Road, Fakirapool Dhaka-1000', NULL, 'Mr. Ibrahim Khalil', 'Proprietor', '01819214014, 01714337560');
INSERT INTO `agencies` VALUES (501, 'S.D. Holy Travels & Tours', 1511, '166-167, Al-Razi Complex (L-6), D-603/A, Shahid Sayed Nazrul Islam Sharani, Bijoy Nagar, Dhaka-1000', NULL, 'Mr. Joynal Abedin', 'Proprietor', '01731731503, 01950002222');
INSERT INTO `agencies` VALUES (502, 'Earth Smart Bangladesh Ltd.', 1486, '167, Circular Road, Eden Building, 1st Floor, Motijheel C/A, Dhaka-1000', NULL, 'Mr. Md. Mahfuzur Rahman', 'Managing Director', '01712395304, 01711667525');
INSERT INTO `agencies` VALUES (503, 'Mithila Air International', 1211, '48/A-B, Baitul Khair Tower, 7th Floor, Room No.- 704, Purana Paltan, Dhaka-1000', NULL, 'Mr. Mahabub Rahman Sikder', 'Proprietor', '01819944479, 01765795446');
INSERT INTO `agencies` VALUES (504, 'Alam Overseas Ltd.', 1647, 'Baitul Khair Tower, 8th Floor, Room No.- 804, 48/A-B, Purana Paltan, Dhaka-1000', NULL, 'Mr. ATM Khorshed Alam', 'Managing Director', '01729092600, 01842092600, 01710883241');
INSERT INTO `agencies` VALUES (505, 'Elaf Overseas ltd', 1492, 'Wakil Tower Ta-131, Gulshan-1, Link Road, Badda, Dhaka- 1212', NULL, 'Mr. Mohammad Yousuf', 'Chairman', '01763774808');
INSERT INTO `agencies` VALUES (506, 'Annesa Air International', 1786, '48-AB, Baitul Khair (9th Floor), Purana Paltan, Dhaka-1000', NULL, 'Mr. Md. Rabbi Chowdhury', 'Managing Partner', '01706068921');
INSERT INTO `agencies` VALUES (507, 'Al-Rahat Air International', 0823, '291, Inner Circular Road, Jamidar Palace, Suite No.- 3/C, 3rd Floor, Fakirapool, Dhaka-1000', NULL, 'Mr. F.M. Rafiqul Islam', 'Proprietor', '01711524334, 01842524334');
INSERT INTO `agencies` VALUES (508, 'Prime Overseas Ltd.', 0595, 'Khalil Mansion (1st Floor), 149/A, D.I.T. Extension Road, Dhaka-1000', NULL, 'Mr. Md. Belal Hossain Mazumder', 'Managing Director', '01711568224');
INSERT INTO `agencies` VALUES (509, 'Hello World Overseas', 1672, 'Shah Ali Plage (Level-09), Mirpur-10, Dhaka-1216', NULL, 'Mr. Md. Alauddin', 'Managing Partner', '01911310600, 01531555840, 01312310600');
INSERT INTO `agencies` VALUES (510, 'K.I. International', 1117, '95, Motijheel C/A, Ibrahim Chamber, 2nd Floor, Dhaka-1000', NULL, 'Mr. Kazi Mosharaf Hossain', 'Proprietor', '01917164642, 01766262864');
INSERT INTO `agencies` VALUES (511, 'Iceland Air International Ltd.', 1895, '55/A, H.M. Siddique Mansion, Purana Paltan, Dhaka-1000', NULL, 'Mr. Md. Belal Hossain', 'Director', '01718193422, 01720265949');
INSERT INTO `agencies` VALUES (512, 'S.M. International', 0634, '67/1, Paltan China Tower (West Tower), Room No.-7/11, 6th Floor, VIP Road, Naya Paltan, Dhaka-1000', NULL, 'Mr. Mohammad Mahamudul Hoque', 'Proprietor', '01819223279');
INSERT INTO `agencies` VALUES (513, 'Al-Imran International', 0780, 'Ali Bhaban, 5th Floor, 9, Rajuk Avenue, Motijheel, Dhaka-1000', NULL, 'Mr. Md. Imran Hossain', 'Proprietor', '01819248812, 01919248812');
INSERT INTO `agencies` VALUES (514, 'Khaled Jedan International', 1072, 'Sama Complex (7th Floor), 66/A, Naya Paltan, V.I.P. Road, Dhaka-1000', NULL, 'Mr. Abdul Malak', 'Proprietor', '01933796033, 01766584678');
INSERT INTO `agencies` VALUES (515, 'A. Halim Internationa', 0852, '67/1, East Town, Lift 9th Floor, China Towen, Naya Paltan, Dhaka-1000', NULL, 'Mr. Md. Abdul Jolil', 'Managing Partner', '01820297659, 01775539164');
INSERT INTO `agencies` VALUES (516, 'The Imam Overseas', 1509, 'Aziz Mansion, H-95, Bir Uttam Ziaur Rahman Road, Kakoli, Banani, Dhaka-1213', NULL, 'Mr. Imam Hossain', 'Proprietor', '01911345534');
INSERT INTO `agencies` VALUES (517, 'Al-Anazi Establishment', 1795, 'E-22/3, 21st Floor, East Tower, Paltan China Town, 67/1, Naya Paltan, Dhaka-1000', NULL, 'Mr. Md. Mahabubul Hoque', 'Managing Partner', '01752529898');
INSERT INTO `agencies` VALUES (518, 'Al-Amir International', 0620, 'Habibullah Mansion, 2nd Floor, 120, D.I.T. Extension Road, Fakirapool, Dhaka-1000', NULL, 'Mr. Mohammed Aminul Hoque', 'Proprietor', '01711344574');
INSERT INTO `agencies` VALUES (519, 'Lotus Trading', 0548, '40/1, Naya Paltan, 2nd Floor, V.I.P. Road, Dhaka-1000', NULL, 'Mr. Md. Monir Hossain', 'Proprietor', '01819249219');
INSERT INTO `agencies` VALUES (520, 'Happy International Ltd.', 0216, '70, Naya Paltan, 1st Floor, Paltan, Dhaka-1000', NULL, 'Mr. Mohd. Lokman', 'Managing Director', '01711037315');
INSERT INTO `agencies` VALUES (521, 'Faraji Trade International Limited', 1079, '86/1, 4th Floor, Inner Circular Road, V.I.P. Road, Nayapaltan, Dhaka-1000', NULL, 'Mr. Abu Bakar Siddique', 'Chairman', '01925783984, 01841783984, 01611783984');
INSERT INTO `agencies` VALUES (522, 'Neighbour Associates Ltd.', 0746, 'Habibullah Mansion, 2nd Floor, 120, D.I.T. Extension Road, Fakirapool, Dhaka-1000', NULL, 'Mr. Kazi Md. Tajul Islam', 'Managing Director', '01819136782, 01712759442, 01768043006');
INSERT INTO `agencies` VALUES (523, 'Tawa Trade International', 1495, '87, Paltan Tower, 5th Floor, Suite-503, Purana Paltan Line, Dhaka-1000', NULL, 'Mr. Mohammad Jane Alam Bhuiyan', 'Proprietor', '01772575975, 01815501227, 01315934758, 01826992533');
INSERT INTO `agencies` VALUES (524, 'Sadman International', 0943, 'Wadud Mansion, 1st Floor, 10/2/1, Toyenbee Circular Road, Motijheel C/A, Dhaka-1000', NULL, 'Ms. Shahinoor Hossain', 'Proprietor', '01819248388, 01916791844');
INSERT INTO `agencies` VALUES (525, 'Ucksel Private Ltd.', 0399, 'Jiban Bima Tower (1st Floor), 10, Dilkusha C/A, Dhaka-1000', NULL, 'Mr. Md. Deen Islam Jamadar', 'Managing Director', '01711520718');
INSERT INTO `agencies` VALUES (526, 'Tower Trade International Ltd.', 0499, '53, D.I.T. Extension Road, Naya Paltan, Dhaka-1000', NULL, 'Mr. M. Ishaque Khan', 'Managing Director', '01677773777, 01819284263, 01611284263');
INSERT INTO `agencies` VALUES (527, 'Union Overseas Employment & Training Ltd.', 0924, 'Satabdi Centre (6th Floor), Suite No.- 6/A, 292, Inner Circular Road, Fakirapool, Dhaka-1000', NULL, 'Mr. Mohammad Jashim', 'Managing Director', '01711525044');
INSERT INTO `agencies` VALUES (528, 'Al-Araf International', 1540, '28/A/2/1, Toyenbee Circular Road, D.I.T. Extension Road, 4th Floor, Motijheel C/A, Dhaka-1000', NULL, 'Mr. Mohammed Shahidur Rahman', 'Managing Partner', '01711068716');
INSERT INTO `agencies` VALUES (529, 'Malaysia Bangladesh Holdings Pte. Ltd.', 1675, 'Holding No.-1318, Ziabag, Moynertek, Uttarkhan, Uttara, Dhaka-1230', NULL, 'Ms. Shiuley Begum', 'Managing Director', '01717155851');
INSERT INTO `agencies` VALUES (530, 'Zinnah Overseas', 0898, 'Rupsha Tower (1st Floor), House No.- 7, Road No.-17, Block-A/1, Banani C/A, Dhaka-1213', NULL, 'Mr. Md. Zinnat Ali (Zinnah)', 'Proprietor', '01711560243, 01915637667');
INSERT INTO `agencies` VALUES (531, 'City Air International', 0576, '204, Shahid Sayed Nazrul Islam sarani, Bijoy Nagar, Aziz Co-operative Market, 3rd Floor, Dhaka-1000', NULL, 'Mr. Jibul Hasan Sabj ', 'Proprietor', '029558416, 9569257');
INSERT INTO `agencies` VALUES (532, 'Labbaik International', 0708, 'Paramount Heights, 3rd Floor, Suite- 3C-2, 65/2, Box Culvert Road, Purana Paltan,Dhaka-1000', NULL, 'Al-haj Jamal Uddin Ahmed Mollah', 'Proprietor', '01711560635, 01770549359');
INSERT INTO `agencies` VALUES (533, 'Hope-21 Ltd.', 1215, 'Rupayan Karim Tower, Level-3, 80, Kakrail, Dhaka-1000', NULL, 'Mr. Makbul Ahmed', 'Managing Director', '01835646434');
INSERT INTO `agencies` VALUES (534, 'JTC Employment Agency', 1343, '56, AH Tower, Room No.- 5/E, Level-5, Road No.-2, Sector-3, Uttara, Dhaka-1230', NULL, 'Mr. Foyazur Rahaman Asad', 'Proprietor', '01813639331');
INSERT INTO `agencies` VALUES (535, 'Al Naba Overseas', 1893, 'Sattar Centre, Hotel Victory (7th Floor), Room-804, 30/A Nayapaltan VIP Road, Dhaka-1000', NULL, 'Md. Nazim Uddin', 'Managing Partner', '01885938850, 01711337972');
INSERT INTO `agencies` VALUES (536, 'Al Jahan International', 1331, 'MK Tower, 5th Floor, 12, Progoti Sharani, Block-J, Baridhara, Dhaka-1212', NULL, 'Mr. Md. Baki Billah', 'Managing Partner', '01716225898, 01844182851, 01710296400');
INSERT INTO `agencies` VALUES (537, 'Orbit Consultant', 0597, 'Bananta Villa, House No.- 105, 1st Floor, Road No.- 04, Block-B, Banani, Dhaka-1213', NULL, 'Mr. Md. Shahjahan Miah', 'Proprietor', '01730595855, 01730595856');
INSERT INTO `agencies` VALUES (538, 'Hajre Ashwad Travels & Tours', 1824, '27/8, A/Ka, Topkhana Road, Bijoy Nagar, Shahbag, Dhaka-1000', NULL, 'Mr. Md. Shamsul Hoque', 'Managing Partner', '01713011184, 01613011184');
INSERT INTO `agencies` VALUES (539, 'Al-Gilani International', 0855, '11, Fakirapool, Ground Floor, Dhaka-1000', NULL, 'Mr. Md. Yousuf Ali', 'Proprietor', '01711365669');
INSERT INTO `agencies` VALUES (540, 'Mas Bangla Overseas', 1553, 'House No.- 108, 2nd Floor, Road No.-11, Block-C, Banani, Dhaka-1213', NULL, 'Mr. Md. Zamil Hossain', 'Proprietor', '01870762440-9, 01703731773, 01798613070');
INSERT INTO `agencies` VALUES (541, 'Kashipur Overseas', 1317, 'Baitul Khair, 10th Floor, Room No.-903-904, 48, Purana Paltan, Dhaka-1000', NULL, 'Mr. Md. Rafiqul Hossain', 'Proprietor', '01711343748, 01611343748');

-- ----------------------------
-- Table structure for locals
-- ----------------------------
DROP TABLE IF EXISTS `locals`;
CREATE TABLE `locals`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `rocno` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jtkno` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `owner` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `position` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 57 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of locals
-- ----------------------------
INSERT INTO `locals` VALUES (1, 'Agensi Pekerjaan Megawi Sdn Bhd', '497958-X', '024C', 'No.5, Tingkat 1, Jalan Utama 3/4, Pusat Komersial Sri Utama, 85000 Segamat, Johor', 'Wong Yu Wen', 'Director', '07-9311798');
INSERT INTO `locals` VALUES (2, 'Agensi Pekerjaan LNN New System', '1123062-A', '817C', '11A, Tingkat 1, Jalan Pekan Baru 30A/KU1, 41050 Klang Selangor', 'Ng Cheng Ho', 'Director', '019-2187071');
INSERT INTO `locals` VALUES (3, 'Agensi Pekerjaan Montage Human Capital Sdn Bhd', '635083-V', '705C', 'No. 15-2, Jalan 15/48A, Sentul Raya Boulevard, Off Jalan Sentul, 51000 Kuala Lumpur', 'Nor Aliza', 'Director', '03-40411116');
INSERT INTO `locals` VALUES (4, 'Agensi Pekerjaan JCM Sdn Bhd', '600549-H', '095C', '117,GF, Jalan Batu Tigi Lama, Taman Berkeley Centre, 41300 Klang Selangor', 'Tan Kwee Sing', 'Director', '012-2041958');
INSERT INTO `locals` VALUES (5, 'Agensi Pekerjaan Mega Jaya Sdn Bhd', '484746-V', '371C', 'G04 Choo Plaza, No.41, Aboo Sitee Lane, 10400 Georgetown, Pulau Pinang', 'Low Yee Siong', 'Director', '012-4894836');
INSERT INTO `locals` VALUES (6, 'Agensi Pekerjaan Magnificient Emblem Sdn Bhd', '1274878-W', '556C', 'SUITE 6-1, 6th FLOOR, MENARA PENANG GARDEN, 42A JALAN SULTAN AHMAD SHAH, 10050 PENANG, PULAU PINANG', 'Phang Li Koon', 'Director', '012-433 0000');
INSERT INTO `locals` VALUES (7, 'Agensi Pekerjaan Top Management (M) Sdn Bhd', '156625-X', '637C', 'No.20 -G, Jalan USJ 9/5N, UEP Subang Jaya, 47620 Subang Jaya, Selangor', 'Alias Stephen Nah', 'Director', '03-80239141');
INSERT INTO `locals` VALUES (8, 'Agensi Pekerjaan KWE (M) Sdn Bhd', '1149967-A', '394C', '11-1, Jalan Cempaka SD 12/1, Bandar Sri Damansara 52200 Kuala Lumpur', 'Janice Koay', 'Director', '012-4310811');
INSERT INTO `locals` VALUES (9, 'Agensi Pekerjaan Tunggal Sdn Bhd', '160362-P', '122C', 'No.60, Lorong Sentosa 4A, Taman Bayu Tinggi, 41200 Klang Selangor', 'Ch\'ng Seng Tat', 'Director', '012-2148004');
INSERT INTO `locals` VALUES (10, 'Agensi Pekerjaan Tetap Hangat Sdn Bhd', '806011-U', '068C', '21B, Jalan Bayu Tinggi 7, Taman Bayu Tinggi, 41200 Klang, Selangor', 'Low Chun Siang', 'Director', '017-3715025');
INSERT INTO `locals` VALUES (11, 'Agensi Pekerjaan Fomnexts JV (M) Sdn Bhd', '1265847-A', '082C', 'A-10-07, Menara A, Kompleks Atria, Damansara Jaya, 47400 Petaling Jaya, Selangor', 'Cheong Mang Him', 'Director', '012-3726395');
INSERT INTO `locals` VALUES (12, 'Agensi Pekerjaan Unggul Jaya Sdn Bhd', '563037-W', '710C', '12-1, Jalan Kuchai Maju 8, Off Jalan Kuchai Lama, 58200 Kuala Lumpur', 'Lai Yun Choy', 'Director', '012-3831801');
INSERT INTO `locals` VALUES (13, 'Agensi Pekerjaan Associates HR (KL) Sdn Bhd', '1006298-K', '225C', '157-2, Jalan Radin Bagus, Bandar Baru Seri Petaling, 57000 Kuala Lumpur', 'Cheong Kok Weng', 'Director', '012-2982007');
INSERT INTO `locals` VALUES (14, 'Agensi Pekerjaan WSL Sdn Bhd', '1104923-T', '736C', 'No. 09, 2nd Floor, Jalan Cattleya 2, Persada Cattleya, 70450 Senawang, Negeri Sembilan', 'Loy Win Sern', 'Director', '012-2113644');
INSERT INTO `locals` VALUES (15, 'Agensi Pekerjaan Warisan Juara Sdn Bhd', '913113-A', '374C', 'No.36B, Jalan Sepadu B, Taman Perindustrian Axis Seksyen 25, 40400 Shah Alam Selangor', 'Datin Sri Dr Nur Firzanah', 'Director', '012-2007751');
INSERT INTO `locals` VALUES (16, 'Agensi Pekerjaan Kami Innovasi Sdn Bhd', '814170-X', '738C', '5-2, Plaza Kasturi, Jalan Kasturi 1,  43200 Cheras Selangor', 'Dr Sukumaran N K Nair', 'Director', '019-3353851');
INSERT INTO `locals` VALUES (17, 'Agensi Pekerjaan Lonson Sdn Bhd', '566920-P', '495C', 'Wisma Lonson,137B, Persiaran Pegaga, Taman Bayu Perdana, 41200 Klang, Selangor', 'Stephanie Yu', 'Director', '012-3829139');
INSERT INTO `locals` VALUES (18, 'Agensi Pekerjaan SP Jaya Resources Sdn Bhd', '1063850-D', '064C', '27A, Jalan Meru Bestari A2, Medan Meru Bestari, 30020 Ipoh, Perak', 'Wong See Seng', 'Director', '012-5223829');
INSERT INTO `locals` VALUES (19, 'Agensi Pekerjaan Swaslink Sdn Bhd', '574381-U', '062C', 'No. 2-1, Taman Kota 1, Taman Kota, Jalan Sungai Chua, 43000 Kajang, Selangor', 'Dato\' Foo Yin Choo', 'Director', '019-3281818');
INSERT INTO `locals` VALUES (20, 'Agensi Pekerjaan Osadi Sdn Bhd', '693304-W', '370C', 'No.19, 1st Floor, Lorong Mayang Pasir 5, Bayan Baru, 11900 Bayan Lepas, Pulau Pinang', 'Ravi Olaganathan', 'Director', '019-4123580');
INSERT INTO `locals` VALUES (21, 'Agensi Pekerjaan Aztec Sdn Bhd', '1058218-T', '460C', 'No.47, Jalan Intan 7, Taman Yayasan 42600 Jenjarom Selangor', 'Tan Kian Teck', 'Director', '012-9768232');
INSERT INTO `locals` VALUES (22, 'Agensi Pekerjaan Global Partners Sdn Bhd', '955382-H', '883C', 'No.12-2, Jalan Putra Mahkota 7/7A, Putra Point Business Centre, Putra Heights, 47650 Subang Jaya, Selangor', 'Dato\' Gunnalan Periasamy', 'Director', '03-51910400');
INSERT INTO `locals` VALUES (23, 'Agensi Pekerjaan ATC Logistics Sdn Bhd', '714057-V', '097C', 'The Landmark, No. 3-9, Block 9, Jalan Batu Nilam 16, Bandar Bukit Tinggi 2, 41200 Klang Selangor', 'Yee Phey Fern', 'Director', '012-3791110');
INSERT INTO `locals` VALUES (24, 'Agensi Pekerjaan Ami Awana Sdn Bhd', '124887-W', '054C', '81-1,Persiaran Bayan Indah, 11900 Bayan Lepas, Penang', 'Dato\' Sri Chew Suen Wei', 'Director', '012-4928802');
INSERT INTO `locals` VALUES (25, 'Agensi Pekerjaan J&T Sdn Bhd', '631760-K', '454C', 'No. 61-3, Block E, Platinum Walk, No.2 Jalan Langkawi, setapak, 53300 Kuala Lumpur', 'Chan Siew Kuen', 'Director', '012-5947933');
INSERT INTO `locals` VALUES (26, 'Agensi Pekerjaan Dimensi Lebihan Sdn Bhd', '1395073-U', '1067C', 'I-2-10, Block I, Jalan PJU1A/20F, Dataran Ara Damansara 47301 Petaling Jaya, Kuala Lumpur', 'Sonny Yow', 'Director', '012-2201183');
INSERT INTO `locals` VALUES (27, 'Agensi Pekerjaan CYW (M) Sdn Bhd', '1039075-U', '116C', '11A, Jalan PPZ 1, Pusat Perniagaan Zamrud, 08000 Sungai Petani, Kedah', 'Dato\' Sri Chung Yoke Wan', 'Director', '012-4240290');
INSERT INTO `locals` VALUES (28, 'Agensi Pekerjaan EV Sdn Bhd', '636098-K', '275C', 'No.26A, Lintasan Perajurit 17H, Taman Perdagangan & Perindustrian 31400 Ipoh Perak', 'Deong Wai Loon', 'Director', '012-5207808');
INSERT INTO `locals` VALUES (29, 'Agensi Pekerjaan Pansomal Sdn Bhd', '223755-T', '065C', 'No. 191, 1st Floor, Jalan Teluk Bunut,42700 Banting Selangor', 'Tan kee Suan', 'Director', '012-3833733');
INSERT INTO `locals` VALUES (30, 'Agensi Pekerjaan HR Assist Sdn Bhd', '1437567-A', '1095C', 'No.17-1, Jalan 109F, Plaza Danau 2, Taman Danau Desa, 58100 Kuala Lumpur', 'Law Choon Yong', 'Director', '018-9883813');
INSERT INTO `locals` VALUES (31, 'Agensi Pekerjaan Euco Services Sdn Bhd', '499002-W', '699C', 'C-10-M, Mezzanine Floor, Dataran Palma, Jalan Selaman 1, Off Jalan Ampang, 68000 Ampang Selangor', 'Mohamed Ershad', 'Director', '014-2266433');
INSERT INTO `locals` VALUES (32, 'Agensi Pekerjaan DML Sdn Bhd', '966613-X', '157C', 'No.66A, Jalan Bayu Tinggi 6, Taman Bayu Tinggi, 41200 Klang Selangor', 'Tan Boon Hun', 'Director', '016-2506266');
INSERT INTO `locals` VALUES (33, 'Agensi Pekerjaan WPI (Malaysia) Sdn Bhd', '555100-H', '273C', '18, Persiaran Becham Selatan 19, Taman Bercham Jaya, 31400 Ipoh, Perak', 'Lee Boon Wei', 'Director', '016-5201084');
INSERT INTO `locals` VALUES (34, 'Agensi Pekerjaan SIMPLEX (M) Sdn Bhd', '1288167-U', '548C', 'No.1-28, Jalan Sierra 10/2, Bandar 16 Sierra, 47120 Puchong, Selangor', 'Datin Sri Salihah binti Kasim', 'Director', '012-4441060');
INSERT INTO `locals` VALUES (35, 'Agensi Pekerjaan MCS Sdn Bhd', '398468-P', '330C', 'No.65-1, Jalan TU 41, Taman Tasik Utama 75450 Ayer Keroh, Melaka', 'Matthew Ng', 'Director', '012-7228387');
INSERT INTO `locals` VALUES (36, 'Agensi Pekerjaan Fast Team Resources Sdn Bhd', '1024757-A', '455C', 'No.17, Tingkat 1, Jalan Marin 5/1, Taman Marin, Sungai Abong 84000 Muar, Johor', 'Lee Hock Seng', 'Director', '06-9512107');
INSERT INTO `locals` VALUES (37, 'Agensi Pekerjaan Manis Sdn Bhd', '1109718-X', '813C', 'No. 25-3, Jalan SP 2/2, Taman Serdang Perdana, 43300 Seri Kembangan, Selangor', 'Liow Hai Ping', 'Director', '016-6235533');
INSERT INTO `locals` VALUES (38, 'Agensi Pekerjaan Hope Resources Sdn Bhd', '1161151-P', '537C', '12A, Jalan Kundang 2, Taman Bukit Pasir, 83000 Batu Pahat, Johor', 'Lim Shu Chin', 'Director', '014-3138235');
INSERT INTO `locals` VALUES (39, 'Agensi Pekerjaan STF Saujana Sdn Bhd', '1286888-D', '596C', 'No.36, Jalan Rasah Prima 3, Pusat Komersial Rasah Prima, 70300 Seremban, Negeri Sembilan', 'Yan Lee Chin', 'Director', '012-3312352');
INSERT INTO `locals` VALUES (40, 'Agensi Pekerjaan Zoonhan Sdn Bhd', '785906-V', '535C', '32A, Tingkat 1, Jalan Sentosa 5, Taman Bayu Tinggi, 41200 Klang, Selangor', 'Lau Nian Choon', 'Director', '019-3575686');
INSERT INTO `locals` VALUES (41, 'Agensi Pekerjaan Eka Maju Sdn Bhd', '598360-V', '528C', 'No.15, Jalan Tiara 3, Bandar Baru Klang, 41150 Klang Selangor', 'Chong Mong Sim', 'Director', '03-33487555');
INSERT INTO `locals` VALUES (42, 'Agensi Pekerjaan Priston Sdn Bhd', '1018650-V', '151C', 'B-7-5, Block B, Ativo Plaza, No.1 Jalan PJU9/1 Damansara Avenue, Bandar Sri Damansara, 52200 Kuala Lumpur', 'Dato\' Nurul Cynthia', 'Director', '019-3213321');
INSERT INTO `locals` VALUES (43, 'Agensi Pekerjaan Peakjob Sdn Bhd', '1225219-P', '458C', 'B-15-1, Northpoint Office, Mid Valley City, Medan Syed Putra Utara, 59200 Kuala Lumpur', 'Chia Yeow Kim', 'Director', '03-27119545');
INSERT INTO `locals` VALUES (44, 'Agensi Pekerjaan Dura Sdn Bhd', '1273162-T', '774C', '24-3(3rd Floor), Jalan 14/48A, Sentul Raya Boulevard, Jalan Sentul 51000 Kuala Lumpur', 'Harbhajan Jit Singh', 'Director', '012-2111966');
INSERT INTO `locals` VALUES (45, 'Agensi Pekerjaan GM Management Sdn Bhd', '1276480-M', '529C', 'No.4, Lorong Sri Kijang 8, Taman Sri Kijang, 14000 Bukit Mertajam, Pulau Pinang', 'Moy Seow Fong', 'Director', '012-4562085');
INSERT INTO `locals` VALUES (46, 'Agensi Pekerjaan Harmoni Sdn Bhd', '920178-T', '622C', '117-3, Tingkat 3, Jalan Batu Tiga Lama, Berkeley Town Centre, 41300 Klang, Selangor', 'Thinagaran Pillay', 'Director', '016-4787392');
INSERT INTO `locals` VALUES (47, 'Agensi Pekerjaan Exceptional Sdn Bhd', '1065492-T', '686C', 'No.42A-3, Pusat Perdagangan One Puchong, Jalan OP 1/3, Off Jalan Puchong,47160 Puchong, Selangor', 'Choong Jia Ni', 'Director', '012-9432366');
INSERT INTO `locals` VALUES (48, 'Agensi Pekerjaan Prisma Sdn Bhd', '510552-U', '521C', 'No.81-01, Jalan Rosmerah 2/1, Taman Johor Jaya, 81100 Johor Bahru, Johor.', 'Elam Kovan', 'Director', '016-7721051');
INSERT INTO `locals` VALUES (49, 'Agensi Pekerjaan Kujaya Sdn Bhd', '722779-T', '071C', '13-1, Jalan Mutiara Melaka 5, Taman Mutiara Melaka, Batu Berendam, 75350, Melaka', 'Kh\'ng Su Ling', 'Director', '016-6662121');
INSERT INTO `locals` VALUES (50, 'Agensi Pekerjaan Venture Provision Sdn Bhd', '434591-V', '252C', 'No.16, Jalan Kuchai Maju 1, Off Jalan Kuchai Lama, 58200 Kuala Lumpur', 'Wong Lit Yong', 'Director', '012-2252929');
INSERT INTO `locals` VALUES (51, 'Agensi Pekerjaan Hontat Sdn Bhd', '490884-U', '283C', 'No.21A, Jalan Bintang 18, Taman Flora 83000 Batu Pahat Johor', 'Toh Eng Gio', 'Director', '07-4342922');
INSERT INTO `locals` VALUES (52, 'Agensi Pekerjaan Success Sdn Bhd', '1245430-X', '005C', 'Unit C-G-5, Jalan Dataran SD1, Bandar Sri Damansara, 52200 Kuala Lumpur', 'Dato\' Low Kok Keong', 'Director', '03-62773663');
INSERT INTO `locals` VALUES (53, 'Agensi Pekerjaan SRIM Sdn Bhd', '1422413-T', '1076C', '11-07, Level 11, Heritage House, No.33, Jalan Yap Ah Shak, 50300 Kuala Lumpur', 'Dato\' Santhiran', 'Director', '016-3309737');
INSERT INTO `locals` VALUES (54, 'Agensi Pekerjaan Insight Alliance Sdn Bhd', '1389612-W', '', 'Suite 7D, 4th Floor, Block 1, Worldwide Business Park, Jalan Tinju 13/50, 40100 Shah Alam, Selangor', 'Dato\' Haji Shamsul', 'Director', '012-7487066');
INSERT INTO `locals` VALUES (55, 'Agensi Pekerjaan Aseana Sdn Bhd', '508940- M', '600C', 'NO. 3-14, JALAN PUTERI 4/8, BANDAR PUTERI, 47100 Puchong Selangor', 'Chew Wei Yin', 'Director', '0 16-5209948');
INSERT INTO `locals` VALUES (56, 'Agensi Pekerjaan Idaman Sdn Bhd', '1266912-W', '697C', 'No.567, Jalan Lobak 13, Taman Lobak Indah, 09600, Lunas, Kedah', 'Vijayan', 'Director', '017-5551454');

-- ----------------------------
-- Table structure for medicals
-- ----------------------------
DROP TABLE IF EXISTS `medicals`;
CREATE TABLE `medicals`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `owner` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tel` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 63 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of medicals
-- ----------------------------
INSERT INTO `medicals` VALUES (1, 'Green Crescent Health Services', 'HSM92654', '60, Park Road, Block-k, baridhara Diplomatic Zone, Dhaka-1212', 'Nazrul Hoq', NULL);
INSERT INTO `medicals` VALUES (2, 'Transworld Medical Center', 'HSM34831', 'Cemez Shimul Trishna Trade Center (2nd Floor), KA 86/1, Kuril Bhatara, Dhaka-1212', 'Tausif Monir Choudhury', NULL);
INSERT INTO `medicals` VALUES (3, 'Saudi-Bangladesh Services Company medical Check-Up Clinic Ltd.', NULL, 'SEL Trident Tower (1st Floor), 57 Purana Paltan Line, Paltan, Dhaka', 'Eazaz Mohammed', '01811-443426');
INSERT INTO `medicals` VALUES (4, 'Lamyea Medical Centre', 'HSM20155', 'House # 80/1, Blook-C, 1st & 2nd Floor, Sainik Club More, Banani, Dhaka-1213', 'MD. Omidul Islam Masud', '01733954476');
INSERT INTO `medicals` VALUES (5, 'Eurelka Diagnostic And Medical Centre', 'HSM56868', '37/2 Zaman Tower , Purana Paltan Box Culvert Road (1st Floor), Dhaka-1000', 'Md. Ashraf Uddin Rizvi', '01711-528980');
INSERT INTO `medicals` VALUES (6, 'Human Diagnostic & Medical Centre Ltd.', 'HSM42900', 'House No. 102/1-A Naya Paltan (1st Floor), Box culvert Road, Paltan, Dhaka', 'De. Mohammed Siful Islam', '01922-800678');
INSERT INTO `medicals` VALUES (7, 'Al Ensaf Medical 7 Diagnostic Services Ltd.', 'HSM13929', '9623, haji Abdus Sattar Mansion, (2nd Floor), 100 Feet Road, Natun Bazar, Vatara, Dhaka-1212', 'Md. Nasirul Islam', '01715-802525');
INSERT INTO `medicals` VALUES (8, 'The Barakah General Hospital Ltd.', 'HSM85217', '937, Outer Circular Road, Rajarbagh, Dhaka-1217', 'Dr. Md. Radiqul Islam', '01760-561278');
INSERT INTO `medicals` VALUES (9, 'Al Jami Diagnostic Centre', 'HSM76246', '87-Purana Paltan lane, Paltan Tower, 3rd Floor, Dhaka-1000', 'Md, Kawsar Alam Sarker', '01711568126');
INSERT INTO `medicals` VALUES (10, 'Sunlight Diagnostic Center', 'HSM87019', '111, Naya Paltan, Dhaka-1000', 'Md. Nazrul Islam', '01712-205935');
INSERT INTO `medicals` VALUES (11, 'Asia Diagnostic & Medical Centre Ltd.', 'HSM33738', '4 Inner Circular Road, Hotel Asor (1st Floor), Fakirapol, Motijheel, Dhala-1000', 'Md. Hafizur Rahman Khan (Tutul)', '01711-262952');
INSERT INTO `medicals` VALUES (12, 'Desh Diagnostic & Medical Centre', 'HSM', '130, D.I.T. Extn. Road, Rahmat Bhaban, Fakirapool, Dhaka-1000', 'Md. Abdul Hamid, Alhaz Gazi Md. Abul Dashem, Md. Fazle Rahman (Rana)', '01712-800070');
INSERT INTO `medicals` VALUES (13, 'Nafa Medical Centre', 'HSM54585', 'House # 30, Road# 04, Black# C, Banani, Dhaka-1213', 'Rokeya Bagum', '+88029861562');
INSERT INTO `medicals` VALUES (14, 'Insaf Barakah Kidney and General Hospital', 'HSM89438', '11 Shahid Tajuddin Ahmed Sharoni, Mogh Bazar, Dhaka-1217', 'Prof. Dr. M Fakhrul Islam', NULL);
INSERT INTO `medicals` VALUES (15, 'JB Medical Center', 'HSM15041', 'House: 40/1 Nabarun Khan Complex, Upashahar Main Road, Sonapara, Sylhet', 'MD Farhad Zahan', '01881747630');
INSERT INTO `medicals` VALUES (16, 'Banani Clinic', 'HSM51040', 'House: 116, Road:15, Block C, Banani, Dhaka', 'Md. Aulad Hossen', '01733011222');
INSERT INTO `medicals` VALUES (17, 'Nova Medical Center', 'HSM58514', 'BH Plaza, KA-50/2, Abdul Aziz Sharak, Vattara Dhaka- 1229', 'Md. Saiful Bari', '01316903522');
INSERT INTO `medicals` VALUES (18, 'Greenland Medical Center Ltd.', 'License No. : 5297', '1, Gulshan Avenue, Gulshan-1, 1212', 'Mohammad Abdul Hye', '01709990700');
INSERT INTO `medicals` VALUES (19, 'Huma Health Center', 'License No. : TRAD/DSCC-222331/2019', 'House # 32, Road #1/A, Block #J, Baridhara, Dhaka-1212', 'FS Huma Khair', '01713032232');
INSERT INTO `medicals` VALUES (20, 'Al Humaira Health Center Ltd.', 'License No. : 000278', 'House # 6(1st & 2nd Floor), Road # 2-B, Block # J, Vattara, Gulshan-1212', 'Mr. B.H. Haroon, M.P', '01715955409');
INSERT INTO `medicals` VALUES (21, 'Times Health Care Ltd.', 'License No. : TRAD/DSCC-003459/2020', '67, Naya Paltan, Dhaka-1000', 'Mahabubul Habib Saibal', '01616206204');
INSERT INTO `medicals` VALUES (22, 'Medicus Diagnostic Center', 'HSM00525', '48, Naya Palton, Dhaka-1000', 'Md Yakub Sarkar', '01938008633');
INSERT INTO `medicals` VALUES (23, 'Shohag Diagnostic And Medical Center', 'HSM37756', '66/1, Naya Paltan, Sky View Tower, B.I VIP Road, Dhaka-1000', 'A.K.M Mohiuddin', '01933744258');
INSERT INTO `medicals` VALUES (24, 'Al-Madina Medical Services', 'HSM37756', 'Ka-43/6, Jagannathpur, Pragati Sarani, Vatara, Dhaka-1229', 'Mohammed Bashir', '01711-564889');
INSERT INTO `medicals` VALUES (25, 'Tulip Medical Center', NULL, '23/Ka Chowdhury Center New Iskaton Road, 1212 Dhaka, Bangladesh', NULL, '01627040012');
INSERT INTO `medicals` VALUES (26, 'Al Mubasher Medical Diagnostic Services', '', 'Tower 1st Floor, Padma Life, 115 Kazi Nazrul Islam Ave, Dhaka 1000, Bangladesh', NULL, '01918228727');
INSERT INTO `medicals` VALUES (27, 'Al Hayatt Medical Center', NULL, '304, Tejgaon Commercial Area, Bhuiyan Shikdar Tower, Ground Floor, Dhaka-1208', NULL, '01733777799');
INSERT INTO `medicals` VALUES (28, 'Ibn Rushd Medical Center', NULL, 'Opposite of WASA Bhaban, Ahmed Mansion, 46 Kazi Nazrul Islam Ave, Dhaka 1215, Bangladesh', NULL, NULL);
INSERT INTO `medicals` VALUES (29, 'Medical Point Diagnostic Center', NULL, 'Jamal Khan Rd, Chittagong, Bangladesh', NULL, NULL);
INSERT INTO `medicals` VALUES (30, 'The Urbane Clinical Services', NULL, '9 No. North Pahartali Ward, Chittagong, Bangladesh', NULL, NULL);
INSERT INTO `medicals` VALUES (31, 'Ali Shan Diagnostic & Specialist Doctors Cons', NULL, NULL, NULL, NULL);
INSERT INTO `medicals` VALUES (32, 'A.Rahman Medical Center', NULL, '1st Floor, Averest Centre, Shahjalal Upashahar Road, Nobarun-71, Sylhet', NULL, NULL);
INSERT INTO `medicals` VALUES (33, 'Apex Diagnostic Services (pvt) Ltd.', NULL, '15 Agrabad – Chitagong 4000 Bangladesh', NULL, NULL);
INSERT INTO `medicals` VALUES (34, 'Lab Scan Medical Serves Center Ltd', 'HSM4514440', 'M M Ali Road, Institute Market 2nd Floor Jessore Sadar, Jessore', 'Anindo Islam Amit', '01920628715');
INSERT INTO `medicals` VALUES (35, 'Al-Khaled Medical Services', NULL, 'Subhanighat Point, 3100 Sylhet', NULL, '01705639353');
INSERT INTO `medicals` VALUES (36, 'Global Specialized Hospital', NULL, '282, Almas tower, 1 Mazar Rd, Dhaka 1216', 'Ms. Anjuman Ara Bagum', '01711406248');
INSERT INTO `medicals` VALUES (37, 'Bashundhara Medical & Diagnostic Centre', 'HSM44695', '15G Green Majeda Park, Shanti-Shanti-Nagar, Dhaka-1217', 'Aminur Rahman Majumder', '01770111777');
INSERT INTO `medicals` VALUES (38, 'Star Medical & Diagnostic Center', 'HSM12277', 'Del Trident Tower (2nd Floor), 57 Purana Paltan Lane, VIP Road, Dhaka-1000', 'Aminur Rahman Majumder', '01770111777');
INSERT INTO `medicals` VALUES (40, 'Medicus Diagnostic and Medical Centre', 'HSM00525', '48 Noya Palton, Palton Dhaka-1000', 'Md. Yakub Sarker', '01720110833');
INSERT INTO `medicals` VALUES (41, 'Al-Jaber Medical Check-Up Center', 'HSM20320', 'House-44, Road-15, Block-D, Banani, Dhaka', 'Md. Abu Bakar Helal', '01724643069');
INSERT INTO `medicals` VALUES (42, 'American Diagnostic Center', 'HSM69159', 'Hr Complex, 100, Mohakhali, Dhaka-1212', 'Maher Sekander', '01937019934');
INSERT INTO `medicals` VALUES (43, 'Libya Bangla Friendship Diagnostic & Medical Centre', 'HSM32071', '1, Engineering Cort, 41, Nayapaltan, Dhaka-1000', 'Md. Harun Ur Rashid', '01711330490');
INSERT INTO `medicals` VALUES (44, 'Musa Medical Services (Pvt.) Ltd.', 'HSM653852', '66/A, Shayma Complex (1st floor), VIP road, Nayapolton, Dhaka', 'G.M Zahidul Quayum Shahin', '0181722921');
INSERT INTO `medicals` VALUES (45, 'KB Lab & Medicare Ltd.', 'HSM98445', 'KBG Tower (3rd & 4th fl0or) 15 Molabagh Chowdhury Para', 'Mohammed Enamul Kabir Kham', '01924507588');
INSERT INTO `medicals` VALUES (46, 'International Health Centre Ltd.', 'HSM', 'House no-103, Road-4/B, Banani, Dhaka', 'Mr. Md. Abdul Matin', NULL);
INSERT INTO `medicals` VALUES (47, 'Authentic Diagnostic & Consultation Ltd.', 'HSM14038', '71/4, Hoseni Dalan Road, Chak Bazar, Dhaka', 'Farzana Khan Suma', '01717301005');
INSERT INTO `medicals` VALUES (48, 'Al-Falah Medi Com Clinic (PVT) Ltd (Pathology)', 'RL500', 'H# 97/2, Hazi Towrs 2nd Floor, New Airport Road, Banani, Dhaka-1213', 'Dr. Aktherunnahar, MBBS, M. Phil', NULL);
INSERT INTO `medicals` VALUES (49, ' Al-Arabi Medical Center', 'HSM67704', '39/1, Noyapalton Fokirapool, Dhaka-1000 ', 'MD. Jalal Uddin Khondokar ', NULL);
INSERT INTO `medicals` VALUES (50, 'Merin Health Care Pvt Ltd. ', 'HSM01947', 'Ka-196/1/B, Tetul tola Khilket, Dhaka-1229 ', 'Md. Monirul Islam', '01907798500, 01907798502');
INSERT INTO `medicals` VALUES (51, 'Ideal Health City & Blood Bank', 'HSM18978', '6/7 Treaimetn Towre, Dhap, Jail Toad, Rangpur', 'Akiful Islam', '1819143760');
INSERT INTO `medicals` VALUES (52, 'AL-Riyadh Medical Check-Up', 'HSM09928', 'H # 55,R # 9, Block-F, Bananai Dhaka-1213', 'Biswas Jahangir Alam', '88017567589');
INSERT INTO `medicals` VALUES (53, 'Chandshi Medical Centre Ltd.', 'HSM4510246', 'House # 16, Road # 28, Block-K, Banani, Dhaka-1213', 'A K M Nazrul Islam', '01715690707');
INSERT INTO `medicals` VALUES (54, 'Mohimid Medical Centre', 'HSM49095', '2545 Madani Avenue, Vatara Dhaka', 'Ferdous Haque', '01741332171');
INSERT INTO `medicals` VALUES (55, 'Ferdous Medical Center', 'HSM38863', '11, Katalgonj, Panchiaish Chittagong-4203', 'Ferdous Haque', '01741332172');
INSERT INTO `medicals` VALUES (56, 'Royal Diagnostic Center', 'HSM25026', '86/1, VIP Road, Noyapaltan, Paltan, Dhaka-1000', 'Md. Abdul Kader Zilane', '01711378292');
INSERT INTO `medicals` VALUES (57, 'Euroasia Diagnostic & Medical Centre', 'HSM4512492', '147/3, Nasrin Vaban (1st Floor), D.I.T Extension Road, Fakirapool, Dhaka-1000', '', '01764191050');
INSERT INTO `medicals` VALUES (58, 'Simanto Diagnostic Centre & Hospital (Pvt.)', NULL, '326/2, Charpara Moor, Sadar, Mymensingh', 'Asaduzzaman', '1746146380');
INSERT INTO `medicals` VALUES (59, 'Ash Shefa Medical Services', NULL, 'House# Badeshor Lodge West  Dorgah Mohollah, Sylhet', 'Sadikur Rahman Chowdhory', '01755421318, 01703280559');
INSERT INTO `medicals` VALUES (60, 'Noakhali Chakkhu Hospital & Diabetic Center', 'HSM73077', 'Gazi Amni Ullah Shoruk, Fani Road, Chowmuhani, Bagumgonj, Noakhali', 'Md. Shahjahan Miha', '01818562593');
INSERT INTO `medicals` VALUES (61, 'Noakhali Chakkhu Hospital & Diabetic Center', 'HSM24852', 'Gazi Amni Ullah Shoruk, Fani Road, Chowmuhani, Bagumgonj, Noakhali', 'Md. Shahjahan Miha', '01818562594');
INSERT INTO `medicals` VALUES (62, 'Dhaka Imperial Hospital Ltd.', 'HSM4310864', 'Mymensingh Road, Holding #05, Ward #03, Hossain Market, Tongi, Gazipur', 'Dr. Hasmat Ali', NULL);

-- ----------------------------
-- Table structure for trainings
-- ----------------------------
DROP TABLE IF EXISTS `trainings`;
CREATE TABLE `trainings`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `license` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `owner` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tel` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of trainings
-- ----------------------------
INSERT INTO `trainings` VALUES (1, 'South Point Skills Center', NULL, 'House # 6A, Road # 2, Gulshan-1, Dhaka-1212', 'Manzur Kader', '+8802222261057-8');
INSERT INTO `trainings` VALUES (2, 'Rabbi Training & Development Institute', NULL, 'House # 30, Road# 04, Block # C, Banani, Dhaka-1213', 'Mohammed Bashir', '+8809612-331144');
INSERT INTO `trainings` VALUES (3, 'Economic International Training Center', NULL, 'Phulbaria Nisat Nagar Turag, Dhaka-1230', 'Onil Biswas', '01997669933');
INSERT INTO `trainings` VALUES (4, 'Times Training Institute & Language Center', NULL, 'City Heart (4th Floor), 67 Naya Paltan, VIP Road, Dhaka-1000', 'Md. Abul Khair', '01713032232');
INSERT INTO `trainings` VALUES (5, 'Bashundhara Training and Testing Center', NULL, '127 No, Shekher Jayga Uttor Manikdia, Sobuj Bagh Khilgaon, Dhaka', 'Aminur Rahman Majumder', '01770-111777');
INSERT INTO `trainings` VALUES (6, 'Skill Development Training Center', '199372', '4679, Chanpara, Ujanpur, Uttar Khan, Dhaka-1230', 'Md. Shahabuddin', '01842566514');
INSERT INTO `trainings` VALUES (7, 'Greenland Training Center Ltd.', NULL, '1, Gulshan Avenue, Gulshan-1, 1212', 'Mohammad Abdul Hye', '01709990700');
INSERT INTO `trainings` VALUES (8, 'Afia Technical And Training Center', NULL, '78/E, Purana Paltan Line, Bijoy Nagar, Dhaka-1000', 'Altab Khan', '01731288888');
INSERT INTO `trainings` VALUES (9, 'Orchard International Training and Orientation Center', NULL, 'Orchard Faruque Tower, Level-17, 72, Naya Paltan, Paltan, Dhaka-1000', 'Dr. Mohammed Faruque', '01819245113');
INSERT INTO `trainings` VALUES (10, 'Eastern Resource Management Services Ltd.', NULL, 'Sayed Grand Centre (6th Floor), Plot No. 89 Road No. 28, Dhaka', 'Abul Monsur Ahmed', '01731855977');
INSERT INTO `trainings` VALUES (11, 'One Man Power Resource Training Ltd.', '369352', '258/59/60, Noyanagar Bazar, Turag (Old Uttara), Dhaka, Bangladesh', 'Md. Robiul Islam', NULL);
INSERT INTO `trainings` VALUES (12, 'MAM Technical Training Center', NULL, 'H-79, Sikder Plaza (5th Floor), Chairman Bari, Banani, Dhaka-1213', 'Rr. Islam', '01762443322');
INSERT INTO `trainings` VALUES (13, 'Zilani Gulf Training Institute', NULL, 'Plot#2-3 N/S Road Block-H, Aftabnagor Eastern Housing Badda, Gulshan, Dhaka', 'Mr. Mizanur Rahman Chowdhury', ' 01711560109 ');
INSERT INTO `trainings` VALUES (14, 'JTC Training Centre', NULL, '10, Nimtolirtek, Nishatnogor,Diabari, Uttara, Dhaka-1230', 'Md. Foyazur Rahaman Asad', '01813639331');

SET FOREIGN_KEY_CHECKS = 1;
