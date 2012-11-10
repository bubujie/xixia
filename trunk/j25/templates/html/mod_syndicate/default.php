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

printf("\n".'<a href="%s" class="syndicate-module%s">' ,
	$link ,
	$moduleclass_sfx
);
echo   "\n  ".JHtml::_('image', 'system/livemarks.png', 'feed-image', NULL, true);
if ($params->get('display_text', 1)) :
	echo   "\n  ".'<span>';
	if (str_replace(' ', '', $text) != '') :
		echo   "".$text;
	else :
		echo   "".JText::_('MOD_SYNDICATE_DEFAULT_FEED_ENTRIES');
	endif;
	echo   "".'</span>';
endif;
echo   "\n".'</a>';
?>
