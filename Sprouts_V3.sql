-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema sprouts
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `sprouts` ;

-- -----------------------------------------------------
-- Schema sprouts
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sprouts` DEFAULT CHARACTER SET utf8 ;
USE `sprouts` ;

-- -----------------------------------------------------
-- Table `sprouts`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sprouts`.`users` ;

CREATE TABLE IF NOT EXISTS `sprouts`.`users` (
  `Id` INT(10) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
  `password` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
  `name` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
  `privilage` INT(5) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE INDEX `email` (`email` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 62
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sprouts`.`announcements`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sprouts`.`announcements` ;

CREATE TABLE IF NOT EXISTS `sprouts`.`announcements` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` VARCHAR(45) NOT NULL,
  `adminID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`, `adminID`),
  CONSTRAINT `adID`
    FOREIGN KEY (`adminID`)
    REFERENCES `sprouts`.`users` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sprouts`.`courses`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sprouts`.`courses` ;

CREATE TABLE IF NOT EXISTS `sprouts`.`courses` (
  `ID` INT(10) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
  `Description` TEXT CHARACTER SET 'utf8' NOT NULL,
  `instructorID` INT(10) NOT NULL,
  `maxNumber` INT(10) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `instructorID` (`instructorID` ASC),
  CONSTRAINT `courses_ibfk_1`
    FOREIGN KEY (`instructorID`)
    REFERENCES `sprouts`.`users` (`Id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sprouts`.`center_schedule`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sprouts`.`center_schedule` ;

CREATE TABLE IF NOT EXISTS `sprouts`.`center_schedule` (
  `courseID` INT(10) NOT NULL,
  `day` VARCHAR(10) CHARACTER SET 'utf8' NOT NULL,
  `startTime` TIME NOT NULL,
  `endTime` TIME NOT NULL,
  `open` TINYINT(1) NOT NULL,
  PRIMARY KEY (`courseID`, `day`, `startTime`, `endTime`),
  INDEX `courseID` (`courseID` ASC),
  CONSTRAINT `center_schedule_ibfk_1`
    FOREIGN KEY (`courseID`)
    REFERENCES `sprouts`.`courses` (`ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `sprouts`.`donations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sprouts`.`donations` ;

CREATE TABLE IF NOT EXISTS `sprouts`.`donations` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `donorName` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
  `address` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
  `telephone` VARCHAR(11) NOT NULL,
  `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `collectionDate` DATE NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sprouts`.`materials`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sprouts`.`materials` ;

CREATE TABLE IF NOT EXISTS `sprouts`.`materials` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(100) NOT NULL,
  `filename` VARCHAR(100) NOT NULL,
  `filepath` VARCHAR(100) NOT NULL,
  `courseId` INT(11) NOT NULL,
  `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  INDEX `cid` (`courseId` ASC),
  CONSTRAINT `cid`
    FOREIGN KEY (`courseId`)
    REFERENCES `sprouts`.`courses` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sprouts`.`notifications`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sprouts`.`notifications` ;

CREATE TABLE IF NOT EXISTS `sprouts`.`notifications` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` VARCHAR(100) NOT NULL,
  `instructorID` INT(11) NOT NULL,
  `courseID` INT(11) NOT NULL,
  INDEX `instID_idx` (`instructorID` ASC),
  PRIMARY KEY (`ID`),
  CONSTRAINT `coID`
    FOREIGN KEY (`courseID`)
    REFERENCES `sprouts`.`courses` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `instID`
    FOREIGN KEY (`instructorID`)
    REFERENCES `sprouts`.`users` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sprouts`.`student_schedule`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sprouts`.`student_schedule` ;

CREATE TABLE IF NOT EXISTS `sprouts`.`student_schedule` (
  `studentID` INT(10) NOT NULL,
  `courseID` INT(10) NOT NULL,
  `day` VARCHAR(10) CHARACTER SET 'utf8' NOT NULL,
  `startTime` TIME NOT NULL,
  `endTime` TIME NOT NULL,
  PRIMARY KEY (`studentID`, `courseID`),
  INDEX `studentID` (`studentID` ASC),
  INDEX `courseID` (`courseID` ASC),
  CONSTRAINT `student_schedule_ibfk_1`
    FOREIGN KEY (`studentID`)
    REFERENCES `sprouts`.`users` (`Id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `student_schedule_ibfk_2`
    FOREIGN KEY (`courseID`)
    REFERENCES `sprouts`.`courses` (`ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

INSERT INTO `users` (`email`, `password`, `name`, `privilage`) VALUES
('instructor@gmail.com', '123', 'Instructor Name', 1),
('student@gmail.com', '1234', 'Student Name', 2),
('admin@gmail.com', '1234', 'Admin Name', 0),
( 'ziad@gmail.com', 'ziad1', 'ziad ', 2),
('mohamed_HASSAN96@HOTMAIL.COM', '12345', 'Zefo', 2),
('hamdy@gmail.com', '123', 'Moahmed Hamdy', 2),
( 'admin1@gmail.com', '123', 'admin1', 0),
( 'ahmed@gmail.com', '123', 'Ahmed ismael', 2),
( 'hassan@gmail.com', '123', 'mohamed', 2),
('admin2@gmail.com', '123', 'admin2', 0),
('samorty@live.com', '2041995', 'samar mohamed ', 1),
('dandan_184@hotmail.com', '012345', 'Dana Hani Ahmed', 1),
( 'merna_beauty_girl@hotmail.com', 'mirnahanii', 'mirna hani', 1),
('toukhy55_mido@hotmail.com', '123456789', 'toukhy', 2),
( 'salah_slmy@hotmail.com', 'baboes', 'salah', 2);

INSERT INTO `courses` (`ID`, `name`, `Description`, `instructorID`, `maxNumber`) VALUES
( 1,'math1', 'course math', 62, 3),
(5,'new media', 'media ', 72, 15),
(6,'translation ', 'for beginner', 73, 40),
( 9,'decoration', 'beginners ', 74, 30);
INSERT INTO `center_schedule` (`courseID`, `day`, `startTime`, `endTime`, `open`) VALUES
(1, 'monday', '06:00:00', '09:00:00', 1),
(1, 'sunday', '11:00:00', '12:00:00', 1),
(1, 'sunday', '12:00:00', '14:00:00', 1),
(1, 'wednesday', '16:00:00', '18:00:00', 1),
(5, 'tuesday', '13:00:00', '14:00:00', 1),
(6, 'sunday', '11:00:00', '12:00:00', 1),
(9, 'tuesday', '18:00:00', '20:00:00', 1);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
