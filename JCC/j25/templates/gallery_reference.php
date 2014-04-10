<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<body>

<?php

$column = JRequest::getVar('column');
switch($column) :
	case '2' :
		$noimg = JHtml::_('image', 'noimg_500.gif', 'ljj', NULL, true, true);
	break;
	case '3' :
		$noimg = JHtml::_('image', 'noimg_300.gif', 'ljj', NULL, true, true);
	break;
	case '4' :
		$noimg = JHtml::_('image', 'noimg_130.gif', 'ljj', NULL, true, true);
	break;
	case '5' :
		$noimg = JHtml::_('image', 'noimg_100.gif', 'ljj', NULL, true, true);
	break;
	default :
		$noimg = JHtml::_('image', 'noimg_300.gif', 'ljj', NULL, true, true);
	break;
endswitch;

?>

</body>
</html>
