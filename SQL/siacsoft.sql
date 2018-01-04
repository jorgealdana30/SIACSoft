-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-06-2017 a las 05:09:36
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siacsoft`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `Codigo` varchar(50) NOT NULL DEFAULT '0',
  `Nombre` varchar(255) NOT NULL DEFAULT '',
  `Observaciones` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `Identificacion` int(11) NOT NULL DEFAULT '0',
  `Nombres` varchar(255) NOT NULL DEFAULT '',
  `Apellidos` varchar(255) NOT NULL DEFAULT '',
  `Genero` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentescursos`
--

CREATE TABLE `docentescursos` (
  `id` int(11) NOT NULL,
  `idDocente` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `Identificacion` int(11) NOT NULL DEFAULT '0',
  `Nombres` varchar(255) NOT NULL DEFAULT '',
  `Apellidos` varchar(255) NOT NULL DEFAULT '',
  `Genero` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantescursos`
--

CREATE TABLE `estudiantescursos` (
  `id` int(11) NOT NULL,
  `idEst` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `Id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL DEFAULT '',
  `Contrasena` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`Id`, `user`, `Contrasena`) VALUES
(1, 'Admin', '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`Identificacion`);

--
-- Indices de la tabla `docentescursos`
--
ALTER TABLE `docentescursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `docentescursos_docentes_Identificacion_fk` (`idDocente`),
  ADD KEY `docentescursos_curso_Codigo_fk` (`idCurso`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`Identificacion`);

--
-- Indices de la tabla `estudiantescursos`
--
ALTER TABLE `estudiantescursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estudiantescursos_estudiantes_Identificacion_fk` (`idEst`),
  ADD KEY `estudiantescursos_curso_Codigo_fk` (`idCurso`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `docentescursos`
--
ALTER TABLE `docentescursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estudiantescursos`
--
ALTER TABLE `estudiantescursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
