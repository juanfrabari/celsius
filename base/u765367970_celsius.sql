-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 16-07-2023 a las 16:33:11
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
(3, 'Mariana Perez', '011654987', 'Mitre 531', '', 'crÃ©dito', '', '2023-07-01 17:10:29', 'admin'),
(5, 'Alejandro Ismael  Peres', '294465555', 'Jamaica 655', '', 'ConsignaciÃ³n', 'Heladera3', '2023-07-12 20:25:17', 'admin'),
(10, 'Marcelo Sacomano', '294477777', 'mitre 321', 'on', 'ConsignaciÃ³n', 'Heladera2', '2023-07-01 13:10:37', 'admin'),
(11, 'Maciel, Roberto Antonio ', '20113585537', 'Anasagasti 1235', 'on', 'Contado', '', '2023-06-30 18:40:43', 'admin'),
(12, 'Pichuman, Bautista ', '2944722848', 'Mitre 548', '', 'ConsignaciÃ³n', '', '2023-06-30 18:41:04', 'admin'),
(13, 'Zimmermann, Mariela Esther ', '2944551544', 'Cerro Ventana 231', '', 'Contado', '', '2023-06-30 18:41:33', 'admin'),
(14, 'Cesar Andrade', '294465432', 'Rolando 1151', '', 'Contado', 'Heladera2', '2023-07-07 02:01:57', 'admin'),
(15, 'Centeno, Maria Rosa ', '2944847895', 'Gallardo 850', 'on', 'Contado', '', '2023-07-07 11:38:13', 'admin'),
(16, 'Nieves Selva Mercedes', '45854896', 'Bustillo km 15.845', '', 'Contado', '', '2023-07-07 11:39:15', 'admin'),
(17, 'Rivas Alicia María ', '4465844', 'Villa Mascardi', 'on', '', 'Heladera2', '2023-07-15 12:49:08', 'admin'),
(18, 'Maldonado Jose', '2944875421', 'Brown  1548', 'on', 'Contado', '', '2023-07-07 11:44:03', 'admin'),
(20, 'Yanina de La Torre', '294465551', 'San Martin 654', 'on', 'Contado', '', '2023-07-07 17:45:59', 'admin'),
(21, 'Luján Just ', '294433557898', 'Las grutas 120', 'on', 'Contado', 'Heladera2', '2023-07-12 03:57:57', 'admin');

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
  `cod_pedido` varchar(65) NOT NULL,
  `update_pedido` timestamp NOT NULL DEFAULT current_timestamp(),
  `us_pedido` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `cli_pedido`, `prod_pedido`, `cant_pedido`, `monto_pedido`, `condi_pedido`, `cod_pedido`, `update_pedido`, `us_pedido`) VALUES
(27, '11', '9', 12, '9600', 'Bar', 'PVBI6vJX8p', '2023-07-12 18:38:21', 'admin'),
(2, '5', '11', 4, '6000', 'Eventual', 'Ge52cxfXyI', '2023-07-12 02:40:45', 'admin'),
(3, '5', '9', 6, '5400', 'Comercio', 'Ge52cxfXyI', '2023-07-12 02:40:46', 'admin'),
(4, '11', '7', 3, '7800', 'Comercio', 'dG5owXRInO', '2023-07-12 02:41:36', 'admin'),
(5, '11', '9', 1, '900', 'Comercio', 'dG5owXRInO', '2023-07-12 02:41:36', 'admin'),
(39, '12', '3', 2, '3000', 'Bar', 'ug3eCcr5xb', '2023-07-12 22:41:40', 'admin'),
(7, '10', '9', 4, '4000', 'Eventual', 'L9LWH1TArM', '2023-07-12 03:08:40', 'admin'),
(8, '10', '9', 4, '4000', 'Eventual', 'L9LWH1TArM', '2023-07-12 03:08:40', 'admin'),
(11, '20', '12', 3, '18000', 'Eventual', 'j004OSVJMg', '2023-07-12 03:22:30', 'admin'),
(43, '12', '5', 12, '13200', 'Bar', 'ug3eCcr5xb', '2023-07-12 22:41:40', 'admin'),
(40, '12', '5', 3, '3300', 'Bar', 'ug3eCcr5xb', '2023-07-12 22:41:40', 'admin'),
(38, '3', '3', 1, '1500', 'Bar', 'i3hcCW2C2J', '2023-07-12 21:38:52', 'admin'),
(41, '12', '11', 23, '34500', 'Eventual', 'ug3eCcr5xb', '2023-07-12 22:41:40', 'admin'),
(47, '11', '7', 2, '5000', 'Bar', '0AMkzhOmtS', '2023-07-15 12:49:46', 'admin'),
(46, '21', '3', 23, '41400', 'Eventual', 'JIRfwss3RX', '2023-07-12 22:46:58', 'admin'),
(44, '21', '5', 25, '30000', 'Comercio', 'JIRfwss3RX', '2023-07-12 22:46:58', 'admin'),
(45, '21', '12', 12, '60000', 'Bar', 'JIRfwss3RX', '2023-07-12 22:46:58', 'admin'),
(24, '5', '9', 12, '9600', 'Bar', 'Wg66Nzcczu', '2023-07-12 15:39:32', 'admin'),
(25, '5', '7', 4, '10000', 'Bar', 'Wg66Nzcczu', '2023-07-12 15:39:32', 'admin'),
(26, '5', '13', 8, '13600', 'Bar', 'Wg66Nzcczu', '2023-07-12 15:39:32', 'admin'),
(28, '11', '13', 12, '21600', 'Comercio', 'PVBI6vJX8p', '2023-07-12 18:38:21', 'admin'),
(29, '10', '9', 5, '4500', 'Comercio', 'hrIES8O96P', '2023-07-12 19:05:17', 'admin'),
(30, '10', '9', 5, '4000', 'Bar', 'hrIES8O96P', '2023-07-12 19:05:17', 'admin'),
(31, '10', '12', 4, '22000', 'Comercio', 'hrIES8O96P', '2023-07-12 19:05:17', 'admin'),
(32, '5', '9', 15, '12000', 'Bar', 'BNQkiM05nj', '2023-07-12 20:28:13', 'admin'),
(33, '5', '11', 20, '26000', 'Comercio', 'BNQkiM05nj', '2023-07-12 20:28:13', 'admin'),
(34, '5', '3', 1, '1500', 'Bar', 'BNQkiM05nj', '2023-07-12 20:28:13', 'admin'),
(48, '11', '11', 5, '6000', 'Bar', '0AMkzhOmtS', '2023-07-15 12:49:46', 'admin');

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
(3, 'Frutilla', 'Bolsa de 2kg', 100, '1500', '1600', '1800', 'admin', '2023-06-29 15:57:20'),
(5, 'Durazno', 'Lata de 500CM3', 45, '1100', '1200', '1300', 'admin', '2023-07-01 13:09:37'),
(7, 'Helado Almendrado', '400 Grs', 15, '2500', '2600', '2700', 'Francisco', '2023-06-29 17:23:51'),
(9, 'Hielo', 'Bolsa de 2 kg', 54, '800', '900', '1000', 'Francisco', '2023-06-30 13:53:12'),
(11, 'Filet de Merluza', '500 grs', 40, '1200', '1300', '1500', 'Francisco', '2023-06-30 18:42:50'),
(12, ' Pulpa Congelada De Maracuya Con Semillas Iqf Biomac', '1.5 kg', 50, '5000', '5500', '6000', 'admin', '2023-07-12 18:35:53'),
(13, 'ArÃ¡ndanos OrgÃ¡nicos Congelados Iqf  Calidad Premium', '10kgs', 400, '500', '1800', '2000', 'admin', '2023-07-12 19:07:48'),
(14, 'Palta Congelada En Pulpa ', '1 Kg', 50, '4800', '5000', '5200', 'Francisco', '2023-07-07 17:45:31'),
(18, 'Pizza de Muzzarella DIA Con Pepperoni ', '470 gr.', 20, '888', '1000', '1100', 'admin', '2023-07-12 20:26:04'),
(19, 'Hielo', '1.5 kg', 50, '1000', '1200', '1500', 'Francisco', '2023-07-12 20:29:58');

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
  `condi_temp` varchar(50) NOT NULL,
  `cadena_temp` varchar(63) NOT NULL,
  `us_temp` varchar(50) NOT NULL,
  `update_temp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `temp`
--

INSERT INTO `temp` (`id_temp`, `cli_temp`, `prod_temp`, `cant_temp`, `monto_temp`, `condi_temp`, `cadena_temp`, `us_temp`, `update_temp`) VALUES
(1, '5', '9', 5, '4000', 'Bar', 'hgYF49NWeA', 'admin', '2023-07-11 11:46:52'),
(2, '5', '7', 8, '20000', 'Bar', 'hgYF49NWeA', 'admin', '2023-07-11 11:46:58'),
(3, '5', '11', 5, '6000', 'Bar', 'ie2PW0JSmq', 'admin', '2023-07-11 12:03:08'),
(4, '5', '7', 5, '12500', 'Bar', '1AC2b0cUWi', 'admin', '2023-07-11 12:04:46'),
(5, '4', '11', 2, '2400', 'Bar', 'nTVTuq0AOO', 'admin', '2023-07-11 13:11:27'),
(6, '5', '9', 5, '4000', 'Bar', 'f2cul4ONY7', 'admin', '2023-07-11 13:26:25'),
(19, '5', '5', 5, '5500', 'Bar', 'CFcWXtvCmP', 'admin', '2023-07-11 14:27:31'),
(11, '10', '11', 5, '6000', 'Bar', 'tSnfkzAAwC', 'admin', '2023-07-11 14:06:27'),
(12, '10', '11', 2, '2400', 'Bar', 'tSnfkzAAwC', 'admin', '2023-07-11 14:06:34'),
(18, '5', '12', 2, '10000', 'Bar', 'CFcWXtvCmP', 'admin', '2023-07-11 14:27:25'),
(17, '3', '5', 2, '2200', 'Bar', 'XrqQSEpM3k', 'admin', '2023-07-11 14:26:47'),
(20, '5', '3', 4, '6400', 'Comercio', 'CFcWXtvCmP', 'admin', '2023-07-11 14:27:38'),
(21, '10', '9', 2, '1800', 'Comercio', 'vUU1MnCUHl', 'admin', '2023-07-11 15:31:43'),
(22, '10', '5', 2, '2200', 'Bar', 'vUU1MnCUHl', 'admin', '2023-07-11 15:31:57'),
(26, '5', '11', 15, '19500', 'Comercio', '3PUzp29NVK', 'admin', '2023-07-11 17:24:35'),
(27, '5', '14', 5, '25000', 'Comercio', '3PUzp29NVK', 'admin', '2023-07-11 17:24:42'),
(28, '5', '13', 15, '25500', 'Bar', 'cz9Xg222rY', 'admin', '2023-07-11 17:32:39'),
(29, '5', '14', 4, '19200', 'Bar', 'cz9Xg222rY', 'admin', '2023-07-11 17:32:44'),
(30, '5', '3', 5, '7500', 'Bar', 'cz9Xg222rY', 'admin', '2023-07-11 17:32:50'),
(31, '5', '11', 1, '1500', 'Eventual', 'cz9Xg222rY', 'admin', '2023-07-11 17:45:12'),
(32, '5', '9', 15, '12000', 'Bar', 'dY2JW7Kolj', 'admin', '2023-07-11 17:53:10'),
(33, '5', '11', 4, '4800', 'Bar', 'dY2JW7Kolj', 'admin', '2023-07-11 17:53:15'),
(34, '5', '13', 1, '1800', 'Comercio', 'dY2JW7Kolj', 'admin', '2023-07-11 17:53:22'),
(35, '5', '5', 3, '3900', 'Eventual', 'dY2JW7Kolj', 'admin', '2023-07-11 17:53:30'),
(36, '4', '12', 2, '12000', 'Eventual', 'qFwvBOYqrv', 'admin', '2023-07-11 17:54:03'),
(37, '4', '9', 3, '3000', 'Eventual', 'qFwvBOYqrv', 'admin', '2023-07-11 17:54:09'),
(38, '16', '3', 2, '3600', 'Eventual', 'O4eEzRz7NU', 'admin', '2023-07-11 19:20:53'),
(39, '16', '5', 5, '6000', 'Comercio', 'O4eEzRz7NU', 'admin', '2023-07-11 19:21:10'),
(40, '16', '12', 4, '20000', 'Bar', 'O4eEzRz7NU', 'admin', '2023-07-11 19:21:31'),
(41, '10', '5', 2, '2200', 'Bar', '1opr5IBXi3', 'admin', '2023-07-12 01:11:14'),
(42, '10', '9', 3, '3000', 'Eventual', '1opr5IBXi3', 'admin', '2023-07-12 01:21:16'),
(43, '5', '7', 2, '5000', 'Bar', 'Ge52cxfXyI', 'admin', '2023-07-12 02:40:21'),
(44, '5', '11', 4, '6000', 'Eventual', 'Ge52cxfXyI', 'admin', '2023-07-12 02:40:27'),
(45, '5', '9', 6, '5400', 'Comercio', 'Ge52cxfXyI', 'admin', '2023-07-12 02:40:43'),
(46, '11', '7', 3, '7800', 'Comercio', 'dG5owXRInO', 'admin', '2023-07-12 02:41:25'),
(47, '11', '9', 1, '900', 'Comercio', 'dG5owXRInO', 'admin', '2023-07-12 02:41:34'),
(48, '10', '7', 3, '7800', 'Comercio', 'L9LWH1TArM', 'admin', '2023-07-12 03:08:30'),
(49, '10', '9', 4, '4000', 'Eventual', 'L9LWH1TArM', 'admin', '2023-07-12 03:08:36'),
(50, '10', '9', 4, '4000', 'Eventual', 'L9LWH1TArM', 'admin', '2023-07-12 03:08:37'),
(51, '20', '5', 3, '3300', 'Bar', 'j004OSVJMg', 'admin', '2023-07-12 03:22:10'),
(52, '20', '7', 1, '2500', 'Bar', 'j004OSVJMg', 'admin', '2023-07-12 03:22:16'),
(53, '20', '12', 3, '18000', 'Eventual', 'j004OSVJMg', 'admin', '2023-07-12 03:22:25'),
(54, '3', '9', 1, '1000', 'Eventual', 'Vt0TPH9jDF', 'admin', '2023-07-12 03:38:23'),
(56, '3', '3', 5, '7500', 'Bar', 'Vt0TPH9jDF', 'admin', '2023-07-12 03:40:25'),
(58, '3', '5', 2, '2400', 'Comercio', '73QHsqo2D0', 'admin', '2023-07-12 03:43:44'),
(59, '3', '3', 5, '8000', 'Comercio', '73QHsqo2D0', 'admin', '2023-07-12 03:43:52'),
(60, '7', '11', 10, '15000', 'Eventual', '19A8Bt19vc', 'admin', '2023-07-12 03:43:54'),
(61, '3', '13', 25, '50000', 'Eventual', '73QHsqo2D0', 'admin', '2023-07-12 03:44:03'),
(62, '7', '14', 2, '9600', 'Bar', '19A8Bt19vc', 'admin', '2023-07-12 03:44:21'),
(63, '3', '14', 15, '72000', 'Bar', '73QHsqo2D0', 'admin', '2023-07-12 03:44:23'),
(64, '21', '11', 5, '6000', 'Bar', '1oFpML96iN', 'admin', '2023-07-12 15:34:11'),
(65, '21', '7', 2, '5200', 'Comercio', '1oFpML96iN', 'admin', '2023-07-12 15:34:17'),
(66, '21', '5', 10, '13000', 'Eventual', '1oFpML96iN', 'admin', '2023-07-12 15:34:24'),
(67, '21', '3', 5, '7500', 'Bar', '1oFpML96iN', 'admin', '2023-07-12 15:34:30'),
(68, '5', '9', 12, '9600', 'Bar', 'Wg66Nzcczu', 'admin', '2023-07-12 15:38:56'),
(69, '5', '7', 4, '10000', 'Bar', 'Wg66Nzcczu', 'admin', '2023-07-12 15:39:06'),
(70, '5', '13', 8, '13600', 'Bar', 'Wg66Nzcczu', 'admin', '2023-07-12 15:39:20'),
(71, '11', '9', 12, '9600', 'Bar', 'PVBI6vJX8p', 'admin', '2023-07-12 18:37:32'),
(73, '11', '13', 12, '21600', 'Comercio', 'PVBI6vJX8p', 'admin', '2023-07-12 18:38:08'),
(74, '10', '9', 5, '4500', 'Comercio', 'hrIES8O96P', 'admin', '2023-07-12 19:04:23'),
(77, '10', '9', 5, '4000', 'Bar', 'hrIES8O96P', 'admin', '2023-07-12 19:05:08'),
(76, '10', '12', 4, '22000', 'Comercio', 'hrIES8O96P', 'admin', '2023-07-12 19:04:49'),
(78, '5', '9', 15, '12000', 'Bar', 'BNQkiM05nj', 'admin', '2023-07-12 20:27:08'),
(79, '5', '11', 20, '26000', 'Comercio', 'BNQkiM05nj', 'admin', '2023-07-12 20:27:29'),
(84, '10', '9', 15, '15000', 'Eventual', 'VXZEkMLaPz', 'admin', '2023-07-12 20:32:33'),
(81, '5', '3', 1, '1500', 'Bar', 'BNQkiM05nj', 'admin', '2023-07-12 20:27:57'),
(83, '21', '19', 12, '12000', 'Bar', 'MRJrQF6AZN', 'admin', '2023-07-12 20:31:44'),
(85, '21', '5', 19, '20900', 'Bar', 'MRJrQF6AZN', 'admin', '2023-07-12 20:32:48'),
(86, '21', '3', 3, '4800', 'Comercio', 'MRJrQF6AZN', 'admin', '2023-07-12 20:33:04'),
(87, '3', '3', 1, '1500', 'Bar', 'i3hcCW2C2J', 'admin', '2023-07-12 21:38:48'),
(88, '12', '3', 2, '3000', 'Bar', 'ug3eCcr5xb', 'admin', '2023-07-12 22:39:59'),
(89, '12', '5', 3, '3300', 'Bar', 'ug3eCcr5xb', 'admin', '2023-07-12 22:40:19'),
(91, '12', '11', 23, '34500', 'Eventual', 'ug3eCcr5xb', 'admin', '2023-07-12 22:41:03'),
(92, '12', '9', 12, '9600', 'Bar', 'ug3eCcr5xb', 'admin', '2023-07-12 22:41:17'),
(93, '12', '5', 12, '13200', 'Bar', 'ug3eCcr5xb', 'admin', '2023-07-12 22:41:31'),
(94, '21', '5', 25, '30000', 'Comercio', 'JIRfwss3RX', 'admin', '2023-07-12 22:45:42'),
(95, '21', '12', 12, '60000', 'Bar', 'JIRfwss3RX', 'admin', '2023-07-12 22:45:58'),
(96, '21', '3', 23, '41400', 'Eventual', 'JIRfwss3RX', 'admin', '2023-07-12 22:46:52'),
(97, '11', '7', 2, '5000', 'Bar', '0AMkzhOmtS', 'admin', '2023-07-15 12:49:36'),
(98, '11', '11', 5, '6000', 'Bar', '0AMkzhOmtS', 'admin', '2023-07-15 12:49:43');

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
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `temp`
--
ALTER TABLE `temp`
  MODIFY `id_temp` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `us`
--
ALTER TABLE `us`
  MODIFY `id_us` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
