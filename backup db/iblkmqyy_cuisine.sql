-- MySQL dump 10.13  Distrib 5.7.32, for Linux (x86_64)
--
-- Host: localhost    Database: iblkmqyy_cuisine
-- ------------------------------------------------------
-- Server version	5.7.32-cll-lve

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
-- Table structure for table `assemblage`
--

DROP TABLE IF EXISTS `assemblage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assemblage` (
  `IDClient` int(11) NOT NULL,
  `reference` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assemblage`
--

LOCK TABLES `assemblage` WRITE;
/*!40000 ALTER TABLE `assemblage` DISABLE KEYS */;
INSERT INTO `assemblage` VALUES (1,'98T00101120'),(0,'00T00000000'),(0,'00T01000000'),(2,'45T22110122'),(3,'32T02010020'),(3,'32T02010020'),(0,'00T00000000'),(0,'00T00000000'),(0,'00T00000000'),(0,'00T00001000'),(0,'00T10100000'),(0,'00T10101000'),(0,'00T00000100'),(0,'00T02000100'),(0,'00T01000100'),(0,'00T01000100'),(0,'00T11000000'),(0,'00T11000000'),(0,'00T11000000'),(0,'00T11100000'),(2,'45T01100120'),(2,'45T01100120'),(2,'45T01100120'),(4,'39T00000000');
/*!40000 ALTER TABLE `assemblage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bar`
--

DROP TABLE IF EXISTS `bar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bar` (
  `IDClient` int(11) NOT NULL,
  `Largeur` float NOT NULL,
  `Hauteur` float NOT NULL,
  `Profondeur` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bar`
--

LOCK TABLES `bar` WRITE;
/*!40000 ALTER TABLE `bar` DISABLE KEYS */;
INSERT INTO `bar` VALUES (0,1,0.15,0.4),(6,1.3,0.15,0.4),(7,1,0.15,0.4),(5,1.2,0.15,0.4),(9,1,0.2,0.5);
/*!40000 ALTER TABLE `bar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `IDClient` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pseudo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motDePasse` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `longueur` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `largeur` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`IDClient`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'Belcour','Maxime','maxime','marmotte88','190000','9','8'),(2,'Raton','Laveur','racoon','marmotte88*','20000','4','5'),(3,'Nebon','Adrien','Jean-Michel','castor','10000','3','2'),(4,'BELCOUR','Maxime','admintest','test8888','8888','0','9');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `placard_bas`
--

DROP TABLE IF EXISTS `placard_bas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `placard_bas` (
  `IDClient` int(11) DEFAULT NULL,
  `modele` int(11) NOT NULL,
  `largeur` float DEFAULT NULL,
  `hauteur` float DEFAULT NULL,
  `profondeur` float DEFAULT NULL,
  `etagere` int(11) DEFAULT NULL,
  `couleur_meuble` int(11) DEFAULT NULL,
  `matiere_meuble` int(11) DEFAULT NULL,
  `couleur_plan` int(11) DEFAULT NULL,
  `matiere_plan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `placard_bas`
--

LOCK TABLES `placard_bas` WRITE;
/*!40000 ALTER TABLE `placard_bas` DISABLE KEYS */;
INSERT INTO `placard_bas` VALUES (5,1,0.6,0.8,0.4,3,NULL,NULL,NULL,NULL),(0,1,0.6,0.8,0.4,3,NULL,NULL,NULL,NULL),(5,2,0.6,0.8,0.4,2,NULL,NULL,NULL,NULL),(0,1,0.75,0.8,0.4,2,NULL,NULL,NULL,NULL),(6,1,0.7,0.8,0.4,2,NULL,NULL,NULL,NULL),(6,2,0.8,0.8,0.4,3,NULL,NULL,NULL,NULL),(7,1,0.6,0.8,0.4,2,NULL,NULL,NULL,NULL),(7,2,0.6,0.8,0.4,2,NULL,NULL,NULL,NULL),(9,1,0.6,0.8,0.4,1,NULL,NULL,NULL,NULL),(9,2,0.6,0.8,0.4,2,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `placard_bas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `placard_haut`
--

DROP TABLE IF EXISTS `placard_haut`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `placard_haut` (
  `IDClient` int(11) DEFAULT NULL,
  `modele` int(11) NOT NULL,
  `largeur` float DEFAULT NULL,
  `hauteur` float DEFAULT NULL,
  `profondeur` float DEFAULT NULL,
  `porte` int(11) DEFAULT NULL,
  `etagere` int(11) DEFAULT NULL,
  `couleur_meuble` int(11) DEFAULT NULL,
  `matiere_meuble` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `placard_haut`
--

LOCK TABLES `placard_haut` WRITE;
/*!40000 ALTER TABLE `placard_haut` DISABLE KEYS */;
INSERT INTO `placard_haut` VALUES (NULL,0,0.95,0.9,0.6,NULL,2,NULL,NULL),(NULL,0,0.95,0.9,0.6,NULL,0,NULL,NULL),(NULL,0,0.8,1,0.65,NULL,3,NULL,NULL),(NULL,0,0.95,1,0.6,NULL,2,NULL,NULL),(2,0,0.6,0.8,0.4,NULL,2,NULL,NULL),(2,0,0.6,0.8,0.4,NULL,2,NULL,NULL),(0,0,0.6,0.8,0.4,NULL,2,NULL,NULL),(3,1,0.6,0.8,0.4,NULL,2,NULL,NULL),(5,1,0.6,0.8,0.4,NULL,1,NULL,NULL),(6,1,0.8,0.8,0.4,NULL,3,NULL,NULL),(7,1,0.6,0.8,0.4,NULL,3,NULL,NULL),(9,1,0.6,0.8,0.4,NULL,2,NULL,NULL);
/*!40000 ALTER TABLE `placard_haut` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-19 18:41:44
