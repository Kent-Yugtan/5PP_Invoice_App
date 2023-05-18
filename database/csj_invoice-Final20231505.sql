/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : csj_invoice

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2023-05-15 21:44:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `deductions`
-- ----------------------------
DROP TABLE IF EXISTS `deductions`;
CREATE TABLE `deductions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `profile_deduction_type_id` int(11) NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deduction_type_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of deductions
-- ----------------------------
INSERT INTO `deductions` VALUES ('1', '1', '12', '1', '100.00', '2023-05-13 19:47:02', '2023-05-13 19:47:02', 'Water');
INSERT INTO `deductions` VALUES ('2', '1', '12', '2', '100.00', '2023-05-13 19:47:02', '2023-05-13 19:47:02', 'Electrical');

-- ----------------------------
-- Table structure for `deduction_types`
-- ----------------------------
DROP TABLE IF EXISTS `deduction_types`;
CREATE TABLE `deduction_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `deduction_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deduction_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of deduction_types
-- ----------------------------
INSERT INTO `deduction_types` VALUES ('1', 'Water', '100.00', '2023-05-13 19:45:50', '2023-05-13 19:45:50');
INSERT INTO `deduction_types` VALUES ('2', 'Electrical', '100.00', '2023-05-13 19:46:01', '2023-05-13 19:46:01');

-- ----------------------------
-- Table structure for `email_configs`
-- ----------------------------
DROP TABLE IF EXISTS `email_configs`;
CREATE TABLE `email_configs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_configs_email_address_unique` (`email_address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of email_configs
-- ----------------------------

-- ----------------------------
-- Table structure for `failed_jobs`
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for `invoices`
-- ----------------------------
DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) NOT NULL,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peso_rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `converted_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_received` date DEFAULT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quick_invoice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of invoices
-- ----------------------------
INSERT INTO `invoices` VALUES ('1', '1', '5PP-00001', 'Test Salary', '100.00', '55.89', '5589.00', null, null, null, '5589', 'Overdue', null, null, null, '2023-01-13 19:43:41', '2023-05-13 19:43:37', '2023-05-01', 'Active', '1');
INSERT INTO `invoices` VALUES ('2', '2', '5PP-00002', 'Test Salary', '200.00', '55.89', '11178.00', null, null, null, '11178', 'Overdue', null, null, null, '2023-01-13 19:43:41', '2023-05-13 19:43:37', '2023-05-01', 'Active', '1');
INSERT INTO `invoices` VALUES ('3', '3', '5PP-00003', 'Test Salary', '300.00', '55.89', '16767.00', null, null, null, '16767', 'Overdue', null, null, null, '2023-01-13 19:40:34', '2023-05-13 19:43:37', '2023-05-01', 'Active', '1');
INSERT INTO `invoices` VALUES ('4', '4', '5PP-00004', 'Test Salary', '400.00', '55.89', '22356.00', null, null, null, '22356', 'Overdue', null, null, null, '2023-05-13 19:40:44', '2023-05-13 19:43:37', '2023-05-01', 'Active', '1');
INSERT INTO `invoices` VALUES ('5', '5', '5PP-00005', 'Test Salary', '500.00', '55.89', '27945.00', null, null, null, '27945', 'Overdue', null, null, null, '2023-05-13 19:40:56', '2023-05-15 20:37:09', '2023-05-01', 'Active', '1');
INSERT INTO `invoices` VALUES ('6', '1', '5PP-00006', 'Test Salary', '110.00', '55.89', '6147.90', null, null, null, '6147.9', 'Overdue', null, null, null, '2023-02-13 19:43:38', '2023-05-13 19:43:39', '2023-05-02', 'Active', '1');
INSERT INTO `invoices` VALUES ('7', '2', '5PP-00007', 'Test Salary', '120.00', '55.89', '6706.80', null, null, null, '6706.8', 'Overdue', null, null, null, '2023-02-13 19:43:38', '2023-05-13 19:43:39', '2023-05-02', 'Active', '1');
INSERT INTO `invoices` VALUES ('8', '3', '5PP-00008', 'Test Salary', '130.00', '55.89', '7265.70', null, null, null, '7265.7', 'Overdue', null, null, null, '2023-01-13 19:41:43', '2023-05-13 19:43:39', '2023-05-02', 'Active', '1');
INSERT INTO `invoices` VALUES ('9', '4', '5PP-00009', 'Test Salary', '140.00', '55.89', '7824.60', null, null, null, '7824.6', 'Overdue', null, null, null, '2023-05-13 19:41:53', '2023-05-13 19:43:37', '2023-05-02', 'Active', '1');
INSERT INTO `invoices` VALUES ('10', '5', '5PP-00010', 'Test Salary', '150.00', '55.89', '8383.50', null, null, null, '8383.5', 'Overdue', null, null, null, '2023-05-13 19:42:01', '2023-05-15 20:37:09', '2023-05-02', 'Active', '1');
INSERT INTO `invoices` VALUES ('11', '1', '5PP-00011', 'Test Salary', '900.00', '55.89', '50301.00', 'Fixed', '100.00', '100.00', '50301.00', 'Overdue', null, null, 'Test Salary', '2023-03-13 19:43:36', '2023-05-15 20:36:56', '2023-05-03', 'Inactive', '0');
INSERT INTO `invoices` VALUES ('12', '1', '5PP-00012', 'Test Salary', '400.00', '55.89', '22356.00', 'Fixed', '100.00', '100.00', '22156.00', 'Overdue', null, null, 'Test Salary', '2023-04-13 20:02:06', '2023-05-15 20:37:09', '2023-05-01', 'Active', '0');

-- ----------------------------
-- Table structure for `invoice_configs`
-- ----------------------------
DROP TABLE IF EXISTS `invoice_configs`;
CREATE TABLE `invoice_configs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_logo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_to_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `invoice_logo_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invoice_configs_invoice_email_unique` (`invoice_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of invoice_configs
-- ----------------------------

-- ----------------------------
-- Table structure for `invoice_items`
-- ----------------------------
DROP TABLE IF EXISTS `invoice_items`;
CREATE TABLE `invoice_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `item_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` double DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of invoice_items
-- ----------------------------
INSERT INTO `invoice_items` VALUES ('1', '1', 'Test Salary', '100', '1', '100', '2023-05-13 19:40:11', '2023-05-13 19:40:11');
INSERT INTO `invoice_items` VALUES ('2', '2', 'Test Salary', '200', '1', '200', '2023-05-13 19:40:22', '2023-05-13 19:40:22');
INSERT INTO `invoice_items` VALUES ('3', '3', 'Test Salary', '300', '1', '300', '2023-05-13 19:40:34', '2023-05-13 19:40:34');
INSERT INTO `invoice_items` VALUES ('4', '4', 'Test Salary', '400', '1', '400', '2023-05-13 19:40:44', '2023-05-13 19:40:44');
INSERT INTO `invoice_items` VALUES ('5', '5', 'Test Salary', '500', '1', '500', '2023-05-13 19:40:56', '2023-05-13 19:40:56');
INSERT INTO `invoice_items` VALUES ('6', '6', 'Test Salary', '110', '1', '110', '2023-05-13 19:41:22', '2023-05-13 19:41:22');
INSERT INTO `invoice_items` VALUES ('7', '7', 'Test Salary', '120', '1', '120', '2023-05-13 19:41:31', '2023-05-13 19:41:31');
INSERT INTO `invoice_items` VALUES ('8', '8', 'Test Salary', '130', '1', '130', '2023-05-13 19:41:43', '2023-05-13 19:41:43');
INSERT INTO `invoice_items` VALUES ('9', '9', 'Test Salary', '140', '1', '140', '2023-05-13 19:41:53', '2023-05-13 19:41:53');
INSERT INTO `invoice_items` VALUES ('10', '10', 'Test Salary', '150', '1', '150', '2023-05-13 19:42:01', '2023-05-13 19:42:01');
INSERT INTO `invoice_items` VALUES ('11', '11', 'Test Salary', '1000', '1', '1000', '2023-05-13 19:42:56', '2023-05-13 19:42:56');
INSERT INTO `invoice_items` VALUES ('12', '12', 'Salary', '500', '1', '500', '2023-05-13 19:47:02', '2023-05-13 19:47:02');

-- ----------------------------
-- Table structure for `jobs`
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of jobs
-- ----------------------------

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2016_06_01_000001_create_oauth_auth_codes_table', '1');
INSERT INTO `migrations` VALUES ('4', '2016_06_01_000002_create_oauth_access_tokens_table', '1');
INSERT INTO `migrations` VALUES ('5', '2016_06_01_000003_create_oauth_refresh_tokens_table', '1');
INSERT INTO `migrations` VALUES ('6', '2016_06_01_000004_create_oauth_clients_table', '1');
INSERT INTO `migrations` VALUES ('7', '2016_06_01_000005_create_oauth_personal_access_clients_table', '1');
INSERT INTO `migrations` VALUES ('8', '2019_08_19_000000_create_failed_jobs_table', '1');
INSERT INTO `migrations` VALUES ('9', '2019_12_14_000001_create_personal_access_tokens_table', '1');
INSERT INTO `migrations` VALUES ('10', '2022_12_14_163206_create_profiles_table', '1');
INSERT INTO `migrations` VALUES ('11', '2022_12_14_163259_create_invoices_table', '1');
INSERT INTO `migrations` VALUES ('12', '2022_12_14_163316_create_invoice_items_table', '1');
INSERT INTO `migrations` VALUES ('13', '2022_12_14_163339_create_deductions_table', '1');
INSERT INTO `migrations` VALUES ('14', '2022_12_14_163402_create_deduction_types_table', '1');
INSERT INTO `migrations` VALUES ('15', '2022_12_14_163421_create_email_configs_table', '1');
INSERT INTO `migrations` VALUES ('16', '2022_12_14_163440_create_invoice_configs_table', '1');
INSERT INTO `migrations` VALUES ('17', '2022_12_22_143917_add_role_to_users_table', '1');
INSERT INTO `migrations` VALUES ('18', '2022_12_30_071704_change_role_datatype_to_users_table', '1');
INSERT INTO `migrations` VALUES ('19', '2023_01_11_041719_remove_full_name_in_profiles_table', '1');
INSERT INTO `migrations` VALUES ('20', '2023_01_13_014552_create_profile_deduction_types_table', '1');
INSERT INTO `migrations` VALUES ('21', '2023_02_07_031602_add_invoice_logo_name_to_invoice_configs_tables', '1');
INSERT INTO `migrations` VALUES ('22', '2023_02_10_144140_add_due_date_to_invoices_table', '1');
INSERT INTO `migrations` VALUES ('23', '2023_02_18_034731_add_status_to_invoice_table', '1');
INSERT INTO `migrations` VALUES ('24', '2023_02_23_055011_add_deduction_type_name_to_profile_deduction_types', '1');
INSERT INTO `migrations` VALUES ('25', '2023_02_28_150045_add_status_to_email_configs_table', '1');
INSERT INTO `migrations` VALUES ('26', '2023_03_05_072147_add_deduction_type_name_to_deducttion_tables', '1');
INSERT INTO `migrations` VALUES ('27', '2023_03_06_045921_add_quick_invoice_to_invoices_tables', '1');
INSERT INTO `migrations` VALUES ('28', '2023_03_07_003249_drop_ship_to_address_from_invoice_configs', '1');
INSERT INTO `migrations` VALUES ('29', '2023_03_17_021101_create_jobs_table', '1');

-- ----------------------------
-- Table structure for `oauth_access_tokens`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_access_tokens
-- ----------------------------
INSERT INTO `oauth_access_tokens` VALUES ('0d60f74253f2c848a09d2b0e4caf1210adf8000d9f80094b328abfa47b95807c77244d931963cd86', '2', '1', 'csjInvoiceTokenLogin', '[]', '0', '2023-05-13 20:01:57', '2023-05-13 20:01:57', '2024-05-13 20:01:57');
INSERT INTO `oauth_access_tokens` VALUES ('118c0aecc22e5293c4ee48eb07833fa28bd3e02be42b292e4bc9621dc18dc6dd9767226668be3997', '1', '1', 'csjInvoiceTokenLogin', '[]', '0', '2023-05-13 22:54:36', '2023-05-13 22:54:36', '2024-05-13 22:54:36');
INSERT INTO `oauth_access_tokens` VALUES ('5c7bdb3fc075f546fb0f9b293647300dae518fbefe39357932eb0e918cf291400a761bdb2e8b4217', '1', '1', 'csjInvoiceTokenLogin', '[]', '0', '2023-05-15 13:50:34', '2023-05-15 13:50:34', '2024-05-15 13:50:34');
INSERT INTO `oauth_access_tokens` VALUES ('77725385189ed5a68c1ccf85cc3ddcaa2a40709bf301ac21276a88822d1568e08b917580dc642e46', '1', '1', 'csjInvoiceTokenLogin', '[]', '0', '2023-05-13 20:13:38', '2023-05-13 20:13:38', '2024-05-13 20:13:38');
INSERT INTO `oauth_access_tokens` VALUES ('8b40d4ca83ca8de1c948cb116c648c4d560c6445db2297d5953e54f4fb86228fb9dc3d98c48ab59f', '1', '1', 'csjInvoiceTokenLogin', '[]', '0', '2023-05-14 12:30:42', '2023-05-14 12:30:42', '2024-05-14 12:30:42');
INSERT INTO `oauth_access_tokens` VALUES ('94edf1f3887d6eb8181b5a20071a5aecaea18e47512e2737ea845f9d126181338d8614631ebc3495', '1', '1', 'csjInvoiceTokenLogin', '[]', '0', '2023-05-13 19:31:51', '2023-05-13 19:31:51', '2024-05-13 19:31:51');
INSERT INTO `oauth_access_tokens` VALUES ('9c98991b37cd2b166617952a84ee339985c7b396c8df8302c3cba25bfce25c64f1026e94898e76a1', '1', '1', 'csjInvoiceTokenLogin', '[]', '0', '2023-05-15 20:31:26', '2023-05-15 20:31:26', '2024-05-15 20:31:26');
INSERT INTO `oauth_access_tokens` VALUES ('e10e689d7d12dcf2116dbec8289f444f81dc9eaf5900eae89ee94bc6500687ff048da12dff5c9658', '2', '1', 'csjInvoiceTokenLogin', '[]', '0', '2023-05-13 22:51:46', '2023-05-13 22:51:46', '2024-05-13 22:51:46');

-- ----------------------------
-- Table structure for `oauth_auth_codes`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_auth_codes
-- ----------------------------

-- ----------------------------
-- Table structure for `oauth_clients`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE `oauth_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_clients
-- ----------------------------
INSERT INTO `oauth_clients` VALUES ('1', null, '5PPINVOICE Personal Access Client', 'fLAovCYOhFSoJRig7iK1yiuVi6apiL3crXp9hQ4U', null, 'http://localhost', '1', '0', '0', '2023-05-13 19:31:43', '2023-05-13 19:31:43');
INSERT INTO `oauth_clients` VALUES ('2', null, '5PPINVOICE Password Grant Client', 'ELTWcmORtI8grQGNZz5IZBItcCu2DWLBtRFDQ5Wu', 'users', 'http://localhost', '0', '1', '0', '2023-05-13 19:31:43', '2023-05-13 19:31:43');

-- ----------------------------
-- Table structure for `oauth_personal_access_clients`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_personal_access_clients
-- ----------------------------
INSERT INTO `oauth_personal_access_clients` VALUES ('1', '1', '2023-05-13 19:31:43', '2023-05-13 19:31:43');

-- ----------------------------
-- Table structure for `oauth_refresh_tokens`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_refresh_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `personal_access_tokens`
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for `profiles`
-- ----------------------------
DROP TABLE IF EXISTS `profiles`;
CREATE TABLE `profiles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acct_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acct_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gcash_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_hired` date DEFAULT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_original_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of profiles
-- ----------------------------
INSERT INTO `profiles` VALUES ('1', '2', 'Tester', '09382163206', 'P-7 Ampayon', 'Agusan Del Norte', 'Butuan City', '8600', 'Active', null, null, null, null, null, '2023-05-01', '645f755f0ecce.png', '645f755f0ecce.png', '/storage/images/645f755f0ecce.png', null, '2023-05-13 19:32:52', '2023-05-15 20:36:28');
INSERT INTO `profiles` VALUES ('2', '3', 'Tester', '09382163206', 'P-7 Ampayon', 'Agusan Del Norte', 'Butuan City', '8600', 'Active', null, null, null, null, null, '2023-05-01', '645f757133e5d.png', '645f757133e5d.png', '/storage/images/645f757133e5d.png', null, '2023-05-13 19:33:37', '2023-05-15 20:36:28');
INSERT INTO `profiles` VALUES ('3', '4', 'Tester', '09382163206', 'P-7 Ampayon', 'Agusan Del Norte', 'Butuan City', '8600', 'Active', null, null, null, null, null, '2023-05-01', '645f759bb73ed.png', '645f759bb73ed.png', '/storage/images/645f759bb73ed.png', null, '2023-05-13 19:34:27', '2023-05-15 20:36:28');
INSERT INTO `profiles` VALUES ('4', '5', 'Tester', '09382163206', 'P-7 Ampayon', 'Agusan Del Norte', 'Butuan City', '8600', 'Inactive', null, null, null, null, null, '2023-05-01', '645f75cf95427.png', '645f75cf95427.png', '/storage/images/645f75cf95427.png', null, '2023-05-13 19:35:17', '2023-05-15 20:36:11');
INSERT INTO `profiles` VALUES ('5', '6', 'Tester', '09382163206', 'P-7 Ampayon', 'Agusan Del Norte', 'Butuan City', '8600', 'Active', null, null, null, null, null, '2023-05-01', '645f75fec0608.png', '645f75fec0608.png', '/storage/images/645f75fec0608.png', null, '2023-05-13 19:36:03', '2023-05-13 19:36:03');

-- ----------------------------
-- Table structure for `profile_deduction_types`
-- ----------------------------
DROP TABLE IF EXISTS `profile_deduction_types`;
CREATE TABLE `profile_deduction_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) NOT NULL,
  `deduction_type_id` int(11) NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deduction_type_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of profile_deduction_types
-- ----------------------------
INSERT INTO `profile_deduction_types` VALUES ('1', '1', '1', '100.00', '2023-05-13 19:46:27', '2023-05-13 19:46:27', 'Water');
INSERT INTO `profile_deduction_types` VALUES ('2', '1', '2', '100.00', '2023-05-13 19:46:33', '2023-05-13 19:46:33', 'Electrical');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Super', 'Admin', 'admin@test.com', null, 'admin', '$2y$10$wNBkfujjZHQJm9.sOE.tHuCfcDhrKB2sDo2NKOwRhsXbdyYMSPAkG', '6V5QYgDEMV', '2023-05-13 19:31:24', '2023-05-13 19:31:24', 'Admin');
INSERT INTO `users` VALUES ('2', 'Test', 'Test 1', 'kent.yugtan95+test1@gmail.com', null, 'test1', '$2y$10$0gBkFaj5dWe2gfOJFSvJ4eomHJcCRUKLfD9Y4psuMilr7ptaT7bQC', null, '2023-05-13 19:32:52', '2023-05-13 19:32:52', 'Staff');
INSERT INTO `users` VALUES ('3', 'Test', 'Test 2', 'kent.yugtan95+test2@gmail.com', null, 'test2', '$2y$10$sKtVfmDwmxq0UTF8w3Z..u/Rw9jgnne1DMd7T1SsJ1O8yMdu59shu', null, '2023-05-13 19:33:37', '2023-05-13 19:33:37', 'Staff');
INSERT INTO `users` VALUES ('4', 'Test', 'Test 3', 'kent.yugtan95+test3@gmail.com', null, 'test3', '$2y$10$RI/CfcFw7fINskK5YNFRxeBJyP95y1eRONKbqSpdrcBWoWi/BRNUK', null, '2023-05-13 19:34:27', '2023-05-13 19:34:27', 'Staff');
INSERT INTO `users` VALUES ('5', 'Test', 'Test 4', 'kent.yugtan95+test4@gmail.com', null, 'test4', '$2y$10$DTTPRllCoxBDIv2PD9zoMeH0Q2ta6qANwRhBCLxZ9VRGg1NYX1ShG', null, '2023-05-13 19:35:17', '2023-05-13 19:35:17', 'Staff');
INSERT INTO `users` VALUES ('6', 'Test', 'Test 5', 'kent.yugtan95+test5@gmail.com', null, 'test5', '$2y$10$PFAc1JK1iErOzxcnO/KLpu.xE7A9CKHUjUDo07CglzRqmDiBspDVi', null, '2023-05-13 19:36:03', '2023-05-13 19:36:03', 'Staff');
