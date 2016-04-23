-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2016 a las 00:37:11
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `peliculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE IF NOT EXISTS `pelicula` (
`id_pelicula` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ponderacion` int(11) NOT NULL,
  `identificador` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id_pelicula`, `nombre`, `ponderacion`, `identificador`, `url`) VALUES
(1, 'Batman', 5, 'tt0096895', 'http://www.imdb.com/title/tt0096895'),
(2, 'La caza al Octubre Rojo', 5, 'tt0099810', 'http://www.imdb.com/title/tt0099810'),
(3, 'GoldenEye', 5, 'tt0113189', 'http://www.imdb.com/title/tt0113189'),
(4, 'American Pie', 2, 'tt0163651', 'http://www.imdb.com/title/tt0163651'),
(5, 'El silencio de los inocentes', 5, 'tt0102926', 'http://www.imdb.com/title/tt0102926'),
(6, 'Das Boot', 5, 'tt0082096', 'http://www.imdb.com/title/tt0082096'),
(7, 'Gladiador', 5, 'tt0172495', 'http://www.imdb.com/title/tt0172495'),
(8, 'Le prenom', 5, 'tt2179121', 'http://www.imdb.com/title/tt2179121'),
(9, 'Los indestructibles', 2, 'tt1320253', 'http://www.imdb.com/title/tt1320253'),
(10, 'Scream', 3, 'tt0117571', 'http://www.imdb.com/title/tt0117571'),
(11, 'Zoolander', 5, 'tt0196229', 'http://www.imdb.com/title/tt0196229');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
 ADD PRIMARY KEY (`id_pelicula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
MODIFY `id_pelicula` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
