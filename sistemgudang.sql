-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 19, 2016 at 11:48 PM
-- Server version: 5.7.13-0ubuntu0.16.04.2
-- PHP Version: 7.0.8-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemgudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1473598560),
('user', '2', 1473598559);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1473598559, 1473598559),
('deleteBarang', 2, 'Penghapusan Barang', NULL, NULL, 1473598558, 1473598558),
('deleteJenis', 2, 'Permission untuk Menghapus Jenis', NULL, NULL, 1473598595, 1473598595),
('deletePemesanan', 2, 'Penghapusan Pemesanan', NULL, NULL, 1473598559, 1473598559),
('deletePengeluaran', 2, 'Permission untuk Menghapus data Pengeluaran', NULL, NULL, 1473598679, 1473598679),
('deletePermission', 2, 'Permission untuk penghapusan data Penerimaan', NULL, NULL, 1473598675, 1473598675),
('deleteSupplier', 2, 'Permission untuk menghapus data Supplier', NULL, NULL, 1473598663, 1473598663),
('hapusToko', 2, 'Permission untuk menghapus Toko', NULL, NULL, 1473598650, 1473598650),
('hapusUser', 2, 'Permission untuk menghapus User', NULL, NULL, 1473598624, 1473598624),
('indexView', 2, 'Permission untuk halaman awal', NULL, NULL, 1473598610, 1473598610),
('masukManajemen', 2, 'Permission untuk masuk ke Menu Manajemen User', NULL, NULL, 1473598624, 1473598624),
('tambahBarang', 2, 'Penambahan Barang', NULL, NULL, 1473598557, 1473598557),
('tambahJenis', 2, 'Permission untuk menambahkan Jenis', NULL, NULL, 1473598594, 1473598594),
('tambahPemesanan', 2, 'Penambahan Pemesanan', NULL, NULL, 1473598559, 1473598559),
('tambahPenerimaan', 2, 'Permission untuk penambahan data Penerimaan', NULL, NULL, 1473598674, 1473598674),
('tambahPengeluaran', 2, 'Permission untuk Tambah Pengeluaran', NULL, NULL, 1473598679, 1473598679),
('tambahSupplier', 2, 'Permission untuk menambah data Supplier', NULL, NULL, 1473598663, 1473598663),
('tambahToko', 2, 'Permission untuk Menambahkan Toko', NULL, NULL, 1473598650, 1473598650),
('tambahUser', 2, 'Permission untuk Tambah User', NULL, NULL, 1473598636, 1473598636),
('updateBarang', 2, 'Perubahan Barang', NULL, NULL, 1473598558, 1473598558),
('updateJenis', 2, 'Permission untuk merubah Jenis', NULL, NULL, 1473598595, 1473598595),
('updatePemesanan', 2, 'Update Pemesanan', NULL, NULL, 1473598559, 1473598559),
('updatePenerimaan', 2, 'Permission untuk perubahan data Penerimaan', NULL, NULL, 1473598675, 1473598675),
('updatePengeluaran', 2, 'Permission untuk perubahan data Pengeluaran', NULL, NULL, 1473598679, 1473598679),
('updateSupplier', 2, 'Permission untuk merubah data Supplier', NULL, NULL, 1473598663, 1473598663),
('updateToko', 2, 'Permission untuk merubah Data Toko', NULL, NULL, 1473598650, 1473598650),
('user', 1, NULL, NULL, NULL, 1473598559, 1473598559),
('viewBarang', 2, 'Melihat Barang', NULL, NULL, 1473598559, 1473598559),
('viewPemesanan', 2, 'Melihat Pemesanan', NULL, NULL, 1473598559, 1473598559);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'deleteBarang'),
('admin', 'deleteJenis'),
('admin', 'deletePemesanan'),
('admin', 'deletePengeluaran'),
('admin', 'deletePermission'),
('admin', 'deleteSupplier'),
('admin', 'hapusToko'),
('admin', 'hapusUser'),
('admin', 'indexView'),
('user', 'indexView'),
('admin', 'masukManajemen'),
('admin', 'tambahBarang'),
('admin', 'tambahJenis'),
('user', 'tambahPemesanan'),
('user', 'tambahPenerimaan'),
('user', 'tambahPengeluaran'),
('admin', 'tambahSupplier'),
('admin', 'tambahToko'),
('admin', 'tambahUser'),
('admin', 'updateBarang'),
('admin', 'updateJenis'),
('admin', 'updatePemesanan'),
('admin', 'updatePenerimaan'),
('admin', 'updatePengeluaran'),
('admin', 'updateSupplier'),
('admin', 'updateToko'),
('admin', 'user'),
('admin', 'viewBarang'),
('user', 'viewPemesanan');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `warna` text NOT NULL,
  `harga` double NOT NULL,
  `stok_s` int(11) NOT NULL DEFAULT '0',
  `stok_m` int(11) NOT NULL DEFAULT '0',
  `stok_l` int(11) NOT NULL DEFAULT '0',
  `stok_xl` int(11) NOT NULL DEFAULT '0',
  `stok_n` int(11) NOT NULL DEFAULT '0',
  `kode_jenis` int(11) DEFAULT NULL,
  `current_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `gender`, `warna`, `harga`, `stok_s`, `stok_m`, `stok_l`, `stok_xl`, `stok_n`, `kode_jenis`, `current_update`) VALUES
(2, 'BR-0001', 'T-Shirt Ariel Noah', 'L', 'Putih', 40000, 24, 25, 13, 14, 6, 6, '2016-09-11 20:08:45'),
(5, 'BR-0002', 'Baju Muslim Motif Batik', 'L', 'Putih', 50000, 30, 30, 18, 11, 7, 6, '2016-09-11 20:09:52'),
(6, 'BR-0003', 'Lejing Motif Mickey Mouse', 'P', 'Putih', 50000, 25, 28, 18, 15, 4, 6, '2016-09-11 20:09:52');

-- --------------------------------------------------------

--
-- Table structure for table `detail_kirim`
--

CREATE TABLE `detail_kirim` (
  `id` int(11) NOT NULL,
  `no_pengiriman` int(11) NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `stok_s` int(11) NOT NULL DEFAULT '0',
  `stok_m` int(11) NOT NULL DEFAULT '0',
  `stok_l` int(11) NOT NULL DEFAULT '0',
  `stok_xl` int(11) NOT NULL,
  `stok_n` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_kirim`
--

INSERT INTO `detail_kirim` (`id`, `no_pengiriman`, `kode_barang`, `stok_s`, `stok_m`, `stok_l`, `stok_xl`, `stok_n`) VALUES
(8, 10, 6, 2, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `detile_pesanan`
--

CREATE TABLE `detile_pesanan` (
  `id` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `stok_s` int(11) NOT NULL DEFAULT '0',
  `stok_m` int(11) NOT NULL DEFAULT '0',
  `stok_l` int(11) NOT NULL,
  `stok_xl` int(11) NOT NULL DEFAULT '0',
  `stok_n` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detile_pesanan`
--

INSERT INTO `detile_pesanan` (`id`, `id_pesanan`, `id_barang`, `stok_s`, `stok_m`, `stok_l`, `stok_xl`, `stok_n`) VALUES
(20, 24, 2, 4, 5, 3, 4, 1),
(21, 24, 5, 5, 5, 4, 3, 1),
(22, 25, 6, 6, 5, 6, 4, 1),
(23, 26, 6, 6, 5, 3, 4, 1),
(24, 28, 6, 0, 5, 0, 0, 0),
(25, 29, 5, 5, 5, 4, 3, 1),
(26, 30, 6, 5, 3, 4, 2, 1),
(27, 31, 2, 20, 20, 10, 10, 5),
(28, 32, 5, 20, 20, 10, 5, 5),
(29, 32, 6, 10, 10, 5, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id` int(11) NOT NULL,
  `kode_jenis` varchar(50) NOT NULL,
  `nama_jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id`, `kode_jenis`, `nama_jenis`) VALUES
(5, 'KJ-001', 'Baju Lengan Pendek'),
(6, 'KJ-002', 'Baju Lengan Panjang'),
(7, 'KJ-003', 'Kaos Lengan Pendek');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1471967697),
('m130524_201442_init', 1471967702),
('m140506_102106_rbac_init', 1472496540);

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan`
--

CREATE TABLE `penerimaan` (
  `id` int(11) NOT NULL,
  `no_pesanan` int(11) NOT NULL,
  `tgl_penerimaan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_penerimaan` enum('diterima','belum') NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerimaan`
--

INSERT INTO `penerimaan` (`id`, `no_pesanan`, `tgl_penerimaan`, `status_penerimaan`) VALUES
(8, 24, '2016-08-30 19:55:12', 'diterima'),
(19, 25, '2016-08-31 21:10:24', 'diterima'),
(21, 26, '2016-08-31 20:10:24', 'diterima'),
(22, 28, '2016-08-31 23:25:13', 'diterima'),
(23, 29, '2016-09-01 07:35:43', 'diterima'),
(24, 30, '2016-09-12 20:05:41', 'diterima'),
(25, 31, '2016-09-13 20:05:37', 'diterima'),
(26, 32, '2016-09-24 20:05:42', 'diterima');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id` int(11) NOT NULL,
  `no_pengiriman` varchar(20) NOT NULL,
  `tgl_pengiriman` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kode_toko` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id`, `no_pengiriman`, `tgl_pengiriman`, `kode_toko`) VALUES
(10, 'PG-0001', '2016-08-31 23:00:02', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `no_pesanan` varchar(15) NOT NULL,
  `tgl_pesanan` date NOT NULL,
  `supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `no_pesanan`, `tgl_pesanan`, `supplier`) VALUES
(24, 'PS-0001', '2016-08-30', 1),
(25, 'PS-0002', '2016-08-30', 2),
(26, 'PS-0003', '2016-08-31', 2),
(28, 'PS-0004', '2016-08-31', 2),
(29, 'PS-0005', '2016-09-01', 1),
(30, 'PS-0006', '2016-09-02', 2),
(31, 'PS-0007', '2016-09-12', 1),
(32, 'PS-0008', '2016-09-22', 2);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `kode_supplier` varchar(20) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat_supplier` varchar(1024) NOT NULL,
  `telp_supplier` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `kode_supplier`, `nama_supplier`, `alamat_supplier`, `telp_supplier`) VALUES
(1, 'SP-001', 'CV. AGUSTA', 'Kp Rancabango, RT/RW 02/06, Ds. Rancabango, Kec. Tarogong Kidul, Kab. Garut', '082134564768543'),
(2, 'SP-002', 'CV. LINGGAR JATI', 'Kp. Jati, Ds. Jati, Kec. Tarogong Kidul', '08293846537294');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id` int(11) NOT NULL,
  `kode_toko` varchar(20) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `alamat_toko` varchar(1024) NOT NULL,
  `telp_toko` varchar(20) NOT NULL,
  `contact_person_toko` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id`, `kode_toko`, `nama_toko`, `alamat_toko`, `telp_toko`, `contact_person_toko`) VALUES
(2, 'TK-001', 'Lestari', 'Kp. Cisarua, Ds. Nagreg, Kab. Bandung', '08123485739584', '08123456843');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'jafar', 'BJvom6aCKmMgyOemOChea63zjkqu0mun', '$2y$13$J7yaeLgb/61ZtjvTaoYvKe8lj1nqlDOVTCSjGEkgxmT0/174lMaNO', NULL, 'jafar@test.com', 10, 1471967757, 1471967757),
(2, 'ajat', 'yVE9rtHr5HmJ57L74yvIbminhDuFQeI-', '$2y$13$jnfrxYKkdvNkXhwj/1iG6es1/lwpIKgHgPvkcqGUQBDeesQsxMzVm', NULL, 'ajat@test.com', 10, 1473599466, 1473599466);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_barang` (`kode_jenis`);

--
-- Indexes for table `detail_kirim`
--
ALTER TABLE `detail_kirim`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_kirim_barang_fk` (`kode_barang`),
  ADD KEY `detail_kirim_fk` (`no_pengiriman`);

--
-- Indexes for table `detile_pesanan`
--
ALTER TABLE `detile_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detile_barang_fk` (`id_barang`),
  ADD KEY `detile_pesanan_fk` (`id_pesanan`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_barang_idx` (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penerimaan_pesanan_fk` (`no_pesanan`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengiriman_toko` (`kode_toko`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_supplier_fk` (`supplier`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `detail_kirim`
--
ALTER TABLE `detail_kirim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `detile_pesanan`
--
ALTER TABLE `detile_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `penerimaan`
--
ALTER TABLE `penerimaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `jenis_barang` FOREIGN KEY (`kode_jenis`) REFERENCES `jenis_barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detail_kirim`
--
ALTER TABLE `detail_kirim`
  ADD CONSTRAINT `detail_kirim_barang_fk` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `detail_kirim_fk` FOREIGN KEY (`no_pengiriman`) REFERENCES `pengiriman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detile_pesanan`
--
ALTER TABLE `detile_pesanan`
  ADD CONSTRAINT `detile_barang_fk` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `detile_pesanan_fk` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD CONSTRAINT `penerimaan_pesanan_fk` FOREIGN KEY (`no_pesanan`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_toko` FOREIGN KEY (`kode_toko`) REFERENCES `toko` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_supplier_fk` FOREIGN KEY (`supplier`) REFERENCES `supplier` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
