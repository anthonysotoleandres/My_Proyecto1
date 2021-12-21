-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3360
-- Tiempo de generación: 06-12-2021 a las 19:19:58
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tarea`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivar`
--

CREATE TABLE `archivar` (
  `usuarios_idusuarios2` int(11) NOT NULL,
  `titulo2` varchar(30) NOT NULL,
  `contenido2` varchar(100) NOT NULL,
  `fecha_registro2` varchar(30) NOT NULL,
  `fecha_vencimiento2` varchar(30) NOT NULL,
  `prioridad2` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `archivar`
--

INSERT INTO `archivar` (`usuarios_idusuarios2`, `titulo2`, `contenido2`, `fecha_registro2`, `fecha_vencimiento2`, `prioridad2`) VALUES
(1, 'danza', 'practicar para la danza', '2021-11-23', '2021-12-10', 'Bajo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas_task`
--

CREATE TABLE `tareas_task` (
  `usuarios_idusuarios` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `contenido` varchar(100) NOT NULL,
  `fecha_registro` varchar(30) NOT NULL,
  `fecha_vencimiento` varchar(30) NOT NULL,
  `prioridad` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tareas_task`
--

INSERT INTO `tareas_task` (`usuarios_idusuarios`, `titulo`, `contenido`, `fecha_registro`, `fecha_vencimiento`, `prioridad`) VALUES
(1, 'danza', 'practicar para la danza', '2021-11-23', '2021-12-10', 'Bajo'),
(3, 'Matematica2', 'entregar ejercicios del libro', '2021-11-23', '2021-12-02', 'Medio'),
(3, 'Matematica1', 'estudiar para el examen parcial', '2021-11-23', '2021-12-17', 'Alto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `apellido` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `username`, `password`) VALUES
(1, 'Anthony', 'Soto', 'thony', '$2y$10$IQmTyrqTeX.Xi0k8KR4Au.8yl/hYHcrZzuSxqifqyCgKpZ098fdJe'),
(2, 'Luis', 'Quispe', 'Luchito', '$2y$10$9RLwjALc4Xe5NLK6I2475O9vN8RlKa3d9jzolEIKdTJ/Dkn6.ub3K'),
(3, 'Juan', 'Perez', 'juanito', '$2y$10$ORd92nOa2vQNPnYxpIE8V.T.fd3YCeqsxW83WPgBhAI6sFerTq4G2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tareas_task`
--
ALTER TABLE `tareas_task`
  ADD KEY `fk_tareas_usuarios` (`usuarios_idusuarios`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tareas_task`
--
ALTER TABLE `tareas_task`
  ADD CONSTRAINT `fk_tareas_usuarios` FOREIGN KEY (`usuarios_idusuarios`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
