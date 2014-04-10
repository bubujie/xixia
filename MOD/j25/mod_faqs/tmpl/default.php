<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_weblinks
 * @copyright	Copyright (C) 2005 - 2009 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<ul class="faqs<?php echo $moduleclass_sfx; ?>">
<?php foreach ($list as $item) :	?>
<li>
	<?php
	$link = $item->link;
	switch ($params->get('target', 3))
	{
		case 1:
			// open in a new window
			echo ''.
			htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8') .'';
			break;

		case 2:
			// open in a popup window
			echo "".
				htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8') .'';
			break;

		default:
			// open in parent window
			echo ''.
				htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8') .'';
			break;
	}
	?>
	<?php //if ($params->get('description', 0)) : ?>
		<?php echo nl2br($item->description); ?>
	<?php //endif; ?>

	<?php if ($params->get('hits', 0)) : ?>
		<?php echo '(' . $item->hits . ' ' . JText::_('MOD_WEBLINKS_HITS') . ')'; ?>
	<?php endif; ?>
</li>
<?php endforeach; ?>
</ul>
