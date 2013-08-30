<?php
/**
 * @package   http://www.bubujie.net Module
 * @author    Bubujie.Net bubujie@gmail.com
 * @version   beta 2012-06-07
 * @copyright Copyright (C) Bubujie.Net 2008 - 2012 http://www.bubujie.net. All Rights Reserved.
 * @license   步步街商业客户单域名授权，违反必究！
 */
defined('_JEXEC') or die;

require_once JPATH_SITE.'/components/com_content/helpers/route.php';

JModelLegacy::addIncludePath(JPATH_SITE.'/components/com_content/models', 'ContentModel');

abstract class modBubujiePopularHelper
{
	public static function getList(&$params)
	{
		// Get an instance of the generic articles model
		$model = JModelLegacy::getInstance('Articles', 'ContentModel', array('ignore_request' => true));

		// Set application parameters in model
		$app = JFactory::getApplication();
		$appParams = $app->getParams();
		$model->setState('params', $appParams);

		// Set the filters based on the module params
		$model->setState('list.start', 0);
		$model->setState('list.limit', (int) $params->get('count', 5));
		$model->setState('filter.published', 1);
		$model->setState('filter.featured', $params->get('show_front', 1) == 1 ? 'show' : 'hide');

		// Access filter
		$access = !JComponentHelper::getParams('com_content')->get('show_noauth');
		$authorised = JAccess::getAuthorisedViewLevels(JFactory::getUser()->get('id'));
		$model->setState('filter.access', $access);

		// Category filter
		$model->setState('filter.category_id', $params->get('catid', array()));

		// Filter by language
		$model->setState('filter.language', $app->getLanguageFilter());

		// Ordering
		$model->setState('list.ordering', 'a.hits');
		$model->setState('list.direction', 'DESC');

		$items = $model->getItems();

		foreach ($items as &$item) {
			$item->slug = $item->id.':'.$item->alias;
			$item->catslug = $item->catid.':'.$item->category_alias;

			if ($access || in_array($item->access, $authorised)) {
				// We know that user has the privilege to view the article
				$item->link = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catslug));
			} else {
				$item->link = JRoute::_('index.php?option=com_users&view=login');
			}
		}

		return $items;
	}
}
