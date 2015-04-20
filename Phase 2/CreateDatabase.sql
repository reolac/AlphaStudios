-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema softwarehut
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `softwarehut` ;

-- -----------------------------------------------------
-- Schema softwarehut
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `softwarehut` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `softwarehut` ;

-- -----------------------------------------------------
-- Table `softwarehut`.`Customer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `softwarehut`.`Customer` ;

CREATE TABLE IF NOT EXISTS `softwarehut`.`Customer` (
  `Customer_ID` INT NULL,
  `Address` VARCHAR(45) NOT NULL,
  `City` VARCHAR(45) NOT NULL,
  `Postcode` VARCHAR(45) NOT NULL,
  `Changed` TIMESTAMP NOT NULL,
  PRIMARY KEY (`Customer_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softwarehut`.`Job`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `softwarehut`.`Job` ;

CREATE TABLE IF NOT EXISTS `softwarehut`.`Job` (
  `Job_ID` INT NULL,
  `JCustomer_ID` INT NOT NULL,
  `Project_Cost` DECIMAL NULL,
  `Completed` TINYINT(1) NULL,
  `DueDate` DATE NULL,
  `Changed` TIMESTAMP NOT NULL,
  PRIMARY KEY (`Job_ID`),
  INDEX `Customer_ID_idx` (`JCustomer_ID` ASC),
  CONSTRAINT `JCustomer_ID`
    FOREIGN KEY (`JCustomer_ID`)
    REFERENCES `softwarehut`.`Customer` (`Customer_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softwarehut`.`Purchase`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `softwarehut`.`Purchase` ;

CREATE TABLE IF NOT EXISTS `softwarehut`.`Purchase` (
  `Purchase_ID` INT NULL,
  `PCustomer_ID` INT NOT NULL,
  `PJob_ID` INT NOT NULL,
  `Changed` TIMESTAMP NOT NULL,
  PRIMARY KEY (`Purchase_ID`),
  INDEX `Customer_ID_idx` (`PCustomer_ID` ASC),
  INDEX `Job_ID_idx` (`PJob_ID` ASC),
  CONSTRAINT `PCustomer_ID`
    FOREIGN KEY (`PCustomer_ID`)
    REFERENCES `softwarehut`.`Customer` (`Customer_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `PJob_ID`
    FOREIGN KEY (`PJob_ID`)
    REFERENCES `softwarehut`.`Job` (`Job_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softwarehut`.`Enquiry`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `softwarehut`.`Enquiry` ;

CREATE TABLE IF NOT EXISTS `softwarehut`.`Enquiry` (
  `Enquiry_ID` INT NULL,
  `ECustomer_ID` INT NOT NULL,
  `ModeOfEnquiry` VARCHAR(45) NULL,
  `TimeOfEnquiry` DATE NULL,
  `CustomerReq` VARCHAR(45) NULL,
  `DeliveryDate` DATE NULL,
  `QuotationRef` VARCHAR(45) NULL,
  `Changed` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Enquiry_ID`),
  INDEX `Customer_ID_idx` (`ECustomer_ID` ASC),
  CONSTRAINT `ECustomer_ID`
    FOREIGN KEY (`ECustomer_ID`)
    REFERENCES `softwarehut`.`Customer` (`Customer_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softwarehut`.`Order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `softwarehut`.`Order` ;

CREATE TABLE IF NOT EXISTS `softwarehut`.`Order` (
  `Order_ID` INT NULL,
  `OCustomer_ID` INT NOT NULL,
  `Reviewer` VARCHAR(45) NULL,
  `Changed` TIMESTAMP NOT NULL,
  PRIMARY KEY (`Order_ID`),
  INDEX `Customer_ID_idx` (`OCustomer_ID` ASC),
  CONSTRAINT `OCustomer_ID`
    FOREIGN KEY (`OCustomer_ID`)
    REFERENCES `softwarehut`.`Customer` (`Customer_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softwarehut`.`Login`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `softwarehut`.`Login` ;

CREATE TABLE IF NOT EXISTS `softwarehut`.`Login` (
  `idLogin` INT NOT NULL AUTO_INCREMENT,
  `user` VARCHAR(45) NOT NULL,
  `hashedpass` VARCHAR(45) NOT NULL,
  `hash` VARCHAR(45) NOT NULL,
  `Changed` TIMESTAMP NOT NULL,
  PRIMARY KEY (`idLogin`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

