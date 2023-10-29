-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2023 at 08:39 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus_routes`
--

CREATE TABLE `bus_routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `from_location` varchar(255) NOT NULL,
  `to_location` varchar(255) NOT NULL,
  `bus_name` varchar(255) NOT NULL,
  `bus_type` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `boarding_point` varchar(255) NOT NULL,
  `boarding_time` time NOT NULL,
  `dropping_point` varchar(255) NOT NULL,
  `dropping_time` time NOT NULL,
  `fare` int(11) NOT NULL,
  `total_seats` int(11) NOT NULL,
  `available_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus_routes`
--

INSERT INTO `bus_routes` (`id`, `user_id`, `from_location`, `to_location`, `bus_name`, `bus_type`, `duration`, `boarding_point`, `boarding_time`, `dropping_point`, `dropping_time`, `fare`, `total_seats`, `available_seats`) VALUES
(1, 1, 'Chennai', 'Coimbatore', 'Krish Travels', 'A/C Sleeper (2+1)', '9h 55m', 'Koyambedu', '21:00:00', 'Gandhipuram', '06:55:00', 945, 36, 36),
(2, 1, 'Chennai', 'Coimbatore', 'Krish Travels', 'A/C Seater / Sleeper (2+1)', '9h', 'Guindy', '06:00:00', 'Gandhipuram', '15:00:00', 900, 36, 36),
(4, 1, 'Coimbatore', 'Chennai', 'YBM Travels', 'A/C Sleeper (2+1)', '8h 30m', 'Gandhipuram', '21:30:00', 'Koyambedu', '06:00:00', 1580, 38, 38);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_bookings`
--

CREATE TABLE `ticket_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` varchar(255) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `bus_route_id` bigint(20) UNSIGNED NOT NULL,
  `seat_no` varchar(255) NOT NULL,
  `passenger_name` varchar(255) NOT NULL,
  `passenger_age` varchar(255) NOT NULL,
  `passenger_email` varchar(255) NOT NULL,
  `passenger_phone` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Confirmed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_type`, `email`, `phone`, `company_name`, `company_address`, `city`, `password`) VALUES
(1, 'Rishi', 1, '21x028@psgtech.ac.in', '8925790057', NULL, NULL, NULL, '$2y$10$Emmi8XCT9UCB9tvce0z0xedBrJfl6/C/vUEc0lLut44u4Lut6ECm2'),
(3, 'LOgesh', 0, '21x017@psgtech.ac.in', '9626855855', NULL, NULL, NULL, '$2y$10$8g4Tlcn8tEQpEmU0ugpYU.CrBD.hF8Mv1ZSeNe/VAFHqPPc1F/Xzq'),
(5, 'Company', 1, 'krish@gmail.com', '7896541230', 'Krish Travels', NULL, NULL, '$2y$10$NilAh2nzJrKLYMo8yo926uFMwnEjACjFpzY52HRv5FqALUowKfGQC'),
(6, 'Test User', 0, '21@psgtech.ac.in', '987456215', NULL, NULL, NULL, '$2y$10$u2AWjSut9mxSCZBKDWaWUu2r6Qqcqc5qhfjDnCVeXotzLYxDG1a3C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus_routes`
--
ALTER TABLE `bus_routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_bookings`
--
ALTER TABLE `ticket_bookings`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `bus_routes`
--
ALTER TABLE `bus_routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ticket_bookings`
--
ALTER TABLE `ticket_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
