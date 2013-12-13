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
	
	<body {if $page_name}id="{if $page_name == '404'}p{/if}{$page_name|escape:'htmlall':'UTF-8'}"{/if}>
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
					<a id="header_logo" href="{$link->getPageLink('index.php')}" title="{$shop_name|escape:'htmlall':'UTF-8'}">
						<img class="logo" src="{$img_ps_dir}logo.jpg?{$img_update_time}" alt="{$shop_name|escape:'htmlall':'UTF-8'}" {if $logo_image_width}width="{$logo_image_width}"{/if} {if $logo_image_height}height="{$logo_image_height}" {/if} />
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
<!-- ######### ######### ######### bbody ######### ######### ######### -->
<div id="bbody">
	{if $HOOK_BBODY_TOP}
	<div id="bbody_top">
		<div class="rowo">
			<div class="fillo">{$HOOK_BBODY_TOP}</div>
		</div>
	</div>
	{/if}
	<div id="bbody_mid">
		<div class="rowo">
			<div id="columns" class="fillo {if !$hide_left_column}{if $HOOK_LEFT_COLUMN}n{/if}{/if}m{if !$hide_right_column}{if $HOOK_RIGHT_COLUMN}n{/if}{/if}">
	{if !$hide_left_column}{if $HOOK_LEFT_COLUMN}
				<div id="side" class="ning n1">{$HOOK_LEFT_COLUMN}</div>
	{/if}{/if}
				<div id="main" class="ming">
	{if $page_name=="index"}{if $HOOK_MAIN_TOP}
					<div id="main_top" class="ding">{$HOOK_MAIN_TOP}</div>
	{/if}{/if}
<!-- ######### ######### inner ######### ######### -->
<div class="wrap">
<div class="fill {if $page_name=="index"}{if $HOOK_COM_SIDE}v{/if}{/if}w{if $page_name=="index"}{if $HOOK_COM_ASIDE}v{/if}{/if}">
	{if $page_name=="index"}{if $HOOK_COM_SIDE}
	<div id="com_side" class="ving v1">{$HOOK_COM_SIDE}</div>
	{/if}{/if}
	<div class="wing">
		{if $page_name=="index"}{if $HOOK_COM_TOP}
		<div id="com_top">{$HOOK_COM_TOP}</div>
		{/if}{/if}
{/if}
