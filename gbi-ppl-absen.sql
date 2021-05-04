-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2021 at 08:27 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gbi-ppl-absen`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensis`
--

CREATE TABLE `absensis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `children_id` int(11) NOT NULL,
  `pembimbing_id` int(11) NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sunday_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absensis`
--

INSERT INTO `absensis` (`id`, `children_id`, `pembimbing_id`, `video`, `image`, `sunday_date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(12, 6, 2, 'yes', 'yes', '2 Mei 2021', NULL, '2021-05-02 09:00:12', '2021-05-02 09:00:12'),
(13, 7, 2, 'yes', 'yes', '2 Mei 2021', NULL, '2021-05-02 10:00:29', '2021-05-02 10:00:29'),
(14, 64, 6, 'yes', 'yes', '2 Mei 2021', NULL, '2021-05-02 10:19:13', '2021-05-02 10:19:13'),
(15, 26, 10, 'yes', 'yes', '2 Mei 2021', NULL, '2021-05-02 10:21:54', '2021-05-02 10:21:54'),
(16, 56, 4, 'yes', 'no', '2 Mei 2021', NULL, '2021-05-02 10:34:35', '2021-05-02 10:34:35'),
(17, 17, 8, 'yes', 'yes', '2 Mei 2021', NULL, '2021-05-02 10:37:31', '2021-05-02 10:37:31'),
(18, 53, 1, 'yes', 'no', '2 Mei 2021', NULL, '2021-05-02 10:41:06', '2021-05-02 10:41:06'),
(19, 48, 3, 'yes', 'yes', '2 Mei 2021', NULL, '2021-05-02 10:43:06', '2021-05-02 10:43:06'),
(20, 59, 4, 'yes', 'yes', '2 Mei 2021', NULL, '2021-05-02 10:45:36', '2021-05-02 10:45:36');

-- --------------------------------------------------------

--
-- Table structure for table `childrens`
--

CREATE TABLE `childrens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pembimbing` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `childrens`
--

INSERT INTO `childrens` (`id`, `name`, `code`, `id_pembimbing`, `role`, `deleted_at`, `created_at`, `updated_at`) VALUES
(6, 'Rahel rebeca julliety', 'CLRL', 2, 'Madya', NULL, '2021-05-02 07:34:36', '2021-05-02 07:34:36'),
(7, 'Givellina Sionita Manik', 'CLGA', 2, 'Madya', NULL, '2021-05-02 08:14:14', '2021-05-02 08:14:14'),
(8, 'Givton', 'CLGN', 2, 'Madya', NULL, '2021-05-02 08:14:36', '2021-05-02 08:14:36'),
(9, 'Steven Riza Gunawan (Wen\")', 'CLSN', 2, 'Madya', NULL, '2021-05-02 08:15:03', '2021-05-02 08:15:03'),
(10, 'Cleino Darrel', 'CLCO', 2, 'Madya', NULL, '2021-05-02 08:15:21', '2021-05-02 08:15:21'),
(11, 'Florence Yael', 'CLFE', 2, 'Madya', NULL, '2021-05-02 08:15:38', '2021-05-02 08:15:38'),
(12, 'Yoel Areli', 'CLYL', 2, 'Madya', NULL, '2021-05-02 08:15:56', '2021-05-02 08:15:56'),
(13, 'Christian Natanael William', 'CLCN', 2, 'Madya', NULL, '2021-05-02 08:16:14', '2021-05-02 08:16:14'),
(14, 'Aurell Evangeline', 'CLAL', 2, 'Madya', NULL, '2021-05-02 08:16:42', '2021-05-02 08:16:42'),
(15, 'Bernice Celine Kawiharja', 'DOBE', 8, 'Madya', NULL, '2021-05-02 08:17:24', '2021-05-02 08:17:24'),
(16, 'Mike matthew', 'DOME', 8, 'Madya', NULL, '2021-05-02 08:17:45', '2021-05-02 08:17:45'),
(17, 'Asyer mosea ir.', 'DOAR', 8, 'Madya', NULL, '2021-05-02 08:17:59', '2021-05-02 08:17:59'),
(18, 'Choky Fabregas Sigalingging', 'DOCY', 8, 'Madya', NULL, '2021-05-02 08:18:16', '2021-05-02 08:18:16'),
(19, 'Melky Sedex Simatupang', 'DOMY', 8, 'Madya', NULL, '2021-05-02 08:18:35', '2021-05-02 08:18:35'),
(20, 'Jesika Simbolon', 'FEJA', 9, 'Madya', NULL, '2021-05-02 08:19:05', '2021-05-02 08:19:05'),
(21, 'Merliana Andini Putri', 'FEMA', 9, 'Madya', NULL, '2021-05-02 08:19:22', '2021-05-02 08:19:22'),
(22, 'Stevo salomo', 'FESO', 9, 'Madya', NULL, '2021-05-02 08:19:43', '2021-05-02 08:19:43'),
(23, 'Salwa F', 'RISA', 10, 'Madya', NULL, '2021-05-02 08:20:04', '2021-05-02 08:20:04'),
(24, 'Raffael septiano pasaribu', 'RIRL', 10, 'Madya', NULL, '2021-05-02 08:20:26', '2021-05-02 08:20:26'),
(25, 'Dikia Pratama Manurung', 'RIDA', 10, 'Madya', NULL, '2021-05-02 08:21:04', '2021-05-02 08:21:04'),
(26, 'Zefanya Nakaya Venezuela M', 'RIZA', 10, 'Madya', NULL, '2021-05-02 08:21:20', '2021-05-02 08:21:20'),
(27, 'Keisha Anabella', 'RIKA', 10, 'Madya', NULL, '2021-05-02 08:21:33', '2021-05-02 08:21:33'),
(28, 'Giraldy romora.sinaga', 'RIGY', 10, 'Madya', NULL, '2021-05-02 08:21:48', '2021-05-02 08:21:48'),
(29, 'Mey lewisky Monika', 'ANGMY', 11, 'Madya', NULL, '2021-05-02 08:22:08', '2021-05-02 08:22:08'),
(30, 'Maria Angelina Gultom', 'ANGMA', 11, 'Madya', NULL, '2021-05-02 08:22:26', '2021-05-02 08:22:26'),
(31, 'irene amazia', 'ANGIE', 11, 'Madya', NULL, '2021-05-02 08:22:38', '2021-05-02 08:22:38'),
(32, 'irene amazia', 'ANGIE', 11, 'Madya', NULL, '2021-05-02 08:22:38', '2021-05-02 08:22:38'),
(33, 'Claire Yaelle', 'ANGCE', 11, 'Madya', NULL, '2021-05-02 08:22:54', '2021-05-02 08:22:54'),
(34, 'Jesicca Anastasya Santoso', 'ANGJA', 11, 'Madya', NULL, '2021-05-02 08:23:06', '2021-05-02 08:23:06'),
(35, 'Gracia Liz Abigail Laowo', 'ANGGA', 11, 'Madya', NULL, '2021-05-02 08:23:20', '2021-05-02 08:23:20'),
(36, 'Candice Gracia', 'ANGCE', 11, 'Madya', NULL, '2021-05-02 08:23:31', '2021-05-02 08:23:31'),
(37, 'Messy Tambun', 'ANGMY', 11, 'Madya', NULL, '2021-05-02 08:23:45', '2021-05-02 08:23:45'),
(38, 'Jhonyndo Michael Sianturi', 'ANJO', 12, 'Madya', NULL, '2021-05-02 08:24:08', '2021-05-02 08:24:08'),
(39, 'Sujono.s', 'ANSO', 12, 'Madya', NULL, '2021-05-02 08:24:21', '2021-05-02 08:24:21'),
(40, 'El RADO GOKLAS MANURUNG', 'ANEL', 12, 'Madya', NULL, '2021-05-02 08:24:35', '2021-05-02 08:24:35'),
(41, 'Ezequiel Julistian', 'ANELJ', 12, 'Madya', NULL, '2021-05-02 08:24:49', '2021-05-02 08:24:49'),
(42, 'Ethan Christopher Setiawan', 'ANEN', 12, 'Madya', NULL, '2021-05-02 08:25:02', '2021-05-02 08:25:02'),
(43, 'Gabriel Allan', 'ANGL', 12, 'Madya', NULL, '2021-05-02 08:25:17', '2021-05-02 08:25:17'),
(44, 'Lerroy', 'ANLY', 12, 'Madya', NULL, '2021-05-02 08:25:28', '2021-05-02 08:25:28'),
(45, 'Edwin rafael simanjuntak', 'THENR', 3, 'Pratama', NULL, '2021-05-02 08:26:03', '2021-05-02 08:26:03'),
(46, 'Angeline kimie setiawan', 'THAE', 3, 'Pratama', NULL, '2021-05-02 08:26:20', '2021-05-02 08:26:20'),
(47, 'Mavin Christian Junius', 'THMN', 3, 'Pratama', NULL, '2021-05-02 08:26:37', '2021-05-02 08:26:37'),
(48, 'Nicholas Yohanes', 'THNS', 3, 'Pratama', NULL, '2021-05-02 08:26:54', '2021-05-02 08:26:54'),
(49, 'Efelien Sharon', 'THEN', 3, 'Pratama', NULL, '2021-05-02 08:27:09', '2021-05-02 08:27:09'),
(50, 'Sandrica Laury Casimira Samosir', 'THSA', 3, 'Pratama', NULL, '2021-05-02 08:27:23', '2021-05-02 08:27:23'),
(51, 'Rafael Hosea Berlan', 'ARRL', 1, 'Pratama', NULL, '2021-05-02 08:27:52', '2021-05-02 08:27:52'),
(52, 'Jovan Daud Wu Chandra', 'ARJN', 1, 'Pratama', NULL, '2021-05-02 08:28:06', '2021-05-02 08:28:06'),
(53, 'Shandy putra malau', 'ARSY', 1, 'Pratama', NULL, '2021-05-02 08:28:19', '2021-05-02 08:28:19'),
(54, 'Jacob', 'ARJB', 1, 'Pratama', NULL, '2021-05-02 08:28:30', '2021-05-02 08:28:30'),
(55, 'Jadden', 'ARJDN', 1, 'Pratama', NULL, '2021-05-02 08:28:43', '2021-05-02 08:28:43'),
(56, 'Samuel Ardiyanto', 'HRSL', 4, 'Pratama', NULL, '2021-05-02 08:29:06', '2021-05-02 08:29:06'),
(57, 'Novshan Situmorang', 'HRNS', 4, 'Pratama', NULL, '2021-05-02 08:29:18', '2021-05-02 08:29:18'),
(58, 'Gisella Mariska Manurung', 'HRGA', 4, 'Pratama', NULL, '2021-05-02 08:29:38', '2021-05-02 08:29:38'),
(59, 'Thesalonika Nobel', 'HRTA', 4, 'Pratama', NULL, '2021-05-02 08:29:52', '2021-05-02 08:29:52'),
(60, 'William', 'NIWM', 5, 'Pratama', NULL, '2021-05-02 08:30:25', '2021-05-02 08:30:25'),
(61, 'Alvin Reynard Alvaro', 'LEAN', 6, 'Pratama', NULL, '2021-05-02 08:30:41', '2021-05-02 08:30:41'),
(62, 'Andreas Manurung', 'LEAS', 6, 'Pratama', NULL, '2021-05-02 08:31:04', '2021-05-02 08:31:04'),
(63, 'Chaxa Dinofirwan Putra Damanik', 'LECA', 6, 'Pratama', NULL, '2021-05-02 08:31:17', '2021-05-02 08:31:17'),
(64, 'Darren Faith Gunawan', 'LEDN', 6, 'Pratama', NULL, '2021-05-02 08:31:31', '2021-05-02 08:31:31'),
(65, 'Gabriel Simbolon', 'LEGL', 6, 'Pratama', NULL, '2021-05-02 08:31:43', '2021-05-02 08:31:43'),
(66, 'Gideon sinar saragih', 'LEGN', 6, 'Pratama', NULL, '2021-05-02 08:31:55', '2021-05-02 08:31:55'),
(67, 'Jose Calderon', 'LEJE', 6, 'Pratama', NULL, '2021-05-02 08:32:12', '2021-05-02 08:32:12'),
(68, 'Obay Maykel Tambun', 'LEOY', 6, 'Pratama', NULL, '2021-05-02 08:32:26', '2021-05-02 08:32:26'),
(69, 'Russell Christian', 'LERL', 6, 'Pratama', NULL, '2021-05-02 08:32:38', '2021-05-02 08:32:38'),
(70, 'Samuel jonatan siregar', 'PUSL', 7, 'Pratama', NULL, '2021-05-02 08:33:07', '2021-05-02 08:33:07'),
(71, 'Cheryl Charissa Adelyn', 'PUCL', 7, 'Pratama', NULL, '2021-05-02 08:33:20', '2021-05-02 08:33:20'),
(72, 'Justin Julio', 'PUJN', 7, 'Pratama', NULL, '2021-05-02 08:33:33', '2021-05-02 08:33:33'),
(73, 'Adeline Neisha Gracella', 'PUAE', 7, 'Pratama', NULL, '2021-05-02 08:33:54', '2021-05-02 08:33:54'),
(74, 'Iren Zevanya', 'PUIN', 7, 'Pratama', NULL, '2021-05-02 08:34:06', '2021-05-02 08:34:06'),
(75, 'Janice', 'BUJN', 14, 'Pratama', NULL, '2021-05-02 08:34:59', '2021-05-02 08:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `google_api_tokens`
--

CREATE TABLE `google_api_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `refresh_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `google_api_tokens`
--

INSERT INTO `google_api_tokens` (`id`, `refresh_token`, `access_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(11, '1//04uEZTWeCRU5GCgYIARAAGAQSNwF-L9IrkrQ94E5BncR1JOU86uIrmEHF_lPiCDoS-Y4fc7Sh46PixBh_QKeoQyNqBRChp9n0z8Y', 'ya29.a0AfH6SMCFdrAMavc8HxF8bio2Lg7J10Py1Dv7ypIZ6zNM6-VlJpw6WmMNj05AP6TZ-j03rbGBABBdNRxQDodCamS4Xgkqo-7FXQjdg2kB9DYitYym0SrErVdTE8XUPWbhus3IoSPC0bcaYQlpvUcS8lsjG8_m', NULL, '2021-05-02 12:30:50', '2021-05-02 12:30:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_05_21_300000_create_team_invitations_table', 1),
(9, '2021_05_01_010012_create_sessions_table', 1),
(10, '2021_05_01_024656_create_childrens_table', 1),
(11, '2021_05_01_024923_create_absensis_table', 1),
(12, '2021_05_01_025048_create_pembimbings_table', 1),
(13, '2021_05_01_035048_create_google_api_tokens_table', 2),
(14, '2021_05_01_135844_create_absensis_table', 3),
(15, '2021_05_01_135917_create_childrens_table', 3),
(16, '2021_05_01_135938_create_pembimbings_table', 3),
(17, '2021_05_01_140338_create_google_api_tokens_table', 3),
(18, '2021_05_01_154626_create_absensis_table', 4),
(19, '2021_05_01_154643_create_childrens_table', 4),
(20, '2021_05_01_154707_create_google_api_tokens_table', 4),
(21, '2021_05_01_154724_create_pembimbings_table', 4),
(22, '2021_05_01_192526_add_prole_to_childrens', 5),
(23, '2021_05_02_135359_update_token', 6),
(24, '2021_05_02_185531_delete_users_some_column', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembimbings`
--

CREATE TABLE `pembimbings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembimbings`
--

INSERT INTO `pembimbings` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Arna', NULL, '2021-05-01 08:54:18', '2021-05-01 08:54:18'),
(2, 'Claresta', NULL, '2021-05-01 09:01:16', '2021-05-01 15:45:26'),
(3, 'Theola', NULL, '2021-05-01 15:37:19', '2021-05-01 15:47:53'),
(4, 'Hariyanto', NULL, '2021-05-01 15:43:11', '2021-05-01 15:48:11'),
(5, 'Nika', NULL, '2021-05-01 15:48:28', '2021-05-01 15:48:28'),
(6, 'Levina', NULL, '2021-05-01 15:48:41', '2021-05-01 15:48:41'),
(7, 'Putri', NULL, '2021-05-01 15:49:01', '2021-05-01 15:49:01'),
(8, 'Dominique', NULL, '2021-05-01 15:49:18', '2021-05-01 15:49:18'),
(9, 'Felani', NULL, '2021-05-01 15:49:31', '2021-05-01 15:49:31'),
(10, 'Ribka', NULL, '2021-05-01 15:49:46', '2021-05-01 15:49:46'),
(11, 'Angel', NULL, '2021-05-01 15:49:58', '2021-05-01 15:49:58'),
(12, 'Andreas', NULL, '2021-05-01 15:50:11', '2021-05-01 15:50:11'),
(13, 'test', '2021-05-01 15:51:57', '2021-05-01 15:51:54', '2021-05-01 15:51:57'),
(14, 'Bunga', NULL, '2021-05-02 08:34:43', '2021-05-02 08:34:43'),
(15, 'Nathan', '2021-05-02 12:32:00', '2021-05-02 12:31:47', '2021-05-02 12:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'drScripts', 'f3004fed8bf7dfdcd9dd18ea17359896461532ec8feb913582b375eeb49ab418', '[\"read\",\"update\",\"delete\",\"create\"]', '2021-05-02 12:34:52', '2021-04-30 20:12:39', '2021-05-02 12:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('DwlUXkXgQhhe7nkILAyBDth9hxX6k5a6K4ekRLP2', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiak44NkdRTXNGWDJuWTJIZU9kV2FqUE9lZkxPVm5hNHh6MEJIMFNlSSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9nYmktcHBsLWFic2VuLnRlc3QvZGFzaGJvYXJkL2Fic2Vuc2kiO31zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHFKOHFQVmF6eHQxOW5KZFFuU3pDbE9BTXBzUTFkN3NYb1hFcWFueGNRbWR5S3NuYS5tU2V5IjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRxSjhxUFZhenh0MTluSmRRblN6Q2xPQU1wc1ExZDdzWG9YRXFhbnhjUW1keUtzbmEubVNleSI7fQ==', 1619981113),
('yQPc8lTGWV45bXAUTyVTva1pZMUKZ7n5y3O9gqa4', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiMTZsOVdRb2t4RkVmZHFsYjZVVmloTmh5ZzJtbUFlMTFsZVlzYm1vaSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9nYmktcHBsLWFic2VuLnRlc3QvZGFzaGJvYXJkL2Fic2Vuc2kiO31zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHFKOHFQVmF6eHQxOW5KZFFuU3pDbE9BTXBzUTFkN3NYb1hFcWFueGNRbWR5S3NuYS5tU2V5IjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRxSjhxUFZhenh0MTluSmRRblN6Q2xPQU1wc1ExZDdzWG9YRXFhbnhjUW1keUtzbmEubVNleSI7fQ==', 1619984145);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 1, 'drScripts\'s Team', 1, '2021-04-30 20:06:50', '2021-04-30 20:06:50'),
(2, 2, 'Pembimbing\'s Team', 1, '2021-05-02 12:00:03', '2021-05-02 12:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_invitations`
--

INSERT INTO `team_invitations` (`id`, `team_id`, `email`, `role`, `created_at`, `updated_at`) VALUES
(1, 1, 'kidsministry.gbipplkopo@gmail.com', 'admin', '2021-05-02 12:02:02', '2021-05-02 12:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'drScripts', 'nathanael.vd@gmail.com', NULL, '$2y$10$qJ8qPVazxt19nJdQnSzClOAMpsQ1d7sXoXEqanxcQmdyKsna.mSey', NULL, NULL, NULL, 1, NULL, '2021-04-30 20:06:50', '2021-04-30 20:08:46'),
(2, 'Pembimbing', 'kidsministry.gbipplkopo@gmail.com', NULL, '$2y$10$FYklNZqlgci/aGCcUCJRv.ov/SSRfVKInPKEmEWMvCHxhlFiqAHgW', NULL, NULL, NULL, 2, NULL, '2021-05-02 12:00:03', '2021-05-02 12:00:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensis`
--
ALTER TABLE `absensis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `childrens`
--
ALTER TABLE `childrens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `google_api_tokens`
--
ALTER TABLE `google_api_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembimbings`
--
ALTER TABLE `pembimbings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

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
-- AUTO_INCREMENT for table `absensis`
--
ALTER TABLE `absensis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `childrens`
--
ALTER TABLE `childrens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `google_api_tokens`
--
ALTER TABLE `google_api_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pembimbings`
--
ALTER TABLE `pembimbings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
