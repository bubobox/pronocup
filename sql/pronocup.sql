CREATE DATABASE  IF NOT EXISTS `pronocup` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `pronocup`;
-- MySQL dump 10.13  Distrib 5.5.32, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: pronocup
-- ------------------------------------------------------
-- Server version	5.5.32-0ubuntu0.13.04.1

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
-- Table structure for table `phases`
--

DROP TABLE IF EXISTS `phases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `code` int(11) NOT NULL,
  `competition` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phases`
--

LOCK TABLES `phases` WRITE;
/*!40000 ALTER TABLE `phases` DISABLE KEYS */;
INSERT INTO `phases` VALUES (1,'Group A',16,'2014 FIFA World Cup Brazil'),(2,'Group B',16,'2014 FIFA World Cup Brazil'),(3,'Group C',16,'2014 FIFA World Cup Brazil'),(4,'Group D',16,'2014 FIFA World Cup Brazil'),(5,'Group E',16,'2014 FIFA World Cup Brazil'),(6,'Group E',16,'2014 FIFA World Cup Brazil'),(7,'Group G',16,'2014 FIFA World Cup Brazil'),(8,'Group H',16,'2014 FIFA World Cup Brazil');
/*!40000 ALTER TABLE `phases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `is_superuser` tinyint(1) NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL,
  `club_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fbid` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `fbid_UNIQUE` (`fbid`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `user2club` (`club_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clubs`
--

DROP TABLE IF EXISTS `clubs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clubs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clubs`
--

LOCK TABLES `clubs` WRITE;
/*!40000 ALTER TABLE `clubs` DISABLE KEYS */;
/*!40000 ALTER TABLE `clubs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scores`
--

DROP TABLE IF EXISTS `scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prediction_id` int(11) NOT NULL,
  `result` int(11) NOT NULL DEFAULT '0',
  `score_calculation` varchar(100) NOT NULL DEFAULT 'Default',
  PRIMARY KEY (`id`),
  KEY `score2prediction` (`prediction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scores`
--

LOCK TABLES `scores` WRITE;
/*!40000 ALTER TABLE `scores` DISABLE KEYS */;
/*!40000 ALTER TABLE `scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matches`
--

DROP TABLE IF EXISTS `matches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phase_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `team1` varchar(100) NOT NULL,
  `team2` varchar(100) NOT NULL,
  `score1` int(11) NOT NULL DEFAULT '0',
  `score2` int(11) NOT NULL DEFAULT '0',
  `is_finished` tinyint(1) NOT NULL DEFAULT '0',
  `is_processed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `match2group` (`phase_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matches`
--

LOCK TABLES `matches` WRITE;
/*!40000 ALTER TABLE `matches` DISABLE KEYS */;
INSERT INTO `matches` VALUES (1,1,'2014-06-12 17:00:00','Belgium','The Netherlands',0,0,0,0),(2,1,'2014-06-12 13:00:00','Belgium','The Netherlands',0,0,0,0),(3,1,'2014-06-17 16:00:00','Belgium','The Netherlands',0,0,0,0),(4,1,'2014-06-18 17:00:00','Belgium','The Netherlands',0,0,0,0),(5,1,'2014-06-13 17:00:00','Belgium','The Netherlands',0,0,0,0),(6,1,'2014-06-23 17:00:00','Belgium','The Netherlands',0,0,0,0),(7,2,'2014-06-13 16:00:00','Belgium','The Netherlands',0,0,0,0),(8,2,'2014-06-13 18:00:00','Belgium','The Netherlands',0,0,0,0),(9,2,'2014-06-18 19:00:00','Belgium','The Netherlands',0,0,0,0),(10,2,'2014-06-18 13:00:00','Belgium','The Netherlands',0,0,0,0),(11,2,'2014-06-23 13:00:00','Belgium','The Netherlands',0,0,0,0),(12,2,'2014-06-23 13:00:00','Belgium','The Netherlands',0,0,0,0),(13,3,'2014-06-14 13:00:00','Belgium','The Netherlands',0,0,0,0),(14,3,'2014-06-14 19:00:00','Brussel','The Netherlands',0,0,0,0),(15,3,'2014-06-19 13:00:00','Belgium','The Netherlands',0,0,0,0),(16,3,'2014-06-19 19:00:00','Belgium','The Netherlands',0,0,0,0),(17,3,'2014-06-24 16:00:00','Belgium','The Netherlands',0,0,0,0),(18,3,'2014-06-24 17:00:00','Belgium','The Netherlands',0,0,0,0),(19,4,'2014-06-14 16:00:00','Brussel','The Netherlands',0,0,0,0),(20,4,'2014-06-14 21:00:00','Belgium','The Netherlands',0,0,0,0),(21,4,'2014-06-19 16:00:00','Belgium','The Netherlands',0,0,0,0),(22,4,'2014-06-20 13:00:00','Brussels','The Netherlands',0,0,0,0),(23,4,'2014-06-24 13:00:00','Belgium','The Netherlands',0,0,0,0),(24,4,'2014-06-24 13:00:00','Belgium','The Netherlands',0,0,0,0),(25,5,'2014-06-15 19:00:00','Belgium','The Netherlands',0,0,0,0),(26,5,'2014-06-15 16:00:00','Belgium','The Netherlands',0,0,0,0),(27,5,'2014-06-20 16:00:00','Belgium','The Netherlands',0,0,0,0),(28,5,'2014-06-20 19:00:00','Belgium','The Netherlands',0,0,0,0),(29,5,'2014-06-25 16:00:00','Belgium','The Netherlands',0,0,0,0),(30,5,'2014-06-25 17:00:00','Belgium','The Netherlands',0,0,0,0),(31,6,'2014-06-15 19:00:00','Belgium','The Netherlands',0,0,0,0),(32,6,'2014-06-16 16:00:00','Belgium','The Netherlands',0,0,0,0),(33,6,'2014-06-21 13:00:00','Belgium','The Netherlands',0,0,0,0),(34,6,'2014-06-21 18:00:00','Belgium','The Netherlands',0,0,0,0),(35,6,'2014-06-25 13:00:00','Belgium','The Netherlands',0,0,0,0),(36,6,'2014-06-25 13:00:00','Belgium','The Netherlands',0,0,0,0),(37,7,'2014-06-16 13:00:00','Belgium','The Netherlands',0,0,0,0),(38,7,'2014-06-16 19:00:00','Belgium','The Netherlands',0,0,0,0),(39,7,'2014-06-21 16:00:00','Belgium','The Netherlands',0,0,0,0),(40,7,'2014-06-22 17:00:00','Belgium','The Netherlands',0,0,0,0),(41,7,'2014-06-26 13:00:00','Belgium','The Netherlands',0,0,0,0),(42,7,'2014-06-26 13:00:00','Belgium','The Netherlands',0,0,0,0),(43,8,'2014-06-17 13:00:00','Belgium','The Netherlands',0,0,0,0),(44,8,'2014-06-17 19:00:00','Belgium','The Netherlands',0,0,0,0),(45,8,'2014-06-22 19:00:00','Belgium','The Netherlands',0,0,0,0),(46,8,'2014-06-22 13:00:00','Belgium','The Netherlands',0,0,0,0),(47,8,'2014-06-26 17:00:00','Belgium','The Netherlands',0,0,0,0),(48,8,'2014-06-16 17:00:00','Belgium','The Netherlands',0,0,0,0);
/*!40000 ALTER TABLE `matches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rankings`
--

DROP TABLE IF EXISTS `rankings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rankings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `ranking2user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rankings`
--

LOCK TABLES `rankings` WRITE;
/*!40000 ALTER TABLE `rankings` DISABLE KEYS */;
/*!40000 ALTER TABLE `rankings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `predictions`
--

DROP TABLE IF EXISTS `predictions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `predictions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `match_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score1` int(11) NOT NULL DEFAULT '0',
  `score2` int(11) NOT NULL DEFAULT '0',
  `is_processed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `prediction2match` (`match_id`),
  KEY `prediction2user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `predictions`
--

LOCK TABLES `predictions` WRITE;
/*!40000 ALTER TABLE `predictions` DISABLE KEYS */;
/*!40000 ALTER TABLE `predictions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-29 12:52:47
