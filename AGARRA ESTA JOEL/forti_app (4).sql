-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 10, 2023 at 03:31 PM
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
-- Database: `forti_app`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`i92pry0nw321`@`localhost` PROCEDURE `insertar_usuario` (IN `matricula` BIGINT(20), IN `nombres` VARCHAR(100), IN `ap_pat` VARCHAR(100), IN `ap_mat` VARCHAR(100), IN `carrera` BIGINT(20), IN `telefono` BIGINT(20), IN `contraseÃ±a` VARCHAR(255), IN `curp` VARCHAR(100), IN `cuatrimestre` BIGINT(20))   BEGIN
INSERT INTO tbl_usuario (matricula, nombres, ap_pat, ap_mat, carrera, telefono, contraseÃ±a, curp, cuatrimestre) 
VALUES (matricula, nombres, ap_pat, ap_mat, carrera, telefono, contraseÃ±a, curp, cuatrimestre);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_carrera`
--

CREATE TABLE `tbl_carrera` (
  `ID_carrera` bigint(20) NOT NULL,
  `nombre` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_carrera`
--

INSERT INTO `tbl_carrera` (`ID_carrera`, `nombre`) VALUES
(1, 'TIADSM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categoria`
--

CREATE TABLE `tbl_categoria` (
  `ID_categoria` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_categoria`
--

INSERT INTO `tbl_categoria` (`ID_categoria`, `nombre`) VALUES
(1, 'Instrumentos'),
(2, 'Deportivos'),
(3, 'Cultural');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detalle`
--

CREATE TABLE `tbl_detalle` (
  `ID_detalle` int(11) NOT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_detalle`
--

INSERT INTO `tbl_detalle` (`ID_detalle`, `estado`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productos`
--

CREATE TABLE `tbl_productos` (
  `ID_producto` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `ID_cat` int(11) DEFAULT NULL,
  `cantidad` bigint(20) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_productos`
--

INSERT INTO `tbl_productos` (`ID_producto`, `nombre`, `img`, `ID_cat`, `cantidad`, `estado`) VALUES
(1, 'Guitarra', 'guitar.png', 1, 5, 1),
(2, 'Saxofón', 'saxofon.png', 1, 6, 2),
(3, 'Acordeón', 'acordeon.png', 1, 9, 3),
(4, 'Contrabajo', 'contrabajo.png', 1, 4, 4),
(5, 'Cajón', 'cajon.png', 1, 6, 5),
(6, 'Congas', 'conga.png', 1, 6, 6),
(7, 'Volleyball', 'volleyball.png', 2, 1, 7),
(8, 'Baskteball', 'baloncesto.png', 2, 10, 8),
(9, 'Futbol', 'balon-fut.png', 2, 6, 9),
(10, 'Ajedrez', 'ajedrez.png', 2, 8, 10),
(11, 'Casacas', 'casaca.png', 2, 10, 11),
(12, 'Vestuario', 'vestuario.png', 3, 1, 12),
(13, 'Zapatos', 'zapato.png', 3, 14, 13),
(14, 'Escolta', 'escolta.png', 3, 12, 14);

--
-- Triggers `tbl_productos`
--
DELIMITER $$
CREATE TRIGGER `cambiar_estado` AFTER UPDATE ON `tbl_productos` FOR EACH ROW BEGIN
  IF NEW.cantidad = 0 THEN
    UPDATE tbl_detalle SET estado = 0 WHERE ID_detalle = NEW.estado;
  END IF;
  IF NEW.cantidad > 0 THEN
    UPDATE tbl_detalle SET estado = 1 WHERE ID_detalle = NEW.estado;
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `matricula` bigint(20) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `ap_pat` varchar(100) DEFAULT NULL,
  `ap_mat` varchar(100) DEFAULT NULL,
  `carrera` bigint(20) DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `contraseÃ±a` varchar(255) DEFAULT NULL,
  `curp` varchar(100) NOT NULL,
  `cuatrimestre` bigint(20) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`matricula`, `nombres`, `ap_pat`, `ap_mat`, `carrera`, `telefono`, `contraseÃ±a`, `curp`, `cuatrimestre`, `token`) VALUES
(21005252, 'Roberto Joel', 'RodrÃ­guez', 'Contreras', 1, 8781386020, 'joel123', 'ROCR041008HCLDNBA7', 5, ''),
(21005265, 'Eliud Israel', 'Mancha', 'Mijares', 1, 8781230388, 'mancha123', 'MXME040603HCLNJLA9', 5, ''),
(21005320, 'Miguel Angel', 'Tienda', 'Jurado', 1, 8781093147, 'tienda123', 'TIJM040512HCLNRGA4', 5, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_carrera`
--
ALTER TABLE `tbl_carrera`
  ADD PRIMARY KEY (`ID_carrera`);

--
-- Indexes for table `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  ADD PRIMARY KEY (`ID_categoria`);

--
-- Indexes for table `tbl_detalle`
--
ALTER TABLE `tbl_detalle`
  ADD PRIMARY KEY (`ID_detalle`);

--
-- Indexes for table `tbl_productos`
--
ALTER TABLE `tbl_productos`
  ADD PRIMARY KEY (`ID_producto`),
  ADD KEY `ID_cat` (`ID_cat`),
  ADD KEY `estado` (`estado`);

--
-- Indexes for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `carrera` (`carrera`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_carrera`
--
ALTER TABLE `tbl_carrera`
  MODIFY `ID_carrera` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  MODIFY `ID_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_detalle`
--
ALTER TABLE `tbl_detalle`
  MODIFY `ID_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_productos`
--
ALTER TABLE `tbl_productos`
  MODIFY `ID_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_productos`
--
ALTER TABLE `tbl_productos`
  ADD CONSTRAINT `tbl_productos_ibfk_1` FOREIGN KEY (`ID_cat`) REFERENCES `tbl_categoria` (`ID_categoria`),
  ADD CONSTRAINT `tbl_productos_ibfk_2` FOREIGN KEY (`estado`) REFERENCES `tbl_detalle` (`ID_detalle`);

--
-- Constraints for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD CONSTRAINT `tbl_usuario_ibfk_1` FOREIGN KEY (`carrera`) REFERENCES `tbl_carrera` (`ID_carrera`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
