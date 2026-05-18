# Mi Web Fitness ES

## Objetivo

Este proyecto es una aplicación web de fitness desarrollada en PHP, pensada para que se pueda instalar localmente y probar su funcionamiento.

## Requisitos previos

- Windows
- XAMPP instalado (Apache + MySQL)
- Navegador web

## Instalación local

1. Copiar la carpeta del proyecto a la ruta de XAMPP:
   - Normalmente `C:\xampp\htdocs\Mi_web_fitness`
2. Iniciar los servicios de XAMPP:
   - Apache
   - MySQL
3. Importar la base de datos:
   - Abrir `http://localhost/phpmyadmin`
   - Crear una base de datos con nombre, por ejemplo, `fitness_db`
   - Ir a la pestaña `Importar` y subir el archivo `db/fitness_db.sql`
4. Configurar la conexión a la base de datos:
   - Abrir `Includes/conexion.php`
   - Ajustar el host, usuario, contraseña y nombre de la base de datos según tu instalación de XAMPP.
5. Abrir el proyecto en el navegador:
   - Visitar `http://localhost/Mi_web_fitness/`

## Archivos principales

- `index.php` - Página de inicio
- `login.php` - Inicio de sesión
- `logout.php` - Cierre de sesión
- `registro.php` - Registro de usuarios
- `rutinas.php` - Gestión de rutinas
- `progreso.php` - Gestión del progreso
- `Includes/conexion.php` - Conexión a la base de datos
- `functions/` - Lógica de back-end por módulos
- `css/estilos.css` - Estilos del sitio
- `js/script.js` - Validaciones y dinámicas del front-end

## Consejos para testear el proyecto

- Verificar primero que Apache y MySQL funcionen en XAMPP.
- Asegurarse de importar la base de datos antes de abrir la aplicación.
- Revisar `Includes/conexion.php` si hay problemas de acceso a la base de datos.
- Probar el registro y login con diferentes usuarios.

## Ejemplo rápido

1. Abrir `http://localhost/Mi_web_fitness/registro.php`
2. Crear un usuario nuevo
3. Iniciar sesión en `http://localhost/Mi_web_fitness/login.php`
4. Navegar a `rutinas.php` y `progreso.php`

---

Si necesitan ayuda con la instalación o la configuración, pueden consultar este archivo o preguntar directamente.



# Mi web fitness EN

## Objective

This project is a fitness web application developed in PHP, designed to be installed locally and tested easily.

## Prerequisites

- Windows
- XAMPP installed (Apache + MySQL)
- Web browser

## Local Installation

1. Copy the project folder into the XAMPP directory:
    - Usually C:\xampp\htdocs\Mi_web_fitness
2. Start the XAMPP services:
    - Apache
    - MySQL
3. Import the database:
    - Open http://localhost/phpmyadmin
    - Create a database named, for example, fitness_db
    - Go to the Import tab and upload the file db/fitness_db.sql
4. Configure the database connection:
    - Open Includes/conexion.php
    - Adjust the host, username, password, and database name according to your XAMPP installation.
5. Open the project in your browser:
    -Visit http://localhost/Mi_web_fitness/

## Main Files

- index.php - Home page
- login.php - Login page
- logout.php - Logout page
- registro.php - User registration
- rutinas.php - Workout routine management
- progreso.php - Progress tracking
- Includes/conexion.php - Database connection
- functions/ - Modular back-end logic
- css/estilos.css - Website styles
- js/script.js - Front-end validations and dynamic functionality

## Tips for Testing the Project

First, verify that Apache and MySQL are running correctly in XAMPP.
Make sure to import the database before opening the application.
Check Includes/conexion.php if there are database connection issues.
Test registration and login with different users.

## Quick Example

Open http://localhost/Mi_web_fitness/registro.php
Create a new user
Log in at http://localhost/Mi_web_fitness/login.php
Navigate to rutinas.php and progreso.php

---

If you need help with the installation or configuration, feel free to check this file or ask directly.