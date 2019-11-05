/*
 Navicat Premium Data Transfer
	JAIROQLERO
 Source Server         : MariaDBLocal
 Source Server Type    : MariaDB
 Source Server Version : 100315
 Source Host           : localhost:3306
 Source Schema         : cardoffice

 Target Server Type    : MariaDB
 Target Server Version : 100315
 File Encoding         : 65001

 Date: 04/11/2019 21:24:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categoria
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria`  (
  `ID_CATEGORIA` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_CATEGORIA` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ESTADO_CATEGORIA` enum('A','I') CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'I',
  PRIMARY KEY (`ID_CATEGORIA`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Este campo registra el nombre del cliente',
  `apellido` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Este campo registra el apellido del cliente',
  `telefono` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Este campo registra el telefono del cliente',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cliente
-- ----------------------------
INSERT INTO `cliente` VALUES (3, 'Donald Remberto', 'Miranda ', NULL);
INSERT INTO `cliente` VALUES (4, 'Fernanda ', 'Perdomo', NULL);
INSERT INTO `cliente` VALUES (5, 'samuelbran', 'bran', NULL);
INSERT INTO `cliente` VALUES (6, 'jose', 'carlos', NULL);
INSERT INTO `cliente` VALUES (14, 'Jairo', 'NuÃ±ez', '123456');
INSERT INTO `cliente` VALUES (15, 'Jairo', 'NuÃ±ez', '123456');
INSERT INTO `cliente` VALUES (16, 'Jairo', 'NuÃ±ez', '123456');

-- ----------------------------
-- Table structure for comprobante
-- ----------------------------
DROP TABLE IF EXISTS `comprobante`;
CREATE TABLE `comprobante`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre del comprobante\nFactura,TICKET, CREDITO FISCAL',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for datos_auditoria
-- ----------------------------
DROP TABLE IF EXISTS `datos_auditoria`;
CREATE TABLE `datos_auditoria`  (
  `id_auditoria` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` timestamp(0) NULL DEFAULT NULL COMMENT 'Este registro guarda la fecha y hora en que se realiza la operacion\n',
  `operacion` enum('insert','delete','update','select') CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Este campo guarda el tipo de operacion que se realizo',
  `usuario_creacion` int(11) NULL DEFAULT NULL COMMENT 'El campo guarda el id del usuario de realizo la operacion\n',
  `tabla` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Este campo guarda el nombre de la tabla en que se realizo la operacion',
  PRIMARY KEY (`id_auditoria`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for devoluciones
-- ----------------------------
DROP TABLE IF EXISTS `devoluciones`;
CREATE TABLE `devoluciones`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `fecha_ingreso` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `cliente` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for empleado
-- ----------------------------
DROP TABLE IF EXISTS `empleado`;
CREATE TABLE `empleado`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Este campo guarda nombre de empleado',
  `apellido` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Este campo guarda apellido de empleado',
  `dui` varchar(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Este campo guarda el numero unico de identidad de cada empleado.',
  `telefono1` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Este campo guarda el telefono alternativo de cada empleado',
  `movil` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Este campo registra el movil de cada empleado',
  `direccion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Este campo registra direccion de cada uno de los empleados',
  `foto` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Este campo guarda la direccion de la fotografia de cada empleado\n',
  `fecha_registro` timestamp(0) NULL DEFAULT NULL COMMENT 'Este campo registrar la fecha en que cada empleado es dado de alta.',
  `codigo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Este campo registra el codigo de cada empleado',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `dui_UNIQUE`(`dui`) USING BTREE,
  UNIQUE INDEX `codigo_UNIQUE`(`codigo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of empleado
-- ----------------------------
INSERT INTO `empleado` VALUES (1, 'Carlos', 'Lopez', '', '77848912', '', '', '', '2019-09-20 21:46:13', 'LO20191');
INSERT INTO `empleado` VALUES (4, 'gerente', ' ', '01', ' ', ' ', ' ', ' ', '2019-09-23 18:35:16', ' 20198');
INSERT INTO `empleado` VALUES (5, 'empleado', ' ', '02', ' ', '', '', '', '2019-09-23 18:37:14', ' 20199');

-- ----------------------------
-- Table structure for inventario
-- ----------------------------
DROP TABLE IF EXISTS `inventario`;
CREATE TABLE `inventario`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Este campo guarda el codigo del producto',
  `stock` int(11) NULL DEFAULT NULL COMMENT 'Este campo guarda la Cantidad existente de producto.',
  `precio_venta` decimal(10, 0) NULL DEFAULT NULL COMMENT 'precio de venta',
  `fecha_registro` date NULL DEFAULT NULL COMMENT 'fecha de registro de producto',
  `id_producto` int(11) NOT NULL COMMENT 'id producto que se ingresa a inventario\n',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_inventario_producto_idx`(`id_producto`) USING BTREE,
  CONSTRAINT `fk_inventario_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for marca
-- ----------------------------
DROP TABLE IF EXISTS `marca`;
CREATE TABLE `marca`  (
  `ID_MARCA` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_MARCA` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Este campo el nombre de marca registrada',
  `ESTADO_MARCA` enum('A','I') CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'I' COMMENT 'estado de la marca\nACTIVO, INACTIVO, ELIMINADA',
  PRIMARY KEY (`ID_MARCA`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Este campo guarda el nombre de menu',
  `url` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `estado` enum('activo','inactivo','Eliminado') CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT 'inactivo' COMMENT 'estaod de opcion de menu\nactivo=visible para empleados o clientes\ninactivo = no es visible para empleado o clientes\neliminado = no es visible en el sistema',
  `icon` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (1, 'Empleado', NULL, 'inactivo', '<i class=\"fas fa-address-book\"></i>');
INSERT INTO `menu` VALUES (2, 'Productos', NULL, 'inactivo', '<i class=\"fas fa-dice-d6\"></i>');
INSERT INTO `menu` VALUES (3, 'Inventario', 'inventario.php', 'inactivo', '<i class=\"fas fa-clipboard-list\"></i>');
INSERT INTO `menu` VALUES (4, 'Ventas', NULL, 'inactivo', '<i class=\"fas fa-shopping-cart\"></i>');
INSERT INTO `menu` VALUES (5, 'Proveedores', NULL, 'inactivo', '<i class=\"fas fa-truck-loading\"></i>');
INSERT INTO `menu` VALUES (6, 'Auditoria', 'auditoria.php', 'inactivo', '<i class=\"fas fa-shield-alt\"></i>');
INSERT INTO `menu` VALUES (7, 'Devoluciones', 'devoluciones.php', 'inactivo', '<i class=\"fas fa-book\"></i>');

-- ----------------------------
-- Table structure for menu_item
-- ----------------------------
DROP TABLE IF EXISTS `menu_item`;
CREATE TABLE `menu_item`  (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `url` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `id_menu_padre` int(11) NOT NULL,
  PRIMARY KEY (`id_item`) USING BTREE,
  INDEX `fk_menu_item_menu1_idx`(`id_menu_padre`) USING BTREE,
  CONSTRAINT `fk_menu_item_menu1` FOREIGN KEY (`id_menu_padre`) REFERENCES `menu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu_item
-- ----------------------------
INSERT INTO `menu_item` VALUES (1, 'Lista Empleado', 'listaEmpleados.php', 1);
INSERT INTO `menu_item` VALUES (2, 'Nuevo Empleado', 'nuevoEmpleado.php', 1);
INSERT INTO `menu_item` VALUES (3, 'Lista Productos', 'listaProductos.php', 2);
INSERT INTO `menu_item` VALUES (4, 'Nuevo Producto', 'nuevoProducto.php', 2);
INSERT INTO `menu_item` VALUES (5, 'Ofertas', 'ofertas.php', 2);
INSERT INTO `menu_item` VALUES (6, 'Categorias', 'categorias.php', 2);
INSERT INTO `menu_item` VALUES (7, 'Marcas', 'marcas.php', 2);
INSERT INTO `menu_item` VALUES (8, 'Lista Ventas', 'listaVentas.php', 4);
INSERT INTO `menu_item` VALUES (9, 'Nueva Venta', 'nuevaVenta.php', 4);
INSERT INTO `menu_item` VALUES (10, 'Lista Proveedores', 'listaProveedores.php', 5);
INSERT INTO `menu_item` VALUES (11, 'Nuevo Proveedor', 'nuevoProveedor.php', 5);

-- ----------------------------
-- Table structure for modulo
-- ----------------------------
DROP TABLE IF EXISTS `modulo`;
CREATE TABLE `modulo`  (
  `ID_MODULO` int(10) NOT NULL AUTO_INCREMENT,
  `NOMBRE_MODULO` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `URL_MODULO` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ICONO_MODULO` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `NIVEL_MODULO` int(10) NOT NULL,
  `DEPENDENCIA_MODULO` int(10) NULL DEFAULT NULL,
  `ESTADO_MODULO` enum('A','I') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'I',
  PRIMARY KEY (`ID_MODULO`) USING BTREE,
  INDEX `ID_MODULO`(`ID_MODULO`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of modulo
-- ----------------------------
INSERT INTO `modulo` VALUES (1, 'INICIO', 'oficina', 'fas fa-warehouse', 1, NULL, 'A');
INSERT INTO `modulo` VALUES (2, 'PRODUCTO', '#', 'fas fa-truck', 1, NULL, 'A');
INSERT INTO `modulo` VALUES (3, 'ADMIN. PRODUCTOS', 'producto/producto', 'fas fa-industry', 2, 2, 'A');
INSERT INTO `modulo` VALUES (5, 'ADMIN. MARCAS', 'marca', 'fas fa-table', 2, 2, 'A');
INSERT INTO `modulo` VALUES (6, 'ADMIN. CATEGORÍAS', 'categoria', 'fas fa-list-ol', 2, 2, 'A');

-- ----------------------------
-- Table structure for modulo_reemplazo
-- ----------------------------
DROP TABLE IF EXISTS `modulo_reemplazo`;
CREATE TABLE `modulo_reemplazo`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modulo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `modulo_UNIQUE`(`modulo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of modulo_reemplazo
-- ----------------------------
INSERT INTO `modulo_reemplazo` VALUES (11, 'ajustes');
INSERT INTO `modulo_reemplazo` VALUES (9, 'auditoria');
INSERT INTO `modulo_reemplazo` VALUES (4, 'categoria');
INSERT INTO `modulo_reemplazo` VALUES (5, 'configuracion');
INSERT INTO `modulo_reemplazo` VALUES (7, 'devoluciones');
INSERT INTO `modulo_reemplazo` VALUES (6, 'empleado');
INSERT INTO `modulo_reemplazo` VALUES (3, 'marca');
INSERT INTO `modulo_reemplazo` VALUES (8, 'ofertas');
INSERT INTO `modulo_reemplazo` VALUES (1, 'producto');
INSERT INTO `modulo_reemplazo` VALUES (2, 'proveedor');
INSERT INTO `modulo_reemplazo` VALUES (10, 'publico');

-- ----------------------------
-- Table structure for ofertas
-- ----------------------------
DROP TABLE IF EXISTS `ofertas`;
CREATE TABLE `ofertas`  (
  `id_inventario` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL COMMENT 'Este campo guarda el id del producto que se pondra en promocion',
  `fechaInicio` date NULL DEFAULT NULL COMMENT 'Este campo guarda la fecha en que inicia la promocion',
  `fechaFinalizacion` date NULL DEFAULT NULL COMMENT 'Este campo guarda la fecha que finaliza promocion',
  `descuento` decimal(10, 0) NULL DEFAULT NULL COMMENT 'Este campo guarda precio con descuento del producto',
  PRIMARY KEY (`id_inventario`, `id_producto`) USING BTREE,
  INDEX `fk_inventario_has_producto_producto1_idx`(`id_producto`) USING BTREE,
  INDEX `fk_inventario_has_producto_inventario1_idx`(`id_inventario`) USING BTREE,
  CONSTRAINT `fk_inventario_has_producto_inventario1` FOREIGN KEY (`id_inventario`) REFERENCES `inventario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_inventario_has_producto_producto1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for permiso
-- ----------------------------
DROP TABLE IF EXISTS `permiso`;
CREATE TABLE `permiso`  (
  `ID_PERMISO` int(10) NOT NULL AUTO_INCREMENT,
  `ID_ROL` int(10) NOT NULL,
  `ID_MODULO` int(10) NOT NULL,
  `INSERT_PRIV` enum('Y','N') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `UPDATE_PRIV` enum('Y','N') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `DELETE_PRIV` enum('Y','N') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  `SELECT_PRIV` enum('Y','N') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`ID_PERMISO`) USING BTREE,
  INDEX `modulo_fk`(`ID_MODULO`) USING BTREE,
  INDEX `fk_rol`(`ID_ROL`) USING BTREE,
  CONSTRAINT `fk_rol` FOREIGN KEY (`ID_ROL`) REFERENCES `rol` (`ID_ROL`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `modulo_fk` FOREIGN KEY (`ID_MODULO`) REFERENCES `modulo` (`ID_MODULO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permiso
-- ----------------------------
INSERT INTO `permiso` VALUES (8, 1, 1, 'N', 'N', 'N', 'Y');
INSERT INTO `permiso` VALUES (9, 1, 2, 'N', 'N', 'N', 'Y');
INSERT INTO `permiso` VALUES (10, 1, 3, 'N', 'N', 'N', 'Y');
INSERT INTO `permiso` VALUES (12, 1, 5, 'Y', 'Y', 'Y', 'Y');
INSERT INTO `permiso` VALUES (13, 1, 6, 'Y', 'Y', 'Y', 'Y');

-- ----------------------------
-- Table structure for privilegios_rol
-- ----------------------------
DROP TABLE IF EXISTS `privilegios_rol`;
CREATE TABLE `privilegios_rol`  (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `id_modulo` int(11) NOT NULL,
  `operaciones` longtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL,
  `operaciones_modi` longtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL,
  `id_usuario` int(11) NULL DEFAULT NULL,
  INDEX `fk_rol_has_operaciones_rol1_idx`(`id_rol`) USING BTREE,
  INDEX `fk_privilegios_rol_modulo1_idx`(`id_modulo`) USING BTREE,
  INDEX `fk_privilegios_rol_usuario1_idx`(`id_usuario`) USING BTREE,
  CONSTRAINT `fk_privilegios_rol_modulo1` FOREIGN KEY (`id_modulo`) REFERENCES `modulo_reemplazo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_privilegios_rol_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of privilegios_rol
-- ----------------------------
INSERT INTO `privilegios_rol` VALUES (1, 1, '{\"SELECT\":TRUE,\"UPDATE\":TRUE,\"DELETE\":TRUE,\"INSERT\":TRUE}', NULL, NULL);
INSERT INTO `privilegios_rol` VALUES (1, 2, '{\"SELECT\":TRUE,\"UPDATE\":TRUE,\"DELETE\":TRUE,\"INSERT\":TRUE}', NULL, NULL);
INSERT INTO `privilegios_rol` VALUES (1, 3, '{\"SELECT\":TRUE,\"UPDATE\":TRUE,\"DELETE\":TRUE,\"INSERT\":TRUE}', NULL, NULL);
INSERT INTO `privilegios_rol` VALUES (1, 4, '{\"SELECT\":TRUE,\"UPDATE\":TRUE,\"DELETE\":TRUE,\"INSERT\":TRUE}', NULL, NULL);
INSERT INTO `privilegios_rol` VALUES (1, 6, '{\"SELECT\":TRUE,\"UPDATE\":TRUE,\"DELETE\":TRUE,\"INSERT\":TRUE}', NULL, NULL);
INSERT INTO `privilegios_rol` VALUES (1, 7, '{\"SELECT\":TRUE,\"UPDATE\":TRUE,\"DELETE\":TRUE,\"INSERT\":TRUE}', NULL, NULL);
INSERT INTO `privilegios_rol` VALUES (1, 8, '{\"SELECT\":TRUE,\"UPDATE\":TRUE,\"DELETE\":TRUE,\"INSERT\":TRUE}', NULL, NULL);
INSERT INTO `privilegios_rol` VALUES (1, 9, '{\"SELECT\":TRUE,\"UPDATE\":TRUE,\"DELETE\":TRUE,\"INSERT\":TRUE}', NULL, NULL);
INSERT INTO `privilegios_rol` VALUES (2, 2, '{\"SELECT\":TRUE,\"UPDATE\":TRUE,\"DELETE\":TRUE,\"INSERT\":TRUE}', NULL, NULL);
INSERT INTO `privilegios_rol` VALUES (2, 3, '{\"SELECT\":TRUE,\"UPDATE\":TRUE,\"DELETE\":TRUE,\"INSERT\":TRUE}', NULL, NULL);
INSERT INTO `privilegios_rol` VALUES (2, 4, '{\"SELECT\":TRUE,\"UPDATE\":TRUE,\"DELETE\":TRUE,\"INSERT\":TRUE}', NULL, NULL);
INSERT INTO `privilegios_rol` VALUES (2, 6, '{\"SELECT\":TRUE,\"UPDATE\":TRUE,\"DELETE\":TRUE,\"INSERT\":TRUE}', NULL, NULL);
INSERT INTO `privilegios_rol` VALUES (2, 7, '{\"SELECT\":TRUE,\"UPDATE\":TRUE,\"DELETE\":TRUE,\"INSERT\":TRUE}', NULL, NULL);
INSERT INTO `privilegios_rol` VALUES (2, 8, '{\"SELECT\":TRUE,\"UPDATE\":TRUE,\"DELETE\":TRUE,\"INSERT\":TRUE}', NULL, NULL);
INSERT INTO `privilegios_rol` VALUES (2, 1, '{\"SELECT\":TRUE,\"UPDATE\":TRUE,\"DELETE\":TRUE,\"INSERT\":TRUE}', NULL, NULL);
INSERT INTO `privilegios_rol` VALUES (3, 1, '{\"SELECT\":TRUE,\"UPDATE\":FALSE,\"DELETE\":FALSE,\"INSERT\":FALSE}', NULL, NULL);
INSERT INTO `privilegios_rol` VALUES (3, 8, '{\"SELECT\":TRUE,\"UPDATE\":FALSE,\"DELETE\":FALSE,\"INSERT\":TRUE}', NULL, NULL);

-- ----------------------------
-- Table structure for producto
-- ----------------------------
DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Este campo registra el nombre de cada producto',
  `descripcion` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Este campo guarda la descripcion de cada producto',
  `imagen` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Este campo guarda la direccion de la imagen del producto',
  `id_categoria` int(11) NOT NULL COMMENT 'Este campo guarda id de la categoria al que pertenece el producto',
  `estado` enum('activo','inactivo','eliminado') CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT 'activo' COMMENT 'Estado del Producto (\'activo\',\'inactivo\',\'eliminado\')\nactivo= si hay existencias\ninactivo = si stock es igual a 0\neliminado= no se muestra en el catalogo de producto',
  `id_marca` int(11) NOT NULL COMMENT 'Este campo guarda el id de la marca del producto\n',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for proveedor
-- ----------------------------
DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE `proveedor`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Este campo nombre de la empresa proveedora',
  `encargado` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Este campo contacto de la empresa proveedora',
  `telefono` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Este campo telefono de encargado',
  `movil` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Este campo guarda el telefono movil de proveedor de la empresa',
  `correo` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Este campo guarda el correo de proveedor',
  `codigo` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'codigo de proveedor\n',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rol
-- ----------------------------
DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol`  (
  `ID_ROL` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_ROL` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Este campo guarda el nombre de los creados(\'Administrador\',Supervisor\'\',\'Empleado\',\'Cliente\')',
  PRIMARY KEY (`ID_ROL`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rol
-- ----------------------------
INSERT INTO `rol` VALUES (1, 'administrador');
INSERT INTO `rol` VALUES (2, 'gerente');
INSERT INTO `rol` VALUES (3, 'empleado');
INSERT INTO `rol` VALUES (4, 'cliente');
INSERT INTO `rol` VALUES (5, 'master');

-- ----------------------------
-- Table structure for rol_menu
-- ----------------------------
DROP TABLE IF EXISTS `rol_menu`;
CREATE TABLE `rol_menu`  (
  `id_menu` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  INDEX `fk_menu_has_rol_rol1_idx`(`id_rol`) USING BTREE,
  INDEX `fk_menu_has_rol_menu1_idx`(`id_menu`) USING BTREE,
  INDEX `fk_rol_menu_modulo1_idx`(`id_modulo`) USING BTREE,
  CONSTRAINT `fk_menu_has_rol_menu1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_rol_menu_modulo1` FOREIGN KEY (`id_modulo`) REFERENCES `modulo_reemplazo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rol_menu
-- ----------------------------
INSERT INTO `rol_menu` VALUES (1, 1, 6);
INSERT INTO `rol_menu` VALUES (2, 1, 1);
INSERT INTO `rol_menu` VALUES (3, 1, 1);
INSERT INTO `rol_menu` VALUES (4, 1, 1);
INSERT INTO `rol_menu` VALUES (5, 1, 2);
INSERT INTO `rol_menu` VALUES (6, 1, 9);
INSERT INTO `rol_menu` VALUES (7, 1, 7);
INSERT INTO `rol_menu` VALUES (1, 2, 6);
INSERT INTO `rol_menu` VALUES (2, 2, 1);
INSERT INTO `rol_menu` VALUES (3, 2, 1);
INSERT INTO `rol_menu` VALUES (4, 2, 1);
INSERT INTO `rol_menu` VALUES (5, 2, 2);
INSERT INTO `rol_menu` VALUES (7, 2, 7);
INSERT INTO `rol_menu` VALUES (4, 3, 1);
INSERT INTO `rol_menu` VALUES (2, 3, 1);

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Este campo guarda el correo de cada usuario que se registra en el sistema.',
  `passwrd` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Este campo guarda la clave de encriptada de cada uno de los usuarios',
  `id_rol` int(11) NOT NULL COMMENT 'Este campo guarda el id del rol que se le asigna a cada usuario',
  `estado` enum('activo','inactivo','Eliminado') CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'activo' COMMENT 'Estados de usuario \nactivo= El usuario puede acceder al sistema\ninactivo = El usuario no puede acceder al sistema temporalmente, su cuenta esta bloqueada.\nEliminado = El usuario no puede acceder al sistema definitivamente',
  `id_empleado` int(11) NULL DEFAULT NULL COMMENT 'Este campo guarda el id de empleado que se encuentra registrado en el sistema\n',
  `id_cliente` int(11) NULL DEFAULT NULL COMMENT 'Este campo guarda el id de cada cliente que se encuentra registrado en el sistema.',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `correo_UNIQUE`(`correo`) USING BTREE,
  INDEX `fk_usuario_rol1_idx`(`id_rol`) USING BTREE,
  INDEX `fk_usuario_empleado1_idx`(`id_empleado`) USING BTREE,
  INDEX `fk_usuario_cliente1_idx`(`id_cliente`) USING BTREE,
  CONSTRAINT `fk_usuario_cliente1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_empleado1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES (1, 'admin@cardoffice.sv', '$2y$04$RcBk752n.CCmmHgd.Eq.YOVR4JcaHoSffW3qe.QT.st2aDROFWA3O', 1, 'activo', 1, NULL);
INSERT INTO `usuario` VALUES (7, 'carlos@gmail.com', '$2y$04$RcBk752n.CCmmHgd.Eq.YOVR4JcaHoSffW3qe.QT.st2aDROFWA3O', 4, 'activo', NULL, 6);
INSERT INTO `usuario` VALUES (8, 'gerente@cardoffice.sv', '$2y$04$RcBk752n.CCmmHgd.Eq.YOVR4JcaHoSffW3qe.QT.st2aDROFWA3O', 2, 'activo', 4, NULL);
INSERT INTO `usuario` VALUES (9, 'empleado@cardoffice.sv', '$2y$04$RcBk752n.CCmmHgd.Eq.YOVR4JcaHoSffW3qe.QT.st2aDROFWA3O', 3, 'activo', 5, NULL);

-- ----------------------------
-- Table structure for venta
-- ----------------------------
DROP TABLE IF EXISTS `venta`;
CREATE TABLE `venta`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` longtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL COMMENT 'Este campo guarda la lista de detalles de productos que se compran.',
  `subtotal` decimal(10, 0) NOT NULL COMMENT 'Este campo guarda el subtotal de la  compra realizada.',
  `total` decimal(10, 0) NULL DEFAULT NULL COMMENT 'Este campo guarda el total de la compra',
  `estado` enum('pendiente','realizado') CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT 'pendiente' COMMENT 'Este campo guarda el estado cada una de las ventas realizadas\nPendiente=\'no se ha entregado la mercaderia\';\nrealizado =\'la mercaderia ya fue entragada al cliente\';\n',
  `fecha_emision` timestamp(0) NULL DEFAULT NULL COMMENT 'Este campo registra la fecha y hora en que se realizo el pedido',
  `IVA` decimal(10, 0) NULL DEFAULT NULL COMMENT 'Este campo guarda el monto del IVA que se debe cancelar.\n',
  `id_usuario` int(11) NOT NULL COMMENT 'Este campo guarda el id del usuario que usuario al que pernetece la venta',
  `id_comprobante` int(11) NOT NULL COMMENT 'Es campo guarda el Id del tipo de comprobante de la venta.',
  `id_cliente` int(11) NULL DEFAULT NULL,
  `direccion` mediumtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL COMMENT 'Este campo guarda la direccion de envio de la venta si se realiza de manera online',
  `tipo_venta` enum('online','local') CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Especifica el tipo de venta si se hizo a traves de una cuenta online o si se realizo a de manera local',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_venta_usuario1_idx`(`id_usuario`) USING BTREE,
  INDEX `fk_venta_comprobante1_idx`(`id_comprobante`) USING BTREE,
  INDEX `fk_venta_cliente1_idx`(`id_cliente`) USING BTREE,
  CONSTRAINT `fk_venta_cliente1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_venta_comprobante1` FOREIGN KEY (`id_comprobante`) REFERENCES `comprobante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_venta_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- View structure for cargar_menu
-- ----------------------------
DROP VIEW IF EXISTS `cargar_menu`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `cargar_menu` AS select `r`.`NOMBRE_ROL` AS `rol`,`m`.`nombre` AS `menu`,`mt`.`nombre` AS `submenu`,`r`.`ID_ROL` AS `id_rol`,`m`.`id` AS `id_menu`,`mt`.`id_item` AS `id_menu_item` from (((`rol` `r` join `rol_menu` `rm`) join `menu` `m`) join `menu_item` `mt`) where `r`.`id_ROL` = `rm`.`id_rol` and `rm`.`id_menu` = `m`.`id` and `mt`.`id_menu_padre` = `m`.`id` ;

-- ----------------------------
-- View structure for v_permisos
-- ----------------------------
DROP VIEW IF EXISTS `v_permisos`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_permisos` AS SELECT R.ID_ROL, P.ID_MODULO, P.INSERT_PRIV, P.UPDATE_PRIV, P.DELETE_PRIV, P.SELECT_PRIV
FROM PERMISO P
INNER JOIN ROL R
ON P.ID_ROL = R.ID_ROL ;

-- ----------------------------
-- Function structure for codigo_empleado
-- ----------------------------
DROP FUNCTION IF EXISTS `codigo_empleado`;
delimiter ;;
CREATE FUNCTION `codigo_empleado`(`dui` VARCHAR(20))
 RETURNS varchar(20) CHARSET utf8 COLLATE utf8_spanish_ci
  NO SQL 
BEGIN
   DECLARE codigo VARCHAR(100);   
   SET codigo = (SELECT concat((SELECT LEFT((SELECT UPPER(empleado.apellido) from empleado where empleado.dui=dui),2)),(SELECT year(empleado.fecha_registro) FROM empleado WHERE empleado.dui =dui),(SELECT id FROM usuario WHERE usuario.id_empleado=(SELECT id FROM empleado WHERE empleado.dui=dui))));
        
      
   RETURN codigo;
              
END
;;
delimiter ;

-- ----------------------------
-- Function structure for codigo_producto
-- ----------------------------
DROP FUNCTION IF EXISTS `codigo_producto`;
delimiter ;;
CREATE FUNCTION `codigo_producto`(`producto` VARCHAR(100))
 RETURNS varchar(100) CHARSET utf8 COLLATE utf8_spanish_ci
BEGIN
        DECLARE codigo VARCHAR(100);   
        SET codigo = (SELECT CONCAT( (SELECT UPPER(LEFT(nombre,2))FROM categorias WHERE categorias.id =(SELECT id_categoria FROM producto WHERE producto.nombre =producto)), (SELECT id FROM producto WHERE producto.nombre =producto), (SELECT id_marca FROM producto WHERE producto.nombre =producto), (SELECT id FROM inventario WHERE inventario.id_producto = (SELECT id FROM producto WHERE producto.nombre =producto)), (SELECT year(fecha_registro) FROM inventario WHERE inventario.id_producto = (SELECT id FROM producto WHERE producto.nombre =producto))));
        
        RETURN codigo;
END
;;
delimiter ;

-- ----------------------------
-- Function structure for codigo_proveedor
-- ----------------------------
DROP FUNCTION IF EXISTS `codigo_proveedor`;
delimiter ;;
CREATE FUNCTION `codigo_proveedor`(`empresa` VARCHAR(100))
 RETURNS varchar(100) CHARSET utf8 COLLATE utf8_spanish_ci
  NO SQL 
BEGIN
        DECLARE codigo VARCHAR(100);   
        SET codigo = CONCAT((SELECT LEFT((SELECT UPPER('empresa')),2)),
                     (SELECT id FROM proveedores WHERE proveedores.empresa = empresa),(SELECT YEAR(fecha_registro) FROM proveedores WHERE proveedores.empresa= 'VIDRI'));
        
        RETURN codigo;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_cliente
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_cliente`;
delimiter ;;
CREATE PROCEDURE `crear_cliente`(IN `nombre` VARCHAR(100), IN `apellido` VARCHAR(100), IN `correo` VARCHAR(255), IN `passwrd` VARCHAR(255))
  NO SQL 
BEGIN
INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `telefono`) VALUES (NULL,nombre,apellido, NULL);
INSERT INTO `usuario` (`id`, `correo`, `passwrd`, `id_rol`, `estado`, `id_empleado`, `id_cliente`) VALUES (NULL,correo,passwrd,'4', 'activo',NULL, (SELECT id from cliente where cliente.nombre = nombre AND cliente.apellido = apellido));
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_empleado
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_empleado`;
delimiter ;;
CREATE PROCEDURE `crear_empleado`(IN `nombre` VARCHAR(100), IN `apellido` VARCHAR(100), IN `dui` VARCHAR(10), IN `telefono` VARCHAR(10), IN `movil` VARCHAR(10), IN `direccion` VARCHAR(255), IN `foto` VARCHAR(255), IN `codigo` VARCHAR(10), IN `correo` VARCHAR(100), IN `passwrd` VARCHAR(255), IN `rol` VARCHAR(255))
  NO SQL 
BEGIN

INSERT INTO `empleado` (`id`, `nombre`, `apellido`, `dui`, `telefono1`, `movil`, `direccion`, `foto`, `fecha_registro`, `codigo`) VALUES (NULL,nombre,apellido,dui,telefono,movil,direccion,foto, CURRENT_TIMESTAMP,codigo);
INSERT INTO `usuario` (`id`, `correo`, `passwrd`, `id_rol`, `estado`, `id_empleado`, `id_cliente`) VALUES (NULL,correo,passwrd,rol, 'activo',(SELECT id from empleado where empleado.dui = dui), NULL);
UPDATE empleado set empleado.codigo =(SELECT codigo_empleado(dui)) WHERE empleado.dui = dui;


END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_marca
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_marca`;
delimiter ;;
CREATE PROCEDURE `crear_marca`(IN `nombre` VARCHAR(100))
  NO SQL 
INSERT INTO `marca` (`id`, `nombre`, `estado`) VALUES (NULL,nombre, 'activo')
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_producto
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_producto`;
delimiter ;;
CREATE PROCEDURE `crear_producto`(IN `nombre` VARCHAR(100), IN `descripcion` MEDIUMTEXT, IN `foto` VARCHAR(255), IN `categoria` INT(255), IN `marca` INT(255), IN `stock` INT(255), IN `precio` DECIMAL(10,2))
  NO SQL 
BEGIN

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `imagen`, `id_categoria`, `estado`, `id_marca`) VALUES (NULL,nombre,descripcion,foto, categoria, 'activo',marca);
INSERT INTO `inventario` (`id`, `codigo`, `stock`, `precio_venta`, `fecha_registro`, `id_producto`) VALUES (NULL, NULL,stock, precio, CURRENT_TIMESTAMP,(SELECT id from producto where producto.nombre = nombre));

UPDATE inventario set inventario.codigo = (SELECT codigo_producto(nombre)) WHERE inventario.id = (SELECT id FROM producto where producto.nombre = nombre);

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for crear_proveedor
-- ----------------------------
DROP PROCEDURE IF EXISTS `crear_proveedor`;
delimiter ;;
CREATE PROCEDURE `crear_proveedor`(IN `empresa` VARCHAR(255), IN `encargado` VARCHAR(255), IN `telefono` VARCHAR(10), IN `movil` VARCHAR(10), IN `correo` VARCHAR(100))
  NO SQL 
BEGIN

INSERT INTO `proveedores` (`id_proveedor`, `empresa`, `encargado`, `telefono`, `movil`, `correo`, `codigo`, `fecha_registro`,`estado`) VALUES (NULL,empresa,encargado,telefono,movil,correo, NULL,CURRENT_DATE,'activo');
UPDATE proveedores SET codigo =(SELECT codigo_proveedor(empresa)) WHERE proveedores.empresa = empresa;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for generarModulos
-- ----------------------------
DROP PROCEDURE IF EXISTS `generarModulos`;
delimiter ;;
CREATE PROCEDURE `generarModulos`()
BEGIN
      INSERT INTO `modulo` (`id`, `modulo`) VALUES (NULL, 'producto');  
      INSERT INTO `modulo` (`id`, `modulo`) VALUES (NULL, 'proveedor');
      INSERT INTO `modulo` (`id`, `modulo`) VALUES (NULL, 'marca');
      INSERT INTO `modulo` (`id`, `modulo`) VALUES (NULL, 'categoria');
      INSERT INTO `modulo` (`id`, `modulo`) VALUES (NULL, 'configuracion');
      INSERT INTO `modulo` (`id`, `modulo`) VALUES (NULL, 'empleado');
      INSERT INTO `modulo` (`id`, `modulo`) VALUES (NULL, 'devoluciones');
      INSERT INTO `modulo` (`id`, `modulo`) VALUES (NULL, 'ofertas');
      INSERT INTO `modulo` (`id`, `modulo`) VALUES (NULL, 'auditoria');
      INSERT INTO `modulo` (`id`, `modulo`) VALUES (NULL, 'publico');
      INSERT INTO `modulo` (`id`, `modulo`) VALUES (NULL, 'ajustes');
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for generarRoles
-- ----------------------------
DROP PROCEDURE IF EXISTS `generarRoles`;
delimiter ;;
CREATE PROCEDURE `generarRoles`()
BEGIN
      INSERT INTO `rol` (`id`, `nombre`) VALUES (NULL, 'administrador');
      INSERT INTO `rol` (`id`, `nombre`) VALUES (NULL, 'gerente');
      INSERT INTO `rol` (`id`, `nombre`) VALUES (NULL, 'empleado');
      INSERT INTO `rol` (`id`, `nombre`) VALUES (NULL, 'cliente');
      INSERT INTO `rol` (`id`, `nombre`) VALUES (NULL, 'master');
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for listar_submenu
-- ----------------------------
DROP PROCEDURE IF EXISTS `listar_submenu`;
delimiter ;;
CREATE PROCEDURE `listar_submenu`(IN `id_rol` INT(255), IN `id_menu` INT(255))
  NO SQL 
SELECT mt.*,pr.operaciones FROM menu_item mt, rol_menu rm , privilegios_rol pr WHERE mt.id_menu_padre=id_menu AND rm.id_rol =id_rol AND rm.id_menu =id_menu AND pr.id_rol =id_rol AND rm.id_modulo = pr.id_modulo AND pr.id_rol=id_rol
;;
delimiter ;

-- ----------------------------
-- Procedure structure for modificar_categoria
-- ----------------------------
DROP PROCEDURE IF EXISTS `modificar_categoria`;
delimiter ;;
CREATE PROCEDURE `modificar_categoria`(IN `nombre` VARCHAR(255), IN `id` INT(255))
  NO SQL 
UPDATE `categorias` SET `nombre` = nombre WHERE `categorias`.`id` = id
;;
delimiter ;

-- ----------------------------
-- Procedure structure for modificar_cliente
-- ----------------------------
DROP PROCEDURE IF EXISTS `modificar_cliente`;
delimiter ;;
CREATE PROCEDURE `modificar_cliente`(IN `telefono` VARCHAR(10), IN `correo` VARCHAR(255), IN `passwrd` VARCHAR(255), IN `id` INT(255))
  NO SQL 
BEGIN

UPDATE `cliente` SET `telefono` = telefono WHERE `cliente`.`id` = id;
UPDATE `usuario` SET `correo` = correo, `passwrd` = passwrd  WHERE `usuario`.`id_cliente` = id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for modificar_empleado
-- ----------------------------
DROP PROCEDURE IF EXISTS `modificar_empleado`;
delimiter ;;
CREATE PROCEDURE `modificar_empleado`(IN `telefono` VARCHAR(10), IN `movil` VARCHAR(10), IN `direccion` MEDIUMTEXT, IN `foto` VARCHAR(255), IN `correo` VARCHAR(255), IN `passwrd` VARCHAR(255), IN `id` INT)
  NO SQL 
BEGIN

UPDATE `empleado` SET `telefono1` = telefono ,`movil` = movil,`direccion` = direccion,`foto` = foto WHERE `empleado`.`id` = id;


UPDATE `usuario` SET `correo` = correo, `passwrd` = passwrd  WHERE `usuario`.`id_empleado` = id;


END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
