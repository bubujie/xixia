-- --------------------------------------------------------
-- UPDATE ps_profile_lang
-- --------------------------------------------------------
-- INSERT INTO `ps_profile_lang` (`id_lang`, `id_profile`, `name`) VALUES
-- (1, 1, 'Administrator'),
UPDATE ps_profile_lang SET name='管理人员'   WHERE id_lang=1 AND name='Administrator';
-- (1, 2, 'Logistician'),
UPDATE ps_profile_lang SET name='后勤人员'   WHERE id_lang=1 AND name='Logistician';
-- (1, 3, 'Translator'),
UPDATE ps_profile_lang SET name='翻译人员'   WHERE id_lang=1 AND name='Translator';
-- (1, 4, 'Salesman');
UPDATE ps_profile_lang SET name='销售人员'   WHERE id_lang=1 AND name='Salesman';



-- --------------------------------------------------------
-- UPDATE ps_carrier_lang
-- --------------------------------------------------------
-- INSERT INTO `ps_carrier_lang` (`id_carrier`, `id_lang`, `delay`) VALUES
-- (1, 1, 'Pick up in-store'),
UPDATE ps_carrier_lang SET delay='上门自提'   WHERE id_lang=1 AND delay='Pick up in-store';
-- (2, 1, 'Delivery next day!');
UPDATE ps_carrier_lang SET delay='次日送达'   WHERE id_lang=1 AND delay='Delivery next day!';
