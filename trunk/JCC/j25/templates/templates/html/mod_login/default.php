<?php
/**
 * @package   ##website## Template
 * @author    ##author## ##email##
 * @version   ##version## ##date##
 * @copyright Copyright (C) ##author## 2008 - 2012 ##website##. All Rights Reserved.
 * @license   ##license##
 */

// no direct access
defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');

if ($type == 'logout') :
	printf("\n".'<form action="%s" method="post" id="login-form">' ,
		JRoute::_('index.php', true, $params->get('usesecure'))
	);
	if ($params->get('greeting')) :
		echo   "\n  ".'<div class="login-greet">';
		if($params->get('name') == 0) :
			echo   "".JText::sprintf('MOD_LOGIN_HINAME', htmlspecialchars($user->get('name')));
		else :
			echo   "".JText::sprintf('MOD_LOGIN_HINAME', htmlspecialchars($user->get('username')));
		endif;
		echo   "".'</div>';
	endif;
	echo   "\n  ".'<div class="logout-btn">';
    printf("\n    ".'<input type="submit" name="Submit" class="button" value="%s" />' ,
    	JText::_('JLOGOUT')
    );
    echo   "\n    ".'<input type="hidden" name="option" value="com_users" />';
    echo   "\n    ".'<input type="hidden" name="task" value="user.logout" />';
    printf("\n    ".'<input type="hidden" name="return" value="%s" />' ,
    	$return
    );
	echo   "\n    ".JHtml::_('form.token');
	echo   "\n  ".'</div>';
	echo   "\n".'</form>';
else :
	printf("\n".'<form action="%s" method="post" id="login-form" >' ,
		JRoute::_('index.php', true, $params->get('usesecure'))
	);
	if ($params->get('pretext')):
		echo   "\n  ".'<div class="pretext">';
		printf("\n    ".'<p>%s</p>' ,
			$params->get('pretext')
	    );
		echo   "\n  ".'</div>';
	endif;
	echo   "\n  ".'<fieldset class="userdata">';
	echo   "\n    ".'<dl>';
	printf("\n      ".'<dt id="login-uid"><label for="uid">%s</label></dt>' ,
		JText::_('MOD_LOGIN_VALUE_USERNAME')
	);
	echo   "\n      ".'<dd><input id="uid" type="text" name="username" class="inputbox"  size="18" /></dd>';
	printf("\n      ".'<dt id="login-upw"><label for="upw">%s</label><dt>' ,
		JText::_('JGLOBAL_PASSWORD')
	);
	echo   "\n      ".'<dd><input id="upw" type="password" name="password" class="inputbox" size="18"  /></dd>';
    echo   "\n    ".'</dl>';
	if (JPluginHelper::isEnabled('system', 'remember')) :
		echo   "\n    ".'<p id="login-keep">';
		echo   "\n      ".'<input id="keep" type="checkbox" name="remember" class="inputbox" value="yes"/>';
		printf("\n      ".'<label for="keep">%s</label>' ,
			JText::_('MOD_LOGIN_REMEMBER_ME')
		);
		echo   "\n    ".'</p>';
	endif;
	echo   "\n    ".'<div class="login-btn">';
	printf("\n      ".'<input type="submit" name="Submit" class="button" value="%s" />' ,
		JText::_('JLOGIN')
	);
	echo   "\n      ".'<input type="hidden" name="option" value="com_users" />';
	echo   "\n      ".'<input type="hidden" name="task" value="user.login" />';
	printf("\n      ".'<input type="hidden" name="return" value="%s" />' ,
		$return
	);
	echo   "\n      ".JHtml::_('form.token');
	echo   "\n    ".'</div>';
	echo   "\n  ".'</fieldset>';
	echo   "\n  ".'<ul>';
	printf("\n    ".'<li><a href="%s">%s</a></li>' ,
		JRoute::_('index.php?option=com_users&view=reset') ,
		JText::_('MOD_LOGIN_FORGOT_YOUR_PASSWORD')
	);
	// 可选的项目
	printf("\n    ".'<li><a href="%s">%s</a></li>' ,
		JRoute::_('index.php?option=com_users&view=remind') ,
		JText::_('MOD_LOGIN_FORGOT_YOUR_USERNAME')
	);
	$usersConfig = JComponentHelper::getParams('com_users');
	if ($usersConfig->get('allowUserRegistration')) :
		printf("\n    ".'<li><a href="%s">%s</a></li>' ,
			JRoute::_('index.php?option=com_users&view=registration') ,
			JText::_('MOD_LOGIN_REGISTER')
		);
	endif;
	echo   "\n  ".'</ul>';
	if ($params->get('posttext')):
		echo   "\n  ".'<div class="posttext">';
		printf("\n    ".'<p>%s</p>' ,
			$params->get('posttext')
		);
		echo   "\n  ".'</div>';
	endif;
	echo   "\n".'</form>';
endif;
?>
