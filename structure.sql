CREATE DATABASE IF NOT EXISTS hispeedcourier;


CREATE TABLE IF NOT EXISTS `hispeedcourier`.`configs` (
  `configid` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `value` mediumtext NOT NULL,
  PRIMARY KEY (`configid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `hispeedcourier`.`clients` (
	`id` INT NOT NULL AUTO_INCREMENT ,
	`cname` VARCHAR(200) NOT NULL ,
	`acno` INT(10) NOT NULL ,
	`lr` FLOAT NOT NULL ,
	`pr` FLOAT NOT NULL ,
	`sr` FLOAT NOT NULL ,
	`fac` FLOAT NOT NULL ,
	`gst` FLOAT NOT NULL ,
	`time_added` INT NOT NULL ,
	`date_added` VARCHAR(100) NOT NULL ,
	`date_updated` VARCHAR(100) NOT NULL ,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;

ALTER TABLE `clients` ADD UNIQUE(`acno`);