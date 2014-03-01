<?php
/**
 * @package   ##website## Template
 * @author    ##author## ##email##
 * @version   ##version## ##date##
 * @copyright Copyright (C) ##author## 2008 - 2012 ##website##. All Rights Reserved.
 * @license   ##license##
 */

// no direct access
defined('_JEXEC') or die;
/* ######### ######### ######### 注释 ######### ######### ######### */
$showBheadTop = ($this->countModules('bhead-top')  || 0); //bhead-top
$showBhead    = ($this->countModules('bhead')      || 0); //bhead
$showBheadBtm = ($this->countModules('bhead-btm')  || 0); //bhead-btm
/* ######### ######### 注释 ######### ######### */
$showBbodyTop = ($this->countModules('bbody-top')  || 0); //bbody-top
/* ######### 注释 ######### */
$showSide1Top = ($this->countModules('side1-top') || 0); //side1-top
$showSide1Btm = ($this->countModules('side1-btm') || 0); //side1-btm
$showSide1    = ($this->countModules('side1') || $showSide1Top || $showSide1Btm || 0); //side1
/* ### 注释 ### */
$showMainTop  = ($this->countModules('main-top')   || 0); //main-top
$showContentSide1 = ($this->countModules('content-side1')  || 0); //content-side1
$showContentSide1 &= JRequest::getCmd('view')   != 'form'; //基于1.5beez，2.5不同
$showContentSide1 &= JRequest::getCmd('layout') != 'edit'; //基于1.5beez，2.5不同
$showContentTop   = ($this->countModules('content-top')    || 0); //content-top
$showContentHome  = ($this->countModules('content-home')   || 0); //content-home
$showContentBtm   = ($this->countModules('content-btm')    || 0); //content-btm
$showContentSide2 = ($this->countModules('content-side2')  || 0); //content-side2
$showContentSide2 &= JRequest::getCmd('view')   != 'form'; //基于1.5beez，2.5不同
$showContentSide2 &= JRequest::getCmd('layout') != 'edit'; //基于1.5beez，2.5不同
$showMainBtm  = ($this->countModules('main-btm')   || 0); //main-btm
/* ### 注释 ### */
$showSide2Top = ($this->countModules('side2-top') || 0); //side2-top
$showSide2Btm = ($this->countModules('side2-btm') || 0); //side2-btm
$showSide2    = ($this->countModules('side2') || $showSide2Top || $showSide2Btm || 0); //side2
$showSide2    &= JRequest::getCmd('view')   != 'form'; //基于1.5beez，2.5不同
$showSide2    &= JRequest::getCmd('layout') != 'edit'; //基于1.5beez，2.5不同
/* ######### 注释 ######### */
$showBbodyBtm = ($this->countModules('bbody-btm')  || 0); //bbody-btm
/* ######### ######### 注释 ######### ######### */
$showBfootTop = ($this->countModules('bfoot-top')  || 0); //bfoot-top
$showBfoot    = ($this->countModules('bfoot')      || 0); //bfoot
$showBfootBtm = ($this->countModules('bfoot-btm')  || 0); //bfoot-btm
/* ######### ######### ######### 注释 ######### ######### ######### */
JHTML::_('behavior.framework', true);
/* ######### ######### ######### 注释 ######### ######### ######### */
$bheadLogo = $this->params->get('bheadLogo'); //bheadLogo
$bfootLogo = $this->params->get('bfootLogo'); //bfootLogo
$siteTitle = $this->params->get('siteTitle'); //siteTitle
$siteDesc  = $this->params->get('siteDesc');  //siteDesc
/* ######### ######### ######### 注释 ######### ######### ######### */
$app = JFactory::getApplication(); //???
$templateparams = $app->getTemplate(true)->params; //???
/* ######### ######### isHome ######### ######### */
$isHome = 0;
$menu = $app->getMenu();
if ($menu->getActive() == $menu->getDefault()) {
	$isHome = 1;
}
/* ######### ######### setTitle ######### ######### */
$doc = JFactory::getDocument();
$doc->addScript($this->baseurl.'/media/system/js/jstools.js');
$doc->addScript($this->baseurl.'/media/system/js/switchable.js');
if($isHome) :
	$doc->setTitle($siteTitle);
else :
	$doc->setTitle($doc->getTitle() . ' | ' . $siteTitle);
endif;
/* ######### ######### ######### 注释 ######### ######### ######### */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>  " dir="<?php echo $this->direction; ?>">
<head>
<jdoc:include type="head" />  <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/layout.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/template.css" type="text/css" />
<?php if ($this->direction == 'rtl') : ?>
  <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/template_rtl.css" type="text/css" />
<?php endif; ?>
  <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/prettify.css" type="text/css" />
  <!--[if lt IE 9]>
  <script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/respond.min.js"></script>
  <![endif]-->
  <!--[if IE 6]>
  <script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/belatedPNG.js"></script>
  <script type="text/javascript">belatedPNG.fix('#logo_header,#logo_footer');</script>
  <![endif]-->
</head>
<body<?php echo $isHome ? ' id="home"' : ''; ?> class="bg-<?php if($showSide1){ echo 'n'; } ?>m<?php if($showSide2){ echo 'n'; } ?>">
<div id="bhead">
<?php if ($showBheadTop) : ?>
  <div id="bhead-top">
    <div class="rowo">
      <div class="fillo">
<jdoc:include type="modules" name="bhead-top" style="stroke" headerLevel="3" />
      </div>
    </div>
  </div>
<?php endif; ?>
  <div id="bhead-mid">
    <div class="rowo">
      <div class="fillo nm">
        <div class="n1">
<?php
	$headingTag = $isHome ? 'h1' : 'div';
	printf("          ".'<%s class="logo">' , $headingTag);
	printf("".'<a href="%s">', $this->baseurl);
	if($bheadLogo){
		printf("".'<img src="%s" alt="%s" id="logo_header" />',
			$this->baseurl.'/templates/'.$this->template.'/img/'.$bheadLogo ,
			$siteTitle
		);
	}else{
		echo   "".$siteTitle;
	}
	echo   "".'</a>';
	printf("".'</%s>'."\n" , $headingTag);
?>
        </div>
        <div class="ming">
<jdoc:include type="modules" name="bhead" style="division" headerLevel="3" />
<jdoc:include type="modules" name="search" style="division" headerLevel="3" />
        </div>
      </div>
    </div>
  </div>
<?php if ($showBheadBtm) : ?>
  <div id="bhead-btm">
    <div class="rowo">
      <div class="fillo">
<jdoc:include type="modules" name="bhead-btm" style="stroke" headerLevel="3" />
      </div>
    </div>
  </div>
<?php endif; ?>
</div>
<div id="bbody" class="bg-<?php if($showContentSide1){ echo 'v'; } ?>w<?php if($showContentSide2){ echo 'v'; } ?>">
<?php if ($showBbodyTop) : ?>
  <div id="bbody-top">
    <div class="rowo">
      <div class="fillo">
<jdoc:include type="modules" name="bbody-top" style="stroke" headerLevel="3" />
      </div>
    </div>
  </div>
<?php endif; ?>
  <div id="bbody-mid">
    <div class="rowo">
      <div class="fillo <?php if($showSide1){ echo 'n'; } ?>m<?php if($showSide2){ echo 'n'; } ?>">
<?php if ($showSide1) : ?>
        <div id="side1" class="n1"><a name="side1"></a>
<?php if ($showSide1Top) : ?>
          <div id="side1-top" class="ding">
<jdoc:include type="modules" name="side1-top" style="division" headerLevel="3" />
          </div>
<?php endif; ?>
<jdoc:include type="modules" name="side1" style="division" headerLevel="3" />
<?php if ($showSide1Btm) : ?>
          <div id="side1-btm" class="ding">
<jdoc:include type="modules" name="side1-btm" style="division" headerLevel="3" />
          </div>
<?php endif; ?>
        </div>
<?php endif; ?>
        <div id="main" class="ming"><a name="main"></a>
<jdoc:include type="modules" name="breadcrumbs" style="division" headerLevel="3" />
<?php if ($showMainTop) : ?>
          <div id="main-top" class="ding">
<jdoc:include type="modules" name="main-top" style="stroke" headerLevel="3" />
          </div>
<?php endif; ?>

<div class="rowi">
  <div class="filli <?php if($showContentSide1){ echo 'v'; } ?>w<?php if($showContentSide2){ echo 'v'; } ?>">
<?php if ($showContentSide1) : ?>
    <div id="content-side1" class="v1">
<jdoc:include type="modules" name="content-side1" style="division" headerLevel="3" />
    </div>
<?php endif; ?>
    <div class="wing">
<?php if ($showContentTop && !$isHome) : ?>
      <div id="content-top" class="ding">
<jdoc:include type="modules" name="content-top" style="stroke" headerLevel="3" />
      </div>
<?php endif; ?>
<jdoc:include type="message" />
<?php if(!$isHome) : ?>
<jdoc:include type="component" />
<?php else : ?>
<jdoc:include type="modules" name="content-home" style="division" headerLevel="3" />
<?php endif; ?>
<?php if ($showContentBtm && !$isHome) : ?>
      <div id="content-btm" class="ding">
<jdoc:include type="modules" name="content-btm" style="stroke" headerLevel="3" />
      </div>
<?php endif; ?>
    </div>
<?php if ($showContentSide2) : ?>
    <div id="content-side2" class="v2">
<jdoc:include type="modules" name="content-side2" style="division" headerLevel="3" />
    </div>
<?php endif; ?>
  </div>
</div>

<?php if ($showMainBtm) : ?>
          <div id="main-btm" class="ding">
<jdoc:include type="modules" name="main-btm" style="stroke" headerLevel="3" />
          </div>
<?php endif; ?>
        </div>
<?php if ($showSide2) : ?>
        <div id="side2" class="n2"><a name="side2"></a>
<?php if ($showSide2Top) : ?>
          <div id="side2-top" class="ding">
<jdoc:include type="modules" name="side2-top" style="division" headerLevel="3" />
          </div>
<?php endif; ?>
<jdoc:include type="modules" name="side2" style="division" headerLevel="3" />
<?php if ($showSide2Btm) : ?>
          <div id="side2-btm" class="ding">
<jdoc:include type="modules" name="side2-btm" style="division" headerLevel="3" />
          </div>
<?php endif; ?>
        </div>
<?php endif; ?>
      </div>
    </div>
  </div>
<?php if ($showBbodyBtm) : ?>
  <div id="bbody-btm">
    <div class="rowo">
      <div class="fillo">
<jdoc:include type="modules" name="bbody-btm" style="stroke" headerLevel="3" />
      </div>
    </div>
  </div>
<?php endif; ?>
</div>
<div id="bfoot">
<?php if ($showBfootTop) : ?>
  <div id="bfoot-top">
    <div class="rowo">
      <div class="fillo">
<jdoc:include type="modules" name="bfoot-top" style="stroke" headerLevel="3" />
      </div>
    </div>
  </div>
<?php endif; ?>
  <div id="bfoot-mid">
    <div class="rowo">
      <div class="fillo <?php if($bfootLogo){ echo 'n'; } ?>m">
        <div class="ming">
          <div class="quick">
            <a href="<?php echo $this->baseurl; ?>"><img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template;?>/img/btn_home.gif" alt="<?php echo JText::_('HOME'); ?>" /></a>
            <a href="javascript:history.back();"><img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template;?>/img/btn_back.gif" alt="<?php echo JText::_('BACK'); ?>" /></a>
            <a href="#"><img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template;?>/img/btn_top.gif" alt="<?php echo JText::_('TOP'); ?>" /></a>
          </div>
<jdoc:include type="modules" name="bfoot" style="division" headerLevel="3" />
        </div>
<?php if($bfootLogo) :
	echo   "        ".'<div class="n1">';
	echo   "          ".'<div class="logo">';
	printf("".'<a href="%s"><img src="%s" alt="%s" id="logo_footer" /></a>' ,
		$this->baseurl ,
		$this->baseurl.'/templates/'.$this->template.'/img/'.$bfootLogo ,
		$siteTitle
	);
	echo   "".'</div>'."\n";
	echo   "\n        ".'</div>';
endif; ?>
      </div>
    </div>
  </div>
<?php if ($showBfootBtm) : ?>
  <div id="bfoot-btm">
    <div class="rowo">
      <div class="fillo">
<jdoc:include type="modules" name="bfoot-btm" style="stroke" headerLevel="3" />
      </div>
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
