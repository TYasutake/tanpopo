-- MySQL dump 10.13  Distrib 5.7.15, for Linux (x86_64)
--
-- Host: localhost    Database: kusoanime
-- ------------------------------------------------------
-- Server version	5.7.15

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
-- Table structure for table `Question`
--

DROP TABLE IF EXISTS `Question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Question` (
  `number` int(11) DEFAULT NULL,
  `sweetID` int(11) DEFAULT NULL,
  `sweetName` varchar(16) DEFAULT NULL,
  `sweetImg` varchar(256) DEFAULT NULL,
  `sweetType` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Question`
--

LOCK TABLES `Question` WRITE;
/*!40000 ALTER TABLE `Question` DISABLE KEYS */;
INSERT INTO `Question` VALUES (0,8,'ワッフル','resource/img/sweet/sweet_8.png','sweet'),(1,8,'ワッフル','resource/img/sweet/sweet_8.png','sweet'),(2,8,'ワッフル','resource/img/sweet/sweet_8.png','sweet'),(3,8,'ワッフル','resource/img/sweet/sweet_8.png','sweet'),(4,8,'ワッフル','resource/img/sweet/sweet_8.png','sweet'),(5,8,'ワッフル','resource/img/sweet/sweet_8.png','sweet'),(6,8,'ワッフル','resource/img/sweet/sweet_8.png','sweet'),(7,8,'ワッフル','resource/img/sweet/sweet_8.png','sweet'),(8,8,'ワッフル','resource/img/sweet/sweet_8.png','sweet'),(9,8,'ワッフル','resource/img/sweet/sweet_8.png','sweet'),(10,6,'ミゼラブル','resource/img/sweet/sweet_6.png','sweet'),(11,7,'メルヴェイユ','resource/img/sweet/sweet_7.png','sweet');
/*!40000 ALTER TABLE `Question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Sweet`
--

DROP TABLE IF EXISTS `Sweet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Sweet` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `img` varchar(256) DEFAULT NULL,
  `type` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Sweet`
--

LOCK TABLES `Sweet` WRITE;
/*!40000 ALTER TABLE `Sweet` DISABLE KEYS */;
INSERT INTO `Sweet` VALUES (1,'キュベルトン','resource/img/sweet/sweet_1.png','sweet'),(2,'ジャヴァネ','resource/img/sweet/sweet_2.png','sweet'),(3,'スペキュロス','resource/img/sweet/sweet_3.png','sweet'),(4,'チョコレート','resource/img/sweet/sweet_4.png','sweet'),(5,'マジパン','resource/img/sweet/sweet_5.png','sweet'),(6,'ミゼラブル','resource/img/sweet/sweet_6.png','sweet'),(7,'メルヴェイユ','resource/img/sweet/sweet_7.png','sweet'),(8,'ワッフル','resource/img/sweet/sweet_8.png','sweet'),(9,'カルボナード','resource/img/nosweet/sweet_9.png','nosweet'),(10,'クロケット','resource/img/nosweet/sweet_10.png','nosweet');
/*!40000 ALTER TABLE `Sweet` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-13 21:38:55
