-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Mar 2023 pada 13.01
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pengaduan`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertpeugas` (IN `id_ptgs` INT(11), IN `nama_ptgs` VARCHAR(35), IN `username_ptgs` VARCHAR(25), IN `password_ptgs` VARCHAR(32), IN `telp_ptgs` VARCHAR(13), IN `level_ptgs` ENUM('admin','petugas'))   INSERT INTO petugas (id_petugas, nama_petugas, username, password, telp, level) VALUES (id_ptgs, nama_ptgs, username_ptgs, password_ptgs, telp_ptgs, level_ptgs)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `data_pengaduan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `data_pengaduan` (
`nik` char(20)
,`nama` varchar(35)
,`tgl_pengaduan` date
,`isi_laporan` text
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(20) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`) VALUES
('3208014701050003', 'Mila Nurfala', 'mila', '202cb962ac59075b964b07152d234b70', '083817217043'),
('3208096903050003', 'Mara Humaerotuz Zahra', 'mara', '202cb962ac59075b964b07152d234b70', '087635237441'),
('3208096903050009', 'ihsan misbah', 'ihsan', '202cb962ac59075b964b07152d234b70', '0899765478'),
('3208124104050001', 'Lia Alfiyanti', 'iyong', '202cb962ac59075b964b07152d234b70', '081321135790'),
('32081754050003', 'Milda Maylani', 'milda', '202cb962ac59075b964b07152d234b70', '082116085931'),
('3208185312040003', 'delviana setiani', 'delvi', '202cb962ac59075b964b07152d234b70', '085721512931'),
('3208244209050005', 'Dea Septiyani', 'dea', '202cb962ac59075b964b07152d234b70', '083156951112');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` char(20) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('proses','selesai','reject') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES
(4, '2023-03-06', '32081754050003', 'Saya mohon minta perbaikan jalan di Rt 13 rw 04,karena takut menganggu aktivitas kendaraan', 'IMG-20230306-WA0035.jpg', 'selesai'),
(5, '2023-03-09', '3208014701050003', 'saya mohon bantuan pihak desa,rumah saya kebakaran,saya harus mengungsi dimana?.saya beralamat di rt 14/rw04', 'rumah kebakaran.jpg', 'selesai'),
(6, '2023-03-09', '3208124104050001', 'kami mohon adakan jadwal untuk pembersihan di sungai,karena sampah sudah menumpuk', 'sampah.jpg', 'selesai'),
(7, '2023-03-09', '3208096903050003', 'rumah saya kebakaran', 'rumah kebakaran_1.jpg', 'reject'),
(8, '2023-03-16', '3208244209050005', 'tolong didesa saya masih bany\\ak orang yang membuang sampah sembarangan.mohon adakan teguran untuk orang yang melakukan perbuatan tersebut,agar mereka jera.', 'sampah_1.jpg', 'selesai'),
(9, '2023-03-16', '3208014701050003', 'saya mau mengadukan', 'banjir.jfif', 'proses'),
(10, '2023-03-16', '3208096903050009', 'banyak sampah disungai,tolong segera lakukan upaya untuk  membersihkan sampah tersebut', 'sampah_2.jpg', 'selesai'),
(11, '2023-03-17', '3208096903050003', 'cemimiw', 'banjir wds.jpg', 'proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp_petugas` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp_petugas`, `level`) VALUES
(1, 'Rahma Khaerunisa', 'rahma', '202cb962ac59075b964b07152d234b70', '085795628376', 'admin'),
(4, 'Devanaz Farsyah Pramedia', 'devanaz', '202cb962ac59075b964b07152d234b70', '08986792796', 'petugas'),
(6, 'Tyara Laudia', 'Tyara', '202cb962ac59075b964b07152d234b70', '083824471828', 'petugas'),
(7, 'Rifki Aminudin', 'Rifki', '202cb962ac59075b964b07152d234b70', '085315426761', 'petugas'),
(9, 'Vira Faridah', 'vira', '202cb962ac59075b964b07152d234b70', '089607810501', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `isi_tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `isi_tanggapan`, `id_petugas`) VALUES
(4, 4, '2023-03-08', 'Pihak desa akan melakukan perbaikan jalan tersebut,nanti kami akan memanggil tukang ke alamat tersebut pada tanggal 09/03/2021', 4),
(5, 4, '2023-03-08', 'pihak desa akan memanggil tukang perbaikan jalan ke alamat tersebut pada tgl 09/03/2023 ', 4),
(6, 4, '2023-03-08', 'pihak desa akan segera memperbaiki jalan tersebut,kami akan mendatangka tukang pada tanggal 09/03/2023', 4),
(7, 5, '2023-03-09', 'baik akan segera kirim bantuan,untuk sementara kalian bisa mengungsi dibalai desa', 4),
(8, 6, '2023-03-09', 'baik nantti kami akan segera umumkan jadwal pembersihan sungai,pembersihan sungai akan dilaksanakan nanti hari minggu.', 7),
(9, 7, '2023-03-14', 'maaf data yang anda kirimkan kurang akurat', 4),
(10, 8, '2023-03-16', 'baik kami akan segera adakan hukuman bagi orang yang melakukan perbuatan tersebut.', 7),
(11, 10, '2023-03-16', 'baik kami akan segera mengadakan jadwal untuk membersihkan sungai teersebut', 1);

-- --------------------------------------------------------

--
-- Struktur untuk view `data_pengaduan`
--
DROP TABLE IF EXISTS `data_pengaduan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_pengaduan`  AS   (select `masyarakat`.`nik` AS `nik`,`masyarakat`.`nama` AS `nama`,`pengaduan`.`tgl_pengaduan` AS `tgl_pengaduan`,`pengaduan`.`isi_laporan` AS `isi_laporan` from (`masyarakat` join `pengaduan`) where `masyarakat`.`nik` = `pengaduan`.`nik`)  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
