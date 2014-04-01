<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_banners
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

require_once JPATH_ROOT . '/components/com_banners/helpers/banner.php';
$baseurl = JURI::base();
?>
<?php
$doc = JFactory::getDocument();
$doc->addScript(JURI::base(true).'/media/jui/js/jquery.essing.min.js');
$doc->addScript(JURI::base(true).'/media/jui/js/jquery.flexslider.min.js');
$doc->addScript(JURI::base(true).'/media/jui/js/jquery.mousewheel.min.js');
$doc->addStylesheet(JURI::base(true).'/media/jui/css/flexslider.css');
$namespace=($params->get('namespace', 'flex-'));
$selector=($params->get('selector', '.slides > li'));
$animation=($params->get('animation', 'fade'));
$easing=($params->get('easing', 'swing'));
$direction=($params->get('direction', 'horizontal'));
$reverse=($params->get('reverse', false));
$animationLoop=($params->get('animationLoop', true));
$smoothHeight=($params->get('smoothHeight', false));
$startAt=($params->get('startAt', 0));
$slideshow=($params->get('slideshow', true));
$slideshowSpeed=($params->get('slideshowSpeed', 7000));
$animationSpeed=($params->get('animationSpeed', 600));
$initDelay=($params->get('initDelay', 0));
$randomize=($params->get('randomize', false));
$pauseOnActive=($params->get('pauseOnActive', true));
$pauseOnHover=($params->get('pauseOnHover', false));
$useCSS=($params->get('useCSS', true));
$touch=($params->get('touch', true));
$video=($params->get('video', false));
$controlNav=($params->get('controlNav', true));
$directionNav=($params->get('directionNav', true));
$prevText=($params->get('prevText', 'Previous'));
$nextText=($params->get('nextText', 'Next'));
$keyboard=($params->get('keyboard', true));
$multipleKeyboard=($params->get('multipleKeyboard', false));
$mousewheel=($params->get('mousewheel', false));
$pausePlay=($params->get('pausePlay', false));
$pauseText=($params->get('pauseText', 'Pause'));
$playText=($params->get('playText', 'Play'));
$controlsContainer=($params->get('controlsContainer', ''));
$manualControls=($params->get('manualControls', ''));
$sync=($params->get('sync', ''));
$asNavFor=($params->get('asNavFor', ''));
$itemWidth=($params->get('itemWidth', 0));
$itemMargin=($params->get('itemMargin', 0));
$minItems=($params->get('minItems', 0));
$maxItems=($params->get('maxItems', 0));
$move=($params->get('move', 0));
$flex =array(
	array(
		'property' => 'namespace',
		'value' => $namespace,
		'default' => 'flex-'
	),
	array(
		'property' => 'selector',
		'value' => $selector,
		'default' => '.slides > li'
	),			
	array(
		'property' => 'animation',
		'value' => $animation,
		'default' => 'fade'
	),
	array(
		'property' => 'easing',
		'value' => $easing,
		'default' => 'swing'
	),
	array(
		'property' => 'direction',
		'value' => $direction,
		'default' => 'horizontal'
	),
	array(
		'property' => 'reverse',
		'value' => $reverse,
		'default' => false
	),
	array(
		'property' => 'animationLoop',
		'value' => $animationLoop,
		'default' => true
	),
	array(
		'property' => 'smoothHeight',
		'value' => $smoothHeight,
		'default' => false
	),
	array(
		'property' => 'startAt',
		'value' => $startAt,
		'default' => 0
	),
	array(
		'property' => 'slideshow',
		'value' => $slideshow,
		'default' => true
	),
	array(
		'property' => 'slideshowSpeed',
		'value' => $slideshowSpeed,
		'default' => 7000
	),
	array(
		'property' => 'animationSpeed',
		'value' => $animationSpeed,
		'default' => 600
	),
	array(
		'property' => 'initDelay',
		'value' => $initDelay,
		'default' => 0
	),
	array(
		'property' => 'randomize',
		'value' => $randomize,
		'default' => false
	),
	array(
		'property' => 'pauseOnActive',
		'value' => $pauseOnActive,
		'default' => true
	),
	array(
		'property' => 'pauseOnHover',
		'value' => $pauseOnHover,
		'default' => false
	),
	array(
		'property' => 'useCSS',
		'value' => $useCSS,
		'default' => true
	),
	array(
		'property' => 'touch',
		'value' => $touch,
		'default' => true
	),
	array(
		'property' => 'video',
		'value' => $video,
		'default' => false
	),
	array(
		'property' => 'controlNav',
		'value' => $controlNav,
		'default' => true
	),
	array(
		'property' => 'directionNav',
		'value' => $directionNav,
		'default' => true
	),
	array(
		'property' => 'prevText',
		'value' => $prevText,
		'default' => 'Previous'
	),
	array(
		'property' => 'nextText',
		'value' => $nextText,
		'default' => 'Next'
	),
	array(
		'property' => 'keyboard',
		'value' => $keyboard,
		'default' => true
	),
	array(
		'property' => 'multipleKeyboard',
		'value' => $multipleKeyboard,
		'default' => false
	),
	array(
		'property' => 'mousewheel',
		'value' => $mousewheel,
		'default' => false
	),
	array(
		'property' => 'pausePlay',
		'value' => $pausePlay,
		'default' => false
	),
	array(
		'property' => 'pauseText',
		'value' => $pauseText,
		'default' => 'Pause'
	),
	array(
		'property' => 'playText',
		'value' => $playText,
		'default' => 'Play'
	),
	array(
		'property' => 'controlsContainer',
		'value' => $controlsContainer,
		'default' => ''
	),
	array(
		'property' => 'manualControls',
		'value' => $manualControls,
		'default' => ''
	),
	array(
		'property' => 'sync',
		'value' => $sync,
		'default' => ''
	),
	array(
		'property' => 'asNavFor',
		'value' => $asNavFor,
		'default' => ''
	),
	array(
		'property' => 'itemWidth',
		'value' => $itemWidth,
		'default' => 0
	),
	array(
		'property' => 'itemMargin',
		'value' => $itemMargin,
		'default' => 0
	),
	array(
		'property' => 'minItems',
		'value' => $minItems,
		'default' => 0
	),
	array(
		'property' => 'maxItems',
		'value' => $maxItems,
		'default' => 0
	),
	array(
		'property' => 'move',
		'value' => $move,
		'default' => 0
	)
);
?>
<?php if ($headerText) : ?>
	<div class="adheader">
		<?php echo $headerText; ?>
	</div>
<?php endif; ?>
<div id="ad-<?php echo $module->id; ?>" class="flexslider">
<ul class="adgroup<?php echo $moduleclass_sfx ?> slides">
<?php foreach($list as $item):?>
	<li class="aditem">
		<?php $link = JRoute::_('index.php?option=com_banners&task=click&id='. $item->id);?>
		<?php if($item->type==1) :?>
			<?php // Text based banners ?>
			<?php echo str_replace(array('{CLICKURL}', '{NAME}'), array($link, $item->name), $item->custombannercode);?>
		<?php else:?>
			<?php $imageurl = $item->params->get('imageurl');?>
			<?php $width = $item->params->get('width');?>
			<?php $height = $item->params->get('height');?>
			<?php if (BannerHelper::isImage($imageurl)) :?>
				<?php // Image based banner ?>
				<?php $alt = $item->params->get('alt');?>
				<?php $alt = $alt ? $alt : $item->name ;?>
				<?php $alt = $alt ? $alt : JText::_('MOD_BANNERS_BANNER') ;?>
				<?php if ($item->clickurl) :?>
					<?php // Wrap the banner in a link?>
					<?php $target = $params->get('target', 1);?>
					<?php if ($target == 1) :?>
						<?php // Open in a new window?>
						<a
							href="<?php echo $link; ?>" target="_blank"
							title="<?php echo htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8');?>">
							<img
								src="<?php echo $baseurl . $imageurl;?>"
								alt="<?php echo $alt;?>"
								<?php if (!empty($width)) echo 'width ="'. $width.'"';?>
								<?php if (!empty($height)) echo 'height ="'. $height.'"';?>
							/>
						</a>
					<?php elseif ($target == 2):?>
						<?php // open in a popup window?>
						<a
							href="<?php echo $link;?>" onclick="window.open(this.href, '',
								'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550');
								return false"
							title="<?php echo htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8');?>">
							<img
								src="<?php echo $baseurl . $imageurl;?>"
								alt="<?php echo $alt;?>"
								<?php if (!empty($width)) echo 'width ="'. $width.'"';?>
								<?php if (!empty($height)) echo 'height ="'. $height.'"';?>
							/>
						</a>
					<?php else :?>
						<?php // open in parent window?>
						<a
							href="<?php echo $link;?>"
							title="<?php echo htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8');?>">
							<img
								src="<?php echo $baseurl . $imageurl;?>"
								alt="<?php echo $alt;?>"
								<?php if (!empty($width)) echo 'width ="'. $width.'"';?>
								<?php if (!empty($height)) echo 'height ="'. $height.'"';?>
							/>
						</a>
					<?php endif;?>
				<?php else :?>
					<?php // Just display the image if no link specified?>
					<img
						src="<?php echo $baseurl . $imageurl;?>"
						alt="<?php echo $alt;?>"
						<?php if (!empty($width)) echo 'width ="'. $width.'"';?>
						<?php if (!empty($height)) echo 'height ="'. $height.'"';?>
					/>
				<?php endif;?>
			<?php elseif (BannerHelper::isFlash($imageurl)) :?>
				<object
					classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
					codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"
					<?php if (!empty($width)) echo 'width ="'. $width.'"';?>
					<?php if (!empty($height)) echo 'height ="'. $height.'"';?>
				>
					<param name="movie" value="<?php echo $imageurl;?>" />
					<embed
						src="<?php echo $imageurl;?>"
						loop="false"
						pluginspage="http://www.macromedia.com/go/get/flashplayer"
						type="application/x-shockwave-flash"
						<?php if (!empty($width)) echo 'width ="'. $width.'"';?>
						<?php if (!empty($height)) echo 'height ="'. $height.'"';?>
					/>
				</object>
			<?php endif;?>
		<?php endif;?>
	</li>
<?php endforeach; ?>

</ul>
</div>
<?php if ($footerText) : ?>
	<div class="adfooter">
		<?php echo $footerText; ?>
	</div>
<?php endif; ?>
<script type="text/javascript">
jQuery(window).load(function() {
	jQuery('#ad-<?php echo $module->id; ?>.flexslider').flexslider({
selector: '.slides > li'
<?php
foreach($flex as $key => $item) :
	switch($type = gettype($item['value'])) :
		case 'string' :
			$outputValue = "'" . $item['value'] . "'";
		break;
		case 'boolean' :
			if($item['value']) :
				$outputValue = 'true'; 
			else :
				$outputValue = 'false';
			endif;
		break;
		default :
			$outputValue = $item['value'];
		break;
	endswitch;
	if($item['value'] != $item['default']) :
		echo   "\n\t,".$item['property'].':'.$outputValue;
	endif;
endforeach;
echo   "\n".'';
?>
	});
});
</script>