-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Mar 2019 pada 17.18
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kms-suparman`
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
  `validasi` enum('validasi','menunggu','ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `explicit`
--

INSERT INTO `explicit` (`id_explicit`, `id_user`, `judul`, `keterangan`, `date`, `validasi`) VALUES
(1, 1, 'Informasi Team', 'as', '2019-03-06', 'validasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `jenis` enum('tacit','explicit') NOT NULL,
  `komentar` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_jenis`, `id_pegawai`, `jenis`, `komentar`, `date`) VALUES
(1, 1, 1, 'tacit', 'manusia', '2019-03-06 15:33:52'),
(2, 1, 1, 'tacit', 'manusia123', '2019-03-06 15:34:36'),
(3, 1, 1, 'explicit', 'nuub', '2019-03-06 15:40:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_pegawai`, `deskripsi`) VALUES
(3, 3, '<p>asasa</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id_profile`, `nama`, `isi`) VALUES
(2, 'sa', '<p>sassas</p>');

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
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tacit`
--

INSERT INTO `tacit` (`id_tacit`, `judul_tacit`, `masalah`, `solusi`, `id_user`, `validasi`, `date`) VALUES
(1, 'asas', 'asas', 'asa', 1, 'validasi', '2019-03-06');

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
  `jabatan` varchar(250) DEFAULT NULL,
  `bagian` enum('HR','HUMAS','HSE','ICT','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `telepon`, `password`, `role`, `jabatan`, `bagian`) VALUES
(1, 'apranta', 'admin', 'admin', '', '0000-00-00', '', '202cb962ac59075b964b07152d234b70', 'admin', NULL, 'HR'),
(2, 'suparman', 'suparman', 'laslasj', 'prabumulih', '2019-02-11', '08981073502', '202cb962ac59075b964b07152d234b70', 'staff', 'staff', 'HUMAS'),
(3, 'apranta1', 'admin1', 'admin', '', '0000-00-00', '', '202cb962ac59075b964b07152d234b70', 'manager', NULL, 'HR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `video_conf`
--

CREATE TABLE `video_conf` (
  `id_video` int(11) NOT NULL,
  `judul_video` varchar(250) NOT NULL,
  `url` text NOT NULL,
  `deskripsi` text NOT NULL,
  `date` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `explicit`
--
ALTER TABLE `explicit`
  ADD PRIMARY KEY (`id_explicit`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indeks untuk tabel `tacit`
--
ALTER TABLE `tacit`
  ADD PRIMARY KEY (`id_tacit`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `video_conf`
--
ALTER TABLE `video_conf`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `explicit`
--
ALTER TABLE `explicit`
  MODIFY `id_explicit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tacit`
--
ALTER TABLE `tacit`
  MODIFY `id_tacit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `video_conf`
--
ALTER TABLE `video_conf`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `explicit`
--
ALTER TABLE `explicit`
  ADD CONSTRAINT `explicit_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tacit`
--
ALTER TABLE `tacit`
  ADD CONSTRAINT `tacit_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `video_conf`
--
ALTER TABLE `video_conf`
  ADD CONSTRAINT `video_conf_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
