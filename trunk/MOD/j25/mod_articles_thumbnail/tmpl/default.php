<?php
/**
 * @package		Bubujie.Studio
 * @subpackage	mod_articles_thumbnail
 * @copyright	Copyright (C) 步步街工作室 2008 - 2012. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
?>

<?php if ($grouped) : ?>
<ul class="category-module<?php echo $moduleclass_sfx; ?>">
	<?php foreach ($list as $group_name => $group) : ?>
	<li>
		<h<?php echo $item_heading; ?>><?php echo $group_name; ?></h<?php echo $item_heading; ?>>
		<ul>
			<?php foreach ($group as $item) : ?>
				<li>
					<h<?php echo $item_heading+1; ?>>
					   	<?php if ($params->get('link_titles') == 1) : ?>
						<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
<?php $images = json_decode($item->images); ?>
<?php  if (isset($images->image_intro) and !empty($images->image_intro)) : ?>
	<?php $imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro; ?>
	<div class="thumb img-intro-<?php echo htmlspecialchars($imgfloat); ?>">
	<img
		<?php if ($images->image_intro_caption):
			echo 'class="caption"'.' title="' .htmlspecialchars($images->image_intro_caption) .'"';
		endif; ?>
		src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"/>
	</div>
<?php endif; ?>
						<?php echo $item->title; ?>
				        <?php if ($item->displayHits) :?>
							<span class="mod-articles-category-hits">
				            (<?php echo $item->displayHits; ?>)  </span>
				        <?php endif; ?></a>
				        <?php else :?>
				        <?php echo $item->title; ?>
				        	<?php if ($item->displayHits) :?>
							<span class="mod-articles-category-hits">
				            (<?php echo $item->displayHits; ?>)  </span>
				        <?php endif; ?></a>
				            <?php endif; ?>
			        </h<?php echo $item_heading+1; ?>>


				<?php if ($params->get('show_author')) :?>
					<span class="mod-articles-category-writtenby">
					<?php echo $item->displayAuthorName; ?>
					</span>
				<?php endif;?>

				<?php if ($item->displayCategoryTitle) :?>
					<span class="mod-articles-category-category">
					(<?php echo $item->displayCategoryTitle; ?>)
					</span>
				<?php endif; ?>
				<?php if ($item->displayDate) : ?>
					<span class="mod-articles-category-date"><?php echo $item->displayDate; ?></span>
				<?php endif; ?>
				<?php if ($params->get('show_introtext')) :?>
			<p class="mod-articles-category-introtext">
			<?php echo $item->displayIntrotext; ?>
			</p>
		<?php endif; ?>

		<?php if ($params->get('show_readmore')) :?>
			<p class="mod-articles-category-readmore">
				<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
				<?php if ($item->params->get('access-view')== FALSE) :
						echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE');
					elseif ($readmore = $item->alternative_readmore) :
						echo $readmore;
						echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit'));
						if ($params->get('show_readmore_title', 0) != 0) :
							echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
						endif;
					elseif ($params->get('show_readmore_title', 0) == 0) :
						echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE');
					else :

						echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE');
						echo JHtml::_('string.truncate', ($item->title), $params->get('readmore_limit'));
					endif; ?>
	        </a>
			</p>
			<?php endif; ?>
		</li>
			<?php endforeach; ?>
		</ul>
	</li>
	<?php endforeach; ?>
</ul>
<?php else : ?>
<ul class="category-module<?php echo $moduleclass_sfx; ?>">
	<?php foreach ($list as $item) : ?>
	    <li>
	   	<h<?php echo $item_heading; ?>>
	   	<?php if ($params->get('link_titles') == 1) : ?>
		<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
<?php $images = json_decode($item->images); ?>
<?php  if (isset($images->image_intro) and !empty($images->image_intro)) : ?>
	<?php $imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro; ?>
	<div class="thumb img-intro-<?php echo htmlspecialchars($imgfloat); ?>">
	<img
		<?php if ($images->image_intro_caption):
			echo 'class="caption"'.' title="' .htmlspecialchars($images->image_intro_caption) .'"';
		endif; ?>
		src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"/>
	</div>
<?php endif; ?>
		<?php echo $item->title; ?>
        <?php if ($item->displayHits) :?>
			<span class="mod-articles-category-hits">
            (<?php echo $item->displayHits; ?>)  </span>
        <?php endif; ?></a>
        <?php else :?>
        <?php echo $item->title; ?>
        	<?php if ($item->displayHits) :?>
			<span class="mod-articles-category-hits">
            (<?php echo $item->displayHits; ?>)  </span>
        <?php endif; ?></a>
            <?php endif; ?>
        </h<?php echo $item_heading; ?>>

       	<?php if ($params->get('show_author')) :?>
       		<span class="mod-articles-category-writtenby">
			<?php echo $item->displayAuthorName; ?>
			</span>
		<?php endif;?>
		<?php if ($item->displayCategoryTitle) :?>
			<span class="mod-articles-category-category">
			(<?php echo $item->displayCategoryTitle; ?>)
			</span>
		<?php endif; ?>
        <?php if ($item->displayDate) : ?>
			<span class="mod-articles-category-date"><?php echo $item->displayDate; ?></span>
		<?php endif; ?>
		<?php if ($params->get('show_introtext')) :?>
			<p class="mod-articles-category-introtext">
			<?php echo $item->displayIntrotext; ?>
			</p>
		<?php endif; ?>

		<?php if ($params->get('show_readmore')) :?>
			<p class="mod-articles-category-readmore">
				<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
		        <?php if ($item->params->get('access-view')== FALSE) :
						echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE');
					elseif ($readmore = $item->alternative_readmore) :
						echo $readmore;
						echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit'));
					elseif ($params->get('show_readmore_title', 0) == 0) :
						echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE');
					else :
						echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE');
						echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit'));
					endif; ?>
	        </a>
			</p>
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
		viewStep:5
	});
</script>
<?php
$selector='#module-'.$module->id;
$doc = JFactory::getDocument();
$width='150px';
$height='200px';
$imgW='100px';
$imgH='100px'; 
$style1 ='/* Fixed Image Col List */
'.$selector.' ul{ position:relative; margin:0; padding:0; border:1px solid #ddd; border-left:0; border-right:0; list-style:none; overflow:hidden; font-size:12px; font-family:Tahoma, Geneva, sans-serif; *zoom:1;}
'.$selector.' ul:after{ content:""; display:block; clear:both;}
'.$selector.' li{ position:relative; top:1px; float:left; width:'.$width.'; height:'.$height.'; overflow:hidden; border-bottom:1px solid #eee;}
'.$selector.' .thumb{ position:relative; display:block; width:'."$imgW".'; height:'."$imgH".'; line-height:'."$imgH".'; overflow:hidden; text-align:center; background:#eee; color:#666; white-space:nowrap;}
'.$selector.' .thumb img{ display:block; border:0; width:'."$imgW".'; height:'."$imgH".';}
'.$selector.' .thumb em{ position:absolute; visibility:hidden; width:1px; height:1px; left:0; bottom:0; text-align:center; background:#000; opacity:.6; filter:alpha(opacity=60); color:#fff; font-weight:bold; font-style:normal;}
'.$selector.' .thumb em{ _width:100%; _height:auto; _line-height:20px; _visibility:visible;}
'.$selector.' a{ display:block; width:'."$imgW".'; padding:20px 0 0 0; margin:0 auto; text-decoration:none; cursor:pointer;}
'.$selector.' a strong{ display:inline-block; margin:8px 0 0 0; color:#333;}
'.$selector.' p{ width:120px; margin:0 auto; font-size:11px; color:#767676;}
'.$selector.' a:hover strong,
'.$selector.' a:active strong,
'.$selector.' a:focus strong{ text-decoration:underline;}
'.$selector.' a:hover .thumb,
'.$selector.' a:active .thumb,
'.$selector.' a:focus .thumb{ border:3px solid #eee; margin:-3px; -moz-box-shadow:0 0 5px #666; -webkit-box-shadow:0 0 5px #666;}
'.$selector.' a:hover .thumb em,
'.$selector.' a:active .thumb em,
'.$selector.' a:focus .thumb em{ width:100%; height:auto; visibility:visible;}';
$style1 .= $selector.' a .thumb{ border:1px solid #eee; }
'.$selector.' a:hover,
'.$selector.' a:active,
'.$selector.' a:focus{color:#333;background:#FFF;}
'.$selector.' a:hover .thumb,
'.$selector.' a:active .thumb,
'.$selector.' a:focus .thumb{margin:-2px;}
'.$selector.' ul{margin-left:0px;}';
$doc->addStyleDeclaration( $style1 );
?>
<?php endif; ?>
