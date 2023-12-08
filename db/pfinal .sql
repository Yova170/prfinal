-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-12-2023 a las 10:27:44
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pfinal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `cod_usuario` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`cod_usuario`, `usuario`, `contrasena`, `nombre`, `apellido`, `direccion`, `telefono`) VALUES
(1, 'root', 'root', 'Bryan', 'Martinez', 'David', '1111-1111');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Video Juegos'),
(2, 'Celulares'),
(3, 'Televisores'),
(4, 'Electrodomesticos'),
(5, 'Computadoras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cod_usuario` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `correo` varchar(40) NOT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cod_usuario`, `usuario`, `correo`, `contrasena`, `nombre`, `apellido`, `direccion`, `telefono`) VALUES
(1, 'root', 'root@gmail.com', 'root', 'root', 'admin', 'admin', '1111-1111'),
(2, 'root1', 'root1@gmail.com', '12345678', 'root', 'root', 'root', '65454545'),
(3, 'bryan', 'bryanyoba@gmail.com', '1234576', 'RNB/LS 7748', 'Bryan Martinez', '1345 NW 98TH CT', '78636028');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `nombre_marca` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre_marca`) VALUES
(1, 'Microsoft'),
(2, 'Sony'),
(3, 'Nintendo'),
(4, 'Apple'),
(5, 'Nokia'),
(6, 'Samsumg'),
(7, 'Xiaomi'),
(8, 'AMAZON'),
(9, 'LG'),
(10, 'Ninja'),
(11, 'UTPStore');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(255) DEFAULT NULL,
  `descripcion_producto` text DEFAULT NULL,
  `producto_img` varchar(50) NOT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `descripcion_producto`, `producto_img`, `precio`, `stock`, `id_categoria`, `id_marca`) VALUES
(0, 'XBOX SERIES X', '\r\nLa Xbox Series X es una consola de videojuegos de sobremesa de próxima generación desarrollada por Microsoft. Se lanzó el 10 de noviembre de 2020, junto con la Xbox Series S.\r\n\r\nLa Xbox Series X es una consola potente que puede ejecutar juegos a 4K a 60 fps o incluso 120 fps. Cuenta con un procesador AMD Zen 2 de 8 núcleos a 3,8 GHz, una GPU AMD RDNA 2 con 12 teraflops de potencia y 16 GB de memoria GDDR6.\r\n\r\nLa Xbox Series X también cuenta con un', '../productos/c1/c0.jpg', 499.99, 2, 1, 1),
(1, 'XBOX SERIES S', 'La Xbox Series S es la consola de juegos más pequeña y asequible de Microsoft. Con un tamaño de solo 6,5 x 15,1 x 27,5 cm, es fácil de colocar en cualquier lugar de tu hogar. Y con un precio inicial de $299, es una excelente opción para los jugadores que buscan una experiencia de juego de alta calidad sin gastar una fortuna.\r\n\r\nLa Xbox Series S está equipada con una GPU AMD RDNA 2 de 4 teraflops que puede ofrecer juegos a 1440p a 60 fps o 1080p a 120 fps. También tiene una unidad de estado sólido (SSD) de 512 GB que brinda tiempos de carga rápidos.\r\n\r\nLa Xbox Series S es compatible con una amplia gama de juegos, incluidos los últimos títulos de Xbox Game Studios, juegos de terceros y títulos retrocompatibles de Xbox One y Xbox 360. También tiene acceso a Xbox Game Pass, un servicio de suscripción que ofrece acceso a más de 100 juegos por una tarifa mensual.\r\n\r\nSi estás buscando una consola de juegos asequible que ofrezca una gran experiencia de juego, la Xbox Series S es una excelente opción. Es compacta, asequible y compatible con una amplia gama de juegos.', '../productos/c1/1.jpg', 299.00, 3, 1, 1),
(2, 'PS5', 'La PlayStation 5 es la consola de juegos definitiva para los jugadores más exigentes. Con su potente hardware, sus impresionantes gráficos y su amplia biblioteca de juegos, la PS5 ofrece una experiencia de juego inigualable.\r\n\r\nLa PS5 está equipada con una CPU AMD Zen 2 de 8 núcleos y una GPU AMD RDNA 2 que pueden ofrecer juegos a 4K a 60 fps o 8K a 30 fps. También tiene una unidad de estado sólido (SSD) de 825 GB que brinda tiempos de carga rápidos.\r\n\r\nLa PS5 es compatible con una amplia gama de juegos, incluidos los últimos títulos de PlayStation Studios, juegos de terceros y títulos retrocompatibles de PlayStation 4. También tiene acceso a PlayStation Plus, un servicio de suscripción que ofrece acceso a juegos en línea, descuentos y recompensas.\r\n\r\nSi estás buscando la mejor experiencia de juego posible, la PlayStation 5 es la consola perfecta para ti. Es potente, impresionante y tiene una amplia biblioteca de juegos para que disfrutes.\r\n\r\n', '../productos/c1/2.jpg', 499.00, 0, 1, 2),
(3, 'Nintendo Switch', 'La Nintendo Switch es una consola de juegos híbrida que te permite jugar en casa o en el camino. Con su diseño modular, puedes conectarla a tu televisor para jugar en modo TV o llevarla contigo para jugar en modo portátil.\r\n\r\nLa Nintendo Switch está equipada con una pantalla táctil de 6,2 pulgadas, dos mandos Joy-Con desmontables y un procesador Nvidia Tegra X1. También tiene una unidad de estado sólido (SSD) de 32 GB que brinda tiempos de carga rápidos.\r\n\r\nLa Nintendo Switch es compatible con una amplia gama de juegos, incluidos los últimos títulos de Nintendo, juegos de terceros y títulos retrocompatibles de Wii U. También tiene acceso a Nintendo Switch Online, un servicio de suscripción que ofrece acceso a juegos clásicos de NES y SNES, juegos en línea y recompensas.\r\n\r\nSi estás buscando una consola de juegos que te permita jugar en cualquier lugar, la Nintendo Switch es una excelente opción. Es versátil, portátil y tiene una amplia biblioteca de juegos para que disfrutes.', '../productos/c1/3.jpg', 299.00, 1, 1, 3),
(4, 'FC 24 XBOX SERIES', 'EA SPORTS FC 24 XBOX es un videojuego de fútbol desarrollado por EA, y publicado por EA Sports. Este juego marca la primera entrega de la serie EA Sports FC, ​ tras la conclusión de la asociación de EA con FIFA.\r\n\r\nFC 24 cuenta con más de 19,000 futbolistas con licencia, más de 700 equipos, más de 100 estadios y más de 30 ligas. El juego también presenta nuevas tecnologías, como HyperMotion2 y PlayStyles, que están diseñadas para mejorar la experiencia de juego.\r\n\r\nEn resumen, FC 24 es un videojuego de fútbol realista y completo que ofrece una experiencia de juego fluida y emocionante.', '../productos/c1/c4.jpg', 69.99, 5, 1, 1),
(5, 'FC 24 PS5', 'EA SPORTS FC 24 PS5 es un videojuego de fútbol desarrollado por EA, y publicado por EA Sports. Este juego marca la primera entrega de la serie EA Sports FC, ​ tras la conclusión de la asociación de EA con FIFA.\r\n\r\nFC 24 cuenta con más de 19,000 futbolistas con licencia, más de 700 equipos, más de 100 estadios y más de 30 ligas. El juego también presenta nuevas tecnologías, como HyperMotion2 y PlayStyles, que están diseñadas para mejorar la experiencia de juego.\r\n\r\nEn resumen, FC 24 es un videojuego de fútbol realista y completo que ofrece una experiencia de juego fluida y emocionante.', '../productos/c1/c5.jpg', 69.99, 5, 1, 2),
(6, 'FC 24 Nintendo Switch', 'EA SPORTS FC 24 NINTENDO es un videojuego de fútbol desarrollado por EA, y publicado por EA Sports. Este juego marca la primera entrega de la serie EA Sports FC, ​ tras la conclusión de la asociación de EA con FIFA.\r\n\r\nFC 24 cuenta con más de 19,000 futbolistas con licencia, más de 700 equipos, más de 100 estadios y más de 30 ligas. El juego también presenta nuevas tecnologías, como HyperMotion2 y PlayStyles, que están diseñadas para mejorar la experiencia de juego.\r\n\r\nEn resumen, FC 24 es un videojuego de fútbol realista y completo que ofrece una experiencia de juego fluida y emocionante.', '../productos/c1/c6.jpg', 59.00, 2, 1, 3),
(7, 'MANDO XBOX SERIES S/X AZUL', 'El mando de Xbox Series X|S es una versión mejorada del mando de Xbox One. Tiene un diseño más ergonómico, botones más sensibles y nuevas características que mejoran la experiencia de juego.\r\n\r\nEl agarre es más profundo y ancho, lo que lo hace más cómodo de sostener durante largos períodos de tiempo. Los botones también son más sensibles, lo que permite a los jugadores realizar acciones con mayor precisión.\r\n\r\nLas nuevas características incluyen un botón de compartir para compartir fácilmente capturas de pantalla y videos, un botón de retroceso para volver a la pantalla anterior, retroalimentación háptica para una sensación de profundidad y realismo, y gatillos adaptativos que se pueden ajustar para proporcionar una resistencia variable.', '../productos/c1/c7.jpg', 59.99, 2, 1, 1),
(8, 'MANDO XBOX SERIES X/S ROJO', 'El mando de Xbox Series X|S es una versión mejorada del mando de Xbox One. Tiene un diseño más ergonómico, botones más sensibles y nuevas características que mejoran la experiencia de juego.\r\n\r\nEl agarre es más profundo y ancho, lo que lo hace más cómodo de sostener durante largos períodos de tiempo. Los botones también son más sensibles, lo que permite a los jugadores realizar acciones con mayor precisión.\r\n\r\nLas nuevas características incluyen un botón de compartir para compartir fácilmente capturas de pantalla y videos, un botón de retroceso para volver a la pantalla anterior, retroalimentación háptica para una sensación de profundidad y realismo, y gatillos adaptativos que se pueden ajustar para proporcionar una resistencia variable.', '../productos/c1/c8.jpg', 59.99, 2, 1, 1),
(9, 'MANDO XBOX SERIES X/S BLANCO', 'El mando de Xbox Series X|S es una versión mejorada del mando de Xbox One. Tiene un diseño más ergonómico, botones más sensibles y nuevas características que mejoran la experiencia de juego.\r\n\r\nEl agarre es más profundo y ancho, lo que lo hace más cómodo de sostener durante largos períodos de tiempo. Los botones también son más sensibles, lo que permite a los jugadores realizar acciones con mayor precisión.\r\n\r\nLas nuevas características incluyen un botón de compartir para compartir fácilmente capturas de pantalla y videos, un botón de retroceso para volver a la pantalla anterior, retroalimentación háptica para una sensación de profundidad y realismo, y gatillos adaptativos que se pueden ajustar para proporcionar una resistencia variable.', '../productos/c1/c9.jpg', 59.99, 8, 1, 1),
(10, 'MANDO PS5 ROJO', 'El mando de la PlayStation 5, también conocido como DualSense, es un controlador de videojuegos diseñado por Sony Interactive Entertainment para su consola PlayStation 5. Es el sucesor del DualShock 4 y presenta una serie de mejoras, como un diseño más ergonómico, retroalimentación háptica y gatillos adaptativos.\r\n\r\nEl DualSense tiene un diseño similar al del DualShock 4, pero con algunas mejoras clave. El agarre es más profundo y ancho, lo que lo hace más cómodo de sostener durante largos períodos de tiempo. Los botones también son más sensibles, lo que permite a los jugadores realizar acciones con mayor precisión.', '../productos/c1/c10.jpg', 69.99, 3, 1, 2),
(11, 'MANDO PS5 BLANCO', 'El mando de la PlayStation 5, también conocido como DualSense, es un controlador de videojuegos diseñado por Sony Interactive Entertainment para su consola PlayStation 5. Es el sucesor del DualShock 4 y presenta una serie de mejoras, como un diseño más ergonómico, retroalimentación háptica y gatillos adaptativos.\r\n\r\nEl DualSense tiene un diseño similar al del DualShock 4, pero con algunas mejoras clave. El agarre es más profundo y ancho, lo que lo hace más cómodo de sostener durante largos períodos de tiempo. Los botones también son más sensibles, lo que permite a los jugadores realizar acciones con mayor precisión.', '../productos/c1/c11.jpg', 69.99, 6, 1, 2),
(12, 'CALL OF DUTY MW3 XBOX SERIES X/S', '\r\nCall of Duty: Modern Warfare III XBOX es un videojuego de disparos en primera persona desarrollado por Sledgehammer Games y publicado por Activision. Es una secuela directa de Call of Duty: Modern Warfare (2019).\r\n\r\nLa historia de Call of Duty: Modern Warfare III comienza inmediatamente después de los eventos de Call of Duty: Modern Warfare. Los jugadores controlan a varios personajes, incluidos John Price, Alex, Farah Karim y Nikolai. La historia se centra en la guerra entre las fuerzas de la coalición y el grupo terrorista Al-Qatala, liderado por Khaled Al-Asad.', '../productos/c1/c12.jpg', 69.99, 3, 1, 1),
(13, 'CALL OF DUTY MW3 PS5', '\r\nCall of Duty: Modern Warfare III PS5 es un videojuego de disparos en primera persona desarrollado por Sledgehammer Games y publicado por Activision. Es una secuela directa de Call of Duty: Modern Warfare (2019).\r\n\r\nLa historia de Call of Duty: Modern Warfare III comienza inmediatamente después de los eventos de Call of Duty: Modern Warfare. Los jugadores controlan a varios personajes, incluidos John Price, Alex, Farah Karim y Nikolai. La historia se centra en la guerra entre las fuerzas de la coalición y el grupo terrorista Al-Qatala, liderado por Khaled Al-Asad.', '../productos/c1/c13.jpg', 69.99, 6, 1, 2),
(14, 'SUPER SMASH BROSS ULTIMATE NS', 'Super Smash Bros. Ultimate es un videojuego de lucha desarrollado por Sora Ltd. y Bandai Namco Entertainment y distribuido por Nintendo para la consola Nintendo Switch. Fue lanzado a nivel mundial el 7 de diciembre de 2018 y se trata del quinto título de la serie Super Smash Bros.​\r\n\r\nEl juego presenta un elenco de más de 80 personajes de diferentes franquicias de Nintendo, así como de otras compañías. Los jugadores pueden elegir a un personaje y luchar contra otros jugadores en una variedad de escenarios. El juego también cuenta con una variedad de modos de juego, incluidos el modo historia, el modo multijugador y el modo online.\r\n\r\nSuper Smash Bros. Ultimate recibió críticas positivas de los críticos. El juego fue elogiado por su gran elenco de personajes, su variedad de modos de juego y su jugabilidad accesible pero desafiante.', '../productos/c1/c14.jpg', 59.99, 8, 1, 3),
(15, 'MARIO KART 8 DELUXE NS', 'Super Smash Bros. Ultimate es un videojuego de lucha desarrollado por Sora Ltd. y Bandai Namco Entertainment y distribuido por Nintendo para la consola Nintendo Switch. Fue lanzado a nivel mundial el 7 de diciembre de 2018 y se trata del quinto título de la serie Super Smash Bros.​\r\n\r\nEl juego presenta un elenco de más de 80 personajes de diferentes franquicias de Nintendo, así como de otras compañías. Los jugadores pueden elegir a un personaje y luchar contra otros jugadores en una variedad de escenarios. El juego también cuenta con una variedad de modos de juego, incluidos el modo historia, el modo multijugador y el modo online.\r\n\r\nSuper Smash Bros. Ultimate recibió críticas positivas de los críticos. El juego fue elogiado por su gran elenco de personajes, su variedad de modos de juego y su jugabilidad accesible pero desafiante.', '../productos/c1/c15.jpg', 59.00, 2, 1, 3),
(16, 'Iphone 13 PRO MAX', 'El iPhone 13 Pro Max es un smartphone de gama alta desarrollado por Apple. Es el modelo más grande y potente de la serie iPhone 13, y se lanzó el 24 de septiembre de 2021.\r\n\r\nEl iPhone 13 Pro Max cuenta con una pantalla OLED de 6,7 pulgadas con una resolución de 2778 x 1284 píxeles. El teléfono está alimentado por el chip A15 Bionic de Apple, que es el chip móvil más rápido del mundo. El iPhone 13 Pro Max también tiene una triple cámara trasera con un sensor principal de 12 megapíxeles, un sensor ultra gran angular de 12 megapíxeles y un sensor teleobjetivo de 12 megapíxeles.', '../productos/c2/c16.jpg', 1049.99, 2, 2, 4),
(17, 'Iphone 15 PRO MAX', 'l iPhone 15 Pro Max es un smartphone de gama alta desarrollado por Apple. Es el modelo más grande y potente de la serie iPhone 15, y se lanzó el 10 de noviembre de 2023.\r\n\r\nEl iPhone 15 Pro Max cuenta con una pantalla OLED de 6,8 pulgadas con una resolución de 2800 x 1284 píxeles. El teléfono está alimentado por el chip A16 Bionic de Apple, que es el chip móvil más rápido del mundo. El iPhone 15 Pro Max también tiene una triple cámara trasera con un sensor principal de 48 megapíxeles, un sensor ultra gran angular de 12 megapíxeles y un sensor teleobjetivo de 12 megapíxeles.', '../productos/c2/c17.jpg', 1499.99, 1, 2, 4),
(18, 'Iphone 11', 'El iPhone 11 es un smartphone de gama media desarrollado por Apple. Es el modelo más básico de la serie iPhone 11, y se lanzó el 20 de septiembre de 2019.\r\n\r\nEl iPhone 11 cuenta con una pantalla LCD de 6,1 pulgadas con una resolución de 1792 x 828 píxeles. El teléfono está alimentado por el chip A13 Bionic de Apple, que es un chip móvil potente y eficiente. El iPhone 11 también tiene una doble cámara trasera con un sensor principal de 12 megapíxeles y un sensor ultra gran angular de 12 megapíxeles.', '../productos/c2/c18.jpg', 500.00, 11, 2, 4),
(19, 'NOKIA INDESTRUCTIBLE', 'El Nokia 1200 es un teléfono móvil de gama baja lanzado en 2007. Es un teléfono simple y asequible que ofrece las funciones básicas de un teléfono móvil, como llamadas, mensajes de texto y acceso a Internet.\r\n\r\nEl Nokia 1200 tiene una pantalla LCD de 1,5 pulgadas con una resolución de 96 x 68 píxeles. El teléfono está alimentado por un procesador de 1,2 GHz y tiene 16 MB de RAM. El Nokia 1200 también tiene una cámara trasera de 0,3 megapíxeles.', '../productos/c2/c19.jpg', 3000.00, 1, 2, 5),
(20, 'XIAOMI POCO X3', '\r\nEl Xiaomi Poco X3 es un smartphone de gama media lanzado en 2020. Es un teléfono asequible que ofrece buenas características y rendimiento.\r\n\r\nEl Poco X3 cuenta con una pantalla LCD de 6,67 pulgadas con una resolución de 1080 x 2400 píxeles. El teléfono está alimentado por el procesador Snapdragon 732G, que es un chip móvil potente y eficiente. El Poco X3 también tiene una triple cámara trasera con un sensor principal de 64 megapíxeles, un sensor ultra gran angular de 13 megapíxeles y un sensor macro de 2 megapíxeles.', '../productos/c2/c20.jpg', 270.00, 9, 2, 7),
(21, 'XIAOMI REDMMI NOTE 12 PRO', 'El Xiaomi Redmi Note 12 Pro es un smartphone de gama media lanzado en 2023. Es una actualización del Redmi Note 11 Pro, y ofrece mejoras significativas en el rendimiento, la cámara y la pantalla.\r\n\r\nEl Redmi Note 12 Pro cuenta con una pantalla AMOLED de 6,67 pulgadas con una resolución de 1080 x 2400 píxeles y una frecuencia de actualización de 120 Hz. El teléfono está alimentado por el procesador MediaTek Dimensity 1300, que es un chip móvil potente y eficiente. El Redmi Note 12 Pro también tiene una triple cámara trasera con un sensor principal de 108 megapíxeles, un sensor ultra gran angular de 8 megapíxeles y un sensor macro de 2 megapíxeles.', '../productos/c2/c21.jpg', 399.99, 4, 2, 7),
(22, 'SAMSUNG GALAXY S23 ULTRA', 'El Samsung Galaxy S23 Ultra es un smartphone de gama alta lanzado en 2023. Es el modelo más potente y avanzado de la serie Galaxy S23, y ofrece una serie de características y funciones innovadoras.\r\n\r\nEl Galaxy S23 Ultra cuenta con una pantalla AMOLED de 6,8 pulgadas con una resolución de 3088 x 1440 píxeles y una frecuencia de actualización de 120 Hz. El teléfono está alimentado por el procesador Snapdragon 8 Gen 2, que es el chip móvil más potente del mundo. El Galaxy S23 Ultra también tiene una cámara trasera cuádruple con un sensor principal de 200 megapíxeles, un sensor ultra gran angular de 12 megapíxeles, un sensor teleobjetivo de 10 megapíxeles y un sensor teleobjetivo periscópico de 10 megapíxeles.', '../productos/c2/c22.jpg', 1199.99, 3, 2, 6),
(23, 'SAMGUNG GALAXY S20', 'El 20 es un teléfono inteligente de gama media lanzado en 2023 por la empresa china Xiaomi. Es un teléfono asequible que ofrece buenas características y rendimiento.\r\n\r\nEl 20 cuenta con una pantalla LCD de 6,53 pulgadas con una resolución de 1080 x 2400 píxeles. El teléfono está alimentado por el procesador MediaTek Helio G95, que es un chip móvil potente y eficiente. El 20 también tiene una triple cámara trasera con un sensor principal de 48 megapíxeles, un sensor ultra gran angular de 8 megapíxeles y un sensor macro de 2 megapíxeles.', '../productos/c2/c23.jpg', 499.99, 3, 2, 6),
(24, 'SAMSUNG GALAXY A10', 'El Samsung Galaxy A10 es un teléfono inteligente de gama baja lanzado en 2019. El precio de lanzamiento del Samsung Galaxy A10 fue de 179 dólares para la versión de 32 GB y de 219 dólares para la versión de 64 GB.\r\n\r\nActualmente, el precio del Samsung Galaxy A10 ha bajado significativamente. En Estados Unidos, se puede encontrar el Samsung Galaxy A10 por un precio de entre 100 y 150 dólares, dependiendo del estado del teléfono y de la tienda donde se compre.', '../productos/c2/c24.jpg', 130.00, 5, 2, 6),
(25, 'AMAZON FIRE TV 10\', 'El Amazon Fire TV de 10 pulgadas es un televisor inteligente asequible que ofrece una buena experiencia de visualización. Tiene una pantalla HD de 10 pulgadas con resolución de 1280 x 800 píxeles. El televisor está alimentado por el procesador MediaTek MT8183, que es un chip móvil potente y eficiente. El Amazon Fire TV de 10 pulgadas también tiene una cámara frontal de 2 megapíxeles para videollamadas.', '../productos/c3/c25.jpg', 99.99, 7, 3, 8),
(26, 'INSIGNIA AMAZON FIRE TV 4K', 'El Insignia Amazon Fire TV 4K es un televisor inteligente asequible que ofrece una buena experiencia de visualización 4K. Tiene una pantalla LED de 43 pulgadas con resolución de 3840 x 2160 píxeles. El televisor está alimentado por el procesador MediaTek MT9212, que es un chip móvil potente y eficiente. El Insignia Amazon Fire TV 4K también tiene un sistema de sonido de 2 altavoces de 10 vatios.', '../productos/c3/c26.jpg', 329.99, 4, 3, 8),
(27, 'SAMSUNG FULL HD 40\', 'Resolución Full HD 1080p\r\nPurColor\r\nMicro Dimming Pro\r\nSamsung Smart TV\r\nSoporte de aplicación SmartThings', '../productos/c3/c27.jpg', 217.99, 3, 3, 6),
(28, 'LG UHD AI ThinQ', 'Smart TV fácil, intuitivo y con Inteligencia Artificial\r\nExperiencia Audiovisual: compatible con formatos HDR10 Pro /HDR HLG / HDR HGiG\r\nProcesador de Gran Potencia 4K a5 Gen 5: Gran Precisión de Tonos y Colores, actuando sobre 576 áreas de cada fotograma / Direct LED. Identifica el movimiento de objetos para escalar y simular un Sonido Surround de 5.1 canales\r\nEcosistema Abierto e Inteligente (ThinQ): Smart TV webOS22/ Compatible con Apple Home Kit, Google, Alexa/ Requiere Magic Remote, NO incluido.\r\nFunciones Gaming: Cloud Gaming (Stadia y GeForce Now)/ Menú exclusivo Gaming /ALLM (Baja Latencia <19ms)/HGiG', '../productos/c3/c28.jpg', 279.99, 2, 3, 9),
(29, 'LG OLED 55\', 'Con los 8 millones de píxeles OLED autoiluminados de LG, obtendrá una experiencia de visualización vívida con contraste infinito, negro profundo y más de mil millones de colores que agregan profundidad y sacan lo mejor en lo que sea que esté viendo. Soporte Bluetooth Versión 5.0, fuente de alimentación (voltaje, Hz) CA 120V, 50/60Hz.\r\nDiseñado especialmente para LG, el avanzado procesador α7 Gen5 AI 4K adapta algorítmicamente y ajusta la calidad de imagen y sonido para una experiencia de visualización realista con profundidad y colores intensos', '../productos/c3/c29.jpg', 1467.86, 3, 3, 9),
(30, 'MICROONDAS AMAZON BASIC', '20 l de capacidad, plato giratorio de 255 mm; Horno de convección\r\n5 niveles de potencia, temporizador ajustable de 35 minutos\r\nFunción de descongelado; manual de usuario\r\n700 W de potencia\r\nDimensiones: 44,0 x 34,0 x 25,9 cm\r\nMaterial: Carcasa pintada, frente de la puerta y panel de control de plástico\r\nPanel de control: Controles digitales con pantalla LED\r\nUso: Hornear, gratinar, calentar y descongelar', '../productos/c4/c30.jpg', 80.00, 3, 4, 8),
(31, 'SAMSUNG GE732K HORNO', '- Encimera Microondas combinado 20 L 750 W Gris\r\n- Parrilla 1150 W\r\n- Función descongelar Función recalentar\r\n- Tornamesa\r\n- Tocar LED Reloj integrado Bloqueo para niños\r\n- Número de niveles de potencia: 6 Nº de programas automáticos: 6', '../productos/c4/c31.jpg', 99.00, 1, 4, 6),
(32, 'FREIDORA DE AIRE AMAZON BASIC', 'Freidora de aire para hacer alimentos fritos con poco o ningún aceite o grasa, mientras que todavía logra el mismo sabor delicioso\r\nIncluye una freidora de aire de 6.3 cuartos con un plato antiadherente y tanque desmontables, aptos para lavavajillas,', '../productos/c4/c32.jpg', 50.00, 3, 4, 8),
(33, 'HORNO DE AIRE 10 EN 1', 'Verdadera convección envolvente: hasta 10 veces la potencia de convección frente a un horno de convección tradicional de tamaño completo para resultados más rápidos, crujientes y jugosos.\r\nMáxima versatilidad: freír al aire, asar al aire, hornear, asar, tostar, bagel, deshidratar, recalentar y pizza, todo en un potente aparato de 1800 vatios.\r\nSistema de cocción inteligente: logra la cocción perfecta de raro a bien hecho con el toque de un botón con el termómetro inteligente de alimentos integrado, no requiere conjeturas.', '../productos/c4/c33.jpg', 99.99, 2, 4, 10),
(34, 'CYBERPOWER PC GAMER', 'Sistema: intel core i5-11600kf 3.9ghz 6-core | intel b560 chipset | 16gb ddr4 | 500gb pci-e nvme ssd | 1tb hdd | windows 11 home 64-bit\r\nGráficos: tarjeta de video nvidia geforce rtx 3060 de 12 gb | 1 hdmi | 2 displayport\r\nConectividad: 6 x usb 3.1 | 2 x usb 2.0 | 1x rj-45 red ethernet 10/100/1000 | 802.11ac wi-fi | audio: 7.1 canal | teclado y mouse', '../productos/c5/c34.jpg', 1000.00, 2, 5, 11),
(35, 'HP Microsoft Authorized Refurbished Elite Desktop PC', 'PROCESADOR PODEROSO: construido con un procesador Intel Core i5, puede esperar un rendimiento rápido y confiable y una experiencia de PC excepcional\r\nALMACENAMIENTO Y MEMORIA SUPERIORES: mucho espacio de almacenamiento para guardar sus medios favoritos y aún así tener mucho espacio para trabajar. La gran cantidad de memoria lo ayudará a completar sus tareas rápidamente\r\nCONECTIVIDAD INTEGRADA: manténgase conectado a Internet con el adaptador WiFi USB. Reproduce tus canciones favoritas con sonido estéreo. Conéctese a monitores grandes y múltiples gracias a la tecnología Display Port integrada', '../productos/c5/c35.jpg', 299.00, 4, 5, 11),
(37, 'Beelink Mini PC, SEi12', 'Potente mini PC de oficina de 8 núcleos: la mini PC Beelink SEi12 viene con procesadores Intel Core i5 de 12ª generación i5-12450H de frecuencia turbo máxima de 4.4 Ghz (8C/12T) compatible con caché inteligente de 12 MB. 8 núcleos 12 hilos permite a este procesador procesar más tareas simultáneamente. Un mini escritorio rápido y suave y que ahorra energía, la mini computadora Beelink SEi12 puede satisfacer el uso de sus diversos escenarios, como oficina ligera, edición de fotos/videos/audio, renderizado, clase en línea, conferencia en línea, etc.\r\n✅【Gran almacenamiento de 16 GB RAM/PCle 4.0 SSD 500G】Beelink Mini PC tiene DDR4 de 16G y PCle 4.0 SSD 500G, velocidad de lectura de hasta 3500 MB/S, 16 GB de RAM DDR4 (máximo 3200 Mhz) se puede actualizar a 32 GB, hasta 64 GB de RAM de la ranura para tarjeta dual. Y puede ampliar el almacenamiento con la interfaz SSD M.2 2280 NVMe almacenamiento de actualización a 2 TB (no incluido) y a través de HDD SATA3 (2.5 pulgadas 0.276 in) hasta 2T (no incluido).', '../productos/c5/c36.jpg', 389.99, 2, 5, 11),
(38, 'Alarco Computadora de escritorio para juegos', 'Computadora de escritorio de la PC del juego del ventilador del RGB 3 con el\r\nEjecuta Fortnite promedio 100 FPS en configuración baja y 60 FPS en configuraciones medias. Ejecuta Pubg promedio 30 FPS en configuraciones bajas. Funciona con un promedio de GTA5 de 30 FPS.\r\nIntel Core i5-2400 3.10 Ghz\r\nTarjeta de vídeo GTX 650 de 1 GB con salidas DVI, HDMI y VGA.\r\n1 año de garantía.', '../productos/c5/c37.jpg', 800.00, 1, 5, 11),
(39, 'Acer Nitro 5 - Laptop para juegos, FHD IPS de 17.3 pulgadas', '【Especificaciones dominantes】Enciéndelo y luego acelera a toda velocidad más rápido y más eficazmente que nunca con la próxima evolución de Acer de su portátil para juegos Nitro 5. El nuevo Nitro 5 se eleva a nuevos niveles de rendimiento para jugadores y creadores, cortesía de su procesador Intel Core i5-12500H de 12ª generación (12C/16T, 3.30GHz/4.50GHz) y gráficos GeForce RTX 3050\r\nImagen perfecta. Furiosamente rápido: con las imágenes nítidas de una pantalla IPS Full HD de 17.3 pulgadas con una frecuencia de actualización rápida de 144 Hz, tus sesiones de juego serán fluidas, sin interrupciones e inigualables. Ahora puedes aterrizar esos disparos reflexivos con precisión milimétrica y un efecto fantasma mínimo.', '../productos/c5/c39.jpg', 1100.00, 3, 5, 11),
(40, 'Lenovo ThinkPad X1 Carbon Laptop con Windows de alto rendimiento', 'Marca Lenovo, Modelo 20KH002JUS\r\nTipo de producto: Ultrabook, Fabricante de procesador: Intel, Tipo de procesador: Core i7, Generación del procesador: 8ª generación, Modelo del procesador: i7-8650U, Velocidad del procesador: 1.90 GHz, Núcleo del procesador: Quad-core (4 Cores), Memoria estándar: 16 GB, Tecnología de memoria: LPDDR3, Capacidad de la unidad de estado sólido: 512 GB, Tamaño de pantalla: 14\", Tipo de pantalla: LCD,\r\nTecnología de pantalla de visualización: Tecnología de conmutación en plano (IPS), Resolución de pantalla: 1920 x 1080, Pantalla táctil: Sí, Fabricante de controlador gráfico: Intel, Modelo de controlador gráfico: UHD Graphics 620, Tecnología de memoria gráfica: LPDDR3, Accesibilidad de memoria gráfica: Compartida, LAN inalámbrica: Sí, LAN inalámbrica estándar: IEEE 802.11a/b/g/n/ac, Tecnología Ethernet: Ethernet, Bluetooth: Sí,\r\nCámara frontal/cámara web: Sí, lector de huellas dactilares: Sí, HDMI: Sí, Número total de puertos USB: 4, Número de puertos USB 3.0: 2, USB Tipo-C: Sí, USB Tipo C Detalle: 2 USB Tipo C, Red (RJ-45): Sí, Plataforma del sistema operativo: Windows, Sistema operativo: Windows 10 Pro (Inglés), Arquitectura del sistema operativo: 64-bit,', '../productos/c5/c40.jpg', 930.00, 1, 5, 11),
(41, 'Laptop HP 15 2022, pantalla LED HD de 15.6', 'Almacenamiento y RAM: la RAM es de 16 GB de RAM de alto ancho de banda para ejecutar sin problemas múltiples aplicaciones y pestañas del navegador a la vez; el disco duro es una unidad de estado sólido de 1 TB para permitir un arranque y transferencia de datos más rápidos.\r\nProcesador: Intel Celeron N4020 (hasta frecuencia de ráfaga de 2.8 GHz, caché L2 de 4 MB, 2 núcleos)\r\nPantalla: HD de 15.6 pulgadas (1366 x 768), micro-borde, BrightView, 220 nits, 45% NTSC\r\nSistema operativo: Windows 11 Home, 64 bits, inglés', '../productos/c5/c41.jpg', 364.00, 4, 5, 11);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`cod_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cod_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_marca` (`id_marca`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
