-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 03 Des 2015 pada 13.18
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `db_freshmart`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_user` int(2) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(20) NOT NULL,
  `alamat_user` text NOT NULL,
  `tlp` double NOT NULL,
  `pass` varchar(36) NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_user`, `nama_user`, `alamat_user`, `tlp`, `pass`, `email`) VALUES
(1, 'Admin', 'Jl.raya pondok gede, bekasi', 81287747040, '21232f297a57a5a743894a0e4a801fc3', 'anggaadityasundawaa@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE IF NOT EXISTS `detail_transaksi` (
  `id_detailtrans` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(8) NOT NULL,
  `id_produk` varchar(8) NOT NULL,
  `produk_transaksi` varchar(20) NOT NULL,
  `harga_transaksi` double NOT NULL,
  `qty_transaksi` int(3) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  PRIMARY KEY (`id_detailtrans`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=168 ;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detailtrans`, `id_transaksi`, `id_produk`, `produk_transaksi`, `harga_transaksi`, `qty_transaksi`, `tgl_transaksi`) VALUES
(159, 'TRX00001', '8', 'Jeruk', 15000, 2, '2015-09-25'),
(160, 'TRX00001', '13', 'Wortel', 8000, 4, '2015-09-25'),
(164, 'TRX00002', '10', 'Nanas', 14000, 1, '2015-11-03'),
(165, 'TRX00002', '8', 'Jeruk', 15000, 2, '2015-11-03'),
(166, 'TRX00003', '13', 'Wortel', 8000, 1, '2015-11-21'),
(167, 'TRX00003', '17', 'Jambu', 17000, 7, '2015-11-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `id_info` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(8) NOT NULL,
  `nama_artikel` varchar(20) NOT NULL,
  `kategori` varchar(6) NOT NULL,
  `foto_artikel` varchar(20) NOT NULL,
  `ket` text NOT NULL,
  `hari` int(2) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `tgl_artikel` date NOT NULL,
  PRIMARY KEY (`id_info`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `info`
--

INSERT INTO `info` (`id_info`, `id_user`, `nama_artikel`, `kategori`, `foto_artikel`, `ket`, `hari`, `bulan`, `tgl_artikel`) VALUES
(1, 'Admin', 'Jeruk', 'Buah', 'jeruk.jpg', 'Manfaat buah jeruk sangat penting untuk kesehatan tubuh manusia, buah yang kaya vitamin C ini dapat membuat tubuh lebih sehat. Jeruk merupakan salah satu jenis buah-buahan yang  dapat dengan mudah kita temui di pasar-pasar tradisional hingga swalayan.\r\n\r\nmanfaat jeruk\r\n\r\nSelain dikonsumsi langsung, buah jeruk juga sangat banyak diolah menjadi berbagai produk-produk. Hal Ini karena buah jeruk merupakan tanaman yang banyak dibudidayakan, sehingga mudah untuk mendapatkannya. Jeruk juga menjadi buah yang banyak dikonsumsi di berbagai variasinya seperti jeruk nipis, lemon dan jeruk bali.\r\n\r\nBuaj jeruk yang anda konsumsi saat ini pasti memiliki nutrisi sehat bagi kesehatan. Jeruk memiliki kandungan gizi sempurna sebagai buah yang memiliki nutrisi paling sehat dalam tubuh.\r\n\r\n<h4>Kandungan Gizi</h4>\r\n\r\nJeruk memiliki berbagai kandungan gizi yang sangat tinggi, tidak hanya vitamin C dalam 180 gr buah jeruk, juga terdapat nutrisi lainnya seperti\r\n\r\n<li>Protein</li>\r\n<li>kalori</li>\r\n<li>serat yang sangat tinggi</li>\r\nNah, selain mengandung nutrisi yang paling baik untuk tubuh yang sangat populer seperti Vitamin C. Jeruk mengandung sejuta gizi dan mineral yang penting untuk perkembangan gizi anak dan dewasa.\r\n\r\nBerikut data lengkap kandungan gizi dalam sebuah jeruk.', 22, 'Juli', '2015-07-22'),
(2, 'Admin', 'Wortel', 'Sayur', 'wortel.jpg', '<p>Manfaat Wortel sangat beragam, tidak hanya untuk kesehatan tapi juga dapat digunakan untuk berbagai kebutuhan lainnya, Wortel merupakan sayuran yang sangat berkhasiat. Wortel yang secara luas dikenal sebagai sumber vitamin A, ternyata memiliki segudang manfaat lain. Tentu saja apabila sayuran bewarna oranye ini, dikonsumsi secara rutin. Sama seperti manfaat buah dan sayuran pada umumnya, manfaat wortel ini juga sangat banyak untuk kesehatan tubuh manusia. Sebelum menyimak berbagai manfaat wortel, ada baiknya mengenai berbagai kandungan nutrisi yang terdapat di dalamnya.</p>\r\n\r\n<h4>Kandungan Gizi Wortel</h4>\r\n\r\n<p>Menurut dpertemen pertanian Amerika, satu wortel berukuran sedang atau 1/2 cangkir wortel cincang dapat dianggap sebagai satu porsi. Satu porsi wortel memiliki kandungan 25 kalori, 6 gram karbohidrat, 3 gram gula dan 1 gram protein.</p>\r\n\r\n<h4>Wortel kaya akan vitamin A</h4>\r\n\r\n<p>Wortel adalah makanan yang paling kaya akan vitamin A, menyediakan sekitar 210% dari kebutuhan orang dewasa per hari. Wortel juga mengandung 6% dari kebutuhan vitamin C, 2% dari kebutuhan kalsium dan 2% dari kebutuhan zat besi per porsinya.</p>\r\n\r\n<h4>Antioksidan</h4>\r\n\r\n<p>Sayuran ini memiliki kandungan antioksidan beta-karoten yang menjadikan wortel memiliki warna oranye yang cukup terang. Beta-karoten diserap dalam usus dan diubah menjadi vitamin A selama proses pencernaan.</p>\r\n\r\n<h4>Kandungan Vitamin dan Mineral</h4>\r\n\r\n<p>Wortel merupapakan sayuran yang sangat super, ia juga mengandung serat, vitamin K, kalium, folat, mangan, fosfor, magnesium, vitamin E dan seng yang sangat dibutuhkan oleh tubuh manusia.</p>\r\n', 22, 'Juli', '2015-09-15'),
(3, 'Admin', 'Pisang', 'Buah', 'pisang.jpg', 'Pisang adalah salah satu buah yang paling banyak dikonsumsi di dunia untuk alasan yang baik. Buah kuning berbentuk melengkung yang dibungkus dengan segudang gizi besar. Pisang tumbuh setidaknya disekitar 107 negara dan menempati peringkat keempat di antara dunia tanaman pangan yang di nilai secara moneter.\r\n\r\nManfaat kesehatan yang mungkin didapatkan dari mengkonsumsi pisang termasuk menurunkan risiko kanker, asma, menurunkan tekanan darah dan  meningkatkan kesehatan jantung. Rincian gizi pisang ukuran sedang (sekitar 126 gram) dianggap satu porsi. Satu porsi pisang mengandung 110 kalori, 30 gram karbohidrat dan 1 gram protein. Selain itu, pisang menyediakan berbagai vitamin dan mineral :<br>\r\n<li>Vitamin B6 - 0,5 mg</li>\r\n<li>Mangan - 0,3 mg</li>\r\n<li>Vitamin C - 9 mg</li>\r\n<li>Kalium - 450 mg</li>\r\n<li>Serat - 3g</li>\r\n<li>Protein - 1 g</li>\r\n<li>Magnesium - 34 mg</li>\r\n<li>Folat - 25.0 mcg</li>\r\n<li>Riboflavin - 0,1 mg</li>\r\n<li>Niacin - 0,8 mg</li>\r\n<li>Vitamin A - 81 IU</li>\r\n<li>Besi - 0,3 mg</li>', 22, 'Juli', '2015-07-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` varchar(8) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('Buah', 'Buah-buahan'),
('Sayur', 'Sayur-sayuran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE IF NOT EXISTS `keranjang` (
  `id_keranjang` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` varchar(8) NOT NULL,
  `produk_keranjang` varchar(20) NOT NULL,
  `harga_keranjang` double NOT NULL,
  `diskon_keranjang` int(2) NOT NULL,
  `qty_keranjang` int(3) NOT NULL,
  `tgl_keranjang` date NOT NULL,
  PRIMARY KEY (`id_keranjang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_produk`, `produk_keranjang`, `harga_keranjang`, `diskon_keranjang`, `qty_keranjang`, `tgl_keranjang`) VALUES
(1, '13', 'Wortel', 8000, 0, 2, '2015-11-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE IF NOT EXISTS `konfirmasi` (
  `id_konfrim` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(8) NOT NULL,
  `nama_pembeli` varchar(20) NOT NULL,
  `jumlah_transaksi` double NOT NULL,
  `tgl_konfirmasi` date NOT NULL,
  `gambar` text NOT NULL,
  PRIMARY KEY (`id_konfrim`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfrim`, `id_transaksi`, `nama_pembeli`, `jumlah_transaksi`, `tgl_konfirmasi`, `gambar`) VALUES
(3, 'TRX00001', 'Angga aditya sundawa', 93000, '2015-08-09', '186d8ce5023a6d9912b68e10b668ddf4.jpg'),
(4, 'TRX00003', 'angga aditya sundawa', 50000, '2015-11-21', 'AAS.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_pesan`
--

CREATE TABLE IF NOT EXISTS `lokasi_pesan` (
  `id_lokasi` varchar(6) NOT NULL,
  `nama_lokasi` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi_pesan`
--

INSERT INTO `lokasi_pesan` (`id_lokasi`, `nama_lokasi`) VALUES
('JAKSEL', 'Jakarta Selatan'),
('JAKUT', 'Jakarta Utara'),
('JAKTIM', 'Jakarta Timur'),
('JAKBAR', 'Jakarta Barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id_member` varchar(8) NOT NULL,
  `nama_akun` varchar(3) NOT NULL,
  `nama_lengkap` varchar(26) NOT NULL,
  `email_member` text NOT NULL,
  `password` varchar(36) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `telp` double NOT NULL,
  `no_ktp` double NOT NULL,
  `tgl_member` date NOT NULL,
  `aktivasi` varchar(36) DEFAULT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nama_akun`, `nama_lengkap`, `email_member`, `password`, `alamat`, `jenis_kelamin`, `telp`, `no_ktp`, `tgl_member`, `aktivasi`) VALUES
('FM0001', 'AAS', 'Angga Aditya Sundawa', 'anggaadityasundawaa@gmail.com', 'af81a0caf8e56b37b5c7655932fc6b46', 'Bekasi', 'Laki-laki', 81287747040, 7483923328, '2015-07-23', NULL),
('FM0002', 'FPL', 'Febrina Putri Lestari', 'FPL@gmail.com', '9cd6a772584ee238f3fca90f861f1075', 'Bekasi', 'Perempuan', 8223485974, 327937846573909, '2015-09-15', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` varchar(8) NOT NULL,
  `nama_produk` varchar(20) NOT NULL,
  `harga_produk` double NOT NULL,
  `stok_produk` int(4) NOT NULL,
  `diskon_produk` int(2) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `tgl_produk` date NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `stok_produk`, `diskon_produk`, `foto`, `tgl_produk`) VALUES
(7, 'Buah', 'Strawberry', 18000, 5, 10, 'strawberry.jpg', '2015-11-02'),
(8, 'Buah', 'Jeruk', 15000, 0, 0, 'jeruk.jpg', '2015-08-03'),
(10, 'Buah', 'Nanas', 14000, 14, 0, 'nanas.jpg', '2015-08-09'),
(11, 'Buah', 'Alpukat', 17000, 0, 0, 'alpukat.jpg', '2015-08-03'),
(12, 'Buah', 'Pisang', 12000, 0, 0, 'pisang.jpg', '2015-08-03'),
(13, 'Sayur', 'Wortel', 8000, 3, 0, 'wortel.jpg', '2015-10-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` varchar(8) NOT NULL,
  `id_member` varchar(8) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `total_transaksi` double NOT NULL,
  `nama_penerima` varchar(20) NOT NULL,
  `id_lokasi` varchar(6) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `kode_pos` int(8) NOT NULL,
  `no_hp` double NOT NULL,
  `nama_bank` varchar(12) NOT NULL,
  `no_rek` double NOT NULL,
  `nama_rek` varchar(20) NOT NULL,
  `status_bayar` enum('Pesan','Lunas','Batal') NOT NULL,
  `status_pengiriman` enum('Pending','Dikirim','Batal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_member`, `tanggal_transaksi`, `total_transaksi`, `nama_penerima`, `id_lokasi`, `alamat_lengkap`, `kode_pos`, `no_hp`, `nama_bank`, `no_rek`, `nama_rek`, `status_bayar`, `status_pengiriman`) VALUES
('TRX00001', 'AAS', '2015-09-25', 62000, 'Angga aditya sundawa', 'JAKSEL', 'Mampang', 17041, 81287747040, 'BCA', 83729283723729, 'Angga Aditya Sundawa', 'Pesan', 'Pending'),
('TRX00002', 'FPL', '2015-11-03', 44000, 'FPL', 'JAKTIM', 'Bekasi', 17041, 8223485974, 'BCA', 438298393829, 'Febrina Putri Lestar', 'Lunas', 'Dikirim');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
