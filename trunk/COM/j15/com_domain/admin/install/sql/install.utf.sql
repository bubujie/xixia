DROP TABLE IF EXISTS `#__domain`;

CREATE TABLE `#__domain` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `greeting` VARCHAR(25) NOT NULL,
  `keywrod` VARCHAR(50) NOT NULL,
  `format` VARCHAR(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `#__domain` (`greeting`)
VALUES
('Hello, World!'),
('Bonjour, Monde!'),
('Ciao, Mondo!'),
('Hallo, Welt ;)');