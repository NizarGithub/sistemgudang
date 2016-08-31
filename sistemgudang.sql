-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31 Agu 2016 pada 17.34
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sistemgudang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `current_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `jenis_barang` (`kode_jenis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `gender`, `warna`, `harga`, `stok_s`, `stok_m`, `stok_l`, `stok_xl`, `stok_n`, `kode_jenis`, `current_update`) VALUES
(2, 'BR-0001', 'T-Shirt Ariel Noah', 'L', 'Putih', 40000, 4, 5, 3, 4, 1, 6, '2016-08-31 07:36:41'),
(5, 'BR-0002', 'Baju Muslim Motif Batik', 'L', 'Putih', 50000, 10, 10, 8, 6, 2, 6, '2016-08-31 07:37:53'),
(6, 'BR-0003', 'Lejing Motif Mickey Mouse', 'P', 'Putih', 50000, 10, 15, 9, 8, 2, 6, '2016-08-31 07:36:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kirim`
--

CREATE TABLE IF NOT EXISTS `detail_kirim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pengiriman` int(11) NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `stok_s` int(11) NOT NULL DEFAULT '0',
  `stok_m` int(11) NOT NULL DEFAULT '0',
  `stok_l` int(11) NOT NULL DEFAULT '0',
  `stok_xl` int(11) NOT NULL,
  `stok_n` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_kirim_barang_fk` (`kode_barang`),
  KEY `detail_kirim_fk` (`no_pengiriman`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `detail_kirim`
--

INSERT INTO `detail_kirim` (`id`, `no_pengiriman`, `kode_barang`, `stok_s`, `stok_m`, `stok_l`, `stok_xl`, `stok_n`) VALUES
(8, 10, 6, 2, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detile_pesanan`
--

CREATE TABLE IF NOT EXISTS `detile_pesanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pesanan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `stok_s` int(11) NOT NULL DEFAULT '0',
  `stok_m` int(11) NOT NULL DEFAULT '0',
  `stok_l` int(11) NOT NULL,
  `stok_xl` int(11) NOT NULL DEFAULT '0',
  `stok_n` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `detile_barang_fk` (`id_barang`),
  KEY `detile_pesanan_fk` (`id_pesanan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data untuk tabel `detile_pesanan`
--

INSERT INTO `detile_pesanan` (`id`, `id_pesanan`, `id_barang`, `stok_s`, `stok_m`, `stok_l`, `stok_xl`, `stok_n`) VALUES
(20, 24, 2, 4, 5, 3, 4, 1),
(21, 24, 5, 5, 5, 4, 3, 1),
(22, 25, 6, 6, 5, 6, 4, 1),
(23, 26, 6, 6, 5, 3, 4, 1),
(24, 28, 6, 0, 5, 0, 0, 0),
(25, 29, 5, 5, 5, 4, 3, 1),
(26, 30, 6, 5, 3, 4, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_barang`
--

CREATE TABLE IF NOT EXISTS `jenis_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_jenis` varchar(50) NOT NULL,
  `nama_jenis` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jenis_barang_idx` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `jenis_barang`
--

INSERT INTO `jenis_barang` (`id`, `kode_jenis`, `nama_jenis`) VALUES
(5, 'KJ-001', 'Baju Lengan Pendek'),
(6, 'KJ-002', 'Baju Lengan Panjang'),
(7, 'KJ-003', 'Kaos Lengan Pendek');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1471967697),
('m130524_201442_init', 1471967702),
('m140506_102106_rbac_init', 1472496540);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerimaan`
--

CREATE TABLE IF NOT EXISTS `penerimaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pesanan` int(11) NOT NULL,
  `tgl_penerimaan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_penerimaan` enum('diterima','belum') NOT NULL DEFAULT 'belum',
  PRIMARY KEY (`id`),
  KEY `penerimaan_pesanan_fk` (`no_pesanan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data untuk tabel `penerimaan`
--

INSERT INTO `penerimaan` (`id`, `no_pesanan`, `tgl_penerimaan`, `status_penerimaan`) VALUES
(8, 24, '2016-08-30 19:55:12', 'diterima'),
(19, 25, '2016-08-31 21:10:24', 'diterima'),
(21, 26, '2016-08-31 20:10:24', 'diterima'),
(22, 28, '2016-08-31 23:25:13', 'diterima'),
(23, 29, '2016-09-01 07:35:43', 'diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE IF NOT EXISTS `pengiriman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pengiriman` varchar(20) NOT NULL,
  `tgl_pengiriman` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kode_toko` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pengiriman_toko` (`kode_toko`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`id`, `no_pengiriman`, `tgl_pengiriman`, `kode_toko`) VALUES
(10, 'PG-0001', '2016-08-31 23:00:02', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE IF NOT EXISTS `pesanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pesanan` varchar(15) NOT NULL,
  `tgl_pesanan` date NOT NULL,
  `supplier` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pesanan_supplier_fk` (`supplier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `no_pesanan`, `tgl_pesanan`, `supplier`) VALUES
(24, 'PS-0001', '2016-08-30', 1),
(25, 'PS-0002', '2016-08-30', 2),
(26, 'PS-0003', '2016-08-31', 2),
(28, 'PS-0004', '2016-08-31', 2),
(29, 'PS-0005', '2016-09-01', 1),
(30, 'PS-0006', '2016-09-02', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_supplier` varchar(20) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat_supplier` varchar(1024) NOT NULL,
  `telp_supplier` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `kode_supplier`, `nama_supplier`, `alamat_supplier`, `telp_supplier`) VALUES
(1, 'SP-001', 'CV. AGUSTA', 'Kp Rancabango, RT/RW 02/06, Ds. Rancabango, Kec. Tarogong Kidul, Kab. Garut', '082134564768543'),
(2, 'SP-002', 'CV. LINGGAR JATI', 'Kp. Jati, Ds. Jati, Kec. Tarogong Kidul', '08293846537294');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE IF NOT EXISTS `toko` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_toko` varchar(20) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `alamat_toko` varchar(1024) NOT NULL,
  `telp_toko` varchar(20) NOT NULL,
  `contact_person_toko` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id`, `kode_toko`, `nama_toko`, `alamat_toko`, `telp_toko`, `contact_person_toko`) VALUES
(2, 'TK-001', 'Lestari', 'Kp. Cisarua, Ds. Nagreg, Kab. Bandung', '08123485739584', '08123456843');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'jafar', 'BJvom6aCKmMgyOemOChea63zjkqu0mun', '$2y$13$J7yaeLgb/61ZtjvTaoYvKe8lj1nqlDOVTCSjGEkgxmT0/174lMaNO', NULL, 'jafar@test.com', 10, 1471967757, 1471967757);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `jenis_barang` FOREIGN KEY (`kode_jenis`) REFERENCES `jenis_barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `detail_kirim`
--
ALTER TABLE `detail_kirim`
  ADD CONSTRAINT `detail_kirim_barang_fk` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `detail_kirim_fk` FOREIGN KEY (`no_pengiriman`) REFERENCES `pengiriman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detile_pesanan`
--
ALTER TABLE `detile_pesanan`
  ADD CONSTRAINT `detile_barang_fk` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `detile_pesanan_fk` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD CONSTRAINT `penerimaan_pesanan_fk` FOREIGN KEY (`no_pesanan`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_toko` FOREIGN KEY (`kode_toko`) REFERENCES `toko` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_supplier_fk` FOREIGN KEY (`supplier`) REFERENCES `supplier` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
