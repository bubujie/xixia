���ɡ����ֽṹ



���صĲ�����˵���IE6��IE7�������ֻ���©������
body { overflow:hidden; }
.rowo { margin-left:-300px !important; }
#SOHUCS #SOHU_MAIN .section-cbox-w .cbox-block-w .block-post-w .post-login-w ul { margin: 0 0px 0 0; }
��Ҫ��ý���ѯ�Ķ�����ֽ�����Ӧ����



// JavaScript Document
jQuery(document).ready(function($) {//or jQuery(function($) {
	$('<div id="frame_switch" class="bgc8"><span class="opened d_b">Toggle</span></div>').prependTo('#bbody-mid .wing');
	$sidebar_switcher = $('#frame_switch span');
	$sidebar_switcher.click(function(){
		if($sidebar_switcher.hasClass('opened')){
			//console.log('will close');
			$('.rowo .nm,.rowo .nmn').animate({'marginLeft':'+=300px','marginRight':'-=300px'}, 'normal',function(){
				$sidebar_switcher.addClass('closed');
			}),
			$sidebar_switcher.removeClass('opened');
			//console.log('closed');
		}else if($sidebar_switcher.hasClass('closed')){
			//console.log('will open');
			$('.rowo .nm,.rowo .nmn').animate({'marginLeft':'-=300px','marginRight':'+=300px'}, 'normal',function(){
				$sidebar_switcher.addClass('opened');
			});
			$sidebar_switcher.removeClass('closed');
		
			//console.log('opened');
		}
	});
});
