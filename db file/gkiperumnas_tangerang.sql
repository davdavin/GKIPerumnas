-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 04:00 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gkiperumnas_tangerang`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_jemaat`
--

CREATE TABLE `anggota_jemaat` (
  `id_anggota` int(11) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `no_anggota` varchar(50) NOT NULL,
  `nama_lengkap_anggota` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat_anggota` varchar(100) NOT NULL,
  `nohp_anggota` varchar(30) NOT NULL,
  `email_anggota` varchar(50) NOT NULL,
  `jenis_kelamin_anggota` varchar(20) NOT NULL,
  `golongan_darah_anggota` varchar(20) NOT NULL,
  `status_anggota` varchar(20) NOT NULL,
  `pendidikan_anggota` varchar(50) NOT NULL,
  `pekerjaan_anggota` varchar(50) NOT NULL,
  `kelompok_etnis_anggota` varchar(50) NOT NULL,
  `jabatan_anggota` varchar(50) NOT NULL,
  `tanggal_lahir_anggota` date NOT NULL,
  `tanggal_baptis_anggota` date DEFAULT NULL,
  `tanggal_sidi_anggota` date DEFAULT NULL,
  `tanggal_atestasi_masuk` date DEFAULT NULL,
  `tanggal_atestasi_keluar` date DEFAULT NULL,
  `tanggal_meninggal` date DEFAULT NULL,
  `tanggal_dkh` date DEFAULT NULL,
  `tanggal_ex_dkh` date DEFAULT NULL,
  `status_akun` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota_jemaat`
--

INSERT INTO `anggota_jemaat` (`id_anggota`, `id_wilayah`, `no_anggota`, `nama_lengkap_anggota`, `username`, `password`, `alamat_anggota`, `nohp_anggota`, `email_anggota`, `jenis_kelamin_anggota`, `golongan_darah_anggota`, `status_anggota`, `pendidikan_anggota`, `pekerjaan_anggota`, `kelompok_etnis_anggota`, `jabatan_anggota`, `tanggal_lahir_anggota`, `tanggal_baptis_anggota`, `tanggal_sidi_anggota`, `tanggal_atestasi_masuk`, `tanggal_atestasi_keluar`, `tanggal_meninggal`, `tanggal_dkh`, `tanggal_ex_dkh`, `status_akun`, `created_at`, `updated_at`) VALUES
(1, 1, '00001', 'Davin', 'davin', '$2y$10$u2bfkTIjd52ujs7fSPDcPeZetdIMgz413bOnjegqTf0KcF3b7pp9u', 'Jl Melati No. 2', '082042832322', 'electronicdm10@gmail.com', 'Laki-laki', 'A', 'AKTIF', 'S2', 'Direktur', 'Sunda', 'Pengurus', '2002-10-05', '2017-10-06', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, '2021-10-14 14:56:27', '2022-11-22 22:34:08'),
(2, 2, '00002', 'Michell', 'michell', '$2y$10$5/ZB5BVMRLjzeUcNbr/n7eVqvy/kRp1y1UzP7SZq5dzKjyEDAZrA2', 'Jl Melati', '0808273262314', 'michell@gmail.com', 'Perempuan', 'A', 'AKTIF', 'S1', 'Karyawan', 'Sunda', 'Pengurus', '2001-01-23', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, '2021-10-14 14:56:42', '2022-11-13 15:57:27'),
(3, 3, '00003', 'Philip', 'philip', '$2y$10$IQLyqorYQtGhShMw4M9bsOeDWYJCMXV/xSVjKRrDCJ390FpV6mwPK', 'Jl Melati No. 1', '089283282121', 'contoh@example.com', 'Laki-laki', 'A', 'AKTIF', 'S1', 'Karyawan', 'Sunda', 'Pengurus', '2000-12-16', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, '2021-11-08 14:56:51', '2022-11-22 22:34:38'),
(4, 1, '00004', 'Christella', 'christella', '$2y$10$BgwVeG2burMuUxUWNnXP5OsU.dY6QlTx56hBQzt1VH8ch36qpxHie', 'Jl. Apel ', '089283282121', 'contoh1@example.com', 'Perempuan', 'A', 'AKTIF', 'S2', 'Karyawan', 'Sunda', 'Jemaat', '1996-02-09', '2021-01-01', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, '2021-11-08 14:57:30', '2022-11-22 22:33:03'),
(5, 8, '00005', 'Toni', 'tonitoni', '$2y$10$PM3956F0xwDIOBVh8.DDpu/ivGjRrLAfkOgtoDLqxbBKeEA4f46Ni', 'Jl. Apel ', '0808273262314', 'tonitoni@gmail.com', 'Laki-laki', 'A', 'AKTIF', 'S1', 'Karyawan', 'Sunda', 'Pengurus', '2000-09-16', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, '2021-11-08 14:57:43', '2022-11-22 23:14:28'),
(6, 6, '00006', 'Marcelo', 'marcelo', '$2y$10$6lWx87msZTVCrX0q9zgayO0oX055kxtd52cqrPBKcPZ/K3Q4Ahpvi', 'Jl. Apel ', '0808273262314', 'contoh2@example.com', 'Laki-laki', 'A', 'AKTIF', 'S1', 'Karyawan', 'Sunda', 'Pengurus', '1990-01-08', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, '2021-11-10 14:57:56', '2022-11-22 22:36:07'),
(7, 7, '00007', 'Boy', 'boyboy', '$2y$10$UzljG9n//muG3t6VdQzZSeLAb3ySr6Lo1icwoZmvME9N1ZGBNwrBO', 'Jl. Apel ', '089283282121', 'contoh3@gmail.com', 'Laki-laki', 'A', 'AKTIF', 'S1', 'Karyawan', 'Sunda', 'Jemaat', '1996-02-09', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, '2021-11-10 15:00:00', '2022-11-24 11:02:16'),
(8, 4, '00008', 'Joseph', 'joseph', '$2y$10$PyrYlxviw0nm92xesrnU9enzCEZffEud44QUxPLMfv6SSr.dhm6AC', 'Jl. Apel ', '0808273262314', 'contoh4@example.com', 'Laki-laki', 'A', 'AKTIF', 'S1', 'Karyawan', 'Sunda', 'Pengurus', '1996-02-09', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, '2021-11-10 16:00:00', '2022-11-22 22:37:27'),
(9, 2, '00009', 'Jack', 'jackjack', '$2y$10$Jb3MU6ntMSaaA7WC62NH8uv8YVNZWcBCthG/mC4shECTmObL6veLi', 'Jl. Apel ', '0808273262314', 'brobro@example.com', 'Laki-laki', 'A', 'AKTIF', 'S1', 'Karyawan', 'Sunda', 'Jemaat', '1990-10-21', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, '2021-11-10 16:30:00', NULL),
(10, 5, '000010', 'Yohanes', 'yohanes', '$2y$10$5zB0ZskcP6uBP2qoKkBTm.nnCz.U/o/XbR10B.OsrN4OjqZy6dKk2', 'Jl. Apel ', '0808273262314', 'contoh5@example.com', 'Laki-laki', 'A', 'AKTIF', 'S1', 'Karyawan', 'Sunda', 'Pengurus', '1998-10-09', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, '2021-11-12 10:00:00', '2022-11-22 22:35:50'),
(11, 5, '000011', 'Koko', 'kokokoko', '$2y$10$UveDTJSbo6V9piXU0yJz5Oabd7WsZrspOWB4iVauhKcCsnlF4HSga', 'Jl. Mangga', '088217231921', 'kokoko@example.com', 'Laki-laki', 'A', 'AKTIF', 'S1', 'Karyawan', 'Jawa', 'Jemaat', '2000-10-01', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, '2021-11-12 11:00:00', NULL),
(12, 7, '000012', 'Bella', 'bella', '$2y$10$XXMV0OA79RJPkn7sSqyyjud8ndeYUzakK/Ljw7UhAxqKKzt12xdQ2', 'Jl. Buah Apel No.2 ', '088904040829', 'bellabella@gmail.com', 'Perempuan', 'A', 'AKTIF', 'S1', 'Karyawan', 'Sunda', 'Pengurus', '1994-10-22', '2010-08-21', '0000-00-00', '2008-07-16', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, '2021-11-12 11:30:00', '2022-11-24 11:02:16'),
(13, 6, '000013', 'Josephine', 'josephine', '$2y$10$TcwfWb8/FU.AR/cy4jk/oeQJDqgxV2RmfufPky.Jml9K.i8GKgiwS', 'Jl. Cengkeh Blok. A', '088904040829', 'josejose@gmail.com', 'Perempuan', 'A', 'AKTIF', 'S1', 'Karyawan', 'Sunda', 'Jemaat', '1995-07-12', '2012-11-22', '2022-07-21', '2000-10-18', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, '2022-01-12 12:00:00', NULL),
(14, 4, '000014', 'Maria', 'maria', '$2y$10$HB01DdkDoYciXShzR8Ob/eaCCkx.EIHZyoQ5rVoedfO288R5H5Oly', 'Jl. Mangga', '088904040829', 'marmar@example.com', 'Perempuan', 'A', 'AKTIF', 'S1', 'Karyawan', 'Jawa', 'Jemaat', '1996-11-05', '2008-02-12', '0000-00-00', '2000-10-12', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, '2022-01-14 15:01:02', NULL),
(15, 8, '000015', 'Brandon', 'brandon', '$2y$10$1FDI0sUlpGHauFwHX1W.W.NqH3Rr3Spe8sbjkJ8LnyFztk9bsEvpO', 'Jl. Cengkeh Blok. AC', '088270120023', 'brandonbrandon@gmail.com', 'Laki-laki', 'A', 'AKTIF', 'S1', 'Karyawan', 'Jawa', 'Jemaat', '1997-12-01', '2009-02-18', '2015-07-12', '2005-12-02', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, '2022-09-01 15:01:14', NULL),
(16, 7, '000016', 'Merry', 'merry', '$2y$10$ulQrY6ymejC0rj97oTscQujUS2t7rRM1sHAQSUefmMrw5GTb5oiDO', 'Jl. Buah Apel No. 10', '08327139232', 'merrymerry@gmail.com', 'Perempuan', 'A', 'AKTIF', 'S1', 'Karyawan', 'Jawa', 'Pengurus', '2000-12-12', '2008-02-12', '0000-00-00', '2000-01-12', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, '2022-10-07 15:01:33', NULL),
(17, 8, '000017', 'Pearly', 'pearly', '$2y$10$Q9jD1W8.c4yAwlDh.xZ0o.dx/3SB5HkkHTdsA7ODwsZpgpVKJbFh.', 'Jl Melati No. 4', '08729213123', 'pearlypearly@gmail.com', 'Perempuan', 'A', 'AKTIF', 'S1', 'Karyawan', 'Sunda', 'Jemaat', '2006-01-12', '2016-02-12', '0000-00-00', '2005-01-01', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 1, '2022-10-20 15:08:49', '2022-10-20 15:22:31'),
(18, 8, '000018', 'Rachell', 'rachell', '$2y$10$ilJW0WD20/0W8oLcIKwI4.2XUSlnH89arr3sFdwX5tNvC.BHPXX0i', 'Jl. Kebun Jeruk No. 4 Blok. AC', '088904040829', 'rachell@gmail.com', 'Perempuan', 'A', 'AKTIF', 'S1', 'Karyawan', 'Jawa', 'Jemaat', '2009-02-03', '0000-00-00', '0000-00-00', '2009-07-07', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, '2022-11-07 21:06:44', '2022-11-22 23:14:28');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul_artikel` varchar(50) NOT NULL,
  `tipe_artikel` varchar(25) NOT NULL,
  `deskripsi_singkat` varchar(100) NOT NULL,
  `isi` text DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  `status_artikel` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul_artikel`, `tipe_artikel`, `deskripsi_singkat`, `isi`, `file`, `status_artikel`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'KELUARGA YANG HIDUP DALAM PEMULIHAN', 'Renungan Harian', 'Markus 10 : 17 - 31', '<p><span style=\"font-weight: 400;\">Seringkali kita berpikir bahwa pemulihan atau penyembuhan adalah sebuah pencapaian dalam hidup beriman. Sederhananya karena saya sudah menjadi Kristen yang baik maka saya mendapatkan Anugerah pemulihan itu. Lalu kalau saya Kristen yang tidak baik maka yang terjadi sebaliknya. Pada dasarnya kita tahu bahwa karya Allah tidak bergerak seperti itu, Karya Allah bukan honor berbuat baik atau pahala.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Tetapi Karya Allah adalah Anugerah&hellip;. Anugerah berarti bicara sesuatu yang dianugerahkan (diberikan) secara cuma-cuma. Lalu apa standart orang yang layak mendapatkan Anugerah, jawabnya kesetiaan.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Kesetiaan untuk hidup dalam Rancangan-Nya, kesetiaan mengikuti ajaran-Nya. Mengalami Anugerah adalah mau setia dalam rancangan Allah. Itulah mengapa Yesus berkata:</span></p>\r\n<p><em><span style=\"font-weight: 400;\">\"Hanya satu lagi kekuranganmu: pergilah, juallah apa yang kaumiliki dan berikanlah itu kepada orang-orang miskin, maka engkau akan beroleh harta di sorga, kemudian datanglah ke mari dan ikutlah Aku.\" (Mar 10:21).</span></em></p>\r\n<p><span style=\"font-weight: 400;\">Dan respon sang anak muda itu adalah kecewa dan sedih karena banyak hartanya. Response kesedihan itu tentu saja karena sang anak muda merasa rencana Allah tak sesuai dengan rancangannya. kita selalu ingin rancangan Allah sesuai dengan kita, dan tak jarang memaksakannya. Hal yang sama mungkin kita paksa kan juga kepada anggota keluarga kita.</span></p>\r\n<p><span style=\"font-weight: 400;\">Orang tua memaksakan rancangan nya pada anaknya, suami pada istrinya, dst. Padahal rancangan kita belum tentu rancangan Allah atas hidup mereka. Itulah mengapa Yesus berkata sukarlah memang untuk masuk kerajaan Allah (ay .24). Karena masuk kerajaan Allah berarti menemukan dan menghidupi rancangan Allah atas keluarga kita.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Jadi dapat disimpulkan pemulihan adalah proses perjalanan dalam menghidupi rancangan, Mengikuti rancangan Nya berarti mau melakukan kehendak Nya, setia pada ketetapan Nya, dan bersedia berkarya bagi sesama.</span></p>\r\n<p>&nbsp;</p>\r\n<p style=\"text-align: center;\"><strong><em>Jadikanlah Rancangan-Rancangan Allah sebagai yang terutama maka kita akan merasakan Pemulihan-Nya.</em></strong></p>', NULL, 'DITERBITKAN', 5, '2021-02-01 12:28:19', '2022-11-14 22:26:06'),
(2, 'Sejarah Singkat GKI Perumnas', 'Artikel Lainnya', 'GKI Perumnas awalnya terbentuk dari beberapa keluarga Kristen yang berdomisili di daerah Perumnas 1 ', '<p style=\"text-align: justify; line-height: 1.4;\"><span style=\"font-family: helvetica, arial, sans-serif; font-size: 12pt;\">GKI Perumnas awalnya terbentuk dari beberapa keluarga Kristen yang berdomisili di daerah Perumnas 1 dan 2. Yang sering kali bertemu dalam perjalanan menuju ke GKI Sutopo atau perjalanan pulang ke rumah dengan menaiki kendaraan angkutan kota. Dari perkenalan beberapa keluarga yang sama-sama beribadah di GKI Sutopo, akhirnya terbentuklah paduan suara wilayah Perumnas yang seringkali berlatih di rumah keluarga Andreas atau Totok Suroto. Setelah paduan suara wilayah rutin berlatih akhirnya mulailah dibentuk sekolah minggu bagi anak-anak. Juga dilaksanakan perayaan natal dan paskah untuk anak-anak sekolah minggu dengan menggunakan gedung sekolah SMP 5. Ketika kegiatan sekolah Minggu sudah mulai rutin barulah kemudian dibentuk KRT (Kebaktian Rumah Tangga) di beberapa rumah anggota Jemaat. Dan ketika KRT sudah mulai rutin akhirnya disepakati untuk membuat pos Jemaat sekitar tahun 1985an. Setelah melalui proses yang panjgan menjadi bakal Jemaat akhirnya didewasakan menjadi jemaat yang ke-75 pada tanggal 31 Oktober 1995.</span></p>', NULL, 'DITERBITKAN', 2, '2021-12-08 12:28:53', NULL),
(3, 'Gembalaku Sahabat yang Baik', 'Renungan Harian', 'Orang percaya masa kini selalu mengidentikan Kristus sebagai Gembala', '<p dir=\"ltr\" style=\"text-align: justify;\"><span style=\"font-size: 12pt;\"><strong>Sahabat Menjadikan Kita \"Pribadi yang Utuh\"</strong></span></p>\r\n<p dir=\"ltr\" style=\"text-align: justify;\"><span style=\"font-size: 12pt;\">Sahabat yang Baik. semua membutuhkannya. Manusia sebagai makhluk sosial sangat membutuhkan support dan dukungan dari orang disekitarnya. Terutama di saat-saat terberat manusia akan mencari pertolongan dalam kehadiran orang-orang di sekitar kita. Kemampuan kita menemukan dan menjadi sahabat adalah langkah membuat kita menjadi utuh. A person become a person because people. (seseorang menjadi seseorang (utuh) karena orang lain)</span></p>\r\n<p dir=\"ltr\" style=\"text-align: justify;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: justify;\"><span style=\"font-size: 12pt;\"><strong>Physical Distancing serta Social Attachment</strong></span></p>\r\n<p dir=\"ltr\" style=\"text-align: justify;\"><span style=\"font-size: 12pt;\">Pandemi COVID 19 menginginkan kita untuk menjaga jarak fisik, bukan menjaga jarak sosial. Kehidupan sosial haruslah tetap berjalan dan perlu untuk tetap berjalan untuk menjaga kesehatan mental. Bahkan dalam kondisi berat seperti ini kelekatan sosial semakin dibutuhkan. Pada momen seperti ini: sapaan dirindukan, perhatian diperlukan, dan Belas Kasih dibutuhkan. Menunjukan Social Attachment itulah alasan Yesus memberi makan 5000 orang laki-laki dalam Injil Markus. Karena Ia mau melekat dengan manusia. Ia mau melekat dengan kita, menjadi Sahabat yang menghadirkan kelegaan sapa, perhatian, dan Belas Kasih.</span></p>\r\n<p dir=\"ltr\" style=\"text-align: justify;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: justify;\"><span style=\"font-size: 12pt;\"><strong>Sahabat Menuju Kelegaan</strong></span></p>\r\n<p dir=\"ltr\" style=\"text-align: justify;\"><span style=\"font-size: 12pt;\">Mazmur 23 adalah mazmur peziarahan bangsa Israel, sebuah mazmur komunal. Dalam refleksi nya bangsa Israel melihat perjalanan Mesir- tanah perjanjian adalah peziarahan bersama&nbsp; yang dipimpin Allah sebagai Gembala yang baik. Gembala itu menjadi pemimpin menyediakan kebutuhan dan membawa mereka dalam kelegaan. Gembala itu adalah Sahabat Sejati mereka dan juga kita. Gembala menjadi gambar diri Allah yang khas dari Kekristenan, karena Allah bukan lagi Allah yang jauh, yang duduk di singgasana langit. Tetapi Ia menjadi allah yang dekat dengan kita dan menjadi Allah yang tinggal dan diam bersama kita. Dia tetap Allah yang berkuasa dan hadirkan pemenuhan, tetapi sekarang ia begitu dekat dan lekat. Selayaknya Sahabat di ujung Doa.</span></p>\r\n<p dir=\"ltr\" style=\"text-align: justify;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: justify;\"><span style=\"font-size: 12pt;\"><strong>Komunitas Menuju Kelegaan</strong></span></p>\r\n<p dir=\"ltr\" style=\"text-align: justify;\"><span style=\"font-size: 12pt;\">Gembala itu memimpin kawanan Domba (komunitas). Komunitas yang berjalan bersama dalam pimpinan Allah. Komunitas yang dipimpin Allah tentu saja harus menghadirkan pembaruan dan dampak bagi sesamanya. Contohnya adalah seorang Anak laki-laki yang membawa 5 Roti dan 2 Ikan. Anak itu menjadi awal sebuah mukjizat besar. Seorang anak yang menunjukan belas kasihan, selayaknya yang dicontohkan oleh Sang Gembala. Percontohan&nbsp; Belas Kasih sang Anak itu menjadi awal dari Belas Kasih Allah. 5 Roti dan 2 ikan mengenyangkan perut 5000 orang laki laki bahkan sisa 12 bakul. Sang Gembala ingin kita juga bisa menjadi sahabat bagi komunitas lihat sang Anak yang membawa roti. Sang Gembala ingin kita mencontohkan dan menghidupi Belas Kasih yang Ia terlebih dahulu lakukan.</span></p>\r\n<p dir=\"ltr\" style=\"text-align: justify;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"text-align: justify;\"><span style=\"font-size: 12pt;\"><strong>Kesimpulan</strong></span></p>\r\n<p dir=\"ltr\" style=\"text-align: justify;\"><span style=\"font-size: 12pt;\">Kekristenan punya gambaran allah yang spesial yaitu: Gembala-ku dan Sahabat-ku. Allah yang dekat dan lekat dengan kita. Allah yang berbelas kasih dan memanggil kita untuk saling mengasihi. Allah yang diam di tengah kita selayaknya Gembala yang memimpin kita menembus lembah kekelaman. Tuhan Memberkati. Amin</span></p>', NULL, 'DITERBITKAN', 2, '2022-05-09 13:05:40', '2022-11-11 15:54:11'),
(4, 'Warta', 'Warta Jemaat', 'Test test', NULL, 'warta.pdf', 'DITERBITKAN', 2, '2022-09-07 13:58:54', NULL),
(5, 'DIA ALLAH YANG HIDUP', 'Renungan Harian', 'DIA ALLAH YANG HIDUP', '<p style=\"text-align: justify;\"><span style=\"font-size: 12pt;\">Tuhan bukanlah Tuhan orang mati.&rdquo; Ini tidak berarti bahwa Tuhan acuh tak acuh terhadap manusia yang sudah mati. Tuhan tidak melupakan mereka. Sebaliknya, dalam hubungannya dengan Tuhan, kematian adalah musuh, dan mengatasi kematian bagi Tuhan sama pentingnya dengan mengalahkan dosa. &ldquo;Di manakah, hai maut, kemenanganmu? Di manakah, hai maut, sengatmu?&rdquo; (1 Kor. 15:55) Dengan kata-kata ini, Paulus bersukacita dengan rasa syukur atas kemenangan Allah dalam Yesus Kristus atas kuasa maut. Namun, pernyataan Paulus tidak dimaksudkan untuk mendukung gagasan bahwa kematian tidak benar-benar ada atau bahwa ada kelanjutan hidup kita setelah kematian kita. Sebaliknya, kita harus menganggap serius apa yang dikatakan Tuhan yang hidup dalam Wahyu 1:18: &ldquo;[Akulah] yang hidup. Saya telah mati, dan lihat, saya hidup selama-lamanya; dan aku memiliki kunci Kematian dan Hades.&rdquo; Kunci-kunci ini hanya ada di tangan Tuhan dan tidak pernah ada di tangan kita. Jika kita adalah pengikutnya, maka kita mengikuti orang yang memiliki kunci-kunci ini di tangannya.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: 12pt;\">Pada hari Minggu&nbsp; ini, Bacaan Injil menunjukkan pertanyaan orang Saduki kepada Yesus terkait perkawinan levirat yang dikaitkan dengan ketidakpercayaan kelompok ini terhadap kebangkitan. Pertanyaan yang diajukan menimbulkan kesan ejekan atau olok-olok terhadap pandangan kelompok lain yang percaya pada kebangkitan. Yesus menjawab pertanyaan itu dengan berbicara tentang Allah orang yang hidup untuk menyudahi pertanyaan yang mengejek itu. Demikian juga dengan Ayub yang harus mengalami hinaan dan ejekan karena keadaannya yang sedang berada dalam penderitaan yang dalam. Dalam pergumulannya, Ayub membuat pernyataan keyakinannya akan Allah sebagai Penebusnya yang hidup di tengah kehancuran hatinya karena dihina dan direndahkan oleh orang-orang disekitarnya termasuk keLuarga dan sahabat-sahabatnya.&nbsp;</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: 12pt;\">Keyakinan iman itu membangkitkan pengharapan dalam dirinya. Pandangan Yesus dan kesaksian iman Ayub semestinya menuntun kita untuk memiliki iman kepada Allah orang yang hidup dengan tanpa merendahkan dan mematikan yang lain. Beriman kepada Allah orang yang hidup semestinya membuat hidup semakin digerakkan untuk memberitakan tentang Allah orang yang hidup yang membawa pengharapan bukan keputusasaan, membawa kehidupan bukan \"mematikan&rdquo; kehidupan sesama.</span></p>', NULL, 'DITERBITKAN', 5, '2022-11-12 15:32:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_wilayah`
--

CREATE TABLE `detail_wilayah` (
  `id_detail_wilayah` int(11) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `koordinator_wilayah` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_wilayah`
--

INSERT INTO `detail_wilayah` (`id_detail_wilayah`, `id_wilayah`, `koordinator_wilayah`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-02-22 10:44:53', NULL),
(2, 2, 2, '2022-02-22 10:45:04', NULL),
(3, 3, 3, '2022-02-22 10:45:09', NULL),
(4, 4, 8, '2022-02-22 10:45:15', NULL),
(5, 5, 10, '2022-02-22 10:45:20', '2022-10-19 10:51:05'),
(6, 6, 6, '2022-02-22 10:45:25', NULL),
(7, 7, 12, '2022-02-22 10:45:30', '2022-11-24 11:02:16'),
(8, 8, 5, '2022-02-22 10:45:35', '2022-11-22 23:14:28');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `jenis_dokumen` varchar(50) NOT NULL,
  `nama_dokumen` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `status_dokumen` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `jenis_dokumen`, `nama_dokumen`, `keterangan`, `status_dokumen`, `created_at`, `updated_at`) VALUES
(1, 'Formulir Persyaratan Pendaftaran Jemaat Baru', 'Syarat_menjadi_anggota_jemaat.pdf', 'Diperlukan untuk pendaftaran jemaat baru', 'DITERBITKAN', '2022-01-07 10:15:58', '2022-11-14 22:10:08'),
(2, 'Formulir Permohonan Baptis Anak', 'Permohonan_Baptis_Anak.pdf', 'Formulir ini untuk menerima baptis anak', 'DITERBITKAN', '2022-01-07 10:16:10', '2022-11-14 22:26:12'),
(3, 'Formulir Katekisasi', 'Formulir-Katekisasi.pdf', 'Formulir ini diperlukan untuk jemaat yang akan menerima sidi', 'DITERBITKAN', '2022-01-07 10:16:16', NULL),
(4, 'Permohonan Sidi', 'Permohonan_Baptis-Sidi.pdf', 'Diperlukan untuk jemaat yang akan menerima sidi', 'DITERBITKAN', '2022-01-07 10:16:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id_keuangan` int(11) NOT NULL,
  `kegiatan` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `uang_masuk` int(11) DEFAULT NULL,
  `uang_keluar` int(11) DEFAULT NULL,
  `saldo_awal` int(11) NOT NULL,
  `saldo_akhir` int(11) NOT NULL,
  `tanggal_terima` date DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `tanggal_pencatatan` datetime NOT NULL,
  `is_debit` tinyint(4) DEFAULT NULL,
  `is_kredit` tinyint(4) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id_keuangan`, `kegiatan`, `keterangan`, `uang_masuk`, `uang_keluar`, `saldo_awal`, `saldo_akhir`, `tanggal_terima`, `tanggal_keluar`, `tanggal_pencatatan`, `is_debit`, `is_kredit`, `id_user`) VALUES
(3, 'Ibadah harian', 'Persembahan ibadah minggu tanggal 11 September 2022', 2000000, NULL, 0, 2000000, '2022-09-11', NULL, '2022-09-21 13:57:06', 1, NULL, 6),
(4, 'Non Ibadah', 'Sumbangan dari jemaat', 5000000, NULL, 2000000, 7000000, '2022-09-18', NULL, '2022-09-21 13:58:12', 1, NULL, 6),
(5, 'Perawatan ruangan', 'Perbaikan pada tembok ruangan', NULL, 5000000, 7000000, 2000000, NULL, '2022-09-20', '2022-09-21 19:42:42', NULL, 1, 6),
(6, 'Ibadah harian', 'Persembahan dari ibadah mingguan', 12000000, NULL, 2000000, 14000000, '2022-10-12', NULL, '2022-10-21 17:14:40', 1, NULL, 6),
(7, 'Donasi', 'Sumbangan ke panti asuhan', NULL, 2000000, 14000000, 12000000, NULL, '2022-11-08', '2022-11-11 14:52:28', NULL, 1, 6),
(8, 'Sumbangan', 'Sumbangan pribadi dari jemaat', 12000000, NULL, 12000000, 24000000, '2022-11-01', NULL, '2022-11-18 16:30:54', 1, NULL, 6),
(9, 'Sumbangan', 'Sumbangan pribadi dari jemaat', 2000000, NULL, 24000000, 26000000, '2022-11-02', NULL, '2022-11-18 16:31:26', 1, NULL, 6),
(10, 'Sumbangan', 'Sumbangan pribadi dari jemaat', 26000000, NULL, 26000000, 52000000, '2022-11-18', NULL, '2022-11-22 22:39:02', 1, NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nohp` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `alamat`, `nohp`, `email`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'Jl. Karet Raya Blok 22 No. 10 A, Perumnas I, Kel. Cibodasari, Kec. Cibodas, Tangerang, Banten-15138', '(021) 5520209', 'gkiperumnas@gmail.com', 1, '2021-12-08 20:22:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `konten_foto_ibadah`
--

CREATE TABLE `konten_foto_ibadah` (
  `id_foto_ibadah` int(11) NOT NULL,
  `momen` varchar(20) NOT NULL,
  `foto_ibadah` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konten_foto_ibadah`
--

INSERT INTO `konten_foto_ibadah` (`id_foto_ibadah`, `momen`, `foto_ibadah`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'natal', 'natal1.jpg', 1, '2022-05-08 20:15:00', '2022-10-15 16:20:24'),
(2, 'palmarum', 'palmarum1.jpg', 1, '2022-05-08 20:20:00', NULL),
(3, 'natal', 'natal2.jpg', 1, '2022-05-08 20:25:00', NULL),
(4, 'paskah', 'paskah1.jpg', 1, '2022-05-08 20:30:00', NULL),
(5, 'palmarum', 'palmarum2.jpg', 1, '2022-05-08 20:35:00', NULL),
(6, 'natal', 'natal3.jpg', 1, '2022-05-08 20:40:00', NULL),
(7, 'paskah', 'paskah2.jpg', 1, '2022-05-08 20:45:00', NULL),
(8, 'paskah', 'paskah3.jpg', 1, '2022-05-08 20:50:00', NULL),
(9, 'palmarum', 'palmarum3.jpg', 1, '2022-05-08 20:55:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `konten_slide`
--

CREATE TABLE `konten_slide` (
  `id_slide` int(11) NOT NULL,
  `judul_slide` varchar(50) NOT NULL,
  `deskripsi_slide` text NOT NULL,
  `gambar_slide` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konten_slide`
--

INSERT INTO `konten_slide` (`id_slide`, `judul_slide`, `deskripsi_slide`, `gambar_slide`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'Selamat Datang', '<p>Sebab di mana dua atau tiga orang berkumpul dalam nama-Ku,<br />di situ Aku ada di tengah-tengah mereka - Mat 18:20</p>', 'GedungUtama.jpg', 1, '2022-05-08 19:44:40', '2022-10-21 16:53:48'),
(2, 'Paduan Suara', '<p>Biarlah segala yang bernafas memuji Tuhan! Haleluya! - Mzm 150:6</p>', 'Choir.jpg', 1, '2022-05-08 19:44:45', '2022-10-21 16:56:50'),
(3, 'Sekolah Minggu', '<p>Ketika Yesus melihat hal itu, Ia marah dan berkata kepada mereka:<br />\"Biarkan anak-anak itu datang kepada-Ku, jangan menghalang-halangi mereka,<br />sebab orang-orang yang seperti itulah yang empunya Kerajaan Allah.\" - Mrk 10:14</p>', 'AnakSekolahMinggu.jpg', 1, '2022-05-08 19:50:00', '2022-10-21 16:56:58'),
(4, 'Lanjut Usia', '<p>Sampai masa tuamu Aku tetap Dia dan sampai masa putih rambutmu Aku menggendong kamu.<br />Aku telah melakukannya dan mau menanggung kamu terus;<br />Aku mau memikul kamu dan menyelamatkan kamu - Yes 46:4</p>', 'Lansia.png', 1, '2022-05-08 19:59:00', '2022-10-21 16:57:07'),
(5, 'Ibadah Raya', '<p>Karena itu, saudara-saudara, demi kemurahan Allah aku menasihatkan kamu,<br />supaya kamu mempersembahkan tubuhmu sebagai persembahan yang hidup,<br />yang kudus dan yang berkenan kepada Allah: itu adalah ibadahmu yang sejati - Rm 12:1</p>', 'ibadah-raya2.png', 1, '2022-05-08 20:00:00', '2022-11-07 22:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `level_user`
--

CREATE TABLE `level_user` (
  `id_level_user` int(11) NOT NULL,
  `level_user` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level_user`
--

INSERT INTO `level_user` (`id_level_user`, `level_user`) VALUES
(1, 'Admin'),
(2, 'Sekretariat'),
(3, 'Pendeta'),
(4, 'Bendahara');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_ruangan`
--

CREATE TABLE `peminjaman_ruangan` (
  `id_peminjaman` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `tanggal_booking` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `status_peminjaman` varchar(20) NOT NULL,
  `pesan` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman_ruangan`
--

INSERT INTO `peminjaman_ruangan` (`id_peminjaman`, `id_ruangan`, `id_anggota`, `keperluan`, `tanggal_booking`, `jam_mulai`, `jam_selesai`, `status_peminjaman`, `pesan`, `created_at`, `updated_at`) VALUES
(26, 4, 1, 'Rapat mingguan', '2022-12-20', '15:00:00', '18:00:00', 'DITERIMA', 'Peminjaman diterima', '2022-10-19 10:08:48', '2022-10-19 10:09:47'),
(27, 4, 1, 'rapat', '2022-10-22', '12:00:00', '14:00:00', 'SELESAI', 'SELESAI', '2022-10-21 11:22:30', '2022-10-23 17:07:53'),
(28, 4, 1, 'rapat', '2022-12-20', '19:00:00', '20:00:00', 'DITERIMA', 'Peminjaman diterima', '2022-10-21 11:33:19', '2022-10-21 11:34:56'),
(29, 2, 1, 'rapat', '2022-11-25', '13:00:00', '18:00:00', 'DITERIMA', 'Peminjaman diterima', '2022-11-13 16:10:46', '2022-11-13 16:11:46'),
(30, 3, 2, 'Untuk acara seminar', '2022-12-02', '14:00:00', '16:00:00', 'DITERIMA', 'Peminjaman diterima', '2022-11-13 16:18:08', '2022-11-13 16:21:54'),
(31, 2, 2, 'Rapat', '2022-11-25', '19:00:00', '20:00:00', 'SEDANG DIPROSES', NULL, '2022-11-13 16:19:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pendeta`
--

CREATE TABLE `pendeta` (
  `id_pendeta` int(11) NOT NULL,
  `no_pendeta` varchar(50) NOT NULL,
  `nama_lengkap_pendeta` varchar(100) NOT NULL,
  `alamat_pendeta` varchar(100) NOT NULL,
  `nohp_pendeta` varchar(30) NOT NULL,
  `email_pendeta` varchar(50) NOT NULL,
  `jenis_kelamin_pendeta` varchar(20) NOT NULL,
  `tanggal_lahir_pendeta` date NOT NULL,
  `foto_pendeta` varchar(100) NOT NULL,
  `status_pendeta` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendeta`
--

INSERT INTO `pendeta` (`id_pendeta`, `no_pendeta`, `nama_lengkap_pendeta`, `alamat_pendeta`, `nohp_pendeta`, `email_pendeta`, `jenis_kelamin_pendeta`, `tanggal_lahir_pendeta`, `foto_pendeta`, `status_pendeta`, `id_user`, `created_at`, `updated_at`) VALUES
(1, '00001', 'Maria', 'Jl. Anggur No. 3 Blok. A', '082732623142', 'pendeta001@example.com', 'Perempuan', '1978-12-01', 'profile_icon.jpg', 'PENDETA AKTIF', 5, '2022-05-11 23:06:54', '2022-11-14 22:25:31'),
(2, '00002', 'Yohanes', 'Jl. Rumah Mangga', '088270120023', 'nama@example.com', 'Laki-laki', '1989-12-14', 'profile_icon1.jpg', 'PENDETA AKTIF', 5, '2022-05-11 23:07:08', '2022-11-09 20:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `pengumpulan_dokumen`
--

CREATE TABLE `pengumpulan_dokumen` (
  `id_pengumpulan` int(11) NOT NULL,
  `id_dokumen` int(11) NOT NULL,
  `nama_lengkap_pengumpul` varchar(100) NOT NULL,
  `email_pengumpul` varchar(50) NOT NULL,
  `nama_dokumen` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumpulan_dokumen`
--

INSERT INTO `pengumpulan_dokumen` (`id_pengumpulan`, `id_dokumen`, `nama_lengkap_pengumpul`, `email_pengumpul`, `nama_dokumen`, `created_at`) VALUES
(3, 3, 'tes', 'testes@example.com', 'tes.zip', '2022-10-05 12:00:00'),
(4, 2, 'Test', 'jjjj@example.com', 'Tes2.zip', '2022-10-06 14:00:00'),
(5, 2, 'Thomas', 'thomas@gmail.com', 'Test.zip', '2022-11-12 22:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `perlengkapan` varchar(200) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status_ruangan` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`, `kapasitas`, `perlengkapan`, `foto`, `status_ruangan`, `created_at`, `updated_at`) VALUES
(1, 'Ibadah Umum', 300, '<ul>\r\n<li>Proyektor</li>\r\n<li>AC</li>\r\n<li>Perlengkapan Sound system</li>\r\n</ul>', 'ibadah-umum.jpg', 'TERSEDIA', '2022-09-08 14:59:55', '2022-11-14 22:25:54'),
(2, 'Majelis', 30, '<ul>\r\n<li>Proyektor</li>\r\n<li>TV</li>\r\n<li>AC</li>\r\n</ul>', 'majelis.jpg', 'TERSEDIA', '2022-09-08 15:00:02', '2022-11-05 12:34:29'),
(3, 'Aula', 40, '<ul>\r\n<li>2 Proyektor</li>\r\n<li>AC</li>\r\n<li>Perlengkapan sound system</li>\r\n</ul>', 'aula.jpg', 'TERSEDIA', '2022-09-08 15:00:06', NULL),
(4, 'Ruang Remaja', 30, '<ul>\r\n<li>Proyektor</li>\r\n<li>AC</li>\r\n<li>Papan tulis</li>\r\n</ul>', 'remaja.jpg', 'TERSEDIA', '2022-09-09 15:00:30', NULL),
(5, 'Ruang Dewasa', 30, '<ul>\r\n<li>TV</li>\r\n<li>AC</li>\r\n<li>Papan tulis</li>\r\n</ul>', 'dewasa.jpg', 'TERSEDIA', '2022-09-09 15:00:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_level_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `status_user` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_level_user`, `nama_lengkap`, `username`, `password`, `email_user`, `status_user`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin min', 'admin', '$2y$10$9KhGw19pT6w7zIjP2h/wD.zMBdQOU0GqqGb0i05wuJX4yvntK3TcG', 'contoh@example.com', 'AKTIF', '2022-09-18 20:18:08', '2022-10-11 09:01:06'),
(2, 2, 'Christella', 'stella', '$2y$10$zWa0ie9.mG4qe98Ax2L9POR5eRm0orxzPgLQalCxdkd.tY035Cay6', 'stella@gmail.com', 'AKTIF', '2022-09-18 20:13:20', '2022-10-22 21:25:28'),
(4, 3, 'Yohanes', 'yohanes', '$2y$10$jpLepgnYa5lmDmSm3I2fWe7guZ55EmtDxM4vLiAxQjSQFFcutZVc6', 'yohanes@gmail.com', 'AKTIF', '2022-09-19 21:27:47', '2022-11-07 22:17:42'),
(5, 2, 'Merry', 'sekretariat', '$2y$10$rMmoMktv2U/oS9vqK7EpFu7f9/0Z14oAyrWMIOea/n1kwwJLi8K26', 'satusatu@gmail.com', 'AKTIF', '2022-09-20 10:39:22', '2022-09-20 10:41:26'),
(6, 4, 'markus', 'markus', '$2y$10$SfzDnadVBTS4xmGtd15CruLdbqipmX/eEWi1NQ/O7/56J/evkdCky', 'electronicdm10@gmail.com', 'AKTIF', '2022-10-15 11:09:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `nama_wilayah` varchar(50) NOT NULL,
  `is_koordinator` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `nama_wilayah`, `is_koordinator`, `created_at`, `updated_at`) VALUES
(1, 'Wilayah 1', 1, '2022-02-02 10:38:48', '2022-11-14 22:30:50'),
(2, 'Wilayah 2', 1, '2022-02-02 10:38:55', '2022-02-10 10:42:39'),
(3, 'Wilayah 3', 1, '2022-02-02 10:39:02', '2022-02-10 10:42:44'),
(4, 'Wilayah 4', 1, '2022-02-08 10:39:07', '2022-02-10 10:42:49'),
(5, 'Wilayah 5', 1, '2022-02-08 10:39:08', '2022-10-19 10:51:05'),
(6, 'Wilayah 6', 1, '2022-02-08 10:39:20', '2022-02-10 10:43:00'),
(7, 'Wilayah 7', 1, '2022-02-08 10:39:27', '2022-11-24 11:02:16'),
(8, 'Bajem Kutabumi', 1, '2022-02-08 10:39:34', '2022-11-22 23:14:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_jemaat`
--
ALTER TABLE `anggota_jemaat`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `detail_wilayah`
--
ALTER TABLE `detail_wilayah`
  ADD PRIMARY KEY (`id_detail_wilayah`),
  ADD KEY `FK_ID_Anggota_Jemaat` (`koordinator_wilayah`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `konten_foto_ibadah`
--
ALTER TABLE `konten_foto_ibadah`
  ADD PRIMARY KEY (`id_foto_ibadah`);

--
-- Indexes for table `konten_slide`
--
ALTER TABLE `konten_slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indexes for table `level_user`
--
ALTER TABLE `level_user`
  ADD PRIMARY KEY (`id_level_user`);

--
-- Indexes for table `peminjaman_ruangan`
--
ALTER TABLE `peminjaman_ruangan`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `pendeta`
--
ALTER TABLE `pendeta`
  ADD PRIMARY KEY (`id_pendeta`);

--
-- Indexes for table `pengumpulan_dokumen`
--
ALTER TABLE `pengumpulan_dokumen`
  ADD PRIMARY KEY (`id_pengumpulan`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_jemaat`
--
ALTER TABLE `anggota_jemaat`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_wilayah`
--
ALTER TABLE `detail_wilayah`
  MODIFY `id_detail_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `konten_foto_ibadah`
--
ALTER TABLE `konten_foto_ibadah`
  MODIFY `id_foto_ibadah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `konten_slide`
--
ALTER TABLE `konten_slide`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `level_user`
--
ALTER TABLE `level_user`
  MODIFY `id_level_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peminjaman_ruangan`
--
ALTER TABLE `peminjaman_ruangan`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pendeta`
--
ALTER TABLE `pendeta`
  MODIFY `id_pendeta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengumpulan_dokumen`
--
ALTER TABLE `pengumpulan_dokumen`
  MODIFY `id_pengumpulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_wilayah`
--
ALTER TABLE `detail_wilayah`
  ADD CONSTRAINT `FK_ID_Anggota_Jemaat` FOREIGN KEY (`koordinator_wilayah`) REFERENCES `anggota_jemaat` (`id_anggota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
