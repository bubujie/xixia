-- --------------------------------------------------------
-- UPDATE ps_meta_lang
-- --------------------------------------------------------
-- INSERT INTO `ps_meta_lang` (`id_meta`, `id_lang`, `title`, `description`, `keywords`, `url_rewrite`) VALUES
-- (1, 1, '404 error', 'This page cannot be found', 'error, 404, not found', 'page-not-found'),
UPDATE ps_meta_lang 
	SET title='', description='', keywords=''
		WHERE id_lang=1 AND url_rewrite='page-not-found';
-- (2, 1, 'Best sales', 'Our best sales', 'best sales', 'best-sales'),
UPDATE ps_meta_lang
	SET title='', description='', keywords=''
		WHERE id_lang=1 AND url_rewrite='best-sales';
-- (3, 1, 'Contact us', 'Use our form to contact us', 'contact, form, e-mail', 'contact-us'),
UPDATE ps_meta_lang
	SET title='', description='', keywords=''
		WHERE id_lang=1 AND url_rewrite='contact-us';
-- (4, 1, '', 'Shop powered by PrestaShop', 'shop, prestashop', ''),
UPDATE ps_meta_lang
	SET title='', description='', keywords=''
		WHERE id_lang=1 AND url_rewrite='';
-- (5, 1, 'Manufacturers', 'Manufacturers list', 'manufacturer', 'manufacturers'),
UPDATE ps_meta_lang
	SET title='', description='', keywords=''
		WHERE id_lang=1 AND url_rewrite='manufacturers';
-- (6, 1, 'New products', 'Our new products', 'new, products', 'new-products'),
UPDATE ps_meta_lang
	SET title='', description='', keywords=''
		WHERE id_lang=1 AND url_rewrite='new-products';
-- (7, 1, 'Forgot your password', 'Enter your e-mail address used to register in goal to get e-mail with your new password', 'forgot, password, e-mail, new, reset', 'password-recovery'),
UPDATE ps_meta_lang
	SET title='', description='', keywords=''
		WHERE id_lang=1 AND url_rewrite='password-recovery';
-- (8, 1, 'Prices drop', 'Our special products', 'special, prices drop', 'prices-drop'),
UPDATE ps_meta_lang
	SET title='', description='', keywords=''
		WHERE id_lang=1 AND url_rewrite='prices-drop';
-- (9, 1, 'Sitemap', 'Lost ? Find what your are looking for', 'sitemap', 'sitemap'),
UPDATE ps_meta_lang
	SET title='', description='', keywords=''
		WHERE id_lang=1 AND url_rewrite='sitemap';
-- (10, 1, 'Suppliers', 'Suppliers list', 'supplier', 'supplier'),
UPDATE ps_meta_lang
	SET title='', description='', keywords=''
		WHERE id_lang=1 AND url_rewrite='supplier';
-- (11, 1, 'Address', '', '', 'address'),
UPDATE ps_meta_lang
	SET title='', description='', keywords=''
		WHERE id_lang=1 AND url_rewrite='address';
-- (12, 1, 'Addresses', '', '', 'addresses'),
UPDATE ps_meta_lang
	SET title='', description='', keywords=''
		WHERE id_lang=1 AND url_rewrite='addresses';
-- (13, 1, 'Authentication', '', '', 'authentication'),
UPDATE ps_meta_lang
	SET title='', description='', keywords=''
		WHERE id_lang=1 AND url_rewrite='authentication';
-- (14, 1, 'Cart', '', '', 'cart'),
UPDATE ps_meta_lang
	SET title='', description='', keywords=''
		WHERE id_lang=1 AND url_rewrite='cart';
-- (15, 1, 'Discount', '', '', 'discount'),
UPDATE ps_meta_lang
	SET title='', description='', keywords=''
		WHERE id_lang=1 AND url_rewrite='discount';
-- (16, 1, 'Order history', '', '', 'order-history'),
UPDATE ps_meta_lang
	SET title='', description='', keywords=''
		WHERE id_lang=1 AND url_rewrite='order-history';
-- (17, 1, 'Identity', '', '', 'identity'),
UPDATE ps_meta_lang
	SET title='', description='', keywords=''
		WHERE id_lang=1 AND url_rewrite='identity';
-- (18, 1, 'My account', '', '', 'my-account'),
UPDATE ps_meta_lang
	SET title='', description='', keywords=''
		WHERE id_lang=1 AND url_rewrite='my-account';
-- (19, 1, 'Order follow', '', '', 'order-follow'),
UPDATE ps_meta_lang
	SET title='', description='', keywords=''
		WHERE id_lang=1 AND url_rewrite='order-follow';
-- (20, 1, 'Order slip', '', '', 'order-slip'),
UPDATE ps_meta_lang
	SET title='', description='', keywords=''
		WHERE id_lang=1 AND url_rewrite='order-slip';
-- (21, 1, 'Order', '', '', 'order'),
UPDATE ps_meta_lang
	SET title='', description='', keywords=''
		WHERE id_lang=1 AND url_rewrite='order';
-- (22, 1, 'Search', '', '', 'search'),
UPDATE ps_meta_lang
	SET title='', description='', keywords=''
		WHERE id_lang=1 AND url_rewrite='search';
-- (23, 1, 'Stores', '', '', 'stores'),
UPDATE ps_meta_lang
	SET title='', description='', keywords=''
		WHERE id_lang=1 AND url_rewrite='stores';
-- (24, 1, 'Order', '', '', 'quick-order'),
UPDATE ps_meta_lang
	SET title='', description='', keywords=''
		WHERE id_lang=1 AND url_rewrite='quick-order';
-- (25, 1, 'Guest tracking', '', '', 'guest-tracking');
UPDATE ps_meta_lang
	SET title='', description='', keywords=''
		WHERE id_lang=1 AND url_rewrite='guest-tracking';
