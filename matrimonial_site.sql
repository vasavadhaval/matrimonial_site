-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2025 at 02:44 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `razorpay_payment_id` varchar(100) NOT NULL,
  `razorpay_order_id` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `currency` varchar(10) NOT NULL DEFAULT 'INR',
  `status` enum('pending','success','failed') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `plan_price` decimal(10,2) NOT NULL,
  `plan_image` varchar(255) DEFAULT NULL,
  `plan_type` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `plan_include1` varchar(255) DEFAULT NULL,
  `plan_include2` varchar(255) DEFAULT NULL,
  `plan_include3` varchar(255) DEFAULT NULL,
  `plan_include4` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `plan_name`, `plan_price`, `plan_image`, `plan_type`, `is_active`, `plan_include1`, `plan_include2`, `plan_include3`, `plan_include4`, `created_at`, `updated_at`) VALUES
(1, 'Basic', '49.00', 'uploads/1740628057_c11.png', 'monthly', 0, 'Profile Listing', 'Limited Contact Access', 'Basic Matchmaking', 'Email Support', '2025-02-25 21:19:49', '2025-02-27 03:47:37'),
(2, 'Standard', '99.00', 'uploads/1740628044_c12.png', 'monthly', 0, 'Profile Listing', 'Unlimited Contact Access', 'Advanced Matchmaking', 'Phone Support', '2025-02-25 21:19:49', '2025-02-27 03:47:24'),
(3, 'Premium', '149.00', 'uploads/1740628030_c7.png', 'monthly', 0, 'Profile Listing & Highlight', 'Unlimited Contact Access', 'Personal Matchmaking Assistant', 'Priority Support', '2025-02-25 21:19:49', '2025-02-27 03:47:10'),
(4, 'Elite', '350.00', 'uploads/1740626192_c8.png', 'yearly', 1, 'Exclusive Profile Listing', 'Direct Contact Access', 'Dedicated Matchmaker', 'Premium Support & Counseling', '2025-02-25 21:19:49', '2025-02-27 03:18:45');

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
(1, 1, 'Josephine Rivas', 'assets/img/avatar/avatar-1.png', 'password', '1972-12-08', 'Female', 'web.dhavalvasava@gmail.com', '+1 (881) 302-7116', 323, 0, 'Brahmin', 'Doloribus incididunt', 'Sikkim', 'Tamilnadu', 'Buddhist', 'Oriya', 'Ipsum earum non des', 'Itaque deserunt est ', '394.00', 'Cupidatat numquam ha', 'Dolorem enim nihil e', 23, 423, 4234, 'Cillum sit dolore ni', 'Perferendis pariatur', 'Sunt sit similique ', 'Eum ut rem enim quas', 'sdfsdfs', 'pending', '2025-02-12 21:23:28', '2025-03-02 08:01:13'),
(14, 2, 'Rahul Sharma', 'uploads/avatar-s-1.jpg', 'hashed_password', '1995-08-15', 'Male', 'rahul.sharma@example.com', '+91 9876543210', 5.8, 70, 'Nair', 'Delhi', 'Delhi', 'Kerala', 'Hindu', 'Hindi', 'B.Tech', 'Software Engineer', '12.00', 'Businessman', 'Housewife', 1, 22, 5.2, 'Hindu', 'Kind, Hardworking, Caring', 'Reading, Cricket, Traveling', 'I am a fun-loving and career-oriented person.', 'Looking for a life partner who is understanding and supportive.', 'active', '2025-03-02 07:59:50', '2025-03-02 08:33:16'),
(15, 3, 'Pooja Iyer', 'uploads/avatar-s-4.jpg', 'hashed_password', '1997-05-22', 'Female', 'pooja.iyer@example.com', '+91 9876512345', 5.4, 58, 'Iyer', 'Chennai', 'Uttrakhand', 'Uttrakhand', 'Hindu', 'Tamil', 'MBA', 'Marketing Manager', '10.00', 'Doctor', 'Professor', 1, 25, 5.5, 'Hindu', 'Ambitious, Friendly, Confident', 'Dancing, Cooking, Music', 'I am passionate about my career and family.', 'Looking for a life partner who is well-educated and respectful.', 'active', '2025-03-02 07:59:50', '2025-03-02 08:33:19'),
(16, 2, 'Amit Patel', 'uploads/avatar-s-3.jpg', 'hashed_password', '1992-11-10', 'Male', 'amit.patel@example.com', '+91 9876509876', 5.9, 75, 'Brahmin', 'Ahmedabad', 'Tamilnadu', 'Tamilnadu', 'Hindu', 'Tamil', 'MCA', 'IT Consultant', '15.00', 'Engineer', 'Homemaker', 0, 24, 5.4, 'Hindu', 'Intelligent, Friendly, Caring', 'Gaming, Trekking, Watching Movies', 'I love technology and exploring new places.', 'Looking for a partner who shares similar values.', 'active', '2025-03-02 07:59:50', '2025-03-02 08:33:21'),
(17, 2, 'Rohan Verma', 'uploads/avatar-s-9.jpg', 'hashed_password', '1993-03-12', 'Male', 'rohan.verma@example.com', '+91 9876432109', 5.7, 72, 'Rajput', 'Mumbai', 'Rajashthan', 'Rajashthan', 'Hindu', 'Marathi', 'B.Com', 'Bank Manager', '9.00', 'Retired Govt. Officer', 'Housewife', 2, 23, 5.3, 'Hindu', 'Responsible, Optimistic, Friendly', 'Football, Traveling, Photography', 'I believe in family values and love to explore new places.', 'Looking for a simple and understanding partner.', 'active', '2025-03-02 08:00:20', '2025-03-02 08:33:24'),
(18, 3, 'Sneha Gupta', 'uploads/avatar-s-24.jpg', 'hashed_password', '1996-07-18', 'Female', 'sneha.gupta@example.com', '+91 9876123456', 5.5, 60, 'Vishwakarma', 'Kolkata', 'West Bengal', 'Uttrakhand', 'Hindu', 'Tamil', 'B.Sc', 'Doctor', '18.00', 'Doctor', 'Teacher', 1, 26, 5.6, 'Hindu', 'Compassionate, Goal-oriented, Hardworking', 'Reading, Cooking, Yoga', 'I am dedicated to my profession and love spending time with family.', 'Looking for a partner who respects career aspirations and family values.', 'pending', '2025-03-02 08:00:20', '2025-03-02 08:34:42'),
(19, 2, 'Aditya Mehta', 'uploads/avatar-s-23.jpg', 'hashed_password', '1994-02-25', 'Male', 'aditya.mehta@example.com', '+91 9876543201', 5.1, 78, 'Brahmin', 'Jaipur', 'Tamilnadu', 'Tamilnadu', 'Jain', 'Hindi', 'CA', 'Chartered Accountant', '22.00', 'Businessman', 'Homemaker', 0, 24, 5.3, 'Jain', 'Analytical, Patient, Fun-loving', 'Chess, Watching Documentaries, Gymming', 'I am a career-focused individual with a passion for learning.', 'Looking for someone who values honesty and intellectual growth.', 'active', '2025-03-02 08:00:20', '2025-03-02 08:33:28'),
(20, 3, 'Priya Nair', 'uploads/avatar-s-22.jpg', 'hashed_password', '1998-01-30', 'Female', 'priya.nair@example.com', '+91 9876567890', 5.3, 55, 'Nair', 'Bangalore', 'Gujrat', 'Odisha', 'Hindu', 'Malayalam', 'B.Tech', 'Software Developer', '14.00', 'Engineer', 'Professor', 1, 25, 5.6, 'Hindu', 'Cheerful, Ambitious, Adventurous', 'Singing, Traveling, Baking', 'I love music and exploring new cultures.', 'Looking for someone who is adventurous and supportive.', 'pending', '2025-03-02 08:00:20', '2025-03-02 08:34:57'),
(21, 2, 'Vikram Singh', 'uploads/avatar-s-13.jpg', 'hashed_password', '1990-10-05', 'Male', 'vikram.singh@example.com', '+91 9876098765', 6, 85, 'Rajput', 'Lucknow', 'Uttrakhand', 'Panjab', 'Hindu', 'Hindi', 'MBA', 'Entrepreneur', '30.00', 'Retired Army Officer', 'Social Worker', 1, 24, 5.4, 'Hindu', 'Confident, Passionate, Outgoing', 'Horse Riding, Politics, Running', 'I am an entrepreneur who loves challenges and leadership.', 'Looking for a confident and independent partner.', 'pending', '2025-03-02 08:00:20', '2025-03-02 08:35:20');

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otp_verifications`
--
ALTER TABLE `otp_verifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
