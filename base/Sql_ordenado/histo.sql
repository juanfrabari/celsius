-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-09-2023 a las 12:50:12
-- Versión del servidor: 10.5.19-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u765367970_celsius`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `histo`
--

CREATE TABLE `histo` (
  `id_histo` int(11) NOT NULL,
  `cli_histo` varchar(100) NOT NULL,
  `dir_histo` varchar(50) NOT NULL,
  `producto_histo` varchar(50) NOT NULL,
  `cant_histo` int(5) NOT NULL,
  `monto_histo` varchar(10) NOT NULL,
  `condicion_histo` varchar(10) NOT NULL,
  `pedido_histo` varchar(15) NOT NULL,
  `ruta_histo` varchar(15) NOT NULL,
  `estado_histo` varchar(20) NOT NULL,
  `us_histo` varchar(15) NOT NULL,
  `update_histo` datetime DEFAULT current_timestamp(),
  `fecha_histo` varchar(15) NOT NULL,
  `reparte_histo` varchar(20) NOT NULL,
  `venta_histo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `histo`
--
ALTER TABLE `histo`
  ADD PRIMARY KEY (`id_histo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `histo`
--
ALTER TABLE `histo`
  MODIFY `id_histo` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
