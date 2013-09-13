<?php
/**
 * @version SVN: $Id$
 * @package    Domain
 * @subpackage Views
 * @author     步步街工作室 {@link http://www.bubujie.net}
 * @author     Created on 11-Jan-2013
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') or die('=;)');

jimport('joomla.application.component.view');

/**
 * HTML View class for the Domain Component
 *
 * @package    Domain
 * @subpackage Views
 */
class DomainListViewDomainList extends JView
{
    /**
     * DomainList view display method
     *
     * @return void
     **/
    function display($tpl = null)
    {
        JToolBarHelper::title(JText::_('Domain Manager'), 'generic.png');
        JToolBarHelper::deleteList();
        JToolBarHelper::editListX();
        JToolBarHelper::addNewX();

        //-- Get data from the model
        $items = $this->get('Data');

        $this->assignRef('items', $items);

        parent::display($tpl);
    }//function

}//class
