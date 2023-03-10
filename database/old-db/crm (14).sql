-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2021 at 03:38 AM
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
-- Database: `crm`
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
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
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
(30, 'edit-lead-form', 'Edit Lead Form', NULL, NULL, 0, NULL, NULL, '2021-09-13 06:38:37', '2021-09-13 06:38:37');

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
(27, 4, 2, 'App\\Models\\User', NULL, NULL, NULL),
(29, 3, 4, 'App\\Models\\User', NULL, NULL, NULL),
(30, 3, 5, 'App\\Models\\User', NULL, NULL, NULL),
(31, 12, 7, 'App\\Models\\User', NULL, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `brand_employees`
--

CREATE TABLE `brand_employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

INSERT INTO `lead_forms` (`id`, `name`, `email`, `phone`, `message`, `country`, `brand_id`, `brand_name`, `page_url`, `interested_in`, `budget`, `package`, `package_price`, `business_description`, `design_perception`, `additional_comments`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'client1', 'client1@thesoftcube.com', '1071234567', 'Some text message', 'USA', '1', 'The New Brand 1', 'https://www.thesoftcube.com', 'Software', '2000', NULL, 2500, 'Some text message Some text message Some text message', 'Some text message Some text message Some text message', 'Some text message Some text message Some text message Some text message', '2021-09-13 09:29:05', '2021-09-13 09:29:19', NULL),
(2, 'client1', 'client1@thesoftcube.com', '1071234567', 'Some text message', 'USA', '2', 'The New Brand 2', 'https://www.thesoftcube.com', 'Software', '2000', NULL, 2500, 'Some text message Some text message Some text message', 'Some text message Some text message Some text message', 'Some text message Some text message Some text message Some text message', '2021-09-13 09:29:05', '2021-09-13 09:29:19', NULL);

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
(8, '2021_07_23_134242_create_bouncer_tables', 1);

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
('nepenax261@cfcjy.com', '$2y$10$jrgQA9O0EPJ/37SNPSUcAuHPLLXjPQr4zabV7FNlWUkhB9HG1gzza', '2021-08-16 08:21:09', NULL, NULL);

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
(81, 1, 9, 'roles', 0, NULL),
(82, 4, 9, 'roles', 0, NULL),
(83, 6, 9, 'roles', 0, NULL),
(84, 9, 9, 'roles', 0, NULL),
(85, 10, 9, 'roles', 0, NULL),
(86, 13, 9, 'roles', 0, NULL),
(87, 14, 9, 'roles', 0, NULL),
(88, 15, 9, 'roles', 0, NULL),
(89, 16, 9, 'roles', 0, NULL),
(90, 20, 9, 'roles', 0, NULL),
(91, 23, 9, 'roles', 0, NULL),
(211, 4, 2, 'roles', 0, NULL),
(212, 9, 2, 'roles', 0, NULL),
(213, 10, 2, 'roles', 0, NULL),
(214, 12, 2, 'roles', 0, NULL),
(215, 13, 2, 'roles', 0, NULL),
(216, 14, 2, 'roles', 0, NULL),
(217, 15, 2, 'roles', 0, NULL),
(218, 16, 2, 'roles', 0, NULL),
(219, 20, 2, 'roles', 0, NULL),
(220, 23, 2, 'roles', 0, NULL),
(221, 24, 2, 'roles', 0, NULL),
(222, 25, 2, 'roles', 0, NULL),
(223, 26, 2, 'roles', 0, NULL),
(224, 27, 2, 'roles', 0, NULL),
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
(320, 1, 11, 'roles', 0, NULL),
(321, 2, 11, 'roles', 0, NULL),
(322, 4, 11, 'roles', 0, NULL),
(323, 6, 11, 'roles', 0, NULL),
(324, 9, 11, 'roles', 0, NULL),
(325, 10, 11, 'roles', 0, NULL),
(326, 13, 11, 'roles', 0, NULL),
(327, 14, 11, 'roles', 0, NULL),
(328, 15, 11, 'roles', 0, NULL),
(329, 16, 11, 'roles', 0, NULL),
(330, 20, 11, 'roles', 0, NULL),
(331, 23, 11, 'roles', 0, NULL),
(332, 28, 11, 'roles', 0, NULL),
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
(347, 1, 1, 'roles', 0, NULL),
(348, 2, 1, 'roles', 0, NULL),
(349, 3, 1, 'roles', 0, NULL),
(350, 4, 1, 'roles', 0, NULL),
(351, 5, 1, 'roles', 0, NULL),
(352, 6, 1, 'roles', 0, NULL),
(353, 7, 1, 'roles', 0, NULL),
(354, 8, 1, 'roles', 0, NULL),
(355, 9, 1, 'roles', 0, NULL),
(356, 10, 1, 'roles', 0, NULL),
(357, 11, 1, 'roles', 0, NULL),
(358, 12, 1, 'roles', 0, NULL),
(359, 13, 1, 'roles', 0, NULL),
(360, 14, 1, 'roles', 0, NULL),
(361, 15, 1, 'roles', 0, NULL),
(362, 16, 1, 'roles', 0, NULL),
(363, 17, 1, 'roles', 0, NULL),
(364, 18, 1, 'roles', 0, NULL),
(365, 19, 1, 'roles', 0, NULL),
(366, 20, 1, 'roles', 0, NULL),
(367, 21, 1, 'roles', 0, NULL),
(368, 22, 1, 'roles', 0, NULL),
(369, 23, 1, 'roles', 0, NULL),
(370, 24, 1, 'roles', 0, NULL),
(371, 25, 1, 'roles', 0, NULL),
(372, 26, 1, 'roles', 0, NULL),
(373, 27, 1, 'roles', 0, NULL),
(374, 28, 1, 'roles', 0, NULL),
(375, 29, 1, 'roles', 0, NULL),
(376, 30, 1, 'roles', 0, NULL),
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
(389, 29, 8, 'roles', 0, NULL);

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
  `transition_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_cost` double DEFAULT NULL,
  `paid_cost` double DEFAULT NULL,
  `remain_cost` double DEFAULT NULL,
  `response` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 2, 29, 'Administrator', 'admin', 'admin@project.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/d05c0005452b9f34da2619e71b70561f/8cObG2FFbK0eQ7WwW6douTP2O3YjKLu4szGd1vKR.png', 'uploads/resume/2339f4445ad239e370e032dbee4d5819/4e9psgcsxImYuXFTRJMdpu9RS7RgL6twLhX6QfCT.png', 'uploads/cnic/b591d9b80583399ce26d62ab98bf47ec/it4PcMBwokHHu43ruRYeNi1benQEdfCCEolbOcLr.png', NULL, 'admin@thesoftcube.com', '0300-00000000', '0300-00000000', '00000-0000000-0', 'None', NULL, '1992-06-14', 'male', 'single', '1000', '14', 1, NULL, '2021-05-01', NULL, 'Vitz', '2021', '12345', 'None', 10000000, 'Day', '00:00:00', '00:00:00', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-11 09:44:21', '2021-05-17 07:31:59', NULL, NULL, NULL, NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `assignee_brand_targets`
--
ALTER TABLE `assignee_brand_targets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brand_employees`
--
ALTER TABLE `brand_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brand_targets`
--
ALTER TABLE `brand_targets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=390;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `project_attachment`
--
ALTER TABLE `project_attachment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `project_package`
--
ALTER TABLE `project_package`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `project_reviews`
--
ALTER TABLE `project_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
