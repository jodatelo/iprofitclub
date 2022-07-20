/*
SQLyog Enterprise v13.1.1 (64 bit)
MySQL - 10.4.14-MariaDB : Database - dbiprofitclub
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `balances` */

DROP TABLE IF EXISTS `balances`;

CREATE TABLE `balances` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `fechaact` datetime DEFAULT NULL,
  `userupd_id` bigint(20) unsigned NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `balances_user_id_foreign` (`user_id`),
  CONSTRAINT `balances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `balances` */

insert  into `balances`(`id`,`user_id`,`saldo`,`fechaact`,`userupd_id`,`isDeleted`,`status`,`created_at`,`updated_at`) values 
(1,2,30.00,'2022-07-19 19:01:26',2,0,1,'2022-07-19 19:01:37','2022-07-19 19:01:39');

/*Table structure for table `configs` */

DROP TABLE IF EXISTS `configs`;

CREATE TABLE `configs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `configs` */

/*Table structure for table `failed_jobs` */

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

/*Data for the table `failed_jobs` */

/*Table structure for table `inversions` */

DROP TABLE IF EXISTS `inversions`;

CREATE TABLE `inversions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `inversions` */

/*Table structure for table `menus` */

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent` bigint(20) unsigned NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icono` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menus_user_id_foreign` (`user_id`),
  CONSTRAINT `menus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `menus` */

insert  into `menus`(`id`,`parent`,`nombre`,`icono`,`link`,`user_id`,`status`,`created_at`,`updated_at`) values 
(1,0,'Dashboard','las la-tachometer-alt','#',1,1,'2022-07-19 10:26:51','2022-07-19 10:26:53'),
(2,1,'Escritorio','','/home',1,1,'2022-07-19 10:27:22','2022-07-19 10:27:24'),
(3,0,'Polizas','las la-briefcase','#',1,1,'2022-07-19 10:27:22','2022-07-19 10:27:22'),
(4,3,'Mis Polizas','','/polizas',1,1,'2022-07-19 10:27:22','2022-07-19 10:27:22'),
(5,0,'Intercambio','lar la-newspaper','#',1,1,'2022-07-19 10:27:22','2022-07-19 10:27:22'),
(6,5,'Mis intercambio','','/intercambio',1,1,'2022-07-19 10:27:22','2022-07-19 10:27:22'),
(7,0,'Patrocinio','las la-folder-plus','#',1,1,'2022-07-19 10:27:22','2022-07-19 10:27:22'),
(8,7,'Mis patrocinio','','/patrocinios',1,1,'2022-07-19 10:27:22','2022-07-19 10:27:22'),
(9,0,'Soporte','las la-pencil-ruler','#',1,1,'2022-07-19 10:27:22','2022-07-19 10:27:22'),
(10,9,'Mis tickets','','/soporte',1,1,'2022-07-19 10:27:22','2022-07-19 10:27:22'),
(11,0,'Finanzas','lab la-delicious','',1,1,'2022-07-19 10:27:22','2022-07-19 10:27:22'),
(13,11,'Mis Finanzas','','/finanzas',1,1,'2022-07-19 10:27:22','2022-07-19 10:27:22');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2022_07_12_151230_create_menus_table',2),
(6,'2022_07_19_194502_create_ordenes_table',3),
(7,'2022_07_19_233233_create_balances_table',3),
(8,'2022_07_19_233318_create_transaccions_table',3),
(9,'2022_07_19_233334_create_inversions_table',3),
(10,'2022_07_19_233347_create_referidos_table',3),
(11,'2022_07_19_233430_create_configs_table',3),
(12,'2022_07_19_233448_create_tipo_transaccions_table',3);

/*Table structure for table `ordenes` */

DROP TABLE IF EXISTS `ordenes`;

CREATE TABLE `ordenes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ordenes` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

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

/*Data for the table `personal_access_tokens` */

/*Table structure for table `referidos` */

DROP TABLE IF EXISTS `referidos`;

CREATE TABLE `referidos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `userref_id` bigint(20) unsigned NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0,
  `statustrans` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `referidos_user_id_foreign` (`user_id`),
  KEY `referidos_userref_id_foreign` (`userref_id`),
  CONSTRAINT `referidos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `referidos_userref_id_foreign` FOREIGN KEY (`userref_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `referidos` */

/*Table structure for table `tipo_transaccions` */

DROP TABLE IF EXISTS `tipo_transaccions`;

CREATE TABLE `tipo_transaccions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipomov` int(1) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_transaccions_user_id_foreign` (`user_id`),
  CONSTRAINT `tipo_transaccions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tipo_transaccions` */

insert  into `tipo_transaccions`(`id`,`nombre`,`tipomov`,`user_id`,`isDeleted`,`status`,`created_at`,`updated_at`) values 
(1,'COMPRA',1,2,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:51'),
(2,'VENTA',-1,2,0,1,'2022-07-19 19:03:02','2022-07-19 19:03:04'),
(3,'POLIZA',-1,2,0,1,'2022-07-19 19:03:20','2022-07-19 19:03:23'),
(4,'SPONSORSHIP',1,2,0,1,'2022-07-19 19:03:45','2022-07-19 19:03:48'),
(5,'TRANSFERENCIA',-1,2,0,1,'2022-07-19 19:04:02','2022-07-19 19:04:05'),
(6,'INTERESES',1,2,0,1,'2022-07-19 19:04:26','2022-07-19 19:04:29');

/*Table structure for table `transaccions` */

DROP TABLE IF EXISTS `transaccions`;

CREATE TABLE `transaccions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `tipotrans` bigint(20) unsigned NOT NULL,
  `tipomov` int(11) NOT NULL DEFAULT 1,
  `fechaact` datetime DEFAULT NULL,
  `userupd_id` bigint(20) unsigned NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0,
  `statustrans` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transaccions_user_id_foreign` (`user_id`),
  CONSTRAINT `transaccions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transaccions` */

insert  into `transaccions`(`id`,`user_id`,`valor`,`tipotrans`,`tipomov`,`fechaact`,`userupd_id`,`isDeleted`,`statustrans`,`status`,`created_at`,`updated_at`) values 
(1,2,30.00,1,1,NULL,1,0,1,1,'2022-07-19 20:05:58','2022-07-19 20:06:01'),
(2,2,25.00,1,1,NULL,1,0,1,1,'2022-07-18 20:54:08','2022-07-18 20:54:12');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `dni` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_dni_unique` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`dni`,`password`,`avatar`,`ref`,`remember_token`,`created_at`,`updated_at`) values 
(1,'admin','info@iprofit.club',NULL,'0999','$2y$10$ICyM4YErR71e/n4KFB9WkO2ZYjR5wzQSCIqWgu1HbwGQo57TV0RhO','avatar-1.jpg','info@iprofit.club',NULL,'2022-07-19 14:01:09','2022-07-19 14:01:09'),
(2,'admin@admin.com','admin@admin.com',NULL,'09301748462','$2y$10$HX1nLf4g1iDvL3aE7QNdq.y8ka0HMYFvyPUx6l9AAX5bEgMSS/KKK',NULL,'info@iprofit.club',NULL,'2022-07-19 14:02:59','2022-07-19 14:02:59');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
