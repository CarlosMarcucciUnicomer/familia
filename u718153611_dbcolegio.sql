-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2023 a las 02:21:25
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u718153611_dbcolegio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `idalum` int(11) NOT NULL,
  `dnia` char(8) NOT NULL,
  `noma` varchar(25) NOT NULL,
  `apea` varchar(25) NOT NULL,
  `edad` varchar(15) NOT NULL,
  `direcc` varchar(50) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `gene` char(1) NOT NULL,
  `fenaci` date NOT NULL,
  `foto` varchar(255) NOT NULL,
  `estado` char(1) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`idalum`, `dnia`, `noma`, `apea`, `edad`, `direcc`, `correo`, `gene`, `fenaci`, `foto`, `estado`, `fere`) VALUES
(1, '85697412', 'Jose', 'Roque', '18', 'INDIO MAS NA', 'jroque@gmail.com', 'M', '1999-02-05', 'machu picchu.jpg', '1', '2022-05-25 00:57:02'),
(2, '78547851', 'Marcos ', 'Juarez Mendez', '14', 'Av.Larco', 'carlosju@gmail.com', 'M', '2021-10-05', 'alumno.jpg', '1', '2022-05-25 00:57:19'),
(3, '75487236', 'Luisa ', 'Lopez', '15', 'Calle de los campos zona 7 Guatemala', 'fiestasx@gmail.com', 'F', '2021-08-04', 'usuario mujer.png', '1', '2022-05-25 00:57:38'),
(4, '74859625', 'Pedro Alfonso', 'Lopez Ramirez', '17', 'Santa Margarita-1era etapa', 'plopezra@gmail.com', 'M', '2021-07-08', 'alumno.jpg', '1', '2021-10-12 16:10:55'),
(5, '75869425', 'Cinthia Tatiana', 'Ramirez Cueva', '16', 'Av.Morales Duarez', 'cramirezc@gmail.com', 'F', '2021-03-05', 'usuario mujer.png', '1', '2021-10-12 20:01:54'),
(6, '74512587', 'Hugo Fidel', 'Martinez Castro', '18', 'Av. Causarinas B-II', 'hmartinezc@gmail.com', 'M', '2020-06-17', 'alumno.jpg', '1', '2021-10-12 23:24:32'),
(7, '89674522', 'Flavia Isabela', 'Caceda Martinez', '13', 'Villa California', 'flaviaca@gmail.com', 'F', '2021-09-29', 'usuario mujer.png', '1', '2021-10-28 02:03:19'),
(8, '85741202', 'Carolina Andreas', 'Mendez Palacios', '15', 'Av.Miraflores125', 'mendezcaro@gmail.com', 'F', '2021-08-06', 'usuario mujer.png', '1', '2022-04-19 05:07:39'),
(13, '00277655', 'pablo', 'mijangos de la cru', '16', 'chimaltenango zona 3', 'pablo@gmail.com', 'M', '2022-04-05', 'abstract-3d-cube-wallpaper-preview.jpg', '1', '2022-05-25 01:03:49'),
(15, '1234', 'Pablo', 'Mijangos', '12', 'chimaltenango zona 3', 'jo@hmail.com', 'M', '2021-05-14', 'abstract-3d-cube-wallpaper-preview.jpg', '1', '2022-05-27 01:06:46'),
(16, '1234567', 'allan', 'acan zacarias', '17', 'chimaltenango zona 3', 'allan@gmail.com', 'M', '2022-04-19', 'abstract-3d-cube-wallpaper-preview.jpg', '1', '2022-04-20 00:41:45'),
(19, '123455', 'pablo', 'mijnagos', '17', 'chimaltenango zona 3', 'pab@gmail.com', 'M', '2022-04-28', 'abstract-3d-cube-wallpaper-preview.jpg', '1', '2022-04-29 01:00:52'),
(20, '25325213', 'MARIA SOFIA', 'VIDES MARTINEZ', '25', 'CALLE DE LAS ANIMAS ANTIGUA', 'SOFE24GT@GMAIL.COM', 'F', '1992-06-20', '1600993945916-1.jpg', '1', '2022-05-14 01:10:14'),
(21, '12345678', 'Estuardo Eduardo', 'Cruz perez', '13', 'chimaltenango zona 3', 'es@gmail.com', 'M', '2022-05-06', 'alumno.jpg', '1', '2022-05-25 01:03:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alum_secc`
--

CREATE TABLE `alum_secc` (
  `idaluse` int(11) NOT NULL,
  `idsec` int(11) NOT NULL,
  `idalum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `alum_secc`
--

INSERT INTO `alum_secc` (`idaluse`, `idsec`, `idalum`) VALUES
(2, 3, 1),
(3, 3, 2),
(4, 3, 6),
(5, 3, 8),
(7, 1, 4),
(8, 2, 7),
(10, 1, 3),
(16, 4, 5),
(27, 1, 13),
(32, 9, 20),
(33, 6, 15),
(34, 5, 16),
(37, 4, 2),
(38, 4, 4),
(39, 4, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asisten_alumn`
--

CREATE TABLE `asisten_alumn` (
  `idasisa` int(11) NOT NULL,
  `idalum` int(11) NOT NULL,
  `iddoce` int(11) NOT NULL,
  `idsec` int(11) NOT NULL,
  `presen` varchar(25) NOT NULL,
  `fecha_create` date NOT NULL,
  `fechre` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `asisten_alumn`
--

INSERT INTO `asisten_alumn` (`idasisa`, `idalum`, `iddoce`, `idsec`, `presen`, `fecha_create`, `fechre`) VALUES
(1, 2, 4, 2, 'Asistio', '2021-11-24', '2021-11-24 05:00:00'),
(2, 7, 4, 2, 'Asistio', '2021-11-24', '2021-11-24 05:00:00'),
(3, 8, 4, 2, 'Tarde', '2021-11-23', '2021-11-24 05:00:00'),
(4, 3, 4, 1, 'Falto', '2021-11-24', '2021-11-24 05:00:00'),
(6, 5, 4, 1, 'Tarde', '2021-11-25', '2021-11-24 05:00:00'),
(7, 1, 6, 4, 'Asistio', '2021-11-24', '2021-11-24 05:00:00'),
(8, 2, 6, 4, 'Asistio', '2021-11-24', '2021-11-24 05:00:00'),
(17, 4, 6, 4, 'Tarde', '2021-11-25', '2021-11-24 05:00:00'),
(19, 1, 4, 6, 'Asistio', '2021-11-29', '2021-11-29 05:00:00'),
(20, 2, 4, 6, 'Asistio', '2021-11-29', '2021-11-29 05:00:00'),
(23, 2, 4, 2, 'Asistio', '2021-11-29', '2021-11-29 05:00:00'),
(24, 7, 4, 2, 'Asistio', '2021-11-29', '2021-11-29 05:00:00'),
(28, 5, 4, 1, 'Asistio', '2021-11-29', '2021-11-29 05:00:00'),
(31, 8, 6, 5, 'Asistio', '2022-04-12', '2022-04-12 06:00:00'),
(33, 6, 6, 5, 'Asistio', '2022-04-13', '2022-04-13 06:00:00'),
(34, 1, 6, 5, 'Asistio', '2022-04-13', '2022-04-13 06:00:00'),
(35, 8, 6, 5, 'Tarde', '2022-04-13', '2022-04-13 06:00:00'),
(36, 6, 6, 5, 'Falto', '2022-04-13', '2022-04-13 06:00:00'),
(37, 1, 6, 5, 'Asistio', '2022-04-16', '2022-04-13 06:00:00'),
(38, 8, 6, 5, 'Tarde', '2022-04-16', '2022-04-13 06:00:00'),
(39, 6, 6, 5, 'Falto', '2022-04-16', '2022-04-13 06:00:00'),
(40, 1, 6, 5, 'Asistio', '2022-04-30', '2022-04-13 06:00:00'),
(41, 8, 6, 5, 'Asistio', '2022-04-30', '2022-04-13 06:00:00'),
(42, 6, 6, 5, 'Asistio', '2022-04-30', '2022-04-13 06:00:00'),
(43, 1, 6, 5, 'Asistio', '2022-04-13', '2022-04-13 06:00:00'),
(44, 1, 6, 4, 'Asistio', '2022-04-12', '2022-04-13 06:00:00'),
(45, 2, 6, 4, 'Tarde', '2022-04-12', '2022-04-13 06:00:00'),
(46, 3, 6, 4, 'Asistio', '2022-04-12', '2022-04-13 06:00:00'),
(47, 4, 6, 4, 'Tarde', '2022-04-12', '2022-04-13 06:00:00'),
(48, 5, 6, 4, 'Asistio', '2022-04-12', '2022-04-13 06:00:00'),
(49, 6, 6, 4, 'Tarde', '2022-04-12', '2022-04-13 06:00:00'),
(50, 7, 6, 4, 'Asistio', '2022-04-12', '2022-04-13 06:00:00'),
(51, 8, 6, 4, 'Falto', '2022-04-12', '2022-04-13 06:00:00'),
(52, 1, 6, 4, 'Asistio', '2022-04-28', '2022-04-29 00:00:00'),
(53, 2, 6, 4, 'Asistio', '2022-04-28', '2022-04-29 00:00:00'),
(54, 3, 6, 4, 'Asistio', '2022-04-28', '2022-04-29 00:00:00'),
(55, 4, 6, 4, 'Asistio', '2022-04-28', '2022-04-29 00:00:00'),
(56, 5, 6, 4, 'Asistio', '2022-04-28', '2022-04-29 00:00:00'),
(57, 6, 6, 4, 'Asistio', '2022-04-28', '2022-04-29 00:00:00'),
(58, 7, 6, 4, 'Asistio', '2022-04-28', '2022-04-29 00:00:00'),
(59, 8, 6, 4, 'Asistio', '2022-04-28', '2022-04-29 00:00:00'),
(60, 1, 6, 5, 'Tarde', '2022-04-29', '2022-04-29 00:00:00'),
(61, 8, 6, 5, 'Tarde', '2022-04-29', '2022-04-29 00:00:00'),
(62, 6, 6, 5, 'Tarde', '2022-04-29', '2022-04-29 00:00:00'),
(63, 4, 12, 1, 'Asistio', '2022-05-15', '2022-05-15 00:00:00'),
(64, 4, 12, 1, 'Asistio', '2022-05-16', '2022-05-16 00:00:00'),
(65, 3, 12, 1, 'Asistio', '2022-05-16', '2022-05-16 00:00:00'),
(66, 5, 12, 1, 'Asistio', '2022-05-16', '2022-05-16 00:00:00'),
(67, 13, 12, 1, 'Asistio', '2022-05-16', '2022-05-16 00:00:00'),
(68, 1, 12, 9, 'Asistio', '2022-05-19', '2022-05-19 00:00:00'),
(69, 2, 12, 9, 'Asistio', '2022-05-19', '2022-05-19 00:00:00'),
(70, 4, 12, 9, 'Asistio', '2022-05-19', '2022-05-19 00:00:00'),
(71, 5, 12, 9, 'Asistio', '2022-05-19', '2022-05-19 00:00:00'),
(72, 20, 12, 9, 'Asistio', '2022-05-19', '2022-05-19 00:00:00'),
(73, 5, 6, 4, 'Asistio', '2022-05-25', '2022-05-25 00:00:00'),
(74, 5, 6, 4, 'Asistio', '2022-05-25', '2022-05-25 00:00:00'),
(75, 2, 6, 4, 'Asistio', '2022-05-25', '2022-05-25 00:00:00'),
(76, 21, 6, 4, 'Asistio', '2022-05-25', '2022-05-25 00:00:00'),
(77, 4, 6, 4, 'Asistio', '2022-05-25', '2022-05-25 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `idautor` int(11) NOT NULL,
  `datos` varchar(35) NOT NULL,
  `biog` varchar(255) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`idautor`, `datos`, `biog`, `foto`, `fere`) VALUES
(1, 'Juan Perez', 'Nació en Alicante hace algún tiempo. Es cuentista porque todo el rato lleva un cuento en la cabeza. O más. Piensa en ellos. Se le salen de la boca. Se le ponen en el papel mientras él trata de acercarse a sus secretos. ', 'pablo.jpg', '2022-05-17 15:38:38'),
(2, 'William Dunham', 'William Dunham es un escritor estadounidense originalmente dedicado al área matemática de la topología, pero que finalmente canalizó sus intereses hacia la historia de la matemática', 'Bill-Dunham-(2010).jpg', '2022-04-29 16:07:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `idcur` int(11) NOT NULL,
  `nomcur` varchar(50) NOT NULL,
  `idper` int(11) NOT NULL,
  `codgra` int(11) NOT NULL,
  `codsub` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `estado` char(1) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idcur`, `nomcur`, `idper`, `codgra`, `codsub`, `foto`, `estado`, `fere`) VALUES
(1, 'matematica', 2, 1, 1, '', '1', '2021-11-22 04:39:26'),
(2, 'comunicacion', 2, 1, 1, '', '1', '2021-11-22 04:41:41'),
(3, 'administración', 2, 1, 2, '', '1', '2022-05-27 01:07:45'),
(5, 'fisica 1', 2, 1, 1, 'Capture001.png', '1', '2022-05-14 01:33:12'),
(6, 'Programacion I', 2, 1, 5, 'Capture001.png', '1', '2022-04-12 17:13:31'),
(8, 'Calculo', 2, 1, 1, 'abstract-3d-cube-wallpaper-preview.jpg', '1', '2022-04-19 05:09:41'),
(9, 'Matematica 5', 2, 1, 1, 'abstract-3d-cube-wallpaper-preview.jpg', '1', '2022-04-29 01:03:16'),
(10, 'Computación', 2, 1, 1, 'fondob1.jpg', '1', '2022-05-27 01:08:08'),
(11, 'Bases de Datos', 2, 1, 2, '', '1', '2022-05-15 18:16:32'),
(12, 'Estadistica 4', 2, 1, 3, '', '1', '2022-05-19 22:11:44'),
(13, 'Estadistica', 2, 1, 2, 'estadistica.jpg', '1', '2022-05-26 23:56:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `iddoce` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `dni` char(8) NOT NULL,
  `genero` char(1) NOT NULL,
  `correo` varchar(25) NOT NULL,
  `telefono` char(9) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `cargo` char(1) NOT NULL,
  `estado` char(1) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`iddoce`, `nombre`, `apellido`, `dni`, `genero`, `correo`, `telefono`, `imagen`, `usuario`, `clave`, `cargo`, `estado`, `fecha`) VALUES
(3, 'Jose Luis', 'Perez Paredes', '74859698', 'M', 'jlperez@gmail.com', '789456123', '2427.jpg', 'Jose Perez', 'b0baee9d279d34fa1dfd71aadb908c3f', '2', '1', '2021-11-29 02:54:30'),
(4, 'Maria Juana ', 'Sandoval Jimenez', '78458751', 'F', 'msandoval@gmail.com', '50550012', 'usuario mujer.png', 'Maria100', '827ccb0eea8a706c4c34a16891f84e7b', '2', '1', '2022-05-14 01:20:26'),
(5, 'Karina Susana', 'Diaz Gomez', '84569258', 'F', 'kdiazs@gmail.com', '968574120', 'usuario mujer.png', 'Karina15', '89943e555989245e3731e8408511115a', '2', '1', '2021-11-03 16:39:14'),
(6, 'Rosa Maria', 'Lopez Suarez', '84578596', 'F', 'lopezro@gmail.com', '968574120', 'usuario mujer.png', 'Rosa20', 'e10adc3949ba59abbe56e057f20f883e', '2', '1', '2022-04-29 00:37:59'),
(7, 'Allan', 'Acan', '2131', 'M', 'asdasd@gmail.com', '5891923', 'Capture001.png', 'allan', '2ff74c65d12e62572f88c42643f4ce34', '2', '1', '2022-04-13 17:14:42'),
(8, 'Allan', 'Barrios', '12312', 'M', 's@gail.com', '50105020', 'Capture001.png', 'asdasd', 'b5b037a78522671b89a2c1b21d9b80c6', '2', '1', '2022-05-27 01:07:17'),
(11, 'jorge', 'lopez', '12345', 'M', 'jor@gmail.com', '123456789', 'abstract-3d-cube-wallpaper-preview.jpg', 'lopez', 'c5a1a98649a7874de0def093eb136262', '2', '1', '2022-04-19 19:39:13'),
(12, 'Juan', 'Perez', '45461235', 'M', 'juanperez@gmail.com', '4567545', '', 'juan', 'e10adc3949ba59abbe56e057f20f883e', '2', '1', '2022-05-08 03:42:16'),
(13, 'JOSE MARIO', 'PAZ DE LEON', '30572022', 'M', 'PAZ250@HOTMAIL.COM', '58254200', '1600993945916-1.jpg', 'JPAZ22', '9407c826d8e3c07ad37cb2d13d1cb641', '2', '1', '2022-05-14 01:11:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edito`
--

CREATE TABLE `edito` (
  `idedito` int(11) NOT NULL,
  `nomedi` varchar(100) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `edito`
--

INSERT INTO `edito` (`idedito`, `nomedi`, `fere`) VALUES
(2, 'Grupo Editorial Caja Negra.', '2021-11-28 04:05:21'),
(3, 'Colmena Editores.', '2021-11-28 04:05:28'),
(4, 'Editorial Ambar.', '2021-11-28 04:05:35'),
(5, 'Editorial Futura.', '2021-11-28 04:05:41'),
(6, ' Editorial Macro.', '2021-11-28 04:05:47'),
(7, 'Editorial María Trinidad.', '2021-11-28 04:05:58'),
(8, 'Análisis', '2022-05-27 00:59:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `codgra` int(11) NOT NULL,
  `idper` int(11) NOT NULL,
  `nomgra` varchar(25) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`codgra`, `idper`, `nomgra`, `fere`) VALUES
(1, 2, 'Secundaria', '2021-11-03 16:49:40'),
(4, 2, 'Primaria', '2022-04-19 05:09:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `idlibro` int(11) NOT NULL,
  `nomlibro` varchar(35) NOT NULL,
  `codsub` int(11) NOT NULL,
  `idcur` int(11) NOT NULL,
  `idautor` int(11) NOT NULL,
  `idedito` int(11) NOT NULL,
  `img` varchar(150) NOT NULL,
  `sinop` varchar(255) NOT NULL,
  `pag` varchar(25) NOT NULL,
  `aniopub` date NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` char(3) NOT NULL,
  `estado` char(1) NOT NULL,
  `idio` varchar(25) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`idlibro`, `nomlibro`, `codsub`, `idcur`, `idautor`, `idedito`, `img`, `sinop`, `pag`, `aniopub`, `precio`, `stock`, `estado`, `idio`, `fere`) VALUES
(1, 'Ciencias naturales', 1, 2, 1, 2, 'profeico.png', 'dsadd', '280 paginas', '2018-11-07', 25.00, '90', '1', 'English', '2022-05-27 01:04:00'),
(2, 'Redes', 2, 3, 1, 3, '39.jpg', 'saass', '120 paginas', '2015-11-03', 100.00, '96', '1', 'Spanish', '2022-05-27 01:05:27'),
(3, 'La Ciencia de Los Diptongos ', 1, 1, 1, 6, '53.jpg', 'dadad', '100 paginas', '2018-11-14', 22.00, '97', '1', 'Spanish', '2022-05-27 01:02:13'),
(4, 'Algoritmo 2', 1, 1, 1, 5, '61.png', 'czczc', '100 paginas', '2014-11-19', 200.00, '97', '1', 'Spanish', '2022-05-27 01:02:30'),
(5, 'Libro de matematicas', 1, 1, 2, 4, 'vivir-amar-y-sentir-las-matematicas.jpg', 'Ayuda mejorar las capacidad logicas', '200', '2022-01-28', 150.00, '25', '1', 'Spanish', '2022-04-29 16:09:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_prestamo`
--

CREATE TABLE `libro_prestamo` (
  `idlibpre` int(11) NOT NULL,
  `idlibro` int(11) NOT NULL,
  `canti` int(11) NOT NULL,
  `idprest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `libro_prestamo`
--

INSERT INTO `libro_prestamo` (`idlibpre`, `idlibro`, `canti`, `idprest`) VALUES
(1, 1, 2, 1),
(2, 2, 3, 1),
(3, 1, 2, 2),
(4, 2, 3, 2),
(5, 3, 3, 2),
(6, 4, 3, 2),
(7, 1, 3, 3),
(8, 1, 1, 4),
(9, 2, 1, 5),
(10, 1, 2, 6),
(11, 1, 2, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `idNota` int(11) NOT NULL,
  `codgra` int(11) NOT NULL,
  `codsub` int(11) NOT NULL,
  `idcur` int(11) NOT NULL,
  `idsec` int(11) NOT NULL,
  `idalum` int(11) NOT NULL,
  `Bimestre` varchar(50) NOT NULL,
  `Nota` int(11) NOT NULL,
  `iddoce` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`idNota`, `codgra`, `codsub`, `idcur`, `idsec`, `idalum`, `Bimestre`, `Nota`, `iddoce`) VALUES
(1, 1, 1, 1, 1, 2, 'Primer', 80, 0),
(2, 1, 1, 1, 1, 2, 'Segundo', 70, 0),
(3, 1, 1, 1, 1, 1, 'Primer', 75, 0),
(4, 1, 1, 1, 1, 1, 'Segundo', 55, 0),
(5, 1, 1, 2, 1, 2, 'Primer', 90, 0),
(6, 1, 1, 2, 1, 2, 'Segundo', 70, 0),
(7, 1, 1, 6, 1, 2, 'Primer', 65, 0),
(9, 1, 1, 6, 1, 2, 'Segundo', 80, 0),
(10, 1, 1, 1, 1, 3, 'Cuarto Bimestre', 100, 12),
(11, 1, 1, 1, 1, 3, 'Cuarto Bimestre', 91, 12),
(12, 1, 1, 1, 1, 3, 'Cuarto Bimestre', 91, 12),
(13, 1, 1, 1, 1, 3, 'Cuarto Bimestre', 45, 12),
(14, 1, 1, 1, 1, 3, 'Cuarto Bimestre', 45, 12),
(15, 1, 1, 1, 1, 3, 'Cuarto Bimestre', 45, 12),
(16, 1, 1, 1, 1, 3, 'Cuarto Bimestre', 45, 12),
(17, 1, 1, 1, 1, 3, 'Cuarto Bimestre', 45, 12),
(18, 1, 1, 1, 1, 3, 'Cuarto Bimestre', 45, 12),
(19, 1, 1, 1, 1, 3, 'Cuarto Bimestre', 45, 12),
(20, 1, 1, 1, 1, 3, 'Cuarto Bimestre', 45, 12),
(21, 1, 1, 1, 1, 3, 'Cuarto Bimestre', 45, 12),
(22, 1, 1, 1, 1, 3, 'Cuarto Bimestre', 45, 12),
(25, 1, 1, 1, 1, 5, 'Cuarto Bimestre', 42, 12),
(26, 1, 1, 1, 1, 5, 'Cuarto Bimestre', 42, 12),
(27, 1, 1, 1, 1, 13, 'Tercer Bimestre', 58, 12),
(28, 1, 1, 1, 1, 4, 'Segundo Bimestre', 66, 12),
(29, 1, 1, 1, 1, 3, 'Tercer Bimestre', 66, 12),
(30, 1, 1, 1, 1, 13, 'Cuarto Bimestre', 75, 12),
(31, 1, 2, 11, 9, 4, 'Segundo Bimestre', 80, 12),
(32, 1, 2, 11, 9, 4, 'Tercer Bimestre', 91, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `idper` int(11) NOT NULL,
  `nompe` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`idper`, `nompe`) VALUES
(2, '2022-I'),
(3, '2022-II'),
(4, '2023-1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `idprest` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` char(1) NOT NULL,
  `idalum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`idprest`, `fecha`, `estado`, `idalum`) VALUES
(1, '2021-11-28', '1', 7),
(2, '2021-11-28', '1', 3),
(3, '2021-11-28', '1', 8),
(4, '2022-04-29', '0', 19),
(5, '2022-04-29', '0', 16),
(6, '2022-05-18', '0', 19),
(7, '2022-05-18', '0', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `idsec` int(11) NOT NULL,
  `nomsec` char(1) NOT NULL,
  `codsub` int(11) NOT NULL,
  `iddoce` int(11) NOT NULL,
  `idcur` int(11) NOT NULL,
  `capa` char(2) NOT NULL,
  `estado` char(1) NOT NULL,
  `fecre` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`idsec`, `nomsec`, `codsub`, `iddoce`, `idcur`, `capa`, `estado`, `fecre`) VALUES
(1, 'A', 1, 12, 1, '20', '1', '2022-05-08 03:43:56'),
(2, 'B', 1, 4, 2, '20', '1', '2021-11-23 22:53:23'),
(3, 'B', 2, 3, 3, '20', '1', '2021-11-23 22:57:35'),
(4, 'E', 1, 6, 1, '20', '1', '2021-11-24 16:33:19'),
(5, 'E', 1, 6, 2, '20', '1', '2021-11-24 16:33:20'),
(6, 'D', 2, 4, 3, '40', '1', '2021-11-29 02:50:26'),
(7, 'A', 2, 7, 3, '10', '1', '2022-04-12 17:12:09'),
(8, 'A', 5, 3, 6, '50', '1', '2022-04-12 17:14:07'),
(9, 'A', 2, 12, 11, '15', '1', '2022-05-15 18:20:51'),
(10, 'A', 3, 12, 12, '25', '1', '2022-05-19 22:12:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subgrado`
--

CREATE TABLE `subgrado` (
  `codsub` int(11) NOT NULL,
  `codgra` int(11) NOT NULL,
  `noms` varchar(40) NOT NULL,
  `estado` char(1) NOT NULL,
  `fecre` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `subgrado`
--

INSERT INTO `subgrado` (`codsub`, `codgra`, `noms`, `estado`, `fecre`) VALUES
(1, 1, 'Primero ', '1', '2022-04-19 04:46:13'),
(2, 1, 'Segundo', '1', '2021-10-12 05:04:07'),
(3, 1, 'Tercero', '1', '2021-10-12 05:04:16'),
(4, 1, 'Cuarto', '1', '2021-10-12 05:04:26'),
(5, 1, 'Quinto', '1', '2021-10-12 05:04:37'),
(6, 4, 'Primero ', '1', '2022-04-19 05:10:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `cargo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `correo`, `clave`, `cargo`) VALUES
(1, 'Grace', 'Grace25', 'gipanaque@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1'),
(4, 'Allan', 'Allan', 'allanacan@gmail.com', 'e21ec0e7dbfbe757e0930f95a077b434', '1'),
(5, 'Pablo', 'Pablo', 'pablomijangos4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1'),
(6, 'Cristofer', 'Cristofer', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1'),
(7, 'Luisa', 'Luisa', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`idalum`);

--
-- Indices de la tabla `alum_secc`
--
ALTER TABLE `alum_secc`
  ADD PRIMARY KEY (`idaluse`),
  ADD KEY `idsec` (`idsec`),
  ADD KEY `idalum` (`idalum`);

--
-- Indices de la tabla `asisten_alumn`
--
ALTER TABLE `asisten_alumn`
  ADD PRIMARY KEY (`idasisa`),
  ADD KEY `idalum` (`idalum`),
  ADD KEY `iddoce` (`iddoce`),
  ADD KEY `idsec` (`idsec`);

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`idautor`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idcur`),
  ADD KEY `idper` (`idper`),
  ADD KEY `codgra` (`codgra`),
  ADD KEY `codsub` (`codsub`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`iddoce`);

--
-- Indices de la tabla `edito`
--
ALTER TABLE `edito`
  ADD PRIMARY KEY (`idedito`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`codgra`),
  ADD KEY `idper` (`idper`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`idlibro`),
  ADD KEY `idautor` (`idautor`),
  ADD KEY `idedito` (`idedito`),
  ADD KEY `codsub` (`codsub`),
  ADD KEY `idcur` (`idcur`);

--
-- Indices de la tabla `libro_prestamo`
--
ALTER TABLE `libro_prestamo`
  ADD PRIMARY KEY (`idlibpre`),
  ADD KEY `idlibro` (`idlibro`),
  ADD KEY `idprest` (`idprest`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`idNota`),
  ADD KEY `codgra` (`codgra`),
  ADD KEY `codsub` (`codsub`),
  ADD KEY `idcur` (`idcur`),
  ADD KEY `idsec` (`idsec`),
  ADD KEY `idalum` (`idalum`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`idper`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`idprest`),
  ADD KEY `idalum` (`idalum`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`idsec`),
  ADD KEY `codsub` (`codsub`),
  ADD KEY `iddoce` (`iddoce`),
  ADD KEY `idcur` (`idcur`);

--
-- Indices de la tabla `subgrado`
--
ALTER TABLE `subgrado`
  ADD PRIMARY KEY (`codsub`),
  ADD KEY `codgra` (`codgra`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `idalum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `alum_secc`
--
ALTER TABLE `alum_secc`
  MODIFY `idaluse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `asisten_alumn`
--
ALTER TABLE `asisten_alumn`
  MODIFY `idasisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `idautor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `idcur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `iddoce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `edito`
--
ALTER TABLE `edito`
  MODIFY `idedito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `codgra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `idlibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `libro_prestamo`
--
ALTER TABLE `libro_prestamo`
  MODIFY `idlibpre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `idNota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
  MODIFY `idper` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `idprest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `idsec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `subgrado`
--
ALTER TABLE `subgrado`
  MODIFY `codsub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alum_secc`
--
ALTER TABLE `alum_secc`
  ADD CONSTRAINT `alum_secc_ibfk_1` FOREIGN KEY (`idsec`) REFERENCES `seccion` (`idsec`),
  ADD CONSTRAINT `alum_secc_ibfk_2` FOREIGN KEY (`idalum`) REFERENCES `alumno` (`idalum`);

--
-- Filtros para la tabla `asisten_alumn`
--
ALTER TABLE `asisten_alumn`
  ADD CONSTRAINT `asisten_alumn_ibfk_1` FOREIGN KEY (`idalum`) REFERENCES `alumno` (`idalum`),
  ADD CONSTRAINT `asisten_alumn_ibfk_2` FOREIGN KEY (`iddoce`) REFERENCES `docente` (`iddoce`),
  ADD CONSTRAINT `asisten_alumn_ibfk_3` FOREIGN KEY (`idsec`) REFERENCES `seccion` (`idsec`);

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`idper`) REFERENCES `periodo` (`idper`),
  ADD CONSTRAINT `curso_ibfk_2` FOREIGN KEY (`codgra`) REFERENCES `grado` (`codgra`),
  ADD CONSTRAINT `curso_ibfk_3` FOREIGN KEY (`codsub`) REFERENCES `subgrado` (`codsub`);

--
-- Filtros para la tabla `grado`
--
ALTER TABLE `grado`
  ADD CONSTRAINT `grado_ibfk_1` FOREIGN KEY (`idper`) REFERENCES `periodo` (`idper`);

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`idautor`) REFERENCES `autor` (`idautor`),
  ADD CONSTRAINT `libro_ibfk_2` FOREIGN KEY (`idedito`) REFERENCES `edito` (`idedito`),
  ADD CONSTRAINT `libro_ibfk_3` FOREIGN KEY (`codsub`) REFERENCES `subgrado` (`codsub`),
  ADD CONSTRAINT `libro_ibfk_4` FOREIGN KEY (`idcur`) REFERENCES `curso` (`idcur`);

--
-- Filtros para la tabla `libro_prestamo`
--
ALTER TABLE `libro_prestamo`
  ADD CONSTRAINT `libro_prestamo_ibfk_1` FOREIGN KEY (`idlibro`) REFERENCES `libro` (`idlibro`),
  ADD CONSTRAINT `libro_prestamo_ibfk_2` FOREIGN KEY (`idprest`) REFERENCES `prestamo` (`idprest`);

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `NotasCodGrado` FOREIGN KEY (`codgra`) REFERENCES `grado` (`codgra`) ON UPDATE CASCADE,
  ADD CONSTRAINT `NotasCodSub` FOREIGN KEY (`codsub`) REFERENCES `subgrado` (`codsub`) ON UPDATE CASCADE,
  ADD CONSTRAINT `NotasIdAlumn` FOREIGN KEY (`idalum`) REFERENCES `alumno` (`idalum`) ON UPDATE CASCADE,
  ADD CONSTRAINT `NotasIdCur` FOREIGN KEY (`idcur`) REFERENCES `curso` (`idcur`) ON UPDATE CASCADE,
  ADD CONSTRAINT `NotasIdSec` FOREIGN KEY (`idsec`) REFERENCES `seccion` (`idsec`);

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`idalum`) REFERENCES `alumno` (`idalum`);

--
-- Filtros para la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD CONSTRAINT `seccion_ibfk_1` FOREIGN KEY (`codsub`) REFERENCES `subgrado` (`codsub`),
  ADD CONSTRAINT `seccion_ibfk_2` FOREIGN KEY (`iddoce`) REFERENCES `docente` (`iddoce`),
  ADD CONSTRAINT `seccion_ibfk_3` FOREIGN KEY (`idcur`) REFERENCES `curso` (`idcur`);

--
-- Filtros para la tabla `subgrado`
--
ALTER TABLE `subgrado`
  ADD CONSTRAINT `subgrado_ibfk_1` FOREIGN KEY (`codgra`) REFERENCES `grado` (`codgra`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
