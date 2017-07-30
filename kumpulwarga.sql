-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Jun 2017 pada 08.03
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kumpulwarga`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(20) NOT NULL,
  `id_rt` int(14) NOT NULL,
  `id_rj` int(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` text,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `status_agenda` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `id_rt`, `id_rj`, `title`, `description`, `start`, `end`, `lokasi`, `status_agenda`) VALUES
(1, 4, 1, 'Buka Bersama Warga Kampung', 'Buka bersama akan dilaksanakan bersama dengan bapak Kades. Sehingga dimohon untuk warga dapat berpartisipasi', '2017-06-11', '2017-06-11', 'Mbah Dull', 'Penting'),
(2, 5, 5, 'Kerja Bakti Kampung', 'Sehubungan akan diadakanya solat Ied bersama yang bertempat di Lap. Wirun. Kami memohon seluruh warga untuk dapat ikut berpartisipasi.', '2017-06-04', '2017-06-04', 'Lapangan Wirun', 'Penting'),
(3, 4, 1, 'Rapat Halal Bi Halal', 'Kepada seluruh warga desa. Sehubungan dengan akan diadakanya acara halal bi halal tingkat kampung di dk. Ngambak Kalang. Maka, kami pengurus karang taruna "IDAMAN" dk. Ngambak Kalang mengundang seluruh warga untuk berpartisipasi dalam rapat yang akan diadakan pada tanggal 10 Juni 2017 bakda tarawih, di lumbung tercinta.\r\n\r\nTerimakasih atas perhatianya.', '2017-06-10', '2017-06-10', 'Lumbung Dk. Ngambak Kalang', 'Penting'),
(4, 5, 5, 'Pengajian Akbar', 'Akan diadakan pengajian akbar yang akan mengundang ustad Salim A. Fillah dari Jogokaryan.\r\nTidak dipungut biaya.', '2017-06-11', '2017-06-11', 'Masjid Miftahul Huda', 'Penting'),
(5, 5, 5, 'Piknik Karang Taruna', 'Akan diadakan piknik karang taruna dengan biaya sendiri.', '2017-06-22', '2017-06-23', 'Bali', 'Penting'),
(6, 4, 1, 'Gerak Jalan', 'Ayo datang dan menangkan', '2017-06-06', '2017-06-14', 'Cakruk Perempatan', 'Penting'),
(7, 4, 1, 'Lomba Band', 'Ayo semua ikut lomba band', '2017-06-07', '2017-06-21', 'Perempatan', 'Kurang Penting'),
(8, 5, 5, 'Rapat Sholat Ied', 'Sehubungan akan diadakanya sholat ied bersama, maka kami dari kelurahan akan mengadakan rapat bersama dengan bapak-bapak di balai desa. terimakasih', '2017-06-12', '2017-06-12', 'Balai Desa Wirun', 'Sangat Penting'),
(9, 5, 5, 'Sholat Ied Kampung', 'Datanglah, untuk memperkuat ukhuwah', '2017-06-25', '2017-06-27', 'Lapangan Wirun', 'Sangat Penting'),
(10, 5, 5, 'Lomba Mancing', 'Silahkan yang ingin ikut lomba memancing, segera mendaftarkan diri melaui RT setempat', '2017-06-05', '2017-06-10', 'Embung Pengantin', 'Kurang Penting'),
(11, 5, 5, 'Lomba Anak-anak', 'Bagi anaknya yang ingin ikut lomba, segera mendaftak kepada pengurus karang taruna', '2017-06-13', '2017-06-17', 'Gantangan NGK', 'Kurang Penting'),
(12, 5, 5, 'Agenda Mundur', 'Coba saja kalo bisa', '2017-06-03', '2017-06-01', 'Seberang Laut', 'Sangat Penting'),
(13, 4, 1, 'Touring ke Bali', 'Bagi yang hobi touring, boleh ikutan', '2017-06-11', '2017-06-12', 'Bali', 'Kurang Penting'),
(14, 4, 1, 'Idul Fitri', 'Sholata Idul Fitri bareng satu kampung.', '2017-06-25', '2017-06-26', 'Lapangan Wirun', 'Sangat Penting'),
(15, 4, 1, 'Mancing Bareng', 'Ayo ikuti lomba memancing', '2017-06-04', '2017-06-04', 'Mblumbang', 'Tidak Penting'),
(16, 5, 5, 'Agenda Lucu', 'Ayo ikuti saja', '2017-06-04', '2017-06-06', 'Pasar', 'Sangat Penting'),
(17, 5, 5, 'Sepeda Hias', 'Semua warga kumpul dengan menghias sepedanya masing-masing.', '2017-06-18', '2017-06-18', 'Masjid Miftahul Huda', 'Penting'),
(18, 5, 5, 'Mancing Bareng yeee', '', '2017-06-01', '2017-06-20', 'solo', 'Kurang Penting'),
(19, 5, 5, 'Agenda Lucu hehe', '', '2017-06-23', '2017-06-29', 'Bali', 'Tidak Penting'),
(20, 5, 5, 'Piknik Bareng Angga', 'Ayo yang mau ikut, bisa ikutan', '2017-06-29', '2017-06-29', 'Pantai Jurug', 'Kurang Penting');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dusun`
--

CREATE TABLE `dusun` (
  `id_dusun` int(10) NOT NULL,
  `nama_dusun` varchar(30) DEFAULT NULL,
  `id_kel` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dusun`
--

INSERT INTO `dusun` (`id_dusun`, `nama_dusun`, `id_kel`) VALUES
(1, 'ngambak kalang', 1),
(2, 'kebak', 1),
(3, 'mertan', 1),
(4, 'pabrik', 1),
(5, 'plumbon', 1),
(6, 'wirun', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(10) NOT NULL,
  `nama_gambar` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `nama_gambar`) VALUES
(1, 'Buzz_ERDiagram.jpg'),
(2, 'photo4.jpg'),
(3, 'avatar.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `id_inventaris` int(20) NOT NULL,
  `id_rt` int(14) NOT NULL,
  `id_rj` int(20) NOT NULL,
  `nama_inventaris` varchar(30) DEFAULT NULL,
  `jumlah_inventaris` int(5) DEFAULT NULL,
  `deskripsi_inventaris` text,
  `kondisi_inventaris` varchar(15) DEFAULT NULL,
  `biaya_pinjam` double(20,0) DEFAULT NULL,
  `gambar_inventaris` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`id_inventaris`, `id_rt`, `id_rj`, `nama_inventaris`, `jumlah_inventaris`, `deskripsi_inventaris`, `kondisi_inventaris`, `biaya_pinjam`, `gambar_inventaris`) VALUES
(1, 5, 5, 'Kursi Plastik', 500, 'Kursi plastik untuk diduki. Sangat nyaman dan tidak mudah patah', 'baik', 200000, 'photo2.png'),
(2, 5, 5, 'Gelas', 500, 'Gelas kaca, tidak mudah pecah', 'baik', 100000, 'photo2.png'),
(4, 5, 5, 'Meja', 50, 'Meja kayu, yang mudah dibawa bawa kemana saja. Boleh dipinjam asal kembali', 'baik', 50000, 'photo4.jpg'),
(5, 5, 5, 'Panci', 10, 'peralatan masak yang aduhai keren sekali.', 'hilang', 10000, 'photo3.jpg'),
(6, 5, 5, 'Meja Besi', 50, 'Meja besi yang lebih ringan dari pada meja kayu.', 'rusak', 50000, 'photo4.jpg'),
(7, 4, 1, 'Kursi Besi', 100, 'Kursi bersi, kuat tapi berat. Yang minat, silahkan dipinjam.', 'baik', 5000, 'photo4.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_j` int(20) NOT NULL,
  `nama_j` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_j`, `nama_j`) VALUES
(1, 'Ketua RT'),
(2, 'Ketua RW'),
(3, 'Lurah'),
(4, 'Camat'),
(5, 'Bupati');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kab` int(20) NOT NULL,
  `nama_kab` varchar(30) DEFAULT NULL,
  `id_prov` int(20) NOT NULL,
  `pos_kab` varchar(5) DEFAULT NULL,
  `kode_kab` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kabupaten`
--

INSERT INTO `kabupaten` (`id_kab`, `nama_kab`, `id_prov`, `pos_kab`, `kode_kab`) VALUES
(1, 'sukoharjo', 1, NULL, NULL),
(2, 'surakarta', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kec` int(20) NOT NULL,
  `nama_kec` varchar(30) DEFAULT NULL,
  `id_kab` int(20) NOT NULL,
  `kode_kec` varchar(2) DEFAULT NULL,
  `pos_kec` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kec`, `nama_kec`, `id_kab`, `kode_kec`, `pos_kec`) VALUES
(1, 'mojolaban', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kel` int(20) NOT NULL,
  `nama_kel` varchar(30) DEFAULT NULL,
  `pos_kel` varchar(10) DEFAULT NULL,
  `id_kec` int(20) NOT NULL,
  `lat` varchar(20) DEFAULT NULL,
  `lng` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelurahan`
--

INSERT INTO `kelurahan` (`id_kel`, `nama_kel`, `pos_kel`, `id_kec`, `lat`, `lng`) VALUES
(1, 'wirun', NULL, 1, NULL, NULL),
(2, 'bekonang', NULL, 1, NULL, NULL),
(3, 'palur', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keuangan`
--

CREATE TABLE `keuangan` (
  `id_keuangan` int(20) NOT NULL,
  `id_rt` int(14) NOT NULL,
  `id_rj` int(20) NOT NULL,
  `nominal` double(20,0) DEFAULT NULL,
  `status_uang` varchar(6) DEFAULT NULL,
  `keterangan_uang` varchar(100) DEFAULT NULL,
  `tgl_uang` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keuangan`
--

INSERT INTO `keuangan` (`id_keuangan`, `id_rt`, `id_rj`, `nominal`, `status_uang`, `keterangan_uang`, `tgl_uang`) VALUES
(1, 4, 1, 100000, 'masuk', 'Uang dari donatur untuk acara halal bi halal.', '2017-06-20'),
(2, 4, 1, 100000, 'masuk', 'Uang pendapatan dari parkir Karang Taruna.', '2017-06-05'),
(3, 4, 1, 100000, 'keluar', 'Untuk makanan pembuka dan rapat akbar sekampung,\r\nlalu dilanjutkan menyanyi bersama sama.', '2017-06-13'),
(4, 4, 1, 100000, 'masuk', 'Uang parkir sera.', '2017-06-26'),
(5, 4, 1, 100000, 'masuk', 'Uang iuran ibu ibu PKK', '2017-06-11'),
(6, 4, 1, 100000, 'masuk', 'Uang pembangunan selokan dari pak lurah.', '2017-06-06'),
(7, 4, 1, 100000, 'keluar', 'Untuk beli semen dan pasir', '2017-06-19'),
(8, 4, 1, 100000, 'keluar', 'Makan makan kampung', '2017-06-12'),
(9, 4, 1, 100000, 'keluar', 'Perbaikan lampu lumbung', '2017-06-07'),
(10, 4, 1, 100000, 'keluar', 'Pembangunan Genteng di sekitar lumbung.', '2017-06-26'),
(11, 4, 1, 100000, 'masuk', 'Bongkar celengan karang taruna.', '2017-06-13'),
(12, 4, 1, 100000, 'keluar', 'Penanaman seribu pohon bersma mahasiswa KKN.', '2017-06-12'),
(13, 4, 1, 100000, 'keluar', 'pembangunan rumah sakit', '2017-05-29'),
(14, 5, 1, 100000, 'masuk', 'Donatur warga', '2017-06-19'),
(15, 5, 1, 100000, 'masuk', 'Iuran bapak-bapak', '2017-06-20'),
(16, 5, 1, 100000, 'keluar', 'Uang panas, hati hati', '2017-05-08'),
(17, 5, 1, 300000, 'masuk', 'Uang panas nih, hati hati', '2017-05-21'),
(18, 5, 1, 500000, 'masuk', 'Uang dari juragan genting', '2017-06-05'),
(19, 5, 1, 500000, 'masuk', 'Uang dari kepengurusan sebelumnya', '2017-01-02'),
(20, 5, 5, 4000000, 'masuk', 'Pencarian proposal dari Kelurahan', '2017-06-02'),
(21, 5, 5, 4000000, 'keluar', 'Sisa uang pembangunan selokan dari Keluarahan', '2017-06-19'),
(22, 5, 5, 5000000, 'masuk', 'Uang pembangunan lapangan', '2017-06-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(20) NOT NULL,
  `id_pdk` int(20) NOT NULL,
  `id_inventaris` int(20) NOT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `total_bayar` double(20,0) DEFAULT NULL,
  `status_peminjaman` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_pdk`, `id_inventaris`, `tgl_pinjam`, `tgl_kembali`, `total_bayar`, `status_peminjaman`) VALUES
(1, 2, 1, '2017-06-13', '2017-06-15', 4000000, 'disetujui'),
(2, 2, 2, '2017-06-14', '2017-06-17', 5000000, 'kembali'),
(4, 2, 2, '2017-06-13', '2017-06-15', 5000000, 'kembali'),
(5, 2, 4, '2017-06-06', '2017-06-14', 50000, 'disetujui'),
(6, 2, 4, '2017-06-20', '2017-06-22', 50000, 'disetujui'),
(7, 2, 4, '2017-06-01', '2017-06-03', 50000, 'ditolak'),
(8, 2, 2, '2017-07-03', '2017-07-04', 100000, 'disetujui'),
(9, 1, 7, '2017-06-06', '2017-06-08', 5000, 'disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `id_pdk` int(20) NOT NULL,
  `nkk_pdk` varchar(20) DEFAULT NULL,
  `nik_pdk` varchar(20) NOT NULL,
  `nama_pdk` varchar(30) DEFAULT NULL,
  `jk_pdk` varchar(12) DEFAULT NULL,
  `tmp_lahir_pdk` varchar(30) DEFAULT NULL,
  `tgl_lahir_pdk` date DEFAULT NULL,
  `gol_darah_pdk` varchar(10) DEFAULT NULL,
  `agama_pdk` varchar(30) DEFAULT NULL,
  `shdk_pdk` varchar(20) DEFAULT NULL,
  `stts_nikah_pdk` varchar(15) DEFAULT NULL,
  `cacat_pdk` varchar(30) DEFAULT NULL,
  `pendidikan_pdk` varchar(30) DEFAULT NULL,
  `pekerjaan_pdk` varchar(30) DEFAULT NULL,
  `nik_ibu_pdk` varchar(20) DEFAULT NULL,
  `nm_ibu_pdk` varchar(30) DEFAULT NULL,
  `nik_ayah_pdk` varchar(20) DEFAULT NULL,
  `nm_ayah_pdk` varchar(30) DEFAULT NULL,
  `kewarganegaraan_pdk` varchar(3) DEFAULT NULL,
  `nakl_pdk` varchar(30) DEFAULT NULL,
  `nakm_pdk` varchar(30) DEFAULT NULL,
  `hp_pdk` varchar(15) DEFAULT NULL,
  `pass_pdk` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`id_pdk`, `nkk_pdk`, `nik_pdk`, `nama_pdk`, `jk_pdk`, `tmp_lahir_pdk`, `tgl_lahir_pdk`, `gol_darah_pdk`, `agama_pdk`, `shdk_pdk`, `stts_nikah_pdk`, `cacat_pdk`, `pendidikan_pdk`, `pekerjaan_pdk`, `nik_ibu_pdk`, `nm_ibu_pdk`, `nik_ayah_pdk`, `nm_ayah_pdk`, `kewarganegaraan_pdk`, `nakl_pdk`, `nakm_pdk`, `hp_pdk`, `pass_pdk`) VALUES
(1, '1', '3311080801960002', 'Candra Tri Cahyo Adi', 'laki-laki', 'sukoharjo', '1996-01-08', 'A', 'islam', 'anak', 'belum kawin', NULL, 'SMA', 'Pelajar/Mahasiswa', NULL, 'Sri Rusmini', NULL, 'Sutarmo', 'WNI', NULL, NULL, '085867321706', 'candra'),
(2, '2', '3311080801960003', 'Moh Fery Andri', 'laki-laki', 'sukoharjo', '1996-01-08', 'A', 'islam', 'anak', 'belum kawin', NULL, 'Diploma 3', 'Pegawai Swasta', NULL, 'Sri Rusmini', NULL, 'Sutarmo', 'WNI', NULL, NULL, '085867321708', 'fery');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(20) NOT NULL,
  `id_rt` int(14) NOT NULL,
  `id_rj` int(20) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `isi_pengumuman` text,
  `gambar_pengumuman` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `id_rt`, `id_rj`, `judul`, `isi_pengumuman`, `gambar_pengumuman`) VALUES
(7, 4, 1, 'Hati Hati Terhadap Pengamen', 'Diberitahukan kepada seluruh warga Dk. Ngambak Kalang. Mohon berhati hati terhadap pengamen yang biasa berkeliaran di sekitar kampung. Karena bisa jadi dia sedang mencari mangsa.', 'photo2.png'),
(8, 4, 1, 'Pejalan Kaki', 'Untuk warga yang biasa berjalan kaki di sekitar lapangan, tolong untuk memperhatikan kebersihan lingkungan.\r\nKarena sebentar lagi akan ada penyuluhan dari Kelurahan.', 'photo4.jpg'),
(10, 4, 1, 'Pria Berjenggot', 'Kepada seluruh warga di sekitar masjid. Hati hati jika bertemu dengan pria berjenggot. Karena bisa jadi dia sangat ganteng.', 'photo2.png'),
(11, 5, 5, 'Ditemukan Fidget Spinner', 'Ditemukan fidget spinner di sekre SIM. Bisa diambil melalui pengurus RT setempat', 'photo3.jpg'),
(12, 5, 5, 'Membaca Al Quran', 'Membaca Al Quran itu sangat banyak pahalanya. Jangan lupa baca Quran ya.', 'photo4.jpg'),
(13, 4, 1, 'Bersma Kita Bisa', 'Menginformasikan kepada seluruh warga yang sedang menjalani puasa. Kami pengurus RT menghimbau untuk tetap semangat.', 'photo4.jpg'),
(14, 4, 1, 'Pengumuman Baru', 'Semangat dan selamat', 'photo2.png'),
(15, 4, 1, 'HIK Baru', 'menyediakan berbagai macam makanan yang sangat enak. menerima order', 'photo1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id_prov` int(20) NOT NULL,
  `nama_prov` varchar(30) DEFAULT NULL,
  `kode_prov` varchar(2) DEFAULT NULL,
  `pos_prov` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id_prov`, `nama_prov`, `kode_prov`, `pos_prov`) VALUES
(1, 'jawa tengah', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_alamat`
--

CREATE TABLE `riwayat_alamat` (
  `id_ra` int(40) NOT NULL,
  `stts_ra` varchar(20) DEFAULT NULL,
  `id_pdk` int(20) NOT NULL,
  `id_rt` int(14) NOT NULL,
  `id_dpkk` int(20) DEFAULT NULL,
  `id_dpdd` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat_alamat`
--

INSERT INTO `riwayat_alamat` (`id_ra`, `stts_ra`, `id_pdk`, `id_rt`, `id_dpkk`, `id_dpdd`) VALUES
(1, 'aktif', 1, 4, NULL, NULL),
(3, 'aktif', 2, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_jabatan`
--

CREATE TABLE `riwayat_jabatan` (
  `id_rj` int(20) NOT NULL,
  `id_rt` varchar(14) DEFAULT NULL,
  `tgl_mulai_rj` date DEFAULT NULL,
  `tgl_akhir_rj` date DEFAULT NULL,
  `nip_rj` varchar(20) DEFAULT NULL,
  `stts_rj` varchar(20) DEFAULT NULL,
  `id_j` int(20) NOT NULL,
  `id_pdk` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat_jabatan`
--

INSERT INTO `riwayat_jabatan` (`id_rj`, `id_rt`, `tgl_mulai_rj`, `tgl_akhir_rj`, `nip_rj`, `stts_rj`, `id_j`, `id_pdk`) VALUES
(1, '4', '2015-01-08', '2019-01-08', '331100331964', 'aktif', 1, 1),
(5, '5', '2017-06-08', '2017-06-30', '333999922284', 'aktif', 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rt`
--

CREATE TABLE `rt` (
  `id_rt` int(14) NOT NULL,
  `nama_rt` varchar(30) DEFAULT NULL,
  `id_rw` int(12) NOT NULL,
  `status` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rt`
--

INSERT INTO `rt` (`id_rt`, `nama_rt`, `id_rw`, `status`) VALUES
(1, '01', 1, NULL),
(2, '02', 1, NULL),
(3, '03', 1, NULL),
(4, '01', 2, NULL),
(5, '02', 2, NULL),
(6, '03', 2, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rw`
--

CREATE TABLE `rw` (
  `id_rw` int(12) NOT NULL,
  `nama_rw` varchar(30) DEFAULT NULL,
  `id_dusun` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rw`
--

INSERT INTO `rw` (`id_rw`, `nama_rw`, `id_dusun`) VALUES
(1, 'XI', 1),
(2, 'XII', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`),
  ADD KEY `id_rt` (`id_rt`),
  ADD KEY `id_rj` (`id_rj`);

--
-- Indexes for table `dusun`
--
ALTER TABLE `dusun`
  ADD PRIMARY KEY (`id_dusun`),
  ADD KEY `kelurahan` (`id_kel`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id_inventaris`),
  ADD KEY `id_rt` (`id_rt`),
  ADD KEY `id_rj` (`id_rj`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_j`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kab`),
  ADD KEY `provinsi` (`id_prov`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kec`),
  ADD KEY `kabupaten` (`id_kab`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kel`),
  ADD KEY `kecamatan` (`id_kec`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_keuangan`),
  ADD KEY `id_rt` (`id_rt`),
  ADD KEY `id_rj` (`id_rj`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_pdk` (`id_pdk`),
  ADD KEY `id_inventaris` (`id_inventaris`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id_pdk`),
  ADD UNIQUE KEY `nik_pdk` (`nik_pdk`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`),
  ADD KEY `lingkungan` (`id_rt`),
  ADD KEY `pengelola` (`id_rj`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indexes for table `riwayat_alamat`
--
ALTER TABLE `riwayat_alamat`
  ADD PRIMARY KEY (`id_ra`),
  ADD KEY `rt` (`id_rt`),
  ADD KEY `pdk` (`id_pdk`);

--
-- Indexes for table `riwayat_jabatan`
--
ALTER TABLE `riwayat_jabatan`
  ADD PRIMARY KEY (`id_rj`),
  ADD KEY `penduduk` (`id_pdk`),
  ADD KEY `jabatan` (`id_j`);

--
-- Indexes for table `rt`
--
ALTER TABLE `rt`
  ADD PRIMARY KEY (`id_rt`),
  ADD KEY `rw` (`id_rw`);

--
-- Indexes for table `rw`
--
ALTER TABLE `rw`
  ADD PRIMARY KEY (`id_rw`),
  ADD KEY `dusun` (`id_dusun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `dusun`
--
ALTER TABLE `dusun`
  MODIFY `id_dusun` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id_inventaris` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_j` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kab` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kec` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id_kel` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_keuangan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id_pdk` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_prov` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `riwayat_alamat`
--
ALTER TABLE `riwayat_alamat`
  MODIFY `id_ra` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `riwayat_jabatan`
--
ALTER TABLE `riwayat_jabatan`
  MODIFY `id_rj` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `rt`
--
ALTER TABLE `rt`
  MODIFY `id_rt` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rw`
--
ALTER TABLE `rw`
  MODIFY `id_rw` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`id_rt`) REFERENCES `rt` (`id_rt`),
  ADD CONSTRAINT `agenda_ibfk_2` FOREIGN KEY (`id_rj`) REFERENCES `riwayat_jabatan` (`id_rj`);

--
-- Ketidakleluasaan untuk tabel `dusun`
--
ALTER TABLE `dusun`
  ADD CONSTRAINT `kelurahan` FOREIGN KEY (`id_kel`) REFERENCES `kelurahan` (`id_kel`);

--
-- Ketidakleluasaan untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `inventaris_ibfk_1` FOREIGN KEY (`id_rt`) REFERENCES `rt` (`id_rt`),
  ADD CONSTRAINT `inventaris_ibfk_2` FOREIGN KEY (`id_rj`) REFERENCES `riwayat_jabatan` (`id_rj`);

--
-- Ketidakleluasaan untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD CONSTRAINT `provinsi` FOREIGN KEY (`id_prov`) REFERENCES `provinsi` (`id_prov`);

--
-- Ketidakleluasaan untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kabupaten` FOREIGN KEY (`id_kab`) REFERENCES `kabupaten` (`id_kab`);

--
-- Ketidakleluasaan untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `kecamatan` FOREIGN KEY (`id_kec`) REFERENCES `kecamatan` (`id_kec`);

--
-- Ketidakleluasaan untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  ADD CONSTRAINT `keuangan_ibfk_1` FOREIGN KEY (`id_rt`) REFERENCES `rt` (`id_rt`),
  ADD CONSTRAINT `keuangan_ibfk_2` FOREIGN KEY (`id_rj`) REFERENCES `riwayat_jabatan` (`id_rj`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_pdk`) REFERENCES `penduduk` (`id_pdk`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_inventaris`) REFERENCES `inventaris` (`id_inventaris`);

--
-- Ketidakleluasaan untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `lingkungan` FOREIGN KEY (`id_rt`) REFERENCES `rt` (`id_rt`),
  ADD CONSTRAINT `pengelola` FOREIGN KEY (`id_rj`) REFERENCES `riwayat_jabatan` (`id_rj`);

--
-- Ketidakleluasaan untuk tabel `riwayat_alamat`
--
ALTER TABLE `riwayat_alamat`
  ADD CONSTRAINT `pdk` FOREIGN KEY (`id_pdk`) REFERENCES `penduduk` (`id_pdk`),
  ADD CONSTRAINT `rt` FOREIGN KEY (`id_rt`) REFERENCES `rt` (`id_rt`);

--
-- Ketidakleluasaan untuk tabel `riwayat_jabatan`
--
ALTER TABLE `riwayat_jabatan`
  ADD CONSTRAINT `jabatan` FOREIGN KEY (`id_j`) REFERENCES `jabatan` (`id_j`),
  ADD CONSTRAINT `penduduk` FOREIGN KEY (`id_pdk`) REFERENCES `penduduk` (`id_pdk`);

--
-- Ketidakleluasaan untuk tabel `rt`
--
ALTER TABLE `rt`
  ADD CONSTRAINT `rw` FOREIGN KEY (`id_rw`) REFERENCES `rw` (`id_rw`);

--
-- Ketidakleluasaan untuk tabel `rw`
--
ALTER TABLE `rw`
  ADD CONSTRAINT `dusun` FOREIGN KEY (`id_dusun`) REFERENCES `dusun` (`id_dusun`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
