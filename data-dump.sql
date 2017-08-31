-- MySQL dump 10.13  Distrib 5.5.57, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: vk-challenge
-- ------------------------------------------------------
-- Server version	5.5.57-0ubuntu0.14.04.1

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
-- Table structure for table `comission`
--

DROP TABLE IF EXISTS `comission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comission` (
  `key` int(1) NOT NULL,
  `sum` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comission`
--

LOCK TABLES `comission` WRITE;
/*!40000 ALTER TABLE `comission` DISABLE KEYS */;
INSERT INTO `comission` VALUES (1,5);
/*!40000 ALTER TABLE `comission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `author` int(64) NOT NULL,
  `price` int(10) NOT NULL,
  `category` int(2) NOT NULL,
  `date` datetime NOT NULL,
  `till` datetime NOT NULL,
  `done` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (1,'Починить холодильник Huawei',1,30000000,4,'2017-08-23 20:22:23','2017-10-17 07:23:13',0),(2,'Сделать ничего',1,100,0,'2017-09-01 12:00:00','2018-05-31 17:33:00',1),(3,'Написать что-то',13,666,3,'2017-08-31 18:00:00','2017-09-30 09:27:08',0),(5,'Тест',1,500,3,'2017-08-31 21:42:11','2017-09-08 17:00:00',0);
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keys`
--

DROP TABLE IF EXISTS `keys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `keys` (
  `kid` int(128) NOT NULL AUTO_INCREMENT,
  `id` int(64) NOT NULL,
  `key` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `loggedat` datetime NOT NULL,
  `actual` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`kid`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keys`
--

LOCK TABLES `keys` WRITE;
/*!40000 ALTER TABLE `keys` DISABLE KEYS */;
INSERT INTO `keys` VALUES (1,1,'b0c187b02854d2a000f7a9e53b04d860','2017-08-31 00:56:37',0),(2,1,'2f0b54d3d126869a19bbc9ef093e69b9','2017-08-31 01:12:39',0),(3,1,'82a8516b21d3efc52e00728814a51e76','2017-08-31 01:13:43',0),(4,1,'97a38594dbaa1fefdd941545f059eb08','2017-08-31 01:26:27',0),(5,1,'4ccb2e4398da5bf5bad9b8e4d7d4296f','2017-08-31 01:27:11',0),(6,1,'8211146cc134952b5f97fa05aaeb0906','2017-08-31 01:27:54',0),(7,1,'c6b7bc29c7b916038fa69eab4f5b35cf','2017-08-31 01:29:17',0),(8,1,'7f87b1ad8ae3ffc99611b2d7cecc9c44','2017-08-31 01:30:05',0),(9,1,'7fe21e6a9e953ed8ef83f54a3965de4e','2017-08-31 15:09:45',0),(10,1,'9bc25d216b6558e54fea2a7a48cdde1c','2017-08-31 15:12:09',0),(11,1,'4a48310c92f9e4f2190c6c5d63579965','2017-08-31 15:12:14',0),(12,1,'48d7bea5c7db345b9eabf7b7cc62db5b','2017-08-31 16:47:01',0),(13,1,'530ecd351afc77d57e1d0c6c4cdb665f','2017-08-31 16:48:50',0),(14,1,'cd40fa8aaf2b364ccd099c22a90f29e3','2017-08-31 16:50:05',0),(15,1,'7306c5e6cef09fcf27049fd7216a98d7','2017-08-31 17:00:35',0),(16,1,'1992127f0ef18b9863bc08da60f1899e','2017-08-31 17:11:57',0),(17,1,'dc3e95f2d1c5fc378b1bc12bd0aaa20a','2017-08-31 17:14:48',0),(18,1,'40250265550700972af74e12565e618e','2017-08-31 17:30:51',0),(19,1,'a73056a850408cc60100e7ef9254422a','2017-08-31 17:33:39',0),(20,1,'245bc3ae8a9a8d39152b17aa59380461','2017-08-31 17:34:01',0),(21,1,'9f8230e4c46e0c25817cd5c631485a4f','2017-08-31 17:34:53',0),(22,1,'72055e555544dfa8f2fdda2bfaddf262','2017-08-31 17:35:28',0),(23,1,'7d4e5e5e3ae463fee2362fa3c1e9d0c4','2017-08-31 17:37:14',0),(24,1,'bfa6428ec4f640d368550ca3672483fd','2017-08-31 18:05:51',0),(25,1,'1fc3dd9ac7d4e48086ccda18b2643ca2','2017-08-31 18:06:12',0),(26,1,'585af649270d452ea63b6c0f588ff25b','2017-08-31 18:10:14',0),(27,1,'1dc6cc7286b84c21cba3f544835153d3','2017-08-31 18:12:20',0),(28,1,'6a176915a99a2920b734d31c75697895','2017-08-31 18:13:28',0),(29,1,'bf7e4b17a1e2f4be9afec37d248704b6','2017-08-31 18:13:44',0),(30,1,'c859ddaf74bd46180d03a6588ed38151','2017-08-31 18:14:40',0),(31,1,'10910fa3c6283e6f64e88ad265f49fc3','2017-08-31 18:15:29',0),(32,1,'70d5ba4bfb96ba0dbc4d9507231c5ab3','2017-08-31 18:43:36',0),(33,1,'46c6b1924a4301266c1ec83439a18a69','2017-08-31 19:47:39',0),(34,1,'56ab78a4922888807eee1bd14e7f4db1','2017-08-31 19:48:37',0),(35,1,'6d866f2ef4dd17561f607d3eaa59755c','2017-08-31 19:48:31',0),(36,1,'c1cad1c2e2a7b1eb2d413c38408992db','2017-08-31 19:49:33',0),(37,1,'3c24ede5c5d79c0ba823a198a0d9bfec','2017-08-31 19:49:43',0),(38,1,'503f38b75c8b7cb19b4274d40fee152e','2017-08-31 20:02:26',0),(39,1,'1e1beede3fcb7f0734551d2075adeb57','2017-08-31 20:04:18',0),(40,1,'3a2bc23f0dc496869ac1402ee0d6a19f','2017-08-31 20:06:08',0),(41,1,'644e9a0c1cb89ac58efdf6111b20347f','2017-08-31 20:29:17',0),(42,1,'84fa9134c72733919d6305459feed125','2017-08-31 20:39:45',0),(43,1,'3ce05c626210dfb87ecaf7df96257815','2017-08-31 20:40:15',0),(44,1,'3c9d7e53e18cca62eef1080c4a6bb0a1','2017-08-31 20:40:57',0),(45,1,'ae5a8d58bbf5ec855de864b61fc138e0','2017-08-31 20:41:40',0),(46,1,'ed9cc33181b6e33a81198dcf832bab51','2017-08-31 20:42:09',0),(47,1,'f3b5ddca9aa0ca2f7f19e10d3d51b93e','2017-08-31 20:47:14',0),(48,1,'6ec9e831b66cf9757a20c11f5641f50d','2017-08-31 20:52:22',0),(49,1,'3c0616f5db8b13cfadfc6de4593a2e31','2017-08-31 21:30:02',0),(50,1,'fcd41df0e2a27aa7bc9cf5da15c9ca74','2017-08-31 21:32:08',0),(51,1,'53713af71670dd31558f66d1fc133803','2017-08-31 21:35:30',0),(52,1,'52c16dbc7918038b2a02629a768cd8ce','2017-08-31 21:37:17',0),(53,1,'bb0d07eb8307bed7db0b01774b37ebd0','2017-08-31 21:49:37',0),(54,1,'943ac7c0a685b9478e9e7a2ea2ffd9f6','2017-08-31 22:04:22',0),(55,1,'e7b41b8f406b29192c278417612586dd','2017-08-31 22:35:41',0),(56,1,'5e29b317e7620ada8f0fde31f513d389','2017-08-31 22:40:33',0),(57,1,'dfec6ec8fa503e1a4a3b936fc72d3765','2017-08-31 22:52:33',0),(58,1,'87bfc79261c15ca1e879152c44ebca8a','2017-08-31 22:58:30',0),(59,1,'159cbcff139f9a3d7deb859e82d64b6e','2017-08-31 22:59:23',1);
/*!40000 ALTER TABLE `keys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `category` text COLLATE utf8_unicode_ci NOT NULL,
  `balance` float NOT NULL,
  `likes` int(16) NOT NULL,
  `datereg` datetime NOT NULL,
  `vk` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `group` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Stanisgrox','$2y$10$MeomRZyyWQEUu5vCwazh7O2u4DXem6VQByc1u4Mf0D3jB1FpCPX6u','Станислав','Колпаков','stanisgrox@yandex.ru','1000pl0pl',1996,0,'2017-08-29 22:32:07','113294239','usr'),(12,'Hello','$2y$10$XDxcswdiFzLdQshar3aUl.3mP5OWfWJZuhAknXvUqswJZFxsiKPR6','PH','PHOVICH','hello@mail.ru','1000pl',0,0,'2017-08-30 02:05:19','','usr'),(13,'Meme','$2y$10$9sZm1E6qy7YJqzfElwmI2u4wtswmNVPgZ30zKLVOlAiPIYOtLYkPq','Meme','Master','meme@network.nit','1pl2pl3pl',0,0,'2017-08-31 20:15:06','','usr');
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

-- Dump completed on 2017-08-31 20:20:37
