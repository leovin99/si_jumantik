/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.3.16-MariaDB : Database - db_jumantik
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_jumantik` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_jumantik`;

/*Table structure for table `tb_markers` */

DROP TABLE IF EXISTS `tb_markers`;

CREATE TABLE `tb_markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(16) DEFAULT NULL,
  `nama` varchar(60) NOT NULL,
  `alamat` varchar(80) NOT NULL,
  `banjar` varchar(50) DEFAULT NULL,
  `desa` varchar(50) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `tpa_dalam` varchar(600) DEFAULT NULL,
  `tpa_luar` varchar(600) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `tb_markers_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

/*Data for the table `tb_markers` */

insert  into `tb_markers`(`id`,`nik`,`nama`,`alamat`,`banjar`,`desa`,`tanggal`,`lat`,`lng`,`tpa_dalam`,`tpa_luar`,`id_user`,`category`) values 
(1,'5171013103980004','Leovin','Jln. Tukad Mawa','Kangin','Panjer','2019-11-01 13:07:15',-8.6824,115.22695,'Bak Mandi, Kulkas, Dispenser, Tempayang/ Jun, Ember, Drum, Kaleng, Vas/ Pot, Ban Bekas','Bak Mandi, Kulkas, Dispenser, Tempayang/ Jun, Ember, Drum, Kaleng, Vas/ Pot',3,'terindikasi_jentik'),
(2,'5171013103980004','Linda','Jln. Tukad Barito','Kangin','Panjer','2019-10-01 11:14:51',-8.684732031990302,115.2295472145081,NULL,NULL,3,'bebas_jentik'),
(3,'5171013103980004','Asan','Jln. Tukad Citarum','Kangin','Panjer','2019-09-30 14:30:03',-8.682483591214293,115.23461122512822,NULL,NULL,3,'bebas_jentik'),
(4,'5171013103980004','Valen','Jln. Tukad Yeh Aya','Kangin','Panjer','2019-11-04 15:31:39',-8.677615192675361,115.22873182296757,NULL,NULL,3,'bebas_jentik'),
(5,'5171013103980003','I Putu Ningsih','Jln. Teuku Umar',NULL,NULL,'2019-10-24 15:32:39',-8.681196501637062,115.19919533729558,NULL,NULL,3,'bebas_jentik'),
(6,'5272013103980003','I Made Mengong','Jln. Teuku Umar Barat',NULL,NULL,'2019-08-15 17:35:01',-8.68114347202893,115.1909649516524,NULL,NULL,3,'bebas_jentik'),
(7,'5273014103670003','Ni Putu Lestari','Jln. Veteran',NULL,NULL,'2019-06-26 12:37:34',-8.652803094101415,115.21785141481769,NULL,NULL,3,'bebas_jentik'),
(8,'4443014103671234','Ketut Lecir','Jln. Gatot Subroto Tengah',NULL,NULL,'2019-02-19 09:38:32',-8.636298673055181,115.2145040179671,'Bak Mandi, Kulkas, Dispenser, Tempayang/ Jun, Ember, Drum, Kaleng, Vas/ Pot, Ban Bekas','Bak Mandi, Kulkas, Dispenser, Tempayang/ Jun, Ember, Drum, Kaleng, Vas/ Pot',3,'terindikasi_jentik'),
(9,'5543014101371234','Cokorda Wahyu Permana','Jln. Gunung Batukaru',NULL,NULL,'2019-01-14 18:42:31',-8.659533730151562,115.2045490264893,'Bak Mandi, Kulkas, Dispenser, Tempayang/ Jun, Ember, Drum, Kaleng, Vas/ Pot, Ban Bekas','Bak Mandi, Kulkas, Dispenser, Tempayang/ Jun, Ember, Drum, Kaleng, Vas/ Pot',3,'terindikasi_jentik'),
(10,'6543015102371254','Wayan Sontang','Jln. Pulau Galang',NULL,NULL,'2019-09-18 09:45:58',-8.69484984864711,115.18957717486342,'Bak Mandi, Kulkas, Dispenser, Tempayang/ Jun, Ember, Drum, Kaleng, Vas/ Pot, Ban Bekas','Bak Mandi, Kulkas, Dispenser, Tempayang/ Jun, Ember, Drum, Kaleng, Vas/ Pot',3,'terindikasi_jentik'),
(11,'6543015107771333','Komang Ngocong','Jln. Pulau Moyo',NULL,NULL,'2019-05-01 16:47:21',-8.700979797536743,115.21144254275282,'Bak Mandi, Kulkas, Dispenser, Tempayang/ Jun, Ember, Drum, Kaleng, Vas/ Pot, Ban Bekas','Bak Mandi, Kulkas, Dispenser, Tempayang/ Jun, Ember, Drum, Kaleng, Vas/ Pot',3,'terindikasi_jentik'),
(12,'7773015222771321','Ketut Berut','Jln. Raya Puputam',NULL,NULL,'2019-10-21 16:48:46',-8.67337692743169,115.22672040530165,'Bak Mandi, Kulkas, Dispenser, Tempayang/ Jun, Ember, Drum, Kaleng, Vas/ Pot, Ban Bekas','Bak Mandi, Kulkas, Dispenser, Tempayang/ Jun, Ember, Drum, Kaleng, Vas/ Pot',3,'terindikasi_jentik'),
(13,'6663066622771321','Anak Agung Badak','Jln. Raya Sesetan',NULL,NULL,'2019-07-24 11:50:06',-8.680834622660074,115.21470410891493,NULL,NULL,3,'bebas_jentik'),
(14,'6663066622771321','Wayan Setep','Jln. Pulau Kawe',NULL,NULL,'2019-11-05 22:51:08',-8.681428554332022,115.20663678853282,NULL,NULL,3,'bebas_jentik'),
(15,'7773015222771321','I Komang Ari','Jln. Subur',NULL,NULL,'2019-11-01 19:52:38',-8.668446690760838,115.20401895253428,NULL,NULL,3,'bebas_jentik'),
(16,'4443014103671234','Anak Agung Ngurah Cakra','Jln. Gunung Agung',NULL,NULL,'2019-10-30 11:09:11',-8.653494840608193,115.20633638112315,NULL,NULL,3,'bebas_jentik'),
(17,'5273014103670003','I Made Dedi Iswara','Jln. Maruti',NULL,NULL,'2019-03-26 19:10:17',-8.644245682382792,115.21058500020274,NULL,NULL,3,'bebas_jentik'),
(18,'4443014103671234','Prama Ade Prayipno','Jln. Bedahulu',NULL,NULL,'2019-02-14 11:12:05',-8.633762330580085,115.21644294469127,NULL,NULL,3,'bebas_jentik'),
(19,'5273014103670003','Yoseph Tara Lintin','Jln. Kemuda',NULL,NULL,'2019-09-19 23:13:35',-8.625110570604894,115.22543370930919,NULL,NULL,3,'bebas_jentik'),
(20,'6663066622771321','I Ketut Aridana','Jln. Ahmad Yani Utara',NULL,NULL,'2019-05-14 23:14:46',-8.61951812760224,115.21037042348155,'Bak Mandi, Kulkas, Dispenser, Tempayang/ Jun, Ember, Drum, Kaleng, Vas/ Pot, Ban Bekas','Bak Mandi, Kulkas, Dispenser, Tempayang/ Jun, Ember, Drum, Kaleng, Vas/ Pot',3,'terindikasi_jentik'),
(21,'5272013103980003','Ayu Sri Dewi','Jln. Jaya Giri','Dalem','Dangin Puri','2019-11-08 10:38:04',-8.62845866,115.26117589,'Bak Mandi, Kulkas, Dispenser, Tempayang/ Jun, Ember, Drum, Kaleng, Vas/ Pot, Ban Bekas','Bak Mandi, Kulkas, Dispenser, Tempayang/ Jun, Ember, Drum, Kaleng, Vas/ Pot',2,'terindikasi_jentik');

/*Table structure for table `tb_users` */

DROP TABLE IF EXISTS `tb_users`;

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `banjar` varchar(20) DEFAULT NULL,
  `desa` varchar(20) DEFAULT NULL,
  `status_blok` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `tb_users` */

insert  into `tb_users`(`id`,`username`,`password`,`name`,`type`,`banjar`,`desa`,`status_blok`) values 
(1,'admin','adminku','Administrator','admin','admin','admin',1),
(2,'leovin','leo123','Leovin','koordinator','Kangin','Panjer',0),
(3,'cokwah','cok123','Cokorda Wahyu P','jumantik','Madangan','Petak',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
