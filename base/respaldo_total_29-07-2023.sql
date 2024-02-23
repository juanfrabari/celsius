-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 29-07-2023 a las 16:42:01
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
(23, 'Lujan Just', '2944877898', 'Copihue 20456 Km 21 Ruta Bustillo', 'on', 'Contado', '', '2023-07-25 11:51:48', 'admin'),
(24, 'El Mago', '2456543556', 'Hrheheheh', '', 'Contado', '', '2023-07-28 23:06:02', 'admin'),
(25, 'Axion Gallardo', '2626626226', 'Shhshshshsh', '', '', '', '2023-07-28 23:06:18', 'admin'),
(26, 'Axion Gallardo', '2626626226', 'Shshshwhshs', '', 'crédito', '', '2023-07-28 23:06:36', 'admin');

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
  `update_histo` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `histo`
--

INSERT INTO `histo` (`id_histo`, `cli_histo`, `dir_histo`, `producto_histo`, `cant_histo`, `monto_histo`, `condicion_histo`, `pedido_histo`, `ruta_histo`, `estado_histo`, `us_histo`, `update_histo`) VALUES
(1, 'Lujan Just', 'Copihue 20456 Km 21 Ruta Bustillo', 'Hielo  Bolsa de 15 Kg', 3, '4800', 'Comercio', '8293365141', '05836266', 'en curso', 'Admin', '2023-07-28 19:19:45'),
(2, 'Lujan Just', 'Copihue 20456 Km 21 Ruta Bustillo', 'Arandanos Congelados IQF   1 Kg', 2, '4800', 'Comercio', '8293365141', '05836266', 'en curso', 'Admin', '2023-07-28 19:19:45'),
(3, 'Lujan Just', 'Copihue 20456 Km 21 Ruta Bustillo', 'Mora  1 kg', 3, '10200', 'Eventual', '8293365141', '05836266', 'en curso', 'Admin', '2023-07-28 19:19:45'),
(4, 'Alejandro Ismael  Peres', 'Jamaica 655', 'Hielo  Bolsa de 5 Kg', 3, '1350', 'Bar', '4842320960', '17745519', 'en curso', 'Admin', '2023-07-28 20:00:20'),
(5, 'Alejandro Ismael  Peres', 'Jamaica 655', 'Hielo Escama   Bolsa de 5 Kg', 4, '2400', 'Bar', '4842320960', '17745519', 'en curso', 'Admin', '2023-07-28 20:00:21'),
(6, 'Cesar Andrade', 'Rolando 1151', 'Franbueza Congelada IQF   1 kg', 3, '10500', 'Bar', '1950482793', '17745519', 'en curso', 'Admin', '2023-07-28 20:00:21'),
(7, 'Cesar Andrade', 'Rolando 1151', 'Hielo  Bolsa de 5 Kg', 2, '900', 'Bar', '1950482793', '17745519', 'en curso', 'Admin', '2023-07-28 20:00:21'),
(8, 'Cesar Andrade', 'Rolando 1151', 'Pulpa Sauco  1 kg', 2, '5000', 'Bar', '1950482793', '17745519', 'en curso', 'Admin', '2023-07-28 20:00:21'),
(9, 'Cesar Andrade', 'Rolando 1151', 'Arandanos Congelados IQF   1 Kg', 3, '6900', 'Bar', '1950482793', '17745519', 'en curso', 'Admin', '2023-07-28 20:00:21'),
(10, 'Cesar Andrade', 'Rolando 1151', 'Maracuya Sin Semilla  1 kg', 2, '8000', 'Eventual', '1950482793', '17745519', 'en curso', 'Admin', '2023-07-28 20:00:21'),
(11, 'Lujan Just', 'Copihue 20456 Km 21 Ruta Bustillo', 'Hielo  Bolsa de 15 Kg', 3, '4800', 'Comercio', '8293365141', '13308443', 'en curso', 'Admin', '2023-07-28 23:13:09'),
(12, 'Lujan Just', 'Copihue 20456 Km 21 Ruta Bustillo', 'Arandanos Congelados IQF   1 Kg', 2, '4800', 'Comercio', '8293365141', '13308443', 'en curso', 'Admin', '2023-07-28 23:13:09'),
(13, 'Lujan Just', 'Copihue 20456 Km 21 Ruta Bustillo', 'Mora  1 kg', 3, '10200', 'Eventual', '8293365141', '13308443', 'en curso', 'Admin', '2023-07-28 23:13:09'),
(14, 'Alejandro Ismael  Peres', 'Jamaica 655', 'Hielo  Bolsa de 5 Kg', 3, '1350', 'Bar', '4842320960', '13308443', 'en curso', 'Admin', '2023-07-28 23:13:09'),
(15, 'Alejandro Ismael  Peres', 'Jamaica 655', 'Hielo Escama   Bolsa de 5 Kg', 4, '2400', 'Bar', '4842320960', '13308443', 'en curso', 'Admin', '2023-07-28 23:13:09'),
(16, 'Rivas Alicia María ', 'Villa Mascardi', 'Hielo  Bolsa de 15 Kg', 12, '19200', 'Comercio', '2276034522', '13308443', 'en curso', 'Admin', '2023-07-28 23:13:09'),
(17, 'Cesar Andrade', 'Rolando 1151', 'Franbueza Congelada IQF   1 kg', 3, '10500', 'Bar', '1950482793', '13308443', 'en curso', 'Admin', '2023-07-28 23:13:09'),
(18, 'Cesar Andrade', 'Rolando 1151', 'Hielo  Bolsa de 5 Kg', 2, '900', 'Bar', '1950482793', '13308443', 'en curso', 'Admin', '2023-07-28 23:13:09'),
(19, 'Cesar Andrade', 'Rolando 1151', 'Pulpa Sauco  1 kg', 2, '5000', 'Bar', '1950482793', '13308443', 'en curso', 'Admin', '2023-07-28 23:13:09'),
(20, 'Cesar Andrade', 'Rolando 1151', 'Arandanos Congelados IQF   1 Kg', 3, '6900', 'Bar', '1950482793', '13308443', 'en curso', 'Admin', '2023-07-28 23:13:09'),
(21, 'Cesar Andrade', 'Rolando 1151', 'Maracuya Sin Semilla  1 kg', 2, '8000', 'Eventual', '1950482793', '13308443', 'en curso', 'Admin', '2023-07-28 23:13:09');

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
(21, '25', '5', 150, '30000', 'Comercio', '1660322798', '2023-07-28 23:07:26', 'admin', 'ruta'),
(20, '5', '5', 20, '4000', 'Comercio', '3964087516', '2023-07-28 21:16:34', 'admin', ''),
(19, '12', '5', 20, '4000', 'Comercio', '4346667219', '2023-07-28 21:15:23', 'admin', ''),
(22, '24', '5', 30, '6000', 'Comercio', '9187631751', '2023-07-28 23:08:29', 'admin', 'ruta');

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
(1, '', '', 1, '', '51023027', '9187631751', '', '2023-07-29 16:00:04'),
(2, '', '', 2, '', '51023027', '1660322798', '', '2023-07-29 16:00:16');

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
-- Indices de la tabla `histo`
--
ALTER TABLE `histo`
  ADD PRIMARY KEY (`id_histo`);

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
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `histo`
--
ALTER TABLE `histo`
  MODIFY `id_histo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `temp`
--
ALTER TABLE `temp`
  MODIFY `id_temp` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `us`
--
ALTER TABLE `us`
  MODIFY `id_us` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
