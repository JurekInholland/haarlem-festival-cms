DROP TABLE `event_categories`;
DROP TABLE `festival_info`;

CREATE TABLE `event_categories` (
	`id` INT(11) NOT NULL,
	`category` VARCHAR(50) NOT NULL,
	`color` CHAR(6) NOT NULL,
	`slug` VARCHAR(50) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
ENGINE=InnoDB
;

CREATE TABLE `festival_info` (
	`start_date` DATETIME NULL DEFAULT NULL,
	`end_date` DATETIME NULL DEFAULT NULL
)
ENGINE=InnoDB
;

INSERT INTO `event_categories` (`id`, `category`, `color`, `slug`) VALUES (0, 'Haarlem Jazz', '169BD5', 'jazz');
INSERT INTO `event_categories` (`id`, `category`, `color`, `slug`) VALUES (1, 'Haarlem Dance', 'C32039', 'dance');
INSERT INTO `event_categories` (`id`, `category`, `color`, `slug`) VALUES (2, 'Haarlem Food', 'F59F17', 'food');

INSERT INTO `festival_info` (`start_date`, `end_date`) VALUES ('2020-06-26 08:00:00', '2020-06-29 22:00:00');
