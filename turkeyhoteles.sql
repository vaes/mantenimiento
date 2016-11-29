-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-08-2016 a las 05:22:05
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `turkeyhoteles`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `disponibles` (`fInicio` VARCHAR(45), `fFin` VARCHAR(45), `idHotel` INT)  BEGIN

select Ha.id_habitacion, (ha.cantidad - count(*)) as disponibles from habitaciones Ha inner join reservaciones R on Ha.id_habitacion=R.id_habitacion where Ha.id_hotel = idHotel and
(R.fecha_inicio between STR_TO_DATE(fInicio, "%m/%d/%Y") and STR_TO_DATE(fFin, "%m/%d/%Y") or 
R.fecha_salida between STR_TO_DATE(fInicio, "%m/%d/%Y") and STR_TO_DATE(fFin, "%m/%d/%Y") or
STR_TO_DATE(fInicio, "%m/%d/%Y") between R.fecha_inicio and R.fecha_salida) group by Ha.id_habitacion;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `id_habitacion` int(11) NOT NULL,
  `tipo_h` varchar(100) COLLATE utf8_bin NOT NULL,
  `capacidad` varchar(100) COLLATE utf8_bin NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `servicios` text COLLATE utf8_bin,
  `equipo` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`id_habitacion`, `tipo_h`, `capacidad`, `precio`, `cantidad`, `id_hotel`, `servicios`, `equipo`) VALUES
(1, 'Hab. individual', 'Máx. personas: 1', '841.00', 1, 1, 'Habitación aire acondicionado, TV por cable, 1 cama doble, conexión Wi-Fi gratuita, escritorio y baño privado.', 'Balcón, TV, Teléfono, Canales por cable, Aire acondicionado, Escritorio, Bañera, Aseo, Baño, Bañera o ducha.'),
(2, 'Hab. doble', 'Máx. personas: 2', '934.00', 6, 1, 'Habitación con aire acondicionado, 2 camas dobles, TV por cable, conexión Wi-Fi gratuita, escritorio y baño privado.', 'Balcón, TV, Teléfono, Canales por cable, Aire acondicionado, Escritorio, Bañera, Aseo, Baño, Bañera o ducha.'),
(3, 'Hab. triple', 'Máx. personas: 3', '1123.00', 8, 1, 'Habitación con aire acondicionado, 2 camas dobles, TV por cable, conexión Wi-Fi gratuita, escritorio y baño privado.', 'Balcón, TV, Teléfono, Canales por cable, Aire acondicionado, Escritorio, Bañera, Aseo, Baño, Bañera o ducha.'),
(4, 'Hab. cuádruple', 'Máx. personas: 4', '1312.00', 4, 1, 'Habitación con aire acondicionado, 2 camas dobles, TV por cable, conexión Wi-Fi gratuita, escritorio y baño privado.', 'Balcón, TV, Teléfono, Canales por cable, Aire acondicionado, Escritorio, Bañera, Aseo, Baño, Bañera o ducha.'),
(5, 'Hab. doble executive', 'Máx. adultos: 2  Máx. niños: 2', '817.00', 6, 2, 'Habitación con una decoración sencilla, aire acondicionado, conexión Wi-Fi gratuita, TV por cable, escritorio y baño privado.', 'Caja fuerte, Aire acondicionado, Escritorio, Suelo de baldosa/mármol, Mosquitera, Armario, Ducha, Artículos de aseo gratuitos, Aseo, Baño, TV, Teléfono, Canales por cable.'),
(6, 'Hab. triple executive', 'Máx. adultos: 3  Máx. niños: 1', '930.00', 7, 2, 'Habitación con una decoración sencilla, aire acondicionado, conexión Wi-Fi gratuita, TV por cable, escritorio y baño privado.', 'Caja fuerte, Aire acondicionado, Escritorio, Suelo de baldosa/mármol, Mosquitera, Armario, Ducha, Artículos de aseo gratuitos, Aseo, Baño, TV, Teléfono, Canales por cable.'),
(7, 'Hab. cuádruple executive', 'Máx. personas: 4', '1044.00', 8, 2, 'Habitación con una decoración sencilla, aire acondicionado, conexión Wi-Fi gratuita, TV por cable, escritorio y baño privado.', 'Caja fuerte, Aire acondicionado, Escritorio, Suelo de baldosa/mármol, Mosquitera, Armario, Ducha, Artículos de aseo gratuitos, Aseo, Baño, TV, Teléfono, Canales por cable.'),
(8, 'Hab. doble estandar', 'Máx. personas: 2', '1320.00', 6, 3, 'Esta habitación dispone 2 camas individuales, aire acondicionado, TV por cable y conexión Wi-Fi gratuita.', 'Balcón, Teléfono, Canales por cable, Aire acondicionado, Zona de estar, Secador de pelo, Artículos de aseo gratuitos, Aseo, Baño, Servicio de despertador/Reloj despertador, Servicio de despertador.'),
(9, 'Hab. doble executive', 'Máx. personas: 2', '1508.00', 5, 3, 'Esta habitación dispone 2 camas individuales, aire acondicionado, TV por cable y conexión Wi-Fi gratuita.', 'Teléfono, Canales por cable, Aire acondicionado, Zona de estar, Ducha, Secador de pelo, Artículos de aseo gratuitos, Aseo, Baño, Servicio de despertador/Reloj despertador, Servicio de despertador.'),
(10, 'Hab. Doble', 'Máx. adultos: 2  Máx. niños: 2', '1775.00', 6, 4, 'Habitación con aire acondicionado, conexión WiFi gratuita, TV de pantalla plana vía satélite, y una zona de trabajo amplia con escritorio y teléfono. También cuenta con baño privado y secador de pelo.', ' Vistas a la piscina, Vistas a un lugar de interés, Teléfono, Radio , Canales vía satélite, Canales por cable, TV de pantalla plana, Aire acondicionado, Plancha para ropa, Escritorio, Equipo de planchado, etc.'),
(11, 'Hab. con cama extragrande', 'Máx. adultos: 2', '1775.00', 8, 4, 'Habitación con aire acondicionado, conexión WiFi gratuita, TV de pantalla plana vía satélite, y una zona de trabajo amplia con escritorio y teléfono. También cuenta con baño privado y secador de pelo.', ' Vistas a la piscina, Vistas a un lugar de interés, Teléfono, Radio , Canales vía satélite, Canales por cable, TV de pantalla plana, Aire acondicionado, Plancha para ropa, Escritorio, Equipo de planchado, etc.'),
(12, 'Hab. Deluxe', 'Máx. personas: 2', '2432.00', 7, 5, 'Esta habitación cuenta con aire acondicionado, TV de pantalla plana y conexión para iPod.', 'Vistas, Teléfono, TV de pantalla plana, Soporte para iPod, Caja fuerte, Aire acondicionado, Plancha para ropa, Escritorio, Equipo de planchado, Suelo de moqueta, Habitaciones comunicadas disponibles, etc.'),
(13, 'Hab. Premium', 'Máx. personas: 2', '2810.00', 7, 5, 'Esta habitación cuenta con aire acondicionado, TV de pantalla plana y conexión para iPod.', 'Vistas, Teléfono, TV de pantalla plana, Soporte para iPod, Caja fuerte, Aire acondicionado, Plancha para ropa, Escritorio, Equipo de planchado, Suelo de moqueta, Habitaciones comunicadas disponibles, etc.'),
(14, 'Hab. Doble con vistas', 'Máx. personas: 2', '2055.00', 6, 6, 'Esta amplia habitación tiene vistas a la ciudad.', 'Vistas, Canales de pago, TV, Teléfono, Radio , Canales por cable, TV de pantalla plana, Caja fuerte, Aire acondicionado, Plancha para ropa, Escritorio, Equipo de planchado, Suelo de moqueta, Ducha, Secador de pelo, Aseo, Baño, Bañera o ducha.'),
(15, 'Hab. Doble - cama grande', 'Máx. personas: 2', '2147.00', 5, 6, 'ncluye acceso al salón club con desayuno diario americano.', 'Vistas, Canales de pago, Teléfono, Radio , Canales por cable, TV de pantalla plana, Caja fuerte, Aire acondicionado, Plancha para ropa, Escritorio, Equipo de planchado, Suelo de moqueta, Secador de pelo, Artículos de aseo gratuitos.'),
(16, 'Hab. Suite Junior', 'Máx. personas: 2', '2450.00', 6, 6, 'Estas suites son amplias, están situadas en las plantas superiores del hotel y ofrecen vistas a la ciudad.', 'Vistas, Canales de pago, Teléfono, Radio , Canales por cable, TV de pantalla plana, Caja fuerte, Aire acondicionado, Plancha para ropa, Escritorio, Equipo de planchado,Zona de estar, Suelo de moqueta.'),
(17, 'Hab. con cama extragrande', 'Máx. personas: 2', '1643.00', 7, 7, 'Habitación moderna con caja fuerte, utensilios de planchado y TV de pantalla plana por cable.', 'Caja fuerte, Plancha para ropa, Equipo de planchado, Armario, Ducha, Artículos de aseo gratuitos, Aseo, Baño, Teléfono, Canales por cable, TV de pantalla plana, Toallas, Ropa de camas.'),
(18, 'Hab. Doble', 'Máx. adultos: 2  Máx. niños: 2', '1690.00', 6, 7, 'Habitación moderna con caja fuerte, utensilios de planchado y TV de pantalla plana por cable.', 'Caja fuerte, Plancha para ropa, Equipo de planchado, Armario, Ducha, Artículos de aseo gratuitos, Aseo, Baño, Teléfono, Canales por cable, TV de pantalla plana, Toallas, Ropa de camas.'),
(19, 'Hab. Suite Junior', 'Máx. personas: 3', '4222.00', 10, 8, 'Esta bonita habitación tiene el suelo de madera y cuenta con conexión Wi-Fi gratuita, soporte para iPod y TV de pantalla plana con canales por cable.', 'Balcón, Patio, Vistas a la ciudad, Teléfono, Radio , Reproductor de CD, Canales vía satélite, Canales por cable, TV de pantalla plana, Soporte para iPod, Caja fuerte, Aire acondicionado.'),
(20, 'Hab. Suite Principal', 'Máx. personas: 2', '4999.00', 7, 8, 'Esta bonita habitación tiene el suelo de madera y cuenta con conexión Wi-Fi gratuita, soporte para iPod.', 'Balcón, Patio, Vistas a la ciudad, Teléfono, Radio , Reproductor de CD, Canales vía satélite, Canales por cable, TV de pantalla plana, Soporte para iPod.'),
(21, 'Hab. Doble Estandar', 'Máx. personas: 2', '1674.00', 8, 9, 'Esta habitación doble cuenta con TV por cable, aire acondicionado y entrada privada.', 'Aire acondicionado, Vestidor, Entrada privada, Insonorización, Suelo de madera/parquet, Bañera, Secador de pelo, Aseo, Baño, Teléfono, Radio , Canales por cable, Servicio de despertador/Reloj despertador, Servicio de despertador, Reloj despertador, Toallas/sábanas con suplemento'),
(22, 'Hab. Estándar', 'Máx. personas: 2', '1395.00', 8, 9, 'Esta habitación cuenta con aire acondicionado, balcón, patio y baño privado con bañera y secador de pelo.', 'Aire acondicionado, Camas extra largas (más de 2 metros), Entrada privada, Suelo de madera/parquet, Bañera, Secador de pelo, Aseo, Baño, Teléfono, Radio, Canales por cable, TV de pantalla planao'),
(23, 'Hab. Suite Junior', 'Máx. personas: 2', '2639.00', 9, 9, 'Esta habitación amplia dispone de zona de estar con TV de pantalla plana.', 'Vistas, Teléfono, Radio , Canales por cable, TV de pantalla plana, Aire acondicionado, Camas extra largas (más de 2 metros).'),
(24, 'Hab. Estándar', 'Máx. personas: 2', '1806.00', 5, 10, 'Esta habitación doble con cama grande dispone de 1 cama doble extragrande.', 'Teléfono, Canales por cable, TV de pantalla plana, Escritorio, Ventilador, Chimenea, Ducha, Secador de pelo, Albornoz, Artículos de aseo gratuitos, Aseo, Baño, Servicio de despertador.'),
(25, 'Hab. Suite Junior', 'Máx. personas: 2', '2356.00', 7, 10, 'Esta suite cuenta con zona de estar, albornoz y vistas.', 'Patio, Vistas, Teléfono, Canales por cable, TV de pantalla plana, Caja fuerte, Escritorio.'),
(26, 'Hab. Doble Estandar', 'Máx. personas: 3', '1806.00', 7, 10, 'Esta habitación doble con cama grande dispone de 1 cama doble extragrande.', 'Patio, Teléfono, Canales por cable, TV de pantalla plana, Escritorio, Ventilador, Chimenea, Ducha, Secador de pelo, Albornoz, Artículos de aseo gratuitos, Aseo, Baño, Servicio de despertador'),
(27, 'Hab. Suit Deluxe', 'Máx. personas: 2', '3111.00', 8, 11, 'Esta habitación doble con cama grande dispone de 1 cama doble extragrande.', 'Balcón, Vistas, Vistas al mar, Vistas a la piscina, Vistas a la montaña, Terraza, TV, Canales vía satélite, TV de pantalla plana, Aire acondicionado, Plancha para ropa.'),
(28, 'Hab. Doble', 'Máx. personas: 2', '2884.00', 10, 11, 'Esta habitación doble ofrece vistas al mar y cuenta con aire acondicionado y minibar.', 'Balcón, Vistas, Vistas al mar, Vistas a la piscina, Vistas a la montaña, Terraza, Plancha para ropa, Zona de estar, Ventilador, Habitaciones comunicadas disponibles, Entrada privada, Armario, Secador de pelo, Albornoz, Artículos de aseo gratuitos, Baño, Frigorífico, Cafetera, Toallas/sábanas con suplemento, Toallas, Ropa de cama'),
(29, 'Hab. Suite Estandar', 'Máx. personas: 2', '4317.00', 8, 11, 'Esta suite cuenta con aire acondicionado, zona de comedor y utensilios de cocina.', 'Balcón, Vistas, Vistas al mar, Vistas a la montaña, Terraza, TV, Canales vía satélite.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoteles`
--

CREATE TABLE `hoteles` (
  `id_hotel` int(11) NOT NULL,
  `nombre_hotel` varchar(100) COLLATE utf8_bin NOT NULL,
  `estado` varchar(30) COLLATE utf8_bin NOT NULL,
  `calificacion` int(11) NOT NULL,
  `telefono_hotel` varchar(20) COLLATE utf8_bin NOT NULL,
  `direccion_hotel` varchar(120) COLLATE utf8_bin NOT NULL,
  `descripcion` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `hoteles`
--

INSERT INTO `hoteles` (`id_hotel`, `nombre_hotel`, `estado`, `calificacion`, `telefono_hotel`, `direccion_hotel`, `descripcion`) VALUES
(1, 'Hotel mision colima', 'colima', 4, '312-32-46-809', 'Boulevard Camino Real #999 Col. El Diezmo', 'El Mision Colima se encuentra a menos de 5 km del centro de Colima, en una zona tranquila y acogedora.Todas las habitaciones están amuebladas con gusto y disfrutan de vistas a los jardines y el famoso volcán Colima.'),
(2, 'Hotel Los Candiles', 'colima', 4, '312-33-66-719', 'Boulevard Camino Real #399, Colima', 'El Hotel Los Candiles, situado a 10 minutos en coche del centro de Colima y a 1 calle de la Universidad, cuenta con una piscina al aire libre, un restaurante y conexión Wi-Fi gratuita.'),
(3, 'María Isabel Hotel', 'colima', 5, '312-01-26-811', 'Boulevard Camino Real #351, Colima', 'Los huéspedes encontrarán varias tiendas en el hotel y podrán relajarse en el jardín tropical. También hay un parque infantil.'),
(4, 'Wyndham Garden Colima', 'colima', 5, '312-12-83-771', '3er anillo Periferico #1100 Camino Real', 'Este hotel moderno se encuentra a 10 minutos en coche del centro de la ciudad de Colima. Ofrece una piscina al aire libre, un gimnasio y una sauna.'),
(5, 'Westin Guadalajara', 'jalisco', 5, '333-65-82-623', ' Avenida de las Rosas #2911 , 44530 Guadalajara, México ', 'El Westin Guadalajara se encuentra en el moderno distrito de Residencias del Bosque, frente al centro de convenciones de Expo Guadalajara. Ofrece habitaciones modernas con aire acondicionado y TV de pantalla planao'),
(6, 'Hilton Guadalajara', 'jalisco', 5, '333-44-23-123', 'Avenida de la Rosas 2933, 44530 Guadalajara, México', 'se encuentra en el centro del complejo empresarial de Guadalajara, enfrente del World Trade Center y del centro de convenciones Expo, y ofrece numerosos servicios e instalaciones excelentes, que incluyen locales de restauración gourmet.'),
(7, 'Aloft Guadalajara', 'jalisco', 4, '333-65-76-958', 'Avenida de las Americas 1528, 44637 Guadalajara, México', 'El Aloft Guadalajara alberga un restaurante y se encuentra en el distrito financiero de Providencia, en la ciudad de Guadalajara. Hay WiFi gratuita.'),
(8, 'Hotel Boutique Casa Grande', 'michoacán', 5, '433-68-12-542', ' Portal Matamoros Numero 98, 58000 Morelia, México', 'Tiene una terraza en la azotea con vistas espectaculares a la catedral de Morelia y la plaza de Armas. Sus suites disponen de conexión Wi-Fi gratuita y TV de pantalla plana por cable.'),
(9, 'Virrey De Mendoza', 'michoacán', 5, '433-34-13-857', 'Avenida Madero Poniente, 310, 58000 Morelia, México', 'Este histórico establecimiento está situado a 100 metros de la catedral de Morelia y cuenta con habitaciones elegantes de estilo colonial equipadas con conexión Wi-Fi gratuita.'),
(10, 'Villa Montaña Hotel', 'michoacán', 5, '433-86-48-476', 'Patzimba 201 Colonia Vista Bella, 58090 Morelia, México.', 'El Villa Montaña se encuentra en la cima de una colina y goza de vistas a Morelia, declarada Patrimonio de la Humanidad por la UNESCO.'),
(11, 'Villa Bella Bed & Breakfast Inn', 'nayarit', 5, '437-96-74-864', 'Ramal Carretera Federal 200 Km 19, 63734 Punta Mita, México', 'está situado en la playa de Punta de Mita, en la bahía de Banderas, a 45 minutos en coche del aeropuerto internacional de Puerto Vallarta y ofrece 3 piscinas.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huespedes`
--

CREATE TABLE `huespedes` (
  `id_huesped` int(11) NOT NULL,
  `nombre_huesped` varchar(50) COLLATE utf8_bin NOT NULL,
  `mail` varchar(100) COLLATE utf8_bin NOT NULL,
  `especial` text COLLATE utf8_bin,
  `codigo_r` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `huespedes`
--

INSERT INTO `huespedes` (`id_huesped`, `nombre_huesped`, `mail`, `especial`, `codigo_r`) VALUES
(1, 'Alex Rosas', 'ekix003@hotmail.com', '', 'SDSLHXL'),
(9, 'Victor ', '', '', 'PGXURFC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--

CREATE TABLE `reservaciones` (
  `id_reserva` int(11) NOT NULL,
  `id_huesped` int(11) NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `noches` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `reservaciones`
--

INSERT INTO `reservaciones` (`id_reserva`, `id_huesped`, `id_habitacion`, `id_hotel`, `fecha_inicio`, `fecha_salida`, `noches`) VALUES
(1, 1, 2, 1, '2016-06-17', '2016-06-18', 1),
(9, 9, 1, 1, '2016-06-20', '2016-06-22', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_generales`
--

CREATE TABLE `servicios_generales` (
  `id_servicio` int(11) NOT NULL,
  `nombre_servicio` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `servicios_generales`
--

INSERT INTO `servicios_generales` (`id_servicio`, `nombre_servicio`) VALUES
(1, 'Servicio a cuarto'),
(2, 'Telecable'),
(3, 'Wi-Fi'),
(4, 'Cafeteria'),
(5, 'Lavanderia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_hoteles`
--

CREATE TABLE `servicio_hoteles` (
  `id_servicio_hotel` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `servicio_hoteles`
--

INSERT INTO `servicio_hoteles` (`id_servicio_hotel`, `id_hotel`, `id_servicio`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 2),
(6, 2, 3),
(7, 2, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`id_habitacion`);

--
-- Indices de la tabla `hoteles`
--
ALTER TABLE `hoteles`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indices de la tabla `huespedes`
--
ALTER TABLE `huespedes`
  ADD PRIMARY KEY (`id_huesped`);

--
-- Indices de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD PRIMARY KEY (`id_reserva`);

--
-- Indices de la tabla `servicios_generales`
--
ALTER TABLE `servicios_generales`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `servicio_hoteles`
--
ALTER TABLE `servicio_hoteles`
  ADD PRIMARY KEY (`id_servicio_hotel`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `id_habitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `hoteles`
--
ALTER TABLE `hoteles`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `huespedes`
--
ALTER TABLE `huespedes`
  MODIFY `id_huesped` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `servicios_generales`
--
ALTER TABLE `servicios_generales`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `servicio_hoteles`
--
ALTER TABLE `servicio_hoteles`
  MODIFY `id_servicio_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
