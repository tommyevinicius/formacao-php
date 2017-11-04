CREATE DATABASE  IF NOT EXISTS `formacao` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `formacao`;

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

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `ID_PRODUCTS` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PRICE` float(11,2) DEFAULT NULL,
  PRIMARY KEY (`ID_PRODUCTS`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `products` WRITE;
INSERT INTO `products` VALUES (1,'Notebook',1499.99),(2,'Mouse',74.00),(3,'Teclado',159.89),(4,'Fone de ouvido',89.49);
UNLOCK TABLES;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `ID_USERS` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PASSWORD` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `AVATAR` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_USERS`),
  UNIQUE KEY `EMAIL` (`EMAIL`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;
INSERT INTO `users` VALUES (1,'Admin','admin@admin.com','26e6830b37958296926fa5eebdfa8f152b515fdc',NULL,'2017-10-31 09:11:45','2017-10-31 09:11:45'),(2,'Tommye','tommy_vinicius@hotmail.com','4556ca6b8aacdf6373ad61703f692e5847bc4c9d',NULL,'2017-10-31 09:13:06','2017-10-31 09:13:06');
UNLOCK TABLES;
