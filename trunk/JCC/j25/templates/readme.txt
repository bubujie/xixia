mode_menu
	每个ul>li>a项目中增加一层嵌套span.stroke
	涉及两个文件
		tuding/html/mod_menu/default_component.php
		tuding/html/mod_menu/default_url.php



system模板包含的chrome
	none    没有外套
	table   表格包裹
	horz    双层表格包裹
	xhtml   单层div包裹
	rounded 四层div嵌套
	outline 用于预览
	！！！注意：这些chrome名称不能再出现在其他模板中

	自定义模板中chrome的替代项
		none     代替 open（实际无差别，无法增控制点）
		division 代替 xhtml（增加id控制点，grid尺寸控制点）
		谁       代替 rounded（增加id控制点，grid尺寸控制点）
		stroke   描边
		squared  九宫格
		panel    组合面板

	可参考的全部chrome
		beezDivision（单层外套，标题3层span包裹）
		beezHide（可显隐模块圆形）
		beezTabs（组合面板原型）
		container   （出自atomic，无标题单层包裹）
		bottommodule（出自atomic，没有外套，h6标题）
		sidebar     （出自atomic，没有外套，h3标题）

