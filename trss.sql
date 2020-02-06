-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Feb 2020 pada 18.33
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trss`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tline`
--

CREATE TABLE IF NOT EXISTS `tline` (
`IdLine` int(5) NOT NULL,
  `LineName` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tline`
--

INSERT INTO `tline` (`IdLine`, `LineName`) VALUES
(14, 'nissan'),
(15, 'isuzu'),
(16, 'as');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tplan`
--

CREATE TABLE IF NOT EXISTS `tplan` (
  `IdPlan` varchar(100) NOT NULL,
  `IdProcess` int(5) NOT NULL,
  `IdProduk` varchar(50) NOT NULL,
  `Qty` int(10) NOT NULL,
  `CreateDate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tplan`
--

INSERT INTO `tplan` (`IdPlan`, `IdProcess`, `IdProduk`, `Qty`, `CreateDate`) VALUES
('5e319764b986c', 16, '5e318f9dd3f31', 12, '29/01/2020'),
('5e319bfd742fa', 17, '5e318f9dd3f31', 78, '29/01/2020'),
('5e319c4b42304', 18, '5e3195c71565a', 12, '29/01/2020'),
('5e32cb446fc5d', 19, '5e3195b9b5bdc', 56, '30/01/2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tposition`
--

CREATE TABLE IF NOT EXISTS `tposition` (
`IdPosition` int(5) NOT NULL,
  `PositionName` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tposition`
--

INSERT INTO `tposition` (`IdPosition`, `PositionName`) VALUES
(1, 'before'),
(2, 'after');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tprocess`
--

CREATE TABLE IF NOT EXISTS `tprocess` (
`IdProcess` int(5) NOT NULL,
  `ProcessName` varchar(50) NOT NULL,
  `IdLine` int(5) NOT NULL,
  `IdPosition` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tprocess`
--

INSERT INTO `tprocess` (`IdProcess`, `ProcessName`, `IdLine`, `IdPosition`) VALUES
(16, 'CORE', 14, 1),
(17, 'BRAZING', 14, 2),
(18, 'WELDING', 15, 2),
(19, 'CLINCHING, HELIUM LEAK, ASSY', 15, 1),
(20, 'FINISH GOOD', 14, 1),
(21, 'WATER LEAK', 15, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tproduk`
--

CREATE TABLE IF NOT EXISTS `tproduk` (
  `IdProduk` varchar(50) NOT NULL,
  `PartNumber` varchar(50) NOT NULL,
  `PartName` varchar(100) NOT NULL,
  `IdPosition` int(5) NOT NULL,
  `IdLine` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tproduk`
--

INSERT INTO `tproduk` (`IdProduk`, `PartNumber`, `PartName`, `IdPosition`, `IdLine`) VALUES
('5e318f9dd3f31', '21411', 'RADIATOR', 1, 14),
('5e318fe46fa0a', '921P2', 'CONDENSOR', 1, 14),
('5e31930e277cf', '21412', 'RADIATOR', 2, 14),
('5e3193334d155', '921P3', 'CONDENSOR', 2, 14),
('5e31934b6be0c', '21481', 'ASSY COOLING', 2, 14),
('5e31939cabd75', '21487', 'ASSY FAN', 2, 14),
('5e3193bb51d78', '21410', 'ASSY RADIATOR', 1, 14),
('5e3193f376cfd', '92100', 'ASSY CONDENSOR', 2, 14),
('5e31949127306', 'AK811', 'RADIATOR', 1, 15),
('5e3194b50c7ac', 'Y9741', 'RADIATOR', 1, 15),
('5e3194f6a3178', 'AL311', 'RADIATOR', 1, 15),
('5e31950470159', 'AL3211', 'RADIATOR', 1, 15),
('5e31954c5f8b4', 'AM651', 'RADIATOR', 1, 15),
('5e31957cdd462', 'AL295', 'INTERCOOLER', 1, 15),
('5e31959865c43', 'V3735', 'INTERCOOLER', 1, 15),
('5e3195a6cf265', 'Y9765', 'INTERCOOLER', 1, 15),
('5e3195b9b5bdc', 'AM655', 'INTERCOOLER', 1, 15),
('5e3195c71565a', 'AK810', 'RADIATOR', 2, 15),
('5e3195f8943ff', 'Y9740', 'RADIATOR', 2, 15),
('5e31960ddd614', 'AL320', 'RADIATOR', 2, 15),
('5e31961f8ddcd', 'AM650', 'RADIATOR', 2, 15),
('5e3817a3ce4d8', '12312', 'abcas', 2, 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trole`
--

CREATE TABLE IF NOT EXISTS `trole` (
`IdRole` int(5) NOT NULL,
  `RoleName` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trole`
--

INSERT INTO `trole` (`IdRole`, `RoleName`) VALUES
(1, 'admin'),
(2, 'operator'),
(3, 'leader');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tschedule`
--

CREATE TABLE IF NOT EXISTS `tschedule` (
  `IdSchedule` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `IdPlan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tschedule`
--

INSERT INTO `tschedule` (`IdSchedule`, `Date`, `IdPlan`) VALUES
('JDW0001', '2020-02-04', '5e319764b986c'),
('JDW0001', '2020-02-04', '5e319bfd742fa'),
('JDW0002', '2020-02-05', '5e319764b986c'),
('JDW0002', '2020-02-05', '5e319bfd742fa'),
('JDW0002', '2020-02-05', '5e32cb446fc5d'),
('JDW0003', '2020-02-07', '5e319764b986c'),
('JDW0003', '2020-02-07', '5e32cb446fc5d'),
('JDW0003', '2020-02-07', '5e319c4b42304');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ttransaksi`
--

CREATE TABLE IF NOT EXISTS `ttransaksi` (
  `IdTransaksi` varchar(50) NOT NULL,
  `Nik` int(10) NOT NULL,
  `IdPlan` varchar(100) NOT NULL,
  `ActualQty` int(5) NOT NULL,
  `Note` varchar(200) NOT NULL,
  `IdSchedule` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ttransaksi`
--

INSERT INTO `ttransaksi` (`IdTransaksi`, `Nik`, `IdPlan`, `ActualQty`, `Note`, `IdSchedule`) VALUES
('trss5e3a7af345f62', 44435, '5e319764b986c', 10, '', 'SC5e381dea12eea'),
('trss5e3a80c730167', 1403201, '5e319764b986c', 20, '', 'SC5e381dea12eea');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tusers`
--

CREATE TABLE IF NOT EXISTS `tusers` (
`IdUser` int(5) NOT NULL,
  `IdRole` int(5) NOT NULL,
  `Nik` int(8) NOT NULL,
  `Fullname` varchar(50) NOT NULL,
  `Gender` varchar(5) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Hp` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `IdPosition` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tusers`
--

INSERT INTO `tusers` (`IdUser`, `IdRole`, `Nik`, `Fullname`, `Gender`, `Username`, `Password`, `Hp`, `Email`, `IdPosition`) VALUES
(7, 1, 46899, 'ade rahmat', 'L', 'aderahmatn', '21232f297a57a5a743894a0e4a801fc3', '087776451664', 'nurdiyana.ade@gmail.com', 2),
(11, 2, 44435, 'suci alimah', 'P', 'suciaja', '21232f297a57a5a743894a0e4a801fc3', '08111235413', 'sucialimah@yahoo.com', 2),
(12, 2, 53671, 'nandita', 'P', 'nandita', '21232f297a57a5a743894a0e4a801fc3', '08222142331', 'nandita@yahoo.com', 1),
(14, 2, 82761, 'jajang super', 'P', 'jajangsu', '827ccb0eea8a706c4c34a16891f84e7b', '08777162516', 'jajangsup@gmail.com', 2),
(15, 1, 76354, 'nura senja', 'P', 'nurasen', '21232f297a57a5a743894a0e4a801fc3', '08111237461', 'nura.senja@gmail.com', 1),
(16, 1, 12345, 'agus jaenudin', 'L', 'aguswae', 'd41d8cd98f00b204e9800998ecf8427e', '081112736115', 'agus_jae@yahoo.com', 1),
(17, 1, 12345, 'login admin', 'L', 'admin', 'f6fdffe48c908deb0f4c3bd36c032e72', '08127361127', 'login_admin@gmail.com', 1),
(18, 3, 12345, 'Leader Produksi', 'L', 'leader', '21232f297a57a5a743894a0e4a801fc3', '08726311726', 'leade.produksi@gmail.com', 1),
(19, 2, 1403201, 'suci a', 'P', 'sucia', '827ccb0eea8a706c4c34a16891f84e7b', '111111111111', 'suci123@gmail.com', 1),
(20, 1, 86567, 'admin produksi', 'L', 'adminpro', '21232f297a57a5a743894a0e4a801fc3', '98787652678', 'admin.produksi@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tline`
--
ALTER TABLE `tline`
 ADD PRIMARY KEY (`IdLine`);

--
-- Indexes for table `tplan`
--
ALTER TABLE `tplan`
 ADD PRIMARY KEY (`IdPlan`), ADD KEY `IdProcess` (`IdProcess`), ADD KEY `IdPart` (`IdProduk`), ADD KEY `IdPart_2` (`IdProduk`), ADD KEY `IdProduk` (`IdProduk`);

--
-- Indexes for table `tposition`
--
ALTER TABLE `tposition`
 ADD PRIMARY KEY (`IdPosition`);

--
-- Indexes for table `tprocess`
--
ALTER TABLE `tprocess`
 ADD PRIMARY KEY (`IdProcess`);

--
-- Indexes for table `tproduk`
--
ALTER TABLE `tproduk`
 ADD PRIMARY KEY (`IdProduk`), ADD KEY `IdPosition` (`IdPosition`), ADD KEY `IdLine` (`IdLine`);

--
-- Indexes for table `trole`
--
ALTER TABLE `trole`
 ADD PRIMARY KEY (`IdRole`);

--
-- Indexes for table `tschedule`
--
ALTER TABLE `tschedule`
 ADD KEY `IdPlan` (`IdPlan`);

--
-- Indexes for table `ttransaksi`
--
ALTER TABLE `ttransaksi`
 ADD PRIMARY KEY (`IdTransaksi`), ADD KEY `IdUser` (`Nik`), ADD KEY `IdPlan` (`IdPlan`), ADD KEY `IdUser_2` (`Nik`), ADD KEY `IdPlan_2` (`IdPlan`);

--
-- Indexes for table `tusers`
--
ALTER TABLE `tusers`
 ADD PRIMARY KEY (`IdUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tline`
--
ALTER TABLE `tline`
MODIFY `IdLine` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tposition`
--
ALTER TABLE `tposition`
MODIFY `IdPosition` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tprocess`
--
ALTER TABLE `tprocess`
MODIFY `IdProcess` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `trole`
--
ALTER TABLE `trole`
MODIFY `IdRole` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tusers`
--
ALTER TABLE `tusers`
MODIFY `IdUser` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tplan`
--
ALTER TABLE `tplan`
ADD CONSTRAINT `tplan_ibfk_1` FOREIGN KEY (`IdProcess`) REFERENCES `tprocess` (`IdProcess`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tplan_ibfk_2` FOREIGN KEY (`IdProduk`) REFERENCES `tproduk` (`IdProduk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tproduk`
--
ALTER TABLE `tproduk`
ADD CONSTRAINT `tproduk_ibfk_1` FOREIGN KEY (`IdPosition`) REFERENCES `tposition` (`IdPosition`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tproduk_ibfk_2` FOREIGN KEY (`IdLine`) REFERENCES `tline` (`IdLine`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tschedule`
--
ALTER TABLE `tschedule`
ADD CONSTRAINT `tschedule_ibfk_1` FOREIGN KEY (`IdPlan`) REFERENCES `tplan` (`IdPlan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ttransaksi`
--
ALTER TABLE `ttransaksi`
ADD CONSTRAINT `ttransaksi_ibfk_2` FOREIGN KEY (`IdPlan`) REFERENCES `tplan` (`IdPlan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
