-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-09-2020 a las 06:51:07
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bbddblog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `Id` int(11) NOT NULL,
  `Titulo` varchar(25) NOT NULL,
  `Subtitulo` varchar(150) DEFAULT NULL,
  `Fecha` datetime NOT NULL,
  `Comentario` text NOT NULL,
  `Imagen` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`Id`, `Titulo`, `Subtitulo`, `Fecha`, `Comentario`, `Imagen`) VALUES
(25, ' 3&deg; Abierto Infantil ', '', '2020-08-13 21:24:28', '&lt;span class=&quot;oi732d6d ik7dh3pa d2edcug0 qv66sw1b c1et5uql a8c37x1j muag1w35 ew0dbk1b jq4qci2q a3bd9o3v knj5qynh oo9gr5id hzawbc8m&quot; dir=&quot;auto&quot;&gt;Nuestros\r\n amigos del Taller de Ajedrez &quot;Aldo Garc&iacute;a Labandal&quot; de Bah&iacute;a Blanca nos\r\n invitaron al 3&deg; Abierto Infantil Sub-15! Hoy a las 18hs! Solamente \r\nmenores de 15 a&ntilde;os!&lt;/span&gt;', 'ajedrez_infantil.jpg'),
(26, 'Torneo Infantil', 'torneo online', '2020-08-13 22:09:00', '&lt;span class=&quot;oi732d6d ik7dh3pa d2edcug0 qv66sw1b c1et5uql a8c37x1j muag1w35 ew0dbk1b jq4qci2q a3bd9o3v knj5qynh oo9gr5id hzawbc8m&quot; dir=&quot;auto&quot;&gt;&lt;div dir=&quot;auto&quot; style=&quot;text-align: start;&quot;&gt;Hace un momento acaba de finalizar nuestro 3&deg; Abierto Infantil Sub-15 con la participaci&oacute;n de 28 jugadores, de varias ciudades y la presencia de pa&iacute;ses como Mexico, Bolivia y Colombia!&lt;/div&gt;&lt;div dir=&quot;auto&quot; style=&quot;text-align: start;&quot;&gt;Las principales posiciones fueron las siguientes:&lt;/div&gt;&lt;div dir=&quot;auto&quot; style=&quot;text-align: start;&quot;&gt;1&deg;- Juan Ignacio Barraza 35 puntos (Taller de Ajedrez &quot;Aldo Garc&iacute;a Labandal&quot; Lamadrid)&lt;/div&gt;&lt;div dir=&quot;auto&quot; style=&quot;text-align: start;&quot;&gt;2&deg;- Atilio Tob&iacute;as 32 puntos (Colegio Nordbrige CABA)&lt;/div&gt;&lt;div dir=&quot;auto&quot; style=&quot;text-align: start;&quot;&gt;3&deg;- Guillermo Rodr&iacute;guez 31 puntos (Escuela Municipal de Daireaux)&lt;/div&gt;&lt;div dir=&quot;auto&quot; style=&quot;text-align: start;&quot;&gt;4&deg;- Rom&aacute;n Roche 28 puntos (Taller de Ajedrez &quot;Aldo Garc&iacute;a Labandal&quot; Lamadrid)&lt;/div&gt;&lt;div dir=&quot;auto&quot; style=&quot;text-align: start;&quot;&gt;5&deg;- Santiago Loffredo 26 puntos (Circulo de Ajedrez Bah&iacute;a Blanca)&lt;/div&gt;&lt;/span&gt;', 'taller_ajedrez.jpg'),
(27, 'Torneo revancha', 'torneo online', '2020-08-13 22:10:10', '&lt;div class=&quot;&quot; dir=&quot;auto&quot;&gt;&lt;div class=&quot;ecm0bbzt hv4rvrfc ihqw7lf3 dati1w0a&quot; data-ad-comet-preview=&quot;message&quot; data-ad-preview=&quot;message&quot; id=&quot;jsc_c_32&quot;&gt;&lt;div class=&quot;j83agx80 cbu4d94t ew0dbk1b irj2b8pg&quot;&gt;&lt;div class=&quot;qzhwtbm6 knvmm38d&quot;&gt;&lt;span class=&quot;oi732d6d ik7dh3pa d2edcug0 qv66sw1b c1et5uql a8c37x1j muag1w35 ew0dbk1b jq4qci2q a3bd9o3v knj5qynh oo9gr5id hzawbc8m&quot; dir=&quot;auto&quot;&gt;&lt;div class=&quot;kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q&quot;&gt;&lt;div dir=&quot;auto&quot; style=&quot;text-align: start;&quot;&gt;En el d&iacute;a de ayer realizamos en forma conjunta con el ADAR la Gran Revancha del Match: CABB vs ADAR. Muchas gracias a los amigos de Rio Gallegos por jugar contra nosotros!&lt;/div&gt;&lt;div dir=&quot;auto&quot; style=&quot;text-align: start;&quot;&gt;El resultado fue CABB 12 puntos ADAR 10 puntos.&lt;/div&gt;&lt;/div&gt;&lt;/span&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;', 'Gran_revancha.jpg'),
(28, 'Abierto Online', 'BahÃ­a Blanca', '2020-08-13 22:11:37', '<div class=\"\" dir=\"auto\"><div class=\"ecm0bbzt hv4rvrfc ihqw7lf3 dati1w0a\" data-ad-comet-preview=\"message\" data-ad-preview=\"message\" id=\"jsc_c_32\"><div class=\"j83agx80 cbu4d94t ew0dbk1b irj2b8pg\"><div class=\"qzhwtbm6 knvmm38d\"><span class=\"oi732d6d ik7dh3pa d2edcug0 qv66sw1b c1et5uql a8c37x1j muag1w35 ew0dbk1b jq4qci2q a3bd9o3v knj5qynh oo9gr5id hzawbc8m\" dir=\"auto\"><div class=\"kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\"><div class=\"\" dir=\"auto\"><div class=\"ecm0bbzt hv4rvrfc ihqw7lf3 dati1w0a\" data-ad-comet-preview=\"message\" data-ad-preview=\"message\" id=\"jsc_c_6q\"><div class=\"j83agx80 cbu4d94t ew0dbk1b irj2b8pg\"><div class=\"qzhwtbm6 knvmm38d\"><span class=\"oi732d6d ik7dh3pa d2edcug0 qv66sw1b c1et5uql a8c37x1j muag1w35 ew0dbk1b jq4qci2q a3bd9o3v knj5qynh oo9gr5id hzawbc8m\" dir=\"auto\"><div class=\"kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\"><div dir=\"auto\" style=\"text-align: start;\">Se disputÃ³ un nuevo ABIERTO ONLINE y este es el top 5!!&nbsp; Los hermanos Ocaranza imparables en el podio!! A ver quiÃ©n les hace fuerza!!&nbsp; Felicitaciones a todos los jugadores que participaron!!</div><div dir=\"auto\" style=\"text-align: start;\">1Â° puesto: Emanuel Girolami</div><div dir=\"auto\" style=\"text-align: start;\">2Â° puesto: Pedro Ocaranza</div><div dir=\"auto\" style=\"text-align: start;\">3Â° puesto: Juan Bautista Ocaranza</div><div dir=\"auto\" style=\"text-align: start;\">4Â° puesto: AndrÃ©s LeÃ³n</div><div dir=\"auto\" style=\"text-align: start;\">5Â° puesto: Juan Ignacio Rossetti</div></div></span></div></div></div></div></div></span></div></div></div></div>', 'torneo_online.jpg'),
(29, 'Campeonato Online', 'BahÃ­a Blanca', '2020-08-13 22:22:43', 'El nuevo torneo a jugarse el proximo domingo, a no perderselo!!<br>', 'camp_online.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
