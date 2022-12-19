-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 19, 2022 at 09:39 AM
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

--
-- Dumping data for table `peliculas`
--

INSERT INTO `peliculas` (`id`, `tmdb_id`, `titulo`, `poster`, `estado`, `estreno`, `overview`, `opinion`) VALUES
(9, '385687', 'Fast X', '/zWJHY9QYzEcXmQ7BUg0qJxSICzd.jpg', 'D', '2023-05-18', 'Año 2154. Jake Sully , un exmarine condenado a vivir en una silla de ruedas, sigue siendo, a pesar de ello, un auténtico guerrero. Precisamente por ello ha sido designado para ir a Pandora, donde algunas empresas están extrayendo un mineral extraño que podría resolver la crisis energética de la Tierra. Para contrarrestar la toxicidad de la atmósfera de Pandora, se ha creado el programa Avatar, gracias al cual los seres humanos mantienen sus conciencias unidas a un avatar: un cuerpo biológico controlado de forma remota que puede sobrevivir en el aire letal.', ''),
(10, '493529', 'Dragones y mazmorras: Honor entre ladrones', '/3u1Wq2PAWdQDRMpT6sT1hBB9j1B.jpg', 'D', '2023-03-29', 'Un ladrón encantador y una banda de aventureros inverosímiles emprenden un atraco épico para recuperar una reliquia perdida, pero las cosas salen peligrosamente mal cuando se topan con las personas equivocadas.', NULL),
(11, '298618', 'The Flash', '/oduJooXJya3u6wuA6FgljAFCEQp.jpg', 'D', '2023-06-21', 'Mientras trabajaba en su laboratorio durante una tormenta una noche, un rayo golpea una bandeja de productos químicos que salpica al policía científico Barry Allen con su contenido. Ahora capaz de moverse a super-velocidad, Barry se convierte en The Flash que protege Central City de las amenazas.', NULL),
(12, '640146', 'Ant-Man y la Avispa: Quantumania', '/jh9hBDP9y7Ll3bG0Yhl66HSgN6e.jpg', 'D', '2023-02-15', 'Sinopsis pendiente de confirmar.', NULL),
(55, '19995', 'Avatar', '/tXmTHdrZgNsULqCbThK2Dt2X9Wt.jpg', 'A', '2009-12-15', 'Año 2154. Jake Sully , un exmarine condenado a vivir en una silla de ruedas, sigue siendo, a pesar de ello, un auténtico guerrero. Precisamente por ello ha sido designado para ir a Pandora, donde algunas empresas están extrayendo un mineral extraño que podría resolver la crisis energética de la Tierra. Para contrarrestar la toxicidad de la atmósfera de Pandora, se ha creado el programa Avatar, gracias al cual los seres humanos mantienen sus conciencias unidas a un avatar: un cuerpo biológico controlado de forma remota que puede sobrevivir en el aire letal.', NULL),
(56, '36668', 'X-Men 3: La decisión final', '/fY43xX0k1raU7M9FZHwOj0WNYhF.jpg', 'A', '2006-05-24', 'En X-Men: La decisión final, el último capítulo de la trilogía cinematográfica de los \"X-Men\", hay una \"cura\" para los mutantes que amenaza con alterar el curso de la historia. Por primera vez, los mutantes pueden elegir: seguir con su singularidad, aunque eso les aísle y les separe, o renunciar a sus poderes y convertirse en seres humanos normales. Los opuestos puntos de vista de los líderes mutantes, Charles Xavier, que aboga por la tolerancia, y Magneto, que cree en la supervivencia de los más aptos, se ven sometidos a la prueba definitiva: desencadenar la guerra que pondrá fin a todas las guerras...', NULL),
(57, '2080', 'X-Men orígenes: Lobezno', '/a3h2L0xYiANte1lrnuj2FUzhb8h.jpg', 'A', '2009-04-28', 'Precuela de la película X-Men. Situada 17 años antes, narra los inicios del arma X y la forma en la que Wolverine se convirtió en mutante. Logan, convertido en un mutante que se hace llamar Wolverine, y que es capaz de sacar unas afiladas garras y de una fuerza y agilidad sobrehumana, ultima su venganza contra Victor Creed, culpable de la muerte de su novia. Mientras tanto, otros mutantes se acogen al programa X para unir sus fuerzas.', NULL),
(58, '1487', 'Hellboy', '/5PWLsq6g52HqBMVJPVj64Q77p1L.jpg', 'A', '2004-04-02', 'Nacido de las llamas del infierno hace sesenta años durante la Segunda Guerra Mundial, Hellboy (Ron Perlman) fue enviado a la Tierra por el loco diabólico Grigori Rasputín (Karel Roden) para hacer el mal. Destinado a ser un presagio del Apocalipsis, Hellboy fue rescatado por las Fuerzas Aliadas lideradas por el profesor Broom (John Hurt), fundador del clandestino I.I.P.D. (Instituto para la Investigación Paranormal y de Defensa), que lo crió como un hijo y desarrolló sus extraordinarios poderes paranormales. A pesar de sus oscuros orígenes, Hellboy se convierte en un extraño héroe del bien, que lucha contra las fuerzas del mal que amenazan nuestro mundo.', NULL),
(60, '9615', 'A todo gas: Tokyo Race', '/v9Wu4u2FkGFgT0K9pxUX4IH8UYh.jpg', 'A', '2006-06-03', 'Shaun Boswell es un chico que no acaba de encajar en ningún grupo. Su única conexión con el mundo de indiferencia que le rodea es a través de las carreras ilegales, lo que no le ha convertido en el chico favorito de la policía. Cuando amenazan con encarcelarle, le mandan fuera del país a pasar una temporada con su tío, un militar destinado en Japón. En el país donde nacieron la mayoría de los coches modificados, las simples carreras en la calle principal han sido sustituidas por el último reto automovilístico que desafía la gravedad, las carreras de \"drift\" (arrastre), una peligrosa mezcla de velocidad en pistas con curvas muy cerradas y en zigzag. En su primera incursión en el salvaje mundo de las carreras de \"drift\", Shaun acepta ingenuamente conducir un D.K, el Rey del Drift, que pertenece a los Yakuza, la mafia japonesa. Para pagar su deuda, no tiene más remedio que codearse con el hampa de Tokio y jugarse la vida.', NULL),
(61, '603692', 'John Wick 4', '/jPJfq3s7UybktndveSbhwsReYqH.jpg', 'D', '2023-03-22', 'Continúacion de \"John Wick 3: Parabellum\"', NULL),
(62, '83533', 'Avatar 3', '/ocmG9jo7aorZtjmewSbfwQuJr95.jpg', 'D', '2024-12-18', '', NULL),
(63, '632727', 'La Matanza de Texas', '/2VnuxwgdMBEgVO7VKvkW6nmYfaM.jpg', 'A', '2022-02-18', 'Melody (Sarah Yarkin), su hermana adolescente Lila (Elsie Fisher) y sus amigos Dante (Jacob Latimore) y Ruth (Nell Hudson) viajan al remoto pueblo de Harlow (Texas) para montar un negocio muy idealista. Pero su sueño se convierte en una auténtica pesadilla cuando molestan sin querer a Leatherface, el desquiciado asesino en serie cuyo sangriento legado sigue acechando a los habitantes de la zona, entre ellos Sally Hardesty (Olwen Fouéré), la única superviviente de su masacre de 1973, decidida a vengarse a muerte.', NULL),
(65, '283995', 'Guardianes de la galaxia Vol. 2', '/kdg6Y06jfq9FV7qknWNcKLYtBJn.jpg', 'A', '2017-04-19', 'Una poderosa raza alienígena contrata a los Guardianes para que protejan sus valiosas baterías de energía, pero, cuando Rocket las roba, los alienígenas envían a sus tropas de combate a vengarse de ellos. Mientras tratan de escapar con vida, intentan resolver el misterio de los verdaderos orígenes de Peter Quill.', NULL),
(66, '290859', 'Terminator: Destino oscuro', '/k7PuHoj2oE7nEHExwliF2FSXFnr.jpg', 'A', '2019-10-23', 'Sarah Connor une todas sus fuerzas con una mujer cyborg para proteger a una joven de un extremadamente poderoso y nuevo Terminator.', NULL),
(67, '373571', 'Godzilla: Rey de los Monstruos', '/yQ59NPwzHE2XlYwU2VwHF9Wb0IJ.jpg', 'A', '2019-05-29', 'Los criptozoólogos de la agencia Monarch se enfrentan a un grupo de enormes monstruos: Godzilla, Mothra, Rodan y el enemigo de la humanidad, King Ghidorah. Estas ancianas criaturas harán todo lo posible por sobrevivir, poniendo en riesgo la existencia del ser humano en el planeta.', NULL);

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

--
-- Dumping data for table `peli_genero`
--

INSERT INTO `peli_genero` (`id`, `peliculaid`, `generoid`) VALUES
(21, 11, 28),
(22, 11, 27),
(23, 11, 878),
(24, 12, 14),
(25, 12, 28),
(26, 12, 12),
(27, 12, 878),
(28, 13, 28),
(29, 13, 878),
(30, 13, 53),
(31, 14, 28),
(32, 14, 12),
(33, 14, 878),
(34, 15, 99),
(35, 15, 12),
(36, 15, 28),
(37, 15, 53),
(38, 15, 878),
(39, 16, 27),
(40, 16, 878),
(41, 16, 28),
(42, 17, 80),
(43, 17, 35),
(44, 18, 878),
(45, 18, 28),
(46, 18, 12),
(47, 19, 28),
(48, 19, 878),
(49, 19, 53),
(50, 20, 99),
(51, 21, 99),
(52, 21, 10402),
(53, 22, 16),
(54, 22, 12),
(55, 22, 878),
(56, 24, 35),
(57, 24, 16),
(58, 24, 12),
(59, 25, 28),
(60, 25, 53),
(61, 25, 878),
(62, 26, 28),
(63, 26, 53),
(64, 26, 878),
(172, 10, 12),
(173, 10, 28),
(174, 10, 878),
(383, 33, 12),
(384, 33, 14),
(385, 33, 28),
(386, 33, 878),
(514, 2, 14),
(515, 2, 28),
(516, 2, 878),
(517, 1, 14),
(518, 1, 28),
(519, 1, 878),
(520, 40, 14),
(521, 40, 28),
(522, 40, 878),
(523, 55, 14),
(524, 55, 28),
(525, 55, 878),
(526, 56, 12),
(527, 56, 28),
(528, 56, 878),
(529, 56, 53),
(530, 57, 12),
(531, 57, 28),
(532, 57, 53),
(533, 57, 878),
(534, 58, 14),
(535, 58, 28),
(536, 59, 10770),
(537, 59, 14),
(538, 59, 16),
(539, 59, 27),
(540, 59, 28),
(541, 59, 53),
(542, 59, 878),
(543, 60, 28),
(544, 60, 80),
(545, 60, 18),
(546, 60, 53),
(547, 61, 28),
(548, 61, 53),
(549, 61, 80),
(550, 62, 28),
(551, 62, 18),
(552, 62, 878),
(553, 62, 12),
(554, 62, 14),
(555, 63, 27),
(556, 63, 53),
(557, 9, 14),
(558, 9, 28),
(559, 9, 878),
(560, 64, 99),
(561, 64, 10402),
(562, 65, 12),
(563, 65, 28),
(564, 65, 878),
(565, 66, 878),
(566, 66, 28),
(567, 66, 12),
(568, 67, 878),
(569, 67, 28),
(570, 68, 28),
(571, 68, 12),
(572, 68, 878);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `mail`, `usuario`, `password`, `telefono`, `rol`, `estado`, `token`, `imagen`, `boletin`, `created_at`, `modified_at`, `code`) VALUES
(1, 'Krys', 'Gar', 'krispisag@gmail.com', 'krispisag', '1234', '', 'A', 'A', 'abcdefghijklmnopqrstuvwxyz0123456789', '', '', 20222211, 1669967635, '0'),
(2, 'CristinaA', 'Grillo', 'cristina.alvarezgc@gmail.com', 'calvarezgc', '1234', '', 'U', 'A', 'kiukuyeesgsg', '', '', 20222211, 1669812771, '');

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

--
-- Dumping data for table `votaciones`
--

INSERT INTO `votaciones` (`usuarioid`, `elemento_votado`, `valoracion`) VALUES
(2, 55, 5),
(2, 56, 4),
(2, 60, 5),
(2, 65, 2),
(2, 66, 3),
(2, 57, 5),
(2, 58, 4),
(2, 63, 3),
(2, 67, 4),
(1, 56, 3),
(2, 10, 5),
(2, 9, 5),
(2, 11, 5),
(2, 62, 5),
(2, 61, 5),
(2, 12, 5),
(1, 58, 1),
(1, 60, 3),
(1, 63, 5),
(1, 65, 5),
(1, 66, 1),
(1, 67, 2),
(1, 55, 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
