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

DELIMITER $$
CREATE PROCEDURE sp_SelectCategory()
BEGIN
    SELECT 
        CategoryID,
        categoryName,
        categoryInfo
    FROM 
        Categories
    ORDER BY 
        categoryName ASC;
END $$
DELIMITER ;



DELIMITER $$
CREATE PROCEDURE sp_CreateCategory(
    IN p_categoryName VARCHAR(100),
    IN p_categoryInfo TEXT
)
BEGIN
    INSERT INTO Categories (categoryName, categoryInfo) VALUES (p_categoryName, p_categoryInfo);
END $$
DELIMITER ;