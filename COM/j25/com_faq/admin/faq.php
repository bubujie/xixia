<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	com_weblinks
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_faq')) {
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

$controller	= JControllerLegacy::getInstance('Faq');
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();
