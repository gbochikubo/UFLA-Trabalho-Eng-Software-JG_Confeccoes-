-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema jg_confeccoes
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema jg_confeccoes
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `jg_confeccoes` DEFAULT CHARACTER SET utf8 ;
USE `jg_confeccoes` ;

-- -----------------------------------------------------
-- Table `jg_confeccoes`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jg_confeccoes`.`cliente` (
  `Email` VARCHAR(45) NOT NULL,
  `Cpf` VARCHAR(45) NOT NULL,
  `Sexo` VARCHAR(1) NOT NULL,
  `Senha` VARCHAR(45) NOT NULL,
  `Endereco` VARCHAR(80) NOT NULL,
  `Nome` VARCHAR(45) NOT NULL,
  `Telefone` VARCHAR(45) NOT NULL,
  `Funcionario` TINYINT NULL DEFAULT 0,
  PRIMARY KEY (`Email`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `jg_confeccoes`.`item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jg_confeccoes`.`item` (
  `idItem` INT(11) NOT NULL,
  `Nome` VARCHAR(45) NOT NULL,
  `Tamanho` ENUM('P', 'M', 'G') NOT NULL,
  `Categoria` VARCHAR(45) NOT NULL,
  `Preço` INT(11) NOT NULL,
  `Quantidade` INT(11) NOT NULL,
  `Imagem` VARCHAR(145) NOT NULL,
  PRIMARY KEY (`idItem`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `jg_confeccoes`.`tipoentrega`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jg_confeccoes`.`tipoentrega` (
  `Tipo` INT(11) NOT NULL,
  `Tempo` INT(11) NOT NULL,
  `ValorFrete` FLOAT NOT NULL,
  PRIMARY KEY (`Tipo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `jg_confeccoes`.`pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jg_confeccoes`.`pedido` (
  `idPedido` INT(11) NOT NULL,
  `Status` VARCHAR(45) NOT NULL,
  `Valor` FLOAT NOT NULL,
  `EnderecoEntrega` VARCHAR(80) NOT NULL,
  `TipoEntrega_Tipo` INT(11) NOT NULL,
  `Cliente_Email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPedido`),
  INDEX `fk_Pedido_TipoEntrega1_idx` (`TipoEntrega_Tipo` ASC) VISIBLE,
  INDEX `fk_Pedido_Cliente1_idx` (`Cliente_Email` ASC) VISIBLE,
  CONSTRAINT `fk_Pedido_Cliente1`
    FOREIGN KEY (`Cliente_Email`)
    REFERENCES `jg_confeccoes`.`cliente` (`Email`),
  CONSTRAINT `fk_Pedido_TipoEntrega1`
    FOREIGN KEY (`TipoEntrega_Tipo`)
    REFERENCES `jg_confeccoes`.`tipoentrega` (`Tipo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `jg_confeccoes`.`item_has_pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jg_confeccoes`.`item_has_pedido` (
  `Item_idItem` INT(11) NOT NULL,
  `Pedido_idPedido` INT(11) NOT NULL,
  `Quantidade` INT(11) NOT NULL,
  PRIMARY KEY (`Item_idItem`, `Pedido_idPedido`),
  INDEX `fk_Item_has_Pedido_Pedido1_idx` (`Pedido_idPedido` ASC) VISIBLE,
  INDEX `fk_Item_has_Pedido_Item_idx` (`Item_idItem` ASC) VISIBLE,
  CONSTRAINT `fk_Item_has_Pedido_Item`
    FOREIGN KEY (`Item_idItem`)
    REFERENCES `jg_confeccoes`.`item` (`idItem`),
  CONSTRAINT `fk_Item_has_Pedido_Pedido1`
    FOREIGN KEY (`Pedido_idPedido`)
    REFERENCES `jg_confeccoes`.`pedido` (`idPedido`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
