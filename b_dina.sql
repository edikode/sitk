-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2019 at 09:49 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b_dina`
--

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `unit_kerja` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`, `unit_kerja`, `created_at`, `updated_at`) VALUES
(2, 'Ketua Pelaksana', 'ada', '2019-01-08 23:58:01', '0000-00-00 00:00:00'),
(3, 'Pegawai', 'ada', '2019-01-08 23:58:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_kerja`
--

CREATE TABLE `lokasi_kerja` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `alamat` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi_kerja`
--

INSERT INTO `lokasi_kerja` (`id`, `nama`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Bagian 1', 'Alas Purwo', '2018-12-14 17:00:00', '2018-12-14 17:00:00'),
(2, 'Bagian 2', 'Rogojampi', '2018-12-14 17:00:00', '2019-01-29 01:17:09'),
(3, 'Bagian 3', 'Genteng', '2019-01-08 16:45:33', '2019-01-08 16:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nip` varchar(45) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(45) DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `alamat` text,
  `agama` varchar(10) DEFAULT NULL,
  `gol_darah` varchar(3) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL COMMENT '					',
  `ktp` varchar(20) DEFAULT NULL,
  `sertifikat` varchar(30) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_terakhir`
--

CREATE TABLE `pendidikan_terakhir` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `kota` varchar(45) DEFAULT NULL,
  `tahun_lulus` date DEFAULT NULL,
  `file` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pegawai_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_jabatan`
--

CREATE TABLE `riwayat_jabatan` (
  `id` int(11) NOT NULL,
  `nomor_sk` varchar(45) DEFAULT NULL,
  `tanggal_sk` varchar(45) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `satuan_kerja` varchar(45) DEFAULT NULL,
  `unit_kerja` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pegawai_id` int(11) NOT NULL,
  `lokasi_kerja_id` int(11) NOT NULL,
  `jabatan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pegawai_id` int(11) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `level`, `pegawai_id`, `password`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Administrator', 'admin@mail.com', 'admin', NULL, '$2y$10$uOaLwZMfdpSmQOjvbGKIDuPoO4000s0f1ydM73Sw0C.Xjvk4tcnF2', 'VKVKoWOeNp66UQduKTeJ4gVOGSoiCiqWtoUeS0au0U0JoCEoy4rkrGOA5Dfs', '2018-05-25 08:20:45', '2019-01-29 01:49:15', 1),
(2, 'Pegawai', 'pegawai@mail.com', 'pegawai', NULL, '$2y$10$uOaLwZMfdpSmQOjvbGKIDuPoO4000s0f1ydM73Sw0C.Xjvk4tcnF2', 'CaQB7D0gwaVEF7auRnGZ82hfnl5kBjSBHDMtVHPu7XChEXOUmiIHJgk23WnD', '2018-05-25 08:20:45', '2019-01-09 03:16:30', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi_kerja`
--
ALTER TABLE `lokasi_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `pendidikan_terakhir`
--
ALTER TABLE `pendidikan_terakhir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_jabatan`
--
ALTER TABLE `riwayat_jabatan`
  ADD PRIMARY KEY (`id`,`lokasi_kerja_id`,`jabatan_id`) USING BTREE,
  ADD KEY `fk_riwayat_jabatan_pegawai` (`pegawai_id`),
  ADD KEY `fk_riwayat_jabatan_lokasi_kerja1` (`lokasi_kerja_id`),
  ADD KEY `fk_riwayat_jabatan_jabatan1` (`jabatan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lokasi_kerja`
--
ALTER TABLE `lokasi_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pendidikan_terakhir`
--
ALTER TABLE `pendidikan_terakhir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `riwayat_jabatan`
--
ALTER TABLE `riwayat_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `riwayat_jabatan`
--
ALTER TABLE `riwayat_jabatan`
  ADD CONSTRAINT `fk_riwayat_jabatan_jabatan1` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_riwayat_jabatan_lokasi_kerja1` FOREIGN KEY (`lokasi_kerja_id`) REFERENCES `lokasi_kerja` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
