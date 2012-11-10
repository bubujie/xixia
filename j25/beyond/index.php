<?php
/**
 * @package   BuBuJie.Net Template
 * @author    bubujie@gmail.com
 * @version   2.5.00 2012-01-01
 * @copyright Copyright (C) 步步街 2008 - 2012 BuBuJie.Net. All Rights Reserved.
 * @license   步步街商业客户单域名授权，违反必究！
 */

defined('_JEXEC') || die;
/* ######### ######### ######### 注释 ######### ######### ######### */
$showBh1stSide  = ($this->countModules('bh1st-side')  || 0);
$showBh1stMain  = ($this->countModules('bh1st-main')  || 0);
$showBh1stAside = ($this->countModules('bh1st-aside') || 0);
$showBh1st      = ($showBh1stSide || $showBh1stMain || $showBh1stAside || 0);
$showBh5thSide  = ($this->countModules('bh5th-side')  || 0);
$showBh5thMain  = ($this->countModules('bh5th-main')  || 0);
$showBh5thAside = ($this->countModules('bh5th-aside') || 0);
$showBh5th      = ($showBh5thSide || $showBh5thMain || $showBh5thAside || 0);
$showBh9thSide  = ($this->countModules('bh9th-side')  || 0);
$showBh9thMain  = ($this->countModules('bh9th-main')  || 0);
$showBh9thAside = ($this->countModules('bh9th-aside') || 0);
$showBh9th      = ($showBh9thSide || $showBh9thMain || $showBh9thAside || 0);
$showBb1stSide  = ($this->countModules('Bb1st-side')  || 0);
$showBb1stMain  = ($this->countModules('Bb1st-main')  || 0);
$showBb1stAside = ($this->countModules('Bb1st-aside') || 0);
$showBb1st      = ($showBb1stSide || $showBb1stMain || $showBb1stAside);
$showSide       = ($this->countModules('side-top')  || $this->countModules('side-mid')  || $this->countModules('side-btm')  || 0);
$showComTop     = ($this->countModules('com-top')     || 0);
$showComBtm     = ($this->countModules('com-btm')     || 0);
$showAside      = ($this->countModules('aside-top') || $this->countModules('aside-mid') || $this->countModules('aside-btm') || 0);
$showAside     &= JRequest::getCmd('view') != 'form';
$showAside     &= JRequest::getCmd('layout') != 'edit';
$showBb9thSide  = ($this->countModules('bb9th-side')  || 0);
$showBb9thMain  = ($this->countModules('bb9th-main')  || 0);
$showBb9thAside = ($this->countModules('bb9th-aside') || 0);
$showBb9th      = ($showBb9thSide || $showBb9thMain || $showBb9thAside || 0);
$showBf1stSide  = ($this->countModules('bf1st-side')  || 0);
$showBf1stMain  = ($this->countModules('bf1st-main')  || 0);
$showBf1stAside = ($this->countModules('bf1st-aside') || 0));
$showBf1st      = ($showBf1stSide || $showBf1stMain || $showBf1stAside || 0);
$showBf5thSide  = ($this->countModules('bf5th-side')  || 0);
$showBf5thMain  = ($this->countModules('bf5th-main')  || 0);
$showBf5thAside = ($this->countModules('bf5th-aside') || 0);
$showBf5th      = ($showBf5thSide || $showBf5thMain || $showBf5thAside || 0);
$showBf9thSide  = ($this->countModules('bf9th-side')  || 0);
$showBf9thMain  = ($this->countModules('bf9th-main')  || 0);
$showBf9thAside = ($this->countModules('bf9th-aside') || 0);
$showBf9th      = ($showBf9thSide || $showBf9thMain || $showBf9thAside || 0);
/* ######### ######### ######### 注释 ######### ######### ######### */
JHTML::_('behavior.framework', true);
/* ######### ######### ######### 注释 ######### ######### ######### */
$bheadLogo      = $this->params->get('bheadLogo');
$bfootLogo      = $this->params->get('bfootLogo');
$siteTitle      = $this->params->get('siteTitle');
$siteDesc       = $this->params->get('siteDesc');
/* ######### ######### ######### 注释 ######### ######### ######### */
$app= JFactory::getApplication();
$templateparams = $app->getTemplate(true)->params;
/* ######### ######### ######### 注释 ######### ######### ######### */
$isHome = 0;
$menu = &JSite::getMenu();
if ($menu->getActive() == $menu->getDefault()) :
	$isHome = 1;
endif;
/* ######### ######### ######### 注释 ######### ######### ######### */
$doc = JFactory::getDocument();
if($isHome) :
	$doc->setTitle($siteTitle);
else :
	$doc->setTitle($doc->getTitle() . ' - ' . $siteTitle);
endif;
/* ######### ######### ######### 注释 ######### ######### ######### */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>  " dir="<?php echo $this->direction; ?>">
<head>
<jdoc:include type="head" />  <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/style.css" type="text/css" media="screen,projection" />
<?php if ($this->direction == 'rtl') :
	printf("\n  ".'<link rel="stylesheet" href="%s" type="text/css" />', $this->baseurl.'/templates/'.$this->template.'/css/template_rtl.css');
endif; ?>
  <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/prettify.css" type="text/css" media="screen,projection" />
  <!--[if IE 6]>
  <script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/belatedPNG.js"></script>
  <script type="text/javascript">belatedPNG.fix('#logo_bh,#logo_bf');</script>
  <![endif]-->
</head>
<body<?php echo $isHome ? ' id="home"' : ''; ?>>
<div id="bhead">
<?php if ($showBh1st) : ?>
  <div id="bh1st"  class="wrapping <?php if($showBh1stSide){ echo 'n'; } ?>m<?php if($showBh1stAside){ echo 'n'; } ?>">
    <div class="filling">
<?php if ($showBh1stSide) : ?>
      <div class="ning n1 side">
<jdoc:include type="modules" name="bh1st-side" style="div" headerLevel="3" />
      </div>
<?php endif; ?>
      <div class="ming main">
<jdoc:include type="modules" name="bh1st-main" style="div" headerLevel="3" />
      </div>
<?php if ($showBh1stAside) : ?>
      <div class="ning n2 aside">
<jdoc:include type="modules" name="bh1st-aside" style="div" headerLevel="3" />
      </div>
<?php endif; ?>
    </div>
  </div>
<?php endif; ?>
<?php if ($showBh5th) : ?>
  <div id="bh5th"  class="wrapping <?php if($showBh5thSide){ echo 'n'; } ?>m<?php if($showBh5thAside){ echo 'n'; } ?>">
    <div class="filling">
<?php if ($showBh5thSide) : ?>
      <div class="ning n1 side">
<jdoc:include type="modules" name="bh5th-side" style="div" headerLevel="3" />
      </div>
<?php endif; ?>
      <div class="ming main">
<jdoc:include type="modules" name="bh5th-main" style="div" headerLevel="3" />
      </div>
<?php if ($showBh5thAside) : ?>
      <div class="ning n2 aside">
<jdoc:include type="modules" name="bh5th-aside" style="div" headerLevel="3" />
      </div>
<?php endif; ?>
    </div>
  </div>
<?php endif; ?>
<?php if ($showBh9th) : ?>
  <div id="bh9th"  class="wrapping <?php if($showBh9thSide){ echo 'n'; } ?>m<?php if($showBh9thAside){ echo 'n'; } ?>">
    <div class="filling">
<?php if ($showBh9thSide) : ?>
      <div class="ning n1 side">
<jdoc:include type="modules" name="bh9th-side" style="div" headerLevel="3" />
      </div>
<?php endif; ?>
      <div class="ming main">
<jdoc:include type="modules" name="bh9th-main" style="div" headerLevel="3" />
      </div>
<?php if ($showBh9thAside) : ?>
      <div class="ning n2 aside">
<jdoc:include type="modules" name="bh9th-aside" style="div" headerLevel="3" />
      </div>
<?php endif; ?>
    </div>
  </div>
<?php endif; ?>
</div>
<!-- ######### ######### ######### bbody ######### ######### ######### -->
<div id="bbody">
<?php if ($showBb1st) : ?>
  <div id="bb1st"  class="wrapping <?php if($showBb1stSide){ echo 'n'; } ?>m<?php if($showBb1stAside){ echo 'n'; } ?>">
    <div class="filling">
<?php if ($showBb1stSide) : ?>
      <div class="ning n1 side">
<jdoc:include type="modules" name="bb1st-side" style="div" headerLevel="3" />
      </div>
<?php endif; ?>
      <div class="ming main">
<jdoc:include type="modules" name="bb1st-main" style="div" headerLevel="3" />
      </div>
<?php if ($showBb1stAside) : ?>
      <div class="ning n2 aside">
<jdoc:include type="modules" name="bb1st-aside" style="div" headerLevel="3" />
      </div>
<?php endif; ?>
    </div>
  </div>
<?php endif; ?>
  <div id="bb5th" class="wrapping <?php if($showSide){ echo 'n'; } ?>m<?php if($showAside){ echo 'n'; } ?>">
    <div class="filling">
<?php if ($showSide) : ?>
      <!-- ######### ######### side ######### ######### -->
      <div id="side" class="ning n1"><a name="side"></a>
<jdoc:include type="modules" name="side-top" style="zen" headerLevel="3" />
<jdoc:include type="modules" name="side-mid" style="zen" headerLevel="3" />
<jdoc:include type="modules" name="side-btm" style="zen" headerLevel="3" />
      </div>
      <!-- ######### ######### /side ######### ######### -->
<?php endif; ?>
      <!-- ######### ######### main ######### ######### -->
      <div id="main" class="ming">
<jdoc:include type="modules" name="crumbs" style="open" headerLevel="3" />
<?php if ($showComTop) : ?>
        <!-- ######### com-top ######### -->
        <div class="com-top ding">
<jdoc:include type="modules" name="com-top" style="open" />
        </div>
        <!-- ######### /com-top ######### -->
<?php endif; ?>
<div id="component" class="ding">
<jdoc:include type="message" />
<jdoc:include type="component" />
</div>
<?php if ($showComBtm) : ?>
        <!-- ######### com-btm ######### -->
        <div class="com-btm ding">
<jdoc:include type="modules" name="com-btm" style="open" />
        </div>
        <!-- ######### /com-btm ######### -->
<?php endif; ?>
      </div>
      <!-- ######### ######### /main ######### ######### -->
<?php if ($showAside) : ?>
      <!-- ######### ######### aside ######### ######### -->
      <div id="aside" class="ning n2"><a name="aside"></a>
<jdoc:include type="modules" name="aside-top" style="zen" headerLevel="3" />
<jdoc:include type="modules" name="aside-mid" style="zen" headerLevel="3" />
<jdoc:include type="modules" name="aside-btm" style="zen" headerLevel="3" />
      </div>
      <!-- ######### ######### /aside ######### ######### -->
<?php endif; ?>
    </div>
  </div>
<?php if ($showBb9th) : ?>
  <div id="bb9th"  class="wrapping <?php if($showBb9thSide){ echo 'n'; } ?>m<?php if($showBb9thAside){ echo 'n'; } ?>">
    <div class="filling">
<?php if ($showBb9thSide) : ?>
      <div class="ning n1 side">
<jdoc:include type="modules" name="bb9th-side" style="div" headerLevel="3" />
      </div>
<?php endif; ?>
      <div class="ming main">
<jdoc:include type="modules" name="bb9th-main" style="div" headerLevel="3" />
      </div>
<?php if ($showBb9thAside) : ?>
      <div class="ning n2 aside">
<jdoc:include type="modules" name="bb9th-aside" style="div" headerLevel="3" />
      </div>
<?php endif; ?>
    </div>
  </div>
<?php endif; ?>
</div>
<!-- ######### ######### ######### /bbody ######### ######### ######### -->
<div id="bfoot">
<?php if ($showBf1st) : ?>
  <div id="bf1st"  class="wrapping <?php if($showBf1stSide){ echo 'n'; } ?>m<?php if($showBf1stAside){ echo 'n'; } ?>">
    <div class="filling">
<?php if ($showBf1stSide) : ?>
      <div class="ning n1 side">
<jdoc:include type="modules" name="bf1st-side" style="div" headerLevel="3" />
      </div>
<?php endif; ?>
      <div class="ming main">
<jdoc:include type="modules" name="bf1st-main" style="div" headerLevel="3" />
      </div>
<?php if ($showBf1stAside) : ?>
      <div class="ning n2 aside">
<jdoc:include type="modules" name="bf1st-aside" style="div" headerLevel="3" />
      </div>
<?php endif; ?>
    </div>
  </div>
<?php endif; ?>
<?php if ($showBf5th) : ?>
  <div id="bf5th"  class="wrapping <?php if($showBf5thSide){ echo 'n'; } ?>m<?php if($showBf5thAside){ echo 'n'; } ?>">
    <div class="filling">
<?php if ($showBf5thSide) : ?>
      <div class="ning n1 side">
<jdoc:include type="modules" name="bf5th-side" style="div" headerLevel="3" />
      </div>
<?php endif; ?>
      <div class="ming main">
<jdoc:include type="modules" name="bf5th-main" style="div" headerLevel="3" />
      </div>
<?php if ($showBf5thAside) : ?>
      <div class="ning n2 aside">
<jdoc:include type="modules" name="bf5th-aside" style="div" headerLevel="3" />
      </div>
<?php endif; ?>
    </div>
  </div>
<?php endif; ?>
<?php if ($showBf9th) : ?>
  <div id="bf9th"  class="wrapping <?php if($showBf9thSide){ echo 'n'; } ?>m<?php if($showBf9thAside){ echo 'n'; } ?>">
    <div class="filling">
<?php if ($showBf9thSide) : ?>
      <div class="ning n1 side">
<jdoc:include type="modules" name="bf9th-side" style="div" headerLevel="3" />
      </div>
<?php endif; ?>
      <div class="ming main">
<jdoc:include type="modules" name="bf9th-main" style="div" headerLevel="3" />
      </div>
<?php if ($showBf9thAside) : ?>
      <div class="ning n2 aside">
<jdoc:include type="modules" name="bf9th-aside" style="div" headerLevel="3" />
      </div>
<?php endif; ?>
    </div>
  </div>
<?php endif; ?>
</div>
<jdoc:include type="modules" name="debug" />
<script type="text/javascript">
var online= new Array();
var qqOnImg = '<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/img/myqqicon_06_on.png';
var qqOffImg = '<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/img/myqqicon_06_on.png';
</script>
<script type="text/javascript" src="http://webpresence.qq.com/getonline?Type=1&11995630:11552698:"></script>
<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/custom.js"></script>
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-8623588-2']);
_gaq.push(['_setDomainName', '.bubujie.net']);
_gaq.push(['_trackPageview']);
(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
</body>
</html>