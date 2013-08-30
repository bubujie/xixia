<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::core();

// Create some shortcuts.
$params    = &$this->item->params;
$n         = count($this->items);
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));
?>

<?php
// 如果没有文章
if (empty($this->items)) :
	// 如果开启了无文章提示
	if ($this->params->get('show_no_articles', 1)) : 
		printf("\n".'<p>%s</p>' ,
			JText::_('COM_CONTENT_NO_ARTICLES')
		);
	endif;

// 如果有文章则
else :
	// 列表显示方式表单
	printf("\n".'<form action="%s" method="post" name="adminForm" id="adminForm">' ,
		htmlspecialchars(JFactory::getURI()->toString())
	);
	// 如果要显示标题或过滤字段或显示数调整
	if ($this->params->get('show_headings') || $this->params->get('filter_field') != 'hide' || $this->params->get('show_pagination_limit')) :
		echo   "\n  ".'<fieldset class="filters">';
		// 如果要显示过滤字段
		if ($this->params->get('filter_field') != 'hide') :
			printf("\n    ".'<legend class="hidelabeltxt">%s</legend>' ,
				JText::_('JGLOBAL_FILTER_LABEL')
			);
			echo   "\n    ".'<div class="filter-search">';
			printf("".'<label class="filter-search-lbl" for="filter-search">%s</label>' ,
				JText::_('COM_CONTENT_'.$this->params->get('filter_field').'_FILTER_LABEL').'&#160;'
			);
			printf("".'<input type="text" name="filter-search" id="filter-search" value="%s" class="inputbox" onchange="document.adminForm.submit();" title="%s>" />' ,
				$this->escape($this->state->get('list.filter')) ,
				JText::_('COM_CONTENT_FILTER_SEARCH_DESC')
			);
			echo   "".'</div>';
		endif;
		// 如果要显示数调整
		if ($this->params->get('show_pagination_limit')) :
			echo   "\n    ".'<div class="display-limit">';
			echo   "".JText::_('JGLOBAL_DISPLAY_NUM').'&#160;';
			echo   "\n      ".$this->pagination->getLimitBox();
			echo   "    ".'</div>';
		endif;
		// Hidden表格标题栏排序
		echo   "\n    ".'<!-- @TODO add hidden inputs -->';
		echo   "\n    ".'<input type="hidden" name="filter_order" value="" />';
		echo   "\n    ".'<input type="hidden" name="filter_order_Dir" value="" />';
		echo   "\n    ".'<input type="hidden" name="limitstart" value="" />';
		echo   "\n  ".'</fieldset>';
	endif;
	// 开始输出表格
	echo   "\n  ".'<div class="category">';



	// 表格主体
	echo   "\n    ".'<ul>';



	// 循环输出各行
	foreach ($this->items as $i => $article) :
		// 如果文章状态为未发布
		if ($this->items[$i]->state == 0) :
			printf("\n      ".'<li class="system-unpublished cat-list-row%s">' ,
				$i % 2
			);
		else:
			printf("\n      ".'<li class="cat-list-row%s" >' ,
				$i % 2
			);
		endif;

		// 如果有权限查看
		if (in_array($article->access, $this->user->getAuthorisedViewLevels())) :
			echo   "\n        ".'<span class="list-title">';
			printf("".'<a href="%s">' ,
				JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid))
			);

$images    = json_decode($article->images);
// print_r($images);
if (isset($images->image_intro) and !empty($images->image_intro)) :
	echo   "".'<div class="img-intro">';
	printf("".'	<img%s src="%s" alt="%s"/>' ,
		$images->image_intro_caption ? ' class="caption"'.' title="' .htmlspecialchars($images->image_intro_caption) .'"' : '' ,
		htmlspecialchars($images->image_intro) ,
		htmlspecialchars($images->image_intro_alt)
	);
	echo   "".'</div>';
else :
	echo   "".'<div class="img-intro"></div>';	
endif;

			echo   "".$this->escape($article->title);
			echo   "".'</a>';
			// 如果有编辑权限
			if ($article->params->get('access-edit')) :
				echo   "".'<ul class="actions">';
				printf("".'<li class="edit-icon">%s</li>' ,
					JHtml::_('icon.edit', $article, $params)
				);
				echo   "".'</ul>';
			endif;
			echo   "".'</span>';
			// 如果要显示日期
			if ($this->params->get('list_show_date')) :
				printf("\n        ".'<span class="list-date">%s</span>' ,
					JHtml::_('date', $article->displayDate, $this->escape($this->params->get('date_format', JText::_('DATE_FORMAT_LC3'))))
				);
			endif;
			// 如果要显示作者
			if ($this->params->get('list_show_author', 1) && !empty($article->author )) :
				echo   "\n        ".'<span class="list-author">';
				$author =  $article->author;
				$author = ($article->created_by_alias ? $article->created_by_alias : $author);
				if (!empty($article->contactid ) &&  $this->params->get('link_author') == true) :
					echo   "".JHtml::_('link', JRoute::_('index.php?option=com_contact&view=contact&id='.$article->contactid), $author);
				else :
					echo   "".JText::sprintf('COM_CONTENT_WRITTEN_BY', $author);
				endif;
				echo   "".'</span>';
			endif;
			// 如果要显示浏览次数
			if ($this->params->get('list_show_hits', 1)) :
				printf("\n        ".'<span class="list-hits">%s</span>' ,
					$article->hits
				);
			endif;


		// 反之无权查看
		else : // Show unauth links.
			echo   "\n        ".'<span>';

			echo   "".$this->escape($article->title).' : ';
			$menu		= JFactory::getApplication()->getMenu();
			$active		= $menu->getActive();
			$itemId		= $active->id;
			$link = JRoute::_('index.php?option=com_users&view=login&Itemid='.$itemId);
			$returnURL = JRoute::_(ContentHelperRoute::getArticleRoute($article->slug));
			$fullURL = new JURI($link);
			$fullURL->setVar('return', base64_encode($returnURL));
			// 输出“注册以查看更多”提示
			printf("".'<a href="%s" class="register">%s</a>' ,
				$fullURL ,
				JText::_( 'COM_CONTENT_REGISTER_TO_READ_MORE' )
			);
			
			echo   "".'</span>';
		endif;
		echo   "\n      ".'</li>';
	endforeach;

	echo   "\n    ".'</ul>';
	echo   "\n  ".'</div>';
endif;

// Code to add a link to submit an article.
if ($this->category->getParams()->get('access-create')) :
	echo   "".JHtml::_('icon.create', $this->category, $this->category->params);
endif;

// Add pagination links
if (!empty($this->items)) :
	if (($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) :
	echo   "\n  ".'<div class="pagination">';
		if ($this->params->def('show_pagination_results', 1)) :
		 	printf("\n".'<p class="counter">%s</p>' ,
				$this->pagination->getPagesCounter()
		 	);
		endif;
		echo   "".$this->pagination->getPagesLinks();
		echo   "\n  ".'</div>';
	endif;
	echo   "\n".'</form>';
endif;
?>
