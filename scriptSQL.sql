DROP DATABASE IF EXISTS bdcabanas;

CREATE DATABASE bdcabanas
CHARACTER SET utf8mb4
COLLATE utf8mb4_spanish_ci;

USE bdcabanas;

-- 1. Tabla para el login del panel de administración
CREATE TABLE usuarios (
    idUsuario INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    clave VARCHAR(50) NOT NULL
);


CREATE TABLE clientes (
    idCliente INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    rut VARCHAR(12),
    telefono VARCHAR(15) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    ciudad VARCHAR(50) NOT NULL
);

-- --- INSERCIÓN DE DATOS ---


INSERT INTO usuarios (usuario, clave) 
VALUES ('jorge', '1234');

-- Un registro de prueba simulando a un cliente que llenó el formulario
INSERT INTO clientes (nombre, apellido, rut, telefono, correo, ciudad) VALUES
('Juan', 'Pérez', '19876543-2', '987654321', 'ejemplo@correo.com', 'Temuco');

-- Mostrar los datos de los clientes para verificar
SELECT * FROM clientes;