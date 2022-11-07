-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-05-2022 a las 18:05:31
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `fabirustore`
--

/*CREATE DATABASE fabirustore;

USE fabirustore;*/

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE IF NOT EXISTS `orden` (
  `ID` int(2) NOT NULL AUTO_INCREMENT,
  `CargoA` int(2) NOT NULL,
  `Producto` int(2) NOT NULL,
  `NombreU` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `Producto` (`Producto`),
  KEY `CargoA` (`CargoA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`ID`, `CargoA`, `Producto`, `NombreU`) VALUES
(1, 1, 1, 'Angel'),
(2, 1, 2, 'Angel'),
(3, 3, 2, 'Eder'),
(4, 1, 2, 'Angel'),
(5, 1, 2, 'Angel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `ID` int(2) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(200) NOT NULL,
  `Precio` float NOT NULL,
  `Enfoque` varchar(100) NOT NULL,
  `Imagen` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID`, `Descripcion`, `Precio`, `Enfoque`, `Imagen`) VALUES
(1, 'Maquillajes', 30, 'Piel', 'labial.jpg'),
(2, 'Maquillaje', 30, 'Cara', '6.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID` int(2) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Usuario`, `Password`) VALUES
(1, 'Angel', 'Angel'),
(2, 'Administrador', 'Administrador'),
(3, 'UsuarioPrueba', 'UsuarioPrueba');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`CargoA`) REFERENCES `usuarios` (`ID`),
  ADD CONSTRAINT `orden_ibfk_2` FOREIGN KEY (`Producto`) REFERENCES `productos` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
