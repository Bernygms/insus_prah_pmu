-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-07-2019 a las 23:31:30
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `insus_prah`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apps`
--

CREATE TABLE `apps` (
  `id_app` int(11) NOT NULL,
  `nombre_app` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `apps`
--

INSERT INTO `apps` (`id_app`, `nombre_app`) VALUES
(1, 'PRAH'),
(2, 'PMU');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_estado` int(11) NOT NULL,
  `nombre_estado` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `nombre_estado`) VALUES
(1, 'AGUASCALIENTES'),
(2, 'BAJA CALIFORNIA'),
(3, 'BAJA CALIFORNIA SUR'),
(4, 'CAMPECHE'),
(5, 'COAHUILA'),
(6, 'COLIMA'),
(7, 'CHIAPAS'),
(8, 'CHIHUAHUA'),
(9, 'DISTRITO FEDERAL'),
(10, 'DURANGO'),
(11, 'GUANAJUATO'),
(12, 'GUERRERO'),
(13, 'HIDALGO'),
(14, 'JALISCO'),
(15, 'MÉXICO'),
(16, 'MICHOACAN'),
(17, 'MORELOS'),
(18, 'NAYARIT'),
(19, 'NUEVO LEON'),
(20, 'OAXACA'),
(21, 'PUEBLA'),
(22, 'QUERETARO'),
(23, 'QUINTANA ROO'),
(24, 'SAN LUIS POTOSI'),
(25, 'SINALOA'),
(26, 'SONORA'),
(27, 'TABASCO'),
(28, 'TAMAULIPAS'),
(29, 'TLAXCALA'),
(30, 'VERACRUZ'),
(31, 'YUCATAN'),
(32, 'ZACATECAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `id_file` int(11) NOT NULL,
  `num_prop` varchar(7) NOT NULL,
  `ofic_porp` varchar(100) NOT NULL,
  `anexo6` varchar(100) NOT NULL,
  `anexo7` varchar(100) NOT NULL,
  `lis_de_bene` varchar(100) NOT NULL,
  `ofi_de_auto` varchar(100) NOT NULL,
  `ofi_de_acue` varchar(100) NOT NULL,
  `acue_de_libe` varchar(100) NOT NULL,
  `cier_ejer_y_cont` varchar(100) NOT NULL,
  `vobo` int(11) NOT NULL,
  `fech_ini` date NOT NULL,
  `fech_end` date NOT NULL,
  `id_estado` int(11) NOT NULL,
  `anno` year(4) NOT NULL,
  `id_app_fk` int(11) NOT NULL,
  `comment_vobo` varchar(200) NOT NULL,
  `status_pro` int(2) NOT NULL,
  `comment_pro` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `sexo` int(2) NOT NULL,
  `edad` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `pais` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `id_app_fk` int(11) NOT NULL,
  `id_estado_fk` int(11) NOT NULL,
  `id_persona_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `usuario`, `correo`, `password`, `status`, `id_app_fk`, `id_estado_fk`, `id_persona_fk`) VALUES
(1, 'Bernardino Gms', 'Admin', 'bernardinogamescabanzo@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1, 0, 0),
(7, 'Bernard Games', '@Bernard', 'bernard@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1, 21, 0),
(10, 'AGUASCALIENTES', 'AGUASCALIENTES', 'sipo_@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1, 1, 0),
(15, 'Berny', '@berny', 'berny@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1, 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`id_app`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id_file`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
