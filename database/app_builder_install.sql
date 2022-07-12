-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 26, 2021 at 06:39 AM
-- Server version: 5.6.49-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `softkernal_app_builder`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_documentation`
--

CREATE TABLE `api_documentation` (
  `id` int(10) UNSIGNED NOT NULL,
  `method_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parameters` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api_documentation`
--

INSERT INTO `api_documentation` (`id`, `method_type`, `url`, `parameters`, `description`, `created_at`, `updated_at`) VALUES
(1, '[\"POST\"]', 'api/login', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(2, '[\"POST\"]', 'api/register', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(3, '[\"GET\",\"HEAD\"]', 'api/Invoicedetails/list', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(4, '[\"POST\"]', 'api/Invoicedetails/create_or_update', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(5, '[\"GET\",\"HEAD\"]', 'api/Invoicedetails/edit/{id}', '[\"{id}\"]', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(6, '[\"POST\"]', 'api/Invoicedetails/update/{id}', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(7, '[\"DELETE\"]', 'api/Invoicedetails/delete/{id}', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(8, '[\"DELETE\"]', 'api/Invoicedetails/delete_multiple', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(9, '[\"GET\",\"HEAD\"]', 'api/Invoices/list', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(10, '[\"POST\"]', 'api/Invoices/create_or_update', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(11, '[\"GET\",\"HEAD\"]', 'api/Invoices/edit/{id}', '[\"{id}\"]', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(12, '[\"POST\"]', 'api/Invoices/update/{id}', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(13, '[\"DELETE\"]', 'api/Invoices/delete/{id}', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(14, '[\"DELETE\"]', 'api/Invoices/delete_multiple', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(15, '[\"GET\",\"HEAD\"]', 'api/modules/{module_id}/Widgets', '[\"{module_id}\"]', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(16, '[\"POST\"]', 'api/modules/Widgets/create_or_update', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(17, '[\"GET\",\"HEAD\"]', 'api/modules/Widgets/edit/{id}', '[\"{id}\"]', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(18, '[\"POST\"]', 'api/modules/Widgets/update/{id}', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(19, '[\"DELETE\"]', 'api/modules/Widgets/delete/{id}', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(20, '[\"DELETE\"]', 'api/modules/Widgets/delete_multiple', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(21, '[\"GET\",\"HEAD\"]', 'api/users/getroles', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(22, '[\"GET\",\"HEAD\"]', 'api/roles/edit/{id}', '[\"{id}\"]', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(23, '[\"POST\"]', 'api/roles/createorupdate', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(24, '[\"GET\",\"HEAD\"]', 'api/roles/delete/{id}', '[\"{id}\"]', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(25, '[\"DELETE\"]', 'api/roles/deletemultiple', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(26, '[\"GET\",\"HEAD\"]', 'api/users/getpermissions', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(27, '[\"GET\",\"HEAD\"]', 'api/permissions/edit/{id}', '[\"{id}\"]', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(28, '[\"POST\"]', 'api/permissions/createorupdate', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(29, '[\"GET\",\"HEAD\"]', 'api/permissions/delete/{id}', '[\"{id}\"]', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(30, '[\"DELETE\"]', 'api/permissions/deletemultiple', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(31, '[\"POST\"]', 'api/modulebuilder/saveMenuSorting', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(32, '[\"POST\"]', 'api/modulebuilder/menuscreateorupdate', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(33, '[\"GET\",\"HEAD\"]', 'api/modulebuilder/menudelete/{id}', '[\"{id}\"]', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(34, '[\"GET\",\"HEAD\"]', 'api/modulebuilder/modulebuilderindex', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(35, '[\"GET\",\"HEAD\"]', 'api/modulebuilder/builder', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(36, '[\"GET\",\"HEAD\"]', 'api/modules', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(37, '[\"GET\",\"HEAD\"]', 'api/modules/list', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(38, '[\"GET\",\"HEAD\"]', 'api/modules/edit/{id}', '[\"{id}\"]', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(39, '[\"GET\",\"HEAD\"]', 'api/modules/delete/{id}', '[\"{id}\"]', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(40, '[\"POST\"]', 'api/modules/CreateUpdate', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(41, '[\"GET\",\"HEAD\"]', 'api/modules/{id}', '[\"{id}\"]', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(42, '[\"GET\",\"HEAD\"]', 'api/modules/fields/{module_id}', '[\"{module_id}\"]', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(43, '[\"POST\"]', 'api/modules/fields/CreateUpdate', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(44, '[\"GET\",\"HEAD\"]', 'api/modules/fields/delete/{id}', '[\"{id}\"]', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(45, '[\"GET\",\"HEAD\"]', 'api/modules/fields/edit/{id}', '[\"{id}\"]', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(46, '[\"GET\",\"HEAD\"]', 'api/modulebuilder/generateview', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(47, '[\"GET\",\"POST\",\"HEAD\"]', 'api/modulebuilder/generate/{id}', '[\"{id}\"]', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(48, '[\"GET\",\"HEAD\"]', 'api/modulebuilder/deletemodule', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(49, '[\"GET\",\"HEAD\"]', 'api/modulebuilder/getTableNames', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(50, '[\"DELETE\"]', 'api/modulebuilder/deletemultiplemodules', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(51, '[\"DELETE\"]', 'api/modules/fields/multipledelete', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(52, '[\"GET\",\"HEAD\"]', 'api/users/list', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(53, '[\"GET\",\"HEAD\"]', 'api/users/edit/{id}', '[\"{id}\"]', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(54, '[\"POST\"]', 'api/users/createorupdate', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(55, '[\"GET\",\"HEAD\"]', 'api/users/delete/{id}', '[\"{id}\"]', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(56, '[\"DELETE\"]', 'api/users/delete_multiple', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(57, '[\"GET\",\"HEAD\"]', 'api/users/profile', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(58, '[\"POST\"]', 'api/users/profileUpdate', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(59, '[\"GET\",\"HEAD\"]', 'api/password/reset', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(60, '[\"POST\"]', 'api/password/email', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(61, '[\"GET\",\"HEAD\"]', 'api/password/reset/{token}', '[\"{token}\"]', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03'),
(62, '[\"POST\"]', 'api/password/reset', '{}', '', '2020-10-18 17:47:03', '2020-10-18 17:47:03');

-- --------------------------------------------------------

--
-- Table structure for table `Blog`
--

CREATE TABLE `Blog` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_tags` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Blog_categories`
--

CREATE TABLE `Blog_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `field_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `validation_rules` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`id`, `field_name`, `field_text`, `status`, `validation_rules`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'integer', 'Number', 1, NULL, NULL, NULL, '2021-02-21 21:35:24'),
(2, 'biginteger', 'Big Number', 1, NULL, NULL, NULL, '2021-02-21 21:35:24'),
(3, 'float', 'Decimal Number', 1, NULL, NULL, NULL, '2021-02-21 21:35:24'),
(4, 'boolean', 'Yes,No', 0, NULL, NULL, NULL, '2021-02-21 21:35:24'),
(5, 'date', 'Date Picker', 1, NULL, NULL, NULL, '2021-02-21 21:35:24'),
(6, 'datetime', 'DateTime Picker', 1, NULL, NULL, NULL, '2021-02-21 21:35:24'),
(7, 'string', 'Text', 1, NULL, NULL, NULL, '2021-02-21 21:35:24'),
(8, 'text', 'Text Editor (CK Editor)', 1, NULL, NULL, NULL, '2021-02-21 21:35:24'),
(9, 'image', 'Image', 1, NULL, NULL, NULL, '2021-02-21 21:35:24'),
(10, 'attachment', 'Attachment', 1, NULL, NULL, NULL, '2021-02-21 21:35:24'),
(11, 'one_to_one_relation', 'One to One relation', 1, NULL, NULL, NULL, '2021-02-21 21:35:24'),
(12, 'one_to_many_relation', 'One To Many Relation', 0, NULL, NULL, NULL, '2021-02-21 21:35:24'),
(13, 'select', 'select', 1, NULL, NULL, NULL, '2021-02-21 21:35:24'),
(14, 'radio', 'radio', 1, NULL, NULL, NULL, '2021-02-21 21:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `Invoicedetails`
--

CREATE TABLE `Invoicedetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `product` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Invoices`
--

CREATE TABLE `Invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_company_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_company_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_company_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_company_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_company_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_company_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_due` date NOT NULL,
  `tax` double(8,2) NOT NULL,
  `shipping` double(8,2) NOT NULL,
  `total` double(8,2) NOT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `renewal_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ltm_translations`
--

CREATE TABLE `ltm_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `locale` varchar(191) COLLATE utf8mb4_bin NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_bin NOT NULL,
  `key` text COLLATE utf8mb4_bin NOT NULL,
  `value` text COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `ltm_translations`
--

INSERT INTO `ltm_translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'manage_users', 'menu_title', 'Manage Users', '2020-09-28 05:03:40', '2020-09-28 05:04:30'),
(2, 1, 'en', 'file_manager', 'menu_title', 'File Manager', '2020-09-28 05:03:40', '2020-09-28 05:04:30'),
(3, 1, 'en', 'account_settings', 'menu_title', 'Account Settings', '2020-09-28 05:03:40', '2020-09-28 05:04:30'),
(4, 1, 'en', 'modules', 'module_title', 'Module Builder', '2020-09-28 05:03:40', '2020-09-28 05:04:30'),
(5, 1, 'en', 'modules', 'module_subtitle', 'All Modules', '2020-09-28 05:03:40', '2020-09-28 05:04:30'),
(6, 1, 'en', 'modules', 'module_name', 'Module Name ', '2020-09-28 05:03:40', '2020-09-28 05:04:30'),
(7, 1, 'en', 'roles', 'module_title', 'Roles <small> Users\'s Roles </small>', '2020-09-28 05:03:40', '2020-09-28 05:04:31'),
(8, 1, 'en', 'permissions', 'module_title', 'Permissions <small>Permissions\'s List</small>', '2020-09-28 05:03:40', '2020-09-28 05:04:31'),
(9, 1, 'ar', 'account_settings', 'menu_title', 'إعدادات الحساب', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(10, 1, 'ar', 'auth', 'failed', 'These credentials do not match our records.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(11, 1, 'ar', 'auth', 'throttle', 'Too many login attempts. Please try again in :seconds seconds.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(12, 1, 'ar', 'crud_builder', 'menu_title', 'منشئ النظام', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(13, 1, 'ar', 'dashboard', 'crud_builder', ' منشئ النظام', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(14, 1, 'ar', 'dashboard', 'menu', 'القائمة', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(15, 1, 'ar', 'dashboard', 'modules', 'وحدات', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(16, 1, 'ar', 'dashboard', 'manage_users', 'التحكم بالمستخدمين', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(17, 1, 'ar', 'dashboard', 'users', 'المستخدمين', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(18, 1, 'ar', 'dashboard', 'roles', 'الادوار', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(19, 1, 'ar', 'dashboard', 'permissions', 'الصلاحيات', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(20, 1, 'ar', 'dashboard', 'file_manager', 'مدير الملفات', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(21, 1, 'ar', 'dashboard', 'account_settings', 'مدير الحساب', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(22, 1, 'ar', 'dashboard', 'user_profile', 'ملف المستخدم', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(23, 1, 'ar', 'dashboard', 'general_settings', 'اعدادات عامة', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(24, 1, 'ar', 'dashboard', 'profile', 'الملف الشخصي', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(25, 1, 'ar', 'dashboard', 'log_out', 'الخروج', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(26, 1, 'ar', 'file_manager', 'menu_title', 'مدير الملفات', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(27, 1, 'ar', 'general_settings', 'menu_title', 'إعدادات عامة', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(28, 1, 'ar', 'general_settings', 'module_title', 'إدارة الاعدادات العامة', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(29, 1, 'ar', 'general_settings', 'module_form_title', 'الإعدادات العامة', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(30, 1, 'ar', 'general_settings', 'arabic', 'العربيه', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(31, 1, 'ar', 'general_settings', 'english', 'الانجليزية', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(32, 1, 'ar', 'general_settings', 'registration', 'التسجيل', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(33, 1, 'ar', 'general_settings', 'crud_builder', 'منشئ النظام', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(34, 1, 'ar', 'general_settings', 'file_manager', 'مدير الملفات', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(35, 1, 'ar', 'general_settings', 'direction', 'الاتجاه', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(36, 1, 'ar', 'general_settings', 'language', 'اللغه', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(37, 1, 'ar', 'general_settings', 'hide', 'إخفاء', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(38, 1, 'ar', 'general_settings', 'show', 'إظهار', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(39, 1, 'ar', 'general_settings', 'ltr', 'من اليسار لليمين', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(40, 1, 'ar', 'general_settings', 'rtl', 'من اليمين لليسار', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(41, 1, 'ar', 'general_settings', 'enable', 'تفعيل', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(42, 1, 'ar', 'general_settings', 'disable', 'إيقاف', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(43, 1, 'ar', 'general_settings', 'cancel', 'الغاء', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(44, 1, 'ar', 'general_settings', 'submit', 'إرسال', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(45, 1, 'ar', 'manage_users', 'menu_title', 'إدارة المستخدمين', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(46, 1, 'ar', 'menu', 'menu_title', 'القائمة', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(47, 1, 'ar', 'menu', 'module_title', 'التحكم بقوائم النظام', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(48, 1, 'ar', 'menu', 'module_subtitle', 'القائمة', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(49, 1, 'ar', 'menu', 'module_add_new', 'إضافة قائمة رئيسية جديدة', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(50, 1, 'ar', 'modules', 'menu_title', 'الوحدات', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(51, 1, 'ar', 'modules', 'module_title', 'منشئ الوحدات', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(52, 1, 'ar', 'modules', 'module_subtitle', 'كل الوحدات', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(53, 1, 'ar', 'modules', 'module_add_new', 'إضافة وحده جديده', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(54, 1, 'ar', 'modules', 'module_name', 'إسم الوحدة', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(55, 1, 'ar', 'modules', 'module_add_new_field', 'إضافة حقل جديد', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(56, 1, 'ar', 'modules', 'module_generate_module', 'إنشاء الوحده', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(57, 1, 'ar', 'pagination', 'previous', '&laquo; السابق', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(58, 1, 'ar', 'pagination', 'next', 'التالي &raquo;', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(59, 1, 'ar', 'passwords', 'password', 'Passwords must be at least six characters and match the confirmation.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(60, 1, 'ar', 'passwords', 'reset', 'Your password has been reset!', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(61, 1, 'ar', 'passwords', 'sent', 'We have e-mailed your password reset link!', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(62, 1, 'ar', 'passwords', 'token', 'This password reset token is invalid.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(63, 1, 'ar', 'passwords', 'user', 'We can\'t find a user with that e-mail address.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(64, 1, 'ar', 'permissions', 'menu_title', 'الصلاحيات', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(65, 1, 'ar', 'permissions', 'module_title', 'الصلاحيات <small>مجموعة الصلاحيات</small>', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(66, 1, 'ar', 'permissions', 'module_subtitle', 'ادارة الصلاحيات', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(67, 1, 'ar', 'permissions', 'module_add_new', 'أضافة صلاحية جديده', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(68, 1, 'ar', 'roles', 'menu_title', 'الادوار', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(69, 1, 'ar', 'roles', 'module_title', 'الادوار<small> مجموعة الادوار </small>', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(70, 1, 'ar', 'roles', 'module_subtitle', 'ادارة الادوار', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(71, 1, 'ar', 'roles', 'module_add_new', 'اضافة دور جديد', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(72, 1, 'ar', 'translations', 'menu_title', 'مدير اللغات', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(73, 1, 'ar', 'translations', 'module_title', 'مدير اللغات', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(74, 1, 'ar', 'user_profile', 'menu_title', 'الملف الشخصي', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(75, 1, 'ar', 'user_profile', 'module_title', 'ادارة ملفك الشخصي', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(76, 1, 'ar', 'user_profile', 'module_form_title', 'الملف الشخصي', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(77, 1, 'ar', 'user_profile', 'name', 'الاسم', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(78, 1, 'ar', 'user_profile', 'email', 'البريد الالكتروني', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(79, 1, 'ar', 'user_profile', 'password', 'كلمة المرور', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(80, 1, 'ar', 'user_profile', 'profile_picture', 'صورة الملف', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(81, 1, 'ar', 'user_profile', 'cancel', 'الغاء', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(82, 1, 'ar', 'user_profile', 'submit', 'إرسال', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(83, 1, 'ar', 'users', 'menu_title', 'المستخدمين', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(84, 1, 'ar', 'users', 'module_title', 'إدارة المستخدمين', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(85, 1, 'ar', 'users', 'module_subtitle', 'مجموعة المستخدمين', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(86, 1, 'ar', 'users', 'module_add_new', 'إضافة مستخدم جديد', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(87, 1, 'ar', 'validation', 'accepted', 'The :attribute must be accepted.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(88, 1, 'ar', 'validation', 'active_url', 'The :attribute is not a valid URL.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(89, 1, 'ar', 'validation', 'after', 'The :attribute must be a date after :date.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(90, 1, 'ar', 'validation', 'after_or_equal', 'The :attribute must be a date after or equal to :date.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(91, 1, 'ar', 'validation', 'alpha', 'The :attribute may only contain letters.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(92, 1, 'ar', 'validation', 'alpha_dash', 'The :attribute may only contain letters, numbers, and dashes.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(93, 1, 'ar', 'validation', 'alpha_num', 'The :attribute may only contain letters and numbers.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(94, 1, 'ar', 'validation', 'array', 'The :attribute must be an array.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(95, 1, 'ar', 'validation', 'before', 'The :attribute must be a date before :date.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(96, 1, 'ar', 'validation', 'before_or_equal', 'The :attribute must be a date before or equal to :date.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(97, 1, 'ar', 'validation', 'between.numeric', 'The :attribute must be between :min and :max.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(98, 1, 'ar', 'validation', 'between.file', 'The :attribute must be between :min and :max kilobytes.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(99, 1, 'ar', 'validation', 'between.string', 'The :attribute must be between :min and :max characters.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(100, 1, 'ar', 'validation', 'between.array', 'The :attribute must have between :min and :max items.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(101, 1, 'ar', 'validation', 'boolean', 'The :attribute field must be true or false.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(102, 1, 'ar', 'validation', 'confirmed', 'The :attribute confirmation does not match.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(103, 1, 'ar', 'validation', 'date', 'The :attribute is not a valid date.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(104, 1, 'ar', 'validation', 'date_format', 'The :attribute does not match the format :format.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(105, 1, 'ar', 'validation', 'different', 'The :attribute and :other must be different.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(106, 1, 'ar', 'validation', 'digits', 'The :attribute must be :digits digits.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(107, 1, 'ar', 'validation', 'digits_between', 'The :attribute must be between :min and :max digits.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(108, 1, 'ar', 'validation', 'dimensions', 'The :attribute has invalid image dimensions.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(109, 1, 'ar', 'validation', 'distinct', 'The :attribute field has a duplicate value.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(110, 1, 'ar', 'validation', 'email', 'The :attribute must be a valid email address.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(111, 1, 'ar', 'validation', 'exists', 'The selected :attribute is invalid.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(112, 1, 'ar', 'validation', 'file', 'The :attribute must be a file.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(113, 1, 'ar', 'validation', 'filled', 'The :attribute field must have a value.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(114, 1, 'ar', 'validation', 'image', 'The :attribute must be an image.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(115, 1, 'ar', 'validation', 'in', 'The selected :attribute is invalid.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(116, 1, 'ar', 'validation', 'in_array', 'The :attribute field does not exist in :other.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(117, 1, 'ar', 'validation', 'integer', 'The :attribute must be an integer.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(118, 1, 'ar', 'validation', 'ip', 'The :attribute must be a valid IP address.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(119, 1, 'ar', 'validation', 'ipv4', 'The :attribute must be a valid IPv4 address.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(120, 1, 'ar', 'validation', 'ipv6', 'The :attribute must be a valid IPv6 address.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(121, 1, 'ar', 'validation', 'json', 'The :attribute must be a valid JSON string.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(122, 1, 'ar', 'validation', 'max.numeric', 'The :attribute may not be greater than :max.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(123, 1, 'ar', 'validation', 'max.file', 'The :attribute may not be greater than :max kilobytes.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(124, 1, 'ar', 'validation', 'max.string', 'The :attribute may not be greater than :max characters.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(125, 1, 'ar', 'validation', 'max.array', 'The :attribute may not have more than :max items.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(126, 1, 'ar', 'validation', 'mimes', 'The :attribute must be a file of type: :values.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(127, 1, 'ar', 'validation', 'mimetypes', 'The :attribute must be a file of type: :values.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(128, 1, 'ar', 'validation', 'min.numeric', 'The :attribute must be at least :min.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(129, 1, 'ar', 'validation', 'min.file', 'The :attribute must be at least :min kilobytes.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(130, 1, 'ar', 'validation', 'min.string', 'The :attribute must be at least :min characters.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(131, 1, 'ar', 'validation', 'min.array', 'The :attribute must have at least :min items.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(132, 1, 'ar', 'validation', 'not_in', 'The selected :attribute is invalid.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(133, 1, 'ar', 'validation', 'numeric', 'The :attribute must be a number.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(134, 1, 'ar', 'validation', 'present', 'The :attribute field must be present.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(135, 1, 'ar', 'validation', 'regex', 'The :attribute format is invalid.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(136, 1, 'ar', 'validation', 'required', 'The :attribute field is required.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(137, 1, 'ar', 'validation', 'required_if', 'The :attribute field is required when :other is :value.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(138, 1, 'ar', 'validation', 'required_unless', 'The :attribute field is required unless :other is in :values.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(139, 1, 'ar', 'validation', 'required_with', 'The :attribute field is required when :values is present.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(140, 1, 'ar', 'validation', 'required_with_all', 'The :attribute field is required when :values is present.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(141, 1, 'ar', 'validation', 'required_without', 'The :attribute field is required when :values is not present.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(142, 1, 'ar', 'validation', 'required_without_all', 'The :attribute field is required when none of :values are present.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(143, 1, 'ar', 'validation', 'same', 'The :attribute and :other must match.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(144, 1, 'ar', 'validation', 'size.numeric', 'The :attribute must be :size.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(145, 1, 'ar', 'validation', 'size.file', 'The :attribute must be :size kilobytes.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(146, 1, 'ar', 'validation', 'size.string', 'The :attribute must be :size characters.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(147, 1, 'ar', 'validation', 'size.array', 'The :attribute must contain :size items.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(148, 1, 'ar', 'validation', 'string', 'The :attribute must be a string.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(149, 1, 'ar', 'validation', 'timezone', 'The :attribute must be a valid zone.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(150, 1, 'ar', 'validation', 'unique', 'The :attribute has already been taken.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(151, 1, 'ar', 'validation', 'uploaded', 'The :attribute failed to upload.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(152, 1, 'ar', 'validation', 'url', 'The :attribute format is invalid.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(153, 1, 'ar', 'validation', 'custom.attribute-name.rule-name', 'custom-message', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(154, 1, 'ar', 'validation', 'recaptcha', 'The :attribute field is not correct.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(155, 1, 'en', 'auth', 'failed', 'These credentials do not match our records.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(156, 1, 'en', 'auth', 'throttle', 'Too many login attempts. Please try again in :seconds seconds.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(157, 1, 'en', 'crud_builder', 'menu_title', 'CRUD Builder', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(158, 1, 'en', 'dashboard', 'crud_builder', 'CRUD Builder', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(159, 1, 'en', 'dashboard', 'menu', 'Menu', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(160, 1, 'en', 'dashboard', 'modules', 'Modules', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(161, 1, 'en', 'dashboard', 'manage_users', 'Manage Users', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(162, 1, 'en', 'dashboard', 'users', 'Users', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(163, 1, 'en', 'dashboard', 'roles', 'Roles', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(164, 1, 'en', 'dashboard', 'permissions', 'Permissions', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(165, 1, 'en', 'dashboard', 'file_manager', 'File Manager', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(166, 1, 'en', 'dashboard', 'account_settings', 'Account Settings', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(167, 1, 'en', 'dashboard', 'user_profile', 'User Profile', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(168, 1, 'en', 'dashboard', 'general_settings', 'General Settings', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(169, 1, 'en', 'dashboard', 'profile', 'Profile', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(170, 1, 'en', 'dashboard', 'log_out', 'Log out', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(171, 1, 'en', 'general_settings', 'menu_title', 'General Settings', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(172, 1, 'en', 'general_settings', 'module_title', 'Manage General Settings', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(173, 1, 'en', 'general_settings', 'module_form_title', 'General Settings', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(174, 1, 'en', 'general_settings', 'arabic', 'Arabic', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(175, 1, 'en', 'general_settings', 'english', 'English', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(176, 1, 'en', 'general_settings', 'registration', 'Registration', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(177, 1, 'en', 'general_settings', 'crud_builder', 'Crud Builder', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(178, 1, 'en', 'general_settings', 'file_manager', 'File Mangager', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(179, 1, 'en', 'general_settings', 'direction', 'Direction', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(180, 1, 'en', 'general_settings', 'language', 'Language', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(181, 1, 'en', 'general_settings', 'hide', 'hide', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(182, 1, 'en', 'general_settings', 'show', 'show', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(183, 1, 'en', 'general_settings', 'ltr', 'LTR', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(184, 1, 'en', 'general_settings', 'rtl', 'RTL', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(185, 1, 'en', 'general_settings', 'enable', 'Enable', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(186, 1, 'en', 'general_settings', 'disable', 'Disable', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(187, 1, 'en', 'general_settings', 'cancel', 'Cancel', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(188, 1, 'en', 'general_settings', 'submit', 'Submit', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(189, 1, 'en', 'menu', 'menu_title', 'Menu', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(190, 1, 'en', 'menu', 'module_title', 'Manage Crud Menu Items', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(191, 1, 'en', 'menu', 'module_subtitle', 'Menu', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(192, 1, 'en', 'menu', 'module_add_new', 'Add New Parent Menu Item', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(193, 1, 'en', 'modules', 'menu_title', 'Modules', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(194, 1, 'en', 'modules', 'module_add_new', 'Add New Module', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(195, 1, 'en', 'modules', 'module_add_new_field', 'Add New Field', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(196, 1, 'en', 'modules', 'module_generate_module', 'Generate Module', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(197, 1, 'en', 'pagination', 'previous', '&laquo; Previous', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(198, 1, 'en', 'pagination', 'next', 'Next &raquo;', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(199, 1, 'en', 'passwords', 'reset', 'Your password has been reset!', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(200, 1, 'en', 'passwords', 'sent', 'We have emailed your password reset link!', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(201, 1, 'en', 'passwords', 'throttled', 'Please wait before retrying.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(202, 1, 'en', 'passwords', 'token', 'This password reset token is invalid.', '2020-09-28 05:04:30', '2020-09-28 05:04:30'),
(203, 1, 'en', 'passwords', 'user', 'We can\'t find a user with that email address.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(204, 1, 'en', 'permissions', 'menu_title', 'Permissions', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(205, 1, 'en', 'permissions', 'module_subtitle', 'Manage Permissions', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(206, 1, 'en', 'permissions', 'module_add_new', 'Add New Permission', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(207, 1, 'en', 'roles', 'menu_title', 'Roles', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(208, 1, 'en', 'roles', 'module_subtitle', 'Manage Roles', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(209, 1, 'en', 'roles', 'module_add_new', 'Add New Role', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(210, 1, 'en', 'translations', 'menu_title', 'Translation Manager', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(211, 1, 'en', 'translations', 'module_title', 'Manage Translations', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(212, 1, 'en', 'user_profile', 'menu_title', 'User Profile', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(213, 1, 'en', 'user_profile', 'module_title', 'Manage Your Profile', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(214, 1, 'en', 'user_profile', 'module_form_title', 'User Profile', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(215, 1, 'en', 'user_profile', 'name', 'Name', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(216, 1, 'en', 'user_profile', 'email', 'E-mail', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(217, 1, 'en', 'user_profile', 'password', 'Password', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(218, 1, 'en', 'user_profile', 'profile_picture', 'Profile Picture', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(219, 1, 'en', 'user_profile', 'cancel', 'Cancel', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(220, 1, 'en', 'user_profile', 'submit', 'Submit', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(221, 1, 'en', 'users', 'menu_title', 'Users', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(222, 1, 'en', 'users', 'module_title', 'Manage Users', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(223, 1, 'en', 'users', 'module_subtitle', 'Users\'s List', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(224, 1, 'en', 'users', 'module_add_new', 'Add New User', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(225, 1, 'en', 'users', 'module_name', 'Module Name ', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(226, 1, 'en', 'users', 'module_add_new_field', 'Add New Field', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(227, 1, 'en', 'users', 'module_generate_module', 'Generate Module', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(228, 1, 'en', 'validation', 'accepted', 'The :attribute must be accepted.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(229, 1, 'en', 'validation', 'active_url', 'The :attribute is not a valid URL.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(230, 1, 'en', 'validation', 'after', 'The :attribute must be a date after :date.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(231, 1, 'en', 'validation', 'after_or_equal', 'The :attribute must be a date after or equal to :date.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(232, 1, 'en', 'validation', 'alpha', 'The :attribute may only contain letters.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(233, 1, 'en', 'validation', 'alpha_dash', 'The :attribute may only contain letters, numbers, dashes and underscores.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(234, 1, 'en', 'validation', 'alpha_num', 'The :attribute may only contain letters and numbers.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(235, 1, 'en', 'validation', 'array', 'The :attribute must be an array.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(236, 1, 'en', 'validation', 'before', 'The :attribute must be a date before :date.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(237, 1, 'en', 'validation', 'before_or_equal', 'The :attribute must be a date before or equal to :date.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(238, 1, 'en', 'validation', 'between.numeric', 'The :attribute must be between :min and :max.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(239, 1, 'en', 'validation', 'between.file', 'The :attribute must be between :min and :max kilobytes.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(240, 1, 'en', 'validation', 'between.string', 'The :attribute must be between :min and :max characters.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(241, 1, 'en', 'validation', 'between.array', 'The :attribute must have between :min and :max items.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(242, 1, 'en', 'validation', 'boolean', 'The :attribute field must be true or false.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(243, 1, 'en', 'validation', 'confirmed', 'The :attribute confirmation does not match.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(244, 1, 'en', 'validation', 'date', 'The :attribute is not a valid date.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(245, 1, 'en', 'validation', 'date_equals', 'The :attribute must be a date equal to :date.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(246, 1, 'en', 'validation', 'date_format', 'The :attribute does not match the format :format.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(247, 1, 'en', 'validation', 'different', 'The :attribute and :other must be different.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(248, 1, 'en', 'validation', 'digits', 'The :attribute must be :digits digits.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(249, 1, 'en', 'validation', 'digits_between', 'The :attribute must be between :min and :max digits.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(250, 1, 'en', 'validation', 'dimensions', 'The :attribute has invalid image dimensions.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(251, 1, 'en', 'validation', 'distinct', 'The :attribute field has a duplicate value.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(252, 1, 'en', 'validation', 'email', 'The :attribute must be a valid email address.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(253, 1, 'en', 'validation', 'ends_with', 'The :attribute must end with one of the following: :values.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(254, 1, 'en', 'validation', 'exists', 'The selected :attribute is invalid.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(255, 1, 'en', 'validation', 'file', 'The :attribute must be a file.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(256, 1, 'en', 'validation', 'filled', 'The :attribute field must have a value.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(257, 1, 'en', 'validation', 'gt.numeric', 'The :attribute must be greater than :value.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(258, 1, 'en', 'validation', 'gt.file', 'The :attribute must be greater than :value kilobytes.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(259, 1, 'en', 'validation', 'gt.string', 'The :attribute must be greater than :value characters.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(260, 1, 'en', 'validation', 'gt.array', 'The :attribute must have more than :value items.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(261, 1, 'en', 'validation', 'gte.numeric', 'The :attribute must be greater than or equal :value.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(262, 1, 'en', 'validation', 'gte.file', 'The :attribute must be greater than or equal :value kilobytes.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(263, 1, 'en', 'validation', 'gte.string', 'The :attribute must be greater than or equal :value characters.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(264, 1, 'en', 'validation', 'gte.array', 'The :attribute must have :value items or more.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(265, 1, 'en', 'validation', 'image', 'The :attribute must be an image.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(266, 1, 'en', 'validation', 'in', 'The selected :attribute is invalid.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(267, 1, 'en', 'validation', 'in_array', 'The :attribute field does not exist in :other.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(268, 1, 'en', 'validation', 'integer', 'The :attribute must be an integer.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(269, 1, 'en', 'validation', 'ip', 'The :attribute must be a valid IP address.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(270, 1, 'en', 'validation', 'ipv4', 'The :attribute must be a valid IPv4 address.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(271, 1, 'en', 'validation', 'ipv6', 'The :attribute must be a valid IPv6 address.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(272, 1, 'en', 'validation', 'json', 'The :attribute must be a valid JSON string.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(273, 1, 'en', 'validation', 'lt.numeric', 'The :attribute must be less than :value.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(274, 1, 'en', 'validation', 'lt.file', 'The :attribute must be less than :value kilobytes.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(275, 1, 'en', 'validation', 'lt.string', 'The :attribute must be less than :value characters.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(276, 1, 'en', 'validation', 'lt.array', 'The :attribute must have less than :value items.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(277, 1, 'en', 'validation', 'lte.numeric', 'The :attribute must be less than or equal :value.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(278, 1, 'en', 'validation', 'lte.file', 'The :attribute must be less than or equal :value kilobytes.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(279, 1, 'en', 'validation', 'lte.string', 'The :attribute must be less than or equal :value characters.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(280, 1, 'en', 'validation', 'lte.array', 'The :attribute must not have more than :value items.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(281, 1, 'en', 'validation', 'max.numeric', 'The :attribute may not be greater than :max.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(282, 1, 'en', 'validation', 'max.file', 'The :attribute may not be greater than :max kilobytes.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(283, 1, 'en', 'validation', 'max.string', 'The :attribute may not be greater than :max characters.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(284, 1, 'en', 'validation', 'max.array', 'The :attribute may not have more than :max items.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(285, 1, 'en', 'validation', 'mimes', 'The :attribute must be a file of type: :values.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(286, 1, 'en', 'validation', 'mimetypes', 'The :attribute must be a file of type: :values.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(287, 1, 'en', 'validation', 'min.numeric', 'The :attribute must be at least :min.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(288, 1, 'en', 'validation', 'min.file', 'The :attribute must be at least :min kilobytes.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(289, 1, 'en', 'validation', 'min.string', 'The :attribute must be at least :min characters.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(290, 1, 'en', 'validation', 'min.array', 'The :attribute must have at least :min items.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(291, 1, 'en', 'validation', 'not_in', 'The selected :attribute is invalid.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(292, 1, 'en', 'validation', 'not_regex', 'The :attribute format is invalid.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(293, 1, 'en', 'validation', 'numeric', 'The :attribute must be a number.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(294, 1, 'en', 'validation', 'password', 'The password is incorrect.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(295, 1, 'en', 'validation', 'present', 'The :attribute field must be present.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(296, 1, 'en', 'validation', 'regex', 'The :attribute format is invalid.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(297, 1, 'en', 'validation', 'required', 'The :attribute field is required.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(298, 1, 'en', 'validation', 'required_if', 'The :attribute field is required when :other is :value.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(299, 1, 'en', 'validation', 'required_unless', 'The :attribute field is required unless :other is in :values.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(300, 1, 'en', 'validation', 'required_with', 'The :attribute field is required when :values is present.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(301, 1, 'en', 'validation', 'required_with_all', 'The :attribute field is required when :values are present.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(302, 1, 'en', 'validation', 'required_without', 'The :attribute field is required when :values is not present.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(303, 1, 'en', 'validation', 'required_without_all', 'The :attribute field is required when none of :values are present.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(304, 1, 'en', 'validation', 'same', 'The :attribute and :other must match.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(305, 1, 'en', 'validation', 'size.numeric', 'The :attribute must be :size.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(306, 1, 'en', 'validation', 'size.file', 'The :attribute must be :size kilobytes.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(307, 1, 'en', 'validation', 'size.string', 'The :attribute must be :size characters.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(308, 1, 'en', 'validation', 'size.array', 'The :attribute must contain :size items.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(309, 1, 'en', 'validation', 'starts_with', 'The :attribute must start with one of the following: :values.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(310, 1, 'en', 'validation', 'string', 'The :attribute must be a string.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(311, 1, 'en', 'validation', 'timezone', 'The :attribute must be a valid zone.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(312, 1, 'en', 'validation', 'unique', 'The :attribute has already been taken.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(313, 1, 'en', 'validation', 'uploaded', 'The :attribute failed to upload.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(314, 1, 'en', 'validation', 'url', 'The :attribute format is invalid.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(315, 1, 'en', 'validation', 'uuid', 'The :attribute must be a valid UUID.', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(316, 1, 'en', 'validation', 'custom.attribute-name.rule-name', 'custom-message', '2020-09-28 05:04:31', '2020-09-28 05:04:31'),
(317, 1, 'en', 'validation', 'recaptcha', 'The :attribute field is not correct.', '2020-09-28 05:04:31', '2020-09-28 05:04:31');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fa-cube',
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'module',
  `parent` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `hierarchy` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `module_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `permission_name`, `url`, `icon`, `type`, `parent`, `hierarchy`, `module_id`, `created_at`, `updated_at`) VALUES
(1, 'Blog_categories', 'Blog_categories', 'Blog_categoriesIndex', 'fa-file-text', 'module', 3, 1, 2, '2021-01-22 18:28:40', '2021-02-08 17:59:16'),
(2, 'Blog', 'Blog', 'BlogIndex', 'fa-book', 'module', 3, 2, 1, '2021-01-28 18:14:00', '2021-02-08 17:59:16'),
(3, 'Blog', NULL, '#', 'fa-book', 'menuItem', 0, 1, 0, '2021-02-08 17:59:01', '2021-02-08 17:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_04_02_193005_create_translations_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2016_07_07_134058_create_menus_table', 1),
(5, '2017_03_29_045848_fields', 1),
(6, '2017_03_31_112807_modules', 1),
(7, '2017_03_31_112949_module_fields', 1),
(8, '2018_07_16_112554_entrust_setup_tables', 1),
(9, '2018_07_16_115326_settings_table', 1),
(10, '2019_05_17_145014_create_api_documentation_table', 1),
(11, '2019_07_11_000530_Widgets', 1),
(12, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2019_10_06_103819_Invoices', 1),
(14, '2019_11_02_114930_Invoicedetails', 1),
(15, '2021_01_22_112840_Blog_categories', 1),
(16, '2021_01_28_111400_Blog', 1),
(17, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(18, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(19, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(20, '2016_06_01_000004_create_oauth_clients_table', 2),
(21, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `module_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_table_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `module_fields`
--

CREATE TABLE `module_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `field_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_type` int(11) NOT NULL,
  `field_length` int(11) NOT NULL DEFAULT '0',
  `field_options` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `related_table` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `related_table_field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `related_table_field_display` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validation_rules` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_in_list` tinyint(4) NOT NULL,
  `module_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('9771eb5e7f2cce7dfde480e2c91d438592daa1bddce5dd94167460a4ec827d2ef853f151a06489fa', 1, 1, 'appbuilder_token', '[]', 0, '2021-02-22 04:35:31', '2021-02-22 04:35:31', '2022-02-21 21:35:31'),
('6428b9056941abed5b807b641ebac734bedd3f79682020487c61b896475fb74a6610e733d9cf2e97', 1, 1, 'appbuilder_token', '[]', 0, '2021-02-26 20:33:33', '2021-02-26 20:33:33', '2022-02-26 13:33:33');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'App Builder Personal Access Client', 'dahmpa4sf3KvFxq1Wwg5ioKHfPBRG31RbGNIVaws', 'http://localhost', 1, 0, 0, '2021-02-22 04:35:24', '2021-02-22 04:35:24'),
(2, NULL, 'App Builder Password Grant Client', 'uk4DaWZ4nQ9cgf0L9eSvin6AGQbERlQn0X96Gtio', 'http://localhost', 0, 1, 0, '2021-02-22 04:35:24', '2021-02-22 04:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-02-22 04:35:24', '2021-02-22 04:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'modulebuilder_menu', 'CRUD / Menu', 'Display Menu of Module Builder', NULL, NULL),
(2, 'modulebuilder_modules', 'CRUD / Modules', 'Display All Modules of Module Builder', NULL, NULL),
(3, 'user_all', 'Users List', 'Display Users List', NULL, NULL),
(4, 'user_edit', 'Edit user data', 'View user data to edit it', NULL, NULL),
(5, 'user_create_update', 'Create User/Update User', 'Create User/Update User', NULL, NULL),
(6, 'user_delete', 'Delete user', 'Delete user', NULL, NULL),
(7, 'user_delete_muliple', 'Delete Multiple user', 'Delete Multiple user', NULL, NULL),
(8, 'user_profile', 'User profile view', 'User profile view', NULL, NULL),
(9, 'user_profile_update', 'Update user profile', 'Update user profile', NULL, NULL),
(10, 'filemanager', 'File Manager', 'File Manager', NULL, NULL),
(11, 'roles_all', 'Roles List', 'Roles List', NULL, NULL),
(12, 'roles_edit', 'Role Edit', 'Role Edit', NULL, NULL),
(13, 'roles_create_update', 'Create Role /Update Role', 'Create Role /Update Role', NULL, NULL),
(14, 'roles_delete', 'Delete Role', 'Delete Roles', NULL, NULL),
(15, 'roles_delete_multiple', 'Delete Multiple Roles', 'Delete Multiple Roles', NULL, NULL),
(16, 'permissions_all', 'Permissions List', 'Permissions List', NULL, NULL),
(17, 'permissions_edit', 'Permissions Edit', 'Permissions Edit', NULL, NULL),
(18, 'permissions_create_update', 'Create Permission /Update Permission', 'Create Permission /Update Permission', NULL, NULL),
(19, 'permissions_delete', 'Delete Permission', 'Delete Permission', NULL, NULL),
(20, 'permissions_delete_multiple', 'Delete Multiple Permission', 'Delete Multiple Permission', NULL, NULL),
(21, 'general_settings_all', 'General settings list', 'General settings list', NULL, NULL),
(22, 'general_settings_create_update', 'Update general settings', 'Update general settings', NULL, NULL),
(23, 'translation-manager', 'Translation Manager', 'Display Translation Manager', NULL, NULL),
(24, 'Widgets', 'Widgets Manager', 'Display Widgets Manager', NULL, NULL),
(25, 'Invoices', 'Invoices Module', 'Invoices Module', NULL, NULL),
(26, 'Blog', 'Blog Module', 'Blog Module', NULL, NULL),
(27, 'Blog_categories', 'Blog Categories', 'Blog Categories', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Super-Admin', 'Super Admin', 'Super Admin', NULL, NULL),
(2, 'Admin', 'Admin Role', 'This is Admin Role', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Settings`
--

CREATE TABLE `Settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `registration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `crudbuilder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filemanager` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Settings`
--

INSERT INTO `Settings` (`id`, `registration`, `crudbuilder`, `filemanager`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ramy Ramadan', 'admin@admin.com', NULL, '$2y$10$P.LTA0jeUOG1epZyRrToLOE/W3DVktnTh75b6jsXPkhCf4ifTBmoO', 'img.jpg', NULL, '2021-02-22 04:35:24', '2021-02-22 04:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `Widgets`
--

CREATE TABLE `Widgets` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_id` int(11) NOT NULL,
  `table` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tablefield` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_documentation`
--
ALTER TABLE `api_documentation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Blog`
--
ALTER TABLE `Blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Blog_categories`
--
ALTER TABLE `Blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Invoicedetails`
--
ALTER TABLE `Invoicedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Invoices`
--
ALTER TABLE `Invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ltm_translations`
--
ALTER TABLE `ltm_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_fields`
--
ALTER TABLE `module_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `Settings`
--
ALTER TABLE `Settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `Widgets`
--
ALTER TABLE `Widgets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_documentation`
--
ALTER TABLE `api_documentation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `Blog`
--
ALTER TABLE `Blog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Blog_categories`
--
ALTER TABLE `Blog_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Invoicedetails`
--
ALTER TABLE `Invoicedetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Invoices`
--
ALTER TABLE `Invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ltm_translations`
--
ALTER TABLE `ltm_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=318;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `module_fields`
--
ALTER TABLE `module_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Settings`
--
ALTER TABLE `Settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Widgets`
--
ALTER TABLE `Widgets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
