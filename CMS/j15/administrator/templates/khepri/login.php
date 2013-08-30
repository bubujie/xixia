<?php
/**
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<?php
$doc = JFactory::getDocument();
$doc->setTitle("图钉实验室");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<jdoc:include type="head" />
  <link rel="stylesheet" href="templates/system/css/system.css" type="text/css" />
  <link href="templates/<?php echo $this->template ?>/css/login.css" rel="stylesheet" type="text/css" />
<?php  if($this->direction == 'rtl') : ?>
  <link href="templates/<?php echo $this->template ?>/css/login_rtl.css" rel="stylesheet" type="text/css" />
<?php  endif; ?>
  <!--[if IE 7]>
  <link href="templates/<?php echo  $this->template ?>/css/ie7.css" rel="stylesheet" type="text/css" />
  <![endif]-->
  <!--[if lte IE 6]>
  <link href="templates/<?php echo  $this->template ?>/css/ie6.css" rel="stylesheet" type="text/css" />
  <![endif]-->
<?php  if($this->params->get('useRoundedCorners')) : ?>
  <link rel="stylesheet" type="text/css" href="templates/<?php echo $this->template ?>/css/rounded.css" />
<?php  else : ?>
  <link rel="stylesheet" type="text/css" href="templates/<?php echo $this->template ?>/css/norounded.css" />
<?php  endif; ?>
  <style type="text/css">
	body { background:#999999; color:#FFFFFF; }
	h1 { font-family:dotum; color:#FFFFFF; }
	p a, p a:active { color:#ffffff; font-size:14px; }
	ul { padding:0; margin:0; }
	#content-box { border:0; }
	#element-box .m {*zoom:1; border:2px solid #CCCCCC; background:#000000 url(templates/<?php echo  $this->template ?>/images/logo_45.png) -120px 115px no-repeat;}
	#section-box { border:1px dotted #C3C3C3; padding:5px; background:#FFFFFF; }
	#section-box .t, #section-box .b { display:none; }
	#section-box .m { border:1px solid #DEDEDE; background:#FAFAFA; }
	#lock { 
		background:url(templates/<?php echo  $this->template ?>/images/j_login_lock.png); width:128px;height:128px;
		_background:none;
		_filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='templates/<?php echo  $this->template ?>/images/j_login_lock.png', sizingMethod='crop');
	}
  </style>
  <script language="javascript" type="text/javascript">
	function setFocus() {
		document.login.username.select();
		document.login.username.focus();
	}
  </script>
</head>
<body onload="javascript:setFocus()">
<div id="content-box">
  <div class="padding">
    <div id="element-box" class="login">
      <div class="m">
        <h1><?php echo $this->params->get('showSiteName') ? $mainframe->getCfg( 'sitename' ) : JText::_('Administration'); ?></h1>
        <jdoc:include type="message" />
        <jdoc:include type="component" />
        <p><?php echo JText::_('DESCUSEVALIDLOGIN') ?></p>
        <p> <a href="<?php echo JURI::root(); ?>">&larr; <?php echo JText::_('Return to site Home Page') ?></a> </p>
        <div id="lock"></div>
        <div class="clr"></div>
      </div>
    </div>
    <noscript><?php echo JText::_('WARNJAVASCRIPT') ?></noscript>
    <div class="clr"></div>
  </div>
</div>
</body>
</html>
