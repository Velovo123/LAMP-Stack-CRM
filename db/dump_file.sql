-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: tv_studio
-- ------------------------------------------------------
-- Server version	8.0.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `broadcast`
--

DROP TABLE IF EXISTS `broadcast`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `broadcast` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `episode_id` int unsigned DEFAULT NULL,
  `studio_id` int unsigned DEFAULT NULL,
  `air_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `episode_id` (`episode_id`),
  KEY `studio_id` (`studio_id`),
  CONSTRAINT `broadcast_ibfk_1` FOREIGN KEY (`episode_id`) REFERENCES `episode` (`id`),
  CONSTRAINT `broadcast_ibfk_2` FOREIGN KEY (`studio_id`) REFERENCES `studio` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `broadcast`
--

LOCK TABLES `broadcast` WRITE;
/*!40000 ALTER TABLE `broadcast` DISABLE KEYS */;
INSERT INTO `broadcast` VALUES (1,1,1,'2008-01-20 18:00:00'),(2,2,2,'1994-09-22 17:00:00'),(3,3,3,'2011-04-17 18:00:00');
/*!40000 ALTER TABLE `broadcast` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `episode`
--

DROP TABLE IF EXISTS `episode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `episode` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `show_id` int unsigned DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `air_date` timestamp NULL DEFAULT NULL,
  `number` int DEFAULT NULL,
  `duration_seconds` int DEFAULT NULL,
  `relevance` int DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `show_id` (`show_id`),
  CONSTRAINT `episode_ibfk_1` FOREIGN KEY (`show_id`) REFERENCES `tv_show` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `episode`
--

LOCK TABLES `episode` WRITE;
/*!40000 ALTER TABLE `episode` DISABLE KEYS */;
INSERT INTO `episode` VALUES (1,1,'Pilot','2008-01-20 18:00:00',1,2700,0),(2,2,'The One Where Monica Gets a Roommate','1994-09-22 17:00:00',1,1500,0),(3,3,'Winter is Coming','2011-04-17 18:00:00',1,3600,0);
/*!40000 ALTER TABLE `episode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `episoderelevance`
--

DROP TABLE IF EXISTS `episoderelevance`;
/*!50001 DROP VIEW IF EXISTS `episoderelevance`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `episoderelevance` AS SELECT 
 1 AS `id`,
 1 AS `show_id`,
 1 AS `name`,
 1 AS `air_date`,
 1 AS `number`,
 1 AS `duration_seconds`,
 1 AS `relevance`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipment` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int unsigned DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`),
  CONSTRAINT `equipment_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `equipment_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment`
--

LOCK TABLES `equipment` WRITE;
/*!40000 ALTER TABLE `equipment` DISABLE KEYS */;
INSERT INTO `equipment` VALUES (1,1,1),(2,2,1),(3,3,1);
/*!40000 ALTER TABLE `equipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipment_type`
--

DROP TABLE IF EXISTS `equipment_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipment_type` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment_type`
--

LOCK TABLES `equipment_type` WRITE;
/*!40000 ALTER TABLE `equipment_type` DISABLE KEYS */;
INSERT INTO `equipment_type` VALUES (1,'Camera'),(2,'Microphone'),(3,'Lighting');
/*!40000 ALTER TABLE `equipment_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `show_details`
--

DROP TABLE IF EXISTS `show_details`;
/*!50001 DROP VIEW IF EXISTS `show_details`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `show_details` AS SELECT 
 1 AS `show_name`,
 1 AS `episode_name`,
 1 AS `air_date`,
 1 AS `staff_lastName`,
 1 AS `staff_firstName`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `show_staff`
--

DROP TABLE IF EXISTS `show_staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `show_staff` (
  `show_id` int unsigned DEFAULT NULL,
  `staff_id` int unsigned DEFAULT NULL,
  KEY `show_id` (`show_id`),
  KEY `staff_id` (`staff_id`),
  CONSTRAINT `show_staff_ibfk_1` FOREIGN KEY (`show_id`) REFERENCES `tv_show` (`id`),
  CONSTRAINT `show_staff_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `show_staff`
--

LOCK TABLES `show_staff` WRITE;
/*!40000 ALTER TABLE `show_staff` DISABLE KEYS */;
INSERT INTO `show_staff` VALUES (1,1),(2,2),(3,3),(4,10),(5,5),(8,3),(10,5);
/*!40000 ALTER TABLE `show_staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `show_type`
--

DROP TABLE IF EXISTS `show_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `show_type` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `show_type`
--

LOCK TABLES `show_type` WRITE;
/*!40000 ALTER TABLE `show_type` DISABLE KEYS */;
INSERT INTO `show_type` VALUES (1,'Drama'),(2,'Comedy'),(3,'Action'),(4,'Thriller'),(5,'Science Fiction'),(6,'Fantasy'),(7,'Romance'),(8,'Horror');
/*!40000 ALTER TABLE `show_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `phoneNumber` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,'Cranston','Bryan','Actor','123-456-7890','123 Fake St, Los Angeles'),(2,'Semenchuk','Anatolii','Actor','456-789-0123','456 Hollywood Blvd, Los Angeles'),(3,'Harington','Kit','Actor','789-012-3456','789 Sunset Ave, Los Angeles'),(5,'Harbour','David','Actor','234-567-8901','789 Main St, Los Angeles'),(6,'Cavill','Henry','Actor','345-678-9012','890 Broadway, New York'),(7,'Paul','Aaron','Director','567-890-1234','567 Sunset Blvd, Los Angeles'),(8,'Wright','Robin','Producer','890-123-4567','890 Vine St, Los Angeles'),(9,'Williams','Maisie','Actress','901-234-5678','901 Hollywood Blvd, Los Angeles'),(10,'Jones','Finn','Writer','234-567-8901','234 Broadway, New York'),(11,'Watson','Emma','Actress','345-678-9012','345 Park Ave, New York');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studio`
--

DROP TABLE IF EXISTS `studio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `studio` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `capacity` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studio`
--

LOCK TABLES `studio` WRITE;
/*!40000 ALTER TABLE `studio` DISABLE KEYS */;
INSERT INTO `studio` VALUES (1,'Studio 1','Los Angeles',100),(2,'Studio 2','New York',120),(3,'Studio 3','London',80);
/*!40000 ALTER TABLE `studio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studio_equipment`
--

DROP TABLE IF EXISTS `studio_equipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `studio_equipment` (
  `studio_id` int unsigned DEFAULT NULL,
  `equipment_id` int unsigned DEFAULT NULL,
  KEY `studio_id` (`studio_id`),
  KEY `equipment_id` (`equipment_id`),
  CONSTRAINT `studio_equipment_ibfk_1` FOREIGN KEY (`studio_id`) REFERENCES `studio` (`id`),
  CONSTRAINT `studio_equipment_ibfk_2` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studio_equipment`
--

LOCK TABLES `studio_equipment` WRITE;
/*!40000 ALTER TABLE `studio_equipment` DISABLE KEYS */;
INSERT INTO `studio_equipment` VALUES (1,1),(1,2),(1,3),(2,1),(2,2),(3,3);
/*!40000 ALTER TABLE `studio_equipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tv_show`
--

DROP TABLE IF EXISTS `tv_show`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tv_show` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type_id` int unsigned DEFAULT NULL,
  `description` text,
  `rating` decimal(2,1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`),
  CONSTRAINT `tv_show_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `show_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tv_show`
--

LOCK TABLES `tv_show` WRITE;
/*!40000 ALTER TABLE `tv_show` DISABLE KEYS */;
INSERT INTO `tv_show` VALUES (1,'Breaking Bad',1,'A high school chemistry teacher turned methamphetamine manufacturer.',9.5),(2,'Friends',2,'A group of friends living in New York City.',8.9),(3,'Game of Thrones',3,'Seven noble families fight for control of the mythical land of Westeros.',9.3),(4,'Stranger Things',5,'A group of kids encounter strange occurrences in their small town.',8.8),(5,'The Witcher',6,'A monster hunter struggles to find his place in a world where people often prove more wicked than beasts.',8.2),(8,'The Mandalorian',3,'Follows a lone Mandalorian bounty hunter in the outer reaches of the galaxy.',8.7),(9,'Stranger Things',5,'A group of kids encounter strange occurrences in their small town.',8.8),(10,'The Crown',1,'Follows the political rivalries and romance of Queen Elizabeth II\'s reign and the events that shaped the second half of the 20th century.',8.7),(11,'Westworld',3,'An amusement park populated by android hosts allows guests to live out their wildest fantasies.',8.6),(12,'The Umbrella Academy',3,'A dysfunctional family of adopted sibling superheroes reunite to solve the mystery of their father\'s death.',8.0);
/*!40000 ALTER TABLE `tv_show` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `episoderelevance`
--

/*!50001 DROP VIEW IF EXISTS `episoderelevance`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `episoderelevance` AS select `episode`.`id` AS `id`,`episode`.`show_id` AS `show_id`,`episode`.`name` AS `name`,`episode`.`air_date` AS `air_date`,`episode`.`number` AS `number`,`episode`.`duration_seconds` AS `duration_seconds`,`episode`.`relevance` AS `relevance` from `episode` where (`episode`.`relevance` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `show_details`
--

/*!50001 DROP VIEW IF EXISTS `show_details`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `show_details` AS select `tv_show`.`name` AS `show_name`,`episode`.`name` AS `episode_name`,`episode`.`air_date` AS `air_date`,`staff`.`lastName` AS `staff_lastName`,`staff`.`firstName` AS `staff_firstName` from (((`tv_show` join `episode` on((`tv_show`.`id` = `episode`.`show_id`))) join `show_staff` on((`tv_show`.`id` = `show_staff`.`show_id`))) join `staff` on((`show_staff`.`staff_id` = `staff`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-07 14:19:18
