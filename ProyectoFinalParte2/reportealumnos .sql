-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2018 a las 05:52:55
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `paselista`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportealumnos`
--

CREATE TABLE `reportealumnos` (
  `identificador` int(11) NOT NULL,
  `periodo` char(4) NOT NULL,
  `ncontrol` char(9) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `materia` varchar(7) NOT NULL,
  `grupo` char(2) NOT NULL,
  `faltas` int(11) NOT NULL,
  `asistencias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reportealumnos`
--

INSERT INTO `reportealumnos` (`identificador`, `periodo`, `ncontrol`, `nombre`, `materia`, `grupo`, `faltas`, `asistencias`) VALUES
(151, '2181', '13170233', 'ALVARO', 'RESSIST', '9E', 0, 1),
(152, '2181', '12170643', 'RAFAEL', 'RESSIST', '9E', 1, 0),
(153, '2181', '13170295', 'GUSTAVO', 'RESSIST', '9E', 0, 1),
(154, '2181', '11170085', 'JESUS AMADO', 'RESSIST', '9E', 1, 0),
(155, '2181', '14170868', 'ILIANA PATRICIA', 'AEB1055', '8A', 2, 2),
(156, '2181', '13170242', 'KEVIN ANTONIO', 'AEB1055', '8A', 1, 4),
(157, '2181', '14170909', 'DANIEL FELIPE', 'AEB1055', '8A', 2, 3),
(158, '2181', '14170939', 'QUETZALLY', 'AEB1055', '8A', 1, 2),
(159, '2181', '14170912', 'RICARDO ERNESTO', 'AEB1055', '8A', 1, 2),
(160, '2181', '14170916', 'JAIME', 'AEB1055', '8A', 2, 2),
(161, '2181', '14170988', 'BRYAN DAVID', 'AEB1055', '8A', 0, 2),
(162, '2181', '14170985', 'JESUS ANDRES', 'AEB1055', '8A', 2, 2),
(163, '2181', '14170933', 'LUIS FERNANDO', 'AEB1055', '8A', 1, 1),
(164, '2181', '13170286', 'BASILIO STAMATIOS', 'AEB1055', '8A', 1, 1),
(165, '2181', '14171016', 'MARIO', 'AEB1055', '8A', 3, 0),
(166, '2181', '14171000', 'JOSE CARLOS', 'AEB1055', '8A', 0, 3),
(167, '2181', '13170115', 'JAVIER GILBERTO', 'AEB1055', '8A', 1, 2),
(168, '2181', '14171007', 'JOSE MARIO', 'AEB1055', '8A', 3, 1),
(169, '2181', '14170872', 'MOISES ORLANDO', 'AEB1055', '8A', 2, 2),
(170, '2181', '14170928', 'GUSTAVO ANDRES', 'AEB1055', '8A', 1, 3),
(171, '2181', '14170969', 'SANTIAGO', 'AEB1055', '8A', 0, 3),
(172, '2181', '13170344', 'GUADALUPE YAMILETH', 'AEB1055', '8A', 2, 1),
(173, '2181', '14170908', 'CARLOS ALBERTO', 'AEB1055', '8A', 1, 0),
(174, '2181', '14171005', 'JESUS GABINO', 'AEB1055', '8A', 1, 2),
(175, '2181', '14171009', 'JOEL ALBERTO', 'AEB1055', '8A', 1, 2),
(176, '2181', '13170362', 'AARON JERONIMO', 'AEB1055', '8A', 0, 2),
(177, '2181', '14170993', 'EZAITH', 'AEB1055', '8A', 0, 1),
(178, '2181', '14171229', 'GASTON DANIEL', 'TIB1025', '6A', 1, 3),
(179, '2181', '15171251', 'NITZIA ANGELICA', 'TIB1025', '6A', 2, 2),
(180, '2181', '15171256', 'LUIS EDUARDO', 'TIB1025', '6A', 2, 2),
(181, '2181', '15171259', 'PRISCILA JANETH', 'TIB1025', '6A', 1, 3),
(182, '2181', '14171211', 'TERESA ANDREA', 'TIB1025', '6A', 0, 1),
(183, '2181', '15171325', 'KAREN GUADALUPE', 'TIB1025', '6A', 3, 0),
(184, '2181', '14171196', 'JOHANA GUADALUPE', 'TIB1025', '6A', 3, 0),
(185, '2181', '13170369', 'KARLA GUADALUPE', 'TIB1025', '6A', 3, 1),
(186, '2181', '15171248', 'VALERIA ABIGAIL', 'TIB1025', '6A', 1, 1),
(187, '2181', '15171239', 'JESUS', 'TIB1025', '6A', 1, 1),
(188, '2181', '15171263', 'VICTOR MANUEL', 'TIB1025', '6A', 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reportealumnos`
--
ALTER TABLE `reportealumnos`
  ADD PRIMARY KEY (`identificador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reportealumnos`
--
ALTER TABLE `reportealumnos`
  MODIFY `identificador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
