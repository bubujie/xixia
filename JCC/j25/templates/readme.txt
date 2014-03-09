html\com_content\article\
	dl.article-info的各项冒号之后的内容添加一层外套span.o>span.i
	内容页的正文区域增加一层外套div.content
html\com_content\category\classic...
	为表格式增加一列num，可方便地切换顺序或逆序
	相对于default，仅增加三处共4行内容
html\com_content\category\webzine...
html\com_content\category\gallery...
html\com_content\category\card...
html\com_content\category\faq...



html\com_mailto\
	将表单改为表格布局，且button标签增加一层外套span.btn
	div.mailto-close增加行间样式style="position:absolute;top:10px;right:10px;
	涉及一个文件
		html\com_mailto\mailto\default.php
html\mod_login\
	前两个p标签uid和upw转换为dl>dt+dd
	后一个P标签keep调换中间lable和input位置
html\mod_menu\
	每个ul>li>a项目中增加一层嵌套span.stroke
	涉及两个文件
		html\mod_menu\default_component.php
		html\mod_menu\default_url.php
html\mod_footer\
	该模块显示网站版权信息，自定义内容仅有网站名称（后台全局设置中的）。
	而地址第二行只是直接调用语言文件中的内容而已，完整输出：
		<div class="footer1_moduleclass_sfx">版权 &#169; %date% %sitename% <?php echo JText :: _('MOD_FOOTER_LINE1'); ?></div>
		<div class="footer2_moduleclass_sfx"><?php echo JText::_('MOD_FOOTER_LINE2'); ?></div>
	因此需覆写以去掉第二行内容，修改div.footer1为div.footer

！！！注意：
几乎所有的模块都会在视图文件中输出<?php echo $moduleclass_sfx ?>，而chrome中还会再次输出，因此必须避免在模块Class后缀中输入尺寸相关的内容，以防止出现类似div.w-1-3>div.w-1-3的冲突！！！

system模板包含的Chrome
	none    没有外套     （j35 protostar 为 no） 
	table   表格包裹
	horz    双层表格包裹
	xhtml   单层div包裹  （j35 protostar 为 well）
	rounded 四层div嵌套
	outline 用于预览
	！！！注意：这些chrome名称不能再出现在其他模板中

	自定义模板中chrome的替代项
		none    代替 open（实际无差别，无法增加控制点）
		division 代替 xhtml（增加id控制点，grid尺寸控制点）
		谁       代替 rounded（增加id控制点，grid尺寸控制点）
		stroke   描边
		squared  九宫格
		panel    组合面板

	可参考的全部Chrome
		beezDivision（单层外套，标题3层span包裹） j35的beez3模板一致
		beezHide    （可显隐模块圆形）            j35的beez3模板一致
		beezTabs    （组合面板原型）              j35的beez3模板一致
		container   （出自atomic，无标题单层包裹）
		bottommodule（出自atomic，没有外套，h6标题）
		sidebar     （出自atomic，没有外套，h3标题）
	附加Joomla! 3 system模板增加的重要Chrome
		html5（唯有此Chrome会使用bootstrap_size参数）
			$moduleTag      = $params->get('module_tag', 'div');
			$headerTag      = htmlspecialchars($params->get('header_tag', 'h3'));
			$bootstrapSize  = (int) $params->get('bootstrap_size', 0);
			$moduleClass    = $bootstrapSize != 0 ? ' span' . $bootstrapSize : '';

			// Temporarily store header class in variable
			$headerClass	= $params->get('header_class');
			$headerClass	= !empty($headerClass) ? ' class="' . htmlspecialchars($headerClass) . '"' : '';
		借鉴上面的用法，可为普通的模块增加下面的内容
	$moduleTag      = $params->get('module_tag', 'div');
	$headerTag      = htmlspecialchars($params->get('header_tag', 'h3'));
	$bootstrapSize  = (int) $params->get('bootstrap_size', 0);
	$moduleClass    = $bootstrapSize != 0 ? ' span' . $bootstrapSize : '';

	// Temporarily store header class in variable
	$headerClass	= $params->get('header_class');
	$headerClass	= !empty($headerClass) ? ' class="' . htmlspecialchars($headerClass) . '"' : '';
	$gridSize       = $params->get('grid_size', 0);
……
	echo $gridSize ? "\n".'<div class="'.$gridSize.' xfl ding">' : '';
……
	echo $gridSize ? "\n".'</div>' : '';
……



备用布局命名：
	list   （classic） 经典风格 Classic Style
	zine   （webzine） 杂志风格    Zine Style
	gallery（gallery） 画廊风格 Gallery Style