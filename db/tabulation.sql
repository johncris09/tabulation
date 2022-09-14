-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2022 at 01:56 AM
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
  `rank` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evening_gown`
--

INSERT INTO `evening_gown` (`id`, `candidate`, `judge`, `score`, `rank`) VALUES
(73, 1, 0, 23, '12.00'),
(74, 2, 0, 21, '11.00'),
(75, 3, 0, 15, '8.00'),
(76, 4, 0, 14, '6.00'),
(77, 6, 0, 12, '5.00'),
(78, 7, 0, 2.5, '1.00'),
(79, 9, 0, 14.5, '7.00'),
(80, 5, 0, 16, '10.00'),
(81, 11, 0, 7.5, '3.00'),
(82, 12, 0, 4, '2.00'),
(83, 8, 0, 15.5, '9.00'),
(84, 10, 0, 11, '4.00'),
(85, 1, 2, 1, '11.50'),
(86, 2, 2, 2, '9.50'),
(87, 3, 2, 3, '8.00'),
(88, 4, 2, 4, '7.00'),
(89, 5, 2, 1, '11.50'),
(90, 6, 2, 2, '9.50'),
(91, 7, 2, 10, '1.50'),
(92, 8, 2, 6, '6.00'),
(93, 9, 2, 7, '5.00'),
(94, 10, 2, 8, '4.00'),
(95, 11, 2, 9, '3.00'),
(96, 12, 2, 10, '1.50'),
(97, 2, 4, 2, '11.50'),
(98, 3, 4, 4, '7.00'),
(99, 1, 4, 2, '11.50'),
(100, 4, 4, 4, '7.00'),
(101, 5, 4, 5, '4.50'),
(102, 6, 4, 6, '2.50'),
(103, 7, 4, 10, '1.00'),
(104, 8, 4, 3, '9.50'),
(105, 9, 4, 3, '9.50'),
(106, 10, 4, 4, '7.00'),
(107, 11, 4, 5, '4.50'),
(108, 12, 4, 6, '2.50');

-- --------------------------------------------------------

--
-- Table structure for table `final_round`
--

CREATE TABLE `final_round` (
  `id` int(11) NOT NULL,
  `candidate` int(11) NOT NULL,
  `judge` int(11) NOT NULL,
  `score` double NOT NULL,
  `rank` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `final_round`
--

INSERT INTO `final_round` (`id`, `candidate`, `judge`, `score`, `rank`) VALUES
(1, 10, 0, 12.5, '1.00'),
(2, 9, 0, 13, '2.00'),
(3, 6, 0, 16.5, '4.00'),
(4, 7, 0, 17.5, '5.00'),
(5, 5, 0, 15.5, '3.00'),
(6, 5, 7, 1, '5.00'),
(7, 6, 7, 10, '1.00'),
(8, 7, 7, 5, '2.00'),
(9, 9, 7, 3, '4.00'),
(10, 10, 7, 5, '3.00'),
(11, 5, 2, 1, '4.50'),
(12, 6, 2, 1, '4.50'),
(13, 7, 2, 3, '3.00'),
(14, 9, 2, 4, '2.00'),
(15, 10, 2, 10, '1.00'),
(16, 5, 4, 10, '1.00'),
(17, 6, 4, 5, '2.00'),
(18, 7, 4, 2, '4.50'),
(19, 9, 4, 3, '3.00'),
(20, 10, 4, 2, '4.50'),
(21, 5, 5, 5, '4.00'),
(22, 6, 5, 1, '5.00'),
(23, 7, 5, 6, '3.00'),
(24, 9, 5, 7, '2.00'),
(25, 10, 5, 8, '1.00'),
(26, 5, 6, 7, '1.00'),
(27, 6, 6, 2, '4.00'),
(28, 7, 6, 1, '5.00'),
(29, 9, 6, 6, '2.00'),
(30, 10, 6, 4, '3.00');

-- --------------------------------------------------------

--
-- Table structure for table `production_attire`
--

CREATE TABLE `production_attire` (
  `id` int(11) NOT NULL,
  `candidate` int(11) NOT NULL,
  `judge` int(11) NOT NULL,
  `score` double NOT NULL,
  `rank` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production_attire`
--

INSERT INTO `production_attire` (`id`, `candidate`, `judge`, `score`, `rank`) VALUES
(73, 1, 0, 18, '12.00'),
(74, 2, 0, 16, '10.00'),
(75, 3, 0, 11.5, '5.00'),
(76, 4, 0, 9, '2.50'),
(77, 5, 0, 16, '10.00'),
(78, 7, 0, 9, '2.50'),
(79, 8, 0, 16, '10.00'),
(80, 9, 0, 15.5, '8.00'),
(81, 6, 0, 8.5, '1.00'),
(82, 10, 0, 14, '7.00'),
(83, 11, 0, 10, '4.00'),
(84, 12, 0, 12.5, '6.00'),
(85, 2, 4, 7, '4.50'),
(86, 3, 4, 8, '2.50'),
(87, 1, 4, 4, '9.00'),
(88, 4, 4, 8, '2.50'),
(89, 5, 4, 3, '11.00'),
(90, 6, 4, 7, '4.50'),
(91, 7, 4, 6, '6.00'),
(92, 8, 4, 5, '7.00'),
(93, 9, 4, 4, '9.00'),
(94, 10, 4, 2, '12.00'),
(95, 11, 4, 4, '9.00'),
(96, 12, 4, 10, '1.00'),
(97, 1, 2, 2, '9.00'),
(98, 2, 2, 1, '11.50'),
(99, 3, 2, 2, '9.00'),
(100, 4, 2, 3, '6.50'),
(101, 5, 2, 4, '5.00'),
(102, 6, 2, 5, '4.00'),
(103, 7, 2, 6, '3.00'),
(104, 8, 2, 2, '9.00'),
(105, 9, 2, 3, '6.50'),
(106, 10, 2, 8, '2.00'),
(107, 11, 2, 9, '1.00'),
(108, 12, 2, 1, '11.50');

-- --------------------------------------------------------

--
-- Table structure for table `production_number`
--

CREATE TABLE `production_number` (
  `id` int(11) NOT NULL,
  `candidate` int(11) NOT NULL,
  `judge` int(11) NOT NULL,
  `score` double NOT NULL,
  `rank` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production_number`
--

INSERT INTO `production_number` (`id`, `candidate`, `judge`, `score`, `rank`) VALUES
(1, 1, 0, 29, '5.00'),
(2, 2, 0, 52.5, '12.00'),
(3, 5, 0, 34, '8.00'),
(4, 3, 0, 29.5, '6.00'),
(5, 6, 0, 16, '1.00'),
(6, 4, 0, 31, '7.00'),
(7, 8, 0, 42, '11.00'),
(8, 10, 0, 25.5, '2.00'),
(9, 7, 0, 41.5, '10.00'),
(10, 11, 0, 28, '4.00'),
(11, 9, 0, 35, '9.00'),
(12, 12, 0, 26, '3.00'),
(13, 1, 2, 10, '2.00'),
(14, 2, 2, 2, '10.50'),
(15, 3, 2, 4, '8.00'),
(16, 5, 2, 2, '10.50'),
(17, 4, 2, 3, '9.00'),
(18, 6, 2, 6, '7.00'),
(19, 7, 2, 7, '6.00'),
(20, 8, 2, 8, '5.00'),
(21, 9, 2, 9, '4.00'),
(22, 10, 2, 10, '2.00'),
(23, 11, 2, 10, '2.00'),
(24, 12, 2, 1, '12.00'),
(25, 1, 4, 10, '1.50'),
(26, 2, 4, 1, '12.00'),
(27, 3, 4, 2, '10.50'),
(28, 4, 4, 5, '7.00'),
(29, 5, 4, 6, '5.50'),
(30, 6, 4, 7, '3.50'),
(31, 7, 4, 4, '8.00'),
(32, 8, 4, 2, '10.50'),
(33, 9, 4, 3, '9.00'),
(34, 10, 4, 10, '1.50'),
(35, 11, 4, 6, '5.50'),
(36, 12, 4, 7, '3.50'),
(37, 1, 5, 1, '12.00'),
(38, 2, 5, 2, '10.50'),
(39, 3, 5, 10, '2.00'),
(40, 4, 5, 5, '7.50'),
(41, 5, 5, 2, '10.50'),
(42, 6, 5, 10, '2.00'),
(43, 7, 5, 7, '6.00'),
(44, 8, 5, 8, '5.00'),
(45, 9, 5, 9, '4.00'),
(46, 10, 5, 5, '7.50'),
(47, 11, 5, 3, '9.00'),
(48, 12, 5, 10, '2.00'),
(49, 1, 6, 1, '11.50'),
(50, 2, 6, 2, '9.50'),
(51, 3, 6, 10, '1.50'),
(52, 4, 6, 5, '5.50'),
(53, 5, 6, 6, '3.50'),
(54, 6, 6, 10, '1.50'),
(55, 7, 6, 1, '11.50'),
(56, 8, 6, 2, '9.50'),
(57, 9, 6, 3, '8.00'),
(58, 10, 6, 4, '7.00'),
(59, 11, 6, 5, '5.50'),
(60, 12, 6, 6, '3.50'),
(61, 1, 7, 10, '2.00'),
(62, 2, 7, 2, '10.00'),
(63, 3, 7, 3, '7.50'),
(64, 4, 7, 10, '2.00'),
(65, 5, 7, 6, '4.00'),
(66, 6, 7, 10, '2.00'),
(67, 7, 7, 2, '10.00'),
(68, 8, 7, 1, '12.00'),
(69, 9, 7, 2, '10.00'),
(70, 10, 7, 3, '7.50'),
(71, 11, 7, 4, '6.00'),
(72, 12, 7, 5, '5.00');

-- --------------------------------------------------------

--
-- Table structure for table `swim_wear`
--

CREATE TABLE `swim_wear` (
  `id` int(11) NOT NULL,
  `candidate` int(11) NOT NULL,
  `judge` int(11) NOT NULL,
  `score` double NOT NULL,
  `rank` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `swim_wear`
--

INSERT INTO `swim_wear` (`id`, `candidate`, `judge`, `score`, `rank`) VALUES
(73, 1, 0, 11.5, '11.50'),
(74, 2, 0, 9.5, '9.50'),
(75, 4, 0, 5.5, '5.50'),
(76, 5, 0, 2, '2.00'),
(77, 6, 0, 3.5, '3.50'),
(78, 3, 0, 7.5, '7.50'),
(79, 7, 0, 1, '1.00'),
(80, 8, 0, 11.5, '11.50'),
(81, 9, 0, 9.5, '9.50'),
(82, 11, 0, 5.5, '5.50'),
(83, 12, 0, 3.5, '3.50'),
(84, 10, 0, 7.5, '7.50'),
(85, 1, 2, 1, '11.50'),
(86, 2, 2, 2, '9.50'),
(87, 3, 2, 3, '7.50'),
(88, 4, 2, 4, '5.50'),
(89, 6, 2, 5, '3.50'),
(90, 5, 2, 6, '2.00'),
(91, 7, 2, 10, '1.00'),
(92, 8, 2, 1, '11.50'),
(93, 9, 2, 2, '9.50'),
(94, 10, 2, 3, '7.50'),
(95, 11, 2, 4, '5.50'),
(96, 12, 2, 5, '3.50');

-- --------------------------------------------------------

--
-- Table structure for table `talent_presentation`
--

CREATE TABLE `talent_presentation` (
  `id` int(11) NOT NULL,
  `candidate` int(11) NOT NULL,
  `judge` int(11) NOT NULL,
  `score` double NOT NULL,
  `rank` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `talent_presentation`
--

INSERT INTO `talent_presentation` (`id`, `candidate`, `judge`, `score`, `rank`) VALUES
(73, 1, 2, 1, '11.50'),
(74, 2, 2, 2, '9.50'),
(75, 3, 2, 3, '8.00'),
(76, 4, 2, 5, '5.50'),
(77, 5, 2, 6, '3.50'),
(78, 6, 2, 1, '11.50'),
(79, 7, 2, 2, '9.50'),
(80, 8, 2, 4, '7.00'),
(81, 9, 2, 5, '5.50'),
(82, 10, 2, 6, '3.50'),
(83, 11, 2, 7, '2.00'),
(84, 12, 2, 8, '1.00'),
(85, 1, 0, 24.5, '10.00'),
(86, 2, 0, 30.5, '12.00'),
(87, 3, 0, 25, '11.00'),
(88, 4, 0, 17.5, '5.00'),
(89, 5, 0, 20.5, '8.00'),
(90, 7, 0, 15.5, '4.00'),
(91, 8, 0, 19, '6.00'),
(92, 9, 0, 13, '2.00'),
(93, 6, 0, 24, '9.00'),
(94, 10, 0, 19.5, '7.00'),
(95, 12, 0, 10, '1.00'),
(96, 11, 0, 15, '3.00'),
(97, 1, 4, 1, '12.00'),
(98, 2, 4, 2, '11.00'),
(99, 3, 4, 3, '10.00'),
(100, 4, 4, 4, '8.50'),
(101, 5, 4, 5, '7.00'),
(102, 6, 4, 6, '5.50'),
(103, 7, 4, 10, '1.00'),
(104, 8, 4, 4, '8.50'),
(105, 9, 4, 6, '5.50'),
(106, 10, 4, 7, '4.00'),
(107, 11, 4, 8, '3.00'),
(108, 12, 4, 9, '2.00'),
(109, 2, 7, 2, '10.00'),
(110, 3, 7, 3, '7.00'),
(111, 1, 7, 10, '1.00'),
(112, 4, 7, 5, '3.50'),
(113, 5, 7, 2, '10.00'),
(114, 6, 7, 3, '7.00'),
(115, 7, 7, 4, '5.00'),
(116, 8, 7, 5, '3.50'),
(117, 9, 7, 6, '2.00'),
(118, 10, 7, 1, '12.00'),
(119, 11, 7, 2, '10.00'),
(120, 12, 7, 3, '7.00');

-- --------------------------------------------------------

--
-- Table structure for table `top_five`
--

CREATE TABLE `top_five` (
  `id` int(11) NOT NULL,
  `candidate` int(11) NOT NULL,
  `judge` int(11) NOT NULL,
  `score` double NOT NULL,
  `rank` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `top_five`
--

INSERT INTO `top_five` (`id`, `candidate`, `judge`, `score`, `rank`) VALUES
(13, 1, 0, 46.5, '12.00'),
(14, 2, 0, 45.5, '11.00'),
(15, 3, 0, 39.5, '9.00'),
(16, 4, 0, 30.5, '7.00'),
(17, 5, 0, 28.5, '5.00'),
(18, 6, 0, 26.5, '3.00'),
(19, 7, 0, 28, '4.00'),
(20, 8, 0, 34.5, '8.00'),
(21, 9, 0, 20, '2.00'),
(22, 10, 0, 16.5, '1.00'),
(23, 11, 0, 29.5, '6.00'),
(24, 12, 0, 44.5, '10.00'),
(25, 2, 2, 10, '1.50'),
(26, 3, 2, 3, '6.50'),
(27, 4, 2, 2, '8.50'),
(28, 1, 2, 1, '11.00'),
(29, 5, 2, 4, '4.50'),
(30, 6, 2, 1, '11.00'),
(31, 7, 2, 2, '8.50'),
(32, 8, 2, 3, '6.50'),
(33, 9, 2, 4, '4.50'),
(34, 10, 2, 5, '3.00'),
(35, 11, 2, 10, '1.50'),
(36, 12, 2, 1, '11.00'),
(37, 1, 4, 1, '12.00'),
(38, 2, 4, 2, '10.50'),
(39, 3, 4, 3, '8.50'),
(40, 4, 4, 10, '2.50'),
(41, 5, 4, 5, '6.00'),
(42, 6, 4, 10, '2.50'),
(43, 7, 4, 3, '8.50'),
(44, 8, 4, 2, '10.50'),
(45, 9, 4, 10, '2.50'),
(46, 10, 4, 10, '2.50'),
(47, 11, 4, 4, '7.00'),
(48, 12, 4, 6, '5.00'),
(49, 1, 6, 10, '3.00'),
(50, 2, 6, 2, '11.50'),
(51, 3, 6, 3, '9.00'),
(52, 4, 6, 10, '3.00'),
(53, 5, 6, 10, '3.00'),
(54, 6, 6, 10, '3.00'),
(55, 7, 6, 10, '3.00'),
(56, 8, 6, 2, '11.50'),
(57, 9, 6, 3, '9.00'),
(58, 10, 6, 3, '9.00'),
(59, 11, 6, 4, '7.00'),
(60, 12, 6, 5, '6.00'),
(61, 2, 5, 2, '10.00'),
(62, 3, 5, 3, '7.50'),
(63, 1, 5, 2, '10.00'),
(64, 4, 5, 2, '10.00'),
(65, 5, 5, 4, '6.00'),
(66, 6, 5, 5, '5.00'),
(67, 7, 5, 6, '4.00'),
(68, 8, 5, 7, '3.00'),
(69, 9, 5, 8, '2.00'),
(70, 10, 5, 9, '1.00'),
(71, 11, 5, 3, '7.50'),
(72, 12, 5, 1, '12.00'),
(73, 1, 7, 2, '10.50'),
(74, 2, 7, 1, '12.00'),
(75, 3, 7, 4, '8.00'),
(76, 5, 7, 3, '9.00'),
(77, 4, 7, 5, '6.50'),
(78, 6, 7, 6, '5.00'),
(79, 7, 7, 7, '4.00'),
(80, 8, 7, 8, '3.00'),
(81, 9, 7, 9, '2.00'),
(82, 10, 7, 10, '1.00'),
(83, 11, 7, 5, '6.50'),
(84, 12, 7, 2, '10.50');

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
(2, 'John Cris Manabo', 'judge1', '9801133a9a5eb052a4f588f44a86936d', 'judge', 'judge1'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `final_round`
--
ALTER TABLE `final_round`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `production_attire`
--
ALTER TABLE `production_attire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `production_number`
--
ALTER TABLE `production_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `swim_wear`
--
ALTER TABLE `swim_wear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `talent_presentation`
--
ALTER TABLE `talent_presentation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `top_five`
--
ALTER TABLE `top_five`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
