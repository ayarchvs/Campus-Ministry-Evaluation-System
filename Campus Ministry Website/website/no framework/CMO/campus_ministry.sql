-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2024 at 06:25 PM
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
  `E_Name` varchar(100) NOT NULL,
  `E_Year` int(11) NOT NULL,
  `E_Month` int(11) NOT NULL,
  `E_Day` int(11) NOT NULL,
  `E_Religion` varchar(50) NOT NULL,
  `E_Location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`Event_ID`, `Staff_ID`, `E_Name`, `E_Year`, `E_Month`, `E_Day`, `E_Religion`, `E_Location`) VALUES
(3, NULL, 'Retreat', 2024, 0, 2, 'Roman Catholic', 'Lantaka'),
(6, NULL, 'Retreat', 2024, 0, 1, 'Roman Catholic', 'Lantaka Campus'),
(11, NULL, 'Retreat', 2024, 0, 26, 'Catholic', 'Lantaka'),
(12, NULL, 'Recollection', 2020, 0, 15, 'Hinduism', 'Alcatraz'),
(13, NULL, 'Retreat', 2021, 0, 91, 'Buddhism', 'Gaza');

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
(21, 'a', 'a', '$2y$10$MqnB.cb/9lGGwVPyZbC/5./Pka.l7OfHRKn.JzNBmODowRXdibqKK', 'a@gmail.com'),
(22, 'chu', 'chu', '$2y$10$ql6sksYRRYNjfhhBqKA3k.UxM3oHPbNh92ho5Ojb5zXNhcZJ2pkqC', 'chu@gmail.com'),
(23, 'Curt', '3rd Year', '$2y$10$wn6XYa3as.zPVqrc74jw..Aws2nhETOatV8YKK1k3iWcmilHjsMoi', 'c@gmail.com');

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
  MODIFY `Event_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `Staff_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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