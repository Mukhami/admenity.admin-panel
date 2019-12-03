-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2019 at 09:16 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminty_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `listed_securities`
--

CREATE TABLE `listed_securities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_listed` int(11) NOT NULL,
  `mkt_cpt_ngn` decimal(20,2) NOT NULL,
  `mkt_cpt_usd` decimal(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listed_securities`
--

INSERT INTO `listed_securities` (`id`, `category`, `number_listed`, `mkt_cpt_ngn`, `mkt_cpt_usd`, `created_at`, `updated_at`) VALUES
(1, 'Equities – Premium Board', 7, '5227140237378.95', '14492459347.29', '2019-08-20 11:21:45', '2019-08-20 11:21:45'),
(2, 'Equities - Main Board', 147, '6416761933112.42', '17790733983.34', '2019-08-20 11:26:16', '2019-08-20 11:26:16'),
(4, 'Equities – AseM', 9, '7734562742.84', '21444390.44', '2019-08-20 11:27:02', '2019-08-20 11:27:02'),
(5, 'Equities – REITs', 5, '31143851306.40', '86347597.06', '2019-08-20 11:27:50', '2019-08-20 11:27:50'),
(6, 'Exchange Traded Products', 9, '5662452217.78', '15699379.55', '2019-08-20 11:28:43', '2019-08-20 11:28:43'),
(7, 'FGN Bonds', 72, '9812198612662.61', '27204720563.00', '2019-08-20 11:29:27', '2019-08-20 11:29:27'),
(8, 'Corporate Bonds', 25, '305203110000.00', '846188061.44', '2019-08-20 11:30:35', '2019-08-20 11:30:35'),
(9, 'State and Municipal Bonds', 22, '515269507190.00', '1428605709.19', '2019-08-20 11:31:22', '2019-08-20 11:31:22'),
(10, 'Supranational Bonds', 1, '8093750000.00', '22440251.75', '2019-08-20 11:31:56', '2019-08-20 11:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `market_flows`
--

CREATE TABLE `market_flows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `period` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domestic` decimal(5,2) NOT NULL,
  `foreign` decimal(5,2) NOT NULL,
  `total_ft_naira` decimal(8,2) NOT NULL,
  `total_ft_dollar` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `market_flows`
--

INSERT INTO `market_flows` (`id`, `period`, `domestic`, `foreign`, `total_ft_naira`, `total_ft_dollar`, `created_at`, `updated_at`) VALUES
(1, '2017', '52.52', '47.49', '1207.56', '3.95', '2019-09-02 14:25:55', '2019-09-02 14:25:55'),
(2, '2018', '49.13', '50.87', '1219.10', '3.35', '2019-09-02 14:43:23', '2019-09-02 14:43:23'),
(3, 'Jan - Mar 2019', '47.21', '52.79', '221.78', '0.61', '2019-09-02 14:44:06', '2019-09-02 16:13:55');

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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_20_080204_create_profile_table', 1),
(13, '2019_08_20_083243_create_listed_securities_table', 2),
(19, '2019_09_02_085454_create_market_flows_table', 3),
(20, '2019_09_02_132839_create_performance_sector_table', 3),
(21, '2019_09_03_074127_create_performance_capitalizations_table', 4),
(22, '2019_09_09_074251_create_roles_table', 5),
(23, '2019_09_09_080245_add_role_id_to_users', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mukhamikaranja@gmail.com', '$2y$10$clAs1aIhk4Ouy0eSWgYGCu5gWPR0wafZcZgpfnSqft7eNkOS5elGu', '2019-09-09 07:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `performance_capitalizations`
--

CREATE TABLE `performance_capitalizations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `capitalization` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_naira` decimal(8,2) NOT NULL,
  `naira_units` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_dollar` decimal(8,2) NOT NULL,
  `usd_units` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `change` decimal(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `performance_capitalizations`
--

INSERT INTO `performance_capitalizations` (`id`, `capitalization`, `transaction_naira`, `naira_units`, `transaction_dollar`, `usd_units`, `change`, `created_at`, `updated_at`) VALUES
(1, 'Large Cap( >$1 billion )', '7.26', 'tn', '20.12', 'bn', '-39.65', '2019-09-03 05:16:27', '2019-09-03 05:19:26'),
(2, 'Mid Cap( $150 million - $1 billion )', '3.44', 'tn', '9.64', 'bn', '64.34', '2019-09-03 05:20:33', '2019-09-03 05:20:33'),
(3, 'Small Cap ( <$150 million )', '985.80', 'bn', '2.73', 'bn', '11.45', '2019-09-03 05:21:34', '2019-09-03 05:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `performance_sectors`
--

CREATE TABLE `performance_sectors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `industry_sector` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_naira` decimal(8,2) NOT NULL,
  `naira_units` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_dollar` decimal(8,2) NOT NULL,
  `usd_units` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `change` decimal(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `performance_sectors`
--

INSERT INTO `performance_sectors` (`id`, `industry_sector`, `transaction_naira`, `naira_units`, `transaction_dollar`, `usd_units`, `change`, `created_at`, `updated_at`) VALUES
(1, 'Services', '119.92', 'bn', '332.48', 'mn', '-16.15', '2019-09-02 14:24:30', '2019-09-02 14:24:30'),
(2, 'Oil & Gas', '616.09', 'bn', '1.71', 'bn', '-14.08', '2019-09-02 14:30:06', '2019-09-02 14:30:06'),
(3, 'Natural Resources', '4.28', 'bn', '11.88', 'mn', '-13.62', '2019-09-02 14:31:06', '2019-09-02 14:31:06'),
(4, 'Industrial Goods', '3.89', 'tn', '10.78', 'bn', '-21.06', '2019-09-02 14:32:08', '2019-09-02 14:32:08'),
(5, 'ICT', '21.65', 'bn', '60.03', 'mn', '-32.46', '2019-09-02 14:33:05', '2019-09-02 14:33:05'),
(6, 'Healthcare', '30.02', 'bn', '83.24', 'mn', '-48.93', '2019-09-02 14:34:19', '2019-09-02 14:34:19'),
(7, 'Financial Services', '3.90', 'tn', '10.81', 'bn', '-21.06', '2019-09-02 14:38:23', '2019-09-02 14:38:23'),
(8, 'Consumer Goods', '2.81', 'tn', '7.79', 'bn', '-26.28', '2019-09-02 14:39:37', '2019-09-02 14:39:37'),
(9, 'Construction / Real Estate', '68.93', 'bn', '191.09', 'mn', '-17.21', '2019-09-02 14:40:30', '2019-09-02 14:40:30'),
(10, 'Conglomerates', '77.39', 'bn', '214.56', 'mn', '-42.48', '2019-09-02 14:41:19', '2019-09-02 14:41:19'),
(11, 'Agriculture', '141.90', 'bn', '141.90', 'tn', '-2.14', '2019-09-02 14:42:12', '2019-09-03 04:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `title`, `sub_title`, `body`, `created_at`, `updated_at`) VALUES
(1, 'PROFILE', 'Africa\'s Preferred Exchange Hub', '<p style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 1rem; font-size: 13px; line-height: 25px; color: #353c4e; font-family: \'open sans\', sans-serif; background-color: #ffffff;\">The Nigerian Stock Exchange (&lsquo;NSE&rsquo; or &lsquo;The Exchange&rsquo;) services the largest economy in Africa, and is championing the development of Africa&rsquo;s financial markets. The Exchange offers listing and trading services, licensing services, market data solutions, ancillary technology services, and more. The Nigerian Stock Exchange continues to evolve to meet the needs of its valued customers and to achieve the highest level of competitiveness. It is an open, professional and vibrant exchange, connecting Nigeria, Africa and the world.</p>\r\n<p style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 1rem; font-size: 13px; line-height: 25px; color: #353c4e; font-family: \'open sans\', sans-serif; background-color: #ffffff;\">The NSE is committed to adopting the highest levels of international standards. To support this commitment, the Exchange belongs to a number of international and regional organizations that promote the development of standards and best practices in everything that we do, including the International Organization of Securities Commissions (IOSCO), the World Federation of Exchanges (WFE), the SIIA&rsquo;s Financial Information Services Division (FISD) and the Intermarket Surveillance Group (ISG).</p>\r\n<p style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 1rem; font-size: 13px; line-height: 25px; color: #353c4e; font-family: \'open sans\', sans-serif; background-color: #ffffff; text-align: justify;\">Over the years, The Exchange has been recognized as the Most Innovative African Stock Exchange by The Business Year Magazine, African Regulator of the Year by the African Business Leadership Awards and Financial Institution of the Year by The Oil and Gas Year. The Exchange has also received the Financial Literacy Excellence Award, Best Corporate Social Responsibility Award and African Investor (Ai) Best Initiative in Support of SMEs and the Millennium Development Goals, amongst others.</p>', '2019-08-20 08:33:17', '2019-09-04 06:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2019-09-09 05:32:34', '2019-09-09 05:32:34'),
(2, 'User', '2019-09-09 05:33:20', '2019-09-09 05:33:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) NOT NULL DEFAULT '2',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'mukhamikaranja@gmail.com', NULL, '$2y$10$Lz4hyeGG9b6l1f87MWmbEO2fajkuFpG8ByG.AFMdDEPm3slyVWqs2', '9kc6FVzoki2APaboR3RumtF9crSnAB0BQt7o4X5THUGUn65yTNPzBdpVtpzF', '2019-09-07 13:46:27', '2019-09-09 07:12:34'),
(3, 2, 'Kevin Mukhami', 'kkevie@rocketmail.com', NULL, '$2y$10$3AcN.ZOoEurOKOicwwhqz.j8fOXN2TZFOzntanUCY0anP.J9J2oO.', NULL, '2019-09-09 14:53:59', '2019-09-09 14:53:59'),
(4, 1, 'Adura Solanke', 'adura.solanke@nse.com.ng', NULL, '$2y$10$HdoQGeWxW8mIdcJLrjDeh.1xWcDATzj4z3ix6NGqz5i0Hz/UN9xr2', NULL, '2019-09-10 03:49:18', '2019-09-10 04:10:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listed_securities`
--
ALTER TABLE `listed_securities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `market_flows`
--
ALTER TABLE `market_flows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `performance_capitalizations`
--
ALTER TABLE `performance_capitalizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performance_sectors`
--
ALTER TABLE `performance_sectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listed_securities`
--
ALTER TABLE `listed_securities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `market_flows`
--
ALTER TABLE `market_flows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `performance_capitalizations`
--
ALTER TABLE `performance_capitalizations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `performance_sectors`
--
ALTER TABLE `performance_sectors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
