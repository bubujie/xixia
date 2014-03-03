-- phpMyAdmin SQL Dump
-- version 2.11.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 04 月 11 日 14:26
-- 服务器版本: 5.1.45
-- PHP 版本: 5.2.9p2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `hdns_bubujie`
--

-- --------------------------------------------------------

--
-- 表的结构 `ps_cms`
--
DROP TABLE `ps_cms`;
CREATE TABLE IF NOT EXISTS `ps_cms` (
  `id_cms` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_cms_category` int(10) unsigned NOT NULL,
  `position` int(10) unsigned NOT NULL DEFAULT '0',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_cms`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `ps_cms`
--

INSERT INTO `ps_cms` (`id_cms`, `id_cms_category`, `position`, `active`) VALUES
(1, 1, 0, 1),
(2, 1, 1, 1),
(3, 1, 2, 1),
(4, 1, 3, 1),
(5, 1, 4, 1);

-- --------------------------------------------------------

--
-- 表的结构 `ps_cms_block`
--
DROP TABLE `ps_cms_block`;
CREATE TABLE IF NOT EXISTS `ps_cms_block` (
  `id_cms_block` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_cms_category` int(10) unsigned NOT NULL,
  `name` varchar(40) NOT NULL,
  `location` tinyint(1) unsigned NOT NULL,
  `position` int(10) unsigned NOT NULL DEFAULT '0',
  `display_store` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_cms_block`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 导出表中的数据 `ps_cms_block`
--

INSERT INTO `ps_cms_block` (`id_cms_block`, `id_cms_category`, `name`, `location`, `position`, `display_store`) VALUES
(1, 1, '', 0, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `ps_cms_block_lang`
--
DROP TABLE `ps_cms_block_lang`;
CREATE TABLE IF NOT EXISTS `ps_cms_block_lang` (
  `id_cms_block` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL,
  `name` varchar(40) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_cms_block`,`id_lang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `ps_cms_block_lang`
--

INSERT INTO `ps_cms_block_lang` (`id_cms_block`, `id_lang`, `name`) VALUES
(1, 1, '关于');

-- --------------------------------------------------------

--
-- 表的结构 `ps_cms_block_page`
--
DROP TABLE `ps_cms_block_page`;
CREATE TABLE IF NOT EXISTS `ps_cms_block_page` (
  `id_cms_block_page` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_cms_block` int(10) unsigned NOT NULL,
  `id_cms` int(10) unsigned NOT NULL,
  `is_category` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id_cms_block_page`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `ps_cms_block_page`
--

INSERT INTO `ps_cms_block_page` (`id_cms_block_page`, `id_cms_block`, `id_cms`, `is_category`) VALUES
(1, 1, 1, 0),
(2, 1, 2, 0),
(3, 1, 3, 0),
(4, 1, 4, 0),
(5, 1, 5, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ps_cms_category`
--
DROP TABLE `ps_cms_category`;
CREATE TABLE IF NOT EXISTS `ps_cms_category` (
  `id_cms_category` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_parent` int(10) unsigned NOT NULL,
  `level_depth` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  `position` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_cms_category`),
  KEY `category_parent` (`id_parent`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `ps_cms_category`
--

INSERT INTO `ps_cms_category` (`id_cms_category`, `id_parent`, `level_depth`, `active`, `date_add`, `date_upd`, `position`) VALUES
(1, 0, 0, 1, '2011-11-20 13:16:22', '2011-11-20 13:16:22', 0);

-- --------------------------------------------------------

--
-- 表的结构 `ps_cms_category_lang`
--
DROP TABLE `ps_cms_category_lang`;
CREATE TABLE IF NOT EXISTS `ps_cms_category_lang` (
  `id_cms_category` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text,
  `link_rewrite` varchar(128) NOT NULL,
  `meta_title` varchar(128) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  UNIQUE KEY `category_lang_index` (`id_cms_category`,`id_lang`),
  KEY `category_name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `ps_cms_category_lang`
--

INSERT INTO `ps_cms_category_lang` (`id_cms_category`, `id_lang`, `name`, `description`, `link_rewrite`, `meta_title`, `meta_keywords`, `meta_description`) VALUES
(1, 1, '文章首页', '', 'home', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `ps_cms_lang`
--
DROP TABLE `ps_cms_lang`;
CREATE TABLE IF NOT EXISTS `ps_cms_lang` (
  `id_cms` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL,
  `meta_title` varchar(128) NOT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `content` longtext,
  `link_rewrite` varchar(128) NOT NULL,
  PRIMARY KEY (`id_cms`,`id_lang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `ps_cms_lang`
--

INSERT INTO `ps_cms_lang` (`id_cms`, `id_lang`, `meta_title`, `meta_description`, `meta_keywords`, `content`, `link_rewrite`) VALUES
(1, 1, '配送', '我们的配送条款', '条件，交付，延迟，装运，包装', '<h2>步步街配送规则</h2>\r\n<h3>配送范围</h3>\r\n<p>银川市3区(兴庆区、金凤区、西夏区)全区域配送。</p>\r\n<h3>配送时限</h3>\r\n<p>有库存的在售商品，步步街会在您下单并付款后当天或次日送达,原则上不会超过第3天。</p>\r\n<p>有超期配送现象时，请将信息反馈给“街投诉”，对于超期配送的供应商，我们会有相应的处罚。</p>\r\n<h3>配送费的计算</h3>\r\n<p>除非在商品信息中注明的，步步街所售商品均免运费。</p>\r\n<p>一些特殊品类的商品，可能会调整配送费用，其具体价格，以步步街系统计算结果为准。</p>', 'delivery'),
(2, 1, '法律公告条款', '法律公告', '公告, 约定, credits', '<h2>尊敬的用户，欢迎您注册成为本网站用户。在注册前请您仔细阅读如下服务条款：</h2>\r\n<p>本服务协议双方为本网站与本网站用户，本服务协议具有合同效力。</p>\r\n<p>您确认本服务协议后，本服务协议即在您和本网站之间产生法律效力。请您务必在注册之前认真阅读全部服务协议内容，如有任何疑问，可向本网站咨询。</p>\r\n<p>无论您事实上是否在注册之前认真阅读了本服务协议，只要您点击协议正本下方的"注册"按钮并按照本网站注册程序成功注册为用户，您的行为仍然表示您同意并签署了本服务协议。</p>\r\n<h3>1．本网站服务条款的确认和接纳</h3>\r\n<p>本网站各项服务的所有权和运作权归本网站拥有。</p>\r\n<h3>2．用户必须：</h3>\r\n<ul>\r\n<li>(1)自行配备上网的所需设备， 包括个人电脑、调制解调器或其他必备上网装置。</li>\r\n<li>(2)自行负担个人上网所支付的与此服务有关的电话费用、 网络费用。</li>\r\n</ul>\r\n<h3>3．用户在本网站上交易平台上不得发布下列违法信息：</h3>\r\n<ul>\r\n<li>(1)反对宪法所确定的基本原则的；</li>\r\n<li>(2).危害国家安全，泄露国家秘密，颠覆国家政权，破坏国家统一的；</li>\r\n<li>(3).损害国家荣誉和利益的；</li>\r\n<li>(4).煽动民族仇恨、民族歧视，破坏民族团结的；</li>\r\n<li>(5).破坏国家宗教政策，宣扬邪教和封建迷信的；</li>\r\n<li>(6).散布谣言，扰乱社会秩序，破坏社会稳定的；</li>\r\n<li>(7).散布淫秽、色情、赌博、暴力、凶杀、恐怖或者教唆犯罪的；</li>\r\n<li>(8).侮辱或者诽谤他人，侵害他人合法权益的；</li>\r\n<li>(9).含有法律、行政法规禁止的其他内容的。</li>\r\n</ul>\r\n<h3>4． 有关个人资料</h3>\r\n<h4>用户同意：</h4>\r\n<p>(1) 提供及时、详尽及准确的个人资料。</p>\r\n<p>(2).同意接收来自本网站的信息。</p>\r\n<p>(3) 不断更新注册资料，符合及时、详尽准确的要求。所有原始键入的资料将引用为注册资料。</p>\r\n<p>(4)本网站不公开用户的姓名、地址、电子邮箱和笔名，以下情况除外：</p>\r\n<ul>\r\n<li>（a）用户授权本网站透露这些信息。</li>\r\n<li>（b）相应的法律及程序要求本网站提供用户的个人资料。如果用户提供的资料包含有不正确的信息，本网站保留结束用户使用本网站信息服务资格的权利。</li>\r\n</ul>\r\n<h3>5. 用户在注册时应当选择稳定性及安全性相对较好的电子邮箱，并且同意接受并阅读本网站发往用户的各类电子邮件。如用户未及时从自己的电子邮箱接受电子邮件或因用户电子邮箱或用户电子邮件接收及阅读程序本身的问题使电子邮件无法正常接收或阅读的，只要本网站成功发送了电子邮件，应当视为用户已经接收到相关的电子邮件。电子邮件在发信服务器上所记录的发出时间视为送达时间。</h3>\r\n<h3>6． 服务条款的修改</h3>\r\n<p>本网站有权在必要时修改服务条款，本网站服务条款一旦发生变动，将会在重要页面上提示修改内容。如果不同意所改动的内容，用户可以主动取消获得的本网站信息服务。如果用户继续享用本网站信息服务，则视为接受服务条款的变动。本网站保留随时修改或中断服务而不需通知用户的权利。本网站行使修改或中断服务的权利，不需对用户或第三方负责。</p>\r\n<h3>7． 用户隐私制度</h3>\r\n<p>尊重用户个人隐私是本网站的一项基本政策。所以，本网站一定不会在未经合法用户授权时公开、编辑或透露其注册资料及保存在本网站中的非公开内容，除非有法律许可要求或本网站在诚信的基础上认为透露这些信息在以下四种情况是必要的：</p>\r\n<ul>\r\n<li>(1) 遵守有关法律规定，遵从本网站合法服务程序。</li>\r\n<li>(2) 保持维护本网站的商标所有权。</li>\r\n<li>(3) 在紧急情况下竭力维护用户个人和社会大众的隐私安全。</li>\r\n<li>(4)符合其他相关的要求。</li>\r\n</ul>\r\n<p>本网站保留发布会员人口分析资询的权利。</p>\r\n<h3>8．用户的帐号、密码和安全性</h3>\r\n<p>你一旦注册成功成为用户，你将得到一个密码和帐号。如果你不保管好自己的帐号和密码安全，将负全部责任。另外，每个用户都要对其帐户中的所有活动和事件负全责。你可随时根据指示改变你的密码，也可以结束旧的帐户重开一个新帐户。用户同意若发现任何非法使用用户帐号或安全漏洞的情况，请立即通告本网站。</p>\r\n<h3>9． 拒绝提供担保</h3>\r\n<p>用户明确同意信息服务的使用由用户个人承担风险。 本网站不担保服务不会受中断，对服务的及时性，安全性，出错发生都不作担保，但会在能力范围内，避免出错。</p>\r\n<h3>10．有限责任</h3>\r\n<p>本网站对任何直接、间接、偶然、特殊及继起的损害不负责任，这些损害来自：不正当使用本网站服务，或用户传送的信息不符合规定等。这些行为都有可能导致本网站形象受损，所以本网站事先提出这种损害的可能性，同时会尽量避免这种损害的发生。</p>\r\n<h3>11．信息的储存及限制</h3>\r\n<p>本网站有判定用户的行为是否符合本网站服务条款的要求和精神的权利，如果用户违背本网站服务条款的规定，本网站有权中断其服务的帐号。</p>\r\n<h3>12．用户管理</h3>\r\n<p>用户必须遵循：</p>\r\n<ul>\r\n<li>(1) 使用信息服务不作非法用途。</li>\r\n<li>(2) 不干扰或混乱网络服务。</li>\r\n<li>(3) 遵守所有使用服务的网络协议、规定、程序和惯例。用户的行为准则是以因特网法规，政策、程序和惯例为根据的。</li>\r\n</ul>\r\n<h3>13．保障</h3>\r\n<p>用户同意保障和维护本网站全体成员的利益，负责支付由用户使用超出服务范围引起的律师费用，违反服务条款的损害补偿费用，其它人使用用户的电脑、帐号和其它知识产权的追索费。</p>\r\n<h3>14．结束服务</h3>\r\n<p>用户或本网站可随时根据实际情况中断一项或多项服务。本网站不需对任何个人或第三方负责而随时中断服务。用户若反对任何服务条款的建议或对后来的条款修改有异议，或对本网站服务不满，用户可以行使如下权利：</p>\r\n<ul>\r\n<li>(1) 不再使用本网站信息服务。</li>\r\n<li>(2) 通知本网站停止对该用户的服务。</li>\r\n</ul>\r\n<p>结束用户服务后，用户使用本网站服务的权利马上中止。从那时起，用户没有权利，本网站也没有义务传送任何未处理的信息或未完成的服务给用户或第三方。</p>\r\n<h3>15．通告</h3>\r\n<p>所有发给用户的通告都可通过重要页面的公告或电子邮件或常规的信件传送。服务条款的修改、服务变更、或其它重要事件的通告都会以此形式进行。</p>\r\n<h3>16．信息内容的所有权</h3>\r\n<p>本网站定义的信息内容包括：文字、软件、声音、相片、录象、图表；在广告中全部内容；本网站为用户提供的其它信息。所有这些内容受版权、商标、标签和其它财产所有权法律的保护。所以，用户只能在本网站和广告商授权下才能使用这些内容，而不能擅自复制、再造这些内容、或创造与内容有关的派生产品。</p>\r\n<h3>17．法律</h3>\r\n<p>本网站信息服务条款要与中华人民共和国的法律解释一致。用户和本网站一致同意服从本网站所在地有管辖权的法院管辖。如发生本网站服务条款与中华人民共和国法律相抵触时，则这些条款将完全按法律规定重新解释，而其它条款则依旧保持对用户的约束力。</p>', 'legal-notice'),
(3, 1, '隐私保护政策', '我们的隐私条款及条件', '条件,条款,使用,协定,隐私保护', '<h3>个人信息</h3>\r\n<p>一般情况下，您无须提供您的姓名或其它个人信息即可访问我们的站点。但有时我们可能需要您提供一些信息，例如为了处理订单、与您联系、提供预订服务或处理工作应聘。我们可能需要这些信息完成以上事务的处理或提供更好的服务。</p>\r\n<h3>用途</h3>\r\n<ol>\r\n<li>供我们网站交易和沟通等相关方使用，以满足您的订单等购物服务；</li>\r\n<li>用于与您保持联系，以开展客户满意度调查、市场研究或某些事务的处理；</li>\r\n<li>用于不记名的数据分析（例如点击流量数据）；</li>\r\n<li>帮助发展我们的业务关系（如果您是我们网站的业务合作伙伴或批发商）；</li>\r\n</ol>', 'privacy'),
(4, 1, '关于我们', '了解更多关于步步街的信息', '关于我们, 信息', '<p>本商城是新一代专业消费服务网站。我们利用本土化的集中采购优势、丰富的电子商务管理服务经验和最先进的互联网技术为您提供最新最好的产品。</p>\r\n<h3>成立源起</h3>\r\n<p>步步街于2008在宁夏信息管理局备案，备案号：宁ICP备08000324号；自此，步步街一直致力于网络服务和电子商务领域。</p>\r\n<p>2012年，步步街工商注册并全新改版，致力于创建优秀的本土化网络商圈。</p>\r\n<h3>定位</h3>\r\n<p>本商城所登陆的商品全部是经过我们在千百种产品中精挑细选出的精品，每一件商品都有自己的特色，每件产品在登陆之前都经过网站编辑的层层筛选，这个将是我们自始至终所坚定的服务原则。</p>\r\n<h3>承诺</h3>\r\n<p>我们承诺提供权威的资讯、最低的价格和便捷的购物方式，为您打造全新的e时代购物新体验！我们承诺严格按照国家法规政策正规经营，经营的产品皆为正规渠道引进合法缴税的原装正品，有着完善的保修、退货与售后服务制度。为了让您更准确全面的了解您所需要的商品，我们的每一件商品都提供100%实样的高清晰数码照片、详尽的技术性能指标和制造厂商的介绍。同时采用多种便捷的支付方式和安全快速的配送体系，通过先进的互联网技术进行订单的实时跟踪，并保证每一位客户资料的安全与保密。</p>\r\n<p>步步街银川网络商城、金凤区步步街商行</p>', 'about-us'),
(5, 1, '安全支付', '我们的安全支付意义', '安全支付, ssl, visa, mastercard, paypal,万事达,贝宝,支付宝,财付通', '<h3>步步街付款方式如下，请依您的便利性选择：</h3>\r\n<p>步步街银川网络商城已签约成为支付宝信任商家，同时签约接入财付通企业版。</p>\r\n<p>步步街特别为本土顾客提供了常用银行帐号，包括宁夏银行、黄河农村商业银行，以方便您通过常用方式付款。</p>\r\n<p>步步街银川网络商城的商品，在淘宝店、拍拍店同步发售。</p>\r\n<p>在线支付可通过本店购物车的指示完成。</p>\r\n<table class="tbl" border="0">\r\n<tbody>\r\n<tr><th scope="col">帐户类型</th><th scope="col">LOGO</th><th scope="col">帐号</th><th scope="col">开户行</th></tr>\r\n<tr><th scope="row">支付宝</th>\r\n<td scope="row"><img src="http://lh6.googleusercontent.com/-OhMxnCzmmh0/Ti-KPCxC-ZI/AAAAAAAAGiY/LJYUAW-kAds/s800/W020100325860898745337.gif" alt="支付宝" name="支付宝" width="150" height="32" border="0" /></td>\r\n<td>bubujie@qq.com</td>\r\n<td>http://www.alipay.com/</td>\r\n</tr>\r\n<tr><th scope="row">财付通</th>\r\n<td scope="row"><img src="http://lh3.googleusercontent.com/-P54TUs-13JA/Ti-KQaIa2bI/AAAAAAAAGik/mp3IapWlTbM/s800/W020100325860903276967.gif" alt="财付通" name="财付通" width="150" height="32" border="0" /></td>\r\n<td>bubujie@qq.com</td>\r\n<td>http://www.tenpay.com/</td>\r\n</tr>\r\n<tr><th scope="row">宁夏银行</th>\r\n<td scope="row"><img src="http://lh4.googleusercontent.com/--klG9M4A7PI/TvbaCd3QFlI/AAAAAAAAHH8/k_bQT2Rk7ik/s127/bonx.png" alt="宁夏银行" name="宁夏银行" longdesc="宁夏银行" width="127" height="34" /></td>\r\n<td> </td>\r\n<td> </td>\r\n</tr>\r\n<tr><th scope="row">黄河农村商业银行</th>\r\n<td scope="row"><img src="http://lh3.googleusercontent.com/-DHWmBsh-roE/TvbaCMVUTiI/AAAAAAAAHH4/M_tO_obEnRg/s127/yrrcb.png" alt="黄河农村商业银行" name="黄河农村商业银行" longdesc="黄河农村商业银行" width="127" height="34" /></td>\r\n<td> </td>\r\n<td> </td>\r\n</tr>\r\n<tr><th scope="row">中行卡</th>\r\n<td scope="row"><img src="http://lh6.googleusercontent.com/-T_J_X_J__y4/Ti-NODxSc9I/AAAAAAAAGjo/ID2Mdnl75v8/s127/boc.png" alt="中国银行" longdesc="中国银行" width="127" height="34" /></td>\r\n<td> </td>\r\n<td> </td>\r\n</tr>\r\n<tr><th scope="row">农行卡</th>\r\n<td scope="row"><img src="http://lh6.googleusercontent.com/-GcElMTLYVhU/Ti-KDEeasQI/AAAAAAAAGhg/jwCy8i0Syxo/s800/abc.png" alt="中国农业银行" name="中国农业银行" width="127" height="34" /></td>\r\n<td>6228481200239892016</td>\r\n<td>中国农业银行银川市东城支行</td>\r\n</tr>\r\n<tr><th scope="row">工行卡</th>\r\n<td scope="row"><img src="http://lh6.googleusercontent.com/-WvgaxufmEKM/Ti-KLLUux_I/AAAAAAAAGiA/rR529iLlw6c/s800/icbc.png" alt="中国工商银行" name="中国工商银行" width="127" height="34" /></td>\r\n<td>6222032902000625593</td>\r\n<td>中国工商银行银川市新华支行</td>\r\n</tr>\r\n<tr><th scope="row">建行卡</th>\r\n<td scope="row"><img src="http://lh5.googleusercontent.com/-4uSY51vQLTo/Ti-KKBY1FWI/AAAAAAAAGh0/c3nLOkgKk4s/s800/ccb.png" alt="中国建设银行" name="中国建设银行" width="127" height="34" /></td>\r\n<td>6227004472410043251</td>\r\n<td>中国建设银行银川市新城中街支行</td>\r\n</tr>\r\n<tr><th scope="row"> </th>\r\n<td scope="row"> </td>\r\n<td> </td>\r\n<td> </td>\r\n</tr>\r\n</tbody>\r\n<tfoot>\r\n<tr><th scope="row" colspan="4">开户人：张瑞</th></tr>\r\n</tfoot>\r\n</table>\r\n<p><img title="财付通诚信商家" src="http://lh3.googleusercontent.com/-HtP1dZfgsQM/Tu3AO5_aw8I/AAAAAAAAG60/s8Qrt2mrT7Y/s140/trust_logo.gif" alt="财付通诚信商家" width="140" height="65" /> <img title="支付宝特约商家" src="http://lh3.googleusercontent.com/-3dmFRMDZ0Qk/Tu3AOOnFN9I/AAAAAAAAG6k/hvpFK8F0YNw/s185/logo185x60.jpg" alt="支付宝特约商家" width="185" height="60" /></p>', 'secure-payment');
