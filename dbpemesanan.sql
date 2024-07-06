-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jul 2024 pada 05.56
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpemesanan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(50) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `total_belanja` int(50) NOT NULL,
  `metode_pembayaran` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `tanggal_pemesanan`, `total_belanja`, `metode_pembayaran`) VALUES
(43, '2024-06-09', 13000, 0),
(44, '2024-06-09', 17000, 0),
(45, '2024-06-10', 17000, 0),
(46, '2024-06-11', 26000, 0),
(47, '2024-06-12', 30000, 0),
(48, '2024-06-12', 17000, 0),
(49, '2024-06-13', 23000, 0),
(50, '2024-06-20', 14000, 0),
(51, '2024-06-24', 47000, 0),
(52, '2024-06-24', 10000, 0),
(53, '2024-06-24', 10000, 0),
(54, '2024-06-24', 12000, 0),
(55, '2024-06-25', 50000, 0),
(56, '2024-06-25', 8000, 0),
(57, '2024-06-25', 20000, 0),
(58, '2024-06-25', 13000, 0),
(59, '2024-06-25', 22000, 0),
(60, '2024-06-25', 13000, 0),
(61, '2024-06-25', 26000, 0),
(62, '2024-06-28', 40000, 0),
(63, '2024-06-28', 46000, 0),
(64, '2024-06-30', 64000, 0),
(65, '2024-07-06', 13000, 0),
(66, '2024-07-06', 8000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_produk`
--

CREATE TABLE `pemesanan_produk` (
  `id_pemesanan_produk` int(50) NOT NULL,
  `id_pemesanan` int(50) NOT NULL,
  `id_menu` varchar(50) NOT NULL,
  `jumlah` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesanan_produk`
--

INSERT INTO `pemesanan_produk` (`id_pemesanan_produk`, `id_pemesanan`, `id_menu`, `jumlah`) VALUES
(7, 32, '9', 1),
(8, 32, '11', 1),
(9, 33, '16', 1),
(10, 33, '6', 1),
(11, 34, '13', 1),
(12, 34, '8', 1),
(13, 34, '9', 1),
(14, 34, '17', 1),
(15, 35, '9', 2),
(16, 35, '14', 1),
(17, 36, '8', 1),
(18, 37, '13', 1),
(19, 37, '16', 1),
(20, 38, '8', 1),
(21, 39, '9', 1),
(22, 39, '16', 1),
(23, 40, '10', 1),
(24, 40, '14', 1),
(25, 41, '17', 1),
(26, 41, '10', 1),
(27, 41, '9', 2),
(28, 42, '9', 1),
(29, 42, '14', 1),
(30, 42, '7', 1),
(31, 42, '17', 1),
(32, 43, '7', 1),
(33, 44, '8', 1),
(34, 45, '7', 1),
(35, 45, '17', 1),
(36, 46, '7', 2),
(37, 47, '9', 1),
(38, 47, '14', 1),
(39, 48, '8', 1),
(40, 49, '7', 1),
(41, 49, '14', 1),
(42, 50, '12', 1),
(43, 50, '10', 1),
(44, 51, '8', 1),
(45, 51, '11', 1),
(46, 51, '13', 1),
(47, 51, '6', 1),
(48, 52, '14', 1),
(49, 53, '14', 1),
(50, 54, '6', 1),
(51, 55, '9', 2),
(52, 55, '11', 1),
(53, 56, '13', 1),
(54, 57, '9', 1),
(55, 58, '7', 1),
(56, 59, '15', 1),
(57, 59, '10', 1),
(58, 60, '7', 1),
(59, 61, '7', 2),
(60, 62, '9', 2),
(61, 63, '7', 2),
(62, 63, '6', 1),
(63, 63, '13', 1),
(64, 64, '6', 2),
(65, 64, '11', 1),
(66, 64, '13', 2),
(67, 64, '14', 1),
(68, 64, '17', 1),
(69, 65, '7', 1),
(70, 66, '13', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_menu` int(50) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `jenis_menu` varchar(50) NOT NULL,
  `stok` int(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_menu`, `nama_menu`, `jenis_menu`, `stok`, `harga`, `gambar`) VALUES
(6, 'Bakso Urat', 'Makanan', 80, 12000, 'bakso.jpeg'),
(7, 'Mie Ayam', 'Makanan', 50, 13000, 'mieayam.jpg'),
(8, 'Mie Ayam Bakso', 'Makanan', 50, 17000, 'mieayambakso.jpg'),
(9, 'Ayam Bakar', 'Makanan', 45, 20000, 'ayambakar.jpg'),
(10, 'Lele Bakar', 'Makanan', 50, 12000, 'lele.jpg'),
(11, 'Nasi Goreng', 'Makanan', 78, 10000, 'nasgor.jpg'),
(12, 'Nasi Putih', 'Makanan', 100, 2000, 'nasi.jpeg'),
(13, 'Es Jeruk', 'Makanan', 55, 8000, 'esjeruk.jpg'),
(14, 'Jus Alpukat', 'Minuman', 50, 10000, 'juspukat.jpg'),
(15, 'Jus Mangga', 'Minuman', 50, 10000, 'jusmangga.jpg'),
(16, 'Teh Obeng', 'Minuman', 60, 5000, 'tehobeng.jpg'),
(17, 'Air Mineral', 'Minuman', 100, 4000, 'sanford.jpg'),
(25, 'Ayam Goreng', '', 9999, 25000, 'ayam goreng.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `hp` varchar(25) NOT NULL,
  `status` enum('admin','user','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `hp`, `status`) VALUES
(7, 'irgi', 'irgi', 'Irgi A', 'Laki-Laki', '2003-09-01', 'Jl. Baumassepe no.19', '085688278321', 'user'),
(8, 'dara', 'dara', 'daraa', 'Perempuan', '2005-01-01', 'Jl. Baumassepe no.17', '081737549387', 'user'),
(11, 'dhara', 'dhara', 'dhara', 'Perempuan', '2004-03-01', 'Jl. Baumassepe no.17', '081737549366', 'user'),
(13, 'admin@admin.com', 'admin', 'admin', 'Perempuan', '2004-03-02', 'parepare', '083757653652', 'admin'),
(14, 'dikriani', 'dikri11', 'Dikriani', 'Perempuan', '2004-03-09', 'jl. pembangunan ', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indeks untuk tabel `pemesanan_produk`
--
ALTER TABLE `pemesanan_produk`
  ADD PRIMARY KEY (`id_pemesanan_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `pemesanan_produk`
--
ALTER TABLE `pemesanan_produk`
  MODIFY `id_pemesanan_produk` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_menu` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
