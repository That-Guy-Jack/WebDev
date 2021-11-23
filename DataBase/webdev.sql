-- MySQL dump 10.19  Distrib 10.3.31-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: webdev_db
-- ------------------------------------------------------
-- Server version	10.3.31-MariaDB-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(45) DEFAULT NULL,
  `send_email` varchar(45) DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (4,'jack@thatguyjack.co.uk','0'),(5,'Brierleyjack@gmail.com','0'),(6,'20brierleyjack@asfc.ac.uk','0'),(7,'20SINGHAndi@asfc.ac.uk','0'),(8,'no@thatguyjack.co.uk','0');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `p_title` varchar(45) DEFAULT NULL,
  `p_content` longtext DEFAULT 'Waiting For edit',
  `p_datetime` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Jack','$2y$10$KSQjJ3nA4KAw5REBLD5cBeqZ5Bb4asbeNzTXfxAe4qhfMit9LduFG','2021-11-15 16:32:05','  Jack (CEO)  ','Owner of hotbeans.net\r\n<div class=\"video\"> <video src=\"https://cdn.thatguyjack.co.uk/Pibi1/zujukEqa32.mp4/raw\" preload=\"auto\" controls autoplay muted loop></video></div>','2021-11-23'),(9,'no','$2y$10$G83IKjXOlfqLXBVcIOXIAOegisXauDlNR2v/OP.5SSVr/1LZJRgw.','2021-11-16 13:46:51',' no ','howdy doodily.  ','2021-11-16'),(10,'dan','$2y$10$EFOiU.Mgc/ZPkSBCZNQSU.a7fwnBz1nzhfmZFIlgeTBUeOnNqYiqu','2021-11-17 15:05:59',' dan ','Dans portfoio','2021-11-17'),(11,'UrMom','$2y$10$t9/YytE3tWFIJhGksHq9xOb4nsHUaKSEOPOIdgAnemheJb1.EJjx2','2021-11-17 15:13:24','     Andi     ','Hi Jack :P\r\n<a href=\"https://andiissuper.cool\" >andiissuper.cool</a>\r\n','2021-11-23'),(12,'Stu','$2y$10$hhY046/J0aw1LDZB8qhKU.kNA/SNxIx39vhoepcuGvG7XiE9rsztm','2021-11-18 19:55:52',' Stu ','I do coding, sometimes. \r\nMostly I manage a team of coders to deliver high quality increments to solutions.','2021-11-18');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-23  9:51:46
