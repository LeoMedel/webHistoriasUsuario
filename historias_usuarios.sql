-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-04-2020 a las 03:34:12
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
-- Base de datos: `historias_usuarios`
--

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
(67, 'CB81590-67', '2020-04-13', '05:30:20 pm', '05:30:36 pm', 'Administrador', 2020, 'LM93499-1'),
(69, 'CB07686-69', '2020-04-13', '05:31:08 pm', '05:32:37 pm', 'Administrador', 2020, 'LM93499-1'),
(71, 'CB15343-71', '2020-04-13', '05:32:59 pm', '05:42:19 pm', 'Administrador', 2020, 'LM93499-1'),
(73, 'CB91072-73', '2020-04-13', '05:43:14 pm', '06:13:34 pm', 'Administrador', 2020, 'LM93499-1'),
(74, 'CB49573-67', '2020-04-13', '06:13:43 pm', '06:16:20 pm', 'Docente', 2020, 'LM47586-3'),
(75, 'CB00174-68', '2020-04-13', '06:18:37 pm', '06:18:57 pm', 'Docente', 2020, 'LM47586-3'),
(76, 'CB79913-69', '2020-04-13', '06:19:02 pm', '06:22:12 pm', 'Administrador', 2020, 'LM93499-1'),
(77, 'CB98485-70', '2020-04-13', '06:22:21 pm', '06:22:29 pm', 'Docente', 2020, 'LM84314-4'),
(78, 'CB08155-71', '2020-04-13', '06:22:51 pm', '06:26:12 pm', 'Administrador', 2020, 'LM93499-1'),
(79, 'CB51497-72', '2020-04-13', '06:26:22 pm', '06:26:26 pm', 'Administrador', 2020, 'LM75472-6'),
(80, 'CB86976-73', '2020-04-13', '06:28:23 pm', '06:33:32 pm', 'Estudiante', 2020, 'LM75472-6'),
(81, 'CB93551-74', '2020-04-13', '06:34:05 pm', '06:37:10 pm', 'Docente', 2020, 'LM47586-3'),
(82, 'CB33013-75', '2020-04-13', '06:39:58 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(83, 'CB10055-76', '2020-04-13', '06:47:23 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(84, 'CB05791-77', '2020-04-13', '06:52:37 pm', '07:03:13 pm', 'Administrador', 2020, 'LM93499-1'),
(85, 'CB02422-78', '2020-04-13', '07:03:20 pm', '07:03:42 pm', 'Docente', 2020, 'LM47586-3'),
(86, 'CB48790-79', '2020-04-13', '07:03:53 pm', '07:05:56 pm', 'Estudiante', 2020, 'LM75472-6'),
(87, 'CB81240-80', '2020-04-13', '07:06:07 pm', '07:06:34 pm', 'Docente', 2020, 'LM84314-4'),
(88, 'CB89832-81', '2020-04-13', '07:06:40 pm', '07:07:15 pm', 'Administrador', 2020, 'LM93499-1'),
(89, 'CB90390-82', '2020-04-13', '07:07:27 pm', '07:10:03 pm', 'Docente', 2020, 'LM84314-4'),
(90, 'CB54050-83', '2020-04-20', '09:01:17 am', '09:01:33 am', 'Administrador', 2020, 'LM93499-1'),
(91, 'CB97161-84', '2020-04-20', '09:01:57 am', 'Sin registro', 'Docente', 2020, 'LM47586-3'),
(92, 'CB44196-85', '2020-04-20', '09:02:24 am', 'Sin registro', 'Docente', 2020, 'LM47586-3'),
(93, 'CB40107-86', '2020-04-20', '09:02:34 am', '10:35:56 am', 'Docente', 2020, 'LM47586-3'),
(94, 'CB12722-87', '2020-04-20', '10:36:07 am', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(95, 'CB87875-88', '2020-04-20', '10:36:28 am', '10:36:40 am', 'Administrador', 2020, 'LM93499-1'),
(96, 'CB27025-89', '2020-04-20', '10:36:46 am', '01:22:17 pm', 'Docente', 2020, 'LM47586-3'),
(97, 'CB31261-90', '2020-04-20', '01:47:55 pm', '02:14:43 pm', 'Administrador', 2020, 'LM93499-1'),
(98, 'CB31612-91', '2020-04-20', '02:14:51 pm', '02:14:59 pm', 'Estudiante', 2020, 'LM75472-6'),
(99, 'CB98478-92', '2020-04-20', '02:15:04 pm', '02:18:20 pm', 'Administrador', 2020, 'LM93499-1'),
(100, 'CB79164-93', '2020-04-20', '02:18:24 pm', 'Sin registro', 'Estudiante', 2020, 'LM44211-7'),
(101, 'CB86153-94', '2020-04-20', '02:19:14 pm', '02:19:19 pm', 'Docente', 2020, 'LM47586-3'),
(102, 'CB76255-95', '2020-04-20', '02:19:25 pm', '02:19:29 pm', 'Docente', 2020, 'LM84314-4'),
(103, 'CB45398-96', '2020-04-20', '02:19:39 pm', '02:19:54 pm', 'Docente', 2020, 'LM84314-4'),
(104, 'CB88477-97', '2020-04-20', '02:49:22 pm', '02:49:44 pm', 'Docente', 2020, 'LM47586-3'),
(105, 'CB14465-98', '2020-04-20', '02:50:07 pm', '02:50:21 pm', 'Docente', 2020, 'LM84314-4'),
(106, 'CB68240-99', '2020-04-20', '03:01:32 pm', '03:06:35 pm', 'Docente', 2020, 'LM47586-3'),
(107, 'CB78561-100', '2020-04-20', '03:06:42 pm', '03:06:52 pm', 'Docente', 2020, 'LM84314-4'),
(108, 'CB56096-101', '2020-04-20', '07:05:19 pm', '07:05:42 pm', 'Administrador', 2020, 'LM93499-1'),
(109, 'CB69425-102', '2020-04-20', '08:23:21 pm', '08:24:09 pm', 'Administrador', 2020, 'LM93499-1'),
(110, 'CB34194-103', '2020-04-20', '08:24:17 pm', 'Sin registro', 'Docente', 2020, 'LM47586-3'),
(111, 'CB49578-104', '2020-04-20', '08:24:40 pm', '08:25:29 pm', 'Docente', 2020, 'LM47586-3');

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
(1, 'LM93499-1', 'admin', 'VlVwVnBIejltRGhKbEI0dEl0bVRMQT09', 'leonel.ilhuicatzi07@gmail.com', 'Activo', 1, 'Masculino', 'Male3Avatar.png'),
(2, 'LM38574-2', 'ray', 'aE1QL1NwamVQbkZUaWt0OWpWMlVvZz09', 'rayo@gmail.com', 'Activo', 1, 'Masculino', 'Male3Avatar.png'),
(7, 'LM47586-3', 'docenteChavez', 'RUprTG9vR2t6amYxQlZkUVE3aWtEQT09', 'docente@gmail.com', 'Activo', 2, 'Masculino', 'Male3Avatar.png'),
(8, 'LM84314-4', 'docente1', 'VHFNWExaZmhnR2V3bm5ONWtSbGQyZz09', 'docente1@gmail.com', 'Activo', 2, 'Femenino', 'Female2Avatar.png'),
(9, 'LM23164-5', 'ricardo', 'amdnSnJZbURXNDM1YVROc25Ea0xOZz09', 'mantill@gmail.com', 'Activo', 1, 'Masculino', 'Male3Avatar.png'),
(10, 'LM75472-6', 'estudiante1', 'bTBHdTZLVnVxemlzNkdqKzIvbnJ5Zz09', 'jonathan@gmail.com', 'Activo', 3, 'Masculino', 'Male3Avatar.png'),
(12, 'LM44211-7', 'luis', 'eDRQUTFmd2hmdURyeWNLSUFVYzF0Zz09', 'lponce@gmail.com', 'Activo', 3, 'Masculino', 'Male3Avatar.png');

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
(1, '00447711', 'Leonel', 'MEDEL ILHUICATZI', '2481139051', 'MEXICO', 'LM93499-1', 'Administrador'),
(2, '6978979798798', 'Raymundo', 'MEDEL', '4908249084', 'PUEBLA, MEXICO', 'LM38574-2', 'Administrador'),
(7, '0102030405', 'Jorge', 'CHAVEZ AGUIRRE', '98070868798789', 'PUEBLA, MEXICO', 'LM47586-3', 'Docente'),
(8, '8798798797', 'Juliana', 'DIAZ', '988070898', 'BUCARAMANGA', 'LM84314-4', 'Docente'),
(9, '908098908', 'Ricardo', 'MANTILLA', '98789798698678', 'COLOMBIA', 'LM23164-5', 'Administrador'),
(10, '988799696896', 'Jonathan X', 'ACUÑA', '908090886', 'BUCARAMANGA', 'LM75472-6', 'Estudiante'),
(12, '78978', 'Luis', 'PONCE', '7809809', 'CHOLULA, MEXICO', 'LM44211-7', 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `inicio` date NOT NULL,
  `fin` date NOT NULL,
  `cuentaCreador` varchar(30) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id`, `titulo`, `inicio`, `fin`, `cuentaCreador`) VALUES
(4, 'prueba fechas', '2020-04-20', '2020-04-21', 'LM47586-3'),
(5, 'Proyecto de Jorge Chavez A', '2020-04-21', '2020-05-28', 'LM84314-4'),
(6, 'Creado por Chavez', '2020-04-20', '2020-04-30', 'LM47586-3');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
