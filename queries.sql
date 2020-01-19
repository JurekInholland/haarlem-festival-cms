DROP TABLE IF EXISTS new_events, festival_events, tickets, static_pages, event_categories,
event_locations, cms_users, cms_login_tokens, festival_info, cms_customer_data, invoices, restaurants;


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
    `slug` VARCHAR(100) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;


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
  `invoice_id` int(11) NULL DEFAULT NULL,
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
    `color` CHAR(6) NOT NULL DEFAULT '',
    `slug` VARCHAR(50) DEFAULT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;


-- Event locations
CREATE TABLE `event_locations` (
	`id` INT(11) NOT NULL,
    `name` VARCHAR(100) NOT NULL DEFAULT '',
    `address` VARCHAR(100) DEFAULT '',
    `category` INT(11) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;


CREATE TABLE `festival_info` (
	`start_date` DATETIME NULL DEFAULT NULL,
	`end_date` DATETIME NULL DEFAULT NULL
) ENGINE=InnoDB;


CREATE TABLE `cms_users` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(50) NOT NULL,
	`email` VARCHAR(100) NOT NULL,
	`password` VARCHAR(200) NOT NULL,
	`role` TINYINT(4) NOT NULL DEFAULT '0',
	`registration_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `cms_login_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` char(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
--   UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB;

CREATE TABLE `cms_customer_data` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `lastname` varchar(50) DEFAULT NULL,
  `customer_address` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB;

CREATE TABLE `invoices` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `invoice_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `restaurants` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `address` varchar(200) NOT NULL DEFAULT '',
  `food_type` text,
  `weekdays` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;


INSERT INTO `event_categories` (`id`, `category`, `color`, `slug`)
VALUES
    (0, 'Haarlem Jazz', '169BD5', 'jazz'),
    (1, 'Haarlem Dance', 'C32039', 'dance'),
    (2, 'Haarlem Food', 'F59F17', 'food');

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


INSERT INTO `festival_events` (`id`, `type`, `start_date`, `end_date`, `address`, `location_detail`, `name`, `tickets`, `price`, `description`, `rating`, `image`, `slug`)
VALUES
	(1, 0, '2020-08-27 18:00:00', '2020-08-27 19:00:00', 'Patroonaat', 'Main', 'Gumbo Kings', 300, 15, 'The Gumbo Kings are a five-piece band that combines the groove of new orleans with rough delta blues and the melody of soul from ancient Memphis.', NULL, NULL, 'gumbo-kings'),
	(3, 0, '2020-08-27 19:30:00', '2020-08-27 20:30:00', 'Patroonaat', 'Main', 'Evolve', 300, 15, 'Frederieke kroone brings a new generation of music that gives a spherical and soulful yet rocking live show. Expects an enchanting show with exciting stories with great climax and right arrangement.', NULL, NULL, 'evolve'),
	(4, 0, '2020-08-27 21:00:00', '2020-08-27 22:00:00', 'Patronaat', 'Main', 'Ntjam Rosie', 300, 15, 'Dutch-Cameroonian singer/songwriter from Rotterdam, The Netherlands. Her style is a mix of pop music, jazz and soul.', NULL, NULL, 'ntjam-rosie'),
	(5, 0, '2020-08-27 18:00:00', '2020-08-27 19:00:00', 'Patronaat', 'Second', 'Wicked Jazz Sounds', 200, 10, 'The Wicked Jazz sounds is the live band of wicked jazz sounds project; a music platform that brings jazz and dance together. Wicked Jazz Sounds were created in 2002.', NULL, NULL, 'wicked-jazz-sounds'),
	(6, 0, '2020-08-27 19:30:00', '2020-08-27 20:30:00', 'Patronaat', 'Second', 'Tom Thomsom Assemble', 200, 10, 'Tom Thomsom is a Dj and producer from Haarlem. His music has RnB & HipHop tunes.', NULL, NULL, 'tom-thomsom-assemble'),
	(7, 0, '2020-08-27 21:00:00', '2020-08-27 22:00:00', 'Patronaat', 'Second', 'Jonna Frazer', 200, 10, 'Jonna Frazer, is a Dutch rapper of Surinamese descent. he has a broad Dutch hop-style that varies from ganster rap to sultry soul.', NULL, NULL, 'jonna-frazer'),
	(8, 0, '2020-08-28 18:00:00', '2020-08-28 19:00:00', 'Patronaat', 'Main', 'Fox & The Mayors', 300, 15, 'A band from britain, best known for their solo moment where they show every members skill with their instruments.', NULL, NULL, 'fox-and-the-mayors'),
	(9, 0, '2020-08-28 19:30:00', '2020-08-28 20:30:00', 'Patronaat', 'Main', 'Uncle Sue', 300, 15, 'Uncle Sue is a seven-member Funk and Soul Band from Haarlem with its own story and swinging bladder section.', NULL, NULL, 'uncle-sue'),
	(10, 0, '2020-08-28 21:00:00', '2020-08-28 22:00:00', 'Patronaat', 'Main', 'Chris Allen', 300, 15, 'Kristopher Neil Allen is an American musician, singer and songwriter from Conway, Arkansas, and the winner of the eighth season of American Idol.', NULL, NULL, 'chris-allen'),
	(11, 0, '2020-08-28 18:00:00', '2020-08-28 19:00:00', 'Patronaat', 'Second', 'Myles Sandko', 200, 10, 'Sanko, who grew up in a small town on the coast of Ghana, later emigrated with his family to Great Britain. He sang and rapped as a youngster in Cambridge.', NULL, NULL, 'myles-sandko'),
	(12, 0, '2020-08-28 19:30:00', '2020-08-28 20:30:00', 'Patronaat', 'Second', 'Ruis SoundSystem', 200, 10, 'Consist of five members that plays jazz and blues with a mix of modern pop culture music.', NULL, NULL, 'ruis-soundsystem'),
	(15, 0, '2020-08-28 21:00:00', '2020-08-28 22:00:00', 'Patronaat', 'Second', 'The Family XL', 200, 10, 'In 2015, Xander Hubrecht decided that he wanted to be on stage again with his own work. He started a project called \"The Family XL\" and performed with it every mont in the Jopenkerk in Haarlem.', NULL, NULL, 'the-family-xl'),
	(16, 0, '2020-08-29 18:00:00', '2020-08-29 19:00:00', 'Patronaat', 'Main', 'Gare Du Nord', 300, 15, 'Gare du Nord is a Dutch-Belgian jazz band, originally consisting of Doc (Ferdi Lancee) and Inca (Barend Fransen). Doc played guitar and Inca played saxophone.', NULL, NULL, 'gare-du-nord'),
	(17, 0, '2020-08-29 19:30:00', '2020-08-29 20:30:00', 'Patronaat', 'Main', 'Rilan & The Bombadiers', 300, 15, 'With a sold out first clubtour, a booming festival season and tracks that have already been featured in a number of big Hollywood productions, (Netflix / HULU / FOX: Shooter, Shut Eye and Rosewood) this band has certainly been keeping busy.', NULL, NULL, 'rilan-and-the-bombadiers'),
	(18, 0, '2020-08-29 21:00:00', '2020-08-29 22:00:00', 'Patronaat', 'Main', 'Soul Six', 300, 15, 'Soul Six is (Moshe Tamir) from Tel Aviv Israel . One of the mainstays industry of electronic music in Israel & Responsible for many successful events in our country.', NULL, NULL, 'soul-six'),
	(19, 0, '2020-08-29 18:00:00', '2020-08-29 19:00:00', 'Patronaat', 'Third', 'Han Bennink', 150, 10, 'Drummer and multi-instrumentalist Han Bennink was born in Zaandam near Amsterdam in 1942. His first percussion instrument was a kitchen chair.', NULL, NULL, 'han-bennink'),
	(20, 0, '2020-08-29 19:30:00', '2020-08-29 20:30:00', 'Patronaat', 'Third', 'The Nordanians', 150, 10, 'When Oene van Geel viola, Mark Tuinstra guitar and Niti Ranjan Biswas tabla virtuoso played together for the first time there where immediately fireworks.', NULL, NULL, 'the-nordanians'),
	(21, 0, '2020-08-29 21:00:00', '2020-08-29 22:00:00', 'Patronaat', 'Third', 'Lilith Merlot', 150, 10, 'With its first release in two years, the single \"Prepping Men,\" Haarlem-based Lilith Merlot has introduced the audience to her new sound.', NULL, NULL, 'lilith-merlot'),
	(22, 0, '2020-08-30 15:00:00', '2020-08-30 16:00:00', 'Grote Markt', NULL, 'Ruis Soundsystem', NULL, 0, 'Consist of five members that plays jazz and blues with a mix of modern pop culture music..', NULL, NULL, 'ruis-soundsystem');


INSERT INTO `restaurants` (`id`, `name`, `address`, `food_type`, `weekdays`)
VALUES
	(1, 'Restaurant Mr. & Mrs.', 'Lange Veerstraat 4, 2011 DB Haarlem, Nederland', NULL, NULL),
	(2, 'Ratatouille', 'Spaarne 96, 2011 CL Haarlem, Nederland', NULL, NULL),
	(3, 'Restaurant ML', 'Kleine Houtstraat 70, 2011 DR Haarlem, Nederland', NULL, NULL);


INSERT INTO `static_pages` (`id`, `slug`, `headline`, `content`, `edited`, `menu`, `image`)
VALUES
	(28, 'links', 'Userful Links', 'here are some useful links\r\n', '2020-01-18 05:23:49', 1, NULL),
	(1, 'test', 'Test', 'This is a <u>test page</u>', '2020-01-17 05:07:24', 0, NULL),
	(20, 'parking', 'Parking', 'You can find detailed <b>parking</b> information here.', '2020-01-17 09:53:13', 1, NULL),
	(24, 'faq', 'FAQ', 'Frequently asked questions:\r\n<h1>Q: What is the meaning of life? </h1>\r\n<h3>A: Programming PHP apps. </h3>', '2020-01-17 09:56:11', 1, NULL),
	(27, 'about', 'About', 'about page', '2020-01-18 05:22:49', 1, NULL);

INSERT INTO `cms_users` (`id`, `username`, `email`, `password`, `role`, `registration_date`) VALUES (1, 'jurek', 'jurekmail', '$2y$10$ygG9cZdRUjrFOnYa2X7iIujA4fkeaXCdEPkrAeH4zTl/Garkn2Xie', 1, '2020-01-11 23:34:35');
INSERT INTO `cms_users` (`id`, `username`, `email`, `password`, `role`, `registration_date`) VALUES (2, 'admin', 'admin@mail.com', '$2y$10$jTf0H2Q9TRCPB6SSpVtpMOektMmhoesc6RixEk/c4knr/2N4jXZam', 1, '2020-01-18 19:38:59');
INSERT INTO `cms_users` (`id`, `username`, `email`, `password`, `role`, `registration_date`) VALUES (3, 'superadmin', 'superadmin@mail.com', '$2y$10$0I/u/vzyURrucGwGcmp7DOrgxNSH7cqPp3i6cJ6uGwfp17554pVZu', 2, '2020-01-18 19:39:00');
INSERT INTO `cms_users` (`id`, `username`, `email`, `password`, `role`, `registration_date`) VALUES (4, 'user', 'user@mail.com', '$2y$10$OO3f7uRoIfQ77mFqsQvAKOsIKeDQhCSjYF6lfkRzsMLqz4RZPQNU.', 0, '2020-01-18 20:09:21');

INSERT INTO `cms_customer_data` (`user_id`, `firstname`, `lastname`, `customer_address`, `phone`) VALUES (1, 'Jurek', 'Baumann', 'Donkere Spaarne 44, 2e', '123123123');

INSERT INTO `festival_info` (`start_date`, `end_date`) VALUES ('2020-06-26 08:00:00', '2020-06-29 22:00:00');

INSERT INTO `invoices` (`id`, `user_id`, `invoice_date`) VALUES (123, 1, '2020-01-18 19:49:53');

INSERT INTO `tickets` (`ticket_id`, `user_id`, `event_id`, `amount`, `IS_PAID`, `TICKET_SCANNED`, `order_date`, `paid_date`, `invoice_id`) VALUES ('aP8aDAjivJxCanbdLG', 1, 18, 2, 0, 0, '2020-01-18 20:54:38', NULL, 123);
INSERT INTO `tickets` (`ticket_id`, `user_id`, `event_id`, `amount`, `IS_PAID`, `TICKET_SCANNED`, `order_date`, `paid_date`, `invoice_id`) VALUES ('yAvcCkwSEYO8YyLw2R', 1, 10, 1, 0, 0, '2020-01-18 20:54:32', NULL, 123);

-- Food images
INSERT INTO `cms_images` (`image_id`, `image_name`) VALUES ('baZuFSLpFE77unSm', 'banner.png');
INSERT INTO `cms_images` (`image_id`, `image_name`) VALUES ('BF32DgzuB1yUOrbL', 'Mr-mrs-restaurant-Haarlem.jpg');
INSERT INTO `cms_images` (`image_id`, `image_name`) VALUES ('2YUXsYi53Xm11NqK', 'ratatouile.jpg');
INSERT INTO `cms_images` (`image_id`, `image_name`) VALUES ('V9QSLDwjnHSoaWGj', 'restaurant-ml.jpg');
INSERT INTO `cms_images` (`image_id`, `image_name`) VALUES ('jmE8vtwRAtB6txMi', 'restaurant-fris.jpg');
INSERT INTO `cms_images` (`image_id`, `image_name`) VALUES ('9F1u5TgNP1ONchv7', 'spektakel.jpg');
INSERT INTO `cms_images` (`image_id`, `image_name`) VALUES ('swIJ7MqHbBhH2GWQ', 'grand-cafe-brinkmann.jpg');
INSERT INTO `cms_images` (`image_id`, `image_name`) VALUES ('6YR8xNAfXCNkDTL3', 'urban frenchy.jpg');
INSERT INTO `cms_images` (`image_id`, `image_name`) VALUES ('yLklVCDYxwl4FlG4', 'golden bull.jpg');