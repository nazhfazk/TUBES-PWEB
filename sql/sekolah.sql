-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2022 at 04:17 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nrp` varchar(32) NOT NULL,
  `nm_guru` varchar(64) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nrp`, `nm_guru`, `id_kelas`) VALUES
('6701202110', 'Ina', 3),
('6701202111', 'Dewi', 1),
('6701202112', 'Lilis', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nm_kelas` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nm_kelas`) VALUES
(1, 'MIPA-1'),
(2, 'MIPA-2'),
(3, 'MIPA-3'),
(4, 'MIPA-4'),
(5, 'MIPA-5'),
(6, 'MIPA-6');

-- --------------------------------------------------------

--
-- Table structure for table `matpel`
--

CREATE TABLE `matpel` (
  `kd_matpel` varchar(32) NOT NULL,
  `nama_matpel` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matpel`
--

INSERT INTO `matpel` (`kd_matpel`, `nama_matpel`) VALUES
('bind', 'Bahasa Indonesia'),
('bing', 'Bahasa Inggris'),
('bio', 'Biologi'),
('fsk', 'Fisika'),
('mtk', 'Matematika'),
('pai', 'Pendidikan Agama Islam');

-- --------------------------------------------------------

--
-- Table structure for table `mengambil`
--

CREATE TABLE `mengambil` (
  `nis` varchar(32) NOT NULL,
  `kd_matpel` varchar(32) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mengambil`
--

INSERT INTO `mengambil` (`nis`, `kd_matpel`, `nilai`) VALUES
('0028011720', 'bind', 80),
('0028011720', 'bing', 80),
('0028011720', 'bio', 75),
('0028011720', 'fsk', 88),
('0028011720', 'mtk', 95),
('0028011720', 'pai', 85),
('0028011723', 'bind', 80),
('0028011723', 'bio', 75);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(32) NOT NULL,
  `nm_siswa` varchar(64) NOT NULL,
  `nrp` varchar(32) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nm_siswa`, `nrp`, `id_user`) VALUES
('0028011720', 'Ripan Renaldi', '6701202112', 21),
('0028011721', 'Salman Abdussalam', '6701202110', 6),
('0028011722', 'dimas', '6701202111', 20),
('0028011723', 'test', '6701202112', 24);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('1','2') DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(2, 'ripan2', '321', '2'),
(3, 'bmFwaXI=', '$2y$10$RIVNqX8Ng/2iOOWenogv6.27XQNyjIJw999BtyNm/GyNdsc33EKf.', '2'),
(4, 'rpn', '$2y$10$5Cy80m9bUvdYve4oxG7ft.mWf.FYKJB9CziVrPFLVS7ZHeC19XACK', '2'),
(5, 'siswa', '$2y$10$WDwDSlD4I5PnC0A.iTlpUOts4wgwCmJ0rQupUQuEYTi9/.S8DMirm', '2'),
(9, 'salman', '$2y$10$IgG0jkijqb0niA7Lj4YwAeT71cb9QAc4LveeXlzSaIZ.le.FemfSa', '2'),
(19, 'admin', '$2y$10$BM2f0kMdmPfV.qCf/d04p.vRNuDlb2i4XJB9dKnMadfMe42zHGAw2', '1'),
(20, 'dimas', '$2y$10$/XMW9f8K.z4.A5tGQqoOL.g9.H4uQ.GSPxiZyuWiyaNfebWYiErqW', '2'),
(21, 'ripan', '$2y$10$KLvDFlJ5W/tJs9KkmsEWRO7ohNlk4uhyHqSMKQ5kEmRFMORufNIvO', '2'),
(24, 'test', '$2y$10$JzXCGplI0oIR.m7n3fU9bekZjrDKv67IPgyt5lUzZpjaGJfmIQshK', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nrp`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `matpel`
--
ALTER TABLE `matpel`
  ADD PRIMARY KEY (`kd_matpel`);

--
-- Indexes for table `mengambil`
--
ALTER TABLE `mengambil`
  ADD KEY `kd_matpel` (`kd_matpel`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mengambil`
--
ALTER TABLE `mengambil`
  ADD CONSTRAINT `mengambil_ibfk_1` FOREIGN KEY (`kd_matpel`) REFERENCES `matpel` (`kd_matpel`),
  ADD CONSTRAINT `mengambil_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
