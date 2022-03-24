-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: steden
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB

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
-- Table structure for table `aanspreking`
--

DROP TABLE IF EXISTS `aanspreking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aanspreking` (
  `aan_id` int(11) NOT NULL AUTO_INCREMENT,
  `aan_aanspreking` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`aan_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aanspreking`
--

LOCK TABLES `aanspreking` WRITE;
/*!40000 ALTER TABLE `aanspreking` DISABLE KEYS */;
INSERT INTO `aanspreking` VALUES (1,'Mevrouw'),(2,'Mijnheer'),(3,'Juffrouw'),(4,'Jongeheer');
/*!40000 ALTER TABLE `aanspreking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `art`
--

DROP TABLE IF EXISTS `art`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `art` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_name` varchar(255) NOT NULL,
  `art_artist` varchar(255) DEFAULT NULL,
  `art_mus_id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `art_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`art_id`),
  KEY `art_mus_id` (`art_mus_id`),
  CONSTRAINT `art_ibfk_1` FOREIGN KEY (`art_mus_id`) REFERENCES `musea` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `art`
--

LOCK TABLES `art` WRITE;
/*!40000 ALTER TABLE `art` DISABLE KEYS */;
INSERT INTO `art` VALUES (1,'Le Rétablissement du culte ','Callet, Antoine François',3,'painting','retablissement.jpg'),(2,'Napoléon Bonaparte à Brienne','Rochet, Louis',3,'sculpture','napoleon.jpg'),(3,'The Bones of Mankind','Hans Lützelburger',1,'painting','bonesofmankind.jpg'),(4,'Hercules and Achelous','Unknown',1,'sculpture','herculesandachelous.jpg'),(5,'Head of Nefertiti','Unknown',2,'sculpture','nefertiti.jpg'),(6,'Achilles dressing the wounds of Patroclus','Potter Sosias',2,'painting','achilles.jpg');
/*!40000 ALTER TABLE `art` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hond`
--

DROP TABLE IF EXISTS `hond`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hond` (
  `hon_id` int(11) NOT NULL AUTO_INCREMENT,
  `hon_merk` varchar(255) DEFAULT NULL,
  `hon_naam` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`hon_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hond`
--

LOCK TABLES `hond` WRITE;
/*!40000 ALTER TABLE `hond` DISABLE KEYS */;
INSERT INTO `hond` VALUES (1,'Duitse Scheper','Max'),(4,'Poedel','Pekkie'),(6,'Labrador','Myra'),(7,'Labrador','Myra'),(8,'Labrador','Myra'),(12,'yorkshire','Alexander'),(13,'jack russel','Pekkie'),(14,'Poedel',NULL),(39,'',NULL),(40,'','steven'),(41,'',''),(42,'','&#039; &quot; &#039; &#039; ( ! &egrave; &eacute; &agrave;'),(43,'','&#039; &quot; &#039; &#039; ( ! &egrave; &eacute; &agrave;');
/*!40000 ALTER TABLE `hond` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_filename` varchar(20) DEFAULT NULL,
  `img_title` varchar(255) DEFAULT NULL,
  `img_width` int(11) DEFAULT NULL,
  `img_height` int(11) DEFAULT NULL,
  `img_lan_id` int(11) DEFAULT NULL,
  `img_date` date DEFAULT NULL,
  PRIMARY KEY (`img_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (1,'london.jpg','Big Ben! 789',789,1200,1,NULL),(2,'paris.jpg','De bekende Eiffeltoren',77711111,33,3,NULL),(3,'berlin.jpg','De Muur789',3988,1207,4,NULL);
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `land`
--

DROP TABLE IF EXISTS `land`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `land` (
  `lan_id` int(11) NOT NULL AUTO_INCREMENT,
  `lan_land` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`lan_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `land`
--

LOCK TABLES `land` WRITE;
/*!40000 ALTER TABLE `land` DISABLE KEYS */;
INSERT INTO `land` VALUES (1,'België'),(2,'Nederland'),(3,'Frankrijk'),(4,'Duitsland'),(5,'Spanje'),(6,'Engeland');
/*!40000 ALTER TABLE `land` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_text` text DEFAULT NULL,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (1,'Pompom'),(2,'Blabla'),(5,'2021-12-02 14:55:52 -> Er doet iemand een request!\n'),(6,'2021-12-02 14:56:21 -> Er doet iemand een request!\n');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `musea`
--

DROP TABLE IF EXISTS `musea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `musea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mus_name` varchar(255) NOT NULL,
  `mus_lan_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mus_lan_id` (`mus_lan_id`),
  CONSTRAINT `musea_ibfk_1` FOREIGN KEY (`mus_lan_id`) REFERENCES `land` (`lan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `musea`
--

LOCK TABLES `musea` WRITE;
/*!40000 ALTER TABLE `musea` DISABLE KEYS */;
INSERT INTO `musea` VALUES (1,'British Museum',6),(2,'Altes Museum (Old Museum)',4),(3,'Louvre',3);
/*!40000 ALTER TABLE `musea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taak`
--

DROP TABLE IF EXISTS `taak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `taak` (
  `taa_id` int(11) NOT NULL AUTO_INCREMENT,
  `taa_datum` date DEFAULT NULL,
  `taa_start` time DEFAULT NULL,
  `taa_end` time DEFAULT NULL,
  `taa_omschr` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`taa_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taak`
--

LOCK TABLES `taak` WRITE;
/*!40000 ALTER TABLE `taak` DISABLE KEYS */;
INSERT INTO `taak` VALUES (1,'2022-01-13','10:00:00','12:30:00','Barbecue'),(2,'2022-01-14','14:00:00','16:00:00','Meeting Antwerpen'),(3,'2022-01-25','17:00:00','18:00:00','Meeting Gent'),(4,'2022-01-25','09:00:00','12:00:00','Administratie'),(5,'2022-01-31','15:00:00','16:30:00','Gras maaien en zo'),(6,'2022-02-02','09:30:00','12:00:00','Meeting Tienen'),(7,'2022-01-20','11:00:00','15:00:00','Les PHP '),(8,'2022-01-20','15:00:00','17:30:00','Oefeningen maken'),(9,'2022-01-21','12:00:00','19:30:00','Les Javascript'),(11,'2022-02-15','10:00:00','12:00:00','Oefeningen PHP maken'),(16,'2022-02-05','14:00:00','16:00:00','OOP oefeningen maken'),(17,'2022-02-18','10:00:00','12:00:00','kjhkjh kjh kjjh kjh kjh'),(18,'2022-02-01','00:00:00','12:00:00','test tim 123');
/*!40000 ALTER TABLE `taak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_voornaam` varchar(255) DEFAULT NULL,
  `usr_naam` varchar(255) DEFAULT NULL,
  `usr_email` varchar(512) DEFAULT NULL,
  `usr_password` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`usr_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Wolfgang Amadeus','Mozart','steven@inform.be','$2y$10$7Mq..HeNITil4bSlobWueOzMRyPDJXExPivXVT0vnqITwQ6JMgx2G'),(2,'Steven','Van Gucht','stevenvg@inform.be','$2y$10$/40gVmTFAfUW6iLZoEn1M.tKGGqC.JqmCqUUcPziNxcLkjhlPtYqe'),(3,'Marc','Van Ranst','marc@inform.be','$2y$10$3zsumriBXwNBaJa4ZT1WsOUNBIvtZGxKZu91qS6EL91la4ggmr7GG'),(4,'Johan Sebastiaan','Bach','johan@bach.be','$2y$10$Z3ET9hc35Sz/EdhILNLdvOw2fLVnRk5Iy3ABuLsGBnV0vP5WO9Eb6'),(5,'Thomas','Peeters','test@test.be','$2y$10$Emb8P0X4U.xwV8PodaoCYOD1053dPTU2OwdyzLwkbL9F8e83zwMnK'),(6,'man','man','man@man.be','$2y$10$dRhn3mXL1jWV1HhFCO6Cj..4Ee6tCrBAgHnkhl7H4jt2mnenl699K'),(7,'test','test','nee@ja.be','$2y$10$L5/xggIMX2ROzj.Mf0EIV.5pnjRlFEtXz85pl.NQqFb9zHYzVW3qG'),(8,'vrouw','vrouw','vrouw@vrouw.be','$2y$10$QCpcHd.05OfQKkJldgwct.VbdeQqPAkvRCpm41SiJu9eOmrkd7Khq');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-19 10:13:53
