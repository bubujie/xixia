-- --------------------------------------------------------
-- 对 ps_store
-- --------------------------------------------------------
DROP TABLE `ps_store`;
CREATE TABLE IF NOT EXISTS `ps_store` (
  `id_store` int(10) unsigned NOT NULL auto_increment,
  `id_country` int(10) unsigned NOT NULL,
  `id_state` int(10) unsigned default NULL,
  `name` varchar(128) NOT NULL,
  `address1` varchar(128) NOT NULL,
  `address2` varchar(128) default NULL,
  `city` varchar(64) NOT NULL,
  `postcode` varchar(12) NOT NULL,
  `latitude` decimal(11,8) default NULL,
  `longitude` decimal(11,8) default NULL,
  `hours` varchar(254) default NULL,
  `phone` varchar(16) default NULL,
  `fax` varchar(16) default NULL,
  `email` varchar(128) default NULL,
  `note` text,
  `active` tinyint(1) unsigned NOT NULL default '0',
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  PRIMARY KEY  (`id_store`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
INSERT INTO `ps_store` (`id_store`, `id_country`, `id_state`, `name`, `address1`, `address2`, `city`, `postcode`, `latitude`, `longitude`, `hours`, `phone`, `fax`, `email`, `note`, `active`, `date_add`, `date_upd`) VALUES
(1, 1, 1, '步步街商行', '金凤区灵芝巷', '盈南村新村部西200米158号', '银川市', '750002', 38.478454, 106.243629, 'a:7:{i:0;s:13:"09:00 - 19:00";i:1;s:13:"09:00 - 19:00";i:2;s:13:"09:00 - 19:00";i:3;s:13:"09:00 - 19:00";i:4;s:13:"09:00 - 19:00";i:5;s:13:"10:00 - 16:00";i:6;s:13:"10:00 - 16:00";}', '0951-5171019', '', 'service@bubujie.com', '', 1, '2012-01-05 09:00:00', '2012-01-05 09:00:00');
