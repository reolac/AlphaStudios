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
  `Customer_ID` INT NOT NULL AUTO_INCREMENT,
  `Address` VARCHAR(255) NOT NULL,
  `Changed` TIMESTAMP NOT NULL,
  PRIMARY KEY (`Customer_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softwarehut`.`WorkOrder`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `softwarehut`.`WorkOrder` ;

CREATE TABLE IF NOT EXISTS `softwarehut`.`WorkOrder` (
  `WorkOrder_ID` INT NOT NULL AUTO_INCREMENT,
  `WorkOrderRef` VARCHAR(45) NOT NULL,
  `WorkStatus` VARCHAR(45) NOT NULL,
  `Changed` TIMESTAMP NOT NULL,
  PRIMARY KEY (`WorkOrder_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softwarehut`.`Enquiry`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `softwarehut`.`Enquiry` ;

CREATE TABLE IF NOT EXISTS `softwarehut`.`Enquiry` (
  `Enquiry_ID` INT NOT NULL AUTO_INCREMENT,
  `Customer` INT NOT NULL,
  `ModeOfEnquiry` VARCHAR(45) NOT NULL,
  `TimeOfEnquiry` DATE NOT NULL,
  `CustomerReqDate` VARCHAR(255) NOT NULL,
  `QuotationRef` VARCHAR(255) NOT NULL,
  `Reference` VARCHAR(45) NOT NULL,
  `CustOrderRef` VARCHAR(45) NOT NULL,
  `eWorkOrd` INT NOT NULL,
  `Changed` TIMESTAMP NOT NULL,
  `QuoteReview` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Enquiry_ID`),
  INDEX `Customer_ID_idx` (`Customer` ASC),
  INDEX `eWorkOrd_idx` (`eWorkOrd` ASC),
  CONSTRAINT `ECustomer_ID`
    FOREIGN KEY (`Customer`)
    REFERENCES `softwarehut`.`Customer` (`Customer_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `eWorkOrd`
    FOREIGN KEY (`eWorkOrd`)
    REFERENCES `softwarehut`.`WorkOrder` (`WorkOrder_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softwarehut`.`Login`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `softwarehut`.`Login` ;

CREATE TABLE IF NOT EXISTS `softwarehut`.`Login` (
  `idLogin` INT NOT NULL AUTO_INCREMENT,
  `user` VARCHAR(45) NOT NULL,
  `hash` VARCHAR(255) NOT NULL,
  `Changed` TIMESTAMP NOT NULL,
  PRIMARY KEY (`idLogin`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softwarehut`.`checklist`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `softwarehut`.`checklist` ;

CREATE TABLE IF NOT EXISTS `softwarehut`.`checklist` (
  `checklist_ID` INT NOT NULL AUTO_INCREMENT,
  `DrawRefNum` VARCHAR(45) NOT NULL,
  `CostingSheet` VARCHAR(45) NOT NULL,
  `Quotation` VARCHAR(45) NOT NULL,
  `CustPurOrdNum` VARCHAR(45) NOT NULL,
  `jWorkOrd` INT NOT NULL,
  `PurOrdNum` VARCHAR(45) NOT NULL,
  `DelNotNum` VARCHAR(45) NOT NULL,
  `InvNum` VARCHAR(45) NOT NULL,
  `RejNum` VARCHAR(45) NOT NULL,
  `TestCertNum` VARCHAR(45) NOT NULL,
  `LPTest` VARCHAR(45) NOT NULL,
  `PhotoRefNum` VARCHAR(45) NOT NULL,
  `Changed` TIMESTAMP NOT NULL,
  PRIMARY KEY (`checklist_ID`),
  INDEX `jWorkOrd_idx` (`jWorkOrd` ASC),
  CONSTRAINT `jWorkOrd`
    FOREIGN KEY (`jWorkOrd`)
    REFERENCES `softwarehut`.`WorkOrder` (`WorkOrder_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softwarehut`.`CostingSheet`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `softwarehut`.`CostingSheet` ;

CREATE TABLE IF NOT EXISTS `softwarehut`.`CostingSheet` (
  `CostingSheet_ID` INT NOT NULL AUTO_INCREMENT,
  `Site` VARCHAR(45) NOT NULL,
  `Job` VARCHAR(45) NOT NULL,
  `Dates` DATE NOT NULL,
  `Ref` VARCHAR(45) NOT NULL,
  `cWorkOrd` INT NOT NULL,
  `Cust` VARCHAR(45) NOT NULL,
  `TotalMats` DECIMAL(9,2) NULL,
  `CarriageCharge` DECIMAL(9,2) NULL,
  `MaterialsPlus15` DECIMAL(9,2) NULL,
  `TotalMaterialCost` DECIMAL(9,2) NULL,
  `supplier` VARCHAR(45) NULL,
  `ContractorName` VARCHAR(45) NULL,
  `SubContractorName` VARCHAR(45) NULL,
  `SubConHr` INT NULL,
  `SubConcRate` DECIMAL(9,2) NULL,
  `SubConcTot` DECIMAL(9,2) NULL,
  `SubConcET` DECIMAL(9,2) NULL,
  `labourCost` DECIMAL(9,2) NULL,
  `TotalCost` DECIMAL(9,2) NULL,
  `Changed` TIMESTAMP NOT NULL,
  PRIMARY KEY (`CostingSheet_ID`),
  INDEX `cWorkOrd_idx` (`cWorkOrd` ASC),
  CONSTRAINT `cWorkOrd`
    FOREIGN KEY (`cWorkOrd`)
    REFERENCES `softwarehut`.`WorkOrder` (`WorkOrder_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softwarehut`.`Material`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `softwarehut`.`Material` ;

CREATE TABLE IF NOT EXISTS `softwarehut`.`Material` (
  `Material_ID` INT NOT NULL AUTO_INCREMENT,
  `MatName` VARCHAR(45) NOT NULL,
  `Required` INT NOT NULL,
  `UnitCost` DECIMAL(9,2) NOT NULL,
  `Total` DECIMAL(9,2) NOT NULL,
  `mCostingSheet` INT NOT NULL,
  `Changed` TIMESTAMP NOT NULL,
  PRIMARY KEY (`Material_ID`),
  INDEX `CostingSheet_idx` (`mCostingSheet` ASC),
  CONSTRAINT `mCostingSheet`
    FOREIGN KEY (`mCostingSheet`)
    REFERENCES `softwarehut`.`CostingSheet` (`CostingSheet_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softwarehut`.`Service`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `softwarehut`.`Service` ;

CREATE TABLE IF NOT EXISTS `softwarehut`.`Service` (
  `Service_ID` INT NOT NULL AUTO_INCREMENT,
  `SerName` VARCHAR(45) NOT NULL,
  `Required` INT NOT NULL,
  `Cost` DECIMAL(9,2) NOT NULL,
  `Total` DECIMAL(9,2) NOT NULL,
  `sCostingSheet` INT NOT NULL,
  `Changed` TIMESTAMP NOT NULL,
  PRIMARY KEY (`Service_ID`),
  INDEX `CostingSheet_idx` (`sCostingSheet` ASC),
  CONSTRAINT `sCostingSheet`
    FOREIGN KEY (`sCostingSheet`)
    REFERENCES `softwarehut`.`CostingSheet` (`CostingSheet_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softwarehut`.`Labour`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `softwarehut`.`Labour` ;

CREATE TABLE IF NOT EXISTS `softwarehut`.`Labour` (
  `Labour_ID` INT NOT NULL AUTO_INCREMENT,
  `LabName` VARCHAR(45) NOT NULL,
  `hours` INT NOT NULL,
  `cost` DECIMAL(9,2) NOT NULL,
  `total` DECIMAL(9,2) NOT NULL,
  `lCostingSheet` INT NOT NULL,
  `Changed` TIMESTAMP NOT NULL,
  PRIMARY KEY (`Labour_ID`),
  INDEX `lCostingSheet_idx` (`lCostingSheet` ASC),
  CONSTRAINT `lCostingSheet`
    FOREIGN KEY (`lCostingSheet`)
    REFERENCES `softwarehut`.`CostingSheet` (`CostingSheet_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softwarehut`.`Quote`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `softwarehut`.`Quote` ;

CREATE TABLE IF NOT EXISTS `softwarehut`.`Quote` (
  `Quote_ID` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `message` TEXT(200) NOT NULL,
  `qWorkOrder` INT NOT NULL,
  `Changed` TIMESTAMP NOT NULL,
  PRIMARY KEY (`Quote_ID`),
  INDEX `qWorkOrd_idx` (`qWorkOrder` ASC),
  CONSTRAINT `qWorkOrd`
    FOREIGN KEY (`qWorkOrder`)
    REFERENCES `softwarehut`.`WorkOrder` (`WorkOrder_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
