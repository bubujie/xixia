<?php
/**
 * @package		BuBujie.Dev
 * @subpackage	com_faqs
 * @copyright	Copyright (C) 2008 - 2014 BuBuJie Studio. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

require_once JPATH_COMPONENT_ADMINISTRATOR.'/models/faq.php';

/**
 * Faqs model.
 *
 * @package		BuBujie.Dev
 * @subpackage	com_faqs
 * @since		1.6
 */
class FaqsModelForm extends FaqsModelFaq
{
	/**
	 * Get the return URL.
	 *
	 * @return	string	The return URL.
	 * @since	1.6
	 */
	public function getReturnPage()
	{
		return base64_encode($this->getState('return_page'));
	}

	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @since	1.6
	 */
	protected function populateState()
	{
		$app = JFactory::getApplication();

		// Load state from the request.
		$pk = JRequest::getInt('w_id');
		$this->setState('faq.id', $pk);
		// Add compatibility variable for default naming conventions.
		$this->setState('form.id', $pk);

		$categoryId	= JRequest::getInt('catid');
		$this->setState('faq.catid', $categoryId);

		$return = JRequest::getVar('return', null, 'default', 'base64');

		if (!JUri::isInternal(base64_decode($return))) {
			$return = null;
		}

		$this->setState('return_page', base64_decode($return));

		// Load the parameters.
		$params	= $app->getParams();
		$this->setState('params', $params);

		$this->setState('layout', JRequest::getCmd('layout'));
	}
}
