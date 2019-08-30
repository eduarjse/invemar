-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para prueba_invemar
CREATE DATABASE IF NOT EXISTS `prueba_invemar` /*!40100 DEFAULT CHARACTER SET utf32 */;
USE `prueba_invemar`;

-- Volcando estructura para tabla prueba_invemar.avistamiento
CREATE TABLE IF NOT EXISTS `avistamiento` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `especie` bigint(20) DEFAULT NULL,
  `lugar` bigint(20) DEFAULT NULL,
  `latitud` float DEFAULT NULL,
  `longitud` float DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `observacion` text,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `especie` (`especie`),
  KEY `lugar` (`lugar`),
  CONSTRAINT `avistamiento_ibfk_1` FOREIGN KEY (`especie`) REFERENCES `especie` (`ID`),
  CONSTRAINT `avistamiento_ibfk_2` FOREIGN KEY (`lugar`) REFERENCES `lugar` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf32;

-- Volcando datos para la tabla prueba_invemar.avistamiento: ~2 rows (aproximadamente)
DELETE FROM `avistamiento`;
/*!40000 ALTER TABLE `avistamiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `avistamiento` ENABLE KEYS */;

-- Volcando estructura para tabla prueba_invemar.especie
CREATE TABLE IF NOT EXISTS `especie` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_comun` varchar(255) DEFAULT NULL,
  `nombre_cientifico` varchar(255) DEFAULT NULL,
  `familia` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf32;

-- Volcando datos para la tabla prueba_invemar.especie: ~2 rows (aproximadamente)
DELETE FROM `especie`;
/*!40000 ALTER TABLE `especie` DISABLE KEYS */;
/*!40000 ALTER TABLE `especie` ENABLE KEYS */;

-- Volcando estructura para tabla prueba_invemar.lugar
CREATE TABLE IF NOT EXISTS `lugar` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `pais` varchar(255) DEFAULT NULL,
  `departamento` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf32;

-- Volcando datos para la tabla prueba_invemar.lugar: ~0 rows (aproximadamente)
DELETE FROM `lugar`;
/*!40000 ALTER TABLE `lugar` DISABLE KEYS */;
/*!40000 ALTER TABLE `lugar` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
