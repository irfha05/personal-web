-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2025 pada 10.24
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_irfha_d1a240058`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_about`
--

CREATE TABLE `tbl_about` (
  `id_about` int(11) NOT NULL,
  `about` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_about`
--

INSERT INTO `tbl_about` (`id_about`, `about`) VALUES
(3, 'Saya Irfha Najla Qisti Asfia\'u Romadlon, seorang mahasiswa Ilmu Komputer yang memiliki ketertarikan besar dalam pengembangan perangkat lunak, analisis data, dan teknologi berbasis kecerdasan buatan. Saya percaya bahwa teknologi bukan hanya alat, tetapi juga solusi yang mampu membawa perubahan nyata dalam kehidupan masyarakat.\r\n\r\nSelama menempuh pendidikan, saya aktif mengembangkan keterampilan di bidang pemrograman, pengolahan data, dan pengembangan web. Saya terbiasa bekerja secara kolaboratif dalam tim maupun secara mandiri, dengan fokus pada efisiensi, akurasi, dan inovasi.\r\n\r\nSaya memiliki semangat belajar yang tinggi, selalu antusias untuk mengeksplorasi teknologi terbaru, serta berkomitmen untuk terus berkembang sebagai profesional di bidang teknologi informasi. Portofolio ini adalah cerminan dari proses belajar, pencapaian, dan proyek-proyek yang saya bangun sebagai bagian dari perjalanan akademik dan profesional saya.\r\n\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_artikel`
--

CREATE TABLE `tbl_artikel` (
  `id_artikel` int(11) NOT NULL,
  `nama_artikel` varchar(100) DEFAULT NULL,
  `isi_artikel` text DEFAULT NULL,
  `gambar_artikel` varchar(255) NOT NULL,
  `nama_penulis` varchar(100) NOT NULL,
  `tanggal_publish` date DEFAULT NULL,
  `tag_artikel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_artikel`
--

INSERT INTO `tbl_artikel` (`id_artikel`, `nama_artikel`, `isi_artikel`, `gambar_artikel`, `nama_penulis`, `tanggal_publish`, `tag_artikel`) VALUES
(8, 'Robot: Teknologi Masa Depan yang Telah Hadir Saat Ini', 'Di era revolusi industri 4.0, robot bukan lagi sekadar fiksi ilmiah. Mereka telah menjadi bagian nyata dari kehidupan manusia, hadir di berbagai sektor mulai dari industri manufaktur hingga pelayanan kesehatan, bahkan merambah ke dalam kehidupan rumah tangga. Robot adalah perangkat mekanik atau virtual yang mampu melakukan tugas secara otomatis, baik dengan bimbingan manusia maupun sepenuhnya mandiri melalui sistem kecerdasan buatan.\r\n\r\nApa Itu Robot?\r\nSecara umum, robot adalah sistem elektromekanik yang dapat menerima perintah, memproses informasi, dan melakukan aksi tertentu. Robot dapat berupa lengan mekanik di pabrik, kendaraan otonom, hingga robot sosial yang dirancang untuk berinteraksi dengan manusia.\r\n\r\nSejarah Singkat Robot\r\nKonsep robot telah ada sejak ribuan tahun lalu, dimulai dari otomata (mesin bergerak otomatis) pada zaman Yunani kuno. Namun, istilah \"robot\" baru diperkenalkan oleh penulis Ceko, Karel Čapek, pada tahun 1920 dalam drama berjudul R.U.R. (Rossum’s Universal Robots). Sejak saat itu, perkembangan robot semakin pesat, terlebih dengan kemajuan teknologi digital dan kecerdasan buatan.\r\n\r\nJenis-Jenis Robot\r\nRobot Industri\r\nDigunakan di pabrik untuk proses produksi seperti pengelasan, perakitan, dan pengecatan.\r\n\r\nRobot Medis\r\nMembantu dalam prosedur bedah presisi tinggi atau sebagai alat rehabilitasi pasien.\r\n\r\nRobot Militer dan Penyelamatan\r\nDidesain untuk menjelajah daerah berbahaya, mendeteksi bahan peledak, atau menyelamatkan korban bencana.\r\n\r\nRobot Pelayanan dan Rumah Tangga\r\nContohnya adalah robot vacuum cleaner atau robot pelayan di restoran.\r\n\r\nRobot Sosial dan Edukasi\r\nDigunakan sebagai media pembelajaran atau teman interaktif bagi anak-anak dan lansia.\r\n\r\nKecerdasan Buatan dan Robotika\r\nIntegrasi AI (Artificial Intelligence) menjadikan robot semakin canggih. Robot kini mampu belajar dari lingkungan, mengenali suara dan wajah, bahkan membuat keputusan secara mandiri. Contohnya adalah robot Sophia dari Hanson Robotics yang dapat berinteraksi seperti manusia.', '6864e8ed44e4b_Midjourney_  Friendly, futuristic robot with gifts and online shopping icons_.jpeg', 'Irfha Najla Qisti A.R', '2025-07-02', 'Teknologi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id_gallery` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id_gallery`, `judul`, `foto`) VALUES
(9, 'Mpa', '3.jpeg'),
(12, 'Birthday Mom', 'fto 4.jpg'),
(13, 'Cottage Friends', 'fto 1.jpg'),
(14, 'College Friends', 'fto 3.jpg'),
(15, 'Mpa', 'fto 2.jpg'),
(16, 'Mpa', 'Gambar WhatsApp 2025-06-05 pukul 22.25.12_6f20c363.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_komentar`
--

CREATE TABLE `tbl_komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `nama_komentator` varchar(100) DEFAULT NULL,
  `isi_komentar` text DEFAULT NULL,
  `tanggal_komentar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengunjung`
--

CREATE TABLE `tbl_pengunjung` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pengunjung`
--

INSERT INTO `tbl_pengunjung` (`id`, `tanggal`, `jumlah`) VALUES
(1, '2025-06-29', 17),
(2, '2025-06-30', 1),
(3, '2025-07-01', 6),
(4, '2025-07-02', 14),
(5, '2025-07-03', 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`) VALUES
(1, 'Irfha', 'Irfha');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indeks untuk tabel `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indeks untuk tabel `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- Indeks untuk tabel `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `id_about` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD CONSTRAINT `tbl_komentar_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `tbl_artikel` (`id_artikel`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
