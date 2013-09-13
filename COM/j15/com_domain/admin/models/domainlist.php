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
 * DomainList Model
 *
 * @package    Domain
 * @subpackage Models
 */
class DomainListModelDomainList extends JModel
{
    /**
     * DomainList data array
     *
     * @var array
     */
    var $_data;

    /**
     * Retrieves the hello data.
     *
     * @return array Array of objects containing the data from the database
     */
    function getData()
    {
        //-- Lets load the data if it doesn't already exist
        if(empty($this->_data))
        {
            $query = $this->_buildQuery();
            $this->_data = $this->_getList($query);
        }

        return $this->_data;
    }//function

    /**
     * Returns the query.
     *
     * @return string The query to be used to retrieve the rows from the database
     */
    function _buildQuery()
    {
        $query = ' SELECT * '
        . ' FROM #__domain ';

        return $query;
    }//function

}//class
