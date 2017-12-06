-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2017 at 07:36 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `go_married`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `umur` int(11) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status_wn` varchar(255) NOT NULL,
  `status_kawin` varchar(255) NOT NULL,
  `nama_cw` varchar(255) NOT NULL,
  `tempat_lahir_cw` varchar(255) NOT NULL,
  `tgl_lahir_cw` date NOT NULL,
  `umur_cw` int(11) NOT NULL,
  `agama_cw` varchar(255) NOT NULL,
  `alamat_cw` varchar(255) NOT NULL,
  `status_wn_cw` varchar(255) NOT NULL,
  `status_kawin_cw` varchar(255) NOT NULL,
  `nama_ay` varchar(255) NOT NULL,
  `tgl_lahir_ay` date NOT NULL,
  `agama_ay` varchar(255) NOT NULL,
  `alamat_ay` varchar(255) NOT NULL,
  `nama_ay_cw` varchar(255) NOT NULL,
  `tgl_lahir_ay_cw` date NOT NULL,
  `agama_ay_cw` varchar(255) NOT NULL,
  `alamat_ay_cw` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `tgl_lahir_ibu` date NOT NULL,
  `agama_ibu` varchar(255) NOT NULL,
  `alamat_ibu` varchar(255) NOT NULL,
  `nama_ibu_cw` varchar(255) NOT NULL,
  `tgl_lahir_ibu_cw` date NOT NULL,
  `agama_ibu_cw` varchar(255) NOT NULL,
  `alamat_ibu_cw` varchar(255) NOT NULL,
  `nama_s` varchar(255) NOT NULL,
  `tgl_lahir_s` date NOT NULL,
  `alamat_s` varchar(255) NOT NULL,
  `nama_scw` varchar(255) NOT NULL,
  `tgl_lahir_scw` date NOT NULL,
  `alamat_scw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
