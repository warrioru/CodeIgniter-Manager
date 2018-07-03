-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 04, 2018 at 01:01 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role_fk` (`id_role_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuario_fk_1` FOREIGN KEY (`id_role_fk`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
