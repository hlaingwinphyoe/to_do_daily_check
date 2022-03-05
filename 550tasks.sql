-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2022 at 06:37 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `550tasks`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `task_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task_name`, `user_id`, `status`, `created_at`) VALUES
(3, 'test', 1, 0, '2022-03-04 04:17:17'),
(4, 'ဖုန်သုတ်ရန်', 1, 0, '2022-03-04 04:17:35'),
(5, 'coding', 1, 0, '2022-03-04 04:15:06'),
(6, 'တံမြက်စည်းလှဲရန်', 1, 0, '2022-03-04 04:17:17'),
(7, 'ဖုန်သုတ်ရန်', 1, 0, '2022-03-04 04:17:35'),
(8, 'coding time', 1, 0, '2022-03-04 04:15:06'),
(9, 'တံမြက်စည်းလှဲရန်', 1, 0, '2022-03-04 04:17:17'),
(10, 'ဖုန်သုတ်ရန်', 1, 0, '2022-03-04 04:17:35'),
(11, 'coding time', 1, 0, '2022-03-04 04:15:06'),
(12, 'တံမြက်စည်းလှဲရန်', 1, 0, '2022-03-04 04:17:17'),
(13, 'ဖုန်သုတ်ရန်', 1, 0, '2022-03-04 04:17:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `role`, `photo`, `created_at`) VALUES
(1, 'Hlaing Win Phyoe', 787754879, 'hlaingwinphyoedev@gmail.com', '$2y$10$banfokTLB1UEMbS/t3Uxxeuux344MHvGBuQuV0JqQj7Wb7sPStLpC', '0', 'default.png', '2022-02-26 13:27:34'),
(4, 'Test Test', 2147483647, 'kk@gmail.com', '$2y$10$lICk9nZ/2x4uuEXZEwljEufBzztV/15NumHY2wovMxZhIelCtVIh.', '1', 'default.png', '2022-03-04 04:46:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
