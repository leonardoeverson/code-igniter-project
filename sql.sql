-- --------------------------------------------------------
-- Servidor:                     remotemysql.com
-- Versão do servidor:           8.0.13-4 - Percona Server (GPL), Release '4', Revision 'f0a32b8'
-- OS do Servidor:               debian-linux-gnu
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para xfmyH2GBiV
CREATE DATABASE IF NOT EXISTS `xfmyH2GBiV` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `xfmyH2GBiV`;

-- Copiando estrutura para tabela xfmyH2GBiV.marcas
CREATE TABLE IF NOT EXISTS `marcas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela xfmyH2GBiV.marcas: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
INSERT INTO `marcas` (`id`, `nome`) VALUES
	(1, 'Coca-Cola'),
	(2, 'Fanta'),
	(3, 'Guaraná Antártica'),
	(4, 'São Gerardo'),
	(5, 'Frevo');
/*!40000 ALTER TABLE `marcas` ENABLE KEYS */;

-- Copiando estrutura para tabela xfmyH2GBiV.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(30) NOT NULL,
  `litragem` varchar(8) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `sabor` varchar(15) NOT NULL,
  `valor_unitario` double NOT NULL,
  `id_usuario_cadastro` int(11) DEFAULT NULL,
  `hora_cadastro` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela xfmyH2GBiV.produtos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`id`, `marca`, `litragem`, `tipo`, `quantidade`, `sabor`, `valor_unitario`, `id_usuario_cadastro`, `hora_cadastro`) VALUES
	(33, 'Coca-cola', '600 mL', 'Garrafa', 10, '', 1.5, NULL, '2019-08-17 01:32:29'),
	(34, 'Coca-cola', '250 mL', 'Garrafa', 10, '', 1.5, NULL, '2019-08-17 01:33:36');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

-- Copiando estrutura para tabela xfmyH2GBiV.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela xfmyH2GBiV.usuarios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `email`, `senha`, `data_criacao`) VALUES
	(7, 'leonardo@batista.g12.br', '$2y$10$OCR88Qs3Rg/qjvCNd1nMt.7TX.A7g0Bg/CyDkBpAQk0z61/bvgUVe', '2019-08-16 15:47:16');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
