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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `balances` */

insert  into `balances`(`id`,`user_id`,`saldo`,`fechaact`,`userupd_id`,`isDeleted`,`status`,`created_at`,`updated_at`) values 
(1,2,10000.00,'2022-07-20 10:27:31',1,0,1,'2022-07-20 10:27:37','2022-07-21 03:16:41'),
(2,1,4000.00,'2022-07-20 18:16:24',1,0,1,'2022-07-20 18:16:28','2022-07-21 04:14:01'),
(3,4,0.00,'2022-07-21 03:37:34',4,0,1,'2022-07-21 03:37:34','2022-07-21 03:37:34'),
(4,5,6100.00,'2022-07-21 04:00:10',5,0,1,'2022-07-21 04:00:10','2022-07-21 04:16:18');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `menus` */

insert  into `menus`(`id`,`parent`,`nombre`,`icono`,`link`,`user_id`,`status`,`created_at`,`updated_at`) values 
(1,0,'Escritorio','las la-tachometer-alt','#',1,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),
(2,1,'Mi Escritorio','','/home',1,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),
(3,0,'Pólizas','las la-briefcase','#',1,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),
(4,3,'Mis Pólizas','','/polizas',1,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),
(7,0,'Patrocinio','las la-folder-plus','#',1,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),
(8,7,'Mis patrocinio','','/patrocinios',1,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),
(9,0,'Finanzas','lab la-delicious','#',1,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),
(10,9,'Mis Finanzas','','/finanzas',1,1,'2022-07-19 19:02:46','2022-07-19 19:02:46');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2022_07_12_151230_create_menus_table',1),
(6,'2022_07_19_194502_create_ordenes_table',1),
(7,'2022_07_19_233233_create_balances_table',1),
(8,'2022_07_19_233318_create_transaccions_table',1),
(9,'2022_07_19_233334_create_inversions_table',1),
(10,'2022_07_19_233347_create_referidos_table',1),
(11,'2022_07_19_233430_create_configs_table',1),
(12,'2022_07_19_233448_create_tipo_transaccions_table',1),
(13,'2022_07_20_040204_create_tipopagos_table',1),
(14,'2022_07_20_160708_create_polizas_table',2);

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

/*Table structure for table `polizas` */

DROP TABLE IF EXISTS `polizas`;

CREATE TABLE `polizas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `valorinteres` decimal(10,2) NOT NULL,
  `fechainversion` datetime NOT NULL,
  `fechacapital` datetime DEFAULT NULL,
  `fechainteres` datetime DEFAULT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0,
  `statuspoliza` tinyint(1) NOT NULL DEFAULT 1,
  `statusi` tinyint(1) NOT NULL DEFAULT 0,
  `statusg` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `polizas_user_id_foreign` (`user_id`),
  CONSTRAINT `polizas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `polizas` */

insert  into `polizas`(`id`,`user_id`,`valor`,`valorinteres`,`fechainversion`,`fechacapital`,`fechainteres`,`isDeleted`,`statuspoliza`,`statusi`,`statusg`,`status`,`created_at`,`updated_at`) values 
(17,2,2000.00,100.00,'2022-06-17 03:14:57','2022-08-05 03:14:57','2022-08-20 03:14:57',0,1,1,1,1,'2022-07-21 03:14:57','2022-07-21 03:16:41'),
(18,5,1000.00,100.00,'2022-06-30 04:05:01','2022-08-05 04:05:01','2022-08-20 04:05:01',0,1,1,0,1,'2022-07-21 04:05:01','2022-07-21 04:07:36'),
(19,5,150.00,100.00,'2022-07-21 04:16:18','2022-08-05 04:16:18','2022-08-20 04:16:18',0,1,0,0,1,'2022-07-21 04:16:18','2022-07-21 04:16:18');

/*Table structure for table `referidos` */

DROP TABLE IF EXISTS `referidos`;

CREATE TABLE `referidos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `userref_id` bigint(20) unsigned NOT NULL,
  `valor` decimal(10,2) NOT NULL DEFAULT 0.00,
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `referidos` */

insert  into `referidos`(`id`,`user_id`,`userref_id`,`valor`,`isDeleted`,`statustrans`,`status`,`created_at`,`updated_at`) values 
(1,2,1,50.00,0,4,1,'2022-07-19 09:18:24','2022-07-20 09:18:28'),
(2,1,2,250.00,0,4,1,'2022-06-18 00:02:34','2022-07-21 01:09:24'),
(3,1,2,125.00,0,4,1,'2022-06-18 00:22:21','2022-07-21 01:06:31'),
(4,1,2,250.00,0,4,1,'2022-06-18 01:14:00','2022-07-21 01:16:15'),
(5,1,2,500.00,0,1,1,'2022-07-21 03:14:57','2022-07-21 03:14:57'),
(6,1,5,250.00,0,4,1,'2022-06-19 04:05:01','2022-07-21 04:11:31'),
(7,1,5,37.50,0,1,1,'2022-07-21 04:16:18','2022-07-21 04:16:18');

/*Table structure for table `tipo_transaccions` */

DROP TABLE IF EXISTS `tipo_transaccions`;

CREATE TABLE `tipo_transaccions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipomov` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_transaccions_user_id_foreign` (`user_id`),
  CONSTRAINT `tipo_transaccions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tipo_transaccions` */

insert  into `tipo_transaccions`(`id`,`nombre`,`tipomov`,`user_id`,`isDeleted`,`status`,`created_at`,`updated_at`) values 
(1,'COMPRA','1',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),
(2,'VENTA','-1',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),
(3,'POLIZA','-1',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),
(4,'REFERIDO','1',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),
(5,'TRANSFERENCIA','-1',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),
(6,'INTERESES','1',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),
(7,'ENVIO','-1',1,0,1,'2022-07-20 17:58:05','2022-07-20 17:58:09'),
(8,'RECIBIDO','1',1,0,1,'2022-07-20 17:58:32','2022-07-20 17:58:34'),
(9,'INVERSION POLIZA','1',1,0,1,'2022-07-20 21:54:58','2022-07-20 21:55:03'),
(10,'GANANCIA POLIZA','1',1,0,1,'2022-07-20 21:55:23','2022-07-20 21:55:26');

/*Table structure for table `tipopagos` */

DROP TABLE IF EXISTS `tipopagos`;

CREATE TABLE `tipopagos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipopagos_user_id_foreign` (`user_id`),
  CONSTRAINT `tipopagos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tipopagos` */

insert  into `tipopagos`(`id`,`nombre`,`user_id`,`isDeleted`,`status`,`created_at`,`updated_at`) values 
(1,'TRANSFERENCIA BANCARIA',1,0,1,'2022-07-20 10:19:22','2022-07-20 10:19:22'),
(2,'USDT',1,0,1,'2022-07-20 10:19:22','2022-07-20 10:19:22'),
(3,'BTC',1,0,1,'2022-07-20 10:19:22','2022-07-20 10:19:22');

/*Table structure for table `transaccions` */

DROP TABLE IF EXISTS `transaccions`;

CREATE TABLE `transaccions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `tipotrans` bigint(20) unsigned NOT NULL,
  `tipomov` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transaccions` */

insert  into `transaccions`(`id`,`user_id`,`valor`,`tipotrans`,`tipomov`,`fechaact`,`userupd_id`,`isDeleted`,`statustrans`,`status`,`created_at`,`updated_at`) values 
(38,2,2000.00,3,'-1','2022-07-21 03:14:57',0,0,1,1,'2022-07-21 03:14:57','2022-07-21 03:14:57'),
(39,1,500.00,4,'1','2022-07-21 03:14:57',0,0,1,1,'2022-07-21 03:14:57','2022-07-21 03:14:57'),
(40,2,2000.00,9,'1','2022-07-21 03:16:26',0,0,1,1,'2022-07-21 03:16:26','2022-07-21 03:16:26'),
(41,2,2000.00,10,'1','2022-07-21 03:16:41',0,0,1,1,'2022-07-21 03:16:41','2022-07-21 03:16:41'),
(42,5,1000.00,3,'-1','2022-07-21 04:05:01',0,0,1,1,'2022-07-21 04:05:01','2022-07-21 04:05:01'),
(43,1,250.00,4,'1','2022-07-21 04:05:01',0,0,1,1,'2022-07-21 04:05:01','2022-07-21 04:05:01'),
(44,5,1000.00,9,'1','2022-07-21 04:07:36',0,0,1,1,'2022-07-21 04:07:36','2022-07-21 04:07:36'),
(45,1,250.00,4,'1','2022-07-21 04:11:31',0,0,1,1,'2022-07-21 04:11:31','2022-07-21 04:11:31'),
(46,1,1250.00,7,'-1','2022-07-21 04:14:01',0,0,1,1,'2022-07-21 04:14:01','2022-07-21 04:14:01'),
(47,5,1250.00,8,'1','2022-07-21 04:14:01',0,0,1,1,'2022-07-21 04:14:01','2022-07-21 04:14:01'),
(48,5,150.00,3,'-1','2022-07-21 04:16:18',0,0,1,1,'2022-07-21 04:16:18','2022-07-21 04:16:18'),
(49,1,37.50,4,'1','2022-07-21 04:16:18',0,0,1,1,'2022-07-21 04:16:18','2022-07-21 04:16:18');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`dni`,`password`,`avatar`,`ref`,`remember_token`,`created_at`,`updated_at`) values 
(1,'admin','info@iprofit.club',NULL,'0999','$2y$10$HX1nLf4g1iDvL3aE7QNdq.y8ka0HMYFvyPUx6l9AAX5bEgMSS/KKK','avatar-1.jpg','',NULL,'2022-07-20 13:54:25','2022-07-20 13:54:25'),
(2,'admin@admin.com','admin@admin.com',NULL,'0999888','$2y$10$HX1nLf4g1iDvL3aE7QNdq.y8ka0HMYFvyPUx6l9AAX5bEgMSS/KKK','avatar-1.jpg','info@iprofit.club',NULL,'2022-07-19 19:02:46','2022-07-19 19:02:46'),
(4,'henrycruceta@gmail.com','henrycruceta@gmail.com',NULL,'0930178461','$2y$10$OWyxVb.hrNghlPnETqGMfOGaKy/.QEmOIEtqQ/AoazMKRjAeIvsH2',NULL,'info@iprofit.club',NULL,'2022-07-21 03:37:34','2022-07-21 03:37:34'),
(5,'jmoreira','jmoreirapro@gmail.com',NULL,'0926903519001','$2y$10$SJODeOCzfgt.qOeitnCdkOB7PnA5l2sWq3Lu.p02vEgJ3Huhouw1i',NULL,'info@iprofit.club',NULL,'2022-07-21 04:00:10','2022-07-21 04:00:10');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
