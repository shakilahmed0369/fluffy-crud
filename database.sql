-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2023 at 01:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `base_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `image`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'admin@gmail.com', 'uploads/website-images/avatar-2023-11-05-08-21-19-9394.jpg', '$2y$12$pKn6MXsigfoebcqJzO.Tz.RpZ4D041kFn4swG6C7OeWLnqcFcYAOy', 'active', '2023-11-04 23:05:41', '2023-11-05 02:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `basic_payments`
--

CREATE TABLE `basic_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basic_payments`
--

INSERT INTO `basic_payments` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'stripe_key', 'pk_test_51JU61aF56Pb8BOOX5ucAe5DlDwAkCZyffqlKMDUWsAwhKbdtuY71VvIzr0NgFKjq4sOVVaaeeyVXXnNWwu5dKgeq00kMzCBUm5', NULL, '2023-11-08 00:22:01'),
(2, 'stripe_secret', 'sk_test_51JU61aF56Pb8BOOXlz7jGkzJsCkozuAoRlFJskYGsgunfaHLmcvKLubYRQLCQOuyYHq0mvjoBFLzV7d8F6q8f6Hv00CGwULEEV', NULL, '2023-11-08 00:22:01'),
(3, 'stripe_currency_id', '1', NULL, '2023-11-08 00:22:01'),
(4, 'stripe_status', 'active', NULL, '2023-11-08 00:22:01'),
(5, 'stripe_charge', '5.00', NULL, '2023-11-08 00:22:01'),
(6, 'stripe_image', 'uploads/website-images/file-2023-11-07-11-50-26-1091.jpg', NULL, '2023-11-07 05:50:26'),
(7, 'paypal_client_id', 'AWlV5x8Lhj9BRF8-TnawXtbNs-zt69mMVXME1BGJUIoDdrAYz8QIeeTBQp0sc2nIL9E529KJZys32Ipy', NULL, '2023-11-08 02:51:34'),
(8, 'paypal_secret_key', 'EEvn1J_oIC6alxb-FoF4t8buKwy4uEWHJ4_Jd_wolaSPRMzFHe6GrMrliZAtawDDuE-WKkCKpWGiz0Yn', NULL, '2023-11-08 02:51:34'),
(9, 'paypal_account_mode', 'sandbox', NULL, '2023-11-08 02:51:34'),
(10, 'paypal_currency_id', '1', NULL, '2023-11-08 02:51:34'),
(11, 'paypal_charge', '5.00', NULL, '2023-11-08 02:51:34'),
(12, 'paypal_status', 'active', NULL, '2023-11-08 02:51:34'),
(13, 'paypal_image', 'uploads/website-images/file-2023-11-08-03-41-46-4005.jpg', NULL, '2023-11-07 21:41:46'),
(14, 'bank_information', 'Bank Name: Your bank name\r\nAccount Number:  Your bank account number\r\nRouting Number: Your bank routing number\r\nBranch: Your bank branch name', NULL, '2023-11-08 05:54:28'),
(15, 'bank_status', 'active', NULL, '2023-11-08 05:54:28'),
(16, 'bank_image', 'uploads/website-images/file-2023-11-08-11-50-11-2215.jpg', NULL, '2023-11-08 05:50:11'),
(17, 'bank_charge', '2.00', NULL, '2023-11-08 05:54:28'),
(18, 'bank_currency_id', '1', NULL, '2023-11-08 05:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `custom_paginations`
--

CREATE TABLE `custom_paginations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `item_qty` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custom_paginations`
--

INSERT INTO `custom_paginations` (`id`, `section_name`, `item_qty`, `created_at`, `updated_at`) VALUES
(1, 'Blog List', 10, NULL, '2023-11-06 03:53:46'),
(2, 'Blog Comment', 5, NULL, '2023-11-06 03:53:42');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `name`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'password_reset', 'Password Reset', '<p>Dear {{user_name}},</p>\r\n<p>Do you want to reset your password? Please Click the following link and Reset Your Password.</p>', NULL, '2023-11-06 21:34:59'),
(2, 'contact_mail', 'Contact Email', '<p>Hello there,</p>\r\n<p>&nbsp;Mr. {{name}} has sent a new message. you can see the message details below.&nbsp;</p>\r\n<p>Email: {{email}}</p>\r\n<p>Phone: {{phone}}</p>\r\n<p>Subject: {{subject}}</p>\r\n<p>Message: {{message}}</p>', NULL, '2023-11-06 21:34:19'),
(3, 'subscribe_notification', 'Subscribe Notification', '<p>Hi there, Congratulations! Your Subscription has been created successfully. Please Click the following link and Verified Your Subscription. If you won\'t approve this link, you can\'t get any newsletter from us.</p>', NULL, '2023-11-06 21:36:44'),
(4, 'user_verification', 'User Verification', '<p>Dear {{user_name}},</p>\r\n<p>Congratulations! Your Account has been created successfully. Please Click the following link and Active your Account.</p>', NULL, '2023-11-06 21:40:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_11_05_045432_create_admins_table', 2),
(8, '2023_11_06_043247_create_settings_table', 3),
(9, '2023_11_06_054251_create_seo_settings_table', 4),
(10, '2023_11_06_094842_create_custom_paginations_table', 5),
(11, '2023_11_06_115856_create_email_templates_table', 6),
(12, '2023_11_07_051924_create_multi_currencies_table', 7),
(13, '2023_11_07_103108_create_basic_payments_table', 8),
(14, '2023_11_09_035236_create_payment_gateways_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `multi_currencies`
--

CREATE TABLE `multi_currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency_name` varchar(255) NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `currency_code` varchar(255) NOT NULL,
  `currency_icon` varchar(255) NOT NULL,
  `is_default` varchar(255) NOT NULL,
  `currency_rate` decimal(8,2) NOT NULL,
  `currency_position` varchar(255) NOT NULL DEFAULT 'before_price',
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `multi_currencies`
--

INSERT INTO `multi_currencies` (`id`, `currency_name`, `country_code`, `currency_code`, `currency_icon`, `is_default`, `currency_rate`, `currency_position`, `status`, `created_at`, `updated_at`) VALUES
(1, '$-USD', 'USD', 'USD', '$', 'yes', '1.00', 'before_price', 'active', '2023-11-07 00:18:59', '2023-11-07 00:57:51'),
(3, '₦-NGN', 'NG', 'NGN', '₦', 'no', '1.00', 'before_price', 'active', '2023-11-07 00:39:50', '2023-11-09 04:09:52'),
(4, '₹-INR', 'IN', 'INR', '₹', 'no', '83.26', 'before_price', 'active', '2023-11-09 00:29:36', '2023-11-09 00:29:36'),
(5, '$-CAD', 'CAD', 'CAD', 'C$', 'no', '1.38', 'before_price', 'active', '2023-11-09 00:30:08', '2023-11-09 00:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateways`
--

CREATE TABLE `payment_gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_gateways`
--

INSERT INTO `payment_gateways` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'razorpay_key', 'rzp_test_K7CipNQYyyMPiS', NULL, '2023-11-09 00:30:28'),
(2, 'razorpay_secret', 'zSBmNMorJrirOrnDrbOd1ALO', NULL, '2023-11-09 00:30:28'),
(3, 'razorpay_name', 'WebSolutionUs', NULL, '2023-11-09 00:30:28'),
(4, 'razorpay_description', 'This is test payment window', NULL, '2023-11-09 00:30:28'),
(5, 'razorpay_charge', '5.00', NULL, '2023-11-09 00:30:28'),
(6, 'razorpay_theme_color', '#6d0ce4', NULL, '2023-11-09 00:30:28'),
(7, 'razorpay_status', 'active', NULL, '2023-11-09 00:30:28'),
(8, 'razorpay_currency_id', '4', NULL, '2023-11-09 00:30:28'),
(9, 'razorpay_image', 'uploads/website-images/file-2023-11-09-04-10-24-5782.jpg', NULL, '2023-11-08 22:10:24'),
(10, 'flutterwave_public_key', 'FLWPUBK_TEST-5760e3ff9888aa1ab5e5cd1ec3f99cb1-X', NULL, '2023-11-09 04:20:49'),
(11, 'flutterwave_secret_key', 'FLWSECK_TEST-81cb5da016d0a51f7329d4a8057e766d-X', NULL, '2023-11-09 04:20:50'),
(12, 'flutterwave_app_name', 'WebSolutionUs', NULL, '2023-11-09 04:20:50'),
(13, 'flutterwave_charge', '1', NULL, '2023-11-09 04:20:49'),
(14, 'flutterwave_currency_id', '3', NULL, '2023-11-09 04:20:49'),
(15, 'flutterwave_status', 'active', NULL, '2023-11-09 04:20:50'),
(16, 'flutterwave_image', 'uploads/website-images/file-2023-11-09-05-20-12-1375.jpg', NULL, '2023-11-08 23:20:12'),
(17, 'paystack_public_key', 'pk_test_057dfe5dee14eaf9c3b4573df1e3760c02c06e38', NULL, '2023-11-08 23:42:54'),
(18, 'paystack_secret_key', 'sk_test_77cb93329abbdc18104466e694c9f720a7d69c97', NULL, '2023-11-08 23:42:54'),
(19, 'paystack_status', 'active', NULL, '2023-11-08 23:42:54'),
(20, 'paystack_charge', '5.00', NULL, '2023-11-08 23:42:54'),
(21, 'paystack_image', 'uploads/website-images/file-2023-11-09-05-32-42-6891.jpg', NULL, '2023-11-08 23:32:42'),
(22, 'paystack_currency_id', '3', NULL, '2023-11-08 23:42:54'),
(23, 'mollie_key', 'test_HFc5UhscNSGD5jujawhtNFs3wM3B4n', NULL, '2023-11-08 23:42:26'),
(24, 'mollie_charge', '5.00', NULL, '2023-11-08 23:42:26'),
(25, 'mollie_image', 'uploads/website-images/file-2023-11-09-05-42-26-5657.jpg', NULL, '2023-11-08 23:42:26'),
(26, 'mollie_status', 'active', NULL, '2023-11-08 23:42:26'),
(27, 'mollie_currency_id', '1', NULL, '2023-11-08 23:42:26'),
(28, 'instamojo_account_mode', 'Sandbox', NULL, NULL),
(29, 'instamojo_api_key', 'test_5f4a2c9a58ef216f8a1a688910f', NULL, '2023-11-08 23:54:19'),
(30, 'instamojo_auth_token', 'test_994252ada69ce7b3d282b9941c2', NULL, '2023-11-08 23:54:19'),
(31, 'instamojo_charge', '5.00', NULL, '2023-11-08 23:54:19'),
(32, 'instamojo_image', 'uploads/website-images/file-2023-11-09-05-54-19-7525.jpg', NULL, '2023-11-08 23:54:19'),
(33, 'instamojo_currency_id', '1', NULL, '2023-11-08 23:54:19'),
(34, 'instamojo_status', 'active', NULL, '2023-11-08 23:54:19');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seo_settings`
--

CREATE TABLE `seo_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `seo_title` text NOT NULL,
  `seo_description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seo_settings`
--

INSERT INTO `seo_settings` (`id`, `page_name`, `seo_title`, `seo_description`, `created_at`, `updated_at`) VALUES
(1, 'Homepage', 'Homepage', 'Homepage', NULL, NULL),
(2, 'About Us', 'About Us', 'About Us', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'app_name', 'WebSolutionUs', NULL, '2023-11-06 02:50:59'),
(2, 'logo', 'uploads/website-images/avatar-2023-11-06-05-56-36-9968.png', NULL, '2023-11-05 23:56:36'),
(5, 'timezone', 'Asia/Dhaka', NULL, '2023-11-06 02:50:59'),
(6, 'favicon', 'uploads/website-images/avatar-2023-11-06-05-57-37-1791.png', NULL, '2023-11-05 23:57:37'),
(7, 'cookie_status', 'active', NULL, '2023-11-06 02:53:02'),
(8, 'border', 'normal', NULL, '2023-11-06 02:53:02'),
(9, 'corners', 'large', NULL, '2023-11-06 02:53:02'),
(10, 'background_color', '#dbca0a', NULL, '2023-11-06 02:53:03'),
(11, 'text_color', '#3bc814', NULL, '2023-11-06 02:53:03'),
(12, 'border_color', '#f1eeee', NULL, '2023-11-06 02:53:03'),
(13, 'btn_bg_color', '#7003c9', NULL, '2023-11-06 02:53:03'),
(14, 'btn_text_color', '#e08e00', NULL, '2023-11-06 02:53:03'),
(15, 'link_text', 'Link Text', NULL, '2023-11-06 02:53:03'),
(16, 'btn_text', 'Button Text', NULL, '2023-11-06 02:53:03'),
(17, 'message', 'this is message', NULL, '2023-11-06 02:53:03'),
(18, 'recaptcha_site_key', 'Captcha Site Key', NULL, '2023-11-06 02:54:12'),
(19, 'recaptcha_secret_key', 'Captcha Secret Key', NULL, '2023-11-06 02:54:12'),
(20, 'recaptcha_status', 'inactive', NULL, '2023-11-06 02:54:12'),
(21, 'tawk_chat_link', 'Tawk Chat Link', NULL, '2023-11-06 02:55:05'),
(22, 'tawk_status', 'active', NULL, '2023-11-06 02:55:05'),
(23, 'google_analytic_status', 'active', NULL, '2023-11-06 02:56:10'),
(24, 'google_analytic_id', 'google_analytic_id', NULL, '2023-11-06 02:56:10'),
(25, 'pixel_status', 'inactive', NULL, '2023-11-06 03:16:15'),
(26, 'pixel_app_id', 'Facebook App Id', NULL, '2023-11-06 03:16:15'),
(27, 'facebook_login_status', 'active', NULL, '2023-11-06 03:35:19'),
(28, 'facebook_app_id', 'Facebook App Id', NULL, '2023-11-06 03:35:19'),
(29, 'facebook_app_secret', 'Facebook App Secret', NULL, '2023-11-06 03:35:19'),
(30, 'facebook_redirect_url', 'Facebook Redirect Url', NULL, '2023-11-06 03:35:19'),
(31, 'google_login_status', 'inactive', NULL, '2023-11-06 03:35:19'),
(32, 'gmail_client_id', 'Gmail Client Id', NULL, '2023-11-06 03:35:19'),
(33, 'gmail_secret_id', 'Gmail Secret Id', NULL, '2023-11-06 03:35:19'),
(34, 'gmail_redirect_url', 'Gmail Redirect Url', NULL, '2023-11-06 03:35:19'),
(35, 'default_avatar', 'uploads/website-images/file-2023-11-06-10-01-31-3666.jpg', NULL, '2023-11-06 04:01:31'),
(36, 'breadcrumb_image', 'uploads/website-images/file-2023-11-06-10-13-24-3934.png', NULL, '2023-11-06 04:13:24'),
(37, 'mail_host', 'localhost', NULL, '2023-11-06 05:25:34'),
(38, 'mail_sender_email', 'sender@gmail.com', NULL, '2023-11-06 05:25:34'),
(39, 'mail_username', 'sender@gmail.com', NULL, '2023-11-06 05:25:34'),
(40, 'mail_password', 'mail password', NULL, '2023-11-06 05:25:34'),
(41, 'mail_port', '587', NULL, '2023-11-06 05:25:34'),
(42, 'mail_encryption', 'ssl', NULL, '2023-11-06 05:25:34'),
(43, 'mail_sender_name', 'WebSolutionUs', NULL, '2023-11-06 05:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `basic_payments`
--
ALTER TABLE `basic_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_paginations`
--
ALTER TABLE `custom_paginations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `multi_currencies`
--
ALTER TABLE `multi_currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `seo_settings`
--
ALTER TABLE `seo_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `basic_payments`
--
ALTER TABLE `basic_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `custom_paginations`
--
ALTER TABLE `custom_paginations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `multi_currencies`
--
ALTER TABLE `multi_currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seo_settings`
--
ALTER TABLE `seo_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
