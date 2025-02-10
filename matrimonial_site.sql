-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2025 at 12:57 AM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
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
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `profile_img`, `password`, `dob`, `gender`, `email`, `phone_no`, `height`, `weight`, `cast`, `place_of_birth`, `state`, `city`, `religion`, `mother_tongue`, `education`, `occupation`, `income`, `father_occupation`, `mother_occupation`, `siblings`, `partner_age`, `partner_height`, `partner_religion`, `personality_traits`, `hobbies`, `about_me`, `what_are_you_looking_for`, `status`) VALUES
(1, 'Josephine Rivas', 'uploads/w2.jpg', 'admin@gmail.com', '1972-12-08', 'Female', 'admin@gmail.com', '+1 (881) 302-7116', 323, 0, 'Brahmin', 'Doloribus incididunt', 'Sikkim', 'Tamilnadu', 'Buddhist', 'Oriya', 'Ipsum earum non des', 'Itaque deserunt est ', 394.00, 'Cupidatat numquam ha', 'Dolorem enim nihil e', 23, 423, 4234, 'Cillum sit dolore ni', 'Perferendis pariatur', 'Sunt sit similique ', 'Eum ut rem enim quas', 'sdfsdfs', 'pending'),
(2, 'Aidan Hawkins', 'assets/img/avatar/avatar-1.png', 'dhaval', NULL, NULL, 'jotuvy@mailinator.com', '+1 (696) 491-5341', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending'),
(3, 'Melanie Richardson', 'assets/img/avatar/avatar-1.png', 'Pa$$w0rd!', NULL, NULL, 'xasax@mailinator.com', '+1 (697) 547-2926', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending'),
(4, 'Lunea Ross', 'assets/img/avatar/avatar-1.png', 'Pa$$w0rd!', NULL, NULL, 'sahowyjeb@mailinator.com', '+1 (755) 812-7755', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending'),
(5, 'Dana Hansen', 'assets/img/avatar/avatar-1.png', 'Pa$$w0rd!', NULL, NULL, 'kosonede@mailinator.com', '+1 (716) 384-6642', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending'),
(6, 'Kitra Brown', 'assets/img/avatar/avatar-1.png', 'xinol@mailinator.com', NULL, NULL, 'xinol@mailinator.com', '+1 (124) 594-3143', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending'),
(7, 'Winter Harrison', 'assets/img/avatar/avatar-1.png', 'qimozylan@mailinator.com', NULL, NULL, 'qimozylan@mailinator.com', '+1 (213) 678-2273', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
