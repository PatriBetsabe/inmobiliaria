-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 18-05-2020 a las 19:50:59
-- Versión del servidor: 5.7.30-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.24-0ubuntu0.18.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inmobiliaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barris`
--

CREATE TABLE `barris` (
  `id` int(11) NOT NULL,
  `id_districte` int(11) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `barris`
--

INSERT INTO `barris` (`id`, `id_districte`, `slug`, `name`) VALUES
(1, 1, 'la-barceloneta', 'La Barceloneta'),
(2, 1, 'el-gotic', 'El Gòtic'),
(3, 1, 'sant-pere-santa-caterina-i-la-ribera', 'Sant Pere, Santa Caterina i la Ribera'),
(4, 2, 'l-antiga-esquerra-de-l-eixample', 'L\'Antiga Esquerra de l\'Eixample'),
(5, 2, 'la-nova-esquerra-de-l-eixample', 'La Nova Esquerra de l\'Eixample'),
(6, 2, 'dreta-de-l-eixample', 'Dreta de l\'Eixample'),
(7, 2, 'fort-pienc', 'Fort Pienc'),
(8, 2, 'sagrada-familia', 'Sagrada Família'),
(9, 2, 'sant-antoni', 'Sant Antoni'),
(10, 3, 'la-bordeta', 'La Bordeta'),
(11, 3, 'la-font-de-la-guatlla', 'La Font de la Guatlla'),
(12, 3, 'hostafrancs', 'Hostafrancs'),
(13, 3, 'la-marina-de-port', 'La Marina de Port'),
(14, 3, 'la-marina-del-prat-vermell', 'La Marina del Prat Vermell'),
(15, 3, 'el-poble-sec', 'El Poble Sec'),
(16, 3, 'sants', 'Sants'),
(17, 3, 'sants-badal', 'Sants- Badal'),
(18, 3, 'montjuic', 'Montjuïc'),
(19, 3, 'la-zona-franca-port', 'La Zona Franca- Port'),
(20, 4, 'les-corts', 'Les Corts'),
(21, 4, 'la-maternitat-i-sant-ramon', 'La Maternitat i Sant Ramon'),
(22, 4, 'pedralbes', 'Pedralbes'),
(23, 5, 'el-putget-i-farro', 'El Putget i Farró'),
(24, 5, 'sarria', 'Sarrià'),
(25, 5, 'sant-gervasi-la-bonanova', 'Sant Gervasi- La Bonanova'),
(26, 5, 'sant-gervasi-galvany', 'Sant Gervasi- Galvany'),
(27, 5, 'les-tres-torres', 'Les Tres Torres'),
(28, 5, 'vallvidriera-el-tibidabo-i-les-planes', 'Vallvidriera, el Tibidabo i les Planes'),
(29, 6, 'vila-de-gracia', 'Vila de Gràcia'),
(30, 6, 'camp-d-en-grassot-i-gracia-nova', 'Camp d\'en Grassot i Gràcia Nova'),
(31, 6, 'la-salut', 'La Salut'),
(32, 6, 'barri-del-coll', 'Barri del Coll'),
(33, 6, 'vallcarca-i-els-penitents', 'Vallcarca i els Penitents'),
(34, 7, 'el-baix-guinardo', 'El Baix Guinardó'),
(35, 7, 'el-guinardo', 'El Guinardó'),
(36, 7, 'barri-de-can-baro', 'Barri de Can Baró'),
(37, 7, 'el-carmel', 'El Carmel'),
(38, 7, 'la-font-d-en-fargues', 'La Font d\'en Fargues'),
(39, 7, 'horta', 'Horta'),
(40, 7, 'la-clota', 'La Clota'),
(41, 7, 'montbau', 'Montbau'),
(42, 7, 'sant-genis-dels-agudells', 'Sant Genís dels Agudells'),
(43, 7, 'la-teixonera', 'La Teixonera'),
(44, 7, 'la-vall-d-hebron', 'La Vall d\'Hebron'),
(56, 8, 'can-paguera', 'Can Paguera'),
(57, 8, 'canyelles', 'Canyelles'),
(58, 8, 'ciutat-meridiana', 'Ciutat Meridiana'),
(59, 8, 'la-guineueta', 'La Guineueta'),
(60, 8, 'porta', 'Porta'),
(61, 8, 'prosperitat', 'Prosperitat'),
(62, 8, 'les-roquetes', 'Les Roquetes'),
(63, 8, 'torre-baro', 'Torre Baró'),
(64, 8, 'la-trinitat-nova', 'La Trinitat Nova'),
(65, 8, 'el-turo-de-la-peira', 'El Turó de la Peira'),
(66, 8, 'vallbona', 'Vallbona'),
(67, 8, 'verdum', 'Verdum'),
(68, 8, 'vilapiscina-i-la-torre-llobeta', 'Vilapiscina i la Torre Llobeta'),
(69, 9, 'baro-de-viver', 'Baró de Viver'),
(70, 9, 'bon-pastor', 'Bon Pastor'),
(71, 9, 'el-congres-i-els-indians', 'El Congrés i els Indians'),
(72, 9, 'navas', 'Navas'),
(73, 9, 'sant-andreu-de-palomar', 'Sant Andreu de Palomar'),
(74, 9, 'la-sagrera', 'La Sagrera'),
(75, 9, 'trinitat-vella', 'Trinitat Vella'),
(76, 10, 'el-besos-i-el-maresme', 'El Besòs i el Maresme'),
(77, 10, 'el-clot', 'El Clot'),
(78, 10, 'el-camp-de-l-arpa-del-clot', 'El Camp de l\'Arpa del Clot'),
(79, 10, 'diagonal-mar-i-el-front-maritim-del-poblenou', 'Diagonal Mar i el Front Marítim del Poblenou'),
(80, 10, 'el-parc-i-la-llacuna-del-poblenou', 'El Parc i la Llacuna del Poblenou'),
(81, 10, 'el-poblenou', 'El Poblenou'),
(82, 10, 'provencals-del-poblenou', 'Provençals del Poblenou'),
(83, 10, 'sant-marti-de-provencals', 'Sant Martí de Provençals'),
(84, 10, 'la-verneda-i-la-pau', 'La Verneda i la Pau'),
(85, 10, 'la-vila-olimpica-del-poblenou', 'La Vila Olímpica del Poblenou');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `districtes`
--

CREATE TABLE `districtes` (
  `id` int(11) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `districtes`
--

INSERT INTO `districtes` (`id`, `slug`, `name`) VALUES
(1, 'ciutat-vella', 'Ciutat Vella'),
(2, 'eixample', 'Eixample'),
(3, 'sants-montjuic', 'Sants- Montuïc'),
(4, 'les-corts', 'Les Corts'),
(5, 'sarria-sant-gervasi', 'Sarrià- Sant Gervasi'),
(6, 'gracia', 'Gràcia'),
(7, 'horta-guinardo', 'Horta- Guinardó'),
(8, 'nou-barris', 'Nou Barris'),
(9, 'sant-andreu', 'Sant Andreu'),
(10, 'sant-marti', 'Sant Martí');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble`
--

CREATE TABLE `inmueble` (
  `id` int(11) NOT NULL,
  `latitud` decimal(20,8) DEFAULT NULL,
  `longitud` decimal(20,8) DEFAULT NULL,
  `titulo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calle` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` int(5) DEFAULT NULL,
  `piso` int(5) DEFAULT NULL,
  `puerta` int(5) DEFAULT NULL,
  `via` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `escalera` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigoPostal` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poblacion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_distrito` int(11) NOT NULL,
  `provincia` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_barri` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `superficie` decimal(20,3) DEFAULT NULL,
  `habitaciones` int(2) NOT NULL,
  `banyos` int(2) NOT NULL,
  `precio` decimal(20,3) NOT NULL,
  `fechaPublicacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imageUrl1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imageUrl2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imageUrl3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caracteristicas` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuarioId` int(11) NOT NULL,
  `visitas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inmueble`
--

INSERT INTO `inmueble` (`id`, `latitud`, `longitud`, `titulo`, `descripcion`, `calle`, `numero`, `piso`, `puerta`, `via`, `escalera`, `codigoPostal`, `poblacion`, `id_distrito`, `provincia`, `id_barri`, `tipo`, `superficie`, `habitaciones`, `banyos`, `precio`, `fechaPublicacion`, `imageUrl1`, `imageUrl2`, `imageUrl3`, `caracteristicas`, `usuarioId`, `visitas`) VALUES
(1, '41.40581410', '2.17247790', 'Piso en Sagrada Familia', 'Esto es una descripcion', 'Marina', 287, NULL, NULL, 'Carrer', NULL, NULL, NULL, 1, NULL, 1, 'alquilar', NULL, 3, 1, '1066.000', '2020-02-17 00:04:13', './media/Patri_piso4.jpeg', NULL, NULL, NULL, 1, 32),
(2, '41.40581410', '2.17247790', 'Piso en Sagrada Familia', 'Esto es una descripcion', 'Marina', 287, NULL, NULL, 'Carrer', NULL, NULL, NULL, 1, NULL, 1, 'alquilar', NULL, 3, 1, '1066.000', '2020-02-17 00:05:13', './media/Patri_piso4.jpeg', NULL, NULL, NULL, 1, 2),
(3, '41.41622960', '2.19501460', 'Piso en estreno', 'Hola			', 'Fluvia', 234, NULL, NULL, 'Carrer', NULL, NULL, NULL, 10, NULL, 83, 'vender', NULL, 3, 1, '1100.000', '2020-02-17 14:50:13', './media/Pepito_piso3.jpeg', NULL, NULL, NULL, 9, 0),
(4, '41.41622960', '2.19501460', 'Piso en estreno', 'Hola			', 'Fluvia', 234, NULL, NULL, 'Carrer', NULL, NULL, NULL, 10, NULL, 83, 'vender', NULL, 3, 1, '1100.000', '2020-02-17 15:00:11', './media/Pepito_piso3.jpeg', NULL, NULL, NULL, 9, 0),
(5, '41.41622960', '2.19501460', 'Piso en estreno', 'Hola			', 'Fluvia', 234, NULL, NULL, 'Carrer', NULL, NULL, NULL, 10, NULL, 83, 'vender', NULL, 3, 1, '1100.000', '2020-02-17 15:01:05', './media/Pepito_piso3.jpeg', NULL, NULL, NULL, 9, 0),
(6, '41.41622960', '2.19501460', 'Piso en estreno', 'Hola			', 'Fluvia', 234, NULL, NULL, 'Carrer', NULL, NULL, NULL, 10, NULL, 83, 'vender', NULL, 3, 1, '1100.000', '2020-02-17 15:01:41', './media/Pepito_piso3.jpeg', NULL, NULL, NULL, 9, 0),
(7, '41.41622960', '2.19501460', 'Piso en estreno', 'Hola			', 'Fluvia', 234, NULL, NULL, 'Carrer', NULL, NULL, NULL, 10, NULL, 83, 'vender', NULL, 3, 1, '1100.000', '2020-02-17 15:02:27', './media/Pepito_piso3.jpeg', NULL, NULL, NULL, 9, 0),
(8, '41.41622960', '2.19501460', 'Piso en estreno', 'Hola			', 'Fluvia', 234, NULL, NULL, 'Carrer', NULL, NULL, NULL, 10, NULL, 83, 'vender', NULL, 3, 1, '1100.000', '2020-02-17 15:15:38', './media/Pepito_piso3.jpeg', NULL, NULL, NULL, 9, 0),
(9, '41.40316530', '2.20948090', 'Piso ejemplo', '\r\n							sdfgfd', 'Bac de Roda', 23, NULL, NULL, 'Carrer', NULL, NULL, NULL, 1, NULL, 1, 'alquilar', NULL, 4, 3, '2344.000', '2020-02-17 15:26:49', './media/Pepito_bie.png', NULL, NULL, NULL, 9, 0),
(10, '41.40490540', '2.17098660', 'Hola esto es un piso', 'Esto es un piso.', 'Sardenya', 345, NULL, NULL, 'Carrer', NULL, NULL, NULL, 2, NULL, 8, 'vender', NULL, 2, 1, '1050.000', '2020-02-17 15:30:51', './media/Pepito_piso3.jpeg', NULL, NULL, NULL, 9, 0),
(18, '41.40264970', '2.19446350', 'Pis prova', 'lorem ipsum dolor sit amet', 'Roc Boronat', 123, NULL, NULL, 'Carrer', NULL, NULL, NULL, 10, NULL, 81, 'alquilar', NULL, 2, 1, '1050.000', '2020-02-17 15:42:18', './media/Pepito_sudo_logo.png', NULL, NULL, NULL, 9, 0),
(19, '41.40264970', '2.19446350', 'Pis prova', 'lorem ipsum dolor sit amet', 'Roc Boronat', 123, NULL, NULL, 'Carrer', NULL, NULL, NULL, 10, NULL, 81, 'alquilar', NULL, 2, 1, '1050.000', '2020-02-17 15:44:08', './media/Pepito_sudo_logo.png', NULL, NULL, NULL, 9, 0),
(20, '41.40264970', '2.19446350', 'Pis prova', 'lorem ipsum dolor sit amet', 'Roc Boronat', 123, NULL, NULL, 'Carrer', NULL, NULL, NULL, 10, NULL, 81, 'alquilar', NULL, 2, 1, '1050.000', '2020-02-17 15:44:19', './media/Pepito_sudo_logo.png', NULL, NULL, NULL, 9, 0),
(21, '41.40264970', '2.19446350', 'Pis prova', 'lorem ipsum dolor sit amet', 'Roc Boronat', 123, NULL, NULL, 'Carrer', NULL, NULL, NULL, 10, NULL, 81, 'alquilar', NULL, 2, 1, '1050.000', '2020-02-17 15:44:30', './media/Pepito_sudo_logo.png', NULL, NULL, NULL, 9, 0),
(32, '41.40581410', '2.17247790', 'Piso en sagrada familia', 'Esto es una descripcion del piso.\r\nPiso barato en buen estado, de estreno.', 'Marina', 287, NULL, NULL, 'Carrer', NULL, NULL, NULL, 2, NULL, 8, 'alquilar', NULL, 3, 1, '1050.000', '2020-02-20 16:30:13', './media/patri@hello.com_piso4.jpeg', NULL, NULL, NULL, 1, 0),
(33, '41.40581410', '2.17247790', 'Piso en sagrada familia', 'Esto es una descripcion del piso.\r\nPiso barato en buen estado, de estreno.', 'Marina', 287, NULL, NULL, 'Carrer', NULL, NULL, 'Barcelona', 2, NULL, 8, 'alquilar', NULL, 3, 1, '1050.000', '2020-02-20 16:38:32', './media/patri@hello.com_piso4.jpeg', NULL, NULL, NULL, 1, 0),
(34, '41.40581410', '2.17247790', 'Piso en sagrada familia', 'Esto es una descripcion del piso.\r\nPiso barato en buen estado, de estreno.', 'Marina', 287, NULL, NULL, 'Carrer', NULL, NULL, 'Barcelona', 2, NULL, 8, 'alquilar', NULL, 3, 1, '1050.000', '2020-02-20 16:39:32', './media/patri@hello.com_piso4.jpeg', NULL, NULL, NULL, 1, 1),
(35, '41.40581410', '2.17247790', 'Piso en sagrada familia', 'Esto es una descripcion del piso.\r\nPiso barato en buen estado, de estreno.', 'Marina', 287, NULL, NULL, 'Carrer', NULL, NULL, 'Barcelona', 2, NULL, 8, 'alquilar', NULL, 3, 1, '1050.000', '2020-02-20 16:40:25', './media/patri@hello.com_piso4.jpeg', NULL, NULL, NULL, 1, 0),
(36, '41.38506390', '2.17340350', 'Piso Marina', 'Esto es una descripcion', 'Nombre via', 234, NULL, NULL, 'Carrer', NULL, NULL, 'Barcelona', 1, NULL, 1, 'alquilar', NULL, 3, 1, '765.000', '2020-02-20 16:46:00', './media/patri@hello.com_3.png', NULL, NULL, NULL, 1, 12),
(37, '41.38506390', '2.17340350', 'Piso Marina', 'Esto es una descripcion', 'Nombre via', 234, NULL, NULL, 'Carrer', NULL, NULL, 'Barcelona', 1, NULL, 1, 'alquilar', NULL, 3, 1, '765.000', '2020-02-20 16:47:57', './media/patri@hello.com_3.png', NULL, NULL, NULL, 1, 11),
(38, '41.38506390', '2.17340350', 'Mi pisito', 'Hola esto es una descripciÃ³n.', 'Hola', 1234, NULL, NULL, 'Carrer', NULL, NULL, 'Barcelona', 1, NULL, 1, 'alquilar', NULL, 1, 1, '345.000', '2020-02-20 16:50:01', './media/jordi@hi.com_xd.png', NULL, NULL, NULL, 7, 111119),
(39, '41.38506390', '2.17340350', 'Mi pisito', 'Hola esto es una descripciÃ³n.', 'Hola', 1234, NULL, NULL, 'Carrer', NULL, NULL, 'Barcelona', 1, NULL, 1, 'alquilar', NULL, 1, 1, '345.000', '2020-02-20 17:00:25', './media/jordi@hi.com_xd.png', NULL, NULL, NULL, 7, 1),
(40, '41.38506390', '2.17340350', 'Mi pisito', 'Hola esto es una descripciÃ³n.', 'Hola', 1234, NULL, NULL, 'Carrer', NULL, NULL, 'Barcelona', 1, NULL, 1, 'alquilar', NULL, 1, 1, '345.000', '2020-02-20 17:01:33', './media/jordi@hi.com_xd.png', NULL, NULL, NULL, 7, 0),
(41, '41.38506390', '2.17340350', 'Mi pisito', 'Hola esto es una descripciÃ³n.', 'Hola', 1234, NULL, NULL, 'Carrer', NULL, NULL, 'Barcelona', 1, NULL, 1, 'alquilar', NULL, 1, 1, '345.000', '2020-02-20 17:04:10', './media/jordi@hi.com_xd.png', NULL, NULL, NULL, 7, 0),
(42, '41.38506390', '2.17340350', 'Mi pisito', 'Hola esto es una descripciÃ³n.', 'Hola', 1234, NULL, NULL, 'Carrer', NULL, NULL, 'Barcelona', 1, NULL, 1, 'alquilar', NULL, 1, 1, '345.000', '2020-02-20 17:08:52', './media/jordi@hi.com_xd.png', NULL, NULL, NULL, 7, 0),
(43, '41.39650040', '2.18425570', 'Piso en Sagrada Familia', 'esto es lallalala', 'MArina', 123, NULL, NULL, 'Carrer', NULL, NULL, 'Barcelona', 1, NULL, 1, 'alquilar', NULL, 1, 1, '456.000', '2020-02-20 17:09:27', './media/jordi@hi.com_xd.png', NULL, NULL, NULL, 7, 7),
(44, '41.39650040', '2.18425570', 'Piso en Sagrada Familia', 'esto es lallalala', 'MArina', 123, NULL, NULL, 'Carrer', NULL, NULL, 'Barcelona', 1, NULL, 1, 'alquilar', NULL, 1, 1, '456.000', '2020-02-20 17:16:42', './media/jordi@hi.com_xd.png', NULL, NULL, NULL, 7, 0),
(45, '41.39650040', '2.18425570', 'Piso en Sagrada Familia', 'esto es lallalala', 'MArina', 123, NULL, NULL, 'Carrer', NULL, NULL, 'Barcelona', 1, NULL, 1, 'alquilar', NULL, 1, 1, '456.000', '2020-02-20 17:17:56', './media/jordi@hi.com_xd.png', NULL, NULL, NULL, 7, 8),
(46, '41.39650040', '2.18425570', 'Piso en estreno', 'Hola esto es una descripcion', 'Marina', 123, NULL, NULL, 'Carrer', NULL, NULL, 'Barcelona', 1, NULL, 1, 'alquilar', NULL, 3, 1, '123.000', '2020-02-20 17:18:46', './media/jordi@hi.com_sudo_logo.png', NULL, NULL, NULL, 7, 1),
(47, '41.38018870', '2.17789190', 'Piso actualizado 2', 'Piso en estreno con gran vista.\r\nCon aire acondicionado.\r\ncon ascensor', 'Rosass', 333, NULL, NULL, 'Carrer', NULL, NULL, 'Barcelona', 3, NULL, 12, 'alquilar', NULL, 2, 2, '1500.000', '2020-02-25 08:27:13', './media/patri@hello.com_piso1.jpg', NULL, NULL, NULL, 1, 10),
(48, '41.41868550', '2.21317190', 'qwert', 'aaaasss d d d d  d   d', 'plaza juliana  morell', 3, NULL, NULL, 'Carrer', NULL, NULL, 'Barcelona', 10, NULL, 76, 'vender', NULL, 4, 1, '900.000', '2020-02-26 16:03:02', './media/a@a.com_error.png', NULL, NULL, NULL, 12, 0),
(49, '41.42420310', '2.19939410', 'Piso en Sant Andreu', 'Piso en estreno\r\nCon vista al mar\r\nCon ascensor\r\n							', 'Cantabria', 123, NULL, NULL, 'Carrer', NULL, NULL, 'Barcelona', 10, NULL, 83, 'alquilar', NULL, 3, 1, '1500.000', '2020-02-29 23:33:00', './media/andrea@hello.com_piso2.jpeg', NULL, NULL, NULL, 14, NULL),
(50, '41.42420310', '2.19939410', 'Piso en Sant Marti', 'Piso en estreno\r\nCon vista al mar\r\n							', 'Cantabria', 123, NULL, NULL, 'Carrer', NULL, NULL, 'Barcelona', 10, NULL, 83, 'alquilar', NULL, 3, 1, '1500.000', '2020-02-29 23:33:23', './media/andrea@hello.com_piso2.jpeg', NULL, NULL, NULL, 14, 3),
(51, '41.42420310', '2.19939410', 'Piso en Sant Andreu', 'Piso en estreno\r\nCon vista al mar\r\nCon ascensor\r\n							', 'Cantabria', 123, NULL, NULL, 'Carrer', NULL, NULL, 'Barcelona', 10, NULL, 83, 'alquilar', NULL, 3, 1, '1500.000', '2020-02-29 23:34:11', './media/andrea@hello.com_piso2.jpeg', NULL, NULL, NULL, 14, NULL),
(52, '41.38099110', '2.15916460', 'Piso en Sant Andreu', '', 'Sepulveda', 123, NULL, NULL, 'Carrer', NULL, NULL, 'Barcelona', 1, NULL, 1, 'alquilar', NULL, 1, 1, '1234.000', '2020-02-29 23:44:41', './media/andrea@hello.com_piso4.jpeg', NULL, NULL, NULL, 14, 1),
(53, '41.41771290', '2.18538350', 'Piso en Sagrada Familia', '							piso en muy buen estado , muy cerca de la estacion de metro , cerca a paradas de buses, superes, lugares de comida rapida y areas de entretenimientos.', 'industria', 354, NULL, NULL, 'Carrer', NULL, NULL, 'Barcelona', 2, NULL, 8, 'alquilar', NULL, 3, 2, '780.000', '2020-03-01 00:13:06', './media/xiomi@gmail.com_pisoooo.jpg', NULL, NULL, NULL, 15, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` int(9) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `telefono`, `email`, `password`, `dni`) VALUES
(1, 'Patri', NULL, 'patri@hello.com', '$2y$10$.KptMxE7UyNvs0PxZvL.zOfeDlgeaS4YwjvnWenUNPRdk/0fIYXr6', NULL),
(2, '', NULL, '', '$2y$10$3vcRkyMArRz8r6Qg5QI8dOWXG9J7law/ZxAfIHT9l457CKMtxej..', NULL),
(3, 'Xiomara', 12345678, 'xio@hello.com', '$2y$10$sTJerBo0WHp8m.ioEb.EoOrPy2UKHzBS7CWQsEcoTSu9CMVI8O6Gi', NULL),
(4, 'Ana', 12345, 'ana@hello.com', '$2y$10$pCxCxs6MwglkW84ZTFiTC.d.DvLhSvwoNEg63BlnQd31RLq6kQtaW', NULL),
(5, 'Juan', 12345567, 'juan@gmail.com', '$2y$10$uIc6XQmZ9f9ahf3tHoHQeOZbMNkMjFSieNUTMT0dFwNDxlK7yZcvG', NULL),
(6, 'Pedro', 12345, 'pedro@gmail.com', '$2y$10$aueL5NDTwLgWqiBNUkhBw.lW/aIbH16iWscawDET/VS7f.p3kNdma', NULL),
(7, 'Jordi', NULL, 'jordi@hi.com', '$2y$10$8OwCHWzFdf/Uab5JvwuUfOJ.CpiFhxvDwJ4FcNW8skEmfTqnXu5ZO', NULL),
(8, 'eli', 654156789, 'eli@gmail.com', '$2y$10$Uoq1Oxi.InOipdrcT6XNCuhH1sYNFafv/jgoWZ5r/MzWTDaozAAf6', NULL),
(9, 'Pepito', 34567654, 'pepe@pepe.com', '$2y$10$61skdU26J6yZFXF.eQwhve3vMbd4KjnnFeA7jxD1QhQavUNalWSe.', NULL),
(10, 'Patri1', 111, 'jordi1@hi.com', '$2y$10$T0ivGGkTa5gTgwW/85vFauuqf5AJJYEwS8hi0YahNWP4uPBb3Pu22', NULL),
(11, 'Patri1', 111, 'jordi2@hi.com', '$2y$10$4ScRHgTkMK7va13UVIBW7.NDpUFnZDTcms/OkXLqowW1o8WxbMNp.', NULL),
(12, 'Patri1', NULL, 'a@a.com', '$2y$10$JcnCQR3Oh3QqUNu.MXlFoOyJnOB8jtP7yPSKh5ljJtqExYOE1q4lG', NULL),
(13, 'Andre', 3212345, 'andrea@gmail.com', '$2y$10$bzstqjsfUBzsA.nqHwTguOUzAtlwMymHo8I7wSptDrtSmhuW4.pIC', NULL),
(14, 'Andrea', 21343221, 'andrea@hello.com', '$2y$10$8jrWd2acdy6sDobFR2GPO.dKOzwc.ldazo5T.4tZ25l3GKqnxySN6', NULL),
(15, 'Xiomara', 654654654, 'xiomi@gmail.com', '$2y$10$nyxZSAE3AZwrGiiPj2Bs6..B6NZIL4bQJLZV.12oZiCmFTfBjmJii', NULL),
(16, 'pLama2674', 0, 'patri@patri.com', '$2y$10$DBmfieEZnY1CoHlZIsTVIOwG.1NmY6X5YhLfI4bTUW7No3RY4hgNG', '26637541E'),
(17, 'pDelo2674', 0, 'pedro@gmail.com', '$2y$10$8OSLe.WxZoCLXz13DNUYc.j6Jo7KFwloalM7gg8Zikrv4/6/sMvmy', '26637541E'),
(18, 'pDelo2674', 0, 'pedro@gmail.com', '$2y$10$s8TAjzoyIh0wKQUlp2KdOu.IJ0G7bd7ep5Qa29GvEo44b6787PIpC', '26637541E'),
(19, 'qQwer2674', 123456789, 'xiomi@gmail.com', '$2y$10$UJkO3eJmv2bYd4tMHOrTc.IXN0hqiu/6IckEWvevtB0kh6Zx330rm', '26637541E'),
(20, 'qQwer2674', 123456789, 'xiomi@gmail.com', '$2y$10$hzFWiL4ePM3gaP.b7ipSL.f1bKHKQbytzw/Kqt2CKpi8x687PAaNq', '26637541E'),
(21, 'qQwer2674', 123456789, 'xiomi@gmail.com', '$2y$10$5.3VY1IuiObuhncB6MrTr./AkySVqkOVzC684u7NRFig/ubrGYvge', '26637541E'),
(22, 'qQwer2674', 123456789, 'xiomi@gmail.com', '$2y$10$swJOZdWsbqiNC3L.BYHS/evJmQtdATejIBBbYcm/Et2oZV6djt1gy', '26637541E'),
(23, 'qQwer2674', 123456789, 'xiomi@gmail.com', '$2y$10$wqoo7X74AAibLEOe3CGO8um9qN8qXResSWskiTms0RaEtcpWcv9bu', '26637541E'),
(24, 'pAsda2674', 123456789, 'patri@hello.com', '$2y$10$5u4DlR1HAgRiXDzn8tiZNObpJTYDCqqP83N97b1xugTrX5p/2NyOu', '26637541E'),
(25, 'pAsda2674', 123456789, 'patri@hello.com', '$2y$10$oJ4Upd87gpnsCtL1wNL0U.s6foE/4zgoGnK0pSsbyyE1z2HjAUieK', '26637541E'),
(26, 'pAsda2674', 123456789, 'patri@hello.com', '$2y$10$3p6goGvIkOOzwDe5aE1Cue0pCL3OfrDDH9Df9gQDh8ilMr48W4knK', '26637541E'),
(27, 'pAsda2674', 123456789, 'patri@hello.com', '$2y$10$af0Kpdx6ZzoqUDjQAB4oV.Q1erMIY.o.LSmpPFEevLXo6/7uIN56e', '26637541E'),
(28, 'pAsda2674', 123456789, 'patri@hello.com', '$2y$10$9wOyGJCuyVwvye3l4qNBU.UDfia4XhfgyNy5WMQUhnbj7V3gJecQW', '26637541E'),
(29, 'pAsda2674', 123456789, 'patri@hello.com', '$2y$10$GVwxA/hL4VO4oJOhqs9tmuN0h6Jhxtt4j.6nK2369ot3YtK.b7Rpy', '26637541E'),
(30, 'pAsda2674', 123456789, 'patri@hello.com', '$2y$10$HbP5qQhy59tUBF8TxpGdsupNvMYwmzr/ebQAj2vBBu00GsxZuvy36', '26637541E'),
(31, 'pAsda2674', 123456789, 'patri@hello.com', '$2y$10$tBBuxRxMJTrNgrHH9MiTeex6ETQKmVW70diRuCRHqvvrawIFEvYuu', '26637541E'),
(32, 'pLama2674', 123456789, 'jordi@hi.com', '$2y$10$t08P/TUWG4FU13wrtXUEguOmXaVw9hox7pMxVzqdKNOVKtN4cgimi', '26637541E'),
(33, 'pLama2674', 123456789, 'jordi@hi.com', '$2y$10$h4oo7wMkQlYT8S3k8pEeaekOWnbZSuHAVBC/CDeGsjq0NCilRoF7u', '26637541E'),
(34, 'pLama2674', 123456789, 'jordi@hi.com', '$2y$10$GY.6mJ5SgKEeP5zPVH/hredKDY42ZU2UVSxXf/taOHLd68XY/4Snm', '26637541E'),
(35, 'pLama2674', 123456789, 'jordi@hi.com', '$2y$10$NeJ4O2qLqpKsoa2gXXiJP.BAbBV6cgwyrT5jF7JEssvQFVKBFr8da', '26637541E'),
(36, 'pLama2674', 123456789, 'jordi@hi.com', '$2y$10$nRoSfU4r0mkJPH7yVZg8wO995lK/WUrRqBgwv9DJXPL8tU6GWG2nC', '26637541E'),
(37, 'pAsda2674', 123456789, 'patri@hello.com', '$2y$10$QvoZ6JG8Zgrej3YIpBZpdejvffnZ094Iwse7N36k.gaNx6/v.h.O2', '26637541E'),
(38, 'pAsda2674', 123456789, 'patri@hello.com', '$2y$10$VslDe9Y6gueUiaFe4tomMOD9X75SsdbTJ44fZZMKUTQ5Id8hBgnS6', '26637541E'),
(39, 'hPeri2654', 123456789, 'ja@gmail.com', '$2y$10$x/L9nGER8JqFbd5Z1k0kB.0SxvDu7BqCu7vhjAkcp.yKluoqChRlu', '26635241E'),
(40, 'hPeri2654', 123456789, 'ja@gmail.com', '$2y$10$i4ld5jkZzJOutsK/If78uuF9ucTFeH9NLaRxKcBElE5u3cwGEy8nO', '26635241E'),
(41, 'hPeri2654', 123456789, 'ja@gmail.com', '$2y$10$84iqEpCIUNd7SG.KsphJvOJMo3p5.FZ.7OJvzwvOhNVk5WBU7ConW', '26635241E'),
(42, 'pAsda2674', 123456789, 'patri@hello.com', '$2y$10$G7N7B0McnHSHB6CUPU.Vj.MiKt.JZJNnoAyEAufUGosejO1mnEDBG', '26637541E'),
(43, 'pAsda2674', 123456789, 'patri@hello.com', '$2y$10$y6DGrPfucl2pfwP9Ttwc9u/czU90c2LuFEPGxMZA/NEZyBJOmHnEO', '26637541E'),
(44, 'pLama2674', 123456789, 'patri2@hello.com', '$2y$10$kB9PzdZTCISazybidIhPBOxqd0hRstQ3nc6OL9BoFOocqCg2899Zm', '26637542E'),
(45, 'pLama2674', 123456789, 'patri2@hello.com', '$2y$10$OhbqYyeoGGuKR87k1CqgHeIU6AGPDcjK4ionKdlXLWT/geEJrxPPS', '26637542E'),
(46, 'pLama2674', 123456789, 'patri2@hello.com', '$2y$10$tMS.jIGJcx8bHQukPpsDg.VsIJARwiJidN./JdXn0MxlxQwKn9cVq', '26637542E');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `barris`
--
ALTER TABLE `barris`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `districtes`
--
ALTER TABLE `districtes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_USUARIO_INMUEBLE` (`usuarioId`),
  ADD KEY `FK_DISTRITO_INMUEBLE` (`id_distrito`),
  ADD KEY `FK_BARRI_INMUEBLE` (`id_barri`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `barris`
--
ALTER TABLE `barris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT de la tabla `districtes`
--
ALTER TABLE `districtes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD CONSTRAINT `FK_BARRI_INMUEBLE` FOREIGN KEY (`id_barri`) REFERENCES `barris` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_DISTRITO_INMUEBLE` FOREIGN KEY (`id_distrito`) REFERENCES `districtes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_USUARIO_INMUEBLE` FOREIGN KEY (`usuarioId`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
