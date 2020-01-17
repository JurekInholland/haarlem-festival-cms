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
  `address` varchar(100) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB;