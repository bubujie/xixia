<?php
/**
 * @copyright	Copyright (C) 2011 JTricks.com.
 * @license     GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

$document = &JFactory::getDocument();

// Module inclusion style(s) (chrome(s)) for child modules
$moduleStyle = $params->get('moduleStyle');
if (strlen($moduleStyle) == 0)
    $moduleStyle = 'xhtml';

$cssOverride = $params->get('cssOverride');
if (strlen($cssOverride) > 0)
    $document->addStyleDeclaration($cssOverride);

$position = $params->get('position');

$moduleDebug = $params->get('moduleDebug');

$child_modules = &JModuleHelper::getModules($position);
$innerContents = '';
foreach ($child_modules as $child_module)
{
    $child_module_options = array('style' => $moduleStyle);
    $innerContents .= JModuleHelper::renderModule($child_module, $child_module_options);
}

?>
<!-- BEGIN: Unified module chrome (www.jtricks.com) -->
<?php
    if ($moduleDebug == '1')
    {
?>

<!-- begin: unified module chrome debug -->
<div style="border:1px solid black;background:lightgrey;color:black;font-size:12px;margin-bottom:4px;clear:both;padding:2px;width:100%;font-family:Arial,Helvetica,Sans-serif;text-transform:none">
    Unified module chrome debug<br/>
    <b>Inner modules:</b> <?php echo count($child_modules); ?><br/>
    <b>Output buffer level:</b> <?php echo ob_get_level(); ?><br/>
    <b>Inherit chrome(s):</b> <?php echo $inheritChromes; ?><br/>
    <?php
        if (count($child_modules) == 0)
        {
            echo 'No modules are within floating container. Put some into module position <b>' . $position . '</b><br/>';
        }
    ?>
</div>
<br/>
<!-- end: unified module chrome debug -->

<?php
    }
?>
<?php 

    if (strlen($params->get('prelude')) > 0)
        echo $params->get('prelude');

    echo $innerContents;

    if (strlen($params->get('finale')) > 0)
        echo $params->get('finale');

?>
<!-- END: Unified module chrome (www.jtricks.com) -->
