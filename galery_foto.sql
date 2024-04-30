-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Apr 2024 pada 09.43
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galery_foto`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `AlbumID` int(11) NOT NULL,
  `NamaAlbum` varchar(255) NOT NULL,
  `Deskripsi` text NOT NULL,
  `TanggalDibuat` date NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`AlbumID`, `NamaAlbum`, `Deskripsi`, `TanggalDibuat`, `UserID`) VALUES
(7, 'Pegunungan', 'Pegunungan yang ada di Indonesia dan tidak asing bagi kita semua. Dan gunung yang terkenal', '2024-02-29', 5),
(8, 'Hewan', 'Hewan, binatang, atau satwa adalah organisme eukariotik multiseluler yang membentuk kerajaan biologi Animalia. Dengan sedikit pengecualian, hewan mengonsumsi bahan organik, menghirup oksigen, dapat bergerak, bereproduksi secara seksual, dan tumbuh dari bola sel yang berongga, blastula, selama fase perkembangan embrio.', '2024-02-29', 5),
(12, 'Bunga', 'bunga adalah tanaman hias ', '2024-03-08', 6),
(13, 'Tempat wisata', 'Tempat wisata adalah tempat yang sering di kunjungi dan memiliki keindangan tempatnya', '2024-03-08', 6),
(14, 'Motor', 'Kendaraan yang sangat banyak dan beragam. Motor biasanya banyak digunakan untuk berpergian ataupun di pakai untuk mencari nafkah.', '2024-03-17', 7),
(15, 'Tanaman', 'Hanya untuk tanaman ', '2024-03-19', 8),
(18, 'Tempat wisata', 'Tempat wisata Badung', '2024-04-23', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `FotoID` int(11) NOT NULL,
  `JudulFoto` varchar(255) NOT NULL,
  `DeskripsiFoto` text NOT NULL,
  `TanggalUnggah` date NOT NULL,
  `NamaFile` varchar(255) NOT NULL,
  `AlbumID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`FotoID`, `JudulFoto`, `DeskripsiFoto`, `TanggalUnggah`, `NamaFile`, `AlbumID`, `UserID`) VALUES
(11, 'Gunung Tangkuban Parahu', 'Gunung Tangkuban Parahu adalah salah satu gunung yang terletak di Desa Ciater, Kabupaten Subang, Provinsi Jawa Barat, Indonesia. Sekitar 20 km ke arah utara Kota Bandung, dengan rimbun pohon pinus dan hamparan kebun teh di sekitarnya, Gunung Tangkuban Parahu mempunyai ketinggian setinggi 2.084 meter.', '2024-02-29', 'gunung tangkuban parahu.jpg', 7, 5),
(12, 'Burung Murai Batu ', 'Burung murai batu (Copsychus malabaricus) adalah anggota keluarga Turdidae. Burung keluarga Turdidae dikenal memiliki kemampuan suara yang baik dan merdu. Kepopuleran burung murai batu tidak hanya dari segi suaranya yang menarik tapi juga dari gaya bertarungnya yang bisa atraktif dengan tarian ekornya (Munandi, 2011).', '2024-02-29', '484e5aa3ee87dc086f266317161a7347.jpg', 8, 5),
(14, 'Jerapah', 'Jerapah atau zarafah adalah mamalia berkuku genap endemik Afrika dan merupakan spesies hewan tertinggi yang hidup di darat. Jerapah jantan dapat mencapai tinggi 4,8 sampai 5,5 meter dan memiliki berat yang dapat mencapai 1.360 kilogram. Jerapah betina biasanya sedikit lebih pendek dan lebih ringan.', '2024-02-29', 'd61557a4119a9808e06b4b7c37231def.jpg', 8, 5),
(15, 'Gunung Bromo', 'Gunung Bromo atau dalam bahasa Tengger dieja \"Brama\", juga disebut Kaldera Tengger, adalah sebuah gunung berapi aktif di Jawa Timur, Indonesia. Gunung ini memiliki ketinggian 2.329 meter di atas permukaan laut dan berada dalam empat wilayah kabupaten, yakni Kabupaten Probolinggo, Kabupaten Pasuruan, Kabupaten Lumajang, dan Kabupaten Malang. Gunung Bromo terkenal sebagai objek wisata utama di Jawa Timur. Sebagai sebuah objek wisata, Bromo menjadi menarik karena statusnya sebagai gunung berapi yang masih aktif. Gunung Bromo termasuk dalam kawasan Taman Nasional Bromo Tengger Semeru.', '2024-02-29', 'gunung bromo.jpg', 7, 5),
(16, 'Gunung Merapi', 'Gunung Merapi (ketinggian puncak 2.930 mdpl, per 2010) (Jawa: ???????????, translit. Gunung M?rapi) adalah gunung berapi di bagian tengah Pulau Jawa dan merupakan salah satu gunung api teraktif di Indonesia. Lereng sisi selatan berada dalam administrasi Kabupaten Sleman, Daerah Istimewa Yogyakarta, dan sisanya berada dalam wilayah Provinsi Jawa Tengah, yaitu Kabupaten Magelang di sisi barat, Kabupaten Boyolali di sisi utara dan timur, serta Kabupaten Klaten di sisi tenggara. ', '2024-02-29', 'gunung merapi.jpg', 7, 5),
(17, 'Gunung Sumbing', 'Gunung Sumbing adalah gunung api yang terdapat di Jawa Tengah, Indonesia. (Ketinggian puncak 3.371 mdpl), gunung Sumbing merupakan gunung tertinggi ketiga di Pulau Jawa setelah Gunung Semeru dan Gunung Slamet. Gunung ini secara administratif terletak di tiga wilayah kabupaten, yaitu Kabupaten Magelang; Kabupaten Temanggung; dan Kabupaten Wonosobo.', '2024-02-29', 'gn sumbing.jpg', 7, 5),
(18, 'Gunung Sindoro', 'Gunung Sindoro atau Gunung Sundoro (puncak ketinggian 3.153 mdpl) (Jawa: ???????????, translit. Gunung Sundara) merupakan sebuah gunung volkano aktif yang terletak di Jawa Tengah, Indonesia, dengan Temanggung sebagai kota terdekat. Gunung Sindoro terletak berdampingan dengan Gunung Sumbing. Gunung sindara dapat terlihat jelas dari puncak sikunir dieng', '2024-02-29', 'gunung sindoro.jpg', 7, 5),
(19, 'Bunga Mawar', 'bunga mawar ini memiliki duri di batangnya yang berfungsi untuk melindungi dirinya ', '2024-03-08', 'bunga mawar.jpg', 12, 6),
(20, 'Bunga melati ', 'Bunga melati ini memiliki wangi yang khas dan sering dipakai untuk campuran teh', '2024-03-08', 'bunga melati.jpg', 12, 6),
(21, 'Bunga matahari', 'Bunga ini memiliki bunga yang lebar dan memiliki biji yang bisa di produksi untuk bisa dimakan', '2024-03-08', 'bunga matahari.jpg', 12, 6),
(22, 'Bunga sakura', 'Bunga sakura ini banyak di sukai karena keindahan daunnya', '2024-03-08', 'sakura.jpg', 12, 6),
(23, 'Bunga kamboja', 'Bunga ini memiliki manfaat sebagai parfum alami, dapat meredakan demam, menghentikan batuk, melancarkan air seni, menghentikan diare. Keunikan dari tanaman ini adalah bunganya yang bisa rontok ketika masih sangat wangi dan belum layu.', '2024-03-08', 'bunga kamboja.jpg', 12, 6),
(24, 'Taman Bunga Nusantara', 'Di lokasi wisata taman bunga nusantara cianjur ini telah tersedia begitu banyak fasilitas demi kenyamanan pengunjung seperti fasilitas dotto train, mobil wira wiri', '2024-03-08', 'taman bunga nusantara.jpg', 13, 6),
(25, 'Curug Ciparay', 'Curug Ciparay Kp.Raina Ciputri Rt 05/08, Ciasihan, Kec. Pamijahan, Kabupaten Bogor, Jawa Barat 16810', '2024-03-08', 'curug ciparay.jpg', 13, 6),
(26, 'DCastello', 'tempat wisata ini terletak di Subang Jawa barat, Indonesia', '2024-03-08', 'dcastello.jpg', 13, 6),
(28, 'Motor vario', 'Motor vario\r\n150 cc\r\n', '2024-03-17', 'motor vario.jpg', 14, 7),
(29, 'Motot beat ', 'Motor beat tahun 2021, atau yang kita kenal dengan beat delluxe', '2024-03-17', 'motor beat.jpg', 14, 7),
(30, 'Motor yamaha R1', 'Motor yamaha R1 adalah motor sport yang di produksi sejak tahun 1998 sampai sekarang', '2024-03-17', 'motor yamaha R1.jpg', 14, 7),
(31, 'Motor Kawasaki ZX25R', 'Motor Kawasaki ZX25R adalah motor sport bermesin 249,8 cc dengan konfigurasi 4 silinder segaris yang diproduksi oleh kawasaki di Indonesia dan Thailand sebagai penerus Ninja ZX-2R/ZXR250 yang diproduksi pada tahun 1988 sampai 1997', '2024-03-17', 'motor zx25r.jpg', 14, 7),
(32, 'Buket  Mawar', 'buket bunga', '2024-03-19', 'bunga mawar.jpg', 15, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `KomentarID` int(11) NOT NULL,
  `FotoID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `IsiKomentar` text NOT NULL,
  `TanggalKomentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`KomentarID`, `FotoID`, `UserID`, `IsiKomentar`, `TanggalKomentar`) VALUES
(4, 11, 9, 'alus euy', '2024-03-19'),
(12, 12, 5, 'mantap', '2024-04-04'),
(14, 28, 5, 'Keren', '2024-04-04'),
(15, 29, 5, 'Abis berapa bang?', '2024-04-04'),
(18, 0, 0, '', '2024-04-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `likefoto`
--

CREATE TABLE `likefoto` (
  `LikeID` int(11) NOT NULL,
  `FotoID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `TanggalLike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `likefoto`
--

INSERT INTO `likefoto` (`LikeID`, `FotoID`, `UserID`, `TanggalLike`) VALUES
(6, 32, 8, '2024-03-19'),
(12, 12, 5, '2024-04-04'),
(15, 18, 5, '2024-04-23'),
(18, 11, 5, '2024-04-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `NamaLengkap` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Email`, `NamaLengkap`, `Alamat`, `role`) VALUES
(5, 'iden2', '827ccb0eea8a706c4c34a16891f84e7b', 'idenanggara@gmail.com', 'iden anggara', 'parongpong', 'user'),
(6, 'uneng', '27946274a201346f0322e3861909b5ff', 'karlinauneng@gmail.com', 'karlina uneng', 'pojok tengah', 'user'),
(7, 'Bagus', 'b8a57c9bbb3aac33f386efadacfb6b09', 'bagussofyan11@gmail.com', 'Bagus sofyan', 'Cimahi', 'user'),
(10, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin11@gmail.com', 'admin', 'kp. kancah', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`AlbumID`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`FotoID`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`KomentarID`);

--
-- Indeks untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`LikeID`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `AlbumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `FotoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `KomentarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `LikeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
