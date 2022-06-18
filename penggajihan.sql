-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2020 at 03:17 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `penggajihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE IF NOT EXISTS `kehadiran` (
  `id_absen` int(11) NOT NULL,
  `jum_hadir` int(4) NOT NULL,
  `jum_lembur` int(4) NOT NULL,
  `bulan` varchar(16) NOT NULL,
  `kd_karyawan` char(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lvl_user`
--

CREATE TABLE IF NOT EXISTS `lvl_user` (
  `id` int(11) NOT NULL,
  `level` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lvl_user`
--

INSERT INTO `lvl_user` (`id`, `level`) VALUES
(1, 'Owner'),
(2, 'Admin'),
(3, 'Akuntan'),
(4, 'Karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `penggajihan`
--

CREATE TABLE IF NOT EXISTS `penggajihan` (
  `id_gaji` int(11) NOT NULL,
  `tgl_gajihan` int(11) NOT NULL,
  `bulanan` int(8) NOT NULL,
  `lembur` int(8) NOT NULL,
  `bonus` int(8) NOT NULL,
  `mines` int(8) NOT NULL,
  `tot_gaji` int(8) NOT NULL,
  `kd_karyawan` char(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` char(16) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jk` varchar(16) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `no_hp` char(16) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nik` varchar(32) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `lvl_user` int(11) NOT NULL,
  `password` varchar(256) NOT NULL,
  `aktif` int(1) NOT NULL,
  `tgl_masuk` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nama`, `jk`, `alamat`, `no_hp`, `email`, `nik`, `foto`, `lvl_user`, `password`, `aktif`, `tgl_masuk`) VALUES
(4, '40906202001', 'Anggi Gunawan', 'Laki - laki', 'Garut', '081973469652', 'anggigu@gmail.com', '3206130708970001', 'default.png', 4, '$2y$10$sexUyprrctcW5nRwiOAEheFBh0I4Z.nFyR6sM1KyJ7/7STZuTQDce', 1, 1592321795),
(2, 'admin', 'Administrator', 'Laki - laki', 'Garut', '087321987456', 'admin@gmail.com', '3206139346587002', 'default.png', 2, '$2y$10$FRwNebb4TD8Q2X4m7fxgRODZlcyBwL.CkN6khug2CYZPa8KY.5Tj2', 1, 1592320264),
(3, 'akuntan', 'Akuntan', 'Perempuan', 'Garut', '085421906347', 'akuntan@gmail.com', '32061378963640002', 'default.png', 3, '$2y$10$SD/p7gGpn7aWzKJb.mnppuYm.z5X9VK8pimgFxQOBgSyg2gpclliC', 1, 1592320581),
(1, 'owner', 'Owner', 'Laki - laki', 'Tasikmalaya', '083123456789', 'owner@gmail.co.id', '3206141234567001', 'default.png', 1, '$2y$10$TTFCRaZSxNHqrsAfL40VSOV84u4JUcIKnfVcxgfBcHW98.I65Qdhi', 1, 1592320156);

-- --------------------------------------------------------

--
-- Table structure for table `user_akses`
--

CREATE TABLE IF NOT EXISTS `user_akses` (
  `id` int(11) NOT NULL,
  `lvl_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_akses`
--

INSERT INTO `user_akses` (`id`, `lvl_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'owner'),
(2, 'admin'),
(3, 'akuntan'),
(4, 'karyawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id_absen`), ADD UNIQUE KEY `kd_karyawan` (`kd_karyawan`);

--
-- Indexes for table `lvl_user`
--
ALTER TABLE `lvl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penggajihan`
--
ALTER TABLE `penggajihan`
  ADD PRIMARY KEY (`id_gaji`), ADD UNIQUE KEY `kd_karyawan` (`kd_karyawan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `nik` (`nik`), ADD UNIQUE KEY `lvl_user` (`lvl_user`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_akses`
--
ALTER TABLE `user_akses`
  ADD PRIMARY KEY (`id`), ADD KEY `lvl_id` (`lvl_id`), ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lvl_user`
--
ALTER TABLE `lvl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `penggajihan`
--
ALTER TABLE `penggajihan`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_akses`
--
ALTER TABLE `user_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kehadiran`
--
ALTER TABLE `kehadiran`
ADD CONSTRAINT `kehadiran_ibfk_1` FOREIGN KEY (`kd_karyawan`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penggajihan`
--
ALTER TABLE `penggajihan`
ADD CONSTRAINT `penggajihan_ibfk_1` FOREIGN KEY (`kd_karyawan`) REFERENCES `kehadiran` (`kd_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`lvl_user`) REFERENCES `lvl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_akses`
--
ALTER TABLE `user_akses`
ADD CONSTRAINT `user_akses_ibfk_1` FOREIGN KEY (`lvl_id`) REFERENCES `lvl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `user_akses_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
