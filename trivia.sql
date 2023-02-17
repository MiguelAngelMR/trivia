-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-02-2023 a las 03:25:31
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `triviaambipargroup`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `pregunta` int(11) NOT NULL,
  `respuesta` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id`, `usuario`, `pregunta`, `respuesta`, `fecha`) VALUES
(1, 3, 23, 1, '2023-02-17 01:19:22'),
(2, 3, 23, 3, '2023-02-17 01:19:27'),
(3, 3, 23, 2, '2023-02-17 01:19:29'),
(4, 3, 20, 1, '2023-02-17 01:20:18'),
(5, 3, 9, 1, '2023-02-17 02:04:38'),
(6, 3, 9, 2, '2023-02-17 02:04:40'),
(7, 3, 9, 3, '2023-02-17 02:04:40'),
(8, 3, 2, 2, '2023-02-17 02:05:00'),
(9, 3, 2, 1, '2023-02-17 02:05:00'),
(10, 3, 2, 3, '2023-02-17 02:05:01'),
(11, 4, 1, 3, '2023-02-17 02:10:58'),
(12, 4, 1, 1, '2023-02-17 02:11:02'),
(13, 5, 6, 1, '2023-02-17 02:12:48'),
(14, 5, 6, 2, '2023-02-17 02:12:51'),
(15, 5, 6, 3, '2023-02-17 02:12:53'),
(16, 11, 2, 3, '2023-02-17 02:18:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(250) NOT NULL,
  `respuesta1` varchar(250) NOT NULL,
  `respuesta2` varchar(250) NOT NULL,
  `respuesta3` varchar(250) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  `correcta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `pregunta`, `respuesta1`, `respuesta2`, `respuesta3`, `imagen`, `correcta`) VALUES
(1, '¿A qué nos dedicamos en Ambipar Environment? ', 'Soluciones ambientales, valorización de residuos', 'Gestión de crisis', 'Emergencias químicas y biológicas', 'imagen1.png', 1),
(2, '¿A qué nos dedicamos en Ambipar Response? ', 'Contribuir al impacto ambiental de actividades empresariales', 'Respuesta a emergencias y gestión de crisis', 'Economía circular', 'imagen2.png', 2),
(3, 'Disal ahora es… ', 'Ambipar Response', 'Ambipar Environment', 'Disal Environment', 'imagen3.png', 2),
(4, '¿En cuántos países tiene presencia Ambipar Group?', '14', '10', '16', 'imagen4.png', 3),
(5, '¿Cuántos años de trayectoria tiene Ambipar Group?', '15', '12', '27', 'imagen5.png', 3),
(6, 'Durante el 2021 ayudamos a nuestros clientes a valorizar … toneladas residuos sólidos.', '+10 mil', '+2 mil', '+5 mil', 'imagen6.png', 1),
(7, '¿Cuál es el impacto de nuestras plantas GIRI? ', 'Económico, social, ambiental', 'Económico, político, social', 'Social, político y ambiental', 'imagen7.png', 1),
(8, 'Ambipar Environment se encuentra en el top … de empresas del rubro', '30', '10', '20', 'imagen8.png', 2),
(9, '¿Qué es Resflow?', 'Software para gestionar la recolección de residuos ', 'Plataforma de Ambipar', 'Sistema para organizar rutas de limpieza y mantenimiento', 'imagen9.png', 1),
(10, '¿Qué es SimpliRoute?', 'Sistema para organizar rutas de limpieza y mantenimiento', 'Software para gestionar la recolección de residuos', 'Sistema de seguridad laboral', 'imagen10.png', 1),
(11, '¿A que nos referimos con Zygth?', 'Sistema para la seguridad laboral', 'Sistema para la economía circular', 'Software de reingeniería ambiental', 'imagen11.png', 1),
(12, '¿Cuántas plantas GIRI proyectamos tener hacia el año 2024?', '1', '3', '2', 'imagen12.png', 2),
(13, '¿Cuál es el origen de nuestra empresa?', 'Perú', 'Chile', 'Brasil', 'imagen13.png', 3),
(14, '¿Cuántas bases tenemos en el mundo como Ambipar response?', '+100', '+200', '+300', 'imagen14.png', 3),
(15, '¿Qué famosa es nuestra embajadora?', 'Gisele Bündchen', 'Valeria Maza', 'Maju Mantilla', 'imagen15.png', 1),
(16, '¿Cuántas líneas de servicio tenemos en Ambipar group? ', '2', '4', '1', 'imagen16.png', 2),
(17, 'Nuestra visión es …', 'Contribuir para las empresas y sociedad', 'Ser líder en economía circular', 'Ser reconocidos como una referencia global en soluciones ambientales', 'imagen17.png', 3),
(18, 'Ambipar respeta las normas de …', 'Complicance y responsabilidad ambiental ', 'Economía Circular', 'Medio ambiente', 'imagen18.png', 1),
(19, '¿Qué significa ASG?', 'Ambiental, social y gobernanza', 'Ecología, social, gobierno', 'Empatía, sociedad, global', 'imagen19.png', 1),
(20, '¿Qué significa SGA?', 'Sistema de Gestión Ambiental', 'Sistema de gobierno ambiental', 'Sistema de generación ambiental', 'imagen20.png', 1),
(21, '¿Para cuántos segmentos o rubros trabajamos actualmente?', '+45', '+22', '+15', 'imagen22.png', 2),
(22, '¿Cuál es la certificación más importante que tenemos?', 'Bureau Veritas', 'AENOR', 'Certificación Trinorma por TÜV Rheinland ', 'imagen23.png', 3),
(23, '¿Cuántas emergencias hemos atendido a la fecha como Ambipar response? ', '+5,000', '+200,000', '+50,000', 'imagen24.png', 2),
(24, '¿Durante el 2021 hemos transportado… de residuos?', '2 mil toneladas', '20 mil toneladas', '200 mil toneladas', 'imagen25.png', 3),
(25, '¿Cuál es el modelo de negocio de Ambipar response?', 'Limpieza de playas contaminadas', 'Prevención, preparación y respuesta', 'Ambulancias hospitalarias', 'imagen26.png', 2),
(26, '¿Cuáles son líneas de negocio que corresponden a Ambipar response?', 'Prevención de accidentes, entrenamiento, outsorcing', 'Respuesta a emergencias, equipos de combate contra incendios', 'Todas las anteriores', 'imagen27.png', 3),
(27, '¿Qué empresas te ofrecen un ecosistema integral de soluciones ambientales?', 'Disal y Suatrans', 'Emergencias ambientales S.A.', 'Ambipar environment y ambipar response', 'imagen28.png', 3),
(28, 'Adicional a la valorización de residuos, ¿Qué otros servicios tiene Ambipar environemnt?', 'Gestión integral de residuos, Sanitización', 'Disal: soluciones sanitarias', 'Todas las anteriores.', 'imagen29.png', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas1`
--

CREATE TABLE `preguntas1` (
  `id` int(11) NOT NULL,
  `pregunta` text NOT NULL,
  `respuesta1` text NOT NULL,
  `respuesta2` text NOT NULL,
  `respuesta3` text NOT NULL,
  `correcta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `preguntas1`
--

INSERT INTO `preguntas1` (`id`, `pregunta`, `respuesta1`, `respuesta2`, `respuesta3`, `correcta`) VALUES
(1, '¿Cuál de estos países no fue parte de la Triple Entente en la Primera Guerra Mundial?', 'Italia', 'Francia', 'Rusia', 1),
(2, '¿Qué científico fue el primero en proponer la teoría del Big Bang?', 'Isaac Newton', 'Galileo Galilei', 'Georges Lemaître', 3),
(3, '¿En qué año se declaró la independencia de Estados Unidos?', '1766', '1786', '1776', 3),
(4, '¿Quién es considerado el padre de la anatomía moderna?', 'Galeno', 'Hippocrates', 'Andreas Vesalio', 3),
(5, '¿Cuál de estos países no pertenece a la Unión Europea?', 'Italia', 'España', 'Suiza', 3),
(6, '¿Quién inventó el teléfono?', 'Thomas Edison', 'Nikola Tesla', 'Alexander Graham Bell', 3),
(7, '¿Qué civilización construyó las pirámides de Giza?', 'Grecia', 'Roma', 'Egipto', 3),
(8, '¿Quién descubrió la penicilina?', 'Marie Curie', 'Louis Pasteur', 'Alexander Fleming', 3),
(9, '¿Cuál fue la primera ciudad en ser destruida por una bomba atómica?', 'Nagasaki', 'Tokio', 'Hiroshima', 3),
(10, '¿Quién fue el primer presidente de Estados Unidos?', 'Thomas Jefferson', 'John Adams', 'George Washington', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `empresa` varchar(150) NOT NULL,
  `telefono` varchar(150) NOT NULL,
  `checkbox` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `email`, `empresa`, `telefono`, `checkbox`, `fecha`) VALUES
(1, 'miguel', 'mriveromartinez82@gmail.com', ' 2', '956317419', 1, '2023-02-17 02:18:28'),
(2, 'miguel', 'mriveromartinez82@gmail.com', ' 2', '956317419', 1, '2023-02-17 02:18:41'),
(3, 'miguel', 'mriveromartinez82@gmail.com', ' 2', '956317419', 1, '2023-02-17 02:18:48'),
(4, 'miguel', 'mriveromartinez82@gmail.com', ' 2', '956317419', 1, '2023-02-17 03:07:29'),
(5, 'miguel', 'mriveromartinez82@gmail.com', ' 2', '956317419', 1, '2023-02-17 03:12:42'),
(6, 'miguel', 'mriveromartinez82@gmail.com', ' 2', '956317419', 1, '2023-02-17 03:14:44'),
(7, '', '', ' ', '', 0, '2023-02-17 03:17:43'),
(8, '', '', ' ', '', 0, '2023-02-17 03:18:05'),
(9, '', '', ' ', '', 1, '2023-02-17 03:18:08'),
(10, 'd', '', ' ', '', 1, '2023-02-17 03:18:24'),
(11, '', '', ' ', '', 0, '2023-02-17 03:18:33'),
(12, '', '', ' ', '', 0, '2023-02-17 03:19:16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preguntas1`
--
ALTER TABLE `preguntas1`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `preguntas1`
--
ALTER TABLE `preguntas1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
