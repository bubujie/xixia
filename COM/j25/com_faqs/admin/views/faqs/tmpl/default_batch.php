<?php
/**
 * @package		BuBujie.Dev
 * @subpackage	com_faqs
 * @copyright	Copyright (C) 2008 - 2014 BuBuJie Studio. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

$published = $this->state->get('filter.published');
?>
<fieldset class="batch">
	<legend><?php echo JText::_('COM_FAQS_BATCH_OPTIONS');?></legend>
	<p><?php echo JText::_('COM_FAQS_BATCH_TIP'); ?></p>
	<?php echo JHtml::_('batch.access');?>
	<?php echo JHtml::_('batch.language');?>

	<?php if ($published >= 0) : ?>
		<?php echo JHtml::_('batch.item', 'com_faqs');?>
	<?php endif; ?>

	<button type="submit" onclick="Joomla.submitbutton('faq.batch');">
		<?php echo JText::_('JGLOBAL_BATCH_PROCESS'); ?>
	</button>
	<button type="button" onclick="document.id('batch-category-id').value='';document.id('batch-access').value='';document.id('batch-language-id').value=''">
		<?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?>
	</button>
</fieldset>
