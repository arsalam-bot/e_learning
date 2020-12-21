-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Des 2020 pada 08.33
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
  `level` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `foto`, `level`) VALUES
(1, 'admin@smp3.com', '123456', 'Kato Megumi', 'Ririka crop.jpg', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` int(20) NOT NULL,
  `nama_guru` varchar(64) NOT NULL,
  `tttl` varchar(75) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `pangkatgol` varchar(25) NOT NULL,
  `foto` varchar(11) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama_guru`, `tttl`, `jabatan`, `pangkatgol`, `foto`, `username`, `password`, `level`) VALUES
(1, 1999003, 'Udin S', 'Bungku, 21 Juni 2020', 'Kepala Sekolah', 'Pembina Tkt. I, IV/b', 'foto 2.jpg', 'udin@smp3.com', '123456', 'Guru'),
(2, 1999004, 'Uchiha Madara', 'Yogyakarta, 2 Januari 202', 'guru', 'Pembina, IV/a', 'fotoo 2.png', 'madara@smp3.com', '123456', 'Guru'),
(3, 1999005, 'Sasuke', 'Konoha Gakure, 3 Januari 2020', 'guru', 'Pembina, IV/a', 'foto 3.jpg', 'sasuke@smp3.com', '123456', 'Guru'),
(4, 1999006, 'Itachi', 'Konoha Gakure, 4 Januari 2020', 'guru', 'Pembina, IV/a', 'fotoo 3.png', 'itachi@smp3.com', '123456', 'Guru'),
(5, 1999007, 'Sakura', 'Suna Gakure, 5 Januari 2020', 'guru', 'Penata Tkt.I, III/d', 'foto 4.jpg', 'sakura@smp3.com', '123456', 'Guru'),
(6, 1999008, 'Sarada', 'Oto Gakure, 6 Januari 2020', 'guru', 'Penata Tkt.I, III/d', 'fotoo 4.png', 'sarada@smp3.com', '123456', 'Guru'),
(7, 1999011, 'Obito', 'Kirigakure, 7 Januari 2020', 'tata usaha', 'Penata Tkt.I, III/d', 'foto 5.jpg', 'obito@smp3.com', '123456', 'Guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `j_tugas`
--

CREATE TABLE `j_tugas` (
  `id_j_tugas` int(11) NOT NULL,
  `id_kelasonline` int(11) NOT NULL,
  `p1` varchar(25) NOT NULL,
  `p2` varchar(25) NOT NULL,
  `p3` varchar(25) NOT NULL,
  `p4` varchar(25) NOT NULL,
  `p5` varchar(25) NOT NULL,
  `p6` varchar(25) NOT NULL,
  `p7` varchar(25) NOT NULL,
  `p8` varchar(25) NOT NULL,
  `p9` varchar(25) NOT NULL,
  `p10` varchar(25) NOT NULL,
  `p11` varchar(25) NOT NULL,
  `p12` varchar(25) NOT NULL,
  `p13` varchar(25) NOT NULL,
  `p14` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelasonline`
--

INSERT INTO `kelasonline` (`id_kelasonline`, `id_mapel`, `id_kelas`, `id_guru`) VALUES
(3, 1, 2, 2),
(4, 1, 1, 2),
(6, 10, 5, 5),
(7, 5, 4, 7);

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
  `deskripsi` text DEFAULT NULL,
  `file` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `id_kelasonline`, `deskripsi`, `file`) VALUES
(1, 3, 'bahasa indonesia VII B', 'materi1.pdf'),
(2, 4, 'bahasa indonesia VII A', NULL),
(5, 3, 'bahasa indonesia VIIB', NULL),
(6, 3, 'kerjakan soal dibawah ini woi', NULL),
(7, 3, 'kerjakan soal dibawah ini: siapa yang menemukan nasi?', NULL),
(47, 3, 'deskripsi bnlabla', 'filenyamasih kosong'),
(48, 3, 'deskripsi 48a', 'filenyamasih kosong'),
(49, 3, '', ''),
(50, 3, '', '');

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
(1, 3, 1),
(2, 3, 2),
(4, 4, 4),
(5, 3, 1),
(6, 6, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` int(11) NOT NULL,
  `id_kelasonline` int(11) NOT NULL,
  `p1` varchar(2) NOT NULL,
  `p2` varchar(2) NOT NULL,
  `p3` varchar(2) NOT NULL,
  `p4` varchar(2) NOT NULL,
  `p5` varchar(2) NOT NULL,
  `p6` varchar(2) NOT NULL,
  `p7` varchar(2) NOT NULL,
  `p8` varchar(2) NOT NULL,
  `p9` varchar(2) NOT NULL,
  `p10` varchar(2) NOT NULL,
  `p11` varchar(2) NOT NULL,
  `p12` varchar(2) NOT NULL,
  `p13` varchar(2) NOT NULL,
  `p14` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, '2020001', 'Arsalam Launu', 'Bungku, 21 Juni 2077', 'arsalam@smp3.com', '123456', 'foto 1.jpg', 'Siswa'),
(2, '2020002', 'Aki Tomoya', 'Kirigakure, 15 April 2077', 'tomoya@smp3.com', '123456', 'fotoo 1.png', 'Siswa'),
(3, '2020003', 'Kanda Sorata', 'Bungku, 21 Juni 2077', 'kanda@smp3.com', '123456', 'foto 2.jpg', 'Siswa'),
(4, '2020004', 'Sawamura Eriri', 'Tokyo, 30 Februari 2020', 'sawamura@smp3.com', '123456', 'fotoo 2.png', 'Siswa');

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
  ADD PRIMARY KEY (`id_j_tugas`),
  ADD KEY `fk_jtugas_kelasonline` (`id_kelasonline`);

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
  ADD KEY `fk_presensi_kelasonline` (`id_kelasonline`);

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `j_tugas`
--
ALTER TABLE `j_tugas`
  MODIFY `id_j_tugas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kelasonline`
--
ALTER TABLE `kelasonline`
  MODIFY `id_kelasonline` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `pesertakelasonline`
--
ALTER TABLE `pesertakelasonline`
  MODIFY `id_pesertakelasonline` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `j_tugas`
--
ALTER TABLE `j_tugas`
  ADD CONSTRAINT `fk_jtugas_kelasonline` FOREIGN KEY (`id_kelasonline`) REFERENCES `kelasonline` (`id_kelasonline`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_presensi_kelasonline` FOREIGN KEY (`id_kelasonline`) REFERENCES `kelasonline` (`id_kelasonline`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
