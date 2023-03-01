-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 02:09 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maxy_laravel`
--

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
(1, '2017_04_10_000000_create_users_table', 1),
(2, '2017_04_10_000001_create_password_resets_table', 1),
(3, '2017_04_10_000002_create_social_accounts_table', 1),
(4, '2017_04_10_000003_create_roles_table', 1),
(5, '2017_04_10_000004_create_users_roles_table', 1),
(6, '2017_06_16_000005_create_protection_validations_table', 1),
(7, '2017_06_16_000006_create_protection_shop_tokens_table', 1),
(8, '2019_10_31_152451_add_last_login_to_users', 1),
(9, '2023_02_21_080310_create_products_table', 1),
(10, '2023_02_21_121322_create_purchase_order_lines_table', 1),
(11, '2023_02_22_085822_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `no_faktur` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_m_vendor` bigint(20) NOT NULL,
  `id_user_verifikasi` bigint(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ppn_percent` float NOT NULL,
  `pp_nominal` float NOT NULL,
  `total` float NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_dibutuhkan` date NOT NULL,
  `created_id` bigint(20) NOT NULL,
  `updated_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`no_faktur`, `id_m_vendor`, `id_user_verifikasi`, `jumlah`, `ppn_percent`, `pp_nominal`, `total`, `status`, `tanggal`, `tanggal_dibutuhkan`, `created_id`, `updated_id`, `created_at`, `updated_at`) VALUES
('Qwerty123', 1, 1, 20, 11, 12000, 200000, 'Lunas', '2023-02-22', '2023-02-25', 3, 3, '2023-02-22 03:44:48', '2023-02-22 03:44:59');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_code`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Architecto alias eveniet rem officia.', 'cupiditate', 100000, '1996-03-11 06:40:55', '1981-08-21 02:16:57'),
(2, 'Ipsum explicabo qui eveniet similique beatae quos.', 'praesentium', 100000, '1994-08-09 04:56:07', '1984-08-19 02:24:47'),
(3, 'Quas voluptas tenetur sapiente tenetur et et id nesciunt.', 'nisi', 2408820, '2018-08-05 22:06:35', '1996-04-04 16:28:43'),
(4, 'Iure ea voluptatem qui accusantium aut in consectetur.', 'dolores', 100000, '2003-12-10 08:08:06', '1981-02-25 09:25:47'),
(5, 'Facilis blanditiis et sapiente ut voluptas expedita qui.', 'pariatur', 249252000, '2018-07-23 03:33:11', '2000-05-31 12:04:16'),
(6, 'Omnis ut odio fugiat natus.', 'consequatur', 1113030, '2003-12-10 03:22:05', '1986-05-03 10:30:29'),
(7, 'Sed vel et eaque dolorem dolores.', 'voluptatum', 928306, '2021-07-05 11:03:49', '2016-06-21 23:47:30'),
(8, 'Et sint provident dolores sed magnam sapiente.', 'temporibus', 100000, '2018-03-05 06:16:03', '2001-10-08 02:54:12'),
(9, 'Culpa amet nulla eos eum voluptas.', 'veritatis', 100000, '1994-04-22 06:29:31', '2018-03-08 05:45:17'),
(10, 'Vel ipsum veritatis recusandae.', 'ad', 277159, '1987-09-07 12:37:18', '2007-12-02 14:31:59'),
(11, 'Aspernatur unde est minus ipsa.', 'fuga', 22581000, '1994-05-02 23:29:33', '1980-02-25 01:36:15'),
(12, 'Dolore cupiditate ab provident quaerat quis ducimus.', 'non', 100000, '2004-11-12 19:12:15', '1990-09-23 15:39:04'),
(13, 'Eveniet accusamus deleniti et voluptatem laudantium rerum.', 'quasi', 100000, '2017-11-24 08:44:36', '2007-05-23 16:21:26'),
(14, 'Nobis sint incidunt voluptas illum qui non.', 'nostrum', 7063630, '2003-04-14 18:42:13', '2000-08-14 07:16:11'),
(15, 'Id magni nobis porro quo quia quas eos quasi.', 'quia', 100000, '1981-09-02 11:48:56', '2011-12-30 01:07:56'),
(16, 'Odio totam fuga non error ab.', 'consequatur', 13038200, '1980-04-07 12:57:20', '2016-04-29 00:59:07'),
(17, 'Aut vel tempora et est consequuntur ad officia.', 'at', 100000, '2020-08-28 13:27:53', '2001-08-14 20:04:22'),
(18, 'Eveniet pariatur soluta explicabo.', 'temporibus', 271033, '1976-05-25 21:30:42', '2020-06-09 02:39:16'),
(19, 'Et doloribus iusto molestiae ducimus quia totam consequatur.', 'est', 100000, '1986-03-11 00:28:10', '1997-07-31 01:53:32'),
(20, 'Laudantium pariatur dolorem aut est tempora.', 'vel', 100000, '2020-07-26 05:24:24', '1991-09-15 21:53:51'),
(21, 'Dolorum omnis sint aut eos tempore.', 'soluta', 114382, '2014-08-24 17:44:32', '1971-10-23 21:44:02'),
(22, 'Dicta dolorem porro repellat provident quos ipsa aliquid.', 'optio', 100000, '1983-06-17 03:19:47', '2014-10-02 10:56:35'),
(23, 'Quidem molestiae sit voluptatem.', 'amet', 125743, '1987-03-30 10:56:37', '2006-02-14 23:09:41'),
(24, 'Veniam molestias similique nisi quasi sunt deleniti officiis.', 'reiciendis', 100000, '1985-11-19 00:02:17', '2004-03-02 09:02:12'),
(25, 'Sed enim et enim nemo fuga nostrum.', 'similique', 100000, '2021-09-27 22:43:03', '1974-01-27 09:18:48'),
(26, 'Itaque repellendus cupiditate eveniet.', 'nulla', 100000, '1997-01-10 05:43:37', '2001-09-14 09:59:03'),
(27, 'Quia atque possimus veniam iusto.', 'occaecati', 100000, '1990-04-21 13:10:18', '1973-02-20 10:43:07'),
(28, 'Aut voluptatem qui aspernatur et sunt enim.', 'excepturi', 4428500, '1981-11-17 01:08:16', '1993-03-24 03:50:19'),
(29, 'Quisquam sint impedit cumque.', 'dolorum', 521313, '2008-08-19 19:10:26', '1973-10-25 08:35:06'),
(30, 'Excepturi aut qui dolorum est numquam aliquid omnis.', 'ad', 255079, '1994-11-05 19:36:09', '1992-09-11 12:05:16'),
(31, 'Ipsum magnam ex vitae ullam odio quidem quibusdam.', 'quam', 100000, '1999-02-15 09:25:56', '2002-05-28 14:57:08'),
(32, 'Asperiores neque aut eum est.', 'eius', 143126000, '2012-09-17 21:27:12', '2005-04-09 21:39:09'),
(33, 'Quia iste eius aut beatae voluptas dolore ipsam.', 'aut', 100000, '1997-03-29 20:44:56', '2005-09-25 22:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `protection_shop_tokens`
--

CREATE TABLE `protection_shop_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `success_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cancel_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `success_url_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cancel_url_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `protection_validations`
--

CREATE TABLE `protection_validations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `ttl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `validation_result` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_lines`
--

CREATE TABLE `purchase_order_lines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(100) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `total` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_order_lines`
--

INSERT INTO `purchase_order_lines` (`id`, `product_id`, `qty`, `price`, `discount`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 20000, 20, 196000, '2023-02-22 03:44:20', '2023-02-22 03:45:14');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` smallint(5) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `weight`) VALUES
(1, 'administrator', 0),
(2, 'authenticated', 0);

-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--

CREATE TABLE `social_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `provider` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `confirmation_code` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `google2fa_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `active`, `confirmation_code`, `confirmed`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`, `deleted_at`, `last_login`, `google2fa_secret`) VALUES
(1, 'Admin', 'admin.laravel@labs64.com', '$2y$10$OJDRaLRLPJuog7/Jp9xEGuEmUcTOwz5S6hbwjWwnbQMy6rZTHQsoW', 1, '15ab52e1-8eaf-4d86-a7c9-57c46af0fc18', 1, NULL, NULL, '2023-02-22 03:41:09', '2023-02-22 03:42:45', NULL, '2023-02-22 10:42:45', NULL),
(2, 'Demo', 'demo.laravel@labs64.com', '$2y$10$IrYTU6DyEOqGihu2zcHIVOoFLi6nQ5BnDoRqfbLSntswL9KlHYfd.', 1, '69690ae6-790d-46b3-8553-4730102522cc', 1, NULL, NULL, '2023-02-22 03:41:09', '2023-02-22 03:41:09', NULL, NULL, NULL),
(3, 'Admin', 'admin@gmail.com', '$2y$10$0ylF4sGgx2IbeqDqyb2JqufMCj0cvq9AFIC7JSIZcbA.ynUOlGbLm', 1, '15ab52e1-8eaf-4d86-a7c9-57c46af0fc18', 1, NULL, NULL, '2023-02-22 03:41:09', '2023-03-01 05:17:06', NULL, '2023-03-01 12:17:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`user_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 2),
(3, 1),
(3, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`no_faktur`),
  ADD KEY `id_m_vendor` (`id_m_vendor`),
  ADD KEY `id_user_verifikasi` (`id_user_verifikasi`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `protection_shop_tokens`
--
ALTER TABLE `protection_shop_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pst_unique_user` (`user_id`),
  ADD KEY `protection_shop_tokens_number_index` (`number`),
  ADD KEY `protection_shop_tokens_expires_index` (`expires`);

--
-- Indexes for table `protection_validations`
--
ALTER TABLE `protection_validations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user` (`user_id`),
  ADD KEY `protection_validations_ttl_index` (`ttl`);

--
-- Indexes for table `purchase_order_lines`
--
ALTER TABLE `purchase_order_lines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_name` (`name`);

--
-- Indexes for table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_accounts_user_id_provider_provider_id_index` (`user_id`,`provider`,`provider_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD UNIQUE KEY `users_roles_user_id_role_id_unique` (`user_id`,`role_id`),
  ADD KEY `foreign_role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `protection_shop_tokens`
--
ALTER TABLE `protection_shop_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `protection_validations`
--
ALTER TABLE `protection_validations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_order_lines`
--
ALTER TABLE `purchase_order_lines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `social_accounts`
--
ALTER TABLE `social_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `protection_shop_tokens`
--
ALTER TABLE `protection_shop_tokens`
  ADD CONSTRAINT `pst_foreign_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `protection_validations`
--
ALTER TABLE `protection_validations`
  ADD CONSTRAINT `pv_foreign_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_order_lines`
--
ALTER TABLE `purchase_order_lines`
  ADD CONSTRAINT `purchase_order_lines_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD CONSTRAINT `social_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `foreign_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `foreign_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
