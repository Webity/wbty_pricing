
		
	CREATE TABLE IF NOT EXISTS `#__wbty_pricing_option_types` (
	`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`ordering` INT(11)  NOT NULL ,
	`state` TINYINT(1)  NOT NULL DEFAULT '1',
	`checked_out` INT(11)  NOT NULL ,
	`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
	`created_by` INT(11)  NOT NULL ,
	`created_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
	`modified_by` INT(11)  NOT NULL ,
	`modified_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
	`name` VARCHAR(255) NOT NULL,
		PRIMARY KEY (`id`),
		KEY `name` (`name`)
	) ENGINE=InnoDB DEFAULT COLLATE=utf8_general_ci;
				
				
	INSERT INTO `#__wbty_pricing_option_types` SET name='Dropdown Select';
				
	INSERT INTO `#__wbty_pricing_option_types` SET name='Radio Buttons';
				
	INSERT INTO `#__wbty_pricing_option_types` SET name='Text Box';
		
	CREATE TABLE IF NOT EXISTS `#__wbty_pricing_pricing_sets` (
	`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`ordering` INT(11)  NOT NULL ,
	`state` TINYINT(1)  NOT NULL DEFAULT '1',
	`checked_out` INT(11)  NOT NULL ,
	`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
	`created_by` INT(11)  NOT NULL ,
	`created_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
	`modified_by` INT(11)  NOT NULL ,
	`modified_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
	`name` VARCHAR(255) NOT NULL,
		`base_price` VARCHAR(255) NOT NULL,
		PRIMARY KEY (`id`),
		KEY `name` (`name`)
	) ENGINE=InnoDB DEFAULT COLLATE=utf8_general_ci;
				
		
	CREATE TABLE IF NOT EXISTS `#__wbty_pricing_options` (
	`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`ordering` INT(11)  NOT NULL ,
	`state` TINYINT(1)  NOT NULL DEFAULT '1',
	`checked_out` INT(11)  NOT NULL ,
	`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
	`created_by` INT(11)  NOT NULL ,
	`created_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
	`modified_by` INT(11)  NOT NULL ,
	`modified_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
	`option_type` INT(11) NOT NULL,
		`name` VARCHAR(255) NOT NULL,
		PRIMARY KEY (`id`),
		KEY `name` (`name`)
	) ENGINE=InnoDB DEFAULT COLLATE=utf8_general_ci;
				
		
	CREATE TABLE IF NOT EXISTS `#__wbty_pricing_option_items` (
	`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`ordering` INT(11)  NOT NULL ,
	`state` TINYINT(1)  NOT NULL DEFAULT '1',
	`checked_out` INT(11)  NOT NULL ,
	`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
	`created_by` INT(11)  NOT NULL ,
	`created_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
	`modified_by` INT(11)  NOT NULL ,
	`modified_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
	`title` VARCHAR(255) NOT NULL,
		`price_change` VARCHAR(255) NOT NULL,
		`price_change_type` INT(11) NOT NULL,
		`option_id` INT(11)  NOT NULL ,
	PRIMARY KEY (`id`),
		KEY `title` (`title`)
	) ENGINE=InnoDB DEFAULT COLLATE=utf8_general_ci;
				
		
	CREATE TABLE IF NOT EXISTS `#__wbty_pricing_pricing_set_options` (
	`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`ordering` INT(11)  NOT NULL ,
	`state` TINYINT(1)  NOT NULL DEFAULT '1',
	`checked_out` INT(11)  NOT NULL ,
	`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
	`created_by` INT(11)  NOT NULL ,
	`created_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
	`modified_by` INT(11)  NOT NULL ,
	`modified_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
	`options` INT(11) NOT NULL,
		`pricing_set_id` INT(11)  NOT NULL ,
	PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT COLLATE=utf8_general_ci;
				