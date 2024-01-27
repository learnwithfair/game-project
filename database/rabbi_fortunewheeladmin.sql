-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2024 at 05:33 PM
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
-- Database: `rabbi_fortunewheeladmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int(255) NOT NULL,
  `admin_name` text NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_start` date DEFAULT NULL,
  `admin_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_start`, `admin_img`) VALUES
(14, 'MD RAHATUL RABBI', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-07-20', 'default-image.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `id` int(255) NOT NULL,
  `customer_id` varchar(50) NOT NULL,
  `customer_name` varchar(70) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `wheel_hems_id` int(255) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`id`, `customer_id`, `customer_name`, `customer_email`, `wheel_hems_id`) VALUES
(96074, 'A-123', 'Mr. A', 'a@gmail.com', 0),
(96075, 'A-124', 'Mr. B', 'b@gmail.com', 9),
(96076, 'B-125', 'Mr. C', 'c@gmail.com', 0),
(96077, 'B-126', 'Mr. D', 'd@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wheel_hems_info`
--

CREATE TABLE `wheel_hems_info` (
  `id` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `details` varchar(255) NOT NULL,
  `image` varchar(50) NOT NULL,
  `percent` int(20) NOT NULL,
  `color_code` varchar(50) NOT NULL,
  `multiplier` int(50) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wheel_hems_info`
--

INSERT INTO `wheel_hems_info` (`id`, `name`, `details`, `image`, `percent`, `color_code`, `multiplier`, `status`) VALUES
(1, 'McLaren GR', 'Description Here..', 'default-image.png', 0, '#FF22', 1, 1),
(2, 'Mercedes-Benz Gwagon', 'Description Here..', 'face16.jpg', 2, '#FF22', 1, 1),
(3, 'Audi RS 5 Coupe', 'Description  Here..', 'face21.jpg', 3, '#FFFFFF', 1, 1),
(4, 'Hublot Big Bang Integral Blue watch', 'Description  Here..', 'default-image.png', 5, '#FF22', 1, 0),
(5, '10 Ounces of Gold', 'Description  Here..', 'default-image.png', 5, '#FF22', 1, 0),
(6, 'Apple iPhone 15 Pro Max', 'Description  Here..', 'default-image.png', 7, '#FF22', 2, 0),
(7, 'Cash Bonus 500', 'Description  Here..', 'default-image.png', 8, '#FF22', 1, 1),
(8, 'Cash Bonus 100', 'Description  Here..', 'default-image.png', 15, '#FF22', 1, 1),
(9, 'Cash Bonus 50', 'Description  Here..', 'default-image.png', 25, '#FF22', 1, 1),
(10, 'Cash Bonus 30', 'Description  Here..', 'default-image.png', 30, '#FF22', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_email` (`customer_email`);

--
-- Indexes for table `wheel_hems_info`
--
ALTER TABLE `wheel_hems_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96083;

--
-- AUTO_INCREMENT for table `wheel_hems_info`
--
ALTER TABLE `wheel_hems_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
