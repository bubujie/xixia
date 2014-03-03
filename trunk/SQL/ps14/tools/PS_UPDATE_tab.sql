-- --------------------------------------------------------
-- 对Tab进行中文化翻译
-- --------------------------------------------------------
-- INSERT INTO `ps_tab_lang` (`id_tab`, `id_lang`, `name`) VALUES
-- (1, 1, 'Catalog'),
UPDATE ps_tab_lang SET name='商品目录'   WHERE id_lang=1 AND name='Catalog';
-- (2, 1, 'Customers'),
UPDATE ps_tab_lang SET name='客户管理'   WHERE id_lang=1 AND name='Customers';
-- (3, 1, 'Orders'),
UPDATE ps_tab_lang SET name='订单管理'   WHERE id_lang=1 AND name='Orders';
-- (4, 1, 'Payment'),
UPDATE ps_tab_lang SET name='支付管理'   WHERE id_lang=1 AND name='Payment';
-- (5, 1, 'Shipping'),
UPDATE ps_tab_lang SET name='配送管理'   WHERE id_lang=1 AND name='Shipping';
-- (6, 1, 'Stats'),
UPDATE ps_tab_lang SET name='店铺统计'   WHERE id_lang=1 AND name='Stats';
-- (7, 1, 'Modules'),
UPDATE ps_tab_lang SET name='模块管理'   WHERE id_lang=1 AND name='Modules';
-- (8, 1, 'Preferences'),
UPDATE ps_tab_lang SET name='偏好设置'   WHERE id_lang=1 AND name='Preferences';
-- (9, 1, 'Tools'),
UPDATE ps_tab_lang SET name='工具箱'     WHERE id_lang=1 AND name='Tools';
-- (10, 1, 'Manufacturers'),
UPDATE ps_tab_lang SET name='制造商'     WHERE id_lang=1 AND name='Manufacturers';
-- (11, 1, 'Attributes and Groups'),
UPDATE ps_tab_lang SET name='属性和分组' WHERE id_lang=1 AND name='Attributes and Groups';
-- (12, 1, 'Addresses'),
UPDATE ps_tab_lang SET name='地址簿'     WHERE id_lang=1 AND name='Addresses';
-- (13, 1, 'Statuses'),
UPDATE ps_tab_lang SET name='订单状态'   WHERE id_lang=1 AND name='Statuses';
-- (14, 1, 'Vouchers'),
UPDATE ps_tab_lang SET name='优惠券'     WHERE id_lang=1 AND name='Vouchers';
-- (15, 1, 'Currencies'),
UPDATE ps_tab_lang SET name='货币管理'   WHERE id_lang=1 AND name='Currencies';
-- (16, 1, 'Taxes'),
UPDATE ps_tab_lang SET name='税率设置'   WHERE id_lang=1 AND name='Taxes';
-- (17, 1, 'Carriers'),
UPDATE ps_tab_lang SET name='配送商'     WHERE id_lang=1 AND name='Carriers';
-- (18, 1, 'Countries'),
UPDATE ps_tab_lang SET name='国别'       WHERE id_lang=1 AND name='Countries';
-- (19, 1, 'Zones'),
UPDATE ps_tab_lang SET name='洲际'       WHERE id_lang=1 AND name='Zones';
-- (20, 1, 'Price Ranges'),
UPDATE ps_tab_lang SET name='价格区间'   WHERE id_lang=1 AND name='Price Ranges';
-- (21, 1, 'Weight Ranges'),
UPDATE ps_tab_lang SET name='重量区间'   WHERE id_lang=1 AND name='Weight Ranges';
-- (22, 1, 'Positions'),
UPDATE ps_tab_lang SET name='主题位置'   WHERE id_lang=1 AND name='Positions';
-- (23, 1, 'Database'),
UPDATE ps_tab_lang SET name='数据库'     WHERE id_lang=1 AND name='Database';
-- (24, 1, 'E-mail'),
UPDATE ps_tab_lang SET name='E-mail'     WHERE id_lang=1 AND name='E-mail';
-- (26, 1, 'Images'),
UPDATE ps_tab_lang SET name='图片设置'   WHERE id_lang=1 AND name='Images';
-- (27, 1, 'Products'),
UPDATE ps_tab_lang SET name='商品设置'   WHERE id_lang=1 AND name='Products';
-- (28, 1, 'Contacts'),
UPDATE ps_tab_lang SET name='对外联系人' WHERE id_lang=1 AND name='Contacts';
-- (29, 1, 'Employees'),
UPDATE ps_tab_lang SET name='员工管理'   WHERE id_lang=1 AND name='Employees';
-- (30, 1, 'Profiles'),
UPDATE ps_tab_lang SET name='角色管理'   WHERE id_lang=1 AND name='Profiles';
-- (31, 1, 'Permissions'),
UPDATE ps_tab_lang SET name='权限管理'   WHERE id_lang=1 AND name='Permissions';
-- (32, 1, 'Languages'),
UPDATE ps_tab_lang SET name='语言管理'   WHERE id_lang=1 AND name='Languages';
-- (33, 1, 'Translations'),
UPDATE ps_tab_lang SET name='翻译管理'   WHERE id_lang=1 AND name='Translations';
-- (34, 1, 'Suppliers'),
UPDATE ps_tab_lang SET name='供应商'     WHERE id_lang=1 AND name='Suppliers';
-- (35, 1, 'Tabs'),
UPDATE ps_tab_lang SET name='菜单项'   WHERE id_lang=1 AND name='Tabs' AND id_tab=35;
-- (36, 1, 'Features'),
UPDATE ps_tab_lang SET name='商品特性'   WHERE id_lang=1 AND name='Features';
-- (37, 1, 'Quick Access'),
UPDATE ps_tab_lang SET name='快速访问'   WHERE id_lang=1 AND name='Quick Access';
-- (38, 1, 'Appearance'),
UPDATE ps_tab_lang SET name='外观管理'   WHERE id_lang=1 AND name='Appearance';
-- (39, 1, 'Contact Information'),
UPDATE ps_tab_lang SET name='联系信息'   WHERE id_lang=1 AND name='Contact Information';
-- (40, 1, 'Keyword Typos'),
UPDATE ps_tab_lang SET name='关键词勘误' WHERE id_lang=1 AND name='Keyword Typos';
-- (41, 1, 'CSV Import'),
UPDATE ps_tab_lang SET name='CSV导入'    WHERE id_lang=1 AND name='CSV Import';
-- (42, 1, 'Invoices'),
UPDATE ps_tab_lang SET name='发票管理'   WHERE id_lang=1 AND name='Invoices';
-- (43, 1, 'Search'),
UPDATE ps_tab_lang SET name='搜索设置'   WHERE id_lang=1 AND name='Search';
-- (44, 1, 'Localization'),
UPDATE ps_tab_lang SET name='本地化设置' WHERE id_lang=1 AND name='Localization';
-- (46, 1, 'States'),
UPDATE ps_tab_lang SET name='省份'       WHERE id_lang=1 AND name='States';
-- (47, 1, 'Merchandise Returns'),
UPDATE ps_tab_lang SET name='商品退货'   WHERE id_lang=1 AND name='Merchandise Returns';
-- (48, 1, 'PDF'),
UPDATE ps_tab_lang SET name='PDF设置'    WHERE id_lang=1 AND name='PDF';
-- (49, 1, 'Credit Slips'),
UPDATE ps_tab_lang SET name='Credit Slips'           WHERE id_lang=1 AND name='Credit Slips';
-- (51, 1, 'Settings'),
UPDATE ps_tab_lang SET name='统计设置'   WHERE id_lang=1 AND name='Settings';
-- (52, 1, 'Subdomains'),
UPDATE ps_tab_lang SET name='二级域名'   WHERE id_lang=1 AND name='Subdomains';
-- (53, 1, 'DB Backup'),
UPDATE ps_tab_lang SET name='数据备份'   WHERE id_lang=1 AND name='DB Backup';
-- (54, 1, 'Order Messages'),
UPDATE ps_tab_lang SET name='支付回复'   WHERE id_lang=1 AND name='Order Messages';
-- (55, 1, 'Delivery Slips'),
UPDATE ps_tab_lang SET name='Delivery Slips'           WHERE id_lang=1 AND name='Delivery Slips';
-- (56, 1, 'SEO AND URLs'),
UPDATE ps_tab_lang SET name='SEO和URLs'  WHERE id_lang=1 AND name='SEO AND URLs';
-- (57, 1, 'CMS'),
UPDATE ps_tab_lang SET name='文章管理'   WHERE id_lang=1 AND name='CMS';
-- (58, 1, 'Image Mapping'),
UPDATE ps_tab_lang SET name='图片映射'   WHERE id_lang=1 AND name='Image Mapping';
-- (59, 1, 'Customer Messages'),
UPDATE ps_tab_lang SET name='订单答复'   WHERE id_lang=1 AND name='Customer Messages';
-- (60, 1, 'Monitoring'),
UPDATE ps_tab_lang SET name='监测'       WHERE id_lang=1 AND name='Monitoring';
-- (61, 1, 'Search Engines'),
UPDATE ps_tab_lang SET name='搜索引擎'   WHERE id_lang=1 AND name='Search Engines';
-- (62, 1, 'Referrers'),
UPDATE ps_tab_lang SET name='访问来源'   WHERE id_lang=1 AND name='Referrers';
-- (63, 1, 'Groups'),
UPDATE ps_tab_lang SET name='分组'       WHERE id_lang=1 AND name='Groups';
-- (64, 1, 'Generators'),
UPDATE ps_tab_lang SET name='Generators' WHERE id_lang=1 AND name='Generators';
-- (65, 1, 'Shopping Carts'),
UPDATE ps_tab_lang SET name='购物车'     WHERE id_lang=1 AND name='Shopping Carts';
-- (66, 1, 'Tags'),
UPDATE ps_tab_lang SET name='标签管理'   WHERE id_lang=1 AND name='Tags' AND id_tab=66;
-- (67, 1, 'Search'),
UPDATE ps_tab_lang SET name='搜索'       WHERE id_lang=1 AND name='Search';
-- (68, 1, 'Attachments'),
UPDATE ps_tab_lang SET name='附件管理'   WHERE id_lang=1 AND name='Attachments';
-- (69, 1, 'Configuration Information'),
UPDATE ps_tab_lang SET name='配置信息'   WHERE id_lang=1 AND name='Configuration Information';
-- (70, 1, 'Performance'),
UPDATE ps_tab_lang SET name='性能设置'   WHERE id_lang=1 AND name='Performance';
-- (71, 1, 'Customer Service'),
UPDATE ps_tab_lang SET name='客户服务'   WHERE id_lang=1 AND name='Customer Service';
-- (72, 1, 'Webservice'),
UPDATE ps_tab_lang SET name='Webservice' WHERE id_lang=1 AND name='Webservice';
-- (73, 1, 'Stock Movement'),
UPDATE ps_tab_lang SET name='库存变动'   WHERE id_lang=1 AND name='Stock Movement';
-- (80, 1, 'Modules AND Themes Catalog'),
UPDATE ps_tab_lang SET name='模块和主题' WHERE id_lang=1 AND name='Modules & Themes Catalog';
-- (81, 1, 'My Account'),
UPDATE ps_tab_lang SET name='服务账户'   WHERE id_lang=1 AND name='My Account';
-- (82, 1, 'Stores'),
UPDATE ps_tab_lang SET name='店铺信息'   WHERE id_lang=1 AND name='Stores';
-- (83, 1, 'Themes'),
UPDATE ps_tab_lang SET name='主题管理'   WHERE id_lang=1 AND name='Themes';
-- (84, 1, 'Geolocation'),
UPDATE ps_tab_lang SET name='地理位置'   WHERE id_lang=1 AND name='Geolocation';
-- (85, 1, 'Tax Rules'),
UPDATE ps_tab_lang SET name='税率关联'   WHERE id_lang=1 AND name='Tax Rules';
-- (86, 1, 'Logs'),
UPDATE ps_tab_lang SET name='系统日志'   WHERE id_lang=1 AND name='Logs';
-- (87, 1, 'Counties'),
UPDATE ps_tab_lang SET name='县市'       WHERE id_lang=1 AND name='Counties';
-- (88, 1, 'Home');
UPDATE ps_tab_lang SET name='首页'       WHERE id_lang=1 AND name='Home';
