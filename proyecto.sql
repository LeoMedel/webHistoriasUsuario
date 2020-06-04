-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 04-06-2020 a las 04:25:56
-- Versión del servidor: 10.3.15-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_actividad` int(11) NOT NULL,
  `actividad` varchar(50) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `id_asignacion` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `cuentaCreador` varchar(30) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `asignacion`
--

INSERT INTO `asignacion` (`id_asignacion`, `id_proyecto`, `id_equipo`, `id_estado`, `cuentaCreador`, `created`, `modified`) VALUES
(15, 11, 13, 1, 'LM81613-3', '2020-06-03 20:52:51', '2020-06-03 20:52:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id` int(10) NOT NULL,
  `BitacoraCodigo` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `BitacoraFecha` date NOT NULL,
  `BitacoraHoraInicio` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `BitacoraHoraFinal` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `BitacoraTipo` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `BitacoraYear` int(5) NOT NULL,
  `CuentaCodigo` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id`, `BitacoraCodigo`, `BitacoraFecha`, `BitacoraHoraInicio`, `BitacoraHoraFinal`, `BitacoraTipo`, `BitacoraYear`, `CuentaCodigo`) VALUES
(470, 'CB17310-1', '2020-06-03', '08:55:30 pm', '08:55:33 pm', 'Administrador', 2020, 'LM93499-1'),
(471, 'CB27483-2', '2020-06-03', '09:23:32 pm', '09:23:47 pm', 'Administrador', 2020, 'LM93499-1'),
(472, 'CB87524-3', '2020-06-03', '09:24:19 pm', '09:24:38 pm', 'Docente', 2020, 'LM81613-3'),
(473, 'CB04519-4', '2020-06-03', '09:24:49 pm', '09:24:53 pm', 'Estudiante', 2020, 'LM00867-6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `id` int(11) NOT NULL,
  `CuentaCodigo` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `CuentaUsuario` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `CuentaClave` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `CuentaEmail` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `CuentaEstado` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `CuentaRol` int(11) NOT NULL,
  `CuentaGenero` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `CuentaFoto` varchar(20) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`id`, `CuentaCodigo`, `CuentaUsuario`, `CuentaClave`, `CuentaEmail`, `CuentaEstado`, `CuentaRol`, `CuentaGenero`, `CuentaFoto`) VALUES
(1, 'LM93499-1', 'admin', 'VlVwVnBIejltRGhKbEI0dEl0bVRMQT09', 'admin@gmail.com', 'Activo', 1, 'Masculino', 'adminHombre.png'),
(17, 'LM87917-6', 'leo', 'NnF1dEQ3dXlXYk5BMHpNclVuQWtHQT09', 'leo@gmail.com', 'Activo', 1, 'Masculino', 'adminHombre.png'),
(52, 'LM81613-3', 'docente', 'RUprTG9vR2t6amYxQlZkUVE3aWtEQT09', 'docente@udi.edu.co', 'Activo', 2, 'Femenino', 'docenteMujer.png'),
(53, 'LM28903-4', 'estudiante1', 'WW9RZkNQeEhsTkFYUzMrR1didExPdz09', 'estudiante1@udi.edu.co', 'Activo', 3, 'Masculino', 'estudianteHombre.png'),
(54, 'LM96368-5', 'estudiante2', 'dUFFMklaT0doNHJMaHJmRHhVaEdwUT09', 'estudiante2@udi.edu.co', 'Activo', 3, 'Femenino', 'estudianteMujer.png'),
(55, 'LM00867-6', 'estudiante3', 'azlYRUZjM0NuMWdKck1wZkxIQmtTUT09', 'estudiante3@udi.edu.co', 'Activo', 3, 'Masculino', 'estudianteHombre.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta_equipo`
--

CREATE TABLE `cuenta_equipo` (
  `id_equipo_usuario` int(11) NOT NULL,
  `CuentaCodigo` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `cuentaCreador` varchar(30) NOT NULL,
  `created` date NOT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `cuenta_equipo`
--

INSERT INTO `cuenta_equipo` (`id_equipo_usuario`, `CuentaCodigo`, `id_equipo`, `cuentaCreador`, `created`, `modified`) VALUES
(39, 'LM28903-4', 13, 'LM81613-3', '2020-06-03', '2020-06-03'),
(40, 'LM96368-5', 13, 'LM81613-3', '2020-06-03', '2020-06-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_equipo` int(11) NOT NULL,
  `equipo` varchar(20) NOT NULL,
  `cuentaCreador` varchar(40) NOT NULL,
  `created` date NOT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id_equipo`, `equipo`, `cuentaCreador`, `created`, `modified`) VALUES
(13, 'Equipo UNO', 'LM81613-3', '2020-06-03', '2020-06-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `estado`, `created`, `modified`) VALUES
(1, 'Correcto', '2020-05-03 20:06:00', '2020-05-03 20:06:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fases`
--

CREATE TABLE `fases` (
  `id_fase` int(11) NOT NULL,
  `fase` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `objetivo` varchar(200) NOT NULL,
  `id_metodologia` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fuente`
--

CREATE TABLE `fuente` (
  `id_fuente` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `id_metodologia` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia`
--

CREATE TABLE `historia` (
  `id_historia` int(11) NOT NULL,
  `documento` varchar(200) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodologia`
--

CREATE TABLE `metodologia` (
  `id_metodologia` int(11) NOT NULL,
  `metodologia` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `cuentaCreador` varchar(30) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `metodologia`
--

INSERT INTO `metodologia` (`id_metodologia`, `metodologia`, `descripcion`, `cuentaCreador`, `created`, `modified`) VALUES
(10, 'Metodologia XP', 'Metodologia para el desarrollo de Software', 'LM81613-3', '2020-06-03 20:50:38', '2020-06-03 20:50:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `id_modulo` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `observacion` varchar(200) NOT NULL,
  `id_fase` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones`
--

CREATE TABLE `observaciones` (
  `id_observacion` int(11) NOT NULL,
  `id_fase` int(11) NOT NULL,
  `observacion` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(10) NOT NULL,
  `PersonaDNI` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `PersonaNombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `PersonaApellido` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `PersonaTelefono` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `PersonaDireccion` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `CuentaCodigo` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `PersonaPrivilegio` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Salon` varchar(30) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `PersonaDNI`, `PersonaNombre`, `PersonaApellido`, `PersonaTelefono`, `PersonaDireccion`, `CuentaCodigo`, `PersonaPrivilegio`, `Salon`) VALUES
(1, '00447711', 'Super', 'ADMINISTRADOR', '2481139051', 'MEXICO', 'LM93499-1', 'Administrador', '7'),
(17, '8767', 'Leonel', 'MEDEL', '68768768', 'Calle 11A', 'LM87917-6', 'Administrador', '7'),
(49, '98789798', 'Docente', 'PRINCIPAL', '6876786', 'Calle 1', 'LM81613-3', 'Docente', '6'),
(50, '98798798', 'Estudiante', 'Numero UNO', '987987987', 'Calle 123', 'LM28903-4', 'Estudiante', '6'),
(51, '675765', 'Estudiante', 'Numero DOS', '7687657', 'Calle 1234', 'LM96368-5', 'Estudiante', '6'),
(52, '768979089', 'Estudiante', 'Numero TRES', '9789687564', 'Calle 12345', 'LM00867-6', 'Estudiante', '6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `id_proyecto` int(11) NOT NULL,
  `titulo` varchar(70) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `cuentaCreador` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `created` date NOT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id_proyecto`, `titulo`, `fecha_inicio`, `fecha_fin`, `cuentaCreador`, `created`, `modified`) VALUES
(11, 'Proyecto Principal', '2020-06-03', '2020-06-20', 'LM81613-3', '2020-06-03', '2020-06-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_metodologia`
--

CREATE TABLE `proyecto_metodologia` (
  `id_proyecto_metodologia` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `id_metodologia` int(11) NOT NULL,
  `objetivo` varchar(200) NOT NULL,
  `cuentaCreador` varchar(30) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `proyecto_metodologia`
--

INSERT INTO `proyecto_metodologia` (`id_proyecto_metodologia`, `id_proyecto`, `id_metodologia`, `objetivo`, `cuentaCreador`, `created`, `modified`) VALUES
(16, 11, 10, 'Relacionar el proyecto y la metodologia', 'LM81613-3', '2020-06-03 20:52:30', '2020-06-03 20:52:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `id_recurso` int(11) NOT NULL,
  `recurso` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float(10,2) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `id_tipo_recurso` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable`
--

CREATE TABLE `responsable` (
  `id_responsable` int(11) NOT NULL,
  `CuentaCodigo` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`, `created`, `modified`) VALUES
(1, 'Administrador', '2020-03-27 10:37:02', '0000-00-00 00:00:00'),
(2, 'Docente', '2020-03-27 17:46:19', NULL),
(3, 'Estudiante', '2020-04-12 13:32:41', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salon`
--

CREATE TABLE `salon` (
  `id_salon` int(11) NOT NULL,
  `Salon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `salon`
--

INSERT INTO `salon` (`id_salon`, `Salon`) VALUES
(4, 'Sin salon'),
(6, '4A'),
(7, 'N/A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_recurso`
--

CREATE TABLE `tipo_recurso` (
  `id_tipo_recurso` int(11) NOT NULL,
  `descripcion_recurso` varchar(100) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividad`),
  ADD KEY `id_modulo` (`id_modulo`);

--
-- Indices de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD PRIMARY KEY (`id_asignacion`),
  ADD KEY `id_equipo` (`id_equipo`),
  ADD KEY `id_proyecto` (`id_proyecto`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CuentaCodigo` (`CuentaCodigo`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CuentaCodigo` (`CuentaCodigo`),
  ADD KEY `CuentaRol` (`CuentaRol`);

--
-- Indices de la tabla `cuenta_equipo`
--
ALTER TABLE `cuenta_equipo`
  ADD PRIMARY KEY (`id_equipo_usuario`),
  ADD KEY `usuario_equipo_ibfk_1` (`id_equipo`),
  ADD KEY `CuentaCodigo` (`CuentaCodigo`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `fases`
--
ALTER TABLE `fases`
  ADD PRIMARY KEY (`id_fase`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_metodologia` (`id_metodologia`);

--
-- Indices de la tabla `fuente`
--
ALTER TABLE `fuente`
  ADD PRIMARY KEY (`id_fuente`),
  ADD KEY `id_metodologia` (`id_metodologia`);

--
-- Indices de la tabla `historia`
--
ALTER TABLE `historia`
  ADD PRIMARY KEY (`id_historia`),
  ADD KEY `id_actividad` (`id_actividad`);

--
-- Indices de la tabla `metodologia`
--
ALTER TABLE `metodologia`
  ADD PRIMARY KEY (`id_metodologia`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id_modulo`),
  ADD KEY `id_fase` (`id_fase`);

--
-- Indices de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD PRIMARY KEY (`id_observacion`),
  ADD KEY `id_fase` (`id_fase`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CuentaCodigo` (`CuentaCodigo`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id_proyecto`);

--
-- Indices de la tabla `proyecto_metodologia`
--
ALTER TABLE `proyecto_metodologia`
  ADD PRIMARY KEY (`id_proyecto_metodologia`),
  ADD KEY `id_proyecto` (`id_proyecto`),
  ADD KEY `id_metodologia` (`id_metodologia`);

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id_recurso`),
  ADD KEY `id_actividad` (`id_actividad`),
  ADD KEY `id_tipo_recurso` (`id_tipo_recurso`);

--
-- Indices de la tabla `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`id_responsable`),
  ADD KEY `id_actividad` (`id_actividad`),
  ADD KEY `CuentaCodigo` (`CuentaCodigo`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `salon`
--
ALTER TABLE `salon`
  ADD PRIMARY KEY (`id_salon`);

--
-- Indices de la tabla `tipo_recurso`
--
ALTER TABLE `tipo_recurso`
  ADD PRIMARY KEY (`id_tipo_recurso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `id_asignacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=474;

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `cuenta_equipo`
--
ALTER TABLE `cuenta_equipo`
  MODIFY `id_equipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fases`
--
ALTER TABLE `fases`
  MODIFY `id_fase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `fuente`
--
ALTER TABLE `fuente`
  MODIFY `id_fuente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `historia`
--
ALTER TABLE `historia`
  MODIFY `id_historia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `metodologia`
--
ALTER TABLE `metodologia`
  MODIFY `id_metodologia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `proyecto_metodologia`
--
ALTER TABLE `proyecto_metodologia`
  MODIFY `id_proyecto_metodologia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id_recurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `responsable`
--
ALTER TABLE `responsable`
  MODIFY `id_responsable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `salon`
--
ALTER TABLE `salon`
  MODIFY `id_salon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo_recurso`
--
ALTER TABLE `tipo_recurso`
  MODIFY `id_tipo_recurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`id_modulo`) REFERENCES `modulo` (`id_modulo`);

--
-- Filtros para la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD CONSTRAINT `asignacion_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`),
  ADD CONSTRAINT `asignacion_ibfk_2` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`),
  ADD CONSTRAINT `asignacion_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `bitacora_ibfk_1` FOREIGN KEY (`CuentaCodigo`) REFERENCES `cuenta` (`CuentaCodigo`);

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `cuenta_ibfk_1` FOREIGN KEY (`CuentaRol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `cuenta_equipo`
--
ALTER TABLE `cuenta_equipo`
  ADD CONSTRAINT `cuenta_equipo_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`),
  ADD CONSTRAINT `cuenta_equipo_ibfk_2` FOREIGN KEY (`CuentaCodigo`) REFERENCES `cuenta` (`CuentaCodigo`);

--
-- Filtros para la tabla `fases`
--
ALTER TABLE `fases`
  ADD CONSTRAINT `fases_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `fases_ibfk_2` FOREIGN KEY (`id_metodologia`) REFERENCES `metodologia` (`id_metodologia`);

--
-- Filtros para la tabla `fuente`
--
ALTER TABLE `fuente`
  ADD CONSTRAINT `fuente_ibfk_1` FOREIGN KEY (`id_metodologia`) REFERENCES `metodologia` (`id_metodologia`);

--
-- Filtros para la tabla `historia`
--
ALTER TABLE `historia`
  ADD CONSTRAINT `historia_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividad`);

--
-- Filtros para la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD CONSTRAINT `modulo_ibfk_1` FOREIGN KEY (`id_fase`) REFERENCES `fases` (`id_fase`);

--
-- Filtros para la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD CONSTRAINT `observaciones_ibfk_1` FOREIGN KEY (`id_fase`) REFERENCES `fases` (`id_fase`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`CuentaCodigo`) REFERENCES `cuenta` (`CuentaCodigo`);

--
-- Filtros para la tabla `proyecto_metodologia`
--
ALTER TABLE `proyecto_metodologia`
  ADD CONSTRAINT `proyecto_metodologia_ibfk_1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`),
  ADD CONSTRAINT `proyecto_metodologia_ibfk_2` FOREIGN KEY (`id_metodologia`) REFERENCES `metodologia` (`id_metodologia`);

--
-- Filtros para la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD CONSTRAINT `recursos_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividad`),
  ADD CONSTRAINT `recursos_ibfk_2` FOREIGN KEY (`id_tipo_recurso`) REFERENCES `tipo_recurso` (`id_tipo_recurso`);

--
-- Filtros para la tabla `responsable`
--
ALTER TABLE `responsable`
  ADD CONSTRAINT `responsable_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividad`),
  ADD CONSTRAINT `responsable_ibfk_2` FOREIGN KEY (`CuentaCodigo`) REFERENCES `cuenta` (`CuentaCodigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
