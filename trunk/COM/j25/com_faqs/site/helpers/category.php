<?php
/**
 * @package		BuBujie.Dev
 * @subpackage	com_faqs
 * @copyright	Copyright (C) 2008 - 2014 BuBuJie Studio. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Component Helper
jimport('joomla.application.component.helper');
jimport('joomla.application.categories');

/**
 * Faqs Component Category Tree
 *
 * @static
 * @package		BuBujie.Dev
 * @subpackage	com_faqs
 * @since 1.6
 */
class FaqsCategories extends JCategories
{
	public function __construct($options = array())
	{
		$options['table'] = '#__faqs';
		$options['extension'] = 'com_faqs';
		parent::__construct($options);
	}
}
