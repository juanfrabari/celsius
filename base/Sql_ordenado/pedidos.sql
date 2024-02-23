-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-09-2023 a las 12:56:48
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
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `cli_pedido` varchar(150) NOT NULL,
  `prod_pedido` varchar(150) NOT NULL,
  `cant_pedido` int(5) NOT NULL,
  `monto_pedido` varchar(50) NOT NULL,
  `condi_pedido` varchar(50) NOT NULL,
  `cod_pedido` varchar(65) NOT NULL COMMENT 'cantidad de articulos por pedido\r\n',
  `update_pedido` timestamp NOT NULL DEFAULT current_timestamp(),
  `us_pedido` varchar(50) NOT NULL,
  `estado_pedido` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `cli_pedido`, `prod_pedido`, `cant_pedido`, `monto_pedido`, `condi_pedido`, `cod_pedido`, `update_pedido`, `us_pedido`, `estado_pedido`) VALUES
(1, '6', '1', 12, '30000', 'Comercio', '7575410915', '2023-09-04 17:51:36', 'admin', ''),
(2, '6', '6', 10, '25000', 'Comercio', '7575410915', '2023-09-04 17:51:36', 'admin', ''),
(3, '6', '10', 10, '40000', 'Comercio', '7575410915', '2023-09-04 17:51:36', 'admin', ''),
(4, '11', '6', 5, '11000', 'Bar', '8510626866', '2023-09-04 17:53:12', 'admin', ''),
(5, '11', '10', 1, '3500', 'Bar', '8510626866', '2023-09-04 17:53:12', 'admin', ''),
(6, '11', '5', 12, '5400', 'Bar', '8510626866', '2023-09-04 17:53:12', 'admin', ''),
(7, '56', '15', 10, '60000', 'Eventual', '7280191223', '2023-09-04 17:53:29', 'admin', ''),
(8, '9', '5', 11, '4950', 'Bar', '2601832443', '2023-09-04 18:14:01', 'admin', ''),
(9, '9', '6', 45, '99000', 'Bar', '2601832443', '2023-09-04 18:14:01', 'admin', ''),
(10, '9', '7', 22, '110000', 'Bar', '2601832443', '2023-09-04 18:14:01', 'admin', ''),
(11, '18', '17', 15, '22500', 'Eventual', '1685110151', '2023-09-04 18:16:20', 'admin', ''),
(12, '18', '4', 15, '9000', 'Eventual', '1685110151', '2023-09-04 18:16:20', 'admin', ''),
(13, '18', '10', 10, '45000', 'Eventual', '1685110151', '2023-09-04 18:16:20', 'admin', ''),
(14, '60', '13', 10, '9000', 'Comercio', '8849857718', '2023-09-04 18:17:05', 'admin', ''),
(15, '60', '8', 12, '78000', 'Comercio', '8849857718', '2023-09-04 18:17:05', 'admin', ''),
(22, '5', '17', 10, '10', 'Bar', '3834690369', '2023-09-05 08:38:10', 'admin', ''),
(21, '5', '5', 11, '4950', 'Bar', '3834690369', '2023-09-05 08:38:10', 'admin', ''),
(20, '5', '7', 11, '55000', 'Bar', '3834690369', '2023-09-05 08:38:10', 'admin', ''),
(16, '10', '4', 15, '6000', 'Comercio', '9278469974', '2023-09-04 21:15:20', 'admin', ''),
(17, '10', '8', 11, '71500', 'Comercio', '9278469974', '2023-09-04 21:15:20', 'admin', ''),
(18, '10', '8', 12, '78000', 'Comercio', '9278469974', '2023-09-04 21:15:20', 'admin', ''),
(19, '10', '16', 22, '55000', 'Comercio', '9278469974', '2023-09-04 21:15:20', 'admin', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
