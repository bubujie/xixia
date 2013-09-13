<?php
/**
 * @version SVN: $Id$
 * @package    Domain
 * @subpackage Controllers
 * @author     步步街工作室 {@link http://www.bubujie.net}
 * @author     Created on 11-Jan-2013
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') or die('=;)');

jimport('joomla.application.component.controller');

/**
 * Domain Controller
 *
 * @package    Domain
 * @subpackage Controllers
 */
class DomainListControllerDomain extends DomainListController
{
    /**
     * constructor (registers additional tasks to methods).
     *
     * @return void
     */
    function __construct()
    {
        parent::__construct();

        //-- Register Extra tasks
        $this->registerTask('add', 'edit');
    }//function

    /**
     * display the edit form.
     *
     * @return void
     */
    function edit()
    {
        JRequest::setVar('view', 'Domain');
        JRequest::setVar('layout', 'form');
        JRequest::setVar('hidemainmenu', 1);

        parent::display();
    }//function

    /**
     * Save a record (and redirect to main page).
     *
     * @return void
     */
    function save()
    {
        $model = $this->getModel('Domain');
        $link = 'index.php?option=com_domain';

        if($model->store())
        {
            $msg = JText::_('Record daved');
            $this->setRedirect($link, $msg);
        }
        else
        {
            $msg = $model->getError();
            $this->setRedirect($link, $msg, 'error');
        }
    }//function

    /**
     * Remove record(s).
     *
     * @return void
     */
    function remove()
    {
        $model = $this->getModel('Domain');
        $link = 'index.php?option=com_domain';

        if($model->delete())
        {
            $msg = JText::_('Records deleted');
            $this->setRedirect($link, $msg);
        }
        else
        {
            $msg = JText::sprintf('One or more records could not be deleted: ', $model->getError());
            $this->setRedirect($link, $msg, 'error');
        }

    }//function

    /**
     * Cancel editing a record.
     *
     * @return void
     */
    function cancel()
    {
        $msg = JText::_('Operation Cancelled');
        $this->setRedirect('index.php?option=com_domain', $msg, 'notice');
    }//function

}//class
