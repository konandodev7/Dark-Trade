-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 01:34 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `darktrade`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  `account_holder` text DEFAULT NULL,
  `account_no` text DEFAULT NULL,
  `account_ifsc` text DEFAULT NULL,
  `upi` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `self_code` text DEFAULT NULL,
  `referal_code` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `uid`, `name`, `email`, `phone`, `img`, `account_holder`, `account_no`, `account_ifsc`, `upi`, `address`, `created_at`, `updated_at`, `self_code`, `referal_code`) VALUES
(12, 24, 'test', 'test1@gmail.com', '4589632569', NULL, 'fdvdv', '532535345', 'uiguyi', 'upi id gh', 'sfvdvf', '2021-05-04 02:28:08', '2021-05-05 17:33:30', 'Qi931U', NULL),
(13, 25, 'Test2', 'test2@gmail.com', '1236547896', NULL, 'gvfsgv', '588888886354', 'gfbcnbv', NULL, NULL, '2021-05-05 03:36:00', '2021-05-11 23:55:03', 'H02qKE', NULL),
(14, 26, 'test3', 'test3@gmail.com', '5963265985', NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-23 05:44:08', '2021-05-23 05:44:08', 'J5bUqX', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `percentages`
--

CREATE TABLE `percentages` (
  `id` int(11) NOT NULL,
  `f_money` int(11) DEFAULT NULL,
  `d_money` int(11) DEFAULT NULL,
  `d_money_status` enum('T','F') DEFAULT NULL,
  `i_money` int(11) DEFAULT NULL,
  `i_money_status` enum('T','F') DEFAULT NULL,
  `s_money` int(11) DEFAULT NULL,
  `r_money` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `percentages`
--

INSERT INTO `percentages` (`id`, `f_money`, `d_money`, `d_money_status`, `i_money`, `i_money_status`, `s_money`, `r_money`, `created_at`, `updated_at`) VALUES
(1, 20, 11, 'T', 2, 'F', 2, 3, '2021-04-24 23:48:23', '2021-05-05 17:43:37');

-- --------------------------------------------------------

--
-- Table structure for table `pkeys`
--

CREATE TABLE `pkeys` (
  `id` int(11) NOT NULL,
  `access_key` text DEFAULT NULL,
  `secret_key` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pkeys`
--

INSERT INTO `pkeys` (`id`, `access_key`, `secret_key`, `created_at`, `updated_at`) VALUES
(1, '8a11cfe0-b001-11eb-8b27-61c09c212ed6', '896ba0db0cfb0dfd8f72102fcdb177604ffa5cf2', '2021-04-30 04:05:51', '2021-05-08 08:36:34');

-- --------------------------------------------------------

--
-- Table structure for table `promocodes`
--

CREATE TABLE `promocodes` (
  `id` int(11) NOT NULL,
  `code` text DEFAULT NULL,
  `percentage` text DEFAULT NULL,
  `rupees` text DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `purpose` enum('S','W') NOT NULL DEFAULT 'W',
  `status` enum('T','F') DEFAULT 'F',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promocodes`
--

INSERT INTO `promocodes` (`id`, `code`, `percentage`, `rupees`, `uid`, `purpose`, `status`, `created_at`, `updated_at`) VALUES
(9, 'KSlYh', '5', NULL, NULL, 'W', 'F', '2021-05-05 17:43:58', '2021-05-05 17:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `transaction_id` text DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `des` text DEFAULT NULL,
  `image` varchar(5000) DEFAULT NULL,
  `status` enum('A','W','P') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `uid`, `transaction_id`, `amount`, `des`, `image`, `status`, `created_at`, `updated_at`) VALUES
(29, 24, 'py_BTAxBIV2rNCNrCm', 2, 'Added Security Amount', NULL, 'A', '2021-05-08 09:34:40', '2021-05-08 09:34:40'),
(28, 24, 'py_BTAw8k1YdiaZmM1', 1, 'Added payment to Wallet', NULL, 'A', '2021-05-08 09:31:07', '2021-05-08 09:31:07'),
(27, 24, 'sb_appreq_BTAw6u92grMOwOv', 1, 'Added payment to Wallet', NULL, 'A', '2021-05-08 09:26:31', '2021-05-08 09:26:31'),
(26, 24, 'shgthn', 30, 'withdraw successful', NULL, 'W', '2021-05-05 17:42:37', '2021-05-05 17:42:37'),
(25, 24, 'sb_py_IGKQ93vlab4MAR', 8000, 'Added Security Amount', NULL, 'A', '2021-05-04 03:58:58', '2021-05-04 03:58:58'),
(24, 24, 'sb_py_IGKQ5Kgy8T126X', 300, 'Added payment to Wallet', NULL, 'A', '2021-05-04 03:57:54', '2021-05-04 03:57:54'),
(23, 24, 'sb_py_BS0onEBZB42nptL', 500, 'Added payment to Wallet', NULL, 'A', '2021-05-04 03:49:34', '2021-05-04 03:49:34'),
(30, 24, 'fghrhy', 589, 'Processing, Will reflect in Wallet Soon', NULL, 'P', '2022-12-02 03:21:17', '2022-12-02 03:21:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_del` enum('T','F') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'F',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_del`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Yash Kumar', 'yash@gmail.com', '2021-04-13 15:10:26', '$2y$10$qWDHDFREivJ63FknTSMNiO3jbm6LWgziGaOSIW3QQ3m.GRobCw42K', 'xtXMhGWV5k9mSd03zRd9JghzHkObZ9XnGImuis1lzZiLtZk6XAa7iqxRtbzD', 'F', '2021-04-13 15:10:26', '2021-04-29 22:22:09'),
(26, 'user', 'test3', 'test3@gmail.com', NULL, '$2y$10$wbVn8tAZtcvQq.ae7t7khOjOFC0pjm3lw1zlCBsNt7lr6XBdCw36S', NULL, 'F', '2021-05-23 05:44:08', '2021-05-23 05:44:08'),
(25, 'user', 'Test2', 'test2@gmail.com', NULL, '$2y$10$jQlRxSP9pFQbPFtfFxgSherYDTqH3vfB8y0trzTc8D9gxe14mFc3u', NULL, 'F', '2021-05-05 03:36:00', '2021-05-05 03:36:00'),
(24, 'user', 'test', 'test1@gmail.com', NULL, '$2y$10$/0omQ.8FZzi5slCtUDbgMeXSUumJrumLeaW8520ObkSUyLsHvI3jK', NULL, 'F', '2021-05-04 02:28:08', '2021-05-04 02:28:08');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `security_amount` int(11) DEFAULT NULL,
  `security_status` enum('T','F') NOT NULL DEFAULT 'F',
  `wallet_balance` int(11) DEFAULT NULL,
  `referal_status` enum('T','F') NOT NULL DEFAULT 'F',
  `f_money_status` enum('T','F') NOT NULL DEFAULT 'F',
  `promo_status` enum('T','F') NOT NULL DEFAULT 'F',
  `deposit_status` enum('T','F') NOT NULL DEFAULT 'F',
  `withdraw_days` int(11) NOT NULL DEFAULT 7,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `uid`, `security_amount`, `security_status`, `wallet_balance`, `referal_status`, `f_money_status`, `promo_status`, `deposit_status`, `withdraw_days`, `created_at`, `updated_at`) VALUES
(6, 24, 8002, 'T', 7, 'F', 'T', 'F', 'T', 0, '2021-05-04 02:28:08', '2021-05-08 09:34:40'),
(7, 25, 0, 'F', 400, 'F', 'T', 'F', 'F', 2, '2021-05-05 03:36:00', '2021-05-05 17:45:52'),
(8, 26, 0, 'F', 20, 'F', 'T', 'F', 'F', 7, '2021-05-23 05:44:09', '2021-05-23 05:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `des` text DEFAULT NULL,
  `status` enum('A','P','C') NOT NULL DEFAULT 'P',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `uid`, `amount`, `des`, `status`, `created_at`, `updated_at`) VALUES
(10, 25, 200, NULL, 'P', '2021-05-11 23:54:09', '2021-05-11 23:54:09'),
(9, 24, 20, 'fggvgbv', 'C', '2021-05-05 17:33:06', '2021-05-05 17:40:06'),
(8, 24, 30, 'withdraw successful', 'A', '2021-05-04 03:56:55', '2021-05-05 17:42:37'),
(11, 25, 10, NULL, 'P', '2021-05-11 23:55:11', '2021-05-11 23:55:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `percentages`
--
ALTER TABLE `percentages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promocodes`
--
ALTER TABLE `promocodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `percentages`
--
ALTER TABLE `percentages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promocodes`
--
ALTER TABLE `promocodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
