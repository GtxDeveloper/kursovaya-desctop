-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.0.30 - MySQL Community Server - GPL
-- Операционная система:         Win64
-- HeidiSQL Версия:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Дамп структуры базы данных webuildDB
CREATE DATABASE IF NOT EXISTS `webuildDB` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `webuildDB`;

-- Дамп структуры для таблица webuildDB.navigation
CREATE TABLE IF NOT EXISTS `navigation` (
  `Id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `href` varchar(256) NOT NULL,
  `order` int unsigned DEFAULT '1',
  `parentId` int unsigned DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `parentId` (`parentId`),
  CONSTRAINT `navigation_ibfk_1` FOREIGN KEY (`parentId`) REFERENCES `navigation` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы webuildDB.navigation: ~10 rows (приблизительно)
INSERT INTO `navigation` (`Id`, `title`, `href`, `order`, `parentId`) VALUES
	(1, 'Главная', '/', 1, NULL),
	(2, 'Услуги', '/services', 2, NULL),
	(3, 'Проекты', '/projects', 3, NULL),
	(4, 'О нас', '/about', 4, NULL),
	(5, 'Связаться  с нами', '/about/contactus', 1, 4),
	(6, 'Блог', '/blog', 1, NULL),
	(7, 'Индивидуальные проекты', '/blog/indprojects', 1, 6),
	(8, 'Дома из кирпича', '/blog/brickhouses', 2, 6),
	(9, 'Дома из газоблока', '/blog/gasblockhouses', 3, 6),
	(10, 'Дома из соломы', '/blog/strawhouses', 4, 6);

-- Дамп структуры для таблица webuildDB.options
CREATE TABLE IF NOT EXISTS `options` (
  `Id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `value` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `relation` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы webuildDB.options: ~5 rows (приблизительно)
INSERT INTO `options` (`Id`, `name`, `value`, `relation`) VALUES
	(1, 'title', 'WEBUILD - строительство домов из соломы', NULL),
	(3, 'address', '<p><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York, USA</p>', 'contact-info'),
	(4, 'phone', '<p><i class="fa fa-phone-alt me-2"></i>+012 345 67890</p>', 'contact-info'),
	(5, 'email', '<p><i class="fa fa-envelope me-2"></i>info@example.com</p>', 'contact-info'),
	(6, 'description', 'Соломенный дом – это относительно новая технология строительства эко-домов, которая отлично подходит для тех, кто хочет окружить себя и близких только натуральными и качественными материалами. ', NULL);

-- Дамп структуры для таблица webuildDB.userMessages
CREATE TABLE IF NOT EXISTS `userMessages` (
  `Id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  `email` varchar(128) NOT NULL,
  `subject` varchar(128) NOT NULL,
  `message` varchar(2048) NOT NULL,
  `dateOfCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `isReacted` tinyint DEFAULT '0',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы webuildDB.userMessages: ~1 rows (приблизительно)
INSERT INTO `userMessages` (`Id`, `name`, `email`, `subject`, `message`, `dateOfCreated`, `isReacted`) VALUES
	(1, 'alex', 'alex@alex.com', 'tema', 'versache', '2024-10-17 20:42:12', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
