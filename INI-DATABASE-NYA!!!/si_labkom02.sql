-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2020 at 02:59 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_labkom02`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `id_alat` varchar(20) NOT NULL,
  `nama_alat` varchar(255) NOT NULL,
  `harga` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `id_lab` varchar(20) NOT NULL,
  `nama_lab` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`id_lab`, `nama_lab`) VALUES
('LAB.DS', 'Lab. Data Science'),
('LAB.JAR', 'Lab. Jaringan'),
('LAB.KOMDAS', 'Lab. Komputasi Dasar'),
('LAB.MIKRO', 'Lab. Mikrokontroller'),
('LAB.MULMED', 'Lab. Multimedia'),
('LAB.PEMDAS', 'Lab. Pemrograman Dasar'),
('LAB.RPL', 'Lab. Rekayasa Perangkat Lunak (RPL)');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(8) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `angkatan` varchar(8) NOT NULL,
  `prodi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_alat`
--

CREATE TABLE `peminjaman_alat` (
  `id_pinjam_alat` int(10) NOT NULL,
  `nim` varchar(8) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `jam` time NOT NULL DEFAULT current_timestamp(),
  `tempat` varchar(100) NOT NULL,
  `id_alat` varchar(20) NOT NULL,
  `jumlah_alat` int(10) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `status` enum('lunas','belum lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_ruang`
--

CREATE TABLE `peminjaman_ruang` (
  `id_pinjam_ruang` int(10) NOT NULL,
  `nim` varchar(8) NOT NULL,
  `no_wa` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_pinjam` time NOT NULL,
  `jam_kembali` time NOT NULL,
  `id_lab` varchar(20) NOT NULL,
  `keperluan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat_bebas_labkom`
--

CREATE TABLE `surat_bebas_labkom` (
  `id_surat` int(8) NOT NULL,
  `nim` varchar(8) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_wa` varchar(13) NOT NULL,
  `tanggal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(8) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id_lab`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `peminjaman_alat`
--
ALTER TABLE `peminjaman_alat`
  ADD PRIMARY KEY (`id_pinjam_alat`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_alat` (`id_alat`);

--
-- Indexes for table `peminjaman_ruang`
--
ALTER TABLE `peminjaman_ruang`
  ADD PRIMARY KEY (`id_pinjam_ruang`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_lab` (`id_lab`);

--
-- Indexes for table `surat_bebas_labkom`
--
ALTER TABLE `surat_bebas_labkom`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peminjaman_alat`
--
ALTER TABLE `peminjaman_alat`
  MODIFY `id_pinjam_alat` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peminjaman_ruang`
--
ALTER TABLE `peminjaman_ruang`
  MODIFY `id_pinjam_ruang` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_bebas_labkom`
--
ALTER TABLE `surat_bebas_labkom`
  MODIFY `id_surat` int(8) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman_alat`
--
ALTER TABLE `peminjaman_alat`
  ADD CONSTRAINT `peminjaman_alat_ibfk_1` FOREIGN KEY (`id_alat`) REFERENCES `alat` (`id_alat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_alat_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman_ruang`
--
ALTER TABLE `peminjaman_ruang`
  ADD CONSTRAINT `peminjaman_ruang_ibfk_1` FOREIGN KEY (`id_lab`) REFERENCES `lab` (`id_lab`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ruang_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
