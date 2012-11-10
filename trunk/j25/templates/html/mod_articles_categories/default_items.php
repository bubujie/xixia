<?php
/**
 * @package   ##website## Template
 * @author    ##author## ##email##
 * @version   ##version## ##date##
 * @copyright Copyright (C) ##author## 2008 - 2012 ##website##. All Rights Reserved.
 * @license   ##license##
 */

// no direct access
defined('_JEXEC') or die;
foreach ($list as $item) :

	printf("\n  ".'<li%s>' ,
		$_SERVER['PHP_SELF'] == JRoute::_(ContentHelperRoute::getCategoryRoute($item->id)) ? ' class="active"' : ''
	);

	$levelup=$item->level-$startLevel -1;
//	printf("".'<h%s>' ,
//		$params->get('item_heading')+ $levelup
//	);
	printf("".'<a href="%s">%s</a>' ,
		JRoute::_(ContentHelperRoute::getCategoryRoute($item->id)) ,
		$item->title
	);
//	printf("".'</h%s>' ,
//		$params->get('item_heading')+ $levelup
//	);

	if($params->get('show_description', 0)) :
			echo JHtml::_('content.prepare', $item->description, $item->getParams(), 'mod_articles_categories.content');
	endif;

	if($params->get('show_children', 0) && (($params->get('maxlevel', 0) == 0) || ($params->get('maxlevel') >= ($item->level - $startLevel))) && count($item->getChildren())) :

			echo   "".'<ul>';
			$temp = $list;
			$list = $item->getChildren();
			require JModuleHelper::getLayoutPath('mod_articles_categories', $params->get('layout', 'default').'_items');
			$list = $temp;
			echo   "".'</ul>';
	endif;
	echo   "".'</li>';
endforeach;
?>
