-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: marketweb
-- ------------------------------------------------------
-- Server version	5.7.19-log

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
-- Table structure for table `ambulant`
--

DROP TABLE IF EXISTS `ambulant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ambulant` (
  `ambulant_id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(45) DEFAULT NULL,
  `location_num` varchar(45) DEFAULT NULL,
  `ambu_client_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ambulant_id`),
  UNIQUE KEY `ambu_client_id_UNIQUE` (`ambu_client_id`),
  CONSTRAINT `ambu_client_id` FOREIGN KEY (`ambu_client_id`) REFERENCES `client` (`Client_Id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ambulant`
--

LOCK TABLES `ambulant` WRITE;
/*!40000 ALTER TABLE `ambulant` DISABLE KEYS */;
INSERT INTO `ambulant` VALUES (1,'SPC','123',209);
/*!40000 ALTER TABLE `ambulant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cheque`
--

DROP TABLE IF EXISTS `cheque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cheque` (
  `id_cheque` int(11) NOT NULL,
  `cheque_amount` varchar(45) DEFAULT NULL,
  `cheque_number` varchar(45) DEFAULT NULL,
  `bank_branch` varchar(45) DEFAULT NULL,
  `fk_stall_number` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_cheque`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cheque`
--

LOCK TABLES `cheque` WRITE;
/*!40000 ALTER TABLE `cheque` DISABLE KEYS */;
/*!40000 ALTER TABLE `cheque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `Client_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Client_type` varchar(255) DEFAULT NULL,
  `OFirstname` varchar(255) DEFAULT NULL,
  `OMiddlename` varchar(255) DEFAULT NULL,
  `OLastname` varchar(255) DEFAULT NULL,
  `OAddress` varchar(255) DEFAULT NULL,
  `OContactNum` varchar(255) DEFAULT NULL,
  `OcFirstname` varchar(255) DEFAULT NULL,
  `OcMiddlename` varchar(255) DEFAULT NULL,
  `Oclastname` varchar(255) DEFAULT NULL,
  `OcAddress` varchar(255) DEFAULT NULL,
  `OcContactNum` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Client_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=210 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (195,'delivery','123qwe','123','qweqwe','SPC','1234','qwe','qwe','qwe','ken','09491920564'),(196,'delivery','qwe','123','123','qwe','123','qwe','qwe','qwe','ken','123'),(197,'tenant','ken','ken','ken','ken','123','ken','ken','ken','ken','ken'),(203,'tenant','kenneth','cordez','hilairon ','SPC','123','kenneth','cordez','hilairon','SPC','123'),(204,'tenant','kenneth','cordez','hilairon ','SPC','123','kenneth','cordez','hilairon','SPC','123'),(205,'tenant','kenneth','cordez','hilairon ','SPC','123','kenneth','cordez','hilairon','SPC','123'),(206,'tenant','kenneth','cordez','hilairon ','SPC','123','kenneth','cordez','hilairon','SPC','123'),(207,'tenant','kenneth','cordez','hilairon ','SPC','123','kenneth','cordez','hilairon','SPC','123'),(208,'tenant','kenneth','cordez','hilairon ','SPC','123','kenneth','cordez','hilairon','SPC','123'),(209,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery`
--

DROP TABLE IF EXISTS `delivery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL AUTO_INCREMENT,
  `delivery_client_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`delivery_id`),
  UNIQUE KEY `delivery_client_id_UNIQUE` (`delivery_client_id`),
  CONSTRAINT `delivery_client_id` FOREIGN KEY (`delivery_client_id`) REFERENCES `client` (`Client_Id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery`
--

LOCK TABLES `delivery` WRITE;
/*!40000 ALTER TABLE `delivery` DISABLE KEYS */;
/*!40000 ALTER TABLE `delivery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fund`
--

DROP TABLE IF EXISTS `fund`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fund` (
  `fund_id` int(11) NOT NULL,
  `fund_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`fund_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fund`
--

LOCK TABLES `fund` WRITE;
/*!40000 ALTER TABLE `fund` DISABLE KEYS */;
INSERT INTO `fund` VALUES (1,'General Fund / Market');
/*!40000 ALTER TABLE `fund` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parking`
--

DROP TABLE IF EXISTS `parking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parking` (
  `parking_id` int(11) NOT NULL AUTO_INCREMENT,
  `park_client_id` int(11) DEFAULT NULL,
  `parking_lot` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`parking_id`),
  UNIQUE KEY `client_id_UNIQUE` (`park_client_id`),
  CONSTRAINT `park_client_id` FOREIGN KEY (`park_client_id`) REFERENCES `client` (`Client_Id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parking`
--

LOCK TABLES `parking` WRITE;
/*!40000 ALTER TABLE `parking` DISABLE KEYS */;
/*!40000 ALTER TABLE `parking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_nature`
--

DROP TABLE IF EXISTS `payment_nature`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_nature` (
  `payment_nature_id` int(11) NOT NULL,
  `payment_nature_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`payment_nature_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_nature`
--

LOCK TABLES `payment_nature` WRITE;
/*!40000 ALTER TABLE `payment_nature` DISABLE KEYS */;
INSERT INTO `payment_nature` VALUES (4004,'Annual Rental Fee'),(4005,'Semi Annual Rental Fee'),(4006,'Quarterly Rental Fee'),(4007,'Water Services Fee'),(4008,'Electrical Services Fee'),(4009,'Monthly Rental Fee'),(4010,'Weely Rental Fee'),(4011,'Daily Market Fee'),(4012,'Privellege Parking Fee'),(4014,'Others'),(4015,'Certification'),(4016,'Violation');
/*!40000 ALTER TABLE `payment_nature` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stall`
--

DROP TABLE IF EXISTS `stall`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Stall_Number` varchar(255) DEFAULT NULL,
  `Floor_Level` varchar(255) DEFAULT NULL,
  `Daily_Fee` varchar(255) DEFAULT NULL,
  `Sqaure_meters` varchar(255) DEFAULT NULL,
  `Occupied_by` int(11) DEFAULT NULL,
  `date_Oc` date DEFAULT NULL,
  `Buss_id` varchar(255) DEFAULT NULL,
  `Buss_name` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Occupied_by_UNIQUE` (`Occupied_by`),
  CONSTRAINT `Client_Id` FOREIGN KEY (`Occupied_by`) REFERENCES `client` (`Client_Id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stall`
--

LOCK TABLES `stall` WRITE;
/*!40000 ALTER TABLE `stall` DISABLE KEYS */;
INSERT INTO `stall` VALUES (30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(31,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(32,'124','Basement','123','124',197,'2019-09-06','123','ken',NULL),(33,'f-20','Basement','10','5',203,'0000-00-00','123','fish',NULL),(34,'f-21','Basement','10','5',204,'0000-00-00','123','fish',NULL),(35,'f-22','Basement','10','5',205,'0000-00-00','123','fish',NULL),(36,'f-23','Basement','10','5',206,'0000-00-00','123','fish',NULL),(37,'f-24','Basement','10','5',207,'0000-00-00','123','fish',NULL),(38,'f-25','Basement','10','5',208,'0000-00-00','123','fish',NULL);
/*!40000 ALTER TABLE `stall` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sysuser`
--

DROP TABLE IF EXISTS `sysuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sysuser` (
  `sysuser_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_lvl` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_num` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sysuser_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sysuser`
--

LOCK TABLES `sysuser` WRITE;
/*!40000 ALTER TABLE `sysuser` DISABLE KEYS */;
INSERT INTO `sysuser` VALUES (1,'kenneth','cordez','hilairon','ken','kenneth','1','info tech','SPC','1234'),(2,'kenneth','cordez','hilairon','ken','kenneth','4','info tech','SPC','1234'),(3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `sysuser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  `payment_nature_id` int(11) DEFAULT NULL,
  `payment_amount` double DEFAULT NULL,
  `collector` varchar(255) DEFAULT NULL,
  `payor` varchar(255) DEFAULT NULL,
  `fund_id` int(11) DEFAULT '1',
  `amount_to_pay` double DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `or_number` varchar(255) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'Treasurer',
  `cancel_status` varchar(45) DEFAULT 'NOT',
  `effectivity` date DEFAULT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (5,'2019-09-10 15:15:21',4004,123,NULL,NULL,NULL,123,NULL,197,'123','Treasurer','NOT',NULL),(12,'2019-09-10 15:48:28',4004,123,NULL,NULL,NULL,123,NULL,197,'123','Treasurer','NOT',NULL),(13,'2019-09-10 15:49:36',4004,123,NULL,NULL,NULL,123,NULL,197,'123','Treasurer','NOT',NULL),(14,'2019-09-10 15:52:35',4004,123,NULL,NULL,NULL,123,NULL,197,'123','Treasurer','NOT',NULL),(15,'2019-09-10 15:53:08',4004,123,NULL,NULL,NULL,123,NULL,197,'123','Treasurer','NOT',NULL),(16,'2019-09-10 15:57:03',4004,123,NULL,NULL,NULL,123,NULL,208,'123','Treasurer','NOT','2019-09-10'),(17,'2019-09-10 15:58:54',4004,123,NULL,NULL,NULL,123,NULL,197,'123','Treasurer','NOT','2019-09-10'),(18,'2019-09-10 16:03:49',4004,123,NULL,'123',NULL,123,NULL,197,'123','Treasurer','NOT','2019-09-10');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'marketweb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-10 16:48:06
