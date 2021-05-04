-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2015 a las 17:12:15
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `libros`
--
CREATE DATABASE IF NOT EXISTS `libros` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `libros`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `idcliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `ciudad` varchar(25) NOT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idcliente`, `nombre`, `apellido`, `direccion`, `ciudad`) VALUES
(2, 'Hugo Adiel', 'Guerrero Peraza', 'Colonia La Cima 2', 'San Salvador'),
(3, 'Alvaro Alcides', 'Guandique', 'Colonia Chaparrastique', 'San Miguel'),
(4, 'Edgard Oswaldo', 'Rodas Grande', 'Colonia La Gloria', 'San Salvador'),
(5, 'Mauricio Otmar', 'Vásquez', 'San Jacinto', 'San Salvador'),
(7, 'Rigoberto Antonio', 'Leiva González', 'Urbanización Las Ceibas', 'San Salvador'),
(8, 'Carlos Mauricio', 'Bolaños Guerrero', 'Col. Santa Marta', 'San Salvador'),
(9, 'Ana Silvia', 'Durán Hernández', 'Col. Ciudad Victoria', 'San Jacinto'),
(10, 'Evelyn Lissette', 'Hernández Rivera', 'Col. Bosques del Río', 'Soyapango'),
(11, 'Delmy Jeannette', 'Fuentes', 'Col. Los Santos', 'Soyapango'),
(12, 'Julio Adalberto', 'Rivera', 'Col. Santa Marta', 'San Salvador'),
(13, 'Ricardo Ernesto', 'Elías Guandique', 'Reparto Morazán', 'Soyapango'),
(14, 'Salvador Ernesto', 'Cabrera Rodríguez', 'Col. Las Colinas', 'Santa Tecla'),
(15, 'Yesenia Xiomara', 'Martínez Oviedo', 'Residencial Los Conacastes', 'Soyapango'),
(16, 'Edgardo Alberto', 'Romero Masis', 'Col. Vista al Lago Pje. 3', 'Ilopango'),
(17, 'Blanca Iris', 'Cañas Abarca', '21ª calle poniente', 'San Salvador'),
(18, 'Claudia Verónica', 'Portillo Abrego', 'Col. San José', 'Soyapango'),
(19, 'Maura Verónica', 'Arévalo Mulato', 'Col. Las Magnolias', 'San Salvador'),
(20, 'Silvia Marina', 'Cisneros Murcia', 'Col. Vista Hermosa', 'San Salvador'),
(21, 'José Alexander', 'Aguirre Peña', 'Colonia La Pirámide', 'Ciudad Delgado'),
(22, 'Gloria Amar', 'Montoya', 'Colonia Jardines de Guadalupe', 'Nueva San Salvador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE IF NOT EXISTS `detallepedido` (
  `idorden` int(10) unsigned NOT NULL,
  `isbn` char(18) NOT NULL,
  `cantidad` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`idorden`,`isbn`),
  KEY `isbn` (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detallepedido`
--

INSERT INTO `detallepedido` (`idorden`, `isbn`, `cantidad`) VALUES
(5, '978-84-205-3392-6', 2),
(5, '978-84-415-1569-7', 2),
(6, '978-84-205-3392-6', 2),
(6, '978-84-415-2121-6', 5),
(8, '978-84-481-3268-2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE IF NOT EXISTS `libros` (
  `isbn` char(18) NOT NULL,
  `autor` char(60) DEFAULT NULL,
  `titulo` char(76) DEFAULT NULL,
  `precio` float(4,2) DEFAULT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`isbn`, `autor`, `titulo`, `precio`) VALUES
('978-607-7686-15-6', 'Ralph G. Schulz', 'Diseño web con CSS', 24.80),
('978-84-111-9999-0', 'Fernando M. Guardado', 'Creación de páginas web con DHTML', 31.35),
('978-84-205-3392-6', 'Paul McFedries', 'JavaScript Edición especial', 64.35),
('978-84-205-3477-0', 'Joseph Mayo', 'C# Al descubierto', 45.20),
('978-84-205-3618-2', 'Paul DuBois', 'Programación con MySQL', 99.99),
('978-84-413-1357-5', 'Ricardo Elías', 'El gran manual de programación web con PHP', 38.40),
('978-84-415-1569-7', 'Luke Welling', 'Desarrollo web con PHP y MySQL', 61.50),
('978-84-415-1845-2', 'John Coggeshall', 'La Biblia de PHP 5', 93.05),
('978-84-415-2121-6', 'James Foxall', 'El libro de Visual C# 2005', 50.25),
('978-84-415-2137-7', 'Andy Budd', 'CSS Manual avanzado', 52.45),
('978-84-415-2200-8', 'Lee Babin', 'Introducción a AJAX con PHP', 36.70),
('978-84-415-2217-6', 'Jason Cranford Teague', 'Programación CSS, DHTML y AJAX', 72.50),
('978-84-415-2311-1', 'Ellie Quigley', 'PHP y MySQL Práctico para programadores y diseñadores web', 52.30),
('978-84-415-2388-3', 'Danny Goodman', 'JavaScript, HTML5 y CSS', 68.20),
('978-84-415-2389-0', 'Michele E. Davis', 'PHP y MySQL', 37.60),
('978-84-415-2507-8', 'Baron Schawartz', 'MySQL Avanzado', 94.32),
('978-84-415-2514-6', 'Phil Ballard', 'Ajax, JavaScript y PHP', 49.25),
('978-84-415-2578-8', 'Rod Stephens', 'Fundamentos de diseño de bases de datos', 48.90),
('978-84-415-2595-3', 'Abraham Gutiérrez', 'PHP 5 a través de ejemplos', 35.15),
('978-84-415-2618-1', 'Luis Miguel Cabezas Granado', 'PHP 6 Manual Imprescindible', 62.31),
('978-84-415-2689-1', 'Matt Doyle', 'Fundamentos PHP práctico', 65.00),
('978-84-415-2958-8', 'W. Frank Ableson', 'Android Guía para Desarrolladores', 74.95),
('978-84-415-2961-8', 'Jeff Friesen', 'Java para Desarrollo Android', 90.60),
('978-84-415-3188-8', 'Richard Rodger', 'Desarrollo de Aplicaciones en la Nube para Dispositivos Móviles', 76.84),
('978-84-415-3397-4', 'John Resig', 'JavaScript Ninja', 59.79),
('978-84-481-3172-2', 'Thomas Powell', 'HTML 4 Manual de referencia', 75.45),
('978-84-481-3173-9', 'Herbert Schildt', 'Java 2 Manual de referencia', 73.40),
('978-84-481-3268-2', 'Thomas Powell', 'JavaScript Manual de referencia', 72.75),
('978-84-481-3931-5', 'P. S. Woods', 'Programación de Macromedia Flash MX', 45.25),
('978-84-481-9814-5', 'F. Javier Gil Rubio', 'Creación de sitios web con PHP 5', 36.90),
('978-84-832-2372-7', 'Tom Negrino', 'JavaScript & AJAX para diseño web', 27.50),
('978-84-832-2414-4', 'José Rafael García', 'JAVA SE6 & Swing', 26.95),
('978-97-015-1328-6', 'Maximilian Firtman', 'AJAX Web 2.0 para desarrolladores', 41.25),
('978-97-017-0343-4', 'Menachen Bazian', 'Visual FoxPro 6', 31.40),
('978-98-716-0929-1', 'Christian Cibelli', 'PHP Programación Web Avanzada para Profesionales', 42.60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE IF NOT EXISTS `ordenes` (
  `idorden` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcliente` int(10) unsigned NOT NULL,
  `costo` float(6,2) DEFAULT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idorden`),
  KEY `idcliente` (`idcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`idorden`, `idcliente`, `costo`, `fecha`) VALUES
(1, 9, 72.50, '2007-12-16'),
(2, 4, 61.50, '2007-11-14'),
(3, 8, 31.30, '2007-10-07'),
(4, 12, 35.85, '2008-01-04'),
(5, 7, 22.50, '2008-04-11'),
(6, 2, 61.30, '2007-10-18'),
(7, 16, 75.45, '2007-10-16'),
(8, 14, 72.75, '2008-01-20'),
(9, 2, 75.45, '2008-01-14'),
(10, 5, 72.50, '2008-01-09'),
(11, 9, 45.20, '2007-11-28'),
(12, 9, 61.50, '2008-01-25'),
(13, 3, 72.75, '2007-12-27'),
(14, 10, 73.40, '2008-01-22'),
(15, 17, 29.75, '2007-10-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resumenlibro`
--

CREATE TABLE IF NOT EXISTS `resumenlibro` (
  `isbn` char(18) NOT NULL,
  `resumen` text,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `detallepedido_ibfk_3` FOREIGN KEY (`idorden`) REFERENCES `ordenes` (`idorden`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detallepedido_ibfk_4` FOREIGN KEY (`isbn`) REFERENCES `libros` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD CONSTRAINT `ordenes_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idcliente`) ON DELETE CASCADE;

--
-- Filtros para la tabla `resumenlibro`
--
ALTER TABLE `resumenlibro`
  ADD CONSTRAINT `resumenlibro_ibfk_1` FOREIGN KEY (`isbn`) REFERENCES `libros` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
