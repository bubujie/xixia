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

printf("\n".'<div class="crumbs crumbs%s">' , $moduleclass_sfx);

if ($params->get('showHere', 1)) :
	printf("\n  ".'<span class="prefix">%s</span>' , JText::_('MOD_BREADCRUMBS_HERE'));
endif;

for ($i = 0; $i < $count; $i ++) :

	// If not the last item in the breadcrumbs add the separator
	if ($i < $count -1) :

		if (!empty($list[$i]->link)) :
			printf("\n  ".'<a href="%s">%s</a>' , $list[$i]->link , $list[$i]->name);
		else :
			printf("\n  ".'<span>%s</span>' , $list[$i]->name);
		endif;

		if($i < $count -2) :
			echo   "\n  ".$separator.' ';
		endif;

	elseif ($params->get('showLast', 1)) : // when $i == $count -1 and 'showLast' is true

		if($i > 0) :
			echo   "\n  ".$separator.' ';
		endif;
		printf("\n  ".'<span>%s</span>' , $list[$i]->name);

	endif;

endfor;

echo   "\n".'</div>';
?>
