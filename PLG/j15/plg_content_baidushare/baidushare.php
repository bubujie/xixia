<?php
/**
 * @package    BaiduShare
 * @subpackage E:
 * @author     步步街 {@link http://www.bubujie.net/}
 * @author     Created on 07-Oct-2012
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') || die('=;)');


jimport('joomla.plugin.plugin');

/**
 * Content Plugin.
 *
 * @package    BaiduShare
 * @subpackage Plugin
 */
class plgContentBaiduShare extends JPlugin
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
     * @param  object  &$article    The content object.  Note $article->text is also available
     * @param  object  &$params     The content params
     * @param  int     $limitstart  The 'page' number
     *
     * @return string
     */
    public function onContentAfterDisplay($context, &$article, &$params, $limitstart)
    {
        //return '';
        $html = '';
		return $html;
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
     * @param  object  &$article    The content object.  Note $article->text is also available
     * @param  object  &$params     The content params
     * @param  int     $limitstart  The 'page' number
     *
     * @return  string
     */
    public function onContentAfterTitle($context, &$article, &$params, $limitstart)
    {
        return true;
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
     * @param  object  &$article    The content object.  Note $article->text is also available
     * @param  object  &$params     The content params
     * @param  int     $limitstart  The 'page' number
     *
     * @return string
     */
    public function onContentBeforeDisplay($context, &$article, &$params, $limitstart)
    {
        $html = "\n";
        $html .='<!-- Baidu Button BEGIN -->
<div class="ding">
  <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
    <span class="bds_more">分享到：</span>
    <a class="bds_qzone"></a>
    <a class="bds_tsina"></a>
    <a class="bds_tqq"></a>
    <a class="bds_renren"></a>
    <a class="shareCount"></a>
  </div>
</div>
<style type="text/css">
	.ding { position:relative; *zoom:1; }
	.ding:after { content:""; display:block; clear:both; }
</style>
<script type="text/javascript" id="bdshare_js" data="type=tools" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
	document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
</script>
<!-- Baidu Button END -->'."\n";
        return $html;
    }//function

    /**
     * Example before save content method
     *
     * Method is called right before content is saved into the database.
     * Article object is passed by reference, so any changes will be saved!
     * NOTE:  Returning false will abort the save with an error.
     * You can set the error by calling $article->setError($message)
     *
     * @param  string  $context   The context of the content passed to the plugin.
     * @param  object  &$article  A JTableContent object
     * @param  bool    $isNew     If the content is just about to be created
     *
     * @return  boolean  If false, abort the save
     */
    public function onContentBeforeSave($context, &$article, $isNew)
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
     * @param  object  &$article    The content object.  Note $article->text is also available
     * @param  object  &$params     The content params
     * @param  int     $limitstart  The 'page' number
     */
    public function onContentPrepare($context, &$article, &$params, $limitstart)
    {
    }//function
}//class
