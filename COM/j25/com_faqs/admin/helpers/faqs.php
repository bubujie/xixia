<?php
/**
 * @copyright	Copyright (C) 2008 - 2014 BuBuJie Studio. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Faqs helper.
 *
 * @package		BuBujie.Dev
 * @subpackage	com_faqs
 * @since		1.6
 */
class FaqsHelper
{
	/**
	 * Configure the Linkbar.
	 *
	 * @param	string	The name of the active view.
	 * @since	1.6
	 */
	public static function addSubmenu($vName = 'faqs')
	{
		JSubMenuHelper::addEntry(
			JText::_('COM_FAQS_SUBMENU_FAQS'),
			'index.php?option=com_faqs&view=faqs',
			$vName == 'faqs'
		);
		JSubMenuHelper::addEntry(
			JText::_('COM_FAQS_SUBMENU_CATEGORIES'),
			'index.php?option=com_categories&extension=com_faqs',
			$vName == 'categories'
		);
		if ($vName=='categories') {
			JToolBarHelper::title(
				JText::sprintf('COM_CATEGORIES_CATEGORIES_TITLE', JText::_('com_faqs')),
				'faqs-categories');
		}
	}

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @param	int		The category ID.
	 * @return	JObject
	 * @since	1.6
	 */
	public static function getActions($categoryId = 0)
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		if (empty($categoryId)) {
			$assetName = 'com_faqs';
			$level = 'component';
		} else {
			$assetName = 'com_faqs.category.'.(int) $categoryId;
			$level = 'category';
		}

		$actions = JAccess::getActions('com_faqs', $level);

		foreach ($actions as $action) {
			$result->set($action->name,	$user->authorise($action->name, $assetName));
		}

		return $result;
	}
}
