-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2024 at 09:32 AM
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
-- Database: `campus_ministry`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `Event_ID` int(11) NOT NULL,
  `Staff_ID` int(11) DEFAULT NULL,
  `E_Type` varchar(100) NOT NULL,
  `E_Year` int(11) NOT NULL,
  `E_Month` varchar(11) NOT NULL,
  `E_Day` int(11) NOT NULL,
  `E_Religion` varchar(50) NOT NULL,
  `E_Location` varchar(100) NOT NULL,
  `E_file_ref` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`Event_ID`, `Staff_ID`, `E_Type`, `E_Year`, `E_Month`, `E_Day`, `E_Religion`, `E_Location`, `E_file_ref`) VALUES
(5, 1, 'Recollection 02', 2100, '9', 11, 'Catholic', 'Zamboanga, Philippines', ''),
(6, 1, 'Retreat', 2023, '1', 15, 'Catholic', 'Manila, Philippines', ''),
(7, 1, 'Recollection 01', 2022, '3', 20, 'Catholic', 'Cebu, Philippines', ''),
(9, 1, 'Retreat', 2021, '8', 25, 'Catholic', 'Manila, Philippines', ''),
(11, 1, 'Retreat', 2023, '1', 15, 'Catholic', 'Manila, Philippines', ''),
(12, 1, 'Recollection 01', 2022, '3', 20, 'Muslim', 'Cebu, Philippines', ''),
(13, 1, 'Recollection 02', 2024, '5', 10, 'Catholic', 'Davao, Philippines', ''),
(14, 1, 'Retreat', 2021, '8', 25, 'Catholic', 'Manila, Philippines', ''),
(15, 1, 'Recollection 01', 2023, '6', 18, 'Muslim', 'Cebu, Philippines', ''),
(16, 1, 'Retreat', 2023, '1', 15, 'Catholic', 'Manila, Philippines', ''),
(17, 1, 'Recollection 01', 2022, '3', 20, 'Muslim', 'Cebu, Philippines', ''),
(18, 1, 'Recollection 02', 2024, '5', 10, 'Catholic', 'Davao, Philippines', ''),
(19, 1, 'Retreat', 2021, '8', 25, 'Catholic', 'Manila, Philippines', ''),
(20, 1, 'Recollection 01', 2023, '6', 18, 'Muslim', 'Cebu, Philippines', ''),
(21, 1, 'Retreat', 2023, '1', 15, 'Catholic', 'Manila, Philippines', ''),
(22, 1, 'Recollection 01', 2022, '3', 20, 'Muslim', 'Cebu, Philippines', ''),
(23, 1, 'Recollection 02', 2024, '5', 10, 'Catholic', 'Davao, Philippines', ''),
(24, 1, 'Retreat', 2021, '8', 25, 'Catholic', 'Manila, Philippines', ''),
(25, 1, 'Recollection 01', 2023, '6', 18, 'Muslim', 'Cebu, Philippines', ''),
(26, 1, 'Retreat', 2023, '1', 15, 'Catholic', 'Manila, Philippines', ''),
(27, 1, 'Recollection 01', 2022, '3', 20, 'Muslim', 'Cebu, Philippines', ''),
(28, 1, 'Recollection 02', 2024, '5', 10, 'Catholic', 'Davao, Philippines', ''),
(29, 1, 'Retreat', 2021, '8', 25, 'Catholic', 'Manila, Philippines', ''),
(30, 1, 'Recollection 01', 2023, '6', 18, 'Muslim', 'Cebu, Philippines', ''),
(31, 1, 'Retreat', 2023, '1', 15, 'Catholic', 'Manila, Philippines', ''),
(32, 1, 'Recollection 01', 2022, '3', 20, 'Muslim', 'Cebu, Philippines', ''),
(33, 1, 'Recollection 02', 2024, '5', 10, 'Catholic', 'Davao, Philippines', ''),
(34, 1, 'Retreat', 2021, '8', 25, 'Catholic', 'Manila, Philippines', ''),
(35, 1, 'Recollection 01', 2023, '6', 18, 'Muslim', 'Cebu, Philippines', ''),
(36, 1, 'Retreat', 2023, '1', 15, 'Catholic', 'Manila, Philippines', ''),
(37, 1, 'Recollection 01', 2022, '3', 20, 'Muslim', 'Cebu, Philippines', ''),
(38, 1, 'Recollection 02', 2024, '5', 10, 'Catholic', 'Davao, Philippines', ''),
(39, 1, 'Retreat', 2021, '8', 25, 'Catholic', 'Manila, Philippines', ''),
(40, 1, 'Recollection 01', 2023, '6', 18, 'Muslim', 'Cebu, Philippines', ''),
(41, 1, 'Retreat', 2023, '1', 15, 'Catholic', 'Manila, Philippines', ''),
(42, 1, 'Recollection 01', 2022, '3', 20, 'Muslim', 'Cebu, Philippines', ''),
(43, 1, 'Recollection 02', 2024, '5', 10, 'Catholic', 'Davao, Philippines', ''),
(44, 1, 'Retreat', 2021, '8', 25, 'Catholic', 'Manila, Philippines', ''),
(45, 1, 'Recollection 01', 2023, '6', 18, 'Muslim', 'Cebu, Philippines', ''),
(46, 1, 'Retreat', 2023, '1', 15, 'Catholic', 'Manila, Philippines', ''),
(47, 1, 'Recollection 01', 2022, '3', 20, 'Muslim', 'Cebu, Philippines', ''),
(48, 1, 'Recollection 02', 2024, '5', 10, 'Catholic', 'Davao, Philippines', ''),
(49, 1, 'Retreat', 2021, '8', 25, 'Catholic', 'Manila, Philippines', ''),
(50, 1, 'Recollection 01', 2023, '6', 18, 'Muslim', 'Cebu, Philippines', ''),
(51, 1, 'Retreat', 2023, '1', 15, 'Catholic', 'Manila, Philippines', ''),
(52, 1, 'Recollection 01', 2022, '3', 20, 'Muslim', 'Cebu, Philippines', ''),
(53, 1, 'Recollection 02', 2024, '5', 10, 'Catholic', 'Davao, Philippines', ''),
(54, 1, 'Retreat', 2021, '8', 25, 'Catholic', 'Manila, Philippines', ''),
(55, 1, 'Recollection 01', 2023, '6', 18, 'Muslim', 'Cebu, Philippines', ''),
(56, 1, 'Retreat', 2023, '1', 15, 'Catholic', 'Manila, Philippines', ''),
(57, 1, 'Recollection 01', 2022, '3', 20, 'Muslim', 'Cebu, Philippines', ''),
(58, 1, 'Recollection 02', 2024, '5', 10, 'Catholic', 'Davao, Philippines', ''),
(59, 1, 'Retreat', 2021, '8', 25, 'Catholic', 'Manila, Philippines', ''),
(60, 1, 'Recollection 01', 2023, '6', 18, 'Muslim', 'Cebu, Philippines', ''),
(61, 1, 'Retreat', 2023, '1', 15, 'Catholic', 'Manila, Philippines', ''),
(62, 1, 'Recollection 01', 2022, '3', 20, 'Muslim', 'Cebu, Philippines', ''),
(63, 1, 'Recollection 02', 2024, '5', 10, 'Catholic', 'Davao, Philippines', ''),
(64, 1, 'Retreat', 2021, '8', 25, 'Catholic', 'Manila, Philippines', ''),
(65, 1, 'Recollection 01', 2023, '6', 18, 'Muslim', 'Cebu, Philippines', ''),
(66, 1, 'Retreat', 2023, '1', 15, 'Catholic', 'Manila, Philippines', ''),
(67, 1, 'Recollection 01', 2022, '3', 20, 'Muslim', 'Cebu, Philippines', ''),
(68, 1, 'Recollection 02', 2024, '5', 10, 'Catholic', 'Davao, Philippines', ''),
(69, 1, 'Retreat', 2021, '8', 25, 'Catholic', 'Manila, Philippines', ''),
(70, 1, 'Recollection 01', 2023, '6', 18, 'Muslim', 'Cebu, Philippines', ''),
(71, 1, 'Retreat', 2023, '1', 15, 'Catholic', 'Manila, Philippines', ''),
(72, 1, 'Recollection 01', 2022, '3', 20, 'Muslim', 'Cebu, Philippines', ''),
(73, 1, 'Recollection 02', 2024, '5', 10, 'Catholic', 'Davao, Philippines', ''),
(74, 1, 'Retreat', 2021, '8', 25, 'Catholic', 'Manila, Philippines', ''),
(75, 1, 'Recollection 01', 2023, '6', 18, 'Muslim', 'Cebu, Philippines', ''),
(76, 1, 'Retreat', 2023, '1', 15, 'Catholic', 'Manila, Philippines', ''),
(77, 1, 'Recollection 01', 2022, '3', 20, 'Muslim', 'Cebu, Philippines', ''),
(78, 1, 'Recollection 02', 2024, '5', 10, 'Catholic', 'Davao, Philippines', ''),
(79, 1, 'Retreat', 2021, '8', 25, 'Catholic', 'Manila, Philippines', ''),
(80, 1, 'Recollection 01', 2023, '6', 18, 'Muslim', 'Cebu, Philippines', '');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staff_ID` int(11) NOT NULL,
  `S_Name` varchar(100) NOT NULL,
  `S_Type` varchar(50) NOT NULL,
  `S_Password` varchar(255) NOT NULL,
  `S_Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_ID`, `S_Name`, `S_Type`, `S_Password`, `S_Email`) VALUES
(1, 'Devs', 'Developer', 'sos', '911'),
(2, 'Mei, Kuroe', 'default', '$2y$10$zK/ylzEdMQdh1GSt19hXuuiZKWNZnBHoDZqGXCJPUY.8T5poRtH5m', '000199@adzu.edu.ph'),
(3, 'Mei, Kuroe', 'Developer', '$2y$10$XutQDGgeWK213C3o91TM7OFil8A9EPcWmiiTBhG9rHRJvRslH/eui', '000199@adzu.edu.ph');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`Event_ID`),
  ADD KEY `Staff_ID` (`Staff_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staff_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `Event_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `Staff_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`Staff_ID`) REFERENCES `staff` (`Staff_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
