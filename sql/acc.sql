-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 04:44 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acc`
--

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE `code` (
  `a_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `a_code` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `expiration` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`a_id`, `u_id`, `a_code`, `created_at`, `expiration`) VALUES
(55, 0, 515121, '2021-04-28 00:36:22', '2021-04-28 00:41:22'),
(56, 0, 347489, '2021-04-28 01:24:41', '2021-04-28 01:29:41'),
(57, 1, 736826, '2021-04-28 19:09:47', '2021-04-28 19:14:47'),
(58, 1, 714244, '2021-04-28 19:10:29', '2021-04-28 19:15:29'),
(59, 8, 786403, '2021-04-28 19:15:46', '2021-04-28 19:20:46'),
(60, 8, 276196, '2021-04-28 19:20:48', '2021-04-28 19:25:48'),
(61, 8, 781979, '2021-04-28 19:22:02', '2021-04-28 19:27:02'),
(62, 8, 407331, '2021-04-28 19:25:48', '2021-04-28 19:30:48'),
(63, 8, 481960, '2021-04-28 19:25:54', '2021-04-28 19:30:54'),
(64, 1, 639383, '2021-04-28 19:36:02', '2021-04-28 19:41:02'),
(65, 1, 431696, '2021-04-28 19:39:25', '2021-04-28 19:44:25'),
(66, 1, 368359, '2021-04-28 19:40:24', '2021-04-28 19:45:24'),
(67, 8, 820475, '2021-04-28 20:01:02', '2021-04-28 20:06:02'),
(68, 1, 652896, '2021-04-28 20:05:25', '2021-04-28 20:10:25'),
(69, 1, 583176, '2021-04-28 20:07:56', '2021-04-28 20:12:56'),
(70, 8, 507205, '2021-04-28 21:07:46', '2021-04-28 21:12:46'),
(71, 3, 742981, '2021-04-28 21:22:12', '2021-04-28 21:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `event_log`
--

CREATE TABLE `event_log` (
  `event_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `activity` varchar(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_log`
--

INSERT INTO `event_log` (`event_id`, `userid`, `activity`, `time`) VALUES
(1, 8, 'Login', '2021-04-28 11:26:01'),
(2, 1, 'Login', '2021-04-28 11:36:09'),
(3, 1, 'Logout', '2021-04-28 11:37:47'),
(4, 1, 'Logout', '2021-04-28 11:38:01'),
(5, 1, 'Login', '2021-04-28 11:39:30'),
(6, 1, 'Login', '2021-04-28 11:40:31'),
(7, 1, 'Login', '2021-04-28 11:41:20'),
(8, 1, 'Logout', '2021-04-28 11:41:22'),
(9, 8, 'Login', '2021-04-28 12:01:11'),
(10, 8, 'Logout', '2021-04-28 12:05:14'),
(11, 1, 'Login', '2021-04-28 12:05:37'),
(12, 1, 'Logout', '2021-04-28 12:07:51'),
(13, 1, 'Login', '2021-04-28 12:08:05'),
(14, 8, 'Login', '2021-04-28 13:07:59'),
(15, 8, 'Logout', '2021-04-28 13:21:21'),
(16, 3, 'Login', '2021-04-28 13:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `email`) VALUES
(1, 'ADMIN', 'ADMIN123', ''),
(3, 'gloria', 'Glominnie1!', 'ABSD@gmail.com'),
(5, 'glo', 'Glominnie1!', 'dsad@gmail.com'),
(8, 'gumanakapls', 'Password1!', 'phpizzaworks@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `event_log`
--
ALTER TABLE `event_log`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `code`
--
ALTER TABLE `code`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `event_log`
--
ALTER TABLE `event_log`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
