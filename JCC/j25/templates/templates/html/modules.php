<?php
/**
 * @package   ##website## Template
 * @author    ##author## ##email##
 * @version   ##version## ##date##
 * @copyright Copyright (C) ##author## 2008 - ##year## ##website##. All Rights Reserved.
 * @license   ##license##
 */
//编码保持
// no direct access
defined('_JEXEC') or die('Restricted access');



// 模块的加open结构（特点是没有外套，没有标题，直接输出content部分）
function modChrome_open($module, &$params, &$attribs)
{
	$moduleTag      = $params->get('module_tag', 'div');
	$headerTag      = htmlspecialchars($params->get('header_tag', 'h3'));
	$bootstrapSize  = (int) $params->get('bootstrap_size', 0);
	$moduleClass    = $bootstrapSize != 0 ? ' span' . $bootstrapSize : '';

	// Temporarily store header class in variable
	$headerClass	= $params->get('header_class');
	$headerClass	= !empty($headerClass) ? ' class="' . htmlspecialchars($headerClass) . '"' : '';
	$gridSize       = $params->get('grid_size', 0);

	if (!empty ($module->content)) :
		echo $gridSize ? "\n".'<div class="'.$gridSize.' xfl clearfix">' : '';
		echo $module->content;
		//echo   "\n  ".'<div class="blank"></div>';
		echo $gridSize ? "\n".'</div>' : '';
	endif;
}



// 模块的加div结构（特点是最外部仅有单层外套，content有外套）
function modChrome_division($module, &$params, &$attribs)
{
	$moduleTag      = $params->get('module_tag', 'div');
	$headerTag      = htmlspecialchars($params->get('header_tag', 'h3'));
	$bootstrapSize  = (int) $params->get('bootstrap_size', 0);
	$moduleClass    = $bootstrapSize != 0 ? ' span' . $bootstrapSize : '';

	// Temporarily store header class in variable
	$headerClass	= $params->get('header_class');
	$headerClass	= !empty($headerClass) ? ' class="' . htmlspecialchars($headerClass) . '"' : '';
	$gridSize       = $params->get('grid_size', 0);

	$headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
	if (!empty ($module->content)) :
		echo $gridSize ? "\n".'<div class="'.$gridSize.' xfl clearfix">' : '';
		printf("\n".'<div id="module-%s" class="module mod%s division clearfix">' ,
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
		//echo   "\n  ".'<div class="blank"></div>';
		echo   "\n".'</div>';
		echo $gridSize ? "\n".'</div>' : '';
	endif;
}



// 模块的zen garden风格结构（特点是最外部仅有单层外套，content没有外套）
function modChrome_zengarden($module, &$params, &$attribs)
{
	$moduleTag      = $params->get('module_tag', 'div');
	$headerTag      = htmlspecialchars($params->get('header_tag', 'h3'));
	$bootstrapSize  = (int) $params->get('bootstrap_size', 0);
	$moduleClass    = $bootstrapSize != 0 ? ' span' . $bootstrapSize : '';

	// Temporarily store header class in variable
	$headerClass	= $params->get('header_class');
	$headerClass	= !empty($headerClass) ? ' class="' . htmlspecialchars($headerClass) . '"' : '';
	$gridSize       = $params->get('grid_size', 0);

	$headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
	if (!empty ($module->content)) :
		echo $gridSize ? "\n".'<div class="'.$gridSize.' xfl clearfix">' : '';
		printf("\n".'<div id="module-%s" class="module mod%s clearfix">' ,
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
		echo $gridSize ? "\n".'</div>' : '';
	endif;
}



// 模块的Stroke风格结构（特点是最外部有双层外套，content部分也有外套）
function modChrome_stroke($module, &$params, &$attribs)
{
	$moduleTag      = $params->get('module_tag', 'div');
	$headerTag      = htmlspecialchars($params->get('header_tag', 'h3'));
	$bootstrapSize  = (int) $params->get('bootstrap_size', 0);
	$moduleClass    = $bootstrapSize != 0 ? ' span' . $bootstrapSize : '';

	// Temporarily store header class in variable
	$headerClass	= $params->get('header_class');
	$headerClass	= !empty($headerClass) ? ' class="' . htmlspecialchars($headerClass) . '"' : '';
	$gridSize       = $params->get('grid_size', 0);

	$headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
	if (!empty ($module->content)) :
		echo $gridSize ? "\n".'<div class="'.$gridSize.' xfl clearfix">' : '';
		printf("\n".'<div id="module-%s" class="module mod%s stroke clearfix">' ,
			$module->id ,
			$params->get('moduleclass_sfx')
		);
		echo   "\n  ".'<div class="strokeo clearfix">';
		echo   "\n    ".'<div class="strokec clearfix">';
		echo   "\n      ".'<div class="strokei clearfix">';
		if ($module->showtitle) :
			printf("\n        ".'<h%s class="mod-heading clearfix"><span>%s</span></h%s>' ,
				$headerLevel ,
				$module->title ,
				$headerLevel
			);
		endif;

		echo   "\n        ".'<div class="mod-content">'; 
		echo $module->content;
		echo   "\n        ".'</div>';
		//echo   "\n  ".'<div class="blank"></div>';
		echo   "\n      ".'</div>';
		echo   "\n    ".'</div>';
		echo   "\n  ".'</div>';
		echo   "\n".'</div>';
		echo $gridSize ? "\n".'</div>' : '';
	endif;
}



// 模块的Squared风格结构（九宫格）
function modChrome_squared($module, &$params, &$attribs)
{
	$moduleTag      = $params->get('module_tag', 'div');
	$headerTag      = htmlspecialchars($params->get('header_tag', 'h3'));
	$bootstrapSize  = (int) $params->get('bootstrap_size', 0);
	$moduleClass    = $bootstrapSize != 0 ? ' span' . $bootstrapSize : '';

	// Temporarily store header class in variable
	$headerClass	= $params->get('header_class');
	$headerClass	= !empty($headerClass) ? ' class="' . htmlspecialchars($headerClass) . '"' : '';
	$gridSize       = $params->get('grid_size', 0);

	$headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
	if (!empty ($module->content)) :
		echo $gridSize ? "\n".'<div class="'.$gridSize.' xfl clearfix">' : '';
		printf("\n".'<div id="module-%s" class="module mod%s clearfix">' ,
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
		echo   "\n    ".'<div class="lt"></div><div class="rt"></div><div class="lb"></div><div class="rb"></div>';
		echo   "\n  ".'</div>';
		echo   "\n".'</div>';
		echo $gridSize ? "\n".'</div>' : '';
	endif;
}



// 模块的加Panel结构（特点是没有完整外套，专为panel准备）
function modChrome_panel($module, &$params, &$attribs)
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
