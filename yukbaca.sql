-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2018 at 03:18 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yukbaca`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` text NOT NULL,
  `penulis_buku` text NOT NULL,
  `stok_buku` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `penulis_buku`, `stok_buku`, `created_at`, `updated_at`) VALUES
(1, 'PROGRAMMING JAVA IS EASY', 'Bapak Oracle', 10, '2018-11-19 23:58:25', '2018-11-29 00:36:45'),
(2, 'MYSQL FOR DUMMIES', 'MICHAEL DARWIN SON', 12, '2018-11-19 23:58:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_buku`
--

CREATE TABLE `peminjaman_buku` (
  `id_peminjaman` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal_booking` date NOT NULL,
  `tanggal_penerimaan` date DEFAULT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `denda` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman_buku`
--

INSERT INTO `peminjaman_buku` (`id_peminjaman`, `nis`, `id_buku`, `jumlah_buku`, `status`, `tanggal_booking`, `tanggal_penerimaan`, `tanggal_pengembalian`, `denda`, `created_at`, `updated_at`) VALUES
(1535341505, 20161001, 2, 0, 1, '0000-00-00', '2018-08-27', '2018-09-03', 50000, '2018-11-19 23:55:17', '2018-12-12 10:39:16'),
(1540660756, 20161002, 1, 0, 1, '0000-00-00', '2018-12-12', '2018-12-19', 0, '2018-11-19 23:55:17', '2018-12-12 10:07:23'),
(1542705879, 20161001, 1, 0, 1, '0000-00-00', '2018-12-12', '2018-12-19', 0, '2018-11-19 19:24:39', '2018-12-12 10:07:16'),
(1542709740, 20161001, 1, 0, 1, '0000-00-00', '2018-12-12', '2018-12-19', 0, '2018-11-19 20:29:00', '2018-12-12 10:06:52'),
(1542709756, 20161001, 1, 0, 0, '0000-00-00', '2018-11-20', '2018-11-27', 0, '2018-11-19 20:29:16', '2018-11-19 20:29:16'),
(1543502205, 20161001, 1, 0, 0, '0000-00-00', '2018-11-29', '2018-12-06', 0, '2018-11-29 00:36:45', '2018-11-29 00:36:45'),
(1544638043, 20161001, 1, 1, 0, '2018-12-12', NULL, NULL, 0, '2018-12-12 11:07:23', '2018-12-12 11:07:23'),
(1544638347, 20161001, 1, 1, 0, '2018-12-12', NULL, NULL, 0, '2018-12-12 11:12:27', '2018-12-12 11:12:27'),
(1544638371, 20161001, 1, 1, 0, '2018-12-12', NULL, NULL, 0, '2018-12-12 11:12:51', '2018-12-12 11:12:51'),
(1544638480, 20161001, 1, 1, 0, '2018-12-12', NULL, NULL, 0, '2018-12-12 11:14:41', '2018-12-12 11:14:41'),
(1544638497, 20161001, 1, 1, 0, '2018-12-12', NULL, NULL, 0, '2018-12-12 11:14:57', '2018-12-12 11:14:57'),
(1544711316, 20161001, 1, 1, 0, '2018-12-13', NULL, NULL, 0, '2018-12-13 07:28:36', '2018-12-13 07:28:36'),
(1544711705, 20161001, 1, 1, 0, '2018-12-13', NULL, NULL, 0, '2018-12-13 07:35:05', '2018-12-13 07:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(11) NOT NULL,
  `nama` text NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `no_hp` int(11) NOT NULL,
  `status_peminjaman` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `kelas`, `no_hp`, `status_peminjaman`, `created_at`, `updated_at`) VALUES
(20161001, 'Ahmad Santoso Widoyo Kusumo', 'XII TEL 12', 821234567, 2, '2018-11-20 00:06:38', '2018-11-19 20:29:16'),
(20161002, 'Andika Adikka Sidika', 'XII TEL 12', 821234567, 1, '2018-11-20 00:06:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1544711706;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `nis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20161003;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
