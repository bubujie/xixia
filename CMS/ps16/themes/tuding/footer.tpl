{if !$content_only}
					</div><!-- #center_column -->
					{if isset($right_column_size) && !empty($right_column_size)}
						<div id="right_column" class="n2 col-xs-12 col-sm-{$right_column_size|intval} column">{$HOOK_RIGHT_COLUMN}</div>
					{/if}
					</div>
			</div>
		</div>
	</div>
</div>


<div id="bfoot">
	<div class="no-footer-container" id="bfoot-mid">
		<footer id="footer"  class="rowo">
					<div class="fillo">{$HOOK_FOOTER}</div>
		</footer>
	</div>
</div>
{/if}
{include file="$tpl_dir./global.tpl"}
</body>
</html>