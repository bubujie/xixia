<?php
/**
 * @version SVN: $Id$
 * @package    Domain
 * @subpackage Base
 * @author     步步街工作室 {@link http://www.bubujie.net}
 * @author     Created on 11-Jan-2013
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') or die('=;)');

//-- Add CSS
JHTML::stylesheet('default.css', 'administrator/components/com_domain/assets/css/');

/**
 *  Require the base controller.
 */
require_once JPATH_COMPONENT.DS.'controller.php';

//-- Require specific controller if requested
if( $controller = JRequest::getCmd('controller'))
{
    $path = JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php';

    if( file_exists($path))
    {
        require_once $path;
    } else
    {
        $controller = '';
    }
}

//-- Create the controller
$classname = 'DomainListController'.$controller;
$controller = new $classname();

//-- Perform the Request task
$controller->execute(JRequest::getCmd('task'));

//-- Redirect if set by the controller
$controller->redirect();
