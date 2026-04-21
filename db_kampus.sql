-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 21 Apr 2026 pada 08.59
-- Versi server: 5.7.33
-- Versi PHP: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kampus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `kode_prodi` varchar(10) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  `jenjang` enum('D3','D4') NOT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id`, `kode_prodi`, `nama_prodi`, `jenjang`, `jurusan`, `created_at`, `updated_at`) VALUES
(1, 'TIF', 'Teknik Informatika', 'D4', 'Teknologi Informasi', '2026-04-21 03:20:08', '2026-04-21 03:20:08'),
(2, 'MIF', 'Manajemen Informatika', 'D3', 'Teknologi Informasi', '2026-04-21 03:20:08', '2026-04-21 03:20:08'),
(3, 'TKK', 'Teknik Komputer', 'D3', 'Teknologi Informasi', '2026-04-21 03:20:08', '2026-04-21 03:20:08'),
(4, 'TRK', 'Teknologi Rekayasa Komputer', 'D4', 'Teknologi Informasi', '2026-04-21 03:20:08', '2026-04-21 03:20:08'),
(5, 'TRPL', 'Teknologi Rekayasa Perangkat Lunak', 'D4', 'Teknologi Informasi', '2026-04-21 03:20:08', '2026-04-21 03:20:08'),
(6, 'TET', 'Teknik Energi Terbaruka', 'D4', 'Teknik', '2026-04-21 07:38:14', '2026-04-21 07:38:14'),
(7, 'SIF', 'Sistem Informasi', 'D4', 'Teknologi Informasi', '2026-04-21 07:38:14', '2026-04-21 07:38:14'),
(8, 'AKP', 'Akuntansi Perkantoran', 'D3', 'Bisnis', '2026-04-21 07:38:14', '2026-04-21 07:38:14'),
(9, 'MN01', 'Manajemen Agribisnis', 'D3', 'Manajemen Agribisnis', '2026-04-21 07:38:14', '2026-04-21 07:38:14'),
(10, 'TEL', 'Teknik Elektro', 'D4', 'Teknik', '2026-04-21 07:38:14', '2026-04-21 07:38:14'),
(11, 'PTH', 'Produksi Tanaman Holtikultura', 'D4', 'Produksi Pertanian', '2026-04-21 07:39:30', '2026-04-21 07:39:30'),
(12, 'TNK', 'Peternakan', 'D3', 'Peternakan', '2026-04-21 07:39:30', '2026-04-21 07:39:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'David Juli Ariyadi', 'david_juli@polije.ac.id', '$2y$10$qvL/6F8PxIkVpYxoQufUEecW0W.Pqb3/pqHq8/OkV.rsD.qjCwXfK', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_prodi` (`kode_prodi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
