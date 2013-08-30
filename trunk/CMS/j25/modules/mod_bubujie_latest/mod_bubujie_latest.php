<?php
/**
 * @package   http://www.bubujie.net Module
 * @author    BuBuJie.Net bubujie@gmail.com
 * @version   beta 2012-06-07
 * @copyright Copyright (C) BuBuJie.Net 2008 - 2012 http://www.bubujie.net. All Rights Reserved.
 * @license   步步街商业客户单域名授权，违反必究！
 */

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

$list = modBubujieLatestHelper::getList($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_bubujie_latest', $params->get('layout', 'default'));
