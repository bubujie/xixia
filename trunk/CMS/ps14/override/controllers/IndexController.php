<?php
/*
* 2007-2013 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
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
*  @copyright  2007-2013 PrestaShop SA
*  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

class IndexController extends IndexControllerCore
{
	public function __construct()
	{
		$this->php_self = Configuration::get('PS_HOMEPAGE_PHP_SELF');
	
		parent::__construct();
	}

    public function setMedia()
    {
        parent::setMedia();
        Tools::addCSS(array(
            _PS_CSS_DIR_.'jquery.cluetip.css' => 'all',
            _THEME_CSS_DIR_.'scenes.css' => 'all'));
    }

	public function process()
	{
		parent::process();
		self::$smarty->assign('HOOK_HOME', Module::hookExec('home'));

        self::$smarty->assign('scenes', Scene::getScenes((int)(1), (int)(self::$cookie->id_lang), true, false));
                        /* Scenes images formats */
                if ($sceneImageTypes = ImageType::getImagesTypes('scenes'))
                {
                    foreach ($sceneImageTypes AS $sceneImageType)
                    {
                        if ($sceneImageType['name'] == 'thumb_scene')
                            $thumbSceneImageType = $sceneImageType;
                        elseif ($sceneImageType['name'] == 'large_scene')
                            $largeSceneImageType = $sceneImageType;
                    }
                    self::$smarty->assign('thumbSceneImageType', isset($thumbSceneImageType) ? $thumbSceneImageType : NULL);
                    self::$smarty->assign('largeSceneImageType', isset($largeSceneImageType) ? $largeSceneImageType : NULL);
                }
	}
/*
	public function displayContent()
	{
		parent::displayContent();
		self::$smarty->display(_PS_THEME_DIR_.'index.tpl');
	}
*/
}
