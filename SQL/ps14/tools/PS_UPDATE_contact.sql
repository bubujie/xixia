-- --------------------------------------------------------
-- 表的结构 `ps_contact`
-- --------------------------------------------------------
DROP TABLE `ps_contact`;
CREATE TABLE IF NOT EXISTS `ps_contact` (
  `id_contact` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `customer_service` tinyint(1) NOT NULL DEFAULT '0',
  `position` tinyint(2) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_contact`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
INSERT INTO `ps_contact` (`id_contact`, `email`, `customer_service`, `position`) VALUES
(1, 'admin@bubujie.com', 1, 0),
(2, 'service@bubujie.com', 1, 0),
(3, 'support@bubujie.com', 1, 0),
(4, 'complaint@bubujie.com', 1, 0);



-- --------------------------------------------------------
-- 表的结构 `ps_contact_lang`
-- --------------------------------------------------------
DROP TABLE `ps_contact_lang`;
CREATE TABLE IF NOT EXISTS `ps_contact_lang` (
  `id_contact` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text,
  UNIQUE KEY `contact_lang_index` (`id_contact`,`id_lang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `ps_contact_lang` (`id_contact`, `id_lang`, `name`, `description`) VALUES
(1, 1, '网站管理员', '如果出现网站技术问题请联系“网站管理员”。'),
(2, 1, '客服人员', '如果有关于本店商品和支付方面的问题请联系“客服人员”。'),
(3, 1, '招商合作', '有合作意向请联系负责“招商合作”的人员。'),
(4, 1, '投诉受理', '如有关于商品质量和服务方面的投诉，请联系“投诉受理”。');
