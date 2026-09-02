-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2025 at 09:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qadeerandzaheer`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `mobile_phone` varchar(50) DEFAULT NULL,
  `zip_code` varchar(20) NOT NULL,
  `street` varchar(255) NOT NULL,
  `apt_ste` varchar(100) DEFAULT NULL,
  `city` varchar(191) NOT NULL,
  `country` varchar(191) NOT NULL,
  `date_of_birth` date NOT NULL,
  `patient_injury` varchar(100) NOT NULL,
  `patient_injury_other_details` varchar(255) DEFAULT NULL,
  `currently_home_health_services` tinyint(1) NOT NULL DEFAULT 0,
  `home_health_discharge_date` date DEFAULT NULL,
  `wants_insurance` tinyint(1) NOT NULL DEFAULT 0,
  `insurance_company` varchar(191) DEFAULT NULL,
  `insurance_plan` varchar(191) DEFAULT NULL,
  `member_id` varchar(100) DEFAULT NULL,
  `other_insurance` varchar(191) DEFAULT NULL,
  `has_supplement` tinyint(1) NOT NULL DEFAULT 0,
  `coverage_summary` text DEFAULT NULL,
  `is_self_pay` tinyint(1) NOT NULL DEFAULT 0,
  `callback_datetime` datetime DEFAULT NULL,
  `appointment_status` enum('new','in_review','scheduled','completed','cancelled','no_show') NOT NULL DEFAULT 'new',
  `source` varchar(100) DEFAULT NULL,
  `utm_campaign` varchar(255) DEFAULT NULL,
  `utm_source` varchar(255) DEFAULT NULL,
  `utm_medium` varchar(255) DEFAULT NULL,
  `utm_term` varchar(255) DEFAULT NULL,
  `utm_content` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `callback_type` enum('call_now','schedule_callback') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `paragraph` varchar(600) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `paragraph`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'Safeguard Your IP. Strengthen', 'Aziz & Ismail advises on trademarks, patents, designs, and copyrights—helping businesses protect what they create in Pakistan and beyond.', 'uploads/banners/1756370595_the-law-firms.jpg', '2025-08-26 13:21:11', '2025-08-28 18:08:16'),
(2, 'Trademark Registration Made Simple', 'From clearance searches and filing to oppositions and renewals—we handle the process end-to-end with clear timelines and fees.', 'uploads/banners/1756370604_aziz-and-co.jpg', '2025-08-26 13:23:47', '2025-08-28 15:48:01'),
(3, 'Practical Legal Counsel for Innovators', 'Responsive, business-minded attorneys delivering fast turnarounds, strong enforcement, and global portfolio management.', 'uploads/banners/1756370610_aziz-and-co.jpg', '2025-08-26 13:24:06', '2025-08-28 15:48:24');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `short_description` varchar(900) NOT NULL,
  `content` longtext NOT NULL,
  `featured_image` varchar(600) NOT NULL,
  `author` varchar(599) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `meta_title` varchar(500) NOT NULL,
  `meta_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `short_description`, `content`, `featured_image`, `author`, `date`, `created_at`, `updated_at`, `category_id`, `slug`, `meta_title`, `meta_description`) VALUES
(13, 'test', 'test', '<h2 style=\"margin: 20px 0px 10px; font-weight: 600; line-height: 24px; color: rgb(34, 34, 34); font-size: 32px; font-family: Poppins; letter-spacing: 0.06px;\" class=\"\"></h2><h1 class=\"\"><span style=\"font-family: &quot;Arial Black&quot;;\">Introduction</span></h1><span style=\"font-size: 18px;\">﻿work</span><br>', 'Dashboard_assets/1745931021_About us.jpg', 'test', '2025-04-29', '2025-04-29 19:50:21', '2025-04-29 19:58:04', 2, 'test', 'test', 'test'),
(14, 'test', 'test', '<p>test</p>', 'Dashboard_assets/1756557033_clientss.png', 'test', '2025-08-30', '2025-08-30 19:30:33', '2025-08-30 19:30:33', 3, 'test-1', 'test', 'test'),
(15, 'test', 'test', '<p>test</p>', 'Dashboard_assets/1756557075_lawyerss.png', 'test', '2025-08-30', '2025-08-30 19:31:15', '2025-08-30 19:31:15', 3, 'test-2', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(800) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `updated_at`, `created_at`) VALUES
(2, 'articles', '2025-04-03 15:53:56', '2025-04-03 15:53:56'),
(3, 'Sales Tax', '2025-08-26 15:08:10', '2025-08-26 15:08:10'),
(4, 'Income Tax', '2025-08-26 15:08:19', '2025-08-26 15:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `category_download`
--

CREATE TABLE `category_download` (
  `download_id` bigint(11) UNSIGNED NOT NULL,
  `category_id` bigint(11) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_download`
--

INSERT INTO `category_download` (`download_id`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 4, '2025-08-26 08:39:50', '2025-08-26 08:39:50'),
(2, 3, '2025-08-26 08:39:50', '2025-08-26 08:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(800) NOT NULL,
  `email` varchar(900) NOT NULL,
  `country` varchar(900) NOT NULL,
  `phone` varchar(900) NOT NULL,
  `message` varchar(900) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `country`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'demo', 'demo@gmail.com', 'Pakistan', '0358568595', 'hello world', '2025-04-03 07:03:28', '2025-04-03 07:03:28'),
(2, 'Benish', 'benishnisar@gmail.com', 'Pakistan', '0364575678', 'good services', '2025-04-03 14:25:54', '2025-04-03 14:25:54'),
(3, 'Benish', 'benishnisar@gmail.com', 'Pakistan', '0364575678', 'good services', '2025-04-03 14:29:32', '2025-04-03 14:29:32'),
(4, 'testing', 'testing@gmail.com', 'Pakistan', '03428410999', 'work', '2025-04-10 13:19:00', '2025-04-10 13:19:00'),
(5, 'noor', 'fatimazoha@gmail.com', 'Pakistan', '03566667791', 'work', '2025-04-10 13:24:56', '2025-04-10 13:24:56'),
(6, 'noor', 'noor@gmail.com', 'Pakistan', '03566667791', 'test', '2025-04-10 13:28:45', '2025-04-10 13:28:45'),
(7, 'Stewart Houston', 'syxu@mailinator.com', 'Quis architecto est', '+1 (143) 653-2706', 'Voluptatibus praesen', '2025-04-10 13:36:00', '2025-04-10 13:36:00'),
(8, 'Wesley Vazquez', 'byfuhe@mailinator.com', 'Porro recusandae In', '+1 (625) 125-1851', 'Ea non eum odio corp', '2025-04-10 13:36:07', '2025-04-10 13:36:07'),
(9, 'Emi Mcdowell', 'nynagaciho@mailinator.com', 'Quia quaerat do ut a', '+1 (602) 773-9278', 'Est reprehenderit si', '2025-04-10 13:36:19', '2025-04-10 13:36:19'),
(10, 'Workigng', 'benishnisar56@gmail.com', 'Pakistan', '03428410999', 'wok', '2025-04-10 13:37:04', '2025-04-10 13:37:04'),
(11, 'noor', 'benishnisar56@gmail.com', 'Pakistan', '03566667791', 'hello', '2025-04-10 13:54:04', '2025-04-10 13:54:04'),
(12, 'Ray Hutchinson', 'lijyg@mailinator.com', 'Rerum est ab omnis i', '+1 (221) 469-9941', 'Vero sed laborum sit', '2025-04-10 13:59:05', '2025-04-10 13:59:05'),
(13, 'Ray Hutchinson', 'lijyg@mailinator.com', 'Rerum est ab omnis i', '+1 (221) 469-9941', 'Vero sed laborum sit', '2025-04-10 13:59:09', '2025-04-10 13:59:09'),
(14, 'Quyn Barrett', 'vaxiq@mailinator.com', 'Esse autem voluptat', '+1 (417) 911-2582', 'Enim ut veritatis ve', '2025-04-10 14:01:33', '2025-04-10 14:01:33'),
(15, 'Quyn Barrett', 'vaxiq@mailinator.com', 'Esse autem voluptat', '+1 (417) 911-2582', 'Enim ut veritatis ve', '2025-04-10 14:01:38', '2025-04-10 14:01:38'),
(16, 'Quyn Barrett', 'vaxiq@mailinator.com', 'Esse autem voluptat', '+1 (417) 911-2582', 'Enim ut veritatis ve', '2025-04-10 14:01:43', '2025-04-10 14:01:43'),
(17, 'Quyn Barrett', 'vaxiq@mailinator.com', 'Esse autem voluptat', '+1 (417) 911-2582', 'Enim ut veritatis ve', '2025-04-10 14:01:48', '2025-04-10 14:01:48'),
(18, 'work', 'benishnisar56@gmail.com', 'Pakistan', '03478356751', 'work', '2025-04-10 14:08:17', '2025-04-10 14:08:17'),
(19, 'work', 'benishnisar56@gmail.com', 'Pakistan', '03478356751', 'work', '2025-04-10 14:08:22', '2025-04-10 14:08:22'),
(20, 'work', 'benishnisar56@gmail.com', 'Pakistan', '03478356751', 'work', '2025-04-10 14:08:27', '2025-04-10 14:08:27'),
(21, 'work', 'benishnisar56@gmail.com', 'Pakistan', '03478356751', 'work', '2025-04-10 14:08:31', '2025-04-10 14:08:31'),
(22, 'work', 'benishnisar56@gmail.com', 'Pakistan', '03478356751', 'work', '2025-04-10 14:08:35', '2025-04-10 14:08:35'),
(23, 'work', 'work@gmail.com', 'Pakistan', '03566667791', 'woyj', '2025-04-10 14:09:15', '2025-04-10 14:09:15'),
(24, 'work', 'work@gmail.com', 'Pakistan', '03566667791', 'woyj', '2025-04-10 14:09:20', '2025-04-10 14:09:20'),
(25, 'Joan Strong', 'mocu@mailinator.com', 'Laudantium praesent', '+1 (211) 487-1983', 'Deserunt saepe iure', '2025-04-10 14:09:29', '2025-04-10 14:09:29'),
(26, 'Joan Strong', 'mocu@mailinator.com', 'Laudantium praesent', '+1 (211) 487-1983', 'Deserunt saepe iure', '2025-04-10 14:09:34', '2025-04-10 14:09:34'),
(27, 'Gretchen Green', 'caxysecu@mailinator.com', 'Qui perferendis non', '+1 (426) 708-5139', 'Magni lorem voluptat', '2025-04-10 14:09:53', '2025-04-10 14:09:53'),
(28, 'Gretchen Green', 'caxysecu@mailinator.com', 'Qui perferendis non', '+1 (426) 708-5139', 'Magni lorem voluptat', '2025-04-10 14:09:59', '2025-04-10 14:09:59'),
(29, 'Gretchen Green', 'caxysecu@mailinator.com', 'Qui perferendis non', '+1 (426) 708-5139', 'Magni lorem voluptat', '2025-04-10 14:10:04', '2025-04-10 14:10:04'),
(30, 'Jarrod Conley', 'tesypyl@mailinator.com', 'Non in corporis cons', '+1 (525) 214-6389', 'Consectetur eiusmod', '2025-04-10 14:10:08', '2025-04-10 14:10:08'),
(31, 'Jarrod Conley', 'tesypyl@mailinator.com', 'Non in corporis cons', '+1 (525) 214-6389', 'Consectetur eiusmod', '2025-04-10 14:10:13', '2025-04-10 14:10:13'),
(32, 'Yardley Hancock', 'komy@mailinator.com', 'Dolorem dolorem ab a', '+1 (318) 846-3906', 'Dignissimos quisquam', '2025-04-10 14:10:34', '2025-04-10 14:10:34'),
(33, 'Mira Johnston', 'xepydonyz@mailinator.com', 'Placeat distinctio', '+1 (908) 395-4364', 'Illum ipsum rem acc', '2025-04-10 14:10:50', '2025-04-10 14:10:50'),
(34, 'Dorian Church', 'qazu@mailinator.com', 'Ullamco quibusdam in', '+1 (164) 561-8377', 'Eos consequatur est', '2025-04-10 14:11:02', '2025-04-10 14:11:02'),
(35, 'Dorian Church', 'qazu@mailinator.com', 'Ullamco quibusdam in', '+1 (164) 561-8377', 'Eos consequatur est', '2025-04-10 14:11:07', '2025-04-10 14:11:07'),
(36, 'Xavier Weiss', 'felaju@mailinator.com', 'Animi nobis autem r', '+1 (933) 804-6759', 'Aut exercitationem e', '2025-04-10 14:11:29', '2025-04-10 14:11:29'),
(37, 'Xavier Weiss', 'felaju@mailinator.com', 'Animi nobis autem r', '+1 (933) 804-6759', 'Aut exercitationem e', '2025-04-10 14:11:34', '2025-04-10 14:11:34'),
(38, 'Xavier Weiss', 'felaju@mailinator.com', 'Animi nobis autem r', '+1 (933) 804-6759', 'Aut exercitationem e', '2025-04-10 14:11:39', '2025-04-10 14:11:39'),
(39, 'Xavier Weiss', 'felaju@mailinator.com', 'Animi nobis autem r', '+1 (933) 804-6759', 'Aut exercitationem e', '2025-04-10 14:11:43', '2025-04-10 14:11:43'),
(40, 'Xavier Weiss', 'felaju@mailinator.com', 'Animi nobis autem r', '+1 (933) 804-6759', 'Aut exercitationem e', '2025-04-10 14:11:47', '2025-04-10 14:11:47'),
(41, 'Xavier Weiss', 'felaju@mailinator.com', 'Animi nobis autem r', '+1 (933) 804-6759', 'Aut exercitationem e', '2025-04-10 14:11:51', '2025-04-10 14:11:51'),
(42, 'benish', 'benishnisar56@gmail.com', 'Afganistan', '03566667791', 'work', '2025-04-10 14:15:29', '2025-04-10 14:15:29'),
(43, 'benish', 'benishnisar56@gmail.com', 'Afganistan', '03566667791', 'work', '2025-04-10 14:15:38', '2025-04-10 14:15:38'),
(44, 'benish', 'benishnisar56@gmail.com', 'Afganistan', '03566667791', 'work', '2025-04-10 14:15:43', '2025-04-10 14:15:43'),
(45, 'Benish', 'benishnisar56@gmail.com', 'Pakistan', '03428410999', 'wr', '2025-04-10 14:16:04', '2025-04-10 14:16:04'),
(46, 'check', 'benishnisar56@gmail.com', 'Pakistan', '03566667791', 'work', '2025-04-10 14:22:23', '2025-04-10 14:22:23'),
(47, 'Nero Camacho', 'qalolyc@mailinator.com', 'Quaerat corrupti no', '+1 (882) 344-6442', 'Ut ut magnam accusan', '2025-04-10 15:39:18', '2025-04-10 15:39:18'),
(48, 'Nero Camacho', 'qalolyc@mailinator.com', 'Quaerat corrupti no', '+1 (882) 344-6442', 'Ut ut magnam accusan', '2025-04-10 15:39:24', '2025-04-10 15:39:24'),
(49, 'office', 'officework.weboctane@gmail.com', 'pakistan', '03000339752', 'hello', '2025-04-22 17:24:54', '2025-04-22 17:24:54'),
(50, 'office', 'officework.weboctane@gmail.com', 'pakistan', '03000339752', 'hello', '2025-04-22 17:25:05', '2025-04-22 17:25:05'),
(51, 'work', 'benishk800@gmail.com', 'Pakistan', '03000339752', 'good', '2025-04-22 17:52:12', '2025-04-22 17:52:12'),
(52, 'benish', 'benishnisarkhan56@gmail.com', 'Pakistan', '03000339752', 'good', '2025-04-22 17:53:11', '2025-04-22 17:53:11'),
(53, 'benish', 'officework.weboctane@gmail.com', 'Pakistan', '03160109634', 'work', '2025-04-22 18:18:08', '2025-04-22 18:18:08'),
(54, 'benish', 'benishk800@gmail.com', 'Pakistan', '03160109634', 'good', '2025-04-22 18:28:43', '2025-04-22 18:28:43'),
(55, 'test order', 'zubiaahsan925@gmail.com', 'Pakistan', '03160109634', 'good', '2025-04-22 18:35:17', '2025-04-22 18:35:17'),
(56, 'benish', 'benishk800@gmail.com', 'Pakistan', '03160109634', 'good services', '2025-04-22 18:35:55', '2025-04-22 18:35:55'),
(57, 'office', 'officework.weboctane@gmail.com', 'Pakistan', '03566667791', 'work', '2025-04-23 20:04:32', '2025-04-23 20:04:32'),
(58, 'office', 'officework.weboctane@gmail.com', 'Pakistan', '03566667791', 'work', '2025-04-23 20:04:50', '2025-04-23 20:04:50'),
(59, 'office', 'officework.weboctane@gmail.com', 'Pakistan', '03566667791', 'work', '2025-04-23 20:04:56', '2025-04-23 20:04:56'),
(60, 'noor', 'benishk800@gmail.com', 'Pakistan', '03566667791', 'good', '2025-04-23 22:17:22', '2025-04-23 22:17:22'),
(61, 'noor', 'benishk800@gmail.com', 'Pakistan', '03566667791', 'good', '2025-04-23 22:32:20', '2025-04-23 22:32:20'),
(62, 'noor', 'benish@gmail.com', 'Pakistan', '03428410999', 'good', '2025-04-23 22:33:14', '2025-04-23 22:33:14'),
(63, 'noor', 'benish@gmail.com', 'Pakistan', '03428410999', 'good', '2025-04-23 22:33:35', '2025-04-23 22:33:35'),
(64, 'noor', 'benish@gmail.com', 'Pakistan', '03428410999', 'good', '2025-04-23 22:33:57', '2025-04-23 22:33:57'),
(65, 'noor', 'benish@gmail.com', 'Pakistan', '03428410999', 'good', '2025-04-23 22:34:18', '2025-04-23 22:34:18'),
(66, 'noor', 'benish@gmail.com', 'Pakistan', '03428410999', 'good', '2025-04-23 22:34:40', '2025-04-23 22:34:40'),
(67, 'noor', 'benish@gmail.com', 'Pakistan', '03428410999', 'good', '2025-04-23 22:35:01', '2025-04-23 22:35:01'),
(68, 'noor', 'benish@gmail.com', 'Pakistan', '03428410999', 'good', '2025-04-23 22:35:22', '2025-04-23 22:35:22'),
(69, 'noor', 'benish@gmail.com', 'Pakistan', '03428410999', 'good', '2025-04-23 22:35:44', '2025-04-23 22:35:44'),
(70, 'noor', 'benish@gmail.com', 'Pakistan', '03428410999', 'good', '2025-04-23 22:36:07', '2025-04-23 22:36:07'),
(71, 'noor', 'benish@gmail.com', 'Pakistan', '03428410999', 'good', '2025-04-23 22:36:29', '2025-04-23 22:36:29'),
(72, 'muhammad', 'muhammad@gmail.com', 'Pakistan', '03160109634', 'hello', '2025-04-23 22:38:58', '2025-04-23 22:38:58'),
(73, 'muhammad', 'muhammad@gmail.com', 'Pakistan', '03160109634', 'hello', '2025-04-23 22:39:20', '2025-04-23 22:39:20'),
(74, 'muhammad', 'muhammad@gmail.com', 'Pakistan', '03160109634', 'hello', '2025-04-23 22:39:42', '2025-04-23 22:39:42'),
(75, 'muhammad', 'muhammad@gmail.com', 'Pakistan', '03160109634', 'hello', '2025-04-23 22:40:05', '2025-04-23 22:40:05'),
(76, 'muhammad', 'muhammad@gmail.com', 'Pakistan', '03160109634', 'hello', '2025-04-23 22:40:27', '2025-04-23 22:40:27'),
(77, 'muhammad', 'muhammad@gmail.com', 'Pakistan', '03160109634', 'hello', '2025-04-23 22:40:50', '2025-04-23 22:40:50'),
(78, 'muhammad', 'muhammad@gmail.com', 'Pakistan', '03160109634', 'hello', '2025-04-23 22:41:12', '2025-04-23 22:41:12'),
(79, 'muhammad', 'muhammad@gmail.com', 'Pakistan', '03160109634', 'hello', '2025-04-23 22:41:33', '2025-04-23 22:41:33'),
(80, 'muhammad', 'muhammad@gmail.com', 'Pakistan', '03160109634', 'hello', '2025-04-23 22:41:55', '2025-04-23 22:41:55'),
(81, 'muhammad', 'muhammad@gmail.com', 'Pakistan', '03160109634', 'hello', '2025-04-23 22:42:18', '2025-04-23 22:42:18'),
(82, 'noor', 'benishnisar56@gmail.com', 'Pakistan', '03566667791', 'hello', '2025-04-23 22:43:05', '2025-04-23 22:43:05'),
(83, 'noor', 'benishnisar56@gmail.com', 'Pakistan', '03566667791', 'hello', '2025-04-23 22:43:27', '2025-04-23 22:43:27'),
(84, 'noor', 'benishnisar56@gmail.com', 'Pakistan', '03566667791', 'hello', '2025-04-23 22:43:49', '2025-04-23 22:43:49'),
(85, 'Vielka Ramsey', 'lehihy@mailinator.com', 'Obcaecati harum quia', '+1 (658) 961-4828', 'Molestias doloribus', '2025-04-23 22:44:47', '2025-04-23 22:44:47'),
(86, 'Vielka Ramsey', 'lehihy@mailinator.com', 'Obcaecati harum quia', '+1 (658) 961-4828', 'Molestias doloribus', '2025-04-23 22:45:09', '2025-04-23 22:45:09'),
(87, 'Vielka Ramsey', 'lehihy@mailinator.com', 'Obcaecati harum quia', '+1 (658) 961-4828', 'Molestias doloribus', '2025-04-23 22:45:31', '2025-04-23 22:45:31'),
(88, 'Vielka Ramsey', 'lehihy@mailinator.com', 'Obcaecati harum quia', '+1 (658) 961-4828', 'Molestias doloribus', '2025-04-23 22:45:53', '2025-04-23 22:45:53'),
(89, 'Vielka Ramsey', 'lehihy@mailinator.com', 'Obcaecati harum quia', '+1 (658) 961-4828', 'Molestias doloribus', '2025-04-23 22:46:15', '2025-04-23 22:46:15'),
(90, 'benish', 'benishk800@gmail.com', 'Pakistan', '03160109634', 'hello', '2025-04-23 22:50:08', '2025-04-23 22:50:08'),
(91, 'benish', 'benishk800@gmail.com', 'Pakistan', '03160109634', 'hello', '2025-04-23 22:50:30', '2025-04-23 22:50:30'),
(92, 'benish', 'benishk800@gmail.com', 'Pakistan', '03160109634', 'hello', '2025-04-23 22:50:52', '2025-04-23 22:50:52'),
(93, 'benish', 'benishk800@gmail.com', 'Pakistan', '03160109634', 'hello', '2025-04-23 22:51:14', '2025-04-23 22:51:14'),
(94, 'muhammad', 'muhammad@gmail.com', 'Pakistan', '03160109634', 'Allah', '2025-04-23 23:00:33', '2025-04-23 23:00:33'),
(95, 'muhammad', 'muhammad@gmail.com', 'Pakistan', '03160109634', 'Allah', '2025-04-23 23:00:39', '2025-04-23 23:00:39'),
(96, 'noor', 'noor@gmail.com', 'Pakistan', '03566667791', 'good', '2025-04-23 23:16:24', '2025-04-23 23:16:24'),
(97, 'anaya', 'benishnisar56@gmail.com', 'Pakistan', '03566667791', 'work', '2025-04-23 23:24:29', '2025-04-23 23:24:29'),
(98, 'Muhammad', 'muhammadqadeer@gmail.com', 'Pakistan', '0347584948', 'hello', '2025-08-27 13:14:11', '2025-08-27 13:14:11'),
(99, 'Muhammad', 'muhammadqadeer@gmail.com', 'Pakistan', '0347584948', 'hello', '2025-08-27 13:14:21', '2025-08-27 13:14:21'),
(100, 'Muhammad', 'muhammad@gmail.com', 'Pakistan', '0347584948', 'hello', '2025-08-27 13:19:22', '2025-08-27 13:19:22'),
(101, 'Muhammad', 'muhammad@gmail.com', 'Pakistan', '0347584948', 'hello', '2025-08-27 13:19:27', '2025-08-27 13:19:27'),
(102, 'Muhammad', 'muhammad@gmail.com', 'Pakistan', '0347584948', 'work', '2025-08-27 13:19:47', '2025-08-27 13:19:47'),
(103, 'Muhammad', 'muhammad@gmail.com', 'Pakistan', '0347584948', 'work', '2025-08-27 13:19:50', '2025-08-27 13:19:50'),
(104, 'Muhammad', 'muhammad@gmail.com', 'Pakistan', '0347584948', 'hello', '2025-08-27 13:24:05', '2025-08-27 13:24:05'),
(105, 'Muhammad', 'muhammad@gmail.com', 'Pakistan', '0347584948', 'hello', '2025-08-27 13:24:09', '2025-08-27 13:24:09'),
(106, 'benish', 'benish@gmail.com', 'Pakistan', '0347584948', 'good', '2025-08-27 13:29:49', '2025-08-27 13:29:49'),
(107, 'benish', 'benish@gmail.com', 'Pakistan', '0347584948', 'good', '2025-08-27 13:29:53', '2025-08-27 13:29:53'),
(108, 'test', 'test@gmail.com', 'Pakistan', '0347584948', 'hello', '2025-08-27 13:37:51', '2025-08-27 13:37:51'),
(109, 'test', 'test@gmail.com', 'Pakistan', '0347584948', 'hello', '2025-08-27 13:37:56', '2025-08-27 13:37:56'),
(110, 'test', 'test@gmail.com', 'Pakistan', '03000339752', 'good', '2025-08-27 13:49:46', '2025-08-27 13:49:46'),
(111, 'test', 'test@gmail.com', 'Pakistan', '03000339752', 'good', '2025-08-27 13:49:52', '2025-08-27 13:49:52'),
(112, 'test', 'test@gmail.com', 'Pakistan', '0348798949', 'hlo', '2025-08-27 14:58:31', '2025-08-27 14:58:31'),
(113, 'test', 'test@gmail.com', 'Pakistan', '0348798949', 'hlo', '2025-08-27 14:58:36', '2025-08-27 14:58:36'),
(114, 'test', 'test@gmail.com', 'Pakistan', '0347584948', 'test', '2025-08-27 15:03:11', '2025-08-27 15:03:11'),
(115, 'test', 'test@gmail.com', 'Pakistan', '0347584948', 'test', '2025-08-27 15:03:17', '2025-08-27 15:03:17'),
(116, 'test', 'test@gmail.com', 'Pakistan', '0347584948', 'ssa', '2025-08-27 15:32:45', '2025-08-27 15:32:45'),
(117, 'hina', 'hina@gmail.com', 'Pakistan', '0347584948', 'hello', '2025-08-27 15:45:39', '2025-08-27 15:45:39'),
(118, 'test', 'test@gmail.com', 'Pakistan', '0347584948', 'test', '2025-08-27 15:46:30', '2025-08-27 15:46:30'),
(119, 'test', 'zubiaahsan925@gmail.com', 'Pakistan', '03160109634', 'test', '2025-08-27 15:52:26', '2025-08-27 15:52:26'),
(120, 'test order', 'zubiaahsan925@gmail.com', 'Pakistan', '03160109634', 'good', '2025-08-27 15:58:03', '2025-08-27 15:58:03');

-- --------------------------------------------------------

--
-- Table structure for table `contact_settings`
--

CREATE TABLE `contact_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `address` text NOT NULL,
  `phones` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`phones`)),
  `emails` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`emails`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_settings`
--

INSERT INTO `contact_settings` (`id`, `note`, `address`, `phones`, `emails`, `created_at`, `updated_at`) VALUES
(1, '+92', '305, Frere Business Centre, Frere Road, Adjacent Akhbar Market, Saddar, Karachi-75350 (Pakistan)', '[\"0092-21-2772944, 2772945, 2721357, 2721359, 2750546, 2750547\"]', '[\"azizismail@cyber.net.pk\",\"info@azizismail.com\"]', '2025-08-27 20:18:29', '2025-08-27 20:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `corporate`
--

CREATE TABLE `corporate` (
  `id` int(11) NOT NULL,
  `corporate_id` int(11) NOT NULL,
  `block_type` enum('heading','paragraph','list','image') NOT NULL,
  `content` text NOT NULL,
  `image` varchar(800) DEFAULT NULL,
  `sort_order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `corporate`
--

INSERT INTO `corporate` (`id`, `corporate_id`, `block_type`, `content`, `image`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'heading', 'empowerings', 'uploads/corporate/1743333556_tARMa60ui8.jpg', 39, '2025-03-30 18:19:16', '2025-03-30 18:19:16'),
(2, 1, 'heading', 'empowerings', 'uploads/corporate/1743333618_Qi4gnTT4ok.jpg', 39, '2025-03-30 18:20:18', '2025-03-30 18:20:18'),
(3, 1, 'list', 'Velit placeat iusto', NULL, 1, '2025-03-30 18:24:51', '2025-03-30 18:24:51');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `year_label` varchar(20) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `original_name` varchar(255) DEFAULT NULL,
  `mime_type` varchar(100) DEFAULT NULL,
  `size_bytes` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`id`, `title`, `year_label`, `file_path`, `original_name`, `mime_type`, `size_bytes`, `created_at`, `updated_at`) VALUES
(1, 'law firm', 'Year 2007-08', 'downloads/1756196880_law_firm.doc', 'st0708 (1).doc', 'application/msword', 55808, '2025-08-26 15:28:00', '2025-08-26 15:28:00'),
(2, 'law firm', 'Year 2007-08', 'downloads/1756197590_law_firm.doc', 'st0708 (1).doc', 'application/msword', 55808, '2025-08-26 15:39:50', '2025-08-26 15:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `inner_banners`
--

CREATE TABLE `inner_banners` (
  `id` int(11) NOT NULL,
  `name` varchar(900) NOT NULL,
  `image` varchar(900) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inner_banners`
--

INSERT INTO `inner_banners` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Business_Sectors', 'inner_banners/1756553809_business-sectorsaa.jpg', '2025-08-27 18:01:17', '2025-08-30 19:56:19'),
(2, 'administration', 'inner_banners/1756553818_administration.jpg', '2025-08-27 18:31:15', '2025-08-30 18:36:58'),
(3, 'softwares', 'inner_banners/1756553831_softwares.jpg', '2025-08-27 18:51:11', '2025-08-30 18:37:11'),
(4, 'clients', 'inner_banners/1756553849_clients.jpg', '2025-08-27 19:03:42', '2025-08-30 18:37:29'),
(5, 'downloads', 'inner_banners/1756553861_downloads.jpg', '2025-08-27 19:03:56', '2025-08-30 18:37:41'),
(6, 'jobs & careers', 'inner_banners/1756553875_jobs-careers.jpg', '2025-08-27 19:04:18', '2025-08-30 18:37:55'),
(7, 'about', 'inner_banners/1756553887_about.jpg', '2025-08-27 19:18:04', '2025-08-30 18:38:07'),
(8, 'contact', 'inner_banners/1756553901_contact.jpg', '2025-08-27 19:21:54', '2025-08-30 18:38:21'),
(9, 'services', 'inner_banners/1756553910_services.jpg', '2025-08-29 12:44:19', '2025-08-30 18:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(900) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_consents`
--

CREATE TABLE `patient_consents` (
  `id` int(11) NOT NULL,
  `patient_full_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `emergency_contact` varchar(255) DEFAULT NULL,
  `consent_to_assessment` tinyint(1) NOT NULL,
  `understanding_of_benefits_and_risks` tinyint(1) NOT NULL,
  `medical_history_disclosure` tinyint(1) NOT NULL,
  `home_virtual_session_responsibility` tinyint(1) NOT NULL,
  `tele_rehabilitation_consent` tinyint(1) NOT NULL,
  `data_privacy` tinyint(1) NOT NULL,
  `payment_policy_acknowledgment` tinyint(1) NOT NULL,
  `voluntary_participation` tinyint(1) NOT NULL,
  `liability_waiver` tinyint(1) NOT NULL,
  `guardian_consent` tinyint(1) NOT NULL,
  `final_agreement_statement` tinyint(1) NOT NULL,
  `patient_signature` varchar(255) DEFAULT NULL,
  `signature_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_consents`
--

INSERT INTO `patient_consents` (`id`, `patient_full_name`, `date_of_birth`, `contact_number`, `email_address`, `emergency_contact`, `consent_to_assessment`, `understanding_of_benefits_and_risks`, `medical_history_disclosure`, `home_virtual_session_responsibility`, `tele_rehabilitation_consent`, `data_privacy`, `payment_policy_acknowledgment`, `voluntary_participation`, `liability_waiver`, `guardian_consent`, `final_agreement_statement`, `patient_signature`, `signature_date`, `created_at`, `updated_at`) VALUES
(1, 'benish', '2025-12-12', '03848585999', 'benishnisark800@gmail.com', '03848585999', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'benish', '2025-12-12', '2025-12-12 16:04:32', '2025-12-12 16:04:32'),
(2, 'benish', '2025-12-12', '03848585999', 'benishnisark800@gmail.com', '03848585999', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'benish', '2025-12-12', '2025-12-12 16:05:25', '2025-12-12 16:05:25'),
(3, 'Gabriel Anderson', '1999-02-09', '03177638152', 'roxysybeg@mailinator.com', 'A aut ipsum ad sunt', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Officia omnis nulla', '1973-03-09', '2025-12-12 16:26:50', '2025-12-12 16:26:50');

-- --------------------------------------------------------

--
-- Table structure for table `patient_medical_history`
--

CREATE TABLE `patient_medical_history` (
  `id` int(11) NOT NULL,
  `patient_full_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `home_address` text NOT NULL,
  `emergency_contact_name` varchar(255) NOT NULL,
  `emergency_contact_number` varchar(15) NOT NULL,
  `primary_complaint` text DEFAULT NULL,
  `pain_details_location` text DEFAULT NULL,
  `pain_level` int(11) DEFAULT NULL,
  `pain_type` text DEFAULT NULL,
  `pain_worse_during` text DEFAULT NULL,
  `pain_reduction` text DEFAULT NULL,
  `past_medical_history` text DEFAULT NULL,
  `surgical_history` text DEFAULT NULL,
  `surgery_type` varchar(255) DEFAULT NULL,
  `surgery_year` int(4) DEFAULT NULL,
  `additional_surgery` text DEFAULT NULL,
  `injury_history` text DEFAULT NULL,
  `medication_info` text DEFAULT NULL,
  `allergies` text DEFAULT NULL,
  `post_surgical_medical_clearance` text DEFAULT NULL,
  `lifestyle_activity_level` text DEFAULT NULL,
  `exercise_routine` text DEFAULT NULL,
  `functional_limitations` text DEFAULT NULL,
  `women_health_status` text DEFAULT NULL,
  `pregnant_status` enum('yes','no') DEFAULT NULL,
  `recent_delivery` enum('yes','no') DEFAULT NULL,
  `goals_from_therapy` text DEFAULT NULL,
  `home_virtual_session_safety` text DEFAULT NULL,
  `declaration_agreement` text DEFAULT NULL,
  `patient_signature` varchar(255) DEFAULT NULL,
  `signature_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `occupation` text DEFAULT NULL,
  `problem_start` varchar(500) NOT NULL,
  `problem_cause` varchar(500) NOT NULL,
  `other_goals` text DEFAULT NULL,
  `medication_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_medical_history`
--

INSERT INTO `patient_medical_history` (`id`, `patient_full_name`, `date_of_birth`, `age`, `gender`, `contact_number`, `email_address`, `home_address`, `emergency_contact_name`, `emergency_contact_number`, `primary_complaint`, `pain_details_location`, `pain_level`, `pain_type`, `pain_worse_during`, `pain_reduction`, `past_medical_history`, `surgical_history`, `surgery_type`, `surgery_year`, `additional_surgery`, `injury_history`, `medication_info`, `allergies`, `post_surgical_medical_clearance`, `lifestyle_activity_level`, `exercise_routine`, `functional_limitations`, `women_health_status`, `pregnant_status`, `recent_delivery`, `goals_from_therapy`, `home_virtual_session_safety`, `declaration_agreement`, `patient_signature`, `signature_date`, `created_at`, `updated_at`, `occupation`, `problem_start`, `problem_cause`, `other_goals`, `medication_status`) VALUES
(1, 'Reese Caldwell', '2014-06-10', 25, 'Other', '03177638152', 'qeziwunyku@mailinator.com', 'Aut adipisci officia', '03177638152', '03177638152', 'Expedita commodi non', 'knee', 5, 'Throbbing', 'exercise', 'movement', NULL, 'no', NULL, NULL, NULL, 'Voluptate quo dicta', NULL, 'Possimus quia exerc', NULL, 'Active', 'none', 'standingDiff', 'yes', NULL, NULL, 'Sunt deserunt natus', 'reportDiscomfort', 'BENish', 'BENish', '2003-09-11', '2025-12-11 20:44:21', '2025-12-11 20:44:21', 'Laboriosam est natu', '', '', NULL, NULL),
(2, 'benish Nisar', '2002-03-11', 23, 'Female', '03177638152', 'benishnisarkhan56@gmail.com', 'pakistan Navy', '03177638152', '03177638152', 'test', 'neck', 10, 'Sharp', 'walking', NULL, 'highBP', 'no', NULL, NULL, NULL, 'test', NULL, NULL, NULL, 'Moderate', NULL, 'sleepingDiff', 'yes', NULL, NULL, 'test', 'reportDiscomfort', 'benish', 'benish', '2025-12-11', '2025-12-11 20:48:22', '2025-12-11 20:48:22', 'test', '', '', NULL, NULL),
(3, 'Erica Gordon', '1986-11-23', 24, 'Female', '03848585999', 'gufu@mailinator.com', 'Optio velit cumque', '03848585999', '03848585999', 'Dolore et et id dolo', 'wrist', 10, 'Stiff', 'standing', 'heat', 'heartDisease', 'yes', NULL, NULL, NULL, 'test', 'test', NULL, NULL, 'Moderate', NULL, 'sittingDiff', 'yes', NULL, NULL, NULL, 'reportDiscomfort', 'benush', 'benush', '2025-12-18', '2025-12-11 20:59:57', '2025-12-11 20:59:57', 'test', '', '', NULL, NULL),
(4, 'Carson Merrill', '1999-01-31', 48, 'Male', '03177638152', 'kelycegolu@mailinator.com', 'Dolore obcaecati exp', '03177638152', '03177638152', 'Sit architecto nulla', 'shoulder, hip', 5, 'dull, stiff, throbbing', 'sitting, standing, walking, sleeping, exercise', 'ice', 'highBP, asthma, arthritis, osteoporosis, thyroid, other', 'no', NULL, NULL, NULL, 'Dolor ut illo delect', 'Exercitation cumque', 'none', 'no', 'low', 'walking', 'bending, lifting, sleepingDiff', 'yes', NULL, NULL, 'returnToSports, longTermWellness', 'safeSpace, reportDiscomfort', 'Abigail Hutchinson', 'Dolorum quidem volup', '1970-02-22', '2025-12-12 04:21:49', '2025-12-12 04:21:49', 'Pariatur Qui enim r', 'last_month', 'gradual', 'Officia excepteur qu', NULL),
(5, 'Benish', '2001-07-11', 18, 'Female', '03177638152', 'benishnisarkhan56@gmail.com', 'Pakistan Navy Coloby', '03177638152', '03177638152', 'rehaborin leg pain test', 'other', 10, 'dull', 'standing', NULL, 'highBP, stroke', 'yes', 'fraacturt', 2010, 'fractyre', 'test injury work', 'panadolll', 'other, yes alllerge', 'yes, i advised a doctor', 'moderate', NULL, 'walkingDiff, bending', 'yes', NULL, NULL, 'painRelief, fasterRecovery', 'safeSpace, reportDiscomfort', 'Benish', 'Benish', '2025-12-11', '2025-12-12 14:00:41', '2025-12-12 14:00:41', 'doctor', 'last_week', 'accident', 'test', NULL),
(6, 'benish', '2001-07-11', 24, 'Female', '03848585999', 'benishnisark800@gmail.com', 'Pakistan', '03848585999', '03848585999', 'rehaborin complaint details', 'neck, hip, wrist, other', 10, 'sharp, stiff', 'standing, walking', 'heat, ice, medication', 'highBP, diabetes, osteoporosis, other, asthma be ha mujih', 'no', NULL, NULL, NULL, 'fractures, sportsInjuries, injury history fractures howa tha', 'doctor mediha', 'medications, mujih allergy be ha', 'yes, pleaase treat a best way', 'moderate', 'homeWorkout', 'walkingDiff', 'yes', NULL, NULL, 'fasterRecovery', 'safeSpace, reportDiscomfort', 'benish', 'benish', '2025-12-11', '2025-12-12 14:26:58', '2025-12-12 14:26:58', 'doctor', 'last_week', 'sports', 'so fast', NULL),
(7, 'Bruce Garcia', '1977-01-09', 102, 'Other', '03848585999', 'wurozyki@mailinator.com', 'Officia consectetur', '03848585999', '03848585999', 'Et sint eligendi qu', 'neck', 9, 'dull, throbbing', 'standing, walking', NULL, 'neuro, other, asthma', 'no', NULL, NULL, NULL, 'sportsInjuries, yes', NULL, 'none, test', 'no', 'veryActive', NULL, 'dressing', NULL, 'no', 'no', 'improvePosture', 'safeSpace, reportDiscomfort', 'benish', NULL, '2025-12-11', '2025-12-12 15:06:15', '2025-12-12 15:06:15', 'doctor', 'last_week', 'gradual', 'TESR', 'no'),
(8, 'Althea Joyner', '2020-02-09', 19, 'Female', '03177638152', 'xaguf@mailinator.com', 'Voluptatem Quod dic', '03177638152', '03177638152', 'Soluta vel perspicia', 'neck, shoulder, back, wrist', 5, 'dull, burning, stiff, throbbing', 'walking, exercise', 'heat, ice, medication, movement', 'asthma, osteoporosis, neuro, other, Magni nostrud aspern', 'yes', 'Aliquam ad adipisici', 2009, 'Atque minima sed ven', 'muscleTears, sportsInjuries, Asperiores id quisq', NULL, 'medications, Vel asperiores dolor', 'yes, Eum molestiae alias', 'veryActive', 'walking, sports', 'standingDiff, sleepingDiff', NULL, 'no', 'yes', 'fasterRecovery, returnToSports, improvePosture', 'safeSpace, reportDiscomfort', 'MacKenzie Burton', 'MacKenzie Burton', '2002-03-30', '2025-12-12 16:03:49', '2025-12-12 16:03:49', 'Perferendis adipisic', 'more_than_3_months', 'sports', 'Iusto veritatis dese', 'no'),
(9, 'Baker Ingram', '2012-03-06', 72, 'Male', '03177638152', 'hoqahatili@mailinator.com', 'Ipsum ex optio dol', '03177638152', '03177638152', 'Recusandae Eum natu', 'neck, back, hip, ankle', 6, 'sharp, throbbing', 'standing, sleeping, exercise', 'heat, ice, medication, movement', 'highBP, diabetes, asthma, arthritis, osteoporosis, neuro', 'no', NULL, NULL, NULL, 'Ipsum est corporis', NULL, 'latex, Cum non perspiciatis', 'yes, Est iusto temporibus', 'active', 'none, walking, gym, sports', 'lifting, sittingDiff, sleepingDiff', NULL, 'no', 'yes', 'betterMovement, returnToSports, improvePosture', NULL, 'Magee Vaughan', 'Natus deserunt minim', '1980-06-17', '2025-12-12 16:26:07', '2025-12-12 16:26:07', 'Repudiandae laudanti', 'more_than_3_months', 'sports', 'Duis velit et duis m', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role_name`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` longtext DEFAULT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(566) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `slug`, `description`, `sort_order`, `is_active`, `created_at`, `updated_at`, `image`) VALUES
(1, 'income taxs', 'income-taxs', '<h2 class=\"\"><font face=\"Arial\" style=\"font-weight: normal;\">Tailored one-on-one therapy sessions designed to treat pain, restore movement, and strengthen your body.</font><span style=\"font-weight: normal; font-family: Arial;\">We create custom plans based on your condition, lifestyle, and goals.</span></h2><h2 class=\"\"><span style=\"font-weight: normal; font-family: Arial;\">We help with:</span></h2><h2 class=\"\"><font face=\"Arial\"><span style=\"white-space: normal; font-weight: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Back &amp; neck pain</span></font></h2><h2 class=\"\"><font face=\"Arial\"><span style=\"white-space: normal; font-weight: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Joint stiffness</span></font></h2><h2 class=\"\"><font face=\"Arial\"><span style=\"white-space: normal; font-weight: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Posture issues</span></font></h2><h2 class=\"\"><font face=\"Arial\"><span style=\"white-space: normal; font-weight: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Muscle imbalances</span></font></h2><h2 class=\"\"><font face=\"Arial\"><span style=\"white-space: normal; font-weight: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Mobility problems</span></font></h2><div><br></div>', 1, 1, '2025-08-26 19:06:29', '2025-12-04 15:37:30', 'uploads/services/income-taxs-1764833738.webp'),
(2, 'Sale Tax (Law and Procedures)', 'sale-tax-law-and-procedures', '<h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400;\"></span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400;\">Evidence-based techniques to reduce chronic or acute pain without relying heavily on medication.</span></h3><div><span style=\"font-size: 24px; font-family: Nunito, sans-serif;\">Includes:</span></div><h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400; white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Manual therapy</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400; white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Guided exercises</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400; white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Heat/ice therapy plans</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400; white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Pain-relief routines</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400; white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Postural correction</span></h3>', 2, 1, '2025-08-26 20:34:10', '2025-12-04 15:39:59', 'uploads/services/sale-tax-law-and-procedures-1764833999.png'),
(3, 'Post-Injury Rehabilitation', 'post-injury-rehabilitation', '<h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400;\">Recover stronger after accidents, sprains, muscle tears, or sports injuries.</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400;\">We assist your healing process and help prevent future injuries.</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400;\"><br></span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400;\">Ideal for:</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400; white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Sports injuries</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400; white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Strains &amp; sprains</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400; white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Tendon issues</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: 400; white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Muscle fatigue recovery</span></h3><div><br></div>', 3, 1, '2025-08-29 13:15:19', '2025-12-04 15:41:37', 'uploads/services/assitance-in-book-keeping-1756553655.jpg'),
(4, 'Post-Surgical Rehabilitation', 'post-surgical-rehabilitation', '<h3 class=\"\"><span style=\"font-size: 24px; font-weight: normal;\">Supportive and medically-guided rehab following surgeries such as:</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: normal;\">ACL repair, joint replacement, spinal surgery, fractures, and more.</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: normal;\"><br></span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: normal;\">Focus areas:</span></h3><h3 class=\"\"><span style=\"font-size: 24px; white-space: normal; font-weight: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Regaining strength</span></h3><h3 class=\"\"><span style=\"font-size: 24px; white-space: normal; font-weight: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Improving mobility</span></h3><h3 class=\"\"><span style=\"font-size: 24px; white-space: normal; font-weight: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Speeding up healing</span></h3><h3 class=\"\"><span style=\"font-size: 24px; white-space: normal; font-weight: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Preventing complications</span></h3><h3 class=\"\"><br></h3>', 4, 1, '2025-08-29 13:17:29', '2025-12-04 15:42:06', 'uploads/services/company-law-law-and-procedures-1756553666.jpg'),
(5, 'At-Home Physiotherapy Sessions', 'at-home-physiotherapy-sessions', '<h3 class=\"\"><span style=\"font-size: 24px; font-weight: normal;\">Skip the clinic — our professionals guide you from the comfort of your home.</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: normal;\">Perfect for seniors, busy individuals, or anyone who prefers personalized care at home.</span></h3><div><br></div>', 5, 1, '2025-08-29 13:20:56', '2025-12-04 15:42:42', 'uploads/services/trademark-law-and-procedures-1756553681.jpg'),
(6, 'Online / Virtual Rehabilitation', 'online-virtual-rehabilitation', '<h3 class=\"\"><span style=\"font-size: 24px; font-weight: normal;\">Convenient video-based rehab sessions supported by our app and tools.</span></h3><h3 class=\"\"><span style=\"font-size: 24px; font-weight: normal;\">You get real-time guidance, progress tracking, and exercise monitoring.</span></h3><div><br></div>', 6, 1, '2025-08-29 13:23:20', '2025-12-04 15:43:21', 'uploads/services/copyrights-law-and-procedures-1756553692.jpg'),
(7, 'Preventive & Wellness Programs', 'preventive-wellness-programs', '<p>Stay strong, mobile, and healthy with routine rehab + mobility training programs.</p><p><br></p><p>Includes:</p><p><span style=\"white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Flexibility & mobility routines</span></p><p><span style=\"white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Strength & stability training</span></p><p><span style=\"white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Desk-job posture programs</span></p><p><span style=\"white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Home workout & recovery plans</span></p><div><br></div>', 7, 1, '2025-12-04 15:44:16', '2025-12-04 15:44:16', 'uploads/services/preventive-wellness-programs-1764834256.jpg'),
(8, 'Chronic Condition Management', 'chronic-condition-management', '<p>Long-term physical conditions require long-term support — we help you manage them effectively.</p><p><br></p><p>We support:</p><p><span style=\"white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Arthritis</span></p><p><span style=\"white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Sciatica</span></p><p><span style=\"white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Chronic back pain</span></p><p><span style=\"white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Shoulder & knee issues</span></p><p><span style=\"white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Neck tension & migraines (MSK-related)</span></p><div><br></div>', 8, 1, '2025-12-04 15:44:50', '2025-12-04 15:44:50', 'uploads/services/chronic-condition-management-1764834290.png'),
(9, 'Corporate & Workplace Wellness', 'corporate-workplace-wellness', '<p>Custom solutions for companies to reduce workplace injuries and boost employee well-being.</p><p><br></p><p>Services include:</p><p><span style=\"white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Ergonomic assessments</span></p><p><span style=\"white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Posture workshops</span></p><p><span style=\"white-space: normal;\"><span style=\"white-space:pre\">	</span>•<span style=\"white-space:pre\">	</span>Therapy sessions for teams</span></p><div><br></div>', 10, 1, '2025-12-04 15:45:40', '2025-12-04 15:45:40', 'uploads/services/corporate-workplace-wellness-1764834340.png'),
(10, 'Pediatric Physiotherapy', 'pediatric-physiotherapy', '<p>Gentle, age-appropriate therapy for children dealing with mobility delays, injuries, or posture issues.</p>', 10, 1, '2025-12-04 15:46:14', '2025-12-04 15:46:14', 'uploads/services/pediatric-physiotherapy-1764834374.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(800) NOT NULL,
  `lastname` varchar(800) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `mobile_phone` varchar(50) DEFAULT NULL,
  `password` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `city` varchar(500) NOT NULL,
  `country` varchar(500) NOT NULL,
  `zip_code` varchar(500) NOT NULL,
  `address_line1` varchar(500) DEFAULT NULL,
  `address_line2` varchar(500) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `organization` varchar(500) NOT NULL,
  `profile_img` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `phone`, `mobile_phone`, `password`, `gender`, `date_of_birth`, `city`, `country`, `zip_code`, `address_line1`, `address_line2`, `role_id`, `organization`, `profile_img`, `created_at`, `updated_at`) VALUES
(2, 'weboctanes', 'octanes', 'weboctane@gmail.com', '', NULL, '$2y$10$ZZBRgu2N2iiQvIscTR4E3uTQlEO/JGqfbQ3kPU9w6DLJoRpQ8KNo2', 'male', NULL, 'karachi', 'Pakistan', '75005', NULL, NULL, 1, 'weboctane@gmail.com', 'assets/profile_images/1744011663_web.png', '2025-04-03 06:24:10', '2025-04-07 14:41:03'),
(3, 'aziz ismail', 'aziz', 'azizismail@gmail.com', '03160109634', '03000339752', '$2y$10$z6/kLWJLK5MRw8CRIex5ZeMSWLVPkZhjH.bHcw3oOAojD9TeFqW8O', 'male', NULL, 'karachi', 'Pakistan', '75505', 'saddar', 'j 3/4 Pak jumhuria colony P.N.S shifa road karachi near DSRA clinic', 1, 'aziz', 'assets/profile_images/1765276556_1.webp', '2025-04-03 18:30:17', '2025-12-09 18:35:56'),
(4, 'benish', 'nisar', 'benishnisarkhan56@gmail.com', '03177638152', '03177638152', '$2y$10$l3huZVERNK0WMRYPq.w7keH1ugujKaHYPtTedGjiUmi0Sj/wCdTXW', 'female', '2001-07-18', 'karachi', 'Pakistan', '75505', 'j2/2 Pak Jumhuriya colony', 'j2/2 Pak Jumhuriya colony', 1, 'https://weboctane.tech/', 'assets/profile_images/1765267424_1.webp', '2025-12-09 16:03:44', '2025-12-09 16:03:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_settings`
--
ALTER TABLE `contact_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corporate`
--
ALTER TABLE `corporate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `downloads_year_label_index` (`year_label`);

--
-- Indexes for table `inner_banners`
--
ALTER TABLE `inner_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_consents`
--
ALTER TABLE `patient_consents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_medical_history`
--
ALTER TABLE `patient_medical_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`),
  ADD KEY `idx_services_active_sort` (`is_active`,`sort_order`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `contact_settings`
--
ALTER TABLE `contact_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `corporate`
--
ALTER TABLE `corporate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inner_banners`
--
ALTER TABLE `inner_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_consents`
--
ALTER TABLE `patient_consents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient_medical_history`
--
ALTER TABLE `patient_medical_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
