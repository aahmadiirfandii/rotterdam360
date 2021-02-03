/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : dev_rotterdam360

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 03/02/2021 11:36:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id_user` int(11) NOT NULL,
  `fullname` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `notelp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `remember_me` int(11) NOT NULL DEFAULT 0,
  `akses_level` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `session_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `iat` datetime(0) NOT NULL,
  `uat` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_user`) USING BTREE,
  UNIQUE INDEX `email`(`username`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (11339179, 'Admin', '0812345678', 'admin@gmail.com', 'admin', '$2y$10$ssZxCins.jQvwNnslJuayuUlO3VuTF54Yd/cFwzrQzXT5GVQh4K8O', 0, 'Admin', '', 'qj7vhqpra1d09gees3qshckquhlebh6s', '2016-12-20 00:00:00', '2021-02-03 11:02:13');

-- ----------------------------
-- Table structure for hotspots
-- ----------------------------
DROP TABLE IF EXISTS `hotspots`;
CREATE TABLE `hotspots`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urutan` int(11) NOT NULL,
  `main_scene` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pitch` float NOT NULL,
  `yaw` float NOT NULL,
  `type` enum('scene','info') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `text` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `scene_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `iat` datetime(0) NOT NULL,
  `uat` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `main_scene`(`main_scene`) USING BTREE,
  INDEX `scene_id`(`scene_id`) USING BTREE,
  CONSTRAINT `hotspots_ibfk_1` FOREIGN KEY (`main_scene`) REFERENCES `scenes` (`scene_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hotspots_ibfk_2` FOREIGN KEY (`scene_id`) REFERENCES `scenes` (`scene_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 49 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hotspots
-- ----------------------------
INSERT INTO `hotspots` VALUES (1, 1, 'crossroad-1', -6.25459, 90.7651, 'scene', 'Bioskop Mini', 'bioskop-mini', '2020-12-11 12:57:02', '2020-12-17 02:38:53');
INSERT INTO `hotspots` VALUES (2, 2, 'crossroad-1', 3.12392, -38.6815, 'scene', 'Aula', 'aula', '2020-12-11 13:32:21', '2020-12-17 02:41:33');
INSERT INTO `hotspots` VALUES (3, 3, 'crossroad-1', -0.294334, -116.553, 'scene', 'Gedung B', 'gedung-b', '2020-12-11 22:36:10', '2020-12-17 02:44:54');
INSERT INTO `hotspots` VALUES (5, 5, 'crossroad-1', -0.533221, -46.5458, 'scene', 'Gedung E', 'gedung-e', '2020-12-11 22:43:24', '2020-12-17 02:42:29');
INSERT INTO `hotspots` VALUES (6, 6, 'crossroad-1', -1.49024, 47.3289, 'scene', 'Museum La Galigo', 'museum-la-galigo', '2020-12-11 22:45:45', '2020-12-17 02:35:28');
INSERT INTO `hotspots` VALUES (7, 7, 'crossroad-1', 0.413941, 7.43744, 'scene', 'Gedung K', 'gedung-k', '2020-12-11 22:49:54', '2020-12-17 02:40:44');
INSERT INTO `hotspots` VALUES (8, 8, 'bioskop-mini', 0.230428, -159.057, 'scene', 'Pintu Masuk', 'crossroad-1', '2020-12-11 22:52:54', '2020-12-17 02:39:59');
INSERT INTO `hotspots` VALUES (12, 12, 'gedung-b', 3.2468, 175.002, 'scene', 'Gedung E', 'gedung-e', '2020-12-11 23:01:19', '2020-12-17 02:54:36');
INSERT INTO `hotspots` VALUES (13, 13, 'gedung-b', 7.52601, -166.716, 'scene', 'Gedung P', 'aula', '2020-12-11 23:02:21', '2020-12-17 02:54:53');
INSERT INTO `hotspots` VALUES (14, 14, 'gedung-b', 0.393542, -89.7806, 'scene', 'Bioskop Mini', 'bioskop-mini', '2020-12-11 23:06:04', '2021-01-19 16:23:48');
INSERT INTO `hotspots` VALUES (15, 15, 'gedung-b', 1.43145, -110.419, 'scene', 'Gedung M', 'gedung-m', '2020-12-11 23:09:02', '2020-12-17 02:52:33');
INSERT INTO `hotspots` VALUES (16, 16, 'gedung-b', -2.90365, -89.9921, 'scene', 'Pintu Masuk', 'crossroad-1', '2020-12-11 23:10:21', '2020-12-17 02:52:07');
INSERT INTO `hotspots` VALUES (17, 17, 'gedung-e', 4.36415, -117.085, 'scene', 'Aula', 'aula', '2020-12-11 23:12:07', '2020-12-17 02:58:04');
INSERT INTO `hotspots` VALUES (18, 18, 'gedung-e', -2.93738, -98.5905, 'scene', 'Gedung B', 'gedung-b', '2020-12-11 23:12:46', '2020-12-17 02:58:30');
INSERT INTO `hotspots` VALUES (19, 19, 'gedung-e', -3.73086, 116.949, 'scene', 'Gedung J', 'gedung-j', '2020-12-11 23:15:17', '2020-12-17 02:59:23');
INSERT INTO `hotspots` VALUES (20, 20, 'gedung-j', -2.56041, 3.84108, 'scene', 'Taman Baca Anak', 'taman-baca-anak', '2020-12-11 23:24:23', '2020-12-17 01:55:50');
INSERT INTO `hotspots` VALUES (21, 21, 'gedung-j', 14.946, -52.5648, 'scene', 'Perpustakaan', 'perpustakaan', '2020-12-11 23:25:25', '2020-12-17 01:03:07');
INSERT INTO `hotspots` VALUES (22, 22, 'gedung-j', -1.10081, -150.684, 'scene', 'Gedung E', 'gedung-e', '2020-12-11 23:26:54', '2020-12-17 01:03:07');
INSERT INTO `hotspots` VALUES (23, 23, 'gedung-j', 4.7036, 173.674, 'scene', 'Gedung P', 'gedung-p', '2020-12-11 23:28:06', '2020-12-17 01:03:07');
INSERT INTO `hotspots` VALUES (24, 24, 'gedung-j', 2.51244, 53.3113, 'scene', 'Gedung K', 'gedung-k', '2020-12-11 23:28:48', '2020-12-17 01:03:07');
INSERT INTO `hotspots` VALUES (25, 25, 'gedung-k', -0.75089, -86.6668, 'scene', 'gedung-j', 'gedung-j', '2020-12-11 23:32:15', '2020-12-17 03:05:57');
INSERT INTO `hotspots` VALUES (26, 26, 'gedung-k', 2.96872, -130.483, 'scene', 'Aula', 'aula', '2020-12-11 23:33:05', '2020-12-17 03:08:53');
INSERT INTO `hotspots` VALUES (27, 27, 'gedung-k', -1.96112, 158.924, 'scene', 'Museum La Galigo', 'museum-la-galigo', '2020-12-11 23:33:27', '2020-12-17 03:07:45');
INSERT INTO `hotspots` VALUES (28, 28, 'aula', -5.17485, -179.955, 'scene', 'Gedung E', 'gedung-e', '2020-12-11 23:34:57', '2020-12-17 02:56:00');
INSERT INTO `hotspots` VALUES (29, 29, 'museum-la-galigo', 5.52436, 129.7, 'scene', 'Pintu Masuk', 'crossroad-1', '2020-12-11 23:37:50', '2020-12-17 03:11:07');
INSERT INTO `hotspots` VALUES (30, 30, 'crossroad-1', -0.726965, -5.6521, 'scene', 'Gedung J', 'gedung-j', '2020-12-17 02:36:19', '2020-12-17 02:37:17');
INSERT INTO `hotspots` VALUES (31, 31, 'crossroad-1', 1.1131, -129.596, 'scene', 'Bastion Bone', 'bastion-bone', '2020-12-17 02:45:31', '2020-12-17 02:45:39');
INSERT INTO `hotspots` VALUES (32, 32, 'bastion-bone', -3.62239, -1.32779, 'scene', 'Pintu Masuk', 'crossroad-1', '2020-12-17 02:47:36', '2020-12-17 02:47:39');
INSERT INTO `hotspots` VALUES (33, 33, 'bastion-bone', -4.19827, -40.8579, 'scene', 'Gedung B', 'gedung-b', '2020-12-17 02:48:24', '2020-12-17 02:48:26');
INSERT INTO `hotspots` VALUES (34, 34, 'gedung-b', 4.03404, -40.2974, 'scene', 'Bastion Bone', 'bastion-bone', '2020-12-17 02:50:44', '2020-12-17 02:50:45');
INSERT INTO `hotspots` VALUES (35, 35, 'gedung-e', -1.43393, 144.823, 'scene', 'Gedung K', 'gedung-k', '2020-12-17 03:00:18', '2020-12-17 03:00:27');
INSERT INTO `hotspots` VALUES (36, 36, 'taman-baca-anak', 4.67239, 174.495, 'scene', 'Gedung J', 'gedung-j', '2020-12-17 03:02:14', '2020-12-17 03:02:15');
INSERT INTO `hotspots` VALUES (37, 37, 'perpustakaan', 0.896552, 143.7, 'scene', 'Gedung J', 'gedung-j', '2020-12-17 03:02:14', '2021-02-03 11:14:19');
INSERT INTO `hotspots` VALUES (38, 38, 'gedung-j', 0.863638, 115.093, 'scene', 'Museum La Galigo', 'museum-la-galigo', '2020-12-17 03:02:14', '2020-12-17 03:04:49');
INSERT INTO `hotspots` VALUES (39, 39, 'gedung-k', -0.533222, -111.143, 'scene', 'Gedung E', 'gedung-e', '2020-12-17 03:06:47', '2020-12-17 03:06:59');
INSERT INTO `hotspots` VALUES (40, 40, 'gedung-k', -1.47466, -166.212, 'scene', 'Pintu Masuk', 'crossroad-1', '2020-12-17 03:09:50', '2020-12-17 03:10:07');
INSERT INTO `hotspots` VALUES (41, 41, 'gedung-b', -0.968327, -3.09769, 'scene', 'Layanan Publik', 'layanan-publik', '2021-02-03 11:22:11', '2021-02-03 11:22:23');
INSERT INTO `hotspots` VALUES (42, 42, 'layanan-publik', 10.7414, 112.273, 'scene', 'Gedung B', 'gedung-b', '2021-02-03 11:23:39', '2021-02-03 11:24:34');
INSERT INTO `hotspots` VALUES (43, 43, 'crossroad-1', -0.615282, -17.7576, 'scene', 'Pameran Tetap BPCB', 'pameran-tetap', '2021-02-03 11:25:49', '2021-02-03 11:26:01');
INSERT INTO `hotspots` VALUES (44, 44, 'pameran-tetap', 1.25181, 83.6725, 'scene', 'Pintu Masuk', 'crossroad-1', '2021-02-03 11:27:02', '2021-02-03 11:27:13');
INSERT INTO `hotspots` VALUES (45, 45, 'gedung-b', 2.19453, -147.161, 'scene', 'Pameran Tetap BPCB', 'pameran-tetap', '2021-02-03 11:28:42', '2021-02-03 11:28:52');
INSERT INTO `hotspots` VALUES (46, 46, 'gedung-k', 0.313437, -147.033, 'scene', 'Pameran Tetap BPCB', 'pameran-tetap', '2021-02-03 11:30:12', '2021-02-03 11:30:21');
INSERT INTO `hotspots` VALUES (47, 47, 'gedung-k', 15.7004, -2.30369, 'scene', 'Storage BPCB', 'storage-bpcb', '2021-02-03 11:32:04', '2021-02-03 11:32:05');
INSERT INTO `hotspots` VALUES (48, 48, 'storage-bpcb', -1.25506, -30.0339, 'scene', 'Gedung K', 'gedung-k', '2021-02-03 11:32:42', '2021-02-03 11:33:03');

-- ----------------------------
-- Table structure for scenes
-- ----------------------------
DROP TABLE IF EXISTS `scenes`;
CREATE TABLE `scenes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urutan` int(11) NOT NULL,
  `scene_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `label` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `title` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `hfov` float NOT NULL,
  `pitch` float NOT NULL,
  `yaw` float NOT NULL,
  `type` enum('equirectangular','scene','none') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `panorama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `koordinat` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` enum('gedung','ruangan','luar_ruangan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `present_photo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `past_photo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `iat` datetime(0) NOT NULL,
  `uat` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `scene_id`(`scene_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of scenes
-- ----------------------------
INSERT INTO `scenes` VALUES (1, 1, 'crossroad-1', 'X', 'Pintu Masuk', 170, 0, 0, 'equirectangular', 'gate.jpg', '0.4110,0.2610', 'luar_ruangan', '', '', '', '2020-12-10 22:26:10', '2020-12-17 03:13:22');
INSERT INTO `scenes` VALUES (3, 2, 'gedung-b', 'B', 'Gedung B', 170, 0, 0, 'equirectangular', 'gedung_b.jpg', '0.5372,0.1974', 'gedung', 'Bangunan ini menunjukkan ciri arsitektur khas gaya Belanda dapat dilihat dari bentuk\r\nbangunan yang memanjang dan bertingkat. Bangunan ini merupakan hasil rekonstruksi\r\noleh SPSP Sulselra yang sekarang berubah nama menjadi BPCB Sulawesi Selatan karena\r\nkeadaannya yang sangat hancur akibat perang. Bangunan ini tidak memiliki cerobong asap\r\nsemu seperti bangunan lainnya dalam benteng. Pada bagian lantai II terdapat serambi\r\nseperti arsitektur lokal Bugis-Makassar. Luas bangunan adalah 104 m 2 , menghadap ke\r\ntimur yang membujur dari utara ke selatan. Bangunan ini dahulu keadaannya sangat\r\nhancur karena terkena bom, setelah direhabilitasi tahun 1994, bangunan ini terdiri dari\r\nempat buah ruangan, namun sebuah ruangan di sebelah utara masih dalam keadaan rusak\r\ndan sekarang dipergunakan sebagai gudang. Jadi hanya tiga ruangan saja yang dapat\r\ndifungsikan sampai sekarang. Atap terbuat dari semen dan berbentuk datar, kecuali pada\r\nbagian selasar atap tersusun dari genteng dan bentuknya miring. Dahulu bagian atas\r\nbangunan ini dipergunakan sebagai tempat perwakilan dagang dan bagian bawah\r\ndifungsikan sebagai sel Bangunan tersebut menunjukkan gaya arsitektur Renaisans. Gaya\r\narsitektur Renaisans terlihat pada bentuk pilarnya yang menggunakan gaya Romawi yaitu\r\nsistem entasis dan order dorik. Bangunan ini tidak mempunyai atap, karena bagian atasnya\r\ntidak dapat direkonstruksi lagi karena keadaannya sangat hancur.', 'b_present.jpg', 'b_past.jpg', '2020-12-10 22:30:09', '2020-12-17 03:14:58');
INSERT INTO `scenes` VALUES (4, 3, 'gedung-p', 'P', 'Gedung P', 0, 0, 0, 'none', '', '0.4785,0.4795', 'gedung', 'Bangunan berlantai dua ini dengan luas 544 m 2 digunakan sebagai Gereja pada masa\r\ncolonial Belanda dan sekarang digunakan sebagai Aula pada bagian atas dan bagian bawah\r\ndigunakan sebagai ruang pamer oleh BPCB Sulawesi Selatanr, bangunan berbentuk persegi\r\npanjang yang melintang dari utara ke selatan, terletak pada bagian tengah dari Benteng\r\nUjungpandang. Direhabilitasi pertama kali dengan menggunakan dana dari bantuan\r\nkerajaan Belanda tahun 1976. Pada bagian di depan terdapat dua buah tangga di sebelah\r\nkiri dan kanan dibuat secara berterap, Bagian jendela terdapat 4 buah model tapal kuda\r\ndan dua buah bentuk persegi panjang pada bagian barat bangunan. Pada lantai II, bagian utaranya terdapat tangga yang terbuat dari batu bata dan diberi\r\nplasteran dan di bagian atas tangga terdapat selasar. Pintu depan berbentuk tapal kuda\r\npanil polos ganda ukuran 2,0 x 1,8 meter. Hanya mempunyai dua ruangan saja, antar\r\nruangan dihubungkan dengan pintu segi empat panil polos tunggal 2,1 x 1,2 meter.\r\nRuangan belakang terdapat pintu segi empat panil polos tunggal ukuran 2,0 x 1,0 meter di\r\nbagian timur untuk keluar masuk yang dihubungankan dengan tangga kayu untuk ke lantai\r\nbawah. Bentuk jendela ruangan depan berbeda dengan berbeda dengan bentuk jendela\r\nruangan belakang, ruangan depan memakai jendela segi empat panil krepyak ganda ukuran\r\n2,0 x 1,6 meter yang mempunyai ventilasi kaca berbentuk lengkung lancip berbentuk busur\r\ndi atasnya sebagai hiasan. Kaca mati tersebut mencirikan gaya gotik. Jendela tersebut\r\nterletak di sebelah timur dan barat masing-masing empat buah. Jendela ruangan belakang\r\nberbentuk segi empat panil krepyak tunggal ukuran 1,0 x 0,8 meter sebanyak lima buah,\r\nmasing-masing dua buah pada bagian timur dan barat bangunan dan bagian selatan satu\r\nbuah.', 'p_present.jpg', 'p_past.jpg', '2020-12-10 22:32:14', '2020-12-17 03:15:00');
INSERT INTO `scenes` VALUES (5, 4, 'gedung-e', 'E', 'Gedung E', 170, 0, 0, 'equirectangular', 'gedung_e.jpg', '0.6204,0.5743', 'gedung', 'Bangunan ini terdiri dari dua lantai, dimana lantai dasar bagian depan mempunyai selasar\r\nyang ditopang oleh pilar segi empat dengan tinggi tiga meter sebanyak 12 buah yang\r\n\r\ntersusun oleh batu bata, bangunan kiri dan kanan masing-masing enam buah pilar.\r\nBangunan ini terdiri dari dua bangunan yang dipisahkan oleh dinding dan tidak\r\nmempunyai pintu penghubung. Setiap bangunan mempunyai taman di bagian belakang.\r\nJendela-jendela yang terdapat pada sisi-sisi kiri dan kanan bangunan lantai I, II maupun\r\njendela di bawah konstruksi atap terdapat jendela segi empat panil ganda ukuran 0,9 x 0,7\r\nmeter masing-masing satu buah. Pada bagian atap menggunakan genteng yang diberi\r\nwarna merah dan mempunyai cerobong asap semu sebanyak empat buah karena terdiri\r\ndari tiga bagian ruangan yang mempunyai fungsi juga tiga. Pada bagian taman terdapat\r\nruangan-ruangan yang bagian depannya terdapat selasar yang tidak memakai penopang.', 'e_present.jpg', 'e_past.jpg', '2020-12-10 22:33:05', '2020-12-17 03:15:06');
INSERT INTO `scenes` VALUES (7, 5, 'perpustakaan', 'Pp', 'Perpustakaan', 170, 0, 0, 'equirectangular', 'perpustakaan.jpg', '0.5050,0.7708', 'ruangan', '', NULL, NULL, '2020-12-10 22:36:07', '2020-12-17 03:15:07');
INSERT INTO `scenes` VALUES (8, 6, 'taman-baca-anak', 'TBA', 'Taman Baca Anak', 170, 0, 0, 'equirectangular', 'taman_baca_anak.jpg', '0.4750,0.7531', 'ruangan', '', NULL, NULL, '2020-12-10 22:37:15', '2020-12-17 03:15:08');
INSERT INTO `scenes` VALUES (9, 7, 'gedung-k', 'K', 'Gedung K', 170, 0, 0, 'equirectangular', 'gedung_k.jpg', '0.3260,0.8051', 'gedung', 'Luas bangunan ini adalah 556,5 m2 , membujur dari utara ke selatan menghadap ke barat\r\nterletak pada dinding timur yang bagian belakangnya melekat pada dinding benteng\r\nsebelah timur. Dahulu bangunan ini digunakan sebagai Balai Kota, setelah direhabilitasi\r\ntahun 1976 digunakan sebagai Kantor Suaka Sejarah dan Purbakala Wilayah Sulawesi\r\nSelatan lalu berganti menjadi BPCB Sulawesi Selatan. Bangunan ini terdiri dari dua lantai, bagian belakang bangunan melekat dengan benteng.\r\nJumlah ruangan lantai dasar dan lantai II adalah 11 buah. Ruangan bagian selatan baik\r\n\r\nlantai II maupun lantai dasar bentuknya miring, karena disesuaikan dengan lingkungan\r\nsekitarnya.\r\nJumlah ruangan lantai dasar adalah lima buah, seluruh ruangan terbagi memanjang,\r\ndijadikan sebagai gudang. Tiap ruangan dihubungkan dengan pintu berbentuk tapal kuda.', 'k_present.jpg', 'k_past.jpg', '2020-12-10 22:38:01', '2020-12-17 03:15:08');
INSERT INTO `scenes` VALUES (10, 8, 'gedung-m', 'M', 'Gedung M', 0, 0, 0, 'none', '', '0.2140,0.5605', 'gedung', 'Luas bangunan 2520 m2 , membujur dari barat ke timur menghadap ke utara. Pada masa lalu bangunan ini merupakan gudang dan menjadi pusat perdagangan Belanda. Setelah direhabilitasi tahun 1974, keseluruhan bangunan difungsikan sebagai gedung Museum La Galigo sampai sekarang. Bangunan ini merupakan bangunan yang terpanjang yang terdapat dalam benteng, terdiri dari tiga lantai, lantai dasar terdiri atas empat ruangan, lantai II tiga ruangan dan lantai III sebuah ruangan saja. Pada bagian depan bangunan terdapat selasar yang ditopang oleh pilar bulat yang bentuknya berbeda dengan pilar-pilar lainnya, jumlah pilarnya sebanyak 28 buah. Lantai II difungsikan sebagai ruang pamer pelaminan bugis-makassar, ruang teknologi tradisional, ruang koleksi tekstil, ruang pamer teknologi pembuatan (minyak kelapa, emas, sagu, gula merah dan tenun) , dan ruang pamer teknologi pertanian. Dari ciri arsitekturnya yang ditampakkan dengan gaya arsitektur bangunan ini adalah perpaduan antara gaya Renaisans dengan gaya khas Belnda. Ciri-ciri gaya Renaisans dapat dilihat pada bentuk pilarnya yang memakai gaya khas Romawi yaitu sistem entatis dan order dorik, selain itu juga pada bentuk jendelnya yang memakai sistem lengkungan, sedangkan ciri-ciri arsitektur khas Belanda pada bentuk bangunan yang memanjang dan seperti korek api, terdiri dari beberapa lantai, memakai Lucarne (jendela atap) serta mempunyai cerobong asap semu sebanyak empat buah.', 'm_present.jpg', 'm_past.jpg', '2020-12-10 22:39:10', '2020-12-17 03:15:09');
INSERT INTO `scenes` VALUES (11, 9, 'gedung-o', 'O', 'Gedung O', 0, 0, 0, 'none', '', '0.2979,0.2568', 'gedung', 'Bangunan ini terletak di bagian barat menghadap ke timur, membujur dari utara ke selatan\r\ndengan luas bangunan 962,17 m 2 . Dahulu terdiri dari dua bangunan, hal ini dapat terlihat\r\ndari ketinggian atap yang tidak merata atau sama tinggi. Luas bangunan pertama (kiri) 664,\r\nm 2 yang terdiri dari dua ruangan dan difungsikan sebagai pos jaga pintu gerbang dan\r\nkediaman kepala mandor, setelah direhabilitasi tahun 1974, digunakan sebagai kantor dan\r\npusat kegiatan Balai Penelitian Bahasa Cabang Ujungpandang. Bangunan ini terdiri dari\r\nsembilan ruangan, setiap ruangan dihubungkan dengan pintu, pada bagian belakang\r\nbangunan inti yaitu pada bagian barat terdapat tempat parkir dan kamar mandi. Bangunan\r\nini menggunakan dua macam gaya, karena bangunan ini pada masa dahulunya mempunyai\r\ndua fungsi yang berbeda hal tersebut dapat dilihat pada cerobong asap semu sebanyak tiga\r\nbuah. Bangunan utara mengunakan gaya renaisans, terlihat dari pilarnya yang\r\nmenggunakan order Romawi yaitu dorik dan bentuk entatis, terdiri dari tiga tingkat, tempat\r\ntersebut digunakan sebagai tempat kerja Gubernur Jenderal Belanda yang menunjukkan\r\nbangunan khas Belanda, yang dapat dilihat dari bentuknya seperti korek api dan\r\nmemanjang, tidak mempunyai serambi atau teras, terdiri dari dua tingkat, bangunan ini\r\ndigunakan sebagai pos jaga penjaga pintu gerbang dan kediaman kepala mandor.', 'o_present.jpg', 'o_past.jpg', '2020-12-10 22:40:20', '2020-12-17 03:15:12');
INSERT INTO `scenes` VALUES (12, 10, 'gedung-a', 'A', 'Gedung A', 0, 0, 0, 'none', '', '0.4466,0.2148', 'gedung', 'Berdasarkan dokumen foto lama diketahui bahwa ruang atau bagian pos jaga ini telah mengalami\r\nperubahan bentuk dalam beberapa waktu. Foto pada tahun 1915 memperlihatkan gerbang\r\nbenteng terdiri atas 3 lapis. Namun, saat ini hanya 2 lapis. Pada masa Kerajaan Gowa, gedung\r\ntersebut digunakan untuk menerima tamu agung dari Bone, dan pada saat ini digunakan sebagai\r\npos jaga.', 'a_present.jpg', 'a_past.jpg', '2020-12-14 15:20:14', '2020-12-17 03:15:13');
INSERT INTO `scenes` VALUES (13, 11, 'gedung-c', 'C', 'Gedung C', 0, 0, 0, 'none', '', '0.8658,0.1926', 'gedung', 'Bangunan berlantai tiga ini terletak di Bastion Buton dengan luas 495 m 2 menghadap ke\r\nselatan. Dahulu, bangunan ini dipergunakan untuk menerima tamu dari Buton. Sesudah\r\ndirehabitasi tahun 1976, bangunan ini kemudian digunakan sebagai pusat latihan tari\r\nIndonesia (Konservatory Tari Indonesia) di Ujungpandang, setelah itu digunakan sebagai\r\npusat kesenian Makassar atau lebih dikenal sebagai bangunan DKM (Dewan Kesenian\r\nMakassar). Pada bagian atas bangunan terdapat kaca mati yang berbentuk tapal kuda\r\nmasing-masing satu buah pada bagian barat dan timur. Bagian bangunan ini memerlihakan\r\nciri-ciri arsitektur gaya khas Belanda yang mendapat pengaruh iklim tropis. Hal ini dapat\r\ndiamati ada jendela bagian barat bangunan tepat pada lantai II, terdapat Over Steak (atap\r\njendela), bagian utara lantai II bangunan terdapat teras, sedangkan cirri gaya khas Belanda\r\ndapat dilihat pada bentuk bangunan yang berbentuk korek api, terdiri dari beberapa lantai,\r\nmempunyai Lucarne (jendela atap), dan mempunyai cerobong asap semu.', 'c_present.jpg', 'c_past.jpg', '2020-12-14 15:41:27', '2020-12-17 03:15:13');
INSERT INTO `scenes` VALUES (14, 12, 'gedung-d', 'D', 'Gedung D', 0, 0, 0, 'none', '', '0.6495,0.3123', 'gedung', 'Bangunan ini merupakan bangunan tertua diantara bangunan di dalam benteng. Didirikan\r\ntahun 1686, sebagai tempat tinggal Cornelius Speelman, menghadap ke selatan membujur\r\ndari barat ke timur dengan luas bangunan 189,65 m 2 . Bangunan ini terdiri dari tiga lantai,\r\njumlah ruangan lantai dasar adalah 10 buah, lantai II sebanyak lima buah dan lantai III\r\nhanya satu ruangan. Pada lantai dasar terdapat selasar pada bagian yang ditopang dengan\r\npilar segi empat dengan tinggi 3,0 meter sebanyak tujuh buah. Setiap jendela dan pintu\r\ndasar bagian barat dan timur diberi Over Steak yang konsolnya terbuat dari kayu. Over\r\nSteak lantai II konsolnya terbuat dari besi berbentuk sulur dan lantai III konsolnya terbuat\r\ndari kayu. Pintu lantai dasar di sisi kiri dan kanan bangunan juga mempunyai Over Steak\r\nyang konsolnya terbuat dari kayu.', 'd_present.jpg', 'd_past.jpg', '2020-12-14 15:44:17', '2020-12-17 03:15:14');
INSERT INTO `scenes` VALUES (15, 13, 'gedung-f', 'F', 'Gedung F', 0, 0, 0, 'none', '', '0.7812,0.5553', 'gedung', 'Luas bangunan ini 556 m2 dan menghadap ke selatan. Bangunan ini mempunyai selasar\r\nteras yang terbuat dari kayu pada bagian depan di lantai II dan tidak mempunyai molding di\r\nbagian atap. Bangunan ini merupakan hasil rekonstruksi suaka, karena keadaan\r\nsebelumnya sangat hancur. Setelah selesai direkonstruksi digunakan sebagai laboratorium\r\nkonservasi Museum La Galigo sampai sekarang. Bangunan ini terdiri dari dua lantai. Pada\r\nruangan sebelah barat berbeda dengan ruangan sebelah timur. Perbedaan sangat menonjol\r\ndapat dilihat pada ruangan sebelah barat yang terdapat selasar yang ditopang oleh pilar\r\nyang tersusun oleh batu bata segi empat diberi plesteran, sedangkan pada ruangan sebelah\r\ntimur tidak ada. Terdapat void tempat tangga yang mempunyai bordes menuju lantai II. Di\r\ntengah-tengah ruangan terdapat kolom yang besar yang tersusun dari batu-bata berbentuk\r\nsegi empat untuk menopang balok lantai II.', 'f_present.jpg', 'f_past.jpg', '2020-12-14 16:19:16', '2020-12-17 03:15:17');
INSERT INTO `scenes` VALUES (16, 14, 'gedung-g', 'G', 'Gedung G', 0, 0, 0, 'none', '', '0.7618,0.6906', 'gedung', 'Bangunan berlantai tiga ini terletak pada bagian tenggara Benteng Ujungpandang. Luas\r\nbangunan adalah 171 m 2 , dan dahulu digunakan sebagai tempat pertukangan. Lantai\r\ndasarnya berbentuk kubah dengan lantai menggunakan ubin teraso 30 x 30 cm warna abu-\r\nabu bintik-bintik hitam. Bagian depan (selatan) terdapat pintu tapal kuda ukuran 4,5 x 1,2\r\nmeter dengan menggunakan terali besi ganda. Bagian belakang (utara) bangunan dinding\r\nberbentuk tapal kuda (tapal kuda semu). Lantai dasar dibagi ke dalam dua ruangan yang\r\ndipisahkan oleh dinding. Bagian depan bangunan, di sebelah kanan terdapat tangga kayu\r\nyang diberi Over Steak untuk naik ke lantai II. Lantai II bangunan, hanya mempunyai satu\r\nruangan saja. Lantai ditutupi ubin teraso 20 x 20 cm yang disusun sejajar. Lantai III\r\nbangunan ini terdapat enam buah jendela segi empat panil krepyak tunggal ukuran 0,9 x 0,8\r\nmeter, di sisi selatan dua buah, sisi timur dua buah dan sisi barat juga terdapat dua buah. Di\r\nbawah konstruksi atap terdapat sebuah jendela segi empat panil krepyak tunggal di bagian\r\nselatan bangunan.', 'g_present.jpg', 'g_past.jpg', '2020-12-14 16:20:55', '2020-12-17 03:15:18');
INSERT INTO `scenes` VALUES (17, 15, 'gedung-h', 'H', 'Gedung H', 0, 0, 0, 'none', '', '0.7701,0.8169', 'gedung', 'Bangunan ini menempati bastion Mandarsyah pada Benteng Ujungpandang, luas bangunan adalah 905,84 m 2 , dahulu bangunan ini digunakan sebagai tempat untuk menerima tamu dari Mandarsyah (Ternate). Bangunan ini terdiri dari 4 lantai. Lantai dasar bangunan atapnya berbentuk kubah, terdiri dari tiga ruangan menghadap ke arah timur laut Benteng.', 'h_present.jpg', 'h_past.jpg', '2020-12-14 16:22:48', '2020-12-17 03:15:19');
INSERT INTO `scenes` VALUES (18, 16, 'gedung-i', 'I', 'Gedung I', 0, 0, 0, 'none', '', '0.6176,0.7575', 'gedung', 'Bangunan berlantai satu yang dibangun pada masa pendudukan Jepang ini menempati sisi\r\ntimur Benteng Ujungpandang. Berdasarkan sumber sejarah, gedung ini dibangun karena\r\nJepang kekurangan gedung kantor pada masa pemerintahannya. Luas bangunan 426,4 m 2.\r\nGaya bangunan disesuaikan dengan bangunan yang lain, tetapi dindingnya lebih tipis\r\ndengan ketebalan 30 cm. Jumlah ruangan terdapat 10 buah, terdapat lorong di tengah-\r\ntengah bangunan. Ditengah-tengah ruangan terdapat lorong kecil, yang menunjukkan\r\nperbedaannya dengan bangunan-bangunan lain. Lorong tersebut merupakan salah satu ciri\r\ndari arsitektur rumah tradisional Jepang. Ornamen pada sudut atap bangunan lebih\r\nsederhana dari ornamen bangunan di sekitarnya.', 'i_present.jpg', 'i_past.jpg', '2020-12-14 16:26:13', '2020-12-17 03:15:20');
INSERT INTO `scenes` VALUES (19, 17, 'gedung-l', 'L', 'Gedung L', 0, 0, 0, 'none', '', '0.1845,0.8389', 'gedung', 'Bangunan ini berarsitektur Renaisans dengan bentuk segi empat panjang, terdiri dari dua\r\nlantai. Lantai dasarnya menjadi semacam landasan dari bagian tasnya, dan pada bagian\r\natasnya (atap) membentuk kubah. Jendela pada lantai dasar berbentuk pelengkung dan\r\npilaster pada sermbi lantai II tersusun monoton yang merupakan ciri arsitektur Renaisans.\r\nAtap selasar pada bagian depan lantai II lebih menjorok ke depan. Bangunan ini terletak\r\npada bastion Amboina (timur laut) pada jaman dahulu terdapat bangunan di atasnya\r\nnamun sekarang hanya nampak dua buah bangunan yang dipisahkan oleh lorong menuju\r\nke atas bastion.', 'l_present.jpg', 'l_past.jpg', '2020-12-14 16:31:10', '2020-12-17 03:15:22');
INSERT INTO `scenes` VALUES (20, 18, 'gedung-n', 'N', 'Gedung N', 0, 0, 0, 'none', '', '0.1420,0.2707', 'gedung', 'Bangunan ini menempati bastion Bacan dengan luas 336 m 2 , terdiri dari tiga lantai.\r\nTerdapat ventilasi bulat pada bagian selatan atas bangunan. Terdapat dua pintu, yang\r\npertama digunakan sebagai pintu masuk sedangkan pintu yang lainnya sebagai pintu ke\r\nruang istirahat berbentuk tapal kuda tanpa daun pintu. Pintu ada dua di sebelah kiri terbuat dari kayu berdaun ganda diberi cat warna merah.\r\nRuangan sebelah kanan merupakan ruangan visualisasi (ruang tahanan pangeran\r\nDiponegoro), terdapat dua pintu, yang pertama digunakan sebagai pintu masuk dan\r\nterhubung ke lantai dua bangunan selain itu juga terdapat tangga dengan 15 buah anak\r\ntangga menuju ke lantai dua. Jendela ditempatkan di sebelah utara sama dengan ruangan di\r\nsebelahnya.', 'n_present.jpg', 'n_past.jpg', '2020-12-14 16:35:17', '2020-12-17 03:15:23');
INSERT INTO `scenes` VALUES (21, 19, 'gedung-j', 'J', 'Gedung J', 170, 0, 0, 'equirectangular', 'gedung_j.jpg', '0.4400,0.7708', 'gedung', 'Luas bangunan ini 838,24 m2 dan menghadap ke arah barat. Pada bagian depan terdapat\r\npilar yang ditopang oleh pilar-pilar segi empat sebanyak 10 buah, dan kolom segi empat\r\nterletak di tengah-tengah selasar bagian utara sebanyak tiga buah. Dahulu bangunan ini\r\ndigunakan sebagai tempat bagi pemegang buku Germising. Setelah direhabilitasi tahun\r\n1976, kemudian bangunan ini digunakan sebagai kantor bidang pendidikan masyarakat,\r\n\r\nRuang Polpar\r\n\r\nPerpustakaan\r\n\r\nmasa sekarang bangunan ini dijadikan sebagai perpustakaan pada lantai II, Pada bagian\r\ntengah terdapat pintu keluar yang sudah tidak digunakan lagi. Terdapat lorong yang\r\ndahulunya digunakan sebagai jalan pintu benteng bagian timur berbentuk kubah dan\r\nterdapat piscina-piscina di sebelah kiri dinding. Sebelah kiri bangunan terdapat tangga\r\nyang tersusun dari batu bata diplester digunakan untuk menuju ke lantai II, yang bagian\r\natasnya berbentuk kubah.', 'j_present.jpg', 'j_past.jpg', '2020-12-14 16:36:46', '2020-12-17 03:15:25');
INSERT INTO `scenes` VALUES (22, 20, 'bioskop-mini', 'BM', 'Bioskop Mini', 170, 0, 0, 'equirectangular', 'bioskop.jpg', '0.3592,0.2568', 'ruangan', '', '', '', '2020-12-16 19:03:19', '2020-12-17 03:15:27');
INSERT INTO `scenes` VALUES (23, 21, 'museum-la-galigo', 'MLG', 'Museum La Galigo', 170, 0, 0, 'equirectangular', 'museum.jpg', '0.2030,0.4112', 'ruangan', '', '', '', '2020-12-16 19:07:45', '2020-12-17 03:15:28');
INSERT INTO `scenes` VALUES (24, 22, 'aula', 'AU', 'Aula', 170, 0, 0, 'equirectangular', 'aula.jpg', '0.5250,0.4795', 'ruangan', '', '', '', '2020-12-16 19:45:26', '2020-12-17 03:15:29');
INSERT INTO `scenes` VALUES (25, 23, 'bastion-bone', 'BB', 'Bastion Bone', 170, 0, 0, 'equirectangular', 'bastion_bone.jpg', '0.4983,0.0695', 'luar_ruangan', '', '', '', '2020-12-16 19:52:38', '2020-12-17 03:15:30');
INSERT INTO `scenes` VALUES (26, 24, 'pameran-tetap', 'PT', 'Pameran Tetap BPCB', 170, 0, 0, 'equirectangular', 'gedung_p_dalam.jpg', '0.4302,0.4806', 'ruangan', '', NULL, NULL, '2021-02-03 11:08:49', '2021-02-03 11:11:53');
INSERT INTO `scenes` VALUES (27, 25, 'layanan-publik', 'LP', 'Layanan Publik', 170, 0, 0, 'equirectangular', 'gedung_b_dalam.jpg', '0.5314,0.1631', 'ruangan', '', NULL, NULL, '2021-02-03 11:16:19', '2021-02-03 11:20:28');
INSERT INTO `scenes` VALUES (28, 26, 'storage-bpcb', 'SB', 'Storage BPCB', 170, 0, 0, 'equirectangular', 'gedung_k_dalam.jpg', '0.3555,0.8086', 'ruangan', '', NULL, NULL, '2021-02-03 11:18:34', '2021-02-03 11:19:40');

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_scene` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `author` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `autoload` int(11) NOT NULL,
  `scene_fade_duration` int(11) NOT NULL,
  `iat` datetime(0) NOT NULL,
  `uat` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `first_scene`(`first_scene`) USING BTREE,
  CONSTRAINT `setting_ibfk_1` FOREIGN KEY (`first_scene`) REFERENCES `scenes` (`scene_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES (1, 'crossroad-1', 'Upana Studio', 1, 1000, '2017-07-07 16:07:00', '2020-12-17 03:17:30');

SET FOREIGN_KEY_CHECKS = 1;
