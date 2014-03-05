html\com_content\article
	dl.article-info的各项冒号之后的内容添加一层外套span.o>span.i
	内容页的正文区域增加一层外套div.content
html\com_mailto
	将表单改为表格布局，且button标签增加一层外套span.btn
	div.mailto-close增加行间样式style="position:absolute;top:10px;right:10px;
	涉及一个文件
		html\com_mailto\mailto\default.php
html\mode_menu\
	每个ul>li>a项目中增加一层嵌套span.stroke
	涉及两个文件
		html\mod_menu\default_component.php
		html\mod_menu\default_url.php
！！！注意：
凡是在视图文件中输出$moduleclass_sfx的模块都需在模板中覆写，以避免类似div.w-1-3>div.w-1-3的冲突，这些模块有：



system模板包含的chrome
	none    没有外套
	table   表格包裹
	horz    双层表格包裹
	xhtml   单层div包裹
	rounded 四层div嵌套
	outline 用于预览
	！！！注意：这些chrome名称不能再出现在其他模板中

	自定义模板中chrome的替代项
		none     代替 open（实际无差别，无法增加控制点）
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

