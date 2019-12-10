/*
SQLyog Ultimate v11.5 (64 bit)
MySQL - 5.0.51b-community-nt : Database - urlshorten_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`urlshorten_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `urlshorten_db`;

/*Table structure for table `url_shorten` */

DROP TABLE IF EXISTS `url_shorten`;

CREATE TABLE `url_shorten` (
  `id` int(11) NOT NULL auto_increment,
  `url` text NOT NULL,
  `short_code` varchar(50) NOT NULL,
  `hits` int(11) NOT NULL,
  `date_added` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `url_shorten` */

insert  into `url_shorten`(`id`,`url`,`short_code`,`hits`,`date_added`) values (1,'http://localhost/black/index.php','fb559e',0,'2019-12-09 09:58:01'),(2,'http://localhost/template/notifications.html','ab0095',0,'2019-12-09 10:10:39'),(3,'http://localhost/black/blog.php','951c32',2,'2019-12-09 10:56:22'),(4,'http://localhost/url_shortner/index.php','770dc9',0,'2019-12-09 10:17:11'),(5,'http://localhost/black/contact.php','f96045',3,'2019-12-09 18:15:38'),(6,'http://localhost/black/blog_details.php?p=learning-react-in-30-days-3','arrays',2,'2019-12-09 18:09:31'),(8,'http://localhost/black/blog_details.php?p=learning-react-in-30-days-3','f12345',2,'2019-12-09 16:43:20'),(9,'http://localhost/black/blog_details.php?p=Picture-upload-Testing-6','picture',1,'2019-12-09 16:57:22'),(10,'http://localhost/black/blog.php?page_no=4','blog45',4,'2019-12-09 18:09:17');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
