-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jan 2022 pada 15.40
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sth_properti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `draft_laporan`
--

CREATE TABLE `draft_laporan` (
  `id_draft` char(20) NOT NULL,
  `tgl_draft` date NOT NULL,
  `id_penilaian` char(20) NOT NULL,
  `jendela` varchar(50) NOT NULL,
  `covering_letter` varchar(50) NOT NULL,
  `pernyataan_penilai` varchar(50) NOT NULL,
  `asumsi` varchar(50) NOT NULL,
  `tinjauan` varchar(50) NOT NULL,
  `gambar_situasi` varchar(50) NOT NULL,
  `foto_foto` varchar(50) NOT NULL,
  `peta_lokasi` varchar(50) NOT NULL,
  `id_peg` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `draft_laporan`
--

INSERT INTO `draft_laporan` (`id_draft`, `tgl_draft`, `id_penilaian`, `jendela`, `covering_letter`, `pernyataan_penilai`, `asumsi`, `tinjauan`, `gambar_situasi`, `foto_foto`, `peta_lokasi`, `id_peg`) VALUES
('DRAFT-001', '2021-11-11', 'PENILAIAN-001', 'FR_-_SMS_-_00_JENDELA4.xlsx', 'FR_-_SMS_-_01_COVERING_LETTER_-SG_-_FINAL4.docx', 'FR_-_SMS_-_02_PERNYATAAN_PENILAI4.doc', 'FR_-_SMS_-_03_ASUMSI4.doc', 'FR_-_SMS_-_04_TINJAUAN4.doc', 'FR_-_SMS_-_06_GAMBAR_014.pdf', 'FR_-_SMS_-_07_FOTO3.pdf', 'FR_-_SMS_-_05_TANAH_-_DESKRIPSI_-_SG_-_FINAL1.pdf', '20110409');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_final`
--

CREATE TABLE `laporan_final` (
  `id_report` char(20) NOT NULL,
  `id_draft` char(20) NOT NULL,
  `tgl_report` date NOT NULL,
  `final_report` varchar(50) NOT NULL,
  `id_peg` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan_final`
--

INSERT INTO `laporan_final` (`id_report`, `id_draft`, `tgl_report`, `final_report`, `id_peg`) VALUES
('REPORT-001', 'DRAFT-001', '2021-11-18', '06_-_PAPER_db_penjualan_obat.pdf', '20110517');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lingkungan`
--

CREATE TABLE `lingkungan` (
  `id_lingkungan` char(15) NOT NULL,
  `id_survei` char(10) NOT NULL,
  `karakteristik_lingkungan` varchar(50) NOT NULL,
  `kepadatan_pengembangan` varchar(30) NOT NULL,
  `pertumbuhan` varchar(30) NOT NULL,
  `sarana` varchar(20) NOT NULL,
  `prasarana` varchar(20) NOT NULL,
  `id_peg` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lingkungan`
--

INSERT INTO `lingkungan` (`id_lingkungan`, `id_survei`, `karakteristik_lingkungan`, `kepadatan_pengembangan`, `pertumbuhan`, `sarana`, `prasarana`, `id_peg`) VALUES
('LINGKUNGAN-001', 'SURVEI-001', 'Menengah Keatas', 'Cukup Padat', 'Cukup', 'Jalan, Pagar, Salura', 'Sekolah SD, SMP, SMA', '20110409'),
('LINGKUNGAN-002', 'SURVEI-002', 'Menengah Keatas', 'padat sekali', 'tumbuh', 'ada', 'ada', '20120410');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` bigint(20) UNSIGNED NOT NULL,
  `id_peg` char(10) DEFAULT NULL,
  `description` text,
  `link` text,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `id_peg`, `description`, `link`, `created_at`) VALUES
(1, '124414124', 'Penilaian baru telah diinput', 'http://sth-penilaian-tanah.test/Penilaian/detailpenilaian?id=31324141', '2021-11-04 08:31:28'),
(2, '41512512', 'Review baru telah diberikan', 'http://sth-penilaian-tanah.test/Reviewing/detailreviewing?id=13114214', '2021-11-04 09:09:02'),
(3, '20100203', 'Penilaian baru telah diinput', 'http://localhost/sth_penilaian_tanah/Penilaian/detailpenilaian?id=PENILAIAN-002', '2021-11-22 00:23:21'),
(4, '20100202', 'Penilaian baru telah diinput', 'http://localhost/sth_penilaian_tanah/Penilaian/detailpenilaian?id=PENILAIAN-001', '2021-11-22 00:41:53'),
(5, '20120410', 'Review baru telah diberikan', 'http://localhost/sth_penilaian_tanah/Reviewing/detailreviewing?id=REVIEW-002', '2021-11-22 01:13:43'),
(6, '20110409', 'Review baru telah diberikan', 'http://localhost/sth_penilaian_tanah/Reviewing/detailreviewing?id=REVIEW-001', '2021-11-22 01:16:41'),
(7, '20100203', 'Penilaian baru telah diinput', 'http://localhost/sth_penilaian_tanah/Penilaian/detailpenilaian?id=PENILAIAN-003', '2021-11-22 02:07:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_peg` char(10) NOT NULL,
  `nama_peg` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Penilai','Reviewer','Penanggung Jawab','Produksi','Kurir','Sekretaris') NOT NULL,
  `alamat_peg` varchar(100) NOT NULL,
  `telp_peg` varchar(13) NOT NULL,
  `email_peg` varchar(30) NOT NULL,
  `izin_profesi` char(4) NOT NULL,
  `foto_peg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_peg`, `nama_peg`, `username`, `password`, `level`, `alamat_peg`, `telp_peg`, `email_peg`, `izin_profesi`, `foto_peg`) VALUES
('20100101', 'Stefanus Gunadi', 'SG', '0602301d7d4b71a368a3fe5cc7be7a9c', 'Penanggung Jawab', 'Jl. Mandala No. 10, Grogol Petamburan', '081278642678', 'sg@kjppsth.com', '0027', '013m.jpg'),
('20100202', 'Hardi Ganda', 'HG', 'cc20bb67041178119526ac916a4e17d3', 'Reviewer', 'Pondok Indah, Jakarta Selatan', '081293743766', 'hg@kjppsth.com', '0025', '024m.jpg'),
('20100203', 'Sandy Indra', 'SI', 'acd528ff197c8e1ca60f14e3a0646a98', 'Reviewer', 'Pamulang, Tangerang Selatan', '087873467367', 'si@kjppsth.com', '0356', '010m.jpg'),
('20100304', 'Stefani Kris', 'stefi', '5d328cdaeecf55e6baa33ad1a81f63b5', 'Sekretaris', 'Pondok Kopi Jakarta Timur', '081219313717', 'stefi@kjppsth.com', '', '037f.jpg'),
('20100308', 'Anisa Ratna Furi', 'admin', '0192023a7bbd73250516f069df18b500', 'Admin', 'JL. Kebonjeruk XIX No. 20, Maphar, Tamansari, Jakarta Barat', '081276484878', 'nisa@kjppsth.com', '', '006f.jpg'),
('20110409', 'Riyadi Sunardi', 'riyadi', '81d29fd72914e093bcc4b9c2c0475fae', 'Penilai', 'Depok, Jawa Barat', '081378474788', 'riyadi@kjppsth.com', '', '001m.jpg'),
('20110517', 'Han Santoso', 'han', 'beffc46e29d93a4b0ad3765c242d6fc8', 'Produksi', 'Jl. Mandala Raya No. 01 Jakarta Barat', '081282478289', 'han@kjppsth.com', '', '050m.jpg'),
('20110518', 'Ragil Fathur', 'ragil', '5cd3faaf561bbb19c8a8726f255d91b2', 'Kurir', 'Cengkareng, Jakarta Barat', '081217837188', 'ragil@kjppsth.com', '', '069m.jpg'),
('20120410', 'Budi Sudrija', 'budi', '9c5fa085ce256c7c598f6710584ab25d', 'Penilai', 'Green Lake, Jakarta Barat', '081273439878', 'budi@kjppsth.com', '', '003m.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembanding`
--

CREATE TABLE `pembanding` (
  `no_pembanding` char(30) NOT NULL,
  `tgl_data` date NOT NULL,
  `id_survei` char(10) NOT NULL,
  `alamat_pembanding` varchar(100) NOT NULL,
  `luas_tanah_pembanding` double(10,2) NOT NULL,
  `legalitas_pembanding` varchar(50) NOT NULL,
  `bentuk_tanah_pembanding` varchar(30) NOT NULL,
  `elevasi_pembanding` double(4,2) NOT NULL,
  `lebar_jalan_pembanding` double(4,2) NOT NULL,
  `jarak_ke_tanah_dinilai` double(4,2) NOT NULL,
  `peruntukan_pembanding` varchar(30) NOT NULL,
  `karakteristik_ekonomi` varchar(50) NOT NULL,
  `harga_penawaran_transaksi` decimal(15,2) NOT NULL,
  `sumber_data` varchar(20) NOT NULL,
  `person` varchar(30) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `qty` int(2) NOT NULL,
  `id_peg` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembanding`
--

INSERT INTO `pembanding` (`no_pembanding`, `tgl_data`, `id_survei`, `alamat_pembanding`, `luas_tanah_pembanding`, `legalitas_pembanding`, `bentuk_tanah_pembanding`, `elevasi_pembanding`, `lebar_jalan_pembanding`, `jarak_ke_tanah_dinilai`, `peruntukan_pembanding`, `karakteristik_ekonomi`, `harga_penawaran_transaksi`, `sumber_data`, `person`, `telepon`, `catatan`, `qty`, `id_peg`) VALUES
('SURVEI-001-01', '2021-10-29', 'SURVEI-001', 'Desa Gandasari, Cikarang Barat, Bekasi', 1500.00, 'SHGB', 'Beraturan', 1.00, 4.00, 3.00, 'Komersil', 'Menengah Keatas', '250000000.00', 'Sekunder', 'Bapak Ramdan', '087767313176', 'tidak ada', 1, '20110409'),
('SURVEI-001-02', '2021-10-29', 'SURVEI-001', 'Desa Gandasari, Cikarang Barat, Bekasi', 1000.00, 'SHGB', 'Beraturan', 1.00, 3.00, 5.00, 'Komersil', 'Menengah Keatas', '150000000.00', 'Sekunder', 'Bapak Romli', '081298979146', 'tidak ada', 1, '20110409'),
('SURVEI-001-03', '2021-10-29', 'SURVEI-001', 'Desa Gandasari, Cikarang Barat, Bekasi', 500.00, 'SHGB', 'Beraturan', 1.00, 3.00, 4.00, 'Komersil', 'Menengah Keatas', '80000000.00', 'Sekunder', 'Bapak Romli', '081298979146', 'Tanah Kosong', 1, '20110409'),
('SURVEI-002-01', '2021-11-18', 'SURVEI-002', 'Desa Mulyasejati, Ciampel, Karawang', 10000.00, 'SHGB', 'Beraturan', 1.00, 3.00, 4.00, 'Komersil', 'Menengah Keatas', '100000000.00', 'Sekunder', 'Roni', '081471874173', 'Tanah Kosong', 1, '20120410'),
('SURVEI-002-02', '2021-11-18', 'SURVEI-002', 'Desa Mulyasejati, Ciampel, Karawang', 15000.00, 'SHGB', 'Beraturan', 1.00, 3.00, 4.00, 'Komersil', 'Menengah Keatas', '250000000.00', 'Sekunder', 'Roni', '081471874173', 'Tanah Kosong', 1, '20120410'),
('SURVEI-002-03', '2021-11-18', 'SURVEI-002', 'Desa Mulyasejati, Ciampel, Karawang', 5000.00, 'SHGB', 'Beraturan', 1.00, 3.00, 4.00, 'Komersil', 'Menengah Keatas', '80000000.00', 'Sekunder', 'Roni', '081471874173', 'Tanah Kosong', 1, '20120410');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembanding_temp`
--

CREATE TABLE `pembanding_temp` (
  `no_pembanding` char(30) NOT NULL,
  `tgl_data` date NOT NULL,
  `alamat_pembanding` varchar(100) NOT NULL,
  `luas_tanah_pembanding` double(10,2) NOT NULL,
  `legalitas_pembanding` varchar(50) NOT NULL,
  `bentuk_tanah_pembanding` varchar(30) NOT NULL,
  `elevasi_pembanding` double(4,2) NOT NULL,
  `lebar_jalan_pembanding` double(4,2) NOT NULL,
  `jarak_ke_tanah_dinilai` double(4,2) NOT NULL,
  `peruntukan_pembanding` varchar(30) NOT NULL,
  `karakteristik_ekonomi` varchar(50) NOT NULL,
  `harga_penawaran_transaksi` decimal(15,2) NOT NULL,
  `sumber_data` varchar(20) NOT NULL,
  `person` varchar(30) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `qty` int(2) NOT NULL,
  `id_peg` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemberi_tugas`
--

CREATE TABLE `pemberi_tugas` (
  `id_pemberitugas` char(10) NOT NULL,
  `kode_industri` char(2) NOT NULL,
  `nama_pemberitugas` varchar(50) NOT NULL,
  `alamat_pemberitugas` varchar(100) NOT NULL,
  `bidang_usaha` varchar(30) NOT NULL,
  `telp_pemberitugas` varchar(15) NOT NULL,
  `fax_pemberitugas` varchar(15) NOT NULL,
  `email_pemberitugas` varchar(30) NOT NULL,
  `npwp` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemberi_tugas`
--

INSERT INTO `pemberi_tugas` (`id_pemberitugas`, `kode_industri`, `nama_pemberitugas`, `alamat_pemberitugas`, `bidang_usaha`, `telp_pemberitugas`, `fax_pemberitugas`, `email_pemberitugas`, `npwp`) VALUES
('PT00001', '10', 'PT. SINAR MEDIKA SEJAHTERA', 'Kawasan Industri MM2100, Jl. Kalimantan Blok CB-01 Gandasari, Cikarang Barat, Bekasi-Jawa Barat', 'Rumah Sakit', '021-50576276', '021-50576341', 'sinarmedikasejahtera@sms.co.id', '1'),
('PT00002', '04', 'PT INDAH KIAT PULP & PAPER Tbk.', 'Sinar Mas Land Plaza Menara II, Lantai 9 \r\nJalan M. H. Thamrin No 51 \r\nJakarta Pusat\r\n', 'Paper Manufacturing', '021 - 29650800', '021 - 29650810', 'indahkiat@app.co.id', '1'),
('PT00003', '10', 'PT. Sarana Meditama Metropolitan Tbk.', 'Jl. Pulomas Barat VI No. 20Jakarta 13210', 'Pelayanan Kesehatan', '021 – 472 3332', '021 – 471 8081', 'saranameditamametropolitan@smm', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik_aset`
--

CREATE TABLE `pemilik_aset` (
  `id_pemilik` char(10) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `alamat_pemilik` varchar(100) NOT NULL,
  `telp_pemilik` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemilik_aset`
--

INSERT INTO `pemilik_aset` (`id_pemilik`, `nama_pemilik`, `alamat_pemilik`, `telp_pemilik`) VALUES
('PA00001', 'PT. SINAR MEDIKA SEJAHTERA', 'Kawasan Industri MM2100, Jl. Kalimantan Blok CB-01 Gandasari, Cikarang Barat, Bekasi-Jawa Barat', '021-50576276'),
('PA00002', 'PT Karyamas Primalestari ', 'Desa Mulyasejati, Kecamatan Ciampel, Kabupaten Karawang, Jawa Barat', '0267-832787'),
('PA00003', 'PT Sarana Meditama Nusantara', 'Jl. Mayjend MT. Haryono, Kelurahan Gunung Bahagia, Kecamatan Balikpapan Selatan, Kota Balikpapan, Ka', '0542-928298');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` char(30) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `jenis_jasa` enum('PI (Real Properti)','PP (Personal Properti)','BS (Bisnis)') NOT NULL,
  `id_pemberitugas` char(10) NOT NULL,
  `id_pemilik` char(10) NOT NULL,
  `id_peg` char(10) NOT NULL,
  `tujuan_penilaian` varchar(50) NOT NULL,
  `dasar_penilaian` varchar(255) NOT NULL,
  `pendekatan_penilaian` varchar(50) NOT NULL,
  `tgl_penilaian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `is_delete`, `tgl_pendaftaran`, `jenis_jasa`, `id_pemberitugas`, `id_pemilik`, `id_peg`, `tujuan_penilaian`, `dasar_penilaian`, `pendekatan_penilaian`, `tgl_penilaian`) VALUES
('STH-001/SG/X/2021', 0, '2021-10-29', 'PI (Real Properti)', 'PT00001', 'PA00001', '20100101', 'Laporan Keuangan', 'Nilai Wajar', 'Pendekatan Pasar', '2021-09-30'),
('STH-002/SG/XI/2021', 0, '2021-11-22', 'PI (Real Properti)', 'PT00002', 'PA00002', '20100101', 'Laporan Keuangan', 'Nilai Wajar', 'Pendekatan Pasar', '2021-11-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran_detail`
--

CREATE TABLE `pendaftaran_detail` (
  `id_pendaftaran` char(30) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `no_sertifikat` char(30) NOT NULL,
  `hak_tanah` varchar(50) NOT NULL,
  `kabupaten` varchar(30) NOT NULL,
  `nama_pemegang_hak` varchar(50) NOT NULL,
  `luas` double(10,2) NOT NULL,
  `qty` int(3) NOT NULL,
  `id_pemilik` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftaran_detail`
--

INSERT INTO `pendaftaran_detail` (`id_pendaftaran`, `is_delete`, `no_sertifikat`, `hak_tanah`, `kabupaten`, `nama_pemegang_hak`, `luas`, `qty`, `id_pemilik`) VALUES
('STH-001/SG/X/2021', 0, '00567/Gandasari', 'Hak Guna Bangunan', 'Bekasi', 'PT. SINAR MEDIKA SEJAHTERA', 7672.00, 1, 'PA00001'),
('STH-001/SG/X/2021', 0, '00568/Gandasari', 'Hak Guna Bangunan', 'Bekasi', 'PT. SINAR MEDIKA SEJAHTERA', 448.00, 1, 'PA00001'),
('STH-002/SG/XI/2021', 0, '32/Mulyasejati', 'Hak Guna Bangunan', 'Karawang', 'PT KARYAMAS PRIMALESTARI', 138.79, 1, 'PA00002'),
('STH-002/SG/XI/2021', 0, '33/Mulyasejati', 'Hak Guna Bangunan', 'Karawang', 'PT KARYAMAS PRIMALESTARI', 111.83, 1, 'PA00002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran_detail_temp`
--

CREATE TABLE `pendaftaran_detail_temp` (
  `no_sertifikat` char(30) NOT NULL,
  `hak_tanah` varchar(50) NOT NULL,
  `kabupaten` varchar(30) NOT NULL,
  `nama_pemegang_hak` varchar(50) NOT NULL,
  `luas` double(10,2) NOT NULL,
  `qty` int(3) NOT NULL,
  `id_pemilik` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` char(10) NOT NULL,
  `tgl_pengiriman` date NOT NULL,
  `id_peg` char(10) NOT NULL,
  `penerima` varchar(30) NOT NULL,
  `alamat_penerima` varchar(250) NOT NULL,
  `up` varchar(30) NOT NULL,
  `isi` varchar(500) NOT NULL,
  `id_report` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `tgl_pengiriman`, `id_peg`, `penerima`, `alamat_penerima`, `up`, `isi`, `id_report`) VALUES
('KIRIM-001', '2021-12-24', '20110518', 'PT SINAR MEDIKA SEJAHTERA', 'Kawasan Industri MM2100, Jl. Kalimantan Blok CB-01 Gandasari, Cikarang Barat, Bekasi-Jawa Barat', 'Bpk. Togi', '- 3 (tiga) set Report Asli No. 001/SG/X/2021', 'REPORT-001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` char(20) NOT NULL,
  `tgl_perhitungan_nilai` date NOT NULL,
  `id_survei` char(10) NOT NULL,
  `id_pendaftaran` char(30) NOT NULL,
  `tgl_penilaian` date NOT NULL,
  `id_peg` char(10) NOT NULL,
  `id_reviewer` char(10) DEFAULT NULL,
  `keterangan_nilai` varchar(100) NOT NULL,
  `worksheet_tanah` varchar(50) NOT NULL,
  `tanah_deskripsi` varchar(50) NOT NULL,
  `ringkasan_penilaian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `tgl_perhitungan_nilai`, `id_survei`, `id_pendaftaran`, `tgl_penilaian`, `id_peg`, `id_reviewer`, `keterangan_nilai`, `worksheet_tanah`, `tanah_deskripsi`, `ringkasan_penilaian`) VALUES
('PENILAIAN-001', '2021-11-04', 'SURVEI-001', 'STH-001/SG/X/2021', '2021-09-30', '20110409', '20100202', 'Nilai Pasar = Rp.  50.000.000,-', 'BBRI_JK-testing1.csv', 'apsi-tanda_bukti1.docx', 'Diagram_Guarantor_ABM81.pdf'),
('PENILAIAN-002', '2021-11-20', 'SURVEI-002', 'STH-002/SG/XI/2021', '2021-11-15', '20120410', '20100203', 'Nilai Pasar = Rp.  250.000.000,-', 'Soal_Ujian.xlsx', 'Permasalahan_Pokok.docx', 'data_-_01.pdf'),
('PENILAIAN-003', '2021-11-18', 'SURVEI-002', 'STH-002/SG/XI/2021', '2021-11-15', '20120410', '20100203', 'Nilai Pasar = Rp.  280.000.000,-', 'sdp1.xlsx', 'TUGAS_PAI_-_JAWABAN.docx', '11172166_-_BAB_1.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviewing`
--

CREATE TABLE `reviewing` (
  `id_reviewing` char(10) NOT NULL,
  `id_peg` char(10) NOT NULL,
  `tgl_reviewing` date NOT NULL,
  `id_penilaian` char(100) NOT NULL,
  `status_reviewing` enum('OK','Revisi') NOT NULL,
  `komentar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reviewing`
--

INSERT INTO `reviewing` (`id_reviewing`, `id_peg`, `tgl_reviewing`, `id_penilaian`, `status_reviewing`, `komentar`) VALUES
('REVIEW-001', '20100202', '2021-11-10', 'PENILAIAN-001', 'OK', 'FINAL'),
('REVIEW-002', '20100203', '2021-11-12', 'PENILAIAN-002', 'Revisi', 'Coba cari lagi data pembanding yang harganya lebih tinggi dari data pembanding yang sudah ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `survei`
--

CREATE TABLE `survei` (
  `id_survei` char(10) NOT NULL,
  `tgl_inspeksi` date NOT NULL,
  `id_pendaftaran` char(30) NOT NULL,
  `id_lingkungan` char(15) NOT NULL,
  `id_peg` char(10) NOT NULL,
  `bentuk_tanah` varchar(50) NOT NULL,
  `elevasi` double(4,2) NOT NULL,
  `batasan_thd_tanah` varchar(30) NOT NULL,
  `peraturan_tata_kota` varchar(30) NOT NULL,
  `pemenuhan_thd_peraturan_tatakota` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `survei`
--

INSERT INTO `survei` (`id_survei`, `tgl_inspeksi`, `id_pendaftaran`, `id_lingkungan`, `id_peg`, `bentuk_tanah`, `elevasi`, `batasan_thd_tanah`, `peraturan_tata_kota`, `pemenuhan_thd_peraturan_tatakota`) VALUES
('SURVEI-001', '2021-10-29', 'STH-001/SG/X/2021', 'LINGKUNGAN-001', '20110409', 'Beraturan', 1.00, 'patok', 'peraturan pasal 001', 'pemenuhan peraturan'),
('SURVEI-002', '2021-11-18', 'STH-002/SG/XI/2021', 'LINGKUNGAN-002', '20120410', 'Beraturan', 1.00, 'patok', 'oke', 'oke');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanah`
--

CREATE TABLE `tanah` (
  `no_sertifikat` char(30) NOT NULL,
  `hak_tanah` varchar(50) NOT NULL,
  `status_sertifikat` varchar(50) NOT NULL,
  `desa` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kabupaten` varchar(30) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `nama_pemegang_hak` varchar(50) NOT NULL,
  `tgl_dikeluarkan` date NOT NULL,
  `tgl_jatuh_tempo` date NOT NULL,
  `no_gambar_situasi` varchar(30) NOT NULL,
  `tgl_gambar_situasi` date NOT NULL,
  `luas` double(10,2) NOT NULL,
  `sertipikat_tanah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tanah`
--

INSERT INTO `tanah` (`no_sertifikat`, `hak_tanah`, `status_sertifikat`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `nama_pemegang_hak`, `tgl_dikeluarkan`, `tgl_jatuh_tempo`, `no_gambar_situasi`, `tgl_gambar_situasi`, `luas`, `sertipikat_tanah`) VALUES
('00567/Gandasari', 'Hak Guna Bangunan', 'Sertifikat Hak Guna Bangunan', 'Gandasari', 'Cikarang Barat', 'Bekasi', 'Jawa Barat', 'PT. SINAR MEDIKA SEJAHTERA', '2017-09-14', '2028-12-23', '00221/Gandasari/2017', '2017-08-16', 7672.00, '5HjYSmCUoU.pdf'),
('00568/Gandasari', 'Hak Guna Bangunan', 'Sertifikat Hak Guna Bangunan', 'Gandasari', 'Cikarang Barat', 'Bekasi', 'Jawa Barat', 'PT. SINAR MEDIKA SEJAHTERA', '2017-09-13', '2027-09-24', '00220/Gandasari/2017', '2017-08-16', 448.00, 'qs1g9Vo472.pdf'),
('007668/Damai', 'Hak Guna Bangunan', 'Sertifikat Hak Guna Bangunan', 'Damai', 'Balikpapan Selatan', 'Balikpapan', 'Kalimantan Timur', 'PT SARANA MEDITAMA NUSANTARA', '2019-03-13', '1970-01-01', '00937/Gunung Bahagia/2017', '2018-04-05', 169.00, '9AA5cWb0o5.pdf'),
('07220/Damai', 'Hak Guna Bangunan', 'Sertifikat Hak Guna Bangunan', 'Damai', 'Balikpapan Selatan', 'Balikpapan', 'Kalimantan Timur', 'PT SARANA MEDITAMA NUSANTARA', '1994-07-28', '1970-01-01', '00529/2015', '2015-09-09', 6450.00, 'LD8CIhOX8Z.pdf'),
('32/Mulyasejati', 'Hak Guna Bangunan', 'Sertifikat Hak Guna Bangunan', 'Mulyasejati', 'Ciampel', 'Karawang', 'Jawa Barat', 'PT KARYAMAS PRIMALESTARI', '1998-12-29', '2028-12-27', '00023/Mulyasejati', '1998-12-02', 138.79, 'NTfTC31KDq.pdf'),
('33/Mulyasejati', 'Hak Guna Bangunan', 'Sertifikat Hak Guna Bangunan', 'Mulyasejati', 'Ciampel', 'Karawang', 'Jawa Barat', 'PT KARYAMAS PRIMALESTARI', '1999-11-19', '2029-11-18', '00024/Mulyasejati', '1998-12-02', 111.83, 'QtR4vkIa0p.pdf');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `draft_laporan`
--
ALTER TABLE `draft_laporan`
  ADD PRIMARY KEY (`id_draft`),
  ADD KEY `fk_idpenilaiandraft` (`id_penilaian`) USING BTREE,
  ADD KEY `fk_idpegdraft` (`id_peg`) USING BTREE;

--
-- Indeks untuk tabel `laporan_final`
--
ALTER TABLE `laporan_final`
  ADD PRIMARY KEY (`id_report`),
  ADD KEY `fk_iddraftfinal` (`id_draft`),
  ADD KEY `fk_idpegfinal` (`id_peg`);

--
-- Indeks untuk tabel `lingkungan`
--
ALTER TABLE `lingkungan`
  ADD PRIMARY KEY (`id_lingkungan`),
  ADD KEY `fk_idpeglingkungan` (`id_peg`),
  ADD KEY `fk_idsurveiling` (`id_survei`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_peg`);

--
-- Indeks untuk tabel `pembanding`
--
ALTER TABLE `pembanding`
  ADD PRIMARY KEY (`no_pembanding`),
  ADD KEY `fk_idsurveipembanding` (`id_survei`),
  ADD KEY `fk_idpegpembanding` (`id_peg`);

--
-- Indeks untuk tabel `pembanding_temp`
--
ALTER TABLE `pembanding_temp`
  ADD KEY `fk_nopembandingtemp` (`no_pembanding`),
  ADD KEY `fk_idpegtemp` (`id_peg`);

--
-- Indeks untuk tabel `pemberi_tugas`
--
ALTER TABLE `pemberi_tugas`
  ADD PRIMARY KEY (`id_pemberitugas`);

--
-- Indeks untuk tabel `pemilik_aset`
--
ALTER TABLE `pemilik_aset`
  ADD PRIMARY KEY (`id_pemilik`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `fk_idpemtugas` (`id_pemberitugas`),
  ADD KEY `fk_idpemilikpendf` (`id_pemilik`),
  ADD KEY `fk_idpegpendaf` (`id_peg`);

--
-- Indeks untuk tabel `pendaftaran_detail`
--
ALTER TABLE `pendaftaran_detail`
  ADD KEY `fk_idpendfdetail` (`id_pendaftaran`),
  ADD KEY `fk_nosertdetail` (`no_sertifikat`),
  ADD KEY `fk_idpemdetail` (`id_pemilik`);

--
-- Indeks untuk tabel `pendaftaran_detail_temp`
--
ALTER TABLE `pendaftaran_detail_temp`
  ADD KEY `fk_nosertifpendf` (`no_sertifikat`),
  ADD KEY `fk_idpempendf` (`id_pemilik`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `fk_idpegkirim` (`id_peg`),
  ADD KEY `fk_idreportkirim` (`id_report`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `fk_idsurveipenilaian` (`id_survei`),
  ADD KEY `fk_idpendafpenilaian` (`id_pendaftaran`),
  ADD KEY `fk_idpegpenilai` (`id_peg`);

--
-- Indeks untuk tabel `reviewing`
--
ALTER TABLE `reviewing`
  ADD PRIMARY KEY (`id_reviewing`),
  ADD KEY `fk_idpegrev` (`id_peg`),
  ADD KEY `fk_idpenilaianrev` (`id_penilaian`);

--
-- Indeks untuk tabel `survei`
--
ALTER TABLE `survei`
  ADD PRIMARY KEY (`id_survei`),
  ADD KEY `fk_idpendaftaransurvei` (`id_pendaftaran`),
  ADD KEY `fk_idpegsurvei` (`id_peg`),
  ADD KEY `fk_idlingsurvei` (`id_lingkungan`);

--
-- Indeks untuk tabel `tanah`
--
ALTER TABLE `tanah`
  ADD PRIMARY KEY (`no_sertifikat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
