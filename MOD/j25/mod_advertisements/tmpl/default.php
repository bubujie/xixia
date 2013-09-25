<?php
/**
 * @package		Bubujie.Studio
 * @subpackage	mod_advertisements
 * @copyright	Copyright (C) 步步街工作室 2008 - 2012. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JHTML::script('media/system/js/jstools.js');
JHTML::script('media/system/js/switchable.js');
require_once JPATH_ROOT . '/components/com_banners/helpers/banner.php';
$baseurl = JURI::base();
$pannelwidth	= $params->get('pannelwidth');
$pannelheight	= $params->get('pannelheight');
$effect			= $params->get('direction');
$trigger		= $params->get('trigger');
$haslrbtn		= $params->get('haslrbtn');
$ptype			= $params->get('ptype');
$skin			= $params->get('skin');
$language		= $params->get('language');
$speed			= $params->get('speed');
$style			= $params->get('style');
$isTitle		= $params->get('isTitle');
$noborder		= $params->get('noborder');
$isWeibo		= $params->get('isWeibo');
$isFans			= $params->get('isFans');
switch ($effect) :
	case 'scrollx':
		break;
	case 'scrolly':
		$pannelwidth = '100%';
		break;
	case 'fade':
		break;
	default:
	break;
endswitch;
?>

<?php if ($headerText) : ?>
	<div class="adheader ding">
	<?php echo $headerText; ?>
	</div>
<?php endif; ?>
<?php if($haslrbtn) : ?>
<span class="scroller-prev prev disable">&lsaquo; 上一页</span>
<span class="scroller-next next">下一页 &rsaquo;</span>	
<?php endif; ?>
<div class="adcontent">
<div class="adgroup<?php echo $moduleclass_sfx ?>">
<?php foreach($list as $item):?>
	<div class="aditem">
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
		<div class="clr"></div>
	</div>
<?php endforeach; ?>
</div>
<ul class="triggergroup">
<?php $i = 1; ?>
<?php
	foreach($list as $item):
		echo   "".'<li class="trigger-item">';
		switch ($trigger) :
			case 'title':
				echo $item->name;
				break;
			case 'round':
				echo '&bull;';
				break;
			case 'number':
				echo $i;
				$i++;
				break;
			default:
				echo $i;
				$i++;
			break;
		endswitch;
		echo   "".'</li>';
	endforeach;
?>
</ul>
</div>
<?php if ($footerText) : ?>
	<div class="adfooter ding">
		<?php echo $footerText; ?>
	</div>
<?php endif; ?>
<script type="text/javascript">
	new Switchable('module-<?php echo $module->id; ?>',{
		effect:'<?php echo $effect; ?>',
		panels:'.aditem',
		triggers:'.trigger-item',
		autoplay:true,
		haslrbtn:<?php echo $haslrbtn; ?>

	});
</script>
<?php
$doc = JFactory::getDocument();
$style = '#module-'.$module->id.' {'
	. 'width:'.$pannelwidth.';'
	. 'clear:both;'
	. 'overflow:hidden;'
	. 'position:relative;'
	. '}'
	. '#module-'.$module->id.' .adheader, #module-'.$module->id.' .adfooter {'
	. 'display:block !important;'
	. '}'
	. '#module-'.$module->id.' .adcontent {'
	. 'width:'.$pannelwidth.';'
	. 'height:'.$pannelheight.';'
	. 'mrgin:0;'
	. 'padding:0;'
	. 'overflow:hidden;'
	. '}'
	. '#module-'.$module->id.' .adgroup {'
	. 'width:'.$pannelwidth.';'
	. '}'
	. '#module-'.$module->id.' .adgroup .aditem {'
	. 'width:'.$pannelwidth.';'
	. 'height:'.$pannelheight.';'
	. 'mrgin:0;'
	. 'padding:0;'
	. 'overflow:hidden;'
	. '}'
	. '#module-'.$module->id.' .adgroup img {'
	. 'width:'.$pannelwidth.';'
	. 'height:'.$pannelheight.';'
	. 'max-width:100%;'
	. 'max-height:100;'
	. '}'
	. '#module-'.$module->id.' .triggergroup {'
	. 'float:right;'
	. 'margin:0;'
	. 'padding:0;'
	. 'position: absolute;'
	. 'bottom:10px;'
	. 'right: 10px;'
	. '}'
	. '#module-'.$module->id.' .triggergroup li{'
	. 'list-style:none;'
	. 'float:left;'
	. 'margin:0;'
	. 'margin-left:5px;'
	. 'padding:0;'
	. 'background-color:#FFFFFF;'
	. 'color:#8B8D8E;'
	. 'border:1px solid #DEDEDE;'
	. 'font-family:Dotum;'
	. '}'
	. '#module-'.$module->id.' .triggergroup li.active{'
	. 'background-color:#CADB2B;'
	. 'color:#343432;'
	. 'border:1px solid #CADB2B;'
	. '}'; 
$doc->addStyleDeclaration( $style );
?>
