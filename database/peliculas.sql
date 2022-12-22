-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 22, 2022 at 08:17 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peliculas`
--

-- --------------------------------------------------------

--
-- Table structure for table `genero`
--

DROP TABLE IF EXISTS `genero`;
CREATE TABLE IF NOT EXISTS `genero` (
  `id` bigint(20) NOT NULL,
  `genero` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genero`
--

INSERT INTO `genero` (`id`, `genero`) VALUES
(12, 'Aventura'),
(14, 'Fantasía'),
(16, 'Animación'),
(18, 'Drama'),
(27, 'Terror'),
(28, 'Acción'),
(35, 'Comedia'),
(36, 'Historia'),
(37, 'Western'),
(53, 'Suspense'),
(80, 'Crimen'),
(99, 'Documental'),
(878, 'Ciencia ficción'),
(9648, 'Misterio'),
(10402, 'Música'),
(10749, 'Romance'),
(10751, 'Familia'),
(10752, 'Bélica'),
(10770, 'Pelicula TV');

-- --------------------------------------------------------

--
-- Table structure for table `peliculas`
--

DROP TABLE IF EXISTS `peliculas`;
CREATE TABLE IF NOT EXISTS `peliculas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tmdb_id` varchar(20) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `estado` enum('A','D','B') NOT NULL COMMENT 'A-activo D-desactivado  B-Borrar',
  `estreno` date NOT NULL,
  `overview` text,
  `opinion` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `peli_genero`
--

DROP TABLE IF EXISTS `peli_genero`;
CREATE TABLE IF NOT EXISTS `peli_genero` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `peliculaid` bigint(20) NOT NULL,
  `generoid` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=573 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `rol` enum('A','I','U','E') NOT NULL COMMENT 'A : Administrador U : usuario  I : invitado E: Editor',
  `estado` enum('A','P','B','D') NOT NULL COMMENT 'A : Activo P: Preinscrito D: Desactivado B: Borrado',
  `token` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `boletin` char(1) NOT NULL,
  `created_at` bigint(20) NOT NULL COMMENT 'fecha creacion',
  `modified_at` bigint(20) NOT NULL COMMENT 'fecha ultima modificacion',
  `code` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `mail`, `usuario`, `password`, `telefono`, `rol`, `estado`, `token`, `imagen`, `boletin`, `created_at`, `modified_at`, `code`) VALUES
(3, 'admin', '', 'admin-calvarezgc@yopmail.com', 'admin', '1234', '', 'A', 'A', 'abcdefghijklmnopqrstuvwxyz0123456789', '', '', 20222211, 1669967635, '0');

-- --------------------------------------------------------

--
-- Table structure for table `votaciones`
--

DROP TABLE IF EXISTS `votaciones`;
CREATE TABLE IF NOT EXISTS `votaciones` (
  `usuarioid` bigint(20) NOT NULL,
  `elemento_votado` int(10) UNSIGNED NOT NULL,
  `valoracion` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
