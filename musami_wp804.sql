-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2024 a las 17:00:12
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
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `contrasena`) VALUES
(1, 'asantana@sanmiguelito.gob.pa', '$P$BUPNiFvgLfUx2pcU4AbCPaJcnBLmHi0'),
(2, 'lrobles', '911Panama'),
(3, 'lrobles', '911Panama');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_docompra`
--

CREATE TABLE `wp_docompra` (
  `id` int(11) NOT NULL,
  `id_pcompra` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  `pdf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `wp_docompra`
--

INSERT INTO `wp_docompra` (`id`, `id_pcompra`, `nombre`, `date`, `pdf`) VALUES
(1, 43, 'prueba', '2024-11-20 00:00:00', '0'),
(2, 43, 'prueba 2', '2024-11-21 00:00:00', '0'),
(3, 44, 'yeyo1', '2024-11-20 00:00:00', '0'),
(4, 44, 'yeyo2', '2024-11-20 00:00:00', '0'),
(5, 44, 'yeyo3', '2024-11-20 00:00:00', '0'),
(6, 46, 'Aviso de co', '2024-11-22 00:00:00', '0'),
(7, 47, 'Aviso de convocatoria', '2024-11-21 00:00:00', '0'),
(8, 48, 'Aviso de convocatoria 2', '2024-11-22 00:00:00', '0'),
(9, 49, 'Aviso de convocatoria 3', '2024-11-22 00:00:00', '0'),
(10, 50, 'Aviso de convocatoria', '2024-11-21 00:00:00', '0'),
(11, 50, 'Aviso de convocatoria 2', '2024-11-21 00:00:00', '0'),
(12, 51, 'Aviso de co', '2024-11-22 00:00:00', '0'),
(13, 52, 'Aviso de convocatoria', '2024-11-22 00:00:00', '0'),
(14, 53, 'Aviso de convocatoria 2', '2024-11-22 00:00:00', 'Configuración Servidores-sanmiguelito.pdf'),
(15, 54, 'prueba 123', '2024-11-21 00:00:00', 'Manual-llave SSH-nube2.pdf'),
(16, 55, 'Aviso de convocatoria 2', '2024-11-21 00:00:00', '1.pdf'),
(17, 56, 'Aviso de convocatoria 2', '2024-11-21 00:00:00', '123.pdf'),
(18, 59, 'Prueba 11k', '2024-11-21 00:00:00', '11k.pdf'),
(19, 60, 'PLIEGO DE CARGO', '2024-11-22 00:00:00', 'Desarrollo-del-Sistema-de-Gestion-de-Compras.pdf'),
(20, 28, 'prueba 8888', '0000-00-00 00:00:00', '123.pdf'),
(21, 28, 'Prueba 8888_2', '2024-11-25 00:00:00', 'Reclamo1.pdf'),
(22, 64, 'prueba del formulario act', '2024-11-25 00:00:00', 'Desarrollo-del-Sistema-de-Gestion-de-Compras.pdf'),
(23, 67, 'PRUEBA 123KK', '2024-11-25 00:00:00', 'Desarrollo-del-Sistema-de-Gestion-de-Compras.pdf'),
(24, 68, 'PRUEBA 12345K', '2024-11-25 00:00:00', 'Desarrollo-del-Sistema-de-Gestion-de-Compras.pdf'),
(25, 68, 'PRUEBA 12345K', '2024-11-25 00:00:00', 'Desarrollo-del-Sistema-de-Gestion-de-Compras.pdf'),
(26, 69, 'CM2525', '2024-11-25 00:00:00', '123.pdf'),
(27, 70, 'SM-PDF-2024', '2024-11-26 00:00:00', '11k.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_portalcompra`
--

CREATE TABLE `wp_portalcompra` (
  `id` int(250) NOT NULL,
  `no_compra` varchar(250) NOT NULL,
  `tipo_procedimiento` varchar(250) NOT NULL,
  `objeto_contractual` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `fecha_presentacion` varchar(250) NOT NULL,
  `fecha_apertura` datetime NOT NULL,
  `lugar_presentacion` varchar(250) NOT NULL,
  `termino_subsanacion` varchar(250) NOT NULL,
  `precio_referencia` varchar(250) NOT NULL,
  `estado` varchar(250) NOT NULL,
  `partida_presupuestaria` varchar(255) NOT NULL,
  `modalidad_adjudicacion` varchar(255) NOT NULL,
  `provincia_entrega` varchar(255) NOT NULL,
  `usuario_registrado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `wp_portalcompra`
--

INSERT INTO `wp_portalcompra` (`id`, `no_compra`, `tipo_procedimiento`, `objeto_contractual`, `descripcion`, `fecha_publicacion`, `fecha_presentacion`, `fecha_apertura`, `lugar_presentacion`, `termino_subsanacion`, `precio_referencia`, `estado`, `partida_presupuestaria`, `modalidad_adjudicacion`, `provincia_entrega`, `usuario_registrado`) VALUES
(28, '88888', 'compra', 'parque', 'vereda', '2024-10-27', '2024-10-28 16:53:00', '2024-11-01 16:53:00', 'comprassss', 'todoss', '25,000.00', 'desierto', '', '', '', ''),
(29, '77777', 'compra', 'parque', 'vereda', '2024-10-27', '2024-10-28 16:55:00', '2024-11-03 16:55:00', 'compra', 'todos', '15,000.00', 'desierto', '', '', '', ''),
(30, '66666', 'compra', 'parque', 'vereda', '2024-10-27', '2024-10-28 17:07:00', '2024-11-01 17:07:00', 'compra', 'todos', '15,000.00', 'desierto', '', '', '', ''),
(32, '202021', 'Prueba', 'Prueba', 'Prueba', '2024-10-27', '2024-10-28 14:39:00', '2024-11-01 14:39:00', 'Prueba', 'Prueba', 'Prueba', 'cancelado', '', '', '', ''),
(33, '911', 'tipo de procedimiento', 'Objeto Contractual:', 'Descripción', '2024-10-28', '2024-10-30 14:20:00', '2024-11-01 14:20:00', 'Lugar de Presentación:', 'Término de Subsanación:', 'Precio de Referencia:', 'desierto', '', '', '', ''),
(34, '9112', 'tipo de procedimiento', 'Objeto Contractual:', 'Descripción', '2024-10-28', '2024-10-30 14:20:00', '2024-11-01 14:20:00', 'Lugar de Presentación:', 'Término de Subsanación:', 'Precio de Referencia:', 'desierto', '', '', '', ''),
(35, '911911', 'tipo de procedimiento', 'Objeto Contractual:', 'Descripción', '2024-10-28', '2024-10-30 14:20:00', '2024-11-01 14:20:00', 'Lugar de Presentación:', 'Término de Subsanación:', 'Precio de Referencia:', 'desierto', '', '', '', ''),
(36, '911912', 'tipo de procedimiento', 'Objeto Contractual:', 'Descripción', '2024-10-28', '2024-10-30 14:20:00', '2024-11-01 14:20:00', 'Lugar de Presentación:', 'Término de Subsanación:', 'Precio de Referencia:', 'desierto', '', '', '', ''),
(37, '12345', 'Directa', 'Compra Equipos', '1', '2024-11-20', '2024-11-21 10:00:00', '0000-00-00 00:00:00', '', '', '', 'vigente', '', '', '', ''),
(38, '33333', 'tipo', 'objeto', '1', '2024-11-13', '2024-11-21 11:54:00', '0000-00-00 00:00:00', '', '', '', 'vigente', '', '', '', ''),
(39, '22222', 'Tipo de Procedimiento:', 'Objeto Contractual:', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2024-11-21', '2024-11-21 13:02:00', '0000-00-00 00:00:00', '', '', '', 'adjudicados', '', '', '', ''),
(40, '313131', 'affasdfas', 'fafasgaggdaag', 'agasdgasdga', '2024-11-28', '2024-11-28 20:08:00', '0000-00-00 00:00:00', '', '', '', 'vigente', '', '', '', ''),
(41, '31321', 'compra', 'Objeto Contractual:', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2024-11-20', '2024-12-12 00:00:00', '0000-00-00 00:00:00', '', '', '', 'adjudicados', '', '', '', ''),
(42, '313212', 'compra', 'Objeto Contractual:', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2024-11-20', '2024-12-12 00:00:00', '0000-00-00 00:00:00', '', '', '', 'adjudicados', '', '', '', ''),
(43, '154545', 'tipo de procedimiento', 'Objeto Contractual:', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2024-11-21', '2024-11-21 00:00:00', '0000-00-00 00:00:00', '', '', '', 'adjudicados', '', '', '', ''),
(44, '1919002', 'tipo de procedimiento', 'Objeto Contractual:', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2024-11-21', '2024-11-22 00:00:00', '0000-00-00 00:00:00', 'Municipio', 'No Aplica', '25,000.00', 'adjudicados', '', '', '', ''),
(45, '55555', 'tipo de procedimiento', 'Objeto Contractual:', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2024-11-20', '2024-12-12 00:00:00', '0000-00-00 00:00:00', '', '', '', 'adjudicados', '', '', '', ''),
(46, '000008', 'compra', 'Objeto Contractual:', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2024-11-21', '2024-11-21 00:00:00', '0000-00-00 00:00:00', '', '', '', 'adjudicados', '', '', '', ''),
(47, '232323', 'tipo de procedimiento', 'Objeto Contractual:', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2024-11-23', '2024-12-12 00:00:00', '0000-00-00 00:00:00', '', '', '', 'adjudicados', '', '', '', ''),
(48, '454545', 'tipo de procedimiento', 'Objeto Contractual:', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2024-11-21', '2024-11-22 00:00:00', '0000-00-00 00:00:00', '', '', '', 'adjudicados', '', '', '', ''),
(49, '787878', 'tipo de procedimiento', 'Objeto Contractual:', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2024-11-21', '2024-11-21 00:00:00', '0000-00-00 00:00:00', '', '', '', 'adjudicados', '', '', '', ''),
(50, '282828', 'tipo de procedimiento', 'Objeto Contractual:', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2024-11-22', '2024-11-22 00:00:00', '0000-00-00 00:00:00', '', '', '', 'adjudicados', '', '', '', ''),
(51, '191919333', 'tipo de procedimiento', 'Objeto Contractual:', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2024-11-22', '2024-11-22 00:00:00', '0000-00-00 00:00:00', '', '', '', 'adjudicados', '', '', '', ''),
(52, '1919192', 'tipo de procedimiento', 'Objeto Contractual:', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2024-11-22', '2024-11-22 00:00:00', '0000-00-00 00:00:00', '', '', '', 'adjudicados', '', '', '', ''),
(53, '1919190', 'Tipo de Procedimiento:', 'Objeto Contractual:', 'Descripción', '2024-11-22', '2024-11-22 00:00:00', '0000-00-00 00:00:00', '', '', '', 'vigente', '', '', '', ''),
(54, '4444', 'tipo de procedimiento', 'Objeto Contractual:', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2024-11-22', '2024-11-22 00:00:00', '0000-00-00 00:00:00', '', '', '', 'adjudicados', '', '', '', ''),
(55, '484848', 'compra', 'Objeto Contractual:', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2024-11-22', '2024-11-21 00:00:00', '0000-00-00 00:00:00', '', '', '', 'desierto', '', '', '', ''),
(56, '494949', 'tipo de procedimiento', 'Objeto Contractual:', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2024-11-22', '2024-11-22 00:00:00', '0000-00-00 00:00:00', '', '', '', 'adjudicados', '', '', '', ''),
(58, '1235678', 'tipo de procedimiento', 'Objeto Contractual:', 'Descripción', '2024-11-22', '2024-11-22 00:00:00', '0000-00-00 00:00:00', '', '', '', 'adjudicados', '', '', '', ''),
(59, '4040', 'tipo de procedimiento', 'Objeto Contractual:', 'Descripcion Descripcion Descripcion Descripcion Descripcion Descripcion Descripcion Descripcion Descripcion Descripcion Descripcion Descripcion Descripcion Descripcion Descripcion Descripcion Descripcion Descripcion Descripcion Descripcion Descripcio', '2024-11-22', '2024-11-22 00:00:00', '2024-11-22 00:00:00', 'Lugar de Presentación:', 'Término de Subsanación:', '15000.00', 'vigente', '', '', '', ''),
(60, 'CM0056-MUSAMI-2024', 'YJ9IKLÑPÑP', 'BIEN', '40 PARES DE CUTARRAS', '2024-11-22', '2024-11-29 00:00:00', '2024-11-29 00:00:00', 'MUNICIPIO DE SAN MIGUELITO', 'NO APLICA', '20000.00', 'vigente', '', '', '', ''),
(64, 'CM-0057-2024', 'CONTRATACION QUE SUPERAN', 'Objeto Contractual:', 'desc', '2024-11-25', '2024-11-26 00:00:00', '2024-11-26 00:00:00', 'CONTRATACION QUE SUPERAN', 'Término de Subsanación:', '24999.99', 'vigente', '5.87.99.100', 'GLOBAL', 'PANAMA', 'lrobles'),
(67, 'CM-0455-2024', 'CONTRATACION QUE SUPERAN', 'Objeto Contractual:', 'ASDFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF', '2024-11-25', '11/26/2024 desde 10:00 AM hasta 11:00 AM', '0000-00-00 00:00:00', '', '', '', 'vigente', '', '', '', ''),
(68, 'CD-2020-5202024', 'CONTRATACION QUE SUPERAN', 'Objeto Contractual:', 'ASDFCASDFASDFASDFSADF', '2024-11-25', '11/26/2024 desde 10:00 AM hasta 11:00 AM', '2024-11-26 00:00:00', 'CONTRATACION QUE SUPERAN', 'Término de Subsanación:', '22000.00', 'vigente', '5.87.99.100', 'GLOBAL', 'Panamá, Distrito San Miguelito', 'lrobles'),
(69, 'CF-2525-2025', 'CONTRATACION QUE SUPERAN', 'Objeto Contractual:', 'ASDFSFASDCASDF', '2024-11-25', '11/26/2024 desde 10:00 AM hasta 11:00 AM', '2024-11-28 00:00:00', 'CONTRATACION QUE SUPERAN', 'Término de Subsanación:', '27000.00', 'vigente', '5.87.99.100', 'GLOBAL', 'Panamá, Distrito San Miguelito', 'lrobles'),
(70, 'MS-0821191531-2024', 'CONTRATACIÓN QUE SUPERAN LOS DIEZ MIL BALBOAS (B/. 10,000.00) SIN EXCEDER LOS CINCUENTA MIL BALBOAS (B/. 50,000.00)', 'Objeto Contractual:', 'CONTRATACIÓN QUE SUPERAN LOS DIEZ MIL BALBOAS (B/. 10,000.00) SIN EXCEDER LOS CINCUENTA MIL BALBOAS (B/. 50,000.00)', '2024-11-25', '11/26/2024 desde 10:00 AM hasta 11:00 AM', '2024-11-27 00:00:00', 'DEPARTAMENTO DE COMPRAS, MUNICIPIO DE SAN MIGUELITO, CALLE PRINCIPAL DE FÁTIMA AMELIA DENIS DE ICAZA.', 'Término de Subsanación:', '19999.99', 'vigente', '5.87.99.100', 'GLOBAL', 'Panamá, Distrito San Miguelito', 'lrobles');

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
  `aprobado` varchar(3) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `wp_proponentes`
--

INSERT INTO `wp_proponentes` (`id`, `id_pcompra`, `proponente`, `oferta`, `hora`, `aprobado`) VALUES
(11, 28, 'Suplidora', 20001, '07:03:00', 'No'),
(12, 28, 'Suplidora', 20000, '07:03:00', 'No'),
(13, 28, 'Suplidora', 20000, '07:03:00', 'No'),
(14, 29, 'Suplidora4', 20000, '07:12:00', 'No'),
(15, 32, 'Suplidora2', 20000, '07:18:00', 'No'),
(16, 28, 'suplidor inc', 20000, '09:30:00', 'No'),
(17, 30, 'Suplidora3', 20000, '10:04:00', 'No'),
(18, 30, 'Suplidora4', 20000, '10:07:00', 'No'),
(19, 30, 'Suplidora', 20000, '10:19:00', 'No'),
(20, 30, 'Suplidora3', 20000, '10:36:00', 'No'),
(21, 30, 'Suplidora', 20001, '10:36:00', 'No'),
(22, 35, 'Suplidora2', 20001, '10:42:00', 'No'),
(23, 35, 'Suplidora2', 20001, '10:42:00', '0'),
(24, 35, 'Suplidora3', 20000, '10:56:00', '0'),
(25, 33, 'Suplidora', 20, '11:03:00', 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_users`
--

CREATE TABLE `wp_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(255) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT 0,
  `display_name` varchar(250) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Volcado de datos para la tabla `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'asantana@sanmiguelito.gob.pa', '$P$BUPNiFvgLfUx2pcU4AbCPaJcnBLmHi0', 'asantanasanmiguelito-gob-pa', 'asantana@sanmiguelito.gob.pa', 'https://alcaldiasanmiguelito.gob.pa', '2024-10-17 16:04:06', '', 0, 'asantana@sanmiguelito.gob.pa'),
(2, 'Joseph', '$P$BSpwQoWFkeZ1Q6oOi7KomXOx0QVmrm.', 'joseph', 'jarosemena@sanmiguelito.gob.pa', '', '2024-10-17 16:19:16', '1729181956:$P$BCa4c0UlVKIPE9vX2ZxXrH/KGlLy4w.', 0, 'Joseph Arosemena'),
(4, 'usuario_prueba', '$2y$10$3bTHa0paFmlb8SPJOuiirueYhhYtk/1EJM02Wbt4GZ/dh4bt1JMUC', '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(5, 'lrobles', '$2y$10$debJbqtP/2Hw4EKXPWfAwetb0.hCV8HdSTHy494r497.3bmpBBtoS', '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(6, 'asantana', '$2y$10$OCFOnwMuYqSpElZwJ6RuQOavN17VYdFOmTKtp1.QYPRUthEOBSxHi', '', '', '', '0000-00-00 00:00:00', '', 0, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `wp_docompra`
--
ALTER TABLE `wp_docompra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wp_docompra_ibfk_1` (`id_pcompra`);

--
-- Indices de la tabla `wp_portalcompra`
--
ALTER TABLE `wp_portalcompra`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_compra` (`no_compra`);

--
-- Indices de la tabla `wp_proponentes`
--
ALTER TABLE `wp_proponentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wp_proponentes_ibfk_1` (`id_pcompra`);

--
-- Indices de la tabla `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `wp_docompra`
--
ALTER TABLE `wp_docompra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `wp_portalcompra`
--
ALTER TABLE `wp_portalcompra`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `wp_proponentes`
--
ALTER TABLE `wp_proponentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `wp_docompra`
--
ALTER TABLE `wp_docompra`
  ADD CONSTRAINT `wp_docompra_ibfk_1` FOREIGN KEY (`id_pcompra`) REFERENCES `wp_portalcompra` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `wp_proponentes`
--
ALTER TABLE `wp_proponentes`
  ADD CONSTRAINT `wp_proponentes_ibfk_1` FOREIGN KEY (`id_pcompra`) REFERENCES `wp_portalcompra` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
