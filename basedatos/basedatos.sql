-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema TiendaOnline
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema TiendaOnline
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `TiendaOnline` DEFAULT CHARACTER SET utf8 ;
USE `TiendaOnline` ;

-- -----------------------------------------------------
-- Table `TiendaOnline`.`catalogo_tipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TiendaOnline`.`catalogo_tipo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TiendaOnline`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TiendaOnline`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `contrasena` VARCHAR(100) NOT NULL,
  `direccion` VARCHAR(255) NOT NULL,
  `status` ENUM('Disponible', 'No Disponible') NOT NULL DEFAULT 'Disponible',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TiendaOnline`.`venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TiendaOnline`.`venta` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuario_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_venta_usuario1_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_venta_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `TiendaOnline`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TiendaOnline`.`articulos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TiendaOnline`.`articulos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo_id` INT NOT NULL,
  `venta_id` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(500) NOT NULL DEFAULT 'No tiene Descripcion',
  `precio_unitario` DECIMAL(10,2) NOT NULL,
  `cantidad` VARCHAR(45) NOT NULL,
  `status` ENUM('Disponible', 'No Disponible') NOT NULL DEFAULT 'Disponible',
  `condicion` ENUM('Nuevo', 'Usado') NOT NULL DEFAULT 'Nuevo',
  `fecha_publicacion` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_articulos_catalogo_tipo_idx` (`tipo_id` ASC),
  INDEX `fk_articulos_venta1_idx` (`venta_id` ASC),
  CONSTRAINT `fk_articulos_catalogo_tipo`
    FOREIGN KEY (`tipo_id`)
    REFERENCES `TiendaOnline`.`catalogo_tipo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_articulos_venta1`
    FOREIGN KEY (`venta_id`)
    REFERENCES `TiendaOnline`.`venta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TiendaOnline`.`envio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TiendaOnline`.`envio` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `paqueteria` VARCHAR(45) NOT NULL,
  `fecha_envio` DATE NOT NULL,
  `fecha_entrega` DATE NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TiendaOnline`.`tipo_pago`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TiendaOnline`.`tipo_pago` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipoPago` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TiendaOnline`.`pago`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TiendaOnline`.`pago` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `monto` DECIMAL(10,2) NOT NULL,
  `fecha` VARCHAR(45) NOT NULL,
  `tipo_pago_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_pago_tipo_pago1_idx` (`tipo_pago_id` ASC),
  CONSTRAINT `fk_pago_tipo_pago1`
    FOREIGN KEY (`tipo_pago_id`)
    REFERENCES `TiendaOnline`.`tipo_pago` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TiendaOnline`.`compra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TiendaOnline`.`compra` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `total` DECIMAL(10,2) NOT NULL,
  `fecha` DATE NOT NULL,
  `usuario_id` INT NOT NULL,
  `envio_id` INT NOT NULL,
  `pago_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_compra_usuario1_idx` (`usuario_id` ASC),
  INDEX `fk_compra_envio1_idx` (`envio_id` ASC),
  INDEX `fk_compra_pago1_idx` (`pago_id` ASC),
  CONSTRAINT `fk_compra_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `TiendaOnline`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_compra_envio1`
    FOREIGN KEY (`envio_id`)
    REFERENCES `TiendaOnline`.`envio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_compra_pago1`
    FOREIGN KEY (`pago_id`)
    REFERENCES `TiendaOnline`.`pago` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TiendaOnline`.`articulos_has_compra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TiendaOnline`.`articulos_has_compra` (
  `articulos_id` INT NOT NULL,
  `compra_id` INT NOT NULL,
  `cantidad` INT NOT NULL,
  `subtotal` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`articulos_id`, `compra_id`),
  INDEX `fk_articulos_has_compra_compra1_idx` (`compra_id` ASC),
  INDEX `fk_articulos_has_compra_articulos1_idx` (`articulos_id` ASC),
  CONSTRAINT `fk_articulos_has_compra_articulos1`
    FOREIGN KEY (`articulos_id`)
    REFERENCES `TiendaOnline`.`articulos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_articulos_has_compra_compra1`
    FOREIGN KEY (`compra_id`)
    REFERENCES `TiendaOnline`.`compra` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TiendaOnline`.`carrito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TiendaOnline`.`carrito` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `total_estimado` DECIMAL(10,2) NOT NULL,
  `usuario_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_carrito_usuario1_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_carrito_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `TiendaOnline`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TiendaOnline`.`articulos_has_carrito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TiendaOnline`.`articulos_has_carrito` (
  `articulos_id` INT NOT NULL,
  `carrito_id` INT NOT NULL,
  `cantidad` INT NOT NULL,
  `subtotal` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`articulos_id`, `carrito_id`),
  INDEX `fk_articulos_has_carrito_carrito1_idx` (`carrito_id` ASC),
  INDEX `fk_articulos_has_carrito_articulos1_idx` (`articulos_id` ASC),
  CONSTRAINT `fk_articulos_has_carrito_articulos1`
    FOREIGN KEY (`articulos_id`)
    REFERENCES `TiendaOnline`.`articulos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_articulos_has_carrito_carrito1`
    FOREIGN KEY (`carrito_id`)
    REFERENCES `TiendaOnline`.`carrito` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TiendaOnline`.`imagenes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TiendaOnline`.`imagenes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `direccion` VARCHAR(255) NOT NULL,
  `articulos_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_imagenes_articulos1_idx` (`articulos_id` ASC),
  CONSTRAINT `fk_imagenes_articulos1`
    FOREIGN KEY (`articulos_id`)
    REFERENCES `TiendaOnline`.`articulos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TiendaOnline`.`comentario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TiendaOnline`.`comentario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `contenido` VARCHAR(470) NOT NULL,
  `fecha_pregunta` DATETIME NOT NULL,
  `articulos_id` INT NOT NULL,
  `usuario_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_comentario_articulos1_idx` (`articulos_id` ASC),
  INDEX `fk_comentario_usuario1_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_comentario_articulos1`
    FOREIGN KEY (`articulos_id`)
    REFERENCES `TiendaOnline`.`articulos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comentario_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `TiendaOnline`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
