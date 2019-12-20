-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2019 at 09:06 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `regresi-linier`
--

-- --------------------------------------------------------

--
-- Table structure for table `pmb`
--

CREATE TABLE `pmb` (
  `id` int(11) NOT NULL,
  `tahun_penerimaan` year(4) NOT NULL,
  `jumlah_pendaftar` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pmb`
--

INSERT INTO `pmb` (`id`, `tahun_penerimaan`, `jumlah_pendaftar`, `created_at`) VALUES
(18, 2008, 319, '2019-12-20 07:50:02'),
(19, 2009, 594, '2019-12-20 08:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `pmb_fakultas`
--

CREATE TABLE `pmb_fakultas` (
  `id` int(11) NOT NULL,
  `tahun_penerimaan` year(4) NOT NULL,
  `fakultas` varchar(20) NOT NULL,
  `jumlah_pendaftar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pmb_fakultas`
--

INSERT INTO `pmb_fakultas` (`id`, `tahun_penerimaan`, `fakultas`, `jumlah_pendaftar`) VALUES
(6, 2008, 'FIKES', 68),
(7, 2008, 'FT', 48),
(8, 2008, 'FAPERTA', 27),
(9, 2008, 'FASILKOM', 15),
(10, 2008, 'FEB', 86),
(11, 2008, 'FISIP', 17),
(12, 2008, 'FH', 58),
(13, 2008, 'FKIP', 0),
(14, 2008, 'FAI', 0),
(15, 2009, 'FIKES', 33),
(16, 2009, 'FT', 83),
(17, 2009, 'FAPERTA', 48),
(18, 2009, 'FASILKOM', 95),
(19, 2009, 'FEB', 107),
(20, 2009, 'FISIP', 24),
(21, 2009, 'FH', 72),
(22, 2009, 'FKIP', 12),
(23, 2009, 'FAI', 120);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2019-12-07 03:04:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pmb`
--
ALTER TABLE `pmb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pmb_fakultas`
--
ALTER TABLE `pmb_fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pmb`
--
ALTER TABLE `pmb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pmb_fakultas`
--
ALTER TABLE `pmb_fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
