-- --------------------------------------------------------
-- 演示商品欧元对人民币价格批量转换
-- --------------------------------------------------------
UPDATE ps_product SET quantity=0, price=1080,  wholesale_price=608  WHERE price=124.581940;
UPDATE ps_product SET quantity=0, price=580,   wholesale_price=286  WHERE price=66.053500;
UPDATE ps_product SET quantity=0, price=13060, wholesale_price=8680 WHERE price=1504.180602;
UPDATE ps_product SET quantity=0, price=10160, wholesale_price=0    WHERE price=1170.568561;
UPDATE ps_product SET quantity=0, price=2098,  wholesale_price=1772 WHERE price=241.638796;
UPDATE ps_product SET quantity=0, price=218,   wholesale_price=0    WHERE price=25.041806;
UPDATE ps_product SET quantity=0, price=1080,  wholesale_price=0    WHERE price=124.581940;



-- --------------------------------------------------------
-- 对有库存文字进行翻译
-- --------------------------------------------------------
UPDATE ps_product_lang SET available_now='有库存' WHERE id_lang=1 AND available_now='In stock';
