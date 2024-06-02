-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2024 pada 11.02
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelayanan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `det_riwayat_perubahan`
--

CREATE TABLE `det_riwayat_perubahan` (
  `ID_DET_RIWAYAT` int(11) NOT NULL,
  `ID_RIWAYAT` varchar(11) NOT NULL,
  `PDDK_AKH_awal` int(11) NOT NULL,
  `PDDK_AKH_ahir` int(11) NOT NULL,
  `PDDK_AKH_dasar` int(11) NOT NULL,
  `JENIS_PKRJN_awal` int(11) NOT NULL,
  `JENIS_PKRJN_ahir` int(11) NOT NULL,
  `JENIS_PKRJN_dasar` int(11) NOT NULL,
  `AGAMA_awal` int(11) NOT NULL,
  `AGAMA_ahir` int(11) NOT NULL,
  `AGAMA_dasar` int(11) NOT NULL,
  `GOL_DRH_awal` int(11) NOT NULL,
  `GOL_DRH_ahir` int(11) NOT NULL,
  `GOL_DRH_dasar` int(11) NOT NULL,
  `STAT_KWN_awal` varchar(11) NOT NULL,
  `STAT_KWN_ahir` varchar(11) NOT NULL,
  `STAT_KWN_dasar` varchar(11) NOT NULL,
  `STAT_HBKEL_awal` varchar(100) NOT NULL,
  `STAT_HBKEL_ahir` varchar(100) NOT NULL,
  `STAT_HBKEL_dasar` varchar(100) NOT NULL,
  `NAMA_LGKP_awal` varchar(255) NOT NULL,
  `NAMA_LGKP_ahir` varchar(255) NOT NULL,
  `NAMA_LGKP_dasar` varchar(255) NOT NULL,
  `JENIS_KLMIN_awal` varchar(11) NOT NULL,
  `JENIS_KLMIN_ahir` varchar(11) NOT NULL,
  `JENIS_KLMIN_dasar` varchar(11) NOT NULL,
  `TMPT_LHR_awal` varchar(32) NOT NULL,
  `TMPT_LHR_ahir` varchar(32) NOT NULL,
  `TMPT_LHR_dasar` varchar(32) NOT NULL,
  `TGL_LHR_awal` datetime NOT NULL,
  `TGL_LHR_ahir` datetime NOT NULL,
  `TGL_LHR_dasar` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `det_riwayat_perubahan`
--
ALTER TABLE `det_riwayat_perubahan`
  ADD PRIMARY KEY (`ID_DET_RIWAYAT`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `det_riwayat_perubahan`
--
ALTER TABLE `det_riwayat_perubahan`
  MODIFY `ID_DET_RIWAYAT` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
