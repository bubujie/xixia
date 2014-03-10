<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$lang_iso}">
	<head>
		<title>{$meta_title|escape:'htmlall':'UTF-8'}</title>
{if isset($meta_description) AND $meta_description}
		<meta name="description" content="{$meta_description|escape:html:'UTF-8'}" />
{/if}
{if isset($meta_keywords) AND $meta_keywords}
		<meta name="keywords" content="{$meta_keywords|escape:html:'UTF-8'}" />
{/if}
		<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
		<meta name="generator" content="PrestaShop" />
		<meta name="robots" content="{if isset($nobots)}no{/if}index,follow" />
		<link rel="icon" type="image/vnd.microsoft.icon" href="{$img_ps_dir}favicon.ico?{$img_update_time}" />
		<link rel="shortcut icon" type="image/x-icon" href="{$img_ps_dir}favicon.ico?{$img_update_time}" />
		<script type="text/javascript">
			var baseDir = '{$content_dir}';
			var static_token = '{$static_token}';
			var token = '{$token}';
			var priceDisplayPrecision = {$priceDisplayPrecision*$currency->decimals};
			var priceDisplayMethod = {$priceDisplay};
			var roundMode = {$roundMode};
		</script>
{if isset($css_files)}
	{foreach from=$css_files key=css_uri item=media}
	<link href="{$css_uri}" rel="stylesheet" type="text/css" media="{$media}" />
	{/foreach}
{/if}
{if isset($js_files)}
	{foreach from=$js_files item=js_uri}
	<script type="text/javascript" src="{$js_uri}"></script>
	{/foreach}
{/if}
		{$HOOK_HEADER}
	</head>
	
	<body {if $page_name eq '404'}id="pagenotfound"{elseif $page_name}id="{$page_name|escape:'htmlall':'UTF-8'}"{/if} class="{if isset($page_name)}{$page_name|escape:'htmlall':'UTF-8'}{/if}{if $content_only} content_only{/if} bg-{if !$hide_left_column && ($HOOK_LEFT_COLUMN || $HOOK_SIDE1_TOP || $HOOK_SIDE1_BTM) && !in_array("$page_name",$page_array_left)}n{/if}m{if !$hide_right_column && ($HOOK_RIGHT_COLUMN || $HOOK_SIDE2_TOP || $HOOK_SIDE2_BTM) && !in_array("$page_name",$page_array_right)}n{/if}">
{if !$content_only}
<div id="bhead">
	{if isset($restricted_country_mode) && $restricted_country_mode}
	<div class="rowo">
		<div id="restricted-country">
			<p>{l s='You cannot place a new order from your country.'} <span class="bold">{$geolocation_country}</span></p>
		</div>
	</div>
	{/if}
	{if $HOOK_BHEAD_TOP}
	<div id="bhead_top">
		<div class="rowo">
			<div class="fillo">{$HOOK_BHEAD_TOP}</div>
		</div>
	</div>
	{/if}
	<div id="bhead_mid">
		<div class="rowo">
			<div id="header" class="fillo nm">
				<div class="ning n1">
					<a id="header_logo" href="{$base_dir}" title="{$shop_name|escape:'htmlall':'UTF-8'}">
						<img class="logo" src="{$img_ps_dir}logo.gif?{$img_update_time}" alt="{$shop_name|escape:'htmlall':'UTF-8'}" {if $logo_image_width}width="{$logo_image_width}"{/if} {if $logo_image_height}height="{$logo_image_height}" {/if} />
					</a>
				</div>
				<div id="header_right" class="ming">{$HOOK_TOP}</div>
			</div>
		</div>
	</div>
	{if $HOOK_BHEAD_BTM}
	<div id="bhead_btm">
		<div class="rowo">
			<div class="fillo">{$HOOK_BHEAD_BTM}</div>
		</div>
	</div>
	{/if}
</div>
<div id="bbody" class="bg-{if $HOOK_CONTENT_SIDE1}v{/if}w{if $HOOK_CONTENT_SIDE2}v{/if}">
{if $HOOK_BBODY_TOP}
<div id="bbody_top">
  <div class="rowo">
    <div class="fillo">
{$HOOK_BBODY_TOP}
    </div>
  </div>
</div>
{/if}
<div id="bbody_mid">
  <div class="rowo">
    <div id="columns" class="fillo {if !$hide_left_column && ($HOOK_LEFT_COLUMN || $HOOK_SIDE1_TOP || $HOOK_SIDE1_BTM) && !in_array("$page_name",$page_array_left)}n{/if}m{if !$hide_right_column && ($HOOK_RIGHT_COLUMN || $HOOK_SIDE2_TOP || $HOOK_SIDE2_BTM) && !in_array("$page_name",$page_array_right)}n{/if}">
{if !$hide_left_column && ($HOOK_LEFT_COLUMN || $HOOK_SIDE1_TOP || $HOOK_SIDE1_BTM) && !in_array("$page_name",$page_array_left)}
				<div id="left_column" class="n1">
{if $HOOK_SIDE1_TOP}
<div id="side1_top">
{$HOOK_SIDE1_TOP}
</div>
{/if}
					{$HOOK_LEFT_COLUMN}
{if $HOOK_SIDE1_BTM}
<div id="side1_btm">
{$HOOK_SIDE1_BTM}
</div>
{/if}
				</div>
{/if}
				<div id="center_column" class="ming">
{/if}
