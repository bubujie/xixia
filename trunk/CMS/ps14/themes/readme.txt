bug�޸���
prestashop
prestashop_new
	modules/blocklayered/blocklayered.tpl	���ļ���bug���������ʹ��prestashopģ���Ӧ���ļ��滻֮��Ȼ������µĲ��ֿ���ê��
prestashop_mobile
	identity.tpl
		����-���ϣ�������Ϊ�ʺ��й�
		���գ���-��-�꣬������Ϊ�ʺ��й�


prestashop_mobile
	address.tpl
		<div data-rle="fieldcontain">������265
			<label for="phone_mobile">{l s='Mobile phone'}</label>
			<input type="text" id="phone_mobile" name="phone_mobile" value="{if isset($smarty.post.phone_mobile)}{$smarty.post.phone_mobile|escape:'htmlall':'UTF-8'}{else}{if isset($address->phone_mobile)}{$address->phone_mobile|escape:'htmlall':'UTF-8'}{/if}{/if}" />
		</div>
		����<div data-rle="fieldcontain">Ӧ��Ϊdata-role��ȱ��һ����ĸo

		<div data-role="fieldcontain" class="id_state">��ȷ
		<div data-role="fieldconatin" class="id_state">������246
			<label for="id_state" class="ui-select">ʡ/ֱϽ��/������<sup>*</sup></label>
			<div class="ui-select"><div data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="span" data-icon="arrow-d" data-iconpos="right" data-theme="b" class="ui-btn ui-shadow ui-btn-corner-all ui-btn-icon-right ui-btn-up-b"><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text"><span>���Ļ���������</span></span><span class="ui-icon ui-icon-arrow-d ui-icon-shadow">&nbsp;</span></span><select name="id_state" id="id_state">
				<option value="" selected="selected">-</option>
				<option value="9">�Ϻ���</option>
				����
			</select></div></div>
		</div>
	product.php
		��Ʒ��ɫѡȡʱ����ɫѡȡ������ɫ�����б�ȱ������(ʵ����DOM�Ѹı���)����ɫѡȡ�鳬�����
		1����product.js��updateColorSelect()����������$('#group_'+id_color_default).selectmenu('refresh', true);��ˢ�±�
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
		2��<div class="clear"></div>�е�.clearδ����
		������category.php�д���<ul id="product_list" class="clear" data-role="listview"></ul>�����ߴ��ڳ�ͻ������ʹ��.clearfix{}���趨�������ͻ
		��global.css������
		.clear {
		  *zoom: 1;
		}
		.clear:after {
		  content: "";
		  display: block;
		  clear: both;
		}
	identity.tpl
		ȱ���·����Ե��ã������ڷ�������Ҳ�޷����ɸ���Ŀ
