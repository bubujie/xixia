{if !$content_only}
		{if $HOOK_COM_BTM}
		<div id="com_btm">{$HOOK_COM_BTM}</div>
		{/if}
	</div>
	{if $page_name=="index"}{if $HOOK_COM_ASIDE}
	<div id="com_aside" class="ving v2">{$HOOK_COM_ASIDE}</div>
	{/if}{/if}
</div>
</div>
<!-- ######### ######### /inner ######### ######### -->
	{if $page_name=="index"}{if $HOOK_MAIN_BTM}
					<div id="main_btm">{$HOOK_MAIN_BTM}</div>
	{/if}{/if}
				</div>
	{if !$hide_right_column}{if $HOOK_RIGHT_COLUMN}
				<div id="aside" class="ning n2">{$HOOK_RIGHT_COLUMN}</div>
	{/if}{/if}
			</div>
		</div>
	</div>
	{if $HOOK_BBODY_BTM}
	<div id="bbody_btm">
		<div class="rowo">
			<div class="fillo">{$HOOK_BBODY_BTM}</div>
		</div>
	</div>
	{/if}
</div>
<!-- ######### ######### ######### /bbody ######### ######### ######### -->
<div id="bfoot">
	{if $HOOK_BFOOT_TOP}
	<div id="bbody_top">
		<div class="rowo">
			<div class="fillo">{$HOOK_BFOOT_TOP}</div>
		</div>
	</div>
	{/if}
	<div id="bbody_mid">
		<div class="rowo">
			<div id="footer" class="fillo">{$HOOK_FOOTER}</div>
		</div>
	</div>
	{if $HOOK_BFOOT_BTM}
	<div id="bbody_btm">
		<div class="rowo">
			<div class="fillo">{$HOOK_BFOOT_BTM}</div>
		</div>
	</div>
	{/if}
	</div>
</div>
{/if}
	</body>
</html>
