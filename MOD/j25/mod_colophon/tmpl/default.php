<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_footer
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
?>
<div class="footer1<?php echo $moduleclass_sfx ?>"><?php echo $lineone; ?></div>
<div class="footer2<?php echo $moduleclass_sfx ?>"><?php echo JText::_('MOD_FOOTER_LINE2'); ?></div>
    <footer id="footer">
        <p module="Layout_statelogoff">
            <a href="/member/login.html">登录</a>
            <a href="/myshop/recent_list.html">最近浏览过的商品</a>
            <a href="/board/free/list.html?board_no=3">FAQ</a>
            <a href="/board/index.html">留言板</a>
            <a href="#none" onclick="isPCver();">PC版</a>
        </p>
        <p module="Layout_statelogon">
            <a href="{$action_logout}">退出</a>
            <a href="/myshop/recent_list.html">最近浏览过的商品</a>
            <a href="/board/free/list.html?board_no=3">FAQ</a>
            <a href="/board/index.html">留言板</a>
            <a href="#none" onclick="isPCver();">PC版</a>
        </p>
        <address module="Layout_footer">
            店铺名: {$mall_name} 电话 : <a href="tel:{$phone}" class="tel">{$phone}</a><br>
            地址: {$mall_zipcode} {$mall_addr1} {$mall_addr2}<br>
            营业执照号码: {$company_regno} 通信商品销售业 举报: {$network_regno}<br>
            负责人: <a href="mailto:{$email}">{$president_name}</a> 个人信息管理负责人: <a href="mailto:{$cpo_email}">{$cpo_name}</a><br>
            主机托管提供: 鑫潽瑞网络(株)
        </address>
    </footer>
<style type="text/css">
				
#footer { margin:50px 0 0; }
/*#footer p { padding:0 0 8px; text-align:center; font-size:0; line-height:0; }*/
#footer p a { font-size:11px; line-height:14px; letter-spacing:-1px; color:#212530; font-weight:bold; padding:0 13px; border-left:1px solid #212530; } 
#footer p a:first-child { border:0 none; padding-left:0; }
#footer p a:last-child { padding-right:0; }
#footer address { padding:15px 10px; font-size:11px; line-height:1.5em; color:#434447; background:#dfdfdf; }
#footer address a { color:#434447; }
#footer .tel { 
    position:relative; padding:2px 6px 1px 14px; border:1px solid #9e9e9e; background-color:#ebebeb; 
    background: -webkit-linear-gradient(bottom, #f8f8f8 , #eff0f1); /* For Safari */
    background: -o-linear-gradient(bottom, #f8f8f8, #eff0f1); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(bottom, #f8f8f8, #eff0f1); /* For Firefox 3.6 to 15 */
    background: linear-gradient(to bottom, #f8f8f8 , #eff0f1); /* Standard syntax */
    box-shadow: inset 0px 1px 1px #fff;
    border-radius:3px; 
}
#footer .tel:before { content:""; position:absolute; left:5px; top:50%; width:8px; height:8px; margin-top:-3px; background:url("http://img.echosting.cafe24.com/design/skin/mobile/ico_footer_tel.png") no-repeat 0 0; background-size:100% 100%; }



.xans-layout-logobottom { float:left; width:204px; padding:30px 0 0;}
.xans-layout-logobottom img { max-width:195px; }
.xans-layout-footer { float:left; width:756px; }
.xans-layout-footer .utilMenu { overflow:hidden; zoom:1; height:20px; }
.xans-layout-footer .utilMenu li { float:left; padding:0 8px 0 10px; font-size:12px; background:url("http://img.echosting.cafe24.com/design/skin/default_cn/layout/bg_footer_util.gif") 0 1px no-repeat; }
.xans-layout-footer .utilMenu li.home { padding-left:0; background:none; }
.xans-layout-footer .utilMenu li a { color:#7a7a7a; }
.xans-layout-footer .address { padding:13px 0 0; color:#b6b6b6; font-size:12px; line-height:20px; border-top:3px solid #dedcdc; }
.xans-layout-footer .address span { padding:0 25px 0 0; }
.xans-layout-footer .address span a,
.xans-layout-footer .address span a:hover { color:#999; }
.xans-layout-footer .address .copyright { color:#7a7a7a; }
.xans-layout-footer .top { position:absolute; right:0; top:0; }
.xans-layout-footer .hosting { position:absolute; right:0; bottom:8px; }

</style>
    <div id="footer">
        <h1 module="Layout_LogoBottom" class="xans-layout-logobottom">
            <!--@css(/css/module/layout/logobottom.css)-->
            <a href="/index.html"><img src="" alt="{$mall_name}" /></a>
        </h1>

        <div module="Layout_footer" class="xans-layout-footer">
            <!--@css(/css/module/layout/footer.css)-->
            <ul class="utilMenu">
                <li class="home"><a href="/index.html">首页</a></li>
                <li><a href="/shopinfo/company.html">公司简介</a></li>
                <li><a href="/member/agreement.html">利用条款</a></li>
                <li><a href="/member/privacy.html"><strong>个人信息保护方针</strong></a></li>
                <li><a href="/shopinfo/guide.html">利用指南</a></li>
            </ul>
            <div class="address">
                <p>
                    <span>法人名(商号): {$company_name} </span> <span>法人代表(姓名): {$president_name}</span> <span>营业执照号码: [{$company_regno}]</span> <span>通讯产品销售业 举报 {$network_regno}</span> <span>{$biz_no_link}</span> <br />
                    <span>电话: {$phone}</span> <span>传真: {$fax}</span> <span>地址: {$mall_zipcode} {$mall_addr1} {$mall_addr2}</span><br />
                    <span>个人信息管理负责人: <a href="mailto:{$cpo_email}">{$cpo_name}({$cpo_email})</a></span><br />
                    <span>Contact <strong><a href="mailto:{$email}">{$email}</a></strong> for more information.</span>
                </p>
                <p class="copyright">Copyright &copy; 2010 <strong>{$mall_name}</strong> All rights reserved.</p>
            </div>
            <p class="top"><a href="#header" title="回到首页"><img src="http://img.echosting.cafe24.com/design/skin/default_cn/common/btn_pagetop.gif" alt="top" /></a></p>
            <p class="hosting"><img src="http://img.echosting.cafe24.com/design/skin/default_cn/common/logo_cafe24.png" alt="hosting by cafe24 鑫普瑞网络(株）" /></p>
        </div>
    </div>
