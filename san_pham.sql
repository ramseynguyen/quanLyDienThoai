-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 07:12 PM
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
-- Database: `san_pham`
--

-- --------------------------------------------------------

--
-- Table structure for table `dienthoai`
--

CREATE TABLE `dienthoai` (
  `ma_sp` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `gia` decimal(10,2) NOT NULL,
  `hinh` varchar(255) DEFAULT NULL,
  `loai` varchar(100) DEFAULT NULL,
  `nsx` varchar(100) DEFAULT NULL,
  `ngay_tao` datetime DEFAULT NULL,
  `ngay_cap_nhap` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dienthoai`
--

INSERT INTO `dienthoai` (`ma_sp`, `ten`, `gia`, `hinh`, `loai`, `nsx`, `ngay_tao`, `ngay_cap_nhap`) VALUES
(3, 'samsung 2', 222111.00, NULL, 'hihi22222', NULL, NULL, NULL),
(5, 'samsung 2', 222222.00, NULL, 'hihi', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dienthoai`
--
ALTER TABLE `dienthoai`
  ADD PRIMARY KEY (`ma_sp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dienthoai`
--
ALTER TABLE `dienthoai`
  MODIFY `ma_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
