-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-07-2018 a las 14:59:22
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ccss_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_control_citas`
--

CREATE TABLE `tbl_control_citas` (
  `id_control_citas` int(11) NOT NULL,
  `fecha_cita` date NOT NULL,
  `hora_cita` time NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_especialista` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `sintomas` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tratamiento` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_departamento`
--

CREATE TABLE `tbl_departamento` (
  `id_departamento` int(11) NOT NULL,
  `nombre_departamento` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `desc_departamento` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_especialidad`
--

CREATE TABLE `tbl_especialidad` (
  `id_especialidad` int(11) NOT NULL,
  `nombre_especialidad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `desc_especialidad` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_localidad`
--

CREATE TABLE `tbl_localidad` (
  `id_localidad` int(11) NOT NULL,
  `nombre_localidad` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `provincia` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pacientes`
--

CREATE TABLE `tbl_pacientes` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `localidad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `tipo_sangre` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `contacto_emergencia` varchar(75) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `departamento` int(11) NOT NULL,
  `localidad` int(11) NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `rol` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_control_citas`
--
ALTER TABLE `tbl_control_citas`
  ADD PRIMARY KEY (`id_control_citas`),
  ADD KEY `FK_especialidad` (`id_especialidad`);

--
-- Indices de la tabla `tbl_departamento`
--
ALTER TABLE `tbl_departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `tbl_especialidad`
--
ALTER TABLE `tbl_especialidad`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `tbl_localidad`
--
ALTER TABLE `tbl_localidad`
  ADD PRIMARY KEY (`id_localidad`);

--
-- Indices de la tabla `tbl_pacientes`
--
ALTER TABLE `tbl_pacientes`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`cedula`),
  ADD KEY `FK_localidad` (`localidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_control_citas`
--
ALTER TABLE `tbl_control_citas`
  MODIFY `id_control_citas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_departamento`
--
ALTER TABLE `tbl_departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_especialidad`
--
ALTER TABLE `tbl_especialidad`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_localidad`
--
ALTER TABLE `tbl_localidad`
  MODIFY `id_localidad` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_control_citas`
--
ALTER TABLE `tbl_control_citas`
  ADD CONSTRAINT `FK_especialidad` FOREIGN KEY (`id_especialidad`) REFERENCES `tbl_especialidad` (`id_especialidad`);

--
-- Filtros para la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD CONSTRAINT `FK_localidad` FOREIGN KEY (`localidad`) REFERENCES `tbl_localidad` (`id_localidad`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
