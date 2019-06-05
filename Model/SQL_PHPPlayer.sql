-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema PHPVideoPlayer
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema PHPVideoPlayer
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `PHPVideoPlayer` DEFAULT CHARACTER SET utf8 ;
USE `PHPVideoPlayer` ;

-- -----------------------------------------------------
-- Table `PHPVideoPlayer`.`playlist`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `PHPVideoPlayer`.`playlist` ;

CREATE TABLE IF NOT EXISTS `PHPVideoPlayer`.`playlist` (
  `pid` INT NOT NULL AUTO_INCREMENT,
  `plname` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`pid`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PHPVideoPlayer`.`video`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `PHPVideoPlayer`.`video` ;

CREATE TABLE IF NOT EXISTS `PHPVideoPlayer`.`video` (
  `vid` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `video` LONGBLOB NOT NULL,
  `thumbnail` LONGBLOB NOT NULL,
  `duration` INT NULL,
  `likes` INT NULL,
  `dislikes` INT NULL,
  `views` INT NULL,
  PRIMARY KEY (`vid`),
  UNIQUE INDEX `title_UNIQUE` (`title` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PHPVideoPlayer`.`playlist_has_video`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `PHPVideoPlayer`.`playlist_has_video` ;

CREATE TABLE IF NOT EXISTS `PHPVideoPlayer`.`playlist_has_video` (
  `pid` INT NOT NULL,
  `vid` INT NOT NULL,
  INDEX `fk_playlist_has_video_playlist_idx` (`pid` ASC),
  INDEX `fk_playlist_has_video_video1_idx` (`vid` ASC),
  CONSTRAINT `fk_playlist_has_video_playlist`
    FOREIGN KEY (`pid`)
    REFERENCES `PHPVideoPlayer`.`playlist` (`pid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_playlist_has_video_video1`
    FOREIGN KEY (`vid`)
    REFERENCES `PHPVideoPlayer`.`video` (`vid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
