<?php

class FrontController extends FrontControllerCore
{
	public function displayHeader()
	{
		global $css_files, $js_files;

		if (!self::$initialized)
			$this->init();

		// P3P Policies (http://www.w3.org/TR/2002/REC-P3P-20020416/#compact_policies)
		header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"');

		/* Hooks are volontary out the initialize array (need those variables already assigned) */
		self::$smarty->assign(array(
			'time' => time(),
			'img_update_time' => Configuration::get('PS_IMG_UPDATE_TIME'),
			'static_token' => Tools::getToken(false),
			'token' => Tools::getToken(),
			'logo_image_width' => Configuration::get('SHOP_LOGO_WIDTH'),
			'logo_image_height' => Configuration::get('SHOP_LOGO_HEIGHT'),
			'priceDisplayPrecision' => _PS_PRICE_DISPLAY_PRECISION_,
			'content_only' => (int)Tools::getValue('content_only'),
			'hide_left_column' => 0,//1全隐，0全显；只能在此定义
			'hide_right_column' => 1,//1全隐，0全显；建议仅在此定义，而displayFooter仅在footer.tpl中强制改变'hide_right_column'的值
		));
		self::$smarty->assign(array(
			'HOOK_HEADER' => Module::hookExec('header'),
			'HOOK_TOP' => Module::hookExec('top'),
			'HOOK_LEFT_COLUMN' => Module::hookExec('leftColumn'),
			'HOOK_RIGHT_COLUMN' => Module::hookExec('rightColumn'),//此处必须传递，否则在header.tpl中无法获知'HOOK_RIGHT_COLUMN'的真假
			'HOOK_BHEAD_TOP' => Module::hookExec('displayBheadTop'),
			'HOOK_BHEAD_BTM' => Module::hookExec('displayBheadBtm'),
			'HOOK_BBODY_TOP' => Module::hookExec('displayBbodyTop'), 
			'HOOK_MAIN_TOP' => Module::hookExec('displayMainTop'),
			'HOOK_COM_SIDE' => Module::hookExec('displayComSide'),
			'HOOK_COM_TOP' => Module::hookExec('displayComTop'),
			'HOOK_COM_ASIDE' => Module::hookExec('displayComAside'),//此处必须传递，否则在header.tpl中无法获知'HOOK_COM_ASIDE'的真假
		));

		if ((Configuration::get('PS_CSS_THEME_CACHE') || Configuration::get('PS_JS_THEME_CACHE')) && is_writable(_PS_THEME_DIR_.'cache'))
		{
			// CSS compressor management
			if (Configuration::get('PS_CSS_THEME_CACHE'))
				Tools::cccCss();

			// JS compressor management
			if (Configuration::get('PS_JS_THEME_CACHE'))
				Tools::cccJs();
		}

		self::$smarty->assign('css_files', $css_files);
		self::$smarty->assign('js_files', array_unique($js_files));
		self::$smarty->display(_PS_THEME_DIR_.'header.tpl');
	}

	public function displayFooter()
	{

		if (!self::$initialized)
			$this->init();

		self::$smarty->assign(array(
			'HOOK_RIGHT_COLUMN' => Module::hookExec('rightColumn', array('cart' => self::$cart)),
			'HOOK_FOOTER' => Module::hookExec('footer'),
			'content_only' => (int)Tools::getValue('content_only'),
			//'hide_left_column' => 1,//1全隐，0全显；此处定义无效
			//'hide_right_column' => 1,//1全隐，0全显；此处定义仅能在footer.tpl中强制改变已定义的'hide_right_column'的值，不建议在此定义
			'HOOK_COM_BTM' => Module::hookExec('displayComBtm'),
			'HOOK_COM_ASIDE' => Module::hookExec('displayComAside'),
			'HOOK_MAIN_BTM' => Module::hookExec('displayMainBtm'),
			'HOOK_BBODY_BTM' => Module::hookExec('displayBbodyBtm'),
			'HOOK_BFOOT_TOP' => Module::hookExec('displayBfootTop'),
			'HOOK_BFOOT_BTM' => Module::hookExec('displayBfootBtm'),
			));
		self::$smarty->display(_PS_THEME_DIR_.'footer.tpl');
		//live edit
		if (Tools::isSubmit('live_edit') && $ad = Tools::getValue('ad') && Tools::getValue('liveToken') == sha1(Tools::getValue('ad')._COOKIE_KEY_))
		{
			self::$smarty->assign(array('ad' => $ad, 'live_edit' => true));
			self::$smarty->display(_PS_ALL_THEMES_DIR_.'live_edit.tpl');
		}
		else
			Tools::displayError();
	}

	public function pagination($nbProducts = 10)
	{
		if (!self::$initialized)
			$this->init();

		$nArray = Configuration::get('PS_PRODUCTS_PER_PAGE') != 10 ? array((int)Configuration::get('PS_PRODUCTS_PER_PAGE'), 10, 20, 50) : array(10, 20, 50);
		// Clean duplicate values
		$nArray = array_unique($nArray);
		asort($nArray);
		$this->n = abs((int)Tools::getValue('n', (isset(self::$cookie->nb_item_per_page) && self::$cookie->nb_item_per_page >= 10) ? self::$cookie->nb_item_per_page : (int)Configuration::get('PS_PRODUCTS_PER_PAGE')));
		$this->p = abs((int)Tools::getValue('p', 1));

		if (!is_numeric(Tools::getValue('p', 1)) || Tools::getValue('p', 1) < 0)
			Tools::redirect('404.php');

		$current_url = tools::htmlentitiesUTF8($_SERVER['REQUEST_URI']);
		//delete parameter page
		$current_url = preg_replace('/(\?)?(&amp;)?p=\d+/', '$1', $current_url);

		$range = 5; /* how many pages around page selected原值2改为更大值，但仍存在诸多问题 */

		if ($this->p < 0)
			$this->p = 0;

		if (isset(self::$cookie->nb_item_per_page) && $this->n != self::$cookie->nb_item_per_page && in_array($this->n, $nArray))
			self::$cookie->nb_item_per_page = $this->n;

		if ($this->p > (($nbProducts / $this->n) + 1))
			Tools::redirect(preg_replace('/[&?]p=\d+/', '', $_SERVER['REQUEST_URI']));

		$pages_nb = ceil($nbProducts / (int)$this->n);

		$start = (int)($this->p - $range);
		if ($start < 1)
			$start = 1;
		$stop = (int)($this->p + $range);
		if ($stop > $pages_nb)
			$stop = (int)($pages_nb);
		self::$smarty->assign('nb_products', $nbProducts);
		$pagination_infos = array(
			'products_per_page' => (int)Configuration::get('PS_PRODUCTS_PER_PAGE'),
			'pages_nb' => $pages_nb,
			'p' => $this->p,
			'n' => $this->n,
			'nArray' => $nArray,
			'range' => $range,
			'start' => $start,
			'stop' => $stop,
			'current_url' => $current_url
		);

		self::$smarty->assign($pagination_infos);
	}
}
