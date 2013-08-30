<?php
/**
 * @package   http://www.bubujie.net Module
 * @author    BuBuJie.Net bubujie@gmail.com
 * @version   beta 2012-06-07
 * @copyright Copyright (C) BuBuJie.Net 2008 - 2012 http://www.bubujie.net. All Rights Reserved.
 * @license   步步街商业客户单域名授权，违反必究！
 */

// no direct access
defined('_JEXEC') or die;
/* ######### 注释 ######### */
$ordering         = $params->get('ordering');
$customimage      = $params->get('customimage');
$customtext       = $params->get('customtext');
$more_catid       = $params->get('more_catid');
$show_more        = $params->get('show_more', 1);
$show_imageintro  = $params->get('show_imageintro', 0);
$show_number      = $params->get('show_number', 0);
/* ######### 注释 ######### */
//JHtml::_('stylesheet', 'mod_bubujie_popular/style.css', array(), true);
//JHtml::_('stylesheet', 'mod_languages/template.css', array(), true); /*实际路径是*/
JHtml::stylesheet('mod_bubujie_latest/style.css', false, true, false);
if ($customimage) :
	echo   "\n".'<div class="img-custom">';
	printf("\n  ".'<a href="%s"><img src="%s" alt="" /></a>',
		JRoute::_(ContentHelperRoute::getCategoryRoute($list[0]->catid)) ,
		$customimage
	);
	echo   "\n".'</div>';
endif;
/* ######### 注释 ######### */
if ($customtext) :
	echo   "\n".'<p class="txt-custom">';
	printf("\n  ".'<a href="%s">%s</a>',
		JRoute::_(ContentHelperRoute::getCategoryRoute($list[0]->catid)) ,
		$customtext
	);
	echo   "\n".'</p>';
endif;
/* ######### ######### ######### 注释 ######### ######### ######### */
if($params->get('count') !=0) :
	printf("\n".'<ul class="latest%s">',
		$moduleclass_sfx
	);
/* ######### ######### 注释 ######### ######### */
	foreach ($list as $key => $item) :
/* ######### 注释 ######### */
		printf("\n  ".'<li class="%s">' ,
			$key + 1
		);
/* ######### 注释 ######### */
		printf("".'<a href="%s">' ,
			$item->link
		);
/* ######### 注释 ######### */
		if($show_number) :
			printf("".'<span class="number">%s</span>' ,
				$key + 1
			);
		endif;
/* ######### 注释 ######### */
		if($show_imageintro) :
			$images = json_decode($item->images);
			if (isset($images->image_intro) and !empty($images->image_intro)) :
				echo   "".'<span class="img-intro">';
				printf("".'<img%s src="%s" alt="%s" />' ,
					$images->image_intro_caption ? ' class="caption"'.' title="' .htmlspecialchars($images->image_intro_caption) .'"' : '' ,
					htmlspecialchars($images->image_intro) ,
					htmlspecialchars($images->image_intro_alt)
				);
				echo   "".'</span>';
			else :
				echo   "".'<span class="img-intro"><img src="/templates/mdaw/img/no_picture.png" /></span>';
			endif;
		endif;
/* ######### 注释 ######### */
		printf("".'%s', $item->title);
		echo $item->title;
/* ######### 注释 ######### */
		echo   "".'</a>';
/* ######### 注释 ######### */
		//if ($show_date) :
switch ($ordering) :
	case 'c_dsc' :
		echo "".'RECENT_ADDED';
	break;
	case 'm_dsc' :
		echo "".'MODIFIED';
	break;
	case 'p_dsc' :
		echo "".'PUBLISHED';
	break;
	case 'mc_dsc' :
		echo "".'RECENT_TOUCHED';
	break;
endswitch;
			printf("".'<span class="date">%s</span>' ,
				JHTML::_('date')
			);
		//endif;
/* ######### 注释 ######### */
	  	echo   "".'</li>';
/* ######### 注释 ######### */
	endforeach;
/* ######### ######### 注释 ######### ######### */
	echo   "\n".'</ul>';
endif;
/* ######### ######### ######### 注释 ######### ######### ######### */
if ($params->get('show_more')) :
	printf("\n  ".'<span class="more"><a href="%s">more</a></span>' ,
		JRoute::_(ContentHelperRoute::getCategoryRoute($more_catid))
	);
endif;
?>
