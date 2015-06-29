
```
function modChrome_tuding($module, &$params, &$attribs)
{
	$headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
	if (!empty ($module->content)) :
		echo "\n<!-- # # # module # # # -->";
		echo "\n<div class=\"module mod".$params->get('moduleclass_sfx')."\">";
		echo "\n  <div class=\"top\">";
		if ($module->showtitle) :
			echo "\n    <h".$headerLevel."><span>".$module->title."</span></h".$headerLevel.">";
		endif;
		echo "\n  </div>";
		echo "\n  <div class=\"mid\">"; 
		echo $module->content;
		echo "\n  </div>";
		echo "\n  <div class=\"btm\"></div>";
		echo "\n</div>";
		echo "\n<!-- # # # /module # # # -->";
	endif;
}
```
输出
```
<div class="module mod_menu"> 
  <div class="top"> 
    <h3><span>Main Menu</span></h3> 
  </div> 
  <div class="mid"> 
  </div> 
  <div class="btm"></div> 
</div> 
<!-- # # # /module # # # --> 
```