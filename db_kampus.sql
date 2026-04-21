-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 21 Apr 2026 pada 09.36
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

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
  `id` int NOT NULL,
  `kode_jurusan` varchar(10) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `kode_jurusan`, `nama_jurusan`, `created_at`, `updated_at`) VALUES
(1, 'PP', 'Produksi Pertanian', '2026-04-21 09:15:26', '2026-04-21 09:15:26'),
(2, 'TP', 'Teknologi Pertanian', '2026-04-21 09:15:26', '2026-04-21 09:15:26'),
(3, 'TNK', 'Peternakan', '2026-04-21 09:15:26', '2026-04-21 09:15:26'),
(4, 'MNA', 'Manajemen Agribisnis', '2026-04-21 09:15:26', '2026-04-21 09:15:26'),
(5, 'BIG', 'Bahasa Inggris', '2026-04-21 09:15:26', '2026-04-21 09:15:26'),
(6, 'TI', 'Teknologi Informasi', '2026-04-21 09:15:26', '2026-04-21 09:15:26'),
(7, 'KES', 'Kesehatan', '2026-04-21 09:15:26', '2026-04-21 09:15:26'),
(8, 'TEK', 'Teknik', '2026-04-21 09:15:26', '2026-04-21 09:15:26'),
(9, 'BIS', 'Bisnis', '2026-04-21 09:15:26', '2026-04-21 09:15:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int NOT NULL,
  `nim` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `jurusan`, `created_at`) VALUES
(1, '2302001', 'Ahmad Fauzan', 'Teknik Informatika', '2026-03-02 03:00:01'),
(2, '2302002', 'Budi Santoso', 'Teknik Informatika', '2026-03-02 03:00:02'),
(3, '2302003', 'Citra Lestari', 'Teknik Informatika', '2026-03-02 03:00:03'),
(4, '2302004', 'Dewi Anggraini', 'Teknik Informatika', '2026-03-02 03:00:04'),
(5, '2302005', 'Eko Prasetyo', 'Teknik Informatika', '2026-03-02 03:00:05'),
(6, '2302006', 'Fajar Hidayat', 'Teknik Informatika', '2026-03-02 03:00:06'),
(7, '2302007', 'Gita Permata', 'Teknik Informatika', '2026-03-02 03:00:07'),
(8, '2302008', 'Hendra Wijaya', 'Teknik Informatika', '2026-03-02 03:00:08'),
(9, '2302009', 'Intan Sari', 'Teknik Informatika', '2026-03-02 03:00:09'),
(10, '2302010', 'Joko Susilo', 'Teknik Informatika', '2026-03-02 03:00:10'),
(11, '2302011', 'Kartika Dewi', 'Teknik Informatika', '2026-03-02 03:00:11'),
(12, '2302012', 'Lukman Hakim', 'Teknik Informatika', '2026-03-02 03:00:12'),
(13, '2302013', 'Maya Putri', 'Teknik Informatika', '2026-03-02 03:00:13'),
(14, '2302014', 'Nanda Saputra', 'Teknik Informatika', '2026-03-02 03:00:14'),
(15, '2302015', 'Oki Ramadhan', 'Teknik Informatika', '2026-03-02 03:00:15'),
(16, '2302016', 'Putri Amelia', 'Teknik Informatika', '2026-03-02 03:00:16'),
(17, '2302017', 'Rizky Maulana', 'Teknik Informatika', '2026-03-02 03:00:17'),
(18, '2302018', 'Salsa Nabila', 'Teknik Informatika', '2026-03-02 03:00:18'),
(19, '2302019', 'Taufik Hidayat', 'Teknik Informatika', '2026-03-02 03:00:19'),
(20, '2302020', 'Umi Kalsum', 'Teknik Informatika', '2026-03-02 03:00:20'),
(21, '2302021', 'Vina Oktaviani', 'Teknik Informatika', '2026-03-02 03:00:21'),
(22, '2302022', 'Wahyu Pratama', 'Teknik Informatika', '2026-03-02 03:00:22'),
(23, '2302023', 'Xavier Adrian', 'Teknik Informatika', '2026-03-02 03:00:23'),
(24, '2302024', 'Yuni Astuti', 'Teknik Informatika', '2026-03-02 03:00:24'),
(25, '2302025', 'Zaki Firmansyah', 'Teknik Informatika', '2026-03-02 03:00:25'),
(26, '2302026', 'Aldo Saputra', 'Teknik Informatika', '2026-03-02 03:00:26'),
(27, '2302027', 'Bella Maharani', 'Teknik Informatika', '2026-03-02 03:00:27'),
(28, '2302028', 'Chandra Gunawan', 'Teknik Informatika', '2026-03-02 03:00:28'),
(29, '2302029', 'Dian Puspita', 'Teknik Informatika', '2026-03-02 03:00:29'),
(30, '2302030', 'Erwin Setiawan', 'Teknik Informatika', '2026-03-02 03:00:30'),
(31, '2302031', 'Farah Aulia', 'Teknik Informatika', '2026-03-02 03:00:31'),
(32, '2302032', 'Galih Nugraha', 'Teknik Informatika', '2026-03-02 03:00:32'),
(33, '2302033', 'Hana Safitri', 'Teknik Informatika', '2026-03-02 03:00:33'),
(34, '2302034', 'Iqbal Ramadhan', 'Teknik Informatika', '2026-03-02 03:00:34'),
(35, '2302035', 'Jihan Lestari', 'Teknik Informatika', '2026-03-02 03:00:35'),
(36, '2302036', 'Kevin Alvaro', 'Sistem Informasi', '2026-03-02 03:00:36'),
(37, '2302037', 'Larasati Dewi', 'Sistem Informasi', '2026-03-02 03:00:37'),
(38, '2302038', 'Mochammad Ilham', 'Sistem Informasi', '2026-03-02 03:00:38'),
(39, '2302039', 'Niken Aprillia', 'Sistem Informasi', '2026-03-02 03:00:39'),
(40, '2302040', 'Omar Syahputra', 'Sistem Informasi', '2026-03-02 03:00:40'),
(41, '2302041', 'Putra Aditya', 'Sistem Informasi', '2026-03-02 03:00:41'),
(42, '2302042', 'Qori Annisa', 'Sistem Informasi', '2026-03-02 03:00:42'),
(43, '2302043', 'Rina Marlina', 'Sistem Informasi', '2026-03-02 03:00:43'),
(44, '2302044', 'Sandi Kurniawan', 'Sistem Informasi', '2026-03-02 03:00:44'),
(45, '2302045', 'Tina Melati', 'Sistem Informasi', '2026-03-02 03:00:45'),
(46, '2302046', 'Ujang Setiawan', 'Sistem Informasi', '2026-03-02 03:00:46'),
(47, '2302047', 'Vicky Prakoso', 'Sistem Informasi', '2026-03-02 03:00:47'),
(48, '2302048', 'Widya Lestari', 'Sistem Informasi', '2026-03-02 03:00:48'),
(49, '2302049', 'Yusuf Maulana', 'Sistem Informasi', '2026-03-02 03:00:49'),
(50, '2302050', 'Zahra Khairunnisa', 'Sistem Informasi', '2026-03-02 03:00:50'),
(51, '2302051', 'Andi Saputra', 'Sistem Informasi', '2026-03-02 03:00:51'),
(52, '2302052', 'Bunga Cahyani', 'Sistem Informasi', '2026-03-02 03:00:52'),
(53, '2302053', 'Cahyo Nugroho', 'Sistem Informasi', '2026-03-02 03:00:53'),
(54, '2302054', 'Dita Maharani', 'Sistem Informasi', '2026-03-02 03:00:54'),
(55, '2302055', 'Erlangga Putra', 'Sistem Informasi', '2026-03-02 03:00:55'),
(56, '2302056', 'Fitri Handayani', 'Sistem Informasi', '2026-03-02 03:00:56'),
(57, '2302057', 'Gilang Pratama', 'Sistem Informasi', '2026-03-02 03:00:57'),
(58, '2302058', 'Hesti Wulandari', 'Sistem Informasi', '2026-03-02 03:00:58'),
(59, '2302059', 'Indra Gunawan', 'Sistem Informasi', '2026-03-02 03:00:59'),
(60, '2302060', 'Jasmine Putri', 'Sistem Informasi', '2026-03-02 03:01:00'),
(61, '2302061', 'Kiki Amelia', 'Teknik Komputer', '2026-03-02 03:01:01'),
(62, '2302062', 'Lutfi Ramadhan', 'Teknik Komputer', '2026-03-02 03:01:02'),
(63, '2302063', 'Mega Sari', 'Teknik Komputer', '2026-03-02 03:01:03'),
(64, '2302064', 'Naufal Rizki', 'Teknik Komputer', '2026-03-02 03:01:04'),
(65, '2302065', 'Olivia Putri', 'Teknik Komputer', '2026-03-02 03:01:05'),
(66, '2302066', 'Prasetya Bima', 'Teknik Komputer', '2026-03-02 03:01:06'),
(67, '2302067', 'Qisthi Azzahra', 'Teknik Komputer', '2026-03-02 03:01:07'),
(68, '2302068', 'Rafli Kurniawan', 'Teknik Komputer', '2026-03-02 03:01:08'),
(69, '2302069', 'Sinta Permata', 'Teknik Komputer', '2026-03-02 03:01:09'),
(70, '2302070', 'Tegar Saputra', 'Teknik Komputer', '2026-03-02 03:01:10'),
(71, '2302071', 'Ulfa Rahma', 'Teknik Komputer', '2026-03-02 03:01:11'),
(72, '2302072', 'Vina Maharani', 'Teknik Komputer', '2026-03-02 03:01:12'),
(73, '2302073', 'Wira Setiawan', 'Teknik Komputer', '2026-03-02 03:01:13'),
(74, '2302074', 'Xena Putri', 'Teknik Komputer', '2026-03-02 03:01:14'),
(75, '2302075', 'Yoga Pratama', 'Teknik Komputer', '2026-03-02 03:01:15'),
(76, '2302076', 'Zulfikar Ahmad', 'Teknik Komputer', '2026-03-02 03:01:16'),
(77, '2302077', 'Anita Sari', 'Teknik Komputer', '2026-03-02 03:01:17'),
(78, '2302078', 'Bagas Hendra', 'Teknik Komputer', '2026-03-02 03:01:18'),
(79, '2302079', 'Cindy Oktavia', 'Teknik Komputer', '2026-03-02 03:01:19'),
(80, '2302080', 'Damar Wijaya', 'Teknik Komputer', '2026-03-02 03:01:20'),
(81, '2302081', 'Elsa Fitriani', 'Manajemen Informatika', '2026-03-02 03:01:21'),
(82, '2302082', 'Fikri Alamsyah', 'Manajemen Informatika', '2026-03-02 03:01:22'),
(83, '2302083', 'Gina Marlina', 'Manajemen Informatika', '2026-03-02 03:01:23'),
(84, '2302084', 'Hafiz Ramadhan', 'Manajemen Informatika', '2026-03-02 03:01:24'),
(85, '2302085', 'Ira Kusuma', 'Manajemen Informatika', '2026-03-02 03:01:25'),
(86, '2302086', 'Jefri Gunawan', 'Manajemen Informatika', '2026-03-02 03:01:26'),
(87, '2302087', 'Karin Amelia', 'Manajemen Informatika', '2026-03-02 03:01:27'),
(88, '2302088', 'Luthfi Akbar', 'Manajemen Informatika', '2026-03-02 03:01:28'),
(89, '2302089', 'Mira Ananda', 'Manajemen Informatika', '2026-03-02 03:01:29'),
(90, '2302090', 'Niko Saputra', 'Manajemen Informatika', '2026-03-02 03:01:30'),
(91, '2302091', 'Oktavia Sari', 'Manajemen Informatika', '2026-03-02 03:01:31'),
(92, '2302092', 'Pandu Wijaya', 'Manajemen Informatika', '2026-03-02 03:01:32'),
(93, '2302093', 'Qonita Rahma', 'Teknologi Informasi', '2026-03-02 03:01:33'),
(94, '2302094', 'Rizal Hidayat', 'Teknologi Informasi', '2026-03-02 03:01:34'),
(95, '2302095', 'Siti Aisyah', 'Teknologi Informasi', '2026-03-02 03:01:35'),
(96, '2302096', 'Tomi Prasetyo', 'Teknologi Informasi', '2026-03-02 03:01:36'),
(97, '2302097', 'Ulfah Nabila', 'Teknologi Informasi', '2026-03-02 03:01:37'),
(98, '2302098', 'Vito Alfarizi', 'Teknologi Informasi', '2026-03-02 03:01:38'),
(99, '2302099', 'Wulan Sari', 'Teknologi Informasi', '2026-03-02 03:01:39'),
(100, '2302100', 'Yuda Kurniawan', 'Teknologi Informasi', '2026-03-02 03:01:40'),
(101, '2302101', 'Syaiful Bahri', 'Teknologi Rekayasa Perangkat Lunak', '2026-03-04 04:37:31'),
(102, '2302102', 'Indah Pertiwi', 'Teknologi Rekayasa Perangkat Lunak', '2026-03-04 04:38:56'),
(103, '2302103', 'Stefany Fauziyah', 'Teknologi Rekayasa Perangkat Lunak', '2026-03-04 04:39:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id` int NOT NULL,
  `kode_prodi` varchar(10) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  `jenjang` enum('D3','D4') NOT NULL,
  `jurusan` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id`, `kode_prodi`, `nama_prodi`, `jenjang`, `jurusan`, `created_at`, `updated_at`) VALUES
(1, 'TIF', 'Teknik Informatika', 'D4', 6, '2026-04-20 20:20:08', '2026-04-21 09:16:23'),
(2, 'MIF', 'Manajemen Informatika', 'D3', 6, '2026-04-20 20:20:08', '2026-04-21 09:16:25'),
(3, 'TKK', 'Teknik Komputer', 'D3', 6, '2026-04-20 20:20:08', '2026-04-21 09:16:27'),
(4, 'TRK', 'Teknologi Rekayasa Komputer', 'D4', 6, '2026-04-20 20:20:08', '2026-04-21 09:16:30'),
(5, 'TRPL', 'Teknologi Rekayasa Perangkat Lunak', 'D4', 6, '2026-04-20 20:20:08', '2026-04-21 09:16:31'),
(6, 'TET', 'Teknik Energi Terbaruka', 'D4', 8, '2026-04-21 00:38:14', '2026-04-21 09:16:44'),
(7, 'SIF', 'Sistem Informasi', 'D4', 6, '2026-04-21 00:38:14', '2026-04-21 09:16:35'),
(8, 'AKP', 'Akuntansi Perkantoran', 'D3', 9, '2026-04-21 00:38:14', '2026-04-21 09:16:41'),
(9, 'MN01', 'Manajemen Agribisnis', 'D3', 4, '2026-04-21 00:38:14', '2026-04-21 09:16:39'),
(10, 'TEL', 'Teknik Elektro', 'D4', 8, '2026-04-21 00:38:14', '2026-04-21 09:16:46'),
(11, 'PTH', 'Produksi Tanaman Holtikultura', 'D4', 1, '2026-04-21 00:39:30', '2026-04-21 09:16:48'),
(12, 'TNK', 'Peternakan', 'D3', 3, '2026-04-21 00:39:30', '2026-04-21 09:16:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'David Juli Ariyadi', 'david_juli@polije.ac.id', '$2y$10$tI20Gujpk6D3gbnA..xZSuKt2eoCjXsprpcl/GRPgBpFAeMzpphzi', 'admin'),
(2, 'David Juli', 'david_ariyadi@gmail.com', '$2y$10$7.QD2MU7ksquke7jz6NECuyb8CRKKcCrOm.TNc2NoqAHL3ITNEz.q', 'user'),
(3, 'David Juli A', 'david_a@gmail.com', '$2y$10$vDCALYlx6j1cjw3YFVKiROZZi4ByEM2cI.BXxSqzmy57sSndM4Fs6', 'user');

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
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`),
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`jurusan`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
