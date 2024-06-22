-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 22 Jun 2024 pada 18.20
-- Versi server: 10.5.23-MariaDB-0+deb11u1
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kcr`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id_kategori`, `kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'Ekstra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` varchar(20) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `name`, `category_id`, `price`, `description`, `image`) VALUES
(1, 'Nasi Rames', 1, '6000', '', 'nasirames.jpg'),
(2, 'Pecel', 1, '6000', NULL, 'pecel.jpg'),
(3, 'Chicken Katsu', 1, '10000', NULL, 'chickenkatsu.jpg'),
(4, 'Nasi Goreng Telur', 1, '10000', NULL, 'nasigorengtelur.jpg'),
(5, 'Nasi Ayam Geprek', 1, '12000', NULL, 'nasiayamgeprek.jpg'),
(6, 'Nasi Mangut', 1, '10000', NULL, 'nasimangut.jpg'),
(7, 'Pop Mie', 1, '6000', NULL, 'popmie.jpg'),
(8, 'Nasi Putih', 1, '4000', NULL, 'nasiputih.jpg'),
(9, 'Soto Kecil', 1, '6000', NULL, 'sotokecil.jpg'),
(10, 'Soto Besar', 1, '7000', NULL, 'sotobesar.jpg'),
(11, 'Indomie', 1, '6000', NULL, 'indomie.jpg'),
(12, 'Omellet Indomie', 1, '10000', NULL, 'omelletindomie.jpg'),
(13, 'Telur Ceplok', 3, '3000', NULL, 'telurceplok.jpg'),
(14, 'Telur Dadar', 3, '3000', NULL, 'telurdadar.jpg'),
(15, 'Telur Balado', 3, '4000', NULL, 'telurbalado.jpg'),
(16, 'Bakso', 3, '3000', NULL, 'bakso.jpg'),
(17, 'Ayam Suir', 3, '3000', NULL, 'ayamsuir.jpg'),
(18, 'Katsu', 3, '4000', NULL, 'katsu.jpg'),
(19, 'Teh Manis', 2, '3000', NULL, 'tehmanis.jpg'),
(20, 'Jeruk', 2, '4000', NULL, 'jeruk.jpg'),
(21, 'Milo Biasa', 2, '4000', NULL, 'milobiasa.jpg'),
(22, 'Milo 3in1', 2, '6000', NULL, 'milo3in1.jpg'),
(23, 'Kopi Hitam', 2, '4000', NULL, 'kopihitam.jpg'),
(24, 'Kopi Krim/Susu', 2, '5000', NULL, 'kopikrimsusu.jpg'),
(25, 'Cappucino', 2, '6000', NULL, 'cappucino.jpg'),
(26, 'Nutrisari', 2, '4000', NULL, 'nutrisari.jpg'),
(27, 'Air Mineral', 2, '4000', NULL, 'airmineral.jpg'),
(28, 'Air Es', 2, '1000', NULL, 'aires.jpg'),
(29, 'Teh Pucuk', 2, '4000', NULL, 'tehpucuk.jpg'),
(30, 'Good Mood', 2, '6000', NULL, 'goodmood.jpg'),
(31, 'Oky Jelly Botol', 2, '6000', NULL, 'okyjellybotol.jpg'),
(32, 'Floridina', 2, '3000', NULL, 'floridina.jpg'),
(109, 'nopal', 3, '5000', '', NULL),
(111, 'Nasi Rames', 1, '6000', '', '45c15263b0e76a8668ee9f06c46a1a1e.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `cust` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `request_at` date NOT NULL,
  `total` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `cust`, `user_id`, `request_at`, `total`) VALUES
(21, 'alif', 7, '2024-05-25', '6000'),
(22, 'nazih', 7, '2024-05-25', '12000'),
(23, 'rico', 7, '2024-05-25', '12000'),
(24, 'naufal', 1, '2024-05-25', '32000'),
(25, 'test', 1, '2024-05-26', '6000'),
(26, 'test clear', 1, '2024-05-26', '6000'),
(27, 'test', 1, '2024-05-26', '6000'),
(28, 'pecel', 1, '2024-05-26', '6000'),
(29, 'cb', 1, '2024-05-26', '6000'),
(30, 'test', 1, '2024-05-26', '6000'),
(32, 'acegap', 1, '2024-05-27', '6000'),
(33, 'test toast', 1, '2024-05-27', '6000'),
(34, 'toastcuy', 1, '2024-05-27', '6000'),
(35, 'cblg', 1, '2024-05-27', '16000'),
(36, 'cblg', 1, '2024-05-27', '6000'),
(37, 'rames', 1, '2024-05-27', '6000'),
(38, 'rames', 1, '2024-05-27', '6000'),
(39, 'rames', 1, '2024-05-27', '6000'),
(40, 'cb', 1, '2024-05-27', '6000'),
(41, 'asegaf', 1, '2024-05-27', '10000'),
(42, 'last brok', 1, '2024-05-27', '6000'),
(43, 'ace', 1, '2024-05-27', '6000'),
(44, 'nambah', 1, '2024-05-28', '6000'),
(45, '', 1, '2024-05-28', '6000'),
(46, '', 1, '2024-05-28', '32000'),
(47, 'parel', 1, '2024-05-29', '12000'),
(48, 'cobak', 1, '2024-05-29', '6000'),
(49, 'aslf', 1, '2024-05-29', '12000'),
(50, 'kjfvakjfv', 1, '2024-05-29', '12000'),
(51, 'asfjbasjl', 1, '2024-05-29', '6000'),
(52, 'saljbaldjf', 1, '2024-05-29', '12000'),
(53, 'rico', 1, '2024-05-31', '6000'),
(54, 'alip', 1, '2024-06-06', '9000'),
(55, 'balya', 1, '2024-06-07', '9000'),
(56, 'alif', 1, '2024-06-13', '12000'),
(57, 'kelompok4', 1, '2024-06-13', '9000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions_details`
--

CREATE TABLE `transactions_details` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transactions_details`
--

INSERT INTO `transactions_details` (`id`, `transaction_id`, `menu_id`, `qty`, `subtotal`) VALUES
(17, 21, 7, 1, '6000'),
(18, 22, 1, 1, '6000'),
(19, 22, 2, 1, '6000'),
(20, 23, 1, 1, '6000'),
(21, 23, 2, 1, '6000'),
(22, 24, 12, 2, '20000'),
(23, 24, 11, 2, '12000'),
(24, 25, 1, 1, '6000'),
(25, 26, 1, 1, '6000'),
(26, 27, 2, 1, '6000'),
(27, 28, 1, 1, '6000'),
(28, 29, 1, 1, '6000'),
(29, 30, 1, 1, '6000'),
(31, 30, 1, 1, '6000'),
(32, 30, 1, 1, '6000'),
(33, 32, 1, 1, '6000'),
(34, 33, 2, 1, '6000'),
(35, 34, 2, 1, '6000'),
(36, 35, 2, 1, '6000'),
(37, 35, 3, 1, '10000'),
(38, 35, 2, 1, '6000'),
(39, 36, 2, 1, '6000'),
(40, 37, 1, 1, '6000'),
(41, 38, 1, 1, '6000'),
(42, 39, 1, 1, '6000'),
(43, 40, 2, 1, '6000'),
(44, 41, 3, 1, '10000'),
(45, 42, 2, 1, '6000'),
(46, 43, 1, 1, '6000'),
(47, 44, 2, 1, '6000'),
(48, 45, 1, 1, '6000'),
(49, 46, 12, 2, '20000'),
(50, 46, 11, 2, '12000'),
(51, 47, 1, 1, '6000'),
(52, 47, 2, 1, '6000'),
(53, 47, 3, 1, '10000'),
(54, 47, 4, 1, '10000'),
(55, 48, 2, 1, '6000'),
(56, 49, 1, 1, '6000'),
(57, 49, 2, 1, '6000'),
(58, 50, 1, 1, '6000'),
(59, 50, 2, 1, '6000'),
(60, 51, 1, 1, '6000'),
(61, 52, 1, 1, '6000'),
(62, 52, 2, 1, '6000'),
(63, 52, 2, 1, '6000'),
(64, 52, 1, 1, '6000'),
(65, 52, 3, 1, '10000'),
(66, 53, 2, 1, '6000'),
(67, 54, 2, 1, '6000'),
(68, 54, 19, 1, '3000'),
(69, 55, 11, 1, '6000'),
(70, 55, 19, 1, '3000'),
(71, 56, 1, 2, '12000'),
(72, 57, 2, 1, '6000'),
(73, 57, 19, 1, '3000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(256) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `is_admin`) VALUES
(1, 'admin', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1),
(2, 'Bu Ayu', 'ayu123', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 0),
(3, 'Bu Sri', 'sri123', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 0),
(4, 'nazih', 'naz', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 0),
(5, 'balya', 'bal', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 0),
(7, 'peri', 'peri', '800209544e70095395b55516cb97ffecf763bb2aaf7a1a87c7b7189666aa48b9', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`category_id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelanggan` (`cust`),
  ADD KEY `id_karyawan` (`user_id`);

--
-- Indeks untuk tabel `transactions_details`
--
ALTER TABLE `transactions_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pemesanan` (`transaction_id`),
  ADD KEY `id_menu` (`menu_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_IDX` (`username`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `transactions_details`
--
ALTER TABLE `transactions_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `id_kategori` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `request_user_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `transactions_details`
--
ALTER TABLE `transactions_details`
  ADD CONSTRAINT `request_details_menus_FK` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  ADD CONSTRAINT `transactions_details_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
