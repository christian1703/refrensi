-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jun 2022 pada 17.46
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pintarbersama`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `analisis`
--

CREATE TABLE `analisis` (
  `id_analisis` int(100) NOT NULL,
  `id_ujian` int(100) NOT NULL,
  `id_soal` int(100) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `jawaban` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `analisis`
--

INSERT INTO `analisis` (`id_analisis`, `id_ujian`, `id_soal`, `id_siswa`, `jawaban`) VALUES
(1, 22, 128, 24, '4'),
(2, 23, 129, 25, '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_tugas`
--

CREATE TABLE `kelas_tugas` (
  `id_klstugas` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas_tugas`
--

INSERT INTO `kelas_tugas` (`id_klstugas`, `id_tugas`, `id_kelas`, `id_jurusan`, `aktif`) VALUES
(9, 6, 7, 2, 'Y'),
(19, 16, 7, 5, 'N'),
(18, 15, 7, 5, 'Y'),
(21, 16, 7, 5, 'Y'),
(23, 17, 7, 0, 'N'),
(24, 17, 7, 0, 'N'),
(29, 18, 7, 5, 'N'),
(28, 17, 7, 5, 'Y'),
(31, 18, 7, 5, 'Y'),
(33, 19, 7, 5, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_ujian`
--

CREATE TABLE `kelas_ujian` (
  `id_klsujian` int(11) NOT NULL,
  `id_ujian` int(5) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas_ujian`
--

INSERT INTO `kelas_ujian` (`id_klsujian`, `id_ujian`, `id_kelas`, `id_jurusan`, `aktif`) VALUES
(22, 10, 7, 2, 'Y'),
(35, 23, 7, 5, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_ujianessay`
--

CREATE TABLE `kelas_ujianessay` (
  `id_klsessay` int(11) NOT NULL,
  `id_ujianessay` int(11) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(10) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_ujian` varchar(100) NOT NULL,
  `acak_soal` text NOT NULL,
  `jawaban` text NOT NULL,
  `sisa_waktu` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `jml_benar` int(5) NOT NULL,
  `jml_kosong` int(5) NOT NULL,
  `jml_salah` int(5) NOT NULL,
  `nilai` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_siswa`, `id_ujian`, `acak_soal`, `jawaban`, `sisa_waktu`, `waktu_selesai`, `jml_benar`, `jml_kosong`, `jml_salah`, `nilai`) VALUES
(17, 24, '20', '117', '4', '00:10:00', '09:28:21', 1, 0, 0, '100'),
(18, 24, '22', '128', '4', '00:20:00', '19:04:53', 1, 0, 0, '100'),
(19, 25, '23', '129', '2', '00:12:00', '17:52:43', 1, 0, 0, '100');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(10) NOT NULL,
  `id_pengirim` varchar(30) NOT NULL,
  `id_penerima` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `isi_pesan` longtext NOT NULL,
  `sudah_dibaca` enum('belum','sudah') NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_pengirim`, `id_penerima`, `tanggal`, `isi_pesan`, `sudah_dibaca`, `id_kelas`, `id_jurusan`) VALUES
(1, '123', '', '2022-06-08', 'belajar ya', 'belum', 7, 5),
(2, '123', '', '2022-06-10', 'halo', 'belum', 0, 0),
(3, '123', '', '2022-06-10', 'halo semua', 'belum', 7, 5),
(4, '123', '', '2022-06-10', 'halo', 'belum', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(5) NOT NULL,
  `id_ujian` int(5) NOT NULL,
  `soal` text NOT NULL,
  `pilihan_1` text NOT NULL,
  `pilihan_2` text NOT NULL,
  `pilihan_3` text NOT NULL,
  `pilihan_4` text NOT NULL,
  `pilihan_5` text NOT NULL,
  `kunci` int(2) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id_soal`, `id_ujian`, `soal`, `pilihan_1`, `pilihan_2`, `pilihan_3`, `pilihan_4`, `pilihan_5`, `kunci`, `status`) VALUES
(119, 21, '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.25pt\">Sistem</span></span></span></span> <span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.25pt\">operasi</span></span></span></span> <span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.2pt\">ini</span></span></span></span> <span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.25pt\">memiliki</span></span></span></span> <span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.25pt\">logo</span></span></span></span> <span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.3pt\">seekor</span></span></span></span> <span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.25pt\">pinguin,</span></span></span></span> <span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.25pt\">bersifat</span></span></span></span> <i><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.2pt\">open</span></span></span></span> <span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.25pt\">source</span></span></span></span> </i><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.2pt\">dan</span></span></span></span> <span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.3pt\">gratis </span></span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.25pt\">sehingga memberi </span></span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.3pt\">kebebasan </span></span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.2pt\">bagi </span></span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.25pt\">para </span></span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.3pt\">programer </span></span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.2pt\">untuk </span></span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.3pt\">mengembangkan </span></span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.25pt\">sistem</span></span></span></span> <span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.3pt\">operasinya</span></span></span></span> <span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.25pt\">sendiri.</span></span></span></span> <span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.25pt\">Sistem</span></span></span></span> <span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.25pt\">operasi</span></span></span></span> <span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.2pt\">ini</span></span></span></span> <span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.25pt\">dinamakan</span></span></span></span> ..</p>\r\n', '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">Microsoft Windows</span></span></span></p>\r\n', '<p>Machintosh</p>\r\n', '<p>Linux</p>\r\n', '<p>Unix</p>\r\n', '<p>Ubuntu</p>\r\n', 3, 'Y'),
(118, 21, '<p>Yang dimaksud dengan komputer adalah</p>\r\n', '<p>media penghubung untuk setiap komponen komputer agar dapat saling berkomunikasi dengan komponen komputer lainnya</p>\r\n', '<p>disiplin ilmu yanbg mempelajari transformasi fakta berlambang, yaitu data maupun informasi pada mesin berbasis komputasi</p>\r\n', '<p>Suatu alat elektronik yang menggunakan transmisi signal listrik dalam jaringan untuk saling berkomunikasi</p>\r\n', '<p>Suatu alat elektronik yang mampu melakukan beberapa tugas yaitu menerima input memproses input sesuai dengan instruksi yang diberikan&nbsp;</p>\r\n', '<p>Suatu alat yang untuk bermain game</p>\r\n', 4, 'Y'),
(117, 20, '<p>Apa itu perangkat keras</p>\r\n', '<p>Perangkat yang sok keras</p>\r\n', '<p>iya</p>\r\n', '<p>bodoamat</p>\r\n', '<p>Hardware</p>\r\n', '<p>p</p>\r\n', 4, 'Y'),
(120, 21, '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.45pt\">Berikut</span></span></span></span> <span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.4pt\">yang</span></span></span></span> <span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.45pt\">bukan</span></span></span></span> <span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.45pt\">merupakan</span></span></span></span> <span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.5pt\">interaksi</span></span></span></span> <span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.45pt\">antarmuka</span></span></span></span> <span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.4pt\">pemindai</span></span></span></span> <span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.45pt\">biometric</span></span></span></span> <span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.4pt\">ialah</span></span></span></span></p>\r\n', '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Alexander&quot;,serif\"><span style=\"color:#221f1f\">mengidentiikasi dengan menganalisa bentuk wajah seseorang</span></span></span></p>\r\n', '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Alexander&quot;,serif\"><span style=\"color:#221f1f\">identiikasi dengan kode </span></span></span>QR</p>\r\n', '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">menggunakan jari untuk menyentuh <span style=\"letter-spacing:-.15pt\">layar</span></span></span></span></p>\r\n', '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Alexander&quot;,serif\"><span style=\"color:#221f1f\">Identiikasi iris atau retina mata seseorang</span></span></span></p>\r\n', '<p>Mengedintifikasi permukaan tubuh</p>\r\n', 1, 'Y'),
(121, 21, '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">Fungsi alat ini ialah untuk memindai data atau dokumen dengan cara </span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">m<span style=\"letter-spacing:-.05pt\">e</span></span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">n<span style=\"letter-spacing:-.05pt\">d</span></span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">up<span style=\"letter-spacing:-.05pt\">l</span>i<span style=\"letter-spacing:-.25pt\">k</span>a<span style=\"letter-spacing:-.05pt\">s</span>i</span></span></span> &nbsp;<span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">d</span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">a<span style=\"letter-spacing:-.05pt\">l</span></span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">am</span></span></span> &nbsp;<span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">b</span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">e</span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">nt</span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">uk</span></span></span> &nbsp;<span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">di<span style=\"letter-spacing:-.05pt\">g</span></span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">i<span style=\"letter-spacing:-.05pt\">t</span></span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">al</span></span></span> &nbsp;<span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">a<span style=\"letter-spacing:-.05pt\">t</span></span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">au</span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"color:#221f1f\"> &nbsp;<i>ile &nbsp;</i></span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">d</span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">a<span style=\"letter-spacing:-.05pt\">l</span></span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">am</span></span></span> &nbsp;<span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.35pt\">k</span></span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">o</span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">mp<span style=\"letter-spacing:-.05pt\">u</span></span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.1pt\">t</span></span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">e</span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.55pt\">r</span></span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">.</span></span></span> &nbsp;<span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">A<span style=\"letter-spacing:-.05pt\">l</span></span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">at</span></span></span> &nbsp;<span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">ini</span></span></span> <span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">termasuk jenis <i>hardware </i></span></span></span></p>\r\n', '<p>Input device</p>\r\n', '<p>Output device</p>\r\n', '<p>Storage device</p>\r\n', '<p>Processing device</p>\r\n', '<p>Program device</p>\r\n', 3, 'Y'),
(122, 21, '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.3pt\">Yang</span></span></span></span> <span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">tidak termasuk ciri-ciri dari JOYSTICK adalah</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">alat keluaran komputer berbentuk tuas</span></span></span></p>\r\n', '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">dapat mentransmisikan arah dua atau tiga dimensi <span style=\"letter-spacing:-.2pt\">ke</span> komputer</span></span></span></p>\r\n', '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">sebagai pelengkap untuk memainkan permainan video yang dilengkapi dengan lebih dari satu tombol</span></span></span></p>\r\n', '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">banyak diimplementasikan pada mesin-mesin, seperti pada kursi roda bermotor dan juga truk</span></span></span></p>\r\n', '<p>menjadi game</p>\r\n', 1, 'Y'),
(123, 21, '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">Manakah berikut yang termasuk <i>output device?</i></span></span></span></p>\r\n', '<p>Flashdisk</p>\r\n', '<p>Monitor</p>\r\n', '<p>Memory Card</p>\r\n', '<p>Chip</p>\r\n', '<p>Hardisk</p>\r\n', 2, 'Y'),
(124, 21, '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">Fungsi prosesor adalah</span></span></span></p>\r\n', '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">media penghubung untuk setiap komponen komputer agar dapat saling berkomunikasi dengan komponen komputer </span></span></span>lainnya</p>\r\n', '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">salah satu komponen inti yang terdapat dalam CPU komputer yang berfungsi sebagai otak komputer</span></span></span></p>\r\n', '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">menyimpan berbagai data dan berbagai sistem operasi dari suatu peranti komputer itu </span></span></span>sendiri</p>\r\n', '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Alexander&quot;,serif\"><span style=\"color:#221f1f\">mengolah data grais sebelum ditampilkan <span style=\"letter-spacing:-.2pt\">ke</span> </span></span></span>monitor</p>\r\n', '<p>menyimpan data</p>\r\n', 2, 'Y'),
(125, 21, '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">Suatu peranti dihubungkan <span style=\"letter-spacing:-.2pt\">ke </span>komputer dan peranti tersebut tidak dikenali oleh komputer tersebut. Maka, hal ini sesuai dengan fungsi sistem operasi sebagai</span></span></span></p>\r\n', '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">mengatur dan mengendalikan peranti</span></span></span></p>\r\n', '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">pengendali hak akses oleh pengguna</span></span></span></p>\r\n', '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">pengaturan memori</span></span></span></p>\r\n', '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">manaj<span style=\"letter-spacing:-.05pt\">e</span>m<span style=\"letter-spacing:-.05pt\">e</span></span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">n</span></span></span> <i><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"color:#221f1f\">i</span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"color:#221f1f\">le</span></span></span></i></p>\r\n', '<p>mengatur monitor</p>\r\n', 2, 'Y'),
(126, 21, '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">Berikut ciri-ciri dari sebuah sistem operasi</span></span></span></p>\r\n\r\n<p>1.&nbsp;<span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">Sistem operasi ini dikembangkan oleh Apple Corp</span></span></span></p>\r\n\r\n<p>2.&nbsp;&nbsp;<span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">Merupakan sistem operasi yang terlindungi dari virus</span></span></span></p>\r\n', '<p>Linux</p>\r\n', '<p>Open suse</p>\r\n', '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">Macintosh OS</span></span></span></p>\r\n', '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">Microsoft Windows</span></span></span></p>\r\n', '<p>Ubuntu</p>\r\n', 3, 'Y'),
(127, 21, '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.15pt\">Perangkat</span></span></span></span> <span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">lunak uji coba yang diberikan secara gratis dengan keterbatasan </span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Alexander&quot;,serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.15pt\">itur-itur </span></span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Alexander&quot;,serif\"><span style=\"color:#221f1f\">tertentu </span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Alexander&quot;,serif\"><span style=\"color:#221f1f\">seperi ketersediaan, </span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Alexander&quot;,serif\"><span style=\"color:#221f1f\">fungsi, dan </span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Alexander&quot;,serif\"><span style=\"color:#221f1f\"><span style=\"letter-spacing:-.15pt\">kenyaman&nbsp; </span></span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Alexander&quot;,serif\"><span style=\"color:#221f1f\">yang&nbsp; tidak </span></span></span><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">dapat dimanfaatkan secara maksimal ialah </span></span></span></p>\r\n', '<p><span lang=\"id\" style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#221f1f\">Commercial Software</span></span></span></p>\r\n', '<p>Shareware</p>\r\n', '<p>Freeware</p>\r\n', '<p>Openware</p>\r\n', '<p>Closeware</p>\r\n', 1, 'Y'),
(128, 22, '<p>1</p>\r\n', '<p>2</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>5</p>\r\n', '<p>6</p>\r\n', 4, 'Y'),
(129, 23, '<p>1</p>\r\n', '<p>2</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>5</p>\r\n', '<p>6</p>\r\n', 2, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `aktif` varchar(5) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_lengkap`, `username`, `password`, `aktif`, `foto`) VALUES
(1, 'Admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Y', '13320003_Christian Tobing_DIII Teknologi Komputer.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama_guru` varchar(120) NOT NULL,
  `email` varchar(65) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` varchar(5) NOT NULL,
  `date_created` date NOT NULL,
  `confirm` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nik`, `nama_guru`, `email`, `password`, `foto`, `status`, `date_created`, `confirm`) VALUES
(14, '123', '123', '123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 'Y', '2022-06-10', 'Yes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenistugas`
--

CREATE TABLE `tb_jenistugas` (
  `id_jenistugas` int(11) NOT NULL,
  `jenis_tugas` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenistugas`
--

INSERT INTO `tb_jenistugas` (`id_jenistugas`, `jenis_tugas`) VALUES
(1, 'INDIVIDU'),
(2, 'KELOMPOK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenisujian`
--

CREATE TABLE `tb_jenisujian` (
  `id_jenis` int(11) NOT NULL,
  `jenis_ujian` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenisujian`
--

INSERT INTO `tb_jenisujian` (`id_jenis`, `jenis_ujian`) VALUES
(2, 'Ilmu Dasar Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_master_jurusan`
--

CREATE TABLE `tb_master_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_master_jurusan`
--

INSERT INTO `tb_master_jurusan` (`id_jurusan`, `jurusan`) VALUES
(5, 'INFORMATIKA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_master_kelas`
--

CREATE TABLE `tb_master_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_master_kelas`
--

INSERT INTO `tb_master_kelas` (`id_kelas`, `kelas`) VALUES
(7, 'VII');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_master_mapel`
--

CREATE TABLE `tb_master_mapel` (
  `id_mapel` int(11) NOT NULL,
  `mapel` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_master_mapel`
--

INSERT INTO `tb_master_mapel` (`id_mapel`, `mapel`) VALUES
(10, 'INFORMATIKA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_master_semester`
--

CREATE TABLE `tb_master_semester` (
  `id_semester` int(11) NOT NULL,
  `semester` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_master_semester`
--

INSERT INTO `tb_master_semester` (`id_semester`, `semester`) VALUES
(3, 'BAB 1'),
(4, 'BAB 2'),
(5, 'BAB 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_materi`
--

CREATE TABLE `tb_materi` (
  `id_materi` int(11) NOT NULL,
  `judul_materi` varchar(120) NOT NULL,
  `materi` text NOT NULL,
  `nama_file` varchar(120) NOT NULL,
  `tipe_file` varchar(20) NOT NULL,
  `ukuran_file` varchar(30) NOT NULL,
  `file` varchar(255) NOT NULL,
  `tgl_entry` date NOT NULL,
  `id_roleguru` int(11) NOT NULL,
  `public` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_materi`
--

INSERT INTO `tb_materi` (`id_materi`, `judul_materi`, `materi`, `nama_file`, `tipe_file`, `ukuran_file`, `file`, `tgl_entry`, `id_roleguru`, `public`) VALUES
(12, 'Bilangan Biner', '', '1654843746', 'pdf', '442366', '../pelengkap/file/PERANGKAT_1654843746.pdf', '2022-06-10', 6, 'N'),
(13, 'Bilangan Biner', '', '1654843793', 'pdf', '408454', '../pelengkap/file/PERANGKAT_1654843793.pdf', '2022-06-10', 6, 'Y'),
(14, 'Bilangan Biner', '', '1654843816', 'pdf', '502053', '../pelengkap/file/PERANGKAT_1654843816.pdf', '2022-06-10', 6, 'Y'),
(15, 'Bilangan Biner', '', '1654843841', 'pdf', '399442', '../pelengkap/file/PERANGKAT_1654843841.pdf', '2022-06-10', 6, 'Y'),
(16, 'Spesifikasi Perangkat keras', '', '1654843905', 'pdf', '386718', '../pelengkap/file/PERANGKAT_1654843905.pdf', '2022-06-10', 6, 'Y'),
(17, 'Interaksi antar perangkat', '', '1654843949', 'pdf', '511434', '../pelengkap/file/PERANGKAT_1654843949.pdf', '2022-06-10', 6, 'Y'),
(18, 'Perangkat Lunak', '', '1654843994', 'pdf', '539334', '../pelengkap/file/PERANGKAT_1654843994.pdf', '2022-06-10', 6, 'Y'),
(19, 'Perangkat Lunak', '', '1654844032', 'pdf', '557374', '../pelengkap/file/PERANGKAT_1654844032.pdf', '2022-06-10', 6, 'Y'),
(20, 'Perangkat Keras', '', '1654844054', 'pdf', '636429', '../pelengkap/file/PERANGKAT_1654844054.pdf', '2022-06-10', 6, 'Y'),
(21, 'Perangkat Keras', '', '1654844077', 'pdf', '584479', '../pelengkap/file/PERANGKAT_1654844077.pdf', '2022-06-10', 6, 'Y'),
(22, 'Perangkat Keras', '', '1654844102', 'pdf', '672679', '../pelengkap/file/PERANGKAT_1654844102.pdf', '2022-06-10', 6, 'Y'),
(23, 'Perangkat Keras', '', '1654844127', 'pdf', '553605', '../pelengkap/file/PERANGKAT_1654844127.pdf', '2022-06-10', 6, 'Y'),
(24, 'Perangkat Keras', '', '1654844155', 'pdf', '553121', '../pelengkap/file/PERANGKAT_1654844155.pdf', '2022-06-10', 6, 'Y'),
(25, 'Perangkat Keras', '', '1654844186', 'pdf', '670236', '../pelengkap/file/PERANGKAT_1654844186.pdf', '2022-06-10', 6, 'Y'),
(26, 'Perangkat Keras', '', '1654844240', 'pdf', '670236', '../pelengkap/file/PERANGKAT_1654844240.pdf', '2022-06-10', 6, 'Y'),
(27, 'Proteksi data dan file', '', '1654844439', 'pdf', '474299', '../pelengkap/file/PERANGKAT_1654844439.pdf', '2022-06-10', 7, 'Y'),
(28, 'Proteksi data dan file', '', '1654844475', 'pdf', '527133', '../pelengkap/file/PERANGKAT_1654844475.pdf', '2022-06-10', 7, 'Y'),
(29, 'Koneksi internet', '', '1654844516', 'pdf', '505652', '../pelengkap/file/PERANGKAT_1654844516.pdf', '2022-06-10', 7, 'Y'),
(30, 'Koneksi internet', '', '1654844545', 'pdf', '545345', '../pelengkap/file/PERANGKAT_1654844545.pdf', '2022-06-10', 7, 'Y'),
(31, 'Pengantar Jaringan', '', '1654844585', 'pdf', '449348', '../pelengkap/file/PERANGKAT_1654844585.pdf', '2022-06-10', 7, 'Y'),
(32, 'Aplikasi Perkantoran', '', '1654844679', 'pdf', '609739', '../pelengkap/file/PERANGKAT_1654844679.pdf', '2022-06-10', 8, 'Y'),
(33, 'Surel', '', '1654844701', 'pdf', '574921', '../pelengkap/file/PERANGKAT_1654844701.pdf', '2022-06-10', 8, 'Y'),
(34, 'Search engine', '', '1654844741', 'pdf', '562870', '../pelengkap/file/PERANGKAT_1654844741.pdf', '2022-06-10', 8, 'Y'),
(35, 'Folder dan File', '', '1654844777', 'pdf', '405933', '../pelengkap/file/PERANGKAT_1654844777.pdf', '2022-06-10', 8, 'Y'),
(36, 'Folder dan File', '', '1654844807', 'pdf', '502955', '../pelengkap/file/PERANGKAT_1654844807.pdf', '2022-06-10', 8, 'Y'),
(37, 'Folder dan File', '', '1654844826', 'pdf', '515892', '../pelengkap/file/PERANGKAT_1654844826.pdf', '2022-06-10', 8, 'Y'),
(38, 'antar muka pengguna', '', '1654844862', 'pdf', '522394', '../pelengkap/file/PERANGKAT_1654844862.pdf', '2022-06-10', 8, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_perangkat`
--

CREATE TABLE `tb_perangkat` (
  `id_perangkat` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `nama_file` varchar(120) NOT NULL,
  `tipe_file` varchar(20) NOT NULL,
  `ukuran_file` varchar(30) NOT NULL,
  `file` varchar(255) NOT NULL,
  `isi_perangkat` text NOT NULL,
  `id_jenisperangkat` int(11) NOT NULL,
  `tgl_entry` date NOT NULL,
  `publish` int(11) NOT NULL,
  `id_roleguru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_roleguru`
--

CREATE TABLE `tb_roleguru` (
  `id_roleguru` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_roleguru`
--

INSERT INTO `tb_roleguru` (`id_roleguru`, `id_guru`, `id_kelas`, `id_mapel`, `id_semester`, `id_jurusan`) VALUES
(6, 14, 7, 10, 3, 5),
(7, 14, 7, 10, 4, 5),
(8, 14, 7, 10, 5, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sekolah`
--

CREATE TABLE `tb_sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(120) NOT NULL,
  `kepsek` varchar(120) NOT NULL,
  `textlogo` varchar(10) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `copyright` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_sekolah`
--

INSERT INTO `tb_sekolah` (`id_sekolah`, `nama_sekolah`, `kepsek`, `textlogo`, `logo`, `copyright`) VALUES
(1, '', '', '', 'elearning.jpg', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `nama_siswa` varchar(120) NOT NULL,
  `jk` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL,
  `aktif` varchar(30) NOT NULL,
  `tingkat` varchar(20) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `confirm` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nama_siswa`, `jk`, `password`, `status`, `aktif`, `tingkat`, `foto`, `id_kelas`, `id_jurusan`, `confirm`) VALUES
(25, '123', 'siswa', 'L', '7a24156a1971d85acf2ae64d9dbdf5322566636f', 'Online', 'Y', '0', 'default.png', 7, 5, 'Yes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tugas`
--

CREATE TABLE `tb_tugas` (
  `id_tugas` int(11) NOT NULL,
  `id_jenistugas` int(11) NOT NULL,
  `judul_tugas` varchar(100) NOT NULL,
  `isi_tugas` text NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` int(30) NOT NULL,
  `jml_anggota` int(30) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tugas`
--

INSERT INTO `tb_tugas` (`id_tugas`, `id_jenistugas`, `judul_tugas`, `isi_tugas`, `tanggal`, `waktu`, `jml_anggota`, `id_guru`, `id_mapel`, `id_semester`) VALUES
(19, 1, 'Perangkat Keras', '<p>Ringkas</p>\r\n', '2022-06-27', 9, 0, 14, 10, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas_siswa`
--

CREATE TABLE `tugas_siswa` (
  `id_tgssiswa` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `subjek` varchar(120) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `kelompok` text NOT NULL,
  `nama_file` varchar(120) NOT NULL,
  `tipe_file` varchar(30) NOT NULL,
  `ukuran_file` varchar(30) NOT NULL,
  `file` varchar(255) NOT NULL,
  `tgl_upload` date NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tugas_siswa`
--

INSERT INTO `tugas_siswa` (`id_tgssiswa`, `id_tugas`, `subjek`, `id_siswa`, `kelompok`, `nama_file`, `tipe_file`, `ukuran_file`, `file`, `tgl_upload`, `ket`) VALUES
(6, 11, 'y', 24, '', '1654697064', 'docx', '112090', '../vendor/file/tugasTUGAS-INDIVIDU_1654697064.docx', '2022-06-08', ''),
(7, 18, 'y', 24, '', '1654861462', 'docx', '112090', '../vendor/file/tugasTUGAS-INDIVIDU_1654861462.docx', '2022-06-10', 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian`
--

CREATE TABLE `ujian` (
  `id_ujian` int(5) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `jml_soal` int(30) NOT NULL,
  `acak` varchar(100) NOT NULL,
  `tipe` int(1) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ujian`
--

INSERT INTO `ujian` (`id_ujian`, `judul`, `tanggal`, `waktu`, `jml_soal`, `acak`, `tipe`, `id_jenis`, `id_guru`, `id_mapel`, `id_semester`) VALUES
(23, 'Perangkat Keras', '2022-06-27', '00:12:00', 1, 'tidak', 0, 2, 14, 10, 3),
(20, 'PERANGKAT KERAS', '2022-06-10', '00:10:00', 1, 'acak', 0, 2, 11, 10, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian_essay`
--

CREATE TABLE `ujian_essay` (
  `id_ujianessay` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jml_soal` int(30) NOT NULL,
  `soal_essay` text NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `analisis`
--
ALTER TABLE `analisis`
  ADD PRIMARY KEY (`id_analisis`);

--
-- Indeks untuk tabel `kelas_tugas`
--
ALTER TABLE `kelas_tugas`
  ADD PRIMARY KEY (`id_klstugas`);

--
-- Indeks untuk tabel `kelas_ujian`
--
ALTER TABLE `kelas_ujian`
  ADD PRIMARY KEY (`id_klsujian`);

--
-- Indeks untuk tabel `kelas_ujianessay`
--
ALTER TABLE `kelas_ujianessay`
  ADD PRIMARY KEY (`id_klsessay`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `tb_jenistugas`
--
ALTER TABLE `tb_jenistugas`
  ADD PRIMARY KEY (`id_jenistugas`);

--
-- Indeks untuk tabel `tb_jenisujian`
--
ALTER TABLE `tb_jenisujian`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `tb_master_jurusan`
--
ALTER TABLE `tb_master_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tb_master_kelas`
--
ALTER TABLE `tb_master_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_master_mapel`
--
ALTER TABLE `tb_master_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `tb_master_semester`
--
ALTER TABLE `tb_master_semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indeks untuk tabel `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `id_roleguru` (`id_roleguru`);

--
-- Indeks untuk tabel `tb_perangkat`
--
ALTER TABLE `tb_perangkat`
  ADD PRIMARY KEY (`id_perangkat`),
  ADD KEY `id_roleguru` (`id_roleguru`);

--
-- Indeks untuk tabel `tb_roleguru`
--
ALTER TABLE `tb_roleguru`
  ADD PRIMARY KEY (`id_roleguru`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_semester` (`id_semester`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `tb_tugas`
--
ALTER TABLE `tb_tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indeks untuk tabel `tugas_siswa`
--
ALTER TABLE `tugas_siswa`
  ADD PRIMARY KEY (`id_tgssiswa`);

--
-- Indeks untuk tabel `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id_ujian`);

--
-- Indeks untuk tabel `ujian_essay`
--
ALTER TABLE `ujian_essay`
  ADD PRIMARY KEY (`id_ujianessay`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `analisis`
--
ALTER TABLE `analisis`
  MODIFY `id_analisis` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kelas_tugas`
--
ALTER TABLE `kelas_tugas`
  MODIFY `id_klstugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `kelas_ujian`
--
ALTER TABLE `kelas_ujian`
  MODIFY `id_klsujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `kelas_ujianessay`
--
ALTER TABLE `kelas_ujianessay`
  MODIFY `id_klsessay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_jenistugas`
--
ALTER TABLE `tb_jenistugas`
  MODIFY `id_jenistugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_jenisujian`
--
ALTER TABLE `tb_jenisujian`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_master_jurusan`
--
ALTER TABLE `tb_master_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_master_kelas`
--
ALTER TABLE `tb_master_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_master_mapel`
--
ALTER TABLE `tb_master_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_master_semester`
--
ALTER TABLE `tb_master_semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_materi`
--
ALTER TABLE `tb_materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `tb_perangkat`
--
ALTER TABLE `tb_perangkat`
  MODIFY `id_perangkat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_roleguru`
--
ALTER TABLE `tb_roleguru`
  MODIFY `id_roleguru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tb_tugas`
--
ALTER TABLE `tb_tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tugas_siswa`
--
ALTER TABLE `tugas_siswa`
  MODIFY `id_tgssiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id_ujian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `ujian_essay`
--
ALTER TABLE `ujian_essay`
  MODIFY `id_ujianessay` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD CONSTRAINT `tb_materi_ibfk_1` FOREIGN KEY (`id_roleguru`) REFERENCES `tb_roleguru` (`id_roleguru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_perangkat`
--
ALTER TABLE `tb_perangkat`
  ADD CONSTRAINT `tb_perangkat_ibfk_1` FOREIGN KEY (`id_roleguru`) REFERENCES `tb_roleguru` (`id_roleguru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_roleguru`
--
ALTER TABLE `tb_roleguru`
  ADD CONSTRAINT `tb_roleguru_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `tb_guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_roleguru_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `tb_master_jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_roleguru_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `tb_master_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_roleguru_ibfk_4` FOREIGN KEY (`id_mapel`) REFERENCES `tb_master_mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_roleguru_ibfk_5` FOREIGN KEY (`id_semester`) REFERENCES `tb_master_semester` (`id_semester`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
