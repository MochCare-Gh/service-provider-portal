-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 02, 2022 at 09:56 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `afrohwno_mochcare_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `Antenatalrecords`
--

CREATE TABLE `Antenatalrecords` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urine` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gest_age` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fundal_heights` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `presentation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fetal_heart_rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifa_supply_days` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complaints` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff` int(11) NOT NULL,
  `mo_reg_no` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Antenatalrecords`
--

INSERT INTO `Antenatalrecords` (`id`, `date`, `weight`, `bp`, `urine`, `gest_age`, `fundal_heights`, `presentation`, `descent`, `fetal_heart_rate`, `ifa_supply_days`, `complaints`, `staff`, `mo_reg_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2022-06-06', '75', '125/80', '1', '32', '5', 'Normal', 'Non', '80', '30', 'Mother Looks good', 1, 1, '2022-08-11 21:46:30', '2022-08-11 21:46:30', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api_documentation`
--

INSERT INTO `api_documentation` (`id`, `method_type`, `url`, `parameters`, `description`, `created_at`, `updated_at`) VALUES
(1, '[\"POST\"]', 'api/login', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(2, '[\"POST\"]', 'api/register', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(3, '[\"GET\",\"HEAD\"]', 'api/Invoicedetails/list', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(4, '[\"POST\"]', 'api/Invoicedetails/create_or_update', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(5, '[\"GET\",\"HEAD\"]', 'api/Invoicedetails/edit/{id}', '[\"{id}\"]', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(6, '[\"POST\"]', 'api/Invoicedetails/update/{id}', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(7, '[\"DELETE\"]', 'api/Invoicedetails/delete/{id}', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(8, '[\"DELETE\"]', 'api/Invoicedetails/delete_multiple', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(9, '[\"GET\",\"HEAD\"]', 'api/Invoices/list', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(10, '[\"POST\"]', 'api/Invoices/create_or_update', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(11, '[\"GET\",\"HEAD\"]', 'api/Invoices/edit/{id}', '[\"{id}\"]', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(12, '[\"POST\"]', 'api/Invoices/update/{id}', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(13, '[\"DELETE\"]', 'api/Invoices/delete/{id}', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(14, '[\"DELETE\"]', 'api/Invoices/delete_multiple', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(15, '[\"GET\",\"HEAD\"]', 'api/modules/{module_id}/Widgets', '[\"{module_id}\"]', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(16, '[\"POST\"]', 'api/modules/Widgets/create_or_update', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(17, '[\"GET\",\"HEAD\"]', 'api/modules/Widgets/edit/{id}', '[\"{id}\"]', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(18, '[\"POST\"]', 'api/modules/Widgets/update/{id}', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(19, '[\"DELETE\"]', 'api/modules/Widgets/delete/{id}', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(20, '[\"DELETE\"]', 'api/modules/Widgets/delete_multiple', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(21, '[\"GET\",\"HEAD\"]', 'api/users/getroles', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(22, '[\"GET\",\"HEAD\"]', 'api/roles/edit/{id}', '[\"{id}\"]', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(23, '[\"POST\"]', 'api/roles/createorupdate', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(24, '[\"GET\",\"HEAD\"]', 'api/roles/delete/{id}', '[\"{id}\"]', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(25, '[\"DELETE\"]', 'api/roles/deletemultiple', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(26, '[\"GET\",\"HEAD\"]', 'api/users/getpermissions', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(27, '[\"GET\",\"HEAD\"]', 'api/permissions/edit/{id}', '[\"{id}\"]', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(28, '[\"POST\"]', 'api/permissions/createorupdate', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(29, '[\"GET\",\"HEAD\"]', 'api/permissions/delete/{id}', '[\"{id}\"]', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(30, '[\"DELETE\"]', 'api/permissions/deletemultiple', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(31, '[\"POST\"]', 'api/modulebuilder/saveMenuSorting', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(32, '[\"POST\"]', 'api/modulebuilder/menuscreateorupdate', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(33, '[\"GET\",\"HEAD\"]', 'api/modulebuilder/menudelete/{id}', '[\"{id}\"]', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(34, '[\"GET\",\"HEAD\"]', 'api/modulebuilder/modulebuilderindex', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(35, '[\"GET\",\"HEAD\"]', 'api/modulebuilder/builder', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(36, '[\"GET\",\"HEAD\"]', 'api/modules', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(37, '[\"GET\",\"HEAD\"]', 'api/modules/list', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(38, '[\"GET\",\"HEAD\"]', 'api/modules/edit/{id}', '[\"{id}\"]', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(39, '[\"GET\",\"HEAD\"]', 'api/modules/delete/{id}', '[\"{id}\"]', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(40, '[\"POST\"]', 'api/modules/CreateUpdate', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(41, '[\"GET\",\"HEAD\"]', 'api/modules/{id}', '[\"{id}\"]', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(42, '[\"GET\",\"HEAD\"]', 'api/modules/fields/{module_id}', '[\"{module_id}\"]', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(43, '[\"POST\"]', 'api/modules/fields/CreateUpdate', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(44, '[\"GET\",\"HEAD\"]', 'api/modules/fields/delete/{id}', '[\"{id}\"]', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(45, '[\"GET\",\"HEAD\"]', 'api/modules/fields/edit/{id}', '[\"{id}\"]', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(46, '[\"GET\",\"HEAD\"]', 'api/modulebuilder/generateview', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(47, '[\"GET\",\"POST\",\"HEAD\"]', 'api/modulebuilder/generate/{id}', '[\"{id}\"]', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(48, '[\"GET\",\"HEAD\"]', 'api/modulebuilder/deletemodule', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(49, '[\"GET\",\"HEAD\"]', 'api/modulebuilder/getTableNames', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(50, '[\"DELETE\"]', 'api/modulebuilder/deletemultiplemodules', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(51, '[\"DELETE\"]', 'api/modules/fields/multipledelete', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(52, '[\"GET\",\"HEAD\"]', 'api/users/list', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(53, '[\"GET\",\"HEAD\"]', 'api/users/edit/{id}', '[\"{id}\"]', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(54, '[\"POST\"]', 'api/users/createorupdate', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(55, '[\"GET\",\"HEAD\"]', 'api/users/delete/{id}', '[\"{id}\"]', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(56, '[\"DELETE\"]', 'api/users/delete_multiple', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(57, '[\"GET\",\"HEAD\"]', 'api/users/profile', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(58, '[\"POST\"]', 'api/users/profileUpdate', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(59, '[\"GET\",\"HEAD\"]', 'api/password/reset', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(60, '[\"POST\"]', 'api/password/email', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(61, '[\"GET\",\"HEAD\"]', 'api/password/reset/{token}', '[\"{token}\"]', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(62, '[\"POST\"]', 'api/password/reset', '{}', '', '2020-10-18 08:47:03', '2020-10-18 08:47:03'),
(90, 'GET', 'api/Facility/', '[]', '', '2022-06-24 16:26:19', '2022-06-24 16:26:19'),
(91, 'GET', 'api/Facility/list', '[]', '', '2022-06-24 16:26:19', '2022-06-24 16:26:19'),
(92, 'POST', 'api/Facility/create_or_update', '[]', '', '2022-06-24 16:26:19', '2022-06-24 16:26:19'),
(93, 'GET', 'api/Facility/add', '[]', '', '2022-06-24 16:26:19', '2022-06-24 16:26:19'),
(94, 'GET', 'api/Facility/edit/{id}', '[\"id\"]', '', '2022-06-24 16:26:19', '2022-06-24 16:26:19'),
(95, 'GET', 'api/Facility/view/{id}', '[\"id\"]', '', '2022-06-24 16:26:19', '2022-06-24 16:26:19'),
(96, 'POST', 'api/Facility/update/{id}', '[\"id\"]', '', '2022-06-24 16:26:19', '2022-06-24 16:26:19'),
(97, 'GET', 'api/Facility/delete/{id}', '[\"id\"]', '', '2022-06-24 16:26:19', '2022-06-24 16:26:19'),
(98, 'DELETE', 'api/Facility/delete_multiple', '[]', '', '2022-06-24 16:26:19', '2022-06-24 16:26:19'),
(99, 'GET', 'api/Category/', '[]', '', '2022-06-24 16:27:44', '2022-06-24 16:27:44'),
(100, 'GET', 'api/Category/list', '[]', '', '2022-06-24 16:27:44', '2022-06-24 16:27:44'),
(101, 'POST', 'api/Category/create_or_update', '[]', '', '2022-06-24 16:27:44', '2022-06-24 16:27:44'),
(102, 'GET', 'api/Category/add', '[]', '', '2022-06-24 16:27:44', '2022-06-24 16:27:44'),
(103, 'GET', 'api/Category/edit/{id}', '[\"id\"]', '', '2022-06-24 16:27:44', '2022-06-24 16:27:44'),
(104, 'GET', 'api/Category/view/{id}', '[\"id\"]', '', '2022-06-24 16:27:44', '2022-06-24 16:27:44'),
(105, 'POST', 'api/Category/update/{id}', '[\"id\"]', '', '2022-06-24 16:27:44', '2022-06-24 16:27:44'),
(106, 'GET', 'api/Category/delete/{id}', '[\"id\"]', '', '2022-06-24 16:27:44', '2022-06-24 16:27:44'),
(107, 'DELETE', 'api/Category/delete_multiple', '[]', '', '2022-06-24 16:27:44', '2022-06-24 16:27:44'),
(108, 'GET', 'api/Personnels/', '[]', '', '2022-06-24 16:32:58', '2022-06-24 16:32:58'),
(109, 'GET', 'api/Personnels/list', '[]', '', '2022-06-24 16:32:58', '2022-06-24 16:32:58'),
(110, 'POST', 'api/Personnels/create_or_update', '[]', '', '2022-06-24 16:32:58', '2022-06-24 16:32:58'),
(111, 'GET', 'api/Personnels/add', '[]', '', '2022-06-24 16:32:58', '2022-06-24 16:32:58'),
(112, 'GET', 'api/Personnels/edit/{id}', '[\"id\"]', '', '2022-06-24 16:32:58', '2022-06-24 16:32:58'),
(113, 'GET', 'api/Personnels/view/{id}', '[\"id\"]', '', '2022-06-24 16:32:58', '2022-06-24 16:32:58'),
(114, 'POST', 'api/Personnels/update/{id}', '[\"id\"]', '', '2022-06-24 16:32:58', '2022-06-24 16:32:58'),
(115, 'GET', 'api/Personnels/delete/{id}', '[\"id\"]', '', '2022-06-24 16:32:58', '2022-06-24 16:32:58'),
(116, 'DELETE', 'api/Personnels/delete_multiple', '[]', '', '2022-06-24 16:32:58', '2022-06-24 16:32:58'),
(117, 'GET', 'api/Region/', '[]', '', '2022-06-24 16:34:13', '2022-06-24 16:34:13'),
(118, 'GET', 'api/Region/list', '[]', '', '2022-06-24 16:34:13', '2022-06-24 16:34:13'),
(119, 'POST', 'api/Region/create_or_update', '[]', '', '2022-06-24 16:34:13', '2022-06-24 16:34:13'),
(120, 'GET', 'api/Region/add', '[]', '', '2022-06-24 16:34:13', '2022-06-24 16:34:13'),
(121, 'GET', 'api/Region/edit/{id}', '[\"id\"]', '', '2022-06-24 16:34:13', '2022-06-24 16:34:13'),
(122, 'GET', 'api/Region/view/{id}', '[\"id\"]', '', '2022-06-24 16:34:13', '2022-06-24 16:34:13'),
(123, 'POST', 'api/Region/update/{id}', '[\"id\"]', '', '2022-06-24 16:34:13', '2022-06-24 16:34:13'),
(124, 'GET', 'api/Region/delete/{id}', '[\"id\"]', '', '2022-06-24 16:34:13', '2022-06-24 16:34:13'),
(125, 'DELETE', 'api/Region/delete_multiple', '[]', '', '2022-06-24 16:34:13', '2022-06-24 16:34:13'),
(126, 'GET', 'api/Districts/', '[]', '', '2022-06-24 16:35:12', '2022-06-24 16:35:12'),
(127, 'GET', 'api/Districts/list', '[]', '', '2022-06-24 16:35:12', '2022-06-24 16:35:12'),
(128, 'POST', 'api/Districts/create_or_update', '[]', '', '2022-06-24 16:35:12', '2022-06-24 16:35:12'),
(129, 'GET', 'api/Districts/add', '[]', '', '2022-06-24 16:35:12', '2022-06-24 16:35:12'),
(130, 'GET', 'api/Districts/edit/{id}', '[\"id\"]', '', '2022-06-24 16:35:12', '2022-06-24 16:35:12'),
(131, 'GET', 'api/Districts/view/{id}', '[\"id\"]', '', '2022-06-24 16:35:12', '2022-06-24 16:35:12'),
(132, 'POST', 'api/Districts/update/{id}', '[\"id\"]', '', '2022-06-24 16:35:12', '2022-06-24 16:35:12'),
(133, 'GET', 'api/Districts/delete/{id}', '[\"id\"]', '', '2022-06-24 16:35:12', '2022-06-24 16:35:12'),
(134, 'DELETE', 'api/Districts/delete_multiple', '[]', '', '2022-06-24 16:35:12', '2022-06-24 16:35:12'),
(135, 'GET', 'api/Healthfacility/', '[]', '', '2022-06-24 16:44:55', '2022-06-24 16:44:55'),
(136, 'GET', 'api/Healthfacility/list', '[]', '', '2022-06-24 16:44:55', '2022-06-24 16:44:55'),
(137, 'POST', 'api/Healthfacility/create_or_update', '[]', '', '2022-06-24 16:44:55', '2022-06-24 16:44:55'),
(138, 'GET', 'api/Healthfacility/add', '[]', '', '2022-06-24 16:44:55', '2022-06-24 16:44:55'),
(139, 'GET', 'api/Healthfacility/edit/{id}', '[\"id\"]', '', '2022-06-24 16:44:55', '2022-06-24 16:44:55'),
(140, 'GET', 'api/Healthfacility/view/{id}', '[\"id\"]', '', '2022-06-24 16:44:55', '2022-06-24 16:44:55'),
(141, 'POST', 'api/Healthfacility/update/{id}', '[\"id\"]', '', '2022-06-24 16:44:55', '2022-06-24 16:44:55'),
(142, 'GET', 'api/Healthfacility/delete/{id}', '[\"id\"]', '', '2022-06-24 16:44:55', '2022-06-24 16:44:55'),
(143, 'DELETE', 'api/Healthfacility/delete_multiple', '[]', '', '2022-06-24 16:44:55', '2022-06-24 16:44:55'),
(153, 'GET', 'api/Staff/', '[]', '', '2022-06-24 17:07:43', '2022-06-24 17:07:43'),
(154, 'GET', 'api/Staff/list', '[]', '', '2022-06-24 17:07:43', '2022-06-24 17:07:43'),
(155, 'POST', 'api/Staff/create_or_update', '[]', '', '2022-06-24 17:07:43', '2022-06-24 17:07:43'),
(156, 'GET', 'api/Staff/add', '[]', '', '2022-06-24 17:07:43', '2022-06-24 17:07:43'),
(157, 'GET', 'api/Staff/edit/{id}', '[\"id\"]', '', '2022-06-24 17:07:43', '2022-06-24 17:07:43'),
(158, 'GET', 'api/Staff/view/{id}', '[\"id\"]', '', '2022-06-24 17:07:43', '2022-06-24 17:07:43'),
(159, 'POST', 'api/Staff/update/{id}', '[\"id\"]', '', '2022-06-24 17:07:43', '2022-06-24 17:07:43'),
(160, 'GET', 'api/Staff/delete/{id}', '[\"id\"]', '', '2022-06-24 17:07:43', '2022-06-24 17:07:43'),
(161, 'DELETE', 'api/Staff/delete_multiple', '[]', '', '2022-06-24 17:07:43', '2022-06-24 17:07:43'),
(234, 'GET', 'api/Deliveryoutcome/', '[]', '', '2022-06-25 10:28:07', '2022-06-25 10:28:07'),
(235, 'GET', 'api/Deliveryoutcome/list', '[]', '', '2022-06-25 10:28:07', '2022-06-25 10:28:07'),
(236, 'POST', 'api/Deliveryoutcome/create_or_update', '[]', '', '2022-06-25 10:28:07', '2022-06-25 10:28:07'),
(237, 'GET', 'api/Deliveryoutcome/add', '[]', '', '2022-06-25 10:28:07', '2022-06-25 10:28:07'),
(238, 'GET', 'api/Deliveryoutcome/edit/{id}', '[\"id\"]', '', '2022-06-25 10:28:07', '2022-06-25 10:28:07'),
(239, 'GET', 'api/Deliveryoutcome/view/{id}', '[\"id\"]', '', '2022-06-25 10:28:07', '2022-06-25 10:28:07'),
(240, 'POST', 'api/Deliveryoutcome/update/{id}', '[\"id\"]', '', '2022-06-25 10:28:07', '2022-06-25 10:28:07'),
(241, 'GET', 'api/Deliveryoutcome/delete/{id}', '[\"id\"]', '', '2022-06-25 10:28:07', '2022-06-25 10:28:07'),
(242, 'DELETE', 'api/Deliveryoutcome/delete_multiple', '[]', '', '2022-06-25 10:28:07', '2022-06-25 10:28:07'),
(243, 'GET', 'api/Postnatalrecords/', '[]', '', '2022-06-25 15:31:43', '2022-06-25 15:31:43'),
(244, 'GET', 'api/Postnatalrecords/list', '[]', '', '2022-06-25 15:31:43', '2022-06-25 15:31:43'),
(245, 'POST', 'api/Postnatalrecords/create_or_update', '[]', '', '2022-06-25 15:31:43', '2022-06-25 15:31:43'),
(246, 'GET', 'api/Postnatalrecords/add', '[]', '', '2022-06-25 15:31:43', '2022-06-25 15:31:43'),
(247, 'GET', 'api/Postnatalrecords/edit/{id}', '[\"id\"]', '', '2022-06-25 15:31:43', '2022-06-25 15:31:43'),
(248, 'GET', 'api/Postnatalrecords/view/{id}', '[\"id\"]', '', '2022-06-25 15:31:43', '2022-06-25 15:31:43'),
(249, 'POST', 'api/Postnatalrecords/update/{id}', '[\"id\"]', '', '2022-06-25 15:31:43', '2022-06-25 15:31:43'),
(250, 'GET', 'api/Postnatalrecords/delete/{id}', '[\"id\"]', '', '2022-06-25 15:31:43', '2022-06-25 15:31:43'),
(251, 'DELETE', 'api/Postnatalrecords/delete_multiple', '[]', '', '2022-06-25 15:31:43', '2022-06-25 15:31:43'),
(261, 'GET', 'api/Childgrowth/', '[]', '', '2022-06-25 16:25:32', '2022-06-25 16:25:32'),
(262, 'GET', 'api/Childgrowth/list', '[]', '', '2022-06-25 16:25:32', '2022-06-25 16:25:32'),
(263, 'POST', 'api/Childgrowth/create_or_update', '[]', '', '2022-06-25 16:25:32', '2022-06-25 16:25:32'),
(264, 'GET', 'api/Childgrowth/add', '[]', '', '2022-06-25 16:25:32', '2022-06-25 16:25:32'),
(265, 'GET', 'api/Childgrowth/edit/{id}', '[\"id\"]', '', '2022-06-25 16:25:32', '2022-06-25 16:25:32'),
(266, 'GET', 'api/Childgrowth/view/{id}', '[\"id\"]', '', '2022-06-25 16:25:32', '2022-06-25 16:25:32'),
(267, 'POST', 'api/Childgrowth/update/{id}', '[\"id\"]', '', '2022-06-25 16:25:32', '2022-06-25 16:25:32'),
(268, 'GET', 'api/Childgrowth/delete/{id}', '[\"id\"]', '', '2022-06-25 16:25:32', '2022-06-25 16:25:32'),
(269, 'DELETE', 'api/Childgrowth/delete_multiple', '[]', '', '2022-06-25 16:25:32', '2022-06-25 16:25:32'),
(270, 'GET', 'api/Immunizations/', '[]', '', '2022-06-25 17:23:37', '2022-06-25 17:23:37'),
(271, 'GET', 'api/Immunizations/list', '[]', '', '2022-06-25 17:23:37', '2022-06-25 17:23:37'),
(272, 'POST', 'api/Immunizations/create_or_update', '[]', '', '2022-06-25 17:23:37', '2022-06-25 17:23:37'),
(273, 'GET', 'api/Immunizations/add', '[]', '', '2022-06-25 17:23:37', '2022-06-25 17:23:37'),
(274, 'GET', 'api/Immunizations/edit/{id}', '[\"id\"]', '', '2022-06-25 17:23:37', '2022-06-25 17:23:37'),
(275, 'GET', 'api/Immunizations/view/{id}', '[\"id\"]', '', '2022-06-25 17:23:37', '2022-06-25 17:23:37'),
(276, 'POST', 'api/Immunizations/update/{id}', '[\"id\"]', '', '2022-06-25 17:23:37', '2022-06-25 17:23:37'),
(277, 'GET', 'api/Immunizations/delete/{id}', '[\"id\"]', '', '2022-06-25 17:23:37', '2022-06-25 17:23:37'),
(278, 'DELETE', 'api/Immunizations/delete_multiple', '[]', '', '2022-06-25 17:23:37', '2022-06-25 17:23:37'),
(279, 'GET', 'api/Mothers/', '[]', '', '2022-06-25 18:54:36', '2022-06-25 18:54:36'),
(280, 'GET', 'api/Mothers/list', '[]', '', '2022-06-25 18:54:36', '2022-06-25 18:54:36'),
(281, 'POST', 'api/Mothers/create_or_update', '[]', '', '2022-06-25 18:54:36', '2022-06-25 18:54:36'),
(282, 'GET', 'api/Mothers/add', '[]', '', '2022-06-25 18:54:36', '2022-06-25 18:54:36'),
(283, 'GET', 'api/Mothers/edit/{id}', '[\"id\"]', '', '2022-06-25 18:54:36', '2022-06-25 18:54:36'),
(284, 'GET', 'api/Mothers/view/{id}', '[\"id\"]', '', '2022-06-25 18:54:36', '2022-06-25 18:54:36'),
(285, 'POST', 'api/Mothers/update/{id}', '[\"id\"]', '', '2022-06-25 18:54:36', '2022-06-25 18:54:36'),
(286, 'GET', 'api/Mothers/delete/{id}', '[\"id\"]', '', '2022-06-25 18:54:36', '2022-06-25 18:54:36'),
(287, 'DELETE', 'api/Mothers/delete_multiple', '[]', '', '2022-06-25 18:54:36', '2022-06-25 18:54:36'),
(288, 'GET', 'api/Individualpregnancies/', '[]', '', '2022-06-25 19:04:14', '2022-06-25 19:04:14'),
(289, 'GET', 'api/Individualpregnancies/list', '[]', '', '2022-06-25 19:04:14', '2022-06-25 19:04:14'),
(290, 'POST', 'api/Individualpregnancies/create_or_update', '[]', '', '2022-06-25 19:04:14', '2022-06-25 19:04:14'),
(291, 'GET', 'api/Individualpregnancies/add', '[]', '', '2022-06-25 19:04:14', '2022-06-25 19:04:14'),
(292, 'GET', 'api/Individualpregnancies/edit/{id}', '[\"id\"]', '', '2022-06-25 19:04:14', '2022-06-25 19:04:14'),
(293, 'GET', 'api/Individualpregnancies/view/{id}', '[\"id\"]', '', '2022-06-25 19:04:14', '2022-06-25 19:04:14'),
(294, 'POST', 'api/Individualpregnancies/update/{id}', '[\"id\"]', '', '2022-06-25 19:04:14', '2022-06-25 19:04:14'),
(295, 'GET', 'api/Individualpregnancies/delete/{id}', '[\"id\"]', '', '2022-06-25 19:04:14', '2022-06-25 19:04:14'),
(296, 'DELETE', 'api/Individualpregnancies/delete_multiple', '[]', '', '2022-06-25 19:04:14', '2022-06-25 19:04:14'),
(297, 'GET', 'api/Pregnancyrecords/', '[]', '', '2022-06-25 19:06:12', '2022-06-25 19:06:12'),
(298, 'GET', 'api/Pregnancyrecords/list', '[]', '', '2022-06-25 19:06:12', '2022-06-25 19:06:12'),
(299, 'POST', 'api/Pregnancyrecords/create_or_update', '[]', '', '2022-06-25 19:06:12', '2022-06-25 19:06:12'),
(300, 'GET', 'api/Pregnancyrecords/add', '[]', '', '2022-06-25 19:06:12', '2022-06-25 19:06:12'),
(301, 'GET', 'api/Pregnancyrecords/edit/{id}', '[\"id\"]', '', '2022-06-25 19:06:12', '2022-06-25 19:06:12'),
(302, 'GET', 'api/Pregnancyrecords/view/{id}', '[\"id\"]', '', '2022-06-25 19:06:12', '2022-06-25 19:06:12'),
(303, 'POST', 'api/Pregnancyrecords/update/{id}', '[\"id\"]', '', '2022-06-25 19:06:12', '2022-06-25 19:06:12'),
(304, 'GET', 'api/Pregnancyrecords/delete/{id}', '[\"id\"]', '', '2022-06-25 19:06:12', '2022-06-25 19:06:12'),
(305, 'DELETE', 'api/Pregnancyrecords/delete_multiple', '[]', '', '2022-06-25 19:06:12', '2022-06-25 19:06:12'),
(306, 'GET', 'api/Antenatalrecords/', '[]', '', '2022-06-25 19:12:03', '2022-06-25 19:12:03'),
(307, 'GET', 'api/Antenatalrecords/list', '[]', '', '2022-06-25 19:12:03', '2022-06-25 19:12:03'),
(308, 'POST', 'api/Antenatalrecords/create_or_update', '[]', '', '2022-06-25 19:12:03', '2022-06-25 19:12:03'),
(309, 'GET', 'api/Antenatalrecords/add', '[]', '', '2022-06-25 19:12:03', '2022-06-25 19:12:03'),
(310, 'GET', 'api/Antenatalrecords/edit/{id}', '[\"id\"]', '', '2022-06-25 19:12:03', '2022-06-25 19:12:03'),
(311, 'GET', 'api/Antenatalrecords/view/{id}', '[\"id\"]', '', '2022-06-25 19:12:03', '2022-06-25 19:12:03'),
(312, 'POST', 'api/Antenatalrecords/update/{id}', '[\"id\"]', '', '2022-06-25 19:12:03', '2022-06-25 19:12:03'),
(313, 'GET', 'api/Antenatalrecords/delete/{id}', '[\"id\"]', '', '2022-06-25 19:12:03', '2022-06-25 19:12:03'),
(314, 'DELETE', 'api/Antenatalrecords/delete_multiple', '[]', '', '2022-06-25 19:12:03', '2022-06-25 19:12:03');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`id`, `cat_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Health Centre', '2022-08-01 05:14:42', '2022-08-01 05:14:42', NULL),
(3, 'Maternity Home', '2022-08-05 14:02:53', '2022-08-05 14:02:53', NULL),
(4, 'CHPS Compound', '2022-08-05 14:05:16', '2022-08-05 14:05:16', NULL),
(5, 'Hospital', '2022-08-05 14:05:49', '2022-08-05 14:05:49', NULL),
(6, 'Clinic', '2022-08-05 14:06:40', '2022-08-05 14:06:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Childgrowth`
--

CREATE TABLE `Childgrowth` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complaints` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id` int(11) NOT NULL,
  `ch_reg_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_reg_no` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Deliveryoutcome`
--

CREATE TABLE `Deliveryoutcome` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `pregnancy_weeks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placenta_delivery` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `labour_in_delivery_duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vacuum_indication` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anesthesia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `est_blood_loss` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_transfusion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placenta_state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perineum_state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_complications` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_attendant` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_of_delivery` int(11) NOT NULL,
  `brestfeeding_30min` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `infant_skin_to_skin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mothers_condition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pulse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temperature` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uterus_condition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `incision_perineum` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `breast_condition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fundal_height` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lochia_colour` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lochia_odour` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifa_supply_days` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pnc_type_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_outcome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_babies` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baby_sex` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `circumference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apgar_score` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resuscitation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `congenital_malformation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complications` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referred_to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heart_rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `respiratory_rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brestfeeding` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baby_suckling` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meconium_passed` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urine_passed` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tetracycle_for_eyecare` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cord_care` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baby_condition_discharge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_reg_no` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Districts`
--

CREATE TABLE `Districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `dist_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dist_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dist_personnel` int(11) NOT NULL,
  `dist_region` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Districts`
--

INSERT INTO `Districts` (`id`, `dist_name`, `dist_code`, `dist_personnel`, `dist_region`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Asuogyaman District', '001', 1, 1, '2022-08-01 05:19:30', '2022-08-01 05:19:30', NULL),
(2, 'McCarthy', 'GA/MC/002', 2, 2, '2022-08-12 16:12:07', '2022-08-12 16:12:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Facility`
--

CREATE TABLE `Facility` (
  `id` int(10) UNSIGNED NOT NULL,
  `fac_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Facility`
--

INSERT INTO `Facility` (`id`, `fac_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Volta River Authority Hospital', '2022-08-05 14:33:00', '2022-08-05 14:33:00', NULL),
(4, 'Health center', '2022-08-12 16:10:17', '2022-08-12 16:10:17', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`id`, `field_name`, `field_text`, `status`, `validation_rules`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'integer', 'Number', 1, NULL, NULL, NULL, '2021-03-17 20:57:12'),
(2, 'biginteger', 'Big Number', 1, NULL, NULL, NULL, '2021-03-17 20:57:12'),
(3, 'float', 'Decimal Number', 1, NULL, NULL, NULL, '2021-03-17 20:57:12'),
(4, 'boolean', 'Yes,No', 0, NULL, NULL, NULL, '2021-03-17 20:57:12'),
(5, 'date', 'Date Picker', 1, NULL, NULL, NULL, '2021-03-17 20:57:12'),
(6, 'datetime', 'DateTime Picker', 1, NULL, NULL, NULL, '2021-03-17 20:57:12'),
(7, 'string', 'Text', 1, NULL, NULL, NULL, '2021-03-17 20:57:12'),
(8, 'text', 'Text Editor (CK Editor)', 1, NULL, NULL, NULL, '2021-03-17 20:57:12'),
(9, 'image', 'Image', 1, NULL, NULL, NULL, '2021-03-17 20:57:12'),
(10, 'attachment', 'Attachment', 1, NULL, NULL, NULL, '2021-03-17 20:57:12'),
(11, 'one_to_one_relation', 'One to One relation', 1, NULL, NULL, NULL, '2021-03-17 20:57:12'),
(12, 'one_to_many_relation', 'One To Many Relation', 0, NULL, NULL, NULL, '2021-03-17 20:57:12'),
(13, 'select', 'select', 1, NULL, NULL, NULL, '2021-03-17 20:57:12'),
(14, 'radio', 'radio', 1, NULL, NULL, NULL, '2021-03-17 20:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `Healthfacility`
--

CREATE TABLE `Healthfacility` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` int(11) NOT NULL,
  `facility_type` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `rep` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Healthfacility`
--

INSERT INTO `Healthfacility` (`id`, `name`, `location`, `district`, `facility_type`, `category`, `rep`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Atimpoku Health Centre', 'Atimpoku', 1, 2, 2, 1, '2022-08-01 05:20:56', '2022-08-01 05:20:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Immunizations`
--

CREATE TABLE `Immunizations` (
  `id` int(10) UNSIGNED NOT NULL,
  `ch_reg_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_reg_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vaccine` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_given` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id` int(11) NOT NULL,
  `other_vaccine` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Immunizations`
--

INSERT INTO `Immunizations` (`id`, `ch_reg_no`, `mo_reg_no`, `age`, `vaccine`, `batch_no`, `place_given`, `staff_id`, `other_vaccine`, `date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '001', '001', 'At birth', '1(BCG) / 2(OPV 0) / 3(Hepatitis B)', 'PVO123456', 'Atimpoku', 1, 'Non', '2022-06-04', '2022-08-05 09:59:41', '2022-08-05 09:59:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Individualpregnancies`
--

CREATE TABLE `Individualpregnancies` (
  `id` int(10) UNSIGNED NOT NULL,
  `birth_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `place_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode_of_delivery` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `outcome_of_delivery` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `child_present_condition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `major_risk_factors` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pregnancy_problems` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gestational_age` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_weight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `labour_complications` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_mother_reg_no` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Individualpregnancies`
--

INSERT INTO `Individualpregnancies` (`id`, `birth_no`, `birth_date`, `place_of_birth`, `mode_of_delivery`, `outcome_of_delivery`, `sex`, `child_present_condition`, `major_risk_factors`, `pregnancy_problems`, `gestational_age`, `birth_weight`, `labour_complications`, `birth_mother_reg_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '2022-06-11', 'CHPS', 'SVD', 'Live birth', 'male', 'Good', 'Previous CS', 'Non', '32', '3', 'Non', 1, '2022-08-11 21:40:59', '2022-08-11 21:40:59', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `ltm_translations`
--

INSERT INTO `ltm_translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'manage_users', 'menu_title', 'Manage Users', '2020-09-27 20:03:40', '2020-09-27 20:04:30'),
(2, 1, 'en', 'file_manager', 'menu_title', 'File Manager', '2020-09-27 20:03:40', '2020-09-27 20:04:30'),
(3, 1, 'en', 'account_settings', 'menu_title', 'Account Settings', '2020-09-27 20:03:40', '2020-09-27 20:04:30'),
(4, 1, 'en', 'modules', 'module_title', 'Module Builder', '2020-09-27 20:03:40', '2020-09-27 20:04:30'),
(5, 1, 'en', 'modules', 'module_subtitle', 'All Modules', '2020-09-27 20:03:40', '2020-09-27 20:04:30'),
(6, 1, 'en', 'modules', 'module_name', 'Module Name ', '2020-09-27 20:03:40', '2020-09-27 20:04:30'),
(7, 1, 'en', 'roles', 'module_title', 'Roles <small> Users\'s Roles </small>', '2020-09-27 20:03:40', '2020-09-27 20:04:31'),
(8, 1, 'en', 'permissions', 'module_title', 'Permissions <small>Permissions\'s List</small>', '2020-09-27 20:03:40', '2020-09-27 20:04:31'),
(9, 1, 'ar', 'account_settings', 'menu_title', 'إعدادات الحساب', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(10, 1, 'ar', 'auth', 'failed', 'These credentials do not match our records.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(11, 1, 'ar', 'auth', 'throttle', 'Too many login attempts. Please try again in :seconds seconds.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(12, 1, 'ar', 'crud_builder', 'menu_title', 'منشئ النظام', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(13, 1, 'ar', 'dashboard', 'crud_builder', ' منشئ النظام', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(14, 1, 'ar', 'dashboard', 'menu', 'القائمة', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(15, 1, 'ar', 'dashboard', 'modules', 'وحدات', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(16, 1, 'ar', 'dashboard', 'manage_users', 'التحكم بالمستخدمين', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(17, 1, 'ar', 'dashboard', 'users', 'المستخدمين', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(18, 1, 'ar', 'dashboard', 'roles', 'الادوار', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(19, 1, 'ar', 'dashboard', 'permissions', 'الصلاحيات', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(20, 1, 'ar', 'dashboard', 'file_manager', 'مدير الملفات', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(21, 1, 'ar', 'dashboard', 'account_settings', 'مدير الحساب', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(22, 1, 'ar', 'dashboard', 'user_profile', 'ملف المستخدم', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(23, 1, 'ar', 'dashboard', 'general_settings', 'اعدادات عامة', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(24, 1, 'ar', 'dashboard', 'profile', 'الملف الشخصي', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(25, 1, 'ar', 'dashboard', 'log_out', 'الخروج', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(26, 1, 'ar', 'file_manager', 'menu_title', 'مدير الملفات', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(27, 1, 'ar', 'general_settings', 'menu_title', 'إعدادات عامة', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(28, 1, 'ar', 'general_settings', 'module_title', 'إدارة الاعدادات العامة', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(29, 1, 'ar', 'general_settings', 'module_form_title', 'الإعدادات العامة', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(30, 1, 'ar', 'general_settings', 'arabic', 'العربيه', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(31, 1, 'ar', 'general_settings', 'english', 'الانجليزية', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(32, 1, 'ar', 'general_settings', 'registration', 'التسجيل', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(33, 1, 'ar', 'general_settings', 'crud_builder', 'منشئ النظام', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(34, 1, 'ar', 'general_settings', 'file_manager', 'مدير الملفات', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(35, 1, 'ar', 'general_settings', 'direction', 'الاتجاه', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(36, 1, 'ar', 'general_settings', 'language', 'اللغه', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(37, 1, 'ar', 'general_settings', 'hide', 'إخفاء', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(38, 1, 'ar', 'general_settings', 'show', 'إظهار', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(39, 1, 'ar', 'general_settings', 'ltr', 'من اليسار لليمين', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(40, 1, 'ar', 'general_settings', 'rtl', 'من اليمين لليسار', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(41, 1, 'ar', 'general_settings', 'enable', 'تفعيل', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(42, 1, 'ar', 'general_settings', 'disable', 'إيقاف', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(43, 1, 'ar', 'general_settings', 'cancel', 'الغاء', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(44, 1, 'ar', 'general_settings', 'submit', 'إرسال', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(45, 1, 'ar', 'manage_users', 'menu_title', 'إدارة المستخدمين', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(46, 1, 'ar', 'menu', 'menu_title', 'القائمة', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(47, 1, 'ar', 'menu', 'module_title', 'التحكم بقوائم النظام', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(48, 1, 'ar', 'menu', 'module_subtitle', 'القائمة', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(49, 1, 'ar', 'menu', 'module_add_new', 'إضافة قائمة رئيسية جديدة', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(50, 1, 'ar', 'modules', 'menu_title', 'الوحدات', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(51, 1, 'ar', 'modules', 'module_title', 'منشئ الوحدات', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(52, 1, 'ar', 'modules', 'module_subtitle', 'كل الوحدات', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(53, 1, 'ar', 'modules', 'module_add_new', 'إضافة وحده جديده', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(54, 1, 'ar', 'modules', 'module_name', 'إسم الوحدة', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(55, 1, 'ar', 'modules', 'module_add_new_field', 'إضافة حقل جديد', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(56, 1, 'ar', 'modules', 'module_generate_module', 'إنشاء الوحده', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(57, 1, 'ar', 'pagination', 'previous', '&laquo; السابق', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(58, 1, 'ar', 'pagination', 'next', 'التالي &raquo;', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(59, 1, 'ar', 'passwords', 'password', 'Passwords must be at least six characters and match the confirmation.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(60, 1, 'ar', 'passwords', 'reset', 'Your password has been reset!', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(61, 1, 'ar', 'passwords', 'sent', 'We have e-mailed your password reset link!', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(62, 1, 'ar', 'passwords', 'token', 'This password reset token is invalid.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(63, 1, 'ar', 'passwords', 'user', 'We can\'t find a user with that e-mail address.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(64, 1, 'ar', 'permissions', 'menu_title', 'الصلاحيات', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(65, 1, 'ar', 'permissions', 'module_title', 'الصلاحيات <small>مجموعة الصلاحيات</small>', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(66, 1, 'ar', 'permissions', 'module_subtitle', 'ادارة الصلاحيات', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(67, 1, 'ar', 'permissions', 'module_add_new', 'أضافة صلاحية جديده', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(68, 1, 'ar', 'roles', 'menu_title', 'الادوار', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(69, 1, 'ar', 'roles', 'module_title', 'الادوار<small> مجموعة الادوار </small>', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(70, 1, 'ar', 'roles', 'module_subtitle', 'ادارة الادوار', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(71, 1, 'ar', 'roles', 'module_add_new', 'اضافة دور جديد', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(72, 1, 'ar', 'translations', 'menu_title', 'مدير اللغات', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(73, 1, 'ar', 'translations', 'module_title', 'مدير اللغات', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(74, 1, 'ar', 'user_profile', 'menu_title', 'الملف الشخصي', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(75, 1, 'ar', 'user_profile', 'module_title', 'ادارة ملفك الشخصي', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(76, 1, 'ar', 'user_profile', 'module_form_title', 'الملف الشخصي', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(77, 1, 'ar', 'user_profile', 'name', 'الاسم', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(78, 1, 'ar', 'user_profile', 'email', 'البريد الالكتروني', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(79, 1, 'ar', 'user_profile', 'password', 'كلمة المرور', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(80, 1, 'ar', 'user_profile', 'profile_picture', 'صورة الملف', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(81, 1, 'ar', 'user_profile', 'cancel', 'الغاء', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(82, 1, 'ar', 'user_profile', 'submit', 'إرسال', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(83, 1, 'ar', 'users', 'menu_title', 'المستخدمين', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(84, 1, 'ar', 'users', 'module_title', 'إدارة المستخدمين', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(85, 1, 'ar', 'users', 'module_subtitle', 'مجموعة المستخدمين', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(86, 1, 'ar', 'users', 'module_add_new', 'إضافة مستخدم جديد', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(87, 1, 'ar', 'validation', 'accepted', 'The :attribute must be accepted.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(88, 1, 'ar', 'validation', 'active_url', 'The :attribute is not a valid URL.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(89, 1, 'ar', 'validation', 'after', 'The :attribute must be a date after :date.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(90, 1, 'ar', 'validation', 'after_or_equal', 'The :attribute must be a date after or equal to :date.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(91, 1, 'ar', 'validation', 'alpha', 'The :attribute may only contain letters.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(92, 1, 'ar', 'validation', 'alpha_dash', 'The :attribute may only contain letters, numbers, and dashes.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(93, 1, 'ar', 'validation', 'alpha_num', 'The :attribute may only contain letters and numbers.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(94, 1, 'ar', 'validation', 'array', 'The :attribute must be an array.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(95, 1, 'ar', 'validation', 'before', 'The :attribute must be a date before :date.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(96, 1, 'ar', 'validation', 'before_or_equal', 'The :attribute must be a date before or equal to :date.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(97, 1, 'ar', 'validation', 'between.numeric', 'The :attribute must be between :min and :max.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(98, 1, 'ar', 'validation', 'between.file', 'The :attribute must be between :min and :max kilobytes.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(99, 1, 'ar', 'validation', 'between.string', 'The :attribute must be between :min and :max characters.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(100, 1, 'ar', 'validation', 'between.array', 'The :attribute must have between :min and :max items.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(101, 1, 'ar', 'validation', 'boolean', 'The :attribute field must be true or false.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(102, 1, 'ar', 'validation', 'confirmed', 'The :attribute confirmation does not match.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(103, 1, 'ar', 'validation', 'date', 'The :attribute is not a valid date.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(104, 1, 'ar', 'validation', 'date_format', 'The :attribute does not match the format :format.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(105, 1, 'ar', 'validation', 'different', 'The :attribute and :other must be different.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(106, 1, 'ar', 'validation', 'digits', 'The :attribute must be :digits digits.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(107, 1, 'ar', 'validation', 'digits_between', 'The :attribute must be between :min and :max digits.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(108, 1, 'ar', 'validation', 'dimensions', 'The :attribute has invalid image dimensions.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(109, 1, 'ar', 'validation', 'distinct', 'The :attribute field has a duplicate value.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(110, 1, 'ar', 'validation', 'email', 'The :attribute must be a valid email address.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(111, 1, 'ar', 'validation', 'exists', 'The selected :attribute is invalid.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(112, 1, 'ar', 'validation', 'file', 'The :attribute must be a file.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(113, 1, 'ar', 'validation', 'filled', 'The :attribute field must have a value.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(114, 1, 'ar', 'validation', 'image', 'The :attribute must be an image.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(115, 1, 'ar', 'validation', 'in', 'The selected :attribute is invalid.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(116, 1, 'ar', 'validation', 'in_array', 'The :attribute field does not exist in :other.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(117, 1, 'ar', 'validation', 'integer', 'The :attribute must be an integer.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(118, 1, 'ar', 'validation', 'ip', 'The :attribute must be a valid IP address.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(119, 1, 'ar', 'validation', 'ipv4', 'The :attribute must be a valid IPv4 address.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(120, 1, 'ar', 'validation', 'ipv6', 'The :attribute must be a valid IPv6 address.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(121, 1, 'ar', 'validation', 'json', 'The :attribute must be a valid JSON string.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(122, 1, 'ar', 'validation', 'max.numeric', 'The :attribute may not be greater than :max.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(123, 1, 'ar', 'validation', 'max.file', 'The :attribute may not be greater than :max kilobytes.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(124, 1, 'ar', 'validation', 'max.string', 'The :attribute may not be greater than :max characters.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(125, 1, 'ar', 'validation', 'max.array', 'The :attribute may not have more than :max items.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(126, 1, 'ar', 'validation', 'mimes', 'The :attribute must be a file of type: :values.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(127, 1, 'ar', 'validation', 'mimetypes', 'The :attribute must be a file of type: :values.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(128, 1, 'ar', 'validation', 'min.numeric', 'The :attribute must be at least :min.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(129, 1, 'ar', 'validation', 'min.file', 'The :attribute must be at least :min kilobytes.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(130, 1, 'ar', 'validation', 'min.string', 'The :attribute must be at least :min characters.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(131, 1, 'ar', 'validation', 'min.array', 'The :attribute must have at least :min items.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(132, 1, 'ar', 'validation', 'not_in', 'The selected :attribute is invalid.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(133, 1, 'ar', 'validation', 'numeric', 'The :attribute must be a number.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(134, 1, 'ar', 'validation', 'present', 'The :attribute field must be present.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(135, 1, 'ar', 'validation', 'regex', 'The :attribute format is invalid.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(136, 1, 'ar', 'validation', 'required', 'The :attribute field is required.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(137, 1, 'ar', 'validation', 'required_if', 'The :attribute field is required when :other is :value.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(138, 1, 'ar', 'validation', 'required_unless', 'The :attribute field is required unless :other is in :values.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(139, 1, 'ar', 'validation', 'required_with', 'The :attribute field is required when :values is present.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(140, 1, 'ar', 'validation', 'required_with_all', 'The :attribute field is required when :values is present.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(141, 1, 'ar', 'validation', 'required_without', 'The :attribute field is required when :values is not present.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(142, 1, 'ar', 'validation', 'required_without_all', 'The :attribute field is required when none of :values are present.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(143, 1, 'ar', 'validation', 'same', 'The :attribute and :other must match.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(144, 1, 'ar', 'validation', 'size.numeric', 'The :attribute must be :size.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(145, 1, 'ar', 'validation', 'size.file', 'The :attribute must be :size kilobytes.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(146, 1, 'ar', 'validation', 'size.string', 'The :attribute must be :size characters.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(147, 1, 'ar', 'validation', 'size.array', 'The :attribute must contain :size items.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(148, 1, 'ar', 'validation', 'string', 'The :attribute must be a string.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(149, 1, 'ar', 'validation', 'timezone', 'The :attribute must be a valid zone.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(150, 1, 'ar', 'validation', 'unique', 'The :attribute has already been taken.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(151, 1, 'ar', 'validation', 'uploaded', 'The :attribute failed to upload.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(152, 1, 'ar', 'validation', 'url', 'The :attribute format is invalid.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(153, 1, 'ar', 'validation', 'custom.attribute-name.rule-name', 'custom-message', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(154, 1, 'ar', 'validation', 'recaptcha', 'The :attribute field is not correct.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(155, 1, 'en', 'auth', 'failed', 'These credentials do not match our records.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(156, 1, 'en', 'auth', 'throttle', 'Too many login attempts. Please try again in :seconds seconds.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(157, 1, 'en', 'crud_builder', 'menu_title', 'CRUD Builder', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(158, 1, 'en', 'dashboard', 'crud_builder', 'CRUD Builder', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(159, 1, 'en', 'dashboard', 'menu', 'Menu', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(160, 1, 'en', 'dashboard', 'modules', 'Modules', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(161, 1, 'en', 'dashboard', 'manage_users', 'Manage Users', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(162, 1, 'en', 'dashboard', 'users', 'Users', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(163, 1, 'en', 'dashboard', 'roles', 'Roles', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(164, 1, 'en', 'dashboard', 'permissions', 'Permissions', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(165, 1, 'en', 'dashboard', 'file_manager', 'File Manager', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(166, 1, 'en', 'dashboard', 'account_settings', 'Account Settings', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(167, 1, 'en', 'dashboard', 'user_profile', 'User Profile', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(168, 1, 'en', 'dashboard', 'general_settings', 'General Settings', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(169, 1, 'en', 'dashboard', 'profile', 'Profile', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(170, 1, 'en', 'dashboard', 'log_out', 'Log out', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(171, 1, 'en', 'general_settings', 'menu_title', 'General Settings', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(172, 1, 'en', 'general_settings', 'module_title', 'Manage General Settings', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(173, 1, 'en', 'general_settings', 'module_form_title', 'General Settings', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(174, 1, 'en', 'general_settings', 'arabic', 'Arabic', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(175, 1, 'en', 'general_settings', 'english', 'English', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(176, 1, 'en', 'general_settings', 'registration', 'Registration', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(177, 1, 'en', 'general_settings', 'crud_builder', 'Crud Builder', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(178, 1, 'en', 'general_settings', 'file_manager', 'File Mangager', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(179, 1, 'en', 'general_settings', 'direction', 'Direction', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(180, 1, 'en', 'general_settings', 'language', 'Language', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(181, 1, 'en', 'general_settings', 'hide', 'hide', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(182, 1, 'en', 'general_settings', 'show', 'show', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(183, 1, 'en', 'general_settings', 'ltr', 'LTR', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(184, 1, 'en', 'general_settings', 'rtl', 'RTL', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(185, 1, 'en', 'general_settings', 'enable', 'Enable', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(186, 1, 'en', 'general_settings', 'disable', 'Disable', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(187, 1, 'en', 'general_settings', 'cancel', 'Cancel', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(188, 1, 'en', 'general_settings', 'submit', 'Submit', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(189, 1, 'en', 'menu', 'menu_title', 'Menu', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(190, 1, 'en', 'menu', 'module_title', 'Manage Crud Menu Items', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(191, 1, 'en', 'menu', 'module_subtitle', 'Menu', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(192, 1, 'en', 'menu', 'module_add_new', 'Add New Parent Menu Item', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(193, 1, 'en', 'modules', 'menu_title', 'Modules', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(194, 1, 'en', 'modules', 'module_add_new', 'Add New Module', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(195, 1, 'en', 'modules', 'module_add_new_field', 'Add New Field', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(196, 1, 'en', 'modules', 'module_generate_module', 'Generate Module', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(197, 1, 'en', 'pagination', 'previous', '&laquo; Previous', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(198, 1, 'en', 'pagination', 'next', 'Next &raquo;', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(199, 1, 'en', 'passwords', 'reset', 'Your password has been reset!', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(200, 1, 'en', 'passwords', 'sent', 'We have emailed your password reset link!', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(201, 1, 'en', 'passwords', 'throttled', 'Please wait before retrying.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(202, 1, 'en', 'passwords', 'token', 'This password reset token is invalid.', '2020-09-27 20:04:30', '2020-09-27 20:04:30'),
(203, 1, 'en', 'passwords', 'user', 'We can\'t find a user with that email address.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(204, 1, 'en', 'permissions', 'menu_title', 'Permissions', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(205, 1, 'en', 'permissions', 'module_subtitle', 'Manage Permissions', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(206, 1, 'en', 'permissions', 'module_add_new', 'Add New Permission', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(207, 1, 'en', 'roles', 'menu_title', 'Roles', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(208, 1, 'en', 'roles', 'module_subtitle', 'Manage Roles', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(209, 1, 'en', 'roles', 'module_add_new', 'Add New Role', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(210, 1, 'en', 'translations', 'menu_title', 'Translation Manager', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(211, 1, 'en', 'translations', 'module_title', 'Manage Translations', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(212, 1, 'en', 'user_profile', 'menu_title', 'User Profile', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(213, 1, 'en', 'user_profile', 'module_title', 'Manage Your Profile', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(214, 1, 'en', 'user_profile', 'module_form_title', 'User Profile', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(215, 1, 'en', 'user_profile', 'name', 'Name', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(216, 1, 'en', 'user_profile', 'email', 'E-mail', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(217, 1, 'en', 'user_profile', 'password', 'Password', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(218, 1, 'en', 'user_profile', 'profile_picture', 'Profile Picture', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(219, 1, 'en', 'user_profile', 'cancel', 'Cancel', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(220, 1, 'en', 'user_profile', 'submit', 'Submit', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(221, 1, 'en', 'users', 'menu_title', 'Users', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(222, 1, 'en', 'users', 'module_title', 'Manage Users', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(223, 1, 'en', 'users', 'module_subtitle', 'Users\'s List', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(224, 1, 'en', 'users', 'module_add_new', 'Add New User', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(225, 1, 'en', 'users', 'module_name', 'Module Name ', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(226, 1, 'en', 'users', 'module_add_new_field', 'Add New Field', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(227, 1, 'en', 'users', 'module_generate_module', 'Generate Module', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(228, 1, 'en', 'validation', 'accepted', 'The :attribute must be accepted.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(229, 1, 'en', 'validation', 'active_url', 'The :attribute is not a valid URL.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(230, 1, 'en', 'validation', 'after', 'The :attribute must be a date after :date.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(231, 1, 'en', 'validation', 'after_or_equal', 'The :attribute must be a date after or equal to :date.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(232, 1, 'en', 'validation', 'alpha', 'The :attribute may only contain letters.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(233, 1, 'en', 'validation', 'alpha_dash', 'The :attribute may only contain letters, numbers, dashes and underscores.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(234, 1, 'en', 'validation', 'alpha_num', 'The :attribute may only contain letters and numbers.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(235, 1, 'en', 'validation', 'array', 'The :attribute must be an array.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(236, 1, 'en', 'validation', 'before', 'The :attribute must be a date before :date.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(237, 1, 'en', 'validation', 'before_or_equal', 'The :attribute must be a date before or equal to :date.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(238, 1, 'en', 'validation', 'between.numeric', 'The :attribute must be between :min and :max.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(239, 1, 'en', 'validation', 'between.file', 'The :attribute must be between :min and :max kilobytes.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(240, 1, 'en', 'validation', 'between.string', 'The :attribute must be between :min and :max characters.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(241, 1, 'en', 'validation', 'between.array', 'The :attribute must have between :min and :max items.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(242, 1, 'en', 'validation', 'boolean', 'The :attribute field must be true or false.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(243, 1, 'en', 'validation', 'confirmed', 'The :attribute confirmation does not match.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(244, 1, 'en', 'validation', 'date', 'The :attribute is not a valid date.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(245, 1, 'en', 'validation', 'date_equals', 'The :attribute must be a date equal to :date.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(246, 1, 'en', 'validation', 'date_format', 'The :attribute does not match the format :format.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(247, 1, 'en', 'validation', 'different', 'The :attribute and :other must be different.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(248, 1, 'en', 'validation', 'digits', 'The :attribute must be :digits digits.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(249, 1, 'en', 'validation', 'digits_between', 'The :attribute must be between :min and :max digits.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(250, 1, 'en', 'validation', 'dimensions', 'The :attribute has invalid image dimensions.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(251, 1, 'en', 'validation', 'distinct', 'The :attribute field has a duplicate value.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(252, 1, 'en', 'validation', 'email', 'The :attribute must be a valid email address.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(253, 1, 'en', 'validation', 'ends_with', 'The :attribute must end with one of the following: :values.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(254, 1, 'en', 'validation', 'exists', 'The selected :attribute is invalid.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(255, 1, 'en', 'validation', 'file', 'The :attribute must be a file.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(256, 1, 'en', 'validation', 'filled', 'The :attribute field must have a value.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(257, 1, 'en', 'validation', 'gt.numeric', 'The :attribute must be greater than :value.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(258, 1, 'en', 'validation', 'gt.file', 'The :attribute must be greater than :value kilobytes.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(259, 1, 'en', 'validation', 'gt.string', 'The :attribute must be greater than :value characters.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(260, 1, 'en', 'validation', 'gt.array', 'The :attribute must have more than :value items.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(261, 1, 'en', 'validation', 'gte.numeric', 'The :attribute must be greater than or equal :value.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(262, 1, 'en', 'validation', 'gte.file', 'The :attribute must be greater than or equal :value kilobytes.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(263, 1, 'en', 'validation', 'gte.string', 'The :attribute must be greater than or equal :value characters.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(264, 1, 'en', 'validation', 'gte.array', 'The :attribute must have :value items or more.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(265, 1, 'en', 'validation', 'image', 'The :attribute must be an image.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(266, 1, 'en', 'validation', 'in', 'The selected :attribute is invalid.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(267, 1, 'en', 'validation', 'in_array', 'The :attribute field does not exist in :other.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(268, 1, 'en', 'validation', 'integer', 'The :attribute must be an integer.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(269, 1, 'en', 'validation', 'ip', 'The :attribute must be a valid IP address.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(270, 1, 'en', 'validation', 'ipv4', 'The :attribute must be a valid IPv4 address.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(271, 1, 'en', 'validation', 'ipv6', 'The :attribute must be a valid IPv6 address.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(272, 1, 'en', 'validation', 'json', 'The :attribute must be a valid JSON string.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(273, 1, 'en', 'validation', 'lt.numeric', 'The :attribute must be less than :value.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(274, 1, 'en', 'validation', 'lt.file', 'The :attribute must be less than :value kilobytes.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(275, 1, 'en', 'validation', 'lt.string', 'The :attribute must be less than :value characters.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(276, 1, 'en', 'validation', 'lt.array', 'The :attribute must have less than :value items.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(277, 1, 'en', 'validation', 'lte.numeric', 'The :attribute must be less than or equal :value.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(278, 1, 'en', 'validation', 'lte.file', 'The :attribute must be less than or equal :value kilobytes.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(279, 1, 'en', 'validation', 'lte.string', 'The :attribute must be less than or equal :value characters.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(280, 1, 'en', 'validation', 'lte.array', 'The :attribute must not have more than :value items.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(281, 1, 'en', 'validation', 'max.numeric', 'The :attribute may not be greater than :max.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(282, 1, 'en', 'validation', 'max.file', 'The :attribute may not be greater than :max kilobytes.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(283, 1, 'en', 'validation', 'max.string', 'The :attribute may not be greater than :max characters.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(284, 1, 'en', 'validation', 'max.array', 'The :attribute may not have more than :max items.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(285, 1, 'en', 'validation', 'mimes', 'The :attribute must be a file of type: :values.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(286, 1, 'en', 'validation', 'mimetypes', 'The :attribute must be a file of type: :values.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(287, 1, 'en', 'validation', 'min.numeric', 'The :attribute must be at least :min.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(288, 1, 'en', 'validation', 'min.file', 'The :attribute must be at least :min kilobytes.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(289, 1, 'en', 'validation', 'min.string', 'The :attribute must be at least :min characters.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(290, 1, 'en', 'validation', 'min.array', 'The :attribute must have at least :min items.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(291, 1, 'en', 'validation', 'not_in', 'The selected :attribute is invalid.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(292, 1, 'en', 'validation', 'not_regex', 'The :attribute format is invalid.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(293, 1, 'en', 'validation', 'numeric', 'The :attribute must be a number.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(294, 1, 'en', 'validation', 'password', 'The password is incorrect.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(295, 1, 'en', 'validation', 'present', 'The :attribute field must be present.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(296, 1, 'en', 'validation', 'regex', 'The :attribute format is invalid.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(297, 1, 'en', 'validation', 'required', 'The :attribute field is required.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(298, 1, 'en', 'validation', 'required_if', 'The :attribute field is required when :other is :value.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(299, 1, 'en', 'validation', 'required_unless', 'The :attribute field is required unless :other is in :values.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(300, 1, 'en', 'validation', 'required_with', 'The :attribute field is required when :values is present.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(301, 1, 'en', 'validation', 'required_with_all', 'The :attribute field is required when :values are present.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(302, 1, 'en', 'validation', 'required_without', 'The :attribute field is required when :values is not present.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(303, 1, 'en', 'validation', 'required_without_all', 'The :attribute field is required when none of :values are present.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(304, 1, 'en', 'validation', 'same', 'The :attribute and :other must match.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(305, 1, 'en', 'validation', 'size.numeric', 'The :attribute must be :size.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(306, 1, 'en', 'validation', 'size.file', 'The :attribute must be :size kilobytes.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(307, 1, 'en', 'validation', 'size.string', 'The :attribute must be :size characters.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(308, 1, 'en', 'validation', 'size.array', 'The :attribute must contain :size items.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(309, 1, 'en', 'validation', 'starts_with', 'The :attribute must start with one of the following: :values.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(310, 1, 'en', 'validation', 'string', 'The :attribute must be a string.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(311, 1, 'en', 'validation', 'timezone', 'The :attribute must be a valid zone.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(312, 1, 'en', 'validation', 'unique', 'The :attribute has already been taken.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(313, 1, 'en', 'validation', 'uploaded', 'The :attribute failed to upload.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(314, 1, 'en', 'validation', 'url', 'The :attribute format is invalid.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(315, 1, 'en', 'validation', 'uuid', 'The :attribute must be a valid UUID.', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(316, 1, 'en', 'validation', 'custom.attribute-name.rule-name', 'custom-message', '2020-09-27 20:04:31', '2020-09-27 20:04:31'),
(317, 1, 'en', 'validation', 'recaptcha', 'The :attribute field is not correct.', '2020-09-27 20:04:31', '2020-09-27 20:04:31');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `permission_name`, `url`, `icon`, `type`, `parent`, `hierarchy`, `module_id`, `created_at`, `updated_at`) VALUES
(8, 'Facility', 'Facility', 'FacilityIndex', 'fa-hospital-o', 'module', 0, 0, 4, '2022-06-24 16:26:19', '2022-06-24 16:26:19'),
(9, 'Category', 'Category', 'CategoryIndex', 'fa-hospital-o', 'module', 0, 0, 5, '2022-06-24 16:27:44', '2022-06-24 16:27:44'),
(10, 'Personnels', 'Personnels', 'PersonnelsIndex', 'fa-user-circle-o', 'module', 0, 0, 6, '2022-06-24 16:32:58', '2022-06-24 16:32:58'),
(11, 'Region', 'Region', 'RegionIndex', 'fa-map-o', 'module', 0, 0, 2, '2022-06-24 16:34:13', '2022-06-24 16:34:13'),
(12, 'Districts', 'Districts', 'DistrictsIndex', 'fa-map', 'module', 0, 0, 3, '2022-06-24 16:35:12', '2022-06-24 16:35:12'),
(13, 'HealthFacility', 'Healthfacility', 'HealthfacilityIndex', 'fa-hospital-o', 'module', 0, 0, 1, '2022-06-24 16:44:55', '2022-06-24 16:44:55'),
(14, 'StaffTypes', 'Stafftypes', 'StafftypesIndex', 'fa-users', 'module', 0, 0, 8, '2022-06-24 17:04:00', '2022-06-24 17:04:00'),
(15, 'Staff', 'Staff', 'StaffIndex', 'fa-users', 'module', 0, 0, 7, '2022-06-24 17:07:43', '2022-06-24 17:07:43'),
(24, 'DeliveryOutcome', 'Deliveryoutcome', 'DeliveryoutcomeIndex', 'fa-address-book', 'module', 0, 0, 13, '2022-06-25 10:28:07', '2022-06-25 10:28:07'),
(25, 'PostnatalRecords', 'Postnatalrecords', 'PostnatalrecordsIndex', 'fa-address-book', 'module', 0, 0, 14, '2022-06-25 15:31:43', '2022-06-25 15:31:43'),
(27, 'ChildGrowth', 'Childgrowth', 'ChildgrowthIndex', 'fa-file-photo-o', 'module', 0, 0, 15, '2022-06-25 16:25:32', '2022-06-25 16:25:32'),
(28, 'Immunizations', 'Immunizations', 'ImmunizationsIndex', 'fa-exclamation', 'module', 0, 0, 16, '2022-06-25 17:23:37', '2022-06-25 17:23:37'),
(29, 'Mothers', 'Mothers', 'MothersIndex', 'fa-user-o', 'module', 0, 0, 9, '2022-06-25 18:54:36', '2022-06-25 18:54:36'),
(30, 'IndividualPregnancies', 'Individualpregnancies', 'IndividualpregnanciesIndex', 'fa-book', 'module', 0, 0, 11, '2022-06-25 19:04:14', '2022-06-25 19:04:14'),
(31, 'PregnancyRecords', 'Pregnancyrecords', 'PregnancyrecordsIndex', 'fa-file-picture-o', 'module', 0, 0, 10, '2022-06-25 19:06:11', '2022-06-25 19:06:11'),
(32, 'AntenatalRecords', 'Antenatalrecords', 'AntenatalrecordsIndex', 'fa-address-book-o', 'module', 0, 0, 12, '2022-06-25 19:12:03', '2022-06-25 19:12:03');

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
(21, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
(25, '2022_06_24_162619_Facility', 5),
(26, '2022_06_24_162744_Category', 6),
(27, '2022_06_24_163258_Personnels', 7),
(28, '2022_06_24_163413_Region', 8),
(29, '2022_06_24_163512_Districts', 9),
(30, '2022_06_24_164455_Healthfacility', 10),
(31, '2022_06_24_170400_Stafftypes', 11),
(32, '2022_06_24_170743_Staff', 12),
(41, '2022_06_25_102807_Deliveryoutcome', 17),
(42, '2022_06_25_153143_Postnatalrecords', 18),
(44, '2022_06_25_162532_Childgrowth', 19),
(45, '2022_06_25_172337_Immunizations', 20),
(46, '2022_06_25_185436_Mothers', 21),
(47, '2022_06_25_190414_Individualpregnancies', 22),
(48, '2022_06_25_190611_Pregnancyrecords', 23),
(49, '2022_06_25_191203_Antenatalrecords', 24);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `module_name`, `module_icon`, `module_table_name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'HealthFacility', 'fa-hospital-o', '2022_06_24_164455_Healthfacility\n', 1, '2022-06-16 14:57:58', '2022-06-24 16:44:55', '2022-06-16 14:57:58'),
(2, 'Region', 'fa-map-o', '2022_06_24_163413_Region\n', 1, '2022-06-24 16:07:35', '2022-06-24 16:34:13', '2022-06-24 16:07:35'),
(3, 'Districts', 'fa-map', '2022_06_24_163512_Districts\n', 1, '2022-06-24 16:13:51', '2022-06-24 16:35:12', '2022-06-24 16:13:51'),
(4, 'Facility', 'fa-hospital-o', '2022_06_24_162619_Facility\n', 1, '2022-06-24 16:24:41', '2022-06-24 16:26:19', '2022-06-24 16:24:41'),
(5, 'Category', 'fa-hospital-o', '2022_06_24_162744_Category\n', 1, '2022-06-24 16:27:09', '2022-06-24 16:27:44', '2022-06-24 16:27:09'),
(6, 'Personnels', 'fa-user-circle-o', '2022_06_24_163258_Personnels\n', 1, '2022-06-24 16:31:07', '2022-06-24 16:32:58', '2022-06-24 16:31:07'),
(7, 'Staff', 'fa-users', '2022_06_24_170743_Staff\n', 1, '2022-06-24 16:58:34', '2022-06-24 17:07:43', '2022-06-24 16:58:34'),
(8, 'StaffTypes', 'fa-users', '2022_06_24_170400_Stafftypes\n', 1, '2022-06-24 17:02:56', '2022-06-24 17:04:00', '2022-06-24 17:02:56'),
(9, 'Mothers', 'fa-user-o', '2022_06_25_185436_Mothers\n', 1, '2022-06-24 17:13:00', '2022-06-25 18:54:36', '2022-06-24 17:13:00'),
(10, 'PregnancyRecords', 'fa-file-picture-o', '2022_06_25_190611_Pregnancyrecords\n', 1, '2022-06-24 18:00:55', '2022-06-25 19:06:12', '2022-06-24 18:00:55'),
(11, 'IndividualPregnancies', 'fa-book', '2022_06_25_190414_Individualpregnancies\n', 1, '2022-06-24 18:19:31', '2022-06-25 19:04:14', '2022-06-24 18:19:31'),
(12, 'AntenatalRecords', 'fa-address-book-o', '2022_06_25_191203_Antenatalrecords\n', 1, '2022-06-24 19:04:59', '2022-06-25 19:12:03', '2022-06-24 19:04:59'),
(13, 'DeliveryOutcome', 'fa-address-book', '2022_06_25_102807_Deliveryoutcome\n', 1, '2022-06-24 19:28:32', '2022-06-25 10:28:07', '2022-06-24 19:28:32'),
(14, 'PostnatalRecords', 'fa-address-book', '2022_06_25_153143_Postnatalrecords\n', 1, '2022-06-25 15:08:38', '2022-06-25 15:31:43', '2022-06-25 15:08:38'),
(15, 'ChildGrowth', 'fa-file-photo-o', '2022_06_25_162532_Childgrowth\n', 1, '2022-06-25 15:32:39', '2022-06-25 16:25:32', '2022-06-25 15:32:39'),
(16, 'Immunizations', 'fa-exclamation', '2022_06_25_172337_Immunizations\n', 1, '2022-06-25 16:37:26', '2022-06-25 17:23:37', '2022-06-25 16:37:26'),
(17, 'Forum', 'fa-wechat', NULL, 0, '2022-07-28 22:20:23', '2022-07-28 22:20:23', '2022-07-28 22:20:23'),
(18, 'Subscription', 'fa-money', NULL, 0, '2022-08-12 16:28:41', '2022-08-12 16:28:41', '2022-08-12 16:28:41');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `module_fields`
--

INSERT INTO `module_fields` (`id`, `field_name`, `field_label`, `field_type`, `field_length`, `field_options`, `related_table`, `related_table_field`, `related_table_field_display`, `validation_rules`, `show_in_list`, `module_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'name', 'Name', 7, 0, '', '', '', '', '{\"type\":\"string\"}', 1, 1, '2022-06-24 16:06:05', '2022-06-24 16:06:05', '2022-06-24 16:06:05'),
(2, 'location', 'Location', 7, 0, '', '', '', '', '[]', 1, 1, '2022-06-24 16:06:26', '2022-06-24 16:06:26', '2022-06-24 16:06:26'),
(3, 'reg_name', 'Region Name', 7, 0, '', '', '', '', '{\"type\":\"string\"}', 1, 2, '2022-06-24 16:08:26', '2022-06-24 16:08:26', '2022-06-24 16:08:26'),
(4, 'reg_code', 'Region Code', 7, 0, '', '', '', '', '[]', 1, 2, '2022-06-24 16:08:58', '2022-06-24 16:08:58', '2022-06-24 16:08:58'),
(5, 'reg_personnel', 'Region Personnel', 11, 0, '', 'Personnels', 'id', 'per_name', '[]', 1, 2, '2022-06-24 16:09:56', '2022-06-24 16:33:57', '2022-06-24 16:09:56'),
(7, 'dist_name', 'Distric Name', 7, 0, '', '', '', '', '{\"type\":\"string\"}', 1, 3, '2022-06-24 16:14:28', '2022-06-24 16:14:28', '2022-06-24 16:14:28'),
(8, 'dist_code', 'District Code', 7, 0, '', '', '', '', '[]', 1, 3, '2022-06-24 16:14:51', '2022-06-24 16:14:51', '2022-06-24 16:14:51'),
(9, 'dist_personnel', 'District Personnel', 11, 0, '', 'Personnels', 'id', 'per_name', '[]', 1, 3, '2022-06-24 16:15:12', '2022-06-24 16:35:09', '2022-06-24 16:15:12'),
(11, 'dist_region', 'Region', 11, 0, '', 'Region', 'id', 'reg_name', '{\"type\":\"integer\"}', 1, 3, '2022-06-24 16:18:37', '2022-06-24 16:18:37', '2022-06-24 16:18:37'),
(12, 'fac_name', 'Facility name', 7, 0, '', '', '', '', '{\"type\":\"string\"}', 1, 4, '2022-06-24 16:26:15', '2022-06-24 16:26:15', '2022-06-24 16:26:15'),
(13, 'cat_name', 'Category name', 7, 0, '', '', '', '', '{\"type\":\"string\"}', 1, 5, '2022-06-24 16:27:40', '2022-06-24 16:27:40', '2022-06-24 16:27:40'),
(14, 'per_name', 'Personnel name', 7, 0, '', '', '', '', '{\"type\":\"string\"}', 1, 6, '2022-06-24 16:31:35', '2022-06-24 16:31:35', '2022-06-24 16:31:35'),
(15, 'per_contact', 'Personnel Contact', 7, 0, '', '', '', '', '[]', 1, 6, '2022-06-24 16:32:22', '2022-06-24 16:32:22', '2022-06-24 16:32:22'),
(18, 'district', 'District', 11, 0, '', 'Districts', 'id', 'dist_name', '{\"type\":\"string\"}', 1, 1, '2022-06-24 16:38:30', '2022-06-24 16:39:14', '2022-06-24 16:38:30'),
(19, 'facility_type', 'Facility type', 11, 0, '', 'Facility', 'id', 'fac_name', '[]', 1, 1, '2022-06-24 16:40:14', '2022-06-24 16:40:14', '2022-06-24 16:40:14'),
(20, 'category', 'Category', 11, 0, '', 'Category', 'id', 'cat_name', '[]', 1, 1, '2022-06-24 16:43:31', '2022-06-24 16:43:31', '2022-06-24 16:43:31'),
(21, 'rep', 'Representative', 11, 0, '', 'Personnels', 'id', 'per_name', '[]', 1, 1, '2022-06-24 16:44:21', '2022-06-24 16:44:21', '2022-06-24 16:44:21'),
(22, 'staff_id', 'Staff ID', 7, 0, '', '', '', '', '{\"type\":\"string\"}', 1, 7, '2022-06-24 16:59:12', '2022-06-24 16:59:12', '2022-06-24 16:59:12'),
(23, 'staff_name', 'Staff name', 7, 0, '', '', '', '', '[]', 1, 7, '2022-06-24 16:59:44', '2022-06-24 16:59:44', '2022-06-24 16:59:44'),
(24, 'type_name', 'Staff Type Name', 7, 0, '', '', '', '', '{\"type\":\"string\"}', 1, 8, '2022-06-24 17:03:56', '2022-06-24 17:03:56', '2022-06-24 17:03:56'),
(25, 'staff_designation', 'Designation', 11, 0, '', 'Stafftypes', 'id', 'type_name', '{\"type\":\"string\"}', 1, 7, '2022-06-24 17:05:13', '2022-06-24 17:07:28', '2022-06-24 17:05:13'),
(26, 'staff_tel', 'Tel No.', 7, 0, '', '', '', '', '[]', 1, 7, '2022-06-24 17:07:08', '2022-06-24 17:07:08', '2022-06-24 17:07:08'),
(27, 'mo_serial_no', 'Serial No.', 7, 0, '', '', '', '', '{\"type\":\"string\"}', 1, 9, '2022-06-24 17:14:10', '2022-06-25 18:53:38', '2022-06-24 17:14:10'),
(28, 'mo_reg_no', 'Registration No.', 7, 0, '', '', '', '', '[]', 1, 9, '2022-06-24 17:14:52', '2022-06-25 18:52:37', '2022-06-24 17:14:52'),
(29, 'mo_nhis_no', 'NHIS No.', 7, 0, '', '', '', '', '[]', 0, 9, '2022-06-24 17:15:21', '2022-06-24 17:15:21', '2022-06-24 17:15:21'),
(30, 'mo_fullname', 'Full name', 7, 0, '', '', '', '', '[]', 1, 9, '2022-06-24 17:16:06', '2022-06-25 18:53:46', '2022-06-24 17:16:06'),
(31, 'mo_dob', 'Date of Birth', 5, 0, '', '', '', '', '{\"type\":\"date\"}', 0, 9, '2022-06-24 17:17:25', '2022-06-24 17:25:21', '2022-06-24 17:17:25'),
(32, 'mo_age', 'Age', 7, 0, '', '', '', '', '[]', 0, 9, '2022-06-24 17:19:42', '2022-06-24 17:19:42', '2022-06-24 17:19:42'),
(33, 'mo_address', 'Address', 7, 0, '', '', '', '', '[]', 0, 9, '2022-06-24 17:23:50', '2022-06-24 17:23:50', '2022-06-24 17:23:50'),
(34, 'mo_district', 'District', 11, 0, '', 'Districts', 'id', 'dist_name', '[]', 0, 9, '2022-06-24 17:24:32', '2022-06-24 17:24:32', '2022-06-24 17:24:32'),
(35, 'mo_landmark', 'Landmark', 7, 0, '', '', '', '', '[]', 0, 9, '2022-06-24 17:24:58', '2022-06-24 17:24:58', '2022-06-24 17:24:58'),
(36, 'mo_marital_status', 'Marital Status', 13, 0, 'Single,Married,Other', '', '', '', '{\"type\":\"string\"}', 0, 9, '2022-06-24 17:26:52', '2022-06-25 18:53:10', '2022-06-24 17:26:52'),
(37, 'mo_contact_1', 'Contact 1', 7, 0, '', '', '', '', '[]', 0, 9, '2022-06-24 17:29:41', '2022-06-24 17:29:41', '2022-06-24 17:29:41'),
(38, 'mo_contact_2', 'Contact 2', 7, 0, '', '', '', '', '[]', 0, 9, '2022-06-24 17:32:22', '2022-06-24 17:32:22', '2022-06-24 17:32:22'),
(39, 'mo_education_status', 'Educational Status', 13, 0, 'NONE,Primary,Junior High,Senior High,Tertiary,Other', '', '', '', '[]', 0, 9, '2022-06-24 17:34:30', '2022-06-24 17:34:30', '2022-06-24 17:34:30'),
(40, 'mo_occupation', 'Occupation', 7, 0, '', '', '', '', '[]', 0, 9, '2022-06-24 17:36:27', '2022-06-24 17:36:27', '2022-06-24 17:36:27'),
(41, 'mo_profession', 'Profession', 7, 0, '', '', '', '', '[]', 0, 9, '2022-06-24 17:37:08', '2022-06-24 17:37:08', '2022-06-24 17:37:08'),
(42, 'mo_spouse_name', 'Spouse\'s name', 7, 0, '', '', '', '', '[]', 0, 9, '2022-06-24 17:40:18', '2022-06-24 17:40:18', '2022-06-24 17:40:18'),
(43, 'mo_spouse_contact', 'Spouse Contact', 7, 0, '', '', '', '', '[]', 0, 9, '2022-06-24 17:40:42', '2022-06-24 17:40:42', '2022-06-24 17:40:42'),
(44, 'mo_spouse_address', 'Spouse Address', 7, 0, '', '', '', '', '[]', 0, 9, '2022-06-24 17:41:14', '2022-06-24 17:41:14', '2022-06-24 17:41:14'),
(45, 'mo_spouse_occupation', 'Spouse Occupation', 7, 0, '', '', '', '', '[]', 0, 9, '2022-06-24 17:41:50', '2022-06-24 17:41:50', '2022-06-24 17:41:50'),
(46, 'mo_emergency_person', 'Emergency Contact Person', 7, 0, '', '', '', '', '[]', 0, 9, '2022-06-24 17:44:40', '2022-06-24 17:44:40', '2022-06-24 17:44:40'),
(47, 'mo_emergency_contact', 'Emergency Contact', 7, 0, '', '', '', '', '[]', 0, 9, '2022-06-24 17:45:47', '2022-06-24 17:45:47', '2022-06-24 17:45:47'),
(48, 'staff', 'Staff', 11, 0, '', 'Staff', 'id', 'staff_name', '[]', 0, 9, '2022-06-24 17:50:25', '2022-06-24 17:50:25', '2022-06-24 17:50:25'),
(49, 'rec_mo_reg_no', 'Mother\'s Reg. No.', 11, 0, '', 'Mothers', 'id', 'mo_reg_no', '{\"type\":\"string\"}', 1, 10, '2022-06-24 18:05:52', '2022-06-25 19:05:39', '2022-06-24 18:05:52'),
(50, 'rec_no_of_pregnancies', 'No. of Pregnancies', 1, 0, '', '', '', '', '[]', 1, 10, '2022-06-24 18:08:16', '2022-06-25 19:05:59', '2022-06-24 18:08:16'),
(51, 'rec_no_of_births', 'No. of Births', 1, 0, '', '', '', '', '{\"type\":\"integer\"}', 1, 10, '2022-06-24 18:08:57', '2022-06-25 19:06:06', '2022-06-24 18:08:57'),
(52, 'rec_no_of_abortions', 'No. of Abortions', 1, 0, '', '', '', '', '[]', 0, 10, '2022-06-24 18:09:59', '2022-06-24 18:09:59', '2022-06-24 18:09:59'),
(53, 'rec_spontaneous', 'Spontaneous', 1, 0, '', '', '', '', '[]', 0, 10, '2022-06-24 18:10:34', '2022-06-24 18:10:34', '2022-06-24 18:10:34'),
(54, 'rec_induced', 'Induced', 1, 0, '', '', '', '', '[]', 0, 10, '2022-06-24 18:11:07', '2022-06-24 18:11:07', '2022-06-24 18:11:07'),
(55, 'birth_no', 'Birth No.', 7, 0, '', '', '', '', '{\"type\":\"string\"}', 1, 11, '2022-06-24 18:22:24', '2022-06-25 19:03:57', '2022-06-24 18:22:24'),
(56, 'birth_date', 'Birth Date', 5, 0, '', '', '', '', '{\"type\":\"date\"}', 1, 11, '2022-06-24 18:28:56', '2022-06-25 19:04:05', '2022-06-24 18:28:56'),
(57, 'place_of_birth', 'Place of Birth', 13, 0, 'Hospital,HC,MH,CHPS,Home,Other', '', '', '', '{\"type\":\"string\"}', 0, 11, '2022-06-24 18:30:38', '2022-06-24 18:30:38', '2022-06-24 18:30:38'),
(58, 'mode_of_delivery', 'Mode of Delivery', 13, 0, 'SVD,AVD,CS', '', '', '', '[]', 0, 11, '2022-06-24 18:31:44', '2022-06-24 18:31:44', '2022-06-24 18:31:44'),
(59, 'outcome_of_delivery', 'Outcome of Delivery', 13, 0, 'Live birth,Still birth,Miscarriage', '', '', '', '[]', 0, 11, '2022-06-24 18:33:29', '2022-06-24 18:33:29', '2022-06-24 18:33:29'),
(60, 'sex', 'Sex', 14, 0, 'male,female', '', '', '', '[]', 0, 11, '2022-06-24 18:34:11', '2022-06-24 18:34:11', '2022-06-24 18:34:11'),
(61, 'child_present_condition', 'Child\'s Present Condition', 13, 0, 'Good,Poor,Died', '', '', '', '[]', 0, 11, '2022-06-24 18:36:03', '2022-06-24 18:36:03', '2022-06-24 18:36:03'),
(62, 'major_risk_factors', 'Major Risk Factors', 13, 0, 'Select Option,Previous CS,Grand multiparity,Previous Post-Partum Haemorrhage,Previous Pregnancy Induced Hypertension', '', '', '', '[]', 0, 11, '2022-06-24 18:38:23', '2022-06-24 18:38:23', '2022-06-24 18:38:23'),
(63, 'pregnancy_problems', 'Problems during Pregnancy', 7, 0, '', '', '', '', '[]', 0, 11, '2022-06-24 18:39:23', '2022-06-24 18:39:23', '2022-06-24 18:39:23'),
(64, 'gestational_age', 'Gestational Age at Birth', 7, 0, '', '', '', '', '[]', 0, 11, '2022-06-24 18:40:05', '2022-06-24 18:40:05', '2022-06-24 18:40:05'),
(65, 'birth_weight', 'Birth Weight (kg)', 7, 0, '', '', '', '', '{\"type\":\"integer\"}', 0, 11, '2022-06-24 18:40:57', '2022-06-24 18:40:57', '2022-06-24 18:40:57'),
(66, 'labour_complications', 'Labour/ Postpartum Complications', 7, 0, '', '', '', '', '{\"type\":\"string\"}', 0, 11, '2022-06-24 18:42:12', '2022-06-24 18:42:12', '2022-06-24 18:42:12'),
(67, 'birth_mother_reg_no', 'Mother Reg No.', 11, 0, '', 'Mothers', 'id', 'mo_reg_no', '[]', 1, 11, '2022-06-24 18:45:27', '2022-06-25 19:03:35', '2022-06-24 18:45:27'),
(68, 'date', 'Date', 5, 0, '', '', '', '', '{\"type\":\"date\"}', 1, 12, '2022-06-24 19:08:22', '2022-06-25 19:10:51', '2022-06-24 19:08:22'),
(69, 'weight', 'Weight (kg)', 7, 0, '', '', '', '', '{\"type\":\"string\"}', 0, 12, '2022-06-24 19:08:58', '2022-06-24 19:08:58', '2022-06-24 19:08:58'),
(70, 'bp', 'BP (mmHg)', 7, 0, '', '', '', '', '[]', 0, 12, '2022-06-24 19:09:41', '2022-06-24 19:09:41', '2022-06-24 19:09:41'),
(71, 'urine', 'Urine', 7, 0, '', '', '', '', '[]', 0, 12, '2022-06-24 19:09:59', '2022-06-24 19:09:59', '2022-06-24 19:09:59'),
(72, 'gest_age', 'Gestation Age (weeks)', 7, 0, '', '', '', '', '[]', 0, 12, '2022-06-24 19:10:39', '2022-06-24 19:10:39', '2022-06-24 19:10:39'),
(73, 'fundal_heights', 'Fundal Height (cm)', 7, 0, '', '', '', '', '[]', 0, 12, '2022-06-24 19:11:24', '2022-06-24 19:11:24', '2022-06-24 19:11:24'),
(74, 'presentation', 'Presentation', 7, 0, '', '', '', '', '[]', 0, 12, '2022-06-24 19:12:28', '2022-06-24 19:12:28', '2022-06-24 19:12:28'),
(75, 'descent', 'Descent', 7, 0, '', '', '', '', '[]', 0, 12, '2022-06-24 19:12:58', '2022-06-24 19:12:58', '2022-06-24 19:12:58'),
(76, 'fetal_heart_rate', 'Fetal heart rate (/bpm)', 7, 0, '', '', '', '', '[]', 0, 12, '2022-06-24 19:13:39', '2022-06-24 19:13:39', '2022-06-24 19:13:39'),
(77, 'ifa_supply_days', 'No. of days IFA supplied', 7, 0, '', '', '', '', '[]', 0, 12, '2022-06-24 19:15:06', '2022-06-24 19:15:06', '2022-06-24 19:15:06'),
(78, 'complaints', 'Complaints/Remarks', 7, 0, '', '', '', '', '[]', 0, 12, '2022-06-24 19:15:43', '2022-06-24 19:15:43', '2022-06-24 19:15:43'),
(79, 'staff', 'Name of Midwife', 11, 0, '', 'Staff', 'id', 'staff_name', '[]', 1, 12, '2022-06-24 19:17:09', '2022-06-25 19:12:00', '2022-06-24 19:17:09'),
(80, 'mo_reg_no', 'Mother\'s Reg No.', 11, 0, '', 'Mothers', 'id', 'mo_reg_no', '[]', 1, 12, '2022-06-24 19:22:13', '2022-06-25 19:11:09', '2022-06-24 19:22:13'),
(81, 'date', 'Date', 5, 0, '', '', '', '', '{\"type\":\"date\"}', 1, 13, '2022-06-24 19:33:23', '2022-06-25 08:41:31', '2022-06-24 19:33:23'),
(82, 'pregnancy_weeks', 'Weeks of Pregnancy', 7, 0, '', '', '', '', '{\"type\":\"string\"}', 0, 13, '2022-06-24 19:34:25', '2022-06-25 08:41:19', '2022-06-24 19:34:25'),
(83, 'delivery_time', 'Time of Delivery', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 19:35:30', '2022-06-25 08:41:40', '2022-06-24 19:35:30'),
(84, 'placenta_delivery', 'Time of Placenta delivery', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 19:36:07', '2022-06-25 09:15:35', '2022-06-24 19:36:07'),
(85, 'labour_in_delivery_duration', 'Duration of labour in delivery (H&m)', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 19:36:57', '2022-06-25 09:15:42', '2022-06-24 19:36:57'),
(86, 'delivery_type', 'Type of Delivery', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 19:37:28', '2022-06-25 09:15:49', '2022-06-24 19:37:28'),
(87, 'vacuum_indication', 'Indication of vacuum/CS', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 19:38:08', '2022-06-25 09:15:54', '2022-06-24 19:38:08'),
(88, 'anesthesia', 'Anesthesia', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 19:38:36', '2022-06-25 09:16:01', '2022-06-24 19:38:36'),
(89, 'est_blood_loss', 'Estimated blood loss (ml)', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 19:39:07', '2022-06-25 09:16:07', '2022-06-24 19:39:07'),
(90, 'blood_transfusion', 'Blood tranfusion', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 19:39:44', '2022-06-25 09:16:22', '2022-06-24 19:39:44'),
(91, 'placenta_state', 'State of Placenta & membranes', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 19:40:22', '2022-06-25 09:16:58', '2022-06-24 19:40:22'),
(92, 'perineum_state', 'State of Perineum', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 19:41:01', '2022-06-25 09:17:15', '2022-06-24 19:41:01'),
(93, 'delivery_complications', 'Labour and Delivery Complications', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 19:41:37', '2022-06-25 09:17:22', '2022-06-24 19:41:37'),
(94, 'birth_attendant', 'Name of Birth attendant', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 19:42:43', '2022-06-25 09:17:28', '2022-06-24 19:42:43'),
(95, 'place_of_delivery', 'Place of Delivery', 11, 0, '', 'Facility', 'id', 'fac_name', '[]', 0, 13, '2022-06-24 19:44:11', '2022-06-25 09:17:35', '2022-06-24 19:44:11'),
(96, 'brestfeeding_30min', 'Did breatfeeding start within 30min after delivery?', 14, 0, 'Yes,No', '', '', '', '[]', 0, 13, '2022-06-24 19:45:46', '2022-06-25 09:17:59', '2022-06-24 19:45:46'),
(97, 'infant_skin_to_skin', 'Was infant placed in skin to skin contact with mother?', 14, 0, 'Yes,No', '', '', '', '[]', 0, 13, '2022-06-24 19:46:25', '2022-06-25 09:18:05', '2022-06-24 19:46:25'),
(98, 'mothers_condition', 'Mother\'s Condition at Discharge', 13, 0, 'Poor,Excellent,Died', '', '', '', '[]', 0, 13, '2022-06-24 19:52:13', '2022-06-25 09:18:20', '2022-06-24 19:52:13'),
(99, 'bp', 'BP (mm/Hg)', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 19:53:45', '2022-06-25 09:18:38', '2022-06-24 19:53:45'),
(100, 'pulse', 'Pulse (b/min)', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 19:54:05', '2022-06-25 09:20:35', '2022-06-24 19:54:05'),
(101, 'temperature', 'Temperature', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 19:54:30', '2022-06-25 09:20:45', '2022-06-24 19:54:30'),
(102, 'uterus_condition', 'Condition of Uterus', 13, 0, 'Contracted,Not Contracted', '', '', '', '[]', 0, 13, '2022-06-24 19:55:15', '2022-06-25 09:20:52', '2022-06-24 19:55:15'),
(103, 'incision_perineum', 'Incision perineum/CS', 13, 0, 'Clean,Infected,Other', '', '', '', '[]', 0, 13, '2022-06-24 19:56:10', '2022-06-25 09:21:02', '2022-06-24 19:56:10'),
(104, 'breast_condition', 'Condition of Breast', 13, 0, 'Lactating,Not Lactating,Engorged', '', '', '', '[]', 0, 13, '2022-06-24 19:57:11', '2022-06-25 09:21:09', '2022-06-24 19:57:11'),
(105, 'fundal_height', 'Fundal height (cm)', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 19:57:37', '2022-06-25 09:21:16', '2022-06-24 19:57:37'),
(106, 'lochia_colour', 'Lochia colour', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 19:58:01', '2022-06-24 19:58:01', '2022-06-24 19:58:01'),
(107, 'lochia_odour', 'Lochia Odour', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 19:58:27', '2022-06-24 19:58:27', '2022-06-24 19:58:27'),
(108, 'ifa_supply_days', 'No. of days IFA Supplied', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 19:58:52', '2022-06-24 19:58:52', '2022-06-24 19:58:52'),
(109, 'pnc_type_1', 'PNC Type', 13, 0, 'PNC1 (24 - 48hrs),PNC2 (6th - 7thday),PNC3 (at 6weeks)', '', '', '', '[]', 0, 13, '2022-06-24 20:03:20', '2022-06-24 20:03:20', '2022-06-24 20:03:20'),
(110, 'delivery_outcome', 'Baby\'s Delivery Outcome', 13, 0, 'Live Birth,Still Birth,Early Neonatal death', '', '', '', '[]', 0, 13, '2022-06-24 20:06:13', '2022-06-24 20:06:13', '2022-06-24 20:06:13'),
(111, 'number_of_babies', 'Number of Babies', 13, 0, 'Single,Twin,Triplet,Other', '', '', '', '[]', 0, 13, '2022-06-24 20:07:11', '2022-06-24 20:07:11', '2022-06-24 20:07:11'),
(112, 'baby_sex', 'Sex of Baby', 14, 0, 'Male,Female', '', '', '', '[]', 0, 13, '2022-06-24 20:07:49', '2022-06-24 20:07:49', '2022-06-24 20:07:49'),
(113, 'weight', 'Weight (kg)', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 20:08:51', '2022-06-24 20:08:51', '2022-06-24 20:08:51'),
(114, 'length', 'Length (cm)', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 20:09:18', '2022-06-24 20:09:18', '2022-06-24 20:09:18'),
(115, 'circumference', 'Head circumference', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 20:09:42', '2022-06-24 20:09:42', '2022-06-24 20:09:42'),
(116, 'apgar_score', 'APGAR Score', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 20:10:29', '2022-06-24 20:10:29', '2022-06-24 20:10:29'),
(117, 'resuscitation', 'Resuscitation', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 20:10:48', '2022-06-24 20:10:48', '2022-06-24 20:10:48'),
(118, 'congenital_malformation', 'Congenital Malformation', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 20:11:09', '2022-06-24 20:11:09', '2022-06-24 20:11:09'),
(119, 'complications', 'Complications at Birth', 13, 0, 'Yes,No', '', '', '', '[]', 0, 13, '2022-06-24 20:12:03', '2022-06-24 20:12:03', '2022-06-24 20:12:03'),
(120, 'diagnosis', 'Diagnosis', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 20:12:27', '2022-06-24 20:12:27', '2022-06-24 20:12:27'),
(121, 'referred_to', 'Referred to', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 20:12:52', '2022-06-24 20:12:52', '2022-06-24 20:12:52'),
(122, 'heart_rate', 'Heart rate (b/min)', 7, 0, '', '', '', '', '[]', 0, 13, '2022-06-24 20:14:12', '2022-06-24 20:14:12', '2022-06-24 20:14:12'),
(123, 'respiratory_rate', 'Respiratory rate (c/min)', 7, 0, '', '', '', '', '{\"type\":\"string\"}', 0, 13, '2022-06-25 07:50:31', '2022-06-25 07:50:31', '2022-06-25 07:50:31'),
(124, 'brestfeeding', 'Breastfeeding/ Breast milk initiation', 14, 0, 'Yes,No', '', '', '', '[]', 0, 13, '2022-06-25 07:57:37', '2022-06-25 07:57:37', '2022-06-25 07:57:37'),
(125, 'baby_suckling', 'Baby suckling established', 14, 0, 'Yes,No', '', '', '', '[]', 0, 13, '2022-06-25 08:14:34', '2022-06-25 08:14:34', '2022-06-25 08:14:34'),
(126, 'meconium_passed', 'Meconium passed', 14, 0, 'Yes,No', '', '', '', '[]', 0, 13, '2022-06-25 08:16:21', '2022-06-25 08:16:21', '2022-06-25 08:16:21'),
(127, 'urine_passed', 'Urine passed', 14, 0, 'Yes,No', '', '', '', '[]', 0, 13, '2022-06-25 08:17:10', '2022-06-25 08:17:10', '2022-06-25 08:17:10'),
(128, 'tetracycle_for_eyecare', 'Chloramphenicol/ Tetracycle for eye care', 14, 0, 'Yes,No', '', '', '', '[]', 0, 13, '2022-06-25 08:20:43', '2022-06-25 08:20:43', '2022-06-25 08:20:43'),
(129, 'cord_care', 'Cord care', 14, 0, 'Yes,No', '', '', '', '[]', 0, 13, '2022-06-25 08:21:21', '2022-06-25 08:21:21', '2022-06-25 08:21:21'),
(130, 'baby_condition_discharge', 'Baby\'s Condition at discharge', 13, 0, 'Normal,Abnormal', '', '', '', '[]', 0, 13, '2022-06-25 08:22:23', '2022-06-25 08:22:23', '2022-06-25 08:22:23'),
(131, 'mo_reg_no', 'Mother\'s Registration No.', 11, 0, '', 'Mothers', 'id', 'mo_reg_no', '{\"type\":\"string\"}', 1, 13, '2022-06-25 10:27:43', '2022-06-25 10:27:43', '2022-06-25 10:27:43'),
(132, 'date', 'Date', 5, 0, '', '', '', '', '{\"type\":\"date\"}', 1, 14, '2022-06-25 15:09:10', '2022-06-25 15:09:10', '2022-06-25 15:09:10'),
(133, 'weight', 'Weight (kg)', 7, 0, '', '', '', '', '{\"type\":\"string\"}', 0, 14, '2022-06-25 15:10:02', '2022-06-25 15:11:47', '2022-06-25 15:10:02'),
(134, 'bp', 'BP (mmHg)', 7, 0, '', '', '', '', '[]', 0, 14, '2022-06-25 15:10:58', '2022-06-25 15:12:09', '2022-06-25 15:10:58'),
(135, 'urine', 'Urine', 7, 0, '', '', '', '', '[]', 0, 14, '2022-06-25 15:11:18', '2022-06-25 15:12:21', '2022-06-25 15:11:18'),
(136, 'pulse', 'Pulse', 7, 0, '', '', '', '', '[]', 0, 14, '2022-06-25 15:11:39', '2022-06-25 15:11:39', '2022-06-25 15:11:39'),
(137, 'fundal_height', 'Fundal Height (cm)', 7, 0, '', '', '', '', '{\"type\":\"string\"}', 0, 14, '2022-06-25 15:13:08', '2022-06-25 15:13:08', '2022-06-25 15:13:08'),
(138, 'temperature', 'Temperature', 7, 0, '', '', '', '', '[]', 0, 14, '2022-06-25 15:13:34', '2022-06-25 15:13:34', '2022-06-25 15:13:34'),
(139, 'lochia_colour', 'Lochia Colour/Odour', 7, 0, '', '', '', '', '[]', 0, 14, '2022-06-25 15:14:07', '2022-06-25 15:14:14', '2022-06-25 15:14:07'),
(140, 'breast_condition', 'Condition of Breast  & nipple', 7, 0, '', '', '', '', '{\"type\":\"string\"}', 0, 14, '2022-06-25 15:14:49', '2022-06-25 15:14:49', '2022-06-25 15:14:49'),
(141, 'ifa_supplied_days', 'No. of days IFA supplied', 7, 0, '', '', '', '', '[]', 0, 14, '2022-06-25 15:15:33', '2022-06-25 15:15:33', '2022-06-25 15:15:33'),
(142, 'complaints', 'Complaints/Remarks', 7, 0, '', '', '', '', '[]', 0, 14, '2022-06-25 15:15:58', '2022-06-25 15:15:58', '2022-06-25 15:15:58'),
(143, 'staff_id', 'Name of Midwife/Nurse', 11, 0, '', 'Staff', 'id', 'staff_name', '[]', 0, 14, '2022-06-25 15:16:42', '2022-06-25 15:28:18', '2022-06-25 15:16:42'),
(144, 'incision_perineum', 'Incision Perineum/CS', 13, 0, 'Clean,Infected', '', '', '', '[]', 0, 14, '2022-06-25 15:25:09', '2022-06-25 15:25:20', '2022-06-25 15:25:09'),
(145, 'mood_changes', 'Mood Changes', 13, 0, 'Yes,No', '', '', '', '[]', 0, 14, '2022-06-25 15:26:12', '2022-06-25 15:26:22', '2022-06-25 15:26:12'),
(146, 'mo_reg_no', 'Mother\'s Reg No.', 11, 0, '', 'Mothers', 'id', 'mo_reg_no', '[]', 1, 14, '2022-06-25 15:27:38', '2022-06-25 15:31:41', '2022-06-25 15:27:38'),
(147, 'date', 'Date', 5, 0, '', '', '', '', '{\"type\":\"date\"}', 1, 15, '2022-06-25 15:37:28', '2022-06-25 15:37:28', '2022-06-25 15:37:28'),
(148, 'weight', 'Weight', 7, 0, '', '', '', '', '{\"type\":\"string\"}', 0, 15, '2022-06-25 15:37:50', '2022-06-25 15:37:50', '2022-06-25 15:37:50'),
(149, 'age', 'Age (months)', 7, 0, '', '', '', '', '[]', 0, 15, '2022-06-25 15:38:38', '2022-06-25 15:38:38', '2022-06-25 15:38:38'),
(150, 'length', 'Length/Height (cm)', 7, 0, '', '', '', '', '[]', 0, 15, '2022-06-25 15:39:11', '2022-06-25 15:39:11', '2022-06-25 15:39:11'),
(151, 'complaints', 'Complaints / Remarks', 7, 0, '', '', '', '', '[]', 0, 15, '2022-06-25 15:40:01', '2022-06-25 15:40:01', '2022-06-25 15:40:01'),
(152, 'staff_id', 'Name of Midwife / Nurse', 11, 0, '', 'Staff', 'id', 'staff_name', '[]', 1, 15, '2022-06-25 15:42:01', '2022-06-25 15:42:01', '2022-06-25 15:42:01'),
(153, 'ch_reg_no', 'Child\'s Reg No.', 7, 0, '', '', '', '', '{\"type\":\"string\"}', 1, 15, '2022-06-25 16:17:33', '2022-06-25 16:17:33', '2022-06-25 16:17:33'),
(154, 'mo_reg_no', 'Mother\'s Reg No.', 11, 0, '', 'Mothers', 'id', 'mo_reg_no', '[]', 1, 15, '2022-06-25 16:24:47', '2022-06-25 16:24:47', '2022-06-25 16:24:47'),
(155, 'ch_reg_no', 'Childs Reg No.', 7, 0, '', '', '', '', '{\"type\":\"string\"}', 1, 16, '2022-06-25 16:37:57', '2022-06-25 16:37:57', '2022-06-25 16:37:57'),
(156, 'mo_reg_no', 'Mother\'s Reg No.', 7, 0, '', '', '', '', '[]', 1, 16, '2022-06-25 16:38:38', '2022-06-25 16:38:38', '2022-06-25 16:38:38'),
(157, 'age', 'Age', 13, 0, 'At birth,6 weeks,10 weeks,14 weeks,9 months,18 months', '', '', '', '[]', 0, 16, '2022-06-25 16:40:04', '2022-06-25 16:40:13', '2022-06-25 16:40:04'),
(158, 'vaccine', 'Vaccine', 13, 0, '1(BCG) / 2(OPV 0) / 3(Hepatitis B),1(OPV 1) / 2(DPT/Hep B/Hib 1) / 3(Pneumcoccal 1) / 4(Rotavirus 1),1(OPV 2) / 2(DPT/Hep B/Hib 2) / 3(Pneumcoccal 2) / 4(Rotavirus 2),1(OPV 3) / 2(DPT/Hep B/Hib 3) / 3(Pneumcoccal 3) / 4(IPV),1(Measles-Rubella 1) / 2(Yellow fever),1(Measles-Rubella 2) / 2(Meningitis A) / 3(LLIN),Other Vaccine', '', '', '', '{\"type\":\"string\"}', 0, 16, '2022-06-25 16:43:08', '2022-06-25 17:22:31', '2022-06-25 16:43:08'),
(159, 'batch_no', 'Batch No.', 7, 0, '', '', '', '', '[]', 0, 16, '2022-06-25 16:55:43', '2022-06-25 16:55:43', '2022-06-25 16:55:43'),
(160, 'place_given', 'Place given', 7, 0, '', '', '', '', '[]', 0, 16, '2022-06-25 16:56:33', '2022-06-25 16:59:41', '2022-06-25 16:56:33'),
(161, 'staff_id', 'Name of Midwife/Nurse', 11, 0, '', 'Staff', 'id', 'staff_name', '[]', 0, 16, '2022-06-25 17:21:33', '2022-06-25 17:21:33', '2022-06-25 17:21:33'),
(162, 'other_vaccine', 'Other vaccine ( if applicable )', 7, 0, '', '', '', '', '[]', 0, 16, '2022-06-25 17:23:09', '2022-06-25 17:23:09', '2022-06-25 17:23:09'),
(163, 'date', 'Date', 5, 0, '', '', '', '', '{\"type\":\"date\"}', 1, 16, '2022-06-25 17:23:28', '2022-06-25 17:23:28', '2022-06-25 17:23:28'),
(164, 'mo_reg_date', 'Rgistration date', 5, 0, '', '', '', '', '{\"type\":\"date\"}', 1, 9, '2022-06-25 18:54:27', '2022-06-25 18:54:27', '2022-06-25 18:54:27'),
(165, 'for_name', 'Name', 7, 0, '', '', '', '', '{\"type\":\"string\"}', 1, 17, '2022-07-28 22:23:06', '2022-07-28 22:23:06', '2022-07-28 22:23:06');

-- --------------------------------------------------------

--
-- Table structure for table `Mothers`
--

CREATE TABLE `Mothers` (
  `id` int(10) UNSIGNED NOT NULL,
  `mo_serial_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_reg_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_nhis_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_dob` date NOT NULL,
  `mo_age` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_district` int(11) NOT NULL,
  `mo_landmark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_marital_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_contact_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_contact_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_education_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_occupation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_profession` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_spouse_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_spouse_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_spouse_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_spouse_occupation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_emergency_person` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_emergency_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff` int(11) NOT NULL,
  `mo_reg_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Mothers`
--

INSERT INTO `Mothers` (`id`, `mo_serial_no`, `mo_reg_no`, `mo_nhis_no`, `mo_fullname`, `mo_dob`, `mo_age`, `mo_address`, `mo_district`, `mo_landmark`, `mo_marital_status`, `mo_contact_1`, `mo_contact_2`, `mo_education_status`, `mo_occupation`, `mo_profession`, `mo_spouse_name`, `mo_spouse_contact`, `mo_spouse_address`, `mo_spouse_occupation`, `mo_emergency_person`, `mo_emergency_contact`, `staff`, `mo_reg_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '001', '001', '380277', 'Edem Aziedu', '1992-12-11', '30', 'Afabeng', 1, 'Adi Lake Resort', 'Single', '0591185541', '0503211670', 'Junior High', 'Business Woman', 'Selling of Abolo', 'Ben Gamor', '0503211670', 'Afabeng', 'Masonry', 'Ben Gamor', '0503211670', 1, '2022-08-11', '2022-08-11 21:35:24', '2022-08-11 21:35:24', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0109992f95079a064d433fc7e5851dae08f4f663182fae34ff8096bd1d7dfd16bf6f268278727ffd', 3, 1, 'appbuilder_token', '[]', 0, '2022-09-08 11:31:28', '2022-09-08 11:31:28', '2023-09-08 11:31:28'),
('01d632bc271a330fd776e46f623e565a6f4af56f7988614624954370783148537894997b92c3bf5e', 3, 1, 'appbuilder_token', '[]', 0, '2022-08-04 15:12:25', '2022-08-04 15:12:25', '2023-08-04 15:12:25'),
('06760a862ab1181045ced2bb668a5b1b52cc58e35daa7aa27826912707e5e0f20e50fb2b2b74b682', 1, 1, 'appbuilder_token', '[]', 0, '2022-08-05 08:47:52', '2022-08-05 08:47:52', '2023-08-05 08:47:52'),
('06f7dbd864bbf5e06ad477b0a5736b2eaec7e1c02e91538ee3af9ae4008454f658295715699f7c9c', 1, 1, 'appbuilder_token', '[]', 0, '2022-08-12 16:07:35', '2022-08-12 16:07:35', '2023-08-12 16:07:35'),
('072f4cdd147098cdc3514bbe3d4f62c2a78e2441df7c4f4c99ae4764ac418ad025cc3dd829cc03e0', 3, 1, 'appbuilder_token', '[]', 0, '2022-07-26 11:50:37', '2022-07-26 11:50:37', '2023-07-26 11:50:37'),
('086f06547f31c2aceef7aeacb7bb3a3bb58fd0e43feea4a297f9645f7fd52eae436a1c2a89467a27', 3, 1, 'appbuilder_token', '[]', 0, '2022-07-18 14:01:24', '2022-07-18 14:01:24', '2023-07-18 14:01:24'),
('0e56ddeae29db86135ea0d00bf7c319b446a07f6f972f7732c5039085308cf448d206a6169061937', 3, 1, 'appbuilder_token', '[]', 0, '2022-08-14 15:42:52', '2022-08-14 15:42:52', '2023-08-14 15:42:52'),
('0f95a54fd95045524b2c3e1c84425d017f0b7ce2fd40e6d4466784d372d44631bf43c2261ec6a3b9', 2, 1, 'appbuilder_token', '[]', 0, '2021-03-17 20:05:11', '2021-03-17 20:05:11', '2022-03-17 22:05:11'),
('15ca5ef5c0c25dc0efe3c97ab13d2019a639ba6d0778732dfe692a3b07ff0a5bca81bfe5901d415c', 3, 1, 'appbuilder_token', '[]', 0, '2022-07-25 11:45:20', '2022-07-25 11:45:20', '2023-07-25 11:45:20'),
('16c60295846f87e818ac4a4e73492b10e7fac6c16dc3aee5302da21d3eae757d27e9cebb76678c1b', 3, 1, 'appbuilder_token', '[]', 0, '2022-08-03 06:08:07', '2022-08-03 06:08:07', '2023-08-03 06:08:07'),
('1ad08568d802af3272940e43584f3401ceccc830fafa28f3626f3376db49a899c380d1d3ed215909', 3, 1, 'appbuilder_token', '[]', 0, '2022-09-08 12:46:19', '2022-09-08 12:46:19', '2023-09-08 12:46:19'),
('1f0b49944f279f3fabd8cf51be79887194cc478dc011f796e590a3113ce8e2fa3de60b2d77f8e211', 1, 1, 'appbuilder_token', '[]', 0, '2021-03-17 18:57:19', '2021-03-17 18:57:19', '2022-03-17 20:57:19'),
('2afb9d41bb41240bb6a5bc277545eae121d6bceba46e1df5dcdb6fcf9ad075b46ded1359269f74a5', 3, 1, 'appbuilder_token', '[]', 0, '2022-08-01 05:12:52', '2022-08-01 05:12:52', '2023-08-01 05:12:52'),
('33dd03dbe030eca5e9a459683398fcd68cd6315d9d573359098a0c52f5724a08b6d7c3940513ed71', 1, 1, 'appbuilder_token', '[]', 0, '2022-06-16 14:10:24', '2022-06-16 14:10:24', '2023-06-16 14:10:24'),
('380075fb3815d01941a2718657b8f0efd564acf3a68bbefd808d3f8dc1b7aadeef1518cc5ec1792d', 3, 1, 'appbuilder_token', '[]', 0, '2022-06-25 19:12:48', '2022-06-25 19:12:48', '2023-06-25 19:12:48'),
('3c7e463f9f849766ea9c16beb6e14ba0da59e756841562a8800ec71ab820dbd2647cb3e22242a48a', 3, 1, 'appbuilder_token', '[]', 0, '2022-08-08 15:04:17', '2022-08-08 15:04:17', '2023-08-08 15:04:17'),
('4163e2c0135d5f2d6d70ab73df18b3b54bb13b9a109892ac08d7ff9ee348a28c0aeaa98beab09078', 3, 1, 'appbuilder_token', '[]', 0, '2022-10-21 14:37:51', '2022-10-21 14:37:51', '2023-10-21 14:37:51'),
('4221a0fcec6bde3402aeb0951c7f0ec906b1245a3f630614624fa202cd7664ad931708223ab430d0', 3, 1, 'appbuilder_token', '[]', 0, '2022-08-01 05:03:55', '2022-08-01 05:03:55', '2023-08-01 05:03:55'),
('462567c447654604b9ad6075afcee20358b366ce276b796560c94a00db00654ccba89d206a5e5763', 3, 1, 'appbuilder_token', '[]', 0, '2022-08-10 09:00:40', '2022-08-10 09:00:40', '2023-08-10 09:00:40'),
('49482da66fc95eb3ecd423348773ff7e9f2582e78fbb13a6ca7cf1bb722f037eb9a01235819b43a8', 3, 1, 'appbuilder_token', '[]', 0, '2022-06-25 20:54:45', '2022-06-25 20:54:45', '2023-06-25 20:54:45'),
('4a001810ba5be207822c1b04764d5c3c3570dee51f0f13d2173fb478c2ec0c7698cf8c5a38e14fdd', 1, 1, 'appbuilder_token', '[]', 0, '2022-06-25 18:32:51', '2022-06-25 18:32:51', '2023-06-25 18:32:51'),
('4a0d0ad30fec10dfdb6863920832db29598fac45ed5c0100a036d95748c7a0c8acdbf3c071677deb', 5, 1, 'appbuilder_token', '[]', 0, '2022-08-12 16:26:34', '2022-08-12 16:26:34', '2023-08-12 16:26:34'),
('54f43d8694cec7e23dc10ab746a28c5af5d6a445d3468c478d8c39164e8d4e1675ed9c8d0915318d', 3, 1, 'appbuilder_token', '[]', 0, '2022-10-26 20:07:55', '2022-10-26 20:07:55', '2023-10-26 20:07:55'),
('5956cf115e0a968fc830744a06b61d3f42ce55f5fd8d857a912275101e373d7a1ae44996b2abde40', 3, 1, 'appbuilder_token', '[]', 0, '2022-08-12 16:16:21', '2022-08-12 16:16:21', '2023-08-12 16:16:21'),
('5af9e1b92cb52a7811461bfa1d584d8c018e04a43a2aa17dc289b28f499a8091bcf7472f11c6c03a', 3, 1, 'appbuilder_token', '[]', 0, '2022-08-05 10:26:07', '2022-08-05 10:26:07', '2023-08-05 10:26:07'),
('62a2b686e856ee15ac09ef5477358017b3486a7d9dbc13d10c82c5ee2458b00be716dfdadd91a974', 1, 1, 'appbuilder_token', '[]', 0, '2022-07-28 22:18:58', '2022-07-28 22:18:58', '2023-07-28 22:18:58'),
('64f0a701476361594515427d5497294a2b4413f768ea3151f033c864f4501b58dbe3fd3db3385abd', 1, 1, 'appbuilder_token', '[]', 0, '2022-06-25 18:48:54', '2022-06-25 18:48:54', '2023-06-25 18:48:54'),
('651442e5de9075da83f80db8aece3c4fe36b04bc8cda9dc6f5fe8b9dd3f11e8c53049b0a2a4e0388', 3, 1, 'appbuilder_token', '[]', 0, '2022-08-09 21:20:55', '2022-08-09 21:20:55', '2023-08-09 21:20:55'),
('6622ede98af26e4df095324abaa39e9e7d70af003e81dab759f1ad7e473f0dc085973f80da04ecdc', 3, 1, 'appbuilder_token', '[]', 0, '2022-06-28 10:32:23', '2022-06-28 10:32:23', '2023-06-28 10:32:23'),
('6c750c702133de51866e31cc0fc2ea0570bee266fb81a56a909a7c262ff50feab62a49b132f36ef8', 3, 1, 'appbuilder_token', '[]', 0, '2022-08-02 03:58:01', '2022-08-02 03:58:01', '2023-08-02 03:58:01'),
('7108c42dddc57285c86b0beef5348ec17af3f6a8f8c52c58e169843a6a53cbe7204b274081a54290', 1, 1, 'appbuilder_token', '[]', 0, '2022-08-02 04:46:29', '2022-08-02 04:46:29', '2023-08-02 04:46:29'),
('749f56d98454864ef5c21fb2274f8db25b3077d1297680319f69ec9b870352b30f7f2dc5e9ea406c', 3, 1, 'appbuilder_token', '[]', 0, '2022-06-25 20:51:50', '2022-06-25 20:51:50', '2023-06-25 20:51:50'),
('77e0cac59a33add4f2e193adff0b05b9cefa86695f6b09a966a4e66dbe832228264f7c25162c82c3', 3, 1, 'appbuilder_token', '[]', 0, '2022-08-10 10:57:54', '2022-08-10 10:57:54', '2023-08-10 10:57:54'),
('7961f6d7cee7ad4a4b9536ee415c344401a78810d684ceadaf7549323c31d74566e5bfeb472dc80b', 3, 1, 'appbuilder_token', '[]', 0, '2022-08-03 16:25:05', '2022-08-03 16:25:05', '2023-08-03 16:25:05'),
('7daa4763e21ae3a35661437eb42a418facc316d175013260c725877f2d483914fcfa8b88098aed38', 1, 1, 'appbuilder_token', '[]', 0, '2022-08-15 13:21:17', '2022-08-15 13:21:17', '2023-08-15 13:21:17'),
('86c0eb620364a4665c7fcbbc4987320dcc18de0203c65010ded72601677759197dbfe4dac8a6a375', 1, 1, 'appbuilder_token', '[]', 0, '2022-06-25 07:42:10', '2022-06-25 07:42:10', '2023-06-25 07:42:10'),
('894f035b9639a8af48f9ea248efb8ed7bae5a5d03e865473890050ce6827aa71d834014b91e41983', 3, 1, 'appbuilder_token', '[]', 0, '2022-10-17 10:22:31', '2022-10-17 10:22:31', '2023-10-17 10:22:31'),
('8c540bc37527902d04721133ec7f4d84bb3d2fe20829c58444c25e83c4a3b68b38d9b4981f6089fc', 1, 1, 'appbuilder_token', '[]', 0, '2022-06-25 14:58:16', '2022-06-25 14:58:16', '2023-06-25 14:58:16'),
('8d43d071cdf8588e6979b535a70a1be21daa4b02d08247b651b7555908c9def053ecef8cadb8d2ce', 3, 1, 'appbuilder_token', '[]', 0, '2022-07-19 14:02:23', '2022-07-19 14:02:23', '2023-07-19 14:02:23'),
('8f76c1fb9ea8968251667fbb352124cb6d467f93c37b853ade6221f907428466e1ccc9359ac1889f', 3, 1, 'appbuilder_token', '[]', 0, '2022-10-27 14:35:15', '2022-10-27 14:35:15', '2023-10-27 14:35:15'),
('99c3bf14428ee2d99e2ca62f5d9434f2daa4835ff59dec17e8e0487f74015e29fdd782162c2756d0', 3, 1, 'appbuilder_token', '[]', 0, '2022-08-02 09:16:35', '2022-08-02 09:16:35', '2023-08-02 09:16:35'),
('9b5dc7846a02590c68005b8080c2f6c7f1183d426de591d37734301e7f73d1eacce7e4ded016de18', 1, 1, 'appbuilder_token', '[]', 0, '2022-07-28 22:17:49', '2022-07-28 22:17:49', '2023-07-28 22:17:49'),
('9c34af90698e0bb1f5b7ab4449238ad857499940f59ba78859ee72f37e42f99736f8de477f61c35c', 3, 1, 'appbuilder_token', '[]', 0, '2022-08-10 22:08:01', '2022-08-10 22:08:01', '2023-08-10 22:08:01'),
('9c456cffd24ab03d08c2207310d82e49bf545cee28963181121d5f0321d4ff285784aa4411729d6b', 1, 1, 'appbuilder_token', '[]', 0, '2022-08-12 16:08:48', '2022-08-12 16:08:48', '2023-08-12 16:08:48'),
('9d69890ed27609d0db786781ffa74056349693012a091812dd8065fe6413188239eaa63607213576', 3, 1, 'appbuilder_token', '[]', 0, '2022-06-25 20:37:25', '2022-06-25 20:37:25', '2023-06-25 20:37:25'),
('a0352f17c91e7dc49cf682c1097b9be586c46642d286d0f4ba8e340969b0b5e1fb2b176f08a463a3', 1, 1, 'appbuilder_token', '[]', 0, '2021-03-17 19:57:25', '2021-03-17 19:57:25', '2022-03-17 21:57:25'),
('a3bb116738d909a74868a4ff0e2aa84f57b64b17bc4ec475b922842aacbb81707115ff05ba4c8427', 3, 1, 'appbuilder_token', '[]', 0, '2022-08-08 23:21:06', '2022-08-08 23:21:06', '2023-08-08 23:21:06'),
('a520471f3093627f4a0589b0a2f97ec67180117363d857df9c29e893effa9198c1fdb1d85c12182e', 6, 1, 'appbuilder_token', '[]', 0, '2022-08-15 13:21:58', '2022-08-15 13:21:58', '2023-08-15 13:21:58'),
('a5f347195325994424bdeb5ecda95b9436744cbf4334eb51bc57e0580de70368ef6d2260e668c3f7', 3, 1, 'appbuilder_token', '[]', 0, '2022-06-25 17:46:50', '2022-06-25 17:46:50', '2023-06-25 17:46:50'),
('a6c69d6a5849a9e8f05e777e408ecbd0f56dc95f302ec8be03a4c1bad30ee35eb6e7681193664687', 4, 1, 'appbuilder_token', '[]', 0, '2022-08-12 16:09:12', '2022-08-12 16:09:12', '2023-08-12 16:09:12'),
('b10cc2601a17e5eb64c543ff5fe946c43df8229405779a1f3aba7557a93e9bacbe6b44a2b590ba4b', 3, 1, 'appbuilder_token', '[]', 0, '2022-09-15 10:32:27', '2022-09-15 10:32:27', '2023-09-15 10:32:27'),
('b7af8d7354460e00864447669ea282c3dfe79040391c2dd4c679b00e4d85c45242457aa36bd1bb82', 5, 1, 'appbuilder_token', '[]', 0, '2022-08-12 16:22:18', '2022-08-12 16:22:18', '2023-08-12 16:22:18'),
('b9aec8bf0c1bb14ac378eb6f6dc4e0b3577ec33761bc0e91152ce907394b5757ba00490723e48206', 1, 1, 'appbuilder_token', '[]', 0, '2022-08-10 22:06:59', '2022-08-10 22:06:59', '2023-08-10 22:06:59'),
('bd399653d9bc442c0535e6db0b67b87f0fbf6e16b2d53c9d03a01ee1cefdb79d1c8878478eebeadc', 3, 1, 'appbuilder_token', '[]', 0, '2022-07-27 08:41:52', '2022-07-27 08:41:52', '2023-07-27 08:41:52'),
('be6e138e59661b380c86bf434a126542b0236bd50f86f9d9a9da51e999750b2d97bdea17ab7e8d64', 3, 1, 'appbuilder_token', '[]', 0, '2022-10-21 14:37:50', '2022-10-21 14:37:50', '2023-10-21 14:37:50'),
('bf51325d2cb71ede979184d7006aa78fc5f36ab3ccd0875f52ba4b2ae02cc239c14b31624a68c113', 1, 1, 'appbuilder_token', '[]', 0, '2022-08-12 16:22:44', '2022-08-12 16:22:44', '2023-08-12 16:22:44'),
('c0a9be8e189cdde7ba3f1ee0344177cd20a7966d7c8f9c3658ba0159ba283e70be6ff68f9705cc7f', 3, 1, 'appbuilder_token', '[]', 0, '2022-07-04 09:45:09', '2022-07-04 09:45:09', '2023-07-04 09:45:09'),
('c0d46d077e884dfc43527e3588abb7d3c15ae4f418e91063441947b97d7e2aec6204b543ebac7664', 3, 1, 'appbuilder_token', '[]', 0, '2022-08-05 09:40:35', '2022-08-05 09:40:35', '2023-08-05 09:40:35'),
('cc25da69119a0cad23292f7b4a0ce2b2258e5c2c9e429926877f163d0ef3f57ba7d356ad10655531', 3, 1, 'appbuilder_token', '[]', 0, '2022-08-12 15:46:01', '2022-08-12 15:46:01', '2023-08-12 15:46:01'),
('cc7860454990e9c46358b50cca3092371b8ea301930af8c5cf66d9de947fe52ce86fd6d78fd7de15', 3, 1, 'appbuilder_token', '[]', 0, '2022-08-10 22:10:09', '2022-08-10 22:10:09', '2023-08-10 22:10:09'),
('cd3760a97ddccffe4a9e05fdf23e5166873bc94fb0b96af3e28f7d2dbf396009e255351c6ef67530', 1, 1, 'appbuilder_token', '[]', 0, '2021-03-17 19:54:56', '2021-03-17 19:54:56', '2022-03-17 21:54:56'),
('d5c96871749fed5993506d0a56ddc64b237d76d47737f54d329fd6897130d655395b4aaf9fd71c22', 6, 1, 'appbuilder_token', '[]', 0, '2022-08-15 13:20:33', '2022-08-15 13:20:33', '2023-08-15 13:20:33'),
('da08c5ceab2f37b7ca9887f6edd2df46d276d218553770b2b62dc6c2d9a33ca2a85807e4f4ad7da6', 3, 1, 'appbuilder_token', '[]', 0, '2022-08-11 21:28:54', '2022-08-11 21:28:54', '2023-08-11 21:28:54'),
('da646e44a5640fa4506d907c0c1e70ccdce5351f010f21ff0c447809ee66efcb110114a9d11c7664', 1, 1, 'appbuilder_token', '[]', 0, '2021-03-17 20:07:00', '2021-03-17 20:07:00', '2022-03-17 22:07:00'),
('dc692f9cf721948930c7832aa926165d60b67b8261e008850eb3dc480201b437bdc1ef76f69056e1', 1, 1, 'appbuilder_token', '[]', 0, '2022-08-12 16:20:20', '2022-08-12 16:20:20', '2023-08-12 16:20:20'),
('e4e6ba619b9e1c2ddc61404af40e187c48625e419cf5532e37e123b8fb39c508a8107c42f9aeb304', 1, 1, 'appbuilder_token', '[]', 0, '2022-06-24 15:58:28', '2022-06-24 15:58:28', '2023-06-24 15:58:28'),
('e52c33ad804995bcaec5f92634eaa50ad2d18c4ea4ba792132119938f18ad19696c2bfd68e4cd37b', 3, 1, 'appbuilder_token', '[]', 0, '2022-07-26 07:50:15', '2022-07-26 07:50:15', '2023-07-26 07:50:15'),
('e6d18a790c91dc800cb474e65b326710798af4614a31c2f4712a7afd6c0c44b294b25e9fdbab7fb6', 1, 1, 'appbuilder_token', '[]', 0, '2022-06-25 14:58:09', '2022-06-25 14:58:09', '2023-06-25 14:58:09'),
('ec91baf6ac587134b7953224e3eeac6e0b11efc7047e26bee5a58480c4a34566628a82b149e3fc7f', 3, 1, 'appbuilder_token', '[]', 0, '2022-10-17 16:33:53', '2022-10-17 16:33:53', '2023-10-17 16:33:53'),
('f27a9743f6a25eca13fa8591a12eb220ca9448b0bf2887b0ab4bf32776b5e5523ef91fe0ef483a00', 3, 1, 'appbuilder_token', '[]', 0, '2022-06-25 20:45:53', '2022-06-25 20:45:53', '2023-06-25 20:45:53'),
('f311c6130e63e49ce6f0be451cc641fbc3c5b61ba8caf1c0715fc58a8946979cc1b28e9d3688ee85', 1, 1, 'appbuilder_token', '[]', 0, '2022-08-12 16:27:35', '2022-08-12 16:27:35', '2023-08-12 16:27:35'),
('f6fa96830541fb68990da2fee14307e67bc728f641d6605c040222ccd08bd6bb2386e5c315f6d0d2', 3, 1, 'appbuilder_token', '[]', 0, '2022-07-05 11:43:47', '2022-07-05 11:43:47', '2023-07-05 11:43:47'),
('f89966ef5a832a515827c07b19331b4df3a47b227107f8bf5ea45c4ab577ace91578b5250da349c2', 3, 1, 'appbuilder_token', '[]', 0, '2022-08-05 13:59:40', '2022-08-05 13:59:40', '2023-08-05 13:59:40'),
('f8a298332a06ac9cca0babe305af5c660f343dbdf1ce4df6d60117296252d078fa7a813b68f934b9', 3, 1, 'appbuilder_token', '[]', 0, '2022-10-18 14:16:49', '2022-10-18 14:16:49', '2023-10-18 14:16:49');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'App Builder Personal Access Client', 'hNX3poEZ8jVH8veaXokRaUunJankfaXPwQVQ726X', 'http://localhost', 1, 0, 0, '2021-03-17 18:57:13', '2021-03-17 18:57:13'),
(2, NULL, 'App Builder Password Grant Client', '7mJflPaudFQiie6pOwxTh2P2gs57IcTlbxKOEulS', 'http://localhost', 0, 1, 0, '2021-03-17 18:57:13', '2021-03-17 18:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-03-17 18:57:13', '2021-03-17 18:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(27, 'Blog_categories', 'Blog Categories', 'Blog Categories', NULL, NULL),
(31, 'Facility', 'Facility', 'Facility Permission', '2022-06-24 16:26:19', '2022-06-24 16:26:19'),
(32, 'Category', 'Category', 'Category Permission', '2022-06-24 16:27:44', '2022-06-24 16:27:44'),
(33, 'Personnels', 'Personnels', 'Personnels Permission', '2022-06-24 16:32:58', '2022-06-24 16:32:58'),
(34, 'Region', 'Region', 'Region Permission', '2022-06-24 16:34:13', '2022-06-24 16:34:13'),
(35, 'Districts', 'Districts', 'Districts Permission', '2022-06-24 16:35:12', '2022-06-24 16:35:12'),
(36, 'Healthfacility', 'Healthfacility', 'Healthfacility Permission', '2022-06-24 16:44:55', '2022-06-24 16:44:55'),
(37, 'Stafftypes', 'Stafftypes', 'Stafftypes Permission', '2022-06-24 17:04:00', '2022-06-24 17:04:00'),
(38, 'Staff', 'Staff', 'Staff Permission', '2022-06-24 17:07:43', '2022-06-24 17:07:43'),
(47, 'Deliveryoutcome', 'Deliveryoutcome', 'Deliveryoutcome Permission', '2022-06-25 10:28:07', '2022-06-25 10:28:07'),
(48, 'Postnatalrecords', 'Postnatalrecords', 'Postnatalrecords Permission', '2022-06-25 15:31:43', '2022-06-25 15:31:43'),
(50, 'Childgrowth', 'Childgrowth', 'Childgrowth Permission', '2022-06-25 16:25:32', '2022-06-25 16:25:32'),
(51, 'Immunizations', 'Immunizations', 'Immunizations Permission', '2022-06-25 17:23:37', '2022-06-25 17:23:37'),
(52, 'Mothers', 'Mothers', 'Mothers Permission', '2022-06-25 18:54:36', '2022-06-25 18:54:36'),
(53, 'Individualpregnancies', 'Individualpregnancies', 'Individualpregnancies Permission', '2022-06-25 19:04:14', '2022-06-25 19:04:14'),
(54, 'Pregnancyrecords', 'Pregnancyrecords', 'Pregnancyrecords Permission', '2022-06-25 19:06:11', '2022-06-25 19:06:11'),
(55, 'Antenatalrecords', 'Antenatalrecords', 'Antenatalrecords Permission', '2022-06-25 19:12:03', '2022-06-25 19:12:03');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(8, 1),
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
(27, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(47, 1),
(48, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(7, 2),
(8, 2),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(24, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(38, 3),
(47, 3),
(48, 3),
(50, 3),
(51, 3),
(52, 3),
(53, 3),
(54, 3),
(55, 3),
(8, 4),
(9, 4),
(47, 4),
(48, 4),
(50, 4),
(51, 4),
(53, 4),
(54, 4),
(55, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Personnels`
--

CREATE TABLE `Personnels` (
  `id` int(10) UNSIGNED NOT NULL,
  `per_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Personnels`
--

INSERT INTO `Personnels` (`id`, `per_name`, `per_contact`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Rebecca Engmann', '0548166095', '2022-08-01 05:17:41', '2022-08-01 05:17:41', NULL),
(2, 'Joshua Atta', '0548166095', '2022-08-12 16:10:59', '2022-08-12 16:10:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Postnatalrecords`
--

CREATE TABLE `Postnatalrecords` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urine` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pulse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fundal_height` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temperature` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lochia_colour` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `breast_condition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifa_supplied_days` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complaints` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id` int(11) NOT NULL,
  `incision_perineum` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mood_changes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_reg_no` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Pregnancyrecords`
--

CREATE TABLE `Pregnancyrecords` (
  `id` int(10) UNSIGNED NOT NULL,
  `rec_mo_reg_no` int(11) NOT NULL,
  `rec_no_of_pregnancies` int(11) NOT NULL,
  `rec_no_of_births` int(11) NOT NULL,
  `rec_no_of_abortions` int(11) NOT NULL,
  `rec_spontaneous` int(11) NOT NULL,
  `rec_induced` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Pregnancyrecords`
--

INSERT INTO `Pregnancyrecords` (`id`, `rec_mo_reg_no`, `rec_no_of_pregnancies`, `rec_no_of_births`, `rec_no_of_abortions`, `rec_spontaneous`, `rec_induced`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 3, 3, 0, 0, 0, '2022-08-11 21:43:58', '2022-08-11 21:43:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Region`
--

CREATE TABLE `Region` (
  `id` int(10) UNSIGNED NOT NULL,
  `reg_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_personnel` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Region`
--

INSERT INTO `Region` (`id`, `reg_name`, `reg_code`, `reg_personnel`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Eastern Region', '003', 1, '2022-08-01 05:18:42', '2022-08-01 05:18:42', NULL),
(2, 'Greater Accra', 'GA001', 2, '2022-08-12 16:11:30', '2022-08-12 16:11:30', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Super-Admin', 'Super Admin', 'Super Admin', NULL, NULL),
(2, 'Admin', 'Admin Role', 'This is Admin Role', NULL, NULL),
(3, 'supervisor', 'Supervisor', 'Supervisor', '2022-06-25 17:45:28', '2022-06-25 17:45:28'),
(4, 'mothers', 'Mothers', 'For mothers', '2022-08-12 16:21:24', '2022-08-12 16:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(3, 3),
(4, 3),
(6, 3),
(5, 4);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Settings`
--

INSERT INTO `Settings` (`id`, `registration`, `crudbuilder`, `filemanager`, `created_at`, `updated_at`) VALUES
(1, 'false', 'true', 'true', NULL, '2022-06-25 17:43:37');

-- --------------------------------------------------------

--
-- Table structure for table `Staff`
--

CREATE TABLE `Staff` (
  `id` int(10) UNSIGNED NOT NULL,
  `staff_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_designation` int(11) NOT NULL,
  `staff_tel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Staff`
--

INSERT INTO `Staff` (`id`, `staff_id`, `staff_name`, `staff_designation`, `staff_tel`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '0101010', 'Sophia Mensah', 3, '05484848484', '2022-08-05 09:42:27', '2022-08-05 09:42:27', NULL),
(2, '0102302', 'Gerhard Malah', 3, '0245878978', '2022-08-12 16:13:06', '2022-08-12 16:13:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Stafftypes`
--

CREATE TABLE `Stafftypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Stafftypes`
--

INSERT INTO `Stafftypes` (`id`, `type_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Doctor', '2022-08-05 09:40:31', '2022-08-05 09:40:31', NULL),
(2, 'Midwife', '2022-08-05 09:40:39', '2022-08-05 09:40:39', NULL),
(3, 'Nurse', '2022-08-05 09:40:53', '2022-08-05 09:40:53', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'MOCHCare', 'admin@admin.com', NULL, '$2y$10$PpaKSVzRdiSZxrUzQw.ozeqAMBgZs7EXhahLFxsk/Nli8iXonDyji', 'php2g2hPB.jpg', NULL, '2021-03-17 18:57:13', '2022-06-25 10:00:18'),
(3, 'Sophia', 'sophia@mochcare.com', NULL, '$2y$10$tMVbA5sLiyXR9YRBpZDhv.hbL8gDyIBe7.a5kl4jFauA.VjnejiPa', 'phpWnvgdK.jpg', NULL, '2022-06-25 17:46:20', '2022-06-25 17:47:53');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Widgets`
--

INSERT INTO `Widgets` (`id`, `type`, `icon`, `title`, `module_id`, `table`, `tablefield`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'count', 'fa-user-circle', 'Registered Mothers', 9, 'Mothers', 'id', '2022-06-25 18:35:18', '2022-06-25 18:35:18', NULL),
(2, 'count', 'fa-user-md', 'Staff', 7, 'Staff', 'id', '2022-06-25 18:37:06', '2022-06-25 18:37:06', NULL),
(3, 'count', 'fa-exclamation', 'Immunizations', 16, 'Immunizations', 'id', '2022-06-25 18:40:05', '2022-06-25 18:40:05', NULL),
(4, 'count', 'fa-user-circle', 'Personnel', 6, 'Personnels', 'id', '2022-06-25 18:46:40', '2022-06-25 18:46:40', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Antenatalrecords`
--
ALTER TABLE `Antenatalrecords`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Childgrowth`
--
ALTER TABLE `Childgrowth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Deliveryoutcome`
--
ALTER TABLE `Deliveryoutcome`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Districts`
--
ALTER TABLE `Districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Facility`
--
ALTER TABLE `Facility`
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
-- Indexes for table `Healthfacility`
--
ALTER TABLE `Healthfacility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Immunizations`
--
ALTER TABLE `Immunizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Individualpregnancies`
--
ALTER TABLE `Individualpregnancies`
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
-- Indexes for table `Mothers`
--
ALTER TABLE `Mothers`
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
-- Indexes for table `Personnels`
--
ALTER TABLE `Personnels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Postnatalrecords`
--
ALTER TABLE `Postnatalrecords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Pregnancyrecords`
--
ALTER TABLE `Pregnancyrecords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Region`
--
ALTER TABLE `Region`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `Staff`
--
ALTER TABLE `Staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Stafftypes`
--
ALTER TABLE `Stafftypes`
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
-- AUTO_INCREMENT for table `Antenatalrecords`
--
ALTER TABLE `Antenatalrecords`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `api_documentation`
--
ALTER TABLE `api_documentation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

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
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Childgrowth`
--
ALTER TABLE `Childgrowth`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Deliveryoutcome`
--
ALTER TABLE `Deliveryoutcome`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Districts`
--
ALTER TABLE `Districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Facility`
--
ALTER TABLE `Facility`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `Healthfacility`
--
ALTER TABLE `Healthfacility`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Immunizations`
--
ALTER TABLE `Immunizations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Individualpregnancies`
--
ALTER TABLE `Individualpregnancies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `module_fields`
--
ALTER TABLE `module_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `Mothers`
--
ALTER TABLE `Mothers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `Personnels`
--
ALTER TABLE `Personnels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Postnatalrecords`
--
ALTER TABLE `Postnatalrecords`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Pregnancyrecords`
--
ALTER TABLE `Pregnancyrecords`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Region`
--
ALTER TABLE `Region`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Settings`
--
ALTER TABLE `Settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Staff`
--
ALTER TABLE `Staff`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Stafftypes`
--
ALTER TABLE `Stafftypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Widgets`
--
ALTER TABLE `Widgets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
