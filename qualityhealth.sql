-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2019 at 11:32 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qualityhealth`
--

-- --------------------------------------------------------

--
-- Table structure for table `hcps`
--

CREATE TABLE `hcps` (
  `hcp_id` int(10) UNSIGNED NOT NULL,
  `hcp_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hcp_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hcp_password` text COLLATE utf8_unicode_ci NOT NULL,
  `hcp_pic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hcps`
--

INSERT INTO `hcps` (`hcp_id`, `hcp_name`, `hcp_email`, `hcp_password`, `hcp_pic`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rose Rose', 'rose@gmail.com', '$2y$10$zYYWm1trDqHraG4d/w0n1u1/KvVGIeI7if9EVYqAhhANYcXajsW3.', '', NULL, '2019-11-13 09:17:26', '2019-11-13 09:17:26'),
(2, 'Jane Jane', 'jane@gmail.com', '$2y$10$17Ofx5ikoM3.PgjsquNiuejp3oXBzD.n3vWSax0GezaBzZveiEJ0C', '', NULL, '2019-11-13 09:17:26', '2019-11-13 09:17:26');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `invoice_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_date` date NOT NULL,
  `order_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
('2014_10_12_100000_create_password_resets_table', 1),
('2019_10_17_155557_create_supplement_categories_table', 1),
('2019_10_17_155640_create_supplements_table', 1),
('2019_10_17_155701_create_orders_table', 1),
('2019_10_17_155724_create_invoices_table', 1),
('2019_10_17_160046_create_hcps_table', 1),
('2019_10_17_165818_create_supplement_suppliers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `cart` text COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplements`
--

CREATE TABLE `supplements` (
  `supplement_id` int(10) UNSIGNED NOT NULL,
  `supplement_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplement_price` int(11) NOT NULL,
  `supplement_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplement_pic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplement_category_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `supplements`
--

INSERT INTO `supplements` (`supplement_id`, `supplement_name`, `supplement_price`, `supplement_description`, `supplement_pic`, `supplement_category_id`, `supplier_id`, `created_at`, `updated_at`) VALUES
(1, 'Weight Loss', 250, '<p><strong>Features: </strong>Weight loss supplement is a nice and suitable supplement for weight loss. If you need to shred unnecessary fat from your body, this supplement is for you.&nbsp;</p>\r\n\r\n<p><strong>Dosage: </strong>One capsule after each meal e', 'sp2-1573640882.jpg', 3, 0, '2019-11-13 09:28:02', '2019-11-13 09:28:02'),
(2, 'Garcinia', 300, '<p><strong>Features:</strong> Garcinia is a nutrotional supplement that is good for the body. A user can take this supplement after each meal.</p>\r\n\r\n<p><strong>Dosage: </strong>One capsule after each meal, 3 times a day.</p>\r\n', 'sp3-1573641049.png', 3, 0, '2019-11-13 09:30:49', '2019-11-13 09:30:49');

-- --------------------------------------------------------

--
-- Table structure for table `supplement_categories`
--

CREATE TABLE `supplement_categories` (
  `supplement_category_id` int(10) UNSIGNED NOT NULL,
  `supplement_category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `supplement_categories`
--

INSERT INTO `supplement_categories` (`supplement_category_id`, `supplement_category_name`, `created_at`, `updated_at`) VALUES
(1, 'Skin Supplements', '2019-11-13 09:17:26', '2019-11-13 09:17:26'),
(2, 'Heart Supplements', '2019-11-13 09:17:26', '2019-11-13 09:17:26'),
(3, 'Nutrition Supplements', '2019-11-13 09:17:26', '2019-11-13 09:17:26'),
(4, 'Work-out Supplements', '2019-11-13 09:17:26', '2019-11-13 09:17:26'),
(5, 'Hair Supplements', '2019-11-13 09:17:26', '2019-11-13 09:17:26'),
(6, 'Anti-ageing Supplements', '2019-11-13 09:17:26', '2019-11-13 09:17:26');

-- --------------------------------------------------------

--
-- Table structure for table `supplement_suppliers`
--

CREATE TABLE `supplement_suppliers` (
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_addr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `supplement_suppliers`
--

INSERT INTO `supplement_suppliers` (`supplier_id`, `supplier_name`, `supplier_addr`, `supplier_phone`, `supplier_email`, `created_at`, `updated_at`) VALUES
(1, 'Emzor Supplier', '123 Church Street', '081234567', 'info@emzor.co.za', '2019-11-13 09:17:26', '2019-11-13 09:17:26'),
(2, 'Green Life', '123 Church Street', '081234567', 'info@greenlife.co.za', '2019-11-13 09:17:26', '2019-11-13 09:17:26'),
(3, 'Herbal Life', '123 Church Street', '081234567', 'info@herballife.co.za', '2019-11-13 09:17:26', '2019-11-13 09:17:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_tel_h` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_tel_w` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_addr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hcps`
--
ALTER TABLE `hcps`
  ADD PRIMARY KEY (`hcp_id`),
  ADD UNIQUE KEY `hcps_hcp_email_unique` (`hcp_email`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `supplements`
--
ALTER TABLE `supplements`
  ADD PRIMARY KEY (`supplement_id`);

--
-- Indexes for table `supplement_categories`
--
ALTER TABLE `supplement_categories`
  ADD PRIMARY KEY (`supplement_category_id`);

--
-- Indexes for table `supplement_suppliers`
--
ALTER TABLE `supplement_suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `users_user_email_unique` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hcps`
--
ALTER TABLE `hcps`
  MODIFY `hcp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplements`
--
ALTER TABLE `supplements`
  MODIFY `supplement_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplement_categories`
--
ALTER TABLE `supplement_categories`
  MODIFY `supplement_category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplement_suppliers`
--
ALTER TABLE `supplement_suppliers`
  MODIFY `supplier_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
