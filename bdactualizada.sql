-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 06, 2020 at 09:08 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inversiones`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_details`
--

CREATE TABLE `client_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pnombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `snombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `papellido` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sapellido` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `rut` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fnacimiento` date DEFAULT NULL,
  `comuna` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ciudad` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fijo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cuentabancaria` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banco` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ejecutivobancario` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correoejecutivo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipocuentabancaria` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `linkedin` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skype` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gst_number` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `eess` tinyint(1) DEFAULT NULL,
  `nacionalidad` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `llamado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `client_details`
--

INSERT INTO `client_details` (`id`, `company_id`, `user_id`, `name`, `pnombre`, `snombre`, `papellido`, `sapellido`, `email`, `image`, `mobile`, `company_name`, `address`, `rut`, `fnacimiento`, `comuna`, `ciudad`, `fijo`, `cuentabancaria`, `banco`, `ejecutivobancario`, `correoejecutivo`, `tipocuentabancaria`, `website`, `note`, `linkedin`, `facebook`, `twitter`, `skype`, `gst_number`, `created_at`, `updated_at`, `eess`, `nacionalidad`, `estado`, `llamado`) VALUES
(48, 1, 65, 'prueba cliente', 'prueba', NULL, 'cliente', NULL, 'jeortegaga@gmail.com', NULL, NULL, 'pryeba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-07 18:05:27', '2020-04-07 18:05:27', NULL, NULL, NULL, NULL),
(49, 1, 66, 'admingmai gmail', 'admingmai', NULL, 'gmail', NULL, 'admingmail@tamed.global', NULL, NULL, 'kajkaja', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-07 18:07:54', '2020-04-07 18:07:54', NULL, NULL, NULL, NULL),
(50, 1, 67, 'info info', 'info', 'info', 'info', 'ne', 'info@tamed.global', '05b70461cfc6bc4765aca0d5387c6f97.png', '234', 'prueba', 'sdsf', '1234567654', '2020-04-08', 'sdfds', 'qsf', '5423', '123123', 'dasd', 'rewr', 'rende', 'ds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-07 18:09:13', '2020-04-07 18:51:44', NULL, NULL, NULL, NULL),
(51, 1, 68, 'jesus ortega', 'jesus', 'elias', 'ortega', 'garcia', 'jesuseliasog@ufps.edu.co', NULL, '524165465465', 'ufps', 'jhsjshkj', '3216546545', '1988-03-12', '4565465', '4654654654', '3216546546', '3212654654', 'jajajaja', NULL, NULL, 'ahorros', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-07 18:11:49', '2020-04-07 18:11:49', NULL, NULL, NULL, NULL),
(52, 1, 69, 'diego ortiz', 'diego', 'alonso', 'ortiz', 'Ramirez', 'd17r.dr@gmail.com', NULL, '546546546', 'ta', 'emilia tellez 5170', '19829438-1', '1997-11-17', 'Ñuñoa', NULL, '32165654', '546465465', 'banco estado', NULL, NULL, 'vista', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-08 00:45:13', '2020-05-07 00:31:57', NULL, 'chilena', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `conyuge`
--

CREATE TABLE `conyuge` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `pnombre` varchar(20) DEFAULT NULL,
  `snombre` varchar(20) DEFAULT NULL,
  `apellidos` varchar(40) DEFAULT NULL,
  `rut` varchar(15) DEFAULT NULL,
  `fnacimiento` date DEFAULT NULL,
  `nacionalidad` varchar(50) DEFAULT NULL,
  `nvl_educacional` varchar(30) DEFAULT NULL,
  `ocupacion` varchar(50) DEFAULT NULL,
  `ingresos` int(11) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conyuge`
--

INSERT INTO `conyuge` (`id`, `user_id`, `pnombre`, `snombre`, `apellidos`, `rut`, `fnacimiento`, `nacionalidad`, `nvl_educacional`, `ocupacion`, `ingresos`, `estado`) VALUES
(2, 52, 'wewrer', 'sdfsd', 'sdfsd', '65655554', '2020-04-03', 'chilena', 'Media completa', 'sdfdf', 45454, '1');

-- --------------------------------------------------------

--
-- Table structure for table `credito_consumo`
--

CREATE TABLE `credito_consumo` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `banco` varchar(50) DEFAULT NULL,
  `monto` int(11) DEFAULT NULL,
  `valor_cuota` int(11) DEFAULT NULL,
  `cuotas_restantes` int(11) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credito_consumo`
--

INSERT INTO `credito_consumo` (`id`, `user_id`, `banco`, `monto`, `valor_cuota`, `cuotas_restantes`, `estado`) VALUES
(3, 52, 'Banco Santander/Banefe', 21454, 414145, 1414, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `credito_hipotecario`
--

CREATE TABLE `credito_hipotecario` (
  `id` int(10) UNSIGNED NOT NULL,
  `propiedad_id` int(10) UNSIGNED NOT NULL,
  `banco` varchar(50) DEFAULT NULL,
  `monto` int(11) DEFAULT NULL,
  `valor_cuota` int(11) DEFAULT NULL,
  `cuotas_restantes` int(11) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cuentas_corriente`
--

CREATE TABLE `cuentas_corriente` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `banco` varchar(50) DEFAULT NULL,
  `ejecutivo_sucursal` varchar(50) DEFAULT NULL,
  `monto_linea` int(11) DEFAULT NULL,
  `monto_tarjeta` int(11) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `saldo_actual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuentas_corriente`
--

INSERT INTO `cuentas_corriente` (`id`, `user_id`, `banco`, `ejecutivo_sucursal`, `monto_linea`, `monto_tarjeta`, `estado`, `saldo_actual`) VALUES
(3, 52, 'Banco CORP Banca', 'sdfsdfsd', 121212, 454545, NULL, 12121);

-- --------------------------------------------------------

--
-- Table structure for table `documento_empresa`
--

CREATE TABLE `documento_empresa` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `participacion_id` int(10) UNSIGNED NOT NULL,
  `fild_name` varchar(191) DEFAULT NULL,
  `hash_name` varchar(191) DEFAULT NULL,
  `size` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `documento_propiedad`
--

CREATE TABLE `documento_propiedad` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `propiedad_id` int(10) UNSIGNED NOT NULL,
  `fild_name` varchar(191) DEFAULT NULL,
  `hash_name` varchar(191) DEFAULT NULL,
  `size` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eess`
--

CREATE TABLE `eess` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `motivacion` varchar(30) DEFAULT NULL,
  `tipo_v_motivacion` varchar(15) DEFAULT NULL,
  `cant_v_motivacion` int(11) DEFAULT NULL,
  `rama` varchar(30) DEFAULT NULL,
  `fecha_ingreso_rama` date DEFAULT NULL,
  `nvl_educacional` varchar(50) DEFAULT NULL,
  `lugar_estudio` varchar(50) DEFAULT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `año_egreso` int(11) DEFAULT NULL,
  `estado_civil` varchar(25) DEFAULT NULL,
  `regimen_matrimonial` varchar(50) DEFAULT NULL,
  `personas_cargo` int(11) DEFAULT NULL,
  `sueldo` int(11) DEFAULT NULL,
  `otros_ingresos` tinyint(4) DEFAULT NULL,
  `concepto_ingreso` varchar(100) DEFAULT NULL,
  `total_ingreso` int(11) DEFAULT NULL,
  `vehiculos` tinyint(4) DEFAULT NULL,
  `propiedades` tinyint(4) DEFAULT NULL,
  `inversiones` tinyint(4) DEFAULT NULL,
  `participacion_empresa` tinyint(4) DEFAULT NULL,
  `cuenta_corriente` tinyint(4) DEFAULT NULL,
  `credito_consumo` tinyint(4) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `estado_motivacion` tinyint(4) DEFAULT NULL,
  `estado_estudio` tinyint(4) DEFAULT NULL,
  `estado_dependencia` tinyint(4) DEFAULT NULL,
  `estado_ingresos` tinyint(4) DEFAULT NULL,
  `paso` int(11) NOT NULL,
  `monto_preliminar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eess`
--

INSERT INTO `eess` (`id`, `user_id`, `motivacion`, `tipo_v_motivacion`, `cant_v_motivacion`, `rama`, `fecha_ingreso_rama`, `nvl_educacional`, `lugar_estudio`, `titulo`, `año_egreso`, `estado_civil`, `regimen_matrimonial`, `personas_cargo`, `sueldo`, `otros_ingresos`, `concepto_ingreso`, `total_ingreso`, `vehiculos`, `propiedades`, `inversiones`, `participacion_empresa`, `cuenta_corriente`, `credito_consumo`, `estado`, `estado_motivacion`, `estado_estudio`, `estado_dependencia`, `estado_ingresos`, `paso`, `monto_preliminar`) VALUES
(12, 52, 'Primera vivienda', 'Departamento', NULL, 'Fuerza Aérea de Chile', '2020-05-08', 'Educación Universitaria Completa', 'fdsf', 'sdfsdf', 1212, 'Soltero', NULL, 0, 4545454, 1, 'knkljnklj', 45454545, 1, 1, 1, 0, 1, 1, NULL, 1, 1, 1, 1, 12, -2147483648);

-- --------------------------------------------------------

--
-- Table structure for table `instrumentos_inversion`
--

CREATE TABLE `instrumentos_inversion` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instrumentos_inversion`
--

INSERT INTO `instrumentos_inversion` (`id`, `user_id`, `tipo`, `valor`, `estado`) VALUES
(8, 52, 'Fondo mutuo', 25525, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `liquidaciones_sueldo`
--

CREATE TABLE `liquidaciones_sueldo` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `fild_name` varchar(191) DEFAULT NULL,
  `hash_name` varchar(191) DEFAULT NULL,
  `size` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `liquidaciones_sueldo_conyuge`
--

CREATE TABLE `liquidaciones_sueldo_conyuge` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `conyuge_id` int(10) UNSIGNED NOT NULL,
  `fild_name` varchar(191) DEFAULT NULL,
  `hash_name` varchar(191) DEFAULT NULL,
  `size` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `participacion_empresa`
--

CREATE TABLE `participacion_empresa` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `razon_social` varchar(50) DEFAULT NULL,
  `rut_sociedad` varchar(50) DEFAULT NULL,
  `giro_sociedad` varchar(50) DEFAULT NULL,
  `participacion` int(11) DEFAULT NULL,
  `ventas_totales` int(11) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permisos_circulacion`
--

CREATE TABLE `permisos_circulacion` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `vehiculo_id` int(10) UNSIGNED NOT NULL,
  `fild_name` varchar(191) DEFAULT NULL,
  `hash_name` varchar(191) DEFAULT NULL,
  `size` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `propiedades`
--

CREATE TABLE `propiedades` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `tipo` varchar(30) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `comuna` varchar(40) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `rol` varchar(50) DEFAULT NULL,
  `valor_comercial` int(11) DEFAULT NULL,
  `credito` tinyint(4) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `banco` varchar(50) DEFAULT NULL,
  `monto` int(11) DEFAULT NULL,
  `valor_cuota` int(11) DEFAULT NULL,
  `cuotas_restantes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `propiedades`
--

INSERT INTO `propiedades` (`id`, `user_id`, `tipo`, `direccion`, `comuna`, `ciudad`, `rol`, `valor_comercial`, `credito`, `estado`, `banco`, `monto`, `valor_cuota`, `cuotas_restantes`) VALUES
(3, 52, 'Departamento', 'cfsddc', 'sacczcx', 'zxczxc', 'xzczxc', 11111111, 0, NULL, NULL, NULL, NULL, NULL),
(4, 52, 'Departamento', 'cxzczx', 'zxczx', 'cxzcxz', 'xczcx', 12122, 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `año` int(11) DEFAULT NULL,
  `patente` varchar(15) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `user_id`, `marca`, `modelo`, `año`, `patente`, `valor`, `estado`) VALUES
(19, 52, 'xzcvsd', 'vdssdv', 2020, 'dsv54sd', 454545, NULL),
(20, 52, 'dvsvd', 'sdvsdv', 4545, '12212dd', 45545745, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_details`
--
ALTER TABLE `client_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_details_user_id_foreign` (`user_id`),
  ADD KEY `client_details_company_id_foreign` (`company_id`);

--
-- Indexes for table `conyuge`
--
ALTER TABLE `conyuge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_conyuge` (`user_id`);

--
-- Indexes for table `credito_consumo`
--
ALTER TABLE `credito_consumo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `credito_user` (`user_id`);

--
-- Indexes for table `credito_hipotecario`
--
ALTER TABLE `credito_hipotecario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `propiedad_credito` (`propiedad_id`);

--
-- Indexes for table `cuentas_corriente`
--
ALTER TABLE `cuentas_corriente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cuentas_user` (`user_id`);

--
-- Indexes for table `documento_empresa`
--
ALTER TABLE `documento_empresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `participacion_documento` (`participacion_id`);

--
-- Indexes for table `documento_propiedad`
--
ALTER TABLE `documento_propiedad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `propiedad_documento` (`propiedad_id`);

--
-- Indexes for table `eess`
--
ALTER TABLE `eess`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_eess` (`user_id`);

--
-- Indexes for table `instrumentos_inversion`
--
ALTER TABLE `instrumentos_inversion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instrumento_client` (`user_id`);

--
-- Indexes for table `liquidaciones_sueldo`
--
ALTER TABLE `liquidaciones_sueldo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_liquidaciones` (`user_id`);

--
-- Indexes for table `liquidaciones_sueldo_conyuge`
--
ALTER TABLE `liquidaciones_sueldo_conyuge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conyuge_liquidacion` (`conyuge_id`);

--
-- Indexes for table `participacion_empresa`
--
ALTER TABLE `participacion_empresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresas_client` (`user_id`);

--
-- Indexes for table `permisos_circulacion`
--
ALTER TABLE `permisos_circulacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehiculo_permiso` (`vehiculo_id`);

--
-- Indexes for table `propiedades`
--
ALTER TABLE `propiedades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_propiedad` (`user_id`);

--
-- Indexes for table `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehiculo_user` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_details`
--
ALTER TABLE `client_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `conyuge`
--
ALTER TABLE `conyuge`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `credito_consumo`
--
ALTER TABLE `credito_consumo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `credito_hipotecario`
--
ALTER TABLE `credito_hipotecario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cuentas_corriente`
--
ALTER TABLE `cuentas_corriente`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `documento_empresa`
--
ALTER TABLE `documento_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documento_propiedad`
--
ALTER TABLE `documento_propiedad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eess`
--
ALTER TABLE `eess`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `instrumentos_inversion`
--
ALTER TABLE `instrumentos_inversion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `liquidaciones_sueldo`
--
ALTER TABLE `liquidaciones_sueldo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `liquidaciones_sueldo_conyuge`
--
ALTER TABLE `liquidaciones_sueldo_conyuge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `participacion_empresa`
--
ALTER TABLE `participacion_empresa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permisos_circulacion`
--
ALTER TABLE `permisos_circulacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `propiedades`
--
ALTER TABLE `propiedades`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client_details`
--
ALTER TABLE `client_details`
  ADD CONSTRAINT `client_details_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `client_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `conyuge`
--
ALTER TABLE `conyuge`
  ADD CONSTRAINT `client_conyuge` FOREIGN KEY (`user_id`) REFERENCES `client_details` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `credito_consumo`
--
ALTER TABLE `credito_consumo`
  ADD CONSTRAINT `credito_user` FOREIGN KEY (`user_id`) REFERENCES `client_details` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `credito_hipotecario`
--
ALTER TABLE `credito_hipotecario`
  ADD CONSTRAINT `propiedad_credito` FOREIGN KEY (`propiedad_id`) REFERENCES `propiedades` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `cuentas_corriente`
--
ALTER TABLE `cuentas_corriente`
  ADD CONSTRAINT `cuentas_user` FOREIGN KEY (`user_id`) REFERENCES `client_details` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `documento_empresa`
--
ALTER TABLE `documento_empresa`
  ADD CONSTRAINT `participacion_documento` FOREIGN KEY (`participacion_id`) REFERENCES `participacion_empresa` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `documento_propiedad`
--
ALTER TABLE `documento_propiedad`
  ADD CONSTRAINT `propiedad_documento` FOREIGN KEY (`propiedad_id`) REFERENCES `propiedades` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `eess`
--
ALTER TABLE `eess`
  ADD CONSTRAINT `client_eess` FOREIGN KEY (`user_id`) REFERENCES `client_details` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `instrumentos_inversion`
--
ALTER TABLE `instrumentos_inversion`
  ADD CONSTRAINT `instrumento_client` FOREIGN KEY (`user_id`) REFERENCES `client_details` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `liquidaciones_sueldo`
--
ALTER TABLE `liquidaciones_sueldo`
  ADD CONSTRAINT `client_liquidaciones` FOREIGN KEY (`user_id`) REFERENCES `client_details` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `liquidaciones_sueldo_conyuge`
--
ALTER TABLE `liquidaciones_sueldo_conyuge`
  ADD CONSTRAINT `conyuge_liquidacion` FOREIGN KEY (`conyuge_id`) REFERENCES `conyuge` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `participacion_empresa`
--
ALTER TABLE `participacion_empresa`
  ADD CONSTRAINT `empresas_client` FOREIGN KEY (`user_id`) REFERENCES `client_details` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `permisos_circulacion`
--
ALTER TABLE `permisos_circulacion`
  ADD CONSTRAINT `vehiculo_permiso` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `propiedades`
--
ALTER TABLE `propiedades`
  ADD CONSTRAINT `client_propiedad` FOREIGN KEY (`user_id`) REFERENCES `client_details` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculo_user` FOREIGN KEY (`user_id`) REFERENCES `client_details` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
