-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-09-2023 a las 12:56:01
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
(1, 'Arandanos IQF ', '1 Kg', 5, '2300', '2500', '2900', 'admin', '2023-07-29 17:28:18'),
(2, 'Hielo en  Cilindros', 'Bolsa de 5 Kg', 1465, '750', '1000', '1200', 'admin', '2023-09-04 14:52:07'),
(4, 'Hielo ', 'Bolsa de 1 Kg', 65, '285', '400', '600', 'admin', '2023-09-04 14:51:18'),
(5, 'Hielo en Cilindros', '2 KG', 4966, '450', '450', '750', 'admin', '2023-09-04 14:50:49'),
(6, 'Hielo En Cilindros', '15 KG', -40, '2200', '2500', '3600', 'admin', '2023-08-22 20:41:31'),
(7, 'Frambuesa IQF ', '1 kg', -33, '5000', '5800', '6000', 'admin', '2023-07-29 17:21:46'),
(8, 'Maracuya Sin Semilla', '1 kg', -50, '6000', '6500', '7000', 'admin', '2023-09-04 13:11:07'),
(9, 'Mix Frutos Rojos', '1 kg', -32, '3400', '3800', '4200', 'admin', '2023-09-04 13:14:17'),
(10, 'Mora IQF', '1 kg', -1, '3500', '4000', '4500', 'admin', '2023-07-29 17:12:46'),
(11, 'Sauco Pulpa', '1 kg', 20, '3000', '3500', '4000', 'admin', '2023-07-29 17:11:22'),
(12, 'Hielo en Escamas', '1 KG', 1880, '85', '85', '85', 'admin', '2023-08-22 20:38:29'),
(13, 'Hielo en Escamas', '5 KG', 52, '750', '900', '1000', 'admin', '2023-08-22 20:37:21'),
(14, 'Maracuya Con Semillas', '1 KG', 15, '6000', '6500', '7000', 'admin', '2023-09-04 13:10:39'),
(15, 'Mango Pulpa', '1 KG', 40, '4900', '5500', '6000', 'admin', '2023-09-04 13:11:46'),
(16, 'Frutillas IQF', '1 KG', -2, '2000', '2500', '3000', 'Francisco', '2023-07-29 17:27:22'),
(17, 'Mix Frutos Rojos', '300 GRS', -6, '1', '1300', '1500', 'admin', '2023-09-04 13:12:20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_prod`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
