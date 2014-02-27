{*
* 2007-2011 PrestaShop 
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2011 PrestaShop SA
*  @version  Release: $Revision: 6594 $
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

		{if !$content_only}
				</div>
{if !$hide_right_column && ($HOOK_RIGHT_COLUMN || $HOOK_SIDE2_TOP || $HOOK_SIDE2_BTM) && !in_array("$page_name",$page_array_right)}
<!-- Right -->
				<div id="right_column" class="n2">
{if $HOOK_SIDE2_TOP}
<div id="side2_top">
{$HOOK_SIDE2_TOP}
</div>
{/if}
					{$HOOK_RIGHT_COLUMN}
{if $HOOK_SIDE2_BTM}
<div id="side2_btm">
{$HOOK_SIDE2_BTM}
</div>
{/if}
				</div>
{/if}
</div>
</div>
</div>
{if $HOOK_BBODY_BTM}
<div id="bbody_btm">
  <div class="rowo">
    <div class="fillo">
{$HOOK_BBODY_BTM}
    </div>
  </div>
</div>
{/if}
</div>
<div id="bfoot">
{if $HOOK_BFOOT_TOP}
<div id="bfoot_top">
  <div class="rowo">
    <div class="fillo">
{$HOOK_BFOOT_TOP}
    </div>
  </div>
</div>
{/if}
<div id="bfoot_mid">
  <div class="rowo">
    <div class="fillo m">
			<div id="footer" class="ming">
				{$HOOK_FOOTER}
			</div>
    </div>
  </div>
</div>
{if $HOOK_BFOOT_BTM}
<div id="bfoot_btm">
  <div class="rowo">
    <div class="fillo">
{$HOOK_BFOOT_BTM}
    </div>
  </div>
</div>
{/if}
</div>
	{/if}
	</body>
</html>
