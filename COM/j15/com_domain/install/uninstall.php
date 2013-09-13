<?php
/**
 * @version SVN: $Id$
 * @package    Domain
 * @subpackage Install
 * @author     步步街工作室 {@link http://www.bubujie.net}
 * @author     Created on 11-Jan-2013
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') or die('=;)');

/**
 * The main uninstaller function
 */
function com_uninstall()
{
    echo '<h2>'.JText::sprintf('%s Uninstaller', 'Domain').'</h2>';

    /*
     * Custom uninstall function
     *
     * If something goes wrong..
     */

    // return false;

    /*
     * otherwise...
     */

    return true;
}// function
