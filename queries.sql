-- Festival Setup

-- NEW EVENTS
CREATE TABLE `new_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `location` varchar(200) NOT NULL DEFAULT '',
  `category` tinyint(4) NOT NULL DEFAULT '0',
  `price` double DEFAULT 0,
  `artist` varchar(100) NOT NULL,
  `subject` int(11) NULL,
  `slug` varchar(100) NOT NULL,
  
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- final events table
CREATE TABLE `festival_events` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`type` INT(11) NOT NULL,
	`start_date` DATETIME NULL DEFAULT NULL,
	`end_date` DATETIME NULL DEFAULT NULL,
	`address` VARCHAR(100) NULL DEFAULT NULL,
	`location_detail` VARCHAR(100) NULL DEFAULT NULL,
	`name` VARCHAR(100) NOT NULL,
	`tickets` INT(11) NULL DEFAULT NULL,
	`price` DOUBLE NULL DEFAULT NULL,
	`description` TEXT NULL,
	`rating` INT(11) NULL DEFAULT NULL,
	`image` VARCHAR(100) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
ENGINE=InnoDB;


-- Tickets
CREATE TABLE `tickets` (
	`ticket_id` CHAR(24) NOT NULL,
	`user_id` INT(11) NOT NULL,
	`event_id` INT(11) NOT NULL,
	`amount` INT(11) NOT NULL,
	`paid` TINYINT(4) NULL DEFAULT '0',
	`scanned` TINYINT(4) NULL DEFAULT '0',
	`order_date` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
	`paid_date` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`ticket_id`)
)
ENGINE=InnoDB
;

-- Static pages
CREATE TABLE `static_pages` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`slug` VARCHAR(50) NULL DEFAULT NULL,
	`headline` VARCHAR(50) NULL DEFAULT NULL,
	`content` TEXT NULL,
	`edited` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Event Categories
CREATE TABLE `event_categories` (
	`id` INT(11) NOT NULL,
	`category` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE 'utf8_bin'
ENGINE=InnoDB
;

INSERT INTO `event_categories` (`id`, `category`) VALUES (0, 'Haarlem Jazz');
INSERT INTO `event_categories` (`id`, `category`) VALUES (1, 'Haarlem Dance');
INSERT INTO `event_categories` (`id`, `category`) VALUES (2, 'Haarlem Food');
INSERT INTO `event_categories` (`id`, `category`) VALUES (3, 'Haarlem Historic');

-- Event locations
CREATE TABLE `event_locations` (
	`id` INT(11) NOT NULL,
	`location` VARCHAR(100) NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE 'utf8_bin'
ENGINE=InnoDB
;

INSERT INTO `event_locations` (`id`, `location`) VALUES (0, 'Patronaat, Main Hall');
INSERT INTO `event_locations` (`id`, `location`) VALUES (1, 'Patronaat, Second Hall');
INSERT INTO `event_locations` (`id`, `location`) VALUES (2, 'Patronaat, Third Hall');
INSERT INTO `event_locations` (`id`, `location`) VALUES (3, 'Grote Markt');


CREATE TABLE `festival_info` (
	`start_date` DATETIME NULL DEFAULT NULL,
	`end_date` DATETIME NULL DEFAULT NULL
)
ENGINE=InnoDB
;

CREATE TABLE `events` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(100) NOT NULL,
	`description` TEXT NOT NULL,
	`start_time` DATETIME NOT NULL,
	`end_time` DATETIME NOT NULL,
	`location` VARCHAR(200) NOT NULL,
	`category` TINYINT(4) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`)
)
ENGINE=InnoDB
;

INSERT INTO `new_events` (`id`, `artist`, `description`, `startDate`, `endDate`, `location`, `category`, `price`, `slug`) VALUES (3, 'Jonna Frazer', 'Jonna Fraser is a Dutch rapper of Surinamese descent. He has a broad Dutch hop-style that varies from gangster tap to sultry soul.', '2020-06-26 21:00:00', '2020-06-26 22:00:00', '1', 0, 15.5, 'jonna-frazer');
INSERT INTO `new_events` (`id`, `artist`, `description`, `startDate`, `endDate`, `location`, `category`, `price`, `slug`) VALUES (8, 'Hardwell', 'Robbert van de Corput, known professionally as Hardwell, is a Dutch DJ, record producer and remixer from Breda, North Brabant. Hardwell was voted the world\'s number one DJ on DJ Mag in 2013 and again in 2014. He was ranked at number three in the top 100 DJs 2018 poll by DJ Mag.', '2020-06-26 22:00:00', '2020-06-26 00:00:00', '4', 1, 25, 'hardwell');
INSERT INTO `new_events` (`id`, `artist`, `description`, `startDate`, `endDate`, `location`, `category`, `price`, `slug`) VALUES (9, 'Gare du Nord', 'Gare du Nord is a Dutch-Belgian jazz band, originally consisting of Doc (Ferdi Lancee) and Inca (Barend Fransen). Doc played guitar and Inca played saxophone.', '2020-06-27 18:00:00', '2020-06-27 19:00:00', '0', 0, 5, 'gare-du-nord');
INSERT INTO `new_events` (`id`, `artist`, `description`, `startDate`, `endDate`, `location`, `category`, `price`, `slug`) VALUES (10, 'Ratatouille', 'Het succesvolle restaurant aan het spaarne in haarlem van chef kok Jozua Jaring is â€“ net als ratatouille â€“ een mix van de Franse keuken in de realiteit van vandaag met uitmuntende prijs-kwaliteitverhouding in een laagdrempelige omgeving. Zo zijn we in 2013 gestart in de Lange Veerstraat en zo gaan we na de verhuizing in 2015...', '2020-06-27 22:00:00', '2020-06-27 00:00:00', '4', 2, 25, 'ratatouille');
INSERT INTO `new_events` (`id`, `artist`, `description`, `startDate`, `endDate`, `location`, `category`, `price`, `slug`) VALUES (12, 'test', 'example', '2020-06-30 18:30:00', '2020-06-30 21:00:00', '1', 2, 12.5, 'test');
INSERT INTO `new_events` (`id`, `artist`, `description`, `startDate`, `endDate`, `location`, `category`, `price`, `slug`) VALUES (17, 'Restaurant Fris', 'Fris is gelegen in een rustige woonwijk nabij het Frederikspark te Haarlem.  Bij restaurant Fris staan passie en respect voor het product voorop en dat proef je. Niet al te veel poespas, maar juist pure smaken vanuit de klassieke Franse keuken met spannende invloeden uit Zuidoost-AziÃ«. Vooral smaken die passen bij het....', '2020-06-25 17:00:00', '2020-06-25 19:00:00', '4', 2, 25.33, 'restaurant-fris');
INSERT INTO `new_events` (`id`, `artist`, `description`, `startDate`, `endDate`, `location`, `category`, `price`, `slug`) VALUES (18, 'TiÃ«sto', 'Tijs Michiel Verwest OON, better known by his stage name TiÃ«sto, is a Dutch DJ and record producer from Breda. He was named "the Greatest DJ of All Time" by Mix magazine in a poll voted by the fans. In 2013, he was voted by DJ Mag readers as the "best DJ of the last 20 years". ', '2020-06-28 21:00:00', '2020-06-28 22:00:00', '4', 1, 50, 'ti-sto');


CREATE TABLE `cms_users` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(50) NOT NULL,
	`email` VARCHAR(100) NOT NULL,
	`password` VARCHAR(200) NOT NULL,
	`role` TINYINT(4) NOT NULL DEFAULT '0',
	`registration_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
)
ENGINE=InnoDB
;



-- Debug locations
INSERT INTO `event_locations` (`id`, `name`, `address`, `category`)
VALUES
	(1, 'Patronaat', 'Main Hall', 0),
	(2, 'Patronaat', 'Second Hall', 0),
	(3, 'Grote Markt', '', 0),
	(4, 'Ratatouille', 'Spaarne 96, 2011 CL Haarlem, Nederland', 1),
	(5, 'Restaurant ML', 'Kleine Houtstraat 70, 2011 DR Haarlem, Nederland', 1),
	(6, 'Club Stalker', 'Kromme Elleboogsteeg 20, 2011 TS Haarlem', 2),
	(7, 'Caprera Openluchttheater ', 'Hoge Duin en Daalseweg 2, 2061 AG Bloemendaal', 2);
