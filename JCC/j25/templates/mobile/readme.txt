���ɡ����ֽṹ



���صĲ�����˵���IE6��IE7�������ֻ���©������
body { overflow:hidden; }
.rowo { margin-left:-300px !important; }
#SOHUCS #SOHU_MAIN .section-cbox-w .cbox-block-w .block-post-w .post-login-w ul { margin: 0 0px 0 0; }
��Ҫ��ý���ѯ�Ķ�����ֽ�����Ӧ����



//IE��Firefox��֧��backgroundPositionX��backgroundPositionY������ͨ��backgroundPositionʵ��backgroundPositionXЧ������backgroundPositionY�޽�
// JavaScript Document
// JavaScript Document
jQuery(document).ready(function($) {//or jQuery(function($) {
	var $n1=280;
	var $n2=280;
	var $space=20;
	$('<div id="frame_switch1" class="bgc8"><span class="opened d_b">Side1 Toggle</span></div>').prependTo('#bbody-mid .wing');
	$side1_switcher = $('#frame_switch1 span');
	$side1_switcher.click(function(){
		if($side1_switcher.hasClass('opened')){
			$('.rowo .nm,.rowo .nmn').animate({'marginLeft':'+='+($n1+$space)+'px','marginRight':'-='+($n1+$space)+'px'}, 'normal',function(){
				$side1_switcher.addClass('closed');
			}).parent().animate({'backgroundPosition':'+=300px'}, 'normal'),
			$side1_switcher.removeClass('opened').parent();
		}else if($side1_switcher.hasClass('closed')){
			$('.rowo .nm,.rowo .nmn').animate({'marginLeft':'-='+($n1+$space)+'px','marginRight':'+='+($n1+$space)+'px'}, 'normal',function(){
				$side1_switcher.addClass('opened');
			}).parent().animate({'backgroundPosition':'-=300px'}, 'normal');
			$side1_switcher.removeClass('closed');
		}
	});
	/*
	$('<div id="frame_switch2" class="bgc8"><span class="opened d_b">Side2 Toggle</span></div>').prependTo('#bbody-mid .wing');
	$side2_switcher = $('#frame_switch2 span');
	$side2_switcher.click(function(){
		if($side2_switcher.hasClass('opened')){
			$('.rowo .mn,.rowo .nmn').animate({'marginLeft':'-='+($n2+$space)+'px','marginRight':'+='+($n2+$space)+'px'}, 'normal',function(){
				$side2_switcher.addClass('closed');
			}),
			$side2_switcher.removeClass('opened');
		}else if($side2_switcher.hasClass('closed')){
			$('.rowo .mn,.rowo .nmn').animate({'marginLeft':'+='+($n2+$space)+'px','marginRight':'-='+($n2+$space)+'px'}, 'normal',function(){
				$side2_switcher.addClass('opened');
			});
			$side2_switcher.removeClass('closed');
		}
	});
	*/
});
