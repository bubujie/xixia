<?php
/**
 * @package		Bubujie.Studio
 * @subpackage	mod_weiboshow
 * @copyright	Copyright (C) 步步街工作室 2008 - 2012. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

$width		= htmlspecialchars($params->get('width'));
$height		= htmlspecialchars($params->get('height'));
$uid		= htmlspecialchars($params->get('uid'));
$verifier	= htmlspecialchars($params->get('verifier'));
$fansRow	= $params->get('fansRow');
$ptype		= $params->get('ptype');
$skin		= $params->get('skin');
$language	= $params->get('language');
$speed		= $params->get('speed');
$style		= $params->get('style');
$isTitle	= $params->get('isTitle');
$noborder	= $params->get('noborder');
$isWeibo	= $params->get('isWeibo');
$isFans		= $params->get('isFans');
?>
<?php
	printf("".'<iframe width="%s" height="%s" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?' ,
		'100%' ,
		'550'
	);
	echo   "".'language='.$language;
	echo   "".'&width=0';
	echo   "".'&height=550';
	echo   "".'&fansRow='.$fansRow;
	echo   "".'&ptype='.$ptype;
	echo   "".'&speed='.$speed;
	echo   "".'&skin='.$skin;
	echo   "".'&isTitle='.$isTitle;
	echo   "".'&noborder='.$noborder;
	echo   "".'&isWeibo='.$isWeibo;
	echo   "".'&isFans='.$isFans;
	echo   "".'&uid='.$uid;
	echo   "".'&verifier='.$verifier;
	//echo   "".'&colors=d6f3f7,ffffff,666666,0082cb,ecfbfd';
	echo   "".'&dpc=1';
	echo   "".'"></iframe>';
?>