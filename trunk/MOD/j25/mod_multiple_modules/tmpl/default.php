<?php
/**
 * @package		Bubujie.Studio
 * @subpackage	mod_multiple_modules
 * @copyright	Copyright (C) 步步街工作室 2008 - 2012. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

$doc = JFactory::getDocument();
$doc->addScript(JURI::base(true).'/media/mod_multiple_modules/js/mod_multiple_modules.js');
$doc->addStylesheet(JURI::base(true).'/media/mod_multiple_modules/css/mod_multiple_modules.css');
// Module inclusion style(s) (chrome(s)) for child modules
	if ($moduleDebug == '1') :
?>

<!-- begin: unified module chrome debug -->
<div>
    Unified module chrome debug<br/>
    <b>Inner modules:</b> <?php echo count($child_modules); ?><br/>
    <b>Output buffer level:</b> <?php echo ob_get_level(); ?><br/>
    <b>Module chrome(s):</b> <?php //echo $moduleChromes; ?><br/>
    <?php
        if (count($child_modules) == 0) :
            echo 'No modules are within floating container. Put some into module position <b>' . $position . '</b><br/>';
        endif;
    ?>
</div>

<?php
    endif;
?>
<?php
if(!empty($child_modules)) :
	echo   "".'<div class="VTabbedPanels" style="">';



	//echo   "".'<pre>';
	//print_r($innerContents);
	//echo   "".'</pre>';


$innerContent = '';
if ($params->get('presentation_style')!='plain') :
	echo JHtml::_($params->get('presentation_style').'.start', 'tab_group_id');
	foreach ($child_modules as $key => $child_module) :
		echo JHtml::_($params->get('presentation_style').'.panel', $child_module->title, 'tab_'.$key);
		$child_module_options = array('style' => $moduleStyle, 'showtitle' => 0);
		$innerContent = JModuleHelper::renderModule($child_module, $child_module_options);
		//echo $child_module->content;
		echo $innerContent;
	endforeach;
	echo JHtml::_($params->get('presentation_style').'.end');
else :
	//echo   "".'<div class="" style="width:100%;">';
	echo   "".'<ul class="split">';
	$i=0;
	foreach ($group1_items as $key => $child_module) :
		$child_module_options = array('style' => $moduleStyle,);
		$innerContent = JModuleHelper::renderModule($child_module, $child_module_options);
		//echo $child_module->content;
		echo   "".'<li class="s-' . $split['s'.$split1][$i] . ' ' . $key . '">';
		echo   "".'<div>';
		//echo $child_module->title;
		echo $innerContent;
		echo   "".'</div>';
		echo   "".'</li>';
		$i++;
	endforeach;
	echo   "".'</ul>';
	echo   "".'<ul class="split">';
	$i=0;
	foreach ($group2_items as $key => $child_module) :
		$child_module_options = array('style' => $moduleStyle);
		$innerContent = JModuleHelper::renderModule($child_module, $child_module_options);
		//echo $child_module->content;
		echo   "".'<li class="s-' . $split['s'.$split2][$i] . ' ' . $key . '">';
		echo   "".'<div>';
		//echo $child_module->title;
		echo $innerContent;
		echo   "".'</div>';
		echo   "".'</li>';
		$i++;
	endforeach;
	echo   "".'</ul>';
endif;

/*
	echo JHtml::_('sliders.start', 'helloworld-slider');
	foreach ($child_modules as $key => $child_module) :
		echo JHtml::_('sliders.panel',$child_module->title, 'slide_'.$key);
		echo $child_module->content;
	endforeach;
	echo JHtml::_('sliders.end');
*/
	//echo   "\n".'  </div>';
	echo   "\n".'</div>';
endif;
?>
<?php 
/*
    if (strlen($params->get('prelude')) > 0)
        echo $params->get('prelude');

    echo $innerContents;

    if (strlen($params->get('finale')) > 0)
        echo $params->get('finale');
*/
?>
<?php
$style ='.TabbedPanels{margin:0px;padding:0px;float:left;clear:none;width:100%}.TabbedPanelsTabGroup{margin:0px;padding:0px}.TabbedPanelsTab{position:relative;top:1px;float:left;padding:4px 10px;margin:0px 1px 0px 0px;font:bold 0.7em sans-serif;background-color:#DDD;list-style:none;border-left:solid 1px #CCC;border-bottom:solid 1px #999;border-top:solid 1px #999;border-right:solid 1px #999;-moz-user-select:none;-khtml-user-select:none;cursor:pointer}.TabbedPanelsTabHover{background-color:#CCC}.TabbedPanelsTabSelected{background-color:#EEE;border-bottom:1px solid #EEE}.TabbedPanelsTab a{color:black;text-decoration:none}.TabbedPanelsContentGroup{clear:both;border-left:solid 1px #CCC;border-bottom:solid 1px #CCC;border-top:solid 1px #999;border-right:solid 1px #999;background-color:#EEE}.TabbedPanelsContent{padding:4px}.VTabbedPanels .TabbedPanelsTabGroup{float:left;width:10em;height:20em;background-color:#EEE;position:relative;border-top:solid 1px #999;border-right:solid 1px #999;border-left:solid 1px #CCC;border-bottom:solid 1px #CCC}.VTabbedPanels .TabbedPanelsTab{float:none;margin:0px;border-top:none;border-left:none;border-right:none}.VTabbedPanels .TabbedPanelsTabSelected{background-color:#EEE;border-bottom:solid 1px #999}.VTabbedPanels .TabbedPanelsContentGroup{clear:none;float:left;padding:0px;width:30em;height:20em}';
//$doc->addStyleDeclaration( $style );
?>
