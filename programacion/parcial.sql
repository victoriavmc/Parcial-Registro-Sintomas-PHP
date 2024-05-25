-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2024 a las 00:41:01
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parcial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `pers_idpersonal` int(11) NOT NULL,
  `pers_nombre` varchar(65) DEFAULT NULL,
  `pers_apellido` varchar(65) DEFAULT NULL,
  `pers_fecha` date DEFAULT NULL,
  `pers_hora` time DEFAULT NULL,
  `pers_temperatura` tinyint(1) DEFAULT NULL,
  `pers_tos` tinyint(1) DEFAULT NULL,
  `pers_insuficienciaRespiratoria` tinyint(1) DEFAULT NULL,
  `pers_dolorDeGarganta` tinyint(1) DEFAULT NULL,
  `pers_perdidaDelOlfato` tinyint(1) DEFAULT NULL,
  `pers_perdidaDelGusto` tinyint(1) DEFAULT NULL,
  `pers_otrosSintomas` varchar(255) DEFAULT NULL,
  `pers_tuvoContactoAislamiento` tinyint(1) DEFAULT NULL,
  `pers_tuvoContactoUltDias` tinyint(1) DEFAULT NULL,
  `pers_lugarViaje` varchar(65) DEFAULT NULL,
  `pers_observaciones` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`pers_idpersonal`, `pers_nombre`, `pers_apellido`, `pers_fecha`, `pers_hora`, `pers_temperatura`, `pers_tos`, `pers_insuficienciaRespiratoria`, `pers_dolorDeGarganta`, `pers_perdidaDelOlfato`, `pers_perdidaDelGusto`, `pers_otrosSintomas`, `pers_tuvoContactoAislamiento`, `pers_tuvoContactoUltDias`, `pers_lugarViaje`, `pers_observaciones`) VALUES
(1, 'Victoria Valentina', 'Maidana Corti', '2024-05-24', '18:43:10', 0, 0, 0, 0, 0, 0, 'Ninguno', 0, 0, 'Ninguno', 'Ninguno'),
(4, 'Victoria', 'VMC', '2024-05-24', '19:39:26', 0, 1, 0, 1, 0, 0, 'Quiere Pepsi', 0, 1, 'Argentina', 'Tomo lavandina pensando que era Aquarius'),
(6, 'Generik', 'Nomas', '2024-05-24', '19:38:04', 1, 1, 1, 1, 1, 1, 'Ninguno', 1, 1, 'Paraguay', 'Ninguno');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`pers_idpersonal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `pers_idpersonal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
