/*
 Navicat Premium Data Transfer

 Source Server         : residencial
 Source Server Type    : MySQL
 Source Server Version : 100422
 Source Host           : localhost:3306
 Source Schema         : residencial

 Target Server Type    : MySQL
 Target Server Version : 100422
 File Encoding         : 65001

 Date: 10/12/2021 17:03:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bitacora
-- ----------------------------
DROP TABLE IF EXISTS `bitacora`;
CREATE TABLE `bitacora`  (
  `id_bitacora` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la bitacora',
  `fecha` datetime NOT NULL COMMENT 'Fecha para registrar la accion del vecino',
  `Id_vecino` int NOT NULL COMMENT 'id del vecino que hace la accion',
  `accion` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Accion que hace el vecino en el sistema',
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Descripcion o detalle para llevar bitacora',
  PRIMARY KEY (`id_bitacora`) USING BTREE,
  INDEX `fk_bitacora_vecino`(`Id_vecino`) USING BTREE,
  CONSTRAINT `fk_bitacora_vecino` FOREIGN KEY (`Id_vecino`) REFERENCES `vecino` (`id_vecino`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Tabla del sistema en el cual se llevara registro de las acciones del vecino en el sistema como por ejemplo el login, cuando se registre un deposito, etc.' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of bitacora
-- ----------------------------
INSERT INTO `bitacora` VALUES (1, '2021-12-05 02:40:40', 1, 'LOGIN', 'El usuario ingreso al sistema');
INSERT INTO `bitacora` VALUES (2, '2021-12-05 02:58:34', 1, 'LOGIN', 'El usuario ingreso al sistema');
INSERT INTO `bitacora` VALUES (3, '2021-12-06 02:15:26', 7, 'LOGIN', 'El usuario ingreso al sistema');
INSERT INTO `bitacora` VALUES (4, '2021-12-06 03:37:58', 7, 'LOGIN', 'El usuario ingreso al sistema');
INSERT INTO `bitacora` VALUES (5, '2021-12-06 16:51:27', 7, 'LOGIN', 'El usuario ingreso al sistema');
INSERT INTO `bitacora` VALUES (6, '2021-12-06 18:15:33', 7, 'LOGIN', 'El usuario ingreso al sistema');
INSERT INTO `bitacora` VALUES (7, '2021-12-07 16:48:48', 7, 'LOGIN', 'El usuario ingreso al sistema');
INSERT INTO `bitacora` VALUES (8, '2021-12-10 17:05:29', 7, 'LOGIN', 'El usuario ingreso al sistema');
INSERT INTO `bitacora` VALUES (9, '2021-12-10 17:11:16', 7, 'LOGIN', 'El usuario ingreso al sistema');
INSERT INTO `bitacora` VALUES (10, '2021-12-10 19:30:15', 7, 'LOGIN', 'El usuario ingreso al sistema');

-- ----------------------------
-- Table structure for cargo_mensual
-- ----------------------------
DROP TABLE IF EXISTS `cargo_mensual`;
CREATE TABLE `cargo_mensual`  (
  `id_cargo` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador Cargo',
  `fecha_cargo` date NOT NULL COMMENT 'Fecha en que aplica el cargo',
  `monto_cargo` decimal(11, 2) NOT NULL COMMENT 'Monto del cargo',
  `descripcion_cargo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Descripcion del cargo aplicado',
  `estado_cargo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Campo para el estado del cargo',
  PRIMARY KEY (`id_cargo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = 'Tabla donde se detalla los cargos mensuales aplicados a todos los vecinos.' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of cargo_mensual
-- ----------------------------
INSERT INTO `cargo_mensual` VALUES (1, '2021-09-01', 2500.00, 'Mensualidad de septiempre', 'ACTIVO');
INSERT INTO `cargo_mensual` VALUES (2, '2021-10-01', 2000.00, 'Mensualidad de octubre', 'ACTIVO');
INSERT INTO `cargo_mensual` VALUES (3, '2021-12-31', 1500.55, 'Pago correspondiente a la mensualidad de diciembre ', 'ACTIVO');
INSERT INTO `cargo_mensual` VALUES (4, '2021-12-31', 520.00, 'Pago de agua', 'ACTIVO');
INSERT INTO `cargo_mensual` VALUES (5, '2021-12-31', 450.00, 'Pago de energia', 'ANULADO');
INSERT INTO `cargo_mensual` VALUES (6, '2021-12-31', 2000.00, 'Este es una cargo por mantenimiento del muro ', 'ACTIVO');
INSERT INTO `cargo_mensual` VALUES (7, '2021-12-08', 2500.00, 'Hola Mundo', 'ACTIVO');
INSERT INTO `cargo_mensual` VALUES (8, '2021-11-05', 5000.00, 'dsds', 'ACTIVO');
INSERT INTO `cargo_mensual` VALUES (9, '2021-10-05', 2500.00, 'ASSAA', 'ACTIVO');
INSERT INTO `cargo_mensual` VALUES (10, '2021-08-01', 1500.00, 'Mensualidad ', 'ACTIVO');
INSERT INTO `cargo_mensual` VALUES (11, '2021-07-01', 1780.00, 'Mensualidad', 'ACTIVO');

-- ----------------------------
-- Table structure for convenio
-- ----------------------------
DROP TABLE IF EXISTS `convenio`;
CREATE TABLE `convenio`  (
  `id_convenio` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador del convenio',
  `id_vecino` int NOT NULL COMMENT 'Identificador del vecino con el cual se realiza convenio',
  `fecha_inicio` date NOT NULL COMMENT 'Fecha de inicio de pago del convenio',
  `fecha_ultimo_pago` date NOT NULL COMMENT 'Fecha en que se realiza el ultimo pago',
  `monto_inicial` decimal(11, 2) NOT NULL COMMENT 'Monto adeudado del vecino',
  `prima` decimal(11, 2) NOT NULL COMMENT 'Prima pagada por el vecino',
  `descuento` decimal(11, 2) NOT NULL COMMENT 'Descuento aplicado al vecino sobre la deuda inicial',
  `saldo_restante` decimal(11, 2) NOT NULL COMMENT 'Saldo restante despues de pago de prima y descuento',
  `cuotas` int NOT NULL COMMENT 'Cuotas acordado para pago de saldo restante',
  `descripcion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Descripcion o detalles sobre el convenio',
  `estado` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Estado del convenio (Pendiente o Cancelado)',
  `id_cargo` int NOT NULL COMMENT 'Identificador del cargo del cual se hara el convenio',
  PRIMARY KEY (`id_convenio`, `id_vecino`) USING BTREE,
  INDEX `fk_convenio_vecino`(`id_vecino`) USING BTREE,
  CONSTRAINT `fk_convenio_vecino` FOREIGN KEY (`id_vecino`) REFERENCES `vecino` (`id_vecino`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 46 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Tabla de todos los convenios realizados con los convenios que presentan saldos en mora o que lo requieren por algun problema economico.' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of convenio
-- ----------------------------
INSERT INTO `convenio` VALUES (2, 3, '2021-12-08', '2021-12-25', 520.00, 100.00, 0.00, 420.00, 2, 'Convenio de pago de agua', 'Pendiente', 4);
INSERT INTO `convenio` VALUES (26, 6, '2021-10-08', '2021-12-26', 2000.00, 666.00, 66.00, 1268.00, 2, 'Convenio Mensualida', 'Pendiente', 2);
INSERT INTO `convenio` VALUES (27, 3, '2021-12-10', '2022-01-02', 2500.00, 500.00, 100.00, 1900.00, 3, 'Convenio ', 'Pendiente', 7);
INSERT INTO `convenio` VALUES (28, 5, '2021-12-10', '2021-12-03', 2000.00, 500.00, 100.00, 1400.00, 3, 'si', 'Cancelado', 6);
INSERT INTO `convenio` VALUES (29, 4, '2021-09-10', '2022-01-01', 2500.00, 500.00, 100.00, 1900.00, 3, 'Convenio de pago para mensualidad de siempre', 'Pendiente', 1);
INSERT INTO `convenio` VALUES (30, 2, '2021-10-10', '2021-12-18', 2000.00, 450.00, 0.00, 1550.00, 3, 'Convenio de pago para el mes de octubre', 'Pendiente', 2);
INSERT INTO `convenio` VALUES (31, 2, '2021-12-10', '2021-12-31', 520.00, 50.00, 0.00, 470.00, 2, 'Convenio de pago de agua ', 'Pendiente', 4);
INSERT INTO `convenio` VALUES (32, 4, '2021-12-10', '2022-01-20', 2000.00, 1000.00, 100.00, 900.00, 2, 'Convenio de pago para mantenimiento del muro', 'Pendiente', 6);
INSERT INTO `convenio` VALUES (33, 1, '2021-12-10', '2022-02-10', 1500.55, 500.00, 50.00, 950.55, 2, 'Convenio de pago para le mensualida de diciembre', 'Pendiente', 3);
INSERT INTO `convenio` VALUES (34, 5, '2021-12-10', '2022-01-01', 1780.00, 500.00, 100.00, 1180.00, 2, 'Convenio de mensualidad', 'Pendiente', 11);
INSERT INTO `convenio` VALUES (35, 5, '2021-12-10', '2021-12-12', 520.00, 50.00, 0.00, 470.00, 2, 'Convenio de pago de agua', 'Pendiente', 4);
INSERT INTO `convenio` VALUES (36, 6, '2021-12-10', '2022-01-01', 520.00, 100.00, 0.00, 420.00, 2, 'Convenio de pago de agua', 'Pendiente', 4);
INSERT INTO `convenio` VALUES (37, 1, '2021-12-10', '2021-11-23', 2000.00, 500.00, 150.00, 1350.00, 2, 'Convenio pago mes de octubre', 'Pendiente', 2);
INSERT INTO `convenio` VALUES (38, 3, '2021-12-10', '2021-11-23', 2000.00, 400.00, 150.00, 1450.00, 2, 'Convenio pago octubre', 'Pendiente', 2);
INSERT INTO `convenio` VALUES (39, 4, '2021-12-10', '2021-10-23', 2000.00, 600.00, 100.00, 1300.00, 2, 'Convenio de pago de octubre', 'Pendiente', 2);
INSERT INTO `convenio` VALUES (40, 1, '2021-12-10', '2021-10-23', 2500.00, 500.00, 100.00, 1900.00, 2, 'Convenio pago de septiembre', 'Pendiente', 1);
INSERT INTO `convenio` VALUES (41, 2, '2021-12-10', '2021-10-23', 2500.00, 600.00, 120.00, 1780.00, 3, 'Covenio pago de mes de septiembre', 'Pendiente', 1);
INSERT INTO `convenio` VALUES (42, 3, '2021-12-10', '2021-10-23', 2500.00, 450.00, 100.00, 1950.00, 3, 'Convenio de pago de septiembre', 'Pendiente', 1);
INSERT INTO `convenio` VALUES (43, 4, '2021-12-10', '2021-10-23', 2500.00, 700.00, 130.00, 1670.00, 3, 'Convenio de pago de mes de septiembre', 'Pendiente', 1);
INSERT INTO `convenio` VALUES (44, 4, '2021-12-10', '2022-01-01', 2500.00, 800.00, 100.00, 1600.00, 3, 'Convenio de pago ASSA', 'Pendiente', 9);
INSERT INTO `convenio` VALUES (45, 5, '2021-12-10', '2022-01-01', 2000.00, 700.00, 150.00, 1150.00, 2, 'Convenio de pago mantenimiento del muro', 'Pendiente', 6);

-- ----------------------------
-- Table structure for deposito
-- ----------------------------
DROP TABLE IF EXISTS `deposito`;
CREATE TABLE `deposito`  (
  `id_deposito` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador de Deposito',
  `id_vecino` int NOT NULL COMMENT 'Identificador del vecino que realizo el deposito',
  `fecha` date NOT NULL COMMENT 'Fecha en que se realizo el deposito',
  `monto` decimal(11, 2) NOT NULL COMMENT 'Monto del deposito',
  `agencia_bancario` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Banco en que realizo deposito',
  `numero_referencia` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Referencia del deposito',
  `id_cargo` int NULL DEFAULT NULL,
  `deposito_estado` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'ACTIVO',
  PRIMARY KEY (`id_deposito`, `id_vecino`) USING BTREE,
  INDEX `fk_deposito_vecino`(`id_vecino`) USING BTREE,
  INDEX `id_cargo`(`id_cargo`) USING BTREE,
  CONSTRAINT `deposito_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo_mensual` (`id_cargo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_deposito_vecino` FOREIGN KEY (`id_vecino`) REFERENCES `vecino` (`id_vecino`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = 'Tabla que detalla los depositos realizados por los vecinos.' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of deposito
-- ----------------------------
INSERT INTO `deposito` VALUES (1, 2, '2021-12-16', 520.00, 'Banco Atlantida', '0005511652000526', 4, 'ACTIVO');
INSERT INTO `deposito` VALUES (2, 3, '2021-12-04', 1500.55, 'Banco Occidente', '080324564222', 2, 'ACTIVO');
INSERT INTO `deposito` VALUES (3, 4, '2021-12-18', 1500.55, 'Banco Banpais', '002003864510025', 1, 'ACTIVO');
INSERT INTO `deposito` VALUES (4, 1, '2021-12-06', 1500.55, 'Banco Banpais', '05612130800899', 2, 'ACTIVO');
INSERT INTO `deposito` VALUES (5, 3, '2021-10-30', 520.00, 'Banco atlantida', '05612130800899', 4, 'ACTIVO');
INSERT INTO `deposito` VALUES (6, 3, '2021-12-31', 1500.55, 'Banco atlantida', '0561213sssssssssss', 3, 'ANULADO');
INSERT INTO `deposito` VALUES (7, 3, '2021-12-31', 4555.00, 'Banco atlantida', 'GHGHG', 2, 'ACTIVO');
INSERT INTO `deposito` VALUES (8, 2, '2021-12-31', 1500.55, 'Banco atlantida', 'kkkkkkkkkkkkkkkhjhtdrdt', 3, 'ACTIVO');
INSERT INTO `deposito` VALUES (9, 1, '2021-12-06', 2500.00, 'Banco Azteca', 'kjjdjdjdjdjdjdj', 1, 'ACTIVO');
INSERT INTO `deposito` VALUES (10, 5, '2021-12-07', 520.00, 'Banco atlantida', '12356486145', 4, 'ACTIVO');
INSERT INTO `deposito` VALUES (11, 2, '2021-11-01', 600.00, 'Banco Ficohsa', '1212', 5, 'ACTIVO');
INSERT INTO `deposito` VALUES (12, 3, '2021-09-02', 5000.00, 'Banco Ficohsa', '1211', 6, 'ACTIVO');
INSERT INTO `deposito` VALUES (13, 4, '2021-08-01', 2500.00, 'Banco Ficohsa', '1244', 7, 'ACTIVO');
INSERT INTO `deposito` VALUES (14, 5, '2021-07-02', 3500.00, 'Banco Ficohsa', '5655', 8, 'ACTIVO');
INSERT INTO `deposito` VALUES (15, 4, '2021-06-01', 500.00, 'Banco Ficohsa', '111', 9, 'ACTIVO');
INSERT INTO `deposito` VALUES (16, 5, '2021-05-01', 1570.00, 'Banco Ficohsa', '12222', 10, 'ACTIVO');
INSERT INTO `deposito` VALUES (17, 1, '2021-04-01', 1111.00, 'Banco Ficohsa', '216554', 11, 'ACTIVO');
INSERT INTO `deposito` VALUES (18, 2, '2021-03-01', 6550.00, 'Banco Ficohsa', '666', 5, 'ACTIVO');
INSERT INTO `deposito` VALUES (19, 3, '2021-02-01', 1750.00, 'Banco Ficohsa', '1', 6, 'ACTIVO');
INSERT INTO `deposito` VALUES (20, 4, '2021-01-01', 1440.00, 'Banco Ficohsa', '1', 7, 'ACTIVO');

-- ----------------------------
-- Table structure for pago
-- ----------------------------
DROP TABLE IF EXISTS `pago`;
CREATE TABLE `pago`  (
  `id_pago` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador del pago',
  `fecha` date NOT NULL COMMENT 'Fecha del pago',
  `monto` decimal(11, 2) NOT NULL COMMENT 'Monto del pago realizado',
  `tipo_gasto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Tipo del gasto',
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Descripcion o detalle del gasto',
  PRIMARY KEY (`id_pago`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = 'Tabla de los pagos o egresos realizados por la Junta de Vecinos por concepto de pago de agua, luz, mantenimiento realizados en la residencial.' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pago
-- ----------------------------
INSERT INTO `pago` VALUES (1, '2021-11-15', 1252.00, 'Seguridad', 'Pago de seguridad mes noviembre');
INSERT INTO `pago` VALUES (2, '2021-12-14', 1252.00, 'Seguridad', 'Pago seguridad de diciembre');
INSERT INTO `pago` VALUES (3, '2021-11-21', 1500.00, 'Aguas de San Pedro', 'Pago de aguas de san pedro\n');
INSERT INTO `pago` VALUES (4, '2021-12-15', 400.00, 'Aseo', 'Pago para el aseo mes de diciembre');
INSERT INTO `pago` VALUES (5, '2021-12-18', 120.66, 'Inversiones', 'Este es una gasto de la colonia');
INSERT INTO `pago` VALUES (6, '2021-11-09', 520.00, 'Aguas de San Pedro', 'Pago aguas de san pedro');
INSERT INTO `pago` VALUES (7, '2021-10-11', 15000.00, 'Aguas de San Pedro', 'Pago agua de san pedro octubre');
INSERT INTO `pago` VALUES (8, '2022-01-01', 1250.00, 'Seguridad', 'Pago de seguridad mes de enero');
INSERT INTO `pago` VALUES (9, '2022-01-01', 520.00, 'Aguas de San Pedro', 'Pago de agua mes enero');
INSERT INTO `pago` VALUES (10, '2022-01-15', 1000.00, 'Inversiones', 'Inversion en reparacion de ceras');
INSERT INTO `pago` VALUES (11, '2021-01-01', 1250.00, 'Seguridad', 'Pago de seguridad mes enero');
INSERT INTO `pago` VALUES (12, '2021-02-01', 1250.00, 'Seguridad', 'Pago seguridad mes febrero');
INSERT INTO `pago` VALUES (13, '2021-03-01', 1250.00, 'Seguridad', 'Pago de seguridad mes marzo');
INSERT INTO `pago` VALUES (14, '2021-04-01', 1250.00, 'Seguridad', 'Pago de seguridad mes abril');
INSERT INTO `pago` VALUES (15, '2021-05-01', 1250.00, 'Seguridad', 'Pago de seguridad mes mayo');
INSERT INTO `pago` VALUES (16, '2021-06-01', 1250.00, 'Seguridad', 'Pago de seguridad mes junio');
INSERT INTO `pago` VALUES (17, '2021-07-01', 1200.00, 'Seguridad', 'Pago de seguridad mes julio');
INSERT INTO `pago` VALUES (18, '2021-08-01', 1250.00, 'Seguridad', 'Pago de seguridad mes agosto');
INSERT INTO `pago` VALUES (19, '2021-09-01', 1250.00, 'Seguridad', 'Pago de seguridad mes de septiembre');
INSERT INTO `pago` VALUES (20, '2021-10-01', 1250.00, 'Seguridad', 'Pago de seguridad mes de octubre');
INSERT INTO `pago` VALUES (21, '2021-12-11', 450.00, 'Inversiones', 'Inversion en arreglos de navidad');
INSERT INTO `pago` VALUES (22, '2021-09-10', 450.00, 'Aseo', 'Pago de aseo mes de septiembre');
INSERT INTO `pago` VALUES (23, '2021-11-10', 400.00, 'Aseo', 'Pago de aseo mes de noviembre');
INSERT INTO `pago` VALUES (24, '2021-08-01', 400.00, 'Aseo', 'Pago de aseo mes de agosto');

-- ----------------------------
-- Table structure for pago_vecino
-- ----------------------------
DROP TABLE IF EXISTS `pago_vecino`;
CREATE TABLE `pago_vecino`  (
  `id_pago` int NOT NULL COMMENT 'Identificador del pago',
  `id_vecino` int NOT NULL COMMENT 'Idenfificador del vecino',
  PRIMARY KEY (`id_pago`, `id_vecino`) USING BTREE,
  INDEX `fk_vecino_pago`(`id_vecino`) USING BTREE,
  CONSTRAINT `fk_pago_pago` FOREIGN KEY (`id_pago`) REFERENCES `pago` (`id_pago`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pago_vecino_ibfk_1` FOREIGN KEY (`id_vecino`) REFERENCES `vecino` (`id_vecino`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = 'Tabla relacional entre la tabla de pago y tabla de vecinos.' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pago_vecino
-- ----------------------------

-- ----------------------------
-- Table structure for vecino
-- ----------------------------
DROP TABLE IF EXISTS `vecino`;
CREATE TABLE `vecino`  (
  `id_vecino` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador de Vecino',
  `primer_nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Primer Nombre del vecino',
  `segundo_nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Segundo nombre del vecino',
  `primer_apellido` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Primer apellido del vecino',
  `segundo_apellido` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Segundo apellido del vecino',
  `dni` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Documento Nacional de Identificacion del vecino',
  `fecha_nacimiento` date NOT NULL COMMENT 'Campo donde se almacena la fecha de nacimiento del vecino',
  `telefono` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Telefono del vecino',
  `num_casa` int NOT NULL COMMENT 'Numero de casa del vecino',
  `num_bloque` int NOT NULL COMMENT 'Numero bloque donde reside el vecino',
  `cant_vehiculos` int NOT NULL COMMENT 'Cantidad de vehiculos que posee el vecino',
  `usuario` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Usuario de acceso del vecino',
  `contrasenia` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Contraseña del vecino',
  `tipo_usuario` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Perfil de acceso del vecino (Administrador o Vecino)',
  `estado` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Estado del vecino (Activo / Inactivo)',
  PRIMARY KEY (`id_vecino`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Tabla que contiene los datos generales de cada uno de los vecinos asi como el usuario y perfil de acceso que cada uno tiene.' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of vecino
-- ----------------------------
INSERT INTO `vecino` VALUES (1, 'Abdiel', 'Emanuel', 'Licona', 'Garcia', '080320000101', '1998-01-01', '858585858', 5, 5, 5, 'admin', 'admin', 'ADMINISTRADOR', 'ACTIVO');
INSERT INTO `vecino` VALUES (2, 'Angelm', 'Geovani', 'Ernesto', 'Garcia', '080320000102', '1998-01-01', '858585858', 5, 5, 5, 'angel', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (3, 'Juan', 'Alcachofa', 'Saturno', 'Pluton', '080320000103', '1998-01-01', '858585858', 5, 5, 5, 'juan', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (4, 'Lionel', 'Andres', 'Messi', 'ApellidoActualizado', '09021002005', '1998-01-01', '858585858', 5, 5, 5, 'messi', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (5, 'Kimich', 'Bayern', 'Munich', 'Alvarez', '1804177700263', '1998-01-01', '06060606', 10, 9, 8, 'kimich', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (6, 'Edwin', 'Arnulfo', 'Matamoros', 'Moreira', '0205220300125', '1992-04-02', '9523-8565', 0, 4, 2, 'arnulfo', 'arnulfo', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (7, 'llllllllllllll', 'llllllllllllll', 'llllllllllllllll', 'lllllllllllllllllll', '454654654564564564', '2016-12-31', '546464564545', 4, 4, 4, 'emanuel', 'admin', 'ADMINISTRADOR', 'ACTIVO');

-- ----------------------------
-- Table structure for visita
-- ----------------------------
DROP TABLE IF EXISTS `visita`;
CREATE TABLE `visita`  (
  `id_visita` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la visita',
  `id_vecino` int NOT NULL COMMENT 'Identificador del vecino que recibe la visita',
  `fecha_visita` datetime NOT NULL COMMENT 'Fecha en que realiza la visita',
  `primer_nombre_visita` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Primer nombre de la visita',
  `segundo_nombre_visita` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'Segundo nombre de la visita',
  `primer_apellido_visita` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Primer apellido de la visita',
  `segundo_apellido_visita` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'Segundo apellido de la visita',
  `dni_visita` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Documento Nacional de Identificacion de la visita',
  `status_visita` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Status de la visita (generado / escaneado)',
  PRIMARY KEY (`id_visita`, `id_vecino`) USING BTREE,
  INDEX `fk_vecino_visita`(`id_vecino`) USING BTREE,
  CONSTRAINT `visita_ibfk_1` FOREIGN KEY (`id_vecino`) REFERENCES `vecino` (`id_vecino`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 96 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = 'Tabla de Visitas que reciben los vecinos registradas a traves de codigo QR.' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of visita
-- ----------------------------
INSERT INTO `visita` VALUES (12, 1, '2021-12-04 03:33:02', 'Emaniel', 'cjdjj', 'djjdjdj', 'djdjdj', '5464549546', 'ANULADO');
INSERT INTO `visita` VALUES (13, 1, '2021-12-04 04:04:39', 'ddkdk', 'dkdksd', 'dkdkd', 'dldld', 'dldldldld', 'INGRESO');
INSERT INTO `visita` VALUES (14, 1, '2021-12-04 03:34:32', 'djdjdjdjdj', 'djdjdjd', 'djdjdj', 'djdjdjd', '4646549', 'ANULADO');
INSERT INTO `visita` VALUES (15, 2, '2021-12-13 00:00:00', 'kkkkkkkkkkkkk', 'kkkkkkkkkkkkkkkkkkkk', 'kkkkkkkkkkkkkkkkk', 'kkkkkkkkkkkkkkkkkkkkk', '4564654654546', 'ANULADO');
INSERT INTO `visita` VALUES (16, 1, '2021-12-05 03:53:00', 'kkkkk', 'jjjjj', 'lkdkdk', 'kekdkdkdk', '546465456465456', 'ANULADO');
INSERT INTO `visita` VALUES (17, 1, '2021-12-08 00:51:19', 'Brayan', 'Eludes', 'Alvarez', 'Gonzales', '0805132165465456', 'INICIADO');
INSERT INTO `visita` VALUES (18, 1, '2021-12-08 05:09:58', 'Jesus', 'Otoro', 'Canaca', 'Pluton', '08465161321', 'INGRESO');
INSERT INTO `visita` VALUES (19, 1, '2021-11-01 05:01:00', 'Jesus', 'Alberto ', 'sss', 'ss', '11111', 'INGRESO');
INSERT INTO `visita` VALUES (20, 1, '2021-01-01 05:00:01', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555111', 'ANULADO');
INSERT INTO `visita` VALUES (21, 3, '2021-01-10 05:00:10', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555112', 'ANULADO');
INSERT INTO `visita` VALUES (22, 1, '2021-08-30 05:00:30', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555113', 'INGRESO');
INSERT INTO `visita` VALUES (23, 3, '2021-06-16 05:00:16', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555114', 'INGRESO');
INSERT INTO `visita` VALUES (24, 5, '2021-05-15 05:00:15', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555115', 'INICIADO');
INSERT INTO `visita` VALUES (25, 1, '2021-05-21 05:00:21', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555116', 'INICIADO');
INSERT INTO `visita` VALUES (26, 5, '2021-02-28 05:00:28', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555117', 'INICIADO');
INSERT INTO `visita` VALUES (27, 3, '2021-02-08 05:00:08', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555118', 'INGRESO');
INSERT INTO `visita` VALUES (28, 1, '2021-04-28 05:00:28', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555119', 'ANULADO');
INSERT INTO `visita` VALUES (29, 1, '2021-04-11 05:00:11', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555120', 'INGRESO');
INSERT INTO `visita` VALUES (30, 3, '2021-08-29 05:00:29', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555121', 'INICIADO');
INSERT INTO `visita` VALUES (31, 2, '2021-04-06 05:00:06', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555122', 'INGRESO');
INSERT INTO `visita` VALUES (32, 4, '2021-01-08 05:00:08', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555123', 'ANULADO');
INSERT INTO `visita` VALUES (33, 4, '2021-02-15 05:00:15', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555124', 'INICIADO');
INSERT INTO `visita` VALUES (34, 3, '2021-01-31 05:00:31', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555125', 'ANULADO');
INSERT INTO `visita` VALUES (35, 1, '2021-09-25 05:00:25', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555126', 'INICIADO');
INSERT INTO `visita` VALUES (36, 5, '2021-08-03 05:00:03', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555127', 'INICIADO');
INSERT INTO `visita` VALUES (37, 4, '2021-05-31 05:00:31', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555128', 'INICIADO');
INSERT INTO `visita` VALUES (38, 5, '2021-06-07 05:00:07', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555129', 'INICIADO');
INSERT INTO `visita` VALUES (39, 4, '2021-03-01 05:00:01', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555130', 'ANULADO');
INSERT INTO `visita` VALUES (40, 1, '2021-06-19 05:00:19', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555131', 'INICIADO');
INSERT INTO `visita` VALUES (41, 1, '2021-05-04 05:00:04', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555132', 'INICIADO');
INSERT INTO `visita` VALUES (42, 3, '2021-08-06 05:00:06', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555133', 'INGRESO');
INSERT INTO `visita` VALUES (43, 1, '2021-04-13 05:00:13', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555134', 'ANULADO');
INSERT INTO `visita` VALUES (44, 3, '2021-04-14 05:00:14', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555135', 'INGRESO');
INSERT INTO `visita` VALUES (45, 5, '2021-03-02 05:00:02', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555136', 'INICIADO');
INSERT INTO `visita` VALUES (46, 2, '2021-10-13 05:00:13', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555137', 'INICIADO');
INSERT INTO `visita` VALUES (47, 2, '2021-05-23 05:00:23', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555138', 'INICIADO');
INSERT INTO `visita` VALUES (48, 5, '2021-08-27 05:00:27', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555139', 'ANULADO');
INSERT INTO `visita` VALUES (49, 3, '2021-09-10 05:00:10', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555140', 'INICIADO');
INSERT INTO `visita` VALUES (50, 1, '2021-04-02 05:00:02', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555141', 'INGRESO');
INSERT INTO `visita` VALUES (51, 2, '2021-06-02 05:00:02', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555142', 'INICIADO');
INSERT INTO `visita` VALUES (52, 1, '2021-02-17 05:00:17', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555143', 'INGRESO');
INSERT INTO `visita` VALUES (53, 2, '2021-07-24 05:00:24', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555144', 'ANULADO');
INSERT INTO `visita` VALUES (54, 5, '2021-08-07 05:00:07', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555145', 'ANULADO');
INSERT INTO `visita` VALUES (55, 1, '2021-09-25 05:00:25', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555146', 'INICIADO');
INSERT INTO `visita` VALUES (56, 2, '2021-06-17 05:00:17', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555147', 'ANULADO');
INSERT INTO `visita` VALUES (57, 3, '2021-08-18 05:00:18', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555148', 'INGRESO');
INSERT INTO `visita` VALUES (58, 4, '2021-06-22 05:00:22', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555149', 'INGRESO');
INSERT INTO `visita` VALUES (59, 2, '2021-08-25 05:00:25', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555150', 'ANULADO');
INSERT INTO `visita` VALUES (60, 3, '2021-09-15 05:00:15', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555151', 'ANULADO');
INSERT INTO `visita` VALUES (61, 5, '2021-06-19 05:00:19', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555152', 'ANULADO');
INSERT INTO `visita` VALUES (62, 4, '2021-06-24 05:00:24', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555153', 'INICIADO');
INSERT INTO `visita` VALUES (63, 2, '2021-03-04 05:00:04', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555154', 'INICIADO');
INSERT INTO `visita` VALUES (64, 5, '2021-03-19 05:00:19', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555155', 'INGRESO');
INSERT INTO `visita` VALUES (65, 4, '2021-08-07 05:00:07', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555156', 'INICIADO');
INSERT INTO `visita` VALUES (66, 2, '2021-02-11 05:00:11', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555157', 'INICIADO');
INSERT INTO `visita` VALUES (67, 2, '2021-01-27 05:00:27', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555158', 'INICIADO');
INSERT INTO `visita` VALUES (68, 4, '2021-03-29 05:00:29', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555159', 'INGRESO');
INSERT INTO `visita` VALUES (69, 5, '2021-05-26 05:00:26', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555160', 'ANULADO');
INSERT INTO `visita` VALUES (70, 1, '2021-04-02 05:00:02', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555161', 'ANULADO');
INSERT INTO `visita` VALUES (71, 1, '2021-03-12 05:00:12', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555162', 'INICIADO');
INSERT INTO `visita` VALUES (72, 3, '2021-09-23 05:00:23', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555163', 'INGRESO');
INSERT INTO `visita` VALUES (73, 1, '2021-08-24 05:00:24', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555164', 'INGRESO');
INSERT INTO `visita` VALUES (74, 4, '2021-01-31 05:00:31', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555165', 'ANULADO');
INSERT INTO `visita` VALUES (75, 5, '2021-10-02 05:00:02', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555166', 'INICIADO');
INSERT INTO `visita` VALUES (76, 2, '2021-08-12 05:00:12', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555167', 'ANULADO');
INSERT INTO `visita` VALUES (77, 1, '2021-05-16 05:00:16', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555168', 'ANULADO');
INSERT INTO `visita` VALUES (78, 3, '2021-10-18 05:00:18', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555169', 'ANULADO');
INSERT INTO `visita` VALUES (79, 2, '2021-05-21 05:00:21', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555170', 'ANULADO');
INSERT INTO `visita` VALUES (80, 5, '2021-02-24 05:00:24', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555171', 'ANULADO');
INSERT INTO `visita` VALUES (81, 4, '2021-08-10 05:00:10', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555172', 'INGRESO');
INSERT INTO `visita` VALUES (82, 3, '2021-05-05 05:00:05', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555173', 'INICIADO');
INSERT INTO `visita` VALUES (83, 2, '2021-03-03 05:00:03', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555174', 'INGRESO');
INSERT INTO `visita` VALUES (84, 2, '2021-09-09 05:00:09', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555175', 'INICIADO');
INSERT INTO `visita` VALUES (85, 3, '2021-03-05 05:00:05', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555176', 'ANULADO');
INSERT INTO `visita` VALUES (86, 5, '2021-03-23 05:00:23', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555177', 'ANULADO');
INSERT INTO `visita` VALUES (87, 5, '2021-08-19 05:00:19', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555178', 'INICIADO');
INSERT INTO `visita` VALUES (88, 3, '2021-05-02 05:00:02', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555179', 'INGRESO');
INSERT INTO `visita` VALUES (89, 2, '2021-10-19 05:00:19', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555180', 'INGRESO');
INSERT INTO `visita` VALUES (90, 1, '2021-07-01 05:00:01', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555181', 'ANULADO');
INSERT INTO `visita` VALUES (91, 1, '2021-06-30 05:00:30', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555182', 'INICIADO');
INSERT INTO `visita` VALUES (92, 4, '2021-02-16 05:00:16', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555183', 'INGRESO');
INSERT INTO `visita` VALUES (93, 5, '2021-02-06 05:00:06', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555184', 'ANULADO');
INSERT INTO `visita` VALUES (94, 1, '2021-05-18 05:00:18', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555185', 'INGRESO');
INSERT INTO `visita` VALUES (95, 1, '2021-04-23 05:00:23', 'Flavio ', 'A', 'Carmona', 'Bueso', '5014555186', 'ANULADO');

-- ----------------------------
-- Procedure structure for SP_ANULAR_CARGO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_ANULAR_CARGO`;
delimiter ;;
CREATE PROCEDURE `SP_ANULAR_CARGO`(IN ID INT)
BEGIN
		
				
		DECLARE CANTIDAD INT;
		SET @CANTIDAD:=(SELECT COUNT(*) FROM deposito WHERE id_cargo = ID AND deposito_estado = "ACTIVO");
		
		IF @CANTIDAD > 0 THEN
			SELECT 5;
		ELSE
		
			UPDATE cargo_mensual SET cargo_mensual.estado_cargo = "ANULADO" WHERE cargo_mensual.id_cargo = ID;
        SELECT 1;												 
		
			SELECT 1;
		END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_ANULAR_DEPOSITO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_ANULAR_DEPOSITO`;
delimiter ;;
CREATE PROCEDURE `SP_ANULAR_DEPOSITO`(IN ID INT)
BEGIN
		UPDATE deposito SET deposito.deposito_estado = "ANULADO" WHERE deposito.id_deposito = ID;
        SELECT 1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_ANULAR_VISITA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_ANULAR_VISITA`;
delimiter ;;
CREATE PROCEDURE `SP_ANULAR_VISITA`(IN ID INT)
BEGIN
		UPDATE visita SET visita.status_visita = "ANULADO" WHERE visita.id_visita = ID;
        SELECT 1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_CANTIDAD_VISITAS_POR_MES
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_CANTIDAD_VISITAS_POR_MES`;
delimiter ;;
CREATE PROCEDURE `SP_CANTIDAD_VISITAS_POR_MES`()
SELECT MONTHNAME(fecha_visita) NOMBRE_MES, COUNT(id_visita) CANTIDAD
	FROM visita 
WHERE YEAR(fecha_visita) = YEAR(CURDATE()) AND status_visita = 'INGRESO'
GROUP BY NOMBRE_MES
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_EDITAR_CARGO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_EDITAR_CARGO`;
delimiter ;;
CREATE PROCEDURE `SP_EDITAR_CARGO`(IN ID INT,
IN FEC DATE,
IN MON DECIMAL(11,3),
IN DESCRIP TEXT)
BEGIN


		DECLARE CANTIDAD INT;
		SET @CANTIDAD:=(SELECT COUNT(*) FROM deposito WHERE id_cargo = ID AND deposito_estado = "ACTIVO");
		
		IF @CANTIDAD > 0 THEN
			SELECT 5;
		ELSE
		
			UPDATE cargo_mensual SET cargo_mensual.fecha_cargo = FEC,
														 cargo_mensual.monto_cargo = MON,
														 cargo_mensual.descripcion_cargo = DESCRIP
			WHERE cargo_mensual.id_cargo = ID;												 
		
			SELECT 1;
		END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_EDITAR_CONVENIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_EDITAR_CONVENIO`;
delimiter ;;
CREATE PROCEDURE `SP_EDITAR_CONVENIO`(IN ID INT,
	IN CARGO INT,
	IN MONTO DECIMAL(11,2),
	IN PRIMA DECIMAL(11,2),
	IN DESCUENTO DECIMAL(11,2),
	IN SALDO DECIMAL(11,2),
	IN CUOTAS DECIMAL(11,2),
	IN DETALLES VARCHAR(100),
	IN FECHAULTIMO DATE,
	IN ESTADO VARCHAR(100),
	IN VECINO INT)
BEGIN
	
	
		UPDATE convenio SET 
					convenio.id_cargo = CARGO,
					convenio.monto_inicial = MONTO,
					convenio.prima = PRIMA,
					convenio.descuento = DESCUENTO,
					convenio.saldo_restante = SALDO,
					convenio.cuotas = CUOTAS,
					convenio.descripcion = DETALLES,
					convenio.fecha_ultimo_pago = FECHAULTIMO,
					convenio.estado = ESTADO,
					convenio.id_vecino = VECINO
		WHERE convenio.id_convenio = ID;			
		
		SELECT 1;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_EDITAR_DEPOSITO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_EDITAR_DEPOSITO`;
delimiter ;;
CREATE PROCEDURE `SP_EDITAR_DEPOSITO`(IN ID_DEPO INT,
	IN FECH DATE,
	IN MONT DECIMAL(11,2),
	IN AGENCIA VARCHAR(100),
	IN NUM_REFERENCIA VARCHAR(100),
	IN VECINO INT,
	IN ID_CAR INT)
BEGIN
		
		DECLARE CANTIDAD INT;
		
		DECLARE CANTIDAD2 INT;
			
		SET @CANTIDAD:=(SELECT COUNT(*) FROM deposito WHERE id_vecino = VECINO AND id_cargo = ID_CAR AND id_deposito <> ID_DEPO AND deposito_estado = "ACTIVO");
		SET @CANTIDAD2:=(SELECT COUNT(*) FROM deposito WHERE id_vecino = VECINO AND id_cargo = ID_CAR AND id_deposito = ID_DEPO AND deposito_estado = "ACTIVO");

		
			IF @CANTIDAD > 0 THEN
				IF @CANTIDAD2 = 1 THEN
					UPDATE deposito SET id_vecino = VECINO, 
															fecha = FECH, 
															monto = MONT, 
															agencia_bancario = AGENCIA, 
															numero_referencia = NUM_REFERENCIA, 
															id_cargo = ID_CAR
					WHERE id_deposito = ID_DEPO;
				SELECT 1;
				ELSE
					
					SELECT 5;
				END IF;
			ELSE	
					UPDATE deposito SET id_vecino = VECINO, 
															fecha = FECH, 
															monto = MONT, 
															agencia_bancario = AGENCIA, 
															numero_referencia = NUM_REFERENCIA, 
															id_cargo = ID_CAR
					WHERE id_deposito = ID_DEPO;
				SELECT 1;
			END IF;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_EDITAR_PAGO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_EDITAR_PAGO`;
delimiter ;;
CREATE PROCEDURE `SP_EDITAR_PAGO`(IN ID INT,
IN FEC DATE,
IN MON DECIMAL(11,3),
IN TIP VARCHAR(45),
IN DESCRIP TEXT)
BEGIN
	
	
		UPDATE pago SET 
					pago.fecha = FEC,
					pago.monto = MON,
					pago.tipo_gasto = TIP,
					pago.descripcion = DESCRIP
		WHERE pago.id_pago = ID;			
		
		SELECT 1;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_EDITAR_VECINO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_EDITAR_VECINO`;
delimiter ;;
CREATE PROCEDURE `SP_EDITAR_VECINO`(IN ID_VECINO INT,
		IN PRIMER_NOMBRE VARCHAR(45),
		IN SEGUNDO_NOMBRE VARCHAR(45),	
		IN APELLIDO_PATERNO VARCHAR(45), 
		IN APELLIDO_MATERNO VARCHAR(45), 
		IN FECHA_NACIMIENTO DATE,
		IN TELEFONO VARCHAR(20), 	
		IN DNI VARCHAR(20), 
		IN NUM_CASA INT,
		IN NUM_BLOQUE INT,	
		IN CANT_VEHICULOS INT,
		IN USERNAME VARCHAR(45),
		IN CONTRASENIA VARCHAR(45),
		IN TIPO_USUARIO VARCHAR(45),
		IN ESTADO VARCHAR(45))
BEGIN

		DECLARE DNI_ACTUAL VARCHAR(20);
		DECLARE USERNAME_ACTUAL VARCHAR(45);
		DECLARE CANTIDAD INT;
		DECLARE CANT_USER INT;
	
		
		SET @DNI_ACTUAL:=(SELECT vecino.dni FROM vecino WHERE vecino.id_vecino = ID_VECINO);
		SET @USERNAME_ACTUAL:=(SELECT vecino.usuario FROM vecino WHERE vecino.id_vecino = ID_VECINO);
		
				IF @DNI_ACTUAL = DNI OR @USERNAME_ACTUAL = USERNAME THEN 
				
					IF @USERNAME_ACTUAL = USERNAME AND @DNI_ACTUAL = DNI  THEN 
								
							UPDATE vecino SET primer_nombre = PRIMER_NOMBRE, segundo_nombre = SEGUNDO_NOMBRE, primer_apellido = APELLIDO_PATERNO, segundo_apellido = APELLIDO_MATERNO,fecha_nacimiento = FECHA_NACIMIENTO, telefono = TELEFONO, num_casa = NUM_CASA, num_bloque = NUM_BLOQUE, cant_vehiculos = CANT_VEHICULOS,  contrasenia = CONTRASENIA, tipo_usuario = TIPO_USUARIO, estado = ESTADO WHERE vecino.id_vecino = ID_VECINO;
							SELECT 1;

					ELSE #ELSE DEL SEGUNDO IF
						SET @CANTIDAD:=(SELECT COUNT(*) FROM vecino WHERE vecino.dni = DNI);
						SET @CANT_USER:=(SELECT COUNT(*) FROM vecino WHERE vecino.usuario = USERNAME);
						
						IF @DNI_ACTUAL = DNI THEN #TERCER IF
								IF @CANT_USER = 0 THEN #CUARTO IF
										UPDATE vecino SET primer_nombre = PRIMER_NOMBRE, segundo_nombre = SEGUNDO_NOMBRE, primer_apellido = APELLIDO_PATERNO, segundo_apellido = APELLIDO_MATERNO, fecha_nacimiento = FECHA_NACIMIENTO, telefono = TELEFONO, num_casa = NUM_CASA, num_bloque 	= NUM_BLOQUE, cant_vehiculos = CANT_VEHICULOS, usuario = USERNAME, contrasenia = CONTRASENIA, tipo_usuario = TIPO_USUARIO, estado = ESTADO WHERE vecino.id_vecino = ID_VECINO;
									 SELECT 1;
										
								ELSE #ELSE CUARTO IF
								
									SELECT 3;
									
								END IF; #END IF DEL CUARTO IF
								
						ELSE #ELSE TERCER IF
					
							IF @USERNAME_ACTUAL = USERNAME THEN #QUINTO IF
								IF @CANTIDAD = 0 THEN #SEXTO IF
										UPDATE vecino SET primer_nombre = PRIMER_NOMBRE, segundo_nombre = SEGUNDO_NOMBRE, primer_apellido = APELLIDO_PATERNO, segundo_apellido = APELLIDO_MATERNO, dni = DNI,fecha_nacimiento = FECHA_NACIMIENTO, telefono = TELEFONO, num_casa = NUM_CASA, num_bloque = NUM_BLOQUE, cant_vehiculos = CANT_VEHICULOS, contrasenia = CONTRASENIA, tipo_usuario = TIPO_USUARIO, estado = ESTADO WHERE vecino.id_vecino = ID_VECINO;
									 SELECT 1;
								ELSE # ELSE SEXTO IF
									SELECT 2;
								END IF; #END IF DEL SEXTO IF
							
							ELSE #ELSE DEL QUINTO IF 
								SELECT 4;
							
							END IF; #END IF DEL QUINTO IF 
						
						END IF; #END DEL TERCER IF
						
					END IF; #END IF DEL SEGUNDO IF
					
			
					
				ELSE #ELSE DEL IF PRINCIPAL
				
					SET @CANTIDAD:=(SELECT COUNT(*) FROM vecino WHERE vecino.dni = DNI);
						SET @CANT_USER:=(SELECT COUNT(*) FROM vecino WHERE vecino.usuario = USERNAME);
					
					IF @CANTIDAD = 0 AND @CANT_USER = 0 THEN
							
							UPDATE vecino SET primer_nombre = PRIMER_NOMBRE, segundo_nombre = SEGUNDO_NOMBRE, primer_apellido = APELLIDO_PATERNO, segundo_apellido = APELLIDO_MATERNO, dni = DNI,fecha_nacimiento = FECHA_NACIMIENTO, telefono = TELEFONO, num_casa = NUM_CASA, num_bloque = NUM_BLOQUE, cant_vehiculos = CANT_VEHICULOS, usuario = USERNAME, contrasenia = CONTRASENIA, tipo_usuario = TIPO_USUARIO, estado = ESTADO WHERE vecino.id_vecino = ID_VECINO;
							SELECT 1;
					ELSE
					
						IF @CANTIDAD > 0 THEN
							SELECT 2;
						ELSEIF @CANT_USER > 0 THEN
							SELECT 3;
						ELSE
							SELECT 4;
						END IF;
					
					END IF;
				
				END IF; #END IF DEL IF PRINCIPAL
		
		
		
		
		
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_COMBO_CARGO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_COMBO_CARGO`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_COMBO_CARGO`()
SELECT id_cargo, CONCAT_WS(' - ',descripcion_cargo,monto_cargo) as nombre, monto_cargo
	FROM cargo_mensual
WHERE estado_cargo = 'ACTIVO'
;
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_COMBO_VECINO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_COMBO_VECINO`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_COMBO_VECINO`()
SELECT id_vecino, CONCAT_WS(' ',primer_nombre,segundo_nombre,primer_apellido, segundo_apellido) as nombre_vecino
	FROM vecino
WHERE estado = 'ACTIVO'
ORDER BY primer_nombre ASC
;
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_CONVENIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_CONVENIO`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_CONVENIO`()
SELECT
  c.id_convenio,
	c.fecha_inicio,
	c.monto_inicial,
	c.prima,
	c.descuento,
	c.saldo_restante,
	c.cuotas,
	c.estado,
	c.descripcion,
	c.fecha_ultimo_pago,
	v.id_vecino,
	cm.id_cargo,
	CONCAT_WS(' ',v.primer_nombre,v.segundo_nombre,v.primer_apellido, v.segundo_apellido) as nombre_vecino
	FROM convenio c INNER JOIN vecino v on c.id_vecino=v.id_vecino INNER JOIN cargo_mensual cm on c.id_cargo=cm.id_cargo
;
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_DEPOSITO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_DEPOSITO`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_DEPOSITO`()
SELECT d.fecha, d.monto, d.agencia_bancario, d.numero_referencia, d.id_deposito, 
CONCAT_WS(' ',v.primer_nombre,v.segundo_nombre,v.primer_apellido, v.segundo_apellido) as nombre_vecino
	FROM deposito d INNER JOIN vecino v ON d.id_vecino = v.id_vecino
;
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_DETALLE_CUENTA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_DETALLE_CUENTA`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_DETALLE_CUENTA`(IN ID_V INT,
IN FECHA_I DATE,
IN FECHA_F DATE)
BEGIN
		SELECT
			*,
			cargo_mensual.id_cargo as car_id
		FROM cargo_mensual LEFT JOIN (SELECT
																		*
																	FROM deposito
																	
																	WHERE deposito.id_vecino = ID_V AND deposito.deposito_estado = 'ACTIVO'	
-- 																		AND deposito.fecha BETWEEN FECHA_I AND FECHA_F	
																) AS d
																ON cargo_mensual.id_cargo = d.id_cargo				
		WHERE cargo_mensual.estado_cargo = 'ACTIVO'		
		ORDER BY d.id_deposito DESC;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_VECINOS
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_VECINOS`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_VECINOS`()
SELECT *, CONCAT_WS(' ',primer_nombre,segundo_nombre,primer_apellido,segundo_apellido) as nombre_vecino
FROM vecino ORDER BY primer_nombre ASC
;
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_PREGUNTAR_CARGO_VECINO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_PREGUNTAR_CARGO_VECINO`;
delimiter ;;
CREATE PROCEDURE `SP_PREGUNTAR_CARGO_VECINO`(IN ID_V INT,
		IN ID_C INT)
BEGIN

		DECLARE CANTIDAD INT;
		
		SET @CANTIDAD:=(SELECT COUNT(*) FROM deposito WHERE id_vecino = ID_V AND id_cargo = ID_C);
				
			IF @CANTIDAD > 0 THEN
				SELECT 1;
			ELSE	
				SELECT 0;
			END IF;
	END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REGISTRAR_BITACORA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_BITACORA`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_BITACORA`(IN ID_V INT,
IN ACC VARCHAR(100),
IN DECT TEXT)
BEGIN
	
	INSERT INTO 
		bitacora(fecha, id_vecino, accion, descripcion)
	VALUES (NOW(), ID_V, ACC, DECT);
		
		SELECT 1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REGISTRAR_CARGO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_CARGO`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_CARGO`(IN FEC DATE,
IN MON DECIMAL(11,3),
IN DESCRIP TEXT)
BEGIN
	
	INSERT INTO 
		cargo_mensual(fecha_cargo, monto_cargo, descripcion_cargo, estado_cargo) 
		VALUES (FEC, MON, DESCRIP, "ACTIVO");

		SELECT 1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REGISTRAR_CONVENIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_CONVENIO`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_CONVENIO`(IN CARGO INT,
	IN MONTO DECIMAL(11,2),
	IN PRIMA DECIMAL(11,2),
	IN DESCUENTO DECIMAL(11,2),
	IN SALDO DECIMAL(11,2),
	IN CUOTAS DECIMAL(11,2),
	IN DETALLES VARCHAR(100),
	IN FECHAULTIMO DATE,
	IN ESTADO VARCHAR(100),
	IN VECINO INT)
BEGIN	
		INSERT INTO convenio (id_vecino, fecha_inicio, fecha_ultimo_pago, monto_inicial, prima, descuento,saldo_restante,cuotas,descripcion,estado,id_cargo)
		VALUES (VECINO, CURDATE(), FECHAULTIMO, MONTO, PRIMA, DESCUENTO,SALDO,CUOTAS,DETALLES,ESTADO,CARGO);
		SELECT 1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REGISTRAR_DEPOSITO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_DEPOSITO`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_DEPOSITO`(IN FECHA DATE,
	IN MONTO DECIMAL(11,2),
	IN AGENCIA VARCHAR(100),
	IN NUMERO_REFERENCIA VARCHAR(100),
	IN VECINO INT,
	IN ID_CARGO INT)
INSERT INTO deposito (id_vecino, fecha, monto, agencia_bancario, numero_referencia, id_cargo)VALUES (VECINO, FECHA, MONTO, AGENCIA, NUMERO_REFERENCIA, ID_CARGO)
;
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REGISTRAR_DEPOSITO2
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_DEPOSITO2`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_DEPOSITO2`(IN FECHA DATE,
	IN MONTO DECIMAL(11,2),
	IN AGENCIA VARCHAR(100),
	IN NUM_REFERENCIA VARCHAR(100),
	IN VECINO INT,
	IN ID_CAR INT)
BEGIN
		
		DECLARE CANTIDAD INT;
		
-- 		DECLARE CANTIDADR INT;
-- 		SET @CANTIDADR:=(SELECT COUNT(*) FROM deposito WHERE numero_referencia = NUM_REFERENCIA);
-- 		
-- 		
-- 		IF @CANTIDADR > 0 THEN
-- 			SELECT 6;
-- 		ELSE
			
		SET @CANTIDAD:=(SELECT COUNT(*) FROM deposito WHERE id_vecino = VECINO AND id_cargo = ID_CAR AND deposito_estado="ACTIVO");
		
			IF @CANTIDAD > 0 THEN
				SELECT 5;
			ELSE	
					INSERT INTO deposito (id_vecino, fecha, monto, agencia_bancario, numero_referencia, id_cargo)
					VALUES (VECINO, FECHA, MONTO, AGENCIA, NUM_REFERENCIA, ID_CAR);
				SELECT 1;
			END IF;
-- 			
-- 		END IF;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REGISTRAR_PAGO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_PAGO`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_PAGO`(IN FEC DATE,
IN MON DECIMAL(11,3),
IN TIP VARCHAR(45),
IN DESCRIP TEXT)
BEGIN
	
	INSERT INTO 
		pago(fecha, monto, tipo_gasto, descripcion) 
		VALUES (FEC, MON,TIP, DESCRIP);
		
		SELECT 1;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REGISTRAR_VECINO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_VECINO`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_VECINO`(IN PRIMER_NOMBRE VARCHAR(45),
		IN SEGUNDO_NOMBRE VARCHAR(45),	
		IN APELLIDO_PATERNO VARCHAR(45), 
		IN APELLIDO_MATERNO VARCHAR(45), 
		IN FECHA_NACIMIENTO DATE,
		IN TELEFONO VARCHAR(20), 	
		IN DNI VARCHAR(20), 
		IN NUM_CASA INT,
		IN NUM_BLOQUE INT,	
		IN CANT_VEHICULOS INT,
		IN USERNAME VARCHAR(45),
		IN CONTRASENIA VARCHAR(45),
		IN TIPO_USUARIO VARCHAR(45))
BEGIN

		DECLARE CANTIDAD INT;
		DECLARE CANT_USER INT;
		SET @CANTIDAD:=(SELECT COUNT(*) FROM vecino WHERE vecino.dni = DNI);
		SET @CANT_USER:=(SELECT COUNT(*) FROM vecino WHERE vecino.usuario = USERNAME);
		
		IF @CANTIDAD = 0 AND @CANT_USER = 0 THEN
			INSERT INTO vecino (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido,	dni,fecha_nacimiento,
			telefono,num_casa,num_bloque,cant_vehiculos,usuario,contrasenia,tipo_usuario, estado) 
			VALUES (PRIMER_NOMBRE,SEGUNDO_NOMBRE,	APELLIDO_PATERNO,	APELLIDO_MATERNO,	DNI,FECHA_NACIMIENTO, TELEFONO,
			NUM_CASA,	NUM_BLOQUE, CANT_VEHICULOS,	USERNAME, CONTRASENIA,	TIPO_USUARIO,	'ACTIVO');
			SELECT 1; 
		ELSE
		
			IF @CANTIDAD > 0 THEN
				SELECT 2;
			END IF;
			
			IF @CANT_USER > 0 THEN
				SELECT 3;
			END IF;
		
			
		END IF;
		
	END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REGISTRAR_VISITA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_VISITA`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_VISITA`(IN ID INT,
IN PRIMERN VARCHAR(45),
IN SEGUNDON VARCHAR(45),
IN PRIMERA VARCHAR(45),
IN SEGUNDOA VARCHAR(45),
IN DNI VARCHAR(45))
BEGIN
	
	INSERT INTO 
		visita(
			visita.id_vecino,
			visita.fecha_visita,
			visita.primer_nombre_visita,
			visita.segundo_nombre_visita,
			visita.primer_apellido_visita,
			visita.segundo_apellido_visita ,
			visita.dni_visita,
            visita.status_visita
		) 
		VALUES (ID, NOW(), PRIMERN, SEGUNDON, PRIMERA, SEGUNDOA, DNI, "INICIADO" );

END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
