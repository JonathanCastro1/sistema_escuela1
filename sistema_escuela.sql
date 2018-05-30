-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2018 a las 03:10:27
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_escuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` int(50) NOT NULL,
  `alumno` varchar(50) NOT NULL,
  `nota` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `session` varchar(50) NOT NULL,
  `turno` varchar(50) NOT NULL,
  `sede` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id`, `alumno`, `nota`, `descripcion`, `fecha`, `session`, `turno`, `sede`) VALUES
(1, 'jonathan', '19,5', 'buen  alumno', '10-10-2018', 'a40', 'noche', 'centro'),
(2, 'pedro', '17', 'un poco distraido en el examen', '01-05-2018', 'a40', 'nocturno', 'centro'),
(4, 'gonzalo', '13', 'bajo su rendimiento este periodo', '01-05-2018', 'a41', 'nocturno', 'centro'),
(5, 'pepito', '12', 'buen alumno', '01-05-2018', 'a41', 'vespertino', 'zulia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `session` varchar(50) NOT NULL,
  `turno` varchar(50) NOT NULL,
  `sede` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `nombre`, `apellido`, `email`, `session`, `turno`, `sede`) VALUES
(4, 'john', 'virmeo', 'virmeo@gmail.com', 'a40', 'noche', 'centro'),
(5, 'jonathan', 'castro', 'castro@hotmail.com', 'a50', 'noche', 'centro'),
(6, 'chin', 'chon', 'chin@gmail.com', 'a40', 'noche', 'naranjos'),
(7, 'jose', 'jorocho', 'jose@hotmail.com', 'a41', 'matutino', 'centro'),
(8, 'carlin', 'chacon', 'chacon@hotmail.com', 'a40', 'nocturno', 'centro'),
(9, 'chamin', 'chamin', 'chamin@hotmail.com', 'a40', 'nocturno', 'catia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(50) NOT NULL,
  `hora` int(50) NOT NULL,
  `profesor` varchar(50) NOT NULL,
  `materia` varchar(50) NOT NULL,
  `session` varchar(50) NOT NULL,
  `turno` varchar(50) NOT NULL,
  `sede` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `hora`, `profesor`, `materia`, `session`, `turno`, `sede`) VALUES
(1, 6, 'yosmar', 'matematica1', 'a60', 'noche', 'centro'),
(2, 7, 'ramon', 'ingles1', 'a45', 'noche', 'centro'),
(3, 6, 'gabriela', 'estadistica1', 'a46', 'tarde', 'naranjos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id` int(50) NOT NULL,
  `ruta` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id`, `ruta`) VALUES
(4, 'escanor.jpg'),
(5, 'ichigo.jpg'),
(6, 'luffy.jpg'),
(7, 'slipknot.png'),
(8, 'souma.jpg'),
(9, 'ash.png'),
(10, 'perro.jpg'),
(11, 'zed.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id` int(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `session` varchar(50) NOT NULL,
  `turno` varchar(50) NOT NULL,
  `sede` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `nombre`, `apellido`, `email`, `session`, `turno`, `sede`) VALUES
(4, 'yosmar', 'chacon', 'yosmar@hotmail.com', 'a41', 'noche', 'centro'),
(5, 'charbel', 'wakan', 'wakan@yahoo.com', 'a42', 'mañana', 'naranjos'),
(6, 'krilin', 'chamin', 'chamin@gmail.com', 'a40', 'nocturno', 'centro'),
(7, 'calin', 'mamin', 'mamin@hotmail.com', 'a40', 'nocturno', 'centro'),
(8, 'yukin', 'yukin', 'yukin@gmail.com', 'a45', 'media tarde', 'quinta crespo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `id` int(50) NOT NULL,
  `sede` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`id`, `sede`) VALUES
(4, 'centro'),
(5, 'naranjos'),
(6, 'catia'),
(7, 'petare'),
(8, 'zulia'),
(9, 'quinta crespo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `session` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `session`
--

INSERT INTO `session` (`id`, `session`) VALUES
(1, 'a40'),
(2, 'a41'),
(3, 'a42'),
(4, 'a43'),
(5, 'a44'),
(6, 'a45'),
(7, 'a47'),
(8, 'a48'),
(9, 'a49'),
(10, 'a50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `id` int(11) NOT NULL,
  `turno` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`id`, `turno`) VALUES
(4, 'matutino'),
(5, 'vespertino'),
(6, 'nocturno'),
(7, 'madrugada'),
(8, 'media mañana'),
(9, 'media tarde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `nacimiento` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` bigint(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `nacimiento`, `email`, `telefono`, `usuario`, `contrasena`) VALUES
(4, 'jonathan', 'castro', '27-10-1979', 'castro@hotmail.com', 12345678, 'admin', 'admin'),
(5, 'petra', 'chacon', '10-10-2001', 'algo@gmail.com', 4249999999, 'petra', '12'),
(6, 'ramon', 'ramones', '01-09-2009', 'ramones@hotmail.com', 1234567, 'ramon', '123'),
(7, 'maire', 'maire', '04-08-2009', 'maire@hotmail.com', 1234567, 'maire', '12'),
(8, 'gonzalo', 'perez', '01-11-2010', 'gonzalo@hotmail.com', 5678424, 'gonzalo', '123'),
(9, 'pepito', 'pepito', '01-05-2018', 'pepito@hotmail.com', 556789, 'pepito', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
