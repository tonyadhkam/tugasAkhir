-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2020 pada 02.08
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cahayatravel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(25) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `email`, `role`) VALUES
(9, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'admin'),
(10, 'manager', '1d0258c2440a8d19e716292b231e3190', 'manager@gmail.com', 'manager');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_booking`
--

CREATE TABLE `tb_booking` (
  `id_booking` int(11) NOT NULL,
  `kd_booking` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_paket_wisata` int(11) NOT NULL,
  `nm_paket_wisata` text NOT NULL,
  `booking_date` date NOT NULL,
  `tour_date` date NOT NULL,
  `id_titik_jemput` int(11) NOT NULL,
  `jml_peserta` varchar(50) NOT NULL,
  `total_harga` varchar(250) NOT NULL,
  `status_booking` text NOT NULL,
  `kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_booking`
--

INSERT INTO `tb_booking` (`id_booking`, `kd_booking`, `id_user`, `id_paket_wisata`, `nm_paket_wisata`, `booking_date`, `tour_date`, `id_titik_jemput`, `jml_peserta`, `total_harga`, `status_booking`, `kategori`) VALUES
(120, 'KD1593929406.7713', 21, 9, 'Bali 5D + 2N (44)', '2020-06-05', '2020-07-31', 18, '88', '81840000', 'pembayaran', 'siswa'),
(122, 'KD1594021581.6745', 21, 9, 'Bali 5D + 2N (44)', '2020-07-06', '2020-07-31', 18, '88', '81840000', 'pembayaran', 'siswa'),
(124, 'KD1594022293.7309', 21, 48, 'Bali 5 Hari + Inap 2 Malam', '2020-07-06', '2020-08-31', 18, '44', '97460000', 'pembayaran', 'customize'),
(125, 'KD1594022496.783', 21, 9, 'Bali 5D + 2N (44)', '2020-07-06', '2020-07-30', 18, '44', '40920000', 'pembayaran', 'siswa'),
(126, 'KD1594025180.1196', 21, 49, 'Bali 4 Hari + Inap 2 Malam', '2020-07-06', '2020-07-31', 18, '55', '83325000', 'pembayaran', 'customize'),
(127, 'KD1594101278.9855', 22, 18, 'Bali 5D+2N (44)', '2020-07-07', '2020-08-13', 18, '44', '47080000', 'pembayaran', 'umum'),
(129, 'KD1594178291.1815', 25, 10, 'Bali 5D + 2N (54)', '2020-07-08', '2020-07-09', 18, '54', '44280000', 'pending', 'siswa'),
(130, 'KD1594178765.4452', 26, 9, 'Bali 5D + 2N (44)', '2020-07-08', '2020-08-01', 18, '44', '40920000', 'pembayaran', 'siswa'),
(131, 'KD1594180569.8536', 25, 9, 'Bali 5D + 2N (44)', '2020-07-08', '2020-07-09', 18, '44', '40920000', 'pembayaran', 'siswa'),
(132, 'KD1594188058.5459', 28, 10, 'Bali 5D + 2N (54)', '2020-07-08', '2020-07-31', 18, '54', '44280000', 'pembayaran', 'siswa'),
(133, 'KD1594200261.9781', 32, 10, 'Bali 5D + 2N (54)', '2020-07-08', '2020-07-30', 28, '54', '44280000', 'pembayaran', 'siswa'),
(135, 'KD1594200462.9024', 33, 10, 'Bali 5D + 2N (54)', '2020-07-08', '2020-07-24', 18, '54', '44280000', 'pembayaran', 'siswa'),
(136, 'KD1594208062.1067', 34, 18, 'Bali 5D+2N (44)', '2020-07-08', '2020-08-30', 25, '44', '47080000', 'pembayaran', 'umum'),
(137, 'KD1594208790.7832', 34, 53, 'Bali 5 Hari + Inap 2 Malam', '2020-07-08', '2020-12-01', 25, '44', '60280000', 'pending', 'customize'),
(138, 'KD1594335683.6576', 21, 54, 'Bali 5 Hari + Inap 2 Malam', '2020-07-10', '2020-08-31', 26, '59', '123605000', 'pembayaran', 'customize'),
(139, 'KD1594345258.0261', 21, 13, 'Bali 4D + 2N (54)', '2020-07-10', '2020-07-31', 18, '54', '38880000', 'pembayaran', 'siswa'),
(140, 'KD1594345566.6256', 21, 16, 'Bali 4D + 1N (54)', '2020-07-10', '2020-09-29', 26, '54', '31590000', 'pembayaran', 'siswa'),
(141, 'KD1594352845.228', 21, 18, 'Bali 5D+2N (44)', '2020-07-10', '2020-08-31', 26, '88', '94160000', 'pembayaran', 'umum'),
(142, 'KD1594354896.3987', 21, 9, 'Bali 5D + 2N (44)', '2020-07-10', '2020-07-31', 26, '88', '81840000', 'pembayaran', 'siswa'),
(143, 'KD1594355473.8957', 21, 55, 'Bali 5 Hari + Inap 2 Malam', '2020-07-10', '2020-07-31', 26, '88', '133320000', 'pending', 'customize'),
(144, 'KD1594364833.6371', 21, 18, 'Bali 5D+2N (44)', '2020-07-10', '2020-08-31', 26, '44', '47080000', 'pembayaran', 'umum'),
(145, 'KD1594365305.078', 21, 56, 'Bali 5 Hari + Inap 2 Malam', '2020-07-10', '2020-08-31', 38, '44', '97460000', 'pembayaran', 'customize'),
(146, 'KD1594373209.5463', 21, 18, 'Bali 5D+2N (44)', '2020-07-10', '2020-07-31', 26, '88', '94160000', 'pembayaran', 'umum'),
(147, 'KD1594373637.9453', 21, 57, 'Bali 5 Hari + Inap 2 Malam', '2020-07-10', '2020-07-31', 26, '55', '113575000', 'pending', 'customize'),
(148, 'KD1594373670.964', 21, 57, 'Bali 5 Hari + Inap 2 Malam', '2020-07-10', '2020-07-31', 26, '55', '113575000', 'pembayaran', 'customize'),
(149, 'KD1594440048.4288', 25, 18, 'Bali 5D+2N (44)', '2020-07-11', '2020-07-31', 24, '44', '47080000', 'pembayaran', 'umum'),
(151, 'KD1594653511.6091', 25, 58, 'Bali 5 Hari + Inap 2 Malam', '2020-07-13', '2020-07-07', 18, '44', '95612000', 'pembayaran', 'customize'),
(152, 'KD1594683045.7152', 21, 59, 'Jogja Tulak (Tanpa Inap)', '2020-07-14', '2020-07-31', 26, '50', '19000000', 'pembayaran', 'customize'),
(153, 'KD1594691448.5522', 21, 19, 'Bali 5D+2N (50)', '2020-07-14', '2020-07-31', 26, '100', '100000000', 'pembayaran', 'umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bus`
--

CREATE TABLE `tb_bus` (
  `id_bus` int(11) NOT NULL,
  `desc` text NOT NULL,
  `seat` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bus`
--

INSERT INTO `tb_bus` (`id_bus`, `desc`, `seat`, `harga`) VALUES
(5, 'Bus 5 Hari (Bali)', 44, 200000),
(6, 'Bus 5 Hari (Bali)', 55, 165000),
(7, 'Bus 5 Hari (Bali)', 59, 150000),
(10, 'Bus 5 Hari (Bali)', 50, 175000),
(11, 'Bus 4 Hari (Bali)', 44, 100000),
(12, 'Bus 4 Hari (Bali)', 55, 85000),
(13, 'Bus 4 Hari (Bali)', 59, 75000),
(14, 'Bus 4 Hari (Bali)', 50, 95000),
(15, 'Bus Tulak (Jogja)', 44, 85000),
(16, 'Bus Tulak (Jogja)', 50, 80000),
(17, 'Bus Tulak (Jogja)', 55, 75000),
(18, 'Bus Tulak (Jogja)', 59, 70000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_daftar_paket`
--

CREATE TABLE `tb_daftar_paket` (
  `id_fasilitas` int(11) NOT NULL,
  `nm_daftar_paket` varchar(50) NOT NULL,
  `deskripsi_fasilitas` text NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_daftar_paket`
--

INSERT INTO `tb_daftar_paket` (`id_fasilitas`, `nm_daftar_paket`, `deskripsi_fasilitas`, `harga`) VALUES
(4, 'Bali 5 Hari + Inap 2 Malam', 'Makan : Bali Paket 5 Hari Inap 2 Malam untuk makan 10x (Prasmanan dan Box (dikondisikan)), Persediaan Air Minum selama perjalanan. (club tanggung 600 ml), Persediaan P3K, Spanduk kegiatan, Biaya Tol, Parkir dan Retribusi Jalan, Tour Leader tiap bus, Biaya Penyeberangan PP (khusus Bali), Guide local (khusus Bali), Sopir yang berpengalaman dan sabar.', 550000),
(5, 'Jogja Tulak (Tanpa Inap)', 'Persediaan Air Minum selama perjalanan. (club tanggung 600 ml), Persediaan P3K, Spanduk kegiatan, Biaya Tol, Parkir dan Retribusi Jalan, Tour Leader tiap bus, Sopir yang berpengalaman dan sabar.', 248000),
(7, 'Bali 3 Hari + Inap 1 Malam', 'Makan : Bali Paket 3 Hari Inap 1 Malam untuk makan 6x (Prasmanan dan Box (dikondisikan)), Persediaan Air Minum selama perjalanan. (club tanggung 600 ml), Persediaan P3K, Spanduk kegiatan, Biaya Tol, Parkir dan Retribusi Jalan, Tour Leader tiap bus, Biaya Penyeberangan PP (khusus Bali), Guide local (khusus Bali), Sopir yang berpengalaman dan sabar.', 341000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_booking`
--

CREATE TABLE `tb_detail_booking` (
  `id_detail_booking` int(11) NOT NULL,
  `kd_booking` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `email` text NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_booking`
--

INSERT INTO `tb_detail_booking` (`id_detail_booking`, `kd_booking`, `id_user`, `nik`, `alamat`, `email`, `no_telepon`, `nama`) VALUES
(54, 'KD1593929406.7713', 21, 214748009, 'Jl. Soekarno Hatta No.123 Kab. Lamongan', 'tonyandhika20@gmail.com', '081353371987', 'Tony Andhika Mahendra'),
(56, 'KD1594021581.6745', 21, 1731710127, 'Kutorejo No.123 Kab. Lamongan', 'tonyandhika20@gmail.com', '081353371988', 'Tony Andhika Mahendra'),
(57, 'KD1594022293.7309', 21, 1731710127, 'Jl. Veteran No.11 Kab. Lamongan', 'tonyandhika20@gmail.com', '081363391990', 'Tony Andhika Mahendra'),
(58, 'KD1594022496.783', 21, 1731710127, 'Jl. Widang No. 170 Kab. Lamongan', 'tonyandhika20@gmail.com', '081363381988', 'Tony Andhika Mahendra'),
(60, 'KD1594025180.1196', 21, 2147483647, 'Jl. Babat No. 128 Kab. Lamongan', 'tonyandhika20@gmail.com', '081353391980', 'Tony Andhika Mahendra'),
(61, 'KD1594101278.9855', 22, 2147483647, 'Alun-Alun Lamongan', 'baguseputro03@gmail.com', '085732188856', 'Muhammad Bagus Seputro'),
(62, 'KD1594178765.4452', 26, 2147483647, 'TUBAN', 'diahanggraini2301@gmail.c', '085655199868', 'DIAH AYU ANGGRAINI'),
(63, 'KD1594180569.8536', 25, 1731710182, 'Kebonsari', 'windaekaf22@gmail.com', '087654667788', 'Winda Eka'),
(64, 'KD1594188058.5459', 28, 2147483647, 'Sendangharjo gang 2 nomor 125 Tuban', 'husnulhotimah247@gmail.co', '085854410900', 'Husnul Hotimah'),
(65, 'KD1594200261.9781', 32, 2147483647, 'SMA 4 Surabaya', 'reyhanalmer99@gmail.com', '0819781298210', 'Reyhan Almer'),
(66, 'KD1594200462.9024', 33, 2147483647, 'Jl. JALAN', 'marchandasukma16@gmail.co', '082139114356', 'Marchanda Suk.a'),
(67, 'KD1594208062.1067', 34, 2147483647, 'Dsn delik, ds pojokrejo, kesamben, jombang', 'dwiratna5421@gmail.com', '087859684964', 'Dwi Ratna'),
(68, 'KD1594335683.6576', 21, 1731710127, 'Jl. Basuki Rachmad No.64 Kab. Tuban', 'tonyandhika20@gmail.com', '081353371987', 'Tony Andhika Mahendra'),
(69, 'KD1594345258.0261', 21, 1731710127, 'Jl. Veteran No.99 Lamongan', 'tonyandhika20@gmail.com', '081353371987', 'Tony Andhika Mahendra'),
(70, 'KD1594345566.6256', 21, 1731710127, 'Kutorjo No.111 Kab. Tuban', 'tonyandhika20@gmail.com', '081353371987', 'Tony Andhika Mahendra'),
(71, 'KD1594352845.228', 21, 1731710127, 'Kutorejo No.123 Kkab. Tuban', 'tonyandhika20@gmail.com', '081353371987', 'Tony Andhika Mahendra'),
(72, 'KD1594354896.3987', 21, 2147483647, 'Jl. Kutorejo No. 123 Tuban', 'tonyandhika20@gmail.com', '08135337198', 'Tony Andhika Mahendra'),
(73, 'KD1594364833.6371', 21, 1731710127, 'Jl. Veteran No.12 Kab. Tuban', 'tonyandhika20@gmail.com', '081353371987', 'Tony Andhika Mahendra'),
(74, 'KD1594365305.078', 21, 1731710127, 'Jl. Soekarno Hatta PTP 1 No. 7 Malang', 'tonyandhika20@gmail.com', '081353371987', 'Tony Andhika Mahendra'),
(75, 'KD1594373209.5463', 21, 1731710127, 'Jl. Veteran No.13 Kab Tuban', 'tonyandhika20@gmail.com', '081353371987', 'Tony Andhika Mahendra'),
(76, 'KD1594373670.964', 21, 1731710127, 'Jl. Veteran No.123 Lamongan', 'tonyandhika20@gmail.com', '081353371987', 'Tony Andhika Mahendra'),
(77, 'KD1594440048.4288', 25, 2147483647, 'JL. RUNGKUT N0. 123 KAB. MADIUN', 'windaekaf22@gmail.com', '081345371887', 'Winda Eka'),
(79, 'KD1594653511.6091', 25, 1731710182, 'Tuban', 'windaekaf22@gmail.com', '657657867898', 'Winda Eka'),
(80, 'KD1594683045.7152', 21, 1731710127, 'Kutorjo Gg.4 No.502 Kab. Tuban', 'tonyandhika20@gmail.com', '081353371987', 'Tony Andhika Mahendra'),
(81, 'KD1594691448.5522', 21, 1731710127, 'Jl. Veteran No. 123 Kab. Tuban', 'tonyandhika20@gmail.com', '081353371987', 'Tony Andhika Mahendra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hotel`
--

CREATE TABLE `tb_hotel` (
  `id_hotel` int(11) NOT NULL,
  `nama_hotel` varchar(25) NOT NULL,
  `bintang` int(5) NOT NULL,
  `desc` text NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_hotel`
--

INSERT INTO `tb_hotel` (`id_hotel`, `nama_hotel`, `bintang`, `desc`, `harga`) VALUES
(9, 'Hotel 2 Malam (2 Org)', 5, '1 Kamar / 2 Orang', 1400000),
(10, 'Hotel 2 Malam (1 Org)', 5, '1 Kamar / 1 Orang', 2800000),
(11, 'Hotel 2 Malam (3 Org)', 5, '1 Kamar / 3 Oorang', 935000),
(12, 'Hotel 2 Malam (4 Org)', 5, '1 Kamar / 4 Orang', 700000),
(13, 'Hotel 2 Malam (1 Org)', 4, '1 Kamar / 1 Orang', 2400000),
(14, 'Hotel 2 Malam (2 Org)', 4, '1 Kamar / 2 Orang', 1200000),
(15, 'Hotel 2 Malam (3 Org)', 4, '1 Kamar / 3 Orang', 800000),
(16, 'Hotel 2 Malam (4 Org)', 4, '1 Kamar / 4 Orang', 600000),
(18, 'Hotel 2 Malam (2 Org)', 3, '1 Kamar / 2 Orang', 140000),
(19, 'Hotel 2 Malam (1 Org)', 3, '1 Kamar / 1 Orang', 280000),
(20, 'Hotel 2 Malam (3 Org)', 3, '1 Kamar / 3 Orang', 95000),
(21, 'Hotel 2 Malam (4 Org)', 3, '1 Kamar / 4 Orang', 70000),
(22, 'Hotel 1 Malam (1 Org)', 5, '1 Kamar / 1 Orang', 1400000),
(23, 'Hotel 1 Malam (2 Org)', 5, '1 Kamar / 2 Orang', 700000),
(24, 'Hotel 1 Malam (3 Org)', 5, '1 Kamar / 3 Orang', 466000),
(25, 'Hotel 1 Malam (4 Org)', 5, '1 Kamar / 4 Orang', 350000),
(26, 'Hotel 1 Malam (1 Org)', 4, '1 Kamar / 1 Orang', 1200000),
(27, 'Hotel 1 Malam (2 Org)', 4, '1 Kamar / 2 Orang', 600000),
(28, 'Hotel 1 Malam (3 Org)', 4, '1 Kamar / 3 Orang', 400000),
(29, 'Hotel 1 Malam (4 Org)', 4, '1 Kamar / 4 Orang', 300000),
(30, 'Hotel 1 Malam (1 Org)', 3, '1 Kamar / 1 Orang', 140000),
(31, 'Hotel 1 Malam (2 Org)', 3, '1 Kamar / 2 Orang', 70000),
(32, 'Hotel 1 Malam (3 Org)', 3, '1 Kamar / 3 Orang', 46000),
(33, 'Hotel 1 Malam (4 Org)', 3, '1 Kamar / 4 Orang', 35000),
(34, 'Tulak', 0, 'Tidak Menginap', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_info_wisata`
--

CREATE TABLE `tb_info_wisata` (
  `id_info_wisata` int(11) NOT NULL,
  `nm_wisata` varchar(225) NOT NULL,
  `tempat_wisata` varchar(50) NOT NULL,
  `desc` text NOT NULL,
  `gambar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_info_wisata`
--

INSERT INTO `tb_info_wisata` (`id_info_wisata`, `nm_wisata`, `tempat_wisata`, `desc`, `gambar`) VALUES
(6, 'Garuda Wisnu Kencana', 'Jl. Raya Uluwatu, Desa Ungasan, Bali', '<p><strong>Taman Budaya Garuda Wisnu Kencana</strong>&nbsp;atau&nbsp;disingkat&nbsp;<strong>GWK</strong>, adalah sebuah taman wisata di bagian selatan pulau Bali. Taman wisata ini terletak di&nbsp;Desa Ungasan,&nbsp;Kecamatan Kuta Selatan,&nbsp;Kabupaten Badung, kira-kira 40&nbsp;kilometer&nbsp;di sebelah selatan&nbsp;Denpasar,&nbsp;ibu kota&nbsp;provinsi Bali.Di areal taman budaya ini, direncanakan akan didirikan sebuah&nbsp;<em>landmark</em>&nbsp;atau maskot Bali, yakni patung berukuran raksasa&nbsp;Dewa Wisnu&nbsp;yang sedang menunggangi tunggangannya,&nbsp;Garuda, setinggi 120 meter.</p><p>Area Taman Budaya Garuda Wisnu Kencana berada di ketinggian 146 meter di atas permukaan tanah atau 263 meter di atas permukaan laut.</p><p>Di kawasan itu terdapat juga Patung Garuda yang tepat di belakang Plaza Wisnu adalah Garuda Plaza di mana patung setinggi 18 meter Garuda ditempatkan sementara. Pada saat ini, Garuda Plaza menjadi titik fokus dari sebuah lorong besar pilar berukir batu kapur yang mencakup lebih dari 4000 meter persegi luas ruang terbuka yaitu&nbsp;<em>Lotus Pond</em>. Pilar-pilar batu kapur kolosal dan monumental patung Lotus Pond Garuda membuat ruang yang sangat eksotis. Dengan kapasitas ruangan yang mampu menampung hingga 7000 orang,&nbsp;<em>Lotus Pond</em>&nbsp;telah mendapatkan reputasi yang baik sebagai tempat sempurna untuk mengadakan acara besar dan internasional.</p><p>Terdapat juga patung tangan Wisnu yang merupakan bagian dari patung Dewa Wisnu. Ini merupakan salah satu langkah lebih dekat untuk menyelesaikan patung Garuda Wisnu Kencana lengkap. Karya ini ditempatkan sementara di daerah&nbsp;Tirta Agung.</p><p>Pada tanggal 22 September 2018 Presiden&nbsp;Joko Widodo&nbsp;beserta Ibu Negara Iriana Joko Widodo menghadiri peresmian patung Garuda Wisnu Kencana (GWK).</p><ul><li>Pengelola :&nbsp;PT Alam Sutera Realty Tbk</li><li>Fasilitas : Wisnu Plaza, Street Theater, Lotus Pond, Indraloka Garden, Amphitheatre, Tirta Agung</li></ul>', 'cb1b6b78443ba7ae7b1868aa446b485e.jpeg'),
(7, 'Pantai Pandawa', 'Kuta Selatan, Kabupaten Badung', '<p><strong>Pantai Pandawa</strong>&nbsp;adalah salah satu kawasan wisata di area Kuta selatan,&nbsp;Kabupaten Badung, Bali. Pantai ini terletak di balik perbukitan dan sering disebut sebagai Pantai Rahasia (<em>Secret Beach</em>). Di sekitar pantai ini terdapat dua tebing yang sangat besar yang pada salah satu sisinya dipahat lima patung&nbsp;Pandawa&nbsp;dan&nbsp;Kunti. Keenam patung tersebut secarara berurutan (dari posisi tertinggi) diberi penejasan nama Dewi Kunti,&nbsp;Dharma Wangsa,&nbsp;Bima,&nbsp;Arjuna,&nbsp;Nakula, dan&nbsp;Sadewa.</p><p>Selain untuk tujuan wisata dan olahraga air, pantai ini juga dimanfaatkan untuk budidaya&nbsp;rumput laut&nbsp;karena kontur pantai yang landai dan ombak yang tidak sampai ke garis pantai. Cukup banyak wisatawan yang melakukan&nbsp;paralayang&nbsp;dari Bukit Timbis hingga ke Pantai Pandawa.</p><p>Kawasan pantai ini juga sering digunakan sebagai lokasi pengambilan gambar untuk&nbsp;sinetron FTV.</p>', '363ce6935f884c8f561a4a74a6951bcf.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kantor_cabang`
--

CREATE TABLE `tb_kantor_cabang` (
  `id_kantor_cabang` int(11) NOT NULL,
  `nama_kota` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kantor_cabang`
--

INSERT INTO `tb_kantor_cabang` (`id_kantor_cabang`, `nama_kota`) VALUES
(11, 'Tuban'),
(12, 'Malang'),
(13, 'Sidoarjo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_objek_wisata`
--

CREATE TABLE `tb_objek_wisata` (
  `id_objek` int(11) NOT NULL,
  `nama_wisata` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_objek_wisata`
--

INSERT INTO `tb_objek_wisata` (`id_objek`, `nama_wisata`, `harga`, `gambar`) VALUES
(30, 'Tanah Lot - Bali', 20000, 'dfc265e37a66b67e10299865e656425e.jpg'),
(31, 'Pulau Serangan / Tanjung Benoa - Bali', 35000, 'f26fe5956e70d77ec9ec9c51b91d63c4.jpg'),
(32, 'Pantai Kuta - Bali', 10000, '056b8489f44077079585437447d81b77.jpg'),
(33, 'Pantai Pandawa - Bali', 8000, '9933c21b03aa4d39777fec6d680e54e5.jpg'),
(34, 'Bedugul - Bali', 20000, '28406fb1fc1732c37ad312eb08d0bea9.jpg'),
(35, 'Museum Bajrasandi - Bali', 25000, '2fa29f868f9896a99297742faf5714e3.jpg'),
(36, 'Pusat Oleh Oleh - Bali', 0, '0d73225ce5923dc11b106373c62f1d74.jpg'),
(37, 'Joger - Bali', 0, '16b0f1303f4134bf51ba9dd6214a4e33.jpg'),
(38, 'Khrisna - Bali', 0, '1a0335a3311c63adff211a01e900f6b4.jpg'),
(39, 'Tari Barong - Bali', 80000, '3f25e96b6dc01ce5208622711ab34fe6.jpg'),
(40, 'Candi Borobudur - Jogja', 50000, '6082c14d811baa6c2478d573d9b7c749.jpg'),
(41, 'Taman Pintar - Jogja', 2000, '65ae04c585e30ab5d956c1da22de8d37.jpg'),
(42, 'Malioboro - Jogja', 0, '092c7c2e60a0ff38ddd6e22947b69a0c.jpg'),
(43, 'Pusat Oleh2 - Jogja', 0, 'b6c266f71ebde9cea1099adb113e4817.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket_wisata` int(11) NOT NULL,
  `nama_paket` text NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `set_peserta` int(15) NOT NULL,
  `objek_wisata` text NOT NULL,
  `desc_paket_wisata` text NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `total_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket_wisata`, `nama_paket`, `kategori`, `set_peserta`, `objek_wisata`, `desc_paket_wisata`, `harga_paket`, `gambar`, `total_order`) VALUES
(9, 'Bali 5D + 2N (44)', 'siswa', 44, 'Tanah Lot, Pulau Serangan/Tanjung Benoa, Pantai Kuta, Pantai Pandawa, Museum Bajrasandi, Pusat Oleh-oleh khas Bali, Joger, Bedugul (Pura Candi Kuning), Khrisna, Tari Barong.', '<ul><li><strong>Bus Pariwisata</strong> : Rec. Seat (2-2,2-3), AC, TV, Video, Mic</li><li><strong>Hotel </strong>: Bintang 3, 1 kamar / 4 orang</li><li><strong>Makan</strong> :Bali Paket 5 Hari Inap 2 Malam untuk makan 10x (Prasmanan dan Box (dikondisikan) dan &nbsp;snack saat pemberangkatan)</li><li>Persediaan Air Minum selama perjalanan. (club tanggung 600 ml)</li><li>Persediaan P3K.</li><li>Spanduk kegiatan.</li><li>Biaya Tol, Parkir dan Retribusi Jalan.</li><li>Tour Leader tiap bus.</li><li>Biaya Penyeberangan PP (khusus Bali)</li><li>Guide local (khusus Bali)</li><li>Sopir yang berpengalaman dan sabar.</li></ul>', 930000, '33946a09adb6b3e439f123d62b4ff233.jpg', 1),
(10, 'Bali 5D + 2N (54)', 'siswa', 54, 'Tanah Lot, Pulau Serangan/Tanjung Benoa, Pantai Kuta, Pantai Pandawa, Museum Bajrasandi, Pusat Oleh-oleh khas Bali, Joger, Bedugul (Pura Candi Kuning), Khrisna, Tari Barong.', '<ul><li><strong>Bus Pariwisata</strong> : Rec. Seat (2-2,2-3), AC, TV, Video, Mic</li><li><strong>Hotel </strong>: Bintang 3, 1 kamar / 4 orang</li><li><strong>Makan</strong> :Bali Paket 5 Hari Inap 2 Malam untuk makan 10x (Prasmanan dan Box (dikondisikan) dan &nbsp;snack saat pemberangkatan)</li><li>Persediaan Air Minum selama perjalanan. (club tanggung 600 ml)</li><li>Persediaan P3K.</li><li>Spanduk kegiatan.</li><li>Biaya Tol, Parkir dan Retribusi Jalan.</li><li>Tour Leader tiap bus.</li><li>Biaya Penyeberangan PP (khusus Bali)</li><li>Guide local (khusus Bali)</li><li>Sopir yang berpengalaman dan sabar.</li></ul>', 820000, 'a9195b98cf44a3259c4f2d29480b393c.jpg', 0),
(11, 'Bali 5D + 2N (59)', 'siswa', 59, 'Tanah Lot, Pulau Serangan/Tanjung Benoa, Pantai Kuta, Pantai Pandawa, Museum Bajrasandi, Pusat Oleh-oleh khas Bali, Joger, Bedugul (Pura Candi Kuning), Khrisna, Tari Barong.', '<ul><li><strong>Bus Pariwisata</strong> : Rec. Seat (2-2,2-3), AC, TV, Video, Mic</li><li><strong>Hotel </strong>: Bintang 3, 1 kamar / 4 orang</li><li><strong>Makan</strong> :Bali Paket 5 Hari Inap 2 Malam untuk makan 10x (Prasmanan dan Box (dikondisikan) dan &nbsp;snack saat pemberangkatan)</li><li>Persediaan Air Minum selama perjalanan. (club tanggung 600 ml)</li><li>Persediaan P3K.</li><li>Spanduk kegiatan.</li><li>Biaya Tol, Parkir dan Retribusi Jalan.</li><li>Tour Leader tiap bus.</li><li>Biaya Penyeberangan PP (khusus Bali)</li><li>Guide local (khusus Bali)</li><li>Sopir yang berpengalaman dan sabar.</li></ul>', 775000, '42cd86750a944f1ad7e057b50614eb5e.jpg', 0),
(12, 'Bali 4D + 2N (44)', 'siswa', 44, 'Tanah Lot, Tanjung Benoa, Pantai Kuta, Pantai Pandawa, Pusat Oleh-oleh khas Bali, Joger, Bedugul (Pura Candi Kuning), Khrisna, Tari Barong.', '<ul><li><strong>Bus Pariwisata</strong> : Rec. Seat (2-2,2-3), AC, TV, Video, Mic</li><li><strong>Hotel </strong>: Bintang 3, 1 kamar / 4 orang</li><li><strong>Makan </strong>: Bali Paket 4 Hari Inap 2 Malam untuk makan 9x (Prasmanan dan Box (dikondisikan)</li><li>Persediaan Air Minum selama perjalanan. (club tanggung 600 ml)</li><li>Persediaan P3K.</li><li>Spanduk kegiatan.</li><li>Biaya Tol, Parkir dan Retribusi Jalan.</li><li>Tour Leader tiap bus.</li><li>Biaya Penyeberangan PP (khusus Bali)</li><li>Guide local (khusus Bali)</li><li>Sopir yang berpengalaman dan sabar.</li></ul>', 815000, 'a97d3602c0060bcb87b3e978457bc222.jpg', 0),
(13, 'Bali 4D + 2N (54)', 'siswa', 54, 'Tanah Lot, Tanjung Benoa, Pantai Kuta, Pantai Pandawa, Pusat Oleh-oleh khas Bali, Joger, Bedugul (Pura Candi Kuning), Khrisna, Tari Barong.', '<ul><li><strong>Bus Pariwisata</strong> : Rec. Seat (2-2,2-3), AC, TV, Video, Mic</li><li><strong>Hotel </strong>: Bintang 3, 1 kamar / 4 orang</li><li><strong>Makan </strong>: Bali Paket 4 Hari Inap 2 Malam untuk makan 9x (Prasmanan dan Box (dikondisikan)</li><li>Persediaan Air Minum selama perjalanan. (club tanggung 600 ml)</li><li>Persediaan P3K.</li><li>Spanduk kegiatan.</li><li>Biaya Tol, Parkir dan Retribusi Jalan.</li><li>Tour Leader tiap bus.</li><li>Biaya Penyeberangan PP (khusus Bali)</li><li>Guide local (khusus Bali)</li><li>Sopir yang berpengalaman dan sabar.</li></ul>', 720000, '2b72993911747418fbefa835e66db7df.jpg', 1),
(14, 'Bali 4D + 2N (59)', 'siswa', 59, 'Tanah Lot, Tanjung Benoa, Pantai Kuta, Pantai Pandawa, Pusat Oleh-oleh khas Bali, Joger, Bedugul (Pura Candi Kuning), Khrisna, Tari Barong.', '<ul><li><strong>Bus Pariwisata</strong> : Rec. Seat (2-2,2-3), AC, TV, Video, Mic</li><li><strong>Hotel </strong>: Bintang 3, 1 kamar / 4 orang</li><li><strong>Makan </strong>: Bali Paket 4 Hari Inap 2 Malam untuk makan 9x (Prasmanan dan Box (dikondisikan)</li><li>Persediaan Air Minum selama perjalanan. (club tanggung 600 ml)</li><li>Persediaan P3K.</li><li>Spanduk kegiatan.</li><li>Biaya Tol, Parkir dan Retribusi Jalan.</li><li>Tour Leader tiap bus.</li><li>Biaya Penyeberangan PP (khusus Bali)</li><li>Guide local (khusus Bali)</li><li>Sopir yang berpengalaman dan sabar.</li></ul>', 685000, 'b8ee57417da3b59887b7f83d09c5a736.jpg', 0),
(15, 'Bali 4D + 1N (44)', 'siswa', 44, 'Tanah Lot, Tanjung Benoa, Pantai Kuta, Pantai Pandawa, Pusat Oleh-oleh khas Bali, Joger, Bedugul (Pura Candi Kuning), Khrisna, Tari Barong.', '<ul><li><strong>Bus Pariwisata</strong> : Rec. Seat (2-2,2-3), AC, TV, Video, Mic</li><li><strong>Hotel </strong>: Bintang 3, 1 kamar / 4 orang</li><li><strong>Makan </strong>: Bali Paket 4 Hari Inap 1 Malam untuk makan 8x (Prasmanan dan Box (dikondisikan)&nbsp;</li><li>Persediaan Air Minum selama perjalanan. (club tanggung 600 ml)</li><li>Persediaan P3K.</li><li>Spanduk kegiatan.</li><li>Biaya Tol, Parkir dan Retribusi Jalan.</li><li>Tour Leader tiap bus.</li><li>Biaya Penyeberangan PP (khusus Bali)</li><li>Guide local (khusus Bali)</li><li>Sopir yang berpengalaman dan sabar.</li></ul>', 665000, 'e4d3e30458dbecb40ca76078acc2be3e.jpg', 0),
(16, 'Bali 4D + 1N (54)', 'siswa', 54, 'Tanah Lot, Tanjung Benoa, Pantai Kuta, Pantai Pandawa, Pusat Oleh-oleh khas Bali, Joger, Bedugul (Pura Candi Kuning), Khrisna, Tari Barong.', '<ul><li><strong>Bus Pariwisata</strong> : Rec. Seat (2-2,2-3), AC, TV, Video, Mic</li><li><strong>Hotel </strong>: Bintang 3, 1 kamar / 4 orang</li><li><strong>Makan </strong>: Bali Paket 4 Hari Inap 1 Malam untuk makan 8x (Prasmanan dan Box (dikondisikan)&nbsp;</li><li>Persediaan Air Minum selama perjalanan. (club tanggung 600 ml)</li><li>Persediaan P3K.</li><li>Spanduk kegiatan.</li><li>Biaya Tol, Parkir dan Retribusi Jalan.</li><li>Tour Leader tiap bus.</li><li>Biaya Penyeberangan PP (khusus Bali)</li><li>Guide local (khusus Bali)</li><li>Sopir yang berpengalaman dan sabar.</li></ul>', 585000, 'bb18360cb35fc7e9717575d98b7bf21f.jpg', 0),
(17, 'Bali 4D + 1N (59)', 'siswa', 59, 'Tanah Lot, Tanjung Benoa, Pantai Kuta, Pantai Pandawa, Pusat Oleh-oleh khas Bali, Joger, Bedugul (Pura Candi Kuning), Khrisna, Tari Barong.', '<ul><li><strong>Bus Pariwisata</strong> : Rec. Seat (2-2,2-3), AC, TV, Video, Mic</li><li><strong>Hotel </strong>: Bintang 3, 1 kamar / 4 orang</li><li><strong>Makan </strong>: Bali Paket 4 Hari Inap 1 Malam untuk makan 8x (Prasmanan dan Box (dikondisikan)&nbsp;</li><li>Persediaan Air Minum selama perjalanan. (club tanggung 600 ml)</li><li>Persediaan P3K.</li><li>Spanduk kegiatan.</li><li>Biaya Tol, Parkir dan Retribusi Jalan.</li><li>Tour Leader tiap bus.</li><li>Biaya Penyeberangan PP (khusus Bali)</li><li>Guide local (khusus Bali)</li><li>Sopir yang berpengalaman dan sabar.</li></ul>', 555000, 'b5b4dad4d203b77e73c3c318eaf66fad.jpg', 0),
(18, 'Bali 5D+2N (44)', 'umum', 44, 'Tanah Lot, Tanjung Benoa, Pantai Kuta, Pantai Pandawa, Desa Panglipuran, Puja Mandala, Pusat Oleh-oleh khas Bali, Joger, Bedugul (Pura Candi Kuning), Khrisna, Tari Barong.', '<ul><li><strong>Bus Pariwisata</strong> : Rec. Seat (2-2), AC, TV, Video, Mic</li><li><strong>Hotel </strong>: Bintang 3, 1 kamar / 3 orang</li><li><strong>Makan</strong> : Bali Paket 5 Hari Inap 2 Malam untuk makan 10x (Prasmanan dan Box (dikondisikan))</li><li>Persediaan Air Minum selama perjalanan. (club tanggung 600 ml)</li><li>Persediaan P3K.</li><li>Spanduk kegiatan.</li><li>Biaya Tol, Parkir dan Retribusi Jalan.</li><li>Tour Leader tiap bus.</li><li>Biaya Penyeberangan PP (khusus Bali)</li><li>Guide local (khusus Bali)</li><li>Sopir yang berpengalaman dan sabar</li></ul>', 1070000, 'c26b83ef0a03e31f4587fa34496759bf.jpg', 0),
(19, 'Bali 5D+2N (50)', 'umum', 50, 'Tanah Lot, Tanjung Benoa, Pantai Kuta, Pantai Pandawa, Desa Panglipuran, Puja Mandala, Pusat Oleh-oleh khas Bali, Joger, Bedugul (Pura Candi Kuning), Khrisna, Tari Barong.', '<ul><li><strong>Bus Pariwisata</strong> : Rec. Seat (2-2), AC, TV, Video, Mic</li><li><strong>Hotel </strong>: Bintang 3, 1 kamar / 3 orang</li><li><strong>Makan</strong> : Bali Paket 5 Hari Inap 2 Malam untuk makan 10x (Prasmanan dan Box (dikondisikan))</li><li>Persediaan Air Minum selama perjalanan. (club tanggung 600 ml)</li><li>Persediaan P3K.</li><li>Spanduk kegiatan.</li><li>Biaya Tol, Parkir dan Retribusi Jalan.</li><li>Tour Leader tiap bus.</li><li>Biaya Penyeberangan PP (khusus Bali)</li><li>Guide local (khusus Bali)</li><li>Sopir yang berpengalaman dan sabar</li></ul>', 1000000, 'caaa07f7580a579fd2be5b99ab2a0e58.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rekening`
--

CREATE TABLE `tb_rekening` (
  `idrekening` int(11) NOT NULL,
  `rekening_no` varchar(25) NOT NULL,
  `rekening_bank` varchar(50) NOT NULL,
  `rekening_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rekening`
--

INSERT INTO `tb_rekening` (`idrekening`, `rekening_no`, `rekening_bank`, `rekening_nama`) VALUES
(1, '010901006258538', 'BRI', 'HERY INDARNO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_request_paket`
--

CREATE TABLE `tb_request_paket` (
  `id_request_paket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_bus` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `id_fasilitas` int(11) NOT NULL,
  `id_objek_wisata` varchar(11) NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_request_paket`
--

INSERT INTO `tb_request_paket` (`id_request_paket`, `id_user`, `id_bus`, `id_hotel`, `id_fasilitas`, `id_objek_wisata`, `harga_paket`, `created`) VALUES
(48, 21, 5, 9, 4, '30,31,32,33', 2215000, '2020-07-06 14:58:03'),
(49, 21, 6, 12, 5, '30,31,32,33', 1515000, '2020-07-06 15:46:12'),
(50, 21, 5, 9, 4, '30', 2115000, '2020-07-06 16:05:18'),
(51, 24, 5, 15, 5, '33', 1480000, '2020-07-07 22:19:58'),
(52, 34, 5, 16, 4, '31,32', 1370000, '2020-07-08 18:43:44'),
(53, 34, 5, 16, 4, '31,32', 1370000, '2020-07-08 18:44:48'),
(54, 21, 7, 14, 4, '30,31,32,33', 2095000, '2020-07-10 06:00:20'),
(55, 21, 5, 12, 4, '30,31,32,33', 1515000, '2020-07-10 11:30:06'),
(56, 21, 5, 9, 4, '30,31,32,33', 2215000, '2020-07-10 14:13:43'),
(57, 21, 6, 14, 4, '30,31,32,33', 2065000, '2020-07-10 16:32:44'),
(58, 25, 5, 9, 4, '30,31,32,33', 2173000, '2020-07-13 22:09:07'),
(59, 21, 16, 34, 5, '40,41,42,43', 380000, '2020-07-14 06:30:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_titik_jemput`
--

CREATE TABLE `tb_titik_jemput` (
  `id_titik_jemput` int(11) NOT NULL,
  `id_kantor_cabang` int(11) NOT NULL,
  `titik_jemput` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_titik_jemput`
--

INSERT INTO `tb_titik_jemput` (`id_titik_jemput`, `id_kantor_cabang`, `titik_jemput`) VALUES
(18, 11, 'Lamongan'),
(19, 11, 'Bojonegoro'),
(20, 11, 'Ngawi'),
(21, 11, 'Magetan'),
(22, 11, 'Ponorogo'),
(23, 11, 'Pacitan'),
(24, 11, 'Madiun'),
(25, 11, 'Jombang'),
(26, 11, 'Tuban'),
(27, 11, 'Gresik'),
(28, 13, 'Surabaya'),
(29, 13, 'Pasuruan'),
(30, 13, 'Mojokerto'),
(31, 12, 'Probolinggo'),
(32, 13, 'Bangkalan'),
(33, 13, 'Sampang'),
(34, 13, 'Pamekasan'),
(35, 13, 'Sumenep'),
(36, 13, 'Trenggalek'),
(37, 13, 'Tulungagung'),
(38, 12, 'Malang'),
(39, 12, 'Batu'),
(40, 12, 'Blitar'),
(41, 12, 'Lumajang'),
(42, 12, 'Jember'),
(43, 12, 'Banyuwangi'),
(44, 12, 'Bondowoso'),
(45, 12, 'Situbondo'),
(46, 12, 'Kediri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kd_transaksi` varchar(25) NOT NULL,
  `id_booking` int(11) NOT NULL,
  `gambar_bukti` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `kd_transaksi`, `id_booking`, `gambar_bukti`, `status`) VALUES
(73, 'KD1593929406.7713', 120, '25bc25806fa920e49cdeb5e08ba63354.jpg', 'Selesai'),
(75, 'KD1594021581.6745', 122, '201cabc4a798fda5dc3e55297c442644.jpg', 'Selesai'),
(76, 'KD1594022293.7309', 124, 'ef89c34eb8853563b3eb381d7db593ec.jpg', 'Selesai'),
(77, 'KD1594022496.783', 125, 'a178e4c5376276ad35ccd4dce3f47f69.jpg', 'Selesai'),
(79, 'KD1594025180.1196', 126, '6b601048bc484279284d6585d5b6ba5a.jpg', 'Selesai'),
(80, 'KD1594101278.9855', 127, 'null', 'Dibatalkan'),
(81, 'KD1594178765.4452', 130, 'null', 'Selesai'),
(82, 'KD1594180569.8536', 131, 'null', 'Menunggu Pembayaran'),
(83, 'KD1594188058.5459', 132, 'null', 'Menunggu Pembayaran'),
(84, 'KD1594200261.9781', 133, 'null', 'Menunggu Pembayaran'),
(85, 'KD1594200462.9024', 135, 'null', 'Menunggu Pembayaran'),
(86, 'KD1594208062.1067', 136, 'null', 'Menunggu Pembayaran'),
(87, 'KD1594335683.6576', 138, '9fbf401486b418cbf493ea6fee7d0af4.jpg', 'Selesai'),
(88, 'KD1594345258.0261', 139, 'null', 'Selesai'),
(89, 'KD1594345566.6256', 140, 'null', 'Menunggu Pembayaran'),
(90, 'KD1594352845.228', 141, 'null', 'Dibatalkan'),
(91, 'KD1594354896.3987', 142, '987f97d4e3c9f7a43918de72c01f6586.jpg', 'Menunggu Verifikasi'),
(92, 'KD1594364833.6371', 144, '0083b56f115342ef130e5a94e47a54cc.jpg', 'Selesai'),
(93, 'KD1594365305.078', 145, 'null', 'Menunggu Pembayaran'),
(94, 'KD1594373209.5463', 146, '5110e5b6c2c5f2345385915d4b50812a.jpg', 'Selesai'),
(95, 'KD1594373670.964', 148, 'null', 'Menunggu Pembayaran'),
(96, 'KD1594440048.4288', 149, '709863ecec1a4d1020d1eba3ff145aa4.jpg', 'Selesai'),
(98, 'KD1594653511.6091', 151, 'null', 'Menunggu Validasi Paket'),
(99, 'KD1594683045.7152', 152, '28bad3d9c0d64fcca811ac2d9df5a857.jpg', 'Selesai'),
(100, 'KD1594691448.5522', 153, 'c26c54db93a5ed98049774021fcffe46.jpg', 'Proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(25) NOT NULL,
  `nm_depan` text NOT NULL,
  `nm_belakang` text NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto_ktp` text NOT NULL,
  `is_active` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nm_depan`, `nm_belakang`, `username`, `password`, `email`, `foto_ktp`, `is_active`) VALUES
(20, 'Ridjal', 'Fathoni', 'ridjal_fathoni', '0cef1fb10f60529028a71f58e54ed07b', 'ridjaltest@gmail.com', '', 'active'),
(21, 'Tony Andhika', 'Mahendra', 'tonyadhkam', '8fb17cb184cad8458e0cd14af6264d0d', 'tonyandhika20@gmail.com', '', 'active'),
(22, 'Muhammad Bagus', 'Seputro', 'baguseputro', '6eea9b7ef19179a06954edd0f6c05ceb', 'baguseputro03@gmail.com', '', 'active'),
(23, 'Eko', 'Utomo', 'utomoe998@gmail.com', 'ebc1afdf2fc5f797e335bf3787e38307', 'utomoe998@gmail.com', '', 'active'),
(24, 'Juliant', 'Perdana', 'joe123', '50d1b87fb44094fe7485bdd2b292f83c', 'joe@gmail.com', '', 'active'),
(25, 'Winda', 'Eka', 'windaeka', '05e34fb81599a32b5ff2d9e54a898d09', 'windaekaf22@gmail.com', '', 'active'),
(26, 'DIAH AYU', 'ANGGRAINI', 'diahanggraini', 'f7811db90d2dc7058b8416e2eaf5e795', 'diahanggraini2301@gmail.com', '', 'active'),
(27, 'Meiga', 'Rahmania', 'meigarahmania', 'ba68f770d50d43d0f6aca64bdcaef69a', 'meigarahmania31@gmail.com', '', 'active'),
(28, 'Husnul', 'Hotimah', 'husnulht', 'f468f7176cf2bb5504bc2f04db1e3b18', 'husnulhotimah247@gmail.com', '', 'active'),
(29, 'Erina', 'Ang', 'Errr', '52d4d577066670caf2a663765044c70f', 'Erinakece@gmail.com', '', 'active'),
(30, 'Gustaf', 'Alfian', 'Alfian', 'cd2bee04c203a0c13ec5b04a77216f9a', 'Yogisuhendar929@gmail.com', '', 'active'),
(31, 'Alvin', 'Gara', 'alvingara', '07100c7b55acfcebf24c95bee07b4919', 'alvingara32@gmail.com', '', 'active'),
(32, 'Reyhan', 'Almer', 'Reyhan', '541e9ad19d88ab619b9d1f5e9c7cb321', 'reyhanalmer99@gmail.com', '', 'active'),
(33, 'Marchanda', 'Sukma', 'Cacasukma', '04217c4d7e246e38b0d7014ee109755b', 'marchandasukma16@gmail.com', '', 'active'),
(34, 'Dwi', 'Ratna', 'Ratna', '552d89af063a62ecf0f08139e55098c9', 'dwiratna5421@gmail.com', '', 'active'),
(35, 'Birawan', 'rara', 'birawanrara', 'fa666cf010a9f47703b95165af268cc3', 'birawanrara@gmail.com', '', 'active'),
(36, 'Birawan', 'rara', 'birawan', 'fa666cf010a9f47703b95165af268cc3', 'birawanrara@gmail.com', '', 'active'),
(37, 'PEPE', 'PRASETYAWAN', 'PEPE PRASETYAWAN', 'e10adc3949ba59abbe56e057f20f883e', 'Pepeprasetyawan09.@gmail.com', '', 'active'),
(39, 'Aprilian', 'Maemunah', 'apriliantri', '827ccb0eea8a706c4c34a16891f84e7b', 'aprilianwicaksono90@gmail.com', '', 'active'),
(40, 'Siti', 'Fitria', 'sitifitria20', '5c2e4a2563f9f4427955422fe1402762', 'sitifitria20@gmail.com', '', 'active'),
(43, 'test', 'foto', 'test_foto', '21232f297a57a5a743894a0e4a801fc3', 'test_a1@gmail.com', '37fb4eee1598ada40195051d2d8b17b2.png', 'active');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indeks untuk tabel `tb_bus`
--
ALTER TABLE `tb_bus`
  ADD PRIMARY KEY (`id_bus`);

--
-- Indeks untuk tabel `tb_daftar_paket`
--
ALTER TABLE `tb_daftar_paket`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indeks untuk tabel `tb_detail_booking`
--
ALTER TABLE `tb_detail_booking`
  ADD PRIMARY KEY (`id_detail_booking`);

--
-- Indeks untuk tabel `tb_hotel`
--
ALTER TABLE `tb_hotel`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indeks untuk tabel `tb_info_wisata`
--
ALTER TABLE `tb_info_wisata`
  ADD PRIMARY KEY (`id_info_wisata`);

--
-- Indeks untuk tabel `tb_kantor_cabang`
--
ALTER TABLE `tb_kantor_cabang`
  ADD PRIMARY KEY (`id_kantor_cabang`);

--
-- Indeks untuk tabel `tb_objek_wisata`
--
ALTER TABLE `tb_objek_wisata`
  ADD PRIMARY KEY (`id_objek`);

--
-- Indeks untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket_wisata`);

--
-- Indeks untuk tabel `tb_rekening`
--
ALTER TABLE `tb_rekening`
  ADD PRIMARY KEY (`idrekening`);

--
-- Indeks untuk tabel `tb_request_paket`
--
ALTER TABLE `tb_request_paket`
  ADD PRIMARY KEY (`id_request_paket`),
  ADD KEY `id_bus` (`id_bus`),
  ADD KEY `id_hotel` (`id_hotel`),
  ADD KEY `id_fasilitas` (`id_fasilitas`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_titik_jemput`
--
ALTER TABLE `tb_titik_jemput`
  ADD PRIMARY KEY (`id_titik_jemput`),
  ADD KEY `id_kantor_cabang` (`id_kantor_cabang`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_booking`
--
ALTER TABLE `tb_booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT untuk tabel `tb_bus`
--
ALTER TABLE `tb_bus`
  MODIFY `id_bus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_daftar_paket`
--
ALTER TABLE `tb_daftar_paket`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_booking`
--
ALTER TABLE `tb_detail_booking`
  MODIFY `id_detail_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `tb_hotel`
--
ALTER TABLE `tb_hotel`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `tb_info_wisata`
--
ALTER TABLE `tb_info_wisata`
  MODIFY `id_info_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_kantor_cabang`
--
ALTER TABLE `tb_kantor_cabang`
  MODIFY `id_kantor_cabang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_objek_wisata`
--
ALTER TABLE `tb_objek_wisata`
  MODIFY `id_objek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id_paket_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_rekening`
--
ALTER TABLE `tb_rekening`
  MODIFY `idrekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_request_paket`
--
ALTER TABLE `tb_request_paket`
  MODIFY `id_request_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `tb_titik_jemput`
--
ALTER TABLE `tb_titik_jemput`
  MODIFY `id_titik_jemput` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_request_paket`
--
ALTER TABLE `tb_request_paket`
  ADD CONSTRAINT `tb_request_paket_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `tb_hotel` (`id_hotel`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_request_paket_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_request_paket_ibfk_4` FOREIGN KEY (`id_bus`) REFERENCES `tb_bus` (`id_bus`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_request_paket_ibfk_5` FOREIGN KEY (`id_fasilitas`) REFERENCES `tb_daftar_paket` (`id_fasilitas`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_titik_jemput`
--
ALTER TABLE `tb_titik_jemput`
  ADD CONSTRAINT `tb_titik_jemput_ibfk_1` FOREIGN KEY (`id_kantor_cabang`) REFERENCES `tb_kantor_cabang` (`id_kantor_cabang`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
