-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2019 a las 05:23:37
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sirceer`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acudiente`
--

CREATE TABLE `acudiente` (
  `id` int(11) NOT NULL COMMENT 'PK of acudiente',
  `documento` varchar(20) NOT NULL COMMENT 'Numero de documento',
  `nombres` varchar(50) NOT NULL COMMENT 'Primer y segundo nombre del acudiente',
  `telefono` varchar(15) DEFAULT NULL,
  `ocupacion` varchar(100) DEFAULT NULL COMMENT 'Ocupacion acudiente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alianzas`
--

CREATE TABLE `alianzas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL COMMENT 'Nombre distintico de la alianza',
  `fecha_inicio` date DEFAULT NULL,
  `fecha_final` date DEFAULT NULL,
  `cupos` int(5) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL COMMENT 'ABIERTA / CERRADA ',
  `fecha_sistema` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cartera_universidades`
--

CREATE TABLE `cartera_universidades` (
  `id` int(11) NOT NULL COMMENT 'ID cartera_universidades\r\n',
  `cuenta` varchar(20) NOT NULL DEFAULT '0' COMMENT 'Numero de cuenta de la universidad',
  `codigo_universdidad` varchar(20) DEFAULT NULL COMMENT 'Codigo que identifica a la universidad',
  `universidad` varchar(100) NOT NULL COMMENT 'Nombre de la entidad prestadora del servicio',
  `valor` decimal(10,2) DEFAULT '0.00' COMMENT 'Valor de la factura',
  `saldo` decimal(10,2) DEFAULT '0.00' COMMENT 'Abonado',
  `fecha_sistema` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consecutivo_factura`
--

CREATE TABLE `consecutivo_factura` (
  `consecutivo` int(10) NOT NULL DEFAULT '0' COMMENT 'Consecutivo de la factura',
  `prefijo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `consecutivo_factura`
--

INSERT INTO `consecutivo_factura` (`consecutivo`, `prefijo`) VALUES
(0, 'FACT-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `id_matricula` int(11) NOT NULL,
  `id_factura` int(11) NOT NULL,
  `fecha_sistema` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eps`
--

CREATE TABLE `eps` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL COMMENT 'Nombre de la entidad prestadora de salud',
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eps`
--

INSERT INTO `eps` (`id`, `nombre`, `descripcion`) VALUES
(1, 'NO APLICA', NULL),
(2, 'EPS_ESTUDIANTE', NULL),
(3, 'ANAS WAYUU EPS INDIGENA', NULL),
(4, 'ASOCIACION DE CABILDOS DEL RESGUARDO INDIGENA SINU DE SAN ANDRES DE SOTAVENTO CORDOBA', NULL),
(5, 'ASOCIACION DE CABILDOS INDIGENAS DEL CESAR DUSAKAWI EPSI', NULL),
(6, 'ASOCIACION INDIGENA DEL CAUCA AIC', NULL),
(7, 'ASOCIACION MUTUAL BARRIOS UNIDOS DE QUIBDO E.S.S.', NULL),
(8, 'ASOCIACION MUTUAL EMPRESA SOLIDARIA DE SALUD DE NARINO E.S.S. EMSSANAR E.S.S.', NULL),
(9, 'ASOCIACION MUTUAL LA ESPERANZA ASMET SALUD ESS', NULL),
(10, 'ASOCIACION MUTUAL LA SUIZA DE AMERICA EPS INDIGENA', NULL),
(11, 'CAFESALUD E.P.S. S.A.', NULL),
(12, 'CAJANAL EPS', NULL),
(13, 'CALISALUD E.P.S.', NULL),
(14, 'CAPRECOM EPS', NULL),
(15, 'CAPRESOCA EPS', NULL),
(16, 'COMFENALCO VALLE E.P.S.', NULL),
(17, 'COMPENSAR E.P.S.', NULL),
(18, 'COOMEVA E.P.S. S.A.', NULL),
(19, 'COOPERATIVA DE SALUD Y DESARROLLO INTEGRAL DE LA ZONA SUR ORIENTAL DE CARTAGENA LTDA COOSALUD LTDA', NULL),
(20, 'E.P.S. CONDOR S.A.', NULL),
(21, 'E.P.S. FAMISANAR LTDA.', NULL),
(22, 'E.P.S. SALUDCOOP', NULL),
(23, 'E.P.S. SANITAS S.A.', NULL),
(24, 'EMMANUEL EPS INDIGENA', NULL),
(25, 'EMPRESA COOPERATIVA SOLIDARIA DE SALUD ECOOPSOS', NULL),
(26, 'EMPRESA MUTUAL PARA EL DESARROLLO INTEGRAL DE LA SALUD E.S.S.', NULL),
(27, 'ENTIDAD PROMOTORA DE SALUD', NULL),
(28, 'EPS PROGR. COMFENALCO ANTIOQUIA', NULL),
(29, 'EPS SERVICIO OCCIDENTAL DE SALUD S.A. - EPS-S.O.S. S.A.', NULL),
(30, 'HUMANA VIVIR S.A. E.P.S.', NULL),
(31, 'INSTITUTO DE SEGUROS SOCIALES EPS', NULL),
(32, 'ISPONAL', NULL),
(33, 'METROPOLITANA DE SALUD EPS EN LIQUIDACION', NULL),
(34, 'NUEVA EPS', NULL),
(35, 'SALUD COLMENA E.P.S. S.A.', NULL),
(36, 'SALUD COLPATRIA E.P.S.', NULL),
(37, 'SALUD TOTAL S.A. E.P.S.', NULL),
(38, 'SALUDVIDA EPS S.A.', NULL),
(39, 'SELVASALUD S.A. E.P.S.', NULL),
(40, 'SOLSALUD E.P.S. S.A.', NULL),
(41, 'SURA', NULL),
(42, 'SUSALUD EPS', NULL),
(43, 'UNIMEC E.P.S. S.A.', NULL),
(44, 'OTROS', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(11) NOT NULL COMMENT 'Incrementable, no key',
  `documento` varchar(16) NOT NULL COMMENT 'Numero de documento del estudiante e identificacion',
  `primer_nombre` varchar(20) NOT NULL COMMENT 'Primer nombre del estudiante',
  `segundo_nombre` varchar(20) DEFAULT NULL COMMENT 'Segundo nombre',
  `primer_apellido` varchar(20) NOT NULL COMMENT 'Apellido paterno',
  `segundo_apellido` varchar(20) DEFAULT NULL COMMENT 'Apelllido materno',
  `telefono_contacto` varchar(35) DEFAULT NULL COMMENT 'Telefono de contacto',
  `email` varchar(100) DEFAULT NULL COMMENT 'Correo electronico del estudainte',
  `fecha_nacimiento` datetime DEFAULT NULL COMMENT 'Fecha de nacimiento',
  `edad` varchar(3) DEFAULT NULL,
  `direccion_residencia` varchar(100) DEFAULT NULL,
  `estrato` int(11) NOT NULL COMMENT 'Estrato',
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime DEFAULT NULL COMMENT 'Fecha de finalizacion de la alianza',
  `observacion` text COMMENT 'OPcional',
  `foto` varchar(80) DEFAULT 'pordefecto.png' COMMENT 'Foto cara estudiante',
  `media_notas` decimal(4,2) DEFAULT NULL COMMENT 'promedio notas',
  `condonacion_credito` varchar(20) DEFAULT NULL,
  `siben` varchar(10) DEFAULT NULL,
  `puntaje_sisben` varchar(10) DEFAULT NULL,
  `num_acta_grado` varchar(20) DEFAULT NULL,
  `lugar_servicio_social` varchar(100) DEFAULT NULL,
  `estado` varchar(50) NOT NULL DEFAULT 'INACTIVO' COMMENT 'Estado academico',
  `tipo_doc` varchar(50) NOT NULL COMMENT 'Tipo de documento',
  `genero` varchar(50) NOT NULL COMMENT 'sexo estudiante\r\n',
  `estado_civil` varchar(50) NOT NULL,
  `grado` varchar(5) NOT NULL COMMENT 'Grado que cursa',
  `servicio_social` varchar(60) NOT NULL COMMENT 'EN CURSO / APROBADO / NO APROBADO ',
  `muni_naci` varchar(50) NOT NULL COMMENT 'Municipio de nacimiento',
  `muni_resi` varchar(50) NOT NULL COMMENT 'Municipio de residencia',
  `fecha_grado` date DEFAULT NULL COMMENT 'Fecha de graduación',
  `prioritaria` varchar(100) NOT NULL COMMENT 'Caracterizacion del estudiante',
  `eps_id` int(11) NOT NULL COMMENT 'Foranea de eps',
  `zona_id` int(11) NOT NULL,
  `sede_id` int(11) NOT NULL COMMENT 'Sede a la que pertenece el estudiante',
  `tipo_estrategia_id` int(11) NOT NULL COMMENT 'Foreng key of strategy type',
  `acudiente_id` int(11) NOT NULL COMMENT 'PK of acudiente',
  `fecha_sistema` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituciones`
--

CREATE TABLE `instituciones` (
  `id` int(11) NOT NULL COMMENT 'Id colegio',
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre del colegio',
  `telefono` varchar(12) DEFAULT NULL,
  `calendario` varchar(2) NOT NULL COMMENT 'Calendario al que pertence la institucion\r\n',
  `DANE` varchar(50) DEFAULT NULL COMMENT 'Codigo dane',
  `municipio` varchar(100) NOT NULL,
  `sector_id` int(11) NOT NULL COMMENT 'Id de sectores',
  `zona_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornadas`
--

CREATE TABLE `jornadas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL COMMENT 'Jornada: Mañana, tarde y noche',
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jornadas`
--

INSERT INTO `jornadas` (`id`, `nombre`, `descripcion`) VALUES
(1, 'MAÑANA', ''),
(2, 'TARDE', ''),
(3, 'NOCHE', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

CREATE TABLE `matriculas` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL COMMENT 'Fecha de la matricula',
  `anio` varchar(4) NOT NULL,
  `semestre` int(2) NOT NULL,
  `periodo` int(11) NOT NULL COMMENT '1 o 2',
  `promedio` decimal(2,1) DEFAULT '0.0' COMMENT 'Nota final semestre',
  `estado` varchar(50) DEFAULT NULL,
  `fecha_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estudiante_id` int(11) NOT NULL COMMENT 'FK estudiante',
  `programa_id` int(11) NOT NULL COMMENT 'FK Programa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

CREATE TABLE `modelos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL COMMENT 'EDUCACIÓN TRADICIONAL\r\nSAT PRESENCIAL\r\nPOST PRIMARIA\r\n',
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modelos`
--

INSERT INTO `modelos` (`id`, `nombre`, `descripcion`) VALUES
(1, 'EDUCACION TRADICIONAL', ''),
(2, 'SAT PRESENCIAL', ''),
(3, 'POST PRIMARIA', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_academico`
--

CREATE TABLE `nivel_academico` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL COMMENT 'Descripcion del nivel academico del programa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nivel_academico`
--

INSERT INTO `nivel_academico` (`id`, `nombre`, `descripcion`) VALUES
(1, 'TECNICA PROFESIONAL', ''),
(2, 'TECNOLOGIA', ''),
(3, 'CICLO PROFESIONAL', ''),
(4, 'OTRO', 'SIN REGISTRO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL COMMENT 'ID pagos universidades',
  `numero` int(10) NOT NULL DEFAULT '0' COMMENT 'Numero de pago',
  `valor` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Valor del pago',
  `fecha_pago` date DEFAULT NULL COMMENT 'Fecha del pago',
  `comprobante` varchar(100) DEFAULT NULL COMMENT 'Nombre de la imagen del comprobante',
  `fecha_sistema` datetime DEFAULT NULL COMMENT 'Fecha del sistema'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `id` int(11) NOT NULL,
  `snies` varchar(30) NOT NULL COMMENT 'Codigo representativo de la institucion superior',
  `nombre` varchar(50) NOT NULL COMMENT 'Nombre del programa',
  `cantidad_semestre` varchar(10) NOT NULL COMMENT 'Numero de semestre que contiene el programa',
  `costo_semestre` double(10,2) NOT NULL COMMENT 'Valor por semestre',
  `nivel_academico_id` int(11) NOT NULL,
  `universidad_id` int(11) NOT NULL,
  `jornada_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'ADMINISTRADOR', 'Administrador del programa', 1),
(2, 'REGULAR', 'Usuario del programa', 1),
(3, 'EXTERNO', 'Usuario externo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_opciones`
--

CREATE TABLE `roles_opciones` (
  `id` int(11) NOT NULL,
  `opcion` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles_opciones`
--

INSERT INTO `roles_opciones` (`id`, `opcion`, `estado`, `rol_id`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 1, 1, 2),
(4, 2, 1, 2),
(5, 1, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sectores`
--

CREATE TABLE `sectores` (
  `id` int(11) NOT NULL COMMENT 'Id de sectores',
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre del sector:\r\nOficial, No oficial',
  `descripcion` varchar(255) DEFAULT NULL COMMENT 'Descripcion del sector'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sectores`
--

INSERT INTO `sectores` (`id`, `nombre`, `descripcion`) VALUES
(1, 'OFICIAL', ''),
(2, 'NO OFICIAL', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre de la sede ',
  `codigo_dane_sede` varchar(100) DEFAULT NULL COMMENT 'Codigo de la sede sera igual al de la institucion',
  `consecutivo` varchar(100) DEFAULT NULL,
  `municipio` varchar(100) NOT NULL,
  `zona_id` int(11) NOT NULL COMMENT 'Zona rural o urbana de la sede',
  `modelo_id` int(11) NOT NULL COMMENT 'Modelo de la sede',
  `institucion_id` int(11) NOT NULL COMMENT 'Institucion a la que pertenece la sede'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_estrategias`
--

CREATE TABLE `tipos_estrategias` (
  `id` int(11) NOT NULL COMMENT 'Primary key',
  `nombre` varchar(100) DEFAULT NULL COMMENT 'Nombre del tipo de estrategia a la cual pertenece el estudiante',
  `descripcion` varchar(255) DEFAULT NULL COMMENT 'Descripcion de la estrategia'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_estrategias`
--

INSERT INTO `tipos_estrategias` (`id`, `nombre`, `descripcion`) VALUES
(1, 'ARTICULADOS', ''),
(2, 'TECNOLOGOS Y CICLO PROFESIONAL', ''),
(3, 'EGRESADOS', ''),
(4, 'OTRA', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_universidades`
--

CREATE TABLE `tipos_universidades` (
  `id` int(11) NOT NULL COMMENT 'Primary key tipos universidades',
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_universidades`
--

INSERT INTO `tipos_universidades` (`id`, `nombre`, `descripcion`) VALUES
(1, 'FUNDACION UNIVERSITARIA', ''),
(2, 'CENTRO DE INVESTIGACION', ''),
(3, 'UNIVERSIDAD', ''),
(4, 'OTRAS', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidades`
--

CREATE TABLE `universidades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL COMMENT 'Direccion de la institucion',
  `municipio` varchar(100) NOT NULL,
  `tipo_universidad_id` int(11) NOT NULL COMMENT 'Primary key tipos universidades'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidad_alianza`
--

CREATE TABLE `universidad_alianza` (
  `id` int(11) NOT NULL,
  `anio` year(4) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL COMMENT 'ACTIVA / INACTIVA',
  `universidad_id` int(11) NOT NULL COMMENT 'FK university',
  `alianza_id` int(11) NOT NULL COMMENT 'FK alianza',
  `fecha_sistema` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha inclusion universidad'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '0' COMMENT 'estado: activo: 1, o inactivo: 0',
  `nombre` varchar(255) NOT NULL,
  `codigo` varchar(50) NOT NULL COMMENT 'nombre de usuario',
  `clave` varchar(100) NOT NULL COMMENT 'Contraseña asignada al usuario',
  `img` varchar(100) DEFAULT 'pordefecto.png' COMMENT 'Imagen',
  `fecha_ingreso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `estado`, `nombre`, `codigo`, `clave`, `img`, `fecha_ingreso`, `rol_id`) VALUES
(1, 0, 'Administrador', 'admin', '123', 'pordefecto.png', '2019-06-18 03:21:32', 1),
(2, 0, '', 'invitado', '123', 'pordefecto.png', '2019-06-18 03:21:32', 2),
(3, 0, '', 'externo', '123', 'pordefecto.png', '2019-06-18 03:21:32', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`id`, `nombre`, `descripcion`) VALUES
(1, 'URBANA', 'METROPOLI'),
(2, 'RURAL', 'GRANJAS Y EXTENSIONES DE TIERRA');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acudiente`
--
ALTER TABLE `acudiente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `alianzas`
--
ALTER TABLE `alianzas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `un_alianza_nombre` (`nombre`);

--
-- Indices de la tabla `cartera_universidades`
--
ALTER TABLE `cartera_universidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consecutivo_factura`
--
ALTER TABLE `consecutivo_factura`
  ADD UNIQUE KEY `consecutivo` (`consecutivo`),
  ADD UNIQUE KEY `prefijo` (`prefijo`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD KEY `id_factura` (`id_factura`),
  ADD KEY `id_matricula` (`id_matricula`);

--
-- Indices de la tabla `eps`
--
ALTER TABLE `eps`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_nombre_eps` (`nombre`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_estudiante_documento` (`documento`),
  ADD KEY `acudiente_id` (`acudiente_id`),
  ADD KEY `eps_id` (`eps_id`),
  ADD KEY `sede_id` (`sede_id`),
  ADD KEY `tipo_estrategia_id` (`tipo_estrategia_id`),
  ADD KEY `zona_id` (`zona_id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `instituciones`
--
ALTER TABLE `instituciones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_colegio_nombre` (`nombre`),
  ADD KEY `sector_id` (`sector_id`),
  ADD KEY `zona_id` (`zona_id`);

--
-- Indices de la tabla `jornadas`
--
ALTER TABLE `jornadas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_jornadas_nombre` (`nombre`);

--
-- Indices de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estudiante_id` (`estudiante_id`),
  ADD KEY `programa_id` (`programa_id`);

--
-- Indices de la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_modelos_nombre` (`nombre`);

--
-- Indices de la tabla `nivel_academico`
--
ALTER TABLE `nivel_academico`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_nivel_academico_nombre` (`nombre`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_programa_snies` (`snies`),
  ADD KEY `jornada_id` (`jornada_id`),
  ADD KEY `nivel_academico_id` (`nivel_academico_id`),
  ADD KEY `universidad_id` (`universidad_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_roles_codigo` (`nombre`);

--
-- Indices de la tabla `roles_opciones`
--
ALTER TABLE `roles_opciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- Indices de la tabla `sectores`
--
ALTER TABLE `sectores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_nombre_sectores` (`nombre`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `institucion_id` (`institucion_id`),
  ADD KEY `modelo_id` (`modelo_id`),
  ADD KEY `zona_id` (`zona_id`);

--
-- Indices de la tabla `tipos_estrategias`
--
ALTER TABLE `tipos_estrategias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_universidades`
--
ALTER TABLE `tipos_universidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `universidades`
--
ALTER TABLE `universidades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_institucion_nombre` (`nombre`),
  ADD KEY `tipo_universidad_id` (`tipo_universidad_id`);

--
-- Indices de la tabla `universidad_alianza`
--
ALTER TABLE `universidad_alianza`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `alianza_id` (`alianza_id`),
  ADD KEY `universidad_id` (`universidad_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `rol_id` (`rol_id`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_zonas_nombre` (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acudiente`
--
ALTER TABLE `acudiente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK of acudiente';

--
-- AUTO_INCREMENT de la tabla `alianzas`
--
ALTER TABLE `alianzas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cartera_universidades`
--
ALTER TABLE `cartera_universidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID cartera_universidades\r\n';

--
-- AUTO_INCREMENT de la tabla `eps`
--
ALTER TABLE `eps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Incrementable, no key';

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `instituciones`
--
ALTER TABLE `instituciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id colegio';

--
-- AUTO_INCREMENT de la tabla `jornadas`
--
ALTER TABLE `jornadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modelos`
--
ALTER TABLE `modelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `nivel_academico`
--
ALTER TABLE `nivel_academico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID pagos universidades';

--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles_opciones`
--
ALTER TABLE `roles_opciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sectores`
--
ALTER TABLE `sectores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de sectores', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_estrategias`
--
ALTER TABLE `tipos_estrategias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipos_universidades`
--
ALTER TABLE `tipos_universidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key tipos universidades', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `universidades`
--
ALTER TABLE `universidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `universidad_alianza`
--
ALTER TABLE `universidad_alianza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `detalle_factura_ibfk_1` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `detalle_factura_ibfk_2` FOREIGN KEY (`id_matricula`) REFERENCES `matriculas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`acudiente_id`) REFERENCES `acudiente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `estudiantes_ibfk_2` FOREIGN KEY (`eps_id`) REFERENCES `eps` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `estudiantes_ibfk_3` FOREIGN KEY (`sede_id`) REFERENCES `sedes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `estudiantes_ibfk_4` FOREIGN KEY (`tipo_estrategia_id`) REFERENCES `tipos_estrategias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `estudiantes_ibfk_5` FOREIGN KEY (`zona_id`) REFERENCES `zonas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `instituciones`
--
ALTER TABLE `instituciones`
  ADD CONSTRAINT `instituciones_ibfk_1` FOREIGN KEY (`sector_id`) REFERENCES `sectores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `instituciones_ibfk_2` FOREIGN KEY (`zona_id`) REFERENCES `zonas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `matriculas_ibfk_1` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiantes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `matriculas_ibfk_2` FOREIGN KEY (`programa_id`) REFERENCES `programas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `programas`
--
ALTER TABLE `programas`
  ADD CONSTRAINT `programas_ibfk_1` FOREIGN KEY (`jornada_id`) REFERENCES `jornadas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `programas_ibfk_2` FOREIGN KEY (`nivel_academico_id`) REFERENCES `nivel_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `programas_ibfk_3` FOREIGN KEY (`universidad_id`) REFERENCES `universidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `roles_opciones`
--
ALTER TABLE `roles_opciones`
  ADD CONSTRAINT `roles_opciones_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD CONSTRAINT `sedes_ibfk_1` FOREIGN KEY (`institucion_id`) REFERENCES `instituciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sedes_ibfk_2` FOREIGN KEY (`modelo_id`) REFERENCES `modelos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sedes_ibfk_3` FOREIGN KEY (`zona_id`) REFERENCES `zonas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `universidades`
--
ALTER TABLE `universidades`
  ADD CONSTRAINT `universidades_ibfk_1` FOREIGN KEY (`tipo_universidad_id`) REFERENCES `tipos_universidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `universidad_alianza`
--
ALTER TABLE `universidad_alianza`
  ADD CONSTRAINT `universidad_alianza_ibfk_1` FOREIGN KEY (`alianza_id`) REFERENCES `alianzas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `universidad_alianza_ibfk_2` FOREIGN KEY (`universidad_id`) REFERENCES `universidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
