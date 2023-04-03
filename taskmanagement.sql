-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2023 at 01:11 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_join` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `status`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `dob`, `date_join`, `designation`, `department`, `gender`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, '1', 'superadmin', 'superadmin@gmail.com', NULL, '$2y$10$L1K49j6YvGiR7Is8iAn.5uygmjnRzcv8rUIxbLNtWhAuWuYmcbWI2', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, '2022-09-01 01:58:04', '2022-09-01 01:58:04'),
(4, '1', 'Edited admin', 'adminedit@gmail.com', NULL, '$2y$10$NEFQ/Mc9DNTYsrFa8e9QSOcUq8u9rNKufe0ArYYUfkk9kW8njFUPW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-01 06:26:49', '2022-10-31 00:31:23'),
(5, '1', 'Subir Joshi', 'admin2@gmail.com', NULL, '$2y$10$ef4AECCMsJbwJ9g0//q37.LulOrm/DmffWLaurB0rDMgJpVASVA2a', '4012345', '23/03/2023', '22/03/2023', 'Sales Executive', 'Marketing', 'male', '1679571159.png', NULL, '2022-09-02 03:12:43', '2023-03-23 05:47:39'),
(6, '1', 'Admin 3', 'admin3@gmail.com', NULL, '$2y$10$i/2OsskvvhBnCzX1zkJ1X.eFYZZtyyF4.55Wmz2zHNZc9DXNUp.xu', '9846578901', '15/03/2023', '02/03/2023', 'Android Developer', 'IT Management', 'male', NULL, NULL, '2022-09-02 03:13:09', '2023-03-23 05:31:52'),
(7, '1', 'Moderator 1', 'moderator1@gmail.com', NULL, '$2y$10$/oV2fKjMQtfJD2wIECegGuF5jZevaHMF7GPFQ90XqNU4H0L5vjxsG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-02 05:21:39', '2022-09-02 05:21:39'),
(8, '1', 'Moderator 2', 'moderator2@gmail.com', NULL, '$2y$10$nVUgoIDKjaQAhTAQZRdrZO0cSnHRc6Bh6xwnVhwwQsDRoPY0IMDKq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-02 05:22:03', '2022-09-02 05:22:03'),
(9, '1', 'Editor 1', 'editor1@gmail.com', NULL, '$2y$10$RT8i/WvXLQeDKD8IDlnuRuqiDHBDkPkuOUVBF4q4TPl1K1Wvwk2Be', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-02 05:22:52', '2022-09-02 05:22:52'),
(10, '1', 'Editor 2', 'editor2@gmail.com', NULL, '$2y$10$bHe6QsMe6meIsdU6w/lOauG7BJHo4GHmXh9hMWLihiOX4afJ79Xj2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-02 05:23:13', '2022-09-02 05:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `admin_bank_details`
--

CREATE TABLE `admin_bank_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `acc_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_bank_details`
--

INSERT INTO `admin_bank_details` (`id`, `admin_id`, `acc_name`, `acc_num`, `bank`, `branch`, `pan_num`, `created_at`, `updated_at`) VALUES
(1, 5, 'Subir Joshi', '123456789', 'Nepal Investment Mega Bank', 'Newroad', '987654321', '2023-03-23 06:09:32', '2023-03-23 06:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `admin_documents`
--

CREATE TABLE `admin_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_documents`
--

INSERT INTO `admin_documents` (`id`, `admin_id`, `title`, `file`, `created_at`, `updated_at`) VALUES
(4, 5, 'CV', '1679575089.pdf', '2023-03-23 06:53:09', '2023-03-23 06:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `admin_has_tasks`
--

CREATE TABLE `admin_has_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `remark` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_has_tasks`
--

INSERT INTO `admin_has_tasks` (`id`, `admin_id`, `task_id`, `remark`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 1, NULL, 1, '2022-09-02 03:58:15', '2022-09-02 05:00:36'),
(2, 6, 1, '<p>This task is good</p>', 1, '2022-09-02 03:58:15', '2022-09-02 05:08:24'),
(3, 9, 2, NULL, 0, '2022-09-02 07:03:32', '2022-09-02 07:03:32'),
(4, 10, 2, '<p>this is nice task</p>', 0, '2022-09-02 07:03:32', '2022-09-02 07:07:51'),
(5, 7, 2, NULL, 1, '2022-09-02 07:03:32', '2022-09-02 07:06:15'),
(6, 5, 3, NULL, 1, '2022-09-04 01:57:16', '2022-09-04 02:08:54'),
(7, 6, 3, NULL, 1, '2022-09-04 01:57:16', '2022-09-04 02:39:22'),
(8, 9, 4, NULL, 1, '2022-09-04 02:35:35', '2022-09-04 02:37:23'),
(9, 10, 5, NULL, 0, '2022-09-04 02:46:39', '2022-09-04 02:46:39'),
(10, 8, 6, NULL, 0, '2022-09-04 03:00:38', '2022-09-07 10:43:03'),
(11, 8, 7, NULL, 1, '2022-09-04 03:37:49', '2022-09-04 03:44:24'),
(12, 9, 7, NULL, 0, '2022-09-04 03:37:49', '2022-09-04 03:37:49'),
(13, 10, 7, NULL, 0, '2022-09-04 03:37:49', '2022-09-04 03:37:49'),
(14, 7, 8, NULL, 1, '2022-09-04 05:28:34', '2022-09-04 05:31:22'),
(15, 8, 9, NULL, 0, '2022-09-07 10:43:46', '2022-09-07 10:43:57'),
(16, 4, 11, NULL, 1, '2022-10-30 23:54:31', '2022-10-31 00:32:27'),
(17, 5, 11, NULL, 0, '2022-10-30 23:54:31', '2022-10-30 23:54:31'),
(18, 6, 11, NULL, 0, '2022-10-30 23:54:31', '2022-10-30 23:54:31'),
(19, 4, 12, NULL, 0, '2022-10-31 04:28:25', '2022-10-31 04:28:25'),
(20, 8, 13, NULL, 1, '2022-11-03 23:44:50', '2022-11-03 23:47:25'),
(21, 5, 14, NULL, 1, '2022-11-03 23:51:18', '2022-11-03 23:52:18'),
(22, 4, 15, NULL, 0, '2022-11-04 12:11:34', '2022-11-04 12:11:34'),
(23, 3, 16, NULL, 0, '2022-11-04 12:21:15', '2022-11-04 12:21:15');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `content_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-08-28 02:39:51', '2022-08-28 02:39:51'),
(3, 4, '2022-08-28 04:21:10', '2022-08-28 04:21:10'),
(7, 11, '2022-08-29 05:50:10', '2022-08-29 05:50:10'),
(9, 13, '2022-08-29 05:54:52', '2022-08-29 05:54:52'),
(10, 14, '2022-08-29 05:59:32', '2022-08-29 05:59:32'),
(11, 16, '2022-08-29 23:55:01', '2022-08-29 23:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `client_services`
--

CREATE TABLE `client_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `programming_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domain` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registered` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiring` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_services`
--

INSERT INTO `client_services` (`id`, `client_id`, `service`, `service_type`, `programming_type`, `domain`, `price`, `registered`, `expiring`, `status`, `created_at`, `updated_at`) VALUES
(2, '9', '1', '3', '1', 'www.infohubnepal.com', '12000', '24/03/2023', '23/03/2024', '1', '2023-03-24 08:17:59', '2023-03-24 09:08:41'),
(3, '9', '2', '0', '0', 'www.infohubnepal.com', '2000', '24/03/2023', '24/03/2024', '0', '2023-03-24 08:23:20', '2023-03-24 09:08:55'),
(4, '9', '3', '0', '0', 'www.infohubnepal.com', '8000', '24/03/2023', '24/03/2024', '1', '2023-03-24 08:23:51', '2023-03-24 09:09:15');

-- --------------------------------------------------------

--
-- Table structure for table `color_sizes`
--

CREATE TABLE `color_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `color_sizes`
--

INSERT INTO `color_sizes` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Red', 0, '2022-08-28 06:48:03', '2022-08-28 06:48:03'),
(3, 'XL', 1, '2022-08-28 06:55:58', '2022-08-28 06:55:58'),
(4, 'Blue', 0, '2022-08-28 23:30:41', '2022-08-28 23:30:41'),
(6, 'XXL', 1, '2022-08-29 00:12:34', '2022-08-29 00:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `title`, `description`, `cover_image`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'cashmere product', '<p>This is description</p>', 'http://localhost:8000/storage/photos/1/download (2).jpg', 'cashmere-product', '2022-08-28 02:39:51', '2022-08-30 01:31:29'),
(4, 'Cashmere shawl', '<p>Cashmere shwal description updated</p>', 'http://localhost:8000/storage/photos/1/download (7).jpg', 'Cashmere-shawl', '2022-08-28 04:21:10', '2022-08-30 01:27:18'),
(6, 'Cashmere Sweater', '<p>Cashmere sweater description</p>', 'http://localhost:8000/storage/photos/1/download (8).jpg', 'Cashmere-Sweater', '2022-08-28 04:42:24', '2022-08-29 23:58:35'),
(7, 'Embroidery Shwal', '<p>Good shwal embroidery</p>', 'http://localhost:8000/storage/photos/1/download (2).jpg', 'Embroidery-Shwal', '2022-08-28 05:28:50', '2022-08-29 23:58:21'),
(11, 'hk', '<p>khkl</p>', 'http://localhost:8000/storage/photos/1/chanel-cc-cashmere-shawl-64690_7_x.jpg', 'hk', '2022-08-29 05:50:10', '2022-08-29 05:50:10'),
(13, 'jh', '<p>kjhk</p>', 'http://localhost:8000/storage/photos/1/download (6).jpg', 'jh', '2022-08-29 05:54:52', '2022-08-29 05:54:52'),
(14, 'Nisi cum quibusdam s', '<p>kkjhkj</p>', 'http://localhost:8000/storage/photos/1/gjh.jpg', 'Est ratione laboris', '2022-08-29 05:59:32', '2022-08-29 06:01:18'),
(16, 'Tested edit', '<p>jkkj</p>', 'http://localhost:8000/storage/photos/1/download.jpg', 'Tested-edit', '2022-08-29 23:55:01', '2022-08-29 23:56:52');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fiscal_years`
--

CREATE TABLE `fiscal_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fiscal_years`
--

INSERT INTO `fiscal_years` (`id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, '2019-01-01', '2019-12-31', NULL, NULL),
(2, '2020-01-01', '2020-12-31', NULL, NULL),
(3, '2021-01-01', '2021-12-31', NULL, NULL),
(4, '2022-01-01', '2022-12-31', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `inquiry` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total` double(8,2) DEFAULT NULL,
  `discount` double(8,2) NOT NULL DEFAULT 0.00,
  `vat` double(8,2) NOT NULL DEFAULT 0.00,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_entry` date DEFAULT NULL,
  `remarks` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `user_id`, `total`, `discount`, `vat`, `invoice_no`, `date_of_entry`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 9718.00, 500.00, 1118.00, 'dev-50', NULL, 'Laptop, charger and keyboard', NULL, '2022-09-06 01:01:10', '2022-09-11 03:07:00'),
(4, 3, 3390.00, 600.00, 390.00, '812678', '2022-09-10', 'New updated with time', NULL, '2022-09-07 10:45:14', '2022-09-11 05:06:36'),
(5, 1, 4520.00, 500.00, 520.00, 'check-234', NULL, 'Data entry and domain hosting', NULL, '2022-09-11 02:49:31', '2022-09-11 02:49:31'),
(7, 8, 23328.00, 972.00, 0.00, 'AQN3LsVDq1', NULL, ' Website Design was bought. Thank you !!', NULL, '2022-09-11 04:50:29', '2022-09-11 04:50:29'),
(8, 8, 106309.00, 18760.00, 0.00, '507TEDI1Ze', '2022-09-11', 'Mobile Repair UI/UX Design Mobile Application Logo Design was bought. Thank you !!', NULL, '2022-09-11 04:50:29', '2022-09-11 05:06:10'),
(9, 8, 500.00, 0.00, 0.00, 'skj-534', '2022-09-09', 'Date of entry', NULL, '2022-09-11 05:03:53', '2022-09-11 05:03:53'),
(10, 2, 21463.80, 4396.20, 0.00, 'hDUtcUYb79', '2019-01-08', ' Mobile Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:25', '2022-09-11 05:10:25'),
(11, 8, 3930.14, 222.00, 452.14, 'IIg6srMaRC', '2019-11-12', ' Laptop was bought. Thank you !!', NULL, '2022-09-11 05:10:25', '2022-09-11 05:10:25'),
(12, 3, 127406.00, 0.00, 0.00, '0qcTZB8AJs', '2020-11-21', ' AWS Service Website Design UI/UX Design Training was bought. Thank you !!', NULL, '2022-09-11 05:10:25', '2022-09-11 05:10:25'),
(13, 8, 10956.14, 2274.30, 1260.44, 'fZynMRzDTd', '2021-03-15', ' AWS Service was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(14, 4, 50909.66, 2371.20, 5856.86, 'dn3dBOiWf8', '2021-06-18', ' Domain Registration Laptop was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(15, 2, 31393.03, 1157.56, 3611.59, 'bx0P4w6vbj', '2020-08-25', ' AI Services Website Design Domain Registration was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(16, 7, 27692.00, 0.00, 0.00, 'AKLAiiKjX7', '2021-06-21', ' Laptop was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(17, 6, 17047.32, 2455.88, 1961.20, '9A2E6n9Z8s', '2021-02-02', ' Mobile Repair AWS Service Laptop Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(18, 6, 55423.28, 7557.72, 0.00, 'ZzOeLcaE1q', '2020-07-28', ' Data Entry Charger Website Design Mobile Application Training was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(19, 5, 7859.38, 1738.80, 904.18, '9ZN1QdFG57', '2019-11-25', ' Training was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(20, 4, 8088.00, 0.00, 0.00, '07ox05ESpt', '2021-04-09', 'Logo Design Domain Registration Mobile Application Mobile Application Mobile Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2023-03-25 01:43:06'),
(21, 7, 5492.70, 1215.20, 631.90, 'tlaEVhLSch', '2022-01-17', ' AWS Service was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(22, 8, 64844.53, 11753.46, 7459.99, 'gl4RZVc9I1', '2019-08-09', ' UI/UX Design Laptop Repair Laptop Laptop was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(23, 9, 24545.00, 760.00, 0.00, 'SZTlx86IHl', '2020-07-05', 'Mobile Application was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-11-04 12:30:23'),
(24, 9, 3381.00, 69.00, 0.00, 'kX8Jvhb3qg', '2020-01-10', ' Training was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(25, 5, 21011.88, 1827.12, 0.00, 'b6JAHiqhXO', '2020-05-31', ' AWS Service AI Services was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(26, 6, 53570.32, 4688.64, 6162.96, 'M0jJqRHyYT', '2020-04-19', ' Logo Design Laptop Repair Mobile Repair Mobile Repair Laptop was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(27, 1, 30480.00, 0.00, 0.00, 'HrpaUJXK3E', '2019-02-01', ' Laptop Repair Website Design was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(28, 1, 45747.52, 4524.48, 0.00, 'AuOkuQeN9B', '2020-08-06', ' Charger Laptop Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(29, 5, 26691.17, 3529.50, 3070.66, 'BWzErvb29q', '2019-06-02', ' AI Services was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(30, 6, 58603.52, 1812.48, 0.00, 'EWdJYmBnve', '2019-09-10', ' Data Entry Website Design AI Services was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(31, 1, 103770.00, 11530.00, 0.00, 'fTTwJDD6pQ', '2020-02-11', ' Domain Registration Mobile Application Mobile Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(32, 8, 76187.84, 16724.16, 0.00, 'wZ2uoEvTDl', '2019-12-30', ' Logo Design Domain Registration Logo Design Website Design was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(33, 7, 54025.44, 10290.56, 0.00, 'bGOn1cSJYl', '2019-02-03', ' Training Laptop UI/UX Design Logo Design was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(34, 1, 24815.88, 3575.04, 2854.92, 'unwhfOWBwM', '2019-03-24', ' UI/UX Design was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(35, 6, 6455.04, 1416.96, 0.00, 'sFpn4Ao4VZ', '2021-11-20', ' Laptop Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(36, 7, 30063.10, 2002.49, 3458.59, 'NrbetvXnsn', '2019-08-02', ' Logo Design Training UI/UX Design Laptop Charger was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(37, 2, 78630.37, 12279.60, 9045.97, 'JDqWTeCkSL', '2019-05-05', ' Data Entry Logo Design was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(38, 8, 70533.12, 2938.88, 0.00, 'OnH3ncHYQX', '2019-05-02', ' AWS Service AWS Service Laptop Data Entry Data Entry was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(39, 6, 78679.93, 8605.74, 9051.67, '3maLIWJewG', '2022-07-07', ' Mobile Repair Laptop Repair Laptop was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(40, 1, 20371.92, 3044.08, 0.00, 'x1P5PwEhHj', '2020-05-26', ' AI Services Mobile Repair Laptop was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(41, 6, 79289.90, 16240.10, 0.00, 'zhOB6HyryU', '2020-09-21', ' Data Entry AWS Service AI Services Mobile Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(42, 1, 26706.96, 5087.04, 0.00, 'uEWh4R987V', '2020-04-12', ' Training Website Design AI Services was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(43, 7, 65733.23, 0.00, 7562.23, 'E1VbJG7elp', '2021-07-14', ' Website Design AI Services Charger Domain Registration UI/UX Design was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(44, 4, 67085.16, 10476.60, 7717.76, 'j5ik1lpBuK', '2020-03-22', ' Logo Design Charger Data Entry AI Services Mobile Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(45, 9, 42442.32, 5245.68, 0.00, 'NuCbbaZ0Zj', '2019-11-20', ' Logo Design Laptop Repair AWS Service was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(46, 9, 56507.23, 11573.77, 0.00, 'uO7oV9Yk9f', '2021-04-10', ' AI Services Mobile Repair Data Entry AWS Service was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(47, 3, 93961.85, 11338.92, 10809.77, '9wE2QVtogq', '2019-06-22', ' Training Data Entry Data Entry Logo Design Mobile Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(48, 1, 85955.12, 16697.52, 9888.64, '8TtJAxoX2R', '2022-06-07', ' Laptop Training AWS Service was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(49, 1, 45561.92, 3987.72, 5241.64, 'W90IbAjhj1', '2019-08-30', ' Domain Registration Laptop Domain Registration Mobile Repair AI Services was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(50, 5, 9739.80, 1855.20, 0.00, 'J9rAkCw0HC', '2020-12-08', ' AWS Service Mobile Repair Laptop Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(51, 9, 86463.96, 6508.04, 0.00, '16Wr8icgWz', '2020-03-20', ' Laptop Repair Domain Registration Charger Domain Registration was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(52, 3, 32304.58, 4653.88, 3716.46, 'XiczVRxXuO', '2020-02-11', ' AWS Service Laptop Repair Mobile Application was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(53, 9, 161337.56, 9113.40, 18560.96, 'v1CIHP4krP', '2020-09-12', ' Laptop Laptop AWS Service Mobile Application was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(54, 2, 40750.08, 7761.92, 0.00, '7utInCulQu', '2020-12-12', ' Mobile Application Training AI Services was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(55, 8, 12862.80, 3017.20, 0.00, 'cdvzQAxXZc', '2019-12-10', ' Mobile Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(56, 7, 102780.22, 16051.05, 11824.27, 'UFA25eGBey', '2021-03-15', ' Training Training AI Services Mobile Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(57, 8, 95886.00, 0.00, 0.00, 'KEodliAoyb', '2021-06-29', ' Website Design Logo Design Laptop Training was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(58, 4, 4001.31, 226.02, 460.33, '70AWi8vF2p', '2021-04-09', ' Laptop Repair AI Services was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(59, 3, 83003.58, 838.42, 0.00, 'Peyz9cb1KK', '2022-08-24', ' AI Services Data Entry Training Training was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(60, 4, 25724.16, 3843.84, 0.00, 'bWvidbMn8M', '2019-02-08', ' Charger was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(61, 4, 73215.07, 11433.90, 8422.97, 'Exjv7OdaaZ', '2021-06-18', ' UI/UX Design Laptop AWS Service was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(62, 1, 34279.21, 306.42, 3943.63, 'tTboz7vqX3', '2019-02-15', ' Website Design Logo Design Logo Design Data Entry was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(63, 5, 21249.60, 885.40, 0.00, 'HZijNXEF7N', '2021-02-16', ' Laptop Repair Website Design AWS Service Mobile Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(64, 1, 92359.35, 5217.06, 10625.41, 'Ge36C0UufV', '2019-06-03', ' UI/UX Design Website Design Mobile Repair Mobile Repair UI/UX Design was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(65, 4, 59023.18, 2749.10, 6790.28, 'OWQNTFi1Ks', '2021-06-19', ' UI/UX Design Domain Registration Mobile Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(66, 9, 10010.88, 101.12, 0.00, 'bq73frqDav', '2020-04-17', ' Mobile Repair Mobile Repair Data Entry was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(67, 9, 24769.80, 250.20, 0.00, 'B4linJgewp', '2020-11-19', ' Mobile Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(68, 5, 79324.78, 709.08, 9125.86, 'R5wAuLpxnT', '2020-03-24', ' UI/UX Design Mobile Repair Logo Design Mobile Repair AI Services was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(69, 4, 45387.58, 0.00, 5221.58, 'O2ThPh6lZE', '2020-11-08', ' Data Entry Laptop Repair Domain Registration Mobile Application was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(70, 7, 117056.49, 21217.19, 13466.68, '433CfFsN5T', '2020-12-31', ' Training AWS Service Charger UI/UX Design Website Design was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(71, 4, 142607.13, 9499.00, 16406.13, 'g1p5VK8Vca', '2020-01-05', ' Website Design Mobile Application Charger Domain Registration was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(72, 8, 90719.04, 18831.66, 10436.70, 'HanAPSecut', '2019-11-14', ' Mobile Repair Mobile Repair Website Design Laptop was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(73, 8, 55379.64, 4168.36, 0.00, 'C2jBkZ2Jek', '2020-11-28', ' Domain Registration Laptop UI/UX Design Logo Design was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(74, 7, 5451.80, 785.40, 627.20, 'eQdze5Lcxh', '2022-08-27', ' Website Design Laptop was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(75, 6, 4690.80, 521.20, 0.00, 'C7j4mlomWX', '2021-01-26', ' Data Entry Charger was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(76, 5, 76380.63, 2090.52, 8787.15, 'X5SX88pZJQ', '2019-03-14', ' Website Design Domain Registration AWS Service Training was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(77, 9, 55646.10, 9819.90, 0.00, 'd290mVNCQL', '2021-10-23', ' Laptop Repair UI/UX Design Mobile Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(78, 6, 61536.41, 0.00, 7079.41, 'cVrckUFyxd', '2020-11-08', ' Mobile Repair Mobile Application was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(79, 3, 57001.53, 8517.47, 0.00, 'heSgVAaAyo', '2020-02-08', ' Data Entry Laptop Repair Website Design UI/UX Design Mobile Application was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(80, 1, 29515.78, 807.84, 3395.62, 'Uw1ZwGml9x', '2020-12-11', ' AWS Service Logo Design Charger Website Design Data Entry was bought. Thank you !!', NULL, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(81, 3, 57985.20, 5734.80, 0.00, '2mSl6yCJTr', '2020-12-18', ' Logo Design Data Entry was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(82, 3, 57341.33, 10393.46, 6596.79, 'BbEySzF8rI', '2020-09-30', ' Laptop Repair AI Services Laptop AI Services was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(83, 4, 120825.19, 1080.05, 13900.24, 'TIgdaMoN7Q', '2021-06-24', ' Domain Registration Mobile Application AWS Service Domain Registration was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(84, 7, 62998.88, 1137.78, 7247.66, 'Zfrx5xpXVY', '2021-10-18', ' Website Design Logo Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(85, 7, 9680.53, 1196.47, 0.00, 'KIYIGIaLVM', '2021-08-28', ' Mobile Repair AI Services was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(86, 9, 31213.44, 1300.56, 0.00, 'tHZJMTyKzx', '2019-07-06', ' Charger AI Services UI/UX Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(87, 3, 53687.34, 1095.66, 0.00, 'rlVHTUROdj', '2022-06-13', ' AI Services Mobile Application Laptop Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(88, 9, 40124.16, 6531.84, 0.00, '5s7HCdNoIg', '2019-08-10', ' Domain Registration AI Services Mobile Application AWS Service was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(89, 9, 19017.60, 3622.40, 0.00, 'WuQYpBAFFe', '2019-04-23', ' AI Services was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(90, 2, 32507.20, 8126.80, 0.00, 'mxlNkPkd3o', '2019-02-02', ' Mobile Application Mobile Application Laptop Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(91, 9, 31323.60, 316.40, 0.00, 'dUwcsDJw0z', '2020-09-09', ' Logo Design Domain Registration was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(92, 1, 24940.35, 1312.65, 0.00, 'dO5SCS6EU6', '2022-06-03', ' Mobile Repair Training was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(93, 4, 6477.30, 719.70, 0.00, 'lBwHhMyazW', '2020-01-12', ' UI/UX Design Domain Registration AWS Service was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(94, 3, 43432.96, 1188.75, 4996.71, 'kakMXCg9F1', '2022-04-09', ' AWS Service Training AWS Service Mobile Application was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(95, 3, 58211.03, 5094.81, 6696.84, 'DtUJkejsMS', '2021-02-17', ' Laptop Repair Mobile Application Logo Design Laptop Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(96, 7, 68617.92, 13070.08, 0.00, 'diCLh16TXA', '2021-04-07', ' Training Website Design Charger was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(97, 1, 55597.55, 11387.45, 0.00, 'td1GkAEGwU', '2022-06-10', ' AI Services Charger was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(98, 8, 94239.29, 842.40, 10841.69, 'LmDXqke90s', '2021-03-02', ' Data Entry AI Services UI/UX Design Website Design Mobile Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(99, 3, 14576.82, 1097.18, 0.00, 'XMErCcO9Pt', '2021-02-16', ' Laptop AWS Service was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(100, 5, 41265.79, 4057.60, 4747.39, 'luHWcby1NS', '2022-04-06', ' Mobile Application Logo Design Laptop was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(101, 4, 70422.91, 4690.84, 8101.75, 'GtsxUr79S7', '2021-11-02', ' Training UI/UX Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(102, 3, 55135.08, 556.92, 0.00, 'JvBxaUx4Xx', '2022-01-04', ' Mobile Repair Domain Registration was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(103, 8, 82656.08, 5275.92, 0.00, 'yLZna8r1ke', '2020-04-17', ' Mobile Repair Training Data Entry Mobile Application was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(104, 4, 51435.00, 12065.00, 0.00, '91vckQGTrL', '2020-07-26', ' Domain Registration was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(105, 3, 9600.00, 0.00, 0.00, '65oYu0IwkG', '2022-08-01', ' Website Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(106, 6, 17996.36, 2929.64, 0.00, 'izRoK9P7Ch', '2020-12-25', ' AI Services AI Services AWS Service was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(107, 8, 103713.66, 0.00, 11931.66, 'eEsgRXlzm7', '2021-05-07', ' Domain Registration Charger Website Design Laptop Repair Data Entry was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(108, 1, 32246.50, 7078.50, 0.00, 'dKN0P13VfZ', '2022-02-02', ' Charger AI Services AI Services was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(109, 8, 14035.68, 3292.32, 0.00, 'fPGb4j5Vjd', '2019-09-27', ' AWS Service was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(110, 3, 53100.00, 13275.00, 0.00, 'hFTiMbJciL', '2022-04-10', ' Mobile Application Website Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(111, 4, 31335.12, 3872.88, 0.00, 'jGdoefv40K', '2021-08-08', ' AI Services Data Entry Mobile Application was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(112, 8, 11824.32, 2616.00, 1360.32, 'taiB1ojAWA', '2020-10-25', ' Training was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(113, 9, 38148.35, 6430.40, 4388.75, 'XS4RPLVPol', '2021-11-05', ' Mobile Repair AWS Service AWS Service was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(114, 6, 94786.43, 9320.20, 10904.63, '9VMaTmWZ1J', '2019-06-28', ' Domain Registration Logo Design Website Design AI Services Website Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(115, 4, 78525.48, 5910.52, 0.00, 'PlMAdlcwhB', '2021-05-03', ' Domain Registration AI Services Mobile Application Mobile Application Website Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(116, 6, 41153.20, 2626.80, 0.00, 'pjnMlYtVCH', '2021-10-20', ' AWS Service Website Design Laptop Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(117, 8, 94819.23, 2595.18, 10908.41, 'EC8G462SXD', '2019-05-01', ' AWS Service Mobile Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(118, 1, 3858.70, 246.30, 0.00, '8NPMoU2aMd', '2019-08-05', ' Domain Registration was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(119, 5, 3462.68, 127.68, 398.36, 'sOXSKTllLL', '2021-10-20', ' Laptop was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(120, 5, 36232.02, 365.98, 0.00, 'ygvXmCGG2a', '2020-08-09', ' Logo Design Mobile Application Mobile Application Charger Mobile Application was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(121, 4, 21776.40, 1893.60, 0.00, 'qP9uw3tL8O', '2021-08-06', ' Domain Registration was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(122, 9, 45248.60, 3013.99, 5205.59, '4HoMiFu4qO', '2020-07-29', ' Domain Registration Training Charger AWS Service AWS Service was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(123, 7, 23662.80, 4507.20, 0.00, 'ao4PBJsUYi', '2022-05-20', ' AWS Service was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(124, 5, 69121.90, 4604.18, 7952.08, 'IHD9W5nZzZ', '2019-01-28', ' Mobile Application UI/UX Design Training Data Entry was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(125, 9, 60722.00, 1878.00, 0.00, 'OVCnzRQhNI', '2021-10-29', ' AI Services AI Services UI/UX Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(126, 9, 47921.40, 6903.68, 5513.08, 'maIA65SeKS', '2022-03-21', ' AI Services Data Entry Data Entry was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(127, 7, 11353.11, 1773.00, 1306.11, 'VxQCGu2bTa', '2019-03-26', ' Laptop Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(128, 6, 35664.16, 4303.80, 4102.96, 'OoSgMOjsYg', '2019-08-12', ' Logo Design AWS Service Data Entry Laptop was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(129, 4, 157035.65, 8870.40, 18066.05, 'OOBKpNcAxh', '2021-11-05', ' AI Services Mobile Application AI Services UI/UX Design UI/UX Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(130, 5, 78640.40, 5019.60, 0.00, 'NJbIYqHHzB', '2022-02-02', ' Laptop Logo Design Mobile Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(131, 2, 15950.42, 142.58, 1835.00, 'lHuDTF5ic6', '2019-10-27', ' Data Entry Mobile Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(132, 9, 77146.00, 0.00, 0.00, '12JMRzXXgA', '2020-11-06', 'Mobile Application Mobile Application Laptop Repair Domain Registration was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2023-03-25 00:28:19'),
(133, 2, 44556.96, 5507.04, 0.00, 'Vy6jIe4cyz', '2020-05-22', ' Website Design Logo Design Laptop Repair Website Design Laptop Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(134, 3, 67248.40, 8311.60, 0.00, 'J4BJ4k2imh', '2019-12-20', ' Mobile Application Training was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(135, 7, 59640.13, 10053.12, 6861.25, 'jSA7V9Dq0i', '2022-01-20', ' Mobile Application Charger UI/UX Design Training was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(136, 6, 25041.04, 3094.96, 0.00, '7gpM05cnfg', '2022-03-27', ' Training Domain Registration was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(137, 5, 35027.11, 1978.56, 4029.67, 'x9T91HYOl5', '2020-01-05', ' Laptop Mobile Application was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(138, 5, 46464.96, 6943.04, 0.00, 'RDcAz41tgW', '2019-08-01', ' Logo Design Data Entry was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(139, 7, 89930.64, 2781.36, 0.00, 'sm3CYYHaXx', '2022-09-02', ' Website Design Mobile Repair Charger Laptop was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(140, 8, 40410.36, 3041.64, 0.00, 'v3KoTpBH30', '2021-12-08', ' Mobile Application Mobile Application Laptop Logo Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(141, 1, 11780.66, 1421.64, 1355.30, 'm6XrVSdfjp', '2021-09-24', ' AI Services Domain Registration AWS Service was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(142, 2, 38444.02, 2560.74, 4422.76, 'OTR78a3zXt', '2020-08-28', ' AWS Service AWS Service was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(143, 3, 27517.31, 2408.40, 3165.71, 'fvr9LynBFV', '2019-11-07', ' Laptop Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(144, 3, 82014.24, 15621.76, 0.00, '79eRFObW2e', '2020-11-28', ' Mobile Repair Data Entry Domain Registration was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(145, 3, 60389.27, 6605.17, 6947.44, 'PyWLsPPNu4', '2022-07-04', ' Data Entry Website Design Data Entry Data Entry UI/UX Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(146, 1, 37534.76, 6803.40, 4318.16, 'G8P5v5TEay', '2022-01-02', ' Website Design Data Entry UI/UX Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(147, 1, 25656.25, 4650.35, 2951.60, 'AoqwqWQhTd', '2022-09-09', ' Mobile Application Domain Registration was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(148, 7, 85358.52, 7422.48, 0.00, 'ns23BoIZ1W', '2022-02-03', ' AWS Service Laptop Laptop was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(149, 4, 35149.98, 634.82, 4043.80, 'E82PwVK8Jy', '2022-06-29', ' Laptop Data Entry Charger was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(150, 3, 1532.44, 151.56, 0.00, 'urJNGfVqHK', '2022-06-24', ' AI Services was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(151, 1, 53837.72, 7756.00, 6193.72, 'hi8cuJ4LOb', '2020-07-27', ' Domain Registration Website Design Mobile Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(152, 2, 121457.00, 0.00, 0.00, 'qZxa3S8Dn6', '2020-12-28', ' Training Laptop Repair Laptop Repair UI/UX Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(153, 5, 63584.67, 568.38, 7315.05, 'g1MjrnPzGc', '2019-05-23', ' AI Services AI Services Mobile Application UI/UX Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(154, 1, 42773.64, 4230.36, 0.00, '9FCBOHaIme', '2022-01-12', ' Logo Design Mobile Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(155, 1, 10000.80, 1111.20, 0.00, '4wMtE6BbIF', '2019-05-06', ' AWS Service was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(156, 6, 36477.76, 4974.24, 0.00, 'fttIzi2udE', '2022-01-01', ' AWS Service AWS Service Data Entry was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(157, 2, 96288.00, 2635.38, 11077.38, 'Hp83OcvBLa', '2021-07-26', ' Laptop AI Services Laptop Repair AWS Service was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(158, 1, 9229.95, 2165.05, 0.00, 'Nbu7nw1TTv', '2022-02-16', ' Laptop Mobile Application was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(159, 3, 19372.99, 1916.01, 0.00, 'sxcy9Vjzjc', '2022-02-16', ' Mobile Repair UI/UX Design AI Services Domain Registration UI/UX Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(160, 8, 30363.24, 3752.76, 0.00, 'QCgnrrPJKi', '2022-05-21', ' AWS Service Data Entry was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(161, 5, 69136.32, 9427.68, 0.00, 'UehCiqPbSy', '2020-09-19', ' Charger AWS Service Mobile Application Website Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(162, 1, 59463.60, 11326.40, 0.00, '8372wxOBHv', '2020-01-17', ' Charger Mobile Repair AWS Service Charger UI/UX Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(163, 5, 47516.40, 5279.60, 0.00, 'yuA76Gxgrj', '2022-06-30', ' Domain Registration Mobile Repair Laptop UI/UX Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(164, 8, 16828.48, 2739.52, 0.00, 'Rz9F75Env5', '2022-07-18', ' Training Laptop was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(165, 3, 2832.84, 461.16, 0.00, '69El9nNHaS', '2021-05-25', ' Logo Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(166, 4, 34855.03, 1968.84, 4009.87, '4ClcScPNEs', '2019-05-03', ' Logo Design Training Domain Registration UI/UX Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(167, 4, 15636.60, 1737.40, 0.00, 'A3UJW7QiaR', '2022-04-01', ' AI Services Domain Registration was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(168, 2, 61469.68, 2863.05, 7071.73, 'ZAF9mrYSpF', '2021-05-24', ' Laptop Repair Logo Design Mobile Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(169, 4, 10114.99, 182.68, 1163.67, 'Xr0DBDLX3l', '2020-09-05', ' Website Design Mobile Application was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(170, 8, 33382.91, 7385.60, 3840.51, 'vCbCeK5TM2', '2021-12-23', ' Charger Website Design Charger UI/UX Design Mobile Application was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(171, 7, 85168.10, 0.00, 9798.10, 'azrkrQMHkq', '2019-02-21', ' Training Training Mobile Repair Logo Design Website Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(172, 3, 104057.36, 5877.84, 11971.20, 'MWnZMER5An', '2022-09-10', ' Laptop Mobile Repair Laptop Repair Laptop was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(173, 8, 34916.10, 7724.80, 4016.90, 'DinT6STOvq', '2022-04-20', ' UI/UX Design Laptop Data Entry Laptop Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(174, 7, 37873.65, 1171.35, 0.00, 'Qt8T3zVkab', '2020-07-13', ' Data Entry Data Entry Laptop was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(175, 4, 18927.36, 788.64, 0.00, 'FaJ9xbhGtq', '2019-01-24', ' AWS Service Charger AI Services Data Entry was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(176, 2, 68433.12, 13034.88, 0.00, 'vCXi1DNzeJ', '2020-10-16', ' Website Design Domain Registration UI/UX Design AWS Service was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(177, 3, 147164.64, 3003.36, 0.00, 'FEIgaSPur3', '2021-03-08', ' Mobile Application Website Design Laptop Repair Domain Registration was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(178, 4, 19418.40, 2901.60, 0.00, 'T5LtCWFR3h', '2020-12-29', ' Laptop Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(179, 4, 9182.38, 1434.00, 1056.38, 'IjcuybAq0P', '2019-08-15', ' Laptop Training was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(180, 6, 5590.05, 1144.95, 0.00, 'wx4alnaZb9', '2019-12-26', ' Data Entry Website Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(181, 7, 33534.00, 7866.00, 0.00, 'XzVHYAUrBN', '2020-11-22', ' Data Entry AI Services Data Entry was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(182, 5, 9480.29, 1718.36, 1090.65, 'YrCYrC2rQ5', '2020-12-25', ' Logo Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(183, 5, 101102.68, 2063.32, 0.00, 'gPU5j3IdKl', '2020-01-16', ' UI/UX Design Charger Domain Registration Website Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(184, 6, 69427.51, 9180.73, 7987.24, 'LIrerJ003s', '2021-06-18', ' Mobile Application Mobile Repair Logo Design Charger Data Entry was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(185, 3, 47662.02, 11179.98, 0.00, 'N2yLudL8on', '2021-04-24', ' Data Entry was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(186, 6, 32624.00, 0.00, 0.00, 'k1xNjs7fkX', '2019-06-19', ' Laptop AWS Service AWS Service AI Services Domain Registration was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(187, 3, 7331.55, 1521.90, 843.45, 'VEd0UrXb2p', '2022-06-10', ' Mobile Application Data Entry was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(188, 8, 56332.32, 7681.68, 0.00, '7GnlVwpxUl', '2021-09-19', ' Laptop Laptop Repair Charger Website Design Mobile Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(189, 9, 17851.74, 0.00, 2053.74, 'O4MgEyPSw1', '2022-07-22', ' UI/UX Design AI Services was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(190, 4, 6003.45, 1246.21, 690.66, 'LBYwYyr09D', '2021-02-23', ' Website Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(191, 4, 66248.58, 9543.94, 7621.52, 'e3bUHJ0nMP', '2020-06-20', ' Domain Registration Mobile Application Laptop Training was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(192, 2, 33183.40, 6796.60, 0.00, 'rzgSJcJFm4', '2021-11-07', ' Logo Design Domain Registration Laptop was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(193, 1, 13644.02, 421.98, 0.00, 'V23BxonGss', '2019-07-25', ' AI Services Training Mobile Application was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(194, 9, 21718.67, 2684.33, 0.00, 'qiHivpJvSc', '2019-05-20', ' AI Services Laptop Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(195, 4, 15058.11, 2538.24, 1732.35, 'nhXsW4nlvk', '2020-11-06', ' Mobile Application was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(196, 2, 35547.00, 6273.00, 0.00, 'qnRkzoYOdi', '2019-05-02', ' Training AI Services AI Services was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(197, 1, 41820.00, 9180.00, 0.00, 'jtLJyp86Dv', '2021-10-31', ' UI/UX Design Mobile Application Data Entry was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(198, 2, 4001.40, 210.60, 0.00, 'nZZoxmpZYs', '2022-07-10', ' Mobile Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(199, 5, 5831.00, 1029.00, 0.00, 'pkZbDGQb81', '2021-03-22', ' Mobile Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(200, 6, 42660.61, 6662.25, 4907.86, 'W4AeFxWD9i', '2019-05-31', ' Mobile Application Laptop Repair Website Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(201, 2, 60975.69, 9111.31, 0.00, '8rQk8nbb7c', '2021-11-29', ' AWS Service Mobile Application Mobile Repair Laptop Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(202, 1, 17969.85, 2685.15, 0.00, 'dalbXFQexD', '2021-04-19', ' Mobile Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(203, 9, 43210.19, 3781.89, 4971.08, 'KQ9co3vcXr', '2021-01-17', ' Training was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(204, 4, 35221.05, 7213.95, 0.00, 'rdeKuBEpLK', '2020-04-09', ' Laptop Domain Registration Laptop Domain Registration was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(205, 2, 6538.18, 0.00, 752.18, 'chrlXFn58C', '2020-07-10', ' Website Design AWS Service was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(206, 4, 51989.11, 938.94, 5981.05, '0mI8POAvRh', '2019-03-01', ' Charger AI Services AI Services Mobile Application was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(207, 1, 141931.73, 6610.70, 16328.43, '1110XSyCPy', '2020-05-03', ' Laptop Repair Mobile Application Training Website Design Laptop was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(208, 6, 34657.32, 3013.68, 0.00, 'QolrMKZOD7', '2019-05-11', ' Training Mobile Application Logo Design Logo Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(209, 1, 42341.88, 864.12, 0.00, 'DIqenUkAlw', '2021-09-02', ' Laptop UI/UX Design AI Services AI Services was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(210, 9, 113856.81, 13739.76, 13098.57, 'XCQqQcxTv4', '2020-10-24', ' Mobile Repair AI Services UI/UX Design Domain Registration UI/UX Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(211, 8, 15223.27, 136.08, 1751.35, 'JZdvcMJzPE', '2022-05-24', ' Charger was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(212, 5, 108513.29, 6129.54, 12483.83, 'qPHa5I8zHx', '2021-06-23', ' Laptop AWS Service Mobile Application Laptop Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(213, 4, 54326.84, 8484.15, 6249.99, 'fAgEpZYMv2', '2022-01-28', ' Laptop Logo Design Data Entry Laptop UI/UX Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(214, 7, 48888.32, 10816.00, 5624.32, 'iWLGYoy5vH', '2021-11-20', ' AI Services Mobile Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(215, 4, 3859.50, 290.50, 0.00, 'OQwQVoXluP', '2019-09-14', ' Charger was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(216, 9, 67100.16, 2795.84, 0.00, 'LUzwVTwKmT', '2021-04-21', ' Website Design Mobile Repair Laptop Laptop was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(217, 9, 196734.36, 17218.80, 22633.16, 'yl5ySoi94T', '2021-06-25', ' Charger Laptop Training Laptop Training was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(218, 6, 26180.88, 3570.12, 0.00, 'n9qgOJD372', '2021-04-20', ' Logo Design Logo Design AWS Service was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(219, 6, 65905.35, 12802.68, 7582.03, '1yfUSpkWdl', '2022-01-14', ' Laptop Logo Design Website Design Mobile Application Data Entry was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(220, 8, 14931.19, 994.56, 1717.75, '7zM7zOZj5q', '2022-08-29', ' Training was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(221, 3, 56444.08, 1151.92, 0.00, 'QOZbugKFty', '2021-08-05', ' Charger Charger Laptop Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(222, 8, 117975.39, 0.00, 13572.39, '1Xq1lYryPD', '2022-07-11', ' AI Services Website Design AWS Service Training AI Services was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(223, 4, 17546.91, 2957.76, 2018.67, 'ULaOqzJwfP', '2020-08-07', ' Domain Registration Website Design Mobile Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(224, 5, 48538.36, 4772.70, 5584.06, 'PMh4toCuV2', '2021-11-23', ' Laptop Logo Design Domain Registration UI/UX Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(225, 7, 74392.00, 13128.00, 0.00, 'pyclcE60qY', '2019-06-08', ' Laptop Repair UI/UX Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(226, 3, 17627.20, 4406.80, 0.00, 'kGWDX6xS58', '2019-03-05', ' Mobile Application Mobile Application was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(227, 4, 39565.37, 3890.40, 4551.77, 'WXgl4KFPSA', '2022-08-09', ' Laptop AI Services Data Entry UI/UX Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(228, 4, 53897.02, 4147.52, 6200.54, 'DVdRkuYtK2', '2019-09-13', ' AI Services UI/UX Design Website Design was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(229, 2, 22040.20, 2179.80, 0.00, 'TfUo6YdM2e', '2021-02-03', ' Training was bought. Thank you !!', NULL, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(230, 6, 38649.53, 6514.88, 4446.41, 'YH4pXB38a0', '2020-07-30', ' Website Design Mobile Repair Charger Laptop Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(231, 4, 32853.44, 2528.16, 3779.60, 'sBnNlN0lqu', '2020-01-19', ' Domain Registration Laptop Repair UI/UX Design Training was bought. Thank you !!', NULL, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(232, 9, 28244.33, 5863.02, 3249.35, 'aParVTJXqi', '2019-05-28', ' Training Laptop Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(233, 8, 125075.68, 3868.32, 0.00, 'titUGIRbXP', '2020-07-19', ' AI Services Charger Laptop Domain Registration Domain Registration was bought. Thank you !!', NULL, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(234, 2, 12598.84, 1557.16, 0.00, 'UVuNhEpgxP', '2019-01-25', ' Laptop Repair Domain Registration was bought. Thank you !!', NULL, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(235, 4, 97723.20, 24430.80, 0.00, 'kCekvc61If', '2019-06-13', ' UI/UX Design Mobile Application AI Services AWS Service was bought. Thank you !!', NULL, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(236, 1, 41000.96, 4055.04, 0.00, 'BwucUkBB7E', '2022-02-21', ' UI/UX Design was bought. Thank you !!', NULL, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(237, 3, 15675.36, 0.00, 1803.36, 'GufGdOxtxx', '2022-06-16', ' Logo Design was bought. Thank you !!', NULL, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(238, 6, 47321.12, 4114.88, 0.00, 'AYlgAxzf3c', '2019-12-17', ' Website Design Mobile Repair Laptop Repair Website Design was bought. Thank you !!', NULL, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(239, 6, 69502.46, 5348.40, 7995.86, '8YxDbaBhvW', '2020-01-28', ' Domain Registration Mobile Repair AI Services AI Services was bought. Thank you !!', NULL, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(240, 4, 30310.17, 2652.84, 3487.01, 'pkZdtWEBXh', '2021-01-30', ' Laptop Logo Design Laptop Repair Mobile Repair was bought. Thank you !!', NULL, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(241, 2, 1372.82, 281.18, 0.00, 'aLh1Wf9Vwu', '2019-04-19', ' Data Entry was bought. Thank you !!', NULL, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(242, 3, 111794.74, 23206.60, 12861.34, '6DmL3v1tMV', '2021-08-28', ' Website Design Charger AI Services Mobile Repair AI Services was bought. Thank you !!', NULL, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(243, 5, 59735.13, 5907.87, 0.00, 'lXOHXuLOzR', '2020-03-15', ' Logo Design Domain Registration Website Design Data Entry AWS Service was bought. Thank you !!', NULL, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(244, 7, 46590.60, 3103.38, 5359.98, 'dFxYJBcLAg', '2021-07-20', ' Training was bought. Thank you !!', NULL, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(245, 7, 23248.67, 4213.96, 2674.63, 'gW7XUpyMoH', '2020-06-13', ' Data Entry AI Services was bought. Thank you !!', NULL, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(246, 4, 29205.96, 596.04, 0.00, '8WrTKF4hkn', '2020-05-18', ' Laptop Repair Domain Registration Data Entry was bought. Thank you !!', NULL, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(247, 7, 1527.12, 290.88, 0.00, 'OaPnPIiMim', '2021-07-18', ' Website Design was bought. Thank you !!', NULL, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(248, 2, 5793.06, 572.94, 0.00, 'ATQO9yPzX5', '2020-03-12', ' Training Laptop was bought. Thank you !!', NULL, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(249, 5, 2829.16, 104.32, 325.48, 'J9Ex9qgl5j', '2021-01-31', ' Domain Registration was bought. Thank you !!', NULL, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(250, 2, 9780.42, 1772.76, 1125.18, 'VrTAtQsPS9', '2019-07-06', ' Laptop Mobile Application was bought. Thank you !!', NULL, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(251, 2, 29380.00, 588.00, 3380.00, '3243534', '2022-11-04', 'zxcfsdfs', NULL, '2022-11-03 23:53:46', '2022-11-03 23:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `particular` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` double(8,2) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `time` double(8,2) NOT NULL DEFAULT 1.00,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_items`
--

INSERT INTO `invoice_items` (`id`, `particular`, `rate`, `amount`, `time`, `invoice_id`, `created_at`, `updated_at`) VALUES
(32, 'Data entry', 5.00, 100, 1.00, 5, '2022-09-11 02:49:31', '2022-09-11 02:49:31'),
(33, 'Domain Hosting', 2000.00, 1, 1.00, 5, '2022-09-11 02:49:31', '2022-09-11 02:49:31'),
(41, 'Laptop charger', 5.00, 10, 1.00, 3, '2022-09-11 03:07:00', '2022-09-11 03:07:00'),
(42, 'Laptop', 50.00, 20, 5.00, 3, '2022-09-11 03:07:00', '2022-09-11 03:07:00'),
(43, 'Keyboard', 50.00, 30, 1.00, 3, '2022-09-11 03:07:00', '2022-09-11 03:07:00'),
(48, 'Website Design', 972.00, 5, 5.00, 7, '2022-09-11 04:50:29', '2022-09-11 04:50:29'),
(57, 'Data entry', 50.00, 10, 1.00, 9, '2022-09-11 05:03:53', '2022-09-11 05:03:53'),
(58, 'Mobile Repair', 645.00, 7, 10.00, 8, '2022-09-11 05:06:10', '2022-09-11 05:06:10'),
(59, 'UI/UX Design', 771.00, 6, 7.00, 8, '2022-09-11 05:06:10', '2022-09-11 05:06:10'),
(60, 'Mobile Application', 369.00, 7, 9.00, 8, '2022-09-11 05:06:10', '2022-09-11 05:06:10'),
(61, 'Logo Design', 694.00, 7, 5.00, 8, '2022-09-11 05:06:10', '2022-09-11 05:06:10'),
(64, 'Chocolate', 30.00, 20, 1.00, 4, '2022-09-11 05:06:36', '2022-09-11 05:06:36'),
(65, 'Biscuit', 60.00, 50, 1.00, 4, '2022-09-11 05:06:36', '2022-09-11 05:06:36'),
(66, 'Mobile Repair', 431.00, 10, 6.00, 10, '2022-09-11 05:10:25', '2022-09-11 05:10:25'),
(67, 'Laptop', 185.00, 4, 5.00, 11, '2022-09-11 05:10:25', '2022-09-11 05:10:25'),
(68, 'AWS Service', 966.00, 7, 8.00, 12, '2022-09-11 05:10:25', '2022-09-11 05:10:25'),
(69, 'Website Design', 452.00, 9, 8.00, 12, '2022-09-11 05:10:25', '2022-09-11 05:10:25'),
(70, 'UI/UX Design', 467.00, 3, 6.00, 12, '2022-09-11 05:10:25', '2022-09-11 05:10:25'),
(71, 'Training', 809.00, 8, 5.00, 12, '2022-09-11 05:10:25', '2022-09-11 05:10:25'),
(72, 'AWS Service', 665.00, 3, 6.00, 13, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(73, 'Domain Registration', 331.00, 3, 8.00, 14, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(74, 'Laptop', 705.00, 7, 8.00, 14, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(75, 'AI Services', 796.00, 8, 3.00, 15, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(76, 'Website Design', 227.00, 5, 7.00, 15, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(77, 'Domain Registration', 630.00, 1, 3.00, 15, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(78, 'Laptop', 989.00, 7, 4.00, 16, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(79, 'Mobile Repair', 996.00, 3, 4.00, 17, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(80, 'AWS Service', 120.00, 4, 5.00, 17, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(81, 'Laptop Repair', 319.00, 2, 5.00, 17, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(82, 'Data Entry', 650.00, 1, 9.00, 18, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(83, 'Charger', 627.00, 6, 7.00, 18, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(84, 'Website Design', 889.00, 1, 5.00, 18, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(85, 'Mobile Application', 872.00, 6, 2.00, 18, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(86, 'Training', 662.00, 6, 4.00, 18, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(87, 'Training', 483.00, 9, 2.00, 19, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(93, 'AWS Service', 217.00, 7, 4.00, 21, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(94, 'UI/UX Design', 749.00, 1, 6.00, 22, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(95, 'Laptop Repair', 851.00, 5, 10.00, 22, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(96, 'Laptop', 958.00, 9, 2.00, 22, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(97, 'Laptop', 970.00, 5, 1.00, 22, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(99, 'Training', 230.00, 3, 5.00, 24, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(100, 'AWS Service', 655.00, 1, 9.00, 25, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(101, 'AI Services', 706.00, 6, 4.00, 25, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(102, 'Logo Design', 148.00, 3, 8.00, 26, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(103, 'Laptop Repair', 198.00, 9, 8.00, 26, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(104, 'Mobile Repair', 195.00, 8, 10.00, 26, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(105, 'Mobile Repair', 466.00, 1, 8.00, 26, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(106, 'Laptop', 187.00, 8, 10.00, 26, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(107, 'Laptop Repair', 572.00, 3, 10.00, 27, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(108, 'Website Design', 888.00, 3, 5.00, 27, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(109, 'Charger', 576.00, 10, 8.00, 28, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(110, 'Laptop Repair', 131.00, 4, 8.00, 28, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(111, 'AI Services', 905.00, 6, 5.00, 29, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(112, 'Data Entry', 476.00, 9, 4.00, 30, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(113, 'Website Design', 822.00, 6, 8.00, 30, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(114, 'AI Services', 239.00, 4, 4.00, 30, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(115, 'Domain Registration', 295.00, 8, 3.00, 31, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(116, 'Mobile Application', 698.00, 8, 5.00, 31, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(117, 'Mobile Repair', 803.00, 10, 10.00, 31, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(118, 'Logo Design', 545.00, 10, 6.00, 32, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(119, 'Domain Registration', 642.00, 5, 8.00, 32, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(120, 'Logo Design', 134.00, 2, 5.00, 32, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(121, 'Website Design', 922.00, 4, 9.00, 32, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(122, 'Training', 263.00, 8, 9.00, 33, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(123, 'Laptop', 762.00, 8, 5.00, 33, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(124, 'UI/UX Design', 173.00, 6, 9.00, 33, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(125, 'Logo Design', 397.00, 7, 2.00, 33, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(126, 'UI/UX Design', 798.00, 4, 8.00, 34, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(127, 'Laptop Repair', 164.00, 8, 6.00, 35, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(128, 'Logo Design', 182.00, 5, 2.00, 36, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(129, 'Training', 704.00, 2, 9.00, 36, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(130, 'UI/UX Design', 892.00, 1, 5.00, 36, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(131, 'Laptop', 269.00, 3, 1.00, 36, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(132, 'Charger', 316.00, 4, 7.00, 36, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(133, 'Data Entry', 695.00, 8, 10.00, 37, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(134, 'Logo Design', 469.00, 7, 8.00, 37, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(135, 'AWS Service', 782.00, 8, 5.00, 38, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(136, 'AWS Service', 129.00, 9, 6.00, 38, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(137, 'Laptop', 406.00, 3, 6.00, 38, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(138, 'Data Entry', 715.00, 4, 9.00, 38, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(139, 'Data Entry', 242.00, 3, 3.00, 38, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(140, 'Mobile Repair', 512.00, 3, 1.00, 39, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(141, 'Laptop Repair', 843.00, 6, 8.00, 39, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(142, 'Laptop', 671.00, 9, 6.00, 39, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(143, 'AI Services', 948.00, 3, 3.00, 40, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(144, 'Mobile Repair', 274.00, 2, 1.00, 40, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(145, 'Laptop', 512.00, 4, 7.00, 40, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(146, 'Data Entry', 787.00, 4, 9.00, 41, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(147, 'AWS Service', 562.00, 6, 8.00, 41, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(148, 'AI Services', 535.00, 9, 8.00, 41, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(149, 'Mobile Repair', 851.00, 2, 1.00, 41, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(150, 'Training', 224.00, 9, 7.00, 42, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(151, 'Website Design', 637.00, 2, 9.00, 42, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(152, 'AI Services', 888.00, 1, 7.00, 42, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(153, 'Website Design', 717.00, 4, 7.00, 43, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(154, 'AI Services', 789.00, 3, 1.00, 43, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(155, 'Charger', 813.00, 2, 8.00, 43, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(156, 'Domain Registration', 335.00, 7, 8.00, 43, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(157, 'UI/UX Design', 110.00, 9, 4.00, 43, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(158, 'Logo Design', 477.00, 3, 2.00, 44, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(159, 'Charger', 130.00, 4, 9.00, 44, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(160, 'Data Entry', 571.00, 2, 5.00, 44, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(161, 'AI Services', 670.00, 9, 8.00, 44, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(162, 'Mobile Repair', 174.00, 6, 8.00, 44, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(163, 'Logo Design', 641.00, 5, 9.00, 45, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(164, 'Laptop Repair', 276.00, 7, 9.00, 45, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(165, 'AWS Service', 485.00, 1, 3.00, 45, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(166, 'AI Services', 229.00, 4, 8.00, 46, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(167, 'Mobile Repair', 113.00, 7, 5.00, 46, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(168, 'Data Entry', 812.00, 8, 8.00, 46, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(169, 'AWS Service', 805.00, 6, 1.00, 46, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(170, 'Training', 517.00, 7, 7.00, 47, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(171, 'Data Entry', 978.00, 1, 4.00, 47, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(172, 'Data Entry', 923.00, 6, 3.00, 47, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(173, 'Logo Design', 593.00, 6, 4.00, 47, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(174, 'Mobile Repair', 860.00, 4, 10.00, 47, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(175, 'Laptop', 466.00, 2, 9.00, 48, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(176, 'Training', 662.00, 2, 10.00, 48, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(177, 'AWS Service', 988.00, 9, 8.00, 48, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(178, 'Domain Registration', 112.00, 9, 8.00, 49, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(179, 'Laptop', 799.00, 6, 1.00, 49, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(180, 'Domain Registration', 959.00, 10, 1.00, 49, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(181, 'Mobile Repair', 226.00, 7, 5.00, 49, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(182, 'AI Services', 775.00, 9, 2.00, 49, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(183, 'AWS Service', 745.00, 6, 1.00, 50, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(184, 'Mobile Repair', 160.00, 5, 2.00, 50, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(185, 'Laptop Repair', 221.00, 5, 5.00, 50, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(186, 'Laptop Repair', 411.00, 10, 4.00, 51, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(187, 'Domain Registration', 836.00, 3, 2.00, 51, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(188, 'Charger', 696.00, 3, 2.00, 51, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(189, 'Domain Registration', 962.00, 10, 7.00, 51, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(190, 'AWS Service', 548.00, 3, 2.00, 52, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(191, 'Laptop Repair', 907.00, 2, 7.00, 52, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(192, 'Mobile Application', 719.00, 4, 6.00, 52, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(193, 'Laptop', 345.00, 2, 3.00, 53, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(194, 'Laptop', 545.00, 5, 10.00, 53, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(195, 'AWS Service', 742.00, 9, 10.00, 53, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(196, 'Mobile Application', 797.00, 10, 7.00, 53, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(197, 'Mobile Application', 905.00, 5, 8.00, 54, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(198, 'Training', 352.00, 3, 8.00, 54, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(199, 'AI Services', 552.00, 7, 1.00, 54, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(200, 'Mobile Repair', 794.00, 5, 4.00, 55, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(201, 'Training', 336.00, 8, 6.00, 56, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(202, 'Training', 1000.00, 8, 9.00, 56, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(203, 'AI Services', 518.00, 3, 6.00, 56, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(204, 'Mobile Repair', 273.00, 7, 5.00, 56, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(205, 'Website Design', 918.00, 7, 9.00, 57, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(206, 'Logo Design', 315.00, 4, 5.00, 57, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(207, 'Laptop', 142.00, 9, 4.00, 57, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(208, 'Training', 666.00, 5, 8.00, 57, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(209, 'Laptop Repair', 266.00, 1, 4.00, 58, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(210, 'AI Services', 901.00, 1, 3.00, 58, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(211, 'AI Services', 875.00, 9, 2.00, 59, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(212, 'Data Entry', 741.00, 5, 8.00, 59, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(213, 'Training', 728.00, 2, 7.00, 59, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(214, 'Training', 628.00, 9, 5.00, 59, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(215, 'Charger', 528.00, 8, 7.00, 60, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(216, 'UI/UX Design', 916.00, 3, 2.00, 61, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(217, 'Laptop', 614.00, 7, 10.00, 61, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(218, 'AWS Service', 925.00, 5, 6.00, 61, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(219, 'Website Design', 902.00, 3, 4.00, 62, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(220, 'Logo Design', 604.00, 1, 9.00, 62, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(221, 'Logo Design', 966.00, 7, 1.00, 62, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(222, 'Data Entry', 762.00, 2, 5.00, 62, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(223, 'Laptop Repair', 946.00, 2, 4.00, 63, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(224, 'Website Design', 365.00, 10, 1.00, 63, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(225, 'AWS Service', 747.00, 3, 1.00, 63, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(226, 'Mobile Repair', 482.00, 9, 2.00, 63, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(227, 'UI/UX Design', 443.00, 5, 9.00, 64, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(228, 'Website Design', 175.00, 7, 8.00, 64, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(229, 'Mobile Repair', 617.00, 8, 6.00, 64, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(230, 'Mobile Repair', 840.00, 4, 4.00, 64, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(231, 'UI/UX Design', 885.00, 2, 8.00, 64, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(232, 'UI/UX Design', 793.00, 9, 6.00, 65, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(233, 'Domain Registration', 683.00, 5, 2.00, 65, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(234, 'Mobile Repair', 533.00, 2, 5.00, 65, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(235, 'Mobile Repair', 688.00, 1, 5.00, 66, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(236, 'Mobile Repair', 129.00, 5, 8.00, 66, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(237, 'Data Entry', 756.00, 2, 1.00, 66, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(238, 'Mobile Repair', 417.00, 10, 6.00, 67, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(239, 'UI/UX Design', 987.00, 5, 2.00, 68, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(240, 'Mobile Repair', 709.00, 4, 3.00, 68, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(241, 'Logo Design', 608.00, 10, 2.00, 68, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(242, 'Mobile Repair', 332.00, 5, 7.00, 68, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(243, 'AI Services', 575.00, 5, 10.00, 68, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(244, 'Data Entry', 510.00, 5, 3.00, 69, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(245, 'Laptop Repair', 916.00, 4, 5.00, 69, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(246, 'Domain Registration', 753.00, 1, 2.00, 69, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(247, 'Mobile Application', 141.00, 9, 10.00, 69, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(248, 'Training', 589.00, 1, 3.00, 70, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(249, 'AWS Service', 801.00, 4, 4.00, 70, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(250, 'Charger', 296.00, 8, 2.00, 70, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(251, 'UI/UX Design', 944.00, 9, 3.00, 70, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(252, 'Website Design', 1000.00, 8, 10.00, 70, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(253, 'Website Design', 554.00, 7, 8.00, 71, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(254, 'Mobile Application', 972.00, 8, 7.00, 71, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(255, 'Charger', 762.00, 2, 8.00, 71, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(256, 'Domain Registration', 906.00, 6, 7.00, 71, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(257, 'Mobile Repair', 421.00, 5, 8.00, 72, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(258, 'Mobile Repair', 937.00, 8, 10.00, 72, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(259, 'Website Design', 478.00, 1, 3.00, 72, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(260, 'Laptop', 147.00, 8, 5.00, 72, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(261, 'Domain Registration', 474.00, 8, 7.00, 73, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(262, 'Laptop', 362.00, 2, 5.00, 73, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(263, 'UI/UX Design', 324.00, 1, 10.00, 73, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(264, 'Logo Design', 817.00, 8, 4.00, 73, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(265, 'Website Design', 112.00, 9, 2.00, 74, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(266, 'Laptop', 599.00, 3, 2.00, 74, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(267, 'Data Entry', 649.00, 7, 1.00, 75, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(268, 'Charger', 669.00, 1, 1.00, 75, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(269, 'Website Design', 753.00, 4, 9.00, 76, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(270, 'Domain Registration', 947.00, 5, 6.00, 76, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(271, 'AWS Service', 200.00, 3, 9.00, 76, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(272, 'Training', 487.00, 6, 3.00, 76, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(273, 'Laptop Repair', 443.00, 2, 9.00, 77, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(274, 'UI/UX Design', 869.00, 9, 7.00, 77, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(275, 'Mobile Repair', 549.00, 1, 5.00, 77, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(276, 'Mobile Repair', 605.00, 9, 5.00, 78, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(277, 'Mobile Application', 851.00, 4, 8.00, 78, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(278, 'Data Entry', 679.00, 4, 6.00, 79, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(279, 'Laptop Repair', 525.00, 5, 8.00, 79, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(280, 'Website Design', 419.00, 6, 3.00, 79, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(281, 'UI/UX Design', 757.00, 8, 1.00, 79, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(282, 'Mobile Application', 975.00, 3, 5.00, 79, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(283, 'AWS Service', 195.00, 4, 4.00, 80, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(284, 'Logo Design', 385.00, 2, 1.00, 80, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(285, 'Charger', 856.00, 3, 7.00, 80, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(286, 'Website Design', 731.00, 1, 2.00, 80, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(287, 'Data Entry', 180.00, 2, 10.00, 80, '2022-09-11 05:10:50', '2022-09-11 05:10:50'),
(288, 'Logo Design', 700.00, 6, 10.00, 81, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(289, 'Data Entry', 724.00, 6, 5.00, 81, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(290, 'Laptop Repair', 888.00, 7, 3.00, 82, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(291, 'AI Services', 879.00, 3, 6.00, 82, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(292, 'Laptop', 701.00, 10, 2.00, 82, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(293, 'AI Services', 527.00, 6, 4.00, 82, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(294, 'Domain Registration', 179.00, 3, 5.00, 83, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(295, 'Mobile Application', 556.00, 9, 5.00, 83, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(296, 'AWS Service', 842.00, 7, 7.00, 83, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(297, 'Domain Registration', 482.00, 9, 9.00, 83, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(298, 'Website Design', 603.00, 9, 7.00, 84, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(299, 'Logo Design', 270.00, 10, 7.00, 84, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(300, 'Mobile Repair', 141.00, 7, 7.00, 85, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(301, 'AI Services', 248.00, 4, 4.00, 85, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(302, 'Charger', 375.00, 2, 7.00, 86, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(303, 'AI Services', 342.00, 8, 8.00, 86, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(304, 'UI/UX Design', 384.00, 7, 2.00, 86, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(305, 'AI Services', 735.00, 9, 4.00, 87, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(306, 'Mobile Application', 504.00, 6, 6.00, 87, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(307, 'Laptop Repair', 377.00, 3, 9.00, 87, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(308, 'Domain Registration', 654.00, 5, 4.00, 88, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(309, 'AI Services', 277.00, 4, 9.00, 88, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(310, 'Mobile Application', 316.00, 2, 7.00, 88, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(311, 'AWS Service', 548.00, 7, 5.00, 88, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(312, 'AI Services', 283.00, 8, 10.00, 89, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(313, 'Mobile Application', 682.00, 10, 2.00, 90, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(314, 'Mobile Application', 897.00, 1, 2.00, 90, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(315, 'Laptop Repair', 420.00, 10, 6.00, 90, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(316, 'Logo Design', 194.00, 10, 4.00, 91, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(317, 'Domain Registration', 796.00, 5, 6.00, 91, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(318, 'Mobile Repair', 987.00, 2, 9.00, 92, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(319, 'Training', 943.00, 1, 9.00, 92, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(320, 'UI/UX Design', 449.00, 2, 2.00, 93, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(321, 'Domain Registration', 596.00, 1, 8.00, 93, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(322, 'AWS Service', 211.00, 1, 3.00, 93, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(323, 'AWS Service', 247.00, 7, 10.00, 94, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(324, 'Training', 983.00, 1, 3.00, 94, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(325, 'AWS Service', 449.00, 9, 3.00, 94, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(326, 'Mobile Application', 807.00, 9, 1.00, 94, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(327, 'Laptop Repair', 515.00, 5, 10.00, 95, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(328, 'Mobile Application', 193.00, 2, 2.00, 95, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(329, 'Logo Design', 981.00, 8, 3.00, 95, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(330, 'Laptop Repair', 727.00, 9, 1.00, 95, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(331, 'Training', 373.00, 2, 8.00, 96, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(332, 'Website Design', 208.00, 8, 10.00, 96, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(333, 'Charger', 844.00, 10, 7.00, 96, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(334, 'AI Services', 149.00, 10, 5.00, 97, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(335, 'Charger', 945.00, 7, 9.00, 97, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(336, 'Data Entry', 383.00, 10, 2.00, 98, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(337, 'AI Services', 934.00, 8, 3.00, 98, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(338, 'UI/UX Design', 197.00, 8, 8.00, 98, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(339, 'Website Design', 974.00, 2, 9.00, 98, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(340, 'Mobile Repair', 429.00, 7, 8.00, 98, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(341, 'Laptop', 917.00, 8, 2.00, 99, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(342, 'AWS Service', 167.00, 3, 2.00, 99, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(343, 'Mobile Application', 560.00, 4, 5.00, 100, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(344, 'Logo Design', 332.00, 1, 6.00, 100, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(345, 'Laptop', 489.00, 7, 8.00, 100, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(346, 'Training', 764.00, 2, 4.00, 101, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(347, 'UI/UX Design', 870.00, 10, 7.00, 101, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(348, 'Mobile Repair', 993.00, 2, 3.00, 102, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(349, 'Domain Registration', 921.00, 9, 6.00, 102, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(350, 'Mobile Repair', 796.00, 9, 4.00, 103, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(351, 'Training', 397.00, 6, 7.00, 103, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(352, 'Data Entry', 458.00, 1, 9.00, 103, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(353, 'Mobile Application', 962.00, 5, 8.00, 103, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(354, 'Domain Registration', 635.00, 10, 10.00, 104, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(355, 'Website Design', 240.00, 5, 8.00, 105, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(356, 'AI Services', 551.00, 4, 7.00, 106, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(357, 'AI Services', 663.00, 3, 2.00, 106, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(358, 'AWS Service', 152.00, 10, 1.00, 106, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(359, 'Domain Registration', 662.00, 3, 1.00, 107, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(360, 'Charger', 709.00, 7, 7.00, 107, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(361, 'Website Design', 334.00, 10, 7.00, 107, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(362, 'Laptop Repair', 935.00, 1, 5.00, 107, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(363, 'Data Entry', 540.00, 10, 5.00, 107, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(364, 'Charger', 583.00, 7, 9.00, 108, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(365, 'AI Services', 184.00, 1, 9.00, 108, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(366, 'AI Services', 188.00, 1, 5.00, 108, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(367, 'AWS Service', 722.00, 3, 8.00, 109, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(368, 'Mobile Application', 324.00, 10, 6.00, 110, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(369, 'Website Design', 745.00, 9, 7.00, 110, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(370, 'AI Services', 588.00, 10, 4.00, 111, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(371, 'Data Entry', 259.00, 6, 4.00, 111, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(372, 'Mobile Application', 152.00, 6, 6.00, 111, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(373, 'Training', 218.00, 6, 10.00, 112, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(374, 'Mobile Repair', 609.00, 6, 2.00, 113, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(375, 'AWS Service', 221.00, 10, 10.00, 113, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(376, 'AWS Service', 599.00, 2, 9.00, 113, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(377, 'Domain Registration', 202.00, 7, 9.00, 114, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(378, 'Logo Design', 608.00, 3, 4.00, 114, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(379, 'Website Design', 895.00, 4, 9.00, 114, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(380, 'AI Services', 632.00, 8, 5.00, 114, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(381, 'Website Design', 490.00, 8, 4.00, 114, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(382, 'Domain Registration', 700.00, 9, 6.00, 115, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(383, 'AI Services', 414.00, 9, 8.00, 115, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(384, 'Mobile Application', 153.00, 6, 4.00, 115, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(385, 'Mobile Application', 410.00, 10, 2.00, 115, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(386, 'Website Design', 413.00, 4, 3.00, 115, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(387, 'AWS Service', 560.00, 2, 3.00, 116, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(388, 'Website Design', 162.00, 1, 2.00, 116, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(389, 'Laptop Repair', 716.00, 7, 8.00, 116, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(390, 'AWS Service', 662.00, 7, 4.00, 117, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(391, 'Mobile Repair', 971.00, 10, 7.00, 117, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(392, 'Domain Registration', 821.00, 1, 5.00, 118, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(393, 'Laptop', 114.00, 7, 4.00, 119, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(394, 'Logo Design', 132.00, 8, 6.00, 120, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(395, 'Mobile Application', 847.00, 2, 6.00, 120, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(396, 'Mobile Application', 242.00, 3, 10.00, 120, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(397, 'Charger', 145.00, 2, 5.00, 120, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(398, 'Mobile Application', 949.00, 6, 2.00, 120, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(399, 'Domain Registration', 526.00, 5, 9.00, 121, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(400, 'Domain Registration', 591.00, 3, 9.00, 122, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(401, 'Training', 342.00, 6, 2.00, 122, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(402, 'Charger', 135.00, 10, 6.00, 122, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(403, 'AWS Service', 211.00, 6, 7.00, 122, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(404, 'AWS Service', 862.00, 1, 7.00, 122, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(405, 'AWS Service', 939.00, 10, 3.00, 123, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(406, 'Mobile Application', 342.00, 2, 5.00, 124, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(407, 'UI/UX Design', 704.00, 1, 4.00, 124, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(408, 'Training', 786.00, 9, 6.00, 124, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(409, 'Data Entry', 814.00, 7, 3.00, 124, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(410, 'AI Services', 940.00, 2, 1.00, 125, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(411, 'AI Services', 916.00, 6, 10.00, 125, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(412, 'UI/UX Design', 320.00, 9, 2.00, 125, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(413, 'AI Services', 808.00, 5, 9.00, 126, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(414, 'Data Entry', 151.00, 6, 8.00, 126, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(415, 'Data Entry', 713.00, 8, 1.00, 126, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(416, 'Laptop Repair', 591.00, 10, 2.00, 127, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(417, 'Logo Design', 365.00, 1, 7.00, 128, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(418, 'AWS Service', 395.00, 7, 4.00, 128, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(419, 'Data Entry', 234.00, 6, 10.00, 128, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(420, 'Laptop', 821.00, 5, 2.00, 128, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(421, 'AI Services', 103.00, 6, 9.00, 129, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(422, 'Mobile Application', 820.00, 3, 2.00, 129, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(423, 'AI Services', 394.00, 3, 9.00, 129, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(424, 'UI/UX Design', 980.00, 10, 8.00, 129, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(425, 'UI/UX Design', 755.00, 8, 8.00, 129, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(426, 'Laptop', 800.00, 8, 8.00, 130, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(427, 'Logo Design', 759.00, 6, 6.00, 130, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(428, 'Mobile Repair', 428.00, 2, 6.00, 130, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(429, 'Data Entry', 407.00, 2, 5.00, 131, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(430, 'Mobile Repair', 566.00, 2, 9.00, 131, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(435, 'Website Design', 717.00, 2, 9.00, 133, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(436, 'Logo Design', 494.00, 5, 10.00, 133, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(437, 'Laptop Repair', 346.00, 7, 3.00, 133, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(438, 'Website Design', 282.00, 6, 1.00, 133, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(439, 'Laptop Repair', 125.00, 4, 7.00, 133, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(440, 'Mobile Application', 856.00, 10, 6.00, 134, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(441, 'Training', 605.00, 10, 4.00, 134, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(442, 'Mobile Application', 452.00, 6, 1.00, 135, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(443, 'Charger', 960.00, 2, 9.00, 135, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(444, 'UI/UX Design', 996.00, 6, 7.00, 135, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(445, 'Training', 112.00, 9, 1.00, 135, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(446, 'Training', 639.00, 10, 4.00, 136, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(447, 'Domain Registration', 322.00, 2, 4.00, 136, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(448, 'Laptop', 873.00, 8, 4.00, 137, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(449, 'Mobile Application', 210.00, 4, 6.00, 137, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(450, 'Logo Design', 662.00, 8, 8.00, 138, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(451, 'Data Entry', 276.00, 4, 10.00, 138, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(452, 'Website Design', 778.00, 2, 10.00, 139, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(453, 'Mobile Repair', 387.00, 5, 4.00, 139, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(454, 'Charger', 587.00, 10, 2.00, 139, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(455, 'Laptop', 801.00, 8, 9.00, 139, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(456, 'Mobile Application', 714.00, 1, 8.00, 140, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(457, 'Mobile Application', 928.00, 9, 2.00, 140, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(458, 'Laptop', 453.00, 4, 8.00, 140, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(459, 'Logo Design', 218.00, 6, 5.00, 140, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(460, 'AI Services', 823.00, 1, 3.00, 141, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(461, 'Domain Registration', 366.00, 9, 2.00, 141, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(462, 'AWS Service', 186.00, 5, 3.00, 141, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(463, 'AWS Service', 633.00, 8, 7.00, 142, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(464, 'AWS Service', 567.00, 2, 1.00, 142, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(465, 'Laptop Repair', 669.00, 10, 4.00, 143, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(466, 'Mobile Repair', 201.00, 4, 1.00, 144, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(467, 'Data Entry', 772.00, 2, 3.00, 144, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(468, 'Domain Registration', 922.00, 10, 10.00, 144, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(469, 'Data Entry', 467.00, 9, 9.00, 145, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(470, 'Website Design', 143.00, 8, 3.00, 145, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(471, 'Data Entry', 928.00, 1, 5.00, 145, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(472, 'Data Entry', 645.00, 9, 1.00, 145, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(473, 'UI/UX Design', 927.00, 9, 1.00, 145, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(474, 'Website Design', 138.00, 3, 4.00, 146, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(475, 'Data Entry', 884.00, 3, 1.00, 146, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(476, 'UI/UX Design', 744.00, 6, 8.00, 146, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(477, 'Mobile Application', 571.00, 1, 1.00, 147, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(478, 'Domain Registration', 744.00, 6, 6.00, 147, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(479, 'AWS Service', 965.00, 8, 6.00, 148, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(480, 'Laptop', 563.00, 9, 7.00, 148, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(481, 'Laptop', 916.00, 2, 6.00, 148, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(482, 'Laptop', 616.00, 4, 10.00, 149, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(483, 'Data Entry', 213.00, 1, 9.00, 149, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(484, 'Charger', 288.00, 9, 2.00, 149, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(485, 'AI Services', 842.00, 2, 1.00, 150, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(486, 'Domain Registration', 104.00, 2, 5.00, 151, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(487, 'Website Design', 416.00, 9, 4.00, 151, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(488, 'Mobile Repair', 547.00, 9, 8.00, 151, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(489, 'Training', 206.00, 5, 3.00, 152, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(490, 'Laptop Repair', 864.00, 10, 5.00, 152, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(491, 'Laptop Repair', 407.00, 10, 4.00, 152, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(492, 'UI/UX Design', 727.00, 9, 9.00, 152, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(493, 'AI Services', 398.00, 1, 1.00, 153, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(494, 'AI Services', 138.00, 9, 9.00, 153, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(495, 'Mobile Application', 983.00, 7, 2.00, 153, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(496, 'UI/UX Design', 350.00, 9, 10.00, 153, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(497, 'Logo Design', 291.00, 6, 9.00, 154, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(498, 'Mobile Repair', 447.00, 7, 10.00, 154, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(499, 'AWS Service', 926.00, 3, 4.00, 155, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(500, 'AWS Service', 617.00, 3, 2.00, 156, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(501, 'AWS Service', 995.00, 2, 3.00, 156, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(502, 'Data Entry', 454.00, 10, 7.00, 156, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(503, 'Laptop', 153.00, 3, 7.00, 157, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(504, 'AI Services', 722.00, 7, 9.00, 157, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(505, 'Laptop Repair', 837.00, 1, 6.00, 157, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(506, 'AWS Service', 975.00, 5, 7.00, 157, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(507, 'Laptop', 325.00, 3, 3.00, 158, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(508, 'Mobile Application', 847.00, 5, 2.00, 158, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(509, 'Mobile Repair', 187.00, 5, 5.00, 159, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(510, 'UI/UX Design', 886.00, 1, 1.00, 159, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(511, 'AI Services', 622.00, 1, 4.00, 159, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(512, 'Domain Registration', 114.00, 10, 6.00, 159, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(513, 'UI/UX Design', 400.00, 4, 4.00, 159, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(514, 'AWS Service', 389.00, 2, 10.00, 160, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(515, 'Data Entry', 823.00, 8, 4.00, 160, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(516, 'Charger', 947.00, 10, 2.00, 161, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(517, 'AWS Service', 791.00, 4, 7.00, 161, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(518, 'Mobile Application', 541.00, 7, 9.00, 161, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(519, 'Website Design', 377.00, 3, 3.00, 161, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(520, 'Charger', 638.00, 4, 8.00, 162, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(521, 'Mobile Repair', 461.00, 8, 2.00, 162, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(522, 'AWS Service', 230.00, 4, 7.00, 162, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(523, 'Charger', 344.00, 9, 3.00, 162, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(524, 'UI/UX Design', 606.00, 5, 9.00, 162, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(525, 'Domain Registration', 814.00, 9, 2.00, 163, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(526, 'Mobile Repair', 457.00, 1, 5.00, 163, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(527, 'Laptop', 377.00, 6, 4.00, 163, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(528, 'UI/UX Design', 331.00, 9, 9.00, 163, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(529, 'Training', 151.00, 10, 8.00, 164, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(530, 'Laptop', 832.00, 1, 9.00, 164, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(531, 'Logo Design', 549.00, 1, 6.00, 165, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(532, 'Logo Design', 206.00, 10, 6.00, 166, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(533, 'Training', 452.00, 2, 8.00, 166, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(534, 'Domain Registration', 535.00, 2, 5.00, 166, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(535, 'UI/UX Design', 328.00, 4, 6.00, 166, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(536, 'AI Services', 721.00, 4, 1.00, 167, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(537, 'Domain Registration', 805.00, 3, 6.00, 167, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(538, 'Laptop Repair', 398.00, 6, 1.00, 168, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(539, 'Logo Design', 735.00, 9, 8.00, 168, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(540, 'Mobile Repair', 217.00, 1, 9.00, 168, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(541, 'Website Design', 422.00, 10, 1.00, 169, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(542, 'Mobile Application', 234.00, 7, 3.00, 169, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(543, 'Charger', 269.00, 2, 4.00, 170, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(544, 'Website Design', 256.00, 10, 3.00, 170, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(545, 'Charger', 489.00, 4, 2.00, 170, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(546, 'UI/UX Design', 683.00, 3, 8.00, 170, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(547, 'Mobile Application', 283.00, 8, 3.00, 170, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(548, 'Training', 222.00, 7, 3.00, 171, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(549, 'Training', 798.00, 7, 4.00, 171, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(550, 'Mobile Repair', 902.00, 3, 9.00, 171, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(551, 'Logo Design', 639.00, 3, 5.00, 171, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(552, 'Website Design', 577.00, 5, 5.00, 171, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(553, 'Laptop', 789.00, 5, 4.00, 172, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(554, 'Mobile Repair', 832.00, 1, 10.00, 172, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(555, 'Laptop Repair', 938.00, 6, 8.00, 172, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(556, 'Laptop', 412.00, 7, 10.00, 172, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(557, 'UI/UX Design', 697.00, 2, 6.00, 173, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(558, 'Laptop', 484.00, 5, 1.00, 173, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(559, 'Data Entry', 125.00, 9, 3.00, 173, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(560, 'Laptop Repair', 699.00, 7, 5.00, 173, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(561, 'Data Entry', 598.00, 2, 3.00, 174, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(562, 'Data Entry', 672.00, 7, 7.00, 174, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(563, 'Laptop', 843.00, 1, 3.00, 174, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(564, 'AWS Service', 801.00, 1, 3.00, 175, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(565, 'Charger', 108.00, 9, 8.00, 175, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(566, 'AI Services', 507.00, 1, 5.00, 175, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(567, 'Data Entry', 778.00, 3, 3.00, 175, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(568, 'Website Design', 225.00, 8, 10.00, 176, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(569, 'Domain Registration', 767.00, 6, 8.00, 176, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(570, 'UI/UX Design', 491.00, 10, 2.00, 176, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(571, 'AWS Service', 526.00, 4, 8.00, 176, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(572, 'Mobile Application', 723.00, 10, 6.00, 177, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(573, 'Website Design', 345.00, 10, 10.00, 177, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(574, 'Laptop Repair', 948.00, 6, 6.00, 177, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(575, 'Domain Registration', 954.00, 8, 5.00, 177, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(576, 'Laptop Repair', 620.00, 4, 9.00, 178, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(577, 'Laptop', 286.00, 10, 2.00, 179, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(578, 'Training', 480.00, 2, 4.00, 179, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(579, 'Data Entry', 165.00, 6, 4.00, 180, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(580, 'Website Design', 555.00, 5, 1.00, 180, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(581, 'Data Entry', 913.00, 9, 4.00, 181, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(582, 'AI Services', 605.00, 3, 3.00, 181, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(583, 'Data Entry', 441.00, 1, 7.00, 181, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(584, 'Logo Design', 722.00, 2, 7.00, 182, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(585, 'UI/UX Design', 415.00, 5, 10.00, 183, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(586, 'Charger', 275.00, 2, 2.00, 183, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(587, 'Domain Registration', 911.00, 10, 6.00, 183, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(588, 'Website Design', 952.00, 4, 7.00, 183, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(589, 'Mobile Application', 936.00, 10, 2.00, 184, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(590, 'Mobile Repair', 158.00, 7, 10.00, 184, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(591, 'Logo Design', 453.00, 2, 7.00, 184, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(592, 'Charger', 493.00, 4, 2.00, 184, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(593, 'Data Entry', 679.00, 9, 5.00, 184, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(594, 'Data Entry', 934.00, 9, 7.00, 185, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(595, 'Laptop', 622.00, 4, 5.00, 186, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(596, 'AWS Service', 713.00, 3, 2.00, 186, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(597, 'AWS Service', 351.00, 1, 3.00, 186, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(598, 'AI Services', 456.00, 10, 2.00, 186, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(599, 'Domain Registration', 273.00, 3, 7.00, 186, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(600, 'Mobile Application', 347.00, 6, 3.00, 187, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(601, 'Data Entry', 196.00, 1, 9.00, 187, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(602, 'Laptop', 470.00, 10, 6.00, 188, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(603, 'Laptop Repair', 524.00, 2, 10.00, 188, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(604, 'Charger', 914.00, 7, 1.00, 188, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(605, 'Website Design', 162.00, 8, 7.00, 188, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(606, 'Mobile Repair', 822.00, 4, 3.00, 188, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(607, 'UI/UX Design', 467.00, 3, 8.00, 189, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(608, 'AI Services', 765.00, 6, 1.00, 189, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(609, 'Website Design', 937.00, 7, 1.00, 190, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(610, 'Domain Registration', 490.00, 9, 1.00, 191, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(611, 'Mobile Application', 872.00, 10, 4.00, 191, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(612, 'Laptop', 411.00, 3, 6.00, 191, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(613, 'Training', 341.00, 9, 7.00, 191, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(614, 'Logo Design', 366.00, 2, 6.00, 192, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(615, 'Domain Registration', 715.00, 7, 4.00, 192, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(616, 'Laptop', 278.00, 7, 8.00, 192, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(617, 'AI Services', 121.00, 9, 3.00, 193, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(618, 'Training', 800.00, 5, 2.00, 193, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(619, 'Mobile Application', 311.00, 9, 1.00, 193, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(620, 'AI Services', 760.00, 10, 3.00, 194, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(621, 'Laptop Repair', 229.00, 1, 7.00, 194, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(622, 'Mobile Application', 661.00, 8, 3.00, 195, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(623, 'Training', 501.00, 10, 4.00, 196, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(624, 'AI Services', 932.00, 1, 9.00, 196, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(625, 'AI Services', 372.00, 6, 6.00, 196, '2022-09-11 05:10:51', '2022-09-11 05:10:51');
INSERT INTO `invoice_items` (`id`, `particular`, `rate`, `amount`, `time`, `invoice_id`, `created_at`, `updated_at`) VALUES
(626, 'UI/UX Design', 750.00, 7, 9.00, 197, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(627, 'Mobile Application', 289.00, 1, 6.00, 197, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(628, 'Data Entry', 126.00, 2, 8.00, 197, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(629, 'Mobile Repair', 468.00, 9, 1.00, 198, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(630, 'Mobile Repair', 343.00, 5, 4.00, 199, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(631, 'Mobile Application', 353.00, 9, 7.00, 200, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(632, 'Laptop Repair', 195.00, 8, 3.00, 200, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(633, 'Website Design', 243.00, 9, 8.00, 200, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(634, 'AWS Service', 748.00, 8, 5.00, 201, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(635, 'Mobile Application', 529.00, 3, 2.00, 201, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(636, 'Mobile Repair', 517.00, 6, 5.00, 201, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(637, 'Laptop Repair', 341.00, 7, 9.00, 201, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(638, 'Mobile Repair', 255.00, 9, 9.00, 202, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(639, 'Training', 667.00, 9, 7.00, 203, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(640, 'Laptop', 397.00, 5, 4.00, 204, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(641, 'Domain Registration', 101.00, 5, 4.00, 204, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(642, 'Laptop', 379.00, 3, 7.00, 204, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(643, 'Domain Registration', 454.00, 6, 9.00, 204, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(644, 'Website Design', 121.00, 5, 4.00, 205, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(645, 'AWS Service', 561.00, 2, 3.00, 205, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(646, 'Charger', 503.00, 2, 4.00, 206, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(647, 'AI Services', 465.00, 1, 3.00, 206, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(648, 'AI Services', 609.00, 7, 8.00, 206, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(649, 'Mobile Application', 232.00, 8, 4.00, 206, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(650, 'Laptop Repair', 669.00, 10, 6.00, 207, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(651, 'Mobile Application', 701.00, 7, 2.00, 207, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(652, 'Training', 697.00, 2, 10.00, 207, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(653, 'Website Design', 464.00, 10, 7.00, 207, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(654, 'Laptop', 896.00, 10, 4.00, 207, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(655, 'Training', 646.00, 9, 2.00, 208, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(656, 'Mobile Application', 441.00, 8, 1.00, 208, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(657, 'Logo Design', 291.00, 1, 5.00, 208, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(658, 'Logo Design', 585.00, 4, 9.00, 208, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(659, 'Laptop', 694.00, 3, 5.00, 209, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(660, 'UI/UX Design', 429.00, 4, 7.00, 209, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(661, 'AI Services', 777.00, 4, 4.00, 209, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(662, 'AI Services', 174.00, 6, 8.00, 209, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(663, 'Mobile Repair', 405.00, 8, 9.00, 210, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(664, 'AI Services', 885.00, 5, 8.00, 210, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(665, 'UI/UX Design', 492.00, 2, 7.00, 210, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(666, 'Domain Registration', 280.00, 8, 6.00, 210, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(667, 'UI/UX Design', 987.00, 6, 5.00, 210, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(668, 'Charger', 486.00, 7, 4.00, 211, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(669, 'Laptop', 942.00, 5, 10.00, 212, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(670, 'AWS Service', 546.00, 4, 10.00, 212, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(671, 'Mobile Application', 351.00, 9, 10.00, 212, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(672, 'Laptop Repair', 181.00, 1, 9.00, 212, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(673, 'Laptop', 631.00, 6, 2.00, 213, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(674, 'Logo Design', 702.00, 2, 6.00, 213, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(675, 'Data Entry', 253.00, 10, 9.00, 213, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(676, 'Laptop', 904.00, 5, 3.00, 213, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(677, 'UI/UX Design', 121.00, 7, 5.00, 213, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(678, 'AI Services', 988.00, 6, 9.00, 214, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(679, 'Mobile Repair', 182.00, 4, 1.00, 214, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(680, 'Charger', 830.00, 1, 5.00, 215, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(681, 'Website Design', 175.00, 5, 10.00, 216, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(682, 'Mobile Repair', 682.00, 6, 10.00, 216, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(683, 'Laptop', 597.00, 8, 1.00, 216, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(684, 'Laptop', 309.00, 10, 5.00, 216, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(685, 'Charger', 982.00, 3, 9.00, 217, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(686, 'Laptop', 994.00, 5, 9.00, 217, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(687, 'Training', 860.00, 9, 8.00, 217, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(688, 'Laptop', 733.00, 4, 3.00, 217, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(689, 'Training', 617.00, 10, 8.00, 217, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(690, 'Logo Design', 315.00, 7, 7.00, 218, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(691, 'Logo Design', 302.00, 4, 3.00, 218, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(692, 'AWS Service', 891.00, 6, 2.00, 218, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(693, 'Laptop', 830.00, 4, 4.00, 219, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(694, 'Logo Design', 491.00, 7, 6.00, 219, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(695, 'Website Design', 374.00, 9, 1.00, 219, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(696, 'Mobile Application', 421.00, 3, 6.00, 219, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(697, 'Data Entry', 365.00, 8, 9.00, 219, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(698, 'Training', 592.00, 3, 8.00, 220, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(699, 'Charger', 895.00, 4, 7.00, 221, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(700, 'Charger', 961.00, 4, 7.00, 221, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(701, 'Laptop Repair', 268.00, 3, 7.00, 221, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(702, 'AI Services', 395.00, 1, 5.00, 222, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(703, 'Website Design', 772.00, 7, 6.00, 222, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(704, 'AWS Service', 734.00, 5, 3.00, 222, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(705, 'Training', 474.00, 9, 9.00, 222, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(706, 'AI Services', 515.00, 10, 4.00, 222, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(707, 'Domain Registration', 280.00, 5, 5.00, 223, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(708, 'Website Design', 278.00, 9, 4.00, 223, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(709, 'Mobile Repair', 739.00, 1, 2.00, 223, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(710, 'Laptop', 712.00, 5, 8.00, 224, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(711, 'Logo Design', 953.00, 9, 1.00, 224, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(712, 'Domain Registration', 842.00, 2, 5.00, 224, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(713, 'UI/UX Design', 225.00, 5, 2.00, 224, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(714, 'Laptop Repair', 486.00, 10, 10.00, 225, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(715, 'UI/UX Design', 695.00, 8, 7.00, 225, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(716, 'Mobile Application', 278.00, 1, 3.00, 226, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(717, 'Mobile Application', 530.00, 10, 4.00, 226, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(718, 'Laptop', 864.00, 4, 6.00, 227, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(719, 'AI Services', 320.00, 8, 4.00, 227, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(720, 'Data Entry', 424.00, 8, 1.00, 227, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(721, 'UI/UX Design', 189.00, 3, 8.00, 227, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(722, 'AI Services', 470.00, 1, 2.00, 228, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(723, 'UI/UX Design', 582.00, 10, 3.00, 228, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(724, 'Website Design', 929.00, 9, 4.00, 228, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(725, 'Training', 346.00, 10, 7.00, 229, '2022-09-11 05:10:51', '2022-09-11 05:10:51'),
(726, 'Website Design', 320.00, 1, 3.00, 230, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(727, 'Mobile Repair', 248.00, 7, 1.00, 230, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(728, 'Charger', 746.00, 5, 9.00, 230, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(729, 'Laptop Repair', 742.00, 6, 1.00, 230, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(730, 'Domain Registration', 334.00, 5, 5.00, 231, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(731, 'Laptop Repair', 422.00, 3, 8.00, 231, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(732, 'UI/UX Design', 850.00, 1, 2.00, 231, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(733, 'Training', 544.00, 3, 7.00, 231, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(734, 'Training', 429.00, 10, 4.00, 232, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(735, 'Laptop Repair', 761.00, 9, 2.00, 232, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(736, 'AI Services', 906.00, 2, 2.00, 233, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(737, 'Charger', 625.00, 6, 5.00, 233, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(738, 'Laptop', 862.00, 8, 5.00, 233, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(739, 'Domain Registration', 792.00, 8, 9.00, 233, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(740, 'Domain Registration', 558.00, 9, 3.00, 233, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(741, 'Laptop Repair', 143.00, 2, 5.00, 234, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(742, 'Domain Registration', 606.00, 7, 3.00, 234, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(743, 'UI/UX Design', 441.00, 8, 4.00, 235, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(744, 'Mobile Application', 449.00, 10, 9.00, 235, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(745, 'AI Services', 572.00, 2, 8.00, 235, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(746, 'AWS Service', 731.00, 8, 10.00, 235, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(747, 'UI/UX Design', 704.00, 8, 8.00, 236, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(748, 'Logo Design', 578.00, 8, 3.00, 237, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(749, 'Website Design', 288.00, 8, 6.00, 238, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(750, 'Mobile Repair', 583.00, 8, 5.00, 238, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(751, 'Laptop Repair', 916.00, 2, 1.00, 238, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(752, 'Website Design', 623.00, 5, 4.00, 238, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(753, 'Domain Registration', 964.00, 4, 1.00, 239, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(754, 'Mobile Repair', 943.00, 5, 1.00, 239, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(755, 'AI Services', 362.00, 4, 8.00, 239, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(756, 'AI Services', 467.00, 10, 10.00, 239, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(757, 'Laptop', 300.00, 6, 9.00, 240, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(758, 'Logo Design', 133.00, 3, 2.00, 240, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(759, 'Laptop Repair', 298.00, 1, 7.00, 240, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(760, 'Mobile Repair', 866.00, 3, 4.00, 240, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(761, 'Data Entry', 827.00, 1, 2.00, 241, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(762, 'Website Design', 556.00, 4, 9.00, 242, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(763, 'Charger', 986.00, 2, 7.00, 242, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(764, 'AI Services', 785.00, 10, 7.00, 242, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(765, 'Mobile Repair', 789.00, 8, 5.00, 242, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(766, 'AI Services', 181.00, 1, 10.00, 242, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(767, 'Logo Design', 457.00, 3, 9.00, 243, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(768, 'Domain Registration', 232.00, 3, 8.00, 243, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(769, 'Website Design', 695.00, 7, 8.00, 243, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(770, 'Data Entry', 186.00, 3, 4.00, 243, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(771, 'AWS Service', 823.00, 2, 4.00, 243, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(772, 'Training', 821.00, 6, 9.00, 244, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(773, 'Data Entry', 638.00, 4, 4.00, 245, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(774, 'AI Services', 243.00, 10, 6.00, 245, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(775, 'Laptop Repair', 878.00, 9, 2.00, 246, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(776, 'Domain Registration', 348.00, 4, 4.00, 246, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(777, 'Data Entry', 843.00, 2, 5.00, 246, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(778, 'Website Design', 909.00, 2, 1.00, 247, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(779, 'Training', 634.00, 3, 2.00, 248, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(780, 'Laptop', 366.00, 1, 7.00, 248, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(781, 'Domain Registration', 163.00, 4, 4.00, 249, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(782, 'Laptop', 753.00, 4, 1.00, 250, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(783, 'Mobile Application', 824.00, 3, 3.00, 250, '2022-09-11 05:10:52', '2022-09-11 05:10:52'),
(784, 'sdfsdf', 34.00, 23, 34.00, 251, '2022-11-03 23:53:46', '2022-11-03 23:53:46'),
(785, 'Mobile Application', 723.00, 7, 5.00, 23, '2022-11-04 12:30:23', '2022-11-04 12:30:23'),
(800, 'Mobile Application', 518.00, 6, 2.00, 132, '2023-03-25 01:42:29', '2023-03-25 01:42:29'),
(801, 'Mobile Application', 666.00, 7, 8.00, 132, '2023-03-25 01:42:29', '2023-03-25 01:42:29'),
(802, 'Laptop Repair', 341.00, 9, 9.00, 132, '2023-03-25 01:42:29', '2023-03-25 01:42:29'),
(803, 'Domain Registration', 859.00, 7, 1.00, 132, '2023-03-25 01:42:29', '2023-03-25 01:42:29'),
(804, 'Domain Registration', 343.00, 7, 3.00, 20, '2023-03-25 01:43:06', '2023-03-25 01:43:06'),
(805, 'Mobile Application', 177.00, 5, 1.00, 20, '2023-03-25 01:43:06', '2023-03-25 01:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_28_074851_create_contents_table', 2),
(6, '2022_08_28_075116_create_categories_table', 3),
(8, '2022_08_28_094037_create_sub_categories_table', 4),
(10, '2022_08_28_104255_create_products_table', 5),
(11, '2022_08_28_104639_create_product_sub_categories_table', 5),
(14, '2022_08_28_122335_create_color_sizes_table', 6),
(15, '2022_08_29_045353_create_product_details_table', 7),
(16, '2022_08_29_060437_create_product_detail_images_table', 8),
(18, '2022_08_30_060704_create_admins_table', 9),
(19, '2022_08_31_092106_add_cover_image_to_products_table', 10),
(20, '2022_08_31_093644_add_tags_column_to_products_table', 11),
(21, '2022_09_01_060621_create_permission_tables', 12),
(23, '2022_09_02_054020_create_priority_table', 13),
(25, '2022_09_02_063257_create_tasks_table', 14),
(35, '2022_09_02_072509_create_admin_has_tasks_table', 15),
(38, '2022_09_02_112217_create_role_hierarchies_table', 16),
(43, '2022_09_04_060319_create_user_tasks_table', 17),
(45, '2022_09_04_080021_add_completion_time_column_to_user_tasks_table', 18),
(47, '2022_09_04_084011_create_transfer_logs_table', 19),
(56, '2022_09_04_113424_create_invoices_table', 20),
(57, '2022_09_04_113802_create_invoice_items_table', 20),
(58, '2022_09_06_092906_create_vendors_table', 21),
(59, '2022_09_06_095314_create_purchase_bills_table', 22),
(60, '2022_09_06_095605_create_purchase_bill_items_table', 23),
(62, '2022_09_11_050614_add_time_column_to_invoice_items_table', 24),
(63, '2022_09_11_104004_add_date_of_entry_column_to_invoices_table', 25),
(64, '2022_09_11_111117_add_date_of_entry_column_to_purchase_bills_table', 26),
(65, '2022_09_11_113141_create_fiscal_years_table', 27),
(66, '2022_10_31_085303_create_jobs_table', 28),
(67, '2022_10_31_090710_create_newsletters_table', 29),
(68, '2022_10_31_090920_create_newsletter_users_table', 30),
(69, '2022_10_31_110015_create_services_table', 31),
(70, '2022_11_01_054545_create_inquiries_table', 32),
(71, '2022_11_01_093527_create_user_task_feedback_table', 33),
(72, '2023_03_23_103759_admin_bankdetails', 34),
(74, '2023_03_23_115948_admindocuments', 35),
(75, '2023_03_24_030129_user_contacts', 36),
(80, '2023_03_24_084345_service_type', 37),
(81, '2023_03_24_084357_programming_type', 37),
(83, '2023_03_24_102723_client_services', 38);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(3, 'App\\Models\\Admin', 3),
(4, 'App\\Models\\Admin', 1),
(4, 'App\\Models\\Admin', 4),
(4, 'App\\Models\\Admin', 5),
(4, 'App\\Models\\Admin', 6),
(5, 'App\\Models\\Admin', 9),
(5, 'App\\Models\\Admin', 10),
(6, 'App\\Models\\Admin', 7),
(6, 'App\\Models\\Admin', 8);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `template` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `title`, `content`, `template`, `created_at`, `updated_at`) VALUES
(3, 'Voluptates nisi quae', '<p>sdfsdfsd</p>', 'test', '2022-10-31 03:33:35', '2022-10-31 03:33:35'),
(4, 'asdasdasdsad', '<p>sadsdfsdfsdfsds</p>', 'test', '2022-10-31 03:43:30', '2022-10-31 03:43:30'),
(5, 'asdfsdfsd', '<p>fdsfssdfsdfds</p>', 'main', '2022-11-03 23:56:42', '2022-11-03 23:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_users`
--

CREATE TABLE `newsletter_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `newsletter_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletter_users`
--

INSERT INTO `newsletter_users` (`id`, `newsletter_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 3, 2, NULL, NULL),
(3, 3, 4, NULL, NULL),
(4, 3, 5, NULL, NULL),
(6, 4, 2, NULL, NULL),
(7, 4, 3, NULL, NULL),
(8, 4, 4, NULL, NULL),
(9, 4, 5, NULL, NULL),
(10, 4, 6, NULL, NULL),
(11, 4, 7, NULL, NULL),
(13, 4, 9, NULL, NULL),
(15, 5, 2, NULL, NULL),
(16, 5, 3, NULL, NULL),
(17, 5, 4, NULL, NULL),
(18, 5, 5, NULL, NULL),
(19, 5, 6, NULL, NULL),
(20, 5, 7, NULL, NULL),
(22, 5, 9, NULL, NULL);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(9, 'category_access', 'admin', '2022-09-01 03:41:21', '2022-09-01 03:41:21'),
(10, 'category_add', 'admin', '2022-09-01 03:41:21', '2022-09-01 03:41:21'),
(11, 'category_edit', 'admin', '2022-09-01 03:41:21', '2022-09-01 03:41:21'),
(12, 'category_delete', 'admin', '2022-09-01 03:41:21', '2022-09-01 03:41:21'),
(13, 'sub_category_access', 'admin', '2022-09-01 03:41:21', '2022-09-01 03:41:21'),
(14, 'sub_category_add', 'admin', '2022-09-01 03:41:21', '2022-09-01 03:41:21'),
(15, 'sub_category_edit', 'admin', '2022-09-01 03:41:21', '2022-09-01 03:41:21'),
(16, 'sub_category_delete', 'admin', '2022-09-01 03:41:21', '2022-09-01 03:41:21'),
(17, 'product_access', 'admin', '2022-09-01 03:41:21', '2022-09-01 03:41:21'),
(18, 'product_add', 'admin', '2022-09-01 03:41:21', '2022-09-01 03:41:21'),
(19, 'product_edit', 'admin', '2022-09-01 03:41:21', '2022-09-01 03:41:21'),
(20, 'product_delete', 'admin', '2022-09-01 03:41:21', '2022-09-01 03:41:21'),
(21, 'product_manage', 'admin', '2022-09-01 03:41:21', '2022-09-01 03:41:21'),
(22, 'color_size_access', 'admin', '2022-09-01 03:41:21', '2022-09-01 03:41:21'),
(23, 'color_size_add', 'admin', '2022-09-01 03:41:21', '2022-09-01 03:41:21'),
(24, 'color_size_edit', 'admin', '2022-09-01 03:41:21', '2022-09-01 03:41:21'),
(25, 'color_size_delete', 'admin', '2022-09-01 03:41:21', '2022-09-01 03:41:21'),
(26, 'admin_manage_access', 'admin', '2022-09-01 03:41:21', '2022-09-01 03:41:21'),
(27, 'admin_manage_add', 'admin', '2022-09-01 03:41:21', '2022-09-01 03:41:21'),
(28, 'admin_manage_edit', 'admin', '2022-09-01 03:41:21', '2022-09-01 03:41:21'),
(29, 'admin_manage_delete', 'admin', '2022-09-01 03:41:21', '2022-09-01 03:41:21'),
(30, 'user_task_access', 'admin', '2022-09-04 00:55:09', '2022-09-04 00:55:09'),
(31, 'user_task_delete', 'admin', '2022-09-04 00:55:09', '2022-09-04 00:55:09'),
(32, 'user_task_forward', 'admin', '2022-09-04 00:55:09', '2022-09-04 00:55:09'),
(33, 'invoice_access', 'admin', '2022-09-04 06:00:56', '2022-09-04 06:00:56'),
(34, 'invoice_add', 'admin', '2022-09-04 06:00:56', '2022-09-04 06:00:56'),
(35, 'invoice_edit', 'admin', '2022-09-04 06:00:56', '2022-09-04 06:00:56'),
(36, 'invoice_delete', 'admin', '2022-09-04 06:00:56', '2022-09-04 06:00:56'),
(37, 'vendor_access', 'admin', '2022-09-06 03:47:52', '2022-09-06 03:47:52'),
(38, 'vendor_add', 'admin', '2022-09-06 03:47:52', '2022-09-06 03:47:52'),
(39, 'vendor_edit', 'admin', '2022-09-06 03:47:52', '2022-09-06 03:47:52'),
(40, 'vendor_delete', 'admin', '2022-09-06 03:47:52', '2022-09-06 03:47:52'),
(41, 'purchase_bill_access', 'admin', '2022-09-06 04:17:36', '2022-09-06 04:17:36'),
(42, 'purchase_bill_add', 'admin', '2022-09-06 04:17:36', '2022-09-06 04:17:36'),
(43, 'purchase_bill_edit', 'admin', '2022-09-06 04:17:36', '2022-09-06 04:17:36'),
(44, 'purchase_bill_delete', 'admin', '2022-09-06 04:17:36', '2022-09-06 04:17:36'),
(45, 'newsletter_access', 'admin', '2022-10-31 00:54:19', '2022-10-31 00:54:19'),
(46, 'newsletter_add', 'admin', '2022-10-31 00:54:19', '2022-10-31 00:54:19'),
(48, 'useractivity_access', 'admin', '2022-10-31 04:45:13', '2022-10-31 04:45:13');

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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

CREATE TABLE `priorities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Low', '2022-09-02 03:07:45', '2022-09-02 03:07:45'),
(2, 'Medium', '2022-09-02 03:07:45', '2022-09-02 03:07:45'),
(3, 'High', '2022-09-02 03:07:45', '2022-09-02 03:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `price` double(8,2) NOT NULL,
  `discounted_price` double(8,2) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `introduction`, `description`, `cover_image`, `tags`, `price`, `discounted_price`, `slug`, `sku`, `created_at`, `updated_at`) VALUES
(2, 'Shwal type 1', '<p>Shwal type 1 introduction</p>', '<p>Shwal type 1 description</p>', 'http://localhost:8000/storage/photos/1/download (10).jpg', 'hemp', 750.00, 650.00, 'Shwal-type-1', 'ST1', '2022-08-28 06:26:03', '2022-08-31 04:13:05'),
(3, 'Yak wool', '<p>asjdlkasd</p>', '<p>asldjs</p>', 'http://localhost:8000/storage/photos/1/download (11).jpg', 'craft', 566.00, 16.00, 'Yak-wool', 'In duis a qui ea ass', '2022-08-29 01:08:42', '2022-08-31 04:13:59'),
(5, 'Woolen jacket', '<p>Lorem ipsum dolor sit amet, per lorem lobortis necessitatibus te. Vel in suavitate persequeris. Latine adipisci vix ut, ea cum brute urbanitas moderatius. In pro quas rebum qualisque. Ea ius option adipiscing. Tale bonorum epicuri mel no.</p>\r\n<p>Ut pri illum bonorum, duo choro laudem necessitatibus eu. Mea etiam conceptam no. Wisi postea ad sit. Cum an tantas facete. Est an fugit periculis, ea vim nonumy altera omittantur, eum fugit veritus molestiae ad.</p>\r\n<p>His in epicurei mandamus. Sea te nobis dolore principes, meis habemus omittam pri ex, in decore debitis nec. Fabulas elaboraret ea pro. Usu audiam feugait facilisis te, at duo quidam complectitur, pro at eruditi deleniti iudicabit. At eam viderer officiis nominati.</p>\r\n<p>Et sed unum accusamus vulputate. Mea id omnium option eloquentiam. Dicit omnium contentiones ut quo, atomorum incorrupte eu mea. Nec ei vidit utinam, ferri omnesque pri et. Ea eos dicit aperiam, nibh munere interpretaris has id.</p>\r\n<p>Essent tamquam id his, sapientem reformidans definitionem est ut. Mea ex quod movet vivendum, eos veri tacimates patrioque in. Eripuit laoreet corpora qui ei. Vocibus perpetua interpretaris ut nam, vis augue lobortis id. Ea vis animal aperiam corpora, per in iusto deseruisse.</p>\r\n<p>Has et illud postea, primis feugait probatus ex est. Dicam doming possit nec ei, duo ut labore principes, legimus molestiae no mei. Per at sale insolens, paulo singulis ei nam. Legendos consequat ei eos, nibh aeque honestatis cu sit, docendi eleifend petentium mea et. Affert accommodare has et, cu nam accumsan pericula, at deserunt mediocrem euripidis qui. Ius ex prima ridens, sit id eros accusam delectus.</p>\r\n<p>Ullum graece animal pro ne, in eruditi delectus appareat mea, eam dicit verterem ex. Stet aliquam ius in. Eu sea odio nonumes lucilius, his ne nibh accusam. In ius partiendo petentium, pri solet utinam hendrerit ea, mea munere periculis ne. Duo id cibo omnes noluisse.</p>\r\n<p>Nec ea sale graecis delectus, urbanitas torquatos reprimique ius te. Prima dicunt cum ei, posse laoreet eam ea. Possit epicurei partiendo eu usu, dignissim vulputate voluptaria mel at, habemus feugait voluptatum mea ad. Vis habemus vituperatoribus id, quod solum salutandi eu has, ad eum reque oblique.</p>\r\n<p>An mei admodum facilisi interpretaris, ea atqui munere quo. Nec ad discere imperdiet dignissim, per commodo qualisque abhorreant ut, nec ut tantas dissentiet. Ex vim alii libris omittantur. Id nam magna debet epicurei.</p>\r\n<p>Modo posse ubique ei mel. An propriae cotidieque duo, his ad dolore habemus dolores. An ubique tincidunt eum. Eam suscipit scaevola eu, solum summo ut nec. Verear feugiat vis ei, eu per patrioque hendrerit. Cum detracto appetere te.</p>', '<p>Lorem ipsum dolor sit amet, per lorem lobortis necessitatibus te. Vel in suavitate persequeris. Latine adipisci vix ut, ea cum brute urbanitas moderatius. In pro quas rebum qualisque. Ea ius option adipiscing. Tale bonorum epicuri mel no.</p>\r\n<p>Ut pri illum bonorum, duo choro laudem necessitatibus eu. Mea etiam conceptam no. Wisi postea ad sit. Cum an tantas facete. Est an fugit periculis, ea vim nonumy altera omittantur, eum fugit veritus molestiae ad.</p>\r\n<p>His in epicurei mandamus. Sea te nobis dolore principes, meis habemus omittam pri ex, in decore debitis nec. Fabulas elaboraret ea pro. Usu audiam feugait facilisis te, at duo quidam complectitur, pro at eruditi deleniti iudicabit. At eam viderer officiis nominati.</p>\r\n<p>Et sed unum accusamus vulputate. Mea id omnium option eloquentiam. Dicit omnium contentiones ut quo, atomorum incorrupte eu mea. Nec ei vidit utinam, ferri omnesque pri et. Ea eos dicit aperiam, nibh munere interpretaris has id.</p>\r\n<p>Essent tamquam id his, sapientem reformidans definitionem est ut. Mea ex quod movet vivendum, eos veri tacimates patrioque in. Eripuit laoreet corpora qui ei. Vocibus perpetua interpretaris ut nam, vis augue lobortis id. Ea vis animal aperiam corpora, per in iusto deseruisse.</p>\r\n<p>Has et illud postea, primis feugait probatus ex est. Dicam doming possit nec ei, duo ut labore principes, legimus molestiae no mei. Per at sale insolens, paulo singulis ei nam. Legendos consequat ei eos, nibh aeque honestatis cu sit, docendi eleifend petentium mea et. Affert accommodare has et, cu nam accumsan pericula, at deserunt mediocrem euripidis qui. Ius ex prima ridens, sit id eros accusam delectus.</p>\r\n<p>Ullum graece animal pro ne, in eruditi delectus appareat mea, eam dicit verterem ex. Stet aliquam ius in. Eu sea odio nonumes lucilius, his ne nibh accusam. In ius partiendo petentium, pri solet utinam hendrerit ea, mea munere periculis ne. Duo id cibo omnes noluisse.</p>\r\n<p>Nec ea sale graecis delectus, urbanitas torquatos reprimique ius te. Prima dicunt cum ei, posse laoreet eam ea. Possit epicurei partiendo eu usu, dignissim vulputate voluptaria mel at, habemus feugait voluptatum mea ad. Vis habemus vituperatoribus id, quod solum salutandi eu has, ad eum reque oblique.</p>\r\n<p>An mei admodum facilisi interpretaris, ea atqui munere quo. Nec ad discere imperdiet dignissim, per commodo qualisque abhorreant ut, nec ut tantas dissentiet. Ex vim alii libris omittantur. Id nam magna debet epicurei.</p>\r\n<p>Modo posse ubique ei mel. An propriae cotidieque duo, his ad dolore habemus dolores. An ubique tincidunt eum. Eam suscipit scaevola eu, solum summo ut nec. Verear feugiat vis ei, eu per patrioque hendrerit. Cum detracto appetere te.</p>', 'http://localhost:8000/storage/photos/1/image.jpg', '', 2000.00, 1800.00, 'Woolen-jacket', 'WJ1', '2022-08-31 03:41:38', '2022-08-31 03:43:31'),
(6, 'Hemp backpack', '<p>lorem ipsum</p>', '<p>lorem ipsum</p>', 'http://localhost:8000/storage/photos/1/download (12).jpg', 'hemp, craft', 900.00, 700.00, 'Hemp-backpack', 'hb3', '2022-08-31 03:48:26', '2022-08-31 03:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `size_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `product_id`, `color_id`, `size_id`, `quantity`, `created_at`, `updated_at`) VALUES
(12, 3, 1, 3, 85, '2022-08-29 04:45:56', '2022-08-29 05:06:49'),
(13, 3, 1, 6, 30, '2022-08-29 05:04:20', '2022-08-29 05:04:20'),
(15, 6, 4, 6, 30, '2022-09-01 02:56:06', '2022-09-01 02:56:22'),
(16, 6, 4, 3, 10, '2022-09-01 02:57:27', '2022-09-01 02:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `product_detail_images`
--

CREATE TABLE `product_detail_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_detail_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_detail_images`
--

INSERT INTO `product_detail_images` (`id`, `image`, `product_detail_id`, `created_at`, `updated_at`) VALUES
(29, 'http://localhost:8000/storage/photos/1/download.jpg', 12, '2022-08-29 06:12:20', '2022-08-29 06:12:20'),
(32, 'http://localhost:8000/storage/photos/1/download (6).jpg', 13, '2022-08-30 00:05:40', '2022-08-30 00:05:40'),
(33, 'http://localhost:8000/storage/photos/3/download (7).jpg', 15, '2022-09-01 02:57:17', '2022-09-01 02:57:17'),
(34, 'http://localhost:8000/storage/photos/3/download (9).jpg', 16, '2022-09-01 02:57:59', '2022-09-01 02:57:59'),
(35, 'http://localhost:8000/storage/photos/3/gjh.jpg', 15, '2022-09-01 02:58:33', '2022-09-01 02:58:33');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_categories`
--

CREATE TABLE `product_sub_categories` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sub_categories`
--

INSERT INTO `product_sub_categories` (`product_id`, `sub_category_id`) VALUES
(2, 3),
(3, 3),
(3, 4),
(5, 3),
(6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `programming_types`
--

CREATE TABLE `programming_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programming_types`
--

INSERT INTO `programming_types` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Laravel Version 8.0', '2023-03-24 04:05:56', '2023-03-24 04:06:10'),
(2, 'Laravel Version 6.2', '2023-03-24 04:06:21', '2023-03-24 04:06:21'),
(3, 'CodeIgniter - CI', '2023-03-24 04:06:43', '2023-03-24 04:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_bills`
--

CREATE TABLE `purchase_bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total` double(8,2) DEFAULT NULL,
  `discount` double(8,2) NOT NULL DEFAULT 0.00,
  `vat` double(8,2) NOT NULL DEFAULT 0.00,
  `bill_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_entry` date DEFAULT NULL,
  `remarks` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_bills`
--

INSERT INTO `purchase_bills` (`id`, `vendor_id`, `total`, `discount`, `vat`, `bill_no`, `date_of_entry`, `remarks`, `created_at`, `updated_at`) VALUES
(2, 9, 49000.00, 1000.00, 0.00, 'appl-376', '2022-09-08', 'Laptop buy', '2022-09-06 06:04:18', '2022-09-11 05:33:44'),
(3, 1, 288756.00, 0.00, 0.00, '1234', NULL, NULL, '2022-09-06 06:55:21', '2022-09-06 06:55:21'),
(4, 1, 11300.00, 0.00, 1300.00, 'st23323', '2022-09-05', 'Laptop bought', '2022-09-11 05:32:16', '2022-09-11 05:32:16'),
(5, 3, 4479.32, 41.00, 515.32, 'Placeat et quis eos', '1976-07-02', 'Adipisicing et amet', '2023-03-22 07:40:45', '2023-03-22 07:40:45'),
(6, 5, 4948.00, 10.00, 0.00, 'Perspiciatis nobis', '2001-04-03', 'Commodi eum distinct', '2023-03-22 07:40:57', '2023-03-22 07:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_bill_items`
--

CREATE TABLE `purchase_bill_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `particular` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` double(8,2) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `purchase_bill_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_bill_items`
--

INSERT INTO `purchase_bill_items` (`id`, `particular`, `rate`, `amount`, `purchase_bill_id`, `created_at`, `updated_at`) VALUES
(17, '1234', 1234.00, 234, 3, '2022-09-06 06:55:21', '2022-09-06 06:55:21'),
(18, 'Laptop', 1000.00, 10, 4, '2022-09-11 05:32:17', '2022-09-11 05:32:17'),
(20, 'Laptop', 5000.00, 10, 2, '2022-09-11 05:33:44', '2022-09-11 05:33:44'),
(21, 'Cupidatat culpa comm', 89.00, 45, 5, '2023-03-22 07:40:45', '2023-03-22 07:40:45'),
(22, 'Ut sed quia beatae u', 67.00, 74, 6, '2023-03-22 07:40:57', '2023-03-22 07:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(3, 'Super Admin', 'admin', '2022-09-01 03:27:56', '2022-09-01 03:27:56'),
(4, 'Admin', 'admin', '2022-09-01 03:46:49', '2022-09-01 03:46:49'),
(5, 'Editor', 'admin', '2022-09-02 05:18:20', '2022-09-02 05:18:20'),
(6, 'Moderator', 'admin', '2022-09-02 05:21:05', '2022-09-02 05:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(9, 5),
(9, 6),
(10, 4),
(11, 4),
(11, 5),
(12, 4),
(13, 4),
(13, 5),
(13, 6),
(14, 4),
(15, 4),
(15, 5),
(16, 4),
(17, 4),
(17, 5),
(17, 6),
(18, 4),
(19, 4),
(19, 5),
(20, 4),
(21, 4),
(22, 4),
(22, 6),
(23, 4),
(24, 4),
(24, 5),
(25, 4),
(26, 4),
(30, 3),
(30, 4),
(31, 3),
(31, 4),
(32, 3),
(32, 4),
(33, 3),
(33, 4),
(34, 3),
(34, 4),
(35, 3),
(35, 4),
(36, 3),
(36, 4),
(37, 3),
(37, 4),
(38, 3),
(38, 4),
(39, 3),
(39, 4),
(40, 3),
(40, 4),
(41, 3),
(41, 4),
(42, 3),
(42, 4),
(43, 3),
(43, 4),
(44, 3),
(44, 4),
(45, 3),
(45, 4),
(46, 3),
(46, 4),
(48, 3),
(48, 4),
(27, 4),
(9, 4),
(21, 5),
(22, 5);

-- --------------------------------------------------------

--
-- Table structure for table `role_hierarchies`
--

CREATE TABLE `role_hierarchies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_hierarchies`
--

INSERT INTO `role_hierarchies` (`id`, `role_id`, `parent_id`) VALUES
(1, 3, 0),
(2, 4, 3),
(3, 5, 4),
(4, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Domain', '2022-10-31 05:43:37', '2023-03-24 08:21:55'),
(2, 'Email', '2022-10-31 05:45:30', '2022-10-31 05:45:30'),
(3, 'Website Design & Development', '2022-10-31 05:45:40', '2023-03-24 08:22:32'),
(5, 'Hosting 1GB', '2023-03-24 08:22:04', '2023-03-24 08:22:04'),
(6, 'Hosting 2 GB', '2023-03-24 08:22:14', '2023-03-24 08:22:14'),
(7, 'Positive SSL Certificate', '2023-03-24 08:22:50', '2023-03-24 08:22:50');

-- --------------------------------------------------------

--
-- Table structure for table `service_types`
--

CREATE TABLE `service_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_types`
--

INSERT INTO `service_types` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Travel and Tours', '2023-03-24 03:50:01', '2023-03-24 03:50:01'),
(2, 'Bank and Finance', '2023-03-24 03:50:13', '2023-03-24 03:50:13'),
(3, 'News & Media', '2023-03-24 03:50:58', '2023-03-24 03:50:58'),
(4, 'Hotel and Resort', '2023-03-24 03:51:08', '2023-03-24 03:51:20'),
(6, 'Ecommerce & Business', '2023-03-24 04:00:03', '2023-03-24 04:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `content_id`, `category_id`, `created_at`, `updated_at`) VALUES
(3, 6, 3, '2022-08-28 04:42:24', '2022-08-28 04:54:38'),
(4, 7, 3, '2022-08-28 05:28:50', '2022-08-28 05:28:50');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deadline` datetime NOT NULL,
  `priority_id` bigint(20) UNSIGNED NOT NULL,
  `assigned_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `deadline`, `priority_id`, `assigned_by`, `created_at`, `updated_at`) VALUES
(1, 'Task 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2022-09-10 17:30:00', 1, 3, '2022-09-02 03:58:15', '2022-09-02 03:58:15'),
(2, 'task given by editor', '<p>Try this task</p>', '2022-09-16 18:32:00', 3, 9, '2022-09-02 07:03:32', '2022-09-02 07:03:32'),
(3, 'First task from user, do as soon as possible', '<p>First task description, you have to do it by tomorrow</p>', '2022-09-22 13:27:00', 2, 5, '2022-09-04 01:57:16', '2022-09-04 01:57:16'),
(4, 'Task by user 4', '<p>Add new product to system, [admin message: do it fast]</p>', '2022-09-16 14:05:00', 1, 5, '2022-09-04 02:35:35', '2022-09-04 02:35:35'),
(5, 'Latest task, admin special messs:', '<p>Do this task</p>', '2022-09-24 14:16:00', 2, 3, '2022-09-04 02:46:39', '2022-09-04 02:46:39'),
(6, 'Task for moderator 1', '<p>This is moderator task, do it properly</p>', '2022-09-15 14:30:00', 3, 6, '2022-09-04 03:00:38', '2022-09-04 03:00:38'),
(7, 'This task can be transferred', '<p>lorem ipsum</p>', '2022-09-23 15:07:00', 2, 6, '2022-09-04 03:37:49', '2022-09-04 03:37:49'),
(8, 'Task to editor test', '<p>test task</p>', '2022-09-22 16:58:00', 2, 6, '2022-09-04 05:28:34', '2022-09-04 05:28:34'),
(9, 'Check task', '<p>asflkjsdlk</p>', '2022-09-10 22:13:00', 1, 3, '2022-09-07 10:43:46', '2022-09-07 10:43:46'),
(10, 'Review product task', '<p>Task review system</p>', '2022-10-31 02:21:00', 3, 3, '2022-10-30 23:53:59', '2022-10-30 23:53:59'),
(11, 'Review product task', '<p>Task review system</p>', '2022-10-31 02:21:00', 3, 3, '2022-10-30 23:54:31', '2022-10-30 23:54:31'),
(12, 'sadasd', '<p>asdasdasd</p>', '2022-10-31 15:01:00', 1, 3, '2022-10-31 04:28:25', '2022-10-31 04:28:25'),
(13, 'Laravel migration fix', '<p>Please fix the migration</p>', '2010-08-04 07:57:00', 3, 3, '2022-11-03 23:44:50', '2022-11-03 23:44:50'),
(14, 'Fix hacking of SAPDC, FAST', '<p>Japanese loangau ayoo. Do it bibek sir</p>', '2022-11-05 01:21:00', 3, 3, '2022-11-03 23:51:18', '2022-11-03 23:51:18'),
(15, 'email issue', '<p>kisan muktinath enterprise email issue</p>', '2022-11-05 13:56:00', 3, 3, '2022-11-04 12:11:34', '2022-11-04 12:11:34'),
(16, 'server issue', '<p>website not working</p>', '2022-11-10 14:06:00', 1, 3, '2022-11-04 12:21:15', '2022-11-04 12:21:15');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_logs`
--

CREATE TABLE `transfer_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assign_task_id` bigint(20) UNSIGNED NOT NULL,
  `transferred_by` bigint(20) UNSIGNED NOT NULL,
  `transferred_to` bigint(20) UNSIGNED NOT NULL,
  `remarks` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transfer_logs`
--

INSERT INTO `transfer_logs` (`id`, `assign_task_id`, `transferred_by`, `transferred_to`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 10, 7, 8, 'Thank you for understanding', '2022-09-04 03:21:46', '2022-09-04 03:21:46'),
(2, 10, 8, 7, 'No, i wont do it', '2022-09-04 03:29:03', '2022-09-04 03:29:03'),
(3, 11, 6, 9, 'Thank you, please get it done', '2022-09-04 03:38:17', '2022-09-04 03:38:17'),
(4, 11, 9, 8, 'No i cannot, i will forward it to', '2022-09-04 03:39:47', '2022-09-04 03:39:47'),
(5, 14, 9, 7, 'Pleas elsfj', '2022-09-04 05:29:48', '2022-09-04 05:29:48'),
(6, 10, 7, 8, 'khasdkjads', '2022-09-07 10:43:03', '2022-09-07 10:43:03'),
(7, 15, 7, 8, 'kljada', '2022-09-07 10:43:57', '2022-09-07 10:43:57'),
(8, 20, 7, 8, 'asdasdassd', '2022-11-03 23:46:30', '2022-11-03 23:46:30');

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
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'User 1', 'user1@gmail.com', '2022-08-31 05:02:42', '$2y$10$0MjHV4b.9xaB62rzJXeCTeZEUo6LQLtXy5sYvBdgTFFujqAJ/uaka', NULL, '0', NULL, '2022-08-31 04:25:33', '2023-03-24 09:12:40'),
(3, 'user 2', 'user2@gmail.com', '2022-09-03 23:26:15', '$2y$10$V0mHFzaJ3xa7cmKtqP2m7OnY35fTgvncMBnIs3V3R92yzqi2OdoTe', NULL, '1', NULL, '2022-08-31 04:29:14', '2022-09-03 23:26:15'),
(4, 'user 3', 'user3@gmail.com', NULL, '$2y$10$8i3RRyP6vj889P7Bu9dAPOo1ko8LjOHg2pysy0TeE45mX235DJrXS', NULL, '1', NULL, '2022-08-31 04:31:07', '2022-08-31 04:31:07'),
(5, 'user 4', 'user4@gmail.com', '2022-09-04 02:34:32', '$2y$10$PNrA4BQCiXuWir7VuoIjY.khvxm7.d5LZ7tiDkHt2BMYDhgh91EW6', NULL, '1', NULL, '2022-08-31 04:32:39', '2022-09-04 02:34:32'),
(6, 'user 5', 'user5@gmail.com', NULL, '$2y$10$UlGRottpSe9Nyz5DwIAK4OPUBsI6lugqC/Zs4OYScDROpq5Yyeymu', NULL, '1', NULL, '2022-08-31 04:36:15', '2022-08-31 04:36:15'),
(7, 'user 6', 'user6@gmail.com', '2022-09-05 01:53:43', '$2y$10$1rMr4wbRFkbSOjGXhW21MOqhvLgUMOAe7dyEuT9.7z9gbUfC6cMny', NULL, '1', NULL, '2022-08-31 04:39:35', '2022-09-05 01:53:43'),
(9, 'Bijaya Chhetri', 'bijay0710@gmail.com', NULL, '$2y$10$G6.PZtiegi2muI6miHuuUetFBE.Gg.oa2RMS5oshUAHbsHXlVi/eG', '1679634248.jpg', '1', NULL, '2022-09-01 06:18:30', '2023-03-24 08:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_contacts`
--

CREATE TABLE `user_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_contacts`
--

INSERT INTO `user_contacts` (`id`, `user_id`, `name`, `phone`, `email`, `address`, `created_at`, `updated_at`) VALUES
(3, 9, 'Subir Joshi', '123123', 'suveer.joc@gmail.com', 'hetauda', '2023-03-24 01:47:16', '2023-03-24 01:47:16'),
(4, 9, 'Bijaya Chhetri', '123123', 'bijay@cyberlink.com.np', 'Butwal', '2023-03-24 09:12:05', '2023-03-24 09:12:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_tasks`
--

CREATE TABLE `user_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `assigned_by` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED DEFAULT NULL,
  `completion_time` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_tasks`
--

INSERT INTO `user_tasks` (`id`, `title`, `description`, `assigned_by`, `task_id`, `completion_time`, `created_at`, `updated_at`) VALUES
(1, 'First task from user', 'First task description', 2, 3, '2022-09-04 08:10:54', '2022-09-04 01:48:57', '2022-09-04 02:25:54'),
(2, 'I want to add new product', 'New product on wool section please', 1, NULL, '2022-09-04 08:27:55', '2022-09-04 02:07:08', '2022-09-04 02:42:55'),
(3, 'Task by user 4', 'Add new product to system', 5, 4, '2022-09-04 08:24:11', '2022-09-04 02:34:58', '2022-09-04 02:39:11'),
(4, 'Latest task', 'Do this task', 1, 5, '2022-09-04 08:33:00', '2022-09-04 02:45:05', '2022-09-04 02:48:00'),
(5, 'Check task', 'asflkjsdlk', 1, 9, NULL, '2022-09-07 10:39:11', '2022-09-07 10:43:46'),
(6, 'sadasd', 'asdasd', 1, 12, '2022-10-31 10:13:40', '2022-10-31 04:27:32', '2022-10-31 04:28:40'),
(7, 'Fix hacking of SAPDC', 'Japanese loangau ayoo', 1, 14, '2022-11-04 05:37:41', '2022-11-03 23:48:00', '2022-11-03 23:52:41'),
(8, 'Test task', 'Consequatur sint du', 3, NULL, NULL, '2022-11-04 00:29:48', '2022-11-04 00:29:48'),
(9, 'server issue', 'website not working', 1, 16, '2022-11-04 08:21:40', '2022-11-04 12:16:53', '2022-11-04 12:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_task_feedback`
--

CREATE TABLE `user_task_feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_task_id` bigint(20) UNSIGNED NOT NULL,
  `sender` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_task_feedback`
--

INSERT INTO `user_task_feedback` (`id`, `message`, `user_task_id`, `sender`, `created_at`, `updated_at`) VALUES
(7, 'asdasd', 2, 0, '2022-11-01 04:31:51', '2022-11-01 04:31:51'),
(8, 'Hello is anyone available?', 2, 0, '2022-11-01 04:36:52', '2022-11-01 04:36:52'),
(9, 'Yes, how can we help?', 2, 1, '2022-11-01 04:37:03', '2022-11-01 04:37:03'),
(10, 'RWASD', 2, 0, '2022-11-01 04:37:36', '2022-11-01 04:37:36'),
(11, 'sdfsdf', 2, 1, '2022-11-01 04:37:40', '2022-11-01 04:37:40'),
(12, 'thik xha bro', 7, 1, '2022-11-03 23:48:54', '2022-11-03 23:48:54'),
(13, 'xaina ni bro', 7, 0, '2022-11-03 23:49:04', '2022-11-03 23:49:04'),
(14, 'it will be resolved soon', 9, 1, '2022-11-04 12:18:08', '2022-11-04 12:18:08'),
(15, 'how long??', 9, 0, '2022-11-04 12:18:37', '2022-11-04 12:18:37'),
(16, '6 inches', 9, 1, '2022-11-04 12:18:47', '2022-11-04 12:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `pan`, `created_at`, `updated_at`) VALUES
(1, 'ABC Company', '219080328403242', '2022-09-06 03:57:44', '2022-09-06 04:01:54'),
(3, 'XYZ Company', '3458901233434', '2022-09-06 05:34:37', '2022-09-06 05:34:37'),
(5, 'DEF', '23498093485', '2022-09-06 05:38:34', '2022-09-06 05:38:34'),
(6, 'SFD', '238479384734', '2022-09-06 05:40:59', '2022-09-06 05:40:59'),
(7, 'JKL', '37593487593479', '2022-09-06 05:42:11', '2022-09-06 05:42:11'),
(8, 'ITTI', '2394094358034958', '2022-09-06 06:13:48', '2022-09-06 06:13:48'),
(9, 'Apple Store', '23948043985094', '2022-09-06 06:15:20', '2022-09-06 06:15:20'),
(10, 'Cyber Link', '3905730497534097', '2022-09-06 06:51:45', '2022-09-06 06:51:45'),
(11, 'HAV', '0', '2022-11-04 12:26:07', '2022-11-04 12:26:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_bank_details`
--
ALTER TABLE `admin_bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_documents`
--
ALTER TABLE `admin_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_has_tasks`
--
ALTER TABLE `admin_has_tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_has_tasks_admin_id_foreign` (`admin_id`),
  ADD KEY `admin_has_tasks_task_id_foreign` (`task_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_services`
--
ALTER TABLE `client_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fiscal_years`
--
ALTER TABLE `fiscal_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inquiries_service_id_foreign` (`service_id`),
  ADD KEY `inquiries_user_id_foreign` (`user_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_users`
--
ALTER TABLE `newsletter_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `newsletter_users_newsletter_id_foreign` (`newsletter_id`),
  ADD KEY `newsletter_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `priorities`
--
ALTER TABLE `priorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programming_types`
--
ALTER TABLE `programming_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_bills`
--
ALTER TABLE `purchase_bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_bill_items`
--
ALTER TABLE `purchase_bill_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_hierarchies`
--
ALTER TABLE `role_hierarchies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_types`
--
ALTER TABLE `service_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_logs`
--
ALTER TABLE `transfer_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_contacts`
--
ALTER TABLE `user_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tasks`
--
ALTER TABLE `user_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_task_feedback`
--
ALTER TABLE `user_task_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_task_feedback_user_task_id_foreign` (`user_task_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `admin_bank_details`
--
ALTER TABLE `admin_bank_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_documents`
--
ALTER TABLE `admin_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_has_tasks`
--
ALTER TABLE `admin_has_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `client_services`
--
ALTER TABLE `client_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fiscal_years`
--
ALTER TABLE `fiscal_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=806;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  MODIFY `permission_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `newsletter_users`
--
ALTER TABLE `newsletter_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `priorities`
--
ALTER TABLE `priorities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `programming_types`
--
ALTER TABLE `programming_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase_bills`
--
ALTER TABLE `purchase_bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchase_bill_items`
--
ALTER TABLE `purchase_bill_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role_hierarchies`
--
ALTER TABLE `role_hierarchies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `service_types`
--
ALTER TABLE `service_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transfer_logs`
--
ALTER TABLE `transfer_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_contacts`
--
ALTER TABLE `user_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_tasks`
--
ALTER TABLE `user_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_task_feedback`
--
ALTER TABLE `user_task_feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD CONSTRAINT `inquiries_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inquiries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `newsletter_users`
--
ALTER TABLE `newsletter_users`
  ADD CONSTRAINT `newsletter_users_newsletter_id_foreign` FOREIGN KEY (`newsletter_id`) REFERENCES `newsletters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `newsletter_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_task_feedback`
--
ALTER TABLE `user_task_feedback`
  ADD CONSTRAINT `user_task_feedback_user_task_id_foreign` FOREIGN KEY (`user_task_id`) REFERENCES `user_tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
