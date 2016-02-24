-- MySQL dump 10.15  Distrib 10.0.23-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: kbhwh
-- ------------------------------------------------------
-- Server version	10.0.23-MariaDB-0ubuntu0.15.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `kb_article`
--

DROP TABLE IF EXISTS `kb_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kb_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `permalink` text NOT NULL,
  `category` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `featuredimage` varchar(50) NOT NULL,
  `views` int(11) NOT NULL,
  `dateadd` datetime NOT NULL,
  `datemodified` datetime NOT NULL,
  `published` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kb_article`
--

LOCK TABLES `kb_article` WRITE;
/*!40000 ALTER TABLE `kb_article` DISABLE KEYS */;
INSERT INTO `kb_article` VALUES (1,'Install and Running Python Django on cPanel HelloWorldHost Hosting','install-and-running-python-django-on-cpanel-helloworldhost-hosting',1,'<p>Design, build, test, and prototype using Bootstrap in real-time from your Web browser. Bootply combines the power of hand-coded HTML, CSS and JavaScript with the benefits of responsive design using Bootstrap. Find and showcase Bootstrap-ready snippets in the 100% free Bootply.com code repository.</p>\r\n\r\n<p>Design, build, test, and prototype using Bootstrap in real-time from your Web browser. Bootply combines the power of hand-coded HTML, CSS and JavaScript with the benefits of responsive design using Bootstrap. Find and showcase Bootstrap-ready snippets in the 100% free Bootply.com code repository.</p>\r\n\r\n<div style=\"background:#eee; border:1px solid #ccc; padding:5px 10px\">Design, build, test, and prototype using Bootstrap in real-time from your Web browser. Bootply combines the power of hand-coded HTML, CSS and JavaScript with the benefits of responsive design using Bootstrap. Find and showcase Bootstrap-ready snippets in the 100% free Bootply.com code repository.</div>\r\n','16960-code-1920x1200-computer-wallpaper.jpg',0,'2015-09-19 16:21:32','2015-09-19 20:21:26',1);
/*!40000 ALTER TABLE `kb_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kb_category`
--

DROP TABLE IF EXISTS `kb_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kb_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `permalink` varchar(225) NOT NULL,
  `dateadd` datetime NOT NULL,
  `datemodified` datetime DEFAULT NULL,
  `published` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kb_category`
--

LOCK TABLES `kb_category` WRITE;
/*!40000 ALTER TABLE `kb_category` DISABLE KEYS */;
INSERT INTO `kb_category` VALUES (1,'Python Django Framework','Articles about how to hosting Python Django on cPanel','python-django-framework','2015-09-19 16:24:34','2015-09-19 16:40:01',1),(2,'Python Flask Framework','Articles about how to hosting Python Flask Framework on cPanel','python-flask-framework','2015-09-19 19:45:39',NULL,1),(3,'Python CherryPy','Articles about how to hosting Python CherryPy Framework on cPanel','python-cherrypy','2015-09-19 19:46:19',NULL,1);
/*!40000 ALTER TABLE `kb_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kb_log`
--

DROP TABLE IF EXISTS `kb_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kb_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ipaddress` varchar(16) NOT NULL,
  `referenceUrl` text NOT NULL,
  `description` text NOT NULL,
  `datevisit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kb_log`
--

LOCK TABLES `kb_log` WRITE;
/*!40000 ALTER TABLE `kb_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `kb_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kb_media`
--

DROP TABLE IF EXISTS `kb_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kb_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `fulllink` text NOT NULL,
  `dateadd` datetime NOT NULL,
  `datemodified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kb_media`
--

LOCK TABLES `kb_media` WRITE;
/*!40000 ALTER TABLE `kb_media` DISABLE KEYS */;
INSERT INTO `kb_media` VALUES (1,'16960-code-1920x1200-computer-wallpaper.jpg','http://kb.helloworldhost.com/assets/uploads/16960-code-1920x1200-computer-wallpaper.jpg','2015-09-19 18:47:36','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `kb_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kb_setting`
--

DROP TABLE IF EXISTS `kb_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kb_setting` (
  `id` int(11) NOT NULL,
  `keyname` text NOT NULL,
  `keyvalue` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kb_setting`
--

LOCK TABLES `kb_setting` WRITE;
/*!40000 ALTER TABLE `kb_setting` DISABLE KEYS */;
/*!40000 ALTER TABLE `kb_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kb_users`
--

DROP TABLE IF EXISTS `kb_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dateregister` datetime NOT NULL,
  `keyhash` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kb_users`
--

LOCK TABLES `kb_users` WRITE;
/*!40000 ALTER TABLE `kb_users` DISABLE KEYS */;
INSERT INTO `kb_users` VALUES (1,'Hafizh','Fajri','juniorriau','juniorriau18@gmail.com','231ce68c5c8b61dfee8e3197f766f8a7701db2b7','2015-09-19 15:08:05','');
/*!40000 ALTER TABLE `kb_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-24 15:55:33
