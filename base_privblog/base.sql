-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.19-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para privblog
CREATE DATABASE IF NOT EXISTS `privblog` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `privblog`;

-- Volcando estructura para tabla privblog.asoc_categoria_entrada
CREATE TABLE IF NOT EXISTS `asoc_categoria_entrada` (
  `id_categoria` int(11) NOT NULL,
  `id_entrada` int(11) NOT NULL,
  PRIMARY KEY (`id_categoria`,`id_entrada`),
  KEY `FK__entrada` (`id_entrada`),
  CONSTRAINT `FK__categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__entrada` FOREIGN KEY (`id_entrada`) REFERENCES `entrada` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla privblog.asoc_categoria_entrada: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `asoc_categoria_entrada` DISABLE KEYS */;
INSERT INTO `asoc_categoria_entrada` (`id_categoria`, `id_entrada`) VALUES
	(13, 8),
	(14, 9);
/*!40000 ALTER TABLE `asoc_categoria_entrada` ENABLE KEYS */;

-- Volcando estructura para tabla privblog.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` char(50) NOT NULL,
  `autor` char(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_categoria_persona` (`autor`),
  CONSTRAINT `FK_categoria_persona` FOREIGN KEY (`autor`) REFERENCES `persona` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla privblog.categoria: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`id`, `nombre`, `autor`) VALUES
	(13, 'naturaleza', 'carlos'),
	(14, 'reflexiones', 'carlos'),
	(26, 'código', 'carlos'),
	(28, 'informática', 'carlos'),
	(35, 'arquitectura', 'carlos'),
	(37, 'arquitectura románica', 'carlos'),
	(38, 'animales', 'carlos');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;

-- Volcando estructura para tabla privblog.entrada
CREATE TABLE IF NOT EXISTS `entrada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` char(50) DEFAULT NULL,
  `texto` varchar(10000) NOT NULL DEFAULT '',
  `autor` char(50) NOT NULL,
  `imagen` varchar(500) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_entrada_persona` (`autor`),
  CONSTRAINT `FK_entrada_persona` FOREIGN KEY (`autor`) REFERENCES `persona` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla privblog.entrada: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `entrada` DISABLE KEYS */;
INSERT INTO `entrada` (`id`, `titulo`, `texto`, `autor`, `imagen`, `fecha`) VALUES
	(8, 'Primera entrada', 'Vivamus ac dui dolor. Proin euismod viverra velit, et convallis ex volutpat a. Pellentesque pretium arcu sit amet hendrerit malesuada. Nunc pulvinar pellentesque justo. Donec in ornare ante, ut vehicula purus. Vivamus sagittis, erat blandit vehicula viverra, mauris felis posuere ex, sed rhoncus felis lorem a purus. Pellentesque eget erat vehicula ipsum pellentesque vestibulum. Fusce imperdiet enim vitae nisi aliquam, eu posuere nunc rhoncus. Aliquam tortor arcu, ultricies quis facilisis vitae, aliquam vitae nunc. Donec mattis sem dapibus ultrices semper. Aenean ut elit vel arcu mattis pretium. Integer sollicitudin commodo ligula, in imperdiet orci varius eget.\r\n\r\nNulla tincidunt hendrerit euismod. Proin tempor urna dapibus tempor bibendum. Etiam porttitor congue tristique. Mauris sit amet justo ac nibh cursus tempus sed id risus. Donec luctus purus justo, vitae sagittis lorem sagittis a. Phasellus elementum lobortis mi sed auctor. Donec congue rhoncus faucibus. Maecenas rutrum eros eget rhoncus maximus. Pellentesque laoreet eros sed augue tincidunt pellentesque. Aliquam erat volutpat. Etiam molestie ex dignissim turpis blandit bibendum. Nullam ut massa id magna porttitor consectetur. Mauris efficitur lacus massa, a vestibulum dolor ultricies vitae. Integer sed augue dapibus, lobortis libero egestas, venenatis dui.\r\n\r\nDonec justo felis, rhoncus ut varius finibus, efficitur vitae eros. Aliquam erat volutpat. Duis tortor augue, tincidunt tincidunt aliquet at, vehicula quis turpis. Donec hendrerit aliquam cursus. Nulla tincidunt enim id sapien elementum, in mollis quam venenatis. Sed quis ex pulvinar, pharetra mauris eu, accumsan leo. Quisque eget nulla justo. Proin condimentum volutpat scelerisque. Vivamus vehicula augue sit amet erat auctor pellentesque. Quisque eu faucibus purus. Morbi dapibus erat a arcu faucibus, pretium ornare diam efficitur. Sed posuere mattis enim, ac porta odio tincidunt sed. Aliquam quis tellus libero. Praesent justo erat, egestas eget vehicula et, placerat consequat metus. Nullam lacinia velit at risus varius placerat.', 'carlos', 'any (1).jpg', '2021-05-05 11:11:06'),
	(9, 'Segunda entrada', 'Morbi tempus ornare semper. Maecenas luctus lorem non nulla dictum porttitor. Aenean porta lorem leo, in aliquet neque facilisis eget. Proin quis ipsum sit amet arcu convallis bibendum. Vestibulum vel blandit leo. Phasellus suscipit nec dolor vitae vulputate. Pellentesque in lectus suscipit justo faucibus semper. Donec quis nibh nec mauris tincidunt fringilla id hendrerit nisi. Aenean vehicula id turpis eget iaculis. Donec sollicitudin justo sit amet tellus dictum, sit amet venenatis tortor pharetra. Mauris rhoncus dui aliquam odio elementum commodo. Quisque porta tortor vel metus venenatis porta. Sed egestas eros sapien, et lacinia eros mattis imperdiet.\r\n\r\nVivamus ac dui dolor. Proin euismod viverra velit, et convallis ex volutpat a. Pellentesque pretium arcu sit amet hendrerit malesuada. Nunc pulvinar pellentesque justo. Donec in ornare ante, ut vehicula purus. Vivamus sagittis, erat blandit vehicula viverra, mauris felis posuere ex, sed rhoncus felis lorem a purus. Pellentesque eget erat vehicula ipsum pellentesque vestibulum. Fusce imperdiet enim vitae nisi aliquam, eu posuere nunc rhoncus. Aliquam tortor arcu, ultricies quis facilisis vitae, aliquam vitae nunc. Donec mattis sem dapibus ultrices semper. Aenean ut elit vel arcu mattis pretium. Integer sollicitudin commodo ligula, in imperdiet orci varius eget.', 'carlos', 'reflexiones.jpg', '2021-06-05 11:12:15');
/*!40000 ALTER TABLE `entrada` ENABLE KEYS */;

-- Volcando estructura para tabla privblog.persona
CREATE TABLE IF NOT EXISTS `persona` (
  `nombre` char(50) NOT NULL,
  `pass` varchar(2000) NOT NULL,
  `perfil` char(50) NOT NULL DEFAULT 'usuario',
  `sexo` char(50) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `fecha_registro` date NOT NULL DEFAULT curdate(),
  `email` char(50) NOT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla privblog.persona: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` (`nombre`, `pass`, `perfil`, `sexo`, `fecha_nacimiento`, `fecha_registro`, `email`) VALUES
	('admin', '$2y$10$ngbXQDI38L9Rrut5aUJjP.JpcbvK8RrQRCU0a8LzjLGiGQ2ZDF9Y6', 'administrador', NULL, NULL, '2021-06-05', 'admin2@correo.com'),
	('carlos', '$2y$10$T0bSf.0oP/UacWKRRW/5pOtfgs.Cn584xEsG6D5C6KopeGpd6YRlS', 'usuario', 'hombre', '1990-06-30', '2021-06-01', 'carlos@nuevoemail.com');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
