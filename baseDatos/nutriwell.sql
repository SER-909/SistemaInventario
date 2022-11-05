-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2022 a las 20:29:40
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nutriwell`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` int(11) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `numSerie` varchar(20) NOT NULL,
  `claveInventario` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `marcaMon` varchar(20) NOT NULL,
  `modeloMon` varchar(50) NOT NULL,
  `numSerialMon` varchar(50) NOT NULL,
  `so` varchar(20) NOT NULL,
  `claveSO` varchar(50) NOT NULL,
  `marcaT` varchar(20) NOT NULL,
  `modeloT` varchar(20) NOT NULL,
  `numSerialT` varchar(20) NOT NULL,
  `marcaMouse` varchar(20) NOT NULL,
  `modeloMouse` varchar(20) NOT NULL,
  `numSerialMouse` varchar(20) NOT NULL,
  `observaciones` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `marca`, `modelo`, `numSerie`, `claveInventario`, `estado`, `tipo`, `marcaMon`, `modeloMon`, `numSerialMon`, `so`, `claveSO`, `marcaT`, `modeloT`, `numSerialT`, `marcaMouse`, `modeloMouse`, `numSerialMouse`, `observaciones`) VALUES
(1, 'HP', 'CX789734CM', '43543543NCM', 'NW-AIO-0033', 'BUENO ', 'AIO', 'N/A', 'N/A', 'N/A', 'WINDOWS 7', '4354343-43534-34534-', '43534', 'EFEWS', 'SFFSD', 'SDFSD', 'DFSD', 'DSFDS', 'SDFSDFSDFSDFSDFSDFSDFSDFDFDFFDFDSFSDFSDFDSFDSFDDFS'),
(2, 'HP', 'CX789734CM', '43543543NCM', 'NW-AIO-0033', 'BUENO ', 'AIO', 'N/A', 'N/A', 'N/A', 'WINDOWS 7', '4354343-43534-34534-', '43534', 'EFEWS', 'SFFSD', 'SDFSD', 'DFSD', 'DSFDS', 'FDGHDFGFDG'),
(3, 'HP', 'CX789734CM', '43543543NCM', 'NW-AIO-0033', 'BUENO ', 'AIO', 'N/A', 'N/A', 'N/A', 'WINDOWS 7', '4354343-43534-34534-345643', '43534', 'EFEWS', 'SFFSD', 'SDFSD', 'DFSD', 'DSFDS', 'GFHFGHFHFG'),
(4, 'dfsdf', 'sdfsdf', 'sdfsd', 'sdfdsf', 'Regular', 'AIO', 'N/A', 'N/A', 'N/A', 'Windows 7 profession', 'sdfdsf', 'sdfsdf', 'sfsdf', 'sdfsd', 'sdfds', 'fghgfhfg', 'fdsfds', 'sdfdsf'),
(5, 'dfsdf', 'sdfsdf', 'sdfsd', 'sdfdsf', 'Regular', 'AIO', 'N/A', 'N/A', 'N/A', 'Windows 7 profession', 'sdfdsf', 'sdfsdf', 'sfsdf', 'sdfsd', 'sdfds', 'fghgfhfg', 'fdsfds', 'sdfdsf');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
