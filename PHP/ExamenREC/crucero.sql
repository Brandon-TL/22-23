-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-03-2022 a las 00:52:14
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crucero`
--
CREATE DATABASE IF NOT EXISTS `crucero` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `crucero`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camarote`
--

CREATE TABLE IF NOT EXISTS `camarote` (
  `nNumCamarote` int(4) NOT NULL,
  `cTipoCamarote` enum('individual','doble','familiar','suite') NOT NULL,
  `cUbicacion` enum('interior','exterior') NOT NULL,
  `nPlanta` int(2) NOT NULL,
  PRIMARY KEY (`nNumCamarote`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `cNombreApellidos` varchar(100) NOT NULL,
  `dNacimiento` date NOT NULL,
  `cDNI` varchar(9) NOT NULL,
  `cPassword` varchar(50) NOT NULL,
  `cTipoCliente` enum('familia','single','couple','business','vip') NOT NULL,
  PRIMARY KEY (`cDNI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `cCliente` varchar(9) NOT NULL,
  `nNumPersonas` int(2) NOT NULL,
  `dInicioEmbarque` date NOT NULL,
  `dFinEmbarque` date NOT NULL,
  `nNumCamarote` int(4) NOT NULL,
  KEY `cCliente` (`cCliente`),
  KEY `nNumCamarote` (`nNumCamarote`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `cCliente` FOREIGN KEY (`cCliente`) REFERENCES `cliente` (`cDNI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nNumCamarote` FOREIGN KEY (`nNumCamarote`) REFERENCES `camarote` (`nNumCamarote`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;