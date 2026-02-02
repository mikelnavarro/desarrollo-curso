-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-02-2026 a las 13:50:01
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `CodCat` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`CodCat`, `Nombre`, `Descripcion`) VALUES
(1, 'Bebidas sin alcohol', 'Bebidas'),
(2, 'Bebidas con alcohol', 'Bebidas'),
(3, 'Carne', 'Para comer'),
(4, 'Pescado', 'Para comer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `CodPed` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Enviado` int(11) DEFAULT NULL,
  `Restaurante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`CodPed`, `Fecha`, `Enviado`, `Restaurante`) VALUES
(1, '2026-01-20', 0, 1),
(2, '2026-01-20', 0, 1),
(3, '2026-01-20', 0, 1),
(4, '2026-01-20', 0, 1),
(5, '2026-01-20', 0, 1),
(6, '2026-01-20', 0, 1),
(7, '2026-01-20', 0, 1),
(8, '2026-01-21', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidosproductos`
--

CREATE TABLE `pedidosproductos` (
  `CodPedProd` int(11) NOT NULL,
  `Pedido` int(11) DEFAULT NULL,
  `Producto` int(11) DEFAULT NULL,
  `Unidades` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidosproductos`
--

INSERT INTO `pedidosproductos` (`CodPedProd`, `Pedido`, `Producto`, `Unidades`) VALUES
(1, 1, 10, 5),
(2, 1, 16, 5),
(3, 1, 13, 2),
(4, 1, 11, 1),
(5, 1, 14, 1),
(6, 2, 11, 1),
(7, 2, 13, 6),
(8, 2, 16, 5),
(9, 3, 11, 1),
(10, 4, 9, 1),
(11, 5, 12, 1),
(12, 6, 9, 1),
(13, 7, 11, 3),
(14, 7, 13, 9),
(15, 7, 16, 1),
(16, 8, 10, 1),
(17, 8, 14, 5),
(18, 8, 11, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `CodProd` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(90) DEFAULT NULL,
  `Peso` int(11) DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  `Categoria` int(11) DEFAULT NULL,
  `Precio` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`CodProd`, `Nombre`, `Descripcion`, `Peso`, `Stock`, `Categoria`, `Precio`) VALUES
(9, 'Agua mineral 1L', 'Botella de agua mineral natural', 1000, 198, 1, 0.80),
(10, 'Refresco de naranja', 'Lata de refresco sabor naranja', 330, 144, 1, 1.20),
(11, 'Cerveza artesanal', 'Botella de cerveza rubia artesanal', 500, 70, 2, 2.50),
(12, 'Vino tinto Rioja', 'Botella de vino tinto crianza', 750, 59, 2, 6.90),
(13, 'Solomillo de ternera', 'Pieza de solomillo fresco', 500, 23, 3, 12.00),
(14, 'Pechuga de pollo', 'Pechuga fresca sin piel', 300, 94, 3, 5.50),
(15, 'Salmón fresco', 'Filete de salmón del Atlántico', 250, 70, 4, 7.80),
(16, 'Merluza', 'Filete de merluza fresca', 200, 79, 4, 6.50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurantes`
--

CREATE TABLE `restaurantes` (
  `CodRes` int(11) NOT NULL,
  `Correo` varchar(90) DEFAULT NULL,
  `Clave` varchar(45) DEFAULT NULL,
  `Pais` varchar(45) DEFAULT NULL,
  `CP` int(11) DEFAULT NULL,
  `Ciudad` varchar(45) DEFAULT NULL,
  `Direccion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `restaurantes`
--

INSERT INTO `restaurantes` (`CodRes`, `Correo`, `Clave`, `Pais`, `CP`, `Ciudad`, `Direccion`) VALUES
(1, 'elaguila@outlook.es', 'AER1', 'España', 3502, 'Benidorm', 'C. De la Alegría, 23'),
(2, 'sanesteban@outlook.es', 'AER1', 'España', 3502, 'Benidorm', 'C. De Don Simón, 1'),
(3, 'xijinping@restaurantechina.es', 'AER1', 'España', 8005, 'Barcelona', 'C. Del Sitio , 20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`CodCat`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`CodPed`),
  ADD KEY `fk_tienda_usuarios` (`Restaurante`);

--
-- Indices de la tabla `pedidosproductos`
--
ALTER TABLE `pedidosproductos`
  ADD PRIMARY KEY (`CodPedProd`),
  ADD KEY `fk_tienda_productos` (`Producto`),
  ADD KEY `fk_tienda_pedidos` (`Pedido`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`CodProd`),
  ADD KEY `fk_tienda_categorias` (`Categoria`);

--
-- Indices de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD PRIMARY KEY (`CodRes`),
  ADD UNIQUE KEY `uk_tienda_correo` (`Correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `CodCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `CodPed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pedidosproductos`
--
ALTER TABLE `pedidosproductos`
  MODIFY `CodPedProd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `CodProd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  MODIFY `CodRes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_tienda_usuarios` FOREIGN KEY (`Restaurante`) REFERENCES `restaurantes` (`CodRes`);

--
-- Filtros para la tabla `pedidosproductos`
--
ALTER TABLE `pedidosproductos`
  ADD CONSTRAINT `fk_tienda_pedidos` FOREIGN KEY (`Pedido`) REFERENCES `pedidos` (`CodPed`),
  ADD CONSTRAINT `fk_tienda_productos` FOREIGN KEY (`Producto`) REFERENCES `productos` (`CodProd`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_tienda_categorias` FOREIGN KEY (`Categoria`) REFERENCES `categorias` (`CodCat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
