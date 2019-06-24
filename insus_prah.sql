-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2019 a las 23:44:42
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

--
-- Volcado de datos para la tabla `files`
--

INSERT INTO `files` (`id_file`, `num_prop`, `ofic_porp`, `anexo6`, `anexo7`, `lis_de_bene`, `ofi_de_auto`, `ofi_de_acue`, `acue_de_libe`, `cier_ejer_y_cont`, `vobo`, `fech_ini`, `fech_end`, `id_estado`, `anno`, `id_app_fk`, `comment_vobo`, `status_pro`, `comment_pro`) VALUES
(1, '01-001', '01-001-77283eda5c193f557e3e2febfa7957d6.pdf', '01-001-7d2461a757e22ee89d25764d659cbe1a.pdf', '01-001-a6fa71a945c403102089952c6cef478c.pdf', '01-001-5f6b86da03e74f883d5378c3850a593f.pdf', '01-001-1736eec9916c7e6fd80a462fa1373f5e.pdf', '01-001-1c74485f8d2d8e9cac52bb7c0445bc09.pdf', '01-001-ab679f826c3fa3c23aab476d83e6b3fe.pdf', '01-001-4754c0db4d081b67de9b9763092f20f6.pdf', 1, '2019-04-13', '2019-04-26', 1, 2019, 1, 'Se aprueba, todos los documentos  están completos ', 0, ''),
(2, '01-002', '01-002-ee8a391607495b86352cddfe7fe2b71d.pdf', '01-002-f23b2040c582b8ebf4248fdfdf9df61b.pdf', '01-002-fbcdb0a2f23a08b16dbdac4fd52ac817.pdf', '01-002-add9caa65a753494379ba80c9b1d8c34.pdf', '01-002-af5dad91b5621f0fd1f43f3deaf20a3a.pdf', '01-002-796e33107e9930547021e7858b8c53d7.pdf', '01-002-322241210cc5afe3363f615896caab0f.pdf', '01-002-6d6a277f437ce9f194c8cd12fcc0d961.pdf', 0, '2019-04-13', '0000-00-00', 1, 2019, 1, '0', 0, ''),
(3, '02-001', '02-001-cddccef13fd2987e28fc63d12d70d429.pdf', '02-001-71305e615a8d4c8f4909c9ae964f9722.pdf', '02-001-f7c15120ead1581c86de7d97ce3a8870.pdf', '02-001-2d0e0f89ff75552ce70ff0586ae658eb.pdf', '02-001-4ea0ca386da8936095d9bb0388f0accc.pdf', '', '', '', 0, '2019-04-15', '0000-00-00', 2, 2019, 1, 'oks', 0, ''),
(4, '03-001', '03-001-8974f6d807c5849a556a3bc0afbfa0e4.pdf', '03-001-0c8bf5a7c07b66ab33f54c666b75a7cf.pdf', '03-001-edd7d088b845d950225108c1eeff568f.pdf', '03-001-0fd0e6d18b6ee730f12377bab2e218dc.pdf', '03-001-9d976aee6fb04ae1fe7b12f25efe32dc.pdf', '', '', '', 0, '2019-04-16', '0000-00-00', 3, 2019, 1, '', 0, ''),
(5, '01-000', '01-000-823ebc2ebed9c0f0318704355e6d460e.pdf', '01-000-091099a15714dd02e74de3b9244fdf78.pdf', '01-000-0d611c005b684af96f46fccc0ee4ff55.pdf', '01-000-3792216a9b4ccf63bbd92fad51ee5438.pdf', '', '', '', '', 0, '2019-04-16', '0000-00-00', 1, 2019, 2, '', 0, ''),
(6, '05-001', '05-001-82633eac6e480db85ae8e262eaba5d4a.pdf', '05-001-bcb7c671529e2ec2a7298827fabd1191.pdf', '05-001-f56de43aef783bb852032fdf965094ea.pdf', '05-001-e0a4ca7715b05d094979307b42f7d5ce.pdf', '', '', '', '', 0, '2019-04-16', '0000-00-00', 5, 2019, 1, '', 0, ''),
(7, '01-002', '01-002-6a37e915c0cfecb4435f74abc9e45374.pdf', '01-002-a990ed233543890e057d53d003f8a536.pdf', '01-002-5e728b36ba316a3dce6208cc36d5f7e6.pdf', '01-002-1b008d8c505e61aebecccd1fa83cd1ae.pdf', '01-002-a8bb49b9851e25ba818e60a02b3fadcf.pdf', '', '', '', 0, '2019-04-16', '0000-00-00', 32, 2019, 1, 'ok', 0, ''),
(10, '1-001', '1-001-b516ad6f91bf1669218d1f639fdbbff7.pdf', '1-001-8b5c2c4389838096becd60f77ed876d8.pdf', '1-001-3a0ea8f66362531d639a7245b0c3ca30.pdf', '1-001-86fa56c55d071a4eb1a80bba2337a26c.pdf', '', '', '', '', 0, '2019-04-17', '0000-00-00', 5, 2019, 1, '', 0, ''),
(11, '05-008', '05-008-d4dfa0b05dc357bda3fe029649d5b24b.pdf', '05-008-670e0204d66245b894d17b082fa720ca.pdf', '05-008-bdb1250d14115903c6378f4c52d0a719.pdf', '05-008-1d577fbdfb729eadc4db8cd3b01ada76.pdf', '', '', '', '', 0, '2019-04-17', '0000-00-00', 5, 2019, 1, '', 0, ''),
(12, '32-001', '32-001-c96e6798c141fcc6dd970ad144796397.pdf', '32-001-3a6e32b4be5c89d2dd2fe9d3ff63d7c6.pdf', '32-001-d3add8a2adfde8feaa8eb89b61527621.pdf', '32-001-2895e564fe14c91e8442e4015fae8a0e.pdf', '', '', '', '', 0, '2019-04-22', '0000-00-00', 32, 2019, 1, '', 0, ''),
(13, '31-001', '31-001-0a19ef2fdf49ad5117d01696ad78e7ca.pdf', '31-001-c97a661088cedd2f7f483dc13d139fe3.pdf', '31-001-87a9edb1db63427e67f47f39adcff58f.pdf', '31-001-a3301037da63a3fa98d516e6a1d8de6d.pdf', '', '', '', '', 0, '2019-04-22', '0000-00-00', 31, 2019, 1, '', 0, ''),
(14, '00-001', '00-001-19e8433d9a7004c88bb47a3e0c3122c1.pdf', '00-001-023e16777f79c11590699b2962a90f4d.pdf', '00-001-74881d4e473d67df19cf560f5fe75600.pdf', '00-001-b5996f370d4fcb58b43a84abf2961b1a.pdf', '', '', '', '', 0, '2019-04-23', '0000-00-00', 9, 2019, 1, '', 0, ''),
(16, '01-002', '01-002-9ee87786c770ff84b3df48e8322212b6.pdf', '01-002-8e2e2654c008d240b6d3223f1693d184.pdf', '01-002-a5c284da0b7b56847e0defbe702f7e69.pdf', '01-002-4f259dfbfb56ad3f79227859df650007.pdf', '01-002-e43c3ef83ccdba247a605d2268fda4b0.pdf', '', '', '', 0, '2019-04-25', '0000-00-00', 2, 2019, 1, '', 0, ''),
(17, '02-003', '02-003-9fd4a114219c0231d5b735ca6d96ca4d.pdf', '02-003-c9987e3120e5d9c3065b223e2d085bf8.pdf', '02-003-875c3e747874e3f9b1b4204b6ddc7bc0.pdf', '02-003-cb9bc835fcf277c2b5c7b579115a7a90.pdf', '02-003-3e9aab89d90cada5ebf4eb9471fd63d8.pdf', '', '', '', 0, '2019-04-25', '0000-00-00', 2, 2019, 1, '', 0, ''),
(19, '04-001', '04-001-7ae50d46707f645df5078086e99c54af.pdf', '04-001-b08770322221c85d9d7faee5375b731c.pdf', '04-001-8463883b22a7eeffdf19e03de2b1d190.pdf', '04-001-6c7db3691acc94961bd4cf80929710ae.pdf', '', '', '', '', 0, '2019-04-25', '0000-00-00', 4, 2019, 1, '', 0, ''),
(22, '21-001', '21-001-82d8b9ab8722a8f0b4f7aea574f6bfdc.pdf', '21-001-c48441b199876a482435297335646b67.pdf', '21-001-c32f5d89c1d8999b8b096ecb8f96f5b0.pdf', '21-001-1c092c67cac84d31ee801e9a0051914e.pdf', '21-001-71fafc92646e88e222ad80bbde25ca06.pdf', '21-001-deca137e26b90e751794b007742976d5.pdf', '21-001-7b5d45b170adf9dc33ccef2cc9a05383.pdf', '21-001-692b1f302bd2ca151ff585ef033dba36.pdf', 1, '2019-04-26', '0000-00-00', 21, 2019, 1, 'Se aprueba', 0, ''),
(23, '21-002', '21-002-ff8dde8711be56ef057e3c836d12c09e.pdf', '21-002-b3d01f5a89e53d8f80540269d852b0ac.pdf', '21-002-0337ff79b9f17774c53ea60c4a2e8967.pdf', '21-002-0f304d0baac5b737f53f69b4a7ca768c.pdf', '21-002-e1660ad1aed9aafe6fa170a62bf53162.pdf', '21-002-61faace70598ad379398ac5046c5fd82.pdf', '21-002-646401cadc39a98d9089067c5d782fc7.pdf', '21-002-359a23c665218fee851cc6f9059dd8bc.pdf', 0, '2019-04-26', '0000-00-00', 21, 2019, 1, '', 0, ''),
(24, '14-002', '14-002-c58510d0d1e16f8f16847dd98489522a.pdf', '14-002-37f7bc9459ba5db739d28f2821ce9aae.pdf', '14-002-1e5c93ea39a145953b7593174c53f448.pdf', '14-002-2c41527b5cac26f8b02eb3ac08eb66c1.pdf', '14-002-f17e13f65c23718b8dbe90fecf567e33.pdf', '14-002-1ae05aa4329f373fe327c6ccf8e36d36.pdf', '14-002-9badfd70ebb4e0cb6f80efd1a70d407c.pdf', '14-002-74c1005504a28562d81702fde48c6d4a.pdf', 0, '2019-05-02', '0000-00-00', 14, 2019, 1, '', 0, ''),
(25, '21-003', '21-003-01c5c70c0a160a56300390291b09d07b.pdf', '21-003-9e9db86d6e4855386f69b94cd479771c.pdf', '21-003-4bef70415a6f6354251e7ccc753d5e2b.pdf', '21-003-83c90c866bbaf91c73774f12953be282.pdf', '21-003-de17a67510ab9d559e2463b1353c977e.pdf', '21-003-a6a5cdbb14019e04eb7cefa2b66471e4.pdf', '21-003-ce476e0b9eb554fcc04dfbb02158ebf0.pdf', '21-003-9b94563f79421e9f7e81f7a81d8fda92.pdf', 1, '2019-05-03', '0000-00-00', 21, 2019, 1, 'Se aprueba  con éxito', 0, ''),
(26, '02-004', '02-004-9cf17f9c0aaf21e65489bc23438fb0dd.pdf', '02-004-f5c46a1c53e1faf8fe4531994957710d.pdf', '02-004-ea8bb0eaa9da03ea7f61d21e26143a70.pdf', '02-004-2f5a6ed1da9c7d14a4b74e1106eafefb.pdf', '02-004-cc23e77cfa3da62a7ea439d585b5550a.pdf', '', '', '', 0, '2019-05-04', '0000-00-00', 2, 2019, 1, '', 0, ''),
(27, '10-002', '10-002-9a23fe0ddd38c98ecee5d55cf21e7c77.pdf', '10-002-07e552e3500cab03964be889d955b17e.pdf', '10-002-8f4ca12a337a49badcd1bf83ff3f4d6b.pdf', '10-002-5f5e4b01749d9464fd9d875aa71f14ed.pdf', '', '', '', '', 0, '2019-05-06', '0000-00-00', 10, 2019, 1, '', 0, ''),
(28, '21-004', '21-004-22906befd2469075aaa6bd1d15f43ab0.pdf', '21-004-46dc37e16b04b91e8bfda4f621b9a978.pdf', '21-004-f1375b29157905dde6f2681cc1476c11.pdf', '21-004-74670691cf76fa30df9e03115c78bae0.pdf', '', '', '', '', 0, '2019-05-10', '0000-00-00', 21, 2019, 1, '', 0, ''),
(29, '01-003', '01-003-9bf75c7271c398e38dbce89ba289cc93.pdf', '01-003-5380a8e53c1f39adc5d07f30576a8c95.pdf', '01-003-38d263b58d5da5aacfcc5a15213200f4.pdf', '01-003-7f5fc636da506cdbd8d68a0107bd2cbb.pdf', '', '', '', '', 0, '2019-05-14', '0000-00-00', 1, 2019, 1, '', 0, ''),
(30, '0111', '0111-ccb59dff809ccc5d4e6dc9b6b84a9762.pdf', '0111-534d3d1403a72ddc6199269692106f58.pdf', '0111-4cc993f93b5834f0ef5a722d46a1e77a.pdf', '0111-d7192c6053bb5fac23b966a978ab2ff0.pdf', '', '', '', '', 0, '2019-05-14', '0000-00-00', 1, 2019, 1, '', 0, ''),
(31, '01-001', '01-001-61e5b86d598ea0b82873f66c91addc22.pdf', '01-001-3577ef579e97ce0fc1fb552e4cbc285e.pdf', '01-001-0c984fd03ef9a521339d48fafdb26102.pdf', '01-001-e788f9d95bdb06eb5acd7ba6d7c045bb.pdf', '', '', '', '', 0, '2019-05-20', '0000-00-00', 6, 2019, 1, '', 0, '');

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
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
