<?php
/**
 * @package    changyan
 * @subpackage Base
 * @author     步步街工作室 {@link www.bubujie.net}
 * @author     Created on 20-Sep-2013
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') || die('=;)');


jimport('joomla.plugin.plugin');

/**
 * Content Plugin.
 *
 * @package    changyan
 * @subpackage Plugin
 */
class plgContentchangyan extends JPlugin
{

    /**
     * Example after delete method.
     *
     * @param  string  $context  The context for the content passed to the plugin.
     * @param  object  $data     The data relating to the content that was deleted.
     *
     * @return boolean
     */
    public function onContentAfterDelete($context, $data)
    {
        return true;
    }//function

    /**
     * Example after display content method
     *
     * Method is called by the view and the results are imploded and displayed in a placeholder
     *
     * @param  string  $context     The context for the content passed to the plugin.
     * @param  object  &$article    The content object.  Note @$row->text is also available
     * @param  object  &$params     The content params
     * @param  int     $limitstart  The 'page' number
     *
     * @return string
     */
    public function onContentAfterDisplay($context, &$row, &$params, $page=0)
    {
        $option     = JRequest::getCmd('option');
        $view       = JRequest::getCmd('view');
        $isPrinting = JRequest::getCmd('print');
        $mainframe	= JFactory::getApplication();
        // Admin check
		if($mainframe->isAdmin() || $isPrinting) return;
        if($option=='com_content'){
            if($view=='category' || $view=='frontpage' || $view=='article'){
                $context='com_content.article';
            }
            $duoshuoArea="<a name=\"comments\"></a><div id=\"SOHUCS\" sid=\"".$context.".".@$row->id."\"></div>
<script>
	(function(){
		var appid = 'cyqLttHmL',
		conf = 'prod_d305281faf947ca7acade9ad5c8c818c';
		var doc = document,
		s = doc.createElement('script'),
		h = doc.getElementsByTagName('head')[0] || doc.head || doc.documentElement;
		s.type = 'text/javascript';
		s.charset = 'utf-8';
		s.src =  'http://assets.changyan.sohu.com/upload/changyan.js?conf='+ conf +'&appid=' + appid;
		h.insertBefore(s,h.firstChild);
		window.SCS_NO_IFRAME = true;
	})()
</script>"/*.print_r($context,true)*/;
      
            $duoshuoCount="
<a href=\"#changyan_area\" id=\"changyan_count_unit\" sid=\"".$context.".".@$row->id."\"></a>";      
            if($view == 'article'){
                return $duoshuoArea;
            }else{
        $document = JFactory::getDocument();
        //$document->addScriptDeclaration("var duoshuoQuery = {short_name:\"tuding\"};\n");
        //$document->addScript("http://assets.changyan.sohu.com/upload/plugins/plugins.count.js");
                return $duoshuoCount;
            }
        }
    }//function

    /**
     * Example after save content method
     * Article is passed by reference, but after the save, so no changes will be saved.
     * Method is called right after the content is saved
     *
     * @param  string  $context   The context of the content passed to the plugin (added in 1.6)
     * @param  object  &$article  A JTableContent object
     * @param  bool    $isNew     If the content is just about to be created
     *
     * @return boolean
     */
    public function onContentAfterSave($context, &$article, $isNew)
    {
        return true;
    }//function

    /**
     * Example after display title method
     *
     * Method is called by the view and the results are imploded and displayed in a placeholder
     *
     * @param  string  $context     The context for the content passed to the plugin.
     * @param  object  &$article    The content object.  Note @$row->text is also available
     * @param  object  &$params     The content params
     * @param  int     $limitstart  The 'page' number
     *
     * @return  string
     */
    public function onContentAfterTitle($context, &$article, &$params, $limitstart)
    {
        return '';
    }//function

    /**
     * Example before delete method.
     *
     * @param  string  $context  The context for the content passed to the plugin.
     * @param  object  $data     The data relating to the content that is to be deleted.
     *
     * @return  boolean
     */
    public function onContentBeforeDelete($context, $data)
    {
        return true;
    }//function

    /**
     * Example before display content method
     *
     * Method is called by the view and the results are imploded and displayed in a placeholder
     *
     * @param  string  $context     The context for the content passed to the plugin.
     * @param  object  &$article    The content object.  Note @$row->text is also available
     * @param  object  &$params     The content params
     * @param  int     $limitstart  The 'page' number
     *
     * @return string
     */
    public function onContentBeforeDisplay($context, &$row, &$params, $page=0)
    {
    	$mainframe	= JFactory::getApplication();
    	$isPrinting = JRequest::getCmd('print');
        // Admin check
		if($mainframe->isAdmin() || $isPrinting) return;
    	//if($context=='com_content.article') :
		switch ($context) {
			case 'com_content.article':
				$duoshuoLink='<a href="'. JRoute::_(ContentHelperRoute::getArticleRoute(@$row->slug, @$row->catslug , false)) .'#comments'.'" class="">留言反馈</a>';
				break;
			case 'com_content.category':
			case 'com_content.featured':
				$document = JFactory::getDocument();
				//$document->addScriptDeclaration("var duoshuoQuery = {short_name:\"tuding\"};\n");
				//$document->addScript("http://assets.changyan.sohu.com/upload/plugins/plugins.count.js");
				$duoshuoLink='<a href="'. JRoute::_(ContentHelperRoute::getArticleRoute(@$row->slug, @$row->catid.':'.@$row->category_alias).'#comments').'" class="">留言</a>';
				$duoshuoLink.='<span id = "sourceId::com_content.article.'.@$row->id.'" class = "cy_cmt_count" >评论数</span>';
				break;
			default:
				$duoshuoLink='<div style="font-weight:bold;">'.$context.'</div>';
				break;
		}
		return $duoshuoLink;/*.'<pre>'.print_r($article,true).'</pre>'*/
	}//function

    /**
     * Example before save content method
     *
     * Method is called right before content is saved into the database.
     * Article object is passed by reference, so any changes will be saved!
     * NOTE:  Returning false will abort the save with an error.
     * You can set the error by calling @$row->setError($message)
     *
     * @param  string  $context   The context of the content passed to the plugin.
     * @param  object  &$article  A JTableContent object
     * @param  bool    $isNew     If the content is just about to be created
     *
     * @return  boolean  If false, abort the save
     */
    public function onContentBeforeSave($context, $article, $isNew)
    {
        return true;
    }//function

    /**
     * Example after delete method.
     *
     * @param  string  $context  The context for the content passed to the plugin.
     * @param  array   $pks      A list of primary key ids of the content that has changed state.
     * @param  int     $value    The value of the state that the content has been changed to.
     *
     * @return  boolean
     */
    public function onContentChangeState($context, $pks, $value)
    {
        return true;
    }//function

    /**
     * Example prepare content method
     *
     * Method is called by the view
     *
     * @param  string  $context     The context of the content being passed to the plugin.
     * @param  object  &$article    The content object.  Note @$row->text is also available
     * @param  object  &$params     The content params
     * @param  int     $limitstart  The 'page' number
     */
    public function onContentPrepare($context, &$article, &$params, $limitstart)
    {
    }//function
}//class