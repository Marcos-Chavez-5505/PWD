-- phpMyAdmin SQL Dump
-- version 2.8.1
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 17-08-2012 a las 00:43:05
-- Versión del servidor: 5.0.21
-- Versión de PHP: 5.1.4
-- 
-- Base de datos: `infoautos`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `auto`
-- 

-- CREATE TABLE `auto` (
--   `Patente` varchar(10) character set utf8 collate utf8_unicode_ci NOT NULL,
--   `Marca` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
--   `Modelo` int(11) NOT NULL,
--   `DniDuenio` varchar(10) character set utf8 collate utf8_unicode_ci NOT NULL,
--   PRIMARY KEY  (`Patente`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -- 
-- -- Volcar la base de datos para la tabla `auto`
-- -- 

-- INSERT INTO `auto` (`Patente`, `Marca`, `Modelo`, `DniDuenio`) VALUES 
-- ('ADC 152', 'Fiat Uno', 98, '28326986'),
-- ('POL 968', 'Renault 12', 77, '28326986'),
-- ('KJU 952', 'Ford Fiesta', 2006, '25963874'),
-- ('UYH 985', 'Fiat Palio', 95, '30875962'),
-- ('LKI 865', 'Fiat Siena', 90, '28326986'),
-- ('SDC 965', 'Peugeot 205', 88, '30875962');

-- -- --------------------------------------------------------

-- -- 
-- -- Estructura de tabla para la tabla `persona`
-- -- 

-- CREATE TABLE `persona` (
--   `NroDni` varchar(10) character set utf8 collate utf8_unicode_ci NOT NULL,
--   `Apellido` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
--   `Nombre` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
--   `fechaNac` date NOT NULL default '0000-00-00',
--   `Telefono` varchar(20) character set utf8 collate utf8_unicode_ci NOT NULL,
--   `Domicilio` varchar(200) character set utf8 collate utf8_unicode_ci NOT NULL,
--   PRIMARY KEY  (`NroDni`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -- 
-- -- Volcar la base de datos para la tabla `persona`
-- -- 

-- INSERT INTO `persona` (`NroDni`, `Apellido`, `Nombre`, `fechaNac`, `Telefono`, `Domicilio`) VALUES 
-- ('28326986', 'Moya', 'Manuel', '1981-12-03', '299-9632587', 'Linares 44 piso 2 dpto 5'),
-- ('25963874', 'Farias', 'Marta', '1975-06-21', '299-1559354', 'Roca 568'),
-- ('30875962', 'Lopez', 'Eduardo', '1983-10-03', '299-6587741', 'Santa Fe 98'),
-- ('22985265', 'Ramirez', 'Claudia', '1971-05-16', '299-9854155', 'Sarmiento 55');


-- ALTER TABLE `auto` ADD KEY `idTipoVehiculo` (`DniDuenio`);

-- ALTER TABLE `auto`
-- ADD CONSTRAINT `auto_ibfk_1` FOREIGN KEY (`DniDuenio`) REFERENCES `persona` (`NroDni`);



    -- Tabla "corregida"
    SET FOREIGN_KEY_CHECKS = 0;

    DROP TABLE IF EXISTS `auto`;
    DROP TABLE IF EXISTS `persona`;

    SET FOREIGN_KEY_CHECKS = 1;

    CREATE TABLE `persona` (
    `NroDni` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
    `Apellido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    `Nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    `fechaNac` DATE DEFAULT NULL,
    `Telefono` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
    `Domicilio` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
    `estadoPersona` TINYINT(1) NOT NULL DEFAULT 1,
    PRIMARY KEY (`NroDni`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

    INSERT INTO `persona` (`NroDni`, `Apellido`, `Nombre`, `fechaNac`, `Telefono`, `Domicilio`, `estadoPersona`) VALUES
    ('28326986', 'Moya', 'Manuel', '1981-12-03', '299-9632587', 'Linares 44 piso 2 dpto 5', 1),
    ('25963874', 'Farias', 'Marta', '1975-06-21', '299-1559354', 'Roca 568', 1),
    ('30875962', 'Lopez', 'Eduardo', '1983-10-03', '299-6587741', 'Santa Fe 98', 1),
    ('22985265', 'Ramirez', 'Claudia', '1971-05-16', '299-9854155', 'Sarmiento 55', 1);

    CREATE TABLE `auto` (
    `Patente` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
    `Marca` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    `Modelo` int(11) NOT NULL,
    `DniDuenio` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`Patente`),
    KEY `idx_dni_duenio` (`DniDuenio`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


    INSERT INTO `auto` (`Patente`, `Marca`, `Modelo`, `DniDuenio`) VALUES 
    ('ADC 152', 'Fiat Uno', 98, '28326986'),
    ('POL 968', 'Renault 12', 77, '28326986'),
    ('KJU 952', 'Ford Fiesta', 2006, '25963874'),
    ('UYH 985', 'Fiat Palio', 95, '30875962'),
    ('LKI 865', 'Fiat Siena', 90, '28326986'),
    ('SDC 965', 'Peugeot 205', 88, '30875962');

    ALTER TABLE `auto`
    ADD CONSTRAINT `auto_ibfk_1` FOREIGN KEY (`DniDuenio`) REFERENCES `persona` (`NroDni`)
    ON DELETE RESTRICT ON UPDATE CASCADE;
