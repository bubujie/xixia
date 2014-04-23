<?php
/**
 * @package		Bubujie.Studio
 * @subpackage	mod_multiple_modules
 * @copyright	Copyright (C) 步步街工作室 2008 - 2012. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// Module inclusion style(s) (chrome(s)) for child modules
$moduleStyle = $params->get('moduleStyle');
//print_r($module);
//需排除
if (strlen($moduleStyle) == 0) :
    $moduleStyle = 'xhtml';
endif;




$cssOverride = $params->get('cssOverride');
if (strlen($cssOverride) > 0) :
    $doc->addStyleDeclaration($cssOverride);
endif;
$position = $params->get('position');

$moduleDebug = $params->get('moduleDebug');

$child_modules = &JModuleHelper::getModules($position);
//无法准确删除
//unset($child_modules[array_search('mod_multiple_modules' , $child_modules)]);
//print_r($child_modules);
$innerContents = '';
foreach ($child_modules as $child_module) :
	$child_module_options = array('style' => $moduleStyle,'showtitle' => 0);
	$innerContents .= JModuleHelper::renderModule($child_module, $child_module_options);
endforeach;
//print_r($innerContents);
	//print_r($child_modules[array_search('mod_multiple_modules' , $child_modules)]);



$split1 = $params->get('split1',1);
$split2 = $params->get('split2',1);
$split3 = $params->get('split3',1);
$split = array(
	's1'  => array('1'),
	's2'  => array('1-2', '1-2'),
	's3'  => array('2-3', '1-3'),
	's4'  => array('1-3', '2-3'),
	's5'  => array('3-4', '1-4'),
	's6'  => array('1-4', '3-4'),
	's7'  => array('1-3', '1-3', '1-3'),
	's8'  => array('1-2', '1-4', '1-4'),
	's9'  => array('1-4', '1-2', '1-4'),
	's10' => array('1-4', '1-4', '1-2'),
	's11' => array('1-4', '1-4', '1-4', '1-4'),
	's12' => array('1-5', '1-5', '1-5', '1-5', '1-5')
);
echo $split['s'.$split1][0];
echo '<hr />';
echo $split['s'.$split2][0];
echo '<hr />';
$max =count($child_modules);
$numGroup1 = count($split['s'.$split1]);
$numGroup2 = count($split['s'.$split2]);
$numGroup3 = count($split['s'.$split3]);

		$limit = $numGroup1;
		for ($i = 0; $i < $limit && $i < $max; $i++)
		{
			$group1_items[$i] = &$child_modules[$i];
		}
echo   "".'<pre>';
//print_r($group1_items);
echo   "".'</pre>';
		$limit = $numGroup1 + $numGroup2;
		for ($i = $numGroup1; $i < $limit && $i < $max; $i++)
		{
			$group2_items[$i] = &$child_modules[$i];
		}
echo   "".'<pre>';
//print_r($group2_items);
echo   "".'</pre>';
		$limit = $numGroup1 + $numGroup2 + $numGroup3;
		for ($i = $numGroup1 + $numGroup2; $i < $limit && $i < $max; $i++)
		{
			$group3_items[$i] = &$child_modules[$i];
		}
echo   "".'<pre>';
//print_r($group3_items);
echo   "".'</pre>';


$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_multiple_modules', $params->get('layout', 'default'));
?>
