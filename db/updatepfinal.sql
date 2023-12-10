

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


commit;