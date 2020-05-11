-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-05-2020 a las 03:52:45
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
  `cuentaCreador` varchar(30) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `asignacion`
--

INSERT INTO `asignacion` (`id_asignacion`, `id_proyecto`, `id_equipo`, `id_estado`, `cuentaCreador`, `created`, `modified`) VALUES
(6, 7, 1, 1, 'LM11092-3', '2020-05-04 15:21:32', '2020-05-04 15:21:32'),
(7, 8, 3, 1, 'LM11092-3', '2020-05-04 18:22:21', '2020-05-04 18:22:21'),
(9, 5, 4, 1, 'LM11092-3', '2020-05-04 18:58:46', '2020-05-04 18:58:46');

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
(90, 'CB24803-79', '2020-04-23', '01:13:51 am', '01:26:42 am', 'Estudiante', 2020, 'LM55041-4'),
(91, 'CB52211-80', '2020-04-23', '02:00:20 am', '02:00:41 am', 'Administrador', 2020, 'LM93499-1'),
(92, 'CB41660-81', '2020-04-23', '02:00:53 am', '02:01:22 am', 'Docente', 2020, 'LM11092-3'),
(93, 'CB37267-82', '2020-04-23', '02:01:36 am', '02:01:51 am', 'Estudiante', 2020, 'LM55041-4'),
(94, 'CB64499-83', '2020-04-23', '06:15:41 am', '06:19:05 am', 'Administrador', 2020, 'LM93499-1'),
(95, 'CB06782-84', '2020-04-23', '06:19:16 am', '06:19:23 am', 'Docente', 2020, 'LM11092-3'),
(96, 'CB63283-85', '2020-04-23', '07:03:34 am', '07:12:55 am', 'Administrador', 2020, 'LM93499-1'),
(98, 'CB82441-87', '2020-04-23', '07:15:13 am', '07:16:45 am', 'Docente', 2020, 'LM11092-3'),
(99, 'CB78108-88', '2020-04-23', '07:16:51 am', '07:23:59 am', 'Docente', 2020, 'LM73754-5'),
(100, 'CB55595-89', '2020-04-23', '07:24:56 am', '07:25:52 am', 'Administrador', 2020, 'LM93499-1'),
(101, 'CB48836-89', '2020-04-24', '08:23:41 pm', '08:23:56 pm', 'Docente', 2020, 'LM11092-3'),
(102, 'CB93073-90', '2020-04-24', '08:24:12 pm', '08:56:09 pm', 'Administrador', 2020, 'LM93499-1'),
(103, 'CB96798-91', '2020-04-24', '08:56:17 pm', 'Sin registro', 'Docente', 2020, 'LM11092-3'),
(104, 'CB05425-92', '2020-04-24', '11:09:50 pm', 'Sin registro', 'Docente', 2020, 'LM11092-3'),
(105, 'CB74282-93', '2020-04-24', '11:10:47 pm', 'Sin registro', 'Docente', 2020, 'LM11092-3'),
(106, 'CB52711-94', '2020-04-24', '11:11:08 pm', 'Sin registro', 'Docente', 2020, 'LM11092-3'),
(107, 'CB55382-95', '2020-04-25', '12:21:58 am', 'Sin registro', 'Docente', 2020, 'LM11092-3'),
(108, 'CB99891-96', '2020-04-27', '05:21:40 pm', 'Sin registro', 'Docente', 2020, 'LM11092-3'),
(109, 'CB07969-97', '2020-04-27', '05:54:03 pm', '06:52:43 pm', 'Docente', 2020, 'LM11092-3'),
(110, 'CB60552-98', '2020-04-27', '06:52:51 pm', '06:53:12 pm', 'Docente', 2020, 'LM73754-5'),
(111, 'CB91983-99', '2020-04-27', '06:55:29 pm', '07:03:02 pm', 'Docente', 2020, 'LM11092-3'),
(112, 'CB77918-100', '2020-04-27', '07:03:17 pm', 'Sin registro', 'Docente', 2020, 'LM11092-3'),
(113, 'CB85464-101', '2020-04-27', '07:06:07 pm', 'Sin registro', 'Docente', 2020, 'LM11092-3'),
(114, 'CB52385-102', '2020-04-27', '07:06:17 pm', '07:22:43 pm', 'Docente', 2020, 'LM11092-3'),
(115, 'CB65947-103', '2020-05-03', '01:51:33 pm', '01:52:48 pm', 'Docente', 2020, 'LM11092-3'),
(116, 'CB65595-104', '2020-05-03', '01:52:55 pm', '01:53:56 pm', 'Administrador', 2020, 'LM93499-1'),
(117, 'CB82232-105', '2020-05-03', '01:54:02 pm', 'Sin registro', 'Docente', 2020, 'LM11092-3'),
(118, 'CB28725-106', '2020-05-03', '02:30:49 pm', 'Sin registro', 'Docente', 2020, 'LM11092-3'),
(119, 'CB94186-107', '2020-05-03', '02:36:05 pm', 'Sin registro', 'Docente', 2020, 'LM11092-3'),
(120, 'CB03542-108', '2020-05-03', '04:30:45 pm', '04:36:00 pm', 'Docente', 2020, 'LM11092-3'),
(121, 'CB09039-109', '2020-05-03', '04:36:06 pm', '04:37:47 pm', 'Administrador', 2020, 'LM93499-1'),
(122, 'CB04612-110', '2020-05-03', '04:37:55 pm', '05:59:32 pm', 'Docente', 2020, 'LM11092-3'),
(123, 'CB59867-111', '2020-05-03', '05:59:41 pm', 'Sin registro', 'Estudiante', 2020, 'LM55041-4'),
(124, 'CB32952-112', '2020-05-03', '05:59:56 pm', 'Sin registro', 'Estudiante', 2020, 'LM55041-4'),
(125, 'CB80881-113', '2020-05-03', '06:00:40 pm', 'Sin registro', 'Estudiante', 2020, 'LM55041-4'),
(126, 'CB14737-114', '2020-05-03', '06:00:48 pm', 'Sin registro', 'Estudiante', 2020, 'LM55041-4'),
(127, 'CB73166-115', '2020-05-03', '06:01:30 pm', 'Sin registro', 'Estudiante', 2020, 'LM55041-4'),
(128, 'CB72442-116', '2020-05-03', '06:02:22 pm', '06:03:24 pm', 'Estudiante', 2020, 'LM55041-4'),
(129, 'CB82309-117', '2020-05-03', '06:03:31 pm', 'Sin registro', 'Estudiante', 2020, 'LM55041-4'),
(130, 'CB82943-118', '2020-05-03', '06:04:47 pm', 'Sin registro', 'Estudiante', 2020, 'LM55041-4'),
(131, 'CB72532-119', '2020-05-03', '06:05:19 pm', '06:25:52 pm', 'Estudiante', 2020, 'LM55041-4'),
(132, 'CB74794-120', '2020-05-03', '06:25:58 pm', '06:28:03 pm', 'Docente', 2020, 'LM11092-3'),
(133, 'CB85758-121', '2020-05-03', '06:28:10 pm', '06:35:23 pm', 'Estudiante', 2020, 'LM55041-4'),
(134, 'CB50111-122', '2020-05-03', '06:35:31 pm', '06:35:51 pm', 'Docente', 2020, 'LM11092-3'),
(135, 'CB67717-123', '2020-05-03', '06:36:03 pm', '06:36:17 pm', 'Estudiante', 2020, 'LM55041-4'),
(136, 'CB15358-124', '2020-05-03', '07:24:06 pm', '07:26:47 pm', 'Estudiante', 2020, 'LM55041-4'),
(137, 'CB42009-125', '2020-05-03', '07:26:52 pm', '07:27:10 pm', 'Docente', 2020, 'LM11092-3'),
(138, 'CB31580-126', '2020-05-03', '07:27:17 pm', 'Sin registro', 'Estudiante', 2020, 'LM55041-4'),
(139, 'CB06751-127', '2020-05-03', '07:30:21 pm', '07:30:26 pm', 'Estudiante', 2020, 'LM55041-4'),
(140, 'CB34993-128', '2020-05-03', '07:30:31 pm', 'Sin registro', 'Docente', 2020, 'LM11092-3'),
(141, 'CB68713-129', '2020-05-03', '07:38:42 pm', '08:17:52 pm', 'Docente', 2020, 'LM11092-3'),
(142, 'CB88117-130', '2020-05-03', '08:17:59 pm', '08:21:29 pm', 'Estudiante', 2020, 'LM55041-4'),
(143, 'CB10296-131', '2020-05-03', '08:21:35 pm', '08:26:19 pm', 'Estudiante', 2020, 'LM55041-4'),
(144, 'CB46191-132', '2020-05-03', '08:26:24 pm', '08:26:35 pm', 'Docente', 2020, 'LM11092-3'),
(145, 'CB48016-133', '2020-05-03', '08:26:41 pm', '08:27:27 pm', 'Estudiante', 2020, 'LM55041-4'),
(146, 'CB58610-134', '2020-05-03', '08:27:36 pm', '08:28:46 pm', 'Docente', 2020, 'LM11092-3'),
(147, 'CB63326-135', '2020-05-03', '08:28:53 pm', '08:28:59 pm', 'Estudiante', 2020, 'LM55041-4'),
(148, 'CB11452-136', '2020-05-03', '08:29:03 pm', 'Sin registro', 'Docente', 2020, 'LM11092-3'),
(149, 'CB02692-137', '2020-05-03', '08:29:32 pm', 'Sin registro', 'Estudiante', 2020, 'LM55041-4'),
(150, 'CB01380-138', '2020-05-03', '08:31:41 pm', '08:45:04 pm', 'Docente', 2020, 'LM11092-3'),
(151, 'CB23330-139', '2020-05-03', '08:45:12 pm', 'Sin registro', 'Estudiante', 2020, 'LM55041-4'),
(152, 'CB27130-140', '2020-05-03', '08:52:00 pm', '08:52:12 pm', 'Docente', 2020, 'LM11092-3'),
(153, 'CB11861-141', '2020-05-03', '08:52:19 pm', '08:52:32 pm', 'Estudiante', 2020, 'LM55041-4'),
(154, 'CB85679-142', '2020-05-03', '08:52:37 pm', '08:52:54 pm', 'Docente', 2020, 'LM11092-3'),
(155, 'CB18950-143', '2020-05-03', '08:53:01 pm', '08:53:58 pm', 'Estudiante', 2020, 'LM55041-4'),
(156, 'CB15013-144', '2020-05-03', '08:54:03 pm', '08:54:13 pm', 'Docente', 2020, 'LM11092-3'),
(157, 'CB10109-145', '2020-05-03', '08:54:21 pm', '08:54:41 pm', 'Estudiante', 2020, 'LM55041-4'),
(158, 'CB04807-146', '2020-05-03', '08:54:47 pm', 'Sin registro', 'Docente', 2020, 'LM11092-3'),
(159, 'CB36790-147', '2020-05-04', '02:03:06 pm', '02:03:18 pm', 'Estudiante', 2020, 'LM55041-4'),
(160, 'CB14718-148', '2020-05-04', '02:03:27 pm', '02:03:56 pm', 'Docente', 2020, 'LM11092-3'),
(161, 'CB45124-149', '2020-05-04', '02:04:04 pm', '03:20:28 pm', 'Estudiante', 2020, 'LM55041-4'),
(162, 'CB13447-150', '2020-05-04', '03:20:34 pm', '03:20:45 pm', 'Docente', 2020, 'LM11092-3'),
(163, 'CB72949-151', '2020-05-04', '03:20:51 pm', '03:21:13 pm', 'Estudiante', 2020, 'LM55041-4'),
(164, 'CB42993-152', '2020-05-04', '03:21:18 pm', '03:21:40 pm', 'Docente', 2020, 'LM11092-3'),
(165, 'CB59362-153', '2020-05-04', '03:21:54 pm', 'Sin registro', 'Estudiante', 2020, 'LM55041-4'),
(166, 'CB03710-154', '2020-05-04', '03:24:24 pm', 'Sin registro', 'Estudiante', 2020, 'LM55041-4'),
(167, 'CB14542-155', '2020-05-04', '03:29:14 pm', 'Sin registro', 'Estudiante', 2020, 'LM55041-4'),
(168, 'CB38459-156', '2020-05-04', '03:40:39 pm', 'Sin registro', 'Estudiante', 2020, 'LM55041-4'),
(169, 'CB62146-157', '2020-05-04', '04:01:18 pm', 'Sin registro', 'Estudiante', 2020, 'LM55041-4'),
(170, 'CB10593-158', '2020-05-04', '05:15:55 pm', '06:05:43 pm', 'Estudiante', 2020, 'LM55041-4'),
(171, 'CB40851-159', '2020-05-04', '06:05:55 pm', '06:08:05 pm', 'Administrador', 2020, 'LM93499-1'),
(172, 'CB84096-160', '2020-05-04', '06:08:12 pm', '06:12:41 pm', 'Docente', 2020, 'LM11092-3'),
(173, 'CB35965-161', '2020-05-04', '06:12:45 pm', '06:16:28 pm', 'Estudiante', 2020, 'LM59856-7'),
(174, 'CB63013-162', '2020-05-04', '06:16:34 pm', '06:16:50 pm', 'Estudiante', 2020, 'LM55041-4'),
(175, 'CB92951-163', '2020-05-04', '06:16:55 pm', '06:19:56 pm', 'Administrador', 2020, 'LM93499-1'),
(176, 'CB95619-164', '2020-05-04', '06:20:01 pm', '06:22:30 pm', 'Docente', 2020, 'LM11092-3'),
(177, 'CB62988-165', '2020-05-04', '06:22:37 pm', '06:41:34 pm', 'Estudiante', 2020, 'LM84603-10'),
(178, 'CB33375-166', '2020-05-04', '06:41:41 pm', '06:41:50 pm', 'Docente', 2020, 'LM11092-3'),
(179, 'CB90890-167', '2020-05-04', '06:41:54 pm', '06:44:15 pm', 'Administrador', 2020, 'LM93499-1'),
(180, 'CB61434-168', '2020-05-04', '06:44:20 pm', '06:50:24 pm', 'Estudiante', 2020, 'LM20551-13'),
(181, 'CB64353-169', '2020-05-04', '06:50:29 pm', '06:50:39 pm', 'Estudiante', 2020, 'LM20551-13'),
(182, 'CB35046-170', '2020-05-04', '06:50:44 pm', '06:52:17 pm', 'Docente', 2020, 'LM11092-3'),
(183, 'CB85284-171', '2020-05-04', '06:52:22 pm', '06:52:39 pm', 'Estudiante', 2020, 'LM20551-13'),
(184, 'CB72304-172', '2020-05-04', '06:52:42 pm', '06:52:50 pm', 'Estudiante', 2020, 'LM43600-14'),
(185, 'CB53309-173', '2020-05-04', '06:52:56 pm', '06:53:09 pm', 'Estudiante', 2020, 'LM78816-11'),
(186, 'CB31613-174', '2020-05-04', '06:53:13 pm', '06:55:03 pm', 'Docente', 2020, 'LM11092-3'),
(187, 'CB30984-175', '2020-05-04', '06:55:07 pm', '06:55:31 pm', 'Estudiante', 2020, 'LM43600-14'),
(188, 'CB30595-176', '2020-05-04', '06:55:38 pm', '06:55:54 pm', 'Estudiante', 2020, 'LM55041-4'),
(189, 'CB58500-177', '2020-05-04', '06:55:59 pm', '06:56:57 pm', 'Estudiante', 2020, 'LM84603-10'),
(190, 'CB08696-178', '2020-05-04', '06:57:01 pm', '06:57:21 pm', 'Estudiante', 2020, 'LM43600-14'),
(191, 'CB39885-179', '2020-05-04', '06:57:29 pm', '06:58:49 pm', 'Docente', 2020, 'LM11092-3'),
(192, 'CB02019-180', '2020-05-04', '06:58:53 pm', '07:08:04 pm', 'Estudiante', 2020, 'LM43600-14'),
(193, 'CB24408-181', '2020-05-04', '07:09:11 pm', '07:10:38 pm', 'Estudiante', 2020, 'LM43600-14'),
(194, 'CB96353-182', '2020-05-04', '07:10:43 pm', '07:14:48 pm', 'Docente', 2020, 'LM11092-3'),
(195, 'CB71808-183', '2020-05-04', '07:14:52 pm', '07:15:28 pm', 'Estudiante', 2020, 'LM43600-14'),
(196, 'CB10065-184', '2020-05-04', '07:15:38 pm', '07:15:59 pm', 'Estudiante', 2020, 'LM84603-10'),
(197, 'CB02708-185', '2020-05-04', '07:16:19 pm', '07:25:01 pm', 'Docente', 2020, 'LM11092-3'),
(198, 'CB89637-186', '2020-05-04', '07:25:06 pm', '07:29:05 pm', 'Estudiante', 2020, 'LM20551-13'),
(199, 'CB46926-187', '2020-05-04', '07:29:10 pm', '07:41:45 pm', 'Administrador', 2020, 'LM93499-1'),
(200, 'CB03310-188', '2020-05-04', '07:41:53 pm', '07:51:41 pm', 'Docente', 2020, 'LM11092-3'),
(201, 'CB85917-189', '2020-05-08', '02:54:30 pm', '02:54:38 pm', 'Administrador', 2020, 'LM93499-1'),
(202, 'CB45406-190', '2020-05-08', '06:47:51 pm', '06:48:00 pm', 'Administrador', 2020, 'LM93499-1'),
(204, 'CB99945-192', '2020-05-08', '06:53:56 pm', '06:55:15 pm', 'Administrador', 2020, 'LM93499-1'),
(206, 'CB21214-194', '2020-05-08', '06:56:59 pm', '06:57:17 pm', 'Estudiante', 2020, 'LM52219-16'),
(207, 'CB06563-195', '2020-05-08', '06:57:26 pm', '06:58:49 pm', 'Estudiante', 2020, 'LM43600-14'),
(208, 'CB46687-196', '2020-05-08', '06:58:56 pm', '06:59:04 pm', 'Estudiante', 2020, 'LM52219-16'),
(209, 'CB12086-197', '2020-05-08', '06:59:12 pm', '06:59:19 pm', 'Estudiante', 2020, 'LM84603-10'),
(210, 'CB88043-198', '2020-05-08', '06:59:24 pm', '06:59:29 pm', 'Estudiante', 2020, 'LM43600-14'),
(212, 'CB76038-200', '2020-05-08', '07:11:08 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(213, 'CB98933-201', '2020-05-08', '07:11:20 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(214, 'CB45179-202', '2020-05-08', '07:12:06 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(215, 'CB92691-203', '2020-05-08', '07:12:24 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(216, 'CB27557-204', '2020-05-08', '07:12:43 pm', '07:16:12 pm', 'Administrador', 2020, 'LM93499-1'),
(217, 'CB52839-205', '2020-05-08', '07:16:18 pm', '07:28:15 pm', 'Docente', 2020, 'LM11092-3'),
(218, 'CB93470-206', '2020-05-08', '07:28:21 pm', 'Sin registro', 'Estudiante', 2020, 'LM55041-4'),
(219, 'CB64240-207', '2020-05-08', '07:30:52 pm', '07:33:34 pm', 'Estudiante', 2020, 'LM55041-4'),
(220, 'CB63952-208', '2020-05-08', '07:33:39 pm', '07:35:19 pm', 'Docente', 2020, 'LM11092-3'),
(221, 'CB72816-209', '2020-05-08', '07:43:30 pm', '08:35:18 pm', 'Administrador', 2020, 'LM93499-1'),
(222, 'CB56023-210', '2020-05-08', '08:35:25 pm', '08:36:31 pm', 'Docente', 2020, 'LM11092-3'),
(223, 'CB55065-211', '2020-05-08', '08:36:36 pm', '08:37:16 pm', 'Administrador', 2020, 'LM93499-1'),
(224, 'CB97641-212', '2020-05-09', '02:56:40 pm', '03:00:48 pm', 'Administrador', 2020, 'LM93499-1'),
(225, 'CB54118-213', '2020-05-09', '03:03:50 pm', '03:37:11 pm', 'Administrador', 2020, 'LM93499-1'),
(226, 'CB53270-214', '2020-05-09', '03:49:44 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1'),
(227, 'CB19621-215', '2020-05-09', '04:51:44 pm', '05:54:08 pm', 'Administrador', 2020, 'LM93499-1'),
(228, 'CB31018-216', '2020-05-09', '05:54:19 pm', '05:55:01 pm', 'Docente', 2020, 'LM11092-3'),
(229, 'CB62420-217', '2020-05-09', '05:55:06 pm', '05:55:16 pm', 'Administrador', 2020, 'LM93499-1'),
(230, 'CB36867-218', '2020-05-09', '05:55:21 pm', '06:13:24 pm', 'Docente', 2020, 'LM11092-3'),
(231, 'CB77479-219', '2020-05-09', '06:13:39 pm', '06:13:49 pm', 'Docente', 2020, 'LM11092-3'),
(232, 'CB32643-220', '2020-05-09', '06:15:28 pm', '06:53:47 pm', 'Estudiante', 2020, 'LM55041-4'),
(233, 'CB15453-221', '2020-05-09', '06:53:59 pm', '06:56:12 pm', 'Docente', 2020, 'LM11092-3'),
(234, 'CB36895-222', '2020-05-09', '06:56:18 pm', '06:56:25 pm', 'Estudiante', 2020, 'LM43600-14'),
(235, 'CB72721-223', '2020-05-09', '06:56:43 pm', '06:58:01 pm', 'Docente', 2020, 'LM73754-5'),
(238, 'CB84376-226', '2020-05-09', '06:59:30 pm', '07:05:20 pm', 'Administrador', 2020, 'LM93499-1'),
(239, 'CB12433-225', '2020-05-09', '07:05:26 pm', '07:14:51 pm', 'Estudiante', 2020, 'LM52219-16'),
(240, 'CB84207-226', '2020-05-09', '07:15:14 pm', '07:17:25 pm', 'Administrador', 2020, 'LM93499-1'),
(241, 'CB44687-227', '2020-05-09', '07:19:15 pm', '07:19:24 pm', 'Administrador', 2020, 'LM93499-1'),
(242, 'CB31774-228', '2020-05-09', '07:20:41 pm', '07:20:44 pm', 'Docente', 2020, 'LM11092-3'),
(243, 'CB51092-229', '2020-05-09', '07:20:51 pm', '07:27:47 pm', 'Administrador', 2020, 'LM93499-1'),
(244, 'CB07929-230', '2020-05-09', '07:27:52 pm', '07:27:56 pm', 'Administrador', 2020, 'LM93499-1'),
(245, 'CB83708-231', '2020-05-09', '07:28:06 pm', '07:28:09 pm', 'Estudiante', 2020, 'LM84603-10'),
(246, 'CB43507-232', '2020-05-09', '07:28:19 pm', '07:28:32 pm', 'Docente', 2020, 'LM11092-3'),
(247, 'CB63137-233', '2020-05-09', '07:28:42 pm', '07:28:46 pm', 'Estudiante', 2020, 'LM52219-16'),
(248, 'CB93806-234', '2020-05-09', '07:37:11 pm', '07:38:28 pm', 'Estudiante', 2020, 'LM84603-10'),
(249, 'CB38689-235', '2020-05-09', '07:38:34 pm', '07:38:41 pm', 'Administrador', 2020, 'LM93499-1'),
(250, 'CB32742-236', '2020-05-09', '07:38:59 pm', '07:39:14 pm', 'Docente', 2020, 'LM11092-3'),
(251, 'CB61494-237', '2020-05-09', '07:39:21 pm', '07:39:32 pm', 'Docente', 2020, 'LM73754-5'),
(252, 'CB59836-238', '2020-05-09', '07:39:41 pm', '07:39:52 pm', 'Estudiante', 2020, 'LM55041-4'),
(253, 'CB08664-239', '2020-05-09', '07:39:57 pm', '07:45:18 pm', 'Estudiante', 2020, 'LM43600-14'),
(254, 'CB97357-240', '2020-05-09', '07:45:24 pm', '07:46:40 pm', 'Administrador', 2020, 'LM93499-1'),
(255, 'CB70473-241', '2020-05-09', '07:46:45 pm', '07:47:01 pm', 'Administrador', 2020, 'LM34913-16'),
(256, 'CB98954-242', '2020-05-09', '07:47:20 pm', '07:47:48 pm', 'Administrador', 2020, 'LM87917-6'),
(257, 'CB71235-243', '2020-05-09', '07:52:12 pm', '07:56:17 pm', 'Administrador', 2020, 'LM34913-16'),
(258, 'CB89220-244', '2020-05-09', '07:56:22 pm', '07:56:31 pm', 'Administrador', 2020, 'LM93499-1'),
(259, 'CB04682-245', '2020-05-10', '01:27:43 pm', '01:28:15 pm', 'Administrador', 2020, 'LM93499-1'),
(260, 'CB95611-246', '2020-05-10', '01:28:23 pm', '01:28:35 pm', 'Administrador', 2020, 'LM34913-16'),
(261, 'CB49923-247', '2020-05-10', '01:28:40 pm', '01:30:22 pm', 'Docente', 2020, 'LM11092-3'),
(262, 'CB31952-248', '2020-05-10', '01:30:27 pm', '01:30:39 pm', 'Administrador', 2020, 'LM93499-1'),
(263, 'CB25532-249', '2020-05-10', '01:30:43 pm', '01:30:53 pm', 'Docente', 2020, 'LM73754-5'),
(265, 'CB63795-251', '2020-05-10', '01:31:26 pm', '01:34:31 pm', 'Estudiante', 2020, 'LM55041-4'),
(266, 'CB33718-252', '2020-05-10', '01:34:37 pm', '01:34:56 pm', 'Administrador', 2020, 'LM93499-1'),
(267, 'CB53953-253', '2020-05-10', '01:35:01 pm', '01:35:26 pm', 'Estudiante', 2020, 'LM52219-16'),
(268, 'CB30542-254', '2020-05-10', '01:47:24 pm', '02:15:40 pm', 'Docente', 2020, 'LM11092-3'),
(269, 'CB08538-255', '2020-05-10', '02:15:44 pm', '03:05:09 pm', 'Administrador', 2020, 'LM93499-1'),
(271, 'CB41027-257', '2020-05-10', '03:07:44 pm', '03:08:26 pm', 'Administrador', 2020, 'LM93499-1'),
(273, 'CB03530-258', '2020-05-10', '03:09:23 pm', '03:09:42 pm', 'Administrador', 2020, 'LM93499-1'),
(275, 'CB01978-259', '2020-05-10', '03:10:28 pm', '03:12:27 pm', 'Administrador', 2020, 'LM93499-1'),
(277, 'CB51957-260', '2020-05-10', '03:13:09 pm', '03:13:21 pm', 'Administrador', 2020, 'LM93499-1'),
(278, 'CB17001-260', '2020-05-10', '03:13:53 pm', '03:13:55 pm', 'Estudiante', 2020, 'LM40080-17'),
(279, 'CB90549-261', '2020-05-10', '03:14:02 pm', '03:14:38 pm', 'Administrador', 2020, 'LM93499-1'),
(280, 'CB36997-258', '2020-05-10', '03:14:43 pm', '03:17:44 pm', 'Docente', 2020, 'LM73754-5'),
(281, 'CB96791-259', '2020-05-10', '03:17:49 pm', '03:17:52 pm', 'Docente', 2020, 'LM73754-5'),
(282, 'CB32336-260', '2020-05-10', '03:17:58 pm', '03:18:30 pm', 'Docente', 2020, 'LM11092-3'),
(283, 'CB99366-261', '2020-05-10', '03:18:51 pm', '03:19:03 pm', 'Docente', 2020, 'LM11092-3'),
(284, 'CB04587-262', '2020-05-10', '03:19:07 pm', '03:19:17 pm', 'Docente', 2020, 'LM73754-5'),
(285, 'CB14298-263', '2020-05-10', '03:19:21 pm', '03:19:37 pm', 'Administrador', 2020, 'LM93499-1'),
(286, 'CB59130-264', '2020-05-10', '03:19:43 pm', '03:19:52 pm', 'Docente', 2020, 'LM11092-3'),
(287, 'CB76107-265', '2020-05-10', '03:19:59 pm', '03:27:58 pm', 'Docente', 2020, 'LM73754-5'),
(288, 'CB92990-266', '2020-05-10', '03:28:03 pm', '03:29:50 pm', 'Docente', 2020, 'LM11092-3'),
(289, 'CB29452-267', '2020-05-10', '03:29:55 pm', '03:30:12 pm', 'Docente', 2020, 'LM73754-5'),
(290, 'CB08192-268', '2020-05-10', '03:30:16 pm', '03:30:47 pm', 'Administrador', 2020, 'LM93499-1'),
(291, 'CB16084-269', '2020-05-10', '03:30:53 pm', '03:38:13 pm', 'Docente', 2020, 'LM73754-5'),
(292, 'CB53560-270', '2020-05-10', '03:38:18 pm', '03:38:27 pm', 'Estudiante', 2020, 'LM40080-17'),
(293, 'CB34004-271', '2020-05-10', '03:41:00 pm', '03:43:32 pm', 'Docente', 2020, 'LM11092-3'),
(294, 'CB50270-272', '2020-05-10', '03:43:37 pm', 'Sin registro', 'Docente', 2020, 'LM73754-5'),
(295, 'CB51682-273', '2020-05-10', '03:52:01 pm', 'Sin registro', 'Docente', 2020, 'LM73754-5'),
(296, 'CB93264-274', '2020-05-10', '03:53:05 pm', '04:00:39 pm', 'Docente', 2020, 'LM73754-5'),
(297, 'CB10588-275', '2020-05-10', '04:00:44 pm', '04:01:01 pm', 'Docente', 2020, 'LM11092-3'),
(298, 'CB84815-276', '2020-05-10', '04:01:05 pm', '04:04:24 pm', 'Docente', 2020, 'LM73754-5'),
(299, 'CB12993-277', '2020-05-10', '04:04:31 pm', '04:04:51 pm', 'Docente', 2020, 'LM73754-5'),
(300, 'CB24843-278', '2020-05-10', '04:04:59 pm', '04:34:52 pm', 'Docente', 2020, 'LM11092-3'),
(301, 'CB00112-279', '2020-05-10', '04:34:56 pm', '04:36:52 pm', 'Docente', 2020, 'LM73754-5'),
(302, 'CB61834-280', '2020-05-10', '04:36:55 pm', '04:38:05 pm', 'Estudiante', 2020, 'LM40080-17'),
(303, 'CB11336-281', '2020-05-10', '04:38:13 pm', '04:40:37 pm', 'Docente', 2020, 'LM73754-5'),
(304, 'CB98233-282', '2020-05-10', '04:40:41 pm', '04:40:54 pm', 'Estudiante', 2020, 'LM40080-17'),
(305, 'CB07474-283', '2020-05-10', '04:41:00 pm', '05:14:02 pm', 'Docente', 2020, 'LM73754-5'),
(306, 'CB34820-284', '2020-05-10', '05:19:18 pm', 'Sin registro', 'Docente', 2020, 'LM73754-5'),
(307, 'CB79998-285', '2020-05-10', '06:34:42 pm', '06:34:50 pm', 'Estudiante', 2020, 'LM05170-17'),
(308, 'CB32479-286', '2020-05-10', '06:34:55 pm', '06:36:14 pm', 'Administrador', 2020, 'LM93499-1'),
(309, 'CB26577-287', '2020-05-10', '06:36:20 pm', '06:37:17 pm', 'Docente', 2020, 'LM73754-5'),
(310, 'CB68408-288', '2020-05-10', '06:37:23 pm', '06:37:45 pm', 'Estudiante', 2020, 'LM05170-17'),
(311, 'CB40711-289', '2020-05-10', '06:41:56 pm', '06:43:22 pm', 'Administrador', 2020, 'LM93499-1'),
(312, 'CB70962-290', '2020-05-10', '06:44:39 pm', '07:04:04 pm', 'Administrador', 2020, 'LM93499-1'),
(313, 'CB68825-291', '2020-05-10', '07:04:13 pm', '07:53:19 pm', 'Docente', 2020, 'LM11092-3'),
(314, 'CB87156-292', '2020-05-10', '07:53:29 pm', '07:53:39 pm', 'Estudiante', 2020, 'LM55041-4'),
(315, 'CB60383-293', '2020-05-10', '07:55:09 pm', '08:13:51 pm', 'Docente', 2020, 'LM11092-3'),
(316, 'CB77590-294', '2020-05-10', '08:14:27 pm', '08:16:41 pm', 'Estudiante', 2020, 'LM55041-4'),
(317, 'CB13107-295', '2020-05-10', '08:17:55 pm', '08:21:04 pm', 'Estudiante', 2020, 'LM72734-18'),
(318, 'CB93742-296', '2020-05-10', '08:21:11 pm', '08:30:23 pm', 'Estudiante', 2020, 'LM55041-4'),
(319, 'CB83585-297', '2020-05-10', '08:30:29 pm', '08:31:24 pm', 'Docente', 2020, 'LM11092-3'),
(320, 'CB94673-298', '2020-05-10', '08:31:28 pm', 'Sin registro', 'Administrador', 2020, 'LM93499-1');

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
(10, 'LM11092-3', 'docente', 'RUprTG9vR2t6amYxQlZkUVE3aWtEQT09', 'docente@gmail.com', 'Activo', 2, 'Femenino', 'docenteMujer.png'),
(11, 'LM55041-4', 'estudiante', 'bTBHdTZLVnVxemlzNkdqKzIvbnJ5Zz09', 'estudiante@gmail.com', 'Activo', 3, 'Femenino', 'estudianteMujer.png'),
(12, 'LM73754-5', 'jorge', 'cU5LRDI2NEFQWk5Nb3R5TXVoL3p5Zz09', 'jorge@gmail.com', 'Activo', 2, 'Masculino', 'docenteHombre.png'),
(17, 'LM87917-6', 'leo', 'NnF1dEQ3dXlXYk5BMHpNclVuQWtHQT09', 'leo@gmail.com', 'Activo', 1, 'Masculino', 'adminHombre.png'),
(18, 'LM59856-7', 'ponce', 'THdTeHkxbE9hWFpobEJRQVRmRjlDZz09', 'lponce@gmail.com', 'Activo', 3, 'Masculino', 'estudianteHombre.png'),
(19, 'LM92282-8', 'hector', 'L3R6b3dMMWNjYytpdmR2UWVGdHpIUT09', 'hetor@gmail.com', 'Activo', 3, 'Masculino', 'estudianteHombre.png'),
(20, 'LM29533-9', 'perez', 'OHoxd29YcFIvaFYxdlRQRS9pU0hIZz09', 'jperez@gmal.com', 'Activo', 3, 'Masculino', 'estudianteHombre.png'),
(21, 'LM84603-10', 'cristal', 'eFNPc1ZQcU9TOFJpMWZaZTIrWXhNQT09', 'cristal@gmail.com', 'Activo', 3, 'Femenino', 'estudianteMujer.png'),
(22, 'LM78816-11', 'leticia', 'cFh6Z3NlTG9EcDlDTjFwYlp4M0MyUT09', 'leticia@gmail.com', 'Activo', 3, 'Femenino', 'estudianteMujer.png'),
(23, 'LM08913-12', 'omarG', 'eFFaUThqUFU2VDVvQzRHMlVKVm9SUT09', 'omarG@gmail.com', 'Activo', 3, 'Masculino', 'estudianteHombre.png'),
(24, 'LM20551-13', 'gabo', 'eVlrNHRacFZ1azlzNHBEdmc5TWhqQT09', 'gabo@gmail.com', 'Activo', 3, 'Masculino', 'estudianteHombre.png'),
(25, 'LM43600-14', 'jair', 'RjRrK215ODAxdGkwT0RvQkFxb29mUT09', 'jair@gmail.com', 'Activo', 3, 'Masculino', 'estudianteHombre.png'),
(27, 'LM52219-16', 'cortes', 'anNTUXBqbGgxa254U3BjQU1rQk5oUT09', 'cortes@gmail.com', 'Activo', 3, 'Masculino', 'estudianteHombre.png'),
(29, 'LM34913-16', 'maria', 'aUlqY0pxbWExTFlESkRMZk1KVXdqdz09', 'maria@gmail.com', 'Activo', 1, 'Femenino', 'adminMujer.png'),
(36, 'LM40080-17', 'xxx', 'bU5CaHZqaCtsS0xBM0lxMDQ2VXBPUT09', 'xxx@gmail.com', 'Activo', 3, 'Femenino', 'estudianteMujer.png'),
(37, 'LM05170-17', 'qqq', 'K2NqWHYyOHBDNGp1MVV6akh0eGRLdz09', 'qqq@gmail.com', 'Activo', 3, 'Femenino', 'estudianteMujer.png'),
(38, 'LM72734-18', 'enrique', 'UndoUDBZWkpxU3ZaZ3RtWjVFenZjZz09', 'enrique@gmail.com', 'Activo', 3, 'Masculino', 'estudianteHombre.png');

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
(15, 'LM55041-4', 1, 'LM11092-3', '2020-05-03', '2020-05-03'),
(16, 'LM59856-7', 1, 'LM11092-3', '2020-05-04', '2020-05-04'),
(17, 'LM92282-8', 1, 'LM11092-3', '2020-05-04', '2020-05-04'),
(18, 'LM29533-9', 3, 'LM11092-3', '2020-05-04', '2020-05-04'),
(19, 'LM84603-10', 3, 'LM11092-3', '2020-05-04', '2020-05-04'),
(20, 'LM78816-11', 3, 'LM11092-3', '2020-05-04', '2020-05-04'),
(21, 'LM08913-12', 4, 'LM11092-3', '2020-05-04', '2020-05-04'),
(22, 'LM20551-13', 4, 'LM11092-3', '2020-05-04', '2020-05-04'),
(23, 'LM43600-14', 4, 'LM11092-3', '2020-05-04', '2020-05-04'),
(26, 'LM40080-17', 6, 'LM73754-5', '2020-05-10', '2020-05-10'),
(27, 'LM05170-17', 7, 'LM73754-5', '2020-05-10', '2020-05-10');

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
(1, 'Equipo uno', 'LM11092-3', '2020-05-03', '2020-05-04'),
(3, 'Equipo dos', 'LM11092-3', '2020-05-03', '2020-05-10'),
(4, 'Equipo tres', 'LM11092-3', '2020-05-04', '2020-05-04'),
(6, 'Equipo XX', 'LM73754-5', '2020-05-10', '2020-05-10'),
(7, 'Equipo dosXX', 'LM73754-5', '2020-05-10', '2020-05-10');

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

--
-- Volcado de datos para la tabla `fases`
--

INSERT INTO `fases` (`id_fase`, `fase`, `descripcion`, `fecha_inicio`, `fecha_fin`, `objetivo`, `id_metodologia`, `id_estado`, `created`, `modified`) VALUES
(2, 'Fase uno', 'comienzo de la fase uno', '2020-04-20', '2020-04-30', 'Inicio del proyecto a desarrollar', 1, 1, '2020-05-04', '2020-05-04'),
(3, 'Fase dos', 'desarrollo de la fase dos', '2020-04-24', '2020-05-03', 'Continuar el proyecto', 1, 1, '2020-05-04', '2020-05-04'),
(4, 'Fase uno con SCRUM', 'inicio con SCRUM', '2020-04-20', '2020-06-20', 'Implementar SCRUM', 2, 1, '2020-05-04', '2020-05-04');

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

--
-- Volcado de datos para la tabla `fuente`
--

INSERT INTO `fuente` (`id_fuente`, `url`, `descripcion`, `id_metodologia`, `created`, `modified`) VALUES
(1, 'https://www.ingenieriaindustrialonline.com/investigacion-de-operaciones/pert-tecnica-de-evaluacion-y', 'fuente 1 de PERT', 1, '2020-04-24', '2020-04-24'),
(2, 'https://obsbusiness.school/es/blog-project-management/planificacion-de-las-actividades-y-tiempo-de-u', 'Segundo intento', 1, '2020-04-24', '2020-04-24'),
(3, 'https://es.ccm.net/contents/582-metodo-pert', 'Tercera fuente de PERT', 1, '2020-04-24', '2020-04-24');

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
  `cuentaCreador` varchar(30) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `metodologia`
--

INSERT INTO `metodologia` (`id_metodologia`, `metodologia`, `descripcion`, `cuentaCreador`, `created`, `modified`) VALUES
(1, 'PERT', 'Herramienta en la organizacion de tiempo', 'LM11092-3', '2020-04-01 21:32:12', '2020-05-10 19:43:49'),
(2, 'SCRUM', 'Primera metodologia agregada', 'LM11092-3', '2020-04-24 21:11:54', '2020-04-24 21:11:54');

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
  `PersonaPrivilegio` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Salon` varchar(30) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `PersonaDNI`, `PersonaNombre`, `PersonaApellido`, `PersonaTelefono`, `PersonaDireccion`, `CuentaCodigo`, `PersonaPrivilegio`, `Salon`) VALUES
(1, '00447711', 'Super', 'ADMINISTRADOR', '2481139051', 'MEXICO', 'LM93499-1', 'Administrador', 'N/A'),
(10, '987987899', 'docente', 'PRINCIPAL', '89789689', 'MEXICO', 'LM11092-3', 'Docente', '4A'),
(11, '798789798', 'Estudiante', 'ESCOLAR', '98797897', 'COLOMBIA', 'LM55041-4', 'Estudiante', '4A'),
(12, '89789798', 'Jorge', 'CHAVEZ', '896786765', 'BUCARAMANGA', 'LM73754-5', 'Docente', '5LA'),
(17, '8767', 'Leonel', 'MEDEL', '68768768', 'Calle 11A', 'LM87917-6', 'Administrador', 'N/A'),
(18, '685856', 'Luis Antonio', 'PONCE', '78676876', 'BUCARAMANGA', 'LM59856-7', 'Estudiante', '4A'),
(19, '976976', 'Hector Jair', 'BENAVIDES', '987697698', 'SAN MARTIN', 'LM92282-8', 'Estudiante', '4A'),
(20, '9868969', 'Jose', 'PEREZ', '968997897', 'CHOLULA', 'LM29533-9', 'Estudiante', '4A'),
(21, '9889789', 'Maria Cristal', 'LOPEZ', '789789786', 'HUEJOTZINGO', 'LM84603-10', 'Estudiante', '4A'),
(22, '90980978', 'Leticia', 'HERNANDEZ', '98798698', 'EL VERDE', 'LM78816-11', 'Estudiante', '4A'),
(23, '9878979', 'Omar', 'GARCIA', '877989', 'SANTA CATARINA', 'LM08913-12', 'Estudiante', '4A'),
(24, '897687900', 'Gabriel', 'ALONSO', '87985785', 'SAN LUCAS', 'LM20551-13', 'Estudiante', '4A'),
(25, '8987897', 'Jair', 'SANCHEZ', '89667867', 'PUEBLA', 'LM43600-14', 'Estudiante', '4A'),
(27, '98798798', 'Javier', 'CORTES', '98686987897', 'Ciudad de Mexico', 'LM52219-16', 'Estudiante', '4A'),
(29, '314134134', 'Maria', 'MENDEZ', '9879879880', 'CDMX', 'LM34913-16', 'Administrador', 'N/A'),
(36, '98789798', 'oikhioioho', 'iohohiog', '7879798789', 'ubgjuogo', 'LM40080-17', 'Estudiante', '5LA'),
(37, '8978978', 'hbhbhjb', 'jhbhjbhjbj', '998789797', 'uihhiuhu', 'LM05170-17', 'Estudiante', '5LA'),
(38, '79789798', 'Enrique', 'HERNANDEZ', '6786789899', 'PUEBLA', 'LM72734-18', 'Estudiante', 'Sin salon');

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
(5, 'Primer proyecto Prog web', '2020-04-20', '2020-04-23', 'LM11092-3', '2020-04-23', '2020-05-04'),
(6, 'Proyecto de jorge', '2020-04-20', '2020-05-31', 'LM73754-5', '2020-04-23', '2020-04-23'),
(7, 'Proyecto web', '2020-04-20', '2020-05-30', 'LM11092-3', '2020-05-03', '2020-05-03'),
(8, 'Proyecto PHP', '2020-04-20', '2020-08-20', 'LM11092-3', '2020-05-04', '2020-05-04'),
(9, 'App web por CORONA', '2020-04-20', '2020-04-23', 'LM50866-15', '2020-05-08', '2020-05-08');

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
(5, 7, 1, 'Relacionar metodologia', 'LM11092-3', '2020-05-03 17:03:33', '2020-05-03 17:03:33'),
(6, 8, 2, 'Hacer un proyecto con PHP y la metodologia SCRUM', 'LM11092-3', '2020-05-04 18:21:58', '2020-05-04 18:21:58'),
(7, 5, 2, 'Mostrar la metodologia en el primer Proyecto', 'LM11092-3', '2020-05-04 19:11:22', '2020-05-04 19:11:22');

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
(4, '4A'),
(5, '5LA');

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
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `id_asignacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `cuenta_equipo`
--
ALTER TABLE `cuenta_equipo`
  MODIFY `id_equipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fases`
--
ALTER TABLE `fases`
  MODIFY `id_fase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `fuente`
--
ALTER TABLE `fuente`
  MODIFY `id_fuente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `historia`
--
ALTER TABLE `historia`
  MODIFY `id_historia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `metodologia`
--
ALTER TABLE `metodologia`
  MODIFY `id_metodologia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `proyecto_metodologia`
--
ALTER TABLE `proyecto_metodologia`
  MODIFY `id_proyecto_metodologia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- AUTO_INCREMENT de la tabla `salon`
--
ALTER TABLE `salon`
  MODIFY `id_salon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
