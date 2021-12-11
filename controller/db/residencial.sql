/*
 Navicat Premium Data Transfer

 Source Server         : Conexion-01-MySQL
 Source Server Type    : MySQL
 Source Server Version : 100420
 Source Host           : localhost:3306
 Source Schema         : residencial

 Target Server Type    : MySQL
 Target Server Version : 100420
 File Encoding         : 65001

 Date: 10/12/2021 23:06:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bitacora
-- ----------------------------
DROP TABLE IF EXISTS `bitacora`;
CREATE TABLE `bitacora`  (
  `id_bitacora` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la bitacora',
  `fecha` datetime(0) NOT NULL COMMENT 'Fecha para registrar la accion del vecino',
  `Id_vecino` int(11) NOT NULL COMMENT 'id del vecino que hace la accion',
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
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador Cargo',
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
INSERT INTO `cargo_mensual` VALUES (7, '2021-12-08', 2500.00, 'Wifi Residencial', 'ACTIVO');
INSERT INTO `cargo_mensual` VALUES (8, '2021-11-05', 5000.00, 'Vigilancia', 'ACTIVO');
INSERT INTO `cargo_mensual` VALUES (9, '2021-10-05', 2500.00, 'Camaras Seguridad', 'ACTIVO');
INSERT INTO `cargo_mensual` VALUES (10, '2021-08-01', 1500.00, 'Mensualidad ', 'ACTIVO');

-- ----------------------------
-- Table structure for convenio
-- ----------------------------
DROP TABLE IF EXISTS `convenio`;
CREATE TABLE `convenio`  (
  `id_convenio` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del convenio',
  `id_vecino` int(11) NOT NULL COMMENT 'Identificador del vecino con el cual se realiza convenio',
  `fecha_inicio` date NOT NULL COMMENT 'Fecha de inicio de pago del convenio',
  `fecha_ultimo_pago` date NOT NULL COMMENT 'Fecha en que se realiza el ultimo pago',
  `monto_inicial` decimal(11, 2) NOT NULL COMMENT 'Monto adeudado del vecino',
  `prima` decimal(11, 2) NOT NULL COMMENT 'Prima pagada por el vecino',
  `descuento` decimal(11, 2) NOT NULL COMMENT 'Descuento aplicado al vecino sobre la deuda inicial',
  `saldo_restante` decimal(11, 2) NOT NULL COMMENT 'Saldo restante despues de pago de prima y descuento',
  `cuotas` int(11) NOT NULL COMMENT 'Cuotas acordado para pago de saldo restante',
  `descripcion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Descripcion o detalles sobre el convenio',
  `estado` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Estado del convenio (Pendiente o Cancelado)',
  `id_cargo` int(11) NOT NULL COMMENT 'Identificador del cargo del cual se hara el convenio',
  PRIMARY KEY (`id_convenio`, `id_vecino`) USING BTREE,
  INDEX `fk_convenio_vecino`(`id_vecino`) USING BTREE,
  CONSTRAINT `fk_convenio_vecino` FOREIGN KEY (`id_vecino`) REFERENCES `vecino` (`id_vecino`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 209 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Tabla de todos los convenios realizados con los convenios que presentan saldos en mora o que lo requieren por algun problema economico.' ROW_FORMAT = DYNAMIC;

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
INSERT INTO `convenio` VALUES (46, 21, '2021-01-08', '2021-03-15', 500.00, 10.00, 0.05, 1000.00, 1, 'Hola Mundo', 'Pendiente', 1);
INSERT INTO `convenio` VALUES (47, 22, '2021-01-09', '2021-03-16', 600.00, 20.00, 0.05, 1500.00, 2, 'Hola Mundo', 'Cancelado', 2);
INSERT INTO `convenio` VALUES (48, 23, '2021-01-10', '2021-03-17', 700.00, 30.00, 0.05, 2000.00, 3, 'Hola Mundo', 'Pendiente', 3);
INSERT INTO `convenio` VALUES (49, 24, '2021-01-11', '2021-03-18', 800.00, 40.00, 0.05, 2500.00, 4, 'Hola Mundo', 'Cancelado', 4);
INSERT INTO `convenio` VALUES (50, 25, '2021-01-12', '2021-03-19', 900.00, 50.00, 0.05, 3000.00, 5, 'Hola Mundo', 'Pendiente', 5);
INSERT INTO `convenio` VALUES (51, 26, '2021-01-13', '2021-03-20', 1000.00, 60.00, 0.05, 3500.00, 6, 'Hola Mundo', 'Cancelado', 6);
INSERT INTO `convenio` VALUES (52, 27, '2021-01-14', '2021-03-21', 1100.00, 70.00, 0.05, 4000.00, 7, 'Hola Mundo', 'Pendiente', 7);
INSERT INTO `convenio` VALUES (53, 28, '2021-01-15', '2021-03-22', 1200.00, 80.00, 0.05, 4500.00, 8, 'Hola Mundo', 'Cancelado', 8);
INSERT INTO `convenio` VALUES (54, 29, '2021-01-16', '2021-03-23', 1300.00, 90.00, 0.05, 5000.00, 9, 'Hola Mundo', 'Pendiente', 9);
INSERT INTO `convenio` VALUES (55, 30, '2021-01-17', '2021-03-24', 1400.00, 100.00, 0.05, 5500.00, 10, 'Hola Mundo', 'Cancelado', 10);
INSERT INTO `convenio` VALUES (56, 31, '2021-01-18', '2021-03-25', 1500.00, 110.00, 0.05, 6000.00, 11, 'Hola Mundo', 'Pendiente', 1);
INSERT INTO `convenio` VALUES (57, 32, '2021-01-19', '2021-03-26', 1600.00, 120.00, 0.05, 6500.00, 12, 'Hola Mundo', 'Cancelado', 2);
INSERT INTO `convenio` VALUES (58, 33, '2021-01-20', '2021-03-27', 1700.00, 130.00, 0.05, 7000.00, 13, 'Hola Mundo', 'Pendiente', 3);
INSERT INTO `convenio` VALUES (59, 34, '2021-01-21', '2021-03-28', 1800.00, 140.00, 0.05, 7500.00, 14, 'Hola Mundo', 'Cancelado', 4);
INSERT INTO `convenio` VALUES (60, 35, '2021-01-22', '2021-03-29', 1900.00, 150.00, 0.05, 8000.00, 15, 'Hola Mundo', 'Pendiente', 5);
INSERT INTO `convenio` VALUES (61, 36, '2021-01-23', '2021-03-30', 2000.00, 160.00, 0.05, 8500.00, 16, 'Hola Mundo', 'Cancelado', 6);
INSERT INTO `convenio` VALUES (62, 37, '2021-01-24', '2021-03-31', 2100.00, 170.00, 0.05, 9000.00, 17, 'Hola Mundo', 'Pendiente', 7);
INSERT INTO `convenio` VALUES (63, 38, '2021-02-01', '2021-05-31', 2200.00, 180.00, 0.05, 9500.00, 18, 'Hola Mundo', 'Cancelado', 8);
INSERT INTO `convenio` VALUES (64, 39, '2021-02-01', '2021-05-31', 2300.00, 190.00, 0.05, 10000.00, 19, 'Hola Mundo', 'Pendiente', 9);
INSERT INTO `convenio` VALUES (65, 21, '2021-02-01', '2021-05-31', 2400.00, 200.00, 0.05, 10500.00, 20, 'Hola Mundo', 'Cancelado', 10);
INSERT INTO `convenio` VALUES (66, 22, '2021-02-01', '2021-05-31', 2500.00, 210.00, 0.05, 11000.00, 21, 'Hola Mundo', 'Pendiente', 1);
INSERT INTO `convenio` VALUES (67, 23, '2021-02-01', '2021-05-31', 2600.00, 220.00, 0.05, 11500.00, 22, 'Hola Mundo', 'Cancelado', 2);
INSERT INTO `convenio` VALUES (68, 24, '2021-02-01', '2021-05-31', 2700.00, 230.00, 0.05, 12000.00, 23, 'Hola Mundo', 'Pendiente', 3);
INSERT INTO `convenio` VALUES (69, 25, '2021-02-01', '2021-05-31', 2800.00, 240.00, 0.05, 12500.00, 24, 'Hola Mundo', 'Cancelado', 4);
INSERT INTO `convenio` VALUES (70, 26, '2021-02-01', '2021-05-31', 2900.00, 250.00, 0.05, 13000.00, 25, 'Hola Mundo', 'Pendiente', 5);
INSERT INTO `convenio` VALUES (71, 27, '2021-02-01', '2021-05-31', 3000.00, 260.00, 0.05, 13500.00, 1, 'Hola Mundo', 'Cancelado', 6);
INSERT INTO `convenio` VALUES (72, 28, '2021-03-01', '2021-04-15', 3100.00, 270.00, 0.05, 14000.00, 2, 'Hola Mundo', 'Pendiente', 7);
INSERT INTO `convenio` VALUES (73, 29, '2021-03-01', '2021-04-15', 3200.00, 280.00, 0.05, 14500.00, 3, 'Hola Mundo', 'Cancelado', 8);
INSERT INTO `convenio` VALUES (74, 30, '2021-03-01', '2021-04-15', 3300.00, 290.00, 0.05, 15000.00, 4, 'Hola Mundo', 'Pendiente', 9);
INSERT INTO `convenio` VALUES (75, 31, '2021-03-01', '2021-04-15', 3400.00, 300.00, 0.05, 15500.00, 5, 'Hola Mundo', 'Cancelado', 10);
INSERT INTO `convenio` VALUES (76, 32, '2021-03-01', '2021-04-15', 3500.00, 310.00, 0.05, 16000.00, 6, 'Hola Mundo', 'Pendiente', 1);
INSERT INTO `convenio` VALUES (77, 33, '2021-04-02', '2021-05-16', 3600.00, 320.00, 0.05, 16500.00, 7, 'Hola Mundo', 'Cancelado', 2);
INSERT INTO `convenio` VALUES (78, 34, '2021-04-03', '2021-05-17', 3700.00, 330.00, 0.05, 17000.00, 8, 'Hola Mundo', 'Pendiente', 3);
INSERT INTO `convenio` VALUES (79, 35, '2021-04-04', '2021-05-18', 3800.00, 340.00, 0.05, 17500.00, 9, 'Hola Mundo', 'Cancelado', 4);
INSERT INTO `convenio` VALUES (80, 36, '2021-04-05', '2021-05-19', 3900.00, 350.00, 0.05, 18000.00, 10, 'Hola Mundo', 'Pendiente', 5);
INSERT INTO `convenio` VALUES (81, 37, '2021-04-06', '2021-05-20', 4000.00, 360.00, 0.05, 18500.00, 11, 'Hola Mundo', 'Cancelado', 6);
INSERT INTO `convenio` VALUES (82, 38, '2021-05-06', '2021-07-20', 4100.00, 370.00, 0.05, 19000.00, 12, 'Hola Mundo', 'Pendiente', 7);
INSERT INTO `convenio` VALUES (83, 39, '2021-05-07', '2021-07-21', 4200.00, 380.00, 0.05, 19500.00, 13, 'Hola Mundo', 'Cancelado', 8);
INSERT INTO `convenio` VALUES (84, 21, '2021-05-08', '2021-07-22', 4300.00, 390.00, 0.05, 20000.00, 14, 'Hola Mundo', 'Pendiente', 9);
INSERT INTO `convenio` VALUES (85, 22, '2021-05-09', '2021-07-23', 4400.00, 400.00, 0.05, 20500.00, 15, 'Hola Mundo', 'Cancelado', 10);
INSERT INTO `convenio` VALUES (86, 23, '2021-05-10', '2021-07-24', 4500.00, 410.00, 0.05, 21000.00, 16, 'Hola Mundo', 'Pendiente', 1);
INSERT INTO `convenio` VALUES (87, 24, '2021-05-11', '2021-07-25', 4600.00, 420.00, 0.05, 21500.00, 17, 'Hola Mundo', 'Cancelado', 2);
INSERT INTO `convenio` VALUES (88, 25, '2021-06-11', '2021-08-10', 4700.00, 430.00, 0.05, 22000.00, 18, 'Hola Mundo', 'Pendiente', 3);
INSERT INTO `convenio` VALUES (89, 26, '2021-06-12', '2021-08-11', 4800.00, 440.00, 0.05, 22500.00, 19, 'Hola Mundo', 'Cancelado', 4);
INSERT INTO `convenio` VALUES (90, 27, '2021-06-13', '2021-08-12', 4900.00, 450.00, 0.05, 23000.00, 20, 'Hola Mundo', 'Pendiente', 5);
INSERT INTO `convenio` VALUES (91, 28, '2021-06-14', '2021-08-13', 5000.00, 460.00, 0.05, 23500.00, 21, 'Hola Mundo', 'Cancelado', 6);
INSERT INTO `convenio` VALUES (92, 29, '2021-06-15', '2021-08-14', 5100.00, 470.00, 0.05, 24000.00, 22, 'Hola Mundo', 'Pendiente', 7);
INSERT INTO `convenio` VALUES (93, 30, '2021-06-16', '2021-08-15', 5200.00, 480.00, 0.05, 24500.00, 23, 'Hola Mundo', 'Cancelado', 8);
INSERT INTO `convenio` VALUES (94, 31, '2021-06-17', '2021-08-16', 5300.00, 490.00, 0.05, 25000.00, 24, 'Hola Mundo', 'Pendiente', 9);
INSERT INTO `convenio` VALUES (95, 32, '2021-06-18', '2021-08-17', 5400.00, 500.00, 0.05, 25500.00, 25, 'Hola Mundo', 'Cancelado', 10);
INSERT INTO `convenio` VALUES (96, 33, '2021-06-19', '2021-08-18', 5500.00, 510.00, 0.05, 26000.00, 26, 'Hola Mundo', 'Pendiente', 1);
INSERT INTO `convenio` VALUES (97, 34, '2021-06-20', '2021-08-19', 5600.00, 520.00, 0.05, 26500.00, 27, 'Hola Mundo', 'Cancelado', 2);
INSERT INTO `convenio` VALUES (98, 35, '2021-06-21', '2021-08-20', 5700.00, 530.00, 0.05, 27000.00, 28, 'Hola Mundo', 'Pendiente', 3);
INSERT INTO `convenio` VALUES (99, 36, '2021-06-22', '2021-08-21', 5800.00, 540.00, 0.05, 27500.00, 29, 'Hola Mundo', 'Cancelado', 4);
INSERT INTO `convenio` VALUES (100, 37, '2021-06-23', '2021-08-22', 5900.00, 550.00, 0.05, 28000.00, 30, 'Hola Mundo', 'Pendiente', 5);
INSERT INTO `convenio` VALUES (101, 38, '2021-06-24', '2021-08-23', 6000.00, 560.00, 0.05, 28500.00, 31, 'Hola Mundo', 'Cancelado', 6);
INSERT INTO `convenio` VALUES (102, 39, '2021-07-01', '2021-08-23', 6100.00, 570.00, 0.05, 29000.00, 32, 'Hola Mundo', 'Pendiente', 7);
INSERT INTO `convenio` VALUES (103, 21, '2021-07-02', '2021-08-24', 6200.00, 580.00, 0.05, 29500.00, 33, 'Hola Mundo', 'Cancelado', 8);
INSERT INTO `convenio` VALUES (104, 22, '2021-07-03', '2021-08-25', 6300.00, 590.00, 0.05, 30000.00, 34, 'Hola Mundo', 'Pendiente', 9);
INSERT INTO `convenio` VALUES (105, 23, '2021-07-04', '2021-08-26', 6400.00, 600.00, 0.05, 30500.00, 35, 'Hola Mundo', 'Cancelado', 10);
INSERT INTO `convenio` VALUES (106, 24, '2021-07-05', '2021-08-27', 6500.00, 610.00, 0.05, 31000.00, 3, 'Hola Mundo', 'Pendiente', 1);
INSERT INTO `convenio` VALUES (107, 25, '2021-07-06', '2021-08-28', 6600.00, 620.00, 0.05, 31500.00, 3, 'Hola Mundo', 'Cancelado', 2);
INSERT INTO `convenio` VALUES (108, 26, '2021-07-07', '2021-08-29', 6700.00, 630.00, 0.05, 32000.00, 3, 'Hola Mundo', 'Pendiente', 3);
INSERT INTO `convenio` VALUES (109, 27, '2021-07-08', '2021-08-30', 6800.00, 640.00, 0.05, 32500.00, 3, 'Hola Mundo', 'Cancelado', 4);
INSERT INTO `convenio` VALUES (110, 28, '2021-07-09', '2021-08-31', 6900.00, 650.00, 0.05, 33000.00, 3, 'Hola Mundo', 'Pendiente', 5);
INSERT INTO `convenio` VALUES (111, 29, '2021-07-10', '2021-09-01', 7000.00, 660.00, 0.05, 33500.00, 3, 'Hola Mundo', 'Cancelado', 6);
INSERT INTO `convenio` VALUES (112, 30, '2021-07-11', '2021-09-02', 7100.00, 670.00, 0.05, 34000.00, 3, 'Hola Mundo', 'Pendiente', 7);
INSERT INTO `convenio` VALUES (113, 31, '2021-07-12', '2021-09-03', 7200.00, 680.00, 0.05, 34500.00, 3, 'Hola Mundo', 'Cancelado', 8);
INSERT INTO `convenio` VALUES (114, 32, '2021-07-13', '2021-09-04', 7300.00, 690.00, 0.05, 35000.00, 3, 'Hola Mundo', 'Pendiente', 9);
INSERT INTO `convenio` VALUES (115, 33, '2021-07-14', '2021-09-05', 7400.00, 700.00, 0.05, 35500.00, 3, 'Hola Mundo', 'Cancelado', 10);
INSERT INTO `convenio` VALUES (116, 34, '2021-08-14', '2021-09-05', 7500.00, 710.00, 0.05, 36000.00, 3, 'Hola Mundo', 'Pendiente', 1);
INSERT INTO `convenio` VALUES (117, 35, '2021-08-15', '2021-09-06', 7600.00, 720.00, 0.05, 36500.00, 3, 'Hola Mundo', 'Cancelado', 2);
INSERT INTO `convenio` VALUES (118, 36, '2021-08-16', '2021-09-07', 7700.00, 730.00, 0.05, 37000.00, 3, 'Hola Mundo', 'Pendiente', 3);
INSERT INTO `convenio` VALUES (119, 37, '2021-08-17', '2021-09-08', 7800.00, 740.00, 0.05, 37500.00, 3, 'Hola Mundo', 'Cancelado', 4);
INSERT INTO `convenio` VALUES (120, 38, '2021-08-18', '2021-09-09', 7900.00, 750.00, 0.05, 38000.00, 3, 'Hola Mundo', 'Pendiente', 5);
INSERT INTO `convenio` VALUES (121, 39, '2021-08-19', '2021-09-10', 8000.00, 760.00, 0.05, 38500.00, 3, 'Hola Mundo', 'Cancelado', 6);
INSERT INTO `convenio` VALUES (122, 21, '2021-08-20', '2021-09-11', 8100.00, 770.00, 0.05, 39000.00, 3, 'Hola Mundo', 'Pendiente', 7);
INSERT INTO `convenio` VALUES (123, 22, '2021-08-21', '2021-09-12', 8200.00, 780.00, 0.05, 39500.00, 3, 'Hola Mundo', 'Cancelado', 8);
INSERT INTO `convenio` VALUES (124, 23, '2021-08-22', '2021-09-13', 8300.00, 790.00, 0.05, 40000.00, 3, 'Hola Mundo', 'Pendiente', 9);
INSERT INTO `convenio` VALUES (125, 24, '2021-08-23', '2021-09-14', 8400.00, 800.00, 0.05, 40500.00, 3, 'Hola Mundo', 'Cancelado', 10);
INSERT INTO `convenio` VALUES (126, 25, '2021-08-24', '2021-09-15', 8500.00, 810.00, 0.05, 41000.00, 3, 'Hola Mundo', 'Pendiente', 1);
INSERT INTO `convenio` VALUES (127, 26, '2021-08-25', '2021-09-16', 8600.00, 820.00, 0.05, 41500.00, 3, 'Hola Mundo', 'Cancelado', 2);
INSERT INTO `convenio` VALUES (128, 27, '2021-08-26', '2021-09-17', 8700.00, 830.00, 0.05, 42000.00, 3, 'Hola Mundo', 'Pendiente', 3);
INSERT INTO `convenio` VALUES (129, 28, '2021-08-27', '2021-09-18', 8800.00, 840.00, 0.05, 42500.00, 3, 'Hola Mundo', 'Cancelado', 4);
INSERT INTO `convenio` VALUES (130, 29, '2021-08-28', '2021-09-19', 8900.00, 850.00, 0.05, 43000.00, 3, 'Hola Mundo', 'Pendiente', 5);
INSERT INTO `convenio` VALUES (131, 30, '2021-08-29', '2021-09-20', 9000.00, 860.00, 0.05, 43500.00, 3, 'Hola Mundo', 'Cancelado', 6);
INSERT INTO `convenio` VALUES (132, 31, '2021-08-30', '2021-09-21', 9100.00, 870.00, 0.05, 44000.00, 3, 'Hola Mundo', 'Pendiente', 7);
INSERT INTO `convenio` VALUES (133, 32, '2021-08-31', '2021-09-22', 9200.00, 880.00, 0.05, 44500.00, 3, 'Hola Mundo', 'Cancelado', 8);
INSERT INTO `convenio` VALUES (134, 33, '2021-09-01', '2021-09-23', 9300.00, 890.00, 0.05, 45000.00, 3, 'Hola Mundo', 'Pendiente', 9);
INSERT INTO `convenio` VALUES (135, 34, '2021-09-02', '2021-09-24', 9400.00, 900.00, 0.05, 45500.00, 3, 'Hola Mundo', 'Cancelado', 10);
INSERT INTO `convenio` VALUES (136, 35, '2021-09-03', '2021-09-25', 9500.00, 910.00, 0.05, 46000.00, 3, 'Hola Mundo', 'Pendiente', 1);
INSERT INTO `convenio` VALUES (137, 36, '2021-09-04', '2021-09-26', 9600.00, 920.00, 0.05, 46500.00, 3, 'Hola Mundo', 'Cancelado', 2);
INSERT INTO `convenio` VALUES (138, 37, '2021-09-05', '2021-09-27', 9700.00, 930.00, 0.05, 47000.00, 3, 'Hola Mundo', 'Pendiente', 3);
INSERT INTO `convenio` VALUES (139, 38, '2021-09-06', '2021-09-28', 9800.00, 940.00, 0.05, 47500.00, 3, 'Hola Mundo', 'Cancelado', 4);
INSERT INTO `convenio` VALUES (140, 39, '2021-09-07', '2021-09-29', 9900.00, 950.00, 0.05, 48000.00, 3, 'Hola Mundo', 'Pendiente', 5);
INSERT INTO `convenio` VALUES (141, 21, '2021-09-08', '2021-09-30', 10000.00, 960.00, 0.05, 48500.00, 3, 'Hola Mundo', 'Cancelado', 6);
INSERT INTO `convenio` VALUES (142, 22, '2021-09-09', '2021-10-01', 10100.00, 970.00, 0.05, 49000.00, 3, 'Hola Mundo', 'Pendiente', 7);
INSERT INTO `convenio` VALUES (143, 23, '2021-09-10', '2021-10-02', 10200.00, 980.00, 0.05, 49500.00, 3, 'Hola Mundo', 'Cancelado', 8);
INSERT INTO `convenio` VALUES (144, 24, '2021-09-11', '2021-10-03', 10300.00, 990.00, 0.05, 50000.00, 3, 'Hola Mundo', 'Pendiente', 9);
INSERT INTO `convenio` VALUES (145, 25, '2021-09-12', '2021-10-04', 10400.00, 1000.00, 0.05, 50500.00, 3, 'Hola Mundo', 'Cancelado', 10);
INSERT INTO `convenio` VALUES (146, 26, '2021-09-13', '2021-10-05', 10500.00, 1010.00, 0.05, 51000.00, 3, 'Hola Mundo', 'Pendiente', 1);
INSERT INTO `convenio` VALUES (147, 27, '2021-09-14', '2021-10-06', 10600.00, 1020.00, 0.05, 51500.00, 3, 'Hola Mundo', 'Cancelado', 2);
INSERT INTO `convenio` VALUES (148, 28, '2021-09-15', '2021-10-07', 10700.00, 1030.00, 0.05, 52000.00, 3, 'Hola Mundo', 'Pendiente', 3);
INSERT INTO `convenio` VALUES (149, 29, '2021-09-16', '2021-10-08', 10800.00, 1040.00, 0.05, 52500.00, 3, 'Hola Mundo', 'Cancelado', 4);
INSERT INTO `convenio` VALUES (150, 30, '2021-09-17', '2021-10-09', 10900.00, 1050.00, 0.05, 53000.00, 3, 'Hola Mundo', 'Pendiente', 5);
INSERT INTO `convenio` VALUES (151, 31, '2021-09-18', '2021-10-10', 11000.00, 1060.00, 0.05, 53500.00, 3, 'Hola Mundo', 'Cancelado', 6);
INSERT INTO `convenio` VALUES (152, 32, '2021-09-19', '2021-10-11', 11100.00, 1070.00, 0.05, 54000.00, 3, 'Hola Mundo', 'Pendiente', 7);
INSERT INTO `convenio` VALUES (153, 33, '2021-09-20', '2021-10-12', 11200.00, 1080.00, 0.05, 54500.00, 3, 'Hola Mundo', 'Cancelado', 8);
INSERT INTO `convenio` VALUES (154, 34, '2021-09-21', '2021-10-13', 11300.00, 1090.00, 0.05, 55000.00, 3, 'Hola Mundo', 'Pendiente', 9);
INSERT INTO `convenio` VALUES (155, 35, '2021-09-22', '2021-10-14', 11400.00, 1100.00, 0.05, 55500.00, 3, 'Hola Mundo', 'Cancelado', 10);
INSERT INTO `convenio` VALUES (156, 36, '2021-09-23', '2021-10-15', 11500.00, 1110.00, 0.05, 56000.00, 3, 'Hola Mundo', 'Pendiente', 1);
INSERT INTO `convenio` VALUES (157, 37, '2021-09-24', '2021-10-16', 11600.00, 1120.00, 0.05, 56500.00, 3, 'Hola Mundo', 'Cancelado', 2);
INSERT INTO `convenio` VALUES (158, 38, '2021-09-25', '2021-10-17', 11700.00, 1130.00, 0.05, 57000.00, 3, 'Hola Mundo', 'Pendiente', 3);
INSERT INTO `convenio` VALUES (159, 39, '2021-09-26', '2021-10-18', 11800.00, 1140.00, 0.05, 57500.00, 3, 'Hola Mundo', 'Cancelado', 4);
INSERT INTO `convenio` VALUES (160, 21, '2021-09-27', '2021-10-01', 11900.00, 1150.00, 0.05, 58000.00, 3, 'Hola Mundo', 'Pendiente', 5);
INSERT INTO `convenio` VALUES (161, 22, '2021-09-28', '2021-10-02', 12000.00, 1160.00, 0.05, 58500.00, 3, 'Hola Mundo', 'Cancelado', 6);
INSERT INTO `convenio` VALUES (162, 23, '2021-09-29', '2021-10-03', 12100.00, 1170.00, 0.05, 59000.00, 3, 'Hola Mundo', 'Pendiente', 7);
INSERT INTO `convenio` VALUES (163, 24, '2021-09-30', '2021-10-04', 12200.00, 1180.00, 0.05, 59500.00, 3, 'Hola Mundo', 'Cancelado', 8);
INSERT INTO `convenio` VALUES (164, 25, '2021-10-01', '2021-10-05', 12300.00, 1190.00, 0.05, 60000.00, 3, 'Hola Mundo', 'Pendiente', 9);
INSERT INTO `convenio` VALUES (165, 26, '2021-10-02', '2021-10-06', 12400.00, 1200.00, 0.05, 60500.00, 3, 'Hola Mundo', 'Cancelado', 10);
INSERT INTO `convenio` VALUES (166, 27, '2021-10-03', '2021-10-07', 12500.00, 1210.00, 0.05, 61000.00, 3, 'Hola Mundo', 'Pendiente', 1);
INSERT INTO `convenio` VALUES (167, 28, '2021-10-04', '2021-10-08', 12600.00, 1220.00, 0.05, 61500.00, 3, 'Hola Mundo', 'Cancelado', 2);
INSERT INTO `convenio` VALUES (168, 29, '2021-10-05', '2021-10-09', 12700.00, 1230.00, 0.05, 62000.00, 3, 'Hola Mundo', 'Pendiente', 3);
INSERT INTO `convenio` VALUES (169, 30, '2021-10-06', '2021-10-10', 12800.00, 1240.00, 0.05, 62500.00, 3, 'Hola Mundo', 'Cancelado', 4);
INSERT INTO `convenio` VALUES (170, 31, '2021-10-07', '2021-10-11', 12900.00, 1250.00, 0.05, 63000.00, 3, 'Hola Mundo', 'Pendiente', 5);
INSERT INTO `convenio` VALUES (171, 32, '2021-10-08', '2021-10-12', 13000.00, 1260.00, 0.05, 63500.00, 3, 'Hola Mundo', 'Cancelado', 6);
INSERT INTO `convenio` VALUES (172, 33, '2021-10-09', '2021-10-13', 13100.00, 1270.00, 0.05, 64000.00, 3, 'Hola Mundo', 'Pendiente', 7);
INSERT INTO `convenio` VALUES (173, 34, '2021-10-10', '2021-10-14', 13200.00, 1280.00, 0.05, 64500.00, 3, 'Hola Mundo', 'Cancelado', 8);
INSERT INTO `convenio` VALUES (174, 35, '2021-10-11', '2021-10-15', 13300.00, 1290.00, 0.05, 65000.00, 3, 'Hola Mundo', 'Pendiente', 9);
INSERT INTO `convenio` VALUES (175, 36, '2021-10-12', '2021-10-16', 13400.00, 1300.00, 0.05, 65500.00, 3, 'Hola Mundo', 'Cancelado', 10);
INSERT INTO `convenio` VALUES (176, 37, '2021-10-13', '2021-10-17', 13500.00, 1310.00, 0.05, 66000.00, 3, 'Hola Mundo', 'Pendiente', 1);
INSERT INTO `convenio` VALUES (177, 38, '2021-10-14', '2021-10-18', 13600.00, 1320.00, 0.05, 66500.00, 3, 'Hola Mundo', 'Cancelado', 2);
INSERT INTO `convenio` VALUES (178, 39, '2021-10-15', '2021-10-19', 13700.00, 1330.00, 0.05, 67000.00, 3, 'Hola Mundo', 'Pendiente', 3);
INSERT INTO `convenio` VALUES (179, 21, '2021-10-16', '2021-10-20', 13800.00, 1340.00, 0.05, 67500.00, 3, 'Hola Mundo', 'Cancelado', 4);
INSERT INTO `convenio` VALUES (180, 22, '2021-10-17', '2021-10-21', 13900.00, 1350.00, 0.05, 68000.00, 3, 'Hola Mundo', 'Pendiente', 5);
INSERT INTO `convenio` VALUES (181, 23, '2021-10-18', '2021-10-22', 14000.00, 1360.00, 0.05, 68500.00, 3, 'Hola Mundo', 'Cancelado', 6);
INSERT INTO `convenio` VALUES (182, 24, '2021-10-19', '2021-10-23', 14100.00, 1370.00, 0.05, 69000.00, 3, 'Hola Mundo', 'Pendiente', 7);
INSERT INTO `convenio` VALUES (183, 25, '2021-10-20', '2021-10-24', 14200.00, 1380.00, 0.05, 69500.00, 3, 'Hola Mundo', 'Cancelado', 8);
INSERT INTO `convenio` VALUES (184, 26, '2021-10-21', '2021-10-25', 14300.00, 1390.00, 0.05, 70000.00, 3, 'Hola Mundo', 'Pendiente', 9);
INSERT INTO `convenio` VALUES (185, 27, '2021-10-22', '2021-10-26', 14400.00, 1400.00, 0.05, 70500.00, 3, 'Hola Mundo', 'Cancelado', 10);
INSERT INTO `convenio` VALUES (186, 28, '2021-10-23', '2021-10-27', 14500.00, 1410.00, 0.05, 71000.00, 3, 'Hola Mundo', 'Pendiente', 1);
INSERT INTO `convenio` VALUES (187, 29, '2021-10-24', '2021-10-28', 14600.00, 1420.00, 0.05, 71500.00, 3, 'Hola Mundo', 'Cancelado', 2);
INSERT INTO `convenio` VALUES (188, 30, '2021-10-25', '2021-10-29', 14700.00, 1430.00, 0.05, 72000.00, 3, 'Hola Mundo', 'Pendiente', 3);
INSERT INTO `convenio` VALUES (189, 31, '2021-10-26', '2021-10-30', 14800.00, 1440.00, 0.05, 72500.00, 3, 'Hola Mundo', 'Cancelado', 4);
INSERT INTO `convenio` VALUES (190, 32, '2021-10-27', '2021-10-31', 14900.00, 1450.00, 0.05, 73000.00, 3, 'Hola Mundo', 'Pendiente', 5);
INSERT INTO `convenio` VALUES (191, 33, '2021-10-28', '2021-11-01', 15000.00, 1460.00, 0.05, 73500.00, 3, 'Hola Mundo', 'Cancelado', 6);
INSERT INTO `convenio` VALUES (192, 34, '2021-10-29', '2021-11-02', 15100.00, 1470.00, 0.05, 74000.00, 3, 'Hola Mundo', 'Pendiente', 7);
INSERT INTO `convenio` VALUES (193, 35, '2021-10-30', '2021-11-03', 15200.00, 1480.00, 0.05, 74500.00, 3, 'Hola Mundo', 'Cancelado', 8);
INSERT INTO `convenio` VALUES (194, 36, '2021-10-31', '2021-11-04', 15300.00, 1490.00, 0.05, 75000.00, 3, 'Hola Mundo', 'Pendiente', 9);
INSERT INTO `convenio` VALUES (195, 37, '2021-11-01', '2021-11-05', 15400.00, 1500.00, 0.05, 75500.00, 3, 'Hola Mundo', 'Cancelado', 10);
INSERT INTO `convenio` VALUES (196, 38, '2021-11-02', '2021-11-06', 15500.00, 1510.00, 0.05, 76000.00, 3, 'Hola Mundo', 'Pendiente', 1);
INSERT INTO `convenio` VALUES (197, 39, '2021-11-03', '2021-11-07', 15600.00, 1520.00, 0.05, 76500.00, 3, 'Hola Mundo', 'Cancelado', 2);
INSERT INTO `convenio` VALUES (198, 21, '2021-11-04', '2021-11-08', 15700.00, 1530.00, 0.05, 77000.00, 3, 'Hola Mundo', 'Pendiente', 3);
INSERT INTO `convenio` VALUES (199, 22, '2021-11-05', '2021-11-09', 15800.00, 1540.00, 0.05, 77500.00, 3, 'Hola Mundo', 'Cancelado', 4);
INSERT INTO `convenio` VALUES (200, 23, '2021-11-06', '2021-11-10', 15900.00, 1550.00, 0.05, 78000.00, 3, 'Hola Mundo', 'Pendiente', 5);
INSERT INTO `convenio` VALUES (201, 24, '2021-11-07', '2021-11-11', 16000.00, 1560.00, 0.05, 78500.00, 3, 'Hola Mundo', 'Cancelado', 6);
INSERT INTO `convenio` VALUES (202, 25, '2021-11-08', '2021-11-12', 16100.00, 1570.00, 0.05, 79000.00, 3, 'Hola Mundo', 'Pendiente', 7);
INSERT INTO `convenio` VALUES (203, 26, '2021-11-09', '2021-11-13', 16200.00, 1580.00, 0.05, 79500.00, 3, 'Hola Mundo', 'Cancelado', 8);
INSERT INTO `convenio` VALUES (204, 27, '2021-11-10', '2021-11-14', 16300.00, 1590.00, 0.05, 80000.00, 3, 'Hola Mundo', 'Pendiente', 9);
INSERT INTO `convenio` VALUES (205, 28, '2021-11-11', '2021-11-15', 16400.00, 1600.00, 0.05, 80500.00, 3, 'Hola Mundo', 'Cancelado', 10);
INSERT INTO `convenio` VALUES (206, 29, '2021-11-12', '2021-11-16', 16500.00, 1610.00, 0.05, 81000.00, 3, 'Hola Mundo', 'Pendiente', 1);
INSERT INTO `convenio` VALUES (207, 30, '2021-11-13', '2021-11-17', 16600.00, 1620.00, 0.05, 81500.00, 3, 'Hola Mundo', 'Cancelado', 2);
INSERT INTO `convenio` VALUES (208, 31, '2021-11-14', '2021-11-18', 16700.00, 1630.00, 0.05, 82000.00, 3, 'Hola Mundo', 'Pendiente', 3);
INSERT INTO `convenio` VALUES (208, 32, '2021-11-15', '2021-11-19', 16800.00, 1640.00, 0.05, 82500.00, 3, 'Hola Mundo', 'Cancelado', 4);
INSERT INTO `convenio` VALUES (208, 33, '2021-11-16', '2021-11-20', 16900.00, 1650.00, 0.05, 83000.00, 3, 'Hola Mundo', 'Pendiente', 5);
INSERT INTO `convenio` VALUES (208, 34, '2021-11-17', '2021-11-21', 17000.00, 1660.00, 0.05, 83500.00, 3, 'Hola Mundo', 'Cancelado', 6);
INSERT INTO `convenio` VALUES (208, 35, '2021-11-18', '2021-11-22', 17100.00, 1670.00, 0.05, 84000.00, 3, 'Hola Mundo', 'Pendiente', 7);
INSERT INTO `convenio` VALUES (208, 36, '2021-11-19', '2021-11-23', 17200.00, 1680.00, 0.05, 84500.00, 3, 'Hola Mundo', 'Cancelado', 8);
INSERT INTO `convenio` VALUES (208, 37, '2021-12-20', '2022-01-20', 17300.00, 1690.00, 0.05, 85000.00, 3, 'Hola Mundo', 'Pendiente', 9);
INSERT INTO `convenio` VALUES (208, 38, '2021-12-21', '2022-01-20', 17400.00, 1700.00, 0.05, 85500.00, 3, 'Hola Mundo', 'Cancelado', 10);
INSERT INTO `convenio` VALUES (208, 39, '2021-12-22', '2022-01-20', 17500.00, 1710.00, 0.05, 86000.00, 3, 'Hola Mundo', 'Pendiente', 1);

-- ----------------------------
-- Table structure for deposito
-- ----------------------------
DROP TABLE IF EXISTS `deposito`;
CREATE TABLE `deposito`  (
  `id_deposito` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de Deposito',
  `id_vecino` int(11) NOT NULL COMMENT 'Identificador del vecino que realizo el deposito',
  `fecha` date NOT NULL COMMENT 'Fecha en que se realizo el deposito',
  `monto` decimal(11, 2) NOT NULL COMMENT 'Monto del deposito',
  `agencia_bancario` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Banco en que realizo deposito',
  `numero_referencia` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Referencia del deposito',
  `id_cargo` int(11) NULL DEFAULT NULL,
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
INSERT INTO `deposito` VALUES (18, 2, '2021-03-01', 6550.00, 'Banco Ficohsa', '666', 5, 'ACTIVO');
INSERT INTO `deposito` VALUES (19, 3, '2021-02-01', 1750.00, 'Banco Ficohsa', '1', 6, 'ACTIVO');
INSERT INTO `deposito` VALUES (20, 4, '2021-01-01', 1440.00, 'Banco Ficohsa', '1', 7, 'ACTIVO');

-- ----------------------------
-- Table structure for pago
-- ----------------------------
DROP TABLE IF EXISTS `pago`;
CREATE TABLE `pago`  (
  `id_pago` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del pago',
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
  `id_pago` int(11) NOT NULL COMMENT 'Identificador del pago',
  `id_vecino` int(11) NOT NULL COMMENT 'Idenfificador del vecino',
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
  `id_vecino` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de Vecino',
  `primer_nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Primer Nombre del vecino',
  `segundo_nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Segundo nombre del vecino',
  `primer_apellido` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Primer apellido del vecino',
  `segundo_apellido` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Segundo apellido del vecino',
  `dni` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Documento Nacional de Identificacion del vecino',
  `fecha_nacimiento` date NOT NULL COMMENT 'Campo donde se almacena la fecha de nacimiento del vecino',
  `telefono` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Telefono del vecino',
  `num_casa` int(11) NOT NULL COMMENT 'Numero de casa del vecino',
  `num_bloque` int(11) NOT NULL COMMENT 'Numero bloque donde reside el vecino',
  `cant_vehiculos` int(11) NOT NULL COMMENT 'Cantidad de vehiculos que posee el vecino',
  `usuario` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Usuario de acceso del vecino',
  `contrasenia` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Contraseña del vecino',
  `tipo_usuario` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Perfil de acceso del vecino (Administrador o Vecino)',
  `estado` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Estado del vecino (Activo / Inactivo)',
  PRIMARY KEY (`id_vecino`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 51 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Tabla que contiene los datos generales de cada uno de los vecinos asi como el usuario y perfil de acceso que cada uno tiene.' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of vecino
-- ----------------------------
INSERT INTO `vecino` VALUES (1, 'Abdiel', 'Emanuel', 'Licona', 'Garcia', '080320000101', '1998-01-01', '858585858', 5, 5, 5, 'admin', 'admin', 'ADMINISTRADOR', 'ACTIVO');
INSERT INTO `vecino` VALUES (2, 'Angelm', 'Geovani', 'Ernesto', 'Garcia', '080320000102', '1998-01-01', '858585858', 5, 5, 5, 'angel', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (3, 'Juan', 'Alcachofa', 'Saturno', 'Pluton', '080320000103', '1998-01-01', '858585858', 5, 5, 5, 'juan', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (4, 'Lionel', 'Andres', 'Messi', 'ApellidoActualizado', '09021002005', '1998-01-01', '858585858', 5, 5, 5, 'messi', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (5, 'Kimich', 'Bayern', 'Munich', 'Alvarez', '1804177700263', '1998-01-01', '06060606', 10, 9, 8, 'kimich', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (6, 'Edwin', 'Arnulfo', 'Matamoros', 'Moreira', '0205220300125', '1992-04-02', '9523-8565', 0, 4, 2, 'arnulfo', 'arnulfo', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (7, 'Josue', 'Ernesto', 'Valverde', 'Carmona', '05160050612165', '2016-12-31', '546464564545', 4, 4, 4, 'emanuel', 'admin', 'ADMINISTRADOR', 'ACTIVO');
INSERT INTO `vecino` VALUES (8, 'María', 'Jose', 'Hernandez', 'Gomez', '1212122315', '1998-01-01', '858585858', 5, 3, 2, 'María', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (9, 'Liam', 'Jose', 'Hernandez', 'Gomez', '1212412315', '1998-01-02', '858585858', 5, 3, 2, 'Liam', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (10, 'Sebastian', 'Jose', 'Hernandez', 'Gomez', '1212912315', '1998-01-03', '858585858', 5, 3, 2, 'Sebastian', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (11, 'Thiago', 'Jose', 'Hernandez', 'Gomez', '121212315', '1998-01-04', '858585858', 5, 3, 2, 'Thiago', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (12, 'Dylan', 'Jose', 'Hernandez', 'Gomez', '1212112315', '1998-01-05', '858585858', 5, 3, 2, 'Dylan', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (13, 'Mateo', 'Jose', 'Hernandez', 'Gomez', '1212122315', '1998-01-06', '858585858', 5, 3, 2, 'Mateo', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (14, 'Ian', 'Jose', 'Hernandez', 'Gomez', '1217212315', '1998-01-07', '858585858', 5, 3, 2, 'Ian', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (15, 'Lucas', 'Jose', 'Hernandez', 'Gomez', '1421212315', '1998-01-08', '858585858', 5, 3, 2, 'Lucas', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (16, 'Noah', 'Jose', 'Hernandez', 'Gomez', '1291212315', '1998-01-09', '858585858', 5, 3, 2, 'Noah', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (17, 'Jayden', 'Jose', 'Hernandez', 'Gomez', '12121352315', '1998-01-10', '858585858', 5, 3, 2, 'Jayden', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (18, 'Matias', 'Jose', 'Hernandez', 'Gomez', '1212312315', '1998-01-11', '858585858', 5, 3, 2, 'Matias', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (19, 'Liam', 'Jose', 'Hernandez', 'Gomez', '12121012315', '1998-01-12', '858585858', 5, 3, 2, 'Liam', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (20, 'Noah', 'Jose', 'Hernandez', 'Gomez', '1212212315', '1998-01-13', '858585858', 5, 3, 2, 'Noah', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (21, 'Juan', 'Jose', 'Hernandez', 'Gomez', '1212122315', '1998-01-01', '858585858', 5, 3, 2, 'Juan', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (22, 'Alberto', 'Jose', 'Hernandez', 'Gomez', '1212412315', '1998-01-02', '858585858', 5, 3, 2, 'Alberto', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (23, 'David', 'Jose', 'Hernandez', 'Gomez', '1212912315', '1998-01-03', '858585858', 5, 3, 2, 'David', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (24, 'Lionel', 'Jose', 'Hernandez', 'Gomez', '121212315', '1998-01-04', '858585858', 5, 3, 2, 'Lionel', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (25, 'Robert', 'Jose', 'Hernandez', 'Gomez', '1212112315', '1998-01-05', '858585858', 5, 3, 2, 'Robert', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (26, 'Davis', 'Jose', 'Hernandez', 'Gomez', '1212122315', '1998-01-06', '858585858', 5, 3, 2, 'Davis', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (27, 'Saturno', 'Jose', 'Hernandez', 'Gomez', '1217212315', '1998-01-07', '858585858', 5, 3, 2, 'Saturno', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (28, 'Pluton', 'Jose', 'Hernandez', 'Gomez', '1421212315', '1998-01-08', '858585858', 5, 3, 2, 'Pluton', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (29, 'Luna', 'Jose', 'Hernandez', 'Gomez', '1291212315', '1998-01-09', '858585858', 5, 3, 2, 'Luna', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (30, 'Skoby', 'Jose', 'Hernandez', 'Gomez', '12121352315', '1998-01-10', '858585858', 5, 3, 2, 'Skoby', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (31, 'Batman', 'Jose', 'Hernandez', 'Gomez', '1212312315', '1998-01-11', '858585858', 5, 3, 2, 'Batman', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (32, 'Capitan', 'Jose', 'Hernandez', 'Gomez', '12121012315', '1998-01-12', '858585858', 5, 3, 2, 'Capitan', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (33, 'Otamendi', 'Jose', 'Hernandez', 'Gomez', '121999905', '1998-01-13', '858585858', 5, 3, 2, 'Otamendi', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (34, 'DiMaria', 'Jose', 'Hernandez', 'Gomez', '632598', '1998-01-14', '858585858', 5, 3, 2, 'DiMaria', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (35, 'Azpilicueta', 'Jose', 'Hernandez', 'Gomez', '68285', '1998-01-15', '858585858', 5, 3, 2, 'Azpilicueta', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (36, 'Yatra', 'Jose', 'Hernandez', 'Gomez', '73263', '1998-01-16', '858585858', 5, 3, 2, 'Yatra', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (37, 'Alcantara', 'Jose', 'Hernandez', 'Gomez', '7846', '1998-01-17', '858585858', 5, 3, 2, 'Alcantara', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (38, 'Rose', 'Jose', 'Hernandez', 'Gomez', '8323448', '1998-01-18', '858585858', 5, 3, 2, 'Rose', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (39, 'Matiu', 'Jose', 'Hernandez', 'Gomez', '882336', '1998-01-19', '858585858', 5, 3, 2, 'Matiu', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (40, 'Yana', 'Jose', 'Hernandez', 'Gomez', '93225', '1998-01-20', '858585858', 5, 3, 2, 'Yana', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (41, 'Moura', 'Jose', 'Hernandez', 'Gomez', '9822100', '1998-01-21', '858585858', 5, 3, 2, 'Moura', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (42, 'Spekter', 'Jose', 'Hernandez', 'Gomez', '10320004', '1998-01-22', '858585858', 5, 3, 2, 'Spekter', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (43, 'Janeth', 'Jose', 'Hernandez', 'Gomez', '10825257', '1998-01-23', '858585858', 5, 3, 2, 'Janeth', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (44, 'Savedra', 'Jose', 'Hernandez', 'Gomez', '11322525', '1998-01-24', '858585858', 5, 3, 2, 'Savedra', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (45, 'Liandro', 'Jose', 'Hernandez', 'Gomez', '184942', '1998-01-25', '858585858', 5, 3, 2, 'Liandro', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (46, 'Suazo', 'Jose', 'Hernandez', 'Gomez', '1231051615', '1998-01-26', '858585858', 5, 3, 2, 'Suazo', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (47, 'Antonieta', 'Jose', 'Hernandez', 'Gomez', '5646546', '1998-01-27', '858585858', 5, 3, 2, 'Antonieta', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (48, 'Liana', 'Jose', 'Hernandez', 'Gomez', '5252', '1998-01-28', '858585858', 5, 3, 2, 'Liana', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (49, 'Ortencio', 'Jose', 'Hernandez', 'Gomez', '13818857', '1998-01-29', '858585858', 5, 3, 2, 'Ortencio', 'admin', 'VECINO', 'ACTIVO');
INSERT INTO `vecino` VALUES (50, 'Messi', 'Jose', 'Hernandez', 'Gomez', '1431761099', '1998-01-30', '858585858', 5, 3, 2, 'Messi', 'admin', 'VECINO', 'ACTIVO');

-- ----------------------------
-- Table structure for visita
-- ----------------------------
DROP TABLE IF EXISTS `visita`;
CREATE TABLE `visita`  (
  `id_visita` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la visita',
  `id_vecino` int(11) NOT NULL COMMENT 'Identificador del vecino que recibe la visita',
  `fecha_visita` datetime(0) NOT NULL COMMENT 'Fecha en que realiza la visita',
  `primer_nombre_visita` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Primer nombre de la visita',
  `segundo_nombre_visita` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'Segundo nombre de la visita',
  `primer_apellido_visita` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Primer apellido de la visita',
  `segundo_apellido_visita` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'Segundo apellido de la visita',
  `dni_visita` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Documento Nacional de Identificacion de la visita',
  `status_visita` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Status de la visita (generado / escaneado)',
  PRIMARY KEY (`id_visita`, `id_vecino`) USING BTREE,
  INDEX `fk_vecino_visita`(`id_vecino`) USING BTREE,
  CONSTRAINT `visita_ibfk_1` FOREIGN KEY (`id_vecino`) REFERENCES `vecino` (`id_vecino`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 206 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = 'Tabla de Visitas que reciben los vecinos registradas a traves de codigo QR.' ROW_FORMAT = DYNAMIC;

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
INSERT INTO `visita` VALUES (96, 9, '2020-12-20 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031198', 'INGRESO');
INSERT INTO `visita` VALUES (97, 10, '2020-12-21 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031199', 'INGRESO');
INSERT INTO `visita` VALUES (98, 11, '2020-12-22 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031200', 'INGRESO');
INSERT INTO `visita` VALUES (99, 12, '2020-12-23 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031201', 'INGRESO');
INSERT INTO `visita` VALUES (100, 13, '2020-12-24 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031202', 'INGRESO');
INSERT INTO `visita` VALUES (101, 14, '2020-12-25 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031203', 'INGRESO');
INSERT INTO `visita` VALUES (102, 15, '2020-12-26 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031204', 'INGRESO');
INSERT INTO `visita` VALUES (103, 16, '2020-12-27 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031205', 'INGRESO');
INSERT INTO `visita` VALUES (104, 9, '2020-12-28 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031206', 'INGRESO');
INSERT INTO `visita` VALUES (105, 10, '2020-12-29 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031207', 'INGRESO');
INSERT INTO `visita` VALUES (106, 11, '2020-12-30 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031208', 'INGRESO');
INSERT INTO `visita` VALUES (107, 12, '2020-12-31 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031209', 'INGRESO');
INSERT INTO `visita` VALUES (108, 13, '2021-01-01 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031210', 'INGRESO');
INSERT INTO `visita` VALUES (109, 7, '2021-01-02 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031211', 'INGRESO');
INSERT INTO `visita` VALUES (110, 8, '2021-01-03 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031212', 'INGRESO');
INSERT INTO `visita` VALUES (111, 9, '2021-01-04 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031213', 'INGRESO');
INSERT INTO `visita` VALUES (112, 10, '2021-01-05 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031214', 'INGRESO');
INSERT INTO `visita` VALUES (113, 11, '2021-01-06 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031215', 'INGRESO');
INSERT INTO `visita` VALUES (114, 12, '2021-01-07 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031216', 'INGRESO');
INSERT INTO `visita` VALUES (115, 13, '2021-02-04 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031217', 'INGRESO');
INSERT INTO `visita` VALUES (116, 14, '2021-02-05 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031218', 'INGRESO');
INSERT INTO `visita` VALUES (117, 15, '2021-05-05 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031219', 'INGRESO');
INSERT INTO `visita` VALUES (118, 16, '2021-05-06 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031220', 'INGRESO');
INSERT INTO `visita` VALUES (119, 9, '2021-05-07 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031221', 'INGRESO');
INSERT INTO `visita` VALUES (120, 10, '2021-05-08 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031222', 'INGRESO');
INSERT INTO `visita` VALUES (121, 11, '2021-05-09 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031223', 'INGRESO');
INSERT INTO `visita` VALUES (122, 12, '2021-05-10 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031224', 'INGRESO');
INSERT INTO `visita` VALUES (123, 13, '2021-05-11 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031225', 'INGRESO');
INSERT INTO `visita` VALUES (124, 14, '2021-07-11 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031226', 'INGRESO');
INSERT INTO `visita` VALUES (125, 15, '2021-07-12 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031227', 'INGRESO');
INSERT INTO `visita` VALUES (126, 16, '2021-07-13 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031228', 'INGRESO');
INSERT INTO `visita` VALUES (127, 17, '2021-07-14 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031229', 'INGRESO');
INSERT INTO `visita` VALUES (128, 18, '2021-07-15 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031230', 'INGRESO');
INSERT INTO `visita` VALUES (129, 19, '2021-07-16 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031231', 'INGRESO');
INSERT INTO `visita` VALUES (130, 20, '2021-07-17 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031232', 'INGRESO');
INSERT INTO `visita` VALUES (131, 13, '2021-07-18 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031233', 'INGRESO');
INSERT INTO `visita` VALUES (132, 14, '2021-01-18 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031234', 'INGRESO');
INSERT INTO `visita` VALUES (133, 15, '2021-09-18 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031235', 'INGRESO');
INSERT INTO `visita` VALUES (134, 16, '2021-09-19 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031236', 'INGRESO');
INSERT INTO `visita` VALUES (135, 17, '2021-09-20 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031237', 'INGRESO');
INSERT INTO `visita` VALUES (136, 18, '2021-09-21 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031238', 'INGRESO');
INSERT INTO `visita` VALUES (137, 19, '2021-09-22 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031239', 'INGRESO');
INSERT INTO `visita` VALUES (138, 20, '2021-09-23 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031240', 'INGRESO');
INSERT INTO `visita` VALUES (139, 9, '2021-09-24 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031241', 'INGRESO');
INSERT INTO `visita` VALUES (140, 10, '2021-06-25 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031242', 'INGRESO');
INSERT INTO `visita` VALUES (141, 11, '2021-06-26 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031243', 'INGRESO');
INSERT INTO `visita` VALUES (142, 12, '2021-06-27 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031244', 'INGRESO');
INSERT INTO `visita` VALUES (143, 13, '2021-06-28 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031245', 'INGRESO');
INSERT INTO `visita` VALUES (144, 14, '2021-06-29 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031246', 'INGRESO');
INSERT INTO `visita` VALUES (145, 15, '2021-06-30 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031247', 'INGRESO');
INSERT INTO `visita` VALUES (146, 16, '2021-06-01 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031248', 'INGRESO');
INSERT INTO `visita` VALUES (147, 17, '2021-08-02 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031249', 'INGRESO');
INSERT INTO `visita` VALUES (148, 18, '2021-08-03 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031250', 'INGRESO');
INSERT INTO `visita` VALUES (149, 19, '2021-08-04 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031251', 'INGRESO');
INSERT INTO `visita` VALUES (150, 20, '2021-08-05 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031252', 'INGRESO');
INSERT INTO `visita` VALUES (151, 10, '2021-08-06 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031253', 'INGRESO');
INSERT INTO `visita` VALUES (152, 11, '2021-08-07 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031254', 'INGRESO');
INSERT INTO `visita` VALUES (153, 12, '2021-08-08 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031255', 'INGRESO');
INSERT INTO `visita` VALUES (154, 13, '2021-08-09 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031256', 'INGRESO');
INSERT INTO `visita` VALUES (155, 14, '2021-08-10 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031257', 'INGRESO');
INSERT INTO `visita` VALUES (156, 15, '2021-08-11 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031258', 'INGRESO');
INSERT INTO `visita` VALUES (157, 16, '2021-11-12 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031259', 'INGRESO');
INSERT INTO `visita` VALUES (158, 17, '2021-11-13 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031260', 'INGRESO');
INSERT INTO `visita` VALUES (159, 18, '2021-11-14 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031261', 'INGRESO');
INSERT INTO `visita` VALUES (160, 19, '2021-11-15 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031262', 'INGRESO');
INSERT INTO `visita` VALUES (161, 20, '2021-11-16 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031263', 'INGRESO');
INSERT INTO `visita` VALUES (162, 10, '2021-11-17 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031264', 'INGRESO');
INSERT INTO `visita` VALUES (163, 11, '2021-11-18 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031265', 'INGRESO');
INSERT INTO `visita` VALUES (164, 12, '2021-11-19 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031266', 'INGRESO');
INSERT INTO `visita` VALUES (165, 13, '2021-11-20 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031267', 'INGRESO');
INSERT INTO `visita` VALUES (166, 14, '2021-11-21 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031268', 'INGRESO');
INSERT INTO `visita` VALUES (167, 15, '2021-11-22 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031269', 'INGRESO');
INSERT INTO `visita` VALUES (168, 16, '2021-11-23 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031270', 'INGRESO');
INSERT INTO `visita` VALUES (169, 17, '2021-11-24 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031271', 'INGRESO');
INSERT INTO `visita` VALUES (170, 18, '2021-11-25 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031272', 'INGRESO');
INSERT INTO `visita` VALUES (171, 19, '2021-11-26 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031273', 'INGRESO');
INSERT INTO `visita` VALUES (172, 20, '2021-11-27 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031274', 'INGRESO');
INSERT INTO `visita` VALUES (173, 16, '2021-03-28 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031275', 'INGRESO');
INSERT INTO `visita` VALUES (174, 17, '2021-03-29 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031276', 'INGRESO');
INSERT INTO `visita` VALUES (175, 18, '2021-03-30 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031277', 'INGRESO');
INSERT INTO `visita` VALUES (176, 19, '2021-03-31 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031278', 'INGRESO');
INSERT INTO `visita` VALUES (177, 20, '2021-04-01 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031279', 'INGRESO');
INSERT INTO `visita` VALUES (178, 16, '2021-04-02 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031280', 'INGRESO');
INSERT INTO `visita` VALUES (179, 17, '2021-04-03 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031281', 'INGRESO');
INSERT INTO `visita` VALUES (180, 18, '2021-04-04 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031282', 'INGRESO');
INSERT INTO `visita` VALUES (181, 19, '2021-04-05 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031283', 'INGRESO');
INSERT INTO `visita` VALUES (182, 20, '2021-04-06 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031284', 'INGRESO');
INSERT INTO `visita` VALUES (183, 16, '2021-04-07 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031285', 'INGRESO');
INSERT INTO `visita` VALUES (184, 17, '2021-02-04 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031286', 'INGRESO');
INSERT INTO `visita` VALUES (185, 18, '2021-02-05 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031287', 'INGRESO');
INSERT INTO `visita` VALUES (186, 19, '2021-02-06 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031288', 'INGRESO');
INSERT INTO `visita` VALUES (187, 20, '2021-02-07 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031289', 'INGRESO');
INSERT INTO `visita` VALUES (188, 1, '2021-02-08 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031290', 'INGRESO');
INSERT INTO `visita` VALUES (189, 2, '2021-02-09 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031291', 'INGRESO');
INSERT INTO `visita` VALUES (190, 3, '2021-02-10 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031292', 'INGRESO');
INSERT INTO `visita` VALUES (191, 4, '2021-06-11 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031293', 'INGRESO');
INSERT INTO `visita` VALUES (192, 5, '2021-06-12 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031294', 'INGRESO');
INSERT INTO `visita` VALUES (193, 6, '2021-06-13 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031295', 'INGRESO');
INSERT INTO `visita` VALUES (194, 7, '2021-06-14 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031296', 'INGRESO');
INSERT INTO `visita` VALUES (195, 8, '2021-04-05 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031297', 'INGRESO');
INSERT INTO `visita` VALUES (196, 9, '2021-04-06 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031298', 'INGRESO');
INSERT INTO `visita` VALUES (197, 1, '2021-04-07 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031299', 'INGRESO');
INSERT INTO `visita` VALUES (198, 2, '2021-04-08 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031300', 'INGRESO');
INSERT INTO `visita` VALUES (199, 3, '2021-03-29 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031301', 'INGRESO');
INSERT INTO `visita` VALUES (200, 4, '2021-03-30 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031302', 'INGRESO');
INSERT INTO `visita` VALUES (201, 5, '2021-03-31 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031303', 'INGRESO');
INSERT INTO `visita` VALUES (202, 6, '2021-04-01 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031304', 'INGRESO');
INSERT INTO `visita` VALUES (203, 7, '2021-07-18 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031305', 'INGRESO');
INSERT INTO `visita` VALUES (204, 8, '2021-07-19 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031306', 'INGRESO');
INSERT INTO `visita` VALUES (205, 9, '2021-07-20 03:33:02', 'Gerson', 'Omar', 'Elvir', 'Canaca', '8082031307', 'INGRESO');

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
;
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
