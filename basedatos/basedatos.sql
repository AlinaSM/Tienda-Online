-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema TiendaAperture
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema TiendaAperture
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `TiendaAperture` DEFAULT CHARACTER SET utf8 ;
USE `TiendaAperture` ;

-- -----------------------------------------------------
-- Table `TiendaAperture`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TiendaAperture`.`usuario` (
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
-- Table `TiendaAperture`.`articulos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TiendaAperture`.`articulos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(500) NOT NULL DEFAULT 'No tiene Descripcion',
  `precio_unitario` DECIMAL(10,2) NOT NULL,
  `cantidad` VARCHAR(45) NOT NULL,
  `status` ENUM('Disponible', 'No Disponible') NOT NULL DEFAULT 'Disponible',
  `condicion` ENUM('Nuevo', 'Usado') NOT NULL DEFAULT 'Nuevo',
  `fecha_publicacion` DATETIME NOT NULL,
  `tipo_articulo` VARCHAR(45) NOT NULL,
  `marca` VARCHAR(45) NOT NULL,
  `modelo` VARCHAR(45) NOT NULL,
  `imagen` VARCHAR(455) NOT NULL,
  `usuario_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_articulos_usuario1_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_articulos_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `TiendaAperture`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TiendaAperture`.`pago`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TiendaAperture`.`pago` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `monto` DECIMAL(10,2) NOT NULL,
  `fecha` VARCHAR(45) NOT NULL,
  `tipo_pago` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TiendaAperture`.`compra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TiendaAperture`.`compra` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `total` DECIMAL(10,2) NOT NULL,
  `fecha` DATE NOT NULL,
  `usuario_id` INT NOT NULL,
  `pago_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_compra_usuario1_idx` (`usuario_id` ASC),
  INDEX `fk_compra_pago1_idx` (`pago_id` ASC),
  CONSTRAINT `fk_compra_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `TiendaAperture`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_compra_pago1`
    FOREIGN KEY (`pago_id`)
    REFERENCES `TiendaAperture`.`pago` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TiendaAperture`.`articulos_has_compra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TiendaAperture`.`articulos_has_compra` (
  `articulos_id` INT NOT NULL,
  `compra_id` INT NOT NULL,
  `cantidad` INT NOT NULL,
  `subtotal` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`articulos_id`, `compra_id`),
  INDEX `fk_articulos_has_compra_compra1_idx` (`compra_id` ASC),
  INDEX `fk_articulos_has_compra_articulos1_idx` (`articulos_id` ASC),
  CONSTRAINT `fk_articulos_has_compra_articulos1`
    FOREIGN KEY (`articulos_id`)
    REFERENCES `TiendaAperture`.`articulos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_articulos_has_compra_compra1`
    FOREIGN KEY (`compra_id`)
    REFERENCES `TiendaAperture`.`compra` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TiendaAperture`.`carrito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TiendaAperture`.`carrito` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `total_estimado` DECIMAL(10,2) NOT NULL,
  `usuario_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_carrito_usuario1_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_carrito_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `TiendaAperture`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TiendaAperture`.`articulos_has_carrito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TiendaAperture`.`articulos_has_carrito` (
  `articulos_id` INT NOT NULL,
  `carrito_id` INT NOT NULL,
  `cantidad` INT NOT NULL,
  `subtotal` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`articulos_id`, `carrito_id`),
  INDEX `fk_articulos_has_carrito_carrito1_idx` (`carrito_id` ASC),
  INDEX `fk_articulos_has_carrito_articulos1_idx` (`articulos_id` ASC),
  CONSTRAINT `fk_articulos_has_carrito_articulos1`
    FOREIGN KEY (`articulos_id`)
    REFERENCES `TiendaAperture`.`articulos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_articulos_has_carrito_carrito1`
    FOREIGN KEY (`carrito_id`)
    REFERENCES `TiendaAperture`.`carrito` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TiendaAperture`.`comentario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TiendaAperture`.`comentario` (
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
    REFERENCES `TiendaAperture`.`articulos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comentario_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `TiendaAperture`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
