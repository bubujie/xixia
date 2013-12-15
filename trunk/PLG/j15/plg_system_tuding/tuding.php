<?php
/**
 * @version SVN: $Id$
 * @package    tuding
 * @subpackage Base
 * @author     EasyJoomla {@link http://www.easy-joomla.org Easy-Joomla.org}
 * @author     步步街工作室 {@link http://www.bubujie.net}
 * @author     Created on 13-Dec-2013
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') or die('=;)');

jimport('joomla.plugin.plugin');

/**
 * Example System Plugin
 *
 * @package    tuding
 * @subpackage Plugin
 */
class plgSystemtuding extends JPlugin
{
    /**
     * Constructor
     *
     * For php4 compatability we must not use the __constructor as a constructor for plugins
     * because func_get_args ( void ) returns a copy of all passed arguments NOT references.
     * This causes problems with cross-referencing necessary for the observer design pattern.
     *
     * @access      protected
     * @param       object  $subject The object to observe
     * @param       array   $config  An array that holds the plugin configuration
     */
    function plgSystemtuding( &$subject, $config )
    {
        parent::__construct( $subject, $config );

        // Do some extra initialisation in this constructor if required
    }//function

    /**
     * Do something onAfterInitialise
     */
    function onAfterInitialise()
    {
    }//function

    /**
     * Do something onAfterRoute
     */
    function onAfterRoute()
    {
    }//function

    /**
     * Do something onAfterDispatch
     */
    function onAfterDispatch()
    {
    $doc = JFactory::getDocument();
      // Stop if type is not HTML
      if ($doc->getType() != "html") return;
      
      // Add jquery to the scripts
      $doc->addScript(JURI::root(true).'/plugins/system/tuding/js/jquery-1.7.2.min.js');
      $doc->addScript(JURI::root(true).'/plugins/system/tuding/js/jquery-noconflict.js');
    }//function

    /**
     * Do something onAfterRender
     */
    function onAfterRender()
    {
    }//function

}//class