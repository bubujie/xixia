<?php
/**
 * @package		BuBujie.Dev
 * @subpackage	com_faqs
 * @copyright	Copyright (C) 2008 - 2014 BuBuJie Studio. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
jimport('joomla.application.component.helper');
/**
 * Faq Component HTML Helper
 *
 * @static
 * @package		BuBujie.Dev
 * @subpackage	com_faqs
 * @since 1.5
 */
class JHtmlIcon
{
	static function create($faq, $params)
	{
		$uri = JFactory::getURI();

		$url = JRoute::_(FaqsHelperRoute::getFormRoute(0, base64_encode($uri)));
		$text = JHtml::_('image', 'system/new.png', JText::_('JNEW'), NULL, true);
		$button = JHtml::_('link', $url, $text);
		$output = '<span class="hasTip" title="'.JText::_('COM_FAQS_FORM_CREATE_FAQ').'">'.$button.'</span>';
		return $output;
	}

	static function edit($faq, $params, $attribs = array())
	{
		$user = JFactory::getUser();
		$uri = JFactory::getURI();

		if ($params && $params->get('popup')) {
			return;
		}

		if ($faq->state < 0) {
			return;
		}

		JHtml::_('behavior.tooltip');
		$url	= FaqsHelperRoute::getFormRoute($faq->id, base64_encode($uri));
		$icon	= $faq->state ? 'edit.png' : 'edit_unpublished.png';
		$text	= JHtml::_('image', 'system/'.$icon, JText::_('JGLOBAL_EDIT'), NULL, true);

		if ($faq->state == 0) {
			$overlib = JText::_('JUNPUBLISHED');
		}
		else {
			$overlib = JText::_('JPUBLISHED');
		}

		$date = JHtml::_('date', $faq->created);
		$author = $faq->created_by_alias ? $faq->created_by_alias : $faq->author;

		$overlib .= '&lt;br /&gt;';
		$overlib .= $date;
		$overlib .= '&lt;br /&gt;';
		$overlib .= htmlspecialchars($author, ENT_COMPAT, 'UTF-8');

		$button = JHtml::_('link', JRoute::_($url), $text);

		$output = '<span class="hasTip" title="'.JText::_('COM_FAQS_EDIT').' :: '.$overlib.'">'.$button.'</span>';

		return $output;
	}
}
