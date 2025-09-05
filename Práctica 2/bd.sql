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
    SELECT CategoryID, categoryName, categoryInfo FROM Categories ORDER BY categoryName ASC;
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

DELIMITER $$
CREATE PROCEDURE sp_SelectCategoryByID(
    IN p_CategoryID INT
)
BEGIN
    SELECT CategoryID, categoryName, categoryInfo FROM  Categories WHERE CategoryID = p_CategoryID;
END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE sp_UpdateCategory(
    IN p_CategoryID INT,
    IN p_categoryName VARCHAR(100),
    IN p_categoryInfo TEXT
)
BEGIN
    UPDATE Categories SET categoryName = p_categoryName, categoryInfo = p_categoryInfo WHERE CategoryID = p_CategoryID;
END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE sp_DeleteCategory(
    IN p_CategoryID INT
)
BEGIN
    DELETE FROM Categories WHERE CategoryID = p_CategoryID;
END $$
DELIMITER ;

CREATE TABLE Rol (
    RolID INT PRIMARY KEY AUTO_INCREMENT,
    rolName VARCHAR(50) NOT NULL UNIQUE,
    rolInfo TEXT NULL
);

INSERT INTO Rol (rolName, rolInfo) VALUES
('Administrador', 'Administrador del sistema'),
('Empleado', 'Usuario con permisos de empleado');

CREATE TABLE User (
    UserID INT PRIMARY KEY AUTO_INCREMENT,
    userName VARCHAR(100) NOT NULL,
    userGender VARCHAR(50) NULL,
    userNickname VARCHAR(100) NULL,
    userEmail VARCHAR(100) NOT NULL UNIQUE,
    userPassword VARCHAR(900) NOT NULL,
    RolID INT NOT NULL,
    FOREIGN KEY (RolID) REFERENCES Rol(RolID) ON DELETE RESTRICT ON UPDATE RESTRICT
);

INSERT INTO User (userName, userGender, userNickname, userEmail, userPassword, RolID) VALUES
('Juan Pérez', 'Masculino', 'admin', 'juan.perez@example.com', '202cb962ac59075b964b07152d234b70', 1),
('María Gómez', 'Femenino', 'empleado', 'maria.gomez@example.com', '202cb962ac59075b964b07152d234b70', 2);
