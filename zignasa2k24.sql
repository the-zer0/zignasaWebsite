-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2024 at 05:47 PM
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
-- Database: `zignasa2k24`
--

-- --------------------------------------------------------

--
-- Table structure for table `aws`
--

CREATE TABLE `aws` (
  `id` int(255) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `team_lead_name` varchar(255) NOT NULL,
  `team_lead_phone` int(255) NOT NULL,
  `team_lead_clg` varchar(255) NOT NULL,
  `team_lead_email` varchar(255) NOT NULL,
  `team_member2_name` varchar(255) NOT NULL,
  `team_member2_phone` int(255) NOT NULL,
  `team_member2_clg` varchar(255) NOT NULL,
  `team_member3_name` varchar(255) NOT NULL,
  `team_member3_phone` int(255) NOT NULL,
  `team_member3_clg` varchar(255) NOT NULL,
  `team_member4_name` varchar(255) NOT NULL,
  `team_member4_phone` int(255) NOT NULL,
  `team_member4_clg` varchar(255) NOT NULL,
  `team_member5_name` varchar(255) NOT NULL,
  `team_member5_phone` int(255) NOT NULL,
  `team_member5_clg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ui_ux`
--

CREATE TABLE `ui_ux` (
  `id` int(255) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `team_lead_name` varchar(255) NOT NULL,
  `team_lead_phone` int(255) NOT NULL,
  `team_lead_clg` varchar(255) NOT NULL,
  `team_lead_email` varchar(255) NOT NULL,
  `team_member2_name` varchar(255) NOT NULL,
  `team_member2_phone` int(255) NOT NULL,
  `team_member2_clg` varchar(255) NOT NULL,
  `team_member3_name` varchar(255) NOT NULL,
  `team_member3_phone` int(255) NOT NULL,
  `team_member3_clg` varchar(255) NOT NULL,
  `team_member4_name` varchar(255) NOT NULL,
  `team_member4_phone` int(255) NOT NULL,
  `team_member4_clg` varchar(255) NOT NULL,
  `team_member5_name` varchar(255) NOT NULL,
  `team_member5_phone` int(255) NOT NULL,
  `team_member5_clg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `webdev`
--

CREATE TABLE `webdev` (
  `id` int(255) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `team_lead_name` varchar(255) NOT NULL,
  `team_lead_phone` int(255) NOT NULL,
  `team_lead_clg` varchar(255) NOT NULL,
  `team_lead_email` varchar(255) NOT NULL,
  `team_member2_name` varchar(255) NOT NULL,
  `team_member2_phone` int(255) NOT NULL,
  `team_member2_clg` varchar(255) NOT NULL,
  `team_member3_name` varchar(255) NOT NULL,
  `team_member3_phone` int(255) NOT NULL,
  `team_member3_clg` varchar(255) NOT NULL,
  `team_member4_name` varchar(255) NOT NULL,
  `team_member4_phone` int(255) NOT NULL,
  `team_member4_clg` varchar(255) NOT NULL,
  `team_member5_name` varchar(255) NOT NULL,
  `team_member5_phone` int(255) NOT NULL,
  `team_member5_clg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aws`
--
ALTER TABLE `aws`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ui_ux`
--
ALTER TABLE `ui_ux`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webdev`
--
ALTER TABLE `webdev`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aws`
--
ALTER TABLE `aws`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ui_ux`
--
ALTER TABLE `ui_ux`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `webdev`
--
ALTER TABLE `webdev`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
