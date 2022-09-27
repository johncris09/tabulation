-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2022 at 03:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tabulation`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `sponsor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id`, `number`, `name`, `age`, `sponsor`) VALUES
(1, 1, 'JELIE SAJULLA MALMIS', 18, 'OCIGEA'),
(2, 2, 'IRISH RAINE LACHICA SESCON', 23, 'DUANE JOHN LENDING CORPORATION'),
(3, 3, 'MA. EULA MAE CALAMBA AGOHAYON', 21, 'KENJOLO FARM AND RECREATION RESORT'),
(4, 4, 'MARY MAIME MATIANO BAHIAN', 20, 'LIGA NG MGA BARANGAY/ABC'),
(5, 5, 'MARY EASTER JOY SARIGUMBA ANTASUDA', 22, 'MOFBA'),
(6, 6, 'SHERYL LYNN MAGLINTE QUILAB', 23, 'SBU'),
(7, 7, 'GERLYFE UBA AJET', 25, 'OAIS'),
(8, 8, 'EULA MAE DOCUMENTA SACEDA', 19, 'OCEMCO'),
(9, 9, 'JEHAN IVY IBASAN', 21, 'SK'),
(10, 10, 'ZOELLAH LEOPOLDO ABUTON', 20, 'FEDERATED PUBLIC MARKET VENDORS ASSOCIATION'),
(11, 11, 'CHARLENE MAE RITCHA PEROCHO', 17, 'DEPED'),
(12, 12, 'CHARLENE MAE TUBLE FLORES', 23, 'OLEC');

-- --------------------------------------------------------

--
-- Table structure for table `evening_gown`
--

CREATE TABLE `evening_gown` (
  `id` int(11) NOT NULL,
  `candidate` int(11) NOT NULL,
  `judge` int(11) NOT NULL,
  `score` double NOT NULL,
  `rank` decimal(10,2) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unlocked'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `final_round`
--

CREATE TABLE `final_round` (
  `id` int(11) NOT NULL,
  `candidate` int(11) NOT NULL,
  `judge` int(11) NOT NULL,
  `score` double NOT NULL,
  `rank` decimal(10,2) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unlocked'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `final_round`
--

INSERT INTO `final_round` (`id`, `candidate`, `judge`, `score`, `rank`, `status`) VALUES
(1, 2, 0, 0, NULL, 'unlocked'),
(2, 5, 0, 0, NULL, 'unlocked'),
(3, 6, 0, 0, NULL, 'unlocked'),
(4, 7, 0, 0, NULL, 'unlocked'),
(5, 8, 0, 0, NULL, 'unlocked');

-- --------------------------------------------------------

--
-- Table structure for table `production_attire`
--

CREATE TABLE `production_attire` (
  `id` int(11) NOT NULL,
  `candidate` int(11) NOT NULL,
  `judge` int(11) NOT NULL,
  `score` double NOT NULL,
  `rank` decimal(10,2) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unlocked'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `production_number`
--

CREATE TABLE `production_number` (
  `id` int(11) NOT NULL,
  `candidate` int(11) NOT NULL,
  `judge` int(11) NOT NULL,
  `score` double NOT NULL,
  `rank` decimal(10,2) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unlocked'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `swim_wear`
--

CREATE TABLE `swim_wear` (
  `id` int(11) NOT NULL,
  `candidate` int(11) NOT NULL,
  `judge` int(11) NOT NULL,
  `score` double NOT NULL,
  `rank` decimal(10,2) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unlocked'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `talent_presentation`
--

CREATE TABLE `talent_presentation` (
  `id` int(11) NOT NULL,
  `candidate` int(11) NOT NULL,
  `judge` int(11) NOT NULL,
  `score` double NOT NULL,
  `rank` decimal(10,2) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unlocked'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `top_five`
--

CREATE TABLE `top_five` (
  `id` int(11) NOT NULL,
  `candidate` int(11) NOT NULL,
  `judge` int(11) NOT NULL,
  `score` double NOT NULL,
  `rank` decimal(10,2) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unlocked'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_type` varchar(100) NOT NULL,
  `judge_no` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `role_type`, `judge_no`) VALUES
(1, 'John Cris C. Manabo', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', NULL),
(2, 'John Doe', 'judge1', '9801133a9a5eb052a4f588f44a86936d', 'judge', 'judge1'),
(4, 'Judge2', 'judge2', '1256db16c9c3ee2f9463fe547433950d', 'judge', 'judge2'),
(5, 'judge3', 'judge3', 'e06eb0f114ebbc1f2f262f9976f0c715', 'judge', 'judge3'),
(6, 'Judge4', 'judge4', '84b50f423d987710abfe89d72cc3550f', 'judge', 'judge4'),
(7, 'Judge5', 'judge5', '7b3492a59cf60349e7f15c4d0d6f8bed', 'judge', 'judge5'),
(8, 'admin2', 'admin2', 'c84258e9c39059a89ab77d846ddab909', 'admin', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `evening_gown`
--
ALTER TABLE `evening_gown`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_round`
--
ALTER TABLE `final_round`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `production_attire`
--
ALTER TABLE `production_attire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `production_number`
--
ALTER TABLE `production_number`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `swim_wear`
--
ALTER TABLE `swim_wear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `talent_presentation`
--
ALTER TABLE `talent_presentation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top_five`
--
ALTER TABLE `top_five`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `evening_gown`
--
ALTER TABLE `evening_gown`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_round`
--
ALTER TABLE `final_round`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `production_attire`
--
ALTER TABLE `production_attire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `production_number`
--
ALTER TABLE `production_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `swim_wear`
--
ALTER TABLE `swim_wear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `talent_presentation`
--
ALTER TABLE `talent_presentation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `top_five`
--
ALTER TABLE `top_five`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
