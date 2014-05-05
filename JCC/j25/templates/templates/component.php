<?php
/**
 * @package   ##website## Template
 * @author    ##author## ##email##
 * @version   ##version## ##date##
 * @copyright Copyright (C) ##author## 2008 - ##year## ##website##. All Rights Reserved.
 * @license   ##license##
 */
//编码保持
defined('_JEXEC') or die;
?>
<!DOCTYPE>
<html xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<jdoc:include type="head" />
<?php
$doc = JFactory::getDocument();
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/template.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/prettify.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/print.css', $type = 'text/css', $media = 'print');
if ($this->direction == 'rtl') :
	$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/template_rtl.css', $type = 'text/css', $media = 'screen,projection');
endif;
?>
</head>
<body class="contentpane">
<jdoc:include type="message" />
<jdoc:include type="component" />
</body>
</html>
