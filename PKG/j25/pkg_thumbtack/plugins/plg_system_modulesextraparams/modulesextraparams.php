<?php
/**
 * @package		Bubujie.Studio
 * @subpackage	mod_advertisements
 * @copyright	Copyright (C) 步步街工作室 2008 - 2012. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

jimport( 'joomla.plugin.plugin' );

// Load modified JDocumentRendererModule before the Joomla Framework doest it, to ignore that
// Works with Joomla 2.5.7 too.
require_once JPATH_SITE.DS.'plugins'.DS.'system'.DS.'modulesextraparams'.DS.'class'.DS.'helper.php';


/**
 * Moduls Params plugin.
 *
 * @package     Joomla.Plugin
 * @subpackage  System.modulesparams
 */

class plgSystemModulesextraparams extends JPlugin {

}
