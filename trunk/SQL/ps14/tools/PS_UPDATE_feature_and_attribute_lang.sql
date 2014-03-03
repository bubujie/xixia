-- --------------------------------------------------------
-- UPDATE ps_feature_lang
-- --------------------------------------------------------
-- INSERT INTO `ps_feature_lang` (`id_feature`, `id_lang`, `name`) VALUES
-- (1, 1, 'Height'),
UPDATE ps_feature_lang SET name='高'   WHERE id_lang=1 AND name='Height';
-- (2, 1, 'Width'),
UPDATE ps_feature_lang SET name='宽'   WHERE id_lang=1 AND name='Width';
-- (3, 1, 'Depth'),
UPDATE ps_feature_lang SET name='深'   WHERE id_lang=1 AND name='Depth';
-- (4, 1, 'Weight'),
UPDATE ps_feature_lang SET name='重量' WHERE id_lang=1 AND name='Weight';
-- (5, 1, 'Headphone');
UPDATE ps_feature_lang SET name='耳机' WHERE id_lang=1 AND name='Headphone';
-- Width  - from left to right
-- Depth  - from front to back
-- Height - from top to bottom



-- --------------------------------------------------------
-- UPDATE ps_attribute_lang
-- --------------------------------------------------------
-- INSERT INTO `ps_attribute_lang` (`id_attribute`, `id_lang`, `name`) VALUES
-- (1, 1, '2GB'),
-- (2, 1, '4GB'),
-- (3, 1, 'Metal'),
UPDATE ps_attribute_lang SET name='银色' WHERE id_lang=1 AND name='Metal';
-- (4, 1, 'Blue'),
UPDATE ps_attribute_lang SET name='蓝色' WHERE id_lang=1 AND name='Blue';
-- (5, 1, 'Pink'),
UPDATE ps_attribute_lang SET name='粉色' WHERE id_lang=1 AND name='Pink';
-- (6, 1, 'Green'),
UPDATE ps_attribute_lang SET name='绿色' WHERE id_lang=1 AND name='Green';
-- (7, 1, 'Orange'),
UPDATE ps_attribute_lang SET name='橙色' WHERE id_lang=1 AND name='Orange';
-- (8, 1, 'Optional 64GB solid-state drive'),
-- (9, 1, '80GB Parallel ATA Drive @ 4200 rpm'),
-- (10, 1, '1.60GHz Intel Core 2 Duo'),
-- (11, 1, '1.80GHz Intel Core 2 Duo'),
-- (12, 1, '80GB: 20,000 Songs'),
-- (13, 1, '160GB: 40,000 Songs'),
-- (14, 1, 'Black'),
UPDATE ps_attribute_lang SET name='黑色' WHERE id_lang=1 AND name='Black';
-- (15, 1, '8Go'),
-- (16, 1, '16Go'),
-- (17, 1, '32Go'),
-- (18, 1, 'Purple'),
UPDATE ps_attribute_lang SET name='紫色' WHERE id_lang=1 AND name='Purple';
-- (20, 1, 'Red'),
UPDATE ps_attribute_lang SET name='红色' WHERE id_lang=1 AND name='Red';
-- (19, 1, 'Yellow');
UPDATE ps_attribute_lang SET name='黄色' WHERE id_lang=1 AND name='Yellow';



-- --------------------------------------------------------
-- UPDATE ps_attribute_group_lang
-- --------------------------------------------------------
-- INSERT INTO `ps_attribute_group_lang` (`id_attribute_group`, `id_lang`, `name`, `public_name`) VALUES
-- (1, 1, 'Disk space', '存储空间'),
UPDATE ps_attribute_group_lang SET name='存储空间', public_name='存储空间' WHERE id_lang=1 AND  public_name='Disk space';
-- (2, 1, 'Color', '颜色'),
UPDATE ps_attribute_group_lang SET name='颜色',     public_name='颜色'     WHERE id_lang=1 AND  public_name='Color';
-- (3, 1, 'ICU', '处理器');
UPDATE ps_attribute_group_lang SET name='处理器',   public_name='处理器'   WHERE id_lang=1 AND  public_name='Processor';
