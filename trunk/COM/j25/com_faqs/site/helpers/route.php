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
 * Faqs Component Route Helper
 *
 * @static
 * @package		BuBujie.Dev
 * @subpackage	com_faqs
 * @since 1.5
 */
abstract class FaqsHelperRoute
{
	protected static $lookup;

	/**
	 * @param	int	The route of the faq
	 */
	public static function getFaqRoute($id, $catid)
	{
		$needles = array(
			'faq'  => array((int) $id)
		);

		//Create the link
		$link = 'index.php?option=com_faqs&view=faq&id='. $id;
		if ($catid > 1) {
			$categories = JCategories::getInstance('Faqs');
			$category = $categories->get($catid);

			if($category) {
				$needles['category'] = array_reverse($category->getPath());
				$needles['categories'] = $needles['category'];
				$link .= '&catid='.$catid;
			}
		}

		if ($item = self::_findItem($needles)) {
			$link .= '&Itemid='.$item;
		}

		return $link;
	}

	/**
	 * @param	int		$id		The id of the faq.
	 * @param	string	$return	The return page variable.
	 */
	public static function getFormRoute($id, $return = null)
	{
		// Create the link.
		if ($id) {
			$link = 'index.php?option=com_faqs&task=faq.edit&w_id='. $id;
		}
		else {
			$link = 'index.php?option=com_faqs&task=faq.add&w_id=0';
		}

		if ($return) {
			$link .= '&return='.$return;
		}

		return $link;
	}

	public static function getCategoryRoute($catid)
	{
		if ($catid instanceof JCategoryNode) {
			$id = $catid->id;
			$category = $catid;
		}
		else {
			$id = (int) $catid;
			$category = JCategories::getInstance('Faqs')->get($id);
		}

		if ($id < 1 || !($category instanceof JCategoryNode))
		{
			$link = '';
		}
		else {
			$needles = array();

			//Create the link
			$link = 'index.php?option=com_faqs&view=category&id='.$id;
			
			$catids = array_reverse($category->getPath());
			$needles['category'] = $catids;
			$needles['categories'] = $catids;

			if ($item = self::_findItem($needles)) {
				$link .= '&Itemid='.$item;
			}
		}

		return $link;
	}

	protected static function _findItem($needles = null)
	{
		$app		= JFactory::getApplication();
		$menus		= $app->getMenu('site');

		// Prepare the reverse lookup array.
		if (self::$lookup === null) {
			self::$lookup = array();

			$component	= JComponentHelper::getComponent('com_faqs');
			$items		= $menus->getItems('component_id', $component->id);

			if ($items) {
				foreach ($items as $item)
				{
					if (isset($item->query) && isset($item->query['view'])) {
						$view = $item->query['view'];

						if (!isset(self::$lookup[$view])) {
							self::$lookup[$view] = array();
						}

						if (isset($item->query['id'])) {
							self::$lookup[$view][$item->query['id']] = $item->id;
						}
					}
				}
			}
		}

		if ($needles)
		{
			foreach ($needles as $view => $ids)
			{
				if (isset(self::$lookup[$view]))
				{
					foreach($ids as $id)
					{
						if (isset(self::$lookup[$view][(int)$id]))
						{
							return self::$lookup[$view][(int)$id];
						}
					}
				}
			}
		}

		$active = $menus->getActive();
		if ($active)
		{
			return $active->id;
		}

		return null;
	}
}
