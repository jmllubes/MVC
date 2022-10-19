-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2022 a las 13:00:48
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuari`
--

CREATE TABLE `usuari` (
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `data_naixement` date DEFAULT NULL,
  `rol` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuari`
--

INSERT INTO `usuari` (`username`, `password`, `email`, `foto`, `data_naixement`, `rol`) VALUES
('a', '81dc9bdb52d04dc20036dbd8313ed055', 'a@a', 'default.jpg', NULL, 0),
('bbb', '202cb962ac59075b964b07152d234b70', 'b@b', 'default.jpg', NULL, 0),
('ccc', '202cb962ac59075b964b07152d234b70', 'c@c', 'default.jpg', NULL, 0),
('ddd', '81dc9bdb52d04dc20036dbd8313ed055', 'd@d', 'default.jpg', NULL, 0),
('eee', '81dc9bdb52d04dc20036dbd8313ed055', 'e@e', 'default.jpg', NULL, 0),
('jmllubes', '81dc9bdb52d04dc20036dbd8313ed055', 'jmllubes@gmail.com', 'default.jpg', NULL, 0),
('jmllubes', '827ccb0eea8a706c4c34a16891f84e7b', 'jmllubes@lasalle.cat', '1666176590381hola.png', '2022-11-04', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuari`
--
ALTER TABLE `usuari`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
