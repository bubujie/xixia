-- --------------------------------------------------------
-- 数据库内的翻译项 - V1.4.6.2
-- --------------------------------------------------------

UPDATE ps_category_lang     SET name="商品首页" WHERE id_category=1;
UPDATE ps_cms_category_lang SET name="文章首页" WHERE id_cms_category=1;
UPDATE ps_cms_block_lang    SET name="关于"     WHERE id_cms_block=1;
UPDATE ps_group_lang        SET name="默认"     WHERE id_group=1;

-- --------------------------------------------------------
-- 语言ID（id_lang）批处理 - V1.4.6.2
-- --------------------------------------------------------

UPDATE ps_employee                       SET id_lang=1 WHERE id_lang=6;
UPDATE ps_attachment_lang                SET id_lang=1 WHERE id_lang=6;
UPDATE ps_attribute_group_lang           SET id_lang=1 WHERE id_lang=6;
UPDATE ps_attribute_lang                 SET id_lang=1 WHERE id_lang=6;
UPDATE ps_carrier_lang                   SET id_lang=1 WHERE id_lang=6;
UPDATE ps_category_lang                  SET id_lang=1 WHERE id_lang=6;
UPDATE ps_cms_block_lang                 SET id_lang=1 WHERE id_lang=6;
UPDATE ps_cms_category_lang              SET id_lang=1 WHERE id_lang=6;
UPDATE ps_cms_lang                       SET id_lang=1 WHERE id_lang=6;
UPDATE ps_configuration_lang             SET id_lang=1 WHERE id_lang=6;
UPDATE ps_contact_lang                   SET id_lang=1 WHERE id_lang=6;
UPDATE ps_country_lang                   SET id_lang=1 WHERE id_lang=6;
UPDATE ps_customization_field_lang       SET id_lang=1 WHERE id_lang=6;
UPDATE ps_discount_lang                  SET id_lang=1 WHERE id_lang=6;
UPDATE ps_discount_type_lang             SET id_lang=1 WHERE id_lang=6;
UPDATE ps_editorial_lang                 SET id_lang=1 WHERE id_lang=6;
UPDATE ps_feature_lang                   SET id_lang=1 WHERE id_lang=6;
UPDATE ps_feature_value_lang             SET id_lang=1 WHERE id_lang=6;
UPDATE ps_group_lang                     SET id_lang=1 WHERE id_lang=6;
UPDATE ps_image_lang                     SET id_lang=1 WHERE id_lang=6;
UPDATE ps_lang                           SET id_lang=1 WHERE id_lang=6;
UPDATE ps_meta_lang                      SET id_lang=1 WHERE id_lang=6;
UPDATE ps_order_message_lang             SET id_lang=1 WHERE id_lang=6;
UPDATE ps_order_return_state_lang        SET id_lang=1 WHERE id_lang=6;
UPDATE ps_order_state_lang               SET id_lang=1 WHERE id_lang=6;
UPDATE ps_product_comment_criterion_lang SET id_lang=1 WHERE id_lang=6;
UPDATE ps_product_lang                   SET id_lang=1 WHERE id_lang=6;
UPDATE ps_profile_lang                   SET id_lang=1 WHERE id_lang=6;
UPDATE ps_quick_access_lang              SET id_lang=1 WHERE id_lang=6;
UPDATE ps_scene_lang                     SET id_lang=1 WHERE id_lang=6;
UPDATE ps_stock_mvt_reason_lang          SET id_lang=1 WHERE id_lang=6;
UPDATE ps_supplier_lang                  SET id_lang=1 WHERE id_lang=6;
UPDATE ps_tab_lang                       SET id_lang=1 WHERE id_lang=6;
UPDATE ps_tax_lang                       SET id_lang=1 WHERE id_lang=6;
