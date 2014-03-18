<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.framework');

// Create some shortcuts.
$params		= &$this->item->params;
$n			= count($this->items);
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
?>

<?php if (empty($this->items)) : ?>

	<?php if ($this->params->get('show_no_articles', 1)) : ?>
	<p><?php echo JText::_('COM_CONTENT_NO_ARTICLES'); ?></p>
	<?php endif; ?>

<?php else : ?>
<style type="text/css">

/*
 * 상품리스트
**/

/* 타입 : 설명 */
.xans-product-listnormal.typeDesc h2 { margin:0 4px 0; padding:10px 0 0 18px; font-size:13px; line-height:15px; background:url("http://img.echosting.cafe24.com/design/skin/mobile_cn/bg_product_title.png") 0 10px no-repeat; background-size:13px 10px; }
.xans-product-listnormal.typeDesc { margin:10px 0 0; font-size:12px; }
.xans-product-listnormal.typeDesc > ul > li { position:relative; padding:10px 10px 10px 0; border-bottom:1px dashed #a1a1a3;}
.xans-product-listnormal.typeDesc .thumbnail { position:absolute; left:0; top:10px; }
.xans-product-listnormal.typeDesc .description { min-height:85px; padding:0 30px 0 100px; }
.xans-product-listnormal.typeDesc .name a { color:#63666e; }
.xans-product-listnormal.typeDesc .price { color:#f60; font-weight:bold; font-family:Tahoma; }
.xans-product-listnormal.typeDesc .strike { text-decoration:line-through; }
.xans-product-listnormal.typeDesc .delete { position:absolute; top:10px; right:10px; overflow:hidden; text-indent:-999px; width:21px; height:20px; border:0; cursor:pointer; background:url("http://img.echosting.cafe24.com/design/skin/mobile_cn/btn_del.png") no-repeat 0 0; background-size:100% 100%; }
.xans-product-listnormal.typeDesc .button { padding:5px 0; }
.xans-product-listnormal.typeDesc .button:after { content:""; display:block; clear:both; }
.xans-product-listnormal.typeDesc .button .tButton.type2 { float:right; }
.xans-product-listnormal.typeDesc .option { display:none; }
.xans-product-listnormal.typeDesc .option li { margin:3px 0 0; padding:0 0 0 8px; font-size:11px; border-bottom:0; background:url("http://img.echosting.cafe24.com/design/skin/mobile_cn/bg_boardwrite_th.png") 0 7px no-repeat; background-size:3px 7px; }
.xans-product-listnormal.typeDesc .btnEm { display:inline-block; height:22px; margin:0; padding:0 15px 0 6px; border:1px solid #bcbcbc; border-radius:3px; -moz-box-sizing:border-box; box-sizing:border-box; font-size:11px; color:#666; line-height:21px; cursor:pointer; vertical-align:middle; font-family:Verdana, Dotum; letter-spacing:-1px; background:#fff url("http://img.echosting.cafe24.com/design/skin/mobile_cn/bg_button_arrow.png") no-repeat 100% 50%; background-size:10px 8px; }
.xans-product-listnormal.typeDesc .discountPeriod { position:relative; display:inline-block; font-weight:normal; font-family:"돋움", Dotum, sans-serif; color:#212530; vertical-align:middle; }
.xans-product-listnormal.typeDesc .layerDiscountPeriod { display:none; z-index:1000; position:fixed; left:50%; width:280px; top:100px; margin:0 0 0 -150px; padding:17px 10px 10px; border:1px solid #999; border-radius:3px; text-align:center; background-color: #f5f5f6; }
.xans-product-listnormal.typeDesc .layerDiscountPeriod strong { font-weight:normal; font-size:13px; }
.xans-product-listnormal.typeDesc .layerDiscountPeriod .btnArea { margin:10px; }
.xans-product-listnormal.typeDesc .layerDiscountPeriod .btnArea .submit { width:71px; height:29px; line-height:25px; }
.xans-product-listnormal.typeDesc .layerDiscountPeriod .btnClose { position:absolute; right:4px; top:5px; overflow:hidden; width:18px; height:18px; font-size:0; background:url("http://img.echosting.cafe24.com/design/skin/mobile_cn/btn_layer_close.png") no-repeat 50% 50%; background-size:9px 8px; }



.xans-product-listnormal.typeDesc img { width:85px; }
/* 타입 : 섬네일 */
.xans-product-listnormal.typeThumb { margin:10px -4px 0; }
.xans-product-listnormal.typeThumb:first-child h2 { border-top:0; }
.xans-product-listnormal.typeThumb h2 { margin:0 4px 0; padding:10px 0 0 18px; font-size:13px; line-height:15px; background:url("http://img.echosting.cafe24.com/design/skin/mobile_cn/bg_product_title.png") 0 10px no-repeat; background-size:13px 10px; }
.xans-product-listnormal.typeThumb ul { display:table; table-layout:fixed; width:100%; font-size:0; line-height:0; }
.xans-product-listnormal.typeThumb img { max-width:100%; }
.xans-product-listnormal.typeThumb li { position:relative; display:inline-block; padding:7px 0; text-align:center; vertical-align:top; }
.xans-product-listnormal.typeThumb .thumbnail { margin:0 4px; }
.xans-product-listnormal.typeThumb .thumbnail img { width:100%; }
.xans-product-listnormal.typeThumb .information { position:relative; min-height:10px; margin:8px 4px 0 4px; }
.xans-product-listnormal.typeThumb .name { margin:8px 4px 0; font-size:12px; line-height:15px; word-wrap:break-word; }
.xans-product-listnormal.typeThumb .name a { color:#1D2B6D; }
.xans-product-listnormal.typeThumb .price { margin:0 4px; color:#f60; font-weight:bold; font-size:12px; font-family:Tahoma; line-height:15px; word-wrap:break-word; }
.xans-product-listnormal.typeThumb .strike { text-decoration:line-through; }
.xans-product-listnormal.typeThumb .more_view { margin:7px 4px 0; }
.xans-product-listnormal.typeThumb .more_view a { display:block; padding:0 0 0 0; background:#d4d4d6; }
.xans-product-listnormal.typeThumb .more_view a span { overflow:hidden; display:block; width:100%; height:30px; text-indent:-9999px; background:url("http://img.echosting.cafe24.com/design/skin/mobile_cn/bg_togglebar_show.png") no-repeat 50% 50%; background-size:12px 12px; }
.xans-product-listnormal.typeThumb .grid3 li { width:33.333%; }
.xans-product-listnormal.typeThumb .grid4 li { width:25%; }
.xans-product-listnormal.typeThumb .btnEm { display:inline-block; height:22px; margin:0; padding:0 15px 0 6px; border:1px solid #bcbcbc; border-radius:3px; -moz-box-sizing:border-box; box-sizing:border-box; font-size:11px; color:#666; line-height:21px; cursor:pointer; vertical-align:middle; font-family:Verdana, Dotum; letter-spacing:-1px; background:#fff url("http://img.echosting.cafe24.com/design/skin/mobile_cn/bg_button_arrow.png") no-repeat 100% 50%; background-size:10px 8px; }
.xans-product-listnormal.typeThumb .discountPeriod { position:relative; display:inline-block; font-weight:normal; font-family:"돋움", Dotum, sans-serif; color:#212530; vertical-align:middle; }
.xans-product-listnormal.typeThumb .layerDiscountPeriod { display:none; z-index:1000; position:fixed; left:50%; width:280px; top:100px; margin:0 0 0 -150px; padding:17px 10px 10px; border:1px solid #999; border-radius:3px; text-align:center; background-color: #f5f5f6; }
.xans-product-listnormal.typeThumb .layerDiscountPeriod p { margin:3px 0; }
.xans-product-listnormal.typeThumb .layerDiscountPeriod strong { font-weight:normal; font-size:13px; }
.xans-product-listnormal.typeThumb .layerDiscountPeriod .btnArea { margin:10px; }
.xans-product-listnormal.typeThumb .layerDiscountPeriod .btnArea .submit { width:71px; height:29px; line-height:25px; }
.xans-product-listnormal.typeThumb .layerDiscountPeriod .btnClose { position:absolute; right:4px; top:5px; overflow:hidden; width:18px; height:18px; font-size:0; background:url("http://img.echosting.cafe24.com/design/skin/mobile_cn/btn_layer_close.png") no-repeat 50% 50%; background-size:9px 8px; }
</style>
<form action="<?php echo htmlspecialchars(JFactory::getURI()->toString()); ?>" method="post" name="adminForm" id="adminForm">
	<?php if ($this->params->get('show_headings') || $this->params->get('filter_field') != 'hide' || $this->params->get('show_pagination_limit')) :?>
	<fieldset class="filters">
		<?php if ($this->params->get('filter_field') != 'hide') :?>
		<legend class="hidelabeltxt">
			<?php echo JText::_('JGLOBAL_FILTER_LABEL'); ?>
		</legend>

		<div class="filter-search">
			<label class="filter-search-lbl" for="filter-search"><?php echo JText::_('COM_CONTENT_'.$this->params->get('filter_field').'_FILTER_LABEL').'&#160;'; ?></label>
			<input type="text" name="filter-search" id="filter-search" value="<?php echo $this->escape($this->state->get('list.filter')); ?>" class="inputbox" onchange="document.adminForm.submit();" title="<?php echo JText::_('COM_CONTENT_FILTER_SEARCH_DESC'); ?>" />
		</div>
		<?php endif; ?>

		<?php if ($this->params->get('show_pagination_limit')) : ?>
		<div class="display-limit">
			<?php echo JText::_('JGLOBAL_DISPLAY_NUM'); ?>&#160;
			<?php echo $this->pagination->getLimitBox(); ?>
		</div>
		<?php endif; ?>

	<!-- @TODO add hidden inputs -->
		<input type="hidden" name="filter_order" value="" />
		<input type="hidden" name="filter_order_Dir" value="" />
		<input type="hidden" name="limitstart" value="" />
	</fieldset>
	<?php endif; ?>

		<?php if ($this->params->get('show_headings')) :?>
		<div>
			<tr>
				<th class="list-title" id="tableOrdering">
					<?php  echo JHtml::_('grid.sort', 'JGLOBAL_TITLE', 'a.title', $listDirn, $listOrder) ; ?>
				</th>

				<?php if ($date = $this->params->get('list_show_date')) : ?>
				<th class="list-date" id="tableOrdering2">
					<?php if ($date == "created") : ?>
						<?php echo JHtml::_('grid.sort', 'COM_CONTENT_'.$date.'_DATE', 'a.created', $listDirn, $listOrder); ?>
					<?php elseif ($date == "modified") : ?>
						<?php echo JHtml::_('grid.sort', 'COM_CONTENT_'.$date.'_DATE', 'a.modified', $listDirn, $listOrder); ?>
					<?php elseif ($date == "published") : ?>
						<?php echo JHtml::_('grid.sort', 'COM_CONTENT_'.$date.'_DATE', 'a.publish_up', $listDirn, $listOrder); ?>
					<?php endif; ?>
				</th>
				<?php endif; ?>

				<?php if ($this->params->get('list_show_author', 1)) : ?>
				<th class="list-author" id="tableOrdering3">
					<?php echo JHtml::_('grid.sort', 'JAUTHOR', 'author', $listDirn, $listOrder); ?>
				</th>
				<?php endif; ?>

				<?php if ($this->params->get('list_show_hits', 1)) : ?>
				<th class="list-hits" id="tableOrdering4">
					<?php echo JHtml::_('grid.sort', 'JGLOBAL_HITS', 'a.hits', $listDirn, $listOrder); ?>
				</th>
				<?php endif; ?>
			</tr>
		</div>
		<?php endif; ?>

	<div class="category xans-product-listnormal typeDesc">

		<ul class="grid4">

		<?php foreach ($this->items as $i => $article) : ?>
			<?php if ($this->items[$i]->state == 0) : ?>
				<li><ul class="system-unpublished cat-list-row<?php echo $i % 2; ?>">
			<?php else: ?>
				<li class="item cat-list-row<?php echo $i % 2; ?>">
			<?php endif; ?>
				<?php if (in_array($article->access, $this->user->getAuthorisedViewLevels())) : ?>
<?php $images = json_decode($article->images); ?>
<?php  if (isset($images->image_intro) and !empty($images->image_intro)) : ?>
	<?php $imgfloat = (empty($images->float_intro)) ? $this->params->get('float_intro') : $images->float_intro; ?>
	<div class="thumbnail">
	<a class="layer" href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language)); ?>">
	<img class="thumb"
		<?php if ($images->image_intro_caption):
			echo 'class="caption"'.' title="' .htmlspecialchars($images->image_intro_caption) .'"';
		endif; ?>
		src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"/>
	</a>
	</div>
<?php endif; ?><div class="description">
					<ul>
					<li class="list-title">
						<span class="name">
						<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language)); ?>">
							<?php echo $this->escape($article->title); ?></a></span>

						<?php if ($article->params->get('access-edit')) : ?>
						<ul class="actions">
							<li class="edit-icon">
								<?php echo JHtml::_('icon.edit', $article, $params); ?>
							</li>
						</ul>
						<?php endif; ?>
					</li>

					<?php if ($this->params->get('list_show_date')) : ?>
					<li class="list-date">
						<?php echo JHtml::_('date', $article->displayDate, $this->escape(
						$this->params->get('date_format', JText::_('DATE_FORMAT_LC3')))); ?>
					</li>
					<?php endif; ?>

					<?php if ($this->params->get('list_show_author', 1)) : ?>
					<li class="list-author">
						<?php if(!empty($article->author) || !empty($article->created_by_alias)) : ?>
							<?php $author =  $article->author ?>
							<?php $author = ($article->created_by_alias ? $article->created_by_alias : $author);?>

							<?php if (!empty($article->contactid ) &&  $this->params->get('link_author') == true):?>
								<?php echo JHtml::_(
										'link',
										JRoute::_('index.php?option=com_contact&view=contact&id='.$article->contactid),
										$author
								); ?>

							<?php else :?>
								<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
							<?php endif; ?>
						<?php endif; ?>
					</li>
					<?php endif; ?>

					<?php if ($this->params->get('list_show_hits', 1)) : ?>
					<li class="list-hits">
						<?php echo $article->hits; ?>
					</li>
					<?php endif; ?>

				<?php else : // Show unauth links. ?>
					<li>
						<?php
							echo $this->escape($article->title).' : ';
							$menu		= JFactory::getApplication()->getMenu();
							$active		= $menu->getActive();
							$itemId		= $active->id;
							$link = JRoute::_('index.php?option=com_users&view=login&Itemid='.$itemId);
							$returnURL = JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language));
							$fullURL = new JURI($link);
							$fullURL->setVar('return', base64_encode(urlencode($returnURL)));
						?>
						<a href="<?php echo $fullURL; ?>" class="register">
							<?php echo JText::_( 'COM_CONTENT_REGISTER_TO_READ_MORE' ); ?></a>
					</li>
				<?php endif; ?>
				</ul></div></li>
		<?php endforeach; ?>
		</ul>
	</div>
<?php endif; ?>

<?php // Code to add a link to submit an article. ?>
<?php if ($this->category->getParams()->get('access-create')) : ?>
	<?php echo JHtml::_('icon.create', $this->category, $this->category->params); ?>
<?php  endif; ?>

<?php // Add pagination links ?>
<?php if (!empty($this->items)) : ?>
	<?php if (($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>
	<div class="pagination">

		<?php if ($this->params->def('show_pagination_results', 1)) : ?>
		 	<p class="counter">
				<?php echo $this->pagination->getPagesCounter(); ?>
			</p>
		<?php endif; ?>

		<?php echo $this->pagination->getPagesLinks(); ?>
	</div>
	<?php endif; ?>
</form>
<?php  endif; ?>
