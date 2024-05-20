-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Bulan Mei 2024 pada 15.46
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
-- Database: `ofrsdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblteams`
--

CREATE TABLE `tblteams` (
  `id` int(11) NOT NULL,
  `teamName` varchar(255) DEFAULT NULL,
  `teamLeaderName` varchar(255) DEFAULT NULL,
  `teamLeadMobno` bigint(12) DEFAULT NULL,
  `teamMembers` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tblteams`
--

INSERT INTO `tblteams` (`id`, `teamName`, `teamLeaderName`, `teamLeadMobno`, `teamMembers`, `postingDate`) VALUES
(2, 'Team 2', 'John Doee', 1425362522, 'John Doe, Anuj , Atul , Shiv', '2024-05-20 13:34:33'),
(3, 'Team 1', 'Anuj Kumarra', 1425589632, 'Anuj, Sanjeev, Atul, Rahul', '2024-05-20 08:33:35');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tblteams`
--
ALTER TABLE `tblteams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tblteams`
--
ALTER TABLE `tblteams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
