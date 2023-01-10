-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-12-2021 a las 18:32:54
-- Versión del servidor: 10.3.32-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `redecuatoriana_appqr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id_asistencia` bigint(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_evento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `id_ciudad` bigint(20) NOT NULL,
  `nciudad` text CHARACTER SET utf8 NOT NULL,
  `id_provincia` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`id_ciudad`, `nciudad`, `id_provincia`, `activo`) VALUES
(1, 'San Lorenzo', 1, 0),
(2, 'Eloy Alfaro', 1, 0),
(3, 'Río Verde', 1, 0),
(4, 'Esmeraldas', 1, 0),
(5, 'Atacames', 1, 0),
(6, 'Quinindé', 1, 0),
(7, 'Tulcán', 2, 0),
(8, 'Mira', 2, 0),
(9, 'Espejo', 2, 0),
(10, 'Montúfar', 2, 0),
(11, 'San Pedro de Huaca', 2, 0),
(12, 'Bolívar', 2, 0),
(13, 'Ibarra', 3, 0),
(14, 'San Miguel de Urcuquí', 3, 0),
(15, 'Cotacachi', 3, 0),
(16, 'Antonio Ante', 3, 0),
(17, 'Otavalo', 3, 0),
(18, 'Pimampiro', 3, 0),
(19, 'Sucumbíos', 4, 0),
(20, 'Gonzalo Pizarro', 4, 0),
(21, 'Cascales', 4, 0),
(22, 'Lago Agrio', 4, 0),
(23, 'Putumayo', 4, 0),
(24, 'Cuyabeno', 4, 0),
(25, 'Shushufindi', 4, 0),
(26, 'Pedernales', 5, 0),
(27, 'Chone', 5, 0),
(28, 'Flavio Alfaro', 5, 0),
(29, 'El Carmen', 5, 0),
(30, 'Jama', 5, 0),
(31, 'San Vicente', 5, 0),
(32, 'Sucre', 5, 0),
(33, 'Tosagua', 5, 0),
(34, 'Rocafuerte', 5, 0),
(35, 'Junín', 5, 0),
(36, 'Bolívar', 5, 0),
(37, 'Pichincha', 5, 0),
(38, 'Portoviejo', 5, 0),
(39, 'Jaramijó', 5, 0),
(40, 'Manta', 5, 0),
(41, 'Montecristi', 5, 0),
(42, 'Santa Ana', 5, 0),
(43, 'Jipijapa', 5, 0),
(44, 'Veinticuatro de Mayo', 5, 0),
(45, 'Olmedo', 5, 0),
(46, 'Puerto López', 5, 0),
(47, 'Paján', 5, 0),
(48, 'La Concordia', 6, 0),
(49, 'Santo Domingo ', 6, 0),
(50, 'Puerto Quito', 7, 0),
(51, 'Pedro Vicente Maldonado', 7, 0),
(52, 'San Miguel de Los Bancos', 7, 0),
(53, 'Distrito Metropolitano de Quito', 7, 0),
(54, 'Pedro Moncayo', 7, 0),
(55, 'Cayambe', 7, 0),
(56, 'Rumiñahui', 7, 0),
(57, 'Mejía', 7, 0),
(58, 'El Chaco', 8, 0),
(59, 'Quijos', 8, 0),
(60, 'Archidona', 8, 0),
(61, 'Tena', 8, 0),
(62, 'Carlos Julio Arosemena Tola', 8, 0),
(63, 'Loreto', 9, 0),
(64, 'Francisco de Orellana', 9, 0),
(65, 'La Joya de los Sachas', 0, 0),
(66, 'Aguarico', 9, 0),
(67, 'Mera', 10, 0),
(68, 'Santa Clara', 10, 0),
(69, 'Arajuno', 10, 0),
(70, 'Pastaza', 10, 0),
(71, 'Buena Fe', 11, 0),
(72, 'Valencia', 11, 0),
(73, 'Quevedo', 11, 0),
(74, 'Quinsaloma', 11, 0),
(75, 'Palenque', 11, 0),
(76, 'Mocache', 11, 0),
(77, 'Ventanas', 11, 0),
(78, 'Vinces', 11, 0),
(79, 'Baba', 11, 0),
(80, 'Puebloviejo', 11, 0),
(81, 'Urdaneta', 11, 0),
(82, 'Babahoyo', 11, 0),
(83, 'Montalvo', 11, 0),
(84, 'Sigchos', 12, 0),
(85, 'La Maná', 12, 0),
(86, 'Latacunga', 12, 0),
(87, 'Saquisilí', 12, 0),
(88, 'Pujilí', 12, 0),
(89, 'Pangua', 12, 0),
(90, 'Salcedo', 12, 0),
(91, 'Guaranda', 13, 0),
(92, 'Las Naves', 13, 0),
(93, 'Echeandía', 13, 0),
(94, 'Caluma', 13, 0),
(95, 'Chimbo', 13, 0),
(96, 'San Miguel', 13, 0),
(97, 'Chillanes', 13, 0),
(98, 'Ambato', 14, 0),
(99, 'Píllaro', 14, 0),
(100, 'Patate', 14, 0),
(101, 'Baños', 14, 0),
(102, 'Pelileo', 14, 0),
(103, 'Cevallos', 14, 0),
(104, 'Tisaleo', 14, 0),
(105, 'Mocha', 14, 0),
(106, 'Quero', 14, 0),
(107, 'Guano', 15, 0),
(108, 'Penipe', 15, 0),
(109, 'Riobamba', 15, 0),
(110, 'Colta', 15, 0),
(111, 'Chambo', 15, 0),
(112, 'Pallatanga', 15, 0),
(113, 'Guamote', 15, 0),
(114, 'Alausí', 15, 0),
(115, 'Cumandá', 15, 0),
(116, 'Chunchi', 15, 0),
(117, 'Palora', 16, 0),
(118, 'Pablo Sexto', 16, 0),
(119, 'Huamboya', 16, 0),
(120, 'Morona', 16, 0),
(121, 'Taisha', 16, 0),
(122, 'Sucúa', 16, 0),
(123, 'Santiago', 16, 0),
(124, 'Logroño', 16, 0),
(125, 'Tiwintza', 16, 0),
(126, 'Limón Indanza', 16, 0),
(127, 'San Juan Bosco', 16, 0),
(128, 'Gualaquiza', 16, 0),
(129, 'El Empalme', 17, 0),
(130, 'Balzar', 17, 0),
(131, 'Colimes', 17, 0),
(132, 'Palestina', 17, 0),
(133, 'Santa Lucía', 17, 0),
(134, 'Pedro Carbo', 17, 0),
(135, 'Lomas de Sargentillo', 17, 0),
(136, 'Nobol', 17, 0),
(137, 'Daule', 17, 0),
(138, 'Salitre', 17, 0),
(139, 'Samborondón', 17, 0),
(140, 'Yaguachi', 17, 0),
(141, 'Alfredo Baquerizo Moreno', 17, 0),
(142, 'Milagro', 17, 0),
(143, 'Simón Bolívar', 17, 0),
(144, 'Naranjito', 17, 0),
(145, 'General Antonio Elizalde', 17, 0),
(146, 'Coronel Marcelino Maridueña', 17, 0),
(147, 'El Triunfo', 17, 0),
(148, 'Durán', 17, 0),
(149, 'Guayaquil', 17, 0),
(150, 'Playas', 17, 0),
(151, 'Naranjal', 17, 0),
(152, 'Balao', 17, 0),
(153, 'Santa Elena', 18, 0),
(154, 'La Libertad', 18, 0),
(155, 'Salinas', 18, 0),
(156, 'La Troncal', 19, 0),
(157, 'Cañar', 19, 0),
(158, 'Suscal', 19, 0),
(159, 'El Tambo', 19, 0),
(160, 'Azogues', 19, 0),
(161, 'Biblián', 19, 0),
(162, 'Déleg', 19, 0),
(163, 'Sevilla de Oro', 20, 0),
(164, 'Paute', 20, 0),
(165, 'Guachapala', 20, 0),
(166, 'El Pan', 20, 0),
(167, 'Gualaceo', 20, 0),
(168, 'Chordeleg', 20, 0),
(169, 'Sígsig', 20, 0),
(170, 'Cuenca', 20, 0),
(171, 'Santa Isabel', 20, 0),
(172, 'Pucará', 20, 0),
(173, 'Camilo Ponce Enríquez', 20, 0),
(174, 'San Fernando', 20, 0),
(175, 'Girón', 20, 0),
(176, 'Nabón', 20, 0),
(177, 'Oña', 20, 0),
(178, 'El Guabo', 21, 0),
(179, 'Machala', 21, 0),
(180, 'Pasaje', 21, 0),
(181, 'Chilla', 21, 0),
(182, 'Zaruma', 21, 0),
(183, 'Santa Rosa', 21, 0),
(184, 'Atahualpa', 21, 0),
(185, 'Arenillas', 21, 0),
(186, 'Huaquillas', 21, 0),
(187, 'Las Lajas', 21, 0),
(188, 'Marcabelí', 21, 0),
(189, 'Balsas', 21, 0),
(190, 'Piñas', 21, 0),
(191, 'Portovelo', 21, 0),
(192, 'Saraguro', 22, 0),
(193, 'Loja', 22, 0),
(194, 'Chaguarpamba', 22, 0),
(195, 'Olmedo', 22, 0),
(196, 'Catamayo', 22, 0),
(197, 'Paltas', 22, 0),
(198, 'Puyango', 22, 0),
(199, 'Pindal', 22, 0),
(200, 'Celica', 22, 0),
(201, 'Zapotillo', 22, 0),
(202, 'Macará', 22, 0),
(203, 'Sozoranga', 22, 0),
(204, 'Calvas', 22, 0),
(205, 'Gonzanamá', 22, 0),
(206, 'Quilanga', 22, 0),
(207, 'Espíndola', 22, 0),
(208, 'Yacuambi', 23, 0),
(209, 'Yantzaza', 23, 0),
(210, 'El Pangui', 23, 0),
(211, 'Zamora', 23, 0),
(212, 'Centinela del Cóndor', 23, 0),
(213, 'Paquisha', 23, 0),
(214, 'Nangaritza', 23, 0),
(215, 'Palanda', 23, 0),
(216, 'Chinchipe', 23, 0),
(217, 'Isabela', 24, 0),
(218, 'San Cristóbal', 24, 0),
(219, 'Santa Cruz', 24, 0),
(220, 'Colombia', 25, 0),
(221, 'Paraguay', 25, 0),
(222, 'Chile', 25, 0),
(223, 'Uruguay', 25, 0),
(224, 'Perú', 25, 0),
(225, 'Cuba', 25, 0),
(226, 'Nueva Loja', 4, 0),
(227, 'Venezuela', 25, 0),
(229, 'PILLARO', 0, 0),
(230, 'La Habana', 15, 0),
(231, 'La Guira', 15, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_estado` int(11) NOT NULL,
  `nestado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `nestado`) VALUES
(1, 'ACTIVO'),
(2, 'INACTIVO'),
(3, 'NUEVO'),
(4, 'FINALIZADO'),
(5, 'EXTRA'),
(6, 'PENDIENTE'),
(7, 'PAGADO'),
(8, 'RECHAZADA'),
(9, 'ANULADOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `nevento` varchar(100) NOT NULL,
  `f_inicioe` date NOT NULL,
  `f_fine` date NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_evento`, `nevento`, `f_inicioe`, `f_fine`, `activo`) VALUES
(1, 'Inauguración de la FiBE', '2021-04-05', '2021-10-15', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL,
  `n_grupo` varchar(20) NOT NULL,
  `cod_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `n_grupo`, `cod_grupo`) VALUES
(1, 'Super Administrador', 10001),
(2, 'REP - Anfitrión', 10002),
(3, 'REP - Anfitrión', 10003),
(4, 'Invitados', 10004),
(5, 'Becarios', 10005),
(6, 'Autoridades', 10006),
(8, 'Institutos', 10008),
(9, 'Otros', 10009);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id_pais` int(11) NOT NULL,
  `npais` text NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id_pais`, `npais`, `activo`) VALUES
(1, 'Afganistán', 0),
(2, 'Albania', 0),
(3, 'Alemania', 0),
(4, 'Andorra', 0),
(5, 'Angola', 0),
(6, 'Anguila', 0),
(7, 'Antártida', 0),
(8, 'Antigua y Barbuda', 0),
(9, 'Arabia Saudita', 0),
(10, 'Argelia', 0),
(11, 'Argentina', 0),
(12, 'Armenia', 0),
(13, 'Aruba', 0),
(14, 'Australia', 0),
(15, 'Austria', 0),
(16, 'Azerbaiyán', 0),
(17, 'Bélgica', 0),
(18, 'Bahamas', 0),
(19, 'Bahrein', 0),
(20, 'Bangladesh', 0),
(21, 'Barbados', 0),
(22, 'Belice', 0),
(23, 'Benín', 0),
(24, 'Bhután', 0),
(25, 'Bielorrusia', 0),
(26, 'Birmania', 0),
(27, 'Bolivia', 0),
(28, 'Bosnia y Herzegovina', 0),
(29, 'Botsuana', 0),
(30, 'Brasil', 0),
(31, 'Brunéi', 0),
(32, 'Bulgaria', 0),
(33, 'Burkina Faso', 0),
(34, 'Burundi', 0),
(35, 'Cabo Verde', 0),
(36, 'Camboya', 0),
(37, 'Camerún', 0),
(38, 'Canadá', 0),
(39, 'Chad', 0),
(40, 'Chile', 0),
(41, 'China', 0),
(42, 'Chipre', 0),
(43, 'Ciudad del Vaticano', 0),
(44, 'Colombia', 0),
(45, 'Comoras', 0),
(46, 'República del Congo', 0),
(47, 'República Democrática del Congo', 0),
(48, 'Corea del Norte', 0),
(49, 'Corea del Sur', 0),
(50, 'Costa de Marfil', 0),
(51, 'Costa Rica', 0),
(52, 'Croacia', 0),
(53, 'Cuba', 0),
(54, 'Curazao', 0),
(55, 'Dinamarca', 0),
(56, 'Dominica', 0),
(57, 'Ecuador', 0),
(58, 'Egipto', 0),
(59, 'El Salvador', 0),
(60, 'Emiratos Árabes Unidos', 0),
(61, 'Eritrea', 0),
(62, 'Eslovaquia', 0),
(63, 'Eslovenia', 0),
(64, 'España', 0),
(65, 'Estados Unidos de América', 0),
(66, 'Estonia', 0),
(67, 'Etiopía', 0),
(68, 'Filipinas', 0),
(69, 'Finlandia', 0),
(70, 'Fiyi', 0),
(71, 'Francia', 0),
(72, 'Gabón', 0),
(73, 'Gambia', 0),
(74, 'Georgia', 0),
(75, 'Ghana', 0),
(76, 'Gibraltar', 0),
(77, 'Granada', 0),
(78, 'Grecia', 0),
(79, 'Groenlandia', 0),
(80, 'Guadalupe', 0),
(81, 'Guam', 0),
(82, 'Guatemala', 0),
(83, 'Guayana Francesa', 0),
(84, 'Guernsey', 0),
(85, 'Guinea', 0),
(86, 'Guinea Ecuatorial', 0),
(87, 'Guinea-Bissau', 0),
(88, 'Guyana', 0),
(89, 'Haití', 0),
(90, 'Honduras', 0),
(91, 'Hong kong', 0),
(92, 'Hungría', 0),
(93, 'India', 0),
(94, 'Indonesia', 0),
(95, 'Irán', 0),
(96, 'Irak', 0),
(97, 'Irlanda', 0),
(98, 'Isla Bouvet', 0),
(99, 'Isla de Man', 0),
(100, 'Isla de Navidad', 0),
(101, 'Isla Norfolk', 0),
(102, 'Islandia', 0),
(103, 'Islas Bermudas', 0),
(104, 'Islas Caimán', 0),
(105, 'Islas Cocos', 0),
(106, 'Islas Cook', 0),
(107, 'Islas de Aland', 0),
(108, 'Islas Feroe', 0),
(109, 'Islas Georgias del Sur y Sandwich del Sur', 0),
(110, 'Islas Heard y McDonald', 0),
(111, 'Islas Maldivas', 0),
(112, 'Islas Malvinas', 0),
(113, 'Islas Marianas del Norte', 0),
(114, 'Islas Marshall', 0),
(115, 'Islas Pitcairn', 0),
(116, 'Islas Salomón', 0),
(117, 'Islas Turcas y Caicos', 0),
(118, 'Islas Ultramarinas Menores de Estados Unidos', 0),
(119, 'Islas Vírgenes Británicas', 0),
(120, 'Islas Vírgenes de los Estados Unidos', 0),
(121, 'Israel', 0),
(122, 'Italia', 0),
(123, 'Jamaica', 0),
(124, 'Japón', 0),
(125, 'Jersey', 0),
(126, 'Jordania', 0),
(127, 'Kazajistán', 0),
(128, 'Kenia', 0),
(129, 'Kirguistán', 0),
(130, 'Kiribati', 0),
(131, 'Kuwait', 0),
(132, 'Líbano', 0),
(133, 'Laos', 0),
(134, 'Lesoto', 0),
(135, 'Letonia', 0),
(136, 'Liberia', 0),
(137, 'Libia', 0),
(138, 'Liechtenstein', 0),
(139, 'Lituania', 0),
(140, 'Luxemburgo', 0),
(141, 'México', 0),
(142, 'Mónaco', 0),
(143, 'Macao', 0),
(144, 'Macedonia', 0),
(145, 'Madagascar', 0),
(146, 'Malasia', 0),
(147, 'Malawi', 0),
(148, 'Mali', 0),
(149, 'Malta', 0),
(150, 'Marruecos', 0),
(151, 'Martinica', 0),
(152, 'Mauricio', 0),
(153, 'Mauritania', 0),
(154, 'Mayotte', 0),
(155, 'Micronesia', 0),
(156, 'Moldavia', 0),
(157, 'Mongolia', 0),
(158, 'Montenegro', 0),
(159, 'Montserrat', 0),
(160, 'Mozambique', 0),
(161, 'Namibia', 0),
(162, 'Nauru', 0),
(163, 'Nepal', 0),
(164, 'Nicaragua', 0),
(165, 'Niger', 0),
(166, 'Nigeria', 0),
(167, 'Niue', 0),
(168, 'Noruega', 0),
(169, 'Nueva Caledonia', 0),
(170, 'Nueva Zelanda', 0),
(171, 'Omán', 0),
(172, 'Países Bajos', 0),
(173, 'Pakistán', 0),
(174, 'Palau', 0),
(175, 'Palestina', 0),
(176, 'Panamá', 0),
(177, 'Papúa Nueva Guinea', 0),
(178, 'Paraguay', 0),
(179, 'Perú', 0),
(180, 'Polinesia Francesa', 0),
(181, 'Polonia', 0),
(182, 'Portugal', 0),
(183, 'Puerto Rico', 0),
(184, 'Qatar', 0),
(185, 'Reino Unido', 0),
(186, 'República Centroafricana', 0),
(187, 'República Checa', 0),
(188, 'República Dominicana', 0),
(189, 'República de Sudán del Sur', 0),
(190, 'Reunión', 0),
(191, 'Ruanda', 0),
(192, 'Rumanía', 0),
(193, 'Rusia', 0),
(194, 'Sahara Occidental', 0),
(195, 'Samoa', 0),
(196, 'Samoa Americana', 0),
(197, 'San Bartolomé', 0),
(198, 'San Cristóbal y Nieves', 0),
(199, 'San Marino', 0),
(200, 'San Martín -Francia', 0),
(201, 'San Pedro y Miquelón', 0),
(202, 'San Vicente y las Granadinas', 0),
(203, 'Santa Elena', 0),
(204, 'Santa Lucía', 0),
(205, 'Santo Tomé y Príncipe', 0),
(206, 'Senegal', 0),
(207, 'Serbia', 0),
(208, 'Seychelles', 0),
(209, 'Sierra Leona', 0),
(210, 'Singapur', 0),
(211, 'Sint Maarten', 0),
(212, 'Siria', 0),
(213, 'Somalia', 0),
(214, 'Sri lanka', 0),
(215, 'Sudáfrica', 0),
(216, 'Sudán', 0),
(217, 'Suecia', 0),
(218, 'Suiza', 0),
(219, 'Surinám', 0),
(220, 'Svalbard y Jan Mayen', 0),
(221, 'Swazilandia', 0),
(222, 'Tayikistán', 0),
(223, 'Tailandia', 0),
(224, 'Taiwán', 0),
(225, 'Tanzania', 0),
(226, 'Territorio Británico del Océano Índico', 0),
(227, 'Territorios Australes y Antárticas Franceses', 0),
(228, 'Timor Oriental', 0),
(229, 'Togo', 0),
(230, 'Tokelau', 0),
(231, 'Tonga', 0),
(232, 'Trinidad y Tobago', 0),
(233, 'Tunez', 0),
(234, 'Turkmenistán', 0),
(235, 'Turquía', 0),
(236, 'Tuvalu', 0),
(237, 'Ucrania', 0),
(238, 'Uganda', 0),
(239, 'Uruguay', 0),
(240, 'Uzbekistán', 0),
(241, 'Vanuatu', 0),
(242, 'Venezuela', 0),
(243, 'Vietnam', 0),
(244, 'Wallis y Futuna', 0),
(245, 'Yemen', 0),
(246, 'Yibuti', 0),
(247, 'Zambia', 0),
(248, 'Zimbabue', 0),
(263, 'Pais test 2', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquias`
--

CREATE TABLE `parroquias` (
  `id_parroquia` bigint(20) NOT NULL,
  `nparroquia` text NOT NULL,
  `id_ciudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `parroquias`
--

INSERT INTO `parroquias` (`id_parroquia`, `nparroquia`, `id_ciudad`) VALUES
(1, 'Lizarzaburu', 109),
(2, 'Maldonado', 109),
(3, 'Velasco', 109),
(4, 'Veloz', 109),
(5, 'Yaruquíes', 109);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id_provincia` bigint(20) NOT NULL,
  `nprovincia` text NOT NULL,
  `id_pais` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id_provincia`, `nprovincia`, `id_pais`, `activo`) VALUES
(1, 'Esmeraldas', 57, 0),
(2, 'Carchi', 57, 0),
(3, 'Imbabura', 57, 0),
(4, 'Sucumbíos', 57, 0),
(5, 'Manabí', 57, 0),
(6, 'Santo Domingo de los Tsáchilas', 57, 0),
(7, 'Pichincha', 57, 0),
(8, 'Napo', 57, 0),
(9, 'Orellana', 57, 0),
(10, 'Pastaza', 57, 0),
(11, 'Los Ríos', 57, 0),
(12, 'Cotopaxi', 57, 0),
(13, 'Bolívar', 57, 0),
(14, 'Tungurahua', 57, 0),
(15, 'Chimborazo', 57, 0),
(16, 'Morona Santiago', 57, 0),
(17, 'Guayas', 57, 0),
(18, 'Santa Elena', 57, 0),
(19, 'Cañar', 57, 0),
(20, 'Azuay', 57, 0),
(21, 'El Oro', 57, 0),
(22, 'Loja', 57, 0),
(23, 'Zamora Chinchipe', 57, 0),
(24, 'Galápagos', 57, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id_tipodoc` int(11) NOT NULL,
  `ndocumento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id_tipodoc`, `ndocumento`) VALUES
(1, 'Cédula'),
(2, 'Pasaporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_genero`
--

CREATE TABLE `tipo_genero` (
  `id_genero` int(11) NOT NULL,
  `genero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_genero`
--

INSERT INTO `tipo_genero` (`id_genero`, `genero`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_asistencias`
--

CREATE TABLE `t_asistencias` (
  `id_t_asistencia` int(11) NOT NULL,
  `cant` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usua_nombre` varchar(100) DEFAULT NULL,
  `cargo` text DEFAULT NULL,
  `canton` varchar(100) DEFAULT NULL,
  `parroquia` varchar(100) DEFAULT NULL,
  `cedula` varchar(100) DEFAULT NULL,
  `edad` varchar(100) DEFAULT NULL,
  `celular` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `nivel_cursado` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `cod_grupo` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `codigo_qr` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usua_nombre`, `cargo`, `canton`, `parroquia`, `cedula`, `edad`, `celular`, `correo`, `nivel_cursado`, `usuario`, `pass`, `cod_grupo`, `id_estado`, `id_evento`, `codigo_qr`) VALUES
(1, 'Administrador del Sistema *', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'c4b0f7c331d505773a430b5fd7452af3', 10001, 1, 1, NULL),
(2, 'Dixander Carballo Buque', NULL, NULL, NULL, NULL, NULL, NULL, 'dixancarballo@gmail.com', NULL, 'dixander', 'c788a30fd29e9f12c59e047d91bb8f14', 10002, 1, 1, NULL),
(3, 'Rep', NULL, NULL, NULL, NULL, NULL, NULL, 'rep@gmail.com', NULL, 'rep', '0cc175b9c0f1b6a831c399e269772661', 10003, 1, 1, NULL),
(4, 'NELSON JAIME INAMAGUA MARTÍNEZ', NULL, 'ALAUSI', 'PUMALLACTA', '0602728305', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(5, 'CARLOS HUGO MOROCHO INAMAGUA', NULL, 'ALAUSI', 'SEVILLA', '0605553783', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(6, 'MAYRA GEOCONDA ESPINOZA MARTÍNEZ', NULL, 'ALAUSI', 'CHUNCHI', '1724636251', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(7, 'BLANCA LEOVA TAIPE MARTÍNEZ', NULL, 'ALAUSI', 'PUMALLACTA', '0603854837', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(8, 'ROCÍO MARCELA GUADALUPE PAREDES', NULL, 'ALAUSI', 'PUMALLACT', '0605498043', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(9, 'MARIA HILDA DAQUILEMA TENE', NULL, 'ALAUSI', 'PISTILLI', '0604809434', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(10, 'NANCY PILAR CHAFLA ORTEGA', NULL, 'ALAUSI', 'SEVILLA', '0605686443', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(11, 'MARIA GRISELDA QUISHPI DOBLA', NULL, 'ALAUSI', 'SEVILLA', '0604074724', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(12, 'MARÍA CARMEN MOINA CUENCA', NULL, 'ALAUSI', 'SEVILLA', '0602653776', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(13, 'MARÍA EULALIA QUISHPI QUISHPI', NULL, 'ALAUSI', 'SEVILLA', '0605683887', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(14, 'MARÍA DOLORES TENESCA', NULL, 'ALAUSI', 'ALAUSÍ', '0602751919', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(15, 'JORGE EDUARDO MOINA QUIZHPI', NULL, 'ALAUSI', 'SEVILLA', '0602423559', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(16, 'MARÍA GLADYS MOINA LEMA', NULL, 'ALAUSI', 'SEVILLA', '0920239621', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(17, 'AIDA CLARISA QUISHPI QUISHPI', NULL, 'ALAUSI', 'SEVILLA', '0604515072', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(18, 'MARTHA PIEDAD PILCO PINDUISACA', NULL, 'CHAMBO', NULL, '0604262147', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(19, 'WASHINGTON JAVIER PILCO PINDUISACA', NULL, 'CHAMBO', NULL, '0605083575', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(20, 'MARÍA ESPERANZA PILCO PINDUISACA', NULL, 'CHAMBO', NULL, '0604709923', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(21, 'WIDINSON FERNANDO GUALLPA GUAMÁN', NULL, 'CHAMBO', NULL, '0650188220', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(22, 'SUSANA MARIBEL QUIGUIRI JAYA', NULL, 'CHAMBO', NULL, '0605481845', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(23, 'MARÍA OLGA CRUZ LÓPEZ', NULL, 'CHAMBO', NULL, '0603521386', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(24, 'ELVIA LUCIA SAYAY SAYAY', NULL, 'GUAMOTE', NULL, '060628892', NULL, NULL, NULL, 'Ciclo básico', NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(25, 'ÁNGEL EFRAÍN BOCÓN APUGLLÓN', NULL, 'GUAMOTE', NULL, '0605800309', NULL, NULL, NULL, 'Ciclo  básico', NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(26, 'JOSÉ JUAN QUISHPE BOCÓN', NULL, 'GUAMOTE', NULL, '0605861194', NULL, NULL, NULL, 'Ciclo básico', NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(27, 'NANCY BIALU PALTAN SURRIA', NULL, 'GUAMOTE', NULL, '0605168889', NULL, NULL, NULL, 'Ciclo básico', NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(28, 'ÁNGEL JOSUÉ NAULA MISHQUI', NULL, 'GUAMOTE', NULL, '0605269000', NULL, NULL, NULL, 'Ciclo básico', NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(29, 'JEFFERSON STEVEN NAULA TENESACA', NULL, 'GUAMOTE', NULL, '0605269125', NULL, NULL, NULL, 'Ciclo básico', NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(30, 'NOEMI TENEGUZÑAY QUINLLE', NULL, 'GUAMOTE', NULL, '0605264019', NULL, NULL, NULL, 'Ciclo básico', NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(31, 'LUÍS MATÍAS TENESACA NAULA', NULL, 'GUAMOTE', NULL, '0606269232', NULL, NULL, NULL, 'Ciclo básico', NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(32, 'FAUSTO RODRIGO TADAY TADAY', NULL, 'GUAMOTE', NULL, '0603547704', NULL, NULL, NULL, 'Ciclo básico', NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(33, 'MARÍA NATIVIDAD GUALLY TENEGUZÑAY', NULL, 'GUAMOTE', NULL, '0604043729', NULL, NULL, NULL, 'Ciclo básico', NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(34, 'MILTON FABIÁN TENESACA MISHQUI', NULL, 'GUAMOTE', NULL, '0604587063', NULL, NULL, NULL, 'Ciclo básico', NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(35, 'NARCISA NATALY IÑEGUEZ MOLINA', NULL, 'GUANO', 'LA MATRIZ', '0604827832', NULL, '984239411', NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(36, 'FAUSTO ADOLFO PILCO CAYAMBE', NULL, 'GUANO', 'SAN ANDRÉS ', '0604820886', NULL, '968764453', NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(37, 'VERÓNICA VANEZA CUNALATA CHICAIZA', NULL, 'GUANO', 'LA MATRIZ', '0604966853', NULL, '992158427', NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(38, 'LUIS CARLOS BONILLA TIBANQUIZA', NULL, 'GUANO', 'ROSARIO ', '0602693194', NULL, '988303360', NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(39, 'FLOR MARÍA GARCÉS LASSO', NULL, 'GUANO', 'ILAPO (SAGUAZO LA UNION)', '0605111244', NULL, '999530877', NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(40, 'NELY ROCIO MUYULEMA BAYAS', NULL, 'GUANO', 'ILAPO (SAGUAZO LA UNION)', '0603902651', NULL, '981333778', NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(41, 'SOLANG LISETH CASA CHICAIZA', NULL, 'GUANO', 'ILAPO (SAGUAZO LA UNION)', '0604958280', NULL, '991174291', NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(42, 'SEGUNDO ROMULO AREVALO VILEMA', NULL, 'GUANO', 'ILAPO (SAGUAZO CRUZ DE MAYO)', '0604694943', NULL, '939463685', NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(43, 'JEFERSON ALEXANDER AREVALO AGUILERA', NULL, 'GUANO', 'ILAPO (SAGUAZO CRUZ DE MAYO)', '0650356785', NULL, '989087689', NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(44, 'MAYRA ALEXANDRA LASSA DIASACA', NULL, 'GUANO', 'ILAPO (SAGUAZO CRUZ DE MAYO)', '0605522119', NULL, '982680136', NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(45, 'SOLEDAD JANETH ORTIZ MAZÓN S', NULL, 'PENIPE', NULL, '0603751025', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(46, 'JULIA TERESA CÁRDENA VILLARROEL', NULL, 'PENIPE', NULL, '0604299230', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(47, 'LUÍS ALBERTO ROSERO ZAPATA', NULL, 'PENIPE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(48, 'ENMA GUADALUPE TIVAN GALARZA', NULL, 'PENIPE', NULL, '0602466989', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(49, 'CONSUELO DE JESUS HEREDIA CHAVEZ', NULL, 'PENIPE', NULL, '0604403063', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(50, 'FABIAN LIVINO TIVÁN GRANIZO', NULL, 'PENIPE', NULL, '1803350741', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(51, 'ROSA MÓNICA GUANGA GUAMÁN', NULL, 'PENIPE', NULL, '0604518506', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(52, 'MÓNICA ALEXANDRA NAULA MOROMENACHO', NULL, 'PENIPE', NULL, '0604082755', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(53, 'JHON CARLOS VILLALVA YAMBAY', NULL, 'PENIPE', NULL, '0605028034', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(54, 'PEDRO MORALES PAZ RIVERA', NULL, 'PENIPE', NULL, '0605671338', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(55, 'MARTHA CAIN CHIMBOLEMA', NULL, 'RIOBAMBA', 'FLORES ', '0604953329', NULL, '969139106', NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(56, 'CARMITA DEL ROCIO YUPANGUI DUQUE', NULL, 'RIOBAMBA', 'QUIMIAG ', '0603179771', NULL, '984939334', ' mariabelenchuy24@gmail.com', NULL, ' mariabelenchuy24@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(57, 'LUIS ALBERTO BETUN SHILQUIGUA', NULL, 'RIOBAMBA', 'QUIMIAG ', '0601645401', NULL, '988153679', 'luis-a-betun@live.com', NULL, 'luis-a-betun@live.com', '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(58, 'MILTO WILFRIDO TACURI TAYUPANDA', NULL, 'RIOBAMBA', 'CALPI', '0603395294', NULL, '961907527', NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(59, 'BLANCA MARCELA ANDINO MADERO', NULL, 'RIOBAMBA', 'CUBIJIES ', '0602867434', NULL, '989419205', 'Marilynvillamarin@yahoo.com', NULL, 'Marilynvillamarin@yahoo.com', '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(60, 'MARIELA ESPERENZA SILVA JARA', NULL, 'RIOBAMBA', 'CUBIJIES ', '0602953085', NULL, '987354919', 'marietasilva88@gmail.com', NULL, 'marietasilva88@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(61, 'AMANDA MERCEDES \n GRANIZO SALAZAR', NULL, 'RIOBAMBA', 'LICTO', '0603637570', NULL, '998414094', NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(62, 'ANA LUCÍA VELOSO PACA', NULL, 'RIOBAMBA', 'CUBIJIES ', '0603793779', NULL, NULL, 'Verónica.cushpa2003@gmail.com', NULL, 'Verónica.cushpa2003@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(63, 'JAQUELINE JOANA CALUÑA QUISHPI', NULL, 'PALLATANGA', NULL, '0605244789', '18', '968385060', NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(64, 'ROSA ANA QUINZO LOPEZ', NULL, 'PALLATANGA', NULL, '0602110033', '53', NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(65, 'INES GEORGINA CAMPOVERDE LEMA', NULL, 'PALLATANGA', NULL, '0604871921', '36', NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(66, 'BELLA MERCEDES HUGO ASTUDILLO', NULL, 'PALLATANGA', NULL, '0603963653', NULL, '991106792', NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(67, 'ELSA INES LEMA GRANIZO', NULL, 'PALLATANGA', NULL, '0604207712', '37', '985108548', NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(68, 'BYRON GEOVANNY CAYAMBE CAYAMBE', NULL, 'PALLATANGA', NULL, '0605254960', '26', '985005272', NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(69, 'EDWIN ALBERTO LOGROÑO', NULL, 'PALLATANGA', NULL, '0605610369', '31', '989127455', NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(70, 'TANIA ELIZABETH RODRIGUEZ MENESES', NULL, 'PALLATANGA', NULL, '1719618132', '36', '959757804', NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(71, 'LAURA ELIZABETH ASTUDILLO CRIOLLO', NULL, 'PALLATANGA', NULL, '0604077701', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(72, 'REMIGIO MARIANO ASTUDILLO CEBALLOS', NULL, 'PALLATANGA', NULL, '0603282500', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(73, 'BELGICA PIEDAD ASTUDILLO CRIOLLO', NULL, 'PALLATANGA', NULL, '0603499062', NULL, '982543888', NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(74, 'WALTER GERMAN SISALEMA LINARES', NULL, 'PALLATANGA', NULL, '0603377540', '42', '988701907', NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(75, 'CARLOS MANUEL NOBOA LOPEZ', NULL, 'PALLATANGA', NULL, NULL, '43', '969323757', NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(76, 'MARIA AZUCENA MANCERO MARQUEZ', NULL, 'PALLATANGA', NULL, '0603404013', '39', '989384027', NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(77, 'TATIANA DEL ROCIO MANCERO MARQUEZ', NULL, 'PALLATANGA', NULL, '0604769711', '32', '998194638', NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(78, 'JUAN CARLOS ORELLANA BARRERA', NULL, 'PALLATANGA', NULL, NULL, '36', '999307521', NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(79, 'JONATHAN ADRIAN GRANIZO VILLAGOMEZ', NULL, 'PALLATANGA', NULL, '0605092287', '26', '995402673', NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(80, 'MARGARITA LEONOR REMACHE ORTIZ', NULL, 'COLTA', 'SICALPA', '0603301516', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(81, 'JORGE YEPEZ LEMA', NULL, 'COLTA', 'SICALPA', '0603398546', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(82, 'MANUEL ALEJANDRO HIDALGO LÓPEZ', NULL, 'COLTA', 'CAJABAMBA', '0603872433', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(83, 'LUIS EDUARDO HIDALGO ROSERO', NULL, 'COLTA', 'CAJABAMBA', '0605620178', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(84, 'EMMA BEATRIZ MINAGUA GUAILLA', NULL, 'COLTA', 'COLUMBE', '0606020287', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(85, 'ROSARIO MULLO YUQUILEMA', NULL, 'COLTA', 'COLUMBE', '060233016', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(86, 'BLANCA NIEVES CONDOR CUJI', NULL, 'COLTA', 'CAÑI', '0604719054', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(87, 'JOSE IGNACIO NINABANDAGUAMAN', NULL, 'COLTA', 'CAÑI', '0602715955', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(88, 'LUIS EFRAIN CUJILEMA YAMBAY', NULL, 'COLTA', 'CAÑI', '0603699125', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(89, 'ROSA ALBINA TOAPANTA CUJI', NULL, 'COLTA', 'CAÑI', '0603790437', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(90, 'SAMUEL PILAMUNGA ZAENS', NULL, 'COLTA', 'SANTIAGO DE QUITO', '0603270232', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(91, 'SEGUNDO ABELINO LLAGCHA PALA', NULL, 'COLTA', 'JUAN DE VELASCO', '0602880668', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(92, 'MARIO ERNESTO CAYAMBE SAYAY', NULL, 'COLTA', 'JUAN DE VELASCO', '0603842527', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(93, 'Napoleón   Cadena', 'Alcalde de Riobamba ', 'Riobamba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(94, 'Pablo  Narváez ', 'Director de Gestión Cultural, Deportes y Recreación del Municipio de Riobamba', 'Riobamba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(95, 'John  Vinueza', 'Asambleísta por Chimborazo', 'Riobamba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(96, 'Nathalia  Urgiléz', 'Concejal del Cantón Riobamba', 'Riobamba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(97, 'Fernando   Vaca', 'Secretario Ejecutivo del Consejo Cantonal para la Protección de Derechos', 'Riobamba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(98, 'Francisco  Vaca ', 'Director de Desarrollo Social del Municipio de Riobamba ', 'Riobamba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(99, 'David  Alvarado ', 'Gerente de Plan Internacional Chimborazo – Bolívar', 'Riobamba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(100, 'Fernando   Flor', 'Presidente del Centro Deportivo Olmedo', 'Riobamba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(101, 'Luis  Oleas', 'Jefe Político del cantón Riobamba', 'Riobamba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(102, 'Fanny  Cuzco', 'Jefe Político del cantón Alausí', 'Alausí', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(103, 'Jorge  Delgado', 'Jefe Político del cantón Chambo', 'Chambo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(104, 'Verónica  Remache ', 'Jefe Político del cantón Colta ', 'Colta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(105, 'José  Guamán', 'Jefe Político del cantón Guamote', 'Guamote', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(106, 'Hugo  Fiallos', 'Jefe Político del cantón Cumandá', 'Cumandá', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(107, 'Joel  Echeverría', 'Jefe Político del cantón Pallatanga ', 'Pallatanga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(108, 'Hernán  Tamayo', 'Jefe Político del cantón Chunchi', 'Chunchi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(109, 'Edwin  Ototoy', 'Jefe Político del cantón Guano ', 'Guano', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(110, 'Jhony  Baldeón', 'Jefe Político del cantón Penipe', 'Penipe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(111, 'Rebeca  Castellanos', 'Rectora de la Universidad Nacional de Educación', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(112, 'Luis  Hernández', 'Vicerrector Académico de la Universidad Nacional de Educación', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(113, 'Malena  Sánchez ', 'Directora de Formación Continua de la Universidad Nacional de Educación', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(114, 'Gabriela  Guillén', 'Directora de la Maestría en Educación Inclusiva de la Universidad Nacional de Educación', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(115, 'Enrique  Pozo Cabrera', 'Rector de la Universidad Católica de Cuenca', 'Cuenca', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(116, 'Galo  Naranjo ', 'Rector de la Universidad Técnica de Ambato ', 'Ambato', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(117, 'Víctor  Hernández', 'Decano de la Facultad de Educación de la Universidad Técnica de Ambato', 'Ambato', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(118, 'María Eugenia  Vásquez ', 'Subdirectora de Vinculación con la Sociedad de la Universidad Católica de Cuenca ', 'Cuenca', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(119, 'María  Brown ', 'Ministra de Educación', 'Quito', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(120, 'Enrique  Pérez', 'Subsecretario de Educación ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(121, 'Ximena  Loroña', 'Coordinadora Zonal 3 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(122, 'Karina  Rivadeneria ', 'Subsecretaría de Discapacidades', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(123, 'Lizeth  Cueva', 'Directora Nacional de Formación Continua', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(124, 'Magaly  Ramos', 'Subsecretaría de Desarrollo Profesional Educativo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(125, 'Anunzziata  Valdez ', 'Coordinadora Mesa Nacional de Educación con Valores', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(126, 'Nelson  Guim', 'Coordinador de la Mesa Nacional de Educación con Valores', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(127, 'Alfredo  Harmsen', 'Miembro de la Mesa Nacional de Educación con Valores', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(128, 'Chantal  Fontaine ', 'Miembro de la Mesa Nacional de Educación con Valores', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(129, 'Belén  Reinoso', 'Rectora de la Unidad Educativa Nuevo Ecuador', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(130, 'María  Ávalos ', 'Fundadora de la Unidad Educativa Nuevo Ecuador', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(131, ' Franklin  Cepeda', 'Historiador ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(132, 'Claudia  Segovia', 'Fundadora de la Red Ecuatoriana de Mujeres Científicas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(133, 'Johanna  Orellana ', 'Coordinadora de la Red Ecuatoriana de Mujeres Científicas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(134, 'Byron Vaca', 'Rector de la Escuela Superior Politécnica de Chimborazo ', 'Riobamba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(135, 'Nicolay  Samaniego ', 'Rector de la Universidad Nacional de Chimborazo', 'Riobamba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(136, 'Jorge  Naranjo', 'Director Distrital de Educación Riobamba - Chambo', 'Riobamba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(137, 'Fressia  Pamiño', 'Directora de Relaciones Internacionales de la Escuela Superior Politécnica de Chimborazo', 'Riobamba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(138, 'David Luzuriaga', 'Embajador FIbE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(139, 'Brillo Reyes', 'Embajador FIbE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(140, 'Paul Yuquilema', 'Embajador FIbE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(141, 'Jorge Quintana', 'Embajador FIbE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(142, 'Belén Cedeño', 'Embajador FIbE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(143, 'Andrés Cajas', 'Embajador FIbE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(144, 'Jenny Guillín', 'Embajador FIbE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(145, 'Néstor Guamán', 'Embajador FIbE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(146, 'Patricia Cruz ', 'Embajador FIbE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(147, 'Victoria Sabando', 'Embajador FIbE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(148, 'Luis Terán ', 'Embajador FIbE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(149, 'Gabriela Ortiz', 'Embajador FIbE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(150, 'Eimmy  Rogcha ', 'Embajador FIbE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(151, 'Daysi Yuquilema', 'Asambleísta alterna por Chimborazo y Embajadora FIbE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10006, 1, 1, NULL),
(152, 'DEYSI PAOLA  MIRANDA CAIZA', NULL, 'CHAMBO', NULL, '0604858415', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(153, 'DINA MARIBEL  MIRANDA CAIZA', NULL, 'CHAMBO', NULL, '0604578922', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(154, 'EDISON STIVEN  GAVILANEZ GAVILANES', NULL, 'CHAMBO', NULL, '0650357403', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(155, 'JUAN TIOFILO  SISLEMA YASACA', NULL, 'CHAMBO', NULL, '0603515230', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(156, 'MARÍA ISABEL  SISLEMA GUZÑAY', NULL, 'CHAMBO', NULL, '0604490219', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(157, 'MARTHA FABIOLA  CHINCHE YASACA', NULL, 'CHAMBO', NULL, '0603805102', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(158, 'MARTHA JIMENA  OLMEDO CRIOLLO', NULL, 'CHAMBO', NULL, '0603316910', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(159, 'PATRICIA CAROLINA  RECUENCO GRANIZO', NULL, 'PALLATANGA', NULL, '0604357368', '35', '986806412', NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(160, 'SEGUNDO RICARDO  ASHQUI HUARACA', NULL, 'CHAMBO', NULL, '0604647834', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(240, 'CECILIA MAGDALENA CHOTO SAULAG', NULL, 'CHAMBO', NULL, '0602888612', NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10005, 1, 1, NULL),
(241, 'MARIA JUANA TOCTE COFRE', NULL, 'CHAMBO', NULL, '0501871248', NULL, NULL, NULL, NULL, NULL, NULL, 10005, 1, 1, NULL),
(242, 'CARLOS MIRANDA CAIZA', NULL, 'CHAMBO', NULL, '0602558744', NULL, NULL, NULL, NULL, NULL, NULL, 10005, 1, 1, NULL),
(243, 'ALEX FERNANDO MAÑAY SAMPEDRO\r\n', NULL, 'GUANO', NULL, '0604698100', NULL, '960267597', NULL, NULL, NULL, NULL, 10005, 1, 1, NULL),
(244, 'ALEX MIGUEL COSQUILLO GUANGA', NULL, 'PENIPE', NULL, '0605032440', NULL, NULL, NULL, NULL, NULL, NULL, 10005, 1, 1, NULL),
(245, 'VÍCTOR HUGO LOBATO', 'RECTOR INSTITUTO SUPERIOR TECNOLÓGICO FRANCISCO DE ORELLANA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(246, 'HERNÁN PAUCAR', 'RECTOR INSTITUTO SUPERIOR PEDAGÓGICO BILINGÜE INTERCULTURAL CANELOS\r\n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(247, 'ROLANDO ÁLVAREZ BELTRÁN', 'RECTOR INSTITUTO SUPERIOR TECNOLÓGICO ALMIRANTE ILLINGWORTH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(248, 'EDGAR  MERINO', 'RECTOR INSTITUTO SUPERIOR TECNOLÓGICO BOLÍVAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(249, 'CARLOS EUGENIO', 'RECTOR INSTITUTO SUPERIOR TECNOLÓGICO COTOPAXI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(250, 'ALEXANDRA OROZCO', 'RECTORA INSTITUTO SUPERIOR TECNOLÓGICO DE FÚTBOL QUITO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(251, 'EDGAR  MERINO', 'RECTOR INSTITUTO SUPERIOR TECNOLÓGICO GUAYAQUIL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(252, 'TONY  FLORES', 'RECTOR INSTITUTO SUPERIOR PEDAGÓGICO INTERCULTURAL BILINGÜE JAIME ROLDÓS AGUILERA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(253, 'ALEX  ROMÁN ', 'RECTOR INSTITUTO SUPERIOR TECNOLÓGICO LA MANÁ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(254, 'MARIUXI CASTILLO', 'RECTORA INSTITUTO SUPERIOR TECNOLÓGICO LUIS A. MARTINEZ AGRONÓMICO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(255, 'EDGAR MERINO', 'RECTOR INSTITUTO SUPERIOR TECNOLÓGICO - LUIS A. MARTÍNEZ CENTRO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(256, 'MARCELA SILVA', 'RECTORA INSTITUTO SUPERIOR TECNOLÓGICO MANUEL GALECIO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(257, 'WILFRIDO ROBALINO', 'RECTOR INSTITUTO SUPERIOR TECNOLÓGICO VIDA NUEVA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(258, 'TANIA  PARRA', 'RECTORA INSTITUTO SUPERIOR TECNOLÓGICO RIOBAMBA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(259, 'PAÚL VITERI', 'RECTOR COLEGIO DE LIGA DE QUITO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(260, 'SANDRA BURBANO', 'RECTORA FEDERACION NACIONAL DE CIEGOS DEL ECUADOR (FENCE)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(261, 'MSC. EDGAR WELLINGTON FRIAS BORJA', 'RECTOR INSTITUTO TECNOLÓGICO SUPERIOR REPÚBLICA FEDERAL DE ALEMANIA  ISTRA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(262, 'JUAN CARLOS  SOLANO', 'PRESIDENTE RED ACADÉMICA SINERGIA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(263, 'LUIS ANTONIO VARGAS', 'GERENTE GENERAL SOCIEDAD DE ALTO RENDIMIENTO EDUCATIVO Y PROFESIONAL SOALREP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(264, 'SARA JARAMILLO', 'DIRECTORA ORGANIZACIÓN DE ESTADOS IBEROAMERICANOS PARA LA EDUCACIÓN, LA CIENCIA Y LA CULTURA (OEI)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(265, 'GALO NARANJO', 'RECTOR UNIVERSIDAD TÉCNICA DE AMBATO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(266, 'OSCAR MARTINEZ', 'PRESIDENTE INDTEC INSTITUTO INTERNACIONAL DE INVESTIGACIÓN Y DESARROLLO TECNOLÓGICO EDUCATIVO INDTEC S.A.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(267, 'ENRIQUE  POZO', 'RECTOR UNIVERSIDAD CATÓLICA DE CUENCA (UCC)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(268, 'LCDO. ARMANDO PAILLACHO MELO', 'ALCALDE GOBIERNO AUTÓNOMO DESCENTRALIZADO MUNICIPAL DE HUACA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(269, 'MGS. MARTHA CÓRDOVA ', 'PRESIDENTA FEDEPAL GUAYAS FEDEPAL GUAYAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(270, 'MGS. ÁNGEL CABRERA', 'RECTOR INSTITUTO SUPERIOR TECNOLÓGICO LIMÓN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(271, 'MGS. MARÍA  MUESES', 'RECTORA INSTITUTO SUPERIOR TECNOLÓGICO SUCÚA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(272, 'MGS. MARÍA ISABEL UREÑA', 'RECTORA INSTITUTO SUPERIOR TECNOLÓGICO DANIEL ALVAREZ BURNEO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(273, 'MGS. VIVIANA JIMENEZ', 'ASESORA PEDAGÓGICA  ACADÉMICA FEDEPAL NACIONAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(274, 'ADRIAN PABLO CANNELLOTO', 'REPRESENTANTE UNIVERSIDAD POEDAGÓGICA NACIONAL (UNIPE)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(275, 'FERNANDO AVENDAÑO', 'DIRECTOR DEL DOCTOTRADO EN EDUCACIÓN UNIVERSIDAD NACIONAL DE ROSARIO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0cc175b9c0f1b6a831c399e269772661', 10008, 1, 1, NULL),
(276, 'María José Pontón', 'Gobernadora de Chimborazo ', 'Riobamba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10006, 1, 1, NULL),
(277, 'Carlos Cevallos (delegado)', 'FEDEPAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10004, 1, 1, NULL),
(279, 'Josué', 'Delegado de la Iglesia del Nazareno (Compassion Internacional)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10004, 1, 1, NULL),
(280, 'Aron Paredes', 'Delegado de la Iglesia del Nazareno (Compassion Internacional)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10004, 1, 1, NULL),
(281, 'Kevin Paredes', 'Delegado de la Iglesia del Nazareno (Compassion Internacional)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10004, 1, 1, NULL),
(284, 'Jessenia Freire', 'Directora del Centro Infantil Brinkadoteka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10004, 1, 1, NULL),
(285, 'Nelson Granizo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10004, 1, 1, NULL),
(286, 'Salomon Flores', 'FERSA INGENIERÍA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10004, 1, 1, NULL),
(287, 'Rosa Espinoza', 'FERZA INGENIERÍA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10004, 1, 1, NULL),
(288, 'John Villalva', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10005, 1, 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id_asistencia`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id_ciudad`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`),
  ADD UNIQUE KEY `periodo` (`nevento`,`f_inicioe`,`f_fine`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `parroquias`
--
ALTER TABLE `parroquias`
  ADD PRIMARY KEY (`id_parroquia`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id_provincia`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id_tipodoc`);

--
-- Indices de la tabla `tipo_genero`
--
ALTER TABLE `tipo_genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `t_asistencias`
--
ALTER TABLE `t_asistencias`
  ADD PRIMARY KEY (`id_t_asistencia`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id_asistencia` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `id_ciudad` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT de la tabla `parroquias`
--
ALTER TABLE `parroquias`
  MODIFY `id_parroquia` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id_provincia` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id_tipodoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_genero`
--
ALTER TABLE `tipo_genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_asistencias`
--
ALTER TABLE `t_asistencias`
  MODIFY `id_t_asistencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
