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


INSERT INTO `static_pages` (`id`, `slug`, `headline`, `content`, `edited`, `menu`, `image`)
VALUES
	(28, 'links', 'Userful Links', 'here are some useful links\r\n', '2020-01-18 05:23:49', 1, NULL),
	(1, 'test', 'Test', 'This is a <u>test page</u>', '2020-01-17 05:07:24', 0, NULL),
	(20, 'parking', 'Parking', 'You can find detailed <b>parking</b> information here.', '2020-01-17 09:53:13', 1, NULL),
	(24, 'faq', 'FAQ', 'Frequently asked questions:\r\n<h1>Q: What is the meaning of life? </h1>\r\n<h3>A: Programming PHP apps. </h3>', '2020-01-17 09:56:11', 1, NULL),
	(27, 'about', 'About', 'about page', '2020-01-18 05:22:49', 1, NULL);
