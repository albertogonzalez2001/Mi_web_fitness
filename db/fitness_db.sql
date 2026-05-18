-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3309
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitness_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `progreso`
--

CREATE TABLE `progreso` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_rutina` int(11) NOT NULL,
  `comentarios` text NOT NULL,
  `fecha_actualizacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `progreso`
--

-- Insertar los valores requeridos en progreso a través de la interfaz creada en la web

-- --------------------------------------------------------

--
-- Table structure for table `rutinas`
--

CREATE TABLE `rutinas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `dificultad` enum('Fácil','Medio','Dificil') NOT NULL,
  `grupo_muscular` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `duracion` varchar(100) NOT NULL,
  `objetivo` varchar(255) NOT NULL,
  `tipo_rutina` varchar(100) NOT NULL,
  `ejercicios` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rutinas`
--

INSERT INTO `rutinas` (`id`, `titulo`, `dificultad`, `grupo_muscular`, `descripcion`, `duracion`, `objetivo`, `tipo_rutina`, `ejercicios`) VALUES
(11, 'Rutina de pecho', 'Medio', 'Pecho', '15 repeticiones haciendo, 1 repetición lenta y 2 repeticiones lo más rápido posible. Repitiendo esta secuencia un máximo de 5 veces, una vez superado ese número, se eleva el peso 2.5kg a cada lado de la barra para efectuar sobrecarga progresiva.', '1h/1:30h aprox.', 'En este entrenamiento de fuerza/potencia haremos solamente 3 ejercicios y en cada ejercicio 4 series de 15 repeticiones cada serie descansando entre 2’y 2’30’’ entre serie y serie [3x[4×15 + 2’-2’30’’ descanso]].', 'Rutina enfocada a mejorar la explosividad de los músculos del pectoral triceps y hombros.', '<br>- Press de banca plano con barra.<br>\r\n- Press de banca inclinado con barra.<br>\r\n- Press militar en banco con mancuerna.'),
(12, 'Rutina de pierna', 'Dificil', 'Pierna', 'El entrenamiento de piernas es indiscutible, sea cual sea tu objetivo tienes que dedicarle tiempo a tu tren inferior, de lo contrario no solo acabarás a lo Johnny Bravo, sino que además ponerte en forma y quemar grasa te costará mucho más.', '1h/1:30h aprox.', 'Desarrollo de masa muscular y potencia en las piernas para evitar lesiones y ser funcional en el día a día.', 'Potencia y fuerza explosiva/hipertrofia ', '<br>- RDL con mancuerna 3 x 10 repeticiones<br>\r\n- Sentadilla con barra 3 x 8 repeticiones<br>\r\n- Extensión de cuádriceps 4 x fallo repeticiones<br>\r\n- Máquina de curl femoral 4 x fallo repeticiones'),
(13, 'Rutina de brazos', 'Fácil', 'Brazo', 'Todos queremos unos brazos fuertes y definidos, pero está claro que no se ganan en la lotería: ¡hay que trabajarlos y ,sobre todo, alimentarnos bien! ¿Quieres hacer un entrenamiento de brazos lo más completo? ¡Esta es tu rutina!', '1h aprox.', 'Desarrollo de unos brazos fuertes y con volumen para mejorar aspectos estéticos y funcionales.', 'Fuerza/hipertrofia', '<br>- Ejercicio de calentamiento de triceps(press banca)<br>\r\n- Curl de biceps 3 x fallo<br>\r\n- Curl de biceps concentrado 3 x fallo<br>\r\n- Extensión triceps 3 x fallo<br>\r\n- Press francés 3 x fallo'),
(14, 'Rutina de hombros', 'Medio', 'Hombros', 'Tener unos hombros más grandes y fuertes va más allá de la estética. Unos hombros bien desarrollados mejoran la postura, la estabilidad de la articulación y el rendimiento en casi cualquier deporte o ejercicio de fuerza. ', '1h aprox.', 'Mejorar la postura de la espalda,la estabilidad y la estética.', 'Fuerza/hipertrofia', '<br>- Press militar barra o mancuernas 3 x fallo<br>\r\n- Elevaciones laterales 5 x fallo<br>\r\n- Face pull en polea 3 x fallo<br>\r\n'),
(15, 'Rutina full-body', 'Dificil', 'Full-body', '45 minutos es más que suficiente para un buen entrenamiento, pero si buscas una rutina más completa, con más ejercicios y músculos trabajados, este workout de una hora es el ideal.', '45 minutos', 'Si solo tienes una hora a la semana para entrenar, por ejemplo, este entrenamiento es perfecto para ganar músculo. Aquí tienes los ejercicios, series y descansos para buscar la máxima hipertrofia.', 'Full-body, enfocado a hipertrofia.', '<strong> Pecho y triceps:</strong><br>- Press de banca con barra: 4 series de 6 a 8 repeticiones<br>\r\n- Extensiones triceps poleas 3 x fallo<br>\r\n<strong> Espalda y biceps:</strong><br> - Dominadas 3 x fallo<br>\r\n- Curl alterno con mancuerna 3 x fallo<br>');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('usuario','entrenador') NOT NULL DEFAULT 'usuario',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

-- Registrar el usuario como se desee dentro de la interfaz de inicio de sesión de la web.

--
-- Indexes for dumped tables
--

--
-- Indexes for table `progreso`
--
ALTER TABLE `progreso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rutinas_id_rutina_progreso` (`id_rutina`),
  ADD KEY `usuarios_id_usuario_progreso` (`id_usuario`);

--
-- Indexes for table `rutinas`
--
ALTER TABLE `rutinas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `progreso`
--
ALTER TABLE `progreso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rutinas`
--
ALTER TABLE `rutinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `progreso`
--
ALTER TABLE `progreso`
  ADD CONSTRAINT `rutinas_id_rutina_progreso` FOREIGN KEY (`id_rutina`) REFERENCES `rutinas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuarios_id_usuario_progreso` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
