-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Agu 2025 pada 10.54
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
-- Database: `survey_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `created_at`) VALUES
(4, 'superadmin', '$2y$10$7eZrjX1XkSm5e8AnR0L4teIuS1U8JY1P5Bt0jXyWjK7F2U28wZy8O', 'Super Administrator', '2025-08-18 08:05:36'),
(5, 'editor', '$2y$10$Fw6X8j0fKGeXQ0f6OpEjrOJxOov1fPDEjUibGnMKhBfZITSC8Yw1K', 'Content Editor', '2025-08-18 08:05:36'),
(6, 'adminajaih', '$2y$10$KYpDySOt8yXvHeQ9I3KTqesZlfwETOFdM/vPojWQtThBoN2fxBL8G', 'admin aja ih', '2025-08-18 08:09:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `survei`
--

CREATE TABLE `survei` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pertanyaan1` int(11) DEFAULT NULL,
  `pertanyaan2` int(11) DEFAULT NULL,
  `pertanyaan3` int(11) DEFAULT NULL,
  `pertanyaan4` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `survei`
--

INSERT INTO `survei` (`id`, `nama`, `email`, `pertanyaan1`, `pertanyaan2`, `pertanyaan3`, `pertanyaan4`, `created_at`) VALUES
(1, 'Alya', 'maulidaalya1234567@gmail.com', 3, 2, 2, 2, '2025-07-31 03:41:54'),
(2, 'naira', 'naira123@gmail.com', 2, 3, 4, 2, '2025-07-31 03:58:11'),
(3, 'abdul', 'garau12345@gmail.com', 1, 4, 4, 3, '2025-07-31 04:12:35'),
(8, 'Firman', 'firman24@gmai.com', 4, 3, 3, 3, '2025-07-31 04:29:37'),
(9, 'fadli', 'fadlirh549@gemail.com', 3, 4, 4, 3, '2025-07-31 05:05:55'),
(11, 'pipit', 'maulidaalya1234567@gmail.com', 3, 3, 3, 3, '2025-08-04 04:45:11'),
(12, 'pipit', 'maulidaalya1234567@gmail.com', 3, 3, 3, 3, '2025-08-04 04:45:46'),
(13, 'revi', 'revina123@gmail.com', 4, 4, 4, 4, '2025-08-04 05:11:31'),
(14, 'ayu', 'ayu456@gamil.com', 3, 2, 2, 3, '2025-08-04 05:14:04'),
(15, 'sifa', 'sifa@gmail.com', 1, 1, 1, 1, '2025-08-04 05:17:46'),
(16, 'Maulida', 'maulidia@gmail.com', 4, 4, 4, 4, '2025-08-04 05:26:14'),
(17, 'naira', 'naira123@gmail.com', 3, 3, 3, 3, '2025-08-04 05:31:51'),
(18, 'naira', 'naira123@gmail.com', 4, 4, 4, 4, '2025-08-04 06:41:31'),
(19, 'Naura', 'Naura123@gmail.com', 4, 4, 4, 4, '2025-08-05 07:34:55'),
(20, 'Hermansyah', 'hermansyah@gmail.com', 4, 4, 4, 4, '2025-08-05 08:07:57'),
(21, 'angga', 'angga@gmail.com', 4, 4, 4, 3, '2025-08-20 03:56:12'),
(22, 'angga', 'angga@gmail.com', 3, 4, 4, 4, '2025-08-20 04:12:10'),
(23, 'angga', 'angga@gmail.com', 3, 4, 4, 4, '2025-08-20 04:12:39'),
(24, 'angga', 'angga@gmail.com', 2, 2, 3, 3, '2025-08-20 04:21:55'),
(25, 'Notalia', 'notalia123@gmail.com', 4, 4, 4, 4, '2025-08-20 07:11:08'),
(26, 'Rafli', 'rafli123@gmail.com', 3, 3, 3, 2, '2025-08-22 02:02:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `pesan` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id`, `nama`, `pesan`, `created_at`) VALUES
(1, 'Alya', 'mudah di akses', '2025-08-01 10:55:03'),
(2, 'Fitri', 'Sangat membantu', '2025-08-01 11:06:50'),
(4, 'naira', 'Aplikasi mdah di akses', '2025-08-04 13:42:21'),
(5, 'Naura', 'fitur cukup memadai', '2025-08-05 14:36:19'),
(6, 'Hermansyah', 'Keren! Klinik Cipanas sudah digital dan gak kalah sama rumah sakit besar.', '2025-08-05 15:08:26'),
(7, 'angga', 'fitur eror', '2025-08-20 11:40:33'),
(8, 'Notalia', 'UI masih kurang rapih', '2025-08-20 14:11:53'),
(9, 'Rafli', 'tidak adanya pengujian sistem sebelum di public', '2025-08-22 09:03:30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `survei`
--
ALTER TABLE `survei`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `survei`
--
ALTER TABLE `survei`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
