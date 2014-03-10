<?php
include _PS_MODULE_DIR_.'blockdropmenu/dropmenulinks.class.php';
class blockdropmenu extends Module
{
  private $_menu = '';
  private $_html = '';

  public function __construct()
  {
    $this->name = 'blockdropmenu';
    $this->tab = 'front_office_features';
    $this->version = 1.3;
    parent::__construct();
    $this->displayName = $this->l('Top horizontal drop menu');
    $this->description = $this->l('Add a new drop menu on top of your shop.');
  }

  public function install()
  {
    if(!parent::install() || 
       !$this->registerHook('displayBheadBtm') || !$this->registerHook('header') ||
       !Configuration::updateValue('MOD_BLOCKDROPMENU_ITEMS', 'CAT2,CAT3,CAT4') || 
       !Configuration::updateValue('MOD_BLOCKDROPMENU_SEARCH', '0') || 
       !$this->installDB())
      return false;
    return true;
  }

  public function installDb()
  {
    Db::getInstance()->ExecuteS('
    CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'linksdropmenu` (
      `id_link` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
      `new_window` TINYINT( 1 ) NOT NULL,
      `link` VARCHAR( 128 ) NOT NULL
    ) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci;');
    Db::getInstance()->ExecuteS('
    CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'linksdropmenu_lang` (
    `id_link` INT NOT NULL ,
    `id_lang` INT NOT NULL ,
    `label` VARCHAR( 128 ) NOT NULL ,
    INDEX ( `id_link` , `id_lang` )
    ) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci;');
    return true;
  }

  public function uninstall()
  {
    if(!parent::uninstall() || 
       !Configuration::deleteByName('MOD_BLOCKDROPMENU_ITEMS') || 
       !Configuration::deleteByName('MOD_BLOCKDROPMENU_SEARCH') || 
       !$this->uninstallDB())
      return false;
    return true;
  }

  private function uninstallDb()
  {
    Db::getInstance()->ExecuteS('DROP TABLE `'._DB_PREFIX_.'linksdropmenu`');
    Db::getInstance()->ExecuteS('DROP TABLE `'._DB_PREFIX_.'linksdropmenu_lang`');
    return true;
  }

  public function getContent()
  {
    global $cookie;

    if(Tools::isSubmit('submitBlockdropmenu'))
    {
      if(Configuration::updateValue('MOD_BLOCKDROPMENU_ITEMS', Tools::getValue('items')))
        $this->_html .= $this->displayConfirmation($this->l('Settings Updated'));
      else
        $this->_html .= $this->displayError($this->l('Unable to update settings'));
      Configuration::updateValue('MOD_BLOCKDROPMENU_SEARCH', (bool)Tools::getValue('search'));
    }
    if(Tools::isSubmit('submitBlockdropmenuLinks'))
    {
      if(Tools::getValue('link') == '')
      {
        $this->_html .= $this->displayError($this->l('Unable to add this link'));
      }
      else
      {
        dropMenuLinks::add(Tools::getValue('link'), Tools::getValue('label'), Tools::getValue('new_window', 0));
        $this->_html .= $this->displayConfirmation($this->l('The link has been added'));
      }
    }
    if(Tools::isSubmit('submitBlockdropmenuRemove'))
    {
      $id_link = Tools::getValue('id_link', 0);
      dropMenuLinks::remove($id_link);
      Configuration::updateValue('MOD_BLOCKDROPMENU_ITEMS', str_replace(array('LNK'.$id_link.',', 'LNK'.$id_link), '', Configuration::get('MOD_BLOCKDROPMENU_ITEMS')));
      $this->_html .= $this->displayConfirmation($this->l('The link has been removed'));
    }
    $this->_html .= '
    <fieldset>
      <legend><img src="'.$this->_path.'logo.gif" alt="" title="" />'.$this->l('Settings').'</legend>
      <form action="'.$_SERVER['REQUEST_URI'].'" method="post" id="form">
        <div style="display: none">
  			<label>'.$this->l('Items').'</label>
  			<div class="margin-form">
          <input type="text" name="items" id="itemsInput" value="'.Configuration::get('MOD_BLOCKDROPMENU_ITEMS').'" size="70" />
  			</div>
  			</div>

        <div class="clear">&nbsp;</div>
        <table style="margin-left: 130px;">
          <tbody>
            <tr>
              <td>
				        <select multiple="multiple" id="items" style="width: 300px; height: 160px;">';
                $this->makeMenuOption();
                $this->_html .= '</select><br/>
                <br/>
				        <a href="#" id="removeItem" style="border: 1px solid rgb(170, 170, 170); margin: 2px; padding: 2px; text-align: center; display: block; text-decoration: none; background-color: rgb(250, 250, 250); color: rgb(18, 52, 86);">'.$this->l('Remove').' &gt;&gt;</a>
              </td>
              <td style="padding-left: 20px;">
                <select multiple="multiple" id="availableItems" style="width: 300px; height: 160px;">';
                // BEGIN CMS
                $this->_html .= '<optgroup label="'.$this->l('CMS').'">';
                $_cms = CMS::listCms($cookie->id_lang);
                foreach($_cms as $cms)
                  $this->_html .= '<option value="CMS'.$cms['id_cms'].'" style="margin-left:10px;">'.$cms['meta_title'].'</option>';
                $this->_html .= '</optgroup>';
                // END CMS
                // BEGIN SUPPLIER
                $this->_html .= '<optgroup label="'.$this->l('Supplier').'">';
                $suppliers = Supplier::getSuppliers(false, $cookie->id_lang);
                foreach($suppliers as $supplier)
                  $this->_html .= '<option value="SUP'.$supplier['id_supplier'].'" style="margin-left:10px;">'.$supplier['name'].'</option>';
                $this->_html .= '</optgroup>';
                // END SUPPLIER
                // BEGIN Manufacturer
                $this->_html .= '<optgroup label="'.$this->l('Manufacturer').'">';
                $manufacturers = Manufacturer::getManufacturers(false, $cookie->id_lang);
                foreach($manufacturers as $manufacturer)
                  $this->_html .= '<option value="MAN'.$manufacturer['id_manufacturer'].'" style="margin-left:10px;">'.$manufacturer['name'].'</option>';
                $this->_html .= '</optgroup>';
                // END Manufacturer
                // BEGIN Categories
                $this->_html .= '<optgroup label="'.$this->l('Categories').'">';
                $this->getCategoryOption(1, $cookie->id_lang);
                $this->_html .= '</optgroup>';
                // END Categories
                // BEGIN Products
                $this->_html .= '<optgroup label="'.$this->l('Products').'">';
                  $this->_html .= '<option value="PRODUCT" style="margin-left:10px;font-style:italic">'.$this->l('Choose ID product').'</option>';
                $this->_html .= '</optgroup>';
                // END Products
                // BEGIN Menu Top Links
                $this->_html .= '<optgroup label="'.$this->l('Menu Top Links').'">';
                $links = dropMenuLinks::gets($cookie->id_lang);
                foreach($links as $link)
                  $this->_html .= '<option value="LNK'.$link['id_link'].'" style="margin-left:10px;">'.$link['label'].'</option>';
                $this->_html .= '</optgroup>';
                // END Menu Top Links
                $this->_html .= '</select><br />
                <br />
                <a href="#" id="addItem" style="border: 1px solid rgb(170, 170, 170); margin: 2px; padding: 2px; text-align: center; display: block; text-decoration: none; background-color: rgb(250, 250, 250); color: rgb(18, 52, 86);">&lt;&lt; '.$this->l('Add').'</a>			
              </td>
            </tr>
          </tbody>
        </table>
        <div class="clear">&nbsp;</div>
        <script type="text/javascript">
        $(document).ready(function(){
          $("#addItem").click(add);
          $("#availableItems").dblclick(add);
          $("#removeItem").click(remove);
          $("#items").dblclick(remove);
          function add()
          {
            $("#availableItems option:selected").each(function(i){
              var val = $(this).val();
              var text = $(this).text();
              if(val == "PRODUCT")
              {
                val = prompt("'.$this->l('Set ID product').'");
                if(val == null || val == "" || isNaN(val))
                  return;
                text = "'.$this->l('Product ID').' "+val;
                val = "PRD"+val;
              }
              $("#items").append("<option value=\""+val+"\">"+text+"</option>");
            });
            serialize();
            return false;
          }
          function remove()
          {
            $("#items option:selected").each(function(i){
              $(this).remove();
            });
            serialize();
            return false;
          }
          function serialize()
          {
            var options = "";
            $("#items option").each(function(i){
              options += $(this).val()+",";
            });
            $("#itemsInput").val(options.substr(0, options.length - 1));
          }
        });
        </script>
        <label for="s">'.$this->l('Search Bar').'</label>
        <div class="margin-form">
          <input type="checkbox" name="search" id="s" value="1"'.((Configuration::get('MOD_BLOCKDROPMENU_SEARCH')) ? ' checked=""': '').'/>
        </div>
        <p class="center">
          <input type="submit" name="submitBlockdropmenu" value="'.$this->l('  Save  ').'" class="button" />
        </p>
      </form>
    </fieldset><br />';

		$defaultLanguage = intval(Configuration::get('PS_LANG_DEFAULT'));
		$languages = Language::getLanguages();
		$iso = Language::getIsoById($defaultLanguage);
		$divLangName = 'link_label';
    $this->_html .= '
    <fieldset>
      <legend><img src="../img/admin/add.gif" alt="" title="" />'.$this->l('Add Menu Drop Link').'</legend>
      <form action="'.$_SERVER['REQUEST_URI'].'" method="post" id="form">
  			<label>'.$this->l('Label').'</label>
        <div class="margin-form">';
				foreach ($languages as $language)
				{
					$this->_html .= '
					<div id="link_label_'.$language['id_lang'].'" style="display: '.($language['id_lang'] == $defaultLanguage ? 'block' : 'none').';float: left;">
						<input type="text" name="label['.$language['id_lang'].']" id="label_'.$language['id_lang'].'" size="70" value="" />
					</div>';
				 }
				$this->_html .= $this->displayFlags($languages, $defaultLanguage, $divLangName, 'link_label', true);

        $this->_html .= '</div><p class="clear"> </p>
  			<label>'.$this->l('Link').'</label>
  			<div class="margin-form">
          <input type="text" name="link" value="" size="70" />
  			</div>
  			<label>'.$this->l('New Window').'</label>
  			<div class="margin-form">
          <input type="checkbox" name="new_window" value="1" />
  			</div>
        <p class="center">
          <input type="submit" name="submitBlockdropmenuLinks" value="'.$this->l('  Add  ').'" class="button" />
        </p>
  		</form>
    </fieldset><br />';
    
    $this->_html .= '
    <fieldset>
      <legend><img src="../img/admin/details.gif" alt="" title="" />'.$this->l('List Drop Menu Top Link').'</legend>
      <table style="width:100%;">
        <thead>
          <tr>
            <th>'.$this->l('Id Link').'</th>
            <th>'.$this->l('Label').'</th>
            <th>'.$this->l('Link').'</th>
            <th>'.$this->l('New Window').'</th>
            <th>'.$this->l('Action').'</th>
          </tr>
        </thead>
        <tbody>';
        $links = dropMenuLinks::gets($cookie->id_lang);
        foreach($links as $link)
        {
          $this->_html .= '
          <tr>
            <td>'.$link['id_link'].'</td>
            <td>'.$link['label'].'</td>
            <td>'.$link['link'].'</td>
            <td>'.(($link['new_window']) ? $this->l('Yes') : $this->l('No')).'</td>
            <td>
              <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
                <input type="hidden" name="id_link" value="'.$link['id_link'].'" />
          			<input type="submit" name="submitBlockdropmenuRemove" value="'.$this->l('Remove').'" class="button" />
          		</form>
            </td>
          </tr>';
        }
        $this->_html .= '</tbody>
      </table>
  	</fieldset>';
    echo $this->_html;
  }

  private function getMenuItems()
  {
    $items = Configuration::get('MOD_BLOCKDROPMENU_ITEMS');
    $items = explode(',', $items);
    return $items;
  }

  private function makeMenuOption()
  {
    global $cookie;
    foreach($this->getMenuItems() as $item)
    {
      $id = (int)substr($item, 3, strlen($item));
      switch(substr($item, 0, 3))
      {
        case'CAT':
          $this->getCategoryOption($id, $cookie->id_lang, false);
        break;
        case'PRD':
          $product = new Product($id, true, $cookie->id_lang);
          if(!is_null($product->id))
            $this->_html .= '<option value="PRD'.$id.'">'.$product->name.'</option>'.PHP_EOL;
        break;
        case'CMS':
          $cms = CMS::getLinks($cookie->id_lang, array($id));
          if(count($cms))
            $this->_html .= '<option value="CMS'.$id.'">'.$cms[0]['meta_title'].'</option>'.PHP_EOL;
        break;
        case'MAN':
          $manufacturer = new Manufacturer($id, $cookie->id_lang);
          if(!is_null($manufacturer->id))
            $this->_html .= '<option value="MAN'.$id.'">'.$manufacturer->name.'</option>'.PHP_EOL;
        break;
        case'SUP':
          $supplier = new Supplier($id, $cookie->id_lang);
          if(!is_null($supplier->id))
            $this->_html .= '<option value="SUP'.$id.'">'.$supplier->name.'</option>'.PHP_EOL;
        break;
        case'LNK':
          $link = dropMenuLinks::get($id, $cookie->id_lang);
          if(count($link))
            $this->_html .= '<option value="LNK'.$id.'">'.$link[0]['label'].'</option>'.PHP_EOL;
        break;
      }
    }
  }

  private function makeMenu()
  {
		global $cookie, $page_name;
    foreach($this->getMenuItems() as $item)
    {
      $id = (int)substr($item, 3, strlen($item));
      switch(substr($item, 0, 3))
      {
        case'CAT':
          $this->getCategory($id, $cookie->id_lang);
        break;
        case'PRD':
          $selected = ($page_name == 'product' && (Tools::getValue('id_product') == $id)) ? ' class="sfHover"' : '';
          $product = new Product($id, true, $cookie->id_lang);
          if(!is_null($product->id))
            $this->_menu .= '<li'.$selected.'><a href="'.$product->getLink().'"><span class="so"><span class="sc"><span class="si">'.$product->name.'</span></span></span></a></li>'.PHP_EOL;
        break;
        case'CMS':
          $selected = ($page_name == 'cms' && (Tools::getValue('id_cms') == $id)) ? ' class="sfHover"' : '';
          $cms = CMS::getLinks($cookie->id_lang, array($id));
          if(count($cms))
            $this->_menu .= '<li'.$selected.'><a href="'.$cms[0]['link'].'"><span class="so"><span class="sc"><span class="si">'.$cms[0]['meta_title'].'</span></span></span></a></li>'.PHP_EOL;
        break;
        case'MAN':
          $selected = ($page_name == 'manufacturer' && (Tools::getValue('id_manufacturer') == $id)) ? ' class="sfHover"' : '';
          $manufacturer = new Manufacturer($id, $cookie->id_lang);
          if(!is_null($manufacturer->id))
          {
      			if (intval(Configuration::get('PS_REWRITING_SETTINGS')))
      				$manufacturer->link_rewrite = Tools::link_rewrite($manufacturer->name, false);
      			else
      				$manufacturer->link_rewrite = 0;
      			$link = new Link;
            $this->_menu .= '<li'.$selected.'><a href="'.$link->getManufacturerLink($id, $manufacturer->link_rewrite).'"><span class="so"><span class="sc"><span class="si">'.$manufacturer->name.'</span></span></span></a></li>'.PHP_EOL;
          }
        break;
        case'SUP':
          $selected = ($page_name == 'supplier' && (Tools::getValue('id_supplier') == $id)) ? ' class="sfHover"' : '';
          $supplier = new Supplier($id, $cookie->id_lang);
          if(!is_null($supplier->id))
          {
            $link = new Link;
            $this->_menu .= '<li'.$selected.'><a href="'.$link->getSupplierLink($id, $supplier->link_rewrite).'"><span class="so"><span class="sc"><span class="si">'.$supplier->name.'</span></span></span></a></li>'.PHP_EOL;
          }
        break;
        case'LNK':
          $link = dropMenuLinks::get($id, $cookie->id_lang);
          if(count($link))
            $this->_menu .= '<li><a href="'.$link[0]['link'].'"'.(($link[0]['new_window']) ? ' target="_blank"': '').'><span class="so"><span class="sc"><span class="si">'.$link[0]['label'].'</span></span></span></a></li>'.PHP_EOL;
        break;
      }
    }
  }

  private function getCategoryOption($id_category, $id_lang, $children = true)
  {
    $categorie = new Category($id_category, $id_lang);
    if(is_null($categorie->id))
      return;
    if(count(explode('.', $categorie->name)) > 1)
      $name = str_replace('.', '', strstr($categorie->name, '.'));
    else
      $name = $categorie->name;
    $this->_html .= '<option value="CAT'.$categorie->id.'" style="margin-left:'.(($children) ? round(15+(15*(int)$categorie->level_depth)) : 0).'px;">'.$name.'</option>';
    if($children)
    {
      $childrens = Category::getChildren($id_category, $id_lang);
      if(count($childrens))
        foreach($childrens as $children)
          $this->getCategoryOption($children['id_category'], $id_lang);
    }
  }

  private function getCategory($id_category, $id_lang)
  {
    global $page_name;

    $categorie = new Category($id_category, $id_lang);
    if(is_null($categorie->id))
      return;
    $selected = ($page_name == 'category' && ((int)Tools::getValue('id_category') == $id_category)) ? ' class="sfHoverForce"' : '';
    $this->_menu .= '<li'.$selected.'>';
    if(count(explode('.', $categorie->name)) > 1)
      $name = str_replace('.', '', strstr($categorie->name, '.'));
    else
      $name = $categorie->name;
    $this->_menu .= '<a href="'.$categorie->getLink().'"><span class="so"><span class="sc"><span class="si">'.$name.'</span></span></span></a>';
    $childrens = Category::getChildren($id_category, $id_lang);
    if(count($childrens))
    {
      $this->_menu .= '<ul>';
      foreach($childrens as $children)
        $this->getCategory($children['id_category'], $id_lang);
      $this->_menu .= '</ul>';
    }
    $this->_menu .= '</li>';
  }

  public function hooktop($param)
  {
		global $smarty;
		$this->makeMenu();
		$smarty->assign('MENU_SEARCH', Configuration::get('MOD_BLOCKDROPMENU_SEARCH'));
		$smarty->assign('MENU', $this->_menu);
		$smarty->assign('this_path', $this->_path);
    return $this->display(__FILE__, 'blockdropmenu.tpl');
  }

  public function hookDisplayBheadBtm($params){ return $this->hooktop($params);  }

	public function hookHeader($params)
	{
		Tools::addCSS($this->_path.'css/blockdropmenu.css', 'all');
		Tools::addJS(($this->_path).'js/blockdropmenu.js');
	}
}
?>