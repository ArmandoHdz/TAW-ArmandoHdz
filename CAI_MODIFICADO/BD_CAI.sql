-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 23-07-2018 a las 10:56:57
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

--
-- Volcado de datos para la tabla `Actividad`
--

INSERT INTO `Actividad` (`id_actividad`, `nombre`) VALUES
(1, 'PC'),
(3, 'BOOK'),
(4, 'GAME');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Alumnos`
--

CREATE TABLE `Alumnos` (
  `matricula` int(7) NOT NULL,
  `nombre_completo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Alumnos`
--

INSERT INTO `Alumnos` (`matricula`, `nombre_completo`, `id_carrera`, `id_grupo`) VALUES
(1530108, 'GABRIELA ROBLES RODRIGUEZ', 1, 4),
(1530312, 'ANGELA JUDITH CARRIZALES PEREZ', 1, 24),
(1530342, 'NORBERTO III MORALES AVITIA', 1, 4),
(1530343, 'ARMANDO ISAAC HERNANDEZ MUNIZ', 1, 4),
(1530452, 'DAVID TOVIAS ALANIS', 5, 24),
(1531230, 'BRIAN ELI BECERRA HERNANDEZ', 3, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Carreras`
--

CREATE TABLE `Carreras` (
  `id_carrera` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Carreras`
--

INSERT INTO `Carreras` (`id_carrera`, `nombre`) VALUES
(1, 'INGENIERIA EN TECNOLOGIAS DE LA INFORMACION'),
(2, 'INGENIERIA EN SISTEMAS AUTOMOTRICES'),
(3, 'INGENIERIA EN MANUFACTURA'),
(4, 'INGENIERIA EN MECATRONICA'),
(5, 'ADMINISTRACION DE PYMES');

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

--
-- Volcado de datos para la tabla `Grupo`
--

INSERT INTO `Grupo` (`id_grupo`, `id_nivel`, `id_teacher`, `nombre`, `numero_unidades`, `horas_unidad`) VALUES
(3, 1, 2, '1-1', 3, 4),
(4, 9, 2, '9-2', 4, 5),
(5, 3, 6, '3-1', 4, 5),
(21, 2, 6, '2-1', 4, 4),
(23, 2, 2, '2-2', 4, 5),
(24, 4, 7, '4-1', 5, 4);

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
(6, 'ARLETH GALVAN FRAUSTO', 'arleth', 'arleth', 2),
(7, 'JONATHAN MORALES', 'jony', 'jony', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Visitas`
--

CREATE TABLE `Visitas` (
  `id_registro` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_salida` time NOT NULL,
  `id_nivel` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `unidad` int(11) NOT NULL,
  `horario` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Visitas`
--

INSERT INTO `Visitas` (`id_registro`, `hora_inicio`, `hora_salida`, `id_nivel`, `id_grupo`, `matricula`, `id_actividad`, `unidad`, `horario`) VALUES
(1, '07:04:00', '00:00:00', 4, 24, 1531230, 1, 1, '7:00 - 7:54 2018-7-22'),
(2, '07:04:00', '00:00:00', 4, 24, 1530312, 1, 1, '7:00 - 7:54 2018-7-22'),
(5, '07:56:00', '00:00:00', 4, 24, 1530452, 4, 2, '7:55 - 8:49 2018-7-22'),
(6, '07:09:00', '00:00:00', 4, 24, 1530312, 1, 1, '7:00 - 7:54 2018-7-23'),
(7, '07:09:00', '00:00:00', 4, 24, 1530452, 3, 3, '7:00 - 7:54 2018-7-23');

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
  ADD KEY `id_grupo` (`id_grupo`),
  ADD KEY `id_carrera` (`id_carrera`);

--
-- Indices de la tabla `Carreras`
--
ALTER TABLE `Carreras`
  ADD PRIMARY KEY (`id_carrera`);

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
  ADD KEY `id_teacher` (`id_grupo`),
  ADD KEY `matricula` (`matricula`),
  ADD KEY `id_actividad` (`id_actividad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Actividad`
--
ALTER TABLE `Actividad`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Alumnos`
--
ALTER TABLE `Alumnos`
  MODIFY `matricula` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1531231;

--
-- AUTO_INCREMENT de la tabla `Carreras`
--
ALTER TABLE `Carreras`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `Grupo`
--
ALTER TABLE `Grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `Teacher`
--
ALTER TABLE `Teacher`
  MODIFY `id_teacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `Visitas`
--
ALTER TABLE `Visitas`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Alumnos`
--
ALTER TABLE `Alumnos`
  ADD CONSTRAINT `Alumnos_ibfk_2` FOREIGN KEY (`id_carrera`) REFERENCES `Carreras` (`id_carrera`),
  ADD CONSTRAINT `Alumnos_ibfk_3` FOREIGN KEY (`id_grupo`) REFERENCES `Grupo` (`id_grupo`);

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
  ADD CONSTRAINT `Visitas_ibfk_4` FOREIGN KEY (`id_grupo`) REFERENCES `Grupo` (`id_grupo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
