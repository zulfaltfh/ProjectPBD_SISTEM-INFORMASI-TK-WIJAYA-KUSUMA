/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.21-MariaDB : Database - db_prakarya
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_prakarya` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_prakarya`;

/*Table structure for table `jenis_pembayaran` */

DROP TABLE IF EXISTS `jenis_pembayaran`;

CREATE TABLE `jenis_pembayaran` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `jenis_pembayaran` */

insert  into `jenis_pembayaran`(`id_jenis`,`nama_jenis`) values 
(1,'Kas'),
(2,'SPP'),
(3,'Gedung'),
(4,'Seragam'),
(5,'Sumbangan'),
(6,'Study Tour'),
(7,'Renang'),
(8,'Wisuda'),
(9,'Makan Siang'),
(10,'Bis Sekolah');

/*Table structure for table `kel_belajar` */

DROP TABLE IF EXISTS `kel_belajar`;

CREATE TABLE `kel_belajar` (
  `kelompokbel` char(5) NOT NULL,
  `id_ruang_kelas` char(4) DEFAULT NULL,
  `NIP_peg` char(5) DEFAULT NULL,
  `id_tahunajar` char(5) DEFAULT NULL,
  `tingkatTK` char(1) NOT NULL,
  PRIMARY KEY (`kelompokbel`),
  KEY `kelBel_id_ruang_fk` (`id_ruang_kelas`),
  KEY `kelBel_nip_peg_fk` (`NIP_peg`),
  KEY `kelBel_id_tahunAjar_fk` (`id_tahunajar`),
  CONSTRAINT `kelBel_id_ruang_fk` FOREIGN KEY (`id_ruang_kelas`) REFERENCES `kelas` (`id_ruang_kelas`),
  CONSTRAINT `kelBel_id_tahunAjar_fk` FOREIGN KEY (`id_tahunajar`) REFERENCES `tahun_ajaran` (`id_tahunajar`),
  CONSTRAINT `kelBel_nip_peg_fk` FOREIGN KEY (`NIP_peg`) REFERENCES `pegawai` (`nip_peg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kel_belajar` */

insert  into `kel_belajar`(`kelompokbel`,`id_ruang_kelas`,`NIP_peg`,`id_tahunajar`,`tingkatTK`) values 
('15301','K-01','10907','TA-04','B'),
('15302','K-02','10986','TA-04','A'),
('15303','K-01','14852','TA-08','B'),
('15304','K-02','10765','TA-08','B'),
('15305','K-03','11872','TA-08','B'),
('15306','K-04','12905','TA-08','B'),
('15307','K-05','10986','TA-08','B'),
('15308','K-06','13935','TA-08','A'),
('15309','K-07','10907','TA-08','A'),
('15310','K-08','12893','TA-08','A'),
('15311','K-10','14098','TA-08','A'),
('15312','K-09','10781','TA-08','A');

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `id_ruang_kelas` char(4) NOT NULL,
  `nama_ruang_kelas` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_ruang_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kelas` */

insert  into `kelas`(`id_ruang_kelas`,`nama_ruang_kelas`) values 
('K-01','Apple'),
('K-02','Banana'),
('K-03','Cherry'),
('K-04','Durian'),
('K-05','Eggplant'),
('K-06','Fine'),
('K-07','Gentle'),
('K-08','Helpful'),
('K-09','Incredible'),
('K-10','Jolly');

/*Table structure for table `kriteria_nilai_bulanan` */

DROP TABLE IF EXISTS `kriteria_nilai_bulanan`;

CREATE TABLE `kriteria_nilai_bulanan` (
  `id_kriteria_bulanan` char(3) NOT NULL,
  `nama_kriteria_bulanan` varchar(40) NOT NULL,
  PRIMARY KEY (`id_kriteria_bulanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kriteria_nilai_bulanan` */

insert  into `kriteria_nilai_bulanan`(`id_kriteria_bulanan`,`nama_kriteria_bulanan`) values 
('B01','Nilai Sikap'),
('B02','Nilai Quiz'),
('B03','Nilai Sosial'),
('B04','Nilai Kerjasama'),
('B05','Nilai Kedisiplinan'),
('B06','Nilai Keaktifan'),
('B07','Nilai Keterampilan'),
('B08','Nilai Kejujuran'),
('B09','Nilai Religius'),
('B10','Nilai Kreativitas');

/*Table structure for table `kriteria_nilai_harian` */

DROP TABLE IF EXISTS `kriteria_nilai_harian`;

CREATE TABLE `kriteria_nilai_harian` (
  `id_kriteria_harian` char(3) NOT NULL,
  `nama_kriteria_harian` varchar(40) NOT NULL,
  PRIMARY KEY (`id_kriteria_harian`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kriteria_nilai_harian` */

insert  into `kriteria_nilai_harian`(`id_kriteria_harian`,`nama_kriteria_harian`) values 
('H01','Nilai Menghitung'),
('H02','Nilai Membaca'),
('H03','Nilai Menghafal'),
('H04','Nilai Menulis'),
('H05','Nilai Bercerita'),
('H06','Nilai Kesenian'),
('H07','Nilai Bahasa Indonesia'),
('H08','Nilai Bahasa Inggris'),
('H09','Nilai Agama'),
('H10','Nilai Olahraga');

/*Table structure for table `nilai_bulanan` */

DROP TABLE IF EXISTS `nilai_bulanan`;

CREATE TABLE `nilai_bulanan` (
  `id_nilai_bulanan` char(6) NOT NULL,
  `noinduk_siswa` char(10) DEFAULT NULL,
  `bulan_ambil_nilai` date NOT NULL,
  PRIMARY KEY (`id_nilai_bulanan`),
  KEY `nilai_bulanan_noInduk_fk` (`noinduk_siswa`),
  CONSTRAINT `nilai_bulanan_noInduk_fk` FOREIGN KEY (`noinduk_siswa`) REFERENCES `siswa` (`noinduk_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `nilai_bulanan` */

insert  into `nilai_bulanan`(`id_nilai_bulanan`,`noinduk_siswa`,`bulan_ambil_nilai`) values 
('NB-001','1806201301','2018-07-21'),
('NB-002','2007201501','2021-06-01'),
('NB-003','1806201303','2018-07-12'),
('NB-004','1806201301','2022-01-04'),
('NB-005','1806201301','2022-01-04'),
('NB-006','1806201302','2022-01-03'),
('NB-007','1806201302','2022-01-05');

/*Table structure for table `nilai_harian` */

DROP TABLE IF EXISTS `nilai_harian`;

CREATE TABLE `nilai_harian` (
  `id_nilai_harian` char(8) NOT NULL,
  `noinduk_siswa` char(10) DEFAULT NULL,
  `tgl_ambil_nilai` date NOT NULL,
  PRIMARY KEY (`id_nilai_harian`),
  KEY `nilai_harian_id_siswa_fk` (`noinduk_siswa`),
  CONSTRAINT `nilai_harian_id_siswa_fk` FOREIGN KEY (`noinduk_siswa`) REFERENCES `siswa` (`noinduk_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `nilai_harian` */

insert  into `nilai_harian`(`id_nilai_harian`,`noinduk_siswa`,`tgl_ambil_nilai`) values 
('NH-00001','1806201301','2018-07-20'),
('NH-00002','1806201302','2018-07-20'),
('NH-00003','1806201303','2018-07-20'),
('NH-00004','1906201401','2019-07-22'),
('NH-00005','1906201402','2019-08-03'),
('NH-00006','2007201501','2020-07-25'),
('NH-00007','2007201502','2020-01-10'),
('NH-00008','2007201503','2020-09-17'),
('NH-00009','2007201504','2021-01-05'),
('NH-00010','2007201505','2021-01-01'),
('NH-00011','1806201301','2022-01-01'),
('NH-00012','1806201301','2022-01-06'),
('NH-00013','1806201301','2022-01-01'),
('NH-00014','1806201301','2022-01-14');

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `nip_peg` char(5) NOT NULL,
  `nama_peg` varchar(50) NOT NULL,
  `jk_peg` tinyint(1) NOT NULL,
  `alamat_peg` varchar(100) NOT NULL,
  `notelp_peg` varchar(15) NOT NULL,
  `email_peg` varchar(40) DEFAULT NULL,
  `tglmasuk_peg` date NOT NULL,
  `password` char(8) NOT NULL,
  `role` char(8) DEFAULT 'guru',
  PRIMARY KEY (`nip_peg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pegawai` */

insert  into `pegawai`(`nip_peg`,`nama_peg`,`jk_peg`,`alamat_peg`,`notelp_peg`,`email_peg`,`tglmasuk_peg`,`password`,`role`) values 
('10765','Anang Tri',0,'Gresik','081256780923','anangtri123@gmail.com','1995-04-24','anang123','admin'),
('10781','Maudy Ayunda',1,'Mojokerto','088291726313','maudyayunda@gmail.com','2001-05-05','maudy123','guru'),
('10907','Fadil Jaidi',0,'Jakarta','081234671923','fadiljaidi@gmail.com','2000-04-01','fadil123','guru'),
('10986','Purnomo',0,'Kediri','085763891824','purnomo134@gmail.com','1995-02-03','ahay1234','guru'),
('11872','Endang Purwanti',1,'Surabaya','088546512357','endangpur134@gmail.com','1997-10-12','','guru'),
('12893','Pevita Pearce',1,'Tulungagung','085231711827','pevpearce@gmail.com','2002-02-10','','guru'),
('12905','Hartutik',1,'Sidoarjo','081621987234','hartutik123@gmail.com','1996-01-11','','guru'),
('13935','Ariana Grande',1,'Jombang','082537491732','argrande@gmail.com','2019-05-12','ariana12','guru'),
('14098','Jerome Polin',0,'Surabaya','082368192398','jerpolin@gmail.com','2020-03-15','','guru'),
('14852','Endah Ningrum',1,'Mojokerto','081357465012','endahning134@gmail.com','1996-11-20','','guru');

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `no_bayar` char(10) NOT NULL,
  `noinduk_siswa` char(10) DEFAULT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `tgl_bayar` date NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `status_bayar` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`no_bayar`),
  KEY `pemb_induk_siswa_fk` (`noinduk_siswa`),
  KEY `pemb_id_jenis_fk` (`id_jenis`),
  CONSTRAINT `pemb_id_jenis_fk` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_pembayaran` (`id_jenis`),
  CONSTRAINT `pemb_induk_siswa_fk` FOREIGN KEY (`noinduk_siswa`) REFERENCES `siswa` (`noinduk_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pembayaran` */

insert  into `pembayaran`(`no_bayar`,`noinduk_siswa`,`id_jenis`,`tgl_bayar`,`jumlah_bayar`,`status_bayar`) values 
('BA19010101','1806201301',1,'2019-01-01',20000,1),
('BA19082002','1806201302',2,'2019-08-20',250000,1),
('BA19092003','1806201303',4,'2019-09-20',200000,1),
('BA20020104','1906201401',5,'2020-02-01',350000,1),
('BA20052005','1906201402',7,'2020-05-20',35000,1),
('BA20102006','2007201501',2,'2020-10-20',250000,1),
('BA20121207','2007201502',10,'2020-12-12',100000,1),
('BA21050508','2007201503',8,'2021-05-05',150000,1),
('BA21091009','2007201504',3,'2021-09-10',750000,1),
('BA21091010','2007201505',3,'2021-09-10',350000,1),
('BA21091011','2109201501',3,'2021-09-10',400000,1),
('BA21091012','2109201602',3,'2021-09-10',400000,1),
('BA21091013','2109201603',3,'2021-09-10',400000,1),
('BA21091014','2109201604',3,'2021-09-10',400000,0),
('BA21091015','2109201505',3,'2021-09-10',400000,0);

/*Table structure for table `prakarya` */

DROP TABLE IF EXISTS `prakarya`;

CREATE TABLE `prakarya` (
  `id_prakarya` char(10) DEFAULT NULL,
  `id_tugasprak` char(10) DEFAULT NULL,
  `noinduk_siswa` char(10) DEFAULT NULL,
  `tgl_prakarya` date NOT NULL,
  `filepath_prakarya` varchar(100) NOT NULL,
  KEY `prakarya_id_tugas_fk` (`id_tugasprak`),
  KEY `prakarya_id_siswa_fk` (`noinduk_siswa`),
  CONSTRAINT `prakarya_id_siswa_fk` FOREIGN KEY (`noinduk_siswa`) REFERENCES `siswa` (`noinduk_siswa`),
  CONSTRAINT `prakarya_id_tugas_fk` FOREIGN KEY (`id_tugasprak`) REFERENCES `tugas_prakarya` (`id_tugasprak`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `prakarya` */

/*Table structure for table `raport` */

DROP TABLE IF EXISTS `raport`;

CREATE TABLE `raport` (
  `id_rapor` char(5) NOT NULL,
  `noinduk_siswa` char(10) DEFAULT NULL,
  `cat_rapor` varchar(100) NOT NULL,
  `tgl_ambil` date NOT NULL,
  PRIMARY KEY (`id_rapor`),
  KEY `raport_no_siswa_fk` (`noinduk_siswa`),
  CONSTRAINT `raport_no_siswa_fk` FOREIGN KEY (`noinduk_siswa`) REFERENCES `siswa` (`noinduk_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `raport` */

insert  into `raport`(`id_rapor`,`noinduk_siswa`,`cat_rapor`,`tgl_ambil`) values 
('R-001','1806201301','Kreativitas lebih ditingkatkan kembali.','2018-11-29'),
('R-002','1806201301','Jangan bosan-bosan untuk membaca!','2019-05-25'),
('R-003','1806201302','Ayo gak boleh malas bangun pagi!','2018-11-29'),
('R-004','1806201302','Kreativitasnya tetap dijaga','2019-05-25'),
('R-005','1806201303','Lebih aktif lagi ya semester depan','2018-11-29'),
('R-006','1806201303','Semangat belajarnya','2019-05-25'),
('R-007','1906201401','Ayo belajarnya ditingkatkan lagi!','2019-11-10'),
('R-008','1906201401','Banyak-banyak membaca ya!','2020-06-15'),
('R-009','1906201401','Kreativitasnya dipertahankan!','2020-12-01'),
('R-010','1906201402','Mengajinya ditingkatkan lagi','2019-11-10'),
('R-011','1906201402','Kedisiplinannya perlu ditingkatkan','2020-06-15'),
('R-012','1906201402','Jangan banyak terlambat','2020-12-01'),
('R-013','2007201501','Ditingkatkan lagi belajarnya!','2020-12-01'),
('R-014','2007201501','Jangan malas-malas membaca buku ya!','2021-07-11'),
('R-015','2007201502','Ditingkatkan lagi belajarnya!','2020-12-01'),
('R-016','2007201502','Kedisiplinannya sudah baik','2021-07-11'),
('R-017','2007201503','Ditingkatkan lagi belajarnya!','2020-12-01'),
('R-018','2007201503','Jangan malas-malas membaca buku ya!','2021-07-11'),
('R-019','2007201504','Ditingkatkan lagi belajarnya!','2020-12-01'),
('R-020','2007201504','Lebih aktif lagi ya semester depan','2021-07-11'),
('R-021','2007201505','Ditingkatkan lagi belajarnya!','2020-12-01'),
('R-022','2007201505','Kedisiplinannya sudah baik','2021-07-11'),
('R-023','1806201301','Perlu ditingkatkan lagi keaktifannya','2021-11-30'),
('R-024','1806201301','Lebih semangat lagi belajarnya','2022-01-01'),
('R-025','1806201302','tetap semangat','2022-01-06');

/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `noinduk_siswa` char(10) NOT NULL,
  `NIK_walmur` char(14) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenis_kelamin` tinyint(1) NOT NULL,
  `tgllahir` date NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_lulus` date DEFAULT NULL,
  `alamat` varchar(80) NOT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `status_daftar` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`noinduk_siswa`),
  KEY `siswa_NIK_walmur_fk` (`NIK_walmur`),
  CONSTRAINT `siswa_NIK_walmur_fk` FOREIGN KEY (`NIK_walmur`) REFERENCES `walimurid` (`NIK_walmur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `siswa` */

insert  into `siswa`(`noinduk_siswa`,`NIK_walmur`,`nama_siswa`,`jenis_kelamin`,`tgllahir`,`tgl_masuk`,`tgl_lulus`,`alamat`,`anak_ke`,`status_daftar`) values 
('1806201301','35271493727463','Dara Arafah',1,'2013-07-10','2018-06-10','2020-05-20','Jalan Baruk Tengah gg 5/21',1,1),
('1806201302','35234812923741','Mochammad Adam',0,'2013-04-11','2018-06-10','2020-05-20','Perum Puri Indah blok F/04',2,1),
('1806201303','35414607298012','Anggara Teguh',0,'2013-10-15','2018-06-10','2020-05-20','Grand Anyar Flora blok E/11',1,1),
('1906201401','35427236178201','Bunga Eka',1,'2014-10-01','2019-06-12','2021-05-11','Perum Grand Anyar Blok B/04',2,1),
('1906201402','35480134672194','Puspa Anggraini',1,'2014-07-11','2019-06-12','2021-05-11','Jl. Mekar Ayu No 2',1,1),
('2007201501','35436218265467','Andrian Milan',0,'2015-06-08','2020-07-15',NULL,'Jl.Pattimura Barat no 2',2,1),
('2007201502','35362183649653','Citra Savira',1,'2015-11-22','2020-07-15',NULL,'Griya Taman Asri Blok J/15',3,1),
('2007201503','35152736218239','Bulan Ayu',1,'2015-10-26','2020-07-15',NULL,'Jl.Pegangsaan Timur No 13',4,1),
('2007201504','35281737263892','Kusuma Arni',1,'2015-09-01','2020-07-15',NULL,'Jl.Mulawarman Barat Blok I/01',2,1),
('2007201505','35454137126381','Ahmad Bachdim',0,'2015-01-01','2020-07-15',NULL,'Perum Secret Garden Blok B/04',3,1),
('2109201501','35480134672194','Muhammad Abdul',0,'2015-07-09','2021-09-10',NULL,'Jl.Mekar Ayu No 02',3,1),
('2109201505','35427236178201','Jeremy Thomas',0,'2015-12-11','2021-09-10',NULL,'Perum Grand Anyar Blok B/04',4,1),
('2109201602','35454781523903','Raihan Bagus',0,'2016-02-01','2021-09-10',NULL,'Jl.Ahmad Yani Timur Gg H/10',3,1),
('2109201603','35414607298012','Ahmad Andika',0,'2016-03-20','2021-09-10',NULL,'Jl.Pegangsaan Barat No 13',2,0),
('2109201604','35462819364819','Putri Damayanti',1,'2016-09-15','2021-09-10',NULL,'Jl.Banyu Mati Selatan Gg 5/01',3,0);

/*Table structure for table `tahun_ajaran` */

DROP TABLE IF EXISTS `tahun_ajaran`;

CREATE TABLE `tahun_ajaran` (
  `id_tahunajar` char(5) NOT NULL,
  `tahunajar` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tahunajar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tahun_ajaran` */

insert  into `tahun_ajaran`(`id_tahunajar`,`tahunajar`) values 
('TA-01','GENAP 2018/2019'),
('TA-02','GASAL 2018/2019'),
('TA-03','GENAP 2019/2020'),
('TA-04','GASAL 2019/2020'),
('TA-05','GENAP 2020/2021'),
('TA-06','GASAL 2020/2021'),
('TA-07','GENAP 2021/2022'),
('TA-08','GASAL 2021/2022'),
('TA-09','GENAP 2022/2023'),
('TA-10','GASAL 2022/2023');

/*Table structure for table `terdiri` */

DROP TABLE IF EXISTS `terdiri`;

CREATE TABLE `terdiri` (
  `id_nilai_harian` char(8) NOT NULL,
  `id_kriteria_harian` char(3) NOT NULL,
  `nilai_kkm` int(11) DEFAULT NULL,
  `nilai_har` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_nilai_harian`,`id_kriteria_harian`),
  KEY `terdiri_kriteria_fk` (`id_kriteria_harian`),
  CONSTRAINT `terdiri_kriteria_fk` FOREIGN KEY (`id_kriteria_harian`) REFERENCES `kriteria_nilai_harian` (`id_kriteria_harian`),
  CONSTRAINT `terdiri_nilai_fk` FOREIGN KEY (`id_nilai_harian`) REFERENCES `nilai_harian` (`id_nilai_harian`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `terdiri` */

insert  into `terdiri`(`id_nilai_harian`,`id_kriteria_harian`,`nilai_kkm`,`nilai_har`) values 
('NH-00001','H01',70,65),
('NH-00002','H01',75,45),
('NH-00002','H03',70,90),
('NH-00002','H05',70,60),
('NH-00003','H01',70,15),
('NH-00006','H01',60,75);

/*Table structure for table `terdiri2` */

DROP TABLE IF EXISTS `terdiri2`;

CREATE TABLE `terdiri2` (
  `id_nilai_bulanan` char(6) NOT NULL,
  `id_kriteria_bulanan` char(3) NOT NULL,
  `nilai_bul` int(11) NOT NULL,
  `nilai_kkm` int(11) NOT NULL,
  PRIMARY KEY (`id_nilai_bulanan`,`id_kriteria_bulanan`),
  KEY `terdiri2_id_kriteria_fk` (`id_kriteria_bulanan`),
  CONSTRAINT `terdiri2_id_kriteria_fk` FOREIGN KEY (`id_kriteria_bulanan`) REFERENCES `kriteria_nilai_bulanan` (`id_kriteria_bulanan`),
  CONSTRAINT `terdiri2_id_nilai_fk` FOREIGN KEY (`id_nilai_bulanan`) REFERENCES `nilai_bulanan` (`id_nilai_bulanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `terdiri2` */

insert  into `terdiri2`(`id_nilai_bulanan`,`id_kriteria_bulanan`,`nilai_bul`,`nilai_kkm`) values 
('NB-001','B01',75,69),
('NB-001','B02',55,70),
('NB-002','B01',85,70),
('NB-002','B02',90,70),
('NB-002','B03',70,60),
('NB-003','B01',90,70),
('NB-003','B02',90,70),
('NB-004','B06',75,70),
('NB-005','B01',55,70),
('NB-007','B04',80,70),
('NB-007','B09',80,70);

/*Table structure for table `tergabung_dalam` */

DROP TABLE IF EXISTS `tergabung_dalam`;

CREATE TABLE `tergabung_dalam` (
  `noinduk_siswa` char(10) NOT NULL,
  `kelompokbel` char(5) NOT NULL,
  PRIMARY KEY (`noinduk_siswa`,`kelompokbel`),
  KEY `tergabung_kelBel_fk` (`kelompokbel`),
  CONSTRAINT `tergabung_kelBel_fk` FOREIGN KEY (`kelompokbel`) REFERENCES `kel_belajar` (`kelompokbel`),
  CONSTRAINT `tergabung_no_induk_fk` FOREIGN KEY (`noinduk_siswa`) REFERENCES `siswa` (`noinduk_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tergabung_dalam` */

insert  into `tergabung_dalam`(`noinduk_siswa`,`kelompokbel`) values 
('1806201301','15301'),
('1806201302','15301'),
('1806201303','15301'),
('1906201401','15302'),
('1906201402','15302'),
('2007201501','15307'),
('2007201502','15307'),
('2007201503','15307'),
('2007201504','15307'),
('2007201505','15307');

/*Table structure for table `tugas_prakarya` */

DROP TABLE IF EXISTS `tugas_prakarya`;

CREATE TABLE `tugas_prakarya` (
  `id_tugasprak` char(10) NOT NULL,
  `nama_tugasprak` varchar(20) NOT NULL,
  `deskripsi_tugasprak` varchar(50) NOT NULL,
  `start_tugas` date NOT NULL,
  `end_tugas` date NOT NULL,
  PRIMARY KEY (`id_tugasprak`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tugas_prakarya` */

insert  into `tugas_prakarya`(`id_tugasprak`,`nama_tugasprak`,`deskripsi_tugasprak`,`start_tugas`,`end_tugas`) values 
('TU-PRAK001','Menggambar','Menggambar Bentuk Bunga','2021-01-12','2021-01-15'),
('TU-PRAK002','Melukis','Melukis di Cangkang Telur','2021-02-05','2021-02-12'),
('TU-PRAK003','Menggunting','Menggunting Pola','2021-02-14','2021-02-20'),
('TU-PRAK004','Menempel','Menempel Kain Perca','2021-03-12','2021-03-19'),
('TU-PRAK005','Menjahit','Menjahit Pola','2021-03-15','2021-03-20'),
('TU-PRAK006','Mewarnai','Mewarnai Gambar','2021-04-05','2021-04-12'),
('TU-PRAK007','Melipat','Melipat Kertas Origami','2021-05-15','2021-05-18'),
('TU-PRAK008','Merangkai','Merangkai Bunga Kertas','2021-06-20','2021-06-25'),
('TU-PRAK009','Daur Ulang','Kerajinan dari Botol Bekas','2021-07-11','2021-07-20'),
('TU-PRAK010','Menghias','Menghias Vas Bunga Keramik','2021-08-24','2021-08-30'),
('TU-PRAK012','Menjahit','Menjahit pola buah-buahan  ','2022-01-12','2022-01-16'),
('TU-PRAK013','Merangkai','Merangkai kerangka kapal dari tusuk sate','2022-01-14','2022-01-17');

/*Table structure for table `walimurid` */

DROP TABLE IF EXISTS `walimurid`;

CREATE TABLE `walimurid` (
  `NIK_walmur` char(14) NOT NULL,
  `nama_walmur` varchar(50) NOT NULL,
  `pekerjaan_walmur` varchar(30) NOT NULL,
  PRIMARY KEY (`NIK_walmur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `walimurid` */

insert  into `walimurid`(`NIK_walmur`,`nama_walmur`,`pekerjaan_walmur`) values 
('35152736218239','Bintang Ahmad','PNS'),
('35234812923741','Andre Taulani','Pengusaha'),
('35247381237492','Raffi Ahmad','Artis'),
('35271493727463','Keanu Angelo','Pengusaha'),
('35281737263892','Andre Sudirman','Dokter'),
('35362183649653','Udin Suyono','PNS'),
('35414607298012','Jales Hendradi','TNI'),
('35427236178201','Alexender Jay','Dokter'),
('35436218265467','Wijaya Kusuma','Polisi'),
('35454137126381','Rahmad Udin','Pengusaha'),
('35454781523903','Ahmad Budianto','PNS'),
('35462819364819','Andik Firmansyah','Polisi'),
('35480134672194','Putra Sujono','Wiraswasta');

/* Trigger structure for table `kel_belajar` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_kel` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_kel` BEFORE INSERT ON `kel_belajar` FOR EACH ROW 
BEGIN
	SET NEW.kelompokbel = CONCAT('153',LPAD((IFNULL((SELECT CAST(SUBSTR(kelompokbel,4,5)AS INT) 
	FROM kel_belajar
	ORDER BY kelompokbel DESC 
	LIMIT 1),0)+1),2,"0"));
END */$$


DELIMITER ;

/* Trigger structure for table `nilai_bulanan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_nilbul` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_nilbul` BEFORE INSERT ON `nilai_bulanan` FOR EACH ROW 
BEGIN
	SET NEW.id_nilai_bulanan = CONCAT('NB-',LPAD((IFNULL((SELECT CAST(SUBSTR(id_nilai_bulanan,4,6)AS INT) 
	FROM nilai_bulanan
	ORDER BY id_nilai_bulanan DESC 
	LIMIT 1),0)+1),3,"0"));
END */$$


DELIMITER ;

/* Trigger structure for table `nilai_harian` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_nilhar` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_nilhar` BEFORE INSERT ON `nilai_harian` FOR EACH ROW 
BEGIN
	SET NEW.id_nilai_harian = CONCAT('NH-',LPAD((IFNULL((SELECT CAST(SUBSTR(id_nilai_harian,4,8)AS INT) 
	FROM nilai_harian
	ORDER BY id_nilai_harian DESC 
	LIMIT 1),0)+1),5,"0"));
END */$$


DELIMITER ;

/* Trigger structure for table `pembayaran` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_bayar` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_bayar` BEFORE INSERT ON `pembayaran` FOR EACH ROW 
BEGIN
	SET NEW.no_bayar = CONCAT('BA',DATE_FORMAT(NEW.tgl_bayar, '%y%m%d'),LPAD((
	IFNULL((SELECT CAST(SUBSTR(no_bayar,9,10)AS INT) 
	FROM pembayaran
	ORDER BY no_bayar DESC 
	LIMIT 1),0)+1),2,"0"));
END */$$


DELIMITER ;

/* Trigger structure for table `raport` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_raport` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_raport` BEFORE INSERT ON `raport` FOR EACH ROW 
BEGIN
	SET NEW.id_rapor = CONCAT ('R-',LPAD((IFNULL((SELECT CAST(SUBSTR(id_rapor,3,5)AS INT)
	FROM raport
	ORDER BY id_rapor DESC
	LIMIT 1),0)+1),3,"0"));
END */$$


DELIMITER ;

/* Trigger structure for table `siswa` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_siswa` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_siswa` BEFORE INSERT ON `siswa` FOR EACH ROW 
BEGIN
	SET NEW.noinduk_siswa = CONCAT(DATE_FORMAT(NEW.tgl_masuk, '%y%m'),DATE_FORMAT(NEW.tgllahir, '%Y'),LPAD((IFNULL(
	(SELECT CAST(SUBSTR(noinduk_siswa,9)AS INT)
	FROM siswa
	WHERE tgl_masuk = NEW.tgl_masuk
	ORDER BY noinduk_siswa DESC 
	LIMIT 1),0)+1),2,"0"));
END */$$


DELIMITER ;

/* Trigger structure for table `tugas_prakarya` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_tugas` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_tugas` BEFORE INSERT ON `tugas_prakarya` FOR EACH ROW 
BEGIN
	SET NEW.id_tugasprak = CONCAT('TU-PRAK',LPAD((
	IFNULL((SELECT CAST(SUBSTR(id_tugasprak,8,10)AS INT) 
	FROM tugas_prakarya
	ORDER BY id_tugasprak DESC 
	LIMIT 1),0)+1),3,"0"));
END */$$


DELIMITER ;

/* Procedure structure for procedure `tergabung` */

/*!50003 DROP PROCEDURE IF EXISTS  `tergabung` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `tergabung`(IN kelbel CHAR(5))
BEGIN
	SELECT td.*, siswa.nama_siswa, siswa.NIK_walmur 
	FROM tergabung_dalam td 
	INNER JOIN siswa ON siswa.noinduk_siswa = td.noinduk_siswa 
	WHERE kelompokbel = kelbel;
END */$$
DELIMITER ;

/*Table structure for table `detnilbul_vu` */

DROP TABLE IF EXISTS `detnilbul_vu`;

/*!50001 DROP VIEW IF EXISTS `detnilbul_vu` */;
/*!50001 DROP TABLE IF EXISTS `detnilbul_vu` */;

/*!50001 CREATE TABLE  `detnilbul_vu`(
 `id_nilai_bulanan` char(6) ,
 `id_kriteria_bulanan` char(3) ,
 `nilai_bul` int(11) ,
 `nilai_kkm` int(11) ,
 `noinduk_siswa` char(10) ,
 `nama_siswa` varchar(50) ,
 `bulan_ambil_nilai` date ,
 `nama_kriteria_bulanan` varchar(40) 
)*/;

/*Table structure for table `detnilhar_vu` */

DROP TABLE IF EXISTS `detnilhar_vu`;

/*!50001 DROP VIEW IF EXISTS `detnilhar_vu` */;
/*!50001 DROP TABLE IF EXISTS `detnilhar_vu` */;

/*!50001 CREATE TABLE  `detnilhar_vu`(
 `id_nilai_harian` char(8) ,
 `id_kriteria_harian` char(3) ,
 `nilai_kkm` int(11) ,
 `nilai_har` int(11) ,
 `noinduk_siswa` char(10) ,
 `nama_siswa` varchar(50) ,
 `tgl_ambil_nilai` date ,
 `nama_kriteria_harian` varchar(40) 
)*/;

/*Table structure for table `kel_bel` */

DROP TABLE IF EXISTS `kel_bel`;

/*!50001 DROP VIEW IF EXISTS `kel_bel` */;
/*!50001 DROP TABLE IF EXISTS `kel_bel` */;

/*!50001 CREATE TABLE  `kel_bel`(
 `kelompokbel` char(5) ,
 `id_ruang_kelas` char(4) ,
 `NIP_peg` char(5) ,
 `id_tahunajar` char(5) ,
 `tingkatTK` char(1) ,
 `nama_ruang_kelas` varchar(10) ,
 `nama_peg` varchar(50) ,
 `tahunajar` varchar(50) 
)*/;

/*Table structure for table `pembayaran_vu` */

DROP TABLE IF EXISTS `pembayaran_vu`;

/*!50001 DROP VIEW IF EXISTS `pembayaran_vu` */;
/*!50001 DROP TABLE IF EXISTS `pembayaran_vu` */;

/*!50001 CREATE TABLE  `pembayaran_vu`(
 `no_bayar` char(10) ,
 `noinduk_siswa` char(10) ,
 `id_jenis` int(11) ,
 `tgl_bayar` date ,
 `jumlah_bayar` int(11) ,
 `status_bayar` tinyint(1) ,
 `nama_siswa` varchar(50) ,
 `nama_jenis` varchar(20) 
)*/;

/*Table structure for table `siswa_vu` */

DROP TABLE IF EXISTS `siswa_vu`;

/*!50001 DROP VIEW IF EXISTS `siswa_vu` */;
/*!50001 DROP TABLE IF EXISTS `siswa_vu` */;

/*!50001 CREATE TABLE  `siswa_vu`(
 `noinduk_siswa` char(10) ,
 `nama_siswa` varchar(50) ,
 `nama_ruang_kelas` varchar(10) ,
 `nip_peg` char(5) ,
 `tahunajar` varchar(50) ,
 `tingkatTK` char(1) 
)*/;

/*View structure for view detnilbul_vu */

/*!50001 DROP TABLE IF EXISTS `detnilbul_vu` */;
/*!50001 DROP VIEW IF EXISTS `detnilbul_vu` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detnilbul_vu` AS select `ter`.`id_nilai_bulanan` AS `id_nilai_bulanan`,`ter`.`id_kriteria_bulanan` AS `id_kriteria_bulanan`,`ter`.`nilai_bul` AS `nilai_bul`,`ter`.`nilai_kkm` AS `nilai_kkm`,`siswa`.`noinduk_siswa` AS `noinduk_siswa`,`siswa`.`nama_siswa` AS `nama_siswa`,`nilbul`.`bulan_ambil_nilai` AS `bulan_ambil_nilai`,`kri`.`nama_kriteria_bulanan` AS `nama_kriteria_bulanan` from (((`terdiri2` `ter` join `kriteria_nilai_bulanan` `kri` on(`kri`.`id_kriteria_bulanan` = `ter`.`id_kriteria_bulanan`)) join `nilai_bulanan` `nilbul` on(`nilbul`.`id_nilai_bulanan` = `ter`.`id_nilai_bulanan`)) join `siswa` on(`siswa`.`noinduk_siswa` = `nilbul`.`noinduk_siswa`)) */;

/*View structure for view detnilhar_vu */

/*!50001 DROP TABLE IF EXISTS `detnilhar_vu` */;
/*!50001 DROP VIEW IF EXISTS `detnilhar_vu` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detnilhar_vu` AS select `ter`.`id_nilai_harian` AS `id_nilai_harian`,`ter`.`id_kriteria_harian` AS `id_kriteria_harian`,`ter`.`nilai_kkm` AS `nilai_kkm`,`ter`.`nilai_har` AS `nilai_har`,`siswa`.`noinduk_siswa` AS `noinduk_siswa`,`siswa`.`nama_siswa` AS `nama_siswa`,`nilhar`.`tgl_ambil_nilai` AS `tgl_ambil_nilai`,`kri`.`nama_kriteria_harian` AS `nama_kriteria_harian` from (((`terdiri` `ter` join `kriteria_nilai_harian` `kri` on(`kri`.`id_kriteria_harian` = `ter`.`id_kriteria_harian`)) join `nilai_harian` `nilhar` on(`nilhar`.`id_nilai_harian` = `ter`.`id_nilai_harian`)) join `siswa` on(`siswa`.`noinduk_siswa` = `nilhar`.`noinduk_siswa`)) */;

/*View structure for view kel_bel */

/*!50001 DROP TABLE IF EXISTS `kel_bel` */;
/*!50001 DROP VIEW IF EXISTS `kel_bel` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kel_bel` AS select `kel`.`kelompokbel` AS `kelompokbel`,`kel`.`id_ruang_kelas` AS `id_ruang_kelas`,`kel`.`NIP_peg` AS `NIP_peg`,`kel`.`id_tahunajar` AS `id_tahunajar`,`kel`.`tingkatTK` AS `tingkatTK`,`kelas`.`nama_ruang_kelas` AS `nama_ruang_kelas`,`peg`.`nama_peg` AS `nama_peg`,`ta`.`tahunajar` AS `tahunajar` from (((`kel_belajar` `kel` join `kelas` on(`kelas`.`id_ruang_kelas` = `kel`.`id_ruang_kelas`)) join `pegawai` `peg` on(`peg`.`nip_peg` = `kel`.`NIP_peg`)) join `tahun_ajaran` `ta` on(`ta`.`id_tahunajar` = `kel`.`id_tahunajar`)) */;

/*View structure for view pembayaran_vu */

/*!50001 DROP TABLE IF EXISTS `pembayaran_vu` */;
/*!50001 DROP VIEW IF EXISTS `pembayaran_vu` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pembayaran_vu` AS select `pembayaran`.`no_bayar` AS `no_bayar`,`pembayaran`.`noinduk_siswa` AS `noinduk_siswa`,`pembayaran`.`id_jenis` AS `id_jenis`,`pembayaran`.`tgl_bayar` AS `tgl_bayar`,`pembayaran`.`jumlah_bayar` AS `jumlah_bayar`,`pembayaran`.`status_bayar` AS `status_bayar`,`siswa`.`nama_siswa` AS `nama_siswa`,`jenis`.`nama_jenis` AS `nama_jenis` from ((`pembayaran` join `siswa` on(`siswa`.`noinduk_siswa` = `pembayaran`.`noinduk_siswa`)) join `jenis_pembayaran` `jenis` on(`jenis`.`id_jenis` = `pembayaran`.`id_jenis`)) */;

/*View structure for view siswa_vu */

/*!50001 DROP TABLE IF EXISTS `siswa_vu` */;
/*!50001 DROP VIEW IF EXISTS `siswa_vu` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `siswa_vu` AS select `sis`.`noinduk_siswa` AS `noinduk_siswa`,`sis`.`nama_siswa` AS `nama_siswa`,`kelas`.`nama_ruang_kelas` AS `nama_ruang_kelas`,`peg`.`nip_peg` AS `nip_peg`,`ta`.`tahunajar` AS `tahunajar`,`kel`.`tingkatTK` AS `tingkatTK` from (((((`siswa` `sis` join `tergabung_dalam` `td` on(`sis`.`noinduk_siswa` = `td`.`noinduk_siswa`)) join `kel_belajar` `kel` on(`td`.`kelompokbel` = `kel`.`kelompokbel`)) join `kelas` on(`kelas`.`id_ruang_kelas` = `kel`.`id_ruang_kelas`)) join `pegawai` `peg` on(`peg`.`nip_peg` = `kel`.`NIP_peg`)) join `tahun_ajaran` `ta` on(`ta`.`id_tahunajar` = `kel`.`id_tahunajar`)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
