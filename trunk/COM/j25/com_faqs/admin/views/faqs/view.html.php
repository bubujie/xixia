<?php
/**
 * @copyright	Copyright (C) 2008 - 2014 BuBuJie Studio. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * View class for a list of faqs.
 *
 * @package		BuBujie.Dev
 * @subpackage	com_faqs
 * @since		1.5
 */
class FaqsViewFaqs extends JViewLegacy
{
	protected $items;
	protected $pagination;
	protected $state;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		$this->state		= $this->get('State');
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		$this->addToolbar();
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @since	1.6
	 */
	protected function addToolbar()
	{
		require_once JPATH_COMPONENT.'/helpers/faqs.php';

		$state	= $this->get('State');
		$canDo	= FaqsHelper::getActions($state->get('filter.category_id'));
		$user	= JFactory::getUser();

		JToolBarHelper::title(JText::_('COM_FAQS_MANAGER_FAQS'), 'faqs.png');
		if (count($user->getAuthorisedCategories('com_faqs', 'core.create')) > 0) {
			JToolBarHelper::addNew('faq.add');
		}
		if ($canDo->get('core.edit')) {
			JToolBarHelper::editList('faq.edit');
		}
		if ($canDo->get('core.edit.state')) {

			JToolBarHelper::divider();
			JToolBarHelper::publish('faqs.publish', 'JTOOLBAR_PUBLISH', true);
			JToolBarHelper::unpublish('faqs.unpublish', 'JTOOLBAR_UNPUBLISH', true);


			JToolBarHelper::divider();
			JToolBarHelper::archiveList('faqs.archive');
			JToolBarHelper::checkin('faqs.checkin');
		}
		if ($state->get('filter.state') == -2 && $canDo->get('core.delete')) {
			JToolBarHelper::deleteList('', 'faqs.delete', 'JTOOLBAR_EMPTY_TRASH');
			JToolBarHelper::divider();
		} elseif ($canDo->get('core.edit.state')) {
			JToolBarHelper::trash('faqs.trash');
			JToolBarHelper::divider();
		}
		if ($canDo->get('core.admin')) {
			JToolBarHelper::preferences('com_faqs');
			JToolBarHelper::divider();
		}

		JToolBarHelper::help('JHELP_COMPONENTS_FAQS_LINKS');
	}
}
