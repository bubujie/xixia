-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 05 月 27 日 14:58
-- 服务器版本: 5.0.67
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `j15`
--

-- --------------------------------------------------------

--
-- 表的结构 `jos_domain`
--

CREATE TABLE IF NOT EXISTS `jos_domain` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `suffix` varchar(16) NOT NULL,
  `server` varchar(64) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- 导出表中的数据 `jos_domain`
--

INSERT INTO `jos_domain` (`id`, `suffix`, `server`, `keyword`, `state`) VALUES
(1, 'ac.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(2, 'bj.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(3, 'sh.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(4, 'tj.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(5, 'cq.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(6, 'he.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(7, 'sx.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(8, 'nm.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(9, 'ln.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(10, 'jl.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(11, 'hl.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(12, 'js.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(13, 'zj.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(14, 'ah.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(15, 'fj.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(16, 'jx.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(17, 'sd.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(18, 'ha.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(19, 'hb.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(20, 'hn.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(21, 'gd.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(22, 'gx.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(23, 'hi.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(24, 'sc.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(25, 'gz.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(26, 'yn.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(27, 'xz.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(28, 'sn.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(29, 'gs.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(30, 'qh.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(31, 'nx.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(32, 'xj.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(33, 'tw.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(34, 'hk.cn', 'whois.cnnic.net.cn', 'no matching record.', 1),
(35, 'mo.cn', 'whois.cnnic.net.cn', 'no matching record.', 1);
