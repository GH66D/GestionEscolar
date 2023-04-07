-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2023 at 04:09 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registro_alumnos2023`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `alumno`
--

CREATE TABLE `alumno` (
  `boleta` varchar(20) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `ap_paterno` varchar(30) NOT NULL,
  `ap_materno` varchar(30) NOT NULL,
  `f_nacimiento` varchar(20) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `discapacidad` varchar(30) DEFAULT NULL,
  `curp` varchar(30) NOT NULL,
  `calle_num` varchar(30) NOT NULL,
  `colonia` varchar(30) NOT NULL,
  `alcaldia` varchar(30) NOT NULL,
  `codigo_post` varchar(30) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `escuela_proc` varchar(50) DEFAULT NULL,
  `entidad` varchar(30) NOT NULL,
  `nombre_escuela` varchar(40) NOT NULL,
  `promedio` varchar(20) NOT NULL,
  `escom_opcion` varchar(20) NOT NULL,
  `id_examen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumno`
--

INSERT INTO `alumno` (`boleta`, `nombre`, `ap_paterno`, `ap_materno`, `f_nacimiento`, `genero`, `discapacidad`, `curp`, `calle_num`, `colonia`, `alcaldia`, `codigo_post`, `telefono`, `correo`, `escuela_proc`, `entidad`, `nombre_escuela`, `promedio`, `escom_opcion`, `id_examen`) VALUES
('1111111111', 'Héctor Enrique', 'Carrillo', 'Estrada', '2023-01-16', '', '', 'CAEH000129HDFRSCA4', 'ADFS', 'ADFS', 'Alvaro Obregón', '03630', '5568058775', 'he.carrillo.e@gmail.com', 'CECyT No. 1 Gonzalo Vázquez Vela', 'Ciudad de México', '', '1', '1ra opcion', 'e9'),
('2021630087', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'e9'),
('45545454545', 'gfhgfh', 'ghghgh', 'ghghghg', '23/435/45', 'Mujer', '', 'fhfghgfjfghjhgjhgjhkkk', 'fgdhfg 4', 'pogg', 'Azcapotzalco', '4444', 'fd4545454545', 'hernandezs4545is.popo@gmail.co', 'CET 1 Walter Cross Buchanan', 'Aguascalientes', '', '4', '2da opcion', 'e5'),
('PE12341234', 'ASDF', 'ASDF', 'ASDF', '2023-01-03', 'Hombre', '', 'CAEH000129HDFRSCA4', 'ASDF 4', 'ASDF', 'Coyoacán', '03630', '5568058775', 'he.carrillo.e@gmail.com', 'CECyT No. 10 Carlos Vallejo Márquez', 'Aguascalientes', '', '1', '1ra opcion', 'e2');

-- --------------------------------------------------------

--
-- Table structure for table `control_examen`
--

CREATE TABLE `control_examen` (
  `id_examen` varchar(20) NOT NULL,
  `disponibilidad` varchar(20) NOT NULL,
  `asignados` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `control_examen`
--

INSERT INTO `control_examen` (`id_examen`, `disponibilidad`, `asignados`) VALUES
('e1', '22', '3'),
('e2', '24', '1'),
('e3', '25', '0'),
('e4', '24', '1'),
('e5', '24', '1'),
('e6', '25', '0'),
('e7', '25', '0'),
('e8', '25', '0'),
('e9', '23', '2'),
('e10', '25', '0'),
('e11', '25', '0'),
('e12', '23', '2');

-- --------------------------------------------------------

--
-- Table structure for table `examen`
--

CREATE TABLE `examen` (
  `id_examen` varchar(20) NOT NULL,
  `id_salon` varchar(20) NOT NULL,
  `id_horario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `examen`
--

INSERT INTO `examen` (`id_examen`, `id_salon`, `id_horario`) VALUES
('e1', 'lab1', 'h0'),
('e7', 'lab1', 'h1'),
('e2', 'lab2', 'h0'),
('e8', 'lab2', 'h1'),
('e3', 'lab3', 'h0'),
('e9', 'lab3', 'h2'),
('e4', 'lab4', 'h0'),
('e10', 'lab4', 'h2'),
('e5', 'lab5', 'h1'),
('e11', 'lab5', 'h2'),
('e6', 'lab6', 'h1'),
('e12', 'lab6', 'h2');

-- --------------------------------------------------------

--
-- Table structure for table `horarios`
--

CREATE TABLE `horarios` (
  `id_horario` varchar(20) NOT NULL,
  `hora_inicio` varchar(20) NOT NULL,
  `hora_fin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `horarios`
--

INSERT INTO `horarios` (`id_horario`, `hora_inicio`, `hora_fin`) VALUES
('h0', '07:00', '08:30'),
('h1', '09:00', '10:30'),
('h2', '11:00', '12:30');

-- --------------------------------------------------------

--
-- Table structure for table `salones`
--

CREATE TABLE `salones` (
  `id_salon` varchar(20) NOT NULL,
  `salon` varchar(20) NOT NULL,
  `capacidad` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salones`
--

INSERT INTO `salones` (`id_salon`, `salon`, `capacidad`) VALUES
('lab1', 'laboratorio_1', '25'),
('lab2', 'laboratorio_2', '25'),
('lab3', 'laboratorio_3', '25'),
('lab4', 'laboratorio_4', '25'),
('lab5', 'laboratorio_5', '25'),
('lab6', 'laboratorio_6', '25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`boleta`),
  ADD KEY `id_examen` (`id_examen`);

--
-- Indexes for table `control_examen`
--
ALTER TABLE `control_examen`
  ADD KEY `id_examen` (`id_examen`);

--
-- Indexes for table `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`id_examen`),
  ADD KEY `id_salon` (`id_salon`,`id_horario`),
  ADD KEY `id_horario` (`id_horario`);

--
-- Indexes for table `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indexes for table `salones`
--
ALTER TABLE `salones`
  ADD PRIMARY KEY (`id_salon`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`id_examen`) REFERENCES `examen` (`id_examen`) ON UPDATE CASCADE;

--
-- Constraints for table `control_examen`
--
ALTER TABLE `control_examen`
  ADD CONSTRAINT `control_examen_ibfk_1` FOREIGN KEY (`id_examen`) REFERENCES `examen` (`id_examen`) ON UPDATE CASCADE;

--
-- Constraints for table `examen`
--
ALTER TABLE `examen`
  ADD CONSTRAINT `examen_ibfk_1` FOREIGN KEY (`id_salon`) REFERENCES `salones` (`id_salon`) ON UPDATE CASCADE,
  ADD CONSTRAINT `examen_ibfk_2` FOREIGN KEY (`id_horario`) REFERENCES `horarios` (`id_horario`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
