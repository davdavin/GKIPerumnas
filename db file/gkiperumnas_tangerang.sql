-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2022 at 02:29 PM
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
  `no_anggota` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` char(255) NOT NULL,
  `nama_lengkap_anggota` text NOT NULL,
  `alamat_anggota` varchar(50) NOT NULL,
  `nohp_anggota` varchar(15) NOT NULL,
  `email_anggota` varchar(50) NOT NULL,
  `jenis_kelamin_anggota` varchar(20) NOT NULL,
  `golongan_darah_anggota` varchar(5) NOT NULL,
  `status_anggota` tinyint(4) NOT NULL,
  `pendidikan_anggota` varchar(50) NOT NULL,
  `pekerjaan_anggota` varchar(50) NOT NULL,
  `kelompok_etnis_anggota` varchar(50) NOT NULL,
  `tanggal_lahir_anggota` date NOT NULL,
  `tanggal_baptis_anggota` date DEFAULT NULL,
  `tanggal_sidi_anggota` date DEFAULT NULL,
  `tanggal_atestasi_masuk` date DEFAULT NULL,
  `tanggal_atestasi_keluar` date DEFAULT NULL,
  `tanggal_meninggal` date DEFAULT NULL,
  `tanggal_dkh` date DEFAULT NULL,
  `tanggal_ex_dkh` date DEFAULT NULL,
  `status_akun` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota_jemaat`
--

INSERT INTO `anggota_jemaat` (`id_anggota`, `id_wilayah`, `no_anggota`, `username`, `password`, `nama_lengkap_anggota`, `alamat_anggota`, `nohp_anggota`, `email_anggota`, `jenis_kelamin_anggota`, `golongan_darah_anggota`, `status_anggota`, `pendidikan_anggota`, `pekerjaan_anggota`, `kelompok_etnis_anggota`, `tanggal_lahir_anggota`, `tanggal_baptis_anggota`, `tanggal_sidi_anggota`, `tanggal_atestasi_masuk`, `tanggal_atestasi_keluar`, `tanggal_meninggal`, `tanggal_dkh`, `tanggal_ex_dkh`, `status_akun`) VALUES
(1, 1, '00001', '', '', 'Christella', 'Jl Melati', '0808273262314', 'electronicdm10@gmail.com', 'Perempuan', 'A', 1, 'S1', 'Karyawan', 'Sunda', '1999-10-05', '2017-10-06', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(2, 2, '00002', '', '', 'Sinta', 'Jl Melati', '0808273262314', 'electronicdm10@gmail.com', 'Perempuan', 'A', 1, 'S1', 'Karyawan', 'Sunda', '1998-01-23', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(3, 3, '00003', '', '', 'Philip', 'Jl Melati', '089283282121', 'contoh@example.com', 'Laki-laki', 'A', 1, 'S1', 'Karyawan', 'Sunda', '2000-12-16', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(4, 1, '00004', '', '', 'Bro', 'Jl. Apel ', '089283282121', 'contoh@example.com', 'Laki-laki', 'A', 1, 'S2', 'Karyawan', 'Sunda', '1996-02-09', '2021-01-01', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(5, 8, '00005', '', '', 'Toni', 'Jl. Apel ', '0808273262314', 'vinvin@gmail.com', 'Laki-laki', 'A', 1, 'S1', 'Karyawan', 'Sunda', '2000-09-16', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(6, 6, '00006', '', '', 'Marcelo', 'Jl. Apel ', '0808273262314', 'contoh@example.com', 'Laki-laki', 'A', 1, 'S1', 'Karyawan', 'Sunda', '1990-01-08', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(7, 7, '00007', '', '', 'Boy', 'Jl. Apel ', '089283282121', 'contoh@example.com', 'Laki-laki', 'A', 1, 'S1', 'Karyawan', 'Sunda', '1996-02-09', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(8, 4, '00008', '', '', 'Joseph', 'Jl. Apel ', '0808273262314', 'contoh@example.com', 'Laki-laki', 'A', 1, 'S1', 'Karyawan', 'Sunda', '1996-02-09', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(9, 2, '00009', '', '', 'Jack', 'Jl. Apel ', '0808273262314', 'brobro@example.com', 'Laki-laki', 'A', 1, 'S1', 'Karyawan', 'Sunda', '1990-10-21', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(10, 5, '000010', '', '', 'Yohanes', 'Jl. Apel ', '0808273262314', 'contoh@example.com', 'Laki-laki', 'A', 1, 'S1', 'Karyawan', 'Sunda', '1998-10-09', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(11, 5, '000011', '', '', 'Koko', 'Jl. Mangga', '088217231921', 'kokoko@example.com', 'Laki-laki', 'A', 1, 'S1', 'Karyawan', 'Jawa', '2000-10-01', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul_artikel` varchar(50) NOT NULL,
  `tipe_artikel` varchar(25) NOT NULL,
  `deskripsi_singkat` text NOT NULL,
  `isi` text DEFAULT NULL,
  `file` varchar(50) DEFAULT NULL,
  `tanggal_pembuatan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul_artikel`, `tipe_artikel`, `deskripsi_singkat`, `isi`, `file`, `tanggal_pembuatan`) VALUES
(1, 'KELUARGA YANG HIDUP DALAM PEMULIHAN', 'Renungan Harian', 'Markus 10 : 17 - 31', '<p><span style=\"font-weight: 400;\">Seringkali kita berpikir bahwa pemulihan atau penyembuhan adalah sebuah pencapaian dalam hidup beriman. Sederhananya karena saya sudah menjadi Kristen yang baik maka saya mendapatkan Anugerah pemulihan itu. Lalu kalau saya Kristen yang tidak baik maka yang terjadi sebaliknya. Pada dasarnya kita tahu bahwa karya Allah tidak bergerak seperti itu, Karya Allah bukan honor berbuat baik atau pahala.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Tetapi Karya Allah adalah Anugerah&hellip;. Anugerah berarti bicara sesuatu yang dianugerahkan (diberikan) secara cuma-cuma. Lalu apa standart orang yang layak mendapatkan Anugerah, jawabnya kesetiaan.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Kesetiaan untuk hidup dalam Rancangan-Nya, kesetiaan mengikuti ajaran-Nya. Mengalami Anugerah adalah mau setia dalam rancangan Allah. Itulah mengapa Yesus berkata:</span></p>\r\n<p><em><span style=\"font-weight: 400;\">\"Hanya satu lagi kekuranganmu: pergilah, juallah apa yang kaumiliki dan berikanlah itu kepada orang-orang miskin, maka engkau akan beroleh harta di sorga, kemudian datanglah ke mari dan ikutlah Aku.\" (Mar 10:21).</span></em></p>\r\n<p><span style=\"font-weight: 400;\">Dan respon sang anak muda itu adalah kecewa dan sedih karena banyak hartanya. Response kesedihan itu tentu saja karena sang anak muda merasa rencana Allah tak sesuai dengan rancangannya. kita selalu ingin rancangan Allah sesuai dengan kita, dan tak jarang memaksakannya. Hal yang sama mungkin kita paksa kan juga kepada anggota keluarga kita.</span></p>\r\n<p><span style=\"font-weight: 400;\">Orang tua memaksakan rancangan nya pada anaknya, suami pada istrinya, dst. Padahal rancangan kita belum tentu rancangan Allah atas hidup mereka. Itulah mengapa Yesus berkata sukarlah memang untuk masuk kerajaan Allah (ay .24). Karena masuk kerajaan Allah berarti menemukan dan menghidupi rancangan Allah atas keluarga kita.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Jadi dapat disimpulkan pemulihan adalah proses perjalanan dalam menghidupi rancangan, Mengikuti rancangan Nya berarti mau melakukan kehendak Nya, setia pada ketetapan Nya, dan bersedia berkarya bagi sesama.</span></p>\r\n<p>&nbsp;</p>\r\n<p style=\"text-align: center;\"><strong><em>Jadikanlah Rancangan-Rancangan Allah sebagai yang terutama maka kita akan merasakan Pemulihan-Nya.</em></strong></p>', NULL, '2022-02-01'),
(2, 'Sejarah Singkat GKI Perumnas', 'Artikel Lainnya', 'GKI Perumnas awalnya terbentuk dari beberapa keluarga Kristen yang berdomisili di daerah Perumnas 1 dan 2.', '<p style=\"text-align: justify; line-height: 1.4;\"><span style=\"font-family: helvetica, arial, sans-serif; font-size: 12pt;\">GKI Perumnas awalnya terbentuk dari beberapa keluarga Kristen yang berdomisili di daerah Perumnas 1 dan 2. Yang sering kali bertemu dalam perjalanan menuju ke GKI Sutopo atau perjalanan pulang ke rumah dengan menaiki kendaraan angkutan kota. Dari perkenalan beberapa keluarga yang sama-sama beribadah di GKI Sutopo, akhirnya terbentuklah paduan suara wilayah Perumnas yang seringkali berlatih di rumah keluarga Andreas atau Totok Suroto. Setelah paduan suara wilayah rutin berlatih akhirnya mulailah dibentuk sekolah minggu bagi anak-anak. Juga dilaksanakan perayaan natal dan paskah untuk anak-anak sekolah minggu dengan menggunakan gedung sekolah SMP 5. Ketika kegiatan sekolah Minggu sudah mulai rutin barulah kemudian dibentuk KRT (Kebaktian Rumah Tangga) di beberapa rumah anggota Jemaat. Dan ketika KRT sudah mulai rutin akhirnya disepakati untuk membuat pos Jemaat sekitar tahun 1985an. Setelah melalui proses yang panjgan menjadi bakal Jemaat akhirnya didewasakan menjadi jemaat yang ke-75 pada tanggal 31 Oktober 1995.</span></p>', NULL, '2021-12-08'),
(4, 'Test1', 'Renungan Harian', 'okoke', '<p>Oke</p>', NULL, '2022-05-09'),
(5, 'Test2', 'Renungan Harian', 'lalalal', '<p>Tess</p>', NULL, '2022-05-09'),
(6, 'Test Yu', 'Renungan Harian', 'sa', '<p>sa</p>', NULL, '2022-06-28'),
(10, 'Test Test', 'Renungan Harian', 'Test Lagi', '<p>Oke</p>', NULL, '2022-09-20'),
(11, 'Test Warta', 'Warta Jemaat', 'Test test', NULL, '12677144Konsultasi1.pdf', '2022-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `coba_ruangan`
--

CREATE TABLE `coba_ruangan` (
  `id_coba_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coba_ruangan`
--

INSERT INTO `coba_ruangan` (`id_coba_ruangan`, `nama_ruangan`) VALUES
(1, 'rapat'),
(2, 'meeting');

-- --------------------------------------------------------

--
-- Table structure for table `detail_coba_ruangan`
--

CREATE TABLE `detail_coba_ruangan` (
  `id_detail_coba_ruangan` int(11) NOT NULL,
  `id_coba_ruangan` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_coba_ruangan`
--

INSERT INTO `detail_coba_ruangan` (`id_detail_coba_ruangan`, `id_coba_ruangan`, `gambar`) VALUES
(1, 1, 'https://c0.wallpaperflare.com/preview/483/210/436/car-green-4x4-jeep.jpg'),
(2, 1, 'https://www.newsbtc.com/wp-content/uploads/2020/06/mesut-kaya-LcCdl__-kO0-unsplash-scaled.jpg'),
(3, 1, 'https://images6.alphacoders.com/312/thumb-1920-312773.jpg'),
(4, 2, 'https://c0.wallpaperflare.com/preview/483/210/436/car-green-4x4-jeep.jpg\"'),
(5, 1, 'https://www.newsbtc.com/wp-content/uploads/2020/06/mesut-kaya-LcCdl__-kO0-unsplash-scaled.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `kode_dokumen` varchar(20) NOT NULL,
  `jenis_dokumen` varchar(50) NOT NULL,
  `dokumen` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `kode_dokumen`, `jenis_dokumen`, `dokumen`, `keterangan`) VALUES
(1, 'DKM1', 'Formulir Persyaratan Pendaftaran Jemaat baru', 'Syarat_menjadi_anggota_jemaat.pdf', 'Syarat menjadi jemaat baru'),
(2, 'DKM2', 'Formulir Permohonan Baptis Anak', 'Permohonan_Baptis_Anak.pdf', 'Permohonan untuk menerima baptis anak'),
(3, 'DKM3', 'Formulir Katekisasi', 'Formulir-Katekisasi.pdf', 'Formulir ini diperlukan untuk jemaat yang akan menerima sidi'),
(4, 'DKM4', 'Permohonan Sidi', 'Permohonan_Baptis-Sidi.pdf', 'Diperlukan untuk jemaat yang akan menerima sidi');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id_keuangan` int(11) NOT NULL,
  `kegiatan` varchar(50) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `uang_masuk` int(11) DEFAULT NULL,
  `uang_keluar` int(11) DEFAULT NULL,
  `saldo_awal` int(11) NOT NULL,
  `saldo_akhir` int(11) NOT NULL,
  `tanggal_terima` date DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `tanggal_pencatatan` datetime NOT NULL,
  `is_debit` int(11) DEFAULT NULL,
  `is_kredit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id_keuangan`, `kegiatan`, `keterangan`, `uang_masuk`, `uang_keluar`, `saldo_awal`, `saldo_akhir`, `tanggal_terima`, `tanggal_keluar`, `tanggal_pencatatan`, `is_debit`, `is_kredit`) VALUES
(3, 'Ibadah harian', 'Persembahan ibadah minggu tanggal 11 September 2022', 2000000, NULL, 0, 2000000, '2022-09-11', NULL, '2022-09-21 13:57:06', 1, NULL),
(4, 'Non Ibadah', 'Sumbangan dari jemaat', 5000000, NULL, 2000000, 7000000, '2022-09-18', NULL, '2022-09-21 13:58:12', 1, NULL),
(5, 'Kegiatan Kemanusiaan', 'Menyumbang', NULL, 5000000, 7000000, 2000000, NULL, '2022-09-20', '2022-09-21 19:42:42', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `konten_foto_ibadah`
--

CREATE TABLE `konten_foto_ibadah` (
  `id_foto_ibadah` int(11) NOT NULL,
  `momen` varchar(20) NOT NULL,
  `foto_ibadah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konten_foto_ibadah`
--

INSERT INTO `konten_foto_ibadah` (`id_foto_ibadah`, `momen`, `foto_ibadah`) VALUES
(1, 'natal', 'natal1.jpg'),
(2, 'palmarum', 'palmarum1.jpg'),
(3, 'natal', 'natal2.jpg'),
(4, 'paskah', 'paskah1.jpg'),
(5, 'palmarum', 'palmarum2.jpg'),
(6, 'natal', 'natal3.jpg'),
(7, 'paskah', 'paskah2.jpg'),
(8, 'paskah', 'paskah3.jpg'),
(9, 'palmarum', 'palmarum3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `konten_slide`
--

CREATE TABLE `konten_slide` (
  `id_slide` int(11) NOT NULL,
  `judul_slide` text NOT NULL,
  `deskripsi_slide` text NOT NULL,
  `gambar_slide` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konten_slide`
--

INSERT INTO `konten_slide` (`id_slide`, `judul_slide`, `deskripsi_slide`, `gambar_slide`) VALUES
(1, 'Selamat Datang', '<p>Sebab di mana dua atau tiga orang berkumpul dalam nama-Ku,<br />di situ Aku ada di tengah-tengah mereka - Mat 18:20</p>', 'GedungUtama.jpg'),
(2, 'Paduan Suara', '<p>Biarlah segala yang bernafas memuji Tuhan! Haleluya! - Mzm 150:6</p>', 'Choir.jpg'),
(3, 'Sekolah Minggu', '<p>Ketika Yesus melihat hal itu, Ia marah dan berkata kepada mereka: \"Biarkan anak-anak itu datang kepada-Ku, jangan mengahalang-hlangi mereka, sebab orang-orang yang seperti itulah yang empunya Kerajaan Allah.\" - Mrk 10:14</p>', 'AnakSekolahMinggu.jpg'),
(4, 'Lanjut Usia', '<p>Sampai masa tuamu Aku tetap Dia dan sampai masa putih rambutmu Aku menggendong kamu.<br />Aku telah melakukannya dan mau menanggung kamu terus;<br />Aku mau memikul kamu dan menyelamatkan kamu - Yes 46:4</p>', 'Lansia.png'),
(5, 'Ibadah Raya', '<p>Karena itu, saudara-saudara, demi kemurahan Allah aku menasihatkan kamu,<br />supaya kamu mempersembahkan tubuhmu sebagai persembahan yang hidup,<br />yang kudus dan yang berkenan kepada Allah: itu adalah ibadahmu yang sejati - Rm 12:1</p>', 'ibadah-raya2.png');

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
(1, 'Sekretaris Umum'),
(2, 'Wakil Sekretaris Umum'),
(3, 'Pendeta'),
(4, 'Calon Pendeta'),
(5, 'Bendahara');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_ruangan`
--

CREATE TABLE `peminjaman_ruangan` (
  `id_peminjaman` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `no_anggota` varchar(100) DEFAULT NULL,
  `nama_peminjam` varchar(50) NOT NULL,
  `email_peminjam` varchar(50) NOT NULL,
  `nohp_peminjam` varchar(15) NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `tanggal_booking` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `status_peminjaman` varchar(20) NOT NULL,
  `is_notif` tinyint(4) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman_ruangan`
--

INSERT INTO `peminjaman_ruangan` (`id_peminjaman`, `id_ruangan`, `no_anggota`, `nama_peminjam`, `email_peminjam`, `nohp_peminjam`, `keperluan`, `tanggal_booking`, `jam_mulai`, `jam_selesai`, `status_peminjaman`, `is_notif`, `is_deleted`) VALUES
(1, 1, NULL, 'Kevin', 'satusatu@gmail.com', '089283282121', 'Seminar', '2022-10-09', '10:04:00', '15:00:00', 'SEDANG DIPROSES', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pendeta`
--

CREATE TABLE `pendeta` (
  `id_pendeta` int(11) NOT NULL,
  `no_pendeta` varchar(20) NOT NULL,
  `nama_lengkap_pendeta` text NOT NULL,
  `alamat_pendeta` varchar(50) NOT NULL,
  `nohp_pendeta` varchar(15) NOT NULL,
  `email_pendeta` varchar(50) NOT NULL,
  `jenis_kelamin_pendeta` varchar(20) NOT NULL,
  `tanggal_lahir_pendeta` date NOT NULL,
  `foto_pendeta` varchar(50) NOT NULL,
  `status_pendeta` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendeta`
--

INSERT INTO `pendeta` (`id_pendeta`, `no_pendeta`, `nama_lengkap_pendeta`, `alamat_pendeta`, `nohp_pendeta`, `email_pendeta`, `jenis_kelamin_pendeta`, `tanggal_lahir_pendeta`, `foto_pendeta`, `status_pendeta`) VALUES
(1, '00001', 'Pdt. Suryatie Ambarsari', 'Jl. Anggur No. 3 Blok. A', '082732623142', 'pendeta001@example.com', 'Perempuan', '1978-12-01', 'GembalaGereja1.jpg', 1),
(2, '00002', 'Pnt. Irving BNW Gultom', 'Jl. Rumah Apel', '088270120023', 'nama@example.com', 'Laki-laki', '1989-12-14', 'GembalaGereja2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengumpulan_dokumen`
--

CREATE TABLE `pengumpulan_dokumen` (
  `id_pengumpulan` int(11) NOT NULL,
  `id_dokumen` int(11) NOT NULL,
  `nama_lengkap_pengumpul` text NOT NULL,
  `email_pengumpul` varchar(50) NOT NULL,
  `kumpul_dokumen` varchar(100) NOT NULL,
  `tanggal_kumpul` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumpulan_dokumen`
--

INSERT INTO `pengumpulan_dokumen` (`id_pengumpulan`, `id_dokumen`, `nama_lengkap_pengumpul`, `email_pengumpul`, `kumpul_dokumen`, `tanggal_kumpul`) VALUES
(3, 3, 'tes', 'testes@example.com', 'tes.zip', '2022-10-05');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_perubahan_data_jemaat`
--

CREATE TABLE `permintaan_perubahan_data_jemaat` (
  `id_permintaan` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `nohp_baru` varchar(255) DEFAULT NULL,
  `email_baru` varchar(255) DEFAULT NULL,
  `alamat_baru` varchar(255) DEFAULT NULL,
  `pekerjaan_baru` varchar(255) DEFAULT NULL,
  `pendidikan_baru` varchar(255) DEFAULT NULL,
  `tanggal_permintaan` datetime NOT NULL,
  `is_notif` tinyint(4) NOT NULL,
  `is_updated` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `perlengkapan` varchar(200) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`, `kapasitas`, `perlengkapan`, `foto`) VALUES
(1, 'Ibadah Umum', 5000, '<ul>\r\n<li>Proyektor</li>\r\n<li>AC</li>\r\n<li>Sound system</li>\r\n</ul>', 'ibadah-umum.jpg'),
(2, 'Majelis', 30, '<ul>\r\n<li>Proyektor</li>\r\n<li>TV</li>\r\n<li>AC</li>\r\n<li>dll</li>\r\n</ul>', 'majelis.jpg'),
(3, 'Sekolah Minggu 1', 30, '<ul>\r\n<li>Meja</li>\r\n<li>Kursi</li>\r\n<li>Papan Tulis</li>\r\n</ul>', 'sekolah-minggu-1.jpg'),
(4, 'Sekolah Minggu 2', 30, '<ul>\r\n<li>Meja</li>\r\n<li>Kursi</li>\r\n<li>Papan Tulis</li>\r\n</ul>', 'sekolah-minggu-2.jpg'),
(5, 'Sekolah Minggu 3', 30, '<ul>\r\n<li>Meja</li>\r\n<li>Kursi</li>\r\n<li>Papan Tulis</li>\r\n</ul>', 'sekolah-minggu-3.jpg'),
(6, 'Aula', 200, '<ul>\r\n<li>2 Proyektor</li>\r\n<li>AC</li>\r\n<li>Perlengkapan sound system</li>\r\n</ul>', 'aula.jpg'),
(7, 'Ruang Remaja', 30, '<ul>\r\n<li>Proyektor</li>\r\n<li>AC</li>\r\n<li>Papan tulis</li>\r\n</ul>', 'remaja.jpg'),
(8, 'Ruang Dewasa', 30, '<ul>\r\n<li>TV</li>\r\n<li>AC</li>\r\n<li>Papan tulis</li>\r\n</ul>', 'dewasa.jpg');

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
  `status_user` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_level_user`, `nama_lengkap`, `username`, `password`, `email_user`, `status_user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Admin min', 'admin', '$2y$10$y2DQ4/TFFDm7A5.alm1c3OX93i.EgNjlnTAExsa38vHJhcttxODwC', 'contoh@example.com', 1, '2022-09-18 20:18:08', '2022-10-04 15:02:08', NULL),
(2, 1, 'Christella', 'stella', '$2y$10$zWa0ie9.mG4qe98Ax2L9POR5eRm0orxzPgLQalCxdkd.tY035Cay6', 'stella@gmail.com', 1, '2022-09-18 20:13:20', NULL, NULL),
(4, 5, 'Yohanes', 'yohanes', '$2y$10$G47i23zMHD/AHmAWCePEKOViFcJgfD1WWSAQCnMV/xHfZ4VYJEkpm', 'yohanes@gmail.com', 1, '2022-09-19 21:27:47', '2022-09-19 21:32:55', NULL),
(5, 2, 'B', 'bbbbb', '$2y$10$rMmoMktv2U/oS9vqK7EpFu7f9/0Z14oAyrWMIOea/n1kwwJLi8K26', 'satusatu@gmail.com', 1, '2022-09-20 10:39:22', '2022-09-20 10:41:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `kode_wilayah` varchar(20) NOT NULL,
  `koordinator_wilayah` int(11) NOT NULL,
  `nama_wilayah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `kode_wilayah`, `koordinator_wilayah`, `nama_wilayah`) VALUES
(1, 'WIL1', 1, 'Wilayah 1'),
(2, 'WIL2', 2, 'Wilayah 2'),
(3, 'WIL3', 3, 'Wilayah 3'),
(4, 'WIL4', 8, 'Wilayah 4'),
(5, 'WIL5', 11, 'Wilayah 5'),
(6, 'WIL6', 6, 'Wilayah 6'),
(7, 'WIL7', 7, 'Wilayah 7'),
(8, 'WIL8', 5, 'Bajem Kutabumi');

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
-- Indexes for table `coba_ruangan`
--
ALTER TABLE `coba_ruangan`
  ADD PRIMARY KEY (`id_coba_ruangan`);

--
-- Indexes for table `detail_coba_ruangan`
--
ALTER TABLE `detail_coba_ruangan`
  ADD PRIMARY KEY (`id_detail_coba_ruangan`),
  ADD KEY `FK_ID_COBA_RUANGAN` (`id_coba_ruangan`);

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
-- Indexes for table `permintaan_perubahan_data_jemaat`
--
ALTER TABLE `permintaan_perubahan_data_jemaat`
  ADD PRIMARY KEY (`id_permintaan`);

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
  ADD PRIMARY KEY (`id_wilayah`),
  ADD KEY `FK_ID_Anggota_Jemaat` (`koordinator_wilayah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_jemaat`
--
ALTER TABLE `anggota_jemaat`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `coba_ruangan`
--
ALTER TABLE `coba_ruangan`
  MODIFY `id_coba_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_coba_ruangan`
--
ALTER TABLE `detail_coba_ruangan`
  MODIFY `id_detail_coba_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id_level_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `peminjaman_ruangan`
--
ALTER TABLE `peminjaman_ruangan`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pendeta`
--
ALTER TABLE `pendeta`
  MODIFY `id_pendeta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengumpulan_dokumen`
--
ALTER TABLE `pengumpulan_dokumen`
  MODIFY `id_pengumpulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permintaan_perubahan_data_jemaat`
--
ALTER TABLE `permintaan_perubahan_data_jemaat`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_coba_ruangan`
--
ALTER TABLE `detail_coba_ruangan`
  ADD CONSTRAINT `FK_ID_COBA_RUANGAN` FOREIGN KEY (`id_coba_ruangan`) REFERENCES `coba_ruangan` (`id_coba_ruangan`);

--
-- Constraints for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD CONSTRAINT `FK_ID_Anggota_Jemaat` FOREIGN KEY (`koordinator_wilayah`) REFERENCES `anggota_jemaat` (`id_anggota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
