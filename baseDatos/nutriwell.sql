-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2022 a las 23:09:12
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

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
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL,
  `nombreDep` varchar(40) NOT NULL,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `nombreDep`, `id_empresa`) VALUES
(1, 'Administracion y Finanzas', 1),
(2, 'Sistemas', 2),
(3, 'Recursos Humanos', 2),
(4, 'Contabilidad', 3),
(5, 'Costos', 2),
(6, 'Juridico', 2),
(7, 'Seguridad y Salud Ocupacional', 2),
(8, 'Almacen', 4),
(9, 'Almacen', 1),
(10, 'Calidad', 2),
(11, 'Calidad', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellidoP` varchar(40) NOT NULL,
  `apellidoM` varchar(40) NOT NULL,
  `numEmpleado` int(6) NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `nombre`, `apellidoP`, `apellidoM`, `numEmpleado`, `id_departamento`) VALUES
(60, 'Edgar Adib', 'Acra', 'Zavala', 1011, 1),
(61, 'Alberto', 'Chemor', 'Avila', 147, 2),
(62, 'Armando', 'Lizarraga', 'Bermudez', 889, 3),
(63, 'Mayela Sandra', 'Lopez', 'Muñoz', 451, 4),
(64, 'Alberto Alejandro', 'Sanchez', 'Barreto', 653, 5),
(65, 'Elena Arely', 'Servin', 'Castrejon', 878, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`) VALUES
(1, 'Prosemsa'),
(2, 'NutriWell'),
(3, 'Kikumitsu'),
(4, 'Pedregal'),
(5, 'Cedis');

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
  `so` varchar(35) NOT NULL,
  `claveSO` varchar(50) NOT NULL,
  `marcaT` varchar(20) NOT NULL,
  `modeloT` varchar(20) NOT NULL,
  `numSerialT` varchar(20) NOT NULL,
  `marcaMouse` varchar(20) NOT NULL,
  `modeloMouse` varchar(20) NOT NULL,
  `numSerialMouse` varchar(20) NOT NULL,
  `observaciones` varchar(100) NOT NULL,
  `id_sistema_operativo` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `marca`, `modelo`, `numSerie`, `claveInventario`, `estado`, `tipo`, `marcaMon`, `modeloMon`, `numSerialMon`, `so`, `claveSO`, `marcaT`, `modeloT`, `numSerialT`, `marcaMouse`, `modeloMouse`, `numSerialMouse`, `observaciones`, `id_sistema_operativo`, `id_empleado`) VALUES
(7, 'HP', 'CX789734CM', '43543543NCM', 'NW-AIO-0033', 'Bueno', 'AIO', 'N/A', 'N/A', 'N/A', 'Windows 7 Professional', '4354343-43534-34534-345643', 'Logitech', 'EFEWS', 'SFFSD', 'Logitech', 'DFSD', '43545federf', 'Equipo en buen funcionamiento', 1, 61),
(8, 'Hp', 'CMDDS9999', 'MMSS909808', 'PDR-LAP-0099', 'Regular', 'Laptop', 'N/A', 'N/A', 'N/A', '2', '324332-23324-234324', 'ASUS', 'SAASSAD55', 'REWEW555', 'ASUS', 'SDS333', 'SDDSD34444', 'SDASADS', 2, 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistema_operativo`
--

CREATE TABLE `sistema_operativo` (
  `id` int(11) NOT NULL,
  `so` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sistema_operativo`
--

INSERT INTO `sistema_operativo` (`id`, `so`) VALUES
(1, 'Windows 7 Professional'),
(2, 'Windows 7 Basic'),
(3, 'Windows 7 Standard'),
(4, 'Windows 8.0'),
(5, 'Windows 8.1'),
(6, 'Windows 10 Home'),
(7, 'Windows 10 Pro'),
(8, 'Windows 11 Home'),
(9, 'Windows 11 Pro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sistema_operativo` (`id_sistema_operativo`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `sistema_operativo`
--
ALTER TABLE `sistema_operativo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_departamento` (`id_departamento`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `sistema_operativo`
--
ALTER TABLE `sistema_operativo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `departamento_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`id_sistema_operativo`) REFERENCES `sistema_operativo` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipos_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
