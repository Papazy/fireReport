-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Bulan Mei 2024 pada 17.33
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
-- Struktur dari tabel `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `AdminuserName` varchar(20) NOT NULL,
  `MobileNumber` bigint(12) NOT NULL,
  `Email` varchar(120) NOT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp(),
  `userRole` int(1) DEFAULT NULL,
  `isActive` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `AdminuserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`, `userRole`, `isActive`) VALUES
(1, 'Admin', 'admin', 2147483647, 'sdadsa@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2022-02-24 11:30:00', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblfirereport`
--

CREATE TABLE `tblfirereport` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `mobileNumber` bigint(12) DEFAULT NULL,
  `location` mediumtext DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `assignTo` int(11) DEFAULT NULL,
  `status` varchar(120) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `assignTime` varchar(255) DEFAULT NULL,
  `assignTme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tblfirereport`
--

INSERT INTO `tblfirereport` (`id`, `fullName`, `mobileNumber`, `location`, `message`, `assignTo`, `status`, `postingDate`, `assignTime`, `assignTme`) VALUES
(1, 'Anuj Kumar', 1234567890, 'New Delhi india', 'NA', 2, 'Request Completed', '2022-04-19 07:55:50', NULL, '26-04-22 03:04:11'),
(2, 'Rahul', 1425362514, 'H 23423 ABC Street  Noida Sector 2 UP', 'NA', 2, 'Request Completed', '2022-04-23 02:02:18', NULL, '20-05-24 04:05:19'),
(3, 'Amit Kumar', 4758963210, 'A 123 Sector4 Noida UP', 'Fire in Home', 2, 'Request Completed', '2022-04-26 18:46:41', NULL, '27-04-22 03:04:13'),
(4, 'Fajry', 82267450565, 'Lhokseumawe', 'Api sudah sangat besar', 2, 'Fire Relief Work in Progress', '2024-05-20 15:04:43', '2024-05-20 22:04:43', '20-05-24 05:05:53'),
(5, 'Fajry', 82267450565, 'Lhokseumawe', 'Api sudah sangat besar', 2, 'Fire Relief Work in Progress', '2024-05-20 15:16:40', '2024-05-20 22:16:40', '2024-05-20 22:16:40'),
(6, 'Fajry', 82267450565, 'Lhokseumawe', 'Api sudah sangat besar', 2, 'Team On the Way', '2024-05-20 15:17:06', '2024-05-20 22:17:06', '2024-05-20 22:17:06'),
(7, 'Fajry', 82267450565, 'Banda', 'Besar APi', 2, 'Fire Relief Work in Progress', '2024-05-20 15:17:25', '2024-05-20 22:17:25', '2024-05-20 22:17:25'),
(8, 'Ikram', 8234242, 'dasf', 'dsakf', 2, 'Request Completed', '2024-05-20 15:18:00', '2024-05-20 22:18:00', '2024-05-20 22:18:00'),
(9, 'tes', 88080, 'tes', 'tes', 2, 'Assigned', '2024-05-20 15:17:50', '2024-05-20 22:17:50', '2024-05-20 22:17:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblfiretequesthistory`
--

CREATE TABLE `tblfiretequesthistory` (
  `id` int(11) NOT NULL,
  `requestId` int(11) DEFAULT NULL,
  `status` varchar(120) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tblfiretequesthistory`
--

INSERT INTO `tblfiretequesthistory` (`id`, `requestId`, `status`, `remark`, `postingDate`) VALUES
(1, 1, 'Team On the Way', 'Team is on the way.', '2022-04-25 18:35:35'),
(2, 1, 'Fire Relief Work in Progress', 'Team work in progress.', '2022-04-25 18:42:18'),
(3, 1, 'Request Completed', 'Fire controlled. Request completed', '2022-04-25 18:43:29'),
(4, 3, 'Team On the Way', 'Team is on the for relief work.', '2022-04-26 18:47:48'),
(5, 3, 'Fire Relief Work in Progress', 'Fire relief work in progress. Team will control the fire soon.', '2022-04-26 18:48:20'),
(6, 3, 'Request Completed', 'Job FInished. Fire is under control now.', '2022-04-26 18:48:49'),
(7, 3, 'Team On the Way', 'sdaf', '2024-05-20 15:02:15'),
(8, 2, 'Fire Relief Work in Progress', 'sadfsa', '2024-05-20 15:04:00'),
(9, 4, 'Fire Relief Work in Progress', 'saf', '2024-05-20 15:05:11'),
(10, 5, 'Team On the Way', 'daf', '2024-05-20 15:16:48'),
(11, 6, 'Team On the Way', 'dasf', '2024-05-20 15:17:17'),
(12, 7, 'Fire Relief Work in Progress', 'dsf', '2024-05-20 15:17:43'),
(13, 2, 'Request Completed', 'sadf', '2024-05-20 15:21:55'),
(14, 5, 'Fire Relief Work in Progress', 'dsaf', '2024-05-20 15:24:16'),
(15, 8, 'Team On the Way', 'sadfdas', '2024-05-20 15:24:39'),
(16, 8, 'Fire Relief Work in Progress', 'dsafsa', '2024-05-20 15:24:49'),
(17, 8, 'Request Completed', 'sdfas', '2024-05-20 15:25:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblsite`
--

CREATE TABLE `tblsite` (
  `id` int(11) NOT NULL,
  `siteTitle` varchar(255) DEFAULT NULL,
  `siteLogo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tblsite`
--

INSERT INTO `tblsite` (`id`, `siteTitle`, `siteLogo`) VALUES
(1, 'OFRS', 'd29fc9cfae64c7c76f8066fa7f4919af.png');

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
-- Indeks untuk tabel `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `tblfirereport`
--
ALTER TABLE `tblfirereport`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tblfiretequesthistory`
--
ALTER TABLE `tblfiretequesthistory`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tblsite`
--
ALTER TABLE `tblsite`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tblteams`
--
ALTER TABLE `tblteams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tblfirereport`
--
ALTER TABLE `tblfirereport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tblfiretequesthistory`
--
ALTER TABLE `tblfiretequesthistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tblsite`
--
ALTER TABLE `tblsite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tblteams`
--
ALTER TABLE `tblteams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
