-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 30, 2023 at 01:33 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isigame`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_game`
--

CREATE TABLE `tbl_game` (
  `id_game` int NOT NULL,
  `nama_game` varchar(255) NOT NULL,
  `ukuran_game` int NOT NULL,
  `gambar_game` varchar(255) NOT NULL,
  `deskripsi_game` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Petualangan'),
(3, 'Olahraga'),
(4, 'Multiplayer'),
(5, 'Horror'),
(6, 'FPS'),
(7, 'RPG'),
(8, 'Open World');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_game`
--

CREATE TABLE `tbl_kategori_game` (
  `id_game` int NOT NULL,
  `id_kategori` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengisian`
--

CREATE TABLE `tbl_pengisian` (
  `kode_pengisian` varchar(255) NOT NULL,
  `id_pengisian` int NOT NULL,
  `id_user` int NOT NULL,
  `ukuran_penyimpanan` int NOT NULL,
  `ukuran_digunakan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengisian_game`
--

CREATE TABLE `tbl_pengisian_game` (
  `id_pengisian` int NOT NULL,
  `id_game` int NOT NULL,
  `ukuran_digunakan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nomor_telepon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `role`, `nama`, `username`, `password`, `nomor_telepon`) VALUES
(1, 'admin', 'admin', 'admin', '$2y$10$vyPG8QcaDi8PghFjLXFFxeMw4Jo.wFGYjFi/ondXmBZ/CR70jKlKy', '081231231231');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_game`
--
ALTER TABLE `tbl_game`
  ADD PRIMARY KEY (`id_game`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_kategori_game`
--
ALTER TABLE `tbl_kategori_game`
  ADD KEY `id_game` (`id_game`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tbl_pengisian`
--
ALTER TABLE `tbl_pengisian`
  ADD PRIMARY KEY (`id_pengisian`),
  ADD UNIQUE KEY `kode_pengisian` (`kode_pengisian`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_pengisian_game`
--
ALTER TABLE `tbl_pengisian_game`
  ADD KEY `id_game` (`id_game`),
  ADD KEY `id_pengisian` (`id_pengisian`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `nomor_telepon` (`nomor_telepon`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_game`
--
ALTER TABLE `tbl_game`
  MODIFY `id_game` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_pengisian`
--
ALTER TABLE `tbl_pengisian`
  MODIFY `id_pengisian` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_kategori_game`
--
ALTER TABLE `tbl_kategori_game`
  ADD CONSTRAINT `tbl_kategori_game_ibfk_1` FOREIGN KEY (`id_game`) REFERENCES `tbl_game` (`id_game`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_kategori_game_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pengisian`
--
ALTER TABLE `tbl_pengisian`
  ADD CONSTRAINT `tbl_pengisian_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pengisian_game`
--
ALTER TABLE `tbl_pengisian_game`
  ADD CONSTRAINT `tbl_pengisian_game_ibfk_1` FOREIGN KEY (`id_game`) REFERENCES `tbl_game` (`id_game`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pengisian_game_ibfk_2` FOREIGN KEY (`id_pengisian`) REFERENCES `tbl_pengisian` (`id_pengisian`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
