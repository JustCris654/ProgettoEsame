-- MariaDB dump 10.19  Distrib 10.4.18-MariaDB, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: db_catena_negozi_2
-- ------------------------------------------------------
-- Server version	10.4.18-MariaDB

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
-- Table structure for table `Articolo`
--

DROP TABLE IF EXISTS `Articolo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Articolo` (
  `nome` varchar(255) NOT NULL,
  `prezzo` double DEFAULT NULL,
  `nome_marca` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `descrizione` text DEFAULT NULL,
  `immagine` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`nome`),
  KEY `Articolo_search` (`nome`),
  KEY `Articolo_nome_marca_index` (`nome_marca`),
  KEY `Articolo_descrizione_index` (`descrizione`(768)),
  FULLTEXT KEY `nome` (`nome`,`nome_marca`,`descrizione`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Articolo`
--

LOCK TABLES `Articolo` WRITE;
/*!40000 ALTER TABLE `Articolo` DISABLE KEYS */;
INSERT INTO `Articolo` VALUES ('RTX 2070',400,'NVIDIA','Schede Video','potenza massima','https://images-na.ssl-images-amazon.com/images/I/51F79GDGXGL._AC_SL1000_.jpg'),('RTX 3080',600,'NVIDIA','Schede Video','cacca','https://www.hwonline.it/231489-large_default/msi-geforce-rtx-3080-gaming-x-tr-trio-10g-nvidia-v389-005r.jpg');
/*!40000 ALTER TABLE `Articolo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Categoria`
--

DROP TABLE IF EXISTS `Categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Categoria` (
  `nome` varchar(255) NOT NULL,
  `descrizione` text DEFAULT NULL,
  PRIMARY KEY (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Categoria`
--

LOCK TABLES `Categoria` WRITE;
/*!40000 ALTER TABLE `Categoria` DISABLE KEYS */;
INSERT INTO `Categoria` VALUES ('Schede Video','Schede Video da gaming');
/*!40000 ALTER TABLE `Categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Citta`
--

DROP TABLE IF EXISTS `Citta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Citta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `provincia` varchar(255) DEFAULT NULL,
  `regione` varchar(255) DEFAULT NULL,
  `stato` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Citta`
--

LOCK TABLES `Citta` WRITE;
/*!40000 ALTER TABLE `Citta` DISABLE KEYS */;
/*!40000 ALTER TABLE `Citta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Dipendente`
--

DROP TABLE IF EXISTS `Dipendente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Dipendente` (
  `codice_fiscale` varchar(16) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `indirizzo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `manager` varchar(16) DEFAULT NULL,
  `id_negozio` int(11) DEFAULT NULL,
  `id_ruolo` int(11) DEFAULT NULL,
  UNIQUE KEY `dipendente_codice_fiscale_uindex` (`codice_fiscale`),
  UNIQUE KEY `dipendente_email_uindex` (`email`),
  KEY `Dipendente_Ruolo_id_fk` (`id_ruolo`),
  CONSTRAINT `Dipendente_Ruolo_id_fk` FOREIGN KEY (`id_ruolo`) REFERENCES `Ruolo` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Dipendente`
--

LOCK TABLES `Dipendente` WRITE;
/*!40000 ALTER TABLE `Dipendente` DISABLE KEYS */;
INSERT INTO `Dipendente` VALUES ('SCPCCC01B30L157R','Cristian','Scapin','Via ss lampo 22','cris@gmail.com','$2y$10$NCZ9MS7Gbsk5d99WLQo80uQLG/zZkPQKokmgF4SZgVNmJ1DY5qXyu',NULL,1,2);
/*!40000 ALTER TABLE `Dipendente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Indirizzo`
--

DROP TABLE IF EXISTS `Indirizzo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Indirizzo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `indirizzo` varchar(255) NOT NULL,
  `id_citta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Indirizzo_indirizzo_uindex` (`indirizzo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Indirizzo`
--

LOCK TABLES `Indirizzo` WRITE;
/*!40000 ALTER TABLE `Indirizzo` DISABLE KEYS */;
/*!40000 ALTER TABLE `Indirizzo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Marca`
--

DROP TABLE IF EXISTS `Marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Marca` (
  `nome` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Marca`
--

LOCK TABLES `Marca` WRITE;
/*!40000 ALTER TABLE `Marca` DISABLE KEYS */;
INSERT INTO `Marca` VALUES ('NVIDIA',NULL);
/*!40000 ALTER TABLE `Marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Negozio`
--

DROP TABLE IF EXISTS `Negozio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Negozio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `indirizzo` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Negozio_email_uindex` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Negozio`
--

LOCK TABLES `Negozio` WRITE;
/*!40000 ALTER TABLE `Negozio` DISABLE KEYS */;
INSERT INTO `Negozio` VALUES (1,'Via sclebu 12','3462930192','negozio1@gmail.com');
/*!40000 ALTER TABLE `Negozio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Ordine`
--

DROP TABLE IF EXISTS `Ordine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ordine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_pezzo` varchar(255) NOT NULL,
  `id_utente` int(11) NOT NULL,
  `data` datetime DEFAULT NULL,
  `garanzia` tinyint(1) DEFAULT NULL,
  `id_negozio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ordine`
--

LOCK TABLES `Ordine` WRITE;
/*!40000 ALTER TABLE `Ordine` DISABLE KEYS */;
INSERT INTO `Ordine` VALUES (1,'RTX 2070',13,'2021-05-25 21:39:24',1,1);
/*!40000 ALTER TABLE `Ordine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Ruolo`
--

DROP TABLE IF EXISTS `Ruolo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ruolo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ruolo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ruolo`
--

LOCK TABLES `Ruolo` WRITE;
/*!40000 ALTER TABLE `Ruolo` DISABLE KEYS */;
INSERT INTO `Ruolo` VALUES (1,'Vendite'),(2,'Manager'),(3,'Assistenza'),(4,'Servizio Clienti');
/*!40000 ALTER TABLE `Ruolo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `StoredIn`
--

DROP TABLE IF EXISTS `StoredIn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `StoredIn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_pezzo` varchar(255) DEFAULT NULL,
  `id_negozio` int(11) DEFAULT NULL,
  `quantita` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `StoredIn`
--

LOCK TABLES `StoredIn` WRITE;
/*!40000 ALTER TABLE `StoredIn` DISABLE KEYS */;
/*!40000 ALTER TABLE `StoredIn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Utente`
--

DROP TABLE IF EXISTS `Utente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Utente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `cognome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Utente_email_uindex` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Utente`
--

LOCK TABLES `Utente` WRITE;
/*!40000 ALTER TABLE `Utente` DISABLE KEYS */;
INSERT INTO `Utente` VALUES (13,'Cristian','Scapin','cristian.scapin654@gmail.com','$2y$10$JeO.Nuph6UEDfYWb3XsG2eund8GPq27BpjuseHelE77nZPytEIYnO'),(20,'Cristian','Scapin','cscapin@chilesotti.it','$2y$10$0QE6WpGMK/Hvc6oUo02Aguiy3k/8UBUmj08i4w/5us1LDbcZbGDYW'),(21,'Petra','Franchi','petrafranchi@caca.it','$2y$10$Rd1CUENaCO.Ec8WjSWMM3uCHUoqqul0VUY8ayBLuB49KyBJ6BknGy');
/*!40000 ALTER TABLE `Utente` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-25 21:56:56
