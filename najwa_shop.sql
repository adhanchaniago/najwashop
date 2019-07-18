-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 21, 2019 at 09:24 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `najwa_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'dayat', 'admin', 'N Hidayat'),
(2, 'najwa', 'admin', 'Najwa syafiatu T');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ongkir`
--

CREATE TABLE IF NOT EXISTS `tb_ongkir` (
`id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `tb_ongkir`
--

INSERT INTO `tb_ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Megang sakti 1', 0),
(2, 'Megang sakti 2', 0),
(3, 'Megang sakti 3', 0),
(4, 'Megang Sakti 4', 0),
(5, 'Megang sakti 5', 0),
(6, 'Lubuk Muda', 5000),
(7, 'Lubuk Tua', 5000),
(8, 'Pagar ayu', 5000),
(9, 'Tri sakti', 5000),
(10, 'jajaran baru 1', 5000),
(11, 'U2 karya dadi', 5000),
(12, 'U1 Pager sari', 5000),
(13, 'Purwa karya', 5000),
(14, 'P2 Purwodadi', 5000),
(15, 'Bamasco', 5000),
(16, 'Krambil', 7000),
(17, 'trikarya', 7000),
(18, 'P1 Mardiharjo', 7000),
(19, 'jajaran baru 2', 7000),
(20, 'Sp4 Campursari', 10000),
(21, 'Sp4 Karyamukti', 10000),
(22, 'Beliti jaya', 10000),
(23, 'Sp3 petranjaya', 10000),
(24, 'Muara Kelingi', 10000),
(25, 'Lubuk rumbai', 10000),
(26, 'Simpang semambang', 10000),
(27, 'leban jaya', 10000),
(28, 'sadar karya', 10000),
(29, 'A Widodo', 10000),
(30, 'B Srikaton', 10000),
(31, 'C Nawangsasi', 10000),
(32, 'D tegalrejo', 10000),
(33, 'E Wonokerto', 10000),
(34, 'F Trikoyo', 10000),
(35, 'O Mangunharjo', 10000),
(36, 'G1 Mataram', 10000),
(37, 'G2 Dwijaya', 10000),
(38, 'H wukirsari', 10000),
(39, 'J', 10000),
(40, 'K kali bening', 10000),
(41, 'L Sidorejo', 10000),
(42, 'M Sitiharjo', 10000),
(43, 'Q1 tambah asri', 10000),
(44, 'Q2 Wonorejo', 10000),
(45, 'R Rejosari', 10000),
(46, 'S Kertosari', 10000),
(47, 'V Surodadi', 10000),
(48, 'sumberharta', 10000),
(49, 'Sp1 Rejosari', 15000),
(50, 'Sp2 karyamulya', 15000),
(51, 'Sp3 Mekarsari', 15000),
(52, 'Sp5 Tegalsari', 15000),
(53, 'Sp2 karyasakti', 15000),
(54, 'Sp1 Margasakti', 15000),
(55, 'Sp3 Marga baru', 15000),
(56, 'Sp2 Sidomulyo', 15000),
(57, 'Sp1 pelita jaya', 15000),
(58, 'Sp5 karya teladan', 15000),
(59, 'Sp4 Temuanjaya', 15000),
(60, 'Sp3 Temuansari', 15000),
(61, 'Wonosari', 2000),
(62, 'Sumbersari 1', 5000),
(63, 'Sumbersari 2', 10000),
(64, 'Sumber Rejo', 5000),
(65, 'Sukajaya', 10000),
(66, 'S. Kertosari', 10000),
(67, 'Mulyo sari', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE IF NOT EXISTS `tb_pelanggan` (
`id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon`, `alamat`) VALUES
(1, 'nurulhidayat404@gmail.com', '123', 'dayat pembelajar', '085210558370', 'Banyuwangi'),
(2, 'tiby02@gmail.com', '123', 'Ahmad Tibyani', '081378436029', 'Jakarta'),
(3, 'arifin008@gmail.com', '123', 'zainal a', '085210559821', 'Palembang'),
(4, 'takap@gmail.com', '123', 'muntakap', '08321545454', 'Bekasi'),
(5, 'wawan@gmail.com', '123', 'wawan', '085210558370', 'Bekasi'),
(8, 'arifin@gmail.com', '123', 'arifin', '085123684', 'Banyuwangi'),
(9, 'bito@gmail.com', '123', 'bito', '0851236842', 'Jogja'),
(10, 'mawar@gmail.com', '123', 'mawar', '094842', 'jatim'),
(11, 'cahyo@gmail.com', '123', 'cahyo ceriwis', '085610998241', 'Palembang'),
(12, 'nurul@gmail.com', '123', 'nurul koki', '082155884321', 'palembang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE IF NOT EXISTS `tb_pembayaran` (
`id_pembayaran` int(5) NOT NULL,
  `id_pembelian` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(4, 6, 'dayat', 'BRI SYARIAH ', 800000, '2018-10-14', '20181014135404topi hijrah.jpg'),
(5, 15, 'dayat', 'BRI SYARIAH ', 19035010, '2018-10-14', '20181014135948transfer.png'),
(6, 16, 'dayat', 'BRI SYARIAH ', 18000010, '2018-10-19', '20181019050955transfer.png'),
(7, 19, 'cahyo', 'Mandiri SYARIAH ', 30880025, '2018-10-30', '20181030151737transfer.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE IF NOT EXISTS `tb_pembelian` (
`id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(5) NOT NULL,
  `tanggal_pembelian` datetime NOT NULL,
  `tanggal_expired` datetime NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` varchar(200) NOT NULL,
  `status_pembelian` varchar(90) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `tanggal_expired`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`) VALUES
(15, 1, 1, '2018-11-01 01:02:14', '0000-00-00 00:00:00', 19035010, 'Banyuwangi', 35000, 'JL. Raya Kranggan No. 17 Rt 001 Rw 006 Jatiraden, Jatisampurna Bekasi KodePost 17433', 'barang dikirim', 'DD01234'),
(16, 1, 0, '2018-11-01 01:02:34', '0000-00-00 00:00:00', 18000010, 'Banyuwangi', 35000, 'JL. Raya Kranggan No. 17 Rt 001 Rw 006 Jatiraden, Jatisampurna BekasiKodePost 17433', 'sudah kirim pembayaran', ''),
(24, 1, 13, '2018-11-17 10:42:25', '2018-11-17 20:42:25', 200024, 'Purwa karya', 5000, 'KD 1998', 'barang dikirim', 'TFC-24');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian_produk`
--

CREATE TABLE IF NOT EXISTS `tb_pembelian_produk` (
`id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `tb_pembelian_produk`
--

INSERT INTO `tb_pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(23, 15, 1, 2, 'asus x452cp5', 5000005, 2005, 4010, 10000010),
(24, 15, 14, 1, 'Samsung s9', 9000000, 1100, 1100, 9000000),
(25, 16, 1, 2, 'asus x452cp5', 5000005, 2005, 4010, 10000010),
(26, 16, 11, 1, 'Samsung s8', 8000000, 1100, 1100, 8000000),
(40, 24, 19, 2, 'Topi Shift', 50000, 300, 600, 100000),
(41, 24, 18, 1, 'Flash Disk 8 GB', 95000, 10, 10, 95000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE IF NOT EXISTS `tb_produk` (
`id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `foto_produk` varchar(1000) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(5) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat`, `foto_produk`, `deskripsi_produk`, `stok_produk`, `kategori`) VALUES
(1, 'asus x452cp5', 5000005, 2005, 'asus.jpg', 'laptop programmer bro', 0, 'elektronik'),
(2, 'Rog Laptop', 9000005, 2005, 'rog laptop.jpg', 'laptop gaming MANTAP', 48, 'elektronik'),
(3, 'SODIM Vigen DDR3L 8 GB', 500000, 500, 'sodim 8 gb.jpg', 'Ram Handal life time guarante', 10, 'elektronik'),
(4, 'SODIM Vigen DDR3L 4 GB', 450000, 300, 'sodim 4 gb.jpg', 'Ram Handal', 5, 'elektronik'),
(5, 'New SODIM Vigen DDR3L 2 GB', 250000, 405, 'sodim 2 gb.jpg', 'Ram Mantapp..gannn', 49, 'elektronik'),
(8, 'SSD 1 Terra', 850000, 1000, 'ssd 1 terra.jpg', 'Storage Handal', 9, 'elektronik'),
(9, 'SSD 2 Terra', 950000, 900, 'ssd 2 tera.jpg', 'Storage Handal', 5, 'elektronik'),
(10, 'Samsung s7', 9500000, 1100, 's7.jpg', 'Hp mahal', 22, 'elektronik'),
(11, 'Samsung s8', 8000000, 1100, 'samsung s8.jpg', 'Hp mahal', 11, 'elektronik'),
(12, 'Samsung s5', 7000000, 1100, 'samsung s5.jpg', 'Hp mahal', 14, 'elektronik'),
(14, 'Samsung s9', 9000000, 1100, 'samsung s9.jpg', 'hp agak mahal', 30, 'elektronik'),
(15, 'iphone 9', 17400000, 1100, 'iphone 9.jpg', 'hp agak mahal', 5, 'elektronik'),
(16, 'iphone 7', 14580000, 1200, 'iphone 7.jpg', 'iphone 7', 5, 'elektronik'),
(17, 'xiaomi redmi 3', 950000, 1100, 'Xiaomi_Redmi_3_L_1.jpg', 'hp', 4, 'elektronik'),
(18, 'Flash Disk 8 GB', 95000, 10, 'fd 8 gb.jpg', 'Flashdisk mantapppp', 15, 'elektronik'),
(19, 'Topi Shift', 50000, 300, 'topi hijrah.jpg', 'Topi shift merupakan topi yang memiliki bahan berkualitas dengan harga terjangkau namun tetap stylish dengan motif tulisan shift yang berarti bergeser / bergerak dari satu tempat atau satu keadaan ke arah yang lebih baik', 110, 'elektronik'),
(20, 'Baju Koko an-najwa.', 95000, 750, 'baju koko2.jpg', 'Bahan 100% cotton adem\r\nWarna HIjau muda,Hitam, Putih, Abu-abu', 35, 'Pakaian Pria'),
(21, 'Baju Muslimah Syar`i', 110000, 900, 'baju muslimah.jpg', 'Bahan 100% cotton adem\r\nWarna Coklat, HIjau, Pink', 34, 'Pakaian Wanita'),
(22, 'Baju Koko At-Taqwa', 90000, 492, 'baju koko.jpg', 'Bahan 100% cotton adem\r\nWarna HIjau muda,Hitam, Putih, Abu-abu', 13, 'Pakaian Pria'),
(23, 'Kemeja Flanel', 115000, 400, 'kemeja.jpg', 'Bahan 100% cotton adem\r\nmotif kotak - kotak merah-hitam, Biru -Hitam, HIjau - Hitam', 15, 'Pakaian Pria'),
(24, 'Sweater YL', 125000, 800, 'sweater.jpg', 'Bahan 100% cotton adem\r\nWarna Kuning ,Hitam, Biru, Abu-abu', 7, 'Pakaian Pria'),
(25, 'Sweater T', 125000, 800, 'sweater cowo.jpg', 'Bahan 100% cotton adem\r\nWarna Biru,Hitam, Merah, Abu-abu', 9, 'Pakaian Pria'),
(26, 'Jaket Bomber Army', 130000, 850, 'jaket bomber .jpg', 'Bahan 100% cotton adem\r\nWarna HIjau muda,Army, Merah Maroon', 5, 'Pakaian Pria'),
(27, 'Kaos Shift', 55000, 300, 'kaos shift.png', 'Bahan 100% cotton adem\r\nWarna Biru Dongker,Hitam, Putih', 25, 'Pakaian Pria'),
(28, 'Celana Chinos', 135000, 900, 'celana chinos.jpg', 'Bahan 100% adem\r\nWarna Hitam,Coklat, Abu-abu', 33, 'Pakaian Pria'),
(29, 'Celana Jeans', 135000, 950, 'celana jean cwo.jpg', 'Bahan 100% adem\r\nWarna Biru Dongker, Abu-abu, Hitam', 27, 'Pakaian Pria'),
(30, 'Topi HIjrah', 45000, 100, 'topi hijrah.jpg', 'Bahan 100% adem\r\nWarna Hitam,Coklat, Biru Dongker', 19, 'Pakaian Pria'),
(31, 'Topi Luffy ', 40000, 150, 'topi-lu.jpg', 'Bahan 100% cotton adem\r\nWarna Kuning', 5, 'Aksesoris Pria'),
(32, 'Baju Muslimah Syari`i', 120000, 700, 'baju muslimahh kuning.jpg', 'Bahan 100% cotton adem\r\nWarna HIjau muda,Hitam, Kuning, Abu-abu', 23, 'Pakaian Wanita'),
(33, 'Kacamata Hitam Gaul', 45000, 50, 'kacamata2.jpg', 'Bahan 100% Berkualitas \r\nWarna Hitam', 13, 'Aksesoris Pria'),
(34, 'Kacamata Anak Pintar', 55000, 55, 'kacamata.jpg', 'Bahan 100% berkualitas\r\nWarna Transparan ', 3, 'Aksesoris Pria'),
(35, 'Sepatu Sport', 95000, 500, 'sepatu sport.jpg', 'Bahan 100% Berkualitas \r\nWarna Orange,Hitam, Biru', 11, 'Pakaian Pria'),
(36, 'Sepatu Sneaker', 110000, 700, 'sepatu sneaker.jpg', 'Bahan 100% Berkualitas\r\nWarna Hitam-Merah, Hitam-Biru', 7, 'Pakaian Pria'),
(37, 'Sepatu Sneaker ', 112000, 750, 'sepatu sneaker cw.jpg', 'Bahan 100% Berkualitas\r\nWarna HItam-Biru, Hitam-Putih,Hitam Merah', 3, 'Aksesoris Wanita'),
(38, 'Sepatu Sneaker ', 112000, 750, 'sepatu sneaker cw.jpg', 'Bahan 100% Berkualitas\r\nWarna HItam-Biru, Hitam-Putih,Hitam Merah', 3, 'Pakaian Wanita'),
(39, 'Sepatu Gunung ', 112000, 750, 'sepatu gunung.jpg', 'Bahan 100% Berkualitas\r\nWarna HItam-Biru, Hitam-Putih,Hitam Merah', 3, 'Pakaian Pria');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_ongkir`
--
ALTER TABLE `tb_ongkir`
 ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
 ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
 ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
 ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `tb_pembelian_produk`
--
ALTER TABLE `tb_pembelian_produk`
 ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
 ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_ongkir`
--
ALTER TABLE `tb_ongkir`
MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
MODIFY `id_pembayaran` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tb_pembelian_produk`
--
ALTER TABLE `tb_pembelian_produk`
MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
