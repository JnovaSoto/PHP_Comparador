-- Database Schema and Sample Data for PHP_Comparador

CREATE TABLE IF NOT EXISTS tipoAlimento (
    idTipo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS usuario (
    idUsuario INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    contra VARCHAR(255) NOT NULL,
    esAdmin TINYINT(1) DEFAULT 0
);

CREATE TABLE IF NOT EXISTS alimentos (
    idAlimento INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    hidratosTotales DECIMAL(10,2) DEFAULT 0.00,
    azucares DECIMAL(10,2) DEFAULT 0.00,
    grasasTotales DECIMAL(10,2) DEFAULT 0.00,
    grasasSaturadas DECIMAL(10,2) DEFAULT 0.00,
    proteinas DECIMAL(10,2) DEFAULT 0.00,
    valorEnergetico DECIMAL(10,2) DEFAULT 0.00,
    urlFoto VARCHAR(255),
    idTipo INT,
    FOREIGN KEY (idTipo) REFERENCES tipoAlimento(idTipo)
);

-- Insert categories
INSERT INTO tipoAlimento (idTipo, nombre) VALUES 
(1, 'Lácteos'), (2, 'Huevos'), (3, 'Carnes'), (4, 'Pescados'), 
(5, 'Grasas y Aceites'), (6, 'Cereales'), (7, 'Legumbres'), 
(8, 'Verduras'), (9, 'Frutas'), (10, 'Dulces'), (11, 'Bebidas'), (12, 'Otros')
ON DUPLICATE KEY UPDATE nombre=VALUES(nombre);

-- Insert Sample Foods (Alimentos)
INSERT INTO alimentos (nombre, hidratosTotales, azucares, grasasTotales, grasasSaturadas, proteinas, valorEnergetico, urlFoto, idTipo) VALUES 
('Leche Entera', 4.80, 4.80, 3.60, 2.30, 3.20, 62.00, 'assets/img/leche.jpg', 1),
('Yogur Natural', 4.70, 4.70, 3.30, 2.10, 3.50, 61.00, 'assets/img/yogur.jpg', 1),
('Pechuga de Pollo', 0.00, 0.00, 1.20, 0.30, 23.00, 110.00, 'assets/img/pollo.jpg', 3),
('Manzana', 13.80, 10.40, 0.20, 0.05, 0.30, 52.00, 'assets/img/manzana.jpg', 9),
('Coca Cola', 10.60, 10.60, 0.00, 0.00, 0.00, 42.00, 'assets/img/cocacola.jpg', 11),
('Salmón', 0.00, 0.00, 12.00, 3.10, 20.00, 190.00, 'assets/img/salmon.jpg', 4),
('Merluza', 0.00, 0.00, 2.00, 0.50, 12.00, 70.00, 'assets/img/merluza.jpg', 4);

-- Insert Default Admin
INSERT INTO usuario (email, nombre, contra, esAdmin) VALUES 
('admin@admin.com', 'admin', 'admin', 1)
ON DUPLICATE KEY UPDATE email=VALUES(email);
