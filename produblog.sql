-- MySQL Script generated by MySQL Workbench
-- Wed Dec  9 14:39:38 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema produblog
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `produblog` ;

-- -----------------------------------------------------
-- Schema produblog
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `produblog` DEFAULT CHARACTER SET utf8 ;
USE `produblog` ;

-- -----------------------------------------------------
-- Table `produblog`.`Users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `produblog`.`Users` ;

CREATE TABLE IF NOT EXISTS `produblog`.`Users` (
  `idUsers` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(255) NULL,
  `password` VARCHAR(255) NULL,
  `usertype` VARCHAR(32) NULL,
  `email` VARCHAR(255) NULL,
  PRIMARY KEY (`idUsers`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `produblog`.`Post`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `produblog`.`Post` ;

CREATE TABLE IF NOT EXISTS `produblog`.`Post` (
  `idPost` INT NOT NULL AUTO_INCREMENT,
  `postname` VARCHAR(64) NULL,
  `postcontent` VARCHAR(255) NULL,
  `Users_idUsers` INT NOT NULL,
  `File_ops` VARCHAR(255) NULL,
  `date` DATE NULL,
  PRIMARY KEY (`idPost`, `Users_idUsers`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `produblog`.`Comment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `produblog`.`Comment` ;

CREATE TABLE IF NOT EXISTS `produblog`.`Comment` (
  `idComment` INT NOT NULL AUTO_INCREMENT,
  `commentcontent` VARCHAR(255) NULL,
  `Users_idUsers` INT NOT NULL,
  `Post_idPost` INT NOT NULL,
  `date` DATE NULL,
  PRIMARY KEY (`idComment`, `Users_idUsers`, `Post_idPost`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;