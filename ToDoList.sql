CREATE DATABASE IF NOT EXISTS `to_do_list` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `to_do_list`;

CREATE TABLE IF NOT EXISTS `lists` (
	`list_id` int(11) NOT NULL AUTO_INCREMENT,
	`list_name` varchar(50) DEFAULT NULL,
	PRIMARY KEY (`list_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `objects` (
	`object_id` int(11) NOT NULL AUTO_INCREMENT,
  `list_id` int(11) NOT NULL,
	`object_description` varchar(50) DEFAULT NULL,
  `object_status` int(11) NOT NULL,
	PRIMARY KEY (`object_id`),
  FOREIGN KEY (`list_id`) REFERENCES `lists`(`list_id`) ON DELETE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
