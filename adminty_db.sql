-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2019 at 11:03 AM
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
(13, '2019_08_20_083243_create_listed_securities_table', 2);

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
(1, 'PROFILE', 'Africa\'s Preferred Exchange Hub', '<p>The Nigerian Stock Exchange (&lsquo;NSE&rsquo; or &lsquo;The Exchange&rsquo;) services the largest economy in Africa, and is championing the development of Africa&rsquo;s financial markets. The Exchange offers listing and trading services, licensing services, market data solutions, ancillary technology services, and more. The Nigerian Stock Exchange continues to evolve to meet the needs of its valued customers, and to achieve the highest level of competitiveness. It is an open, professional and vibrant exchange, connecting Nigeria, Africa and the world.</p>\r\n<p>The NSE is committed to adopting the highest levels of international standards. To support this commitment, the Exchange belongs to a number of international and regional organizations that promote the development of standards and best practices in everything that we do, including the International Organization of Securities Commissions (IOSCO), the World Federation of Exchanges (WFE), the SIIA&rsquo;s Financial Information Services Division (FISD) and the Intermarket Surveillance Group (ISG).</p>\r\n<p style=\"text-align: justify;\">Over the years, The Exchange has been recognized as the Most Innovative African Stock Exchange by The Business Year Magazine, African Regulator of the Year by the African Business Leadership Awards and Financial Institution of the Year by The Oil and Gas Year. The Exchange has also received the Financial Literacy Excellence Award, Best Corporate Social Responsibility Award and African Investor (Ai) Best Initiative in Support of SMEs and the Millennium Development Goals, amongst others.</p>', '2019-08-20 08:33:17', '2019-08-20 12:15:47'),
(2, 'Test', 'test', '<p>Text</p>', '2019-08-21 05:50:09', '2019-08-21 05:50:09');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listed_securities`
--
ALTER TABLE `listed_securities`
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
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
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
-- AUTO_INCREMENT for table `listed_securities`
--
ALTER TABLE `listed_securities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
