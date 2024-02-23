-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-09-2023 a las 12:58:40
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
  `nom_cliente` varchar(100) DEFAULT NULL,
  `contacto_cliente` varchar(100) DEFAULT NULL,
  `dir_cliente` varchar(100) DEFAULT NULL,
  `saldo_cliente` varchar(100) DEFAULT NULL,
  `venta_cliente` varchar(100) DEFAULT NULL,
  `hela_cliente` varchar(100) DEFAULT NULL,
  `update_cliente` varchar(100) DEFAULT NULL,
  `us_cliente` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nom_cliente`, `contacto_cliente`, `dir_cliente`, `saldo_cliente`, `venta_cliente`, `hela_cliente`, `update_cliente`, `us_cliente`) VALUES
(2, 'Axion Triangulo Rocca Sur S.R.L', 'Alejandra', 'Pje Gutierrez Y Ruta 40', 'on', 'CUENTA CORRIENTE', '////R 150////R 600', '2023-09-03 20:33:28', 'admin'),
(4, 'Alfredo Kiosko El 10', '2944674139', 'Onelli 543', '', '', '////R 150', '2023-08-30 20:04:13', 'admin'),
(5, 'Gustavo Almacen El Faro', '2944667356', 'Mitre Y Carlos Ruiz', '', 'Contado', 'Heladera2', '2023-07-06 23:01:57', 'admin'),
(6, 'Gonzalo Papagonia', '2944234793', 'John O Connor', '', 'Contado', '', '2023-07-07 08:38:13', 'admin'),
(7, 'Juan Carlos Frigorifico Soria', '', 'Bedchet Y Albarracin', '', 'Contado', '', '2023-07-07 08:39:15', 'admin'),
(8, 'Tomas Kiosco Tomas', '2944132424', '9 De Julio 380', '', '', 'Heladera2', '2023-07-15 09:49:08', 'admin'),
(9, 'Sebastian Kiosc San Martin', '2944261001', 'San Martin 50', '', 'Contado', '', '2023-07-07 08:44:03', 'admin'),
(10, 'Amalia  Kiosco Amalia', '2944214523', 'Gallardo 1104', '', 'Contado', '', '2023-07-07 14:45:59', 'admin'),
(11, 'Paul  Kiosco Paul', '2944108034', 'Onelli 1299', '', 'PRE COMPRA', '////Frezzer Mediano////R 150', '2023-09-05 08:44:17', 'admin'),
(12, 'Benja Kiosco Calful', '2944658325', '12 De Octubre 1799.', '', 'Contado', '', '2023-07-28 20:06:02', 'admin'),
(13, 'Pedro Kiosco Mandale Fruta', '2944695720', '9 De Julio 1036', '', '', '', '2023-07-28 20:06:18', 'admin'),
(14, 'Gerardo Kiosco San Francisco', '2944717725', 'San Francisco 4to Calle 4', 'on', 'Contado', '////Frezzer Mediano////R 150////R 450', NULL, 'admin'),
(15, 'The Coffe Store', '2944328430 Fernanda', 'Mitre 674', '', '', '', NULL, 'admin'),
(16, 'Roberto Negro El 31', '2944581940', 'Onelli 1456', '', 'Contado', '////Frezzer Mediano////R 400', NULL, 'admin'),
(17, 'Damian  Barigesell', '2944204697', '12 De Octubre 1559', '', 'Consignación', '////R 150', NULL, 'admin'),
(18, 'Lowther Mitre', '2944413435', 'Mitre 1160', '', 'crédito', '', NULL, 'admin'),
(19, 'Valeria Kiosco Rivadavia', '2944552377', 'Rivadavia 890', '', 'Contado', '////Frezzer Mediano', NULL, 'admin'),
(20, 'Roxana  San Expedito', '2944897980', 'Elordi Y Fagnano', 'on', '', '////Frezzer Grande////R 150', '2023-08-30 09:06:53', 'admin'),
(21, 'Meme  Meme', '2944614826', 'Pasaje Gutierrez 3170', '', '', '', '2023-07-28 20:06:36', 'admin'),
(22, 'Jose  Kiosco Azul', '2944821869', 'Tante Zara 417', '', '', '', '2023-07-28 20:06:36', 'admin'),
(23, 'Gerardo El Mago', '2944258725', 'Elordi 1689', '', '', '', '2023-07-28 20:06:36', 'admin'),
(24, 'Federico  Manganga', '2944664802', 'Mitre 150', '', '', '', '2023-07-28 20:06:36', 'admin'),
(25, 'Federico  Federico', '2944664802', 'NG', '', '', '', '2023-07-28 20:06:36', 'admin'),
(26, 'Diego Modo', '2944601744', 'Pioneros', '', '', '', '2023-07-28 20:06:36', 'admin'),
(27, 'Natalia El Jarro', '2944574248', 'Jonh Oconnor 177', '', '', '', '2023-07-28 20:06:36', 'admin'),
(28, 'Javier  Hostel', '2944571582', 'Palacios 405', '', '', '', '2023-07-28 20:06:36', 'admin'),
(29, 'Diego Modo Bar', '2944601744', 'Las Piedras 727', '', '', '', '2023-07-28 20:06:36', 'admin'),
(30, 'Jose  Despensa Azul', '2944821869', 'Tante Zara 417', '', '', '', '2023-07-28 20:06:36', 'admin'),
(31, 'Polleria  Polleria', '', 'Fagnano', '', '', '', '2023-07-28 20:06:36', 'admin'),
(32, 'La Baliza ', 'asd', 'Rolando 2677', '', 'Contado', '', NULL, 'admin'),
(33, 'Leandro El Galpon De Salo', '', 'Mitre 1530', '', '', '', '2023-07-28 20:06:36', 'admin'),
(34, 'Roxi  Almacen Roxi', '2944706703', 'Pasaje Gutierrez Y La Paz', '', '', '', '2023-07-28 20:06:36', 'admin'),
(35, 'El Aljibe', '2944588881', 'Brouw Y Rivadavia', '', 'Contado', '////Frezzer Mediano', NULL, 'admin'),
(36, 'Javier  Kiosco BC', '2944663885', 'Rolando Y Tiscornia', '', '', '', '2023-07-28 20:06:36', 'admin'),
(37, 'El Faldeo El Faldeo', '2944501342', '20 De Febrero', '', '', '', '2023-07-28 20:06:36', 'admin'),
(38, 'Norma Kiosquito Norma', '2944661632', 'Beschet Y Mascardi', '', '', '', '2023-07-28 20:06:36', 'admin'),
(39, 'Omar  Toscana', '2944292810', 'Pasaje Y Manga', '', '', '', '2023-07-28 20:06:36', 'admin'),
(40, 'Bless  Bless Km 4', '2944336627', 'Kilometro 4', '', '', '', '2023-07-28 20:06:36', 'admin'),
(41, 'Patricio  Kiosco D Y D', '2944389207', 'Mitre 727', '', '', '', '2023-07-28 20:06:36', 'admin'),
(42, 'Marina  Camping Los Rapidos', '1163539311', 'Parques', '', '', '', '2023-07-28 20:06:36', 'admin'),
(43, 'Julio Despensa Sobral', '2944576166º', 'Rivadavia Y Sobral', '', '', '', '2023-07-28 20:06:36', 'admin'),
(44, 'Ezequiel  Despensa', '2944130146', 'Sobral 934', '', '', '', '2023-07-28 20:06:36', 'admin'),
(45, 'Karina  Despensa Verito', '2944802244', 'Elordi 2381', '', '', '', '2023-07-28 20:06:36', 'admin'),
(46, 'VERDULERIA  Verduleria LOLO', '2944791269', 'Barrio Vivero', '', '', '', '2023-07-28 20:06:36', 'admin'),
(47, 'LA JUANA', '2944672147', 'Neumeyer 34', '', 'crédito', '////Frezzer Grande', NULL, 'admin'),
(48, 'NATALIA Tante Trunck', '2944565647', 'Costanera Y Palacios', '', '', '', '2023-07-28 20:06:36', 'admin'),
(49, 'Jose Alvarado Despensa Frutillar', '2944899055', 'Casimiro 3963', '', '', '', '2023-07-28 20:06:36', 'admin'),
(50, 'Hugo  Cerveceria Fusion', '2944261711', 'Gallardo 632', '', '', '', '2023-07-28 20:06:36', 'admin'),
(51, 'Tito  Pizeria Tito', '2944613433', 'San Martin 290', '', '', '', '2023-07-28 20:06:36', 'admin'),
(52, 'Manuel  Despensa Manuel', '2944656801', 'El Guerrero 818', '', '', '', '2023-07-28 20:06:36', 'admin'),
(53, 'Nico  Stradi Bar', '2944258845', 'Juramento 198', '', '', '', '2023-07-28 20:06:36', 'admin'),
(54, 'Berra Bar', '1162213506', ' San Martin 529', '', '', 'Heladera1', NULL, 'admin'),
(55, 'Ezequiel  Despensa Ezequiel', 'SOBRAL 934', 'Elodi 2381', '', '', '', '2023-07-28 20:06:36', 'admin'),
(56, 'Gabriela  La Papa', '2944248209', 'Morales 510', '', '', '', '2023-07-28 20:06:36', 'admin'),
(57, 'Emiliano  Sushi Emi', '2944921155', 'Jurameno', '', '', '', '2023-07-28 20:06:36', 'admin'),
(58, 'PATRICIO  DESPENSA SAN FRANCISCO', '2944909079', 'La Habana Y Esandi', '', '', '', '2023-07-28 20:06:36', 'admin'),
(59, 'Fani  Centro Cultural', '2944896302', 'Elflein 304', '', '', '', '2023-07-28 20:06:36', 'admin'),
(60, 'Mora  Despensa Morita', '2944968129', 'Ruiz Moreno 1285', '', '', '', '2023-07-28 20:06:36', 'admin'),
(61, 'Lasarah Lasarah', '2944615399', 'Jonh Oconoor', '', '', '', '2023-07-28 20:06:36', 'admin'),
(62, 'Alverto El Chuki', '2944625834', 'Quaglia2719', '', '', '', '2023-07-28 20:06:36', 'admin'),
(63, 'CALIU CALIU', '2944214012', 'MITRE 633', '', '', '', '2023-07-28 20:06:36', 'admin'),
(64, 'NIRIGUAU  NIRIGUAU', '', 'CAMPO DE LOS AGUIRRES', '', '', '', '2023-07-28 20:06:36', 'admin'),
(65, 'ROBERTO DESPENSA DON BOSCO', '2944515374', 'DON BOSCO 1170', '', '', '', '2023-07-28 20:06:36', 'admin'),
(66, 'LIAN  Frutral Costanera', '1161163297', 'COSTANERA Y PALACIOS', '', '', '', '2023-07-28 20:06:36', 'admin'),
(67, 'Nadia Costa Del Lago', '2944563932', '12 De Octubre', '', '', '', '2023-07-28 20:06:36', 'admin'),
(68, 'Laura Sociedad Rural', '2944573598', 'Ruta', '', '', '', '2023-07-28 20:06:36', 'admin'),
(69, 'Claudia Cooperativa Hacedora De Arte', '', 'Rural', '', '', '', '2023-07-28 20:06:36', 'admin'),
(70, 'Damian  La Abuela Olga', '2944598275', 'Lanin 111', '', '', '', '2023-07-28 20:06:36', 'admin'),
(71, 'Hermano De Ezequiel Desoensa L& A', '', 'RUIZ MORENO Y NEUQUEN', '', '', '', '2023-07-28 20:06:36', 'admin'),
(72, 'Diego Pareci  Hotel Cascada', '', 'Bustillo Km 6', '', '', '', '2023-07-28 20:06:36', 'admin'),
(73, 'Cristian  Despensa Cristian', '', 'Onelli Y Brown', '', '', '', '2023-07-28 20:06:36', 'admin'),
(74, 'Fernando  Roticeria', '', 'Padre Mascardi 1453', '', '', '', '2023-07-28 20:06:36', 'admin'),
(75, 'MARIA Despensa Maria', '', 'La Paz Y Pasaje Peatonal', '', '', '', '2023-07-28 20:06:36', 'admin'),
(76, 'Rodriguez Los Rodriguez 2', '', '2 De Agosto 641', '', '', '', '2023-07-28 20:06:36', 'admin'),
(77, 'Willy Willy', '', 'Amec', '', '', '', '2023-07-28 20:06:36', 'admin'),
(78, 'Despensa Mallin Despensa Mallin', '', 'Mallin Rolando Y Neuquen', '', '', '', '2023-07-28 20:06:36', 'admin'),
(79, 'CRISTIAN  RESTAURANTE OLIVIA', '', 'SAN MARTN 574', '', '', '', '2023-07-28 20:06:36', 'admin'),
(80, 'MAFALDA Restaurante Mafalda', '', 'Palacios Y Moreno', '', '', '', '2023-07-28 20:06:36', 'admin'),
(81, 'Valeria Rock Chicken', '', 'San Martin 200', '', '', '', '2023-07-28 20:06:36', 'admin'),
(82, 'Tobias  Despesa Tobias', '', 'Soldado Olivarria', '', '', '', '2023-07-28 20:06:36', 'admin'),
(83, 'Lucas Despensa Lucas', '', 'Tieera Del Fuego- Malvinas', '', '', '', '2023-07-28 20:06:36', 'admin'),
(84, 'JavierRECARGA DE GLOWER JavierRECARGA DE GLOWER', '', 'FAGNAN0 1200', '', '', '', '2023-07-28 20:06:36', 'admin'),
(85, 'Javier  Malevo', '2944375292', 'Vilcapugio Y Sarmiento', '', '', '', '2023-07-28 20:06:36', 'admin'),
(86, 'Antonio Mercadito Joni', '2944449601', 'Molle 495', '', '', '', '2023-07-28 20:06:36', 'admin'),
(87, 'Herctor Despensa Hector', '2944901532', 'Nowuotyu 3566', '', '', '', '2023-07-28 20:06:36', 'admin'),
(88, 'Lilian  Despensa Lilian', '2944291554', 'Rivadavia', '', '', '', '2023-07-28 20:06:36', 'admin'),
(89, 'Cristian  La Union', '2944230461', 'Ruta Y Besched', '', '', '', '2023-07-28 20:06:36', 'admin'),
(90, 'Jose  Despensa Jose', '2944704817', 'Puerto Argentino', '', '', '', '2023-07-28 20:06:36', 'admin'),
(91, 'Mariela Kiosco Mary', '2944368173', 'Robles Pellin', '', '', '', '2023-07-28 20:06:36', 'admin'),
(92, 'Venta En Fabrica  Venta En Fabrica', '2944822621', 'Fagnano 1273', '', '', '', '2023-07-28 20:06:36', 'admin'),
(93, 'BEATRIZ PANCHERIA', '2944258917', 'MORENO 480', '', '', '', '2023-07-28 20:06:36', 'admin'),
(94, 'ROTICERIA ROTICERIA 400 VIVIENDAS', '2944966875', 'MANQUINCHAO 361', '', '', '', '2023-07-28 20:06:36', 'admin'),
(95, 'DENIS Amacay', '2944305690', 'Elfrein 251', '', '', '', '2023-07-28 20:06:36', 'admin'),
(96, 'Sebastian Kiosco Neumeyer', '542213189561', 'Neumeyer 40', '', '', '', '2023-07-28 20:06:36', 'admin'),
(97, 'Lautaro Mercadito Lautaro', '2944506959', 'Rolando 1153', '', '', '', '2023-07-28 20:06:36', 'admin'),
(98, 'Adrian  PEHUENES', '2944598077', 'Argentino 250', '', '', '', '2023-07-28 20:06:36', 'admin'),
(99, 'Alejandra Despensa S&L', '2944208878', 'Callao 236', '', '', '', '2023-07-28 20:06:36', 'admin'),
(100, 'Marta Despensa Marta', '2944288959', 'Onelli 1389', '', '', '', '2023-07-28 20:06:36', 'admin'),
(101, 'Jose  Despensa Jose', '2944821869', 'Diagonal Gutierrez Y Palacios', '', '', '', '2023-07-28 20:06:36', 'admin'),
(102, 'Adrian  Despensa Adrian', '2944201219', 'Cacique Foyel', '', '', '', '2023-07-28 20:06:36', 'admin'),
(103, 'Carmen  MINIMERCADO EL DICHO', '2944247306', 'Soldado Olavarria 354', '', '', '', '2023-07-28 20:06:36', 'admin'),
(104, 'Marcos  Marcos', '2944284810', 'Cacique Playel 4984', '', '', '', '2023-07-28 20:06:36', 'admin'),
(105, 'Maru  Kiosco Center', '2944293392', ' San Martin', '', '', '', '2023-07-28 20:06:36', 'admin'),
(106, 'Romina  Multirubro Romina', '2944301868', 'Morales Y Chubut', '', '', '', '2023-07-28 20:06:36', 'admin'),
(107, 'Marcos  Despensa  Marcos', '2944715410', 'Barrio Malvinas', '', '', '', '2023-07-28 20:06:36', 'admin'),
(108, 'Carlos  Despensa Carlos', '2944630344', 'Barrio Frutillar ñancalahuen', '', '', '', '2023-07-28 20:06:36', 'admin'),
(109, 'SELE VERA SELE VERA', '', 'CAMPO ACUÑA', '', '', '', '2023-07-28 20:06:36', 'admin'),
(110, 'Juan Carlos Juan Carlos', '', 'Onelli Y Neuquen', '', '', '', '2023-07-28 20:06:36', 'admin'),
(111, 'MILY  El Yeti', '2945685758', 'Diagonal Capraro 1499', '', '', '', '2023-07-28 20:06:36', 'admin'),
(112, 'Lucas Minimercado Y Polleria Ideal', '2944909020', 'La Paz 780', '', '', '', '2023-07-28 20:06:36', 'admin'),
(113, 'Mirian  La Colo', '2944519609', 'Kilometro 6', '', '', '', '2023-07-28 20:06:36', 'admin'),
(114, 'Nicolas La Previa', '2944514141', 'Rolando', '', '', '', '2023-07-28 20:06:36', 'admin'),
(115, 'Bachman Bachman', '2944161392', 'Oconnor', '', '', '', '2023-07-28 20:06:36', 'admin'),
(116, 'Claudio NENE', '1163687554', 'San Martin', '', '', '', '2023-07-28 20:06:36', 'admin'),
(117, 'Adriana Despensa Adriana', '2944687885', 'Calle 18 De Mayo. Barrio Viver', '', '', '', '2023-07-28 20:06:36', 'admin'),
(118, 'Vanesa  La Nueva Union', '2944344966', '2  De Agosto 745', '', 'PRE COMPRA', '', '2023-09-03 20:36:17', 'admin'),
(119, 'Turi  El Gigante', '2944237366', 'Onelli Y Neuquen', '', '', '', '2023-07-28 20:06:36', 'admin'),
(120, 'Estilo Campestre  Estilo Campestre', '', 'San Martin', '', '', '', '2023-07-28 20:06:36', 'admin'),
(121, 'MIGUEL  Despensa Miguel', '2944127474', 'Coiron 467 Frutillar', '', '', '', '2023-07-28 20:06:36', 'admin'),
(122, 'Lucas Despensa Luquitas', '2944952465', 'Puerto Argentino 512', '', '', '', '2023-07-28 20:06:36', 'admin'),
(123, 'Miguel  Polleria Tuuleca', '', 'Ruta', '', '', '', '2023-07-28 20:06:36', 'admin'),
(124, 'El Hormiga  El Hormiga', '', 'Onelli 1345', '', '', '', '2023-07-28 20:06:36', 'admin'),
(125, 'Bachman Bachman', '2499955904', 'Quaglia', '', '', '', '2023-07-28 20:06:36', 'admin'),
(126, 'NELLI DESPENSA NELLI', '2944238622', 'CHARCAO 142', '', '', '', '2023-07-28 20:06:36', 'admin'),
(127, 'Agustin Despensa Agustin', '2944620119', 'Miramar Y Ruta', '', '', '', '2023-07-28 20:06:36', 'admin'),
(128, 'Fabian  Despensa Los Hermanos', '2944800001', 'Peñi 4341', '', '', '', '2023-07-28 20:06:36', 'admin'),
(129, 'Viejo Bar Viejo Bar', '', '9 De Julio Y Tiscornia', '', '', '', '2023-07-28 20:06:36', 'admin'),
(130, 'Luciano Voley Club', '', 'John Oconnor', '', '', '', '2023-07-28 20:06:36', 'admin'),
(131, 'Carniceria Del Barrio Carniceria Del Barrio', '', 'Rivadavia', '', '', '', '2023-07-28 20:06:36', 'admin'),
(132, 'LAURA LAURA EVENTOS', '', 'NEUQUEN', '', '', '', '2023-07-28 20:06:36', 'admin'),
(133, 'D Despensa Maria', '', 'Brown Y Rivadavia', '', '', '', '2023-07-28 20:06:36', 'admin'),
(134, 'ALFREDO ALFREDO', '', 'ROLANDO Y FELIPE LAGUNA', '', '', '', '2023-07-28 20:06:36', 'admin'),
(135, 'Hector  Despensa B Y S', '', 'Calfuco 286', '', '', '', '2023-07-28 20:06:36', 'admin'),
(136, 'Sara  Deniro', '2944336995', 'Elflein 101', '', '', '', '2023-07-28 20:06:36', 'admin'),
(137, 'Elena Elena', '2944572736', 'Brown Y Otto Goedecke', '', '', '', '2023-07-28 20:06:36', 'admin'),
(138, 'Julieta Manush Km 4', '2944917544', 'Kilometro 4', '', '', '', '2023-07-28 20:06:36', 'admin'),
(139, 'Gaspar  Beleck', '', 'Elflein 13', '', '', '', '2023-07-28 20:06:36', 'admin'),
(140, 'Ariel Multirubro Zona Norte', '2944227497', 'Pasaje Gutierrez 3217', '', '', '', '2023-07-28 20:06:36', 'admin'),
(141, 'Cesar Despensa Cesar- Malvinas', '', 'Malvinas', '', '', '', '2023-07-28 20:06:36', 'admin'),
(142, 'Guillermo Nat Bar', '', 'Jurmaneto', '', '', '', '2023-07-28 20:06:36', 'admin'),
(143, 'Agostina  El Chango', '', 'Ruta', '', '', '', '2023-07-28 20:06:36', 'admin'),
(144, 'YPF Melipal CHITCHIAN SA', '2944784267', 'Av. Bustillo 3800', '', 'Contado', '////Frezzer Mediano', NULL, 'admin'),
(145, 'Gaston  Fiambreria Pioneros', '', 'Poineros 195', '', '', '', '2023-07-28 20:06:36', 'admin'),
(146, 'Juan  Hotel Aguas Del Sur', '', 'Moreno 353', '', '', '', '2023-07-28 20:06:36', 'admin'),
(147, '2 De Abril  2 De Abril', '', 'Teniente Daniel Jukic 5075', '', '', '', '2023-07-28 20:06:36', 'admin'),
(148, 'LAS Hermanas  Desp. Las Hermanas', '', 'Tiscoria Y 9 De Julio', '', '', '', '2023-07-28 20:06:36', 'admin'),
(149, 'Ignacio Santos Y Pecadores', '', 'San Martin', '', '', '', '2023-07-28 20:06:36', 'admin'),
(150, 'Matias  Hotel Ausonia', '2944243922', 'Juan Manuel De Rosas 464', '', '', '', '2023-07-28 20:06:36', 'admin'),
(151, 'Marisol La China Y El Mora', '2944-301953', 'Beschet 1920', '', '', '', '2023-07-28 20:06:36', 'admin'),
(152, 'Rosa  Rosa', '2944- 885969', 'Rivadavia1350', '', '', '', '2023-07-28 20:06:36', 'admin'),
(153, 'Matias  Hotel City', '', 'San Martin 485', '', '', '', '2023-07-28 20:06:36', 'admin'),
(154, 'Matias  Hotel Sol', '', 'Villegas 160', '', '', '', '2023-07-28 20:06:36', 'admin'),
(155, 'CRISTIAN  San Cayetano', '', 'San Francisco- Calle 8', '', '', '', '2023-07-28 20:06:36', 'admin'),
(156, 'Mario Mario', '2944672632', 'Beschet 1191', '', '', '', '2023-07-28 20:06:36', 'admin'),
(157, 'Marcos  Desp. Cholita', '', 'Tiscornia 141', '', '', '', '2023-07-28 20:06:36', 'admin'),
(158, 'Soledad Soledad', '', 'Onelli 1668', '', '', '', '2023-07-28 20:06:36', 'admin'),
(159, 'Emanuel Carniceria Hector', '', 'Ruta', '', '', '', '2023-07-28 20:06:36', 'admin'),
(160, 'Valeria Desp, Valeria', '2944137036', 'Neuquen Y Ruiz Moreno', '', '', '', '2023-07-28 20:06:36', 'admin'),
(161, 'Daniel  Hotel Lagos Andinos', '', 'Palacios 235', '', '', '', '2023-07-28 20:06:36', 'admin'),
(162, 'Hotel Argentinos  Sindicato Del Seguro', '', 'Mitre 278', '', '', '', '2023-07-28 20:06:36', 'admin'),
(163, 'Maxi  Eventos Maxi', '', 'Rolando', '', '', '', '2023-07-28 20:06:36', 'admin'),
(164, 'Raul  Restaurante Oriental', '', 'San Martin', '', '', '', '2023-07-28 20:06:36', 'admin'),
(165, 'YPF SIGLO XXI CHICHIAN SA', 'Fernanda', 'Elordi Y Gallardo', '', 'crédito', '////Frezzer Mediano', NULL, 'admin'),
(166, 'FACUNDO CERVECERIA', '', 'Bronw 1331', '', '', '', '2023-07-28 20:06:36', 'admin'),
(167, 'Damian  Supermercado La Esquina', '', '9 De Julio', '', '', '', '2023-07-28 20:06:36', 'admin'),
(168, 'Matias  Hotel Patagonia', '', 'Bustillo', '', '', '', '2023-07-28 20:06:36', 'admin'),
(169, 'BARES SRL BARES SRL', '', 'Moreno 353', '', '', '', '2023-07-28 20:06:36', 'admin'),
(170, 'Beto  Mercado Beto', '', 'La Paz 780', '', '', '', '2023-07-28 20:06:36', 'admin'),
(171, 'Ypf Las Victorias GNC NAHUEL SRL', 'Fernanda', 'Calbildo 22', '', 'crédito', '////Frezzer Mediano', NULL, 'admin'),
(172, 'Rodrigo Zaira', '', 'Malvinas', '', '', '', '2023-07-28 20:06:36', 'admin'),
(173, 'Ramen Ramen & Sushi', '', 'San Martin 585', '', '', '', '2023-07-28 20:06:36', 'admin'),
(174, 'Fede Diaz Cerveceria Ogham', '', 'San Martin 490', '', '', '', '2023-07-28 20:06:36', 'admin'),
(175, 'Alenka  Hotel Montana', '', 'Palacios 140', '', '', '', '2023-07-28 20:06:36', 'admin'),
(176, 'Noemi Aime', '2944534639', 'Oconnor 1433', '', '', '', '2023-07-28 20:06:36', 'admin'),
(177, 'Juan  Golazo', '', 'Onelli Y Santa Cruz', '', '', '', '2023-07-28 20:06:36', 'admin'),
(178, 'Restaurante Onelli  Restaurante Onelli', '', 'Onelli 826', '', '', '', '2023-07-28 20:06:36', 'admin'),
(179, 'Nelson  Desp. Nelson', '', 'Paso', '', '', '', '2023-07-28 20:06:36', 'admin'),
(180, 'Axion Tremen SRL.', 'Chupete', 'Gallardo 1472', 'on', 'crédito', '////Frezzer Grande////R 150////R 600', '2023-08-30 11:37:06', 'admin'),
(181, 'Axion Tremen Srl', 'Maxi', 'San Martin', '', 'crédito', '////R 450', NULL, 'admin'),
(182, 'Leonardo  Hostel Marcopolo', '', 'Salta', '', '', '', '2023-07-28 20:06:36', 'admin'),
(183, 'Estela  Despensa Nacho', '', 'Gobernador Vernet', '', '', '', '2023-07-28 20:06:36', 'admin'),
(184, 'Aime  Aime', '', 'Mitre', '', '', '', '2023-07-28 20:06:36', 'admin'),
(185, 'Municipalidad Municipalidad De Pilcaniyeu', '', 'Pilcaniyeu', '', '', '', '2023-07-28 20:06:36', 'admin'),
(186, 'Pablo Chalo', '', 'Chubut Y Castex', '', '', '', '2023-07-28 20:06:36', 'admin'),
(187, 'Mia Despensa Mia', '', 'ñancanehuen 237', '', '', '', '2023-07-28 20:06:36', 'admin'),
(188, 'Aime  Aime 3|', '', 'Ruta', '', '', '', '2023-07-28 20:06:36', 'admin'),
(189, 'B&S B&S', '', 'Calfuco 286', '', '', '', '2023-07-28 20:06:36', 'admin'),
(190, 'Joni  Despensa Joni', '', 'Puerto Argentno', '', '', '', '2023-07-28 20:06:36', 'admin'),
(191, 'NELLY NELLY', '', 'CHARCAO 142', '', '', '', '2023-07-28 20:06:36', 'admin'),
(192, 'Las Pioneras  Las Pioneras', '', 'Av. Pioneros 4371', '', '', '', '2023-07-28 20:06:36', 'admin'),
(193, 'Cerveceria Gaham  Cerveceria Gaham', '', 'Av. Pioneros 8000', '', '', '', '2023-07-28 20:06:36', 'admin'),
(194, 'NAPOLE  NAPOLE', '', 'ONELLI 826', '', '', '', '2023-07-28 20:06:36', 'admin'),
(195, 'Vanesa  Minimercado Elordi', '', 'Elordi 432', '', '', '', '2023-07-28 20:06:36', 'admin'),
(196, 'MARIA AUXILIADORA MARIA  AUXILIADORA', '', 'BESCHET', '', '', '', '2023-07-28 20:06:36', 'admin'),
(197, 'El Piso El Piso', '', 'San Martin', '', '', '', '2023-07-28 20:06:36', 'admin'),
(198, 'Joni  Despensa Joni', '', 'Puerto Argentino- Malvinas', '', '', '', '2023-07-28 20:06:36', 'admin'),
(199, 'Roticeria Coco  Roticeria Coco', '', '9 De Julio 926', '', '', '', '2023-07-28 20:06:36', 'admin'),
(200, 'FABIAN  DESPENSA GITANO', '', 'SAN MARTIN', '', '', '', '2023-07-28 20:06:36', 'admin'),
(201, 'St Producciones St Producciones', '', 'Monroe 916', '', '', '', '2023-07-28 20:06:36', 'admin'),
(202, 'JUMP TRADE MARKETING  JUMP TRADE MARKETING', '', 'Mitre Bartolome 4044', '', '', '', '2023-07-28 20:06:36', 'admin'),
(203, 'Despensa Nano Despensa Nano', '', 'Nowuotyu 3566', '', '', '', '2023-07-28 20:06:36', 'admin'),
(204, 'Omar  Santino Bar', '', '20 De Febrero 37', '', '', '', '2023-07-28 20:06:36', 'admin'),
(205, 'Cirse Cirse', '', 'Km 16', '', '', '', '2023-07-28 20:06:36', 'admin'),
(206, 'Camping- Petuñas  Camping- Petuñas', '', 'Kilometro 16', '', '', '', '2023-07-28 20:06:36', 'admin'),
(207, 'Alexa Alexa', '', 'Nahuel Hue', '', '', '', '2023-07-28 20:06:36', 'admin'),
(208, 'Andrea  Mercadito Familiar', '', 'Onelli 1705', '', '', '', '2023-07-28 20:06:36', 'admin'),
(209, 'YPF Gnc Bariloche', 'Fernanda', 'Beschedt 1620', '', 'crédito', '////Frezzer Mediano', NULL, 'admin'),
(210, 'MATIAS  HOTEL PATAGONIA SUR', '', 'ELFLEIN 340', '', '', '', '2023-07-28 20:06:36', 'admin'),
(211, 'Matias  Hotel Monte Claro', '', 'Moreno', '', '', '', '2023-07-28 20:06:36', 'admin'),
(212, 'Mister  Mister', '', 'Beschetd', '', '', '', '2023-07-28 20:06:36', 'admin'),
(213, 'Fideicomiso Hotel Bariloche Ce  Fideicomiso Hotel Bariloche Ce', '', 'Cordoba 1452', '', '', '', '2023-07-28 20:06:36', 'admin'),
(214, 'The Point The Point', '', 'Elflein 85', '', '', '', '2023-07-28 20:06:36', 'admin'),
(215, 'LUIS  LUIS', '', 'MIRAMAR 93', '', '', '', '2023-07-28 20:06:36', 'admin'),
(216, 'Panaderia Mateo Panaderia Mateo', '', 'Ruiz Moreno Y Anasagast', '', '', '', '2023-07-28 20:06:36', 'admin'),
(217, 'CACHITO CATEDRAL', '', 'CERRO CATEDRAL', '', '', '', '2023-07-28 20:06:36', 'admin'),
(218, 'ELSA  ELSA', '', '25 De Mayo Y Elordi', '', '', '', '2023-07-28 20:06:36', 'admin'),
(219, 'Enrique Enrique', '', 'Molle 257', '', '', '', '2023-07-28 20:06:36', 'admin'),
(220, 'Km 13 Km 13', '', 'Km 13', '', '', '', '2023-07-28 20:06:36', 'admin'),
(221, 'Roberto LA TANA', '', 'Elflein 115', '', '', '', '2023-07-28 20:06:36', 'admin'),
(222, 'Fernando  Manush Centro', '', 'Neumeyer 20', '', '', '', '2023-07-28 20:06:36', 'admin'),
(223, 'Omar  Parrilla Galden', '', '12 De Octubre', '', '', '', '2023-07-28 20:06:36', 'admin'),
(224, 'Anonimos Group S.A.S  Anonimos Group S.A.S', '', 'Quetri 6978', '', '', '', '2023-07-28 20:06:36', 'admin'),
(225, 'Franco  Franco', '', 'Paico', '', '', '', '2023-07-28 20:06:36', 'admin'),
(226, 'IMAGEN VISUAL SA  IMAGEN VISUAL SA', '', 'La Pampa 1391', '', '', '', '2023-07-28 20:06:36', 'admin'),
(227, 'Javier  Mnimercado Aquile', '2944105362', 'Colonia 76', '', '', '', '2023-07-28 20:06:36', 'admin'),
(228, 'Arroyo Sureño SA  Arroyo Sureño SA', '', 'Estancia Pehuma Hue', '', '', '', '2023-07-28 20:06:36', 'admin'),
(229, 'JORGE Ruta 40', '', 'DINA- HUAPI', '', '', '', '2023-07-28 20:06:36', 'admin'),
(230, 'Popu  Popu', '', 'Beschet Y Ruta', '', '', '', '2023-07-28 20:06:36', 'admin'),
(231, 'Pajaros Pajaros', '', 'San Martin', '', '', '', '2023-07-28 20:06:36', 'admin'),
(232, 'Viviana Caza Y Pesca', '', '12 De Octubre', '', '', '', '2023-07-28 20:06:36', 'admin'),
(233, 'Fernando  Cerveceria El Rancho', '', 'Peulla 171', '', '', '', '2023-07-28 20:06:36', 'admin'),
(234, 'Huilque Srl Huilque Srl', '', 'Avenida Carlos Bustos 329', '', '', '', '2023-07-28 20:06:36', 'admin'),
(235, 'Mario Parilla El Tucu', '', 'Kilometro 8', '', '', '', '2023-07-28 20:06:36', 'admin'),
(236, 'Marocs  Marocs', '', 'Av. Las Victorias', '', '', '', '2023-07-28 20:06:36', 'admin'),
(237, 'Despensa Rolando  Despensa Rolando', '', 'Rolando 1330', '', '', '', '2023-07-28 20:06:36', 'admin'),
(238, 'Walter  Weisert', '', '9 De Julio Y Fagnano', '', '', '', '2023-07-28 20:06:36', 'admin'),
(239, 'Manush  Manush SRL', '', 'Neumeyer 20', '', '', '', '2023-07-28 20:06:36', 'admin'),
(240, 'MARCOS  DESPENSA FRUTILLAR', '', 'CHARCAO 170', '', '', '', '2023-07-28 20:06:36', 'admin'),
(241, 'Inda Club Inda Club', '', 'Juan Manuel De Rosas', '', '', '', '2023-07-28 20:06:36', 'admin'),
(242, 'Rujinski Pablo Daniel Rujinski Pablo Daniel', '', 'Ruta Nacional N° 237 Km 1567', '', '', '', '2023-07-28 20:06:36', 'admin'),
(243, 'Segundo Segundo', '', '....', '', '', '', '2023-07-28 20:06:36', 'admin'),
(244, 'Ochoa Ochoa', '', '..', '', '', '', '2023-07-28 20:06:36', 'admin'),
(245, 'SALMON  SALMON', '', '....', '', '', '', '2023-07-28 20:06:36', 'admin'),
(246, 'Manila  Manila', '', '...', '', '', '', '2023-07-28 20:06:36', 'admin'),
(247, 'Mariana Bendita Birra', '', 'Albarracin 668', '', '', '', '2023-07-28 20:06:36', 'admin'),
(248, 'Cristian  Union 3', '', 'Mexico', '', '', '', '2023-07-28 20:06:36', 'admin'),
(249, 'La Ponderosa S.A.S  La Ponderosa S.A.S', '', 'La Morena 4574', '', '', '', '2023-07-28 20:06:36', 'admin'),
(250, 'Cristian  La Gran Feria', '', 'Onelli Y La Paz', '', '', '', '2023-07-28 20:06:36', 'admin'),
(251, 'Hotel City Central  Hotel City Central', '', 'San Martin 485', '', '', '', '2023-07-28 20:06:36', 'admin'),
(252, 'Daniel  Hotel Interlaken', '', 'Jonoconor', '', '', '', '2023-07-28 20:06:36', 'admin'),
(253, 'Miguel  Bahia Serena', '', 'Km 13', '', '', '', '2023-07-28 20:06:36', 'admin'),
(254, 'Garcia Mazzaro Javier Garcia Mazzaro Javier', '', 'Juan Jose Paso 186', '', '', '', '2023-07-28 20:06:36', 'admin'),
(255, 'NAHUEL  MULTIRUBRO', '2944248019', 'GALLARDO 406', '', '', '', '2023-07-28 20:06:36', 'admin'),
(256, 'MARCELO Hotel Mountain', '', 'Libertad 157', '', '', '', '2023-07-28 20:06:36', 'admin'),
(257, 'De La Tierra  De La Tierra', '', 'Km 13', '', '', '', '2023-07-28 20:06:36', 'admin'),
(258, 'De La Tierra  De La Tierra', '', 'Avenida Gallardo 360', '', '', '', '2023-07-28 20:06:36', 'admin'),
(259, 'De La Tierra  De La Tierra', '', 'Avenida Gallardo Y Palacios', '', '', '', '2023-07-28 20:06:36', 'admin'),
(260, 'Verduleria Aldea  Verduleria Aldea', '', 'Gallardo Y Rolando', '', '', '', '2023-07-28 20:06:36', 'admin'),
(261, 'Huego Huego', '', 'Dina Huapi', '', '', '', '2023-07-28 20:06:36', 'admin'),
(262, 'cliente de prueba', '2944555555', 'asdas 321321', 'on', 'CONTADO ', '////Frezzer Mediano', '2023-09-04 12:10:49', 'admin'),
(263, 'Cliente de prueba', '294444444', 'asdas 321', 'on', 'CUENTA CORRIENTE', '////Frezzer Grande////Frezzer Chico', '2023-09-04 18:23:34', 'admin');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `histo_old`
--

CREATE TABLE `histo_old` (
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
(2, 'francisco', '321654', 'repartidor'),
(3, 'juan', '321654', 'repartidor'),
(4, 'pedro', '321654', 'repartidor');

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
-- Indices de la tabla `histo_old`
--
ALTER TABLE `histo_old`
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
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT de la tabla `histo`
--
ALTER TABLE `histo`
  MODIFY `id_histo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `histo_old`
--
ALTER TABLE `histo_old`
  MODIFY `id_histo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `temp`
--
ALTER TABLE `temp`
  MODIFY `id_temp` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `us`
--
ALTER TABLE `us`
  MODIFY `id_us` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;