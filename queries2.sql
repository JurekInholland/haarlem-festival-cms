CREATE TABLE `cms_login_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` char(64) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB;

CREATE TABLE `cms_customer_data` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `lastname` varchar(50) DEFAULT NULL,
  `customer_address` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
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

INSERT INTO `restaurants` (`id`, `name`, `address`, `food_type`, `weekdays`)
VALUES
	(1, 'Restaurant Mr. & Mrs.', 'Lange Veerstraat 4, 2011 DB Haarlem, Nederland', NULL, NULL),
	(2, 'Ratatouille', 'Spaarne 96, 2011 CL Haarlem, Nederland', NULL, NULL),
	(3, 'Restaurant ML', 'Kleine Houtstraat 70, 2011 DR Haarlem, Nederland', NULL, NULL);
