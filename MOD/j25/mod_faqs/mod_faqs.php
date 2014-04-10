<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_faqs
 * @copyright	Copyright (C) 2005 - 2009 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Include the faqs functions only once
require_once dirname(__FILE__).'/helper.php';

$list = modFaqsHelper::getList($params);

if (!count($list)) {
	return;
}

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_faqs', $params->get('layout', 'default'));
