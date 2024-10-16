/*
 Navicat Premium Data Transfer

 Source Server         : MySQL Local
 Source Server Type    : MySQL
 Source Server Version : 80300
 Source Host           : localhost:3306
 Source Schema         : registro

 Target Server Type    : MySQL
 Target Server Version : 80300
 File Encoding         : 65001

 Date: 15/10/2024 22:17:34
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for permisos
-- ----------------------------
DROP TABLE IF EXISTS `permisos`;
CREATE TABLE `permisos`  (
  `permisosId` int NOT NULL AUTO_INCREMENT,
  `usuarioId` int NOT NULL,
  `permisoNombre` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `permisoCod` int NOT NULL,
  `permisoActivo` int NOT NULL DEFAULT 1,
  PRIMARY KEY (`permisosId`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permisos
-- ----------------------------
INSERT INTO `permisos` VALUES (1, 1, 'Administrador', 1, 1);
INSERT INTO `permisos` VALUES (2, 2, 'Registrado', 2, 1);
INSERT INTO `permisos` VALUES (3, 3, 'Registrado', 2, 1);

-- ----------------------------
-- Table structure for registro
-- ----------------------------
DROP TABLE IF EXISTS `registro`;
CREATE TABLE `registro`  (
  `registroId` int NOT NULL AUTO_INCREMENT,
  `usuarioId` int NOT NULL,
  `registroNombre` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `registroActivo` int NOT NULL,
  PRIMARY KEY (`registroId`) USING BTREE,
  INDEX `idx_nombre`(`registroId`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of registro
-- ----------------------------
INSERT INTO `registro` VALUES (1, 1, 'Registro 01', 1);
INSERT INTO `registro` VALUES (2, 2, 'Registro 02', 1);

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario`  (
  `usuarioId` int NOT NULL AUTO_INCREMENT,
  `usuarioUser` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `usuarioPass` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `usuarioActive` int NOT NULL DEFAULT 1,
  PRIMARY KEY (`usuarioId`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES (1, 'srojas', 'srojas', 1);
INSERT INTO `usuario` VALUES (2, 'xbukovac', 'xbukovac', 1);
INSERT INTO `usuario` VALUES (3, 'Pablo', 'Pablo', 0);
INSERT INTO `usuario` VALUES (4, 'hsolo', 'hsolo', 0);
INSERT INTO `usuario` VALUES (5, 'srojas', 'srojas', 0);
INSERT INTO `usuario` VALUES (6, 'srojas', 'srojas', 0);
INSERT INTO `usuario` VALUES (7, 'srojas', 'srojas', 1);
INSERT INTO `usuario` VALUES (8, 'pleia', 'pleia', 1);
INSERT INTO `usuario` VALUES (9, 'srojas', 'srojas', 1);

-- ----------------------------
-- Table structure for usuariodatos
-- ----------------------------
DROP TABLE IF EXISTS `usuariodatos`;
CREATE TABLE `usuariodatos`  (
  `usuarioDatosId` int NOT NULL AUTO_INCREMENT,
  `usuarioId` int NOT NULL,
  `UsuarioDatosNombre` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `UsuarioDatosApellido` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  PRIMARY KEY (`usuarioDatosId`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuariodatos
-- ----------------------------
INSERT INTO `usuariodatos` VALUES (1, 1, 'Santiago', 'Rojas');
INSERT INTO `usuariodatos` VALUES (2, 2, 'Xavier', 'Bukovac');
INSERT INTO `usuariodatos` VALUES (3, 3, 'Pablo', 'Milanes');
INSERT INTO `usuariodatos` VALUES (4, 4, 'Han', 'Solo');
INSERT INTO `usuariodatos` VALUES (5, 5, 'Han', 'Solo');
INSERT INTO `usuariodatos` VALUES (6, 6, 'Han', 'Solo');
INSERT INTO `usuariodatos` VALUES (7, 7, 'Han', 'Solo');
INSERT INTO `usuariodatos` VALUES (8, 8, 'Princess', 'Leia');
INSERT INTO `usuariodatos` VALUES (9, 9, 'Luke', 'Skywalker');

SET FOREIGN_KEY_CHECKS = 1;
