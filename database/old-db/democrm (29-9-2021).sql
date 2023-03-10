-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2021 at 04:27 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `democrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `abilities`
--

CREATE TABLE `abilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entity_id` bigint(20) UNSIGNED DEFAULT NULL,
  `entity_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `only_owned` tinyint(1) NOT NULL DEFAULT 0,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`options`)),
  `scope` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abilities`
--

INSERT INTO `abilities` (`id`, `name`, `title`, `entity_id`, `entity_type`, `only_owned`, `options`, `scope`, `created_at`, `updated_at`) VALUES
(1, 'view-users', 'View Users', NULL, NULL, 0, NULL, NULL, '2021-07-26 10:52:37', '2021-07-26 10:52:40'),
(2, 'add-user', 'Add User', NULL, NULL, 0, NULL, NULL, '2021-07-26 11:32:09', '2021-07-26 11:32:09'),
(3, 'edit-user', 'Edit User', NULL, NULL, 0, NULL, NULL, '2021-07-26 07:24:21', '2021-07-26 07:24:21'),
(4, 'view-project', 'View Project', NULL, NULL, 0, NULL, NULL, '2021-07-26 22:58:09', '2021-07-26 22:58:09'),
(5, 'view-roles', 'View Roles', NULL, NULL, 0, NULL, NULL, '2021-07-26 22:58:34', '2021-07-26 22:58:34'),
(6, 'add-project', 'Add Project', NULL, NULL, 0, NULL, NULL, '2021-07-27 00:47:38', '2021-07-27 00:47:38'),
(7, 'add-role', 'Add Role', NULL, NULL, 0, NULL, NULL, '2021-07-27 02:18:09', '2021-07-27 02:18:09'),
(8, 'edit-role', 'Edit Role', NULL, NULL, 0, NULL, NULL, '2021-07-27 04:28:44', '2021-07-27 04:28:44'),
(9, 'view-task', 'View Task', NULL, NULL, 0, NULL, NULL, '2021-07-27 04:29:57', '2021-07-27 04:29:57'),
(10, 'add-task', 'Add Task', NULL, NULL, 0, NULL, NULL, '2021-07-27 04:30:31', '2021-07-27 04:30:31'),
(11, 'delete-user', 'Delete User', NULL, NULL, 0, NULL, NULL, '2021-07-27 04:37:50', '2021-07-27 04:37:50'),
(12, 'view-my-tasks', 'View My Task', NULL, NULL, 0, NULL, NULL, '2021-07-27 06:08:22', '2021-07-27 06:08:22'),
(13, 'edit-task', 'Edit Task', NULL, NULL, 0, NULL, NULL, '2021-07-28 01:53:34', '2021-07-28 01:53:34'),
(14, 'my-sticky-note', 'My Sticky Note', NULL, NULL, 0, NULL, NULL, '2021-07-29 06:16:37', '2021-07-29 06:16:37'),
(15, 'view-clients', 'View Clients', NULL, NULL, 0, NULL, NULL, '2021-08-02 06:04:48', '2021-08-02 06:04:48'),
(16, 'view-brands', 'View Brands', NULL, NULL, 0, NULL, NULL, '2021-08-03 01:15:39', '2021-08-03 01:15:39'),
(17, 'add-brand', 'Add Brand', NULL, NULL, 0, NULL, NULL, '2021-08-03 01:16:01', '2021-08-03 01:16:01'),
(18, 'edit-brand', 'Edit Brand', NULL, NULL, 0, NULL, NULL, '2021-08-03 01:16:36', '2021-08-03 01:16:36'),
(19, 'delete-brand', 'Delete Brand', NULL, NULL, 0, NULL, NULL, '2021-08-03 01:20:44', '2021-08-03 01:20:44'),
(20, 'view-brand-targets', 'View Brand Targets', NULL, NULL, 0, NULL, NULL, '2021-08-04 04:53:29', '2021-08-04 04:53:29'),
(21, 'add-brand-target', 'Add Brand Target', NULL, NULL, 0, NULL, NULL, '2021-08-04 04:54:22', '2021-08-04 04:54:22'),
(22, 'edit-brand-target', 'Edit Brand Target', NULL, NULL, 0, NULL, NULL, '2021-08-04 04:54:48', '2021-08-04 04:54:48'),
(23, 'view-assignee-brand-targets', 'View Assignee Brand Targets', NULL, NULL, 0, NULL, NULL, '2021-08-06 06:02:26', '2021-08-06 06:02:26'),
(24, 'add-assignee-brand-target', 'Add Assignee Brand Target', NULL, NULL, 0, NULL, NULL, '2021-08-06 06:02:40', '2021-08-06 06:02:40'),
(25, 'edit-assignee-brand-target', 'Edit Assignee Brand Target', NULL, NULL, 0, NULL, NULL, '2021-08-06 06:02:59', '2021-08-06 06:02:59'),
(26, 'delete-assignee-brand-target', 'Delete Assignee Brand Target', NULL, NULL, 0, NULL, NULL, '2021-08-06 06:06:11', '2021-08-06 06:06:11'),
(27, 'add-client', 'Add Client', NULL, NULL, 0, NULL, NULL, '2021-08-16 07:21:46', '2021-08-16 07:21:46'),
(28, 'add-transition', 'Add Transition', NULL, NULL, 0, NULL, NULL, '2021-08-30 11:14:46', '2021-08-30 11:14:46'),
(29, 'view-lead-form', 'View Lead Form', NULL, NULL, 0, NULL, NULL, '2021-09-13 06:38:02', '2021-09-13 06:38:02'),
(30, 'assignee-lead-form', 'Assignee Lead Form', NULL, NULL, 0, NULL, NULL, '2021-09-13 06:38:37', '2021-09-13 06:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_roles`
--

CREATE TABLE `assigned_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `entity_id` bigint(20) UNSIGNED NOT NULL,
  `entity_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restricted_to_id` bigint(20) UNSIGNED DEFAULT NULL,
  `restricted_to_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scope` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assigned_roles`
--

INSERT INTO `assigned_roles` (`id`, `role_id`, `entity_id`, `entity_type`, `restricted_to_id`, `restricted_to_type`, `scope`) VALUES
(1, 1, 1, 'App\\Models\\User', NULL, NULL, NULL),
(2, 2, 14, 'App\\Models\\User', NULL, NULL, NULL),
(3, 6, 6, 'App\\Models\\User', NULL, NULL, NULL),
(4, 5, 23, 'App\\Models\\User', NULL, NULL, NULL),
(6, 11, 19, 'App\\Models\\User', NULL, NULL, NULL),
(7, 13, 18, 'App\\Models\\User', NULL, NULL, NULL),
(8, 8, 17, 'App\\Models\\User', NULL, NULL, NULL),
(9, 9, 16, 'App\\Models\\User', NULL, NULL, NULL),
(10, 2, 15, 'App\\Models\\User', NULL, NULL, NULL),
(11, 10, 22, 'App\\Models\\User', NULL, NULL, NULL),
(12, 14, 20, 'App\\Models\\User', NULL, NULL, NULL),
(13, 14, 21, 'App\\Models\\User', NULL, NULL, NULL),
(14, 8, 25, 'App\\Models\\User', NULL, NULL, NULL),
(15, 5, 26, 'App\\Models\\User', NULL, NULL, NULL),
(16, 5, 27, 'App\\Models\\User', NULL, NULL, NULL),
(17, 5, 29, 'App\\Models\\User', NULL, NULL, NULL),
(18, 5, 30, 'App\\Models\\User', NULL, NULL, NULL),
(29, 3, 4, 'App\\Models\\User', NULL, NULL, NULL),
(30, 3, 5, 'App\\Models\\User', NULL, NULL, NULL),
(31, 12, 7, 'App\\Models\\User', NULL, NULL, NULL),
(32, 4, 31, 'App\\Models\\User', NULL, NULL, NULL),
(34, 4, 32, 'App\\Models\\User', NULL, NULL, NULL),
(35, 4, 2, 'App\\Models\\User', NULL, NULL, NULL),
(36, 5, 33, 'App\\Models\\User', NULL, NULL, NULL),
(37, 5, 34, 'App\\Models\\User', NULL, NULL, NULL),
(38, 4, 35, 'App\\Models\\User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assignee_brand_targets`
--

CREATE TABLE `assignee_brand_targets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_target_id` bigint(20) UNSIGNED NOT NULL,
  `assignee_type` tinyint(4) NOT NULL COMMENT '1=>Sales Manager,2=>Support Manager, 3=>Own',
  `assigner_emp_id` bigint(20) DEFAULT NULL,
  `target_amount` double DEFAULT NULL,
  `achieved_amount` double DEFAULT NULL,
  `target_month` date DEFAULT NULL,
  `create_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignee_brand_targets`
--

INSERT INTO `assignee_brand_targets` (`id`, `brand_target_id`, `assignee_type`, `assigner_emp_id`, `target_amount`, `achieved_amount`, `target_month`, `create_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1018, 500, 0, '2021-09-01', 1019, '2021-08-12 08:54:23', '2021-08-12 08:54:23', NULL),
(2, 1, 2, 1024, 1000, 0, '2021-09-01', 1019, '2021-08-12 08:54:39', '2021-08-12 08:54:39', NULL),
(3, 1, 3, 1016, 500, 100, '2021-09-01', 1019, '2021-08-12 08:54:53', '2021-08-12 08:54:53', NULL),
(4, 2, 1, 1016, 10, 0, '2021-09-01', 1000, '2021-08-16 09:06:13', '2021-08-16 09:06:13', NULL),
(5, 2, 3, 1021, 300, 0, '2021-11-01', 1021, '2021-09-20 09:54:18', '2021-09-20 09:54:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_id` bigint(20) UNSIGNED NOT NULL,
  `country_code` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `sales_id`, `country_code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'The New Brand 1', 'the-new-brand-1', 1000, 2, '2021-08-12 08:36:50', '2021-08-17 06:47:07', NULL),
(2, 'The New Brand 2', 'the-new-brand-2', 1020, 1, '2021-08-12 08:36:50', '2021-09-22 07:05:22', NULL),
(3, 'The New Brand 3', 'the-new-brand-3', 1020, 3, '2021-08-12 08:39:53', '2021-08-12 08:39:53', NULL),
(4, 'The Soft Cube', 'the-soft-cube', 1000, NULL, '2021-08-16 08:35:02', '2021-08-16 08:35:02', NULL),
(5, 'the new brand updated', 'the-new-brand-updated', 1000, NULL, '2021-08-24 11:40:54', '2021-09-22 04:25:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand_employees`
--

CREATE TABLE `brand_employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand_employees`
--

INSERT INTO `brand_employees` (`id`, `brand_id`, `employee_id`) VALUES
(1, 1, 1019),
(2, 1, 1025),
(3, 2, 1016),
(4, 1, 1016),
(5, 1, 1017),
(6, 1, 1024),
(7, 2, 1018),
(8, 2, 1024),
(9, 1, 1022),
(10, 1, 1023),
(11, 2, 1023);

-- --------------------------------------------------------

--
-- Table structure for table `brand_targets`
--

CREATE TABLE `brand_targets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `create_by` bigint(20) DEFAULT NULL,
  `target_month` date DEFAULT NULL,
  `target_amount` double DEFAULT NULL,
  `brand_manager_id` bigint(20) DEFAULT NULL,
  `is_assignee` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand_targets`
--

INSERT INTO `brand_targets` (`id`, `brand_id`, `create_by`, `target_month`, `target_amount`, `brand_manager_id`, `is_assignee`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1020, '2021-09-01', 2000, 1019, 0, '2021-08-12 08:46:03', '2021-08-12 08:46:03', NULL),
(2, 3, 1020, '2021-11-01', 3000, 1025, 0, '2021-08-13 06:24:12', '2021-08-13 06:24:12', NULL),
(3, 1, 1000, '2025-09-01', 300, 1025, 0, '2021-08-13 10:23:21', '2021-08-13 10:23:21', NULL),
(4, 5, 1000, '2021-09-01', 1200, 1025, 0, '2021-08-24 11:40:54', '2021-08-24 11:40:54', NULL),
(5, 2, 1000, '2021-12-01', 12000, 1025, 0, '2021-09-22 04:26:20', '2021-09-22 04:26:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client_partners`
--

CREATE TABLE `client_partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) DEFAULT NULL,
  `partner_id` bigint(20) DEFAULT NULL,
  `project_id` bigint(20) DEFAULT NULL,
  `project_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_partners`
--

INSERT INTO `client_partners` (`id`, `client_id`, `partner_id`, `project_id`, `project_number`, `created_at`, `updated_at`) VALUES
(1, 23, 33, 10, 'Project-t6l4dY-29092021', '2021-09-29 06:08:52', '2021-09-29 06:08:52'),
(2, 23, 34, 10, 'Project-t6l4dY-29092021', '2021-09-29 06:08:52', '2021-09-29 06:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Head Of Department Production', '2021-08-04 09:44:31', '2021-08-04 09:44:31', NULL),
(2, 'Sales', '2021-08-04 09:48:55', '2021-08-04 09:48:55', NULL),
(3, 'Support', '2021-08-04 09:48:55', '2021-08-04 09:48:55', NULL),
(4, 'Production', '2021-08-04 09:49:36', '2021-08-04 09:49:36', NULL),
(5, 'Brand Management', '2021-08-04 17:00:02', '2021-08-04 17:00:02', NULL),
(6, 'Head Of Department Sales & Support', '2021-08-11 15:27:10', '2021-08-11 15:27:10', NULL),
(7, 'Sales & Support Department', '2021-08-12 10:39:51', '2021-08-12 10:39:51', NULL);

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
-- Table structure for table `lead_forms`
--

CREATE TABLE `lead_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigner_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feedback_option` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feedback_message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interested_in` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `budget` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_price` double DEFAULT NULL,
  `business_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `design_perception` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_comments` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead_forms`
--

INSERT INTO `lead_forms` (`id`, `name`, `email`, `phone`, `message`, `country`, `brand_id`, `assigner_id`, `feedback_option`, `feedback_message`, `brand_name`, `page_url`, `interested_in`, `budget`, `package`, `package_price`, `business_description`, `design_perception`, `additional_comments`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'client1', 'client1@thesoftcube.com', '1071234567', 'Some text message', 'USA', '1', '1017', '1', '**message 2232asd**', 'The New Brand 1', 'https://www.thesoftcube.com', 'Software', '2000', NULL, 2500, 'Some text message Some text message Some text message', 'Some text message Some text message Some text message', 'Some text message Some text message Some text message Some text message', '2021-09-13 09:29:05', '2021-09-27 06:53:31', NULL),
(2, 'client1', 'client1@thesoftcube.com', '1071234567', 'Some text message', 'USA', '2', '1016', '1', 'message 1', 'The New Brand 2', 'https://www.thesoftcube.com', 'Software', '2000', NULL, 2500, 'Some text message Some text message Some text message', 'Some text message Some text message Some text message', 'Some text message Some text message Some text message Some text message', '2021-09-13 09:29:05', '2021-09-27 06:53:59', NULL),
(3, 'Value_1', 'Value_2', 'Value_3', NULL, 'Value_4', '1', NULL, NULL, NULL, 'The_New_Brand_1', NULL, 'Value_5', NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-20 12:46:32', '2021-09-20 12:46:32', NULL),
(4, 'Value_1', 'Value_2', 'Value_3', NULL, 'Value_4', '1', NULL, NULL, NULL, 'The_New_Brand_1', NULL, 'Value_5', NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-21 03:31:43', '2021-09-21 03:31:43', NULL),
(5, 'Value 1 new', 'Value 2 new', 'Value 3 new', NULL, 'Value 4 new', '1', NULL, NULL, NULL, 'The New Brand 1', NULL, 'Value 5 new', NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-21 03:39:53', '2021-09-21 03:39:53', NULL);

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
(1, '2014_10_12_000000_create_departments_table', 1),
(2, '2014_10_12_000000_create_designations_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2021_05_08_010845_attributes', 1),
(7, '2021_05_12_051804_role_assign', 1),
(0, '2021_07_23_134242_create_bouncer_tables', 1),
(8, '2021_07_23_134242_create_bouncer_tables', 1),
(1, '2014_10_12_000000_create_departments_table', 1),
(2, '2014_10_12_000000_create_designations_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2021_05_08_010845_attributes', 1),
(7, '2021_05_12_051804_role_assign', 1),
(0, '2021_07_23_134242_create_bouncer_tables', 1),
(8, '2021_07_23_134242_create_bouncer_tables', 1),
(0, '2021_09_29_105534_create_client_partners', 2);

-- --------------------------------------------------------

--
-- Table structure for table `my_sticky_notes`
--

CREATE TABLE `my_sticky_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `my_sticky_notes`
--

INSERT INTO `my_sticky_notes` (`id`, `user_id`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'my new note', '2021-08-27 07:29:23', '2021-08-27 07:38:41', NULL),
(2, 1, 'new Note', '2021-09-07 07:35:21', '2021-09-07 07:37:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender` int(11) NOT NULL DEFAULT 0,
  `receiver` int(11) NOT NULL DEFAULT 0,
  `msg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `sender`, `receiver`, `msg`, `data`, `project_id`, `is_read`, `is_active`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1010, 1012, 'testt', 'Comment on Task ID:Task-Jwu10w-11082021', 'Project-b1pfdk-11082021', 0, 1, 0, '2021-08-31 07:14:45', '2021-08-31 07:14:45', NULL),
(2, 1000, 1012, 'sdsad', 'Comment on Task ID:Task-Jwu10w-11082021', 'Project-b1pfdk-11082021', 0, 1, 0, '2021-09-03 11:34:11', '2021-09-03 11:34:11', NULL),
(3, 1014, 1013, 'new messageas', 'Comment on Task ID:Task-clVz3q-07092021', 'Project-b1pfdk-11082021', 0, 1, 0, '2021-09-09 07:03:43', '2021-09-09 07:03:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT 0,
  `is_read` char(1) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT 1,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `is_deleted` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_featured` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `price` double NOT NULL,
  `limitation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `user_id`, `is_read`, `type`, `is_active`, `is_deleted`, `created_at`, `updated_at`, `is_featured`, `name`, `details`, `price`, `limitation`) VALUES
(1, 0, '0', 1, 1, 0, '2021-03-19 15:53:00', '2021-03-23 13:39:08', 0, 'Logo Design', '<p>Duis ipsum dolor sit amet incididunt ut labore et dolore magna.</p>\r\n\r\n<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.</p>\r\n\r\n<ul>\r\n	<li>Responsive design</li>\r\n	<li>Template development</li>\r\n	<li>Rich media banners</li>\r\n	<li>Frontend development</li>\r\n	<li>Backend development</li>\r\n	<li>Content creation</li>\r\n	<li>Content audit</li>\r\n	<li>Copywriting</li>\r\n	<li>Photography</li>\r\n</ul>', 10, 1),
(2, 0, '0', 1, 1, 0, '2021-03-19 15:53:00', '2021-03-23 13:39:26', 0, 'Client Questionnaire', '<p>Duis ipsum dolor sit amet incididunt ut labore et dolore magna.</p>\r\n\r\n<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.</p>\r\n\r\n<ul>\r\n	<li>Responsive design</li>\r\n	<li>Template development</li>\r\n	<li>Rich media banners</li>\r\n	<li>Frontend development</li>\r\n	<li>Backend development</li>\r\n	<li>Content creation</li>\r\n	<li>Content audit</li>\r\n	<li>Copywriting</li>\r\n	<li>Photography</li>\r\n</ul>', 20, 3),
(3, 0, '0', 1, 1, 0, '2021-03-19 15:53:00', '2021-03-23 13:47:40', 0, 'Stationery Design', '<p>Duis ipsum dolor sit amet incididunt ut labore et dolore magna.</p>\r\n\r\n<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.</p>\r\n\r\n<ul>\r\n	<li>Responsive design</li>\r\n	<li>Template development</li>\r\n	<li>Rich media banners</li>\r\n	<li>Frontend development</li>\r\n	<li>Backend development</li>\r\n	<li>Content creation</li>\r\n	<li>Content audit</li>\r\n	<li>Copywriting</li>\r\n	<li>Photography</li>\r\n</ul>', 30, 5),
(4, 0, '0', 1, 1, 0, '2021-03-19 15:53:00', '2021-03-23 13:47:47', 0, 'Email Marketing Questionnaire', '<p>Excepteur ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>\r\n\r\n<p>Excepteur sint occaecat elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.</p>\r\n\r\n<ul>\r\n	<li>Facebook advertising</li>\r\n	<li>SEO and SEM</li>\r\n	<li>Facebook apps</li>\r\n	<li>Context advertising</li>\r\n	<li>Rich media banners</li>\r\n	<li>Game development</li>\r\n	<li>Content creation</li>\r\n	<li>Testing</li>\r\n</ul>', 40, 10),
(5, 0, '0', 1, 1, 0, '2021-03-23 13:47:56', '2021-03-23 13:47:56', 0, 'Brochure Design', '', 0, 0),
(6, 0, '0', 1, 1, 0, '2021-03-23 13:48:04', '2021-03-23 13:48:04', 0, 'Website Design', '', 0, 0),
(7, 0, '0', 1, 1, 0, '2021-03-23 13:48:15', '2021-03-23 13:48:15', 0, 'Website Development', '', 0, 0),
(8, 0, '0', 1, 1, 0, '2021-03-23 13:48:22', '2021-03-23 13:48:22', 0, 'SEO Questionnaire', '', 0, 0),
(9, 0, '0', 1, 1, 0, '2021-03-23 13:48:34', '2021-03-23 13:48:34', 0, 'Project Status', '', 0, 0),
(10, 0, '0', 1, 1, 0, '2021-03-23 13:48:45', '2021-03-23 13:48:45', 0, 'Content Writing', '', 0, 0),
(11, 0, '0', 1, 1, 0, '2021-03-23 13:48:53', '2021-03-23 13:48:53', 0, 'Social Media Design', '', 0, 0),
(12, 0, '0', 1, 1, 0, '2021-03-23 13:49:02', '2021-03-23 13:49:02', 0, 'Video Production', '', 0, 0),
(13, 0, '0', 1, 1, 0, '2021-03-23 13:49:09', '2021-03-23 13:49:09', 0, 'Other', '', 0, 0),
(14, 0, '0', 1, 1, 0, '2021-03-23 13:49:17', '2021-03-23 13:49:17', 0, 'No Package', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`, `is_active`, `is_deleted`) VALUES
('nepenax261@cfcjy.com', '$2y$10$jrgQA9O0EPJ/37SNPSUcAuHPLLXjPQr4zabV7FNlWUkhB9HG1gzza', '2021-08-16 08:21:09', NULL, NULL),
('moriy77135@busantei.com', '$2y$10$brA.nboUlNvzpp5l81z5wuStL6seQZoPNCgHMBnSIAEkaxDGM.PSa', '2021-09-29 08:55:32', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ability_id` bigint(20) UNSIGNED NOT NULL,
  `entity_id` bigint(20) UNSIGNED DEFAULT NULL,
  `entity_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forbidden` tinyint(1) NOT NULL DEFAULT 0,
  `scope` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `ability_id`, `entity_id`, `entity_type`, `forbidden`, `scope`) VALUES
(231, 1, 12, 'roles', 0, NULL),
(232, 4, 12, 'roles', 0, NULL),
(233, 6, 12, 'roles', 0, NULL),
(234, 9, 12, 'roles', 0, NULL),
(235, 14, 12, 'roles', 0, NULL),
(236, 16, 12, 'roles', 0, NULL),
(237, 20, 12, 'roles', 0, NULL),
(238, 23, 12, 'roles', 0, NULL),
(260, 1, 6, 'roles', 0, NULL),
(261, 4, 6, 'roles', 0, NULL),
(262, 9, 6, 'roles', 0, NULL),
(263, 10, 6, 'roles', 0, NULL),
(264, 12, 6, 'roles', 0, NULL),
(265, 13, 6, 'roles', 0, NULL),
(266, 14, 6, 'roles', 0, NULL),
(267, 20, 6, 'roles', 0, NULL),
(268, 23, 6, 'roles', 0, NULL),
(281, 4, 5, 'roles', 0, NULL),
(282, 14, 5, 'roles', 0, NULL),
(283, 1, 3, 'roles', 0, NULL),
(284, 4, 3, 'roles', 0, NULL),
(285, 9, 3, 'roles', 0, NULL),
(286, 12, 3, 'roles', 0, NULL),
(287, 14, 3, 'roles', 0, NULL),
(288, 4, 4, 'roles', 0, NULL),
(289, 9, 4, 'roles', 0, NULL),
(290, 12, 4, 'roles', 0, NULL),
(291, 14, 4, 'roles', 0, NULL),
(333, 1, 13, 'roles', 0, NULL),
(334, 4, 13, 'roles', 0, NULL),
(335, 9, 13, 'roles', 0, NULL),
(336, 14, 13, 'roles', 0, NULL),
(337, 15, 13, 'roles', 0, NULL),
(338, 16, 13, 'roles', 0, NULL),
(339, 17, 13, 'roles', 0, NULL),
(340, 18, 13, 'roles', 0, NULL),
(341, 19, 13, 'roles', 0, NULL),
(342, 20, 13, 'roles', 0, NULL),
(343, 21, 13, 'roles', 0, NULL),
(344, 22, 13, 'roles', 0, NULL),
(345, 23, 13, 'roles', 0, NULL),
(346, 28, 13, 'roles', 0, NULL),
(377, 1, 8, 'roles', 0, NULL),
(378, 4, 8, 'roles', 0, NULL),
(379, 6, 8, 'roles', 0, NULL),
(380, 9, 8, 'roles', 0, NULL),
(381, 14, 8, 'roles', 0, NULL),
(382, 15, 8, 'roles', 0, NULL),
(383, 16, 8, 'roles', 0, NULL),
(384, 20, 8, 'roles', 0, NULL),
(385, 23, 8, 'roles', 0, NULL),
(386, 24, 8, 'roles', 0, NULL),
(387, 25, 8, 'roles', 0, NULL),
(388, 26, 8, 'roles', 0, NULL),
(389, 29, 8, 'roles', 0, NULL),
(390, 1, 11, 'roles', 0, NULL),
(391, 2, 11, 'roles', 0, NULL),
(392, 4, 11, 'roles', 0, NULL),
(393, 6, 11, 'roles', 0, NULL),
(394, 9, 11, 'roles', 0, NULL),
(395, 10, 11, 'roles', 0, NULL),
(396, 13, 11, 'roles', 0, NULL),
(397, 14, 11, 'roles', 0, NULL),
(398, 15, 11, 'roles', 0, NULL),
(399, 16, 11, 'roles', 0, NULL),
(400, 20, 11, 'roles', 0, NULL),
(401, 23, 11, 'roles', 0, NULL),
(402, 24, 11, 'roles', 0, NULL),
(403, 28, 11, 'roles', 0, NULL),
(404, 4, 2, 'roles', 0, NULL),
(405, 9, 2, 'roles', 0, NULL),
(406, 10, 2, 'roles', 0, NULL),
(407, 12, 2, 'roles', 0, NULL),
(408, 13, 2, 'roles', 0, NULL),
(409, 14, 2, 'roles', 0, NULL),
(410, 15, 2, 'roles', 0, NULL),
(411, 16, 2, 'roles', 0, NULL),
(412, 20, 2, 'roles', 0, NULL),
(413, 23, 2, 'roles', 0, NULL),
(414, 24, 2, 'roles', 0, NULL),
(415, 25, 2, 'roles', 0, NULL),
(416, 26, 2, 'roles', 0, NULL),
(417, 27, 2, 'roles', 0, NULL),
(418, 29, 2, 'roles', 0, NULL),
(448, 1, 1, 'roles', 0, NULL),
(449, 2, 1, 'roles', 0, NULL),
(450, 3, 1, 'roles', 0, NULL),
(451, 4, 1, 'roles', 0, NULL),
(452, 5, 1, 'roles', 0, NULL),
(453, 6, 1, 'roles', 0, NULL),
(454, 7, 1, 'roles', 0, NULL),
(455, 8, 1, 'roles', 0, NULL),
(456, 9, 1, 'roles', 0, NULL),
(457, 10, 1, 'roles', 0, NULL),
(458, 11, 1, 'roles', 0, NULL),
(459, 12, 1, 'roles', 0, NULL),
(460, 13, 1, 'roles', 0, NULL),
(461, 14, 1, 'roles', 0, NULL),
(462, 15, 1, 'roles', 0, NULL),
(463, 16, 1, 'roles', 0, NULL),
(464, 17, 1, 'roles', 0, NULL),
(465, 18, 1, 'roles', 0, NULL),
(466, 19, 1, 'roles', 0, NULL),
(467, 20, 1, 'roles', 0, NULL),
(468, 21, 1, 'roles', 0, NULL),
(469, 22, 1, 'roles', 0, NULL),
(470, 23, 1, 'roles', 0, NULL),
(471, 24, 1, 'roles', 0, NULL),
(472, 25, 1, 'roles', 0, NULL),
(473, 26, 1, 'roles', 0, NULL),
(474, 27, 1, 'roles', 0, NULL),
(475, 28, 1, 'roles', 0, NULL),
(476, 29, 1, 'roles', 0, NULL),
(477, 30, 1, 'roles', 0, NULL),
(490, 1, 9, 'roles', 0, NULL),
(491, 4, 9, 'roles', 0, NULL),
(492, 6, 9, 'roles', 0, NULL),
(493, 9, 9, 'roles', 0, NULL),
(494, 10, 9, 'roles', 0, NULL),
(495, 13, 9, 'roles', 0, NULL),
(496, 14, 9, 'roles', 0, NULL),
(497, 15, 9, 'roles', 0, NULL),
(498, 16, 9, 'roles', 0, NULL),
(499, 20, 9, 'roles', 0, NULL),
(500, 23, 9, 'roles', 0, NULL),
(501, 29, 9, 'roles', 0, NULL),
(502, 30, 9, 'roles', 0, NULL),
(503, 4, 14, 'roles', 0, NULL),
(504, 6, 14, 'roles', 0, NULL),
(505, 9, 14, 'roles', 0, NULL),
(506, 10, 14, 'roles', 0, NULL),
(507, 12, 14, 'roles', 0, NULL),
(508, 13, 14, 'roles', 0, NULL),
(509, 14, 14, 'roles', 0, NULL),
(510, 15, 14, 'roles', 0, NULL),
(511, 16, 14, 'roles', 0, NULL),
(512, 20, 14, 'roles', 0, NULL),
(513, 23, 14, 'roles', 0, NULL),
(514, 28, 14, 'roles', 0, NULL),
(515, 29, 14, 'roles', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `project_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `brand_id` int(255) DEFAULT NULL,
  `support_id` int(255) DEFAULT NULL,
  `projownertype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_package` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_cost` double DEFAULT NULL,
  `remaining_cost` double DEFAULT NULL,
  `project_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_priority` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'None',
  `progress_bar` int(11) DEFAULT 0,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_id`, `project_number`, `client_id`, `user_id`, `manager_id`, `brand_id`, `support_id`, `projownertype`, `name`, `project_package`, `client_name`, `client_email`, `client_phone`, `project_cost`, `paid_cost`, `remaining_cost`, `project_type`, `project_priority`, `project_details`, `status`, `progress_bar`, `is_active`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'Project-b1pfdk-11082021', 23, 1016, 1014, 2, NULL, 'soleprop', 'Project 1 car', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"4\";}', 'Client 1', 'client1@thesoftcube.com', '0317123457', '1000', 500, 500, 'Fix price', 'High', 'Some Text !! Some Text !! Some Text !! Some Text !!', 'Completed', 0, 1, 0, '2021-02-11 13:06:30', '2021-09-28 05:33:06', NULL),
(2, NULL, 'Project-kR4nRP-18082021', 29, 1016, 1014, 1, NULL, 'partner', 'the car body project 1', 'a:1:{i:0;s:1:\"6\";}', 'client 4', 'nepenax261@cfcjy.com', '12342134', '200', 470, 0, 'Hourly', 'Low', 'some textttt', 'None', 23, 1, 0, '2021-04-18 06:18:21', '2021-09-27 09:27:31', NULL),
(3, NULL, 'Project-8doWqU-20082021', 29, 1000, 1014, 2, NULL, 'soleprop', 'project new 4', 'a:2:{i:0;s:1:\"2\";i:1;s:1:\"4\";}', 'client 4', 'nepenax261@cfcjy.com', '123421344', '2000', 0, 2000, 'Fix price', 'Low', 'text !! text !! text !! text !! text !! text !!', 'Closed', 0, 1, 0, '2021-06-20 17:27:35', '2021-09-27 12:41:13', NULL),
(4, NULL, 'Project-yu8FV9-23082021', 23, 1000, 1014, 2, NULL, 'partner', 'the new proj', 'a:1:{i:0;s:1:\"4\";}', 'Client 1', 'client1@thesoftcube.com', '0317123457', '300', 100, 200, 'Hourly', 'High', 'text text !!', 'Completed', 0, 1, 0, '2021-09-21 12:29:52', '2021-09-29 07:38:45', NULL),
(5, NULL, 'Project-S6QmKX-23082021', 23, 1000, 1014, 3, NULL, 'soleprop', 'the 2new proj', 'a:1:{i:0;s:1:\"3\";}', 'Client 1', 'client1@thesoftcube.com', '0317123457', '200', 100, 100, 'Hourly', 'Low', 'asdf', 'None', 0, 1, 0, '2021-07-20 12:29:52', '2021-09-24 14:31:32', NULL),
(6, NULL, 'Project-I0QRG2-30082021', 23, 1000, 1014, 3, NULL, 'partner', 'the 3d man', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"4\";}', 'Client 1', 'client1@thesoftcube.com', '0317123457', '1200', 610, 590, 'Fix price', 'Urgent', 'text!!text!!text!!text!!text!!', 'None', 0, 1, 0, '2021-03-30 17:29:45', '2021-09-24 14:31:48', NULL),
(7, NULL, 'Project-9CQi4H-30082021', 23, 1000, 1014, 3, NULL, 'soleprop', 'the 3d man', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"4\";}', 'Client 1', 'client1@thesoftcube.com', '0317123457', '1200', 1150, 50, 'Fix price', 'Urgent', 'text!!text!!text!!text!!text!!', 'None', 0, 1, 0, '2021-02-20 04:50:10', '2021-09-24 14:31:34', NULL),
(8, NULL, 'Project-BH1Z5f-24092021', 23, 1000, 1014, 3, NULL, 'soleprop', 'new abc', 'a:1:{i:0;s:1:\"1\";}', 'Client 1', 'client1@thesoftcube.com', '0317123457', '1200', 200, 1000, 'Hourly', 'Low', 'test abc', 'None', 0, 1, 0, '2021-09-24 09:30:47', '2021-09-27 12:39:02', NULL),
(9, NULL, 'Project-XFzTvl-27092021', 26, 1000, 1014, 2, 1023, 'soleprop', 'real estate agent', 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"5\";}', 'client 2', 'client2@thesoftcube.com', '123214343', '2000', 1000, 1000, 'Hourly', 'Low', 'some textt', 'None', 0, 1, 0, '2021-09-27 04:17:22', '2021-09-27 12:38:54', NULL),
(10, NULL, 'Project-t6l4dY-29092021', 23, 1000, 1014, 2, 1022, 'partner', 'the new demo2', 'a:2:{i:0;s:1:\"2\";i:1;s:1:\"4\";}', 'Client 1', 'client1@thesoftcube.com', '0317123457', '2000', 500, 1500, 'Hourly', 'Low', 'some Text some Text some Text some Text some Text some Text some Text', 'None', 0, 1, 0, '2021-09-29 06:08:52', '2021-09-29 06:08:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_attachment`
--

CREATE TABLE `project_attachment` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `task_id` int(11) NOT NULL DEFAULT 0,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_attachment`
--

INSERT INTO `project_attachment` (`id`, `project_id`, `task_id`, `path`, `is_active`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, '/uploads/project_attachment/tsc icon.png', 1, 0, '2021-08-11 11:09:23', '2021-08-27 10:13:39', NULL),
(2, 1, 1, '/uploads/project_attachment/demo-user-icon.png', 1, 0, '2021-08-11 12:10:01', '2021-08-27 10:13:57', NULL),
(3, 2, 0, '/uploads/project_attachment/demo-user-icon.png', 1, 0, '2021-08-18 06:18:21', '2021-08-27 10:14:00', NULL),
(4, 1, 4, '/uploads/project_attachment/demo-user-icon_1629992791_1631022242.png', 1, 0, '2021-08-26 10:46:38', '2021-09-08 10:10:15', NULL),
(5, 1, 4, '/uploads/project_attachment/demo-user-icon_1629992791_1631022242_1631093543.png', 1, 0, '2021-08-26 10:46:38', '2021-09-08 10:10:34', NULL),
(6, 1, 5, '/uploads/project_attachment/demo-user-icon_1629992791_1631022242.png', 1, 0, '2021-09-07 08:44:07', '2021-09-07 08:44:07', NULL),
(7, 1, 5, '/uploads/project_attachment/profile_1629992796_1631022246.jpg', 1, 0, '2021-09-07 08:44:07', '2021-09-07 08:44:07', NULL),
(8, 1, 4, '/uploads/project_attachment/profile_1629992796_1631103602.jpg', 1, 0, '2021-09-08 08:20:08', '2021-09-08 08:20:08', NULL),
(9, 1, 4, '/uploads/project_attachment/profile_1629992796_1631118120.jpg', 1, 0, '2021-09-08 11:22:03', '2021-09-08 11:22:03', NULL),
(10, 9, 0, '/uploads/project_attachment/profile_1629992796_1631103602_1632734221.jpg', 1, 0, '2021-09-27 04:17:22', '2021-09-27 04:17:22', NULL),
(11, 10, 0, '/uploads/project_attachment/demo-user-icon_1629992791_1631022242_1631093543_1632908585.png', 1, 0, '2021-09-29 06:08:52', '2021-09-29 06:08:52', NULL),
(12, 1, 1, '/uploads/project_attachment/demo-user-icon_1629992791_1631022242_1631093543_1632921214.png', 1, 0, '2021-09-29 08:13:35', '2021-09-29 08:13:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_package`
--

CREATE TABLE `project_package` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `package_id` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_package`
--

INSERT INTO `project_package` (`id`, `project_id`, `package_id`, `is_active`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 0, '2021-08-11 11:09:23', '2021-08-11 11:09:23', NULL),
(2, 1, 4, 1, 0, '2021-08-11 11:09:23', '2021-08-11 11:09:23', NULL),
(3, 2, 6, 1, 0, '2021-08-18 06:18:21', '2021-08-18 06:18:21', NULL),
(4, 3, 2, 1, 0, '2021-08-20 09:07:20', '2021-08-20 09:07:20', NULL),
(5, 3, 4, 1, 0, '2021-08-20 09:07:20', '2021-08-20 09:07:20', NULL),
(6, 4, 4, 1, 0, '2021-08-23 12:29:52', '2021-08-23 12:29:52', NULL),
(7, 5, 3, 1, 0, '2021-08-23 12:31:46', '2021-08-23 12:31:46', NULL),
(8, 6, 1, 1, 0, '2021-08-30 04:40:13', '2021-08-30 04:40:13', NULL),
(9, 6, 4, 1, 0, '2021-08-30 04:40:13', '2021-08-30 04:40:13', NULL),
(10, 7, 1, 1, 0, '2021-08-30 04:50:10', '2021-08-30 04:50:10', NULL),
(11, 7, 4, 1, 0, '2021-08-30 04:50:10', '2021-08-30 04:50:10', NULL),
(12, 8, 1, 1, 0, '2021-09-24 09:30:47', '2021-09-24 09:30:47', NULL),
(13, 9, 3, 1, 0, '2021-09-27 04:17:22', '2021-09-27 04:17:22', NULL),
(14, 9, 5, 1, 0, '2021-09-27 04:17:22', '2021-09-27 04:17:22', NULL),
(15, 10, 2, 1, 0, '2021-09-29 06:08:52', '2021-09-29 06:08:52', NULL),
(16, 10, 4, 1, 0, '2021-09-29 06:08:52', '2021-09-29 06:08:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_reviews`
--

CREATE TABLE `project_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_id` bigint(20) DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_reviews`
--

INSERT INTO `project_reviews` (`id`, `project_number`, `emp_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Project-b1pfdk-11082021', 1019, 'Some Text !! Some Text !! Some Text !! Some Text !! Some Text !! Some Text !! Some Text !! ', '2021-09-13 15:46:29', '2021-09-13 15:46:29'),
(2, 'Project-b1pfdk-11082021', 1018, 'new review 1', '2021-09-14 06:42:51', '2021-09-14 06:42:51'),
(3, 'Project-b1pfdk-11082021', 1020, 'new review 2', '2021-09-14 07:00:07', '2021-09-14 07:00:07'),
(5, 'Project-b1pfdk-11082021', 1021, 'new review 3', '2021-09-14 07:02:47', '2021-09-14 07:02:47'),
(6, 'Project-b1pfdk-11082021', 1017, 'new review 4', '2021-09-14 07:03:06', '2021-09-14 07:03:06'),
(7, 'Project-b1pfdk-11082021', 1000, 'new review 5', '2021-09-14 07:05:53', '2021-09-14 07:05:53'),
(8, 'Project-8doWqU-20082021', 1000, 'new review 5', '2021-09-14 11:50:45', '2021-09-14 11:50:45'),
(9, 'Project-b1pfdk-11082021', 1010, 'new review 6', '2021-09-22 07:08:49', '2021-09-22 07:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `project_task`
--

CREATE TABLE `project_task` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `task_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_to` int(255) DEFAULT NULL,
  `dpt_to` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `task_priority` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `progress` int(100) DEFAULT 0,
  `progress_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `due_date` datetime DEFAULT NULL,
  `task_updated_at` timestamp NULL DEFAULT NULL,
  `update_by` int(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_task`
--

INSERT INTO `project_task` (`id`, `project_id`, `user_id`, `task_number`, `title`, `details`, `tag`, `assigned_to`, `dpt_to`, `status`, `task_priority`, `progress`, `progress_by`, `is_active`, `is_deleted`, `due_date`, `task_updated_at`, `update_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Project-b1pfdk-11082021', 1021, 'Task-Jwu10w-11082021', 'Make Car Body Task 1', '**Some  Task Details **  **Some  Task Details **', NULL, NULL, 1012, 'None', 'High', 64, NULL, 1, 0, '2021-08-19 00:00:00', '2021-09-28 20:13:35', 1000, '2021-08-11 12:10:01', '2021-09-29 08:13:35', NULL),
(2, 'Project-kR4nRP-18082021', 1000, 'Task-rkbMZo-18082021', 'car design', 'make new body', NULL, NULL, 1012, 'Completed', 'High', 100, NULL, 1, 0, '2021-08-22 00:00:00', NULL, NULL, '2021-08-18 06:20:00', '2021-09-13 14:51:58', NULL),
(3, 'Project-kR4nRP-18082021', 1021, 'Task-z6FPJu-18082021', 'car design 2', 'text!! text!! text!! text!!', NULL, NULL, 1012, 'None', 'Urgent', 35, NULL, 1, 0, '2021-08-20 00:00:00', NULL, NULL, '2021-08-18 08:47:12', '2021-09-01 15:18:46', NULL),
(4, 'Project-b1pfdk-11082021', 1000, 'Task-XA6FWN-26082021', 'the new task', 'textttt', NULL, NULL, 1012, 'Closed', 'High', 100, NULL, 1, 0, '2021-08-28 00:00:00', '2021-09-07 23:22:03', 1000, '2021-08-26 10:46:38', '2021-09-09 07:19:56', NULL),
(5, 'Project-b1pfdk-11082021', 1000, 'Task-clVz3q-07092021', 'new task 0709', 'some !! text !! some !! text !! some !! text !!', NULL, NULL, 1013, 'None', 'High', 20, NULL, 1, 0, '2021-09-10 00:00:00', '2021-09-07 23:07:10', 1000, '2021-09-07 08:44:07', '2021-09-09 06:50:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_task_comment`
--

CREATE TABLE `project_task_comment` (
  `id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` varchar(255) NOT NULL DEFAULT '0',
  `task_id` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_task_comment`
--

INSERT INTO `project_task_comment` (`id`, `to_user_id`, `from_user_id`, `message`, `group_id`, `task_id`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1012, 1010, 'testt', '0', 'Task-Jwu10w-11082021', 1, 0, '2021-08-31 07:14:45', '2021-08-31 07:14:45'),
(2, 1012, 1000, 'sdsad', '0', 'Task-Jwu10w-11082021', 1, 0, '2021-09-03 11:34:11', '2021-09-03 11:34:11'),
(3, 1013, 1014, 'new messageas', '0', 'Task-clVz3q-07092021', 1, 0, '2021-09-09 07:03:43', '2021-09-09 07:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `project_task_label`
--

CREATE TABLE `project_task_label` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `task_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0 COMMENT '1:Assign,2:Tag',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_task_label`
--

INSERT INTO `project_task_label` (`id`, `project_id`, `user_id`, `task_number`, `type`, `title`, `is_active`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Project-b1pfdk-11082021', 1000, 'Task-Jwu10w-11082021', 1, '1010', 1, 0, '2021-08-17 07:22:56', '2021-08-30 09:12:18', NULL),
(2, 'Project-kR4nRP-18082021', 1000, 'Task-rkbMZo-18082021', 1, '1010', 1, 0, '2021-08-18 06:29:20', '2021-08-30 09:12:26', NULL),
(3, 'Project-kR4nRP-18082021', 1000, 'Task-rkbMZo-18082021', 2, 'developer 1', 1, 0, '2021-08-18 06:38:27', '2021-08-30 09:12:23', NULL),
(4, 'Project-kR4nRP-18082021', 1000, 'Task-z6FPJu-18082021', 1, '1010', 1, 0, '2021-08-18 08:47:50', '2021-08-30 09:12:21', NULL),
(5, 'Project-b1pfdk-11082021', 1000, 'Task-XA6FWN-26082021', 1, '1010', 1, 0, '2021-09-09 04:44:07', '2021-09-09 04:44:07', NULL),
(6, 'Project-b1pfdk-11082021', 1000, 'Task-Jwu10w-11082021', 2, 'css', 1, 0, '2021-09-28 06:48:42', '2021-09-28 06:48:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_thread`
--

CREATE TABLE `project_thread` (
  `id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `project_id` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_thread`
--

INSERT INTO `project_thread` (`id`, `created_by`, `title`, `project_id`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1000, 'test 1', 'Project-kR4nRP-18082021', 1, 0, '2021-09-13 11:14:19', '2021-09-13 11:14:19');

-- --------------------------------------------------------

--
-- Table structure for table `project_thread_comment`
--

CREATE TABLE `project_thread_comment` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `client_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_transitions`
--

CREATE TABLE `project_transitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` bigint(20) DEFAULT NULL COMMENT 'Sales & Support EmpId',
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` int(100) DEFAULT NULL COMMENT '0 => Complete project ',
  `transition_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(100) DEFAULT NULL,
  `total_cost` double DEFAULT NULL,
  `paid_cost` double DEFAULT NULL,
  `remain_cost` double DEFAULT NULL,
  `response` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_transitions`
--

INSERT INTO `project_transitions` (`id`, `emp_id`, `brand_id`, `project_id`, `package_id`, `transition_id`, `parent_id`, `total_cost`, `paid_cost`, `remain_cost`, `response`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1016, 3, 7, 0, 'abc1234', NULL, 1200, 200, 1000, NULL, '2021-08-30 04:50:10', '2021-08-30 04:50:10', NULL),
(2, 1016, 3, 7, 0, 'efj456', NULL, 1000, 500, 500, NULL, '2021-08-30 13:54:18', '2021-08-30 13:54:18', NULL),
(3, 1000, 3, 7, 0, 'xyz1122', NULL, 500, 200, 300, NULL, '2021-08-30 11:02:04', '2021-08-30 11:02:04', NULL),
(5, 1000, 3, 7, 0, 'dsadsaq3234', NULL, 300, 200, 100, NULL, '2021-08-30 11:33:51', '2021-08-30 11:33:51', NULL),
(6, 1000, 3, 7, 0, 'xyz112233', NULL, 100, 50, 50, NULL, '2021-08-30 11:49:33', '2021-08-30 11:49:33', NULL),
(7, 1000, 3, 5, 0, 'qescr1243', NULL, 200, 100, 100, NULL, '2021-08-30 12:00:56', '2021-08-30 12:00:56', NULL),
(8, 1000, 2, 1, 0, 'xyz1122 1 car', NULL, 1000, 200, 800, NULL, '2021-09-07 10:51:29', '2021-09-07 10:51:29', NULL),
(9, 1000, 3, 8, 0, '1245879512', NULL, 1200, 200, 1000, NULL, '2021-09-24 09:30:47', '2021-09-24 09:30:47', NULL),
(10, 1000, 2, 9, 0, '14785236699', NULL, 2000, 1000, 1000, NULL, '2021-09-27 04:17:22', '2021-09-27 04:17:22', NULL),
(11, 1000, 1, 2, 0, '1946168403846806', NULL, 200, 10, 190, NULL, '2021-09-27 09:03:32', '2021-09-27 09:03:32', NULL),
(12, 1000, 1, 2, 0, '1946168403846806', NULL, 190, 10, 180, NULL, '2021-09-27 09:04:22', '2021-09-27 09:04:22', NULL),
(13, 1000, 1, 2, 6, '40157403', NULL, 180, 300, 0, NULL, '2021-09-27 09:06:40', '2021-09-27 09:06:40', NULL),
(14, 1000, 1, 2, 6, '518916', NULL, 0, 30, 0, NULL, '2021-09-27 09:12:24', '2021-09-27 09:12:24', NULL),
(15, 1000, 1, 2, 6, 'dsadsaq3234asda', NULL, 0, 100, 0, NULL, '2021-09-27 09:15:09', '2021-09-27 09:15:09', NULL),
(16, 1000, 1, 2, 6, '4651784106', NULL, 0, 20, 0, NULL, '2021-09-27 09:27:31', '2021-09-27 09:27:31', NULL),
(17, 1000, 2, 1, 4, '2132133213 1 car', NULL, 800, 200, 600, NULL, '2021-09-27 10:41:11', '2021-09-27 10:41:11', NULL),
(18, 1000, 2, 1, 0, 'xyz1122 1 car', NULL, 600, 100, 500, NULL, '2021-09-28 05:33:06', '2021-09-28 05:33:06', NULL),
(21, 1000, 2, 1, NULL, 'asdasda', NULL, 1200, 200, 1000, NULL, '2021-09-28 05:41:24', '2021-09-28 05:41:24', NULL),
(22, 1000, 2, 1, 1, NULL, 21, 0, 0, 0, NULL, '2021-09-28 05:41:24', '2021-09-28 05:41:24', NULL),
(23, 1000, 2, 1, 2, NULL, 21, 0, 0, 0, NULL, '2021-09-28 05:41:24', '2021-09-28 05:41:24', NULL),
(24, 1000, 2, 1, 3, NULL, 21, 0, 0, 0, NULL, '2021-09-28 05:41:24', '2021-09-28 05:41:24', NULL),
(25, 1000, 2, 10, NULL, '12345678', NULL, 2000, 500, 1500, NULL, '2021-09-29 06:08:52', '2021-09-29 06:08:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(10) UNSIGNED DEFAULT NULL,
  `scope` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `title`, `level`, `scope`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', NULL, NULL, '2021-07-26 15:18:28', '2021-07-27 03:58:56'),
(2, 'sales', 'Sales', NULL, NULL, '2021-07-26 10:41:59', '2021-07-26 10:41:59'),
(3, 'team lead', 'Team Lead', NULL, NULL, '2021-07-27 04:13:58', '2021-07-27 04:13:58'),
(4, 'developer', 'Developer', NULL, NULL, '2021-07-27 04:14:31', '2021-07-27 04:14:31'),
(5, 'client', 'Client', NULL, NULL, '2021-07-27 07:38:31', '2021-07-27 07:38:31'),
(6, 'production manager', 'Production Manager', NULL, NULL, '2021-07-29 03:59:38', '2021-08-11 11:06:20'),
(8, 'brand manager', 'Brand Manager', NULL, NULL, '2021-08-04 12:13:20', '2021-08-04 12:13:20'),
(9, 'sales manager', 'Sales Manager', NULL, NULL, '2021-08-06 11:04:45', '2021-08-06 11:04:45'),
(10, 'support manager', 'Support Manager', NULL, NULL, '2021-08-06 11:05:15', '2021-08-06 11:05:15'),
(11, 'hod sales and support', 'HOD Sales And Support', NULL, NULL, '2021-08-12 05:15:41', '2021-08-12 05:15:41'),
(12, 'hod production', 'HOD Production', NULL, NULL, '2021-08-12 05:16:49', '2021-08-12 05:16:49'),
(13, 'sales and support manager', 'Sales And Support Manager', NULL, NULL, '2021-08-12 05:18:00', '2021-08-12 05:18:00'),
(14, 'support', 'Support', NULL, NULL, '2021-08-12 06:27:47', '2021-08-12 06:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(11) NOT NULL,
  `slot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `project_id`, `slot`, `is_active`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '127.0.0.1', 29, 'login', 1, 0, '2021-06-10 14:37:28', '2021-06-10 14:37:28', NULL),
(2, 1, '127.0.0.1', 29, 'login', 1, 0, '2021-06-10 14:37:53', '2021-06-10 14:37:53', NULL),
(3, 1, '127.0.0.1', 29, 'login', 1, 0, '2021-06-10 15:23:48', '2021-06-10 15:23:48', NULL),
(4, 1, '127.0.0.1', 29, 'login', 1, 0, '2021-06-10 16:25:17', '2021-06-10 16:25:17', NULL),
(5, 1, '127.0.0.1', 29, 'login', 1, 0, '2021-06-10 17:07:20', '2021-06-10 17:07:20', NULL),
(6, 1, '127.0.0.1', 29, 'login', 1, 0, '2021-06-11 08:39:58', '2021-06-11 08:39:58', NULL),
(7, 1, '127.0.0.1', 29, 'login', 1, 0, '2021-06-11 08:51:56', '2021-06-11 08:51:56', NULL),
(8, 1, '127.0.0.1', 29, 'login', 1, 0, '2021-06-11 08:52:44', '2021-06-11 08:52:44', NULL),
(9, 1, '127.0.0.1', 29, 'login', 1, 0, '2021-06-14 14:55:47', '2021-06-14 14:55:47', NULL),
(10, 1, '127.0.0.1', 30, 'login', 1, 0, '2021-06-14 15:19:06', '2021-06-14 15:19:06', NULL),
(11, 1, '127.0.0.1', 29, 'login', 1, 0, '2021-06-15 10:58:12', '2021-06-15 10:58:12', NULL),
(12, 1, '127.0.0.1', 29, 'login', 1, 0, '2021-06-17 08:17:11', '2021-06-17 08:17:11', NULL),
(13, 1, '127.0.0.1', 29, 'login', 1, 0, '2021-06-18 10:31:10', '2021-06-18 10:31:10', NULL),
(14, 1, '127.0.0.1', 30, 'login', 1, 0, '2021-06-18 10:32:26', '2021-06-18 10:32:26', NULL),
(15, 1, '127.0.0.1', 29, 'login', 1, 0, '2021-06-18 10:38:45', '2021-06-18 10:38:45', NULL),
(16, 1, '127.0.0.1', 30, 'login', 1, 0, '2021-06-18 10:39:04', '2021-06-18 10:39:04', NULL),
(17, 1, '127.0.0.1', 29, 'login', 1, 0, '2021-06-18 11:59:22', '2021-06-18 11:59:22', NULL),
(18, 1, '127.0.0.1', 30, 'login', 1, 0, '2021-06-18 12:49:59', '2021-06-18 12:49:59', NULL),
(19, 1, '127.0.0.1', 29, 'login', 1, 0, '2021-06-18 16:48:29', '2021-06-18 16:48:29', NULL),
(20, 1, '127.0.0.1', 30, 'login', 1, 0, '2021-06-18 16:48:48', '2021-06-18 16:48:48', NULL),
(21, 1, '127.0.0.1', 30, 'login', 1, 0, '2021-06-18 17:53:07', '2021-06-18 17:53:07', NULL),
(22, 1, '127.0.0.1', 29, 'login', 1, 0, '2021-06-18 18:01:28', '2021-06-18 18:01:28', NULL),
(23, 1, '127.0.0.1', 29, 'login', 1, 0, '2021-06-18 18:11:56', '2021-06-18 18:11:56', NULL),
(24, 1, '127.0.0.1', 29, 'login', 1, 0, '2021-06-21 10:55:05', '2021-06-21 10:55:05', NULL),
(25, 1, '127.0.0.1', 29, 'login', 1, 0, '2021-06-21 13:23:47', '2021-06-21 13:23:47', NULL),
(26, 1, '127.0.0.1', 29, 'login', 1, 0, '2021-06-21 16:54:35', '2021-06-21 16:54:35', NULL),
(27, 1, '127.0.0.1', 29, 'login', 1, 0, '2021-06-21 18:51:26', '2021-06-21 18:51:26', NULL),
(28, 1, '127.0.0.1', 30, 'login', 1, 0, '2021-06-21 19:57:41', '2021-06-21 19:57:41', NULL),
(29, 1, '127.0.0.1', 29, 'login', 1, 0, '2021-06-21 19:57:59', '2021-06-21 19:57:59', NULL),
(30, 1, '127.0.0.1', 29, 'login', 1, 0, '2021-06-22 12:14:52', '2021-06-22 12:14:52', NULL),
(31, 1, '127.0.0.1', 29, 'login', 1, 0, '2021-06-22 14:55:12', '2021-06-22 14:55:12', NULL),
(32, 1, '127.0.0.1', 29, 'login', 1, 0, '2021-06-22 17:55:38', '2021-06-22 17:55:38', NULL),
(33, 1, '127.0.0.1', 29, 'login', 1, 0, '2021-06-23 11:48:30', '2021-06-23 11:48:30', NULL),
(34, 1, '127.0.0.1', 29, 'login', 1, 0, '2021-06-23 14:22:08', '2021-06-23 14:22:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks_comments`
--

CREATE TABLE `tasks_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` bigint(20) UNSIGNED NOT NULL,
  `task_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks_comments`
--

INSERT INTO `tasks_comments` (`id`, `emp_id`, `task_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 1010, 'Task-Jwu10w-11082021', 'message 1', '2021-09-03 13:06:33', '2021-09-03 13:06:33'),
(2, 1012, 'Task-Jwu10w-11082021', 'message 2', '2021-09-03 13:07:12', '2021-09-03 13:07:12'),
(3, 1000, 'Task-Jwu10w-11082021', 'message 3', '2021-09-03 13:07:18', '2021-09-03 13:07:18'),
(4, 1000, 'Task-rkbMZo-18082021', 'asdf', '2021-09-06 04:18:37', '2021-09-06 04:18:37'),
(5, 1012, 'Task-rkbMZo-18082021', 'asdf', '2021-09-06 04:18:45', '2021-09-06 04:18:45'),
(6, 1000, 'Task-rkbMZo-18082021', 'zxc', '2021-09-06 04:20:33', '2021-09-06 04:20:33'),
(7, 1013, 'Task-rkbMZo-18082021', 'zxcc', '2021-09-06 04:20:40', '2021-09-06 04:20:40'),
(8, 1015, 'Task-rkbMZo-18082021', 'zxc', '2021-09-06 04:20:43', '2021-09-06 04:20:43'),
(9, 1000, 'Task-rkbMZo-18082021', 'zxc', '2021-09-06 04:20:45', '2021-09-06 04:20:45'),
(10, 1014, 'Task-z6FPJu-18082021', 'new messageas', '2021-09-06 04:25:37', '2021-09-06 04:25:37'),
(11, 1012, 'Task-rkbMZo-18082021', 'new messageas', '2021-09-06 04:29:01', '2021-09-06 04:29:01'),
(12, 1000, 'Task-z6FPJu-18082021', 'again', '2021-09-06 04:31:31', '2021-09-06 04:31:31'),
(13, 1000, 'Task-rkbMZo-18082021', 'abcd', '2021-09-06 04:33:36', '2021-09-06 04:33:36'),
(14, 1012, 'Task-rkbMZo-18082021', 'asdf', '2021-09-06 04:33:52', '2021-09-06 04:33:52'),
(15, 1000, 'Task-rkbMZo-18082021', 'a', '2021-09-06 04:34:07', '2021-09-06 04:34:07'),
(16, 1013, 'Task-rkbMZo-18082021', 'ad', '2021-09-06 04:34:14', '2021-09-06 04:34:14'),
(17, 1000, 'Task-rkbMZo-18082021', 'new messageas', '2021-09-06 04:34:38', '2021-09-06 04:34:38'),
(18, 1000, 'Task-rkbMZo-18082021', 'asdff', '2021-09-06 04:51:48', '2021-09-06 04:51:48'),
(19, 1018, 'Task-rkbMZo-18082021', 'asdf', '2021-09-06 04:51:58', '2021-09-06 04:51:58'),
(20, 1000, 'Task-rkbMZo-18082021', 'asdf', '2021-09-06 04:52:03', '2021-09-06 04:52:03'),
(21, 1015, 'Task-z6FPJu-18082021', 'asdf', '2021-09-06 04:52:06', '2021-09-06 04:52:06'),
(22, 1000, 'Task-rkbMZo-18082021', 'asdf', '2021-09-06 04:52:08', '2021-09-06 04:52:08'),
(23, 1016, 'Task-z6FPJu-18082021', 'asdf', '2021-09-06 04:52:09', '2021-09-06 04:52:09'),
(24, 1000, 'Task-rkbMZo-18082021', 'asdf', '2021-09-06 04:52:10', '2021-09-06 04:52:10'),
(25, 1014, 'Task-z6FPJu-18082021', 'asdf', '2021-09-06 04:52:10', '2021-09-06 04:52:10'),
(26, 1000, 'Task-rkbMZo-18082021', 'asdf', '2021-09-06 04:52:10', '2021-09-06 04:52:10'),
(27, 1000, 'Task-rkbMZo-18082021', 'asdf', '2021-09-06 04:52:20', '2021-09-06 04:52:20'),
(28, 1000, 'Task-rkbMZo-18082021', 'asd', '2021-09-06 04:52:33', '2021-09-06 04:52:33'),
(29, 1000, 'Task-rkbMZo-18082021', 'yes', '2021-09-06 04:52:37', '2021-09-06 04:52:37'),
(30, 1000, 'Task-rkbMZo-18082021', '!', '2021-09-06 04:52:38', '2021-09-06 04:52:38'),
(31, 1000, 'Task-rkbMZo-18082021', 'a', '2021-09-06 05:05:33', '2021-09-06 05:05:33'),
(32, 1000, 'Task-rkbMZo-18082021', 'this is new message', '2021-09-06 06:23:56', '2021-09-06 06:23:56'),
(33, 1010, 'Task-rkbMZo-18082021', 'dev 1', '2021-09-06 06:33:18', '2021-09-06 06:33:18'),
(34, 1010, 'Task-rkbMZo-18082021', 'sadf', '2021-09-06 06:33:33', '2021-09-06 06:33:33'),
(35, 1000, 'Task-rkbMZo-18082021', 'asd', '2021-09-06 06:34:02', '2021-09-06 06:34:02'),
(36, 1000, 'Task-Jwu10w-11082021', 'message 1', '2021-09-07 06:48:58', '2021-09-07 06:48:58'),
(37, 1000, 'Task-Jwu10w-11082021', 'new message', '2021-09-07 08:56:18', '2021-09-07 08:56:18'),
(38, 1010, 'Task-Jwu10w-11082021', 'message 1', '2021-09-07 10:47:05', '2021-09-07 10:47:05'),
(39, 1000, 'Task-Jwu10w-11082021', 'new messageas', '2021-09-09 05:52:38', '2021-09-09 05:52:38'),
(40, 1010, 'Task-Jwu10w-11082021', 'yes', '2021-09-20 03:53:53', '2021-09-20 03:53:53'),
(41, 1000, 'Task-Jwu10w-11082021', 'asdf', '2021-09-22 07:19:54', '2021-09-22 07:19:54'),
(42, 1000, 'Task-Jwu10w-11082021', 'helloo3', '2021-09-22 07:32:55', '2021-09-22 07:32:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL DEFAULT 2 COMMENT '1=>Client;2=>Employee',
  `project_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume_doc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnic_doc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education_doc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residential_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 0,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `reporting_line` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_model_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_number_plate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` double DEFAULT 0,
  `shift_day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shift_in` time DEFAULT '00:00:00',
  `shift_out` time DEFAULT '00:00:00',
  `policy` int(11) DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_code` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `project_id`, `name`, `username`, `email`, `email_verified_at`, `password`, `profile_pic`, `resume_doc`, `cnic_doc`, `education_doc`, `personal_email`, `phonenumber`, `emergency_number`, `cnic`, `residential_address`, `blood_group`, `dob`, `gender`, `marital_status`, `emp_id`, `designation`, `role_id`, `department`, `join_date`, `reporting_line`, `v_model_name`, `v_model_year`, `v_number_plate`, `bank_account_number`, `salary`, `shift_day`, `shift_in`, `shift_out`, `policy`, `company`, `bio`, `city`, `postcode`, `country`, `is_active`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`, `remember_token`, `two_factor_code`, `two_factor_expires_at`) VALUES
(1, 2, 29, 'Administrator', 'admin', 'admin@project.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/d05c0005452b9f34da2619e71b70561f/8cObG2FFbK0eQ7WwW6douTP2O3YjKLu4szGd1vKR.png', 'uploads/resume/2339f4445ad239e370e032dbee4d5819/4e9psgcsxImYuXFTRJMdpu9RS7RgL6twLhX6QfCT.png', 'uploads/cnic/b591d9b80583399ce26d62ab98bf47ec/it4PcMBwokHHu43ruRYeNi1benQEdfCCEolbOcLr.png', NULL, 'admin@thesoftcube.com', '0300-00000000', '0300-00000000', '00000-0000000-0', 'None', NULL, '1992-06-14', 'male', 'single', '1000', '14', 1, NULL, '2021-05-01', NULL, 'Vitz', '2021', '12345', 'None', 10000, 'Day', '00:00:00', '00:00:00', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-11 09:44:21', '2021-05-17 07:31:59', NULL, NULL, NULL, NULL),
(2, 2, 29, 'Developer 1', 'devop1', 'moriy77135@busantei.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, 'developer1@thesoftcube.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1010', '0', 0, '4', '2021-03-01', 'team.lead1@thesoftcube.com', NULL, NULL, NULL, NULL, 1200, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 13:19:05', '2021-09-27 04:37:13', NULL, NULL, NULL, NULL),
(3, 2, 29, 'Developer 2', 'dev2', 'developer2@thesoftcube.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, 'developer2@thesoftcube.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1011', '0', 0, '4', '2021-03-01', 'teamlead1@thesoftcube.com', NULL, NULL, NULL, NULL, 0, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 13:19:05', '2021-09-06 07:29:53', NULL, NULL, NULL, NULL),
(4, 2, 29, 'Team Lead 1', 'team.lead1', 'team.lead1@thesoftcube.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/3f44cd07a477f04ce952c2074e3e52be/RwStmtLLQf4bcVoAShKTx1WEmymZ6gOTvMbD37kJ.png', NULL, NULL, NULL, 'team.lead1@thesoftcube.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1012', '0', 0, '4', '2021-03-01', 'production.manager1@thesoftcube.com', NULL, NULL, NULL, NULL, 0, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 13:19:05', '2021-09-20 08:44:28', NULL, NULL, NULL, NULL),
(5, 2, 29, 'Team Lead 2', 'team.lead2', 'team.lead2@thesoftcube.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, 'team.lead2@thesoftcube.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1013', '0', 0, '4', '2021-03-01', 'production.manager1@thesoftcube.com', NULL, NULL, NULL, NULL, 0, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 13:19:05', '2021-09-09 06:13:38', NULL, NULL, NULL, NULL),
(6, 2, 29, 'Production Manager 1', 'production.manager1', 'production.manager1@thesoftcube.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/b36b26b95bd2cd8e01eef2c751d67c1c/6Y1KmKLYJHLjDbvErROdJ0ygrZgKj3390FNri7hv.jpg', NULL, NULL, NULL, 'production.manager1@thesoftcube.com', '0345-1234567', '0312-1234567', '42101-1234567-2', 'Pakistan Karachi', NULL, '1997-05-06', 'male', 'single', '1014', '0', 0, '4', '2021-03-01', 'hod.production1@thesoftcube.com', NULL, NULL, NULL, NULL, 0, 'Night', '21:00:00', '06:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 14:44:31', '2021-09-17 06:45:44', NULL, NULL, NULL, NULL),
(7, 2, 29, 'HOD Production 1', 'hod.production1', 'hod.production1@thesoftcube.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, 'hod.production1@thesoftcube.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1015', '0', 0, '4', '2021-03-01', 'hod.production1@thesoftcube.com', NULL, NULL, NULL, NULL, 50000, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 13:19:05', '2021-08-18 09:52:57', NULL, NULL, NULL, NULL),
(14, 2, 29, 'Sales Agent 1', 'sales.agent1', 'sales.agent1@thesoftcube.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, 'sales.agent1@thesoftcube.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1016', '0', 0, '2', '2021-03-01', 'sales.manager1@thesoftcube.com', NULL, NULL, NULL, NULL, 0, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 18:19:05', '2021-08-11 11:02:55', NULL, NULL, NULL, NULL),
(15, 2, 29, 'Sales Agent 2', 'sales.agent2', 'sales.agent2@thesoftcube.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, 'sales.agent2@thesoftcube.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1017', '0', 0, '2', '2021-03-01', 'sales.manager1@thesoftcube.com', NULL, NULL, NULL, NULL, 0, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 18:19:05', '2021-08-12 06:21:57', NULL, NULL, NULL, NULL),
(16, 2, 29, 'Sales Manager 1', 'sales.manager1', 'sales.manager1@thesoftcube.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, 'sales.manager1@thesoftcube.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1018', '0', 0, '2', '2021-03-01', 'brand.manager1@thesoftcube.com', NULL, NULL, NULL, NULL, 40000, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 18:19:05', '2021-08-12 05:43:08', NULL, NULL, NULL, NULL),
(17, 2, 29, 'Brand Manager 1', 'brand.manager1', 'brand.manager1@thesoftcube.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, 'brand.manager1@thesoftcube.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1019', '0', 0, '5', '2021-03-01', 'salesnsupport.manager1@thesoftcube.com', NULL, NULL, NULL, NULL, 0, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 18:19:05', '2021-08-12 04:55:11', NULL, NULL, NULL, NULL),
(18, 2, 29, 'Sales & Support Manager 1', 'salesnsupport.manager1', 'salesnsupport.manager1@thesoftcube.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, 'salesnsupport.manager1@thesoftcube.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1020', '0', 0, '7', '2021-03-01', 'hod.salesnsupport1@thesoftcube.com', NULL, NULL, NULL, NULL, 25000, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 18:19:05', '2021-08-12 05:40:49', NULL, NULL, NULL, NULL),
(19, 2, 29, 'HOD Sales & Support 1', 'hod.salesnsupport1', 'hod.salesnsupport1@thesoftcube.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, 'hod.salesnsupport1@thesoftcube.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1021', '0', 0, '6', '2021-03-01', 'hod.salesnsupport1@thesoftcube.com', NULL, NULL, NULL, NULL, 0, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 18:19:05', '2021-08-12 05:37:16', NULL, NULL, NULL, NULL),
(20, 2, 29, 'Support Agent 1', 'support.agent1', 'support.agent1@thesoftcube.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, 'support.agent1@thesoftcube.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1022', '0', 0, '3', '2021-03-01', 'support.manager1@thesoftcube.com', NULL, NULL, NULL, NULL, 0, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 18:19:05', '2021-08-12 06:28:38', NULL, NULL, NULL, NULL),
(21, 2, 29, 'Support Agent 2', 'support.agent2', 'support.agent2@thesoftcube.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, 'support.agent2@thesoftcube.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1023', '0', 0, '3', '2021-03-01', 'support.manager1@thesoftcube.com', NULL, NULL, NULL, NULL, 0, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 18:19:05', '2021-08-12 06:28:47', NULL, NULL, NULL, NULL),
(22, 2, 29, 'Support Manager 1', 'support.manager1', 'support.manager1@thesoftcube.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, 'support.manager1@thesoftcube.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1024', '0', 0, '3', '2021-03-01', 'brand.manager1@thesoftcube.com', NULL, NULL, NULL, NULL, 60000, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 18:19:05', '2021-08-12 06:24:21', NULL, NULL, NULL, NULL),
(23, 1, 1, 'Client 1', NULL, 'client1@thesoftcube.com', NULL, '$2y$10$vxpBOmFKY4T8qwKtlYu1LOyrzxxh3FVbh6dN7wGMxKBwT07H2UslS', NULL, NULL, NULL, NULL, NULL, '0317123457', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-08-11 11:09:23', '2021-08-25 07:47:21', NULL, NULL, NULL, NULL),
(25, 2, 29, 'Brand Manager 2', 'brand.manager2', 'brand.manager2@thesoftcube.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, 'brand.manager2@thesoftcube.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1025', '0', 0, '5', '2021-03-01', 'salesnsupport.manager1@thesoftcube.com', NULL, NULL, NULL, NULL, 0, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 13:19:05', '2021-08-11 23:55:11', NULL, NULL, NULL, NULL),
(26, 1, NULL, 'client 2', NULL, 'client2@thesoftcube.com', NULL, '$2y$10$j/8K2Rkt7ANN./YbcCu6xO2Lx5SQIu3KN5RWPFYmaNYu7yuQwYmse', NULL, NULL, NULL, NULL, NULL, '123214343', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-08-16 07:01:56', '2021-08-19 08:12:58', NULL, NULL, NULL, NULL),
(27, 1, NULL, 'client 2', NULL, 'client3@thesoftcube.com', NULL, '$2y$10$wsVugjildajbioy4VF6egetaJyEzCDlbf7NKLJA7FwbtF6ynY7rBe', NULL, NULL, NULL, NULL, NULL, '12342134', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-08-16 07:11:28', '2021-08-25 09:07:18', NULL, NULL, NULL, NULL),
(29, 1, NULL, 'client 4', NULL, 'nepenax261@cfcjy.com', NULL, '$2y$10$Lon0HLNwNkISp/QUQz0PTej3SrlLX36Rhhn0sESHCWbxDV/7RSlAC', NULL, NULL, NULL, NULL, NULL, '123421344', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-08-16 07:18:19', '2021-08-25 09:07:19', NULL, NULL, NULL, NULL),
(30, 1, NULL, 'Creative Word', NULL, 'tester@tester.com', NULL, '$2y$10$cDVTk2E4IlEkyudmU.xQV.QtwOHAC4Ck2kBQErkZ6Poa029Z4uUK6', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, NULL, '1231231231', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2021-08-16 12:48:42', '2021-08-16 12:48:42', NULL, NULL, NULL, NULL),
(31, 2, NULL, 'Developer 3', 'developer3', 'developer3@thesoftcube.com', NULL, '$2y$10$v53kC2dg6M3gWWGC3Wm3ken6whEM6kJj2vDw.1lfFN7P66QTiq9Z6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1026', NULL, 0, '4', NULL, 'developer3@thesoftcube.com', NULL, NULL, NULL, NULL, 0, NULL, '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-23 08:28:07', '2021-09-23 08:28:07', NULL, NULL, NULL, NULL),
(32, 2, NULL, 'my full name', 'my-user-name', 'me@mydomain.com', NULL, '$2y$10$Nl0tdjY2OwpyFlVSO.K32u.bFCBfGGToOiic6Xj1oeFg/Piv7bhtK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1027', NULL, 0, '4', NULL, 'me@mydomain.com', NULL, NULL, NULL, NULL, 0, NULL, '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-23 09:05:08', '2021-09-23 09:05:08', NULL, NULL, NULL, NULL),
(33, 1, 0, 'partner1c1', NULL, 'partner1c1@thesoftcube.com', NULL, '$2y$10$jk8/Zh8qUm9H8spV.8eAVeDM4j3mBIrPslAA7EK9cM05KosM2bEH2', NULL, NULL, NULL, NULL, NULL, '12341234323', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-29 06:08:52', '2021-09-29 06:08:52', NULL, NULL, NULL, NULL),
(34, 1, 0, 'partner2c1', NULL, 'partner2c1@thesoftcube.com', NULL, '$2y$10$F3909TGSYJb6EYKf0xfaL.LbbDFnTJ0fDB0d3S0n..HtY1i8hi//e', NULL, NULL, NULL, NULL, NULL, '12342134234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-29 06:08:52', '2021-09-29 06:08:52', NULL, NULL, NULL, NULL),
(35, 2, NULL, 'demouseremail1', 'demouseremail1', 'demouseremail1@test.com', NULL, '$2y$10$YbuoWPukHe3KFsWxXzhFBu9HIwVr4nGiTxN0Omk9IgVwtXFyKrHRe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1028', NULL, 0, '4', NULL, 'demouseremail1@test.com', NULL, NULL, NULL, NULL, 1000, NULL, '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-29 09:22:07', '2021-09-29 09:22:07', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abilities`
--
ALTER TABLE `abilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abilities_scope_index` (`scope`);

--
-- Indexes for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assigned_roles_entity_index` (`entity_id`,`entity_type`,`scope`),
  ADD KEY `assigned_roles_role_id_index` (`role_id`),
  ADD KEY `assigned_roles_scope_index` (`scope`);

--
-- Indexes for table `assignee_brand_targets`
--
ALTER TABLE `assignee_brand_targets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignee_brand_targets_brand_target_id_foreign` (`brand_target_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `brand_employees`
--
ALTER TABLE `brand_employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_employees_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `brand_targets`
--
ALTER TABLE `brand_targets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_targets_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_partners`
--
ALTER TABLE `client_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_forms`
--
ALTER TABLE `lead_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_sticky_notes`
--
ALTER TABLE `my_sticky_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_entity_index` (`entity_id`,`entity_type`,`scope`),
  ADD KEY `permissions_ability_id_index` (`ability_id`),
  ADD KEY `permissions_scope_index` (`scope`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_attachment`
--
ALTER TABLE `project_attachment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_package`
--
ALTER TABLE `project_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_reviews`
--
ALTER TABLE `project_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_task`
--
ALTER TABLE `project_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_task_comment`
--
ALTER TABLE `project_task_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_task_label`
--
ALTER TABLE `project_task_label`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_thread`
--
ALTER TABLE `project_thread`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_thread_comment`
--
ALTER TABLE `project_thread_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_transitions`
--
ALTER TABLE `project_transitions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_transitions_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`,`scope`),
  ADD KEY `roles_scope_index` (`scope`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks_comments`
--
ALTER TABLE `tasks_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `emp_id` (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abilities`
--
ALTER TABLE `abilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `assignee_brand_targets`
--
ALTER TABLE `assignee_brand_targets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brand_employees`
--
ALTER TABLE `brand_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `brand_targets`
--
ALTER TABLE `brand_targets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_partners`
--
ALTER TABLE `client_partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lead_forms`
--
ALTER TABLE `lead_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `my_sticky_notes`
--
ALTER TABLE `my_sticky_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=516;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `project_attachment`
--
ALTER TABLE `project_attachment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `project_package`
--
ALTER TABLE `project_package`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `project_reviews`
--
ALTER TABLE `project_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `project_task`
--
ALTER TABLE `project_task`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project_task_comment`
--
ALTER TABLE `project_task_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_task_label`
--
ALTER TABLE `project_task_label`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_thread`
--
ALTER TABLE `project_thread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_thread_comment`
--
ALTER TABLE `project_thread_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_transitions`
--
ALTER TABLE `project_transitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tasks_comments`
--
ALTER TABLE `tasks_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  ADD CONSTRAINT `assigned_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assignee_brand_targets`
--
ALTER TABLE `assignee_brand_targets`
  ADD CONSTRAINT `assignee_brand_targets_brand_target_id_foreign` FOREIGN KEY (`brand_target_id`) REFERENCES `brand_targets` (`id`);

--
-- Constraints for table `brand_employees`
--
ALTER TABLE `brand_employees`
  ADD CONSTRAINT `brand_employees_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Constraints for table `brand_targets`
--
ALTER TABLE `brand_targets`
  ADD CONSTRAINT `brand_targets_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ability_id_foreign` FOREIGN KEY (`ability_id`) REFERENCES `abilities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_transitions`
--
ALTER TABLE `project_transitions`
  ADD CONSTRAINT `project_transitions_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
