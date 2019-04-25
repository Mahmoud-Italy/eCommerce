-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 25, 2019 at 03:06 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Task1`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit_price` decimal(12,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `pro_id`, `qty`, `unit_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 5, 3, '1120.00', 1, '2019-04-17 18:35:52', '2019-04-21 18:40:54'),
(2, 4, 1, 3, '500.00', 1, '2019-04-21 17:03:27', '2019-04-21 18:40:54');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 0, 'Women\'s Clothing', 1, '2019-04-03 17:03:40', '2019-04-03 17:03:40'),
(2, 0, 'Men Fashion', 1, '2019-04-03 17:03:59', '2019-04-03 17:03:59'),
(3, 0, 'Computer & Office', 1, '2019-04-03 17:04:11', '2019-04-03 17:04:11'),
(4, 0, 'Bags & Shoes', 1, '2019-04-03 17:04:33', '2019-04-03 17:04:33'),
(5, 0, 'Toys & Kids & Baby', 1, '2019-04-03 17:05:06', '2019-04-03 17:05:06'),
(6, 1, 'Kids Clothing', 1, '2019-04-03 17:05:46', '2019-04-03 17:05:46'),
(7, 1, 'Teenager Clothing', 1, '2019-04-03 17:06:07', '2019-04-03 17:06:07'),
(8, 2, 'Boy Fashion', 1, '2019-04-03 17:06:28', '2019-04-03 17:06:28'),
(9, 2, 'Kids Fashion', 1, '2019-04-03 17:06:37', '2019-04-03 17:06:37'),
(10, 0, 'All Accessories', 0, '2019-04-03 17:31:28', '2019-04-03 17:32:16'),
(11, 1, 'Cat 3', 1, '2019-04-10 16:32:44', '2019-04-10 16:32:44');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'test', '2019-03-24 18:45:41', '0000-00-00 00:00:00'),
(2, 'test 2', '2019-03-24 18:45:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_10_182221_create_category_table', 1),
(4, '2019_03_13_175013_create_products_table', 1),
(5, '2019_03_13_175630_create_orders_table', 1),
(6, '2019_03_13_175650_create_carts_table', 2),
(7, '2019_03_13_181436_create_offers_table', 2),
(8, '2019_04_10_191306_create_slides_table', 3),
(9, '2019_04_17_183704_create_wishlists_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `pro_id` int(11) NOT NULL,
  `percent` int(11) NOT NULL,
  `startDate` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endDate` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart_id` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `cancel` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `cart_id`, `status`, `cancel`, `created_at`, `updated_at`) VALUES
(5, 4, '[1,2]', 0, 0, '2019-04-21 18:40:54', '2019-04-21 18:40:54');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(11) NOT NULL,
  `image` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `price_discount` decimal(12,2) NOT NULL,
  `content` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `image`, `name`, `qty`, `price`, `price_discount`, `content`, `active`, `created_at`, `updated_at`) VALUES
(1, 8, 'uploads/products/1555265543.jpg', 'Nokia 520', 5, '500.00', '550.00', 'mobile zay el fol', 1, '2019-04-14 16:12:23', '2019-04-14 16:12:23'),
(2, 6, 'uploads/products/1555265590.jpg', 'Huawei', 5, '950.00', '1000.00', 'good material', 1, '2019-04-14 16:13:10', '2019-04-14 16:13:10'),
(3, 9, 'uploads/products/1555265661.jpg', 'POCO Phone', 9, '750.00', '860.00', 'poco phone', 1, '2019-04-14 16:14:21', '2019-04-14 16:14:21'),
(4, 8, 'uploads/products/1555265696.jpg', 'SELF Phone', 5, '1500.00', '0.00', 'handfree self phone', 1, '2019-04-14 16:14:56', '2019-04-14 16:14:56'),
(5, 6, 'uploads/products/1555265750.jpg', 'Huawei', 20, '1120.00', '1400.00', '...', 1, '2019-04-14 16:15:50', '2019-04-14 16:15:50'),
(6, 8, 'uploads/products/1555265783.jpg', 'SAMSUNG', 5, '1100.00', '1200.00', 'samsung is bad', 1, '2019-04-14 16:16:24', '2019-04-14 16:16:24'),
(7, 11, 'uploads/products/1555265809.jpg', 'Black view', 5, '1500.00', '2000.00', 'new brand', 1, '2019-04-14 16:16:50', '2019-04-14 17:17:36'),
(8, 11, 'uploads/products/1555265830.jpg', 'Huawei', 5, '200.00', '400.00', 'pink', 1, '2019-04-14 16:17:10', '2019-04-14 17:16:46'),
(9, 11, 'uploads/products/1555265900.jpg', 'SAMSUNG Galaxy 280', 4, '500.00', '520.00', '.', 1, '2019-04-14 16:18:20', '2019-04-14 17:14:01'),
(10, 6, 'uploads/products/1555265932.jpg', 'SAMSUNG RED G41', 8, '800.00', '810.00', '....', 1, '2019-04-14 16:18:52', '2019-04-14 16:18:52'),
(11, 6, 'uploads/products/1555265951.jpg', 'SAMSUNG GRAY', 1, '500.00', '560.00', '...', 1, '2019-04-14 16:19:11', '2019-04-14 16:19:11');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `content`, `created_at`, `updated_at`) VALUES
(1, 'meta_author', 'author', '2019-03-24 20:04:48', '2019-03-24 18:04:48'),
(2, 'meta_keywords', 'key12312312312312asdasd', '2019-03-24 20:08:42', '2019-03-24 18:08:42'),
(3, 'meta_description', 'desc', '2019-03-24 20:04:48', '2019-03-24 18:04:48'),
(4, 'copywrite', 'tm Comp', '2019-03-24 20:22:24', '0000-00-00 00:00:00'),
(5, 'title', '', '2019-03-24 20:10:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `sort` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `image`, `title`, `content`, `sort`, `active`, `created_at`, `updated_at`) VALUES
(2, 'uploads/slides/2019-04-10-08-36-24.jpg', 'asd', 'asd', 3, 1, '2019-04-10 18:36:24', '2019-04-10 18:36:24'),
(3, 'uploads/slides/2019-04-10-08-50-30.png', 'dasdsadas', 'asdas', 2, 1, '2019-04-10 18:50:30', '2019-04-10 18:50:30'),
(4, 'uploads/slides/2019-04-10-08-50-43.jpg', 'asdasdasd', 'asdsadsa', 1, 1, '2019-04-10 18:50:43', '2019-04-10 18:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT '0',
  `activation_key` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suspend` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role_id`, `activation_key`, `suspend`, `created_at`, `updated_at`) VALUES
(2, 'Hossam', 'hossam@gmail.com', NULL, '$2y$10$P9EW.P7XD.ug7PjGSnBLveYCCmCY/nqixutHdZShEV8a0wt71ikL.', NULL, 0, '2-25b219af3a614e42875ea24fd8b37a4b5ca4fdf559423', 0, '2019-03-27 16:07:19', '2019-04-03 16:39:49'),
(3, 'ali', 'ali@gmail.com', NULL, '$2y$10$O8IOcqhfUP8C6hrvw42rk.OUdJ8Q3XgEeLj3pz62oKrNb4p4vp.Hi', 'sa14pdDledKPztQSCNcrZo1kZOr0yULiSdaknyiJ94DPHrLU2tdGk8r3Kns9', 0, NULL, 0, '2019-03-27 16:52:55', '2019-04-03 16:58:05'),
(4, 'ahmed', 'ahmed@gmail.com', NULL, '$2y$10$HM0/1GKsiggt4Z/FTCcYZu7ZgQjvBA6aW9kMuAoFvNCvefyYaZhcq', 'RLqbpP42e0iUPaR3jrIetm173v4dm4Yg06s0kdIVdPnPaOTrXNioGAiJeeXu', 0, NULL, 0, '2019-04-17 16:50:12', '2019-04-17 16:50:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_shipping`
--

CREATE TABLE `user_shipping` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `address` longtext NOT NULL,
  `postal_code` text NOT NULL,
  `city` text NOT NULL,
  `country` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_shipping`
--

INSERT INTO `user_shipping` (`id`, `user_id`, `order_id`, `address`, `postal_code`, `city`, `country`, `created_at`, `updated_at`) VALUES
(2, 4, 5, 'gizzzzzz', '125111', 'cairo', 'egypt', '2019-04-21 18:40:54', '2019-04-21 18:40:54');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `pro_id`, `created_at`, `updated_at`) VALUES
(30, 4, 2, '2019-04-21 17:01:38', '2019-04-21 17:01:38'),
(31, 4, 5, '2019-04-21 17:01:40', '2019-04-21 17:01:40'),
(32, 4, 10, '2019-04-21 17:14:39', '2019-04-21 17:14:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_shipping`
--
ALTER TABLE `user_shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_shipping`
--
ALTER TABLE `user_shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
