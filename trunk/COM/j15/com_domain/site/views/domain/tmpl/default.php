<?php
/**
 * @version SVN: $Id$
 * @package    Domain
 * @subpackage Views
 * @author     步步街工作室 {@link http://www.bubujie.net}
 * @author     Created on 11-Jan-2013
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') or die('=;)');

$doc =& JFactory::getDocument();
$style = '.suffix{
	margin-left:0;
	padding-left:0;
}
.suffix li{
	float: left;
	list-style: none;
	width:5em;
}'; 
$doc->addStyleDeclaration( $style );
//echo print_r($this->data);
echo "".'<b>';
echo array_search('Hello, World!',(array)$this->data);
echo "".'</b>';
foreach($this->data as $data) :
?>

<h1><?php echo $data->suffix; ?></h1>

<?php
endforeach;
?>

<form action="<?php echo JRoute::_( 'index.php?option=com_domain' ); ?>" method="post" class="">
<div>http://www.<input type="text" value="" name="name" /></div>
<hr />
<ul class="suffix ding">
  <li><input value="cn" name="suffixs[]" type="checkbox" checked="checked" />cn</li>
  <li><input value="ac.cn" name="suffixs[]" type="checkbox" />ac.cn</li>
  <li><input value="bj.cn" name="suffixs[]" type="checkbox" />bj.cn</li>
  <li><input value="sh.cn" name="suffixs[]" type="checkbox" />sh.cn</li>
  <li><input value="tj.cn" name="suffixs[]" type="checkbox" />tj.cn</li>
  <li><input value="cq.cn" name="suffixs[]" type="checkbox" />cq.cn</li>
  <li><input value="he.cn" name="suffixs[]" type="checkbox" />he.cn</li>
  <li><input value="sx.cn" name="suffixs[]" type="checkbox" />sx.cn</li>
  <li><input value="nm.cn" name="suffixs[]" type="checkbox" />nm.cn</li>
  <li><input value="ln.cn" name="suffixs[]" type="checkbox" />ln.cn</li>
  <li><input value="jl.cn" name="suffixs[]" type="checkbox" />jl.cn</li>
  <li><input value="hl.cn" name="suffixs[]" type="checkbox" />hl.cn</li>
  <li><input value="js.cn" name="suffixs[]" type="checkbox" />js.cn</li>
  <li><input value="zj.cn" name="suffixs[]" type="checkbox" />zj.cn</li>
  <li><input value="ah.cn" name="suffixs[]" type="checkbox" />ah.cn</li>
  <li><input value="fj.cn" name="suffixs[]" type="checkbox" />fj.cn</li>
  <li><input value="jx.cn" name="suffixs[]" type="checkbox" />jx.cn</li>
  <li><input value="sd.cn" name="suffixs[]" type="checkbox" />sd.cn</li>
  <li><input value="ha.cn" name="suffixs[]" type="checkbox" />ha.cn</li>
  <li><input value="hb.cn" name="suffixs[]" type="checkbox" />hb.cn</li>
  <li><input value="hn.cn" name="suffixs[]" type="checkbox" />hn.cn</li>
  <li><input value="gd.cn" name="suffixs[]" type="checkbox" />gd.cn</li>
  <li><input value="gx.cn" name="suffixs[]" type="checkbox" />gx.cn</li>
  <li><input value="hi.cn" name="suffixs[]" type="checkbox" />hi.cn</li>
  <li><input value="sc.cn" name="suffixs[]" type="checkbox" />sc.cn</li>
  <li><input value="gz.cn" name="suffixs[]" type="checkbox" />gz.cn</li>
  <li><input value="yn.cn" name="suffixs[]" type="checkbox" />yn.cn</li>
  <li><input value="xz.cn" name="suffixs[]" type="checkbox" />xz.cn</li>
  <li><input value="sn.cn" name="suffixs[]" type="checkbox" />sn.cn</li>
  <li><input value="gs.cn" name="suffixs[]" type="checkbox" />gs.cn</li>
  <li><input value="qh.cn" name="suffixs[]" type="checkbox" />qh.cn</li>
  <li><input value="nx.cn" name="suffixs[]" type="checkbox" />nx.cn</li>
  <li><input value="xj.cn" name="suffixs[]" type="checkbox" />xj.cn</li>
  <li><input value="tw.cn" name="suffixs[]" type="checkbox" />tw.cn</li>
  <li><input value="hk.cn" name="suffixs[]" type="checkbox" />hk.cn</li>
  <li><input value="mo.cn" name="suffixs[]" type="checkbox" />mo.cn</li>
</ul>
<hr />
<div><input type="submit" value="<?php echo JText::_('Submit'); ?>" /></div>
</form>
<?php
function getDomainInfo($domain,$whoisServer){
	$conn = fsockopen($whoisServer,43);
	// 徐判断是否连接
	// Send the requested doman name
	fputs($conn, $domain."\r\n");

	// Read and store the server response
	$response = '';
	while(!feof($conn)) {
		$response .= fgets($conn,128); 
	}
	// Close the connection
	fclose($conn);
	// 已注册
	if (!substr_count($response, ':')) :
		//对确定注册或确定未注册的域名优先处理
		//对意外的提示语句进行单独处理和翻译
		switch (trim($response)) {
			case "no matching record.":
				return JText::_('no matching record.');
			break;
			case "Queried interval is too short.":
				return JText::_('Queried interval is too short.');
			break;
			case "the domain you want to register is reserved.":
				return JText::_('the domain you want to register is reserved.');
			break;
			//未定义的输出语句项目直接输出
			default:
				return $response;
			break;
		}
	endif;
	//域名信息为复句时
	return $response;
}
//
$name = JRequest::getVar('name');
$suffixs = JRequest::getVar('suffixs');
//
if($suffixs && $name){
	echo "".'<dl>';
	foreach($suffixs as $key=>$suffix){
		echo "\n  ".'<dt>'.$name.'.'.$suffix.'</dt>';
		$info = "".getDomainInfo($name.'.'.$suffix, 'whois.cnnic.net.cn');
		echo "\n  ".'<dd><pre>'.$info.'</pre></dd>';
	}
	echo "\n".'</dl>';
}

?>
