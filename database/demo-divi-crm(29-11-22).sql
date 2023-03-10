-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 29, 2022 at 07:51 AM
-- Server version: 8.0.26
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo-divi-crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `abilities`
--

CREATE TABLE `abilities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entity_id` bigint UNSIGNED DEFAULT NULL,
  `entity_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `only_owned` tinyint(1) NOT NULL DEFAULT '0',
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `scope` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `academic_levels`
--

CREATE TABLE `academic_levels` (
  `id` bigint UNSIGNED NOT NULL,
  `level` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_levels`
--

INSERT INTO `academic_levels` (`id`, `level`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'GCSE', NULL, NULL, NULL),
(2, 'A-Level', NULL, NULL, NULL),
(3, 'Diploma (HNC/HND)', NULL, NULL, NULL),
(4, 'Undergraduate', NULL, NULL, NULL),
(5, 'Masters', NULL, NULL, NULL),
(6, 'Mphil', NULL, NULL, NULL),
(7, 'PhD', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assigned_roles`
--

CREATE TABLE `assigned_roles` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `entity_id` bigint UNSIGNED NOT NULL,
  `entity_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `restricted_to_id` bigint UNSIGNED DEFAULT NULL,
  `restricted_to_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scope` int DEFAULT NULL
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
(31, 12, 7, 'App\\Models\\User', NULL, NULL, NULL),
(32, 4, 31, 'App\\Models\\User', NULL, NULL, NULL),
(33, 1, 32, 'App\\Models\\User', NULL, NULL, NULL),
(34, 4, 33, 'App\\Models\\User', NULL, NULL, NULL),
(36, 4, 3, 'App\\Models\\User', NULL, NULL, NULL),
(37, 5, 34, 'App\\Models\\User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assignee_brand_targets`
--

CREATE TABLE `assignee_brand_targets` (
  `id` bigint UNSIGNED NOT NULL,
  `brand_target_id` bigint UNSIGNED NOT NULL,
  `assignee_type` tinyint NOT NULL COMMENT '1=>Sales Manager,2=>Support Manager, 3=>Own',
  `assigner_emp_id` bigint DEFAULT NULL,
  `target_amount` double DEFAULT NULL,
  `achieved_amount` double DEFAULT NULL,
  `target_month` date DEFAULT NULL,
  `create_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sales_id` bigint UNSIGNED NOT NULL,
  `country_code` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `image`, `sales_id`, `country_code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PeoplePerHour.com', 'peopleperhour.com', 'images/brand-logo/PeoplePerHour-logo.png', 1000, 2, '2021-08-12 08:36:50', '2022-01-04 06:10:46', NULL),
(2, 'Freelancer.com', 'freelancer.com', 'images/brand-logo/freelancer-logo.png', 1000, 1, '2021-08-12 08:36:50', '2022-01-04 06:10:59', NULL),
(3, 'UpWork.com', 'upwork.com', 'images/brand-logo/upwork-logo.png', 1000, 3, '2021-08-12 08:39:53', '2022-01-04 06:11:12', NULL),
(4, 'In-house Brands', 'in-house-brands', 'images/brand-logo/in-house-logo.png', 1000, NULL, '2021-08-16 08:35:02', '2022-01-04 06:11:26', NULL),
(5, 'the new brand updated', 'the-new-brand-updated', 'images/brand-logo/brandh2o-logo.png', 1000, NULL, '2021-08-24 11:40:54', '2021-09-22 04:25:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand_employees`
--

CREATE TABLE `brand_employees` (
  `id` bigint UNSIGNED NOT NULL,
  `brand_id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand_employees`
--

INSERT INTO `brand_employees` (`id`, `brand_id`, `employee_id`) VALUES
(1, 1, 1019),
(2, 1, 1025),
(3, 2, 1016),
(4, 4, 1016),
(5, 4, 1017);

-- --------------------------------------------------------

--
-- Table structure for table `brand_source_accounts`
--

CREATE TABLE `brand_source_accounts` (
  `id` bigint UNSIGNED NOT NULL,
  `brand_id` bigint UNSIGNED NOT NULL,
  `source_account_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand_source_accounts`
--

INSERT INTO `brand_source_accounts` (`id`, `brand_id`, `source_account_id`, `created_at`, `updated_at`) VALUES
(2, 4, 2, '2022-03-14 03:10:06', '2022-03-14 03:10:06'),
(6, 3, 1, '2022-03-14 03:16:15', '2022-03-14 03:16:15'),
(9, 1, 1, '2022-03-14 10:18:31', '2022-03-14 10:18:31'),
(10, 1, 2, '2022-03-14 10:18:31', '2022-03-14 10:18:31');

-- --------------------------------------------------------

--
-- Table structure for table `brand_targets`
--

CREATE TABLE `brand_targets` (
  `id` bigint UNSIGNED NOT NULL,
  `brand_id` bigint UNSIGNED NOT NULL,
  `create_by` bigint DEFAULT NULL,
  `target_month` date DEFAULT NULL,
  `target_amount` double DEFAULT NULL,
  `brand_manager_id` bigint DEFAULT NULL,
  `is_assignee` tinyint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand_targets`
--

INSERT INTO `brand_targets` (`id`, `brand_id`, `create_by`, `target_month`, `target_amount`, `brand_manager_id`, `is_assignee`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 3, 1000, '2022-09-01', 50000, 1025, 0, '2022-09-26 02:19:04', '2022-09-26 02:19:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int NOT NULL,
  `to_user_id` int NOT NULL,
  `from_user_id` int NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int NOT NULL DEFAULT '0',
  `is_active` tinyint NOT NULL DEFAULT '1',
  `is_deleted` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `content_projects`
--

CREATE TABLE `content_projects` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `project_id` int NOT NULL,
  `reference_style_id` bigint UNSIGNED NOT NULL,
  `number_of_words_id` bigint UNSIGNED NOT NULL,
  `academic_level_id` bigint UNSIGNED DEFAULT NULL,
  `currency_id` bigint UNSIGNED DEFAULT NULL,
  `paper_topic` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paper_subject` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_slides` int DEFAULT NULL,
  `number_of_references` int DEFAULT NULL,
  `standard_of_work` enum('PASS','MERIT','DISTINCTION') COLLATE utf8mb4_unicode_ci NOT NULL,
  `rephrasing_new` enum('NEW','REPHRASING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NEW',
  `industry_id` int DEFAULT NULL,
  `keywords` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('PENDING','ASSIGNED','REVISION','COMPLETED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `payment_status` enum('UNPAID','PAID','PARTIAL','MILESTONE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'UNPAID',
  `content_type` enum('ACADEMIC','CREATIVE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_project_type` int DEFAULT NULL,
  `deleted_reason` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_projects`
--

INSERT INTO `content_projects` (`id`, `order_id`, `user_id`, `project_id`, `reference_style_id`, `number_of_words_id`, `academic_level_id`, `currency_id`, `paper_topic`, `paper_subject`, `number_of_slides`, `number_of_references`, `standard_of_work`, `rephrasing_new`, `industry_id`, `keywords`, `website`, `status`, `payment_status`, `content_type`, `content_project_type`, `deleted_reason`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Content-creative-Project-E2PUYWoi-14012022', 1000, 4, 5, 18, NULL, NULL, 'abc Topic', 'Subject xyzz', 8, 12, 'DISTINCTION', 'REPHRASING', 12, 'Keyword 1 , Keyword 2  , Keyword 3', 'http://localhost/', 'PENDING', 'UNPAID', 'CREATIVE', 18, NULL, '2022-01-14 05:50:55', '2022-01-14 05:50:55', NULL),
(2, 'Content-academic-Project-dPUPAgEl-14012022', 1000, 5, 4, 3, 2, NULL, 'qwerty Topic', 'asdfggh Subject', 10, 5, 'DISTINCTION', 'REPHRASING', 12, NULL, NULL, 'PENDING', 'UNPAID', 'ACADEMIC', 6, NULL, '2022-01-14 07:17:24', '2022-01-14 07:17:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `content_project_types`
--

CREATE TABLE `content_project_types` (
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` enum('ACADEMIC','CREATIVE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_project_types`
--

INSERT INTO `content_project_types` (`id`, `type`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Essay', 'ACADEMIC', '2021-03-05 00:30:09', '2021-03-05 00:30:09', NULL),
(2, 'Coursework', 'ACADEMIC', '2021-03-05 00:30:17', '2021-03-05 00:30:17', NULL),
(3, 'Assignments', 'ACADEMIC', '2021-03-05 00:30:23', '2021-03-16 00:17:56', NULL),
(4, 'Dissertation', 'ACADEMIC', '2021-03-05 00:30:23', '2021-03-05 00:30:23', NULL),
(5, 'Thesis', 'ACADEMIC', '2021-03-05 00:30:23', '2021-03-05 00:30:23', NULL),
(6, 'Research Proposal', 'ACADEMIC', '2021-03-05 00:30:23', '2021-03-05 00:30:23', NULL),
(7, 'Literature Review', 'ACADEMIC', '2021-03-05 00:30:23', '2021-03-05 00:30:23', NULL),
(8, 'Case Study', 'ACADEMIC', '2021-03-05 00:30:23', '2021-03-05 00:30:23', NULL),
(9, 'Report', 'ACADEMIC', '2021-03-05 00:30:23', '2021-03-05 00:30:23', NULL),
(10, 'Editing and Proofreading', 'ACADEMIC', '2021-03-05 00:30:23', '2021-03-05 00:30:23', NULL),
(11, 'PowerPoint Slides', 'ACADEMIC', '2021-03-05 00:30:23', '2021-03-05 00:30:23', NULL),
(12, 'Other', 'ACADEMIC', '2021-03-05 00:30:23', '2021-03-05 00:30:23', NULL),
(13, 'EBook', 'CREATIVE', '2021-03-30 00:26:43', '2021-03-30 00:27:52', NULL),
(14, 'Web Content', 'CREATIVE', '2021-03-30 00:29:28', '2021-03-30 00:29:28', NULL),
(16, 'Other', 'CREATIVE', '2021-03-30 00:29:28', '2021-03-30 00:29:28', NULL),
(17, 'Presentation', 'CREATIVE', '2021-03-31 00:33:51', '2021-03-31 00:33:51', NULL),
(18, 'Aricle/Blog', 'CREATIVE', '2021-03-31 00:34:00', '2021-03-31 00:34:00', NULL),
(19, 'Resume', 'CREATIVE', '2021-03-31 00:36:16', '2021-03-31 00:36:16', NULL),
(20, 'Cover Letter', 'CREATIVE', '2021-03-31 00:36:26', '2021-03-31 00:36:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Andorra', 'AD', '2021-03-05 01:51:34', '2021-03-05 01:51:34'),
(2, 'United Arab Emirates', 'AE', '2021-03-05 01:51:34', '2021-03-05 01:51:34'),
(3, 'Afghanistan', 'AF', '2021-03-05 01:51:34', '2021-03-05 01:51:34'),
(4, 'Antigua and Barbuda', 'AG', '2021-03-05 01:51:34', '2021-03-05 01:51:34'),
(5, 'Anguilla', 'AI', '2021-03-05 01:51:34', '2021-03-05 01:51:34'),
(6, 'Albania', 'AL', '2021-03-05 01:51:34', '2021-03-05 01:51:34'),
(7, 'Armenia', 'AM', '2021-03-05 01:51:34', '2021-03-05 01:51:34'),
(8, 'Netherlands Antilles', 'AN', '2021-03-05 01:51:34', '2021-03-05 01:51:34'),
(9, 'Angola', 'AO', '2021-03-05 01:51:34', '2021-03-05 01:51:34'),
(10, 'Antarctica', 'AQ', '2021-03-05 01:51:34', '2021-03-05 01:51:34'),
(11, 'Argentina', 'AR', '2021-03-05 01:51:34', '2021-03-05 01:51:34'),
(12, 'American Samoa', 'AS', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(13, 'Austria', 'AT', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(14, 'Australia', 'AU', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(15, 'Aruba', 'AW', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(16, 'Azerbaijan', 'AZ', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(17, 'Bosnia and Herzegovina', 'BA', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(18, 'Barbados', 'BB', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(19, 'Bangladesh', 'BD', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(20, 'Belgium', 'BE', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(21, 'Burkina Faso', 'BF', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(22, 'Bulgaria', 'BG', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(23, 'Bahrain', 'BH', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(24, 'Burundi', 'BI', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(25, 'Benin', 'BJ', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(26, 'Bermuda', 'BM', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(27, 'Brunei Darussalam', 'BN', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(28, 'Bolivia', 'BO', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(29, 'Brazil', 'BR', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(30, 'Bahamas', 'BS', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(31, 'Bhutan', 'BT', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(32, 'Bouvet Island', 'BV', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(33, 'Botswana', 'BW', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(34, 'Belarus', 'BY', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(35, 'Belize', 'BZ', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(36, 'Canada', 'CA', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(37, 'Cocos (Keeling) Islands', 'CC', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(38, 'Congo, the Democratic Republic of the', 'CD', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(39, 'Central African Republic', 'CF', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(40, 'Congo', 'CG', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(41, 'Switzerland', 'CH', '2021-03-05 01:51:35', '2021-03-05 01:51:35'),
(42, 'Cote D\'Ivoire', 'CI', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(43, 'Cook Islands', 'CK', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(44, 'Chile', 'CL', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(45, 'Cameroon', 'CM', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(46, 'China', 'CN', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(47, 'Colombia', 'CO', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(48, 'Costa Rica', 'CR', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(49, 'Cuba, Republic of', 'CU', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(50, 'Cape Verde', 'CV', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(51, 'Curacao', 'CW', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(52, 'Christmas Island', 'CX', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(53, 'Cyprus', 'CY', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(54, 'Czech Republic', 'CZ', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(55, 'Germany', 'DE', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(56, 'Djibouti', 'DJ', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(57, 'Denmark', 'DK', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(58, 'Dominica', 'DM', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(59, 'Dominican Republic', 'DO', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(60, 'Algeria', 'DZ', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(61, 'Ecuador', 'EC', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(62, 'Estonia', 'EE', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(63, 'Egypt', 'EG', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(64, 'Western Sahara', 'EH', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(65, 'Eritrea', 'ER', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(66, 'Spain', 'ES', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(67, 'Ethiopia', 'ET', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(68, 'Finland', 'FI', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(69, 'Fiji', 'FJ', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(70, 'Falkland Islands (Malvinas)', 'FK', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(71, 'Micronesia, Federated States of', 'FM', '2021-03-05 01:51:36', '2021-03-05 01:51:36'),
(72, 'Faroe Islands', 'FO', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(73, 'France', 'FR', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(74, 'Gabon', 'GA', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(75, 'United Kingdom', 'GB', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(76, 'Grenada', 'GD', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(77, 'Georgia', 'GE', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(78, 'French Guiana', 'GF', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(79, 'Guernsey', 'GG', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(80, 'Ghana', 'GH', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(81, 'Gibraltar', 'GI', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(82, 'Greenland', 'GL', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(83, 'Gambia', 'GM', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(84, 'Guinea', 'GN', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(85, 'Guadeloupe', 'GP', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(86, 'Equatorial Guinea', 'GQ', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(87, 'Greece', 'GR', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(88, 'South Georgia and the South Sandwich Islands', 'GS', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(89, 'Guatemala', 'GT', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(90, 'Guam', 'GU', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(91, 'Guinea-Bissau', 'GW', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(92, 'Guyana', 'GY', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(93, 'Hong Kong', 'HK', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(94, 'Heard Island and Mcdonald Islands', 'HM', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(95, 'Honduras', 'HN', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(96, 'Croatia', 'HR', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(97, 'Haiti', 'HT', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(98, 'Hungary', 'HU', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(99, 'Indonesia', 'ID', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(100, 'Ireland', 'IE', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(101, 'Israel', 'IL', '2021-03-05 01:51:37', '2021-03-05 01:51:37'),
(102, 'Isle of Man', 'IM', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(103, 'India', 'IN', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(104, 'British Indian Ocean Territory', 'IO', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(105, 'Iraq', 'IQ', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(106, 'Iran, Islamic Republic of', 'IR', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(107, 'Iceland', 'IS', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(108, 'Italy', 'IT', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(109, 'Jersey', 'JE', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(110, 'Jamaica', 'JM', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(111, 'Jordan', 'JO', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(112, 'Japan', 'JP', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(113, 'Kenya', 'KE', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(114, 'Kyrgyzstan', 'KG', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(115, 'Cambodia', 'KH', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(116, 'Kiribati', 'KI', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(117, 'Comoros', 'KM', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(118, 'Saint Kitts and Nevis', 'KN', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(119, 'Korea, Democratic People\'s Republic of', 'KP', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(120, 'Korea, Republic of', 'KR', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(121, 'Kuwait', 'KW', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(122, 'Cayman Islands', 'KY', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(123, 'Kazakhstan', 'KZ', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(124, 'Lao People\'s Democratic Republic', 'LA', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(125, 'Lebanon', 'LB', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(126, 'Saint Lucia', 'LC', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(127, 'Liechtenstein', 'LI', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(128, 'Sri Lanka', 'LK', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(129, 'Liberia', 'LR', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(130, 'Lesotho', 'LS', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(131, 'Lithuania', 'LT', '2021-03-05 01:51:38', '2021-03-05 01:51:38'),
(132, 'Luxembourg', 'LU', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(133, 'Latvia', 'LV', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(134, 'Libyan Arab Jamahiriya', 'LY', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(135, 'Morocco', 'MA', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(136, 'Monaco', 'MC', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(137, 'Moldova, Republic of', 'MD', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(138, 'Montenegro', 'ME', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(139, 'Sint Maarten', 'MF', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(140, 'Madagascar', 'MG', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(141, 'Marshall Islands', 'MH', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(142, 'North Macedonia, Republic of', 'MK', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(143, 'Mali', 'ML', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(144, 'Myanmar', 'MM', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(145, 'Mongolia', 'MN', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(146, 'Macao', 'MO', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(147, 'Northern Mariana Islands', 'MP', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(148, 'Martinique', 'MQ', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(149, 'Mauritania', 'MR', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(150, 'Montserrat', 'MS', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(151, 'Malta', 'MT', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(152, 'Mauritius', 'MU', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(153, 'Maldives', 'MV', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(154, 'Malawi', 'MW', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(155, 'Mexico', 'MX', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(156, 'Malaysia', 'MY', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(157, 'Mozambique', 'MZ', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(158, 'Namibia', 'NA', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(159, 'New Caledonia', 'NC', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(160, 'Niger', 'NE', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(161, 'Norfolk Island', 'NF', '2021-03-05 01:51:39', '2021-03-05 01:51:39'),
(162, 'Nigeria', 'NG', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(163, 'Nicaragua', 'NI', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(164, 'Netherlands', 'NL', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(165, 'Norway', 'NO', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(166, 'Nepal', 'NP', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(167, 'Nauru', 'NR', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(168, 'Niue', 'NU', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(169, 'New Zealand', 'NZ', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(170, 'Oman', 'OM', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(171, 'Panama', 'PA', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(172, 'Peru', 'PE', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(173, 'French Polynesia', 'PF', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(174, 'Papua New Guinea', 'PG', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(175, 'Philippines', 'PH', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(176, 'Pakistan', 'PK', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(177, 'Poland', 'PL', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(178, 'Saint Pierre and Miquelon', 'PM', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(179, 'Pitcairn', 'PN', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(180, 'Puerto Rico', 'PR', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(181, 'Palestinian Territory, Occupied', 'PS', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(182, 'Portugal', 'PT', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(183, 'Palau', 'PW', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(184, 'Paraguay', 'PY', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(185, 'Qatar', 'QA', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(186, 'Reunion', 'RE', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(187, 'Romania', 'RO', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(188, 'Serbia', 'RS', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(189, 'Russian Federation', 'RU', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(190, 'Rwanda', 'RW', '2021-03-05 01:51:40', '2021-03-05 01:51:40'),
(191, 'Saudi Arabia', 'SA', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(192, 'Solomon Islands', 'SB', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(193, 'Seychelles', 'SC', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(194, 'Sudan', 'SD', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(195, 'Sweden', 'SE', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(196, 'Singapore', 'SG', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(197, 'Saint Helena', 'SH', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(198, 'Slovenia', 'SI', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(199, 'Svalbard and Jan Mayen', 'SJ', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(200, 'Slovakia', 'SK', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(201, 'Sierra Leone', 'SL', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(202, 'San Marino', 'SM', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(203, 'Senegal', 'SN', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(204, 'Somalia', 'SO', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(205, 'Suriname', 'SR', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(206, 'Sao Tome and Principe', 'ST', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(207, 'El Salvador', 'SV', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(208, 'Syrian Arab Republic', 'SY', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(209, 'Eswatini', 'SZ', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(210, 'Turks and Caicos Islands', 'TC', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(211, 'Chad', 'TD', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(212, 'French Southern Territories', 'TF', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(213, 'Togo', 'TG', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(214, 'Thailand', 'TH', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(215, 'Tajikistan', 'TJ', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(216, 'Tokelau', 'TK', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(217, 'Timor-Leste', 'TL', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(218, 'Turkmenistan', 'TM', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(219, 'Tunisia', 'TN', '2021-03-05 01:51:41', '2021-03-05 01:51:41'),
(220, 'Tonga', 'TO', '2021-03-05 01:51:42', '2021-03-05 01:51:42'),
(221, 'Turkey', 'TR', '2021-03-05 01:51:42', '2021-03-05 01:51:42'),
(222, 'Trinidad and Tobago', 'TT', '2021-03-05 01:51:42', '2021-03-05 01:51:42'),
(223, 'Tuvalu', 'TV', '2021-03-05 01:51:42', '2021-03-05 01:51:42'),
(224, 'Taiwan', 'TW', '2021-03-05 01:51:42', '2021-03-05 01:51:42'),
(225, 'Tanzania', 'TZ', '2021-03-05 01:51:42', '2021-03-05 01:51:42'),
(226, 'Ukraine', 'UA', '2021-03-05 01:51:42', '2021-03-05 01:51:42'),
(227, 'Uganda', 'UG', '2021-03-05 01:51:42', '2021-03-05 01:51:42'),
(228, 'United States Minor Outlying Islands', 'UM', '2021-03-05 01:51:42', '2021-03-05 01:51:42'),
(229, 'United States', 'US', '2021-03-05 01:51:42', '2021-03-05 01:51:42'),
(230, 'Uruguay', 'UY', '2021-03-05 01:51:42', '2021-03-05 01:51:42'),
(231, 'Uzbekistan', 'UZ', '2021-03-05 01:51:42', '2021-03-05 01:51:42'),
(232, 'Vatican City', 'VA', '2021-03-05 01:51:42', '2021-03-05 01:51:42'),
(233, 'Saint Vincent and the Grenadines', 'VC', '2021-03-05 01:51:42', '2021-03-05 01:51:42'),
(234, 'Venezuela', 'VE', '2021-03-05 01:51:42', '2021-03-05 01:51:42'),
(235, 'Virgin Islands, British', 'VG', '2021-03-05 01:51:42', '2021-03-05 01:51:42'),
(236, 'Virgin Islands, U.S.', 'VI', '2021-03-05 01:51:42', '2021-03-05 01:51:42'),
(237, 'Vietnam', 'VN', '2021-03-05 01:51:42', '2021-03-05 01:51:42'),
(238, 'Vanuatu', 'VU', '2021-03-05 01:51:42', '2021-03-05 01:51:42'),
(239, 'Wallis and Futuna', 'WF', '2021-03-05 01:51:42', '2021-03-05 01:51:42'),
(240, 'Samoa', 'WS', '2021-03-05 01:51:42', '2021-03-05 01:51:42'),
(241, 'Yemen', 'YE', '2021-03-05 01:51:42', '2021-03-05 01:51:42'),
(242, 'Mayotte', 'YT', '2021-03-05 01:51:42', '2021-03-05 01:51:42'),
(243, 'South Africa', 'ZA', '2021-03-05 01:51:42', '2021-03-05 01:51:42'),
(244, 'Zambia', 'ZM', '2021-03-05 01:51:42', '2021-03-05 01:51:42'),
(245, 'Zimbabwe', 'ZW', '2021-03-05 01:51:42', '2021-03-05 01:51:42');

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint UNSIGNED NOT NULL,
  `currency` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `currency`, `symbol`, `created_at`, `updated_at`) VALUES
(2, 'USD', '$', NULL, NULL),
(3, 'PKR', 'pkr', NULL, NULL),
(4, 'GBP', 'GBP', NULL, NULL),
(5, 'CAD', 'CAD', NULL, NULL),
(6, 'AUD', 'AUD', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Table structure for table `design_projects`
--

CREATE TABLE `design_projects` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint DEFAULT NULL,
  `project_id` bigint UNSIGNED NOT NULL,
  `industry_id` bigint UNSIGNED NOT NULL,
  `design_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_audience` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `where_to_use` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_re_design` enum('NEW DESIGN','RE DESIGN') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('PENDING','ASSIGNED','REVISION','COMPLETED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `payment_status` enum('UNPAID','PAID','PARTIAL','MILESTONE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'UNPAID',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `design_projects`
--

INSERT INTO `design_projects` (`id`, `order_id`, `user_id`, `project_id`, `industry_id`, `design_type`, `company_name`, `target_audience`, `slogan`, `genre`, `where_to_use`, `primary_color`, `secondary_color`, `new_re_design`, `status`, `payment_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Design-Project-LRnXqryn-12012022', 1000, 2, 4, 'Website', 'abcd', 'Charity People', 'Yes We Do .', 'Art', 'facebook', 'red', 'blue', 'NEW DESIGN', 'PENDING', 'UNPAID', '2022-01-12 06:16:04', '2022-01-12 06:16:04', NULL),
(2, 'Design-Project-wP686KwO-16032022', 1000, 10, 1, 'Logo', 'abc', NULL, 'teee', NULL, 'youtube', 'red', 'green', 'NEW DESIGN', 'PENDING', 'UNPAID', '2022-03-16 09:38:03', '2022-03-16 09:38:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `development_projects`
--

CREATE TABLE `development_projects` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint DEFAULT NULL,
  `project_id` bigint UNSIGNED NOT NULL,
  `category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `platform` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_color` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `development_type` enum('NEW DEVELOPMENT','RE DEVELOPMENT','BUG FIXES') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('PENDING','ASSIGNED','REVISION','COMPLETED') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `payment_status` enum('UNPAID','PAID','PARTIAL','MILESTONE') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'UNPAID',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `development_projects`
--

INSERT INTO `development_projects` (`id`, `order_id`, `user_id`, `project_id`, `category`, `platform`, `theme_color`, `development_type`, `status`, `payment_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dev-Project-5SRSTArH-14012022', 1000, 6, 'Web App', 'PHP Laravel', 'Red And Black', 'NEW DEVELOPMENT', 'PENDING', 'UNPAID', '2022-01-14 07:45:39', '2022-01-14 07:45:39', NULL),
(2, 'Dev-Project-xvWeB83Y-16032022', 1000, 9, 'app', 'node', 'green', 'NEW DEVELOPMENT', 'PENDING', 'UNPAID', '2022-03-16 02:58:00', '2022-03-16 02:58:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, ' Accounting and Advisory', NULL, NULL),
(2, 'Automotive', NULL, NULL),
(3, 'Business and Consulting', NULL, NULL),
(4, 'Charity and Non-Profit', NULL, NULL),
(5, 'Church and Religious', NULL, NULL),
(6, 'Cleaning Services', NULL, NULL),
(7, 'Communication', NULL, NULL),
(8, 'Computer and Networking', NULL, NULL),
(9, 'Construction', NULL, NULL),
(10, 'Jewelery', NULL, NULL),
(11, 'Decoration and Photography', NULL, NULL),
(12, 'Doctors or Physicians', NULL, NULL),
(13, 'Education and Training', NULL, NULL),
(14, 'Engineering Services', NULL, NULL),
(15, 'Entertainment and Media', NULL, NULL),
(16, 'Events', NULL, NULL),
(17, 'Fashion and Apparel', NULL, NULL),
(18, 'Finance', NULL, NULL),
(19, 'Food and Beverages', NULL, NULL),
(20, 'Furniture', NULL, NULL),
(21, 'Games and Toys', NULL, NULL),
(22, 'Government and Military', NULL, NULL),
(23, 'Health and Fitness', NULL, NULL),
(24, 'HealthCare', NULL, NULL),
(25, 'Industrial', NULL, NULL),
(26, 'Information Technology', NULL, NULL),
(27, 'Insurance', NULL, NULL),
(28, 'Landscape', NULL, NULL),
(29, 'Law and Legal', NULL, NULL),
(30, 'Marketing and PR', NULL, NULL),
(31, 'Matrimonial', NULL, NULL),
(32, 'Outdoor', NULL, NULL),
(33, 'Pets and Animals', NULL, NULL),
(34, 'Physical Training', NULL, NULL),
(35, 'Real Estate', NULL, NULL),
(36, 'Recruitment', NULL, NULL),
(37, 'Restaurants and Cafes', NULL, NULL),
(38, 'Retail and Wholesale', NULL, NULL),
(39, 'Security Services', NULL, NULL),
(40, 'Services', NULL, NULL),
(41, 'SkinCare', NULL, NULL),
(42, 'Spa and Salon', NULL, NULL),
(43, 'Sports', NULL, NULL),
(44, 'Technology', NULL, NULL),
(45, 'Tools and Equipment', NULL, NULL),
(46, 'Transportation', NULL, NULL),
(47, 'Publishing', NULL, NULL),
(48, 'Sales economic sector ', NULL, NULL),
(49, 'Services sector ', NULL, NULL),
(50, 'Shipbuilding', NULL, NULL),
(51, 'Ship repairing', NULL, NULL),
(52, 'Smelting', NULL, NULL),
(53, 'Social services economic sector ', NULL, NULL),
(54, 'Software', NULL, NULL),
(55, 'Steel', NULL, NULL),
(56, 'Technology', NULL, NULL),
(57, 'Telecommunications', NULL, NULL),
(58, 'The wine', NULL, NULL),
(59, 'Tourism', NULL, NULL),
(60, 'Transportation', NULL, NULL),
(61, 'Wireless telecommunications industry', NULL, NULL),
(62, 'other', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lead_forms`
--

CREATE TABLE `lead_forms` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigner_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feedback_option` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feedback_message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `interested_in` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `budget` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `package_price` double DEFAULT NULL,
  `business_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `design_perception` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `additional_comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
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
(0, '2022_01_07_140502_create_currencies_table', 2),
(0, '2022_01_12_070650_create_industries_table', 3),
(0, '2014_10_12_000000_create_attendance_table', 4),
(0, '2022_01_13_100124_create_academic_levels_table', 5),
(0, '2022_01_13_100228_create_number_of_words_table', 6),
(0, '2022_01_13_100254_create_refrence_styles_table', 7),
(0, '2022_01_13_100434_create_content_project_types_table', 8),
(0, '2022_01_13_100254_create_reference_styles_table', 9),
(0, '2022_01_14_100806_create_content_projects_table', 10),
(0, '2022_01_14_101349_create_content_projects_table', 11),
(0, '2022_03_12_112728_create_source_accounts_table', 12),
(0, '2022_03_14_072719_create_brand_source_accounts', 13),
(0, '2022_03_26_093230_create_test_node_app_contact', 14);

-- --------------------------------------------------------

--
-- Table structure for table `my_sticky_notes`
--

CREATE TABLE `my_sticky_notes` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `my_sticky_notes`
--

INSERT INTO `my_sticky_notes` (`id`, `user_id`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'ssd fdskfsd', '2022-09-26 02:19:39', '2022-09-26 02:19:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int UNSIGNED NOT NULL,
  `sender` int NOT NULL DEFAULT '0',
  `receiver` int NOT NULL DEFAULT '0',
  `msg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` int NOT NULL DEFAULT '0',
  `is_active` tinyint NOT NULL DEFAULT '1',
  `is_deleted` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `sender`, `receiver`, `msg`, `data`, `project_id`, `is_read`, `is_active`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1000, 1013, 'test 1', 'Comment on Task ID:Task-FD8FZd-17012022', 'Design-Project-LRnXqryn-12012022', 1, 1, 0, '2022-01-17 03:37:01', '2022-01-17 03:39:48', NULL),
(2, 1000, 1013, 'aa', 'Comment on Task ID:Task-FD8FZd-17012022', 'Design-Project-LRnXqryn-12012022', 1, 1, 0, '2022-01-17 03:37:17', '2022-01-17 03:39:48', NULL),
(3, 1000, 1013, 'test 2', 'Comment on Task ID:Task-FD8FZd-17012022', 'Design-Project-LRnXqryn-12012022', 1, 1, 0, '2022-01-17 03:38:17', '2022-01-17 03:39:48', NULL),
(4, 1000, 1013, 'test 3', 'Comment on Task ID:Task-FD8FZd-17012022', 'Design-Project-LRnXqryn-12012022', 1, 1, 0, '2022-01-17 03:41:06', '2022-01-17 03:41:22', NULL),
(5, 1013, 1000, 'yes', 'Comment on Task ID:Task-FD8FZd-17012022', 'Design-Project-LRnXqryn-12012022', 1, 1, 0, '2022-01-17 03:41:51', '2022-01-17 03:42:39', NULL),
(6, 1013, 1000, 'yes', 'Comment on Task ID:Task-FD8FZd-17012022', 'Design-Project-LRnXqryn-12012022', 1, 1, 0, '2022-01-17 03:42:19', '2022-01-17 03:42:39', NULL),
(7, 1013, 1000, 'adas', 'Comment on Task ID:Task-FD8FZd-17012022', 'Design-Project-LRnXqryn-12012022', 1, 1, 0, '2022-01-17 03:42:21', '2022-01-17 03:42:39', NULL),
(8, 1000, 1013, 'test adminnn', 'Comment on Task ID:Task-FD8FZd-17012022', 'Design-Project-LRnXqryn-12012022', 0, 1, 0, '2022-01-20 03:46:37', '2022-01-20 03:46:37', NULL),
(9, 1011, 1013, 'asdasd', 'Comment on Task ID:Task-FD8FZd-17012022', 'Design-Project-LRnXqryn-12012022', 0, 1, 0, '2022-01-20 03:48:00', '2022-01-20 03:48:00', NULL),
(10, 1000, 1013, 'addasd', 'Comment on Task ID:Task-FD8FZd-17012022', 'Design-Project-LRnXqryn-12012022', 0, 1, 0, '2022-01-20 03:49:04', '2022-01-20 03:49:04', NULL),
(11, 1000, 1013, 'test 1`3', 'Comment on Task ID:Task-FD8FZd-17012022', 'Design-Project-LRnXqryn-12012022', 0, 1, 0, '2022-01-20 03:50:49', '2022-01-20 03:50:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `number_of_words`
--

CREATE TABLE `number_of_words` (
  `id` bigint UNSIGNED NOT NULL,
  `words` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `number_of_words`
--

INSERT INTO `number_of_words` (`id`, `words`, `created_at`, `updated_at`) VALUES
(1, '250 1 Page', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(2, '500 2 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(3, '750 3 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(4, '1000 4 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(5, '1250 5 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(6, '1500 6 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(7, '1750 7 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(8, '2000 8 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(9, '2250 9 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(10, '2500 10 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(11, '2750 11 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(12, '3000 12 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(13, '3250 13 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(14, '3500 14 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(15, '3750 15 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(16, '4000 16 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(17, '4250 17 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(18, '4500 18 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(19, '4750 19 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(20, '5000 20 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(21, '5250 21 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(22, '5500 22 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(23, '5750 23 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(24, '6000 24 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(25, '6250 25 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(26, '6500 26 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(27, '6750 27 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(28, '7000 28 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(29, '7250 29 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(30, '7500 30 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(31, '7750 31 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(32, '8000 32 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(33, '8250 33 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(34, '8500 34 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(35, '8750 35 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(36, '9000 36 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(37, '9250 37 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(38, '9500 38 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(39, '9750 39 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(40, '10000 40 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(41, '10250 41 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(42, '10500 42 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(43, '10750 43 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(44, '11000 44 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(45, '11250 45 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(46, '11500 46 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(47, '11750 47 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(48, '12000 48 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(49, '12250 49 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(50, '12500 50 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(51, '12750 51 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(52, '13000 52 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(53, '13250 53 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(54, '13500 54 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(55, '13750 55 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(56, '14000 56 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(57, '14250 57 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(58, '14500 58 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(59, '14750 59 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(60, '15000 60 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(61, '15250 61 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(62, '15500 62 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(63, '15750 63 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(64, '16000 64 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(65, '16250 65 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(66, '16500 66 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(67, '16750 67 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(68, '17000 68 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(69, '17250 69 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(70, '17500 70 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(71, '17750 71 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(72, '18000 72 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(73, '18250 73 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(74, '18500 74 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(75, '18750 75 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(76, '19000 76 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(77, '19250 77 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(78, '19500 78 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(79, '19750 79 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(80, '20000 80 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(81, '20250 81 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(82, '20500 82 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(83, '20750 83 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(84, '21000 84 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(85, '21250 85 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(86, '21500 86 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(87, '21750 87 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(88, '22000 88 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(89, '22250 89 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(90, '22500 90 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(91, '22750 91 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(92, '23000 92 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(93, '23250 93 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(94, '23500 94 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(95, '23750 95 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(96, '24000 96 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(97, '24250 97 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(98, '24500 98 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(99, '24750 99 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(100, '25000 100 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(101, '25250 101 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(102, '25500 102 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(103, '25750 103 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(104, '26000 104 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(105, '26250 105 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(106, '26500 106 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(107, '26750 107 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(108, '27000 108 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(109, '27250 109 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(110, '27500 110 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(111, '27750 111 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(112, '28000 112 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(113, '28250 113 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(114, '28500 114 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(115, '28750 115 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(116, '29000 116 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(117, '29250 117 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(118, '29500 118 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(119, '29750 119 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(120, '30000 120 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(121, '30250 121 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(122, '30500 122 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(123, '30750 123 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(124, '31000 124 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(125, '31250 125 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(126, '31500 126 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(127, '31750 127 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(128, '32000 128 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(129, '32250 129 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(130, '32500 130 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(131, '32750 131 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(132, '33000 132 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(133, '33250 133 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(134, '33500 134 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(135, '33750 135 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(136, '34000 136 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(137, '34250 137 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(138, '34500 138 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(139, '34750 139 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(140, '35000 140 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(141, '35250 141 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(142, '35500 142 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(143, '35750 143 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(144, '36000 144 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(145, '36250 145 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(146, '36500 146 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(147, '36750 147 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(148, '37000 148 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(149, '37250 149 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(150, '37500 150 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(151, '37750 151 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(152, '38000 152 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(153, '38250 153 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(154, '38500 154 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(155, '38750 155 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(156, '39000 156 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(157, '39250 157 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(158, '39500 158 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(159, '39750 159 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(160, '40000 160 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(161, '40250 161 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(162, '40500 162 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(163, '40750 163 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(164, '41000 164 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(165, '41250 165 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(166, '41500 166 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(167, '41750 167 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(168, '42000 168 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(169, '42250 169 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(170, '42500 170 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(171, '42750 171 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(172, '43000 172 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(173, '43250 173 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(174, '43500 174 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(175, '43750 175 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(176, '44000 176 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(177, '44250 177 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(178, '44500 178 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(179, '44750 179 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(180, '45000 180 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(181, '45250 181 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(182, '45500 182 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(183, '45750 183 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(184, '46000 184 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(185, '46250 185 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(186, '46500 186 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(187, '46750 187 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(188, '47000 188 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(189, '47250 189 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(190, '47500 190 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(191, '47750 191 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(192, '48000 192 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(193, '48250 193 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(194, '48500 194 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(195, '48750 195 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(196, '49000 196 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(197, '49250 197 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(198, '49500 198 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(199, '49750 199 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(200, '50000 200 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(201, '50250 201 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(202, '50500 202 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(203, '50750 203 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(204, '51000 204 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(205, '51250 205 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(206, '51500 206 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(207, '51750 207 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(208, '52000 208 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(209, '52250 209 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(210, '52500 210 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(211, '52750 211 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(212, '53000 212 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(213, '53250 213 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(214, '53500 214 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(215, '53750 215 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(216, '54000 216 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(217, '54250 217 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(218, '54500 218 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(219, '54750 219 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(220, '55000 220 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(221, '55250 221 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(222, '55500 222 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(223, '55750 223 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(224, '56000 224 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(225, '56250 225 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(226, '56500 226 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(227, '56750 227 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(228, '57000 228 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(229, '57250 229 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(230, '57500 230 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(231, '57750 231 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(232, '58000 232 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(233, '58250 233 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(234, '58500 234 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(235, '58750 235 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(236, '59000 236 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(237, '59250 237 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(238, '59500 238 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(239, '59750 239 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(240, '60000 240 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(241, '60250 241 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(242, '60500 242 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(243, '60750 243 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(244, '61000 244 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(245, '61250 245 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(246, '61500 246 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(247, '61750 247 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(248, '62000 248 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(249, '62250 249 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(250, '62500 250 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(251, '62750 251 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(252, '63000 252 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(253, '63250 253 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(254, '63500 254 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(255, '63750 255 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(256, '64000 256 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(257, '64250 257 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(258, '64500 258 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(259, '64750 259 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(260, '65000 260 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(261, '65250 261 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(262, '65500 262 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(263, '65750 263 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(264, '66000 264 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(265, '66250 265 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(266, '66500 266 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(267, '66750 267 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(268, '67000 268 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(269, '67250 269 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(270, '67500 270 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(271, '67750 271 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(272, '68000 272 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(273, '68250 273 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(274, '68500 274 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(275, '68750 275 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(276, '69000 276 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(277, '69250 277 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(278, '69500 278 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(279, '69750 279 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(280, '70000 280 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(281, '70250 281 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(282, '70500 282 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(283, '70750 283 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(284, '71000 284 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(285, '71250 285 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(286, '71500 286 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(287, '71750 287 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(288, '72000 288 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(289, '72250 289 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(290, '72500 290 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(291, '72750 291 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(292, '73000 292 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(293, '73250 293 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(294, '73500 294 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(295, '73750 295 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(296, '74000 296 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(297, '74250 297 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(298, '74500 298 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(299, '74750 299 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(300, '75000 300 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(301, '75250 301 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(302, '75500 302 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(303, '75750 303 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(304, '76000 304 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(305, '76250 305 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(306, '76500 306 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(307, '76750 307 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(308, '77000 308 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(309, '77250 309 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(310, '77500 310 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(311, '77750 311 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(312, '78000 312 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(313, '78250 313 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(314, '78500 314 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(315, '78750 315 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(316, '79000 316 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(317, '79250 317 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(318, '79500 318 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(319, '79750 319 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(320, '80000 320 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(321, '80250 321 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(322, '80500 322 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(323, '80750 323 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(324, '81000 324 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(325, '81250 325 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(326, '81500 326 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(327, '81750 327 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(328, '82000 328 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(329, '82250 329 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(330, '82500 330 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(331, '82750 331 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(332, '83000 332 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(333, '83250 333 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(334, '83500 334 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(335, '83750 335 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(336, '84000 336 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(337, '84250 337 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(338, '84500 338 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(339, '84750 339 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(340, '85000 340 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(341, '85250 341 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(342, '85500 342 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(343, '85750 343 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(344, '86000 344 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(345, '86250 345 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(346, '86500 346 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(347, '86750 347 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(348, '87000 348 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(349, '87250 349 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(350, '87500 350 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(351, '87750 351 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(352, '88000 352 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(353, '88250 353 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(354, '88500 354 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(355, '88750 355 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(356, '89000 356 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(357, '89250 357 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(358, '89500 358 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(359, '89750 359 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(360, '90000 360 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(361, '90250 361 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(362, '90500 362 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(363, '90750 363 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(364, '91000 364 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(365, '91250 365 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(366, '91500 366 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(367, '91750 367 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(368, '92000 368 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(369, '92250 369 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(370, '92500 370 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(371, '92750 371 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(372, '93000 372 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(373, '93250 373 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(374, '93500 374 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(375, '93750 375 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(376, '94000 376 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(377, '94250 377 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(378, '94500 378 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(379, '94750 379 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(380, '95000 380 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(381, '95250 381 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(382, '95500 382 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(383, '95750 383 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(384, '96000 384 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(385, '96250 385 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(386, '96500 386 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(387, '96750 387 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(388, '97000 388 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(389, '97250 389 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(390, '97500 390 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(391, '97750 391 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(392, '98000 392 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(393, '98250 393 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(394, '98500 394 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(395, '98750 395 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(396, '99000 396 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(397, '99250 397 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(398, '99500 398 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(399, '99750 399 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(400, '100000 400 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(401, '100250 401 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(402, '100500 402 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(403, '100750 403 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(404, '101000 404 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(405, '101250 405 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(406, '101500 406 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(407, '101750 407 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(408, '102000 408 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(409, '102250 409 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(410, '102500 410 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(411, '102750 411 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(412, '103000 412 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(413, '103250 413 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(414, '103500 414 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(415, '103750 415 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(416, '104000 416 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(417, '104250 417 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(418, '104500 418 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(419, '104750 419 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(420, '105000 420 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(421, '105250 421 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(422, '105500 422 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(423, '105750 423 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(424, '106000 424 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(425, '106250 425 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(426, '106500 426 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(427, '106750 427 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(428, '107000 428 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(429, '107250 429 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(430, '107500 430 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(431, '107750 431 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(432, '108000 432 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(433, '108250 433 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(434, '108500 434 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(435, '108750 435 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(436, '109000 436 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(437, '109250 437 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(438, '109500 438 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(439, '109750 439 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(440, '110000 440 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(441, '110250 441 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(442, '110500 442 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(443, '110750 443 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(444, '111000 444 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(445, '111250 445 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(446, '111500 446 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(447, '111750 447 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(448, '112000 448 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(449, '112250 449 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(450, '112500 450 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(451, '112750 451 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(452, '113000 452 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(453, '113250 453 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(454, '113500 454 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(455, '113750 455 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(456, '114000 456 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(457, '114250 457 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(458, '114500 458 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(459, '114750 459 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(460, '115000 460 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(461, '115250 461 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(462, '115500 462 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(463, '115750 463 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(464, '116000 464 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(465, '116250 465 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(466, '116500 466 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(467, '116750 467 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(468, '117000 468 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(469, '117250 469 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(470, '117500 470 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(471, '117750 471 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(472, '118000 472 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(473, '118250 473 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(474, '118500 474 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(475, '118750 475 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(476, '119000 476 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(477, '119250 477 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(478, '119500 478 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(479, '119750 479 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(480, '120000 480 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(481, '120250 481 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(482, '120500 482 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(483, '120750 483 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(484, '121000 484 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(485, '121250 485 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(486, '121500 486 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(487, '121750 487 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(488, '122000 488 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(489, '122250 489 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(490, '122500 490 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(491, '122750 491 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(492, '123000 492 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(493, '123250 493 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(494, '123500 494 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(495, '123750 495 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(496, '124000 496 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(497, '124250 497 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(498, '124500 498 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(499, '124750 499 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41'),
(500, '125000 500 Pages', '2021-03-05 00:30:41', '2021-03-05 00:30:41');

-- --------------------------------------------------------

--
-- Table structure for table `other_projects`
--

CREATE TABLE `other_projects` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `project_id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `industry_id` bigint UNSIGNED NOT NULL,
  `status` enum('PENDING','ASSIGNED','REVISION','COMPLETED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `payment_status` enum('UNPAID','PAID','PARTIAL','MILESTONE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'UNPAID',
  `deleted_reason` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_projects`
--

INSERT INTO `other_projects` (`id`, `order_id`, `user_id`, `project_id`, `customer_id`, `industry_id`, `status`, `payment_status`, `deleted_reason`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Other-Project-sKOd1ngL-12012022', 1000, 3, 0, 35, 'PENDING', 'UNPAID', NULL, '2022-01-12 10:26:10', '2022-01-12 10:26:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int NOT NULL,
  `user_id` int DEFAULT '0',
  `is_read` char(1) NOT NULL DEFAULT '0',
  `type` int NOT NULL DEFAULT '1',
  `is_active` int NOT NULL DEFAULT '1',
  `is_deleted` int DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_featured` int NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `price` double NOT NULL,
  `limitation` int NOT NULL
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
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint DEFAULT NULL,
  `is_deleted` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`, `is_active`, `is_deleted`) VALUES
('nepenax261@cfcjy.com', '$2y$10$jrgQA9O0EPJ/37SNPSUcAuHPLLXjPQr4zabV7FNlWUkhB9HG1gzza', '2021-08-16 08:21:09', NULL, NULL),
('nepenax261@cfcjy.com', '$2y$10$jrgQA9O0EPJ/37SNPSUcAuHPLLXjPQr4zabV7FNlWUkhB9HG1gzza', '2021-08-16 08:21:09', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `ability_id` bigint UNSIGNED NOT NULL,
  `entity_id` bigint UNSIGNED DEFAULT NULL,
  `entity_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forbidden` tinyint(1) NOT NULL DEFAULT '0',
  `scope` int DEFAULT NULL
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
(478, 1, 3, 'roles', 0, NULL),
(479, 4, 3, 'roles', 0, NULL),
(480, 9, 3, 'roles', 0, NULL),
(481, 10, 3, 'roles', 0, NULL),
(482, 12, 3, 'roles', 0, NULL),
(483, 13, 3, 'roles', 0, NULL),
(484, 14, 3, 'roles', 0, NULL),
(485, 4, 4, 'roles', 0, NULL),
(486, 9, 4, 'roles', 0, NULL),
(487, 10, 4, 'roles', 0, NULL),
(488, 12, 4, 'roles', 0, NULL),
(489, 13, 4, 'roles', 0, NULL),
(490, 14, 4, 'roles', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int UNSIGNED NOT NULL,
  `project_id` int DEFAULT NULL,
  `project_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assign_project_to` int DEFAULT NULL,
  `client_id` int NOT NULL,
  `user_id` int NOT NULL,
  `manager_id` int DEFAULT NULL,
  `currency_id` int DEFAULT NULL,
  `brand_id` int DEFAULT NULL,
  `source_account_id` int DEFAULT NULL,
  `project_category` enum('CONTENT','DESIGN','DEVELOPMENT','SEO','OTHER') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_package` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_cost` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_cost` double DEFAULT NULL,
  `remaining_cost` double DEFAULT NULL,
  `project_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_priority` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `url` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'None',
  `progress_bar` int DEFAULT '0',
  `is_active` tinyint NOT NULL DEFAULT '1',
  `is_deleted` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_id`, `project_number`, `assign_project_to`, `client_id`, `user_id`, `manager_id`, `currency_id`, `brand_id`, `source_account_id`, `project_category`, `name`, `project_package`, `client_name`, `client_email`, `client_phone`, `project_cost`, `paid_cost`, `remaining_cost`, `project_type`, `project_priority`, `project_details`, `url`, `deadline`, `status`, `progress_bar`, `is_active`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'Seo-Project-sPN7KACz-11012022', 1030, 26, 1016, 1014, 4, 1, 1, 'SEO', 'SEO Project Test One', '', 'client 2', 'client2@democrm.com', '123214343', '111220', 100000, 11220, 'Hourly', 'Low', 'test', NULL, '2022-01-21', 'None', 0, 1, 0, '2022-01-11 10:44:49', '2022-03-25 05:15:16', NULL),
(2, NULL, 'Design-Project-LRnXqryn-12012022', 1026, 27, 1000, 1014, 3, 2, 14, 'DESIGN', 'Design Project Test One', '', 'client 2', 'client3@democrm.com', '12342134', '5400', 4500, 900, 'Hourly', 'Urgent', 'some text', 'http://demo.google.com', '2022-01-22', 'None', 0, 1, 0, '2022-01-12 06:16:04', '2022-03-25 05:21:21', NULL),
(3, NULL, 'Other-Project-sKOd1ngL-12012022', NULL, 27, 1016, 1014, 5, 2, 14, 'OTHER', 'Other Project Test One', '', 'client 2', 'client3@democrm.com', '12342134', '800', 600, 200, 'Hourly', 'Low', 'some text !!!', NULL, '2022-01-15', 'None', 0, 1, 0, '2022-01-12 10:26:10', '2022-03-25 06:45:40', NULL),
(4, NULL, 'Content-creative-Project-E2PUYWoi-14012022', NULL, 26, 1017, 1014, 4, 2, 14, 'CONTENT', 'Content Creative Project Demo One', '', 'client 2', 'client2@democrm.com', '123214343', '1400', 1200, 200, 'Hourly', 'Low', 'some Details !!  some Details !!  some Details !!  some Details !!', NULL, '2022-01-20', 'None', 0, 1, 0, '2022-01-14 05:50:55', '2022-03-25 06:46:01', NULL),
(5, NULL, 'Content-academic-Project-dPUPAgEl-14012022', NULL, 23, 1016, 1014, 4, 2, 14, 'CONTENT', 'Create Content Academic Project Demo two', '', 'Client 1', 'client1@democrm.com', '0317123457', '1400', 500, 900, 'Hourly', 'Low', 'some Details !!  some Details !!  some Details !!  some Details !!  some Details !!', NULL, '2022-01-26', 'None', 0, 1, 0, '2022-01-14 07:17:24', '2022-03-25 06:45:42', NULL),
(6, NULL, 'Dev-Project-5SRSTArH-14012022', NULL, 23, 1017, 1014, 4, 2, 14, 'DEVELOPMENT', 'Development Project Demo One', 'N;', 'Client 1', 'client1@democrm.com', '0317123457', '500', 250, 250, 'Hourly', 'Low', 'some Details !!  some Details !!  some Details !!  some Details !!  some Details !!  some Details !!  some Details !!  some Details !!  some Details !!', 'http://localhost/', '2022-01-18', 'None', 0, 1, 0, '2022-01-14 07:45:39', '2022-03-25 06:45:57', NULL),
(7, NULL, 'Seo-Project-zSmAPvkp-14012022', NULL, 26, 1016, 1014, 3, 2, 14, 'SEO', 'Seo Project Demo One', '', 'client 2', 'client2@democrm.com', '123214343', '5400', 1100, 4300, 'Hourly', 'Low', 'some Details !! some Details !! some Details !! some Details !!', NULL, '2022-01-19', 'None', 0, 1, 0, '2022-01-14 10:37:29', '2022-03-25 06:45:43', NULL),
(8, NULL, 'Seo-Project-bDoqWLuF-14012022', NULL, 26, 1017, 1014, 3, 2, 14, 'SEO', 'Seo Project Demo One', '', 'client 2', 'client2@democrm.com', '123214343', '5400', 1100, 4300, 'Hourly', 'Low', 'some Details !! some Details !! some Details !! some Details !!', NULL, '2022-01-19', 'None', 0, 1, 0, '2022-01-14 10:37:29', '2022-03-25 06:45:55', NULL),
(9, NULL, 'Dev-Project-xvWeB83Y-16032022', NULL, 34, 1016, 1015, 2, 1, NULL, 'DEVELOPMENT', 'the all new dev', 'N;', 'daveei', 'democlient@crm.com', '012321654', '5000', 0, 0, 'Fix price', 'Low', 'some text', 'google.com', '2022-03-18', 'None', 0, 1, 0, '2022-03-16 02:58:00', '2022-03-25 06:45:46', NULL),
(10, NULL, 'Design-Project-wP686KwO-16032022', NULL, 34, 1017, 1015, 2, 1, 1, 'DESIGN', 'demo Design Project one', '', 'Design-daveei', 'democlient@crm.com', '012321654', '400', 0, 0, 'Fix price', 'Low', 'some textt', 'google.com', '2022-03-18', 'None', 0, 1, 0, '2022-03-16 09:38:03', '2022-03-25 06:45:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_attachment`
--

CREATE TABLE `project_attachment` (
  `id` int UNSIGNED NOT NULL,
  `project_id` int DEFAULT NULL,
  `task_id` int DEFAULT '0',
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `is_final` int NOT NULL DEFAULT '0',
  `status` enum('None','Pending','Approved','Reject') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `is_deleted` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_attachment`
--

INSERT INTO `project_attachment` (`id`, `project_id`, `task_id`, `path`, `is_active`, `is_final`, `status`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, '/uploads/project_attachment/true (1)_1642408539.jpg', 1, 0, 'None', 0, '2022-01-17 03:35:40', '2022-01-17 03:35:40', NULL),
(2, 2, NULL, '/uploads/project_attachment/true (1)_1642408539.jpg', 1, 1, 'Pending', 0, '2022-01-17 03:35:40', '2022-01-19 03:10:52', NULL),
(10, 2, NULL, '/uploads/projectdeliveryfiles/rEfxGOSA6EUdgM5kD8nm7SN9nxFwdA8AWR8P62c0.png', 1, 1, 'Approved', 0, '2022-01-19 07:29:09', '2022-01-19 07:31:02', NULL),
(11, 2, NULL, '/uploads/projectdeliveryfiles/n5TBxBU9sN7j1FaZN78O7f6v2vQG9Ch5qlD2pTdZ.png', 1, 1, 'Pending', 0, '2022-01-19 07:29:09', '2022-04-17 23:40:43', NULL),
(12, 2, 1, '/uploads/project_attachment/true (1)_1642408539_1642601051.jpg', 1, 0, 'None', 0, '2022-01-19 09:04:19', '2022-01-19 09:04:19', NULL),
(13, 2, 1, '/uploads/project_attachment/artist - Copy_79653105_1642601051.png', 1, 0, 'None', 0, '2022-01-19 09:04:19', '2022-01-19 09:04:19', NULL),
(14, 2, 1, '/uploads/project_attachment/user (1) - Copy_1895192159_1642601051.png', 1, 0, 'None', 0, '2022-01-19 09:04:19', '2022-01-19 09:04:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_package`
--

CREATE TABLE `project_package` (
  `id` int UNSIGNED NOT NULL,
  `project_id` int DEFAULT NULL,
  `package_id` int NOT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `is_deleted` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_reviews`
--

CREATE TABLE `project_reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `project_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `emp_id` bigint DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_task`
--

CREATE TABLE `project_task` (
  `id` int UNSIGNED NOT NULL,
  `project_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int NOT NULL,
  `task_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_to` int DEFAULT NULL,
  `dpt_to` int NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `task_priority` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `progress` int DEFAULT '0',
  `progress_by` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `is_deleted` tinyint NOT NULL DEFAULT '0',
  `due_date` datetime DEFAULT NULL,
  `task_updated_at` timestamp NULL DEFAULT NULL,
  `update_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_task`
--

INSERT INTO `project_task` (`id`, `project_id`, `user_id`, `task_number`, `title`, `details`, `tag`, `assigned_to`, `dpt_to`, `status`, `task_priority`, `progress`, `progress_by`, `task_label`, `is_active`, `is_deleted`, `due_date`, `task_updated_at`, `update_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Design-Project-LRnXqryn-12012022', 1000, 'Task-FD8FZd-17012022', 'Demo Task One test', 'Some Text', NULL, NULL, 1013, 'None', 'High', 40, NULL, 'new', 1, 0, '2022-01-19 00:00:00', '2022-01-20 02:23:39', 1000, '2022-01-17 03:35:40', '2022-09-26 02:25:46', NULL),
(2, 'Content-creative-Project-E2PUYWoi-14012022', 1000, 'Task-3L035Z-08032022', 'demo task one', 'some text', NULL, NULL, 1012, 'Completed', 'Medium', 100, NULL, 'revision', 1, 0, '2022-03-10 00:00:00', '2022-03-08 07:50:48', 1000, '2022-03-08 07:38:25', '2022-03-08 07:50:48', NULL),
(3, 'Design-Project-LRnXqryn-12012022', 1000, 'Task-ElIVSu-16032022', 'Demo Task one', 'textt', NULL, NULL, 1012, 'None', 'Low', 0, NULL, 'new', 1, 0, '2022-03-19 00:00:00', NULL, NULL, '2022-03-16 06:08:55', '2022-03-16 06:08:55', NULL),
(4, 'Design-Project-LRnXqryn-12012022', 1026, 'Task-4jkb4d-25032022', 'demo task one', 'some text', NULL, NULL, 1011, 'None', 'Medium', 0, NULL, 'revision', 1, 0, '2022-04-15 00:00:00', NULL, NULL, '2022-03-25 05:39:33', '2022-03-25 05:39:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_task_comment`
--

CREATE TABLE `project_task_comment` (
  `id` int NOT NULL,
  `to_user_id` int NOT NULL,
  `from_user_id` int NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` varchar(255) NOT NULL DEFAULT '0',
  `task_id` varchar(255) NOT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `is_deleted` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_task_comment`
--

INSERT INTO `project_task_comment` (`id`, `to_user_id`, `from_user_id`, `message`, `group_id`, `task_id`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1013, 1000, 'test 1', '0', 'Task-FD8FZd-17012022', 1, 0, '2022-01-17 03:37:01', '2022-01-17 03:37:01'),
(2, 1013, 1000, 'aa', '0', 'Task-FD8FZd-17012022', 1, 0, '2022-01-17 03:37:17', '2022-01-17 03:37:17'),
(3, 1013, 1000, 'test 2', '0', 'Task-FD8FZd-17012022', 1, 0, '2022-01-17 03:38:17', '2022-01-17 03:38:17'),
(4, 1013, 1000, 'test 3', '0', 'Task-FD8FZd-17012022', 1, 0, '2022-01-17 03:41:06', '2022-01-17 03:41:06'),
(5, 1000, 1013, 'yes', '0', 'Task-FD8FZd-17012022', 1, 0, '2022-01-17 03:41:51', '2022-01-17 03:41:51'),
(6, 1000, 1013, 'yes', '0', 'Task-FD8FZd-17012022', 1, 0, '2022-01-17 03:42:19', '2022-01-17 03:42:19'),
(7, 1000, 1013, 'adas', '0', 'Task-FD8FZd-17012022', 1, 0, '2022-01-17 03:42:21', '2022-01-17 03:42:21'),
(8, 1013, 1000, 'test adminnn', '0', 'Task-FD8FZd-17012022', 1, 0, '2022-01-20 03:46:37', '2022-01-20 03:46:37'),
(9, 1013, 1011, 'asdasd', '0', 'Task-FD8FZd-17012022', 1, 0, '2022-01-20 03:48:00', '2022-01-20 03:48:00'),
(10, 1013, 1000, 'addasd', '0', 'Task-FD8FZd-17012022', 1, 0, '2022-01-20 03:49:04', '2022-01-20 03:49:04'),
(11, 1013, 1000, 'test 1`3', '0', 'Task-FD8FZd-17012022', 1, 0, '2022-01-20 03:50:49', '2022-01-20 03:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `project_task_label`
--

CREATE TABLE `project_task_label` (
  `id` int UNSIGNED NOT NULL,
  `project_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int NOT NULL,
  `task_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int NOT NULL DEFAULT '0' COMMENT '1:Assign,2:Tag',
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `is_deleted` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_task_label`
--

INSERT INTO `project_task_label` (`id`, `project_id`, `user_id`, `task_number`, `type`, `title`, `is_active`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Design-Project-LRnXqryn-12012022', 1000, 'Task-FD8FZd-17012022', 1, '1011', 1, 0, '2022-01-17 03:36:31', '2022-01-17 03:36:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_thread`
--

CREATE TABLE `project_thread` (
  `id` int NOT NULL,
  `created_by` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `project_id` varchar(255) NOT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `is_deleted` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_thread`
--

INSERT INTO `project_thread` (`id`, `created_by`, `title`, `project_id`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1000, 'Academic Test One', 'Content-academic-Project-dPUPAgEl-14012022', 1, 0, '2022-01-19 08:14:34', '2022-01-19 08:14:34'),
(2, 1000, 'test', 'Design-Project-wP686KwO-16032022', 1, 0, '2022-09-26 02:24:07', '2022-09-26 02:24:07');

-- --------------------------------------------------------

--
-- Table structure for table `project_thread_comment`
--

CREATE TABLE `project_thread_comment` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `client_id` int NOT NULL,
  `from_user_id` int NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` varchar(255) NOT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `is_deleted` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_transitions`
--

CREATE TABLE `project_transitions` (
  `id` bigint UNSIGNED NOT NULL,
  `emp_id` bigint DEFAULT NULL COMMENT 'Sales & Support EmpId',
  `brand_id` bigint UNSIGNED NOT NULL,
  `project_id` bigint UNSIGNED NOT NULL,
  `package_id` int DEFAULT NULL COMMENT '0 => Complete project',
  `transition_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `parent_id` int DEFAULT NULL,
  `total_cost` double DEFAULT NULL,
  `paid_cost` double DEFAULT NULL,
  `remain_cost` double DEFAULT NULL,
  `response` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_transitions`
--

INSERT INTO `project_transitions` (`id`, `emp_id`, `brand_id`, `project_id`, `package_id`, `transition_id`, `parent_id`, `total_cost`, `paid_cost`, `remain_cost`, `response`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1016, 3, 7, NULL, 'abc1234', NULL, 1200, 200, 1000, NULL, '2021-08-30 04:50:10', '2021-08-30 04:50:10', NULL),
(2, 1016, 3, 7, NULL, 'efj456', NULL, 1000, 500, 500, NULL, '2021-08-30 13:54:18', '2021-08-30 13:54:18', NULL),
(3, 1000, 3, 7, NULL, 'xyz1122', NULL, 500, 200, 300, NULL, '2021-08-30 11:02:04', '2021-08-30 11:02:04', NULL),
(5, 1000, 3, 7, NULL, 'dsadsaq3234', NULL, 300, 200, 100, NULL, '2021-08-30 11:33:51', '2021-08-30 11:33:51', NULL),
(6, 1000, 3, 7, NULL, 'xyz112233', NULL, 100, 50, 50, NULL, '2021-08-30 11:49:33', '2021-08-30 11:49:33', NULL),
(7, 1000, 3, 5, NULL, 'qescr1243', NULL, 200, 100, 100, NULL, '2021-08-30 12:00:56', '2021-08-30 12:00:56', NULL),
(8, 1000, 2, 1, NULL, 'xyz1122', NULL, 1000, 200, 800, NULL, '2021-09-07 10:51:29', '2021-09-07 10:51:29', NULL),
(9, 1000, 2, 9, NULL, '1asfdasas1da6sd4', NULL, 1500, 200, 1300, NULL, '2022-01-10 03:17:55', '2022-01-10 03:17:55', NULL),
(10, 1000, 2, 10, NULL, '1asfdasas1da6sd4', NULL, 1500, 200, 1300, NULL, '2022-01-10 03:18:45', '2022-01-10 03:18:45', NULL),
(11, 1000, 2, 11, NULL, '1asfdasas1da6sd4', NULL, 1500, 200, 1300, NULL, '2022-01-10 03:19:14', '2022-01-10 03:19:14', NULL),
(12, 1000, 2, 12, NULL, '115ada1sdas51f5asf1', NULL, 1400, 500, 900, NULL, '2022-01-10 03:33:43', '2022-01-10 03:33:43', NULL),
(13, 1000, 2, 13, NULL, '115ada1sdas51f5asf1', NULL, 1400, 500, 900, NULL, '2022-01-10 03:36:58', '2022-01-10 03:36:58', NULL),
(14, 1000, 2, 14, NULL, '12asd5612asd45asd464a1s56153', NULL, 700, 500, 200, NULL, '2022-01-11 06:41:59', '2022-01-11 06:41:59', NULL),
(15, 1000, 2, 15, NULL, 'd4as4da84das4d8a4s', NULL, 500, 100, 400, NULL, '2022-01-11 06:48:01', '2022-01-11 06:48:01', NULL),
(16, 1000, 2, 16, NULL, 'd4as4da84das4d8a4s', NULL, 500, 100, 400, NULL, '2022-01-11 06:49:30', '2022-01-11 06:49:30', NULL),
(17, 1000, 2, 17, NULL, 'd4as4da84das4d8a4s', NULL, 500, 100, 400, NULL, '2022-01-11 06:50:14', '2022-01-11 06:50:14', NULL),
(18, 1000, 2, 18, NULL, 'sad4d4asd45asd2asdasdas', NULL, 50000, 1000, 49000, NULL, '2022-01-11 06:53:24', '2022-01-11 06:53:24', NULL),
(19, 1000, 2, 19, NULL, 'sad4d4asd45asd2asdasdas', NULL, 50000, 1000, 49000, NULL, '2022-01-11 06:54:01', '2022-01-11 06:54:01', NULL),
(20, 1000, 2, 20, NULL, 'sdasd45ada45a5d', NULL, 80, 10, 70, NULL, '2022-01-11 08:07:13', '2022-01-11 08:07:13', NULL),
(21, 1000, 1, 1, NULL, '478a9a5sdfd1ff5e4', NULL, 111220, 100000, 11220, NULL, '2022-01-11 10:44:49', '2022-01-11 10:44:49', NULL),
(22, 1000, 2, 2, NULL, '4a78sd4asddada8qwe8d24xc8g68DWD', NULL, 5400, 4500, 900, NULL, '2022-01-12 06:16:04', '2022-01-12 06:16:04', NULL),
(23, 1000, 2, 3, NULL, 'sd1561dasd51qw564qweA5665', NULL, 800, 600, 200, NULL, '2022-01-12 10:26:10', '2022-01-12 10:26:10', NULL),
(24, 1000, 2, 4, NULL, '4sd84eqw1f4vb5g5', NULL, 1400, 1200, 200, NULL, '2022-01-14 05:50:55', '2022-01-14 05:50:55', NULL),
(25, 1000, 2, 5, NULL, '125148asddsas148sasd4', NULL, 1400, 500, 900, NULL, '2022-01-14 07:17:24', '2022-01-14 07:17:24', NULL),
(26, 1000, 2, 6, NULL, '45asd5sd4asd8ads123asd48', NULL, 500, 250, 250, NULL, '2022-01-14 07:45:39', '2022-01-14 07:45:39', NULL),
(27, 1000, 2, 7, NULL, '24asd8sa7das4d12a8789', NULL, 5400, 1100, 4300, NULL, '2022-01-14 10:37:29', '2022-01-14 10:37:29', NULL),
(28, 1000, 2, 8, NULL, '24asd8sa7das4d12a8789', NULL, 5400, 1100, 4300, NULL, '2022-01-14 10:37:29', '2022-01-14 10:37:29', NULL),
(29, 1000, 1, 9, NULL, 'xxxx-xxx-xx', NULL, 5000, 0, 0, NULL, '2022-03-16 02:58:00', '2022-03-16 02:58:00', NULL),
(30, 1000, 1, 10, NULL, 'xxxx-xxx-xx', NULL, 400, 0, 0, NULL, '2022-03-16 09:38:03', '2022-03-16 09:38:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reference_styles`
--

CREATE TABLE `reference_styles` (
  `id` bigint UNSIGNED NOT NULL,
  `style` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reference_styles`
--

INSERT INTO `reference_styles` (`id`, `style`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'APAs', '2021-03-05 00:30:41', '2021-03-16 00:18:27', NULL),
(2, 'APA 6th Edition', '2021-03-05 00:30:48', '2021-03-05 00:30:48', NULL),
(3, 'Harvard', '2021-03-05 00:30:55', '2021-03-05 00:30:55', NULL),
(4, 'MLA', '2021-03-05 00:30:55', '2021-03-05 00:30:55', NULL),
(5, 'Chicago', '2021-03-05 00:30:55', '2021-03-05 00:30:55', NULL),
(6, 'Turabian', '2021-03-05 00:30:55', '2021-03-05 00:30:55', NULL),
(7, 'Oxford', '2021-03-05 00:30:55', '2021-03-05 00:30:55', NULL),
(8, 'Oscolo', '2021-03-05 00:30:55', '2021-03-05 00:30:55', NULL),
(9, 'Vancouver', '2021-03-05 00:30:55', '2021-03-05 00:30:55', NULL),
(10, 'Other', '2021-03-05 00:30:55', '2021-03-05 00:30:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int UNSIGNED DEFAULT NULL,
  `scope` int DEFAULT NULL,
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
-- Table structure for table `seo_projects`
--

CREATE TABLE `seo_projects` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint DEFAULT NULL,
  `project_id` bigint UNSIGNED NOT NULL,
  `region_id` bigint UNSIGNED NOT NULL,
  `website` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `competitor_website` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products_services_count` int DEFAULT NULL,
  `keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('PENDING','ASSIGNED','REVISION','COMPLETED') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `payment_status` enum('UNPAID','PAID','PARTIAL','MILESTONE') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'UNPAID',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seo_projects`
--

INSERT INTO `seo_projects` (`id`, `order_id`, `user_id`, `project_id`, `region_id`, `website`, `competitor_website`, `products_services_count`, `keywords`, `status`, `payment_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Seo-Project-9ri1ZGHX-11012022', 1000, 14, 4, 'http://localhost:8000', 'http://localhost:8000', NULL, 'abcd , efgh , xyzz', 'PENDING', 'UNPAID', '2022-01-11 06:41:59', '2022-01-11 06:41:59', NULL),
(2, 'Seo-Project-69HkfA4e-11012022', 1000, 15, 6, 'http://localhost:8000/', 'http://localhost:8000/', NULL, 'af,asdf,asdf,asd,fasf', 'PENDING', 'UNPAID', '2022-01-11 06:48:01', '2022-01-11 06:48:01', NULL),
(3, 'Seo-Project-tspRQQFC-11012022', 1000, 16, 6, 'http://localhost:8000/', 'http://localhost:8000/', NULL, 'af,asdf,asdf,asd,fasf', 'PENDING', 'UNPAID', '2022-01-11 06:49:30', '2022-01-11 06:49:30', NULL),
(4, 'Seo-Project-Nw153Bm1-11012022', 1000, 17, 6, 'http://localhost:8000/', 'http://localhost:8000/', NULL, 'af,asdf,asdf,asd,fasf', 'PENDING', 'UNPAID', '2022-01-11 06:50:14', '2022-01-11 06:50:14', NULL),
(5, 'Seo-Project-Pqbot8um-11012022', 1000, 18, 2, 'http://localhost:8000/', 'http://localhost:8000/', NULL, 'asd,fqweqwe , ,q eqwe, qweqwe, qwe,', 'PENDING', 'UNPAID', '2022-01-11 06:53:24', '2022-01-11 06:53:24', NULL),
(6, 'Seo-Project-1pwTKJXa-11012022', 1000, 19, 2, 'http://localhost:8000/', 'http://localhost:8000/', NULL, 'asd,fqweqwe , ,q eqwe, qweqwe, qwe,', 'PENDING', 'UNPAID', '2022-01-11 06:54:01', '2022-01-11 06:54:01', NULL),
(7, 'Seo-Project-da0rFYEa-11012022', 1000, 20, 1, 'http://localhost:8000/', 'http://localhost:8000/', 2, 'fas,adf,af,as,ff', 'PENDING', 'UNPAID', '2022-01-11 08:07:13', '2022-01-11 08:07:13', NULL),
(8, 'Seo-Project-sPN7KACz-11012022', 1000, 1, 8, 'http://test.com/', 'http://test.com/', 12, 'Word 1 , Word 2', 'PENDING', 'UNPAID', '2022-01-11 10:44:49', '2022-01-11 10:44:49', NULL),
(9, 'Seo-Project-zSmAPvkp-14012022', 1000, 7, 12, 'http://localhost/', 'http://localhost/', 0, 'Key Word 1 , Key Word 2', 'PENDING', 'UNPAID', '2022-01-14 10:37:29', '2022-01-14 10:37:29', NULL),
(10, 'Seo-Project-bDoqWLuF-14012022', 1000, 8, 12, 'http://localhost/', 'http://localhost/', 0, 'Key Word 1 , Key Word 2', 'PENDING', 'UNPAID', '2022-01-14 10:37:29', '2022-01-14 10:37:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `ip_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int NOT NULL,
  `slot` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `is_deleted` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `source_accounts`
--

CREATE TABLE `source_accounts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `source_accounts`
--

INSERT INTO `source_accounts` (`id`, `name`, `email`, `create_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Arwa', 'arwa@test.com', 1, NULL, '2022-03-12 14:24:14', '2022-03-12 14:24:14'),
(2, 'salman', 'salman@test.com', 1, NULL, '2022-03-12 14:24:14', '2022-03-12 14:24:14'),
(3, 'test1acc updated', 'test1@test.com', 1, NULL, '2022-03-14 01:48:02', '2022-03-14 01:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `tasks_comments`
--

CREATE TABLE `tasks_comments` (
  `id` bigint UNSIGNED NOT NULL,
  `emp_id` bigint UNSIGNED NOT NULL,
  `task_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks_comments`
--

INSERT INTO `tasks_comments` (`id`, `emp_id`, `task_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 1000, 'Task-FD8FZd-17012022', 'adsf', '2022-01-18 05:31:52', '2022-01-18 05:31:52'),
(2, 1000, 'Task-FD8FZd-17012022', '545', '2022-01-19 03:15:48', '2022-01-19 03:15:48'),
(3, 1000, 'Task-FD8FZd-17012022', '486', '2022-01-19 03:15:48', '2022-01-19 03:15:48'),
(4, 1000, 'Task-FD8FZd-17012022', '84', '2022-01-19 03:15:49', '2022-01-19 03:15:49'),
(5, 1000, 'Task-FD8FZd-17012022', '474+', '2022-01-19 03:15:50', '2022-01-19 03:15:50'),
(6, 1026, 'Task-4jkb4d-25032022', 'test 1', '2022-03-25 05:49:10', '2022-03-25 05:49:10'),
(7, 1000, 'Task-FD8FZd-17012022', '5454', '2022-09-26 02:25:57', '2022-09-26 02:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `test_node_app_contacts`
--

CREATE TABLE `test_node_app_contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_node_app_contacts`
--

INSERT INTO `test_node_app_contacts` (`id`, `user_id`, `name`, `desc`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', 'jone', 'Hi, I am New Here!', '1', '2022-03-26 09:37:49', '2022-03-26 09:37:49'),
(2, '3', 'smith', 'Hi, I am New Here!', '1', '2022-03-26 09:37:49', '2022-03-26 09:37:49'),
(3, '3', 'kelvin', 'Hi, How are you!', '1', '2022-03-26 09:37:49', '2022-03-26 09:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `type` int NOT NULL DEFAULT '2' COMMENT '1=>Client;2=>Employee',
  `project_id` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume_doc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnic_doc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education_doc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residential_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int NOT NULL DEFAULT '0',
  `department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `reporting_line` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_model_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_model_year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_number_plate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` double DEFAULT '0',
  `shift_day` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shift_in` time DEFAULT '00:00:00',
  `shift_out` time DEFAULT '00:00:00',
  `policy` int DEFAULT NULL,
  `company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `city` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `postcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `is_deleted` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_code` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `project_id`, `name`, `username`, `email`, `email_verified_at`, `password`, `profile_pic`, `resume_doc`, `cnic_doc`, `education_doc`, `personal_email`, `phonenumber`, `emergency_number`, `cnic`, `residential_address`, `blood_group`, `dob`, `gender`, `marital_status`, `emp_id`, `designation`, `role_id`, `department`, `join_date`, `reporting_line`, `v_model_name`, `v_model_year`, `v_number_plate`, `bank_account_number`, `salary`, `shift_day`, `shift_in`, `shift_out`, `policy`, `company`, `bio`, `city`, `postcode`, `country`, `is_active`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`, `remember_token`, `two_factor_code`, `two_factor_expires_at`) VALUES
(1, 2, 29, 'Administrator', 'admin', 'admin@project.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/2729f28f53a19632aef1c99610357c1a/y8GwZS5EoCcTVFXck0p5H4sn4nIyfAq615pi8xK8.png', 'uploads/resume/2339f4445ad239e370e032dbee4d5819/4e9psgcsxImYuXFTRJMdpu9RS7RgL6twLhX6QfCT.png', 'uploads/cnic/b591d9b80583399ce26d62ab98bf47ec/it4PcMBwokHHu43ruRYeNi1benQEdfCCEolbOcLr.png', NULL, 'admin@democrm.com', '0300-00000000', '0300-00000000', '00000-0000000-0', 'None', NULL, '1992-06-14', 'male', 'single', '1000', '14', 1, NULL, '2021-05-01', NULL, 'Vitz', '2021', '12345', 'None', 10000, 'Day', '00:00:00', '00:00:00', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-11 04:44:21', '2022-01-04 03:32:23', NULL, NULL, NULL, NULL),
(2, 2, 29, 'Developer 1', 'devop1', 'sanoxad533@ppp998.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, 'developer1@democrm.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1010', '0', 0, '4', '2021-03-01', 'team.lead1@democrm.com', NULL, NULL, NULL, NULL, 0, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 08:19:05', '2021-09-22 01:16:44', NULL, NULL, NULL, NULL),
(3, 2, 29, 'Developer 2', 'develp2', 'developer2@democrm.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, 'developer2@democrm.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1011', '0', 0, '4', '2021-03-01', 'team.lead2@democrm.com', NULL, NULL, NULL, NULL, 1000, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 08:19:05', '2022-01-17 03:36:17', NULL, NULL, NULL, NULL),
(4, 2, 29, 'Team Lead 1', 'team.lead1', 'team.lead1@democrm.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/3f44cd07a477f04ce952c2074e3e52be/RwStmtLLQf4bcVoAShKTx1WEmymZ6gOTvMbD37kJ.png', NULL, NULL, NULL, 'team.lead1@democrm.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1012', '0', 0, '4', '2021-03-01', 'production.manager1@democrm.com', NULL, NULL, NULL, NULL, 0, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 08:19:05', '2021-09-20 03:44:28', NULL, NULL, NULL, NULL),
(5, 2, 29, 'Team Lead 2', 'team.lead2', 'team.lead2@democrm.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, 'team.lead2@democrm.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1013', '0', 0, '4', '2021-03-01', 'production.manager1@democrm.com', NULL, NULL, NULL, NULL, 0, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 08:19:05', '2021-09-09 01:13:38', NULL, NULL, NULL, NULL),
(6, 2, 29, 'Production Manager 1', 'production.manager1', 'production.manager1@democrm.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/b36b26b95bd2cd8e01eef2c751d67c1c/6Y1KmKLYJHLjDbvErROdJ0ygrZgKj3390FNri7hv.jpg', NULL, NULL, NULL, 'production.manager1@democrm.com', '0345-1234567', '0312-1234567', '42101-1234567-2', 'Pakistan Karachi', NULL, '1997-05-06', 'male', 'single', '1014', '0', 0, '4', '2021-03-01', 'hod.production1@democrm.com', NULL, NULL, NULL, NULL, 0, 'Night', '21:00:00', '06:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 09:44:31', '2021-09-17 01:45:44', NULL, NULL, NULL, NULL),
(7, 2, 29, 'HOD Production 1', 'hod.production1', 'hod.production1@democrm.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, 'hod.production1@democrm.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1015', '0', 0, '4', '2021-03-01', 'hod.production1@democrm.com', NULL, NULL, NULL, NULL, 50000, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 08:19:05', '2021-08-18 04:52:57', NULL, NULL, NULL, NULL),
(14, 2, 29, 'Sales Agent 1', 'sales.agent1', 'sales.agent1@democrm.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/ce2758cb2226d041087b8fafa204ab19/svdWhO6C5sw46VlCMe5aRL7dja8OAbyvJ2KkJnEW.png', NULL, NULL, NULL, 'sales.agent1@democrm.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1016', '0', 0, '2', '2021-03-01', 'sales.manager1@democrm.com', NULL, NULL, NULL, NULL, 0, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 13:19:05', '2022-03-25 01:47:37', NULL, NULL, NULL, NULL),
(15, 2, 29, 'Sales Agent 2', 'sales.agent2', 'sales.agent2@democrm.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, 'sales.agent2@democrm.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1017', '0', 0, '2', '2021-03-01', 'sales.manager1@democrm.com', NULL, NULL, NULL, NULL, 0, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 13:19:05', '2021-08-12 01:21:57', NULL, NULL, NULL, NULL),
(16, 2, 29, 'Sales Manager 1', 'sales.manager1', 'sales.manager1@democrm.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, 'sales.manager1@democrm.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1018', '0', 0, '2', '2021-03-01', 'brand.manager1@democrm.com', NULL, NULL, NULL, NULL, 40000, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 13:19:05', '2021-08-12 00:43:08', NULL, NULL, NULL, NULL),
(17, 2, 29, 'Brand Manager 1', 'brand.manager1', 'brand.manager1@democrm.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/1d851fcf6159ba107e48dcbbe035f8a3/ROph3uHoGhyRYnLGVjnXgiU4pJTGraZeNZ1LmQ4y.png', NULL, NULL, NULL, 'brand.manager1@democrm.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1019', '0', 0, '5', '2021-03-01', 'salesnsupport.manager1@democrm.com', NULL, NULL, NULL, NULL, 0, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 13:19:05', '2022-03-12 06:08:33', NULL, NULL, NULL, NULL),
(18, 2, 29, 'Sales & Support Manager 1', 'salesnsupport.manager1', 'salesnsupport.manager1@democrm.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, 'salesnsupport.manager1@democrm.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1020', '0', 0, '7', '2021-03-01', 'hod.salesnsupport1@democrm.com', NULL, NULL, NULL, NULL, 25000, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 13:19:05', '2021-08-12 00:40:49', NULL, NULL, NULL, NULL),
(19, 2, 29, 'HOD Sales & Support 1', 'hod.salesnsupport1', 'hod.salesnsupport1@democrm.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, 'hod.salesnsupport1@democrm.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1021', '0', 0, '6', '2021-03-01', 'hod.salesnsupport1@democrm.com', NULL, NULL, NULL, NULL, 0, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 13:19:05', '2021-08-12 00:37:16', NULL, NULL, NULL, NULL),
(20, 2, 29, 'Support Agent 1', 'support.agent1', 'support.agent1@democrm.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, 'support.agent1@democrm.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1022', '0', 0, '3', '2021-03-01', 'support.manager1@democrm.com', NULL, NULL, NULL, NULL, 0, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 13:19:05', '2021-08-12 01:28:38', NULL, NULL, NULL, NULL),
(21, 2, 29, 'Support Agent 2', 'support.agent2', 'support.agent2@democrm.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, 'support.agent2@democrm.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1023', '0', 0, '3', '2021-03-01', 'support.manager1@democrm.com', NULL, NULL, NULL, NULL, 0, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 13:19:05', '2021-08-12 01:28:47', NULL, NULL, NULL, NULL),
(22, 2, 29, 'Support Manager 1', 'support.manager1', 'support.manager1@democrm.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, 'support.manager1@democrm.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1024', '0', 0, '3', '2021-03-01', 'brand.manager1@democrm.com', NULL, NULL, NULL, NULL, 60000, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 13:19:05', '2021-08-12 01:24:21', NULL, NULL, NULL, NULL),
(23, 1, 1, 'Client 1', NULL, 'client1@democrm.com', NULL, '$2y$10$vxpBOmFKY4T8qwKtlYu1LOyrzxxh3FVbh6dN7wGMxKBwT07H2UslS', NULL, NULL, NULL, NULL, NULL, '0317123457', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-08-11 06:09:23', '2021-08-25 02:47:21', NULL, NULL, NULL, NULL),
(25, 2, 29, 'Brand Manager 2', 'brand.manager2', 'brand.manager2@democrm.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, 'brand.manager2@democrm.com', '0349-1234567', '0349-1234567', '42101-1234567-1', 'Pakistan Karachi', NULL, '2000-05-16', 'male', 'single', '1025', '0', 0, '5', '2021-03-01', 'salesnsupport.manager1@democrm.com', NULL, NULL, NULL, NULL, 0, 'Night', '21:00:00', '09:00:00', 2, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 08:19:05', '2021-08-11 18:55:11', NULL, NULL, NULL, NULL),
(26, 1, NULL, 'client 2', NULL, 'client2@democrm.com', NULL, '$2y$10$j/8K2Rkt7ANN./YbcCu6xO2Lx5SQIu3KN5RWPFYmaNYu7yuQwYmse', NULL, NULL, NULL, NULL, NULL, '123214343', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-08-16 02:01:56', '2021-08-19 03:12:58', NULL, NULL, NULL, NULL),
(27, 1, NULL, 'client 2', NULL, 'client3@democrm.com', NULL, '$2y$10$wsVugjildajbioy4VF6egetaJyEzCDlbf7NKLJA7FwbtF6ynY7rBe', NULL, NULL, NULL, NULL, NULL, '12342134', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-08-16 02:11:28', '2021-08-25 04:07:18', NULL, NULL, NULL, NULL),
(29, 1, NULL, 'client 4', NULL, 'nepenax261@cfcjy.com', NULL, '$2y$10$Lon0HLNwNkISp/QUQz0PTej3SrlLX36Rhhn0sESHCWbxDV/7RSlAC', NULL, NULL, NULL, NULL, NULL, '123421344', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-08-16 02:18:19', '2021-08-25 04:07:19', NULL, NULL, NULL, NULL),
(30, 1, NULL, 'Creative Word', NULL, 'tester@tester.com', NULL, '$2y$10$cDVTk2E4IlEkyudmU.xQV.QtwOHAC4Ck2kBQErkZ6Poa029Z4uUK6', 'uploads/avatar/34af360e6bb95b0f64a58e2b36e70fb7/vcLwk29SCacgHVXbDPxUSAi5RZf1XpHgdeMvAOqf.jpg', NULL, NULL, NULL, NULL, '1231231231', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-08-16 07:48:42', '2022-01-05 00:50:40', NULL, NULL, NULL, NULL),
(31, 2, NULL, 'Developer 3', 'developer3', 'developer3@democrm.com', NULL, '$2y$10$v53kC2dg6M3gWWGC3Wm3ken6whEM6kJj2vDw.1lfFN7P66QTiq9Z6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1026', NULL, 0, '4', NULL, 'developer3@democrm.com', NULL, NULL, NULL, NULL, 0, NULL, '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-23 03:28:07', '2021-09-23 03:28:07', NULL, NULL, NULL, NULL),
(32, 2, NULL, 'my full name', 'my-user-name', 'me@mydomain.com', NULL, '$2y$10$Nl0tdjY2OwpyFlVSO.K32u.bFCBfGGToOiic6Xj1oeFg/Piv7bhtK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1027', NULL, 0, '4', NULL, 'me@mydomain.com', NULL, NULL, NULL, NULL, 0, NULL, '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-23 04:05:08', '2021-09-23 04:05:08', NULL, NULL, NULL, NULL),
(33, 2, NULL, 'user demo1', 'user-demo1', 'userdemo1@democrm.com', NULL, '$2y$10$4..lEQmI5y.cozLKg2879eXdrD4m/JNtq9bODf0LMpz4OQnQ4Szh2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1030', NULL, 0, '4', NULL, 'team.lead1@democrm.com', NULL, NULL, NULL, NULL, 1000000, NULL, '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-01-14 10:05:54', '2022-01-14 10:05:54', NULL, NULL, NULL, NULL),
(34, 1, NULL, 'daveei', NULL, 'democlient@crm.com', NULL, '$2y$10$/RVlAzZTVNlJ2jZcS6MX/u4Bu4l3kcph93ppiYve/hkyH9XHfzxwG', NULL, NULL, NULL, NULL, NULL, '012321654', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-03-16 02:58:00', '2022-03-16 02:58:00', NULL, NULL, NULL, NULL);

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
-- Indexes for table `academic_levels`
--
ALTER TABLE `academic_levels`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `brand_source_accounts`
--
ALTER TABLE `brand_source_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_source_accounts_brand_id_foreign` (`brand_id`),
  ADD KEY `brand_source_accounts_source_account_id_foreign` (`source_account_id`);

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
-- Indexes for table `content_projects`
--
ALTER TABLE `content_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_projects_reference_style_id_foreign` (`reference_style_id`),
  ADD KEY `content_projects_number_of_words_id_foreign` (`number_of_words_id`),
  ADD KEY `content_projects_academic_level_id_foreign` (`academic_level_id`),
  ADD KEY `content_projects_currency_id_foreign` (`currency_id`);

--
-- Indexes for table `content_project_types`
--
ALTER TABLE `content_project_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `design_projects`
--
ALTER TABLE `design_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `design_projects_industry_id_foreign` (`industry_id`);

--
-- Indexes for table `development_projects`
--
ALTER TABLE `development_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
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
-- Indexes for table `number_of_words`
--
ALTER TABLE `number_of_words`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_projects`
--
ALTER TABLE `other_projects`
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
-- Indexes for table `reference_styles`
--
ALTER TABLE `reference_styles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`,`scope`),
  ADD KEY `roles_scope_index` (`scope`);

--
-- Indexes for table `seo_projects`
--
ALTER TABLE `seo_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `source_accounts`
--
ALTER TABLE `source_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `source_accounts_email_unique` (`email`);

--
-- Indexes for table `tasks_comments`
--
ALTER TABLE `tasks_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_node_app_contacts`
--
ALTER TABLE `test_node_app_contacts`
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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `academic_levels`
--
ALTER TABLE `academic_levels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `assignee_brand_targets`
--
ALTER TABLE `assignee_brand_targets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brand_employees`
--
ALTER TABLE `brand_employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brand_source_accounts`
--
ALTER TABLE `brand_source_accounts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `brand_targets`
--
ALTER TABLE `brand_targets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content_projects`
--
ALTER TABLE `content_projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `content_project_types`
--
ALTER TABLE `content_project_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `design_projects`
--
ALTER TABLE `design_projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `development_projects`
--
ALTER TABLE `development_projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `lead_forms`
--
ALTER TABLE `lead_forms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `my_sticky_notes`
--
ALTER TABLE `my_sticky_notes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `number_of_words`
--
ALTER TABLE `number_of_words`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=501;

--
-- AUTO_INCREMENT for table `other_projects`
--
ALTER TABLE `other_projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=491;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `project_attachment`
--
ALTER TABLE `project_attachment`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `project_package`
--
ALTER TABLE `project_package`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_reviews`
--
ALTER TABLE `project_reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_task`
--
ALTER TABLE `project_task`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project_task_comment`
--
ALTER TABLE `project_task_comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `project_task_label`
--
ALTER TABLE `project_task_label`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_thread`
--
ALTER TABLE `project_thread`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project_thread_comment`
--
ALTER TABLE `project_thread_comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_transitions`
--
ALTER TABLE `project_transitions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `reference_styles`
--
ALTER TABLE `reference_styles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `seo_projects`
--
ALTER TABLE `seo_projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `source_accounts`
--
ALTER TABLE `source_accounts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tasks_comments`
--
ALTER TABLE `tasks_comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `test_node_app_contacts`
--
ALTER TABLE `test_node_app_contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
-- Constraints for table `brand_source_accounts`
--
ALTER TABLE `brand_source_accounts`
  ADD CONSTRAINT `brand_source_accounts_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `brand_source_accounts_source_account_id_foreign` FOREIGN KEY (`source_account_id`) REFERENCES `source_accounts` (`id`);

--
-- Constraints for table `brand_targets`
--
ALTER TABLE `brand_targets`
  ADD CONSTRAINT `brand_targets_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Constraints for table `content_projects`
--
ALTER TABLE `content_projects`
  ADD CONSTRAINT `content_projects_academic_level_id_foreign` FOREIGN KEY (`academic_level_id`) REFERENCES `academic_levels` (`id`),
  ADD CONSTRAINT `content_projects_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`),
  ADD CONSTRAINT `content_projects_number_of_words_id_foreign` FOREIGN KEY (`number_of_words_id`) REFERENCES `number_of_words` (`id`),
  ADD CONSTRAINT `content_projects_reference_style_id_foreign` FOREIGN KEY (`reference_style_id`) REFERENCES `reference_styles` (`id`);

--
-- Constraints for table `design_projects`
--
ALTER TABLE `design_projects`
  ADD CONSTRAINT `design_projects_industry_id_foreign` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`);

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
