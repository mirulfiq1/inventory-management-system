-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2024 at 03:24 PM
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
-- Database: `inventory_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(4, 'Binder Items'),
(3, 'Envelopes and Boxes'),
(12, 'FILE'),
(6, 'Filing cabinets'),
(5, 'Notebooks and Notepads'),
(2, 'Office/Student Storage'),
(1, 'Paper'),
(8, 'Small Office/Student Supplies'),
(9, 'Writing Implements');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `file_name`, `file_type`) VALUES
(7, 'pen pilot.png', 'image/png'),
(8, 'HIGH-CLASS-PLASTIC-STRAIGHT-RULER-6-15CM.jpg', 'image/jpeg'),
(9, 'sharpie.jpg', 'image/jpeg'),
(10, 'artline.jpg', 'image/jpeg'),
(11, 'BUNCHO WATER COLOUR.jpg', 'image/jpeg'),
(13, 'faber castell.jpg', 'image/jpeg'),
(14, 'images (1).jpeg', 'image/jpeg'),
(15, 'color-desktop-wallpaper-11.jpg', 'image/jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `buy_price` decimal(25,2) DEFAULT NULL,
  `sale_price` decimal(25,2) NOT NULL,
  `categorie_id` int(11) UNSIGNED NOT NULL,
  `media_id` int(11) DEFAULT 0,
  `date` datetime NOT NULL,
  `barcode` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `buy_price`, `sale_price`, `categorie_id`, `media_id`, `date`, `barcode`) VALUES
(14, 'A4 paper 70gsm (500s)', '200', 10.00, 15.00, 1, 7, '2024-06-11 15:22:36', 5901234123419),
(15, 'A4 paper 80gsm (500s)', '141', 15.00, 20.00, 1, 10, '2024-06-11 15:24:04', 590123412342),
(16, 'Three-hole-punched paper', '129', 13.00, 16.00, 1, 4, '2024-06-11 15:24:54', 590123412343),
(17, 'Graph paper', '150', 5.00, 7.00, 1, 3, '2024-06-11 15:25:29', 590123412344),
(18, 'Tracing paper ', '125', 8.00, 11.00, 1, 3, '2024-06-11 15:27:20', 590123412345),
(19, 'Legal envelopes', '130', 6.00, 9.00, 3, 5, '2024-06-11 15:28:04', 590123412346),
(20, 'Padded legal envelope mailers', '123', 5.00, 8.00, 3, 4, '2024-06-11 15:28:49', 590123412347),
(21, 'Postage stamps', '480', 2.00, 3.00, 3, 5, '2024-06-11 15:32:15', 590123412348),
(22, 'Envelope sealer', '270', 2.00, 4.00, 3, 4, '2024-06-11 15:35:59', 590123412349),
(23, 'Cardboard boxes small', '250', 4.00, 6.00, 3, 3, '2024-06-11 15:36:44', 590123412331),
(24, 'Cardboard boxes medium', '150', 5.00, 8.00, 3, 5, '2024-06-11 15:37:04', 590123412332),
(25, 'Cardboard boxes large', '145', 6.00, 9.00, 3, 3, '2024-06-11 15:37:23', 590123412333),
(26, 'Composition notebooks', '350', 5.00, 7.00, 5, 4, '2024-06-11 15:37:56', 590123412334),
(27, 'Spiral-bound notebooks', '150', 6.00, 8.00, 5, 5, '2024-06-11 15:38:20', 590123412335),
(28, 'Legal pads', '150', 3.00, 5.00, 5, 3, '2024-06-11 15:38:39', 590123412336),
(29, 'Binders', '141', 4.00, 7.00, 4, 4, '2024-06-11 15:40:21', 590123412337),
(30, 'Binder tabs', '100', 6.00, 7.00, 4, 3, '2024-06-11 15:40:44', 590123412338),
(36, '324324', '213', 123.00, 213.00, 4, 5, '2024-07-11 08:26:25', 4353325345),
(37, 'Kertas Putih', '4', 3.00, 5.00, 4, 10, '2024-07-11 12:44:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `qty`, `price`, `date`) VALUES
(31, 30, 13, 91.00, '2024-07-11'),
(33, 14, 10, 150.00, '2024-07-11'),
(37, 15, 6, 120.00, '2024-07-11'),
(38, 14, 15, 225.00, '2024-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_level`, `image`, `status`, `last_login`, `email`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(1, 'Ahmad Nazrin', 'Admin', '5312fc1ccea2b8f2f971496ecd81153393544030', 1, 'p78tc8px1.png', 1, '2024-07-23 15:25:58', 'mfiq3142@gmail.com', NULL, NULL),
(2, 'John Walker', 'special', 'ba36b97a41e7faf742ab09bf88405ac04f99599a', 2, 'no_image.png', 1, '2024-07-20 00:56:42', '2022815472@student.uitm.edu.my', NULL, NULL),
(3, 'Christopher', 'user', '12dea96fec20593566ab75692c9949596833adc9', 3, 'no_image.png', 1, '2024-07-23 15:08:48', 'fiqm3142@gmail.com', NULL, NULL),
(5, 'Kevin', 'kevin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 3, 'no_image.png', 1, '2021-04-04 19:54:29', 'gamersx9999@gmail.com', NULL, NULL),
(29, 'naz', 'seulgga', '82e19fa12aab7cfc718a002fc82c0f074bf070e7', 1, 'hvkno3y029.jpeg', 1, '2024-07-11 12:30:40', 'annazrin317@gmail.com', NULL, NULL),
(30, 'trrh', 'dgfg', 'b2c00df138c30d5550c9f453478d4debf841b50f', 1, 'no_image.jpg', 1, NULL, '2022815472@isiswa.uitm.edu.my', 'b4593c6b46a02c0b37848d032b5db1b51031d290', '2024-07-23 09:53:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `group_level`, `group_status`) VALUES
(1, 'Admin', 1, 1),
(2, 'special', 2, 1),
(3, 'User', 3, 1),
(4, 'aaa', 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `categorie_id` (`categorie_id`),
  ADD KEY `media_id` (`media_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`),
  ADD KEY `user_level` (`user_level`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_level` (`group_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `SK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`group_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
