-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-04-2020 a las 08:28:23
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `historiausuario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_actividad` int(11) NOT NULL,
  `actividad` varchar(50) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
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
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

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
(1, 'CB78620-1', '2020-04-13', '01:36:43 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(2, 'CB10703-2', '2020-04-13', '01:36:51 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(3, 'CB43597-3', '2020-04-13', '01:38:47 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(4, 'CB53971-4', '2020-04-13', '01:39:20 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(5, 'CB99203-5', '2020-04-13', '01:40:32 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(6, 'CB27606-6', '2020-04-13', '01:41:08 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(7, 'CB83081-7', '2020-04-13', '01:41:17 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(8, 'CB81186-8', '2020-04-13', '01:41:50 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(9, 'CB63012-9', '2020-04-13', '01:42:44 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(10, 'CB51076-10', '2020-04-13', '01:42:56 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(11, 'CB58010-11', '2020-04-13', '01:43:44 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(12, 'CB75946-12', '2020-04-13', '01:44:25 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(13, 'CB70667-13', '2020-04-13', '01:44:44 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(14, 'CB78321-14', '2020-04-13', '01:44:51 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(15, 'CB41923-15', '2020-04-13', '01:45:29 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(16, 'CB87382-16', '2020-04-13', '01:45:36 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(17, 'CB91446-17', '2020-04-13', '01:45:58 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(18, 'CB67269-18', '2020-04-13', '01:46:04 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(19, 'CB42056-19', '2020-04-13', '01:46:27 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(20, 'CB19376-20', '2020-04-13', '01:46:34 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(21, 'CB08577-21', '2020-04-13', '01:47:04 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(22, 'CB32786-22', '2020-04-13', '01:47:53 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(23, 'CB35816-23', '2020-04-13', '01:49:39 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(24, 'CB21736-24', '2020-04-13', '01:49:48 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(25, 'CB47956-25', '2020-04-13', '01:50:02 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(26, 'CB57851-26', '2020-04-13', '01:50:07 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(27, 'CB20148-27', '2020-04-13', '01:50:27 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(28, 'CB43187-28', '2020-04-13', '01:52:33 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(29, 'CB36488-29', '2020-04-13', '01:52:51 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(30, 'CB71613-30', '2020-04-13', '01:54:31 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(31, 'CB91686-31', '2020-04-13', '01:56:14 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(32, 'CB02115-32', '2020-04-13', '01:57:03 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(33, 'CB53220-33', '2020-04-13', '01:57:08 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(34, 'CB57163-34', '2020-04-13', '01:57:23 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(35, 'CB07205-35', '2020-04-13', '01:57:29 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(36, 'CB73755-36', '2020-04-13', '01:58:10 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(37, 'CB00798-37', '2020-04-13', '01:58:35 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(38, 'CB00806-38', '2020-04-13', '01:58:41 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(39, 'CB09127-39', '2020-04-13', '02:00:39 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(40, 'CB55102-40', '2020-04-13', '02:02:26 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(41, 'CB72007-41', '2020-04-13', '02:22:30 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(42, 'CB54643-42', '2020-04-13', '02:24:54 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(43, 'CB94987-43', '2020-04-13', '02:59:46 pm', '03:00:11 pm', 'Administrador', 2020, 'LM93499-1'),
(44, 'CB27322-44', '2020-04-13', '03:07:17 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(45, 'CB13488-45', '2020-04-13', '03:10:08 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(46, 'CB10274-46', '2020-04-13', '03:10:19 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(47, 'CB89403-47', '2020-04-13', '03:50:07 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(48, 'CB64536-48', '2020-04-13', '03:55:14 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(49, 'CB17417-49', '2020-04-13', '03:55:38 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(50, 'CB65423-50', '2020-04-13', '03:57:55 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(51, 'CB58911-51', '2020-04-13', '04:00:05 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(52, 'CB11076-52', '2020-04-13', '04:01:48 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(56, 'CB19379-56', '2020-04-13', '04:17:40 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(57, 'CB35266-57', '2020-04-13', '04:19:38 pm', '04:41:04 pm', 'Administrador', 2020, 'LM93499-1'),
(58, 'CB83391-58', '2020-04-13', '04:41:11 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(59, 'CB25503-59', '2020-04-13', '04:46:34 pm', '04:47:39 pm', 'Administrador', 2020, 'LM93499-1'),
(60, 'CB62375-60', '2020-04-13', '04:47:45 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(61, 'CB28003-61', '2020-04-13', '04:54:29 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(62, 'CB46710-62', '2020-04-13', '04:56:40 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(63, 'CB57005-63', '2020-04-13', '04:57:44 pm', '04:58:59 pm', 'Administrador', 2020, 'LM93499-1'),
(64, 'CB25897-64', '2020-04-13', '04:59:15 pm', '05:07:55 pm', 'Administrador', 2020, 'LM93499-1'),
(65, 'CB54017-65', '2020-04-13', '05:08:01 pm', '05:28:08 pm', 'Administrador', 2020, 'LM93499-1'),
(67, 'CB27763-67', '2020-04-13', '11:39:13 pm', '11:40:00 pm', 'Administrador', 2020, 'LM93499-1'),
(70, 'CB86827-70', '2020-04-14', '12:15:06 am', '12:52:42 am', 'Administrador', 2020, 'LM93499-1'),
(72, 'CB10822-72', '2020-04-14', '12:59:50 am', '01:07:30 am', 'Administrador', 2020, 'LM93499-1'),
(73, 'CB61268-73', '2020-04-14', '01:10:19 am', '01:13:03 am', 'Administrador', 2020, 'LM93499-1'),
(75, 'CB13475-75', '2020-04-14', '06:02:06 am', '06:02:33 am', 'Administrador', 2020, 'LM93499-1'),
(77, 'CB12297-77', '2020-04-22', '11:06:13 pm', '11:08:59 pm', 'Administrador', 2020, 'LM93499-1'),
(79, 'CB15837-78', '2020-04-22', '11:56:07 pm', '11:57:16 pm', 'Administrador', 2020, 'LM93499-1'),
(81, 'CB41957-80', '2020-04-23', '12:27:55 am', '12:30:04 am', 'Administrador', 2020, 'LM93499-1'),
(82, 'CB11258-71', '2020-04-23', '12:30:10 am', '12:39:25 am', 'Administrador', 2020, 'LM93499-1'),
(83, 'CB41772-72', '2020-04-23', '12:39:32 am', '12:48:18 am', 'Docente', 2020, 'LM11092-3'),
(84, 'CB12275-73', '2020-04-23', '12:48:26 am', '12:48:41 am', 'Docente', 2020, 'LM73754-5'),
(85, 'CB34361-74', '2020-04-23', '12:48:50 am', '12:48:59 am', 'Docente', 2020, 'LM73754-5'),
(86, 'CB72888-75', '2020-04-23', '12:49:09 am', 'Sin registro', 'Estudiante', 2020, 'LM55041-4'),
(87, 'CB60189-76', '2020-04-23', '12:50:18 am', '12:50:29 am', 'Estudiante', 2020, 'LM55041-4'),
(88, 'CB56744-77', '2020-04-23', '01:01:39 am', '01:08:19 am', 'Administrador', 2020, 'LM93499-1'),
(89, 'CB49198-78', '2020-04-23', '01:08:27 am', '01:13:41 am', 'Docente', 2020, 'LM11092-3'),
(90, 'CB24803-79', '2020-04-23', '01:13:51 am', '01:26:42 am', 'Estudiante', 2020, 'LM55041-4');

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
(1, 'LM93499-1', 'admin', 'VlVwVnBIejltRGhKbEI0dEl0bVRMQT09', 'admin@gmail.com', 'Activo', 1, 'Masculino', 'Male3Avatar.png'),
(9, 'LM88509-2', 'leonel', 'eVJEdTBjaDFjWVZWdjJmV01BcHJWZz09', 'leonel@gmail.com', 'Activo', 1, 'Masculino', 'Male3Avatar.png'),
(10, 'LM11092-3', 'docente', 'RUprTG9vR2t6amYxQlZkUVE3aWtEQT09', 'docente@gmail.com', 'Activo', 2, 'Femenino', 'Female2Avatar.png'),
(11, 'LM55041-4', 'estudiante', 'bTBHdTZLVnVxemlzNkdqKzIvbnJ5Zz09', 'estudiante@gmail.com', 'Activo', 3, 'Femenino', 'Female2Avatar.png'),
(12, 'LM73754-5', 'jorge', 'cU5LRDI2NEFQWk5Nb3R5TXVoL3p5Zz09', 'jorge@gmail.com', 'Activo', 2, 'Masculino', 'Male3Avatar.png'),
(13, 'LM63637-6', 'jonathan', 'ZWk4a1FmNjFsU0VxbkxJSVJHeWZnQT09', 'jonathan@gmail.com', 'Activo', 3, 'Masculino', 'Male3Avatar.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta_equipo`
--

CREATE TABLE `cuenta_equipo` (
  `id_equipo_usuario` int(11) NOT NULL,
  `CuentaCodigo` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_equipo` int(11) NOT NULL,
  `equipo` varchar(20) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

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
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fuente`
--

CREATE TABLE `fuente` (
  `id_fuente` int(11) NOT NULL,
  `url` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `id_metodologia` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia`
--

CREATE TABLE `historia` (
  `id_historia` int(11) NOT NULL,
  `documento` varchar(200) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodologia`
--

CREATE TABLE `metodologia` (
  `id_metodologia` int(11) NOT NULL,
  `metodologia` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `metodologia`
--

INSERT INTO `metodologia` (`id_metodologia`, `metodologia`, `descripcion`, `created`, `modified`) VALUES
(1, 'Pert', 'Pert es una de las metodologías para la gestión de proyectos más utilizadas, en especial porque suele actuar como complemento de CPM y del Diagrama de Gantt.', '2020-04-01 21:32:12', '2020-04-02 04:08:21');

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
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
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
  `PersonaPrivilegio` varchar(30) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `PersonaDNI`, `PersonaNombre`, `PersonaApellido`, `PersonaTelefono`, `PersonaDireccion`, `CuentaCodigo`, `PersonaPrivilegio`) VALUES
(1, '00447711', 'Super', 'ADMINISTRADOR', '2481139051', 'MEXICO', 'LM93499-1', 'Administrador'),
(9, '8978967968', 'Leonel', 'MEDEL', '987897897', 'PUEBLA, MEXICO', 'LM88509-2', 'Administrador'),
(10, '987987899', 'docente', 'PRINCIPAL', '89789689', 'MEXICO', 'LM11092-3', 'Docente'),
(11, '798789798', 'Estudiante', 'ESCOLAR', '98797897', 'COLOMBIA', 'LM55041-4', 'Estudiante'),
(12, '89789798', 'Jorge', 'CHAVEZ', '89678676576', 'BUCARAMANGA', 'LM73754-5', 'Docente'),
(13, '897878678', 'Jonathan', 'ACUÑA', '8978687687', 'BUCARAMANGA, COLOMBIA', 'LM63637-6', 'Estudiante');

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
(5, 'Primer proyecto del docente principal', '2020-04-20', '2020-04-22', 'LM11092-3', '2020-04-23', '2020-04-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `inicio` date NOT NULL,
  `fin` date NOT NULL,
  `cuentaCreador` varchar(30) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `titulo`, `inicio`, `fin`, `cuentaCreador`) VALUES
(4, 'prueba fechas', '2020-04-20', '2020-04-21', 'LM47586-3'),
(5, 'Proyecto de Jorge Chavez A', '2020-04-21', '2020-05-28', 'LM84314-4'),
(6, 'Creado por Chavez', '2020-04-20', '2020-04-30', 'LM47586-3'),
(7, 'creado por leo', '2020-04-20', '2020-04-21', 'LM64652-7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_metodologia`
--

CREATE TABLE `proyecto_metodologia` (
  `id_proyecto_metodologia` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `id_metodologia` int(11) NOT NULL,
  `objetivo` varchar(200) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `id_recurso` int(11) NOT NULL,
  `recurso` varchar(50) NOT NULL,
  `cantidad` float(10,2) NOT NULL,
  `precio` float(10,2) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `id_tipo_recurso` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable`
--

CREATE TABLE `responsable` (
  `id_responsable` int(11) NOT NULL,
  `CuentaCodigo` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
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
(1, 'administrador', '2020-03-27 10:37:02', '0000-00-00 00:00:00'),
(2, 'maestro', '2020-03-27 17:46:19', NULL),
(3, 'alumno', '2020-04-12 13:32:41', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_recurso`
--

CREATE TABLE `tipo_recurso` (
  `id_tipo_recurso` int(11) NOT NULL,
  `descripcion_recurso` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
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
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `id_asignacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `cuenta_equipo`
--
ALTER TABLE `cuenta_equipo`
  MODIFY `id_equipo_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fases`
--
ALTER TABLE `fases`
  MODIFY `id_fase` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historia`
--
ALTER TABLE `historia`
  MODIFY `id_historia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `metodologia`
--
ALTER TABLE `metodologia`
  MODIFY `id_metodologia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `proyecto_metodologia`
--
ALTER TABLE `proyecto_metodologia`
  MODIFY `id_proyecto_metodologia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id_recurso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `responsable`
--
ALTER TABLE `responsable`
  MODIFY `id_responsable` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_recurso`
--
ALTER TABLE `tipo_recurso`
  MODIFY `id_tipo_recurso` int(11) NOT NULL AUTO_INCREMENT;

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
