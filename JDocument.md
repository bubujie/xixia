# JDocument #

### JDocument::addStyle ###

```
$doc =& JFactory::getDocument();
$doc->addScript("http://www.example.com/js/myscript.js");
```

此代码的输出为：

```
<script type="text/javascript" src="http://www.example.com/js/myscript.js"></script>
```

### JDocument::addStyleDeclaration ###

```
$content = 'alert( \'Hello Joomla!\' )';
$doc =& JFactory::getDocument();
$doc->addScriptDeclaration( $content );
```