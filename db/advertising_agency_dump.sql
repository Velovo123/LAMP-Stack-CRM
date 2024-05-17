-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: advertising_agency
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
-- Table structure for table `advertisement`
--

DROP TABLE IF EXISTS `advertisement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `advertisement` (
  `AdvertisementID` int NOT NULL AUTO_INCREMENT,
  `CampaignID` int DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Content` text,
  `CreativeTeam` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`AdvertisementID`),
  KEY `CampaignID` (`CampaignID`),
  CONSTRAINT `advertisement_ibfk_1` FOREIGN KEY (`CampaignID`) REFERENCES `campaign` (`CampaignID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advertisement`
--

LOCK TABLES `advertisement` WRITE;
/*!40000 ALTER TABLE `advertisement` DISABLE KEYS */;
INSERT INTO `advertisement` VALUES (1,1,'Banner','Banner Ad for Summer Sale','Team A'),(2,1,'Video','Video Ad for Summer Sale','Team B'),(3,2,'Banner','Banner Ad for New Product Launch','Team C'),(4,2,'Social Media','Social Media Ad for New Product Launch','Team D'),(5,3,'Video','Video Ad for Holiday Specials','Team E');
/*!40000 ALTER TABLE `advertisement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `advertisementplacement`
--

DROP TABLE IF EXISTS `advertisementplacement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `advertisementplacement` (
  `PlacementID` int NOT NULL AUTO_INCREMENT,
  `AdvertisementID` int DEFAULT NULL,
  `PlacementDetails` text,
  `Cost` decimal(10,2) DEFAULT NULL,
  `DurationDays` int DEFAULT NULL,
  PRIMARY KEY (`PlacementID`),
  KEY `AdvertisementID` (`AdvertisementID`),
  CONSTRAINT `advertisementplacement_ibfk_1` FOREIGN KEY (`AdvertisementID`) REFERENCES `advertisement` (`AdvertisementID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advertisementplacement`
--

LOCK TABLES `advertisementplacement` WRITE;
/*!40000 ALTER TABLE `advertisementplacement` DISABLE KEYS */;
INSERT INTO `advertisementplacement` VALUES (1,1,'Homepage Banner',1000.00,30),(2,2,'YouTube Video',3000.00,15),(3,3,'Sidebar Banner',800.00,45),(4,4,'Facebook Ad',2000.00,60),(5,5,'Instagram Story',2500.00,10);
/*!40000 ALTER TABLE `advertisementplacement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaign`
--

DROP TABLE IF EXISTS `campaign`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `campaign` (
  `CampaignID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) DEFAULT NULL,
  `Budget` decimal(15,2) DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `CreativeDirector` varchar(100) DEFAULT NULL,
  `ClientID` int DEFAULT NULL,
  PRIMARY KEY (`CampaignID`),
  KEY `ClientID` (`ClientID`),
  CONSTRAINT `campaign_ibfk_1` FOREIGN KEY (`ClientID`) REFERENCES `client` (`ClientID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign`
--

LOCK TABLES `campaign` WRITE;
/*!40000 ALTER TABLE `campaign` DISABLE KEYS */;
INSERT INTO `campaign` VALUES (1,'Summer Sale',50000.00,'2024-06-01','2024-08-31','Creative John',1),(2,'New Product Launch',75000.00,'2024-07-01','2024-09-30','Creative Jane',2),(3,'Holiday Specials',60000.00,'2024-11-01','2024-12-31','Creative Alice',3),(4,'Spring Discounts',45000.00,'2024-03-01','2024-05-31','Creative Bob',4),(5,'Black Friday Deals',80000.00,'2024-11-15','2024-11-30','Creative Charlie',5);
/*!40000 ALTER TABLE `campaign` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client` (
  `ClientID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `BillingAddress` text,
  `AccountManager` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ClientID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'Acme Corp','contact@acme.com','123-456-7890','123 Acme St, Acme City, AC 12345','Alice Manager'),(2,'Beta LLC','info@beta.com','234-567-8901','456 Beta Rd, Beta Town, BT 23456','Bob Manager'),(3,'Gamma Inc','support@gamma.com','345-678-9012','789 Gamma Blvd, Gamma City, GC 34567','Charlie Manager'),(4,'Delta Co','hello@delta.com','456-789-0123','101 Delta Ave, Delta City, DC 45678','David Manager'),(5,'Epsilon Ltd','services@epsilon.com','567-890-1234','202 Epsilon St, Epsilon Town, ET 56789','Eve Manager');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contactus` (
  `Email` varchar(100) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Message` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactus`
--

LOCK TABLES `contactus` WRITE;
/*!40000 ALTER TABLE `contactus` DISABLE KEYS */;
INSERT INTO `contactus` VALUES ('john.doe@example.com','John Doe','Inquiry about advertising services.'),('jane.smith@example.com','Jane Smith','Interested in a marketing campaign.'),('alice.jones@example.com','Alice Jones','Need information on pricing.'),('bob.brown@example.com','Bob Brown','Looking for a creative director.'),('charlie.green@example.com','Charlie Green','Follow-up on previous message.');
/*!40000 ALTER TABLE `contactus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee` (
  `EmployeeID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) DEFAULT NULL,
  `Position` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Salary` decimal(15,2) DEFAULT NULL,
  `Department` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`EmployeeID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'John Doe','Manager','john.doe@agency.com','123-456-7890',70000.00,'Management'),(2,'Jane Smith','Designer','jane.smith@agency.com','234-567-8901',60000.00,'Design'),(3,'Alice Jones','Developer','alice.jones@agency.com','345-678-9012',65000.00,'IT'),(4,'Bob Brown','Marketer','bob.brown@agency.com','456-789-0123',62000.00,'Marketing'),(5,'Charlie Green','Sales','charlie.green@agency.com','567-890-1234',58000.00,'Sales');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice` (
  `InvoiceID` int NOT NULL AUTO_INCREMENT,
  `ClientID` int DEFAULT NULL,
  `CampaignID` int DEFAULT NULL,
  `InvoiceDate` date DEFAULT NULL,
  `PaymentStatus` varchar(20) DEFAULT NULL,
  `TotalAmount` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`InvoiceID`),
  KEY `ClientID` (`ClientID`),
  KEY `CampaignID` (`CampaignID`),
  CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`ClientID`) REFERENCES `client` (`ClientID`),
  CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`CampaignID`) REFERENCES `campaign` (`CampaignID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` VALUES (1,1,1,'2024-06-05','Paid',10000.00),(2,2,2,'2024-07-10','Unpaid',15000.00),(3,3,3,'2024-11-15','Paid',12000.00),(4,4,4,'2024-03-10','Unpaid',9000.00),(5,5,5,'2024-11-20','Paid',20000.00);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment` (
  `PaymentID` int NOT NULL AUTO_INCREMENT,
  `InvoiceID` int DEFAULT NULL,
  `EmployeeID` int DEFAULT NULL,
  `PaymentDate` date DEFAULT NULL,
  `PaymentMethod` varchar(20) DEFAULT NULL,
  `TransactionReference` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PaymentID`),
  KEY `InvoiceID` (`InvoiceID`),
  KEY `EmployeeID` (`EmployeeID`),
  CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`InvoiceID`) REFERENCES `invoice` (`InvoiceID`),
  CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (1,1,1,'2024-06-06','Credit Card','TX123456'),(2,2,2,'2024-07-11','Bank Transfer','TX234567'),(3,3,3,'2024-11-16','PayPal','TX345678'),(4,4,3,'2024-11-17','Credit Card','TX456789'),(5,5,4,'2024-03-11','Bank Transfer','TX567890');
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `performancemetric`
--

DROP TABLE IF EXISTS `performancemetric`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `performancemetric` (
  `MetricID` int NOT NULL AUTO_INCREMENT,
  `AdvertisementID` int DEFAULT NULL,
  `Impressions` int DEFAULT NULL,
  `Clicks` int DEFAULT NULL,
  `Conversions` int DEFAULT NULL,
  `Date` date DEFAULT NULL,
  PRIMARY KEY (`MetricID`),
  KEY `AdvertisementID` (`AdvertisementID`),
  CONSTRAINT `performancemetric_ibfk_1` FOREIGN KEY (`AdvertisementID`) REFERENCES `advertisement` (`AdvertisementID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `performancemetric`
--

LOCK TABLES `performancemetric` WRITE;
/*!40000 ALTER TABLE `performancemetric` DISABLE KEYS */;
INSERT INTO `performancemetric` VALUES (1,1,10000,150,10,'2024-06-15'),(2,2,20000,300,25,'2024-06-20'),(3,3,5000,70,5,'2024-07-01'),(4,4,15000,220,18,'2024-07-10'),(5,5,12000,180,12,'2024-12-01');
/*!40000 ALTER TABLE `performancemetric` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendorinvoice`
--

DROP TABLE IF EXISTS `vendorinvoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendorinvoice` (
  `PaymentID` int NOT NULL,
  `VendorID` int DEFAULT NULL,
  `InvoiceDate` date DEFAULT NULL,
  `TotalAmount` decimal(15,2) DEFAULT NULL,
  `PaymentStatus` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`PaymentID`),
  KEY `VendorID` (`VendorID`),
  CONSTRAINT `vendorinvoice_ibfk_1` FOREIGN KEY (`PaymentID`) REFERENCES `payment` (`PaymentID`),
  CONSTRAINT `vendorinvoice_ibfk_2` FOREIGN KEY (`VendorID`) REFERENCES `vendorsupplierinformation` (`VendorID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendorinvoice`
--

LOCK TABLES `vendorinvoice` WRITE;
/*!40000 ALTER TABLE `vendorinvoice` DISABLE KEYS */;
INSERT INTO `vendorinvoice` VALUES (1,1,'2024-06-06',5000.00,'Paid'),(2,2,'2024-07-11',7000.00,'Unpaid'),(3,3,'2024-11-16',6000.00,'Paid'),(4,4,'2024-03-11',4000.00,'Unpaid'),(5,5,'2024-11-17',8000.00,'Paid');
/*!40000 ALTER TABLE `vendorinvoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendorsupplierinformation`
--

DROP TABLE IF EXISTS `vendorsupplierinformation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendorsupplierinformation` (
  `VendorID` int NOT NULL AUTO_INCREMENT,
  `VendorName` varchar(100) DEFAULT NULL,
  `ContactInfo` text,
  `ServicesProvided` text,
  `PaymentTerms` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`VendorID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendorsupplierinformation`
--

LOCK TABLES `vendorsupplierinformation` WRITE;
/*!40000 ALTER TABLE `vendorsupplierinformation` DISABLE KEYS */;
INSERT INTO `vendorsupplierinformation` VALUES (1,'Alpha Supplies','alpha@supplies.com','Advertising Materials','Net 30'),(2,'Beta Media','beta@media.com','Media Placement','Net 45'),(3,'Gamma Studios','gamma@studios.com','Video Production','Net 60'),(4,'Delta Print','delta@print.com','Printing Services','Net 30'),(5,'Epsilon Web','epsilon@web.com','Web Development','Net 45');
/*!40000 ALTER TABLE `vendorsupplierinformation` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-17 19:16:45
