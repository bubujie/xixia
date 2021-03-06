<?php
/**
 * @package   ##website## Template
 * @author    ##author## ##email##
 * @version   ##version## ##date##
 * @copyright Copyright (C) ##author## 2008 - 2012 ##website##. All Rights Reserved.
 * @license   ##license##
 */
//编码保持
// no direct access
defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');
?>
<script type="text/javascript">
	Joomla.submitbutton = function(pressbutton) {
		var form = document.getElementById('mailtoForm');

		// do field validation
		if (form.mailto.value == "" || form.from.value == "") {
			alert('<?php echo JText::_('COM_MAILTO_EMAIL_ERR_NOINFO'); ?>');
			return false;
		}
		form.submit();
	}
</script>
<?php
$data	= $this->get('data');
?>

<div id="mailto-window">
	<h2>
		<?php echo JText::_('COM_MAILTO_EMAIL_TO_A_FRIEND'); ?>
	</h2>
	<div class="mailto-close" style="position:absolute;top:10px;right:10px;">
		<a href="javascript: void window.close()" title="<?php echo JText::_('COM_MAILTO_CLOSE_WINDOW'); ?>">
		 <span><?php echo JText::_('COM_MAILTO_CLOSE_WINDOW'); ?> </span></a>
	</div>

	<form action="<?php echo JURI::base() ?>index.php" id="mailtoForm" method="post">
<table style="width:96%;">
	<tr class="formelm">
		<td>
			<label for="mailto_field"><?php echo JText::_('COM_MAILTO_EMAIL_TO'); ?></label>
		</td>
		<td>
			<input type="text" id="mailto_field" name="mailto" class="inputbox" size="25" value="<?php echo $this->escape($data->mailto); ?>"/>
		</td>
	</tr>
	<tr class="formelm">
		<td>
			<label for="sender_field">
			<?php echo JText::_('COM_MAILTO_SENDER'); ?></label>
		</td>
		<td>
			<input type="text" id="sender_field" name="sender" class="inputbox" value="<?php echo $this->escape($data->sender); ?>" size="25" />
		</td>
	</tr>
	<tr class="formelm">
		<td>
			<label for="from_field">
			<?php echo JText::_('COM_MAILTO_YOUR_EMAIL'); ?></label>
		</td>
		<td>
			<input type="text" id="from_field" name="from" class="inputbox" value="<?php echo $this->escape($data->from); ?>" size="25" />
		</td>
	</tr>
	<tr class="formelm">
		<td>
			<label for="subject_field">
			<?php echo JText::_('COM_MAILTO_SUBJECT'); ?></label>
		</td>
		<td>
			<input type="text" id="subject_field" name="subject" class="inputbox" value="<?php echo $this->escape($data->subject); ?>" size="25" />
		</td>
	</tr>
	<tr>
		<td>
		</td>
		<td>
		<span class="btn">
			<button class="button" onclick="return Joomla.submitbutton('send');">
				<?php echo JText::_('COM_MAILTO_SEND'); ?>
			</button>
		</span>
		<span class="btn">
			<button class="button" onclick="window.close();return false;">
				<?php echo JText::_('COM_MAILTO_CANCEL'); ?>
			</button>
		</span>
		</td>
	</tr>
</table>
		<input type="hidden" name="layout" value="<?php echo $this->getLayout();?>" />
		<input type="hidden" name="option" value="com_mailto" />
		<input type="hidden" name="task" value="send" />
		<input type="hidden" name="tmpl" value="component" />
		<input type="hidden" name="link" value="<?php echo $data->link; ?>" />
		<?php echo JHtml::_('form.token'); ?>

	</form>
</div>
