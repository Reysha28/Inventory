-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2022 at 10:47 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangmasuk`
--

CREATE TABLE `barangmasuk` (
  `kode` varchar(50) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `idk` varchar(30) DEFAULT NULL,
  `tglmasuk` date DEFAULT NULL,
  `kondisi` varchar(30) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `gambar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barangmasuk`
--

INSERT INTO `barangmasuk` (`kode`, `nama`, `idk`, `tglmasuk`, `kondisi`, `jumlah`, `status`, `gambar`) VALUES
('A01', 'Kursi', 'K-BTHP', '2021-07-12', 'Baik', 30, 'Dipinjam', 'kursi.jfif'),
('A02', 'Meja', 'K-BTHP', '2021-07-13', 'Sangat Baik', 22, 'Tersedia', 'meja.jfif'),
('A03', 'Whiteboard', 'K-BTHP', '2021-07-15', 'Sangat Baik', 2, 'Tersedia', 'whiteboard.jfif'),
('A04', 'Tempat Sampah', 'K-BTHP', '2021-07-16', 'Sangat Baik', 2, 'Tersedia', 'tempat_sampah.jfif'),
('A05', 'Jam Dinding', 'K-BTHP', '2021-07-09', 'Sangat Baik', 1, 'Tersedia', 'jam_dinding.jfif'),
('A06', 'Penghapus Papan Tulis', 'K-BTHP', '2021-07-10', 'Sangat Baik', 2, 'Tersedia', 'penghapus_papan_tulis.jfif'),
('A07', 'Lemari', 'K-BTHP', '2021-07-10', 'Sangat Baik', 2, 'Tersedia', 'lemari.jfif'),
('A08', 'Layar Infocus', 'K-BTHP', '2021-07-10', 'Sangat Baik', 1, 'Tersedia', 'layar_infocus.jfif'),
('B01', 'CPU', 'K-BTHP', '2021-07-04', 'Sangat Baik', 22, 'Tersedia', 'cpu.jfif'),
('B02', 'Monitor', 'K-BTHP', '2021-07-05', 'Sangat Baik', 22, 'Tersedia', 'monitor.jfif'),
('B03', 'Printer', 'K-BTHP', '2021-07-06', 'Sangat Baik', 1, 'Tersedia', 'printer.jfif'),
('B04', 'Scanner', 'K-BTHP', '2021-07-06', 'Sangat Baik', 2, 'Tersedia', 'scanner.jfif'),
('B05', 'Keyboard', 'K-BTHP', '2021-07-07', 'Sangat Baik', 22, 'Tersedia', 'keyboard.jfif'),
('B06', 'Mouse', 'K-BTHP', '2021-07-08', 'Sangat Baik', 22, 'Tersedia', 'mouse.jfif'),
('B07', 'Ethernet Hub', 'K-BTHP', '2021-07-11', 'Sangat Baik', 22, 'Tersedia', 'ethernet_hub.jfif'),
('B08', 'AC', 'K-BTHP', '2021-07-14', 'Sangat Baik', 3, 'Tersedia', 'ac.jfif'),
('B09', 'Lampu', 'K-BHP', '2021-07-21', 'Sangat Baik', 3, 'Tersedia', 'lampu.jfif'),
('B10', 'Vacum Cleaner', 'K-BTHP', '2021-07-06', 'Sangat Baik', 1, 'Tersedia', 'vacum_cleaner.jfif'),
('B11', 'Speaker', 'K-BTHP', '2021-07-12', 'Sangat Baik', 2, 'Tersedia', 'speaker.jfif'),
('B12', 'Infocus', 'K-BTHP', '2021-07-09', 'Sangat Baik', 1, 'Tersedia', 'infocus.jfif'),
('B13', 'Cok Sambung', 'K-BTHP', '2021-07-14', 'Baik', 30, 'Tersedia', 'cok_sambung.jfif'),
('C01', 'Kertas A4', 'K-BHP', '2021-07-01', 'Sangat Baik', 6, 'Tersedia', 'kertas_a4.jfif'),
('C02', 'Spidol', 'K-BHP', '2021-07-02', 'Sangat Baik', 6, 'Tersedia', 'spidol.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idk` varchar(10) NOT NULL,
  `jenis` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idk`, `jenis`) VALUES
('K-BHP', 'Barang Habis Pakai'),
('K-BTHP', 'Barang Tidak Habis Pakai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(1, 'userA', '$2y$10$0.w3xe9PBvHoQtQ9CMcEj.ML4UXdrwMj371rzPTZCVquC/pRTW7F.', 'user'),
(2, 'userB', '$2y$10$H8cLyQLqrgk9.Yr1Us5OguG.AmwWYhL4HvsldylyiymjiRF/weJcS', 'user'),
(3, 'adminA', '$2y$10$m3/k/ebjIKCNRepp8bf5quD5ARjQyAcE6EOFPSRRUkPVmr4/ObWsy', 'admin'),
(4, 'adminB', '$2y$10$4Uwo/CXzmHXo8dUxF4XKxOwwp9semmbgykUKuIMg/oIB79HagKQlG', 'admin'),
(5, 'adminC', '$2y$10$gK62a6.qnEaXQI408BrMdeohQHnkTyU9jT2bW5eK97utMRCsPBHEy', 'admin'),
(6, 'userC', '$2y$10$H/FM46gw6Rq72R7oWfHwGu15M7doNuqVlria5XaETCdgj3zbw2ine', 'user'),
(7, 'userD', '$2y$10$fwpdi7JRfRROPF5UXnXIbOtvfcuO/6kuAfmGOFbhAPXAfd3RlSCVC', 'user'),
(8, 'userE', '$2y$10$GEZirJ0D1evzgcGHSmFGQOZZmLPN6Q47Ca5UIqqmdqmJl1g2dmgvq', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `idk` (`idk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  ADD CONSTRAINT `barangmasuk_ibfk_1` FOREIGN KEY (`idk`) REFERENCES `kategori` (`idk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
