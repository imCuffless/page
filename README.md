# Sistema de Registro PHP

## Descripción

Sistema moderno de registro y administración de personas con interfaz minimalista. Esta aplicación implementa operaciones CRUD básicas con un enfoque en la experiencia de usuario, utilizando Bootstrap para un diseño responsive y compatible con múltiples dispositivos.

---

## Características principales

- **Formulario de registro** con validación de datos.
- **Visualización de registros** en una tabla dinámica con filas alternas.
- **Modal de visualización** con diseño mejorado.
- **Interfaz limpia y moderna** con tema personalizado.
- **Estructura organizada** siguiendo principios MVC.
- **Sistema de notificaciones** para feedback al usuario.

---

## Tecnologías utilizadas

- PHP 8
- MySQL / MariaDB
- Bootstrap 5 (Tema Flatly)
- JavaScript
- HTML5 / CSS3

---

## Mejoras de diseño implementadas

- Reorganización completa de la arquitectura CSS.
- Implementación de sistema de variables CSS.
- Optimización de estilos para mejorar la legibilidad.
- Paleta de colores coherente con tema mint.
- Botones y controles con diseño moderno.
- Diseño responsive para todos los dispositivos.
- Tabla con filas alternas para mejor legibilidad.
- Modales con mejor organización visual.

---

## Instalación

1. **Clonar el repositorio:**
   ```bash
   git clone https://github.com/tuusuario/tu-repo.git
   ```
2. **Importar la base de datos**  
   Utiliza el archivo SQL incluido más abajo o como respaldo en el proyecto.
3. **Configurar la conexión** en `/Controller/Configuracion.php`.
4. **Acceder a través del navegador web**.

---

## Estructura del proyecto

```
/                   # Raíz del proyecto
├── Controller/     # Controladores y lógica de la aplicación (PHP)
├── css/            # Hojas de estilo CSS organizadas por componente o funcionalidad
├── js/             # Scripts de JavaScript
├── views/          # Archivos de vista (parciales, plantillas o componentes visuales)
├── index.php       # Punto de entrada principal de la aplicación
└── README.md       # Documentación del proyecto
```

---

## Respaldo de Base de Datos

A continuación se incluye un ejemplo de respaldo SQL que puedes importar directamente a tu gestor de base de datos (por ejemplo, phpMyAdmin o MySQL Workbench):

````sql
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-07-2025 a las 01:43:30
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS bdcensa;
USE bdcensa;

--
-- Estructura de tabla para la tabla registropersonas
--

CREATE TABLE IF NOT EXISTS registropersonas (
  ID_Registro int(11) NOT NULL AUTO_INCREMENT,
  Id int(50) NOT NULL,
  Nombre varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  Apellido varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  Edad int(11) NOT NULL,
  Correo varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  Telefono int(11) NOT NULL,
  PRIMARY KEY (ID_Registro)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla registropersonas
--

INSERT INTO registropersonas (ID_Registro, Id, Nombre, Apellido, Edad, Correo, Telefono) VALUES
(1, 1, 'Gerson', 'Largo', 23, 'G@G', 324),
(2, 1034, 'Gerson', 'Largo', 24, 'Gersonlargo74@gmail.com', 2147483647),
(3, 1035, 'David', 'Largo', 24, 'Gr24@Gmail.com', 2147483647),
(4, 1036, 'David', 'Largo', 24, 'Gr24@Gmail.com', 2147483647),
(5, 1037, 'David', 'Largo', 24, 'Gr24@Gmail.com', 2147483647),
(6, 3000, 'Ana', 'Martínez', 28, 'ana.martinez@gmail.com', 2147483647),
(7, 3001, 'Luis', 'Gómez', 32, 'luis.gomez@gmail.com', 2147483647),
(8, 3002, 'Carlos', 'Ramírez', 24, 'carlos.ramirez@hotmail.com', 2147483647),
(9, 3003, 'Lucía', 'Pérez', 29, 'lucia.perez@yahoo.com', 2147483647),
(10, 3004, 'Juan', 'Rodríguez', 35, 'juan.rodriguez@gmail.com', 2147483647),
(11, 3005, 'Marta', 'López', 22, 'marta.lopez@gmail.com', 2147483647),
(12, 3006, 'Pedro', 'García', 27, 'pedro.garcia@gmail.com', 2147483647),
(13, 3007, 'Elena', 'Hernández', 26, 'elena.hernandez@gmail.com', 2147483647),
(14, 3008, 'Diego', 'Torres', 30, 'diego.torres@gmail.com', 2147483647),
(15, 3009, 'Sofía', 'Ramírez', 23, 'sofia.ramirez@gmail.com', 2147483647),
(16, 3010, 'Camilo', 'Moreno', 25, 'camilo.moreno@gmail.com', 2147483647),
(17, 3011, 'Valentina', 'Ríos', 21, 'valentina.rios@gmail.com', 2147483647),
(18, 3012, 'Andrés', 'Cruz', 34, 'andres.cruz@gmail.com', 2147483647),
(19, 3013, 'Isabella', 'Mejía', 20, 'isabella.mejia@gmail.com', 2147483647),
(20, 3014, 'Sebastián', 'Silva', 33, 'sebastian.silva@gmail.com', 2147483647),
(21, 3015, 'Paula', 'Ruiz', 31, 'paula.ruiz@gmail.com', 2147483647),
(22, 3016, 'Tomás', 'Jiménez', 22, 'tomas.jimenez@gmail.com', 2147483647),
(23, 3017, 'Gabriela', 'Molina', 27, 'gabriela.molina@gmail.com', 2147483647),
(24, 3018, 'Julián', 'Castro', 29, 'julian.castro@gmail.com', 2147483647),
(25, 3019, 'Natalia', 'Suárez', 24, 'natalia.suarez@gmail.com', 2147483647),
(26, 3020, 'Felipe', 'Ortega', 28, 'felipe.ortega@gmail.com', 2147483647),
(27, 3021, 'Daniela', 'Reyes', 26, 'daniela.reyes@gmail.com', 2147483647),
(28, 3022, 'Samuel', 'Soto', 30, 'samuel.soto@gmail.com', 2147483647),
(29, 3023, 'Laura', 'Peña', 25, 'laura.pena@gmail.com', 2147483647),
(30, 3024, 'Esteban', 'Cortés', 33, 'esteban.cortes@gmail.com', 2147483647),
(31, 3025, 'Mariana', 'Salazar', 29, 'mariana.salazar@gmail.com', 2147483647),
(32, 3026, 'Jorge', 'Delgado', 31, 'jorge.delgado@gmail.com', 2147483647),
(33, 3027, 'Manuela', 'Guzmán', 20, 'manuela.guzman@gmail.com', 2147483647),
(34, 3028, 'Cristian', 'Vargas', 22, 'cristian.vargas@gmail.com', 2147483647),
(35, 3029, 'Daniel', 'Aguilar', 27, 'daniel.aguilar@gmail.com', 2147483647),
(36, 3030, 'Sara', 'Navarro', 24, 'sara.navarro@gmail.com', 2147483647),
(37, 3031, 'Alejandro', 'Rivas', 23, 'alejandro.rivas@gmail.com', 2147483647),
(38, 3032, 'Karen', 'Ayala', 25, 'karen.ayala@gmail.com', 2147483647),
(39, 3033, 'Jonathan', 'Serrano', 28, 'jonathan.serrano@gmail.com', 2147483647),
(40, 3034, 'Viviana', 'Campos', 31, 'viviana.campos@gmail.com', 2147483647),
(41, 3035, 'Oscar', 'Barrios', 30, 'oscar.barrios@gmail.com', 2147483647),
(42, 3036, 'Claudia', 'Vega', 26, 'claudia.vega@gmail.com', 2147483647),
(43, 3037, 'Ricardo', 'Montoya', 35, 'ricardo.montoya@gmail.com', 2147483647),
(44, 3038, 'Melissa', 'Castaño', 32, 'melissa.castano@gmail.com', 2147483647),
(45, 3039, 'Álvaro', 'Correa', 29, 'alvaro.correa@gmail.com', 2147483647),
(46, 3040, 'Lina', 'Bermúdez', 24, 'lina.bermudez@gmail.com', 2147483647),
(47, 3041, 'Fernando', 'Gaitán', 34, 'fernando.gaitan@gmail.com', 2147483647),
(48, 3042, 'Tatiana', 'Parra', 28, 'tatiana.parra@gmail.com', 2147483647),
(49, 3043, 'Henry', 'Valencia', 31, 'henry.valencia@gmail.com', 2147483647),
(50, 3044, 'Gloria', 'Ariza', 27, 'gloria.ariza@gmail.com', 2147483647),
(51, 3045, 'Mauricio', 'Nieto', 26, 'mauricio.nieto@gmail.com', 2147483647),
(52, 3046, 'Diana', 'Palacios', 29, 'diana.palacios@gmail.com', 2147483647),
(53, 3047, 'Javier', 'Quintero', 33, 'javier.quintero@gmail.com', 2147483647),
(54, 3048, 'Yulieth', 'Patiño', 25, 'yulieth.patino@gmail.com', 2147483647),
(55, 3049, 'Camila', 'Lara', 23, 'camila.lara@gmail.com', 2147483647),
(56, 3050, 'Santiago', 'Espinosa', 21, 'santiago.espinosa@gmail.com', 2147483647),
(57, 3051, 'Lorena', 'Mendoza', 22, 'lorena.mendoza@gmail.com', 2147483647),
(58, 3052, 'Kevin', 'Londoño', 27, 'kevin.londono@gmail.com', 2147483647),
(59, 3053, 'Luisa', 'Cárdenas', 28, 'luisa.cardenas@gmail.com', 2147483647),
(60, 3054, 'Héctor', 'Zapata', 30, 'hector.zapata@gmail.com', 2147483647),
(61, 3055, 'Vanessa', 'Roa', 29, 'vanessa.roa@gmail.com', 2147483647),
(62, 3056, 'Brayan', 'Téllez', 24, 'brayan.tellez@gmail.com', 2147483647),
(63, 3057, 'Nataly', 'Cifuentes', 26, 'nataly.cifuentes@gmail.com', 2147483647),
(64, 3058, 'Alejandra', 'Galvis', 25, 'alejandra.galvis@gmail.com', 2147483647),
(65, 3059, 'Matías', 'Paredes', 23, 'matias.paredes@gmail.com', 2147483647),
(66, 3060, 'Adriana', 'Sanabria', 34, 'adriana.sanabria@gmail.com', 2147483647),
(67, 3061, 'Julio', 'Sánchez', 28, 'julio.sanchez@gmail.com', 2147483647),
(68, 3062, 'Daniel', 'Beltrán', 27, 'daniel.beltran@gmail.com', 2147483647),
(69, 3063, 'Patricia', 'Herrera', 30, 'patricia.herrera@gmail.com', 2147483647),
(70, 3064, 'César', 'Guerrero', 33, 'cesar.guerrero@gmail.com', 2147483647),
(71, 3065, 'Dayana', 'Bonilla', 21, 'dayana.bonilla@gmail.com', 2147483647),
(72, 3066, 'Ángela', 'Márquez', 22, 'angela.marquez@gmail.com', 2147483647),
(73, 3067, 'Mario', 'Becerra', 26, 'mario.becerra@gmail.com', 2147483647),
(74, 3068, 'Andrea', 'Delgado', 25, 'andrea.delgado@gmail.com', 2147483647),
(75, 3069, 'Cristina', 'Pinto', 24, 'cristina.pinto@gmail.com', 2147483647),
(76, 123444, 'Gerson', 'Largo', 21, 'ggdfd@sfaf', 2147483647),
(77, 123456, 'Gerson', 'Largo', 24, 'gers0nl4r6o2001@gmail.com', 2147483647),
(78, 2147483647, 'Gerson', 'Largo', 21, 'ggdfd@sfaf', 2147483647),
(79, 2147483647, 'DAVIAN', 'LARGO ORTIZ', 21, 'ggdfd@sfaf', 2147483647),
(80, 2147483647, 'DAVIAN', 'LARGO ORTIZ', 21, 'ggdfd@sfaf', 2147483647),
(81, 2147483647, 'DAVIAN', 'LARGO ORTIZ', 21, 'ggdfd@sfaf', 2147483647);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla registropersonas
--
ALTER TABLE registropersonas
  ADD PRIMARY KEY (ID_Registro);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla registropersonas
--
ALTER TABLE registropersonas
  MODIFY ID_Registro int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
