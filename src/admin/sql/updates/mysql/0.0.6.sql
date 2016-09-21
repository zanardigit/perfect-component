DROP TABLE IF EXISTS `#__helloworld_messages`;

CREATE TABLE `#__helloworld_messages` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`greeting` VARCHAR(25) NOT NULL,
	`published` tinyint(4) NOT NULL,
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;

INSERT INTO `#__helloworld_messages` (`greeting`) VALUES
('Hello World!'),
('Good bye World!');
