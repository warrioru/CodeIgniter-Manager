-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 04, 2018 at 01:02 AM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

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
-- Table structure for table `entregas`
--

CREATE TABLE `entregas` (
  `id` int(11) NOT NULL,
  `nombreCliente` varchar(35) NOT NULL,
  `numFactura` varchar(35) NOT NULL,
  `fechaEntrega` datetime DEFAULT NULL,
  `direccion` varchar(40) NOT NULL,
  `observaciones` text NOT NULL,
  `estado` int(11) NOT NULL,
  `id_encargado_fk` int(11) NOT NULL,
  `id_vendedor_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entregas`
--

INSERT INTO `entregas` (`id`, `nombreCliente`, `numFactura`, `fechaEntrega`, `direccion`, `observaciones`, `estado`, `id_encargado_fk`, `id_vendedor_fk`) VALUES
(1, 'Cliente 1', '258668', NULL, '', '', 0, 1, 1),
(3, 'Cliente 2', '259984', NULL, '', '', 1, 3, 1),
(4, 'Cliente 3', '154897', NULL, '', '', 2, 1, 1),
(5, 'Cliente 4', '28857', NULL, '', '', 1, 3, 1);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `role_name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `is_active`, `role_name`) VALUES
(1, 1, 'admin'),
(2, 1, 'vendedor'),
(3, 1, 'transportista');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `first_name` varchar(35) NOT NULL,
  `last_name` varchar(35) NOT NULL,
  `password` varchar(60) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `id_role_fk` int(11) NOT NULL,
  `urlFoto` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `first_name`, `last_name`, `password`, `is_active`, `id_role_fk`, `urlFoto`) VALUES
(1, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1, ''),
(3, 'info@divinowines.com.ec', 'Info', 'Info', '596f99b1603783be3eb20c0ee922a888', 1, 2, ''),
(4, 'hola@hola.com', 'Hoal', 'Hola', '81dc9bdb52d04dc20036dbd8313ed055', 1, 3, NULL),
(5, 'email@f.com', 'Transety', 'Transporte', '81dc9bdb52d04dc20036dbd8313ed055', 1, 3, NULL);

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
  `esPremium` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vinos`
--

INSERT INTO `vinos` (`id`, `nombre`, `bodega`, `tipo`, `tipoVarios`, `cepa`, `anio`, `pais`, `imagen`, `color`, `nariz`, `boca`, `maridaje`, `precio`, `descripcion`, `esPremium`) VALUES
(3, 'Vino Rosado', '', 'Vino Rosado', '', 'Pinot Noir,Pinot Gris', 2012, 'Argentina', 'http://localhost/AppVinos/uploads/vinos/Tinto-frente.jpg', 'bueno', 'chevere', 'ca', 'Sushi', 17.5, 'Buen vino', 0),
(4, 'Vino Arabe', 'bodega arbve', 'Vino Blanco', '', 'Sauvignon Blanc', 2002, 'Marruecos', 'http://divinowines.com.ec/contenido/uploads/vinos/vinoRosado.png', 'ro', 'e', 'l', 'jk', 2.4, 'll', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesorios`
--
ALTER TABLE `accesorios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entregas`
--
ALTER TABLE `entregas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_encargado_fk` (`id_encargado_fk`),
  ADD KEY `id_vendedor_fk` (`id_vendedor_fk`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role_fk` (`id_role_fk`);

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
-- AUTO_INCREMENT for table `entregas`
--
ALTER TABLE `entregas`
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
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `vinos`
--
ALTER TABLE `vinos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `entregas`
--
ALTER TABLE `entregas`
  ADD CONSTRAINT `pedido_fk_1` FOREIGN KEY (`id_encargado_fk`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `pedido_fk_2` FOREIGN KEY (`id_vendedor_fk`) REFERENCES `usuarios` (`id`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuario_fk_1` FOREIGN KEY (`id_role_fk`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
