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

printf("".'<div class="custom%s"%s>' ,
	$moduleclass_sfx ,
	$params->get('backgroundimage') ? ' style="background-image:url('.$params->get('backgroundimage').')"' : ''
);
echo   "\n".$module->content;
echo   "\n".'</div>';
