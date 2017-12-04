/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.26-MariaDB : Database - db_functionpoint
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_functionpoint` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_functionpoint`;

/*Table structure for table `t_descproject` */

DROP TABLE IF EXISTS `t_descproject`;

CREATE TABLE `t_descproject` (
  `idProject` varchar(8) NOT NULL,
  `judulProject` varchar(50) NOT NULL,
  `pemilikProject` varchar(50) NOT NULL,
  `descProject` text NOT NULL,
  `platformProject` varchar(20) NOT NULL,
  `functionPoint` float NOT NULL DEFAULT '0',
  `tanggalMulaiProject` date NOT NULL,
  `tanggalSelesaiProject` date NOT NULL,
  `manajerProject` varchar(25) NOT NULL,
  `timProject` text NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idProject`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `t_evm` */

DROP TABLE IF EXISTS `t_evm`;

CREATE TABLE `t_evm` (
  `idEvm` int(11) NOT NULL AUTO_INCREMENT,
  `idProject` varchar(8) NOT NULL,
  `ev` float NOT NULL,
  `pv` float NOT NULL,
  `ac` float NOT NULL,
  `bac` float NOT NULL,
  `sv` float NOT NULL,
  `cv` float NOT NULL,
  `spi` float NOT NULL,
  `cpi` float NOT NULL,
  `eac` float NOT NULL,
  `etc` float DEFAULT NULL,
  `tcpi` float DEFAULT NULL,
  `tcpi2` float DEFAULT NULL,
  `week` int(11) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idEvm`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Table structure for table `t_jadwalproject` */

DROP TABLE IF EXISTS `t_jadwalproject`;

CREATE TABLE `t_jadwalproject` (
  `idJadwalProject` int(11) NOT NULL AUTO_INCREMENT,
  `idProject` varchar(8) DEFAULT NULL,
  `namaKegiatan` varchar(50) DEFAULT NULL,
  `tanggalMulai` date DEFAULT NULL,
  `tanggalSelesai` date DEFAULT NULL,
  `status` enum('done','onProgress') DEFAULT NULL,
  PRIMARY KEY (`idJadwalProject`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Table structure for table `t_karakteristik` */

DROP TABLE IF EXISTS `t_karakteristik`;

CREATE TABLE `t_karakteristik` (
  `idKarakteristik` int(11) NOT NULL AUTO_INCREMENT,
  `idProject` varchar(8) NOT NULL,
  `Q1` int(11) NOT NULL,
  `Q2` int(11) NOT NULL,
  `Q3` int(11) NOT NULL,
  `Q4` int(11) NOT NULL,
  `Q5` int(11) NOT NULL,
  `Q6` int(11) NOT NULL,
  `Q7` int(11) NOT NULL,
  `Q8` int(11) NOT NULL,
  `Q9` int(11) NOT NULL,
  `Q10` int(11) NOT NULL,
  `Q11` int(11) NOT NULL,
  `Q12` int(11) NOT NULL,
  `Q13` int(11) NOT NULL,
  `Q14` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idKarakteristik`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Table structure for table `t_levelkompleksitas` */

DROP TABLE IF EXISTS `t_levelkompleksitas`;

CREATE TABLE `t_levelkompleksitas` (
  `idLevelKompleksitas` int(11) NOT NULL AUTO_INCREMENT,
  `idProject` varchar(8) NOT NULL,
  `simpleInput` int(11) NOT NULL,
  `simpleOutput` int(11) NOT NULL,
  `simpleQuery` int(11) NOT NULL,
  `simpleFile` int(11) NOT NULL,
  `simpleInterface` int(11) NOT NULL,
  `mediumInput` int(11) NOT NULL,
  `mediumOutput` int(11) NOT NULL,
  `mediumQuery` int(11) NOT NULL,
  `mediumFile` int(11) NOT NULL,
  `mediumInterface` int(11) NOT NULL,
  `kompleksInput` int(11) NOT NULL,
  `kompleksOutput` int(11) NOT NULL,
  `kompleksQuery` int(11) NOT NULL,
  `kompleksFile` int(11) NOT NULL,
  `kompleksInterface` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idLevelKompleksitas`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Table structure for table `t_user` */

DROP TABLE IF EXISTS `t_user`;

CREATE TABLE `t_user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `namaUser` varchar(30) NOT NULL,
  `tipeUser` enum('ADMIN','USER','MANAJERIAL') NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
