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
class plgContentChangyan extends JPlugin
{

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
		$isPrinting = JRequest::getCmd('print');
		$app        = JFactory::getApplication();
		if($app->isAdmin() || $isPrinting) return false;
		$type       = JFactory::getDocument()->getType();
		if($type != 'html') return false;

		switch ($context) {
			case 'com_content.article':
				//$changyanCount='<a href="#changyan_area" id="changyan_count_unit" sid="com_content.article.'.@$row->id.'"></a>';      
				$changyanArea="<a name=\"comments\"></a><div id=\"SOHUCS\" sid=\"com_content.article.".@$row->id."\"></div>
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
</script>";
				return $changyanArea;
				break;
			case 'com_content.category':
			case 'com_content.featured':
			case 'com_content.archive':
			default :
				$changyanArea='';
				return false;
				break;
		}
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
		$isPrinting = JRequest::getCmd('print');
		$app        = JFactory::getApplication();
		if($app->isAdmin() || $isPrinting) return false;
		$type       = JFactory::getDocument()->getType();
		if($type != 'html') return false;

		switch ($context) {
			case 'com_content.article':
				$changyanLink='<a href="'. JRoute::_(ContentHelperRoute::getArticleRoute(@$row->slug, @$row->catslug , false)) .'#comments'.'" class="">留言反馈</a>';
				break;
			case 'com_content.category':
			case 'com_content.featured':
            case 'com_content.archive':
				$document = JFactory::getDocument();
				//$document->addScriptDeclaration("var duoshuoQuery = {short_name:\"tuding\"};\n");
				//$document->addScript("http://assets.changyan.sohu.com/upload/plugins/plugins.count.js");
				$changyanLink='<a href="'. JRoute::_(ContentHelperRoute::getArticleRoute(@$row->slug, @$row->catid.':'.@$row->category_alias).'#comments').'" class="">留言</a>';
				$changyanLink.='<span id = "sourceId::com_content.article.'.@$row->id.'" class = "cy_cmt_count" >评论数</span>';
				break;
			default:
				$changyanLink='<div style="font-weight:bold;">'.$context.'</div>';
				break;
		}
		return $changyanLink;/*.'<pre>'.print_r($article,true).'</pre>'*/
	}//function

	function onAfterRender() // for replacing any body tag
	{
		$isPrinting = JRequest::getCmd('print');
		$app        = JFactory::getApplication();
		if($app->isAdmin() || $isPrinting) return false;
		$type       = JFactory::getDocument()->getType();
		if($type != 'html') return false;

		$option     = JRequest::getCmd('option');
		$view       = JRequest::getCmd('view', '');
		$context    = $option.'.'.$view;

		switch ($context) {
			case 'com_content.category':
			case 'com_content.featured':
			case 'com_content.archive':
				$response = JResponse::getBody();
				$replace = "</body>";
				$response = str_replace($replace, '<script id="cy_cmt_num" src="http://assets.changyan.sohu.com/upload/tools/cy_cmt_count.js?clientId=cyqLttHmL"></script>'."\n".'</body>', $response);
				JResponse::setBody($response);
				return true;
				break;
			case 'com_content.article':
			default:
				return false;
				break;
		}
	}

}//class