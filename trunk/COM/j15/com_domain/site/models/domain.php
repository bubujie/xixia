<?php
/**
 * @version SVN: $Id$
 * @package    Domain
 * @subpackage Models
 * @author     步步街工作室 {@link http://www.bubujie.net}
 * @author     Created on 11-Jan-2013
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') or die('=;)');

jimport('joomla.application.component.model');

/**
 * Domain Model
 *
 * @package    Domain
 * @subpackage Models
 */
class DomainModelDomain extends JModel
{
    /**
     * Gets the data.
     *
     * @return string The data to be displayed to the user
     */
    function getData()
    {
        $db =& JFactory::getDBO();

        $query = 'SELECT * FROM #__domain';
        $db->setQuery($query);
        $data = $db->loadObjectList();

        return $data;
    }//function

}//class
