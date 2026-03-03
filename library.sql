-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2024 a las 02:08:50
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `library`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `edition` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `edition`, `isbn`, `area`) VALUES
(14, 'CIEN AÑOS DE SOLEDAD', 'GABRIEL GARCÍA MÁRQUEZ', 'PRIMERA EDICIÓN VINTAGE ESPAÑOL (2009)', '978-0307474728', 'CULTURA GENERAL'),
(16, 'EL GRAN GATSBY', 'F. SCOTT FITZGERALD', 'SCRIBNER (2004)', '978-0743273565', 'TICS'),
(17, 'DON QUIJOTE DE LA MANCHA', 'MIGUEL DE CERVANTES SAAVEDRA', 'HARPER PERENNIAL MODERN CLASSICS (2005)', '978-0060934347', 'INDUSTRIAS ALIMENTARIAS'),
(18, 'LA METAMORFOSIS', 'FRANZ KAFKA', 'INDEPENDENT PUBLISHING PLATFORM (2014)', '978-1503261990', 'CULTURA GENERAL'),
(21, 'EL PRINCIPITO', 'ANTOINE DE SAINT', '2DA EDICION', '12345678', 'CULTURA GENERAL'),
(22, 'PROGRAMACION 3D', 'JOYANES', '3RA EDICION', '12345678', 'SISTEMAS COMPUTACIONALES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `control_number` varchar(255) NOT NULL,
  `career` varchar(255) NOT NULL,
  `book_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `loans`
--

INSERT INTO `loans` (`id`, `student_name`, `control_number`, `career`, `book_id`, `created_at`) VALUES
(32, 'JUAN ALFREDO CHAVEZ HIDALGO', '212Z0074', 'ING. SISTEMAS COMPUTACIONALES', 21, '2024-06-27 23:10:09'),
(33, 'MIGUEL ANGEL GARCES CRUZ', '212X0090', 'ING. AMBIENTAL', 18, '2024-06-27 23:10:41'),
(35, 'KRISS ESTEFANI DEL ANGEL MARTINEZ', '212Z0076', 'SISTEMAS COMPUTACIONALES', 14, '2024-06-27 23:56:21'),
(36, 'LITAY NAOMI ORTEGA HERNANDEZ', '212Z0080', 'INDUSTRIAS ALIMENTARIAS', 17, '2024-06-27 23:56:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_name` varchar(250) NOT NULL,
  `control_number` varchar(250) NOT NULL,
  `career` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` (`id`, `student_name`, `control_number`, `career`) VALUES
(1, 'JUAN ALFREDO CHAVEZ HIDALGO', '212Z0074', 'ING. SISTEMAS COMPUTACIONALES'),
(2, 'JORGE SINAI HERNANDEZ FRANCISCO', '212Z0086', 'SISTEMAS COMPUTACIONALES'),
(3, 'MIGUEL ANGEL GARCES CRUZ', '212X0090', 'AMBIENTAL'),
(4, 'JULIANA GONZALES LAZARO', '212Z0091', 'INDUSTRIAS ALIMENTARIAS'),
(6, 'KRISS ESTEFANI DEL ANGEL MARTINEZ', '212Z0076', 'SISTEMAS COMPUTACIONALES'),
(7, 'LITAY NAOMI ORTEGA HERNANDEZ', '212Z0080', 'INDUSTRIAS ALIMENTARIAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `names` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `control` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `names`, `last_name`, `control`) VALUES
(30, 'ADMIN', '$2y$10$fgnd23TZGc0R6OJKKcv4j.sq0HJSqgNobrLpy5mVjlnxfJEhpS1MO', 'admin', 'JUAN ALFREDO', 'CHAVEZ HIDALGO', '212Z0074'),
(31, 'USER', '$2y$10$L5Vj1DM4Ini77V9BXm6ZAeOVxrrBN9Jtoa9XrQt4n0ZGiFakvl3hu', 'user', 'USERNUEVO', 'USERAPELLIDOS', '12345'),
(32, 'FEYO', '$2y$10$Gh4aESZqUVC76eRxzS7FPeUcbqimB0l8asRBxXeVht1fjC9IeEx7C', 'user', 'FEYIN', 'CHAVEZ', '212Z0075');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
