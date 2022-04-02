-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Mar 2022 pada 00.40
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_cafe_ci4`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `e_wallet`
--

CREATE TABLE `e_wallet` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_wallet` varchar(255) NOT NULL,
  `saldo` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(21, '2022-02-25-081007', 'App\\Database\\Migrations\\TbLogin', 'default', 'App', 1646518142, 1),
(22, '2022-02-25-082815', 'App\\Database\\Migrations\\TbLogintoken', 'default', 'App', 1646518142, 1),
(23, '2022-03-05-074252', 'App\\Database\\Migrations\\TbMenu', 'default', 'App', 1646518143, 1),
(24, '2022-03-05-203202', 'App\\Database\\Migrations\\TbProfile', 'default', 'App', 1646518145, 1),
(25, '2022-03-05-205020', 'App\\Database\\Migrations\\TbKeranjangmenu', 'default', 'App', 1646518146, 1),
(26, '2022-03-05-205039', 'App\\Database\\Migrations\\EWallet', 'default', 'App', 1646518147, 1),
(27, '2022-03-05-205107', 'App\\Database\\Migrations\\TbRiwayatsaldo', 'default', 'App', 1646518148, 1),
(28, '2022-03-05-205139', 'App\\Database\\Migrations\\TbTranksaksi', 'default', 'App', 1646518151, 1),
(29, '2022-03-05-205553', 'App\\Database\\Migrations\\TbRiwayatkeranjangmenu', 'default', 'App', 1646518152, 1),
(30, '2022-03-06-050451', 'App\\Database\\Migrations\\TbFavmenu', 'default', 'App', 1646546961, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_favmenu`
--

CREATE TABLE `tb_favmenu` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_favmenu`
--

INSERT INTO `tb_favmenu` (`id`, `id_menu`, `id_pembeli`, `rate`, `created_at`, `updated_at`) VALUES
(112, 4, 52, 1, '2022-03-13 00:25:17', '2022-03-13 00:25:17'),
(113, 3, 52, 1, '2022-03-13 01:05:54', '2022-03-13 01:05:54'),
(114, 2, 52, 1, '2022-03-14 01:50:17', '2022-03-14 01:50:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keranjangmenu`
--

CREATE TABLE `tb_keranjangmenu` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `nama_menu` varchar(40) NOT NULL,
  `gambar_menu` varchar(200) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_keranjangmenu`
--

INSERT INTO `tb_keranjangmenu` (`id`, `id_menu`, `id_pembeli`, `nama_menu`, `gambar_menu`, `jumlah`, `harga`, `total_harga`, `status`, `created_at`, `updated_at`) VALUES
(98, 2, 50, 'makanan2', 'ayam-bakar.png', 1, 4000, 4000, 'masuk', '2022-03-12 19:38:17', '2022-03-12 23:46:55'),
(99, 4, 52, 'minuman2', 'kopi-tiramisu.png', 5, 3000, 15000, 'masuk', '2022-03-13 00:25:24', '2022-03-14 23:31:12'),
(100, 2, 52, 'makanan2', 'ayam-bakar.png', 6, 4000, 24000, 'masuk', '2022-03-14 01:51:58', '2022-03-14 04:00:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`id`, `username`, `email`, `password`, `role`, `is_active`, `created_at`, `updated_at`) VALUES
(6, 'xilder', 'wildanfajar71@gmail.com', '$2y$10$h9MQTMANB7FjjvAkJzUE3OszZTXvFnDtalyuyFjzR0zQGLGeALROq', 'user', 1, '2022-03-08 20:51:44', '2022-03-11 21:16:58'),
(8, 'didik', 'wildanirithel@gmail.com', '$2y$10$tyEtVuqd80lwC2kTQLYuI.SNgqjFp1P02L8TE2t23UvMiKhWelNaO', 'user', 1, '2022-03-11 21:09:20', '2022-03-11 21:09:20'),
(9, 'admin', 'admin@gmail.com', 'admin', 'admin', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'koo', 'koko@gmail.com', '$2y$10$L5QLsRCkUoNzLicZJ/6TVuGyUFNvkmAX/J1roHissAbtfBf6qSrRG', 'petugas', 1, '2022-03-12 03:51:40', '2022-03-12 03:51:40'),
(11, 'wildan', 'wildanfajar5s7@gmail.com', '$2y$10$NC6.VMRy6BkkmryvkhtbEuOuwwCuoeMyLKKmX5bmzkv9bo5KjQZJe', 'petugas', 0, '2022-03-12 03:56:33', '2022-03-12 03:56:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_logintoken`
--

CREATE TABLE `tb_logintoken` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_menu`
--

INSERT INTO `tb_menu` (`id`, `nama`, `gambar`, `harga`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'makanan1', 'bandeng-presto.png', 2000, 'makanan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'makanan2', 'ayam-bakar.png', 4000, 'makanan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'minuman1', 'kopi-arabica.png', 3000, 'minuman', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'minuman2', 'kopi-tiramisu.png', 3000, 'minuman', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profile`
--

CREATE TABLE `tb_profile` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_login` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `saldo` int(11) NOT NULL,
  `pin` int(11) NOT NULL,
  `cekPin` int(1) NOT NULL,
  `cekMail` int(1) NOT NULL,
  `pinTranksaksi` int(1) NOT NULL,
  `pinKirimSaldo` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_profile`
--

INSERT INTO `tb_profile` (`id`, `id_login`, `nama`, `email`, `nomor`, `foto`, `alamat`, `saldo`, `pin`, `cekPin`, `cekMail`, `pinTranksaksi`, `pinKirimSaldo`, `created_at`, `updated_at`) VALUES
(52, 6, 'Wildan Fajar Maulana', 'wildanfajar71@gmail.com', '08973202713', '1647247439_81ada83bcad4c13ecea3.jpg', ' jl.simpang sulfat', 20000, 8888, 0, 0, 0, 0, '2022-03-13 00:24:34', '2022-03-15 00:01:17'),
(53, 8, 'irithel', 'wildanirithel@gmail.com', '08973202712', 'default.png', ' jl.simpang sulfat', 55000, 1111, 0, 1, 0, 0, '2022-03-14 04:34:20', '2022-03-14 23:59:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_riwayatkeranjangmenu`
--

CREATE TABLE `tb_riwayatkeranjangmenu` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_tranksaksi` int(11) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `jumlah_menu` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_riwayatsaldo`
--

CREATE TABLE `tb_riwayatsaldo` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `saldo` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_riwayatsaldo`
--

INSERT INTO `tb_riwayatsaldo` (`id`, `id_pembeli`, `id_petugas`, `id_penerima`, `deskripsi`, `saldo`, `created_at`, `updated_at`) VALUES
(10, 52, 0, 53, 'Mengirim Saldo', 10000, '2022-03-14 18:02:09', '2022-03-14 18:02:09'),
(11, 52, 0, 53, 'Mengirim Saldo', 15000, '2022-03-14 18:02:41', '2022-03-14 18:02:41'),
(12, 52, 0, 53, 'Mengirim Saldo', 10000, '2022-03-14 18:04:47', '2022-03-14 18:04:47'),
(13, 52, 0, 53, 'Mengirim Saldo', 10000, '2022-03-14 18:15:15', '2022-03-14 18:15:15'),
(14, 52, 0, 53, 'Mengirim Saldo', 10000, '2022-03-14 23:59:00', '2022-03-14 23:59:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tranksaksi`
--

CREATE TABLE `tb_tranksaksi` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nama_pembeli` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `pengiriman` varchar(255) NOT NULL,
  `status_tranksaksi` varchar(255) NOT NULL,
  `show_pemesanan` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_tranksaksi`
--

INSERT INTO `tb_tranksaksi` (`id`, `id_pembeli`, `id_petugas`, `nama_pembeli`, `payment`, `total_pembayaran`, `pengiriman`, `status_tranksaksi`, `show_pemesanan`, `created_at`, `updated_at`) VALUES
(18, 52, 0, 'Wildan Fajar Maulana', 'tunai ', 6000, 'Ruang Teori 3 ', 'selesai', 1, '2022-03-13 00:27:19', '2022-03-13 00:28:29'),
(19, 52, 0, 'Wildan Fajar Maulana', 'tunai ', 6000, 'Ruang Teori 2 ', 'selesai', 1, '2022-03-13 00:54:02', '2022-03-13 01:05:40'),
(20, 52, 0, 'Wildan Fajar Maulana', 'tunai ', 6000, 'Ruang Teori 2 ', 'selesai', 1, '2022-03-13 03:02:46', '2022-03-13 03:04:54'),
(21, 52, 0, 'Wildan Fajar Maulana', 'tunai ', 20000, 'Ruang Teori 3 ', 'selesai', 1, '2022-03-14 01:52:14', '2022-03-14 02:58:45'),
(22, 52, 0, 'Wildan Fajar Maulana', 'tunai ', 20000, 'Ruang Teori 2 ', 'selesai', 1, '2022-03-14 03:40:27', '2022-03-14 03:42:35');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `e_wallet`
--
ALTER TABLE `e_wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_favmenu`
--
ALTER TABLE `tb_favmenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `tb_keranjangmenu`
--
ALTER TABLE `tb_keranjangmenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_pembeli` (`id_pembeli`);

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_logintoken`
--
ALTER TABLE `tb_logintoken`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_profile`
--
ALTER TABLE `tb_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_login` (`id_login`);

--
-- Indeks untuk tabel `tb_riwayatkeranjangmenu`
--
ALTER TABLE `tb_riwayatkeranjangmenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `id_tranksaksi` (`id_tranksaksi`);

--
-- Indeks untuk tabel `tb_riwayatsaldo`
--
ALTER TABLE `tb_riwayatsaldo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_penerima` (`id_penerima`) USING BTREE;

--
-- Indeks untuk tabel `tb_tranksaksi`
--
ALTER TABLE `tb_tranksaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `e_wallet`
--
ALTER TABLE `e_wallet`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tb_favmenu`
--
ALTER TABLE `tb_favmenu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT untuk tabel `tb_keranjangmenu`
--
ALTER TABLE `tb_keranjangmenu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_logintoken`
--
ALTER TABLE `tb_logintoken`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_profile`
--
ALTER TABLE `tb_profile`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `tb_riwayatkeranjangmenu`
--
ALTER TABLE `tb_riwayatkeranjangmenu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_riwayatsaldo`
--
ALTER TABLE `tb_riwayatsaldo`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_tranksaksi`
--
ALTER TABLE `tb_tranksaksi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
