<?php
/**
 * @package		Bubujie.Studio
 * @subpackage	mod_articles_latest
 * @copyright	Copyright (C) 步步街工作室 2008 - 2012. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
?>
<ul class="latestnews<?php echo $moduleclass_sfx; ?>">
<?php foreach ($list as $item) :  ?>
	<li class="item">
		<a href="<?php echo $item->link; ?>">
			<?php echo $item->title; ?></a>
<?php $images = json_decode($item->images); ?>
<?php  if (isset($images->image_intro) and !empty($images->image_intro)) : ?>
	<?php $imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro; ?>
	<div class="img-intro-<?php echo htmlspecialchars($imgfloat); ?>">
	<img
		<?php if ($images->image_intro_caption):
			echo 'class="caption"'.' title="' .htmlspecialchars($images->image_intro_caption) .'"';
		endif; ?>
		src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"/>
	</div>
<?php endif; ?>
	</li>
<?php endforeach; ?>
</ul>
<script type="text/javascript">
    new Slide('module-<?php echo $module->id; ?>',{
		autoplay:true,
        haslrbtn:true,
        effect:'scrollx',
        hasTriggers:false,
        panels:'.item',
        prev:'.go-left',
        next:'.go-right',
        viewStep:4
    });
</script>
<?php
$doc = JFactory::getDocument();
$style = '#module-'.$module->id.' {'
	. 'width:auto;'
	. 'height:200px;'
	. 'clear:both;'
	. 'overflow:hidden;'
	. 'border:1px solid #000;'
	. '}'
	. '#module-'.$module->id.' ul {'
	. 'width:auto;'
	. 'height:200px;'
	. 'mrgin:0;'
	. 'padding:0;'
	. 'overflow:hidden;'
	. '}'
	. '#module-'.$module->id.' ul li {'
	. 'width:150px;'
	. 'height:200px;'
	. 'max-widht:100%;'
	. '}'
	. '#module-'.$module->id.' img {'
	. 'width:130px;'
	. 'height:80px;'
	. 'padding:10px'
	. '}'; 
$doc->addStyleDeclaration( $style );
?>