-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-10-2016 a las 23:01:56
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `marioluquem`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CANCHA`
--

CREATE TABLE IF NOT EXISTS `CANCHA` (
`id_cancha` int(11) NOT NULL,
  `disponibilidad` varchar(50) DEFAULT NULL,
  `imagen_cancha` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DISCIPLINA`
--

CREATE TABLE IF NOT EXISTS `DISCIPLINA` (
`id_disciplina` int(11) NOT NULL,
  `nombre_disciplina` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `DISCIPLINA`
--

INSERT INTO `DISCIPLINA` (`id_disciplina`, `nombre_disciplina`) VALUES
(1, 'FUTBOL CAMPO'),
(2, 'FUTBOL SALA'),
(3, 'VOLEIBOL'),
(4, 'BASKET'),
(5, 'TENIS DE MESA'),
(6, 'AJEDREZ'),
(7, 'VOLEIBOL DE PLAYA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EQUIPO`
--

CREATE TABLE IF NOT EXISTS `EQUIPO` (
`id_equipo` int(11) NOT NULL,
  `nombre_equipo` varchar(50) NOT NULL,
  `genero_equipo` char(1) NOT NULL,
  `fk_disciplina` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `EQUIPO`
--

INSERT INTO `EQUIPO` (`id_equipo`, `nombre_equipo`, `genero_equipo`, `fk_disciplina`) VALUES
(1, 'Guerreros de Antimano', 'M', 1),
(2, 'Guerreros de Antimano', 'M', 1),
(3, 'Powerpuff', 'F', 7),
(4, 'Guaros', 'M', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `INSCRIPCION`
--

CREATE TABLE IF NOT EXISTS `INSCRIPCION` (
`id_inscripcion` int(11) NOT NULL,
  `fecha_limite` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `INSCRIPCION`
--

INSERT INTO `INSCRIPCION` (`id_inscripcion`, `fecha_limite`) VALUES
(1, '2016-10-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PARTIDO`
--

CREATE TABLE IF NOT EXISTS `PARTIDO` (
`id_partido` int(11) NOT NULL,
  `fecha_partido` date NOT NULL,
  `puntos_equipo1` int(11) DEFAULT NULL,
  `puntos_equipo2` int(11) DEFAULT NULL,
  `fk_torneo` int(11) NOT NULL,
  `fk_equipo1` int(11) NOT NULL,
  `fk_equipo2` int(11) NOT NULL,
  `fk_cancha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ROL`
--

CREATE TABLE IF NOT EXISTS `ROL` (
`id_rol` int(11) NOT NULL,
  `tipo_rol` char(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ROL`
--

INSERT INTO `ROL` (`id_rol`, `tipo_rol`) VALUES
(1, 'A'),
(2, 'D'),
(3, 'U');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TORNEO`
--

CREATE TABLE IF NOT EXISTS `TORNEO` (
`id_torneo` int(11) NOT NULL,
  `nombre_torneo` varchar(50) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `tipo_torneo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TOR_EQUI`
--

CREATE TABLE IF NOT EXISTS `TOR_EQUI` (
  `puntuacion` int(11) NOT NULL,
  `fk_torneo` int(11) NOT NULL,
  `fk_equipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `UNIVERSIDAD`
--

CREATE TABLE IF NOT EXISTS `UNIVERSIDAD` (
`id_universidad` int(11) NOT NULL,
  `nombre_universidad` varchar(100) NOT NULL,
  `acronimo` varchar(10) NOT NULL,
  `codigo_inscripcion` varchar(20) NOT NULL,
  `direccion_universidad` text,
  `imagen_universidad` text,
  `rif_universidad` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `UNIVERSIDAD`
--

INSERT INTO `UNIVERSIDAD` (`id_universidad`, `nombre_universidad`, `acronimo`, `codigo_inscripcion`, `direccion_universidad`, `imagen_universidad`, `rif_universidad`) VALUES
(1, 'Universidad Catolica Andres Bello', 'UCAB', '5pzxmqu5jz', 'Montalban', 'logo ucab.tiff', 'J-19657333'),
(2, 'Universidad Santa Maria', 'USM', 'olcz3pup51', 'Terrazas del Avila', 'pelicula.jpg', 'J-19841245');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIO`
--

CREATE TABLE IF NOT EXISTS `USUARIO` (
  `cedula` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `primer_nombre` varchar(30) NOT NULL,
  `segundo_nombre` varchar(30) DEFAULT NULL,
  `primer_apellido` varchar(30) NOT NULL,
  `segundo_apellido` varchar(30) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` char(1) NOT NULL,
  `foto` text NOT NULL,
  `dni` text NOT NULL,
  `fk_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `USUARIO`
--

INSERT INTO `USUARIO` (`cedula`, `usuario`, `password`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `correo`, `fecha_nacimiento`, `sexo`, `foto`, `dni`, `fk_rol`) VALUES
(18257123, 'pedrito', '$2y$10$JTFgwEIP.DFQrtvC82luWOdaZTHa77Wn32zi8NVglRfFSOk/LSbDW', 'Pedro', 'Alberto', 'Perez', 'Lopez', 'perezlopedro@gmail.com', '1998-11-05', '', 'ancons2.jpg', 'Unknown.png', 2),
(19650337, 'ovidio', '$2y$10$/NlTt4Hnx8CfTO7qaF4zquiyb6HqfOM0fV6/oQIB6Ae1WtFJHKjQW', 'Ovidio', 'Jose', 'Dominguez', 'Omana', 'ovido22_9@hotmail.com', '1990-11-28', '', 'pelicula.jpg', 'pelicula.jpg', 2),
(19841247, 'clara', '$2y$10$pRUfgQKOQAoJL6mtwRZ66.DFIEu20fOFzwUClZBVfmoKVQYr7zWCy', 'Clara', 'Rosa', 'Aguilarte', 'Trias', 'clara.at48@gmail.com', '1990-02-24', 'F', 'pelicula.jpg', 'pelicula.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usu_equi_uni`
--

CREATE TABLE IF NOT EXISTS `usu_equi_uni` (
  `fk_usuario` int(11) DEFAULT NULL,
  `fk_universidad` int(11) NOT NULL,
  `fk_equipo` int(11) NOT NULL,
  `rol_equipo` varchar(50) DEFAULT NULL,
  `representante` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usu_equi_uni`
--

INSERT INTO `usu_equi_uni` (`fk_usuario`, `fk_universidad`, `fk_equipo`, `rol_equipo`, `representante`) VALUES
(NULL, 1, 1, NULL, NULL),
(NULL, 1, 1, NULL, NULL),
(NULL, 2, 3, NULL, NULL),
(NULL, 1, 4, NULL, NULL),
(19650337, 1, 1, 'Entrenador', NULL),
(19650337, 2, 3, 'Entrenador', NULL),
(19841247, 1, 4, 'Entrenador', NULL),
(19841247, 2, 3, 'Jugador', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `CANCHA`
--
ALTER TABLE `CANCHA`
 ADD PRIMARY KEY (`id_cancha`);

--
-- Indices de la tabla `DISCIPLINA`
--
ALTER TABLE `DISCIPLINA`
 ADD PRIMARY KEY (`id_disciplina`);

--
-- Indices de la tabla `EQUIPO`
--
ALTER TABLE `EQUIPO`
 ADD PRIMARY KEY (`id_equipo`), ADD KEY `fk_disciplina` (`fk_disciplina`);

--
-- Indices de la tabla `INSCRIPCION`
--
ALTER TABLE `INSCRIPCION`
 ADD PRIMARY KEY (`id_inscripcion`);

--
-- Indices de la tabla `PARTIDO`
--
ALTER TABLE `PARTIDO`
 ADD PRIMARY KEY (`id_partido`), ADD KEY `fk_torneo` (`fk_torneo`), ADD KEY `fk_equipo1` (`fk_equipo1`), ADD KEY `fk_equipo2` (`fk_equipo2`), ADD KEY `fk_cancha` (`fk_cancha`);

--
-- Indices de la tabla `ROL`
--
ALTER TABLE `ROL`
 ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `TORNEO`
--
ALTER TABLE `TORNEO`
 ADD PRIMARY KEY (`id_torneo`);

--
-- Indices de la tabla `TOR_EQUI`
--
ALTER TABLE `TOR_EQUI`
 ADD KEY `fk_torneo` (`fk_torneo`), ADD KEY `fk_equipo` (`fk_equipo`);

--
-- Indices de la tabla `UNIVERSIDAD`
--
ALTER TABLE `UNIVERSIDAD`
 ADD PRIMARY KEY (`id_universidad`);

--
-- Indices de la tabla `USUARIO`
--
ALTER TABLE `USUARIO`
 ADD PRIMARY KEY (`cedula`), ADD KEY `fk_rol` (`fk_rol`);

--
-- Indices de la tabla `usu_equi_uni`
--
ALTER TABLE `usu_equi_uni`
 ADD KEY `fk_usuario` (`fk_usuario`), ADD KEY `fk_universidad` (`fk_universidad`), ADD KEY `fk_equipo` (`fk_equipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `CANCHA`
--
ALTER TABLE `CANCHA`
MODIFY `id_cancha` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `DISCIPLINA`
--
ALTER TABLE `DISCIPLINA`
MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `EQUIPO`
--
ALTER TABLE `EQUIPO`
MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `INSCRIPCION`
--
ALTER TABLE `INSCRIPCION`
MODIFY `id_inscripcion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `PARTIDO`
--
ALTER TABLE `PARTIDO`
MODIFY `id_partido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ROL`
--
ALTER TABLE `ROL`
MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `TORNEO`
--
ALTER TABLE `TORNEO`
MODIFY `id_torneo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `UNIVERSIDAD`
--
ALTER TABLE `UNIVERSIDAD`
MODIFY `id_universidad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `EQUIPO`
--
ALTER TABLE `EQUIPO`
ADD CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`fk_disciplina`) REFERENCES `DISCIPLINA` (`id_disciplina`) ON DELETE CASCADE;

--
-- Filtros para la tabla `PARTIDO`
--
ALTER TABLE `PARTIDO`
ADD CONSTRAINT `partido_ibfk_1` FOREIGN KEY (`fk_torneo`) REFERENCES `TORNEO` (`id_torneo`) ON DELETE CASCADE,
ADD CONSTRAINT `partido_ibfk_2` FOREIGN KEY (`fk_equipo1`) REFERENCES `EQUIPO` (`id_equipo`) ON DELETE CASCADE,
ADD CONSTRAINT `partido_ibfk_3` FOREIGN KEY (`fk_equipo2`) REFERENCES `EQUIPO` (`id_equipo`) ON DELETE CASCADE,
ADD CONSTRAINT `partido_ibfk_4` FOREIGN KEY (`fk_cancha`) REFERENCES `CANCHA` (`id_cancha`) ON DELETE CASCADE;

--
-- Filtros para la tabla `TOR_EQUI`
--
ALTER TABLE `TOR_EQUI`
ADD CONSTRAINT `tor_equi_ibfk_1` FOREIGN KEY (`fk_torneo`) REFERENCES `TORNEO` (`id_torneo`) ON DELETE CASCADE,
ADD CONSTRAINT `tor_equi_ibfk_2` FOREIGN KEY (`fk_equipo`) REFERENCES `EQUIPO` (`id_equipo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `USUARIO`
--
ALTER TABLE `USUARIO`
ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`fk_rol`) REFERENCES `ROL` (`id_rol`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usu_equi_uni`
--
ALTER TABLE `usu_equi_uni`
ADD CONSTRAINT `usu_equi_uni_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `USUARIO` (`cedula`) ON DELETE CASCADE,
ADD CONSTRAINT `usu_equi_uni_ibfk_2` FOREIGN KEY (`fk_universidad`) REFERENCES `UNIVERSIDAD` (`id_universidad`) ON DELETE CASCADE,
ADD CONSTRAINT `usu_equi_uni_ibfk_3` FOREIGN KEY (`fk_equipo`) REFERENCES `EQUIPO` (`id_equipo`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
