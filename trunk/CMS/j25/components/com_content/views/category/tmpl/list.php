<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::core();

// Create some shortcuts.
$params		= &$this->item->params;
$n			= count($this->items);
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));

$limitStart   = $this->pagination->get('limitstart');
$total        = $this->pagination->get('total');
?>

<?php
if (empty($this->items)) :
	if ($this->params->get('show_no_articles', 1)) : 
		printf("\n".'<p>%s</p>' ,
			JText::_('COM_CONTENT_NO_ARTICLES')
		);
	endif;

else :

	printf("\n".'<form action="%s" method="post" name="adminForm" id="adminForm">' ,
		htmlspecialchars(JFactory::getURI()->toString())
	);
	if ($this->params->get('show_headings') || $this->params->get('filter_field') != 'hide' || $this->params->get('show_pagination_limit')) :
		echo   "\n  ".'<fieldset class="filters">';
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
		if ($this->params->get('show_pagination_limit')) :
			echo   "\n    ".'<div class="display-limit">';
			echo   "".JText::_('JGLOBAL_DISPLAY_NUM').'&#160;';
			echo   "\n      ".$this->pagination->getLimitBox();
			echo   "    ".'</div>';
		endif;

		echo   "\n    ".'<!-- @TODO add hidden inputs -->';
		echo   "\n    ".'<input type="hidden" name="filter_order" value="" />';
		echo   "\n    ".'<input type="hidden" name="filter_order_Dir" value="" />';
		echo   "\n    ".'<input type="hidden" name="limitstart" value="" />';
		echo   "\n  ".'</fieldset>';
	endif;

	echo   "\n  ".'<table class="category">';
	if ($this->params->get('show_headings')) :
		echo   "\n    ".'<thead>';
		echo   "\n      ".'<tr>';
		printf("\n        ".'<th class="list-number">%s</th>' ,
				'#'
		);
		printf("\n        ".'<th class="list-title" id="tableOrdering">%s</th>' ,
			JHtml::_('grid.sort', 'JGLOBAL_TITLE', 'a.title', $listDirn, $listOrder)
		);
		if ($date = $this->params->get('list_show_date')) :
			echo   "\n        ".'<th class="list-date" id="tableOrdering2">';
			if ($date == "created") :
				echo   "".JHtml::_('grid.sort', 'COM_CONTENT_'.$date.'_DATE', 'a.created', $listDirn, $listOrder);
			elseif ($date == "modified") :
				echo   "".JHtml::_('grid.sort', 'COM_CONTENT_'.$date.'_DATE', 'a.modified', $listDirn, $listOrder);
			elseif ($date == "published") :
				echo   "".JHtml::_('grid.sort', 'COM_CONTENT_'.$date.'_DATE', 'a.publish_up', $listDirn, $listOrder);
			endif;
			echo   "".'</th>';
		endif;

		if ($this->params->get('list_show_author', 1)) :
			printf("\n        ".'<th class="list-author" id="tableOrdering3">%s</th>' ,
				JHtml::_('grid.sort', 'JAUTHOR', 'author', $listDirn, $listOrder)
			);
		endif;

		if ($this->params->get('list_show_hits', 1)) :
			printf("\n        ".'<th class="list-hits" id="tableOrdering4">%s</th>' ,
				JHtml::_('grid.sort', 'JGLOBAL_HITS', 'a.hits', $listDirn, $listOrder)
			);
		endif;
		echo   "\n      ".'</tr>';
		echo   "\n    ".'</thead>';
	endif;

	echo   "\n    ".'<tbody>';

	foreach ($this->items as $i => $article) :
		if ($this->items[$i]->state == 0) :
			printf("\n      ".'<tr class="system-unpublished%s">' ,
				$i % 2 ? ' odd' : ' even'
			);
		else:
			printf("\n      ".'<tr class="%s" >' ,
				$i % 2 ? 'odd' : 'even'
			);
		endif;

		if (in_array($article->access, $this->user->getAuthorisedViewLevels())) :

			printf("\n        ".'<td class="list-number">%s</td>' ,
				// $limitStart+$i+1
				$total-$limitStart-$i
			);

			echo   "\n        ".'<td class="list-title">';
			printf("".'<a href="%s">%s</a>' ,
				JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid)) ,
				$this->escape($article->title)
			);
			if ($article->params->get('access-edit')) :
				// echo   "".'<ul class="actions">';
				printf("".'<span class="edit-icon">%s</span>' ,
					JHtml::_('icon.edit', $article, $params)
				);
				// echo   "".'</ul>';
			endif;
			echo   "".'</td>';

			if ($this->params->get('list_show_date')) :
				printf("\n        ".'<td class="list-date">%s</td>' ,
					JHtml::_('date', $article->displayDate, $this->escape($this->params->get('date_format', JText::_('DATE_FORMAT_LC3'))))
				);
			endif;

			if ($this->params->get('list_show_author', 1) && !empty($article->author )) :
				echo   "\n        ".'<td class="list-author">';
				$author =  $article->author;
				$author = ($article->created_by_alias ? $article->created_by_alias : $author);
				if (!empty($article->contactid ) &&  $this->params->get('link_author') == true) :
					echo   "".JHtml::_('link', JRoute::_('index.php?option=com_contact&view=contact&id='.$article->contactid), $author);
				else :
					echo   "".JText::sprintf('COM_CONTENT_WRITTEN_BY', $author);
				endif;
				echo   "".'</td>';
			endif;

			if ($this->params->get('list_show_hits', 1)) :
				printf("\n        ".'<td class="list-hits">%s</td>' ,
					$article->hits
				);
			endif;



		else : // Show unauth links.
			echo   "\n        ".'<td>';

			echo   "".$this->escape($article->title).' : ';
			$menu		= JFactory::getApplication()->getMenu();
			$active		= $menu->getActive();
			$itemId		= $active->id;
			$link = JRoute::_('index.php?option=com_users&view=login&Itemid='.$itemId);
			$returnURL = JRoute::_(ContentHelperRoute::getArticleRoute($article->slug));
			$fullURL = new JURI($link);
			$fullURL->setVar('return', base64_encode($returnURL));

			printf("".'<a href="%s" class="register">%s</a>' ,
				$fullURL ,
				JText::_( 'COM_CONTENT_REGISTER_TO_READ_MORE' )
			);
			
			echo   "".'</td>';
		endif;
		echo   "\n      ".'</tr>';
	endforeach;
	echo   "\n    ".'</tbody>';
	echo   "\n  ".'</table>';
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
