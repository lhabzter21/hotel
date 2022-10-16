-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2022 at 02:31 PM
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
-- Database: `facial_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(30) NOT NULL,
  `customer_id` int(30) NOT NULL,
  `services_id` int(30) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0 COMMENT '0 = pending, 1 = on going, 2 = done',
  `appointment_date` date DEFAULT NULL,
  `from_time` time DEFAULT NULL,
  `to_time` time DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `customer_id`, `services_id`, `status`, `appointment_date`, `from_time`, `to_time`, `created_at`) VALUES
(2, 1, 8, 1, '2022-10-19', NULL, NULL, '2022-10-10 22:35:54'),
(3, 3, 10, 2, '2022-10-20', NULL, NULL, '2022-10-10 23:09:09'),
(7, 6, 2, 0, '2022-10-28', '08:20:00', '09:33:00', '2022-10-16 06:31:08'),
(8, 12, 14, 2, '2022-10-28', '15:44:00', '15:44:00', '2022-10-16 14:43:45'),
(9, 5, NULL, 0, '2022-10-18', '09:38:00', '12:33:00', '2022-10-16 18:29:26'),
(10, 5, NULL, 0, '2022-10-24', '09:39:00', '10:40:00', '2022-10-16 18:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img_path` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `img_path`, `created_at`) VALUES
(1, 'Face', NULL, '2022-10-10 21:10:31'),
(2, 'Body', NULL, '2022-10-10 21:10:31'),
(3, 'Skin', NULL, '2022-10-10 21:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(30) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact_num` varchar(100) NOT NULL,
  `address` longtext NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `profile_img` longtext DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `username`, `password`, `contact_num`, `address`, `email`, `gender`, `profile_img`, `deleted_at`, `created_at`) VALUES
(1, 'Ichigo', 'Kurosaki', 'getsugatensho', 'werwerwer', '345345345', 'soul society', 'bankai@gmail.com', 'Male', '1665922860_New Project.png', NULL, '2022-10-08 17:48:32'),
(2, 'jayson', 'smith', 'test2', 'test123', '43435345', 'sdfsdf', 'sdfsdfsdf', 'Male', NULL, '2022-10-15 09:26:54', '2022-10-08 19:49:01'),
(3, 'Luffy', 'Monkey', 'onepiece', '345345345', '345675667', 'grandline', 'luffy@yahoo.com', 'Male', '1665923267_mega_win.jpg', NULL, '2022-10-10 20:11:50'),
(5, 'test', 'test', 'test', 'test123', '345345345', 'asdasd', 'test@gmail.com', 'Female', NULL, '2022-10-15 15:16:41', '2022-10-15 14:46:40'),
(6, 'John', 'Smith', 'smith123', 'wer123', '02539521', 'lemery', 'smith@hotmail.com', 'Male', NULL, NULL, '2022-10-16 06:29:47'),
(11, 'lorem', 'ipsum', 'werwerwer', '435345345345', '34534534', 'MCM', 'jerome.marketingcrossmedia@gmail.com', 'Female', NULL, '2022-10-16 03:31:30', '2022-10-16 09:29:53'),
(12, 'Anya', 'Foger', 'spyxfamily', 'spy1234', '123456', 'calaca, batangas', 'anya.foger@gmail.com', 'Female', '1665923409_incomes_overview_graph_label.png', NULL, '2022-10-16 13:03:36'),
(15, 'erterte', 'terter', 't56456456', 'ertertert', '456456456', 'MCM', 'jerome.marketingcrossmedia@gmail.com', 'Male', '1665922200_1664437860_treatment 2.jpg', '2022-10-16 14:29:46', '2022-10-16 20:10:28'),
(16, 'yyyyyyyy', 'yyyyyyyyyy', 'yyyyy', 'yyyyyyyyyyy', '7677777', 'MCM', 'jerome.marketingcrossmedia@gmail.com', 'Female', '1665922800_favicon.png', '2022-10-16 14:21:03', '2022-10-16 20:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(30) NOT NULL,
  `customer_id` int(30) NOT NULL,
  `comment` longtext NOT NULL,
  `rating` int(5) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `customer_id`, `comment`, `rating`, `created_at`) VALUES
(1, 1, 'rerum! Provident similique accusantium nemo autem. Veritatis\nobcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam\nnihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,\ntenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit', 4, '2022-10-10 22:34:46'),
(2, 3, 'Renowned for their pan- African presence and with a reputation for delivering world-class Digital CustorT \nExperience and Technology Services, DSC\'s impact sourcing solution, in partnership with the Maharishi \nInstitute drives the education and skills development of South Africa\'s youth workforce while simultaneol \nreduchg youth unemployment, a glaring concern in the country', 3, '2022-10-10 22:34:46');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `description` longtext DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = Available , 1= Unavailable',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `category_id`, `status`, `created_at`) VALUES
(1, 'Antibiotic Cream', 330, NULL, 1, 0, '2022-10-10 21:28:55'),
(2, 'Basic Pimple Treament Set', 1699, NULL, 1, 0, '2022-10-10 21:28:55'),
(3, 'Pimple Solution', 707.13, '125ml', 1, 0, '2022-10-10 21:28:55'),
(4, 'Moisturizing Soap ', 199, NULL, 1, 0, '2022-10-10 21:28:55'),
(6, 'Silicon Face Cleansing', 40, '40 pcs per pack', 1, 0, '2022-10-16 07:51:44');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `description` longtext DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `img_path` longtext DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `price`, `description`, `category_id`, `img_path`, `deleted_at`, `created_at`) VALUES
(1, 'Facial', 210, NULL, 1, NULL, NULL, '2022-10-10 21:04:43'),
(2, 'Diamond Peel', 999, NULL, 1, NULL, NULL, '2022-10-10 21:04:43'),
(3, 'Warts Removal', 500, NULL, 1, NULL, NULL, '2022-10-10 21:04:43'),
(4, 'Massage', 375, NULL, 2, NULL, NULL, '2022-10-10 21:04:43'),
(5, 'Body Scrub', 949, NULL, 2, NULL, NULL, '2022-10-10 21:04:43'),
(6, 'Foot Spa ', 350, NULL, 2, NULL, NULL, '2022-10-10 21:04:43'),
(7, 'Manicure', 100, NULL, 2, NULL, NULL, '2022-10-10 21:04:43'),
(8, 'Pedicure', 120, NULL, 2, NULL, NULL, '2022-10-10 21:04:43'),
(9, 'Bikini  Wax', 400, NULL, 2, NULL, NULL, '2022-10-10 21:04:43'),
(10, 'Hand Paraffin', 380, NULL, 2, NULL, NULL, '2022-10-10 21:04:43'),
(11, 'Foot Paraffin', 380, NULL, 2, NULL, NULL, '2022-10-10 21:04:43'),
(12, 'Arm wax(whole)', 500, NULL, 3, NULL, NULL, '2022-10-10 21:04:43'),
(13, 'Arm wax(half)', 250, NULL, 3, NULL, NULL, '2022-10-10 21:04:43'),
(14, 'Arm pit wax', 300, NULL, 3, NULL, NULL, '2022-10-10 21:04:43'),
(15, 'Leg wax(whole)', 700, NULL, 3, NULL, NULL, '2022-10-10 21:04:43'),
(16, 'Leg wax(half)', 350, NULL, 3, NULL, NULL, '2022-10-10 21:04:43'),
(17, 'Arm scrub', 200, NULL, 3, NULL, NULL, '2022-10-10 21:04:43'),
(18, 'Back scrub', 200, NULL, 3, NULL, NULL, '2022-10-10 21:04:43'),
(19, 'Foot scrub', 200, NULL, 3, NULL, NULL, '2022-10-10 21:04:43'),
(25, 'One piece', 600, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis', 1, '1665875820_New Project.png', NULL, '2022-10-15 19:15:05'),
(28, 'test', 45, '', 1, '1665902820_1600480740_3.jpg', NULL, '2022-10-16 14:47:39');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `hotel_name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `hotel_name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'The Executive Facial Cares', 'info@sample.com', '+6948 8542 623', '1665903000_3.jpg', '<p style=\"background: transparent; position: relative; text-align: left;\"><span style=\"text-align: center; background: transparent; position: relative;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=admin , 2 = staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Administrator', 'admin', 'admin123', 1),
(6, 'test', 'test', 'test', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
