-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Des 2024 pada 08.53
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bibliografi`
--

CREATE TABLE `bibliografi` (
  `id` int(11) NOT NULL,
  `judul` text DEFAULT NULL,
  `pernyataan` text DEFAULT NULL,
  `edisi` text DEFAULT NULL,
  `spesifik` text DEFAULT NULL,
  `id_kode_eksemplar` int(11) DEFAULT NULL,
  `total_item` int(11) DEFAULT NULL,
  `id_tipe_koleksi` int(11) DEFAULT NULL,
  `id_gmd` int(11) DEFAULT NULL,
  `id_tipe_isi` int(11) DEFAULT NULL,
  `id_tipe_media` int(11) DEFAULT NULL,
  `id__tipe_pembawa` int(11) DEFAULT NULL,
  `id_kala_terbit` int(11) DEFAULT NULL,
  `isbn` varchar(50) DEFAULT NULL,
  `tahun_terbit` int(11) DEFAULT NULL,
  `id_tempat` int(11) DEFAULT NULL,
  `deskripsi_fisik` varchar(50) DEFAULT NULL,
  `judul_seri` int(11) DEFAULT NULL,
  `klasifikasi` varchar(50) DEFAULT NULL,
  `no_panggil` varchar(50) DEFAULT NULL,
  `id_bahasa` int(11) DEFAULT NULL,
  `abstrak` int(11) DEFAULT NULL,
  `cover` varchar(200) DEFAULT NULL,
  `berkas` varchar(50) DEFAULT NULL,
  `opac_hide` int(11) DEFAULT NULL,
  `promoted` int(11) DEFAULT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bibliografi`
--

INSERT INTO `bibliografi` (`id`, `judul`, `pernyataan`, `edisi`, `spesifik`, `id_kode_eksemplar`, `total_item`, `id_tipe_koleksi`, `id_gmd`, `id_tipe_isi`, `id_tipe_media`, `id__tipe_pembawa`, `id_kala_terbit`, `isbn`, `tahun_terbit`, `id_tempat`, `deskripsi_fisik`, `judul_seri`, `klasifikasi`, `no_panggil`, `id_bahasa`, `abstrak`, `cover`, `berkas`, `opac_hide`, `promoted`, `input_date`, `last_update`) VALUES
(1, 'Ilmu Pengerahuan Alam : Kelas IX Semester 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '978-602-282-319-3', 2018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'IPA.png', NULL, NULL, NULL, '2023-10-28', '2023-10-28'),
(2, 'Seri Kisah Nabi AS :  Memerangi Kecurangan Dalam Timbangan (Nabi Syu\'\'aib AS)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-29'),
(3, 'Ya Allah Tunjukilah Kami Jalan Yang Lurus : Kita Mengambil Hikmah Dibalik Segala Ujian Dan Cobaan', 'sdad', 'sad', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `biblio_berkas`
--

CREATE TABLE `biblio_berkas` (
  `id` int(11) NOT NULL,
  `id_biblio` int(11) DEFAULT 0,
  `tipe_akses` enum('Y','N') DEFAULT NULL,
  `limit` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `biblio_label`
--

CREATE TABLE `biblio_label` (
  `id` int(11) NOT NULL,
  `id_biblio` int(11) DEFAULT NULL,
  `id_label` int(11) DEFAULT NULL,
  `url` int(11) DEFAULT NULL,
  `keterangan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `biblio_pengarang`
--

CREATE TABLE `biblio_pengarang` (
  `id` int(11) NOT NULL,
  `id_biblio` int(11) DEFAULT NULL,
  `id_pengarang` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `biblio_pengarang`
--

INSERT INTO `biblio_pengarang` (`id`, `id_biblio`, `id_pengarang`, `level`) VALUES
(1, 1, 1, 2),
(2, 1, 3, 1),
(3, 2, 4, 1),
(4, 3, 5, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `biblio_relasi`
--

CREATE TABLE `biblio_relasi` (
  `id` int(11) DEFAULT NULL,
  `id_biblio` int(11) DEFAULT NULL,
  `id_biblio_relasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `biblio_subyek`
--

CREATE TABLE `biblio_subyek` (
  `id` int(11) NOT NULL,
  `id_biblio` int(11) DEFAULT NULL,
  `id_subyek` int(11) DEFAULT NULL,
  `tipe` int(11) DEFAULT NULL,
  `level` enum('1','2') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `isbn` varchar(50) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `cover` varchar(100) DEFAULT NULL,
  `id_kategori` int(3) DEFAULT NULL,
  `id_penerbit` int(3) DEFAULT NULL,
  `id_pengarang` int(3) DEFAULT NULL,
  `no_rak` int(2) DEFAULT NULL,
  `thn_terbit` year(4) DEFAULT NULL,
  `stok` int(3) DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `isbn`, `judul`, `cover`, `id_kategori`, `id_penerbit`, `id_pengarang`, `no_rak`, `thn_terbit`, `stok`, `ket`) VALUES
(1, '313789173', 'Algoritma dan Pemrograman 1', NULL, 6, 1, 7, 6, 2007, 5, '2'),
(2, '94729742', 'Pemrograman Web ', NULL, 6, 5, 8, 6, 2009, 7, ''),
(3, '27492749', 'Pemrograman Java', NULL, 6, 6, 9, 6, 2013, 6, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `id_biblio` int(11) DEFAULT NULL,
  `kode_eksemplar` varchar(50) DEFAULT NULL,
  `kode_invetaris` varchar(50) DEFAULT NULL,
  `id_lokasi` int(11) DEFAULT NULL,
  `id_rak` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `item`
--

INSERT INTO `item` (`id`, `id_biblio`, `kode_eksemplar`, `kode_invetaris`, `id_lokasi`, `id_rak`) VALUES
(1, 1, NULL, NULL, NULL, NULL),
(2, 1, NULL, NULL, NULL, NULL),
(3, 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pengarang`
--

CREATE TABLE `jenis_pengarang` (
  `id` int(11) NOT NULL,
  `level` varchar(50) NOT NULL DEFAULT '0',
  `keterangan` int(11) NOT NULL DEFAULT 0,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_pengarang`
--

INSERT INTO `jenis_pengarang` (`id`, `level`, `keterangan`, `last_update`) VALUES
(1, 'Pengarang Utama', 0, '0000-00-00'),
(2, 'Pengarang Tambahan', 0, '0000-00-00'),
(3, 'Penyunting', 0, '0000-00-00'),
(4, 'Penerjemah', 0, '0000-00-00'),
(5, 'Direktur', 0, '0000-00-00'),
(6, 'Produser', 0, '0000-00-00'),
(7, 'Pengubah', 0, '0000-00-00'),
(8, 'Ilustrator', 0, '0000-00-00'),
(9, 'Pencipta', 0, '0000-00-00'),
(10, 'Kontributor', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kode_eksemplar`
--

CREATE TABLE `kode_eksemplar` (
  `id` int(11) NOT NULL,
  `prefiks` varchar(50) DEFAULT NULL,
  `sufiks` varchar(50) DEFAULT NULL,
  `panjang` int(11) DEFAULT NULL,
  `pola` varchar(70) DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kode_eksemplar`
--

INSERT INTO `kode_eksemplar` (`id`, `prefiks`, `sufiks`, `panjang`, `pola`, `last_update`) VALUES
(1, 'P', 'S', 4, 'P0000S', '2023-10-24'),
(3, 'P', 'SS', 4, 'P0000SS', '2023-10-24'),
(5, 'SD', 'Alazca', 3, 'SD000Alazca', '2023-10-26'),
(6, 'SMP', 'Alazca', 3, 'SMP000Alazca', '2023-10-26'),
(7, 'TK', 'Alazca', 4, 'TK0000Alazca', '2023-11-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `label`
--

CREATE TABLE `label` (
  `id` int(11) NOT NULL,
  `nama_label` varchar(50) NOT NULL DEFAULT '0',
  `deskripsi_label` text NOT NULL,
  `gambar` varchar(200) NOT NULL DEFAULT '',
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `label`
--

INSERT INTO `label` (`id`, `nama_label`, `deskripsi_label`, `gambar`, `last_update`) VALUES
(1, 'label-new', 'New Titles', 'label-new1.png', '2023-10-20'),
(2, 'label-favorite', 'Favorite Title', 'label-favorite.png', '2023-10-20'),
(8, 'label-multimedia', 'Multimedia', 'label-multimedia1.png', '2023-10-20'),
(9, 'SD', 'SD', 'sd.png', '2023-10-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` varchar(8) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_hp` char(13) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_agama`
--

CREATE TABLE `tb_agama` (
  `id_agama` int(2) NOT NULL,
  `agama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_agama`
--

INSERT INTO `tb_agama` (`id_agama`, `agama`) VALUES
(2, 'Islam'),
(3, 'Konghucu'),
(4, 'Budha'),
(5, 'Katholik'),
(6, 'Hindu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_agen`
--

CREATE TABLE `tb_agen` (
  `id` int(11) NOT NULL,
  `nama_penyuplai` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kontak` varchar(50) DEFAULT NULL,
  `nomer_telepon` varchar(50) DEFAULT NULL,
  `nomer_faks` varchar(50) DEFAULT NULL,
  `nomer_akun` varchar(50) DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_agen`
--

INSERT INTO `tb_agen` (`id`, `nama_penyuplai`, `alamat`, `kontak`, `nomer_telepon`, `nomer_faks`, `nomer_akun`, `last_update`) VALUES
(3, 'ss', 'dsadsa', 'ddad', 'dadeasa', 'dsads', '-', '2023-09-12'),
(5, 'sdaas', 'fadsa', 'fas', 'aa', 'ssa', '-s', '2023-09-12'),
(6, 'Muhammad Ichsan', 'Ulee Kareng', '085359883347', '085359883347', '87228292a', '92838', '2023-09-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_kelas` int(2) NOT NULL,
  `id_agama` int(2) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nama`, `id_kelas`, `id_agama`, `jenis_kelamin`, `hp`, `alamat`, `ket`) VALUES
('ANGG000001', 'Alek Sander', 24, 2, 'L', '085248931126', 'Jl. Perumahan Indralaya Lestari', 'Aktif'),
('ANGG000002', 'Mifta Hurohman', 25, 2, 'P', '083516351', 'Indralaya', 'Aktif'),
('ANGG000003', 'Rahma Destriani', 26, 2, 'P', '2974927492', 'nsfshf', ''),
('ANGG000004', 'Aditya Nobert', 27, 2, 'L', '085248931126', 'Indralaya', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bahasa`
--

CREATE TABLE `tb_bahasa` (
  `id` int(11) NOT NULL,
  `kode_bahasa` varchar(50) DEFAULT NULL,
  `nama_bahasa` varchar(50) DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_bahasa`
--

INSERT INTO `tb_bahasa` (`id`, `kode_bahasa`, `nama_bahasa`, `last_update`) VALUES
(1, 'en', 'Bahasa Inggris', '2023-10-17'),
(2, 'id', 'Bahasa Indonesia', '2023-10-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_denda`
--

CREATE TABLE `tb_denda` (
  `id_denda` int(6) NOT NULL,
  `denda` int(6) NOT NULL,
  `status` enum('A','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_denda`
--

INSERT INTO `tb_denda` (`id_denda`, `denda`, `status`) VALUES
(6, 500, 'A'),
(7, 1000, 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_buku`
--

CREATE TABLE `tb_detail_buku` (
  `id_detail_buku` int(11) NOT NULL,
  `id_buku` char(15) NOT NULL,
  `no_buku` int(4) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_buku`
--

INSERT INTO `tb_detail_buku` (`id_detail_buku`, `id_buku`, `no_buku`, `status`) VALUES
(92, '1', 0, '1'),
(93, '1', 1, '1'),
(94, '1', 2, '1'),
(95, '1', 3, '1'),
(96, '1', 4, '1'),
(97, '2', 0, '1'),
(98, '2', 1, '1'),
(99, '2', 2, '0'),
(100, '2', 3, '1'),
(101, '2', 4, '1'),
(102, '2', 5, '1'),
(103, '2', 6, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_pinjam`
--

CREATE TABLE `tb_detail_pinjam` (
  `id_detail_pinjam` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `id_buku` char(15) NOT NULL,
  `no_buku` int(4) NOT NULL,
  `flag` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_pinjam`
--

INSERT INTO `tb_detail_pinjam` (`id_detail_pinjam`, `id_pinjam`, `id_buku`, `no_buku`, `flag`) VALUES
(96, 89, '1', 4, 1),
(99, 88, '2', 2, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gmd`
--

CREATE TABLE `tb_gmd` (
  `id` int(11) NOT NULL,
  `kode_gmd` varchar(50) NOT NULL,
  `nama_gmd` varchar(50) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_gmd`
--

INSERT INTO `tb_gmd` (`id`, `kode_gmd`, `nama_gmd`, `icon`, `input_date`, `last_update`) VALUES
(1, 'TE', 'Textsk', NULL, '2019-07-12', '2023-08-04'),
(2, 'AR', 'Art Originals', NULL, '2019-07-12', '2023-08-04'),
(3, 'CH', 'Chart', NULL, '2019-07-12', '2023-08-08'),
(5, 'DI', 'Diorama', NULL, '2019-07-12', '2019-07-12'),
(6, 'FI', 'Filmstrip', NULL, '2019-07-12', '2019-07-12'),
(7, 'FL', 'Flash Card', NULL, '2019-07-12', '2019-07-12'),
(8, 'GA', 'Game', NULL, '2019-07-12', '2019-07-12'),
(11, 'MA', 'Map', NULL, '2019-07-12', '2019-07-12'),
(15, 'MP', 'Motion Picture', NULL, '2019-07-12', '2023-08-10'),
(16, 'MS', 'Microscope Slide', NULL, '2019-07-12', '2019-07-12'),
(17, 'MU', 'Music', NULL, '2019-07-12', '2019-07-12'),
(18, 'PI', 'Picture', NULL, '2019-07-12', '2019-07-12'),
(19, 'RE', 'Realiad', NULL, '2019-07-12', '2023-08-01'),
(20, 'SL', 'Slide', NULL, '2019-07-12', '2019-07-12'),
(21, 'SO', 'Sound Recording', NULL, '2019-07-12', '2019-07-12'),
(22, 'TD', 'Technical Drawing', NULL, '2019-07-12', '2019-07-12'),
(23, 'TR', 'Transparency', NULL, '2019-07-12', '2019-07-12'),
(24, 'VI', 'Video Recording', NULL, '2019-07-12', '2019-07-12'),
(25, 'EQ', 'Equipment', NULL, '2019-07-12', '2019-07-12'),
(26, 'CF', 'Computer File', NULL, '2019-07-12', '2019-07-12'),
(27, 'CA', 'Cartographic Material', NULL, '2019-07-12', '2019-07-12'),
(28, 'CD', 'CD-ROM', NULL, '2019-07-12', '2019-07-12'),
(29, 'MV', 'Multimedia', NULL, '2019-07-12', '2019-07-12'),
(30, 'ER', 'Electronic Resource', NULL, '2019-07-12', '2019-07-12'),
(44, 'isan', 'ganteng sekeles', NULL, '2023-08-08', '2023-08-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kala_terbit`
--

CREATE TABLE `tb_kala_terbit` (
  `id` int(11) NOT NULL,
  `kala_terbit` varchar(50) DEFAULT NULL,
  `id_bahasa` int(11) DEFAULT NULL,
  `selang_waktu` varchar(50) DEFAULT NULL,
  `satuan_waktu` varchar(50) DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kala_terbit`
--

INSERT INTO `tb_kala_terbit` (`id`, `kala_terbit`, `id_bahasa`, `selang_waktu`, `satuan_waktu`, `last_update`) VALUES
(1, 'Weekly', 1, '1', 'week', '2009-05-23'),
(2, 'Bi-weekly', 1, '2', 'week', '2009-05-23'),
(3, 'Fourth-Nightly', 1, '14', 'day', '2009-05-23'),
(4, 'Monthly', 1, '1', 'month', '2009-05-23'),
(5, 'Bi-Monthly', 1, '2', 'month', '2009-05-23'),
(6, 'Quarterly', 1, '3', 'month', '2009-05-23'),
(7, '3 Times a Year', 1, '4', 'month', '2009-05-23'),
(8, 'Annualy', 1, '1', 'year', '2009-05-23'),
(10, 'Harian', 2, '12', 'Hari', '2023-10-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(3) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`) VALUES
(5, 'Matematika'),
(6, 'Pemrograman'),
(7, 'Multimedia'),
(8, 'B.Inggris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(2) NOT NULL,
  `kelas` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`) VALUES
(24, '09031181823128'),
(25, '09031181823124'),
(26, '09031181823126'),
(27, '09031181823129');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kembali`
--

CREATE TABLE `tb_kembali` (
  `id_kembali` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `tgl_dikembalikan` date NOT NULL,
  `terlambat` int(2) NOT NULL,
  `id_denda` int(6) NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kembali`
--

INSERT INTO `tb_kembali` (`id_kembali`, `id_pinjam`, `tgl_dikembalikan`, `terlambat`, `id_denda`, `denda`) VALUES
(199, 90, '2020-04-09', 0, 6, 0),
(200, 89, '2020-04-09', 0, 6, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `username` varchar(15) NOT NULL,
  `password` varchar(75) NOT NULL,
  `stts` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`username`, `password`, `stts`) VALUES
('131239', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'petugas'),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id` int(11) NOT NULL,
  `kode_lokasi` varchar(50) NOT NULL DEFAULT '0',
  `nama_lokasi` varchar(50) NOT NULL DEFAULT '0',
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id`, `kode_lokasi`, `nama_lokasi`, `last_update`) VALUES
(1, 'SLss', 'SD Library', '2023-11-27'),
(4, 'SML', 'SMP Library', '2023-10-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penerbit`
--

CREATE TABLE `tb_penerbit` (
  `id` int(3) NOT NULL,
  `nama_penerbit` varchar(50) NOT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penerbit`
--

INSERT INTO `tb_penerbit` (`id`, `nama_penerbit`, `input_date`, `last_update`) VALUES
(4, 'Andi', '2023-07-06', '2023-09-07'),
(5, 'Gramedia', '2023-06-01', '2023-09-07'),
(13, 'dsadasw', '2023-09-06', '2023-09-07'),
(16, 'Zikra book', '2023-09-07', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengarang`
--

CREATE TABLE `tb_pengarang` (
  `id` int(3) NOT NULL,
  `nama_pengarang` varchar(50) NOT NULL,
  `tahun_lahir` year(4) NOT NULL,
  `jenis_kepengarangan` enum('1','2','3') DEFAULT NULL,
  `daftar_terkendali` varchar(50) DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengarang`
--

INSERT INTO `tb_pengarang` (`id`, `nama_pengarang`, `tahun_lahir`, `jenis_kepengarangan`, `daftar_terkendali`, `last_update`) VALUES
(1, 'Susanto Sunaryo', 1980, '1', '', '2023-10-26'),
(3, 'Rinaldi Munir', 1975, '1', '', '2023-10-26'),
(4, 'Alek Sander', 0000, '1', NULL, NULL),
(5, 'Trional Novanza', 0000, '1', NULL, NULL),
(6, 'M. Maftuh Ihsan', 0000, '1', NULL, NULL),
(7, 'Dihan', 1988, '1', 'iu', '2023-10-04'),
(8, 'Ari Juna', 0000, '1', NULL, NULL),
(9, 'ichsan', 1995, '2', '', '2023-10-04'),
(11, 'ssasad', 2023, '2', '', '2023-10-04'),
(12, 'ytyt', 2021, '1', '', '2023-10-03'),
(13, 'muhammad ichsa', 1999, '3', 'iu', '2023-10-03'),
(23, 'Muhammad Uwais Al-Fariz', 1998, '1', 'UAIS', '2023-11-07'),
(26, '', 0000, '1', '', '2024-04-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` char(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `img` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_agama` int(2) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama`, `img`, `jenis_kelamin`, `alamat`, `password`, `id_agama`, `hp`, `ket`) VALUES
('131239', 'ichsan', '', 'L', 'ulee kareng', 'petugas', 2, '085359883347', ''),
('admin', 'Alek Sander', '91Y2DL8KUIEG6AOV4MNZ5PRX3J7FQBSCW0TH.jpg', 'L', 'Indralaya', 'admin', 2, '05324428242428', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pinjam`
--

CREATE TABLE `tb_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `id_anggota` varchar(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `total_buku` int(4) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`id_pinjam`, `tgl_pinjam`, `id_anggota`, `tgl_kembali`, `total_buku`, `status`) VALUES
(88, '2020-04-07', 'ANGG000003', '2020-04-09', 0, 0),
(89, '2020-04-07', 'ANGG000002', '2020-04-10', 1, 1),
(90, '2020-04-07', 'ANGG000003', '2020-04-10', 1, 1),
(91, '2020-04-07', 'ANGG000004', '2020-04-11', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_provinsi`
--

CREATE TABLE `tb_provinsi` (
  `id_provinsi` int(2) NOT NULL,
  `nama_provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_provinsi`
--

INSERT INTO `tb_provinsi` (`id_provinsi`, `nama_provinsi`, `kota`) VALUES
(1, 'Sumatera Selatan', 'Palembang'),
(2, 'D.I.Y Yogyakarta', 'Yogya'),
(4, 'Jambi', 'Jambi Kota'),
(6, 'Pekan Baru', 'Riau'),
(7, 'Jakarta', 'Jakarta'),
(8, 'Jawa Barat', 'Bandung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rak`
--

CREATE TABLE `tb_rak` (
  `id` int(11) NOT NULL,
  `kode_rak` varchar(50) DEFAULT NULL,
  `nama_rak` varchar(50) DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rak`
--

INSERT INTO `tb_rak` (`id`, `kode_rak`, `nama_rak`, `last_update`) VALUES
(1, 'AA.1', 'Rak Buku Sekolah', '2023-11-27'),
(2, 'AA.2', 'Rak Buku Cerita', '2023-11-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rujukan_silang`
--

CREATE TABLE `tb_rujukan_silang` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL DEFAULT '0',
  `penjelasan` varchar(50) NOT NULL DEFAULT '0',
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rujukan_silang`
--

INSERT INTO `tb_rujukan_silang` (`id`, `kode`, `penjelasan`, `last_update`) VALUES
(1, 'U', 'Use', '2023-10-13'),
(2, 'UF', 'Use For', '2023-10-13'),
(3, 'BT', 'Broader Terms', '2023-10-13'),
(4, 'NT', 'Narrower Term', '0000-00-00'),
(5, 'RT', 'Related Term', '0000-00-00'),
(6, 'SA', 'See Also', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status_eksemplar`
--

CREATE TABLE `tb_status_eksemplar` (
  `id` int(11) NOT NULL,
  `kode_status` varchar(50) NOT NULL DEFAULT '0',
  `nama_status` varchar(50) NOT NULL DEFAULT '0',
  `aturan` enum('1','2') NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_status_eksemplar`
--

INSERT INTO `tb_status_eksemplar` (`id`, `kode_status`, `nama_status`, `aturan`, `last_update`) VALUES
(1, 'R', 'Repair', '1', '2019-07-12'),
(2, 'NL', 'No Loan', '1', '2019-07-12'),
(3, 'MIS', 'Missing', '2', '2023-10-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_subyek`
--

CREATE TABLE `tb_subyek` (
  `id` int(11) NOT NULL,
  `subyek` varchar(50) DEFAULT NULL,
  `kode` varchar(50) DEFAULT NULL,
  `tipe_subyek` int(11) DEFAULT NULL,
  `daftar_terkendali` int(11) DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_subyek`
--

INSERT INTO `tb_subyek` (`id`, `subyek`, `kode`, `tipe_subyek`, `daftar_terkendali`, `last_update`) VALUES
(2, 'Programming', '1', 2, 0, '2023-10-13'),
(3, 'Website', '1', 1, 0, '2023-10-13'),
(4, 'Operating System', '1', 1, NULL, '2007-11-29'),
(5, 'Linux', '1', 1, NULL, '2007-11-29'),
(6, 'Computers', '1', 1, 0, '2023-10-13'),
(7, 'Database', '1', 1, NULL, '2007-11-29'),
(8, 'RDBMS', '1', 3, 0, '2023-10-10'),
(9, 'Open Source', '1', 5, 0, '2023-10-10'),
(10, 'Project', '1', 1, NULL, '2007-11-29'),
(11, 'Design', '1', 1, NULL, '2007-11-29'),
(12, 'Information', '1', 1, NULL, '2007-11-29'),
(13, 'Organization', '1', 1, NULL, '2007-11-29'),
(14, 'Metadata', '1', 1, NULL, '2007-11-29'),
(15, 'Library', '1', 1, NULL, '2007-11-29'),
(16, 'Corruption', '1', 1, NULL, '2007-11-29'),
(17, 'Development', '1', 1, NULL, '2007-11-29'),
(18, 'Poverty', '1', 4, NULL, '2007-11-29'),
(19, 'matematika', '1', 1, NULL, '2019-07-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tempat`
--

CREATE TABLE `tb_tempat` (
  `id` int(11) NOT NULL,
  `nama_tempat` varchar(50) NOT NULL DEFAULT '0',
  `last_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tempat`
--

INSERT INTO `tb_tempat` (`id`, `nama_tempat`, `last_update`) VALUES
(1, 'Hoboken, NJ', '2007-11-29'),
(2, 'Sebastopol, CA', '2007-11-29'),
(3, 'Indianapolis', '2007-11-29'),
(4, 'Upper Saddle River, NJ', '2007-11-29'),
(5, 'Westport, Conn.', '2007-11-29'),
(6, 'Cambridge, Mass', '2007-11-29'),
(7, 'London', '2007-11-29'),
(8, 'New York', '2007-11-29'),
(9, 'nty', '2019-07-12'),
(10, 'Yogyakarta', '2019-08-21'),
(11, 'Bandung', '2019-08-31'),
(12, 'Malasyia', '2019-09-04'),
(13, 'China', '2019-09-16'),
(14, 'Jakarta', '2019-09-17'),
(15, 'Jawa Timur', '2019-09-17'),
(16, 'solo', '2019-09-17'),
(17, 'Aceh', '2019-09-17'),
(18, 'jogjakarta', '2019-09-18'),
(19, 'Selangor', '2019-09-18'),
(20, 'Bayuwangi', '2019-09-18'),
(21, 'Kuala Lumpur', '2019-09-18'),
(22, 'semarang', '2019-09-18'),
(23, 'Kelantan', '2019-09-18'),
(24, 'Surabaya', '2019-09-18'),
(25, 'sutkarta', '2023-10-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tipe_anggota`
--

CREATE TABLE `tb_tipe_anggota` (
  `id` int(11) NOT NULL,
  `nama_tipe` varchar(50) NOT NULL DEFAULT '0',
  `jumlah_pinjaman` int(11) DEFAULT NULL,
  `lama_peminjaman` int(11) DEFAULT NULL,
  `reservasi` enum('Y','N') DEFAULT NULL,
  `jumlah_reservasi` int(11) DEFAULT NULL,
  `masa_keanggotaan` int(11) DEFAULT NULL,
  `kali_perpanjangan` int(11) DEFAULT NULL,
  `denda` int(11) DEFAULT NULL,
  `toleransi_lambat` int(11) DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tipe_anggota`
--

INSERT INTO `tb_tipe_anggota` (`id`, `nama_tipe`, `jumlah_pinjaman`, `lama_peminjaman`, `reservasi`, `jumlah_reservasi`, `masa_keanggotaan`, `kali_perpanjangan`, `denda`, `toleransi_lambat`, `last_update`) VALUES
(1, 'Umum', 2, 7, 'Y', 2, 365, 1, 1000, 2, '2019-07-12'),
(2, 'Siswa', 1, 5, 'Y', 1, 1080, 1, 1000, 2, '2019-07-12'),
(3, 'Guru', 2, 10, 'Y', 2, 1080, 2, 1000, 2, '2019-07-12'),
(4, 'alumni', 1, 9, 'Y', 1, 360, 1, 2, 2, '2023-10-14'),
(12, 'Elit', 2, 0, 'Y', 0, 0, 1, 50, 1, '2023-10-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tipe_isi`
--

CREATE TABLE `tb_tipe_isi` (
  `id` int(11) NOT NULL,
  `kode_tipe` varchar(50) NOT NULL,
  `kode_marc` varchar(50) NOT NULL,
  `nama_tipe` varchar(50) NOT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tipe_isi`
--

INSERT INTO `tb_tipe_isi` (`id`, `kode_tipe`, `kode_marc`, `nama_tipe`, `input_date`, `last_update`) VALUES
(1, 'crd', 'a', 'cartographic dataset', '2023-08-30', '2023-08-10'),
(2, 'mama', 'm', 'mamamaa', '2023-08-09', '2023-08-10'),
(3, 'mamas', 'c', 'mamama', '2023-08-09', '2023-08-10'),
(5, 'mamass', 'd', 'mamamasa', '2023-08-09', '2023-08-10'),
(8, 'crdt', 'c', 'cartographic datasets', '2023-08-11', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tipe_koleksi`
--

CREATE TABLE `tb_tipe_koleksi` (
  `id` int(11) NOT NULL,
  `tipe_koleksi` text NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tipe_koleksi`
--

INSERT INTO `tb_tipe_koleksi` (`id`, `tipe_koleksi`, `last_update`) VALUES
(1, 'Reference', '2007-11-29'),
(2, 'Textbook', '2007-11-29'),
(3, 'Fiction', '2007-11-29'),
(4, 'Pengayaan', '2019-09-07'),
(5, 'Non Fiksi', '2023-10-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tipe_media`
--

CREATE TABLE `tb_tipe_media` (
  `id` int(11) NOT NULL,
  `kode_media` varchar(50) NOT NULL,
  `kode_marc` varchar(50) NOT NULL,
  `nama_media` varchar(50) NOT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tipe_media`
--

INSERT INTO `tb_tipe_media` (`id`, `kode_media`, `kode_marc`, `nama_media`, `input_date`, `last_update`) VALUES
(1, 's', 's', 'audio', '2023-10-07', '2023-10-07'),
(2, 'c', 'c', 'computer', '2023-10-07', '0000-00-00'),
(4, 'p', 'p', 'microscopic', '2023-10-07', '0000-00-00'),
(6, 'e', 'e', 'stereographic', '2023-10-07', '2023-10-15'),
(7, 'n', 't', 'unmediated', '2023-10-07', '0000-00-00'),
(8, 'v', 'v', 'video', '2023-10-07', '0000-00-00'),
(9, 'x', 'z', 'other', '2023-10-07', '0000-00-00'),
(10, 'z', 'z', 'unspecified', '2023-10-07', '0000-00-00'),
(11, 'ab', 'ab', 'abang', '2023-09-29', '0000-00-00'),
(12, 'ss', 's', 'audios', '2023-08-11', NULL),
(13, 'tr', 'rieoow', 'nssn', '2023-10-15', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tipe_pembawa`
--

CREATE TABLE `tb_tipe_pembawa` (
  `id` int(11) NOT NULL,
  `kode_tipe` varchar(50) NOT NULL,
  `kode_marc` varchar(50) NOT NULL,
  `nama_tipe` varchar(50) NOT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tb_tipe_pembawa`
--

INSERT INTO `tb_tipe_pembawa` (`id`, `kode_tipe`, `kode_marc`, `nama_tipe`, `input_date`, `last_update`) VALUES
(1, 's', 'a', 'cartographic dataset', '2023-08-30', '2023-08-10'),
(2, 'a', 'm', 'mamamaa', '2023-08-09', '2023-08-10'),
(3, 's', 'c', 'mamama', '2023-08-09', '2023-08-10'),
(5, 'a', 'd', 'mamamas', '2023-08-09', '2023-09-06'),
(8, 's', 'c', 'cartographic datasets', '2023-08-11', NULL),
(9, 'm', 'm', 'mksh ya', '2023-09-05', '2023-09-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `test`
--

CREATE TABLE `test` (
  `kode` varchar(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `mboh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `test`
--

INSERT INTO `test` (`kode`, `nama`, `mboh`) VALUES
('', 'ari', ''),
('Kode000001', 'ari2', ''),
('Kode000002', 'ari2', ''),
('Kode000003', 'Ariandi AS', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bibliografi`
--
ALTER TABLE `bibliografi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `biblio_berkas`
--
ALTER TABLE `biblio_berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `biblio_label`
--
ALTER TABLE `biblio_label`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `biblio_pengarang`
--
ALTER TABLE `biblio_pengarang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `biblio_subyek`
--
ALTER TABLE `biblio_subyek`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_pengarang`
--
ALTER TABLE `jenis_pengarang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kode_eksemplar`
--
ALTER TABLE `kode_eksemplar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `label`
--
ALTER TABLE `label`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_admin` (`id_admin`,`password`,`nama`,`alamat`,`no_hp`),
  ADD KEY `id_admin_2` (`id_admin`,`password`,`nama`,`alamat`,`no_hp`,`img`);

--
-- Indeks untuk tabel `tb_agama`
--
ALTER TABLE `tb_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indeks untuk tabel `tb_agen`
--
ALTER TABLE `tb_agen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `id_agama` (`id_agama`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `tb_bahasa`
--
ALTER TABLE `tb_bahasa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_denda`
--
ALTER TABLE `tb_denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indeks untuk tabel `tb_detail_buku`
--
ALTER TABLE `tb_detail_buku`
  ADD KEY `id_detail_buku` (`id_detail_buku`,`id_buku`,`no_buku`,`status`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `tb_detail_pinjam`
--
ALTER TABLE `tb_detail_pinjam`
  ADD PRIMARY KEY (`id_detail_pinjam`),
  ADD KEY `id_anggota` (`id_pinjam`),
  ADD KEY `id_detail_pinjam` (`id_detail_pinjam`,`id_pinjam`,`id_buku`,`no_buku`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `tb_gmd`
--
ALTER TABLE `tb_gmd`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kala_terbit`
--
ALTER TABLE `tb_kala_terbit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_kembali`
--
ALTER TABLE `tb_kembali`
  ADD PRIMARY KEY (`id_kembali`),
  ADD KEY `id_detail` (`id_pinjam`),
  ADD KEY `id_kembali` (`id_kembali`,`id_pinjam`,`tgl_dikembalikan`,`terlambat`,`id_denda`);

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`,`password`,`stts`);

--
-- Indeks untuk tabel `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pengarang`
--
ALTER TABLE `tb_pengarang`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_agama` (`id_agama`);

--
-- Indeks untuk tabel `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_detail` (`tgl_kembali`),
  ADD KEY `id_buku` (`id_anggota`),
  ADD KEY `id_pinjam` (`id_pinjam`,`tgl_pinjam`,`id_anggota`,`tgl_kembali`,`total_buku`);

--
-- Indeks untuk tabel `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indeks untuk tabel `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_rujukan_silang`
--
ALTER TABLE `tb_rujukan_silang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_status_eksemplar`
--
ALTER TABLE `tb_status_eksemplar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_subyek`
--
ALTER TABLE `tb_subyek`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_tempat`
--
ALTER TABLE `tb_tempat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_tipe_anggota`
--
ALTER TABLE `tb_tipe_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_tipe_isi`
--
ALTER TABLE `tb_tipe_isi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_tipe_koleksi`
--
ALTER TABLE `tb_tipe_koleksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_tipe_media`
--
ALTER TABLE `tb_tipe_media`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_tipe_pembawa`
--
ALTER TABLE `tb_tipe_pembawa`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bibliografi`
--
ALTER TABLE `bibliografi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `biblio_berkas`
--
ALTER TABLE `biblio_berkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `biblio_label`
--
ALTER TABLE `biblio_label`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `biblio_pengarang`
--
ALTER TABLE `biblio_pengarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `biblio_subyek`
--
ALTER TABLE `biblio_subyek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jenis_pengarang`
--
ALTER TABLE `jenis_pengarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kode_eksemplar`
--
ALTER TABLE `kode_eksemplar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `label`
--
ALTER TABLE `label`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_agama`
--
ALTER TABLE `tb_agama`
  MODIFY `id_agama` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_agen`
--
ALTER TABLE `tb_agen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_bahasa`
--
ALTER TABLE `tb_bahasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_denda`
--
ALTER TABLE `tb_denda`
  MODIFY `id_denda` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_buku`
--
ALTER TABLE `tb_detail_buku`
  MODIFY `id_detail_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_pinjam`
--
ALTER TABLE `tb_detail_pinjam`
  MODIFY `id_detail_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `tb_gmd`
--
ALTER TABLE `tb_gmd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `tb_kala_terbit`
--
ALTER TABLE `tb_kala_terbit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tb_kembali`
--
ALTER TABLE `tb_kembali`
  MODIFY `id_kembali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT untuk tabel `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_pengarang`
--
ALTER TABLE `tb_pengarang`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT untuk tabel `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  MODIFY `id_provinsi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_rak`
--
ALTER TABLE `tb_rak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_rujukan_silang`
--
ALTER TABLE `tb_rujukan_silang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_status_eksemplar`
--
ALTER TABLE `tb_status_eksemplar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_subyek`
--
ALTER TABLE `tb_subyek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_tempat`
--
ALTER TABLE `tb_tempat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tb_tipe_anggota`
--
ALTER TABLE `tb_tipe_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_tipe_isi`
--
ALTER TABLE `tb_tipe_isi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_tipe_koleksi`
--
ALTER TABLE `tb_tipe_koleksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_tipe_media`
--
ALTER TABLE `tb_tipe_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_tipe_pembawa`
--
ALTER TABLE `tb_tipe_pembawa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD CONSTRAINT `tb_anggota_ibfk_1` FOREIGN KEY (`id_agama`) REFERENCES `tb_agama` (`id_agama`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_detail_buku`
--
ALTER TABLE `tb_detail_buku`
  ADD CONSTRAINT `tb_detail_buku_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_detail_pinjam`
--
ALTER TABLE `tb_detail_pinjam`
  ADD CONSTRAINT `tb_detail_pinjam_ibfk_1` FOREIGN KEY (`id_pinjam`) REFERENCES `tb_pinjam` (`id_pinjam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_pinjam_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_kembali`
--
ALTER TABLE `tb_kembali`
  ADD CONSTRAINT `tb_kembali_ibfk_1` FOREIGN KEY (`id_pinjam`) REFERENCES `tb_pinjam` (`id_pinjam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD CONSTRAINT `tb_petugas_ibfk_1` FOREIGN KEY (`id_agama`) REFERENCES `tb_agama` (`id_agama`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD CONSTRAINT `tb_pinjam_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
