-- phpMyAdmin SQL Dump
-- version 3.4.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 07, 2011 at 02:08 AM
-- Server version: 5.1.56
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `femvxvxg_datos`
--

-- --------------------------------------------------------

--
-- Table structure for table `Agente`
--

CREATE TABLE IF NOT EXISTS `Agente` (
  `idAgente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `disponibilidad` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idAgente`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Agente`
--

INSERT INTO `Agente` (`idAgente`, `nombre`, `username`, `password`, `disponibilidad`) VALUES
(1, 'Luis Carlos Gonzalez Hernandez', 'carlos', 'carlos', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('df4bf1610f1e10b4780c4d863f999010', '187.137.235.253', 'Mozilla/5.0 (Ubuntu; X11; Linux x86_64; rv:8.0) Gecko/20100101 Firefox/8.0', 1323099783, 'a:1:{s:9:"id_agente";i:1;}'),
('b2406d49ee585624a6e74b1321d1bb97', '200.94.105.34', 'Mozilla/5.0 (Windows NT 5.1; rv:7.0.1) Gecko/20100101 Firefox/7.0.1', 1323102976, 'a:1:{s:9:"id_agente";s:6:"carlos";}'),
('7e2da0bfb639a9d036d889599b1c8f4f', '187.137.237.75', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.2 (KHTML, like Gecko) Chrome/15.0.874.121 Safari/535.2', 1323139544, 'a:1:{s:9:"id_agente";i:1;}'),
('ee1725130425378e1a64240a89e9c272', '187.137.235.253', 'Mozilla/5.0 (Ubuntu; X11; Linux x86_64; rv:8.0) Gecko/20100101 Firefox/8.0', 1323094424, ''),
('6858eda2f43dbddedc03ac82b718ed3e', '187.137.235.253', 'Mozilla/5.0 (Ubuntu; X11; Linux x86_64; rv:8.0) Gecko/20100101 Firefox/8.0', 1323099174, 'a:1:{s:9:"id_agente";i:1;}'),
('41f677e8badaed6a9eb34de32790486a', '201.152.191.169', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.2 (KHTML, like Gecko) Chrome/15.0.874.121 Safari/535.2', 1323095458, 'a:1:{s:9:"id_agente";i:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `Cliente`
--

CREATE TABLE IF NOT EXISTS `Cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidoMaterno` varchar(50) DEFAULT NULL,
  `apellidoPaterno` varchar(50) DEFAULT NULL,
  `calleYNumero` varchar(50) DEFAULT NULL,
  `colonia` varchar(50) DEFAULT NULL,
  `codigoPostal` varchar(10) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL,
  `numeroTelefonico` varchar(50) DEFAULT NULL,
  `fechaDeNacimiento` date DEFAULT NULL,
  `genero` varchar(1) DEFAULT NULL,
  `Lada_idLada` int(11) NOT NULL,
  `EstadoCivil_idEstado` int(11) NOT NULL,
  PRIMARY KEY (`idCliente`,`Lada_idLada`,`EstadoCivil_idEstado`),
  KEY `fk_Cliente_Lada1` (`Lada_idLada`),
  KEY `fk_Cliente_EstadoCivil1` (`EstadoCivil_idEstado`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Cliente`
--

INSERT INTO `Cliente` (`idCliente`, `nombre`, `apellidoMaterno`, `apellidoPaterno`, `calleYNumero`, `colonia`, `codigoPostal`, `estado`, `ciudad`, `municipio`, `numeroTelefonico`, `fechaDeNacimiento`, `genero`, `Lada_idLada`, `EstadoCivil_idEstado`) VALUES
(1, 'Bruce', 'Wayen', 'Lopez', 'Calle falsa 123', 'Avenida siempre viva', '1234', 'San Luis Potosi', 'San Luis Potosi', 'Ciudad Gotica', '123456', '1945-12-05', 'M', 4, 5),
(2, 'fdsfdsfsd', 'sdfdsfdsfdss', 'dfdsfdsfsdfsdfs', 'sdfdsfsdfdsf', 'sdfdsfdsfds', 'sdfdsfds', 'sdfdsfdsfsd', 'fdsfdsfdsfdsfdsf', 'dsfdsfdsfdsf', 'dsfdsfdsfdsf', '2011-12-06', 's', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `EstadoCivil`
--

CREATE TABLE IF NOT EXISTS `EstadoCivil` (
  `idEstado` int(11) NOT NULL AUTO_INCREMENT,
  `estadoCivil` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `EstadoCivil`
--

INSERT INTO `EstadoCivil` (`idEstado`, `estadoCivil`) VALUES
(1, 'Casado'),
(2, 'Divorciado'),
(3, 'Soltero'),
(4, 'Viudo'),
(5, 'En relacion estable'),
(6, 'separado');

-- --------------------------------------------------------

--
-- Table structure for table `EstadoPedido`
--

CREATE TABLE IF NOT EXISTS `EstadoPedido` (
  `idEstadoPedido` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEstadoPedido`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `EstadoPedido`
--

INSERT INTO `EstadoPedido` (`idEstadoPedido`, `estado`) VALUES
(1, 'Entregado'),
(2, 'incompleto');

-- --------------------------------------------------------

--
-- Table structure for table `Lada`
--

CREATE TABLE IF NOT EXISTS `Lada` (
  `idLada` int(11) NOT NULL AUTO_INCREMENT,
  `lada` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`idLada`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `Lada`
--

INSERT INTO `Lada` (`idLada`, `lada`) VALUES
(1, '444'),
(2, '777'),
(3, '888'),
(4, '999'),
(5, '111'),
(6, '222');

-- --------------------------------------------------------

--
-- Table structure for table `Llamada`
--

CREATE TABLE IF NOT EXISTS `Llamada` (
  `idLlamada` int(11) NOT NULL AUTO_INCREMENT,
  `horaInicio` timestamp NULL DEFAULT NULL,
  `horaFinal` timestamp NULL DEFAULT NULL,
  `Agente_idAgente` int(11) NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL,
  PRIMARY KEY (`idLlamada`,`Agente_idAgente`,`Cliente_idCliente`),
  KEY `fk_Llamada_Agente1` (`Agente_idAgente`),
  KEY `fk_Llamada_Cliente1` (`Cliente_idCliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Llamada`
--

INSERT INTO `Llamada` (`idLlamada`, `horaInicio`, `horaFinal`, `Agente_idAgente`, `Cliente_idCliente`) VALUES
(1, '2011-12-05 16:33:37', '0000-00-00 00:00:00', 1, 1),
(2, '2011-12-05 16:35:32', '0000-00-00 00:00:00', 1, 1),
(3, '2011-12-05 14:46:04', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Pedido`
--

CREATE TABLE IF NOT EXISTS `Pedido` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `subtotal` float DEFAULT NULL,
  `iva` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `Cliente_idCliente` int(11) NOT NULL,
  `Agente_idAgente` int(11) NOT NULL,
  `EstadoPedido_idEstadoPedido` int(11) NOT NULL,
  `RazonCancelacion_idRazonCancelacion` int(11) NOT NULL,
  PRIMARY KEY (`idPedido`,`Cliente_idCliente`,`Agente_idAgente`,`EstadoPedido_idEstadoPedido`,`RazonCancelacion_idRazonCancelacion`),
  KEY `fk_Pedido_Cliente1` (`Cliente_idCliente`),
  KEY `fk_Pedido_Agente1` (`Agente_idAgente`),
  KEY `fk_Pedido_EstadoPedido1` (`EstadoPedido_idEstadoPedido`),
  KEY `fk_Pedido_RazonCancelacion1` (`RazonCancelacion_idRazonCancelacion`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Pedido`
--

INSERT INTO `Pedido` (`idPedido`, `subtotal`, `iva`, `total`, `Cliente_idCliente`, `Agente_idAgente`, `EstadoPedido_idEstadoPedido`, `RazonCancelacion_idRazonCancelacion`) VALUES
(1, 43, 6.45, 49.45, 1, 1, 2, 1),
(2, 0, 0, 0, 1, 1, 2, 1),
(3, 214, 32.1, 246.1, 1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Pedido_has_Producto`
--

CREATE TABLE IF NOT EXISTS `Pedido_has_Producto` (
  `Pedido_idPedido` int(11) NOT NULL,
  `Producto_idProducto` int(11) NOT NULL,
  PRIMARY KEY (`Pedido_idPedido`,`Producto_idProducto`),
  KEY `fk_Pedido_has_Producto_Producto1` (`Producto_idProducto`),
  KEY `fk_Pedido_has_Producto_Pedido1` (`Pedido_idPedido`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Pedido_has_Producto`
--

INSERT INTO `Pedido_has_Producto` (`Pedido_idPedido`, `Producto_idProducto`) VALUES
(1, 4),
(1, 5),
(1, 7),
(3, 1),
(3, 2),
(3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `Producto`
--

CREATE TABLE IF NOT EXISTS `Producto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `claveInterna` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` tinytext,
  `precio` float DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Producto`
--

INSERT INTO `Producto` (`idProducto`, `claveInterna`, `nombre`, `descripcion`, `precio`, `foto`) VALUES
(1, '001-2011', 'Fuente de Poder SP650', 'Descripcion del producto, solo cierto cantidad de', 99.9999, 'imagen_template.jpg'),
(2, '002-2011', 'Mouse Cars Bluetooth', 'Descripcion del producto, solo cierto cantidad de', 99.9999, 'imagen_template.jpg'),
(3, '003-2011', 'Producto prueba 1', 'Descripcion del producto, solo cierto cantidad de', 12, 'imagen_template.jpg'),
(4, '003-2011', 'Producto prueba 2', 'Descripcion del producto, solo cierto cantidad de', 13, 'imagen_template.jpg'),
(5, '004-2011', 'Producto prueba 3', 'Descripcion del producto, solo cierto cantidad de', 14, 'imagen_template.jpg'),
(6, '005-2011', 'Producto prueba 4', 'Descripcion del producto, solo cierto cantidad de', 15, 'imagen_template.jpg'),
(7, '006-2011', 'Producto prueba 5', 'Descripcion del producto, solo cierto cantidad de', 16, 'imagen_template.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `RazonCancelacion`
--

CREATE TABLE IF NOT EXISTS `RazonCancelacion` (
  `idRazonCancelacion` int(11) NOT NULL AUTO_INCREMENT,
  `razon` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idRazonCancelacion`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `RazonCancelacion`
--

INSERT INTO `RazonCancelacion` (`idRazonCancelacion`, `razon`) VALUES
(1, 'Ninguna');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
