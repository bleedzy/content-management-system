-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 12:39 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id_carousel` int(11) NOT NULL,
  `judul` varchar(70) NOT NULL,
  `foto` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id_carousel`, `judul`, `foto`) VALUES
(14, 'Sidang BPUPKI', 'bpupki.jpg'),
(17, 'Walangan', 'walangan.jpg'),
(18, '(kosong)', 'Screenshot_(13).png');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `judul` varchar(70) NOT NULL,
  `foto` varchar(70) NOT NULL,
  `tanggal` date NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `judul`, `foto`, `tanggal`, `username`) VALUES
(5, 'Walangan', 'walangan.jpg', '2023-12-03', 'Adhizy'),
(6, 'Sidang BPUPKI', 'bpupki.jpg', '2023-12-03', 'Adhizy'),
(7, 'Gerwani', 'gerwani.jpeg', '2023-12-03', 'Adhizy'),
(8, 'Proklamasi', 'proklamasi.jpg', '2023-12-04', 'guest'),
(9, 'Profile Genshin Impact', 'Screenshot_(145).png', '2023-12-04', 'guest'),
(10, 'Belajar HTML', 'Screenshot_(13).png', '2023-12-04', 'guest');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(101) NOT NULL,
  `kategori` varchar(70) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `status`) VALUES
(9, 'Random', 'nonaktif'),
(11, 'Bahasa Jawa', 'aktif'),
(12, 'Sejarah', 'nonaktif');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id` int(11) NOT NULL,
  `judul_web` varchar(70) NOT NULL,
  `profil_web` text NOT NULL,
  `instagram` varchar(50) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `whatsapp` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id`, `judul_web`, `profil_web`, `instagram`, `facebook`, `twitter`, `whatsapp`, `alamat`, `email`) VALUES
(1, 'Web CMS!', '', 'https://www.instagram.com/f.adhiizy', '', 'https://twitter.com/Kateki_A', '085842146097', 'Dukuhan, Sambirejo, Jumantono', 'firstaadiwidjaya@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `id_konten` int(101) NOT NULL,
  `judul` varchar(70) NOT NULL,
  `id_kategori` varchar(70) NOT NULL,
  `isi_konten` text NOT NULL,
  `tanggal` date NOT NULL,
  `username` varchar(70) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`id_konten`, `judul`, `id_kategori`, `isi_konten`, `tanggal`, `username`, `foto`) VALUES
(18, 'CMS', '9', '<p>Tess</p>\r\n<p>aaaaaa</p>\r\n<p>bbbbb</p>\r\n<p>cccccc</p>\r\n<p>ddddd</p>', '2023-10-12', 'Adhizy', ''),
(25, 'Walangan', '11', '<p style=\"language: en-ID; line-height: 150%; margin-top: 0pt; margin-bottom: 0pt; margin-left: 0in; text-align: left; direction: ltr; unicode-bidi: embed; mso-line-break-override: none; word-break: normal; punctuation-wrap: hanging;\">Walangan utawa disebut Carang Mas, Kremes, utawa Grubi yaiku panganan tradisional khas Jawa sing diwetani saka Ubi Jalar utawa Singkong.</p>\r\n<p style=\"language: en-ID; line-height: 150%; margin-top: 0pt; margin-bottom: 0pt; margin-left: 0in; text-align: left; direction: ltr; unicode-bidi: embed; mso-line-break-override: none; word-break: normal; punctuation-wrap: hanging;\">&nbsp;</p>\r\n<p class=\"MsoNormal\"><a href=\"https://docs.google.com/presentation/d/1t-IMNlVQ8LsveBvq1_dMEqkeBcxaNc8u/edit?usp=drive_link&amp;ouid=117611403848871889776&amp;rtpof=true&amp;sd=true\">Selebihnya...</a></p>', '2023-12-02', 'Adhizy', 'walangan.jpg'),
(26, 'Gerwani', '12', '<p>Gerakan Wanita Indonesia (Gerwani) adalah sebuah organisasi wanita yang didirikan dengan nama Gerwis (Gerakan Wanita Istri Sedar) di Semarang, Jawa Tengah, pada tanggal 4 Juni 1950.</p>', '2023-12-03', 'Adhizy', 'gerwani.jpeg'),
(27, 'Sidang BPUPKI Pertama', '12', '<p>Sidang BPUPKI yang pertama dilangsungkan pada tanggal 29 Mei sampai 1 Juni 1945. Sedangkan untuk lokasi dilaksanakanya sidang BPUPKI yang pertama adalah di Gedung Chuo Sangi In atau untuk saat ini lebih banyak kita kenal dengan sebutan Gedung Pancasila. Gedung ini terletak di Jalan Taman Pejambon Nomor 6, Senen, Jakarta Pusat.</p>\r\n<p>Pada saat sidang BPUPKI yang pertama dilangsungkan, ada 12 anggota yang naik podium untuk menjelaskan uraian. Salah satunya adalah Mohammad Yamin yang juga naik ke podium untuk memaparkan uraian.</p>\r\n<div id=\"grame-1554632226\" class=\"grame-multiplex\"></div>\r\n<p>Pada sidang BPUPKI yang pertama, Muhammad Yamin memaparkan tentang kelengkapan negara yang dibutuhkan oleh Indonesia jika sudah merdeka nantinya. Pada saat sidang BPUPKI yang pertama ini juga Mohammad Yamin memaparkan lima asas dasar negara yaitu Peri Kebangsaan, Peri Kemanusiaan, Peri Ketuhanan, Peri Kerakyatan, dan Kesejahteraan Rakyat.</p>\r\n<div id=\"grame-1929734835\" class=\"grame-amp-3\"></div>\r\n<p>Pada saat sidang BPUPKI pertama memasuki hari ketiga, giliran Mr. Soepomo memaparkan rumusan yang serupa namun dengan nama Dasar Negara Indonesia Mereka yaitu Persatuan, Kekeluargaan, Mufakat dan Demokrasi, Musyawarah, serta Keadilan Sosial.</p>\r\n<p>Lalu, pada sidang BPUPKI pertama memasuki hari terakhir atau tepatnya pada tanggal 1 Juni 1945, Ir. Soekarno memperkenalkan lima sila yang terdiri dari Kebangsaan Indonesia, Internasionalisme dan Peri Kemanusiaan, Mufakat atau Demokrasi, Kesejahteraan Sosial, dan Ketuhanan Yang Maha Esa.</p>', '2023-12-03', 'Adhizy', 'bpupki.jpg'),
(29, 'Proklamasi', '12', '<p>Pada pagi hari tanggal 17 Agustus 1945, di kediaman Soekarno di Jalan Pegangsaan Timur 56 (sekarang Jl. Proklamasi No.1), acara Proklamasi dimulai. Pukul 10 pagi, Soekarno membacakan teks Proklamasi dan pidato singkat setelahnya. Kemudian, bendera Merah Putih, yang dijahit oleh Ibu Fatmawati, dikibarkan oleh seorang prajurit PETA bernama Latief Hendraningrat yang dibantu oleh Soepardjo dan seorang pemudi yang membawa nampan berisi bendera Merah Putih. Setelah bendera berkibar, lagu Indonesia Raya dinyanyikan oleh semua hadirin. Bendera pusaka tersebut masih disimpan di Museum Tugu Proklamasi Nasional hingga saat ini.</p>', '2023-12-04', 'Adhizy', 'proklamasi.jpg'),
(31, 'Belajar HTML', '9', '<p>Belajar membuat card pada HTML</p>', '2023-12-04', 'guest', 'Screenshot_(13).png');

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id_saran` int(11) NOT NULL,
  `isi_saran` text NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` enum('Admin','Kontributor') NOT NULL,
  `image` varchar(50) NOT NULL,
  `recent_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `level`, `image`, `recent_login`) VALUES
(9, 'Adhizy', '726a5583130866d211a39387f6592a2b', 'Adhi', 'Admin', 'kafuu.jpeg', '2023-12-05 09:55:08'),
(13, 'guest', 'f8829935a87192f3f9fab79856122c0f', 'Tamu', 'Kontributor', '3e47fe00a7439108aa58ca2ded2b7e3d.jpg', '2023-12-04 21:40:52'),
(14, 'apacona', '81dc9bdb52d04dc20036dbd8313ed055', 'Ibnu', 'Kontributor', '', '2023-10-01 20:52:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id_carousel`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id_konten`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id_carousel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(101) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
  MODIFY `id_konten` int(101) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
