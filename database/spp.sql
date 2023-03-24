-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2023 at 02:21 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `tlp` int(11) NOT NULL,
  `address` text NOT NULL,
  `photo` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `firstname`, `lastname`, `email`, `password`, `pass`, `tlp`, `address`, `photo`) VALUES
(1, 'Bryant', 'Sulthan Nugroho', 'bryant@gmail.com', 'bf14c9e2dbc935acede43ed20eda3585', 'bryant1234', 2147483647, 'Jl. Gunung Putra', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `classroom_id` int(11) NOT NULL,
  `classroom` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`classroom_id`, `classroom`) VALUES
(1, 'X'),
(2, 'XI'),
(3, 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `major_id` int(11) NOT NULL,
  `major` varchar(100) NOT NULL,
  `slug` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`major_id`, `major`, `slug`) VALUES
(1, 'Rekayasa Perangkat Lunak', 'rpl'),
(2, 'Multimedia', 'mm'),
(3, 'Teknik Komputer dan Jaringan', 'tkj'),
(4, 'Akuntansi', 'akt');

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `month_id` int(11) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `month` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`month_id`, `bulan`, `month`) VALUES
(1, 'Januari', 'jan'),
(2, 'Februari', 'feb'),
(3, 'Maret', 'mar'),
(4, 'April', 'apr'),
(5, 'Mei', 'may'),
(6, 'Juni', 'jun'),
(7, 'Juli', 'jul'),
(8, 'Agustus', 'aug'),
(9, 'September', 'sep'),
(10, 'Oktober', 'oct'),
(11, 'November', 'nov'),
(12, 'Desember', 'des');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `spp_id` int(11) NOT NULL,
  `tahun_ajaran` year(4) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`spp_id`, `tahun_ajaran`, `nominal`) VALUES
(1, 2021, 4200000),
(2, 2022, 3600000),
(3, 2023, 3000000);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `major_id` int(11) NOT NULL,
  `spp_id` int(11) NOT NULL,
  `nis` bigint(20) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tlp` int(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `photo` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `classroom_id`, `major_id`, `spp_id`, `nis`, `firstname`, `lastname`, `username`, `password`, `pass`, `email`, `tlp`, `address`, `photo`) VALUES
(1, 3, 1, 3, 130788144, 'Refansa', 'Ali Muzky', 'refansa', '4d0707acfec91608f07ca3d238cb4aca', 'refansa', NULL, NULL, NULL, NULL),
(2, 3, 3, 3, 119916637, 'Fardan', 'Septian', 'fardan', 'f7ca6d6f004154a11ef559e41ba30f12', 'fardan', NULL, NULL, NULL, NULL),
(3, 3, 1, 3, 118882603, 'Adi', 'Saputra', 'adi123', '7360409d967a24b667afc33a8384ec9e', 'adi123', NULL, NULL, NULL, NULL),
(4, 3, 2, 3, 103948432, 'Doni', 'Irawan', 'doni', '2da9cd653f63c010b6d6c5a5ad73fe32', 'doni', NULL, NULL, NULL, NULL),
(6, 3, 1, 3, 182275538, 'Firenze', 'Higa Putra', 'firenze501', '8746fe9eebab4773138c31d7a43099b0', 'firenze501', NULL, NULL, NULL, NULL),
(7, 3, 1, 3, 132006725, 'Adi', 'Putra', 'adi14469', '915d4952828ef373c823f9b5d5a28397', 'adi14469', NULL, NULL, NULL, NULL),
(8, 3, 2, 3, 174964047, 'Angger', 'Cakra', 'angger8015', '41c2db346a0606c00709c3444b9237a2', 'angger8015', NULL, NULL, NULL, NULL),
(9, 3, 4, 3, 189042177, 'Albert', 'Einstein', 'albert9942', '0054af6f5641a60ecbbb178162aff8da', 'albert9942', NULL, NULL, NULL, NULL),
(10, 3, 3, 3, 131958665, 'Aufa', 'Ramadhan', 'aufa1822', '9e5e923d30978bc6b16e31b4b6bc2272', 'aufa1822', NULL, NULL, NULL, NULL),
(11, 3, 2, 3, 163295454, 'Rehan', 'Hakim', 'rehan7797', '76d86e7a8e6f7349a70c54a2051ffd0b', 'rehan7797', NULL, NULL, NULL, NULL),
(12, 3, 1, 3, 195442586, 'Dimas', 'Abidin', 'dimas14703', 'a2b8041715c80e20f0490265421a677b', 'dimas14703', NULL, NULL, NULL, NULL),
(13, 3, 2, 3, 137657739, 'Bagus', 'Sekali', 'bagus5865', '5031492a1657331b6d51e718aee5f8be', 'bagus5865', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `spp_id` int(11) NOT NULL,
  `month_id` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `thn_bayar` year(4) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `admin_id`, `student_id`, `spp_id`, `month_id`, `tgl_bayar`, `thn_bayar`, `total`, `created_at`) VALUES
(3, 1, 1, 3, 1, '2023-03-13', 2023, 250000, '2023-03-19 02:40:49'),
(4, 1, 3, 3, 1, '2023-03-15', 2023, 250000, '2023-03-19 03:30:51'),
(5, 1, 8, 3, 1, '2023-03-19', 2023, 250000, '2023-03-19 03:02:41'),
(6, 1, 6, 3, 1, '2023-03-19', 2023, 250000, '2023-03-19 03:04:25'),
(7, 1, 3, 3, 2, '2023-03-19', 2023, 250000, '2023-03-19 03:30:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `tlp` (`tlp`);

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`classroom_id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`major_id`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`month_id`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`spp_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `nis_2` (`nis`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `tlp` (`tlp`),
  ADD KEY `classroom_id` (`classroom_id`),
  ADD KEY `major_id` (`major_id`),
  ADD KEY `spp_id` (`spp_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `month_id` (`spp_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `month_id_2` (`month_id`),
  ADD KEY `month_id_3` (`month_id`),
  ADD KEY `month_id_4` (`month_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `classroom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `major_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `month_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `spp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
