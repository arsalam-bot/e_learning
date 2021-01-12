-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2021 at 05:02 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

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
-- Table structure for table `admin`
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
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `foto`, `level`) VALUES
(1, 'admin@smp3.com', '123456', 'Kato Megumi', 'Ririka crop.jpg', 'Admin'),
(7, 'sulaeman@smp3.com', '123456', 'Sulaeman, M.Kom., P.hd', 'sulaeman.jpg', 'Kepsek');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` int(20) NOT NULL,
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
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama_guru`, `tttl`, `jabatan`, `pangkatgol`, `foto`, `username`, `password`, `level`) VALUES
(1, 1999003, 'Udin S', 'Bungku, 21 Juni 2020', 'Kepala Sekolah', 'Pembina Tkt. I, IV/b', 'sulaeman.jpg', 'udin@smp3.com', '123456', 'Guru'),
(2, 1999004, 'Uchiha Madara', 'Yogyakarta, 2 Januari 202', 'guru', 'Pembina, IV/a', 'madara.jpg', 'madara@smp3.com', '123456', 'Guru'),
(3, 1999005, 'Sasuke', 'Konoha Gakure, 3 Januari 2020', 'guru', 'Pembina, IV/a', 'foto 3.jpg', 'sasuke@smp3.com', '123456', 'Guru'),
(4, 1999006, 'Uchiha Itachi', 'Konoha Gakure, 4 Januari 2020', 'guru', 'Pembina, IV/a', 'fotoo 3.png', 'itachi@smp3.com', '123456', 'Guru'),
(5, 1999007, 'Sakura', 'Suna Gakure, 5 Januari 2020', 'guru', 'Penata Tkt.I, III/d', 'foto 4.jpg', 'sakura@smp3.com', '123456', 'Guru'),
(6, 1999008, 'Sarada', 'Oto Gakure, 6 Januari 2020', 'guru', 'Penata Tkt.I, III/d', 'fotoo 4.png', 'sarada@smp3.com', '123456', 'Guru'),
(7, 1999011, 'Obito', 'Kirigakure, 7 Januari 2020', 'tata usaha', 'Penata Tkt.I, III/d', 'foto 5.jpg', 'obito@smp3.com', '123456', 'Guru');

-- --------------------------------------------------------

--
-- Table structure for table `j_tugas`
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
-- Dumping data for table `j_tugas`
--

INSERT INTO `j_tugas` (`id_jtugas`, `id_kelasonline`, `id_materi`, `id_siswa`, `file`, `created_at`) VALUES
(1, 1, 85, 1, '7.0 Menilai Kelayakan Usaha.pdf', '2021-01-10 12:01:23.000000');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
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
-- Table structure for table `kelasonline`
--

CREATE TABLE `kelasonline` (
  `id_kelasonline` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `fotokelasonline` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelasonline`
--

INSERT INTO `kelasonline` (`id_kelasonline`, `id_mapel`, `id_kelas`, `id_guru`, `fotokelasonline`) VALUES
(1, 1, 6, 2, 'kelas 9 B.png'),
(2, 1, 4, 2, 'kelas 8 B.png');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
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
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `id_kelasonline` int(11) NOT NULL,
  `judul` varchar(25) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `file` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `id_kelasonline`, `judul`, `deskripsi`, `file`) VALUES
(85, 1, 'Pertemuan 1', 'Baca dan Kerjakan Tugas pada file dibawah. batas waktu pengumpulan jawaban tugas 06 januari jam 12.00', '5_6316835988249248187.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `pesertakelasonline`
--

CREATE TABLE `pesertakelasonline` (
  `id_pesertakelasonline` int(11) NOT NULL,
  `id_kelasonline` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesertakelasonline`
--

INSERT INTO `pesertakelasonline` (`id_pesertakelasonline`, `id_kelasonline`, `id_siswa`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` int(11) NOT NULL,
  `id_kelasonline` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `id_kelasonline`, `id_siswa`, `id_materi`, `created_at`) VALUES
(1, 1, 1, 85, '2021-01-10 12:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
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
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nama_siswa`, `tttl`, `username`, `password`, `foto`, `level`) VALUES
(1, '2020001', 'Arsalam Launu', 'Bungku, 21 Juni 2077', 'arsalam@smp3.com', '123456', 'ala.jpg', 'Siswa'),
(2, '2020002', 'Aki Tomoya', 'Kirigakure, 15 April 2077', 'tomoya@smp3.com', '123456', 'aki.jpg', 'Siswa'),
(3, '2020003', 'Kanda Sorata', 'Bungku, 21 Juni 2077', 'kanda@smp3.com', '123456', 'foto 2.jpg', 'Siswa'),
(4, '2020004', 'Sawamura Eriri', 'Tokyo, 30 Februari 2020', 'sawamura@smp3.com', '123456', 'fotoo 2.png', 'Siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `j_tugas`
--
ALTER TABLE `j_tugas`
  ADD PRIMARY KEY (`id_jtugas`),
  ADD KEY `fk_jtugas_materi` (`id_materi`),
  ADD KEY `fk_jtugas_kelasonline` (`id_kelasonline`),
  ADD KEY `fk_jtugas_siswa` (`id_siswa`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelasonline`
--
ALTER TABLE `kelasonline`
  ADD PRIMARY KEY (`id_kelasonline`),
  ADD KEY `fk_kelasonline_mapel` (`id_mapel`),
  ADD KEY `fk_kelasonline_kelas` (`id_kelas`),
  ADD KEY `fk_kelasonline_guru` (`id_guru`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `fk_materi_kelasonline` (`id_kelasonline`);

--
-- Indexes for table `pesertakelasonline`
--
ALTER TABLE `pesertakelasonline`
  ADD PRIMARY KEY (`id_pesertakelasonline`),
  ADD KEY `fk_pesertakelasonline_kelasonline` (`id_kelasonline`),
  ADD KEY `fk_pesertakelasonline_id_siswa` (`id_siswa`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_presensi`),
  ADD KEY `fk_presensi_kelasonline` (`id_kelasonline`),
  ADD KEY `fk_presensi_materi` (`id_materi`),
  ADD KEY `fk_presensi_siswa` (`id_siswa`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `j_tugas`
--
ALTER TABLE `j_tugas`
  MODIFY `id_jtugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelasonline`
--
ALTER TABLE `kelasonline`
  MODIFY `id_kelasonline` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `pesertakelasonline`
--
ALTER TABLE `pesertakelasonline`
  MODIFY `id_pesertakelasonline` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `j_tugas`
--
ALTER TABLE `j_tugas`
  ADD CONSTRAINT `fk_jtugas_kelasonline` FOREIGN KEY (`id_kelasonline`) REFERENCES `kelasonline` (`id_kelasonline`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jtugas_materi` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jtugas_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelasonline`
--
ALTER TABLE `kelasonline`
  ADD CONSTRAINT `fk_kelasonline_guru` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kelasonline_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kelasonline_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `fk_materi_kelasonline` FOREIGN KEY (`id_kelasonline`) REFERENCES `kelasonline` (`id_kelasonline`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesertakelasonline`
--
ALTER TABLE `pesertakelasonline`
  ADD CONSTRAINT `fk_pesertakelasonline_id_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pesertakelasonline_kelasonline` FOREIGN KEY (`id_kelasonline`) REFERENCES `kelasonline` (`id_kelasonline`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `fk_presensi_kelasonline` FOREIGN KEY (`id_kelasonline`) REFERENCES `kelasonline` (`id_kelasonline`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_presensi_materi` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_presensi_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
