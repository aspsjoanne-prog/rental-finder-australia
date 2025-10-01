-- MySQL dump 10.13  Distrib 8.0.43, for Linux (x86_64)
--
-- Host: localhost    Database: rental_finder
-- ------------------------------------------------------
-- Server version	8.0.43-0ubuntu0.22.04.1

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
-- Table structure for table `australian_suburbs`
--

DROP TABLE IF EXISTS `australian_suburbs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `australian_suburbs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `suburb` varchar(100) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `australian_suburbs`
--

LOCK TABLES `australian_suburbs` WRITE;
/*!40000 ALTER TABLE `australian_suburbs` DISABLE KEYS */;
INSERT INTO `australian_suburbs` VALUES (1,'Surry Hills','NSW','2010',-33.88860000,151.20940000),(2,'Newtown','NSW','2042',-33.89580000,151.17940000),(3,'Sydney','NSW','2000',-33.86880000,151.20930000),(4,'Bondi','NSW','2026',-33.89150000,151.27670000),(5,'Paddington','NSW','2021',-33.88480000,151.22990000),(6,'Glebe','NSW','2037',-33.87920000,151.18890000),(7,'Chippendale','NSW','2008',-33.88780000,151.19980000),(8,'Darlinghurst','NSW','2010',-33.87920000,151.21360000),(9,'Redfern','NSW','2016',-33.89340000,151.20440000),(10,'Alexandria','NSW','2015',-33.90670000,151.19560000),(11,'Waterloo','NSW','2017',-33.90100000,151.20650000),(12,'Potts Point','NSW','2011',-33.86970000,151.22630000),(13,'Kings Cross','NSW','2011',-33.87370000,151.22180000),(14,'Woolloomooloo','NSW','2011',-33.86700000,151.22080000),(15,'Pyrmont','NSW','2009',-33.86970000,151.19560000),(16,'Ultimo','NSW','2007',-33.87970000,151.19560000),(17,'Haymarket','NSW','2000',-33.87970000,151.20440000),(18,'Barangaroo','NSW','2000',-33.85970000,151.20190000),(19,'The Rocks','NSW','2000',-33.85970000,151.20890000),(20,'Circular Quay','NSW','2000',-33.86140000,151.21080000),(21,'Melbourne','VIC','3000',-37.81360000,144.96310000),(22,'South Yarra','VIC','3141',-37.83970000,144.99360000),(23,'Richmond','VIC','3121',-37.81970000,144.99860000),(24,'Fitzroy','VIC','3065',-37.79970000,144.97860000),(25,'Carlton','VIC','3053',-37.79970000,144.96310000),(26,'St Kilda','VIC','3182',-37.86970000,144.97860000),(27,'Prahran','VIC','3181',-37.84970000,144.99360000),(28,'Toorak','VIC','3142',-37.83970000,145.00860000),(29,'Collingwood','VIC','3066',-37.80470000,144.98860000),(30,'Northcote','VIC','3070',-37.76970000,145.00360000),(31,'Brisbane','QLD','4000',-27.46980000,153.02510000),(32,'South Brisbane','QLD','4101',-27.47980000,153.02010000),(33,'West End','QLD','4101',-27.48480000,153.01510000),(34,'Fortitude Valley','QLD','4006',-27.45480000,153.03510000),(35,'New Farm','QLD','4005',-27.46480000,153.04010000),(36,'Paddington','QLD','4064',-27.45980000,152.99510000),(37,'Milton','QLD','4064',-27.46980000,152.99010000),(38,'Toowong','QLD','4066',-27.48480000,152.98510000),(39,'St Lucia','QLD','4067',-27.49980000,152.99510000),(40,'Indooroopilly','QLD','4068',-27.49980000,152.97010000),(41,'Adelaide','SA','5000',-34.92850000,138.60070000),(42,'North Adelaide','SA','5006',-34.90850000,138.59570000),(43,'Unley','SA','5061',-34.94850000,138.60570000),(44,'Norwood','SA','5067',-34.91850000,138.63070000),(45,'Glenelg','SA','5045',-34.97850000,138.51070000),(46,'Perth','WA','6000',-31.95050000,115.86050000),(47,'Northbridge','WA','6003',-31.94050000,115.85550000),(48,'Subiaco','WA','6008',-31.94550000,115.82550000),(49,'Fremantle','WA','6160',-32.05550000,115.74550000),(50,'Cottesloe','WA','6011',-31.99550000,115.75550000);
/*!40000 ALTER TABLE `australian_suburbs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `properties`
--

DROP TABLE IF EXISTS `properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `properties` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(500) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `suburb` varchar(100) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `price_per_week` decimal(10,2) DEFAULT NULL,
  `bedrooms` int DEFAULT NULL,
  `bathrooms` int DEFAULT NULL,
  `parking_spaces` int DEFAULT NULL,
  `property_type` varchar(100) DEFAULT NULL,
  `has_aircon` tinyint(1) DEFAULT NULL,
  `flooring_type` varchar(100) DEFAULT NULL,
  `orientation` varchar(50) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `source_url` varchar(1000) DEFAULT NULL,
  `source_site` varchar(50) DEFAULT NULL,
  `images_analyzed` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `properties`
--

LOCK TABLES `properties` WRITE;
/*!40000 ALTER TABLE `properties` DISABLE KEYS */;
INSERT INTO `properties` VALUES (1,'Modern 2BR Apartment in Surry Hills','123 Crown Street, Surry Hills NSW 2010','Surry Hills','NSW','2010',650.00,2,1,1,'Apartment',1,'floorboards','North-facing',-33.88860000,151.20940000,'https://realestate.com.au/sample1','realestate.com.au',0,'2025-09-30 14:07:04','2025-09-30 14:07:04'),(2,'Spacious 3BR House in Newtown','45 King Street, Newtown NSW 2042','Newtown','NSW','2042',850.00,3,2,2,'House',0,'carpet','East-facing',-33.89580000,151.17940000,'https://domain.com.au/sample2','domain.com.au',0,'2025-09-30 14:07:04','2025-09-30 14:07:04'),(3,'Luxury 1BR Studio in CBD','88 George Street, Sydney NSW 2000','Sydney','NSW','2000',750.00,1,1,0,'Apartment',1,'floorboards','West-facing',-33.86880000,151.20930000,'https://realestate.com.au/sample3','realestate.com.au',0,'2025-09-30 14:07:04','2025-09-30 14:07:04'),(4,'Family 4BR Home in Bondi','22 Beach Road, Bondi NSW 2026','Bondi','NSW','2026',1200.00,4,2,2,'House',1,'floorboards','North-facing',-33.89150000,151.27670000,'https://domain.com.au/sample4','domain.com.au',0,'2025-09-30 14:07:04','2025-09-30 14:07:04'),(5,'Cozy 2BR Unit in Paddington','15 Oxford Street, Paddington NSW 2021','Paddington','NSW','2021',580.00,2,1,1,'Unit',0,'carpet','South-facing',-33.88480000,151.22990000,'https://realestate.com.au/sample5','realestate.com.au',0,'2025-09-30 14:07:04','2025-09-30 14:07:04'),(6,'Modern 3BR Townhouse in Glebe','77 Glebe Point Road, Glebe NSW 2037','Glebe','NSW','2037',900.00,3,2,1,'Townhouse',1,'floorboards','East-facing',-33.87920000,151.18890000,'https://domain.com.au/sample6','domain.com.au',0,'2025-09-30 14:07:04','2025-09-30 14:07:04'),(7,'Stylish 1BR Loft in Chippendale','33 Abercrombie Street, Chippendale NSW 2008','Chippendale','NSW','2008',520.00,1,1,0,'Apartment',1,'floorboards','North-facing',-33.88780000,151.19980000,'https://realestate.com.au/sample7','realestate.com.au',0,'2025-09-30 14:07:04','2025-09-30 14:07:04'),(8,'Spacious 2BR Apartment in Darlinghurst','99 William Street, Darlinghurst NSW 2010','Darlinghurst','NSW','2010',680.00,2,1,0,'Apartment',1,'floorboards','West-facing',-33.87920000,151.21360000,'https://domain.com.au/sample8','domain.com.au',0,'2025-09-30 14:07:04','2025-09-30 14:07:04'),(9,'Luxury 3BR Penthouse with Harbor Views','88 Harbour Street','Sydney','NSW','2000',1200.00,3,2,2,'Apartment',1,'floorboards','North-facing',-33.86880000,151.20930000,'https://domain.com.au/sample5','domain.com.au',0,'2025-09-30 14:22:49','2025-09-30 14:22:49'),(10,'Cozy 1BR Studio in Newtown','45 King Street','Newtown','NSW','2042',420.00,1,1,0,'Studio',0,'carpet','East-facing',-33.89780000,151.17940000,'https://realestate.com.au/sample6','realestate.com.au',0,'2025-09-30 14:22:49','2025-09-30 14:22:49'),(11,'Family 4BR House with Garden','22 Elm Avenue','Bondi Beach','NSW','2026',950.00,4,3,2,'House',1,'floorboards','North-facing',-33.89150000,151.27670000,'https://domain.com.au/sample7','domain.com.au',0,'2025-09-30 14:22:49','2025-09-30 14:22:49'),(12,'Modern 2BR Apartment with Pool','156 Oxford Street','Darlinghurst','NSW','2010',750.00,2,2,1,'Apartment',1,'floorboards','West-facing',-33.87920000,151.21400000,'https://realestate.com.au/sample8','realestate.com.au',0,'2025-09-30 14:22:49','2025-09-30 14:22:49'),(13,'Charming 1BR Cottage','33 Rose Street','Chippendale','NSW','2008',580.00,1,1,1,'House',0,'floorboards','South-facing',-33.88780000,151.19880000,'https://domain.com.au/sample9','domain.com.au',0,'2025-09-30 14:22:49','2025-09-30 14:22:49'),(14,'Executive 3BR Apartment','200 Pitt Street','Sydney','NSW','2000',1100.00,3,2,2,'Apartment',1,'floorboards','East-facing',-33.86880000,151.20930000,'https://realestate.com.au/sample10','realestate.com.au',0,'2025-09-30 14:22:49','2025-09-30 14:22:49'),(15,'Affordable 2BR Unit','67 Railway Parade','Redfern','NSW','2016',520.00,2,1,1,'Unit',0,'carpet','North-facing',-33.89340000,151.20440000,'https://domain.com.au/sample11','domain.com.au',0,'2025-09-30 14:22:49','2025-09-30 14:22:49'),(16,'Spacious 3BR Townhouse','14 Park Lane','Glebe','NSW','2037',850.00,3,2,2,'Townhouse',1,'floorboards','West-facing',-33.88140000,151.19100000,'https://realestate.com.au/sample12','realestate.com.au',0,'2025-09-30 14:22:49','2025-09-30 14:22:49');
/*!40000 ALTER TABLE `properties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_images`
--

DROP TABLE IF EXISTS `property_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `property_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `property_id` int DEFAULT NULL,
  `image_url` varchar(1000) DEFAULT NULL,
  `ai_analysis` json DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `property_id` (`property_id`),
  CONSTRAINT `property_images_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_images`
--

LOCK TABLES `property_images` WRITE;
/*!40000 ALTER TABLE `property_images` DISABLE KEYS */;
INSERT INTO `property_images` VALUES (1,5,'https://via.placeholder.com/600x400/1E40AF/FFFFFF?text=Harbor+View+Living',NULL),(2,5,'https://via.placeholder.com/600x400/7C3AED/FFFFFF?text=Master+Bedroom',NULL),(3,5,'https://via.placeholder.com/600x400/DC2626/FFFFFF?text=Rooftop+Terrace',NULL),(4,6,'https://via.placeholder.com/600x400/059669/FFFFFF?text=Studio+Living',NULL),(5,6,'https://via.placeholder.com/600x400/D97706/FFFFFF?text=Compact+Kitchen',NULL),(6,7,'https://via.placeholder.com/600x400/0891B2/FFFFFF?text=Family+Living',NULL),(7,7,'https://via.placeholder.com/600x400/65A30D/FFFFFF?text=Garden+View',NULL),(8,7,'https://via.placeholder.com/600x400/DC2626/FFFFFF?text=Kids+Bedroom',NULL),(9,8,'https://via.placeholder.com/600x400/7C2D12/FFFFFF?text=Modern+Living',NULL),(10,8,'https://via.placeholder.com/600x400/1D4ED8/FFFFFF?text=Pool+Area',NULL),(11,9,'https://via.placeholder.com/600x400/92400E/FFFFFF?text=Cottage+Interior',NULL),(12,9,'https://via.placeholder.com/600x400/166534/FFFFFF?text=Private+Courtyard',NULL),(13,10,'https://via.placeholder.com/600x400/1E40AF/FFFFFF?text=Executive+Living',NULL),(14,10,'https://via.placeholder.com/600x400/7C3AED/FFFFFF?text=City+Views',NULL),(15,11,'https://via.placeholder.com/600x400/059669/FFFFFF?text=Budget+Living',NULL),(16,11,'https://via.placeholder.com/600x400/D97706/FFFFFF?text=Simple+Kitchen',NULL),(17,12,'https://via.placeholder.com/600x400/0891B2/FFFFFF?text=Townhouse+Living',NULL),(18,12,'https://via.placeholder.com/600x400/65A30D/FFFFFF?text=Private+Garden',NULL),(19,11,'https://via.placeholder.com/600x400/0891B2/FFFFFF?text=Family+House+Exterior',NULL),(20,11,'https://via.placeholder.com/600x400/65A30D/FFFFFF?text=Spacious+Garden',NULL),(21,11,'https://via.placeholder.com/600x400/DC2626/FFFFFF?text=Open+Living+Area',NULL),(22,12,'https://via.placeholder.com/600x400/7C2D12/FFFFFF?text=Modern+Apartment',NULL),(23,12,'https://via.placeholder.com/600x400/1D4ED8/FFFFFF?text=Swimming+Pool',NULL),(24,13,'https://via.placeholder.com/600x400/92400E/FFFFFF?text=Charming+Cottage',NULL),(25,13,'https://via.placeholder.com/600x400/166534/FFFFFF?text=Cozy+Interior',NULL),(26,14,'https://via.placeholder.com/600x400/1E40AF/FFFFFF?text=Executive+Suite',NULL),(27,14,'https://via.placeholder.com/600x400/7C3AED/FFFFFF?text=Premium+Finishes',NULL),(28,15,'https://via.placeholder.com/600x400/059669/FFFFFF?text=Affordable+Living',NULL),(29,15,'https://via.placeholder.com/600x400/D97706/FFFFFF?text=Practical+Layout',NULL),(30,16,'https://via.placeholder.com/600x400/0891B2/FFFFFF?text=Spacious+Townhouse',NULL),(31,16,'https://via.placeholder.com/600x400/65A30D/FFFFFF?text=Private+Courtyard',NULL),(32,1,'https://via.placeholder.com/600x400/1E40AF/FFFFFF?text=Modern+Apartment+Living',NULL),(33,1,'https://via.placeholder.com/600x400/7C3AED/FFFFFF?text=Surry+Hills+Location',NULL),(34,2,'https://via.placeholder.com/600x400/059669/FFFFFF?text=Spacious+House+Exterior',NULL),(35,2,'https://via.placeholder.com/600x400/D97706/FFFFFF?text=Family+Living+Room',NULL),(36,2,'https://via.placeholder.com/600x400/DC2626/FFFFFF?text=Newtown+Neighborhood',NULL),(37,3,'https://via.placeholder.com/600x400/0891B2/FFFFFF?text=Luxury+Studio+Interior',NULL),(38,3,'https://via.placeholder.com/600x400/65A30D/FFFFFF?text=CBD+City+Views',NULL),(39,4,'https://via.placeholder.com/600x400/7C2D12/FFFFFF?text=Family+Home+Exterior',NULL),(40,4,'https://via.placeholder.com/600x400/1D4ED8/FFFFFF?text=Bondi+Beach+Location',NULL),(41,4,'https://via.placeholder.com/600x400/92400E/FFFFFF?text=Spacious+Backyard',NULL);
/*!40000 ALTER TABLE `property_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_searches`
--

DROP TABLE IF EXISTS `user_searches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_searches` (
  `id` int NOT NULL AUTO_INCREMENT,
  `session_id` varchar(100) DEFAULT NULL,
  `work_address` varchar(500) DEFAULT NULL,
  `work_lat` decimal(10,8) DEFAULT NULL,
  `work_lng` decimal(11,8) DEFAULT NULL,
  `max_bedrooms` int DEFAULT NULL,
  `min_bedrooms` int DEFAULT NULL,
  `max_bathrooms` int DEFAULT NULL,
  `min_bathrooms` int DEFAULT NULL,
  `min_parking` int DEFAULT NULL,
  `requires_aircon` tinyint(1) DEFAULT NULL,
  `flooring_preference` varchar(100) DEFAULT NULL,
  `max_price` decimal(10,2) DEFAULT NULL,
  `max_commute_time` int DEFAULT NULL,
  `transport_mode` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_searches`
--

LOCK TABLES `user_searches` WRITE;
/*!40000 ALTER TABLE `user_searches` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_searches` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-10-01  2:22:36
