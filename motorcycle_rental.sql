-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2022 at 11:35 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `motorcycle_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `book_id` int(11) NOT NULL,
  `book_date` datetime NOT NULL,
  `book_motor_id` int(15) NOT NULL,
  `book_mul` double NOT NULL,
  `book_status` int(10) NOT NULL DEFAULT 0,
  `book_ticket` varchar(8) NOT NULL,
  `book_user_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`book_id`, `book_date`, `book_motor_id`, `book_mul`, `book_status`, `book_ticket`, `book_user_id`) VALUES
(13, '2022-08-20 00:00:00', 9, 4, 2, 'l72a6egu', 42),
(14, '2022-08-22 00:00:00', 9, 3, 2, 'R5LTwnrx', 34),
(15, '2022-08-25 00:00:00', 10, 5, 2, 'ofMbZqtF', 43);

-- --------------------------------------------------------

--
-- Table structure for table `motorcycles`
--

CREATE TABLE `motorcycles` (
  `motor_id` int(15) NOT NULL,
  `motor_brand` varchar(30) NOT NULL,
  `motor_model` varchar(30) NOT NULL,
  `motor_year` int(11) NOT NULL,
  `motor_type` varchar(11) NOT NULL,
  `motor_displacement` varchar(11) NOT NULL,
  `motor_mileage` int(11) NOT NULL,
  `motor_rate_type` varchar(10) NOT NULL,
  `motor_rate` double NOT NULL,
  `motor_pic` varchar(60) NOT NULL DEFAULT 'default.jpg',
  `motor_location` varchar(60) NOT NULL,
  `motor_date_reg` datetime NOT NULL DEFAULT current_timestamp(),
  `motor_status` int(10) NOT NULL DEFAULT 1,
  `motor_owner` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `motorcycles`
--

INSERT INTO `motorcycles` (`motor_id`, `motor_brand`, `motor_model`, `motor_year`, `motor_type`, `motor_displacement`, `motor_mileage`, `motor_rate_type`, `motor_rate`, `motor_pic`, `motor_location`, `motor_date_reg`, `motor_status`, `motor_owner`) VALUES
(9, 'Yamaha', 'XSR', 2012, 'Automatic', '150 CC', 0, 'hour', 12, '9.jpg', 'Cebu City', '2022-08-19 03:00:16', 1, 0),
(10, 'Honda', 'XRM', 2013, 'Manual', '125 CC', 120, 'day', 150, '10.JPG', 'Sagbayan, Bohol', '2022-08-19 03:02:25', 1, 0),
(11, 'Rusi', 'Rusi', 2013, 'Automatic', '150 cc', 120, 'hour', 100, '11.jpg', 'Cebu City', '2022-08-19 03:04:47', 1, 0),
(12, 'Toshiba', 'XSR', 2022, 'Manual', '150 cc', 120, 'day', 120, 'default.jpg', 'Sagbayan, Bohol', '2022-08-21 11:06:23', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(15) NOT NULL,
  `user_fname` varchar(20) NOT NULL,
  `user_lname` varchar(20) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_contact` varchar(11) NOT NULL,
  `user_address` varchar(40) NOT NULL,
  `user_bday` datetime NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_desc` text NOT NULL,
  `user_slug` varchar(40) NOT NULL,
  `user_role` int(10) NOT NULL,
  `user_date_reg` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `user_gender`, `user_email`, `user_contact`, `user_address`, `user_bday`, `user_password`, `user_desc`, `user_slug`, `user_role`, `user_date_reg`) VALUES
(34, 'Rodela', 'Cansancio', 'Female', 'rodela.cansancio@bisu.edu.ph', '09093001834', 'Canmaya Centro, Sagbayan, Bohol', '1991-06-22 00:00:00', '$2y$10$twk45UJg6kX9UPg9DCz99uZrE9mpiuHclwZhHRrb7.QFwyf0yJj2e', '', 'rodela-cansancio', 1, '2022-08-09 23:25:39'),
(42, 'Juan', 'De La Cruz', 'Male', 'juan@gmail.com', '09655660196', 'Sagbayn, Bohol', '2022-08-10 00:00:00', '$2y$10$e.QN7wv4XWnvvXRmZe2akeA4lT3vRKcuo.N7ttRtP8bxBdGBksVyC', '', 'juan-de la cruz', 0, '2022-08-19 03:07:48'),
(43, 'Rodela', 'Cansancio', 'Female', 'rodela.cansancio@gmail.com', '09093001834', 'Canmaya Centro, Sagbayan, Bohol', '1991-06-22 00:00:00', '$2y$10$twk45UJg6kX9UPg9DCz99uZrE9mpiuHclwZhHRrb7.QFwyf0yJj2e', '', 'rodela-cansancio', 0, '2022-08-21 11:02:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `motorcycles`
--
ALTER TABLE `motorcycles`
  ADD PRIMARY KEY (`motor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `motorcycles`
--
ALTER TABLE `motorcycles`
  MODIFY `motor_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
