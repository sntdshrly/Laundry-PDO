-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 11:09 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(30) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id`, `nama_barang`, `harga`) VALUES
(1, 'Kaos', 5000),
(2, 'Kemeja', 10000),
(3, 'Batik', 50000),
(4, 'Gaun', 100000),
(5, 'Kebaya', 200000),
(6, 'Bed Cover', 60000),
(7, 'Rok', 30000),
(8, 'Sweater', 60000),
(9, 'Jaket', 60000),
(10, 'Jas/Blazer', 100000),
(11, 'Celana Pendek', 45000),
(12, 'Celana Panjang', 80000),
(13, 'Sarung', 23000),
(14, 'Tas', 88000),
(15, 'Kerudung', 90000),
(16, 'Blouse', 125000),
(17, 'Bantal', 90000),
(18, 'Sarung Bantal', 48000),
(19, 'Handuk', 135000),
(26, 'Keset', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `jenis_laundry` varchar(20) DEFAULT NULL,
  `massa_barang` int(3) DEFAULT NULL,
  `jumlah_barang` int(3) DEFAULT NULL,
  `waktu_pengambilan` date DEFAULT NULL,
  `alamat` varchar(80) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `status_pemesanan` varchar(50) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `jenis_laundry`, `massa_barang`, `jumlah_barang`, `waktu_pengambilan`, `alamat`, `catatan`, `status_pemesanan`, `id_user`) VALUES
(1032, 'Kaos', 1, 1, '2020-02-21', 'Jalan Semar 21', 'Dry Clean', 'Courier picks up your laundry', 89);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(10) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `rating` varchar(10) DEFAULT NULL,
  `komentar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id_rating`, `email`, `rating`, `komentar`) VALUES
(11, '2072025@maranatha.ac.id', '4', 'Overall good.');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(20) NOT NULL,
  `supplier_name` varchar(20) NOT NULL,
  `supplier_address` varchar(20) NOT NULL,
  `supplier_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_address`, `supplier_phone`) VALUES
(2, 'PT.Wings', 'Jl. Caringin No.341', '08112048990');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nomor_telepon` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `nomor_telepon`, `role`) VALUES
(1, 'Admin Laundry Maranatha', 'admin@maranatha.ac.id', 'admin', '0811234568', 'admin'),
(89, 'Sherly Santiadi', '2072025@maranatha.ac.id', 'sherlysantiadi', '0811230988', 'user'),
(93, 'Nisa Deviani Agustin Ruis', '2072051@maranatha.ac.id', 'nisadeviani', '0811230977', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1033;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
