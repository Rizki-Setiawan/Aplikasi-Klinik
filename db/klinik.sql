-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Bulan Mei 2019 pada 15.06
-- Versi server: 10.1.39-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alkes`
--

CREATE TABLE `alkes` (
  `id_alkes` int(20) NOT NULL,
  `nama_alkes` varchar(30) NOT NULL,
  `jenis_unit` varchar(20) NOT NULL,
  `harga_jual` int(20) NOT NULL,
  `stock_alkes` int(20) NOT NULL,
  `tgl_beli` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alkes`
--

INSERT INTO `alkes` (`id_alkes`, `nama_alkes`, `jenis_unit`, `harga_jual`, `stock_alkes`, `tgl_beli`) VALUES
(4, 'Perban', 'Buah', 1500, 481, '2019-04-28'),
(5, 'Spuit', 'Buah', 2000, 376, '2019-05-13'),
(6, 'Gips', 'Buah', 5000, 73, '2019-05-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosis`
--

CREATE TABLE `diagnosis` (
  `id_diagnosis` int(20) NOT NULL,
  `nama_diagnosis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diagnosis`
--

INSERT INTO `diagnosis` (`id_diagnosis`, `nama_diagnosis`) VALUES
(2, 'Influenza'),
(3, 'Migrain'),
(4, 'Hemofilia'),
(5, 'Anemia'),
(7, 'Osteoporosis'),
(9, 'Patah Tulang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(20) NOT NULL,
  `nama_dokter` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(10) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tarif_dokter` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `tgl_lahir`, `jk`, `alamat`, `tgl_masuk`, `tarif_dokter`) VALUES
(1, 'Agus', '1987-05-03', 'Laki-Laki', 'Bandung', '2018-08-14', 200000),
(2, 'Dewi', '1974-05-24', 'Perempuan', 'Jakarta', '2017-10-25', 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(20) NOT NULL,
  `nama_kamar` varchar(20) NOT NULL,
  `jenis_kamar` varchar(20) NOT NULL,
  `tarif_kamar` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `nama_kamar`, `jenis_kamar`, `tarif_kamar`) VALUES
(4, 'Mawar', 'Vip', 300000),
(5, 'Melati', 'Biasa', 200000),
(6, 'Tulip', 'Vip', 300000),
(7, 'Flamboyan', 'Biasa', 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id_kunjungan` int(20) NOT NULL,
  `id_pasien` int(20) NOT NULL,
  `tgl_kunjungan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kunjungan`
--

INSERT INTO `kunjungan` (`id_kunjungan`, `id_pasien`, `tgl_kunjungan`) VALUES
(47, 32, '2019-05-14'),
(54, 39, '2019-05-14'),
(55, 40, '2019-05-14'),
(56, 41, '2019-05-14'),
(57, 42, '2019-05-14'),
(58, 43, '2019-05-14'),
(59, 44, '2019-05-14');

--
-- Trigger `kunjungan`
--
DELIMITER $$
CREATE TRIGGER `After_Delete_Kunjungan` AFTER DELETE ON `kunjungan` FOR EACH ROW BEGIN
DELETE FROM pembayaran WHERE id_pasien=id_pasien;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `After_Insert_Kunjungan` AFTER INSERT ON `kunjungan` FOR EACH ROW BEGIN
INSERT INTO pembayaran (id_pasien,status_pembayaran) VALUES (new.id_pasien,'Belum Lunas');

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lab`
--

CREATE TABLE `lab` (
  `id_lab` int(20) NOT NULL,
  `nama_lab` varchar(40) NOT NULL,
  `tarif_lab` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lab`
--

INSERT INTO `lab` (`id_lab`, `nama_lab`, `tarif_lab`) VALUES
(3, 'Cek Darah', 95000),
(4, 'Rontgen', 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_user` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_user`, `username`, `email`, `password`, `level`) VALUES
(8, 'rizki', 'rizkisetiawan@gmail.com', '3e089c076bf1ec3a8332280ee35c28d4', 'admin'),
(10, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(20) NOT NULL,
  `nama_obat` varchar(20) NOT NULL,
  `jenis_obat` varchar(20) NOT NULL,
  `harga_jual` int(20) NOT NULL,
  `stock_obat` int(20) NOT NULL,
  `tgl_beli` date NOT NULL,
  `tgl_kedaluwarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `jenis_obat`, `harga_jual`, `stock_obat`, `tgl_beli`, `tgl_kedaluwarsa`) VALUES
(2, 'Paracetamol', 'Tablet', 500, 285, '2019-02-05', '2020-05-03'),
(3, 'Sanmol', 'Tablet', 1000, 390, '2019-05-14', '2021-05-24'),
(4, 'Nonacog Alfa', 'Sirup', 10000, 289, '2019-05-13', '2020-05-21'),
(5, 'Epotein Alfa', 'Tablet', 3000, 180, '2019-05-13', '2021-05-09'),
(6, 'Analgesik', 'Tablet', 1500, 268, '2019-05-14', '2020-05-26'),
(7, 'Bisphosponate', 'Tablet', 4000, 50, '2019-05-14', '2022-05-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(20) NOT NULL,
  `nama_pasien` varchar(20) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `usia` int(3) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `jk`, `usia`, `pekerjaan`, `alamat`, `no_telp`) VALUES
(32, 'Rendi', 'Laki-Laki', 20, 'Mahasiswa', 'Tasikmalaya', '087765321123'),
(39, 'Suryani', 'Perempuan', 35, 'Pedagang', 'Tasikmalaya', '086232776321'),
(40, 'Sela', 'Perempuan', 29, 'Guru', 'Ciamis', '087765325262'),
(41, 'Dadan', 'Laki-Laki', 40, 'Petani', 'Banjar', '087765321970'),
(42, 'Wawat', 'Perempuan', 56, 'Pedagang', 'Jakarta', '087765321123'),
(43, 'bayu', 'Laki-Laki', 24, 'Pedagang', 'Tasikmalaya', '087765321123'),
(44, 'nadinra', 'Perempuan', 19, 'Mahasiswa', 'Tasikmalaya', 'fff');

--
-- Trigger `pasien`
--
DELIMITER $$
CREATE TRIGGER `After_Insert_Pasien` AFTER INSERT ON `pasien` FOR EACH ROW BEGIN
INSERT INTO kunjungan (id_pasien,tgl_kunjungan) VALUES (new.id_pasien,sysdate());

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(20) NOT NULL,
  `id_pasien` int(20) NOT NULL,
  `total_bayar` int(20) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `status_pembayaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pasien`, `total_bayar`, `tgl_pembayaran`, `status_pembayaran`) VALUES
(45, 32, 1134000, '2019-05-14', 'Lunas'),
(52, 39, 497000, '0000-00-00', 'Belum Lunas'),
(53, 40, 0, '0000-00-00', 'Belum Lunas'),
(54, 41, 0, '0000-00-00', 'Belum Lunas'),
(55, 42, 0, '0000-00-00', 'Belum Lunas'),
(56, 43, 493000, '0000-00-00', 'Belum Lunas'),
(57, 44, 0, '0000-00-00', 'Belum Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeriksaan`
--

CREATE TABLE `pemeriksaan` (
  `id_pemeriksaan` int(20) NOT NULL,
  `id_pasien` int(20) NOT NULL,
  `keluhan` varchar(20) NOT NULL,
  `tgl_periksa` date NOT NULL,
  `id_dokter` int(20) NOT NULL,
  `id_diagnosis` int(20) NOT NULL,
  `id_lab` int(20) NOT NULL,
  `id_petugas` int(20) NOT NULL,
  `id_tindakan` int(20) NOT NULL,
  `id_obat` int(20) NOT NULL,
  `jumlah_obat` int(20) NOT NULL,
  `id_alkes` int(20) NOT NULL,
  `jumlah_alkes` int(20) NOT NULL,
  `id_pembayaran` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`id_pemeriksaan`, `id_pasien`, `keluhan`, `tgl_periksa`, `id_dokter`, `id_diagnosis`, `id_lab`, `id_petugas`, `id_tindakan`, `id_obat`, `jumlah_obat`, `id_alkes`, `jumlah_alkes`, `id_pembayaran`) VALUES
(19, 32, 'Lemas', '2019-05-14', 1, 5, 4, 1, 5, 5, 10, 5, 2, 45),
(25, 39, 'Lemas', '2019-05-14', 1, 2, 3, 3, 3, 2, 1, 4, 1, 52),
(26, 43, 'Patah tulang', '2019-05-14', 1, 9, 4, 2, 6, 6, 2, 6, 5, 56);

--
-- Trigger `pemeriksaan`
--
DELIMITER $$
CREATE TRIGGER `After_Insert_Pemeriksaan` AFTER INSERT ON `pemeriksaan` FOR EACH ROW BEGIN

UPDATE obat SET stock_obat=stock_obat-NEW.jumlah_obat WHERE id_obat=NEW.id_obat;
UPDATE alkes SET stock_alkes=stock_alkes-NEW.jumlah_alkes WHERE id_alkes=NEW.id_alkes;

SET @trf_dokter = (SELECT tarif_dokter from dokter WHERE id_dokter=new.id_dokter); 
SET @trf_petugas = (SELECT tarif_petugas from petugas WHERE id_petugas=new.id_petugas); 
SET @hrg_obat = (SELECT harga_jual from obat WHERE id_obat=new.id_obat); 
SET @hrg_alkes = (SELECT harga_jual from alkes WHERE id_alkes=new.id_alkes); 
SET @trf_lab = (SELECT tarif_lab from lab WHERE id_lab=new.id_lab); 
SET @trf_tind = (SELECT tarif_tindakan from tindakan WHERE id_tindakan=new.id_tindakan); 

UPDATE pembayaran SET total_bayar=(@hrg_obat*NEW.jumlah_obat)+(@hrg_alkes*new.jumlah_alkes)+@trf_dokter+@trf_petugas+@trf_lab+@trf_tind WHERE id_pembayaran = new.id_pembayaran;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(20) NOT NULL,
  `nama_petugas` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(10) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tarif_petugas` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `tgl_lahir`, `jk`, `alamat`, `tgl_masuk`, `tarif_petugas`) VALUES
(1, 'Agung', '1994-05-09', 'Laki-Laki', 'Tasikmalaya', '2019-05-07', 50000),
(2, 'Sandra', '2019-05-04', 'Perempuan', 'Surabaya', '2019-05-15', 45000),
(3, 'Andri', '1993-05-03', 'Laki-Laki', 'Garut', '2019-03-19', 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rawat_inap`
--

CREATE TABLE `rawat_inap` (
  `id_rawat_inap` int(20) NOT NULL,
  `id_pasien` int(20) NOT NULL,
  `id_kamar` int(20) NOT NULL,
  `lama_menginap` int(20) NOT NULL,
  `id_pembayaran` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rawat_inap`
--

INSERT INTO `rawat_inap` (`id_rawat_inap`, `id_pasien`, `id_kamar`, `lama_menginap`, `id_pembayaran`) VALUES
(12, 32, 4, 2, 45);

--
-- Trigger `rawat_inap`
--
DELIMITER $$
CREATE TRIGGER `After_Insert_Rawat_Inap` AFTER INSERT ON `rawat_inap` FOR EACH ROW BEGIN
set @trf_kamar = (SELECT tarif_kamar from kamar WHERE id_kamar=new.id_kamar);
set @total_byr = (SELECT total_bayar from pembayaran WHERE id_pembayaran=new.id_pembayaran);

UPDATE pembayaran SET total_bayar=(@trf_kamar*new.lama_menginap) + @total_byr WHERE id_pembayaran=new.id_pembayaran;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rawat_jalan`
--

CREATE TABLE `rawat_jalan` (
  `id_rawat_jalan` int(20) NOT NULL,
  `id_pasien` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakan`
--

CREATE TABLE `tindakan` (
  `id_tindakan` int(20) NOT NULL,
  `nama_tindakan` varchar(20) NOT NULL,
  `tarif_tindakan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tindakan`
--

INSERT INTO `tindakan` (`id_tindakan`, `nama_tindakan`, `tarif_tindakan`) VALUES
(2, 'Jahit Luka', 100000),
(3, 'Bedah Ringan', 150000),
(4, 'Profilaksis', 200000),
(5, 'Tranfusi', 150000),
(6, 'Pemasangan gips', 120000),
(8, 'Konsultasi', 150000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alkes`
--
ALTER TABLE `alkes`
  ADD PRIMARY KEY (`id_alkes`);

--
-- Indeks untuk tabel `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`id_diagnosis`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indeks untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`id_kunjungan`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indeks untuk tabel `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id_lab`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indeks untuk tabel `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD PRIMARY KEY (`id_pemeriksaan`),
  ADD KEY `id_pasien` (`id_pasien`,`id_dokter`,`id_diagnosis`,`id_lab`,`id_petugas`,`id_tindakan`,`id_obat`,`id_alkes`),
  ADD KEY `id_pembayaran` (`id_pembayaran`),
  ADD KEY `pemeriksaan_ibfk_2` (`id_dokter`),
  ADD KEY `pemeriksaan_ibfk_4` (`id_lab`),
  ADD KEY `pemeriksaan_ibfk_5` (`id_petugas`),
  ADD KEY `pemeriksaan_ibfk_6` (`id_tindakan`),
  ADD KEY `pemeriksaan_ibfk_7` (`id_obat`),
  ADD KEY `pemeriksaan_ibfk_8` (`id_alkes`),
  ADD KEY `pemeriksaan_ibfk_3` (`id_diagnosis`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `rawat_inap`
--
ALTER TABLE `rawat_inap`
  ADD PRIMARY KEY (`id_rawat_inap`),
  ADD KEY `id_pasien` (`id_pasien`,`id_kamar`),
  ADD KEY `id_pembayaran` (`id_pembayaran`),
  ADD KEY `rawat_inap_ibfk_1` (`id_kamar`);

--
-- Indeks untuk tabel `rawat_jalan`
--
ALTER TABLE `rawat_jalan`
  ADD PRIMARY KEY (`id_rawat_jalan`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indeks untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id_tindakan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alkes`
--
ALTER TABLE `alkes`
  MODIFY `id_alkes` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id_diagnosis` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `id_kunjungan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `lab`
--
ALTER TABLE `lab`
  MODIFY `id_lab` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  MODIFY `id_pemeriksaan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `rawat_inap`
--
ALTER TABLE `rawat_inap`
  MODIFY `id_rawat_inap` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `rawat_jalan`
--
ALTER TABLE `rawat_jalan`
  MODIFY `id_rawat_jalan` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id_tindakan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD CONSTRAINT `kunjungan_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD CONSTRAINT `pemeriksaan_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemeriksaan_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pemeriksaan_ibfk_3` FOREIGN KEY (`id_diagnosis`) REFERENCES `diagnosis` (`id_diagnosis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemeriksaan_ibfk_4` FOREIGN KEY (`id_lab`) REFERENCES `lab` (`id_lab`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pemeriksaan_ibfk_5` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pemeriksaan_ibfk_6` FOREIGN KEY (`id_tindakan`) REFERENCES `tindakan` (`id_tindakan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pemeriksaan_ibfk_7` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pemeriksaan_ibfk_8` FOREIGN KEY (`id_alkes`) REFERENCES `alkes` (`id_alkes`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pemeriksaan_ibfk_9` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rawat_inap`
--
ALTER TABLE `rawat_inap`
  ADD CONSTRAINT `rawat_inap_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `rawat_inap_ibfk_2` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rawat_inap_ibfk_3` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rawat_jalan`
--
ALTER TABLE `rawat_jalan`
  ADD CONSTRAINT `rawat_jalan_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
