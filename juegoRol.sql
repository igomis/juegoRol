-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-10-2016 a las 13:34:09
-- Versión del servidor: 5.5.52-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `juegoRol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Armaduras`
--

CREATE TABLE IF NOT EXISTS `Armaduras` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `Armaduras`
--

INSERT INTO `Armaduras` (`id`, `nom`) VALUES
(1, 'ArmaduraBasica'),
(2, 'ArmaduradeBronze'),
(3, 'ArmaduradePlata'),
(4, 'ArmaduraMagica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Armas`
--

CREATE TABLE IF NOT EXISTS `Armas` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `Armas`
--

INSERT INTO `Armas` (`id`, `nom`) VALUES
(1, 'Arco'),
(2, 'ArcoLargo'),
(3, 'EspadaCorta'),
(4, 'EspadaLarga'),
(5, 'Ballesta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Unidades`
--

CREATE TABLE IF NOT EXISTS `Unidades` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `puntosDanyo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `Unidades`
--

INSERT INTO `Unidades` (`id`, `nom`, `puntosDanyo`) VALUES
(1, 'Soldado', 30),
(2, 'Arquero', 20);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
