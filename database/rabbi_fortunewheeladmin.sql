-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 09:07 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_start`, `admin_img`) VALUES
(14, 'Mr Admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-07-20', 'default-image.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `id` int(255) NOT NULL,
  `customer_id` varchar(50) NOT NULL,
  `customer_name` varchar(70) NOT NULL,
  `wheel_hems_name` varchar(50) DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`id`, `customer_id`, `customer_name`, `wheel_hems_name`) VALUES
(5, 'B-3448', 'Anisul Islam', 'Cash Bonus 50'),
(9, 'A-34482', 'Nayeem Islam', 'No'),
(10, 'abc-test-234', 'Test Customer', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `wheel_hems_info`
--

CREATE TABLE `wheel_hems_info` (
  `id` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `details` varchar(255) NOT NULL,
  `image` varchar(50) NOT NULL,
  `percent` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wheel_hems_info`
--

INSERT INTO `wheel_hems_info` (`id`, `name`, `details`, `image`, `percent`) VALUES
(1, 'McLaren GR', 'Description Here..', 'default-image.png', 0),
(2, 'Mercedes-Benz Gwagon', 'Description Here..', 'default-image.png', 2),
(3, 'Audi RS 5 Coupe', 'Description  Here..', 'default-image.png', 3),
(4, 'Hublot Big Bang Integral Blue watch', 'Description  Here..', 'default-image.png', 5),
(5, '10 Ounces of Gold', 'Description  Here..', 'default-image.png', 5),
(6, 'Apple iPhone 15 Pro Max', 'Description  Here..', 'default-image.png', 7),
(7, 'Cash Bonus 500', 'Description  Here..', 'default-image.png', 8),
(8, 'Cash Bonus 100', 'Description  Here..', 'default-image.png', 15),
(9, 'Cash Bonus 50', 'Description  Here..', 'default-image.png', 25),
(10, 'Cash Bonus 30', 'Description  Here..', 'default-image.png', 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `wheel_hems_info`
--
ALTER TABLE `wheel_hems_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
