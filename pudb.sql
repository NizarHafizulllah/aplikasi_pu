-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Okt 2017 pada 12.33
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pudb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE IF NOT EXISTS `jenis` (
`id` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id`, `jenis`, `icon`) VALUES
(1, 'Jembatan', '00182392839.png'),
(2, 'Kantor Pemerintahan', '324234234234.png'),
(3, 'Masjid', 'b981d4e680336002b0d508accac69b01.png'),
(4, 'Gereja', '492845f46e95971632d89f7f486b0749.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
`id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `email`, `password`, `nama`) VALUES
(1, 'admin', '0cc175b9c0f1b6a831c399e269772661', 'Bustanil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `properti`
--

CREATE TABLE IF NOT EXISTS `properti` (
`id` int(11) NOT NULL,
  `lat` varchar(30) NOT NULL,
  `lng` varchar(30) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `properti`
--

INSERT INTO `properti` (`id`, `lat`, `lng`, `jenis`, `nama`, `image`) VALUES
(1, '-8.497025', '117.420246', '1', 'Kerangka Baja', 'krangkabaja.jpg'),
(2, '-8.488960', '117.416642', '1', 'Brang Biji', 'brangbiji.jpg'),
(3, '-8.476924', '117.410605', '1', 'Lempeh', 'lempeh.jpg'),
(4, '-8.551390', '117.487409', '1', 'Jembatan Serading', 'serading.jpg'),
(5, '-8.505734', '117.424155', '1', 'Jembatan Baru', '1543dc4381bf589a6d5bfbe3e8c19252.jpg'),
(6, '-8.504475', '117.426344', '3', 'Masjid Jami', '9d705b46dc5afc83115f93a2b0f78a62.jpg'),
(7, '-8.487409', '117.424871', '4', 'GKT Ebenhaezer', 'dffaf54c3cc27e600c275ec5131af6a0.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properti`
--
ALTER TABLE `properti`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `properti`
--
ALTER TABLE `properti`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
