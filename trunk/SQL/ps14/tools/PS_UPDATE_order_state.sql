--
-- 对order_state进行中文化翻译
--

-- --------------------------------------------------------

-- INSERT INTO `ps_order_state_lang` (`id_order_state`, `id_lang`, `name`, `template`) VALUES
-- (1, 1, 'Awaiting cheque payment', 'cheque'),
UPDATE ps_order_state_lang SET name='等待支票汇款'   WHERE id_lang=1 AND name='Awaiting cheque payment';
-- (2, 1, 'Payment accepted', 'payment'),
UPDATE ps_order_state_lang SET name=''   WHERE id_lang=1 AND name='Payment accepted'';
-- (3, 1, 'Preparation in progress', 'preparation'),
UPDATE ps_order_state_lang SET name=''   WHERE id_lang=1 AND name='Preparation in progress';
-- (4, 1, 'Shipped', 'shipped'),
UPDATE ps_order_state_lang SET name=''   WHERE id_lang=1 AND name='Shipped';
-- (5, 1, 'Delivered', ''),
UPDATE ps_order_state_lang SET name=''   WHERE id_lang=1 AND name='Delivered';
-- (6, 1, 'Canceled', 'order_canceled'),
UPDATE ps_order_state_lang SET name='订单已取消'   WHERE id_lang=1 AND name='Canceled';
-- (7, 1, 'Refund', 'refund'),
UPDATE ps_order_state_lang SET name=''   WHERE id_lang=1 AND name='Refund';
-- (8, 1, 'Payment error', 'payment_error'),
UPDATE ps_order_state_lang SET name='支付错误'   WHERE id_lang=1 AND name='Payment error';
-- (9, 1, 'On backorder', 'outofstock'),
UPDATE ps_order_state_lang SET name='商品缺货'   WHERE id_lang=1 AND name='On backorder';
-- (10, 1, 'Awaiting bank wire payment', 'bankwire'),
UPDATE ps_order_state_lang SET name='等待银行电汇'   WHERE id_lang=1 AND name='Awaiting bank wire payment';
-- (11, 1, 'Awaiting PayPal payment', ''),
UPDATE ps_order_state_lang SET name='等待PayPal支付'   WHERE id_lang=1 AND name='Awaiting PayPal payment';
-- (12, 1, 'Payment remotely accepted', '');
UPDATE ps_order_state_lang SET name=''   WHERE id_lang=1 AND name='Payment remotely accepted';
