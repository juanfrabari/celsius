-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-07-2023 a las 18:58:15
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
(1, '5', '1', 2, '4600', 'Bar', '4842320960', '2023-07-27 00:49:19', 'admin', ''),
(2, '5', '2', 3, '1350', 'Bar', '4842320960', '2023-07-27 00:49:19', 'admin', ''),
(3, '5', '3', 4, '2400', 'Bar', '4842320960', '2023-07-27 00:49:19', 'admin', ''),
(4, '10', '3', 4, '3200', 'Eventual', '1060345545', '2023-07-27 00:49:44', 'admin', ''),
(5, '18', '4', 34, '17000', 'Eventual', '3501619968', '2023-07-27 00:50:02', 'admin', ''),
(6, '17', '7', 1, '3700', 'Eventual', '2276034522', '2023-07-27 00:50:35', 'admin', ''),
(7, '17', '6', 12, '19200', 'Comercio', '2276034522', '2023-07-27 00:50:35', 'admin', ''),
(8, '13', '5', 5, '1000', 'Comercio', '1381964324', '2023-07-27 00:51:30', 'admin', ''),
(11, '23', '11', 5, '12500', 'Bar', '8293365141', '2023-07-27 17:36:24', 'admin', ''),
(10, '23', '6', 3, '4800', 'Comercio', '8293365141', '2023-07-27 17:36:24', 'admin', ''),
(9, '23', '1', 2, '4800', 'Comercio', '8293365141', '2023-07-27 17:36:24', 'admin', ''),
(12, '23', '10', 3, '10200', 'Eventual', '8293365141', '2023-07-27 17:36:24', 'admin', ''),
(16, '14', '6', 3, '4500', 'Bar', '1950482793', '2023-07-28 11:07:59', 'admin', ''),
(14, '14', '7', 3, '10500', 'Bar', '1950482793', '2023-07-28 11:07:59', 'admin', ''),
(13, '14', '2', 2, '900', 'Bar', '1950482793', '2023-07-28 11:07:59', 'admin', ''),
(15, '14', '11', 2, '5000', 'Bar', '1950482793', '2023-07-28 11:07:59', 'admin', ''),
(17, '14', '1', 3, '6900', 'Bar', '1950482793', '2023-07-28 11:07:59', 'admin', ''),
(18, '14', '8', 2, '8000', 'Eventual', '1950482793', '2023-07-28 11:07:59', 'admin', ''),
(21, '25', '5', 150, '30000', 'Comercio', '1660322798', '2023-07-28 23:07:26', 'admin', ''),
(20, '5', '5', 20, '4000', 'Comercio', '3964087516', '2023-07-28 21:16:34', 'admin', ''),
(19, '12', '5', 20, '4000', 'Comercio', '4346667219', '2023-07-28 21:15:23', 'admin', ''),
(22, '24', '5', 30, '6000', 'Comercio', '9187631751', '2023-07-28 23:08:29', 'admin', ''),
(23, '24', '5', 25, '8750', 'Comercio', '7230071295', '2023-07-30 02:44:46', 'admin', ''),
(24, '26', '5', 70, '24500', 'Comercio', '2716829487', '2023-07-30 02:45:36', 'admin', '');

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
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
