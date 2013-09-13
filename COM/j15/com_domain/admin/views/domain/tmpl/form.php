<?php
/**
 * @version SVN: $Id$
 * @package    Domain
 * @subpackage Views
 * @author     步步街工作室 {@link http://www.bubujie.net}
 * @author     Created on 11-Jan-2013
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') or die('=;)');

?>

<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col100">
   <fieldset class="adminform">
      <legend><?php echo JText::_('Details'); ?></legend>

      <table class="admintable">
      <tr>
         <td width="100" align="right" class="key">
            <label for="suffix">
               <?php echo JText::_('Domain Suffix'); ?>:
            </label>
         </td>
         <td>
            <input class="text_area" type="text" name="suffix" id="suffix" size="32" maxlength="250" value="<?php echo $this->Domain->suffix;?>" />
         </td>
      </tr>
      <tr>
         <td width="100" align="right" class="key">
            <label for="server">
               <?php echo JText::_('Whois Server'); ?>:
            </label>
         </td>
         <td>
            <input class="text_area" type="text" name="server" id="server" size="32" maxlength="250" value="<?php echo $this->Domain->server;?>" />
         </td>
      </tr>
      <tr>
         <td width="100" align="right" class="key">
            <label for="keyword">
               <?php echo JText::_('Keyword'); ?>:
            </label>
         </td>
         <td>
            <input class="text_area" type="text" name="keyword" id="keyword" size="32" maxlength="250" value="<?php echo $this->Domain->keyword;?>" />
         </td>
      </tr>
   </table>
   </fieldset>
</div>
<div class="clr"></div>

<input type="hidden" name="option" value="com_domain" />
<input type="hidden" name="id" value="<?php echo $this->Domain->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="domain" />
</form>