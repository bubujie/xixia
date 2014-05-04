“旧”布局结构



// JavaScript Document
jQuery(document).ready(function($) {//or jQuery(function($) {
	$('<div id="frame_switch" class="bgc8"><span class="opened d_b">Toggle</span></div>').prependTo('#bbody-mid .wing');
	$sidebar_switcher = $('#frame_switch span');
	$sidebar_switcher.click(function(){
		if($sidebar_switcher.hasClass('opened')){
			//console.log('will close');
			$('.rowo .nm,.rowo .nmn').animate({'marginLeft':'+=300px','marginRight':'-=300px'}, 'normal');
			$sidebar_switcher.removeClass('opened').addClass('closed');
			//console.log('closed');
		}else if($sidebar_switcher.hasClass('closed')){
			//console.log('will open');
			$('.rowo .nm,.rowo .nmn').animate({'marginLeft':'-=300px','marginRight':'+=300px'}, 'normal');
			$sidebar_switcher.removeClass('closed').addClass('opened');
			//console.log('opened');
		}
	});
});
