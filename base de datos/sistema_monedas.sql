-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2018 at 05:19 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema_monedas`
--

-- --------------------------------------------------------

--
-- Table structure for table `atributos_b`
--

CREATE TABLE `atributos_b` (
  `id_atributo_b` int(11) NOT NULL,
  `nombre_atributo` varchar(100) DEFAULT NULL,
  `descripcion_atributo` varchar(100) DEFAULT NULL,
  `tipo_atributob` varchar(50) NOT NULL,
  `categoria_atributob` varchar(100) NOT NULL,
  `orden` int(11) NOT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atributos_b`
--

INSERT INTO `atributos_b` (`id_atributo_b`, `nombre_atributo`, `descripcion_atributo`, `tipo_atributob`, `categoria_atributob`, `orden`, `estado`) VALUES
(6, 'Valor Facial', 'Facial', 'Generales', '', 0, 1),
(8, 'Valor Moneda', 'Valor Moneda', 'Especiales', '', 0, 1),
(9, 'Catalogo GTX', 'Catalogo', 'Catalogos', '', 0, 1),
(10, 'Foto General de la Moneda', 'Foto', 'Generales', '', 0, 1),
(11, 'Precio Moneda', 'Precio', 'Precios', '', 0, 1),
(12, 'Contrabando', 'Contrabando', 'Especiales', '', 0, 1),
(13, 'Gobernante', 'Gobernante', 'Especiales', '', 0, 1),
(14, 'Otros', 'Otros', 'Otros', '', 0, 1),
(15, 'Nuevo', 'Nuevo', 'Otros', '', 0, 1),
(16, 'Otros ert', 'Otros ert', 'Otros', '', 0, 1),
(17, 'Catalogo GTX 2', 'Catalogo', 'Catalogos', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `atributos_especiales_b`
--

CREATE TABLE `atributos_especiales_b` (
  `id_atributos_especiales_b` int(11) NOT NULL,
  `id_atributob` int(11) DEFAULT NULL,
  `opciones_especialesb` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atributos_especiales_b`
--

INSERT INTO `atributos_especiales_b` (`id_atributos_especiales_b`, `id_atributob`, `opciones_especialesb`) VALUES
(1, 8, '1/2'),
(2, 8, '4'),
(3, 12, 'ty'),
(4, 12, 'ty2'),
(5, 12, 'ty3'),
(6, 13, 'Carlos I y Juana'),
(7, 13, 'Felipe II'),
(8, 13, 'Felipe III');

-- --------------------------------------------------------

--
-- Table structure for table `atributos_especiales_m`
--

CREATE TABLE `atributos_especiales_m` (
  `id_atributos_especiales_m` int(11) NOT NULL,
  `id_atributom` int(11) DEFAULT NULL,
  `opciones_especialesm` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atributos_especiales_m`
--

INSERT INTO `atributos_especiales_m` (`id_atributos_especiales_m`, `id_atributom`, `opciones_especialesm`) VALUES
(25, 1, '1'),
(26, 1, '2'),
(27, 1, '3'),
(28, 1, '4');

-- --------------------------------------------------------

--
-- Table structure for table `atributos_m`
--

CREATE TABLE `atributos_m` (
  `id_atributo_m` int(11) NOT NULL,
  `nombre_atributo` varchar(100) DEFAULT NULL,
  `descripcion_atributo` varchar(100) DEFAULT NULL,
  `tipo_atributom` varchar(50) NOT NULL,
  `categoria_atributom` varchar(100) NOT NULL,
  `orden` int(11) NOT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atributos_m`
--

INSERT INTO `atributos_m` (`id_atributo_m`, `nombre_atributo`, `descripcion_atributo`, `tipo_atributom`, `categoria_atributom`, `orden`, `estado`) VALUES
(1, 'Prueba Atributo', 'Esto es la mejor descripcion del mundo editado otra vez', 'Especiales', 'Anverso', 2, 1),
(2, 'Valor Facial', 'Valor de la moneda', 'Precios', 'Anverso', 4, 1),
(3, 'Catalogo GTX', 'Catalogo', 'Catalogos', 'Catalogos', 1, 1),
(4, 'Reverso', 'Esto es la informacion del Reverso', 'Generales', 'Reverso', 3, 1),
(5, 'Foto General de la Moneda', 'Esta foto tiene todo', 'Fotos', 'Datos_Técnicos', 6, 1),
(9, 'Prueba de Ordeb', 'Esto es una prueba', 'Generales', 'Anverso', 5, 1),
(11, 'Catalogo GTX32', 'MEJOR CATALOGO', 'Catalogos', 'Catalogos', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `atributo_billetes`
--

CREATE TABLE `atributo_billetes` (
  `id_atributo_billete` int(11) NOT NULL,
  `id_billete` int(11) DEFAULT NULL,
  `id_atributo` int(11) DEFAULT NULL,
  `atributo_billete` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atributo_billetes`
--

INSERT INTO `atributo_billetes` (`id_atributo_billete`, `id_billete`, `id_atributo`, `atributo_billete`) VALUES
(1, 1, 10, 'ventas2.png'),
(2, 1, 6, '15879'),
(3, 1, 11, '15879'),
(4, 1, 8, '1/2'),
(5, 1, 12, 'ty2'),
(6, 1, 13, 'Felipe III'),
(8, 1, 14, 'Otros op'),
(9, 1, 15, 'Nuevo'),
(14, 1, 16, 'Mi referencia es mi papa HAHA'),
(15, 2, 10, 'Captura_de_pantalla_(14).png'),
(16, 2, 6, '3000'),
(17, 2, 11, '2000'),
(18, 2, 8, '1/2'),
(19, 2, 12, 'ty2'),
(20, 2, 13, 'Carlos I y Juana'),
(21, 2, 14, 'Moneda de Prueba Editada'),
(22, 2, 15, 'Moneda de Prueba Editada'),
(23, 2, 16, 'Moneda de Prueba Editada'),
(24, 2, 9, ''),
(25, 2, 17, '');

-- --------------------------------------------------------

--
-- Table structure for table `atributo_monedas`
--

CREATE TABLE `atributo_monedas` (
  `id_atributo_moneda` int(11) NOT NULL,
  `id_moneda` int(11) DEFAULT NULL,
  `id_atributo` int(11) DEFAULT NULL,
  `atributo_moneda` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atributo_monedas`
--

INSERT INTO `atributo_monedas` (`id_atributo_moneda`, `id_moneda`, `id_atributo`, `atributo_moneda`) VALUES
(1, 1, 1, '4'),
(6, 1, 3, 'AX-8746456'),
(7, 1, 4, 'Todo malo'),
(8, 1, 5, 'Dolar1.jpg,Wikipedia.com'),
(17, 4, 5, 'Dolar4.jpg,Wikipedia.com'),
(18, 4, 1, '2'),
(19, 4, 2, '15000'),
(20, 4, 4, 'Moneda de Prueba Editada Otra vez'),
(21, 4, 3, 'AX-87464562'),
(22, 4, 11, 'AXXXXXXXXXXXXXXXX');

-- --------------------------------------------------------

--
-- Table structure for table `catalogo_billetes`
--

CREATE TABLE `catalogo_billetes` (
  `id_catalogo_billete` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catalogo_billetes`
--

INSERT INTO `catalogo_billetes` (`id_catalogo_billete`, `usuario`) VALUES
(1, 'Administrador'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Table structure for table `catalogo_monedas`
--

CREATE TABLE `catalogo_monedas` (
  `id_catalogo_moneda` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catalogo_monedas`
--

INSERT INTO `catalogo_monedas` (`id_catalogo_moneda`, `usuario`) VALUES
(1, 'Administrador'),
(4, 'Administrador');

-- --------------------------------------------------------

--
-- Table structure for table `coleccion_personal_billetes`
--

CREATE TABLE `coleccion_personal_billetes` (
  `id_coleccion_personal_billete` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_billete` int(11) DEFAULT NULL,
  `condicion_billete` varchar(45) DEFAULT NULL,
  `casa_certificadora` varchar(45) DEFAULT NULL,
  `valor_certificacion` varchar(45) DEFAULT NULL,
  `registro_certificacion` varchar(80) DEFAULT NULL,
  `tipo_registro` varchar(50) DEFAULT NULL,
  `tipo_billete_registro` varchar(50) DEFAULT NULL,
  `foto_frente_billete` varchar(255) DEFAULT NULL,
  `foto_detras_billete` varchar(255) DEFAULT NULL,
  `precio_billete` varchar(45) DEFAULT NULL,
  `mercado` varchar(45) DEFAULT NULL,
  `serie_billete` varchar(45) DEFAULT NULL,
  `subserie` varchar(50) DEFAULT NULL,
  `numero_billete_add` varchar(80) DEFAULT NULL,
  `precio_referencia` varchar(45) DEFAULT NULL,
  `lugar_billete` varchar(100) DEFAULT NULL,
  `cantidad_billete` varchar(45) DEFAULT NULL,
  `descripcion_billete` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coleccion_personal_monedas`
--

CREATE TABLE `coleccion_personal_monedas` (
  `id_coleccion_personal_moneda` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_moneda` int(11) DEFAULT NULL,
  `condicion_moneda` varchar(45) DEFAULT NULL,
  `casa_certificadora` varchar(45) DEFAULT NULL,
  `valor_certificacion` varchar(45) DEFAULT NULL,
  `registro_certificacion` varchar(80) DEFAULT NULL,
  `tipo_registro` varchar(50) DEFAULT NULL,
  `tipo_moneda_registro` varchar(50) DEFAULT NULL,
  `foto_frente_moneda` varchar(255) DEFAULT NULL,
  `foto_detras_moneda` varchar(255) DEFAULT NULL,
  `precio_moneda` varchar(45) DEFAULT NULL,
  `mercado` varchar(45) DEFAULT NULL,
  `serie_moneda` varchar(50) DEFAULT NULL,
  `subserie` varchar(50) DEFAULT NULL,
  `numero_moneda_add` varchar(80) DEFAULT NULL,
  `precio_referencia` varchar(45) DEFAULT NULL,
  `lugar_moneda` varchar(100) DEFAULT NULL,
  `cantidad_moneda` varchar(45) DEFAULT NULL,
  `descripcion_moneda` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `precios_catalogob`
--

CREATE TABLE `precios_catalogob` (
  `id_precio_catalogob` int(11) NOT NULL,
  `id_catalogo` int(11) DEFAULT NULL,
  `id_billete` int(11) DEFAULT NULL,
  `G` varchar(45) DEFAULT NULL,
  `VG` varchar(45) DEFAULT NULL,
  `F` varchar(45) DEFAULT NULL,
  `VF` varchar(45) DEFAULT NULL,
  `XF` varchar(45) DEFAULT NULL,
  `AU` varchar(45) DEFAULT NULL,
  `UNC` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `precios_catalogob`
--

INSERT INTO `precios_catalogob` (`id_precio_catalogob`, `id_catalogo`, `id_billete`, `G`, `VG`, `F`, `VF`, `XF`, `AU`, `UNC`) VALUES
(15, 9, 2, '1', '123456', '4', '3', '5', '6', '7'),
(16, 17, 2, '1', '2', '4', '333', '255', '6', '7');

-- --------------------------------------------------------

--
-- Table structure for table `precios_catalogom`
--

CREATE TABLE `precios_catalogom` (
  `id_precio_catalogom` int(11) NOT NULL,
  `id_catalogo` int(11) DEFAULT NULL,
  `id_moneda` int(11) DEFAULT NULL,
  `G` varchar(45) DEFAULT NULL,
  `VG` varchar(45) DEFAULT NULL,
  `F` varchar(45) DEFAULT NULL,
  `VF` varchar(45) DEFAULT NULL,
  `XF` varchar(45) DEFAULT NULL,
  `AU` varchar(45) DEFAULT NULL,
  `UNC` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `precios_catalogom`
--

INSERT INTO `precios_catalogom` (`id_precio_catalogom`, `id_catalogo`, `id_moneda`, `G`, `VG`, `F`, `VF`, `XF`, `AU`, `UNC`) VALUES
(11, 3, 1, '1', '2', '3', '8', '5', '6', '7'),
(17, 3, 4, '1', '2', '3', '4', '5', '6', '7'),
(18, 11, 4, '11', '22', '33', '44', '55', '66', '77');

-- --------------------------------------------------------

--
-- Table structure for table `sugerencias`
--

CREATE TABLE `sugerencias` (
  `id_sugerencia` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `descripcion` longtext,
  `fecha_enviado` date DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_persona` varchar(50) DEFAULT NULL,
  `nombre_usuario` varchar(50) DEFAULT NULL,
  `dni_usuario` varchar(50) DEFAULT NULL,
  `email_usuario` varchar(100) DEFAULT NULL,
  `tipo_usuario` int(11) DEFAULT NULL,
  `membresia` int(11) DEFAULT NULL,
  `publicidad` int(11) DEFAULT NULL,
  `membresia_comienzo` datetime DEFAULT NULL,
  `membresia_fin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_persona`, `nombre_usuario`, `dni_usuario`, `email_usuario`, `tipo_usuario`, `membresia`, `publicidad`, `membresia_comienzo`, `membresia_fin`) VALUES
(1, 'Jose Ortega', 'bomj321', '123456', 'jmob612@gmail.com', 1, 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atributos_b`
--
ALTER TABLE `atributos_b`
  ADD PRIMARY KEY (`id_atributo_b`),
  ADD UNIQUE KEY `nombre_atributo_UNIQUE` (`nombre_atributo`);

--
-- Indexes for table `atributos_especiales_b`
--
ALTER TABLE `atributos_especiales_b`
  ADD PRIMARY KEY (`id_atributos_especiales_b`),
  ADD KEY `fk_attresb_atributos_b_idx` (`id_atributob`);

--
-- Indexes for table `atributos_especiales_m`
--
ALTER TABLE `atributos_especiales_m`
  ADD PRIMARY KEY (`id_atributos_especiales_m`),
  ADD KEY `fk_attresm_atributos_m_idx` (`id_atributom`);

--
-- Indexes for table `atributos_m`
--
ALTER TABLE `atributos_m`
  ADD PRIMARY KEY (`id_atributo_m`),
  ADD UNIQUE KEY `nombre_atributo_UNIQUE` (`nombre_atributo`);

--
-- Indexes for table `atributo_billetes`
--
ALTER TABLE `atributo_billetes`
  ADD PRIMARY KEY (`id_atributo_billete`),
  ADD KEY `fk_atributo_catalogo_idx` (`id_billete`),
  ADD KEY `fk_atributo_attrb_idx` (`id_atributo`);

--
-- Indexes for table `atributo_monedas`
--
ALTER TABLE `atributo_monedas`
  ADD PRIMARY KEY (`id_atributo_moneda`),
  ADD KEY `fk_atributo_catalogo_idx` (`id_moneda`),
  ADD KEY `fk_atributo_attr_idx` (`id_atributo`);

--
-- Indexes for table `catalogo_billetes`
--
ALTER TABLE `catalogo_billetes`
  ADD PRIMARY KEY (`id_catalogo_billete`);

--
-- Indexes for table `catalogo_monedas`
--
ALTER TABLE `catalogo_monedas`
  ADD PRIMARY KEY (`id_catalogo_moneda`);

--
-- Indexes for table `coleccion_personal_billetes`
--
ALTER TABLE `coleccion_personal_billetes`
  ADD PRIMARY KEY (`id_coleccion_personal_billete`),
  ADD KEY `fk_coleccionb_usuario_idx` (`id_usuario`),
  ADD KEY `fk_coleccionb_catalogo_idx` (`id_billete`);

--
-- Indexes for table `coleccion_personal_monedas`
--
ALTER TABLE `coleccion_personal_monedas`
  ADD PRIMARY KEY (`id_coleccion_personal_moneda`),
  ADD KEY `fk_coleccion_usuario_idx` (`id_usuario`),
  ADD KEY `fk_coleccion_catalogo_idx` (`id_moneda`);

--
-- Indexes for table `precios_catalogob`
--
ALTER TABLE `precios_catalogob`
  ADD PRIMARY KEY (`id_precio_catalogob`),
  ADD KEY `fk_preciosc_attrb_idx` (`id_catalogo`),
  ADD KEY `fk_precios_idbille_idx` (`id_billete`);

--
-- Indexes for table `precios_catalogom`
--
ALTER TABLE `precios_catalogom`
  ADD PRIMARY KEY (`id_precio_catalogom`),
  ADD KEY `fk_preciosc_attrm_idx` (`id_catalogo`),
  ADD KEY `fk_catm_attrm_idx` (`id_moneda`);

--
-- Indexes for table `sugerencias`
--
ALTER TABLE `sugerencias`
  ADD PRIMARY KEY (`id_sugerencia`),
  ADD KEY `fk_sugerencia_usuario_idx` (`id_usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nombre_usuario_UNIQUE` (`nombre_usuario`),
  ADD UNIQUE KEY `dni_usuario_UNIQUE` (`dni_usuario`),
  ADD UNIQUE KEY `email_usuario_UNIQUE` (`email_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atributos_b`
--
ALTER TABLE `atributos_b`
  MODIFY `id_atributo_b` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `atributos_especiales_b`
--
ALTER TABLE `atributos_especiales_b`
  MODIFY `id_atributos_especiales_b` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `atributos_especiales_m`
--
ALTER TABLE `atributos_especiales_m`
  MODIFY `id_atributos_especiales_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `atributos_m`
--
ALTER TABLE `atributos_m`
  MODIFY `id_atributo_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `atributo_billetes`
--
ALTER TABLE `atributo_billetes`
  MODIFY `id_atributo_billete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `atributo_monedas`
--
ALTER TABLE `atributo_monedas`
  MODIFY `id_atributo_moneda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `catalogo_billetes`
--
ALTER TABLE `catalogo_billetes`
  MODIFY `id_catalogo_billete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `catalogo_monedas`
--
ALTER TABLE `catalogo_monedas`
  MODIFY `id_catalogo_moneda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coleccion_personal_billetes`
--
ALTER TABLE `coleccion_personal_billetes`
  MODIFY `id_coleccion_personal_billete` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coleccion_personal_monedas`
--
ALTER TABLE `coleccion_personal_monedas`
  MODIFY `id_coleccion_personal_moneda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `precios_catalogob`
--
ALTER TABLE `precios_catalogob`
  MODIFY `id_precio_catalogob` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `precios_catalogom`
--
ALTER TABLE `precios_catalogom`
  MODIFY `id_precio_catalogom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sugerencias`
--
ALTER TABLE `sugerencias`
  MODIFY `id_sugerencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `atributos_especiales_b`
--
ALTER TABLE `atributos_especiales_b`
  ADD CONSTRAINT `fk_attresb_atributos_b` FOREIGN KEY (`id_atributob`) REFERENCES `atributos_b` (`id_atributo_b`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `atributos_especiales_m`
--
ALTER TABLE `atributos_especiales_m`
  ADD CONSTRAINT `fk_attresm_atributos_m` FOREIGN KEY (`id_atributom`) REFERENCES `atributos_m` (`id_atributo_m`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `atributo_billetes`
--
ALTER TABLE `atributo_billetes`
  ADD CONSTRAINT `fk_atributo_attrb` FOREIGN KEY (`id_atributo`) REFERENCES `atributos_b` (`id_atributo_b`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_atributo_catalogob` FOREIGN KEY (`id_billete`) REFERENCES `catalogo_billetes` (`id_catalogo_billete`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `atributo_monedas`
--
ALTER TABLE `atributo_monedas`
  ADD CONSTRAINT `fk_atributo_attrm` FOREIGN KEY (`id_atributo`) REFERENCES `atributos_m` (`id_atributo_m`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_atributo_catalogom` FOREIGN KEY (`id_moneda`) REFERENCES `catalogo_monedas` (`id_catalogo_moneda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coleccion_personal_billetes`
--
ALTER TABLE `coleccion_personal_billetes`
  ADD CONSTRAINT `fk_coleccionb_catalogo` FOREIGN KEY (`id_billete`) REFERENCES `catalogo_billetes` (`id_catalogo_billete`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_coleccionb_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coleccion_personal_monedas`
--
ALTER TABLE `coleccion_personal_monedas`
  ADD CONSTRAINT `fk_coleccionm_catalogo` FOREIGN KEY (`id_moneda`) REFERENCES `catalogo_monedas` (`id_catalogo_moneda`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_coleccionm_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `precios_catalogob`
--
ALTER TABLE `precios_catalogob`
  ADD CONSTRAINT `fk_precios_idbille` FOREIGN KEY (`id_billete`) REFERENCES `atributo_billetes` (`id_billete`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_preciosc_attrb` FOREIGN KEY (`id_catalogo`) REFERENCES `atributo_billetes` (`id_atributo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `precios_catalogom`
--
ALTER TABLE `precios_catalogom`
  ADD CONSTRAINT `fk_catm_attrm` FOREIGN KEY (`id_moneda`) REFERENCES `atributo_monedas` (`id_moneda`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_preciosc_attrm` FOREIGN KEY (`id_catalogo`) REFERENCES `atributo_monedas` (`id_atributo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sugerencias`
--
ALTER TABLE `sugerencias`
  ADD CONSTRAINT `fk_sugerencia_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
