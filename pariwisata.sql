-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for smp-masmur
CREATE DATABASE IF NOT EXISTS `smp-masmur` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `smp-masmur`;

-- Dumping structure for table smp-masmur.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` int(1) DEFAULT NULL,
  `foto` varchar(256) NOT NULL DEFAULT 'default.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table smp-masmur.admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `username`, `password`, `role`, `foto`) VALUES
	(3, 'admin', '$2y$10$cIg1Z..xWrI6NrRB9IWe9OunIG.klo8gHZ5269S4Gc22McNixT1Y6', 1, 'foto-profil-31.jpg');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table smp-masmur.berita
CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(512) NOT NULL,
  `isi` longtext NOT NULL,
  `gambar` varchar(512) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_berita`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table smp-masmur.berita: ~2 rows (approximately)
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
INSERT INTO `berita` (`id_berita`, `judul`, `isi`, `gambar`, `datetime`) VALUES
	(1, 'Rentetan Kesaksian Tetangga Novel Baswedan soal Air Keras', '<p>Saksi-saksi dari pihak Novel dianggap sejumlah pihak penting karena melihat langsung sejumlah rangkaian peristiwa sebelum dan saat penyiraman terjadi. Apalagi mereka bertetangga dengan Novel.</p><p>Diketahui penyidik senior Komisi Pemberantasan Korupsi (KPK) itu diserang dua orang tak dikenal tidak jauh dari rumahnya usai solat Subuh di kawasan Kelapa Gading, Jakarta Utara. Aksi penyerangan itu terjadi pada 11 April 2017 silam.</p><p>Salah satu saksi mengaku sebulan sebelum penyerangan terjadi, ia melihat ada beberapa orang dengan gelagat aneh di sekitar kediaman Novel. Menurut saksi, terlihat dari gerak-geriknya mereka seperti sedang mengintai keadaan rumah Novel.</p><p>"Satu bulan sebelum penyiraman kepada Pak Novel, saya sempat melihat ada orang asing yang mencurigakan. Mengapa saya harus memperhatikan mereka? Karena mereka memperhatikan rumah pak novel," ujar saksi pertama dalam sebuah wawancara video yang diunggah di kanal youtube Amnesty International Indonesia pada Senin (22/6) lalu.</p><p>Saksi ini melanjutkan, dirinya kemudian keluar rumah untuk lebih memastikan gerak-gerik aneh beberapa orang tersebut. Dia keluar rumah sembari mengobrol dengan temannya.Dalam unggahan video itu, orang-orang yang memberi kesaksian tidak diungkap identitasnya.</p><p>"Kemudian saya keluar rumah sambil ngobrol dengan teman, mereka pindah dari tempat duduk mereka sambil jongkok memperhatikan rumah Pak Novel," sambungnya.</p><p>Selain gelagat aneh dari beberapa orang, satu saksi lainnya yang ada di dekat lokasi penyiraman, meragukan salah satu terdakwa merupakan pelaku sesungguhnya. Diketahui ada dua terdakwa yang kini menjalani persidangan, yakni Rahmat Kadir Mahulette dan Ronny Bugis.</p><p>"Sejauh ini saya hanya membandingkan lewat media, untuk satu orang saya tidak melihat karena memakai helm full face, yang jelas ada (satu orang) yang badannya gempal," kata saksi kedua.</p><p>"Kemudian yang kedua, yang membuka helm dan berdiri, ada beberapa kemiripan dengan salah satu terdakwa, tapi mohon maaf saya rasa bukan orang itu," imbuhnya.</p>', 'berita.jpg', '2020-06-27 20:09:04'),
	(2, 'Putra BJ Habibie Bicara Beda Masa Depan Drone dan Pesawat RI', '<p>Jakarta, CNN Indonesia --</p><p>Ketua Dewan Pembina The Habibie Center, Ilham Habibie menyatakan industri pesawat terbang di Indonesia masih sangat baik. Dia mengatakan hal itu terjadi karena Indonesia merupakan negara kepulauan.</p><p>"Industri pesawat terbang di Indonesia masih tetap cerah karena kita adalah negara kepulauan," ujar Ilham dalam diskusi virtual, Kamis (25/6).</p><p>Ilham menuturkan Indonesia tidak bisa hanya mengandalkan kapal laut untuk mengantar orang atau barang dari satu pulau ke pulau lain. Dia mengatakan Indonesia membutuhkan pesawat yang dapat mempersingkat waktu.</p><p>"Kecepatan itu menjadi penting," ujarnya.</p><p>Di sisi lain, Ilham enggan berkomentar tentang proyek&nbsp;<a href="https://www.cnnindonesia.com/tag/pesawat-r80"><strong>pesawat R80</strong></a> karya ayahnya yang juga Presiden ke-3 RI <a href="https://www.cnnindonesia.com/tag/bj-habibie"><strong>BJ Habibie</strong></a>&nbsp;yang keluar dari Proyek Strategis Nasional (PSN) karena diganti dengan proyek drone. Dia hanya mengatakan pesawat dan drone merupakan hal yang berbeda.</p><p>Dia mengatakan pesawat terbang adalah sebuah transportasi untuk mengangkut manusia atau barang dalam jarak yang sangat jauh, misalnya dari Indonesia ke Amerika Serikat. Sedangkan drone, dia mengatakan tidak dapat melakukan hal itu.</p><p>"Menurut saya drone beda sekali. Memang dia bisa terbang, tapi pertama terbangnya tidak lama, kedua dia tidak bisa membawa orang banyak apalagi jauh, barang juga tidak bisa," ujarnya.</p><p>Meski demikian, dia menilai drone adalah sesuatu yang penting dan harus dikuasai oleh Indonesia. Namun, dia mengatakan pesawat dan drone adalah dua hal yang berbeda.&nbsp;</p><p>Sebelumnya, pemerintah Joko Widodo tidak memasukkan proyek pengembangan&nbsp;pesawat R80&nbsp;dan N245 dalam PSN&nbsp;warisan BJ Habibie dan menggantikan dengan drone.</p><p>Menteri Koordinator Bidang Perekonomian Airlangga Hartarto mengumumkan memasukkan tiga proyek pengembangan teknologi&nbsp;drone&nbsp;senilai Rp27,17 triliun dalam daftar&nbsp;PSN. Proyek itu menggantikan pengembangan pesawat R80 dan N245 peninggalan&nbsp;BJ Habibie&nbsp;yang sebelumnya masuk dalam PSN.</p>', 'berita1.jpg', '2020-06-27 20:10:24');
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;

-- Dumping structure for table smp-masmur.galeri
CREATE TABLE IF NOT EXISTS `galeri` (
  `id_galeri` int(11) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(256) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `subjudul` varchar(128) NOT NULL,
  `kategori` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id_galeri`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table smp-masmur.galeri: ~0 rows (approximately)
/*!40000 ALTER TABLE `galeri` DISABLE KEYS */;
/*!40000 ALTER TABLE `galeri` ENABLE KEYS */;

-- Dumping structure for table smp-masmur.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(128) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table smp-masmur.kategori: ~6 rows (approximately)
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
	(1, 'Games'),
	(2, 'Technology'),
	(3, 'Computer'),
	(4, 'Science'),
	(5, 'IoT'),
	(6, 'Informasi');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;

-- Dumping structure for table smp-masmur.kategori_galeri
CREATE TABLE IF NOT EXISTS `kategori_galeri` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(128) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table smp-masmur.kategori_galeri: ~0 rows (approximately)
/*!40000 ALTER TABLE `kategori_galeri` DISABLE KEYS */;
/*!40000 ALTER TABLE `kategori_galeri` ENABLE KEYS */;

-- Dumping structure for table smp-masmur.rel_kategori_berita
CREATE TABLE IF NOT EXISTS `rel_kategori_berita` (
  `id_relasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_berita` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  PRIMARY KEY (`id_relasi`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table smp-masmur.rel_kategori_berita: ~6 rows (approximately)
/*!40000 ALTER TABLE `rel_kategori_berita` DISABLE KEYS */;
INSERT INTO `rel_kategori_berita` (`id_relasi`, `id_berita`, `id_kategori`) VALUES
	(10, 13, 2),
	(11, 13, 5),
	(12, 14, 2),
	(13, 14, 4),
	(18, 12, 1),
	(19, 12, 4);
/*!40000 ALTER TABLE `rel_kategori_berita` ENABLE KEYS */;

-- Dumping structure for table smp-masmur.slider
CREATE TABLE IF NOT EXISTS `slider` (
  `id_slider` int(11) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(256) NOT NULL,
  `judul` varchar(256) NOT NULL,
  `subjudul` varchar(512) NOT NULL,
  PRIMARY KEY (`id_slider`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table smp-masmur.slider: ~0 rows (approximately)
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
