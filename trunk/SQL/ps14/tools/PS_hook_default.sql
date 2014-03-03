-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 04 月 17 日 00:14
-- 服务器版本: 5.0.67
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `prestashop`
--

-- --------------------------------------------------------

--
-- 表的结构 `ps_hook`
--

CREATE TABLE IF NOT EXISTS `ps_hook` (
  `id_hook` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(64) NOT NULL,
  `title` varchar(64) NOT NULL,
  `description` text,
  `position` tinyint(1) NOT NULL default '1',
  `live_edit` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id_hook`),
  UNIQUE KEY `hook_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=97 ;

--
-- 导出表中的数据 `ps_hook`
--

INSERT INTO `ps_hook` (`id_hook`, `name`, `title`, `description`, `position`, `live_edit`) VALUES
(1, 'payment', 'Payment', NULL, 1, 1),
(2, 'newOrder', 'New orders', NULL, 0, 0),
(3, 'paymentConfirm', 'Payment confirmation', NULL, 0, 0),
(4, 'paymentReturn', 'Payment return', NULL, 0, 0),
(5, 'updateQuantity', 'Quantity update', 'Quantity is updated only when the customer effectively <b>place</b> his order.', 0, 0),
(6, 'rightColumn', 'Right column blocks', NULL, 1, 1),
(7, 'leftColumn', 'Left column blocks', NULL, 1, 1),
(8, 'home', 'Homepage content', NULL, 1, 1),
(9, 'header', 'Header of pages', 'A hook which allow you to do things in the header of each pages', 1, 0),
(10, 'cart', 'Cart creation and update', NULL, 0, 0),
(11, 'authentication', 'Successful customer authentication', NULL, 0, 0),
(12, 'addproduct', 'Product creation', NULL, 0, 0),
(13, 'updateproduct', 'Product Update', NULL, 0, 0),
(14, 'top', 'Top of pages', 'A hook which allow you to do things a the top of each pages.', 1, 0),
(15, 'extraRight', 'Extra actions on the product page (right column).', NULL, 0, 0),
(16, 'deleteproduct', 'Product deletion', 'This hook is called when a product is deleted', 0, 0),
(17, 'productfooter', 'Product footer', 'Add new blocks under the product description', 1, 1),
(18, 'invoice', 'Invoice', 'Add blocks to invoice (order)', 1, 0),
(19, 'updateOrderStatus', 'Order''s status update event', 'Launch modules when the order''s status of an order change.', 0, 0),
(20, 'adminOrder', 'Display in Back-Office, tab AdminOrder', 'Launch modules when the tab AdminOrder is displayed on back-office.', 0, 0),
(21, 'footer', 'Footer', 'Add block in footer', 1, 0),
(22, 'PDFInvoice', 'PDF Invoice', 'Allow the display of extra informations into the PDF invoice', 0, 0),
(23, 'adminCustomers', 'Display in Back-Office, tab AdminCustomers', 'Launch modules when the tab AdminCustomers is displayed on back-office.', 0, 0),
(24, 'orderConfirmation', 'Order confirmation page', 'Called on order confirmation page', 0, 0),
(25, 'createAccount', 'Successful customer create account', 'Called when new customer create account successfuled', 0, 0),
(26, 'customerAccount', 'Customer account page display in front office', 'Display on page account of the customer', 1, 0),
(27, 'orderSlip', 'Called when a order slip is created', 'Called when a quantity of one product change in an order.', 0, 0),
(28, 'productTab', 'Tabs on product page', 'Called on order product page tabs', 0, 0),
(29, 'productTabContent', 'Content of tabs on product page', 'Called on order product page tabs', 0, 0),
(30, 'shoppingCart', 'Shopping cart footer', 'Display some specific informations on the shopping cart page', 0, 0),
(31, 'createAccountForm', 'Customer account creation form', 'Display some information on the form to create a customer account', 1, 0),
(32, 'AdminStatsModules', 'Stats - Modules', NULL, 1, 0),
(33, 'GraphEngine', 'Graph Engines', NULL, 0, 0),
(34, 'orderReturn', 'Product returned', NULL, 0, 0),
(35, 'productActions', 'Product actions', 'Put new action buttons on product page', 1, 0),
(36, 'backOfficeHome', 'Administration panel homepage', NULL, 1, 0),
(37, 'GridEngine', 'Grid Engines', NULL, 0, 0),
(38, 'watermark', 'Watermark', NULL, 0, 0),
(39, 'cancelProduct', 'Product cancelled', 'This hook is called when you cancel a product in an order', 0, 0),
(40, 'extraLeft', 'Extra actions on the product page (left column).', NULL, 0, 0),
(41, 'productOutOfStock', 'Product out of stock', 'Make action while product is out of stock', 1, 0),
(42, 'updateProductAttribute', 'Product attribute update', NULL, 0, 0),
(43, 'extraCarrier', 'Extra carrier (module mode)', NULL, 0, 0),
(44, 'shoppingCartExtra', 'Shopping cart extra button', 'Display some specific informations', 1, 0),
(45, 'search', 'Search', NULL, 0, 0),
(46, 'backBeforePayment', 'Redirect in order process', 'Redirect user to the module instead of displaying payment modules', 0, 0),
(47, 'updateCarrier', 'Carrier Update', 'This hook is called when a carrier is updated', 0, 0),
(48, 'postUpdateOrderStatus', 'Post update of order status', NULL, 0, 0),
(49, 'createAccountTop', 'Block above the form for create an account', NULL, 1, 0),
(50, 'backOfficeHeader', 'Administration panel header', NULL, 0, 0),
(51, 'backOfficeTop', 'Administration panel hover the tabs', NULL, 1, 0),
(52, 'backOfficeFooter', 'Administration panel footer', NULL, 1, 0),
(53, 'deleteProductAttribute', 'Product Attribute Deletion', NULL, 0, 0),
(54, 'processCarrier', 'Carrier Process', NULL, 0, 0),
(55, 'orderDetail', 'Order Detail', 'To set the follow-up in smarty when order detail is called', 0, 0),
(56, 'beforeCarrier', 'Before carrier list', 'This hook is display before the carrier list on Front office', 1, 0),
(57, 'orderDetailDisplayed', 'Order detail displayed', 'Displayed on order detail on front office', 1, 0),
(58, 'paymentCCAdded', 'Payment CC added', 'Payment CC added', 0, 0),
(59, 'extraProductComparison', 'Extra Product Comparison', 'Extra Product Comparison', 0, 0),
(60, 'categoryAddition', 'Category creation', '', 0, 0),
(61, 'categoryUpdate', 'Category modification', '', 0, 0),
(62, 'categoryDeletion', 'Category removal', '', 0, 0),
(63, 'beforeAuthentication', 'Before Authentication', 'Before authentication', 0, 0),
(64, 'paymentTop', 'Top of payment page', 'Top of payment page', 0, 0),
(65, 'afterCreateHtaccess', 'After htaccess creation', 'After htaccess creation', 0, 0),
(66, 'afterSaveAdminMeta', 'After save configuration in AdminMeta', 'After save configuration in AdminMeta', 0, 0),
(67, 'attributeGroupForm', 'Add fields to the form "attribute group"', 'Add fields to the form "attribute group"', 0, 0),
(68, 'afterSaveAttributeGroup', 'On saving attribute group', 'On saving attribute group', 0, 0),
(69, 'afterDeleteAttributeGroup', 'On deleting attribute group', 'On deleting attribute group', 0, 0),
(70, 'featureForm', 'Add fields to the form "feature"', 'Add fields to the form "feature"', 0, 0),
(71, 'afterSaveFeature', 'On saving attribute feature', 'On saving attribute feature', 0, 0),
(72, 'afterDeleteFeature', 'On deleting attribute feature', 'On deleting attribute feature', 0, 0),
(73, 'afterSaveProduct', 'On saving products', 'On saving products', 0, 0),
(74, 'productListAssign', 'Assign product list to a category', 'Assign product list to a category', 0, 0),
(75, 'postProcessAttributeGroup', 'On post-process in admin attribute group', 'On post-process in admin attribute group', 0, 0),
(76, 'postProcessFeature', 'On post-process in admin feature', 'On post-process in admin feature', 0, 0),
(77, 'featureValueForm', 'Add fields to the form "feature value"', 'Add fields to the form "feature value"', 0, 0),
(78, 'postProcessFeatureValue', 'On post-process in admin feature value', 'On post-process in admin feature value', 0, 0),
(79, 'afterDeleteFeatureValue', 'On deleting attribute feature value', 'On deleting attribute feature value', 0, 0),
(90, 'afterSaveFeatureValue', 'On saving attribute feature value', 'On saving attribute feature value', 0, 0),
(91, 'attributeForm', 'Add fields to the form "attribute value"', 'Add fields to the form "attribute value"', 0, 0),
(92, 'postProcessAttribute', 'On post-process in admin feature value', 'On post-process in admin feature value', 0, 0),
(93, 'afterDeleteAttribute', 'On deleting attribute feature value', 'On deleting attribute feature value', 0, 0),
(94, 'afterSaveAttribute', 'On saving attribute feature value', 'On saving attribute feature value', 0, 0),
(95, 'frontCanonicalRedirect', 'Front Canonical Redirect', 'Check for 404 errors before canonical redirects', 0, 0),
(96, 'myAccountBlock', 'My account block', 'Display extra informations inside the "my account" block', 1, 0);
