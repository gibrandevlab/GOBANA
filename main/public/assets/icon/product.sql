-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 12:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gobana`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_jual` int(8) NOT NULL,
  `harga_diskon` int(8) NOT NULL,
  `sub_kategori` int(5) DEFAULT NULL,
  `stok` int(4) NOT NULL,
  `j_view` int(5) NOT NULL,
  `j_beli` int(5) NOT NULL,
  `gambar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `nama_produk`, `harga_jual`, `harga_diskon`, `sub_kategori`, `stok`, `j_view`, `j_beli`, `gambar`) VALUES
(1, 'Yorkshire Superdome Box', 889000, 1889000, 3, 997, 9, 2, 'bloomflower.jpeg'),
(2, 'Blushing Rose Snow', 639000, 999000, 1, 560, 8, 0, 'buketbunga1.jpeg'),
(3, 'Fiery Passion', 449000, 589000, 1, 100, 4, 0, 'grade.jpeg'),
(4, 'Sweetly Scented', 499000, 679000, 1, 23, 0, 0, 'flower.jpeg'),
(5, 'Eternal Remembrance - Bunga Papan', 1819000, 0, 4, 321, 5, 0, 'papan.jpg'),
(6, 'Rose Enchantment', 599000, 679000, 5, 53, 1, 0, 'vas.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_unique_nama_produk` (`nama_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
