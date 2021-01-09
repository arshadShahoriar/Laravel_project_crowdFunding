-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2021 at 02:55 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crowd_funding`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` int(10) NOT NULL,
  `cid` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `UpdatedDate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`id`, `cid`, `uid`, `UpdatedDate`) VALUES
(1, 6, 1, '2021-01-02'),
(2, 2, 1, '2021-01-02'),
(3, 3, 1, '2021-01-02'),
(4, 8, 1, '2021-01-02'),
(5, 6, 1, '2021-01-02'),
(6, 4, 1, '2021-01-03'),
(7, 9, 1, '2021-01-04'),
(8, 8, 1, '2021-01-04'),
(9, 2, 1, '2021-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `target_fund` int(9) DEFAULT NULL,
  `raised_fund` int(9) DEFAULT NULL,
  `ctype` int(1) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `publisedDate` varchar(50) NOT NULL,
  `endDate` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `uid`, `target_fund`, `raised_fund`, `ctype`, `description`, `image`, `publisedDate`, `endDate`, `status`, `title`) VALUES
(4, 1, 1, 2, 2, '222', '118707356_241516950458056_2520428180141235746_n_1609581567.jpg', '2021-01-08', '2021-01-23', 1, '1'),
(5, 1, 1, 22, 11, '11', 'Capture0_1609800802.PNG', '2021-01-02', '2021-01-14', 1, '1'),
(8, 1, 12, 101, 12, '1212', 'Capture21_1609800781.PNG', '2021-01-06', '2021-01-13', 12, '12'),
(10, 1, 200000, 600, 1, 'Covid19', 'Capture10_1609797914.PNG', '2021-01-05', '2021-01-21', 1, 'Covid19'),
(11, 1, 2000, 223, 1, 'very very emergency', 'Capture25_1609825621.PNG', '2021-01-07', '2021-01-14', 1, 'Emergency');

-- --------------------------------------------------------

--
-- Table structure for table `contractadmins`
--

CREATE TABLE `contractadmins` (
  `id` int(100) NOT NULL,
  `uid` int(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `updatedDate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contractadmins`
--

INSERT INTO `contractadmins` (`id`, `uid`, `description`, `updatedDate`) VALUES
(1, 1, 'works', '2021-01-03'),
(2, 1, 'works', '2021-01-03'),
(3, 1, 'works', '2021-01-03'),
(4, 1, 'nothing', '2021-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(100) NOT NULL,
  `uid` int(100) NOT NULL,
  `cid` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `uid`, `cid`, `amount`, `date`) VALUES
(1, 1, 1, 100, '2021-01-03'),
(2, 1, 6, 100, '2021-01-03'),
(3, 1, 6, 100, '2021-01-03'),
(4, 1, 8, 88, '2021-01-03'),
(5, 1, 8, 1, '2021-01-03'),
(6, 1, 11, 123, '2021-01-05'),
(7, 1, 10, 500, '2021-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `groupchats`
--

CREATE TABLE `groupchats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_01_05_055144_create_groupchats_table', 1),
(2, '0000_00_00_000000_create_websockets_statistics_entries_table', 2),
(3, '0000_00_00_000000_rename_statistics_counters', 2);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `uid` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `Address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE `personal` (
  `uid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `gender` int(1) NOT NULL,
  `Address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `recommendation`
--

CREATE TABLE `recommendation` (
  `id` int(10) NOT NULL,
  `sid` int(10) NOT NULL,
  `rid` int(10) NOT NULL,
  `cid` int(10) NOT NULL,
  `updatedDate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) NOT NULL,
  `cid` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `description` text NOT NULL,
  `updatedDate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `cid`, `uid`, `description`, `updatedDate`) VALUES
(1, 8, 1, 'this is dake', '2021-01-02'),
(2, 6, 1, 'this is not fake', '2021-01-02'),
(3, 2, 1, 'ssss', '2021-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(2000) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `type` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `provider_id` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `type`, `status`, `provider_id`) VALUES
(1, 'arshad', 'arshad.shahriar@yahoo.com', '1234', 3, 1, NULL),
(11, 'arshad shahoriar', '18-37104-1@student.aiub.edu', '1234', 3, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contactno` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`id`, `name`, `contactno`, `gender`, `address`) VALUES
(1, 'Shahoriar**', '1222', 'male', 'Rangpur,Bangladesh'),
(1, 'arshad', '1222', 'male', 'Rangpur,Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `websockets_statistics_entries`
--

CREATE TABLE `websockets_statistics_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connections_count` int(11) NOT NULL,
  `websocket_messages_count` int(11) NOT NULL,
  `api_messages_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contractadmins`
--
ALTER TABLE `contractadmins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupchats`
--
ALTER TABLE `groupchats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommendation`
--
ALTER TABLE `recommendation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contractadmins`
--
ALTER TABLE `contractadmins`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `groupchats`
--
ALTER TABLE `groupchats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recommendation`
--
ALTER TABLE `recommendation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
