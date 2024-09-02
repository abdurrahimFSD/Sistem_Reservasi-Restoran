-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2024 at 05:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_reservasi-restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `id_meja` int(11) NOT NULL,
  `no_meja` varchar(10) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `posisi` enum('Outdoor','Indoor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id_meja`, `no_meja`, `kapasitas`, `posisi`) VALUES
(1, 'M01', 8, 'Indoor'),
(2, 'M02', 8, 'Indoor'),
(33, 'M03', 3, 'Outdoor'),
(34, 'M04', 8, 'Outdoor'),
(42, 'M06', 4, 'Outdoor'),
(43, 'M07', 8, 'Outdoor'),
(44, 'M08', 2, 'Outdoor'),
(45, 'M09', 5, 'Indoor'),
(54, 'M10', 6, 'Outdoor'),
(109, 'M12', 6, 'Indoor');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `no_telepon`) VALUES
(1, 'Erling Haaland ', 'Norway ', '081347200001'),
(2, 'Julian Alvarez', 'Argentina', '081347200002'),
(3, 'Phil Foden', 'England', '081347200003'),
(4, 'Jeremy Doku', 'Belgium', '081347200004'),
(5, 'Bernardo Silva', 'Portugal', '081347200005'),
(11, 'Jack Grealish', 'England', '081347200006'),
(12, 'Rodri', 'Spain city', '081347200007');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `tanggal_reservasi` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `meja_id` int(11) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `catatan` varchar(50) DEFAULT NULL,
  `jumlah_orang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `tanggal_reservasi`, `waktu_mulai`, `waktu_selesai`, `meja_id`, `pelanggan_id`, `catatan`, `jumlah_orang`) VALUES
(14, '2024-08-26', '14:00:00', '15:00:00', 1, 1, 'Makan Siang', 3),
(18, '2024-08-27', '15:23:00', '16:26:00', 33, 2, 'Makan Siang', 2),
(19, '2024-08-27', '08:00:00', '10:30:00', 45, 2, 'Makan Pagi', 3),
(20, '2024-08-25', '06:28:00', '11:59:00', 45, 3, 'Makan Pagi', 2),
(21, '2024-08-30', '05:29:00', '06:00:00', 1, 1, 'Makan Pagi', 3),
(34, '2024-09-02', '05:00:00', '06:50:00', 43, 1, 'Makan Pagi', 8),
(37, '2024-09-02', '02:50:00', '04:59:00', 43, 2, 'Makan Pagi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'admin1', 'admin1@gmail.com', '$2y$10$z7LtsMzEZUsbz0y1IXGL8.Lbwa8a3vk0JZt.DrFwp5EzSGs8F74pu', '2024-08-30 09:42:44'),
(2, 'admin2', 'admin2@gmail.com', '$2y$10$K.MNsKycusJV1FCNyza8oeDL3CNvX.6HOfbjboRFYTEKmmTx9SQ.G', '2024-08-30 13:07:50'),
(25, 'admin3', 'admin3@gmail.com', '$2y$10$G3qT/rSh07sw7Y2hkssH..gRxdI.jlchBCuc8z5Qv8ko1PNU.Yox.', '2024-09-01 12:42:26'),
(26, 'admin4', 'admin4@gmail.com', '$2y$10$2qGj2thZPscRB63ZJZgeAeU35FTJKMqDOIwysDQ7qORqwVZQ0QkI2', '2024-09-01 12:56:44'),
(27, 'admin5', 'admin5@gmail.com', '$2y$10$gMLHlYzkob3YSWAPsHkvJOTFwzgH9IQhA9CP55nMiAlgwRmjMLJk2', '2024-09-02 02:11:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `meja_id` (`meja_id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `reservasi_ibfk_1` FOREIGN KEY (`meja_id`) REFERENCES `meja` (`id_meja`),
  ADD CONSTRAINT `reservasi_ibfk_2` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
