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

class DomainListViewDomain extends JView
{
    /**
     * Domain view display method.
     *
     * @return void
     **/
    function display($tpl = null)
    {
        //-- Get the Domain
        $Domain = $this->get('Data');
        $isNew = ($Domain->id < 1);

        $text = $isNew ? JText::_('New') : JText::_('Edit');
        JToolBarHelper::title('Domain: <small><small>[ '.$text.' ]</small></small>');
        JToolBarHelper::save();

        if ($isNew)
        {
            JToolBarHelper::cancel();
        }
        else
        {
            //-- For existing items the button is renamed `close`
            JToolBarHelper::cancel('cancel', JText::_('Close'));
        }

        $this->assignRef('Domain', $Domain);

        parent::display($tpl);
    }//function

}//class
