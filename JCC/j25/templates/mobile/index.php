<?php
/**
 * @package   ##website## Template
 * @author    ##author## ##email##
 * @version   ##version## ##date##
 * @copyright Copyright (C) ##author## 2008 - ##year## ##website##. All Rights Reserved.
 * @license   ##license##
 */
//编码保持
// no direct access
defined('_JEXEC') or die;
/* ######### ######### ######### 注释 ######### ######### ######### */
$showBheadTop     = (0 AND ($this->countModules('bhead-top')     || 0)); //bhead-top
$showBhead        = (1 AND ($this->countModules('bhead')         || 0)); //bhead
$showBheadBtm     = (0 AND ($this->countModules('bhead-btm')     || 0)); //bhead-btm
/* ######### ######### 注释 ######### ######### */
$showBbodyTop     = (0 AND ($this->countModules('bbody-top')     || 0)); //bbody-top
/* ######### 注释 ######### */
$showSide1Top     = (0 AND ($this->countModules('side1-top')     || 0)); //side1-top
$showSide1Btm     = (0 AND ($this->countModules('side1-btm')     || 0)); //side1-btm
$showSide1        = (1 AND ($this->countModules('side1') || $showSide1Top || $showSide1Btm || 0)); //side1
/* ### 注释 ### */
$showMainTop      = (1 AND ($this->countModules('main-top')      || 0)); //main-top
$showContentSide1 = (0 AND ($this->countModules('content-side1') || 0)); //content-side1
$showContentTop   = (0 AND ($this->countModules('content-top')   || 0)); //content-top
$showHome = ($this->countModules('home') || 0); //home
$showContentBtm   = (0 AND ($this->countModules('content-btm')   || 0)); //content-btm
$showContentSide2 = (0 AND ($this->countModules('content-side2') || 0)); //content-side2
$showMainBtm      = (1 AND ($this->countModules('main-btm')      || 0)); //main-btm
/* ### 注释 ### */
$showSide2Top     = (0 AND ($this->countModules('side2-top')     || 0)); //side2-top
$showSide2Btm     = (0 AND ($this->countModules('side2-btm')     || 0)); //side2-btm
$showSide2        = (1 AND ($this->countModules('side2') || $showSide2Top || $showSide2Btm || 0)); //side2
/* ######### 注释 ######### */
$showBbodyBtm     = (0 AND ($this->countModules('bbody-btm')     || 0)); //bbody-btm
/* ######### ######### 注释 ######### ######### */
$showBfootTop     = (0 AND ($this->countModules('bfoot-top')     || 0)); //bfoot-top
$showBfoot        = (1 AND ($this->countModules('bfoot')         || 0)); //bfoot
$showBfootBtm     = (0 AND ($this->countModules('bfoot-btm')     || 0)); //bfoot-btm
/* ######### ######### 注释 ######### ######### */
$showSide2        &= JRequest::getCmd('view')   != 'form'; //基于1.5beez，2.5不同
$showSide2        &= JRequest::getCmd('layout') != 'edit'; //基于1.5beez，2.5不同
$showContentSide1 &= JRequest::getCmd('view')   != 'form'; //基于1.5beez，2.5不同
$showContentSide1 &= JRequest::getCmd('layout') != 'edit'; //基于1.5beez，2.5不同
$showContentSide2 &= JRequest::getCmd('view')   != 'form'; //基于1.5beez，2.5不同
$showContentSide2 &= JRequest::getCmd('layout') != 'edit'; //基于1.5beez，2.5不同
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
if ($menu->getActive() == $menu->getDefault()) :
	$isHome = 1;
endif;
/* ######### ######### setTitle ######### ######### */
$doc = JFactory::getDocument();
if($isHome) :
	$doc->setTitle($siteTitle);
else :
	$doc->setTitle($doc->getTitle() . ' | ' . $siteTitle);
endif;
if(!version_compare(JVERSION, '3.0', 'ge')) :
	$db = JFactory::getDbo();
	$db->setQuery("SELECT enabled FROM #__extensions WHERE name = 'virtuemart' AND type = 'component'");
	$isEnabled = $db->loadResult();
	if(!$isEnabled) :
		$doc->addScript(JURI::base(true).'/plugins/system/thumbtack/assets/js/jquery-1.8.3.min.js');
		$doc->addScript(JURI::base(true).'/plugins/system/thumbtack/assets/js/jquery-noconflict.js');
	else :
		if(!class_exists('VmConfig')) :
			require(JPATH_ADMINISTRATOR . DS . 'components' . DS . 'com_virtuemart'.DS.'helpers'.DS.'config.php');
		endif;
		VmConfig::loadConfig();
		vmJsApi::jQuery();
	endif;
endif;
/* ######### ######### ######### 注释 ######### ######### ######### */
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/style.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/prettify.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/print.css', $type = 'text/css', $media = 'print');
if ($this->direction == 'rtl') :
	$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/template_rtl.css', $type = 'text/css', $media = 'screen,projection');
endif;
?>
<!DOCTYPE HTML>
<html xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=yes" />
<jdoc:include type="head" />
  <!--[if lte IE 8]>
  <script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/html5shiv.js"></script>
  <![endif]-->
  <!--[if IE 8]>
  <script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/respond.min.js"></script>
  <![endif]-->
</head>
<body<?php echo $isHome ? ' id="home"' : ''; ?> class="bg-<?php if($showSide1){ echo 'n'; } ?>m<?php if($showSide2){ echo 'n'; } ?> layout-lft">
<div id="page">
    <div class="rowo">
      <div class="fillo <?php if($showSide1){ echo 'n'; } ?>m<?php if($showSide2){ echo 'n'; } ?>">
<?php if ($showSide1) : ?>
        <div id="side1" class="n1"><a name="side1"></a>
<?php if ($showSide1Top) : ?>
          <div id="side1-top" class="ting">
<jdoc:include type="modules" name="side1-top" style="division" headerLevel="3" />
          </div>
<?php endif; ?>
<jdoc:include type="modules" name="side1" style="division" headerLevel="3" />
<?php if ($showSide1Btm) : ?>
          <div id="side1-btm" class="ting">
<jdoc:include type="modules" name="side1-btm" style="division" headerLevel="3" />
          </div>
<?php endif; ?>
        </div>
<?php endif; ?>
<div id="ming" class="ming">



<div id="bhead">
<?php if ($showBheadTop) : ?>
  <div id="bhead-top">
    <div class="rowi">
      <div class="filli">
<jdoc:include type="modules" name="bhead-top" style="stroke" headerLevel="3" />
      </div>
    </div>
  </div>
<?php endif; ?>
  <div id="bhead-mid">
    <div class="rowi">
      <div class="filli vw">
        <div class="v1">
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
        <div class="wing">
<jdoc:include type="modules" name="bhead" style="division" headerLevel="3" />
<jdoc:include type="modules" name="search" style="division" headerLevel="3" />
        </div>
      </div>
    </div>
  </div>
<?php if ($showBheadBtm) : ?>
  <div id="bhead-btm">
    <div class="rowi">
      <div class="filli">
<jdoc:include type="modules" name="bhead-btm" style="stroke" headerLevel="3" />
      </div>
    </div>
  </div>
<?php endif; ?>
</div>
<div id="bbody" class="bg-<?php if($showContentSide1){ echo 'v'; } ?>w<?php if($showContentSide2){ echo 'v'; } ?>">
<?php if ($showBbodyTop) : ?>
  <div id="bbody-top">
    <div class="rowi">
      <div class="filli">
<jdoc:include type="modules" name="bbody-top" style="stroke" headerLevel="3" />
      </div>
    </div>
  </div>
<?php endif; ?>
  <div id="bbody-mid">



        <div id="main" class="ting"><a name="main"></a>
<?php if ($showMainTop) : ?>
          <div id="main-top" class="rowi">
            <div class="filli">
<jdoc:include type="modules" name="breadcrumbs" style="division" headerLevel="3" />
<jdoc:include type="modules" name="main-top" style="stroke" headerLevel="3" />
            </div>
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
<?php if ($showContentTop) : ?>
      <div id="content-top" class="ting">
<jdoc:include type="modules" name="content-top" style="stroke" headerLevel="3" />
      </div>
<?php endif; ?>
<jdoc:include type="message" />
<?php if(!$isHome) : ?>
<jdoc:include type="component" />
<?php else : ?>
<jdoc:include type="modules" name="home" style="division" headerLevel="3" />
<?php endif; ?>
<?php if ($showContentBtm) : ?>
      <div id="content-btm" class="ting">
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
          <div id="main-btm" class="rowi">
            <div class="filli">
<jdoc:include type="modules" name="main-btm" style="stroke" headerLevel="3" />
            </div>
          </div>
<?php endif; ?>
        </div>



  </div>
<?php if ($showBbodyBtm) : ?>
  <div id="bbody-btm">
    <div class="rowi">
      <div class="filli">
<jdoc:include type="modules" name="bbody-btm" style="stroke" headerLevel="3" />
      </div>
    </div>
  </div>
<?php endif; ?>
</div>
<div id="bfoot">
<?php if ($showBfootTop) : ?>
  <div id="bfoot-top">
    <div class="rowi">
      <div class="filli">
<jdoc:include type="modules" name="bfoot-top" style="stroke" headerLevel="3" />
      </div>
    </div>
  </div>
<?php endif; ?>
  <div id="bfoot-mid">
    <div class="rowi">
      <div class="filli <?php if($bfootLogo){ echo 'v'; } ?>w">
        <div class="wing">
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
    <div class="rowi">
      <div class="filli">
<jdoc:include type="modules" name="bfoot-btm" style="stroke" headerLevel="3" />
      </div>
    </div>
  </div>
<?php endif; ?>
</div>



</div>
<?php if ($showSide2) : ?>
        <div id="side2" class="n2"><a name="side2"></a>
<?php if ($showSide2Top) : ?>
          <div id="side2-top" class="ting">
<jdoc:include type="modules" name="side2-top" style="division" headerLevel="3" />
          </div>
<?php endif; ?>
<jdoc:include type="modules" name="side2" style="division" headerLevel="3" />
<?php if ($showSide2Btm) : ?>
          <div id="side2-btm" class="ting">
<jdoc:include type="modules" name="side2-btm" style="division" headerLevel="3" />
          </div>
<?php endif; ?>
        </div>
<?php endif; ?>
      </div>
    </div>
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
