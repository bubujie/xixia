<?php
/**
 * @package    NestedRebuild
 * @subpackage Views
 * @author     步步街工作室 {@link www.bubujie.net}
 * @author     Created on 15-Feb-2014
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') || die('=;)');


//-- Import the JView class
jimport('joomla.application.component.view');

/**
 * HTML View class for the NestedRebuild Component.
 *
 * @package NestedRebuild
 */
class NestedRebuildViewNestedRebuild extends JView
{
    /**
     * NestedRebuild view display method.
     *
     * @param string $tpl The name of the template file to parse;
     *
     * @return void
     */
    public function display($tpl = null)
    {
        $this->greeting = "Hello World!";

        parent::display($tpl);
    }//function
}//class
