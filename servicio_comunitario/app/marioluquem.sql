-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-10-2016 a las 19:59:14
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
`id` int(11) NOT NULL,
  `disponibilidad` varchar(50) DEFAULT NULL,
  `imagen_cancha` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disciplina`
--

CREATE TABLE IF NOT EXISTS `disciplina` (
`id` int(11) NOT NULL,
  `nombre_disciplina` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `disciplina`
--

INSERT INTO `disciplina` (`id`, `nombre_disciplina`) VALUES
(1, 'FUTBOL CAMPO'),
(2, 'FUTBOL SALA'),
(3, 'VOLEIBOL'),
(4, 'BASKET'),
(5, 'TENIS DE MESA'),
(6, 'TENIS DE MESA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE IF NOT EXISTS `equipo` (
`id` int(11) NOT NULL,
  `nombre_equipo` varchar(50) NOT NULL,
  `fk_disciplina` int(11) NOT NULL,
  `genero` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id`, `nombre_equipo`, `fk_disciplina`, `genero`) VALUES
(1, 'Los Guerreros', 1, 'Masculino'),
(2, 'guerreros', 1, 'Masculino'),
(3, 'ThunderCat', 3, 'Masculino'),
(4, 'Powerpuff', 2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PARTIDO`
--

CREATE TABLE IF NOT EXISTS `PARTIDO` (
`id` int(11) NOT NULL,
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
`id` int(11) NOT NULL,
  `tipo_rol` char(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ROL`
--

INSERT INTO `ROL` (`id`, `tipo_rol`) VALUES
(1, 'A'),
(2, 'D'),
(3, 'U');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TORNEO`
--

CREATE TABLE IF NOT EXISTS `TORNEO` (
`id` int(11) NOT NULL,
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
`id` int(11) NOT NULL,
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

INSERT INTO `UNIVERSIDAD` (`id`, `nombre_universidad`, `acronimo`, `codigo_inscripcion`, `direccion_universidad`, `imagen_universidad`, `rif_universidad`) VALUES
(1, 'Universidad Catolica Andres Bello', 'UCAB', 'n94luqetcr', 'Montalban', 'logo ucab.tiff', 'J-19841245'),
(2, 'Universidad Santa Maria', 'USM', 'i2kiy33dyb', 'PETARE', 'pelicula.jpg', 'J-19657333');

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
(19841247, 'clara', '$2y$10$T4EufOe8Mqsd2K3YtGN3VOuijqS9gebVwT.5QmUvnmNsiWRriaNgK', 'clara', 'rosa', 'aguilarte', 'trias', 'clara.at48@gmail.com', '1990-02-24', 'f', 'pelicula.jpg', 'cedula.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USU_EQUI_UNI`
--

CREATE TABLE IF NOT EXISTS `USU_EQUI_UNI` (
  `representante` tinyint(1) DEFAULT NULL,
  `fk_usuario` int(11) DEFAULT NULL,
  `fk_universidad` int(11) NOT NULL,
  `fk_equipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `USU_EQUI_UNI`
--

INSERT INTO `USU_EQUI_UNI` (`representante`, `fk_usuario`, `fk_universidad`, `fk_equipo`) VALUES
(NULL, NULL, 2, 1),
(NULL, NULL, 1, 2),
(NULL, NULL, 1, 3),
(NULL, NULL, 2, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `CANCHA`
--
ALTER TABLE `CANCHA`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `disciplina`
--
ALTER TABLE `disciplina`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_disciplina` (`fk_disciplina`);

--
-- Indices de la tabla `PARTIDO`
--
ALTER TABLE `PARTIDO`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_torneo` (`fk_torneo`), ADD KEY `fk_equipo1` (`fk_equipo1`), ADD KEY `fk_equipo2` (`fk_equipo2`), ADD KEY `fk_cancha` (`fk_cancha`);

--
-- Indices de la tabla `ROL`
--
ALTER TABLE `ROL`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `TORNEO`
--
ALTER TABLE `TORNEO`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `TOR_EQUI`
--
ALTER TABLE `TOR_EQUI`
 ADD KEY `fk_torneo` (`fk_torneo`), ADD KEY `fk_equipo` (`fk_equipo`);

--
-- Indices de la tabla `UNIVERSIDAD`
--
ALTER TABLE `UNIVERSIDAD`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `USUARIO`
--
ALTER TABLE `USUARIO`
 ADD PRIMARY KEY (`cedula`), ADD KEY `fk_rol` (`fk_rol`);

--
-- Indices de la tabla `USU_EQUI_UNI`
--
ALTER TABLE `USU_EQUI_UNI`
 ADD KEY `fk_usuario` (`fk_usuario`), ADD KEY `fk_universidad` (`fk_universidad`), ADD KEY `fk_equipo` (`fk_equipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `CANCHA`
--
ALTER TABLE `CANCHA`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `disciplina`
--
ALTER TABLE `disciplina`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `PARTIDO`
--
ALTER TABLE `PARTIDO`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ROL`
--
ALTER TABLE `ROL`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `TORNEO`
--
ALTER TABLE `TORNEO`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `UNIVERSIDAD`
--
ALTER TABLE `UNIVERSIDAD`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
ADD CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`fk_disciplina`) REFERENCES `DISCIPLINA` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `PARTIDO`
--
ALTER TABLE `PARTIDO`
ADD CONSTRAINT `partido_ibfk_1` FOREIGN KEY (`fk_torneo`) REFERENCES `TORNEO` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `partido_ibfk_2` FOREIGN KEY (`fk_equipo1`) REFERENCES `EQUIPO` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `partido_ibfk_3` FOREIGN KEY (`fk_equipo2`) REFERENCES `EQUIPO` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `partido_ibfk_4` FOREIGN KEY (`fk_cancha`) REFERENCES `CANCHA` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `TOR_EQUI`
--
ALTER TABLE `TOR_EQUI`
ADD CONSTRAINT `tor_equi_ibfk_1` FOREIGN KEY (`fk_torneo`) REFERENCES `TORNEO` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tor_equi_ibfk_2` FOREIGN KEY (`fk_equipo`) REFERENCES `EQUIPO` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `USUARIO`
--
ALTER TABLE `USUARIO`
ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`fk_rol`) REFERENCES `ROL` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `USU_EQUI_UNI`
--
ALTER TABLE `USU_EQUI_UNI`
ADD CONSTRAINT `usu_equi_uni_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `USUARIO` (`cedula`) ON DELETE CASCADE,
ADD CONSTRAINT `usu_equi_uni_ibfk_2` FOREIGN KEY (`fk_universidad`) REFERENCES `UNIVERSIDAD` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `usu_equi_uni_ibfk_3` FOREIGN KEY (`fk_equipo`) REFERENCES `EQUIPO` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
