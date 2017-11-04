
--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;

CREATE TABLE `people` (
  `ID_PEOPLE` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `LASTNAME` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `PHONE` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CPF` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID_PEOPLE`),
  UNIQUE KEY `CPF` (`CPF`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `people` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `ID_PRODUCTS` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PRICE` float(11,2) DEFAULT NULL,
  PRIMARY KEY (`ID_PRODUCTS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `products` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `ID_USERS` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `EMAIL` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PASSWORD` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_USERS`),
  UNIQUE KEY `EMAIL` (`EMAIL`),
  UNIQUE KEY `NAME_UNIQUE` (`NAME`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;
INSERT INTO `users` VALUES (1,'tommye','tommy_vinicius@hotmail.com','ee76423bb68398c5d417d4f0bc7c976ef958461c','2017-10-23 14:17:16','2017-10-23 14:17:16'),(2,'Admin','admin@admin.com','26e6830b37958296926fa5eebdfa8f152b515fdc','2017-10-25 09:06:01','2017-10-25 09:06:01');
UNLOCK TABLES;

-- Dump completed on 2017-10-25 11:30:05
