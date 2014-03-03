-- --------------------------------------------------------
-- Zone（洲际）
-- --------------------------------------------------------
DROP TABLE `ps_zone`;
CREATE TABLE IF NOT EXISTS `ps_zone` (
  `id_zone` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(64) NOT NULL,
  `active` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id_zone`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
INSERT INTO `ps_zone` (`id_zone`, `name`, `active`) VALUES
(1, '亚洲', 1);
-- --------------------------------------------------------
-- Country（国别）
-- --------------------------------------------------------
DROP TABLE `ps_country`;
CREATE TABLE IF NOT EXISTS `ps_country` (
  `id_country` int(10) unsigned NOT NULL auto_increment,
  `id_zone` int(10) unsigned NOT NULL,
  `id_currency` int(10) unsigned NOT NULL default '0',
  `iso_code` varchar(3) NOT NULL,
  `call_prefix` int(10) NOT NULL default '0',
  `active` tinyint(1) unsigned NOT NULL default '0',
  `contains_states` tinyint(1) NOT NULL default '0',
  `need_identification_number` tinyint(1) NOT NULL default '0',
  `need_zip_code` tinyint(1) NOT NULL default '1',
  `zip_code_format` varchar(12) NOT NULL default '',
  `display_tax_label` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id_country`),
  KEY `country_iso_code` (`iso_code`),
  KEY `country_` (`id_zone`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
INSERT INTO `ps_country` (`id_country`, `id_zone`, `id_currency`, `iso_code`, `call_prefix`, `active`, `contains_states`, `need_identification_number`, `need_zip_code`, `zip_code_format`, `display_tax_label`) VALUES
(1, 1, 0, 'CN', 86, 1, 1, 0, 1, 'NNNNNN', 1);
-- --------------------------------------------------------
DROP TABLE `ps_country_lang`;
CREATE TABLE IF NOT EXISTS `ps_country_lang` (
  `id_country` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY  (`id_country`,`id_lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `ps_country_lang` (`id_country`, `id_lang`, `name`) VALUES
(1, 1, '中国');
-- --------------------------------------------------------
-- State（省/自治区/直辖市/州）
-- --------------------------------------------------------
DROP TABLE `ps_state`;
CREATE TABLE IF NOT EXISTS `ps_state` (
  `id_state` int(10) unsigned NOT NULL auto_increment,
  `id_country` int(11) unsigned NOT NULL,
  `id_zone` int(11) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `iso_code` char(4) NOT NULL,
  `tax_behavior` smallint(1) NOT NULL default '0',
  `active` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id_state`),
  KEY `id_country` (`id_country`),
  KEY `id_zone` (`id_zone`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
INSERT INTO `ps_state` (`id_state`, `id_country`, `id_zone`, `name`, `iso_code`, `tax_behavior`, `active`) VALUES
(1, 1, 1, '宁夏回族自治区', '64', 0, 1),
(2, 0, 1, '北京市', '11', 0, 0),
(3, 0, 1, '天津市', '12', 0, 0),
(4, 0, 1, '河北省', '13', 0, 0),
(5, 0, 1, '山西省', '14', 0, 0),
(6, 0, 1, '内蒙古自治区', '15', 0, 0),
(7, 0, 1, '辽宁省', '21', 0, 0),
(8, 0, 1, '吉林省', '22', 0, 0),
(9, 0, 1, '黑龙江省', '23', 0, 0),
(10, 0, 1, '上海市', '31', 0, 0),
(11, 0, 1, '江苏省', '32', 0, 0),
(12, 0, 1, '浙江省', '33', 0, 0),
(13, 0, 1, '安徽省', '34', 0, 0),
(14, 0, 1, '福建省', '35', 0, 0),
(15, 0, 1, '江西省', '36', 0, 0),
(16, 0, 1, '山东省', '37', 0, 0),
(17, 0, 1, '河南省', '41', 0, 0),
(18, 0, 1, '湖北省', '42', 0, 0),
(19, 0, 1, '湖南省', '43', 0, 0),
(20, 0, 1, '广东省', '44', 0, 0),
(21, 0, 1, '广西壮族自治区', '45', 0, 0),
(22, 0, 1, '海南省', '46', 0, 0),
(23, 0, 1, '重庆市', '50', 0, 0),
(24, 0, 1, '四川省', '51', 0, 0),
(25, 0, 1, '贵州省', '52', 0, 0),
(26, 0, 1, '云南省', '53', 0, 0),
(27, 0, 1, '西藏自治区', '54', 0, 0),
(28, 0, 1, '陕西省', '61', 0, 0),
(29, 0, 1, '甘肃省', '62', 0, 0),
(30, 0, 1, '青海省', '63', 0, 0),
(31, 0, 1, '新疆维吾尔自治区', '65', 0, 0),
(32, 0, 1, '台湾', '71', 0, 0),
(33, 0, 1, '香港特别行政区', '91', 0, 0),
(34, 0, 1, '澳门特别行政区', '92', 0, 0);
-- --------------------------------------------------------
-- County（市/县）
-- --------------------------------------------------------
DROP TABLE `ps_county`;
CREATE TABLE IF NOT EXISTS `ps_county` (
  `id_county` int(11) NOT NULL auto_increment,
  `name` varchar(64) NOT NULL,
  `id_state` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id_county`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `ps_county` (`id_county`, `name`, `id_state`, `active`) VALUES
(1, '银川市', 1, 1);
-- --------------------------------------------------------
-- Address Format（地址格式）
-- --------------------------------------------------------
DROP TABLE `ps_address_format`;
CREATE TABLE IF NOT EXISTS `ps_address_format` (
  `id_country` int(10) unsigned NOT NULL,
  `format` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id_country`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `ps_address_format` (`id_country`, `format`) VALUES
(1, 'firstname lastname\ncompany\nvat_number\naddress1\naddress2\npostcode city\nCountry:name\nphone');
-- --------------------------------------------------------
-- Timezone（时区）
-- --------------------------------------------------------
DROP TABLE `ps_timezone`;
CREATE TABLE IF NOT EXISTS `ps_timezone` (
  `id_timezone` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY  (`id_timezone`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=561 ;
INSERT INTO `ps_timezone` (`id_timezone`, `name`) VALUES
(1, 'PRC');
-- --------------------------------------------------------
-- Language（语言）
-- --------------------------------------------------------
DROP TABLE `ps_lang`;
CREATE TABLE IF NOT EXISTS `ps_lang` (
  `id_lang` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(32) NOT NULL,
  `active` tinyint(3) unsigned NOT NULL default '0',
  `iso_code` char(5) NOT NULL,
  `language_code` char(5) NOT NULL,
  `date_format_lite` char(32) NOT NULL default 'Y-m-d',
  `date_format_full` char(32) NOT NULL default 'Y-m-d H:i:s',
  `is_rtl` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id_lang`),
  KEY `lang_iso_code` (`iso_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
INSERT INTO `ps_lang` (`id_lang`, `name`, `active`, `iso_code`, `language_code`, `date_format_lite`, `date_format_full`, `is_rtl`) VALUES
(1, '简体中文', 1, 'zh-cn', 'zh-cn', 'Y-m-d', 'Y-m-d H:i:s', 0);
-- --------------------------------------------------------
-- Currency（货币）
-- --------------------------------------------------------
DROP TABLE `ps_currency`;
CREATE TABLE IF NOT EXISTS `ps_currency` (
  `id_currency` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(32) NOT NULL,
  `iso_code` varchar(3) NOT NULL default '0',
  `iso_code_num` varchar(3) NOT NULL default '0',
  `sign` varchar(8) NOT NULL,
  `blank` tinyint(1) unsigned NOT NULL default '0',
  `format` tinyint(1) unsigned NOT NULL default '0',
  `decimals` tinyint(1) unsigned NOT NULL default '1',
  `conversion_rate` decimal(13,6) NOT NULL,
  `deleted` tinyint(1) unsigned NOT NULL default '0',
  `active` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`id_currency`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
INSERT INTO `ps_currency` (`id_currency`, `name`, `iso_code`, `iso_code_num`, `sign`, `blank`, `format`, `decimals`, `conversion_rate`, `deleted`, `active`) VALUES
(1, '人民币', 'CNY', '156', '¥', 1, 3, 1, 1.000000, 0, 1);
