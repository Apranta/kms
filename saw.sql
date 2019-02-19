-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 20 Feb 2019 pada 00.59
-- Versi Server: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saw`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `explicit`
--

CREATE TABLE `explicit` (
  `id_explicit` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `keterangan` text NOT NULL,
  `date` date NOT NULL,
  `validasi` enum('validasi','menunggu','ditolak') NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `explicit`
--

INSERT INTO `explicit` (`id_explicit`, `id_user`, `judul`, `keterangan`, `date`, `validasi`, `file`) VALUES
(13, 3, 'emirs', 'hais', '2019-01-20', 'validasi', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `date` date NOT NULL,
  `id_jenis` enum('tacit','explicit') NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tacit`
--

CREATE TABLE `tacit` (
  `id_tacit` int(11) NOT NULL,
  `judul_tacit` varchar(250) NOT NULL,
  `masalah` text NOT NULL,
  `solusi` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `validasi` enum('validasi','menunggu','ditolak') NOT NULL,
  `date` date NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tacit`
--

INSERT INTO `tacit` (`id_tacit`, `judul_tacit`, `masalah`, `solusi`, `id_user`, `validasi`, `date`, `file`) VALUES
(3, 'emir', 'ble', 'ble', 3, 'validasi', '2019-01-01', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(250) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` enum('manager','staff','admin') NOT NULL,
  `jabatan` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `telepon`, `password`, `role`, `jabatan`) VALUES
(1, 'emir', 'Ahmad Emir Alfatah', 'ggg', '', '0000-00-00', '', 'e10adc3949ba59abbe56e057f20f883e', 'staff', NULL),
(2, 'admin', 'admin', 'gg', 'gg', '2000-01-01', 'bl', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 'hehe'),
(3, 'tes', 'tes', 'tes', 'tes', '2000-01-01', 'tes', 'e10adc3949ba59abbe56e057f20f883e', 'staff', 'tes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `video_conf`
--

CREATE TABLE `video_conf` (
  `id_video` int(11) NOT NULL,
  `judul_video` varchar(250) NOT NULL,
  `url` text NOT NULL,
  `deskripsi` text NOT NULL,
  `date` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `explicit`
--
ALTER TABLE `explicit`
  ADD PRIMARY KEY (`id_explicit`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tacit`
--
ALTER TABLE `tacit`
  ADD PRIMARY KEY (`id_tacit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `video_conf`
--
ALTER TABLE `video_conf`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `explicit`
--
ALTER TABLE `explicit`
  MODIFY `id_explicit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tacit`
--
ALTER TABLE `tacit`
  MODIFY `id_tacit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `video_conf`
--
ALTER TABLE `video_conf`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
