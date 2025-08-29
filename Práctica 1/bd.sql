CREATE DATABASE IF NOT EXISTS practicaDWSL;
USE practicaDWSL;

CREATE TABLE Categories (
    CategoryID INT PRIMARY KEY AUTO_INCREMENT,
    categoryName VARCHAR(100) NOT NULL,
    categoryInfo TEXT NULL
);

INSERT INTO Categories (categoryName, categoryInfo) VALUES
('Tecnología', 'Dispositivos electrónicos, gadgets y accesorios de última generación.'),
('Libros y Cómics', 'Colección de literatura, textos académicos, novelas gráficas y manga.'),
('Hogar y Jardín', 'Artículos para la decoración, mantenimiento y mejora de tu casa y jardín.');