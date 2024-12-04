-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2024 a las 14:51:02
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
-- Base de datos: `musami_wp804`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_proponentes`
--

CREATE TABLE `wp_proponentes` (
  `id` int(11) NOT NULL,
  `id_pcompra` int(11) NOT NULL,
  `proponente` varchar(250) NOT NULL,
  `oferta` decimal(10,0) NOT NULL,
  `hora` time NOT NULL,
  `aprobado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `wp_proponentes`
--

INSERT INTO `wp_proponentes` (`id`, `id_pcompra`, `proponente`, `oferta`, `hora`, `aprobado`) VALUES
(11, 28, 'Suplidora', 20000, '07:03:00', 'No'),
(12, 28, 'Suplidora', 20000, '07:03:00', 'No'),
(13, 28, 'Suplidora', 20000, '07:03:00', 'No'),
(14, 29, 'Suplidora4', 20000, '07:12:00', 'No'),
(15, 32, 'Suplidora2', 20000, '07:18:00', 'No');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `wp_proponentes`
--
ALTER TABLE `wp_proponentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wp_proponentes_ibfk_1` (`id_pcompra`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `wp_proponentes`
--
ALTER TABLE `wp_proponentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `wp_proponentes`
--
ALTER TABLE `wp_proponentes`
  ADD CONSTRAINT `wp_proponentes_ibfk_1` FOREIGN KEY (`id_pcompra`) REFERENCES `wp_portalcompra` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
