-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- 主机: 173.201.217.6
-- 生成日期: 2011 年 09 月 04 日 23:15
-- 服务器版本: 5.0.91
-- PHP 版本: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `mdax`
--

-- --------------------------------------------------------

--
-- 表的结构 `jos_contact_details`
--

CREATE TABLE `jos_contact_details` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `con_position` varchar(255) default NULL,
  `address` text,
  `suburb` varchar(100) default NULL,
  `state` varchar(100) default NULL,
  `country` varchar(100) default NULL,
  `postcode` varchar(100) default NULL,
  `telephone` varchar(255) default NULL,
  `fax` varchar(255) default NULL,
  `misc` mediumtext,
  `image` varchar(255) default NULL,
  `imagepos` varchar(20) default NULL,
  `email_to` varchar(255) default NULL,
  `default_con` tinyint(1) unsigned NOT NULL default '0',
  `published` tinyint(1) unsigned NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  `user_id` int(11) NOT NULL default '0',
  `catid` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `mobile` varchar(255) NOT NULL default '',
  `webpage` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 导出表中的数据 `jos_contact_details`
--

INSERT INTO `jos_contact_details` VALUES(1, '联系我们', '2011-07-25-01-06-48', '步步街网络服务中心', '灵芝巷', '银川市', '宁夏回族自治区', '中国', '750002', '0951-5171019', '', '', '', NULL, 'bubujie@qq.com', 0, 1, 0, '0000-00-00 00:00:00', 1, 'show_name=1\nshow_position=1\nshow_email=1\nshow_street_address=1\nshow_suburb=1\nshow_state=1\nshow_postcode=1\nshow_country=1\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nshow_webpage=1\nshow_misc=1\nshow_image=1\nallow_vcard=0\ncontact_icons=0\nicon_address=\nicon_email=\nicon_telephone=indent5.png\nicon_mobile=indent5.png\nicon_fax=indent5.png\nicon_misc=\nshow_email_form=1\nemail_description=\nshow_email_copy=1\nbanned_email=\nbanned_subject=\nbanned_text=', 62, 16, 0, '15809503950', 'http://www.bubujie.net/');
