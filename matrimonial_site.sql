-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2025 at 03:39 AM
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
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'Dhaval', 'vasavadhaval1149@gmail.com', 'This is For test', 'HEy this is For test', '2025-02-22 22:57:12'),
(2, 'Dhaval', 'vasavadhaval1149@gmail.com', 'This is For test', 'HEy this is For test', '2025-02-22 22:57:22'),
(3, 'Dhaval', 'vasavadhaval1149@gmail.com', 'This is For test', 'HEy this is For test', '2025-02-22 22:57:34'),
(4, 'Dhaval', 'vasavadhaval1149@gmail.com', 'This is For test', 'dgdfgdf', '2025-02-22 22:58:31'),
(5, 'Dhaval', 'vasavadhaval1149@gmail.com', 'This is For test', 'fghfghfghfghfghfghfghfgh', '2025-02-23 00:43:23'),
(6, 'Dhaval', 'vasavadhaval1149@gmail.com', 'This is For test', 'rtyrtyrty', '2025-02-23 01:05:30'),
(7, 'Dhaval', 'vasavadhaval1149@gmail.com', 'This is For test', 'dtffg', '2025-02-23 01:06:38'),
(8, 'Dhaval', 'vasavadhaval1149@gmail.com', 'This is For test', 'werwerwer', '2025-02-23 01:07:11');

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

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 1, 'Josephine Rivas', 'uploads/w2.jpg', 'admin@gmail.com', '1972-12-08', 'Female', 'admin@gmail.com', '+1 (881) 302-7116', 323, 0, 'Brahmin', 'Doloribus incididunt', 'Sikkim', 'Tamilnadu', 'Buddhist', 'Oriya', 'Ipsum earum non des', 'Itaque deserunt est ', 394.00, 'Cupidatat numquam ha', 'Dolorem enim nihil e', 23, 423, 4234, 'Cillum sit dolore ni', 'Perferendis pariatur', 'Sunt sit similique ', 'Eum ut rem enim quas', 'sdfsdfs', 'pending', '2025-02-12 21:23:28', '2025-02-24 02:39:05'),
(2, 2, 'Aidan Hawkins', 'assets/img/avatar/avatar-1.png', 'dhaval', '2025-02-18', 'Other', 'jotuvy@mailinator.com', '+1 (696) 491-5341', 0, 0, 'Rajput', 're trhrty', 'Assam', 'Meghalaya', 'Jain', 'Sindhi', '4b rwe', 'ywrtybw', 0.00, 'ywryw rywry', 'wbywr', 0, 453, 456456000, '635635', 'fghfghfg', 'fgh', '4564564', '456456453brteyryn', 'pending', '2025-02-12 21:23:28', '2025-02-24 02:07:02'),
(4, 2, 'Lunea Ross', 'assets/img/avatar/avatar-1.png', 'Pa$$w0rd!', NULL, NULL, 'sahowyjeb@mailinator.com', '+1 (755) 812-7755', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rejected', '2025-02-12 21:23:28', '2025-02-23 21:36:42'),
(5, 2, 'Dana Hansen', 'assets/img/avatar/avatar-1.png', 'Pa$$w0rd!', NULL, NULL, 'kosonede@mailinator.com', '+1 (716) 384-6642', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-02-12 21:23:28', '2025-02-12 21:23:28'),
(6, 2, 'Kitra Brown', 'assets/img/avatar/avatar-1.png', 'xinol@mailinator.com', NULL, NULL, 'xinol@mailinator.com', '+1 (124) 594-3143', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-02-12 21:23:28', '2025-02-12 21:23:28'),
(7, 2, 'Winter Harrison', 'assets/img/avatar/avatar-1.png', 'qimozylan@mailinator.com', NULL, NULL, 'qimozylan@mailinator.com', '+1 (213) 678-2273', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2025-02-12 21:23:28', '2025-02-12 21:23:28'),
(8, 2, 'Dhaval', 'uploads/cast8.jpg', '', '1972-10-05', 'Male', 'vasavadhaval1149@gmail.com', '+1 (939) 533-7437', 0, 0, 'Chaurasia', 'Deleniti cumque qui 234234', 'Sikkim', 'West Bengal', 'Hindu', 'Hariyani', 'Ut sed mollit quia i23423423423', 'Quis et porro sed al234234234', 561.00, 'Et dolor voluptates3234234234 ', 'Exercitation sed pla', 23, 23, 2323, 'Laboriosam optio i2 2342342', 'Aliquip a2speriores234 e2342342234', 'Fuga Veniam est i2342342', 'Vel dolore molestiae234234234', 'Eaque in sit laboris234234234234243234', 'pending', '2025-02-12 22:29:45', '2025-02-24 02:32:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp_verifications`
--
ALTER TABLE `otp_verifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
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
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `otp_verifications`
--
ALTER TABLE `otp_verifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
