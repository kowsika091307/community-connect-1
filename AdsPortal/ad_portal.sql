-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2025 at 11:20 AM
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
-- Database: `ad_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `ad_dimension` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `cate` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `img` varchar(250) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT current_timestamp(),
  `tid` varchar(20) DEFAULT NULL,
  `flags` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `user_id`, `title`, `description`, `ad_dimension`, `price`, `status`, `cate`, `created_at`, `img`, `doe`, `tid`, `flags`) VALUES
(8, 4, 'DSFDFD', 'DVDVSDV', '2', 600.00, 'approved', '1', '2025-09-12 08:48:48', '17576669287469photo.jpeg', '2025-09-22 18:30:00', '121315445', 0),
(9, 4, 'tyey', 'rryery', '1', 150.00, 'pending', '1', '2025-09-12 08:58:24', '17576675051685download.jpg', '2025-09-24 18:30:00', '548745', 0),
(10, 3, 'tyey', 'dfsdf', '2', 600.00, 'approved', '1', '2025-09-12 09:13:19', '17576684009879WhatsAppImage2025-07-22at10.20.16PM1.jpeg', '2025-10-12 18:30:00', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `sno` int(11) NOT NULL,
  `cname` varchar(20) NOT NULL,
  `descc` varchar(250) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`sno`, `cname`, `descc`, `created_date`) VALUES
(1, 'hotel', 'hotel offers', '2025-09-12 08:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `dimension`
--

CREATE TABLE `dimension` (
  `sno` int(11) NOT NULL,
  `dimn` varchar(20) NOT NULL,
  `uom` varchar(10) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dimenson`
--

CREATE TABLE `dimenson` (
  `sno` int(11) NOT NULL,
  `dimn` varchar(20) NOT NULL,
  `uom` varchar(10) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dimenson`
--

INSERT INTO `dimenson` (`sno`, `dimn`, `uom`, `price`) VALUES
(1, '3', 'days', 150),
(2, '30', 'days', 600);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `sno` int(11) NOT NULL,
  `adid` int(11) NOT NULL,
  `tags` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`sno`, `adid`, `tags`) VALUES
(1, 7, 'FB'),
(2, 8, 'DSVSDV'),
(3, 9, 'rg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `addr` varchar(250) NOT NULL,
  `role` enum('admin','vendor') DEFAULT 'vendor',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`, `city`, `addr`, `role`, `created_at`) VALUES
(1, 'john jose', 'jose@gmail.com', '$2y$10$RZ69CNDzNmFYuKTwCflesOQngs.qBIPdwSxfb8.SoTkAantlnQMWC', '6374545878', '', '', 'vendor', '2025-09-10 05:41:43'),
(2, 'jeya brindha', 'brindha@gmail.com', '$2y$10$RZ69CNDzNmFYuKTwCflesOQngs.qBIPdwSxfb8.SoTkAantlnQMWC', '98797898', '221 Kulalar Street\r\nSrivilliputtur', '221 Kulalar Street\r\nSrivilliputtur', 'vendor', '2025-09-08 16:04:30'),
(3, 'admin', 'admin@gmail.com', '$2y$10$RZ69CNDzNmFYuKTwCflesOQngs.qBIPdwSxfb8.SoTkAantlnQMWC', '6374545878', 'Madurai', '12, east street, madurai', 'admin', '2024-12-11 07:39:19'),
(4, 'rahul p ram', 'rahul@gmail.com', '$2y$10$l/TjTwTnbCHxm5A0cC/nleo/MScz5Dr/W6pnAbBSzxWCSHHzL7x3.', '0908070007', 'south street  chennsai', 'south street  chennsai', 'vendor', '2025-09-12 07:09:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `dimenson`
--
ALTER TABLE `dimenson`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dimenson`
--
ALTER TABLE `dimenson`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `ads_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



