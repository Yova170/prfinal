

ALTER TABLE productos
MODIFY producto_img VARCHAR(255);

ALTER TABLE `productos`
DROP FOREIGN KEY `productos_ibfk_1`;

ALTER TABLE `categorias`
MODIFY COLUMN `id_categoria` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `productos`
ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

-- Actualizar id_producto
ALTER TABLE productos
MODIFY COLUMN id_producto INT AUTO_INCREMENT;

-- Actualizar id_marca
ALTER TABLE marcas
MODIFY COLUMN id_marca INT AUTO_INCREMENT;

ALTER TABLE administradores
ADD COLUMN correo varchar(50);

-- Cambios para actualizar la tabla productos
ALTER TABLE `productos`
    MODIFY COLUMN `id_producto` int(11) AUTO_INCREMENT PRIMARY KEY,
    MODIFY COLUMN `producto_img` varchar(255) NOT NULL;

-- Añadir claves foráneas
ALTER TABLE `productos`
    ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`),
    ADD CONSTRAINT `fk_marca` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`);

CREATE TABLE `configuracion` (
  `id_configuracion` int(11) AUTO_INCREMENT PRIMARY KEY,
  `valor_iva` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO configuracion (valor_iva) VALUES (0.00);


CREATE TABLE `clientes_empresariales` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `cod_usuario` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `correo` varchar(40) NOT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  FOREIGN KEY (`cod_usuario`) REFERENCES `clientes` (`cod_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


commit;