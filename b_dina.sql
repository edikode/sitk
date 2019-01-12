-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2019 at 02:05 PM
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
(2, 'Bagian 2', 'Rogojampis', '2018-12-14 17:00:00', '2019-01-08 16:50:33'),
(3, 'Bagian 3', 'Genteng', '2019-01-08 16:45:33', '2019-01-08 16:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_18_125623_entrust_setup_tables', 1),
(4, '2018_03_26_162203_add_activation_columund_to_user', 1);

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

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama`, `tanggal_lahir`, `tempat_lahir`, `jenis_kelamin`, `alamat`, `agama`, `gol_darah`, `telepon`, `tanggal_masuk`, `email`, `ktp`, `sertifikat`, `status`, `created_at`, `updated_at`) VALUES
(3, '123456789', 'Edi Siswanto', '1997-01-09', 'Banyuwangi', 'L', 'toyamas, wringin rejo, Gambiran kabupaten Banyuwangi', 'Islam', 'A', '082302002407', NULL, 'est23.edi@gmail.com', NULL, NULL, 'aktif', '2019-01-09 03:18:04', '2019-01-09 03:18:04'),
(4, '1234567890', 'Dina Dini', '2019-01-09', 'Banyuwangi', 'P', 'toyamas, wringin rejo, Gambiran kabupaten Banyuwangi', 'Islam', 'A', '082302002407', NULL, 'dina@mail.com', NULL, NULL, 'aktif', '2019-01-09 03:26:02', '2019-01-09 03:26:02');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_terakhir`
--

CREATE TABLE `pendidikan_terakhir` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `kota` varchar(45) DEFAULT NULL,
  `tahun_lulus` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pegawai_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan_terakhir`
--

INSERT INTO `pendidikan_terakhir` (`id`, `nama`, `kota`, `tahun_lulus`, `created_at`, `updated_at`, `pegawai_id`) VALUES
(6, 'Politeknik Negeri Banyuwangi', 'Banyuwangi', '2019-01-09', '2019-01-09 03:22:10', '2019-01-09 03:22:10', 3),
(7, 'Politeknik Negeri Banyuwangi', 'Banyuwangi', '2019-01-09', '2019-01-09 03:26:32', '2019-01-09 03:26:32', 4);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pegawai_id` int(11) NOT NULL,
  `lokasi_kerja_id` int(11) NOT NULL,
  `jabatan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_jabatan`
--

INSERT INTO `riwayat_jabatan` (`id`, `nomor_sk`, `tanggal_sk`, `tanggal_mulai`, `tanggal_selesai`, `satuan_kerja`, `unit_kerja`, `status`, `created_at`, `updated_at`, `pegawai_id`, `lokasi_kerja_id`, `jabatan_id`) VALUES
(8, '123456', '2019-01-09', '2019-01-09', '2019-01-09', 'Baru', NULL, 'pindah', '2019-01-09 03:27:08', '2019-01-09 03:45:06', 3, 1, 3),
(9, '3454353454334', '2019-01-09', '2019-01-09', '2019-01-09', 'Ada', NULL, 'aktif', '2019-01-09 03:47:47', '2019-01-09 03:47:47', 4, 1, 2),
(10, '34543dsdsad', '2019-01-09', '2019-01-09', '2019-01-09', 'Ada', NULL, 'aktif', '2019-01-09 03:48:28', '2019-01-09 03:48:28', 3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tunjangan`
--

CREATE TABLE `tunjangan` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text,
  `status` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pegawai_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `level`, `pegawai_id`, `password`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Super User', 'superuser@mail.com', 'superuser', NULL, '$2y$10$EQvdODCF1FDb9TGIum.2wOFD9fDQjD8gomu442n0cySeqS1wMqcIC', 'nn6lQwVzZilt0tP5Y9N48kbOf5xREUSGLobFK6MxcsXwz89FHwpLGx7SqmxA', '2018-03-27 16:30:15', '2018-12-05 00:25:37', 1),
(2, 'Administrator', 'admin@mail.com', 'admin', NULL, '$2y$10$uOaLwZMfdpSmQOjvbGKIDuPoO4000s0f1ydM73Sw0C.Xjvk4tcnF2', 'CqbCXW7O57JtgJOepz1dUl5d9uEwmIkwrlzNa7IICKLQGu6ZCQFE7VQcuITk', '2018-05-25 08:20:45', '2019-01-09 03:53:04', 1),
(3, 'Pegawai', 'pegawai@mail.com', 'pegawai', NULL, '$2y$10$uOaLwZMfdpSmQOjvbGKIDuPoO4000s0f1ydM73Sw0C.Xjvk4tcnF2', 'CaQB7D0gwaVEF7auRnGZ82hfnl5kBjSBHDMtVHPu7XChEXOUmiIHJgk23WnD', '2018-05-25 08:20:45', '2019-01-09 03:16:30', 1),
(10, 'Edi Siswanto', 'est23.edi@gmail.com', 'pegawai', 3, '$2y$10$14jJLcN3aP.v.fTcUkTE5ejUzz4wbjv5ku6k/DaAxI6GQVs.A9aii', 'ZYVL6CLOc93VeWRn2k4btArakvjCPigqdbfdK3014dldCnOyoqJLKTL5Ozqi', '2019-01-09 03:18:04', '2019-01-09 03:48:34', 1),
(11, 'Dina Dini', 'dina@mail.com', 'pegawai', 4, '$2y$10$mYg9ighREZVLDj5la1Juu.RhuGvuWe0qIjxHr2WWujFfVE4XZU1/6', 'e83lJKb1O45zWjCucEvCeWAF8FsmSyiw3mH8XPzod9oOivVMVKYIHMHrLXiL', '2019-01-09 03:26:02', '2019-01-09 03:47:52', 1);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `riwayat_jabatan`
--
ALTER TABLE `riwayat_jabatan`
  ADD PRIMARY KEY (`id`,`lokasi_kerja_id`,`jabatan_id`) USING BTREE,
  ADD KEY `fk_riwayat_jabatan_pegawai` (`pegawai_id`),
  ADD KEY `fk_riwayat_jabatan_lokasi_kerja1` (`lokasi_kerja_id`),
  ADD KEY `fk_riwayat_jabatan_jabatan1` (`jabatan_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `tunjangan`
--
ALTER TABLE `tunjangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pendidikan_terakhir`
--
ALTER TABLE `pendidikan_terakhir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `riwayat_jabatan`
--
ALTER TABLE `riwayat_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tunjangan`
--
ALTER TABLE `tunjangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_jabatan`
--
ALTER TABLE `riwayat_jabatan`
  ADD CONSTRAINT `fk_riwayat_jabatan_jabatan1` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_riwayat_jabatan_lokasi_kerja1` FOREIGN KEY (`lokasi_kerja_id`) REFERENCES `lokasi_kerja` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
