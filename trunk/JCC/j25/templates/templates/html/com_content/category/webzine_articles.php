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
/* 공통 */
.xans-product-1 { margin:30px 0 0; }
.xans-product-1 h2 { height:30px; font-size:12px; color:#272823; background:url("http://img.echosting.cafe24.com/design/skin/default_cn/layout/bg_title.gif") 0 3px repeat-x; }
.xans-product-1 h2 span { padding:0 7px 0 10px; background:#fff url("http://img.echosting.cafe24.com/design/skin/default_cn/common/ico_title.gif") 0 0 no-repeat; }
.xans-product-1 img { vertical-align:middle; }
.xans-product-1 ul.prdList { display:table; width:100%; min-width:756px; margin:-20px 0 0; font-size:0; line-height:0; }
.xans-product-1 ul.prdList li.item { display:inline-block; *display:inline; *zoom:1; margin:20px 0 40px 0; color:#838383; vertical-align:top; }
.xans-product-1 ul.prdList li.item div.box { margin:0 auto; font-size:12px; line-height:1.8em; }
.xans-product-1 ul.prdList li .mileage { display:block; }
.xans-product-1 span.grid { display:block; }

.xans-product-1 ul.prdList .name { position:relative; padding:7px 12px 0 0; }
.xans-product-1 ul.prdList .name a { color:#838383; }
.xans-product-1 ul.prdList .name .zoom {  position:absolute; width:12px; top:10px; right:0; cursor:pointer; }
.xans-product-1 ul.prdList .button { overflow:hidden; zoom:1; }
.xans-product-1 ul.prdList .button img { cursor:pointer; margin:0 4px 0 0; }
.xans-product-1 ul.prdList .button .bag { float:left; padding:7px 10px 0 0; }
.xans-product-1 ul.prdList .button .option { float:left; padding:7px 0 0; }

/* 진열방식 */
.xans-product-1 ul.column3 li.item { width:33.33%; }
.xans-product-1 ul.column3 li.item .box { width:240px; }
.xans-product-1 ul.column3 li.item .thumb { width:240px; height:240px; }
.xans-product-1 ul.column4 li.item { width:25%; }
.xans-product-1 ul.column4 li.item .box { width:180px; }
.xans-product-1 ul.column4 li.item .thumb { width:180px; height:180px; }
.xans-product-1 ul.column5 li.item { width:20%; }
.xans-product-1 ul.column5 li.item .box { width:140px; }
.xans-product-1 ul.column5 li.item .thumb { width:140px; height:140px; }

/* module="product_ListItem" */
.xans-product-1 .xans-product-listitem { margin:0; }
.xans-product-1 .xans-product-listitem li .title { font-weight:normal; }

/* 할인기간 레이어 */
.xans-product-1 .discountPeriod { display:inline-block; z-index:10; position:relative; width:55px; height:19px; vertical-align:middle; *zoom:1; *display:inline; }
.xans-product-1 .discountPeriod .edge { position:absolute; left:14px; top:-6px; width:9px; height:6px; font-size:0; line-height:0; background:url("http://img.echosting.cafe24.com/design/skin/default/common/bg_edge.gif") no-repeat 0 0; }
.xans-product-1 .layerDiscountPeriod { display:none; position:absolute; left:0; top:27px; width:313px; border:1px solid #6f94bf; font-size:12px; background-color:#fff; border-radius:3px; }
.xans-product-1 .layerDiscountPeriod strong.title { display:block; margin:0 0 8px; padding:0 35px 0 0; font-weight:bold; color:#010101; }
.xans-product-1 .layerDiscountPeriod .content { padding:11px 19px 15px; }
.xans-product-1 .layerDiscountPeriod .content p { color:#000; line-height:16px; }
.xans-product-1 .layerDiscountPeriod .content p strong { color:#80aeef; }
.xans-product-1 .layerDiscountPeriod .content p strong span { font-size:11px; }
.xans-product-1 .layerDiscountPeriod .close { position:absolute; right:12px; top:11px; }
.xans-product-1 .layerDiscountPeriod .close img { cursor:pointer; }
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

	<div class="category xans-product-1">

		<ul class="prdList column4">

		<?php foreach ($this->items as $i => $article) : ?>
			<?php if ($this->items[$i]->state == 0) : ?>
				<li><ul class="system-unpublished cat-list-row<?php echo $i % 2; ?>">
			<?php else: ?>
				<li class="item"><div class="box"><ul class="cat-list-row<?php echo $i % 2; ?>" >
			<?php endif; ?>
				<?php if (in_array($article->access, $this->user->getAuthorisedViewLevels())) : ?>
<?php $images = json_decode($article->images); ?>
<?php  if (isset($images->image_intro) and !empty($images->image_intro)) : ?>
	<?php $imgfloat = (empty($images->float_intro)) ? $this->params->get('float_intro') : $images->float_intro; ?>
	<li>
	<div class="img-intro-<?php echo htmlspecialchars($imgfloat); ?>">
	<img class="thumb"
		<?php if ($images->image_intro_caption):
			echo 'class="caption"'.' title="' .htmlspecialchars($images->image_intro_caption) .'"';
		endif; ?>
		src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"/>
	</div>
	</li>
<?php endif; ?>
					<li class="list-title">
						<a class="name" href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language)); ?>">
							<?php echo $this->escape($article->title); ?></a>

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
