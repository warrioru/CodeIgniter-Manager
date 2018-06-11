-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 14, 2016 at 03:50 AM
-- Server version: 5.7.12
-- PHP Version: 5.5.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `divinowi_wine`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesorios`
--

CREATE TABLE `accesorios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `imagenAcc` text,
  `precio` float DEFAULT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accesorios`
--

INSERT INTO `accesorios` (`id`, `nombre`, `imagenAcc`, `precio`, `descripcion`) VALUES
(5, 'Estuche Iphone', 'http://localhost/AppVinos/uploads/accesorios/copa.jpg', 17.8, 'Estuche chevere');

-- --------------------------------------------------------

--
-- Table structure for table `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `imagenLibro` text,
  `titulo` varchar(50) DEFAULT NULL,
  `autor` varchar(50) DEFAULT NULL,
  `anio` varchar(50) DEFAULT NULL,
  `editor` varchar(50) DEFAULT NULL,
  `isbn` varchar(50) DEFAULT NULL,
  `idioma` varchar(50) DEFAULT NULL,
  `precio` varchar(50) DEFAULT NULL,
  `numPaginas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `libros`
--

INSERT INTO `libros` (`id`, `imagenLibro`, `titulo`, `autor`, `anio`, `editor`, `isbn`, `idioma`, `precio`, `numPaginas`) VALUES
(24, 'http://localhost/AppVinos/uploads/libros/cocteles.jpg', 'Cocteles', 'Cocteles INC', '2013', 'Alguien', '020349', 'Espanol', '21.50', '35');

-- --------------------------------------------------------

--
-- Table structure for table `publicidad`
--

CREATE TABLE `publicidad` (
  `id` int(11) NOT NULL,
  `nombre` text,
  `imagenPublicidad` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publicidad`
--

INSERT INTO `publicidad` (`id`, `nombre`, `imagenPublicidad`) VALUES
(2, 'nova', 'http://localhost/AppVinos/uploads/publicidad/Tinto-frente1.jpg');

-- --------------------------------------------------------
--
-- Table structure for table `vinos`
--

CREATE TABLE `vinos` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `bodega` text,
  `tipo` varchar(45) DEFAULT NULL,
  `tipoVarios` varchar(50) NOT NULL,
  `cepa` text,
  `anio` int(11) DEFAULT NULL,
  `pais` varchar(40) DEFAULT NULL,
  `imagen` text,
  `color` text,
  `nariz` text,
  `boca` text,
  `maridaje` text,
  `precio` float DEFAULT NULL,
  `descripcion` text,
  `esPremium` BOOLEAN NULL DEFAULT FALSE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vinos`
--

INSERT INTO `vinos` (`id`, `nombre`, `bodega`, `tipo`, `tipoVarios`, `cepa`, `anio`, `pais`, `imagen`, `color`, `nariz`, `boca`, `maridaje`, `precio`, `descripcion`) VALUES
(3, 'Vino Rosado', '', 'Vino Rosado', '', 'Pinot Noir,Pinot Gris', 2012, 'Argentina', 'http://localhost/AppVinos/uploads/vinos/Tinto-frente.jpg', 'bueno', 'chevere', 'ca', 'Sushi', 17.5, 'Buen vino'),
(4, 'Vino Arabe', 'bodega arbve', 'Vino Blanco', '', 'Sauvignon Blanc', 2002, 'Marruecos', 'http://divinowines.com.ec/contenido/uploads/vinos/vinoRosado.png', 'ro', 'e', 'l', 'jk', 2.4, 'll');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesorios`
--
ALTER TABLE `accesorios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publicidad`
--
ALTER TABLE `publicidad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vinos`
--
ALTER TABLE `vinos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesorios`
--
ALTER TABLE `accesorios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `publicidad`
--
ALTER TABLE `publicidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vinos`
--
ALTER TABLE `vinos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
