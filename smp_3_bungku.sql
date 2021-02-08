-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Feb 2021 pada 13.51
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smp_3_bungku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `foto`, `level`) VALUES
(1, 'admin@smp3.com', '123456', 'Kato Megumi', 'Ririka crop.jpg', 'Admin'),
(8, 'aswa@smp3.com', '123456', 'Drs. Aswawarman Launu, MM', 'sulaeman.jpg', 'Kepsek');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama_guru` varchar(64) NOT NULL,
  `tttl` varchar(75) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `pangkatgol` varchar(25) NOT NULL,
  `foto` varchar(25) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama_guru`, `tttl`, `jabatan`, `pangkatgol`, `foto`, `username`, `password`, `level`) VALUES
(9, '196207141989031012', 'Drs. Aswawarman Launu, MM', 'Unsongi, 14 Juli 1962', 'Kepala Sekolah', 'Pembina Tkt.1 / IVb', 'sulaeman.jpg', 'aswawarman@smp3.com', '123456', 'Guru'),
(10, '196301031987032008', 'Mutimun Muh. Ilyas, S.Pdi', 'Ipi, 03 Januari 1963', 'Urusan Humas', 'Pembina,  IV/a', 'mutimun.jfif', 'mutimun@smp3.com', '123456', 'Guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `j_tugas`
--

CREATE TABLE `j_tugas` (
  `id_jtugas` int(11) NOT NULL,
  `id_kelasonline` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `file` varchar(50) NOT NULL,
  `created_at` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `j_tugas`
--

INSERT INTO `j_tugas` (`id_jtugas`, `id_kelasonline`, `id_materi`, `id_siswa`, `file`, `created_at`) VALUES
(5, 3, 90, 6, 'Screenshot (59).png', '2021-01-29 00:45:23.000000'),
(6, 3, 90, 6, 'Screenshot (52).png', '2021-01-29 01:05:49.000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`) VALUES
(1, 'VII A'),
(2, 'VII B'),
(3, 'VIII A'),
(4, 'VIII B'),
(5, 'IX A'),
(6, 'IX B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelasonline`
--

CREATE TABLE `kelasonline` (
  `id_kelasonline` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `fotokelasonline` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelasonline`
--

INSERT INTO `kelasonline` (`id_kelasonline`, `id_mapel`, `id_kelas`, `id_guru`, `fotokelasonline`) VALUES
(3, 1, 2, 10, 'kelas 7 C.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`) VALUES
(1, 'Bahasa Indonesia'),
(2, 'Bahasa Inggris'),
(3, 'Ilmu Pengetahuan Alam'),
(4, 'Ilmu Pengetahuan Sosial'),
(5, 'Matematika'),
(6, 'Pendidikan Agama Islam'),
(7, 'Pendidikan Kewarganegaraan'),
(8, 'Prakarya Mulok'),
(9, 'Pendidikan Jasmani'),
(10, 'Seni Budaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `id_kelasonline` int(11) NOT NULL,
  `judul` varchar(25) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `file` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `id_kelasonline`, `judul`, `deskripsi`, `file`) VALUES
(90, 3, 'Topik 1', 'tes edit woy hahahahahahahahaha', '94.pdf'),
(91, 3, 'Topik 2', '', NULL),
(92, 3, 'Topik 3', 'aaaaaaaaa', 'DFD Level 2 Proses 2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesertakelasonline`
--

CREATE TABLE `pesertakelasonline` (
  `id_pesertakelasonline` int(11) NOT NULL,
  `id_kelasonline` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesertakelasonline`
--

INSERT INTO `pesertakelasonline` (`id_pesertakelasonline`, `id_kelasonline`, `id_siswa`) VALUES
(5, 3, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` int(11) NOT NULL,
  `id_kelasonline` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `id_kelasonline`, `id_siswa`, `id_materi`, `created_at`, `status`) VALUES
(77, 3, 6, 90, '2021-01-29 00:45:26', '1'),
(78, 3, 6, 91, '2021-01-29 00:46:10', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama_siswa` varchar(64) NOT NULL,
  `tttl` varchar(75) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `foto` varchar(11) NOT NULL,
  `level` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nama_siswa`, `tttl`, `username`, `password`, `foto`, `level`) VALUES
(6, '20200001', 'Abdul Idil', 'Konohagakure, 17 Mei 2006', 'idil@smp3.com', '123456', 'aki.jpg', 'Siswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `j_tugas`
--
ALTER TABLE `j_tugas`
  ADD PRIMARY KEY (`id_jtugas`),
  ADD KEY `fk_jtugas_materi` (`id_materi`),
  ADD KEY `fk_jtugas_kelasonline` (`id_kelasonline`),
  ADD KEY `fk_jtugas_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `kelasonline`
--
ALTER TABLE `kelasonline`
  ADD PRIMARY KEY (`id_kelasonline`),
  ADD KEY `fk_kelasonline_mapel` (`id_mapel`),
  ADD KEY `fk_kelasonline_kelas` (`id_kelas`),
  ADD KEY `fk_kelasonline_guru` (`id_guru`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `fk_materi_kelasonline` (`id_kelasonline`);

--
-- Indeks untuk tabel `pesertakelasonline`
--
ALTER TABLE `pesertakelasonline`
  ADD PRIMARY KEY (`id_pesertakelasonline`),
  ADD KEY `fk_pesertakelasonline_kelasonline` (`id_kelasonline`),
  ADD KEY `fk_pesertakelasonline_id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_presensi`),
  ADD KEY `fk_presensi_kelasonline` (`id_kelasonline`),
  ADD KEY `fk_presensi_materi` (`id_materi`),
  ADD KEY `fk_presensi_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `j_tugas`
--
ALTER TABLE `j_tugas`
  MODIFY `id_jtugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kelasonline`
--
ALTER TABLE `kelasonline`
  MODIFY `id_kelasonline` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT untuk tabel `pesertakelasonline`
--
ALTER TABLE `pesertakelasonline`
  MODIFY `id_pesertakelasonline` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `j_tugas`
--
ALTER TABLE `j_tugas`
  ADD CONSTRAINT `fk_jtugas_kelasonline` FOREIGN KEY (`id_kelasonline`) REFERENCES `kelasonline` (`id_kelasonline`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jtugas_materi` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jtugas_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelasonline`
--
ALTER TABLE `kelasonline`
  ADD CONSTRAINT `fk_kelasonline_guru` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kelasonline_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kelasonline_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `fk_materi_kelasonline` FOREIGN KEY (`id_kelasonline`) REFERENCES `kelasonline` (`id_kelasonline`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesertakelasonline`
--
ALTER TABLE `pesertakelasonline`
  ADD CONSTRAINT `fk_pesertakelasonline_id_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pesertakelasonline_kelasonline` FOREIGN KEY (`id_kelasonline`) REFERENCES `kelasonline` (`id_kelasonline`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `fk_presensi_kelasonline` FOREIGN KEY (`id_kelasonline`) REFERENCES `kelasonline` (`id_kelasonline`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_presensi_materi` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_presensi_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
