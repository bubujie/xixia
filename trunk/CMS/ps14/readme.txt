INSERT INTO `PREFIX_lang` (`id_lang`, `name`, `active`, `iso_code`, `language_code`, `date_format_lite`, `date_format_full`) VALUES
(1, 'English (English)', 1, 'en', 'en-us', 'm/j/Y', 'm/j/Y H:i:s');
/*(2, 'Français (French)', 1, 'fr', 'fr', 'd/m/Y', 'd/m/Y H:i:s'),*/
/*(3, 'Español (Spanish)', 1, 'es', 'es', 'd/m/Y', 'd/m/Y H:i:s'),*/
/*(4, 'Deutsch (German)', 1, 'de', 'de', 'd.m.Y', 'd.m.Y H:i:s'),*/
/*(5, 'Italiano (Italian)', 1, 'it', 'it', 'd/m/Y', 'd/m/Y H:i:s');*/

/*(1, 'English (English)', 0, 'en', 'en-us', 'm/j/Y', 'm/j/Y H:i:s'),*/
/*(2, 'Chinese-Traditional', 1, 'tw', 'tw', 'Y-m-d', 'Y-m-d H:i:s'),*/
/*(3, 'Chinese-Simplified', 1, 'zh', 'zh', 'Y-m-d', 'Y-m-d H:i:s');*/

强制将`id_lang=1`设置为简体中文时无法正常建立管理帐户，后台无法登陆；同时，产品介绍也无法正常显示
	估计与“简体中文”语言包内容不全有重大关系，也可能是在安装文件中固定了而无法改变

默认的演示订单，其`id_lang=2`，吾将其更改为了`id_lang=1`

A-B为互作验证，其内容相同

1.4.10.0对比1.4.9.0的安装sql
	lite：订单状态id=12的Payment remotely accepted更改为发邮件payment
	extends：增加id=56的模块backwardcompatibility，并挂载到3个位置9、50、54



extends中添加了Tuding布局相关hook
extends中添加了blocktopmenu模块相关数据，hook_module映射以及它的2项设置项
	取消开启“货币”和“语言”切换模块
	blockcms增加更多hook
	blocktopmenu增加名为bhead-btm的hook，并直接挂在在bhead-btm

