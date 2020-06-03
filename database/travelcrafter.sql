-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2020 at 01:26 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelcrafter`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `showontailor` tinyint(1) NOT NULL,
  `thumbnail` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`, `slug`, `desc`, `showontailor`, `thumbnail`) VALUES
(8, 'Hiking', '2081990351_1585839530.jpg', 'published', '2020-04-02 09:13:50', '2020-05-02 01:04:29', 'hiking', '<p>asd</p>', 1, ''),
(9, 'Trekking', '1038073911_1587048804.png', 'published', '2020-04-16 09:08:24', '2020-05-02 01:04:21', 'trekking', '<p>This is a trekking content....</p>', 1, '1124884846_1587048804.png');

-- --------------------------------------------------------

--
-- Table structure for table `activity_trips`
--

CREATE TABLE `activity_trips` (
  `id` int(10) UNSIGNED NOT NULL,
  `activity_id` int(10) UNSIGNED NOT NULL,
  `trip_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_trips`
--

INSERT INTO `activity_trips` (`id`, `activity_id`, `trip_id`, `created_at`, `updated_at`) VALUES
(1, 8, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogcategory`
--

CREATE TABLE `blogcategory` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_cat_rel`
--

CREATE TABLE `blog_cat_rel` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `package`, `trip_start_date`, `trip_end_date`, `people_num`, `full_name`, `dob`, `country`, `city`, `email`, `phone_num`, `mobile_num`, `mailing_address`, `emergency_contact_name`, `relationship`, `emergency_phone`, `created_at`, `updated_at`) VALUES
(2, 'Everest Base Camp Trek', '2019-09-06', '2019-09-04', 1, 'kamlesh', '2019-09-04', 'qweasd', 'Lalitpur', 'berojgaar.tech@gmail.com', '12323123', '13123123123', 'asd', 'asdasd', 'asdasd', '1231231231', '2019-09-22 08:24:09', '2019-09-22 08:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ccountry`
--

CREATE TABLE `ccountry` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ccountry`
--

INSERT INTO `ccountry` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Japan', '2020-05-01 18:15:00', '2020-05-01 18:15:00'),
(2, 'Nepal', '2020-05-09 18:15:00', '2020-05-09 18:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `checklistcategory_checklistgroup`
--

CREATE TABLE `checklistcategory_checklistgroup` (
  `group_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `check_list_categories`
--

CREATE TABLE `check_list_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `check_list_categories`
--

INSERT INTO `check_list_categories` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Body Wear', NULL, NULL, '2019-04-19 03:50:49', '2019-04-19 03:50:49'),
(5, 'Hand Wear', NULL, NULL, '2019-04-19 03:50:54', '2019-04-19 03:50:54'),
(6, 'Foot Wear', NULL, NULL, '2019-09-12 04:46:10', '2019-09-12 04:46:10');

-- --------------------------------------------------------

--
-- Table structure for table `check_list_groups`
--

CREATE TABLE `check_list_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `equipments` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `check_list_groups`
--

INSERT INTO `check_list_groups` (`id`, `name`, `slug`, `description`, `status`, `created_at`, `updated_at`, `equipments`) VALUES
(19, 'Test Group', 'test-group', NULL, NULL, '2019-09-21 02:57:33', '2019-09-21 05:31:27', '{\"handwear\":[\"Fleece Or Woolen Hat\",\"Liner gloves thin and warm\"],\"bodywear\":[\"Kamlesh Shrestha\"]}');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `country_id`, `name`, `created_at`, `updated_at`, `slug`, `status`) VALUES
(2, 2, 'Kathmandu', '2018-10-16 09:20:47', '2018-10-16 13:51:23', 'kathmandu', 'draft'),
(3, 2, 'Chitwan', '2019-06-02 03:50:42', '2019-06-02 03:50:50', 'chitwan', 'published');

-- --------------------------------------------------------

--
-- Table structure for table `clist`
--

CREATE TABLE `clist` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clist`
--

INSERT INTO `clist` (`id`, `name`, `c_id`, `created_at`, `updated_at`, `email`, `phone`, `city`) VALUES
(3, 'Subekshya', 1, '2020-05-10 10:37:34', '2020-05-11 02:41:55', 'subu@gmail.com', '+977-9803676858', '+977-9803676858'),
(6, 'Kamlesh Shrestha', 1, '2020-05-11 09:03:30', '2020-05-11 09:03:30', 'eidia313@gmail.com', '+977-9803676858', 'Lalitpur');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `contact_message`, `created_at`, `updated_at`, `subject`) VALUES
(3, 'Kamlesh Shrestha', 'eidia313@gmail.com', 'Hello My Name is Kamlesh', '2019-09-22 05:02:33', '2019-09-22 05:02:33', 'Introduction');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `latitude`, `longitude`, `created_at`, `updated_at`, `status`, `slug`, `cover_image`) VALUES
(2, 'Nepal', '28.3949', '84.1240', '2018-10-16 09:11:21', '2019-06-02 22:31:13', 'published', 'nepal', '1511301721_1559535372.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `difficulty`
--

CREATE TABLE `difficulty` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `difficulty`
--

INSERT INTO `difficulty` (`id`, `name`, `desc`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Easy', 'East', '2110309456_1550207781.jpg', '2019-02-14 23:31:21', '2019-02-14 23:31:21'),
(2, 'Easy to Moderate', 'Easy and Moderate', '1275804482_1550207934.jpg', '2019-02-14 23:33:54', '2019-02-14 23:33:54'),
(3, 'Hard', '<p>asd</p>', '2035368238_1587108122.png', '2020-04-17 01:37:02', '2020-04-17 01:37:02');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `name`, `category_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Fleece Or Woolen Hat', 5, NULL, NULL, '2019-04-19 03:51:05', '2019-06-05 02:06:40'),
(3, 'Liner gloves thin and warm', 5, NULL, NULL, '2019-04-19 03:51:48', '2019-04-19 03:51:48'),
(4, 'Foot Wear', 6, NULL, NULL, '2019-06-05 02:06:58', '2019-09-12 05:10:53'),
(5, 'Kamlesh Shrestha', 4, NULL, NULL, '2019-09-12 04:43:55', '2019-09-12 04:43:55');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Early reservation', '<p><span style=\"color: #333333; font-family: Poppins;\">In order to secure your places on internal flights and accommodation and to book the best of the guides available, an early booking is always .</span></p>', 'published', '2019-09-27 21:03:10', '2019-09-30 00:27:02'),
(2, 'Payment Schedule', '<p><span style=\"color: #333333; font-family: Poppins;\">If your trip involves internal air tickets, we may have to get the tickets issued within the deadline given by the airlines and we may request you the cost of the ticket along with the tour deposit. After we receive the tour deposit, we process the booking of internal air tickets and hotels, and will get back to you with the confirmation within a week. If some internal airfares require immediate purchase, we will ask you to wire the payment for. Some hotels and supplier may ask for a non-refundable deposit to guarantee the booking and we will request to include this in the second payment.</span></p>', 'published', '2019-09-27 21:15:59', '2019-09-27 21:15:59');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2018_10_12_160306_create_country_table', 2),
(6, '2018_10_12_160450_create_region_table', 2),
(7, '2018_10_12_160512_create_city_table', 2),
(8, '2018_10_13_054716_add_status_to_country_table', 3),
(9, '2018_10_13_144804_add_column_to_region_table', 4),
(10, '2018_10_13_144902_add_column_to_city_table', 4),
(11, '2018_10_15_153620_add_column_to_country_table', 5),
(14, '2018_10_16_124939_add_lat_long_to_regions_table', 6),
(15, '2018_10_20_031402_create_activity_table', 6),
(16, '2018_10_20_032131_create_package_table', 6),
(17, '2018_10_20_032505_create_package_image_table', 7),
(18, '2018_10_20_163115_add_slug_to_activity_table', 8),
(19, '2018_10_22_043440_create_difficulty_table', 9),
(20, '2018_10_22_043721_create_team_table', 10),
(21, '2018_10_22_044118_add_columns_in_package_table', 11),
(22, '2018_10_22_044935_add_columns_in_package_table', 12),
(23, '2019_01_04_041551_edit_package_table', 13),
(24, '2019_01_04_043835_add_column_in_package_table', 14),
(25, '2019_01_04_044213_add_column_in_package_table_2', 15),
(26, '2019_01_25_051958_create_settings_table', 16),
(27, '2019_01_26_065134_add_created_at_and_updated_at_field', 17),
(28, '2019_02_01_054639_add_slug_to_package_table', 18),
(29, '2019_02_02_060229_create_testimonial_table', 19),
(30, '2019_02_02_060409_add_column_bestselling_in_package_table', 19),
(31, '2019_02_10_172430_add_column_country_table', 20),
(32, '2019_02_15_034301_create_table_difficulty', 21),
(33, '2019_02_15_065248_assign_foreign_key_package', 22),
(39, '2019_03_27_163623_create_activity_trips_table', 26),
(40, '2019_03_28_071553_create_pages_table', 27),
(41, '2019_03_28_172111_create_contacts_table', 28),
(42, '2019_03_28_184512_create_bookings_table', 29),
(45, '2019_03_27_122856_create_trips_table', 30),
(46, '2019_04_17_035438_create_package_galleries_table', 31),
(47, '2019_04_19_083748_create_check_list_categories_table', 32),
(48, '2019_04_19_090603_create_equipment_table', 33),
(49, '2019_04_19_101056_create_check_list_groups_table', 34),
(50, '2019_04_19_101252_create_checklist_group_checklist_category_table', 35),
(51, '2019_04_23_064048_create_places_table', 36),
(52, '2019_09_12_103557_add_column_check_list_groups_table', 37),
(53, '2019_09_12_145325_add_column_promo_video_in_settings_table', 38),
(54, '2019_09_15_141051_create_partners_table', 39),
(55, '2019_09_17_021250_create_services_table', 40),
(56, '2019_09_17_022124_add_column_descriptin_in_services_table', 41),
(57, '2019_09_18_040356_add_column_promovideo_settings_table', 42),
(58, '2019_09_18_040524_add_column_video_testimonials_table', 42),
(59, '2019_09_18_045557_create_blog_table', 43),
(60, '2019_09_18_045841_create_blogcategory_table', 44),
(61, '2019_09_18_050029_create_blogcategoryrelation_table', 45),
(62, '2019_09_20_134928_add_columns_to_settings_table', 46),
(63, '2019_09_21_064609_add_column_to_team_table', 47),
(64, '2019_09_22_102348_add_column_subject_to_contacts_table', 48),
(65, '2019_09_27_145418_create_faq_table', 49),
(66, '2019_09_30_070219_create_placetype_table', 50),
(67, '2019_10_03_082948_create_cache_table', 51),
(68, '2020_01_23_014821_create_welfare_table', 52),
(69, '2020_01_23_020305_add_showintailor_column', 53),
(70, '2020_02_04_045034_add_whatsapp_on_settings_table', 54),
(71, '2020_02_04_070954_create_social_welfare_table', 55),
(72, '2020_04_02_150817_remove_column_from_package_table', 56),
(74, '2020_04_02_151236_remove_cover_image_from_package_table', 57),
(75, '2020_04_02_151328_add_cover_image_from_package_table', 57),
(76, '2020_04_12_083059_add_thumbnail_on_packages_table', 58),
(77, '2020_04_12_084034_remove_travel_specialist_package_table', 59),
(78, '2020_04_12_101041_remove_thumbnail_package_table', 60),
(79, '2020_04_16_143828_add_thumbnail_activity_table', 61),
(80, '2020_05_01_063722_add_fitness_trips_table', 62),
(81, '2020_05_01_085702_add_memberfirsttime_trips_table', 63),
(82, '2020_05_02_085754_create_ccountry_database', 64),
(83, '2020_05_02_103954_create_clist_database', 65),
(84, '2020_05_02_105518_add_email_phone_clist_table', 66),
(85, '2020_05_02_105518_add_city_clist_table', 67);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `checklist_group_id` int(11) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `altitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `best_season` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `difficulty_id` int(10) UNSIGNED DEFAULT NULL,
  `accomodation` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `trip_highlights` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `itenerary` longblob NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `region_id` int(10) UNSIGNED NOT NULL,
  `activity_id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isBestSelling` tinyint(1) NOT NULL,
  `cover_image` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `created_at`, `updated_at`, `checklist_group_id`, `title`, `description`, `altitude`, `best_season`, `difficulty_id`, `accomodation`, `trip_highlights`, `duration`, `itenerary`, `country_id`, `region_id`, `activity_id`, `slug`, `isBestSelling`, `cover_image`) VALUES
(15, '2020-04-02 09:43:28', '2020-04-12 03:07:53', 19, 'Test Package 3', '<p>asdasd</p>', '1245', 'ASd', 1, '<p>asd</p>', '<p>asd</p>', 1, 0x5b7b22646179223a2231222c227469746c65223a224b6174686d616e647520546f20506f6b68617261222c226d6f6465223a225472656b2c204472697665222c226475726174696f6e223a223330206d696e75746573222c22616c746974756465223a2231323430227d5d, 2, 2, 8, 'test-package-3', 0, '683074857_1585841308.jpg'),
(16, '2020-04-12 03:11:31', '2020-04-12 03:11:31', 19, 'Evereest Base Camp', '<p>asdasdasd asdas</p>', '1245', 'Summer', 2, '<p>asdasd</p>', '<p>asdasd</p>', 1, 0x5b7b22646179223a2231222c227469746c65223a2231353361736461222c226d6f6465223a22617364617364222c226475726174696f6e223a22617364222c22616c746974756465223a22617364227d5d, 2, 3, 8, 'evereest-base-camp', 1, '65944382_1586681791.png');

-- --------------------------------------------------------

--
-- Table structure for table `package_galleries`
--

CREATE TABLE `package_galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_id` int(10) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_image`
--

CREATE TABLE `package_image` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Passion that formed business', 'passion-that-formed-business', '<p>Our first Founder, Mr. Sumba Sherpa, was a young sheep-herder his village named \"Pangom\", a quiet rest-stop for the mountain expedition groups and the trekkers. Watching those traveling groups and further talking with the guides, he developed a deep-seated desire of exploring the mountains from a young age. But because of the financial constraints, he couldn\'t do so.</p>\r\n<p>At that time, the only option was to work for the tourists who would come to trek in the mountains of Nepal. So, at young age of 15 he ran away from home to join a group of trekkers as a porter on their journey.</p>\r\n<p>From then on, he worked as a porter in many other trekking groups from where he advanced to the position of Kitchen Boy to Sherpa. Gradually he gained knowledge on the trekking areas and their routes. Then eventually he gained the license to finally be a Trekking Guide.</p>\r\n<p>Mr. Sumba met a young mountaineer, our second founder, Mr. Ang Rita Sherpa with whom he shared mutual passion of exploring and adventure. They were friends and room-mate for many years when they decided to combine their individual interests, experiences and expertise of more than 40 years on both trekking and expedition to form a travel company called High Country Trekking and Expedition.</p>', '1089653071_1553768259.jpg', 'published', '2019-03-28 03:26:48', '2019-09-18 10:12:11'),
(4, 'Our Mission', 'our-mission', '<p>We create trips that perfectly caters to our clients needs, requirements and preferences. Your safety is our top priority. Focusing on forming a long term relationship with our clients, we aspire to be reliable and trustworthy so we can send you off happy and satisfied. Perfectly custom made trips.</p>', '921099874_1569569618.png', 'published', '2019-09-18 10:32:44', '2019-09-27 01:48:38'),
(5, 'Know Before You Come', 'know-before-you-come', '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>', 'noimage.jpg', 'published', '2019-09-21 22:35:19', '2019-09-21 22:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` bigint(20) NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `altitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `place_type` int(10) UNSIGNED NOT NULL,
  `place_type_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `name`, `slug`, `country_id`, `city_id`, `altitude`, `description`, `image`, `status`, `created_at`, `updated_at`, `place_type`, `place_type_id`) VALUES
(2, 'Kathmandu Durbar Square', 'kathmandu-durbar-square', 2, 2, '1245', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p>\r\n<p>&nbsp;</p>', NULL, NULL, '2019-10-03 04:20:35', '2019-10-03 04:20:35', 0, 0),
(3, 'Everest base Camp Trek', 'everest-base-camp-trek', 2, 2, '1245', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, NULL, '2019-10-03 04:22:58', '2019-10-03 04:38:43', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `placetype`
--

CREATE TABLE `placetype` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `placetype`
--

INSERT INTO `placetype` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Heritage Site', 'published', '2019-10-03 04:19:56', '2019-10-03 04:19:56'),
(3, 'Conservation Area', 'published', '2019-10-03 04:20:47', '2019-10-03 04:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `country_id`, `name`, `created_at`, `updated_at`, `slug`, `status`, `latitude`, `longitude`) VALUES
(2, 2, 'Everest Region', '2018-10-16 09:52:38', '2019-04-24 04:20:57', 'everest-region', 'published', '27.9881', '86.9250'),
(3, 2, 'Annapurna Region', '2018-12-13 00:07:25', '2019-04-24 04:19:29', 'annapurna-region', 'published', '28.5300', '83.8780'),
(4, 2, 'Dhaulagiri Region', '2019-02-11 22:12:05', '2019-02-11 22:12:12', 'dhaulagiri-region', 'published', '22.12', '123.20'),
(5, 2, 'Upper Mustang', '2019-02-11 22:12:25', '2019-02-11 22:12:25', 'upper-mustang', 'published', '22.14', '22.14'),
(6, 2, 'Lower Mustang', '2019-02-11 22:12:40', '2019-04-24 04:16:08', 'lower-mustang', 'published', '28.9985', '83.8473');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isHomePage` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `image`, `isHomePage`, `created_at`, `updated_at`, `description`) VALUES
(1, 'Planning Leads to Smooth & Efficient Travel', '1214187837_1569569215.png', 1, '2019-09-21 06:33:39', '2019-09-27 01:41:55', '<p class=\"Body\">As a service oriented company &amp; consultant, we prepare trips for our clients based on these four stages.</p>\r\n<p class=\"Body\">We get up close and personal with our clients to organise their perfect trips.&nbsp; An interaction likes this sets a bond of trusts between us and our clients as it invokes involvement from our clients during the whole planning process</p>'),
(2, 'What We Do', 'noimage.jpg', 0, '2019-09-21 09:08:54', '2019-09-21 09:09:06', '<p>We are a specialist in travel, based on our extensive personal experience of more than 40 year</p>'),
(3, 'Discovery Session', '362503620_1569569352.png', 0, '2019-09-21 09:28:31', '2019-09-27 01:44:12', '<p>In this discovery phase we get to know our clients better. Our session starts with asking few questions about their traveling experience, duration and budget.</p>'),
(4, 'Planning Session', '1400341599_1569569359.png', 0, '2019-09-21 09:29:26', '2019-09-27 01:44:19', '<p>Our requirement gathering team will sit down to analyze the clients know preferences and needs and prepare suitable itineraries.</p>'),
(5, 'Review Session', '1364221508_1569569367.png', 0, '2019-09-21 09:35:54', '2019-09-27 01:44:27', '<p>After the itineraries have been made, we present the most likely options to the clients. We edit them out and add some more as per the requirement of the clients.</p>'),
(6, 'Execution Session', '295206819_1569569376.png', 0, '2019-09-21 09:36:55', '2019-09-27 01:44:36', '<p>Once the client agrees on an itinerary, we confirm the trip. Then, make necessary arrangements to book everything by ordering airline tickets, making hotel reservations and obtaining trekking resources.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

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
  `whatsapp` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `altlogo`, `sitename`, `address`, `phonenumber`, `landline`, `email`, `facebook`, `twitter`, `instagram`, `youtube`, `videowebm`, `videomp`, `videoogg`, `created_at`, `updated_at`, `promo_video`, `promovideo`, `tripsorganized`, `numofclients`, `whatsapp`) VALUES
(1, '1991117552_1568350654.png', '80591775_1568350654.png', 'High Country Trekking', '<p>P.O.Box 3124, Naxal-5</p>\r\n<p>Kathmandu, Nepal</p>', '9803676858', '014481813', 'hcountry@mail.com.np', 'highcountrytrekandexped', NULL, 'highcountrytrekking', 'highcountrytrek', '1804535701_1548487594.webm', '232367528_1548487594.mp4', NULL, NULL, '2020-05-11 06:34:18', '', 'ut-U-4m42aQ', '123K', '123K', 9779803676858);

-- --------------------------------------------------------

--
-- Table structure for table `social_welfare`
--

CREATE TABLE `social_welfare` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `altitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sponsor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `created_at`, `updated_at`, `designation`, `image`) VALUES
(1, 'Kamlesh Shrestha', '2019-09-11 18:15:00', '2019-09-21 02:11:33', 'Co-Founder', '86100117_1569052593.png'),
(3, 'Tshering Mingma Sherpa', '2019-09-21 01:38:50', '2019-09-21 02:11:28', 'Chairman', '1808834192_1569052588.png'),
(4, 'Jigmee Sherpa', '2019-09-21 01:39:09', '2019-09-21 02:11:20', 'General Manager', '2070562427_1569052580.png'),
(5, 'Ang Rita Sherpa', '2019-09-21 01:39:36', '2019-09-21 02:11:12', 'Safety Expert', '1753961896_1569052572.png');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `video` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `client_name`, `client_location`, `client_message`, `status`, `created_at`, `updated_at`, `video`) VALUES
(6, 'Kamlesh Shrestha', 'England', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'published', '2019-09-18 04:06:30', '2019-09-18 04:06:30', 'Bqx9uUxfplw'),
(7, 'Subekhya Kathayat', 'United States', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'published', '2019-09-18 04:09:06', '2019-09-18 04:09:06', 'tUwGHpWjl9A'),
(8, 'Tshering Mingma Sherpa', 'Australia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'published', '2019-09-18 04:09:30', '2019-09-18 04:09:30', 'pyguyyToEJY');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(10) UNSIGNED NOT NULL,
  `destination_id` int(10) UNSIGNED NOT NULL,
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
  `firsttime` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `destination_id`, `date`, `season`, `duration`, `adults`, `children`, `hotel_class`, `interest`, `title`, `full_name`, `email`, `phone`, `nationality`, `contact_way`, `find_us`, `created_at`, `updated_at`, `fitnesslevel`, `specialattn`, `firsttime`) VALUES
(2, 2, '2021-02-02', 'Summer', '21 Days - 28 Days', 1, 2, '4 Star Hotel', 'asd', 'Mr.', 'Daddu Paji', 'daddupaju@gmail.com', '9840340308', 'Nepal', 'Email', 'Recommended by friends', '2020-05-02 01:06:47', '2020-05-02 01:06:47', 'fit', 'medical-condition', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kamlesh Shrestha', 'eidia313@gmail.com', NULL, '$2y$10$ZrdkyBRsKNrLrsQ0ItFxWeHqSluT5NyaHhoaYlLqi8m.zO69eXqsW', 'WmrQr3iR4jt0cwHiJsKqnwUynHowWJbQVqnSM2yJdQI0LONhKKFbqAdNxiWp', NULL, NULL),
(2, 'Bijay Chaudhary', 'bijay.res@gmail.com', NULL, '$2y$10$DglC3noevMH79od4JM.z..s7cPWwUABomjgHLdG35Lu1ZaKaemG2S', '28tBjMVoaIbcnr5dgNcZoDsXXEfhv8ZlhqUCmdHn6UcVENzzK0xrkHfsxDk2', '2019-03-27 02:26:08', '2019-03-27 02:26:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_trips`
--
ALTER TABLE `activity_trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_trips_activity_id_foreign` (`activity_id`),
  ADD KEY `activity_trips_trip_id_foreign` (`trip_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogcategory`
--
ALTER TABLE `blogcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_cat_rel`
--
ALTER TABLE `blog_cat_rel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_cat_rel_blog_id_foreign` (`blog_id`),
  ADD KEY `blog_cat_rel_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD UNIQUE KEY `cache_key_unique` (`key`);

--
-- Indexes for table `ccountry`
--
ALTER TABLE `ccountry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checklistcategory_checklistgroup`
--
ALTER TABLE `checklistcategory_checklistgroup`
  ADD PRIMARY KEY (`group_id`,`category_id`),
  ADD KEY `checklistcategory_checklistgroup_category_id_foreign` (`category_id`);

--
-- Indexes for table `check_list_categories`
--
ALTER TABLE `check_list_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `check_list_categories_name_unique` (`name`);

--
-- Indexes for table `check_list_groups`
--
ALTER TABLE `check_list_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `check_list_groups_name_unique` (`name`),
  ADD UNIQUE KEY `check_list_groups_slug_unique` (`slug`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_country_id_foreign` (`country_id`);

--
-- Indexes for table `clist`
--
ALTER TABLE `clist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clist_c_id_foreign` (`c_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `difficulty`
--
ALTER TABLE `difficulty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `equipment_name_unique` (`name`),
  ADD KEY `equipment_category_id_foreign` (`category_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_country_id_foreign` (`country_id`),
  ADD KEY `package_region_id_foreign` (`region_id`),
  ADD KEY `package_activity_id_foreign` (`activity_id`),
  ADD KEY `package_difficulty_id_foreign` (`difficulty_id`),
  ADD KEY `checklist_group_id` (`checklist_group_id`);

--
-- Indexes for table `package_galleries`
--
ALTER TABLE `package_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_galleries_package_id_foreign` (`package_id`);

--
-- Indexes for table `package_image`
--
ALTER TABLE `package_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_image_package_id_foreign` (`package_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `places_name_unique` (`name`),
  ADD UNIQUE KEY `places_slug_unique` (`slug`),
  ADD KEY `places_country_id_foreign` (`country_id`),
  ADD KEY `places_city_id_foreign` (`city_id`);

--
-- Indexes for table `placetype`
--
ALTER TABLE `placetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_country_id_foreign` (`country_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_welfare`
--
ALTER TABLE `social_welfare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trips_destination_id_foreign` (`destination_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `activity_trips`
--
ALTER TABLE `activity_trips`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogcategory`
--
ALTER TABLE `blogcategory`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_cat_rel`
--
ALTER TABLE `blog_cat_rel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ccountry`
--
ALTER TABLE `ccountry`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `check_list_categories`
--
ALTER TABLE `check_list_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `check_list_groups`
--
ALTER TABLE `check_list_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clist`
--
ALTER TABLE `clist`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `difficulty`
--
ALTER TABLE `difficulty`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `package_galleries`
--
ALTER TABLE `package_galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_image`
--
ALTER TABLE `package_image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `placetype`
--
ALTER TABLE `placetype`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `social_welfare`
--
ALTER TABLE `social_welfare`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_trips`
--
ALTER TABLE `activity_trips`
  ADD CONSTRAINT `activity_trips_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `activity_trips_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_cat_rel`
--
ALTER TABLE `blog_cat_rel`
  ADD CONSTRAINT `blog_cat_rel_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`),
  ADD CONSTRAINT `blog_cat_rel_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `blogcategory` (`id`);

--
-- Constraints for table `checklistcategory_checklistgroup`
--
ALTER TABLE `checklistcategory_checklistgroup`
  ADD CONSTRAINT `checklistcategory_checklistgroup_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `check_list_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `checklistcategory_checklistgroup_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `check_list_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`);

--
-- Constraints for table `clist`
--
ALTER TABLE `clist`
  ADD CONSTRAINT `clist_c_id_foreign` FOREIGN KEY (`c_id`) REFERENCES `ccountry` (`id`);

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equipment_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `check_list_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `package_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`),
  ADD CONSTRAINT `package_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`),
  ADD CONSTRAINT `package_difficulty_id_foreign` FOREIGN KEY (`difficulty_id`) REFERENCES `difficulty` (`id`),
  ADD CONSTRAINT `package_ibfk_1` FOREIGN KEY (`checklist_group_id`) REFERENCES `check_list_groups` (`id`),
  ADD CONSTRAINT `package_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`);

--
-- Constraints for table `package_galleries`
--
ALTER TABLE `package_galleries`
  ADD CONSTRAINT `package_galleries_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `package` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package_image`
--
ALTER TABLE `package_image`
  ADD CONSTRAINT `package_image_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `package` (`id`);

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `places_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`);

--
-- Constraints for table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `region_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`);

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `country` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
