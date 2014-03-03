-- --------------------------------------------------------
-- 对 ps_configuration 启用本土化设置
-- --------------------------------------------------------
UPDATE ps_configuration SET value=1            WHERE name='PS_LANG_DEFAULT'       AND value=1; -- 默认语言，调整为1
UPDATE ps_configuration SET value=1            WHERE name='PS_CURRENCY_DEFAULT'   AND value=1; -- 默认货币，调整为1
UPDATE ps_configuration SET value=1            WHERE name='PS_COUNTRY_DEFAULT'    AND value=5; -- 默认货币，调整为1
UPDATE ps_configuration SET value=1            WHERE name='PS_CARRIER_DEFAULT'    AND value=2; -- 默认配送，调整为1
-- --------------------------------------------------------
UPDATE ps_configuration SET value='PRC'        WHERE name='PS_TIMEZONE'           AND value='Asia/Shanghai'; -- 默认值为安装时所选
UPDATE ps_configuration SET value='公里(km)'   WHERE name='PS_DISTANCE_UNIT'      AND value='市里';          -- 距离单位,默认值为：市里
UPDATE ps_configuration SET value='厘米(cm)'   WHERE name='PS_DIMENSION_UNIT'     AND value='市厘';          -- 尺寸单位，默认值为：市厘
UPDATE ps_configuration SET value='升(l)'      WHERE name='PS_VOLUME_UNIT'        AND value='市升';          -- 体积单位，默认值为：市升
UPDATE ps_configuration SET value='公斤(kg)'   WHERE name='PS_WEIGHT_UNIT'        AND value='市制';          -- 重量单位，默认值为：市制
-- --------------------------------------------------------
UPDATE ps_configuration SET value='en'         WHERE name='PS_LOCALE_LANGUAGE'    AND value='en';
UPDATE ps_configuration SET value='CN'         WHERE name='PS_LOCALE_COUNTRY'     AND value='CN';
UPDATE ps_configuration SET value='38.478454'  WHERE name='PS_STORES_CENTER_LAT'  AND value='25.948969';  -- 谷歌x坐标，默认值为：25.948969
UPDATE ps_configuration SET value='106.243629' WHERE name='PS_STORES_CENTER_LONG' AND value='-80.226439'; -- 谷歌y坐标，默认值为：-80.226439
-- --------------------------------------------------------
UPDATE ps_configuration SET value='IN'         WHERE name='PS_INVOICE_PREFIX'     AND value='IN'; -- 前缀，默认值为：IN
UPDATE ps_configuration SET value='DE'         WHERE name='PS_DELIVERY_PREFIX'    AND value='DE'; -- 前缀，默认值为：DE
