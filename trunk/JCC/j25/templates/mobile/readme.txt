“旧”布局结构



隐藏的侧边栏菜单（IE6与IE7超出部分会显漏出来）
body { overflow:hidden; }
.rowo { margin-left:-300px !important; }
#SOHUCS #SOHU_MAIN .section-cbox-w .cbox-block-w .block-post-w .post-login-w ul { margin: 0 0px 0 0; }
需要对媒体查询的多个部分进行相应处理



// JavaScript Document
jQuery(document).ready(function($) {//or jQuery(function($) {
	var $n1=20;
	var $space=280;
	$('<div id="frame_switch" class="bgc8"><span class="opened d_b">Toggle</span></div>').prependTo('#bbody-mid .wing');
	$sidebar_switcher = $('#frame_switch span');
	$sidebar_switcher.click(function(){
		if($sidebar_switcher.hasClass('opened')){
			$('.rowo .nm,.rowo .nmn').animate({'marginLeft':'+='+($n1 + $space)+'px','marginRight':'-='+($n1 + $space)+'px'}, 'normal',function(){
				$sidebar_switcher.addClass('closed');
			}),
			$sidebar_switcher.removeClass('opened');
		}else if($sidebar_switcher.hasClass('closed')){
			$('.rowo .nm,.rowo .nmn').animate({'marginLeft':'-='+($n1 + $space)+'px','marginRight':'+='+($n1 + $space)+'px'}, 'normal',function(){
				$sidebar_switcher.addClass('opened');
			});
			$sidebar_switcher.removeClass('closed');
		}
	});
});
