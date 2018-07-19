-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 19-07-2018 a las 07:31:41
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `BD_CAI`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Actividad`
--

CREATE TABLE `Actividad` (
  `id_actividad` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Alumnos`
--

CREATE TABLE `Alumnos` (
  `matricula` int(7) NOT NULL,
  `nombre_completo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Grupo`
--

CREATE TABLE `Grupo` (
  `id_grupo` int(11) NOT NULL,
  `id_nivel` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `nombre` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `numero_unidades` int(11) NOT NULL,
  `horas_unidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Nivel`
--

CREATE TABLE `Nivel` (
  `id_nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Nivel`
--

INSERT INTO `Nivel` (`id_nivel`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Teacher`
--

CREATE TABLE `Teacher` (
  `id_teacher` int(11) NOT NULL,
  `nombre_completo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Teacher`
--

INSERT INTO `Teacher` (`id_teacher`, `nombre_completo`, `username`, `password`, `tipo`) VALUES
(1, 'Patricia Carranza', 'paty', 'paty', 1),
(2, 'JACOBO BRIONES', 'jacob', 'jacob', 2),
(4, 'ARTURO PERALES', 'arturo', 'arturo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Visitas`
--

CREATE TABLE `Visitas` (
  `id_registro` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_salida` time NOT NULL,
  `id_nivel` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `unidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Actividad`
--
ALTER TABLE `Actividad`
  ADD PRIMARY KEY (`id_actividad`);

--
-- Indices de la tabla `Alumnos`
--
ALTER TABLE `Alumnos`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `id_grupo` (`id_grupo`);

--
-- Indices de la tabla `Grupo`
--
ALTER TABLE `Grupo`
  ADD PRIMARY KEY (`id_grupo`),
  ADD KEY `id_nivel` (`id_nivel`),
  ADD KEY `id_teacher` (`id_teacher`);

--
-- Indices de la tabla `Nivel`
--
ALTER TABLE `Nivel`
  ADD PRIMARY KEY (`id_nivel`);

--
-- Indices de la tabla `Teacher`
--
ALTER TABLE `Teacher`
  ADD PRIMARY KEY (`id_teacher`);

--
-- Indices de la tabla `Visitas`
--
ALTER TABLE `Visitas`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `id_nivel` (`id_nivel`),
  ADD KEY `id_teacher` (`id_teacher`),
  ADD KEY `matricula` (`matricula`),
  ADD KEY `id_actividad` (`id_actividad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Actividad`
--
ALTER TABLE `Actividad`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Alumnos`
--
ALTER TABLE `Alumnos`
  MODIFY `matricula` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Grupo`
--
ALTER TABLE `Grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Teacher`
--
ALTER TABLE `Teacher`
  MODIFY `id_teacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `Visitas`
--
ALTER TABLE `Visitas`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Alumnos`
--
ALTER TABLE `Alumnos`
  ADD CONSTRAINT `Alumnos_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `Grupo` (`id_grupo`);

--
-- Filtros para la tabla `Grupo`
--
ALTER TABLE `Grupo`
  ADD CONSTRAINT `Grupo_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `Teacher` (`id_teacher`),
  ADD CONSTRAINT `Grupo_ibfk_2` FOREIGN KEY (`id_nivel`) REFERENCES `Nivel` (`id_nivel`);

--
-- Filtros para la tabla `Visitas`
--
ALTER TABLE `Visitas`
  ADD CONSTRAINT `Visitas_ibfk_1` FOREIGN KEY (`id_nivel`) REFERENCES `Nivel` (`id_nivel`),
  ADD CONSTRAINT `Visitas_ibfk_2` FOREIGN KEY (`matricula`) REFERENCES `Alumnos` (`matricula`),
  ADD CONSTRAINT `Visitas_ibfk_3` FOREIGN KEY (`id_actividad`) REFERENCES `Actividad` (`id_actividad`),
  ADD CONSTRAINT `Visitas_ibfk_4` FOREIGN KEY (`id_teacher`) REFERENCES `Teacher` (`id_teacher`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
