-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 06 月 08 日 22:38
-- 服务器版本: 5.0.67
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `joomla`
--

-- --------------------------------------------------------

--
-- 表的结构 `co73n_jacc_templates`
--

DROP TABLE `co73n_jacc_templates`;



CREATE TABLE IF NOT EXISTS `co73n_jacc_templates` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `version` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `use` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `published` tinyint(1) NOT NULL,
  `params` text NOT NULL,
  `ordering` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

--
-- 导出表中的数据 `co73n_jacc_templates`
--

INSERT INTO `co73n_jacc_templates` (`id`, `name`, `version`, `description`, `use`, `created`, `published`, `params`, `ordering`) VALUES
( 1, 'BBJ001', 'beta', '步步街商业客户定制模板，未向任何客户提供授权', 1, '2012-06-07 18:40:22', 1, '', 1),
( 2, 'BBJ002', 'beta', '步步街商业客户定制模板，未向任何客户提供授权', 1, '2012-06-07 18:40:22', 1, '', 1),
( 3, 'BBJ003', 'beta', '步步街商业客户定制模板，未向任何客户提供授权', 1, '2012-06-07 18:40:22', 1, '', 1),
( 4, 'BBJ004', 'beta', '步步街商业客户定制模板，未向任何客户提供授权', 1, '2012-06-07 18:40:22', 1, '', 1),
( 5, 'BBJ005', 'beta', '步步街商业客户定制模板，未向任何客户提供授权', 1, '2012-06-07 18:40:22', 1, '', 1),
( 6, 'BBJ006', 'beta', '步步街商业客户定制模板，未向任何客户提供授权', 1, '2012-06-07 18:40:22', 1, '', 1),
( 7, 'BBJ007', 'beta', '步步街商业客户定制模板，未向任何客户提供授权', 1, '2012-06-07 18:40:22', 1, '', 1),
( 8, 'BBJ008', 'beta', '步步街商业客户定制模板，未向任何客户提供授权', 1, '2012-06-07 18:40:22', 1, '', 1),
( 9, 'BBJ009', 'beta', '步步街商业客户定制模板，未向任何客户提供授权', 1, '2012-06-07 18:40:22', 1, '', 1),
(10, 'BBJ010', 'beta', '步步街商业客户定制模板，未向任何客户提供授权', 1, '2012-06-07 18:40:22', 1, '', 1);
