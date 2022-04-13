-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.37 - MySQL Community Server (GPL)
-- SO del servidor:              Linux
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para Deployment
CREATE DATABASE IF NOT EXISTS `Deployment` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `Deployment`;

-- Volcando estructura para tabla Deployment.Ambiente
CREATE TABLE IF NOT EXISTS `Ambiente` (
  `idAmbiente` int(11) NOT NULL AUTO_INCREMENT,
  `nomb_amb` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idAmbiente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla Deployment.Ambiente: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `Ambiente` DISABLE KEYS */;
INSERT INTO `Ambiente` (`idAmbiente`, `nomb_amb`) VALUES
	(2, 'development');
/*!40000 ALTER TABLE `Ambiente` ENABLE KEYS */;

-- Volcando estructura para tabla Deployment.cargo
CREATE TABLE IF NOT EXISTS `cargo` (
  `idCargo` int(11) NOT NULL AUTO_INCREMENT,
  `nomb_cargo` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`idCargo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla Deployment.cargo: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` (`idCargo`, `nomb_cargo`) VALUES
	(1, 'Product Owner'),
	(2, 'Cloud');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;

-- Volcando estructura para tabla Deployment.Desarollador
CREATE TABLE IF NOT EXISTS `Desarollador` (
  `idDesarollador` int(11) NOT NULL AUTO_INCREMENT,
  `nomb_desa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idDesarollador`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla Deployment.Desarollador: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `Desarollador` DISABLE KEYS */;
INSERT INTO `Desarollador` (`idDesarollador`, `nomb_desa`) VALUES
	(1, 'Jairo Gomez'),
	(2, 'Fabian Molanos');
/*!40000 ALTER TABLE `Desarollador` ENABLE KEYS */;

-- Volcando estructura para tabla Deployment.Despliegue
CREATE TABLE IF NOT EXISTS `Despliegue` (
  `idDesp` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  `FK_AMB` int(11) DEFAULT NULL,
  `FK_DESA` int(11) DEFAULT NULL,
  `FK_DEVO` int(11) DEFAULT NULL,
  `FK_LAYE` int(11) DEFAULT NULL,
  `FK_PRO` int(11) DEFAULT NULL,
  `FK_RAMA` int(11) DEFAULT NULL,
  `FK_SERV` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDesp`),
  KEY `FK_Despliegue_Ambiente` (`FK_AMB`),
  KEY `FK_Despliegue_Desarollador` (`FK_DESA`),
  KEY `FK_Despliegue_Devops` (`FK_DEVO`),
  KEY `FK_Despliegue_Layer` (`FK_LAYE`),
  KEY `FK_Despliegue_Proyecto` (`FK_PRO`),
  KEY `FK_Despliegue_Rama` (`FK_RAMA`),
  KEY `FK_Despliegue_Servidor` (`FK_SERV`),
  CONSTRAINT `FK_Despliegue_Ambiente` FOREIGN KEY (`FK_AMB`) REFERENCES `Ambiente` (`idAmbiente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_Despliegue_Desarollador` FOREIGN KEY (`FK_DESA`) REFERENCES `Desarollador` (`idDesarollador`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_Despliegue_Devops` FOREIGN KEY (`FK_DEVO`) REFERENCES `Devops` (`idDevops`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_Despliegue_Layer` FOREIGN KEY (`FK_LAYE`) REFERENCES `Layer` (`idLayer`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_Despliegue_Proyecto` FOREIGN KEY (`FK_PRO`) REFERENCES `Proyecto` (`idProyecto`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_Despliegue_Rama` FOREIGN KEY (`FK_RAMA`) REFERENCES `Rama` (`idRama`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_Despliegue_Servidor` FOREIGN KEY (`FK_SERV`) REFERENCES `Servidor` (`idServidor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla Deployment.Despliegue: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `Despliegue` DISABLE KEYS */;
INSERT INTO `Despliegue` (`idDesp`, `fecha`, `FK_AMB`, `FK_DESA`, `FK_DEVO`, `FK_LAYE`, `FK_PRO`, `FK_RAMA`, `FK_SERV`) VALUES
	(1, '2022-04-08 15:21:32', 2, 2, 2, 1, 1, 1, 2);
/*!40000 ALTER TABLE `Despliegue` ENABLE KEYS */;

-- Volcando estructura para tabla Deployment.Devops
CREATE TABLE IF NOT EXISTS `Devops` (
  `idDevops` int(11) NOT NULL AUTO_INCREMENT,
  `nomb_devo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idDevops`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla Deployment.Devops: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `Devops` DISABLE KEYS */;
INSERT INTO `Devops` (`idDevops`, `nomb_devo`) VALUES
	(2, 'Jonathan Bolaños'),
	(3, 'Camilo rodriguez');
/*!40000 ALTER TABLE `Devops` ENABLE KEYS */;

-- Volcando estructura para tabla Deployment.equipo
CREATE TABLE IF NOT EXISTS `equipo` (
  `idEquipo` int(11) NOT NULL AUTO_INCREMENT,
  `nomb_equipo` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`idEquipo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla Deployment.equipo: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `equipo` DISABLE KEYS */;
INSERT INTO `equipo` (`idEquipo`, `nomb_equipo`) VALUES
	(1, 'HP 245 G7'),
	(2, 'MAC 720');
/*!40000 ALTER TABLE `equipo` ENABLE KEYS */;

-- Volcando estructura para tabla Deployment.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla Deployment.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla Deployment.Inventario
CREATE TABLE IF NOT EXISTS `Inventario` (
  `idUsuaActivo` int(11) NOT NULL AUTO_INCREMENT,
  `FK_EQUI` int(11) DEFAULT NULL,
  `serial` text NOT NULL,
  `placa` text NOT NULL,
  `acta` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `observacion` text NOT NULL,
  `FK_U` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsuaActivo`),
  KEY `FK_Inventario_equipo` (`FK_EQUI`),
  KEY `FK_Inventario_usuario_inventario` (`FK_U`),
  CONSTRAINT `FK_Inventario_equipo` FOREIGN KEY (`FK_EQUI`) REFERENCES `equipo` (`idEquipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_Inventario_usuario_inventario` FOREIGN KEY (`FK_U`) REFERENCES `usuario_inventario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla Deployment.Inventario: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `Inventario` DISABLE KEYS */;
INSERT INTO `Inventario` (`idUsuaActivo`, `FK_EQUI`, `serial`, `placa`, `acta`, `observacion`, `FK_U`) VALUES
	(79, 1, 'sdadadas', 'sdsdsadasd', 1, 'SASDS', 92);
/*!40000 ALTER TABLE `Inventario` ENABLE KEYS */;

-- Volcando estructura para tabla Deployment.Layer
CREATE TABLE IF NOT EXISTS `Layer` (
  `idLayer` int(11) NOT NULL AUTO_INCREMENT,
  `layer` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idLayer`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla Deployment.Layer: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `Layer` DISABLE KEYS */;
INSERT INTO `Layer` (`idLayer`, `layer`) VALUES
	(1, 'Frontend'),
	(2, 'Backend');
/*!40000 ALTER TABLE `Layer` ENABLE KEYS */;

-- Volcando estructura para tabla Deployment.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla Deployment.migrations: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(22, '2014_10_12_000000_create_users_table', 1),
	(23, '2014_10_12_100000_create_password_resets_table', 1),
	(24, '2019_08_19_000000_create_failed_jobs_table', 1),
	(25, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(26, '2022_03_30_084243_create_user_verifies_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla Deployment.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla Deployment.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla Deployment.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla Deployment.personal_access_tokens: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Volcando estructura para tabla Deployment.Proyecto
CREATE TABLE IF NOT EXISTS `Proyecto` (
  `idProyecto` int(11) NOT NULL AUTO_INCREMENT,
  `nomb_proy` varchar(45) DEFAULT NULL,
  `FK_FB` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProyecto`),
  KEY `FK_Proyecto_Layer` (`FK_FB`),
  CONSTRAINT `FK_Proyecto_Layer` FOREIGN KEY (`FK_FB`) REFERENCES `Layer` (`idLayer`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla Deployment.Proyecto: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `Proyecto` DISABLE KEYS */;
INSERT INTO `Proyecto` (`idProyecto`, `nomb_proy`, `FK_FB`) VALUES
	(1, 'MIOS-PROD', 1);
/*!40000 ALTER TABLE `Proyecto` ENABLE KEYS */;

-- Volcando estructura para tabla Deployment.Rama
CREATE TABLE IF NOT EXISTS `Rama` (
  `idRama` int(11) NOT NULL AUTO_INCREMENT,
  `nomb_rama` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idRama`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla Deployment.Rama: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `Rama` DISABLE KEYS */;
INSERT INTO `Rama` (`idRama`, `nomb_rama`) VALUES
	(1, 'QA');
/*!40000 ALTER TABLE `Rama` ENABLE KEYS */;

-- Volcando estructura para tabla Deployment.Servidor
CREATE TABLE IF NOT EXISTS `Servidor` (
  `idServidor` int(11) NOT NULL AUTO_INCREMENT,
  `numb_serv` tinytext,
  PRIMARY KEY (`idServidor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla Deployment.Servidor: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `Servidor` DISABLE KEYS */;
INSERT INTO `Servidor` (`idServidor`, `numb_serv`) VALUES
	(2, '127.23.63.25');
/*!40000 ALTER TABLE `Servidor` ENABLE KEYS */;

-- Volcando estructura para tabla Deployment.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_email_verified` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla Deployment.users: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `type`, `phone`, `image`, `city`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_email_verified`) VALUES
	(67, 'adriana', 'development3022@gmail.com', 'Devops', '131312313123', '1648747148_01-cat-tail.jpg', 'cauca', NULL, '$2y$10$p13jBz6ilrS8as20Nkgh.en1yagvgql/AOLUXIRs8Uro/h08kRjoO', NULL, '2022-03-31 12:19:08', '2022-03-31 12:19:08', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Volcando estructura para tabla Deployment.users_verify
CREATE TABLE IF NOT EXISTS `users_verify` (
  `user_id` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla Deployment.users_verify: ~55 rows (aproximadamente)
/*!40000 ALTER TABLE `users_verify` DISABLE KEYS */;
INSERT INTO `users_verify` (`user_id`, `token`, `created_at`, `updated_at`) VALUES
	(1, 'v65qJeQxcDWHdHo1ejz09codByQTciRhG6IY99jAKTCFxIRZXzxlQOae4127jUae', '2022-03-30 09:22:59', '2022-03-30 09:22:59'),
	(3, 'mcoRknef3Sd7Ze5SiC4UStEdb4POOfihd3u8xped4blAd8K9LL3bshmx2Pv2XqqE', '2022-03-30 09:23:37', '2022-03-30 09:23:37'),
	(4, 'fA0U5xPi8oaDDQkAhfZIIQqrLauwOwvvn8fbdSpiVfIatlnnfTT6wat8J3E9ZiW6', '2022-03-30 09:25:50', '2022-03-30 09:25:50'),
	(5, 'VtPZgYpaju49rE5badN8oGIv8CeBL7WLQNMb5zIXClXNP15mqA6Nl1bchhNevHic', '2022-03-30 10:18:55', '2022-03-30 10:18:55'),
	(7, 'lFRolAXrXfUhQ4Okul0Aqx1ZxaJY8JE2p8Y5jeSM7a6ToJEpiRIWd24tUCd8d8Xi', '2022-03-30 10:23:44', '2022-03-30 10:23:44'),
	(8, 'joPuLmteTlvHsCYBwQ7H5fNxUZQJ5xkyCpo9ILEWO80KMkE1gYHfvPL28hvubDsL', '2022-03-30 10:24:20', '2022-03-30 10:24:20'),
	(9, 'ERpTX4VnUWPb4SewVYTwtidLSwD2LjZymauDXKAg0A6tQFnZpiUqnDd3AUMXI7Hd', '2022-03-30 10:26:12', '2022-03-30 10:26:12'),
	(11, '5iKOrLG4VrRXxgnAr7ITUPOAf5A2UPTFdLuDqzDtYzVQgzUZqvZfXQ1oNyp0jp1a', '2022-03-30 10:28:14', '2022-03-30 10:28:14'),
	(12, '0xrCPaL0E50oSfMwXj42UQHThqJcancInVUns7bmKy95VKY4AAoMg1qL9yxCyPur', '2022-03-30 10:30:11', '2022-03-30 10:30:11'),
	(14, 'UPgxrzmqOVKJTxJH5Zp5Ne2cffCJrfMetxlYQs4YgXqiuhCTzNEItIriFvGfWzvj', '2022-03-30 10:31:12', '2022-03-30 10:31:12'),
	(15, 'kUw7AsW1DfKqBNPns3VLVYfS9fGXS56gE9dZ1dumXaGbtl9MgSKYagepMiN1u72F', '2022-03-30 10:32:15', '2022-03-30 10:32:15'),
	(16, 'qjm4qv2V1w3RDG6JuBCj7HnjOifetUSk09zbapNFTXFjpx1YWC7A9396DqYTTeB0', '2022-03-30 10:34:54', '2022-03-30 10:34:54'),
	(17, 'TOLyLOKfGCTUUOKeD0jyFDAzYQ9Nxlpwe7QXESiG06YLdwQ2Ghxq9jir4026qXKb', '2022-03-30 10:36:04', '2022-03-30 10:36:04'),
	(18, 'Zvafczg7XrU5gvX8UmAfUGqZMtSNQ403UjOjCbmnp3wCPw8ZPLByKGp9Vw0kQ4Hv', '2022-03-30 10:36:55', '2022-03-30 10:36:55'),
	(19, 'hQU47XNRvnquiS8vaTZc9oHIVCIY2ByH8Uigli7kbGlSICD7W7jSKmlGhTfPttV3', '2022-03-30 10:47:32', '2022-03-30 10:47:32'),
	(20, '8BsLoS4pbScV09jWO4m7kjEuNzsL2BtSVMIHQkt4IeM11uzhfvtkjP0Uxkw4aARk', '2022-03-30 10:48:44', '2022-03-30 10:48:44'),
	(21, 'XFZcKnghPfFX18DxHY4fbYdFrsGKTQu4SOE3kVCT1HXDE84R0ncYsKNCdkNNu8Ep', '2022-03-30 10:50:21', '2022-03-30 10:50:21'),
	(22, 'QEQ9a9P7cD2PKWyTFw6lKzaqG5TqujnzL7mP7OhNQHhdV0q7YLu1eK0JfoGj4g4U', '2022-03-30 10:51:23', '2022-03-30 10:51:23'),
	(24, 'r3GZ7ekb226oQiaAn2zN6vVn24t79gmD3kQBi8VDxS7oUaZ4792XS6RCy2dcDaUm', '2022-03-30 10:54:05', '2022-03-30 10:54:05'),
	(25, 'AFHk6tMe5Bs7tpXWxRccVZBhxhjBifjCk1tG7Vo2a29XFtU4K6jvjcqrhxymoQIy', '2022-03-30 10:56:18', '2022-03-30 10:56:18'),
	(26, '554WfWgI8DkbL7zEP4M53QN6X15lwww8dpxvbZsyJJdBhKQojHtaYrpGdZY7vrZT', '2022-03-30 11:04:04', '2022-03-30 11:04:04'),
	(27, 'SMu8FeZBpMh8DkRGr7VYckzKSoEnvbdJBUP6EoklnenLuU40LjX6XUpAHzOcKQZN', '2022-03-30 11:06:12', '2022-03-30 11:06:12'),
	(28, 'NXDmY7gzyRXJQ20hhZymJcukwPh4thdnRkTdXx2rTuSVQ1Vft9kwcE6aXhMNUhDs', '2022-03-30 11:08:29', '2022-03-30 11:08:29'),
	(29, 'NFWQTThtBdZ3yWaZOc7QTYjyah1bV6zuyHdR4C83xuqspS9i5QQSPKDTuF7Zy9Ja', '2022-03-30 11:17:34', '2022-03-30 11:17:34'),
	(32, 'Vxa2N9Lt0K9tc8bVvdrgqAQkoDCinw8akO8VpfdqJqcyUbRbAtCsyzM5wQfwtj3H', '2022-03-30 11:18:23', '2022-03-30 11:18:23'),
	(33, 'B3fvt1hkvIPY70m2PfqXR2gvyltrFGuEaRmMvUrlwG1RetZ2iVKvzwZ6Ds5GeRlW', '2022-03-30 11:24:15', '2022-03-30 11:24:15'),
	(34, 'HmqqTHP3GPLTsodPBdkA5VhuzNLjaPSzwlMHM1TBekWLZbPBv8K3w5T1UdEhb4xB', '2022-03-30 11:25:24', '2022-03-30 11:25:24'),
	(35, 'vX7pRHH7GtL1yxmRaoujsYDLBP63o9sXViay0b3SD0FRcm7AYm1r5SQ7TYcgTq5w', '2022-03-30 11:28:16', '2022-03-30 11:28:16'),
	(36, '5PJpxpyLmvtSFETPVNhTWuwq6GI3Kt4polaGtI7QIjUmV0QPliXFNEOjgp93O8OO', '2022-03-30 11:31:01', '2022-03-30 11:31:01'),
	(37, 'D0qO996UYp26tIHdSFYmycR5g8hwfEzkQmHkEsM5H8FNDTGliDFsoyiFgNtc5lXx', '2022-03-30 11:34:30', '2022-03-30 11:34:30'),
	(38, '4Iyvz6poT7VRm0zy9wP79LPQiLZ3egljEaRVTlRhBl2vlVk5nVd86v6fuwmU0mu0', '2022-03-30 11:37:12', '2022-03-30 11:37:12'),
	(39, 'IDXf1F5wLbwU4IpqFaSaAfkLuLRVGdaDAE9YUTdCCGfAdsBjEb9DQDDcefcfgQmk', '2022-03-30 11:38:39', '2022-03-30 11:38:39'),
	(41, 'SO6377Mn30NAXMjWWqT5iiot379wLLhIOkkbIFaqkMTnh7abPCqZWmPfPEU8B9qI', '2022-03-30 11:40:52', '2022-03-30 11:40:52'),
	(42, 'La9sDcLmMhcRxRtx0ZgCBAW2cix0jj7cXDnvZs9l4x3pd1gJcGU9upQbqFm1pTqS', '2022-03-30 11:42:57', '2022-03-30 11:42:57'),
	(43, 'vt2j9s2oiWJuVgsW9HjLKEv6WjhnnaqtbJRnW1o5l356Vjl7GDOgOsGPXSHfkNPt', '2022-03-30 11:46:38', '2022-03-30 11:46:38'),
	(44, 'QXfyEDlEELgpcbGlXXQop7uOg1aj3U1MPrbbZWTuxgfvD8LzvUnRgpGMpI52RL39', '2022-03-30 11:51:48', '2022-03-30 11:51:48'),
	(46, 'XmqatWYDa6VpUVlpljwMQbjZjGdfGsa3m82mOzgrhh8gugI9CPxDuR6DVyOKiwGy', '2022-03-30 12:02:24', '2022-03-30 12:02:24'),
	(47, 'k24fi6GJ2p1Y6DGfN6p2sFMz0h3BgvjwNJiEv2PrV3RwaxnZ9kZumnBt0XWhar1c', '2022-03-30 12:13:21', '2022-03-30 12:13:21'),
	(48, 'yPgobXhj05kR2qqZb5rIiRJQnqTDgdlV1Z3mOD8iiKYKzSHNvYUn6NsH2Jdficeo', '2022-03-30 12:17:46', '2022-03-30 12:17:46'),
	(49, 'Gqd2JCUSuI7ZRuZzJAJKIqT95RFqJNiIM6kd9i3Yub9jtqia0kLM1980e5NiW1vT', '2022-03-30 12:19:26', '2022-03-30 12:19:26'),
	(50, 'LQKQHpSSdLksfgx7E29AjPRIGLqbyMt4IBWb39QAQanfHoMJTf8avD7NMiM1XxAj', '2022-03-30 14:31:30', '2022-03-30 14:31:30'),
	(51, 'OWRqM4eXedGraHrIWlp94f7h6hO4vjhdpm34HrO8isM601pVp5sxjYS7cN9KCnfL', '2022-03-30 14:33:52', '2022-03-30 14:33:52'),
	(53, 'GyaNISGGHpgX7bx9yurh6hGvtuDsshCfC7daidBrmowBUgn0ZcJNeqfrIte3Hv2i', '2022-03-30 14:39:12', '2022-03-30 14:39:12'),
	(54, 'wsxMlaoo69tRPd1p3wfKp3Uf6WQQ2O0fusx971KHxHq7yVzFiHRryQmP6tfScRIM', '2022-03-31 10:53:13', '2022-03-31 10:53:13'),
	(55, 'eQRE3PGW4omNvU1MKWxTD34dB5EfEDoTwETFoWzrPmioEr1mZF3VqDp23iVsFHVa', '2022-03-31 10:54:41', '2022-03-31 10:54:41'),
	(56, 'mnUsj4ORk5Xw7flhxvAZoxQ84miaFraoK7sAsEnHwlZGljzjGk3SBAq4hlDos3kM', '2022-03-31 11:00:17', '2022-03-31 11:00:17'),
	(57, 'gjJiL290vD4azcwBcCCfFdavdMbqDc2ZQUZh9PYutE824u0nF3APBUAdGT7OLrKZ', '2022-03-31 11:02:07', '2022-03-31 11:02:07'),
	(58, '2lORzZ6OcF7ewzMGYfVMjHlMM7iP0o0dNNC1jjy5iBYqgqyWdDgfmYMe3ytCEgZJ', '2022-03-31 11:03:10', '2022-03-31 11:03:10'),
	(59, 'rxpPtIU2qQZSQaKGdCYnco8pgYJsERJEDipCsyCb6WZOOwPdwPHs7RwJwPTAD50x', '2022-03-31 11:18:38', '2022-03-31 11:18:38'),
	(61, 'Gfzy6NDXLiCqQd1d3UzugjyyuwYHCB7kset0quCslBhHwJEtvjpkuVMYWxy7de8l', '2022-03-31 11:19:45', '2022-03-31 11:19:45'),
	(62, 'xB4baGdkgcgAcOlT9OPh5z3zJde3vvVOrGv1xfJ13Z44n5TaOlURsUu9xQRtZsYD', '2022-03-31 11:39:06', '2022-03-31 11:39:06'),
	(63, 'jU0DMgcvDTj0HTJCqzR8wFjY9TTGHu6QQsDczHKt3A6q6IkSMtS9oibovBNCIBzI', '2022-03-31 11:39:54', '2022-03-31 11:39:54'),
	(64, 'OuPnZzzNTzLdjh7w2dPhlOOtsneyejiTIWGWyQuKxLazxBpTVxSXed6aa7PWQyfo', '2022-03-31 12:16:21', '2022-03-31 12:16:21'),
	(65, '69CT7I3D8PhFSFfmFVGv6SJKaUQWOpAXfPmnGYbiySnOKrt03Hhrj8OAggLes5Aj', '2022-03-31 12:18:25', '2022-03-31 12:18:25'),
	(67, 'GX7euaysSOavsXiT6mCsxx9i9wBLXbVyVSFvs4bvc2qx0LBHKxl865mjvFrPSZXu', '2022-03-31 12:19:08', '2022-03-31 12:19:08');
/*!40000 ALTER TABLE `users_verify` ENABLE KEYS */;

-- Volcando estructura para tabla Deployment.usuario_inventario
CREATE TABLE IF NOT EXISTS `usuario_inventario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nomb_usua` varchar(50) DEFAULT NULL,
  `cedula` int(255) DEFAULT NULL,
  `FK_CARGO` int(11) DEFAULT NULL,
  `FK_IN` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `FK_usuario_inventario_cargo` (`FK_CARGO`),
  KEY `FK_usuario_inventario_Inventario` (`FK_IN`),
  KEY `FK_usuario_inventario_Inventari` (`FK_IN`),
  CONSTRAINT `FK_usuario_inventario_Inventari` FOREIGN KEY (`FK_IN`) REFERENCES `Inventario` (`idUsuaActivo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_usuario_inventario_cargo` FOREIGN KEY (`FK_CARGO`) REFERENCES `cargo` (`idCargo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla Deployment.usuario_inventario: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario_inventario` DISABLE KEYS */;
INSERT INTO `usuario_inventario` (`idUsuario`, `nomb_usua`, `cedula`, `FK_CARGO`, `FK_IN`) VALUES
	(92, 'Alvaro Molina', 1021662185, 2, NULL);
/*!40000 ALTER TABLE `usuario_inventario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
