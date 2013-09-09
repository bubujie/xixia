<?php
/**
 * @version SVN: $Id$
 * @package    CreativeCommons
 * @subpackage Base
 * @author     EasyJoomla {@link http://www.easy-joomla.org Easy-Joomla.org}
 * @author     步步街工作室 {@link http://www.bubujie.net}
 * @author     Created on 09-Jan-2013
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') or die('=;)');

jimport( 'joomla.plugin.plugin' );

/**
 * Example Content Plugin
 *
 * @package    CreativeCommons
 * @subpackage Plugin
 */
class plgContentCreativeCommons extends JPlugin
{

    /**
     * Constructor
     *
     * For php4 compatability we must not use the __constructor as a constructor for plugins
     * because func_get_args ( void ) returns a copy of all passed arguments NOT references.
     * This causes problems with cross-referencing necessary for the observer design pattern.
     *
     * @param object $subject The object to observe
     * @param object $params  The object that holds the plugin parameters
     * @since 1.5
     */
    function plgContentCreativeCommons( &$subject, $params )
    {
        parent::__construct( $subject, $params );
    }//function

    /**
     * Example prepare content method
     *
     * Method is called by the view
     *
     * @param  object      The article object.  Note $article->text is also available
     * @param  object      The article params
     * @param  int         The 'page' number
     */
    function onPrepareContent( &$article, &$params, $limitstart )
    {

    }//function

    /**
     * Example after display title method
     *
     * Method is called by the view and the results are imploded and displayed in a placeholder
     *
     * @param  object      The article object.  Note $article->text is also available
     * @param  object      The article params
     * @param  int         The 'page' number
     * @return string
     */
    function onAfterDisplayTitle( &$article, &$params, $limitstart )
    {
        return '';
    }//function

    /**
     * Example before display content method
     *
     * Method is called by the view and the results are imploded and displayed in a placeholder
     *
     * @param  object      The article object.  Note $article->text is also available
     * @param  object      The article params
     * @param  int         The 'page' number
     * @return string
     */
    function onBeforeDisplayContent( &$article, &$params, $limitstart )
    {
        return '';
    }//function

    /**
     * Example after display content method
     *
     * Method is called by the view and the results are imploded and displayed in a placeholder
     *
     * @param  object      The article object.  Note $article->text is also available
     * @param  object      The article params
     * @param  int         The 'page' number
     * @return string
     */
    function onAfterDisplayContent( &$article, &$params, $limitstart )
    {
        $by_sa='<div class="creativecommons"><a rel="license" href="http://creativecommons.org/licenses/by-nc/3.0/cn/"><img alt="知识共享许可协议" style="border-width:0" src="http://i.creativecommons.org/l/by-nc/3.0/cn/88x31.png" /></a><br />本作品采用<a rel="license" href="http://creativecommons.org/licenses/by-nc/3.0/cn/">知识共享署名-非商业性使用 3.0 中国大陆许可协议</a>进行许可。</div>';
        $option     = JRequest::getCmd('option');
        $view       = JRequest::getCmd('view');
        if($option=='com_content'){
            if($view=='category' || $view=='frontpage' || $view=='article'){
            }
            if($view=='article'){
                   return ''.$by_sa;
            }
        }
    }//function

    /**
     * Example before save content method
     *
     * Method is called right before content is saved into the database.
     * Article object is passed by reference, so any changes will be saved!
     * NOTE:  Returning false will abort the save with an error.
     *   You can set the error by calling $article->setError($message)
     *
     * @param  object      A JTableContent object
     * @param  bool     If the content is just about to be created
     * @return bool     If false, abort the save
     */
    function onBeforeContentSave( &$article, $isNew )
    {
        return true;
    }//function

    /**
     * Example after save content method
     * Article is passed by reference, but after the save, so no changes will be saved.
     * Method is called right after the content is saved
     *
     *
     * @param  object      A JTableContent object
     * @param  bool     If the content is just about to be created
     * @return void
     */
    function onAfterContentSave( &$article, $isNew )
    {
        return true;
    }//function

}//class