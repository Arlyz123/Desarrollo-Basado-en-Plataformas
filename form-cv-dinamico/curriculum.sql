-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2024 a las 09:38:07
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
-- Base de datos: `form-cv-dinamica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curriculum`
--

CREATE TABLE `curriculum` (
  `id` int(20) NOT NULL,
  `nombre_apellidos` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `nacionalidad` varchar(255) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `lenguajes_programacion` text NOT NULL,
  `habilidades` text NOT NULL,
  `experiencia_laboral` text NOT NULL,
  `formacion_secundaria` text NOT NULL,
  `formacion_superior` text NOT NULL,
  `idiomas_niveles` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `curriculum`
--

INSERT INTO `curriculum` (`id`, `nombre_apellidos`, `fecha_nacimiento`, `nacionalidad`, `telefono`, `email`, `linkedin`, `lenguajes_programacion`, `habilidades`, `experiencia_laboral`, `formacion_secundaria`, `formacion_superior`, `idiomas_niveles`) VALUES
(135, 'Neymi Valencia', '0011-11-11', 'ggg', 937252628, 'arlyzvalencia@gmail.com', 'no se', 'javascript', '', 'aaa', 'rrrrr', 'nkdjsncsk', 'Español-basico'),
(136, 'new', '0011-11-11', 'ggg', 937252628, 'arlyzvalencia@gmail.com', 'no se', 'javascript, csharp', 'dedicacion, adaptabilidad', 'aaa', 'rrrrr', 'nkdjsncsk', 'Español-basico, 222-intermedio');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curriculum`
--
ALTER TABLE `curriculum`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curriculum`
--
ALTER TABLE `curriculum`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
