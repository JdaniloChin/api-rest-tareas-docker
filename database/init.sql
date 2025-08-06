-- Crear base de datos si no existe
CREATE DATABASE IF NOT EXISTS tareas_db;
USE tareas_db;

-- Crear tabla usuarios (necesaria para la clave foránea)
CREATE TABLE IF NOT EXISTS usuarios (
    Id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear tabla tareas
CREATE TABLE IF NOT EXISTS tareas (
    id_tarea INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NULL,
    estado VARCHAR(50) NOT NULL,
    titulo VARCHAR(150) NOT NULL,
    descripcion VARCHAR(3000) NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(Id_usuario) ON DELETE SET NULL
);

-- Insertar datos de ejemplo en usuarios
INSERT INTO usuarios (nombre, email, password) VALUES 
('Juan Pérez', 'juan@example.com', 'password123'),
('María García', 'maria@example.com', 'password456'),
('Carlos López', 'carlos@example.com', 'password789');

-- Insertar datos de ejemplo en tareas
INSERT INTO tareas (id_usuario, estado, titulo, descripcion) VALUES 
(1, 'pendiente', 'Completar proyecto final', 'Terminar el desarrollo del API REST para la materia'),
(2, 'en_proceso', 'Estudiar para examen', 'Revisar todos los capítulos del libro de programación web'),
(1, 'completada', 'Configurar Docker', 'Aprender a usar Docker para containerizar aplicaciones'),
(3, 'pendiente', 'Crear documentación', 'Escribir la documentación del API para los estudiantes'),
(2, 'completada', 'Instalar herramientas', 'Configurar el ambiente de desarrollo con VS Code y Docker');
