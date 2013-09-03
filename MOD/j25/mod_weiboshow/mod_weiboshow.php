<?php
/**
 * @package    weiboshow
 * @subpackage Base
 * @author     步步街工作室 {@link www.bubujie.net}
 * @author     Created on 03-Sep-2013
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') || die('=;)');


$greeting = 'Hello World =;)';

?>
<p>
   <?php
   //echo $greeting;
   ?>
</p>
<?php
	printf("".'<iframe width="%s" height="%s" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?' ,
		'100%' ,
		'550'
	);
	echo   "".'language=zh_tw';
	echo   "".'&width=0';
	echo   "".'&height=550';
	echo   "".'&fansRow=2';
	echo   "".'&ptype=1';
	echo   "".'&speed=0';
	echo   "".'&skin=1';
	echo   "".'&isTitle=1';
	echo   "".'&noborder=1';
	echo   "".'&isWeibo=1';
	echo   "".'&isFans=1';
	echo   "".'&uid=1639102400';
	echo   "".'&verifier=a7415e95';
	echo   "".'&colors=d6f3f7,ffffff,666666,0082cb,ecfbfd';
	echo   "".'&dpc=1';
	echo   "".'"></iframe>';
?>