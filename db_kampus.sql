-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 29 Apr 2026 pada 10.05
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
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `kode_jurusan` varchar(10) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `kode_jurusan`, `nama_jurusan`, `created_at`, `updated_at`) VALUES
(1, 'PP', 'Produksi Pertanian', '2026-04-21 02:15:26', '2026-04-21 02:15:26'),
(2, 'TP', 'Teknologi Pertanian', '2026-04-21 02:15:26', '2026-04-21 02:15:26'),
(3, 'TNK', 'Peternakan', '2026-04-21 02:15:26', '2026-04-21 02:15:26'),
(4, 'MNA', 'Manajemen Agribisnis', '2026-04-21 02:15:26', '2026-04-21 02:15:26'),
(5, 'BKP', 'Bahasa, Komunikasi dan Pariwisata', '2026-04-21 02:15:26', '2026-04-23 03:10:03'),
(6, 'TI', 'Teknologi Informasi', '2026-04-21 02:15:26', '2026-04-21 02:15:26'),
(7, 'KES', 'Kesehatan', '2026-04-21 02:15:26', '2026-04-21 02:15:26'),
(8, 'TEK', 'Teknik', '2026-04-21 02:15:26', '2026-04-21 02:15:26'),
(9, 'BIS', 'Bisnis & Manajemen', '2026-04-21 02:15:26', '2026-04-28 02:05:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `prodi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `prodi`, `created_at`, `updated_at`) VALUES
(1, '220001', 'Ahmad Fauzi', 1, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(2, '220002', 'Siti Aisyah', 2, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(3, '220003', 'Budi Santoso', 3, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(4, '220004', 'Dewi Lestari', 4, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(5, '220005', 'Rizky Pratama', 5, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(6, '220006', 'Putri Ayu', 6, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(7, '220007', 'Agus Salim', 7, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(8, '220008', 'Nurul Hidayah', 8, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(9, '220009', 'Fajar Nugroho', 9, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(10, '220010', 'Lina Marlina', 10, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(11, '220011', 'Hendra Wijaya', 11, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(12, '220012', 'Sri Wahyuni', 12, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(13, '220013', 'Dedi Kurniawan', 1, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(14, '220014', 'Maya Sari', 2, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(15, '220015', 'Andi Saputra', 3, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(16, '220016', 'Rina Oktaviani', 4, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(17, '220017', 'Yoga Prasetyo', 5, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(18, '220018', 'Tika Ramadhani', 6, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(19, '220019', 'Rudi Hartono', 7, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(20, '220020', 'Fitriani Putri', 8, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(21, '220021', 'Eko Prabowo', 9, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(22, '220022', 'Dian Permata', 10, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(23, '220023', 'Arif Setiawan', 11, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(24, '220024', 'Wulan Sari', 12, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(25, '220025', 'Bayu Anggara', 1, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(26, '220026', 'Indah Pertiwi', 2, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(27, '220027', 'Ari Nugraha', 3, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(28, '220028', 'Sari Dewi', 4, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(29, '220029', 'Rangga Saputra', 5, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(30, '220030', 'Nabila Zahra', 6, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(31, '220031', 'Ilham Maulana', 7, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(32, '220032', 'Zahra Putri', 8, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(33, '220033', 'Fikri Ramadhan', 9, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(34, '220034', 'Yuni Kartika', 10, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(35, '220035', 'Gilang Prakoso', 11, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(36, '220036', 'Anisa Rahma', 12, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(37, '220037', 'Wahyu Hidayat', 1, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(38, '220038', 'Citra Lestari', 2, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(39, '220039', 'Aditiya Putra', 3, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(40, '220040', 'Salsa Billa', 4, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(41, '220041', 'Reza Maulana', 5, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(42, '220042', 'Melati Sari', 6, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(43, '220043', 'Iqbal Ramadhan', 7, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(44, '220044', 'Nadia Putri', 8, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(45, '220045', 'Joko Susilo', 9, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(46, '220046', 'Putri Amelia', 10, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(47, '220047', 'Rizal Fahmi', 11, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(48, '220048', 'Desi Anggraini', 12, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(49, '220049', 'Taufik Hidayat', 1, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(50, '220050', 'Ratna Dewi', 2, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(51, '220051', 'Andika Pratama', 3, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(52, '220052', 'Suci Lestari', 4, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(53, '220053', 'Hafiz Rahman', 5, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(54, '220054', 'Aulia Putri', 6, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(55, '220055', 'Bagus Saputra', 7, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(56, '220056', 'Rani Oktavia', 8, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(57, '220057', 'Ferry Irawan', 9, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(58, '220058', 'Linda Sari', 10, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(59, '220059', 'Dimas Prasetyo', 11, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(60, '220060', 'Mira Wulandari', 12, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(61, '220061', 'Alif Maulana', 1, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(62, '220062', 'Nur Aini', 2, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(63, '220063', 'Yusuf Hidayat', 3, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(64, '220064', 'Siska Dewi', 4, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(65, '220065', 'Ricky Saputra', 5, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(66, '220066', 'Nisa Rahma', 6, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(67, '220067', 'Heri Setiawan', 7, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(68, '220068', 'Dina Kartika', 8, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(69, '220069', 'Arman Hakim', 9, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(70, '220070', 'Putri Nabila', 10, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(71, '220071', 'Fauzan Ramadhan', 11, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(72, '220072', 'Rika Melati', 12, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(73, '220073', 'Zaki Mubarak', 1, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(74, '220074', 'Novi Lestari', 2, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(75, '220075', 'Iqbal Saputra', 3, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(76, '220076', 'Ayu Wulandari', 4, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(77, '220077', 'Doni Prabowo', 5, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(78, '220078', 'Sinta Maharani', 6, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(79, '220079', 'Rama Saputra', 7, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(80, '220080', 'Tari Oktaviani', 8, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(81, '220081', 'Rendi Kurniawan', 9, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(82, '220082', 'Putri Anggraini', 10, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(83, '220083', 'Agung Nugroho', 11, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(84, '220084', 'Lia Amalia', 12, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(85, '220085', 'Fikri Hidayat', 1, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(86, '220086', 'Rina Sari', 2, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(87, '220087', 'Bambang Setiawan', 3, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(88, '220088', 'Maya Kartika', 4, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(89, '220089', 'Edi Prasetyo', 5, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(90, '220090', 'Sari Wulandari', 6, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(91, '220091', 'Andri Saputra', 7, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(92, '220092', 'Nina Marlina', 8, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(93, '220093', 'Teguh Santoso', 9, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(94, '220094', 'Yuliana Dewi', 10, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(95, '220095', 'Rizky Maulana', 11, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(96, '220096', 'Siti Nurhaliza', 12, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(97, '220097', 'Farhan Ramadhan', 1, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(98, '220098', 'Aisyah Putri', 2, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(99, '220099', 'Rudi Setiawan', 3, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(100, '220100', 'Dewi Kartika', 4, '2026-04-29 06:49:25', '2026-04-29 06:49:25'),
(101, '220101', 'Syaiful Bahri', 3, '2026-04-29 08:44:34', '2026-04-29 09:18:46'),
(103, '220103', 'Indah Mayasari', 9, '2026-04-29 09:20:10', '2026-04-29 09:21:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `kode_prodi` varchar(10) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  `jenjang` enum('D3','D4') NOT NULL,
  `jurusan` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id`, `kode_prodi`, `nama_prodi`, `jenjang`, `jurusan`, `created_at`, `updated_at`) VALUES
(1, 'TIF', 'Teknik Informatika', 'D4', 6, '2026-04-20 13:20:08', '2026-04-21 02:16:23'),
(2, 'MIF', 'Manajemen Informatika', 'D3', 6, '2026-04-20 13:20:08', '2026-04-21 02:16:25'),
(3, 'TKK', 'Teknik Komputer', 'D3', 6, '2026-04-20 13:20:08', '2026-04-21 02:16:27'),
(4, 'TRK', 'Teknologi Rekayasa Komputer', 'D4', 6, '2026-04-20 13:20:08', '2026-04-21 02:16:30'),
(5, 'TRPL', 'Teknologi Rekayasa Perangkat Lunak', 'D4', 6, '2026-04-20 13:20:08', '2026-04-21 02:16:31'),
(6, 'TET', 'Teknik Energi Terbaruka', 'D4', 8, '2026-04-20 17:38:14', '2026-04-21 02:16:44'),
(7, 'SIF', 'Sistem Informasi', 'D4', 6, '2026-04-20 17:38:14', '2026-04-21 02:16:35'),
(8, 'AKP', 'Akuntansi Perkantoran', 'D3', 9, '2026-04-20 17:38:14', '2026-04-21 02:16:41'),
(9, 'MN01', 'Manajemen Agribisnis', 'D3', 4, '2026-04-20 17:38:14', '2026-04-21 02:16:39'),
(10, 'TEL', 'Teknik Elektro', 'D4', 8, '2026-04-20 17:38:14', '2026-04-21 02:16:46'),
(11, 'PTH', 'Produksi Tanaman Holtikultura', 'D4', 1, '2026-04-20 17:39:30', '2026-04-21 02:16:48'),
(12, 'TNK', 'Peternakan', 'D3', 3, '2026-04-20 17:39:30', '2026-04-21 02:16:51');

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
(1, 'David Juli Ariyadi', 'david_juli@polije.ac.id', '$2y$10$qvL/6F8PxIkVpYxoQufUEecW0W.Pqb3/pqHq8/OkV.rsD.qjCwXfK', 'admin'),
(2, 'David Juli Ariyadi', 'david_dosen@polije.ac.id', '$2y$10$JI.FvrA9J2WWIRwfwreOeOUF6liw3MC1h5BV6t6MMCLugcVaUP3qm', 'user'),
(3, 'David Juli Ariyadi', 'david_ariyadi@gmail.com', '$2y$10$iksNKqIJvKJz.OITFUqGSew20/s4BKzJGuEeoVJgCAjPyCsB0Nu5i', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_jurusan` (`kode_jurusan`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD KEY `idx_prodi` (`prodi`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_prodi` (`kode_prodi`),
  ADD KEY `jurusan` (`jurusan`);

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
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`prodi`) REFERENCES `prodi` (`id`);

--
-- Ketidakleluasaan untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`jurusan`) REFERENCES `jurusan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
