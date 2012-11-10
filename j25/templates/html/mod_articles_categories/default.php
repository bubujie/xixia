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

printf("\n".'<ul class="categories-module%s">' ,
	$moduleclass_sfx
);
require JModuleHelper::getLayoutPath('mod_articles_categories', $params->get('layout', 'default').'_items');
echo   "\n".'</ul>';
?>
