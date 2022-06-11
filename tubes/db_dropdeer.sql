-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jun 2022 pada 07.12
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dropdeer`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `idcart` int(11) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `tglorder` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL DEFAULT 'Cart'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`idcart`, `orderid`, `userid`, `tglorder`, `status`) VALUES
(10, '15wKVT0nej25Y', 2, '2020-03-16 12:10:42', 'Selesai'),
(11, '15Swf8Ye0Fm.M', 2, '2020-03-16 12:17:34', 'Payment'),
(12, '15PzF03ejd8W2', 1, '2020-05-13 02:40:48', 'Confirmed'),
(13, '16t0t.kkUepEQ', 1, '2022-06-10 19:36:45', 'Payment'),
(14, '16Hhsj.ugUAgE', 2, '2022-06-10 19:44:08', 'Cart');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailorder`
--

CREATE TABLE `detailorder` (
  `detailid` int(11) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detailorder`
--

INSERT INTO `detailorder` (`detailid`, `orderid`, `idproduk`, `qty`) VALUES
(15, '15Swf8Ye0Fm.M', 5, 2),
(16, '16t0t.kkUepEQ', 5, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(11) NOT NULL,
  `namakategori` varchar(20) NOT NULL,
  `tgldibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`idkategori`, `namakategori`, `tgldibuat`) VALUES
(1, 'Laptop', '2019-12-20 07:28:34'),
(2, 'Handphone', '2019-12-20 07:34:17'),
(3, 'Jam Tangan', '2020-03-16 12:15:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `idkonfirmasi` int(11) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `tglbayar` date NOT NULL,
  `tglsubmit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`idkonfirmasi`, `orderid`, `userid`, `tglbayar`, `tglsubmit`) VALUES
(1, '15PzF03ejd8W2', 1, '2020-05-16', '2020-05-13 02:41:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `userid` int(11) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgljoin` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(7) NOT NULL DEFAULT 'Member',
  `lastlogin` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`userid`, `namalengkap`, `email`, `password`, `notelp`, `alamat`, `tgljoin`, `role`, `lastlogin`) VALUES
(1, 'Admin', 'admin', '$2y$10$GJVGd4ji3QE8ikTBzNyA0uLQhiGd6MirZeSJV1O6nUpjSVp1eaKzS', '01234567890', 'Indonesia', '2020-03-16 11:31:17', 'Admin', NULL),
(2, 'Guest', 'guest', '$2y$10$xXEMgj5pMT9EE0QAx3QW8uEn155Je.FHH5SuIATxVheOt0Z4rhK6K', '01234567890', 'Indonesia', '2020-03-16 11:30:40', 'Member', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `no` int(11) NOT NULL,
  `logo` text DEFAULT NULL,
  `an` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(11) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `namaproduk` varchar(30) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `rate` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tgldibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`idproduk`, `idkategori`, `namaproduk`, `gambar`, `deskripsi`, `rate`, `harga`, `tgldibuat`) VALUES
(5, 1, 'ROG STRIX', 'produk/16z2henVzgoJs.jpg', '123', 5, 123123, '2022-06-10 18:34:06'),
(6, 1, 'ROG', 'produk/162nBTJflkLPY.jpg', 'Laptop Rog Memiliki Performa Yang Baik.', 5, 123123, '2022-06-10 18:47:14');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idcart`),
  ADD UNIQUE KEY `orderid` (`orderid`),
  ADD KEY `orderid_2` (`orderid`);

--
-- Indeks untuk tabel `detailorder`
--
ALTER TABLE `detailorder`
  ADD PRIMARY KEY (`detailid`),
  ADD KEY `orderid` (`orderid`),
  ADD KEY `idproduk` (`idproduk`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indeks untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`idkonfirmasi`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`userid`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`),
  ADD KEY `idkategori` (`idkategori`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `idcart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `detailorder`
--
ALTER TABLE `detailorder`
  MODIFY `detailid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `idkonfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detailorder`
--
ALTER TABLE `detailorder`
  ADD CONSTRAINT `idproduk` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`idproduk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderid` FOREIGN KEY (`orderid`) REFERENCES `cart` (`orderid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `login` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `idkategori` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`idkategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
