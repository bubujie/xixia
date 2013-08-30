<?php
/**
 * @package   http://www.bubujie.net Module
 * @author    BuBuJie.Net bubujie@gmail.com
 * @version   beta 2012-06-07
 * @copyright Copyright (C) BuBuJie.Net 2008 - 2012 http://www.bubujie.net. All Rights Reserved.
 * @license   步步街商业客户单域名授权，违反必究！
 */

defined('_JEXEC') or die;
/* ######### 注释 ######### */
$show_date        = $params->get('show_date', 0);
$show_date_field  = $params->get('show_date_field', 'created');
$show_date_format = $params->get('show_date_format', 'Y.m.d H:i:s');
/* ######### 注释 ######### */
$pre_image        = $params->get('pre_image');
$pre_text         = $params->get('pre_text');
$more_catid       = $params->get('more_catid');
$show_more        = $params->get('show_more', 1);
$show_imageintro  = $params->get('show_imageintro', 0);
$show_number      = $params->get('show_number', 0);
/* ######### 注释 ######### */
//JHtml::_('stylesheet', 'mod_bubujie_popular/style.css', array(), true);
//JHtml::_('stylesheet', 'mod_languages/template.css', array(), true); /*实际路径是*/
JHtml::stylesheet('mod_bubujie_popular/style.css', false, true, false);
if ($pre_image) :
	echo   "\n".'<div class="img-custom">';
	printf("\n  ".'<a href="%s"><img src="%s" alt="" /></a>',
		JRoute::_(ContentHelperRoute::getCategoryRoute($more_catid)) ,
		$pre_image
	);
	echo   "\n".'</div>';
endif;
/* ######### 注释 ######### */
if ($pre_text) :
	echo   "\n".'<p class="txt-custom">';
	printf("\n  ".'<a href="%s">%s</a>',
		JRoute::_(ContentHelperRoute::getCategoryRoute($more_catid)) ,
		$pre_text
	);
	echo   "\n".'</p>';
endif;
/* ######### ######### ######### 注释 ######### ######### ######### */
if($params->get('count') !=0) :
	printf("\n".'<ul class="popular%s">',
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
				echo   "".'<span class="thumb">';
				printf("".'<img%s src="%s" alt="%s" />' ,
					$images->image_intro_caption ? ' class="caption"'.' title="' .htmlspecialchars($images->image_intro_caption) .'"' : '' ,
					htmlspecialchars($images->image_intro) ,
					htmlspecialchars($images->image_intro_alt)
				);
				echo   "".'</span>';
			else :
				echo   "".'<span class="thumb">No Image</span>';
			endif;
		endif;
/* ######### 注释 ######### */
		printf("".'<strong>%s</strong>', $item->title);
/* ######### 注释 ######### */
		echo   "".'</a>';
/* ######### 注释 ######### */
		if ($show_date) :
			printf("".'<p class="date">%s</p>' ,
				JHTML::_('date', $item->$show_date_field, $show_date_format)
			);
		endif;
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
