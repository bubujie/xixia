<?php
/**
 * @package   ##Module## Module
 * @author    ##author## ##email##
 * @version   ##version## ##date##
 * @copyright Copyright (C) ##author## 2008 - 2012 ##website##. All Rights Reserved.
 * @license   ##license##
 */

defined('_JEXEC') or die; // no direct access

require_once (dirname(__FILE__).DS.'helper.php');
$item = mod##Module##Helper::getItem($params);
require(JModuleHelper::getLayoutPath('mod_##module##'));
require_once ('helper.php');

?>