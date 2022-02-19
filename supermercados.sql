-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-09-2017 a las 19:01:35
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `supermercados`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `cli_id` int(5) NOT NULL,
  `cli_nombre` varchar(30) NOT NULL,
  `cli_apellido` varchar(30) NOT NULL,
  `cli_documento` varchar(15) NOT NULL,
  `cli_telefono` varchar(12) DEFAULT NULL,
  `cli_correo` varchar(60) DEFAULT NULL,
  `cli_direccion` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dia`
--

CREATE TABLE `dia` (
  `dia_id` int(1) NOT NULL,
  `dia_nombre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacion`
--

CREATE TABLE `facturacion` (
  `fact_id` int(7) NOT NULL,
  `cli_id` int(5) NOT NULL,
  `inv_id` int(5) NOT NULL,
  `fact_cantidad` int(2) NOT NULL,
  `fact_precio` float NOT NULL,
  `fact_fecha_venta` datetime DEFAULT NULL,
  `fact_estado` varchar(15) NOT NULL,
  `fact_observacion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventaria`
--

CREATE TABLE `inventaria` (
  `inv_id` int(5) NOT NULL,
  `prpv_id` int(5) NOT NULL,
  `inv_cantidad` int(3) NOT NULL,
  `inv_fecha_ingreso` date NOT NULL,
  `inv_fecha_vencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `mar_id` int(5) NOT NULL,
  `mar_nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`mar_id`, `mar_nombre`) VALUES
(1, 'Alpina'),
(2, 'fab'),
(3, 'nestle'),
(4, 'yogo yogo'),
(5, 'alqueria'),
(6, 'colombina'),
(7, 'ZENU');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `prod_id` int(5) NOT NULL,
  `mar_id` int(5) NOT NULL,
  `prod_nombre` varchar(30) DEFAULT NULL,
  `prod_presentacion` varchar(40) NOT NULL,
  `tipro_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`prod_id`, `mar_id`, `prod_nombre`, `prod_presentacion`, `tipro_id`) VALUES
(1, 1, 'Leche Descremada', '1 lt', 1),
(4, 1, 'gelatina', 'envase plastico de 350g', 1),
(5, 2, 'Jabon labomatic', '1 libra en bolsa en polvo', 7),
(6, 6, 'Chololatinas jet', 'Empaque de 12 unidades mediano', 3),
(7, 1, 'alpinito', 'unidad', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_proveedor`
--

CREATE TABLE `producto_proveedor` (
  `prpv_id` int(10) NOT NULL,
  `prod_id` int(5) DEFAULT NULL,
  `prov_id` int(5) NOT NULL,
  `prpv_vcompra` float NOT NULL,
  `prpv_vventa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provdia`
--

CREATE TABLE `provdia` (
  `provdia_id` int(1) NOT NULL,
  `prov_id` int(5) NOT NULL,
  `dia_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `prov_id` int(5) NOT NULL,
  `prov_nombre` varchar(40) NOT NULL,
  `prov_nit` varchar(12) DEFAULT NULL,
  `prov_telefono` varchar(12) NOT NULL,
  `prov_asesor` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `tipro_id` int(5) NOT NULL,
  `tipro_nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`tipro_id`, `tipro_nombre`) VALUES
(1, 'lacteos'),
(2, 'cosmeticos'),
(3, 'dulces'),
(4, 'jugos'),
(5, 'sodas'),
(6, 'cereales'),
(7, 'limpieza'),
(8, 'CARNICOS');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cli_id`);

--
-- Indices de la tabla `dia`
--
ALTER TABLE `dia`
  ADD PRIMARY KEY (`dia_id`);

--
-- Indices de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD PRIMARY KEY (`fact_id`),
  ADD KEY `cli_id` (`cli_id`),
  ADD KEY `inv_id` (`inv_id`);

--
-- Indices de la tabla `inventaria`
--
ALTER TABLE `inventaria`
  ADD PRIMARY KEY (`inv_id`),
  ADD KEY `prpv_id` (`prpv_id`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`mar_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `mar_id` (`mar_id`),
  ADD KEY `tipro_id` (`tipro_id`);

--
-- Indices de la tabla `producto_proveedor`
--
ALTER TABLE `producto_proveedor`
  ADD PRIMARY KEY (`prpv_id`),
  ADD KEY `prov_id` (`prov_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indices de la tabla `provdia`
--
ALTER TABLE `provdia`
  ADD PRIMARY KEY (`provdia_id`),
  ADD KEY `prov_id` (`prov_id`),
  ADD KEY `dia_id` (`dia_id`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`prov_id`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`tipro_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cli_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `dia`
--
ALTER TABLE `dia`
  MODIFY `dia_id` int(1) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  MODIFY `fact_id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inventaria`
--
ALTER TABLE `inventaria`
  MODIFY `inv_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `mar_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `prod_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `producto_proveedor`
--
ALTER TABLE `producto_proveedor`
  MODIFY `prpv_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `provdia`
--
ALTER TABLE `provdia`
  MODIFY `provdia_id` int(1) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `prov_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `tipro_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD CONSTRAINT `facturacion_ibfk_1` FOREIGN KEY (`cli_id`) REFERENCES `cliente` (`cli_id`),
  ADD CONSTRAINT `facturacion_ibfk_2` FOREIGN KEY (`inv_id`) REFERENCES `inventaria` (`inv_id`);

--
-- Filtros para la tabla `inventaria`
--
ALTER TABLE `inventaria`
  ADD CONSTRAINT `inventaria_ibfk_1` FOREIGN KEY (`prpv_id`) REFERENCES `producto_proveedor` (`prpv_id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`mar_id`) REFERENCES `marca` (`mar_id`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`tipro_id`) REFERENCES `tipo_producto` (`tipro_id`);

--
-- Filtros para la tabla `producto_proveedor`
--
ALTER TABLE `producto_proveedor`
  ADD CONSTRAINT `producto_proveedor_ibfk_1` FOREIGN KEY (`prov_id`) REFERENCES `proveedor` (`prov_id`),
  ADD CONSTRAINT `producto_proveedor_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `producto` (`prod_id`);

--
-- Filtros para la tabla `provdia`
--
ALTER TABLE `provdia`
  ADD CONSTRAINT `provdia_ibfk_1` FOREIGN KEY (`prov_id`) REFERENCES `proveedor` (`prov_id`),
  ADD CONSTRAINT `provdia_ibfk_2` FOREIGN KEY (`dia_id`) REFERENCES `dia` (`dia_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
