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
/* ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ 注释 ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ */
$showBheadTop = ($this->countModules('bhead-top')  || 0); //bhead-top
$showBheadMid = ($this->countModules('bhead-mid')  || 0); //bhead-mid
$showBheadBtm = ($this->countModules('bhead-btm')  || 0); //bhead-btm
/* ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ 注释 ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ */
$showBbodyTop = ($this->countModules('bbody-top')  || 0); //bbody-top
/* ‡‡‡‡‡‡‡‡‡ 注释 ‡‡‡‡‡‡‡‡‡ */
$showSide     = ($this->countModules('main-side')  || 0); //main-side
/* ‡‡‡ 注释 ‡‡‡ */
$showMainTop  = ($this->countModules('main-top')   || 0); //main-top
$showComSide  = ($this->countModules('com-side')   || 0); //com-side
$showComTop   = ($this->countModules('com-top')    || 0); //com-top
$showComBtm   = ($this->countModules('com-btm')    || 0); //com-btm
$showComAside = ($this->countModules('com-aside')  || 0); //com-aside
$showMainBtm  = ($this->countModules('main-btm')   || 0); //main-btm
/* ‡‡‡ 注释 ‡‡‡ */
$showAside    = ($this->countModules('main-aside') || 0); //main-aside
$showAside   &= JRequest::getCmd('view')   != 'form'; //基于1.5beez，2.5不同
$showAside   &= JRequest::getCmd('layout') != 'edit'; //基于1.5beez，2.5不同
/* ‡‡‡‡‡‡‡‡‡ 注释 ‡‡‡‡‡‡‡‡‡ */
$showBbodyBtm = ($this->countModules('bbody-btm')  || 0); //bbody-btm
/* ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ 注释 ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ */
$showBfootTop = ($this->countModules('bfoot-top')  || 0); //bfoot-top
$showBfootMid = ($this->countModules('bfoot-mid')  || 0); //bfoot-mid
$showBfootBtm = ($this->countModules('bfoot-btm')  || 0); //bfoot-btm
/* ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ 注释 ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ */
JHTML::_('behavior.framework', true);
/* ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ 注释 ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ */
$bheadLogo = $this->params->get('bheadLogo'); //bheadLogo
$bfootLogo = $this->params->get('bfootLogo'); //bfootLogo
$siteTitle = $this->params->get('siteTitle'); //siteTitle
$siteDesc  = $this->params->get('siteDesc');  //siteDesc
/* ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ 注释 ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ */
$app = JFactory::getApplication(); //???
$templateparams = $app->getTemplate(true)->params; //???
/* ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ isHome ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ */
$isHome = 0;
if (JURI::current() == JURI::root() ) :
	$isHome = 1;
endif;
/* ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ setTitle ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ */
$doc = JFactory::getDocument();
$doc->addScript($this->baseurl.'/templates/'.$this->template.'/js/fl.js');
if($isHome) :
	$doc->setTitle($siteTitle);
else :
	$doc->setTitle($doc->getTitle() . ' | ' . $siteTitle);
endif;
/* ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ 注释 ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>  " dir="<?php echo $this->direction; ?>">
<head>
<jdoc:include type="head" />
  <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/style.css" type="text/css" />
<?php if ($this->direction == 'rtl') : ?>
  <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/template_rtl.css" type="text/css" />
<?php endif; ?>
  <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/prettify.css" type="text/css" />
  <!--[if IE 6]>
  <script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/belatedPNG.js"></script>
  <script type="text/javascript">belatedPNG.fix('#logo_header,#logo_footer');</script>
  <![endif]-->
</head>
<body<?php echo $isHome ? ' id="home"' : ''; ?>>
<div id="bhead">
<?php if ($showBheadTop) : ?>
  <div id="bh1st">
    <div class="wrapping">
      <div class="filling">
<jdoc:include type="modules" name="bhead-top" style="dbl" headerLevel="3" />
      </div>
    </div>
  </div>
<?php endif; ?>
  <div id="bh5th">
    <div class="wrapping">
      <div class="filling nm">
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
<jdoc:include type="modules" name="bhead-mid" style="dbl" headerLevel="3" />
<jdoc:include type="modules" name="search" style="dbl" headerLevel="3" />
	    </div>
	  </div>
    </div>
  </div>
<?php if ($showBheadBtm) : ?>
  <div id="bh9th">
    <div class="wrapping">
      <div class="filling nm">
        <div class="n1"></div>
        <div class="ming">
<jdoc:include type="modules" name="bhead-btm" style="dbl" headerLevel="3" />
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
</div>
<!-- ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ bbody ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ -->
<div id="bbody">
<?php if ($showBbodyTop) : ?>
  <div id="bb1st">
    <div class="wrapping">
      <div class="filling">
<jdoc:include type="modules" name="bbody-top" style="dbl" headerLevel="3" />
      </div>
    </div>
  </div>
<?php endif; ?>
  <div id="bb5th">
    <div class="wrapping">
      <div class="filling <?php if($showSide){ echo 'n'; } ?>m<?php if($showAside){ echo 'n'; } ?>">
        <div id="main" class="ming">
<jdoc:include type="modules" name="crumbs" style="dbl" headerLevel="3" />
<?php if ($showMainTop) : ?>
          <div id="main-top" class="ding">
<jdoc:include type="modules" name="main-top" style="dbl" headerLevel="3" />
          </div>
<?php endif; ?>
<div class="wrap">
  <div class="fill <?php if($showComSide){ echo 'v'; } ?>w<?php if($showComAside){ echo 'v'; } ?>">
    <div class="wing">
<?php if ($showComTop) : ?>
      <div id="com-top" class="ding">
<jdoc:include type="modules" name="com-top" style="dbl" headerLevel="3" />
      </div>
<?php endif; ?>
<jdoc:include type="message" />
<jdoc:include type="component" />
<div class="blank"></div>
<?php if ($showComBtm) : ?>
      <div id="com-btm" class="ding">
<jdoc:include type="modules" name="com-btm" style="dbl" headerLevel="3" />
      </div>
<?php endif; ?>
	</div>
<?php if ($showComSide) : ?>
    <div id="com-side" class="v1">
<jdoc:include type="modules" name="com-side" style="dbl" headerLevel="3" />
    </div>
<?php endif; ?>
<?php if ($showComAside) : ?>
    <div id="com-aside" class="v2">
<jdoc:include type="modules" name="com-aside" style="dbl" headerLevel="3" />
    </div>
<?php endif; ?>
  </div>
</div>
<?php if ($showMainBtm) : ?>
          <div id="main-btm" class="ding">
<jdoc:include type="modules" name="main-btm" style="dbl" headerLevel="3" />
          </div>
<?php endif; ?>
        </div>
<?php if ($showSide) : ?>
        <div id="side" class="n1"><a name="side"></a>
<jdoc:include type="modules" name="main-side" style="dbl" headerLevel="3" />
        </div>
<?php endif; ?>
<?php if ($showAside) : ?>
        <div id="aside" class="n2"><a name="aside"></a>
<jdoc:include type="modules" name="main-aside" style="dbl" headerLevel="3" />
        </div>
<?php endif; ?>
      </div>
    </div>
  </div>
<?php if ($showBbodyBtm) : ?>
  <div id="bb9th">
  	<div class="wrapping">
      <div class="filling">
<jdoc:include type="modules" name="bbody-btm" style="dbl" headerLevel="3" />
      </div>
    </div>
  </div>
<?php endif; ?>
</div>
<!-- ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ /bbody ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ ‡‡‡‡‡‡‡‡‡ -->
<div id="bfoot">
<?php if ($showBfootTop) : ?>
  <div id="bf1st">
  	<div class="wrapping">
      <div class="filling">
<jdoc:include type="modules" name="bfoot-top" style="dbl" headerLevel="3" />
      </div>
    </div>
  </div>
<?php endif; ?>
  <div id="bf5th">
  	<div class="wrapping">
      <div class="filling <?php if($bfootLogo){ echo 'n'; } ?>m">
        <div class="ming">
<jdoc:include type="modules" name="bfoot-mid" style="dbl" headerLevel="3" />
          <div class="quick">
            <a href="<?php echo $this->baseurl; ?>"><img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template;?>/img/btn_home.gif" alt="<?php echo JText::_('HOME'); ?>" /></a>
            <a href="javascript:history.back();"><img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template;?>/img/btn_back.gif" alt="<?php echo JText::_('BACK'); ?>" /></a>
            <a href="#"><img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template;?>/img/btn_top.gif" alt="<?php echo JText::_('TOP'); ?>" /></a>
          </div>
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
  <div id="bf9th">
    <div class="wrapping">
      <div class="filling">
<jdoc:include type="modules" name="bfoot-btm" style="dbl" headerLevel="3" />
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