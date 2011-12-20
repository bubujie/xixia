-- 普通用户建议去除知识库中IT方面的分类内容
-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2011 年 07 月 19 日 01:20
-- 服务器版本: 5.0.67
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `notebook`
--

--
-- 导出表中的数据 `jos_sections`
--

INSERT INTO `jos_sections` (`id`, `title`, `name`, `alias`, `image`, `scope`, `image_position`, `description`, `published`, `checked_out`, `checked_out_time`, `ordering`, `access`, `count`, `params`) VALUES
(1, '新闻中心', '', 'news', 'pastarchives.jpg', 'content', 'left', '<p>新闻中心，下设三个子栏目</p>\r\n<p><ol>\r\n<li>企业新闻</li>\r\n<li>新品快讯</li>\r\n<li>行业信息</li>\r\n</ol></p>', 1, 0, '0000-00-00 00:00:00', 1, 0, 18, ''),
(2, '关于我们', '', 'about', 'clock.jpg', 'content', 'left', '<p>关于我们单元，下设关于我们分类</p>', 1, 62, '2011-07-19 01:20:01', 2, 0, 1, ''),
(3, '客户服务', '', 'services', '', 'content', 'left', '<p>客户服务单元，下设客户服务分类</p>', 1, 0, '0000-00-00 00:00:00', 3, 0, 1, ''),
(4, '互动内容', '', 'interactive', '', 'content', 'left', '<p>互动内容，下设：下载频道、诚聘英才</p>', 1, 0, '0000-00-00 00:00:00', 4, 0, 8, ''),
(5, '知识库', '', 'knowledge', 'pastarchives.jpg', 'content', 'left', '', 1, 0, '0000-00-00 00:00:00', 5, 0, 17, '');

--
-- 导出表中的数据 `jos_categories`
--

INSERT INTO `jos_categories` (`id`, `parent_id`, `title`, `name`, `alias`, `image`, `section`, `image_position`, `description`, `published`, `checked_out`, `checked_out_time`, `editor`, `ordering`, `access`, `count`, `params`) VALUES
(1, 0, '企业新闻', '', 'news', '', '1', 'left', '', 1, 62, '2011-07-18 23:42:24', NULL, 1, 0, 0, ''),
(2, 0, '新品快讯', '', 'newproducts', 'taking_notes.jpg', '1', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, ''),
(3, 0, '行业信息', '', 'information', '', '1', 'left', '', 1, 62, '2011-07-18 23:42:04', NULL, 1, 0, 0, ''),
(4, 0, '关于我们', '', 'about', 'key.jpg', '2', 'right', '', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, ''),
(5, 0, '下载频道', '', 'download', '', '4', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(6, 0, '诚聘英才', '', 'recruitment', '', '4', 'left', '', 1, 62, '2011-07-18 23:42:28', NULL, 2, 0, 0, ''),
(7, 0, '客户服务', '', 'services', '', '3', 'left', '', 1, 62, '2011-07-18 23:40:16', NULL, 1, 0, 0, '');
