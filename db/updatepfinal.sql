

ALTER TABLE `productos`
MODIFY COLUMN `producto_img` MEDIUMBLOB;

ALTER TABLE `productos`
DROP FOREIGN KEY `productos_ibfk_1`;

ALTER TABLE `categorias`
MODIFY COLUMN `id_categoria` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `productos`
ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

ALTER TABLE productos
ADD COLUMN existencias INT;

-- Actualizar id_producto
ALTER TABLE productos
MODIFY COLUMN id_producto INT AUTO_INCREMENT;

-- Actualizar id_marca
ALTER TABLE marcas
MODIFY COLUMN id_marca INT AUTO_INCREMENT;

commit;