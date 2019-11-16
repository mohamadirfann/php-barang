-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Nov 2019 pada 11.51
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokogrosir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `namaBarang` varchar(255) NOT NULL,
  `hargaBeli` int(11) NOT NULL,
  `hargaJual` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `fotoBarang` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `namaBarang`, `hargaBeli`, `hargaJual`, `stok`, `fotoBarang`) VALUES
(2, 'Sticky Buddy Cleaner Roller - Alat Serbaguna Pembersih Bulu Kotoran', 27000, 33000, 10, '5dce67c668cd8.jpg'),
(67, 'Karcher SE 6100 Carpet Vacuum Cleaner', 7000000, 7500000, 5, '5dce4a7c454a3.jpg'),
(68, 'Kemoceng Microfiber Karakter Animal - Duster Pembersih Debu', 10000, 11000, 19, '5dce4e833b91e.jpg'),
(69, 'Kenmaster KM-935 Vacuum Cleaner Wet Dry 20L', 800000, 850000, 1, '5dce4f737c0a4.jpg'),
(70, 'Paket Lap Microfiber 30x30cm MIPACKO 12pcs', 250000, 276000, 11, '5dce4ff36ef9d.jpg'),
(71, 'PHILIPS Vacuum Cleaner Wireless PowerPro Duo - FC6167', 2560000, 2799123, 3, '5dce5068c1ebb.png'),
(72, 'PHILIPS Robot Vacuum Cleaner FC 8792 Penyedot Debu Robotic FC8792/01', 3500089, 3749123, 3, '5dce50ba8e433.jpg'),
(73, 'BOLDe Super Mop M-788x+', 200000, 225000, 13, '5dce5107dd7f2.jpg'),
(74, 'Dispenser TCL Arisa DWD Kran 2 Panas & Normal', 367000, 399900, 18, '5dce526445d1b.jpg'),
(75, 'Miyako Dispenser Galon Bawah Hot and Cool – WDP300', 990000, 1022000, 6, '5dce52a646b40.jpg'),
(76, 'Sarung Galon / Cover Galon Perlengkapan Dekorasi Ruangan - Fishlight', 50000, 55500, 23, '5dce52da98838.jpg'),
(77, 'Sonifer SF-8010 Super Blender - SF8010 Blender 1.5 liter', 220000, 240000, 3, '5dce536d25334.jpg'),
(78, 'Mayaka Premium Power Blender Elektrik Pelumat Buah PBL-7730 BC', 4780000, 4812500, 5, '5dce53939387c.png'),
(80, 'Mayaka Premium Vacuum Table Blender 1.5 Liter VBL 02 DL', 1578000, 1773750, 9, '5dce54068bba7.png'),
(81, 'Blender Jus Portable 380ml', 60100, 81600, 19, '5dce54512a143.jpg'),
(82, 'Kalno 2 In 1 Nutritional Hand Blender Stainless Steel', 130000, 149900, 2, '5dce54b1048b0.jpg'),
(83, 'Pompa Air Elektrik High Pressure 12V - DP-537', 50000, 69500, 320, '5dce5515c0536.jpg'),
(84, 'Timbangan Dapur Mini Digital Platform Scale 1kg 0.1g - i2000', 390000, 480000, 117, '5dce555866391.jpg'),
(85, 'Taffware e-SPARK Flame Gun Portable Gas Torch - 807', 260700, 28800, 199, '5dce5599f328d.jpg'),
(86, 'KNIFEZER Pisau Saku Lipat Mini Serbaguna Portable Knife Survival - W33', 14000, 18200, 22, '5dce55ec75605.jpg'),
(88, 'Latina Slimo Coffee Mill IND-01 Ceramic Handy Grinder', 238000, 349000, 5, '5dce5b79ba8f9.jpg'),
(89, 'WM IK6973 KAVALKAD Wajan penggorengan teflon 2pcs 20cm 26cm', 100000, 139000, 87, '5dce67992e674.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `namaBarang` (`namaBarang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
