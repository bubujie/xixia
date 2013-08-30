<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	Templates.bluestork
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

jimport('joomla.filesystem.file');

$app = JFactory::getApplication();
$doc = JFactory::getDocument();

$doc->addStyleSheet('templates/system/css/system.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/template.css');

if ($this->direction == 'rtl') {
	$doc->addStyleSheet('templates/'.$this->template.'/css/template_rtl.css');
}

/** Load specific language related css */
$lang = JFactory::getLanguage();
$file = 'language/'.$lang->getTag().'/'.$lang->getTag().'.css';
if (JFile::exists($file)) {
	$doc->addStyleSheet($file);
}

JHtml::_('behavior.noframes');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<jdoc:include type="head" />

<!--[if IE 7]>
<link href="templates/<?php echo  $this->template ?>/css/ie7.css" rel="stylesheet" type="text/css" />
<![endif]-->
<style type="text/css">
	body{ background:#808080; }
	#content-box{ border:0; }
	#element-box{ padding:0; }
	div#element-box div.m { border:2px solid #CCC; webkit-border-radius:0px; -moz-border-radius:0px; border-radius:0; }
	.wbg { background:#000000 url(templates/<?php echo  $this->template ?>/images/logo_45.png) -60px 100% no-repeat!important; padding:0 10px 50px 10px!important; }
	#lock{
		width:128px; height:128px;
		_background-image:none!;
		_filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='templates/<?php echo  $this->template ?>/images/j_login_lock.png', sizingMethod='crop');
	}
	h1 a, p{ color:#FFF!important; }
	#section-box{ border:1px dotted #C3C3C3; margin-right:40px; width:300px; }
	#section-box .m{ border:1px solid #DEDEDE!important; background:#FBFBFB; margin:5px;}
	#system-message ul{ margin:0; padding:0; }
</style>
<script type="text/javascript">
	window.addEvent('domready', function () {
		document.getElementById('form-login').username.select();
		document.getElementById('form-login').username.focus();
	});
</script>
</head>
<body>
	<div id="content-box">
			<div id="element-box" class="login">
				<div class="m wbg">
					<h1><a href="index.php"><?php echo $this->params->get('showSiteName') ? $app->getCfg('sitename'). " " . JText::_('JADMINISTRATION') : JText::_('JADMINISTRATION') ; ?></a></h1>
					<jdoc:include type="message" />
					<jdoc:include type="component" />
					<p><?php echo JText::_('COM_LOGIN_VALID') ?></p>
					<p><a href="<?php echo JURI::root(); ?>"><?php echo JText::_('COM_LOGIN_RETURN_TO_SITE_HOME_PAGE') ?></a></p>
					<div id="lock"></div>
				</div>
			</div>
			<noscript>
				<?php echo JText::_('JGLOBAL_WARNJAVASCRIPT') ?>
			</noscript>
	</div>
</body>
</html>
