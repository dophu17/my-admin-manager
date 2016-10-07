-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2016 at 01:02 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myadminmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci,
  `name_slug` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` text COLLATE utf8_unicode_ci,
  `tag` text COLLATE utf8_unicode_ci,
  `orderby` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `last_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `name_slug`, `icon`, `tag`, `orderby`, `created_at`, `updated_at`, `last_user`) VALUES
(1, 'Đậu hữ thơm', 'dau-hu-thom', NULL, 'dauhuthom', NULL, '2016-10-07 14:26:09', NULL, 1),
(2, 'Category 111', 'category-111', '1475825191-before.png.png', 'category1', NULL, '2016-10-07 14:26:31', '2016-10-07 14:37:26', 1),
(3, 'Category 2', 'category-2', NULL, 'category2', 1, '2016-10-07 14:28:36', '2016-10-07 14:38:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories_products`
--

CREATE TABLE `categories_products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `subject` text COLLATE utf8_unicode_ci,
  `from_name` text COLLATE utf8_unicode_ci,
  `from_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL COMMENT '0: not read; 1:read'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `subject`, `from_name`, `from_email`, `content`, `created_at`, `is_read`) VALUES
(1, 'tets', 'phu', 'dophu17@gmail.com', 'test content', '2016-10-07 05:09:00', 0),
(2, 'tets 2', 'phu 2', 'dophu17@gmail.com', 'test content 2', '2016-10-07 11:10:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `news_id` int(11) DEFAULT NULL,
  `name` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci,
  `name_slug` text COLLATE utf8_unicode_ci,
  `avatar` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `last_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci,
  `name_slug` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8_unicode_ci,
  `price` double DEFAULT NULL,
  `price_promotion` double DEFAULT NULL,
  `color` text COLLATE utf8_unicode_ci,
  `weight` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `made_in` text COLLATE utf8_unicode_ci,
  `version_year` int(4) DEFAULT NULL,
  `model` text COLLATE utf8_unicode_ci,
  `tag` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `status` tinyint(1) DEFAULT NULL COMMENT '0: stock; 1: not stock',
  `orderby` int(11) DEFAULT NULL,
  `is_feature` int(11) DEFAULT NULL,
  `is_new` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `last_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `key` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `default_value` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `label` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `default_value`, `label`, `description`) VALUES
(1, '1', '11', '10', 'Pagination admin', 'Pagination in page admin only'),
(2, '2', '6', '5', 'Pagination public', 'Pagination in page public only');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` tinyint(4) DEFAULT NULL COMMENT '1:men; 0: women',
  `avatar` text COLLATE utf8_unicode_ci,
  `address` text COLLATE utf8_unicode_ci,
  `birthday` date DEFAULT NULL,
  `phone` int(12) DEFAULT NULL,
  `fax` int(12) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `sex`, `avatar`, `address`, `birthday`, `phone`, `fax`, `created_at`, `updated_at`, `last_user`) VALUES
(1, 'dophu17', 'dophu17@gmail.com', '$2y$10$somMbRc6oyI7y4yfNRp09u98F0Eb4yTnDSzakHY2Kd8QxdkXQo35y', 'TWrEVOFHKfO6ONQCzi7YbwCbCBOXG6bvOoLbJlh9WdL3ThW3iOgGNU3dLuCG', NULL, '1475809344-Untitled6.png', NULL, '1970-01-01', NULL, NULL, NULL, '2016-10-07 03:02:24', 1),
(2, 'phu', 'phu.dht@chiroro.com.vn', '$2y$10$Y6ZOTnKdviqSrZguinm/.eEEjkbMq6GtdW0f/l70pe3Eou3jKJd3y', 'e90Uc2usV8sePgreCPzFhWnDRBM88xiIzwesE5O6HDVV43Lr83YMdGg6PhFm', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-19 05:35:11', '2016-09-19 05:35:18', NULL),
(4, 'phu', 'dophu177@gmail.com', '$2y$10$7PRV/26G.URAWegbRz1D6OOp4ZoZaU3N8RIAmdVLiW5LGicg4GYYq', NULL, 1, NULL, '165 Thoai Ngoc Hau', '1994-07-01', 1696452584, 22222, '2016-10-02 06:25:53', NULL, 1),
(5, 'phu 2', 'dophu1771@gmail.com', '$2y$10$ej4OazRFd6/8fUCEoJmW6OxLFo2cAZwcRPm7/fCvARV4jDeX2h6OO', NULL, 1, NULL, '165 Thoai Ngoc Hau', '1993-07-01', 1696452584, 22222, '2016-10-02 06:44:39', NULL, 1),
(6, 'phu 3', 'dophu17717@gmail.com', '$2y$10$KP17Qr3aNTHA1M7V2J9JMeLZZ6Usc7V40lUpEduGjL6TKAA7Zsmpa', NULL, 1, NULL, '165 Thoai Ngoc Hau', '1993-07-01', 1696452584, 22222, '2016-10-02 06:45:21', NULL, 1),
(7, 'phu', 'dophu1718@gmail.com', '123456', NULL, 1, NULL, '165 Thoai Ngoc Hau', '1993-07-01', 1696452584, 22222, '2016-10-02 07:00:29', NULL, 1),
(8, 'phu', 'dophu17188@gmail.com', '123456', NULL, NULL, NULL, '165 Thoai Ngoc Hau', '1993-07-01', 1696452584, 22222, '2016-10-02 07:02:57', NULL, 1),
(9, 'do phu 22222', 'dophu0000@gmail.com', '$2y$10$ky03WYqqDAK1Tepwntu9muK/v3LojM5BmgggRbBU7wX2DEFD4hXC6', NULL, NULL, NULL, NULL, '1970-01-01', NULL, NULL, '2016-10-02 07:13:25', NULL, 1),
(10, 'phu upload 33334', 'dophu176666@gmail.com', '$2y$10$u9vSWzoif7AN/swDp/q6X.hJQssGFkdOs15sEHVbzLCnwIuK9nzTi', NULL, NULL, '1475591423-hinh-nen-dien-thoai-dep-nhat-7.jpg', '165 Thoai Ngoc Hau', '1970-01-01', NULL, NULL, '2016-10-02 08:03:20', '2016-10-04 14:39:15', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_products`
--
ALTER TABLE `categories_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categories_products`
--
ALTER TABLE `categories_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
