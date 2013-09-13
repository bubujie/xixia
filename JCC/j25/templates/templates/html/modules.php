<?php
/**
 * @package   ##website## Template
 * @author    ##author## ##email##
 * @version   ##version## ##date##
 * @copyright Copyright (C) ##author## 2008 - 2012 ##website##. All Rights Reserved.
 * @license   ##license##
 */

// no direct access
defined('_JEXEC') or die('Restricted access');



// 模块的加div结构（特点是content没有外套）
function modChrome_open($module, &$params, &$attribs)
{
	if (!empty ($module->content)) :
		echo   "\n".'<!-- ######### module ######### -->';
		echo $module->content;
		echo   "\n".'<!-- ######### /module ######### -->';
	endif;
}



// 模块的加div结构（特点是content没有外套）
function modChrome_div($module, &$params, &$attribs)
{
	$headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
	if (!empty ($module->content)) :
		echo   "\n".'<!-- ######### module ######### -->';
		printf("\n".'<div id="module-%s" class="module mod%s ding">' ,
			$module->id ,
			$params->get('moduleclass_sfx')
		);
		if ($module->showtitle) :
			printf("\n    ".'<h%s class="mod-heading"><span>%s</span></h%s>' ,
				$headerLevel ,
				$module->title ,
				$headerLevel
			);
		endif;
		echo   "\n  ".'<div class="mod-content">';
		echo $module->content;
		echo   "\n  ".'</div>';
		echo   "\n".'</div>';
		echo   "\n".'<!-- ######### /module ######### -->';
	endif;
}



// 模块的zen garden风格结构（特点是最外部仅有单层外套，content没有外套）
function modChrome_zen($module, &$params, &$attribs)
{
	$headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
	if (!empty ($module->content)) :
		echo   "\n".'<!-- ######### module ######### -->';
		printf("\n".'<div id="module-%s" class="module mod%s ding">' ,
			$module->id ,
			$params->get('moduleclass_sfx')
		);
		if ($module->showtitle) :
			printf("\n  ".'<h%s class="mod-heading"><span>%s</span></h%s>' ,
				$headerLevel ,
				$module->title ,
				$headerLevel
			);
		endif;
		echo $module->content;
		//echo   "\n  ".'<div class="blank"></div>';
		echo   "\n".'</div>';
		echo   "\n".'<!-- ######### /module ######### -->';
	endif;
}



// 模块的double风格结构（最新版Tuding布局系统，双边框是必要的）
function modChrome_dbl($module, &$params, &$attribs)
{
	$headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
	if (!empty ($module->content)) :
		echo   "\n".'<!-- ######### module ######### -->';
		printf("\n".'<div id="module-%s" class="module mod%s ding">' ,
			$module->id ,
			$params->get('moduleclass_sfx')
		);
		echo   "\n  ".'<div class="stroke">';
		if ($module->showtitle) :
			printf("\n    ".'<h%s class="mod-heading"><span>%s</span></h%s>' ,
				$headerLevel ,
				$module->title ,
				$headerLevel
			);
		endif;

		echo   "\n    ".'<div class="mod-content">'; 
		echo $module->content;
		echo   "\n    ".'</div>';
		//echo   "\n    ".'<div class="tl"></div><div class="tr"></div><div class="bl"></div><div class="br"></div>';
		echo   "\n  ".'</div>';
		//echo   "\n  ".'<div class="blank"></div>';
		echo   "\n".'</div>';
		echo   "\n".'<!-- ######### /module ######### -->';
	endif;
}



// 模块的double风格结构（最新版Tuding布局系统，双边框是必要的）
function modChrome_cnr($module, &$params, &$attribs)
{
	$headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
	if (!empty ($module->content)) :
		echo   "\n".'<!-- ######### module ######### -->';
		printf("\n".'<div id="module-%s" class="module mod%s ding">' ,
			$module->id ,
			$params->get('moduleclass_sfx')
		);
		echo   "\n  ".'<div class="stroke">';
		if ($module->showtitle) :
			printf("\n    ".'<h%s class="mod-heading"><span>%s</span></h%s>' ,
				$headerLevel ,
				$module->title ,
				$headerLevel
			);
		endif;

		echo   "\n    ".'<div class="mod-content">'; 
		echo $module->content;
		echo   "\n    ".'</div>';
		echo   "\n    ".'<div class="tl"></div><div class="tr"></div><div class="bl"></div><div class="br"></div>';
		echo   "\n  ".'</div>';
		echo   "\n  ".'<div class="blank"></div>';
		echo   "\n".'</div>';
		echo   "\n".'<!-- ######### /module ######### -->';
	endif;
}



// 模块的加panel结构（特点是没有完整外套，专为panel准备）
function modChrome_pnl($module, &$params, &$attribs)
{
	$headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
	if (!empty ($module->content)) :
		echo   "\n".'<!-- ### panel ### -->';
		printf("\n".'<div class="panel ding pnl%s">' ,
			$params->get('moduleclass_sfx')
		);
		printf("\n  ".'<h%s class="pnl-heading"><span>%s</span></h%s>' ,
			$headerLevel ,
			$module->title ,
			$headerLevel
		);
		echo   "\n  ".'<div class="pnl-content">';
		echo $module->content;
		echo   "\n  ".'</div>';
		echo   "\n".'</div>';
		echo   "\n".'<!-- ### /panel ### -->';
	endif;
}
?>
