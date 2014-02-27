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

{capture name=path}{l s='Sitemap'}{/capture}
{include file="$tpl_dir./breadcrumb.tpl"}
<script type="text/javascript">
jQuery(function($){
	// Tree Navigation
	var tNav = $('.sitemap_block,.categTree');
	var tNavPlus = '\<button type=\"button\" class=\"tNavToggle plus\"\>+\<\/button\>';
	var tNavMinus = '\<button type=\"button\" class=\"tNavToggle minus\"\>-\<\/button\>';
	tNav.find('li>ul').css('display','none');
	tNav.find('ul>li:last-child').addClass('last');
	tNav.find('li>ul:hidden').parent('li').prepend(tNavPlus);
	tNav.find('li>ul:visible').parent('li').prepend(tNavMinus);
	tNav.find('li.active').addClass('open').parents('li').addClass('open');
	tNav.find('li.open').parents('li').addClass('open');
	tNav.find('li.open>.tNavToggle').text('-').removeClass('plus').addClass('minus');
	tNav.find('li.open>ul').slideDown(100);
	$('.categTree .tNavToggle').click(function(){
		t = $(this);
		t.parent('li').toggleClass('open');
		if(t.parent('li').hasClass('open')){
			t.text('-').removeClass('plus').addClass('minus');
			t.parent('li').find('>ul').slideDown(100);
		} else {
			t.text('+').removeClass('minus').addClass('plus');
			t.parent('li').find('>ul').slideUp(100);
		}
		return false;
	});
	$('.tNav a[href=#]').click(function(){
		t = $(this);
		t.parent('li').toggleClass('open');
		if(t.parent('li').hasClass('open')){
			t.prev('button.tNavToggle').text('-').removeClass('plus').addClass('minus');
			t.parent('li').find('>ul').slideDown(100);
		} else {
			t.prev('button.tNavToggle').text('+').removeClass('minus').addClass('plus');
			t.parent('li').find('>ul').slideUp(100);
		}
		return false;
	});
});
</script>
<h1>{l s='Sitemap'}</h1>
<div id="sitemap_content" class="ding">
	<div class="sitemap_block w-1-2 xfl ding">
		<h3>{l s='Our offers'}</h3>
		<ul>
			<li><a href="{$link->getPageLink('new-products.php')}">{l s='New products'}</a></li>
			{if !$PS_CATALOG_MODE}
			<li><a href="{$link->getPageLink('best-sales.php')}">{l s='Top sellers'}</a></li>
			<li><a href="{$link->getPageLink('prices-drop.php')}">{l s='Price drop'}</a></li>
			{/if}
			{if $display_manufacturer_link OR $PS_DISPLAY_SUPPLIERS}<li><a href="{$link->getPageLink('manufacturer.php')}">{l s='Manufacturers'}</a></li>{/if}
			{if $display_supplier_link OR $PS_DISPLAY_SUPPLIERS}<li><a href="{$link->getPageLink('supplier.php')}">{l s='Suppliers'}</a></li>{/if}
		</ul>
	</div>
	<div class="sitemap_block w-1-2 xfl ding">
		<h3>{l s='Your Account'}</h3>
		<ul>
			<li><a href="{$link->getPageLink('my-account.php', true)}">{l s='Your Account'}</a></li>
			<li><a href="{$link->getPageLink('identity.php', true)}">{l s='Personal information'}</a></li>
			<li><a href="{$link->getPageLink('addresses.php', true)}">{l s='Addresses'}</a></li>
			{if $voucherAllowed}<li><a href="{$link->getPageLink('discount.php', true)}">{l s='Discounts'}</a></li>{/if}
			<li><a href="{$link->getPageLink('history.php', true)}">{l s='Order history'}</a></li>
		</ul>
	</div>
	<br class="clear" />
</div>
<div id="listpage_content" class="ding">
	<div class="categTree w-1-2 xfl ding">
		<h3>{l s='Categories'}</h3>
		<div class="tree_top"><a href="{$base_dir_ssl}">{$categoriesTree.name|escape:'htmlall':'UTF-8'}</a></div>
		<ul class="tree">
		{if isset($categoriesTree.children)}
			{foreach from=$categoriesTree.children item=child name=sitemapTree}
				{if $smarty.foreach.sitemapTree.last}
					{include file="$tpl_dir./category-tree-branch.tpl" node=$child last='true'}
				{else}
					{include file="$tpl_dir./category-tree-branch.tpl" node=$child}
				{/if}
			{/foreach}
		{/if}
		</ul>
	</div>
	<div class="categTree w-1-2 xfl ding">
		<h3>{l s='Pages'}</h3>
		<div class="tree_top"><a href="{$categoriescmsTree.link}">{$categoriescmsTree.name|escape:'htmlall':'UTF-8'}</a></div>
		<ul class="tree">
			{if isset($categoriescmsTree.children)}
				{foreach from=$categoriescmsTree.children item=child name=sitemapCmsTree}
					{if (isset($child.children) && $child.children|@count > 0) || $child.cms|@count > 0}
						{include file="$tpl_dir./category-cms-tree-branch.tpl" node=$child}
					{/if}
				{/foreach}
			{/if}
			{foreach from=$categoriescmsTree.cms item=cms name=cmsTree}
				<li><a href="{$cms.link|escape:'htmlall':'UTF-8'}" title="{$cms.meta_title|escape:'htmlall':'UTF-8'}">{$cms.meta_title|escape:'htmlall':'UTF-8'}</a></li>
			{/foreach}
			<li><a href="{$link->getPageLink('contact-form.php', true)}">{l s='Contact'}</a></li>
			{if $display_store}<li class="last"><a href="{$link->getPageLink('stores.php')}" title="{l s='Our stores'}">{l s='Our stores'}</a></li>{/if}
		</ul>
	</div>
</div>
