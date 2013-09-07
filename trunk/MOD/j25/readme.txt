横向移动的Slide需要设置高度，否则其不占据高度，可以宽度自适应
纵向移动的Slide宽度自适应即可
viewstep参数为展现出的子项的最小值，小于它时开始修改dom



mod_articles_thumbnail
	基于mod_articles_category创建
	重要参考
		需先清理掉段落标签
			public static function _cleanIntrotext($introtext){}
				参考：j25\modules\mod_articles_category\helper.php
		文章截断（推荐后者）
			public static function truncate($html,$maxlength=0){}
				参考：j25\modules\mod_articles_category\helper.php
			JHtml::_('string.truncate', ($item->title), $params->get('readmore_limit'));
				参考：j25\modules\mod_articles_category\tmpl\default.php
	增加的设置项
				<field type="spacer" hr="true" />

				<field name="gridWidth" type="text" default="150" label="栅格宽度(单位px)" description="" size="10" />
				<field name="gridHeight" type="text" default="200" label="栅格高度(单位px)" description="" size="10" />
				<field name="imageWidth" type="text" default="130" label="图片宽度(单位px)" description="" size="10" />
				<field name="imageHeight" type="text" default="130" label="图片高度(单位px)" description="" size="10" />
		more链接，指向某个分类节点
		列表序号
		列表缩略图
