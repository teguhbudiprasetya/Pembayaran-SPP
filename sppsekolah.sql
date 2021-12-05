-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2021 at 12:03 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sppsekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `namalengkap` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `namalengkap`) VALUES
(1, 'admin', 'admin', 'Teguh Prasetya'),
(2, 'admin1', 'admin1', 'Admin1'),
(3, 'admin1', 'admin1', 'Admin1');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `idguru` int(5) NOT NULL,
  `namaguru` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`idguru`, `namaguru`) VALUES
(1, 'Pak Sulimee'),
(2, 'Pak Prasetya'),
(8, 'Pak Fanani'),
(9, 'Pak Nico'),
(12, 'Pak Yoga');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `idsiswa` int(10) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `namasiswa` varchar(40) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `tahunajaran` varchar(10) NOT NULL,
  `biaya` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`idsiswa`, `nis`, `namasiswa`, `kelas`, `tahunajaran`, `biaya`) VALUES
(92, '21412', 'Agoy', 'I A', '2021/2022', 50000),
(93, '2004110014', 'A. Teguh Budi Setya Prasetya', 'I A', '2021/2022', 50000),
(94, '21312412', 'Fanani', 'III A', '2021/2022', 50000),
(95, '2141', 'Niconi', 'V A', '2021/2022', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `idspp` int(5) NOT NULL,
  `idsiswa` int(10) NOT NULL,
  `jatuhtempo` date NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `nobayar` varchar(10) NOT NULL,
  `tglbayar` varchar(20) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `ket` varchar(20) NOT NULL,
  `idadmin` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`idspp`, `idsiswa`, `jatuhtempo`, `bulan`, `nobayar`, `tglbayar`, `jumlah`, `ket`, `idadmin`) VALUES
(1, 93, '2021-12-02', 'December 2021', '2112039301', '03-12-2021', 50000, 'LUNAS', 1),
(2, 92, '2022-01-02', 'January 2022', '2201029202', '2021-12-03', 50000, 'keterangan', 1),
(3, 92, '2022-02-02', 'February 2022', '2202029203', '03-12-2021', 50000, 'keterangan', 1),
(4, 92, '2022-03-02', 'March 2022', '2203029204', '03-12-2021', 50000, 'keterangan', 1),
(5, 92, '2022-04-02', 'April 2022', '2204029207', '03-12-2021', 50000, 'keterangan', 1),
(6, 92, '2022-05-02', 'May 2022', '2205029208', '03-12-2021', 50000, 'keterangan', 1),
(7, 92, '2022-06-02', 'June 2022', '2206029214', '2021-12-03', 50000, 'LUNAS', 1),
(8, 92, '2022-07-02', 'July 2022', '2207029214', '2021-12-03', 50000, 'LUNAS', 1),
(9, 92, '2022-08-02', 'August 2022', '', '', 50000, '', 1),
(10, 92, '2022-09-02', 'September 2022', '', '', 50000, '', 1),
(11, 92, '2022-10-02', 'October 2022', '', '', 50000, '', 1),
(12, 92, '2022-11-02', 'November 2022', '', '', 50000, '', 1),
(13, 93, '2021-12-02', 'December 2021', '2112029305', '03-12-2021', 50000, 'keterangan', 1),
(14, 93, '2022-01-02', 'January 2022', '2201029305', '03-12-2021', 50000, 'keterangan', 1),
(15, 93, '2022-02-02', 'February 2022', '2202029305', '03-12-2021', 50000, 'keterangan', 1),
(16, 93, '2022-03-02', 'March 2022', '2203029305', '03-12-2021', 50000, 'keterangan', 1),
(17, 93, '2022-04-02', 'April 2022', '2204029306', '03-12-2021', 50000, 'keterangan', 1),
(18, 93, '2022-05-02', 'May 2022', '2205029307', '03-12-2021', 50000, 'keterangan', 1),
(19, 93, '2022-06-02', 'June 2022', '2206029308', '03-12-2021', 50000, 'keterangan', 1),
(20, 93, '2022-07-02', 'July 2022', '2207029309', '03-12-2021', 50000, 'keterangan', 1),
(21, 93, '2022-08-02', 'August 2022', '2208029310', '03-12-2021', 50000, 'keterangan', 1),
(22, 93, '2022-09-02', 'September 2022', '2209029311', '03-12-2021', 50000, 'keterangan', 1),
(23, 93, '2022-10-02', 'October 2022', '2210029312', '03-12-2021', 50000, 'LUNAS', 1),
(24, 93, '2022-11-02', 'November 2022', '2211029313', '2021-12-03', 50000, 'LUNAS', 1),
(25, 94, '2021-12-03', 'December 2021', '', '', 50000, '', 1),
(26, 94, '2022-01-03', 'January 2022', '', '', 50000, '', 1),
(27, 94, '2022-02-03', 'February 2022', '', '', 50000, '', 1),
(28, 94, '2022-03-03', 'March 2022', '', '', 50000, '', 1),
(29, 94, '2022-04-03', 'April 2022', '', '', 50000, '', 1),
(30, 94, '2022-05-03', 'May 2022', '', '', 50000, '', 1),
(31, 94, '2022-06-03', 'June 2022', '', '', 50000, '', 1),
(32, 94, '2022-07-03', 'July 2022', '', '', 50000, '', 1),
(33, 94, '2022-08-03', 'August 2022', '', '', 50000, '', 1),
(34, 94, '2022-09-03', 'September 2022', '', '', 50000, '', 1),
(35, 94, '2022-10-03', 'October 2022', '', '', 50000, '', 1),
(36, 94, '2022-11-03', 'November 2022', '', '', 50000, '', 1),
(37, 95, '2021-12-03', 'December 2021', '', '', 50000, '', 1),
(38, 95, '2022-01-03', 'January 2022', '', '', 50000, '', 1),
(39, 95, '2022-02-03', 'February 2022', '', '', 50000, '', 1),
(40, 95, '2022-03-03', 'March 2022', '', '', 50000, '', 1),
(41, 95, '2022-04-03', 'April 2022', '', '', 50000, '', 1),
(42, 95, '2022-05-03', 'May 2022', '', '', 50000, '', 1),
(43, 95, '2022-06-03', 'June 2022', '', '', 50000, '', 1),
(44, 95, '2022-07-03', 'July 2022', '', '', 50000, '', 1),
(45, 95, '2022-08-03', 'August 2022', '', '', 50000, '', 1),
(46, 95, '2022-09-03', 'September 2022', '', '', 50000, '', 1),
(47, 95, '2022-10-03', 'October 2022', '', '', 50000, '', 1),
(48, 95, '2022-11-03', 'November 2022', '', '', 50000, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `walikelas`
--

CREATE TABLE `walikelas` (
  `kelas` varchar(10) NOT NULL,
  `idguru` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `walikelas`
--

INSERT INTO `walikelas` (`kelas`, `idguru`) VALUES
('I A', 1),
('I B', 2),
('III A', 8),
('IV A', 9),
('V A', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`idguru`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idsiswa`),
  ADD KEY `kelas` (`kelas`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`idspp`),
  ADD KEY `idsiswa` (`idsiswa`),
  ADD KEY `idadmin` (`idadmin`);

--
-- Indexes for table `walikelas`
--
ALTER TABLE `walikelas`
  ADD PRIMARY KEY (`kelas`),
  ADD KEY `idguru` (`idguru`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `idguru` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `idsiswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `idspp` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kelas`) REFERENCES `walikelas` (`kelas`) ON UPDATE CASCADE;

--
-- Constraints for table `spp`
--
ALTER TABLE `spp`
  ADD CONSTRAINT `spp_ibfk_1` FOREIGN KEY (`idadmin`) REFERENCES `admin` (`idadmin`) ON UPDATE CASCADE,
  ADD CONSTRAINT `spp_ibfk_2` FOREIGN KEY (`idsiswa`) REFERENCES `siswa` (`idsiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `walikelas`
--
ALTER TABLE `walikelas`
  ADD CONSTRAINT `walikelas_ibfk_1` FOREIGN KEY (`idguru`) REFERENCES `guru` (`idguru`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
