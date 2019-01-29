-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Mei 2017 pada 03.48
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbd_pegawai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(3) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `privileges` varchar(10) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`idadmin`, `nip`, `username`, `password`, `nama`, `privileges`, `foto`) VALUES
(1, '21120114120020', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Harliyan Tri Mardian', 'admin', 'photo1.jpg'),
(2, '21120114140084', 'bryan', '827ccb0eea8a706c4c34a16891f84e7b', 'Bryan Pratisia', 'hrd', 'food.png'),
(3, '21120114120012', 'yanuar', '827ccb0eea8a706c4c34a16891f84e7b', 'Yanuar Akbar T. P.', 'gm', 'default.jpg'),
(4, '2112011412003', 'steve', '827ccb0eea8a706c4c34a16891f84e7b', 'Steve', 'hrd', 'default.jpg'),
(5, '21120114120005', 'jobs', '27a06a9e3d5e7f67eb604a39536208c9', 'Jobs', 'hrd', 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji_pegawai`
--

CREATE TABLE `gaji_pegawai` (
  `no` int(4) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `gaji` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gaji_pegawai`
--

INSERT INTO `gaji_pegawai` (`no`, `jabatan`, `gaji`) VALUES
(1, 'Manager', '5500000'),
(2, 'Staff', '3000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `jabatan` varchar(15) NOT NULL,
  `divisi` varchar(20) NOT NULL,
  `id_admin` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama`, `alamat`, `no_hp`, `email`, `jabatan`, `divisi`, `id_admin`) VALUES
('21120114120000', 'Tejo', 'Semarang Bawah', '086723487428', 'tejo@gmail.com', 'Manager', 'Keuangan', 2),
('21120114120001', 'Bambang', 'Semarang', '08976587965', 'Bambang@gmail.com', 'Manager', 'General Manager', 2),
('21120114120002', 'Sunaryo', 'Kediri', '098987678567', 'Sunaryo@yahoo.com', 'Manager', 'HRD', 2),
('21120114120005', 'Jobs', 'Surabaya', '087675453456', 'Jobs123@gmail.com', 'Manager', 'Support', 1),
('21120114120006', 'Agus', 'Jakarta Barat', '087897678678', 'Agaus@gmail.com', 'Staff', 'HRD', 1),
('21120114120007', 'James', 'Surabaya', '089789890890', 'james@yahoo.com', 'Staff', 'IT', 2),
('21120114120008', 'Tejo Bagus', 'Kendari', '089999777888', 'Tejoo@gmail.com', 'Staff', 'Support', 2),
('21120114120012', 'Yanuar Akbar', 'Gondang, Semarang', '082221684427', 'yanuar@gmail.com', 'Manager', 'General Manager', 1),
('21120114120020', 'Harliyan Tri Mardian', 'Banjarsari, Semarang', '0857740308062', 'aan@gmail.com', 'admin', 'admin', 1),
('2112011412003', 'Steve', 'Bandung', '086896753489', 'Steve@rocketmail.com', 'Manager', 'IT', 1),
('21120114140084', 'Bryan Pratisia', 'Sumurboto, Semarang', '085790554950', 'bryan@gmail.com', 'Manager', 'HRD', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_admin`
--
CREATE TABLE `user_admin` (
`idadmin` int(3)
,`nip` varchar(20)
,`username` varchar(10)
,`password` varchar(255)
,`nama` varchar(30)
,`privileges` varchar(10)
,`alamat` varchar(40)
,`email` varchar(30)
,`no_hp` varchar(20)
,`foto` varchar(255)
,`jabatan` varchar(15)
,`divisi` varchar(20)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `user_admin`
--
DROP TABLE IF EXISTS `user_admin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_admin`  AS  select `a`.`idadmin` AS `idadmin`,`a`.`nip` AS `nip`,`a`.`username` AS `username`,`a`.`password` AS `password`,`a`.`nama` AS `nama`,`a`.`privileges` AS `privileges`,`p`.`alamat` AS `alamat`,`p`.`email` AS `email`,`p`.`no_hp` AS `no_hp`,`a`.`foto` AS `foto`,`p`.`jabatan` AS `jabatan`,`p`.`divisi` AS `divisi` from (`admin` `a` join `pegawai` `p`) where (`a`.`nip` = `p`.`nip`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `gaji_pegawai`
--
ALTER TABLE `gaji_pegawai`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
