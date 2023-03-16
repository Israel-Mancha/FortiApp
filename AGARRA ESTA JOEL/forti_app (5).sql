-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 16, 2023 at 06:01 PM
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
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `idAdmin` bigint(20) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidoP` varchar(255) NOT NULL,
  `apellidoM` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`idAdmin`, `nombres`, `apellidoP`, `apellidoM`) VALUES
(1, 'Fortino', 'Martínez', 'Catarina');

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
  `id_producto` int(20) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_detalle`
--

INSERT INTO `tbl_detalle` (`ID_detalle`, `id_producto`, `id_usuario`, `fecha_reserva`, `activo`) VALUES
(26, 1, 21005265, '2023-03-15', 1),
(27, 5, 21005265, '2023-03-15', 1),
(28, 8, 21005265, '2023-03-15', 1),
(29, 8, 21005265, '2023-03-15', 1),
(30, 8, 21005265, '2023-03-15', 1),
(31, 8, 21005265, '2023-03-15', 1),
(32, 8, 21005265, '2023-03-16', 1),
(33, 1, 21005265, '2023-03-16', 1),
(34, 2, 21005265, '2023-03-16', 1),
(35, 2, 21005265, '2023-03-16', 1),
(36, 2, 21005265, '2023-03-16', 1),
(37, 2, 21005252, '2023-03-16', 1);

--
-- Triggers `tbl_detalle`
--
DELIMITER $$
CREATE TRIGGER `cambiar_estado` AFTER INSERT ON `tbl_detalle` FOR EACH ROW BEGIN
  UPDATE tbl_productos SET cantidad=cantidad-1 WHERE tbl_productos.ID_producto=NEW.id_producto;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productos`
--

CREATE TABLE `tbl_productos` (
  `ID_producto` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `ID_cat` int(11) DEFAULT NULL,
  `cantidad` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_productos`
--

INSERT INTO `tbl_productos` (`ID_producto`, `nombre`, `img`, `ID_cat`, `cantidad`) VALUES
(1, 'Guitarra', 'guitar.png', 1, 3),
(2, 'Saxofón', 'saxofon.png', 1, 7),
(3, 'Acordeón', 'acordeon.png', 1, 9),
(4, 'Contrabajo', 'contrabajo.png', 1, 3),
(5, 'Cajón', 'cajon.png', 1, 5),
(6, 'Congas', 'conga.png', 1, 4),
(7, 'Volleyball', 'volleyball.png', 2, 1),
(8, 'Baskteball', 'baloncesto.png', 2, 5),
(9, 'Futbol', 'balon-fut.png', 2, 6),
(10, 'Ajedrez', 'ajedrez.png', 2, 6),
(11, 'Casacas', 'casaca.png', 2, 10),
(12, 'Vestuario', 'vestuario.png', 3, 4),
(13, 'Zapatos', 'zapato.png', 3, 10),
(14, 'Escolta', 'escolta.png', 3, 11);

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
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`idAdmin`);

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
  ADD PRIMARY KEY (`ID_detalle`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `tbl_productos`
--
ALTER TABLE `tbl_productos`
  ADD PRIMARY KEY (`ID_producto`);

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
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `idAdmin` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `ID_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_productos`
--
ALTER TABLE `tbl_productos`
  MODIFY `ID_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_detalle`
--
ALTER TABLE `tbl_detalle`
  ADD CONSTRAINT `tbl_detalle_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`matricula`),
  ADD CONSTRAINT `tbl_detalle_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `tbl_productos` (`ID_producto`);

--
-- Constraints for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD CONSTRAINT `tbl_usuario_ibfk_1` FOREIGN KEY (`carrera`) REFERENCES `tbl_carrera` (`ID_carrera`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
