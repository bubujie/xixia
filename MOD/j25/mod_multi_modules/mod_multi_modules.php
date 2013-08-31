<?php
/**
 * @copyright	Copyright (C) 2011 bubujie.net.
 * @license     GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

$document = JFactory::getDocument();

// Module inclusion style(s) (chrome(s)) for child modules
$moduleStyle = $params->get('moduleStyle');
//print_r($module);
if (strlen($moduleStyle) == 0) :
    $moduleStyle = 'xhtml';
endif;
$cssOverride = $params->get('cssOverride');
if (strlen($cssOverride) > 0) :
    $document->addStyleDeclaration($cssOverride);
endif;
$position = $params->get('position');

$moduleDebug = $params->get('moduleDebug');

$child_modules = &JModuleHelper::getModules($position);
//print_r($child_modules);
$innerContents = '';
foreach ($child_modules as $child_module) :
    $child_module_options = array('style' => $moduleStyle);
    $innerContents .= JModuleHelper::renderModule($child_module, $child_module_options);
endforeach;



?>

<?php
    if ($moduleDebug == '1') :
?>

<!-- begin: unified module chrome debug -->
<div style="border:1px solid black;background:lightgrey;color:black;font-size:12px;margin-bottom:4px;clear:both;padding:2px;width:100%;font-family:Arial,Helvetica,Sans-serif;text-transform:none">
    Unified module chrome debug<br/>
    <b>Inner modules:</b> <?php echo count($child_modules); ?><br/>
    <b>Output buffer level:</b> <?php echo ob_get_level(); ?><br/>
    <b>Inherit chrome(s):</b> <?php echo $inheritChromes; ?><br/>
    <?php
        if (count($child_modules) == 0) :
            echo 'No modules are within floating container. Put some into module position <b>' . $position . '</b><br/>';
        endif;
    ?>
</div>
<br/>

<?php
    endif;
?>
<?php
echo "".'<ul class="label-list ding">';
foreach ($child_modules as $child_module) :
	echo "".'<li class="label-item ding w-1-'.(count($child_modules)+1).'"><span>'.$child_module->title.'</span></li>';
endforeach;
echo "".'</ul>';
echo "".'<div class="panel-content ding"><ul class="panel-list ding">';
foreach ($child_modules as $child_module) :
	echo "".'<li class="panel-item">'.$child_module->content.'</li>';
endforeach;
echo "".'</ul></div>';
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

<script>
	new Switchable('module-<?php echo $module->id; ?>',{
		eventType:'mouseover',
		autoplay:true,
		triggers:'.label-item',
		panels:'.panel-item',
		lazyDataType:'img'
	});
</script>