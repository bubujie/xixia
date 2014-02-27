bug修复：
prestashop
prestashop_new
	modules/blocklayered/blocklayered.tpl	此文件有bug，因此需先使用prestashop模板对应的文件替换之，然后添加新的布局控制锚记
prestashop_mobile
	identity.tpl
		名字-姓氏，仅调整为适合中国
		生日：日-月-年，仅调整为适合中国


prestashop_mobile
	address.tpl
		<div data-rle="fieldcontain">错误，行265
			<label for="phone_mobile">{l s='Mobile phone'}</label>
			<input type="text" id="phone_mobile" name="phone_mobile" value="{if isset($smarty.post.phone_mobile)}{$smarty.post.phone_mobile|escape:'htmlall':'UTF-8'}{else}{if isset($address->phone_mobile)}{$address->phone_mobile|escape:'htmlall':'UTF-8'}{/if}{/if}" />
		</div>
		其中<div data-rle="fieldcontain">应该为data-role，缺少一个字母o

		<div data-role="fieldcontain" class="id_state">正确
		<div data-role="fieldconatin" class="id_state">错误，行246
			<label for="id_state" class="ui-select">省/直辖市/自治区<sup>*</sup></label>
			<div class="ui-select"><div data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="span" data-icon="arrow-d" data-iconpos="right" data-theme="b" class="ui-btn ui-shadow ui-btn-corner-all ui-btn-icon-right ui-btn-up-b"><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text"><span>宁夏回族自治区</span></span><span class="ui-icon ui-icon-arrow-d ui-icon-shadow">&nbsp;</span></span><select name="id_state" id="id_state">
				<option value="" selected="selected">-</option>
				<option value="9">上海市</option>
				……
			</select></div></div>
		</div>
	product.php
		产品颜色选取时，颜色选取块与颜色下拉列表缺少联动(实际上DOM已改变了)，颜色选取块超出外框
		1、在product.js中updateColorSelect()函数中增加$('#group_'+id_color_default).selectmenu('refresh', true);以刷新表单
		function updateColorSelect(id_attribute)
		{
			if (id_attribute == 0)
			{
				refreshProductImages(0);
				return ;
			}
			// Visual effect
			$('#color_'+id_attribute).fadeTo('fast', 1, function(){	$(this).fadeTo('slow', 0, function(){ $(this).fadeTo('slow', 1, function(){}); }); });
			// Attribute selection
			$('#group_'+id_color_default+' option[value='+id_attribute+']').attr('selected', 'selected');
			$('#group_'+id_color_default+' option[value!='+id_attribute+']').removeAttr('selected');
			$('#group_'+id_color_default).selectmenu('refresh', true);
			findCombination();
		}
		2、<div class="clear"></div>中的.clear未定义
		但是在category.php中存在<ul id="product_list" class="clear" data-role="listview"></ul>，两者存在冲突，所以使用.clearfix{}的设定来解决冲突
		在global.css中增加
		.clear {
		  *zoom: 1;
		}
		.clear:after {
		  content: "";
		  display: block;
		  clear: both;
		}
	identity.tpl
		缺少月份语言调用，以至于翻译项中也无法生成该项目
