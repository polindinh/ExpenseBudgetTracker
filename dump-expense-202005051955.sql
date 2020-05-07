-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: localhost    Database: expense
-- ------------------------------------------------------
-- Server version	5.7.30-0ubuntu0.18.04.1

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
-- Table structure for table `budgets`
--

DROP TABLE IF EXISTS `budgets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `budgets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `budgets`
--

LOCK TABLES `budgets` WRITE;
/*!40000 ALTER TABLE `budgets` DISABLE KEYS */;
INSERT INTO `budgets` VALUES (1,'1','12.11','1','1','2020-04-29 10:13:17','2020-04-29 10:01:20','2020-04-29 10:13:17'),(2,'1','15','1','1',NULL,'2020-04-29 10:13:30','2020-04-29 12:56:24'),(3,'2','12.8','1','1',NULL,'2020-04-29 11:36:55','2020-04-29 12:52:52');
/*!40000 ALTER TABLE `budgets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Dinner','1',NULL,NULL,NULL,NULL),(2,'phone','1','1',NULL,'2020-04-29 11:34:14','2020-04-29 11:34:14');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `currencies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currencies`
--

LOCK TABLES `currencies` WRITE;
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` VALUES (1,'Leke','ALL','Lek',NULL,NULL),(2,'Dollars','USD','$',NULL,NULL),(3,'Afghanis','AFN','؋',NULL,NULL),(4,'Pesos','ARS','$',NULL,NULL),(5,'Guilders','AWG','ƒ',NULL,NULL),(6,'Dollars','AUD','$',NULL,NULL),(7,'New Manats','AZN','ман',NULL,NULL),(8,'Dollars','BSD','$',NULL,NULL),(9,'Dollars','BBD','$',NULL,NULL),(10,'Rubles','BYR','p.',NULL,NULL),(11,'Euro','EUR','€',NULL,NULL),(12,'Dollars','BZD','BZ$',NULL,NULL),(13,'Dollars','BMD','$',NULL,NULL),(14,'Bolivianos','BOB','$b',NULL,NULL),(15,'Convertible Marka','BAM','KM',NULL,NULL),(16,'Pula','BWP','P',NULL,NULL),(17,'Leva','BGN','лв',NULL,NULL),(18,'Reais','BRL','R$',NULL,NULL),(19,'Pounds','GBP','£',NULL,NULL),(20,'Dollars','BND','$',NULL,NULL),(21,'Riels','KHR','៛',NULL,NULL),(22,'Dollars','CAD','$',NULL,NULL),(23,'Dollars','KYD','$',NULL,NULL),(24,'Pesos','CLP','$',NULL,NULL),(25,'Yuan Renminbi','CNY','¥',NULL,NULL),(26,'Pesos','COP','$',NULL,NULL),(27,'Colón','CRC','₡',NULL,NULL),(28,'Kuna','HRK','kn',NULL,NULL),(29,'Pesos','CUP','₱',NULL,NULL),(30,'Koruny','CZK','Kč',NULL,NULL),(31,'Kroner','DKK','kr',NULL,NULL),(32,'Pesos','DOP ','RD$',NULL,NULL),(33,'Dollars','XCD','$',NULL,NULL),(34,'Pounds','EGP','£',NULL,NULL),(35,'Colones','SVC','$',NULL,NULL),(36,'Pounds','FKP','£',NULL,NULL),(37,'Dollars','FJD','$',NULL,NULL),(38,'Cedis','GHC','¢',NULL,NULL),(39,'Pounds','GIP','£',NULL,NULL),(40,'Quetzales','GTQ','Q',NULL,NULL),(41,'Pounds','GGP','£',NULL,NULL),(42,'Dollars','GYD','$',NULL,NULL),(43,'Lempiras','HNL','L',NULL,NULL),(44,'Dollars','HKD','$',NULL,NULL),(45,'Forint','HUF','Ft',NULL,NULL),(46,'Kronur','ISK','kr',NULL,NULL),(47,'Rupees','INR','Rp',NULL,NULL),(48,'Rupiahs','IDR','Rp',NULL,NULL),(49,'Rials','IRR','﷼',NULL,NULL),(50,'Pounds','IMP','£',NULL,NULL),(51,'New Shekels','ILS','₪',NULL,NULL),(52,'Dollars','JMD','J$',NULL,NULL),(53,'Yen','JPY','¥',NULL,NULL),(54,'Pounds','JEP','£',NULL,NULL),(55,'Tenge','KZT','лв',NULL,NULL),(56,'Won','KPW','₩',NULL,NULL),(57,'Won','KRW','₩',NULL,NULL),(58,'Soms','KGS','лв',NULL,NULL),(59,'Kips','LAK','₭',NULL,NULL),(60,'Lati','LVL','Ls',NULL,NULL),(61,'Pounds','LBP','£',NULL,NULL),(62,'Dollars','LRD','$',NULL,NULL),(63,'Switzerland Francs','CHF','CHF',NULL,NULL),(64,'Litai','LTL','Lt',NULL,NULL),(65,'Denars','MKD','ден',NULL,NULL),(66,'Ringgits','MYR','RM',NULL,NULL),(67,'Rupees','MUR','₨',NULL,NULL),(68,'Pesos','MXN','$',NULL,NULL),(69,'Tugriks','MNT','₮',NULL,NULL),(70,'Meticais','MZN','MT',NULL,NULL),(71,'Dollars','NAD','$',NULL,NULL),(72,'Rupees','NPR','₨',NULL,NULL),(73,'Guilders','ANG','ƒ',NULL,NULL),(74,'Dollars','NZD','$',NULL,NULL),(75,'Cordobas','NIO','C$',NULL,NULL),(76,'Nairas','NGN','₦',NULL,NULL),(77,'Krone','NOK','kr',NULL,NULL),(78,'Rials','OMR','﷼',NULL,NULL),(79,'Rupees','PKR','₨',NULL,NULL),(80,'Balboa','PAB','B/.',NULL,NULL),(81,'Guarani','PYG','Gs',NULL,NULL),(82,'Nuevos Soles','PEN','S/.',NULL,NULL),(83,'Pesos','PHP','Php',NULL,NULL),(84,'Zlotych','PLN','zł',NULL,NULL),(85,'Rials','QAR','﷼',NULL,NULL),(86,'New Lei','RON','lei',NULL,NULL),(87,'Rubles','RUB','руб',NULL,NULL),(88,'Pounds','SHP','£',NULL,NULL),(89,'Riyals','SAR','﷼',NULL,NULL),(90,'Dinars','RSD','Дин.',NULL,NULL),(91,'Rupees','SCR','₨',NULL,NULL),(92,'Dollars','SGD','$',NULL,NULL),(93,'Dollars','SBD','$',NULL,NULL),(94,'Shillings','SOS','S',NULL,NULL),(95,'Rand','ZAR','R',NULL,NULL),(96,'Rupees','LKR','₨',NULL,NULL),(97,'Kronor','SEK','kr',NULL,NULL),(98,'Dollars','SRD','$',NULL,NULL),(99,'Pounds','SYP','£',NULL,NULL),(100,'New Dollars','TWD','NT$',NULL,NULL),(101,'Baht','THB','฿',NULL,NULL),(102,'Dollars','TTD','TT$',NULL,NULL),(103,'Lira','TRY','₺',NULL,NULL),(104,'Liras','TRL','£',NULL,NULL),(105,'Dollars','TVD','$',NULL,NULL),(106,'Hryvnia','UAH','₴',NULL,NULL),(107,'Pesos','UYU','$U',NULL,NULL),(108,'Sums','UZS','лв',NULL,NULL),(109,'Bolivares Fuertes','VEF','Bs',NULL,NULL),(110,'Dong','VND','₫',NULL,NULL),(111,'Rials','YER','﷼',NULL,NULL),(112,'Zimbabwe Dollars','ZWD','Z$',NULL,NULL),(113,'Rupees','INR','₹',NULL,NULL);
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_04_28_170600_category_table',1),(5,'2020_04_28_173845_budget_table',1),(6,'2020_04_29_163451_create_transactions_table',2),(7,'2020_05_05_060416_create_currencies_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,'munna','1','0.07','expense','2020-04-29','1','1','2020-04-29 12:18:30','2020-04-29 10:52:44','2020-04-29 12:18:30'),(2,'Basic column','1','0.08','income','2020-04-29','1','1','2020-04-29 12:18:43','2020-04-29 11:14:04','2020-04-29 12:18:43'),(3,'Basic column','1','9.00','expense','2020-04-29','1','1',NULL,'2020-04-29 11:34:14','2020-04-29 12:23:33'),(4,'vjfghjhgfj','1','11.00','expense','2020-04-30','1','1','2020-04-29 12:18:50','2020-04-29 12:00:23','2020-04-29 12:18:50'),(5,'vjfghjhgfj','1','0.03','expense','2020-04-30','1','1',NULL,'2020-04-29 12:02:32','2020-04-29 12:02:32'),(6,'need a web developer','1','0.01','expense','2020-04-30','1','1','2020-04-29 12:19:30','2020-04-29 12:02:57','2020-04-29 12:19:30'),(7,'vjfghjhgfj','2','1.00','expense','2020-04-30','1','1','2020-04-29 13:02:02','2020-04-29 12:04:05','2020-04-29 13:02:02'),(8,'Basic column','2','2.50','expense','2020-04-30','1','1','2020-04-29 13:02:10','2020-04-29 12:30:49','2020-04-29 13:02:10'),(9,'need a web developer','1','3.00','expense','2020-04-30','1','1',NULL,'2020-04-29 12:44:05','2020-04-29 12:44:05'),(10,'munna','2','4.00','expense','2020-04-30','1','1',NULL,'2020-04-29 13:21:45','2020-04-29 13:21:45'),(11,'need a web developer','2','0.06','expense','2020-04-30','1','1',NULL,'2020-04-30 08:25:19','2020-04-30 08:25:19'),(12,'vjfghjhgfj','1','10.00','expense','2020-04-30','1','1','2020-05-04 23:56:26','2020-04-30 09:43:51','2020-05-04 23:56:26'),(13,'vjfghjhgfj','1','1.00','income','2020-04-30','1','1',NULL,'2020-04-30 10:33:07','2020-04-30 10:33:07'),(14,'vjfghjhgfj','1','2.00','expense','2020-05-03','1','1','2020-05-04 23:57:31','2020-05-02 22:07:05','2020-05-04 23:57:31'),(15,'vjfghjhgfj','1','2.00','expense','2020-05-03','1','1','2020-05-04 23:59:06','2020-05-02 22:07:08','2020-05-04 23:59:06'),(16,'vjfghjhgfj','1','2.00','expense','2020-05-03','1','1','2020-05-05 00:01:04','2020-05-02 22:07:11','2020-05-05 00:01:04'),(17,'vjfghjhgfj','1','2.00','expense','2020-05-03','1','1','2020-05-05 00:01:09','2020-05-02 22:07:13','2020-05-05 00:01:09'),(18,'vjfghjhgfj','1','2.00','expense','2020-05-02','1','1',NULL,'2020-05-02 22:07:18','2020-05-02 22:07:18'),(19,'vjfghjhgfj','1','2.00','expense','2020-05-02','1','1','2020-05-04 23:56:21','2020-05-02 22:07:20','2020-05-04 23:56:21'),(20,'vjfghjhgfj','1','2.00','expense','2020-05-02','1','1',NULL,'2020-05-02 22:07:22','2020-05-02 22:07:22'),(21,'vjfghjhgfj','1','2.00','expense','2020-05-02','1','1',NULL,'2020-05-02 22:07:24','2020-05-02 22:07:24'),(22,'vjfghjhgfj','1','2.00','expense','2020-05-02','1','1',NULL,'2020-05-02 22:07:26','2020-05-02 22:07:26'),(23,'vjfghjhgfj','1','2.00','expense','2020-05-02','1','1',NULL,'2020-05-02 22:07:29','2020-05-02 22:07:29'),(24,'vjfghjhgfj','1','2.00','expense','2020-05-02','1','1',NULL,'2020-05-02 22:07:31','2020-05-02 22:07:31');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Mahmudul Hasan','admin@mail.com',NULL,'$2y$10$3aj3p5c77fo/joUzY4s7pO.Ia9ULqu.4WlJ1W.6YYpihU0PhpSg2O','2',NULL,NULL,'1',NULL,'2020-04-29 10:00:03','2020-05-05 06:05:09'),(2,'Mahmudul Hasan','engrmunnakhan@gmail.com',NULL,'$2y$10$oHj.dBowoo0pmsfxerUHOeJpIbnPYFVrOrmLW8p.s3dgag7n5T4Rm','2',NULL,NULL,'1',NULL,'2020-05-05 07:47:01','2020-05-05 07:47:15'),(3,'Mahmudul Hasan','rmunnakhan@gmail.com',NULL,'$2y$10$ar4BH7.R0GJbI.nz5E3Yve.tH3QYBRqBmAxehpY4omQU7HxN8qD96','11',NULL,NULL,'1',NULL,'2020-05-05 07:49:45','2020-05-05 07:49:45');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'expense'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-05 19:55:35
