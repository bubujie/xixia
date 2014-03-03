<?php
	protected static function _subTree(&$categories, $id_category, &$n)
	{
		$left = (int)$n++;
		if (isset($categories[(int)$id_category]['subcategories']))
			foreach (array_keys($categories[(int)$id_category]['subcategories']) as $id_subcategory)
				self::_subTree($categories, (int)$id_subcategory, $n);
		$right = (int)$n++;

		Db::getInstance()->Execute('UPDATE '._DB_PREFIX_.'category SET nleft = '.(int)$left.', nright = '.(int)$right.' WHERE id_category = '.(int)$id_category.' LIMIT 1');
	}
?>