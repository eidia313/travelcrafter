# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.26)
# Database: travelcrafter
# Generation Time: 2020-06-13 06:45:25 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table activity
# ------------------------------------------------------------

DROP TABLE IF EXISTS `activity`;

CREATE TABLE `activity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `showontailor` tinyint(1) NOT NULL,
  `thumbnail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `activity` WRITE;
/*!40000 ALTER TABLE `activity` DISABLE KEYS */;

INSERT INTO `activity` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`, `slug`, `desc`, `showontailor`, `thumbnail`)
VALUES
	(8,'Hiking','2081990351_1585839530.jpg','published','2020-04-02 14:58:50','2020-05-02 06:49:29','hiking','<p>asd</p>',1,''),
	(9,'Trekking','1038073911_1587048804.png','published','2020-04-16 14:53:24','2020-05-02 06:49:21','trekking','<p>This is a trekking content....</p>',1,'1124884846_1587048804.png'),
	(10,'Leisure','471180390_1591867925.jpg','published','2020-06-11 09:32:06','2020-06-11 09:32:06','leisure',NULL,0,'791624259_1591867926.jpg'),
	(11,'Mountaineering','2062554919_1591931934.jpg','published','2020-06-12 03:18:54','2020-06-12 03:18:54','mountaineering',NULL,0,'1467980675_1591931934.jpg');

/*!40000 ALTER TABLE `activity` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table activity_trips
# ------------------------------------------------------------

DROP TABLE IF EXISTS `activity_trips`;

CREATE TABLE `activity_trips` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `activity_id` int(10) unsigned NOT NULL,
  `trip_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_trips_activity_id_foreign` (`activity_id`),
  KEY `activity_trips_trip_id_foreign` (`trip_id`),
  CONSTRAINT `activity_trips_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`) ON DELETE CASCADE,
  CONSTRAINT `activity_trips_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `activity_trips` WRITE;
/*!40000 ALTER TABLE `activity_trips` DISABLE KEYS */;

INSERT INTO `activity_trips` (`id`, `activity_id`, `trip_id`, `created_at`, `updated_at`)
VALUES
	(1,8,2,NULL,NULL);

/*!40000 ALTER TABLE `activity_trips` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table blog
# ------------------------------------------------------------

DROP TABLE IF EXISTS `blog`;

CREATE TABLE `blog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table blog_cat_rel
# ------------------------------------------------------------

DROP TABLE IF EXISTS `blog_cat_rel`;

CREATE TABLE `blog_cat_rel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` int(10) unsigned NOT NULL,
  `cat_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_cat_rel_blog_id_foreign` (`blog_id`),
  KEY `blog_cat_rel_cat_id_foreign` (`cat_id`),
  CONSTRAINT `blog_cat_rel_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`),
  CONSTRAINT `blog_cat_rel_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `blogcategory` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table blogcategory
# ------------------------------------------------------------

DROP TABLE IF EXISTS `blogcategory`;

CREATE TABLE `blogcategory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table bookings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bookings`;

CREATE TABLE `bookings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `package` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trip_start_date` date NOT NULL,
  `trip_end_date` date NOT NULL,
  `people_num` int(11) NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_num` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_num` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mailing_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `emergency_contact_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emergency_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;

INSERT INTO `bookings` (`id`, `package`, `trip_start_date`, `trip_end_date`, `people_num`, `full_name`, `dob`, `country`, `city`, `email`, `phone_num`, `mobile_num`, `mailing_address`, `emergency_contact_name`, `relationship`, `emergency_phone`, `created_at`, `updated_at`)
VALUES
	(2,'Everest Base Camp Trek','2019-09-06','2019-09-04',1,'kamlesh','2019-09-04','qweasd','Lalitpur','berojgaar.tech@gmail.com','12323123','13123123123','asd','asdasd','asdasd','1231231231','2019-09-22 14:09:09','2019-09-22 14:09:09');

/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cache
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cache`;

CREATE TABLE `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  UNIQUE KEY `cache_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table ccountry
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ccountry`;

CREATE TABLE `ccountry` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `ccountry` WRITE;
/*!40000 ALTER TABLE `ccountry` DISABLE KEYS */;

INSERT INTO `ccountry` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'Japan','2020-05-02 00:00:00','2020-05-02 00:00:00'),
	(2,'Nepal','2020-05-10 00:00:00','2020-05-10 00:00:00');

/*!40000 ALTER TABLE `ccountry` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table check_list_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `check_list_categories`;

CREATE TABLE `check_list_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `check_list_categories_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `check_list_categories` WRITE;
/*!40000 ALTER TABLE `check_list_categories` DISABLE KEYS */;

INSERT INTO `check_list_categories` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`)
VALUES
	(4,'Body Wear',NULL,NULL,'2019-04-19 09:35:49','2019-04-19 09:35:49'),
	(5,'Hand Wear',NULL,NULL,'2019-04-19 09:35:54','2019-04-19 09:35:54'),
	(6,'Foot Wear',NULL,NULL,'2019-09-12 10:31:10','2019-09-12 10:31:10');

/*!40000 ALTER TABLE `check_list_categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table check_list_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `check_list_groups`;

CREATE TABLE `check_list_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `equipments` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `check_list_groups_name_unique` (`name`),
  UNIQUE KEY `check_list_groups_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `check_list_groups` WRITE;
/*!40000 ALTER TABLE `check_list_groups` DISABLE KEYS */;

INSERT INTO `check_list_groups` (`id`, `name`, `slug`, `description`, `status`, `created_at`, `updated_at`, `equipments`)
VALUES
	(19,'Test Group','test-group',NULL,NULL,'2019-09-21 08:42:33','2019-09-21 11:16:27','{\"handwear\":[\"Fleece Or Woolen Hat\",\"Liner gloves thin and warm\"],\"bodywear\":[\"Kamlesh Shrestha\"]}');

/*!40000 ALTER TABLE `check_list_groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table checklistcategory_checklistgroup
# ------------------------------------------------------------

DROP TABLE IF EXISTS `checklistcategory_checklistgroup`;

CREATE TABLE `checklistcategory_checklistgroup` (
  `group_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`group_id`,`category_id`),
  KEY `checklistcategory_checklistgroup_category_id_foreign` (`category_id`),
  CONSTRAINT `checklistcategory_checklistgroup_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `check_list_categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `checklistcategory_checklistgroup_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `check_list_groups` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table city
# ------------------------------------------------------------

DROP TABLE IF EXISTS `city`;

CREATE TABLE `city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `city_country_id_foreign` (`country_id`),
  CONSTRAINT `city_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;

INSERT INTO `city` (`id`, `country_id`, `name`, `created_at`, `updated_at`, `slug`, `status`)
VALUES
	(2,2,'Kathmandu','2018-10-16 15:05:47','2018-10-16 19:36:23','kathmandu','draft'),
	(3,2,'Chitwan','2019-06-02 09:35:42','2019-06-02 09:35:50','chitwan','published');

/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table clist
# ------------------------------------------------------------

DROP TABLE IF EXISTS `clist`;

CREATE TABLE `clist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `clist_c_id_foreign` (`c_id`),
  CONSTRAINT `clist_c_id_foreign` FOREIGN KEY (`c_id`) REFERENCES `ccountry` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `clist` WRITE;
/*!40000 ALTER TABLE `clist` DISABLE KEYS */;

INSERT INTO `clist` (`id`, `name`, `c_id`, `created_at`, `updated_at`, `email`, `phone`, `city`)
VALUES
	(3,'Subekshya',1,'2020-05-10 16:22:34','2020-05-11 08:26:55','subu@gmail.com','+977-9803676858','+977-9803676858'),
	(6,'Kamlesh Shrestha',1,'2020-05-11 14:48:30','2020-05-11 14:48:30','eidia313@gmail.com','+977-9803676858','Lalitpur');

/*!40000 ALTER TABLE `clist` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table contacts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;

INSERT INTO `contacts` (`id`, `name`, `email`, `contact_message`, `created_at`, `updated_at`, `subject`)
VALUES
	(3,'Kamlesh Shrestha','eidia313@gmail.com','Hello My Name is Kamlesh','2019-09-22 10:47:33','2019-09-22 10:47:33','Introduction');

/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table country
# ------------------------------------------------------------

DROP TABLE IF EXISTS `country`;

CREATE TABLE `country` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;

INSERT INTO `country` (`id`, `name`, `latitude`, `longitude`, `created_at`, `updated_at`, `status`, `slug`, `cover_image`)
VALUES
	(2,'Nepal','28.3949','84.1240','2018-10-16 14:56:21','2019-06-03 04:16:13','published','nepal','1511301721_1559535372.jpg'),
	(3,'India',NULL,NULL,NULL,NULL,'','','');

/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table difficulty
# ------------------------------------------------------------

DROP TABLE IF EXISTS `difficulty`;

CREATE TABLE `difficulty` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `difficulty` WRITE;
/*!40000 ALTER TABLE `difficulty` DISABLE KEYS */;

INSERT INTO `difficulty` (`id`, `name`, `desc`, `image`, `created_at`, `updated_at`)
VALUES
	(1,'Easy','East','2110309456_1550207781.jpg','2019-02-15 05:16:21','2019-02-15 05:16:21'),
	(2,'Easy to Moderate','Easy and Moderate','1275804482_1550207934.jpg','2019-02-15 05:18:54','2019-02-15 05:18:54'),
	(3,'Hard','<p>asd</p>','2035368238_1587108122.png','2020-04-17 07:22:02','2020-04-17 07:22:02');

/*!40000 ALTER TABLE `difficulty` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table equipment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `equipment`;

CREATE TABLE `equipment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `equipment_name_unique` (`name`),
  KEY `equipment_category_id_foreign` (`category_id`),
  CONSTRAINT `equipment_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `check_list_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `equipment` WRITE;
/*!40000 ALTER TABLE `equipment` DISABLE KEYS */;

INSERT INTO `equipment` (`id`, `name`, `category_id`, `description`, `status`, `created_at`, `updated_at`)
VALUES
	(2,'Fleece Or Woolen Hat',5,NULL,NULL,'2019-04-19 09:36:05','2019-06-05 07:51:40'),
	(3,'Liner gloves thin and warm',5,NULL,NULL,'2019-04-19 09:36:48','2019-04-19 09:36:48'),
	(4,'Foot Wear',6,NULL,NULL,'2019-06-05 07:51:58','2019-09-12 10:55:53'),
	(5,'Kamlesh Shrestha',4,NULL,NULL,'2019-09-12 10:28:55','2019-09-12 10:28:55');

/*!40000 ALTER TABLE `equipment` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table faq
# ------------------------------------------------------------

DROP TABLE IF EXISTS `faq`;

CREATE TABLE `faq` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `faq` WRITE;
/*!40000 ALTER TABLE `faq` DISABLE KEYS */;

INSERT INTO `faq` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`)
VALUES
	(1,'Early reservation','<p><span style=\"color: #333333; font-family: Poppins;\">In order to secure your places on internal flights and accommodation and to book the best of the guides available, an early booking is always .</span></p>','published','2019-09-28 02:48:10','2019-09-30 06:12:02'),
	(2,'Payment Schedule','<p><span style=\"color: #333333; font-family: Poppins;\">If your trip involves internal air tickets, we may have to get the tickets issued within the deadline given by the airlines and we may request you the cost of the ticket along with the tour deposit. After we receive the tour deposit, we process the booking of internal air tickets and hotels, and will get back to you with the confirmation within a week. If some internal airfares require immediate purchase, we will ask you to wire the payment for. Some hotels and supplier may ask for a non-refundable deposit to guarantee the booking and we will request to include this in the second payment.</span></p>','published','2019-09-28 03:00:59','2019-09-28 03:00:59');

/*!40000 ALTER TABLE `faq` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(5,'2018_10_12_160306_create_country_table',2),
	(6,'2018_10_12_160450_create_region_table',2),
	(7,'2018_10_12_160512_create_city_table',2),
	(8,'2018_10_13_054716_add_status_to_country_table',3),
	(9,'2018_10_13_144804_add_column_to_region_table',4),
	(10,'2018_10_13_144902_add_column_to_city_table',4),
	(11,'2018_10_15_153620_add_column_to_country_table',5),
	(14,'2018_10_16_124939_add_lat_long_to_regions_table',6),
	(15,'2018_10_20_031402_create_activity_table',6),
	(16,'2018_10_20_032131_create_package_table',6),
	(17,'2018_10_20_032505_create_package_image_table',7),
	(18,'2018_10_20_163115_add_slug_to_activity_table',8),
	(19,'2018_10_22_043440_create_difficulty_table',9),
	(20,'2018_10_22_043721_create_team_table',10),
	(21,'2018_10_22_044118_add_columns_in_package_table',11),
	(22,'2018_10_22_044935_add_columns_in_package_table',12),
	(23,'2019_01_04_041551_edit_package_table',13),
	(24,'2019_01_04_043835_add_column_in_package_table',14),
	(25,'2019_01_04_044213_add_column_in_package_table_2',15),
	(26,'2019_01_25_051958_create_settings_table',16),
	(27,'2019_01_26_065134_add_created_at_and_updated_at_field',17),
	(28,'2019_02_01_054639_add_slug_to_package_table',18),
	(29,'2019_02_02_060229_create_testimonial_table',19),
	(30,'2019_02_02_060409_add_column_bestselling_in_package_table',19),
	(31,'2019_02_10_172430_add_column_country_table',20),
	(32,'2019_02_15_034301_create_table_difficulty',21),
	(33,'2019_02_15_065248_assign_foreign_key_package',22),
	(39,'2019_03_27_163623_create_activity_trips_table',26),
	(40,'2019_03_28_071553_create_pages_table',27),
	(41,'2019_03_28_172111_create_contacts_table',28),
	(42,'2019_03_28_184512_create_bookings_table',29),
	(45,'2019_03_27_122856_create_trips_table',30),
	(46,'2019_04_17_035438_create_package_galleries_table',31),
	(47,'2019_04_19_083748_create_check_list_categories_table',32),
	(48,'2019_04_19_090603_create_equipment_table',33),
	(49,'2019_04_19_101056_create_check_list_groups_table',34),
	(50,'2019_04_19_101252_create_checklist_group_checklist_category_table',35),
	(51,'2019_04_23_064048_create_places_table',36),
	(52,'2019_09_12_103557_add_column_check_list_groups_table',37),
	(53,'2019_09_12_145325_add_column_promo_video_in_settings_table',38),
	(54,'2019_09_15_141051_create_partners_table',39),
	(55,'2019_09_17_021250_create_services_table',40),
	(56,'2019_09_17_022124_add_column_descriptin_in_services_table',41),
	(57,'2019_09_18_040356_add_column_promovideo_settings_table',42),
	(58,'2019_09_18_040524_add_column_video_testimonials_table',42),
	(59,'2019_09_18_045557_create_blog_table',43),
	(60,'2019_09_18_045841_create_blogcategory_table',44),
	(61,'2019_09_18_050029_create_blogcategoryrelation_table',45),
	(62,'2019_09_20_134928_add_columns_to_settings_table',46),
	(63,'2019_09_21_064609_add_column_to_team_table',47),
	(64,'2019_09_22_102348_add_column_subject_to_contacts_table',48),
	(65,'2019_09_27_145418_create_faq_table',49),
	(66,'2019_09_30_070219_create_placetype_table',50),
	(67,'2019_10_03_082948_create_cache_table',51),
	(68,'2020_01_23_014821_create_welfare_table',52),
	(69,'2020_01_23_020305_add_showintailor_column',53),
	(70,'2020_02_04_045034_add_whatsapp_on_settings_table',54),
	(71,'2020_02_04_070954_create_social_welfare_table',55),
	(72,'2020_04_02_150817_remove_column_from_package_table',56),
	(74,'2020_04_02_151236_remove_cover_image_from_package_table',57),
	(75,'2020_04_02_151328_add_cover_image_from_package_table',57),
	(76,'2020_04_12_083059_add_thumbnail_on_packages_table',58),
	(77,'2020_04_12_084034_remove_travel_specialist_package_table',59),
	(78,'2020_04_12_101041_remove_thumbnail_package_table',60),
	(79,'2020_04_16_143828_add_thumbnail_activity_table',61),
	(80,'2020_05_01_063722_add_fitness_trips_table',62),
	(81,'2020_05_01_085702_add_memberfirsttime_trips_table',63),
	(82,'2020_05_02_085754_create_ccountry_database',64),
	(83,'2020_05_02_103954_create_clist_database',65),
	(84,'2020_05_02_105518_add_email_phone_clist_table',66),
	(85,'2020_05_02_105518_add_city_clist_table',67),
	(94,'2020_06_11_100313_create_activity_places_table',68),
	(95,'2020_06_12_070440_create_table_activity_places_place_type',69);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table package
# ------------------------------------------------------------

DROP TABLE IF EXISTS `package`;

CREATE TABLE `package` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `checklist_group_id` int(11) unsigned DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `altitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `best_season` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `difficulty_id` int(10) unsigned DEFAULT NULL,
  `accomodation` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `trip_highlights` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `itenerary` longblob NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `region_id` int(10) unsigned NOT NULL,
  `activity_id` int(10) unsigned NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isBestSelling` tinyint(1) NOT NULL,
  `cover_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `package_country_id_foreign` (`country_id`),
  KEY `package_region_id_foreign` (`region_id`),
  KEY `package_activity_id_foreign` (`activity_id`),
  KEY `package_difficulty_id_foreign` (`difficulty_id`),
  KEY `checklist_group_id` (`checklist_group_id`),
  CONSTRAINT `package_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`),
  CONSTRAINT `package_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`),
  CONSTRAINT `package_difficulty_id_foreign` FOREIGN KEY (`difficulty_id`) REFERENCES `difficulty` (`id`),
  CONSTRAINT `package_ibfk_1` FOREIGN KEY (`checklist_group_id`) REFERENCES `check_list_groups` (`id`),
  CONSTRAINT `package_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `package` WRITE;
/*!40000 ALTER TABLE `package` DISABLE KEYS */;

INSERT INTO `package` (`id`, `created_at`, `updated_at`, `checklist_group_id`, `title`, `description`, `altitude`, `best_season`, `difficulty_id`, `accomodation`, `trip_highlights`, `duration`, `itenerary`, `country_id`, `region_id`, `activity_id`, `slug`, `isBestSelling`, `cover_image`)
VALUES
	(15,'2020-04-02 15:28:28','2020-04-12 08:52:53',19,'Test Package 3','<p>asdasd</p>','1245','ASd',1,'<p>asd</p>','<p>asd</p>',1,X'5B7B22646179223A2231222C227469746C65223A224B6174686D616E647520546F20506F6B68617261222C226D6F6465223A225472656B2C204472697665222C226475726174696F6E223A223330206D696E75746573222C22616C746974756465223A2231323430227D5D',2,2,8,'test-package-3',0,'683074857_1585841308.jpg'),
	(16,'2020-04-12 08:56:31','2020-04-12 08:56:31',19,'Evereest Base Camp','<p>asdasdasd asdas</p>','1245','Summer',2,'<p>asdasd</p>','<p>asdasd</p>',1,X'5B7B22646179223A2231222C227469746C65223A2231353361736461222C226D6F6465223A22617364617364222C226475726174696F6E223A22617364222C22616C746974756465223A22617364227D5D',2,3,8,'evereest-base-camp',1,'65944382_1586681791.png');

/*!40000 ALTER TABLE `package` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table package_galleries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `package_galleries`;

CREATE TABLE `package_galleries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `package_id` int(10) unsigned NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `package_galleries_package_id_foreign` (`package_id`),
  CONSTRAINT `package_galleries_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `package` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table package_image
# ------------------------------------------------------------

DROP TABLE IF EXISTS `package_image`;

CREATE TABLE `package_image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `package_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `package_image_package_id_foreign` (`package_id`),
  CONSTRAINT `package_image_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `package` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table pages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;

INSERT INTO `pages` (`id`, `title`, `slug`, `description`, `image`, `status`, `created_at`, `updated_at`)
VALUES
	(3,'Passion that formed business','passion-that-formed-business','<p>Our first Founder, Mr. Sumba Sherpa, was a young sheep-herder his village named \"Pangom\", a quiet rest-stop for the mountain expedition groups and the trekkers. Watching those traveling groups and further talking with the guides, he developed a deep-seated desire of exploring the mountains from a young age. But because of the financial constraints, he couldn\'t do so.</p>\r\n<p>At that time, the only option was to work for the tourists who would come to trek in the mountains of Nepal. So, at young age of 15 he ran away from home to join a group of trekkers as a porter on their journey.</p>\r\n<p>From then on, he worked as a porter in many other trekking groups from where he advanced to the position of Kitchen Boy to Sherpa. Gradually he gained knowledge on the trekking areas and their routes. Then eventually he gained the license to finally be a Trekking Guide.</p>\r\n<p>Mr. Sumba met a young mountaineer, our second founder, Mr. Ang Rita Sherpa with whom he shared mutual passion of exploring and adventure. They were friends and room-mate for many years when they decided to combine their individual interests, experiences and expertise of more than 40 years on both trekking and expedition to form a travel company called High Country Trekking and Expedition.</p>','1089653071_1553768259.jpg','published','2019-03-28 09:11:48','2019-09-18 15:57:11'),
	(4,'Our Mission','our-mission','<p>We create trips that perfectly caters to our clients needs, requirements and preferences. Your safety is our top priority. Focusing on forming a long term relationship with our clients, we aspire to be reliable and trustworthy so we can send you off happy and satisfied. Perfectly custom made trips.</p>','921099874_1569569618.png','published','2019-09-18 16:17:44','2019-09-27 07:33:38'),
	(5,'Know Before You Come','know-before-you-come','<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>','noimage.jpg','published','2019-09-22 04:20:19','2019-09-22 04:20:19');

/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table partners
# ------------------------------------------------------------

DROP TABLE IF EXISTS `partners`;

CREATE TABLE `partners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` bigint(20) NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table places
# ------------------------------------------------------------

DROP TABLE IF EXISTS `places`;

CREATE TABLE `places` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(10) unsigned DEFAULT NULL,
  `city_id` int(10) unsigned DEFAULT NULL,
  `activity_id` int(10) unsigned DEFAULT NULL,
  `region_id` int(10) unsigned DEFAULT NULL,
  `place_type_id` int(10) unsigned DEFAULT NULL,
  `altitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `place_type` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `places_name_unique` (`name`),
  UNIQUE KEY `places_slug_unique` (`slug`),
  KEY `places_country_id_foreign` (`country_id`),
  KEY `places_city_id_foreign` (`city_id`),
  KEY `places_activity_id_foreign` (`activity_id`),
  KEY `places_region_id_foreign` (`region_id`),
  KEY `places_place_type_id_foreign` (`place_type_id`),
  CONSTRAINT `places_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`) ON DELETE CASCADE,
  CONSTRAINT `places_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  CONSTRAINT `places_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`),
  CONSTRAINT `places_place_type_id_foreign` FOREIGN KEY (`place_type_id`) REFERENCES `placetype` (`id`) ON DELETE CASCADE,
  CONSTRAINT `places_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `places` WRITE;
/*!40000 ALTER TABLE `places` DISABLE KEYS */;

INSERT INTO `places` (`id`, `name`, `slug`, `country_id`, `city_id`, `activity_id`, `region_id`, `place_type_id`, `altitude`, `description`, `cover_image`, `status`, `created_at`, `updated_at`, `place_type`)
VALUES
	(2,'Kathmandu Durbar Square','kathmandu-durbar-square',2,2,10,NULL,NULL,'1245','<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p>\r\n<p>&nbsp;</p>',NULL,NULL,'2019-10-03 10:05:35','2019-10-03 10:05:35',0),
	(3,'Everest base Camp Trek','everest-base-camp-trek',2,2,10,NULL,NULL,'1245','<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',NULL,NULL,'2019-10-03 10:07:58','2019-10-03 10:23:43',0),
	(9,'Test','test',2,3,11,3,2,'1250',NULL,'62539155_1591953488.jpg',NULL,'2020-06-12 09:18:08','2020-06-12 09:18:08',0);

/*!40000 ALTER TABLE `places` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table placetype
# ------------------------------------------------------------

DROP TABLE IF EXISTS `placetype`;

CREATE TABLE `placetype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `placetype` WRITE;
/*!40000 ALTER TABLE `placetype` DISABLE KEYS */;

INSERT INTO `placetype` (`id`, `name`, `status`, `created_at`, `updated_at`)
VALUES
	(2,'Heritage Site','published','2019-10-03 10:04:56','2019-10-03 10:04:56'),
	(3,'Conservation Area','published','2019-10-03 10:05:47','2019-10-03 10:09:10');

/*!40000 ALTER TABLE `placetype` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table region
# ------------------------------------------------------------

DROP TABLE IF EXISTS `region`;

CREATE TABLE `region` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `region_country_id_foreign` (`country_id`),
  CONSTRAINT `region_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `region` WRITE;
/*!40000 ALTER TABLE `region` DISABLE KEYS */;

INSERT INTO `region` (`id`, `country_id`, `name`, `created_at`, `updated_at`, `slug`, `status`, `latitude`, `longitude`)
VALUES
	(2,2,'Everest Region','2018-10-16 15:37:38','2019-04-24 10:05:57','everest-region','published','27.9881','86.9250'),
	(3,2,'Annapurna Region','2018-12-13 05:52:25','2019-04-24 10:04:29','annapurna-region','published','28.5300','83.8780'),
	(4,2,'Dhaulagiri Region','2019-02-12 03:57:05','2019-02-12 03:57:12','dhaulagiri-region','published','22.12','123.20'),
	(5,2,'Upper Mustang','2019-02-12 03:57:25','2019-02-12 03:57:25','upper-mustang','published','22.14','22.14'),
	(6,2,'Lower Mustang','2019-02-12 03:57:40','2019-04-24 10:01:08','lower-mustang','published','28.9985','83.8473');

/*!40000 ALTER TABLE `region` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table services
# ------------------------------------------------------------

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isHomePage` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;

INSERT INTO `services` (`id`, `title`, `image`, `isHomePage`, `created_at`, `updated_at`, `description`)
VALUES
	(1,'Planning Leads to Smooth & Efficient Travel','1214187837_1569569215.png',1,'2019-09-21 12:18:39','2019-09-27 07:26:55','<p class=\"Body\">As a service oriented company &amp; consultant, we prepare trips for our clients based on these four stages.</p>\r\n<p class=\"Body\">We get up close and personal with our clients to organise their perfect trips.&nbsp; An interaction likes this sets a bond of trusts between us and our clients as it invokes involvement from our clients during the whole planning process</p>'),
	(2,'What We Do','noimage.jpg',0,'2019-09-21 14:53:54','2019-09-21 14:54:06','<p>We are a specialist in travel, based on our extensive personal experience of more than 40 year</p>'),
	(3,'Discovery Session','362503620_1569569352.png',0,'2019-09-21 15:13:31','2019-09-27 07:29:12','<p>In this discovery phase we get to know our clients better. Our session starts with asking few questions about their traveling experience, duration and budget.</p>'),
	(4,'Planning Session','1400341599_1569569359.png',0,'2019-09-21 15:14:26','2019-09-27 07:29:19','<p>Our requirement gathering team will sit down to analyze the clients know preferences and needs and prepare suitable itineraries.</p>'),
	(5,'Review Session','1364221508_1569569367.png',0,'2019-09-21 15:20:54','2019-09-27 07:29:27','<p>After the itineraries have been made, we present the most likely options to the clients. We edit them out and add some more as per the requirement of the clients.</p>'),
	(6,'Execution Session','295206819_1569569376.png',0,'2019-09-21 15:21:55','2019-09-27 07:29:36','<p>Once the client agrees on an itinerary, we confirm the trip. Then, make necessary arrangements to book everything by ordering airline tickets, making hotel reservations and obtaining trekking resources.</p>');

/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `altlogo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sitename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landline` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `videowebm` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `videomp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `videoogg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `promo_video` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promovideo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tripsorganized` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numofclients` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;

INSERT INTO `settings` (`id`, `logo`, `altlogo`, `sitename`, `address`, `phonenumber`, `landline`, `email`, `facebook`, `twitter`, `instagram`, `youtube`, `videowebm`, `videomp`, `videoogg`, `created_at`, `updated_at`, `promo_video`, `promovideo`, `tripsorganized`, `numofclients`, `whatsapp`)
VALUES
	(1,'1991117552_1568350654.png','80591775_1568350654.png','High Country Trekking','<p>P.O.Box 3124, Naxal-5</p>\r\n<p>Kathmandu, Nepal</p>','9803676858','014481813','hcountry@mail.com.np','highcountrytrekandexped',NULL,'highcountrytrekking','highcountrytrek','1804535701_1548487594.webm','232367528_1548487594.mp4',NULL,NULL,'2020-05-11 12:19:18','','ut-U-4m42aQ','123K','123K',9779803676858);

/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table social_welfare
# ------------------------------------------------------------

DROP TABLE IF EXISTS `social_welfare`;

CREATE TABLE `social_welfare` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `altitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sponsor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `social_welfare` WRITE;
/*!40000 ALTER TABLE `social_welfare` DISABLE KEYS */;

INSERT INTO `social_welfare` (`id`, `title`, `altitude`, `date`, `sponsor`, `image`, `desc`, `created_at`, `updated_at`)
VALUES
	(1,'Test Welfare','1250','2020-02-22','test','1493050634_1592026053.jpg',NULL,'2020-06-13 05:27:34','2020-06-13 05:27:34');

/*!40000 ALTER TABLE `social_welfare` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table team
# ------------------------------------------------------------

DROP TABLE IF EXISTS `team`;

CREATE TABLE `team` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;

INSERT INTO `team` (`id`, `name`, `created_at`, `updated_at`, `designation`, `image`)
VALUES
	(1,'Kamlesh Shrestha','2019-09-12 00:00:00','2019-09-21 07:56:33','Co-Founder','86100117_1569052593.png'),
	(3,'Tshering Mingma Sherpa','2019-09-21 07:23:50','2019-09-21 07:56:28','Chairman','1808834192_1569052588.png'),
	(4,'Jigmee Sherpa','2019-09-21 07:24:09','2019-09-21 07:56:20','General Manager','2070562427_1569052580.png'),
	(5,'Ang Rita Sherpa','2019-09-21 07:24:36','2019-09-21 07:56:12','Safety Expert','1753961896_1569052572.png');

/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table testimonial
# ------------------------------------------------------------

DROP TABLE IF EXISTS `testimonial`;

CREATE TABLE `testimonial` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `video` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `testimonial` WRITE;
/*!40000 ALTER TABLE `testimonial` DISABLE KEYS */;

INSERT INTO `testimonial` (`id`, `client_name`, `client_location`, `client_message`, `status`, `created_at`, `updated_at`, `video`)
VALUES
	(6,'Kamlesh Shrestha','England','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','published','2019-09-18 09:51:30','2019-09-18 09:51:30','Bqx9uUxfplw'),
	(7,'Subekhya Kathayat','United States','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','published','2019-09-18 09:54:06','2019-09-18 09:54:06','tUwGHpWjl9A'),
	(8,'Tshering Mingma Sherpa','Australia','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','published','2019-09-18 09:54:30','2019-09-18 09:54:30','pyguyyToEJY');

/*!40000 ALTER TABLE `testimonial` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table trips
# ------------------------------------------------------------

DROP TABLE IF EXISTS `trips`;

CREATE TABLE `trips` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `destination_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `season` text COLLATE utf8mb4_unicode_ci,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adults` int(11) NOT NULL,
  `children` int(11) DEFAULT NULL,
  `hotel_class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest` text COLLATE utf8mb4_unicode_ci,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_way` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `find_us` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fitnesslevel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialattn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `firsttime` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `trips_destination_id_foreign` (`destination_id`),
  CONSTRAINT `trips_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `country` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `trips` WRITE;
/*!40000 ALTER TABLE `trips` DISABLE KEYS */;

INSERT INTO `trips` (`id`, `destination_id`, `date`, `season`, `duration`, `adults`, `children`, `hotel_class`, `interest`, `title`, `full_name`, `email`, `phone`, `nationality`, `contact_way`, `find_us`, `created_at`, `updated_at`, `fitnesslevel`, `specialattn`, `firsttime`)
VALUES
	(2,2,'2021-02-02','Summer','21 Days - 28 Days',1,2,'4 Star Hotel','asd','Mr.','Daddu Paji','daddupaju@gmail.com','9840340308','Nepal','Email','Recommended by friends','2020-05-02 06:51:47','2020-05-02 06:51:47','fit','medical-condition','true');

/*!40000 ALTER TABLE `trips` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Kamlesh Shrestha','eidia313@gmail.com',NULL,'$2y$10$ZrdkyBRsKNrLrsQ0ItFxWeHqSluT5NyaHhoaYlLqi8m.zO69eXqsW','WmrQr3iR4jt0cwHiJsKqnwUynHowWJbQVqnSM2yJdQI0LONhKKFbqAdNxiWp',NULL,NULL),
	(2,'Bijay Chaudhary','bijay.res@gmail.com',NULL,'$2y$10$DglC3noevMH79od4JM.z..s7cPWwUABomjgHLdG35Lu1ZaKaemG2S','28tBjMVoaIbcnr5dgNcZoDsXXEfhv8ZlhqUCmdHn6UcVENzzK0xrkHfsxDk2','2019-03-27 08:11:08','2019-03-27 08:11:08');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
