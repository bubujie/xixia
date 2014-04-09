<?php
/**
 * @copyright	Copyright (C) 2008 - 2014 BuBuJie Studio. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.modelitem');

/**
 * Faqs Component Model for a Faq record
 *
 * @package		BuBujie.Dev
 * @subpackage	com_faqs
 * @since		1.5
 */
class FaqsModelFaq extends JModelItem
{
	/**
	 * Model context string.
	 *
	 * @access	protected
	 * @var		string
	 */
	protected $_context = 'com_faqs.faq';

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
		$params	= $app->getParams();

		// Load the object state.
		$id	= JRequest::getInt('id');
		$this->setState('faq.id', $id);

		// Load the parameters.
		$this->setState('params', $params);
	}

	/**
	 * Method to get an ojbect.
	 *
	 * @param	integer	The id of the object to get.
	 *
	 * @return	mixed	Object on success, false on failure.
	 */
	public function &getItem($id = null)
	{
		if ($this->_item === null)
		{
			$this->_item = false;

			if (empty($id)) {
				$id = $this->getState('faq.id');
			}

			// Get a level row instance.
			$table = JTable::getInstance('Faq', 'FaqsTable');

			// Attempt to load the row.
			if ($table->load($id))
			{
				// Check published state.
				if ($published = $this->getState('filter.published'))
				{
					if ($table->state != $published) {
						return $this->_item;
					}
				}

				// Convert the JTable to a clean JObject.
				$properties = $table->getProperties(1);
				$this->_item = JArrayHelper::toObject($properties, 'JObject');
			}
			elseif ($error = $table->getError()) {
				$this->setError($error);
			}
		}

		return $this->_item;
	}

	/**
	 * Method to increment the hit counter for the faq
	 *
	 * @param	int		Optional ID of the faq.
	 * @return	boolean	True on success
	 * @since	1.5
	 */
	public function hit($id = null)
	{
		if (empty($id)) {
			$id = $this->getState('faq.id');
		}

		$faq = $this->getTable('Faq', 'FaqsTable');
		return $faq->hit($id);
	}
}
