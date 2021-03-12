-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2021 at 07:43 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `education`
--

-- --------------------------------------------------------

--
-- Table structure for table `instituciones`
--

CREATE TABLE `instituciones` (
  `id` int(11) NOT NULL,
  `departamento` varchar(40) NOT NULL,
  `municipio` varchar(40) NOT NULL,
  `sede` varchar(60) NOT NULL,
  `dane_sede` varchar(20) NOT NULL,
  `institucion_educativa` varchar(80) NOT NULL,
  `dane_institucion` varchar(20) NOT NULL,
  `base_origen` varchar(60) NOT NULL,
  `latitud` float NOT NULL,
  `longitud` float NOT NULL,
  `estado` varchar(15) NOT NULL,
  `formacion` varchar(6) NOT NULL,
  `region` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instituciones`
--

INSERT INTO `instituciones` (`id`, `departamento`, `municipio`, `sede`, `dane_sede`, `institucion_educativa`, `dane_institucion`, `base_origen`, `latitud`, `longitud`, `estado`, `formacion`, `region`) VALUES
(1, 'HUILA', 'AGRADO', 'ALTO BUENAVISTA', '241013000091', 'IE EL CARMEN', '241013000074', 'BD COMCEL REGION A', 2.335, -75.7086, 'PENDIENTE', 'NO', 'A'),
(2, 'META', 'MESETAS', 'LA LIBERTAD', '250330000429', 'CE RIO GUEJAR\r\n', '250330000216', 'BD COMCEL REGION A', 3.315, -74.0183, 'PENDIENTE', 'NO', 'A'),
(3, 'META', 'GRANADA', 'JUAN XXIII', '250313000300', 'IE JOSE ANTONIO GALAN\r\n', '250313000164', 'BD COMCEL REGION A', 3.505, -73.7497, 'PENDIENTE', 'NO', 'A'),
(4, 'META', 'EL CASTILLO', 'LA CIMA', '250251000511', 'CE EL ENCANTO\r\n', '250251000740', 'BD COMCEL REGION A', 3.615, -73.9114, 'PENDIENTE', 'NO', 'A'),
(5, 'TOLIMA', 'ORTEGA', 'LOS NARANJOS', '273504001250', 'INSTITUCION EDUCATIVA ALTOZANO\r\n', '273504000920', 'BD COMCEL REGION A', 3.955, -75.2608, 'PENDIENTE\r\n', 'NO', 'A'),
(6, 'META', 'CUMARAL', 'ESCUELA LA VENTUROSA', '250226000069', 'IE SAN ISIDRO DE VERACRUZ\r\n', '250226000361', 'BD COMCEL REGION A', 4.235, -73.315, 'PENDIENTE', 'NO', 'A'),
(7, 'CALDAS', 'VILLAMARÍA', 'INSTITUCION EDUCATIVA PARTIDAS - SEDE PRINCIPAL', '217873000308', 'INSTITUCION EDUCATIVA PARTIDAS\r\n', '217873000308', 'BD COMCEL REGION A', 4.945, -75.5847, 'PENDIENTE', 'NO', 'A'),
(8, 'ANTIOQUIA', 'ARGELIA', 'C. E. R. EL ROSARIO', '205055000400', 'I. E. SANTA TERESA\r\n', '105055000022', 'BD COMCEL REGION A', 5.735, -75.0956, 'CONFIRMADO', 'NO', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instituciones`
--
ALTER TABLE `instituciones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `instituciones`
--
ALTER TABLE `instituciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
