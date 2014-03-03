-- --------------------------------------------------------
-- UPDATE ps_stock_mvt_reason_lang
-- --------------------------------------------------------
-- INSERT INTO `ps_stock_mvt_reason_lang` (`id_stock_mvt_reason`, `id_lang`, `name`) VALUES
-- (1, 1, 'Increase'),
UPDATE ps_stock_mvt_reason_lang SET name='增加'       WHERE id_lang=1 AND name='Increase';
-- (2, 1, 'Decrease'),
UPDATE ps_stock_mvt_reason_lang SET name='减少'       WHERE id_lang=1 AND name='Decrease';
-- (3, 1, 'Order'),
UPDATE ps_stock_mvt_reason_lang SET name='订购'       WHERE id_lang=1 AND name='Order';
-- (4, 1, 'Missing Stock Movement'),
UPDATE ps_stock_mvt_reason_lang SET name='Missing Stock Movement'       WHERE id_lang=1 AND name='Missing Stock Movement';
-- (5, 1, 'Restocking');
UPDATE ps_stock_mvt_reason_lang SET name='补货'       WHERE id_lang=1 AND name='Restocking';
