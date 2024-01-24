-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2023 at 11:40 AM
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
-- Table structure for table `banned_histories`
--

CREATE TABLE `banned_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `reasone` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banned_histories`
--

INSERT INTO `banned_histories` (`id`, `user_id`, `subject`, `reasone`, `description`, `created_at`, `updated_at`) VALUES
(1, 9, 'Lawyer Login Information', 'for_banned', 'test descr', '2023-11-19 00:55:52', '2023-11-19 00:55:52'),
(2, 9, 'Subscribe Verification', 'for_banned', 'Banned request confirmation\r\nit will be last chance', '2023-11-19 01:00:36', '2023-11-19 01:00:36'),
(3, 9, 'Remove to banned from websolutionus', 'for_unbanned', 'Hello Technology\r\n\r\nWe are happy to announce that you are enable to access our site from today. thank for valuable time\r\n\r\nThanks', '2023-11-19 01:06:02', '2023-11-19 01:06:02'),
(4, 9, 'Subscribe Verification', 'for_unbanned', 'Banned request confirmation', '2023-11-19 01:16:58', '2023-11-19 01:16:58'),
(5, 9, 'Subscribe Verification', 'for_unbanned', 'Banned request confirmation', '2023-11-19 01:17:26', '2023-11-19 01:17:26'),
(6, 9, 'Won\'t be able to access websolutionus', 'for_unbanned', 'Hello Technology\r\n\r\nWe are happy to announce that you are enable to access our site from today. thank for valuable time\r\n\r\nThanks', '2023-11-19 01:18:17', '2023-11-19 01:18:17'),
(7, 9, 'Lawyer Login Information', 'for_unbanned', 'test', '2023-11-19 01:20:01', '2023-11-19 01:20:01'),
(8, 9, 'Subscribe Verification', 'for_banned', 'test', '2023-11-19 01:20:35', '2023-11-19 01:20:35'),
(9, 10, 'Lawyer Login Information', 'for_unbanned', 'anned request confirmation', '2023-11-20 01:27:36', '2023-11-20 01:27:36'),
(10, 10, 'can\'t able to login', 'for_banned', 'ned request confirm', '2023-11-20 01:28:31', '2023-11-20 01:28:31'),
(11, 10, 'Can\'t able to make booking', 'for_unbanned', 'can not able to login again', '2023-11-20 01:35:13', '2023-11-20 01:35:13'),
(12, 10, 'Subscribe Verification', 'for_banned', 'Descriptio', '2023-11-20 01:36:44', '2023-11-20 01:36:44'),
(13, 10, 'Ibrahim Khalil', 'for_unbanned', 'From Khalil', '2023-11-20 01:42:19', '2023-11-20 01:42:19'),
(14, 10, 'Banned By Ibrahim Khalil', 'for_banned', 'Message by Ibrahim Khalil', '2023-11-20 01:43:57', '2023-11-20 01:43:57'),
(15, 10, 'Banned By Ibrahim Khalil', 'for_unbanned', 'Message by Ibrahim Khalil', '2023-11-20 01:45:04', '2023-11-20 01:45:04');

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
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `blog_category_id` bigint(20) UNSIGNED NOT NULL,
  `slug` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `views` bigint(20) NOT NULL DEFAULT 0,
  `show_homepage` tinyint(1) NOT NULL DEFAULT 0,
  `is_popular` tinyint(1) NOT NULL DEFAULT 0,
  `tags` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `parent_id` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blog_category_translations`
--

CREATE TABLE `blog_category_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_category_id` bigint(20) UNSIGNED NOT NULL,
  `lang_code` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `comment` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blog_translations`
--

CREATE TABLE `blog_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `lang_code` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `seo_title` text NOT NULL,
  `seo_description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Dumping data for table `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(9, '1b2da56d-c02f-4e53-b883-11e15cc83145', 'database', 'default', '{\"uuid\":\"1b2da56d-c02f-4e53-b883-11e15cc83145\",\"displayName\":\"Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\",\"command\":\"O:45:\\\"Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\\\":4:{s:59:\\\"\\u0000Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\\u0000mail_subject\\\";s:24:\\\"Lawyer Login Information\\\";s:59:\\\"\\u0000Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\\u0000mail_message\\\";s:11:\\\"Description\\\";s:56:\\\"\\u0000Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\\u0000user_type\\\";s:11:\\\"single_user\\\";s:56:\\\"\\u0000Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\\u0000user_info\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 'ErrorException: Undefined variable $request in C:\\laragon\\www\\base_project\\Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser.php:55\nStack trace:\n#0 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\HandleExceptions.php(254): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined varia...\', \'C:\\\\laragon\\\\www\\\\...\', 55)\n#1 C:\\laragon\\www\\base_project\\Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser.php(55): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}(2, \'Undefined varia...\', \'C:\\\\laragon\\\\www\\\\...\', 55)\n#2 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser->handle()\n#3 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#8 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser))\n#9 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser))\n#10 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser), false)\n#12 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser))\n#13 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser))\n#14 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser))\n#16 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#28 C:\\laragon\\www\\base_project\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\laragon\\www\\base_project\\vendor\\symfony\\console\\Application.php(1081): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\laragon\\www\\base_project\\vendor\\symfony\\console\\Application.php(320): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\laragon\\www\\base_project\\vendor\\symfony\\console\\Application.php(174): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\laragon\\www\\base_project\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}', '2023-11-20 00:58:53'),
(10, 'fb28b8f1-c4f3-4f01-8413-78f1e915da2e', 'database', 'default', '{\"uuid\":\"fb28b8f1-c4f3-4f01-8413-78f1e915da2e\",\"displayName\":\"Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\",\"command\":\"O:45:\\\"Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\\\":4:{s:59:\\\"\\u0000Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\\u0000mail_subject\\\";s:24:\\\"Lawyer Login Information\\\";s:59:\\\"\\u0000Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\\u0000mail_message\\\";s:10:\\\"escription\\\";s:56:\\\"\\u0000Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\\u0000user_type\\\";s:11:\\\"single_user\\\";s:56:\\\"\\u0000Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\\u0000user_info\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 'ErrorException: Undefined variable $request in C:\\laragon\\www\\base_project\\Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser.php:55\nStack trace:\n#0 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\HandleExceptions.php(254): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined varia...\', \'C:\\\\laragon\\\\www\\\\...\', 55)\n#1 C:\\laragon\\www\\base_project\\Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser.php(55): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}(2, \'Undefined varia...\', \'C:\\\\laragon\\\\www\\\\...\', 55)\n#2 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser->handle()\n#3 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#8 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser))\n#9 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser))\n#10 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser), false)\n#12 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser))\n#13 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser))\n#14 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser))\n#16 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#28 C:\\laragon\\www\\base_project\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\laragon\\www\\base_project\\vendor\\symfony\\console\\Application.php(1081): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\laragon\\www\\base_project\\vendor\\symfony\\console\\Application.php(320): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\laragon\\www\\base_project\\vendor\\symfony\\console\\Application.php(174): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\laragon\\www\\base_project\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}', '2023-11-20 01:00:39'),
(11, '5a55a20d-155a-4488-9684-a77a9792b91c', 'database', 'default', '{\"uuid\":\"5a55a20d-155a-4488-9684-a77a9792b91c\",\"displayName\":\"Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\",\"command\":\"O:45:\\\"Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\\\":4:{s:59:\\\"\\u0000Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\\u0000mail_subject\\\";s:24:\\\"Lawyer Login Information\\\";s:59:\\\"\\u0000Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\\u0000mail_message\\\";s:21:\\\"Send mail to customer\\\";s:56:\\\"\\u0000Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\\u0000user_type\\\";s:11:\\\"single_user\\\";s:56:\\\"\\u0000Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\\u0000user_info\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 'ErrorException: Undefined variable $request in C:\\laragon\\www\\base_project\\Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser.php:55\nStack trace:\n#0 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\HandleExceptions.php(254): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined varia...\', \'C:\\\\laragon\\\\www\\\\...\', 55)\n#1 C:\\laragon\\www\\base_project\\Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser.php(55): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}(2, \'Undefined varia...\', \'C:\\\\laragon\\\\www\\\\...\', 55)\n#2 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser->handle()\n#3 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#8 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser))\n#9 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser))\n#10 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser), false)\n#12 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser))\n#13 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser))\n#14 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser))\n#16 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#28 C:\\laragon\\www\\base_project\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\laragon\\www\\base_project\\vendor\\symfony\\console\\Application.php(1081): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\laragon\\www\\base_project\\vendor\\symfony\\console\\Application.php(320): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\laragon\\www\\base_project\\vendor\\symfony\\console\\Application.php(174): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\laragon\\www\\base_project\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}', '2023-11-20 01:03:58'),
(12, '2ec0b50b-9fdd-4a58-ae37-274c6a51a783', 'database', 'default', '{\"uuid\":\"2ec0b50b-9fdd-4a58-ae37-274c6a51a783\",\"displayName\":\"Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\",\"command\":\"O:45:\\\"Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\\\":4:{s:59:\\\"\\u0000Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\\u0000mail_subject\\\";s:24:\\\"Lawyer Login Information\\\";s:59:\\\"\\u0000Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\\u0000mail_message\\\";s:21:\\\"Send mail to customer\\\";s:56:\\\"\\u0000Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\\u0000user_type\\\";s:11:\\\"single_user\\\";s:56:\\\"\\u0000Modules\\\\Customer\\\\app\\\\Jobs\\\\SendBulkEmailToUser\\u0000user_info\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:10;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 'ErrorException: Undefined variable $request in C:\\laragon\\www\\base_project\\Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser.php:55\nStack trace:\n#0 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\HandleExceptions.php(254): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'Undefined varia...\', \'C:\\\\laragon\\\\www\\\\...\', 55)\n#1 C:\\laragon\\www\\base_project\\Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser.php(55): Illuminate\\Foundation\\Bootstrap\\HandleExceptions->Illuminate\\Foundation\\Bootstrap\\{closure}(2, \'Undefined varia...\', \'C:\\\\laragon\\\\www\\\\...\', 55)\n#2 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser->handle()\n#3 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#8 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser))\n#9 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser))\n#10 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#11 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser), false)\n#12 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser))\n#13 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser))\n#14 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#15 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Modules\\Customer\\app\\Jobs\\SendBulkEmailToUser))\n#16 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#17 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#18 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#20 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#21 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#22 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#23 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#28 C:\\laragon\\www\\base_project\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#29 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#30 C:\\laragon\\www\\base_project\\vendor\\symfony\\console\\Application.php(1081): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\laragon\\www\\base_project\\vendor\\symfony\\console\\Application.php(320): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\laragon\\www\\base_project\\vendor\\symfony\\console\\Application.php(174): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#34 C:\\laragon\\www\\base_project\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#35 {main}', '2023-11-20 01:06:04'),
(13, 'f732679e-2181-4a78-9de4-1905068efe50', 'database', 'default', '{\"uuid\":\"f732679e-2181-4a78-9de4-1905068efe50\",\"displayName\":\"App\\\\Jobs\\\\UserForgetPasswordJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\UserForgetPasswordJob\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\UserForgetPasswordJob\\\":1:{s:9:\\\"from_user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:8;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 'Error: Class \"App\\Jobs\\UserForgetPassword\" not found in C:\\laragon\\www\\base_project\\app\\Jobs\\UserForgetPasswordJob.php:35\nStack trace:\n#0 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\UserForgetPasswordJob->handle()\n#1 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#2 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#3 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#4 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#5 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#6 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\UserForgetPasswordJob))\n#7 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\UserForgetPasswordJob))\n#8 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#9 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\UserForgetPasswordJob), false)\n#10 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\UserForgetPasswordJob))\n#11 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\UserForgetPasswordJob))\n#12 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#13 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\UserForgetPasswordJob))\n#14 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#15 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#16 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#17 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#20 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#21 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#22 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#23 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#24 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#25 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#26 C:\\laragon\\www\\base_project\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#27 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\laragon\\www\\base_project\\vendor\\symfony\\console\\Application.php(1081): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#29 C:\\laragon\\www\\base_project\\vendor\\symfony\\console\\Application.php(320): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\laragon\\www\\base_project\\vendor\\symfony\\console\\Application.php(174): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\laragon\\www\\base_project\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 {main}', '2023-11-20 04:15:21');
INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(14, 'a9b9e1f9-3732-4208-a3e3-a645be864b28', 'database', 'default', '{\"uuid\":\"a9b9e1f9-3732-4208-a3e3-a645be864b28\",\"displayName\":\"App\\\\Jobs\\\\UserForgetPasswordJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\UserForgetPasswordJob\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\UserForgetPasswordJob\\\":1:{s:9:\\\"from_user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:8;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 'Error: Class \"App\\Jobs\\UserForgetPassword\" not found in C:\\laragon\\www\\base_project\\app\\Jobs\\UserForgetPasswordJob.php:35\nStack trace:\n#0 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\UserForgetPasswordJob->handle()\n#1 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#2 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#3 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#4 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#5 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#6 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\UserForgetPasswordJob))\n#7 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\UserForgetPasswordJob))\n#8 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#9 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\UserForgetPasswordJob), false)\n#10 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\UserForgetPasswordJob))\n#11 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\UserForgetPasswordJob))\n#12 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#13 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\UserForgetPasswordJob))\n#14 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#15 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#16 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#17 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#18 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#20 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#21 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#22 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#23 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#24 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#25 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#26 C:\\laragon\\www\\base_project\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#27 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 C:\\laragon\\www\\base_project\\vendor\\symfony\\console\\Application.php(1081): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#29 C:\\laragon\\www\\base_project\\vendor\\symfony\\console\\Application.php(320): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 C:\\laragon\\www\\base_project\\vendor\\symfony\\console\\Application.php(174): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 C:\\laragon\\www\\base_project\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 C:\\laragon\\www\\base_project\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 {main}', '2023-11-20 04:16:03');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `direction` varchar(255) NOT NULL DEFAULT 'ltr',
  `status` varchar(255) NOT NULL DEFAULT '1',
  `is_default` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `icon`, `direction`, `status`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', NULL, 'ltr', '1', '1', '2023-11-13 04:45:15', '2023-11-13 22:19:27'),
(3, 'Bangla', 'bn', 'uploads/website-images/wsus-img-2023-11-14-04-21-20-8065.png', 'ltr', '1', '0', '2023-11-13 22:21:20', '2023-11-13 22:21:20');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `link`, `route`, `status`, `order`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, '/', NULL, 1, 1, NULL, '2023-11-16 03:56:48', '2023-11-16 03:56:48'),
(2, '/about-us', NULL, 1, 0, NULL, '2023-11-16 03:57:55', '2023-11-16 03:58:49'),
(3, '/why-choose-us', NULL, 1, 1, 2, '2023-11-16 04:07:39', '2023-11-16 04:07:39'),
(4, '/hire-us', NULL, 1, 2, 2, '2023-11-16 04:08:09', '2023-11-16 04:08:09'),
(5, '/home-one', NULL, 1, 1, 1, '2023-11-16 04:08:24', '2023-11-16 04:08:24'),
(6, NULL, 'homepage', 1, 3, NULL, '2023-11-20 04:37:17', '2023-11-20 04:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `menu_translations`
--

CREATE TABLE `menu_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `lang_code` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_translations`
--

INSERT INTO `menu_translations` (`id`, `menu_id`, `lang_code`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Home', '2023-11-16 03:56:48', '2023-11-16 03:56:48'),
(2, 1, 'bn', 'বাড়ি', '2023-11-16 03:56:50', '2023-11-16 03:56:50'),
(3, 2, 'en', 'About Us', '2023-11-16 03:57:55', '2023-11-16 03:57:55'),
(4, 2, 'bn', 'আমাদের সম্পর্কে', '2023-11-16 03:57:56', '2023-11-16 03:57:56'),
(5, 3, 'en', 'Why Choose Us', '2023-11-16 04:07:39', '2023-11-16 04:07:39'),
(6, 3, 'bn', 'কেন আমাদের নির্বাচন করেছে', '2023-11-16 04:07:40', '2023-11-16 04:07:40'),
(7, 4, 'en', 'Hire Us', '2023-11-16 04:08:09', '2023-11-16 04:08:09'),
(8, 4, 'bn', 'আমাদের ভাড়া করুন', '2023-11-16 04:08:09', '2023-11-16 04:08:09'),
(9, 5, 'en', 'Home one', '2023-11-16 04:08:24', '2023-11-16 04:08:24'),
(10, 5, 'bn', 'বাড়ি এক', '2023-11-16 04:08:25', '2023-11-16 04:08:25'),
(11, 6, 'en', 'Home', '2023-11-20 04:37:18', '2023-11-20 04:37:18'),
(12, 6, 'bn', 'বাড়ি', '2023-11-20 04:37:19', '2023-11-20 04:37:19');

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
(14, '2023_11_09_035236_create_payment_gateways_table', 9),
(16, '2023_11_12_052417_create_subscription_plans_table', 10),
(17, '2023_11_12_064847_create_subscription_histories_table', 11),
(18, '2023_11_05_114814_create_languages_table', 12),
(19, '2023_11_07_104315_create_blog_categories_table', 12),
(20, '2023_11_07_104328_create_blog_category_translations_table', 12),
(21, '2023_11_07_104336_create_blogs_table', 12),
(22, '2023_11_07_104343_create_blog_translations_table', 12),
(23, '2023_11_07_104546_create_blog_comments_table', 12),
(24, '2023_11_09_100621_create_jobs_table', 12),
(26, '2023_11_16_035458_add_user_info_to_users', 13),
(27, '2023_11_16_061508_add_forget_info_to_users', 14),
(28, '2023_11_16_063639_add_phone_to_users', 15),
(29, '2023_11_14_041525_create_menus_table', 16),
(30, '2023_11_15_064403_create_menu_translations_table', 16),
(31, '2023_11_19_055229_add_image_to_users', 17),
(33, '2023_11_19_064341_create_banned_histories_table', 18);

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
(28, 'instamojo_account_mode', 'Sandbox', NULL, '2023-11-14 21:28:10'),
(29, 'instamojo_api_key', 'test_5f4a2c9a58ef216f8a1a688910f', NULL, '2023-11-14 21:28:10'),
(30, 'instamojo_auth_token', 'test_994252ada69ce7b3d282b9941c2', NULL, '2023-11-14 21:28:10'),
(31, 'instamojo_charge', '5.00', NULL, '2023-11-14 21:28:10'),
(32, 'instamojo_image', 'uploads/website-images/file-2023-11-09-05-54-19-7525.jpg', NULL, '2023-11-08 23:54:19'),
(33, 'instamojo_currency_id', '1', NULL, '2023-11-14 21:28:10'),
(34, 'instamojo_status', 'active', NULL, '2023-11-14 21:28:10');

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
(18, 'recaptcha_site_key', '6LeQCfwjAAAAANUUOIvnNwy0BVqyHHPFrmoKX9eg', NULL, '2023-11-15 22:33:52'),
(19, 'recaptcha_secret_key', '6LeQCfwjAAAAALitNVo5qEfGKMZp3FEgZNzUsMsR', NULL, '2023-11-15 22:33:52'),
(20, 'recaptcha_status', 'active', NULL, '2023-11-15 22:33:52'),
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
(37, 'mail_host', 'smtp.mailtrap.io', NULL, '2023-11-15 22:52:10'),
(38, 'mail_sender_email', 'khalil.cmt.bpi@gmail.com', NULL, '2023-11-15 22:52:10'),
(39, 'mail_username', 'dbb7105dacce6b', NULL, '2023-11-15 22:52:10'),
(40, 'mail_password', '5830ed09a2aa28', NULL, '2023-11-15 22:52:10'),
(41, 'mail_port', '587', NULL, '2023-11-15 22:52:10'),
(42, 'mail_encryption', 'ssl', NULL, '2023-11-15 22:52:10'),
(43, 'mail_sender_name', 'WebSolutionUs', NULL, '2023-11-15 22:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_histories`
--

CREATE TABLE `subscription_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `subscription_plan_id` int(11) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `plan_price` decimal(8,2) NOT NULL,
  `expiration_date` varchar(255) NOT NULL,
  `expiration` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'inactive',
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'inactive',
  `transaction` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription_histories`
--

INSERT INTO `subscription_histories` (`id`, `user_id`, `subscription_plan_id`, `plan_name`, `plan_price`, `expiration_date`, `expiration`, `status`, `payment_method`, `payment_status`, `transaction`, `created_at`, `updated_at`) VALUES
(9, 1, 4, 'Gold', '199.99', 'lifetime', 'lifetime', 'expired', 'handcash', 'success', 'hand_cash', '2023-11-12 04:23:05', '2023-11-12 05:40:55'),
(10, 1, 4, 'Gold', '199.99', 'lifetime', 'lifetime', 'expired', 'handcash', 'success', 'hand_cash', '2023-11-12 04:23:10', '2023-11-12 05:40:55'),
(12, 2, 2, 'Premium', '99.99', '2024-11-11', 'yearly', 'expired', 'handcash', 'success', 'hand_cash', '2023-11-12 04:30:35', '2023-11-12 21:47:05'),
(13, 2, 2, 'Premium', '99.99', '2024-11-11', 'yearly', 'expired', 'handcash', 'success', 'hand_cash', '2023-11-12 04:30:41', '2023-11-12 21:47:05'),
(14, 2, 3, 'Free', '0.00', '2023-12-12', 'monthly', 'expired', 'handcash', 'success', 'hand_cash', '2023-11-12 04:30:46', '2023-11-12 21:47:05'),
(15, 2, 4, 'Gold', '199.99', 'lifetime', 'lifetime', 'expired', 'handcash', 'success', 'hand_cash', '2023-11-12 04:30:52', '2023-11-12 21:47:05'),
(16, 1, 2, 'Premium', '99.99', '2024-11-11', 'yearly', 'expired', 'handcash', 'success', 'hand_cash', '2023-11-12 05:12:38', '2023-11-12 05:40:55'),
(17, 1, 2, 'Premium', '99.99', '2025-11-11', 'yearly', 'expired', 'handcash', 'success', 'hand_cash', '2023-11-12 05:30:31', '2023-11-12 05:40:55'),
(18, 1, 2, 'Premium', '99.99', '2024-11-11', 'yearly', 'expired', 'handcash', 'success', 'hand_cash', '2023-11-12 05:39:38', '2023-11-12 05:40:55'),
(19, 1, 2, 'Premium', '99.99', '2025-11-11', 'yearly', 'active', 'handcash', 'success', 'hand_cash', '2023-11-12 05:40:55', '2023-11-12 05:40:55'),
(20, 2, 2, 'Premium', '99.99', '2024-11-11', 'yearly', 'expired', 'handcash', 'success', 'hand_cash', '2023-11-12 05:41:32', '2023-11-12 21:47:05'),
(21, 2, 2, 'Premium', '99.99', '2025-11-11', 'yearly', 'expired', 'handcash', 'success', 'hand_cash', '2023-11-12 05:41:43', '2023-11-12 21:47:05'),
(22, 2, 2, 'Premium', '99.99', '2022-11-11', 'yearly', 'expired', 'handcash', 'success', 'hand_cash', '2023-11-12 05:42:20', '2023-11-12 21:47:05'),
(23, 2, 2, 'Premium', '99.99', '2021-11-11', 'yearly', 'expired', 'handcash', 'success', 'hand_cash', '2023-11-12 05:42:50', '2023-11-12 21:47:05'),
(24, 2, 2, 'Premium', '99.99', '2022-11-11', 'yearly', 'expired', 'handcash', 'success', 'hand_cash', '2023-11-12 05:44:13', '2023-11-12 21:47:05'),
(25, 2, 2, 'Premium', '99.99', '2023-11-13', 'yearly', 'expired', 'handcash', 'success', 'hand_cash', '2023-11-12 05:45:46', '2023-11-12 21:47:05'),
(26, 2, 3, 'Free', '0.00', '2023-12-13', 'monthly', 'active', 'handcash', 'success', 'hand_cash', '2023-11-12 21:46:26', '2023-11-13 23:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plans`
--

CREATE TABLE `subscription_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `plan_price` decimal(8,2) NOT NULL,
  `expiration_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `serial` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription_plans`
--

INSERT INTO `subscription_plans` (`id`, `plan_name`, `plan_price`, `expiration_date`, `status`, `serial`, `created_at`, `updated_at`) VALUES
(2, 'Premium', '99.99', 'yearly', 'active', '2', '2023-11-12 00:20:50', '2023-11-12 00:53:52'),
(3, 'Free', '0.00', 'monthly', 'active', '1', '2023-11-12 00:21:01', '2023-11-12 00:53:41'),
(4, 'Gold', '199.99', 'lifetime', 'active', '3', '2023-11-12 00:37:03', '2023-11-12 00:53:58');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `is_banned` varchar(255) NOT NULL DEFAULT 'no',
  `verification_token` varchar(255) DEFAULT NULL,
  `forget_password_token` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status`, `is_banned`, `verification_token`, `forget_password_token`, `phone`, `address`, `image`) VALUES
(1, 'Ibrahim Khalil', 'user@gmail.com', '2023-11-16 04:00:47', '$2y$12$EE1xHbY5qy6VzNI02Ml8HudVaMHjYYC6.tRbc27yXKGhAjk/4yY2G', NULL, '2023-11-12 00:43:03', '2023-11-16 00:42:04', 'active', 'no', NULL, NULL, '123-343-4444', 'Los Angeles, CA, USA', NULL),
(8, 'David Richard', 'aboutkhalil.83@gmail.com', '2023-11-15 23:49:56', '$2y$12$28FRGF5BqbVy8eNy4cgTP.e0WYQbQjZIlmjxAGc8ocO6lQ75Pa7A.', NULL, '2023-11-15 23:44:53', '2023-11-20 04:19:19', 'active', 'no', NULL, NULL, NULL, NULL, NULL),
(10, 'banned user', 'bakalagoin93@gmail.com', NULL, '$2y$12$Unw5MbLP9jd2d.cZlRIOYOogVmEx7DNkbFfXjwIMJHtOWdc9cMRTW', NULL, '2023-11-18 23:31:28', '2023-11-20 04:26:03', 'active', 'no', 'vSdoI14bZi5W1PLTjVkBicRUsMjVS6j1UKI8aSKYYF5iYoLr7W5nRtbiEB1KNi4JhWkYCNBdDkhy8lsm2pWYxT1DwtE31WdLU7oB', NULL, NULL, NULL, NULL),
(11, 'Ibrahim Khalil', 'client@gmail.com', NULL, '$2y$12$glJr5Kaq2DgMn6Teb4az8.Fid6ej6zpr99b.PznBekWUvlyPdWFvm', NULL, '2023-11-20 03:23:25', '2023-11-20 04:26:01', 'active', 'no', 'nR5nXhim07mySm1ciYo4CrvXgsXanSCbKXch5gD6MRN3Rcd8OQf3fwpb9v8CqUuLoEARNFGHG92YxkkB91FF89CUNQwLDRCiBpZp', NULL, NULL, NULL, NULL),
(12, 'Ibrahim Khalil', 'agent5000@gmail.com', NULL, '$2y$12$6FzgpMISf2fBY7MKZP0Gl.uJm.3ieNbLDwZrqlbhiJC8HLehVNlCu', NULL, '2023-11-20 04:24:11', '2023-11-20 04:25:59', 'active', 'no', 'UIiqrofq1NBIJa2MXNl5i3H3k8MfRy6BXjp7UXkqVXj3LGrRIpQrVYKMQhon8ZRQ4EHoiTU9iTOUf9N2w9doebsHtkMrSm1c93BP', NULL, NULL, NULL, NULL);

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
-- Indexes for table `banned_histories`
--
ALTER TABLE `banned_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basic_payments`
--
ALTER TABLE `basic_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category_translations`
--
ALTER TABLE `blog_category_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_category_translations_blog_category_id_foreign` (`blog_category_id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_translations`
--
ALTER TABLE `blog_translations`
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
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_name_unique` (`name`),
  ADD UNIQUE KEY `languages_code_unique` (`code`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_translations`
--
ALTER TABLE `menu_translations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `subscription_histories`
--
ALTER TABLE `subscription_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
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
-- AUTO_INCREMENT for table `banned_histories`
--
ALTER TABLE `banned_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `basic_payments`
--
ALTER TABLE `basic_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_category_translations`
--
ALTER TABLE `blog_category_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_translations`
--
ALTER TABLE `blog_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu_translations`
--
ALTER TABLE `menu_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
-- AUTO_INCREMENT for table `subscription_histories`
--
ALTER TABLE `subscription_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_category_translations`
--
ALTER TABLE `blog_category_translations`
  ADD CONSTRAINT `blog_category_translations_blog_category_id_foreign` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
