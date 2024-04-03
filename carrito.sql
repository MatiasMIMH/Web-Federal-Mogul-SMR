/*
Navicat MySQL Data Transfer

Source Server         : 192.168.111.246__PRACTICAS
Source Server Version : 50562
Source Host           : 192.168.111.246:3306
Source Database       : carrito

Target Server Type    : MYSQL
Target Server Version : 50562
File Encoding         : 65001

Date: 2024-04-03 17:25:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for productos
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `descripcion` text,
  `precio` double(4,2) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `inventario` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of productos
-- ----------------------------
INSERT INTO `productos` VALUES ('1', 'Básica Azul', 'Pack de 5 mascarillas desechables básicas de color azul', '0.50', 'mascarillaBasAzul.png', '30000');
INSERT INTO `productos` VALUES ('2', 'Básica Blanca', 'Pack de 5 mascarillas desechables básicas de color blanco', '0.50', 'mascarillaBasBlanca.png', '30000');
INSERT INTO `productos` VALUES ('3', 'Colmillos', 'Mascarilla con dibujo de colmillos', '2.00', 'mascarillaColmillos.png', '1000');
INSERT INTO `productos` VALUES ('4', 'Conejos', 'Mascarilla con dibujos de conejos', '2.00', 'mascarillaConejos.png', '1000');
INSERT INTO `productos` VALUES ('5', 'Deporte Azul', 'Mascarilla azul para hacer deporte', '4.00', 'mascarillaDepAzul.png', '1000');
INSERT INTO `productos` VALUES ('6', 'Deporte Gris', 'Mascarilla gris para hacer deporte', '4.00', 'mascarillaDepGris.png', '1000');
INSERT INTO `productos` VALUES ('7', 'Spiderman', 'Mascarilla con dibujo de araña', '3.00', 'mascarillaSpiderman.png', '1001');
