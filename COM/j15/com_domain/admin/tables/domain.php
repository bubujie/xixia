<?php
/**
 * @version SVN: $Id$
 * @package    Domain
 * @subpackage Tables
 * @author     步步街工作室 {@link http://www.bubujie.net}
 * @author     Created on 11-Jan-2013
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') or die('=;)');

/**
 * Domain Table class
 *
 * @package    Domain
 * @subpackage Tables
 */
class TableDomain extends JTable
{
    /**
     * Primary Key
     *
     * @var int
     */
    var $id = null;

    /**
     * @var string
     */
    var $suffix = null;

    /**
     * @var string
     */
    var $server = null;

    /**
     * @var string
     */
    var $keyword = null;

    /**
     * @var string
     */
    var $status = null;

    /**
     * Constructor
     *
     * @param object $db Database connector object
     */
    function TableDomain(& $db)
    {
        parent::__construct('#__domain', 'id', $db);
    }//function

}//class