/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.25-MariaDB : Database - dbiprofit
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
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `balances_user_id_foreign` (`user_id`),
  CONSTRAINT `balances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `balances` */

LOCK TABLES `balances` WRITE;

insert  into `balances`(`id`,`user_id`,`saldo`,`fechaact`,`userupd_id`,`isDeleted`,`status`,`created_at`,`updated_at`) values (1,1,3500.00,NULL,1,0,1,'2022-07-19 19:02:46','2022-07-23 22:57:23'),(2,2,15200.00,NULL,1,0,1,'2022-07-19 19:02:46','2022-07-25 14:06:11'),(3,3,20000.00,'2022-07-26 07:51:07',3,0,1,'2022-07-26 07:51:07','2022-07-26 09:00:01');

UNLOCK TABLES;

/*Table structure for table `bancos` */

DROP TABLE IF EXISTS `bancos`;

CREATE TABLE `bancos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bancos_user_id_foreign` (`user_id`),
  CONSTRAINT `bancos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bancos` */

LOCK TABLES `bancos` WRITE;

insert  into `bancos`(`id`,`nombre`,`user_id`,`isDeleted`,`status`,`created_at`,`updated_at`) values (1,'BANCO GUAYAQUIL',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(2,'BANCO PICHINCHA',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(3,'BANCO INTERNACIONAL',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(4,'BANCO PACÍFICO',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(5,'BANCO DEL AUSTRO',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(6,'BANCO BOLIVARIANO',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(7,'BANCO RUMIÑAHUI',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(8,'BANCO DE LOJA',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(9,'PRODUBANCO',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(10,'BANCO CENTRAL',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(11,'BANCO FINCA',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(12,'BANCO DEL BANK',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(13,'BANCO SOLIDARIO',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(14,'BANCO COOP. NACIONAL',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(15,'BANCO D-MIRO',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(16,'BANCO LITORAL',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(17,'BANCO BANECUADOR',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(18,'BANCO PROCREDIT',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(19,'BANCO DE MACHALA',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(20,'BANCO COMERCIAL DE MANABÍ',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46');

UNLOCK TABLES;

/*Table structure for table `compras` */

DROP TABLE IF EXISTS `compras`;

CREATE TABLE `compras` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `monto` decimal(10,2) NOT NULL,
  `statuscompra` tinyint(1) NOT NULL DEFAULT '1',
  `ntransaccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comprobante` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banco_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `userapr_id` bigint(20) unsigned NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `statuscomp` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `compras_user_id_foreign` (`user_id`),
  CONSTRAINT `compras_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `compras` */

LOCK TABLES `compras` WRITE;

insert  into `compras`(`id`,`monto`,`statuscompra`,`ntransaccion`,`comprobante`,`banco_id`,`user_id`,`userapr_id`,`isDeleted`,`statuscomp`,`status`,`created_at`,`updated_at`) values (2,200.00,1,'6546156','20220723170855ffde30ee1b6.jpg',1,2,0,0,3,1,'2022-07-23 14:09:11','2022-07-23 14:09:11'),(3,200.00,1,'6546156','20220723170855ffde30ee1b6.jpg',1,2,0,0,2,1,'2022-07-23 14:10:36','2022-07-23 14:10:36'),(4,3200.00,1,'323232','202207231709credito229.png',1,2,0,0,3,1,'2022-07-23 17:09:37','2022-07-23 17:09:37'),(5,5000.00,1,'75678678',NULL,15,2,0,0,3,1,'2022-07-23 17:19:14','2022-07-23 17:19:14'),(6,2.00,1,'10','',0,2,1,0,2,1,'2022-07-25 13:58:50','2022-07-25 13:58:50'),(7,2.00,1,'6','',0,2,1,0,2,1,'2022-07-25 13:59:41','2022-07-25 13:59:41'),(8,2.00,1,'6','',0,2,1,0,2,1,'2022-07-25 14:00:19','2022-07-25 14:00:19'),(9,2.00,1,'8','',0,2,1,0,2,1,'2022-07-25 14:03:56','2022-07-25 14:03:56'),(10,700.00,1,'64953','',0,2,1,0,2,1,'2022-07-25 14:06:11','2022-07-25 14:06:11'),(11,1500.00,1,'77643','',0,3,1,0,3,1,'2022-07-26 08:43:04','2022-07-26 09:00:01');

UNLOCK TABLES;

/*Table structure for table `configs` */

DROP TABLE IF EXISTS `configs`;

CREATE TABLE `configs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `configs` */

LOCK TABLES `configs` WRITE;

UNLOCK TABLES;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

LOCK TABLES `failed_jobs` WRITE;

UNLOCK TABLES;

/*Table structure for table `inversions` */

DROP TABLE IF EXISTS `inversions`;

CREATE TABLE `inversions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `inversions` */

LOCK TABLES `inversions` WRITE;

UNLOCK TABLES;

/*Table structure for table `menus` */

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent` bigint(20) unsigned NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icono` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menus_user_id_foreign` (`user_id`),
  CONSTRAINT `menus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `menus` */

LOCK TABLES `menus` WRITE;

insert  into `menus`(`id`,`parent`,`nombre`,`icono`,`link`,`user_id`,`status`,`created_at`,`updated_at`) values (1,0,'Escritorio','las la-tachometer-alt','#',1,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(2,1,'Mi Escritorio','','/home',1,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(3,0,'Inversiones','las la-briefcase','#',1,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(4,3,'Mis Inversiones','','/inversiones',1,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(5,0,'Equipo','las la-folder-plus','#',1,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(6,5,'Mis Equipo','','/patrocinios',1,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(7,0,'Movimientos','lab la-delicious','#',1,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(8,7,'Mis Movimientos','','/finanzas',1,1,'2022-07-19 19:02:46','2022-07-19 19:02:46');

UNLOCK TABLES;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

LOCK TABLES `migrations` WRITE;

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_07_12_151230_create_menus_table',1),(6,'2022_07_19_194502_create_ordenes_table',1),(7,'2022_07_19_233233_create_balances_table',1),(8,'2022_07_19_233318_create_transaccions_table',1),(9,'2022_07_19_233334_create_inversions_table',1),(10,'2022_07_19_233347_create_referidos_table',1),(11,'2022_07_19_233430_create_configs_table',1),(12,'2022_07_19_233448_create_tipo_transaccions_table',1),(13,'2022_07_20_040204_create_tipopagos_table',1),(14,'2022_07_20_160708_create_polizas_table',1),(15,'2022_07_22_164051_create_compras_table',2),(16,'2022_07_22_174914_create_bancos_table',2),(17,'2022_07_23_215226_create_retiros_table',3);

UNLOCK TABLES;

/*Table structure for table `ordenes` */

DROP TABLE IF EXISTS `ordenes`;

CREATE TABLE `ordenes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ordenes` */

LOCK TABLES `ordenes` WRITE;

UNLOCK TABLES;

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

LOCK TABLES `password_resets` WRITE;

UNLOCK TABLES;

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

LOCK TABLES `personal_access_tokens` WRITE;

UNLOCK TABLES;

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
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `statuspoliza` tinyint(1) NOT NULL DEFAULT '1',
  `statusi` tinyint(1) NOT NULL DEFAULT '0',
  `statusg` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `polizas_user_id_foreign` (`user_id`),
  CONSTRAINT `polizas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `polizas` */

LOCK TABLES `polizas` WRITE;

insert  into `polizas`(`id`,`user_id`,`valor`,`valorinteres`,`fechainversion`,`fechacapital`,`fechainteres`,`isDeleted`,`statuspoliza`,`statusi`,`statusg`,`status`,`created_at`,`updated_at`) values (1,2,1000.00,100.00,'2022-07-22 02:58:04','2022-08-06 02:58:04','2022-08-21 02:58:04',0,1,0,0,1,'2022-07-22 02:58:04','2022-07-22 02:58:04');

UNLOCK TABLES;

/*Table structure for table `referidos` */

DROP TABLE IF EXISTS `referidos`;

CREATE TABLE `referidos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `userref_id` bigint(20) unsigned NOT NULL,
  `valor` decimal(10,2) NOT NULL DEFAULT '0.00',
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `statustrans` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `referidos_user_id_foreign` (`user_id`),
  KEY `referidos_userref_id_foreign` (`userref_id`),
  CONSTRAINT `referidos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `referidos_userref_id_foreign` FOREIGN KEY (`userref_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `referidos` */

LOCK TABLES `referidos` WRITE;

UNLOCK TABLES;

/*Table structure for table `retiros` */

DROP TABLE IF EXISTS `retiros`;

CREATE TABLE `retiros` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `monto` decimal(10,2) NOT NULL,
  `formapago` bigint(20) NOT NULL DEFAULT '1',
  `ncuenta` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipocuenta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cedulatit` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombretit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moneda` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `red` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wallet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `userapr_id` bigint(20) unsigned NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `statusret` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `retiros_user_id_foreign` (`user_id`),
  CONSTRAINT `retiros_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `retiros` */

LOCK TABLES `retiros` WRITE;

insert  into `retiros`(`id`,`monto`,`formapago`,`ncuenta`,`banco`,`tipocuenta`,`cedulatit`,`nombretit`,`moneda`,`red`,`wallet`,`user_id`,`userapr_id`,`isDeleted`,`statusret`,`status`,`created_at`,`updated_at`) values (1,500.00,1,'32208855','5',NULL,NULL,NULL,NULL,NULL,NULL,2,0,0,2,1,'2022-07-23 22:22:00','2022-07-23 22:56:04'),(2,2000.00,1,'452452452','3',NULL,NULL,NULL,NULL,NULL,NULL,2,0,0,3,1,'2022-07-23 22:23:12','2022-07-23 23:01:34'),(3,3500.00,1,'165165165','3',NULL,NULL,NULL,NULL,NULL,NULL,2,0,0,2,1,'2022-07-24 07:37:48','2022-07-24 07:45:48'),(5,2000.00,1,'878489496','BANCO GUAYAQUIL','ANORROS','0995354632','MARIO AGUILAR',NULL,NULL,NULL,2,0,0,1,1,'2022-07-26 05:03:59','2022-07-26 05:03:59'),(6,5000.00,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,0,0,1,1,'2022-07-26 05:05:56','2022-07-26 05:05:56'),(7,5000.00,2,NULL,NULL,NULL,NULL,NULL,'DOLAR','www.red','323243',2,0,0,1,1,'2022-07-26 05:07:32','2022-07-26 05:07:32'),(8,5000.00,1,'427537358','BANCO GUAYAQUIL','ANORROS','0995354632','MARIO AGUILAR',NULL,NULL,NULL,3,0,0,3,1,'2022-07-26 07:53:26','2022-07-26 08:26:55'),(9,4000.00,1,'787378','BANCO GUAYAQUIL','AHORROS','0995354632','FF JJ',NULL,NULL,NULL,3,0,0,3,1,'2022-07-26 08:36:57','2022-07-26 08:37:07');

UNLOCK TABLES;

/*Table structure for table `tipo_transaccions` */

DROP TABLE IF EXISTS `tipo_transaccions`;

CREATE TABLE `tipo_transaccions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipomov` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_transaccions_user_id_foreign` (`user_id`),
  CONSTRAINT `tipo_transaccions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tipo_transaccions` */

LOCK TABLES `tipo_transaccions` WRITE;

insert  into `tipo_transaccions`(`id`,`nombre`,`tipomov`,`user_id`,`isDeleted`,`status`,`created_at`,`updated_at`) values (1,'COMPRA','1',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(2,'VENTA','-1',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(3,'INVERSIÓN','-1',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(4,'SPONSORSHIP','1',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(5,'TRANSFERENCIA','-1',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(6,'INTERESES','1',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(7,'ENVIO','-1',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(8,'RECIBIDO','1',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(9,'INVERSIÓN CAPITAL','1',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(10,'INVERSIÓN GANANCIA ','1',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(11,'RETIRO','-1',1,0,1,'2022-07-23 17:07:48',NULL),(12,'REVERSO RET','1',1,0,1,'2022-07-26 01:17:35',NULL),(13,'REVERSO ACR','-1',1,0,1,'2022-07-26 01:40:28',NULL);

UNLOCK TABLES;

/*Table structure for table `tipopagos` */

DROP TABLE IF EXISTS `tipopagos`;

CREATE TABLE `tipopagos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipopagos_user_id_foreign` (`user_id`),
  CONSTRAINT `tipopagos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tipopagos` */

LOCK TABLES `tipopagos` WRITE;

insert  into `tipopagos`(`id`,`nombre`,`user_id`,`isDeleted`,`status`,`created_at`,`updated_at`) values (1,'TRANSFERENCIA BANCARIA',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46'),(2,'BITCOIN',1,0,1,'2022-07-19 19:02:46','2022-07-19 19:02:46');

UNLOCK TABLES;

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
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `statustrans` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transaccions_user_id_foreign` (`user_id`),
  CONSTRAINT `transaccions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transaccions` */

LOCK TABLES `transaccions` WRITE;

insert  into `transaccions`(`id`,`user_id`,`valor`,`tipotrans`,`tipomov`,`fechaact`,`userupd_id`,`isDeleted`,`statustrans`,`status`,`created_at`,`updated_at`) values (1,2,1000.00,3,'-1','2022-07-22 02:58:04',0,0,1,1,'2022-07-22 02:58:04','2022-07-22 02:58:04'),(2,2,500.00,7,'-1','2022-07-23 22:53:15',0,0,1,1,'2022-07-23 22:53:15','2022-07-23 22:53:15'),(3,2,500.00,7,'-1','2022-07-23 22:56:04',0,0,1,1,'2022-07-23 22:56:04','2022-07-23 22:56:04'),(4,2,500.00,7,'-1','2022-07-23 22:57:23',0,0,1,1,'2022-07-23 22:57:23','2022-07-23 22:57:23'),(5,2,3500.00,11,'-1','2022-07-24 07:45:48',0,0,1,1,'2022-07-24 07:45:48','2022-07-24 07:45:48'),(6,2,5000.00,1,'1','2022-07-25 13:58:50',0,0,1,1,'2022-07-25 13:58:50','2022-07-25 13:58:50'),(7,2,400.00,1,'1','2022-07-25 13:59:41',0,0,1,1,'2022-07-25 13:59:41','2022-07-25 13:59:41'),(8,2,8000.00,1,'1','2022-07-25 14:00:19',0,0,1,1,'2022-07-25 14:00:19','2022-07-25 14:00:19'),(9,2,600.00,1,'1','2022-07-25 14:03:56',0,0,1,1,'2022-07-25 14:03:56','2022-07-25 14:03:56'),(10,2,700.00,1,'1','2022-07-25 14:06:11',0,0,1,1,'2022-07-25 14:06:11','2022-07-25 14:06:11'),(11,3,5000.00,11,'-1','2022-07-26 08:22:46',0,0,1,1,'2022-07-26 08:22:46','2022-07-26 08:22:46'),(12,3,5000.00,12,'1','2022-07-26 08:26:55',0,0,1,1,'2022-07-26 08:26:55','2022-07-26 08:26:55'),(13,3,1500.00,1,'1','2022-07-26 08:43:04',0,0,1,1,'2022-07-26 08:43:04','2022-07-26 08:43:04'),(14,3,1500.00,13,'-1','2022-07-26 09:00:01',0,0,1,1,'2022-07-26 09:00:01','2022-07-26 09:00:01');

UNLOCK TABLES;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `dni` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci,
  `ref` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `cedulafro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cedularev` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_dni_unique` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

LOCK TABLES `users` WRITE;

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`dni`,`password`,`avatar`,`ref`,`isAdmin`,`status`,`cedulafro`,`cedularev`,`remember_token`,`created_at`,`updated_at`) values (1,'admin','info@iprofit.club',NULL,'0999','$2y$10$9jGwxI5Ez1eKUZ.c1umwr.cNU4.hTeemIRWYh2qWgxACuFPuSZUtW','avatar-1.jpg','info@iprofit.club',1,1,'20220723170920160804_152223.jpg','202207231709credito229.png',NULL,'2022-07-22 02:56:19','2022-07-22 02:56:19'),(2,'admin@admin.com','admin@admin.com',NULL,'0999888','$2y$10$HX1nLf4g1iDvL3aE7QNdq.y8ka0HMYFvyPUx6l9AAX5bEgMSS/KKK','avatar-1.jpg',NULL,1,1,'20220723170920160804_152223.jpg','20220723170920160804_152223.jpg',NULL,'2022-07-19 19:02:46','2022-07-23 17:09:37'),(3,'Fercho','marioaguilar1990@gmail.com',NULL,'0930178462','$2y$10$OZvH5Ly/ZOZp9NUznQzUDO.tFQ8lLJbODQrkEiT6TvpdDrui663rC',NULL,'info@iprofit.club',0,1,'202207260753IMG-20220725-WA0073 (1).jpg','202207260753IMG-20220725-WA0074.jpg',NULL,'2022-07-26 07:51:07','2022-07-26 07:53:26');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
