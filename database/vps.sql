/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 50718
 Source Host           : 127.0.0.1:3306
 Source Schema         : vps

 Target Server Type    : MySQL
 Target Server Version : 50718
 File Encoding         : 65001

 Date: 15/02/2020 00:24:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `restored_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `restored_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES (1, 'Vps Group', 'vps_group', NULL, NULL, NULL, NULL, NULL, '2020-01-31 18:18:51', '2020-01-31 18:18:51');

-- ----------------------------
-- Table structure for master_resellers
-- ----------------------------
DROP TABLE IF EXISTS `master_resellers`;
CREATE TABLE `master_resellers`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `assign` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `count_accounts` int(11) NOT NULL,
  `limit_reseller` int(11) NOT NULL,
  `limit_pin` int(11) NOT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `restored_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `restored_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 52 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (43, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (44, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (45, '2020_01_29_175418_create_vps_table', 1);
INSERT INTO `migrations` VALUES (46, '2020_01_31_043028_create_master_resellers_table', 1);
INSERT INTO `migrations` VALUES (47, '2020_01_31_043551_create_resellers_table', 1);
INSERT INTO `migrations` VALUES (48, '2020_01_31_043643_create_pins_table', 1);
INSERT INTO `migrations` VALUES (49, '2020_01_31_125106_create_groups_table', 1);
INSERT INTO `migrations` VALUES (50, '2020_01_31_125123_create_permissions_table', 1);
INSERT INTO `migrations` VALUES (51, '2020_01_31_140525_create_permission_user_table', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for permission_user
-- ----------------------------
DROP TABLE IF EXISTS `permission_user`;
CREATE TABLE `permission_user`  (
  `user_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `group_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `restored_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `restored_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 1, 'Can Add Vps', 'can_add_vps', NULL, NULL, NULL, NULL, NULL, '2020-01-31 18:19:11', '2020-01-31 18:19:11');

-- ----------------------------
-- Table structure for pins
-- ----------------------------
DROP TABLE IF EXISTS `pins`;
CREATE TABLE `pins`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `period` int(11) NOT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `restored_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `restored_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pins
-- ----------------------------
INSERT INTO `pins` VALUES (1, 2, 6, NULL, NULL, NULL, NULL, NULL, '2020-01-31 18:32:42', '2020-01-31 18:32:42');
INSERT INTO `pins` VALUES (2, 3, 1, NULL, NULL, NULL, NULL, NULL, '2020-01-31 18:34:42', '2020-01-31 18:34:42');

-- ----------------------------
-- Table structure for resellers
-- ----------------------------
DROP TABLE IF EXISTS `resellers`;
CREATE TABLE `resellers`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `restored_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `restored_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `activated` tinyint(1) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logged_in` tinyint(1) NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'nobopintu', 1, 'nobopintu@gmail.com', NULL, '$2y$12$PVUGZoLnI6vTh3y3EPz9t.hCXy1Ri..LDeh.9ruOEvOQ4p9APHZ7u', 1, NULL, '2020-01-31 18:17:35', '2020-02-14 17:46:38');
INSERT INTO `users` VALUES (2, 'nobopintu1', 1, 'nobopintu1@gmail.com', NULL, '$2y$12$PVUGZoLnI6vTh3y3EPz9t.hCXy1Ri..LDeh.9ruOEvOQ4p9APHZ7u', NULL, NULL, '2020-01-31 18:32:42', '2020-01-31 18:32:42');
INSERT INTO `users` VALUES (3, 'mm', 1, 'mm@gmail.com', NULL, '$2y$12$PVUGZoLnI6vTh3y3EPz9t.hCXy1Ri..LDeh.9ruOEvOQ4p9APHZ7u', NULL, NULL, '2020-01-31 18:34:42', '2020-01-31 18:34:42');
INSERT INTO `users` VALUES (4, 'nobopintu4', 0, 'nobopintu4@gmail.com', NULL, '$2y$10$uFtf/dnocA6Tr5VppgIr0OcM8rvXy1Bc2EO4SRdARm4wXlXH5pGPa', NULL, NULL, '2020-02-14 15:25:05', '2020-02-14 17:37:47');
INSERT INTO `users` VALUES (5, 'nobopintu5', 1, 'nobopintu5@gmail.com', NULL, '$2y$10$YUlNI1vDaQpWjmPUXU0a3u5PWHK6DKtLm0ltYUP5Ua524HylpClUm', NULL, NULL, '2020-02-14 17:13:07', '2020-02-14 17:13:07');
INSERT INTO `users` VALUES (6, 'nobopintu6', 1, 'nobopintu6@gmail.com', NULL, '$2y$10$SQwoW7uGcr0d.A.66.Bsa.fRVB4Yk02X.yJi.Q9zQuhVTWEo9c7cK', NULL, NULL, '2020-02-14 17:16:19', '2020-02-14 17:16:19');

-- ----------------------------
-- Table structure for vps
-- ----------------------------
DROP TABLE IF EXISTS `vps`;
CREATE TABLE `vps`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `server_ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `server_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `operating_system` int(10) NULL DEFAULT NULL,
  `vpn_type` int(10) NULL DEFAULT NULL,
  `vpn_connection` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `port` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `period` int(11) NULL DEFAULT NULL,
  `expired_date` date NOT NULL,
  `added_date` date NOT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `restored_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `restored_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vps
-- ----------------------------
INSERT INTO `vps` VALUES (1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-03-02', '2020-01-31', '2020-02-14 17:36:01', NULL, NULL, NULL, NULL, '2020-01-31 18:17:35', '2020-02-14 17:36:01');
INSERT INTO `vps` VALUES (2, 4, '120.50.6.188', NULL, 4, 3, '15.6.3.9', '8080', 2, '2020-04-14', '2020-02-14', '2020-02-14 17:37:47', NULL, NULL, NULL, NULL, '2020-02-14 15:25:06', '2020-02-14 17:37:47');
INSERT INTO `vps` VALUES (3, 5, '120.50.6.185', NULL, 3, 2, '15.6.3.1', '8090', 6, '2020-08-14', '2020-02-14', NULL, NULL, 1, NULL, NULL, '2020-02-14 17:13:07', '2020-02-14 17:13:07');
INSERT INTO `vps` VALUES (4, 6, '120.50.6.190', 'demoserver4', 6, 5, '15.6.3.13', '8000', 2, '2020-04-14', '2020-02-14', NULL, NULL, 1, NULL, NULL, '2020-02-14 17:16:19', '2020-02-14 17:35:10');

SET FOREIGN_KEY_CHECKS = 1;
