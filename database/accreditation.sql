-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2022 at 10:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accreditation`
--

-- --------------------------------------------------------

--
-- Table structure for table `accreditation_levels`
--

CREATE TABLE `accreditation_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `accreditationLevel` smallint(6) NOT NULL,
  `accreditationLabel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accreditation_levels`
--

INSERT INTO `accreditation_levels` (`id`, `accreditationLevel`, `accreditationLabel`, `created_at`, `updated_at`) VALUES
(1, 1, 'Level 1', '2022-07-25 11:13:25', '2022-07-25 11:13:25'),
(2, 2, 'Level 2', '2022-07-25 11:13:25', '2022-07-25 11:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `approval_statuses`
--

CREATE TABLE `approval_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `approvalStatusID` smallint(6) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `approval_statuses`
--

INSERT INTO `approval_statuses` (`id`, `approvalStatusID`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Approved', '2022-07-25 11:13:25', '2022-07-25 11:13:25'),
(2, 2, 'Unapproved', '2022-07-25 11:13:25', '2022-07-25 11:13:25'),
(3, 3, 'Not Needed', '2022-07-25 11:13:25', '2022-07-25 11:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `approval_types`
--

CREATE TABLE `approval_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `approvalID` smallint(6) NOT NULL,
  `approver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `approval_types`
--

INSERT INTO `approval_types` (`id`, `approvalID`, `approver`, `created_at`, `updated_at`) VALUES
(1, 1, 'Director and QA', '2022-07-25 11:13:25', '2022-07-25 11:13:25'),
(2, 2, 'QA', '2022-07-25 11:13:25', '2022-07-25 11:13:25'),
(3, 3, 'Director', '2022-07-25 11:13:25', '2022-07-25 11:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `areaNumber` smallint(6) NOT NULL,
  `areaName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publishStatus` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `areaNumber`, `areaName`, `publishStatus`, `created_at`, `updated_at`) VALUES
(1, 1, 'Governance and Administration', 2, '2022-07-25 11:13:25', '2022-07-25 11:13:25'),
(2, 2, 'Faculty', 2, '2022-07-25 11:13:25', '2022-07-25 11:13:25'),
(3, 3, 'Curriculum & Instruction', 2, '2022-07-25 11:13:25', '2022-07-25 11:13:25'),
(4, 4, 'Student Services', 2, '2022-07-25 11:13:25', '2022-07-25 11:13:25'),
(5, 5, 'Entrepreneurship and Employability', 2, '2022-07-25 11:13:25', '2022-07-25 11:13:25'),
(6, 6, 'Community Extension', 2, '2022-07-25 11:13:25', '2022-07-25 11:13:25'),
(7, 7, 'Research', 2, '2022-07-25 11:13:25', '2022-07-25 11:13:25'),
(8, 8, 'Library', 2, '2022-07-25 11:13:25', '2022-07-25 11:13:25'),
(9, 9, 'Laboratories', 2, '2022-07-25 11:13:25', '2022-07-25 11:13:25'),
(10, 10, 'Physical Plant', 2, '2022-07-25 11:13:25', '2022-07-25 11:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shortname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `shortname`, `longname`, `description`, `created_at`, `updated_at`) VALUES
(1, 'DBE', 'Department of Business Education', 'DBA offers Bachelor of Science in Accountancy and Bachelor of Science in Accounting in Information Systems.', '2022-07-25 11:13:25', '2022-07-25 11:13:25'),
(2, 'DCI', 'Department of Computer Informatics', 'DCI offers Bachelor of Science in Computer Science and Bachelor of Science in Information Technology.', '2022-07-25 11:13:25', '2022-07-25 11:13:25'),
(3, 'DTE', 'Department of Teaching Education', 'DTE offers Bachelor in Elementary Education and Bachelor in Secondary Education', '2022-07-25 11:13:25', '2022-07-25 11:13:25');

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
(5, '2022_05_19_150037_create_approval_types_table', 1),
(6, '2022_05_19_170546_create_approval_statuses_table', 1),
(7, '2022_05_21_071306_create_publish_statuses_table', 1),
(8, '2022_05_28_075831_create_department_table', 1),
(9, '2022_06_07_044610_create_areas_table', 1),
(10, '2022_06_07_091123_create_accreditation_levels_table', 1),
(11, '2022_06_07_095513_create_reports_table', 1),
(12, '2022_07_14_105716_create_permission_tables', 1),
(13, '2022_07_15_031218_create_programs_table', 1),
(14, '2022_07_19_012231_create_templates_table', 1),
(15, '2022_07_21_081357_create_table_infos_table', 1),
(16, '2022_07_22_055659_create_publishes_table', 1);

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
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shortname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `shortname`, `longname`, `department`, `description`, `created_at`, `updated_at`) VALUES
(1, 'BSCS', 'Bachelor of Science in Computer Science', 'DCI', 'Apply knowledge of computing fundamentals, knowledge of a computing specialization, and mathematics, science, and domain knowledge.', '2022-07-25 11:13:25', '2022-07-25 11:13:25'),
(2, 'BSIT', 'Bachelor of Science in Information Technology', 'DCI', 'Apply knowledge of computing, science, and mathematics appropriate to the discipline.', '2022-07-25 11:13:25', '2022-07-25 11:13:25'),
(3, 'BSA', 'Bachelor of Science in Accountancy', 'DBE', 'Employ technology as a business tool in capturing financial and non-financial information, generating reports and making decisions;', '2022-07-25 11:13:25', '2022-07-25 11:13:25'),
(4, 'AIS', 'Bachelor of Science in Accounting Information Systems', 'DBE', 'Employ technology as a business tool in capturing financial and non-financial information, generating reports and making decisions;', '2022-07-25 11:13:25', '2022-07-25 11:13:25'),
(5, 'BEE', 'Bachelor of Elementary Education', 'DTE', 'Demonstrate in-depth understanding of the diversity of learners in various learning areas.', '2022-07-25 11:13:25', '2022-07-25 11:13:25'),
(6, 'SEDS', 'Bachelor of Secondary Education Major in Science', 'DTE', 'Demonstrate deep understanding of scientific concepts and principles.', '2022-07-25 11:13:25', '2022-07-25 11:13:25'),
(7, 'SEDM', 'Bachelor of Secondary Education Major in Mathematics', 'DTE', 'Exhibit competence in mathematical concepts and procedures.', '2022-07-25 11:13:25', '2022-07-25 11:13:25'),
(8, 'SEDE', 'Bachelor of Secondary Education Major in English', 'DTE', 'Possess broad knowledge of language and literature for effective learning.', '2022-07-25 11:13:25', '2022-07-25 11:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `publishes`
--

CREATE TABLE `publishes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `accred_level` smallint(6) NOT NULL,
  `program` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` smallint(6) NOT NULL,
  `reportType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tblRow` smallint(6) NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edited_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approval` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publishes`
--

INSERT INTO `publishes` (`id`, `accred_level`, `program`, `area`, `reportType`, `tblRow`, `comment`, `edited_by`, `approval`, `created_at`, `updated_at`) VALUES
(1, 1, 'BSA', 1, 'compliance', 1, 'FIx it', 'Admin', 2, '2022-07-25 11:25:54', '2022-07-25 11:25:54'),
(3, 1, 'BSA', 1, 'compliance', 1, 'Another User here', 'John Christian Unida Marquez', 2, '2022-07-25 11:42:11', '2022-07-25 11:42:11'),
(6, 1, 'BSA', 1, 'self-survey', 1, 'ggg', 'Admin', 2, '2022-07-25 23:19:07', '2022-07-25 23:19:07');

-- --------------------------------------------------------

--
-- Table structure for table `publish_statuses`
--

CREATE TABLE `publish_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `publishID` smallint(6) NOT NULL,
  `publishStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publish_statuses`
--

INSERT INTO `publish_statuses` (`id`, `publishID`, `publishStatus`, `created_at`, `updated_at`) VALUES
(1, 1, 'Published', '2022-07-25 11:13:25', '2022-07-25 11:13:25'),
(2, 2, 'Unpublished', '2022-07-25 11:13:25', '2022-07-25 11:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reportType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reportLabel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `reportType`, `reportLabel`, `created_at`, `updated_at`) VALUES
(1, 'compliance', 'Compliance Report', '2022-07-25 11:13:25', '2022-07-25 11:13:25'),
(2, 'self-survey', 'Self-Survey Report', '2022-07-25 11:13:25', '2022-07-25 11:13:25');

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

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_infos`
--

CREATE TABLE `table_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `accred_level` smallint(6) NOT NULL,
  `program` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` smallint(6) NOT NULL,
  `reportType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tblRow` smallint(6) NOT NULL,
  `tblCol` smallint(6) NOT NULL,
  `cellText` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_infos`
--

INSERT INTO `table_infos` (`id`, `accred_level`, `program`, `area`, `reportType`, `tblRow`, `tblCol`, `cellText`, `created_at`, `updated_at`) VALUES
(1, 1, 'BSA', 1, 'self-survey', 1, 1, '<p>1</p>', '2022-07-25 11:19:10', '2022-07-25 11:19:10'),
(2, 1, 'BSA', 1, 'self-survey', 1, 2, '<p>1</p>', '2022-07-25 11:19:10', '2022-07-25 11:19:10'),
(3, 1, 'BSA', 1, 'self-survey', 1, 3, '<p>1</p>', '2022-07-25 11:19:10', '2022-07-25 11:19:10'),
(4, 1, 'BSA', 1, 'compliance', 1, 1, '<p>1</p>', '2022-07-25 11:19:30', '2022-07-25 11:19:30'),
(5, 1, 'BSA', 1, 'compliance', 1, 2, '<p>Revision of organizational structure to harmonize the institutional practices such as:</p>\r\n\r\n<p>a. Academic</p>\r\n\r\n<p>b. Planning and Research</p>\r\n\r\n<p>c. Administrative and Finance</p>\r\n\r\n<p>d. External Affairs and Linkages</p>', '2022-07-25 11:19:30', '2022-07-25 11:25:01'),
(6, 1, 'BSA', 1, 'compliance', 1, 3, '<p>Conducted Organizational</p>\r\n\r\n<p>Development for the alignment to</p>\r\n\r\n<p>newly approved CCC Charter</p>', '2022-07-25 11:19:30', '2022-07-25 11:25:32'),
(7, 1, 'BSA', 1, 'compliance', 1, 4, '<p>1</p>', '2022-07-25 11:19:30', '2022-07-25 11:19:30'),
(8, 1, 'AIS', 1, 'compliance', 1, 1, '<p>1</p>', '2022-07-25 12:44:27', '2022-07-25 12:44:27'),
(9, 1, 'AIS', 1, 'compliance', 1, 2, '<p>1</p>', '2022-07-25 12:44:27', '2022-07-25 12:44:27'),
(10, 1, 'AIS', 1, 'compliance', 1, 3, '<p>1</p>', '2022-07-25 12:44:27', '2022-07-25 12:44:27'),
(11, 1, 'AIS', 1, 'compliance', 1, 4, '<p>1</p>', '2022-07-25 12:44:27', '2022-07-25 12:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `accred_level` smallint(6) NOT NULL,
  `area` smallint(6) NOT NULL,
  `reportType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `columnNumber` smallint(6) NOT NULL,
  `columnName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `accred_level`, `area`, `reportType`, `columnNumber`, `columnName`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'compliance', 1, 'No.', '2022-07-25 11:18:06', '2022-07-25 11:18:06'),
(2, 1, 1, 'compliance', 2, 'Deficiencies/ Recommendations', '2022-07-25 11:18:21', '2022-07-25 11:18:21'),
(3, 1, 1, 'compliance', 3, 'Action Taken', '2022-07-25 11:18:26', '2022-07-25 11:18:26'),
(4, 1, 1, 'compliance', 4, 'Documents/Evidence', '2022-07-25 11:18:33', '2022-07-25 11:18:33'),
(5, 1, 1, 'self-survey', 1, 'No.', '2022-07-25 11:18:48', '2022-07-25 11:18:48'),
(6, 1, 1, 'self-survey', 2, 'Input', '2022-07-25 11:18:54', '2022-07-25 11:18:54'),
(7, 1, 1, 'self-survey', 3, 'Output', '2022-07-25 11:19:02', '2022-07-25 11:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `department`, `position`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'DCI', 'qa', 'admin@gmail.com', '$2y$10$c8tulRUX3I2tt3Ejta2gRu76/etU93K0.G/CGQjt2FLkbjhdN8GdO', NULL, '2022-07-25 11:13:24', '2022-07-25 11:13:24'),
(2, 'John Christian Unida Marquez', 'DCI', 'qa', 'jumarquez@ccc.edu.ph', '$2y$10$c7PFcoWa63YkcM98fg28m.8IZAV5RwTHnXbKfR68ILyuuYQp92/Mq', NULL, '2022-07-25 11:41:44', '2022-07-25 11:41:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accreditation_levels`
--
ALTER TABLE `accreditation_levels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accreditation_levels_accreditationlevel_unique` (`accreditationLevel`);

--
-- Indexes for table `approval_statuses`
--
ALTER TABLE `approval_statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `approval_statuses_approvalstatusid_unique` (`approvalStatusID`);

--
-- Indexes for table `approval_types`
--
ALTER TABLE `approval_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `approval_types_approvalid_unique` (`approvalID`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `areas_areanumber_unique` (`areaNumber`),
  ADD KEY `areas_publishstatus_foreign` (`publishStatus`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department_shortname_unique` (`shortname`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `programs_shortname_unique` (`shortname`),
  ADD KEY `programs_department_foreign` (`department`);

--
-- Indexes for table `publishes`
--
ALTER TABLE `publishes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publishes_accred_level_foreign` (`accred_level`),
  ADD KEY `publishes_program_foreign` (`program`),
  ADD KEY `publishes_area_foreign` (`area`),
  ADD KEY `publishes_reporttype_foreign` (`reportType`),
  ADD KEY `publishes_approval_foreign` (`approval`);

--
-- Indexes for table `publish_statuses`
--
ALTER TABLE `publish_statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `publish_statuses_publishid_unique` (`publishID`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reports_reporttype_unique` (`reportType`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `table_infos`
--
ALTER TABLE `table_infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `table_infos_program_area_reporttype_tblrow_tblcol_unique` (`program`,`area`,`reportType`,`tblRow`,`tblCol`),
  ADD KEY `table_infos_accred_level_foreign` (`accred_level`),
  ADD KEY `table_infos_area_foreign` (`area`),
  ADD KEY `table_infos_reporttype_foreign` (`reportType`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `templates_area_reporttype_columnnumber_unique` (`area`,`reportType`,`columnNumber`),
  ADD KEY `templates_accred_level_foreign` (`accred_level`),
  ADD KEY `templates_reporttype_foreign` (`reportType`);

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
-- AUTO_INCREMENT for table `accreditation_levels`
--
ALTER TABLE `accreditation_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `approval_statuses`
--
ALTER TABLE `approval_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `approval_types`
--
ALTER TABLE `approval_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `publishes`
--
ALTER TABLE `publishes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `publish_statuses`
--
ALTER TABLE `publish_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_infos`
--
ALTER TABLE `table_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_publishstatus_foreign` FOREIGN KEY (`publishStatus`) REFERENCES `publish_statuses` (`publishID`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `programs_department_foreign` FOREIGN KEY (`department`) REFERENCES `department` (`shortname`) ON DELETE CASCADE;

--
-- Constraints for table `publishes`
--
ALTER TABLE `publishes`
  ADD CONSTRAINT `publishes_accred_level_foreign` FOREIGN KEY (`accred_level`) REFERENCES `accreditation_levels` (`accreditationLevel`) ON DELETE CASCADE,
  ADD CONSTRAINT `publishes_approval_foreign` FOREIGN KEY (`approval`) REFERENCES `approval_statuses` (`approvalStatusID`) ON DELETE CASCADE,
  ADD CONSTRAINT `publishes_area_foreign` FOREIGN KEY (`area`) REFERENCES `areas` (`areaNumber`) ON DELETE CASCADE,
  ADD CONSTRAINT `publishes_program_foreign` FOREIGN KEY (`program`) REFERENCES `programs` (`shortname`) ON DELETE CASCADE,
  ADD CONSTRAINT `publishes_reporttype_foreign` FOREIGN KEY (`reportType`) REFERENCES `reports` (`reportType`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `table_infos`
--
ALTER TABLE `table_infos`
  ADD CONSTRAINT `table_infos_accred_level_foreign` FOREIGN KEY (`accred_level`) REFERENCES `accreditation_levels` (`accreditationLevel`) ON DELETE CASCADE,
  ADD CONSTRAINT `table_infos_area_foreign` FOREIGN KEY (`area`) REFERENCES `areas` (`areaNumber`) ON DELETE CASCADE,
  ADD CONSTRAINT `table_infos_program_foreign` FOREIGN KEY (`program`) REFERENCES `programs` (`shortname`) ON DELETE CASCADE,
  ADD CONSTRAINT `table_infos_reporttype_foreign` FOREIGN KEY (`reportType`) REFERENCES `reports` (`reportType`) ON DELETE CASCADE;

--
-- Constraints for table `templates`
--
ALTER TABLE `templates`
  ADD CONSTRAINT `templates_accred_level_foreign` FOREIGN KEY (`accred_level`) REFERENCES `accreditation_levels` (`accreditationLevel`) ON DELETE CASCADE,
  ADD CONSTRAINT `templates_area_foreign` FOREIGN KEY (`area`) REFERENCES `areas` (`areaNumber`) ON DELETE CASCADE,
  ADD CONSTRAINT `templates_reporttype_foreign` FOREIGN KEY (`reportType`) REFERENCES `reports` (`reportType`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
