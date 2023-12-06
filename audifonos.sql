-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2023 a las 02:00:51
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `audifonos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(10) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `calificacion` int(10) NOT NULL,
  `comentario` varchar(1550) NOT NULL,
  `producto` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `nombre`, `titulo`, `calificacion`, `comentario`, `producto`) VALUES
(1, 'Daniel', 'Excelente calidad, pero excesivo precio', 4, 'El sonido de los apple airpods MAX es inigualable, se nota la mano de apple, sin embargo el precio es demasiado elevado para unos audifonos, a menos de que seas amante de apple compralos, sino busca una opcion mas economica hasta de la misma marca', 'Apple Airpods MAX'),
(2, 'Sofia', 'Mala calidad no compren esos audifonos', 2, 'Me sorprende que mis audifonos no hayan durado ni 3 meses, con lo que cuesten fue una estafa, aun estoy viendo lo de la garantia, no se si fue mala suerte mia o realmente son malos audifonos', 'Apple Airpods MAX'),
(3, 'Chuy', 'Excelente calidad, precio-producto', 5, 'El audio es impresionante, hasta parece audio espacial, ademas del precio mega accesible, los rec', 'JBL Tune 510BT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `descripcion` varchar(1500) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `precio` int(10) NOT NULL,
  `conectividad` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `descuento` varchar(10) NOT NULL,
  `montodesc` int(10) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `imagen2` varchar(255) NOT NULL,
  `imagen3` varchar(255) NOT NULL,
  `imagen4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `categoria`, `marca`, `descripcion`, `cantidad`, `precio`, `conectividad`, `color`, `descuento`, `montodesc`, `imagen`, `imagen2`, `imagen3`, `imagen4`) VALUES
(1, 'Apple Airpods Tercera Generacion', 'earbuds', 'Apple', 'Los AirPods no pesan nada y tienen un ajuste anatómico. Quedan en el ángulo perfecto para darte mayor comodidad y llevar el sonido directo a tus oídos. Además, son 33% más compactos que los AirPods (segunda generación) y tienen un sensor de fuerza que te permite controlar la música y las llamadas con gran facilidad', 150, 3699, 'Inalambrica', 'Blancos', 'si', 499, 'uploads/Apple AirPods (Tercera generación) con Estuche de Carga MagSafe.jpg', 'uploads/Apple AirPods (Tercera generación) con Estuche de Carga MagSafe.1.jpg', 'uploads/Apple AirPods (Tercera generación) con Estuche de Carga MagSafe.2.jpg', 'uploads/Apple AirPods (Tercera generación) con Estuche de Carga MagSafe.3.jpg'),
(2, 'JBL Auriculares In-Ear', 'earbuds', 'JBL', 'Los auriculares JBL In-Ear ofrecen una experiencia auditiva envolvente en un diseño compacto y cómodo. Diseñados para ajustarse perfectamente en el canal auditivo, estos auriculares in-ear proporcionan un sonido claro y nítido con un énfasis en los bajos, que es característico de la calidad de audio que se espera de la marca JBL. Con su construcción ergonómica, ofrecen comodidad durante periodos prolongados de uso y son ideales para actividades en movimiento. Algunos modelos pueden incluir características adicionales, como controles integrados para gestionar la reproducción de música y llamadas, así como micrófonos incorporados para una comunicación manos libres.', 200, 1349, 'Inalambrica', 'Blancos', 'no', 0, 'uploads/JBL - Auriculares In-Ear True Wireless Vibe 200TWS.jpg', 'uploads/JBL - Auriculares In-Ear True Wireless Vibe 200TWS.1.jpg', 'uploads/JBL - Auriculares In-Ear True Wireless Vibe 200TWS.2.jpg', 'uploads/JBL - Auriculares In-Ear True Wireless Vibe 200TWS.3.jpg'),
(3, 'Sony MDR-ZX310-R', 'diadema', 'Sony', 'Los auriculares Sony MDR-ZX310-R ofrecen una experiencia auditiva envolvente con un diseño elegante y funcional. Este modelo supraaural proporciona una calidad de sonido equilibrada, con énfasis en los tonos bajos, lo que brinda una reproducción de audio rica y satisfactoria. Su diseño plegable y liviano los hace ideales para llevar en movimiento, facilitando su transporte y almacenamiento cuando no están en uso. Con almohadillas acolchadas en las orejeras, los MDR-ZX310-R garantizan comodidad durante sesiones auditivas prolongadas. Su diadema ajustable permite un ajuste personalizado para diferentes tamaños de cabeza. Estos auriculares son compatibles con una variedad de dispositivos, como teléfonos inteligentes, reproductores de música y computadoras portátiles, gracias a su conector estándar de 3.5 mm.', 50, 999, 'Cable', 'Rojos', 'no', 0, 'uploads/Sony MDR-ZX310-R Audífonos de Diadema Plegables con microfono.jpg', 'uploads/Sony MDR-ZX310-R Audífonos de Diadema Plegables con microfono.1.jpg', 'uploads/Sony MDR-ZX310-R Audífonos de Diadema Plegables con microfono.2.jpg', 'uploads/Sony MDR-ZX310-R Audífonos de Diadema Plegables con microfono.3.jpg'),
(4, 'JBL Tune 510BT', 'diadema', 'JBL', 'Los auriculares JBL Tune 510BT son una opción moderna y versátil para aquellos que buscan una experiencia auditiva inalámbrica. Con conectividad Bluetooth, estos auriculares ofrecen la libertad de moverse sin restricciones, conectándose fácilmente a dispositivos como teléfonos inteligentes, tabletas y computadoras. Su diseño supraaural proporciona una experiencia cómoda, con almohadillas suaves que se ajustan sobre las orejas y una diadema ajustable para adaptarse a diferentes tamaños de cabeza. Uno de los puntos destacados de los JBL Tune 510BT es su calidad de sonido equilibrada y potente. Ofrecen bajos profundos y claridad en las frecuencias medias y altas, proporcionando una reproducción de audio envolvente. Además, estos auriculares cuentan con controles integrados en la orejera, lo que permite gestionar la reproducción de música, ajustar el volumen y responder llamadas de forma conveniente.', 45, 1299, 'Inalambrica', 'Rosas', 'si', 399, 'uploads/JBL Tune 510BT.jpg', 'uploads/JBL Tune 510BT.1.jpg', 'uploads/JBL Tune 510BT.2.jpg', 'uploads/JBL Tune 510BT.3.jpg'),
(5, 'Sony WF-C500', 'earbuds', 'Sony', 'Los auriculares inalámbricos Sony WF-C500 ofrecen una experiencia auditiva compacta y conveniente en un diseño ergonómico y sin cables. Diseñados para proporcionar un ajuste seguro y cómodo en el oído, estos auriculares son ideales para aquellos que buscan movilidad y libertad durante sus actividades diarias. Con tecnología Bluetooth, los Sony WF-C500 se conectan fácilmente a dispositivos compatibles, como teléfonos inteligentes, tabletas y otros dispositivos con capacidad Bluetooth. Esta conectividad inalámbrica permite una experiencia sin enredos y sin restricciones, lo que facilita el uso en movimiento. Estos auriculares ofrecen una calidad de sonido equilibrada, con énfasis en los detalles y una reproducción clara de las frecuencias. Además, cuentan con controles táctiles intuitivos en cada auricular, lo que facilita la gestión de la reproducción de música, la respuesta a llamadas y la navegación entre pistas de manera sencilla.', 80, 2499, 'Inalambrica', 'Negros', 'si', 299, 'uploads/Sony WF-C500 - Auriculares inámbricos Bluetooth con micrófono y Resistencia al Agua IPX4, Color Negro.jpg', 'uploads/Sony WF-C500 - Auriculares inámbricos Bluetooth con micrófono y Resistencia al Agua IPX4, Color Negro.1.jpg', 'uploads/Sony WF-C500 - Auriculares inámbricos Bluetooth con micrófono y Resistencia al Agua IPX4, Color Negro.2.jpg', 'uploads/Sony WF-C500 - Auriculares inámbricos Bluetooth con micrófono y Resistencia al Agua IPX4, Color Negro.3.jpg'),
(6, 'Apple Airpods MAX', 'diadema', 'Apple', 'Los Apple AirPods Max son auriculares over-ear diseñados para proporcionar una experiencia de audio premium con la calidad de sonido característica de la marca. Estos auriculares inalámbricos ofrecen un diseño elegante y materiales de alta calidad, combinados con la tecnología avanzada de Apple. Con una construcción de acero inoxidable y almohadillas de espuma viscoelástica, los AirPods Max ofrecen comodidad y durabilidad. El diseño over-ear proporciona un ajuste envolvente que ayuda a bloquear el ruido ambiental, permitiendo a los usuarios sumergirse completamente en su música o contenido. La tecnología de cancelación activa de ruido (ANC) de Apple está integrada en los AirPods Max, lo que permite eliminar de manera efectiva los sonidos no deseados del entorno. Además, estos auriculares cuentan con sensores que detectan cuándo están colocados en la cabeza y pausan automáticamente la reproducción cuando se retiran. ', 120, 11999, 'Inalambrica', 'Plata', 'no', 0, 'uploads/Apple AirPods MAX - Color Plata.jpg', 'uploads/Apple AirPods MAX - Color Plata.1.jpg', 'uploads/Apple AirPods MAX - Color Plata.2.jpg', 'uploads/Apple AirPods MAX - Color Plata.3.jpg'),
(7, 'Huawei Freebuds 5i', 'earbuds', 'Huawei', 'Los Huawei FreeBuds 5i son auriculares inalámbricos que ofrecen una experiencia auditiva cómoda y conveniente. Diseñados por Huawei, estos auriculares proporcionan una conectividad sin cables para una experiencia de escucha inalámbrica. Estos auriculares cuentan con un diseño ergonómico que se adapta cómodamente al oído, proporcionando un ajuste seguro y cómodo durante períodos prolongados de uso. Además, su diseño compacto y liviano facilita su transporte y almacenamiento, convirtiéndolos en una opción práctica para el uso diario. La conectividad Bluetooth permite emparejar fácilmente los FreeBuds 4i con dispositivos compatibles, como teléfonos inteligentes, tabletas y otros dispositivos con capacidad Bluetooth. Esto ofrece la libertad de moverse sin restricciones, ya que no hay cables que limiten la movilidad del usuario.', 50, 1199, 'Inalambrica', 'Morados', 'no', 0, 'uploads/Huawei FreeBuds 5i.png', 'uploads/Huawei FreeBuds 5i.1.jpg', 'uploads/Huawei FreeBuds 5i.2.jpg', 'uploads/Huawei FreeBuds 5i.3.jpg'),
(8, 'Bose QuietComfort', 'diadema', 'Bose', 'La característica más destacada de estos auriculares es su capacidad para reducir significativamente el ruido ambiental. Esto es especialmente útil en entornos ruidosos, como aviones o espacios públicos, permitiendo a los usuarios sumergirse completamente en su música o contenido. Diseño cómodo: Los auriculares Bose suelen tener un diseño ergonómico y acolchado para ofrecer comodidad durante períodos de uso prolongado. Los materiales de alta calidad también contribuyen a la sensación premium. Calidad de sonido: Bose es conocido por proporcionar una calidad de sonido nítida y equilibrada', 90, 13999, 'Inalambrica', 'Crema', 'no', 0, 'uploads/Bose QuietComfort Ultra con Audio Espacial.jpg', 'uploads/Bose QuietComfort Ultra con Audio Espacial.1.jpg', 'uploads/Bose QuietComfort Ultra con Audio Espacial.2.jpg', 'uploads/Bose QuietComfort Ultra con Audio Espacial.3.jpg'),
(9, 'Sennheiser Cx', 'diadema', 'Sennheiser', 'Calidad de Sonido: Sennheiser es conocido por ofrecer una calidad de sonido de alta fidelidad. Los auriculares CX suelen proporcionar una reproducción precisa de graves, medios y agudos, brindando una experiencia auditiva equilibrada. Diseño Intrauditivo: Los auriculares CX son del tipo intrauditivo, lo que significa que se colocan directamente en el canal auditivo. Este diseño ayuda a aislar el sonido ambiental y mejora la calidad del audio al proporcionar un sellado más efectivo. Conectividad: Dependiendo del modelo, algunos auriculares CX pueden ser con cable (con conector de 3.5 mm) o inalámbricos, utilizando tecnologías como Bluetooth.', 30, 399, 'Cable', 'Negros', 'no', 0, 'uploads/Sennheiser Audífonos CX 80S.jpg', 'uploads/Sennheiser Audífonos CX 80S.1.jpg', 'uploads/Sennheiser Audífonos CX 80S.2.jpg', 'uploads/Sennheiser Audífonos CX 80S.3.jpg'),
(10, 'Sony WH-CH520', 'diadema', 'Sony', 'Los auriculares Sony WH-CH520 ofrecen una experiencia de audio inalámbrica de alta calidad con su diseño supraaural que descansa cómodamente sobre las orejas. Gracias a la conectividad Bluetooth, estos auriculares proporcionan la libertad de movimiento sin la molestia de cables. Con una batería de larga duración, permiten disfrutar de horas continuas de reproducción de música o llamadas telefónicas con manos libres. Equipados con controles integrados y micrófono, brindan facilidad de uso y una experiencia de usuario completa. Además, su diseño plegable los hace convenientes para almacenar y transportar. La calidad de sonido equilibrada, junto con las almohadillas acolchadas para mayor comodidad, hace que los Sony WH-CH520 sean una opción atractiva para aquellos que buscan un rendimiento de audio premium y una experiencia de uso sin complicaciones.', 70, 1599, 'Inalambrica', 'Negros', 'no', 0, 'uploads/Sony Audífonos inalámbricos on-Ear WH-CH520.jpg', 'uploads/Sony Audífonos inalámbricos on-Ear WH-CH520.1.jpg', 'uploads/Sony Audífonos inalámbricos on-Ear WH-CH520.2.jpg', 'uploads/Sony Audífonos inalámbricos on-Ear WH-CH520.3.jpg'),
(11, 'Apple Airpods Pro', 'earbuds', 'Apple', 'Los Apple AirPods Pro son auriculares inalámbricos de última generación que ofrecen una experiencia auditiva excepcional. Destacan por su tecnología de Cancelación Activa de Ruido (ANC), sumergiendo al usuario en un sonido envolvente al filtrar eficazmente los sonidos externos. Además, cuentan con el innovador Modo de Transparencia, permitiendo la entrada de sonidos ambientales cuando sea necesario. Su diseño intrauditivo proporciona un ajuste cómodo y personalizado, respaldado por diferentes tamaños de almohadillas. Estos auriculares incluyen características avanzadas, como audio espacial para una experiencia tridimensional, controles táctiles intuitivos, resistencia al agua y al sudor con certificación IPX4, y sensores que pausan la reproducción automáticamente al retirarlos. ', 65, 5499, 'Inalambrica', 'Blancos', 'no', 0, 'uploads/Apple AirPods Pro (Segunda generación).jpg', 'uploads/Apple AirPods Pro (Segunda generación).1.jpg', 'uploads/Apple AirPods Pro (Segunda generación).2.jpg', 'uploads/Apple AirPods Pro (Segunda generación).3.jpg'),
(12, 'Bose Noise', 'diadema', 'Bose', 'Los auriculares Bose Noise Cancelling Headphones ofrecen una experiencia auditiva excepcional gracias a su tecnología de cancelación de ruido líder en la industria. Diseñados para sumergir al usuario en un mundo de sonido de alta calidad, estos auriculares cuentan con características avanzadas para una experiencia premium. La cancelación de ruido adaptativa ajusta continuamente la intensidad de la cancelación de acuerdo con el entorno, brindando una inmersión total en la música, podcasts o llamadas. Con un diseño elegante y cómodo, los Bose Noise Cancelling Headphones son ideales para un uso prolongado. Los controles táctiles intuitivos permiten un manejo sencillo, mientras que la duración de la batería garantiza largas horas de disfrute sin interrupciones.', 40, 10099, 'Inalambrica', 'Plata', 'no', 0, 'uploads/Bose Noise Cancelling Headphones 700.jpg', 'uploads/Bose Noise Cancelling Headphones 700.1.jpg', 'uploads/Bose Noise Cancelling Headphones 700.2.jpg', 'uploads/Bose Noise Cancelling Headphones 700.3.png'),
(13, 'Huawei Freebuds SE', 'earbuds', 'Huawei', 'Los auriculares Huawei FreeBuds SE son una opción atractiva para aquellos que buscan una experiencia auditiva inalámbrica de calidad. Este modelo ofrece un diseño elegante y ergonómico que se adapta cómodamente al oído, proporcionando un ajuste seguro y estable. Con la tecnología de cancelación de ruido activa, los FreeBuds SE permiten sumergirse en la música o las llamadas sin distracciones externas. Estos auriculares inalámbricos de Huawei ofrecen un sonido claro y nítido, destacando los detalles de la música y brindando una experiencia envolvente. Su estuche de carga compacto permite una portabilidad conveniente y proporciona horas adicionales de reproducción. ', 90, 1499, 'Inalambrica', 'Verde aqua', 'no', 0, 'uploads/HUAWEI FreeBuds SE Auriculares.jpg', 'uploads/HUAWEI FreeBuds SE Auriculares.1.jpg', 'uploads/HUAWEI FreeBuds SE Auriculares.2.jpg', 'uploads/HUAWEI FreeBuds SE Auriculares.3.jpg'),
(14, 'Apple Airpods Carga', 'earbuds', 'Apple', 'Los Apple AirPods representan la vanguardia de la experiencia auditiva inalámbrica. Diseñados por Apple, estos auriculares inalámbricos se destacan por su calidad de sonido excepcional, comodidad y facilidad de uso. Gracias al chip H1 de Apple, los AirPods ofrecen una conexión inalámbrica rápida y estable con dispositivos Apple, permitiendo una experiencia de emparejamiento sencillo y transiciones fluidas entre dispositivos. Los AirPods cuentan con sensores táctiles que permiten controlar la reproducción de música, ajustar el volumen y activar Siri con gestos intuitivos. Además, la función de sensores de proximidad pausa automáticamente la reproducción cuando se retiran de los oídos y la reinicia cuando se vuelven a colocar.', 100, 2999, 'Inalambrica', 'Blancos', 'no', 0, 'uploads/Apple AirPods (Tercera generación) con Estuche de Carga MagSafe.jpg', 'uploads/Apple AirPods (Tercera generación) con Estuche de Carga MagSafe.1.jpg', 'uploads/Apple AirPods (Tercera generación) con Estuche de Carga MagSafe.2.jpg', 'uploads/Apple AirPods (Tercera generación) con Estuche de Carga MagSafe.3.jpg'),
(15, 'Sony WH1000XM4', 'diadema', 'Sony', 'Los auriculares Sony WH-1000XM4 son una obra maestra de la tecnología auditiva que combina un diseño elegante con un rendimiento excepcional. Reconocidos por su capacidad de cancelación de ruido líder en la industria, estos auriculares proporcionan una experiencia auditiva inmersiva al bloquear eficazmente los sonidos no deseados del entorno. Equipados con la tecnología de cancelación de ruido adaptativa, los WH-1000XM4 ajustan automáticamente la intensidad de la cancelación de ruido según el entorno, brindando una experiencia personalizada. La calidad de sonido es impresionante, con graves profundos y agudos claros que capturan cada detalle de la música.', 75, 1899, 'Inalambrica', 'Azul fuerte', 'no', 0, 'uploads/Sony WH1000XM4-L Audífonos de Diadema inalámbricos con Noise Cancelling-Azul.jpg', 'uploads/Sony WH1000XM4-L Audífonos de Diadema inalámbricos con Noise Cancelling-Azul.1.jpg', 'uploads/Sony WH1000XM4-L Audífonos de Diadema inalámbricos con Noise Cancelling-Azul.2.jpg', 'uploads/Sony WH1000XM4-L Audífonos de Diadema inalámbricos con Noise Cancelling-Azul.3.jpg'),
(16, 'Galaxy Buds 2 Pro', 'earbuds', 'Samsung', 'Los Samsung Galaxy Buds Pro 2 son auriculares inalámbricos que ofrecen una experiencia auditiva de alta calidad en un diseño compacto y ergonómico. Diseñados para adaptarse cómodamente al oído, estos auriculares son ligeros y vienen con almohadillas intercambiables para un ajuste personalizado. Destacan por proporcionar un sonido equilibrado con bajos profundos y agudos claros, brindando una experiencia auditiva inmersiva. Gracias a la conectividad Bluetooth, los Galaxy Buds se emparejan de manera rápida y sencilla con dispositivos compatibles, como teléfonos inteligentes y tabletas. Además, cuentan con controles táctiles intuitivos que permiten gestionar la reproducción de musica', 35, 2699, 'Inalambrica', 'Grafito', 'no', 0, 'uploads/SAMSUNG Galaxy Buds 2 Pro.jpg', 'uploads/SAMSUNG Galaxy Buds 2 Pro.1.jpg', 'uploads/SAMSUNG Galaxy Buds 2 Pro.2.jpg', 'uploads/SAMSUNG Galaxy Buds 2 Pro.3.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
