<?php
/**
 * @version SVN: $Id$
 * @package    Duoshuo
 * @subpackage Base
 * @author     步步街工作室 {@link http://www.bubujie.net}
 * @author     Created on 07-Jan-2013
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') or die('=;)');

jimport( 'joomla.plugin.plugin' );

/**
 * Example Content Plugin
 *
 * @package    Duoshuo
 * @subpackage Plugin
 */
class plgContentDuoshuo extends JPlugin
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
    function plgContentDuoshuo( &$subject, $params )
    {
        parent::__construct( $subject, $params );

        $document = JFactory::getDocument();
        $document->addScriptDeclaration("var duoshuoQuery = {short_name:\"tuding\"};\n");
        $document->addScript("http://static.duoshuo.com/embed.js");
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
        return 'testljlj';
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
        $duoshuoLink='<a href="'. JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catslug, $article->sectionid).'#comments').'" class="">留言</a>';
        //$duoshuoLink='<a href="'. JRoute::_(ContentHelperRoute::getArticleRoute($article->id, $article->catid, $article->sectionid).'#comments').'" class="">留言</a>';
        return $duoshuoLink;
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
        $option     = JRequest::getCmd('option');
        $view       = JRequest::getCmd('view');
        if($option=='com_content'){
            if($view=='category' || $view=='frontpage' || $view=='article'){
                $context='com_content.article';
            }
            $duoshuoArea="
<a name=\"comments\"></a>
<div class=\"ds-thread\" data-thread-key=\"".$context.".".@$article->id."\" data-title=\"".@$article->title."\" data-url=\"\"></div>
<script type=\"text/javascript\">
   if (typeof DUOSHUO !== 'undefined') DUOSHUO.EmbedThread('.ds-thread');
</script>
<div id=\"ds-ssr\">
   <ol id=\"commentlist\"></ol>
</div>";
      
            $duoshuoCount="
<span class=\"ds-thread-count\" data-thread-key=\"".$context.".".@$article->id."\"></span>";      
            if($view == 'article'){
                return $duoshuoArea;
            }else{
                return $duoshuoCount;
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