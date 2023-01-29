-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2023 at 01:01 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kospin`
--

-- --------------------------------------------------------

--
-- Table structure for table `jaminan`
--

CREATE TABLE `jaminan` (
  `id_jaminan` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `nama_jaminan` varchar(50) NOT NULL,
  `taksiran` float NOT NULL,
  `foto_jaminan` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jaminan`
--

INSERT INTO `jaminan` (`id_jaminan`, `user_id`, `nama_jaminan`, `taksiran`, `foto_jaminan`) VALUES
(1, 18, 'BPKB Motor', 5000000, 'Foto_Jaminan221220-aefc45e3bc.png'),
(2, 18, 'BPKB Mobil', 15000000, 'Foto_Jaminan221220-990aea30ee.jpeg'),
(5, 21, 'BPKB Motor', 10000000, 'Foto_Jaminan221221-621ccad104.jpeg'),
(6, 21, 'BPKB Mobil', 25000000, 'Foto_Jaminan221221-d3a0066d6b.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `id_nasabah` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `jk` char(10) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `tmpt_lahir` varchar(30) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `alamat` text NOT NULL,
  `pend_terakhir` varchar(30) NOT NULL,
  `ibu_kandung` varchar(100) NOT NULL,
  `status_perkawinan` varchar(25) NOT NULL,
  `jml_tanggungan` int(5) NOT NULL,
  `istri_suami` varchar(120) DEFAULT NULL,
  `pekerjaan_istri_suami` varchar(120) DEFAULT NULL,
  `foto_kk` varchar(110) NOT NULL,
  `foto_ktp` varchar(110) NOT NULL,
  `akta_nikah` varchar(110) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`id_nasabah`, `user_id`, `jk`, `no_ktp`, `tmpt_lahir`, `tgl_lhr`, `alamat`, `pend_terakhir`, `ibu_kandung`, `status_perkawinan`, `jml_tanggungan`, `istri_suami`, `pekerjaan_istri_suami`, `foto_kk`, `foto_ktp`, `akta_nikah`) VALUES
(1, 18, 'Laki-laki', '3322112123123123', 'Tegal', '2022-12-19', 'Jalan kosakosk ', 'SMP', 'DALBANTI', 'Menikah', 3, 'Bagus riokardo', 'Buruh', 'Foto_KK221219-1fda850fb9.png', 'Foto_KTP221221-eea3c608ea.jpg', 'Foto_Akta_Nikah221221-c4b0b91661.jpeg'),
(5, 20, 'Laki-laki', '12121', 'Tegal ', '2022-12-12', 'Saasas', 'D3', 'ASAS', 'Menikah', 2, 'Sasa', 'Asa', '', '', NULL),
(6, 21, 'Laki-laki', '1212', 'Medan', '1222-12-12', 'Asas', 'D3', 'ASAS', 'Menikah', 3, 'Asasa', 'Sasas', 'Foto_KK221221-d2e14637a3.jpeg', 'Foto_KTP221221-db1a7bac62.jpeg', 'Foto_Akta_Nikah221221-e12aa847b6.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `pekerjaan` varchar(150) NOT NULL,
  `nama_perush` varchar(150) NOT NULL,
  `alamat_perush` text NOT NULL,
  `jabatan` varchar(150) NOT NULL,
  `jml_penghasilan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `user_id`, `pekerjaan`, `nama_perush`, `alamat_perush`, `jabatan`, `jml_penghasilan`) VALUES
(1, 18, 'Pegawai Swasta', 'PT antam', 'ning antam lah bos', 'Staff', 5000000),
(2, 20, 'Pegawai Swasta', 'Asas', 'asas', 'BAAK', 1212),
(3, 21, 'Pegawai Swasta', 'Asas', 'asas', 'Asas', 3343434);

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjaman` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `jenis_pinjaman` varchar(100) NOT NULL,
  `jangka_waktu` varchar(50) NOT NULL,
  `jml_permohonan` float NOT NULL,
  `tujuan_penggunaan` text NOT NULL,
  `status` int(5) NOT NULL,
  `user_approved` int(5) DEFAULT NULL,
  `tgl_pinjaman` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjaman`, `user_id`, `jenis_pinjaman`, `jangka_waktu`, `jml_permohonan`, `tujuan_penggunaan`, `status`, `user_approved`, `tgl_pinjaman`) VALUES
(2, 18, 'Bulanan', '12', 15000000, 'negskaok ', 5, 19, '2022-12-20'),
(3, 20, 'Bulanan', '9', 5000000, 'sekolah\r\n', 1, 19, '2022-12-21'),
(4, 21, 'Mingguan', '16', 25000000, 'sekolah', 5, 19, '2022-12-21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` int(2) NOT NULL,
  `foto` varchar(40) DEFAULT NULL,
  `dibuat` timestamp NULL DEFAULT NULL,
  `diubah` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `email`, `no_hp`, `password`, `role`, `foto`, `dibuat`, `diubah`) VALUES
(8, 'Admin', 'admin@gmail.com', '081563916752', '$2y$10$ke0.y4qcjGJ5WEa.vxxFdOr7XZUO41TwMhjTjnsQaLGK4aJr3BvEe', 0, 'Foto_User221219-22c4532ee3.png', '2022-10-15 05:24:55', '2022-12-19 04:55:02'),
(18, 'Nasabah', 'nasabah@gmail.com', '0812345678', '$2y$10$b2F6wlGDzt2V/75AtrWQ..GbGRVJ2gNeMTGHGt4oYyf7e7WTU/8l6', 2, 'Foto_User221219-0c3706e283.png', '2022-12-19 04:59:00', '2022-12-19 05:00:18'),
(19, 'Pimpinan', 'pimpinan@gmail.com', '0891212121', '$2y$10$c.GFspnqiTVnqj12/.9Hb.T3rZ6LEVqTHApn5THT.vYPySKBIatn2', 1, 'Foto_User221219-0aafb1c5e4.png', '2022-12-19 05:00:02', '2022-12-19 05:00:11'),
(20, 'Agung Herkules', 'agung@gmail.com', '877123123123', '$2y$10$CE/f4karK/mUfJ4Pq.AR/OPmiwBTKiFy/R8CHXCO0uuUCFn.ruPv6', 2, NULL, '2022-12-20 08:03:55', NULL),
(21, 'Bagus', 'bagus@gmail.com', '1234', '$2y$10$1x1Yti0ecLg8ueJqkRoVkOJ6GXMIc3jbn6PhLbI0DvVSjGRPVd36m', 2, NULL, '2022-12-21 15:07:45', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jaminan`
--
ALTER TABLE `jaminan`
  ADD PRIMARY KEY (`id_jaminan`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id_nasabah`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jaminan`
--
ALTER TABLE `jaminan`
  MODIFY `id_jaminan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id_nasabah` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pekerjaan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id_pinjaman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
