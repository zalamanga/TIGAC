/*
 Navicat Premium Data Transfer

 Source Server         : DB Tigac Server
 Source Server Type    : MySQL
 Source Server Version : 50743 (5.7.43-log)
 Source Host           : localhost:3306
 Source Schema         : db_tigac

 Target Server Type    : MySQL
 Target Server Version : 50743 (5.7.43-log)
 File Encoding         : 65001

 Date: 18/10/2024 14:00:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for contacts
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `contacts_name_unique`(`name`) USING BTREE,
  UNIQUE INDEX `contacts_link_unique`(`link`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contacts
-- ----------------------------

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for faqs
-- ----------------------------
DROP TABLE IF EXISTS `faqs`;
CREATE TABLE `faqs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of faqs
-- ----------------------------
INSERT INTO `faqs` VALUES (1, 'Apakah produk TIGAC aman digunakan?', 'Ya, produk-produk kami sangat aman. e-juice TIGAC telah melalui serangkaian uji lab untuk memastikan tidak ada bahan kimia berbahaya yang tidak diperlukan untuk vaping. Semua produk kami diproduksi sendiri di ruang khusus yang telah distandarisasi, memastikan tidak ada kontaminan yang masuk ke dalam proses produksi e-juice', 1, '2024-09-12 06:59:31', '2024-09-12 06:59:31');
INSERT INTO `faqs` VALUES (2, 'Bagaimana cara memesan produk TIGAC?', 'Anda dapat memesan produk TIGAC melalui toko-toko vape terdekat atau melalui platform online resmi kami.', 1, '2024-09-12 06:59:31', '2024-09-12 06:59:31');
INSERT INTO `faqs` VALUES (3, 'Apa saja varian rasa yang ditawarkan oleh TIGAC?', 'TIGAC menawarkan beragam varian rasa e-liquid yang memikat, mulai dari buah-buahan segar hingga pilihan rasa manis dan gurih. Anda dapat menemukan varian seperti buah-buahan tropis, permen, dan bahkan rasa minuman atau desert yang terinspirasi dari berbagai macam pilihan produk kami.', 1, '2024-09-12 06:59:31', '2024-09-12 06:59:31');
INSERT INTO `faqs` VALUES (4, 'Bagaimana cara memastikan keaslian produk TIGAC?', 'Untuk memastikan keaslian produk TIGAC, pastikan untuk membeli produk hanya dari pengecer resmi atau platform online kami yang terpercaya. Setiap produk asli TIGAC akan memiliki label keaslian.', 1, '2024-09-12 06:59:31', '2024-09-12 06:59:31');
INSERT INTO `faqs` VALUES (5, 'Apakah ada program loyalitas atau promosi khusus bagi pelanggan dan mitra bisnis TIGAC?', 'Ya, kami memiliki program loyalitas dan sering menawarkan promosi khusus bagi pelanggan setia kami. Pastikan untuk bergabung dengan milis kami atau mengikuti akun media sosial dan mengecek website resmi kami untuk mendapatkan informasi terbaru tentang penawaran, diskon, dan acara khusus yang sedang berlangsung.', 1, '2024-09-12 06:59:31', '2024-09-12 06:59:31');
INSERT INTO `faqs` VALUES (6, 'Bagaimana caranya KLAIM hadiah yang di dapatkan ?', 'Silakan menghubungi Customer Service TIGAC untuk claim hadiah ke nomor berikut 0811-8888-2305.', 1, '2024-09-12 06:59:31', '2024-09-12 06:59:31');
INSERT INTO `faqs` VALUES (7, 'Bagaimana cara mengetahui Ketersediaan Produk untuk Wholesale?', 'Silakan menghubungi Customer Service TIGAC untuk mengetahui stock ketersedian ke nomor berikut 0811-8888-2305 dan mengisi form yang di sediakan.', 1, '2024-09-12 06:59:31', '2024-09-12 06:59:31');
INSERT INTO `faqs` VALUES (8, 'Apakah produk e-juice TIGAC legal?', 'Produk e-juice TIGAC termasuk dalam kategori produk tembakau alternatif yang diatur oleh pemerintah Indonesia. Penjualan dan distribusi e-juice di Indonesia harus mematuhi regulasi yang berlaku, seperti perizinan dan ketentuan label kesehatan. TIGAC berkomitmen untuk mematuhi semua peraturan tersebut guna memastikan bahwa produk yang dijual legal dan aman bagi konsumen. ', 1, '2024-09-12 06:59:31', '2024-09-12 06:59:31');

-- ----------------------------
-- Table structure for hero_banners
-- ----------------------------
DROP TABLE IF EXISTS `hero_banners`;
CREATE TABLE `hero_banners`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagline` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagline_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_for_product_page` tinyint(1) NOT NULL DEFAULT 0,
  `media_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `is_priority` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `hero_banners_name_unique`(`name`) USING BTREE,
  UNIQUE INDEX `hero_banners_tagline_unique`(`tagline`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hero_banners
-- ----------------------------
INSERT INTO `hero_banners` VALUES (3, '2024-09-02 07:56:10', '2024-09-09 03:40:54', '3.png', 'Test 3', 'Test 3', 1, 'image/png', '99AUlSgbytxfdc0pIfeN7heGtxbYkVHkNMpBFs16.png', '1', '1');
INSERT INTO `hero_banners` VALUES (4, '2024-10-15 07:17:17', '2024-10-15 07:17:17', 'Tigac 1 banner', 'tessttt', 'tigac bannerrr', 1, 'image/png', 'banner/XwzkmOfy3VwtnnQPot54PqqNOXdZgR1bmbySV7EA.png', '1', '1');

-- ----------------------------
-- Table structure for masterpieces
-- ----------------------------
DROP TABLE IF EXISTS `masterpieces`;
CREATE TABLE `masterpieces`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail_short_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `masterpieces_name_unique`(`name`) USING BTREE,
  UNIQUE INDEX `masterpieces_slug_unique`(`slug`) USING BTREE,
  UNIQUE INDEX `masterpieces_detail_link_unique`(`detail_link`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of masterpieces
-- ----------------------------
INSERT INTO `masterpieces` VALUES (1, 'Tigac Saltnic Series', 'tigac-saltnic-series', '#tigac-saltnic-series', 'masterpiece/cQvOUHQXPJHtTYoYa8r63OHzztZHAwhD4040TU2c.png', NULL, 1, '2024-09-02 07:56:11', '2024-09-09 05:46:55');
INSERT INTO `masterpieces` VALUES (2, 'Tigac Sando', 'tigac-sando', '#tigac-sando', 'masterpiece/eiQFzDkAkB7KJh1IrNgA3Hcr7FrwKgH9R9BG6DrM.png', NULL, 1, '2024-09-02 07:56:10', '2024-09-09 05:46:54');
INSERT INTO `masterpieces` VALUES (3, 'Tigac Pod', 'tigac-pod', '#tigac-pod', '9L1VRcYr4HPtJbmXYOfpaXUMEUIuFcJuXstN2Rtk.png', NULL, 1, '2024-09-09 05:51:03', '2024-09-09 05:51:03');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (6, '2024_06_13_174123_create_variants_table', 1);
INSERT INTO `migrations` VALUES (7, '2024_06_18_062950_create_product_categories_table', 1);
INSERT INTO `migrations` VALUES (8, '2024_06_19_172725_create_products_table', 1);
INSERT INTO `migrations` VALUES (9, '2024_06_19_173946_create_images_table', 1);
INSERT INTO `migrations` VALUES (10, '2024_06_19_174440_create_product_variants_table', 1);
INSERT INTO `migrations` VALUES (11, '2024_08_01_022710_create_hero_banners_table', 1);
INSERT INTO `migrations` VALUES (12, '2024_08_05_050913_create_newsletters_table', 1);
INSERT INTO `migrations` VALUES (13, '2024_08_08_084147_create_partnerships_table', 1);
INSERT INTO `migrations` VALUES (14, '2024_08_09_062655_create_contacts_table', 1);
INSERT INTO `migrations` VALUES (15, '2024_08_12_015440_create_masterpieces_table', 1);
INSERT INTO `migrations` VALUES (16, '2024_08_28_062231_create_programs_table', 1);
INSERT INTO `migrations` VALUES (17, '2024_09_02_043538_create_video_home_banners_table', 1);
INSERT INTO `migrations` VALUES (18, '2024_09_11_040934_create_faqs_table', 2);

-- ----------------------------
-- Table structure for newsletters
-- ----------------------------
DROP TABLE IF EXISTS `newsletters`;
CREATE TABLE `newsletters`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail_short_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `newsletters_title_unique`(`title`) USING BTREE,
  UNIQUE INDEX `newsletters_slug_unique`(`slug`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of newsletters
-- ----------------------------
INSERT INTO `newsletters` VALUES (1, 'TIGAC Berbagi Kebahagiaan Ramadan Bersama Anak-Anak Yatim Piatu', 'tigac-berbagi-kebahagiaan-ramadan-bersama-anak-anak-yatim-piatu', '<div>\r\n<div>Startup di bidang industri liquid, TIGAC menyelenggarakan buka puasa bersama anak-anak yatim piatu belum lama ini. Kegiatan tersebut bersamaan dengan peresmian kantor baru di kawasan Pesanggrahan</div>\r\n</div>', '5d2mQULIg9qbLP5nPNWBIjh98bzecEApGqOIRRp4.png', 'TIGAC Berbagi Kebahagiaan Ramadan Bersama Anak-Anak Yatim Piatu', 1, '2024-09-02 07:56:10', '2024-09-09 06:20:35');
INSERT INTO `newsletters` VALUES (2, 'Vapezoo Dan Tigac Gaet Deadsquad Luncurkan Karya Baru “Enigmatic Pandemonium', 'vapezoo-dan-tigac-gaet-deadsquad-luncurkan-karya-baru-enigmatic-pandemonium', '<div>\r\n<div>Grup musik death metal, Deadsquad, tampil gahar malam ini. Mereka tampil di atas panggung dengan teknologi pencahayaan dan visual itu, Deadsquad tampil membawakan 13 lagu andal. Mereka melakukannya dengan senang hati</div>\r\n</div>', '0ZQjH1huZ0vb3q4DN8LrcRFBl27TYkj25ebhhKom.png', 'Vapezoo Dan Tigac Gaet Deadsquad Luncurkan Karya Baru “Enigmatic Pandemonium', 1, '2024-09-02 07:56:10', '2024-09-09 06:21:03');
INSERT INTO `newsletters` VALUES (3, 'Kolaborasi dengan Vapezoo dan TIGAC, Slank Luncurkan Poppies Liquid Vape', 'kolaborasi-dengan-vapezoo-dan-tigac-slank-luncurkan-poppies-liquid-vape', '<div>\r\n<div>Dalam sebuah konser yang digelar secara online dan disiarkan di kanal youtube SlankTube, serta media sosial Vapezoo dan TIGAC, Slank meluncurkan produk liquid vape yang diberi nama Poppies. Nama Poppies yang identik dengan pop ice yang rasanya bermacam-macam.</div>\r\n</div>', 'pMh4mg1ewcQayIZo74glWOJIsJ69vq08AuiM6C5T.png', 'Kolaborasi dengan Vapezoo dan TIGAC, Slank Luncurkan Poppies Liquid Vape', 1, '2024-09-02 07:56:10', '2024-09-09 06:21:22');

-- ----------------------------
-- Table structure for partnerships
-- ----------------------------
DROP TABLE IF EXISTS `partnerships`;
CREATE TABLE `partnerships`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `external_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `partnerships_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of partnerships
-- ----------------------------
INSERT INTO `partnerships` VALUES (1, '2024-09-02 07:56:10', '2024-09-02 07:56:10', 'logo-vb', 'logo-vb', 'partnership/logo-vb.png', 1, '#logo-vb');
INSERT INTO `partnerships` VALUES (2, '2024-09-02 07:56:10', '2024-09-02 07:56:10', 'logo-vapeboss', 'logo-vapeboss', 'partnership/logo-vapeboss.png', 1, '#logo-vapeboss');
INSERT INTO `partnerships` VALUES (3, '2024-09-02 07:56:10', '2024-09-02 07:56:10', 'logo-ejvape', 'logo-ejvape', 'partnership/logo-ejvape.png', 1, '#logo-ejvape');
INSERT INTO `partnerships` VALUES (4, '2024-09-02 07:56:10', '2024-09-02 07:56:10', 'logo-vapeon', 'logo-vapeon', 'partnership/logo-vapeon.png', 1, '#logo-vapeon');
INSERT INTO `partnerships` VALUES (5, '2024-09-02 07:56:10', '2024-09-02 07:56:10', 'logo-tom', 'logo-tom', 'partnership/logo-tom.png', 1, '#logo-tom');
INSERT INTO `partnerships` VALUES (7, '2024-09-02 07:56:10', '2024-09-02 07:56:10', 'logo-cmw', 'logo-cmw', 'partnership/logo-cmw.png', 1, '#logo-cmw');
INSERT INTO `partnerships` VALUES (8, '2024-09-02 07:56:10', '2024-09-02 07:56:10', 'logo-vaporking', 'logo-vaporking', 'partnership/logo-vaporking.png', 1, '#logo-vaporking');
INSERT INTO `partnerships` VALUES (9, '2024-09-02 07:56:10', '2024-09-02 07:56:10', 'logo-cloudvaping', 'logo-cloudvaping', 'partnership/logo-cloudvaping.png', 1, '#logo-cloudvaping');

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for product_categories
-- ----------------------------
DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `product_categories_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_categories
-- ----------------------------
INSERT INTO `product_categories` VALUES (1, '2024-09-02 07:56:10', '2024-10-15 07:14:13', 'Fruity Series', '1', 'lorem impsum dolor sit description');
INSERT INTO `product_categories` VALUES (2, '2024-09-02 07:56:10', '2024-09-18 04:45:42', 'TIGAC DEVICE', '1', 'lorem impsum dolor sit description');
INSERT INTO `product_categories` VALUES (3, '2024-09-02 07:56:10', '2024-09-18 04:45:21', 'CREME & CRIME', '1', 'lorem impsum dolor sit description');
INSERT INTO `product_categories` VALUES (4, '2024-09-02 07:56:10', '2024-09-18 04:44:48', 'POCKET ROCKID', '1', 'lorem impsum dolor sit description');
INSERT INTO `product_categories` VALUES (8, '2024-09-18 04:48:22', '2024-09-18 04:48:22', 'JAXEL', '1', NULL);
INSERT INTO `product_categories` VALUES (9, '2024-09-18 04:52:20', '2024-09-18 04:52:20', 'SLANK UP', '1', NULL);
INSERT INTO `product_categories` VALUES (10, '2024-09-26 04:23:15', '2024-09-26 04:23:15', 'HOMPIMPA', '1', NULL);

-- ----------------------------
-- Table structure for product_images
-- ----------------------------
DROP TABLE IF EXISTS `product_images`;
CREATE TABLE `product_images`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `image_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `product_images_product_id_foreign`(`product_id`) USING BTREE,
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_images
-- ----------------------------
INSERT INTO `product_images` VALUES (9, '2024-09-09 03:30:47', '2024-09-09 03:30:47', 'Melon', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi dolor fugit fugiat ipsa at eos vel ut id accusantium iusto error, optio veritatis perferendis, nobis ipsum, aut ullam eum consequatur! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt rem tempore atque consequatur ducimus beatae pariatur nihil amet debitis architecto!', '3bySrlLc2C9rHNGYyjTCVUCPRuknAbspmjoxlsjp.png', 1);
INSERT INTO `product_images` VALUES (10, '2024-09-09 03:34:58', '2024-09-09 03:34:58', 'Manggo Madness', NULL, 'pnrMPjpK39mGEAJ9HEixOPbn9iMtyRaNMjuixPRC.png', 2);
INSERT INTO `product_images` VALUES (12, '2024-09-09 03:39:21', '2024-09-09 03:39:21', 'Electra Quin', NULL, 'exV81Fdpc8yDTOOcX6n4OyP4NECgKpqoeQEIvvX6.png', 4);
INSERT INTO `product_images` VALUES (13, '2024-09-09 06:04:01', '2024-09-09 06:04:01', 'Sando', 'Sando', 'products/1LQYh1TI5UyFPPCSiWCnWroDRXYvki17vDYbeFDa.png', 6);
INSERT INTO `product_images` VALUES (14, '2024-09-09 06:06:30', '2024-09-09 06:06:30', 'Orion Shadow', 'Orion Shadow', 'products/HKxurIfzHBiolm0il0aGzx9THnDNqht9RgfoX1uo.png', 7);
INSERT INTO `product_images` VALUES (15, '2024-09-09 06:07:39', '2024-09-09 06:07:39', 'Strawberry', 'Strawberry', 'products/4uVyGEkotKtnng0nOMS9dTcP3464alVRT8baGZyT.png', 8);
INSERT INTO `product_images` VALUES (16, '2024-09-09 06:08:40', '2024-09-09 06:08:40', 'Banana Space', 'Banana Space', 'products/jPk0YH4GvoQEf2SOAXAcK5YoF20wg6PfY7czGMte.png', 9);
INSERT INTO `product_images` VALUES (17, '2024-09-09 06:10:24', '2024-09-09 06:10:24', 'Strawberry Breeze', 'Strawberry Breeze', 'products/YlYn6kG0XxYpuc6khpNyw6GOrhkbdPGOEI26PdPB.png', 10);
INSERT INTO `product_images` VALUES (18, '2024-09-20 06:20:43', '2024-09-20 06:20:43', 'required', NULL, 'products/U9aFbaGWMFAoiYKsK1eXfc3ImhwnaZU6XiznxYZN.jpg', 11);
INSERT INTO `product_images` VALUES (21, '2024-10-14 07:26:56', '2024-10-14 07:26:56', 'required', NULL, 'IFXxa0O33YpSKNzWFr6O2BV6eIopRY7SQnJmEQFC.png', 22);
INSERT INTO `product_images` VALUES (22, '2024-10-14 07:26:56', '2024-10-14 07:26:56', 'required', NULL, 'BSXKbhICJhdPfdR8AK37SQclwJO4zXjTz1UpvaQS.png', 22);
INSERT INTO `product_images` VALUES (26, '2024-10-14 07:32:45', '2024-10-14 07:32:45', 'required', NULL, 'bx2dj1RCXh3EsMZJcRy2lcVnEx9AkylAaaHW67ki.png', 3);
INSERT INTO `product_images` VALUES (27, '2024-10-14 07:32:45', '2024-10-14 07:32:45', 'required', NULL, 'Q1JQ76pqVJer3aO0mNDh7eM5MYT0hYoTwBfnymnv.png', 3);
INSERT INTO `product_images` VALUES (28, '2024-10-14 07:32:45', '2024-10-14 07:32:45', 'required', NULL, 'Dp0jpEmwsp0XdAovNPLWSJxrS2JLysGYuXY7ZwXq.png', 3);

-- ----------------------------
-- Table structure for product_variant
-- ----------------------------
DROP TABLE IF EXISTS `product_variant`;
CREATE TABLE `product_variant`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `variant_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `product_variant_product_id_foreign`(`product_id`) USING BTREE,
  INDEX `product_variant_variant_id_foreign`(`variant_id`) USING BTREE,
  CONSTRAINT `product_variant_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `product_variant_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 79 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_variant
-- ----------------------------
INSERT INTO `product_variant` VALUES (5, 3, 4);
INSERT INTO `product_variant` VALUES (6, 4, 2);
INSERT INTO `product_variant` VALUES (9, 6, 2);
INSERT INTO `product_variant` VALUES (10, 7, 2);
INSERT INTO `product_variant` VALUES (16, 11, 4);
INSERT INTO `product_variant` VALUES (17, 9, 2);
INSERT INTO `product_variant` VALUES (18, 8, 2);
INSERT INTO `product_variant` VALUES (19, 12, 2);
INSERT INTO `product_variant` VALUES (20, 13, 2);
INSERT INTO `product_variant` VALUES (21, 14, 2);
INSERT INTO `product_variant` VALUES (22, 15, 2);
INSERT INTO `product_variant` VALUES (23, 17, 2);
INSERT INTO `product_variant` VALUES (24, 18, 2);
INSERT INTO `product_variant` VALUES (25, 19, 2);
INSERT INTO `product_variant` VALUES (26, 20, 2);
INSERT INTO `product_variant` VALUES (27, 21, 2);
INSERT INTO `product_variant` VALUES (28, 22, 2);
INSERT INTO `product_variant` VALUES (29, 10, 5);
INSERT INTO `product_variant` VALUES (30, 1, 5);
INSERT INTO `product_variant` VALUES (31, 2, 5);
INSERT INTO `product_variant` VALUES (32, 22, 8);
INSERT INTO `product_variant` VALUES (33, 22, 9);
INSERT INTO `product_variant` VALUES (34, 22, 10);
INSERT INTO `product_variant` VALUES (35, 22, 11);
INSERT INTO `product_variant` VALUES (36, 21, 8);
INSERT INTO `product_variant` VALUES (37, 21, 9);
INSERT INTO `product_variant` VALUES (38, 21, 10);
INSERT INTO `product_variant` VALUES (39, 21, 11);
INSERT INTO `product_variant` VALUES (40, 20, 8);
INSERT INTO `product_variant` VALUES (41, 20, 9);
INSERT INTO `product_variant` VALUES (42, 20, 10);
INSERT INTO `product_variant` VALUES (43, 19, 8);
INSERT INTO `product_variant` VALUES (44, 19, 9);
INSERT INTO `product_variant` VALUES (45, 19, 10);
INSERT INTO `product_variant` VALUES (46, 18, 8);
INSERT INTO `product_variant` VALUES (47, 18, 9);
INSERT INTO `product_variant` VALUES (48, 17, 8);
INSERT INTO `product_variant` VALUES (49, 17, 9);
INSERT INTO `product_variant` VALUES (50, 17, 10);
INSERT INTO `product_variant` VALUES (51, 15, 8);
INSERT INTO `product_variant` VALUES (52, 15, 9);
INSERT INTO `product_variant` VALUES (53, 15, 10);
INSERT INTO `product_variant` VALUES (54, 14, 8);
INSERT INTO `product_variant` VALUES (55, 14, 9);
INSERT INTO `product_variant` VALUES (56, 14, 10);
INSERT INTO `product_variant` VALUES (57, 13, 8);
INSERT INTO `product_variant` VALUES (58, 13, 9);
INSERT INTO `product_variant` VALUES (59, 13, 10);
INSERT INTO `product_variant` VALUES (60, 12, 8);
INSERT INTO `product_variant` VALUES (61, 12, 9);
INSERT INTO `product_variant` VALUES (62, 12, 10);
INSERT INTO `product_variant` VALUES (63, 4, 8);
INSERT INTO `product_variant` VALUES (64, 4, 9);
INSERT INTO `product_variant` VALUES (65, 4, 10);
INSERT INTO `product_variant` VALUES (66, 7, 8);
INSERT INTO `product_variant` VALUES (67, 7, 9);
INSERT INTO `product_variant` VALUES (68, 7, 10);
INSERT INTO `product_variant` VALUES (69, 6, 8);
INSERT INTO `product_variant` VALUES (70, 6, 9);
INSERT INTO `product_variant` VALUES (71, 6, 10);
INSERT INTO `product_variant` VALUES (72, 6, 11);
INSERT INTO `product_variant` VALUES (73, 9, 8);
INSERT INTO `product_variant` VALUES (74, 9, 9);
INSERT INTO `product_variant` VALUES (75, 9, 10);
INSERT INTO `product_variant` VALUES (76, 8, 8);
INSERT INTO `product_variant` VALUES (77, 8, 9);
INSERT INTO `product_variant` VALUES (78, 8, 10);

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category_id` bigint(20) UNSIGNED NOT NULL,
  `rating` double(8, 2) NULL DEFAULT NULL,
  `price` bigint(20) NULL DEFAULT NULL,
  `discount_percent` double(8, 2) NULL DEFAULT NULL,
  `is_device` tinyint(1) NOT NULL DEFAULT 0,
  `is_collaboration_project` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_hot_item` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `stock` int(11) NULL DEFAULT NULL,
  `volume` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `product_external_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `products_product_category_id_foreign`(`product_category_id`) USING BTREE,
  CONSTRAINT `products_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, '-', '2024-09-02 07:56:10', '2024-09-26 08:44:08', 'TIGAC MELON MYSTIC SALTNIC', 'melon-mystic', '<p><strong>Fr&euml;sh</strong></p>\r\n<p>Tigac Fruity Series, enjoy the fr&euml;shness here!</p>\r\n<ul>\r\n<li>Flavour : Melon</li>\r\n<li>Type : Saltnic</li>\r\n<li>Nicotine : 30MG</li>\r\n<li>Volume : 30ML</li>\r\n</ul>\r\n<p><strong>Description</strong></p>\r\n<p>Perpaduan rasa buah melon segar yang manis dan menyegarkan, setiap hisapan memberikan sensasi lembut dan juicy dari buah melon matang, dengan sentuhan akhir yang dingin.</p>\r\n<p><strong>Ingridients</strong></p>\r\n<ul>\r\n<li>USP Vegetable Glycerin</li>\r\n<li>USP Propylene Glycol</li>\r\n<li>Natural Flavor Essence</li>\r\n<li>Salt Nicotine</li>\r\n</ul>', 1, 5.00, 115000, 0.00, 1, 0, '1', '1', 10, '60ml', '-');
INSERT INTO `products` VALUES (2, '-', '2024-09-02 07:56:10', '2024-09-26 08:47:08', 'TIGAC MANGO MADNESS SALTNIC', 'mango-madness', '<p><strong>Fr&euml;sh</strong></p>\r\n<p>Tigac Fruity Series, enjoy the fr&euml;shness here!</p>\r\n<ul>\r\n<li>Flavour : Mango</li>\r\n<li>Type : Saltnic</li>\r\n<li>Nicotine : 30MG</li>\r\n<li>Volume : 30ML</li>\r\n</ul>\r\n<p><strong>Description</strong></p>\r\n<p>Ledakan rasa mangga tropis yang kaya dan menggugah selera. Dengan sedikit sentuhan asam segar untuk menambah kedalaman rasa memberikan keseimbangan sempurna antara manis dan segar.</p>\r\n<p><strong>Ingridients</strong></p>\r\n<ul>\r\n<li>USP Vegetable Glycerin</li>\r\n<li>USP Propylene Glycol</li>\r\n<li>Natural Flavor Essence</li>\r\n<li>Salt Nicotine</li>\r\n</ul>', 1, 5.00, 115000, 0.00, 0, 0, '1', '1', 10, '60ml', '-');
INSERT INTO `products` VALUES (3, '25DV100011', '2024-09-02 07:56:10', '2024-10-14 07:32:45', 'TIGAC POD BUNDLING - ROYAL BLUE', 'tigac-pod-kit', '<p><strong>TIGAC POD - Elux</strong></p>\r\n<p>Perangkat sederhana dengan desain minimalis dan ramping, lebih bertenaga dan elegan dengan indikasi cahaya untuk penggunaan sehari-hari yang lebih mudah!</p>\r\n<p><strong>Package Includes</strong></p>\r\n<ul>\r\n<li>1 Pcs Device&nbsp;</li>\r\n<li>1 Pcs Catridge 0.8Ω</li>\r\n<li>1 Pcs Catridge 0.6Ω&nbsp;</li>\r\n<li>1 Pcs Cable Charging</li>\r\n<li>1 Pcs User Manual &amp;&nbsp;Warranty Card</li>\r\n</ul>\r\n<p><strong>Features</strong></p>\r\n<ul>\r\n<li>Battery Capacity 650mAh</li>\r\n<li>Catridge 2ml : Prefilled &amp; refillable cartridges</li>\r\n<li>Charging Port : Type-C</li>\r\n<li>Mesh Coil</li>\r\n<li>Light Indication</li>\r\n<li>Magnetic Pod Connection</li>\r\n<li>Vibration Feedback</li>\r\n</ul>\r\n<p>&nbsp;</p>', 2, 5.00, 150000, 0.00, 1, 0, '1', '1', 10, '60ml', '25DV100011');
INSERT INTO `products` VALUES (4, '25LQ100011', '2024-09-02 07:56:10', '2024-10-01 08:47:23', 'CREME & CRIME ELECTRA QUINN', 'electra-quinn', '<p><span data-sheets-root=\"1\">Seperti cheesetart yang dibuat dengan full butter dengan sentuhan toping syrup vanilla dan crumble.</span></p>', 3, 5.00, 150000, 0.00, 0, 1, '1', '0', 10, '60ml', '25LQ100011');
INSERT INTO `products` VALUES (6, '25LQ100162', '2024-09-09 06:04:01', '2024-09-26 10:12:34', 'TIGAC SANDO CREAM SANDWICH', 'sando-cream-sandwich', '<p><span data-sheets-root=\"1\">Perpaduan sempurna krim sandwich dengan sentuhan rasa manis stroberi yang berimbang sempurna. Pengalaman rasa yang sederhana namun lezat.</span></p>', 1, NULL, 150000, 0.00, 0, 0, '1', '1', 10, NULL, 'SKU-01');
INSERT INTO `products` VALUES (7, '25LQ100159', '2024-09-09 06:06:30', '2024-10-01 08:48:46', 'CREME & CRIME ORION SHADOW', 'orion-shadow', '<p><strong>Orion Shadow</strong></p>\r\n<p>Banana Cream Cheese</p>\r\n<ul>\r\n<li>Flavour : Banana, Cream Cheese</li>\r\n<li>Type : Freebase</li>\r\n<li>Nicotine : 3 MG &amp; 6 MG</li>\r\n<li>Volume : 60ML</li>\r\n</ul>\r\n<p><strong>Description</strong></p>\r\n<p><span data-sheets-root=\"1\">Nikmati perpaduan sempurna antara pisang yang manis dan krim keju yang lembut.</span></p>\r\n<p><strong>Ingridients</strong></p>\r\n<ul>\r\n<li>USP Vegetable Glycerin</li>\r\n<li>USP Propylene Glycol</li>\r\n<li>Natural Flavor Essence</li>\r\n</ul>', 3, NULL, 150000, 0.00, 0, 1, '1', '0', 10, NULL, '25LQ100159');
INSERT INTO `products` VALUES (8, '25LQ100064', '2024-09-09 06:07:39', '2024-09-26 10:17:43', 'POCKET ROCKID COSMIC STRAWBERRY FIZZ', 'cosmic-strawberry-fizz', '<p><span data-sheets-root=\"1\">Perpaduan strawberry dan susu vanilla dibuat menjadi ice cream dengan toping strawberry dan syrup strawberry, dingin dimulut.</span></p>', 4, NULL, 150000, 0.00, 0, 1, '1', '0', 150, NULL, NULL);
INSERT INTO `products` VALUES (9, '25LQ100060', '2024-09-09 06:08:40', '2024-09-26 10:15:57', 'POCKET ROCKID BANANA SPACE CREAM', 'banana-space-cream', '<p><span data-sheets-root=\"1\">Seperti makan pisang yang di haluskan lalu ditambah dengan toping&nbsp;pisang yang dipotong dan dikasih toping sedikit susu.</span></p>', 4, NULL, 150000, 0.00, 0, 1, '1', '0', 150, NULL, NULL);
INSERT INTO `products` VALUES (10, 'SKU-8', '2024-09-09 06:10:24', '2024-09-26 08:40:52', 'TIGAC STRAWBERRY BREEZE SALTNIC', 'strawberry-breeze', '<p><strong>Fr&euml;sh</strong></p>\r\n<p>Tigac Fruity Series, enjoy the fr&euml;shness here!</p>\r\n<ul>\r\n<li>Flavour : Strawberry</li>\r\n<li>Type : Saltnic</li>\r\n<li>Nicotine : 30MG</li>\r\n<li>Volume : 30ML</li>\r\n</ul>\r\n<p><strong>Description</strong></p>\r\n<p>Manis segar stroberi yang ringan dengan rasa lembut yang menyegarkan, seperti menikmati stroberi di hari yang cerah.</p>\r\n<p><strong>Ingridients</strong></p>\r\n<ul>\r\n<li>USP Vegetable Glycerin</li>\r\n<li>USP Propylene Glycol</li>\r\n<li>Natural Flavor Essence</li>\r\n<li>Salt Nicotine</li>\r\n</ul>\r\n<p>&nbsp;</p>', 1, NULL, 115000, 0.00, 0, 0, '1', '1', 10, NULL, 'SKU-8');
INSERT INTO `products` VALUES (11, '25DV100012', '2024-09-20 06:20:43', '2024-09-26 08:58:12', 'TIGAC DEVICE POD CRIMSON RED', 'tigac-pod-crimson-red', '<p><strong>TIGAC POD - Elux</strong></p>\r\n<p>Perangkat sederhana dengan desain minimalis dan ramping, lebih bertenaga dan elegan dengan indikasi cahaya untuk penggunaan sehari-hari yang lebih mudah!</p>\r\n<p><strong>Package Includes</strong></p>\r\n<ul>\r\n<li>1 Pcs Device&nbsp;</li>\r\n<li>1 Pcs Catridge 0.8Ω</li>\r\n<li>1 Pcs Catridge 0.6Ω&nbsp;</li>\r\n<li>1 Pcs Cable Charging</li>\r\n<li>1 Pcs User Manual &amp;&nbsp;Warranty Card</li>\r\n</ul>\r\n<p><strong>Features</strong></p>\r\n<ul>\r\n<li>Battery Capacity 650mAh</li>\r\n<li>Catridge 2ml : Prefilled &amp; refillable cartridges</li>\r\n<li>Charging Port : Type-C</li>\r\n<li>Mesh Coil</li>\r\n<li>Light Indication</li>\r\n<li>Magnetic Pod Connection</li>\r\n<li>Vibration Feedback</li>\r\n</ul>', 2, NULL, 150000, NULL, 1, 0, '1', '1', 10, NULL, '-');
INSERT INTO `products` VALUES (12, '-', '2024-09-26 04:50:33', '2024-09-26 10:00:47', 'JAXEL ORIGINAL MYLKCHEESE', 'jaxel-original-mylkcheese', '<p><span data-sheets-root=\"1\">Perpaduan antara Milk yang dipadukan dengan Cheese dan Cracker yang lembut dimulut.</span></p>', 8, NULL, 150000, NULL, 0, 1, '1', '0', 100, NULL, '-');
INSERT INTO `products` VALUES (13, '25LQ100148', '2024-09-26 04:55:30', '2024-09-26 09:59:46', 'JAXEL STRAWBERRY MYLKCHEESE', 'jaxel-strawberry-mylkcheese', '<p><span data-sheets-root=\"1\">Perpaduan antara Milk yang dipadukan dengan Cheese dan Cracker&nbsp;ditambah strawberry yang segar dan lembut dimulut. </span></p>', 8, NULL, 150000, NULL, 0, 1, '1', '0', 100, NULL, '-');
INSERT INTO `products` VALUES (14, '25LQ100175', '2024-09-26 04:56:23', '2024-09-26 10:03:25', 'JAXEL TARO MYLKCHEESE', 'jaxel-taro-mylkcheese', '<p><span data-sheets-root=\"1\">Sensasi manis dan lembut dari talas berpadu sempurna dengan gurihnya keju memberikan kelezatan krim susu yang kaya dengan aroma khas talas yang menenangkan.</span></p>', 8, NULL, 150000, NULL, 0, 1, '1', '0', 100, NULL, '-');
INSERT INTO `products` VALUES (15, '-', '2024-09-26 04:58:06', '2024-09-26 09:57:09', 'POCKET ROCKID GALACTIC GUMMY SUNDAE', 'pocket-rockid-galactic-gummy-sundae', '<p><span data-sheets-root=\"1\">Perpaduan menakjubkan dari es krim lembut dan permen gummy yang lezat. </span></p>', 4, NULL, 150000, NULL, 0, 1, '1', '0', 100, NULL, '-');
INSERT INTO `products` VALUES (17, '-', '2024-09-26 05:00:17', '2024-09-26 09:55:47', 'POCKET ROCKID AURORA BIRTHDAY CAKE', 'pocket-rockid-aurora-birthday-cake', '<p>POCKET ROCKID AURORA BIRTHDAY CAKE</p>', 4, NULL, 150000, NULL, 0, 1, '1', '0', 100, NULL, '-');
INSERT INTO `products` VALUES (18, '-', '2024-09-26 05:04:41', '2024-09-26 09:55:26', 'HOMPIMPA YOYO', 'hompimpa-yoyo', '<p><span data-sheets-root=\"1\">Seperti sarapan cereal di pagi hari dengan susu&nbsp;vanilla yang dicampurkan cracker dan berry-berry an.</span></p>', 10, NULL, 150000, NULL, 0, 1, '1', '0', 100, NULL, '-');
INSERT INTO `products` VALUES (19, '-', '2024-09-26 05:05:57', '2024-09-26 09:54:55', 'HOMPIMPA TOP', 'hompimpa-top', '<p><span data-sheets-root=\"1\">Rasa saat minum kopi dengan sentuhan caramel dan ditambah gula&nbsp;aren ditambah sentuhan toping butter delight.</span></p>', 10, NULL, 150000, NULL, 0, 1, '1', '0', 100, NULL, '-');
INSERT INTO `products` VALUES (20, '-', '2024-09-26 05:51:22', '2024-09-26 09:54:36', 'POCKET ROCKID MILKYWAY MAXFLURRY', 'pocket-rockid-milkyway-maxflurry', '<p><span data-sheets-root=\"1\">Rasa lembut dari cookies and cream, ditambah rasa manis dari es krim vanila dengan sentuhan renyah dari biskuit cokelat.</span></p>', 4, NULL, 150000, NULL, 0, 1, '1', '0', 100, NULL, '-');
INSERT INTO `products` VALUES (21, '-', '2024-09-26 08:37:32', '2024-09-26 09:54:18', 'TIGAC ROYAL CARAMEL COOKIE', 'tigac-royal-caramel-cookie', '<p><span data-sheets-root=\"1\">Menghadirkan perpaduan rasa mewah antara biskuit renyah yang baru dipanggang dan karamel lembut yang manis dan lezat. Dengan lapisan biskuit gurih dan sentuhan manis yang sempurna.</span></p>', 1, NULL, 150000, NULL, 0, 0, '1', '1', 100, NULL, '-');
INSERT INTO `products` VALUES (22, '-', '2024-09-26 08:38:20', '2024-10-14 07:26:56', 'TIGAC YOGHURT CHEESE CREAM', 'tigac-yoshurt-cheese-cream', '<p><span data-sheets-root=\"1\">Kombinasi sempurna antara rasa creamy dan sedikit asam dari yoghurt yang menyegarkan, berpadu dengan kelezatan lembut cream cheese yang memanjakan.</span></p>', 1, NULL, 150000, NULL, 0, 0, '1', '1', 100, NULL, '-');

-- ----------------------------
-- Table structure for programs
-- ----------------------------
DROP TABLE IF EXISTS `programs`;
CREATE TABLE `programs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pic` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `programs_store_name_unique`(`store_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of programs
-- ----------------------------
INSERT INTO `programs` VALUES (2, '2024-09-15 15:21:32', '2024-09-15 15:21:32', 'Muchamad fuadin', 'Vapenation', '0895392059105', 'penyollucu@gmai.com', 'nr9hJwWX');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin TigaC', 'admin@tigac.id', '2024-09-02 07:56:10', '$2y$12$gi3EnQ6K6.BlOqwuif8o2enVejFoghAQKmicZgcSuJin5gz6WqZpy', NULL, NULL, NULL, 'lNY3b4DCwD', '2024-09-02 07:56:10', '2024-09-02 07:56:10');
INSERT INTO `users` VALUES (2, 'Sherina', 'sherina@tigac.id', NULL, '$2y$12$FG5kg7M80ITOi8OOzISphOmfhymEMrzLaVUxsDLYQ1YLJYWFWzom2', NULL, NULL, NULL, NULL, '2024-09-17 09:13:21', '2024-09-17 09:13:21');

-- ----------------------------
-- Table structure for variants
-- ----------------------------
DROP TABLE IF EXISTS `variants`;
CREATE TABLE `variants`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of variants
-- ----------------------------
INSERT INTO `variants` VALUES (1, '2024-09-02 07:56:10', '2024-09-26 04:24:34', 'Saltnic Creamy', 'lorem impsum dolor sit description');
INSERT INTO `variants` VALUES (2, '2024-09-02 07:56:10', '2024-09-26 04:24:05', 'Freebase Creamy', 'lorem impsum dolor sit description');
INSERT INTO `variants` VALUES (3, '2024-09-02 07:56:10', '2024-09-26 04:24:22', 'Freebase Fruity Series', 'lorem impsum dolor sit description');
INSERT INTO `variants` VALUES (4, '2024-09-02 07:56:10', '2024-09-02 07:56:10', 'Pod Device', 'lorem impsum dolor sit description');
INSERT INTO `variants` VALUES (5, '2024-09-26 04:24:49', '2024-10-15 07:15:56', 'Fresh', NULL);
INSERT INTO `variants` VALUES (6, '2024-09-26 04:25:39', '2024-09-26 04:25:39', 'Pods Friendly Fruity Series', NULL);
INSERT INTO `variants` VALUES (7, '2024-09-26 04:26:52', '2024-09-26 04:26:52', 'Pods Friendly Creamy', NULL);
INSERT INTO `variants` VALUES (8, '2024-09-26 09:51:49', '2024-09-26 09:51:49', '3MG', NULL);
INSERT INTO `variants` VALUES (9, '2024-09-26 09:51:57', '2024-09-26 09:51:57', '6MG', NULL);
INSERT INTO `variants` VALUES (10, '2024-09-26 09:52:06', '2024-09-26 09:52:06', '9MG', NULL);
INSERT INTO `variants` VALUES (11, '2024-09-26 09:52:15', '2024-09-26 09:52:15', '12MG', NULL);
INSERT INTO `variants` VALUES (12, '2024-09-26 09:52:24', '2024-09-26 09:52:24', '15MG', NULL);
INSERT INTO `variants` VALUES (13, '2024-09-26 09:52:38', '2024-09-26 09:52:38', '30MG', NULL);

-- ----------------------------
-- Table structure for video_home_banners
-- ----------------------------
DROP TABLE IF EXISTS `video_home_banners`;
CREATE TABLE `video_home_banners`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `video_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of video_home_banners
-- ----------------------------
INSERT INTO `video_home_banners` VALUES (1, '2024-09-02 07:56:10', '2024-09-10 03:33:09', 'TIGAC Video', NULL, 'lj3qdxZwvKfZt1RxGRtbydJCeJhzlWWrEzcagIuG.mp4');

SET FOREIGN_KEY_CHECKS = 1;
