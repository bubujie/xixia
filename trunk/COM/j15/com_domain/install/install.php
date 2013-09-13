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
 * Domain Main installer
 */
function com_install()
{
    echo '<h2>'.JText::sprintf('%s Installer', 'Domain').'</h2>';


    /*
     * Custom install function
     *
     * If something goes wrong..
     */

    // return false;

    /*
     * otherwise...
     */

    return true;
}// function

