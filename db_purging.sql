-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2025 at 08:45 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_purging`
--

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `id_catat` int(11) NOT NULL,
  `shift` int(11) NOT NULL,
  `no_mc` varchar(5) NOT NULL,
  `c_awal` varchar(4) NOT NULL,
  `name_pn` varchar(50) NOT NULL,
  `no_pn` varchar(225) NOT NULL,
  `name_model` varchar(100) NOT NULL,
  `name_resin` varchar(150) NOT NULL,
  `bf_ganti` varchar(225) NOT NULL,
  `af_ganti` varchar(225) NOT NULL,
  `b_purging` decimal(10,2) NOT NULL,
  `b_disposal` decimal(10,2) NOT NULL,
  `qty_b_dis` int(11) NOT NULL,
  `jumlah_kg` decimal(10,2) NOT NULL,
  `username` varchar(100) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `pic_1` varchar(225) NOT NULL,
  `pic_2` varchar(225) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`id_catat`, `shift`, `no_mc`, `c_awal`, `name_pn`, `no_pn`, `name_model`, `name_resin`, `bf_ganti`, `af_ganti`, `b_purging`, `b_disposal`, `qty_b_dis`, `jumlah_kg`, `username`, `keterangan`, `pic_1`, `pic_2`, `date_created`) VALUES
(1, 1, 'C3', 'C', 'BACK COVER ', 'MCK71946006MD', '55QNED82', 'ER5000SFH-E6467', 'MEA30028701MD (75UB)', 'MCK7194600MD (55QNED82)', '35.30', '23.07', 15, '58.37', 'GILANG DENIS', 'CHANGE MOLD', 'default.png', 'default.png', '2025-12-22 00:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `id_part` int(11) NOT NULL,
  `name_pn` varchar(150) NOT NULL,
  `name_model` varchar(150) NOT NULL,
  `no_pn` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`id_part`, `name_pn`, `name_model`, `no_pn`) VALUES
(1, 'BACK COVER', '55QNED82', 'MCK71946006MD'),
(2, 'GUIDE PANEL', '50UA75', 'LC5010105601MD');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` int(11) NOT NULL,
  `image` varchar(15) NOT NULL,
  `dept` varchar(15) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nik`, `nama`, `password`, `level`, `image`, `dept`, `is_active`) VALUES
(1, '0000', 'admin', '0192023a7bbd73250516f069df18b500', 1, 'default.png', 'IT', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id_catat`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id_part`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id_catat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `id_part` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
