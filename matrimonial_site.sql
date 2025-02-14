-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2025 at 04:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matrimonial_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `otp_verifications`
--

CREATE TABLE `otp_verifications` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `expires_at` timestamp NOT NULL DEFAULT (current_timestamp() + interval 10 minute)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otp_verifications`
--

INSERT INTO `otp_verifications` (`id`, `email`, `otp`, `created_at`, `expires_at`) VALUES
(1, 'vasavadhaval1149@gmail.com', '419692', '2025-02-12 22:32:16', '2025-02-12 22:42:16'),
(2, 'vasavadhaval1149@gmail.com', '476272', '2025-02-13 00:33:09', '2025-02-13 00:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `role_slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `role_slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '2025-02-12 21:24:31', '2025-02-12 21:24:31'),
(2, 'User', 'user', '2025-02-12 21:24:31', '2025-02-12 21:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `full_name` varchar(255) DEFAULT NULL,
  `profile_img` varchar(255) NOT NULL DEFAULT 'assets/img/avatar/avatar-1.png',
  `password` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `height` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `cast` varchar(255) DEFAULT NULL,
  `place_of_birth` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `mother_tongue` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `income` decimal(10,2) DEFAULT NULL,
  `father_occupation` varchar(255) DEFAULT NULL,
  `mother_occupation` varchar(255) DEFAULT NULL,
  `siblings` int(11) DEFAULT NULL,
  `partner_age` int(11) DEFAULT NULL,
  `partner_height` float DEFAULT NULL,
  `partner_religion` varchar(255) DEFAULT NULL,
  `personality_traits` text DEFAULT NULL,
  `hobbies` text DEFAULT NULL,
  `about_me` text DEFAULT NULL,
  `what_are_you_looking_for` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `full_name`, `profile_img`, `password`, `dob`, `gender`, `email`, `phone_no`, `height`, `weight`, `cast`, `place_of_birth`, `state`, `city`, `religion`, `mother_tongue`, `education`, `occupation`, `income`, `father_occupation`, `mother_occupation`, `siblings`, `partner_age`, `partner_height`, `partner_religion`, `personality_traits`, `hobbies`, `about_me`, `what_are_you_looking_for`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Josephine Rivas', 'uploads/w2.jpg', 'admin@gmail.com', '1972-12-08', 'Female', 'admin@gmail.com', '+1 (881) 302-7116', 323, 0, 'Brahmin', 'Doloribus incididunt', 'Sikkim', 'Tamilnadu', 'Buddhist', 'Oriya', 'Ipsum earum non des', 'Itaque deserunt est ', 394.00, 'Cupidatat numquam ha', 'Dolorem enim nihil e', 23, 423, 4234, 'Cillum sit dolore ni', 'Perferendis pariatur', 'Sunt sit similique ', 'Eum ut rem enim quas', 'sdfsdfs', 'pending', '2025-02-12 21:23:28', '2025-02-12 21:23:28'),
(2, 2, 'Aidan Hawkins', 'assets/img/avatar/avatar-1.png', 'dhaval', NULL, NULL, 'jotuvy@mailinator.com', '+1 (696) 491-5341', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-02-12 21:23:28', '2025-02-12 21:23:28'),
(3, 2, 'Melanie Richardson', 'assets/img/avatar/avatar-1.png', 'Pa$$w0rd!', NULL, NULL, 'xasax@mailinator.com', '+1 (697) 547-2926', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-02-12 21:23:28', '2025-02-12 21:23:28'),
(4, 2, 'Lunea Ross', 'assets/img/avatar/avatar-1.png', 'Pa$$w0rd!', NULL, NULL, 'sahowyjeb@mailinator.com', '+1 (755) 812-7755', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-02-12 21:23:28', '2025-02-12 21:23:28'),
(5, 2, 'Dana Hansen', 'assets/img/avatar/avatar-1.png', 'Pa$$w0rd!', NULL, NULL, 'kosonede@mailinator.com', '+1 (716) 384-6642', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-02-12 21:23:28', '2025-02-12 21:23:28'),
(6, 2, 'Kitra Brown', 'assets/img/avatar/avatar-1.png', 'xinol@mailinator.com', NULL, NULL, 'xinol@mailinator.com', '+1 (124) 594-3143', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-02-12 21:23:28', '2025-02-12 21:23:28'),
(7, 2, 'Winter Harrison', 'assets/img/avatar/avatar-1.png', 'qimozylan@mailinator.com', NULL, NULL, 'qimozylan@mailinator.com', '+1 (213) 678-2273', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-02-12 21:23:28', '2025-02-12 21:23:28'),
(8, 2, 'Dhaval', 'assets/img/avatar/avatar-1.png', 'Dhaval', '1972-10-05', 'Male', 'vasavadhaval1149@gmail.com', '+1 (939) 533-7437', 0, 0, 'Chavra', 'Deleniti cumque qui ', 'Odisha', 'Arunachal pradesh', 'Hindu', 'Kannada', 'Ut sed mollit quia i', 'Quis et porro sed al', 561.00, 'Et dolor voluptates ', 'Exercitation sed pla', 0, 0, 0, 'Laboriosam optio i', 'Aliquip asperiores e', 'Fuga Veniam est i', 'Vel dolore molestiae', 'Eaque in sit laboris', 'pending', '2025-02-12 22:29:45', '2025-02-13 00:38:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `otp_verifications`
--
ALTER TABLE `otp_verifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_name` (`role_name`),
  ADD UNIQUE KEY `role_slug` (`role_slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `otp_verifications`
--
ALTER TABLE `otp_verifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
