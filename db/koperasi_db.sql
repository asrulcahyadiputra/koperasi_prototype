-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 26, 2020 at 09:13 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `koperasi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `kode_akun` char(20) NOT NULL,
  `nama_akun` varchar(100) NOT NULL,
  `saldo_normal` enum('d','k') NOT NULL,
  `kode_sub_akun` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`kode_akun`, `nama_akun`, `saldo_normal`, `kode_sub_akun`) VALUES
('110001', 'Kas', 'd', '11'),
('110002', 'Piutang Usaha', 'd', '11'),
('310001', 'Simpanan Wajib', 'k', '31'),
('410001', 'Pendapatan Jasa ', 'k', '41');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` varchar(20) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `alamat_anggota` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `date_deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `alamat_anggota`, `no_hp`, `email`, `status`, `date_created`, `date_updated`, `date_deleted`) VALUES
('AGT-000001', 'Raihan', 'Bogor Jawa Barat', '085455654471', 'raihan@gmail.com', 1, '2020-12-24 20:45:16', NULL, NULL),
('AGT-000002', 'Rivaldi', 'Pontianak Kalimantan', '081741147369', 'rivaldi@gmail.com', 1, '2020-12-24 20:46:47', '2020-12-24 21:08:08', NULL),
('AGT-000003', 'Nur Indah Sari', 'Bandung Jawa Barat', '085258852369', 'indahsari@gmail.com', 1, '2020-12-24 20:47:39', '2020-12-24 21:07:54', NULL),
('AGT-000004', 'Djoko Handoko', 'Bandung Jawa Barat', '082546654789', 'djoko@gmail.com', 1, '2020-12-24 20:52:58', NULL, NULL),
('AGT-000005', 'Lilis', 'Bandung Jawa Barat', '081789123321', 'lilis123@gmail.com', 0, '2020-12-24 21:12:30', '2020-12-24 21:12:56', '2020-12-24 21:12:56');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pinjaman`
--

CREATE TABLE `detail_pinjaman` (
  `id_pinjaman` bigint(20) NOT NULL,
  `id_transaksi` varchar(20) NOT NULL,
  `bulan_ke` int(11) NOT NULL,
  `angsuran_pokok` double NOT NULL,
  `angsuran_bunga` double NOT NULL,
  `angsuran` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_pinjaman`
--

INSERT INTO `detail_pinjaman` (`id_pinjaman`, `id_transaksi`, `bulan_ke`, `angsuran_pokok`, `angsuran_bunga`, `angsuran`) VALUES
(1, 'TRX-PNJ-000000001', 1, 15625000, 7500000, 23125000),
(2, 'TRX-PNJ-000000001', 2, 15625000, 7187500, 22812500),
(3, 'TRX-PNJ-000000001', 3, 15625000, 6875000, 22500000),
(4, 'TRX-PNJ-000000001', 4, 15625000, 6562500, 22187500),
(5, 'TRX-PNJ-000000001', 5, 15625000, 6250000, 21875000),
(6, 'TRX-PNJ-000000001', 6, 15625000, 5937500, 21562500),
(7, 'TRX-PNJ-000000001', 7, 15625000, 5625000, 21250000),
(8, 'TRX-PNJ-000000001', 8, 15625000, 5312500, 20937500),
(9, 'TRX-PNJ-000000001', 9, 15625000, 5000000, 20625000),
(10, 'TRX-PNJ-000000001', 10, 15625000, 4687500, 20312500),
(11, 'TRX-PNJ-000000001', 11, 15625000, 4375000, 20000000),
(12, 'TRX-PNJ-000000001', 12, 15625000, 4062500, 19687500),
(13, 'TRX-PNJ-000000001', 13, 15625000, 3750000, 19375000),
(14, 'TRX-PNJ-000000001', 14, 15625000, 3437500, 19062500),
(15, 'TRX-PNJ-000000001', 15, 15625000, 3125000, 18750000),
(16, 'TRX-PNJ-000000001', 16, 15625000, 2812500, 18437500),
(17, 'TRX-PNJ-000000001', 17, 15625000, 2500000, 18125000),
(18, 'TRX-PNJ-000000001', 18, 15625000, 2187500, 17812500),
(19, 'TRX-PNJ-000000001', 19, 15625000, 1875000, 17500000),
(20, 'TRX-PNJ-000000001', 20, 15625000, 1562500, 17187500),
(21, 'TRX-PNJ-000000001', 21, 15625000, 1250000, 16875000),
(22, 'TRX-PNJ-000000001', 22, 15625000, 937500, 16562500),
(23, 'TRX-PNJ-000000001', 23, 15625000, 625000, 16250000),
(24, 'TRX-PNJ-000000001', 24, 15625000, 312500, 15937500),
(25, 'TRX-PNJ-000000002', 1, 250000, 15000, 265000),
(26, 'TRX-PNJ-000000002', 2, 250000, 10000, 260000),
(27, 'TRX-PNJ-000000002', 3, 250000, 5000, 255000),
(28, 'TRX-PNJ-000000003', 1, 512500, 123000, 635500),
(29, 'TRX-PNJ-000000003', 2, 512500, 112750, 625250),
(30, 'TRX-PNJ-000000003', 3, 512500, 102500, 615000),
(31, 'TRX-PNJ-000000003', 4, 512500, 92250, 604750),
(32, 'TRX-PNJ-000000003', 5, 512500, 82000, 594500),
(33, 'TRX-PNJ-000000003', 6, 512500, 71750, 584250),
(34, 'TRX-PNJ-000000003', 7, 512500, 61500, 574000),
(35, 'TRX-PNJ-000000003', 8, 512500, 51250, 563750),
(36, 'TRX-PNJ-000000003', 9, 512500, 41000, 553500),
(37, 'TRX-PNJ-000000003', 10, 512500, 30750, 543250),
(38, 'TRX-PNJ-000000003', 11, 512500, 20500, 533000),
(39, 'TRX-PNJ-000000003', 12, 512500, 10250, 522750);

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_umum`
--

CREATE TABLE `jurnal_umum` (
  `id_jurnal` bigint(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kode_akun` char(20) NOT NULL,
  `id_transaksi` varchar(20) NOT NULL,
  `nominal` double NOT NULL,
  `posisi` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jurnal_umum`
--

INSERT INTO `jurnal_umum` (`id_jurnal`, `tanggal`, `kode_akun`, `id_transaksi`, `nominal`, `posisi`) VALUES
(1, '2020-12-25 22:03:42', '110001', 'TRX-STR-000000001', 250000, 'd'),
(2, '2020-12-25 22:03:42', '310001', 'TRX-STR-000000001', 250000, 'k'),
(3, '2020-12-25 22:13:23', '110001', 'TRX-STR-000000002', 250000, 'd'),
(4, '2020-12-25 22:13:23', '310001', 'TRX-STR-000000002', 250000, 'k'),
(5, '2020-12-25 22:14:32', '110001', 'TRX-STR-000000003', 250000, 'd'),
(6, '2020-12-25 22:14:32', '310001', 'TRX-STR-000000003', 250000, 'k'),
(7, '2020-12-25 22:14:47', '110001', 'TRX-STR-000000004', 250000, 'd'),
(8, '2020-12-25 22:14:47', '310001', 'TRX-STR-000000004', 250000, 'k'),
(9, '2020-12-26 17:42:14', '110001', 'TRX-STR-000000005', 250000000, 'd'),
(10, '2020-12-26 17:42:14', '310001', 'TRX-STR-000000005', 250000000, 'k'),
(11, '2020-12-26 17:44:31', '310001', 'TRX-PNR-000000001', 250000, 'd'),
(12, '2020-12-26 17:44:31', '110001', 'TRX-PNR-000000001', 250000, 'k'),
(13, '2020-12-26 21:12:46', '110001', 'TRX-STR-000000006', 10000000, 'd'),
(14, '2020-12-26 21:12:46', '310001', 'TRX-STR-000000006', 10000000, 'k');

-- --------------------------------------------------------

--
-- Table structure for table `kepala_akun`
--

CREATE TABLE `kepala_akun` (
  `kode_kepala_akun` char(1) NOT NULL,
  `nama_kepala_akun` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kepala_akun`
--

INSERT INTO `kepala_akun` (`kode_kepala_akun`, `nama_kepala_akun`) VALUES
('1', 'Aktiva'),
('2', 'Pasiva'),
('3', 'Modal'),
('4', 'Pendapatan'),
('5', 'Beban');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(20) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `alamat_pegawai` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `date_deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `jabatan`, `alamat_pegawai`, `no_hp`, `email`, `status`, `date_created`, `date_updated`, `date_deleted`) VALUES
('PGW-000001', 'Habib Rizieq', 'Kepala Koperasi', 'Bogor Jawa Barat', '081257456789', 'rizieq@gmail.com', 1, '2020-12-24 21:32:55', '2020-12-24 21:34:49', NULL),
('PGW-000002', 'Joko Widodo', 'Sekretaris', 'Bogor Jawa Barat\r\n', '085456789', 'jokowi@gmail.com', 1, '2020-12-24 21:35:47', NULL, NULL),
('PGW-000003', 'Gibran Rakubumi', 'Bendahara', 'Bogor Jawa Barat', '082852258', 'gibran@gmail.com', 1, '2020-12-24 21:36:28', NULL, NULL),
('PGW-000004', 'Tatan Sutarna', 'test', 'Test Jawa Barat', '082456789', 'test@gmail.com', 0, '2020-12-24 21:37:10', '2020-12-24 21:37:15', '2020-12-24 21:37:15'),
('PGW-000005', 'Test', 'Staff', 'Bogor Jawa Barat', '085456789456', '', 1, '2020-12-25 12:48:47', NULL, NULL),
('PGW-000006', 'Test2', 'Staff', 'Bogot Jawa Barat', '082123456123', 'test2@gmail.com', 1, '2020-12-25 13:42:07', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_akun`
--

CREATE TABLE `sub_akun` (
  `kode_sub_akun` char(2) NOT NULL,
  `nama_sub_akun` varchar(100) NOT NULL,
  `kode_kepala_akun` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_akun`
--

INSERT INTO `sub_akun` (`kode_sub_akun`, `nama_sub_akun`, `kode_kepala_akun`) VALUES
('11', 'Aktiva Lancar', '1'),
('12', 'Aktiva Tetap', '1'),
('13', 'Aktiva Tidak Berwujud', '1'),
('21', 'Kewajiban Jangka Pendek', '2'),
('22', 'Kewajiban Jangka Panjang', '2'),
('31', 'Modal Usaha', '3'),
('41', 'Pendapatan Usaha', '4'),
('51', 'Beban Operasional', '5'),
('52', 'Beban Non Operasional', '5');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_anggota` varchar(20) DEFAULT NULL,
  `lama_angsuran` int(11) DEFAULT NULL,
  `bunga_pinjaman` float DEFAULT NULL,
  `total` double NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `trans_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal`, `id_anggota`, `lama_angsuran`, `bunga_pinjaman`, `total`, `status`, `trans_type`) VALUES
('TRX-PNJ-000000001', '2020-12-26 20:11:25', 'AGT-000001', 24, 0.02, 375000000, 0, 'pinjaman'),
('TRX-PNJ-000000002', '2020-12-26 21:11:48', 'AGT-000002', 3, 0.02, 750000, 0, 'pinjaman'),
('TRX-PNJ-000000003', '2020-12-26 21:13:11', 'AGT-000003', 12, 0.02, 6150000, 0, 'pinjaman'),
('TRX-PNR-000000001', '2020-12-26 17:44:31', 'AGT-000001', NULL, NULL, 250000, 1, 'penarikan_anggota'),
('TRX-STR-000000001', '2020-12-25 22:03:42', 'AGT-000001', NULL, NULL, 250000, 1, 'penyetoran_anggota'),
('TRX-STR-000000002', '2020-12-25 22:13:23', 'AGT-000002', NULL, NULL, 250000, 1, 'penyetoran_anggota'),
('TRX-STR-000000003', '2020-12-25 22:14:32', 'AGT-000003', NULL, NULL, 250000, 1, 'penyetoran_anggota'),
('TRX-STR-000000004', '2020-12-25 22:14:47', 'AGT-000004', NULL, NULL, 250000, 1, 'penyetoran_anggota'),
('TRX-STR-000000005', '2020-12-26 17:42:14', 'AGT-000001', NULL, NULL, 250000000, 1, 'penyetoran_anggota'),
('TRX-STR-000000006', '2020-12-26 21:12:46', 'AGT-000003', NULL, NULL, 10000000, 1, 'penyetoran_anggota');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` varchar(20) NOT NULL,
  `id_pegawai` varchar(20) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  `status` int(1) NOT NULL DEFAULT '1',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `date_deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `id_pegawai`, `username`, `password`, `is_active`, `status`, `date_created`, `date_updated`, `date_deleted`) VALUES
('USR-000001', 'PGW-000001', 'rizieq@gmail.com', '$2y$10$e5oJ45Bfq1J5duYnPXDdEeK48.cjIbuI.Em0jhgPBaLHMr2fQogMK', 1, 1, '2020-12-25 13:03:29', NULL, NULL),
('USR-000002', 'PGW-000002', 'jokowi@gmail.com', '$2y$10$oKLkdMwF4OtIv3zp0B3vpOaYU3kQbTak9LQ2XnkzZ.2nwFSoyBarq', 1, 1, '2020-12-25 13:11:04', NULL, NULL),
('USR-000003', 'PGW-000003', 'gibran@gmail.com', '$2y$10$DpaXh3RXDa/gzDJwZ1ZY4eEAqr.VQrYIiJ/N0EvfhpGAUhYAQ5LeW', 1, 0, '2020-12-25 13:11:55', '2020-12-25 13:30:51', '2020-12-25 06:30:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`kode_akun`),
  ADD KEY `kode_sub_akun` (`kode_sub_akun`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `detail_pinjaman`
--
ALTER TABLE `detail_pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `jurnal_umum`
--
ALTER TABLE `jurnal_umum`
  ADD PRIMARY KEY (`id_jurnal`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `kepala_akun`
--
ALTER TABLE `kepala_akun`
  ADD PRIMARY KEY (`kode_kepala_akun`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `sub_akun`
--
ALTER TABLE `sub_akun`
  ADD PRIMARY KEY (`kode_sub_akun`),
  ADD KEY `kode_kepala_akun` (`kode_kepala_akun`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pinjaman`
--
ALTER TABLE `detail_pinjaman`
  MODIFY `id_pinjaman` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `jurnal_umum`
--
ALTER TABLE `jurnal_umum`
  MODIFY `id_jurnal` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `akun_ibfk_1` FOREIGN KEY (`kode_sub_akun`) REFERENCES `sub_akun` (`kode_sub_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_pinjaman`
--
ALTER TABLE `detail_pinjaman`
  ADD CONSTRAINT `detail_pinjaman_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Constraints for table `jurnal_umum`
--
ALTER TABLE `jurnal_umum`
  ADD CONSTRAINT `jurnal_umum_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_akun`
--
ALTER TABLE `sub_akun`
  ADD CONSTRAINT `sub_akun_ibfk_1` FOREIGN KEY (`kode_kepala_akun`) REFERENCES `kepala_akun` (`kode_kepala_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;
