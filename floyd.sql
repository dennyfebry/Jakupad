-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jul 2019 pada 21.43
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `floyd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_gedung`
--

CREATE TABLE `tabel_gedung` (
  `id_gedung` varchar(20) NOT NULL,
  `nama_gedung` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `gambar` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_gedung`
--

INSERT INTO `tabel_gedung` (`id_gedung`, `nama_gedung`, `keterangan`, `gambar`) VALUES
('GD-001', 'Rektorat Universitas Padjadjaran', 'Rektorat', 'gambar/5d1777114cf43.png'),
('GD-002', 'FF', 'Fakultas Farmasi', 'gambar/5d17772f08a23.png'),
('GD-003', 'Pedca', 'Wilayah Utara', 'gambar/5d17783c8e967.png'),
('GD-004', 'FPIK', 'Fakultas Perikanan dan Ilmu Kelautan', 'gambar/5d177869560be.png'),
('GD-005', 'FTG', 'Fakultas Teknik Geologi', 'gambar/5d17787dcd53a.png'),
('GD-006', 'FTIP', 'Wilayah Utara', 'gambar/5d1778ac1962b.png'),
('GD-007', 'Faperta', 'Fakultas Pertanian', 'gambar/5d1779022da2d.png'),
('GD-008', 'PPBS A dan B', 'Pusat Pelayanan Basic Science', 'gambar/5d177949c4c2c.png'),
('GD-009', 'PPBS C dan D', 'Pusat Pelayanan Basic Science', 'gambar/5d17795ac1ba2.png'),
('GD-010', 'Gor Bale Basket', 'Bale Santika', 'gambar/5d1779766f33e.png'),
('GD-011', 'Gor Bale Futsal', 'Bale Santika', 'gambar/5d1779820badc.png'),
('GD-012', 'Masjid An Nahl', 'Fakultas Peternakan', 'gambar/5d17799a8462c.png'),
('GD-013', 'Departemen Matematika', 'Matematika, Farmasi, Statistika', 'gambar/5d1779c1551ef.png'),
('GD-014', 'Depertemen Biologi', 'Biologi, Masid FMIPA', 'gambar/5d1779dd92cd3.png'),
('GD-015', 'Pasca Sarjana Fikom', 'Fakultas Ilmu Komunikasi', 'gambar/5d1779f77ca3e.png'),
('GD-016', 'Fikom', 'Fakultas Ilmu Komunikasi', 'gambar/5d177a08edc63.png'),
('GD-017', 'Student Center Fikom', 'Fakultas Ilmu Komunikasi', 'gambar/5d177a142befa.png'),
('GD-018', 'Dekanat FMIPA', 'Fakultas Matematika dan Ilmu Pengetahuan Alam', 'gambar/5d177a3360c97.png'),
('GD-019', 'Depertemen Kimia', 'Fakultas Matematika dan Ilmu Pengetahuan Alam', 'gambar/5d177a406e2d2.png'),
('GD-020', 'FH', 'Fakultas Hukum', 'gambar/5d177a5f75aab.png'),
('GD-021', 'Departemen Geofisika', 'Fakultas Matematika dan Ilmu Pengetahuan Alam', 'gambar/5d177a7dc032d.png'),
('GD-022', 'Departemen Fisika', 'Fakultas Matematika dan Ilmu Pengetahuan Alam', 'gambar/5d177a893e73d.png'),
('GD-023', 'Labotarium Sentral', 'Prasarana Universitas Padjadjaran', 'gambar/5d177aca879d1.png'),
('GD-024', 'Fapsi', 'Fakultas Psikologi', 'gambar/5d177addae066.png'),
('GD-025', 'FKep', 'Fakultas Keperawatan', 'gambar/5d177ae87bc6b.png'),
('GD-026', 'Cisral', 'Prasarana Universitas Padjadjaran', 'gambar/5d177af88c25b.png'),
('GD-027', 'FIB', 'Fakultas Ilmu Budaya', 'gambar/5d177b098f451.png'),
('GD-028', 'Asrama FK', 'Prasarana Universitas Padjadjaran', 'gambar/5d177b190a065.png'),
('GD-029', 'Fisip', 'Fakultas Ilmu Sosial dan Ilmu Politik', 'gambar/5d177b2b0ca08.png'),
('GD-030', 'FKG', 'Fakultas Kedokteran Gigi', 'gambar/5d177b4a38d8d.png'),
('GD-031', 'FK', 'Fakultas Kedokteran', 'gambar/5d177b61972f6.png'),
('GD-032', 'UKM Barat', 'Prasarana Universitas Padjadjaran', 'gambar/5d177b70e4392.png'),
('GD-033', 'UKM Timur', 'Prasarana Universitas Padjadjaran', 'gambar/5d177f8fe0cc1.png'),
('GD-034', 'Asrama Farmasi', 'Prasarana Universitas Padjadjaran', 'gambar/5d177f99b2bd9.png'),
('GD-035', 'MRU', 'Masjid Raya Unpad', 'gambar/5d35e280af9b5.png'),
('GD-036', 'Bale Wilasa', 'Asrama FK', 'gambar/5d35e2aa98f5a.png'),
('GD-037', 'Gor Djati', 'Gor Djati', 'gambar/5d35e2bb4bced.png'),
('GD-038', 'Lapangan Merah', 'Lapangan Merah', 'gambar/5d35e33b952e7.png'),
('GD-039', 'Lapangan Basket FMIPA', 'Basket FMIPA', 'gambar/5d35e382576eb.png'),
('GD-040', 'Simpang Rektorat', 'Simpang Rektorat', 'gambar/5d35e3e01b46e.png'),
('GD-041', 'Bundaran Rektorat', 'Bundaran Rektorat', 'gambar/5d35e3f0a4aaf.png'),
('GD-042', 'Simpang FPIK', 'Simpang FPIK', 'gambar/5d35e40eb4144.png'),
('GD-043', 'Bundaran PPBS', 'Bundaran PPBS', 'gambar/5d35e4461c75e.png'),
('GD-044', 'Simpang Bale Santika', 'Simpang Bale Santika', 'gambar/5d35e45847b0a.png'),
('GD-045', 'Simpang PPBS', 'Simpang PPBS', 'gambar/5d35e4657c2d8.png'),
('GD-046', 'Lapangan Parkir Bale Santika', 'Lapangan Parkir Bale Santika', 'gambar/5d35e4851cd18.png'),
('GD-047', 'Simpang Faperta', 'Simpang Faperta', 'gambar/5d35e48f6ff10.png'),
('GD-048', 'Simpang Dekanat FMIPA', 'Simpang Dekanat FMIPA', 'gambar/5d35e4c16421e.png'),
('GD-049', 'Simpang Fikom', 'Simpang Fikom', 'gambar/5d35e4d2a4ed7.png'),
('GD-050', 'Simpang FIB', 'Simpang FIB', 'gambar/5d35e4e0df7df.png'),
('GD-051', 'Simpang Bale Asrama FK', 'Simpang Bale Asrama FK', 'gambar/5d35e4f973813.png'),
('GD-052', 'Simpang Cisral', 'Simpang Cisral', 'gambar/5d35e518dfd43.png'),
('GD-054', 'Bundaran Tanjakan Cinta', 'Bundaran Tanjakan Cinta', 'gambar/5d35e541d4cf4.png'),
('GD-055', 'Simpang Fisip', 'Simpang Fisip', 'gambar/5d35e54c7dd05.png'),
('GD-056', 'Simpang UKM Barat', 'Simpang UKM Barat', 'gambar/5d35e5695d9f3.png'),
('GD-057', 'Gerbang Utara', 'Gerbang Utara', 'gambar/5d35e5774d3d9.png'),
('GD-058', 'Gerbang BNI', 'Gerbang BNI', 'gambar/5d35e5801fc14.png'),
('GD-059', 'Gerbang Selatan', 'Gerbang Selatan', 'gambar/5d35e58742a91.png'),
('GD-060', 'Fapet', 'Fakultas Peternakan', 'gambar/5d360823f1cba.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_node`
--

CREATE TABLE `tabel_node` (
  `id` int(20) NOT NULL,
  `kode_gedung` varchar(50) DEFAULT NULL,
  `jarak` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_node`
--

INSERT INTO `tabel_node` (`id`, `kode_gedung`, `jarak`) VALUES
(31, 'GD-001<>GD-041', 95),
(30, 'GD-040<>GD-042', 152),
(29, 'GD-040<>GD-041', 66),
(28, 'GD-057<>GD-042', 135),
(27, 'GD-057<>GD-040', 109),
(32, 'GD-041<>GD-002', 66),
(33, 'GD-002<>GD-043', 136),
(34, 'GD-042<>GD-041', 159),
(35, 'GD-042<>GD-006', 152),
(36, 'GD-004<>GD-042', 135),
(37, 'GD-004<>GD-006', 131),
(38, 'GD-043<>GD-044', 79),
(39, 'GD-043<>GD-045', 65),
(40, 'GD-044<>GD-046', 60),
(41, 'GD-003<>GD-044', 422),
(42, 'GD-045<>GD-008', 50),
(43, 'GD-045<>GD-010', 72),
(44, 'GD-008<>GD-005', 29),
(45, 'GD-008<>GD-013', 216),
(46, 'GD-006<>GD-060', 69),
(47, 'GD-005<>GD-013', 203),
(48, 'GD-005<>GD-060', 188),
(49, 'GD-046<>GD-017', 479),
(50, 'GD-010<>GD-011', 42),
(51, 'GD-011<>GD-009', 72),
(52, 'GD-012<>GD-005', 179),
(53, 'GD-012<>GD-013', 126),
(54, 'GD-009<>GD-038', 105),
(55, 'GD-047<>GD-060', 107),
(56, 'GD-047<>GD-048', 385),
(57, 'GD-012<>GD-021', 243),
(58, 'GD-038<>GD-015', 112),
(60, 'GD-007<>GD-022', 220),
(61, 'GD-015<>GD-023', 49),
(62, 'GD-014<>GD-047', 301),
(63, 'GD-014<>GD-048', 223),
(64, 'GD-018<>GD-047', 371),
(65, 'GD-018<>GD-048', 157),
(66, 'GD-022<>GD-048', 71),
(67, 'GD-022<>GD-021', 90),
(68, 'GD-048<>GD-024', 112),
(69, 'GD-019<>GD-022', 122),
(70, 'GD-039<>GD-021', 69),
(71, 'GD-039<>GD-022', 122),
(72, 'GD-023<>GD-052', 312),
(73, 'GD-017<>GD-049', 72),
(74, 'GD-049<>GD-050', 235),
(75, 'GD-016<>GD-049', 43),
(76, 'GD-020<>GD-049', 58),
(77, 'GD-024<>GD-025', 46),
(87, 'GD-025<>GD-031', 235),
(79, 'GD-026<>GD-021', 164),
(80, 'GD-026<>GD-052', 92),
(81, 'GD-050<>GD-051', 47),
(82, 'GD-027<>GD-050', 130),
(83, 'GD-051<>GD-055', 106),
(84, 'GD-052<>GD-054', 106),
(88, 'GD-031<>GD-032', 71),
(89, 'GD-031<>GD-030', 75),
(90, 'GD-030<>GD-054', 47),
(91, 'GD-054<>GD-029', 61),
(92, 'GD-054<>GD-059', 165),
(93, 'GD-029<>GD-055', 90),
(94, 'GD-055<>GD-036', 146),
(95, 'GD-032<>GD-056', 81),
(96, 'GD-035<>GD-059', 126),
(97, 'GD-035<>GD-054', 150),
(98, 'GD-035<>GD-056', 200),
(99, 'GD-036<>GD-033', 82),
(100, 'GD-037<>GD-059', 82),
(101, 'GD-037<>GD-054', 70),
(102, 'GD-056<>GD-058', 391),
(103, 'GD-059<>GD-056', 121),
(105, 'GD-033<>GD-059', 155);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id` int(10) NOT NULL,
  `nama_user` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_user`
--

INSERT INTO `tabel_user` (`id`, `nama_user`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin'),
(3, 'sandi', 'sandi', 'sandi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_node`
--
ALTER TABLE `tabel_node`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabel_node`
--
ALTER TABLE `tabel_node`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
