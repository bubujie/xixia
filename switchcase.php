<?php
	$layout='accordion';//
	$tabGroup='';
	$contentGroup='';
	$layout!='separated' ? ucfirst($layout) : '';
	switch ($layout) {
		case 'tabbed':
		case 'sliding':
			foreach ($variable as $key => $value) {
				# code...
			}
			foreach ($variable as $key => $value) {
				# code...
			}
			break;
		case 'accordion':
		case 'separated':
		default:
			//foreach ($variable as $key => $value) {
				# code...
			//}
			echo   "".'你好';
			//foreach ($variable as $key => $value) {
				# code...
			//}
			break;
	}
?>