DROP TABLE IF EXISTS new_events, festival_events, tickets, static_pages, event_categories
event_locations, cms_users, festival_info;


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

) ENGINE=InnoDB;


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
	`image` CHAR(16) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

INSERT INTO festival_events (id, type, start_date, end_date, address, location_detail, name, tickets, price, description, rating, image)
VALUES (1, 0, )

-- Tickets
CREATE TABLE `tickets` (
  `ticket_id` char(18) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `IS_PAID` tinyint(4) DEFAULT '0',
  `TICKET_SCANNED` tinyint(4) DEFAULT '0',
  `order_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `paid_date` datetime DEFAULT NULL,
  PRIMARY KEY (`ticket_id`)
) ENGINE=InnoDB;

-- Static pages
CREATE TABLE `static_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(50) NOT NULL DEFAULT '',
  `headline` varchar(50) DEFAULT NULL,
  `content` text,
  `edited` datetime DEFAULT NULL,
  `menu` int(11) DEFAULT '0',
  `image` char(16) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB;

-- Event Categories
CREATE TABLE `event_categories` (
	`id` INT(11) NOT NULL,
	`category` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

INSERT INTO `event_categories` (`id`, `category`) VALUES (0, 'Haarlem Jazz');
INSERT INTO `event_categories` (`id`, `category`) VALUES (1, 'Haarlem Dance');
INSERT INTO `event_categories` (`id`, `category`) VALUES (2, 'Haarlem Food');
INSERT INTO `event_categories` (`id`, `category`) VALUES (3, 'Haarlem Historic');

-- Event locations
CREATE TABLE `event_locations` (
	`id` INT(11) NOT NULL,
	`location` VARCHAR(100) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;


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




INSERT INTO `festival_events` (`id`, `type`, `start_date`, `end_date`, `address`, `location_detail`, `name`, `tickets`, `price`, `description`, `rating`, `image`) VALUES
(1, 0, '2020-08-27 18:00:00', '2020-08-27 19:00:00', 'Patroonaat', 'Main', 'Gumbo Kings', 300, 15, 'The Gumbo Kings are a five-piece band that combines the groove of new orleans with rough delta blues and the melody of soul from ancient Memphis.', NULL, NULL),
(3, 0, '2020-08-27 19:30:00', '2020-08-27 20:30:00', 'Patroonaat', 'Main', 'Evolve', 300, 15, 'Frederieke kroone brings a new generation of music that gives a spherical and soulful yet rocking live show. Expects an enchanting show with exciting stories with great climax and right arrangement.', NULL, NULL),
(4, 0, '2020-08-27 21:00:00', '2020-08-27 22:00:00', 'Patronaat', 'Main', 'Ntjam Rosie', 300, 15, 'Dutch-Cameroonian singer/songwriter from Rotterdam, The Netherlands. Her style is a mix of pop music, jazz and soul.', NULL, NULL),
(5, 0, '2020-08-27 18:00:00', '2020-08-27 19:00:00', 'Patronaat', 'Second', 'Wicked Jazz Sounds', 200, 10, 'The Wicked Jazz sounds is the live band of wicked jazz sounds project; a music platform that brings jazz and dance together. Wicked Jazz Sounds were created in 2002.', NULL, NULL),
(6, 0, '2020-08-27 19:30:00', '2020-08-27 20:30:00', 'Patronaat', 'Second', 'Tom Thomsom Assemble', 200, 10, 'Tom Thomsom is a Dj and producer from Haarlem. His music has RnB & HipHop tunes.', NULL, NULL),
(7, 0, '2020-08-27 21:00:00', '2020-08-27 22:00:00', 'Patronaat', 'Second', 'Jonna Frazer', 200, 10, 'Jonna Frazer, is a Dutch rapper of Surinamese descent. he has a broad Dutch hop-style that varies from ganster rap to sultry soul.', NULL, NULL),
(8, 0, '2020-08-28 18:00:00', '2020-08-28 19:00:00', 'Patronaat', 'Main', 'Fox & The Mayors', 300, 15, 'A band from britain, best known for their solo moment where they show every members skill with their instruments.', NULL, NULL),
(9, 0, '2020-08-28 19:30:00', '2020-08-28 20:30:00', 'Patronaat', 'Main', 'Uncle Sue', 300, 15, 'Uncle Sue is a seven-member Funk and Soul Band from Haarlem with its own story and swinging bladder section.', NULL, NULL),
(10, 0, '2020-08-28 21:00:00', '2020-08-28 22:00:00', 'Patronaat', 'Main', 'Chris Allen', 300, 15, 'Kristopher Neil Allen is an American musician, singer and songwriter from Conway, Arkansas, and the winner of the eighth season of American Idol.', NULL, NULL),
(11, 0, '2020-08-28 18:00:00', '2020-08-28 19:00:00', 'Patronaat', 'Second', 'Myles Sandko', 200, 10, 'Sanko, who grew up in a small town on the coast of Ghana, later emigrated with his family to Great Britain. He sang and rapped as a youngster in Cambridge.', NULL, NULL),
(12, 0, '2020-08-28 19:30:00', '2020-08-28 20:30:00', 'Patronaat', 'Second', 'Ruis SoundSystem', 200, 10, 'Consist of five members that plays jazz and blues with a mix of modern pop culture music.', NULL, NULL),
(15, 0, '2020-08-28 21:00:00', '2020-08-28 22:00:00', 'Patronaat', 'Second', 'The Family XL', 200, 10, 'In 2015, Xander Hubrecht decided that he wanted to be on stage again with his own work. He started a project called \"The Family XL\" and performed with it every mont in the Jopenkerk in Haarlem.', NULL, NULL),
(16, 0, '2020-08-29 18:00:00', '2020-08-29 19:00:00', 'Patronaat', 'Main', 'Gare Du Nord', 300, 15, 'Gare du Nord is a Dutch-Belgian jazz band, originally consisting of Doc (Ferdi Lancee) and Inca (Barend Fransen). Doc played guitar and Inca played saxophone.', NULL, NULL),
(17, 0, '2020-08-29 19:30:00', '2020-08-29 20:30:00', 'Patronaat', 'Main', 'Rilan & The Bombadiers', 300, 15, 'With a sold out first clubtour, a booming festival season and tracks that have already been featured in a number of big Hollywood productions, (Netflix / HULU / FOX: Shooter, Shut Eye and Rosewood) this band has certainly been keeping busy.', NULL, NULL),
(18, 0, '2020-08-29 21:00:00', '2020-08-29 22:00:00', 'Patronaat', 'Main', 'Soul Six', 300, 15, 'Soul Six is (Moshe Tamir) from Tel Aviv Israel . One of the mainstays industry of electronic music in Israel & Responsible for many successful events in our country.', NULL, NULL),
(19, 0, '2020-08-29 18:00:00', '2020-08-29 19:00:00', 'Patronaat', 'Third', 'Han Bennink', 150, 10, 'Drummer and multi-instrumentalist Han Bennink was born in Zaandam near Amsterdam in 1942. His first percussion instrument was a kitchen chair.', NULL, NULL),
(20, 0, '2020-08-29 19:30:00', '2020-08-29 20:30:00', 'Patronaat', 'Third', 'The Nordanians', 150, 10, 'When Oene van Geel viola, Mark Tuinstra guitar and Niti Ranjan Biswas tabla virtuoso played together for the first time there where immediately fireworks.', NULL, NULL),
(21, 0, '2020-08-29 21:00:00', '2020-08-29 22:00:00', 'Patronaat', 'Third', 'Lilith Merlot', 150, 10, 'With its first release in two years, the single \"Prepping Men,\" Haarlem-based Lilith Merlot has introduced the audience to her new sound.', NULL, NULL),
(22, 0, '2020-08-30 15:00:00', '2020-08-30 16:00:00', 'Grote Markt', NULL, 'Ruis Soundsystem', NULL, 0, 'Consist of five members that plays jazz and blues with a mix of modern pop culture music..', NULL, NULL);
