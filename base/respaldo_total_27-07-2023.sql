-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-07-2023 a las 20:29:33
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
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nom_cliente` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `contacto_cliente` varchar(100) NOT NULL,
  `dir_cliente` varchar(150) NOT NULL,
  `saldo_cliente` varchar(15) NOT NULL,
  `venta_cliente` varchar(50) NOT NULL,
  `hela_cliente` varchar(150) NOT NULL,
  `update_cliente` timestamp NOT NULL DEFAULT current_timestamp(),
  `us_cliente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nom_cliente`, `contacto_cliente`, `dir_cliente`, `saldo_cliente`, `venta_cliente`, `hela_cliente`, `update_cliente`, `us_cliente`) VALUES
(5, 'Alejandro Ismael  Peres', '294465555', 'Jamaica 655', '', 'Consignación', 'Heladera3', '2023-07-24 14:08:16', 'admin'),
(10, 'Marcelo Sacomano', '294477777', 'Mitre 321', 'on', 'Consignación', 'Heladera2', '2023-07-27 17:56:47', 'admin'),
(11, 'Maciel, Roberto Antonio ', '20113585537', 'Anasagasti 1235', 'on', 'Contado', '', '2023-06-30 18:40:43', 'admin'),
(12, 'Pichuman, Bautista ', '2944722848', 'Mitre 548', '', 'Consignación', '', '2023-07-24 14:08:31', 'admin'),
(13, 'Zimmermann, Mariela Esther ', '2944551544', 'Cerro Ventana 231', '', 'Contado', '', '2023-06-30 18:41:33', 'admin'),
(14, 'Cesar Andrade', '294465432', 'Rolando 1151', '', 'Contado', 'Heladera2', '2023-07-07 02:01:57', 'admin'),
(15, 'Centeno, Maria Rosa ', '2944847895', 'Gallardo 850', 'on', 'Contado', '', '2023-07-07 11:38:13', 'admin'),
(16, 'Nieves Selva Mercedes', '45854896', 'Bustillo km 15.845', '', 'Contado', '', '2023-07-07 11:39:15', 'admin'),
(17, 'Rivas Alicia María ', '4465844', 'Villa Mascardi', 'on', '', 'Heladera2', '2023-07-15 12:49:08', 'admin'),
(18, 'Maldonado Jose', '2944875421', 'Brown  1548', 'on', 'Contado', '', '2023-07-07 11:44:03', 'admin'),
(20, 'Yanina de La Torre', '294465551', 'San Martin 654', 'on', 'Contado', '', '2023-07-07 17:45:59', 'admin'),
(23, 'Lujan Just', '2944877898', 'Copihue 20456 Km 21 Ruta Bustillo', 'on', 'Contado', '', '2023-07-25 11:51:48', 'admin');

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
(1, '5', '1', 2, '4600', 'Bar', '4842320960', '2023-07-27 00:49:19', 'admin', 'ruta'),
(2, '5', '2', 3, '1350', 'Bar', '4842320960', '2023-07-27 00:49:19', 'admin', 'ruta'),
(3, '5', '3', 4, '2400', 'Bar', '4842320960', '2023-07-27 00:49:19', 'admin', 'ruta'),
(4, '10', '3', 4, '3200', 'Eventual', '1060345545', '2023-07-27 00:49:44', 'admin', 'ruta'),
(5, '18', '4', 34, '17000', 'Eventual', '3501619968', '2023-07-27 00:50:02', 'admin', 'ruta'),
(6, '17', '7', 1, '3700', 'Eventual', '2276034522', '2023-07-27 00:50:35', 'admin', ''),
(7, '17', '6', 12, '19200', 'Comercio', '2276034522', '2023-07-27 00:50:35', 'admin', ''),
(8, '13', '5', 5, '1000', 'Comercio', '1381964324', '2023-07-27 00:51:30', 'admin', ''),
(11, '23', '11', 5, '12500', 'Bar', '8293365141', '2023-07-27 17:36:24', 'admin', ''),
(10, '23', '6', 3, '4800', 'Comercio', '8293365141', '2023-07-27 17:36:24', 'admin', ''),
(9, '23', '1', 2, '4800', 'Comercio', '8293365141', '2023-07-27 17:36:24', 'admin', ''),
(12, '23', '10', 3, '10200', 'Eventual', '8293365141', '2023-07-27 17:36:24', 'admin', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_prod` int(11) NOT NULL,
  `nom_prod` varchar(100) NOT NULL,
  `pres_prod` varchar(100) NOT NULL,
  `cant_prod` int(11) NOT NULL,
  `bar_prod` varchar(20) NOT NULL,
  `comercio_prod` varchar(20) NOT NULL,
  `eventual_prod` varchar(20) NOT NULL,
  `us_prod` varchar(50) NOT NULL,
  `update_prod` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_prod`, `nom_prod`, `pres_prod`, `cant_prod`, `bar_prod`, `comercio_prod`, `eventual_prod`, `us_prod`, `update_prod`) VALUES
(1, 'Arandanos Congelados IQF ', '1 Kg', 20, '2300', '2400', '2500', 'Francisco', '2023-07-25 11:30:40'),
(2, 'Hielo', 'Bolsa de 5 Kg', 20, '450', '600', '700', 'admin', '2023-07-25 11:41:36'),
(3, 'Hielo Escama ', 'Bolsa de 5 Kg', 20, '600', '750', '800', 'admin', '2023-07-25 11:53:55'),
(4, 'Hielo ', 'Bolsa de 1 Kg', 20, '300', '400', '500', 'Francisco', '2023-07-25 11:40:29'),
(5, 'Hielo', 'Bolsa de 2 kg', 20, '140', '200', '350', 'Francisco', '2023-07-25 11:44:16'),
(6, 'Hielo', 'Bolsa de 15 Kg', 20, '1500', '1600', '1700', 'Francisco', '2023-07-25 11:45:18'),
(7, 'Franbueza Congelada IQF ', '1 kg', 20, '3500', '3600', '3700', 'Francisco', '2023-07-25 11:46:44'),
(8, 'Maracuya Sin Semilla', '1 kg', 20, '3900', '3950', '4000', 'Francisco', '2023-07-25 11:47:14'),
(9, 'Mix de Frutos', '1 kg', 20, '2500', '2600', '2700', 'Francisco', '2023-07-25 11:47:50'),
(10, 'Mora', '1 kg', 20, '3200', '3300', '3400', 'Francisco', '2023-07-25 11:48:13'),
(11, 'Pulpa Sauco', '1 kg', 20, '2500', '2600', '2700', 'Francisco', '2023-07-25 11:48:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp`
--

CREATE TABLE `temp` (
  `id_temp` int(5) NOT NULL,
  `cli_temp` varchar(100) NOT NULL,
  `prod_temp` varchar(150) NOT NULL,
  `cant_temp` int(5) NOT NULL,
  `monto_temp` varchar(10) NOT NULL,
  `condi_temp` varchar(50) NOT NULL COMMENT 'Nro unico de hoja de Ruta',
  `cadena_temp` varchar(63) NOT NULL COMMENT 'Nro. único de pedidos\r\n\r\n',
  `us_temp` varchar(50) NOT NULL,
  `update_temp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `temp`
--

INSERT INTO `temp` (`id_temp`, `cli_temp`, `prod_temp`, `cant_temp`, `monto_temp`, `condi_temp`, `cadena_temp`, `us_temp`, `update_temp`) VALUES
(56, '', '', 1, '', '13007552', '1060345545', '', '2023-07-27 20:19:32'),
(58, '', '', 3, '', '13007552', '3501619968', '', '2023-07-27 20:20:15'),
(61, '', '', 6, '', '13007552', '4842320960', '', '2023-07-27 20:21:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `us`
--

CREATE TABLE `us` (
  `id_us` int(11) NOT NULL,
  `nom_us` varchar(50) NOT NULL,
  `pas_us` varchar(50) NOT NULL,
  `priv` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `us`
--

INSERT INTO `us` (`id_us`, `nom_us`, `pas_us`, `priv`) VALUES
(1, 'admin', '321654', 'admin'),
(2, 'francisco', '321654', 'repartidor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_prod`);

--
-- Indices de la tabla `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id_temp`);

--
-- Indices de la tabla `us`
--
ALTER TABLE `us`
  ADD PRIMARY KEY (`id_us`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `temp`
--
ALTER TABLE `temp`
  MODIFY `id_temp` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `us`
--
ALTER TABLE `us`
  MODIFY `id_us` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
