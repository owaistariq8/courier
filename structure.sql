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
	`date_added` DATE DEFAULT CURRENT_DATE ,
	`date_updated` DATE DEFAULT CURRENT_DATE ON UPDATE CURRENT_DATE ,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;

ALTER TABLE `hispeedcourier`.`clients` ADD UNIQUE(`acno`);

CREATE TABLE IF NOT EXISTS `hispeedcourier`.`invoices` (
	`id` INT NOT NULL AUTO_INCREMENT ,
	`cnno` INT(10) NOT NULL ,
	`dest` VARCHAR(200) NOT NULL ,
	`wt` FLOAT NOT NULL ,
	`service` VARCHAR(200) NOT NULL ,
	`octroi` VARCHAR(200) NOT NULL ,
	`amount` FLOAT NOT NULL ,
	`acno` INT NOT NULL ,
	`time_added` INT NOT NULL ,
	`date_added` DATE DEFAULT CURRENT_DATE,
	`date` DATE DEFAULT CURRENT_DATE ,
	`date_updated` DATE DEFAULT CURRENT_DATE ON UPDATE CURRENT_DATE ,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `hispeedcourier`.`invoice_bill` (
	`id` INT NOT NULL AUTO_INCREMENT ,
	`json_bill` TEXT, 
	`client_id` INT(10) NOT NULL , 
	`start_date` VARCHAR(200), 
	`end_date` VARCHAR(200),
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;

GRANT ALL PRIVILEGES ON hispeedcourier.* TO 'hispeed'@'localhost';
