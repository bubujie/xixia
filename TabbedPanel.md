
```
// 此函数会在Tabbed风格的位置按相应模块的数量n反复调用相同的次数，不同于普通的循环输出，它会取消前n-1次输出，而在第n次才整体输出全部内容。
function modChrome_Tabbed($module, $params, $attribs)
{
	// 后台无id属性设置，所以$area恒为1
	$area = isset($attribs['id']) ? (int) $attribs['id'] :'1';
	$area = 'area-'.$area;
	// 定义模块计数与模块数组
	static $modulecount;
	static $modules;
	// 某位置无模块则：将$modules定义为空数组
	if ($modulecount < 1) {
		$modulecount = count(JModuleHelper::getModules($attribs['name']));
		$modules = array();
	// 在第n次调用时输出：
	}
	if($modulecount == 1) {
		// stdClass()基类可以调用全部属性
		$temp = new stdClass();
		$temp->content = $module->content;
		$temp->title = $module->title;
		$temp->params = $module->params;
		$temp->id=$module->id;
		$modules[] = $temp;
		// TabsPanle外套
		echo "\n<!-- # # # TabbedPanle # # # -->";
		printf("\n".'<div id="%s" class="tab list jx">',
			$area
		);
		echo "\n  ".'<ul>';
		$counter=0;
		// 循环输出头部
		foreach($modules as $rendermodule) {
			$counter ? $activeClass='' : $activeClass=' class="active"';
			// Tab外套
			printf("\n    ".'<li%s><a href="#" id="link_%s">%s</a>',
				$activeClass,
				$rendermodule->id,
				$rendermodule->title
			);	
			$counter ++;
			echo "\n      ".'<ul>';
			printf("\n        ".'<li tabindex="-1" class="" id="module_%s">',
				$rendermodule->id
			);
			// 输出正文
			echo "\n<!-- # # # module # # # -->";
			echo $rendermodule->content;
			echo "\n<!-- # # # /module # # # -->";
			// Tab外套
			echo "\n        ".'</li>';
			echo "\n      ".'</ul>';
			echo "\n    ".'</li>';
		}
		// TabsPanle外套
		echo "\n  ".'</ul>';
		$modulecount--;;
		echo "\n".'</div>';
		echo "\n<!-- # # # /TabbedPanle # # # -->";
	} else {
		// 前第n<n-1次调用本函数不做输出，只将数组赋值给静态变量$modules[]用于最后一次调用时的输出，并计算剩余调用次数
		$temp = new stdClass();
		$temp->content = $module->content;
		$temp->params = $module->params;
		$temp->title = $module->title;
		$temp->id = $module->id;
		$modules[] = $temp;
		$modulecount--;
	}
}
```
输出
```
<!-- # # # TabbedPanle # # # -->
<div id="area-1" class="tab list jx">
  <ul>
    <li class="active"><a href="#" id="link_16">Polls</a>
      <ul>
        <li tabindex="-1" class="" id="module_16"> 
          <!-- # # # module # # # --> 
          
          <!-- # # # /module # # # --> 
        </li>
      </ul>
    </li>
    <li><a href="#" id="link_21">Who's Online</a>
      <ul>
        <li tabindex="-1" class="" id="module_21"> 
          <!-- # # # module # # # --> 
          当前有&nbsp;1名访客&nbsp;在线 
          <!-- # # # /module # # # --> 
        </li>
      </ul>
    </li>
    <li><a href="#" id="link_38">Advertisement</a>
      <ul>
        <li tabindex="-1" class="" id="module_38"> 
          <!-- # # # module # # # --> 
          
          <!-- # # # /module # # # --> 
        </li>
      </ul>
    </li>
  </ul>
</div>
<!-- # # # /TabbedPanle # # # -->
```