-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2024 at 04:55 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rabbi_fortunewheelad2`
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
  `wheel_hems_id` int(255) DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`id`, `customer_id`, `customer_name`, `customer_email`, `wheel_hems_id`, `created`) VALUES
(96087, 'A-1231', 'Mr. Aa', 'aa@gmail.com', 6, '2024-01-31 04:45:26'),
(96088, 'A-1242', 'Mr. Ba', 'ba@gmail.com', 8, '2024-01-31 04:45:26'),
(96089, 'B-1251', 'Mr. Ca', 'ca@gmail.com', 7, '2024-01-31 04:45:26'),
(96090, 'B-1261', 'Mr. Da', 'da@gmail.com', 10, '2024-01-31 04:45:26'),
(96095, 'A-123', 'Mr. A', 'a@gmail.com', 10, '2024-01-31 04:45:26'),
(96096, 'A-124', 'Mr. B', 'b@gmail.com', 4, '2024-01-31 04:45:26'),
(96097, 'B-125', 'Mr. C', 'c@gmail.com', 8, '2024-01-31 04:45:26'),
(96098, 'B-126', 'Mr. D', 'd@gmail.com', 9, '2024-01-31 04:45:26'),
(96099, 'abc-test-ash', 'ASH', 'ashsojib@gmail.com', 1, '2024-01-31 04:45:26'),
(96100, 'record-test-123', 'Mr. A Test', 'atest@gmail.com', 7, '2024-01-31 15:37:15'),
(96101, 'record-test-124', 'Mr. B Test', 'btest@gmail.com', 0, '2024-01-31 15:37:15');

-- --------------------------------------------------------

--
-- Table structure for table `wheel_hems_info`
--

CREATE TABLE `wheel_hems_info` (
  `id` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `percent` int(20) NOT NULL,
  `color_code` varchar(50) NOT NULL,
  `text_color` varchar(50) NOT NULL,
  `multiplier` int(50) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wheel_hems_info`
--

INSERT INTO `wheel_hems_info` (`id`, `name`, `details`, `image`, `percent`, `color_code`, `text_color`, `multiplier`, `status`, `created`) VALUES
(1, 'McLaren GR', 'Congratulations! You\'ve just secured the keys to the breathtaking McLaren GT, a masterpiece of speed and style. Get ready to hit the road in unparalleled luxury and performance.', 'result1.png', 0, '0xF67A3E', '0xFFFFFF', 1, 1, '2024-01-31 04:43:28'),
(2, 'Mercedes-Benz Gwagon', 'You\'re now the proud owner of the iconic Mercedes-Benz GWagon! Prepare to turn heads as you navigate both city streets and off-road adventures in this symbol of opulence and rugged elegance.', 'result2.png', 2, '0x30B676', '0xFFFFFF', 1, 1, '2024-01-31 04:43:28'),
(3, 'Audi RS 5 Coupe', 'Buckle up for exhilaration! Your prize includes the Audi RS 5 CoupÃ©, a perfect blend of performance and sophistication. Get ready to experience driving like never before.', 'result3.png', 3, '0xFFFFFF', '0x000000', 1, 1, '2024-01-31 04:43:28'),
(4, 'Hublot Blue watch', 'Time just got more luxurious! Enjoy your Hublot Big Bang Integral Blue watch, a masterpiece of precision and style. Elevate your wrist game with this timeless accessory.', 'result4.png', 5, '0xFFFFFF', '0x000000', 1, 1, '2024-01-31 04:43:28'),
(5, '10 Ounces of Gold', 'Gold rush! Your prize includes a stunning 10 ounces of pure gold, a timeless investment that adds a touch of luxury to your wealth portfolio.', 'result5.png', 5, '0xF67A3E', '0xFFFFFF', 1, 1, '2024-01-31 04:43:28'),
(6, 'iPhone 15 Pro Max', 'Upgrade alert! Unbox the latest iPhone 15 Pro Max, a cutting-edge device that combines sleek design with powerful features. Stay connected and capture moments in style.', 'result6.png', 7, '0x2EB574', '0xFFFFFF', 2, 1, '2024-01-31 04:43:28'),
(7, 'Cash Bonus 500', 'Brace yourself for a windfall! You\'ve won a whopping $500 cash bonus â€“ the perfect opportunity to make your dreams come true. Congratulations on this fantastic boost!', 'result7.png', 8, '0xFF6060', '0xFFFFFF', 1, 1, '2024-01-31 04:43:28'),
(8, 'Cash Bonus 100', 'Celebrate your win with an extra $100 in your pocket! Whether you splurge on a shopping spree or save for a special occasion, this cash bonus is your ticket to even more joy.', 'result8.png', 15, '0xC9E266', '0xFFFFFF', 1, 1, '2024-01-31 04:43:28'),
(9, 'Cash Bonus 50', 'Here\'s an extra $50 to add to your winnings! Treat yourself to something special or save it for a rainy day. Your fortune just got even brighter.', 'result8.png', 25, '0xF67A3E', '0xFFFFFF', 2, 1, '2024-01-31 04:43:28'),
(10, 'Cash Bonus 30', 'Every little bit counts! Enjoy an extra $30 in your pocket. Whether you treat yourself or share the joy, this bonus is a delightful addition to your winnings. Congratulations! ', 'result8.png', 30, '0xFFFFFF', '0x000000', 1, 1, '2024-01-31 04:43:28');

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96102;
--
-- AUTO_INCREMENT for table `wheel_hems_info`
--
ALTER TABLE `wheel_hems_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
