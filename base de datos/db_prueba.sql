-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2019 a las 21:44:36
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_downisup`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administracion`
--

CREATE TABLE `administracion` (
  `id_administracion` int(11) NOT NULL,
  `cuota_fija_administracion` decimal(10,2) NOT NULL,
  `fecha_cuota_fija_inicio_administracion` date NOT NULL,
  `fecha_cuota_fija_fin_administracion` date DEFAULT NULL,
  `id_socio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_organizacion`
--

CREATE TABLE `cat_organizacion` (
  `id_cat_organizacion` int(11) NOT NULL,
  `nombre_cat_organizacion` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion_cat_organizacion` varchar(256) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado_cat_organizacion` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cat_organizacion`
--

INSERT INTO `cat_organizacion` (`id_cat_organizacion`, `nombre_cat_organizacion`, `descripcion_cat_organizacion`, `estado_cat_organizacion`) VALUES
(1, 'Profesionales', 'Encargados del dictado de un determinado taller.', 1),
(2, 'Mantenimiento', NULL, 1),
(3, 'Comision Directiva', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuento`
--

CREATE TABLE `descuento` (
  `id_descuento` int(11) NOT NULL,
  `id_socio` int(11) NOT NULL,
  `valor_descuento` int(11) DEFAULT NULL,
  `fecha_inicio_descuento` date DEFAULT NULL,
  `fecha_fin_descuento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_egreso`
--

CREATE TABLE `detalle_egreso` (
  `id_detalle_egreso` int(11) NOT NULL,
  `id_egreso` int(11) NOT NULL,
  `importe_detalle_egreso` decimal(10,2) NOT NULL,
  `id_personal` int(11) DEFAULT NULL,
  `id_taller` int(11) DEFAULT NULL,
  `fecha_detalle_egreso` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ingreso`
--

CREATE TABLE `detalle_ingreso` (
  `id_detalle_ingreso` int(11) NOT NULL,
  `id_ingreso` int(11) NOT NULL,
  `importe_detalle_ingreso` decimal(10,2) DEFAULT NULL,
  `id_socio` int(11) DEFAULT NULL,
  `id_taller` int(11) DEFAULT NULL,
  `fecha_detalle_ingreso` date DEFAULT NULL,
  `id_administracion` int(11) DEFAULT NULL,
  `deuda_detalle_ingreso` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_taller`
--

CREATE TABLE `detalle_taller` (
  `id_detalle_taller` int(11) NOT NULL,
  `cuota_detalle_taller` decimal(10,2) DEFAULT NULL,
  `id_taller` int(11) NOT NULL,
  `cuota_detalle_taller_personal` decimal(10,2) DEFAULT NULL,
  `estado_detalle_taller` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_taller_personal`
--

CREATE TABLE `detalle_taller_personal` (
  `id_detalle_taller_personal` int(11) NOT NULL,
  `id_detalle_taller` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE `domicilio` (
  `id_domicilio` int(11) NOT NULL,
  `direccion_domicilio` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_provincia_domicilio` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre_localidad_domicilio` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `codigo_postal_domicilio` varchar(7) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_socio` int(11) NOT NULL,
  `estado_domicilio` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='		';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egreso`
--

CREATE TABLE `egreso` (
  `id_egreso` int(11) NOT NULL,
  `nombre_egreso` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion_egreso` varchar(256) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado_egreso` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `egreso`
--

INSERT INTO `egreso` (`id_egreso`, `nombre_egreso`, `descripcion_egreso`, `estado_egreso`) VALUES
(1, 'Pago Personal', 'Pago del personal que trabaja en la organizacion.', 1),
(2, 'Pago Profesional', 'Pago de un profesional de acuerdo al taller que pertenece.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia`
--

CREATE TABLE `familia` (
  `id_familia` int(11) NOT NULL,
  `nombre_padre_familia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre_madre_familia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre_tutor_familia` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono_familia` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `celular_familia` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `id_socio` int(11) NOT NULL,
  `estado_familia` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE `ingreso` (
  `id_ingreso` int(11) NOT NULL,
  `nombre_ingreso` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion_ingreso` varchar(256) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado_ingreso` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ingreso`
--

INSERT INTO `ingreso` (`id_ingreso`, `nombre_ingreso`, `descripcion_ingreso`, `estado_ingreso`) VALUES
(1, 'Cuota Organizacion', 'Cuota del socio correspondiente a la organizacion.', 1),
(2, 'Cuota Taller', 'Cuota de un determinado taller al que asista el socio.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE `institucion` (
  `id_institucion` int(11) NOT NULL,
  `nombre_institucion` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `domicilio_institucion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `grado_institucion` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_socio` int(11) NOT NULL,
  `estado_institucion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id_personal` int(11) NOT NULL,
  `nombre_personal` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido_personal` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_documento_personal` varchar(8) COLLATE utf8_spanish2_ci NOT NULL,
  `num_documento_personal` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono_personal` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `celular_personal` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `correo_personal` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `estado_personal` varchar(8) COLLATE utf8_spanish2_ci NOT NULL,
  `id_cat_organizacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_personal`, `nombre_personal`, `apellido_personal`, `tipo_documento_personal`, `num_documento_personal`, `telefono_personal`, `celular_personal`, `correo_personal`, `estado_personal`, `id_cat_organizacion`) VALUES
(1, 'Marcelo', 'Doz', 'CUIL', '20367745671', '3814216644', '3813887766', 'jhafsa', 'Activo', 3),
(2, 'Gonzalo', 'Aguirre', 'DNI', '37497664', '3814217848', '3813997793', 'jj', 'Activo', 2),
(3, 'David', 'Zamzaum', 'DNI', '33456789', '3814566789', '38140242655', 'lll', 'Activo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

CREATE TABLE `socio` (
  `id_socio` int(11) NOT NULL,
  `nombre_socio` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido_socio` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_de_nacimiento_socio` date NOT NULL,
  `tipo_documento_socio` varchar(8) COLLATE utf8_spanish2_ci NOT NULL,
  `num_documento_socio` int(11) NOT NULL,
  `estado_socio` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller`
--

CREATE TABLE `taller` (
  `id_taller` int(11) NOT NULL,
  `nombre_taller` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion_taller` varchar(256) COLLATE utf8_spanish2_ci NOT NULL,
  `estado_taller` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Gonzalo Aguirre', 'gonzaloa652@hotmail.com', '$2y$10$I8loZYi4d5I4TLEuty1PxeL3B65Zg78pjvDwn4bpImRMvevzj8DmS', '5K0atJlRBTN5TBzzUUvPtw7fdQcIG9Hw9C4mdlwM9qF6Ka4qKah7CPZH3ZcZ', '2019-03-07 17:41:53', '2019-03-07 17:41:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administracion`
--
ALTER TABLE `administracion`
  ADD PRIMARY KEY (`id_administracion`),
  ADD UNIQUE KEY `id_administracion_UNIQUE` (`id_administracion`),
  ADD KEY `fk_idsocio_socio_idx` (`id_socio`);

--
-- Indices de la tabla `cat_organizacion`
--
ALTER TABLE `cat_organizacion`
  ADD PRIMARY KEY (`id_cat_organizacion`);

--
-- Indices de la tabla `descuento`
--
ALTER TABLE `descuento`
  ADD PRIMARY KEY (`id_descuento`),
  ADD KEY `fk_descuento_socio_idx` (`id_socio`);

--
-- Indices de la tabla `detalle_egreso`
--
ALTER TABLE `detalle_egreso`
  ADD PRIMARY KEY (`id_detalle_egreso`),
  ADD KEY `fk_detalleegreso_egreso_idx` (`id_egreso`),
  ADD KEY `fk_detalleegreso_personal_idx` (`id_personal`),
  ADD KEY `fk_detalleegreso_taller_idx` (`id_taller`);

--
-- Indices de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD PRIMARY KEY (`id_detalle_ingreso`),
  ADD KEY `fk_detalleingreso_ingreso_idx` (`id_ingreso`),
  ADD KEY `fk_detalleingreso_socio_idx` (`id_socio`),
  ADD KEY `fk_detalleingreso_taller_idx` (`id_taller`),
  ADD KEY `fk_detalleingreso_administracion_idx` (`id_administracion`);

--
-- Indices de la tabla `detalle_taller`
--
ALTER TABLE `detalle_taller`
  ADD PRIMARY KEY (`id_detalle_taller`),
  ADD KEY `fk_detallertaller_taller_idx` (`id_taller`);

--
-- Indices de la tabla `detalle_taller_personal`
--
ALTER TABLE `detalle_taller_personal`
  ADD PRIMARY KEY (`id_detalle_taller_personal`),
  ADD KEY `fk_detalle_taller_has_personal_personal1_idx` (`id_personal`),
  ADD KEY `fk_detalle_taller_has_personal_detalle_taller1_idx` (`id_detalle_taller`);

--
-- Indices de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`id_domicilio`),
  ADD KEY `fk_localidad_socio_idx` (`id_socio`);

--
-- Indices de la tabla `egreso`
--
ALTER TABLE `egreso`
  ADD PRIMARY KEY (`id_egreso`);

--
-- Indices de la tabla `familia`
--
ALTER TABLE `familia`
  ADD PRIMARY KEY (`id_familia`),
  ADD KEY `fk_familiaries_socio_idx` (`id_socio`);

--
-- Indices de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`id_ingreso`);

--
-- Indices de la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`id_institucion`),
  ADD KEY `fk_colegio_socio_idx` (`id_socio`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_personal`),
  ADD KEY `fk_personal_catorganizacion_idx` (`id_cat_organizacion`);

--
-- Indices de la tabla `socio`
--
ALTER TABLE `socio`
  ADD PRIMARY KEY (`id_socio`);

--
-- Indices de la tabla `taller`
--
ALTER TABLE `taller`
  ADD PRIMARY KEY (`id_taller`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administracion`
--
ALTER TABLE `administracion`
  MODIFY `id_administracion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cat_organizacion`
--
ALTER TABLE `cat_organizacion`
  MODIFY `id_cat_organizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `descuento`
--
ALTER TABLE `descuento`
  MODIFY `id_descuento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detalle_egreso`
--
ALTER TABLE `detalle_egreso`
  MODIFY `id_detalle_egreso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  MODIFY `id_detalle_ingreso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detalle_taller`
--
ALTER TABLE `detalle_taller`
  MODIFY `id_detalle_taller` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detalle_taller_personal`
--
ALTER TABLE `detalle_taller_personal`
  MODIFY `id_detalle_taller_personal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `id_domicilio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `egreso`
--
ALTER TABLE `egreso`
  MODIFY `id_egreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `familia`
--
ALTER TABLE `familia`
  MODIFY `id_familia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `id_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `institucion`
--
ALTER TABLE `institucion`
  MODIFY `id_institucion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `socio`
--
ALTER TABLE `socio`
  MODIFY `id_socio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `taller`
--
ALTER TABLE `taller`
  MODIFY `id_taller` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administracion`
--
ALTER TABLE `administracion`
  ADD CONSTRAINT `fk_administracion_socio` FOREIGN KEY (`id_socio`) REFERENCES `socio` (`id_socio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `descuento`
--
ALTER TABLE `descuento`
  ADD CONSTRAINT `fk_descuento_socio` FOREIGN KEY (`id_socio`) REFERENCES `socio` (`id_socio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_egreso`
--
ALTER TABLE `detalle_egreso`
  ADD CONSTRAINT `fk_detalleegreso_egreso` FOREIGN KEY (`id_egreso`) REFERENCES `egreso` (`id_egreso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalleegreso_personal` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalleegreso_taller` FOREIGN KEY (`id_taller`) REFERENCES `taller` (`id_taller`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD CONSTRAINT `fk_detalleingreso_administracion` FOREIGN KEY (`id_administracion`) REFERENCES `administracion` (`id_administracion`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalleingreso_ingreso` FOREIGN KEY (`id_ingreso`) REFERENCES `ingreso` (`id_ingreso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalleingreso_socio` FOREIGN KEY (`id_socio`) REFERENCES `socio` (`id_socio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalleingreso_taller` FOREIGN KEY (`id_taller`) REFERENCES `taller` (`id_taller`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_taller`
--
ALTER TABLE `detalle_taller`
  ADD CONSTRAINT `fk_detallertaller_taller` FOREIGN KEY (`id_taller`) REFERENCES `taller` (`id_taller`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_taller_personal`
--
ALTER TABLE `detalle_taller_personal`
  ADD CONSTRAINT `fk_detalle_taller_has_personal_detalle_taller1` FOREIGN KEY (`id_detalle_taller`) REFERENCES `detalle_taller` (`id_detalle_taller`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_taller_has_personal_personal1` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD CONSTRAINT `fk_localidad_socio` FOREIGN KEY (`id_socio`) REFERENCES `socio` (`id_socio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `familia`
--
ALTER TABLE `familia`
  ADD CONSTRAINT `fk_familiaries_socio` FOREIGN KEY (`id_socio`) REFERENCES `socio` (`id_socio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD CONSTRAINT `fk_colegio_socio` FOREIGN KEY (`id_socio`) REFERENCES `socio` (`id_socio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `fk_personal_catorganizacion` FOREIGN KEY (`id_cat_organizacion`) REFERENCES `cat_organizacion` (`id_cat_organizacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
